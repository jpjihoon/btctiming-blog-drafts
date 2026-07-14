
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
$ordered = array_filter($ARTICLES, fn($a) => ($a['category'] ?? '') === $catKey);  // 이전/다음은 같은 카테고리 내에서만
uasort($ordered, fn($a, $b) => strcmp($a['date'] ?? '', $b['date'] ?? ''));
$orderedSlugs = array_keys($ordered);
$curPos = array_search($slug, $orderedSlugs, true);
$prevSlug = ($curPos !== false && $curPos < count($orderedSlugs) - 1) ? $orderedSlugs[$curPos + 1] : null; // 이전 글 = 더 최신 글
$nextSlug = ($curPos !== false && $curPos > 0) ? $orderedSlugs[$curPos - 1] : null;               // 다음 글 = 더 과거 글

// ── 인기글(조회수) — Firebase blogViewsHourly, 180초 캐시. 목록 캐시와 별도 키(더 많은 순위 저장) ──
if (!function_exists('ftGetPopularRanked')) {
    function ftGetPopularRanked(int $need = 40): array {
        $cacheFile = sys_get_temp_dir() . '/btc_blog_popular_full.json';
        if (is_readable($cacheFile) && (time() - @filemtime($cacheFile) < 180)) {
            $c = json_decode(@file_get_contents($cacheFile), true);
            if (is_array($c)) return $c;
        }
        $result = [];
        if (function_exists('curl_init')) {
            $ch = curl_init('https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app/blogViewsHourly.json');
            curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_TIMEOUT_MS=>700, CURLOPT_CONNECTTIMEOUT_MS=>400, CURLOPT_SSL_VERIFYPEER=>false]);
            $raw = curl_exec($ch); curl_close($ch);
            $data = $raw ? json_decode($raw, true) : null;
            if (is_array($data)) {
                $sumWin = function(int $hours) use ($data): array {
                    $ok = []; for ($x=0; $x<$hours; $x++) $ok[gmdate('YmdH', time()-$x*3600)] = 1;
                    $out = [];
                    foreach ($data as $slug=>$buckets) {
                        if (!is_array($buckets)) continue;
                        $ssum = 0; foreach ($buckets as $b=>$c) if (isset($ok[$b])) $ssum += (int)$c;
                        if ($ssum > 0) $out[$slug] = $ssum;
                    }
                    arsort($out); return array_keys($out);
                };
                $ranked = $sumWin(24);
                if (count($ranked) < $need) $ranked = $sumWin(48);
                $result = array_slice($ranked, 0, $need);
            }
        }
        @file_put_contents($cacheFile, json_encode($result));
        return $result;
    }
}
$__popRanked = ftGetPopularRanked(40);
$popAll = []; $popCat = [];
foreach ($__popRanked as $ps) {
    if (!isset($ARTICLES[$ps]) || $ps === $slug) continue;
    if (count($popAll) < 5) $popAll[$ps] = $ARTICLES[$ps];
    if (count($popCat) < 5 && ($ARTICLES[$ps]['category'] ?? '') === $catKey) $popCat[$ps] = $ARTICLES[$ps];
}
// 부족하면 최신글로 보충
if (count($popAll) < 5) foreach ($ARTICLES as $ps=>$pa) { if ($ps!==$slug && !isset($popAll[$ps])) { $popAll[$ps]=$pa; if (count($popAll)>=5) break; } }
if (count($popCat) < 3) foreach ($sameCategory as $ps=>$pa) { if (!isset($popCat[$ps])) { $popCat[$ps]=$pa; if (count($popCat)>=5) break; } }
// "카테고리에서 더 보기" = 같은 카테고리 최신 4
$moreInCat = $sameCategory;
uasort($moreInCat, fn($a,$b)=>strcmp($b['date']??'', $a['date']??''));
$moreInCat = array_slice($moreInCat, 0, 4, true);

