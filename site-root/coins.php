<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/coin_meta.php';

// 언어 결정 (블로그·exchanges와 동일 규칙)
$lang = 'ko';
if (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) {
    $lang = $_GET['lang'];
}
$htmlLang = $lang;
$urlSuffix = langSuffix($lang);

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// 코인 메타 (app.js의 COINS와 동일하게 유지)
$COIN_META = [
  'BTC'=>['Bitcoin','#F7931A'],'ETH'=>['Ethereum','#627EEA'],'BNB'=>['BNB','#F3BA2F'],
  'SOL'=>['Solana','#9945FF'],'XRP'=>['XRP','#00AAE4'],'DOGE'=>['Dogecoin','#C2A633'],
  'ADA'=>['Cardano','#0033AD'],'TRX'=>['TRON','#FF0013'],'AVAX'=>['Avalanche','#E84142'],
  'LINK'=>['Chainlink','#2A5ADA'],'DOT'=>['Polkadot','#E6007A'],'POL'=>['Polygon','#8247E5'],
  'LTC'=>['Litecoin','#BFBBBB'],'BCH'=>['Bitcoin Cash','#0AC18E'],'NEAR'=>['NEAR','#00EC97'],
  'UNI'=>['Uniswap','#FF007A'],'APT'=>['Aptos','#4CB4A4'],'ICP'=>['Internet Computer','#3B00B9'],
  'ATOM'=>['Cosmos','#2E3148'],'XLM'=>['Stellar','#14B6E7'],'ETC'=>['Ethereum Classic','#328332'],
  'FIL'=>['Filecoin','#0090FF'],'HBAR'=>['Hedera','#8A94A6'],'ARB'=>['Arbitrum','#28A0F0'],
  'OP'=>['Optimism','#FF0420'],'VET'=>['VeChain','#15BDFF'],'INJ'=>['Injective','#00D2FF'],
  'SUI'=>['Sui','#4DA2FF'],'AAVE'=>['Aave','#B6509E'],'GRT'=>['The Graph','#6747ED'],
  'ALGO'=>['Algorand','#9CA3AF'],'SEI'=>['Sei','#8B1E2B'],'RUNE'=>['THORChain','#00CCFF'],
  'S'=>['Sonic','#1969FF'],'TIA'=>['Celestia','#7B2BF9'],'IMX'=>['Immutable','#3B82F6'],
  'RENDER'=>['Render','#CF1011'],'SKY'=>['Sky','#1AAB9B'],'LDO'=>['Lido DAO','#00A3FF'],
  'STX'=>['Stacks','#5546FF'],'THETA'=>['Theta','#2AB8E6'],'SAND'=>['The Sandbox','#00ADEF'],
  'AXS'=>['Axie Infinity','#0055D5'],'MANA'=>['Decentraland','#FF2D55'],'FLOW'=>['Flow','#00EF8B'],
  'CHZ'=>['Chiliz','#CD0124'],'GALA'=>['Gala','#B0B7C3'],'A'=>['Vaulta','#8B9DC3'],
  'PEPE'=>['Pepe','#3D8130'],'SHIB'=>['Shiba Inu','#FFA409'],
];
$coinList = [];
foreach (array_keys(COIN_SYMBOLS) as $id) {
  // coin_meta 마스터 우선(자동목록의 새 코인도 이름·색 자동 생성), 없으면 페이지 자체 맵
  if (isset($COIN_META[$id])) {
    $coinList[] = ['id'=>$id, 'name'=>$COIN_META[$id][0], 'color'=>$COIN_META[$id][1]];
  } else {
    $mm = coinMeta($id);
    $coinList[] = ['id'=>$id, 'name'=>$mm['name'], 'color'=>$mm['color']];
  }
}

