<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 사용자용 RSS 안내 페이지 (다국어)
// 배포: /www/rss-guide.php → btctiming.com/rss-guide.php
// 실제 피드 엔드포인트는 /blog/rss.php. 이 페이지는 안내용.
// ═══════════════════════════════════════════════════════
header('Content-Type: text/html; charset=utf-8');

$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$feedBase = $baseUrl . '/blog/rss.php';

$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];

$langs = [
    'ko' => ['🇰🇷', '한국어'], 'en' => ['🇺🇸', 'English'], 'ja' => ['🇯🇵', '日本語'],
    'es' => ['🇪🇸', 'Español'], 'de' => ['🇩🇪', 'Deutsch'],
];
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
// 카테고리명 다국어 (없으면 ko/en 폴백)
function catName($ci, $lc){ return $ci[$lc] ?? ($ci['ko'] ?? ($ci['en'] ?? '')); }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>RSS · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 블로그 RSS 피드. 전체·카테고리별·언어별 구독.">
<link rel="canonical" href="<?= h($baseUrl) ?>/rss-guide.php">
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
.topbar-inner{max-width:880px;margin:0 auto;padding:13px 20px;display:flex;align-items:center;justify-content:space-between;gap:14px}
.brand{font-size:16px;font-weight:700;color:var(--orange)}.brand span{color:var(--t1)}
.lang-dropdown{position:relative}
.lang-trigger{display:flex;align-items:center;gap:5px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2);
  font-size:12px;font-weight:600;padding:6px 11px;border-radius:8px;cursor:pointer}
.lang-caret{font-size:9px}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:140px;background:var(--bg3);border:1px solid var(--b1);
  border-radius:10px;padding:5px;opacity:0;pointer-events:none;transform:translateY(-6px);transition:.15s;z-index:20}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:0;
  color:var(--t2);font-size:13px;cursor:pointer;border-radius:7px;text-align:left}