// 추천 카드 하나를 그리는 헬퍼
$renderOtherCard = function(string $rSlug, array $rA) use ($blogSuffix) {
    $rCat = $rA['category'] ?? 'guide';
    $rColor = $rA['color'] ?? '#f7931a';
    $rIcon = $rA['icon'] ?? '📄';
    $rLangKeys = array_keys(SUPPORTED_LANGS);
    ?>
    <a data-base="/blog/<?= htmlspecialchars($rSlug) ?>.php" href="/blog/<?= htmlspecialchars($rSlug) ?>.php<?= htmlspecialchars($blogSuffix) ?>" class="other-card" style="--oc-accent:<?= htmlspecialchars($rColor) ?>">
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
  <span class="blog-ad-bar" aria-hidden="true"></span>
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
    <a class="pn-link pn-prev" data-base="/blog/<?= h($prevSlug) ?>.php" href="/blog/<?= h($prevSlug) ?>.php<?= h($blogSuffix) ?>">
      <span class="pn-dir"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pnPrev[$pl] ?? $pnPrev['en']).'</span>'; ?></span>
      <span class="pn-title"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pA["title_{$pl}"] ?? ($pA['title_en'] ?? '')).'</span>'; ?></span>
    </a>
  <?php else: ?><span class="pn-link pn-empty"></span><?php endif; ?>
  <?php if ($nextSlug): $nA = $ARTICLES[$nextSlug]; $pnKeys = array_keys(SUPPORTED_LANGS);
    $pnNext = ['ko'=>'다음 글 →','en'=>'Next →','ja'=>'次の記事 →','es'=>'Siguiente →','de'=>'Weiter →','fr'=>'Suivant →','pt'=>'Próximo →','tr'=>'Sonraki →','vi'=>'Tiếp →']; ?>
    <a class="pn-link pn-next" data-base="/blog/<?= h($nextSlug) ?>.php" href="/blog/<?= h($nextSlug) ?>.php<?= h($blogSuffix) ?>">
      <span class="pn-dir"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($pnNext[$pl] ?? $pnNext['en']).'</span>'; ?></span>
      <span class="pn-title"><?php foreach ($pnKeys as $pl) echo '<span class="'.$pl.'">'.h($nA["title_{$pl}"] ?? ($nA['title_en'] ?? '')).'</span>'; ?></span>
    </a>
  <?php else: ?><span class="pn-link pn-empty"></span><?php endif; ?>
</div>
<?php endif; ?>

<?php // ── 카테고리에서 더 보기 (같은 카테고리 · 최신) ── ?>
<?php if (!empty($moreInCat)):
  $__catNm  = CATEGORY_META[$catKey] ?? CATEGORY_META['guide'];
  $__moreH  = ['ko'=>'%s에서 더 보기','en'=>'More in %s','ja'=>'%sをもっと見る','es'=>'Más en %s','de'=>'Mehr aus %s','fr'=>'Plus dans %s','pt'=>'Mais em %s','tr'=>'%s: daha fazla','vi'=>'Xem thêm trong %s'];
  $__moreN  = ['ko'=>'같은 카테고리 · 최신','en'=>'Same category · Latest','ja'=>'同カテゴリ · 最新','es'=>'Misma categoría · Reciente','de'=>'Gleiche Kategorie · Neueste','fr'=>'Même catégorie · Récent','pt'=>'Mesma categoria · Recente','tr'=>'Aynı kategori · En yeni','vi'=>'Cùng chuyên mục · Mới nhất']; ?>
<div class="other-articles mod-block">
  <div class="mod-head">
    <?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<h3 class="'.$__l.'">'.h(sprintf($__moreH[$__l] ?? $__moreH['en'], $__catNm[$__l] ?? $__catNm['en'])).'</h3>'; ?>
    <span class="mod-note"><?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($__moreN[$__l] ?? $__moreN['en']).'</span>'; ?></span>
  </div>
  <div class="other-grid">
    <?php foreach ($moreInCat as $rSlug => $rA) $renderOtherCard($rSlug, $rA); ?>
  </div>
</div>
<?php endif; ?>

