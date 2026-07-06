<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 목록 페이지 (동적 생성 + 카테고리 필터)
//
// 용도: blog/_meta.php에 등록된 모든 아티클을 최신순으로 카드로 보여줍니다.
//       새 글을 추가해도 이 파일은 손댈 필요가 없습니다.
//
// 새 글 추가 방법:
//   1) _meta.php에 항목 하나 추가
//   2) blog/{slug}.php 생성 — 맨 위에 $slug 지정 + _header.php/_footer.php
//      include, 그 사이에 본문만 작성
//
// 정렬: date 필드 기준 최신순.
// 카테고리 탭: 실제 글이 1개라도 있는 카테고리만 자동으로 노출됩니다.
// ═══════════════════════════════════════════════════════

header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/_articles.php';

$articles = collectArticles(__DIR__);

// 실제 존재하는 카테고리만 탭으로 노출 (CATEGORY_META 순서를 따름)
$presentCats = array_unique(array_column($articles, 'category'));
$tabs = array_filter(array_keys(CATEGORY_META), fn($c) => in_array($c, $presentCats, true));
?>
<!DOCTYPE html>
<html lang="ko" id="html-root">
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
<title>블로그 — 비트코인 분석 인사이트 | BTCtiming.com</title>
<meta name="description" content="비트코인 온체인 지표 가이드, 시황분석, 칼럼을 한곳에서. MVRV Z-Score, Hash Ribbon, 반감기 타이밍 등 실전 투자에 바로 활용할 수 있는 분석 글을 제공합니다.">
<link rel="canonical" href="https://btctiming.com/blog/">
<link rel="alternate" type="application/rss+xml" title="BTCtiming.com Blog RSS" href="https://btctiming.com/blog/rss.php">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#0f0f11;border-bottom:1px solid rgba(255,255,255,.08);position:sticky;top:0;z-index:100;height:52px}.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
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

/* ── 히어로 영역 ── */
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);
  background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(247,147,26,.16),transparent 60%),
             radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),#09090b}
.hero-inner{max-width:800px;margin:0 auto;padding:28px 24px 22px}
.hero-row{display:flex;align-items:baseline;gap:12px;flex-wrap:wrap}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;
  background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:3px 11px}
