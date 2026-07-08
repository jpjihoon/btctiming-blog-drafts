<?php
// ─────────────────────────────────────────────────────────────
// _shared_footer.php — 사이트 전역 공통 푸터 (단일 소스)
// 대시보드 / 블로그(목록·글) / 안내 페이지(소개·약관·개인정보·RSS·사이트맵·용어사전)
// 전부 이 파일 하나를 include → 푸터 수정 시 여기만 고치면 모든 페이지에 반영.
//
// 사용법:
//   대시보드·안내(/www/):  require __DIR__ . '/_shared_footer.php';
//   블로그(/www/blog/):    require __DIR__ . '/../_shared_footer.php';
//
// 링크는 성격별로 두 그룹으로 나눈다:
//   [탐색]  용어사전 · RSS · 사이트맵      (콘텐츠·도구)
//   [회사]  소개 · 개인정보처리방침 · 이용약관 (회사·정책)
//
// 모든 언어 텍스트를 span으로 넣고 현재 <html lang>의 언어만 CSS로 표시.
// ─────────────────────────────────────────────────────────────
if (!function_exists('h')) {
    function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}
?>
<footer class="site-footer">
  <nav class="sf-links" aria-label="Footer">
    <span class="sf-group">
      <a href="/blog/" class="sf-link sf-legal" data-base="/blog/"><span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span><span class="fr">Blog</span><span class="pt">Blog</span><span class="tr">Blog</span><span class="vi">Blog</span></a>
      <span class="sf-sep">·</span>
      <a href="/glossary" class="sf-link sf-legal" data-base="/glossary"><span class="ko">용어사전</span><span class="en">Glossary</span><span class="ja">用語集</span><span class="es">Glosario</span><span class="de">Glossar</span><span class="fr">Glossaire</span><span class="pt">Glossário</span><span class="tr">Sözlük</span><span class="vi">Từ điển</span></a>
      <span class="sf-sep">·</span>
      <a href="/rss-guide.php" class="sf-link">RSS</a>
      <span class="sf-sep">·</span>
      <a href="/sitemap-guide.php" class="sf-link sf-legal" data-base="/sitemap-guide.php"><span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span><span class="fr">Plan du site</span><span class="pt">Mapa do site</span><span class="tr">Site haritası</span><span class="vi">Sơ đồ trang</span></a>
    </span>
    <span class="sf-div">|</span>
    <span class="sf-group">
      <a href="/about" class="sf-link sf-legal" data-base="/about"><span class="ko">서비스 소개</span><span class="en">About</span><span class="ja">概要</span><span class="es">Acerca de</span><span class="de">Über uns</span><span class="fr">À propos</span><span class="pt">Sobre</span><span class="tr">Hakkında</span><span class="vi">Giới thiệu</span></a>
      <span class="sf-sep">·</span>
      <a href="/privacy" class="sf-link sf-legal" data-base="/privacy"><span class="ko">개인정보처리방침</span><span class="en">Privacy Policy</span><span class="ja">プライバシーポリシー</span><span class="es">Política de Privacidad</span><span class="de">Datenschutzerklärung</span><span class="fr">Confidentialité</span><span class="pt">Privacidade</span><span class="tr">Gizlilik Politikası</span><span class="vi">Chính sách bảo mật</span></a>
      <span class="sf-sep">·</span>
      <a href="/terms" class="sf-link sf-legal" data-base="/terms"><span class="ko">이용약관</span><span class="en">Terms of Service</span><span class="ja">利用規約</span><span class="es">Términos de Servicio</span><span class="de">Nutzungsbedingungen</span><span class="fr">Conditions d'utilisation</span><span class="pt">Termos de Serviço</span><span class="tr">Hizmet Şartları</span><span class="vi">Điều khoản dịch vụ</span></a>
    </span>
  </nav>
  <div class="sf-meta">© 2026 BTCtiming.com · <span class="sf-dis"><span class="ko">투자 조언이 아닙니다</span><span class="en">Not financial advice</span><span class="ja">投資助言ではありません</span><span class="es">No es asesoramiento financiero</span><span class="de">Keine Finanzberatung</span><span class="fr">Pas un conseil financier</span><span class="pt">Não é aconselhamento financeiro</span><span class="tr">Yatırım tavsiyesi değildir</span><span class="vi">Không phải lời khuyên tài chính</span></span></div>
</footer>
<style>
.site-footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;text-align:center;line-height:1.9}
.site-footer .sf-links{display:inline-flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:6px;font-size:12px}
.site-footer .sf-group{display:inline-flex;flex-wrap:wrap;align-items:center;gap:6px}
.site-footer a.sf-link{color:#8b8b93;text-decoration:none}
.site-footer a.sf-link:hover{color:#f7931a}
.site-footer .sf-sep{color:#3f3f46}
.site-footer .sf-div{color:#3f3f46;margin:0 6px}
.site-footer .sf-meta{font-size:11px;color:#52525b;margin-top:7px}
.site-footer .sf-dis{color:#52525b}
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
