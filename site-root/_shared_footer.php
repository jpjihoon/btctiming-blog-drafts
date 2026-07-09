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
<div class="app-banner" id="appBanner" hidden>
  <div class="ab-inner">
    <div class="ab-icon" aria-hidden="true">
      <svg width="30" height="30" viewBox="0 0 100 100"><path d="M15 62 A40 40 0 0 1 85 62" fill="none" stroke="#3f3f46" stroke-width="9" stroke-linecap="round"/><path d="M15 62 A40 40 0 0 1 35 30" fill="none" stroke="#f7931a" stroke-width="9" stroke-linecap="round"/><line x1="50" y1="60" x2="68" y2="40" stroke="#f7931a" stroke-width="4" stroke-linecap="round"/><circle cx="50" cy="60" r="5" fill="#f7931a"/></svg>
    </div>
    <div class="ab-text">
      <div class="ab-title"><span class="ko">이제 앱으로도 만나보세요</span><span class="en">Now available as an app</span><span class="ja">アプリでもご利用いただけます</span><span class="es">Ahora disponible como app</span><span class="de">Jetzt auch als App verfügbar</span><span class="fr">Désormais disponible en application</span><span class="pt">Agora disponível como app</span><span class="tr">Artık uygulama olarak da mevcut</span><span class="vi">Giờ đã có trên ứng dụng</span></div>
      <div class="ab-sub"><span class="ko">언제 어디서나 실시간 타이밍 점수와 알림을 받아보세요.</span><span class="en">Get real-time timing scores and alerts anywhere.</span><span class="ja">いつでもどこでもリアルタイムのタイミングスコアと通知を。</span><span class="es">Recibe puntajes de timing y alertas en tiempo real donde estés.</span><span class="de">Erhalte Echtzeit-Timing-Scores und Alerts überall.</span><span class="fr">Recevez des scores de timing et des alertes en temps réel partout.</span><span class="pt">Receba pontuações de timing e alertas em tempo real onde estiver.</span><span class="tr">Her yerde gerçek zamanlı zamanlama puanları ve uyarılar alın.</span><span class="vi">Nhận điểm thời điểm và cảnh báo theo thời gian thực ở mọi nơi.</span></div>
    </div>
    <a class="ab-btn" href="https://play.google.com/store/apps/details?id=com.btctiming.app" target="_blank" rel="noopener">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 20.5V3.5c0-.6.3-1 .8-1.2l10.9 8.7-2.6 2.6L3.9 21.7c-.5-.2-.9-.6-.9-1.2zM17.5 12l-2.9-2.3 2.9-2.9 3.3 2c.9.6.9 1.8 0 2.4l-3.3 2v-1.2zM5.5 2.9l9.1 5.6-2.4 2.4L5.5 2.9z"/></svg>
      <span class="ko">Google Play에서 받기</span><span class="en">Get it on Google Play</span><span class="ja">Google Playで入手</span><span class="es">Descárgalo en Google Play</span><span class="de">Bei Google Play laden</span><span class="fr">Disponible sur Google Play</span><span class="pt">Baixar no Google Play</span><span class="tr">Google Play'den edinin</span><span class="vi">Tải trên Google Play</span></a>
  </div>
</div>
<footer class="site-footer">
  <div class="sf-links" role="navigation" aria-label="Footer">
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
  </div>
  <div class="sf-meta">© 2026 BTCtiming.com<span class="sf-dis"><span class="ko"> · 본 사이트의 모든 정보는 투자 조언이 아닙니다.</span><span class="en"> · The information on this site is not investment advice.</span><span class="ja"> · 本サイトのすべての情報は投資助言ではありません。</span><span class="es"> · La información de este sitio no es asesoramiento financiero.</span><span class="de"> · Die Informationen auf dieser Website sind keine Finanzberatung.</span><span class="fr"> · Les informations de ce site ne constituent pas un conseil financier.</span><span class="pt"> · As informações deste site não são aconselhamento financeiro.</span><span class="tr"> · Bu sitedeki bilgiler yatırım tavsiyesi değildir.</span><span class="vi"> · Thông tin trên trang này không phải là lời khuyên đầu tư.</span></span></div>
