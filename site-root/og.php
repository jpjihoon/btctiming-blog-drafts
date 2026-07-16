<?php
// ─────────────────────────────────────────────────────────────
// og.php — 블로그 글 공유용 OG 이미지 동적 생성 (글별·언어별, 자동)
//
//   og.php?slug=nupl&lang=ko  →  1200×630 PNG 반환
//
// 새 글을 써도 meta/{slug}.json 만 있으면 자동으로 이미지가 생성됨.
// 한 번 만든 이미지는 /og/ 폴더에 캐싱해 다음부터 즉시 반환.
//
// 우선 Imagick(SVG 렌더) 사용, 없으면 GD 폴백.
// 폰트: 같은 폴더의 NotoCJK-Bold.otf (한/일/중/라틴 커버)
// ─────────────────────────────────────────────────────────────

$slug = preg_replace('/[^a-z0-9_-]/', '', strtolower($_GET['slug'] ?? ''));
$lang = preg_replace('/[^a-z]/', '', strtolower($_GET['lang'] ?? 'ko'));
$allowedLangs = ['ko','en','ja','es','de','fr','pt','tr','vi'];
if (!in_array($lang, $allowedLangs, true)) $lang = 'ko';
if ($slug === '') { http_response_code(400); exit('bad slug'); }

$metaFile = __DIR__ . '/blog/meta/' . $slug . '.json';
if (!is_readable($metaFile)) {
    // 메타 없으면 기본 OG 이미지로 폴백
    $fallback = __DIR__ . '/og-image.png';
    if (is_readable($fallback)) { header('Content-Type: image/png'); readfile($fallback); exit; }
    http_response_code(404); exit('no meta');
}

$meta = json_decode(file_get_contents($metaFile), true);
if (!is_array($meta)) { http_response_code(500); exit('bad meta'); }

// ═══════════════════════════════════════════════════════════════
// ★ 2026-07-16 폰트 분리 — 터키어 OG 이미지가 깨지던 문제
//   NotoCJK-Bold.otf 에는 터키어 고유문자가 없다:
//     ğ U+011F / ş U+015F / ı U+0131 / İ U+0130 / Ğ U+011E / Ş U+015E
//   → OG 제목에서 그 글자가 통째로 빠져 나갔다. (실측: "Kıymeti" → "K ymeti")
//     터키어 제목 1,061편 중 1,050편이 영향. ö/ü/ç 는 멀쩡해서 여태 안 들켰다.
//   렌더러 폰트 폴백(@font-face 중첩, font-family 목록)은 Imagick/librsvg/GD 마다
//   동작이 달라 믿을 수 없다. → 언어로 파일을 직접 고른다.
//
//   NotoSans-Bold.ttf (631KB) : 라틴 기본+확장A+확장추가+키릴
//                               en es de fr pt tr vi + 향후 id ru 커버 (실측 확인)
//   NotoCJK-Bold.otf  (17MB)  : 한/일/중 + 라틴 기본
// ═══════════════════════════════════════════════════════════════
$__ogCjkLangs  = ['ko', 'ja', 'zh'];
$__ogLatinFont = __DIR__ . '/NotoSans-Bold.ttf';
$fontFile = (!in_array($lang, $__ogCjkLangs, true) && is_readable($__ogLatinFont))
    ? $__ogLatinFont                          // 라틴/키릴 언어
    : __DIR__ . '/NotoCJK-Bold.otf';          // 한/일/중 + 라틴폰트 없을 때 폴백
$fontUri = 'file://' . $fontFile;

// 본문 파일 경로 (본문 안의 첫 차트 SVG를 OG로 쓰기 위함)
$bodyFile = __DIR__ . '/blog/' . $slug . '.php';
$bodyMtime = is_readable($bodyFile) ? filemtime($bodyFile) : 0;

// 캐시 경로 (meta 또는 본문이 바뀌면 새로 생성)
$cacheDir = __DIR__ . '/og';
if (!is_dir($cacheDir)) @mkdir($cacheDir, 0755, true);
$cacheFile = $cacheDir . '/og-' . $slug . '-' . $lang . '.png';

