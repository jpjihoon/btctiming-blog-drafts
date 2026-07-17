<?php
// BTCtiming.com — RSS 안내 페이지 (공용 헤더/푸터 include)
header('Content-Type: text/html; charset=utf-8');
$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$feedBase = $baseUrl . '/blog/rss.php';
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];
require_once $root . '/config.php';
$langs = [];
foreach (SUPPORTED_LANGS as $__lc => $__m) { $langs[$__lc] = [$__m['flag'] ?? '', $__m['name'] ?? strtoupper($__lc)]; }
if(!function_exists('gh')){ function gh($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
function cn($ci,$lc){ return $ci[$lc] ?? ($ci['ko'] ?? ($ci['en'] ?? '')); }

$GUIDE_TITLE = 'RSS · BTCtiming.com';
$GUIDE_DESC = 'BTCtiming.com 블로그 RSS 피드. 전체·카테고리별·언어별 구독.';
$GUIDE_KOPATH = '/rss-guide.php';                    // _guide_head가 i18nUrl로 경로형 canonical·hreflang 생성
$GUIDE_CANONICAL = $baseUrl . '/rss-guide.php';   // 폴백(GUIDE_KOPATH 우선)
$GUIDE_EXTRA_CSS = '
.hero{border-bottom:1px solid rgba(255,255,255,.08)}
.hero-in{max-width:800px;margin:0 auto;padding:38px 16px 26px}
.hero-eyebrow{font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange);margin-bottom:9px}
.hero h1{font-size:1.7rem;font-weight:600;margin:0 0 10px;letter-spacing:-.01em}
.hero .lead{font-size:14px;color:var(--t2);max-width:640px;margin:0;line-height:1.6}
.wrap{max-width:800px;margin:0 auto;padding:30px 16px 40px}
.wrap h2{font-size:12px;font-weight:600;letter-spacing:.05em;color:#e4e4e7;margin:28px 0 12px;display:flex;align-items:center;gap:9px}
.wrap h2:before{content:"";width:8px;height:8px;border-radius:50%;background:var(--orange);flex-shrink:0}
.wrap h2:after{content:"";flex:1;height:1px;background:rgba(255,255,255,.06)}
.feed-row{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:12px 14px;background:#151518;border:1px solid rgba(255,255,255,.07);border-left:3px solid var(--orange);border-radius:0 10px 10px 0;margin-bottom:8px;flex-wrap:wrap;transition:background .12s}
.feed-row:hover{background:#1c1c21}
.feed-main{display:flex;align-items:baseline;gap:12px;min-width:0;flex:1}
.feed-name{font-weight:500;font-size:14px;color:#fafafa;flex-shrink:0}
.feed-url{font-size:12px;color:#71717a;font-family:ui-monospace,SFMono-Regular,Menlo,monospace;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;min-width:0}
.feed-actions{display:flex;gap:6px;flex-shrink:0}
.gbtn{font-size:12px;font-weight:500;padding:5px 12px;border-radius:7px;border:1px solid rgba(255,255,255,.12);background:none;color:#8b8b93;cursor:pointer;transition:all .12s}
.gbtn:hover{border-color:var(--orange);color:var(--orange);text-decoration:none}
.gbtn.copied{border-color:var(--green);color:var(--green)}
.note{margin-top:32px;padding:16px 18px;background:#151518;border:1px solid rgba(255,255,255,.07);border-radius:12px;font-size:13.5px;color:var(--t2);line-height:1.6}
.note b{color:var(--t1)}
.note code{background:var(--bg4);padding:1px 6px;border-radius:5px;font-size:12.5px}
';
require __DIR__ . '/_guide_head.php';
?>

<div class="hero"><div class="hero-in">
  <div class="hero-eyebrow">RSS</div>
  <h1><span class="l-ko">RSS 피드</span><span class="l-en">RSS Feeds</span><span class="l-ja">RSSフィード</span><span class="l-es">Feeds RSS</span><span class="l-de">RSS-Feeds</span><span class="l-fr">Flux RSS</span><span class="l-pt">Feeds RSS</span><span class="l-tr">RSS Beslemeleri</span><span class="l-vi">Nguồn cấp RSS</span><span class="l-id">Umpan RSS</span><span class="l-pl">Kanały RSS</span><span class="l-it">Feed RSS</span><span class="l-ru">RSS-ленты</span><span class="l-zh">RSS 訂閱源</span></h1>
  <p class="lead">
    <span class="l-ko">피드리더(Feedly, Inoreader 등)에 아래 주소를 등록하면 새 글을 자동으로 받아볼 수 있습니다.</span>
    <span class="l-en">Add the addresses below to a feed reader (Feedly, Inoreader, etc.) to receive new posts automatically.</span>
    <span class="l-ja">フィードリーダー（Feedly、Inoreaderなど）に以下のアドレスを登録すると、新着記事を自動で受け取れます。</span>
    <span class="l-es">Agrega las direcciones a un lector de feeds para recibir nuevas publicaciones automáticamente.</span>
    <span class="l-de">Füge die Adressen unten zu einem Feed-Reader hinzu, um neue Beiträge automatisch zu erhalten.</span><span class="l-fr">Ajoutez les adresses ci-dessous à un lecteur de flux pour recevoir automatiquement les nouveaux articles.</span><span class="l-pt">Adicione os endereços abaixo a um leitor de feeds para receber automaticamente novos artigos.</span><span class="l-tr">Yeni yazıları otomatik almak için aşağıdaki adresleri bir besleme okuyucusuna ekleyin.</span><span class="l-vi">Thêm các địa chỉ bên dưới vào trình đọc nguồn cấp để tự động nhận bài viết mới.</span><span class="l-id">Tambahkan alamat di bawah ini ke pembaca feed (Feedly, Inoreader, dll.) untuk menerima postingan baru secara otomatis.</span><span class="l-pl">Dodaj poniższe adresy do czytnika kanałów (Feedly, Inoreader itp.), aby automatycznie otrzymywać nowe wpisy.</span><span class="l-it">Aggiungi gli indirizzi qui sotto a un lettore di feed (Feedly, Inoreader, ecc.) per ricevere automaticamente i nuovi post.</span><span class="l-ru">Добавьте приведённые ниже адреса в программу для чтения лент (Feedly, Inoreader и т. д.), чтобы автоматически получать новые публикации.</span><span class="l-zh">將以下網址新增到 feed 閱讀器（Feedly、Inoreader 等）即可自動接收新文章。</span>
  </p>
</div></div>

<div class="wrap">
  <h2><span class="l-ko">전체 피드</span><span class="l-en">All Posts</span><span class="l-ja">全記事</span><span class="l-es">Todo</span><span class="l-de">Alle Beiträge</span><span class="l-fr">Tous les articles</span><span class="l-pt">Todos os artigos</span><span class="l-tr">Tüm yazılar</span><span class="l-vi">Tất cả bài viết</span><span class="l-id">Semua Postingan</span><span class="l-pl">Wszystkie wpisy</span><span class="l-it">Tutti i post</span><span class="l-ru">Все публикации</span><span class="l-zh">所有文章</span></h2>
  <div class="feed-row">
    <div class="feed-main">
      <span class="feed-name"><span class="l-ko">전체 글</span><span class="l-en">All posts</span><span class="l-ja">全記事</span><span class="l-es">Todas</span><span class="l-de">Alle</span><span class="l-fr">Tout</span><span class="l-pt">Todos</span><span class="l-tr">Tümü</span><span class="l-vi">Tất cả</span><span class="l-id">Semua postingan</span><span class="l-pl">Wszystkie wpisy</span><span class="l-it">Tutti i post</span><span class="l-ru">Все публикации</span><span class="l-zh">所有文章</span></span>
      <span class="feed-url" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat=""><?= gh($feedBase . ($__ghLang === 'ko' ? '' : '?lang=' . $__ghLang)) ?></span>
    </div>
    <div class="feed-actions">
      <a class="gbtn feed-open" href="<?= gh($feedBase . ($__ghLang === 'ko' ? '' : '?lang=' . $__ghLang)) ?>" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat="" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span><span class="l-id">Buka</span><span class="l-pl">Otwórz</span><span class="l-it">Apri</span><span class="l-ru">Открыть</span><span class="l-zh">開啟</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($feedBase . ($__ghLang === 'ko' ? '' : '?lang=' . $__ghLang)) ?>" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat=""><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span><span class="l-id">Salin</span><span class="l-pl">Kopiuj</span><span class="l-it">Copia</span><span class="l-ru">Копировать</span><span class="l-zh">複製</span></button>
    </div>
  </div>

  <?php if (!empty($cats)): ?>
  <h2><span class="l-ko">카테고리별 피드</span><span class="l-en">By Category</span><span class="l-ja">カテゴリー別</span><span class="l-es">Por Categoría</span><span class="l-de">Nach Kategorie</span><span class="l-fr">Par catégorie</span><span class="l-pt">Por categoria</span><span class="l-tr">Kategoriye göre</span><span class="l-vi">Theo danh mục</span><span class="l-id">Berdasarkan Kategori</span><span class="l-pl">Według kategorii</span><span class="l-it">Per categoria</span><span class="l-ru">По категориям</span><span class="l-zh">按類別</span></h2>
  <?php foreach ($cats as $key => $ci):
    $curl = $feedBase . '?category=' . $key . ($__ghLang === 'ko' ? '' : '&lang=' . $__ghLang);
    $icon = $catIcon[$key] ?? '📄';
  ?>
  <div class="feed-row">
    <div class="feed-main">
      <span class="feed-name"><span class="l-ko"><?= gh(cn($ci,'ko')) ?></span><span class="l-en"><?= gh(cn($ci,'en')) ?></span><span class="l-ja"><?= gh(cn($ci,'ja')) ?></span><span class="l-es"><?= gh(cn($ci,'es')) ?></span><span class="l-de"><?= gh(cn($ci,'de')) ?></span><span class="l-fr"><?= gh(cn($ci,'fr')) ?></span><span class="l-pt"><?= gh(cn($ci,'pt')) ?></span><span class="l-tr"><?= gh(cn($ci,'tr')) ?></span><span class="l-vi"><?= gh(cn($ci,'vi')) ?></span><span class="l-id"><?= gh(cn($ci,'en')) ?></span><span class="l-pl"><?= gh(cn($ci,'en')) ?></span><span class="l-it"><?= gh(cn($ci,'en')) ?></span><span class="l-ru"><?= gh(cn($ci,'en')) ?></span><span class="l-zh"><?= gh(cn($ci,'en')) ?></span></span>
      <span class="feed-url" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat="<?= gh($key) ?>"><?= gh($curl) ?></span>
    </div>
    <div class="feed-actions">
      <a class="gbtn feed-open" href="<?= gh($curl) ?>" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat="<?= gh($key) ?>" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span><span class="l-id">Buka</span><span class="l-pl">Otwórz</span><span class="l-it">Apri</span><span class="l-ru">Открыть</span><span class="l-zh">開啟</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($curl) ?>" data-feed-base="<?= gh($feedBase) ?>" data-feed-cat="<?= gh($key) ?>"><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span><span class="l-id">Salin</span><span class="l-pl">Kopiuj</span><span class="l-it">Copia</span><span class="l-ru">Копировать</span><span class="l-zh">複製</span></button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <h2><span class="l-ko">언어별 피드</span><span class="l-en">By Language</span><span class="l-ja">言語別</span><span class="l-es">Por Idioma</span><span class="l-de">Nach Sprache</span><span class="l-fr">Par langue</span><span class="l-pt">Por idioma</span><span class="l-tr">Dile göre</span><span class="l-vi">Theo ngôn ngữ</span><span class="l-id">Berdasarkan Bahasa</span><span class="l-pl">Według języka</span><span class="l-it">Per lingua</span><span class="l-ru">По языкам</span><span class="l-zh">按語言</span></h2>
  <?php foreach ($langs as $lc => $li): $lurl=$feedBase.'?lang='.$lc; ?>
  <div class="feed-row">
    <div class="feed-main">
      <span class="feed-name"><?= gh($li[1]) ?></span>
      <span class="feed-url"><?= gh($lurl) ?></span>
    </div>
    <div class="feed-actions">
      <a class="gbtn" href="<?= gh($lurl) ?>" target="_blank" rel="noopener"><span class="l-ko">열기</span><span class="l-en">Open</span><span class="l-ja">開く</span><span class="l-es">Abrir</span><span class="l-de">Öffnen</span><span class="l-fr">Ouvrir</span><span class="l-pt">Abrir</span><span class="l-tr">Aç</span><span class="l-vi">Mở</span><span class="l-id">Buka</span><span class="l-pl">Otwórz</span><span class="l-it">Apri</span><span class="l-ru">Открыть</span><span class="l-zh">開啟</span></a>
      <button class="gbtn gcopy" data-copy="<?= gh($lurl) ?>"><span class="l-ko">복사</span><span class="l-en">Copy</span><span class="l-ja">コピー</span><span class="l-es">Copiar</span><span class="l-de">Kopieren</span><span class="l-fr">Copier</span><span class="l-pt">Copiar</span><span class="l-tr">Kopyala</span><span class="l-vi">Sao chép</span><span class="l-id">Salin</span><span class="l-pl">Kopiuj</span><span class="l-it">Copia</span><span class="l-ru">Копировать</span><span class="l-zh">複製</span></button>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="note">
    <b><span class="l-ko">RSS가 처음이신가요?</span><span class="l-en">New to RSS?</span><span class="l-ja">RSSは初めてですか？</span><span class="l-es">¿Nuevo en RSS?</span><span class="l-de">Neu bei RSS?</span><span class="l-fr">Nouveau sur le RSS ?</span><span class="l-pt">Novo no RSS?</span><span class="l-tr">RSS’e yeni misiniz?</span><span class="l-vi">Mới dùng RSS?</span><span class="l-id">Baru mengenal RSS?</span><span class="l-pl">Nie znasz RSS?</span><span class="l-it">Non conosci RSS?</span><span class="l-ru">Впервые сталкиваетесь с RSS?</span><span class="l-zh">初次接觸 RSS？</span></b>
    <span class="l-ko"> Feedly·Inoreader 같은 무료 앱에 위 주소를 붙여넣으면 새 글이 자동으로 도착합니다. 파라미터는 조합할 수 있습니다 — 예: </span>
    <span class="l-en"> Paste the addresses above into a free app like Feedly or Inoreader. Parameters can be combined — e.g. </span>
    <span class="l-ja"> FeedlyやInoreaderなどの無料アプリに上記アドレスを貼り付けると自動で届きます。組み合わせ可能 — 例: </span>
    <span class="l-es"> Pega las direcciones en una app gratuita como Feedly. Se pueden combinar — ej.: </span>
    <span class="l-de"> Füge die Adressen in eine App wie Feedly ein. Kombinierbar — z. B.: </span><span class="l-fr"> Ajoutez les adresses dans une app comme Feedly. Combinables — par ex. : </span><span class="l-pt"> Adicione os endereços em um app como o Feedly. Combináveis — ex.: </span><span class="l-tr"> Adresleri Feedly gibi bir uygulamaya ekleyin. Birleştirilebilir — örn.: </span><span class="l-vi"> Thêm các địa chỉ vào ứng dụng như Feedly. Có thể kết hợp — ví dụ: </span><span class="l-id"> Tempelkan alamat di atas ke aplikasi gratis seperti Feedly atau Inoreader. Parameter dapat digabungkan — mis. </span><span class="l-pl"> Wklej powyższe adresy do bezpłatnej aplikacji, takiej jak Feedly lub Inoreader. Parametry można łączyć — np. </span><span class="l-it"> Incolla gli indirizzi qui sopra in un'app gratuita come Feedly o Inoreader. I parametri possono essere combinati — ad es. </span><span class="l-ru"> Вставьте приведённые выше адреса в бесплатное приложение, например Feedly или Inoreader. Параметры можно комбинировать — например, </span><span class="l-zh"> 將上方網址貼到 Feedly 或 Inoreader 等免費應用程式中。參數可以組合使用 — 例如 </span>
    <code><?= gh($feedBase) ?>?category=weekly&lang=en</code>
  </div>
</div>

<?php
$GUIDE_EXTRA_JS = "
// data-feed-base/data-feed-cat 를 가진 요소(전체·카테고리 피드)의 URL을 현재 언어로 갱신.
// 전체 피드: base + (ko면 '' / else '?lang=xx')
// 카테고리 피드: base + '?category=xx' + (ko면 '' / else '&lang=xx')
function updateFeedUrls(lang){
  document.querySelectorAll('[data-feed-base]').forEach(function(el){
    var base=el.getAttribute('data-feed-base');
    var cat=el.getAttribute('data-feed-cat')||'';
    var url;
    if(cat){ url=base+'?category='+cat+(lang==='ko'?'':'&lang='+lang); }
    else   { url=base+(lang==='ko'?'':'?lang='+lang); }
    if(el.classList.contains('feed-url')) el.textContent=url;
    if(el.tagName==='A') el.setAttribute('href',url);
    if(el.classList.contains('gcopy')) el.setAttribute('data-copy',url);
  });
}
// _guide_foot.php의 applyLang()이 언어 적용 후 이 콜백을 호출한다.
window.onGuideLang=function(lang){ updateFeedUrls(lang); };
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
