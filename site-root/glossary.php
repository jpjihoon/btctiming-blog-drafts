<?php
// BTCtiming.com — 온체인 지표 용어사전 v3 (허브 + 개별, 시각화+실시간)
// URL: /glossary → 허브 / /glossary/{slug} → 개별 (.htaccess가 ?term=slug 전달)
header('Content-Type: text/html; charset=utf-8');
$baseUrl = 'https://btctiming.com';

// SUPPORTED_LANGS 등 공용 상수/함수를 먼저 확보 (아래 언어 판정에서 즉시 사용)
require_once __DIR__ . '/config.php';

$GLOSSARY = require __DIR__ . '/glossary_data.php';
require __DIR__ . '/glossary_gauge.php';

// 언어 결정(공용 규칙): URL ?lang 우선 → 없으면 쿠키(마지막 선택) → ko
// 쿠키를 보기 때문에, 뒤로가기로 lang 없는 URL에 와도 서버가 마지막 선택 언어로 렌더한다.
// (그래서 JS로 다시 로드해 고칠 필요가 없어 히스토리가 꼬이지 않는다.)
$__gLang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
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
// 카테고리별 accent 색상 — 목록에서 그룹을 시각적으로 구분(정보를 색으로 인코딩)
$CAT_COLOR = [
  'onchain'       => '#f7931a',
  'miner'         => '#2dd4bf',
  'institutional' => '#a78bfa',
  'cycle'         => '#22c55e',
  'altcoin'       => '#f472b6',
];

$TITLE_PAT = ['ko'=>'%s란? 뜻과 활용법','en'=>'What is %s? Meaning & How to Use','ja'=>'%sとは？意味と使い方','es'=>'¿Qué es %s? Significado y uso','de'=>'Was ist %s? Bedeutung & Nutzung','fr'=>'Qu\'est-ce que %s ? Signification et usage','pt'=>'O que é %s? Significado e uso','tr'=>'%s nedir? Anlamı ve kullanımı','vi'=>'%s là gì? Ý nghĩa và cách dùng'];
$HUB_TITLE = ['ko'=>'비트코인 온체인 지표 용어사전','en'=>'Bitcoin On-Chain Indicator Glossary','ja'=>'ビットコイン・オンチェーン指標用語集','es'=>'Glosario de Indicadores On-Chain de Bitcoin','de'=>'Bitcoin On-Chain-Indikator-Glossar','fr'=>'Glossaire des indicateurs on-chain Bitcoin','pt'=>'Glossário de Indicadores On-Chain do Bitcoin','tr'=>'Bitcoin Zincir Üstü Gösterge Sözlüğü','vi'=>'Từ điển chỉ báo on-chain Bitcoin'];
$HUB_DESC = ['ko'=>'MVRV, NUPL, SOPR, 해시리본 등 비트코인 온체인 지표를 시각화와 실시간 값으로 쉽게 설명합니다. 각 지표의 뜻과 매수·매도 타이밍 활용법을 정리했습니다.','en'=>'Bitcoin on-chain indicators like MVRV, NUPL, SOPR, and Hash Ribbon explained with visuals and live values — what each means and how to use it for buy/sell timing.','ja'=>'MVRV、NUPL、SOPR、ハッシュリボンなどのビットコイン・オンチェーン指標を視覚化とリアルタイム値でわかりやすく解説。各指標の意味と売買タイミングへの活用法をまとめました。','es'=>'Indicadores on-chain de Bitcoin como MVRV, NUPL, SOPR y Hash Ribbon explicados con visuales y valores en vivo: qué significan y cómo usarlos para el timing de compra/venta.','de'=>'Bitcoin-On-Chain-Indikatoren wie MVRV, NUPL, SOPR und Hash Ribbon mit Grafiken und Live-Werten erklärt — was sie bedeuten und wie man sie für das Kauf-/Verkaufs-Timing nutzt.','fr'=>'Les indicateurs on-chain du Bitcoin comme MVRV, NUPL, SOPR et Hash Ribbon expliqués avec des visuels et des valeurs en direct : leur signification et leur usage pour le timing d\'achat/vente.','pt'=>'Indicadores on-chain do Bitcoin como MVRV, NUPL, SOPR e Hash Ribbon explicados com visuais e valores ao vivo — o que significam e como usá-los para o timing de compra/venda.','tr'=>'MVRV, NUPL, SOPR ve Hash Ribbon gibi Bitcoin zincir üstü göstergeleri görseller ve canlı değerlerle açıklanır — ne anlama geldikleri ve alım/satım zamanlamasında nasıl kullanılacağı.','vi'=>'Các chỉ báo on-chain của Bitcoin như MVRV, NUPL, SOPR và Hash Ribbon được giải thích bằng hình ảnh và giá trị trực tiếp — ý nghĩa và cách dùng để canh thời điểm mua/bán.'];

