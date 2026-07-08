<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 동적 사이트맵 생성기
//
// 용도: /www/blog/ 폴더의 .html 파일을 매 요청 시 자동으로 스캔해서
//       sitemap.xml을 만들어줍니다. 블로그 글을 새로 올리거나 지워도
//       이 파일을 손댈 필요가 없습니다 — 파일만 넣으면 자동 반영됩니다.
//
// 설정 방법:
//   1) 이 파일을 /www/sitemap.php 로 업로드
//   2) 기존 정적 sitemap.xml은 삭제(또는 이름 변경)
//   3) robots.txt의 Sitemap: 줄을 https://btctiming.com/sitemap.php 로 변경
//   4) 구글 서치콘솔 / 네이버 서치어드바이저에 사이트맵 URL을
//      https://btctiming.com/sitemap.php 로 재제출
//      (검색엔진은 .xml로 끝나지 않아도 Content-Type이 XML이면 정상 인식합니다)
// ═══════════════════════════════════════════════════════

// 혹시 이전에 다른 Content-Type 헤더가 잡혀있을 경우를 대비해 제거 후 재설정
if (function_exists('header_remove')) {
    header_remove('Content-Type');
}
header('Content-Type: application/xml; charset=utf-8');
// 사이트맵은 자주 안 바뀌므로 짧게 캐싱 헤더만 걸어둠 (선택 사항)
header('Cache-Control: public, max-age=3600');

$root = __DIR__;
require_once $root . '/config.php';
$baseUrl = 'https://btctiming.com';

/**
 * URL 엔트리 하나를 담는 배열 생성 헬퍼
 * $hreflangs: ['ko' => url, 'en' => url, 'x-default' => url] — 언어별 대응 URL (선택)
 */
function urlEntry(string $loc, string $lastmod, string $changefreq, string $priority, array $hreflangs = []): array {
    return compact('loc', 'lastmod', 'changefreq', 'priority', 'hreflangs');
}

$entries = [];

// 사이트맵 전용 언어 접미사: ko도 ?lang=ko를 명시한다.
// 이유 — 파라미터 없는 URL은 브라우저에 저장된 언어(localStorage)로 표시될 수 있어,
//        사이트맵/검색결과에서 "한국어"를 눌러도 다른 언어로 가는 문제가 있었다.
//        ko에 ?lang=ko를 붙이면 페이지가 URL의 언어를 최우선으로 적용해 정확히 한국어로 진입한다.
//        (SEO상 정식 URL은 각 페이지의 <link rel="canonical">이 파라미터 없는 버전을 가리키므로
//         중복 색인 문제는 발생하지 않는다.)
$smSuffix = function(string $lc): string {
    return '?lang=' . $lc;   // ko 포함 항상 명시
};
$smSuffixCat = function(string $lc): string {
    return '&lang=' . $lc;   // ?cat= 뒤에 붙는 경우
};

// ── 1) 홈(메인 분석 화면) — SUPPORTED_LANGS(config.php) 기반으로 전 언어 자동 등록.
//     새 언어를 SUPPORTED_LANGS에 추가하면 이 파일은 안 건드려도 사이트맵에 자동 반영됨.
$homeFile = file_exists($root . '/index.php') ? $root . '/index.php' : $root . '/index.html';
$homeLastmod = file_exists($homeFile) ? date('Y-m-d', filemtime($homeFile)) : date('Y-m-d');
$homeHreflangs = ['x-default' => $baseUrl . '/'];
foreach (SUPPORTED_LANGS as $lc => $li) {
    $homeHreflangs[$lc] = $baseUrl . '/' . $smSuffix($lc);
}
foreach (SUPPORTED_LANGS as $lc => $li) {
    $priority = $lc === 'ko' ? '1.0' : '0.9';
    $entries[] = urlEntry($homeHreflangs[$lc], $homeLastmod, 'daily', $priority, $homeHreflangs);
}

