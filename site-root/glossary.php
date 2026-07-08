<?php
// BTCtiming.com — 온체인 지표 용어사전 v3 (허브 + 개별, 시각화+실시간)
// URL: /glossary → 허브 / /glossary/{slug} → 개별 (.htaccess가 ?term=slug 전달)
header('Content-Type: text/html; charset=utf-8');
$baseUrl = 'https://btctiming.com';

// SUPPORTED_LANGS 등 공용 상수/함수를 먼저 확보 (아래 언어 판정에서 즉시 사용)
require_once __DIR__ . '/config.php';

$GLOSSARY = require __DIR__ . '/glossary_data.php';
require __DIR__ . '/glossary_gauge.php';

// 언어 결정(공용 규칙)
$__gLang = (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) ? $_GET['lang'] : 'ko';
$L = fn($arr) => $arr[$__gLang] ?? $arr['en'];

// 요청 지표
$term = isset($_GET['term']) ? preg_replace('/[^a-z0-9\-]/', '', $_GET['term']) : '';
$isDetail = ($term !== '' && isset($GLOSSARY[$term]));

// ── 다국어 UI 라벨 ──
$CAT_LABEL = [
  'onchain'       => ['ko'=>'온체인 밸류에이션','en'=>'On-Chain Valuation','ja'=>'オンチェーン評価','es'=>'Valoración On-Chain','de'=>'On-Chain-Bewertung','fr'=>'Valorisation On-Chain','pt'=>'Avaliação On-Chain','tr'=>'Zincir Üstü Değerleme','vi'=>'Định giá On-Chain'],
  'miner'         => ['ko'=>'채굴·심리','en'=>'Miner / Sentiment','ja'=>'マイナー・センチメント','es'=>'Minería / Sentimiento','de'=>'Miner / Sentiment','fr'=>'Mineurs / Sentiment','pt'=>'Mineração / Sentimento','tr'=>'Madenci / Duyarlılık','vi'=>'Thợ đào / Tâm lý'],
  'institutional' => ['ko'=>'기관 흐름','en'=>'Institutional Flow','ja'=>'機関投資家フロー','es'=>'Flujo Institucional','de'=>'Institutioneller Fluss','fr'=>'Flux institutionnel','pt'=>'Fluxo Institucional','tr'=>'Kurumsal Akış','vi'=>'Dòng tiền tổ chức'],
  'cycle'         => ['ko'=>'사이클 위치','en'=>'Cycle Position','ja'=>'サイクル位置','es'=>'Posición del Ciclo','de'=>'Zyklusposition','fr'=>'Position du cycle','pt'=>'Posição do Ciclo','tr'=>'Döngü Konumu','vi'=>'Vị trí chu kỳ'],
  'altcoin'       => ['ko'=>'알트코인 지표','en'=>'Altcoin Metrics','ja'=>'アルトコイン指標','es'=>'Métricas de Altcoins','de'=>'Altcoin-Metriken','fr'=>'Indicateurs Altcoins','pt'=>'Métricas de Altcoins','tr'=>'Altcoin Metrikleri','vi'=>'Chỉ số Altcoin'],
];
$CAT_ORDER = ['onchain','miner','institutional','cycle','altcoin'];

