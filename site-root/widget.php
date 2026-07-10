<?php
// BTCtiming.com — Embed Widget v2
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');
header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-cache');

$ALLOWED = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX','AVAX','LINK',
            'DOT','POL','LTC','BCH','NEAR','UNI','APT','ICP','ATOM','XLM',
            'ETC','FIL','HBAR','ARB','OP','VET','INJ','SUI','AAVE','GRT'];

$rawCoins = strtoupper(trim($_GET['coins'] ?? 'BTC'));
$lang     = preg_match('/^[a-z]{2}$/', $_GET['lang'] ?? '') ? $_GET['lang'] : 'en';
$showBlog = ($_GET['blog'] ?? '0') === '1';

$coins = array_values(array_filter(
    array_slice(array_map('trim', explode(',', $rawCoins)), 0, 10),
    fn($c) => in_array($c, $ALLOWED)
));
if (empty($coins)) $coins = ['BTC'];

$blogPosts = [];
if ($showBlog) {
    $metaDir = __DIR__ . '/../blog/meta';
    if (is_dir($metaDir)) {
        $files = glob($metaDir . '/*.json');
        usort($files, fn($a,$b) => filemtime($b) - filemtime($a));
        foreach (array_slice($files, 0, 5) as $f) {
            $slug = basename($f, '.json');
            $m = json_decode(file_get_contents($f), true);
            if (!$m) continue;
            $tKey = 'title_' . $lang; $dKey = 'desc_' . $lang; $tagKey = 'tag_' . $lang;
            $blogPosts[] = [
                'slug'  => $slug,
                'title' => $m[$tKey] ?? $m['title_en'] ?? $m['title_ko'] ?? $slug,
                'desc'  => $m[$dKey] ?? $m['desc_en'] ?? '',
                'tag'   => $m[$tagKey] ?? $m['tag_en'] ?? '',
                'icon'  => $m['icon'] ?? '📄',
                'color' => $m['color'] ?? '#f7931a',
                'date'  => $m['date'] ?? '',
            ];
        }
    }
}

