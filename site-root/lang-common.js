/*
 * BTCtiming 공통 언어 유틸 — 사이트 전역 단일 소스.
 * 대시보드·용어집·블로그·안내 페이지가 모두 이 파일을 로드해서 같은 규칙을 쓴다.
 * 언어 관련 동작을 바꿀 일이 생기면 여기만 고치면 전 페이지에 일관 적용된다.
 *
 * 서버(config.php resolveLang)와 동일한 우선순위를 따른다:
 *   URL ?lang= > 쿠키 blogLang > localStorage > (브라우저 언어) > ko
 *
 * 전역 window.BTLang 로 노출한다.
 */
(function (w) {
  'use strict';

  var COOKIE = 'blogLang';
  var ONE_YEAR = 31536000;

  // 지원 언어 목록: 각 페이지가 <script>로 window.BT_SUPPORTED_LANGS 를 먼저 주입한다.
  // (config.php의 SUPPORTED_LANGS에서 PHP가 찍어줌 → 언어 추가 시 이 JS는 불변)
  function supported() {
    return (w.BT_SUPPORTED_LANGS && w.BT_SUPPORTED_LANGS.length)
      ? w.BT_SUPPORTED_LANGS
      : ['ko']; // 안전 폴백
  }
  function isValid(l) { return !!l && supported().indexOf(l) !== -1; }

  function readCookie() {
    try {
      var m = document.cookie.match(/(?:^|;\s*)blogLang=([^;]+)/);
      return m ? decodeURIComponent(m[1]) : null;
    } catch (e) { return null; }
  }

  function writeCookie(l) {
    try {
      document.cookie = COOKIE + '=' + encodeURIComponent(l) +
        '; path=/; max-age=' + ONE_YEAR + '; SameSite=Lax';
    } catch (e) {}
  }

  function readLocal() {
    try { return localStorage.getItem(COOKIE) || localStorage.getItem('lang'); }
    catch (e) { return null; }
  }
  function writeLocal(l) { try { localStorage.setItem(COOKIE, l); } catch (e) {} }

  function urlLang() {
    try {
      var p = new URLSearchParams(location.search).get('lang');
      return isValid(p) ? p : null;
    } catch (e) { return null; }
  }

  function browserLang() {
    try {
      var nav = (navigator.languages && navigator.languages[0]) || navigator.language || '';
      var code = nav.toLowerCase().split('-')[0];
      return isValid(code) ? code : null;
    } catch (e) { return null; }
  }

  /**
   * 현재 언어 결정. 서버 resolveLang과 같은 우선순위(+ 클라이언트 폴백).
   * @param {boolean} useBrowser true면 마지막에 브라우저 언어까지 감지(첫 방문용). 기본 false.
   */
  function get(useBrowser) {
    var u = urlLang();          if (u) return u;
    var c = readCookie();       if (isValid(c)) return c;
    var s = readLocal();        if (isValid(s)) return s;
    if (useBrowser) { var b = browserLang(); if (b) return b; }
    return 'ko';
  }

  /**
   * 언어를 저장한다(쿠키 + localStorage 동시). 서버가 쿠키를 읽어 다음 페이지를 그 언어로 렌더.
   * 사용자가 언어를 "선택"했을 때, 그리고 페이지 진입 시 현재 언어를 동기화할 때 호출.
   */
  function save(l) {
    if (!isValid(l)) return;
    writeCookie(l);
    writeLocal(l);
  }

  w.BTLang = { get: get, save: save, readCookie: readCookie, isValid: isValid };
})(window);
