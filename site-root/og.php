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

// 본문 파일 경로 (본문 안의 첫 차트 SVG를 OG로 쓰기 위함)
$bodyFile = __DIR__ . '/blog/' . $slug . '.php';
$bodyMtime = is_readable($bodyFile) ? filemtime($bodyFile) : 0;

// 캐시 경로 (meta 또는 본문이 바뀌면 새로 생성)
$cacheDir = __DIR__ . '/og';
if (!is_dir($cacheDir)) @mkdir($cacheDir, 0755, true);
$cacheFile = $cacheDir . '/og-' . $slug . '-' . $lang . '.png';

$srcMtime = max(filemtime($metaFile), $bodyMtime);
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
$fontUri = 'file://' . $fontFile;
function xml(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// ── 본문에서 첫 번째 차트 SVG 추출 ──
// 본문 글 안에 인포그래픽/차트 SVG가 있으면 그걸 OG 이미지의 주인공으로 삼는다.
// (제목 텍스트 카드가 아니라, 글 안의 실제 시각자료를 공유 썸네일로)
$chartSvg = null; $chartW = 0; $chartH = 0;
if ($bodyMtime > 0) {
    $body = file_get_contents($bodyFile);
    if ($body !== false && preg_match('/<svg\b[^>]*>.*?<\/svg>/is', $body, $mm)) {
        $raw = $mm[0];
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
            $chartSvg = $inner;
        }
    }
}

// ── OG SVG 구성 ──
if ($chartSvg !== null) {
    // [차트형 OG] 상단 브랜드+제목, 그 아래 본문 차트 배치
    $shortTitle = mb_substr($title, 0, $isCJK ? 26 : 44);
    // 차트 배치 영역: x=80, y=280, 폭 1040, 높이 320 (하단 여백 확보)
    $boxX = 80; $boxY = 280; $boxW = 1040; $boxH = 320;
    // "contain" 스케일: 폭·높이 둘 다 영역 안에 들어가도록 작은 쪽 배율 선택 (넘침 방지)
    $scale = min($boxW / $chartW, $boxH / $chartH);
    $drawW = $chartW * $scale;
    $drawH = $chartH * $scale;
    // 영역 안에서 가운데 정렬
    $offX = $boxX + ($boxW - $drawW) / 2;
    $offY = $boxY + ($boxH - $drawH) / 2;
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
    . '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">'
    . '<defs><style>@font-face{font-family:"OG";src:url("' . $fontUri . '");}</style></defs>'
    . '<rect width="1200" height="630" fill="#0d0d0f"/>'
    . '<rect x="0" y="0" width="1200" height="6" fill="#fbbf24"/>'
    . '<text x="80" y="82" fill="#f0f0f0" font-size="30" font-weight="bold" font-family="OG">BTC<tspan fill="#fbbf24">timing</tspan></text>'
    . '<text x="80" y="150" fill="#f0f0f0" font-size="42" font-weight="bold" font-family="OG">' . xml($shortTitle) . '</text>'
    . '<text x="80" y="198" fill="#fbbf24" font-size="22" font-weight="bold" font-family="OG">' . xml($tag) . '</text>'
    . '<g transform="translate(' . round($offX, 1) . ', ' . round($offY, 1) . ') scale(' . round($scale, 4) . ')">'
    . '<rect x="0" y="0" width="' . $chartW . '" height="' . $chartH . '" fill="#111113" rx="12"/>'
    . $chartSvg
    . '</g>'
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
