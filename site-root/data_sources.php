<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 외부 데이터 수집 함수
//
// 변경점 (2026-06-30 성능 개선):
//   기존에는 getPrice(), getFG(), getMVRVZ() ... 가 각자 따로 네트워크 호출을 했음
//   → 외부 API가 11개 가까이 되다 보니 순차 호출 시 8~15초씩 걸려서
//     프론트엔드 8초 타임아웃에 걸려 "signal timed out" 에러가 발생.
//   지금은 buildDataUrls()로 필요한 URL을 한 번에 모아서
//   http_get_multi()로 "동시에" 쏘고, 각 parseXXX() 함수가 그 결과만 파싱함.
//   + newhedge.io 중복 스크래핑(getNewhedge / getLTHSupply)을 하나로 합침.
// ═══════════════════════════════════════════════════════

require_once __DIR__ . '/config.php';

/**
 * 이번 요청에 필요한 모든 외부 API URL을 한 번에 정의.
 * 이 배열을 http_get_multi()에 그대로 넘기면 전부 동시에 호출됨.
 */
function buildDataUrls(string $coin, string $sym): array {
    $fsym = str_replace('USDT', '', $sym);

    $urls = [
        'price'      => "https://api.binance.com/api/v3/ticker/price?symbol=$sym",
        'ma200w'     => "https://api.binance.com/api/v3/klines?symbol=$sym&interval=1w&limit=200",
        'klines'     => "https://api.binance.com/api/v3/klines?symbol=$sym&interval=1d&limit=366",
        'klines15m'  => "https://api.binance.com/api/v3/klines?symbol=$sym&interval=15m&limit=20",
        'fg'         => 'https://api.alternative.me/fng/?limit=1',
        'dom'        => 'https://api.coingecko.com/api/v3/global',
        'usdt_krw'   => 'https://api.upbit.com/v1/ticker?markets=KRW-USDT',
        // 실제 USDT 시세(법정환율이 아니라 테더 실거래가) — 4개 통화 한 번에. 디페깅/김치프리미엄 확인용.
        'usdt_fx'    => 'https://api.coingecko.com/api/v3/simple/price?ids=tether&vs_currencies=usd,krw,jpy,eur,try,vnd,brl&include_24hr_change=true',
        // USD 기준 법정환율 (KRW/JPY/EUR). 클라이언트가 직접 부르던 걸 서버로 옮겨 CORS/쿼터 리스크 제거.
        'fx_rates'   => 'https://api.exchangerate-api.com/v4/latest/USD',
    ];

    // USDT 자체는 선물 마켓이 없으므로 제외
    if ($sym !== 'USDTUSDT') {
        $urls['futures'] = "https://fapi.binance.com/fapi/v1/premiumIndex?symbol={$fsym}USDT";
    }

    // 다른 코인과의 상관계수 계산용 BTC 일봉 (BTC 탭일 때는 불필요)
    if ($coin !== 'BTC') {
        $urls['btc_klines'] = 'https://api.binance.com/api/v3/klines?symbol=BTCUSDT&interval=1d&limit=366';
    }

    // BTC 전용 온체인 지표 — newhedge.io는 nupl/sopr/lth_supply를 한 페이지에서 다 긁어옴 (중복 호출 제거)
    if ($coin === 'BTC') {
        $urls['mvrv']      = 'https://en.macromicro.me/series/8365/bitcoin-mvrv-zscore';
        $urls['newhedge']  = 'https://newhedge.io/bitcoin';
        $urls['hashrate']  = 'https://api.blockchain.info/charts/hash-rate?timespan=3months&format=json&sampled=true';
        $urls['cbpremium'] = 'https://api.coinbase.com/v2/prices/BTC-USD/spot';
    }

    return $urls;
}

/** raw 응답에서 현재가 파싱 (Binance) */
function parsePrice(?string $body): ?float {
    if (!$body) return null;
    $d = json_decode($body, true);
    return isset($d['price']) ? (float)$d['price'] : null;
}

/**
 * CoinGecko tether 응답에서 통화별 실제 USDT 시세 + 24h 변화율을 뽑아냄.
 * 반환: ['usd'=>['p'=>1.0,'c'=>0.01], 'krw'=>[...], 'jpy'=>[...], 'eur'=>[...]] (없으면 빈 배열)
 */
