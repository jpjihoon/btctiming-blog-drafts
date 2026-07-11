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
require_once __DIR__ . '/../config.php';
@include_once __DIR__ . '/../coin_meta.php';
// 코인 전환 시트용 데이터
$__blogCoins = [];
if (defined('COIN_SYMBOLS')) {
    foreach (COIN_SYMBOLS as $__id => $__sym) {
        if (function_exists('coinMeta')) { $__m = coinMeta($__id); }
        else { $__m = ['name' => $__id, 'color' => '#888888']; }
        $__blogCoins[] = ['id' => $__id, 'name' => $__m['name'], 'color' => $__m['color']];
    }
}
$__blogCoinsJson = json_encode($__blogCoins, JSON_UNESCAPED_UNICODE);

$articles = collectArticles(__DIR__);

// 실제 존재하는 카테고리만 탭으로 노출 (CATEGORY_META 순서를 따름)
$presentCats = array_unique(array_column($articles, 'category'));
$tabs = array_filter(array_keys(CATEGORY_META), fn($c) => in_array($c, $presentCats, true));

// 초기 언어 결정: URL ?lang= 를 서버에서 읽어 <html>에 처음부터 반영(깜빡임 방지).
// localStorage 기반 최종 복원은 아래 restoreBlogLang() JS가 담당한다.
// 언어 결정: URL ?lang 우선 → 없으면 쿠키(blogLang, 마지막 선택) → ko.
$__blLang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
?>
<!DOCTYPE html>
<html lang="<?= h($__blLang) ?>"<?= $__blLang !== 'ko' ? ' class="'.h($__blLang).'"' : '' ?> id="html-root">
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
<link rel="icon" type="image/png" sizes="any" href="data:image/png;base64,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">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>블로그 — 비트코인 분석 인사이트 | BTCtiming.com</title>
<meta name="description" content="비트코인 온체인 지표 가이드, 시황분석, 칼럼을 한곳에서. MVRV Z-Score, Hash Ribbon, 반감기 타이밍 등 실전 투자에 바로 활용할 수 있는 분석 글을 제공합니다.">
<link rel="canonical" href="https://btctiming.com/blog/">
<!-- Open Graph (언어별 OG 이미지) -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= h('블로그 — 비트코인 분석 인사이트 | BTCtiming.com') ?>">
<meta property="og:image" content="https://btctiming.com/og-image-<?= h($__blLang) ?>.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="https://btctiming.com/blog/">
<meta property="og:site_name" content="BTCtiming.com">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="https://btctiming.com/og-image-<?= h($__blLang) ?>.png">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#0a0a0c;color:#f2f2f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#141418;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px}.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f2f2f5}.logo span{color:#f59e0b}
.back{font-size:13px;color:#71717a;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:32px;padding:0 10px;background:#1b1b21;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;color:#f2f2f5;font-size:11px;font-weight:600;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#24242b}
.lang-caret{font-size:9px;color:#71717a;transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#1b1b21;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:#9a9aa4;font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#24242b;color:#f2f2f5}
.lang-menu-item.active{color:#f7931a;background:rgba(247,147,26,.08)}

/* ── 히어로 영역 ── */
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);
  background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(247,147,26,.16),transparent 60%),
             radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),#0a0a0c}
.hero-inner{max-width:800px;margin:0 auto;padding:56px 24px 40px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;
  background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:5px 12px;margin-bottom:18px}
