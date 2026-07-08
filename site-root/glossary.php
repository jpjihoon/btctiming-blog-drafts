<?php
// BTCtiming.com — 온체인 지표 용어사전 (허브 + 개별 지표 겸용)
// URL: /glossary            → 허브(전체 지표 목록)
//      /glossary/{slug}     → 개별 지표 상세 (.htaccess가 ?term=slug 로 전달)
header('Content-Type: text/html; charset=utf-8');
$baseUrl = 'https://btctiming.com';

$GLOSSARY = require __DIR__ . '/glossary_data.php';

// 언어 결정(공용 헤더와 동일 규칙) — 제목/canonical 구성을 위해 미리 확정
$__gLang = (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) ? $_GET['lang'] : 'ko';

// 요청된 지표(term)
$term = isset($_GET['term']) ? preg_replace('/[^a-z0-9\-]/', '', $_GET['term']) : '';
$isDetail = ($term !== '' && isset($GLOSSARY[$term]));

// 카테고리 라벨(9개 언어)
$CAT_LABEL = [
  'onchain'       => ['ko'=>'온체인 밸류에이션','en'=>'On-Chain Valuation','ja'=>'オンチェーン評価','es'=>'Valoración On-Chain','de'=>'On-Chain-Bewertung','fr'=>'Valorisation On-Chain','pt'=>'Avaliação On-Chain','tr'=>'Zincir Üstü Değerleme','vi'=>'Định giá On-Chain'],
  'miner'         => ['ko'=>'채굴·심리','en'=>'Miner / Sentiment','ja'=>'マイナー・センチメント','es'=>'Minería / Sentimiento','de'=>'Miner / Sentiment','fr'=>'Mineurs / Sentiment','pt'=>'Mineração / Sentimento','tr'=>'Madenci / Duyarlılık','vi'=>'Thợ đào / Tâm lý'],
  'institutional' => ['ko'=>'기관 흐름','en'=>'Institutional Flow','ja'=>'機関投資家フロー','es'=>'Flujo Institucional','de'=>'Institutioneller Fluss','fr'=>'Flux institutionnel','pt'=>'Fluxo Institucional','tr'=>'Kurumsal Akış','vi'=>'Dòng tiền tổ chức'],
  'cycle'         => ['ko'=>'사이클 위치','en'=>'Cycle Position','ja'=>'サイクル位置','es'=>'Posición del Ciclo','de'=>'Zyklusposition','fr'=>'Position du cycle','pt'=>'Posição do Ciclo','tr'=>'Döngü Konumu','vi'=>'Vị trí chu kỳ'],
  'altcoin'       => ['ko'=>'알트코인 지표','en'=>'Altcoin Metrics','ja'=>'アルトコイン指標','es'=>'Métricas de Altcoins','de'=>'Altcoin-Metriken','fr'=>'Indicateurs Altcoins','pt'=>'Métricas de Altcoins','tr'=>'Altcoin Metrikleri','vi'=>'Chỉ số Altcoin'],
];
$CAT_ORDER = ['onchain','miner','institutional','cycle','altcoin'];

// "~란?" 제목 패턴(SEO용)
$TITLE_PAT = [
  'ko'=>'%s란? 뜻과 활용법','en'=>'What is %s? Meaning & How to Use','ja'=>'%sとは？意味と使い方',
  'es'=>'¿Qué es %s? Significado y uso','de'=>'Was ist %s? Bedeutung & Nutzung','fr'=>'Qu\'est-ce que %s ? Signification et usage',
  'pt'=>'O que é %s? Significado e uso','tr'=>'%s nedir? Anlamı ve kullanımı','vi'=>'%s là gì? Ý nghĩa và cách dùng',
];
// 허브 제목/설명
$HUB_TITLE = ['ko'=>'비트코인 온체인 지표 용어사전','en'=>'Bitcoin On-Chain Indicator Glossary','ja'=>'ビットコイン・オンチェーン指標用語集','es'=>'Glosario de Indicadores On-Chain de Bitcoin','de'=>'Bitcoin On-Chain-Indikator-Glossar','fr'=>'Glossaire des indicateurs on-chain Bitcoin','pt'=>'Glossário de Indicadores On-Chain do Bitcoin','tr'=>'Bitcoin Zincir Üstü Gösterge Sözlüğü','vi'=>'Từ điển chỉ báo on-chain Bitcoin'];
$HUB_DESC = ['ko'=>'MVRV, NUPL, SOPR, 해시리본 등 비트코인 온체인 지표를 쉽게 풀어 설명합니다. 각 지표의 뜻과 매수·매도 타이밍 활용법을 정리했습니다.','en'=>'Clear explanations of Bitcoin on-chain indicators like MVRV, NUPL, SOPR, and Hash Ribbon — what each means and how to use them for buy/sell timing.','ja'=>'MVRV、NUPL、SOPR、ハッシュリボンなどのビットコイン・オンチェーン指標をわかりやすく解説。各指標の意味と売買タイミングへの活用法をまとめました。','es'=>'Explicaciones claras de los indicadores on-chain de Bitcoin como MVRV, NUPL, SOPR y Hash Ribbon: qué significan y cómo usarlos para el timing de compra/venta.','de'=>'Verständliche Erklärungen von Bitcoin-On-Chain-Indikatoren wie MVRV, NUPL, SOPR und Hash Ribbon — was sie bedeuten und wie man sie für das Kauf-/Verkaufs-Timing nutzt.','fr'=>'Explications claires des indicateurs on-chain du Bitcoin comme MVRV, NUPL, SOPR et Hash Ribbon : leur signification et leur usage pour le timing d\'achat/vente.','pt'=>'Explicações claras dos indicadores on-chain do Bitcoin como MVRV, NUPL, SOPR e Hash Ribbon — o que significam e como usá-los para o timing de compra/venda.','tr'=>'MVRV, NUPL, SOPR ve Hash Ribbon gibi Bitcoin zincir üstü göstergelerinin anlaşılır açıklamaları — ne anlama geldikleri ve alım/satım zamanlamasında nasıl kullanılacağı.','vi'=>'Giải thích rõ ràng các chỉ báo on-chain của Bitcoin như MVRV, NUPL, SOPR và Hash Ribbon — ý nghĩa và cách dùng để canh thời điểm mua/bán.'];

