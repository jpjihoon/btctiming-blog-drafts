<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 점수 계산 핵심 로직
// 이 파일은 서버에서만 실행되며, 클라이언트에 절대 노출되지 않습니다.
// ═══════════════════════════════════════════════════════

require_once __DIR__ . '/config.php';

function fmtN($v): string {
    return number_format(round($v));
}

/**
 * 구간별 계단식 점수표를 부드러운 선형 보간으로 바꿔주는 헬퍼.
 * 예: -29.9%와 -30.1%처럼 경계선 바로 양옆인데 점수가 뚝 끊기는 "절벽 효과"를 없애줌.
 *
 * @param float $x 입력값 (예: ATH 대비 낙폭 %)
 * @param array $points [[x1,score1], [x2,score2], ...] — x값 기준 오름차순 또는 내림차순 아무렇게나 줘도 됨
 * @return float 보간된 점수 (양 끝 구간을 벗어나면 가장 가까운 끝값으로 고정)
 */
function lerpScore(float $x, array $points): float {
    usort($points, fn($a, $b) => $a[0] <=> $b[0]);
    $n = count($points);
    if ($n === 0) return 0;
    if ($x <= $points[0][0]) return $points[0][1];
    if ($x >= $points[$n - 1][0]) return $points[$n - 1][1];
    for ($i = 0; $i < $n - 1; $i++) {
        [$x0, $y0] = $points[$i];
        [$x1, $y1] = $points[$i + 1];
        if ($x >= $x0 && $x <= $x1) {
            $t = ($x1 - $x0) == 0 ? 0 : ($x - $x0) / ($x1 - $x0);
            return $y0 + $t * ($y1 - $y0);
        }
    }
    return $points[$n - 1][1];
}

/**
 * LONG(매수 타이밍) 점수 계산
 */
