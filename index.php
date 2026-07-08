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
$__blLang = 'ko';
if (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) {
    $__blLang = $_GET['lang'];
}
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>블로그 — 비트코인 분석 인사이트 | BTCtiming.com</title>
<meta name="description" content="비트코인 온체인 지표 가이드, 시황분석, 칼럼을 한곳에서. MVRV Z-Score, Hash Ribbon, 반감기 타이밍 등 실전 투자에 바로 활용할 수 있는 분석 글을 제공합니다.">
<link rel="canonical" href="https://btctiming.com/blog/">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#0f0f0f;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px}.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f0f0f0}.logo span{color:#fbbf24}
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
.hero-inner{max-width:800px;margin:0 auto;padding:56px 24px 40px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;
  background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:5px 12px;margin-bottom:18px}
h1{font-size:2.1rem;font-weight:800;margin-bottom:10px;color:#fafafa;letter-spacing:-.5px}
.sub{font-size:15px;color:#8b8b93;max-width:520px}

/* ── 카테고리 필터 탭 ── */
.cat-tabs{display:flex;gap:8px;flex-wrap:wrap;max-width:800px;margin:0 auto;padding:0 24px;position:relative;top:18px}
.cat-tab{font-size:13px;font-weight:600;padding:7px 16px;border-radius:999px;border:1px solid rgba(255,255,255,.1);
  background:#111113;color:#a1a1aa;cursor:pointer;transition:all .15s;white-space:nowrap}
.cat-tab:hover{border-color:rgba(255,255,255,.25);color:#e4e4e7}
.cat-tab.active{background:var(--cat-color,#f7931a);border-color:var(--cat-color,#f7931a);color:#000}

.wrap{max-width:800px;margin:0 auto;padding:36px 24px 80px}
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
      <button type="button" class="lang-menu-item<?= $__lc===$__blLang ? ' active' : '' ?>" data-lang="<?= h($__lc) ?>" onclick="setLang('<?= h($__lc) ?>')"><?= $__meta['flag'] ?? '' ?> <?= h($__meta['name'] ?? strtoupper($__lc)) ?></button>
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
  try { localStorage.setItem('blogLang', lang); } catch(e){}
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
    const stored = localStorage.getItem('blogLang') || localStorage.getItem('lang');
    const urlLang = new URLSearchParams(location.search).get('lang');
    // 저장된 값(사용자의 마지막 명시적 선택)이 유효하면 ko 포함 무조건 우선.
    // 저장값이 없을 때만 URL을, 그것도 없으면 ko.
    const pick = VALID.includes(stored) ? stored
               : VALID.includes(urlLang) ? urlLang : 'ko';
    // 서버가 <html class="xx">로 이미 올바른 언어를 렌더했더라도, 카드 등의 요소에는
    // 인라인 style="display:none"이 남아 있어(초기 숨김) CSS만으로는 표시되지 않는다.
    // 따라서 pick과 현재 lang이 같아도 최초 1회는 setLang을 호출해 인라인 style을 정리한다.
    setLang(pick);
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
  .blog-tabbar .btab.active{color:#fb923c}
  .blog-tabbar .btab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:#fb923c}
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
.bcs-box{width:100%;max-width:460px;max-height:70vh;display:flex;flex-direction:column;background:#131316;border-radius:18px 18px 0 0;overflow:hidden;animation:bcsUp .22s ease-out}
@keyframes bcsUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
.bcs-grip{width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
.bcs-head{display:flex;align-items:center;justify-content:space-between;padding:8px 16px 10px}
.bcs-title{font-size:15px;font-weight:700;color:#f0f0f0}
.bcs-sub{font-size:11px;color:#888;margin-top:2px}
.bcs-close{background:none;border:none;color:#888;font-size:16px;cursor:pointer;padding:4px 8px}
.bcs-list{flex:1;overflow-y:auto;padding:4px 8px 16px}
.bcs-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer}
.bcs-item:active{background:#1f1f24}
.bcs-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.bcs-id{font-size:13px;font-weight:700;color:#f0f0f0}
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
    window.setLang=function(l){ _orig(l); applyTabbarLang(l); };
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