$TITLE_PAT = ['ko'=>'%s란? 뜻과 활용법','en'=>'What is %s? Meaning & How to Use','ja'=>'%sとは？意味と使い方','es'=>'¿Qué es %s? Significado y uso','de'=>'Was ist %s? Bedeutung & Nutzung','fr'=>'Qu\'est-ce que %s ? Signification et usage','pt'=>'O que é %s? Significado e uso','tr'=>'%s nedir? Anlamı ve kullanımı','vi'=>'%s là gì? Ý nghĩa và cách dùng'];
$HUB_TITLE = ['ko'=>'비트코인 온체인 지표 용어사전','en'=>'Bitcoin On-Chain Indicator Glossary','ja'=>'ビットコイン・オンチェーン指標用語集','es'=>'Glosario de Indicadores On-Chain de Bitcoin','de'=>'Bitcoin On-Chain-Indikator-Glossar','fr'=>'Glossaire des indicateurs on-chain Bitcoin','pt'=>'Glossário de Indicadores On-Chain do Bitcoin','tr'=>'Bitcoin Zincir Üstü Gösterge Sözlüğü','vi'=>'Từ điển chỉ báo on-chain Bitcoin'];
$HUB_DESC = ['ko'=>'MVRV, NUPL, SOPR, 해시리본 등 비트코인 온체인 지표를 시각화와 실시간 값으로 쉽게 설명합니다. 각 지표의 뜻과 매수·매도 타이밍 활용법을 정리했습니다.','en'=>'Bitcoin on-chain indicators like MVRV, NUPL, SOPR, and Hash Ribbon explained with visuals and live values — what each means and how to use it for buy/sell timing.','ja'=>'MVRV、NUPL、SOPR、ハッシュリボンなどのビットコイン・オンチェーン指標を視覚化とリアルタイム値でわかりやすく解説。各指標の意味と売買タイミングへの活用法をまとめました。','es'=>'Indicadores on-chain de Bitcoin como MVRV, NUPL, SOPR y Hash Ribbon explicados con visuales y valores en vivo: qué significan y cómo usarlos para el timing de compra/venta.','de'=>'Bitcoin-On-Chain-Indikatoren wie MVRV, NUPL, SOPR und Hash Ribbon mit Grafiken und Live-Werten erklärt — was sie bedeuten und wie man sie für das Kauf-/Verkaufs-Timing nutzt.','fr'=>'Les indicateurs on-chain du Bitcoin comme MVRV, NUPL, SOPR et Hash Ribbon expliqués avec des visuels et des valeurs en direct : leur signification et leur usage pour le timing d\'achat/vente.','pt'=>'Indicadores on-chain do Bitcoin como MVRV, NUPL, SOPR e Hash Ribbon explicados com visuais e valores ao vivo — o que significam e como usá-los para o timing de compra/venda.','tr'=>'MVRV, NUPL, SOPR ve Hash Ribbon gibi Bitcoin zincir üstü göstergeleri görseller ve canlı değerlerle açıklanır — ne anlama geldikleri ve alım/satım zamanlamasında nasıl kullanılacağı.','vi'=>'Các chỉ báo on-chain của Bitcoin như MVRV, NUPL, SOPR và Hash Ribbon được giải thích bằng hình ảnh và giá trị trực tiếp — ý nghĩa và cách dùng để canh thời điểm mua/bán.'];

