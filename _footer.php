
<?php
// ── 다른 글 목록: 내부 트래픽 유도용. 같은 카테고리 / 다른 카테고리를 시각적으로 분리해서 노출 ──
$otherPool = array_filter($ARTICLES, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);
$sameCategory = array_filter($otherPool, fn($a) => ($a['category'] ?? '') === $catKey);
$otherCategory = array_filter($otherPool, fn($a) => ($a['category'] ?? '') !== $catKey);

// 관련도 계산: 현재 글의 제목·태그에서 키워드를 뽑아, 다른 글과 겹치는 정도로 점수화.
// (같은 주제를 다룬 글이 위로 오도록 — 단순 최신순보다 실질적 관련 글 추천)
$stop = [' ','—','·','-','the','a','an','of','to','for','and','비트코인','bitcoin','btc','가이드','guide','완벽','지표','indicator'];
$kw = function(array $a): array {
    $t = mb_strtolower(($a['title_ko'] ?? '').' '.($a['title_en'] ?? '').' '.($a['tag_ko'] ?? '').' '.($a['tag_en'] ?? ''));
    $t = preg_replace('/[^\p{L}\p{N} ]+/u', ' ', $t);
    $parts = preg_split('/\s+/u', $t, -1, PREG_SPLIT_NO_EMPTY);
    return array_values(array_filter($parts, fn($w) => mb_strlen($w) >= 2));
};
$curKw = array_flip($kw($M ?? []));
$relScore = function(array $a) use ($kw, $curKw): int {
    $s = 0;
    foreach ($kw($a) as $w) if (isset($curKw[$w])) $s++;
    return $s;
};
// 관련도 내림차순, 동점이면 최신순
uasort($sameCategory, function($a, $b) use ($relScore) {
    $d = $relScore($b) - $relScore($a);
    return $d !== 0 ? $d : strcmp($b['date'] ?? '', $a['date'] ?? '');
});
uasort($otherCategory, function($a, $b) use ($relScore) {
    $d = $relScore($b) - $relScore($a);
    return $d !== 0 ? $d : strcmp($b['date'] ?? '', $a['date'] ?? '');
});
$sameTop  = array_slice($sameCategory, 0, 4, true);   // 같은 카테고리 · 관련도순
$otherTop = array_slice($otherCategory, 0, 4, true);  // 다른 글 · 관련도순
$blogSuffix = ($lang === 'ko') ? '' : "?lang={$lang}";

// ── 이전 글 / 다음 글: 전체 글을 날짜순(오름차순)으로 세워 현재 글의 앞뒤를 찾음 ──
$ordered = $ARTICLES;
uasort($ordered, fn($a, $b) => strcmp($a['date'] ?? '', $b['date'] ?? ''));
$orderedSlugs = array_keys($ordered);
$curPos = array_search($slug, $orderedSlugs, true);
$prevSlug = ($curPos !== false && $curPos > 0) ? $orderedSlugs[$curPos - 1] : null;               // 더 과거 글
$nextSlug = ($curPos !== false && $curPos < count($orderedSlugs) - 1) ? $orderedSlugs[$curPos + 1] : null; // 더 최신 글

// 추천 카드 하나를 그리는 헬퍼
$renderOtherCard = function(string $rSlug, array $rA) use ($blogSuffix) {
    $rCat = $rA['category'] ?? 'guide';
    $rColor = $rA['color'] ?? '#f7931a';
    $rIcon = $rA['icon'] ?? '📄';
    $rLangKeys = array_keys(SUPPORTED_LANGS);
    ?>
    <a href="/blog/<?= htmlspecialchars($rSlug) ?>.php<?= htmlspecialchars($blogSuffix) ?>" class="other-card" style="--oc-accent:<?= htmlspecialchars($rColor) ?>">
      <div class="oc-icon"><?= $rIcon ?></div>
      <div class="oc-body">
        <div class="oc-cat"><?php foreach ($rLangKeys as $rL) {
          $v = CATEGORY_META[$rCat][$rL] ?? (CATEGORY_META[$rCat]['en'] ?? $rCat);
          echo '<span class="' . $rL . '">' . htmlspecialchars($v) . '</span>';
        } ?></div>
        <div class="oc-title"><?php foreach ($rLangKeys as $rL) {
          $v = $rA["title_{$rL}"] ?? ($rA['title_en'] ?? '');
          echo '<span class="' . $rL . '">' . htmlspecialchars($v) . '</span>';
        } ?></div>
        <div class="oc-desc"><?php foreach ($rLangKeys as $rL) {
          $v = $rA["desc_{$rL}"] ?? ($rA['desc_en'] ?? '');
          echo '<span class="' . $rL . '">' . htmlspecialchars($v) . '</span>';
        } ?></div>
      </div>
    </a>
    <?php
};
?>

