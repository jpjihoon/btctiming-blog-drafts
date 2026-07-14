<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 RSS 2.0 피드
//
// 용도: 구독자·피드리더·다른 사이트가 최신 글을 자동 수신하도록 하는 표준 RSS.
//       블로그 글이 추가되면 다음 호출부터 자동 반영됩니다.
//
// 배포: 이 파일을 /www/blog/rss.php 로 업로드 → https://btctiming.com/blog/rss.php
//       (원하면 robots.txt·<head>에 피드 링크를 추가해 발견성 향상)
//
// 파라미터:
//   ?lang=ko|en|ja|es|de  → 해당 언어 제목·설명으로 출력 (기본 ko)
//   ?category=news|weekly|... → 특정 카테고리만
//   ?limit=N              → 최대 개수 (기본 30, 최대 100)
// ═══════════════════════════════════════════════════════

header('Content-Type: application/rss+xml; charset=utf-8');
header('Cache-Control: public, max-age=600'); // 10분 캐싱

require_once __DIR__ . '/_articles.php';
require_once __DIR__ . '/../config.php';

$baseUrl = 'https://btctiming.com';
$VALID_LANGS = array_keys(SUPPORTED_LANGS);

// 언어 결정
$lang = $_GET['lang'] ?? 'ko';
if (!in_array($lang, $VALID_LANGS, true)) $lang = 'ko';
$suffix = ($lang === 'ko') ? '' : ('?lang=' . $lang);

$articles = collectArticles(__DIR__);

// 카테고리 필터 (선택)
$category = $_GET['category'] ?? null;
if ($category && defined('CATEGORY_META') && isset(CATEGORY_META[$category])) {
    $articles = array_values(array_filter($articles, fn($a) => ($a['category'] ?? '') === $category));
}

// 개수 제한
$limit = isset($_GET['limit']) ? max(1, min(100, (int)$_GET['limit'])) : 30;
$articles = array_slice($articles, 0, $limit);

// 언어별 필드 선택 헬퍼 (해당 언어 없으면 en, 그것도 없으면 ko로 폴백)
$pick = function(array $a, string $field) use ($lang): string {
    foreach ([$lang, 'en', 'ko'] as $lc) {
        if (!empty($a["{$field}_{$lc}"])) return (string)$a["{$field}_{$lc}"];
    }
    return '';
};

// 피드 메타(언어별)
$__feedTitles = [
    'ko' => 'BTCtiming.com 블로그',
    'en' => 'BTCtiming.com Blog',
    'ja' => 'BTCtiming.com ブログ',
    'es' => 'Blog de BTCtiming.com',
    'de' => 'BTCtiming.com Blog',
    'fr' => 'Blog de BTCtiming.com',
    'pt' => 'Blog do BTCtiming.com',
    'tr' => 'BTCtiming.com Blog',
    'vi' => 'Blog BTCtiming.com',
];
$feedTitle = $__feedTitles[$lang] ?? $__feedTitles['en'];
$__feedDescs = [
    'ko' => '비트코인 온체인 지표 가이드, 시황분석, 주간 리포트, 칼럼.',
    'en' => 'Bitcoin on-chain indicator guides, market watch, weekly reports and columns.',
    'ja' => 'ビットコインのオンチェーン指標ガイド、市況分析、週間レポート、コラム。',
    'es' => 'Guías de indicadores on-chain de Bitcoin, análisis de mercado, informes semanales y columnas.',
    'de' => 'Bitcoin-On-Chain-Indikator-Guides, Marktanalysen, Wochenberichte und Kolumnen.',
    'fr' => 'Guides des indicateurs on-chain du Bitcoin, analyses de marché, rapports hebdomadaires et chroniques.',
    'pt' => 'Guias de indicadores on-chain do Bitcoin, análise de mercado, relatórios semanais e colunas.',
    'tr' => 'Bitcoin zincir üstü gösterge kılavuzları, piyasa analizi, haftalık raporlar ve köşe yazıları.',
    'vi' => 'Hướng dẫn chỉ báo on-chain của Bitcoin, phân tích thị trường, báo cáo hàng tuần và chuyên mục.',
];
$feedDesc = $__feedDescs[$lang] ?? $__feedDescs['en'];

// RFC-822 날짜 (RSS 표준). date 필드는 'YYYY-MM-DD' 또는 시간 포함일 수 있음.
$rfc822 = function(?string $raw): string {
    $raw = (string)$raw;
    $ts = $raw !== '' ? strtotime($raw) : false;
    if ($ts === false) $ts = time();
    return date(DATE_RSS, $ts);
};

$selfUrl = $baseUrl . '/blog/rss.php' . ($lang === 'ko' ? '' : ('?lang=' . $lang));
$blogUrl = i18nUrl('/blog/', $lang);

// 가장 최근 글 날짜를 채널 lastBuildDate로
$latestTs = time();
if (!empty($articles)) {
    $t = strtotime((string)($articles[0]['date'] ?? ''));
    if ($t) $latestTs = $t;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">' . "\n";
echo "  <channel>\n";
echo "    <title>" . htmlspecialchars($feedTitle, ENT_XML1) . "</title>\n";
echo "    <link>" . htmlspecialchars($blogUrl, ENT_XML1) . "</link>\n";
echo "    <description>" . htmlspecialchars($feedDesc, ENT_XML1) . "</description>\n";
echo "    <language>" . htmlspecialchars($lang, ENT_XML1) . "</language>\n";
echo "    <lastBuildDate>" . date(DATE_RSS, $latestTs) . "</lastBuildDate>\n";
echo '    <atom:link href="' . htmlspecialchars($selfUrl, ENT_XML1) . '" rel="self" type="application/rss+xml"/>' . "\n";

foreach ($articles as $a) {
    $slug = basename((string)($a['file'] ?? ''), '.php');
    if ($slug === '') continue;
    $url = i18nUrl('/blog/' . $slug . '.php', $lang);  // 경로형 clean
    $title = $pick($a, 'title');
    $desc  = $pick($a, 'desc');
    $catKey = $a['category'] ?? '';
    $catLabel = (defined('CATEGORY_META') && isset(CATEGORY_META[$catKey][$lang]))
        ? CATEGORY_META[$catKey][$lang]
        : $catKey;

    echo "    <item>\n";
    echo "      <title>" . htmlspecialchars($title, ENT_XML1) . "</title>\n";
    echo "      <link>" . htmlspecialchars($url, ENT_XML1) . "</link>\n";
    echo "      <guid isPermaLink=\"true\">" . htmlspecialchars($url, ENT_XML1) . "</guid>\n";
    echo "      <pubDate>" . $rfc822($a['date'] ?? null) . "</pubDate>\n";
    if ($catLabel !== '') {
        echo "      <category>" . htmlspecialchars($catLabel, ENT_XML1) . "</category>\n";
    }
    if ($desc !== '') {
        echo "      <description>" . htmlspecialchars($desc, ENT_XML1) . "</description>\n";
    }
    echo "    </item>\n";
}

echo "  </channel>\n";
echo "</rss>\n";
