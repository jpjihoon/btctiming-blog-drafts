<?php
// 게이지 SVG 렌더러 — gauge_meta의 zones를 받아 색깔 구간 막대 + (실시간)마커 자리를 그림
// $gauge: ['min','max','unit','zones'=>[[lo,hi,color,label],...], 'center'?,'discrete'?,'trend'?]
// $hasLive: 실시간 마커(JS로 위치 갱신)를 넣을지
// $markerId: 이 게이지의 마커 고유 id (페이지 내 유일)
if (!function_exists('render_gauge_svg')) {
// ★ 2026-07-16: $zoneLabels 추가.
//   기존엔 zones[i][3] 의 한국어 라벨을 언어와 무관하게 그대로 그렸다.
//   → 영어/일본어 등 모든 용어집 페이지의 게이지 바가 한국어로 나왔다(27개 용어 전부).
//   ($zoneLabels 가 null 이면 예전처럼 zones[i][3] 을 쓴다 — 하위호환)
function render_gauge_svg(array $gauge, bool $hasLive, string $markerId = 'gaugeMarker', ?array $zoneLabels = null): string {
    $W = 700; $H = $hasLive ? 172 : 150;
    $min = $gauge['min']; $max = $gauge['max'];
    $unit = $gauge['unit'] ?? '';
    $pad = 40; $barY = 66; $barH = 34;
    $span = ($max - $min) ?: 1;
    $xOf = function($v) use ($min, $max, $span, $pad, $W) {
        $v = max($min, min($max, $v));
        return $pad + ($v - $min) / $span * ($W - 2 * $pad);
    };
    $segs = '';
    foreach ($gauge['zones'] as $zi => $z) {
        [$lo, $hi, $color, $label] = $z;
        // 현재 언어 라벨이 있으면 그것을, 없으면 원본(한국어)을 쓴다
        if ($zoneLabels !== null && isset($zoneLabels[$zi]) && $zoneLabels[$zi] !== '') {
            $label = $zoneLabels[$zi];
        }
        $x1 = $xOf($lo); $x2 = $xOf($hi); $w = $x2 - $x1;
        $segs .= sprintf('<rect x="%.0f" y="%d" width="%.0f" height="%d" fill="%s" opacity="0.85"/>', $x1, $barY, $w, $barH, $color);
        // 구간 라벨(막대 안)
        if ($w > 44) {
            $segs .= sprintf('<text x="%.0f" y="%d" text-anchor="middle" font-size="12" font-weight="700" fill="#0a0a0a">%s</text>', ($x1 + $x2) / 2, $barY + 22, htmlspecialchars($label, ENT_QUOTES));
        }
        // 경계 눈금
        $tick = rtrim(rtrim(number_format($lo, 2), '0'), '.');
        $segs .= sprintf('<text x="%.0f" y="%d" text-anchor="middle" font-size="11" fill="#71717a">%s</text>', $x1, $barY + 52, htmlspecialchars($tick, ENT_QUOTES));
    }
    // 마지막 경계값
    $lastTick = rtrim(rtrim(number_format($max, 2), '0'), '.');
    $segs .= sprintf('<text x="%.0f" y="%d" text-anchor="middle" font-size="11" fill="#71717a">%s%s</text>', $xOf($max), $barY + 52, htmlspecialchars($lastTick, ENT_QUOTES), $unit ? htmlspecialchars($unit, ENT_QUOTES) : '');

    $marker = '';
    if ($hasLive) {
        $marker = sprintf(
            '<g id="%s" style="opacity:0;transition:opacity .4s">'
            . '<line class="gm-line" x1="0" y1="%d" x2="0" y2="%d" stroke="#fff" stroke-width="2.5"/>'
            . '<polygon class="gm-tri" points="0,%d -7,%d 7,%d" fill="#fff"/>'
            . '<text class="gm-val" x="0" y="%d" text-anchor="middle" font-size="13" font-weight="800" fill="#fff">–</text>'
            . '</g>',
            htmlspecialchars($markerId, ENT_QUOTES),
            $barY - 6, $barY + $barH + 6,
            $barY - 14, $barY - 4, $barY - 4,
            $barY + $barH + 40
        );
    }
    return sprintf(
        '<svg viewBox="0 0 %d %d" xmlns="http://www.w3.org/2000/svg" style="width:100%%;height:auto" data-gmin="%s" data-gmax="%s">%s%s</svg>',
        $W, $H, $min, $max, $segs, $marker
    );
}
}