// ★ 2026-07-16: og.php 자신과 폰트 파일의 mtime 도 캐시 기준에 넣는다.
//   기존엔 meta/본문이 바뀔 때만 캐시를 버려서, og.php 나 폰트를 바꿔도
//   이미 만들어진 PNG 가 영원히 그대로 나갔다. (터키어 폰트 수정이 안 먹은 원인)
$srcMtime = max(
    filemtime($metaFile),
    $bodyMtime,
    filemtime(__FILE__),
    is_readable($fontFile) ? filemtime($fontFile) : 0
);
if (is_readable($cacheFile) && filemtime($cacheFile) >= $srcMtime) {
    header('Content-Type: image/png');
    header('Cache-Control: public, max-age=86400');
    readfile($cacheFile);
    exit;
}

// ── 텍스트 준비 ──
function pick(array $m, string $key, string $lang): string {
    return (string)($m[$key . '_' . $lang] ?? $m[$key . '_en'] ?? $m[$key . '_ko'] ?? '');
}
$title = trim(str_replace('<br>', ' ', pick($meta, 'title', $lang)));
$tag   = trim(pick($meta, 'tag', $lang));
$slogans = [
    'ko' => '비트코인 매수·매도 타이밍',
    'en' => 'Bitcoin buy/sell timing',
    'ja' => 'ビットコイン売買タイミング',
    'es' => 'Momento de compra/venta de Bitcoin',
    'de' => 'Bitcoin Kauf-/Verkaufszeitpunkt',
    'fr' => 'Timing d\'achat/vente Bitcoin',
    'pt' => 'Timing de compra/venda de Bitcoin',
    'tr' => 'Bitcoin alım/satım zamanlaması',
    'vi' => 'Thời điểm mua/bán Bitcoin',
];
$slogan = $slogans[$lang] ?? $slogans['en'];

// 제목 줄바꿈 (글자수 기준; CJK는 짧게)
$isCJK = in_array($lang, ['ko','ja'], true);
$maxChars = $isCJK ? 20 : 32;
$lines = og_wrap($title, $maxChars, 3);

function og_wrap(string $text, int $max, int $maxLines): array {
    $words = preg_split('/\s+/u', $text);
    $lines = []; $cur = '';
    foreach ($words as $w) {
        $try = ($cur === '') ? $w : ($cur . ' ' . $w);
        if (mb_strlen($try) > $max && $cur !== '') { $lines[] = $cur; $cur = $w; }
        else { $cur = $try; }
        if (count($lines) >= $maxLines) break;
    }
    if ($cur !== '' && count($lines) < $maxLines) $lines[] = $cur;
    // 한 단어가 너무 길면(CJK 붙은 경우) 강제로 잘라 여러 줄
    if (count($lines) === 1 && mb_strlen($lines[0]) > $max) {
        $s = $lines[0]; $lines = [];
        for ($i = 0; $i < mb_strlen($s) && count($lines) < $maxLines; $i += $max) {
            $lines[] = mb_substr($s, $i, $max);
        }
    }
    return array_slice($lines, 0, $maxLines);
}

