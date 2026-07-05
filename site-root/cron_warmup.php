<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 캐시 워밍업 스크립트
//
// 용도: 카페24 "예약 작업(cron)"에 이 파일을 1분마다 실행하도록 등록해두면,
//       실제 방문자가 api.php를 호출할 때 캐시가 항상 채워져 있어서
//       외부 API를 기다릴 필요 없이 즉시(0.1초 이내) 응답받게 됩니다.
//       즉, "콜드스타트"가 거의 발생하지 않게 만드는 용도입니다.
//
// 카페24 설정 방법:
//   호스팅 관리 → 예약 작업(Cron) 등록
//   주기: 매 1분 (*/1 * * * *) 또는 최소 매 1~2분
//   명령: php /html경로/cron_warmup.php
//   (cron 미지원 플랜이면 외부 무료 핑 서비스로 이 파일의 URL을
//    1분마다 호출시키는 방법도 가능 — 예: cron-job.org)
// ═══════════════════════════════════════════════════════

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data_sources.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache');

// 사이트에서 쓰는 모든 코인을 순회하며 캐시를 미리 채워둠
foreach (array_keys(COIN_SYMBOLS) as $coin) {
    $sym = COIN_SYMBOLS[$coin];
    $cacheKey = "raw_data_{$coin}";

    // 아직 캐시가 살아있으면(60초 이내) 건드릴 필요 없음
    if (cache_get($cacheKey, 60) !== null) {
        echo "$coin: cache fresh, skip\n";
        continue;
    }

    $lock = cache_lock($cacheKey);
    // 락 대기 중 다른 프로세스가 이미 채웠을 수 있으니 재확인
    if (cache_get($cacheKey, 60) !== null) {
        cache_unlock($lock);
        echo "$coin: filled by another process, skip\n";
        continue;
    }

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

    if ($price === null) {
        $fallback = http_get("https://api.binance.us/api/v3/ticker/price?symbol=$sym");
        if (isset($fallback['price'])) $price = (float)$fallback['price'];
    }

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

    $rsi14 = $dailyKlines ? calcRSI($dailyKlines['closes'], 14) : 50;
    $volChange = $dailyKlines ? calcVolumeChange($dailyKlines['volumes']) : 0;
    $pressure = getBuySellPressure($dailyKlines);
    $fastPressure = getFastPressure($m15Klines);
    $btcCorr = ($coin === 'BTC') ? 1.0 :
        (($dailyKlines && $btcKlines) ? calcCorrelation($dailyKlines['closes'], $btcKlines['closes']) : 0.7);

    $ind = [
        'coin' => $coin,
        'price' => $p,
        'ma200w' => $ma200w ?? 62000,
        'fear_greed' => $fg['value'],
        'fg_label' => $fg['label'],
        'dominance' => $dom,
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
    cache_unlock($lock);
    echo "$coin: cache refreshed\n";
}
