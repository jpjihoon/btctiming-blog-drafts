<?php
// BTCtiming.com — 사이트맵 (년/월/일 선택 → 그날 발행 글만 표시)
// 배포: /www/sitemap-guide.php → btctiming.com/sitemap-guide.php
header('Content-Type: text/html; charset=utf-8');
$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];
$metaFile = $root . '/blog/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];

// 날짜(Y-m-d)별로 글 그룹핑
$byDate = [];
foreach ($articles as $slug => $a) {
    if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})/', (string)($a['date'] ?? ''), $m)) continue;
    $ymd = $m[1] . '-' . $m[2] . '-' . $m[3];
    $a['__slug'] = $slug;
    $byDate[$ymd][] = $a;
}
krsort($byDate);

// 트리 구조: [year][month][day] = 글수
$tree = [];
foreach ($byDate as $ymd => $list) {
    [$y, $mo, $d] = explode('-', $ymd);
    $tree[$y][$mo][$d] = count($list);
}
// JS로 넘길 데이터: 날짜별 글 목록(모든 언어 제목 + slug + 카테고리)
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
$postsData = [];
foreach ($byDate as $ymd => $list) {
    $arr = [];
    foreach ($list as $a) {
        $slug = $a['__slug'] ?? ''; if ($slug === '') continue;
        $ck = $a['category'] ?? 'guide';
        $arr[] = [
            'slug'  => $slug,
            'icon'  => $catIcon[$ck] ?? '📄',
            'title' => [
                'ko' => $a['title_ko'] ?? ($a['title_en'] ?? $slug),
                'en' => $a['title_en'] ?? ($a['title_ko'] ?? $slug),
                'ja' => $a['title_ja'] ?? ($a['title_en'] ?? ($a['title_ko'] ?? $slug)),
                'es' => $a['title_es'] ?? ($a['title_en'] ?? ($a['title_ko'] ?? $slug)),
                'de' => $a['title_de'] ?? ($a['title_en'] ?? ($a['title_ko'] ?? $slug)),
            ],
        ];
    }
    $postsData[$ymd] = $arr;
}
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$hasArticles = !empty($byDate);
// 기본 선택: 가장 최근 날짜
$latest = $hasArticles ? array_key_first($byDate) : '';
[$defY, $defM, $defD] = $latest ? explode('-', $latest) : ['', '', ''];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sitemap · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 블로그 글을 날짜별로 조회하는 사이트맵.">
<link rel="canonical" href="<?= h($baseUrl) ?>/sitemap-guide.php">
<style>
:root{color-scheme:dark}
*{box-sizing:border-box}
body{margin:0;background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
[lang="ko"] .en,[lang="ko"] .ja,[lang="ko"] .es,[lang="ko"] .de{display:none}
[lang="en"] .ko,[lang="en"] .ja,[lang="en"] .es,[lang="en"] .de{display:none}
[lang="ja"] .ko,[lang="ja"] .en,[lang="ja"] .es,[lang="ja"] .de{display:none}
[lang="es"] .ko,[lang="es"] .en,[lang="es"] .ja,[lang="es"] .de{display:none}
[lang="de"] .ko,[lang="de"] .en,[lang="de"] .ja,[lang="de"] .es{display:none}
/* nav — 블로그 목록과 동일 */
nav{background:#0f0f11;border-bottom:1px solid rgba(255,255,255,.08);position:sticky;top:0;z-index:100;height:52px}
.nav-w{max-width:960px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:16px;font-weight:700;color:#f7931a}.logo span{color:#e4e4e7}
.nav-spacer{flex:1}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:32px;padding:0 10px;background:#151515;border:1px solid rgba(255,255,255,.15);border-radius:8px;color:#e4e4e7;font-size:11px;font-weight:600;letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#1f1f1f}
.lang-caret{font-size:9px;color:#71717a;transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#151515;border:1px solid rgba(255,255,255,.15);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:none;color:#a1a1aa;font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#1f1f1f;color:#e4e4e7}
.lang-menu-item.active{color:#f7931a;background:rgba(247,147,26,.08)}
/* hero — 블로그 목록과 동일한 그라데이션 */
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(247,147,26,.16),transparent 60%),radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),#09090b}
.hero-inner{max-width:960px;margin:0 auto;padding:40px 16px 30px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
h1{font-size:2rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.lead{font-size:15px;color:#a1a1aa;max-width:640px;margin:0}
.wrap{max-width:960px;margin:0 auto;padding:32px 16px 40px}
/* 날짜 선택기 */
.picker-label{font-size:12px;font-weight:700;color:#71717a;text-transform:uppercase;letter-spacing:.04em;margin:0 0 10px}
.picker-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:8px}
.pick{font-size:14px;font-weight:600;padding:7px 14px;border-radius:9px;background:#131316;border:1px solid rgba(255,255,255,.1);color:#d4d4d8;cursor:pointer;transition:all .12s;font-variant-numeric:tabular-nums}
.pick:hover{border-color:rgba(247,147,26,.5);color:#f7931a}
.pick.active{background:#f7931a;border-color:#f7931a;color:#0a0a0a}
.picker-block{margin-bottom:22px}
.picker-block.sep{border-top:1px solid rgba(255,255,255,.06);padding-top:22px}
/* 선택된 날짜의 글 */
.day-head{font-size:1.15rem;font-weight:700;margin:8px 0 14px;display:flex;align-items:baseline;gap:10px}
.day-head .d-count{font-size:11px;font-weight:600;color:#71717a;background:#1a1a1e;border:1px solid rgba(255,255,255,.1);border-radius:999px;padding:2px 9px}
ul.day-posts{list-style:none;padding:0;margin:0}
ul.day-posts li{display:flex;align-items:baseline;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,.05)}
ul.day-posts li .p-ico{flex-shrink:0;font-size:14px}
ul.day-posts li a{color:#d4d4d8;font-size:14.5px}
ul.day-posts li a:hover{color:#f7931a}
.empty-day{color:#52525b;font-size:14px;padding:16px 0}
footer{border-top:1px solid rgba(255,255,255,.06);padding:24px;text-align:center;font-size:13px;color:#52525b}
footer a{color:#52525b}footer a:hover{color:#71717a}
.foot-sep{margin:0 6px;color:#3f3f46}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/" class="logo">BTC<span>timing</span>.com</a>
  <div class="nav-spacer"></div>
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
    <span class="ko">날짜를 선택하면 그날 발행된 블로그 글을 볼 수 있습니다.</span>
    <span class="en">Select a date to see blog posts published that day.</span>
    <span class="ja">日付を選ぶと、その日に公開されたブログ記事が表示されます。</span>
    <span class="es">Selecciona una fecha para ver las publicaciones de ese día.</span>
    <span class="de">Wähle ein Datum, um die an diesem Tag veröffentlichten Beiträge zu sehen.</span>
  </p>
</div></div>

<div class="wrap">
  <?php if ($hasArticles): ?>
  <div class="picker-block">
    <div class="picker-label"><span class="ko">연도</span><span class="en">Year</span><span class="ja">年</span><span class="es">Año</span><span class="de">Jahr</span></div>
    <div class="picker-row" id="yearRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="picker-label"><span class="ko">월</span><span class="en">Month</span><span class="ja">月</span><span class="es">Mes</span><span class="de">Monat</span></div>
    <div class="picker-row" id="monthRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="picker-label"><span class="ko">일</span><span class="en">Day</span><span class="ja">日</span><span class="es">Día</span><span class="de">Tag</span></div>
    <div class="picker-row" id="dayRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="day-head"><span id="dayTitle"></span><span class="d-count" id="dayCount"></span></div>
    <ul class="day-posts" id="dayPosts"></ul>
  </div>
  <?php else: ?>
  <p class="lead"><span class="ko">아직 등록된 글이 없습니다.</span><span class="en">No posts yet.</span><span class="ja">記事はまだありません。</span><span class="es">Aún no hay publicaciones.</span><span class="de">Noch keine Beiträge.</span></p>
  <?php endif; ?>
</div>

<footer>
  © 2026 BTCtiming.com
  <span class="foot-sep">·</span>
  <a href="/blog/"><span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
  <span class="foot-sep">·</span>
  <a href="/rss-guide.php">RSS</a>
  <span class="foot-sep">·</span>
  <a href="/privacy"><span class="ko">개인정보처리방침</span><span class="en">Privacy Policy</span><span class="ja">プライバシーポリシー</span><span class="es">Política de Privacidad</span><span class="de">Datenschutzerklärung</span></a>
  <span class="foot-sep">·</span>
  <a href="/terms"><span class="ko">이용약관</span><span class="en">Terms of Service</span><span class="ja">利用規約</span><span class="es">Términos de Servicio</span><span class="de">Nutzungsbedingungen</span></a>
</footer>

<script>
const TREE = <?= json_encode($tree, JSON_UNESCAPED_UNICODE) ?>;
const POSTS = <?= json_encode($postsData, JSON_UNESCAPED_UNICODE) ?>;
const MONTH_NAMES = {ko:['','1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  en:['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
  ja:['','1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
  es:['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  de:['','Jan','Feb','Mär','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez']};
const LANG_NAMES={ko:'KO',en:'EN',ja:'JA',es:'ES',de:'DE'};
let sel = {y:'<?= h($defY) ?>', m:'<?= h($defM) ?>', d:'<?= h($defD) ?>'};

function curLang(){ return document.documentElement.lang || 'ko'; }

function renderYears(){
  const row=document.getElementById('yearRow'); if(!row)return;
  const years=Object.keys(TREE).sort((a,b)=>b-a);
  row.innerHTML='';
  years.forEach(y=>{
    const b=document.createElement('button');b.className='pick'+(y===sel.y?' active':'');b.textContent=y;
    b.onclick=()=>{ sel.y=y; const months=Object.keys(TREE[y]).sort((a,b)=>b-a); sel.m=months[0];
      const days=Object.keys(TREE[y][sel.m]).sort((a,b)=>b-a); sel.d=days[0]; renderAll(); };
    row.appendChild(b);
  });
}
function renderMonths(){
  const row=document.getElementById('monthRow'); if(!row)return;
  const months=Object.keys(TREE[sel.y]||{}).sort((a,b)=>b-a);
  const mn=MONTH_NAMES[curLang()]||MONTH_NAMES.en;
  row.innerHTML='';
  months.forEach(mo=>{
    const b=document.createElement('button');b.className='pick'+(mo===sel.m?' active':'');b.textContent=mn[parseInt(mo,10)];
    b.onclick=()=>{ sel.m=mo; const days=Object.keys(TREE[sel.y][mo]).sort((a,b)=>b-a); sel.d=days[0]; renderAll(); };
    row.appendChild(b);
  });
}
function renderDays(){
  const row=document.getElementById('dayRow'); if(!row)return;
  const days=Object.keys((TREE[sel.y]||{})[sel.m]||{}).sort((a,b)=>b-a);
  row.innerHTML='';
  days.forEach(d=>{
    const b=document.createElement('button');b.className='pick'+(d===sel.d?' active':'');b.textContent=parseInt(d,10);
    b.onclick=()=>{ sel.d=d; renderAll(); };
    row.appendChild(b);
  });
}
function renderPosts(){
  const ul=document.getElementById('dayPosts'), title=document.getElementById('dayTitle'), cnt=document.getElementById('dayCount');
  if(!ul)return;
  const ymd=sel.y+'-'+sel.m+'-'+sel.d;
  const lang=curLang();
  const mn=MONTH_NAMES[lang]||MONTH_NAMES.en;
  if(title) title.textContent = sel.y+'. '+mn[parseInt(sel.m,10)]+' '+parseInt(sel.d,10);
  const posts=POSTS[ymd]||[];
  if(cnt) cnt.textContent=posts.length;
  ul.innerHTML='';
  if(posts.length===0){ ul.innerHTML='<li class="empty-day">—</li>'; return; }
  posts.forEach(p=>{
    const li=document.createElement('li');
    const ico=document.createElement('span');ico.className='p-ico';ico.textContent=p.icon;
    const a=document.createElement('a');a.href='/blog/'+p.slug+'.php'+(lang==='ko'?'':('?lang='+lang));
    a.textContent=p.title[lang]||p.title.ko;
    li.appendChild(ico);li.appendChild(a);ul.appendChild(li);
  });
}
function renderAll(){ renderYears(); renderMonths(); renderDays(); renderPosts(); }

function applyLang(lang){
  document.documentElement.lang=lang;
  const l=document.getElementById('langTriggerLabel');if(l)l.textContent=LANG_NAMES[lang]||'KO';
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active',el.dataset.lang===lang));
  try{localStorage.setItem('blogLang',lang);}catch(e){}
  if(Object.keys(TREE).length) renderAll(); // 언어 바뀌면 월 이름·제목 다시
}
function currentLang(){
  try{const p=new URLSearchParams(location.search).get('lang');if(['ko','en','ja','es','de'].includes(p))return p;}catch(e){}
  try{const s=localStorage.getItem('blogLang');if(['ko','en','ja','es','de'].includes(s))return s;}catch(e){}
  return 'ko';
}
function L(lang){applyLang(lang);closeLangMenu();const url=new URL(location.href);if(lang==='ko')url.searchParams.delete('lang');else url.searchParams.set('lang',lang);history.replaceState(null,'',url.toString());}
function toggleLangMenu(e){e.stopPropagation();document.getElementById('langDropdown').classList.toggle('open');}
function closeLangMenu(){document.getElementById('langDropdown').classList.remove('open');}
document.addEventListener('click',(e)=>{const dd=document.getElementById('langDropdown');if(dd&&dd.classList.contains('open')&&!dd.contains(e.target))closeLangMenu();});
applyLang(currentLang());
</script>
</body>
</html>
