<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — Embed Widget
// 사용법: <iframe src="https://btctiming.com/widget.php?coins=BTC,ETH,SOL" ...>
// 파라미터:
//   coins=BTC,ETH,SOL  표시할 코인 (쉼표 구분, 최대 10개, 기본 BTC)
//   lang=ko            언어 (ko/en/ja/es/de/fr/pt/tr/vi, 기본 en)
// ═══════════════════════════════════════════════════════

// iframe embed 허용
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');
header('Content-Type: text/html; charset=utf-8');

// 파라미터 파싱
$rawCoins = isset($_GET['coins']) ? strtoupper(trim($_GET['coins'])) : 'BTC';
$lang     = isset($_GET['lang']) && preg_match('/^[a-z]{2}$/', $_GET['lang']) ? $_GET['lang'] : 'en';

// 허용 코인 목록 (config에서 가져올 수도 있지만, 위젯은 독립적으로)
$ALLOWED = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX','AVAX','LINK',
            'DOT','POL','LTC','BCH','NEAR','UNI','APT','ICP','ATOM','XLM',
            'ETC','FIL','HBAR','ARB','OP','VET','INJ','SUI','AAVE','GRT'];

$coins = array_filter(
    array_slice(explode(',', $rawCoins), 0, 10),
    fn($c) => in_array(trim($c), $ALLOWED)
);
$coins = array_values(array_map('trim', $coins));
if (empty($coins)) $coins = ['BTC'];

// 시그널 색상
function sigColor(string $sig): string {
    return match(true) {
        str_contains($sig,'FULL')  => '#22c55e',
        str_contains($sig,'ADD')   => '#86efac',
        str_contains($sig,'SPLIT LONG') => '#a3e635',
        str_contains($sig,'WATCH') => '#facc15',
        str_contains($sig,'SPLIT EXIT') => '#fb923c',
        default                    => '#f87171',
    };
}

// 가격 포맷
function fmtPrice(float $p): string {
    if ($p >= 10000) return '$'.number_format($p, 0);
    if ($p >= 100)   return '$'.number_format($p, 2);
    if ($p >= 1)     return '$'.number_format($p, 3);
    return '$'.number_format($p, 5);
}

$coinsJson = json_encode($coins, JSON_UNESCAPED_SLASHES);
?><!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>BTCtiming Widget</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#0d0d10;--bg2:#17171c;--bg3:#1e1e25;
  --b1:rgba(255,255,255,.08);--b2:rgba(255,255,255,.13);
  --t1:#f0f0f2;--t2:#a0a0aa;--t3:#606068;
  --or:#f7931a;--gn:#22c55e;--rad:12px;
}
html,body{height:100%;background:var(--bg);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;color:var(--t1)}
body{display:flex;flex-direction:column}

/* 헤더 */
.wg-head{display:flex;align-items:center;justify-content:space-between;padding:9px 12px 7px;border-bottom:1px solid var(--b1)}
.wg-logo{display:flex;align-items:center;gap:6px;text-decoration:none}
.wg-logo svg{flex-shrink:0}
.wg-logo-tx{font-size:12px;font-weight:700;color:var(--or);letter-spacing:-.3px}
.wg-updated{font-size:10px;color:var(--t3)}

/* 리스트 */
.wg-list{flex:1;overflow-y:auto}
.coin-row{display:flex;align-items:center;padding:9px 12px;border-bottom:1px solid var(--b1);cursor:pointer;transition:background .12s;gap:8px;text-decoration:none;color:var(--t1)}
.coin-row:hover{background:var(--bg2)}
.coin-row:last-child{border-bottom:none}
.coin-sym{font-size:13px;font-weight:700;width:44px;flex-shrink:0}
.coin-price{font-size:12px;color:var(--t2);flex:1;font-variant-numeric:tabular-nums}
.coin-score{font-size:15px;font-weight:800;width:34px;text-align:right;flex-shrink:0;font-variant-numeric:tabular-nums}
.coin-sig{font-size:9.5px;font-weight:700;width:72px;text-align:right;flex-shrink:0;line-height:1.2}
.coin-arrow{color:var(--t3);font-size:11px;flex-shrink:0}

/* 스켈레톤 */
.skel{height:12px;border-radius:4px;background:var(--bg3);animation:pulse 1.2s ease-in-out infinite}
@keyframes pulse{0%,100%{opacity:.4}50%{opacity:1}}

