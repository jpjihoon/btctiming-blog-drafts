<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 아티클 공통 헤더
//
// 사용법: 각 아티클 파일(blog/{slug}.php) 맨 위에서
//   $slug 변수에 슬러그를 지정한 뒤 이 파일을 require 하면 됩니다.
//   (예: mvrv-z-score.php 파일 맨 위 한 줄 참고)
// 이렇게 한 줄만 넣으면 nav/브레드크럼/제목/GA태그/CSS가 전부 자동으로 나옵니다.
//
// nav, 브레드크럼, footer 디자인을 바꾸고 싶으면 이 파일과 _footer.php
// 딱 2개만 고치면 모든 글에 한 번에 반영됩니다.
// ═══════════════════════════════════════════════════════

if (!isset($slug)) {
    http_response_code(500);
    die('_header.php는 $slug 변수를 먼저 설정한 뒤에 include해야 합니다.');
}

$ARTICLES = require __DIR__ . '/_meta.php';
$M = $ARTICLES[$slug] ?? null;
if ($M === null) {
    http_response_code(404);
    die("아티클을 찾을 수 없습니다: " . htmlspecialchars($slug));
}

if (!defined('CATEGORY_META')) {
    define('CATEGORY_META', require __DIR__ . '/_category_meta.php');
}
$catKey = $M['category'] ?? 'guide';
$catLabel = CATEGORY_META[$catKey] ?? CATEGORY_META['guide'];

function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// ── 서버사이드 언어 감지 (SEO 핵심) ──
// ?lang=en / ?lang=ja 요청 시 서버가 요청 시점에 언어를 확정해서
// <html lang>, <title>, canonical, hreflang을 전부 그에 맞게 내려줌.
//
// 중요: 아직 특정 언어로 번역 안 된 글에서 그 언어를 요청하면, 깨진 화면(본문이
// 텅 빈 상태) 대신 조용히 영어로 폴백됨. title_{언어} 존재 여부로 번역 완료 판단.
// 2026-07 수정: 기존엔 ?lang= 값이 'en'/'ja'만 인식돼서, es/de 같은 신규 언어를 요청하면
// 인식 실패로 조용히 한국어(ko)로 떨어지는 버그가 있었음. config.php의 SUPPORTED_LANGS를
// 유일한 정답 소스로 써서, 새 언어가 추가돼도 이 파일은 안 건드려도 되게 일반화함.
require_once __DIR__ . '/../config.php';
// 언어 결정: URL ?lang 우선 → 없으면 쿠키(blogLang, 마지막 선택) → ko.
// 쿠키를 읽으므로 뒤로가기로 lang 없는 글 URL에 와도 마지막 선택 언어로 렌더된다.
$requestedLang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
$hasJa = isset($M['title_ja']); // 이 글이 일본어로 번역됐는지 여부
$hasLangContent = $requestedLang === 'ko' || $requestedLang === 'en' || isset($M["title_{$requestedLang}"]);
$lang = $hasLangContent ? $requestedLang : 'en'; // 이 글에 해당 언어 콘텐츠가 없으면 영어로 폴백
$isEn = ($lang === 'en'); // 기존 코드 호환용 (블로그 링크 접미사 등에서 계속 사용)
// ★ 2026-07-17: <html lang> 은 반드시 SUPPORTED_LANGS 의 '키'를 쓴다. hreflang 값이 아니다.
//   왜: 언어 표시/숨김 CSS 가 [lang="{키}"] .{다른언어} 로 생성되고(아래 468행),
//       _shared_footer / _guide_head / blog index.php 도 같은 선택자를 쓴다(총 4파일).
//       JS 도 document.getElementById('hr').lang = l 로 이 값을 토글한다.
//       여기에 'zh-TW' 를 넣으면 [lang="zh"] 규칙이 아예 안 맞아 언어 CSS 가 통째로 죽는다.
//   SEO 신호는 hreflang(hreflangOf)이 담당하므로 실질 손해가 없다.
//   아래 JSON-LD inLanguage 만 정확한 값(zh-TW, pt-BR)을 쓴다.
$htmlLang    = $lang;
$jsonLdLang  = hreflangOf($lang);

// LANG_FIELD: SUPPORTED_LANGS(config.php)를 유일 소스로 자동 생성 → 언어 추가 시 이 파일 불변
$LANG_FIELD = [];
foreach (array_keys(SUPPORTED_LANGS) as $__lc) { $LANG_FIELD[$__lc] = '_' . $__lc; }
$suf = $LANG_FIELD[$lang] ?? '_en';