function parseUsdtFx(?string $body): array {
    if (!$body) return [];
    $d = json_decode($body, true);
    $t = $d['tether'] ?? null;
    if (!is_array($t)) return [];
    $out = [];
    foreach (['usd','krw','jpy','eur','try','vnd','brl'] as $cur) {
        if (isset($t[$cur])) {
            $out[$cur] = [
                'p' => (float)$t[$cur],
                'c' => isset($t["{$cur}_24h_change"]) ? round((float)$t["{$cur}_24h_change"], 2) : null,
            ];
        }
    }
    return $out;
}

/**
 * exchangerate-api 응답에서 USD 기준 법정환율(KRW/JPY/EUR) 추출.
 * 반환: ['KRW'=>1385.2, 'JPY'=>156.8, 'EUR'=>0.92] (없으면 빈 배열)
 */
function parseFxRates(?string $body): array {
    if (!$body) return [];
    $d = json_decode($body, true);
    $rates = $d['rates'] ?? null;
    if (!is_array($rates)) return [];
    $out = [];
    foreach (['KRW','JPY','EUR','TRY','VND','BRL'] as $cur) {
        if (isset($rates[$cur]) && is_numeric($rates[$cur])) {
            $out[$cur] = (float)$rates[$cur];
        }
    }
    return $out;
}

/** raw 응답에서 200주 이동평균 파싱 */
function parseMA200w(?string $body): ?float {
    if (!$body) return null;
    $d = json_decode($body, true);
    if (!is_array($d) || count($d) < 20) return null; // 최소 20주는 있어야 의미있는 평균
    // 200주가 안 되는 신규 코인은 있는 데이터만큼 평균 (상장 후 전체 기간 평균 = 실현가 근사로 유효)
    $closes = array_map(fn($k) => (float)$k[4], $d);
    $avg = array_sum($closes) / count($closes);
    // 저가 코인(XRP·DOGE 등)은 정수 반올림하면 0이 되므로 소수 유지. 값 크기에 따라 정밀도 조정.
    if ($avg >= 100) return round($avg);
    if ($avg >= 1)   return round($avg, 2);
    return round($avg, 6);
}

// 200주 주봉 데이터에서 최고가(High)를 뽑아 ATH 근사값으로 사용.
// 진짜 역대 최고가와 100% 일치하진 않지만(4년보다 이전 고점은 놓칠 수 있음),
// 대부분 코인은 최근 4년 내 ATH라 실용적으로 충분. 코인 심볼만 추가하면 자동 산출됨.
function parseAthFromKlines(?string $body): ?float {
    if (!$body) return null;
    $d = json_decode($body, true);
    if (!is_array($d) || count($d) < 4) return null;
    $highs = array_map(fn($k) => (float)$k[2], $d); // 주봉 [2] = High
    $ath = max($highs);
    if ($ath <= 0) return null;
    if ($ath >= 100) return round($ath);
    if ($ath >= 1)   return round($ath, 2);
    return round($ath, 6);
}

/**
 * raw 응답에서 일봉 캔들(종가/거래량) 파싱 — RSI, 거래량변화율, BTC상관계수 계산용 공통
 *
 * 주의: Binance klines는 마지막 항목이 "오늘" 아직 진행 중인(미완성) 봉으로 옵니다.
 * 이걸 그대로 쓰면 하루 중 시점에 따라 거래량이 항상 적게 잡혀서
 * "거래량 변화율(24h vs 7일평균)" 같은 비교가 항상 마이너스로 왜곡됩니다.
 * 그래서 마지막 미완성 봉은 버리고, 완전히 마감된 일봉만 사용합니다.
 */
function parseDailyKlines(?string $body, int $limit = 30): ?array {
    if (!$body) return null;
    $d = json_decode($body, true);
    if (!is_array($d) || count($d) < 2) return null;

    array_pop($d); // 마지막(미완성) 캔들 제거 — 완전히 마감된 봉만 남김

    if (count($d) >= $limit - 2) {
        return [
            'opens'    => array_map(fn($k) => (float)$k[1], $d),
            'closes'   => array_map(fn($k) => (float)$k[4], $d),
            'volumes'  => array_map(fn($k) => (float)$k[5], $d),
            // Binance kline의 인덱스 9 = taker buy base asset volume (적극적 매수 체결 거래량).
            // 전체 거래량에서 이 비율이 높을수록 "매수 주도", 낮을수록 "매도 주도".
            'takerBuy' => array_map(fn($k) => (float)$k[9], $d),
        ];
    }
    return null;
}

