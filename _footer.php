
<?php
// ── 다른 글 목록: 내부 트래픽 유도용. 같은 카테고리 우선 + 다른 카테고리 섞어서 다양성 확보 ──
$otherPool = array_filter($ARTICLES, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);
$sameCategory = array_filter($otherPool, fn($a) => ($a['category'] ?? '') === $catKey);
$otherCategory = array_filter($otherPool, fn($a) => ($a['category'] ?? '') !== $catKey);
// 최신순으로 우선 노출(날짜 내림차순), 같은 카테고리 4개 + 다른 카테고리 4개 = 8개
uasort($sameCategory, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));
uasort($otherCategory, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));
$related = array_slice($sameCategory, 0, 4, true) + array_slice($otherCategory, 0, 4, true);
$blogSuffix = ($lang === 'ko') ? '' : "?lang={$lang}";
?>
<?php if (!empty($related)): ?>
<div class="other-articles">
  <h3 class="ko">다른 글도 읽어보세요</h3>
  <h3 class="en">You Might Also Like</h3>
  <h3 class="ja">こちらの記事もどうぞ</h3>
  <h3 class="es">También Te Puede Interesar</h3>
  <h3 class="de">Das könnte dich auch interessieren</h3>
  <div class="other-grid">
    <?php foreach ($related as $rSlug => $rA):
      $rCat = $rA['category'] ?? 'guide';
      $rColor = $rA['color'] ?? '#f7931a';
      $rIcon = $rA['icon'] ?? '📄';
      $rTitleJa = $rA['title_ja'] ?? ($rA['title_en'] ?? '');
      $rDescJa = $rA['desc_ja'] ?? ($rA['desc_en'] ?? '');
      $rCatJa = CATEGORY_META[$rCat]['ja'] ?? (CATEGORY_META[$rCat]['en'] ?? $rCat);
      $rTitleEs = $rA['title_es'] ?? ($rA['title_en'] ?? '');
      $rDescEs = $rA['desc_es'] ?? ($rA['desc_en'] ?? '');
      $rCatEs = CATEGORY_META[$rCat]['es'] ?? (CATEGORY_META[$rCat]['en'] ?? $rCat);
      $rTitleDe = $rA['title_de'] ?? ($rA['title_en'] ?? '');
      $rDescDe = $rA['desc_de'] ?? ($rA['desc_en'] ?? '');
      $rCatDe = CATEGORY_META[$rCat]['de'] ?? (CATEGORY_META[$rCat]['en'] ?? $rCat);
    ?>
    <a href="/blog/<?= htmlspecialchars($rSlug) ?>.php<?= htmlspecialchars($blogSuffix) ?>" class="other-card" style="--oc-accent:<?= htmlspecialchars($rColor) ?>">
      <div class="oc-icon"><?= $rIcon ?></div>
      <div class="oc-body">
        <div class="oc-cat">
          <span class="ko"><?= htmlspecialchars(CATEGORY_META[$rCat]['ko'] ?? $rCat) ?></span><span class="en"><?= htmlspecialchars(CATEGORY_META[$rCat]['en'] ?? $rCat) ?></span><span class="ja"><?= htmlspecialchars($rCatJa) ?></span><span class="es"><?= htmlspecialchars($rCatEs) ?></span><span class="de"><?= htmlspecialchars($rCatDe) ?></span>
        </div>
        <div class="oc-title">
          <span class="ko"><?= htmlspecialchars($rA['title_ko'] ?? '') ?></span><span class="en"><?= htmlspecialchars($rA['title_en'] ?? '') ?></span><span class="ja"><?= htmlspecialchars($rTitleJa) ?></span><span class="es"><?= htmlspecialchars($rTitleEs) ?></span><span class="de"><?= htmlspecialchars($rTitleDe) ?></span>
        </div>
        <div class="oc-desc">
          <span class="ko"><?= htmlspecialchars($rA['desc_ko'] ?? '') ?></span><span class="en"><?= htmlspecialchars($rA['desc_en'] ?? '') ?></span><span class="ja"><?= htmlspecialchars($rDescJa) ?></span><span class="es"><?= htmlspecialchars($rDescEs) ?></span><span class="de"><?= htmlspecialchars($rDescDe) ?></span>
        </div>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

  <div class="cta">
    <h3 class="ko">지금 실시간 지표로 직접 확인하기</h3>
    <h3 class="en">Check This Indicator Live Now</h3>
    <h3 class="ja">今すぐリアルタイム指標で確認する</h3>
    <h3 class="es">Consulta Este Indicador en Vivo Ahora</h3>
    <h3 class="de">Diesen Indikator jetzt live prüfen</h3>
    <p class="ko">BTCtiming.com에서 이 글의 지표를 포함한 13개 온체인 지표를 실시간으로 확인하고, 종합 매수·매도 점수를 무료로 받아보세요.</p>
    <p class="en">See this indicator alongside 12 other on-chain indicators in real time, combined into a single 0–10 buy/sell score — free.</p>
    <p class="ja">BTCtiming.comでこの指標を含む13個のオンチェーン指標をリアルタイムで確認し、総合買い・売りスコアを無料で受け取りましょう。</p>
    <p class="es">Consulta este indicador junto a otros 12 indicadores on-chain en tiempo real, combinados en una sola puntuación de compra/venta de 0-10 — gratis.</p>
    <p class="de">Sieh dir diesen Indikator zusammen mit 12 weiteren On-Chain-Indikatoren in Echtzeit an, kombiniert zu einem einzigen Kauf-/Verkaufs-Score von 0-10 — kostenlos.</p>
    <?php
    // 2026-07 수정: <html lang="...">이 $lang(이 글에서 실제 렌더링된 언어, 번역 없으면 en 폴백) 기준이라
    // 어떤 텍스트 변형이 보일지도 $lang을 따름. 하지만 href는 $requestedLang(사용자가 진짜 요청한 언어)을
    // 써야 함 — 독일어 요청인데 이 글만 번역이 없어 영어 텍스트가 보이는 상황이어도, 클릭하면 메인
    // 사이트로는 독일어로 정확히 돌아가야 함(메인은 5개 언어 다 지원하므로 이 글의 번역 여부와 무관).
    $mainHref = '/' . langSuffix($requestedLang);
    ?>
    <a href="<?= h($mainHref) ?>" class="ko" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">실시간 분석 보러가기 →</a>
    <a href="<?= h($mainHref) ?>" class="en" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Go to Live Analysis →</a>
    <a href="<?= h($mainHref) ?>" class="ja" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">リアルタイム分析を見る →</a>
    <a href="<?= h($mainHref) ?>" class="es" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Ver Análisis en Vivo →</a>
    <a href="<?= h($mainHref) ?>" class="de" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Live-Analyse ansehen →</a>
  </div>
