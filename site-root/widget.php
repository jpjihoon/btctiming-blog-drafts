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
$isPwa    = ($_GET['pwa'] ?? '0') === '1';

$coins = array_values(array_filter(
    array_slice(array_map('trim', explode(',', $rawCoins)), 0, 10),
    fn($c) => in_array($c, $ALLOWED)
));
if (empty($coins)) $coins = ['BTC'];

$blogPosts = [];
if ($showBlog) {
    // widget.php는 /www/ 에 위치, 블로그 메타는 /www/blog/meta/*.json
    $metaDir = __DIR__ . '/blog/meta';
    if (!is_dir($metaDir)) { $metaDir = __DIR__ . '/../blog/meta'; } // 폴백
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
$pwaJson   = $isPwa ? 'true' : 'false';
$langJs    = json_encode($lang);
$allowedJson = json_encode($ALLOWED);
?><!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="manifest" href="/widget-manifest.json">
<meta name="theme-color" content="#0d0d10">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#0d0d10;--bg2:#17171c;--bg3:#1e1e25;--bg4:#26262e;--b1:rgba(255,255,255,.08);--t1:#f0f0f2;--t2:#9090a0;--t3:#505060;--or:#f7931a;--green:#22c55e;--b2:rgba(255,255,255,.14)}
html{background:var(--bg)}body{background:var(--bg);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;color:var(--t1)}
body{display:flex;flex-direction:column}
.wg-head{display:flex;align-items:center;justify-content:space-between;padding:8px 11px 7px;border-bottom:1px solid var(--b1);flex-shrink:0}
.wg-logo{display:flex;align-items:center;gap:6px;text-decoration:none;color:inherit}
.wg-logo-tx{font-size:12px;font-weight:700;color:var(--or)}
.wg-upd{font-size:10px;color:var(--t3)}
.wg-tabs{display:flex;border-bottom:1px solid var(--b1);flex-shrink:0;background:var(--bg2)}
.wg-tab{flex:1;padding:8px;font-size:11.5px;font-weight:600;color:var(--t2);text-align:center;cursor:pointer;border-bottom:2px solid transparent;transition:all .15s;background:var(--bg2)}
.wg-tab:hover{color:var(--t1);background:var(--bg3)}
.wg-tab.on{color:var(--or);border-color:var(--or);background:var(--bg3)}
.wg-body{flex:none}
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
/* ── responsive: allow the app/window to shrink horizontally ── */
html,body{min-width:0}
body{overflow-x:hidden}
.wg-hd-r{display:flex;align-items:center;gap:8px;min-width:0;flex-shrink:0}
.wg-gear{background:none;border:none;color:var(--t2);font-size:15px;line-height:1;cursor:pointer;padding:0}
.wg-gear:hover{color:var(--t1)}
.cr-price{min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
@media (max-width:360px){
  .coin-row{gap:6px;padding:8px 8px}
  .cr-chg{display:none}
  .cr-sym{width:36px;font-size:12px}
  .cr-sig{width:58px;font-size:8.5px}
  .cr-score{width:28px;font-size:14px}
  .wg-logo-tx{display:none}
  .gp-inner{gap:8px}.gp-gauge{width:92px}
}
@media (max-width:280px){ .cr-sig{display:none} .gp-steps{flex-wrap:wrap} }
/* ── in-app settings (dashboard design) ── */
.wg-set{padding:12px 12px 16px}
.wg-set-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:6px}
.wg-set-title{font-size:13px;font-weight:800}
.wg-set-x{background:none;border:none;color:var(--t2);font-size:15px;cursor:pointer;line-height:1}
.wg-set-x:hover{color:var(--t1)}
.sset-label{font-size:10px;font-weight:600;color:var(--t2);margin:12px 0 6px}
.wg-srch{width:100%;padding:8px 10px;background:var(--bg3);border:1px solid var(--b2);border-radius:8px;color:var(--t1);font-size:12px;outline:none}
.wg-srch:focus{border-color:var(--or)}
.wg-res{display:none;position:absolute;top:100%;left:0;right:0;margin-top:4px;background:var(--bg2);border:1px solid var(--b2);border-radius:8px;max-height:180px;overflow-y:auto;z-index:10;box-shadow:0 8px 24px rgba(0,0,0,.5)}
.wg-res-item{padding:8px 11px;font-size:12px;color:var(--t1);cursor:pointer;border-bottom:1px solid var(--b1)}
.wg-res-item:hover{background:var(--bg3)}
.wg-coin-grid{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:4px}
.wg-coin-chip{padding:5px 11px;border-radius:20px;font-size:11px;font-weight:600;cursor:pointer;border:1px solid var(--b1);background:var(--bg3);color:var(--t2);transition:all .15s;user-select:none}
.wg-coin-chip.on{background:var(--bg4);color:var(--or);border-color:var(--or);box-shadow:0 0 0 1px var(--or)}
.wg-count{font-size:10px;color:var(--t3);margin-top:5px}
.wg-opt-row{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:6px 0}
.wg-opt-row span{font-size:11.5px;color:var(--t2)}
.toggle{width:36px;height:20px;border-radius:10px;background:var(--bg4);border:1px solid var(--b2);cursor:pointer;position:relative;transition:background .2s;flex-shrink:0}
.toggle.on{background:var(--green)}
.toggle::after{content:'';position:absolute;top:2px;left:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:transform .2s}
.toggle.on::after{transform:translateX(16px)}
.wg-apply{width:100%;margin-top:16px;background:var(--or);color:#0a0a0a;border:none;border-radius:8px;padding:11px;font-size:13px;font-weight:800;cursor:pointer}
.wg-apply:hover{opacity:.92}
</style>
</head>
<body>
<?php if ($isPwa): ?>
<div id="pwaInstallBanner" style="background:linear-gradient(135deg,#f7931a,#e8820a);color:#0a0a0a;padding:12px 14px;font-size:12.5px;line-height:1.5;text-align:center">
  <div style="font-weight:800;margin-bottom:6px">💻 <?= $lang==='ko'?'이 위젯을 앱으로 설치':'Install this widget as an app' ?></div>
  <div style="font-size:11px;opacity:.85;margin-bottom:9px"><?= $lang==='ko'?'아래 버튼을 누르면 이 위젯만 독립 앱 창으로 설치됩니다 (사이트 전체가 아님).':'Installs only this widget as a standalone app (not the whole site).' ?></div>
  <button id="pwaBigInstall" style="background:#0a0a0a;color:#f7931a;border:none;border-radius:8px;padding:9px 20px;font-size:12.5px;font-weight:800;cursor:pointer">💻 <?= $lang==='ko'?'앱으로 설치':'Install app' ?></button>
  <div style="font-size:10px;opacity:.75;margin-top:8px"><?= $lang==='ko'?'※ Chrome·Edge에서 설치할 수 있습니다. 다른 브라우저(웨일·Safari 등)는 앱 설치가 제한될 수 있습니다.':'※ Works on Chrome/Edge. Other browsers may not support app install.' ?></div>
</div>
<?php endif; ?>
<div class="wg-head">
  <a class="wg-logo wg-extlink" href="https://btctiming.com<?= $lang!=='ko'?'?lang='.$lang:'' ?>" target="_top" rel="noopener">
    <svg width="18" height="18" viewBox="0 0 64 64"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 41 29" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <span class="wg-logo-tx">BTCtiming</span>
  </a>
  <div class="wg-hd-r">
  <span class="wg-upd" id="updTime">—</span>
  <button id="wgGear" class="wg-gear" aria-label="settings" style="display:none">⚙</button>
  <button id="wgPwaInstall" style="display:none;margin-left:8px;background:#f7931a;color:#0a0a0a;border:none;border-radius:6px;padding:4px 10px;font-size:11px;font-weight:700;cursor:pointer">💻 <span id="wgPwaInstallTx">Install</span></button>
  </div>
</div>
<?php if ($showBlog): ?>
<div class="wg-tabs">
  <div class="wg-tab on" id="tabScore" onclick="showTab('score')">📊 Scores</div>
  <div class="wg-tab" id="tabBlog" onclick="showTab('blog')">📰 Blog</div>
</div>
<?php endif; ?>
<div class="wg-set" id="wgSettings" style="display:none">
  <div class="wg-set-hd"><span class="wg-set-title" id="wsTitle">Settings</span><button class="wg-set-x" id="wsClose">✕</button></div>
  <div class="sset-label" id="wsCoinsLbl">My coins (favorites)</div>
  <div style="position:relative;margin-bottom:8px">
    <input type="text" id="wsSearch" class="wg-srch" autocomplete="off" placeholder="Search to add a coin">
    <div class="wg-res" id="wsResults"></div>
  </div>
  <div class="wg-coin-grid" id="wsChips"></div>
  <div class="wg-count" id="wsCount"></div>
  <div class="sset-label" id="wsOptLbl">Options</div>
  <div class="wg-opt-row"><span id="wsBlogLbl">Show latest blog posts</span><div class="toggle" id="wsBlogToggle" role="switch" tabindex="0" aria-label="blog"></div></div>
  <button class="wg-apply" id="wsApply">Apply</button>
</div>
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
    <a class="gp-link wg-extlink" href="https://btctiming.com/?coin=<?= htmlspecialchars($c) ?><?= $lang!=='ko'?'&lang='.$lang:'' ?>" target="_top" rel="noopener">→ Full analysis on btctiming.com</a>
  </div>
<?php endforeach; ?>
</div>
<?php if ($showBlog): ?>
<div class="wg-body" id="bodyBlog" style="display:none;max-height:168px;overflow-y:auto">
  <?php if (empty($blogPosts)): ?>
    <div style="padding:20px;text-align:center;color:var(--t3);font-size:11px">No articles available</div>
  <?php else: foreach ($blogPosts as $p): ?>
    <a class="blog-post wg-extlink" href="https://btctiming.com/blog/<?= htmlspecialchars($p['slug']) ?>.php<?= $lang!=='ko'?'?lang='.$lang:'' ?>" target="_top" rel="noopener">
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
  <span class="wg-pw">by <a class="wg-extlink" href="https://btctiming.com<?= $lang!=='ko'?'?lang='.$lang:'' ?>" target="_top" rel="noopener">btctiming.com</a></span>
  <button class="wg-rfr" onclick="loadAll()">↻ refresh</button>
</div>
<script>
const COINS=<?= $coinsJson ?>,LANG=<?= $langJs ?>,API=location.origin+'/api.php';
const IS_PWA=<?= $pwaJson ?>;
const ALLOWED=<?= $allowedJson ?>;
const SHOW_BLOG=<?= $sbJson ?>;
(function(){
  try{
    var params=new URLSearchParams(location.search);
    if(IS_PWA && !params.get('coins')){
      var raw=localStorage.getItem('btc_wg_coins');
      var coins=null;
      if(raw){ var arr=JSON.parse(raw); if(Array.isArray(arr)&&arr.length) coins=arr.join(','); }
      if(!coins) coins='BTC,ETH,SOL,XRP,DOGE';
      var lang=localStorage.getItem('blogLang')||LANG||'ko';
      var blog=localStorage.getItem('btc_wg_blog')==='1'?'&blog=1':'';
      location.replace('/widget.php?coins='+encodeURIComponent(coins)+'&lang='+lang+blog+'&pwa=1');
    }
  }catch(e){}
})();
let _wgInstallPrompt=null;
window.addEventListener('beforeinstallprompt',function(e){
  e.preventDefault(); _wgInstallPrompt=e;
  if(IS_PWA){ var b=document.getElementById('wgPwaInstall'); if(b) b.style.display=''; }
});
function doWidgetInstall(){
  if(_wgInstallPrompt){
    _wgInstallPrompt.prompt();
    _wgInstallPrompt.userChoice.finally(function(){_wgInstallPrompt=null;});
  } else {
    var isKo=LANG==='ko';
    alert(isKo
      ? '이 위젯을 앱으로 설치하려면:\n\n① 주소창 오른쪽 끝의 설치 아이콘(⊕ 또는 모니터 모양)을 클릭\n   (안 보이면 브라우저 ⋮ 메뉴 → "앱" → "이 페이지를 앱으로 설치")\n② "설치" 클릭\n\n지금 이 페이지에서 설치해야 위젯만 앱으로 뜹니다.\n(홈에서 설치하면 사이트 전체가 앱이 됩니다.)'
      : 'To install THIS widget as an app:\n\n1. Click the install icon at the right of the address bar\n   (or menu -> Apps -> Install this page as an app)\n2. Click "Install"\n\nInstall from THIS page so only the widget becomes an app.');
  }
}
window.addEventListener('DOMContentLoaded',function(){
  var L={ko:'앱 설치',en:'Install',ja:'インストール',es:'Instalar',de:'Installieren',fr:'Installer',pt:'Instalar',tr:'Kur',vi:'Cài đặt'};
  var b=document.getElementById('wgPwaInstall');
  if(b){ var tx=document.getElementById('wgPwaInstallTx'); if(tx) tx.textContent=L[LANG]||'Install'; b.onclick=doWidgetInstall; }
  var big=document.getElementById('pwaBigInstall');
  if(big){ big.onclick=doWidgetInstall; }
});
window.addEventListener('appinstalled',function(){ var bn=document.getElementById('pwaInstallBanner'); if(bn) bn.style.display='none'; });
const LOCALE={ko:'ko-KR',en:'en-US',ja:'ja-JP',es:'es-ES',de:'de-DE',fr:'fr-FR',pt:'pt-BR',tr:'tr-TR',vi:'vi-VN'}[LANG]||'en-US';
let cache={};
function sigColor(sig){if(!sig)return'#606068';if(sig.includes('FULL'))return'#22c55e';if(sig.includes('ADD'))return'#86efac';if(sig.includes('SPLIT LONG'))return'#a3e635';if(sig.includes('WATCH'))return'#facc15';if(sig.includes('SPLIT EXIT'))return'#fb923c';return'#f87171';}
function fmtP(p){if(p>=10000)return'$'+p.toLocaleString(LOCALE,{maximumFractionDigits:0});if(p>=100)return'$'+p.toLocaleString(LOCALE,{minimumFractionDigits:2,maximumFractionDigits:2});if(p>=1)return'$'+p.toLocaleString(LOCALE,{minimumFractionDigits:3,maximumFractionDigits:3});return'$'+p.toLocaleString(LOCALE,{minimumFractionDigits:5,maximumFractionDigits:5});}
const DESC={
'FULL LONG':{ko:'역대급 저점. 목표 비중 100% 전량 진입.',en:'Historical bottom. Maximum position entry.',ja:'歴史的な底値。目標比率100%で全力エントリー。',es:'Suelo histórico. Entrada de posición máxima.',de:'Historischer Boden. Maximaler Positionseinstieg.',fr:'Plancher historique. Entrée maximale.',pt:'Fundo histórico. Entrada de posição máxima.',tr:'Tarihi dip. Maksimum pozisyon girişi.',vi:'Đáy lịch sử. Vào lệnh tối đa.'},
'ADD LONG':{ko:'강한 저점. 목표 비중 70~100% 확대.',en:'Strong buy zone. Scale up to 70–100%.',ja:'強い買い場。目標比率70〜100%へ拡大。',es:'Zona de compra fuerte. Aumentar a 70–100%.',de:'Starke Kaufzone. Auf 70–100% erhöhen.',fr:'Zone d\'achat forte. Monter à 70–100%.',pt:'Zona de compra forte. Aumentar para 70–100%.',tr:'Güçlü alım bölgesi. %70–100\'e çıkar.',vi:'Vùng mua mạnh. Tăng lên 70–100%.'},
'SPLIT LONG':{ko:'분할 진입 시작. 목표 비중 30~50%.',en:'Start staged entries. 30–50% initial.',ja:'分割エントリー開始。目標比率30〜50%。',es:'Inicia entradas escalonadas. 30–50%.',de:'Gestaffelter Einstieg. 30–50% anfangs.',fr:'Débuter les entrées échelonnées. 30–50%.',pt:'Iniciar entradas em etapas. 30–50%.',tr:'Kademeli girişe başla. %30–50.',vi:'Bắt đầu vào lệnh từng phần. 30–50%.'},
'WATCH':{ko:'중립 관찰.',en:'Neutral zone. Monitor and wait.',ja:'中立ゾーン。様子見。',es:'Zona neutral. Observar y esperar.',de:'Neutrale Zone. Beobachten.',fr:'Zone neutre. Observer.',pt:'Zona neutra. Observar.',tr:'Nötr bölge. İzle ve bekle.',vi:'Vùng trung lập. Quan sát.'},
'SPLIT EXIT':{ko:'분할 익절. 고평가·과열 → 보유분 일부 매도.',en:'Overheated. Start taking partial profits.',ja:'過熱。一部利益確定を開始。',es:'Sobrecalentado. Toma ganancias parciales.',de:'Überhitzt. Teilgewinne mitnehmen.',fr:'Surchauffe. Prendre des profits partiels.',pt:'Sobreaquecido. Realize lucros parciais.',tr:'Aşırı ısındı. Kısmi kâr al.',vi:'Quá nóng. Chốt lời một phần.'},
'EXIT':{ko:'고위험. 익절 또는 청산 고려.',en:'High risk. Consider exiting.',ja:'高リスク。利確・撤退を検討。',es:'Alto riesgo. Considera salir.',de:'Hohes Risiko. Ausstieg erwägen.',fr:'Risque élevé. Envisager la sortie.',pt:'Alto risco. Considere sair.',tr:'Yüksek risk. Çıkışı düşün.',vi:'Rủi ro cao. Cân nhắc thoát.'}};
function getDesc(sig){const d=DESC[sig];if(!d)return'';return d[LANG]||d.en;}
const ARC=157;
function fillGauge(coin,score){const el=document.getElementById('gfill_'+coin);if(!el)return;const col=score>=7?'#22c55e':score>=5?'#f7931a':score>=3.5?'#fb923c':'#f87171';el.setAttribute('stroke',col);el.setAttribute('stroke-dasharray',(Math.min(Math.max(score/10,0),1)*ARC)+' '+ARC);}
function renderInds(coin,details){const wrap=document.getElementById('ginds_'+coin);if(!wrap||!details)return;const TOP=['mvrv_z','nupl','hash_ribbon','sth_sopr','cb_premium','lth_supply'];const items=TOP.map(k=>details[k]).filter(Boolean).slice(0,4);if(!items.length){wrap.innerHTML='';return;}wrap.innerHTML=items.map(d=>{const pct=d.max>0?Math.min(d.score/d.max*100,100):50;const col=pct>=70?'#22c55e':pct>=40?'#f7931a':'#f87171';return'<div class="gp-ind"><span class="gp-ind-name">'+d.label.replace(/ [—–].*/,'')+'</span><div class="gp-ind-bar-w"><div class="gp-ind-bar" style="width:'+pct+'%;background:'+col+'"></div></div><span class="gp-ind-sig" style="color:'+col+'">'+(d.signal||'')+'</span></div>';}).join('');}
function renderEntry(coin,score){const wrap=document.getElementById('gentry_'+coin),steps=document.getElementById('gsteps_'+coin);if(!wrap||!steps)return;if(score<6.0){wrap.style.display='none';return;}wrap.style.display='';const g=score>=8.0?[{pct:'50%',cond:'Now',col:'#22c55e'},{pct:'30%',cond:'≥7.0',col:'#f7931a'},{pct:'20%',cond:'≥6.0',col:'#facc15'}]:score>=7.0?[{pct:'40%',cond:'Now',col:'#22c55e'},{pct:'40%',cond:'≥7.5',col:'#f7931a'},{pct:'20%',cond:'≥8.0',col:'#facc15'}]:[{pct:'30%',cond:'Now',col:'#22c55e'},{pct:'40%',cond:'≥7.0',col:'#f7931a'},{pct:'30%',cond:'≥8.0',col:'#facc15'}];steps.innerHTML=g.map((s,i)=>'<div class="gp-step"><div class="gp-step-n">Step '+(i+1)+'</div><div class="gp-step-pct" style="color:'+s.col+'">'+s.pct+'</div><div class="gp-step-c">'+s.cond+'</div></div>').join('');}
function updateGP(coin){const d=cache[coin];if(!d)return;const score=d.result?.final??0,sig=d.result?.action??'—',col=sigColor(sig);const gcs=document.getElementById('gcs_'+coin),gsig=document.getElementById('gsig_'+coin),gdesc=document.getElementById('gdesc_'+coin);if(gcs){gcs.textContent=score.toFixed(1);gcs.style.color=col;}if(gsig){gsig.textContent=sig;gsig.style.color=col;}if(gdesc)gdesc.textContent=getDesc(sig);fillGauge(coin,score);renderInds(coin,d.result?.details);renderEntry(coin,score);}
let openCoin=null;
function toggleGauge(coin){if(openCoin&&openCoin!==coin){document.getElementById('gp_'+openCoin)?.classList.remove('open');document.getElementById('row_'+openCoin)?.classList.remove('active');openCoin=null;}const gp=document.getElementById('gp_'+coin),row=document.getElementById('row_'+coin);if(!gp)return;const isOpen=gp.classList.contains('open');gp.classList.toggle('open',!isOpen);row?.classList.toggle('active',!isOpen);openCoin=isOpen?null:coin;if(!isOpen)updateGP(coin);postHeight();setTimeout(postHeight,60);setTimeout(postHeight,250);}
// 부모(플로팅 패널/임베드)에 현재 문서 높이 전달 → iframe이 내용에 맞게 커짐
function postHeight(){try{const h=document.body.scrollHeight;parent.postMessage({btctimingWidgetHeight:h},'*');}catch(e){}}
// body 크기 변화를 자동 감지해 높이 전송 (게이지 펼침/블로그 전환 등 모든 변화 대응)
if(window.ResizeObserver){try{new ResizeObserver(function(){postHeight();}).observe(document.body);}catch(e){}}
function loadCoin(coin){return fetch(API+'?coin='+coin+'&mode=buy').then(r=>r.json()).then(d=>{cache[coin]=d;const score=d.result?.final??0,sig=d.result?.action??'—',price=d.price??0,col=sigColor(sig);const ps=document.getElementById('price_'+coin),sc=document.getElementById('score_'+coin),sg=document.getElementById('sig_'+coin),cg=document.getElementById('chg_'+coin);if(ps)ps.textContent=fmtP(price);if(sc){sc.textContent=score.toFixed(1);sc.style.color=col;}if(sg){sg.textContent=sig;sg.style.color=col;}if(cg){const chg=d.chg24h;if(chg!==null&&chg!==undefined){const sign=chg>0?'+':'';cg.textContent=sign+chg.toFixed(2)+'%';cg.style.color=chg>0?'#22c55e':chg<0?'#f87171':'var(--t3)';}else{cg.textContent='';}}if(openCoin===coin)updateGP(coin);}).catch(()=>{});}
function loadAll(){document.getElementById('updTime').textContent='…';Promise.all(COINS.map(loadCoin)).then(()=>{const n=new Date();document.getElementById('updTime').textContent=n.toLocaleTimeString(LOCALE,{hour:'2-digit',minute:'2-digit'});postHeight();});}
function showTab(t){document.getElementById('bodyScore').style.display=t==='score'?'':'none';const bb=document.getElementById('bodyBlog');if(bb)bb.style.display=t==='blog'?'':'none';document.getElementById('tabScore')?.classList.toggle('on',t==='score');document.getElementById('tabBlog')?.classList.toggle('on',t==='blog');postHeight();setTimeout(postHeight,60);}
loadAll();setInterval(loadAll,60000);

// 앱(standalone)으로 실행 중인지 판정
function wgIsStandalone(){
  try{
    return (window.matchMedia && (window.matchMedia('(display-mode: standalone)').matches
        || window.matchMedia('(display-mode: minimal-ui)').matches
        || window.matchMedia('(display-mode: window-controls-overlay)').matches))
      || navigator.standalone===true;
  }catch(e){ return false; }
}
function wgHideBanner(){ var bn=document.getElementById('pwaInstallBanner'); if(bn) bn.style.display='none'; }
if(wgIsStandalone()) wgHideBanner();
window.addEventListener('DOMContentLoaded',function(){ if(wgIsStandalone()) wgHideBanner(); });
window.addEventListener('load',function(){ if(wgIsStandalone()) wgHideBanner(); });
try{ window.matchMedia('(display-mode: standalone)').addEventListener('change',function(e){ if(e.matches) wgHideBanner(); }); }catch(e){}

window.addEventListener('DOMContentLoaded',function(){
  var standalone = wgIsStandalone();
  var inIframe = false; try{ inIframe = (window.self !== window.top); }catch(e){ inIframe = true; }
  function withLang(href){
    try{
      var u = new URL(href, location.origin);
      if(LANG && LANG!=='ko') u.searchParams.set('lang', LANG);
      else u.searchParams.delete('lang');
      return u.toString();
    }catch(e){ return href; }
  }
  document.querySelectorAll('a.wg-extlink').forEach(function(a){
    try{ a.setAttribute('href', withLang(a.getAttribute('href'))); }catch(e){}
    if(standalone || inIframe){
      a.setAttribute('target','_blank');
      a.setAttribute('rel','noopener noreferrer');
    }
  });
  if(inIframe && !standalone){
    document.addEventListener('click',function(e){
      var a = e.target.closest && e.target.closest('a.wg-extlink');
      if(a){ e.preventDefault(); window.open(withLang(a.getAttribute('href')), '_blank', 'noopener'); }
    });
  }
});
window.addEventListener('load',function(){postHeight();setTimeout(postHeight,150);setTimeout(postHeight,500);});
if('serviceWorker' in navigator){window.addEventListener('load',function(){navigator.serviceWorker.register('/sw.js',{scope:'/widget.php'}).catch(function(){navigator.serviceWorker.register('/sw.js').catch(function(){});});});}

/* ── Widget in-app Settings (dashboard-style: search add + chips + toggle) ── */
(function(){
  var SL={
    title:{ko:'설정',en:'Settings',ja:'設定',es:'Ajustes',de:'Einstellungen',fr:'Réglages',pt:'Ajustes',tr:'Ayarlar',vi:'Cài đặt'},
    mycoins:{ko:'내 코인 (즐겨찾기)',en:'My coins (favorites)',ja:'マイコイン（お気に入り）',es:'Mis monedas (favoritas)',de:'Meine Coins (Favoriten)',fr:'Mes cryptos (favoris)',pt:'Minhas moedas (favoritas)',tr:'Coinlerim (favoriler)',vi:'Coin của tôi (yêu thích)'},
    ph:{ko:'🔍 코인 검색해서 추가 (ETH, SOL…)',en:'🔍 Search to add a coin (ETH, SOL, PEPE…)',ja:'🔍 コインを検索して追加 (ETH, SOL…)',es:'🔍 Busca para añadir (ETH, SOL…)',de:'🔍 Coin suchen & hinzufügen',fr:'🔍 Rechercher pour ajouter',pt:'🔍 Buscar para adicionar',tr:'🔍 Coin ara ve ekle',vi:'🔍 Tìm coin để thêm'},
    options:{ko:'옵션',en:'Options',ja:'オプション',es:'Opciones',de:'Optionen',fr:'Options',pt:'Opções',tr:'Seçenekler',vi:'Tùy chọn'},
    blog:{ko:'최신 블로그 글 표시',en:'Show latest blog posts',ja:'最新のブログ記事を表示',es:'Mostrar últimos artículos',de:'Neueste Blogposts anzeigen',fr:'Afficher les derniers articles',pt:'Mostrar posts recentes',tr:'Son blog yazılarını göster',vi:'Hiện bài blog mới nhất'},
    apply:{ko:'적용',en:'Apply',ja:'適用',es:'Aplicar',de:'Übernehmen',fr:'Appliquer',pt:'Aplicar',tr:'Uygula',vi:'Áp dụng'},
    add:{ko:'+ 추가',en:'+ add',ja:'+ 追加',es:'+ añadir',de:'+ hinzufügen',fr:'+ ajouter',pt:'+ adicionar',tr:'+ ekle',vi:'+ thêm'},
    none:{ko:'일치 없음 또는 이미 추가됨',en:'No match, or already added.',ja:'該当なし／追加済み',es:'Sin resultados o ya añadido',de:'Kein Treffer / bereits hinzugefügt',fr:'Aucun résultat / déjà ajouté',pt:'Sem correspondência / já adicionado',tr:'Eşleşme yok / zaten ekli',vi:'Không khớp / đã thêm'},
    allin:{ko:'인기 코인 모두 추가됨',en:'All popular coins added.',ja:'人気コインは追加済み',es:'Todas añadidas',de:'Alle hinzugefügt',fr:'Toutes ajoutées',pt:'Todas adicionadas',tr:'Hepsi eklendi',vi:'Đã thêm hết'},
    max:{ko:'최대 10개',en:'Max 10 coins',ja:'最大10',es:'Máx. 10',de:'Max. 10',fr:'Max 10',pt:'Máx. 10',tr:'En fazla 10',vi:'Tối đa 10'}
  };
  var CNT={ko:function(n){return n+' / 10개 · 탭하면 삭제';},en:function(n){return n+' / 10 coins · tap a coin to remove';},ja:function(n){return n+' / 10 · タップで削除';},es:function(n){return n+' / 10 · toca para quitar';},de:function(n){return n+' / 10 · zum Entfernen tippen';},fr:function(n){return n+' / 10 · touchez pour retirer';},pt:function(n){return n+' / 10 · toque para remover';},tr:function(n){return n+' / 10 · kaldırmak için dokun';},vi:function(n){return n+' / 10 · chạm để xóa';}};
  var POP=['BTC','ETH','SOL','XRP','DOGE','ADA','BNB','AVAX','LINK','DOT','TRX','LTC'];
  function slg(k){var o=SL[k];return (o&&(o[LANG]||o.en))||'';}
  function cnt(n){var f=CNT[LANG]||CNT.en;return f(n);}
  function el(id){return document.getElementById(id);}
  var wsSel=Array.isArray(COINS)?COINS.slice():[];
  var wsBlog=!!SHOW_BLOG;
  function renderChips(){
    var g=el('wsChips');
    if(!wsSel.length){ g.innerHTML='<div style="font-size:10.5px;color:var(--t3);padding:4px 0">—</div>'; }
    else { g.innerHTML=wsSel.map(function(c){return '<button class="wg-coin-chip on" data-x="'+c+'" title="remove '+c+'">'+c+' <span style="opacity:.6;margin-left:2px">\u00d7</span></button>';}).join(''); }
    el('wsCount').textContent=cnt(wsSel.length);
  }
  function filter(val){
    var box=el('wsResults'); var q=(val||'').toUpperCase().trim(); var m;
    if(!q){ m=POP.filter(function(c){return ALLOWED.indexOf(c)>=0 && wsSel.indexOf(c)<0;}).slice(0,8); }
    else { m=ALLOWED.filter(function(c){return c.indexOf(q)>=0 && wsSel.indexOf(c)<0;}).slice(0,8); }
    if(!m.length){ box.innerHTML='<div class="wg-res-item" style="cursor:default;color:var(--t3)">'+(q?slg('none'):slg('allin'))+'</div>'; box.style.display='block'; return; }
    box.innerHTML=m.map(function(c){return '<div class="wg-res-item" data-add="'+c+'"><span style="font-weight:700">'+c+'</span> <span style="color:var(--or);font-size:10px;margin-left:4px">'+slg('add')+'</span></div>';}).join('');
    box.style.display='block';
  }
  function addCoin(c){ if(wsSel.indexOf(c)>=0)return; if(wsSel.length>=10){alert(slg('max'));return;} wsSel.push(c); var s=el('wsSearch'); if(s)s.value=''; el('wsResults').style.display='none'; renderChips(); }
  function removeCoin(c){ if(wsSel.length<=1)return; var i=wsSel.indexOf(c); if(i>=0){wsSel.splice(i,1);renderChips();} }
  function labels(){
    el('wsTitle').textContent=slg('title'); el('wsCoinsLbl').textContent=slg('mycoins');
    el('wsOptLbl').textContent=slg('options'); el('wsBlogLbl').textContent=slg('blog');
    el('wsApply').textContent=slg('apply'); el('wsSearch').placeholder=slg('ph');
    el('wsBlogToggle').classList.toggle('on',wsBlog);
  }
  function wsOpen(){ labels(); renderChips(); el('wgSettings').style.display=''; var tb=document.querySelector('.wg-tabs'); if(tb)tb.style.display='none'; el('bodyScore').style.display='none'; var bb=el('bodyBlog'); if(bb)bb.style.display='none'; var ft=document.querySelector('.wg-foot'); if(ft)ft.style.display='none'; postHeight(); setTimeout(postHeight,60); setTimeout(postHeight,220); }
  function wsCloseFn(){ el('wgSettings').style.display='none'; el('wsResults').style.display='none'; var tb=document.querySelector('.wg-tabs'); if(tb)tb.style.display=''; el('bodyScore').style.display=''; var ft=document.querySelector('.wg-foot'); if(ft)ft.style.display=''; if(typeof showTab==='function') showTab('score'); postHeight(); setTimeout(postHeight,60); }
  function wsApplyFn(){
    try{ localStorage.setItem('btc_wg_coins',JSON.stringify(wsSel)); localStorage.setItem('btc_wg_blog',wsBlog?'1':'0'); }catch(e){}
    var qs='coins='+encodeURIComponent(wsSel.join(','))+'&lang='+encodeURIComponent(LANG||'en');
    if(wsBlog) qs+='&blog=1'; if(IS_PWA) qs+='&pwa=1';
    location.replace('/widget.php?'+qs);
  }
  document.addEventListener('DOMContentLoaded',function(){
    var g=el('wgGear');
    var inIframe=false; try{inIframe=(window.self!==window.top);}catch(e){inIframe=true;}
    var sameOrigin=true; if(inIframe){ try{ void window.top.location.href; }catch(e){ sameOrigin=false; } }
    if(g && (IS_PWA || !inIframe || sameOrigin)){ g.style.display=''; g.title=slg('title'); g.onclick=wsOpen; }
    var x=el('wsClose'); if(x)x.onclick=wsCloseFn;
    var ap=el('wsApply'); if(ap)ap.onclick=wsApplyFn;
    var tg=el('wsBlogToggle'); if(tg)tg.onclick=function(){ tg.classList.toggle('on'); wsBlog=tg.classList.contains('on'); };
    var s=el('wsSearch'); if(s){ s.addEventListener('input',function(){filter(s.value);}); s.addEventListener('focus',function(){filter(s.value);}); s.addEventListener('blur',function(){setTimeout(function(){var b=el('wsResults');if(b)b.style.display='none';},180);}); }
    var res=el('wsResults'); if(res)res.addEventListener('mousedown',function(e){var it=e.target.closest?e.target.closest('[data-add]'):null; if(it){e.preventDefault();addCoin(it.getAttribute('data-add'));}});
    var ch=el('wsChips'); if(ch)ch.addEventListener('click',function(e){var b=e.target.closest?e.target.closest('[data-x]'):null; if(b)removeCoin(b.getAttribute('data-x'));});
  });
})();
</script>
</body>
</html>