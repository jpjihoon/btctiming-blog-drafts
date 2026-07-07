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
$allowedLangs = ['ko','en','ja','es','de'];
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

// 캐시 경로 (meta 파일보다 새 이미지가 있으면 그대로 반환)
$cacheDir = __DIR__ . '/og';
if (!is_dir($cacheDir)) @mkdir($cacheDir, 0755, true);
$cacheFile = $cacheDir . '/og-' . $slug . '-' . $lang . '.png';

if (is_readable($cacheFile) && filemtime($cacheFile) >= filemtime($metaFile)) {
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

$fontFile = __DIR__ . '/NotoCJK-Bold.otf';

// ── SVG 구성 ──
function xml(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$tspans = '';
$y0 = 300;
foreach ($lines as $i => $ln) {
    $tspans .= '<text x="80" y="' . ($y0 + $i * 74) . '" fill="#f0f0f0" font-size="52" font-weight="bold" font-family="OG">' . xml($ln) . '</text>';
}
$tagW = max(90, mb_strlen($tag) * 22 + 44);
$fontUri = 'file://' . $fontFile;
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