<?php // ── 본문 하단 SNS 공유 ── ?>
<?php renderShareBar('bottom'); ?>


<?php // ── 광고 배너: 거래소 비교(바이낸스·바이비트) 페이지로 ── ?>
<a class="blog-ad" href="/exchanges.php<?= h($blogSuffix) ?>">
  <span class="blog-ad-ic">🎁</span>
  <span class="blog-ad-tx">
    <b class="ko">비트코인 선물, 어디서 거래할까?</b><b class="en">Where to trade Bitcoin futures?</b><b class="ja">ビットコイン先物、どこで取引?</b><b class="es">¿Dónde operar futuros de Bitcoin?</b><b class="de">Wo Bitcoin-Futures handeln?</b><b class="fr">Où trader les futures Bitcoin ?</b><b class="pt">Onde negociar futuros de Bitcoin?</b><b class="tr">Bitcoin vadeli işlemleri nerede?</b><b class="vi">Giao dịch futures Bitcoin ở đâu?</b>
    <span class="ko">바이낸스·바이비트 비교 + 수수료 할인 혜택</span><span class="en">Compare Binance &amp; Bybit + fee discounts</span><span class="ja">Binance・Bybit比較 + 手数料割引</span><span class="es">Compara Binance y Bybit + descuentos</span><span class="de">Binance &amp; Bybit vergleichen + Rabatte</span><span class="fr">Comparez Binance et Bybit + réductions de frais</span><span class="pt">Compare Binance e Bybit + descontos de taxa</span><span class="tr">Binance ve Bybit karşılaştır + komisyon indirimi</span><span class="vi">So sánh Binance &amp; Bybit + giảm phí</span>
  </span>
  <span class="blog-ad-ar">›</span>
</a>

<?php // ── 이전 글 / 다음 글 바로가기 ── ?>
<?php if ($prevSlug || $nextSlug): ?>
<div class="prevnext">
  <?php if ($prevSlug): $pA = $ARTICLES[$prevSlug]; $pnKeys = array_keys(SUPPORTED_LANGS);
    $pnPrev = ['ko'=>'← 이전 글','en'=>'← Previous','ja'=>'← 前の記事','es'=>'← Anterior','de'=>'← Zurück','fr'=>'← Précédent','pt'=>'← Anterior','tr'=>'← Önceki','vi'=>'← Trước']; ?>
    <a class="pn-link pn-prev" href="/blog/<?= h($prevSlug) ?>.php<?= h($blogSuffix) ?>">
      <span class="pn-dir"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pnPrev[$pl] ?? $pnPrev['en']).'</span>'; ?></span>
      <span class="pn-title"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pA["title_{$pl}"] ?? ($pA['title_en'] ?? '')).'</span>'; ?></span>
    </a>
  <?php else: ?><span class="pn-link pn-empty"></span><?php endif; ?>
  <?php if ($nextSlug): $nA = $ARTICLES[$nextSlug]; $pnKeys = array_keys(SUPPORTED_LANGS);
    $pnNext = ['ko'=>'다음 글 →','en'=>'Next →','ja'=>'次の記事 →','es'=>'Siguiente →','de'=>'Weiter →','fr'=>'Suivant →','pt'=>'Próximo →','tr'=>'Sonraki →','vi'=>'Tiếp →']; ?>
    <a class="pn-link pn-next" href="/blog/<?= h($nextSlug) ?>.php<?= h($blogSuffix) ?>">
      <span class="pn-dir"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pnNext[$pl] ?? $pnNext['en']).'</span>'; ?></span>
      <span class="pn-title"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($nA["title_{$pl}"] ?? ($nA['title_en'] ?? '')).'</span>'; ?></span>
    </a>
  <?php else: ?><span class="pn-link pn-empty"></span><?php endif; ?>