// UI 문구
$T_ALL       = ['ko'=>'전체 지표','en'=>'All Indicators','ja'=>'すべての指標','es'=>'Todos los indicadores','de'=>'Alle Indikatoren','fr'=>'Tous les indicateurs','pt'=>'Todos os indicadores','tr'=>'Tüm göstergeler','vi'=>'Tất cả chỉ báo'];
$T_BACKHUB   = ['ko'=>'← 용어사전 전체 보기','en'=>'← All terms','ja'=>'← 用語集トップ','es'=>'← Todos los términos','de'=>'← Alle Begriffe','fr'=>'← Tous les termes','pt'=>'← Todos os termos','tr'=>'← Tüm terimler','vi'=>'← Tất cả thuật ngữ'];
$T_LIVE      = ['ko'=>'실시간 점수 보기 →','en'=>'See live score →','ja'=>'リアルタイムスコアを見る →','es'=>'Ver puntuación en vivo →','de'=>'Live-Score ansehen →','fr'=>'Voir le score en direct →','pt'=>'Ver pontuação ao vivo →','tr'=>'Canlı skoru gör →','vi'=>'Xem điểm trực tiếp →'];
$T_HOWREAD   = ['ko'=>'구간별 해석','en'=>'How to read it','ja'=>'レンジ別の読み方','es'=>'Cómo interpretarlo','de'=>'So liest man ihn','fr'=>'Comment le lire','pt'=>'Como interpretar','tr'=>'Nasıl okunur','vi'=>'Cách đọc'];
$T_RELATED   = ['ko'=>'다른 지표','en'=>'Other Indicators','ja'=>'他の指標','es'=>'Otros indicadores','de'=>'Weitere Indikatoren','fr'=>'Autres indicateurs','pt'=>'Outros indicadores','tr'=>'Diğer göstergeler','vi'=>'Chỉ báo khác'];

$termSuffix = ($__gLang === 'ko') ? '' : ('?lang=' . $__gLang);
$L = fn($arr) => $arr[$__gLang] ?? $arr['en'];

if ($isDetail) {
  $G = $GLOSSARY[$term];
  $nm = $G['name'][$__gLang] ?? $G['name']['en'];
  $GUIDE_TITLE = sprintf($L($TITLE_PAT), $nm) . ' | BTCtiming.com';
  $descPlain = $G['desc'][$__gLang] ?? $G['desc']['en'];
  $GUIDE_DESC = mb_substr(str_replace(['\\n','•'], [' ',''], $descPlain), 0, 150);
  $GUIDE_CANONICAL = $baseUrl . '/glossary/' . $term . $termSuffix;
} else {
  $GUIDE_TITLE = $L($HUB_TITLE) . ' | BTCtiming.com';
  $GUIDE_DESC = $L($HUB_DESC);
  $GUIDE_CANONICAL = $baseUrl . '/glossary' . $termSuffix;
}

