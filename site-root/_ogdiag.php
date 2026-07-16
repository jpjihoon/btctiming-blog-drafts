<?php
/**
 * OG 렌더 진단 v3 — 2026-07-16 (1회용. 확인 끝나면 삭제할 것)
 *
 * v2 가 500 으로 죽은 이유: getPixelIterator 로 픽셀을 PHP 루프로 셌다.
 *   500x110 = 55,000px × 462회 = 2,500만 번 → 시간/메모리 한도 초과.
 * v3: 픽셀을 안 센다. 렌더 결과 PNG 의 md5 만 비교한다. 훨씬 빠르고 판정력은 같다.
 *
 * v1 로 이미 밝혀진 것:
 *   - Imagick 6.9.12-64, rsvg 델리게이트 없음 → 내부 MSVG 렌더러
 *   - MSVG 는 @font-face{src:url(file://…)} 를 무시 (두 폰트 → md5 동일로 증명)
 *   - GD 는 폰트 파일을 제대로 읽음
 *
 * v3 가 답할 것:
 *   MSVG 도 '자기가 아는 폰트 이름'은 쓴다. 서버 폰트 중 터키어(ığşİ)를
 *   제대로 그리는 게 있는지 찾는다. 있으면 차트를 살린 채 해결 가능.
 *
 * 사용:  https://btctiming.com/_ogdiag.php?token=<SNAPSHOT_TOKEN>
 */

require_once __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');
@set_time_limit(180);
@ini_set('memory_limit', '256M');
// 죽더라도 여기까지 나온 건 보이게 — v2 는 버퍼째 날아가서 0바이트였다
while (@ob_get_level() > 0) @ob_end_flush();
@ob_implicit_flush(true);

$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403); echo "forbidden\n"; exit;
}
if (!extension_loaded('imagick')) { echo "imagick 없음\n"; exit; }

function h1(string $s): void { echo "\n" . str_repeat('=', 74) . "\n" . $s . "\n" . str_repeat('=', 74) . "\n"; }

/** font-family 이름으로 문자열을 MSVG 렌더 → PNG md5 + 바이트수.
 *  픽셀을 세지 않는다(v2 가 그것 때문에 죽었다). md5 가 다르면 다르게 그려진 것. */
function sig(string $family, string $text): array {
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
         . '<svg xmlns="http://www.w3.org/2000/svg" width="420" height="90" viewBox="0 0 420 90">'
         . '<rect width="420" height="90" fill="#000"/>'
         . '<text x="6" y="62" fill="#fff" font-size="46" font-family="' . htmlspecialchars($family, ENT_QUOTES, 'UTF-8') . '">'
         . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . '</text></svg>';
    try {
        $im = new Imagick();
        $im->setBackgroundColor(new ImagickPixel('black'));
        $im->readImageBlob($svg);
        $im->setImageFormat('png');
        $b = $im->getImageBlob();
        $im->clear();
        return ['md5' => substr(md5($b), 0, 10), 'len' => strlen($b)];
    } catch (Throwable $e) { return ['md5' => 'ERR', 'len' => 0]; }
}

$TESTS = ['tr' => 'ığşİ', 'ko' => '한글비트', 'ja' => 'ビット', 'vi' => 'ơưễệ', 'ru' => 'Привет', 'lat' => 'Abcox'];

// 빈 문자열 렌더 = "아무것도 안 그려진" 상태의 기준
$BLANK = sig('Whatever', '')['md5'];

h1('0) 지금 차트에 실제로 쓰이는 폰트 (font-family 를 없는 이름으로 준 경우)');
$base = [];
foreach ($TESTS as $k => $t) {
    $base[$k] = sig('OG-nonexistent-font-name', $t);
    printf("  %-4s \"%-8s\"  md5 %-10s  %s\n", $k, $t, $base[$k]['md5'],
        $base[$k]['md5'] === $BLANK ? '← 아무것도 안 그려짐' : '(뭔가 그려짐)');
}
echo "\n  ★ 이게 지금 터키어 차트를 ▶/✔ 로 그리고 있는 폰트다.\n";

h1('1) 서버 폰트 전수 — 터키어를 기본폰트와 다르게 그리는 게 있나');
$fonts = Imagick::queryFonts('*');
printf("  폰트 %d개 × %d개 언어 = %d회 렌더\n\n", count($fonts), count($TESTS), count($fonts) * count($TESTS));
printf("  %-28s %-11s %-11s %-11s %-11s %-11s %-11s\n", '폰트', 'tr', 'ko', 'ja', 'vi', 'ru', 'lat');
echo '  ' . str_repeat('-', 106) . "\n";

$cand = [];
foreach ($fonts as $f) {
    $r = []; $line = sprintf('  %-28s', substr($f, 0, 28));
    foreach ($TESTS as $k => $t) {
        $r[$k] = sig($f, $t);
        $mark = ($r[$k]['md5'] === $BLANK) ? '·빈칸' : (($r[$k]['md5'] === $base[$k]['md5']) ? '=기본' : '★다름');
        $line .= sprintf(' %-11s', $mark);
    }
    // 라틴이 그려지고, 터키어가 기본폰트와 다르게 그려지면 후보
    $ok = $r['lat']['md5'] !== $BLANK
       && $r['tr']['md5'] !== $BLANK
       && $r['tr']['md5'] !== $base['tr']['md5'];
    if ($ok) { $cand[] = $f; $line .= '  ←후보'; }
    echo $line . "\n";
}

h1('2) 결론');
if ($cand) {
    echo "  터키어를 기본폰트와 '다르게' 그리는 폰트: " . count($cand) . "개\n";
    foreach ($cand as $c) echo "    - $c\n";
    echo "\n  → 이 중 ko/ja 도 '다름'이면 전 언어 통일 가능. 아니면 언어별로 나눠 쓴다.\n";
    echo "    (다르게 그린다 = 제대로일 가능성. 최종 확인은 실제 이미지를 봐야 한다)\n";
} else {
    echo "  ★ 터키어를 다르게 그리는 서버 폰트가 없다.\n";
    echo "    → MSVG 로는 해결 불가. 렌더 방식을 바꿔야 한다(차트 포기 등 기획 판단 필요).\n";
}

h1('끝 — 결과를 그대로 복사해서 주세요');
echo "확인 후 이 파일(_ogdiag.php)은 삭제하십시오.\n";
