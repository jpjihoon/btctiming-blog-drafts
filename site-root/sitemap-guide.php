<?php
// BTCtiming.com — 사이트맵 (년/월/일 선택, 공용 헤더/푸터 include)
header('Content-Type: text/html; charset=utf-8');
$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];
$metaFile = $root . '/blog/_meta.php';
$articles = file_exists($metaFile) ? require $metaFile : [];
if(!function_exists('gh')){ function gh($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];

$byDate = [];
foreach ($articles as $slug => $a) {
    if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})/', (string)($a['date'] ?? ''), $m)) continue;
    $a['__slug'] = $slug; $byDate[$m[1].'-'.$m[2].'-'.$m[3]][] = $a;
}
krsort($byDate);
$tree = [];
foreach ($byDate as $ymd => $list) { [$y,$mo,$d]=explode('-',$ymd); $tree[$y][$mo][$d]=count($list); }
$postsData = [];
foreach ($byDate as $ymd => $list) {
    $arr=[];
    foreach ($list as $a) {
        $slug=$a['__slug']??''; if($slug==='')continue;
        $ck=$a['category']??'guide';
        $arr[]=['slug'=>$slug,'icon'=>$catIcon[$ck]??'📄','title'=>[
            'ko'=>$a['title_ko']??($a['title_en']??$slug),'en'=>$a['title_en']??($a['title_ko']??$slug),
            'ja'=>$a['title_ja']??($a['title_en']??($a['title_ko']??$slug)),
            'es'=>$a['title_es']??($a['title_en']??($a['title_ko']??$slug)),
            'de'=>$a['title_de']??($a['title_en']??($a['title_ko']??$slug))]];
    }
    $postsData[$ymd]=$arr;
}
$hasArticles = !empty($byDate);
$latest = $hasArticles ? array_key_first($byDate) : '';
[$defY,$defM,$defD] = $latest ? explode('-',$latest) : ['','',''];

