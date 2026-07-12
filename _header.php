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
$htmlLang = $lang;

// LANG_FIELD: SUPPORTED_LANGS(config.php)를 유일 소스로 자동 생성 → 언어 추가 시 이 파일 불변
$LANG_FIELD = [];
foreach (array_keys(SUPPORTED_LANGS) as $__lc) { $LANG_FIELD[$__lc] = '_' . $__lc; }
$suf = $LANG_FIELD[$lang] ?? '_en';
$pageTitle = ($M['title' . $suf] ?? $M['title_en']) . ' | BTCtiming.com';
$pageDesc  = $M['desc' . $suf] ?? $M['desc_en'];
$baseUrl   = "https://btctiming.com/blog/{$slug}.php";
$canonical = ($lang === 'ko') ? $baseUrl : "{$baseUrl}?lang={$lang}"; // 언어별로 각각 자기 자신을 정식 URL로 지정

// SNS 공유바 렌더 (상단·하단 공용). $variant = 'top' | 'bottom'
if (!function_exists('renderShareBar')) {
    function renderShareBar(string $variant = 'top'): void {
        $cls = $variant === 'bottom' ? 'share-bar share-bottom' : 'share-bar share-top';
        $shareLabel = '<span class="ko">공유</span><span class="en">Share</span><span class="ja">シェア</span><span class="es">Compartir</span><span class="de">Teilen</span><span class="fr">Partager</span><span class="pt">Compartilhar</span><span class="tr">Paylaş</span><span class="vi">Chia sẻ</span>';
        $copyLabel  = '<span class="ko">링크 복사</span><span class="en">Copy link</span><span class="ja">リンクをコピー</span><span class="es">Copiar enlace</span><span class="de">Link kopieren</span><span class="fr">Copier le lien</span><span class="pt">Copiar link</span><span class="tr">Bağlantıyı kopyala</span><span class="vi">Sao chép liên kết</span>';
        $copied     = '<span class="ko">복사됨</span><span class="en">Copied</span><span class="ja">コピー</span><span class="es">Copiado</span><span class="de">Kopiert</span><span class="fr">Copié</span><span class="pt">Copiado</span><span class="tr">Kopyalandı</span><span class="vi">Đã sao chép</span>';
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
$LOCALE_MAP = ['ko' => 'ko_KR', 'en' => 'en_US', 'ja' => 'ja_JP', 'es' => 'es_ES', 'de' => 'de_DE', 'fr' => 'fr_FR', 'pt' => 'pt_BR', 'tr' => 'tr_TR', 'vi' => 'vi_VN'];
?>
<!DOCTYPE html>
<html lang="<?= $htmlLang ?>" id="hr">
<head>
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
<meta name="description" content="<?= h($pageDesc) ?>">
<link rel="canonical" href="<?= h($canonical) ?>">
<link rel="alternate" type="application/rss+xml" title="BTCtiming.com Blog RSS" href="https://btctiming.com/blog/rss.php<?= $lang === 'ko' ? '' : '?lang=' . h($lang) ?>">
<!-- hreflang: 실제로 번역이 존재하는 언어만 대응 URL로 알림 (미번역 언어는 넣지 않음 — 오도 방지) -->
<link rel="alternate" hreflang="ko" href="<?= h($baseUrl) ?>">
<link rel="alternate" hreflang="en" href="<?= h($baseUrl) ?>?lang=en">
<?php foreach (array_keys(SUPPORTED_LANGS) as $extraLang): if ($extraLang === 'ko' || $extraLang === 'en') continue; if (isset($M["title_{$extraLang}"])): ?>
<link rel="alternate" hreflang="<?= $extraLang ?>" href="<?= h($baseUrl) ?>?lang=<?= $extraLang ?>">
<?php endif; endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= h($baseUrl) ?>">
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
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "<?= $__schemaType ?>",
  "headline": <?= json_encode($M['title' . $suf] ?? $M['title_en'], JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($pageDesc, JSON_UNESCAPED_UNICODE) ?>,
  "image": [<?= json_encode($__ogImage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>],
  "datePublished": "<?= h($M['date']) ?>T09:00:00+09:00",
  "dateModified": "<?= h($__dateMod) ?>T09:00:00+09:00",
  "inLanguage": "<?= $htmlLang ?>",
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
<style>
:root{--bg:#0a0a0c;--bg2:#141418;--bg3:#1b1b21;--bg4:#24242b;--b1:rgba(255,255,255,.07);--b2:rgba(255,255,255,.12);--b3:rgba(255,255,255,.18);--t1:#f2f2f5;--t2:#9a9aa4;--t3:#63636d;--t4:#2a2a30;--green:#22c55e;--yellow:#f59e0b;--orange:#f7931a;--red:#ef4444;--blue:#60a5fa;--purple:#a78bfa;--pink:#f472b6;--rad:12px;--rad-sm:8px;--rad-lg:16px}

*{box-sizing:border-box;margin:0;padding:0}
body{background:#0a0a0c;color:#f2f2f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#141418;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px;display:flex;align-items:center}.nav-w{max-width:1280px;margin:0 auto;width:100%;padding:0 16px;display:flex;align-items:center;gap:12px}
.logo{display:inline-flex;align-items:center;gap:7px;font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f2f2f5}.logo span{color:#f59e0b}.logo-ic{flex-shrink:0}
.back{font-size:13px;color:var(--t3);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.back a{color:var(--t3)}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:#1b1b21;
  border:1px solid rgba(255,255,255,0.06);border-radius:8px;color:#f2f2f5;font-size:11px;font-weight:700;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#24242b}
.lang-caret{font-size:9px;color:var(--t3);transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#141418;
  border:1px solid rgba(255,255,255,0.06);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:#9a9aa4;font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#1b1b21;color:#f2f2f5}
.lang-menu-item.active{color:#f7931a;background:rgba(247,147,26,.08)}
.wrap{max-width:760px;margin:0 auto;padding:48px 24px 80px}
/* 본문 + 우측 광고 컬럼 레이아웃 (넓은 화면 + 광고가 실제 있을 때만 노출) */
@media(min-width:1100px){
  .wrap:has(.wrap-ad:not(:empty)){max-width:1020px;display:flex;gap:28px;align-items:flex-start;justify-content:center}
  .wrap:has(.wrap-ad:not(:empty)) .wrap-main{max-width:712px;flex:1 1 auto;min-width:0}
  .wrap-ad:not(:empty){flex:0 0 160px;position:sticky;top:72px;align-self:flex-start;min-height:600px}
}
.wrap-ad:empty{display:none}
@media(max-width:1099px){
  .wrap-ad{display:none}
}
/* 본문 이미지·SVG·표 반응형 (모바일에서 잘림/축소 방지) */
.wrap img,.wrap table,.wrap iframe{max-width:100%;height:auto}
.wrap img{border-radius:10px}
.wrap svg{max-width:100%;height:auto}
/* SVG 차트 가로 스크롤 래퍼 (JS가 각 svg를 이 div로 감쌈) */
.svg-scroll{margin:20px 0;overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:thin}
.svg-scroll svg{margin:0!important;display:block}
.wrap table{display:block;overflow-x:auto;-webkit-overflow-scrolling:touch}
@media(max-width:600px){
  .wrap{padding:32px 14px 64px}
  /* 모바일: SVG를 최소 520px로 유지(글씨 가독성 확보), 넘치면 래퍼가 가로 스크롤 */
  .svg-scroll svg{min-width:520px;width:520px}
  h1{font-size:1.6rem;line-height:1.3}
  h2{font-size:1.2rem;margin:32px 0 10px}
  h3{font-size:1rem}
  .box{padding:12px 14px}
  .zt{font-size:13px}
  .zt th,.zt td{padding:7px 9px}
}
@media(max-width:400px){
  .wrap{padding:28px 10px 56px}
  h1{font-size:1.45rem}
}
h1{font-size:2rem;font-weight:800;line-height:1.25;margin-bottom:12px;color:#f2f2f5}
.meta{font-size:13px;color:var(--t2);margin-bottom:20px;display:flex;gap:16px;flex-wrap:wrap}
/* SNS 공유 버튼 */
.share-bar{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin:0 0 32px}
.share-bar.share-bottom{margin:40px 0 8px;padding-top:24px;border-top:1px solid rgba(255,255,255,.07)}
.share-wrap{position:relative}
/* 공유 토글 버튼 + 복사 버튼 (공통 pill 스타일) */
.share-toggle,.share-copy-btn{display:inline-flex;align-items:center;gap:7px;height:36px;padding:0 15px;border-radius:10px;
  font-size:13px;font-weight:600;cursor:pointer;border:1px solid rgba(255,255,255,.12);
  background:#1b1b21;color:#f2f2f5;transition:background .12s,border-color .12s;position:relative;line-height:1}
.share-toggle:hover,.share-copy-btn:hover{background:#24242b;border-color:rgba(247,147,26,.4)}
.share-toggle[aria-expanded="true"]{background:#f7931a;border-color:#f7931a;color:#0a0a0a}
/* 펼쳐지는 SNS 팝오버 */
.share-pop{position:absolute;top:calc(100% + 8px);left:0;z-index:30;display:flex;gap:7px;padding:9px;
  background:#1b1b21;border:1px solid rgba(255,255,255,.12);border-radius:12px;box-shadow:0 8px 28px rgba(0,0,0,.5)}
.share-pop[hidden]{display:none}
.share-btn{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:9px;
  font-size:15px;font-weight:700;text-decoration:none;cursor:pointer;border:1px solid rgba(255,255,255,.1);
  background:#24242b;color:#f2f2f5;transition:transform .12s,background .12s,border-color .12s;line-height:1}
.share-btn:hover{transform:translateY(-2px);text-decoration:none}
.sh-x:hover{background:#000;border-color:#000;color:#fff}
.sh-fb:hover{background:#1877f2;border-color:#1877f2;color:#fff}
.sh-tg:hover{background:#229ed9;border-color:#229ed9;color:#fff}
.sh-ln:hover{background:#06c755;border-color:#06c755;color:#fff}
.sh-wa:hover{background:#25d366;border-color:#25d366;color:#fff}
.sh-in{font-size:12px}
.sh-in:hover{background:#0a66c2;border-color:#0a66c2;color:#fff}
.copied-tip{position:absolute;bottom:calc(100% + 6px);left:50%;transform:translateX(-50%);
  background:#f7931a;color:#0a0a0a;font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;
  white-space:nowrap;opacity:0;pointer-events:none;transition:opacity .15s}
.share-copy-btn.copied{background:#22c55e;border-color:#22c55e;color:#0a0a0a}
.share-copy-btn.copied .copied-tip{opacity:1}
h2{font-size:1.35rem;font-weight:700;margin:40px 0 12px;color:#f2f2f5;padding-top:8px;border-top:1px solid rgba(255,255,255,.06)}
h3{font-size:1.05rem;font-weight:600;margin:24px 0 8px;color:#d4d4d8}
p{margin-bottom:14px;color:#9a9aa4}
ul,ol{margin:0 0 14px 22px;color:#9a9aa4}li{margin-bottom:6px}
.box{background:#24242b;border-left:3px solid #f7931a;border-radius:6px;padding:14px 18px;margin:20px 0;color:#d4d4d8}
.zt{width:100%;border-collapse:collapse;margin:16px 0;font-size:14px}
.zt th{background:#24242b;padding:9px 12px;text-align:left;font-weight:600;color:#f2f2f5;border:1px solid rgba(255,255,255,.08)}
.zt td{padding:9px 12px;border:1px solid rgba(255,255,255,.06);color:#9a9aa4}
.g{color:#22c55e;font-weight:600}.r{color:#ef4444;font-weight:600}.y{color:#f59e0b;font-weight:600}
.pg{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:18px 0}
@media(max-width:500px){.pg{grid-template-columns:1fr}}
.pc{background:#141418;border-radius:10px;padding:16px;border:1px solid rgba(255,255,255,.07)}
.pc.r{border-top:3px solid #ef4444}.pc.g{border-top:3px solid #22c55e}
.pc .pt{font-size:13px;font-weight:700;margin-bottom:6px}
.pc.r .pt{color:#ef4444}.pc.g .pt{color:#22c55e}
.pd{font-size:13px;color:var(--t2);line-height:1.6}
.rc{background:#141418;border-left:3px solid #22c55e;border-radius:8px;padding:14px 18px;margin:12px 0}
.rd{font-size:12px;color:#22c55e;font-weight:600;margin-bottom:3px}
.rt{font-size:14px;color:#9a9aa4}
.rr{font-size:13px;color:#22c55e;margin-top:5px;font-weight:600}
.cc{background:#141418;border:1px solid rgba(255,255,255,.08);border-radius:10px;padding:18px 22px;margin:14px 0}
.cc h3{margin:0 0 10px;color:#f7931a;border:none;font-size:1rem}
.stats{display:flex;gap:20px;flex-wrap:wrap}
.si{flex:1;min-width:90px}
.sl{font-size:11px;color:var(--t3);text-transform:uppercase;letter-spacing:.04em}
.sv{font-size:19px;font-weight:700;color:#f2f2f5}
.ss{font-size:12px;color:var(--t2)}
.tl{border-left:2px solid rgba(247,147,26,.3);margin:20px 0;padding-left:22px}
.tli{margin-bottom:20px;position:relative}
.tli::before{content:'';position:absolute;left:-27px;top:6px;width:9px;height:9px;border-radius:50%;background:#f7931a}
.tll{font-size:12px;color:#f7931a;font-weight:600;margin-bottom:3px}
.tlt{color:#9a9aa4;font-size:14px}
.other-articles{margin:44px 0 8px}
.other-articles h3{font-size:16px;font-weight:800;color:#f2f2f5;margin:0 0 14px}
.other-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:12px}
.other-card{display:flex;gap:10px;padding:14px;background:#1b1b21;border:1px solid rgba(255,255,255,.07);
  border-radius:10px;text-decoration:none;transition:all .15s}
.other-card:hover{border-color:var(--oc-accent,#f7931a);background:#1b1b21;transform:translateY(-1px)}
.oc-icon{font-size:20px;flex-shrink:0;line-height:1}
.oc-body{min-width:0}
.oc-cat{font-size:10px;font-weight:700;color:var(--oc-accent,#f7931a);text-transform:uppercase;letter-spacing:.03em;margin-bottom:3px}
.oc-title{font-size:13px;font-weight:700;color:#f2f2f5;line-height:1.35;margin-bottom:4px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.oc-desc{font-size:11.5px;color:var(--t2);line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
@media(max-width:480px){.other-grid{grid-template-columns:1fr}}
/* 이전 글 / 다음 글 바로가기 */
.prevnext{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:48px 0 44px}
/* 블로그 본문 광고 배너 (거래소 비교로 연결) */
.blog-ad{display:flex;align-items:center;gap:13px;text-decoration:none;margin:44px 0 8px;padding:16px 18px;border-radius:14px;position:relative;overflow:hidden;background:linear-gradient(135deg,rgba(240,185,11,.14),rgba(251,146,60,.08));border:1px solid rgba(240,185,11,.4);transition:border-color .2s}
.blog-ad:hover{border-color:rgba(240,185,11,.65);text-decoration:none}
.blog-ad-ic{font-size:24px;flex-shrink:0}
.blog-ad-tx{display:flex;flex-direction:column;gap:3px;flex:1;min-width:0}
.blog-ad-tx b{font-size:15px;font-weight:800;color:#fff;line-height:1.3}
.blog-ad-tx span{font-size:12.5px;color:rgba(255,255,255,.72)}
.blog-ad-ar{color:#f0b90b;font-weight:700;font-size:22px;flex-shrink:0;line-height:1}
.pn-link{display:flex;flex-direction:column;gap:5px;padding:14px 16px;background:#1b1b21;border:1px solid rgba(255,255,255,.07);border-radius:12px;text-decoration:none;transition:border-color .15s,background .15s,transform .15s;min-width:0}
.pn-link:hover{border-color:rgba(247,147,26,.4);background:#1b1b21;transform:translateY(-1px)}
.pn-next{text-align:right;align-items:flex-end}
.pn-empty{background:transparent;border:none;pointer-events:none}
.pn-dir{font-size:11px;font-weight:700;color:#f7931a;letter-spacing:.03em}
.pn-title{font-size:13.5px;font-weight:600;color:#f2f2f5;line-height:1.4;overflow-wrap:break-word;word-break:break-word}
@media(max-width:480px){.prevnext{display:flex;flex-direction:column;grid-template-columns:none}.pn-next{text-align:left;align-items:flex-start}}
.cta{background:linear-gradient(135deg,#1a1008,#141418);border:1px solid rgba(247,147,26,.3);border-radius:12px;padding:24px 28px;margin:40px 0;text-align:center}
.cta h3{border:none;margin:0 0 8px;font-size:1.15rem;color:#f2f2f5}
.cta p{margin-bottom:18px;color:var(--t2)}
.cta a{display:inline-block;background:#f7931a;color:#000;font-weight:700;padding:11px 26px;border-radius:8px;font-size:14px}
.bc{font-size:14px;color:var(--t2);margin-bottom:22px;line-height:1.8;display:flex;flex-wrap:wrap;align-items:center;gap:2px}
.bc a{color:#9a9aa4;font-weight:500;transition:color .15s}
.bc a:hover{color:#f7931a;text-decoration:underline}
.bc-sep{color:#3f3f46;margin:0 8px;font-size:13px}
.bc-current{color:#f2f2f5;font-weight:600}
footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;text-align:center;font-size:11px;color:var(--t3)}
/* 언어 표시/숨김: 현재 lang이 아닌 클래스는 전부 숨김 (SUPPORTED_LANGS 기반 자동 생성) */
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
</head>
<body>
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
  <a href="/<?= h(langSuffix($lang)) ?>" class="logo"><svg class="logo-ic" width="19" height="19" viewBox="0 0 64 64" aria-hidden="true"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>BTC<span>timing</span></a>
  <?php
  // "블로그 목록으로" 링크: 언어별 라벨 + 영어 폴백. ko는 접미사 없음.
  $__backLabel = ['ko'=>'← 블로그 목록','en'=>'← All Posts','ja'=>'← 記事一覧','es'=>'← Todas las Publicaciones','de'=>'← Alle Beiträge','fr'=>'← Tous les articles','pt'=>'← Todos os posts','tr'=>'← Tüm Yazılar','vi'=>'← Tất cả bài viết'];
  foreach (array_keys(SUPPORTED_LANGS) as $__bl):
    // ko·en은 항상, 그 외는 이 글에 번역 있을 때만 (드롭다운 노출 언어와 일치)
    if ($__bl !== 'ko' && $__bl !== 'en' && !isset($M["title_{$__bl}"])) continue;
    $__blHref = ($__bl === 'ko') ? '/blog/' : ('/blog/?lang=' . $__bl);
  ?>
  <span class="back <?= $__bl ?>"><a href="<?= h($__blHref) ?>" style="color:var(--t2)"><?= h($__backLabel[$__bl] ?? $__backLabel['en']) ?></a></span>
  <?php endforeach; ?>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel"><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <?php foreach (SUPPORTED_LANGS as $__lc => $__meta):
        // ko·en은 항상 노출, 그 외 언어는 이 글에 번역(title_xx)이 있을 때만 노출
        if ($__lc !== 'ko' && $__lc !== 'en' && !isset($M["title_{$__lc}"])) continue; ?>
      <button type="button" class="lang-menu-item<?= $lang===$__lc ? ' active' : '' ?>" data-lang="<?= h($__lc) ?>" onclick="Lpick('<?= h($__lc) ?>')"><?= $__meta['flag'] ?> <?= h($__meta['name']) ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>
<div class="wrap">
<div class="wrap-main">
  <?php
    $bcSuffix = langSuffix($requestedLang); // 브레드크럼 링크도 현재 보고 있는 언어를 유지하도록
    $bcCatHref = '/blog/?cat=' . h($catKey) . ($requestedLang !== 'ko' ? '&lang=' . h($requestedLang) : '');
  ?>
  <div class="bc">
    <?php
    // breadcrumb 고정 라벨(홈/블로그)은 언어별 사전, 나머지는 meta 필드 + 영어 폴백
    $__bcHome = ['ko'=>'홈','en'=>'Home','ja'=>'ホーム','es'=>'Inicio','de'=>'Startseite','fr'=>'Accueil','pt'=>'Início','tr'=>'Ana Sayfa','vi'=>'Trang chủ'];
    $__bcBlog = ['ko'=>'블로그','en'=>'Blog','ja'=>'ブログ','es'=>'Blog','de'=>'Blog','fr'=>'Blog','pt'=>'Blog','tr'=>'Blog','vi'=>'Blog'];
    $__langKeys = array_keys(SUPPORTED_LANGS);
    // 홈
    echo '<a href="/' . h($bcSuffix) . '" id="bcHomeLink">';
    foreach ($__langKeys as $__l) echo '<span class="' . $__l . '">' . h($__bcHome[$__l] ?? $__bcHome['en']) . '</span>';
    echo '</a><span class="bc-sep">›</span>';
    // 블로그
    echo '<a href="/blog/' . h($bcSuffix) . '" id="bcBlogLink">';
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

  <?php foreach ($__langKeys as $__l): ?>
  <h1 class="<?= $__l ?>"><?= $M["h1_{$__l}"] ?? $M['h1_en'] ?></h1>
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
    ];
    $__TZ = [
      'ko'=>['Asia/Seoul','KST'], 'ja'=>['Asia/Tokyo','JST'], 'en'=>['UTC','UTC'],
      'es'=>['Europe/Madrid',null], 'de'=>['Europe/Berlin',null], 'fr'=>['Europe/Paris',null],
      'pt'=>['America/Sao_Paulo','BRT'], 'tr'=>['Europe/Istanbul','TRT'], 'vi'=>['Asia/Ho_Chi_Minh','ICT'],
    ];
    foreach ($__langKeys as $__l):
      $__cfg = $__TZ[$__l] ?? $__TZ['en'];
      $__dt = clone $__base; $__dt->setTimezone(new DateTimeZone($__cfg[0]));
      $__Y=(int)$__dt->format('Y'); $__n=(int)$__dt->format('n'); $__j=(int)$__dt->format('j'); $__Hi=$__dt->format('H:i');
      if ($__l==='ko')      $__d = "{$__Y}년 {$__n}월 {$__j}일";
      elseif ($__l==='ja')  $__d = "{$__Y}年{$__n}月{$__j}日";
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
    $__byLabel = ['ko'=>'글','en'=>'By','ja'=>'文','es'=>'Por','de'=>'Von','fr'=>'Par','pt'=>'Por','tr'=>'Yazan','vi'=>'Bởi'];
    foreach ($__langKeys as $__l):
      $__by = $__byLabel[$__l] ?? 'By';
    ?>
    <span class="<?= $__l ?>">✍ <?= h($__by) ?> BTCtiming Research</span>
    <?php endforeach; ?>
    <?php
    // 읽기 시간·태그: 언어별 단위 표기 + 영어 폴백
    $__readUnit = ['ko'=>['pre'=>'⏱ 약 ','mid'=>'분 · 🏷 '],'en'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'ja'=>['pre'=>'⏱ 約','mid'=>'分 · 🏷 '],'es'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'de'=>['pre'=>'⏱ ~','mid'=>' Min. · 🏷 '],'fr'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'pt'=>['pre'=>'⏱ ~','mid'=>' min · 🏷 '],'tr'=>['pre'=>'⏱ ~','mid'=>' dk · 🏷 '],'vi'=>['pre'=>'⏱ ~','mid'=>' phút · 🏷 ']];
    foreach ($__langKeys as $__l):
      $__u = $__readUnit[$__l] ?? $__readUnit['en'];
      $__read = $M["read_{$__l}"] ?? $M['read_en'];
      $__tag = $M["tag_{$__l}"] ?? $M['tag_en'];
    ?>
    <span class="<?= $__l ?>"><?= $__u['pre'] . h($__read) . $__u['mid'] . h($__tag) ?></span>
    <?php endforeach; ?>
  </div>

  <?php renderShareBar('top'); ?>