$T_BACKHUB = ['ko'=>'← 용어사전 전체','en'=>'← All terms','ja'=>'← 用語集トップ','es'=>'← Todos los términos','de'=>'← Alle Begriffe','fr'=>'← Tous les termes','pt'=>'← Todos os termos','tr'=>'← Tüm terimler','vi'=>'← Tất cả thuật ngữ'];
$T_WHAT    = ['ko'=>'먼저, 이게 뭔가요?','en'=>'First, what is it?','ja'=>'まず、これは何ですか？','es'=>'Primero, ¿qué es?','de'=>'Zuerst: Was ist das?','fr'=>'D\'abord, qu\'est-ce que c\'est ?','pt'=>'Primeiro, o que é?','tr'=>'Önce, bu nedir?','vi'=>'Trước tiên, đây là gì?'];
$T_RANGES  = ['ko'=>'지금은 어느 구간일까?','en'=>'Which zone are we in?','ja'=>'今はどのレンジ？','es'=>'¿En qué zona estamos?','de'=>'In welcher Zone sind wir?','fr'=>'Dans quelle zone sommes-nous ?','pt'=>'Em que zona estamos?','tr'=>'Hangi bölgedeyiz?','vi'=>'Chúng ta đang ở vùng nào?'];
$T_HOWUSE  = ['ko'=>'실전에서 어떻게 쓰나','en'=>'How to use it','ja'=>'実戦での使い方','es'=>'Cómo usarlo','de'=>'Wie man ihn nutzt','fr'=>'Comment l\'utiliser','pt'=>'Como usar','tr'=>'Nasıl kullanılır','vi'=>'Cách sử dụng'];
$T_LIMITS  = ['ko'=>'맹신하면 안 되는 이유','en'=>'Why not to rely on it blindly','ja'=>'盲信してはいけない理由','es'=>'Por qué no confiar ciegamente','de'=>'Warum nicht blind vertrauen','fr'=>'Pourquoi ne pas s\'y fier aveuglément','pt'=>'Por que não confiar cegamente','tr'=>'Neden körü körüne güvenilmemeli','vi'=>'Vì sao không nên tin tưởng mù quáng'];
$T_RELATED = ['ko'=>'관련 지표','en'=>'Related Indicators','ja'=>'関連指標','es'=>'Indicadores relacionados','de'=>'Verwandte Indikatoren','fr'=>'Indicateurs liés','pt'=>'Indicadores relacionados','tr'=>'İlgili göstergeler','vi'=>'Chỉ báo liên quan'];
$T_CTA     = ['ko'=>'📊 실시간 점수 대시보드에서 보기 →','en'=>'📊 See it on the live score dashboard →','ja'=>'📊 リアルタイムスコアのダッシュボードで見る →','es'=>'📊 Verlo en el panel de puntuación en vivo →','de'=>'📊 Im Live-Score-Dashboard ansehen →','fr'=>'📊 Le voir sur le tableau de bord des scores en direct →','pt'=>'📊 Ver no painel de pontuação ao vivo →','tr'=>'📊 Canlı skor panosunda gör →','vi'=>'📊 Xem trên bảng điểm trực tiếp →'];
$T_LIVELABEL = ['ko'=>'현재 값','en'=>'Current value','ja'=>'現在値','es'=>'Valor actual','de'=>'Aktueller Wert','fr'=>'Valeur actuelle','pt'=>'Valor atual','tr'=>'Güncel değer','vi'=>'Giá trị hiện tại'];
$T_LOADING = ['ko'=>'불러오는 중…','en'=>'Loading…','ja'=>'読み込み中…','es'=>'Cargando…','de'=>'Laden…','fr'=>'Chargement…','pt'=>'Carregando…','tr'=>'Yükleniyor…','vi'=>'Đang tải…'];
$T_COL_ZONE = ['ko'=>'구간','en'=>'Zone','ja'=>'レンジ','es'=>'Zona','de'=>'Zone','fr'=>'Zone','pt'=>'Zona','tr'=>'Bölge','vi'=>'Vùng'];
$T_COL_MEAN = ['ko'=>'의미','en'=>'Meaning','ja'=>'意味','es'=>'Significado','de'=>'Bedeutung','fr'=>'Signification','pt'=>'Significado','tr'=>'Anlam','vi'=>'Ý nghĩa'];
$T_COL_SIG  = ['ko'=>'신호','en'=>'Signal','ja'=>'シグナル','es'=>'Señal','de'=>'Signal','fr'=>'Signal','pt'=>'Sinal','tr'=>'Sinyal','vi'=>'Tín hiệu'];

$termSuffix = ($__gLang === 'ko') ? '' : ('?lang=' . $__gLang);

// ── 개별 지표 데이터 준비 ──
if ($isDetail) {
  $G = $GLOSSARY[$term];
  $i = $G['i18n'][$__gLang] ?? $G['i18n']['en'];
  $nm = $i['term_full'];
  $GUIDE_TITLE = sprintf($L($TITLE_PAT), $nm) . ' | BTCtiming.com';
  $GUIDE_DESC = mb_substr($i['one_liner'], 0, 150);
  $GUIDE_CANONICAL = $baseUrl . '/glossary/' . $term . $termSuffix;
} else {
  $GUIDE_TITLE = $L($HUB_TITLE) . ' | BTCtiming.com';
  $GUIDE_DESC = $L($HUB_DESC);
  $GUIDE_CANONICAL = $baseUrl . '/glossary' . $termSuffix;
}