// ═══════════════════════════════════════════════════════════════
// ★ 2026-07-15 단일언어 렌더
//   기존: 9개 언어를 전부 HTML에 인라인 → CSS([lang="ko"] .en{display:none})로 8개를 숨김.
//        한국어로 보든 영어로 보든 9개 언어를 전부 다운로드한다. 받은 것의 89%를 버린다.
//        실측: 글 1편 322,906 B (gzip 120,390 B)
//   변경: 출력 버퍼를 가로채 현재 언어가 아닌 블록을 서버에서 제거하고 내려보낸다.
//        실측: 144,781 B (gzip 52,713 B) → gzip 기준 -56%
//   글 파일 1051편은 손대지 않는다. 이 파일 하나로 전부 처리된다.
//   렌더 비용은 1.5~5ms. 개별 글은 Cloudflare가 2시간 캐시하므로 원본 부하는 미미하다.
// ═══════════════════════════════════════════════════════════════
if (!function_exists('bt_single_lang')) {
    function bt_single_lang(string $html, string $lang, array $all): string {
        if (count($all) < 2) return $html;
        $allFlip = array_flip($all);   // 전체 언어 집합 (현재 언어 포함)
        $out = ''; $pos = 0;
        // class 속성을 가진 여는 태그를 훑는다
        $re = '/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*?\bclass="([^"]*)"[^>]*?(\/?)>/';
        while (preg_match($re, $html, $m, PREG_OFFSET_CAPTURE, $pos)) {
            $tagStart = $m[0][1];
            $tagEnd   = $tagStart + strlen($m[0][0]);
            $tag      = $m[1][0];
            $selfClose= ($m[3][0] === '/');
            // ★ 2026-07-16 버그 수정
            //   기존: class 에 '비-현재언어'가 하나라도 있으면 삭제 → 완전히 틀렸다.
            //     class="en es de fr pt tr vi" (한 요소를 7개 언어가 공유) 를
            //     영어로 볼 때 'es' 가 있다는 이유로 영어 콘텐츠를 통째로 지웠다.
            //     실측 피해: 1,409개 요소 / 172편 (en 201개, pt 348개 …) — 9개 언어 전부.
            //   올바른 규칙: class 안의 언어코드 목록을 보고
            //     - 언어코드가 하나도 없으면        → 언어와 무관한 요소. 건드리지 않는다
            //     - 현재 언어가 목록에 있으면        → 유지 ("en es de" 를 en 으로 볼 때)
            //     - 현재 언어가 목록에 없으면        → 삭제 ("ko" 를 en 으로 볼 때)
            $langsInClass = [];
            foreach (preg_split('/\s+/', trim($m[2][0])) as $c) {
                if (isset($allFlip[$c])) $langsInClass[] = $c;
            }
            $hit = $langsInClass && !in_array($lang, $langsInClass, true);
            if (!$hit) { $out .= substr($html, $pos, $tagEnd - $pos); $pos = $tagEnd; continue; }
            $out .= substr($html, $pos, $tagStart - $pos);
            if ($selfClose) { $pos = $tagEnd; continue; }
            // 같은 태그 중첩을 세면서 짝 닫는 태그를 찾는다
            $depth = 1; $p = $tagEnd;
            $tre = '#<(/?)' . preg_quote($tag, '#') . '\b[^>]*>#i';
            while ($depth > 0 && preg_match($tre, $html, $mm, PREG_OFFSET_CAPTURE, $p)) {
                $p = $mm[0][1] + strlen($mm[0][0]);
                $depth += ($mm[1][0] === '/') ? -1 : 1;
            }
            // 짝을 못 찾으면 건드리지 않고 원본 유지 (안전 우선)
            if ($depth !== 0) { $out .= substr($html, $tagStart, $tagEnd - $tagStart); $pos = $tagEnd; continue; }
            $pos = $p;
        }
        return $out . substr($html, $pos);
    }
}
$__btLangAll = array_keys(SUPPORTED_LANGS);
$__btLang    = $lang;
ob_start(function (string $buf) use ($__btLang, $__btLangAll): string {
    return bt_single_lang($buf, $__btLang, $__btLangAll);
});
$pageTitle = ($M['title' . $suf] ?? $M['title_en']) . ' | BTCtiming.com';
$pageDesc  = $M['desc' . $suf] ?? $M['desc_en'];
$baseUrl   = "https://btctiming.com/blog/{$slug}.php";
$__koPath  = "/blog/{$slug}.php";                 // ko 기준 경로 (i18nUrl 입력)
$canonical = i18nUrl($__koPath, $lang);           // 경로형 self-canonical (ko는 .php, 비-ko는 /{lang}/blog/{slug})

