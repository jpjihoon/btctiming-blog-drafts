<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 안내 페이지 공용 푸터 (RSS·사이트맵 등이 include)
// 대시보드 footer와 동일한 스타일. 언어 전환 JS 포함.
// 페이지별 추가 JS가 필요하면 include 전에 $GUIDE_EXTRA_JS 에 담아두면 실행된다.
// ═══════════════════════════════════════════════════════
?>
<?php require __DIR__ . '/_shared_footer.php'; ?>

<script>window.BT_SUPPORTED_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;</script>
<script src="/lang-common.js"></script>
<script>
var GUIDE_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
const LANG_NAMES={ko:'KO',en:'EN',ja:'JA',es:'ES',de:'DE',fr:'FR',pt:'PT',tr:'TR',vi:'VI',id:'ID',pl:'PL',it:'IT',ru:'RU',zh:'ZH'};
function currentLang(){
  if(window.BTLang) return BTLang.get(false);   // 공통 유틸에 위임
  try{const p=new URLSearchParams(location.search).get('lang');if(GUIDE_LANGS.includes(p))return p;}catch(e){}
  try{const m=document.cookie.match(/(?:^|;\s*)blogLang=([^;]+)/);const c=m?decodeURIComponent(m[1]):null;if(GUIDE_LANGS.includes(c))return c;}catch(e){}
  try{const s=localStorage.getItem('blogLang');if(GUIDE_LANGS.includes(s))return s;}catch(e){}
  return 'ko';
}
function applyLang(lang){
  document.documentElement.lang=lang;
  const l=document.getElementById('langTriggerLabel');if(l)l.textContent=LANG_NAMES[lang]||(lang?String(lang).toUpperCase():'KO');
  document.querySelectorAll('.lang-menu-item').forEach(el=>el.classList.toggle('active',el.dataset.lang===lang));
  // ※ 저장(쿼키/localStorage)은 여기서 안 한다 — 진입 시에도 applyLang이 불리므로,
  //   여기서 저장하면 뒤로가기로 온 페이지가 최근 언어로 오염됨. 저장은 L()(사용자 선택)에서만.
  if(typeof window.onGuideLang==='function'){try{window.onGuideLang(lang);}catch(e){}}
}
function L(lang){applyLang(lang);if(window.BTLang)BTLang.save(lang);closeLangMenu();try{if(window.BTLang&&BTLang.i18nHref)history.replaceState(null,'',BTLang.i18nHref(location.pathname+location.search+location.hash,lang));if(window.BTLang&&BTLang.pathify)BTLang.pathify(lang);}catch(e){}}
function toggleLangMenu(e){e.stopPropagation();document.getElementById('langDropdown').classList.toggle('open');}
function closeLangMenu(){const d=document.getElementById('langDropdown');if(d)d.classList.remove('open');}
document.addEventListener('click',(e)=>{const dd=document.getElementById('langDropdown');if(dd&&dd.classList.contains('open')&&!dd.contains(e.target))closeLangMenu();});
<?= $GUIDE_EXTRA_JS ?? '' ?>
// 진입 시: 서버가 렌더한 언어(URL 기준)를 그대로 적용한다. 저장된 언어로 덮어쓰지 않는다.
// (저장언어로 덮으면 뒤로가기로 온 페이지가 최근 방문 언어로 오염됨.)
// 그리고 그 언어를 URL에 반영 → 뒤로가기로 이 페이지에 오면 그때 언어로 정확히 복원.
(function(){
  var _rendered = <?= json_encode($__ghLang) ?>;
  applyLang(_rendered);
  if (window.BTLang) window.BTLang.stampUrl(_rendered);
  if (window.BTLang && window.BTLang.pathify) window.BTLang.pathify(_rendered);  // 모든 내부 링크(로고·푸터 등) 경로형으로
})();
</script>
</body>
</html>
