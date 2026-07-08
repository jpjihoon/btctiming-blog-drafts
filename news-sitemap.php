<?php
// ============================================================================
//  news-sitemap.php  —  구글 뉴스 전용 사이트맵 (동적 생성)
// ----------------------------------------------------------------------------
//  구글 뉴스는 "최근 48시간 이내에 발행된 뉴스성 기사"만 사이트맵에 담기를
//  요구한다. 이 파일은 요청 시점에 _meta.php를 읽어, 48시간 이내 + 뉴스성
//  카테고리(시황분석·코인뉴스·주간리포트) 글만 골라 news 사이트맵을 만든다.
//
//  배포: /www/blog/news-sitemap.php 로 업로드
//  주소: https://btctiming.com/blog/news-sitemap.php
//  robots.txt 및 Google Search Console(뉴스 사이트맵)에 이 주소를 등록.
//
//  주의 (구글 뉴스 사이트맵 규칙):
//   - 48시간 넘은 글은 자동으로 빠진다(동적 계산). 별도 관리 불필요.
//   - <priority>, <changefreq> 같은 일반 사이트맵 태그는 넣지 않는다(뉴스
//     사이트맵 스키마에 없어 오류가 난다).
//   - 각 글은 주 언어(한국어) URL 하나로만 등록한다. 한 URL에 여러 언어
//     news 태그를 섞으면 구글이 언어를 혼동하므로 피한다.
//   - URL 1,000개 미만이어야 하는데, 48시간 창이라 자연히 소수만 남는다.
// ============================================================================

// 이 파일은 /www/blog/ 에 놓이므로 config는 상위(/www/config.php)에 있다.
require_once __DIR__ . '/../config.php';

$baseUrl = 'https://btctiming.com';

// 뉴스성 카테고리만 (가이드·칼럼·패치 같은 상시성 글은 뉴스 사이트맵에 넣지 않음)
$NEWS_CATEGORIES = ['news', 'coinnews', 'weekly'];

// 발행 후 며칠까지 포함할지 (구글 뉴스 규칙: 2일 = 48시간)
$MAX_AGE_HOURS = 48;

// 주 언어 (뉴스 사이트맵에 등록할 대표 언어)
$PRIMARY_LANG = 'ko';

// _meta.php 로드 (전체 글 메타)
$metaFile = __DIR__ . '/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];

// 발행일 → 타임스탬프 변환. date 필드는 "YYYY-MM-DD"라 KST 오전 9시로 간주.
// (실제 발행 시각이 메타에 없으므로, 그 날짜의 오전 9시 KST를 발행 시각으로 본다)
$nowTs = time();
$cutoffTs = $nowTs - ($MAX_AGE_HOURS * 3600);

$entries = [];
foreach ($articles as $slug => $M) {
    // 1) 뉴스성 카테고리인지
    $cat = $M['category'] ?? 'guide';
    if (!in_array($cat, $NEWS_CATEGORIES, true)) continue;

    // 2) 발행일 파싱 — date 필드가 "2026-07-08", "2026-07-08 13:20:00",
    //    "2026.07.08 13:20" 등 다양한 형식일 수 있으므로 유연하게 처리.
    $dateStr = trim($M['date'] ?? '');
    if ($dateStr === '') continue;
    // 점(.)을 하이픈(-)으로 통일 후, 앞부분에서 YYYY-MM-DD와 (있으면) 시:분:초 추출
    $normalized = str_replace('.', '-', $dateStr);
    if (!preg_match('/^(\d{4}-\d{2}-\d{2})(?:[ T](\d{2}:\d{2}(?::\d{2})?))?/', $normalized, $dm)) continue;
    $datePart = $dm[1];
    $timePart = $dm[2] ?? '09:00:00';       // 시간이 없으면 KST 오전 9시로 간주
    if (strlen($timePart) === 5) $timePart .= ':00'; // HH:MM → HH:MM:SS
    // KST(+09:00) 기준 발행 시각
    $pubTs = strtotime($datePart . ' ' . $timePart . ' +0900');
    if ($pubTs === false) continue;

    // 3) 48시간 이내인지 (미래 날짜는 제외)
    if ($pubTs < $cutoffTs) continue;
    if ($pubTs > $nowTs + 3600) continue; // 1시간 이상 미래면 제외(오기입 방지)

    // 4) 주 언어 제목 (없으면 영어 폴백)
    $title = $M['title_' . $PRIMARY_LANG] ?? $M['title_en'] ?? '';
    if ($title === '') continue;
    // 제목에 <br> 등이 섞이면 제거 (뉴스 title은 순수 텍스트)
    $title = trim(preg_replace('/<[^>]*>/', ' ', $title));
    $title = preg_replace('/\s+/', ' ', $title);

    // 5) URL — 주 언어(ko)는 접미사 없음
    $loc = "{$baseUrl}/blog/{$slug}.php";

    // 6) 발행일 W3C 형식 (시각+타임존). KST(+09:00)로 명시 — 서버 타임존과 무관하게 일관.
    $dt = new DateTime("@{$pubTs}");
    $dt->setTimezone(new DateTimeZone('Asia/Seoul'));
    $w3cDate = $dt->format('Y-m-d\TH:i:sP');

    $entries[] = [
        'loc'   => $loc,
        'date'  => $w3cDate,
        'title' => $title,
    ];
}

// 최신순 정렬
usort($entries, fn($a, $b) => strcmp($b['date'], $a['date']));

// ── XML 출력 ──
header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ' .
     'xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

foreach ($entries as $e) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($e['loc'], ENT_XML1) . "</loc>\n";
    echo "    <news:news>\n";
    echo "      <news:publication>\n";
    echo "        <news:name>BTCtiming.com</news:name>\n";
    echo "        <news:language>" . $PRIMARY_LANG . "</news:language>\n";
    echo "      </news:publication>\n";
    echo "      <news:publication_date>" . $e['date'] . "</news:publication_date>\n";
    echo "      <news:title>" . htmlspecialchars($e['title'], ENT_XML1) . "</news:title>\n";
    echo "    </news:news>\n";
    echo "  </url>\n";
}

echo '</urlset>' . "\n";
