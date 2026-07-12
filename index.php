<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 목록 페이지 (동적 생성 + 카테고리 필터)
//
// 용도: blog/_meta.php에 등록된 모든 아티클을 최신순으로 카드로 보여줍니다.
//       새 글을 추가해도 이 파일은 손댈 필요가 없습니다.
//
// 새 글 추가 방법:
//   1) _meta.php에 항목 하나 추가
//   2) blog/{slug}.php 생성 — 맨 위에 $slug 지정 + _header.php/_footer.php
//      include, 그 사이에 본문만 작성
//
// 정렬: date 필드 기준 최신순.
// 카테고리 탭: 실제 글이 1개라도 있는 카테고리만 자동으로 노출됩니다.
// ═══════════════════════════════════════════════════════

header('Content-Type: text/html; charset=utf-8');
if(!headers_sent()){ header('Cache-Control: no-cache, must-revalidate'); }
require_once __DIR__ . '/_articles.php';
require_once __DIR__ . '/../config.php';
@include_once __DIR__ . '/../coin_meta.php';
// 코인 전환 시트용 데이터
$__blogCoins = [];
if (defined('COIN_SYMBOLS')) {
    foreach (COIN_SYMBOLS as $__id => $__sym) {
        if (function_exists('coinMeta')) { $__m = coinMeta($__id); }
        else { $__m = ['name' => $__id, 'color' => 'var(--t2)']; }
        $__blogCoins[] = ['id' => $__id, 'name' => $__m['name'], 'color' => $__m['color']];
    }
}
$__blogCoinsJson = json_encode($__blogCoins, JSON_UNESCAPED_UNICODE);

$articles = collectArticles(__DIR__);
// 목록 날짜: 24h 이내는 언어별 상대시간(서버 렌더 → 깜빡임 없음), 그 이상은 절대날짜.
function renderCardHtml(array $a, int $idx, string $blLang): string {
    $icon = $a['icon'] ?? '📄';
    $color = $a['color'] ?? '#f7931a';
    $cat = $a['category'];
    $catColor = CATEGORY_META[$cat]['color'] ?? '#f7931a';
    $cardLangs = array_keys(SUPPORTED_LANGS);
    $catVal   = fn($l) => CATEGORY_META[$cat][$l] ?? (CATEGORY_META[$cat]['en'] ?? $cat);
    $tagVal   = fn($l) => $a["tag_{$l}"]   ?? ($a['tag_en']   ?? '');
    $titleVal = fn($l) => $a["title_{$l}"] ?? ($a['title_en'] ?? '');
    $descVal  = fn($l) => $a["desc_{$l}"]  ?? ($a['desc_en']  ?? '');
    $readVal  = fn($l) => $a["read_{$l}"]  ?? ($a['read_en']  ?? '');
    $readFmt = ['ko'=>fn($r)=>$r===''?'':"📖 {$r}분 읽기",'en'=>fn($r)=>$r===''?'':"📖 {$r} min read",'ja'=>fn($r)=>$r===''?'':"📖 {$r}分で読める",'es'=>fn($r)=>$r===''?'':"📖 {$r} min de lectura",'de'=>fn($r)=>$r===''?'':"📖 {$r} Min. Lesezeit",'fr'=>fn($r)=>$r===''?'':"📖 {$r} min de lecture",'pt'=>fn($r)=>$r===''?'':"📖 {$r} min de leitura",'tr'=>fn($r)=>$r===''?'':"📖 {$r} dk okuma",'vi'=>fn($r)=>$r===''?'':"📖 {$r} phút đọc"];
    $clsOf = fn($l) => ($l === 'ko') ? 'ko' : ($l . '-show');
    $styOf = fn($l) => ''; // 표시는 CSS(!important)가 제어 → AJAX 카드도 언어전환 정상
    ob_start(); ?>
    <a href="/blog/<?= h($a['file']) ?>" class="article-card" data-cat="<?= h($cat) ?>" data-idx="<?= $idx ?>" style="--accent:<?= h($color) ?>;--cat-color:<?= h($catColor) ?>">
      <div class="card-icon"><?= $icon ?></div>
      <div class="card-body">
        <div class="card-tagrow">
          <span class="card-cat"><?php foreach ($cardLangs as $l) echo '<span class="'.$clsOf($l).'"'.$styOf($l).'>'.h($catVal($l)).'</span>'; ?></span>
          <?php foreach ($cardLangs as $l) echo '<span class="card-tag '.$clsOf($l).'"'.$styOf($l).'>'.h($tagVal($l)).'</span>'; ?>
        </div>
        <?php foreach ($cardLangs as $l) echo '<div class="card-title '.$clsOf($l).'"'.$styOf($l).'>'.h($titleVal($l)).'</div>'; ?>
        <?php foreach ($cardLangs as $l) echo '<div class="card-desc '.$clsOf($l).'"'.$styOf($l).'>'.h($descVal($l)).'</div>'; ?>
        <div class="card-meta">
          <?= relDateSpans($a['date'] ?? '', $blLang) ?>
          <?php foreach ($cardLangs as $l) { $fmt = $readFmt[$l] ?? $readFmt['en']; echo '<span class="'.$clsOf($l).'"'.$styOf($l).'>'.h($fmt($readVal($l))).'</span>'; } ?>
        </div>
      </div>
      <div class="card-arrow">→</div>
    </a>
    <?php return ob_get_clean();
}