$coinsJson = json_encode($coins);
$sbJson    = $showBlog ? 'true' : 'false';
$langJs    = json_encode($lang);
?>
?><!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#0d0d10;--bg2:#17171c;--bg3:#1e1e25;--bg4:#26262e;--b1:rgba(255,255,255,.08);--t1:#f0f0f2;--t2:#9090a0;--t3:#505060;--or:#f7931a}
html,body{height:100%;background:var(--bg);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;color:var(--t1)}
body{display:flex;flex-direction:column;overflow:hidden}
.wg-head{display:flex;align-items:center;justify-content:space-between;padding:8px 11px 7px;border-bottom:1px solid var(--b1);flex-shrink:0}
.wg-logo{display:flex;align-items:center;gap:6px;text-decoration:none;color:inherit}
.wg-logo-tx{font-size:12px;font-weight:700;color:var(--or)}
.wg-upd{font-size:10px;color:var(--t3)}
.wg-tabs{display:flex;border-bottom:1px solid var(--b1);flex-shrink:0;background:var(--bg2)}
.wg-tab{flex:1;padding:8px;font-size:11.5px;font-weight:600;color:var(--t2);text-align:center;cursor:pointer;border-bottom:2px solid transparent;transition:all .15s;background:var(--bg2)}
.wg-tab:hover{color:var(--t1);background:var(--bg3)}
.wg-tab.on{color:var(--or);border-color:var(--or);background:var(--bg3)}
.wg-body{flex:1;overflow-y:auto}
.coin-row{display:flex;align-items:center;padding:9px 11px;border-bottom:1px solid var(--b1);cursor:pointer;transition:background .12s;gap:8px}
.coin-row:hover,.coin-row.active{background:var(--bg2)}
.cr-sym{font-size:13px;font-weight:700;width:40px;flex-shrink:0}
.cr-price{font-size:11.5px;color:var(--t2);flex:1;font-variant-numeric:tabular-nums}
.cr-chg{font-size:10px;font-weight:600;width:52px;text-align:right;flex-shrink:0;font-variant-numeric:tabular-nums}
.cr-score{font-size:15px;font-weight:800;width:32px;text-align:right;flex-shrink:0;font-variant-numeric:tabular-nums}
.cr-sig{font-size:9px;font-weight:700;width:64px;text-align:right;flex-shrink:0;line-height:1.25}
.cr-arr{font-size:12px;color:var(--t3);flex-shrink:0;transition:transform .2s}
.coin-row.active .cr-arr{transform:rotate(90deg)}
.sk{display:inline-block;height:11px;border-radius:3px;background:var(--bg4);animation:pu 1.2s ease-in-out infinite}
@keyframes pu{0%,100%{opacity:.35}50%{opacity:.9}}
.gp{display:none;background:var(--bg2);border-bottom:1px solid var(--b1);padding:12px 11px}
.gp.open{display:block}
.gp-inner{display:flex;gap:12px;align-items:flex-start}
.gp-gauge{flex-shrink:0;width:110px}
.gp-gauge svg{width:100%;height:auto;display:block}
.gp-center{text-align:center;margin-top:-6px}
.gp-score{font-size:22px;font-weight:900;line-height:1}
.gp-slabel{font-size:9px;color:var(--t2)}
.gp-info{flex:1;min-width:0}
.gp-sig{font-size:11px;font-weight:800;letter-spacing:.3px;margin-bottom:4px}
.gp-desc{font-size:10px;color:var(--t2);line-height:1.45;margin-bottom:8px}
.gp-inds{display:flex;flex-direction:column;gap:4px}
.gp-ind{display:flex;align-items:center;gap:6px;font-size:10px}
.gp-ind-name{color:var(--t2);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.gp-ind-sig{font-size:9px;font-weight:600;flex-shrink:0;text-align:right;width:70px}
.gp-ind-bar-w{width:44px;height:4px;background:var(--bg4);border-radius:2px;flex-shrink:0}
.gp-ind-bar{height:100%;border-radius:2px;transition:width .4s}
.gp-entry{margin-top:8px;padding-top:8px;border-top:1px solid var(--b1)}
.gp-entry-t{font-size:9.5px;font-weight:700;color:var(--t2);margin-bottom:5px}
.gp-steps{display:flex;gap:4px}
.gp-step{flex:1;background:var(--bg3);border-radius:6px;padding:5px 4px;text-align:center}
.gp-step-n{font-size:9px;color:var(--t3);margin-bottom:1px}
.gp-step-pct{font-size:12px;font-weight:700}
.gp-step-c{font-size:8.5px;color:var(--t3);margin-top:1px;line-height:1.3}
.gp-link{display:block;text-align:center;font-size:10px;color:var(--or);text-decoration:none;margin-top:8px;opacity:.7}
.gp-link:hover{opacity:1}
.blog-post{display:flex;align-items:flex-start;gap:9px;padding:9px 11px;border-bottom:1px solid var(--b1);text-decoration:none;color:inherit;transition:background .12s}
.blog-post:hover{background:var(--bg2)}
.bp-icon{font-size:20px;flex-shrink:0;width:28px;text-align:center;margin-top:1px}
.bp-body{flex:1;min-width:0}
.bp-tag{font-size:9px;font-weight:700;margin-bottom:2px}
.bp-title{font-size:11.5px;font-weight:600;line-height:1.35;margin-bottom:3px;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}
.bp-desc{font-size:10px;color:var(--t2);line-height:1.4;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}
.bp-date{font-size:9px;color:var(--t3);margin-top:3px}
.wg-foot{padding:5px 11px;border-top:1px solid var(--b1);display:flex;align-items:center;justify-content:space-between;flex-shrink:0}
.wg-pw{font-size:10px;color:var(--t3)}.wg-pw a{color:var(--or);text-decoration:none}
.wg-rfr{font-size:10px;color:var(--t3);background:none;border:none;cursor:pointer;padding:0}
.wg-rfr:hover{color:var(--t2)}
</style>
</head>
<body>
<div class="wg-head">
  <a class="wg-logo" href="https://btctiming.com" target="_blank" rel="noopener">
    <svg width="18" height="18" viewBox="0 0 64 64"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#26262b" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 41 29" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <span class="wg-logo-tx">BTCtiming</span>
  </a>
  <span class="wg-upd" id="updTime">—</span>
</div>
<?php if ($showBlog): ?>
<div class="wg-tabs">
  <div class="wg-tab on" id="tabScore" onclick="showTab('score')">📊 Scores</div>
  <div class="wg-tab" id="tabBlog" onclick="showTab('blog')">📰 Blog</div>
</div>
<?php endif; ?>
<div class="wg-body" id="bodyScore">
<?php foreach ($coins as $c): ?>
  <div class="coin-row" id="row_<?= $c ?>" onclick="toggleGauge('<?= $c ?>')">
    <span class="cr-sym"><?= htmlspecialchars($c) ?></span>
    <span class="cr-price" id="price_<?= $c ?>"><span class="sk" style="width:60px"></span></span>
    <span class="cr-chg" id="chg_<?= $c ?>"></span>
    <span class="cr-score" id="score_<?= $c ?>">—</span>
    <span class="cr-sig" id="sig_<?= $c ?>">—</span>
    <span class="cr-arr">›</span>
  </div>
  <div class="gp" id="gp_<?= $c ?>">
    <div class="gp-inner">
      <div class="gp-gauge">
        <svg viewBox="0 0 120 70">
          <path d="M10 65 A50 50 0 0 1 110 65" fill="none" stroke="#26262b" stroke-width="12" stroke-linecap="round"/>
          <path d="M10 65 A50 50 0 0 1 110 65" fill="none" stroke="#333" stroke-width="12" stroke-linecap="round" id="gfill_<?= $c ?>" stroke-dasharray="0 157"/>
        </svg>
        <div class="gp-center">
          <div class="gp-score" id="gcs_<?= $c ?>">—</div>
          <div class="gp-slabel">/ 10</div>
        </div>
      </div>
      <div class="gp-info">
        <div class="gp-sig" id="gsig_<?= $c ?>">—</div>
        <div class="gp-desc" id="gdesc_<?= $c ?>"></div>
        <div class="gp-inds" id="ginds_<?= $c ?>"></div>
      </div>
    </div>
    <div class="gp-entry" id="gentry_<?= $c ?>" style="display:none">
      <div class="gp-entry-t">Staged Entry Guide</div>
      <div class="gp-steps" id="gsteps_<?= $c ?>"></div>
    </div>
    <a class="gp-link" href="https://btctiming.com/?coin=<?= htmlspecialchars($c) ?>" target="_blank" rel="noopener">→ Full analysis on btctiming.com</a>
  </div>
<?php endforeach; ?>
</div>
<?php if ($showBlog): ?>
<div class="wg-body" id="bodyBlog" style="display:none">
  <?php if (empty($blogPosts)): ?>
    <div style="padding:20px;text-align:center;color:var(--t3);font-size:11px">No articles available</div>
  <?php else: foreach ($blogPosts as $p): ?>
    <a class="blog-post" href="https://btctiming.com/blog/<?= htmlspecialchars($p['slug']) ?>.php" target="_blank" rel="noopener">
      <span class="bp-icon"><?= $p['icon'] ?></span>
      <div class="bp-body">
        <div class="bp-tag" style="color:<?= htmlspecialchars($p['color']) ?>"><?= htmlspecialchars($p['tag']) ?></div>
        <div class="bp-title"><?= htmlspecialchars($p['title']) ?></div>
        <div class="bp-desc"><?= htmlspecialchars($p['desc']) ?></div>
        <div class="bp-date"><?= htmlspecialchars($p['date']) ?></div>
      </div>
    </a>
  <?php endforeach; endif; ?>
</div>
<?php endif; ?>
<div class="wg-foot">
  <span class="wg-pw">by <a href="https://btctiming.com" target="_blank" rel="noopener">btctiming.com</a></span>
  <button class="wg-rfr" onclick="loadAll()">↻ refresh</button>
</div>
<script>
const COINS=<?= $coinsJson ?>,LANG=<?= $langJs ?>,API=location.origin+'/api.php';
let cache={};
function sigColor(sig){if(!sig)return'#606068';if(sig.includes('FULL'))return'#22c55e';if(sig.includes('ADD'))return'#86efac';if(sig.includes('SPLIT LONG'))return'#a3e635';if(sig.includes('WATCH'))return'#facc15';if(sig.includes('SPLIT EXIT'))return'#fb923c';return'#f87171';}
function fmtP(p){if(p>=10000)return'$'+p.toLocaleString('en',{maximumFractionDigits:0});if(p>=100)return'$'+p.toLocaleString('en',{minimumFractionDigits:2,maximumFractionDigits:2});if(p>=1)return'$'+p.toLocaleString('en',{minimumFractionDigits:3,maximumFractionDigits:3});return'$'+p.toLocaleString('en',{minimumFractionDigits:5,maximumFractionDigits:5});}
const DESC={'FULL LONG':{en:'Historical bottom. Maximum position entry.',ko:'역대급 저점. 목표 비중 100% 전량 진입.'},'ADD LONG':{en:'Strong buy zone. Scale up to 70–100%.',ko:'강한 저점. 목표 비중 70~100% 확대.'},'SPLIT LONG':{en:'Start staged entries. 30–50% initial.',ko:'분할 진입 시작. 목표 비중 30~50%.'},'WATCH':{en:'Neutral zone. Monitor and wait.',ko:'중립 관찰.'},'SPLIT EXIT':{en:'Overheated. Start taking partial profits.',ko:'분할 익절. 고평가·과열 → 보유분 일부 매도.'},'EXIT':{en:'High risk. Consider exiting.',ko:'고위험. 익절 또는 청산 고려.'}};
function getDesc(sig){const d=DESC[sig];if(!d)return'';return LANG==='ko'?d.ko:d.en;}
const ARC=157;
function fillGauge(coin,score){const el=document.getElementById('gfill_'+coin);if(!el)return;const col=score>=7?'#22c55e':score>=5?'#f7931a':score>=3.5?'#fb923c':'#f87171';el.setAttribute('stroke',col);el.setAttribute('stroke-dasharray',(Math.min(Math.max(score/10,0),1)*ARC)+' '+ARC);}
function renderInds(coin,details){const wrap=document.getElementById('ginds_'+coin);if(!wrap||!details)return;const TOP=['mvrv_z','nupl','hash_ribbon','sth_sopr','cb_premium','lth_supply'];const items=TOP.map(k=>details[k]).filter(Boolean).slice(0,4);if(!items.length){wrap.innerHTML='';return;}wrap.innerHTML=items.map(d=>{const pct=d.max>0?Math.min(d.score/d.max*100,100):50;const col=pct>=70?'#22c55e':pct>=40?'#f7931a':'#f87171';return'<div class="gp-ind"><span class="gp-ind-name">'+d.label.replace(/ [—–].*/,'')+'</span><div class="gp-ind-bar-w"><div class="gp-ind-bar" style="width:'+pct+'%;background:'+col+'"></div></div><span class="gp-ind-sig" style="color:'+col+'">'+(d.signal||'')+'</span></div>';}).join('');}
function renderEntry(coin,score){const wrap=document.getElementById('gentry_'+coin),steps=document.getElementById('gsteps_'+coin);if(!wrap||!steps)return;if(score<6.0){wrap.style.display='none';return;}wrap.style.display='';const g=score>=8.0?[{pct:'50%',cond:'Now',col:'#22c55e'},{pct:'30%',cond:'≥7.0',col:'#f7931a'},{pct:'20%',cond:'≥6.0',col:'#facc15'}]:score>=7.0?[{pct:'40%',cond:'Now',col:'#22c55e'},{pct:'40%',cond:'≥7.5',col:'#f7931a'},{pct:'20%',cond:'≥8.0',col:'#facc15'}]:[{pct:'30%',cond:'Now',col:'#22c55e'},{pct:'40%',cond:'≥7.0',col:'#f7931a'},{pct:'30%',cond:'≥8.0',col:'#facc15'}];steps.innerHTML=g.map((s,i)=>'<div class="gp-step"><div class="gp-step-n">Step '+(i+1)+'</div><div class="gp-step-pct" style="color:'+s.col+'">'+s.pct+'</div><div class="gp-step-c">'+s.cond+'</div></div>').join('');}
function updateGP(coin){const d=cache[coin];if(!d)return;const score=d.result?.final??0,sig=d.result?.action??'—',col=sigColor(sig);const gcs=document.getElementById('gcs_'+coin),gsig=document.getElementById('gsig_'+coin),gdesc=document.getElementById('gdesc_'+coin);if(gcs){gcs.textContent=score.toFixed(1);gcs.style.color=col;}if(gsig){gsig.textContent=sig;gsig.style.color=col;}if(gdesc)gdesc.textContent=getDesc(sig);fillGauge(coin,score);renderInds(coin,d.result?.details);renderEntry(coin,score);}
let openCoin=null;
function toggleGauge(coin){if(openCoin&&openCoin!==coin){document.getElementById('gp_'+openCoin)?.classList.remove('open');document.getElementById('row_'+openCoin)?.classList.remove('active');openCoin=null;}const gp=document.getElementById('gp_'+coin),row=document.getElementById('row_'+coin);if(!gp)return;const isOpen=gp.classList.contains('open');gp.classList.toggle('open',!isOpen);row?.classList.toggle('active',!isOpen);openCoin=isOpen?null:coin;if(!isOpen)updateGP(coin);}
function loadCoin(coin){return fetch(API+'?coin='+coin+'&mode=buy').then(r=>r.json()).then(d=>{cache[coin]=d;const score=d.result?.final??0,sig=d.result?.action??'—',price=d.price??0,col=sigColor(sig);const ps=document.getElementById('price_'+coin),sc=document.getElementById('score_'+coin),sg=document.getElementById('sig_'+coin),cg=document.getElementById('chg_'+coin);if(ps)ps.textContent=fmtP(price);if(sc){sc.textContent=score.toFixed(1);sc.style.color=col;}if(sg){sg.textContent=sig;sg.style.color=col;}if(cg){const chg=d.chg24h;if(chg!==null&&chg!==undefined){const sign=chg>0?'+':'';cg.textContent=sign+chg.toFixed(2)+'%';cg.style.color=chg>0?'#22c55e':chg<0?'#f87171':'var(--t3)';}else{cg.textContent='';}}if(openCoin===coin)updateGP(coin);}).catch(()=>{});}
function loadAll(){document.getElementById('updTime').textContent='…';Promise.all(COINS.map(loadCoin)).then(()=>{const n=new Date();document.getElementById('updTime').textContent=n.toLocaleTimeString('en',{hour:'2-digit',minute:'2-digit'});});}
function showTab(t){document.getElementById('bodyScore').style.display=t==='score'?'':'none';const bb=document.getElementById('bodyBlog');if(bb)bb.style.display=t==='blog'?'':'none';document.getElementById('tabScore')?.classList.toggle('on',t==='score');document.getElementById('tabBlog')?.classList.toggle('on',t==='blog');}
loadAll();setInterval(loadAll,60000);
</script>
</body>
</html>