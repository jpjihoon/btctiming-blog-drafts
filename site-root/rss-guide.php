<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 사용자용 RSS 안내 페이지 (NYT /rss 스타일)
// 배포: /www/rss-guide.php → btctiming.com/rss-guide.php
//       (원하면 서버 리라이트로 /rss 로 매핑)
//
// 실제 피드 엔드포인트는 /blog/rss.php (별도 파일). 이 페이지는 그 피드들을 사람이
// 찾기 쉽게 카테고리·언어별로 안내한다.
// ═══════════════════════════════════════════════════════
header('Content-Type: text/html; charset=utf-8');

$root = __DIR__;
$baseUrl = 'https://btctiming.com';
$feedBase = $baseUrl . '/blog/rss.php';

// 카테고리 메타 (블로그 폴더에서 읽기)
$catFile = $root . '/blog/_category_meta.php';
$cats = file_exists($catFile) ? require $catFile : [];

// 언어 목록
$langs = [
    'ko' => ['🇰🇷', '한국어'],
    'en' => ['🇺🇸', 'English'],
    'ja' => ['🇯🇵', '日本語'],
    'es' => ['🇪🇸', 'Español'],
    'de' => ['🇩🇪', 'Deutsch'],
];

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>RSS 피드 · BTCtiming.com</title>
<meta name="description" content="BTCtiming.com 블로그의 RSS 피드 목록. 전체·카테고리별·언어별 피드를 구독하세요.">
<link rel="canonical" href="<?= h($baseUrl) ?>/rss-guide.php">
<style>
  :root{color-scheme:dark}
  *{box-sizing:border-box}
  body{margin:0;background:#09090b;color:#e4e4e7;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;line-height:1.7}
  a{color:#f7931a;text-decoration:none}
  a:hover{text-decoration:underline}
  .nav{border-bottom:1px solid rgba(255,255,255,.08);background:#0f0f11;position:sticky;top:0;z-index:10}
  .nav-in{max-width:860px;margin:0 auto;padding:14px 20px;display:flex;align-items:center;gap:14px}
  .logo{font-size:16px;font-weight:700;color:#f7931a}.logo span{color:#e4e4e7}
  .back{font-size:13px;color:#a1a1aa}
  .wrap{max-width:860px;margin:0 auto;padding:44px 20px 80px}
  .hero{margin-bottom:8px}
  .hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:4px 12px;margin-bottom:14px}
  h1{font-size:1.9rem;font-weight:800;margin:0 0 10px;letter-spacing:-.5px}
  .lead{font-size:15px;color:#a1a1aa;max-width:620px;margin:0 0 8px}
  h2{font-size:1.15rem;font-weight:700;margin:40px 0 14px;padding-bottom:8px;border-bottom:1px solid rgba(255,255,255,.08)}
  .feed-row{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:13px 16px;background:#131316;border:1px solid rgba(255,255,255,.07);border-radius:11px;margin-bottom:9px;flex-wrap:wrap}
  .feed-row:hover{border-color:rgba(247,147,26,.35)}
  .feed-name{font-weight:600;font-size:14.5px;display:flex;align-items:center;gap:9px;min-width:0}
  .feed-ico{font-size:16px;flex-shrink:0}
  .feed-url{font-size:12px;color:#71717a;font-family:ui-monospace,SFMono-Regular,Menlo,monospace;word-break:break-all}
  .feed-actions{display:flex;gap:8px;flex-shrink:0}
  .btn{font-size:12px;font-weight:600;padding:6px 12px;border-radius:8px;border:1px solid rgba(255,255,255,.12);background:#1a1a1e;color:#e4e4e7;cursor:pointer}
  .btn:hover{background:#f7931a;border-color:#f7931a;color:#0a0a0a;text-decoration:none}
  .btn-copy.copied{background:#22c55e;border-color:#22c55e;color:#0a0a0a}
  .note{margin-top:36px;padding:16px 18px;background:#131316;border:1px solid rgba(255,255,255,.07);border-radius:11px;font-size:13.5px;color:#a1a1aa}
  .note b{color:#e4e4e7}
  .lang-pills{display:flex;flex-wrap:wrap;gap:8px;margin:6px 0 0}
  .lang-pill{font-size:12.5px;padding:5px 11px;border-radius:999px;background:#1a1a1e;border:1px solid rgba(255,255,255,.1)}
  footer{max-width:860px;margin:0 auto;padding:20px;font-size:12px;color:#52525b;border-top:1px solid rgba(255,255,255,.06)}
</style>
</head>
<body>
<div class="nav"><div class="nav-in">
  <a href="/" class="logo">BTC<span>timing</span>.com</a>
  <a href="/blog/" class="back">← 블로그</a>
</div></div>

<div class="wrap">
  <div class="hero">
    <span class="hero-badge">📡 RSS</span>
    <h1>RSS 피드</h1>
    <p class="lead">피드리더(Feedly, Inoreader 등)에 아래 주소를 등록하면 새 글을 자동으로 받아볼 수 있습니다. 전체·카테고리별·언어별로 구독하세요.</p>
  </div>

  <h2>전체 피드</h2>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico">📰</span> 전체 글 (한국어)</div>
      <div class="feed-url"><?= h($feedBase) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($feedBase) ?>" target="_blank" rel="noopener">열기</a>
      <button class="btn btn-copy" data-copy="<?= h($feedBase) ?>">주소 복사</button>
    </div>
  </div>

  <?php if (!empty($cats)): ?>
  <h2>카테고리별 피드</h2>
  <?php foreach ($cats as $key => $ci):
      $curl = $feedBase . '?category=' . $key;
      $icon = ['weekly'=>'📊','news'=>'📈','coinnews'=>'🪙','column'=>'✍️','guide'=>'📖'][$key] ?? '📄';
  ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $icon ?></span> <?= h($ci['ko'] ?? $key) ?></div>
      <div class="feed-url"><?= h($curl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($curl) ?>" target="_blank" rel="noopener">열기</a>
      <button class="btn btn-copy" data-copy="<?= h($curl) ?>">주소 복사</button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <h2>언어별 피드</h2>
  <p class="lead" style="margin-bottom:14px">각 피드 주소 뒤에 <code>?lang=</code> 를 붙이면 해당 언어로 받아볼 수 있습니다.</p>
  <?php foreach ($langs as $lc => $li):
      $lurl = $feedBase . ($lc === 'ko' ? '' : '?lang=' . $lc);
  ?>
  <div class="feed-row">
    <div style="min-width:0">
      <div class="feed-name"><span class="feed-ico"><?= $li[0] ?></span> <?= h($li[1]) ?></div>
      <div class="feed-url"><?= h($lurl) ?></div>
    </div>
    <div class="feed-actions">
      <a class="btn" href="<?= h($lurl) ?>" target="_blank" rel="noopener">열기</a>
      <button class="btn btn-copy" data-copy="<?= h($lurl) ?>">주소 복사</button>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="note">
    <b>RSS가 처음이신가요?</b> RSS는 여러 사이트의 새 글을 한곳에서 모아 보는 방식입니다.
    Feedly·Inoreader 같은 무료 앱에 위 주소를 붙여넣으면 BTCtiming의 새 글이 자동으로 도착합니다.
    파라미터는 조합할 수 있습니다 — 예: <code><?= h($feedBase) ?>?category=weekly&lang=en</code> (영어 주간리포트만).
  </div>
</div>

<footer>© 2026 BTCtiming.com · <a href="/sitemap-guide.php" style="color:#71717a">사이트맵</a> · <a href="/blog/" style="color:#71717a">블로그</a></footer>

<script>
document.querySelectorAll('.btn-copy').forEach(function(b){
  b.addEventListener('click', function(){
    var txt = b.getAttribute('data-copy');
    var done = function(){ b.classList.add('copied'); var o=b.textContent; b.textContent='복사됨 ✓'; setTimeout(function(){b.classList.remove('copied');b.textContent=o;},1400); };
    if(navigator.clipboard && navigator.clipboard.writeText){ navigator.clipboard.writeText(txt).then(done).catch(done); }
    else { var ta=document.createElement('textarea');ta.value=txt;document.body.appendChild(ta);ta.select();try{document.execCommand('copy');}catch(e){}document.body.removeChild(ta);done(); }
  });
});
</script>
</body>
</html>
