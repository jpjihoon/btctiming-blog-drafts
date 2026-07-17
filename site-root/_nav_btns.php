<?php
/* ══════════════════════════════════════════════════════
   공용 내비 버튼 — 블로그 / 용어사전 / 설정(⚙️)   [단일 소스]
   언어 드롭다운 바로 왼쪽에 붙는다. 대시보드 헤더와 같은 모양·톤.

   호출 전 변수 지정:
     $__nbLang : 현재 언어 코드 (필수)
     $__nbHide : 'blog' | 'glossary' | ''  — 현재 보고 있는 페이지의 버튼은 숨김
                 (블로그에선 블로그 버튼, 용어사전에선 용어사전 버튼을 감춘다)

   config.php 의 i18nPath() 필요.

   ⚙️ 설정: 설정 모달은 _shared_footer.php → _settings_modal.php 가 전 페이지에 넣어주므로
   openSettings() 를 그대로 호출하면 '그 페이지에서' 바로 열린다(대시보드로 이동하지 않는다).
   ══════════════════════════════════════════════════════ */
$__nbLang = $__nbLang ?? 'ko';
$__nbHide = $__nbHide ?? '';
if (!function_exists('nbh')) { function nbh($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }

$__nbL = [
  'blog' => ['ko'=>'블로그','en'=>'Blog','ja'=>'ブログ','es'=>'Blog','de'=>'Blog','fr'=>'Blog','pt'=>'Blog','tr'=>'Blog','vi'=>'Blog','id'=>'Blog','pl'=>'Blog','it'=>'Blog','ru'=>'Блог','zh'=>'部落格'],
  'glos' => ['ko'=>'용어사전','en'=>'Glossary','ja'=>'用語集','es'=>'Glosario','de'=>'Glossar','fr'=>'Glossaire','pt'=>'Glossário','tr'=>'Sözlük','vi'=>'Thuật ngữ','id'=>'Glosarium','pl'=>'Słownik','it'=>'Glossario','ru'=>'Глоссарий','zh'=>'術語表'],
  'set'  => ['ko'=>'설정','en'=>'Settings','ja'=>'設定','es'=>'Ajustes','de'=>'Einstellungen','fr'=>'Paramètres','pt'=>'Configurações','tr'=>'Ayarlar','vi'=>'Cài đặt','id'=>'Pengaturan','pl'=>'Ustawienia','it'=>'Impostazioni','ru'=>'Настройки','zh'=>'設定'],
];
$__nbT = function(string $k) use ($__nbL, $__nbLang) { return $__nbL[$k][$__nbLang] ?? $__nbL[$k]['en']; };
?>
<style>
/* ── 공용 내비 버튼 (대시보드 .nav-insight 와 동일 톤. 변수 없는 페이지를 위해 폴백값 지정) ── */
.nb-btn{height:34px;padding:0 11px;border-radius:var(--rad-sm,8px);
  background:var(--bg3,#1b1b21);border:1px solid var(--b1,rgba(255,255,255,.07));
  display:flex;align-items:center;gap:5px;font-size:11px;font-weight:600;
  color:var(--t2,#9a9aa4);text-decoration:none;flex-shrink:0;transition:all .15s;
  white-space:nowrap;cursor:pointer}
.nb-btn:hover{background:var(--bg4,#24242b);color:var(--t1,#f2f2f5);text-decoration:none}
.nb-btn svg{flex-shrink:0}
.nb-ico{width:34px;padding:0;justify-content:center;font-size:14px}
@media(max-width:520px){.nb-btn span{display:none}.nb-btn{padding:0 9px}.nb-ico{padding:0}}
</style>
<?php if ($__nbHide !== 'blog'): ?>
<a href="<?= nbh(i18nPath('/blog/', $__nbLang)) ?>" class="nb-btn" title="Blog"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2z"/><line x1="9" y1="13" x2="15" y2="13"/><line x1="9" y1="17" x2="13" y2="17"/></svg><span><?= nbh($__nbT('blog')) ?></span></a>
<?php endif; ?>
<?php if ($__nbHide !== 'glossary'): ?>
<a href="<?= nbh(i18nPath('/glossary', $__nbLang)) ?>" class="nb-btn" title="Glossary"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg><span><?= nbh($__nbT('glos')) ?></span></a>
<?php endif; ?>
<button type="button" onclick="openSettings()" class="nb-btn nb-ico" title="<?= nbh($__nbT('set')) ?>" aria-label="<?= nbh($__nbT('set')) ?>">⚙️</button>