// SNS 공유바 렌더 (상단·하단 공용). $variant = 'top' | 'bottom'
if (!function_exists('renderShareBar')) {
    function renderShareBar(string $variant = 'top'): void {
        $cls = $variant === 'bottom' ? 'share-bar share-bottom' : 'share-bar share-top';
        // ★ 2026-07-19: id/pl/it/ru/zh 추가. 없으면 새 언어에서 공유/링크복사 버튼 텍스트가 빈칸으로 렌더된다(단일언어 필터가 매칭 span 없어서 전부 제거).
        $shareLabel = '<span class="ko">공유</span><span class="en">Share</span><span class="ja">シェア</span><span class="es">Compartir</span><span class="de">Teilen</span><span class="fr">Partager</span><span class="pt">Compartilhar</span><span class="tr">Paylaş</span><span class="vi">Chia sẻ</span><span class="id">Bagikan</span><span class="pl">Udostępnij</span><span class="it">Condividi</span><span class="ru">Поделиться</span><span class="zh">分享</span>';
        $copyLabel  = '<span class="ko">링크 복사</span><span class="en">Copy link</span><span class="ja">リンクをコピー</span><span class="es">Copiar enlace</span><span class="de">Link kopieren</span><span class="fr">Copier le lien</span><span class="pt">Copiar link</span><span class="tr">Bağlantıyı kopyala</span><span class="vi">Sao chép liên kết</span><span class="id">Salin tautan</span><span class="pl">Kopiuj link</span><span class="it">Copia link</span><span class="ru">Копировать ссылку</span><span class="zh">複製連結</span>';
        $copied     = '<span class="ko">복사됨</span><span class="en">Copied</span><span class="ja">コピー</span><span class="es">Copiado</span><span class="de">Kopiert</span><span class="fr">Copié</span><span class="pt">Copiado</span><span class="tr">Kopyalandı</span><span class="vi">Đã sao chép</span><span class="id">Tersalin</span><span class="pl">Skopiowano</span><span class="it">Copiato</span><span class="ru">Скопировано</span><span class="zh">已複製</span>';
        echo '<div class="' . $cls . '" data-share>';
        // 공유 토글 버튼 하나 — 클릭 시 SNS 옵션이 펼쳐짐 (모바일 네이티브 공유 지원 시엔 시스템 시트를 바로 엶)
        echo '<div class="share-wrap">';
        echo '<button type="button" class="share-toggle" data-share-toggle aria-expanded="false">↗ <span class="share-toggle-tx">' . $shareLabel . '</span></button>';
        echo '<div class="share-pop" data-share-pop hidden>';
        echo '<a class="share-btn sh-x" data-net="x" href="#" rel="nofollow noopener" target="_blank" aria-label="X (Twitter)">𝕏</a>';
        echo '<a class="share-btn sh-fb" data-net="fb" href="#" rel="nofollow noopener" target="_blank" aria-label="Facebook">f</a>';
        echo '<a class="share-btn sh-in" data-net="in" href="#" rel="nofollow noopener" target="_blank" aria-label="LinkedIn">in</a>';
        echo '<a class="share-btn sh-tg" data-net="tg" href="#" rel="nofollow noopener" target="_blank" aria-label="Telegram">✈</a>';
        echo '<a class="share-btn sh-ln" data-net="line" href="#" rel="nofollow noopener" target="_blank" aria-label="LINE">L</a>';
        echo '<a class="share-btn sh-wa" data-net="wa" href="#" rel="nofollow noopener" target="_blank" aria-label="WhatsApp">✆</a>';
        echo '</div>';
        echo '</div>';
        // 복사 버튼 — 항상 별도 노출
        echo '<button type="button" class="share-copy-btn" data-net="copy" aria-label="Copy link">🔗 <span class="copy-tx">' . $copyLabel . '</span><span class="copied-tip">' . $copied . '</span></button>';
        echo '</div>';
    }
}

// 카테고리 라벨 (없으면 기본 가이드로 취급)
$CATS = require __DIR__ . '/_category_meta.php';
$catKey = $M['category'] ?? 'guide';
$catLabel = $CATS[$catKey] ?? $CATS['guide'];
// ★ 2026-07-17: id/pl/it/ru/zh 추가. 없으면 og:locale 이 빈 값이 되고 217행 empty() 체크에 걸려 alternate 가 빠진다.
$LOCALE_MAP = ['ko' => 'ko_KR', 'en' => 'en_US', 'ja' => 'ja_JP', 'es' => 'es_ES', 'de' => 'de_DE', 'fr' => 'fr_FR', 'pt' => 'pt_BR', 'tr' => 'tr_TR', 'vi' => 'vi_VN', 'id' => 'id_ID', 'pl' => 'pl_PL', 'it' => 'it_IT', 'ru' => 'ru_RU', 'zh' => 'zh_TW'];
?>
<!DOCTYPE html>
<html lang="<?= $htmlLang ?>" id="hr">
<head>
<script>
/* 새로고침 시 스크롤 덜컹임 + 목차 팝인 방지:
   리로드일 때만 DOM/스크롤 확정까지 화면을 숨겼다가 위치 잡고 한 번에 표시.
   (본문 끝쪽에서 함께 섹션 주입 등으로 높이가 바뀌어 스크롤 복원이 어긋나는 문제를 근본 차단) */
