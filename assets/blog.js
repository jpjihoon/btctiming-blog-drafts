/* BTCtiming blog 공통 스크립트 — 원래 _footer.php 인라인 <script>였음.
   2026-07-19 외부화. SUPPORTED_LANGS 는 window.BT_SUPPORTED_LANGS(푸터 상단 부트스트랩)로 주입. */
// 사용자가 언어 메뉴에서 직접 고른 경우: "명시적 선택" 플래그를 켜고 전환.
// 이 플래그가 켜져 있으면 이후 뒤로가기 등으로 ?lang=이 다른 페이지에 도달해도
// 사용자가 마지막에 고른 언어를 우선 적용한다(applySavedLang 참고).
// ★ 2026-07-16 스크롤 복원용 앵커
//   언어를 바꾸면 페이지가 이동하므로 스크롤이 맨 위로 간다. 읽던 자리를 넘긴다.
//   ⚠ scrollY(픽셀)를 저장하면 안 된다 — 언어마다 문단 길이가 달라 엉뚱한 데로 간다.
//     (실측: ko 본문 7,194자 vs es 15,670자)
//   h2/h3 제목은 루틴이 섹션 병렬 작성을 강제하므로 언어와 무관하게 순서·개수가 같다.
//   (실측 27편 × 9언어 중 26편 일치. 어긋나는 글을 대비해 개수를 같이 저장해 검사한다)
function __btArtAnchor(){
  var hs = document.querySelectorAll('.wrap-main h2, .wrap-main h3');
  var y = window.pageYOffset || document.documentElement.scrollTop || 0;
  if (y < 4) return null;                                   // 맨 위 → 복원할 것 없음
  var sh = document.documentElement.scrollHeight - window.innerHeight;
  var docFrac = sh > 0 ? (y / sh) : 0;
  if (!hs.length) return { i:-2, n:0, f:0, d:docFrac };      // 제목 없는 글 → 비율만
  var dtop = function(el){ return el.getBoundingClientRect().top + y; };
  var i = -1;
  for (var k=0;k<hs.length;k++){ if (dtop(hs[k]) <= y + 1) i = k; else break; }
  var start, end;
  if (i < 0) { start = 0; end = dtop(hs[0]); }
  else { start = dtop(hs[i]); end = (i+1 < hs.length) ? dtop(hs[i+1]) : document.documentElement.scrollHeight; }
  var span = Math.max(1, end - start);
  return { i:i, n:hs.length, f: Math.max(0, Math.min(1, (y - start)/span)), d:docFrac };
}

function Lpick(l){
  try{ localStorage.setItem('blogLangPicked','1'); }catch(e){}
  // ★ 2026-07-15 단일언어 렌더 대응
  //   예전엔 9개 언어가 전부 HTML에 있어서 L(l)이 CSS만 토글하면 즉시 전환됐다.
  //   이제 서버가 현재 언어 블록만 내려주므로, CSS를 토글하면 빈 화면이 된다.
  //   → 해당 언어의 경로형 URL로 이동한다. (/blog/{slug} ↔ /en/blog/{slug})
  if(window.BTLang && BTLang.save) BTLang.save(l);
  try{
    var cur = location.pathname + location.search + location.hash;
    var to  = (window.BTLang && BTLang.i18nHref) ? BTLang.i18nHref(cur, l) : null;
    if(to && to !== cur){
      try{ var a = __btArtAnchor(); if(a) sessionStorage.setItem('btArtScroll', JSON.stringify(a)); }catch(e){}
      location.href = to; return;                            // 이동 성공 → 여기서 끝
    }
  }catch(e){}
  L(l);   // i18nHref를 못 쓰는 예외 상황에서만 기존 방식(폴백)
}