$GUIDE_TITLE = 'Sitemap · BTCtiming.com';
$GUIDE_DESC = 'BTCtiming.com 블로그 글을 날짜별로 조회하는 사이트맵.';
$GUIDE_CANONICAL = $baseUrl . '/sitemap-guide.php';
$GUIDE_EXTRA_CSS = '
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(251,146,60,.16),transparent 60%),radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),var(--bg)}
.hero-in{max-width:800px;margin:0 auto;padding:40px 16px 30px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--orange);background:rgba(251,146,60,.1);border:1px solid rgba(251,146,60,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
.hero h1{font-size:2rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.hero .lead{font-size:15px;color:var(--t2);max-width:640px;margin:0}
.wrap{max-width:800px;margin:0 auto;padding:32px 16px 40px}
.picker-label{font-size:12px;font-weight:700;color:var(--t3);text-transform:uppercase;letter-spacing:.04em;margin:0 0 10px}
.picker-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:8px}
.pick{font-size:14px;font-weight:600;padding:7px 14px;border-radius:9px;background:var(--bg3);border:1px solid var(--b1);color:var(--t1);cursor:pointer;transition:all .12s;font-variant-numeric:tabular-nums}
.pick:hover{border-color:rgba(251,146,60,.5);color:var(--orange)}
.pick.active{background:var(--orange);border-color:var(--orange);color:#0a0a0a}
.picker-block{margin-bottom:22px}
.picker-block.sep{border-top:1px solid var(--b1);padding-top:22px}
.day-head{font-size:1.15rem;font-weight:700;margin:8px 0 14px;display:flex;align-items:baseline;gap:10px}
.day-head .d-count{font-size:11px;font-weight:600;color:var(--t3);background:var(--bg4);border:1px solid var(--b1);border-radius:999px;padding:2px 9px}
ul.day-posts{list-style:none;padding:0;margin:0}
ul.day-posts li{display:flex;align-items:baseline;gap:10px;padding:9px 0;border-bottom:1px solid var(--b1)}
ul.day-posts li .p-ico{flex-shrink:0;font-size:14px}
ul.day-posts li a{color:#d4d4d8;font-size:14.5px}
ul.day-posts li a:hover{color:var(--orange)}
.empty-day{color:var(--t3);font-size:14px;padding:16px 0}
';
require __DIR__ . '/_guide_head.php';
?>

<div class="hero"><div class="hero-in">
  <span class="hero-badge">🗺 <span class="l-ko">사이트맵</span><span class="l-en">Sitemap</span><span class="l-ja">サイトマップ</span><span class="l-es">Mapa</span><span class="l-de">Sitemap</span><span class="l-fr">Plan du site</span><span class="l-pt">Mapa do site</span><span class="l-tr">Site haritası</span><span class="l-vi">Sơ đồ trang</span></span>
  <h1><span class="l-ko">사이트맵</span><span class="l-en">Sitemap</span><span class="l-ja">サイトマップ</span><span class="l-es">Mapa del sitio</span><span class="l-de">Sitemap</span><span class="l-fr">Plan du site</span><span class="l-pt">Mapa do site</span><span class="l-tr">Site haritası</span><span class="l-vi">Sơ đồ trang</span></h1>
  <p class="lead">
    <span class="l-ko">날짜를 선택하면 그날 발행된 블로그 글을 볼 수 있습니다.</span>
    <span class="l-en">Select a date to see blog posts published that day.</span>
    <span class="l-ja">日付を選ぶと、その日に公開されたブログ記事が表示されます。</span>
    <span class="l-es">Selecciona una fecha para ver las publicaciones de ese día.</span>
    <span class="l-de">Wähle ein Datum, um die an diesem Tag veröffentlichten Beiträge zu sehen.</span><span class="l-fr">Sélectionnez une date pour voir les articles publiés ce jour-là.</span><span class="l-pt">Selecione uma data para ver os artigos publicados naquele dia.</span><span class="l-tr">O gün yayımlanan yazıları görmek için bir tarih seçin.</span><span class="l-vi">Chọn một ngày để xem các bài viết được đăng trong ngày đó.</span>
  </p>
</div></div>

<div class="wrap">
  <?php if ($hasArticles): ?>
  <div class="picker-block">
    <div class="picker-label"><span class="l-ko">연도</span><span class="l-en">Year</span><span class="l-ja">年</span><span class="l-es">Año</span><span class="l-de">Jahr</span><span class="l-fr">Année</span><span class="l-pt">Ano</span><span class="l-tr">Yıl</span><span class="l-vi">Năm</span></div>
    <div class="picker-row" id="yearRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="picker-label"><span class="l-ko">월</span><span class="l-en">Month</span><span class="l-ja">月</span><span class="l-es">Mes</span><span class="l-de">Monat</span><span class="l-fr">Mois</span><span class="l-pt">Mês</span><span class="l-tr">Ay</span><span class="l-vi">Tháng</span></div>
    <div class="picker-row" id="monthRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="picker-label"><span class="l-ko">일</span><span class="l-en">Day</span><span class="l-ja">日</span><span class="l-es">Día</span><span class="l-de">Tag</span><span class="l-fr">Jour</span><span class="l-pt">Dia</span><span class="l-tr">Gün</span><span class="l-vi">Ngày</span></div>
    <div class="picker-row" id="dayRow"></div>
  </div>
  <div class="picker-block sep">
    <div class="day-head"><span id="dayTitle"></span><span class="d-count" id="dayCount"></span></div>
    <ul class="day-posts" id="dayPosts"></ul>
  </div>
  <?php else: ?>
  <p class="lead"><span class="l-ko">아직 등록된 글이 없습니다.</span><span class="l-en">No posts yet.</span><span class="l-ja">記事はまだありません。</span><span class="l-es">Aún no hay publicaciones.</span><span class="l-de">Noch keine Beiträge.</span><span class="l-fr">Aucun article pour le moment.</span><span class="l-pt">Ainda não há artigos.</span><span class="l-tr">Henüz yazı yok.</span><span class="l-vi">Chưa có bài viết nào.</span></p>
  <?php endif; ?>
</div>

<?php
$GUIDE_EXTRA_JS = "
const TREE = " . json_encode($tree, JSON_UNESCAPED_UNICODE) . ";
const POSTS = " . json_encode($postsData, JSON_UNESCAPED_UNICODE) . ";
const MONTH_NAMES = {ko:['','1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  en:['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
  ja:['','1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
  es:['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  de:['','Jan','Feb','Mär','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez']};
let sel = {y:'" . gh($defY) . "', m:'" . gh($defM) . "', d:'" . gh($defD) . "'};
function curLang(){ return document.documentElement.lang || 'ko'; }
function renderYears(){
  const row=document.getElementById('yearRow'); if(!row)return;
  const years=Object.keys(TREE).sort((a,b)=>b-a); row.innerHTML='';
  years.forEach(y=>{ const b=document.createElement('button');b.className='pick'+(y===sel.y?' active':'');b.textContent=y;
    b.onclick=()=>{ sel.y=y; const months=Object.keys(TREE[y]).sort((a,b)=>b-a); sel.m=months[0];
      const days=Object.keys(TREE[y][sel.m]).sort((a,b)=>b-a); sel.d=days[0]; renderAll(); }; row.appendChild(b); });
}
function renderMonths(){
  const row=document.getElementById('monthRow'); if(!row)return;
  const months=Object.keys(TREE[sel.y]||{}).sort((a,b)=>b-a); const mn=MONTH_NAMES[curLang()]||MONTH_NAMES.en; row.innerHTML='';
  months.forEach(mo=>{ const b=document.createElement('button');b.className='pick'+(mo===sel.m?' active':'');b.textContent=mn[parseInt(mo,10)];
    b.onclick=()=>{ sel.m=mo; const days=Object.keys(TREE[sel.y][mo]).sort((a,b)=>b-a); sel.d=days[0]; renderAll(); }; row.appendChild(b); });
}
function renderDays(){
  const row=document.getElementById('dayRow'); if(!row)return;
  const days=Object.keys((TREE[sel.y]||{})[sel.m]||{}).sort((a,b)=>b-a); row.innerHTML='';
  days.forEach(d=>{ const b=document.createElement('button');b.className='pick'+(d===sel.d?' active':'');b.textContent=parseInt(d,10);
    b.onclick=()=>{ sel.d=d; renderAll(); }; row.appendChild(b); });
}
function renderPosts(){
  const ul=document.getElementById('dayPosts'),title=document.getElementById('dayTitle'),cnt=document.getElementById('dayCount'); if(!ul)return;
  const ymd=sel.y+'-'+sel.m+'-'+sel.d,lang=curLang(),mn=MONTH_NAMES[lang]||MONTH_NAMES.en;
  if(title)title.textContent=sel.y+'. '+mn[parseInt(sel.m,10)]+' '+parseInt(sel.d,10);
  const posts=POSTS[ymd]||[]; if(cnt)cnt.textContent=posts.length; ul.innerHTML='';
  if(posts.length===0){ ul.innerHTML='<li class=\"empty-day\">—</li>'; return; }
  posts.forEach(p=>{ const li=document.createElement('li');
    const ico=document.createElement('span');ico.className='p-ico';ico.textContent=p.icon;
    const a=document.createElement('a');a.href='/blog/'+p.slug+'.php'+(lang==='ko'?'':('?lang='+lang));a.textContent=p.title[lang]||p.title.ko;
    li.appendChild(ico);li.appendChild(a);ul.appendChild(li); });
}
function renderAll(){ renderYears(); renderMonths(); renderDays(); renderPosts(); }
window.onGuideLang = function(){ if(Object.keys(TREE).length) renderAll(); };
if(Object.keys(TREE).length) renderAll();
";
require __DIR__ . '/_guide_foot.php';