$T = [
  'ko'=>['back'=>'대시보드','h1'=>'코인 관리','lead'=>'별을 눌러 대시보드에 표시할 코인을 선택하세요. 선택한 코인만 대시보드 탭에 나타납니다.','search'=>'코인 검색 (이름/심볼)','reset'=>'기본값으로 초기화','empty'=>'검색 결과 없음','open'=>'대시보드에서 보기','tab_fav'=>'즐겨찾기','tab_all'=>'전체','empty_fav'=>'즐겨찾기한 코인이 없습니다. 전체 탭에서 추가하세요.','sitemap'=>'사이트맵','privacy'=>'개인정보처리방침','terms'=>'이용약관','disclaimer'=>'투자 조언이 아닙니다'],
  'en'=>['back'=>'Dashboard','h1'=>'Manage Coins','lead'=>'Tap the star to choose which coins appear on your dashboard. Only selected coins show up in the dashboard tabs.','search'=>'Search coins (name/symbol)','reset'=>'Reset to default','empty'=>'No results','open'=>'Open in dashboard','tab_fav'=>'Favorites','tab_all'=>'All','empty_fav'=>'No favorites yet. Add from the All tab.','sitemap'=>'Sitemap','privacy'=>'Privacy Policy','terms'=>'Terms','disclaimer'=>'Not financial advice'],
  'ja'=>['back'=>'ダッシュボード','h1'=>'コイン管理','lead'=>'星をタップしてダッシュボードに表示するコインを選択します。選択したコインのみタブに表示されます。','search'=>'コイン検索(名前/シンボル)','reset'=>'デフォルトに戻す','empty'=>'該当なし','open'=>'ダッシュボードで見る','tab_fav'=>'お気に入り','tab_all'=>'すべて','empty_fav'=>'お気に入りがありません。すべてタブから追加してください。','sitemap'=>'サイトマップ','privacy'=>'プライバシーポリシー','terms'=>'利用規約','disclaimer'=>'投資助言ではありません'],
  'es'=>['back'=>'Panel','h1'=>'Gestionar Monedas','lead'=>'Toca la estrella para elegir qué monedas aparecen en tu panel. Solo las seleccionadas se muestran en las pestañas.','search'=>'Buscar monedas','reset'=>'Restablecer','empty'=>'Sin resultados','open'=>'Abrir en el panel','tab_fav'=>'Favoritos','tab_all'=>'Todo','empty_fav'=>'Sin favoritos. Añade desde la pestaña Todo.','sitemap'=>'Mapa del sitio','privacy'=>'Política de Privacidad','terms'=>'Términos','disclaimer'=>'No es asesoramiento financiero'],
  'de'=>['back'=>'Dashboard','h1'=>'Coins verwalten','lead'=>'Tippen Sie auf den Stern, um zu wählen, welche Coins im Dashboard erscheinen. Nur ausgewählte Coins erscheinen in den Tabs.','search'=>'Coins suchen','reset'=>'Zurücksetzen','empty'=>'Keine Ergebnisse','open'=>'Im Dashboard öffnen','tab_fav'=>'Favoriten','tab_all'=>'Alle','empty_fav'=>'Keine Favoriten. Über den Alle-Tab hinzufügen.','sitemap'=>'Sitemap','privacy'=>'Datenschutz','terms'=>'Nutzungsbedingungen','disclaimer'=>'Keine Finanzberatung'],
];
$t = $T[$lang] ?? $T['en'];
$LNG = ['ko'=>'🇰🇷 한국어','en'=>'🇺🇸 English','ja'=>'🇯🇵 日本語','es'=>'🇪🇸 Español','de'=>'🇩🇪 Deutsch'];
$canonical = i18nUrl('/coins.php', $lang);
?>
<!DOCTYPE html>
<html lang="<?= $htmlLang ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= h($t['h1']) ?> | BTCtiming.com</title>
<meta name="description" content="<?= h($t['lead']) ?>">
<link rel="canonical" href="<?= h($canonical) ?>">
<?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
<link rel="alternate" hreflang="<?= h($lc) ?>" href="<?= h(i18nUrl('/coins.php', $lc)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= h(i18nUrl('/coins.php', 'ko')) ?>">
<style>
*{box-sizing:border-box;margin:0;padding:0}

