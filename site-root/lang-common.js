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

  function pathLang() {
    try {
      var m = location.pathname.match(/^\/([a-z]{2})(?:\/|$)/);
      return (m && isValid(m[1])) ? m[1] : null;
    } catch (e) { return null; }
  }

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
    var pth = pathLang();       if (pth) return pth;
    var u = urlLang();          if (u) return u;
    var c = readCookie();       if (isValid(c)) return c;
    var s = readLocal();        if (isValid(s)) return s;
    if (useBrowser) { var b = browserLang(); if (b) return b; }
    return 'ko';
  }

  /**
   * 언어를 저장한다(쿠키 + localStorage 동시). 사용자가 언어를 "선택"했을 때만 호출.
   * ★ 페이지 진입 시에는 호출하지 말 것 — 진입 시 저장하면 뒤로가기로 온 페이지의 언어가
   *   최근 방문 언어로 오염된다(서버가 URL만 보게 해도 클라 저장이 꼬임).
   */
  function save(l) {
    if (!isValid(l)) return;
    writeCookie(l);
    writeLocal(l);
  }

  /**
   * 현재 렌더된 언어(rendered)를 이 페이지의 URL에 반영한다(?lang=xx, replaceState).
   * 페이지 진입 시 호출 → 이 히스토리 엔트리가 자기 언어를 URL에 담게 되어,
   * 나중에 "뒤로가기"로 이 페이지에 돌아오면 그때의 언어로 정확히 복원된다.
   * (서버는 URL ?lang만 보므로, URL에 언어가 박혀 있어야 뒤로가기가 정확함.)
   * 저장(쿠키/localStorage)은 하지 않는다 — 오염 방지.
   */
  function stampUrl(rendered) {
    try {
      if (pathLang()) return;
      var u = new URL(location.href);
      if (rendered === 'ko') u.searchParams.delete('lang');
      else if (isValid(rendered)) u.searchParams.set('lang', rendered);
      else return;
      history.replaceState(null, '', u);
    } catch (e) {}
  }

  // 내부 경로를 언어별 경로형 URL로 변환(서버 i18nUrl과 동일 규칙). ko는 그대로, 비-ko는 /{lang}+.php제거.
  // 화이트리스트(블로그/용어집/안내 등)만 손대고, 자산·API·외부·앵커는 건드리지 않는다.
  function _pathifiable(p) {
    return p === '/' ||
      /^\/(?:blog(?:\/|$)|glossary(?:\/|$)|about|privacy|terms|exchanges|coins|rss-guide|sitemap-guide)/.test(p);
  }
  function i18nHref(href, lang) {
    if (!href || href.charAt(0) !== '/') return href;      // 내부 절대경로만
    try {
      var u = new URL(href, location.origin);
      var p = u.pathname.replace(/^\/(en|ja|es|de|fr|pt|tr|vi)(?=\/|$)/, '') || '/'; // 기존 언어접두어 제거
      if (!_pathifiable(p)) return href;                   // 화이트리스트 밖은 그대로
      if (/^\/blog\/[a-z0-9-]+$/.test(p)) p += '.php';    // ko 글 형태(.php)로 정규화
      u.searchParams.delete('lang');
      var rest = u.search + u.hash;
      if (lang === 'ko') return p + rest;
      return '/' + lang + (p === '/' ? '' : p.replace(/\.php$/, '')) + rest;
    } catch (e) { return href; }
  }
  // 페이지 내 모든 내부 링크를 현재 언어의 경로형으로 일괄 변환.
  function pathify(lang) {
    if (!isValid(lang)) return;
    try {
      var as = document.querySelectorAll('a[href^="/"]');
      for (var i = 0; i < as.length; i++) {
        var h = as[i].getAttribute('href'); var nh = i18nHref(h, lang);
        if (nh !== h) as[i].setAttribute('href', nh);
      }
    } catch (e) {}
  }

  w.BTLang = { get: get, save: save, stampUrl: stampUrl, readCookie: readCookie, isValid: isValid, i18nHref: i18nHref, pathify: pathify };
})(window);
