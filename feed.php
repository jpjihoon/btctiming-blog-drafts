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
header('Cache-Control: public, max-age=120'); // 2분 캐싱 — 매 페이지뷰마다 디스크 스캔하지 않도록
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
    return [
        'url'        => '/blog/' . $a['file'],
        'title_ko'   => $a['title_ko'] ?? '',
        'title_en'   => $a['title_en'] ?? '',
        'title_ja'   => $a['title_ja'] ?? ($a['title_en'] ?? ''),
        'desc_ko'    => $a['desc_ko'] ?? '',
        'desc_en'    => $a['desc_en'] ?? '',
        'desc_ja'    => $a['desc_ja'] ?? ($a['desc_en'] ?? ''),
        'icon'       => $a['icon'] ?? '📄',
        'color'      => $a['color'] ?? '#f7931a',
        'category'   => $cat,
        'category_ko'=> CATEGORY_META[$cat]['ko'] ?? $cat,
        'category_en'=> CATEGORY_META[$cat]['en'] ?? $cat,
        'category_ja'=> CATEGORY_META[$cat]['ja'] ?? (CATEGORY_META[$cat]['en'] ?? $cat),
        'category_es'=> CATEGORY_META[$cat]['es'] ?? (CATEGORY_META[$cat]['en'] ?? $cat),
        'category_de'=> CATEGORY_META[$cat]['de'] ?? (CATEGORY_META[$cat]['en'] ?? $cat),
        'date'       => $a['date'] ?? '',
        // 이 글이 실제로 일본어 번역이 있는지 여부(현재는 전체 번역 완료라 항상 true에 가깝지만,
        // 향후 신규 글 추가 시 미번역 상태를 프론트에서 구분할 수 있도록 남겨둠)
        'has_ja'     => isset($a['title_ja']),
    ];
}, $articles);

echo json_encode(['articles' => $out], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