/**
 * 가장 최근에 마감된 일봉 1개의 "매수/매도 주도 거래량 비율"과 양봉/음봉 여부를 계산.
 * 거래량 급증이 패닉 매도(캐피틀레이션)였는지, FOMO 매수(과열)였는지 구분하는 용도.
 *
 * @return array{buyRatio: float, isRedDay: bool} buyRatio: 0~1 (0.5=중립, 높을수록 매수 주도)
 */
function getBuySellPressure(?array $dailyKlines): array {
    $fb = ['buyRatio' => 0.5, 'isRedDay' => false]; // 데이터 없으면 중립값
    if (!$dailyKlines || empty($dailyKlines['volumes'])) return $fb;

    $i = count($dailyKlines['volumes']) - 1;
    $vol = $dailyKlines['volumes'][$i] ?? 0;
    $takerBuy = $dailyKlines['takerBuy'][$i] ?? null;
    $open = $dailyKlines['opens'][$i] ?? null;
    $close = $dailyKlines['closes'][$i] ?? null;

    $buyRatio = ($vol > 0 && $takerBuy !== null) ? max(0, min(1, $takerBuy / $vol)) : 0.5;
    $isRedDay = ($open !== null && $close !== null) ? ($close < $open) : false;

    return ['buyRatio' => $buyRatio, 'isRedDay' => $isRedDay];
}
/**
 * 15분봉 기반 "지금 이 순간"의 거래량 가속도 + 매수/매도 압력 계산.
 * 일봉 기반 getBuySellPressure()는 최대 24시간 지연(어제까지의 상황)이 생기는데,
 * 이건 가장 최근에 마감된 15분봉을 직전 1시간/4시간 평균과 비교해서
 * 15분~1시간 단위로 갱신되는 훨씬 빠른 신호를 만듦.
 *
 * @param ?array $m15 parseDailyKlines()로 파싱한 15분봉 데이터 (opens/closes/volumes/takerBuy)
 * @return array{volRatio1h: float, volRatio4h: float, buyRatio: float, isRedRecent: bool, priceChg1h: float, priceChg4h: float}
 */
function getFastPressure(?array $m15): array {
    $fb = ['volRatio1h' => 1.0, 'volRatio4h' => 1.0, 'buyRatio' => 0.5, 'isRedRecent' => false, 'priceChg1h' => 0.0, 'priceChg4h' => 0.0];
    if (!$m15 || empty($m15['volumes'])) return $fb;

    $vol = $m15['volumes'];
    $closes = $m15['closes'];
    $opens = $m15['opens'];
    $takerBuy = $m15['takerBuy'];
    $n = count($vol);
    if ($n < 6) return $fb; // 기준선 계산에 최소 6개(1.5시간) 캔들 필요

    $i = $n - 1; // 가장 최근에 마감된 15분봉
    $recentVol = $vol[$i];

    // 1시간 기준선: 직전 4개 캔들(현재 캔들 제외) 평균
    $base1h = array_slice($vol, max(0, $i - 4), 4);
    $avg1h = count($base1h) ? array_sum($base1h) / count($base1h) : $recentVol;

    // 4시간 기준선: 직전 16개 캔들(현재 캔들 제외, 데이터 부족하면 있는 만큼만) 평균
    $base4h = array_slice($vol, max(0, $i - 16), min(16, $i));
    $avg4h = count($base4h) ? array_sum($base4h) / count($base4h) : $recentVol;

    $volRatio1h = $avg1h > 0 ? $recentVol / $avg1h : 1.0;
    $volRatio4h = $avg4h > 0 ? $recentVol / $avg4h : 1.0;

    $buyRatio = ($recentVol > 0 && isset($takerBuy[$i])) ? max(0, min(1, $takerBuy[$i] / $recentVol)) : 0.5;
    $isRedRecent = $closes[$i] < $opens[$i];

    $idx1h = max(0, $i - 4);
    $idx4h = max(0, $i - 16);
    $priceChg1h = $closes[$idx1h] > 0 ? ($closes[$i] - $closes[$idx1h]) / $closes[$idx1h] * 100 : 0.0;
    $priceChg4h = $closes[$idx4h] > 0 ? ($closes[$i] - $closes[$idx4h]) / $closes[$idx4h] * 100 : 0.0;

    return [
        'volRatio1h' => round($volRatio1h, 2), 'volRatio4h' => round($volRatio4h, 2),
        'buyRatio' => $buyRatio, 'isRedRecent' => $isRedRecent,
        'priceChg1h' => round($priceChg1h, 2), 'priceChg4h' => round($priceChg4h, 2),
    ];
}