(function(){
  try{
    if(!('scrollRestoration' in history)) return;
    var de=document.documentElement, KEY='bt_vs_'+location.pathname;
    var _n=(window.performance&&performance.getEntriesByType&&performance.getEntriesByType('navigation')[0]);
    var reload=_n?(_n.type==='reload'):(window.performance&&performance.navigation&&performance.navigation.type===1);
    var save=function(){ try{ sessionStorage.setItem(KEY,String(window.scrollY||window.pageYOffset||0)); }catch(e){} };
    var st; window.addEventListener('scroll',function(){ clearTimeout(st); st=setTimeout(save,150); },{passive:true});
    window.addEventListener('pagehide',save);
    if(reload){
      history.scrollRestoration='manual';
      de.style.visibility='hidden';                 // 로드 중 숨김(레이아웃은 계산됨)
      var reveal=function(){ de.style.visibility=''; };
      var restore=function(){ var y=0; try{ y=parseInt(sessionStorage.getItem(KEY)||'0',10)||0; }catch(e){} if(y>0) window.scrollTo(0,y); reveal(); };
      if(document.readyState!=='loading') restore();
      else document.addEventListener('DOMContentLoaded', restore);  // 함께/목차 DOM 확정 후
      setTimeout(reveal, 700);                        // 안전장치: 무슨 일 있어도 표시
    }
  }catch(e){ try{ document.documentElement.style.visibility=''; }catch(_){} }
})();
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD01B9SL3K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-VD01B9SL3K');
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= h($pageTitle) ?></title>
<?php /* __ART_TITLE/__ART_DESC(14언어 title·desc JS 페이로드) 제거 — 단일언어 렌더 후 서버가 <title>·description 을
        정확한 언어로 박고, 언어 전환은 Lpick 이 페이지를 이동(전체 재로드)하므로 클라이언트 갱신이 불필요.
        _footer.php 의 L(l) 폴백 경로는 window.__ART_TITLE 존재 여부를 가드하므로 정의가 없어도 no-op. (gzip 절감) */ ?>
