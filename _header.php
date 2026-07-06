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
$requestedLang = (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) ? $_GET['lang'] : 'ko';
$hasJa = isset($M['title_ja']); // 이 글이 일본어로 번역됐는지 여부
$hasLangContent = $requestedLang === 'ko' || $requestedLang === 'en' || isset($M["title_{$requestedLang}"]);
$lang = $hasLangContent ? $requestedLang : 'en'; // 이 글에 해당 언어 콘텐츠가 없으면 영어로 폴백
$isEn = ($lang === 'en'); // 기존 코드 호환용 (블로그 링크 접미사 등에서 계속 사용)
$htmlLang = $lang;

$LANG_FIELD = ['ko' => '_ko', 'en' => '_en', 'ja' => '_ja', 'es' => '_es', 'de' => '_de'];
$suf = $LANG_FIELD[$lang] ?? '_en';
$pageTitle = ($M['title' . $suf] ?? $M['title_en']) . ' | BTCtiming.com';
$pageDesc  = $M['desc' . $suf] ?? $M['desc_en'];
$baseUrl   = "https://btctiming.com/blog/{$slug}.php";
$canonical = ($lang === 'ko') ? $baseUrl : "{$baseUrl}?lang={$lang}"; // 언어별로 각각 자기 자신을 정식 URL로 지정

// SNS 공유바 렌더 (상단·하단 공용). $variant = 'top' | 'bottom'
if (!function_exists('renderShareBar')) {
    function renderShareBar(string $variant = 'top'): void {
        $cls = $variant === 'bottom' ? 'share-bar share-bottom' : 'share-bar share-top';
        $label = $variant === 'bottom'
            ? '<span class="ko">이 글 공유하기</span><span class="en">Share this</span><span class="ja">この記事をシェア</span><span class="es">Compartir</span><span class="de">Teilen</span>'
            : '<span class="ko">공유</span><span class="en">Share</span><span class="ja">シェア</span><span class="es">Compartir</span><span class="de">Teilen</span>';
        $copied = '<span class="ko">복사됨</span><span class="en">Copied</span><span class="ja">コピー</span><span class="es">Copiado</span><span class="de">Kopiert</span>';
        echo '<div class="' . $cls . '" data-share>';
        echo '<span class="share-label">' . $label . '</span>';
        // 모바일 네이티브 공유(설치된 앱 목록) — JS가 지원 시에만 노출
        echo '<button type="button" class="share-btn sh-native" data-net="native" aria-label="Share" hidden>⤴</button>';
        // 데스크톱/폴백: 개별 SNS 버튼
        echo '<a class="share-btn sh-x" data-net="x" href="#" rel="nofollow noopener" target="_blank" aria-label="X (Twitter)">𝕏</a>';
        echo '<a class="share-btn sh-fb" data-net="fb" href="#" rel="nofollow noopener" target="_blank" aria-label="Facebook">f</a>';
        echo '<a class="share-btn sh-in" data-net="in" href="#" rel="nofollow noopener" target="_blank" aria-label="LinkedIn">in</a>';
        echo '<a class="share-btn sh-tg" data-net="tg" href="#" rel="nofollow noopener" target="_blank" aria-label="Telegram">✈</a>';
        echo '<a class="share-btn sh-ln" data-net="line" href="#" rel="nofollow noopener" target="_blank" aria-label="LINE">L</a>';
        echo '<a class="share-btn sh-wa" data-net="wa" href="#" rel="nofollow noopener" target="_blank" aria-label="WhatsApp">✆</a>';
        echo '<button type="button" class="share-btn sh-copy" data-net="copy" aria-label="Copy link">🔗<span class="copied-tip">' . $copied . '</span></button>';
        echo '</div>';
    }
}