function calcBuy(array $ind): array {
    $price = $ind['price'];
    $mvrv_z = $ind['mvrv_z'];
    $nupl = $ind['nupl'];
    $sth_sopr = $ind['sth_sopr'];
    $lth_sopr = $ind['lth_sopr'];
    $funding = $ind['funding'];
    $dominance = $ind['dominance'];
    $realized_price = $ind['realized_price'];
    $hr_ratio = $ind['hr_ratio'];
    $hr_status = $ind['hr_status'];
    $cb_premium = $ind['cb_premium'];
    $lth_pct = $ind['lth_pct'];
    $ath_drop = $ind['ath_drop'];
    $halving_months = $ind['halving_months'];
    $coin = $ind['coin'];

    $det = [];
    $s = 0;
    $validSopr = fn($v) => is_numeric($v) && $v >= 0.90 && $v <= 1.10;

    // ── BTC 전용 정밀 온체인 지표 ──
    if ($coin === 'BTC') {
        // 1. MVRV Z Score /10 (기존 18 → 10. NUPL·Realized Gap과 같은 realized cap 기반이라 중복 가중치 축소)
        $s = round(lerpScore($mvrv_z, [[-1.0, 10], [-0.5, 10], [0, 9], [0.5, 8], [1.0, 6], [1.5, 3], [2.5, 1]]), 1);
        $det['mvrv_z'] = ['key' => 'mvrv_z', 'label' => 'MVRV Z Score', 'max' => 10, 'score' => $s,
            'value' => number_format($mvrv_z, 3), 'unit' => '',
            'target' => 'Bottom zone ≤ 0', 'signal' => $mvrv_z <= 0.5 ? 'Near Bottom' : 'Mid Range',
            'note' => number_format($mvrv_z, 3) . " — Historically undervalued. ≤0 = full bottom zone. ⚠️ NUPL·Realized Gap과 같은 realized cap 기반 데이터라 일부 중복됩니다."];

        // 2. NUPL /7 (기존 12 → 7. MVRV Z와 같은 근본 데이터의 재구성이라 가중치 축소)
        $s = round(lerpScore($nupl, [[-0.3, 7], [-0.2, 7], [0, 6], [0.10, 5], [0.25, 4], [0.5, 2], [0.8, 0]]), 1);
        $det['nupl'] = ['key' => 'nupl', 'label' => 'NUPL', 'max' => 7, 'score' => $s,
            'value' => number_format($nupl * 100, 1), 'unit' => '%',
            'target' => 'Fear zone ≤ 0%', 'signal' => $nupl <= 0 ? 'Fear' : ($nupl <= 0.10 ? 'Hope Bottom' : 'Hope'),
            'note' => number_format($nupl * 100, 1) . "% — Hope/Fear zone. Below 0% = capitulation. ⚠️ MVRV Z와 상관성 높은 보조 지표."];

        // 3. Realized Price Gap /8 (기존 10 → 8)
        $rp_gap = ($price - $realized_price) / $realized_price * 100;
        $s = round(lerpScore($rp_gap, [[-50, 8], [5, 8], [10, 6], [20, 3], [30, 0]]), 1);
        $det['realized'] = ['key' => 'realized', 'label' => 'Realized Price Gap', 'max' => 8, 'score' => $s,
            'value' => number_format($rp_gap, 1), 'unit' => '%',
            'target' => '≤5% or below', 'signal' => $rp_gap < 0 ? 'Below Realized' : ($rp_gap <= 5 ? 'Ideal' : 'Caution'),
            'note' => '$' . fmtN($price) . " / Realized ~\$" . fmtN($realized_price) . " / Gap " . ($rp_gap >= 0 ? '+' : '') . number_format($rp_gap, 1) . "%"];
    } else {
        // ── 알트코인: 밸류에이션 비중 확대 (2026-07 2차 개편) ──
        // 알트는 BTC의 온체인 저점 지표(MVRV·Hash Ribbon 등 64점)가 없어서, "싸다"를 표현할
        // 지표가 실현가+ATH뿐임. 이 배점이 너무 작으면(구 22점) 저평가 알트가 모멘텀 조용할 때
        // BTC보다 구조적으로 눌림. 배점을 키워(실현가 24, ATH 10 = 34점) 저평가를 제대로 반영.
        // 단 포화 방지 곡선(만점 -65%)은 유지 → 극단적으로 싼 코인만 만점.
        // 해법1(2026-07 3차): 만점 구간을 -65%→-40%로 당김. 200주 MA 대비 -40%면 이미
        // 깊은 저평가라 만점이 합리적. 이러면 -28% 같은 상당한 저평가도 89% 성취로 제대로
        // 인정받아, BTC의 온체인 저평가 계상과 대등해짐(격차 축소). 200주선 위(양수)는 여전히
        // 낮게 유지 → 안 빠진 코인(TRX 등) 구분 유지.
        $rp_gap = ($price - $realized_price) / $realized_price * 100;
        $s = round(lerpScore($rp_gap, [[-40, 24], [-30, 22], [-20, 19], [-10, 16], [0, 12], [15, 7], [40, 2], [80, 0]]), 1);
        $det['alt_valuation'] = ['key' => 'alt_valuation', 'label' => 'Price vs Est. Realized (200W MA)', 'max' => 24, 'score' => $s,
            'value' => number_format($rp_gap, 1), 'unit' => '%',
            'target' => 'Below estimated realized price', 'signal' => $rp_gap < 0 ? 'Below Realized' : 'Above',
            'note' => "현재가 \$" . fmtN($price) . " vs 추정 실현가 ~\$" . fmtN($realized_price) . " (갭 " . ($rp_gap >= 0 ? '+' : '') . number_format($rp_gap, 1) . "%). ⚠️ 알트코인 실현가는 200주 이동평균(200W MA)으로 근사한 추정치입니다."];

        // ATH 낙폭: 만점 -90%로 당기고 곡선 완만하게 (저평가 인정 강화)
        $atd = $ath_drop;
        $s = round(lerpScore($atd, [[-90, 10], [-80, 9], [-70, 7.5], [-60, 6], [-50, 4.5], [-35, 2.5], [-15, 0.8], [0, 0]]), 1);
        $det['alt_drawdown'] = ['key' => 'alt_drawdown', 'label' => 'ATH Drawdown', 'max' => 10, 'score' => $s,
            'value' => number_format($atd, 1), 'unit' => '%',
            'target' => '≥70% drawdown from ATH', 'signal' => $atd <= -70 ? 'Deep Correction' : ($atd <= -50 ? 'Correction' : 'High'),
            'note' => "ATH \$" . fmtN(ATH_MAP[$coin] ?? 0) . " → 현재 \$" . fmtN($price) . " (" . number_format($atd, 1) . "%). ⚠️ 낙폭은 반등을 보장하지 않는 보조 지표."];
    }

    // 4. Hash Ribbon /16 (기존 10 → 16. 채굴자 항복→회복 교차는 역사적으로 가장 신뢰도 높은 선행지표라 가중치 상향)
    if ($coin === 'BTC') {
        // Recovering/Capitulation은 30MA-60MA 교차라는 실제 이진(binary) 이벤트라 그 자체는 보간 대상이 아님.
        // 다만 각 상태 안에서의 ratio 기반 세부 점수는 부드럽게 보간.
        if ($hr_status === 'Recovering') {
            $s = round(lerpScore($hr_ratio, [[1.0, 14], [1.01, 16], [1.05, 16]]), 1);
        } else {
            $s = round(lerpScore($hr_ratio, [[0.90, 4], [0.95, 7], [0.97, 10], [0.99, 12], [1.0, 12]]), 1);
        }
        $det['hash_ribbon'] = ['key' => 'hash_ribbon', 'label' => 'Hash Ribbon', 'max' => 16, 'score' => $s,
            'value' => number_format($hr_ratio, 3), 'unit' => '',
            'target' => 'Recovery cross (30MA>60MA)', 'signal' => $hr_status,
            'note' => "30d/60d ratio=" . number_format($hr_ratio, 3) . ". $hr_status. Recovery cross = strongest leading signal."];
    } else {
        // 실제 시총 비중 사용 (예전엔 ETH 외 코인은 전부 5.0% 고정값이었던 버그 수정)
        $coinKey = strtolower($coin);
        $dom_for_hr = is_array($dominance) ? ($dominance[$coinKey] ?? 1.0) : 1.0;
        $s = round(lerpScore($dom_for_hr, [[0, 3], [0.5, 4], [1.5, 5], [5, 6], [15, 8], [30, 8]]), 1);
        $det['hash_ribbon'] = ['key' => 'hash_ribbon', 'label' => 'Market Dominance', 'max' => 10, 'score' => $s,
            'value' => number_format($dom_for_hr, 2), 'unit' => '%',
            'target' => 'High dominance = strong network', 'signal' => $dom_for_hr >= 5 ? 'Strong' : 'Weak',
            'note' => "Market cap dominance " . number_format($dom_for_hr, 2) . "%. Higher = stronger network effect."];
    }

    if ($coin === 'BTC') {
        // 5. STH-SOPR /8
        if ($validSopr($sth_sopr)) {
            $s = round(lerpScore($sth_sopr, [[0.90, 8], [0.95, 8], [0.97, 7], [1.00, 6], [1.02, 3], [1.05, 0]]), 1);
        } else $s = 6;
        if ($s < 1) $s = 1;
        $det['sth_sopr'] = ['key' => 'sth_sopr', 'label' => 'STH-SOPR', 'max' => 8, 'score' => $s,
            'value' => number_format($sth_sopr, 3), 'unit' => '',
            'target' => 'Capitulation ≤0.95', 'signal' => $sth_sopr <= 0.97 ? 'Capitulation' : 'Borderline',
            'note' => "STH " . number_format($sth_sopr, 3) . " / LTH " . number_format($lth_sopr, 3) . ". Both realizing losses."];

        // 7. Coinbase Premium /10
        $cbp = is_numeric($cb_premium) ? $cb_premium : -0.13;
        $s = round(lerpScore($cbp, [[-0.5, 1], [-0.3, 3], [-0.15, 4], [-0.05, 6], [0, 8], [0.1, 10], [0.3, 10]]), 1);
        if ($cbp >= 0.1) { $cpSig = 'Institutional Buying'; }
        elseif ($cbp >= 0) { $cpSig = 'Mild Premium'; }
        elseif ($cbp >= -0.05) { $cpSig = 'Near Neutral'; }
        elseif ($cbp >= -0.15) { $cpSig = 'Negative (Watching)'; }
        elseif ($cbp >= -0.3) { $cpSig = 'Negative (Sideline)'; }
        else { $cpSig = 'Strong Negative'; }
        $det['cb_premium'] = ['key' => 'cb_premium', 'label' => 'Coinbase Premium', 'max' => 10, 'score' => $s,
            'value' => number_format($cbp, 4), 'unit' => '%',
            'target' => 'Positive = institutional re-entry', 'signal' => $cpSig,
            'note' => ($cbp >= 0 ? '+' : '') . number_format($cbp, 4) . "%. Positive flip = ETF inflow 2~3d leading signal."];

        // 8. LTH Supply /8
        $s = round(lerpScore($lth_pct, [[60, 3], [70, 5], [75, 7], [79, 8], [90, 8]]), 1);
        $det['lth_supply'] = ['key' => 'lth_supply', 'label' => 'LTH Supply %', 'max' => 8, 'score' => $s,
            'value' => number_format($lth_pct, 1), 'unit' => '%',
            'target' => '≥75% whale accumulation', 'signal' => $lth_pct >= 79 ? 'Record Accumulation' : 'Accumulating',
            'note' => number_format($lth_pct, 1) . "% held by long-term holders. +200K BTC/month net increase."];
    }

    // 6. Futures-Spot Gap /14 (기존 8 → 14. 모든 코인 공통, 레버리지 시장의 극단 포지셔닝은 신뢰도 높은 단기 선행지표)
    $fgap = is_numeric($funding) ? $funding : 0.005;
    $s = round(lerpScore($fgap, [[-0.1, 14], [-0.05, 14], [-0.01, 12], [0.01, 8], [0.05, 6], [0.15, 3], [0.3, 0]]), 1);
    if ($fgap <= -0.05) { $fSig = 'Extreme Backwardation'; }
    elseif ($fgap <= -0.01) { $fSig = 'Backwardation'; }
    elseif ($fgap <= 0.01) { $fSig = 'Neutral'; }
    elseif ($fgap <= 0.05) { $fSig = 'Contango'; }
    elseif ($fgap <= 0.15) { $fSig = 'High Contango'; }
    else { $fSig = 'Extreme Contango'; }
    $det['funding'] = ['key' => 'funding', 'label' => 'Futures-Spot Gap', 'max' => 14, 'score' => $s,
        'value' => number_format($fgap, 5), 'unit' => '%',
        'target' => 'Backwardation = short squeeze signal', 'signal' => $fSig,
        'note' => "Futures \$" . number_format($ind['funding_mark'] ?? 0) . " / Spot \$" . number_format($ind['funding_index'] ?? 0) . " / Gap " . ($fgap >= 0 ? '+' : '') . number_format($fgap, 5) . "%"];

    // 9. BTC Dominance /5 (BTC 전용 — 기존엔 알트코인에도 똑같이 적용되면서 바로 아래 9b 블록과
    // 같은 도미넌스 숫자를 정반대 방향으로 채점하는 모순이 있었음. BTC 자신에게만 적용하도록 수정.)
    if ($coin === 'BTC') {
        $dom = is_array($dominance) ? $dominance['btc'] : $dominance;
        $s = round(lerpScore($dom, [[40, 1], [50, 3], [55, 5], [63, 5], [68, 3], [80, 1]]), 1);
        $det['dom'] = ['key' => 'dom', 'label' => 'BTC Dominance', 'max' => 5, 'score' => $s,
            'value' => number_format($dom, 1), 'unit' => '%',
            'target' => '55~63% BTC season', 'signal' => ($dom >= 55 && $dom <= 63) ? 'Target Zone' : 'Out of Range',
            'note' => number_format($dom, 1) . "% — BTC season. Capital rotating into BTC before alt season."];
    }

    // 9b. BTC 상관 지표 (알트코인 전용)
    if ($coin !== 'BTC' && $coin !== 'USDT') {
        $domVal = is_array($dominance) ? $dominance['btc'] : $dominance;
        $btcCorrScore = round(lerpScore($domVal, [[40, 8], [50, 8], [55, 6], [60, 4], [70, 2]]), 1);
        $det['btc_corr'] = ['key' => 'btc_corr', 'label' => 'BTC Dom — Alt Signal', 'max' => 8, 'score' => $btcCorrScore,
            'value' => number_format($domVal, 1), 'unit' => '%', 'target' => 'Alt season ≤ 50%',
            'signal' => $domVal <= 50 ? 'Alt Season' : ($domVal <= 55 ? 'Transitioning' : 'BTC Season'),
            'note' => "BTC 도미넌스 " . number_format($domVal, 1) . "%. 알트 유리 구간: 50% 이하. 현재 BTC 시즌."];
    }

    // 10. Halving Cycle — BTC는 /5, 알트코인은 /2로 축소
    // (BTC 고유의 반감기 패턴이 알트코인 사이클에도 그대로 적용된다는 근거가 약함 — 특히 이번 사이클은
    // "알트시즌 부재"가 두드러져, 알트코인에 대한 이 지표의 신뢰도를 낮게 책정함)
    $haveMax = $coin === 'BTC' ? 5 : 2;
    $h = $halving_months;
    $s = round(lerpScore($h, [[0, 0.4], [6, 0.8], [12, 1.0], [24, 1.0], [30, 0.6], [48, 0.2]]) * $haveMax, 1);
    $det['halving'] = ['key' => 'halving', 'label' => 'Halving Cycle', 'max' => $haveMax, 'score' => $s,
        'value' => $h, 'unit' => 'mo',
        'target' => '12~24mo before = bottom zone', 'signal' => ($h >= 12 && $h <= 24) ? 'Core Bottom Zone' : 'General',
        'note' => "$h months to next halving (Apr 2028). Historical bottoms at 17~18mo before." . ($coin !== 'BTC' ? ' ⚠️ 알트코인은 BTC 반감기 패턴과의 연동성이 약해 가중치를 낮게 책정함.' : '')];

    // ── 기술적 지표 (전 코인 공통) ──
    $rsi = $ind['rsi14'] ?? 50;
    // (volChg는 더 이상 점수 계산에 안 쓰임 — 15분봉 기반 fast_vol_ratio로 대체됨)
    $btcCorr = $ind['btc_corr_value'] ?? 0.7;

    // RSI: 알트는 14로. (지난 개편서 18로 올렸으나, 저평가 알트가 현재 RSI 중립일 때
    // 과도하게 눌리는 부작용 → 14로 완화. 밸류에이션 비중을 대신 키움)
    $rsiMax = ($coin === 'BTC') ? 15 : 14;
    $s = round(lerpScore($rsi, [[15, 15], [25, 15], [35, 12], [45, 8], [55, 5], [70, 2], [85, 0]]) * ($rsiMax / 15), 1);
    $det['rsi'] = ['key' => 'rsi', 'label' => 'RSI (14d)', 'max' => $rsiMax, 'score' => $s,
        'value' => number_format($rsi, 1), 'unit' => '',
        'target' => 'Oversold ≤ 30', 'signal' => $rsi <= 30 ? 'Oversold (Bottom)' : ($rsi >= 70 ? 'Overbought' : 'Neutral'),
        'note' => "RSI " . number_format($rsi, 1) . ". 30 이하 과매도(저점 신호), 70 이상 과매수(고점 신호)."];

    // 거래량 가속도 — 15분봉 기준 (기존 일봉 기준은 최대 24시간 지연이 있었음 → 실시간성 개선)
    $volR1h = $ind['fast_vol_ratio_1h'] ?? 1.0;
    $volR4h = $ind['fast_vol_ratio_4h'] ?? 1.0;
    $volScore = max(lerpScore($volR1h, [[0.3, 2], [1.0, 4], [2.0, 6], [4.0, 8], [8.0, 10]]),
                     lerpScore($volR4h, [[0.3, 2], [1.0, 4], [2.5, 6], [5.0, 8], [10.0, 10]]));
    $s = round($volScore, 1);
    $det['vol_change'] = ['key' => 'vol_change', 'label' => 'Volume Acceleration (15m vs 1h/4h)', 'max' => 10, 'score' => $s,
        'value' => number_format($volR1h, 2) . 'x / ' . number_format($volR4h, 2) . 'x', 'unit' => '',
        'target' => 'Volume spike near lows = capitulation-to-rebound signal',
        'signal' => $volR1h >= 2.0 ? 'Volume Spike' : ($volR1h <= 0.5 ? 'Volume Dry-up' : 'Normal'),
        'note' => "최근 15분봉 거래량이 직전 1시간 평균 대비 " . number_format($volR1h, 2) . "배, 4시간 평균 대비 " . number_format($volR4h, 2) . "배. 일봉 기준보다 지연이 훨씬 짧음(최대 15분~1시간)."];

    // 11. 매도 주도 거래량 — 캐피틀레이션(투항 매도) 탐지, 15분봉 기준 /10
    // 기존엔 일봉 기준이라 최대 24시간 지연됐음(어제 상황만 반영). 이제 가장 최근 마감된 15분봉으로
    // 판단해서 15분~1시간 단위로 갱신 — "지금 막 떨어지는" 상황도 거의 실시간으로 잡을 수 있음.
    $fastBuyRatio = $ind['fast_buy_ratio'] ?? 0.5;
    $fastIsRed = $ind['fast_is_red'] ?? false;
    $fastSellRatio = 1 - $fastBuyRatio;
    $fastSpikeFactor = max(0, min(1, ($volR1h - 0.5) / 3.5)); // 0.5x~4x 구간을 0~1로 정규화
    $fastBase = lerpScore($fastSellRatio, [[0.40, 1], [0.50, 4], [0.58, 7], [0.70, 10]]);
    $s = round(min(10, $fastBase * (0.4 + 0.6 * $fastSpikeFactor) * ($fastIsRed ? 1.0 : 0.5)), 1);
    $det['sell_pressure'] = ['key' => 'sell_pressure', 'label' => 'Live Sell-Led Volume — Capitulation', 'max' => 10, 'score' => $s,
        'value' => number_format($fastSellRatio * 100, 1), 'unit' => '%',
        'target' => 'Sell ratio ≥ 58% + volume spike + red candle (last 15m)',
        'signal' => $s >= 7 ? 'Capitulation' : ($s >= 4 ? 'Mild Selling' : 'Buyer-led (Caution)'),
        'note' => "최근 15분봉 매도 주도 거래량 " . number_format($fastSellRatio * 100, 1) . "%, " . ($fastIsRed ? '음봉(하락)' : '양봉(상승)') . ". 1시간 거래량 " . number_format($volR1h, 2) . "배. 일봉 대신 15분봉이라 거의 실시간 반영됨."];

    if ($coin !== 'BTC') {
        $s = round(lerpScore($btcCorr, [[0, 5], [0.3, 5], [0.5, 4], [0.7, 3], [0.85, 2], [1.0, 1]]), 1);
        $det['btc_corr_tech'] = ['key' => 'btc_corr_tech', 'label' => 'BTC Correlation (30d)', 'max' => 5, 'score' => $s,
            'value' => number_format($btcCorr, 2), 'unit' => '',
            'target' => 'Low correlation = independent strength',
            'signal' => $btcCorr <= 0.5 ? 'Independent' : ($btcCorr >= 0.85 ? 'Highly Correlated' : 'Moderate'),
            'note' => "BTC와의 30일 상관계수 " . number_format($btcCorr, 2) . ". 낮을수록 독자적 모멘텀(고유 강세 가능성)."];
    }

    $raw = array_sum(array_column($det, 'score'));
    $total_max = array_sum(array_column($det, 'max'));
    $final = min(10, round($raw / $total_max * 10, 1));

    // 6단계 LONG 액션 (2026-07 재정의)
    // 핵심 수정: 롱 점수가 낮다 = "매수 매력 약함"이지 "팔아라"가 아님.
    // 예전엔 3.5 미만을 EXIT LONG(청산), 3.5~5를 SPLIT EXIT(정리)로 라벨해서,
    // -64% 빠진 저평가 알트한테도 "팔아라"는 잘못된 신호가 나왔음(숏 점수도 낮은데 모순).
    // → 매도/청산 지시는 숏 점수 몫으로 넘기고, 롱 점수 낮은 구간은 "관망/진입보류"로만.
    if ($final >= 8.0) { $action = 'FULL LONG'; $acolor = '#22c55e'; $actionDesc = '역대급 저점. 목표 비중 100% 전량 진입.'; }
    elseif ($final >= 7.0) { $action = 'ADD LONG'; $acolor = 'var(--green)'; $actionDesc = '강한 저점. 목표 비중 70~100% 확대.'; }
    elseif ($final >= 6.0) { $action = 'SPLIT LONG'; $acolor = 'var(--green2)'; $actionDesc = '분할 진입 시작. 목표 비중 30~50%.'; }
    elseif ($final >= 4.5) { $action = 'WATCH'; $acolor = '#a3e635'; $actionDesc = '관찰 구간. 저점 신호(과매도·투매·거래량 급증) 대기.'; }
    elseif ($final >= 3.0) { $action = 'NO ENTRY'; $acolor = 'var(--orange)'; $actionDesc = '신규 진입 보류. 매수 매력 약함(팔라는 뜻 아님 — 매도는 숏 점수 참고).'; }
    else { $action = 'AVOID'; $acolor = 'var(--red)'; $actionDesc = '매수 부적합 구간. 신규 롱 진입 자제(청산 여부는 숏 점수로 판단).'; }

    return [
        'final' => $final, 'raw' => $raw, 'max' => $total_max,
        'reach' => round($raw / $total_max * 100, 1),
        'action' => $action, 'acolor' => $acolor, 'actionDesc' => $actionDesc,
        'details' => $det, 'mode' => 'buy',
    ];
}

