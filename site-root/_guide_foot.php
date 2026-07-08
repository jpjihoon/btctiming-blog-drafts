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
  <a href="/sitemap-guide.php" style="color:var(--t3);text-decoration:underline"><span class="l-ko">사이트맵</span><span class="l-en">Sitemap</span><span class="l-ja">サイトマップ</span><span class="l-es">Mapa del sitio</span><span class="l-de">Sitemap</span><span class="l-fr">Plan du site</span><span class="l-pt">Mapa do site</span><span class="l-tr">Site haritası</span><span class="l-vi">Sơ đồ trang</span></a>
  ·
  <a href="/privacy" style="color:var(--t3);text-decoration:underline"><span class="l-ko">개인정보처리방침</span><span class="l-en">Privacy Policy</span><span class="l-ja">プライバシーポリシー</span><span class="l-es">Política de Privacidad</span><span class="l-de">Datenschutzerklärung</span><span class="l-fr">Confidentialité</span><span class="l-pt">Privacidade</span><span class="l-tr">Gizlilik Politikası</span><span class="l-vi">Chính sách bảo mật</span></a>
  ·
  <a href="/terms" style="color:var(--t3);text-decoration:underline"><span class="l-ko">이용약관</span><span class="l-en">Terms of Service</span><span class="l-ja">利用規約</span><span class="l-es">Términos de Servicio</span><span class="l-de">Nutzungsbedingungen</span><span class="l-fr">Conditions d'utilisation</span><span class="l-pt">Termos de Serviço</span><span class="l-tr">Hizmet Şartları</span><span class="l-vi">Điều khoản dịch vụ</span></a>
  ·
  <a href="/about" style="color:var(--t3);text-decoration:underline"><span class="l-ko">소개</span><span class="l-en">About</span><span class="l-ja">概要</span><span class="l-es">Acerca de</span><span class="l-de">Über uns</span><span class="l-fr">À propos</span><span class="l-pt">Sobre</span><span class="l-tr">Hakkında</span><span class="l-vi">Giới thiệu</span></a>
  ·
  <a href="/glossary" style="color:var(--t3);text-decoration:underline"><span class="l-ko">용어사전</span><span class="l-en">Glossary</span><span class="l-ja">用語集</span><span class="l-es">Glosario</span><span class="l-de">Glossar</span><span class="l-fr">Glossaire</span><span class="l-pt">Glossário</span><span class="l-tr">Sözlük</span><span class="l-vi">Từ điển</span></a>
  · <span class="l-ko">투자 조언이 아닙니다</span><span class="l-en">Not financial advice</span><span class="l-ja">投資助言ではありません</span><span class="l-es">No es asesoramiento financiero</span><span class="l-de">Keine Finanzberatung</span><span class="l-fr">Pas un conseil financier</span><span class="l-pt">Não é aconselhamento financeiro</span><span class="l-tr">Yatırım tavsiyesi değildir</span><span class="l-vi">Không phải lời khuyên tài chính</span>.
</div>

<script>
var GUIDE_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
const LANG_NAMES={ko:'KO',en:'EN',ja:'JA',es:'ES',de:'DE',fr:'FR',pt:'PT',tr:'TR',vi:'VI'};
function currentLang(){
  try{const p=new URLSearchParams(location.search).get('lang');if(GUIDE_LANGS.includes(p))return p;}catch(e){}
  try{const s=localStorage.getItem('blogLang');if(GUIDE_LANGS.includes(s))return s;}catch(e){}
  return 'ko';
}
function applyLang(lang){
  document.documentElement.lang=lang;
  const l=document.getElementById('langTriggerLabel');if(l)l.textContent=LANG_NAMES[lang]||'KO';
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active',el.dataset.lang===lang));
  try{localStorage.setItem('blogLang',lang);}catch(e){}
  // 쿠키에도 저장 → 서버(_guide_head)가 URL ?lang 없을 때 이걸 읽어 마지막 선택 언어로 렌더.
  // 그래서 새 페이지로 이동하면 마지막 언어가 유지된다.
  try{document.cookie='blogLang='+encodeURIComponent(lang)+'; path=/; max-age=31536000; SameSite=Lax';}catch(e){}
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
