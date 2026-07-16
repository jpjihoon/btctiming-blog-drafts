<?php
/**
 * 표지 OG 합성 검증 — 2026-07-16 (1회용. 확인 후 삭제)
 *
 * 왜: og.php 의 표지 경로는
 *       SVG→PNG (Imagick readImageBlob)  →  로고 PNG 합성 (readImage + compositeImage)
 *     인데, '서버에서 Imagick 합성이 실제로 되는지'를 아직 확인 못 했다.
 *     오늘 MSVG 가 @font-face 를 무시한 것처럼 또 뭔가 안 될 수 있다.
 *     실제 글에 표지를 넣기 전에 여기서 먼저 확인한다.
 *
 * 사용: https://btctiming.com/_ogcovertest.php?token=<SNAPSHOT_TOKEN>
 *       → PNG 가 뜨면 성공. 텍스트 오류가 뜨면 그 내용을 보고하면 된다.
 */
require_once __DIR__ . '/config.php';

$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403); header('Content-Type: text/plain; charset=utf-8'); echo "forbidden\n"; exit;
}
function bail(string $m): void { header('Content-Type: text/plain; charset=utf-8'); echo "★ 실패: $m\n"; exit; }
if (!extension_loaded('imagick')) bail('imagick 없음');
@set_time_limit(60);

$ACC = '#38bdf8'; $UP = '#22c55e';
$CH  = '60,470 200,430 340,455 480,380 620,395 760,300 900,265 1040,190 1140,150';

// V1 시안 그대로 (로고는 <image> 가 아니라 아래에서 Imagick 으로 합성)
$svg = '<?xml version="1.0" encoding="UTF-8"?>'
 . '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">'
 . '<defs><linearGradient id="g" x1="0" y1="0" x2="0" y2="1">'
 .   '<stop offset="0" stop-color="' . $ACC . '" stop-opacity="0.28"/>'
 .   '<stop offset="1" stop-color="' . $ACC . '" stop-opacity="0"/></linearGradient></defs>'
 . '<rect width="1200" height="630" fill="#0d0d0f"/>'
 . '<polygon fill="url(#g)" points="' . $CH . ' 1140,530 60,530"/>'
 . '<polyline fill="none" stroke="' . $ACC . '" stroke-width="6" stroke-linejoin="round" points="' . $CH . '"/>'
 . '<circle cx="1140" cy="150" r="12" fill="' . $ACC . '"/>'
 . '<text x="60" y="170" fill="#f4f4f5" font-size="120" font-weight="bold">0.0283</text>'
 . '<text x="60" y="222" fill="' . $ACC . '" font-size="38" font-weight="bold">ETH / BTC</text>'
 . '<polygon fill="' . $UP . '" points="380,190 408,238 352,238"/>'
 . '<text x="424" y="234" fill="' . $UP . '" font-size="42" font-weight="bold">+4.2%</text>'
 . '<rect x="0" y="0" width="1200" height="8" fill="' . $ACC . '"/>'
 . '<text x="1150" y="596" fill="#6b6b75" font-size="24" font-weight="bold" text-anchor="end">'
 .   'BTC<tspan fill="#fbbf24">timing</tspan></text>'
 . '</svg>';

$logos = [
    ['f' => __DIR__ . '/oglogo/ETH.png', 'x' => 830, 'y' => 40, 'w' => 150, 'h' => 150],
    ['f' => __DIR__ . '/oglogo/BTC.png', 'x' => 960, 'y' => 40, 'w' => 150, 'h' => 150],
];
$notes = [];
try {
    $im = new Imagick();
    $im->setBackgroundColor(new ImagickPixel('transparent'));
    $im->readImageBlob($svg);
    $notes[] = 'SVG 렌더 OK ' . $im->getImageWidth() . 'x' . $im->getImageHeight();
} catch (Throwable $e) { bail('SVG 렌더 실패: ' . $e->getMessage()); }

foreach ($logos as $g) {
    if (!is_readable($g['f'])) { $notes[] = '로고 없음: ' . basename($g['f']); continue; }
    try {
        $lg = new Imagick();
        $lg->readImage($g['f']);
        $lg->setImageFormat('png');
        $lg->resizeImage($g['w'], $g['h'], Imagick::FILTER_LANCZOS, 1);
        $im->compositeImage($lg, Imagick::COMPOSITE_OVER, $g['x'], $g['y']);
        $lg->clear();
        $notes[] = '합성 OK: ' . basename($g['f']);
    } catch (Throwable $e) { $notes[] = '★ 합성 실패 ' . basename($g['f']) . ': ' . $e->getMessage(); }
}

if (isset($_GET['debug'])) {
    header('Content-Type: text/plain; charset=utf-8');
    foreach ($notes as $n) echo '  ' . $n . "\n";
    exit;
}
try {
    $im->setImageFormat('png');
    header('Content-Type: image/png');
    header('Cache-Control: no-store');
    echo $im->getImageBlob();
    $im->clear();
} catch (Throwable $e) { bail('PNG 출력 실패: ' . $e->getMessage()); }