// ★ 언어 전환으로 이동해 온 경우: 읽던 섹션 위치로 되돌린다.
//   sessionStorage 는 1회용 — 읽자마자 지워서 일반 새로고침엔 안 걸린다.
(function __btRestoreArtScroll(){
  var raw = null;
  try { raw = sessionStorage.getItem('btArtScroll'); sessionStorage.removeItem('btArtScroll'); } catch(e){ return; }
  if (!raw) return;
  var st; try { st = JSON.parse(raw); } catch(e){ return; }
  if (!st) return;
  var go = function(){
    var hs = document.querySelectorAll('.wrap-main h2, .wrap-main h3');
    var y  = window.pageYOffset || document.documentElement.scrollTop || 0;
    var sh = document.documentElement.scrollHeight - window.innerHeight;
    // 섹션 수가 다른 글(전체의 ~4%)이거나 제목이 없으면 → 문서 전체 비율로 근사
    if (!hs.length || hs.length !== st.n || st.i === -2) {
      if (sh > 0 && st.d != null) window.scrollTo(0, Math.round(st.d * sh));
      return;
    }
    if (st.i >= hs.length) return;
    var dtop = function(el){ return el.getBoundingClientRect().top + y; };
    var start, end;
    if (st.i < 0) { start = 0; end = dtop(hs[0]); }
    else { start = dtop(hs[st.i]); end = (st.i+1 < hs.length) ? dtop(hs[st.i+1]) : document.documentElement.scrollHeight; }
    var span = Math.max(1, end - start);
    window.scrollTo(0, Math.round(start + st.f * span));
  };
  go();
  requestAnimationFrame(go);                                  // 레이아웃 확정 후 1차 보정
  window.addEventListener('load', function(){                 // 폰트·SVG 로드로 밀린 것 2차 보정
    requestAnimationFrame(function(){ requestAnimationFrame(go); });
  });
})();
function L(l){
  document.getElementById('hr').lang=l;
  const trigLabel = document.getElementById('langTriggerLabel');
  if(trigLabel) trigLabel.textContent = l.toUpperCase();
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === l);
  });
  closeLangMenu();
  // 브레드크럼(홈/블로그/카테고리) 링크는 하나의 <a>에 언어별 텍스트만 들어있는 구조라
  // 언어를 바꿔도 href는 그대로였음 — 여기서 href도 같이 갱신
  const bcCat = document.getElementById('bcCatLink');
  if(bcCat){ const cat = bcCat.dataset.cat || ''; bcCat.setAttribute('href', (l==='ko'?'':'/'+l) + '/blog/?cat=' + cat); }
  if(window.cbSyncLang) cbSyncLang(l);  // 카테고리 바(드롭다운) 링크·검색폼도 현재 언어 유지
  if(window.BTLang && BTLang.pathify) BTLang.pathify(l);  // 모든 내부 링크를 경로형으로
  try{ // 브라우저 탭 제목·설명도 언어별로 갱신
    if(window.__ART_TITLE && window.__ART_TITLE[l]) document.title = window.__ART_TITLE[l];
    var __md=document.querySelector('meta[name="description"]');
    if(__md && window.__ART_DESC && window.__ART_DESC[l]) __md.setAttribute('content', window.__ART_DESC[l]);
  }catch(e){}
  try{ if(window.BTLang && BTLang.i18nHref) history.replaceState(null,'',BTLang.i18nHref(location.pathname+location.search+location.hash, l)); }catch(e){}  // URL도 경로형으로
  // 로고·하단 정책(개인정보/약관)·CTA 링크도 현재 언어를 유지하도록 href 갱신
  // (예전엔 서버 렌더 시점 언어에 고정돼, 언어를 바꿔도 예전 언어 페이지로 이동했음)
  // (로고·정책·CTA·이전다음·추천 링크는 위 BTLang.pathify(l)가 경로형으로 일괄 처리)
  // 저장은 공통 유틸에 위임(쿠키+localStorage). 미로드 시 폴백.
  if(window.BTLang){BTLang.save(l);}
  else{try{localStorage.setItem('blogLang',l);document.cookie='blogLang='+encodeURIComponent(l)+'; path=/; max-age=31536000; SameSite=Lax';}catch(e){}}
  try{ if(window.BTLang && BTLang.i18nHref) history.replaceState(null,'',BTLang.i18nHref(location.pathname+location.search+location.hash, l)); }catch(e){}  // 경로형 URL(?lang= 안 붙임)
  try{ if(window.__refreshShare) window.__refreshShare(); }catch(e){}  // 공유 링크도 새 언어 URL로 갱신
}
function toggleLangMenu(e){
  if(e) e.stopPropagation();
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.toggle('open');
}
function closeLangMenu(){
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.remove('open');
}
document.addEventListener('click', (e) => {
  const dd = document.getElementById('langDropdown');
  if(dd && dd.classList.contains('open') && !dd.contains(e.target)) closeLangMenu();
});
function getBlogLang(){
  // 언어 결정은 공통 유틸(lang-common.js)에 위임 → 사이트 전역 동일 규칙.
  if(window.BTLang) return BTLang.get(false);
  // 폴백(공통 유틸 미로드 시): URL > 쿠키 > localStorage > ko
  var SUP = (window.BT_SUPPORTED_LANGS || ["ko","en","ja","es","de","fr","pt","tr","vi","id","pl","it","ru","zh"]);
  try{const p=new URLSearchParams(location.search).get('lang');if(p&&SUP.indexOf(p)!==-1)return p;}catch(e){}
  try{const m=document.cookie.match(/(?:^|;\s*)blogLang=([^;]+)/);const c=m?decodeURIComponent(m[1]):null;if(c&&SUP.indexOf(c)!==-1)return c;}catch(e){}
  try{const s=localStorage.getItem('blogLang')||localStorage.getItem('lang');if(s&&SUP.indexOf(s)!==-1)return s;}catch(e){}
  return'ko';
}
// 저장된 언어 설정 복원 — 본문 내 글 간 링크들이 ?lang= 없이 연결되는 경우가 많아서,
// localStorage에 저장된 선호 언어를 URL보다 후순위로 적용해 이어감.
// (단, 이 글이 해당 언어로 번역 안 됐으면 <html lang>이 서버에서 이미 en으로 폴백돼 있으므로 그대로 둠)
function applySavedLang() {
  try {
    // 기본 원칙: URL에 lang이 명시돼 있으면(사이트맵·hreflang·공유링크로 특정 언어 진입)
    // 서버가 그 언어로 렌더한 상태를 존중하고 저장값으로 덮어쓰지 않는다.
    // 예외: 사용자가 이 브라우저에서 언어 메뉴로 "직접" 언어를 고른 적이 있으면
    //       (blogLangPicked 플래그) 그 선택을 URL보다 우선한다.
    //       → 일본어 글에서 한국어로 바꾼 뒤 뒤로가기 해도 한국어가 유지됨.
    var SUP = (window.BT_SUPPORTED_LANGS || ["ko","en","ja","es","de","fr","pt","tr","vi","id","pl","it","ru","zh"]);
    var picked = false;
    try{ picked = localStorage.getItem('blogLangPicked') === '1'; }catch(e){}
    var __plm = location.pathname.match(/^\/([a-z]{2})(?:\/|$)/);
    var __pathLang = (__plm && SUP.indexOf(__plm[1])!==-1) ? __plm[1] : null;
    const urlLang = __pathLang || new URLSearchParams(location.search).get('lang');
    if((__pathLang || !picked) && SUP.indexOf(urlLang)!==-1) return;
    const saved = getBlogLang();
    const current = document.getElementById('hr').lang;
    if(saved === current) return;
    if(saved !== 'ko' && SUP.indexOf(saved)!==-1) {
      // 이 글에 해당 언어 메뉴 항목이 존재할 때만 실제 전환 (미번역 글은 서버가 en으로 폴백)
      const hasMenuItem = document.querySelector('.lang-menu-item[data-lang="' + saved + '"]');
      if(hasMenuItem) L(saved);
    } else if(saved === 'ko') {
      // 저장된 선호가 한국어인데 페이지가 다른 언어로 렌더된 경우 한국어로 복귀.
      // 모든 글은 한국어 원문이 있으므로 항상 전환 가능.
      L('ko');
    }
  } catch(e){}
}
// 진입 시: 서버가 렌더한 언어(URL 기준, <html lang>)를 그대로 둔다. 저장언어로 덮지 않는다.
// (저장언어로 덮으면 뒤로가기로 온 글이 최근 방문 언어로 오염됨.)
// 그 언어를 URL에 반영 → 뒤로가기로 이 글에 오면 그때 언어로 정확히 복원.
try {
  var _cur = document.getElementById('hr') ? (document.getElementById('hr').lang || 'ko') : 'ko';
  if (window.BTLang) window.BTLang.stampUrl(_cur);
} catch(e){}
// 이전글/다음글 + 추천글 링크를 현재 표시 언어(<html lang>)에 맞춤.
// applySavedLang이 URL 언어 존중 등으로 L()을 안 부르고 끝난 경우에도
// 링크 접미사가 실제 표시 언어와 어긋나지 않도록 무조건 한 번 동기화한다.
function syncPrevNextLang(){
  try{
    const cur = document.getElementById('hr').lang || 'ko';
    document.querySelectorAll('a[data-base^="/blog/"]').forEach(a => {
      const base = a.getAttribute('data-base');
      if(base) a.setAttribute('href', base);  // ko형 그대로 → 아래 pathify가 경로형으로
    });
    if(window.BTLang && BTLang.pathify) BTLang.pathify(cur);  // 모든 내부 링크를 경로형으로(로드·뒤로가기 공통)
  }catch(e){}
}
syncPrevNextLang();
// 뒤로가기/앞으로가기로 bfcache에서 복원될 때는 이 스크립트가 재실행되지 않으므로,
// pageshow(persisted)에서 저장된 언어를 다시 적용해야 언어 설정이 유지됨.
// 뒤로가기/앞으로가기(bfcache) 복원 시: 언어는 브라우저가 복원한 그대로 둔다(건드리지 않음).
// 링크 접미사만 현재 표시 언어에 맞춰 재동기화(applySavedLang은 부르지 않음 → 뒤로가기 언어 유지).
window.addEventListener('pageshow', function(e){ syncPrevNextLang(); });