/* 게이지 패널 (클릭 시 확장) */
.gauge-panel{display:none;background:var(--bg);padding:12px;border-top:1px solid var(--b1)}
.gauge-panel.open{display:block}
.gp-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
.gp-coin{font-size:14px;font-weight:800}
.gp-price{font-size:12px;color:var(--t2)}
.gp-close{font-size:18px;color:var(--t3);cursor:pointer;padding:0 4px;background:none;border:none;color:var(--t2);line-height:1}
.gp-close:hover{color:var(--t1)}

/* 게이지 SVG */
.gauge-wrap{position:relative;width:100%;max-width:220px;margin:0 auto 10px}
.gauge-wrap svg{width:100%;height:auto;display:block}
.gauge-center{position:absolute;bottom:4px;left:50%;transform:translateX(-50%);text-align:center}
.gc-score{font-size:28px;font-weight:900;line-height:1}
.gc-label{font-size:10px;color:var(--t2);margin-top:1px}

/* 시그널 배지 */
.gp-signal{text-align:center;margin-bottom:10px}
.sig-badge{display:inline-block;padding:5px 16px;border-radius:20px;font-size:12px;font-weight:700;letter-spacing:.3px}

/* 링크 */
.gp-link{display:block;text-align:center;font-size:11px;color:var(--or);text-decoration:none;margin-top:4px;opacity:.8}
.gp-link:hover{opacity:1}

/* 푸터 */
.wg-foot{padding:6px 12px;border-top:1px solid var(--b1);display:flex;align-items:center;justify-content:space-between}
.wg-powered{font-size:10px;color:var(--t3)}
.wg-powered a{color:var(--or);text-decoration:none}
.wg-powered a:hover{text-decoration:underline}
.wg-refresh{font-size:10px;color:var(--t3);cursor:pointer;background:none;border:none;padding:0;cursor:pointer}
.wg-refresh:hover{color:var(--t2)}
</style>
</head>
<body>

<div class="wg-head">
  <a class="wg-logo" href="https://btctiming.com" target="_blank" rel="noopener" title="BTCtiming.com">
    <svg width="20" height="20" viewBox="0 0 64 64">
      <rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/>
      <path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#26262b" stroke-width="6" stroke-linecap="round"/>
      <path d="M13 44 A19 19 0 0 1 41 29" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/>
      <polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
      <polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span class="wg-logo-tx">BTCtiming</span>
  </a>
  <span class="wg-updated" id="updTime">—</span>
</div>

<div class="wg-list" id="coinList">
<?php foreach ($coins as $c): ?>
  <div class="coin-row" id="row_<?= $c ?>" onclick="toggleGauge('<?= $c ?>')">
    <span class="coin-sym"><?= htmlspecialchars($c) ?></span>
    <span class="coin-price" id="price_<?= $c ?>"><span class="skel" style="width:70px;display:inline-block"></span></span>
    <span class="coin-score" id="score_<?= $c ?>">—</span>
    <span class="coin-sig" id="sig_<?= $c ?>">—</span>
    <span class="coin-arrow">›</span>
  </div>
  <div class="gauge-panel" id="gauge_<?= $c ?>">
    <div class="gp-top">
      <span class="gp-coin" id="gpc_<?= $c ?>"><?= htmlspecialchars($c) ?></span>
      <span class="gp-price" id="gpp_<?= $c ?>"></span>
      <button class="gp-close" onclick="event.stopPropagation();closeGauge('<?= $c ?>')">×</button>
    </div>
    <div class="gauge-wrap">
      <svg viewBox="0 0 200 110" id="gsvg_<?= $c ?>">
        <!-- 배경 트랙 -->
        <path d="M20 100 A80 80 0 0 1 180 100" fill="none" stroke="#26262b" stroke-width="18" stroke-linecap="round"/>
        <!-- 채워진 게이지 -->
        <path d="M20 100 A80 80 0 0 1 180 100" fill="none" stroke="#333" stroke-width="18" stroke-linecap="round" id="gfill_<?= $c ?>" stroke-dasharray="0 251"/>
      </svg>
      <div class="gauge-center">
        <div class="gc-score" id="gcs_<?= $c ?>">—</div>
        <div class="gc-label">Buy Score</div>
      </div>
    </div>
    <div class="gp-signal">
      <span class="sig-badge" id="gbadge_<?= $c ?>" style="background:var(--bg3);color:var(--t2)">—</span>
    </div>
    <a class="gp-link" href="https://btctiming.com/?coin=<?= $c ?>" target="_blank" rel="noopener">→ btctiming.com에서 자세히 보기</a>
  </div>
<?php endforeach; ?>
</div>