</footer>
<style>
.app-banner{max-width:760px;margin:26px auto 0;padding:0 16px}
.app-banner .ab-inner{background:#0d0d10;border:1px solid rgba(255,255,255,.08);border-radius:16px;padding:18px 20px;display:flex;align-items:center;gap:16px}
.app-banner .ab-icon{width:52px;height:52px;border-radius:13px;background:#151518;border:1px solid rgba(247,147,26,.28);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.app-banner .ab-text{flex:1;min-width:0;text-align:left}
.app-banner .ab-title{color:#fafafa;font-size:15.5px;font-weight:600;margin-bottom:3px}
.app-banner .ab-sub{color:#8b8b93;font-size:12.5px;line-height:1.5}
.app-banner .ab-btn{display:inline-flex;align-items:center;gap:8px;background:#f7931a;color:#0a0a0a;font-size:13.5px;font-weight:600;padding:10px 17px;border-radius:10px;text-decoration:none;flex-shrink:0;transition:background .12s}
.app-banner .ab-btn:hover{background:#ffa733}
.app-banner .ko,.app-banner .en,.app-banner .ja,.app-banner .es,.app-banner .de,.app-banner .fr,.app-banner .pt,.app-banner .tr,.app-banner .vi{display:none}
html[lang="ko"] .app-banner .ko,
html[lang="en"] .app-banner .en,
html[lang="ja"] .app-banner .ja,
html[lang="es"] .app-banner .es,
html[lang="de"] .app-banner .de,
html[lang="fr"] .app-banner .fr,
html[lang="pt"] .app-banner .pt,
html[lang="tr"] .app-banner .tr,
html[lang="vi"] .app-banner .vi{display:inline}
html:not([lang]) .app-banner .ko{display:inline}
@media (max-width:560px){
  .app-banner .ab-inner{flex-wrap:wrap;gap:13px}
  .app-banner .ab-text{flex-basis:calc(100% - 68px)}
  .app-banner .ab-btn{width:100%;justify-content:center;padding:12px}
}
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
  // 앱 다운로드 배너: TWA(껍데기) 앱 내부에서는 숨기고, 일반 브라우저(PC·모바일)에서만 노출.
  // 앱 판정 신호(하나라도 참이면 앱으로 간주):
  //  1) display-mode standalone / fullscreen  (PWA·TWA는 이 모드로 뜸)
  //  2) document.referrer 가 android-app://com.btctiming.app  (TWA 진입 시)
  //  3) 세션에 한번 앱으로 판정되면 유지 (앱 내 페이지 이동 시 referrer 사라져도 계속 숨김)
  //  4) navigator.standalone (iOS 홈화면 앱)
  try {
    var banner = document.getElementById('appBanner');
    if (banner) {
      var isStandalone = (window.matchMedia && (
        window.matchMedia('(display-mode: standalone)').matches ||
        window.matchMedia('(display-mode: fullscreen)').matches ||
        window.matchMedia('(display-mode: minimal-ui)').matches
      )) || (navigator.standalone === true);
      var fromAndroidApp = (document.referrer || '').indexOf('android-app://com.btctiming.app') === 0;
      var flagged = false;
      try { flagged = sessionStorage.getItem('bt_in_app') === '1'; } catch(e){}
      var inApp = isStandalone || fromAndroidApp || flagged;
      if (inApp) {
        try { sessionStorage.setItem('bt_in_app', '1'); } catch(e){}
        // 앱: 배너 숨김 유지 (hidden 그대로)
      } else {
        banner.hidden = false; // 일반 브라우저에서만 노출
      }
    }
  } catch(e){}
})();
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