// ── 2) 블로그 목록 (카테고리 필터 없는 전체 목록) ──
// index.html(구버전) 또는 index.php(신버전, 자동 목록) 둘 중 있는 걸 사용.
// 홈·카테고리와 동일하게 9개 언어 URL + 상호 hreflang(+x-default)으로 등록한다.
// (예전엔 /blog/ 하나만 lang·hreflang 없이 넣어, 목록의 "전체" 버전만 언어 처리가 빠져 있었음)
$blogDir = $root . '/blog';
$blogIndexFile = file_exists($blogDir . '/index.php')
    ? $blogDir . '/index.php'
    : $blogDir . '/index.html';
if (file_exists($blogIndexFile)) {
    $blogLastmod = date('Y-m-d', filemtime($blogIndexFile));
    $blogHreflangs = ['x-default' => $baseUrl . '/blog/'];
    foreach (SUPPORTED_LANGS as $lc => $li) {
        $blogHreflangs[$lc] = $baseUrl . '/blog/' . $smSuffix($lc);
    }
    foreach (SUPPORTED_LANGS as $lc => $li) {
        $priority = $lc === 'ko' ? '0.8' : '0.7';
        $entries[] = urlEntry($blogHreflangs[$lc], $blogLastmod, 'weekly', $priority, $blogHreflangs);
    }
}

// ── 2-1) 카테고리별 목록 페이지 ──
// 블로그 목록은 ?cat={key} 파라미터로 카테고리 필터가 적용된 상태로 진입 가능(고유 URL).
// _category_meta.php를 정답 소스로 삼아, 실제로 글이 1개 이상 있는 카테고리만 등록한다.
// (글 없는 카테고리는 목록 탭에도 안 뜨므로 sitemap에 넣으면 빈 페이지가 됨)
$catMetaFile = $blogDir . '/_category_meta.php';
$metaFileForCats = $blogDir . '/_meta.php';
if (file_exists($catMetaFile) && file_exists($metaFileForCats)) {
    $catMeta = require $catMetaFile;
    $articlesForCats = require $metaFileForCats;
    // 카테고리별 글 개수 + 가장 최근 글 날짜 집계
    $catCount = [];
    $catLatest = [];
    foreach ($articlesForCats as $a) {
        $c = $a['category'] ?? '';
        if ($c === '') continue;
        $catCount[$c] = ($catCount[$c] ?? 0) + 1;
        $d = '';
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', (string)($a['date'] ?? ''), $mm)) $d = $mm[1];
        if ($d && (!isset($catLatest[$c]) || $d > $catLatest[$c])) $catLatest[$c] = $d;
    }
    foreach ($catMeta as $catKey => $ci) {
        if (($catCount[$catKey] ?? 0) < 1) continue; // 글 있는 카테고리만
        $lastmod = $catLatest[$catKey] ?? date('Y-m-d');
        // 언어별 URL: /blog/?cat=key&lang=xx (ko 포함 항상 명시)
        $catHreflangs = ['x-default' => $baseUrl . '/blog/?cat=' . $catKey];
        foreach (SUPPORTED_LANGS as $lc => $li) {
            $catHreflangs[$lc] = $baseUrl . '/blog/?cat=' . $catKey . $smSuffixCat($lc);
        }
        foreach (SUPPORTED_LANGS as $lc => $li) {
            $priority = $lc === 'ko' ? '0.7' : '0.6';
            $entries[] = urlEntry($catHreflangs[$lc], $lastmod, 'weekly', $priority, $catHreflangs);
        }
    }
}

