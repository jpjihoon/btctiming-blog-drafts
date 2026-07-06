<?php
// BTCtiming.com — 사용자용 사이트맵 (날짜별 계층, NYT 스타일, 블로그 통일 디자인)
// 배포: /www/sitemap-guide.php → btctiming.com/sitemap-guide.php
header('Content-Type: text/html; charset=utf-8');
$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];
$metaFile = $root . '/blog/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];

// 날짜(YYYY-MM-DD)별로 그룹핑
$byDate = [];
foreach ($articles as $slug => $a) {
    $d = 'unknown';
    if (preg_match('/^(\d{4}-\d{2}-\d{2})/', (string)($a['date'] ?? ''), $m)) $d = $m[1];
    $a['__slug'] = $slug;
    $byDate[$d][] = $a;
}
krsort($byDate); // 최신 날짜 먼저

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
function catName($ci,$lc){ return $ci[$lc] ?? ($ci['ko'] ?? ($ci['en'] ?? '')); }
function artTitle($a,$lc){ foreach([$lc,'ko','en'] as $c){ if(!empty($a["title_{$c}"])) return $a["title_{$c}"]; } return $a['__slug'] ?? ''; }
// 카테고리 라벨 다국어 배열 (JS 없이 CSS로 표시하므로 각 span)
$dateGroups = array_keys($byDate);
$INITIAL = 5; // 처음에 보여줄 날짜 그룹 수
$hasArticles = !empty($articles);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sitemap · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 전체 페이지·블로그 글을 날짜별로 정리한 사이트맵.">
<link rel="canonical" href="<?= h($baseUrl) ?>/sitemap-guide.php">
<style>
:root{--bg:#09090b;--bg2:#0f0f11;--bg3:#131316;--bg4:#1a1a1e;--b1:rgba(255,255,255,.08);--orange:#f7931a;--t1:#e4e4e7;--t2:#a1a1aa;--t3:#71717a;color-scheme:dark}
*{box-sizing:border-box}
body{margin:0;background:#09090b;color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:var(--orange);text-decoration:none}a:hover{text-decoration:underline}
[lang="ko"] .en,[lang="ko"] .ja,[lang="ko"] .es,[lang="ko"] .de{display:none}
[lang="en"] .ko,[lang="en"] .ja,[lang="en"] .es,[lang="en"] .de{display:none}
[lang="ja"] .ko,[lang="ja"] .en,[lang="ja"] .es,[lang="ja"] .de{display:none}
[lang="es"] .ko,[lang="es"] .en,[lang="es"] .ja,[lang="es"] .de{display:none}
[lang="de"] .ko,[lang="de"] .en,[lang="de"] .ja,[lang="de"] .es{display:none}
nav{background:var(--bg2);border-bottom:1px solid var(--b1);position:sticky;top:0;z-index:100;height:52px}
.nav-w{max-width:960px;margin:0 auto;padding:0 20px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:16px;font-weight:700;color:var(--orange)}.logo span{color:var(--t1)}
.back{font-size:13px;color:var(--t3);margin-left:2px}
.lang-dropdown{position:relative;flex-shrink:0;margin-left:auto}
.lang-trigger{display:flex;align-items:center;gap:4px;height:32px;padding:0 10px;background:#151515;border:1px solid var(--b1);border-radius:8px;color:var(--t2);font-size:12px;font-weight:600;cursor:pointer}
.lang-trigger:hover{background:#1f1f1f}
.lang-caret{font-size:9px;transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#151515;border:1px solid var(--b1);border-radius:10px;padding:5px;opacity:0;pointer-events:none;transform:translateY(-6px);transition:.15s;z-index:20}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:0;color:var(--t2);font-size:13px;cursor:pointer;border-radius:7px;text-align:left}
.lang-menu-item:hover{background:#1f1f1f;color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);
  background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(247,147,26,.16),transparent 60%),
             radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),#09090b}
.hero-inner{max-width:960px;margin:0 auto;padding:40px 20px 30px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--orange);background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
h1{font-size:2rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.lead{font-size:15px;color:var(--t2);max-width:640px;margin:0}
.wrap{max-width:960px;margin:0 auto;padding:36px 20px 40px}
h2{font-size:1.1rem;font-weight:700;margin:34px 0 12px}
.main-links{display:flex;flex-wrap:wrap;gap:10px;margin:8px 0}
.main-links a{font-size:14px;font-weight:600;padding:9px 15px;border-radius:10px;background:var(--bg3);border:1px solid var(--b1);color:var(--t1)}
.main-links a:hover{border-color:rgba(247,147,26,.4);text-decoration:none}
.cat-links{display:flex;flex-wrap:wrap;gap:8px;margin:8px 0 4px}
.cat-links a{font-size:13px;font-weight:600;padding:6px 12px;border-radius:999px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2)}
.cat-links a:hover{border-color:rgba(247,147,26,.4);color:var(--orange);text-decoration:none}
/* 날짜 그룹 */
.date-group{margin:0 0 6px;border-bottom:1px solid rgba(255,255,255,.06)}
.date-head{display:flex;align-items:baseline;gap:10px;padding:16px 0 8px}
.date-head .d-main{font-size:1.05rem;font-weight:700;color:var(--t1)}
.date-head .d-count{font-size:11px;font-weight:600;color:var(--t3);background:var(--bg4);border:1px solid var(--b1);border-radius:999px;padding:2px 9px}
ul.day-arts{list-style:none;padding:0;margin:0 0 14px}
ul.day-arts li{display:flex;align-items:baseline;gap:10px;padding:6px 0}
ul.day-arts li .a-cat{flex-shrink:0;font-size:11px;font-weight:700;padding:1px 7px;border-radius:5px;background:var(--bg4);color:var(--t3);border:1px solid var(--b1)}
ul.day-arts li a{color:#d4d4d8;font-size:14.5px;min-width:0}
ul.day-arts li a:hover{color:var(--orange)}
.date-group.hidden{display:none}
.more-wrap{text-align:center;margin:26px 0 0}
.more-btn{font-size:14px;font-weight:600;padding:11px 26px;border-radius:11px;border:1px solid var(--b1);background:var(--bg3);color:var(--t1);cursor:pointer}
.more-btn:hover{border-color:rgba(247,147,26,.5);background:var(--bg4)}
.more-btn[hidden]{display:none}
footer{border-top:1px solid var(--b1);margin-top:40px}
.foot-in{max-width:960px;margin:0 auto;padding:26px 20px 40px}
.foot-links{display:flex;flex-wrap:wrap;gap:8px 22px;margin-bottom:16px}
.foot-links a{font-size:13.5px;color:var(--t2)}
.foot-links a:hover{color:var(--orange)}
.foot-copy{font-size:12px;color:#52525b}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/" class="logo">BTC<span>timing</span>.com</a>
  <span class="back"><a href="/blog/" style="color:var(--t3)"><span class="ko">← 블로그</span><span class="en">← Blog</span><span class="ja">← ブログ</span><span class="es">← Blog</span><span class="de">← Blog</span></a></span>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" onclick="toggleLangMenu(event)"><span id="langTriggerLabel">KO</span><span class="lang-caret">▾</span></button>
    <div class="lang-menu">
      <button type="button" class="lang-menu-item" data-lang="ko" onclick="L('ko')">🇰🇷 한국어</button>
      <button type="button" class="lang-menu-item" data-lang="en" onclick="L('en')">🇺🇸 English</button>
      <button type="button" class="lang-menu-item" data-lang="ja" onclick="L('ja')">🇯🇵 日本語</button>
      <button type="button" class="lang-menu-item" data-lang="es" onclick="L('es')">🇪🇸 Español</button>
      <button type="button" class="lang-menu-item" data-lang="de" onclick="L('de')">🇩🇪 Deutsch</button>
    </div>
  </div>
</div></nav>

<div class="hero"><div class="hero-inner">
  <span class="hero-badge">🗺 <span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa</span><span class="de">Sitemap</span></span>
  <h1><span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span></h1>
  <p class="lead">
    <span class="ko">BTCtiming의 모든 페이지와 블로그 글을 날짜별로 정리했습니다.</span>
    <span class="en">All of BTCtiming's pages and posts, organized by date.</span>
    <span class="ja">BTCtimingのすべてのページと記事を日付別に整理しました。</span>
    <span class="es">Todas las páginas y publicaciones de BTCtiming, organizadas por fecha.</span>
    <span class="de">Alle Seiten und Beiträge von BTCtiming, nach Datum geordnet.</span>
  </p>
</div></div>

<div class="wrap">
  <h2><span class="ko">주요 페이지</span><span class="en">Main Pages</span><span class="ja">主要ページ</span><span class="es">Páginas Principales</span><span class="de">Hauptseiten</span></h2>
  <div class="main-links">
    <a href="/">📊 <span class="ko">실시간 지표 대시보드</span><span class="en">Live Dashboard</span><span class="ja">リアルタイム指標</span><span class="es">Panel en Vivo</span><span class="de">Live-Dashboard</span></a>
    <a href="/blog/">📰 <span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
    <a href="/exchanges.php">🎁 <span class="ko">거래소 비교</span><span class="en">Exchanges</span><span class="ja">取引所比較</span><span class="es">Exchanges</span><span class="de">Börsen</span></a>
    <a href="/rss-guide.php">📡 <span class="ko">RSS 피드</span><span class="en">RSS Feeds</span><span class="ja">RSSフィード</span><span class="es">Feeds RSS</span><span class="de">RSS-Feeds</span></a>
  </div>

  <?php if (!empty($cats)): ?>
  <h2><span class="ko">카테고리</span><span class="en">Categories</span><span class="ja">カテゴリー</span><span class="es">Categorías</span><span class="de">Kategorien</span></h2>
  <div class="cat-links">
    <?php foreach ($cats as $key => $ci): $icon=$catIcon[$key]??'📄'; ?>
    <a href="/blog/?cat=<?= h($key) ?>"><?= $icon ?> <span class="ko"><?= h(catName($ci,'ko')) ?></span><span class="en"><?= h(catName($ci,'en')) ?></span><span class="ja"><?= h(catName($ci,'ja')) ?></span><span class="es"><?= h(catName($ci,'es')) ?></span><span class="de"><?= h(catName($ci,'de')) ?></span></a>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if ($hasArticles): ?>
  <h2><span class="ko">날짜별 글</span><span class="en">Posts by Date</span><span class="ja">日付別記事</span><span class="es">Publicaciones por Fecha</span><span class="de">Beiträge nach Datum</span></h2>
  <div id="dateList">
    <?php $gi = 0; foreach ($byDate as $date => $list): $gi++;
        $hiddenCls = $gi > $INITIAL ? ' hidden' : '';
        // 날짜 표시: YYYY.MM.DD
        $dLabel = ($date === 'unknown') ? '—' : str_replace('-', '.', $date);
    ?>
    <div class="date-group<?= $hiddenCls ?>" data-idx="<?= $gi ?>">
      <div class="date-head">
        <span class="d-main"><?= h($dLabel) ?></span>
        <span class="d-count"><?= count($list) ?></span>
      </div>
      <ul class="day-arts">
        <?php foreach ($list as $a):
            $slug = $a['__slug'] ?? ''; if ($slug === '') continue;
            $ck = $a['category'] ?? 'guide';
            $ci = $cats[$ck] ?? [];
            $icon = $catIcon[$ck] ?? '📄';
        ?>
        <li>
          <span class="a-cat"><?= $icon ?></span>
          <a href="/blog/<?= h($slug) ?>.php"><span class="ko"><?= h(artTitle($a,'ko')) ?></span><span class="en"><?= h(artTitle($a,'en')) ?></span><span class="ja"><?= h(artTitle($a,'ja')) ?></span><span class="es"><?= h(artTitle($a,'es')) ?></span><span class="de"><?= h(artTitle($a,'de')) ?></span></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endforeach; ?>
  </div>
  <?php if (count($byDate) > $INITIAL): ?>
  <div class="more-wrap">
    <button type="button" class="more-btn" id="moreBtn" data-step="7">
      <span class="ko">더 보기</span><span class="en">Show more</span><span class="ja">もっと見る</span><span class="es">Ver más</span><span class="de">Mehr anzeigen</span>
      <span id="moreCount"></span>
    </button>
  </div>
  <?php endif; ?>
  <?php else: ?>
  <p class="lead" style="margin-top:24px"><span class="ko">아직 등록된 글이 없습니다.</span><span class="en">No posts yet.</span><span class="ja">記事はまだありません。</span><span class="es">Aún no hay publicaciones.</span><span class="de">Noch keine Beiträge.</span></p>
  <?php endif; ?>
</div>

<footer><div class="foot-in">
  <div class="foot-links">
    <a href="/"><span class="ko">대시보드</span><span class="en">Dashboard</span><span class="ja">ダッシュボード</span><span class="es">Panel</span><span class="de">Dashboard</span></a>
    <a href="/blog/"><span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
    <a href="/rss-guide.php">RSS</a>
    <a href="/exchanges.php"><span class="ko">거래소 비교</span><span class="en">Exchanges</span><span class="ja">取引所比較</span><span class="es">Exchanges</span><span class="de">Börsen</span></a>
    <a href="/privacy"><span class="ko">개인정보처리방침</span><span class="en">Privacy</span><span class="ja">プライバシー</span><span class="es">Privacidad</span><span class="de">Datenschutz</span></a>
    <a href="/terms"><span class="ko">이용약관</span><span class="en">Terms</span><span class="ja">利用規約</span><span class="es">Términos</span><span class="de">Nutzungsbedingungen</span></a>
  </div>
  <div class="foot-copy">© 2026 BTCtiming.com</div>
</div></footer>

<script>
const LANG_NAMES={ko:'KO',en:'EN',ja:'JA',es:'ES',de:'DE'};
function currentLang(){
  try{const p=new URLSearchParams(location.search).get('lang');if(['ko','en','ja','es','de'].includes(p))return p;}catch(e){}
  try{const s=localStorage.getItem('blogLang');if(['ko','en','ja','es','de'].includes(s))return s;}catch(e){}
  return 'ko';
}
function applyLang(lang){
  document.documentElement.lang=lang;
  const l=document.getElementById('langTriggerLabel');if(l)l.textContent=LANG_NAMES[lang]||'KO';
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active',el.dataset.lang===lang));
  try{localStorage.setItem('blogLang',lang);}catch(e){}
}
function L(lang){applyLang(lang);closeLangMenu();const url=new URL(location.href);if(lang==='ko')url.searchParams.delete('lang');else url.searchParams.set('lang',lang);history.replaceState(null,'',url.toString());}
function toggleLangMenu(e){e.stopPropagation();document.getElementById('langDropdown').classList.toggle('open');}
function closeLangMenu(){document.getElementById('langDropdown').classList.remove('open');}
document.addEventListener('click',(e)=>{const dd=document.getElementById('langDropdown');if(dd&&dd.classList.contains('open')&&!dd.contains(e.target))closeLangMenu();});
// 더보기: 숨겨진 날짜 그룹을 step개씩 노출
(function(){
  var btn=document.getElementById('moreBtn');if(!btn)return;
  var step=parseInt(btn.getAttribute('data-step'),10)||7;
  function update(){
    var hidden=document.querySelectorAll('.date-group.hidden');
    if(hidden.length===0){btn.hidden=true;return;}
    var cnt=document.getElementById('moreCount');if(cnt)cnt.textContent=' ('+hidden.length+')';
  }
  btn.addEventListener('click',function(){
    var hidden=document.querySelectorAll('.date-group.hidden');
    for(var i=0;i<step&&i<hidden.length;i++){hidden[i].classList.remove('hidden');}
    update();
  });
  update();
})();
applyLang(currentLang());
</script>
</body>
</html>