function xml(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// ── 본문에서 현재 언어에 맞는 차트 SVG 추출 ──
// 본문 글 안에 인포그래픽/차트 SVG가 있으면 그걸 OG 이미지의 주인공으로 삼는다.
//
// 실제 글 구조(가장 흔함): SVG를 언어별 <div>로 감싼다.
//   <div class="ko"><svg>…한국어…</svg></div>
//   <div class="en es de"><svg>…영어(en/es/de 공용)…</svg></div>
//   <div class="ja"><svg>…일본어…</svg></div>
//   → 부모 div의 class 목록에 현재 언어가 포함된 SVG를 골라야 한다.
//     (SVG 태그 자체엔 class가 없으므로, 부모 div를 봐야 함)
//
// 그 외 대비: (B) 하나의 SVG 안에서 <text class="ko">처럼 텍스트만 언어별로
//   나눈 경우 → 현재 언어 아닌 요소 제거. (C) 언어 구분 없는 공용 SVG → 그대로.
// og.php는 Imagick으로 정적 렌더하므로 CSS display:none이 적용되지 않는다.
// 따라서 현재 $lang이 아닌 요소를 문자열 단계에서 직접 골라내거나 제거해야 한다.
$chartSvg = null; $chartW = 0; $chartH = 0;
if ($bodyMtime > 0) {
    $body = file_get_contents($bodyFile);
    if ($body !== false) {
        $raw = og_pick_svg_for_lang($body, $lang);
        if ($raw !== null) {
            // viewBox에서 원본 크기
            if (preg_match('/viewBox="[\d.\s]*?([\d.]+)\s+([\d.]+)"/i', $raw, $vb)) {
                $chartW = (float)$vb[1]; $chartH = (float)$vb[2];
            } elseif (preg_match('/width="([\d.]+)"[^>]*height="([\d.]+)"/i', $raw, $wh)) {
                $chartW = (float)$wh[1]; $chartH = (float)$wh[2];
            }
            if ($chartW > 0 && $chartH > 0) {
                // <svg ...> 래퍼 제거하고 내부 그래픽만 추출
                $inner = preg_replace('/^<svg\b[^>]*>/i', '', $raw);
                $inner = preg_replace('/<\/svg>\s*$/i', '', $inner);
                // (B) 하나의 SVG 안에 언어별 텍스트가 섞여 있으면 현재 언어 아닌 요소 제거.
                $inner = og_strip_other_langs($inner, $lang);
                // ★ 2026-07-16: 글 본문 차트 SVG 는 font-family="sans-serif" 로 돼 있어
                //   서버(카페24) 기본 폰트로 그려진다. 그 폰트가 터키어 ç/ö 를
                //   엉뚱한 글자(▶/✔)로 그린다(실측). → 우리 폰트("OG")로 강제한다.
                //   바깥 SVG 의 <defs> 에 @font-face{font-family:"OG"} 가 선언돼 있다.
                $inner = preg_replace('/font-family\s*=\s*"[^"]*"/i', 'font-family="OG"', $inner);
                $chartSvg = $inner;
            }
        }
    }
}

// 본문에서 현재 언어에 가장 맞는 <svg>…</svg> 하나를 고른다.
// 우선순위:
//   1) SVG를 감싼 부모 <div class="…">의 class에 현재 언어가 포함된 것
//   2) (부모 div에 언어 표기가 있는 글에서) 영어 → 한국어 순 폴백
//   3) 부모 div 언어 표기가 전혀 없으면(공용 SVG 글) 첫 번째 SVG
// 반환: <svg …>…</svg> 문자열 또는 null
function og_pick_svg_for_lang(string $body, string $lang): ?string {
    // (1) 언어 div로 감싼 SVG들을 수집: <div class="…"> … <svg>…</svg> … </div>
    //     div가 SVG 하나만 감싸는 구조를 가정(실제 글이 그러함).
    $wrapped = []; // lang => svg
    if (preg_match_all('/<div\b[^>]*\bclass="([a-z][a-z ]*)"[^>]*>\s*(<svg\b[^>]*>.*?<\/svg>)/is', $body, $ms, PREG_SET_ORDER)) {
        foreach ($ms as $m) {
            $classList = preg_split('/\s+/', trim($m[1]));
            $svg = $m[2];
            foreach ($classList as $c) {
                // 언어 코드로 보이는 class만 취급 (2글자)
                if (preg_match('/^[a-z]{2}$/', $c) && !isset($wrapped[$c])) {
                    $wrapped[$c] = $svg;
                }
            }
        }
    }
    if (!empty($wrapped)) {
        // 부모 div 언어 표기가 있는 글 → 현재 언어 우선, 없으면 en → ko → 아무거나
        if (isset($wrapped[$lang])) return $wrapped[$lang];
        if (isset($wrapped['en'])) return $wrapped['en'];
        if (isset($wrapped['ko'])) return $wrapped['ko'];
        return reset($wrapped);
    }
    // (2) 부모 div 없이 <svg class="xx">로 언어를 표기한 글
    if (preg_match_all('/<svg\b[^>]*>.*?<\/svg>/is', $body, $all) && !empty($all[0])) {
        $byLang = []; $hasLangTagged = false;
        foreach ($all[0] as $s) {
            if (preg_match('/<svg\b[^>]*\bclass="([a-z][a-z ]*)"/i', $s, $cm)) {
                foreach (preg_split('/\s+/', trim($cm[1])) as $c) {
                    if (preg_match('/^[a-z]{2}$/', $c) && !isset($byLang[$c])) { $byLang[$c] = $s; $hasLangTagged = true; }
                }
            }
        }
        if ($hasLangTagged) {
            return $byLang[$lang] ?? $byLang['en'] ?? $byLang['ko'] ?? reset($byLang);
        }
        // (3) 언어 표기 전혀 없음 → 공용 SVG로 보고 첫 번째
        return $all[0][0];
    }
    return null;
}

// SVG 내부에서 현재 언어가 아닌 언어 클래스를 가진 요소를 제거.
// class="xx" (xx = 지원 9개 언어 중 현재 언어가 아닌 것)를 가진 요소를,
// 여는 태그~닫는 태그까지 통째로 삭제한다. 언어 클래스가 아예 없으면 그대로 둔다.
function og_strip_other_langs(string $svg, string $lang): string {
    $langs = ['ko','en','ja','es','de','fr','pt','tr','vi'];
    $others = array_diff($langs, [$lang]);
    foreach ($others as $ol) {
        // <tag ... class="ol" ...> ... </tag>  (같은 태그명끼리 매칭; 중첩 최소화 위해 non-greedy)
        // text/tspan/g/rect 등 자주 쓰는 요소를 개별 처리
        foreach (['text','tspan','g','rect','path','line','circle','polyline','polygon'] as $tag) {
            $svg = preg_replace(
                '/<' . $tag . '\b[^>]*\bclass="' . $ol . '"[^>]*>.*?<\/' . $tag . '>/is',
                '', $svg
            );
            // 자기닫힘 형태 <rect ... class="ol" .../>
            $svg = preg_replace(
                '/<' . $tag . '\b[^>]*\bclass="' . $ol . '"[^>]*\/>/is',
                '', $svg
            );
        }
    }
    return $svg;
}

// ── OG SVG 구성 ──
if ($chartSvg !== null) {
    // [차트형 OG — C안] 차트를 위쪽 대부분에 크게, 하단 바에 로고 + 제목 한 줄
    // 하단 바 높이 82px. 차트 배치 영역은 상단바(6) 아래 ~ 하단바 위.
    $barY = 548; $barH = 82;
    $boxX = 50; $boxY = 40; $boxW = 1100; $boxH = 480; // 차트 영역 (하단 바 위까지)
    // "contain" 스케일: 폭·높이 둘 다 영역 안에 (넘침 방지) + 차트를 최대한 크게
    $scale = min($boxW / $chartW, $boxH / $chartH);
    $drawW = $chartW * $scale;
    $drawH = $chartH * $scale;
    $offX = $boxX + ($boxW - $drawW) / 2;
    $offY = $boxY + ($boxH - $drawH) / 2;
    // 하단 바 제목: 로고 폭 고려해 길이 제한 (한 줄)
    $barTitle = mb_substr($title, 0, $isCJK ? 30 : 52);
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
    . '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">'
    . '<defs><style>@font-face{font-family:"OG";src:url("' . $fontUri . '");}</style></defs>'
    . '<rect width="1200" height="630" fill="#0d0d0f"/>'
    . '<rect x="0" y="0" width="1200" height="6" fill="#fbbf24"/>'
    . '<g transform="translate(' . round($offX, 1) . ', ' . round($offY, 1) . ') scale(' . round($scale, 4) . ')">'
    . '<rect x="0" y="0" width="' . $chartW . '" height="' . $chartH . '" fill="#111113" rx="12"/>'
    . $chartSvg
    . '</g>'
    . '<rect x="0" y="' . $barY . '" width="1200" height="' . $barH . '" fill="#161616"/>'
    . '<text x="50" y="' . ($barY + 50) . '" fill="#f0f0f0" font-size="26" font-weight="bold" font-family="OG">BTC<tspan fill="#fbbf24">timing</tspan></text>'
    . '<text x="235" y="' . ($barY + 50) . '" fill="#a1a1aa" font-size="24" font-family="OG">' . xml($barTitle) . '</text>'
    . '</svg>';
} else {
    // [제목형 OG] 본문에 차트가 없을 때 — 제목 텍스트 카드
    $tspans = '';
    $y0 = 300;
    foreach ($lines as $i => $ln) {
        $tspans .= '<text x="80" y="' . ($y0 + $i * 74) . '" fill="#f0f0f0" font-size="52" font-weight="bold" font-family="OG">' . xml($ln) . '</text>';
    }
    $tagW = max(90, mb_strlen($tag) * 22 + 44);
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
    . '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">'
    . '<defs><style>@font-face{font-family:"OG";src:url("' . $fontUri . '");}</style>'
    . '<linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0d0d0f"/><stop offset="1" stop-color="#16161a"/></linearGradient></defs>'
    . '<rect width="1200" height="630" fill="url(#bg)"/>'
    . '<rect x="0" y="0" width="1200" height="6" fill="#fbbf24"/>'
    . '<text x="80" y="130" fill="#f0f0f0" font-size="34" font-weight="bold" font-family="OG">BTC<tspan fill="#fbbf24">timing</tspan></text>'
    . '<rect x="80" y="180" width="' . $tagW . '" height="42" rx="21" fill="#2a2410"/>'
    . '<text x="' . (80 + $tagW / 2) . '" y="209" fill="#fbbf24" font-size="22" font-weight="bold" font-family="OG" text-anchor="middle">' . xml($tag) . '</text>'
    . $tspans
    . '<text x="80" y="580" fill="#888888" font-size="26" font-family="OG">btctiming.com · ' . xml($slogan) . '</text>'
    . '</svg>';
}

// ── 렌더: Imagick 우선 ──
$pngData = null;
if (extension_loaded('imagick')) {
    try {
        $im = new Imagick();
        $im->setBackgroundColor(new ImagickPixel('transparent'));
        $im->readImageBlob($svg);
        $im->setImageFormat('png');
        $pngData = $im->getImageBlob();
        $im->clear();
    } catch (Throwable $e) { $pngData = null; }
}

// ── GD 폴백 (Imagick 실패 시): SVG 못 그리므로 텍스트만 직접 ──
if ($pngData === null && extension_loaded('gd')) {
    $img = imagecreatetruecolor(1200, 630);
    $bg = imagecolorallocate($img, 13, 13, 15);
    imagefill($img, 0, 0, $bg);
    $yellow = imagecolorallocate($img, 251, 191, 36);
    $white  = imagecolorallocate($img, 240, 240, 240);
    $gray   = imagecolorallocate($img, 136, 136, 136);
    imagefilledrectangle($img, 0, 0, 1200, 6, $yellow); // 상단 바
    if (function_exists('imagettftext') && is_readable($fontFile)) {
        // 로고
        imagettftext($img, 26, 0, 80, 120, $white, $fontFile, 'BTC');
        imagettftext($img, 26, 0, 145, 120, $yellow, $fontFile, 'timing');
        // 태그
        imagettftext($img, 17, 0, 84, 208, $yellow, $fontFile, $tag);
        // 제목
        $yy = 300;
        foreach ($lines as $ln) { imagettftext($img, 38, 0, 80, $yy, $white, $fontFile, $ln); $yy += 74; }
        // 하단
        imagettftext($img, 19, 0, 80, 580, $gray, $fontFile, 'btctiming.com · ' . $slogan);
    }
    ob_start(); imagepng($img); $pngData = ob_get_clean();
    imagedestroy($img);
}

if ($pngData === null) {
    // 최후 폴백: 기본 이미지
    $fallback = __DIR__ . '/og-image.png';
    if (is_readable($fallback)) { header('Content-Type: image/png'); readfile($fallback); exit; }
    http_response_code(500); exit('render failed');
}

// 캐시에 저장
@file_put_contents($cacheFile, $pngData);

header('Content-Type: image/png');
header('Cache-Control: public, max-age=86400');
echo $pngData;