// ── 3) 블로그 아티클 전체 — 실제로 존재하는 언어 버전만 각각 별도 URL로 등록 ──
// _meta.php가 유일한 정답 소스. title_{lang} 존재 여부로 "그 언어 번역 완료"를 자동 판단해서,
// 번역된 글만 해당 언어 URL과 hreflang을 추가합니다. (미번역 글에 넣으면 구글에 오도 정보가 됨)
// SUPPORTED_LANGS 기반이라, 블로그에 새 언어(스페인어 등) 번역을 채워 넣기 시작하면
// 이 파일은 안 건드려도 title_es가 생기는 즉시 사이트맵에 자동으로 잡힙니다.
$metaFile = $blogDir . '/_meta.php';
if (file_exists($metaFile)) {
    $articles = require $metaFile;
    foreach ($articles as $slug => $a) {
        $baseArticleUrl = $baseUrl . '/blog/' . $slug . '.php';
        $availableLangs = array_filter(array_keys(SUPPORTED_LANGS), fn($lc) => $lc === 'ko' || isset($a["title_{$lc}"]));
        $hreflangs = ['x-default' => $baseArticleUrl];
        foreach ($availableLangs as $lc) {
            $hreflangs[$lc] = $baseArticleUrl . $smSuffix($lc);
        }
        // lastmod는 반드시 YYYY-MM-DD 형식이어야 함 (Search Console 규칙).
        // $a['date']는 "2026-07-05" 또는 "2026-07-05 15:00:00"(시간 포함)일 수 있으므로 날짜 부분만 추출.
        $rawDate = $a['date'] ?? '';
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', (string)$rawDate, $mDate)) {
            $date = $mDate[1];
        } else {
            $ts = strtotime((string)$rawDate);
            $date = $ts ? date('Y-m-d', $ts) : date('Y-m-d');
        }
        foreach ($availableLangs as $lc) {
            $priority = $lc === 'ko' ? '0.7' : '0.6';
            $entries[] = urlEntry($hreflangs[$lc], $date, 'monthly', $priority, $hreflangs);
        }
    }
}

// ── 4) 기타 정적 페이지 — 홈과 동일하게 언어별 URL + hreflang 전체 등록 ──
// 각 페이지는 실제 파일이 있을 때만 포함하고, SUPPORTED_LANGS 기반으로 9개 언어를
// 각각 별도 URL(+상호 hreflang)로 등록한다. 새 언어를 추가하면 자동 반영된다.
//   file  : 실제 파일 경로(존재 확인 + lastmod 산출용)
//   route : URL 경로(파라미터 없는 x-default 기준)
$staticPages = [
    ['file' => 'about.php',         'route' => '/about',             'priority' => '0.5'],
    ['file' => 'privacy.php',       'route' => '/privacy',           'priority' => '0.3'],
    ['file' => 'terms.php',         'route' => '/terms',             'priority' => '0.3'],
    ['file' => 'exchanges.php',     'route' => '/exchanges.php',     'priority' => '0.5'],
    ['file' => 'coins.php',         'route' => '/coins.php',         'priority' => '0.5'],
    ['file' => 'rss-guide.php',     'route' => '/rss-guide.php',     'priority' => '0.4'],
    ['file' => 'sitemap-guide.php', 'route' => '/sitemap-guide.php', 'priority' => '0.3'],
];
foreach ($staticPages as $sp) {
    $fullPath = $root . '/' . $sp['file'];
    if (!file_exists($fullPath)) continue; // 없는 페이지는 건너뜀
    $lastmod = date('Y-m-d', filemtime($fullPath));
    // 9개 언어 + x-default 상호 hreflang 구성
    $spHreflangs = ['x-default' => $baseUrl . $sp['route']];
    foreach (SUPPORTED_LANGS as $lc => $li) {
        $spHreflangs[$lc] = $baseUrl . $sp['route'] . $smSuffix($lc);
    }
    foreach (SUPPORTED_LANGS as $lc => $li) {
        $priority = $lc === 'ko' ? $sp['priority'] : number_format((float)$sp['priority'] - 0.1, 1);
        $entries[] = urlEntry($spHreflangs[$lc], $lastmod, 'yearly', $priority, $spHreflangs);
    }
}

// ── XML 출력 (xhtml 네임스페이스로 hreflang 대응 링크 포함) ──
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
// 이 한 줄 덕분에 브라우저에서 열면 sitemap.xsl로 예쁜 표 형태로 보임.
// 검색엔진(구글봇 등)은 이 지시문을 무시하고 원본 XML 데이터만 그대로 읽습니다.
echo '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
foreach ($entries as $e) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($e['loc'], ENT_XML1) . "</loc>\n";
    echo "    <lastmod>" . $e['lastmod'] . "</lastmod>\n";
    echo "    <changefreq>" . $e['changefreq'] . "</changefreq>\n";
    echo "    <priority>" . $e['priority'] . "</priority>\n";
    foreach ($e['hreflangs'] as $lang => $url) {
        echo '    <xhtml:link rel="alternate" hreflang="' . $lang . '" href="' . htmlspecialchars($url, ENT_XML1) . '"/>' . "\n";
    }
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
