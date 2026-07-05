<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — API 엔드포인트
// GET /api.php?coin=BTC&mode=buy
// 응답: 완성된 점수/카드 데이터 (계산 로직은 노출되지 않음)
//
// 성능 개선 (2026-06-30):
//   - 외부 API 11개를 순차 호출하던 것 → http_get_multi()로 동시 호출
//   - newhedge.io 중복 스크래핑 제거
//   - 같은 코인에 대한 동시 요청(buy+sell, 여러 사용자)이 콜드스타트를
//     중복으로 돌지 않도록 파일 락으로 보호
// ═══════════════════════════════════════════════════════

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data_sources.php';

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // 같은 도메인에서만 호출하지만 안전하게 명시
header('Cache-Control: no-cache');
require_once __DIR__ . '/score_calc.php';

// 어떤 예외/에러가 발생해도 유효한 JSON으로 응답 (프론트엔드가 깨지지 않도록)
set_exception_handler(function($e) {
    http_response_code(500);
    echo json_encode(['error' => 'Internal error', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    exit;
});
set_error_handler(function($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) return false;
    throw new ErrorException($message, 0, $severity, $file, $line);
});

$coin = strtoupper($_GET['coin'] ?? 'BTC');
$mode = ($_GET['mode'] ?? 'buy') === 'sell' ? 'sell' : 'buy';

if (!isset(COIN_SYMBOLS[$coin])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid coin', 'allowed' => array_keys(COIN_SYMBOLS)]);
    exit;
}

$sym = COIN_SYMBOLS[$coin];

// 캐시 키: 코인별 60초 캐싱 (모드 무관 — 원본 데이터는 동일, 점수만 다름)
$cacheKey = "raw_data_{$coin}";
$cacheTtl = 60;
$ind = cache_get($cacheKey, $cacheTtl);

if ($ind === null) {
    // 캐시 미스 → 외부 API 풀세트를 다시 받아야 함.
    // 동시에 들어온 다른 요청(예: buy/sell 동시 호출)이 똑같은 작업을
    // 중복으로 하지 않도록 락을 건다. 락을 못 잡으면(이미 누가 갱신 중이면)
    // 잠깐 기다렸다가 캐시를 다시 확인.
    $lock = cache_lock($cacheKey);

    // 락을 기다리는 동안 다른 요청이 이미 캐시를 채웠을 수 있으니 재확인
    $ind = cache_get($cacheKey, $cacheTtl);

    if ($ind === null) {
        // ── 원본 데이터 수집 (모든 외부 API를 한 번에 동시 호출) ──
        $urls = buildDataUrls($coin, $sym);
        $raw = http_get_multi($urls, 6);

        $price = parsePrice($raw['price'] ?? null);
        $ma200w = parseMA200w($raw['ma200w'] ?? null);
        $fg = parseFG($raw['fg'] ?? null);
        $dom = parseDominance($raw['dom'] ?? null);
        $futuresGap = parseFuturesGap($raw['futures'] ?? null);
        $dailyKlines = parseDailyKlines($raw['klines'] ?? null, 30);
        $m15Klines = parseDailyKlines($raw['klines15m'] ?? null, 15);
        $btcKlines = ($coin === 'BTC') ? null : parseDailyKlines($raw['btc_klines'] ?? null, 30);

        // 가격을 못 받아왔으면 binance.us로 한 번만 재시도 (드문 경우라 단건 호출로 충분)
        if ($price === null) {
            $fallback = http_get("https://api.binance.us/api/v3/ticker/price?symbol=$sym");
            if (isset($fallback['price'])) $price = (float)$fallback['price'];
        }

        // BTC 전용 온체인 데이터 (다른 코인은 폴백값)
        if ($coin === 'BTC') {
            $mvrv_z = parseMVRVZ($raw['mvrv'] ?? null);
            $nh = parseNewhedge($raw['newhedge'] ?? null);
            $hr = parseHashRibbon($raw['hashrate'] ?? null);
            $cbp = parseCBPremium($raw['cbpremium'] ?? null, $price);
        } else {
            $mvrv_z = 0.27;
            $nh = ['nupl' => 0.09, 'sth_sopr' => 0.960, 'lth_sopr' => 0.79, 'lth_pct' => 75.0];
            $hr = ['ratio' => 1.0, 'status' => 'Recovering'];
            $cbp = -0.13;
        }

        $p = $price ?? 60000;
        $ath = ATH_MAP[$coin] ?? 100;
        $ath_drop = round(($p - $ath) / $ath * 100, 1);

        // 기술적 지표 계산 (네트워크 호출 없음, 순수 계산)
        $rsi14 = $dailyKlines ? calcRSI($dailyKlines['closes'], 14) : 50;
        $volChange = $dailyKlines ? calcVolumeChange($dailyKlines['volumes']) : 0;
        $pressure = getBuySellPressure($dailyKlines);
        $fastPressure = getFastPressure($m15Klines);
        $btcCorr = ($coin === 'BTC') ? 1.0 :
            (($dailyKlines && $btcKlines) ? calcCorrelation($dailyKlines['closes'], $btcKlines['closes']) : 0.7);

        // 업비트 USDT/KRW 파싱 (curl_multi로 이미 받아온 데이터)
        $usdtKrwCached = 0; $usdtChgCached = 0;
        $upbitRaw = $raw['usdt_krw'] ?? null;
        if ($upbitRaw) {
            $upbitData = json_decode($upbitRaw, true);
            if (is_array($upbitData) && isset($upbitData[0]['trade_price'])) {
                $usdtKrwCached = (float)$upbitData[0]['trade_price'];
                $usdtChgCached = round((float)($upbitData[0]['signed_change_rate'] ?? 0) * 100, 2);
            }
        }

        $ind = [
            'coin' => $coin,
            'price' => $p,
            'ma200w' => $ma200w ?? 62000,
            'fear_greed' => $fg['value'],
            'fg_label' => $fg['label'],
            'dominance' => $dom,
            'usdt_krw' => $usdtKrwCached,
            'usdt_chg' => $usdtChgCached,
            'usdt_prices' => parseUsdtFx($raw['usdt_fx'] ?? null),
            'fx_rates' => parseFxRates($raw['fx_rates'] ?? null),
            'funding' => $futuresGap['gap'] ?? 0.005,
            'funding_mark' => $futuresGap['markPrice'] ?? 0,
            'funding_index' => $futuresGap['indexPrice'] ?? 0,
            'mvrv_z' => $mvrv_z,
            'nupl' => $nh['nupl'],
            'sth_sopr' => $nh['sth_sopr'],
            'lth_sopr' => $nh['lth_sopr'],
            'hr_ratio' => $hr['ratio'],
            'hr_status' => $hr['status'],
            'cb_premium' => $cbp,
            'lth_pct' => $nh['lth_pct'] ?? 79.0,
            'realized_price' => REALIZED_PRICE[$coin] ?? 52400,
            'ath_drop' => $ath_drop,
            'halving_months' => HALVING_MONTHS,
            'rsi14' => $rsi14,
            'vol_change' => $volChange,
            'buy_ratio' => $pressure['buyRatio'],
            'is_red_day' => $pressure['isRedDay'],
            'fast_vol_ratio_1h' => $fastPressure['volRatio1h'],
            'fast_vol_ratio_4h' => $fastPressure['volRatio4h'],
            'fast_buy_ratio' => $fastPressure['buyRatio'],
            'fast_is_red' => $fastPressure['isRedRecent'],
            'fast_price_chg_1h' => $fastPressure['priceChg1h'],
            'fast_price_chg_4h' => $fastPressure['priceChg4h'],
            'btc_corr_value' => $btcCorr,
        ];

        cache_set($cacheKey, $ind);
    }

    cache_unlock($lock);
}

// ── 점수 계산 (이 부분이 핵심 — 클라이언트에 절대 안 보임) ──
$result = $mode === 'buy' ? calcBuy($ind) : calcSell($ind);

// ── 업비트 USDT/KRW — $ind에 캐시돼 있음 ──
$usdtKrw = $ind['usdt_krw'] ?? 0;
$usdtChg = $ind['usdt_chg'] ?? 0;

// 응답: 계산 결과 + 트리거 체크리스트용 raw 지표값 일부 포함
// (계산 공식 자체는 노출되지 않음 — 단순 현재값만 전달)
echo json_encode([
    'coin' => $coin,
    'mode' => $mode,
    'price' => $ind['price'],
    'ma200w' => $ind['ma200w'],
    'fear_greed' => $ind['fear_greed'],
    'fg_label' => $ind['fg_label'],
    'ath_drop' => $ind['ath_drop'],
    'realized_price' => $ind['realized_price'],
    // 티커바용 도미넌스/마켓캡/볼륨 (CoinGecko → PHP 서버에서 받아와 전달)
    'btc_dom' => $ind['dominance']['btc'] ?? 55.8,
    'dom_chg' => $ind['dominance']['dom_chg'] ?? 0,
    'mcap'    => $ind['dominance']['mcap'] ?? 0,
    'vol24h'  => $ind['dominance']['vol'] ?? 0,
    // 티커바용 USDT/KRW (업비트 → PHP 서버에서 받아와 CORS 우회)
    'usdt_krw'  => $usdtKrw,
    'usdt_chg'  => $usdtChg,
    // 티커바용 통화별 실제 USDT 시세 (CoinGecko tether → USD/KRW/JPY/EUR). 디페깅·프리미엄 표시용.
    'usdt_prices' => $ind['usdt_prices'] ?? [],
    'fx_rates' => $ind['fx_rates'] ?? [],
    // 트리거 체크리스트("다음 진입 조건" 패널)에 필요한 현재값만 노출
    'raw' => [
        'mvrv_z' => $ind['mvrv_z'],
        'nupl' => $ind['nupl'],
        'funding' => $ind['funding'],
        'cb_premium' => $ind['cb_premium'],
        'hr_status' => $ind['hr_status'],
    ],
    'result' => $result,
    'updated_at' => date('c'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