.lang-menu-item:hover{background:var(--bg4);color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
.wrap{max-width:880px;margin:0 auto;padding:44px 20px 60px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--orange);
  background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
h1{font-size:1.9rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.lead{font-size:15px;color:var(--t2);max-width:640px;margin:0 0 8px}
h2{font-size:1.15rem;font-weight:700;margin:40px 0 14px;padding-bottom:8px;border-bottom:1px solid var(--b1)}
.feed-row{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:13px 16px;background:var(--bg3);
  border:1px solid var(--b1);border-radius:11px;margin-bottom:9px;flex-wrap:wrap}
.feed-row:hover{border-color:rgba(247,147,26,.35)}
.feed-name{font-weight:600;font-size:14.5px;display:flex;align-items:center;gap:9px;min-width:0}
.feed-ico{font-size:16px;flex-shrink:0}
.feed-url{font-size:12px;color:var(--t3);font-family:ui-monospace,SFMono-Regular,Menlo,monospace;word-break:break-all}
.feed-actions{display:flex;gap:8px;flex-shrink:0}
.btn{font-size:12px;font-weight:600;padding:6px 12px;border-radius:8px;border:1px solid rgba(255,255,255,.12);
  background:var(--bg4);color:var(--t1);cursor:pointer}
.btn:hover{background:var(--orange);border-color:var(--orange);color:#0a0a0a;text-decoration:none}
.btn-copy.copied{background:#22c55e;border-color:#22c55e;color:#0a0a0a}
.note{margin-top:36px;padding:16px 18px;background:var(--bg3);border:1px solid var(--b1);border-radius:11px;font-size:13.5px;color:var(--t2)}
.note b{color:var(--t1)}
code{background:var(--bg4);padding:1px 6px;border-radius:5px;font-size:12.5px}
.foot-links{max-width:880px;margin:0 auto;padding:22px 20px 40px;border-top:1px solid var(--b1);display:flex;flex-wrap:wrap;gap:10px}
.foot-links a{font-size:13.5px;font-weight:600;padding:9px 15px;border-radius:10px;background:var(--bg3);border:1px solid var(--b1);color:var(--t1)}
.foot-links a:hover{border-color:rgba(247,147,26,.4);text-decoration:none}
footer{max-width:880px;margin:0 auto;padding:0 20px 30px;font-size:12px;color:#52525b}
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
  <span class="hero-badge">📡 RSS</span>
  <h1><span class="ko">RSS 피드</span><span class="en">RSS Feeds</span><span class="ja">RSSフィード</span><span class="es">Feeds RSS</span><span class="de">RSS-Feeds</span></h1>
  <p class="lead">
    <span class="ko">피드리더(Feedly, Inoreader 등)에 아래 주소를 등록하면 새 글을 자동으로 받아볼 수 있습니다.</span>
    <span class="en">Add the addresses below to a feed reader (Feedly, Inoreader, etc.) to receive new posts automatically.</span>
    <span class="ja">フィードリーダー（Feedly、Inoreaderなど）に以下のアドレスを登録すると、新着記事を自動で受け取れます。</span>
    <span class="es">Agrega las direcciones a un lector de feeds (Feedly, Inoreader, etc.) para recibir nuevas publicaciones automáticamente.</span>
    <span class="de">Füge die Adressen unten zu einem Feed-Reader (Feedly, Inoreader usw.) hinzu, um neue Beiträge automatisch zu erhalten.</span>
  </p>

  <h2><span class="ko">전체 피드</span><span class="en">All Posts</span><span class="ja">全記事</span><span class="es">Todo</span><span class="de">Alle Beiträge</span></h2>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico">📰</span> <span class="ko">전체 글</span><span class="en">All posts</span><span class="ja">全記事</span><span class="es">Todas</span><span class="de">Alle</span></div>
      <div class="feed-url"><?= h($feedBase) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($feedBase) ?>" target="_blank" rel="noopener"><span class="ko">열기</span><span class="en">Open</span><span class="ja">開く</span><span class="es">Abrir</span><span class="de">Öffnen</span></a>
      <button class="btn btn-copy" data-copy="<?= h($feedBase) ?>"><span class="ko">주소 복사</span><span class="en">Copy</span><span class="ja">コピー</span><span class="es">Copiar</span><span class="de">Kopieren</span></button>
    </div>
  </div>

  <?php if (!empty($cats)): ?>
  <h2><span class="ko">카테고리별 피드</span><span class="en">By Category</span><span class="ja">カテゴリー別</span><span class="es">Por Categoría</span><span class="de">Nach Kategorie</span></h2>
  <?php foreach ($cats as $key => $ci):
      $curl = $feedBase . '?category=' . $key;
      $icon = $catIcon[$key] ?? '📄';
  ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $icon ?></span>
        <span class="ko"><?= h(catName($ci,'ko')) ?></span><span class="en"><?= h(catName($ci,'en')) ?></span><span class="ja"><?= h(catName($ci,'ja')) ?></span><span class="es"><?= h(catName($ci,'es')) ?></span><span class="de"><?= h(catName($ci,'de')) ?></span>
      </div>
      <div class="feed-url"><?= h($curl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($curl) ?>" target="_blank" rel="noopener"><span class="ko">열기</span><span class="en">Open</span><span class="ja">開く</span><span class="es">Abrir</span><span class="de">Öffnen</span></a>
      <button class="btn btn-copy" data-copy="<?= h($curl) ?>"><span class="ko">주소 복사</span><span class="en">Copy</span><span class="ja">コピー</span><span class="es">Copiar</span><span class="de">Kopieren</span></button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <h2><span class="ko">언어별 피드</span><span class="en">By Language</span><span class="ja">言語別</span><span class="es">Por Idioma</span><span class="de">Nach Sprache</span></h2>
  <?php foreach ($langs as $lc => $li):
      $lurl = $feedBase . ($lc === 'ko' ? '' : '?lang=' . $lc);
  ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $li[0] ?></span> <?= h($li[1]) ?></div>
      <div class="feed-url"><?= h($lurl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($lurl) ?>" target="_blank" rel="noopener"><span class="ko">열기</span><span class="en">Open</span><span class="ja">開く</span><span class="es">Abrir</span><span class="de">Öffnen</span></a>
      <button class="btn btn-copy" data-copy="<?= h($lurl) ?>"><span class="ko">주소 복사</span><span class="en">Copy</span><span class="ja">コピー</span><span class="es">Copiar</span><span class="de">Kopieren</span></button>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="note">
    <b><span class="ko">RSS가 처음이신가요?</span><span class="en">New to RSS?</span><span class="ja">RSSは初めてですか？</span><span class="es">¿Nuevo en RSS?</span><span class="de">Neu bei RSS?</span></b>
    <span class="ko"> RSS는 여러 사이트의 새 글을 한곳에서 모아 보는 방식입니다. Feedly·Inoreader 같은 무료 앱에 위 주소를 붙여넣으면 새 글이 자동으로 도착합니다. 파라미터는 조합할 수 있습니다 — 예: </span>
    <span class="en"> RSS lets you collect new posts from many sites in one place. Paste the addresses above into a free app like Feedly or Inoreader to get new posts automatically. Parameters can be combined — e.g. </span>
    <span class="ja"> RSSは複数サイトの新着をまとめて読む仕組みです。FeedlyやInoreaderなどの無料アプリに上記アドレスを貼り付けると自動で届きます。パラメータは組み合わせ可能です — 例: </span>
    <span class="es"> RSS te permite reunir nuevas publicaciones de muchos sitios en un solo lugar. Pega las direcciones en una app gratuita como Feedly o Inoreader. Los parámetros se pueden combinar — ej.: </span>
    <span class="de"> Mit RSS sammelst du neue Beiträge vieler Seiten an einem Ort. Füge die Adressen in eine kostenlose App wie Feedly oder Inoreader ein. Parameter lassen sich kombinieren — z. B.: </span>
    <code><?= h($feedBase) ?>?category=weekly&lang=en</code>
  </div>
</div>

<div class="foot-links">
  <a href="/">📊 <span class="ko">대시보드</span><span class="en">Dashboard</span><span class="ja">ダッシュボード</span><span class="es">Panel</span><span class="de">Dashboard</span></a>
  <a href="/blog/">📰 <span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span></a>
  <a href="/sitemap-guide.php">🗺 <span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span></a>
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
document.querySelectorAll('.btn-copy').forEach(function(b){
  b.addEventListener('click',function(){
    var txt=b.getAttribute('data-copy');
    var done=function(){ b.classList.add('copied'); var sp=b.querySelector('span[class]'); setTimeout(function(){b.classList.remove('copied');},1400); };
    if(navigator.clipboard&&navigator.clipboard.writeText){ navigator.clipboard.writeText(txt).then(done).catch(done); }
    else { var ta=document.createElement('textarea');ta.value=txt;document.body.appendChild(ta);ta.select();try{document.execCommand('copy');}catch(e){}document.body.removeChild(ta);done(); }
  });
});
applyLang(currentLang());
</script>
</body>
</html>
