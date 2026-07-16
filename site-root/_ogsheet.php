<?php
/**
 * OG 폰트 후보 대조표 — 2026-07-16 (1회용. 확인 후 삭제)
 *
 * 왜: v3 의 "기본과 다름" 판정은 판정력이 없었다.
 *     Standard-Symbols-PS(심볼 폰트)까지 후보로 잡혔고,
 *     Nimbus/URW/P052/Z003 는 PostScript Type1 이라 CJK 가 아예 없는데도 '다름'이 떴다.
 *     → 실제로 뭘 그리는지 이미지로 봐야 한다.
 *
 * 무엇: 후보 폰트들로 터키어/한국어를 실제 렌더해 한 장의 PNG 로 붙여 내보낸다.
 *
 * 사용: https://btctiming.com/_ogsheet.php?token=<SNAPSHOT_TOKEN>
 *       (브라우저에 이미지가 뜬다. 그걸 저장해서 주면 된다)
 */
require_once __DIR__ . '/config.php';

$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403); header('Content-Type: text/plain'); echo "forbidden\n"; exit;
}
if (!extension_loaded('imagick')) { header('Content-Type: text/plain'); echo "imagick 없음\n"; exit; }
@set_time_limit(120);

// 볼 만한 후보만 추림 (심볼/이탤릭/모노 제외)
$CANDS = [
    '(기본값 — 지금 차트가 쓰는 것)' => 'OG-nonexistent',
    'Droid-Sans-Fallback'            => 'Droid-Sans-Fallback',
    'Droid-Sans-Japanese'            => 'Droid-Sans-Japanese',
    'Nimbus-Sans'                    => 'Nimbus-Sans',
    'Nimbus-Sans-Bold'               => 'Nimbus-Sans-Bold',
    'NimbusSans-Regular'             => 'NimbusSans-Regular',
    'P052-Roman'                     => 'P052-Roman',
    'URW-Gothic-Book'                => 'URW-Gothic-Book',
    'Droid-Sans-Hebrew'              => 'Droid-Sans-Hebrew',
];
// 실제 깨지는 문장 그대로
$TR = 'Kıymeti Taşıdı çalışma döngüyü açık';
$KO = '비트코인 타이밍 점수';

$W = 1150; $ROW = 84; $H = $ROW * (count($CANDS) * 2 + 1) + 20;

$sheet = new Imagick();
$sheet->newImage($W, $H, new ImagickPixel('#101014'));
$sheet->setImageFormat('png');

$draw = new ImagickDraw();
$draw->setFillColor('#f7931a');
$draw->setFontSize(15);
$y = 26;
$draw->annotation(12, $y, 'Imagick MSVG 렌더 — 각 font-family 로 실제 그린 결과 (2026-07-16)');
$sheet->drawImage($draw);

$y = 50;
foreach ($CANDS as $label => $fam) {
    foreach ([['tr', $TR], ['ko', $KO]] as [$lc, $txt]) {
        $svg = '<?xml version="1.0" encoding="UTF-8"?>'
             . '<svg xmlns="http://www.w3.org/2000/svg" width="' . $W . '" height="' . $ROW . '" viewBox="0 0 ' . $W . ' ' . $ROW . '">'
             . '<rect width="' . $W . '" height="' . $ROW . '" fill="#101014"/>'
             . '<text x="8" y="26" fill="#8a8a94" font-size="13" font-family="Nimbus-Sans">'
             . htmlspecialchars($label . '  [' . $lc . ']', ENT_QUOTES, 'UTF-8') . '</text>'
             . '<text x="8" y="64" fill="#f0f0f0" font-size="30" font-family="' . htmlspecialchars($fam, ENT_QUOTES, 'UTF-8') . '">'
             . htmlspecialchars($txt, ENT_QUOTES, 'UTF-8') . '</text>'
             . '</svg>';
        try {
            $r = new Imagick();
            $r->setBackgroundColor(new ImagickPixel('#101014'));
            $r->readImageBlob($svg);
            $sheet->compositeImage($r, Imagick::COMPOSITE_OVER, 0, $y);
            $r->clear();
        } catch (Throwable $e) {}
        $y += $ROW;
    }
}
header('Content-Type: image/png');
header('Cache-Control: no-store');
echo $sheet->getImageBlob();