<?php // ── 많이 본 글 (조회수 · 전체/카테고리 탭) ── ?>
<?php if (!empty($popAll)):
  $__popH = ['ko'=>'많이 본 글','en'=>'Most Read','ja'=>'よく読まれている記事','es'=>'Más Leídos','de'=>'Meistgelesen','fr'=>'Les plus lus','pt'=>'Mais Lidos','tr'=>'En Çok Okunanlar','vi'=>'Đọc nhiều nhất'];
  $__popN = ['ko'=>'최근 24시간 조회수','en'=>'Last 24h views','ja'=>'直近24時間の閲覧数','es'=>'Vistas últimas 24h','de'=>'Aufrufe (24h)','fr'=>'Vues sur 24h','pt'=>'Views (24h)','tr'=>'Son 24s görüntülenme','vi'=>'Lượt xem 24h'];
  $__tabAll = ['ko'=>'전체 인기','en'=>'Overall','ja'=>'全体','es'=>'General','de'=>'Gesamt','fr'=>'Général','pt'=>'Geral','tr'=>'Genel','vi'=>'Tổng thể'];
  $__catNm2 = CATEGORY_META[$catKey] ?? CATEGORY_META['guide'];
  $__rank = function($list) use ($blogSuffix) {
    $i = 0;
    foreach ($list as $rSlug => $rA) { $i++;
      $rCatM = CATEGORY_META[$rA['category'] ?? 'guide'] ?? CATEGORY_META['guide'];
      echo '<a class="pop-item" href="/blog/'.h($rSlug).'.php'.h($blogSuffix).'"><span class="pop-rk">'.$i.'</span><span class="pop-body"><span class="pop-t">';
      foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($rA["title_{$__l}"] ?? ($rA['title_en'] ?? '')).'</span>';
      echo '</span><span class="pop-cat" style="color:'.h($rCatM['color'] ?? '#f7931a').'">';
      foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($rCatM[$__l] ?? $rCatM['en']).'</span>';
      echo '</span></span></a>';
    }
  }; ?>
<div class="other-articles mod-block">
  <div class="mod-head">
    <?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<h3 class="'.$__l.'">'.h($__popH[$__l] ?? $__popH['en']).'</h3>'; ?>
    <span class="mod-note"><?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($__popN[$__l] ?? $__popN['en']).'</span>'; ?></span>
  </div>
  <?php if (!empty($popCat)): ?>
  <div class="pop-tabs">
    <button type="button" class="pop-tab on" data-pop="all"><?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($__tabAll[$__l] ?? $__tabAll['en']).'</span>'; ?></button>
    <button type="button" class="pop-tab" data-pop="cat"><?php foreach (array_keys(SUPPORTED_LANGS) as $__l) echo '<span class="'.$__l.'">'.h($__catNm2[$__l] ?? $__catNm2['en']).'</span>'; ?></button>
  </div>
  <?php endif; ?>
  <div class="pop-list" data-pop-panel="all"><?php $__rank($popAll); ?></div>
  <?php if (!empty($popCat)): ?><div class="pop-list" data-pop-panel="cat" style="display:none"><?php $__rank($popCat); ?></div><?php endif; ?>