</div>
<?php endif; ?>

<?php // ── 추천: 같은 카테고리 ── ?>
<?php if (!empty($sameTop)): ?>
<div class="other-articles">
  <h3 class="ko">관련 주제의 글</h3>
  <h3 class="en">Related Topics</h3>
  <h3 class="ja">関連トピックの記事</h3>
  <h3 class="es">Temas Relacionados</h3>
  <h3 class="de">Verwandte Themen</h3>
  <h3 class="fr">Sujets connexes</h3>
  <h3 class="pt">Tópicos relacionados</h3>
  <h3 class="tr">İlgili konular</h3>
  <h3 class="vi">Chủ đề liên quan</h3>
  <div class="other-grid">
    <?php foreach ($sameTop as $rSlug => $rA) $renderOtherCard($rSlug, $rA); ?>
  </div>
</div>
<?php endif; ?>

<?php // ── 추천: 다른 카테고리 ── ?>
<?php if (!empty($otherTop)): ?>
<div class="other-articles">
  <h3 class="ko">이런 글도 읽어보세요</h3>
  <h3 class="en">You Might Also Like</h3>
  <h3 class="ja">こちらの記事もどうぞ</h3>
  <h3 class="es">También Te Puede Interesar</h3>
  <h3 class="de">Das könnte dich auch interessieren</h3>
  <h3 class="fr">Vous aimerez aussi</h3>
  <h3 class="pt">Você também pode gostar</h3>
  <h3 class="tr">Bunları da beğenebilirsiniz</h3>
  <h3 class="vi">Bạn cũng có thể thích</h3>
  <div class="other-grid">
    <?php foreach ($otherTop as $rSlug => $rA) $renderOtherCard($rSlug, $rA); ?>
  </div>
</div>
<?php endif; ?>


  <div class="cta">
    <h3 class="ko">지금 실시간 지표로 직접 확인하기</h3>
    <h3 class="en">Check This Indicator Live Now</h3>
    <h3 class="ja">今すぐリアルタイム指標で確認する</h3>
    <h3 class="es">Consulta Este Indicador en Vivo Ahora</h3>
    <h3 class="de">Diesen Indikator jetzt live prüfen</h3>
    <h3 class="fr">Vérifiez cet indicateur en direct</h3>
    <h3 class="pt">Confira este indicador ao vivo agora</h3>
    <h3 class="tr">Bu göstergeyi şimdi canlı kontrol et</h3>
    <h3 class="vi">Kiểm tra chỉ báo này trực tiếp ngay</h3>
    <p class="ko">BTCtiming.com에서 이 글의 지표를 포함한 13개 온체인 지표를 실시간으로 확인하고, 종합 매수·매도 점수를 무료로 받아보세요.</p>
    <p class="en">See this indicator alongside 12 other on-chain indicators in real time, combined into a single 0–10 buy/sell score — free.</p>
    <p class="ja">BTCtiming.comでこの指標を含む13個のオンチェーン指標をリアルタイムで確認し、総合買い・売りスコアを無料で受け取りましょう。</p>
    <p class="es">Consulta este indicador junto a otros 12 indicadores on-chain en tiempo real, combinados en una sola puntuación de compra/venta de 0-10 — gratis.</p>
    <p class="de">Sieh dir diesen Indikator zusammen mit 12 weiteren On-Chain-Indikatoren in Echtzeit an, kombiniert zu einem einzigen Kauf-/Verkaufs-Score von 0-10 — kostenlos.</p>
    <p class="fr">Consultez cet indicateur avec 12 autres indicateurs on-chain en temps réel, combinés en un seul score d'achat/vente de 0 à 10 — gratuit.</p>
    <p class="pt">Veja este indicador junto a outros 12 indicadores on-chain em tempo real, combinados em uma única pontuação de compra/venda de 0-10 — grátis.</p>
    <p class="tr">Bu göstergeyi 12 diğer zincir üstü göstergeyle gerçek zamanlı görün, tek bir 0-10 alım/satım puanında birleştirilmiş — ücretsiz.</p>
    <p class="vi">Xem chỉ báo này cùng 12 chỉ báo on-chain khác theo thời gian thực, kết hợp thành một điểm mua/bán 0-10 duy nhất — miễn phí.</p>
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
    <a href="<?= h($mainHref) ?>" class="fr" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Voir l'analyse en direct →</a>
    <a href="<?= h($mainHref) ?>" class="pt" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Ver análise ao vivo →</a>
    <a href="<?= h($mainHref) ?>" class="tr" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Canlı analizi gör →</a>
    <a href="<?= h($mainHref) ?>" class="vi" onclick="try{localStorage.setItem('blogLang',getBlogLang());}catch(e){}">Xem phân tích trực tiếp →</a>
  </div>