function calcRSI(array $closes, int $period = 14): float {
    $n = count($closes);
    if ($n < $period + 1) return 50.0;

    $gains = 0; $losses = 0;
    for ($i = 1; $i <= $period; $i++) {
        $diff = $closes[$i] - $closes[$i - 1];
        if ($diff >= 0) $gains += $diff; else $losses -= $diff;
    }
    $avgGain = $gains / $period;
    $avgLoss = $losses / $period;

    for ($i = $period + 1; $i < $n; $i++) {
        $diff = $closes[$i] - $closes[$i - 1];
        $gain = $diff >= 0 ? $diff : 0;
        $loss = $diff < 0 ? -$diff : 0;
        $avgGain = ($avgGain * ($period - 1) + $gain) / $period;
        $avgLoss = ($avgLoss * ($period - 1) + $loss) / $period;
    }

    if ($avgLoss == 0) return 100.0;
    $rs = $avgGain / $avgLoss;
    return round(100 - (100 / (1 + $rs)), 1);
}

/** 거래량 변화율: 최근 1일 vs 직전 7일 평균 */
function calcVolumeChange(?array $volumes): float {
    if (!$volumes || count($volumes) < 8) return 0.0;
    $recent = end($volumes);
    $prev7 = array_slice($volumes, -8, 7);
    $avgPrev = array_sum($prev7) / count($prev7);
    if ($avgPrev == 0) return 0.0;
    return round(($recent - $avgPrev) / $avgPrev * 100, 1);
}

/** BTC 상관계수 (피어슨, 일간 수익률 기준) */
function calcCorrelation(array $closesA, array $closesB): float {
    $n = min(count($closesA), count($closesB));
    if ($n < 10) return 1.0;

    $retA = []; $retB = [];
    for ($i = 1; $i < $n; $i++) {
        $retA[] = ($closesA[$i] - $closesA[$i - 1]) / $closesA[$i - 1];
        $retB[] = ($closesB[$i] - $closesB[$i - 1]) / $closesB[$i - 1];
    }
    $meanA = array_sum($retA) / count($retA);
    $meanB = array_sum($retB) / count($retB);

    $cov = 0; $varA = 0; $varB = 0;
    for ($i = 0; $i < count($retA); $i++) {
        $dA = $retA[$i] - $meanA;
        $dB = $retB[$i] - $meanB;
        $cov += $dA * $dB;
        $varA += $dA * $dA;
        $varB += $dB * $dB;
    }
    if ($varA == 0 || $varB == 0) return 1.0;
    return round($cov / sqrt($varA * $varB), 2);
}

/** raw 응답에서 선물-현물 갭 파싱 (Binance Futures) */
function parseFuturesGap(?string $body): array {
    if ($body) {
        $d = json_decode($body, true);
        if (isset($d['markPrice'], $d['indexPrice'])) {
            $mark = (float)$d['markPrice'];
            $idx = (float)$d['indexPrice'];
            $gap = round(($mark - $idx) / $idx * 100, 5);
            return ['gap' => $gap, 'markPrice' => round($mark), 'indexPrice' => round($idx)];
        }
    }
    return ['gap' => 0.005, 'markPrice' => 0, 'indexPrice' => 0];
}

/** raw 응답에서 Fear & Greed Index 파싱 */
function parseFG(?string $body): array {
    if ($body) {
        $d = json_decode($body, true);
        if (isset($d['data'][0])) {
            return ['value' => (int)$d['data'][0]['value'], 'label' => $d['data'][0]['value_classification']];
        }
    }
    return ['value' => 13, 'label' => 'Extreme Fear'];
}

/** raw 응답에서 BTC/ETH 도미넌스 파싱 */
/**
 * raw 응답에서 시총 도미넌스 파싱.
 * CoinGecko의 /global 응답에는 BTC/ETH뿐 아니라 추적 중인 다른 코인들의
 * 시총 비중도 같이 들어있는데, 예전엔 btc/eth만 꺼내쓰고 나머지는 버려서
 * BNB/SOL/XRP/DOGE/ADA/TRX의 "시장 지배력" 지표가 전부 고정값(5.0%)으로
 * 표시되는 버그가 있었음 — 이제 추적 중인 코인 전부 같이 꺼내옴.
 */