$GUIDE_EXTRA_CSS = <<<CSS
.wrap{max-width:800px;margin:0 auto;padding:40px 22px 100px}
h1{font-size:1.8rem;font-weight:800;line-height:1.28;margin-bottom:8px;color:#fafafa}
.lead{font-size:14px;color:#a1a1aa;line-height:1.7;margin-bottom:30px}
.dtop{font-size:12px;color:#8b8b93;margin-bottom:14px}
.dtop a{color:#8b8b93;text-decoration:none}
.dtop a:hover{color:#f7931a}
.dcat{display:inline-block;font-size:11px;font-weight:700;color:#f7931a;background:rgba(247,147,26,.1);border-radius:6px;padding:3px 9px;margin-bottom:10px}
.oneliner{font-size:15.5px;color:#e4e4e7;font-weight:600;border-left:3px solid #f7931a;padding:9px 15px;margin:14px 0 6px;background:rgba(247,147,26,.05)}
.gh2{font-size:1.12rem;font-weight:700;color:#fafafa;margin:36px 0 12px;display:flex;align-items:center;gap:9px}
.gh2:before{content:'';width:4px;height:18px;background:#f7931a;border-radius:2px}
.gp{margin:0 0 14px;color:#c9c9d1;font-size:15px;line-height:1.8}
.gp.lead-p{color:#e4e4e7}
.svgbox{background:#0f0f11;border:1px solid var(--b1,rgba(255,255,255,.07));border-radius:14px;padding:18px;margin:22px 0}
.svgcap{font-size:12px;color:#71717a;text-align:center;margin-top:8px}
.live{background:linear-gradient(135deg,#151517,#1a1a1f);border:1px solid rgba(247,147,26,.25);border-radius:14px;padding:19px 21px;margin:22px 0}
.live-top{display:flex;align-items:baseline;justify-content:space-between;flex-wrap:wrap;gap:8px}
.live-label{font-size:12px;color:#a1a1aa;font-weight:600}
.live-val{font-size:2.3rem;font-weight:800;color:#fff;line-height:1.15}
.live-status{font-size:14px;font-weight:700;padding:5px 13px;border-radius:8px;background:rgba(113,113,122,.15);color:#a1a1aa}
.live-time{font-size:11px;color:#52525b;margin-top:9px}
.rtable{width:100%;border-collapse:collapse;margin:8px 0;font-size:13.5px}
.rtable th,.rtable td{text-align:left;padding:10px 12px;border-bottom:1px solid rgba(255,255,255,.07);vertical-align:top}
.rtable th{color:#8b8b93;font-size:11px;text-transform:uppercase;letter-spacing:.04em}
.rtable td.rg{font-weight:700;white-space:nowrap;width:22%}
.rtable td.sg{color:#e4e4e7;font-weight:600;white-space:nowrap;width:16%;text-align:right}
.warn-box{background:rgba(220,38,38,.05);border:1px solid rgba(220,38,38,.2);border-radius:12px;padding:14px 18px;margin:12px 0}
.warn-item{font-size:14.5px;color:#d4b0b0;padding:8px 0 8px 24px;position:relative;line-height:1.75}
.warn-item:before{content:'\\26A0';position:absolute;left:0;color:#f87171}
.gcta{display:inline-block;margin:24px 0 6px;padding:13px 22px;background:#f7931a;color:#000;font-weight:700;font-size:14.5px;border-radius:10px;text-decoration:none}
.gcta:hover{background:#ffa733}
.gother{display:flex;flex-wrap:wrap;gap:8px;margin-top:14px}
.gother a{font-size:12.5px;color:#c4c4cc;background:#151517;border:1px solid rgba(255,255,255,.07);border-radius:8px;padding:6px 12px;text-decoration:none}
.gother a:hover{border-color:#f7931a;color:#f7931a}
.gsec{margin:34px 0 12px;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#f7931a}
.gcards{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px}
.gcard{display:block;background:#151517;border:1px solid var(--b1,rgba(255,255,255,.07));border-radius:12px;padding:15px 16px;text-decoration:none;transition:border-color .15s,transform .1s}
.gcard:hover{border-color:#f7931a;transform:translateY(-1px)}
.gcard b{display:block;color:#fafafa;font-size:14.5px;margin-bottom:4px}
.gcard span{color:#8b8b93;font-size:12px;line-height:1.5;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.pagefoot{margin-top:52px;padding-top:22px;border-top:1px solid rgba(255,255,255,.07);font-size:12.5px;color:#71717a;display:flex;gap:18px;flex-wrap:wrap}
.pagefoot a{color:#71717a;text-decoration:underline}
CSS;

// 개념도 라벨 치환
function glossary_fill_diagram(string $svg, array $labels): string {
  foreach ($labels as $k => $v) {
    $svg = str_replace('{{' . $k . '}}', htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'), $svg);
  }
  // 안 채워진 플레이스홀더 방지
  $svg = preg_replace('/\{\{[a-z0-9_]+\}\}/', '', $svg);
  return $svg;
}
// 구간별 색상(게이지 zones 순서와 매칭 시도, 없으면 순환)
function glossary_range_color(int $idx, array $zones): string {
  if (isset($zones[$idx][2])) return $zones[$idx][2];
  $fallback = ['#16a34a','#84cc16','#eab308','#f97316','#dc2626'];
  return $fallback[$idx % count($fallback)];
}

require __DIR__ . '/_guide_head.php';
?>

<div class="wrap">
<?php if ($isDetail):
  $gauge = $G['gauge'];
  $hasLive = !empty($G['live_field']);
  $markerId = 'gm_' . preg_replace('/[^a-z0-9]/','_',$term);
  $what = $i['what']; $ranges = $i['ranges']; $howto = $i['how_to_use']; $limits = $i['limits'];
  $diagSvg = glossary_fill_diagram($G['diagram'], $i['diag']);
  $gaugeSvg = render_gauge_svg($gauge, $hasLive, $markerId);
  // 실시간 라벨
  $liveLabel = $G['live_label_ko'] ?? '';
  if ($__gLang !== 'ko' || $liveLabel === '') $liveLabel = $L($T_LIVELABEL) . ' · ' . $nm;
?>
  <div class="dtop"><a href="/glossary<?= gh($termSuffix) ?>"><?= gh($L($T_BACKHUB)) ?></a></div>
  <div class="dcat"><?= gh($L($CAT_LABEL[$G['category']])) ?></div>
  <h1><?= gh(sprintf($L($TITLE_PAT), $nm)) ?></h1>
  <div class="oneliner"><?= gh($i['one_liner']) ?></div>

  <?php if ($hasLive): ?>
  <!-- [시각화 1] 실시간 값 -->
  <div class="live" data-live="<?= gh($G['live_field']) ?>"
       data-gauge-min="<?= gh($gauge['min']) ?>" data-gauge-max="<?= gh($gauge['max']) ?>"
       data-marker="<?= gh($markerId) ?>"
       <?= !empty($G['live_pct']) ? 'data-pct="1"' : '' ?>
       data-decimals="<?= gh($G['live_decimals'] ?? 2) ?>"
       <?= isset($G['status_map']) ? "data-status='".gh(json_encode($G['status_map'],JSON_UNESCAPED_UNICODE))."'" : '' ?>>
    <div class="live-top">
      <div>
        <div class="live-label">📡 <?= gh($liveLabel) ?></div>
        <div class="live-val"><span class="lv-val">–</span></div>
      </div>
      <div class="live-status lv-status"><?= gh($L($T_LOADING)) ?></div>
    </div>
    <div class="live-time lv-time"><?= gh($L($T_LOADING)) ?></div>
  </div>
  <?php endif; ?>

  <!-- [텍스트] 개념 -->
  <h2 class="gh2"><?= gh($L($T_WHAT)) ?></h2>
  <p class="gp lead-p"><?= gh($what[0]) ?></p>

  <!-- [시각화 2] 개념도 -->
  <div class="svgbox"><?= $diagSvg ?></div>

  <?php for ($k=1; $k<count($what); $k++): ?>
    <p class="gp"><?= gh($what[$k]) ?></p>
  <?php endfor; ?>

  <!-- [시각화 3] 게이지 -->
  <h2 class="gh2"><?= gh($L($T_RANGES)) ?></h2>
  <div class="svgbox"><?= $gaugeSvg ?></div>

  <!-- 구간표 -->
  <table class="rtable">
    <tr><th><?= gh($L($T_COL_ZONE)) ?></th><th><?= gh($L($T_COL_MEAN)) ?></th><th><?= gh($L($T_COL_SIG)) ?></th></tr>
    <?php foreach ($ranges as $ri => $r): ?>
      <tr>
        <td class="rg" style="color:<?= gh(glossary_range_color($ri, $gauge['zones'])) ?>"><?= gh($r[0]) ?></td>
        <td><?= gh($r[1]) ?></td>
        <td class="sg"><?= gh($r[2]) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <!-- [텍스트] 활용법 -->
  <h2 class="gh2"><?= gh($L($T_HOWUSE)) ?></h2>
  <?php foreach ($howto as $p): ?><p class="gp"><?= gh($p) ?></p><?php endforeach; ?>

  <!-- [텍스트] 한계 = 경고카드 -->
  <h2 class="gh2"><?= gh($L($T_LIMITS)) ?></h2>
  <div class="warn-box">
    <?php foreach ($limits as $p): ?><div class="warn-item"><?= gh($p) ?></div><?php endforeach; ?>
  </div>

  <a class="gcta" href="/<?= gh($termSuffix) ?>"><?= gh($L($T_CTA)) ?></a>

  <h2 class="gh2"><?= gh($L($T_RELATED)) ?></h2>
  <div class="gother">
    <?php foreach ($i['related'] as $rs): if (!isset($GLOSSARY[$rs])) continue;
      $rn = $GLOSSARY[$rs]['i18n'][$__gLang]['term_full'] ?? $GLOSSARY[$rs]['i18n']['en']['term_full']; ?>
      <a href="/glossary/<?= gh($rs) ?><?= gh($termSuffix) ?>"><?= gh($rn) ?></a>
    <?php endforeach; ?>
  </div>

<?php else: // ── 허브 ── ?>
  <h1><?= gh($L($HUB_TITLE)) ?></h1>
  <p class="lead"><?= gh($L($HUB_DESC)) ?></p>
  <?php foreach ($CAT_ORDER as $cat):
    $inCat = array_filter($GLOSSARY, fn($g) => $g['category'] === $cat);
    if (!$inCat) continue; ?>
    <div class="gsec"><?= gh($L($CAT_LABEL[$cat])) ?></div>
    <div class="gcards">
      <?php foreach ($inCat as $s => $g):
        $gi = $g['i18n'][$__gLang] ?? $g['i18n']['en']; ?>
        <a class="gcard" href="/glossary/<?= gh($s) ?><?= gh($termSuffix) ?>">
          <b><?= gh($gi['term_full']) ?></b>
          <span><?= gh(mb_substr($gi['one_liner'], 0, 72)) ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

  <div class="pagefoot">
    <a href="/<?= gh($termSuffix) ?>"><span class="l-ko">← 실시간 분석</span><span class="l-en">← Live Analysis</span><span class="l-ja">← リアルタイム分析</span><span class="l-es">← Análisis en vivo</span><span class="l-de">← Live-Analyse</span><span class="l-fr">← Analyse en direct</span><span class="l-pt">← Análise ao vivo</span><span class="l-tr">← Canlı analiz</span><span class="l-vi">← Phân tích trực tiếp</span></a>
    <a href="/blog/<?= gh($termSuffix) ?>"><span class="l-ko">블로그</span><span class="l-en">Blog</span><span class="l-ja">ブログ</span><span class="l-es">Blog</span><span class="l-de">Blog</span><span class="l-fr">Blog</span><span class="l-pt">Blog</span><span class="l-tr">Blog</span><span class="l-vi">Blog</span></a>
    <a href="/about<?= gh($termSuffix) ?>"><span class="l-ko">소개</span><span class="l-en">About</span><span class="l-ja">概要</span><span class="l-es">Acerca de</span><span class="l-de">Über uns</span><span class="l-fr">À propos</span><span class="l-pt">Sobre</span><span class="l-tr">Hakkında</span><span class="l-vi">Giới thiệu</span></a>
  </div>
</div>

<script>
// 이 페이지의 본문(카드/설명)은 서버(PHP)가 선택 언어 하나만 렌더한다.
// 그래서 헤더/푸터처럼 CSS로 즉시 전환할 수 없고, 언어를 바꾸면 새 URL로 이동해 다시 렌더해야 한다.
(function(){
  var RENDERED = <?= json_encode($__gLang) ?>;      // 지금 화면에 렌더된(=URL이 요청한) 언어
  var SCROLL_KEY = 'glossaryScroll';                // 언어 전환 리로드 시 스크롤 위치 임시 저장 키
  var navigating = false;

  // 언어 전환으로 리로드된 직후에만 저장해둔 스크롤 위치를 복원한다(최상단으로 튀는 것 방지).
  // ※ scrollRestoration은 건드리지 않는다 — 뒤로가기 시 브라우저의 기본 스크롤 복원을 살려둬야 하기 때문.
  var pendingScroll = null;
  try {
    var saved = sessionStorage.getItem(SCROLL_KEY);
    if (saved !== null) {
      sessionStorage.removeItem(SCROLL_KEY);
      pendingScroll = parseInt(saved, 10) || 0;
      window.scrollTo(0, pendingScroll);             // 즉시 1차 복원
    }
  } catch(_){}
  // 이미지/SVG로 레이아웃이 늦게 커질 수 있어 로드 완료 후 한 번 더 복원
  if (pendingScroll !== null) {
    window.addEventListener('load', function(){ window.scrollTo(0, pendingScroll); });
  }

  window.onGuideLang = function(lang){
    if (navigating) return;
    if (!lang || lang === RENDERED) return;          // 이미 이 언어면 이동 안 함(초기 적용 시 오작동 방지)
    navigating = true;
    // 현재 스크롤 위치를 저장 → 리로드 후 위에서 복원
    try { sessionStorage.setItem(SCROLL_KEY, String(window.pageYOffset || 0)); } catch(_){}
    var url = new URL(location.href);
    if (lang === 'ko') url.searchParams.delete('lang');
    else url.searchParams.set('lang', lang);
    // location.href(히스토리 push) 대신 replace: 언어 전환이 뒤로가기 스택에 쌓이지 않는다.
    location.replace(url.toString());
  };

  // 마지막으로 고른 언어(localStorage)를 항상 존중한다 = 사용자가 마지막에 선택한 언어 유지.
  // 화면(RENDERED)이 마지막 선택 언어와 다르면, 그 언어로 다시 로드해 맞춘다.
  // 이걸 "페이지 로드 즉시"에도 하고 "뒤로가기 복원 시(pageshow)"에도 해야 한다.
  //   - 뒤로가기가 bfcache 히트면 pageshow(persisted)로 잡히고,
  //   - bfcache 미스(새 로드)면 아래 즉시 실행 분기로 잡힌다.
  // 둘 다 처리해야 "뒤로가기 하면 이전 언어로 돌아가는" 문제가 사라진다.
  function syncToStoredLang(){
    if (navigating) return;
    // URL에 ?lang이 명시돼 있으면 그건 존중한다(공유 링크·명시적 접근).
    // 그 경우 서버가 이미 그 언어로 RENDERED 했으므로 건드리지 않는다.
    var urlHasLang = false;
    try { urlHasLang = new URLSearchParams(location.search).has('lang'); } catch(_){}
    // RENDERED가 ko인데 URL에 lang이 있으면(=?lang=ko 같은 경우)도 명시로 간주.
    if (urlHasLang) return;
    // 여기까지 왔으면 URL에 lang이 없는 "기본 화면"(서버는 ko로 렌더).
    // 마지막에 고른 언어가 ko가 아니면 그 언어로 맞춰 사용자의 선택을 유지한다.
    var stored = 'ko';
    try { var s = localStorage.getItem('blogLang'); if (s) stored = s; } catch(_){}
    if (stored !== RENDERED) {
      navigating = true;
      var url = new URL(location.href);
      url.searchParams.set('lang', stored);          // stored는 여기서 ko가 아님
      location.replace(url.toString());
    }
  }
  // ① 페이지 로드 즉시(새 로드·뒤로가기 bfcache 미스 모두 커버)
  syncToStoredLang();
  // ② 뒤로가기/앞으로가기로 bfcache 복원될 때
  window.addEventListener('pageshow', function(e){
    if (e.persisted) {
      navigating = false;
      syncToStoredLang();
    }
  });
})();
</script>

<?php if ($isDetail && $hasLive): ?>
<script>
(function(){
  var box = document.querySelector('.live[data-live]');
  if (!box) return;
  var field = box.getAttribute('data-live');
  var gmin = parseFloat(box.getAttribute('data-gauge-min'));
  var gmax = parseFloat(box.getAttribute('data-gauge-max'));
  var markerId = box.getAttribute('data-marker');
  var isPct = box.getAttribute('data-pct') === '1';
  var decimals = parseInt(box.getAttribute('data-decimals') || '2', 10);
  var statusMap = null;
  try { var sm = box.getAttribute('data-status'); if (sm) statusMap = JSON.parse(sm); } catch(e){}
  var W = 700, pad = 40;
  function xOf(v){ v = Math.max(gmin, Math.min(gmax, v)); return pad + (v-gmin)/((gmax-gmin)||1)*(W-2*pad); }
  // live_field 경로 파싱: "raw.mvrv_z" → d.raw.mvrv_z, "btc_dom" → d.btc_dom
  function pick(d, path){ return path.split('.').reduce(function(o,k){ return (o==null)?null:o[k]; }, d); }
  function zoneColorAt(v){
    var svg = box.parentNode.querySelector('.svgbox svg[data-gmin]');
    return '#f7931a';
  }
  function setStatus(txt, color){
    var st = box.querySelector('.lv-status');
    st.textContent = txt; st.style.color = color; st.style.background = color + '22';
  }
  function render(d){
    var raw = pick(d, field);
    // 상태값(hash-ribbon) 처리
    if (statusMap) {
      var key = (''+raw).toLowerCase();
      var m = statusMap[key] || null;
      box.querySelector('.lv-val').textContent = m ? m[0] : (raw||'–');
      if (m) setStatus(m[0], m[1]);
      var mk0 = document.getElementById(markerId);
      if (mk0) mk0.style.opacity = 0; // 상태형은 마커 생략
      box.querySelector('.lv-time').textContent = new Date().toLocaleString();
      return;
    }
    var v = (typeof raw === 'number') ? raw : parseFloat(raw);
    if (isNaN(v)) { box.querySelector('.lv-time').textContent = '–'; return; }
    var disp = v.toFixed(decimals) + (isPct ? '%' : '');
    box.querySelector('.lv-val').textContent = disp;
    // 게이지 zones에서 현재 구간 색/라벨
    var svg = box.parentNode.querySelector('.svgbox svg[data-gmin]');
    var color = '#f7931a', label = '';
    if (svg){
      // zones는 서버가 rect 순서로 그림 — 색만 근사: 값 위치의 rect fill 탐색
      var rects = svg.querySelectorAll('rect');
      var x = xOf(v);
      rects.forEach(function(rc){
        var rx = parseFloat(rc.getAttribute('x')), rw = parseFloat(rc.getAttribute('width'));
        if (x >= rx && x <= rx+rw){ color = rc.getAttribute('fill') || color; }
      });
      // 마커 이동
      var mk = document.getElementById(markerId);
      if (mk){
        var ln = mk.querySelector('.gm-line'), tri = mk.querySelector('.gm-tri'), val = mk.querySelector('.gm-val');
        if (ln){ ln.setAttribute('x1', x); ln.setAttribute('x2', x); }
        if (tri){ tri.setAttribute('points', x+',52 '+(x-7)+',62 '+(x+7)+',62'); }
        if (val){ val.setAttribute('x', x); val.textContent = disp; }
        mk.style.opacity = 1;
      }
    }
    setStatus(disp, color);
    box.querySelector('.lv-time').textContent = new Date().toLocaleString();
  }
  fetch('/api.php?coin=BTC&mode=buy')
    .then(function(r){ return r.json(); })
    .then(function(d){
      // realized-price 특수 계산: (price - realized_price)/realized_price*100
      if (field === 'computed.realized_premium'){
        if (d.price && d.realized_price){
          var prem = (d.price - d.realized_price) / d.realized_price * 100;
          render({computed:{realized_premium: prem}});
        }
        return;
      }
      render(d);
    })
    .catch(function(){ box.querySelector('.lv-time').textContent = '–'; });
})();
</script>
<?php endif; ?>

<?php require __DIR__ . '/_guide_foot.php';