</div><?php // /.wrap-main ?>
  <aside class="wrap-ad" aria-hidden="true"><!-- ad slot: 승인 후 채움 --></aside>
</div>
<?php $legalSuffix = langSuffix($requestedLang); require __DIR__ . '/../_shared_footer.php'; ?>
<script>
// 사용자가 언어 메뉴에서 직접 고른 경우: "명시적 선택" 플래그를 켜고 전환.
// 이 플래그가 켜져 있으면 이후 뒤로가기 등으로 ?lang=이 다른 페이지에 도달해도
// 사용자가 마지막에 고른 언어를 우선 적용한다(applySavedLang 참고).
function Lpick(l){
  try{ localStorage.setItem('blogLangPicked','1'); }catch(e){}
  L(l);
}
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
  // 우선순위: localStorage(사용자가 마지막으로 명시적으로 고른 언어) > URL ?lang= > ko.
  // 지원 언어 목록은 config.php의 SUPPORTED_LANGS에서 PHP가 주입 → 언어 추가 시 이 JS 불변.
  var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
  try{
    const s=localStorage.getItem('blogLang')||localStorage.getItem('lang');
    if(s && SUP.indexOf(s)!==-1) return s;
  }catch(e){}
  try{
    const p=new URLSearchParams(location.search).get('lang');
    if(p && SUP.indexOf(p)!==-1) return p;
  }catch(e){}
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
    var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
    var picked = false;
    try{ picked = localStorage.getItem('blogLangPicked') === '1'; }catch(e){}
    const urlLang = new URLSearchParams(location.search).get('lang');
    if(!picked && SUP.indexOf(urlLang)!==-1) return;
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
applySavedLang(); // 최초 로드
// 뒤로가기/앞으로가기로 bfcache에서 복원될 때는 이 스크립트가 재실행되지 않으므로,
// pageshow(persisted)에서 저장된 언어를 다시 적용해야 언어 설정이 유지됨.
window.addEventListener('pageshow', function(e){ applySavedLang(); });