$T_BACKHUB = ['ko'=>'← 용어사전 전체','en'=>'← All terms','ja'=>'← 用語集トップ','es'=>'← Todos los términos','de'=>'← Alle Begriffe','fr'=>'← Tous les termes','pt'=>'← Todos os termos','tr'=>'← Tüm terimler','vi'=>'← Tất cả thuật ngữ'];
$T_WHAT    = ['ko'=>'먼저, 이게 뭔가요?','en'=>'First, what is it?','ja'=>'まず、これは何ですか？','es'=>'Primero, ¿qué es?','de'=>'Zuerst: Was ist das?','fr'=>'D\'abord, qu\'est-ce que c\'est ?','pt'=>'Primeiro, o que é?','tr'=>'Önce, bu nedir?','vi'=>'Trước tiên, đây là gì?'];
$T_RANGES  = ['ko'=>'지금은 어느 구간일까?','en'=>'Which zone are we in?','ja'=>'今はどのレンジ？','es'=>'¿En qué zona estamos?','de'=>'In welcher Zone sind wir?','fr'=>'Dans quelle zone sommes-nous ?','pt'=>'Em que zona estamos?','tr'=>'Hangi bölgedeyiz?','vi'=>'Chúng ta đang ở vùng nào?'];
$T_HOWUSE  = ['ko'=>'실전에서 어떻게 쓰나','en'=>'How to use it','ja'=>'実戦での使い方','es'=>'Cómo usarlo','de'=>'Wie man ihn nutzt','fr'=>'Comment l\'utiliser','pt'=>'Como usar','tr'=>'Nasıl kullanılır','vi'=>'Cách sử dụng'];
$T_LIMITS  = ['ko'=>'맹신하면 안 되는 이유','en'=>'Why not to rely on it blindly','ja'=>'盲信してはいけない理由','es'=>'Por qué no confiar ciegamente','de'=>'Warum nicht blind vertrauen','fr'=>'Pourquoi ne pas s\'y fier aveuglément','pt'=>'Por que não confiar cegamente','tr'=>'Neden körü körüne güvenilmemeli','vi'=>'Vì sao không nên tin tưởng mù quáng'];
$T_RELATED = ['ko'=>'관련 지표','en'=>'Related Indicators','ja'=>'関連指標','es'=>'Indicadores relacionados','de'=>'Verwandte Indikatoren','fr'=>'Indicateurs liés','pt'=>'Indicadores relacionados','tr'=>'İlgili göstergeler','vi'=>'Chỉ báo liên quan'];
$T_CTA     = ['ko'=>'실시간 분석 보러가기 →','en'=>'Go to Live Analysis →','ja'=>'リアルタイム分析を見る →','es'=>'Ver Análisis en Vivo →','de'=>'Live-Analyse ansehen →','fr'=>'Voir l\'analyse en direct →','pt'=>'Ver análise ao vivo →','tr'=>'Canlı analizi gör →','vi'=>'Xem phân tích trực tiếp →'];
$T_CTA_H   = ['ko'=>'실시간 타이밍 점수 대시보드','en'=>'The live timing score dashboard','ja'=>'リアルタイム・タイミングスコア ダッシュボード','es'=>'Panel de puntuación de timing en vivo','de'=>'Das Live-Timing-Score-Dashboard','fr'=>'Le tableau de bord des scores de timing en direct','pt'=>'O painel de pontuação de timing ao vivo','tr'=>'Canlı zamanlama puanı panosu','vi'=>'Bảng điểm thời điểm trực tiếp'];
$T_CTA_P   = ['ko'=>'온체인·기술 지표를 종합해 비트코인과 알트코인의 매수·매도 타이밍을 0~10점으로 산출합니다. 지금 시장이 어느 국면에 있는지 대시보드에서 볼 수 있습니다.','en'=>'It combines on-chain and technical indicators into a 0–10 buy/sell timing score for Bitcoin and major altcoins, so you can see which phase the market is in right now.','ja'=>'オンチェーン・テクニカル指標を統合し、ビットコインと主要アルトコインの売買タイミングを0〜10点で算出します。今の市場がどの局面かをダッシュボードで確認できます。','es'=>'Combina indicadores on-chain y técnicos en una puntuación de compra/venta de 0 a 10 para Bitcoin y las principales altcoins, para ver en qué fase está el mercado ahora.','de'=>'Es fasst On-Chain- und technische Indikatoren zu einem Kauf-/Verkaufs-Timing-Score von 0 bis 10 für Bitcoin und große Altcoins zusammen, damit du siehst, in welcher Phase sich der Markt gerade befindet.','fr'=>'Il combine des indicateurs on-chain et techniques en un score de timing d\'achat/vente de 0 à 10 pour le Bitcoin et les principales altcoins, pour voir dans quelle phase se trouve le marché.','pt'=>'Combina indicadores on-chain e técnicos em uma pontuação de compra/venda de 0 a 10 para Bitcoin e as principais altcoins, para ver em que fase o mercado está agora.','tr'=>'Zincir üstü ve teknik göstergeleri Bitcoin ve başlıca altcoinler için 0–10 alım/satım zamanlama puanında birleştirir; piyasanın şu an hangi aşamada olduğunu görebilirsiniz.','vi'=>'Kết hợp các chỉ báo on-chain và kỹ thuật thành điểm thời điểm mua/bán từ 0–10 cho Bitcoin và các altcoin chính, để bạn thấy thị trường đang ở giai đoạn nào.'];
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
  $GUIDE_KOPATH = '/glossary/' . $term;
} else {
  $GUIDE_TITLE = $L($HUB_TITLE) . ' | BTCtiming.com';
  $GUIDE_DESC = $L($HUB_DESC);
  $GUIDE_KOPATH = '/glossary';
}