h1{font-size:1.6rem;font-weight:800;color:#fafafa;letter-spacing:-.5px}
.sub{font-size:13.5px;color:#8b8b93;max-width:560px;margin-top:6px}

/* ── 카테고리 필터 탭 ── */
.cat-tabs{display:flex;gap:8px;flex-wrap:wrap;max-width:800px;margin:0 auto;padding:0 24px;position:relative;top:18px}
/* 블로그 검색창 */
.blog-search-wrap{max-width:800px;margin:0 auto;padding:20px 24px 0}
.blog-search{display:flex;align-items:center;gap:8px;background:#151515;border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:10px 14px;transition:border-color .15s}
.blog-search:focus-within{border-color:rgba(247,147,26,.5)}
.bs-icon{font-size:14px;opacity:.6;flex-shrink:0}
#blogSearch{flex:1;background:transparent;border:none;outline:none;color:#e4e4e7;font-size:14px;min-width:0}
#blogSearch::placeholder{color:#52525b}
.bs-clear{flex-shrink:0;background:transparent;border:none;color:#71717a;font-size:13px;cursor:pointer;padding:2px 4px;border-radius:4px}
.bs-clear:hover{color:#e4e4e7;background:rgba(255,255,255,.06)}
.search-count{flex-shrink:0;font-size:11px;font-weight:600;color:#f7931a;background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.22);border-radius:999px;padding:2px 9px;white-space:nowrap}
.no-results{text-align:center;color:#52525b;font-size:14px;padding:48px 20px;grid-column:1/-1}
.cat-tab{font-size:13px;font-weight:600;padding:7px 16px;border-radius:999px;border:1px solid rgba(255,255,255,.1);
  background:#111113;color:#a1a1aa;cursor:pointer;transition:all .15s;white-space:nowrap}
.cat-tab:hover{border-color:rgba(255,255,255,.25);color:#e4e4e7}
.cat-tab.active{background:var(--cat-color,#f7931a);border-color:var(--cat-color,#f7931a);color:#000}

.wrap{max-width:800px;margin:0 auto;padding:36px 24px 80px}
/* 목록 + 우측 광고 컬럼 (넓은 화면 + 광고 있을 때만) */
@media(min-width:1100px){
  .wrap:has(.wrap-ad:not(:empty)){max-width:1060px;display:flex;gap:28px;align-items:flex-start;justify-content:center}
  .wrap:has(.wrap-ad:not(:empty)) .wrap-main{max-width:800px;flex:1 1 auto;min-width:0}
  .wrap-ad:not(:empty){flex:0 0 160px;position:sticky;top:24px;align-self:flex-start;min-height:600px}
}
.wrap-ad:empty{display:none}
@media(max-width:1099px){.wrap-ad{display:none}}
.article-grid{display:grid;gap:14px}
.article-card{background:#111113;border:1px solid rgba(255,255,255,.07);border-radius:14px;
  padding:22px;transition:border-color .18s,transform .18s,background .18s;
  display:flex;gap:18px;align-items:flex-start;color:inherit}
.article-card:hover{border-color:var(--accent,rgba(247,147,26,.4));text-decoration:none;
  transform:translateY(-2px);background:#131316}
.card-icon{flex-shrink:0;width:52px;height:52px;border-radius:12px;display:flex;align-items:center;
  justify-content:center;font-size:24px;background:color-mix(in srgb, var(--accent,#f7931a) 16%, #111113);
  border:1px solid color-mix(in srgb, var(--accent,#f7931a) 30%, transparent)}
.card-body{flex:1;min-width:0}
.card-tagrow{display:flex;align-items:center;gap:8px;margin-bottom:7px;flex-wrap:wrap}
.card-cat{font-size:10px;font-weight:700;color:var(--cat-color,#f7931a);letter-spacing:.05em;text-transform:uppercase;
  background:color-mix(in srgb, var(--cat-color,#f7931a) 16%, transparent);border-radius:5px;padding:2px 7px}
.card-tag{font-size:11px;font-weight:700;color:var(--accent,#f7931a);letter-spacing:.06em;text-transform:uppercase}
.card-title{font-size:1.08rem;font-weight:700;color:#fafafa;margin-bottom:6px;line-height:1.4}
.card-desc{font-size:13.5px;color:#71717a;line-height:1.6;margin-bottom:12px}
.card-meta{font-size:12px;color:#52525b;display:flex;gap:12px;align-items:center}
.card-arrow{flex-shrink:0;color:#3f3f46;font-size:18px;align-self:center;transition:transform .18s,color .18s}
.article-card:hover .card-arrow{transform:translateX(3px);color:var(--accent,#f7931a)}
.article-card.hidden{display:none}

.load-more{display:block;width:100%;margin-top:16px;padding:13px;background:#111113;
  border:1px dashed rgba(255,255,255,.15);border-radius:12px;color:#a1a1aa;font-size:13px;
  font-weight:600;cursor:pointer;transition:all .15s}
.load-more:hover{border-color:rgba(247,147,26,.4);color:#f7931a;background:#131316}
#loadMoreCount{color:#52525b;font-weight:400;margin-left:4px}

.cta-main{background:linear-gradient(135deg,#1a1008,#111113);border:1px solid rgba(247,147,26,.25);border-radius:14px;padding:32px;margin-top:40px;text-align:center}
.cta-main h2{font-size:1.15rem;margin-bottom:8px;color:#fafafa}
.cta-main p{color:#71717a;font-size:14px;margin-bottom:20px}
.cta-main a{display:inline-block;background:#f7931a;color:#000;font-weight:700;padding:11px 26px;border-radius:8px;font-size:14px}
footer{border-top:1px solid rgba(255,255,255,.06);padding:24px;text-align:center;font-size:13px;color:#52525b}
/* 푸터 언어 전환 — 기존 en-show/ja-show + JS 토글 방식이 중복 style 속성 버그로 불안정했어서,
   이미 검증된 [lang] CSS 선택자 방식(개별 아티클 _header.php와 동일)으로 교체함 */
footer .ko,footer .en,footer .ja,footer .es,footer .de{display:none}
[lang="ko"] footer .ko,[lang="en"] footer .en,[lang="ja"] footer .ja,[lang="es"] footer .es,[lang="de"] footer .de{display:inline}
.en .ko{display:none}.ko-only,.en .en-hidden{display:none}.en .en-show{display:block}
.ja .ko{display:none}.ja .en-show{display:none!important}.ja .ja-show{display:block}
.empty{color:#52525b;font-size:14px;padding:24px 0}
@media(max-width:480px){
  .hero-inner{padding:22px 20px 18px}
  h1{font-size:1.6rem}
  .cat-tabs{top:14px}
  .article-card{padding:16px;gap:12px}
  .card-icon{width:42px;height:42px;font-size:19px;border-radius:10px}
  .card-arrow{display:none}
}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/" class="logo" id="logoLink">BTC<span>timing</span>.com</a>
  <span class="back ko">← <a href="/" style="color:#71717a">실시간 분석으로 돌아가기</a></span>
  <span class="back en-show" style="display:none">← <a href="/?lang=en" style="color:#71717a">Back to Live Analysis</a></span>
  <span class="back ja-show" style="display:none">← <a href="/?lang=ja" style="color:#71717a">リアルタイム分析に戻る</a></span>
  <span class="back es-show" style="display:none">← <a href="/?lang=es" style="color:#71717a">Volver al Análisis en Vivo</a></span>
  <span class="back de-show" style="display:none">← <a href="/?lang=de" style="color:#71717a">Zurück zur Live-Analyse</a></span>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel">KO</span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <button type="button" class="lang-menu-item active" data-lang="ko" onclick="setLang('ko')">🇰🇷 한국어</button>
      <button type="button" class="lang-menu-item" data-lang="en" onclick="setLang('en')">🇺🇸 English</button>
      <button type="button" class="lang-menu-item" data-lang="ja" onclick="setLang('ja')">🇯🇵 日本語</button>
      <button type="button" class="lang-menu-item" data-lang="es" onclick="setLang('es')">🇪🇸 Español</button>
      <button type="button" class="lang-menu-item" data-lang="de" onclick="setLang('de')">🇩🇪 Deutsch</button>
    </div>
  </div>
</div></nav>

<div class="hero">
  <div class="hero-inner">
    <div class="hero-row">
      <h1 class="ko">블로그</h1>
      <h1 class="en-show" style="display:none">Blog</h1>
      <h1 class="ja-show" style="display:none">ブログ</h1>
      <h1 class="es-show" style="display:none">Blog</h1>
      <h1 class="de-show" style="display:none">Blog</h1>
      <span class="hero-badge ko"><?= count($articles) ?>개의 글</span>
      <span class="hero-badge en-show" style="display:none"><?= count($articles) ?> articles</span>
      <span class="hero-badge ja-show" style="display:none"><?= count($articles) ?>件</span>
      <span class="hero-badge es-show" style="display:none"><?= count($articles) ?> art.</span>
      <span class="hero-badge de-show" style="display:none"><?= count($articles) ?> Art.</span>
    </div>
    <p class="sub ko">비트코인 타이밍에 필요한 지표 가이드·시황·칼럼.</p>
    <p class="sub en-show" style="display:none">Indicator guides, market watch and columns for Bitcoin timing.</p>
    <p class="sub ja-show" style="display:none">ビットコインタイミングのための指標ガイド・市況・コラム。</p>
    <p class="sub es-show" style="display:none">Guías de indicadores, análisis y columnas para el timing de Bitcoin.</p>
    <p class="sub de-show" style="display:none">Indikator-Guides, Marktanalysen und Kolumnen für Bitcoin-Timing.</p>
  </div>
</div>

<div class="blog-search-wrap">
  <div class="blog-search">
    <span class="bs-icon">🔍</span>
    <input type="text" id="blogSearch" oninput="onSearchInput()" autocomplete="off" placeholder="글 검색...">
    <span id="searchCount" class="search-count" style="display:none"></span>
    <button type="button" id="bsClear" class="bs-clear" onclick="clearSearch()" style="display:none">✕</button>
  </div>
</div>

<div class="cat-tabs" id="catTabs">
  <button class="cat-tab active" data-cat="all" onclick="filterCat('all')">
    <span class="ko">전체</span><span class="en-show" style="display:none">All</span><span class="ja-show" style="display:none">全て</span><span class="es-show" style="display:none">Todo</span><span class="de-show" style="display:none">Alle</span>
  </button>
<?php foreach ($tabs as $cat): $cm = CATEGORY_META[$cat]; ?>
  <button class="cat-tab" data-cat="<?= h($cat) ?>" style="--cat-color:<?= h($cm['color']) ?>" onclick="filterCat('<?= h($cat) ?>')">
    <span class="ko"><?= h($cm['ko']) ?></span><span class="en-show" style="display:none"><?= h($cm['en']) ?></span><span class="ja-show" style="display:none"><?= h($cm['ja'] ?? $cm['en']) ?></span><span class="es-show" style="display:none"><?= h($cm['es'] ?? $cm['en']) ?></span><span class="de-show" style="display:none"><?= h($cm['de'] ?? $cm['en']) ?></span>
  </button>
<?php endforeach; ?>
</div>

<div class="wrap">
<div class="wrap-main">
  <div class="article-grid" id="articleGrid">
<?php if (empty($articles)): ?>
    <div class="empty ko">아직 등록된 글이 없습니다.</div>
    <div class="empty en-show" style="display:none">No articles yet.</div>
    <div class="empty ja-show" style="display:none">まだ記事がありません。</div>
    <div class="empty es-show" style="display:none">Aún no hay artículos.</div>
    <div class="empty de-show" style="display:none">Noch keine Artikel vorhanden.</div>
<?php else: foreach ($articles as $i => $a):
    $icon = $a['icon'] ?? '📄';
    $color = $a['color'] ?? '#f7931a';
    $cat = $a['category'];
    $catColor = CATEGORY_META[$cat]['color'] ?? '#f7931a';
    // 번역 없는 글은 영어로 자연스럽게 폴백 (개별 페이지와 동일한 정책)
    $catJa = CATEGORY_META[$cat]['ja'] ?? (CATEGORY_META[$cat]['en'] ?? $cat);
    $catEs = CATEGORY_META[$cat]['es'] ?? (CATEGORY_META[$cat]['en'] ?? $cat);
    $catDe = CATEGORY_META[$cat]['de'] ?? (CATEGORY_META[$cat]['en'] ?? $cat);
    $tagJa = $a['tag_ja'] ?? ($a['tag_en'] ?? '');
    $tagEs = $a['tag_es'] ?? ($a['tag_en'] ?? '');
    $tagDe = $a['tag_de'] ?? ($a['tag_en'] ?? '');
    $titleJa = $a['title_ja'] ?? ($a['title_en'] ?? '');
    $titleEs = $a['title_es'] ?? ($a['title_en'] ?? '');
    $titleDe = $a['title_de'] ?? ($a['title_en'] ?? '');
    $descJa = $a['desc_ja'] ?? ($a['desc_en'] ?? '');
    $descEs = $a['desc_es'] ?? ($a['desc_en'] ?? '');
    $descDe = $a['desc_de'] ?? ($a['desc_en'] ?? '');
    $readJa = $a['read_ja'] ?? ($a['read_en'] ?? '');
    $readEs = $a['read_es'] ?? ($a['read_en'] ?? '');
    $readDe = $a['read_de'] ?? ($a['read_en'] ?? '');
?>
    <a href="/blog/<?= h($a['file']) ?>" class="article-card" data-cat="<?= h($cat) ?>" data-idx="<?= $i ?>" data-search="<?= h(strtolower(trim(($a['title_ko']??'').' '.($a['title_en']??'').' '.($a['title_ja']??'').' '.($a['title_es']??'').' '.($a['title_de']??'').' '.($a['desc_ko']??'').' '.($a['desc_en']??'').' '.($a['tag_ko']??'').' '.($a['tag_en']??'')))) ?>" style="--accent:<?= h($color) ?>;--cat-color:<?= h($catColor) ?>">
      <div class="card-icon"><?= $icon /* 이모지는 이스케이프하지 않음 */ ?></div>
      <div class="card-body">
        <div class="card-tagrow">
          <span class="card-cat"><span class="ko"><?= h(CATEGORY_META[$cat]['ko'] ?? $cat) ?></span><span class="en-show" style="display:none"><?= h(CATEGORY_META[$cat]['en'] ?? $cat) ?></span><span class="ja-show" style="display:none"><?= h($catJa) ?></span><span class="es-show" style="display:none"><?= h($catEs) ?></span><span class="de-show" style="display:none"><?= h($catDe) ?></span></span>
          <span class="card-tag ko"><?= h($a['tag_ko'] ?? '') ?></span>
          <span class="card-tag en-show" style="display:none"><?= h($a['tag_en'] ?? '') ?></span>
          <span class="card-tag ja-show" style="display:none"><?= h($tagJa) ?></span>
          <span class="card-tag es-show" style="display:none"><?= h($tagEs) ?></span>
          <span class="card-tag de-show" style="display:none"><?= h($tagDe) ?></span>
        </div>
        <div class="card-title ko"><?= h($a['title_ko'] ?? '') ?></div>
        <div class="card-title en-show" style="display:none"><?= h($a['title_en'] ?? '') ?></div>
        <div class="card-title ja-show" style="display:none"><?= h($titleJa) ?></div>
        <div class="card-title es-show" style="display:none"><?= h($titleEs) ?></div>
        <div class="card-title de-show" style="display:none"><?= h($titleDe) ?></div>
        <div class="card-desc ko"><?= h($a['desc_ko'] ?? '') ?></div>
        <div class="card-desc en-show" style="display:none"><?= h($a['desc_en'] ?? '') ?></div>
        <div class="card-desc ja-show" style="display:none"><?= h($descJa) ?></div>
        <div class="card-desc es-show" style="display:none"><?= h($descEs) ?></div>
        <div class="card-desc de-show" style="display:none"><?= h($descDe) ?></div>
        <div class="card-meta">
          <span>📅 <?= h(displayDate($a['date'] ?? '')) ?></span>
          <span class="ko"> · 약 <?= h($a['read_ko'] ?? '') ?>분</span>
          <span class="en-show" style="display:none"> · ~<?= h($a['read_en'] ?? '') ?> min read</span>
          <span class="ja-show" style="display:none"> · 約<?= h($readJa) ?>분</span>
          <span class="es-show" style="display:none"> · ~<?= h($readEs) ?> min</span>
          <span class="de-show" style="display:none"> · ~<?= h($readDe) ?> Min.</span>
        </div>
      </div>
      <div class="card-arrow">→</div>
    </a>
<?php endforeach; endif; ?>
    <div class="no-results" id="noResults" style="display:none"></div>
  </div>

  <button class="load-more" id="loadMoreBtn" onclick="loadMore()" style="display:none">
    <span class="ko">더 보기</span><span class="en-show" style="display:none">Load More</span><span class="ja-show" style="display:none">もっと見る</span><span class="es-show" style="display:none">Ver Más</span><span class="de-show" style="display:none">Mehr laden</span>
    <span id="loadMoreCount"></span>
  </button>

  <div class="cta-main">
    <h2 class="ko">지금 비트코인 타이밍 실시간 확인하기</h2>
    <h2 class="en-show" style="display:none">Check Bitcoin Timing Score Live</h2>
    <h2 class="ja-show" style="display:none">今すぐビットコインタイミングをリアルタイムで確認</h2>
    <h2 class="es-show" style="display:none">Consulta el Timing de Bitcoin en Vivo</h2>
    <h2 class="de-show" style="display:none">Bitcoin-Timing jetzt live prüfen</h2>
    <p class="ko">위 지표들을 종합한 0~10점 매수·매도 점수를 실시간으로 무료로 확인하세요.</p>
    <p class="en-show" style="display:none">Get a live 0–10 buy/sell score combining all the indicators above — free.</p>
    <p class="ja-show" style="display:none">上記の指標を統合した0〜10点の売買スコアをリアルタイムで無料確認できます。</p>
    <p class="es-show" style="display:none">Consulta en tiempo real la puntuación de compra/venta de 0-10 combinando todos los indicadores anteriores — gratis.</p>
    <p class="de-show" style="display:none">Erhalte in Echtzeit einen 0-10-Kauf-/Verkaufs-Score, der alle obigen Indikatoren kombiniert — kostenlos.</p>
    <a href="/" class="ko">실시간 분석 보러가기 →</a>
    <a href="/?lang=en" class="en-show" style="display:none">Go to Live Analysis →</a>
    <a href="/?lang=ja" class="ja-show" style="display:none">リアルタイム分析を見る →</a>
    <a href="/?lang=es" class="es-show" style="display:none">Ver Análisis en Vivo →</a>
    <a href="/?lang=de" class="de-show" style="display:none">Live-Analyse ansehen →</a>
  </div>
</div><?php // /.wrap-main ?>
  <aside class="wrap-ad" aria-hidden="true"><!-- ad slot: 승인 후 채움 --></aside>
</div>
<footer>
  © 2026 BTCtiming.com ·
  <a href="/rss-guide.php" style="color:#52525b">RSS</a>
  ·
  <a href="/sitemap-guide.php" style="color:#52525b" class="ko">사이트맵</a><a href="/sitemap-guide.php" style="color:#52525b" class="en">Sitemap</a><a href="/sitemap-guide.php" style="color:#52525b" class="ja">サイトマップ</a><a href="/sitemap-guide.php" style="color:#52525b" class="es">Mapa del sitio</a><a href="/sitemap-guide.php" style="color:#52525b" class="de">Sitemap</a>
  ·
  <a href="/privacy" style="color:#52525b" class="ko">개인정보처리방침</a><a href="/privacy" style="color:#52525b" class="en">Privacy Policy</a><a href="/privacy" style="color:#52525b" class="ja">プライバシーポリシー</a><a href="/privacy" style="color:#52525b" class="es">Política de Privacidad</a><a href="/privacy" style="color:#52525b" class="de">Datenschutzerklärung</a>
  ·
  <a href="/terms" style="color:#52525b" class="ko">이용약관</a><a href="/terms" style="color:#52525b" class="en">Terms of Service</a><a href="/terms" style="color:#52525b" class="ja">利用規約</a><a href="/terms" style="color:#52525b" class="es">Términos de Servicio</a><a href="/terms" style="color:#52525b" class="de">Nutzungsbedingungen</a>
  · <span class="ko">투자 조언이 아닙니다</span><span class="en">Not financial advice</span><span class="ja">投資助言ではありません</span><span class="es">No es asesoramiento financiero</span><span class="de">Keine Finanzberatung</span>.
</footer>
<script>
function setLang(lang) {
  const root = document.getElementById('html-root');
  root.className = lang;
  root.lang = lang;
  const trigLabel = document.getElementById('langTriggerLabel');
  if(trigLabel) trigLabel.textContent = lang.toUpperCase();
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });
  closeLangMenu();
  document.querySelectorAll('.en-show').forEach(el => el.style.display = lang==='en' ? '' : 'none');
  document.querySelectorAll('.ja-show').forEach(el => el.style.display = lang==='ja' ? '' : 'none');
  document.querySelectorAll('.es-show').forEach(el => el.style.display = lang==='es' ? '' : 'none');
  document.querySelectorAll('.de-show').forEach(el => el.style.display = lang==='de' ? '' : 'none');
  document.querySelectorAll('.ko').forEach(el => el.style.display = (lang!=='ko') ? 'none' : '');
  const logoLink = document.getElementById('logoLink');
  if(logoLink) logoLink.href = '/' + (lang==='ko' ? '' : '?lang=' + lang);
  // 카드 클릭 시 개별 글로 이동해도 같은 언어가 유지되도록 href에 lang 파라미터를 반영
  document.querySelectorAll('#articleGrid .article-card').forEach(a => {
    try {
      const u = new URL(a.getAttribute('href'), location.origin);
      if(lang === 'ko') u.searchParams.delete('lang'); else u.searchParams.set('lang', lang);
      a.setAttribute('href', u.pathname + (u.search ? u.search : ''));
    } catch(e){}
  });
  // 하단 정책(개인정보/약관) 링크도 현재 언어 유지 (예전엔 /privacy·/terms로 하드코딩돼 한국어로 셌음)
  const _suf = (lang === 'ko' ? '' : '?lang=' + lang);
  document.querySelectorAll('footer a[href^="/privacy"]').forEach(a => a.setAttribute('href', '/privacy' + _suf));
  document.querySelectorAll('footer a[href^="/terms"]').forEach(a => a.setAttribute('href', '/terms' + _suf));
  try { localStorage.setItem('blogLang', lang); } catch(e){}
  // 검색창 placeholder + 결과없음 문구 다국어
  const _ph = {ko:'글 검색...', en:'Search articles...', ja:'記事を検索...', es:'Buscar artículos...', de:'Artikel suchen...'};
  const _nr = {ko:'검색 결과가 없습니다.', en:'No results found.', ja:'検索結果がありません。', es:'No se encontraron resultados.', de:'Keine Ergebnisse gefunden.'};
  const _rc = {ko:'{n}개', en:'{n} results', ja:'{n}件', es:'{n} result.', de:'{n} Ergeb.'};
  const _si = document.getElementById('blogSearch');
  if(_si) _si.placeholder = _ph[lang] || _ph.en;
  window.BLOG_NO_RESULT = _nr[lang] || _nr.en;
  window.BLOG_RESULT_COUNT = _rc[lang] || _rc.en;
  if(typeof updateVisibility === 'function' && searchQuery) updateVisibility();
  try {
    const url = new URL(location.href);
    if(lang === 'ko') url.searchParams.delete('lang'); else url.searchParams.set('lang', lang);
    history.replaceState(null, '', url);
  } catch(e){}
}
function toggleLangMenu(e){
  if(e) e.stopPropagation();
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.toggle('open');
}
function closeLangMenu(){
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.remove('open');
}
document.addEventListener('click', (e) => {
  const dd = document.getElementById('langDropdown');
  if(dd && dd.classList.contains('open') && !dd.contains(e.target)) closeLangMenu();
});
// 언어 복원 우선순위: localStorage(사용자의 가장 최근 선택) > URL ?lang= > 기본 ko.
// (예전엔 URL을 우선해서, 목록에서 EN→글에서 JA→뒤로가기 시 목록 URL의 ?lang=en(옛값)이
//  localStorage의 ja를 덮어써 EN으로 되돌아가는 버그가 있었음)
function restoreBlogLang() {
  try {
    const VALID = ['ko','en','ja','es','de'];
    const stored = localStorage.getItem('blogLang') || localStorage.getItem('lang');
    const urlLang = new URLSearchParams(location.search).get('lang');
    // URL에 lang이 명시돼 있으면(사이트맵·hreflang·공유링크로 특정 언어를 콕 집어 진입) 그것을 우선.
    // 그 외에는 저장된 사용자 선택을 따르고, 둘 다 없으면 ko.
    // ※ URL lang은 없는데 저장값이 'ko'가 아닌 경우엔 저장값을 따르되, URL이 명시한 언어가
    //   있으면(=사용자가 이 URL로 그 언어를 원함) 저장값보다 URL을 존중한다.
    const pick = VALID.includes(urlLang) ? urlLang
               : VALID.includes(stored) ? stored
               : 'ko';
    if(pick !== document.getElementById('html-root').lang) setLang(pick);
  } catch(e){}
}
restoreBlogLang();
// 뒤로가기/앞으로가기(bfcache) 복원 시엔 <script>가 재실행되지 않으므로 pageshow에서 다시 적용.
// (bfcache가 아니어도, 표시될 때마다 저장 언어와 어긋나면 맞춰준다.)
window.addEventListener('pageshow', function(e){
  restoreBlogLang();
});

const PAGE_SIZE = 12;
let currentCat = 'all';
let visibleCount = PAGE_SIZE;
let searchQuery = '';
const allCards = Array.from(document.querySelectorAll('#articleGrid .article-card'));

function updateVisibility() {
  let shownInCat = 0;
  let anyVisible = 0;
  const searching = searchQuery.length > 0;
  const terms = searching ? searchQuery.split(/\s+/).filter(Boolean) : [];
  allCards.forEach(card => {
    const matchesCat = currentCat === 'all' || card.dataset.cat === currentCat;
    // 다중 단어는 모두 포함(AND). 예: "비트코인 ETF" → 둘 다 있는 글만
    const hay = card.dataset.search || '';
    const matchesSearch = !searching || terms.every(t => hay.indexOf(t) !== -1);
    let show = matchesCat && matchesSearch;
    if (show && !searching && currentCat === 'all') {
      show = shownInCat < visibleCount;
      shownInCat++;
    }
    card.classList.toggle('hidden', !show);
    if (show) anyVisible++;
  });
  // 검색 결과 개수 배지
  const cnt = document.getElementById('searchCount');
  if (cnt) {
    if (searching) {
      const tpl = window.BLOG_RESULT_COUNT || '{n} results';
      cnt.textContent = tpl.replace('{n}', anyVisible);
      cnt.style.display = 'inline-flex';
    } else {
      cnt.style.display = 'none';
    }
  }
  // 검색 결과 없음 메시지
  const nr = document.getElementById('noResults');
  if (nr) {
    if (searching && anyVisible === 0) {
      nr.textContent = window.BLOG_NO_RESULT || 'No results found.';
      nr.style.display = 'block';
    } else {
      nr.style.display = 'none';
    }
  }
  updateMoreButton();
}

// 검색 입력 처리
function onSearchInput() {
  const input = document.getElementById('blogSearch');
  searchQuery = (input.value || '').trim().toLowerCase();
  document.getElementById('bsClear').style.display = searchQuery ? 'block' : 'none';
  if (searchQuery) visibleCount = 1e9; // 검색 중엔 페이지네이션 무시(전부 노출)
  else visibleCount = PAGE_SIZE;
  updateVisibility();
}
function clearSearch() {
  const input = document.getElementById('blogSearch');
  input.value = '';
  searchQuery = '';
  document.getElementById('bsClear').style.display = 'none';
  visibleCount = PAGE_SIZE;
  updateVisibility();
  input.focus();
}

function updateMoreButton() {
  const btn = document.getElementById('loadMoreBtn');
  const countEl = document.getElementById('loadMoreCount');
  if (!btn) return;
  if (currentCat !== 'all') { btn.style.display = 'none'; return; }
  const total = allCards.length;
  const remaining = total - visibleCount;
  if (remaining <= 0) { btn.style.display = 'none'; return; }
  btn.style.display = '';
  if (countEl) countEl.textContent = `(${Math.min(remaining, PAGE_SIZE)})`;
}

function loadMore() {
  visibleCount += PAGE_SIZE;
  updateVisibility();
}

function filterCat(cat) {
  currentCat = cat;
  if (cat === 'all') visibleCount = PAGE_SIZE; // 전체로 돌아오면 페이지네이션 리셋
  document.querySelectorAll('.cat-tab').forEach(t => t.classList.toggle('active', t.dataset.cat === cat));
  updateVisibility();
  try {
    const url = new URL(location.href);
    if (cat === 'all') url.searchParams.delete('cat');
    else url.searchParams.set('cat', cat);
    history.replaceState(null, '', url);
  } catch(e){}
}
updateVisibility(); // 최초 로드 시 12개만 노출
try {
  const initCat = new URLSearchParams(location.search).get('cat');
  if (initCat) filterCat(initCat);
} catch(e){}
</script>
</body>
</html>