// ── SNS 공유 버튼 ──
(function initShare(){
  try {
    // 현재 URL·제목으로 공유 링크 재계산+적용 (언어 변경 시 다시 호출 → 새 언어 URL 공유)
    function buildShareUrls(){
      const u = encodeURIComponent(location.href);
      const t = encodeURIComponent(document.title || 'BTCtiming.com');
      return {
        x:    `https://twitter.com/intent/tweet?url=${u}&text=${t}`,
        fb:   `https://www.facebook.com/sharer/sharer.php?u=${u}`,
        in:   `https://www.linkedin.com/sharing/share-offsite/?url=${u}`,
        tg:   `https://t.me/share/url?url=${u}&text=${t}`,
        line: `https://social-plugins.line.me/lineit/share?url=${u}`,
        wa:   `https://api.whatsapp.com/send?text=${t}%20${u}`
      };
    }
    function applyShareUrls(){
      const map = buildShareUrls();
      document.querySelectorAll('[data-share] .share-btn[data-net]').forEach(function(b){
        const n=b.getAttribute('data-net'); if(map[n]) b.setAttribute('href', map[n]);
      });
    }
    window.__refreshShare = applyShareUrls;   // 언어 변경 시 L()에서 호출
    let shareUrls = buildShareUrls();

    // 열려있는 팝오버 전부 닫기
    function closeAllPops(){
      document.querySelectorAll('[data-share-pop]').forEach(p => { p.hidden = true; });
      document.querySelectorAll('[data-share-toggle]').forEach(b => b.setAttribute('aria-expanded','false'));
    }
    // 바깥 클릭 시 닫기
    document.addEventListener('click', (e) => {
      if(!e.target.closest('.share-wrap')) closeAllPops();
    });

    document.querySelectorAll('[data-share]').forEach(bar => {
      // SNS 개별 버튼 href 세팅
      bar.querySelectorAll('.share-btn[data-net]').forEach(btn => {
        const net = btn.getAttribute('data-net');
        if(shareUrls[net]) btn.setAttribute('href', shareUrls[net]);
        // SNS 클릭하면 팝오버 닫기
        btn.addEventListener('click', () => setTimeout(closeAllPops, 50));
      });

      // 공유 토글: 네이티브 지원 시 시스템 공유 시트, 아니면 팝오버 펼침
      const toggle = bar.querySelector('[data-share-toggle]');
      const pop = bar.querySelector('[data-share-pop]');
      if(toggle){
        toggle.addEventListener('click', (e) => {
          e.stopPropagation();
          // 항상 자체 팝오버를 펼침 (브라우저/OS 기본 공유창 대신 X·Facebook·LinkedIn 등 아이콘 노출)
          if(pop){
            const willOpen = pop.hidden;
            closeAllPops();
            if(willOpen){ pop.hidden = false; toggle.setAttribute('aria-expanded','true'); }
          }
        });
      }

      // 복사 버튼 (별도)
      const copyBtn = bar.querySelector('[data-net="copy"]');
      if(copyBtn){
        copyBtn.addEventListener('click', () => {
          const pageUrl = location.href;   // ★ 2026-07-18: pageUrl 이 정의된 적이 없어 복사 시 ReferenceError → 복사가 안 됐다. 클릭 시점의 URL 로 정의.
          const done = () => { copyBtn.classList.add('copied'); setTimeout(()=>copyBtn.classList.remove('copied'), 1500); };
          if(navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(pageUrl).then(done).catch(()=>{
              const ta=document.createElement('textarea');ta.value=pageUrl;document.body.appendChild(ta);ta.select();
              try{document.execCommand('copy');}catch(e){} document.body.removeChild(ta); done();
            });
          } else {
            const ta=document.createElement('textarea');ta.value=pageUrl;document.body.appendChild(ta);ta.select();
            try{document.execCommand('copy');}catch(e){} document.body.removeChild(ta); done();
          }
        });
      }
    });
  } catch(e){}
})();

// 기존/신규 글 모두 자동 적용. 이미 감싼 건 건너뜀.
(function wrapSvgCharts(){
  try {
    var wrap = document.querySelector('.wrap');
    if(!wrap) return;
    var svgs = wrap.querySelectorAll('svg');
    svgs.forEach(function(svg){
      if(svg.closest('.svg-scroll')) return;           // 이미 래핑됨
      if(svg.closest('.lang-menu, nav, .prevnext, .other-articles')) return; // 아이콘류 제외
      // viewBox가 넓은(차트형) SVG만 대상 — 작은 인라인 아이콘은 제외
      var vb = svg.getAttribute('viewBox');
      var wide = false;
      if(vb){ var p = vb.split(/[ ,]+/); if(p.length===4 && parseFloat(p[2])>=400) wide = true; }
      if(!wide) return;
      var box = document.createElement('div');
      box.className = 'svg-scroll';
      svg.parentNode.insertBefore(box, svg);
      box.appendChild(svg);
    });
  } catch(e){}
})();
