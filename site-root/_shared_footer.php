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
 <div class="sf-wrap">
  <div class="sf-center">
  <div class="sf-links" role="navigation" aria-label="Footer">
    <span class="sf-group">
      <a href="/blog/" class="sf-link sf-legal" data-base="/blog/"><span class="ko">블로그</span><span class="en">Blog</span><span class="ja">ブログ</span><span class="es">Blog</span><span class="de">Blog</span><span class="fr">Blog</span><span class="pt">Blog</span><span class="tr">Blog</span><span class="vi">Blog</span></a>
      <span class="sf-sep">·</span>
      <a href="/glossary" class="sf-link sf-legal" data-base="/glossary"><span class="ko">용어사전</span><span class="en">Glossary</span><span class="ja">用語集</span><span class="es">Glosario</span><span class="de">Glossar</span><span class="fr">Glossaire</span><span class="pt">Glossário</span><span class="tr">Sözlük</span><span class="vi">Từ điển</span></a>
      <span class="sf-sep">·</span>
      <a href="/rss-guide" class="sf-link sf-legal" data-base="/rss-guide">RSS</a>
      <span class="sf-sep">·</span>
      <a href="/sitemap-guide" class="sf-link sf-legal" data-base="/sitemap-guide"><span class="ko">사이트맵</span><span class="en">Sitemap</span><span class="ja">サイトマップ</span><span class="es">Mapa del sitio</span><span class="de">Sitemap</span><span class="fr">Plan du site</span><span class="pt">Mapa do site</span><span class="tr">Site haritası</span><span class="vi">Sơ đồ trang</span></a>
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
  </div>
  <a class="app-mini app-mini--fixed" id="appBanner" href="https://play.google.com/store/apps/details?id=com.btctiming.app" target="_blank" rel="noopener" hidden>
    <span class="am-icon" aria-hidden="true">
      <svg width="26" height="26" viewBox="0 0 64 64"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </span>
    <span class="am-text">
      <span class="am-top"><span class="ko">앱으로도 만나보세요</span><span class="en">Also on the app</span><span class="ja">アプリでも</span><span class="es">También en la app</span><span class="de">Auch als App</span><span class="fr">Aussi sur l'app</span><span class="pt">Também no app</span><span class="tr">Uygulamada da</span><span class="vi">Có trên ứng dụng</span></span>
      <span class="am-btn"><svg width="12" height="12" viewBox="0 0 24 24" fill="#f7931a" aria-hidden="true"><path d="M3 20.5V3.5c0-.6.3-1 .8-1.2l10.9 8.7-2.6 2.6L3.9 21.7c-.5-.2-.9-.6-.9-1.2zM17.5 12l-2.9-2.3 2.9-2.9 3.3 2c.9.6.9 1.8 0 2.4l-3.3 2v-1.2zM5.5 2.9l9.1 5.6-2.4 2.4L5.5 2.9z"/></svg>Google Play</span>
    </span>
  </a>
 </div>
