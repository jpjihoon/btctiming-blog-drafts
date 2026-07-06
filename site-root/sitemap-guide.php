<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 사용자용 사이트맵 페이지 (NYT /sitemap 스타일)
// 배포: /www/sitemap-guide.php → btctiming.com/sitemap-guide.php
//
// 검색엔진용 XML 사이트맵(/sitemap.php)과 별개로, 사람이 사이트 구조를
// 한눈에 보고 원하는 글로 이동하도록 돕는 페이지.
// ═══════════════════════════════════════════════════════
header('Content-Type: text/html; charset=utf-8');

$root = __DIR__;
$baseUrl = 'https://btctiming.com';

// 카테고리 + 글 목록 로드
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];

$articles = [];
$artFile = $root . '/blog/_articles.php';
if (file_exists($artFile)) {
    require_once $artFile;
    if (function_exists('collectArticles')) {
        $articles = collectArticles($root . '/blog');
    }
}

// 카테고리별로 글 그룹핑
$byCat = [];
foreach ($articles as $a) {
    $c = $a['category'] ?? 'guide';
    $byCat[$c][] = $a;
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$catIcon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>사이트맵 · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 전체 페이지·카테고리·블로그 글 목록. 사이트 구조를 한눈에.">
<link rel="canonical" href="<?= h($baseUrl) ?>/sitemap-guide.php">
<style>
  :root{color-scheme:dark}
  *{box-sizing:border-box}
  body{margin:0;background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;line-height:1.7}
  a{color:#f7931a;text-decoration:none}
  a:hover{text-decoration:underline}
  .nav{border-bottom:1px solid rgba(255,255,255,.08);background:#0f0f11;position:sticky;top:0;z-index:10}
  .nav-in{max-width:900px;margin:0 auto;padding:14px 20px;display:flex;align-items:center;gap:14px}
  .logo{font-size:16px;font-weight:700;color:#f7931a}.logo span{color:#e4e4e7}
  .back{font-size:13px;color:#a1a1aa}
  .wrap{max-width:900px;margin:0 auto;padding:44px 20px 80px}
  .hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
  h1{font-size:1.9rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
  .lead{font-size:15px;color:#a1a1aa;max-width:620px;margin:0 0 8px}
  h2{font-size:1.15rem;font-weight:700;margin:38px 0 6px;display:flex;align-items:center;gap:9px}
  h2 .count{font-size:12px;font-weight:600;color:#71717a;background:#1a1a1e;border:1px solid rgba(255,255,255,.1);border-radius:999px;padding:2px 9px}
  .cat-desc{font-size:13px;color:#71717a;margin:0 0 14px}
  .main-links{display:flex;flex-wrap:wrap;gap:10px;margin:8px 0 8px}
  .main-links a{font-size:14px;font-weight:600;padding:9px 15px;border-radius:10px;background:#131316;border:1px solid rgba(255,255,255,.08)}
  .main-links a:hover{border-color:rgba(247,147,26,.4);text-decoration:none}
  ul.arts{list-style:none;padding:0;margin:0;display:grid;grid-template-columns:1fr 1fr;gap:2px 24px}
  ul.arts li{padding:7px 0;border-bottom:1px solid rgba(255,255,255,.05)}
  ul.arts li a{color:#d4d4d8;font-size:14px}
  ul.arts li a:hover{color:#f7931a}
  .date{font-size:11px;color:#52525b;margin-left:6px}
  @media(max-width:600px){ul.arts{grid-template-columns:1fr}}
  footer{max-width:900px;margin:0 auto;padding:20px;font-size:12px;color:#52525b;border-top:1px solid rgba(255,255,255,.06)}
</style>
</head>
<body>
<div class="nav"><div class="nav-in">
  <a href="/" class="logo">BTC<span>timing</span>.com</a>
  <a href="/blog/" class="back">← 블로그</a>
</div></div>

<div class="wrap">
  <span class="hero-badge">🗺 사이트맵</span>
  <h1>사이트맵</h1>
  <p class="lead">BTCtiming의 모든 페이지와 블로그 글을 한눈에 볼 수 있습니다. 원하는 글을 바로 찾아 이동하세요.</p>

  <h2>주요 페이지</h2>
  <div class="main-links">
    <a href="/">📊 실시간 지표 대시보드</a>
    <a href="/blog/">📰 블로그</a>
    <a href="/exchanges.php">🎁 거래소 비교</a>
    <a href="/rss-guide.php">📡 RSS 피드</a>
  </div>

  <?php
  // 카테고리 순서는 _category_meta.php 순서를 따르되, 글 있는 것만
  foreach ($cats as $key => $ci):
      $list = $byCat[$key] ?? [];
      if (empty($list)) continue;
      $icon = $catIcon[$key] ?? '📄';
      $catUrl = '/blog/?cat=' . $key;
  ?>
  <h2><?= $icon ?> <a href="<?= h($catUrl) ?>" style="color:inherit"><?= h($ci['ko'] ?? $key) ?></a> <span class="count"><?= count($list) ?></span></h2>
  <ul class="arts">
    <?php foreach ($list as $a):
        $slug = basename((string)($a['file'] ?? ''), '.php');
        if ($slug === '') continue;
        $title = $a['title_ko'] ?? ($a['title_en'] ?? $slug);
        $date = '';
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', (string)($a['date'] ?? ''), $m)) $date = str_replace('-', '.', $m[1]);
    ?>
    <li><a href="/blog/<?= h($slug) ?>.php"><?= h($title) ?></a><?php if($date): ?><span class="date"><?= h($date) ?></span><?php endif; ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endforeach; ?>

  <?php if (empty($articles)): ?>
  <p class="lead" style="margin-top:30px">아직 등록된 글이 없습니다.</p>
  <?php endif; ?>
</div>

<footer>© 2026 BTCtiming.com · <a href="/rss-guide.php" style="color:#71717a">RSS</a> · <a href="/sitemap.php" style="color:#71717a">XML 사이트맵</a> · <a href="/blog/" style="color:#71717a">블로그</a></footer>
</body>
</html>