<div class="wg-foot">
  <span class="wg-powered">Powered by <a href="https://btctiming.com" target="_blank" rel="noopener">btctiming.com</a></span>
  <button class="wg-refresh" onclick="loadAll()" title="새로고침">↻ refresh</button>
</div>

<script>
const COINS = <?= $coinsJson ?>;
const API = 'https://btctiming.com/api.php';
let data = {};

function sigColor(sig){
  if(!sig) return '#606068';
  if(sig.includes('FULL'))  return '#22c55e';
  if(sig.includes('ADD'))   return '#86efac';
  if(sig.includes('SPLIT LONG')) return '#a3e635';
  if(sig.includes('WATCH')) return '#facc15';
  if(sig.includes('SPLIT EXIT')) return '#fb923c';
  return '#f87171';
}
function fmtPrice(p){
  if(p>=10000) return '$'+p.toLocaleString('en',{maximumFractionDigits:0});
  if(p>=100)   return '$'+p.toLocaleString('en',{minimumFractionDigits:2,maximumFractionDigits:2});
  if(p>=1)     return '$'+p.toLocaleString('en',{minimumFractionDigits:3,maximumFractionDigits:3});
  return '$'+p.toLocaleString('en',{minimumFractionDigits:5,maximumFractionDigits:5});
}
// 반원 게이지: 0~10점을 180도 호로 변환
// SVG 반원 arc 총 길이 ≈ π*r = π*80 ≈ 251
const ARC_LEN = 251;
function setGaugeFill(coin, score){
  const el = document.getElementById('gfill_'+coin);
  if(!el) return;
  const frac = Math.min(Math.max(score/10, 0), 1);
  const color = score>=7?'#22c55e':score>=5?'#f7931a':score>=3.5?'#fb923c':'#f87171';
  el.setAttribute('stroke', color);
  el.setAttribute('stroke-dasharray', (frac*ARC_LEN)+' '+ARC_LEN);
}

function loadCoin(coin){
  return fetch(API+'?coin='+coin+'&mode=buy')
    .then(r=>r.json())
    .then(d=>{
      data[coin]=d;
      const score = d.result?.final ?? 0;
      const sig   = d.result?.action ?? '—';
      const price = d.price ?? 0;
      const col   = sigColor(sig);
      // 리스트 행 업데이트
      const ps = document.getElementById('price_'+coin);
      const sc = document.getElementById('score_'+coin);
      const sg = document.getElementById('sig_'+coin);
      if(ps) ps.textContent = fmtPrice(price);
      if(sc){ sc.textContent = score.toFixed(1); sc.style.color = col; }
      if(sg){ sg.textContent = sig; sg.style.color = col; }
      // 게이지 패널 업데이트 (열려 있으면)
      const gp = document.getElementById('gauge_'+coin);
      if(gp && gp.classList.contains('open')) updateGaugePanel(coin);
    })
    .catch(()=>{});
}

function updateGaugePanel(coin){
  const d = data[coin]; if(!d) return;
  const score = d.result?.final ?? 0;
  const sig   = d.result?.action ?? '—';
  const price = d.price ?? 0;
  const col   = sigColor(sig);
  const gcs = document.getElementById('gcs_'+coin);
  const gpp = document.getElementById('gpp_'+coin);
  const gb  = document.getElementById('gbadge_'+coin);
  if(gcs){ gcs.textContent = score.toFixed(1); gcs.style.color = col; }
  if(gpp) gpp.textContent = fmtPrice(price);
  if(gb){ gb.textContent = sig; gb.style.background = col+'22'; gb.style.color = col; gb.style.border = '1px solid '+col+'55'; }
  setGaugeFill(coin, score);
}

let openCoin = null;
function toggleGauge(coin){
  if(openCoin && openCoin !== coin) closeGauge(openCoin);
  const panel = document.getElementById('gauge_'+coin);
  if(!panel) return;
  if(panel.classList.contains('open')){
    closeGauge(coin);
  } else {
    panel.classList.add('open');
    openCoin = coin;
    updateGaugePanel(coin);
  }
}
function closeGauge(coin){
  const panel = document.getElementById('gauge_'+coin);
  if(panel) panel.classList.remove('open');
  if(openCoin===coin) openCoin=null;
}

function loadAll(){
  document.getElementById('updTime').textContent = '…';
  Promise.all(COINS.map(loadCoin)).then(()=>{
    const now = new Date();
    document.getElementById('updTime').textContent =
      now.toLocaleTimeString('en', {hour:'2-digit',minute:'2-digit'});
  });
}

loadAll();
setInterval(loadAll, 60000); // 1분마다 자동 갱신
</script>
</body>
</html>