</footer>
<style>
.site-footer .sf-wrap{max-width:1100px;margin:0 auto;position:relative;display:flex;align-items:center;justify-content:center;min-height:56px}
.site-footer .sf-center{text-align:center;flex:1;min-width:0}
.app-mini{display:inline-flex;align-items:center;gap:10px;background:#0d0d10;border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:8px 13px 8px 9px;text-decoration:none;flex-shrink:0;transition:border-color .12s}
.app-mini[hidden]{display:none!important}
.app-mini--fixed{position:absolute;right:0;top:50%;transform:translateY(-50%)}
.app-mini:hover{border-color:rgba(247,147,26,.4)}
.app-mini .am-icon{width:36px;height:36px;border-radius:10px;background:#151518;border:1px solid rgba(247,147,26,.28);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.app-mini .am-text{display:flex;flex-direction:column;text-align:left;line-height:1.25}
.app-mini .am-top{font-size:11px;color:#8b8b93}
.app-mini .am-btn{display:inline-flex;align-items:center;gap:4px;font-size:13px;color:#f7931a;font-weight:600;margin-top:1px}
.app-mini .ko,.app-mini .en,.app-mini .ja,.app-mini .es,.app-mini .de,.app-mini .fr,.app-mini .pt,.app-mini .tr,.app-mini .vi{display:none}
html[lang="ko"] .app-mini .ko,
html[lang="en"] .app-mini .en,
html[lang="ja"] .app-mini .ja,
html[lang="es"] .app-mini .es,
html[lang="de"] .app-mini .de,
html[lang="fr"] .app-mini .fr,
html[lang="pt"] .app-mini .pt,
html[lang="tr"] .app-mini .tr,
html[lang="vi"] .app-mini .vi{display:inline}
html:not([lang]) .app-mini .ko{display:inline}
@media (max-width:640px){
  .site-footer .sf-wrap{flex-direction:column;align-items:center;gap:16px;padding-bottom:8px}
  .site-footer .sf-center{text-align:center}
  .app-mini--fixed{position:static;transform:none}
}
.site-footer{border-top:1px solid rgba(255,255,255,.06);padding:20px 16px 90px;line-height:1.9}
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
<?php /* 설정 모달(⚙️) — 전 페이지 공통 단일 소스.
   이 푸터가 대시보드·블로그(목록/글)·용어사전·안내페이지 전부에 들어가므로 여기서 한 번만 출력한다. */
   include __DIR__ . '/_settings_modal.php'; ?>
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
        window.matchMedia('(display-mode: minimal-ui)').matches ||
        window.matchMedia('(display-mode: window-controls-overlay)').matches
      )) || (navigator.standalone === true);
      var fromAndroidApp = (document.referrer || '').indexOf('android-app://com.btctiming.app') === 0;
      var flagged = false;
      try { flagged = sessionStorage.getItem('bt_in_app') === '1'; } catch(e){}
      var inApp = isStandalone || fromAndroidApp || flagged;
      if (inApp) {
        try { sessionStorage.setItem('bt_in_app', '1'); } catch(e){}
        banner.hidden = true; banner.style.display = 'none'; // 앱: 확실히 숨김(인라인 스타일)
      } else {
        banner.hidden = false; banner.style.display = ''; // 일반 브라우저에서만 노출
      }
    }
  } catch(e){}
})();
(function(){
  function sfApplyLang(){
    var lang=(document.documentElement.getAttribute('lang')||'ko');
    document.querySelectorAll('.site-footer a.sf-legal').forEach(function(a){
      var base=a.getAttribute('data-base'); if(!base) return;
      a.setAttribute('href', (window.BTLang && BTLang.i18nHref) ? BTLang.i18nHref(base, lang) : base);
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

/* ═══════════════════════════════════════════════════════════
   플로팅 위젯 — 전 페이지 공통 (대시보드·블로그·용어사전 등 어디서나)
   localStorage에서 직접 코인/언어를 읽어 자립적으로 동작한다.
   대시보드의 "화면에 위젯 고정" 버튼이 켜지면 btc_float_on='1'이 저장되고,
   이후 어느 페이지로 이동하든 이 코드가 자동으로 위젯을 다시 띄운다.
   ═══════════════════════════════════════════════════════════ */
(function(){
  if(window._btcFloatCommonLoaded) return;   // 중복 로드 방지
  window._btcFloatCommonLoaded = true;

  var VALID=['ko','en','ja','es','de','fr','pt','tr','vi','id','pl','it','ru','zh'];
  function floatLang(){
    // 현재 페이지가 렌더 중인 언어를 따라감
    try{ if(typeof currentLang!=='undefined' && currentLang && VALID.indexOf(currentLang)>=0) return currentLang; }catch(e){}
    var hl=document.documentElement.getAttribute('lang');
    if(hl && VALID.indexOf(hl)>=0) return hl;
    try{ if(window.BTLang && BTLang.get){ var l=BTLang.get(); if(l&&VALID.indexOf(l)>=0) return l; } }catch(e){}
    return 'ko';
  }
  function floatCoins(){
    // 저장된 즐겨찾기 코인 (없으면 기본 5개). BTC만 나오던 버그 방지: 직접 localStorage 파싱
    try{
      var raw=localStorage.getItem('btc_wg_coins');
      if(raw){ var arr=JSON.parse(raw); if(Array.isArray(arr) && arr.length) return arr; }
    }catch(e){}
    return ['BTC','ETH','SOL','XRP','DOGE'];
  }
  function floatBlog(){
    try{ return localStorage.getItem('btc_wg_blog')==='1'; }catch(e){ return false; }
  }
  function widgetUrl(){
    var coins=floatCoins().join(',');
    var blog=floatBlog()?'&blog=1':'';
    return 'https://btctiming.com/widget.php?coins='+encodeURIComponent(coins)+'&lang='+floatLang()+blog;
  }
  function estHeight(){
    var n=floatCoins().length;
    return Math.min(38 + (floatBlog()?34:0) + Math.max(n,1)*38 + 28, 340);
  }

  // 전역 공개: 대시보드 버튼이 이 함수를 호출 (있으면 재사용, 없으면 여기 정의)
  window.btcLaunchFloating = function(fromRestore){
    var fw=document.getElementById('btcFloatWidget');
    if(fw && !fromRestore){
      fw.remove();
      if(window._btcFloatPoll){clearInterval(window._btcFloatPoll);window._btcFloatPoll=null;}
      try{ localStorage.setItem('btc_float_on','0'); }catch(e){}
      return;
    }
    if(fw) return;
    var h=estHeight();
    var pos={top:80,left:null,right:24};
    try{ var s=JSON.parse(localStorage.getItem('btc_float_pos')||'null'); if(s) pos=s; }catch(e){}
    fw=document.createElement('div');
    fw.id='btcFloatWidget';
    var posStyle = (pos.left!==null && pos.left!==undefined) ? ('left:'+pos.left+'px;') : ('right:'+(pos.right||24)+'px;');
    fw.style.cssText='position:fixed;top:'+(pos.top||80)+'px;'+posStyle+'width:320px;height:'+(h+34)+'px;z-index:99999;'
      +'background:#0d0d10;border:1px solid rgba(255,255,255,.16);border-radius:14px;'
      +'box-shadow:0 16px 48px rgba(0,0,0,.7);overflow:hidden;display:flex;flex-direction:column';
    fw.innerHTML=
      '<div id="btcFloatBar" style="display:flex;align-items:center;justify-content:space-between;padding:7px 11px;'
      +'background:#1e1e25;cursor:move;border-bottom:1px solid rgba(255,255,255,.1);flex-shrink:0">'
      +'<span style="font-size:11px;font-weight:700;color:#f7931a">📌 BTCtiming</span>'
      +'<span id="btcFloatClose" style="cursor:pointer;color:#c0c0c8;font-size:17px;line-height:1;padding:0 3px">×</span></div>'
      +'<iframe id="btcFloatFrame" src="'+widgetUrl()+'" frameborder="0" scrolling="no" '
      +'style="flex:1;width:100%;border:0;background:#0d0d10"></iframe>';
    document.body.appendChild(fw);
    try{ localStorage.setItem('btc_float_on','1'); }catch(e){}
    document.getElementById('btcFloatClose').onclick=function(){
      fw.remove();
      if(window._btcFloatPoll){clearInterval(window._btcFloatPoll);window._btcFloatPoll=null;}
      try{ localStorage.setItem('btc_float_on','0'); }catch(e){}
    };
    // 드래그
    (function(el,handle){
      var sx=0,sy=0,ox=0,oy=0,drag=false,ifr=el.querySelector('iframe');
      handle.addEventListener('mousedown',function(e){
        drag=true;sx=e.clientX;sy=e.clientY;var r=el.getBoundingClientRect();ox=r.left;oy=r.top;
        el.style.right='auto';el.style.left=ox+'px';el.style.top=oy+'px';
        if(ifr) ifr.style.pointerEvents='none'; e.preventDefault();
      });
      document.addEventListener('mousemove',function(e){
        if(!drag)return; el.style.left=(ox+e.clientX-sx)+'px'; el.style.top=(oy+e.clientY-sy)+'px';
      });
      document.addEventListener('mouseup',function(){
        if(!drag)return; drag=false; if(ifr) ifr.style.pointerEvents='';
        try{ var r=el.getBoundingClientRect(); localStorage.setItem('btc_float_pos',JSON.stringify({top:Math.round(r.top),left:Math.round(r.left),right:null})); }catch(e){}
      });
    })(fw, document.getElementById('btcFloatBar'));
    // 높이 자동조정 + 언어 변경 감지 (같은 도메인이므로 iframe 내부 직접 읽음)
    var frame=document.getElementById('btcFloatFrame');
    var _fl=floatLang();
    function fit(){
      try{
        var nl=floatLang();
        if(nl!==_fl){ _fl=nl; frame.src=widgetUrl(); return; }
        var doc=frame.contentDocument||frame.contentWindow.document;
        if(!doc||!doc.body) return;
        var ih=doc.body.scrollHeight, maxH=window.innerHeight-100;
        var t=Math.min(ih,maxH)+34;
        if(Math.abs(parseInt(fw.style.height)-t)>2) fw.style.height=t+'px';
      }catch(e){}
    }
    if(window._btcFloatPoll) clearInterval(window._btcFloatPoll);
    window._btcFloatPoll=setInterval(fit,200);
    frame.addEventListener('load',fit);
  };

  // 페이지 로드 시: 켜짐 상태였으면 자동 복원 (블로그↔메인 등 이동해도 유지)
  function restore(){
    try{ if(localStorage.getItem('btc_float_on')==='1') window.btcLaunchFloating(true); }catch(e){}
  }
  if(document.readyState!=='loading') restore();
  else document.addEventListener('DOMContentLoaded', restore);
})();
</script>
