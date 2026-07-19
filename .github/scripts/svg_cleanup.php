<?php
/**
 * 블로그 글 본문의 "PHP 함수·heredoc 로 생성한 SVG"(약 20편)를 찾아
 * og.php 가 언어 래퍼를 찾을 수 있도록 정적 <div class="...언어..."> 로 감싼다.
 *
 * ★ 왜 필요한가: PHP 로 SVG 를 만들면 og.php 가 언어별 <div> 래퍼를 못 찾아
 *   첫 SVG(대개 한국어)가 전 언어 OG 이미지로 나간다(가이드 §21.3, 3-3).
 *
 * ★ 안전 원칙(자동 변환은 "언어중립 SVG"에 한정):
 *   - heredoc 본문에 PHP 보간( {$...} / $var )이 있으면 → 건너뜀(값 주입형, 수동).
 *   - SVG 안에 한글 텍스트가 있으면 → 그 SVG 는 사실상 '한국어 변형'.
 *     영어 변형을 새로 만들어야 하므로 자동 변환 대상 아님 → 건너뜀(수동/번역).
 *   - 위 두 경우가 아닌 '텍스트 없음 or 비한글 텍스트' SVG 만 전(全)언어 래퍼로 감싼다.
 *
 * 사용: php svg_cleanup.php <detect|convert> <블로그루트경로>
 *   detect  = 읽기전용. 목록·분류만 출력.
 *   convert = 안전 대상만 파일 수정(+php -l). 변환/건너뜀 목록 출력.
 */

$MODE = $argv[1] ?? 'detect';
$ROOT = rtrim($argv[2] ?? '.', '/');
$ALL_LANGS = 'ko en ja es de fr pt tr vi id pl it ru zh'; // 14언어 전부 (언어중립 SVG 이므로 공통 노출)

if (!in_array($MODE, ['detect','convert'], true)) {
    fwrite(STDERR, "mode 는 detect 또는 convert\n"); exit(2);
}

// 블로그 글 후보: 루트 바로 아래 *.php 중 _로 시작하지 않는 것(_header/_footer 등 제외)
$files = [];
foreach (glob($ROOT.'/*.php') as $f) {
    $b = basename($f);
    if ($b[0] === '_') continue;
    if (in_array($b, ['og.php','rss.php','sitemap.php','index.php'], true)) continue;
    $files[] = $f;
}
sort($files);

// PHP 로 SVG 를 만드는 패턴: 클로저 + heredoc <<<SVG ... SVG;
// (예: $svg = function(...) { ... return <<<SVG ... SVG; };  그리고 echo/=$svg(...))
$reClosure = '/\$(\w+)\s*=\s*function\s*\([^)]*\)\s*(?:use\s*\([^)]*\)\s*)?\{.*?<<<[\'"]?SVG[\'"]?\R(.*?)\R\s*SVG;.*?\};/s';

$converted = []; $skipped = []; $found = 0;

foreach ($files as $f) {
    $src = file_get_contents($f);
    if (strpos($src, '<<<') === false || stripos($src, 'SVG') === false) continue;
    if (!preg_match_all($reClosure, $src, $ms, PREG_SET_ORDER)) continue;

    foreach ($ms as $m) {
        $found++;
        $var  = $m[1];
        $body = $m[2];                    // heredoc 안 SVG 본문
        $whole= $m[0];                    // 클로저 정의 전체

        $hasInterp = (bool)preg_match('/\{\$|\$\w/', $body);   // {$x} 또는 $x
        $hasKo     = (bool)preg_match('/[\x{AC00}-\x{D7A3}]/u', $body); // 한글 음절
        $hasText   = (bool)preg_match('/<text[\s>]/i', $body);

        $reason = null;
        if ($hasInterp) $reason = '값 보간({$..}/$var) 존재 — 수동';
        elseif ($hasKo) $reason = 'SVG 안 한글 텍스트 — 영어변형 필요(번역/수동)';

        $rec = ['file'=>basename($f), 'var'=>$var, 'interp'=>$hasInterp,
                'korean'=>$hasKo, 'has_text'=>$hasText, 'reason'=>$reason];

        if ($reason !== null) { $skipped[] = $rec; continue; }

        // ── 안전 대상: 전 언어 래퍼로 변환 ──
        // 1) 호출부(short-echo 또는 php echo 로 svg 함수를 부르는 곳)를 정적 div 로 치환
        $reCall = '/<\?(?:php\s+echo|=)\s*\$'.preg_quote($var,'/').'\s*\([^)]*\)\s*;?\s*\?>/';
        $wrapped = '<div class="'.$ALL_LANGS.'">'."\n".trim($body)."\n".'</div>';

        $new = preg_replace($reCall, $wrapped, $src, 1, $nCall);
        if ($nCall < 1) { $rec['reason']='호출부(echo $'.$var.'()) 매칭 실패 — 수동'; $skipped[]=$rec; continue; }
        // 2) 클로저 정의 제거
        $new = str_replace($whole, '', $new);

        if ($MODE === 'convert') {
            file_put_contents($f, $new);
            // php -l 검증 — 실패하면 원복
            exec('php -l '.escapeshellarg($f).' 2>&1', $o, $rc);
            if ($rc !== 0) { file_put_contents($f, $src); $rec['reason']='변환 후 php -l 실패 — 원복'; $skipped[]=$rec; continue; }
            $src = $new; // 같은 파일 내 복수 SVG 대비
        }
        $converted[] = $rec;
    }
}

// ── 리포트 ──
$line = str_repeat('─', 60);
echo "$line\nPHP 생성 SVG 정리 — mode=$MODE, root=$ROOT\n$line\n";
echo "탐지된 PHP-SVG 블록: $found 개  (파일 기준 후보 ".count($files)."개 스캔)\n\n";

echo "[변환 대상 = 언어중립 SVG] ".count($converted)."개\n";
foreach ($converted as $r) echo sprintf("  ✅ %-52s (\$%s%s)\n", $r['file'], $r['var'], $r['has_text']?', 비한글 텍스트':'');
echo "\n[건너뜀 = 수동 필요] ".count($skipped)."개\n";
foreach ($skipped as $r) echo sprintf("  ⏭  %-52s — %s\n", $r['file'], $r['reason']);

echo "\n$line\n";
if ($MODE==='detect') echo "detect 모드: 파일을 수정하지 않았습니다. 위 분류 확인 후 convert 로 재실행하세요.\n";
else echo "convert 모드: 변환 ".count($converted)."개 적용(php -l 통과분만). 건너뜀은 수동 처리 필요.\n";

// 워크플로우가 커밋 여부 판단하도록 개수를 파일로
if (getenv('GITHUB_OUTPUT')) {
    file_put_contents(getenv('GITHUB_OUTPUT'),
        "converted=".count($converted)."\nskipped=".count($skipped)."\n", FILE_APPEND);
}