function parseDominance(?string $body): array {
    $fallback = ['btc' => 55.8, 'eth' => 12.4, 'bnb' => 2.0, 'sol' => 1.2, 'xrp' => 3.5, 'doge' => 0.3, 'ada' => 0.25, 'trx' => 0.6,
                 'mcap' => 0, 'vol' => 0, 'dom_chg' => 0];
    if ($body) {
        $d = json_decode($body, true);
        if (isset($d['data']['market_cap_percentage'])) {
            $p = $d['data']['market_cap_percentage'];
            $out = [];
            foreach (['btc'=>55.8,'eth'=>12.4,'bnb'=>2.0,'sol'=>1.2,'xrp'=>3.5,'doge'=>0.3,'ada'=>0.25,'trx'=>0.6] as $key => $def) {
                $out[$key] = isset($p[$key]) ? round((float)$p[$key], 2) : $def;
            }
            $out['mcap']    = isset($d['data']['total_market_cap']['usd'])    ? (float)$d['data']['total_market_cap']['usd']    : 0;
            $out['vol']     = isset($d['data']['total_volume']['usd'])         ? (float)$d['data']['total_volume']['usd']         : 0;
            $out['dom_chg'] = isset($d['data']['market_cap_change_percentage_24h_usd'])
                                ? round((float)$d['data']['market_cap_change_percentage_24h_usd'], 2) : 0;
            return $out;
        }
    }
    return $fallback;
}

/** raw 응답에서 MVRV Z-Score 파싱 (BTC 전용, macromicro 스크래핑) */
function parseMVRVZ(?string $body): float {
    if ($body && preg_match('/"latestValue"\s*:\s*([\-\d\.]+)/', $body, $m)) {
        return (float)$m[1];
    }
    return 0.27;
}

/**
 * raw 응답에서 NUPL / STH-SOPR / LTH-SOPR / LTH Supply % 모두 파싱
 * (BTC 전용, newhedge.io 페이지 하나를 한 번만 받아서 전부 추출 — 기존엔 두 번 호출하던 걸 합침)
 */
function parseNewhedge(?string $body): array {
    $fb = ['nupl' => 0.09, 'sth_sopr' => 0.960, 'lth_sopr' => 0.79, 'lth_pct' => 79.0];
    $validSopr = fn($v) => is_numeric($v) && $v >= 0.90 && $v <= 1.10;
    $validNupl = fn($v) => is_numeric($v) && $v >= -0.5 && $v <= 1.0;

    if (!$body) return $fb;

    preg_match('/NUPL[^%\d\-]*?([\-\d\.]+)\s*%/', $body, $nm);
    preg_match('/STH[\s\S]{0,200}?SOPR[\s\S]{0,100}?(0\.\d{3,4})/', $body, $sm);
    preg_match('/LTH[\s\S]{0,200}?SOPR[\s\S]{0,100}?(0\.\d{3,4})/', $body, $lm);
    preg_match('/LTH[^>]*?supply[^>]*?([\d\.]+)\s*%/i', $body, $pm);

    $nupl = isset($nm[1]) ? (float)$nm[1] / 100 : null;
    $sth = isset($sm[1]) ? (float)$sm[1] : null;
    $lth = isset($lm[1]) ? (float)$lm[1] : null;
    $lthPct = isset($pm[1]) ? (float)$pm[1] : null;

    return [
        'nupl' => $validNupl($nupl) ? $nupl : $fb['nupl'],
        'sth_sopr' => $validSopr($sth) ? $sth : $fb['sth_sopr'],
        'lth_sopr' => $validSopr($lth) ? $lth : $fb['lth_sopr'],
        'lth_pct' => $lthPct !== null ? $lthPct : $fb['lth_pct'],
    ];
}

/** raw 응답에서 Hash Ribbon 파싱 (BTC 전용, blockchain.info 해시레이트) */
function parseHashRibbon(?string $body): array {
    if ($body) {
        $d = json_decode($body, true);
        if (isset($d['values']) && count($d['values']) >= 60) {
            $values = array_map(fn($x) => $x['y'], $d['values']);
            $ma30 = array_sum(array_slice($values, -30)) / 30;
            $ma60 = array_sum(array_slice($values, -60)) / 60;
            return [
                'ratio' => round($ma30 / $ma60, 4),
                'status' => $ma30 > $ma60 ? 'Recovering' : 'Capitulation',
            ];
        }
    }
    return ['ratio' => 0.972, 'status' => 'Capitulation'];
}

/** raw 응답에서 Coinbase Premium 파싱 (BTC 전용) */
function parseCBPremium(?string $body, ?float $price): float {
    if ($body && $price) {
        $d = json_decode($body, true);
        if (isset($d['data']['amount'])) {
            $cb = (float)$d['data']['amount'];
            return round(($cb - $price) / $price * 100, 4);
        }
    }
    return -0.1268;
}