function getPopularSlugs(array $articles, int $need = 5): array {
    $cacheFile = sys_get_temp_dir() . '/btc_blog_popular.json';
    if (is_readable($cacheFile) && (time() - @filemtime($cacheFile) < 180)) {
        $c = json_decode(@file_get_contents($cacheFile), true);
        if (is_array($c) && count($c) >= 1) return array_slice($c, 0, $need);
    }
    $result = [];
    $url = 'https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app/blogViewsHourly.json';
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_TIMEOUT_MS=>700, CURLOPT_CONNECTTIMEOUT_MS=>400, CURLOPT_SSL_VERIFYPEER=>false]);
        $raw = curl_exec($ch); curl_close($ch);
        $data = $raw ? json_decode($raw, true) : null;
        if (is_array($data)) {
            $sumWin = function(int $hours) use ($data): array {
                $ok = []; for ($x=0; $x<$hours; $x++) { $ok[gmdate('YmdH', time()-$x*3600)] = 1; }
                $out = [];
                foreach ($data as $slug=>$buckets) {
                    if (!is_array($buckets)) continue;
                    $s = 0; foreach ($buckets as $b=>$c) { if (isset($ok[$b])) $s += (int)$c; }
                    if ($s > 0) $out[$slug] = $s;
                }
                arsort($out); return array_keys($out);
            };
            $ranked = $sumWin(24);
            if (count($ranked) < $need) $ranked = $sumWin(48);
            $result = $ranked;
        }
    }
    // 부족하면 최신글로 채움
    if (count($result) < $need) {
        foreach ($articles as $a) {
            $slug = basename($a['file'] ?? '', '.php');
            if ($slug !== '' && !in_array($slug, $result, true)) $result[] = $slug;
            if (count($result) >= $need) break;
        }
    }
    $result = array_slice($result, 0, $need);
    @file_put_contents($cacheFile, json_encode($result));
    return $result;
}
function relDateSpans(string $iso, string $curLang): string {
    $iso = trim($iso);
    if ($iso === '') return '';
    $ts = strtotime($iso . ' +0900');
    if ($ts === false) $ts = strtotime($iso);
    $now = time();
    $diff = ($ts === false) ? PHP_INT_MAX : ($now - $ts);
    if ($ts === false || $diff >= 86400 || $diff < -3600) {
        return '<span class="card-date">📅 ' . h(displayDate($iso)) . '</span>';
    }
    $m = intdiv($diff, 60); $hh = intdiv($diff, 3600);
    $L = [
        'ko'=>($m<1?'방금':($hh<1?"{$m}분 전":"{$hh}시간 전")),
        'en'=>($m<1?'just now':($hh<1?"{$m}m ago":"{$hh}h ago")),
        'ja'=>($m<1?'たった今':($hh<1?"{$m}分前":"{$hh}時間前")),
        'es'=>($m<1?'ahora':($hh<1?"hace {$m} min":"hace {$hh} h")),
        'de'=>($m<1?'gerade':($hh<1?"vor {$m} Min.":"vor {$hh} Std.")),
        'fr'=>($m<1?'à l’instant':($hh<1?"il y a {$m} min":"il y a {$hh} h")),
        'pt'=>($m<1?'agora':($hh<1?"há {$m} min":"há {$hh} h")),
        'tr'=>($m<1?'az önce':($hh<1?"{$m} dk önce":"{$hh} sa önce")),
        'vi'=>($m<1?'vừa xong':($hh<1?"{$m} phút trước":"{$hh} giờ trước")),
    ];
    $out='';
    foreach (array_keys(SUPPORTED_LANGS) as $l) {
        $cls = ($l==='ko') ? 'ko' : ($l.'-show');
        $sty = ''; // CSS 제어
        $txt = $L[$l] ?? $L['en'];
        $out .= '<span class="card-date '.$cls.'"'.$sty.'>🕒 '.h($txt).'</span>';
    }
    return $out;
}


// 실제 존재하는 카테고리만 탭으로 노출 (CATEGORY_META 순서를 따름)
$presentCats = array_unique(array_column($articles, 'category'));
$tabs = array_filter(array_keys(CATEGORY_META), fn($c) => in_array($c, $presentCats, true));
// URL ?cat= 을 서버가 읽어 첫 렌더부터 해당 카테고리만 표시(전체→카테고리 깜빡임 방지)
$__cat = (isset($_GET['cat']) && in_array($_GET['cat'], $presentCats, true)) ? $_GET['cat'] : 'all';
$__page = max(1, (int)($_GET['page'] ?? 1));
$__initCount = $__page * 12; // 새로고침 시 봤던 만큼 유지

// 초기 언어 결정: URL ?lang= 를 서버에서 읽어 <html>에 처음부터 반영(깜빡임 방지).
// localStorage 기반 최종 복원은 아래 restoreBlogLang() JS가 담당한다.
// 언어 결정: URL ?lang 우선 → 없으면 쿠키(blogLang, 마지막 선택) → ko.
$__blLang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
// 더보기 AJAX: 해당 카테고리의 offset부터 12개 카드 HTML만 반환
if (($_GET['ajax'] ?? '') === 'cards') {
    $__f = ($__cat === 'all') ? array_values($articles) : array_values(array_filter($articles, fn($x) => ($x['category'] ?? '') === $__cat));
    $__off = max(0, (int)($_GET['offset'] ?? 0));
    foreach (array_slice($__f, $__off, 12) as $__k => $__a) { echo renderCardHtml($__a, $__off + $__k, $__blLang); }
    exit;
}
?>
<!DOCTYPE html>
<html lang="<?= h($__blLang) ?>"<?= $__blLang !== 'ko' ? ' class="'.h($__blLang).'"' : '' ?> id="html-root">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD01B9SL3K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-VD01B9SL3K');
</script>

