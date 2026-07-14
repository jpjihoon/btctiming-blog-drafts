<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 안내 페이지 공용 헤더 (RSS·사이트맵 등이 include)
// 대시보드(index.php)의 nav·로고·언어선택과 픽셀 단위로 동일하게 유지한다.
// 사용법: 각 페이지 상단에서
//   $GUIDE_TITLE = '...'; $GUIDE_DESC = '...'; $GUIDE_CANONICAL='...';
//   require __DIR__ . '/_guide_head.php';
// 를 호출하면 <!DOCTYPE>~<nav>까지 출력된다. 이후 본문을 쓰고 _guide_foot.php로 닫는다.
// ═══════════════════════════════════════════════════════
require_once __DIR__ . '/config.php';
if (!function_exists('gh')) { function gh($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }
$__title = $GUIDE_TITLE ?? 'BTCtiming.com';
$__desc  = $GUIDE_DESC ?? '';
$__ghLang = resolveLang();                         // ★ i18nUrl보다 먼저 언어 결정(500 방지)
$__koPath = $GUIDE_KOPATH ?? null;
$__canon = $__koPath ? i18nUrl($__koPath, $__ghLang) : ($GUIDE_CANONICAL ?? 'https://btctiming.com/');
// 언어 결정: URL ?lang= 우선 → 없으면 쿠키(blogLang, 마지막 선택) → ko.
// 쿠키를 읽으므로 뒤로가기로 lang 없는 URL에 와도 서버가 마지막 선택 언어로 렌더한다.
// (JS로 다시 로드해 고칠 필요가 없어 히스토리가 꼬이지 않는다.)
// 이 파일을 include하는 모든 안내 페이지(about/privacy/terms/rss/sitemap/glossary)에 일괄 적용됨.
$__ghLang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
$__ghLangKeys = array_keys(SUPPORTED_LANGS);
// nav-back: 기본은 대시보드(실시간 분석) 복귀. 페이지가 $GUIDE_NAVBACK로 재정의 가능.
$__navBackDefault = ['ko'=>'← 실시간 분석으로 돌아가기','en'=>'← Back to Live Analysis','ja'=>'← リアルタイム分析に戻る','es'=>'← Volver al Análisis en Vivo','de'=>'← Zurück zur Live-Analyse','fr'=>"← Retour à l'analyse en direct",'pt'=>'← Voltar à análise ao vivo','tr'=>'← Canlı analize dön','vi'=>'← Quay lại phân tích trực tiếp'];
$__navBackHref   = $GUIDE_NAVBACK['href']   ?? '/';
$__navBackLabels = $GUIDE_NAVBACK['labels'] ?? $__navBackDefault;
?>
<!DOCTYPE html>
<html lang="<?= gh($__ghLang) ?>">
<head>
<meta charset="utf-8">
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCI+CjxyZWN0IHg9IjIiIHk9IjIiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcng9IjE1IiBmaWxsPSIjMGQwZDEwIi8+CjxwYXRoIGQ9Ik0xMyA0NCBBMTkgMTkgMCAwIDEgNTEgNDQiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzI2MjYyYiIgc3Ryb2tlLXdpZHRoPSI2IiBzdHJva2UtbGluZWNhcD0icm91bmQiLz4KPHBhdGggZD0iTTEzIDQ0IEExOSAxOSAwIDAgMSA0MSAyOSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZjc5MzFhIiBzdHJva2Utd2lkdGg9IjYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgo8cG9seWxpbmUgcG9pbnRzPSIyMiw0MCAyOSwzMyAzNSwzNyA0NSwyNSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmFmYWZhIiBzdHJva2Utd2lkdGg9IjMuNCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjxwb2x5bGluZSBwb2ludHM9IjM5LDI1IDQ1LDI1IDQ1LDMxIiBmaWxsPSJub25lIiBzdHJva2U9IiNmYWZhZmEiIHN0cm9rZS13aWR0aD0iMy40IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= gh($__title) ?></title>
<?php if ($__desc): ?><meta name="description" content="<?= gh($__desc) ?>"><?php endif; ?>
<link rel="canonical" href="<?= gh($__canon) ?>">
<?php if (!empty($__koPath)): foreach (array_keys(SUPPORTED_LANGS) as $__hl): ?>
<link rel="alternate" hreflang="<?= gh($__hl) ?>" href="<?= gh(i18nUrl($__koPath, $__hl)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= gh(i18nUrl($__koPath, 'ko')) ?>">
<?php endif; ?>
<style>
/* ── 대시보드와 동일한 디자인 토큰 ── */
:root{
  --bg:#0a0a0c;--bg2:#141418;--bg3:#1b1b21;--bg4:#24242b;
  --b1:rgba(255,255,255,0.07);--b2:rgba(255,255,255,0.12);--b3:rgba(255,255,255,0.18);
  --t1:#f2f2f5;--t2:#9a9aa4;--t3:#63636d;--t4:#2a2a30;
  --green:#22c55e;--yellow:#f59e0b;--orange:#f7931a;--red:#ef4444;--blue:#60a5fa;
  --rad:12px;--rad-sm:8px;--rad-lg:16px;color-scheme:dark
}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
body{background:var(--bg);color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:13px;min-height:100vh;overflow-x:hidden;line-height:1.7}
a{color:var(--orange);text-decoration:none}a:hover{text-decoration:underline}
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--b2);border-radius:2px}
/* 언어별 표시 — SUPPORTED_LANGS 기반 자동 생성 (l- 접두사) */
<?php
$__ghRules = [];
foreach ($__ghLangKeys as $__cur) {
    foreach ($__ghLangKeys as $__other) {
        if ($__cur === $__other) continue;
        $__ghRules[] = '[lang="' . $__cur . '"] .l-' . $__other;
    }
}
echo implode(',', $__ghRules) . "{display:none}\n";
?>
/* ── NAV (대시보드와 동일) ── */
nav{background:var(--bg2);border-bottom:1px solid var(--b1);height:52px;display:flex;align-items:center;padding:0;gap:0;position:sticky;top:0;z-index:200}
.nav-inner{max-width:1280px;margin:0 auto;width:100%;display:flex;align-items:center;padding:0 16px;gap:12px}
.logo{display:inline-flex;align-items:center;gap:7px;font-size:15px;font-weight:700;letter-spacing:-.5px;white-space:nowrap;margin-right:4px;cursor:pointer;transition:opacity .15s;outline:none;color:var(--t1)}
.logo-ic{flex-shrink:0}
.logo:hover{opacity:.8;text-decoration:none}
.logo span{color:var(--yellow)}
.nav-back{font-size:13px;color:var(--t3);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.nav-back a{color:var(--t3)}
.nav-r{display:flex;align-items:center;gap:8px;flex-shrink:0;margin-left:auto}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:var(--bg3);
  border:1px solid var(--b1);border-radius:var(--rad-sm);color:var(--t1);font-size:11px;font-weight:700;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:var(--bg4)}
