<?php
/**
 * OG 렌더 진단 v2 — 2026-07-16 (1회용. 확인 끝나면 삭제할 것)
 *
 * v1 로 밝혀진 것:
 *   - Imagick 6.9.12-64, Delegates 에 rsvg 없음 → 내부 MSVG 렌더러 사용
 *   - MSVG 는 @font-face{src:url(file://…)} 를 무시한다 (두 폰트 → md5 동일로 증명)
 *   - 즉 우리가 올린 NotoSans/NotoCJK 는 SVG 렌더에 단 한 번도 안 쓰였다
 *   - GD(imagettftext)는 폰트 파일을 제대로 읽는다 (잉크 5132 vs 3233)
 *
 * v2 가 답할 것:
 *   MSVG 는 @font-face 는 무시해도 '자기가 아는 폰트 이름'은 쓴다.
 *   서버 폰트 77개 중 터키어(ığşİ)·한국어·일본어·베트남어·키릴을
 *   제대로 그리는 게 있는지 전수로 찾는다.
 *   → 있으면 차트를 살린 채 font-family 만 바꿔서 해결
 *   → 없으면 렌더 방식을 바꿔야 한다 (차트 포기 등, 기획 판단 필요)
 *
 * 사용:  https://btctiming.com/_ogdiag.php?token=<SNAPSHOT_TOKEN>
 */

require_once __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');
@set_time_limit(120);

$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403);
    echo "forbidden\n";
    exit;
}
if (!extension_loaded('imagick')) { echo "imagick 없음\n"; exit; }

function h1(string $s): void { echo "\n" . str_repeat('=', 72) . "\n" . $s . "\n" . str_repeat('=', 72) . "\n"; }

/** 지정한 font-family 이름으로 문자열을 MSVG 렌더해서 잉크 픽셀 수를 센다.
 *  글자가 제대로 그려지면 잉크가 크게 나오고, 빈칸이면 0, 빈네모면 특정 값으로 고정된다. */
function ink(string $family, string $text): int {
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
         . '<svg xmlns="http://www.w3.org/2000/svg" width="500" height="110" viewBox="0 0 500 110">'
         . '<rect width="500" height="110" fill="#000"/>'
         . '<text x="8" y="75" fill="#fff" font-size="56" font-family="' . htmlspecialchars($family, ENT_QUOTES, 'UTF-8') . '">'
         . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . '</text></svg>';
    try {
        $im = new Imagick();
        $im->setBackgroundColor(new ImagickPixel('black'));
        $im->readImageBlob($svg);
        $n = 0;
        $it = $im->getPixelIterator();
        foreach ($it as $row) { foreach ($row as $px) { $c = $px->getColor(); if (($c['r']+$c['g']+$c['b']) > 200) $n++; } $it->syncIterator(); }
        $im->clear();
        return $n;
    } catch (Throwable $e) { return -1; }
}

$TESTS = [
    'tr' => 'ığşİ',        // 터키어 — 지금 깨지는 것
    'ko' => '한글비트',
    'ja' => 'ビット',
    'vi' => 'ơưễệ',
    'ru' => 'Привет',
    'lat'=> 'Abcö',        // 대조군 — 어떤 폰트든 그려져야 함
];

h1('0) 기준값 — 이 서버가 지금 실제로 쓰는 폰트 (font-family 미지정)');
$base = [];
foreach ($TESTS as $k => $t) { $base[$k] = ink('OG-does-not-exist', $t); }
foreach ($TESTS as $k => $t) printf("  %-4s \"%s\"  잉크 %5d\n", $k, $t, $base[$k]);
echo "\n  ★ 이게 지금 차트에 쓰이는 폰트다. tr 값이 lat 과 비슷하면 '뭔가' 그리고는 있다는 뜻\n";
echo "    (지금 화면엔 ç→▶ 로 나오므로, 그려지긴 하지만 엉뚱한 글자다)\n";

h1('1) 서버 폰트 전수 테스트 — 터키어 ığşİ 를 제대로 그리는 폰트 찾기');
$fonts = Imagick::queryFonts('*');
printf("  폰트 %d개 × 6개 언어 = %d회 렌더\n\n", count($fonts), count($fonts)*6);
printf("  %-30s %6s %6s %6s %6s %6s %6s\n", '폰트', 'tr', 'ko', 'ja', 'vi', 'ru', 'lat');
echo '  ' . str_repeat('-', 70) . "\n";

$good = [];
foreach ($fonts as $f) {
    $r = [];
    foreach ($TESTS as $k => $t) $r[$k] = ink($f, $t);
    // 대조군(lat)이 그려지고 tr 도 그려지며, tr 이 기본폰트와 다른 결과면 후보
    $isCand = $r['lat'] > 100 && $r['tr'] > 100 && $r['tr'] !== $base['tr'];
    if ($isCand) $good[] = $f;
    printf("  %-30s %6d %6d %6d %6d %6d %6d%s\n", substr($f,0,30), $r['tr'], $r['ko'], $r['ja'], $r['vi'], $r['ru'], $r['lat'], $isCand ? '  ←후보' : '');
}

h1('2) 결론');
if ($good) {
    echo "  터키어를 기본폰트와 다르게(=제대로일 가능성) 그리는 폰트: " . count($good) . "개\n";
    foreach ($good as $g) echo "    - $g\n";
    echo "\n  → 이 중 ko/ja 도 되는 게 있으면 그걸로 통일, 없으면 언어별로 나눠 쓴다.\n";
} else {
    echo "  ★ 터키어를 제대로 그리는 서버 폰트가 없다.\n";
    echo "    → MSVG 로는 해결 불가. 렌더 방식을 바꿔야 한다(차트 포기 등).\n";
}

h1('끝 — 결과를 그대로 복사해서 주세요');
echo "확인 후 이 파일(_ogdiag.php)은 삭제하십시오.\n";