$GUIDE_EXTRA_CSS = <<<CSS
.wrap{max-width:820px;margin:0 auto;padding:44px 22px 100px}
h1{font-size:1.9rem;font-weight:800;line-height:1.25;margin-bottom:10px;color:#fafafa}
.lead{font-size:14px;color:#a1a1aa;line-height:1.7;margin-bottom:32px}
.gsec{margin:34px 0 12px;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#f7931a}
.gcards{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px}
.gcard{display:block;background:#151517;border:1px solid var(--b1,rgba(255,255,255,.07));border-radius:12px;padding:15px 16px;text-decoration:none;transition:border-color .15s,transform .1s}
.gcard:hover{border-color:#f7931a;transform:translateY(-1px)}
.gcard b{display:block;color:#fafafa;font-size:14.5px;margin-bottom:4px}
.gcard span{display:block;color:#8b8b93;font-size:12px;line-height:1.5;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.dtop{font-size:12px;color:#8b8b93;margin-bottom:14px}
.dtop a{color:#8b8b93;text-decoration:none}
.dtop a:hover{color:#f7931a}
.dcat{display:inline-block;font-size:11px;font-weight:700;color:#f7931a;background:rgba(247,147,26,.1);border-radius:6px;padding:3px 9px;margin-bottom:12px}
.ddesc{font-size:15px;color:#d4d4d8;line-height:1.8;margin:6px 0 8px}
.granges{list-style:none;margin:14px 0 8px;padding:0}
.granges li{position:relative;padding:8px 0 8px 20px;border-top:1px solid rgba(255,255,255,.05);color:#c4c4cc;font-size:14px;line-height:1.6}
.granges li:before{content:'▸';position:absolute;left:0;color:#f7931a}
.gh2{font-size:1.05rem;font-weight:700;color:#fafafa;margin:26px 0 8px}
.gcta{display:inline-block;margin:22px 0 8px;padding:11px 18px;background:#f7931a;color:#000;font-weight:700;font-size:14px;border-radius:10px;text-decoration:none}
.gcta:hover{background:#ffa733}
.gother{display:flex;flex-wrap:wrap;gap:8px;margin-top:14px}
.gother a{font-size:12.5px;color:#c4c4cc;background:#151517;border:1px solid rgba(255,255,255,.07);border-radius:8px;padding:6px 12px;text-decoration:none}
.gother a:hover{border-color:#f7931a;color:#f7931a}
.pagefoot{margin-top:52px;padding-top:22px;border-top:1px solid rgba(255,255,255,.07);font-size:12.5px;color:#71717a;display:flex;gap:18px;flex-wrap:wrap}
.pagefoot a{color:#71717a;text-decoration:underline}
CSS;

require __DIR__ . '/_guide_head.php';

// desc의 리터럴 \n 을 [리드문단, 구간 li[]] 로 분리
function glossary_parse_desc(string $raw): array {
  $parts = preg_split('/\\\\n/', $raw); // 리터럴 \n 분리
  $parts = array_values(array_filter(array_map('trim', $parts), fn($x) => $x !== ''));
  $lead = ''; $items = [];
  foreach ($parts as $p) {
    if (mb_strpos($p, '•') === 0 || mb_strpos($p, '•') !== false && mb_strpos($p, '•') < 2) {
      $items[] = ltrim($p, "• \t");
    } elseif ($items) {
      $items[] = $p; // 구간 목록 시작 후엔 이어지는 줄도 항목으로
    } else {
      $lead .= ($lead ? ' ' : '') . $p;
    }
  }
  return [$lead, $items];
}
?>

<div class="wrap">
<?php if ($isDetail):
  [$lead, $ranges] = glossary_parse_desc($G['desc'][$__gLang] ?? $G['desc']['en'] ?? '');
?>
  <div class="dtop"><a href="/glossary<?= gh($termSuffix) ?>"><?= gh($L($T_BACKHUB)) ?></a></div>
  <div class="dcat"><?= gh($L($CAT_LABEL[$G['category']])) ?></div>
  <h1><?= gh(sprintf($L($TITLE_PAT), $nm)) ?></h1>
  <?php if ($lead): ?><p class="ddesc"><?= gh($lead) ?></p><?php endif; ?>
  <?php if ($ranges): ?>
    <h2 class="gh2"><?= gh($L($T_HOWREAD)) ?></h2>
    <ul class="granges"><?php foreach ($ranges as $r): ?><li><?= gh($r) ?></li><?php endforeach; ?></ul>
  <?php endif; ?>

  <a class="gcta" href="/<?= gh($termSuffix) ?>"><?= gh($L($T_LIVE)) ?></a>

  <h2 class="gh2"><?= gh($L($T_RELATED)) ?></h2>
  <div class="gother">
    <?php $n=0; foreach ($GLOSSARY as $s => $g): if ($s === $term) continue; if ($n++ >= 8) break;
      $rn = $g['name'][$__gLang] ?? $g['name']['en']; ?>
      <a href="/glossary/<?= gh($s) ?><?= gh($termSuffix) ?>"><?= gh($rn) ?></a>
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
        $nm = $g['name'][$__gLang] ?? $g['name']['en'];
        [$lead, ] = glossary_parse_desc($g['desc'][$__gLang] ?? $g['desc']['en'] ?? ''); ?>
        <a class="gcard" href="/glossary/<?= gh($s) ?><?= gh($termSuffix) ?>">
          <b><?= gh($nm) ?></b>
          <span><?= gh(mb_substr($lead, 0, 70)) ?></span>
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

<?php require __DIR__ . '/_guide_foot.php';