.lang-caret{font-size:9px;color:var(--t3);transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:var(--bg2);
  border:1px solid var(--b1);border-radius:var(--rad-sm);box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:var(--t2);font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:var(--bg3);color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
/* ── 공용 히어로/본문 폭 ── */
.guide-wrap{max-width:1280px;margin:0 auto;padding:0 16px}
<?= $GUIDE_EXTRA_CSS ?? '' ?>
</style>
</head>
<body>
<nav><div class="nav-inner">
  <a href="<?= $__ghLang === 'ko' ? '/' : '/' . gh($__ghLang) ?>" class="logo"><svg class="logo-ic" width="19" height="19" viewBox="0 0 64 64" aria-hidden="true"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>BTC<span>timing</span></a>
  <span class="nav-back"><a href="<?= gh($__navBackHref) ?>"><?php foreach ($__ghLangKeys as $__lc): ?><span class="l-<?= gh($__lc) ?>"><?= gh($__navBackLabels[$__lc] ?? $__navBackLabels['en']) ?></span><?php endforeach; ?></a></span>
  <div class="nav-r">
    <div class="lang-dropdown" id="langDropdown">
      <button type="button" class="lang-trigger" onclick="toggleLangMenu(event)" aria-haspopup="true"><span id="langTriggerLabel"><?= gh(strtoupper($__ghLang)) ?></span><span class="lang-caret">▾</span></button>
      <div class="lang-menu">
<?php foreach (SUPPORTED_LANGS as $__lc => $__meta): ?>
        <button type="button" class="lang-menu-item<?= $__lc===$__ghLang ? ' active' : '' ?>" data-lang="<?= gh($__lc) ?>" onclick="L('<?= gh($__lc) ?>')"><?= $__meta['flag'] ?? '' ?> <?= gh($__meta['name'] ?? strtoupper($__lc)) ?></button>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</div></nav>