<meta charset="UTF-8">
<link rel="icon" type="image/png" sizes="any" href="data:image/png;base64,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">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>블로그 — 비트코인 분석 인사이트 | BTCtiming.com</title>
<meta name="description" content="비트코인 온체인 지표 가이드, 시황분석, 칼럼을 한곳에서. MVRV Z-Score, Hash Ribbon, 반감기 타이밍 등 실전 투자에 바로 활용할 수 있는 분석 글을 제공합니다.">
<link rel="canonical" href="https://btctiming.com/blog/">
<!-- Open Graph (언어별 OG 이미지) -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= h('블로그 — 비트코인 분석 인사이트 | BTCtiming.com') ?>">
<meta property="og:image" content="https://btctiming.com/og-image-<?= h($__blLang) ?>.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="https://btctiming.com/blog/">
<meta property="og:site_name" content="BTCtiming.com">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="https://btctiming.com/og-image-<?= h($__blLang) ?>.png">
<style>:root{--bg:#0a0a0c;--bg2:#141418;--bg3:#1b1b21;--bg4:#24242b;--b1:rgba(255,255,255,.07);--b2:rgba(255,255,255,.12);--b3:rgba(255,255,255,.18);--t1:#f2f2f5;--t2:#9a9aa4;--t3:#63636d;--t4:#2a2a30;--green:#22c55e;--yellow:#f59e0b;--orange:#f7931a;--red:#ef4444;--blue:#60a5fa;--purple:#a78bfa;--pink:#f472b6;--rad:12px;--rad-sm:8px;--rad-lg:16px}
.exch-banner{display:flex;align-items:center;gap:10px;text-decoration:none;background:var(--bg2);border:1px solid var(--b2);border-radius:12px;padding:14px 15px;transition:border-color .15s}
.exch-banner:hover{border-color:rgba(247,147,26,.7)}
.exch-banner:active{transform:scale(.99)}
.exch-banner-tx{display:flex;flex-direction:column;gap:2px;line-height:1.3;flex:1;min-width:0}
.exch-banner-tx b{font-size:13px;color:var(--t1);font-weight:700;letter-spacing:-.2px}
.exch-banner-tx span{font-size:11px;color:var(--t3)}
.exch-banner-ar{color:var(--t3);font-weight:700;font-size:18px;flex-shrink:0;line-height:1}


/* ===== 뉴스허브 레이아웃 (목록) ===== */
.wrap{max-width:1120px}
@media(min-width:861px){.wrap{display:grid;grid-template-columns:1fr 320px;gap:36px;align-items:start}.blog-main{grid-column:1;grid-row:1}.blog-side{grid-column:2;grid-row:1}.cta-main{grid-column:1/-1}.blog-main{min-width:0}}
.cat-tabs{max-width:1120px}
/* 리드 스토리 = 세로 미리보기(킥커→제목→발췌→메타) */
#articleGrid .article-card[data-idx="0"]{flex-direction:column;align-items:stretch;padding:26px;gap:0}
#articleGrid .article-card[data-idx="0"] .card-icon{width:46px;height:46px;font-size:23px;margin-bottom:14px}
#articleGrid .article-card[data-idx="0"] .card-tagrow{margin-bottom:11px}
#articleGrid .article-card[data-idx="0"] .card-cat span{color:var(--orange);font-weight:800}
#articleGrid .article-card[data-idx="0"] .card-title{font-size:1.6rem;line-height:1.25;margin-bottom:12px}
#articleGrid .article-card[data-idx="0"] .card-desc{font-size:15px;line-height:1.7;margin-bottom:12px;-webkit-line-clamp:5}
#articleGrid .article-card[data-idx="0"] .card-arrow{display:none}
.side-more{display:block;text-align:center;margin-top:10px;font-size:12px;font-weight:700;color:var(--orange);border:1px solid var(--b1);border-radius:6px;padding:8px;text-decoration:none}
.side-more:hover{border-color:rgba(247,147,26,.4)}
@media(max-width:560px){#articleGrid .article-card[data-idx="0"] .card-title{font-size:1.3rem}}
.blog-side{display:flex;flex-direction:column;gap:26px}
.blog-side .sec-h{font-size:11.5px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--t3);margin:0 0 12px;padding-bottom:8px;border-bottom:1px solid var(--b1)}
.pop-item{display:flex;gap:11px;padding:10px 0;border-bottom:1px solid var(--b1);align-items:baseline;text-decoration:none;color:inherit}
.pop-card{display:flex;gap:10px;align-items:flex-start;padding:12px;background:var(--bg2);border:1px solid var(--b1);border-left:3px solid var(--b2);border-radius:8px;text-decoration:none;color:inherit;margin-bottom:8px;transition:border-color .12s,background .12s,transform .12s}
.pop-card:last-child{margin-bottom:0}
.pop-card:hover{border-color:var(--icard-accent,var(--orange));background:var(--bg3);transform:translateY(-2px)}
.pop-card-icon{flex-shrink:0;font-size:16px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;background:var(--icard-accent-bg,rgba(247,147,26,.14));border-radius:8px}
.pop-card-main{display:flex;flex-direction:column;gap:3px;min-width:0}
.pop-card-cat{font-size:10px;font-weight:700;color:var(--t2)}
.pop-card-title{font-size:11.5px;color:var(--t1);line-height:1.4;font-weight:600;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.pop-card-date{font-size:9px;color:var(--t3);margin-top:1px}
.pop-item:last-child{border-bottom:none}
.pop-n{flex-shrink:0;width:20px;text-align:center;font-size:16px;font-weight:800;color:var(--t3)}
.pop-item:nth-child(1) .pop-n{color:var(--orange)}
.pop-t{font-size:13px;font-weight:600;line-height:1.4;color:var(--t1)}
.pop-item:hover .pop-t{color:var(--orange)}
.side-card{background:var(--bg2);border:1px solid var(--b1);border-radius:10px;padding:16px}
.side-score{text-align:center}.side-score .lab{font-size:11px;color:var(--t2);margin-bottom:8px}
.side-score .cta{display:block;background:var(--orange);color:#0a0a0a;font-weight:700;font-size:13px;border-radius:6px;padding:10px;text-decoration:none}
.side-terms{display:flex;flex-wrap:wrap;gap:7px}
.side-terms a{font-size:12px;color:var(--t2);background:var(--bg2);border:1px solid var(--b1);border-radius:6px;padding:6px 10px;text-decoration:none}
.side-terms a:hover{color:var(--orange);border-color:rgba(247,147,26,.4)}
.side-exch{background:linear-gradient(135deg,rgba(247,147,26,.13),rgba(247,147,26,.04));border:1px solid rgba(247,147,26,.35);border-radius:10px;padding:15px}
.side-exch h4{font-size:14px;margin:0 0 4px}.side-exch p{font-size:11.5px;color:var(--t2);margin:0 0 10px}
.side-exch .pct{color:var(--orange);font-weight:800}
.side-exch a{display:block;text-align:center;background:var(--bg3);color:var(--t1);font-weight:700;font-size:12.5px;border:1px solid var(--b2);border-radius:6px;padding:8px;text-decoration:none}
@media(max-width:860px){.wrap{display:flex;flex-direction:column}.blog-main{order:1}.blog-side{order:2;margin-top:34px}.cta-main{order:3}}

.blog-head{max-width:1120px;margin:0 auto;padding:26px 24px 2px;text-align:left}
.blog-head h1{font-size:1.5rem;font-weight:800;letter-spacing:-.3px;color:var(--t1);margin:0}
/* FOUC 완화: 날짜는 JS 포맷 전 살짝 흐리게 → 적용되면 선명 */
.card-date{transition:opacity .12s}




*{box-sizing:border-box;margin:0;padding:0}
body{background:#0a0a0c;color:#f2f2f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:16px;line-height:1.8}
a{color:#f7931a;text-decoration:none}a:hover{text-decoration:underline}
nav{background:#141418;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px}.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{display:inline-flex;align-items:center;gap:7px;font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f2f2f5}.logo span{color:#f59e0b}.logo-ic{flex-shrink:0}
.back{font-size:13px;color:var(--t2);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.lang-dropdown{position:relative;flex-shrink:0;margin-left:auto}
.lang-trigger{display:flex;align-items:center;gap:4px;height:32px;padding:0 10px;background:#1b1b21;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;color:#f2f2f5;font-size:11px;font-weight:600;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#24242b}
.lang-caret{font-size:9px;color:var(--t2);transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#1b1b21;
  border:1px solid rgba(255,255,255,.15);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:#9a9aa4;font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#24242b;color:#f2f2f5}
.lang-menu-item.active{color:#f7931a;background:rgba(247,147,26,.08)}

/* ── 히어로 영역 ── */
.hero{position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);
  background:radial-gradient(ellipse 900px 400px at 15% -10%,rgba(247,147,26,.16),transparent 60%),
             radial-gradient(ellipse 700px 350px at 90% 0%,rgba(96,165,250,.10),transparent 60%),#0a0a0c}
.hero-inner{max-width:800px;margin:0 auto;padding:56px 24px 40px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#f7931a;
  background:rgba(247,147,26,.1);border:1px solid rgba(247,147,26,.25);border-radius:999px;padding:5px 12px;margin-bottom:18px}
h1{font-size:2.1rem;font-weight:800;margin-bottom:10px;color:#f2f2f5;letter-spacing:-.5px}
.sub{font-size:15px;color:var(--t2);max-width:520px}

/* ── 카테고리 필터 탭 ── */
.cat-tabs{display:flex;gap:8px;flex-wrap:wrap;max-width:1120px;margin:10px auto 0;padding:0 24px}
.cat-tab{font-size:13px;font-weight:600;padding:7px 16px;border-radius:999px;border:1px solid rgba(255,255,255,.1);
  background:#141418;color:#9a9aa4;cursor:pointer;transition:all .15s;white-space:nowrap}
.cat-tab:hover{border-color:rgba(255,255,255,.25);color:#f2f2f5}
.cat-tab.active{background:var(--cat-color,#f7931a);border-color:var(--cat-color,#f7931a);color:#000}

.wrap{max-width:1120px;margin:0 auto;padding:28px 24px 80px}
.article-grid{display:grid;gap:14px;overflow-anchor:none}
body{overflow-anchor:none}
.article-card{background:#141418;border:1px solid rgba(255,255,255,.07);border-radius:14px;
  padding:22px;transition:border-color .18s,transform .18s,background .18s;
  display:flex;gap:18px;align-items:flex-start;color:inherit}
.article-card:hover{border-color:var(--accent,rgba(247,147,26,.4));text-decoration:none;
  transform:translateY(-2px);background:#1b1b21}
.card-icon{flex-shrink:0;width:52px;height:52px;border-radius:12px;display:flex;align-items:center;
  justify-content:center;font-size:24px;background:color-mix(in srgb, var(--accent,#f7931a) 16%, #141418);
  border:1px solid color-mix(in srgb, var(--accent,#f7931a) 30%, transparent)}
.card-body{flex:1;min-width:0}
.card-tagrow{display:flex;align-items:center;gap:8px;margin-bottom:7px;flex-wrap:wrap}
.card-cat{font-size:10px;font-weight:700;color:var(--cat-color,#f7931a);letter-spacing:.05em;text-transform:uppercase;
  background:color-mix(in srgb, var(--cat-color,#f7931a) 16%, transparent);border-radius:5px;padding:2px 7px}
.card-tag{font-size:11px;font-weight:700;color:var(--accent,#f7931a);letter-spacing:.06em;text-transform:uppercase}
.card-title{font-size:1.08rem;font-weight:700;color:#f2f2f5;margin-bottom:6px;line-height:1.4}
.card-desc{font-size:13.5px;color:var(--t2);line-height:1.6;margin-bottom:12px;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;overflow:hidden}
.card-meta{font-size:12px;color:var(--t3);display:flex;gap:12px;align-items:center}
.card-arrow{flex-shrink:0;color:#3f3f46;font-size:18px;align-self:center;transition:transform .18s,color .18s}
.article-card:hover .card-arrow{transform:translateX(3px);color:var(--accent,#f7931a)}
.article-card.hidden{display:none}

.load-more{display:block;width:100%;margin-top:16px;padding:13px;background:#141418;
  border:1px dashed rgba(255,255,255,.15);border-radius:12px;color:#9a9aa4;font-size:13px;
  font-weight:600;cursor:pointer;transition:all .15s}
.load-more:hover{border-color:rgba(247,147,26,.4);color:#f7931a;background:#1b1b21}
#loadMoreCount{color:var(--t3);font-weight:400;margin-left:4px}

.cta-main{background:var(--bg2);border:1px solid var(--b1);border-radius:12px;padding:20px 24px;margin-top:40px;text-align:left;display:flex;align-items:center;justify-content:space-between;gap:24px}
.cta-tx{min-width:0}.cta-main h2{font-size:1rem;margin:0 0 4px;color:var(--t1);font-weight:700;line-height:1.35}
.cta-main p{color:var(--t3);font-size:13px;margin:0;line-height:1.5}
.cta-main a{flex-shrink:0;color:var(--orange);font-weight:700;font-size:13px;text-decoration:none;white-space:nowrap;padding:9px 16px;border:1px solid rgba(247,147,26,.3);border-radius:8px;transition:background .12s,border-color .12s}.cta-main a:hover{background:rgba(247,147,26,.1);border-color:rgba(247,147,26,.55)}
@media(max-width:600px){.cta-main{flex-direction:column;align-items:flex-start;gap:14px}.cta-main a{align-self:stretch;text-align:center}}
footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;text-align:center;font-size:11px;color:#666}
/* 언어 전환 — [lang] CSS 선택자 방식(개별 아티클 _header.php와 동일)으로 통일.
   푸터·본문 공통. SUPPORTED_LANGS 기반 자동 생성 → 언어 추가 시 이 파일 불변. */
<?php
$__langKeys = array_keys(SUPPORTED_LANGS);
// 푸터: 모든 언어 span 기본 숨김 → 현재 lang만 표시
echo 'footer ' . implode(',footer ', array_map(fn($l)=>'.'.$l, $__langKeys)) . "{display:none}\n";
$__footerShow = array_map(fn($l)=>'[lang="'.$l.'"] footer .'.$l, $__langKeys);
echo implode(',', $__footerShow) . "{display:inline}\n";
// 본문: body(html-root) className이 현재 언어. ko 외 언어일 때 .ko 숨김 + 해당 .{lang}-show 표시.
// -show 스팬 기본 숨김(활성 언어만 아래에서 표시). inline display:none 제거해도 ko 뷰에서 안 새게.
echo implode(',', array_map(fn($l)=>'.'.$l.'-show', array_filter($__langKeys, fn($l)=>$l!=='ko'))) . "{display:none!important}\n";
foreach ($__langKeys as $__l) {
    if ($__l === 'ko') continue;
    echo '.' . $__l . ' .ko{display:none!important}';
    echo '.' . $__l . ' .' . $__l . '-show{display:block!important}';
    // 다른 언어의 -show는 숨김
    foreach ($__langKeys as $__o) {
        if ($__o === 'ko' || $__o === $__l) continue;
        echo '.' . $__l . ' .' . $__o . '-show{display:none!important}';
    }
    echo "\n";
}
?>
.empty{color:var(--t3);font-size:14px;padding:24px 0}
@media(max-width:480px){
  .hero-inner{padding:40px 20px 28px}
  h1{font-size:1.6rem}
  .cat-tabs{margin-top:8px}
  .article-card{padding:16px;gap:12px}
  .card-icon{width:42px;height:42px;font-size:19px;border-radius:10px}
  .card-arrow{display:none}
}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/" class="logo" id="logoLink"><svg class="logo-ic" width="19" height="19" viewBox="0 0 64 64" aria-hidden="true"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>BTC<span>timing</span></a>
  <span class="back ko">← <a href="/" style="color:var(--t2)">실시간 분석으로 돌아가기</a></span>
  <span class="back en-show">← <a href="/?lang=en" style="color:var(--t2)">Back to Live Analysis</a></span>
  <span class="back ja-show">← <a href="/?lang=ja" style="color:var(--t2)">リアルタイム分析に戻る</a></span>
  <span class="back es-show">← <a href="/?lang=es" style="color:var(--t2)">Volver al Análisis en Vivo</a></span>
  <span class="back de-show">← <a href="/?lang=de" style="color:var(--t2)">Zurück zur Live-Analyse</a></span>
  <span class="back fr-show">← <a href="/?lang=fr" style="color:var(--t2)">Retour à l'analyse en direct</a></span>
  <span class="back pt-show">← <a href="/?lang=pt" style="color:var(--t2)">Voltar à análise ao vivo</a></span>
  <span class="back tr-show">← <a href="/?lang=tr" style="color:var(--t2)">Canlı analize dön</a></span>
  <span class="back vi-show">← <a href="/?lang=vi" style="color:var(--t2)">Quay lại phân tích trực tiếp</a></span>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
      <span id="langTriggerLabel"><?= h(strtoupper($__blLang)) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu" id="langMenu">
      <?php foreach (SUPPORTED_LANGS as $__lc => $__meta): ?>
      <button type="button" class="lang-menu-item<?= $__lc===$__blLang ? ' active' : '' ?>" data-lang="<?= h($__lc) ?>" onclick="setLang('<?= h($__lc) ?>', true)"><?= $__meta['flag'] ?? '' ?> <?= h($__meta['name'] ?? strtoupper($__lc)) ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>

<div class="blog-head">
  <h1 class="ko">블로그</h1>
  <h1 class="en-show">Blog</h1>
  <h1 class="ja-show">ブログ</h1>
  <h1 class="es-show">Blog</h1>
  <h1 class="de-show">Blog</h1>
  <h1 class="fr-show">Blog</h1>
  <h1 class="pt-show">Blog</h1>
  <h1 class="tr-show">Blog</h1>
  <h1 class="vi-show">Blog</h1>
</div>

<div class="cat-tabs" id="catTabs">
  <button class="cat-tab<?= $__cat==='all'?' active':'' ?>" data-cat="all" onclick="filterCat('all')">
    <span class="ko">전체</span><span class="en-show">All</span><span class="ja-show">全て</span><span class="es-show">Todo</span><span class="de-show">Alle</span><span class="fr-show">Tout</span><span class="pt-show">Todos</span><span class="tr-show">Tümü</span><span class="vi-show">Tất cả</span>
  </button>
<?php foreach ($tabs as $cat): $cm = CATEGORY_META[$cat]; ?>
  <button class="cat-tab<?= $__cat===$cat?' active':'' ?>" data-cat="<?= h($cat) ?>" style="--cat-color:<?= h($cm['color']) ?>" onclick="filterCat('<?= h($cat) ?>')">
    <span class="ko"><?= h($cm['ko']) ?></span><span class="en-show"><?= h($cm['en']) ?></span><span class="ja-show"><?= h($cm['ja'] ?? $cm['en']) ?></span><span class="es-show"><?= h($cm['es'] ?? $cm['en']) ?></span><span class="de-show"><?= h($cm['de'] ?? $cm['en']) ?></span><span class="fr-show"><?= h($cm['fr'] ?? $cm['en']) ?></span><span class="pt-show"><?= h($cm['pt'] ?? $cm['en']) ?></span><span class="tr-show"><?= h($cm['tr'] ?? $cm['en']) ?></span><span class="vi-show"><?= h($cm['vi'] ?? $cm['en']) ?></span>
  </button>
<?php endforeach; ?>
</div>

<div class="wrap">
  <aside class="blog-side">
    <a href="/exchanges.php<?= h(langSuffix($__blLang)) ?>" class="exch-banner">
      <span style="width:3px;align-self:stretch;background:var(--orange);border-radius:2px;flex-shrink:0"></span>
      <span class="exch-banner-tx">
        <b><span class="ko">어떤 거래소로 시작할까?</span><span class="en-show">Which exchange to start with?</span><span class="ja-show">取引所はどこから?</span><span class="es-show">¿Qué exchange elegir?</span><span class="de-show">Welche Börse?</span><span class="fr-show">Quelle plateforme ?</span><span class="pt-show">Qual corretora?</span><span class="tr-show">Hangi borsa?</span><span class="vi-show">Sàn nào để bắt đầu?</span></b>
        <span><span class="ko">바이낸스·바이비트 비교 + 최대 20% 수수료 할인</span><span class="en-show">Compare Binance & Bybit + up to 20% fee discount</span><span class="ja-show">Binance・Bybit 比較 + 最大20%割引</span><span class="es-show">Binance y Bybit + hasta 20% descuento</span><span class="de-show">Binance & Bybit + bis zu 20% Rabatt</span><span class="fr-show">Binance & Bybit + jusqu’à 20% de réduction</span><span class="pt-show">Binance e Bybit + até 20% de desconto</span><span class="tr-show">Binance & Bybit + %20’ye varan indirim</span><span class="vi-show">Binance & Bybit + giảm phí tới 20%</span></span>
      </span>
      <span class="exch-banner-ar">›</span>
    </a>
    
    <div><h3 class="sec-h"><span class="ko">많이 본 글</span><span class="en-show">Most Read</span><span class="ja-show">よく読まれた記事</span><span class="es-show">Más leídos</span><span class="de-show">Meistgelesen</span><span class="fr-show">Les plus lus</span><span class="pt-show">Mais lidos</span><span class="tr-show">En çok okunan</span><span class="vi-show">Đọc nhiều nhất</span></h3><div id="popularList"><?php
      $__popSlugs = getPopularSlugs($articles, 5);
      $__bySlug = [];
      foreach ($articles as $__a2) { $__bySlug[basename($__a2['file'] ?? '', '.php')] = $__a2; }
      foreach ($__popSlugs as $__ps) {
          $__pa = $__bySlug[$__ps] ?? null; if (!$__pa) continue;
          $__pi = $__pa['icon'] ?? '📄';
          $__pc = $__pa['color'] ?? '#f7931a';
          $__pcat = $__pa['category'] ?? '';
          echo '<a href="/blog/'.h($__pa['file']).'" class="pop-card" style="--icard-accent-bg:'.h($__pc).'26;--icard-accent:'.h($__pc).'">';
          echo '<span class="pop-card-icon">'.$__pi.'</span>';
          echo '<span class="pop-card-main">';
          echo '<span class="pop-card-cat">';
          foreach (array_keys(SUPPORTED_LANGS) as $__pl) {
              $__cls = ($__pl==='ko')?'ko':($__pl.'-show');
              $__cv = CATEGORY_META[$__pcat][$__pl] ?? (CATEGORY_META[$__pcat]['en'] ?? $__pcat);
              echo '<span class="'.$__cls.'">'.h($__cv).'</span>';
          }
          echo '</span>';
          echo '<span class="pop-card-title">';
          foreach (array_keys(SUPPORTED_LANGS) as $__pl) {
              $__cls = ($__pl==='ko')?'ko':($__pl.'-show');
              $__tt = $__pa["title_{$__pl}"] ?? ($__pa['title_en'] ?? '');
              echo '<span class="'.$__cls.'">'.h($__tt).'</span>';
          }
          echo '</span>';
          echo '<span class="pop-card-date">'.h(displayDate($__pa['date'] ?? '')).'</span>';
          echo '</span></a>';
      }
      ?></div></div>
  </aside>
  <div class="blog-main">
  <div class="article-grid" id="articleGrid">
<?php if (empty($articles)): ?>
    <div class="empty ko">아직 등록된 글이 없습니다.</div>
    <div class="empty en-show">No articles yet.</div>
    <div class="empty ja-show">まだ記事がありません。</div>
    <div class="empty es-show">Aún no hay artículos.</div>
    <div class="empty de-show">Noch keine Artikel vorhanden.</div>
    <div class="empty fr-show">Aucun article pour le moment.</div>
    <div class="empty pt-show">Ainda não há artigos.</div>
    <div class="empty tr-show">Henüz yazı yok.</div>
    <div class="empty vi-show">Chưa có bài viết nào.</div>
<?php else:
    $__filtered = ($__cat === 'all') ? array_values($articles) : array_values(array_filter($articles, fn($x) => ($x['category'] ?? '') === $__cat));
    foreach (array_slice($__filtered, 0, $__initCount) as $__k => $a) { echo renderCardHtml($a, $__k, $__blLang); }
endif; ?>
  </div>

  <?php $__totalFiltered = ($__cat==='all') ? count($articles) : count(array_filter($articles, fn($x)=>($x['category']??'')===$__cat)); $__more = max(0, $__totalFiltered - $__initCount); ?><button class="load-more" id="loadMoreBtn" onclick="loadMore()" style="<?= $__more>0?'':'display:none' ?>">
    <span class="ko">더 보기</span><span class="en-show">Load More</span><span class="ja-show">もっと見る</span><span class="es-show">Ver Más</span><span class="de-show">Mehr laden</span><span class="fr-show">Voir plus</span><span class="pt-show">Ver mais</span><span class="tr-show">Daha fazla</span><span class="vi-show">Xem thêm</span>
    <span id="loadMoreCount"><?= $__more>0 ? '('.min($__more,12).')' : '' ?></span>
  </button>
  </div><!-- /blog-main -->

  

  <div class="cta-main">
    <div class="cta-tx">
    <h2 class="ko">지금 비트코인 타이밍 실시간 확인하기</h2>
    <h2 class="en-show">Check Bitcoin Timing Score Live</h2>
    <h2 class="ja-show">今すぐビットコインタイミングをリアルタイムで確認</h2>
    <h2 class="es-show">Consulta el Timing de Bitcoin en Vivo</h2>
    <h2 class="de-show">Bitcoin-Timing jetzt live prüfen</h2>
    <h2 class="fr-show">Vérifiez le timing Bitcoin en direct</h2>
    <h2 class="pt-show">Confira o timing do Bitcoin ao vivo</h2>
    <h2 class="tr-show">Bitcoin zamanlamasını şimdi canlı kontrol et</h2>
    <h2 class="vi-show">Kiểm tra thời điểm Bitcoin trực tiếp</h2>
    <p class="ko">위 지표들을 종합한 0~10점 매수·매도 점수를 실시간으로 무료로 확인하세요.</p>
    <p class="en-show">Get a live 0–10 buy/sell score combining all the indicators above — free.</p>
    <p class="ja-show">上記の指標を統合した0〜10点の売買スコアをリアルタイムで無料確認できます。</p>
    <p class="es-show">Consulta en tiempo real la puntuación de compra/venta de 0-10 combinando todos los indicadores anteriores — gratis.</p>
    <p class="de-show">Erhalte in Echtzeit einen 0-10-Kauf-/Verkaufs-Score, der alle obigen Indikatoren kombiniert — kostenlos.</p>
    <p class="fr-show">Obtenez en direct un score d'achat/vente de 0 à 10 combinant tous les indicateurs ci-dessus — gratuit.</p>
    <p class="pt-show">Obtenha ao vivo uma pontuação de compra/venda de 0-10 combinando todos os indicadores acima — grátis.</p>
    <p class="tr-show">Yukarıdaki tüm göstergeleri birleştiren 0-10 alım/satım puanını canlı ve ücretsiz alın.</p>
    <p class="vi-show">Nhận điểm mua/bán 0–10 trực tiếp kết hợp tất cả các chỉ báo trên — miễn phí.</p>
    </div>
    <a href="/" class="ko">실시간 분석 보러가기 →</a>
    <a href="/?lang=en" class="en-show">Go to Live Analysis →</a>
    <a href="/?lang=ja" class="ja-show">リアルタイム分析を見る →</a>
    <a href="/?lang=es" class="es-show">Ver Análisis en Vivo →</a>
    <a href="/?lang=de" class="de-show">Live-Analyse ansehen →</a>
    <a href="/?lang=fr" class="fr-show">Voir l'analyse en direct →</a>
    <a href="/?lang=pt" class="pt-show">Ver análise ao vivo →</a>
    <a href="/?lang=tr" class="tr-show">Canlı analizi gör →</a>
    <a href="/?lang=vi" class="vi-show">Xem phân tích trực tiếp →</a>
  </div>
</div>
<?php require __DIR__ . '/../_shared_footer.php'; ?>
<script>window.BT_SUPPORTED_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;</script>
<script src="/lang-common.js"></script>
<script>
function relTimeText(dateStr, lang){
  try{
    if(!dateStr) return null;
    var d = new Date(dateStr.replace(' ','T')+'+09:00'); // KST 기준
    if(isNaN(d.getTime())) return null;
    var diff = (Date.now() - d.getTime())/1000; if(diff<0) diff=0;
    if(!(typeof Intl!=='undefined' && Intl.RelativeTimeFormat)) return null;
    var rtf = new Intl.RelativeTimeFormat(lang||'ko',{numeric:'auto'});
    if(diff<60)       return '🕒 '+rtf.format(-Math.round(diff),'second');
    if(diff<3600)     return '🕒 '+rtf.format(-Math.round(diff/60),'minute');
    if(diff<86400)    return '🕒 '+rtf.format(-Math.round(diff/3600),'hour');
    return '📅 '+d.toLocaleDateString(lang||'ko',{year:'numeric',month:'2-digit',day:'2-digit'}); // 오래되면 날짜
  }catch(e){ return null; }
}

function applyRelTimes(lang){
  document.querySelectorAll('.card-date[data-date]').forEach(function(el){
    var txt = relTimeText(el.getAttribute('data-date'), lang);
    if(txt) el.textContent = txt;
  });
}
function setLang(lang, doSave) {
  const root = document.getElementById('html-root');
  root.className = lang;
  root.lang = lang;
  const trigLabel = document.getElementById('langTriggerLabel');
  if(trigLabel) trigLabel.textContent = lang.toUpperCase();
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });
  closeLangMenu();
  // 지원 언어 목록(config.php SUPPORTED_LANGS)을 PHP가 주입 → 언어 추가 시 이 JS 불변
  var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
  // ko 외 각 언어의 .{lang}-show 요소를 현재 언어일 때만 표시
  SUP.forEach(function(L){
    if(L==='ko') return;
    document.querySelectorAll('.'+L+'-show').forEach(el => el.style.display = (lang===L) ? '' : 'none');
  });
  document.querySelectorAll('.ko').forEach(el => el.style.display = (lang!=='ko') ? 'none' : '');
  const logoLink = document.getElementById('logoLink');
  if(logoLink) logoLink.href = '/' + (lang==='ko' ? '' : '?lang=' + lang);
  // 카드 클릭 시 개별 글로 이동해도 같은 언어가 유지되도록 href에 lang 파라미터를 반영
  document.querySelectorAll('#articleGrid .article-card').forEach(a => {
    try {
      const u = new URL(a.getAttribute('href'), location.origin);
      if(lang === 'ko') u.searchParams.delete('lang'); else u.searchParams.set('lang', lang);
      a.setAttribute('href', u.pathname + (u.search ? u.search : ''));
    } catch(e){}
  });
  // 하단 정책(개인정보/약관) 링크도 현재 언어 유지 (예전엔 /privacy·/terms로 하드코딩돼 한국어로 셌음)
  const _suf = (lang === 'ko' ? '' : '?lang=' + lang);
  document.querySelectorAll('footer a[href^="/privacy"]').forEach(a => a.setAttribute('href', '/privacy' + _suf));
  document.querySelectorAll('footer a[href^="/terms"]').forEach(a => a.setAttribute('href', '/terms' + _suf));
  // 저장은 사용자가 "직접 언어를 고를 때"(doSave=true)만 한다. 진입/뒤로가기 복원 시엔 저장 안 함.
  // (진입 시 저장하면 뒤로가기로 온 페이지가 최근 방문 언어로 오염됨.)
  if(doSave){
    if(window.BTLang){BTLang.save(lang);}
    else{try{localStorage.setItem('blogLang',lang);document.cookie='blogLang='+encodeURIComponent(lang)+'; path=/; max-age=31536000; SameSite=Lax';}catch(e){}}
  }
  try {
    const url = new URL(location.href);
    if(lang === 'ko') url.searchParams.delete('lang'); else url.searchParams.set('lang', lang);
    history.replaceState(null, '', url);
  } catch(e){}
}
function toggleLangMenu(e){
  if(e) e.stopPropagation();
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.toggle('open');
}
function closeLangMenu(){
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.remove('open');
}
document.addEventListener('click', (e) => {
  const dd = document.getElementById('langDropdown');
  if(dd && dd.classList.contains('open') && !dd.contains(e.target)) closeLangMenu();
});
// 언어 복원 우선순위: localStorage(사용자의 가장 최근 선택) > URL ?lang= > 기본 ko.
// (예전엔 URL을 우선해서, 목록에서 EN→글에서 JA→뒤로가기 시 목록 URL의 ?lang=en(옛값)이
//  localStorage의 ja를 덮어써 EN으로 되돌아가는 버그가 있었음)
function restoreBlogLang() {
  try {
    const VALID = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
    // 언어는 URL ?lang= 기준으로만 정한다(서버가 렌더한 언어와 동일). 저장값은 보지 않는다.
    // (저장값을 보면 뒤로가기로 온 목록이 최근 방문 언어로 오염됨.)
    // 목록은 카드에 인라인 style이 남아 있어 CSS만으론 표시 안 되므로, setLang으로 화면을 정리한다.
    // 단 저장은 하지 않는다(두 번째 인자 생략 = doSave false).
    const urlLang = new URLSearchParams(location.search).get('lang');
    const pick = VALID.includes(urlLang) ? urlLang : 'ko';
    setLang(pick);
  } catch(e){}
}
restoreBlogLang(); // 진입: URL ?lang= 기준(사이트맵·공유링크·뒤로가기 모두 URL의 언어를 따름)
// 뒤로가기/앞으로가기(bfcache) 복원 시: 언어는 브라우저가 복원한 그대로 둔다.
// URL이 바뀌었을 수 있으니 화면만 URL 기준으로 재정리(저장은 안 함).
window.addEventListener('pageshow', function(e){
  restoreBlogLang();
});

<?php ?>
window.__blogTotal = <?= (int)($__totalFiltered ?? count($articles)) ?>;
const PAGE_SIZE = 12;
// URL ?cat= 을 읽어 초기 카테고리 결정(사이트맵·공유링크로 특정 카테고리 진입 존중).
// 유효한 카테고리 탭이 실제로 있을 때만 적용, 아니면 'all'.
let currentCat = (function(){
  try { const c = new URLSearchParams(location.search).get('cat'); if (c && document.querySelector('.cat-tab[data-cat="'+c+'"]')) return c; } catch(e){}
  return 'all';
})();
let __loaded = <?= (int)($__initCount ?? 12) ?>; // 서버 렌더 개수(page 반영)
function __curLangMore(){ var r=document.getElementById('html-root'); return ((r&&r.className)||'ko').trim().split(/\s+/)[0]||'ko'; }
function __updMoreBtn(){
  var btn=document.getElementById('loadMoreBtn'), cE=document.getElementById('loadMoreCount');
  if(!btn) return;
  var remain=(window.__blogTotal||0)-__loaded;
  if(remain<=0){ btn.style.display='none'; return; }
  btn.style.display=''; if(cE) cE.textContent='('+Math.min(remain,12)+')';
}
function loadMore(){
  var btn=document.getElementById('loadMoreBtn'); if(btn) btn.style.pointerEvents='none';
  var lang=__curLangMore();
  var cp = currentCat==='all' ? '' : ('&cat='+encodeURIComponent(currentCat));
  fetch('/blog/?ajax=cards&offset='+__loaded+cp+(lang==='ko'?'':('&lang='+lang)))
    .then(function(r){return r.text();}).then(function(html){
      var grid=document.getElementById('articleGrid');
      var __sy=window.scrollY;
      if(grid && html.trim()) grid.insertAdjacentHTML('beforeend', html);
      window.scrollTo(0, __sy);
      var added=(html.match(/class="article-card"/g)||[]).length;
      __loaded += added;
      try{ var pg=Math.max(1,Math.ceil(__loaded/12)); var u=new URL(location.href); u.searchParams.set('page', pg); history.replaceState(null,'',u); }catch(e){}
      if(btn) btn.style.pointerEvents='';
      __updMoreBtn();
    }).catch(function(){ if(btn) btn.style.pointerEvents=''; });
}
function filterCat(cat){
  var lang=__curLangMore(); var ls=(lang==='ko'?'':('lang='+lang));
  var url='/blog/';
  if(cat!=='all' && ls) url+='?cat='+encodeURIComponent(cat)+'&'+ls;
  else if(cat!=='all') url+='?cat='+encodeURIComponent(cat);
  else if(ls) url+='?'+ls;
  location.href=url;
} // 카테고리는 서버가 ?cat= 로 필터+활성탭 표시 (로드 시 filterCat 자동호출 금지 — 무한이동 방지)
</script>
<style>
.blog-tabbar{display:none}
@media(max-width:600px){
  .blog-tabbar{display:flex;position:fixed;left:0;right:0;top:auto;bottom:0;z-index:900;
    height:48px;background:rgba(15,15,17,.96);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);
    border-top:1px solid rgba(255,255,255,.07);padding-bottom:env(safe-area-inset-bottom);
    transition:transform .25s ease}
  .blog-tabbar.tabbar-hidden{transform:translateY(110%)}
  .blog-tabbar .btab{position:relative;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;
    background:transparent;border:none;color:var(--t3);font-size:9.5px;font-weight:600;text-decoration:none;
    -webkit-tap-highlight-color:transparent}
  .blog-tabbar .btab.active{color:#f7931a}
  .blog-tabbar .btab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:#f7931a}
  .blog-tabbar .btab svg{width:20px;height:20px;display:block}
  body{padding-bottom:48px}
}
</style>
<nav class="blog-tabbar">
  <a class="btab" href="/" data-tb='{"ko":"실시간 지표","en":"Live","ja":"リアルタイム","es":"En vivo","de":"Live","fr":"En direct","pt":"Ao vivo","tr":"Canlı","vi":"Trực tiếp"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l3-4 3 2 4-6"/></svg>
    <span class="btab-tx">실시간 지표</span>
  </a>
  <button type="button" class="btab" onclick="openBlogCoinSwitcher()" data-tb='{"ko":"코인 검색","en":"Find Coins","ja":"コイン検索","es":"Buscar","de":"Coins","fr":"Cryptos","pt":"Buscar","tr":"Coin ara","vi":"Tìm coin"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9.5 10h4a1.5 1.5 0 0 1 0 3h-3.5a1.5 1.5 0 0 0 0 3h4"/></svg>
    <span class="btab-tx">코인 검색</span>
  </button>
  <a class="btab active" href="/blog/" data-tb='{"ko":"블로그","en":"Blog","ja":"ブログ","es":"Blog","de":"Blog","fr":"Blog","pt":"Blog","tr":"Blog","vi":"Blog"}'>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3h10l4 4v14H5z"/><path d="M14 3v5h5M8 13h8M8 17h6"/></svg>
    <span class="btab-tx">블로그</span>
  </a>
</nav>
<!-- 블로그 코인 전환 시트 -->
<div id="blogCoinSheet" class="blog-coin-sheet" onclick="if(event.target===this)closeBlogCoinSwitcher()">
  <div class="bcs-box">
    <div class="bcs-grip"></div>
    <div class="bcs-head">
      <div><div class="bcs-title" id="bcsTitle">코인 전환</div><div class="bcs-sub" id="bcsSub">즐겨찾기한 코인</div></div>
      <button class="bcs-close" onclick="closeBlogCoinSwitcher()" aria-label="close">✕</button>
    </div>
    <div id="bcsList" class="bcs-list"></div>
  </div>
</div>
<style>
.blog-coin-sheet{display:none;position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,.66);align-items:flex-end;justify-content:center;padding-bottom:48px}
.blog-coin-sheet.open{display:flex}
.bcs-box{width:100%;max-width:460px;max-height:70vh;display:flex;flex-direction:column;background:#1b1b21;border-radius:18px 18px 0 0;overflow:hidden;animation:bcsUp .22s ease-out}
@keyframes bcsUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
.bcs-grip{width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
.bcs-head{display:flex;align-items:center;justify-content:space-between;padding:8px 16px 10px}
.bcs-title{font-size:15px;font-weight:700;color:#f2f2f5}
.bcs-sub{font-size:11px;color:#888;margin-top:2px}
.bcs-close{background:none;border:none;color:#888;font-size:16px;cursor:pointer;padding:4px 8px}
.bcs-list{flex:1;overflow-y:auto;padding:4px 8px 16px}
.bcs-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer}
.bcs-item:active{background:#24242b}
.bcs-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.bcs-id{font-size:13px;font-weight:700;color:#f2f2f5}
.bcs-name{font-size:12px;color:#888}
.bcs-empty{padding:30px;text-align:center;color:#666;font-size:13px}
</style>

<script>
window.__BLOG_COINS = <?= $__blogCoinsJson ?>;
window.__BLOG_DEFAULT_FAVS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX'];
var __BCS_I18N={
  ko:{title:'코인 전환',sub:'즐겨찾기한 코인',empty:'즐겨찾기한 코인이 없습니다.'},
  en:{title:'Switch coin',sub:'Your favorites',empty:'No favorite coins yet.'},
  ja:{title:'コイン切替',sub:'お気に入り',empty:'お気に入りがありません。'},
  es:{title:'Cambiar',sub:'Favoritos',empty:'Sin favoritos.'},
  de:{title:'Coin wechseln',sub:'Favoriten',empty:'Keine Favoriten.'},
  fr:{title:'Changer de crypto',sub:'Vos favoris',empty:'Aucune crypto favorite.'},
  pt:{title:'Trocar moeda',sub:'Seus favoritos',empty:'Nenhuma moeda favorita.'},
  tr:{title:'Coin değiştir',sub:'Favorileriniz',empty:'Henüz favori coin yok.'},
  vi:{title:'Đổi coin',sub:'Yêu thích',empty:'Chưa có coin yêu thích.'}
};
function bcsLang(){ try{ return document.getElementById('html-root').lang||'ko'; }catch(e){ return 'ko'; } }
function bcsGetFavs(){ try{ const r=localStorage.getItem('favoriteCoins'); if(r===null) return [...window.__BLOG_DEFAULT_FAVS]; const a=JSON.parse(r); return Array.isArray(a)&&a.length?a:[...window.__BLOG_DEFAULT_FAVS]; }catch(e){ return [...window.__BLOG_DEFAULT_FAVS]; } }
function bcsGetDelisted(){ try{ const r=localStorage.getItem('delistedCoins'); return r?(JSON.parse(r)||[]):[]; }catch(e){ return []; } }
function openBlogCoinSwitcher(){
  var t=__BCS_I18N[bcsLang()]||__BCS_I18N.en;
  document.getElementById('bcsTitle').textContent=t.title;
  document.getElementById('bcsSub').textContent=t.sub;
  var list=document.getElementById('bcsList');
  var favs=bcsGetFavs(), dead=bcsGetDelisted(), byId={};
  (window.__BLOG_COINS||[]).forEach(function(c){byId[c.id]=c;});
  var coins=favs.map(function(id){return byId[id];}).filter(function(c){return c&&dead.indexOf(c.id)<0;});
  if(!coins.length){ list.innerHTML='<div class="bcs-empty">'+t.empty+'</div>'; }
  else { list.innerHTML=coins.map(function(c){return '<div class="bcs-item" onclick="bcsPick(\''+c.id+'\')"><span class="bcs-dot" style="background:'+c.color+'"></span><span class="bcs-id">'+c.id+'</span><span class="bcs-name">'+c.name+'</span></div>';}).join(''); }
  document.getElementById('blogCoinSheet').classList.add('open');
}
function closeBlogCoinSwitcher(){ document.getElementById('blogCoinSheet').classList.remove('open'); }
function bcsPick(id){
  try{ localStorage.setItem('selectedCoin', id); }catch(e){}
  var lang=bcsLang();
  location.href='/'+(lang==='ko'?'':'?lang='+lang);
}
</script>
<script>
// 하단바 텍스트 언어 적용 (setLang 시 + 최초)
function applyTabbarLang(lang){
  document.querySelectorAll('.blog-tabbar .btab').forEach(a=>{
    try{ const m=JSON.parse(a.getAttribute('data-tb')); const tx=a.querySelector('.btab-tx'); if(tx&&m[lang]) tx.textContent=m[lang]; }catch(e){}
  });
  // 링크에도 언어 반영 (live만; coins는 버튼이라 제외)
  const suf = (lang==='ko'?'':'?lang='+lang);
  const live=document.querySelector('.blog-tabbar a.btab[href="/"], .blog-tabbar a.btab[href^="/?"]');
  if(live) live.setAttribute('href','/'+suf);
}
try{
  const _l = document.getElementById('html-root').lang || 'ko';
  applyTabbarLang(_l);
  // setLang이 있으면 래핑해서 하단바도 갱신
  if(typeof setLang==='function'){
    const _orig=setLang;
    window.setLang=function(){ _orig.apply(this, arguments); applyTabbarLang(arguments[0]); };
  }
}catch(e){}
// 하단바 스크롤 표시/숨김 (다운=숨김, 업/멈춤=표시)
(function(){
  const bar=document.querySelector('.blog-tabbar');
  if(!bar) return;
  let lastY=window.scrollY||0, idle=null;
  window.addEventListener('scroll',()=>{
    const y=window.scrollY||0, dy=y-lastY;
    if(y<60) bar.classList.remove('tabbar-hidden');
    else if(dy>6) bar.classList.add('tabbar-hidden');
    else if(dy<-6) bar.classList.remove('tabbar-hidden');
    lastY=y;
    clearTimeout(idle);
    idle=setTimeout(()=>bar.classList.remove('tabbar-hidden'),900);
  },{passive:true});
})();
</script>
<script>document.addEventListener('DOMContentLoaded',function(){var r=document.getElementById('html-root');});</script>
</body>
</html>
