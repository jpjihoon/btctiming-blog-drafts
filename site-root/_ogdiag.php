<?php
/**
 * OG 렌더 진단 — 2026-07-16 (1회용. 확인 끝나면 삭제할 것)
 *
 * 왜 필요한가:
 *   og.php 의 $fontFile 을 NotoCJK-Bold.otf → NotoSans-Bold.ttf 로 바꿨는데
 *   출력 PNG 가 바이트 단위로 1비트도 안 달라졌다(실측).
 *   서로 다른 폰트로 같은 결과가 나올 수 없다 → 렌더러가 폰트 파일을 안 읽고 있다.
 *   SVG 의 @font-face{src:url(file://…)} 를 무시하고 서버 기본 폰트로 그리는 것으로 보인다.
 *   그게 터키어 ç/ö 가 ▶/✔ 로 나오는 진짜 원인이다.
 *
 * 이 파일이 답할 것:
 *   1) 서버가 Imagick 을 쓰는가, 쓴다면 SVG 백엔드가 RSVG 인가 MSVG 인가
 *   2) @font-face 가 실제로 먹는가 (다른 폰트 2개로 렌더해 결과가 다른지)
 *   3) GD 직접 렌더는 폰트를 제대로 읽는가
 *   4) 서버에 어떤 폰트가 깔려 있는가
 *
 * 사용:  https://btctiming.com/_ogdiag.php?token=<SNAPSHOT_TOKEN>
 */

require_once __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');

// 서버 내부 정보를 뱉으므로 토큰 없이는 못 본다 (cron_warmup.php 와 동일 방식)
$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403);
    echo "forbidden\n";
    exit;
}

function h1(string $s): void { echo "\n" . str_repeat('=', 64) . "\n" . $s . "\n" . str_repeat('=', 64) . "\n"; }
function kv(string $k, $v): void { printf("  %-30s %s\n", $k, is_bool($v) ? ($v ? 'YES' : 'NO') : $v); }

$cjk   = __DIR__ . '/NotoCJK-Bold.otf';
$latin = __DIR__ . '/NotoSans-Bold.ttf';

// ── 1) 확장 ──────────────────────────────────────────────
h1('1) PHP 확장');
kv('PHP', PHP_VERSION);
kv('imagick 로드됨', extension_loaded('imagick'));
kv('gd 로드됨', extension_loaded('gd'));
if (extension_loaded('gd')) {
    $g = gd_info();
    kv('GD FreeType 지원', !empty($g['FreeType Support']));
    kv('GD 버전', $g['GD Version'] ?? '?');
}

// ── 2) Imagick SVG 백엔드 ────────────────────────────────
h1('2) Imagick / SVG 백엔드  ★ 여기가 핵심');
if (extension_loaded('imagick')) {
    $v = Imagick::getVersion();
    kv('versionString', $v['versionString'] ?? '?');
    // 델리게이트 목록에 rsvg 가 있으면 librsvg(@font-face 지원 좋음)
    // 없으면 내부 MSVG 렌더러(@font-face 무시함)
    $vs = $v['versionString'] ?? '';
    $hasRsvg = stripos($vs, 'rsvg') !== false;
    kv('Delegates 에 rsvg 있음', $hasRsvg);
    echo "     → rsvg 있으면 librsvg 로 렌더(@font-face 지원). 없으면 MSVG(무시함)\n";
    try {
        $fmts = Imagick::queryFormats('*SVG*');
        kv('queryFormats(*SVG*)', implode(', ', $fmts));
    } catch (Throwable $e) { kv('queryFormats 실패', $e->getMessage()); }
    try {
        $im = new Imagick();
        kv('Imagick 인스턴스 생성', 'OK');
        $im->clear();
    } catch (Throwable $e) { kv('Imagick 생성 실패', $e->getMessage()); }
} else {
    echo "  imagick 없음 → og.php 는 GD 폴백 경로를 탄다\n";
}

// ── 3) 폰트 파일 ─────────────────────────────────────────
h1('3) 폰트 파일');
foreach (['NotoCJK-Bold.otf' => $cjk, 'NotoSans-Bold.ttf' => $latin] as $n => $p) {
    kv($n, (is_readable($p) ? 'readable / ' . number_format(filesize($p)) . ' B / mtime ' . date('m-d H:i', filemtime($p)) : '★ 없거나 못 읽음'));
}

// ── 4) ★ @font-face 가 실제로 먹는가 ────────────────────
h1('4) ★ @font-face 실효성 테스트 (같은 글자를 폰트만 바꿔 렌더)');
echo "  터키어 'ığşİ' 를 두 폰트로 각각 렌더해 잉크 픽셀을 센다.\n";
echo "  두 결과가 같으면 = 폰트가 무시되고 있다는 뜻.\n\n";

