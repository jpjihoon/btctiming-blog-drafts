<?php
// BTCtiming.com — RSS 안내 페이지 (공용 헤더/푸터 include)
header('Content-Type: text/html; charset=utf-8');
$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$feedBase = $baseUrl . '/blog/rss.php';
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];
$langs = ['ko'=>['🇰🇷','한국어'],'en'=>['🇺🇸','English'],'ja'=>['🇯🇵','日本語'],'es'=>['🇪🇸','Español'],'de'=>['🇩🇪','Deutsch']];
if(!function_exists('gh')){ function gh($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
function cn($ci,$lc){ return $ci[$lc] ?? ($ci['ko'] ?? ($ci['en'] ?? '')); }

$GUIDE_TITLE = 'RSS · BTCtiming.com';
$GUIDE_DESC = 'BTCtiming.com 블로그 RSS 피드. 전체·카테고리별·언어별 구독.';
$GUIDE_CANONICAL = $baseUrl . '/rss-guide.php';
$GUIDE_EXTRA_CSS = '
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(251,146,60,.16),transparent 60%),radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),var(--bg)}
.hero-in{max-width:800px;margin:0 auto;padding:40px 16px 30px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--orange);background:rgba(251,146,60,.1);border:1px solid rgba(251,146,60,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
.hero h1{font-size:2rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
.hero .lead{font-size:15px;color:var(--t2);max-width:640px;margin:0}
.wrap{max-width:800px;margin:0 auto;padding:32px 16px 40px}
.wrap h2{font-size:1.15rem;font-weight:700;margin:32px 0 14px;padding-bottom:8px;border-bottom:1px solid var(--b1)}
.feed-row{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:13px 16px;background:var(--bg3);border:1px solid var(--b1);border-radius:12px;margin-bottom:9px;flex-wrap:wrap;transition:border-color .12s}
.feed-row:hover{border-color:rgba(251,146,60,.35)}
.feed-name{font-weight:600;font-size:14.5px;display:flex;align-items:center;gap:9px;min-width:0}
.feed-ico{font-size:16px;flex-shrink:0}
.feed-url{font-size:12px;color:var(--t3);font-family:ui-monospace,SFMono-Regular,Menlo,monospace;word-break:break-all}
.feed-actions{display:flex;gap:8px;flex-shrink:0}
.gbtn{font-size:12px;font-weight:600;padding:6px 12px;border-radius:8px;border:1px solid var(--b2);background:var(--bg4);color:var(--t1);cursor:pointer}
.gbtn:hover{background:var(--orange);border-color:var(--orange);color:#0a0a0a;text-decoration:none}
.gbtn.copied{background:var(--green);border-color:var(--green);color:#0a0a0a}
.note{margin-top:36px;padding:16px 18px;background:var(--bg3);border:1px solid var(--b1);border-radius:12px;font-size:13.5px;color:var(--t2)}
.note b{color:var(--t1)}
.note code{background:var(--bg4);padding:1px 6px;border-radius:5px;font-size:12.5px}
';
require __DIR__ . '/_guide_head.php';
?>

<div class="hero"><div class="hero-in">
  <span class="hero-badge">📡 RSS</span>
  <h1><span class="l-ko">RSS 피드</span><span class="l-en">RSS Feeds</span><span class="l-ja">RSSフィード</span><span class="l-es">Feeds RSS</span><span class="l-de">RSS-Feeds</span><span class="l-fr">Flux RSS</span><span class="l-pt">Feeds RSS</span><span class="l-tr">RSS Beslemeleri</span><span class="l-vi">Nguồn cấp RSS</span></h1>
  <p class="lead">
    <span class="l-ko">피드리더(Feedly, Inoreader 등)에 아래 주소를 등록하면 새 글을 자동으로 받아볼 수 있습니다.</span>
    <span class="l-en">Add the addresses below to a feed reader (Feedly, Inoreader, etc.) to receive new posts automatically.</span>
    <span class="l-ja">フィードリーダー（Feedly、Inoreaderなど）に以下のアドレスを登録すると、新着記事を自動で受け取れます。</span>
    <span class="l-es">Agrega las direcciones a un lector de feeds para recibir nuevas publicaciones automáticamente.</span>
    <span class="l-de">Füge die Adressen unten zu einem Feed-Reader hinzu, um neue Beiträge automatisch zu erhalten.</span><span class="l-fr">Ajoutez les adresses ci-dessous à un lecteur de flux pour recevoir automatiquement les nouveaux articles.</span><span class="l-pt">Adicione os endereços abaixo a um leitor de feeds para receber automaticamente novos artigos.</span><span class="l-tr">Yeni yazıları otomatik almak için aşağıdaki adresleri bir besleme okuyucusuna ekleyin.</span><span class="l-vi">Thêm các địa chỉ bên dưới vào trình đọc nguồn cấp để tự động nhận bài viết mới.</span>
  </p>
</div></div>

<div class="wrap">
  <h2><span class="l-ko">전체 피드</span><span class="l-en">All Posts</span><span class="l-ja">全記事</span><span class="l-es">Todo</span><span class="l-de">Alle Beiträge</span><span class="l-fr">Tous les articles</span><span class="l-pt">Todos os artigos</span><span class="l-tr">Tüm yazılar</span><span class="l-vi">Tất cả bài viết</span></h2>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico">📰</span> <span class="l-ko">전체 글</span><span class="l-en">All posts</span><span class="l-ja">全記事</span><span class="l-es">Todas</span><span class="l-de">Alle</span><span class="l-fr">Tout</span><span class="l-pt">Todos</span><span class="l-tr">Tümü</span><span class="l-vi">Tất cả</span></div>
      <div class="feed-url"><?= gh($feedBase) ?></div>
    </div>
    <div class="feed-actions">
      <a class="gbtn" href="<?= gh($feedBase) ?>" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($feedBase) ?>"><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span></button>
    </div>
  </div>

  <?php if (!empty($cats)): ?>
  <h2><span class="l-ko">카테고리별 피드</span><span class="l-en">By Category</span><span class="l-ja">カテゴリー別</span><span class="l-es">Por Categoría</span><span class="l-de">Nach Kategorie</span><span class="l-fr">Par catégorie</span><span class="l-pt">Por categoria</span><span class="l-tr">Kategoriye göre</span><span class="l-vi">Theo danh mục</span></h2>
  <?php foreach ($cats as $key => $ci): $curl=$feedBase.'?category='.$key; $icon=$catIcon[$key]??'📄'; ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $icon ?></span> <span class="l-ko"><?= gh(cn($ci,'ko')) ?></span><span class="l-en"><?= gh(cn($ci,'en')) ?></span><span class="l-ja"><?= gh(cn($ci,'ja')) ?></span><span class="l-es"><?= gh(cn($ci,'es')) ?></span><span class="l-de"><?= gh(cn($ci,'de')) ?></span></div>
      <div class="feed-url"><?= gh($curl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="gbtn" href="<?= gh($curl) ?>" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($curl) ?>"><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span></button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <h2><span class="l-ko">언어별 피드</span><span class="l-en">By Language</span><span class="l-ja">言語別</span><span class="l-es">Por Idioma</span><span class="l-de">Nach Sprache</span><span class="l-fr">Par langue</span><span class="l-pt">Por idioma</span><span class="l-tr">Dile göre</span><span class="l-vi">Theo ngôn ngữ</span></h2>
  <?php foreach ($langs as $lc => $li): $lurl=$feedBase.'?lang='.$lc; ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $li[0] ?></span> <?= gh($li[1]) ?></div>
      <div class="feed-url"><?= gh($lurl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="gbtn" href="<?= gh($lurl) ?>" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($lurl) ?>"><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span></button>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="note">
    <b><span class="l-ko">RSS가 처음이신가요?</span><span class="l-en">New to RSS?</span><span class="l-ja">RSSは初めてですか？</span><span class="l-es">¿Nuevo en RSS?</span><span class="l-de">Neu bei RSS?</span><span class="l-fr">Nouveau sur le RSS ?</span><span class="l-pt">Novo no RSS?</span><span class="l-tr">RSS’e yeni misiniz?</span><span class="l-vi">Mới dùng RSS?</span></b>
    <span class="l-ko"> Feedly·Inoreader 같은 무료 앱에 위 주소를 붙여넣으면 새 글이 자동으로 도착합니다. 파라미터는 조합할 수 있습니다 — 예: </span>
    <span class="l-en"> Paste the addresses above into a free app like Feedly or Inoreader. Parameters can be combined — e.g. </span>
    <span class="l-ja"> FeedlyやInoreaderなどの無料アプリに上記アドレスを貼り付けると自動で届きます。組み合わせ可能 — 例: </span>
    <span class="l-es"> Pega las direcciones en una app gratuita como Feedly. Se pueden combinar — ej.: </span>
    <span class="l-de"> Füge die Adressen in eine App wie Feedly ein. Kombinierbar — z. B.: </span><span class="l-fr"> Ajoutez les adresses dans une app comme Feedly. Combinables — par ex. : </span><span class="l-pt"> Adicione os endereços em um app como o Feedly. Combináveis — ex.: </span><span class="l-tr"> Adresleri Feedly gibi bir uygulamaya ekleyin. Birleştirilebilir — örn.: </span><span class="l-vi"> Thêm các địa chỉ vào ứng dụng như Feedly. Có thể kết hợp — ví dụ: </span>
    <code><?= gh($feedBase) ?>?category=weekly&lang=en</code>
  </div>
</div>

<?php
$GUIDE_EXTRA_JS = "
document.querySelectorAll('.gcopy').forEach(function(b){
  b.addEventListener('click',function(){
    var txt=b.getAttribute('data-copy');
    var done=function(){b.classList.add('copied');setTimeout(function(){b.classList.remove('copied');},1400);};
    if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(txt).then(done).catch(done);}
    else{var ta=document.createElement('textarea');ta.value=txt;document.body.appendChild(ta);ta.select();try{document.execCommand('copy');}catch(e){}document.body.removeChild(ta);done();}
  });
});
";
require __DIR__ . '/_guide_foot.php';