<meta name="description" content="<?= h($pageDesc) ?>">
<link rel="canonical" href="<?= h($canonical) ?>">
<link rel="alternate" type="application/rss+xml" title="BTCtiming.com Blog RSS" href="https://btctiming.com/blog/rss.php<?= $lang === 'ko' ? '' : '?lang=' . h($lang) ?>">
<!-- hreflang: 실제로 번역이 존재하는 언어만 대응 URL로 알림 (미번역 언어는 넣지 않음 — 오도 방지) -->
<?php foreach (array_keys(SUPPORTED_LANGS) as $__hl): if ($__hl !== 'ko' && $__hl !== 'en' && !isset($M["title_{$__hl}"])) continue; ?>
<link rel="alternate" hreflang="<?= h(hreflangOf($__hl)) ?>" href="<?= h(i18nUrl($__koPath, $__hl)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= h(i18nUrl($__koPath, 'ko')) ?>">
<meta property="og:title" content="<?= h($M['title' . $suf] ?? $M['title_en']) ?> | BTCtiming.com">
<meta property="og:description" content="<?= h($pageDesc) ?>">
<meta property="og:url" content="<?= h($canonical) ?>">
<meta property="og:type" content="article">
<meta property="og:image" content="https://btctiming.com/og.php?slug=<?= h($slug) ?>&lang=<?= h($lang) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="BTCtiming.com">
<meta property="og:locale" content="<?= $LOCALE_MAP[$lang] ?>">
<?php foreach (SUPPORTED_LANGS as $altLang => $altInfo): if ($altLang === $lang) continue; if ($altLang !== 'ko' && $altLang !== 'en' && !isset($M["title_{$altLang}"])) continue; if (empty($LOCALE_MAP[$altLang])) continue; ?>
<meta property="og:locale:alternate" content="<?= $LOCALE_MAP[$altLang] ?>">
<?php endforeach; ?>
<!-- 트위터(X) 카드: og 태그와 별도로 트위터가 우선 참조하는 태그 -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($M['title' . $suf] ?? $M['title_en']) ?>">
<meta name="twitter:description" content="<?= h($pageDesc) ?>">
<meta name="twitter:image" content="https://btctiming.com/og.php?slug=<?= h($slug) ?>&lang=<?= h($lang) ?>">
<?php
// 구글 뉴스/검색용 구조화 데이터.
// 뉴스성 카테고리(시황분석·코인뉴스·주간리포트)는 NewsArticle, 나머지(가이드·칼럼·패치)는 Article로 구분.
// NewsArticle은 구글 뉴스가 "시의성 있는 기사"로 인식하는 더 강한 신호다.
$__newsCats = ['news', 'coinnews', 'weekly'];
$__schemaType = in_array($catKey, $__newsCats, true) ? 'NewsArticle' : 'Article';
// image는 고정 배너 대신 기사별 OG 이미지(og.php)를 사용 — 각 기사의 고유 이미지로 노출.
$__ogImage = "https://btctiming.com/og.php?slug={$slug}&lang={$lang}";
// dateModified: 메타에 수정일(dateModified)이 있으면 그것을, 없으면 발행일을 사용.
$__dateMod = $M['dateModified'] ?? $M['date'];
// ★ 2026-07-19: datePublished/dateModified ISO8601 정규화.
//   기존엔 무조건 "…T09:00:00+09:00" 을 이어붙여, date 에 이미 시각이 있는 신규 글에서
//   "2026-07-17 09:25:00T09:00:00+09:00" 처럼 형식이 깨졌다(구글 리치결과 영향).
//   date 가 "YYYY-MM-DD HH:MM:SS" 면 공백을 T 로 바꿔 실제 시각을 쓰고, "YYYY-MM-DD"(옛 글)면 T09:00:00 을 붙인다. (KST 고정)
$__isoKst = static function ($d) {
    $d = trim((string) $d);
    return strpos($d, ' ') !== false ? str_replace(' ', 'T', $d) . '+09:00' : $d . 'T09:00:00+09:00';
};
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "<?= $__schemaType ?>",
  "headline": <?= json_encode($M['title' . $suf] ?? $M['title_en'], JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($pageDesc, JSON_UNESCAPED_UNICODE) ?>,
  "image": [<?= json_encode($__ogImage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>],
  "datePublished": "<?= h($__isoKst($M['date'])) ?>",
  "dateModified": "<?= h($__isoKst($__dateMod)) ?>",
  "inLanguage": "<?= $jsonLdLang ?>",
  "mainEntityOfPage": { "@type": "WebPage", "@id": "<?= h($canonical) ?>" },
  "author": {
    "@type": "Organization",
    "name": "BTCtiming Research",
    "url": "https://btctiming.com/"
  },
  "publisher": {
    "@type": "Organization",
    "name": "BTCtiming.com",
    "url": "https://btctiming.com/",
    "logo": { "@type": "ImageObject", "url": "https://btctiming.com/icon-512.png", "width": 512, "height": 512 }
  }
}
</script>
<link rel="stylesheet" href="/blog/assets/blog.css?v=<?= @filemtime(__DIR__ . '/assets/blog.css') ?>">
<style>/* 언어 표시/숨김: 현재 lang이 아닌 클래스는 전부 숨김 (SUPPORTED_LANGS 기반 자동 생성) */
<?php
// 각 언어 L에 대해: [lang="L"] .{다른언어} { display:none }
$__allLangs = array_keys(SUPPORTED_LANGS);
$__rules = [];
foreach ($__allLangs as $__cur) {
    foreach ($__allLangs as $__other) {
        if ($__cur === $__other) continue;
        $__rules[] = '[lang="' . $__cur . '"] .' . $__other;
    }
}
echo implode(",\n", $__rules) . "{display:none}\n";
?>
</style>
<style>
/* ── 뷰페이지 개선: 읽기 진행바 · 목차 · 차트 figure ── */
#btReadBar{position:fixed;top:0;left:0;height:3px;width:0;background:#f7931a;z-index:9999;transition:width .1s linear}
.wrap-main figure.bt-fig{margin:20px 0;padding:0}
.wrap-main figure.bt-fig figcaption{font-size:11.5px;color:var(--t2,#71717a);margin-top:7px;line-height:1.5}
</style>
</head>
<body>
<div id="btReadBar" aria-hidden="true"></div>
<!-- 조회수 집계: 세션당 1회. 누적 + 시간버킷(24h 인기 계산용) 원자적 증가 -->
<script>
(function(){try{
  var s=<?= json_encode($slug, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>;
  if(!s) return;
  var k='bv_'+s;
  if(sessionStorage.getItem(k)) return;
  sessionStorage.setItem(k,'1');
  var DB='https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app';
  var INC=JSON.stringify({'.sv':{increment:1}});
  function put(path){ fetch(DB+'/'+path+'.json',{method:'PUT',headers:{'Content-Type':'application/json'},body:INC}).catch(function(){}); }
  // UTC 기준 시간 버킷 YYYYMMDDHH (24개 합산 = 최근 24시간)
  var d=new Date();
  function p2(n){return (n<10?'0':'')+n;}
  var bucket=''+d.getUTCFullYear()+p2(d.getUTCMonth()+1)+p2(d.getUTCDate())+p2(d.getUTCHours());
  var es=encodeURIComponent(s);
  put('blogViews/'+es);                       // 누적(역대)
  put('blogViewsHourly/'+es+'/'+bucket);      // 시간버킷(최근 24h/48h 인기)
}catch(e){}})();
</script>
<nav><div class="nav-w">
  <a href="<?= h(i18nPath('/', $lang)) ?>" class="logo"><svg class="logo-ic" width="19" height="19" viewBox="0 0 64 64" aria-hidden="true"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>BTC<span>timing</span></a>
  <?php
  // "블로그 목록으로" 링크: 언어별 라벨 + 영어 폴백. ko는 접미사 없음.
  $__backLabel = ['ko'=>'← 블로그 목록','en'=>'← All Posts','ja'=>'← 記事一覧','es'=>'← Todas las Publicaciones','de'=>'← Alle Beiträge','fr'=>'← Tous les articles','pt'=>'← Todos os posts','tr'=>'← Tüm Yazılar','vi'=>'← Tất cả bài viết','id'=>'← Semua Postingan','pl'=>'← Wszystkie wpisy','it'=>'← Tutti gli articoli','ru'=>'← Все статьи','zh'=>'← 所有文章'];
  foreach (array_keys(SUPPORTED_LANGS) as $__bl):
    // ko·en은 항상, 그 외는 이 글에 번역 있을 때만 (드롭다운 노출 언어와 일치)
    if ($__bl !== 'ko' && $__bl !== 'en' && !isset($M["title_{$__bl}"])) continue;
    $__blHref = i18nPath('/blog/', $__bl);
  ?>
  <span class="back <?= $__bl ?>"><a href="<?= h($__blHref) ?>" style="color:var(--t2)"><?= h($__backLabel[$__bl] ?? $__backLabel['en']) ?></a></span>
  <?php endforeach; ?>
  <?php $__nbLang = $lang; $__nbHide = 'blog'; include __DIR__ . '/../_nav_btns.php'; ?>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel"><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <?php foreach (SUPPORTED_LANGS as $__lc => $__meta):
        // ko·en은 항상 노출, 그 외 언어는 이 글에 번역(title_xx)이 있을 때만 노출
        if ($__lc !== 'ko' && $__lc !== 'en' && !isset($M["title_{$__lc}"])) continue; ?>
      <button type="button" class="lang-menu-item<?= $lang===$__lc ? ' active' : '' ?>" data-lang="<?= h($__lc) ?>" onclick="Lpick('<?= h($__lc) ?>')"><span class="lm-flag"><?= $__meta['flag'] ?></span><?= h($__meta['name']) ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>
<?php $__cbMode = 'view'; $__cbActive = $catKey; $__cbLang = $requestedLang; include __DIR__ . '/_cat_bar.php'; ?>
<div class="wrap">
<div class="wrap-main">
  <?php
    $bcSuffix = langSuffix($requestedLang); // 브레드크럼 링크도 현재 보고 있는 언어를 유지하도록
    $bcCatHref = ($requestedLang === 'ko' ? '' : '/' . h($requestedLang)) . '/blog/?cat=' . h($catKey);  // 경로형
  ?>
  <div class="bc">
    <?php
    // breadcrumb 고정 라벨(홈/블로그)은 언어별 사전, 나머지는 meta 필드 + 영어 폴백
    $__bcHome = ['ko'=>'홈','en'=>'Home','ja'=>'ホーム','es'=>'Inicio','de'=>'Startseite','fr'=>'Accueil','pt'=>'Início','tr'=>'Ana Sayfa','vi'=>'Trang chủ','id'=>'Beranda','pl'=>'Strona główna','it'=>'Home','ru'=>'Главная','zh'=>'首頁'];
    $__bcBlog = ['ko'=>'블로그','en'=>'Blog','ja'=>'ブログ','es'=>'Blog','de'=>'Blog','fr'=>'Blog','pt'=>'Blog','tr'=>'Blog','vi'=>'Blog','id'=>'Blog','pl'=>'Blog','it'=>'Blog','ru'=>'Блог','zh'=>'部落格'];
    $__langKeys = array_keys(SUPPORTED_LANGS);
    // 홈
    echo '<a href="' . h(i18nPath('/', $requestedLang)) . '" id="bcHomeLink">';
    foreach ($__langKeys as $__l) echo '<span class="' . $__l . '">' . h($__bcHome[$__l] ?? $__bcHome['en']) . '</span>';
    echo '</a><span class="bc-sep">›</span>';
    // 블로그
    echo '<a href="' . h(i18nPath('/blog/', $requestedLang)) . '" id="bcBlogLink">';
    foreach ($__langKeys as $__l) echo '<span class="' . $__l . '">' . h($__bcBlog[$__l] ?? $__bcBlog['en']) . '</span>';
    echo '</a><span class="bc-sep">›</span>';
    // 카테고리 라벨 (CATEGORY_META 기반 + 영어 폴백)
    echo '<a href="' . h($bcCatHref) . '" id="bcCatLink" data-cat="' . h($catKey) . '">';
    foreach ($__langKeys as $__l) echo '<span class="' . $__l . '">' . h($catLabel[$__l] ?? $catLabel['en']) . '</span>';
    echo '</a><span class="bc-sep">›</span>';
    // 현재 글 breadcrumb (meta bc_xx + 영어 폴백)
    echo '<span class="bc-current">';
    foreach ($__langKeys as $__l) echo '<span class="' . $__l . '">' . ($M["bc_{$__l}"] ?? $M['bc_en']) . '</span>';
    echo '</span>';
    ?>
  </div>

  <?php
    // ── BreadcrumbList 구조화 데이터 (시각 breadcrumb과 동일 경로) ──
    $__bcHomeName = ['ko'=>'홈','en'=>'Home','ja'=>'ホーム','es'=>'Inicio','de'=>'Startseite','fr'=>'Accueil','pt'=>'Início','tr'=>'Ana Sayfa','vi'=>'Trang chủ','id'=>'Beranda','pl'=>'Strona główna','it'=>'Home','ru'=>'Главная','zh'=>'首頁'];
    $__bcBlogName = ['ko'=>'블로그','en'=>'Blog','ja'=>'ブログ','es'=>'Blog','de'=>'Blog','fr'=>'Blog','pt'=>'Blog','tr'=>'Blog','vi'=>'Blog','id'=>'Blog','pl'=>'Blog','it'=>'Blog','ru'=>'Блог','zh'=>'部落格'];
    $__bcLang = $lang;
    $__bcLd = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
      ['@type'=>'ListItem','position'=>1,'name'=>($__bcHomeName[$__bcLang] ?? $__bcHomeName['en']),'item'=>i18nUrl('/', $__bcLang)],
      ['@type'=>'ListItem','position'=>2,'name'=>($__bcBlogName[$__bcLang] ?? 'Blog'),'item'=>i18nUrl('/blog/', $__bcLang)],
      ['@type'=>'ListItem','position'=>3,'name'=>($catLabel[$__bcLang] ?? $catLabel['en']),'item'=>('https://btctiming.com'.$bcCatHref)],
      ['@type'=>'ListItem','position'=>4,'name'=>($M['title'.$suf] ?? $M['title_en']),'item'=>$canonical],
    ]];
  ?>
  <script type="application/ld+json">
<?= json_encode($__bcLd, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>
  </script>
  <?php foreach ($__langKeys as $__l): ?>
  <h1 class="<?= $__l ?>"><?= trim(preg_replace('/\s+/u', ' ', preg_replace('/<br\s*\/?>/i', ' ', $M["h1_{$__l}"] ?? $M['h1_en']))) ?></h1>
  <?php endforeach; ?>
  <div class="meta">
    <?php
    // 작성 시각: KST 원본 → 각 언어 타임존으로 변환 + 라벨 (대시보드 blog 리스트와 통일)
    $__hasTime = (strpos((string)$M['date'], ':') !== false);
    $__srcTz = new DateTimeZone('Asia/Seoul');
    $__base = DateTime::createFromFormat('Y-m-d H:i:s', (string)$M['date'], $__srcTz);
    if(!$__base) $__base = DateTime::createFromFormat('Y-m-d H:i', (string)$M['date'], $__srcTz);
    if(!$__base) $__base = DateTime::createFromFormat('!Y-m-d', substr((string)$M['date'],0,10), $__srcTz);
    if(!$__base) $__base = new DateTime('now', $__srcTz);
    $__MON = [
      'en'=>['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      'es'=>['','ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'],
      'de'=>['','Jan.','Feb.','März','Apr.','Mai','Juni','Juli','Aug.','Sep.','Okt.','Nov.','Dez.'],
      'fr'=>['','janv.','févr.','mars','avr.','mai','juin','juil.','août','sept.','oct.','nov.','déc.'],
      'pt'=>['','jan','fev','mar','abr','mai','jun','jul','ago','set','out','nov','dez'],
      'tr'=>['','Oca','Şub','Mar','Nis','May','Haz','Tem','Ağu','Eyl','Eki','Kas','Ara'],
      'id'=>['','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
      'pl'=>['','sty','lut','mar','kwi','maj','cze','lip','sie','wrz','paź','lis','gru'],
      'it'=>['','gen','feb','mar','apr','mag','giu','lug','ago','set','ott','nov','dic'],
      'ru'=>['','янв','фев','мар','апр','мая','июн','июл','авг','сен','окт','ноя','дек'],
    ];
    $__TZ = [
      'ko'=>['Asia/Seoul','KST'], 'ja'=>['Asia/Tokyo','JST'], 'en'=>['UTC','UTC'],
      'es'=>['Europe/Madrid',null], 'de'=>['Europe/Berlin',null], 'fr'=>['Europe/Paris',null],
      'pt'=>['America/Sao_Paulo','BRT'], 'tr'=>['Europe/Istanbul','TRT'], 'vi'=>['Asia/Ho_Chi_Minh','ICT'],
      // ★ 2026-07-18: 새 5개 언어도 언어별 현지 타임존으로 (예전엔 맵에 없어 전부 UTC 폴백)
      'id'=>['Asia/Jakarta','WIB'], 'pl'=>['Europe/Warsaw',null], 'it'=>['Europe/Rome',null],
      'ru'=>['Europe/Moscow','MSK'], 'zh'=>['Asia/Taipei',null],
    ];
    foreach ($__langKeys as $__l):
      $__cfg = $__TZ[$__l] ?? $__TZ['en'];
      $__dt = clone $__base; $__dt->setTimezone(new DateTimeZone($__cfg[0]));
      $__Y=(int)$__dt->format('Y'); $__n=(int)$__dt->format('n'); $__j=(int)$__dt->format('j'); $__Hi=$__dt->format('H:i');
      if ($__l==='ko')      $__d = "{$__Y}년 {$__n}월 {$__j}일";
      elseif ($__l==='ja')  $__d = "{$__Y}年{$__n}月{$__j}日";
      elseif ($__l==='zh')  $__d = "{$__Y}年{$__n}月{$__j}日";
      elseif ($__l==='en')  $__d = $__MON['en'][$__n]." {$__j}, {$__Y}";
      elseif ($__l==='de')  $__d = "{$__j}. ".$__MON['de'][$__n]." {$__Y}";
      elseif ($__l==='vi')  $__d = "{$__j} thg {$__n} {$__Y}";
      else                  $__d = "{$__j} ".(($__MON[$__l] ?? $__MON['en'])[$__n])." {$__Y}";
      if ($__hasTime) $__d .= ' ' . $__Hi;
      if (!empty($__cfg[1])) $__d .= ' ' . $__cfg[1];
    ?>
    <span class="<?= $__l ?>">📅 <?= h($__d) ?></span>
    <?php endforeach; ?>
    <?php
    // 작성자 byline — 브랜드 리서치팀 명의. 언어별 "작성/By" 표기 + 브랜드명은 공통.
    $__byLabel = ['ko'=>'글','en'=>'By','ja'=>'文','es'=>'Por','de'=>'Von','fr'=>'Par','pt'=>'Por','tr'=>'Yazan','vi'=>'Bởi','id'=>'Oleh','pl'=>'Autor','it'=>'Di','ru'=>'Автор','zh'=>'作者'];
    foreach ($__langKeys as $__l):
      $__by = $__byLabel[$__l] ?? 'By';
    ?>
    <span class="<?= $__l ?>">✍ <?= h($__by) ?> BTCtiming Research</span>
    <?php endforeach; ?>
    <?php
    // 읽기 시간·태그: 언어별 단위 표기 + 영어 폴백
    $__readUnit = ['ko'=>['pre'=>'⏱ 약 ','mid'=>'분 · 🏷 '],'en'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'ja'=>['pre'=>'⏱ 約','mid'=>'分 · 🏷 '],'es'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'de'=>['pre'=>'⏱ ~','mid'=>' Min. · 🏷 '],'fr'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'pt'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'tr'=>['pre'=>'⏱ ~','mid'=>' dk · 🏷 '],'vi'=>['pre'=>'⏱ ~','mid'=>' phút · 🏷 '],'id'=>['pre'=>'⏱ ~','mid'=>' mnt · 🏷 '],'pl'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'it'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'ru'=>['pre'=>'⏱ ~','mid'=>' мин · 🏷 '],'zh'=>['pre'=>'⏱ 約','mid'=>' 分鐘 · 🏷 ']];
    foreach ($__langKeys as $__l):
      $__u = $__readUnit[$__l] ?? $__readUnit['en'];
      $__read = $M["read_{$__l}"] ?? $M['read_en'];
      $__tag = $M["tag_{$__l}"] ?? $M['tag_en'];
    ?>
    <span class="<?= $__l ?>"><?= $__u['pre'] . h($__read) . $__u['mid'] . h($__tag) ?></span>
    <?php endforeach; ?>
  </div>

  <?php renderShareBar('top'); ?>

