<?php
// ============================================================================
//  news-sitemap.php  —  구글 뉴스 전용 사이트맵 (동적 생성, 다국어)
// ----------------------------------------------------------------------------
//  구글 뉴스는 "최근 48시간 이내에 발행된 뉴스성 기사"만 담기를 요구한다.
//  다국어 진출을 위해 언어별로 분리한다:
//
//    /blog/news-sitemap.php            → 사이트맵 인덱스(9개 언어 사이트맵을 가리킴)
//    /blog/news-sitemap.php?lang=ko    → 한국어 뉴스 사이트맵
//    /blog/news-sitemap.php?lang=en    → 영어 뉴스 사이트맵  … (vi 까지)
//
//  robots.txt / Search Console 에는 인덱스 주소(파라미터 없는 것)를 등록하면,
//  구글이 인덱스를 따라 언어별 사이트맵을 각각 발견·색인한다.
//
//  배포: /www/blog/news-sitemap.php 로 업로드
//
//  주의 (구글 뉴스 사이트맵 규칙):
//   - 48시간 넘은 글은 자동으로 빠진다(동적 계산). 별도 관리 불필요.
//   - <priority>·<changefreq> 등 일반 사이트맵 태그는 넣지 않는다(뉴스 스키마에 없음).
//   - 한 URL(=한 언어 판)에는 news:language 하나만 넣는다. 언어별로 URL·제목을 분리.
//   - 각 언어 사이트맵은 URL 1,000개 미만이어야 하는데, 48시간 창이라 자연히 소수만 남는다.
//   - 특정 언어 번역 제목이 없는 글은 그 언어 사이트맵에서 자동 제외.
// ============================================================================

// 이 파일은 /www/blog/ 에 놓이므로 config는 상위(/www/config.php)에 있다.
require_once __DIR__ . '/../config.php';

$baseUrl = 'https://btctiming.com';

// 지원 언어 (config의 SUPPORTED_LANGS 키). ko 포함, ko 우선.
$LANGS = array_keys(SUPPORTED_LANGS);
if (!in_array('ko', $LANGS, true)) array_unshift($LANGS, 'ko');

header('Content-Type: application/xml; charset=UTF-8');

// 응답 gzip 압축: Cafe24 mod_deflate가 PHP 동적출력에 안 걸려 미압축으로 나가던 문제 해결
if (!ini_get('zlib.output_compression')
    && extension_loaded('zlib')
    && strpos($_SERVER['HTTP_ACCEPT_ENCODING'] ?? '', 'gzip') !== false) {
    @ob_start('ob_gzhandler');
}

// ────────────────────────────────────────────────────────────────────────
//  (A) lang 파라미터가 없거나 유효하지 않으면 → 사이트맵 인덱스 출력
// ────────────────────────────────────────────────────────────────────────
$reqLang = isset($_GET['lang']) ? (string)$_GET['lang'] : '';
if ($reqLang === '' || !in_array($reqLang, $LANGS, true)) {
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($LANGS as $lc) {
        $loc = "{$baseUrl}/blog/news-sitemap.php?lang=" . rawurlencode($lc);
        echo "  <sitemap>\n";
        echo "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        echo "  </sitemap>\n";
    }
    echo '</sitemapindex>' . "\n";
    exit;
}

// ────────────────────────────────────────────────────────────────────────
//  (B) 특정 언어 뉴스 사이트맵
// ────────────────────────────────────────────────────────────────────────
$LANG = $reqLang;

// 뉴스성 카테고리만 (가이드·칼럼 등 상시성 글은 제외)
$NEWS_CATEGORIES = ['news', 'coinnews', 'weekly'];
// 발행 후 며칠까지 포함할지 (구글 뉴스 규칙: 2일 = 48시간)
$MAX_AGE_HOURS = 48;

// _meta.php 로드 (전체 글 메타)
$metaFile = __DIR__ . '/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];

$nowTs    = time();
$cutoffTs = $nowTs - ($MAX_AGE_HOURS * 3600);

$entries = [];
foreach ($articles as $slug => $M) {
    // 1) 뉴스성 카테고리인지
    $cat = $M['category'] ?? 'guide';
    if (!in_array($cat, $NEWS_CATEGORIES, true)) continue;

    // 2) 발행일 파싱 ("2026-07-08", "2026-07-08 13:20:00", "2026.07.08 13:20" 등)
    $dateStr = trim($M['date'] ?? '');
    if ($dateStr === '') continue;
    $normalized = str_replace('.', '-', $dateStr);
    if (!preg_match('/^(\d{4}-\d{2}-\d{2})(?:[ T](\d{2}:\d{2}(?::\d{2})?))?/', $normalized, $dm)) continue;
    $datePart = $dm[1];
    $timePart = $dm[2] ?? '09:00:00';       // 시간이 없으면 KST 오전 9시로 간주
    if (strlen($timePart) === 5) $timePart .= ':00';
    $pubTs = strtotime($datePart . ' ' . $timePart . ' +0900'); // KST(+09:00)
    if ($pubTs === false) continue;

    // 3) 48시간 이내인지 (미래 오기입 제외)
    if ($pubTs < $cutoffTs) continue;
    if ($pubTs > $nowTs + 3600) continue;

    // 4) 해당 언어 제목 (없으면 그 언어 사이트맵에서 제외)
    $title = $M['title_' . $LANG] ?? '';
    if ($title === '') continue;
    $title = trim(preg_replace('/<[^>]*>/', ' ', $title));  // 태그 제거(순수 텍스트)
    $title = preg_replace('/\s+/', ' ', $title);
    if ($title === '') continue;

    // 5) 언어별 URL — ko는 접미사 없음, 그 외 ?lang=xx (langSuffix)
    $loc = i18nUrl("/blog/{$slug}.php", $LANG);  // 경로형 clean (ko=/blog/slug, en=/en/blog/slug)

    // 6) 발행일 W3C 형식 (KST 명시 — 서버 타임존 무관하게 일관)
    $dt = new DateTime("@{$pubTs}");
    $dt->setTimezone(new DateTimeZone('Asia/Seoul'));
    $w3cDate = $dt->format('Y-m-d\TH:i:sP');

    $entries[] = ['loc' => $loc, 'date' => $w3cDate, 'title' => $title];
}

// 최신순 정렬
usort($entries, fn($a, $b) => strcmp($b['date'], $a['date']));

// ── XML 출력 ──
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ' .
     'xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

foreach ($entries as $e) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($e['loc'], ENT_XML1) . "</loc>\n";
    echo "    <news:news>\n";
    echo "      <news:publication>\n";
    echo "        <news:name>BTCtiming.com</news:name>\n";
    echo "        <news:language>" . htmlspecialchars($LANG, ENT_XML1) . "</news:language>\n";
    echo "      </news:publication>\n";
    echo "      <news:publication_date>" . $e['date'] . "</news:publication_date>\n";
    echo "      <news:title>" . htmlspecialchars($e['title'], ENT_XML1) . "</news:title>\n";
    echo "    </news:news>\n";
    echo "  </url>\n";
}

echo '</urlset>' . "\n";