/**
 * SHORT(매도 타이밍) 점수 계산
 */
function calcSell(array $ind): array {
    $coin = $ind['coin'];
    $mvrv_z = $ind['mvrv_z'];
    $nupl = $ind['nupl'];
    $sth_sopr = $ind['sth_sopr'];
    $funding = $ind['funding'];
    $cb_premium = $ind['cb_premium'];
    $lth_pct = $ind['lth_pct'];
    $dominance = $ind['dominance'];
    $ath_drop = $ind['ath_drop'];
    $halving_months = $ind['halving_months'];
    $price = $ind['price'];
    $realized_price = $ind['realized_price'];

    $det = [];
    $s = 0;
    $isBTCFamily = ($coin === 'BTC');

    if ($isBTCFamily) {
        // 1. MVRV Z — 과열 /12 (기존 20 → 12. NUPL과 같은 realized cap 기반이라 중복 가중치 축소)
        $s = round(lerpScore($mvrv_z, [[0.5, 1], [1.5, 4], [2.5, 7], [3.5, 10], [5.0, 12], [6.5, 12]]), 1);
        $det['mvrv_z'] = ['key' => 'mvrv_z', 'label' => 'MVRV Z — Overheat', 'max' => 12, 'score' => $s,
            'value' => number_format($mvrv_z, 3), 'unit' => '',
            'target' => 'SHORT zone ≥ 3.5', 'signal' => $mvrv_z >= 3.5 ? 'Overheated' : ($mvrv_z >= 1.5 ? 'Elevated' : 'Low (Safe)'),
            'note' => number_format($mvrv_z, 3) . " — 저점 구간. 숏 진입은 3.5 이상. ⚠️ NUPL과 상관성 높은 보조 지표."];

        // 2. NUPL — 탐욕 /8 (기존 15 → 8)
        $s = round(lerpScore($nupl, [[0.10, 0], [0.35, 2], [0.50, 4], [0.60, 6], [0.75, 8], [0.9, 8]]), 1);
        $det['nupl'] = ['key' => 'nupl', 'label' => 'NUPL — Greed Level', 'max' => 8, 'score' => $s,
            'value' => number_format($nupl * 100, 1), 'unit' => '%',
            'target' => 'SHORT zone ≥ 60%', 'signal' => $nupl >= 0.6 ? 'Euphoria' : ($nupl >= 0.35 ? 'Optimism' : 'Fear (Safe)'),
            'note' => number_format($nupl * 100, 1) . "% — 공포/희망 구간. 숏은 60% 이상."];

        // 3. STH-SOPR — 수익실현 /13 (기존 10 → 13. 단기보유자 행동 데이터라 MVRV/NUPL과 비교적 독립적)
        $sopr = ($sth_sopr >= 0.90 && $sth_sopr <= 1.10) ? $sth_sopr : 0.96;
        $s = round(lerpScore($sopr, [[0.95, 1], [1.0, 3], [1.02, 5], [1.04, 9], [1.06, 13], [1.08, 13]]), 1);
        $det['sth_sopr'] = ['key' => 'sth_sopr', 'label' => 'STH-SOPR — Profit Taking', 'max' => 13, 'score' => $s,
            'value' => number_format($sopr, 3), 'unit' => '',
            'target' => 'SHORT zone ≥ 1.04', 'signal' => $sopr >= 1.04 ? 'Distribution' : ($sopr >= 1.0 ? 'Mild Profit' : 'Loss (Safe)'),
            'note' => number_format($sopr, 3) . " — 손실 실현 중(저점). 숏은 1.04 이상."];

        // 6. Coinbase Premium — FOMO /15 (기존 10 → 15. 기관 자금 흐름은 비교적 독립적인 단기 선행 신호)
        $cbp = is_numeric($cb_premium) ? $cb_premium : -0.13;
        $s = round(lerpScore($cbp, [[0, 1], [0.05, 3], [0.15, 6], [0.30, 11], [0.45, 15], [0.6, 15]]), 1);
        $det['cb_premium'] = ['key' => 'cb_premium', 'label' => 'Coinbase Premium — FOMO', 'max' => 15, 'score' => $s,
            'value' => number_format($cbp, 4), 'unit' => '%',
            'target' => 'SHORT zone ≥ 0.15%', 'signal' => $cbp >= 0.15 ? 'Institutional FOMO' : ($cbp >= 0 ? 'Mild' : 'Sideline (Safe)'),
            'note' => ($cbp >= 0 ? '+' : '') . number_format($cbp, 4) . "% — 기관 관망(저점). 숏은 0.15% 이상."];

        // 7. LTH Supply — 분산 감지 /17 (기존 10 → 17. 장기보유자 행동은 가장 느리지만 가장 독립적인 데이터)
        $lthp = $lth_pct ?: 79;
        $s = round(lerpScore($lthp, [[60, 17], [65, 17], [70, 12], [74, 7], [78, 3], [85, 1]]), 1);
        $det['lth_supply'] = ['key' => 'lth_supply', 'label' => 'LTH Supply — Distribution', 'max' => 17, 'score' => $s,
            'value' => number_format($lthp, 1), 'unit' => '%',
            'target' => 'SHORT zone ≤ 70%', 'signal' => $lthp <= 70 ? 'Distribution' : ($lthp <= 74 ? 'Mild' : 'Accumulation (Safe)'),
            'note' => number_format($lthp, 1) . "% — 역대급 축적(저점). 숏은 70% 이하."];
    } else {
        // ── 알트코인: 추정 지표 (배점 축소) ──
        // 2026-07 개편: 매수와 대칭으로 배점 축소. 강세장 고점에선 실현가 갭이 쉽게 포화되므로
        // 배점을 25→16으로 낮추고, 만점 구간을 +220%→+300%로 더 극단화.
        $rp_gap = ($price - $realized_price) / $realized_price * 100;
        $s = round(lerpScore($rp_gap, [[-60, 1], [0, 4], [30, 7], [80, 10], [150, 13], [250, 15], [300, 16]]), 1);
        $det['alt_short_valuation'] = ['key' => 'alt_short_valuation', 'label' => 'Price vs Est. Realized (Short)', 'max' => 16, 'score' => $s,
            'value' => number_format($rp_gap, 1), 'unit' => '%',
            'target' => 'SHORT zone ≥ 30% above realized',
            'signal' => $rp_gap >= 30 ? 'Overvalued' : ($rp_gap >= 0 ? 'Mild Premium' : 'Below Realized (Safe)'),
            'note' => "현재가 대비 추정 실현가 갭 " . number_format($rp_gap, 1) . "%. 양수가 클수록 고평가(숏 유리). ⚠️ 추정치입니다."];

        // ATH 근접: 20→10으로 축소. 고점 근접은 과열 신호지만 실현가 갭과 중복되므로 보조로.
        $atd = $ath_drop;
        $s = round(lerpScore($atd, [[-95, 0.5], [-60, 3], [-35, 6], [-15, 10], [0, 10]]), 1);
        $det['alt_short_ath'] = ['key' => 'alt_short_ath', 'label' => 'ATH Proximity — Overheat', 'max' => 10, 'score' => $s,
            'value' => number_format($atd, 1), 'unit' => '%',
            'target' => 'SHORT zone: within -15% of ATH',
            'signal' => $atd >= -15 ? 'Near ATH' : ($atd >= -30 ? 'Elevated' : 'Far from ATH (Safe)'),
            'note' => "ATH \$" . fmtN(ATH_MAP[$coin] ?? 0) . " 대비 " . number_format($atd, 1) . "%. 고점 근접할수록 숏 유리. ⚠️ 보조 지표."];
    }

    // ── 공통 지표 ──
    $fgap = is_numeric($funding) ? $funding : 0.005;
    $s = round(lerpScore($fgap, [[-0.05, 1], [0, 2], [0.01, 4], [0.05, 7], [0.10, 12], [0.15, 15], [0.25, 15]]), 1);
    $det['funding'] = ['key' => 'funding', 'label' => 'Futures Premium', 'max' => 15, 'score' => $s,
        'value' => number_format($fgap, 5), 'unit' => '%',
        'target' => 'SHORT zone ≥ 0.10%', 'signal' => $fgap >= 0.10 ? 'Long Overload' : ($fgap >= 0.01 ? 'Mild' : 'Backwardation (Safe)'),
        'note' => ($fgap >= 0 ? '+' : '') . number_format($fgap, 5) . "% — 역프리미엄(매수신호). 숏은 0.10% 이상."];

    $domV = is_array($dominance) ? $dominance['btc'] : ($dominance ?: 55.8);
    $s = round(lerpScore($domV, [[40, 8], [45, 8], [50, 6], [55, 3], [65, 1]]), 1);
    $det['dom'] = ['key' => 'dom', 'label' => 'BTC Dominance — Alt Risk', 'max' => 8, 'score' => $s,
        'value' => number_format($domV, 1), 'unit' => '%',
        'target' => 'SHORT zone ≤ 50%', 'signal' => $domV <= 50 ? 'Alt Season Risk' : ($domV <= 55 ? 'Transitioning' : 'BTC Season (Safe)'),
        'note' => number_format($domV, 1) . "% — BTC 시즌(안전). 숏은 50% 이하(알트 과열)."];

    $haveMaxS = $coin === 'BTC' ? 5 : 2;
    $hm = $halving_months ?: 22;
    $elapsed = max(0, 48 - $hm);
    $s = round(lerpScore($elapsed, [[0, 0.4], [6, 0.8], [12, 1.0], [18, 0.8], [24, 0.6], [30, 0.4], [36, 0.2]]) * $haveMaxS, 1);
    $det['halving'] = ['key' => 'halving', 'label' => 'Halving Cycle — Top Detection', 'max' => $haveMaxS, 'score' => $s,
        'value' => $elapsed, 'unit' => 'mo after halving',
        'target' => 'SHORT optimal: 12–18 months after halving',
        'signal' => ($elapsed >= 18 && $elapsed <= 30) ? 'Past Peak' : ($elapsed >= 12 ? 'Peak Zone' : 'Rising/Bottom'),
        'note' => "반감기(2024.4) 후 {$elapsed}개월 경과. 역사적 고점 구간(12~18개월) 기준." . ($coin !== 'BTC' ? ' ⚠️ 알트코인은 BTC 반감기 패턴과의 연동성이 약해 가중치를 낮게 책정함.' : '')];

    if ($isBTCFamily) {
        $athD = $ath_drop ?: -50;
        $s = round(lerpScore($athD, [[-55, 1], [-35, 2], [-20, 3], [-10, 4], [0, 5]]), 1);
        $det['ath_pos'] = ['key' => 'ath_pos', 'label' => 'ATH Proximity', 'max' => 5, 'score' => $s,
            'value' => number_format($athD, 1), 'unit' => '%',
            'target' => 'SHORT zone > -20%', 'signal' => $athD >= -20 ? 'Near ATH' : ($athD >= -40 ? 'Mid Range' : 'Far (Safe)'),
            'note' => "ATH 대비 " . number_format($athD, 1) . "%. 저점(-55% 이하). 숏은 -20% 이상."];
    }

    // ── 기술적 지표 (전 코인 공통, SHORT 관점) ──
    $rsiS = $ind['rsi14'] ?? 50;
    // (volChgS는 더 이상 점수 계산에 안 쓰임 — 15분봉 기반 fast_vol_ratio로 대체됨)
    $btcCorrS = $ind['btc_corr_value'] ?? 0.7;

    $rsiMaxS = ($coin === 'BTC') ? 15 : 14;
    $s = round(lerpScore($rsiS, [[15, 1], [30, 2], [45, 5], [55, 8], [65, 12], [75, 15], [90, 15]]) * ($rsiMaxS / 15), 1);
    $det['rsi'] = ['key' => 'rsi', 'label' => 'RSI (14d)', 'max' => $rsiMaxS, 'score' => $s,
        'value' => number_format($rsiS, 1), 'unit' => '',
        'target' => 'Overbought ≥ 70', 'signal' => $rsiS >= 70 ? 'Overbought (Top)' : ($rsiS <= 30 ? 'Oversold' : 'Neutral'),
        'note' => "RSI " . number_format($rsiS, 1) . ". 70 이상 과매수(고점/숏 신호), 30 이하 과매도(저점)."];

    // 거래량 가속도 — 15분봉 기준 (SHORT 관점에서도 동일하게 지연 개선)
    $volR1hS = $ind['fast_vol_ratio_1h'] ?? 1.0;
    $volR4hS = $ind['fast_vol_ratio_4h'] ?? 1.0;
    $volScoreS = max(lerpScore($volR1hS, [[0.3, 2], [1.0, 4], [2.0, 6], [4.0, 8], [8.0, 10]]),
                      lerpScore($volR4hS, [[0.3, 2], [1.0, 4], [2.5, 6], [5.0, 8], [10.0, 10]]));
    $s = round($volScoreS, 1);
    $det['vol_change'] = ['key' => 'vol_change', 'label' => 'Volume Acceleration (15m vs 1h/4h)', 'max' => 10, 'score' => $s,
        'value' => number_format($volR1hS, 2) . 'x / ' . number_format($volR4hS, 2) . 'x', 'unit' => '',
        'target' => 'Volume spike near highs = distribution (selling) signal',
        'signal' => $volR1hS >= 2.0 ? 'Volume Spike' : ($volR1hS <= 0.5 ? 'Volume Dry-up' : 'Normal'),
        'note' => "최근 15분봉 거래량이 직전 1시간 평균 대비 " . number_format($volR1hS, 2) . "배, 4시간 평균 대비 " . number_format($volR4hS, 2) . "배. 일봉 기준보다 지연이 훨씬 짧음(최대 15분~1시간)."];

    // 매수 주도 거래량 — 과열/FOMO 탐지, 15분봉 기준 /10
    // 기존엔 일봉 기준이라 최대 24시간 지연됐음. 이제 최근 15분봉으로 거의 실시간 반영.
    $fastBuyRatioS = $ind['fast_buy_ratio'] ?? 0.5;
    $fastIsRedS = $ind['fast_is_red'] ?? false;
    $fastSpikeFactorS = max(0, min(1, ($volR1hS - 0.5) / 3.5));
    $fastBaseS = lerpScore($fastBuyRatioS, [[0.50, 1], [0.58, 4], [0.65, 7], [0.75, 10]]);
    $s = round(min(10, $fastBaseS * (0.4 + 0.6 * $fastSpikeFactorS) * ($fastIsRedS ? 0.5 : 1.0)), 1);
    $det['buy_pressure'] = ['key' => 'buy_pressure', 'label' => 'Live Buy-Led Volume — FOMO/Overheat', 'max' => 10, 'score' => $s,
        'value' => number_format($fastBuyRatioS * 100, 1), 'unit' => '%',
        'target' => 'Buy ratio ≥ 65% + volume spike + green candle (last 15m)',
        'signal' => $s >= 7 ? 'FOMO Buying' : ($s >= 4 ? 'Mild Buying' : 'Seller-led (Safe)'),
        'note' => "최근 15분봉 매수 주도 거래량 " . number_format($fastBuyRatioS * 100, 1) . "%, " . ($fastIsRedS ? '음봉(하락)' : '양봉(상승)') . ". 1시간 거래량 " . number_format($volR1hS, 2) . "배. 일봉 대신 15분봉이라 거의 실시간 반영됨."];

    if ($coin !== 'BTC') {
        // SHORT 관점에서는 BTC와 상관계수가 높을수록(=BTC 약세를 그대로 따라갈 가능성) 유리하므로
        // LONG 쪽(낮은 상관계수가 유리)과 반대 방향으로 채점해야 함.
        // 기존 코드는 LONG 공식을 그대로 복사해서 방향이 뒤집혀 있었음 (높은 상관계수가 최저점을 받던 버그).
        $s = round(lerpScore($btcCorrS, [[0, 1], [0.3, 2], [0.5, 3], [0.7, 4], [0.85, 5], [1.0, 5]]), 1);
        $det['btc_corr_tech'] = ['key' => 'btc_corr_tech', 'label' => 'BTC Correlation (30d)', 'max' => 5, 'score' => $s,
            'value' => number_format($btcCorrS, 2), 'unit' => '',
            'target' => 'High correlation = follows BTC weakness',
            'signal' => $btcCorrS >= 0.85 ? 'Highly Correlated' : ($btcCorrS <= 0.5 ? 'Independent' : 'Moderate'),
            'note' => "BTC와의 30일 상관계수 " . number_format($btcCorrS, 2) . ". 독자적 강세(저상관)는 숏에 불리할 수 있음."];
    }

    $rawSell = array_sum(array_column($det, 'score'));
    $maxSell = array_sum(array_column($det, 'max'));
    $finalSell = min(10, round($rawSell / $maxSell * 10, 1));

    // 6단계 SHORT 액션 (LONG과 동일한 이유로 임계값 하향 조정)
    if ($finalSell >= 8.0) { $shortSignal = 'FULL SHORT'; $sellColor = '#dc2626'; $shortDesc = '극단 과열. 풀 숏 진입.'; }
    elseif ($finalSell >= 7.0) { $shortSignal = 'ADD SHORT'; $sellColor = 'var(--red)'; $shortDesc = '강한 과열. 숏 비중 확대.'; }
    elseif ($finalSell >= 6.0) { $shortSignal = 'PREPARE SHORT'; $sellColor = 'var(--orange)'; $shortDesc = '과열 시작. 숏 준비.'; }
    elseif ($finalSell >= 5.0) { $shortSignal = 'WATCH'; $sellColor = '#a3e635'; $shortDesc = '중립 관찰.'; }
    elseif ($finalSell >= 3.5) { $shortSignal = 'SPLIT EXIT'; $sellColor = 'var(--green2)'; $shortDesc = '저점 근접. 숏 분할 청산.'; }
    else { $shortSignal = 'EXIT SHORT'; $sellColor = 'var(--green)'; $shortDesc = '바닥. 숏 즉시 청산.'; }

    return [
        'final' => $finalSell, 'raw' => $rawSell, 'max' => $maxSell,
        'reach' => round($rawSell / $maxSell * 100, 1),
        'shortSignal' => $shortSignal, 'action' => $shortSignal, 'acolor' => $sellColor,
        'shortDesc' => $shortDesc, 'details' => $det, 'mode' => 'sell',
    ];
}