// ── SNS 공유 버튼 ──
(function initShare(){
  try {
    const pageUrl = location.href;
    const title = document.title || 'BTCtiming.com';
    const u = encodeURIComponent(pageUrl);
    const t = encodeURIComponent(title);
    const shareUrls = {
      x:    `https://twitter.com/intent/tweet?url=${u}&text=${t}`,
      fb:   `https://www.facebook.com/sharer/sharer.php?u=${u}`,
      in:   `https://www.linkedin.com/sharing/share-offsite/?url=${u}`,
      tg:   `https://t.me/share/url?url=${u}&text=${t}`,
      line: `https://social-plugins.line.me/lineit/share?url=${u}`,
      wa:   `https://api.whatsapp.com/send?text=${t}%20${u}`
    };

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

</script>
<?php $tbSuffix = langSuffix($requestedLang ?? $lang ?? 'ko');
$tb = [
  'ko'=>['live'=>'실시간 지표','coin'=>'코인 검색','blog'=>'블로그'],
  'en'=>['live'=>'Live','coin'=>'Find Coins','blog'=>'Blog'],
  'ja'=>['live'=>'リアルタイム','coin'=>'コイン検索','blog'=>'ブログ'],
  'es'=>['live'=>'En vivo','coin'=>'Buscar','blog'=>'Blog'],
  'de'=>['live'=>'Live','coin'=>'Coins','blog'=>'Blog'],
];
$tbt = $tb[$lang] ?? $tb['en'];
// 블로그 하단바 코인 탭 → 즐겨찾기 코인 전환 시트용 데이터.
// _header.php가 ../config.php를 이미 로드했으므로 COIN_SYMBOLS 사용 가능.
$__blogCoins = [];
if (defined('COIN_SYMBOLS')) {
    if (!function_exists('coinMeta')) { @include_once __DIR__ . '/../coin_meta.php'; }
    foreach (COIN_SYMBOLS as $__id => $__sym) {
        if (function_exists('coinMeta')) { $__m = coinMeta($__id); }
        else { $__m = ['name' => $__id, 'color' => '#888888']; }
        $__blogCoins[] = ['id' => $__id, 'name' => $__m['name'], 'color' => $__m['color']];
    }
}
$__blogCoinsJson = json_encode($__blogCoins, JSON_UNESCAPED_UNICODE);
$__coinSheetTitle = ['ko'=>'코인 전환','en'=>'Switch coin','ja'=>'コイン切替','es'=>'Cambiar','de'=>'Coin wechseln','fr'=>'Changer de crypto','pt'=>'Trocar moeda','tr'=>'Coin değiştir','vi'=>'Đổi coin'][$lang] ?? 'Switch coin';
$__coinSheetSub = ['ko'=>'즐겨찾기한 코인','en'=>'Your favorites','ja'=>'お気に入り','es'=>'Favoritos','de'=>'Favoriten','fr'=>'Vos favoris','pt'=>'Seus favoritos','tr'=>'Favorileriniz','vi'=>'Yêu thích của bạn'][$lang] ?? 'Your favorites';
?>
<style>
.blog-tabbar{display:none}
@media(max-width:600px){
  .blog-tabbar{display:flex;position:fixed;left:0;right:0;top:auto;bottom:0;z-index:900;
    height:48px;background:rgba(15,15,17,.96);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);
    border-top:1px solid rgba(255,255,255,.07);padding-bottom:env(safe-area-inset-bottom);
    transition:transform .25s ease}
  .blog-tabbar.tabbar-hidden{transform:translateY(110%)}
  .blog-tabbar .btab{position:relative;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;
    background:transparent;border:none;color:#6b6b72;font-size:9.5px;font-weight:600;text-decoration:none;
    -webkit-tap-highlight-color:transparent}
  .blog-tabbar .btab.active{color:#fb923c}
  .blog-tabbar .btab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:#fb923c}
  .blog-tabbar .btab svg{width:20px;height:20px;display:block}
  body{padding-bottom:48px}
}
</style>
<nav class="blog-tabbar">
  <a class="btab" href="/<?= h($tbSuffix) ?>">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l3-4 3 2 4-6"/></svg>
    <span><?= h($tbt['live']) ?></span>
  </a>
  <button type="button" class="btab" onclick="openBlogCoinSwitcher()">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9.5 10h4a1.5 1.5 0 0 1 0 3h-3.5a1.5 1.5 0 0 0 0 3h4"/></svg>
    <span><?= h($tbt['coin']) ?></span>
  </button>
  <a class="btab active" href="/blog/<?= h($blogSuffix) ?>">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3h10l4 4v14H5z"/><path d="M14 3v5h5M8 13h8M8 17h6"/></svg>
    <span><?= h($tbt['blog']) ?></span>
  </a>
</nav>
<!-- 블로그 코인 전환 시트 (즐겨찾기 코인 선택 → 대시보드로 이동) -->
<div id="blogCoinSheet" class="blog-coin-sheet" onclick="if(event.target===this)closeBlogCoinSwitcher()">
  <div class="bcs-box">
    <div class="bcs-grip"></div>
    <div class="bcs-head">
      <div>
        <div class="bcs-title"><?= h($__coinSheetTitle) ?></div>
        <div class="bcs-sub"><?= h($__coinSheetSub) ?></div>
      </div>
      <button class="bcs-close" onclick="closeBlogCoinSwitcher()" aria-label="close">✕</button>
    </div>
    <div id="bcsList" class="bcs-list"></div>
  </div>
</div>
<style>
.blog-coin-sheet{display:none;position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,.66);align-items:flex-end;justify-content:center;padding-bottom:48px}
.blog-coin-sheet.open{display:flex}
.bcs-box{width:100%;max-width:460px;max-height:70vh;display:flex;flex-direction:column;background:#131316;border-radius:18px 18px 0 0;overflow:hidden;animation:bcsUp .22s ease-out}
@keyframes bcsUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
.bcs-grip{width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
.bcs-head{display:flex;align-items:center;justify-content:space-between;padding:8px 16px 10px}
.bcs-title{font-size:15px;font-weight:700;color:#f0f0f0}
.bcs-sub{font-size:11px;color:#888;margin-top:2px}
.bcs-close{background:none;border:none;color:#888;font-size:16px;cursor:pointer;padding:4px 8px}
.bcs-list{flex:1;overflow-y:auto;padding:4px 8px 16px}
.bcs-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer}
.bcs-item:active{background:#1f1f24}
.bcs-item.current{background:rgba(251,146,60,.1)}
.bcs-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.bcs-id{font-size:13px;font-weight:700;color:#f0f0f0}
.bcs-name{font-size:12px;color:#888}
.bcs-empty{padding:30px;text-align:center;color:#666;font-size:13px;line-height:1.6}
</style>
<script>
window.__BLOG_COINS = <?= $__blogCoinsJson ?>;
window.__BLOG_DEFAULT_FAVS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX'];
function bcsGetFavs(){
  try{ const r=localStorage.getItem('favoriteCoins'); if(r===null) return [...window.__BLOG_DEFAULT_FAVS]; const a=JSON.parse(r); return Array.isArray(a)&&a.length?a:[...window.__BLOG_DEFAULT_FAVS]; }catch(e){ return [...window.__BLOG_DEFAULT_FAVS]; }
}
function bcsGetDelisted(){ try{ const r=localStorage.getItem('delistedCoins'); return r?(JSON.parse(r)||[]):[]; }catch(e){ return []; } }
function openBlogCoinSwitcher(){
  const sheet=document.getElementById('blogCoinSheet');
  const list=document.getElementById('bcsList');
  const favs=bcsGetFavs(), dead=bcsGetDelisted();
  const byId={}; (window.__BLOG_COINS||[]).forEach(c=>byId[c.id]=c);
  const coins=favs.map(id=>byId[id]).filter(c=>c&&!dead.includes(c.id));
  if(!coins.length){
    list.innerHTML='<div class="bcs-empty"><?= $lang==='ko'?'즐겨찾기한 코인이 없습니다.':'No favorite coins yet.' ?></div>';
  } else {
    list.innerHTML=coins.map(c=>`<div class="bcs-item" onclick="bcsPick('${c.id}')">
      <span class="bcs-dot" style="background:${c.color}"></span>
      <span class="bcs-id">${c.id}</span><span class="bcs-name">${c.name}</span></div>`).join('');
  }
  sheet.classList.add('open');
}
function closeBlogCoinSwitcher(){ document.getElementById('blogCoinSheet').classList.remove('open'); }
function bcsPick(id){
  try{ localStorage.setItem('selectedCoin', id); }catch(e){}
  // 대시보드로 이동 (현재 언어 유지)
  var lang='<?= h($lang) ?>';
  location.href = '/' + (lang==='ko'?'':'?lang='+lang);
}
</script>
<script>
(function(){
  var bar=document.querySelector('.blog-tabbar');
  if(!bar) return;
  var lastY=window.scrollY||0, idle=null;
  window.addEventListener('scroll',function(){
    var y=window.scrollY||0, dy=y-lastY;
    if(y<60) bar.classList.remove('tabbar-hidden');
    else if(dy>6) bar.classList.add('tabbar-hidden');
    else if(dy<-6) bar.classList.remove('tabbar-hidden');
    lastY=y;
    clearTimeout(idle);
    idle=setTimeout(function(){bar.classList.remove('tabbar-hidden');},900);
  },{passive:true});
})();
</script>
</body>
</html>