function svg_ink(string $fontPath, string $text): array {
    $uri = 'file://' . $fontPath;
    $svg = '<?xml version="1.0" encoding="UTF-8"?>'
         . '<svg xmlns="http://www.w3.org/2000/svg" width="600" height="120" viewBox="0 0 600 120">'
         . '<defs><style>@font-face{font-family:"OGT";src:url("' . $uri . '");}</style></defs>'
         . '<rect width="600" height="120" fill="#000"/>'
         . '<text x="10" y="80" fill="#fff" font-size="60" font-family="OGT">' . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . '</text>'
         . '</svg>';
    try {
        $im = new Imagick();
        $im->setBackgroundColor(new ImagickPixel('black'));
        $im->readImageBlob($svg);
        $im->setImageFormat('png');
        $blob = $im->getImageBlob();
        $ink = 0;
        $w = $im->getImageWidth(); $hh = $im->getImageHeight();
        $it = $im->getPixelIterator();
        foreach ($it as $row) { foreach ($row as $px) { $c = $px->getColor(); if (($c['r'] + $c['g'] + $c['b']) > 200) $ink++; } $it->syncIterator(); }
        $im->clear();
        return ['ink' => $ink, 'bytes' => strlen($blob), 'md5' => md5($blob)];
    } catch (Throwable $e) {
        return ['err' => $e->getMessage()];
    }
}

if (extension_loaded('imagick')) {
    $t = 'ığşİ';
    $a = svg_ink($cjk, $t);
    $b = svg_ink($latin, $t);
    foreach (['NotoCJK' => $a, 'NotoSans' => $b] as $n => $r) {
        if (isset($r['err'])) { kv($n, '★ 오류: ' . $r['err']); }
        else kv($n, sprintf('잉크 %6d px / png %6d B / md5 %s', $r['ink'], $r['bytes'], substr($r['md5'], 0, 12)));
    }
    if (!isset($a['err']) && !isset($b['err'])) {
        echo "\n";
        if ($a['md5'] === $b['md5']) {
            echo "  ★★ 두 결과가 완전히 동일 → @font-face 가 무시되고 있다.\n";
            echo "      SVG <text> 로는 우리 폰트를 못 쓴다. 렌더 방식을 바꿔야 한다.\n";
        } else {
            echo "  ✓ 두 결과가 다름 → @font-face 는 먹는다. 원인은 다른 데 있다.\n";
        }
    }
} else {
    echo "  imagick 없음 → 테스트 생략\n";
}

// ── 5) GD 직접 렌더는 폰트를 읽는가 ─────────────────────
h1('5) GD 직접 렌더 (imagettftext) — 폰트 파일을 직접 받는 방식');
if (extension_loaded('gd') && function_exists('imagettftext')) {
    foreach (['NotoCJK' => $cjk, 'NotoSans' => $latin] as $n => $f) {
        if (!is_readable($f)) { kv($n, '★ 파일 없음'); continue; }
        $img = imagecreatetruecolor(400, 100);
        imagefill($img, 0, 0, imagecolorallocate($img, 0, 0, 0));
        $w = imagecolorallocate($img, 255, 255, 255);
        @imagettftext($img, 48, 0, 10, 70, $w, $f, 'ığşİ');
        $ink = 0;
        for ($x = 0; $x < 400; $x++) for ($y = 0; $y < 100; $y++) if ((imagecolorat($img, $x, $y) & 0xFF) > 60) $ink++;
        ob_start(); imagepng($img); $blob = ob_get_clean(); imagedestroy($img);
        kv($n, sprintf('잉크 %6d px / md5 %s', $ink, substr(md5($blob), 0, 12)));
    }
    echo "\n  → 두 값이 다르면 GD 는 폰트 파일을 제대로 읽는다는 뜻.\n";
    echo "    (GD 가 되고 Imagick 이 안 되면, 제목만 GD 로 그리는 방법이 있다)\n";
} else {
    echo "  GD 또는 FreeType 없음\n";
}

// ── 6) 서버에 깔린 폰트 ─────────────────────────────────
h1('6) 서버 fontconfig 폰트 (Imagick 이 대신 쓰는 폰트가 뭔지)');
$fc = null;
foreach (['fc-list', '/usr/bin/fc-list'] as $cmd) {
    if (function_exists('shell_exec')) { $fc = @shell_exec($cmd . ' 2>/dev/null | head -20'); if ($fc) break; }
}
if ($fc) { echo $fc; }
else {
    echo "  fc-list 실행 불가 (shell_exec 비활성 또는 fontconfig 없음)\n";
    if (extension_loaded('imagick')) {
        try {
            $fonts = Imagick::queryFonts('*');
            kv('Imagick::queryFonts 개수', count($fonts));
            echo '  ' . implode(', ', array_slice($fonts, 0, 25)) . "\n";
        } catch (Throwable $e) { kv('queryFonts 실패', $e->getMessage()); }
    }
}

h1('끝 — 이 결과를 그대로 복사해서 주세요');
echo "확인 후 이 파일(_ogdiag.php)은 삭제하십시오.\n";
