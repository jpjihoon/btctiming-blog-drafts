<?php
/**
 * 서버 처리 시간 측정 v2 — 2026-07-16 (1회용. 확인 후 삭제)
 *
 * v1 이 틀린 점: 글의 PHP '소스'(121KB/144태그)를 재료로 썼다.
 *   실제 필터는 '렌더 출력'(323KB/1,083태그)에 돈다. 7.5배 차이라 0.3ms 가 나왔다.
 *
 * 재는 것 (전부 서버 내부 시간. 네트워크 제외):
 *   1) _meta.php  — meta/*.json 1,073개를 매 요청마다 열고 파싱한다. 캐시 없음.
 *                   블로그 목록·글 뷰·feed·sitemap·rss 전부 이걸 쓴다.  ★ 최우선 용의자
 *   2) glossary_data.php — 751KB json_decode. 용어집이 매 요청마다.
 *   3) bt_single_lang 필터 — 실제 렌더 출력 크기로
 *   4) 파일 I/O 자체 비용 — 공유호스팅은 스토리지가 느리다
 *
 * 사용: https://btctiming.com/_perftest.php?token=<SNAPSHOT_TOKEN>
 */
require_once __DIR__ . '/config.php';
header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store');
$tok = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '' || !hash_equals(SNAPSHOT_TOKEN, (string)$tok)) {
    http_response_code(403); echo "forbidden\n"; exit;
}
@set_time_limit(120);
function ms(float $t): string { return sprintf('%8.1f ms', (microtime(true) - $t) * 1000); }

echo "════ 환경 ════\n";
printf("  PHP %s / PCRE %s / pcre.jit=%s / opcache=%s\n",
    PHP_VERSION, defined('PCRE_VERSION') ? PCRE_VERSION : '?', ini_get('pcre.jit'),
    (function_exists('opcache_get_status') && @opcache_get_status()) ? 'ON' : 'OFF');
printf("  realpath_cache_size=%s / ttl=%s\n", ini_get('realpath_cache_size'), ini_get('realpath_cache_ttl'));

$metaDir = __DIR__ . '/blog/meta';

echo "\n════ ★ 1) _meta.php — meta/*.json 전수 로드 (요청마다 실행됨) ════\n";
$t = microtime(true); $files = glob($metaDir . '/*.json'); $tGlob = ms($t);
printf("  glob()                    %s   파일 %s개\n", $tGlob, number_format(count($files)));

$t = microtime(true); $n = 0;
foreach ($files as $f) { if (@filemtime($f)) $n++; }
printf("  filemtime() 전수           %s   (%d개)\n", ms($t), $n);

$t = microtime(true); $bytes = 0;
foreach ($files as $f) { $bytes += strlen(@file_get_contents($f)); }
printf("  file_get_contents() 전수   %s   총 %s bytes\n", ms($t), number_format($bytes));

$t = microtime(true); $arts = [];
foreach ($files as $f) {
    $d = json_decode(file_get_contents($f), true);
    if (is_array($d)) $arts[basename($f, '.json')] = $d;
}
$tMeta = (microtime(true) - $t) * 1000;
printf("  ★ 읽기+json_decode 전체    %8.1f ms   ← 이게 매 요청마다 든다\n", $tMeta);
printf("     글 1개당 %.3f ms / 메모리 %s\n",
    $tMeta / max(1, count($files)), number_format(strlen(serialize($arts))) . ' bytes(직렬화 기준)');

echo "\n════ 2) glossary_data.json — 751KB json_decode (용어집 매 요청) ════\n";
$gf = __DIR__ . '/glossary_data.json';
if (is_readable($gf)) {
    $t = microtime(true); $raw = file_get_contents($gf); printf("  file_get_contents         %s   %s bytes\n", ms($t), number_format(strlen($raw)));
    $t = microtime(true); $g = json_decode($raw, true); printf("  ★ json_decode             %s   용어 %d개\n", ms($t), is_array($g) ? count($g) : 0);
} else { echo "  파일 없음\n"; }

echo "\n════ 3) bt_single_lang 필터 — 실제 렌더 출력 크기로 ════\n";
$slug = preg_replace('/[^a-z0-9\-]/', '', (string)($_GET['slug'] ?? 'eth-btc-breakout-narrow-rotation-etf-outflow-gap'));
$bf = __DIR__ . '/blog/' . $slug . '.php';
if (!is_readable($bf)) { echo "  글 없음: $slug\n"; }
else {
    // 실제 렌더 출력을 흉내: 글 소스 + 헤더/푸터가 붙은 크기를 재현하기 위해
    // 라이브 페이지를 그대로 쓸 수 없으므로, 소스를 3배로 늘려 근사한다.
    $src = file_get_contents($bf);
    $sim = $src . $src . $src;   // 323KB 근사
    $L = array_keys(SUPPORTED_LANGS); $allFlip = array_flip($L); $lang = 'ko';
    $t = microtime(true);
    $out = ''; $pos = 0; $outer = 0; $inner = 0;
    $re = '/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*?\bclass="([^"]*)"[^>]*?(\/?)>/';
    while (preg_match($re, $sim, $m, PREG_OFFSET_CAPTURE, $pos)) {
        $outer++;
        $tagStart = $m[0][1]; $tagEnd = $tagStart + strlen($m[0][0]);
        $tag = $m[1][0]; $sc = ($m[3][0] === '/');
        $ls = []; foreach (preg_split('/\s+/', trim($m[2][0])) as $c) if (isset($allFlip[$c])) $ls[] = $c;
        $hit = $ls && !in_array($lang, $ls, true);
        if (!$hit) { $out .= substr($sim, $pos, $tagEnd - $pos); $pos = $tagEnd; continue; }
        $out .= substr($sim, $pos, $tagStart - $pos);
        if ($sc) { $pos = $tagEnd; continue; }
        $d = 1; $p = $tagEnd; $tre = '#<(/?)' . preg_quote($tag, '#') . '\b[^>]*>#i';
        while ($d > 0 && preg_match($tre, $sim, $mm, PREG_OFFSET_CAPTURE, $p)) { $inner++; $p = $mm[0][1] + strlen($mm[0][0]); $d += ($mm[1][0] === '/') ? -1 : 1; }
        if ($d !== 0) { $out .= substr($sim, $tagStart, $tagEnd - $tagStart); $pos = $tagEnd; continue; }
        $pos = $p;
    }
    printf("  입력 %s bytes / class 태그 %d개\n", number_format(strlen($sim)), $outer);
    printf("  ★ 필터 실행               %s   (preg_match %d회)\n", ms($t), $outer + $inner);
}

echo "\n════ 4) 파일 I/O 기본 비용 (공유호스팅 스토리지) ════\n";
$t = microtime(true); for ($i = 0; $i < 500; $i++) @file_exists($metaDir . '/mvrv-z-score.json');
printf("  file_exists ×500          %s\n", ms($t));
$t = microtime(true); for ($i = 0; $i < 200; $i++) @file_get_contents($metaDir . '/mvrv-z-score.json');
printf("  file_get_contents ×200    %s\n", ms($t));

echo "\n════ 결론 ════\n";
printf("  블로그 목록·글 뷰가 매 요청마다 쓰는 고정비 = _meta.php %.0f ms\n", $tMeta);
echo "  이게 100ms 를 넘으면 캐시를 넣어야 한다 (opcache 가 켜져 있으므로\n";
echo "  meta_cache.php 로 '<?php return [...]' 를 만들어두면 컴파일 결과가 메모리에 남는다)\n";
echo "\n확인 후 이 파일(_perftest.php)은 삭제하십시오.\n";