// 카테고리 라벨 (없으면 기본 가이드로 취급)
$CATS = require __DIR__ . '/_category_meta.php';
$catKey = $M['category'] ?? 'guide';
$catLabel = $CATS[$catKey] ?? $CATS['guide'];
$LOCALE_MAP = ['ko' => 'ko_KR', 'en' => 'en_US', 'ja' => 'ja_JP', 'es' => 'es_ES', 'de' => 'de_DE'];
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
<?php if ($hasJa): ?>
<link rel="alternate" hreflang="ja" href="<?= h($baseUrl) ?>?lang=ja">
<?php endif; ?>
<?php foreach (['es', 'de'] as $extraLang): if (isset($M["title_{$extraLang}"])): ?>
<link rel="alternate" hreflang="<?= $extraLang ?>" href="<?= h($baseUrl) ?>?lang=<?= $extraLang ?>">
<?php endif; endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= h($baseUrl) ?>">
<meta property="og:title" content="<?= h($M['title' . $suf] ?? $M['title_en']) ?> | BTCtiming.com">
<meta property="og:description" content="<?= h($pageDesc) ?>">
<meta property="og:url" content="<?= h($canonical) ?>">
<meta property="og:type" content="article">
<meta property="og:image" content="https://btctiming.com/og-image.png">
<meta property="og:site_name" content="BTCtiming.com">
<meta property="og:locale" content="<?= $LOCALE_MAP[$lang] ?>">
<?php foreach (SUPPORTED_LANGS as $altLang => $altInfo): if ($altLang === $lang) continue; if ($altLang === 'ja' && !$hasJa) continue; if (($altLang === 'es' || $altLang === 'de') && !isset($M["title_{$altLang}"])) continue; ?>
<meta property="og:locale:alternate" content="<?= $LOCALE_MAP[$altLang] ?? '' ?>">
<?php endforeach; ?>
<!-- 트위터(X) 카드: og 태그와 별도로 트위터가 우선 참조하는 태그 -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($M['title' . $suf] ?? $M['title_en']) ?>">
<meta name="twitter:description" content="<?= h($pageDesc) ?>">
<meta name="twitter:image" content="https://btctiming.com/og-image.png">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": <?= json_encode($M['title' . $suf] ?? $M['title_en'], JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($pageDesc, JSON_UNESCAPED_UNICODE) ?>,
  "image": "https://btctiming.com/og-image.png",
  "datePublished": "<?= h($M['date']) ?>",
  "dateModified": "<?= h($M['date']) ?>",
  "inLanguage": "<?= $htmlLang ?>",
  "mainEntityOfPage": { "@type": "WebPage", "@id": "<?= h($canonical) ?>" },
  "author": { "@type": "Organization", "name": "BTCtiming.com" },
  "publisher": {
    "@type": "Organization",
    "name": "BTCtiming.com",
    "logo": { "@type": "ImageObject", "url": "https://btctiming.com/og-image.png" }
  }
}
</script>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#0f0f11;border-bottom:1px solid rgba(255,255,255,.08);position:sticky;top:0;z-index:100;height:52px;display:flex;align-items:center}.nav-w{max-width:1280px;margin:0 auto;width:100%;padding:0 16px;display:flex;align-items:center;gap:12px}
.logo{font-size:16px;font-weight:700;color:#f7931a}.logo span{color:#e4e4e7}
.back{font-size:13px;color:#71717a;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:32px;padding:0 10px;background:#151515;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;color:#e4e4e7;font-size:11px;font-weight:600;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#1f1f1f}
.lang-caret{font-size:9px;color:#71717a;transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#151515;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:#a1a1aa;font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#1f1f1f;color:#e4e4e7}
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
h1{font-size:2rem;font-weight:800;line-height:1.25;margin-bottom:12px;color:#fafafa}
.meta{font-size:13px;color:#71717a;margin-bottom:20px;display:flex;gap:16px;flex-wrap:wrap}
/* SNS 공유 버튼 */
.share-bar{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin:0 0 32px}
.share-bar.share-bottom{margin:40px 0 8px;padding-top:24px;border-top:1px solid rgba(255,255,255,.07)}
.share-label{font-size:12px;font-weight:600;color:#71717a;margin-right:2px}
.share-btn{display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:9px;
  font-size:15px;font-weight:700;text-decoration:none;cursor:pointer;border:1px solid rgba(255,255,255,.1);
  background:#17171b;color:#e4e4e7;transition:transform .12s,background .12s,border-color .12s;position:relative;line-height:1}
.share-btn:hover{transform:translateY(-2px);text-decoration:none}
.sh-x:hover{background:#000;border-color:#000;color:#fff}
.sh-fb:hover{background:#1877f2;border-color:#1877f2;color:#fff}
.sh-tg:hover{background:#229ed9;border-color:#229ed9;color:#fff}
.sh-ln:hover{background:#06c755;border-color:#06c755;color:#fff}
.sh-wa:hover{background:#25d366;border-color:#25d366;color:#fff}
.sh-in{font-size:12px}
.sh-in:hover{background:#0a66c2;border-color:#0a66c2;color:#fff}
.sh-native:hover{background:#f7931a;border-color:#f7931a;color:#fff}
/* 모바일: 네이티브 공유(설치된 앱 목록) 하나만 노출, 개별 SNS 버튼 숨김 */
@media(max-width:600px){
  .share-bar.native-on .sh-x,.share-bar.native-on .sh-fb,.share-bar.native-on .sh-in,
  .share-bar.native-on .sh-tg,.share-bar.native-on .sh-ln,.share-bar.native-on .sh-wa{display:none}
}
.sh-copy:hover{background:#f7931a;border-color:#f7931a;color:#fff}
.copied-tip{position:absolute;bottom:calc(100% + 6px);left:50%;transform:translateX(-50%);
  background:#f7931a;color:#0a0a0a;font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;
  white-space:nowrap;opacity:0;pointer-events:none;transition:opacity .15s}
.sh-copy.copied .copied-tip{opacity:1}
h2{font-size:1.35rem;font-weight:700;margin:40px 0 12px;color:#fafafa;padding-top:8px;border-top:1px solid rgba(255,255,255,.06)}
h3{font-size:1.05rem;font-weight:600;margin:24px 0 8px;color:#d4d4d8}
p{margin-bottom:14px;color:#a1a1aa}
ul,ol{margin:0 0 14px 22px;color:#a1a1aa}li{margin-bottom:6px}
.box{background:#1c1c1f;border-left:3px solid #f7931a;border-radius:6px;padding:14px 18px;margin:20px 0;color:#d4d4d8}
.zt{width:100%;border-collapse:collapse;margin:16px 0;font-size:14px}
.zt th{background:#1c1c1f;padding:9px 12px;text-align:left;font-weight:600;color:#fafafa;border:1px solid rgba(255,255,255,.08)}
.zt td{padding:9px 12px;border:1px solid rgba(255,255,255,.06);color:#a1a1aa}
.g{color:#4ade80;font-weight:600}.r{color:#f87171;font-weight:600}.y{color:#fbbf24;font-weight:600}
.pg{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:18px 0}
@media(max-width:500px){.pg{grid-template-columns:1fr}}
.pc{background:#111113;border-radius:10px;padding:16px;border:1px solid rgba(255,255,255,.07)}
.pc.r{border-top:3px solid #f87171}.pc.g{border-top:3px solid #4ade80}
.pt{font-size:13px;font-weight:700;margin-bottom:6px}
.pc.r .pt{color:#f87171}.pc.g .pt{color:#4ade80}
.pd{font-size:13px;color:#71717a;line-height:1.6}
.rc{background:#111113;border-left:3px solid #4ade80;border-radius:8px;padding:14px 18px;margin:12px 0}
.rd{font-size:12px;color:#4ade80;font-weight:600;margin-bottom:3px}
.rt{font-size:14px;color:#a1a1aa}
.rr{font-size:13px;color:#4ade80;margin-top:5px;font-weight:600}
.cc{background:#111113;border:1px solid rgba(255,255,255,.08);border-radius:10px;padding:18px 22px;margin:14px 0}
.cc h3{margin:0 0 10px;color:#f7931a;border:none;font-size:1rem}
.stats{display:flex;gap:20px;flex-wrap:wrap}
.si{flex:1;min-width:90px}
.sl{font-size:11px;color:#52525b;text-transform:uppercase;letter-spacing:.04em}
.sv{font-size:19px;font-weight:700;color:#fafafa}
.ss{font-size:12px;color:#71717a}
.tl{border-left:2px solid rgba(247,147,26,.3);margin:20px 0;padding-left:22px}
.tli{margin-bottom:20px;position:relative}
.tli::before{content:'';position:absolute;left:-27px;top:6px;width:9px;height:9px;border-radius:50%;background:#f7931a}
.tll{font-size:12px;color:#f7931a;font-weight:600;margin-bottom:3px}
.tlt{color:#a1a1aa;font-size:14px}
.other-articles{margin:44px 0 8px}
.other-articles h3{font-size:16px;font-weight:800;color:#fafafa;margin:0 0 14px}
.other-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:12px}
.other-card{display:flex;gap:10px;padding:14px;background:#131316;border:1px solid rgba(255,255,255,.07);
  border-radius:10px;text-decoration:none;transition:all .15s}
.other-card:hover{border-color:var(--oc-accent,#f7931a);background:#17171b;transform:translateY(-1px)}
.oc-icon{font-size:20px;flex-shrink:0;line-height:1}
.oc-body{min-width:0}
.oc-cat{font-size:10px;font-weight:700;color:var(--oc-accent,#f7931a);text-transform:uppercase;letter-spacing:.03em;margin-bottom:3px}
.oc-title{font-size:13px;font-weight:700;color:#e4e4e7;line-height:1.35;margin-bottom:4px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.oc-desc{font-size:11.5px;color:#71717a;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
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
.pn-link{display:flex;flex-direction:column;gap:5px;padding:14px 16px;background:#131316;border:1px solid rgba(255,255,255,.07);border-radius:12px;text-decoration:none;transition:border-color .15s,background .15s,transform .15s;min-width:0}
.pn-link:hover{border-color:rgba(247,147,26,.4);background:#17171b;transform:translateY(-1px)}
.pn-next{text-align:right;align-items:flex-end}
.pn-empty{background:transparent;border:none;pointer-events:none}
.pn-dir{font-size:11px;font-weight:700;color:#f7931a;letter-spacing:.03em}
.pn-title{font-size:13.5px;font-weight:600;color:#e4e4e7;line-height:1.4;overflow-wrap:break-word;word-break:break-word}
@media(max-width:480px){.prevnext{display:flex;flex-direction:column;grid-template-columns:none}.pn-next{text-align:left;align-items:flex-start}}
.cta{background:linear-gradient(135deg,#1a1008,#0f0f11);border:1px solid rgba(247,147,26,.3);border-radius:12px;padding:24px 28px;margin:40px 0;text-align:center}
.cta h3{border:none;margin:0 0 8px;font-size:1.15rem;color:#fafafa}
.cta p{margin-bottom:18px;color:#71717a}
.cta a{display:inline-block;background:#f7931a;color:#000;font-weight:700;padding:11px 26px;border-radius:8px;font-size:14px}
.bc{font-size:14px;color:#8b8b93;margin-bottom:22px;line-height:1.8;display:flex;flex-wrap:wrap;align-items:center;gap:2px}
.bc a{color:#a1a1aa;font-weight:500;transition:color .15s}
.bc a:hover{color:#f7931a;text-decoration:underline}
.bc-sep{color:#3f3f46;margin:0 8px;font-size:13px}
.bc-current{color:#e4e4e7;font-weight:600}
footer{border-top:1px solid rgba(255,255,255,.06);padding:22px;text-align:center;font-size:13px;color:#52525b}
/* 3개 언어 표시/숨김: 현재 lang이 아닌 클래스는 전부 숨김 */
[lang="en"] .ko,[lang="ja"] .ko,[lang="es"] .ko,[lang="de"] .ko,
[lang="ko"] .en,[lang="ja"] .en,[lang="es"] .en,[lang="de"] .en,
[lang="ko"] .ja,[lang="en"] .ja,[lang="es"] .ja,[lang="de"] .ja,
[lang="ko"] .es,[lang="en"] .es,[lang="ja"] .es,[lang="de"] .es,
[lang="ko"] .de,[lang="en"] .de,[lang="ja"] .de,[lang="es"] .de{display:none}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/<?= h(langSuffix($lang)) ?>" class="logo">BTC<span>timing</span>.com</a>
  <span class="back ko"><a href="/blog/" style="color:#71717a">← 블로그 목록</a></span>
  <span class="back en"><a href="/blog/?lang=en" style="color:#71717a">← All Posts</a></span>
  <span class="back ja"><a href="/blog/?lang=ja" style="color:#71717a">← 記事一覧</a></span>
  <?php if (isset($M['title_es'])): ?>
  <span class="back es"><a href="/blog/?lang=es" style="color:#71717a">← Todas las Publicaciones</a></span>
  <?php endif; ?>
  <?php if (isset($M['title_de'])): ?>
  <span class="back de"><a href="/blog/?lang=de" style="color:#71717a">← Alle Beiträge</a></span>
  <?php endif; ?>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel"><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <button type="button" class="lang-menu-item<?= $lang==='ko' ? ' active' : '' ?>" data-lang="ko" onclick="L('ko')">🇰🇷 한국어</button>
      <button type="button" class="lang-menu-item<?= $lang==='en' ? ' active' : '' ?>" data-lang="en" onclick="L('en')">🇺🇸 English</button>
      <?php if ($hasJa): ?>
      <button type="button" class="lang-menu-item<?= $lang==='ja' ? ' active' : '' ?>" data-lang="ja" onclick="L('ja')">🇯🇵 日本語</button>
      <?php endif; ?>
      <?php if (isset($M['title_es'])): ?>
      <button type="button" class="lang-menu-item<?= $lang==='es' ? ' active' : '' ?>" data-lang="es" onclick="L('es')">🇪🇸 Español</button>
      <?php endif; ?>
      <?php if (isset($M['title_de'])): ?>
      <button type="button" class="lang-menu-item<?= $lang==='de' ? ' active' : '' ?>" data-lang="de" onclick="L('de')">🇩🇪 Deutsch</button>
      <?php endif; ?>
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
    <a href="/<?= h($bcSuffix) ?>" id="bcHomeLink"><span class="ko">홈</span><span class="en">Home</span><span class="ja">ホーム</span><span class="es">Inicio</span><span class="de">Startseite</span></a><span class="bc-sep">›</span>
    <a href="/blog/<?= h($bcSuffix) ?>" id="bcBlogLink"><span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a><span class="bc-sep">›</span>
    <a href="<?= h($bcCatHref) ?>" id="bcCatLink" data-cat="<?= h($catKey) ?>"><span class="ko"><?= h($catLabel['ko']) ?></span><span class="en"><?= h($catLabel['en']) ?></span><span class="ja"><?= h($catLabel['ja']) ?></span><span class="es"><?= h($catLabel['es'] ?? $catLabel['en']) ?></span><span class="de"><?= h($catLabel['de'] ?? $catLabel['en']) ?></span></a><span class="bc-sep">›</span>
    <span class="bc-current"><span class="ko"><?= $M['bc_ko'] ?></span><span class="en"><?= $M['bc_en'] ?></span><span class="ja"><?= $M['bc_ja'] ?? $M['bc_en'] ?></span><span class="es"><?= $M['bc_es'] ?? $M['bc_en'] ?></span><span class="de"><?= $M['bc_de'] ?? $M['bc_en'] ?></span></span>
  </div>

  <h1 class="ko"><?= $M['h1_ko'] ?></h1>
  <h1 class="en"><?= $M['h1_en'] ?></h1>
  <h1 class="ja"><?= $M['h1_ja'] ?? $M['h1_en'] ?></h1>
  <h1 class="es"><?= $M['h1_es'] ?? $M['h1_en'] ?></h1>
  <h1 class="de"><?= $M['h1_de'] ?? $M['h1_en'] ?></h1>
  <div class="meta">
    <span>📅 <?= h(str_replace('-', '.', $M['date'])) ?></span>
    <span class="ko">⏱ 약 <?= h($M['read_ko']) ?>분 · 🏷 <?= h($M['tag_ko']) ?></span>
    <span class="en">⏱ ~<?= h($M['read_en']) ?> min · 🏷 <?= h($M['tag_en']) ?></span>
    <span class="ja">⏱ 約<?= h($M['read_ja'] ?? $M['read_en']) ?>分 · 🏷 <?= h($M['tag_ja'] ?? $M['tag_en']) ?></span>
    <span class="es">⏱ ~<?= h($M['read_es'] ?? $M['read_en']) ?> min · 🏷 <?= h($M['tag_es'] ?? $M['tag_en']) ?></span>
    <span class="de">⏱ ~<?= h($M['read_de'] ?? $M['read_en']) ?> Min. · 🏷 <?= h($M['tag_de'] ?? $M['tag_en']) ?></span>
  </div>

  <?php renderShareBar('top'); ?>

