<?php
/**
 * 단일언어 필터 성능 측정 — 2026-07-16 (1회용. 확인 후 삭제)
 *
 * 왜: 글 페이지만 TTFB 1.7초. 목록·용어집은 0.87초. 네트워크 기준선 0.82초.
 *     → 글만 0.85초를 더 쓴다. bt_single_lang 필터가 의심되지만
 *       로컬에선 1.5~5ms 였다. 서버에서 실제로 몇 ms 인지 재본 적이 없다.
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
@set_time_limit(90);

echo "════ PHP / PCRE 환경 ════\n";
printf("  PHP                 %s\n", PHP_VERSION);
printf("  PCRE 버전           %s\n", defined('PCRE_VERSION') ? PCRE_VERSION : '?');
printf("  pcre.jit            %s   ← 0 이면 정규식이 10~50배 느려진다\n", ini_get('pcre.jit'));
printf("  pcre.backtrack_limit %s\n", ini_get('pcre.backtrack_limit'));
printf("  opcache             %s\n", (function_exists('opcache_get_status') && @opcache_get_status()) ? 'ON' : 'OFF/불가');

// 실제 글 본문을 재료로
$slug = preg_replace('/[^a-z0-9\-]/', '', (string)($_GET['slug'] ?? 'eth-btc-breakout-narrow-rotation-etf-outflow-gap'));
$f = __DIR__ . '/blog/' . $slug . '.php';
if (!is_readable($f)) { echo "\n★ 글 파일 없음: $slug\n"; exit; }
$src = file_get_contents($f);
printf("\n════ 재료 ════\n  %s  %s bytes\n", $slug, number_format(strlen($src)));

// _header.php 의 필터 함수를 그대로 복사 (현재 배포본과 동일)
function pf_filter(string $html, string $lang, array $all): string {
    if (count($all) < 2) return $html;
    $allFlip = array_flip($all);
    $out = ''; $pos = 0;
    $re = '/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*?\bclass="([^"]*)"[^>]*?(\/?)>/';
    while (preg_match($re, $html, $m, PREG_OFFSET_CAPTURE, $pos)) {
        $tagStart = $m[0][1]; $tagEnd = $tagStart + strlen($m[0][0]);
        $tag = $m[1][0]; $selfClose = ($m[3][0] === '/');
        $langsInClass = [];
        foreach (preg_split('/\s+/', trim($m[2][0])) as $c) if (isset($allFlip[$c])) $langsInClass[] = $c;
        $hit = $langsInClass && !in_array($lang, $langsInClass, true);
        if (!$hit) { $out .= substr($html, $pos, $tagEnd - $pos); $pos = $tagEnd; continue; }
        $out .= substr($html, $pos, $tagStart - $pos);
        if ($selfClose) { $pos = $tagEnd; continue; }
        $depth = 1; $p = $tagEnd;
        $tre = '#<(/?)' . preg_quote($tag, '#') . '\b[^>]*>#i';
        while ($depth > 0 && preg_match($tre, $html, $mm, PREG_OFFSET_CAPTURE, $p)) {
            $p = $mm[0][1] + strlen($mm[0][0]);
            $depth += ($mm[1][0] === '/') ? -1 : 1;
        }
        if ($depth !== 0) { $out .= substr($html, $tagStart, $tagEnd - $tagStart); $pos = $tagEnd; continue; }
        $pos = $p;
    }
    return $out . substr($html, $pos);
}

$L = array_keys(SUPPORTED_LANGS);
echo "\n════ 필터 실행 시간 (글 소스 기준) ════\n";
$tot = 0;
foreach (['ko','en','vi'] as $lang) {
    $t = microtime(true);
    $r = pf_filter($src, $lang, $L);
    $ms = (microtime(true) - $t) * 1000;
    $tot += $ms;
    printf("  %-3s  %7.1f ms   %s → %s bytes\n", $lang, $ms, number_format(strlen($src)), number_format(strlen($r)));
}
printf("\n  평균 %.1f ms\n", $tot / 3);

// 정규식 몇 번 도는지
$n = preg_match_all('/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*?\bclass="([^"]*)"[^>]*?(\/?)>/', $src, $x);
printf("  class 가진 여는 태그: %s개 → 바깥 루프 그만큼 돈다\n", number_format($n));

echo "\n════ 참고: 순수 preg_match 비용 ════\n";
$t = microtime(true);
for ($i = 0; $i < 1000; $i++) preg_match('#<(/?)span\b[^>]*>#i', $src, $mm, PREG_OFFSET_CAPTURE, 1000);
printf("  366KB 문자열에 preg_match 1000회: %.1f ms  (1회당 %.3f ms)\n",
    ($ms = (microtime(true) - $t) * 1000), $ms / 1000);
echo "\n확인 후 이 파일(_perftest.php)은 삭제하십시오.\n";
