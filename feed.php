<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 최신글 JSON 피드
//
// 용도: index.html(메인 실시간 분석 화면)이 "최신 인사이트" 위젯을
//       그릴 때 fetch()로 호출하는 경량 JSON 엔드포인트입니다.
//       블로그 글이 추가/삭제되면 다음 호출부터 자동 반영됩니다.
//
// 사용법:
//   GET /blog/feed.php              → 최신 3개
//   GET /blog/feed.php?limit=5      → 최신 5개
//   GET /blog/feed.php?category=news → 시황분석 카테고리만 최신순
// ═══════════════════════════════════════════════════════

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=30'); // 30초 — 대시보드가 새 글을 30초 내 반영

// ── 서버측 30초 캐시 ── 매 요청 788개 메타 스캔을 막고, 대시보드 갱신도 30초로 단축.
$__ck = 'btcfeed_' . md5(($_GET['category'] ?? '') . '|' . ($_GET['limit'] ?? '3'));
$__cf = sys_get_temp_dir() . '/' . $__ck . '.json';
if (is_file($__cf) && (time() - filemtime($__cf)) < 30) {
    readfile($__cf);
    exit;
}

require_once __DIR__ . '/_articles.php';

$articles = collectArticles(__DIR__);

$category = $_GET['category'] ?? null;
if ($category && isset(CATEGORY_META[$category])) {
    $articles = array_values(array_filter($articles, fn($a) => $a['category'] === $category));
}

$limit = isset($_GET['limit']) ? max(1, min(40, (int)$_GET['limit'])) : 3;
$articles = array_slice($articles, 0, $limit);

$out = array_map(function($a) {
    $cat = $a['category'] ?? 'guide';
    // 9개 언어 전부 내려준다. 미번역 언어는 en→ko 순으로 폴백(프론트 pickLangField와 동일 원칙).
    $LANGS = ['ko','en','ja','es','de','fr','pt','tr','vi'];
    $row = [
        'url'      => '/blog/' . $a['file'],
        'icon'     => $a['icon'] ?? '📄',
        'color'    => $a['color'] ?? '#f7931a',
        'category' => $cat,
        'date'     => $a['date'] ?? '',
        'has_ja'   => isset($a['title_ja']),
    ];
    foreach ($LANGS as $lc) {
        $row['title_' . $lc]    = $a['title_' . $lc]    ?? ($a['title_en'] ?? ($a['title_ko'] ?? ''));
        $row['desc_' . $lc]     = $a['desc_' . $lc]     ?? ($a['desc_en'] ?? ($a['desc_ko'] ?? ''));
        $row['category_' . $lc] = CATEGORY_META[$cat][$lc] ?? (CATEGORY_META[$cat]['en'] ?? (CATEGORY_META[$cat]['ko'] ?? $cat));
        $row['tag_' . $lc]      = $a['tag_' . $lc]      ?? ($a['tag_en'] ?? ($a['tag_ko'] ?? ''));
    }
    return $row;
}, $articles);

$__json = json_encode(['articles' => $out], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@file_put_contents($__cf, $__json);   // 서버측 캐시 저장(30초)
echo $__json;