</div>
<?php endif; ?>


  <div class="cta">
      <div class="cta-tx">
      <h3 class="ko">실시간 타이밍 점수 대시보드</h3>
      <h3 class="en">The live timing score dashboard</h3>
      <h3 class="ja">リアルタイム・タイミングスコア ダッシュボード</h3>
      <h3 class="es">Panel de puntuación de timing en vivo</h3>
      <h3 class="de">Das Live-Timing-Score-Dashboard</h3>
      <h3 class="fr">Le tableau de bord des scores de timing en direct</h3>
      <h3 class="pt">O painel de pontuação de timing ao vivo</h3>
      <h3 class="tr">Canlı zamanlama puanı panosu</h3>
      <h3 class="vi">Bảng điểm thời điểm trực tiếp</h3>
      <p class="ko">온체인·기술 지표를 종합해 비트코인과 알트코인의 매수·매도 타이밍을 0~10점으로 산출합니다. 지금 시장이 어느 국면에 있는지 대시보드에서 볼 수 있습니다.</p>
      <p class="en">It combines on-chain and technical indicators into a 0–10 buy/sell timing score for Bitcoin and major altcoins, so you can see which phase the market is in right now.</p>
      <p class="ja">オンチェーン・テクニカル指標を統合し、ビットコインと主要アルトコインの売買タイミングを0〜10点で算出します。今の市場がどの局面かをダッシュボードで確認できます。</p>
      <p class="es">Combina indicadores on-chain y técnicos en una puntuación de timing de compra/venta de 0 a 10 para Bitcoin y las principales altcoins, para ver en qué fase está el mercado ahora.</p>
      <p class="de">Es fasst On-Chain- und technische Indikatoren zu einem Kauf-/Verkaufs-Timing-Score von 0 bis 10 für Bitcoin und große Altcoins zusammen, damit du siehst, in welcher Phase sich der Markt gerade befindet.</p>
      <p class="fr">Il combine des indicateurs on-chain et techniques en un score de timing d'achat/vente de 0 à 10 pour le Bitcoin et les principales altcoins, pour voir dans quelle phase se trouve le marché.</p>
      <p class="pt">Combina indicadores on-chain e técnicos em uma pontuação de timing de compra/venda de 0 a 10 para Bitcoin e as principais altcoins, para ver em que fase o mercado está agora.</p>
      <p class="tr">Zincir üstü ve teknik göstergeleri Bitcoin ve başlıca altcoinler için 0–10 alım/satım zamanlama puanında birleştirir; piyasanın şu an hangi aşamada olduğunu görebilirsiniz.</p>
      <p class="vi">Kết hợp các chỉ báo on-chain và kỹ thuật thành điểm thời điểm mua/bán từ 0–10 cho Bitcoin và các altcoin chính, để bạn thấy thị trường đang ở giai đoạn nào.</p>
      </div>
    <?php
    // 2026-07 수정: <html lang="...">이 $lang(이 글에서 실제 렌더링된 언어, 번역 없으면 en 폴백) 기준이라
    // 어떤 텍스트 변형이 보일지도 $lang을 따름. 하지만 href는 $requestedLang(사용자가 진짜 요청한 언어)을
    // 써야 함 — 독일어 요청인데 이 글만 번역이 없어 영어 텍스트가 보이는 상황이어도, 클릭하면 메인
    // 사이트로는 독일어로 정확히 돌아가야 함(메인은 5개 언어 다 지원하므로 이 글의 번역 여부와 무관).
    $mainHref = '/' . langSuffix($requestedLang);
    ?>
    <a href="<?= h($mainHref) ?>" class="ko main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">실시간 분석 보러가기 →</a>
    <a href="<?= h($mainHref) ?>" class="en main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Go to Live Analysis →</a>
    <a href="<?= h($mainHref) ?>" class="ja main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">リアルタイム分析を見る →</a>
    <a href="<?= h($mainHref) ?>" class="es main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Ver Análisis en Vivo →</a>
    <a href="<?= h($mainHref) ?>" class="de main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Live-Analyse ansehen →</a>
    <a href="<?= h($mainHref) ?>" class="fr main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Voir l'analyse en direct →</a>
    <a href="<?= h($mainHref) ?>" class="pt main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Ver análise ao vivo →</a>
    <a href="<?= h($mainHref) ?>" class="tr main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Canlı analizi gör →</a>
    <a href="<?= h($mainHref) ?>" class="vi main-live-link" onclick="try{var _l=getBlogLang();if(window.BTLang){BTLang.save(_l);}else{localStorage.setItem('blogLang',_l);document.cookie='blogLang='+encodeURIComponent(_l)+'; path=/; max-age=31536000; SameSite=Lax';}}catch(e){}">Xem phân tích trực tiếp →</a>
  </div>
</div><?php // /.wrap-main ?>
  <aside class="wrap-ad" aria-hidden="true"><!-- ad slot: 승인 후 채움 --></aside>