</div>
<?php $legalSuffix = langSuffix($requestedLang); ?>
<footer>© 2026 BTCtiming.com · <a href="/privacy<?= h($legalSuffix) ?>" style="color:#52525b" class="ko">개인정보처리방침</a><a href="/privacy<?= h($legalSuffix) ?>" style="color:#52525b" class="en">Privacy Policy</a><a href="/privacy<?= h($legalSuffix) ?>" style="color:#52525b" class="ja">プライバシーポリシー</a><a href="/privacy<?= h($legalSuffix) ?>" style="color:#52525b" class="es">Política de Privacidad</a><a href="/privacy<?= h($legalSuffix) ?>" style="color:#52525b" class="de">Datenschutzerklärung</a> · <a href="/terms<?= h($legalSuffix) ?>" style="color:#52525b" class="ko">이용약관</a><a href="/terms<?= h($legalSuffix) ?>" style="color:#52525b" class="en">Terms of Service</a><a href="/terms<?= h($legalSuffix) ?>" style="color:#52525b" class="ja">利用規約</a><a href="/terms<?= h($legalSuffix) ?>" style="color:#52525b" class="es">Términos de Servicio</a><a href="/terms<?= h($legalSuffix) ?>" style="color:#52525b" class="de">Nutzungsbedingungen</a> · <span class="ko">투자 조언이 아닙니다</span><span class="en">Not financial advice</span><span class="ja">投資助言ではありません</span><span class="es">No es asesoramiento financiero</span><span class="de">Keine Finanzberatung</span>.</footer>
<script>
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
  const bcSuffix = l === 'ko' ? '' : ('?lang=' + l);
  const bcHome = document.getElementById('bcHomeLink');
  if(bcHome) bcHome.setAttribute('href', '/' + bcSuffix);
  const bcBlog = document.getElementById('bcBlogLink');
  if(bcBlog) bcBlog.setAttribute('href', '/blog/' + bcSuffix);
  const bcCat = document.getElementById('bcCatLink');
  if(bcCat){
    const cat = bcCat.dataset.cat || '';
    bcCat.setAttribute('href', '/blog/?cat=' + cat + (l === 'ko' ? '' : ('&lang=' + l)));
  }
  // 로고·하단 정책(개인정보/약관)·CTA 링크도 현재 언어를 유지하도록 href 갱신
  // (예전엔 서버 렌더 시점 언어에 고정돼, 언어를 바꿔도 예전 언어 페이지로 이동했음)
  const _logo = document.querySelector('a.logo');
  if(_logo) _logo.setAttribute('href', '/' + bcSuffix);
  document.querySelectorAll('footer a[href^="/privacy"]').forEach(a => a.setAttribute('href', '/privacy' + bcSuffix));
  document.querySelectorAll('footer a[href^="/terms"]').forEach(a => a.setAttribute('href', '/terms' + bcSuffix));
  document.querySelectorAll('.cta a').forEach(a => a.setAttribute('href', '/' + bcSuffix));
  try{localStorage.setItem('blogLang',l);}catch(e){}
  try{
    const url = new URL(location.href);
    if(l==='ko') url.searchParams.delete('lang'); else url.searchParams.set('lang',l);
    history.replaceState(null,'',url);
  }catch(e){}
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
  // 2026-07 수정: 'en'/'ja'만 인식해서, 스페인어/독일어 모드에서 글 간 링크(lang 파라미터 없는 것들)를
  // 타고 넘어가면 조용히 한국어로 떨어지던 버그가 있었음.
  // 2026-07 추가 수정: es/de 번역 글이 실제로 생기기 시작해서, 여기서 미리 en으로 바꿔버리지 않고
  // 그대로 반환 — 실제 폴백 여부는 각 글의 _header.php가 title_es/title_de 존재 여부로 판단함.
  try{
    const p=new URLSearchParams(location.search).get('lang');
    if(p==='en'||p==='ja'||p==='es'||p==='de')return p;
  }catch(e){}
  try{
    const s=localStorage.getItem('blogLang')||localStorage.getItem('lang');
    if(s==='en'||s==='ja'||s==='es'||s==='de')return s;
  }catch(e){}
  return'ko';
}
// 저장된 언어 설정 복원 — 본문 내 글 간 링크들이 ?lang= 없이 연결되는 경우가 많아서,
// localStorage에 저장된 선호 언어를 URL보다 후순위로 적용해 이어감.
// (단, 이 글이 해당 언어로 번역 안 됐으면 <html lang>이 서버에서 이미 en으로 폴백돼 있으므로 그대로 둠)
function applySavedLang() {
  try {
    const saved = getBlogLang();
    const current = document.getElementById('hr').lang;
    if(saved === current) return;
    if(saved === 'en' || saved === 'ja' || saved === 'es' || saved === 'de') {
      // 이 글에 해당 언어 메뉴 항목이 존재할 때만 전환 (미번역 글은 해당 언어 메뉴 자체가 없을 수 있음)
      const hasMenuItem = document.querySelector('.lang-menu-item[data-lang="' + saved + '"]');
      if(hasMenuItem) L(saved);
    }
  } catch(e){}
}
applySavedLang(); // 최초 로드
// 뒤로가기/앞으로가기로 bfcache에서 복원될 때는 이 스크립트가 재실행되지 않으므로,
// pageshow(persisted)에서 저장된 언어를 다시 적용해야 언어 설정이 유지됨.
window.addEventListener('pageshow', function(e){ if(e.persisted) applySavedLang(); });
</script>
</body>
</html>
