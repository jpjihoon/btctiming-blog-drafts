<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 안내 페이지 공용 푸터 (RSS·사이트맵 등이 include)
// 대시보드 footer와 동일한 스타일. 언어 전환 JS 포함.
// 페이지별 추가 JS가 필요하면 include 전에 $GUIDE_EXTRA_JS 에 담아두면 실행된다.
// ═══════════════════════════════════════════════════════
?>
<div style="text-align:center;padding:20px 16px 60px;font-size:11px;color:var(--t3)">
  © 2026 BTCtiming.com ·
  <a href="/rss-guide.php" style="color:var(--t3);text-decoration:underline">RSS</a>
  ·
  <a href="/sitemap-guide.php" style="color:var(--t3);text-decoration:underline"><span class="l-ko">사이트맵</span><span class="l-en">Sitemap</span><span class="l-ja">サイトマップ</span><span class="l-es">Mapa del sitio</span><span class="l-de">Sitemap</span></a>
  ·
  <a href="/privacy" style="color:var(--t3);text-decoration:underline"><span class="l-ko">개인정보처리방침</span><span class="l-en">Privacy Policy</span><span class="l-ja">プライバシーポリシー</span><span class="l-es">Política de Privacidad</span><span class="l-de">Datenschutzerklärung</span></a>
  ·
  <a href="/terms" style="color:var(--t3);text-decoration:underline"><span class="l-ko">이용약관</span><span class="l-en">Terms of Service</span><span class="l-ja">利用規約</span><span class="l-es">Términos de Servicio</span><span class="l-de">Nutzungsbedingungen</span></a>
  · <span class="l-ko">투자 조언이 아닙니다</span><span class="l-en">Not financial advice</span><span class="l-ja">投資助言ではありません</span><span class="l-es">No es asesoramiento financiero</span><span class="l-de">Keine Finanzberatung</span>.
</div>

<script>
const LANG_NAMES={ko:'KO',en:'EN',ja:'JA',es:'ES',de:'DE'};
function currentLang(){
  try{const p=new URLSearchParams(location.search).get('lang');if(['ko','en','ja','es','de'].includes(p))return p;}catch(e){}
  try{const s=localStorage.getItem('blogLang');if(['ko','en','ja','es','de'].includes(s))return s;}catch(e){}
  return 'ko';
}
function applyLang(lang){
  document.documentElement.lang=lang;
  const l=document.getElementById('langTriggerLabel');if(l)l.textContent=LANG_NAMES[lang]||'KO';
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active',el.dataset.lang===lang));
  try{localStorage.setItem('blogLang',lang);}catch(e){}
  if(typeof window.onGuideLang==='function'){try{window.onGuideLang(lang);}catch(e){}}
}
function L(lang){applyLang(lang);closeLangMenu();const url=new URL(location.href);if(lang==='ko')url.searchParams.delete('lang');else url.searchParams.set('lang',lang);history.replaceState(null,'',url.toString());}
function toggleLangMenu(e){e.stopPropagation();document.getElementById('langDropdown').classList.toggle('open');}
function closeLangMenu(){const d=document.getElementById('langDropdown');if(d)d.classList.remove('open');}
document.addEventListener('click',(e)=>{const dd=document.getElementById('langDropdown');if(dd&&dd.classList.contains('open')&&!dd.contains(e.target))closeLangMenu();});
<?= $GUIDE_EXTRA_JS ?? '' ?>
applyLang(currentLang());
</script>
</body>
</html>