</div>
<?php $legalSuffix = langSuffix($requestedLang); require __DIR__ . '/../_shared_footer.php'; ?>
<script>window.BT_SUPPORTED_LANGS = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;</script>
<script src="/lang-common.js"></script>
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
  if(window.cbSyncLang) cbSyncLang(l);  // 카테고리 바(드롭다운) 링크·검색폼도 현재 언어 유지
  if(window.BTLang && BTLang.pathify) BTLang.pathify(l);  // 모든 내부 링크를 경로형으로
  try{ if(window.BTLang && BTLang.i18nHref) history.replaceState(null,'',BTLang.i18nHref(location.pathname+location.search+location.hash, l)); }catch(e){}  // URL도 경로형으로
  // 로고·하단 정책(개인정보/약관)·CTA 링크도 현재 언어를 유지하도록 href 갱신
  // (예전엔 서버 렌더 시점 언어에 고정돼, 언어를 바꿔도 예전 언어 페이지로 이동했음)
  const _logo = document.querySelector('a.logo');
  if(_logo) _logo.setAttribute('href', '/' + bcSuffix);
  document.querySelectorAll('footer a[href^="/privacy"]').forEach(a => a.setAttribute('href', '/privacy' + bcSuffix));
  document.querySelectorAll('footer a[href^="/terms"]').forEach(a => a.setAttribute('href', '/terms' + bcSuffix));
  document.querySelectorAll('.cta a').forEach(a => a.setAttribute('href', '/' + bcSuffix));
  // "실시간 분석 보러가기"(대시보드행) 링크도 현재 언어 유지 — 서버는 렌더 시점 언어로
  // href를 넣으므로, JS로 언어를 바꾼 뒤엔 대시보드가 옛 언어로 떴음. 여기서 갱신.
  document.querySelectorAll('a.main-live-link').forEach(a => a.setAttribute('href', '/' + bcSuffix));
  // 이전글/다음글 + 추천글 카드 링크도 현재 언어를 유지 (서버는 렌더 시점 언어로
  // 접미사를 넣기 때문에, JS로 언어가 바뀐 상태에선 접미사가 안 맞아 이동 시 한글로 깜빡였음)
  document.querySelectorAll('a[data-base^="/blog/"]').forEach(a => {
    const base = a.getAttribute('data-base');
    if(base) a.setAttribute('href', base + (l === 'ko' ? '' : ('?lang=' + l)));
  });
  // 저장은 공통 유틸에 위임(쿠키+localStorage). 미로드 시 폴백.
  if(window.BTLang){BTLang.save(l);}
  else{try{localStorage.setItem('blogLang',l);document.cookie='blogLang='+encodeURIComponent(l)+'; path=/; max-age=31536000; SameSite=Lax';}catch(e){}}
  try{ if(window.BTLang && BTLang.i18nHref) history.replaceState(null,'',BTLang.i18nHref(location.pathname+location.search+location.hash, l)); }catch(e){}  // 경로형 URL(?lang= 안 붙임)
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
  var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
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
    var SUP = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
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
      if(base) a.setAttribute('href', base + (cur === 'ko' ? '' : ('?lang=' + cur)));
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
  .blog-tabbar .btab.active{color:#f7931a}
  .blog-tabbar .btab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:#f7931a}
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
.bcs-box{width:100%;max-width:460px;max-height:70vh;display:flex;flex-direction:column;background:#1b1b21;border-radius:18px 18px 0 0;overflow:hidden;animation:bcsUp .22s ease-out}
@keyframes bcsUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
.bcs-grip{width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
.bcs-head{display:flex;align-items:center;justify-content:space-between;padding:8px 16px 10px}
.bcs-title{font-size:15px;font-weight:700;color:#f2f2f5}
.bcs-sub{font-size:11px;color:#888;margin-top:2px}
.bcs-close{background:none;border:none;color:#888;font-size:16px;cursor:pointer;padding:4px 8px}
.bcs-list{flex:1;overflow-y:auto;padding:4px 8px 16px}
.bcs-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer}
.bcs-item:active{background:#24242b}
.bcs-item.current{background:rgba(251,146,60,.1)}
.bcs-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.bcs-id{font-size:13px;font-weight:700;color:#f2f2f5}
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
<?php
// ── '함께 보면 좋은 글' 후보 데이터: 본문에 저자본이 없을 때 JS가 본문 '출처' 앞에 주입 (서버 본문 렌더에는 영향 없음) ──
$__combSource = array_diff_key($otherPool, $sameTop);
uasort($__combSource, function($a, $b) use ($relScore){ $d = $relScore($b) - $relScore($a); return $d !== 0 ? $d : strcmp($b['date'] ?? '', $a['date'] ?? ''); });
$__combItems = [];
foreach (array_slice($__combSource, 0, 4, true) as $__rSlug => $__rA) {
    $__it = ['url' => '/blog/'.$__rSlug.'.php'.$blogSuffix, 't' => [], 'd' => []];
    foreach (array_keys(SUPPORTED_LANGS) as $__L) {
        $__it['t'][$__L] = $__rA["title_{$__L}"] ?? ($__rA['title_en'] ?? '');
        $__dd = trim((string)($__rA["desc_{$__L}"] ?? ($__rA['desc_en'] ?? '')));
        $__it['d'][$__L] = (mb_strlen($__dd) > 110) ? (mb_substr($__dd, 0, 110).'…') : $__dd;
    }
    $__combItems[] = $__it;
}
$__combHeads2 = ['ko'=>'함께 보면 좋은 글','en'=>'Best Combined With','ja'=>'併せて見るべき記事','es'=>'Mejor Combinado Con','de'=>'Am besten kombiniert mit','fr'=>'À Combiner Avec','pt'=>'Melhor Combinado Com','tr'=>'En İyi Şununla Birlikte','vi'=>'Kết Hợp Tốt Nhất Với'];
$__combEye  = ['ko'=>'이어서 읽기','en'=>'Read Next','ja'=>'次に読む','es'=>'Sigue leyendo','de'=>'Weiterlesen','fr'=>'À lire ensuite','pt'=>'Leia a seguir','tr'=>'Sıradaki','vi'=>'Đọc tiếp'];
$__combNote = ['ko'=>'이 글과 연관성이 높은 글','en'=>'Closely related to this article','ja'=>'この記事と関連性の高い記事','es'=>'Muy relacionados con este artículo','de'=>'Eng verwandt mit diesem Artikel','fr'=>'Étroitement liés à cet article','pt'=>'Muito relacionados a este artigo','tr'=>'Bu yazıyla yakından ilgili','vi'=>'Liên quan chặt chẽ đến bài này'];
?>
<script>
window.__combReads = <?= json_encode(['heads'=>$__combHeads2,'eyebrow'=>$__combEye,'note'=>$__combNote,'items'=>$__combItems], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>;
(function(){
  var main=document.querySelector('.wrap-main'); if(!main||!window.__combReads) return;
  var data=window.__combReads; if(!data.items||!data.items.length) return;
  var heads=data.heads, langs=Object.keys(heads);
  var endEl=main.querySelector('.share-bottom, .blog-ad, .prevnext, .other-articles, .cta'); // 본문 끝 경계
  function beforeEnd(el){ return !endEl || !!(el.compareDocumentPosition(endEl) & Node.DOCUMENT_POSITION_FOLLOWING); }

  // 1) 기존 저자 추천글 섹션 제거 — 제목 문구가 글마다 달라 '구조'로 감지
  //    (본문 끝 이전에서 /blog/ 링크 2개 이상 든 목록 블록 = h2 헤딩들 + ul들)
  var blogUls=[].slice.call(main.querySelectorAll('ul')).filter(function(u){ return beforeEnd(u) && u.querySelectorAll('a[href*="/blog/"]').length>=2; });
  if(blogUls.length){
    var last=blogUls[blogUls.length-1], start=last, pv=last.previousElementSibling;
    while(pv && (pv.tagName==='UL' || pv.tagName==='H2')){ start=pv; pv=pv.previousElementSibling; }
    var e=start, rm=[];
    while(e){ rm.push(e); if(e===last) break; e=e.nextElementSibling; }
    rm.forEach(function(x){ x.parentNode && x.parentNode.removeChild(x); });
  }

  // 2) 공통 '함께 보면 좋은 글' 하나만 생성 (항상)
  var frag=document.createElement('div'); frag.className='comb-box';
  var eye=data.eyebrow||{}, note=data.note||{};
  var eb=document.createElement('div'); eb.className='comb-eyebrow';
  langs.forEach(function(lg){ var sp=document.createElement('span'); sp.className=lg; sp.textContent=eye[lg]||eye.en||''; eb.appendChild(sp); });
  frag.appendChild(eb);
  langs.forEach(function(lg){ var h=document.createElement('h2'); h.className=lg+' comb-h'; h.textContent=heads[lg]||heads.en; frag.appendChild(h); });
  var nt=document.createElement('div'); nt.className='comb-note';
  langs.forEach(function(lg){ var sp=document.createElement('span'); sp.className=lg; sp.textContent=note[lg]||note.en||''; nt.appendChild(sp); });
  frag.appendChild(nt);
  langs.forEach(function(lg){ var ul=document.createElement('ul'); ul.className=lg;
    data.items.forEach(function(it){ var li=document.createElement('li');
      var st=document.createElement('strong'), a=document.createElement('a');
      a.href=it.url; a.textContent=(it.t&&(it.t[lg]||it.t.en))||''; st.appendChild(a); st.appendChild(document.createTextNode(':'));
      li.appendChild(st); li.appendChild(document.createTextNode(' '+((it.d&&(it.d[lg]||it.d.en))||'')));
      ul.appendChild(li); });
    frag.appendChild(ul); });

  // 3) 본문 끝(출처 앞)에 삽입
  var mk=['출처:','Sources:','出典:','Fuentes:','Quellen:','Fontes:','Kaynaklar:','Nguồn:'];
  var ps=[].slice.call(main.querySelectorAll('p')), srcP=null;
  for(var j=0;j<ps.length;j++){
    if(endEl && !(ps[j].compareDocumentPosition(endEl) & Node.DOCUMENT_POSITION_FOLLOWING)) break;
    var t=(ps[j].textContent||'').trim();
    if(mk.some(function(m){return t.indexOf(m)===0;})){ srcP=ps[j]; break; }
  }
  if(srcP&&srcP.parentNode) srcP.parentNode.insertBefore(frag, srcP);
  else if(endEl&&endEl.parentNode) endEl.parentNode.insertBefore(frag, endEl);
  else main.appendChild(frag);
})();
</script>
<script>
/* ── 많이 본 글 탭 토글 ── */
(function(){
  var tabs=document.querySelectorAll('.pop-tab'); if(!tabs.length) return;
  [].forEach.call(tabs,function(t){ t.addEventListener('click',function(){
    [].forEach.call(document.querySelectorAll('.pop-tab'),function(x){x.classList.remove('on')});
    t.classList.add('on');
    var w=t.getAttribute('data-pop');
    [].forEach.call(document.querySelectorAll('.pop-list'),function(p){ p.style.display=(p.getAttribute('data-pop-panel')===w)?'':'none'; });
  }); });
})();
</script>
<script>
/* ── 뷰페이지: 읽기 진행바 (목차는 제거함) ── */
(function(){
  var bar=document.getElementById('btReadBar'); if(!bar) return;
  function prog(){ var h=document.documentElement, st=h.scrollTop||document.body.scrollTop, sh=(h.scrollHeight-h.clientHeight)||1; bar.style.width=Math.min(100,Math.max(0, st/sh*100))+'%'; }
  window.addEventListener('scroll',prog,{passive:true}); window.addEventListener('resize',prog); prog();
})();
</script>
</body>
</html>