h1{font-size:2.1rem;font-weight:800;margin-bottom:10px;color:#f2f2f5;letter-spacing:-.5px}
.sub{font-size:15px;color:#8b8b93;max-width:520px}

/* ── 카테고리 필터 탭 ── */
.cat-tabs{display:flex;gap:8px;flex-wrap:wrap;max-width:800px;margin:0 auto;padding:0 24px;position:relative;top:18px}
.cat-tab{font-size:13px;font-weight:600;padding:7px 16px;border-radius:999px;border:1px solid rgba(255,255,255,.1);
  background:#141418;color:#9a9aa4;cursor:pointer;transition:all .15s;white-space:nowrap}
.cat-tab:hover{border-color:rgba(255,255,255,.25);color:#f2f2f5}
.cat-tab.active{background:var(--cat-color,#f7931a);border-color:var(--cat-color,#f7931a);color:#000}

.wrap{max-width:800px;margin:0 auto;padding:36px 24px 80px}
.article-grid{display:grid;gap:14px}
.article-card{background:#141418;border:1px solid rgba(255,255,255,.07);border-radius:14px;
  padding:22px;transition:border-color .18s,transform .18s,background .18s;
  display:flex;gap:18px;align-items:flex-start;color:inherit}
.article-card:hover{border-color:var(--accent,rgba(247,147,26,.4));text-decoration:none;
  transform:translateY(-2px);background:#1b1b21}
.card-icon{flex-shrink:0;width:52px;height:52px;border-radius:12px;display:flex;align-items:center;
  justify-content:center;font-size:24px;background:color-mix(in srgb, var(--accent,#f7931a) 16%, #141418);
  border:1px solid color-mix(in srgb, var(--accent,#f7931a) 30%, transparent)}
.card-body{flex:1;min-width:0}
.card-tagrow{display:flex;align-items:center;gap:8px;margin-bottom:7px;flex-wrap:wrap}
.card-cat{font-size:10px;font-weight:700;color:var(--cat-color,#f7931a);letter-spacing:.05em;text-transform:uppercase;
  background:color-mix(in srgb, var(--cat-color,#f7931a) 16%, transparent);border-radius:5px;padding:2px 7px}
.card-tag{font-size:11px;font-weight:700;color:var(--accent,#f7931a);letter-spacing:.06em;text-transform:uppercase}
.card-title{font-size:1.08rem;font-weight:700;color:#f2f2f5;margin-bottom:6px;line-height:1.4}
.card-desc{font-size:13.5px;color:#71717a;line-height:1.6;margin-bottom:12px}
.card-meta{font-size:12px;color:#52525b;display:flex;gap:12px;align-items:center}
.card-arrow{flex-shrink:0;color:#3f3f46;font-size:18px;align-self:center;transition:transform .18s,color .18s}
.article-card:hover .card-arrow{transform:translateX(3px);color:var(--accent,#f7931a)}
.article-card.hidden{display:none}

.load-more{display:block;width:100%;margin-top:16px;padding:13px;background:#141418;
  border:1px dashed rgba(255,255,255,.15);border-radius:12px;color:#9a9aa4;font-size:13px;
  font-weight:600;cursor:pointer;transition:all .15s}
.load-more:hover{border-color:rgba(247,147,26,.4);color:#f7931a;background:#1b1b21}
#loadMoreCount{color:#52525b;font-weight:400;margin-left:4px}

.cta-main{background:linear-gradient(135deg,#1a1008,#141418);border:1px solid rgba(247,147,26,.25);border-radius:14px;padding:32px;margin-top:40px;text-align:center}
.cta-main h2{font-size:1.15rem;margin-bottom:8px;color:#f2f2f5}
.cta-main p{color:#71717a;font-size:14px;margin-bottom:20px}
.cta-main a{display:inline-block;background:#f7931a;color:#000;font-weight:700;padding:11px 26px;border-radius:8px;font-size:14px}
footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;text-align:center;font-size:11px;color:#666}
/* 언어 전환 — [lang] CSS 선택자 방식(개별 아티클 _header.php와 동일)으로 통일.
   푸터·본문 공통. SUPPORTED_LANGS 기반 자동 생성 → 언어 추가 시 이 파일 불변. */
<?php
$__langKeys = array_keys(SUPPORTED_LANGS);
// 푸터: 모든 언어 span 기본 숨김 → 현재 lang만 표시
echo 'footer ' . implode(',footer ', array_map(fn($l)=>'.'.$l, $__langKeys)) . "{display:none}\n";
$__footerShow = array_map(fn($l)=>'[lang="'.$l.'"] footer .'.$l, $__langKeys);
echo implode(',', $__footerShow) . "{display:inline}\n";
// 본문: body(html-root) className이 현재 언어. ko 외 언어일 때 .ko 숨김 + 해당 .{lang}-show 표시.
foreach ($__langKeys as $__l) {
    if ($__l === 'ko') continue;
    echo '.' . $__l . ' .ko{display:none}';
    echo '.' . $__l . ' .' . $__l . '-show{display:block}';
    // 다른 언어의 -show는 숨김
    foreach ($__langKeys as $__o) {
        if ($__o === 'ko' || $__o === $__l) continue;
        echo '.' . $__l . ' .' . $__o . '-show{display:none}';
    }
    echo "\n";
}
?>
.empty{color:#52525b;font-size:14px;padding:24px 0}
@media(max-width:480px){
  .hero-inner{padding:40px 20px 28px}
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
  <a href="/" class="logo" id="logoLink">BTC<span>timing</span></a>
  <span class="back ko">← <a href="/" style="color:#71717a">실시간 분석으로 돌아가기</a></span>
  <span class="back en-show" style="display:none">← <a href="/?lang=en" style="color:#71717a">Back to Live Analysis</a></span>
  <span class="back ja-show" style="display:none">← <a href="/?lang=ja" style="color:#71717a">リアルタイム分析に戻る</a></span>
  <span class="back es-show" style="display:none">← <a href="/?lang=es" style="color:#71717a">Volver al Análisis en Vivo</a></span>
  <span class="back de-show" style="display:none">← <a href="/?lang=de" style="color:#71717a">Zurück zur Live-Analyse</a></span>
  <span class="back fr-show" style="display:none">← <a href="/?lang=fr" style="color:#71717a">Retour à l'analyse en direct</a></span>
  <span class="back pt-show" style="display:none">← <a href="/?lang=pt" style="color:#71717a">Voltar à análise ao vivo</a></span>
  <span class="back tr-show" style="display:none">← <a href="/?lang=tr" style="color:#71717a">Canlı analize dön</a></span>
  <span class="back vi-show" style="display:none">← <a href="/?lang=vi" style="color:#71717a">Quay lại phân tích trực tiếp</a></span>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel"><?= h(strtoupper($__blLang)) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <?php foreach (SUPPORTED_LANGS as $__lc => $__meta): ?>
      <button type="button" class="lang-menu-item<?= $__lc===$__blLang ? ' active' : '' ?>" data-lang="<?= h($__lc) ?>" onclick="setLang('<?= h($__lc) ?>', true)"><?= $__meta['flag'] ?? '' ?> <?= h($__meta['name'] ?? strtoupper($__lc)) ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>

<div class="hero">
  <div class="hero-inner">
    <span class="hero-badge ko">📚 <?= count($articles) ?>개의 글</span>
    <span class="hero-badge en-show" style="display:none">📚 <?= count($articles) ?> articles</span>
    <span class="hero-badge ja-show" style="display:none">📚 <?= count($articles) ?>件の記事</span>
    <span class="hero-badge es-show" style="display:none">📚 <?= count($articles) ?> artículos</span>
    <span class="hero-badge de-show" style="display:none">📚 <?= count($articles) ?> Artikel</span>
    <span class="hero-badge fr-show" style="display:none">📚 <?= count($articles) ?> articles</span>
    <span class="hero-badge pt-show" style="display:none">📚 <?= count($articles) ?> artigos</span>
    <span class="hero-badge tr-show" style="display:none">📚 <?= count($articles) ?> yazı</span>
    <span class="hero-badge vi-show" style="display:none">📚 <?= count($articles) ?> bài viết</span>
    <h1 class="ko">블로그</h1>
    <h1 class="en-show" style="display:none">Blog</h1>
    <h1 class="ja-show" style="display:none">ブログ</h1>
    <h1 class="es-show" style="display:none">Blog</h1>
    <h1 class="de-show" style="display:none">Blog</h1>
    <h1 class="fr-show" style="display:none">Blog</h1>
    <h1 class="pt-show" style="display:none">Blog</h1>
    <h1 class="tr-show" style="display:none">Blog</h1>
    <h1 class="vi-show" style="display:none">Blog</h1>
    <p class="sub ko">온체인 지표 가이드부터 시황분석, 칼럼까지 — 비트코인 타이밍에 필요한 모든 글.</p>
    <p class="sub en-show" style="display:none">From on-chain indicator guides to market watch and columns — everything for Bitcoin timing.</p>
    <p class="sub ja-show" style="display:none">オンチェーン指標ガイドから市況分析、コラムまで — ビットコインタイミングに必要なすべての記事。</p>
    <p class="sub es-show" style="display:none">Desde guías de indicadores on-chain hasta análisis de mercado y columnas — todo para el timing de Bitcoin.</p>
    <p class="sub de-show" style="display:none">Von On-Chain-Indikator-Anleitungen bis zu Marktanalysen und Kolumnen — alles für Bitcoin-Timing.</p>
    <p class="sub fr-show" style="display:none">Des guides d'indicateurs on-chain aux analyses de marché et chroniques — tout pour le timing du Bitcoin.</p>
    <p class="sub pt-show" style="display:none">De guias de indicadores on-chain a análises de mercado e colunas — tudo para o timing do Bitcoin.</p>
    <p class="sub tr-show" style="display:none">Zincir üstü gösterge kılavuzlarından piyasa analizlerine ve köşe yazılarına — Bitcoin zamanlaması için her şey.</p>
    <p class="sub vi-show" style="display:none">Từ hướng dẫn chỉ báo on-chain đến phân tích thị trường và chuyên mục — mọi thứ cho thời điểm Bitcoin.</p>
  </div>
</div>

<div class="cat-tabs" id="catTabs">
  <button class="cat-tab active" data-cat="all" onclick="filterCat('all')">
    <span class="ko">전체</span><span class="en-show" style="display:none">All</span><span class="ja-show" style="display:none">全て</span><span class="es-show" style="display:none">Todo</span><span class="de-show" style="display:none">Alle</span><span class="fr-show" style="display:none">Tout</span><span class="pt-show" style="display:none">Todos</span><span class="tr-show" style="display:none">Tümü</span><span class="vi-show" style="display:none">Tất cả</span>
  </button>
<?php foreach ($tabs as $cat): $cm = CATEGORY_META[$cat]; ?>
  <button class="cat-tab" data-cat="<?= h($cat) ?>" style="--cat-color:<?= h($cm['color']) ?>" onclick="filterCat('<?= h($cat) ?>')">
    <span class="ko"><?= h($cm['ko']) ?></span><span class="en-show" style="display:none"><?= h($cm['en']) ?></span><span class="ja-show" style="display:none"><?= h($cm['ja'] ?? $cm['en']) ?></span><span class="es-show" style="display:none"><?= h($cm['es'] ?? $cm['en']) ?></span><span class="de-show" style="display:none"><?= h($cm['de'] ?? $cm['en']) ?></span><span class="fr-show" style="display:none"><?= h($cm['fr'] ?? $cm['en']) ?></span><span class="pt-show" style="display:none"><?= h($cm['pt'] ?? $cm['en']) ?></span><span class="tr-show" style="display:none"><?= h($cm['tr'] ?? $cm['en']) ?></span><span class="vi-show" style="display:none"><?= h($cm['vi'] ?? $cm['en']) ?></span>
  </button>
<?php endforeach; ?>
</div>

<div class="wrap">
  <div class="article-grid" id="articleGrid">
<?php if (empty($articles)): ?>
    <div class="empty ko">아직 등록된 글이 없습니다.</div>
    <div class="empty en-show" style="display:none">No articles yet.</div>
    <div class="empty ja-show" style="display:none">まだ記事がありません。</div>
    <div class="empty es-show" style="display:none">Aún no hay artículos.</div>
    <div class="empty de-show" style="display:none">Noch keine Artikel vorhanden.</div>
    <div class="empty fr-show" style="display:none">Aucun article pour le moment.</div>
    <div class="empty pt-show" style="display:none">Ainda não há artigos.</div>
    <div class="empty tr-show" style="display:none">Henüz yazı yok.</div>
    <div class="empty vi-show" style="display:none">Chưa có bài viết nào.</div>
<?php else: foreach ($articles as $i => $a):
    $icon = $a['icon'] ?? '📄';
    $color = $a['color'] ?? '#f7931a';
    $cat = $a['category'];
    $catColor = CATEGORY_META[$cat]['color'] ?? '#f7931a';
    $cardLangs = array_keys(SUPPORTED_LANGS);
    // 언어별 값 헬퍼: 번역 없으면 영어로 폴백 (개별 페이지와 동일 정책)
    $catVal   = fn($l) => CATEGORY_META[$cat][$l] ?? (CATEGORY_META[$cat]['en'] ?? $cat);
    $tagVal   = fn($l) => $a["tag_{$l}"]   ?? ($a['tag_en']   ?? '');
    $titleVal = fn($l) => $a["title_{$l}"] ?? ($a['title_en'] ?? '');
    $descVal  = fn($l) => $a["desc_{$l}"]  ?? ($a['desc_en']  ?? '');
    $readVal  = fn($l) => $a["read_{$l}"]  ?? ($a['read_en']  ?? '');
    // read 단위 표기 (언어별)
    $readFmt = ['ko'=>fn($r)=>" · 약 {$r}분",'en'=>fn($r)=>" · ~{$r} min read",'ja'=>fn($r)=>" · 約{$r}分",'es'=>fn($r)=>" · ~{$r} min",'de'=>fn($r)=>" · ~{$r} Min.",'fr'=>fn($r)=>" · ~{$r} min",'pt'=>fn($r)=>" · ~{$r} min",'tr'=>fn($r)=>" · ~{$r} dk",'vi'=>fn($r)=>" · ~{$r} phút"];
    // 각 언어의 표시 클래스: ko는 "ko", 나머지는 "{lang}-show"
    $clsOf = fn($l) => ($l === 'ko') ? 'ko' : ($l . '-show');
    // 인라인 숨김: 서버가 렌더한 현재 언어($__blLang)면 숨기지 않는다(첫 화면부터 보이도록, 깜빡임 방지).
    // 그 외 언어는 display:none으로 숨겨두고, 언어 전환 시 JS(setLang)가 인라인 style을 조정한다.
    $styOf = fn($l) => ($l === $__blLang) ? '' : ' style="display:none"';
?>
    <a href="/blog/<?= h($a['file']) ?>" class="article-card" data-cat="<?= h($cat) ?>" data-idx="<?= $i ?>" style="--accent:<?= h($color) ?>;--cat-color:<?= h($catColor) ?>">
      <div class="card-icon"><?= $icon /* 이모지는 이스케이프하지 않음 */ ?></div>
      <div class="card-body">
        <div class="card-tagrow">
          <span class="card-cat"><?php foreach ($cardLangs as $l) echo '<span class="'.$clsOf($l).'"'.$styOf($l).'>'.h($catVal($l)).'</span>'; ?></span>
          <?php foreach ($cardLangs as $l) echo '<span class="card-tag '.$clsOf($l).'"'.$styOf($l).'>'.h($tagVal($l)).'</span>'; ?>
        </div>
        <?php foreach ($cardLangs as $l) echo '<div class="card-title '.$clsOf($l).'"'.$styOf($l).'>'.h($titleVal($l)).'</div>'; ?>
        <?php foreach ($cardLangs as $l) echo '<div class="card-desc '.$clsOf($l).'"'.$styOf($l).'>'.h($descVal($l)).'</div>'; ?>
        <div class="card-meta">
          <span>📅 <?= h(displayDate($a['date'] ?? '')) ?></span>
          <?php foreach ($cardLangs as $l) { $fmt = $readFmt[$l] ?? $readFmt['en']; echo '<span class="'.$clsOf($l).'"'.$styOf($l).'>'.h($fmt($readVal($l))).'</span>'; } ?>
        </div>
      </div>
      <div class="card-arrow">→</div>
    </a>
<?php endforeach; endif; ?>
  </div>

  <button class="load-more" id="loadMoreBtn" onclick="loadMore()" style="display:none">
    <span class="ko">더 보기</span><span class="en-show" style="display:none">Load More</span><span class="ja-show" style="display:none">もっと見る</span><span class="es-show" style="display:none">Ver Más</span><span class="de-show" style="display:none">Mehr laden</span><span class="fr-show" style="display:none">Voir plus</span><span class="pt-show" style="display:none">Ver mais</span><span class="tr-show" style="display:none">Daha fazla</span><span class="vi-show" style="display:none">Xem thêm</span>
    <span id="loadMoreCount"></span>
  </button>

  <div class="cta-main">
    <h2 class="ko">지금 비트코인 타이밍 실시간 확인하기</h2>
    <h2 class="en-show" style="display:none">Check Bitcoin Timing Score Live</h2>
    <h2 class="ja-show" style="display:none">今すぐビットコインタイミングをリアルタイムで確認</h2>
    <h2 class="es-show" style="display:none">Consulta el Timing de Bitcoin en Vivo</h2>
    <h2 class="de-show" style="display:none">Bitcoin-Timing jetzt live prüfen</h2>
    <h2 class="fr-show" style="display:none">Vérifiez le timing Bitcoin en direct</h2>
    <h2 class="pt-show" style="display:none">Confira o timing do Bitcoin ao vivo</h2>
    <h2 class="tr-show" style="display:none">Bitcoin zamanlamasını şimdi canlı kontrol et</h2>
    <h2 class="vi-show" style="display:none">Kiểm tra thời điểm Bitcoin trực tiếp</h2>
    <p class="ko">위 지표들을 종합한 0~10점 매수·매도 점수를 실시간으로 무료로 확인하세요.</p>
    <p class="en-show" style="display:none">Get a live 0–10 buy/sell score combining all the indicators above — free.</p>
    <p class="ja-show" style="display:none">上記の指標を統合した0〜10点の売買スコアをリアルタイムで無料確認できます。</p>
    <p class="es-show" style="display:none">Consulta en tiempo real la puntuación de compra/venta de 0-10 combinando todos los indicadores anteriores — gratis.</p>
    <p class="de-show" style="display:none">Erhalte in Echtzeit einen 0-10-Kauf-/Verkaufs-Score, der alle obigen Indikatoren kombiniert — kostenlos.</p>
    <p class="fr-show" style="display:none">Obtenez en direct un score d'achat/vente de 0 à 10 combinant tous les indicateurs ci-dessus — gratuit.</p>
    <p class="pt-show" style="display:none">Obtenha ao vivo uma pontuação de compra/venda de 0-10 combinando todos os indicadores acima — grátis.</p>
    <p class="tr-show" style="display:none">Yukarıdaki tüm göstergeleri birleştiren 0-10 alım/satım puanını canlı ve ücretsiz alın.</p>
    <p class="vi-show" style="display:none">Nhận điểm mua/bán 0–10 trực tiếp kết hợp tất cả các chỉ báo trên — miễn phí.</p>
    <a href="/" class="ko">실시간 분석 보러가기 →</a>
    <a href="/?lang=en" class="en-show" style="display:none">Go to Live Analysis →</a>
    <a href="/?lang=ja" class="ja-show" style="display:none">リアルタイム分析を見る →</a>
    <a href="/?lang=es" class="es-show" style="display:none">Ver Análisis en Vivo →</a>
    <a href="/?lang=de" class="de-show" style="display:none">Live-Analyse ansehen →</a>
    <a href="/?lang=fr" class="fr-show" style="display:none">Voir l'analyse en direct →</a>
    <a href="/?lang=pt" class="pt-show" style="display:none">Ver análise ao vivo →</a>
    <a href="/?lang=tr" class="tr-show" style="display:none">Canlı analizi gör →</a>
    <a href="/?lang=vi" class="vi-show" style="display:none">Xem phân tích trực tiếp →</a>
  </div>
</div>
<?php require __DIR__ . '/../_shared_footer.php'; ?>
<script>window.BT_SUPPORTED_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;</script>
<script src="/lang-common.js"></script>
<script>
function setLang(lang, doSave) {
  const root = document.getElementById('html-root');
  root.className = lang;
  root.lang = lang;
  const trigLabel = document.getElementById('langTriggerLabel');
  if(trigLabel) trigLabel.textContent = lang.toUpperCase();
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });
  closeLangMenu();
  // 지원 언어 목록(config.php SUPPORTED_LANGS)을 PHP가 주입 → 언어 추가 시 이 JS 불변
  var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
  // ko 외 각 언어의 .{lang}-show 요소를 현재 언어일 때만 표시
  SUP.forEach(function(L){
    if(L==='ko') return;
    document.querySelectorAll('.'+L+'-show').forEach(el => el.style.display = (lang===L) ? '' : 'none');
  });
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
  // 저장은 사용자가 "직접 언어를 고를 때"(doSave=true)만 한다. 진입/뒤로가기 복원 시엔 저장 안 함.
  // (진입 시 저장하면 뒤로가기로 온 페이지가 최근 방문 언어로 오염됨.)
  if(doSave){
    if(window.BTLang){BTLang.save(lang);}
    else{try{localStorage.setItem('blogLang',lang);document.cookie='blogLang='+encodeURIComponent(lang)+'; path=/; max-age=31536000; SameSite=Lax';}catch(e){}}
  }
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
    const VALID = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
    // 언어는 URL ?lang= 기준으로만 정한다(서버가 렌더한 언어와 동일). 저장값은 보지 않는다.
    // (저장값을 보면 뒤로가기로 온 목록이 최근 방문 언어로 오염됨.)
    // 목록은 카드에 인라인 style이 남아 있어 CSS만으론 표시 안 되므로, setLang으로 화면을 정리한다.
    // 단 저장은 하지 않는다(두 번째 인자 생략 = doSave false).
    const urlLang = new URLSearchParams(location.search).get('lang');
    const pick = VALID.includes(urlLang) ? urlLang : 'ko';
    setLang(pick);
  } catch(e){}
}
restoreBlogLang(); // 진입: URL ?lang= 기준(사이트맵·공유링크·뒤로가기 모두 URL의 언어를 따름)
// 뒤로가기/앞으로가기(bfcache) 복원 시: 언어는 브라우저가 복원한 그대로 둔다.
// URL이 바뀌었을 수 있으니 화면만 URL 기준으로 재정리(저장은 안 함).
window.addEventListener('pageshow', function(e){
  restoreBlogLang();
});

const PAGE_SIZE = 12;
// URL ?cat= 을 읽어 초기 카테고리 결정(사이트맵·공유링크로 특정 카테고리 진입 존중).
// 유효한 카테고리 탭이 실제로 있을 때만 적용, 아니면 'all'.
let currentCat = (function(){
  try {
    const c = new URLSearchParams(location.search).get('cat');
    if (c && document.querySelector('.cat-tab[data-cat="' + c + '"]')) return c;
  } catch(e){}
  return 'all';
})();
let visibleCount = PAGE_SIZE;
const allCards = Array.from(document.querySelectorAll('#articleGrid .article-card'));

function updateVisibility() {
  let shownInCat = 0;
  allCards.forEach(card => {
    const matchesCat = currentCat === 'all' || card.dataset.cat === currentCat;
    let show = matchesCat;
    if (matchesCat && currentCat === 'all') {
      // 전체 탭에서만 페이지네이션 적용 — 특정 카테고리 필터 중엔 전부 노출
      show = shownInCat < visibleCount;
      shownInCat++;
    }
    card.classList.toggle('hidden', !show);
  });
  updateMoreButton();
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
<style>
.blog-tabbar{display:none}
@media(max-width:600px){
  .blog-tabbar{display:flex;position:fixed;left:0;right:0;top:auto;bottom:0;z-index:900;
    height:48px;background:rgba(15,15,17,.96);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);
    border-top:1px solid rgba(255,255,255,.07);padding-bottom:env(safe-area-inset-bottom);
    transition:transform .25s ease}
  .blog-tabbar.tabbar-hidden{transform:translateY(110%)}
  .blog-tabbar .btab{position:relative;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;
    background:transparent;border:none;color:#6b6b72;font-size:9.5px;font-weight:600;text-decoration:none;
    -webkit-tap-highlight-color:transparent}
  .blog-tabbar .btab.active{color:#f7931a}
  .blog-tabbar .btab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:#f7931a}
  .blog-tabbar .btab svg{width:20px;height:20px;display:block}
  body{padding-bottom:48px}
}
</style>
<nav class="blog-tabbar">
  <a class="btab" href="/" data-tb='{"ko":"실시간 지표","en":"Live","ja":"リアルタイム","es":"En vivo","de":"Live","fr":"En direct","pt":"Ao vivo","tr":"Canlı","vi":"Trực tiếp"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l3-4 3 2 4-6"/></svg>
    <span class="btab-tx">실시간 지표</span>
  </a>
  <button type="button" class="btab" onclick="openBlogCoinSwitcher()" data-tb='{"ko":"코인 검색","en":"Find Coins","ja":"コイン検索","es":"Buscar","de":"Coins","fr":"Cryptos","pt":"Buscar","tr":"Coin ara","vi":"Tìm coin"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9.5 10h4a1.5 1.5 0 0 1 0 3h-3.5a1.5 1.5 0 0 0 0 3h4"/></svg>
    <span class="btab-tx">코인 검색</span>
  </button>
  <a class="btab active" href="/blog/" data-tb='{"ko":"블로그","en":"Blog","ja":"ブログ","es":"Blog","de":"Blog","fr":"Blog","pt":"Blog","tr":"Blog","vi":"Blog"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3h10l4 4v14H5z"/><path d="M14 3v5h5M8 13h8M8 17h6"/></svg>
    <span class="btab-tx">블로그</span>
  </a>
</nav>
<!-- 블로그 코인 전환 시트 -->
<div id="blogCoinSheet" class="blog-coin-sheet" onclick="if(event.target===this)closeBlogCoinSwitcher()">
  <div class="bcs-box">
    <div class="bcs-grip"></div>
    <div class="bcs-head">
      <div><div class="bcs-title" id="bcsTitle">코인 전환</div><div class="bcs-sub" id="bcsSub">즐겨찾기한 코인</div></div>
      <button class="bcs-close" onclick="closeBlogCoinSwitcher()" aria-label="close">✕</button>
    </div>
    <div id="bcsList" class="bcs-list"></div>
  </div>
</div>
<style>
.blog-coin-sheet{display:none;position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,.66);align-items:flex-end;justify-content:center;padding-bottom:48px}
.blog-coin-sheet.open{display:flex}
.bcs-box{width:100%;max-width:460px;max-height:70vh;display:flex;flex-direction:column;background:#1b1b21;border-radius:18px 18px 0 0;overflow:hidden;animation:bcsUp .22s ease-out}
@keyframes bcsUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
.bcs-grip{width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
.bcs-head{display:flex;align-items:center;justify-content:space-between;padding:8px 16px 10px}
.bcs-title{font-size:15px;font-weight:700;color:#f2f2f5}
.bcs-sub{font-size:11px;color:#888;margin-top:2px}
.bcs-close{background:none;border:none;color:#888;font-size:16px;cursor:pointer;padding:4px 8px}
.bcs-list{flex:1;overflow-y:auto;padding:4px 8px 16px}
.bcs-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer}
.bcs-item:active{background:#24242b}
.bcs-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.bcs-id{font-size:13px;font-weight:700;color:#f2f2f5}
.bcs-name{font-size:12px;color:#888}
.bcs-empty{padding:30px;text-align:center;color:#666;font-size:13px}
</style>
<script>
window.__BLOG_COINS = <?= $__blogCoinsJson ?>;
window.__BLOG_DEFAULT_FAVS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX'];
var __BCS_I18N={
  ko:{title:'코인 전환',sub:'즐겨찾기한 코인',empty:'즐겨찾기한 코인이 없습니다.'},
  en:{title:'Switch coin',sub:'Your favorites',empty:'No favorite coins yet.'},
  ja:{title:'コイン切替',sub:'お気に入り',empty:'お気に入りがありません。'},
  es:{title:'Cambiar',sub:'Favoritos',empty:'Sin favoritos.'},
  de:{title:'Coin wechseln',sub:'Favoriten',empty:'Keine Favoriten.'},
  fr:{title:'Changer de crypto',sub:'Vos favoris',empty:'Aucune crypto favorite.'},
  pt:{title:'Trocar moeda',sub:'Seus favoritos',empty:'Nenhuma moeda favorita.'},
  tr:{title:'Coin değiştir',sub:'Favorileriniz',empty:'Henüz favori coin yok.'},
  vi:{title:'Đổi coin',sub:'Yêu thích',empty:'Chưa có coin yêu thích.'}
};
function bcsLang(){ try{ return document.getElementById('html-root').lang||'ko'; }catch(e){ return 'ko'; } }
function bcsGetFavs(){ try{ const r=localStorage.getItem('favoriteCoins'); if(r===null) return [...window.__BLOG_DEFAULT_FAVS]; const a=JSON.parse(r); return Array.isArray(a)&&a.length?a:[...window.__BLOG_DEFAULT_FAVS]; }catch(e){ return [...window.__BLOG_DEFAULT_FAVS]; } }
function bcsGetDelisted(){ try{ const r=localStorage.getItem('delistedCoins'); return r?(JSON.parse(r)||[]):[]; }catch(e){ return []; } }
function openBlogCoinSwitcher(){
  var t=__BCS_I18N[bcsLang()]||__BCS_I18N.en;
  document.getElementById('bcsTitle').textContent=t.title;
  document.getElementById('bcsSub').textContent=t.sub;
  var list=document.getElementById('bcsList');
  var favs=bcsGetFavs(), dead=bcsGetDelisted(), byId={};
  (window.__BLOG_COINS||[]).forEach(function(c){byId[c.id]=c;});
  var coins=favs.map(function(id){return byId[id];}).filter(function(c){return c&&dead.indexOf(c.id)<0;});
  if(!coins.length){ list.innerHTML='<div class="bcs-empty">'+t.empty+'</div>'; }
  else { list.innerHTML=coins.map(function(c){return '<div class="bcs-item" onclick="bcsPick(\''+c.id+'\')"><span class="bcs-dot" style="background:'+c.color+'"></span><span class="bcs-id">'+c.id+'</span><span class="bcs-name">'+c.name+'</span></div>';}).join(''); }
  document.getElementById('blogCoinSheet').classList.add('open');
}
function closeBlogCoinSwitcher(){ document.getElementById('blogCoinSheet').classList.remove('open'); }
function bcsPick(id){
  try{ localStorage.setItem('selectedCoin', id); }catch(e){}
  var lang=bcsLang();
  location.href='/'+(lang==='ko'?'':'?lang='+lang);
}
</script>
<script>
// 하단바 텍스트 언어 적용 (setLang 시 + 최초)
function applyTabbarLang(lang){
  document.querySelectorAll('.blog-tabbar .btab').forEach(a=>{
    try{ const m=JSON.parse(a.getAttribute('data-tb')); const tx=a.querySelector('.btab-tx'); if(tx&&m[lang]) tx.textContent=m[lang]; }catch(e){}
  });
  // 링크에도 언어 반영 (live만; coins는 버튼이라 제외)
  const suf = (lang==='ko'?'':'?lang='+lang);
  const live=document.querySelector('.blog-tabbar a.btab[href="/"], .blog-tabbar a.btab[href^="/?"]');
  if(live) live.setAttribute('href','/'+suf);
}
try{
  const _l = document.getElementById('html-root').lang || 'ko';
  applyTabbarLang(_l);
  // setLang이 있으면 래핑해서 하단바도 갱신
  if(typeof setLang==='function'){
    const _orig=setLang;
    window.setLang=function(){ _orig.apply(this, arguments); applyTabbarLang(arguments[0]); };
  }
}catch(e){}
// 하단바 스크롤 표시/숨김 (다운=숨김, 업/멈춤=표시)
(function(){
  const bar=document.querySelector('.blog-tabbar');
  if(!bar) return;
  let lastY=window.scrollY||0, idle=null;
  window.addEventListener('scroll',()=>{
    const y=window.scrollY||0, dy=y-lastY;
    if(y<60) bar.classList.remove('tabbar-hidden');
    else if(dy>6) bar.classList.add('tabbar-hidden');
    else if(dy<-6) bar.classList.remove('tabbar-hidden');
    lastY=y;
    clearTimeout(idle);
    idle=setTimeout(()=>bar.classList.remove('tabbar-hidden'),900);
  },{passive:true});
})();
</script>
</body>
</html>
