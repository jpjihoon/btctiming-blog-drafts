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
            'de'=>$a['title_de']??($a['title_en']??($a['title_ko']??$slug)),
            'fr'=>$a['title_fr']??($a['title_en']??($a['title_ko']??$slug)),
            'pt'=>$a['title_pt']??($a['title_en']??($a['title_ko']??$slug)),
            'tr'=>$a['title_tr']??($a['title_en']??($a['title_ko']??$slug)),
            'vi'=>$a['title_vi']??($a['title_en']??($a['title_ko']??$slug)),
            'id'=>$a['title_id']??($a['title_en']??($a['title_ko']??$slug)),
            'pl'=>$a['title_pl']??($a['title_en']??($a['title_ko']??$slug)),
            'it'=>$a['title_it']??($a['title_en']??($a['title_ko']??$slug)),
            'ru'=>$a['title_ru']??($a['title_en']??($a['title_ko']??$slug)),
            'zh'=>$a['title_zh']??($a['title_en']??($a['title_ko']??$slug))]];
    }
    $postsData[$ymd]=$arr;
}
$hasArticles = !empty($byDate);
$latest = $hasArticles ? array_key_first($byDate) : '';
[$defY,$defM,$defD] = $latest ? explode('-',$latest) : ['','',''];

$GUIDE_TITLE = 'Sitemap · BTCtiming.com';
$GUIDE_DESC = 'BTCtiming.com 블로그 글을 날짜별로 조회하는 사이트맵.';
$GUIDE_KOPATH = '/sitemap-guide.php';                    // _guide_head가 i18nUrl로 경로형 canonical·hreflang 생성
$GUIDE_CANONICAL = $baseUrl . '/sitemap-guide.php';   // 폴백(GUIDE_KOPATH 우선)
$GUIDE_EXTRA_CSS = '
.hero{border-bottom:1px solid rgba(255,255,255,.08)}
.hero-in{max-width:800px;margin:0 auto;padding:38px 16px 26px}
.hero-eyebrow{font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange);margin-bottom:9px}
.hero h1{font-size:1.7rem;font-weight:600;margin:0 0 10px;letter-spacing:-.01em}
.hero .lead{font-size:14px;color:var(--t2);max-width:640px;margin:0;line-height:1.6}
.wrap{max-width:800px;margin:0 auto;padding:30px 16px 40px}
.picker-block{margin-bottom:18px}
/* 연도 = 밑줄 탭 */
.year-tabs{display:flex;flex-wrap:wrap;gap:22px;border-bottom:1px solid rgba(255,255,255,.08);margin-bottom:18px}
.year-tabs .pick{font-size:15px;font-weight:500;color:var(--t3);padding:0 0 10px;margin-bottom:-1px;background:none;border:none;border-bottom:2px solid transparent;cursor:pointer;transition:color .12s;font-variant-numeric:tabular-nums}
.year-tabs .pick:hover{color:var(--t1)}
.year-tabs .pick.active{color:#fafafa;border-bottom-color:var(--orange)}
/* 월·일 = 텍스트 (선택만 오렌지) */
.mon-row,.day-row{display:flex;flex-wrap:wrap;gap:18px;margin-bottom:16px}
.mon-row .pick,.day-row .pick{font-size:14px;font-weight:400;color:var(--t3);background:none;border:none;padding:2px 0;cursor:pointer;transition:color .12s;font-variant-numeric:tabular-nums}
.mon-row .pick:hover,.day-row .pick:hover{color:var(--t1)}
.mon-row .pick.active,.day-row .pick.active{color:var(--orange);font-weight:500}
.day-head{font-size:14px;font-weight:500;color:#fafafa;margin:20px 0 4px;display:flex;align-items:center;gap:10px}
.day-head:after{content:"";flex:1;height:1px;background:rgba(255,255,255,.06)}
.day-head .d-count{font-size:11px;font-weight:400;color:var(--t3);background:rgba(255,255,255,.04);border-radius:999px;padding:2px 9px;order:1}
ul.day-posts{list-style:none;padding:0;margin:8px 0 0}
ul.day-posts li{padding:0;border:none}
ul.day-posts li a{display:block;color:#d4d4d8;font-size:14px;text-decoration:none;padding:10px 0;border-bottom:1px solid rgba(255,255,255,.05)}
ul.day-posts li a:hover{color:var(--orange)}
.empty-day{color:var(--t3);font-size:14px;padding:16px 0}
';
require __DIR__ . '/_guide_head.php';
?>

<div class="hero"><div class="hero-in">
  <div class="hero-eyebrow">Sitemap</div>
  <h1><span class="l-ko">사이트맵</span><span class="l-en">Sitemap</span><span class="l-ja">サイトマップ</span><span class="l-es">Mapa del sitio</span><span class="l-de">Sitemap</span><span class="l-fr">Plan du site</span><span class="l-pt">Mapa do site</span><span class="l-tr">Site haritası</span><span class="l-vi">Sơ đồ trang</span><span class="l-id">Sitemap</span><span class="l-pl">Mapa witryny</span><span class="l-it">Sitemap</span><span class="l-ru">Карта сайта</span><span class="l-zh">網站地圖</span></h1>
  <p class="lead">
    <span class="l-ko">날짜를 선택하면 그날 발행된 블로그 글을 볼 수 있습니다.</span>
    <span class="l-en">Select a date to see blog posts published that day.</span>
    <span class="l-ja">日付を選ぶと、その日に公開されたブログ記事が表示されます。</span>
    <span class="l-es">Selecciona una fecha para ver las publicaciones de ese día.</span>
    <span class="l-de">Wähle ein Datum, um die an diesem Tag veröffentlichten Beiträge zu sehen.</span><span class="l-fr">Sélectionnez une date pour voir les articles publiés ce jour-là.</span><span class="l-pt">Selecione uma data para ver os artigos publicados naquele dia.</span><span class="l-tr">O gün yayımlanan yazıları görmek için bir tarih seçin.</span><span class="l-vi">Chọn một ngày để xem các bài viết được đăng trong ngày đó.</span><span class="l-id">Pilih tanggal untuk melihat postingan blog yang diterbitkan pada hari itu.</span><span class="l-pl">Wybierz datę, aby zobaczyć wpisy na blogu opublikowane tego dnia.</span><span class="l-it">Seleziona una data per vedere i post del blog pubblicati quel giorno.</span><span class="l-ru">Выберите дату, чтобы увидеть записи блога, опубликованные в этот день.</span><span class="l-zh">選擇日期以查看當天發佈的網誌文章。</span>
  </p>
</div></div>

<div class="wrap">
  <?php if ($hasArticles): ?>
  <div class="picker-block">
    <div class="year-tabs" id="yearRow"></div>
    <div class="mon-row" id="monthRow"></div>
    <div class="day-row" id="dayRow"></div>
  </div>
  <div class="picker-block">
    <div class="day-head"><span id="dayTitle"></span><span class="d-count" id="dayCount"></span></div>
    <ul class="day-posts" id="dayPosts"></ul>
  </div>
  <?php else: ?>
  <p class="lead"><span class="l-ko">아직 등록된 글이 없습니다.</span><span class="l-en">No posts yet.</span><span class="l-ja">記事はまだありません。</span><span class="l-es">Aún no hay publicaciones.</span><span class="l-de">Noch keine Beiträge.</span><span class="l-fr">Aucun article pour le moment.</span><span class="l-pt">Ainda não há artigos.</span><span class="l-tr">Henüz yazı yok.</span><span class="l-vi">Chưa có bài viết nào.</span><span class="l-id">Belum ada postingan.</span><span class="l-pl">Brak wpisów.</span><span class="l-it">Nessun post ancora.</span><span class="l-ru">Пока нет записей.</span><span class="l-zh">尚無文章。</span></p>
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
  de:['','Jan','Feb','Mär','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez'],
  fr:['','Jan','Fév','Mar','Avr','Mai','Juin','Juil','Août','Sep','Oct','Nov','Déc'],
  pt:['','Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
  tr:['','Oca','Şub','Mar','Nis','May','Haz','Tem','Ağu','Eyl','Eki','Kas','Ara'],
  vi:['','Th1','Th2','Th3','Th4','Th5','Th6','Th7','Th8','Th9','Th10','Th11','Th12']};
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
    const a=document.createElement('a');a.href=(window.BTLang&&BTLang.i18nHref)?BTLang.i18nHref('/blog/'+p.slug,lang):('/blog/'+p.slug+'.php'+(lang==='ko'?'':('?lang='+lang)));a.textContent=p.title[lang]||p.title.en||p.title.ko;
    li.appendChild(a);ul.appendChild(li); });
}
function renderAll(){ renderYears(); renderMonths(); renderDays(); renderPosts(); }
window.onGuideLang = function(){ if(Object.keys(TREE).length) renderAll(); };
if(Object.keys(TREE).length) renderAll();
";
require __DIR__ . '/_guide_foot.php';