$GUIDE_EXTRA_CSS = <<<CSS
.wrap{max-width:800px;margin:0 auto;padding:40px 22px 100px}
h1{font-size:1.8rem;font-weight:800;line-height:1.28;margin-bottom:8px;color:#f2f2f5}
.lead{font-size:14px;color:#9a9aa4;line-height:1.7;margin-bottom:30px}
.dtop{font-size:12px;color:#8b8b93;margin-bottom:14px}
.dtop a{color:#8b8b93;text-decoration:none}
.dtop a:hover{color:#f7931a}
.dcat{display:inline-block;font-size:11px;font-weight:700;color:#f7931a;background:rgba(247,147,26,.1);border-radius:6px;padding:3px 9px;margin-bottom:10px}
.oneliner{font-size:15.5px;color:#f2f2f5;font-weight:600;border-left:3px solid #f7931a;padding:9px 15px;margin:14px 0 6px;background:rgba(247,147,26,.05)}
.gh2{font-size:1.12rem;font-weight:700;color:#f2f2f5;margin:36px 0 12px;display:flex;align-items:center;gap:9px}
.gh2:before{content:'';width:4px;height:18px;background:#f7931a;border-radius:2px}
.gp{margin:0 0 14px;color:#c9c9d1;font-size:15px;line-height:1.8}
.gp.lead-p{color:#f2f2f5}
.svgbox{background:#141418;border:1px solid var(--b1,rgba(255,255,255,.07));border-radius:14px;padding:18px;margin:22px 0}
.svgcap{font-size:12px;color:#71717a;text-align:center;margin-top:8px}
.live{background:linear-gradient(135deg,#1b1b21,#24242b);border:1px solid rgba(247,147,26,.25);border-radius:14px;padding:19px 21px;margin:22px 0}
.live-top{display:flex;align-items:baseline;justify-content:space-between;flex-wrap:wrap;gap:8px}
.live-label{font-size:12px;color:#9a9aa4;font-weight:600}
.live-val{font-size:2.3rem;font-weight:800;color:#fff;line-height:1.15}
.live-status{font-size:14px;font-weight:700;padding:5px 13px;border-radius:8px;background:rgba(113,113,122,.15);color:#9a9aa4}
.live-time{font-size:11px;color:#52525b;margin-top:9px}
.rtable{width:100%;border-collapse:collapse;margin:8px 0;font-size:13.5px}
.rtable th,.rtable td{text-align:left;padding:10px 12px;border-bottom:1px solid rgba(255,255,255,.07);vertical-align:top}
.rtable th{color:#8b8b93;font-size:11px;text-transform:uppercase;letter-spacing:.04em}
.rtable td.rg{font-weight:700;white-space:nowrap;width:22%}
.rtable td.sg{color:#f2f2f5;font-weight:600;white-space:nowrap;width:16%;text-align:right}
.warn-box{background:rgba(220,38,38,.05);border:1px solid rgba(220,38,38,.2);border-radius:12px;padding:14px 18px;margin:12px 0}
.warn-item{font-size:14.5px;color:#d4b0b0;padding:8px 0 8px 24px;position:relative;line-height:1.75}
.warn-item:before{content:'\\26A0';position:absolute;left:0;color:#ef4444}
.gcta-box{display:flex;align-items:center;justify-content:space-between;gap:24px;margin:24px 0 6px;padding:20px 24px;background:#16161b;border:1px solid rgba(255,255,255,.08);border-radius:12px}
.gcta-tx{min-width:0}
.gcta-h{font-size:1rem;font-weight:700;color:#f2f2f5;line-height:1.35;margin:0 0 4px}
.gcta-p{font-size:13px;color:#8b8b93;line-height:1.5;margin:0}
.gcta-link{flex-shrink:0;color:#f7931a;font-weight:700;font-size:13px;text-decoration:none;white-space:nowrap;padding:9px 16px;border:1px solid rgba(247,147,26,.3);border-radius:8px;transition:background .12s,border-color .12s}
.gcta-link:hover{background:rgba(247,147,26,.1);border-color:rgba(247,147,26,.55);text-decoration:none}
@media(max-width:600px){.gcta-box{flex-direction:column;align-items:flex-start;gap:14px}.gcta-link{align-self:stretch;text-align:center}}
.gother{display:flex;flex-wrap:wrap;gap:8px;margin-top:14px}
.gother a{font-size:12.5px;color:#c4c4cc;background:#1b1b21;border:1px solid rgba(255,255,255,.07);border-radius:8px;padding:6px 12px;text-decoration:none}
.gother a:hover{border-color:#f7931a;color:#f7931a}
.gsec{margin:34px 0 12px;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#f7931a}
/* ── 허브 리디자인 (단색) ── */
.ghub-head{display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-bottom:16px}
.ghub-stats{display:flex;gap:8px;flex-shrink:0}
.ghub-stat{text-align:center;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.07);border-radius:10px;padding:9px 15px}
.ghub-stat b{display:block;font-size:22px;font-weight:700;color:#f2f2f5;line-height:1}
.ghub-stat span{font-size:10px;color:#71717a;margin-top:4px;display:block}
.gsearch{position:relative;margin:2px 0 14px}
.gsearch .gs-ic{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#6b6b73;display:flex}
.gsearch input{width:100%;box-sizing:border-box;background:#15151a;border:1px solid rgba(255,255,255,.1);border-radius:9px;padding:10px 12px 10px 36px;color:#e5e5ea;font-size:13.5px;outline:none}
.gsearch input:focus{border-color:rgba(247,147,26,.55)}
.gchips{display:flex;gap:7px;flex-wrap:wrap;margin-bottom:22px}
.gchip{font-size:12.5px;color:#a1a1aa;background:transparent;border:1px solid rgba(255,255,255,.12);border-radius:20px;padding:6px 14px;cursor:pointer;transition:.12s;user-select:none}
.gchip:hover{color:#e5e5ea;border-color:rgba(255,255,255,.28)}
.gchip.on{background:rgba(247,147,26,.14);border-color:#f7931a;color:#f7931a}
.gcatsec{margin-bottom:22px}
.gcathead{display:flex;align-items:center;gap:9px;margin-bottom:12px}
.gcatname{font-size:11px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:#9a9aa2}
.gcatnum{font-size:11px;color:#55555c}
.gcatline{flex:1;height:1px;background:rgba(255,255,255,.06)}
.gcards{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:10px;align-items:start}
.gcard{display:block;background:#15151a;border:1px solid rgba(255,255,255,.07);border-radius:11px;padding:13px 14px;text-decoration:none;transition:background .14s,border-color .14s}
.gcard:hover{background:#1a1a20;border-color:rgba(247,147,26,.4);text-decoration:none}
.gcard-top{display:flex;align-items:center;justify-content:space-between;gap:8px}
.gcard-top b{color:#f2f2f5;font-size:14px;font-weight:600}
.gc-right{display:flex;align-items:center;gap:6px;flex-shrink:0}
.garw{color:#f7931a;font-style:normal;font-size:15px;line-height:1;opacity:0;transform:translateX(-3px);transition:opacity .15s,transform .15s}
.gcard:hover .garw{opacity:1;transform:translateX(0)}
.gc-live{font-size:10px;letter-spacing:.03em;color:#8a8a93;display:inline-flex;align-items:center;gap:4px;white-space:nowrap;flex-shrink:0}
.gc-live i{width:5px;height:5px;border-radius:50%;background:#f7931a;display:inline-block}
.gc-concept{font-size:10px;color:#6b6b73;border:1px solid rgba(255,255,255,.1);border-radius:5px;padding:2px 7px;white-space:nowrap;flex-shrink:0}
.gcard-one{display:block;color:#82828b;font-size:12px;line-height:1.5;margin-top:4px}
.gc-foot{display:flex;align-items:center;gap:11px;margin-top:9px;min-height:16px}
.gc-val{font-size:15px;font-weight:600;color:#e9e9ee;font-variant-numeric:tabular-nums;white-space:nowrap}
.gc-track{position:relative;flex:1;height:5px;border-radius:3px;background:rgba(255,255,255,.09)}
.gc-fill{position:absolute;left:0;top:0;height:100%;border-radius:3px;background:rgba(247,147,26,.35)}
.gc-mark{position:absolute;top:-3px;width:2px;height:11px;border-radius:2px;background:#f7931a;transform:translateX(-50%)}
.gc-state{font-size:11px;font-weight:500;color:#c9c9d0;border:1px solid rgba(255,255,255,.14);padding:3px 9px;border-radius:6px}
.gc-hint{font-size:11px;color:#55555c}
.gcard.gc-hidden,.gcatsec.gc-hidden{display:none}
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

// 개별 지표 뷰페이지: 상단 nav-back을 '용어사전 목록'으로 (허브/기타 안내 페이지는 기본값 유지)
if ($isDetail) {
  $GUIDE_NAVBACK = [
    'href' => '/glossary' . $termSuffix,
    'labels' => ['ko'=>'← 용어사전 목록','en'=>'← Glossary','ja'=>'← 用語集','es'=>'← Glosario','de'=>'← Glossar','fr'=>'← Glossaire','pt'=>'← Glossário','tr'=>'← Sözlük','vi'=>'← Từ điển'],
  ];
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

  <div class="gcta-box">
    <div class="gcta-tx">
      <div class="gcta-h"><?= gh($L($T_CTA_H)) ?></div>
      <div class="gcta-p"><?= gh($L($T_CTA_P)) ?></div>
    </div>
    <a class="gcta-link" href="/<?= gh($termSuffix) ?>"><?= gh($L($T_CTA)) ?></a>
  </div>

  <h2 class="gh2"><?= gh($L($T_RELATED)) ?></h2>
  <div class="gother">
    <?php foreach ($i['related'] as $rs): if (!isset($GLOSSARY[$rs])) continue;
      $rn = $GLOSSARY[$rs]['i18n'][$__gLang]['term_full'] ?? $GLOSSARY[$rs]['i18n']['en']['term_full']; ?>
      <a href="/glossary/<?= gh($rs) ?><?= gh($termSuffix) ?>"><?= gh($rn) ?></a>
    <?php endforeach; ?>
  </div>

<?php else: // ── 허브 ── ?>
  <?php
    $__liveCount = 0;
    foreach ($GLOSSARY as $__g) { if (!empty($__g['live_field'])) $__liveCount++; }
    $__ui = [
      'n_ind'  => ['ko'=>'지표','en'=>'indicators','ja'=>'指標','es'=>'indicadores','de'=>'Indikatoren','fr'=>'indicateurs','pt'=>'indicadores','tr'=>'gösterge','vi'=>'chỉ báo'],
      'n_live' => ['ko'=>'실시간','en'=>'live','ja'=>'リアルタイム','es'=>'en vivo','de'=>'live','fr'=>'en direct','pt'=>'ao vivo','tr'=>'canlı','vi'=>'trực tiếp'],
      'all'    => ['ko'=>'전체','en'=>'All','ja'=>'すべて','es'=>'Todos','de'=>'Alle','fr'=>'Tous','pt'=>'Todos','tr'=>'Tümü','vi'=>'Tất cả'],
      'live'   => ['ko'=>'실시간','en'=>'Live','ja'=>'リアルタイム','es'=>'En vivo','de'=>'Live','fr'=>'En direct','pt'=>'Ao vivo','tr'=>'Canlı','vi'=>'Trực tiếp'],
      'concept'=> ['ko'=>'개념','en'=>'Concept','ja'=>'概念','es'=>'Concepto','de'=>'Konzept','fr'=>'Concept','pt'=>'Conceito','tr'=>'Kavram','vi'=>'Khái niệm'],
      'more'   => ['ko'=>'게이지 · 개념도 · 활용법','en'=>'Gauge · diagram · how-to','ja'=>'ゲージ · 概念図 · 使い方','es'=>'Medidor · diagrama · uso','de'=>'Anzeige · Diagramm · Nutzung','fr'=>'Jauge · schéma · usage','pt'=>'Medidor · diagrama · uso','tr'=>'Gösterge · şema · kullanım','vi'=>'Đồng hồ · sơ đồ · cách dùng'],
      'search' => ['ko'=>'지표 검색 — MVRV, 도미넌스, RSI…','en'=>'Search indicators — MVRV, dominance, RSI…','ja'=>'指標を検索 — MVRV, ドミナンス, RSI…','es'=>'Buscar — MVRV, dominancia, RSI…','de'=>'Suchen — MVRV, Dominanz, RSI…','fr'=>'Rechercher — MVRV, dominance, RSI…','pt'=>'Buscar — MVRV, dominância, RSI…','tr'=>'Ara — MVRV, dominans, RSI…','vi'=>'Tìm — MVRV, thống trị, RSI…'],
    ];
  ?>
  <div class="ghub-head">
    <div>
      <h1><?= gh($L($HUB_TITLE)) ?></h1>
      <p class="lead" style="margin-bottom:0"><?= gh($L($HUB_DESC)) ?></p>
    </div>
    <div class="ghub-stats">
      <div class="ghub-stat"><b><?= count($GLOSSARY) ?></b><span><?= gh($L($__ui['n_ind'])) ?></span></div>
      <?php if ($__liveCount > 0): ?><div class="ghub-stat"><b><?= $__liveCount ?></b><span><?= gh($L($__ui['n_live'])) ?></span></div><?php endif; ?>
    </div>
  </div>

  <div class="gsearch">
    <span class="gs-ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
    <input id="gSearch" type="text" autocomplete="off" placeholder="<?= gh($L($__ui['search'])) ?>">
  </div>

  <div class="gchips" id="gChips">
    <span class="gchip on" data-f="all"><?= gh($L($__ui['all'])) ?></span>
    <?php foreach ($CAT_ORDER as $cat): if (!array_filter($GLOSSARY, fn($g) => $g['category'] === $cat)) continue; ?>
      <span class="gchip" data-f="<?= gh($cat) ?>"><?= gh($L($CAT_LABEL[$cat])) ?></span>
    <?php endforeach; ?>
  </div>

  <div id="gHub">
  <?php
    $__live_js = [];
    foreach ($CAT_ORDER as $cat):
      $inCat = array_filter($GLOSSARY, fn($g) => $g['category'] === $cat);
      if (!$inCat) continue; ?>
    <div class="gcatsec" data-cat="<?= gh($cat) ?>">
      <div class="gcathead">
        <span class="gcatname"><?= gh($L($CAT_LABEL[$cat])) ?></span>
        <span class="gcatnum"><?= count($inCat) ?></span>
        <span class="gcatline"></span>
      </div>
      <div class="gcards">
        <?php foreach ($inCat as $s => $g):
          $gi = $g['i18n'][$__gLang] ?? $g['i18n']['en'];
          $isLive = !empty($g['live_field']);
          if ($isLive) {
            $gg = $g['gauge'];
            $__live_js[$s] = [
              'field'  => $g['live_field'],
              'min'    => $gg['min'],
              'max'    => $gg['max'],
              'pct'    => !empty($g['live_pct']) ? 1 : 0,
              'dec'    => $g['live_decimals'] ?? 2,
              'unit'   => $gg['unit'] ?? '',
              'status' => $g['status_map'] ?? null,
            ];
          } ?>
          <a class="gcard" data-name="<?= gh(mb_strtolower($gi['term_full'], 'UTF-8')) ?>" data-cat="<?= gh($cat) ?>" href="/glossary/<?= gh($s) ?><?= gh($termSuffix) ?>">
            <span class="gcard-top">
              <b><?= gh($gi['term_full']) ?></b>
              <span class="gc-right"><?php if ($isLive): ?><span class="gc-live"><i></i><?= gh($L($__ui['live'])) ?></span><?php else: ?><span class="gc-concept"><?= gh($L($__ui['concept'])) ?></span><?php endif; ?><i class="garw">→</i></span>
            </span>
            <span class="gcard-one"><?= gh(mb_substr($gi['one_liner'], 0, 80)) ?></span>
            <?php if ($isLive): ?><span class="gc-foot" data-live="<?= gh($s) ?>"><span class="gc-val" style="color:#55555c">…</span></span><?php else: ?><span class="gc-foot"><span class="gc-hint"><?= gh($L($__ui['more'])) ?> →</span></span><?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
  <script>window.GLOSSARY_LIVE = <?= json_encode($__live_js, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>;</script>
  <script>
  (function(){
    var HUB=document.getElementById('gHub'); if(!HUB||!window.GLOSSARY_LIVE) return;
    var LIVE=window.GLOSSARY_LIVE, curF='all', curQ='';
    function apply(){
      HUB.querySelectorAll('.gcard').forEach(function(c){
        var okF=curF==='all'||c.getAttribute('data-cat')===curF;
        var okQ=!curQ||c.getAttribute('data-name').indexOf(curQ)>=0;
        c.classList.toggle('gc-hidden', !(okF&&okQ));
      });
      HUB.querySelectorAll('.gcatsec').forEach(function(sec){
        sec.classList.toggle('gc-hidden', sec.querySelectorAll('.gcard:not(.gc-hidden)').length===0);
      });
    }
    var chips=document.getElementById('gChips');
    if(chips) chips.addEventListener('click', function(e){
      var ch=e.target.closest('.gchip'); if(!ch) return;
      chips.querySelectorAll('.gchip').forEach(function(x){x.classList.remove('on')});
      ch.classList.add('on'); curF=ch.getAttribute('data-f'); apply();
    });
    var si=document.getElementById('gSearch');
    if(si) si.addEventListener('input', function(e){ curQ=(e.target.value||'').toLowerCase().trim(); apply(); });
    function pick(d,p){ return p.split('.').reduce(function(o,k){return (o==null)?null:o[k];}, d); }
    function fill(d){
      Object.keys(LIVE).forEach(function(slug){
        var m=LIVE[slug], foot=HUB.querySelector('.gc-foot[data-live="'+slug+'"]'); if(!foot) return;
        var val;
        if(m.field==='computed.realized_premium'){ val=(d.price&&d.realized_price)?((d.price-d.realized_price)/d.realized_price*100):null; }
        else if(m.field==='computed.mayer'){ val=(d.price&&d.ma200w)?(d.price/d.ma200w):null; }
        else { val=pick(d, m.field); }
        if(m.status){
          var st=m.status[(''+val).toLowerCase()];
          foot.innerHTML='<span class="gc-state">'+(st?st[0]:(val==null?'\u2013':val))+'</span>'; return;
        }
        var num=(typeof val==='number')?val:parseFloat(val);
        if(val==null||isNaN(num)){ foot.innerHTML='<span class="gc-val" style="color:#55555c">\u2013</span>'; return; }
        var suf=m.pct?'%':(m.unit==='x'?'x':'');
        var disp=num.toFixed(m.dec)+suf;
        var pos=Math.max(0,Math.min(100,(num-m.min)/((m.max-m.min)||1)*100));
        foot.innerHTML='<span class="gc-val">'+disp+'</span><span class="gc-track"><span class="gc-fill" style="width:'+pos.toFixed(1)+'%"></span><span class="gc-mark" style="left:'+pos.toFixed(1)+'%"></span></span>';
      });
    }
    fetch('/api.php?coin=BTC&mode=buy').then(function(r){return r.json();}).then(fill).catch(function(){});
  })();
  </script>
<?php endif; ?>
</div>

<script>
// 언어 유지 방식: 사용자가 언어를 바꾸면 쿠키(blogLang)에 저장한다.
// 서버(glossary.php)가 URL ?lang 없을 때 이 쿠키를 읽어 마지막 선택 언어로 렌더하므로,
// 뒤로가기로 어떤 URL에 오든 서버가 처음부터 올바른 언어로 그린다.
// → JS가 location.replace로 다시 로드해 고칠 필요가 없다(그게 히스토리를 꼬았던 원인).
(function(){
  var RENDERED = <?= json_encode($__gLang) ?>;      // 지금 화면에 렌더된 언어
  try{ if(window.BTLang && BTLang.pathify) BTLang.pathify(RENDERED); }catch(_){}  // 모든 내부 링크를 경로형으로
  var SCROLL_KEY = 'glossaryScroll';
  var navigating = false;

  // 언어 전환으로 리로드된 직후에만 저장해둔 스크롤 위치를 복원(최상단으로 튀는 것 방지).
  var pendingScroll = null;
  try {
    var saved = sessionStorage.getItem(SCROLL_KEY);
    if (saved !== null) {
      sessionStorage.removeItem(SCROLL_KEY);
      pendingScroll = parseInt(saved, 10) || 0;
      window.scrollTo(0, pendingScroll);
    }
  } catch(_){}
  if (pendingScroll !== null) {
    window.addEventListener('load', function(){ window.scrollTo(0, pendingScroll); });
  }

  function setLangCookie(lang){
    // 저장은 공통 유틸(lang-common.js)에 위임. 단 이 인라인은 _guide_foot(공통 유틸 로드)보다
    // 먼저 실행될 수 있어, BTLang이 아직 없으면 직접 저장(폴백).
    if (window.BTLang) { window.BTLang.save(lang); return; }
    try {
      document.cookie = 'blogLang=' + encodeURIComponent(lang) +
        '; path=/; max-age=31536000; SameSite=Lax';
      localStorage.setItem('blogLang', lang);
    } catch(_){}
  }

  // 사용자가 언어를 바꿀 때(_guide_foot의 언어 선택이 이 훅을 호출)
  window.onGuideLang = function(lang){
    if (navigating) return;
    if (!lang) return;
    setLangCookie(lang);                             // 다음 페이지부터 서버가 이 언어로 렌더
    if (lang === RENDERED) return;                   // 이미 이 언어면 리로드 불필요
    navigating = true;
    try { sessionStorage.setItem(SCROLL_KEY, String(window.pageYOffset || 0)); } catch(_){}
    var target = (window.BTLang && BTLang.i18nHref)
      ? BTLang.i18nHref(location.pathname + location.search + location.hash, lang)  // 경로형(/en/glossary/term)
      : location.href;
    location.replace(target);                        // 새 언어 경로로 이동(?lang= 안 붙음)
  };

  // 진입 시: 현재 언어를 URL에 반영(뒤로가기로 이 페이지에 오면 그때 언어로 복원되게).
  // 쿠키/localStorage 저장은 안 한다 — 진입 시 저장하면 다른 페이지의 뒤로가기가 오염됨.
  if (window.BTLang) window.BTLang.stampUrl(RENDERED);
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
      // mayer-multiple 특수 계산: 현재가 / 200주 이동평균
      if (field === 'computed.mayer'){
        if (d.price && d.ma200w){
          var mayer = d.price / d.ma200w;
          render({computed:{mayer: mayer}});
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