body{background:#0a0a0a;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;line-height:1.5}
:root{--orange:#fb923c}
nav{background:#141418;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px}
.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f0f0f0;text-decoration:none}.logo span{color:#fbbf24}
.back{font-size:13px;color:#666;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.back a{color:#666;text-decoration:none}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:#151515;border:1px solid rgba(255,255,255,0.06);border-radius:8px;color:#f0f0f0;font-size:11px;font-weight:700;cursor:pointer}
.lang-caret{font-size:9px;color:#666}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#0f0f0f;border:1px solid rgba(255,255,255,0.06);border-radius:8px;overflow:hidden;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s;z-index:200}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:block;padding:9px 12px;color:#aaa;font-size:12px;font-weight:600;text-decoration:none}
.lang-menu-item:hover{background:#151515;color:#f0f0f0}
.lang-menu-item.active{color:#fb923c;background:rgba(247,147,26,.08)}
.wrap{max-width:640px;margin:0 auto;padding:24px 16px 80px}
h1{font-size:22px;font-weight:700;color:#fafafa;margin-bottom:6px}
.lead{font-size:13px;color:#999;margin-bottom:18px}
.toolbar{display:flex;gap:8px;margin-bottom:14px;position:sticky;top:60px;background:#0a0a0a;padding:6px 0;z-index:10}
.search-in{flex:1;height:42px;padding:0 14px;background:#1c1c20;border:1px solid rgba(255,255,255,.1);border-radius:10px;color:#f0f0f0;font-size:14px;outline:none}
.search-in:focus{border-color:var(--orange)}
.reset-btn{flex-shrink:0;height:42px;padding:0 14px;background:#1c1c20;border:1px solid rgba(255,255,255,.1);border-radius:10px;color:#aaa;font-size:12px;cursor:pointer}
.reset-btn:hover{color:#f0f0f0;border-color:var(--orange)}
.ctabs{display:flex;gap:8px;margin-bottom:12px}
.ctab{flex:1;height:40px;background:#1c1c20;border:1px solid rgba(255,255,255,.08);border-radius:10px;color:#999;font-size:13px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px;transition:all .12s}
.ctab.active{background:var(--orange);border-color:var(--orange);color:#000}
.ctab-cnt{font-size:11px;opacity:.7}
.coin-row{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:11px;cursor:pointer;transition:background .1s}
.coin-row:hover{background:#141418}
.c-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0}
.c-id{font-size:14px;font-weight:700;color:#f0f0f0;min-width:64px}
.c-name{font-size:13px;color:#888;flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.c-star{font-size:20px;color:#3a3a40;flex-shrink:0}
.coin-row.fav .c-star{color:var(--orange)}
.empty{padding:36px;text-align:center;color:#666;font-size:14px}
footer{border-top:1px solid rgba(255,255,255,.06);padding:24px;text-align:center;font-size:11px;color:#666}
footer a{color:#666;text-decoration:underline}
</style>
<script src="/lang-common.js"></script>
</head>
<body>
<nav><div class="nav-w">
  <a href="<?= h(i18nPath('/', $lang)) ?>" class="logo">BTC<span>timing</span></a>
  <span class="back">← <a href="<?= h(i18nPath('/', $lang)) ?>"><?= h($t['back']) ?></a></span>
  <?php $__nbLang = $lang; $__nbHide = ''; include __DIR__ . '/_nav_btns.php'; ?>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" onclick="document.getElementById('langDropdown').classList.toggle('open');event.stopPropagation()">
      <span><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu">
      <?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
      <a class="lang-menu-item<?= $lc===$lang ? ' active' : '' ?>" href="<?= h(i18nPath('/coins.php', $lc)) ?>"><?= h($LNG[$lc] ?? strtoupper($lc)) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>

<div class="wrap">
  <h1><?= h($t['h1']) ?></h1>
  <p class="lead"><?= h($t['lead']) ?></p>
  <div class="toolbar">
    <input id="searchIn" class="search-in" type="text" placeholder="<?= h($t['search']) ?>" autocomplete="off">
    <button class="reset-btn" onclick="resetFav()"><?= h($t['reset']) ?></button>
  </div>
  <div class="ctabs">
    <button id="ctabFav" class="ctab active" onclick="setTab('fav')">★ <?= h($t['tab_fav']) ?> <span id="favCnt" class="ctab-cnt"></span></button>
    <button id="ctabAll" class="ctab" onclick="setTab('all')"><?= h($t['tab_all']) ?> <span class="ctab-cnt"><?= count($coinList) ?></span></button>
  </div>
  <div id="coinList"></div>
</div>

<footer>
  © 2026 BTCtiming.com ·
  <a href="/rss-guide.php">RSS</a> ·
  <a href="<?= h(i18nPath('/sitemap-guide.php', $lang)) ?>"><?= h($t['sitemap']) ?></a> ·
  <a href="<?= h(i18nPath('/privacy', $lang)) ?>"><?= h($t['privacy']) ?></a> ·
  <a href="<?= h(i18nPath('/terms', $lang)) ?>"><?= h($t['terms']) ?></a> ·
  <?= h($t['disclaimer']) ?>
</footer>

<script>
const COINS = <?= json_encode($coinList, JSON_UNESCAPED_UNICODE) ?>;
const DEFAULT_FAVORITES = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX'];
const T_EMPTY = <?= json_encode($t['empty'], JSON_UNESCAPED_UNICODE) ?>;
const T_EMPTY_FAV = <?= json_encode($t['empty_fav'], JSON_UNESCAPED_UNICODE) ?>;
let curTab = 'fav';

function getDelistedCoins(){
  try{ const raw = localStorage.getItem('delistedCoins'); return raw ? (JSON.parse(raw)||[]) : []; }catch(e){ return []; }
}
function getFavorites(){
  try{
    const raw = localStorage.getItem('favoriteCoins');
    if(raw===null) return [...DEFAULT_FAVORITES];
    const arr = JSON.parse(raw);
    const valid = Array.isArray(arr) ? arr.filter(id=>COINS.some(c=>c.id===id)) : [];
    return valid.length ? valid : ['BTC'];
  }catch(e){ return [...DEFAULT_FAVORITES]; }
}
function saveFavorites(list){
  const clean = (Array.isArray(list)?list:[]).filter(id=>COINS.some(c=>c.id===id));
  const finalList = clean.length ? clean : ['BTC'];
  try{ localStorage.setItem('favoriteCoins', JSON.stringify(finalList)); }catch(e){}
  return finalList;
}
function toggleFav(id){
  let favs = getFavorites();
  if(favs.includes(id)) favs = favs.filter(x=>x!==id);
  else favs.push(id);
  saveFavorites(favs);
  render(document.getElementById('searchIn').value);
}
function resetFav(){
  saveFavorites([...DEFAULT_FAVORITES]);
  render(document.getElementById('searchIn').value);
}
function setTab(tab){
  curTab = tab;
  document.getElementById('ctabFav').classList.toggle('active', tab==='fav');
  document.getElementById('ctabAll').classList.toggle('active', tab==='all');
  render(document.getElementById('searchIn').value);
}
function render(q){
  const query = (q||'').trim().toUpperCase();
  const favs = getFavorites();
  document.getElementById('favCnt').textContent = favs.length;
  const dead = getDelistedCoins();
  const pool = COINS.filter(c=>!dead.includes(c.id));
  const base = curTab==='fav' ? pool.filter(c=>favs.includes(c.id)) : pool;
  const matched = base.filter(c=>!query || c.id.includes(query) || c.name.toUpperCase().includes(query));
  const list = document.getElementById('coinList');
  if(!matched.length){
    const msg = (curTab==='fav' && !query) ? T_EMPTY_FAV : T_EMPTY;
    list.innerHTML = '<div class="empty">'+msg+'</div>'; return;
  }
  list.innerHTML = matched.map(c=>{
    const on = favs.includes(c.id);
    return '<div class="coin-row'+(on?' fav':'')+'" onclick="toggleFav(\''+c.id+'\')">'
      +'<span class="c-dot" style="background:'+c.color+'"></span>'
      +'<span class="c-id">'+c.id+'</span>'
      +'<span class="c-name">'+c.name+'</span>'
      +'<span class="c-star">'+(on?'★':'☆')+'</span>'
      +'</div>';
  }).join('');
}
document.getElementById('searchIn').addEventListener('input', e=>render(e.target.value));
document.addEventListener('click', e=>{ if(!e.target.closest('#langDropdown')) document.getElementById('langDropdown').classList.remove('open'); });
render('');
</script>
<?php /* 설정 모달(⚙️) — 이 페이지는 _shared_footer 를 쓰지 않으므로 직접 include */
   include __DIR__ . '/_settings_modal.php'; ?>
</body>
</html>
