<?php
// ─────────────────────────────────────────────────────────────
// _shared_footer.php — 대시보드 / 블로그글 / 블로그목록 공통 푸터
// 세 페이지가 이 파일 하나를 include → 푸터 수정 시 한 곳만 고치면 다 반영.
// 모든 언어 텍스트를 span으로 넣고 현재 <html lang>의 언어만 CSS로 표시.
// 사용법:
//   대시보드(/www/):    require __DIR__ . '/_shared_footer.php';
//   블로그(/www/blog/): require __DIR__ . '/../_shared_footer.php';
// ─────────────────────────────────────────────────────────────
if (!function_exists('h')) {
    function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}
?>
<footer class="site-footer">© 2026 BTCtiming.com
 · <a href="/about" class="sf-link sf-legal" data-base="/about"><span class="ko">소개</span><span class="en">About</span><span class="ja">概要</span><span class="es">Acerca de</span><span class="de">Über uns</span><span class="fr">À propos</span><span class="pt">Sobre</span><span class="tr">Hakkında</span><span class="vi">Giới thiệu</span></a>
 · <a href="/glossary" class="sf-link sf-legal" data-base="/glossary"><span class="ko">용어사전</span><span class="en">Glossary</span><span class="ja">用語集</span><span class="es">Glosario</span><span class="de">Glossar</span><span class="fr">Glossaire</span><span class="pt">Glossário</span><span class="tr">Sözlük</span><span class="vi">Từ điển</span></a>
 · <a href="/rss-guide.php" class="sf-link">RSS</a>
 · <a href="/sitemap-guide.php" class="sf-link sf-legal" data-base="/sitemap-guide.php"><span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span><span class="fr">Plan du site</span><span class="pt">Mapa do site</span><span class="tr">Site haritası</span><span class="vi">Sơ đồ trang</span></a>
 · <a href="/privacy" class="sf-link sf-legal" data-base="/privacy"><span class="ko">개인정보처리방침</span><span class="en">Privacy Policy</span><span class="ja">プライバシーポリシー</span><span class="es">Política de Privacidad</span><span class="de">Datenschutzerklärung</span><span class="fr">Confidentialité</span><span class="pt">Privacidade</span><span class="tr">Gizlilik Politikası</span><span class="vi">Chính sách bảo mật</span></a>
 · <a href="/terms" class="sf-link sf-legal" data-base="/terms"><span class="ko">이용약관</span><span class="en">Terms of Service</span><span class="ja">利用規約</span><span class="es">Términos de Servicio</span><span class="de">Nutzungsbedingungen</span><span class="fr">Conditions d'utilisation</span><span class="pt">Termos de Serviço</span><span class="tr">Hizmet Şartları</span><span class="vi">Điều khoản dịch vụ</span></a>
 · <span class="sf-dis"><span class="ko">투자 조언이 아닙니다</span><span class="en">Not financial advice</span><span class="ja">投資助言ではありません</span><span class="es">No es asesoramiento financiero</span><span class="de">Keine Finanzberatung</span><span class="fr">Pas un conseil financier</span><span class="pt">Não é aconselhamento financeiro</span><span class="tr">Yatırım tavsiyesi değildir</span><span class="vi">Không phải lời khuyên tài chính</span></span>.</footer>
<style>
.site-footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;text-align:center;font-size:11px;color:#666;line-height:1.9}
.site-footer a.sf-link{color:#666;text-decoration:underline}
.site-footer a.sf-link:hover{color:#999}
.site-footer .ko,.site-footer .en,.site-footer .ja,.site-footer .es,.site-footer .de,.site-footer .fr,.site-footer .pt,.site-footer .tr,.site-footer .vi{display:none}
html[lang="ko"] .site-footer .ko,
html[lang="en"] .site-footer .en,
html[lang="ja"] .site-footer .ja,
html[lang="es"] .site-footer .es,
html[lang="de"] .site-footer .de,
html[lang="fr"] .site-footer .fr,
html[lang="pt"] .site-footer .pt,
html[lang="tr"] .site-footer .tr,
html[lang="vi"] .site-footer .vi{display:inline}
html:not([lang]) .site-footer .ko{display:inline}
</style>
<script>
(function(){
  function sfApplyLang(){
    var lang=(document.documentElement.getAttribute('lang')||'ko');
    var suf=(lang==='ko'?'':'?lang='+lang);
    document.querySelectorAll('.site-footer a.sf-legal').forEach(function(a){
      var base=a.getAttribute('data-base'); if(base) a.setAttribute('href', base+suf);
    });
  }
  sfApplyLang();
  ['setLang','L'].forEach(function(fn){
    if(typeof window[fn]==='function' && !window[fn].__sfWrapped){
      var orig=window[fn];
      window[fn]=function(){ var r=orig.apply(this,arguments); try{sfApplyLang();}catch(e){} return r; };
      window[fn].__sfWrapped=true;
    }
  });
  try{ new MutationObserver(sfApplyLang).observe(document.documentElement,{attributes:true,attributeFilter:['lang']}); }catch(e){}
})();
</script>
