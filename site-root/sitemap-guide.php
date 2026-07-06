<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 사용자용 사이트맵 페이지 (다국어)
// 배포: /www/sitemap-guide.php → btctiming.com/sitemap-guide.php
// 검색엔진용 XML(/sitemap.php)과 별개. 사람이 사이트 구조를 보고 이동하는 페이지.
//
// ※ 안정성: collectArticles() 대신 _meta.php를 직접 읽어 카테고리별로 정리한다.
//   (함수 내부 require 재실행 등으로 인한 오류 가능성을 피함)
// ═══════════════════════════════════════════════════════
header('Content-Type: text/html; charset=utf-8');

$root = __DIR__;
$baseUrl = 'https://btctiming.com';

$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];

// 글 목록 직접 로드 ( _meta.php 는 [slug => meta] 반환 )
$metaFile = $root . '/blog/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];

// 카테고리별 그룹 + 날짜 내림차순 정렬
$byCat = [];
foreach ($articles as $slug => $a) {
    $c = $a['category'] ?? 'guide';
    $a['__slug'] = $slug;
    $byCat[$c][] = $a;
}
foreach ($byCat as $c => &$list) {
    usort($list, fn($x, $y) => strcmp((string)($y['date'] ?? ''), (string)($x['date'] ?? '')));
}
unset($list);

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
function catName($ci, $lc){ return $ci[$lc] ?? ($ci['ko'] ?? ($ci['en'] ?? '')); }
// 글 제목 다국어 (없으면 ko→en 폴백)
function artTitle($a, $lc){
    foreach ([$lc, 'ko', 'en'] as $c) { if (!empty($a["title_{$c}"])) return $a["title_{$c}"]; }
    return $a['__slug'] ?? '';
}
$hasArticles = !empty($articles);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sitemap · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 전체 페이지·카테고리·블로그 글 목록.">
<link rel="canonical" href="<?= h($baseUrl) ?>/sitemap-guide.php">
<style>
:root{--bg:#09090b;--bg2:#0f0f11;--bg3:#131316;--bg4:#1a1a1e;--b1:rgba(255,255,255,.08);--orange:#f7931a;--t1:#e4e4e7;--t2:#a1a1aa;--t3:#71717a;color-scheme:dark}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;line-height:1.7}
a{color:var(--orange);text-decoration:none}a:hover{text-decoration:underline}
[lang="ko"] .en,[lang="ko"] .ja,[lang="ko"] .es,[lang="ko"] .de{display:none}
[lang="en"] .ko,[lang="en"] .ja,[lang="en"] .es,[lang="en"] .de{display:none}
[lang="ja"] .ko,[lang="ja"] .en,[lang="ja"] .es,[lang="ja"] .de{display:none}
[lang="es"] .ko,[lang="es"] .en,[lang="es"] .ja,[lang="es"] .de{display:none}
[lang="de"] .ko,[lang="de"] .en,[lang="de"] .ja,[lang="de"] .es{display:none}
.topbar{border-bottom:1px solid var(--b1);background:var(--bg2);position:sticky;top:0;z-index:10}
.topbar-inner{max-width:920px;margin:0 auto;padding:13px 20px;display:flex;align-items:center;justify-content:space-between;gap:14px}
.brand{font-size:16px;font-weight:700;color:var(--orange)}.brand span{color:var(--t1)}
.lang-dropdown{position:relative}
.lang-trigger{display:flex;align-items:center;gap:5px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2);font-size:12px;font-weight:600;padding:6px 11px;border-radius:8px;cursor:pointer}
.lang-caret{font-size:9px}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:140px;background:var(--bg3);border:1px solid var(--b1);border-radius:10px;padding:5px;opacity:0;pointer-events:none;transform:translateY(-6px);transition:.15s;z-index:20}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:0;color:var(--t2);font-size:13px;cursor:pointer;border-radius:7px;text-align:left}
.lang-menu-item:hover{background:var(--bg4);color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
.wrap{max-width:920px;margin:0 auto;padding:44px 20px 60px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--orange);background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
h1{font-size:1.9rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.lead{font-size:15px;color:var(--t2);max-width:640px;margin:0 0 8px}
h2{font-size:1.15rem;font-weight:700;margin:38px 0 6px;display:flex;align-items:center;gap:9px}
h2 .count{font-size:12px;font-weight:600;color:var(--t3);background:var(--bg4);border:1px solid var(--b1);border-radius:999px;padding:2px 9px}
.main-links{display:flex;flex-wrap:wrap;gap:10px;margin:8px 0}
.main-links a{font-size:14px;font-weight:600;padding:9px 15px;border-radius:10px;background:var(--bg3);border:1px solid var(--b1);color:var(--t1)}
.main-links a:hover{border-color:rgba(247,147,26,.4);text-decoration:none}
ul.arts{list-style:none;padding:0;margin:6px 0 0;display:grid;grid-template-columns:1fr 1fr;gap:2px 24px}
ul.arts li{padding:7px 0;border-bottom:1px solid rgba(255,255,255,.05);display:flex;align-items:baseline;justify-content:space-between;gap:10px}
ul.arts li a{color:#d4d4d8;font-size:14px;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
ul.arts li a:hover{color:var(--orange)}
.date{font-size:11px;color:#52525b;flex-shrink:0;font-variant-numeric:tabular-nums}
@media(max-width:600px){ul.arts{grid-template-columns:1fr}}
.foot-links{max-width:920px;margin:0 auto;padding:22px 20px 40px;border-top:1px solid var(--b1);display:flex;flex-wrap:wrap;gap:10px}
.foot-links a{font-size:13.5px;font-weight:600;padding:9px 15px;border-radius:10px;background:var(--bg3);border:1px solid var(--b1);color:var(--t1)}
.foot-links a:hover{border-color:rgba(247,147,26,.4);text-decoration:none}
footer{max-width:920px;margin:0 auto;padding:0 20px 30px;font-size:12px;color:#52525b}
</style>
</head>
<body>
<div class="topbar"><div class="topbar-inner">
  <a href="/" class="brand">BTC<span>timing</span></a>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" onclick="toggleLangMenu(event)"><span id="langTriggerLabel">KR</span><span class="lang-caret">▾</span></button>
    <div class="lang-menu">
      <button type="button" class="lang-menu-item" data-lang="ko" onclick="L('ko')">🇰🇷 한국어</button>
      <button type="button" class="lang-menu-item" data-lang="en" onclick="L('en')">🇺🇸 English</button>
      <button type="button" class="lang-menu-item" data-lang="ja" onclick="L('ja')">🇯🇵 日本語</button>
      <button type="button" class="lang-menu-item" data-lang="es" onclick="L('es')">🇪🇸 Español</button>
      <button type="button" class="lang-menu-item" data-lang="de" onclick="L('de')">🇩🇪 Deutsch</button>
    </div>
  </div>
</div></div>

<div class="wrap">
  <span class="hero-badge">🗺 <span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa</span><span class="de">Sitemap</span></span>
  <h1><span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span></h1>
  <p class="lead">
    <span class="ko">BTCtiming의 모든 페이지와 블로그 글을 한눈에 볼 수 있습니다.</span>
    <span class="en">See all of BTCtiming's pages and blog posts at a glance.</span>
    <span class="ja">BTCtimingのすべてのページとブログ記事を一覧できます。</span>
    <span class="es">Vea todas las páginas y publicaciones de BTCtiming de un vistazo.</span>
    <span class="de">Alle Seiten und Blogbeiträge von BTCtiming auf einen Blick.</span>
  </p>

  <h2><span class="ko">주요 페이지</span><span class="en">Main Pages</span><span class="ja">主要ページ</span><span class="es">Páginas Principales</span><span class="de">Hauptseiten</span></h2>
  <div class="main-links">
    <a href="/">📊 <span class="ko">실시간 지표 대시보드</span><span class="en">Live Dashboard</span><span class="ja">リアルタイム指標</span><span class="es">Panel en Vivo</span><span class="de">Live-Dashboard</span></a>
    <a href="/blog/">📰 <span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
    <a href="/exchanges.php">🎁 <span class="ko">거래소 비교</span><span class="en">Exchanges</span><span class="ja">取引所比較</span><span class="es">Exchanges</span><span class="de">Börsen</span></a>
    <a href="/rss-guide.php">📡 <span class="ko">RSS 피드</span><span class="en">RSS Feeds</span><span class="ja">RSSフィード</span><span class="es">Feeds RSS</span><span class="de">RSS-Feeds</span></a>
  </div>

  <?php foreach ($cats as $key => $ci):
      $list = $byCat[$key] ?? [];
      if (empty($list)) continue;
      $icon = $catIcon[$key] ?? '📄';
      $catUrl = '/blog/?cat=' . $key;
  ?>
  <h2><?= $icon ?> <a href="<?= h($catUrl) ?>" style="color:inherit"><span class="ko"><?= h(catName($ci,'ko')) ?></span><span class="en"><?= h(catName($ci,'en')) ?></span><span class="ja"><?= h(catName($ci,'ja')) ?></span><span class="es"><?= h(catName($ci,'es')) ?></span><span class="de"><?= h(catName($ci,'de')) ?></span></a> <span class="count"><?= count($list) ?></span></h2>
  <ul class="arts">
    <?php foreach ($list as $a):
        $slug = $a['__slug'] ?? '';
        if ($slug === '') continue;
        $date = '';
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', (string)($a['date'] ?? ''), $m)) $date = str_replace('-', '.', $m[1]);
    ?>
    <li>
      <a href="/blog/<?= h($slug) ?>.php"><span class="ko"><?= h(artTitle($a,'ko')) ?></span><span class="en"><?= h(artTitle($a,'en')) ?></span><span class="ja"><?= h(artTitle($a,'ja')) ?></span><span class="es"><?= h(artTitle($a,'es')) ?></span><span class="de"><?= h(artTitle($a,'de')) ?></span></a><?php if($date): ?><span class="date"><?= h($date) ?></span><?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endforeach; ?>

  <?php if (!$hasArticles): ?>
  <p class="lead" style="margin-top:30px"><span class="ko">아직 등록된 글이 없습니다.</span><span class="en">No posts yet.</span><span class="ja">記事はまだありません。</span><span class="es">Aún no hay publicaciones.</span><span class="de">Noch keine Beiträge.</span></p>
  <?php endif; ?>
</div>

<div class="foot-links">
  <a href="/">📊 <span class="ko">대시보드</span><span class="en">Dashboard</span><span class="ja">ダッシュボード</span><span class="es">Panel</span><span class="de">Dashboard</span></a>
  <a href="/blog/">📰 <span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
  <a href="/rss-guide.php">📡 <span class="ko">RSS</span><span class="en">RSS</span><span class="ja">RSS</span><span class="es">RSS</span><span class="de">RSS</span></a>
  <a href="/exchanges.php">🎁 <span class="ko">거래소 비교</span><span class="en">Exchanges</span><span class="ja">取引所比較</span><span class="es">Exchanges</span><span class="de">Börsen</span></a>
</div>
<footer>© 2026 BTCtiming.com</footer>

<script>
const LANG_NAMES = {ko:'KR', en:'EN', ja:'JA', es:'ES', de:'DE'};
function currentLang(){
  try{ const p=new URLSearchParams(location.search).get('lang'); if(['ko','en','ja','es','de'].includes(p)) return p; }catch(e){}
  try{ const s=localStorage.getItem('blogLang'); if(['ko','en','ja','es','de'].includes(s)) return s; }catch(e){}
  return 'ko';
}
function applyLang(lang){
  document.documentElement.lang=lang;
  const label=document.getElementById('langTriggerLabel'); if(label) label.textContent=LANG_NAMES[lang]||'KR';
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active', el.dataset.lang===lang));
  try{ localStorage.setItem('blogLang', lang); }catch(e){}
}
function L(lang){
  applyLang(lang); closeLangMenu();
  const url=new URL(location.href);
  if(lang==='ko') url.searchParams.delete('lang'); else url.searchParams.set('lang', lang);
  history.replaceState(null,'',url.toString());
}
function toggleLangMenu(e){ e.stopPropagation(); document.getElementById('langDropdown').classList.toggle('open'); }
function closeLangMenu(){ document.getElementById('langDropdown').classList.remove('open'); }
document.addEventListener('click',(e)=>{ const dd=document.getElementById('langDropdown'); if(dd&&dd.classList.contains('open')&&!dd.contains(e.target)) closeLangMenu(); });
applyLang(currentLang());
</script>
</body>
</html>
