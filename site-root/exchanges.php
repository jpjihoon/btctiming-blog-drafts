<?php
require_once __DIR__ . '/config.php';

// 언어 결정 (index.php와 동일 규칙)
$lang = 'ko';
if (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) {
    $lang = $_GET['lang'];
}
$htmlLang = $lang;
$urlSuffix = langSuffix($lang);

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// 레퍼럴 링크
$REF_BINANCE = 'https://www.binance.com/register?ref=18678007';
$REF_BYBIT   = 'https://partner.bybit.com/b/17242';

// 다국어 문구
$T = [
  'ko' => [
    'title' => '거래소 추천 — 바이낸스 vs 바이비트 | BTCtiming',
    'desc'  => '비트코인·알트코인 선물 거래를 시작할 거래소 비교. 바이낸스와 바이비트의 특징과 수수료 혜택을 정리했습니다.',
    'h1'    => '어느 거래소로 시작할까?',
    'lead'  => 'BTCtiming의 점수를 실제 거래로 옮기려면 거래소 계정이 필요합니다. 세계적으로 가장 많이 쓰이는 두 곳을 정리했습니다. 아래 링크로 가입하면 수수료 할인 혜택을 받을 수 있습니다.',
    'binance_tag' => '세계 1위 거래량',
    'binance_desc'=> '가장 많은 코인, 가장 깊은 유동성. 현물부터 선물까지 폭넓게 지원하며 입문자용 자료도 풍부합니다.',
    'bybit_tag'   => '선물 트레이더 선호',
    'bybit_desc'  => '선물·파생상품에 강점. 빠른 체결과 직관적인 인터페이스로 단타·레버리지 트레이더에게 인기가 높습니다.',
    'feat'        => '주요 특징',
    'b1'          => ['방대한 코인 상장', '깊은 유동성', '초보자 친화적'],
    'b2'          => ['선물 특화', '빠른 체결 속도', '경쟁력 있는 수수료'],
    'cta_binance' => '바이낸스 가입하고 수수료 할인 받기',
    'cta_bybit'   => '바이비트 가입하고 수수료 할인 받기',
    'note'        => '위 링크는 제휴(레퍼럴) 링크로, 가입 시 BTCtiming에 소액의 수수료가 지급될 수 있습니다. 추가 비용은 없으며, 오히려 수수료 할인 혜택을 받습니다.',
    'risk'        => '⚠ 암호화폐 거래, 특히 선물·레버리지 거래는 높은 손실 위험을 동반합니다. BTCtiming의 점수는 정보 제공용이며 투자 조언이 아닙니다. 본인의 판단과 책임하에 거래하세요.',
    'back'        => '← BTCtiming 홈으로',
  ],
  'en' => [
    'title' => 'Best Exchange — Binance vs Bybit | BTCtiming',
    'desc'  => 'Compare exchanges to start trading Bitcoin and altcoin futures. Features and fee benefits of Binance and Bybit.',
    'h1'    => 'Which exchange should you start with?',
    'lead'  => 'To act on BTCtiming scores you need an exchange account. Here are the two most widely used worldwide. Signing up via the links below gets you a fee discount.',
    'binance_tag' => '#1 by volume',
    'binance_desc'=> 'The most coins and deepest liquidity. Broad support from spot to futures, with plenty of beginner resources.',
    'bybit_tag'   => 'Favored by futures traders',
    'bybit_desc'  => 'Strong in futures and derivatives. Fast execution and a clean interface make it popular with leverage traders.',
    'feat'        => 'Key features',
    'b1'          => ['Huge coin selection', 'Deep liquidity', 'Beginner-friendly'],
    'b2'          => ['Futures-focused', 'Fast execution', 'Competitive fees'],
    'cta_binance' => 'Sign up on Binance & get a fee discount',
    'cta_bybit'   => 'Sign up on Bybit & get a fee discount',
    'note'        => 'These are referral links; BTCtiming may earn a small commission when you sign up. There is no extra cost to you — you receive a fee discount instead.',
    'risk'        => '⚠ Crypto trading, especially futures and leverage, carries a high risk of loss. BTCtiming scores are for information only and are not financial advice. Trade at your own discretion and risk.',
    'back'        => '← Back to BTCtiming',
  ],
  'ja' => [
    'title' => 'おすすめ取引所 — Binance vs Bybit | BTCtiming',
    'desc'  => 'ビットコイン・アルトコインの先物取引を始める取引所を比較。BinanceとBybitの特徴と手数料特典をまとめました。',
    'h1'    => 'どの取引所から始める?',
    'lead'  => 'BTCtimingのスコアを実際の取引に活かすには取引所口座が必要です。世界で最も使われている2つを紹介します。下のリンクから登録すると手数料割引を受けられます。',
    'binance_tag' => '取引量世界1位',
    'binance_desc'=> '最多の銘柄と最も深い流動性。現物から先物まで幅広く対応し、初心者向け資料も充実。',
    'bybit_tag'   => '先物トレーダーに人気',
    'bybit_desc'  => '先物・デリバティブに強み。高速約定と直感的なUIでレバレッジ取引者に人気。',
    'feat'        => '主な特徴',
    'b1'          => ['豊富な銘柄', '深い流動性', '初心者に優しい'],
    'b2'          => ['先物特化', '高速約定', '競争力ある手数料'],
    'cta_binance' => 'Binanceに登録して手数料割引を受ける',
    'cta_bybit'   => 'Bybitに登録して手数料割引を受ける',
    'note'        => '上記はリファラルリンクで、登録時にBTCtimingに少額の手数料が支払われる場合があります。追加費用はなく、むしろ手数料割引を受けられます。',
    'risk'        => '⚠ 暗号資産取引、特に先物・レバレッジ取引は高い損失リスクを伴います。BTCtimingのスコアは情報提供用であり投資助言ではありません。自己の判断と責任で取引してください。',
    'back'        => '← BTCtimingホームへ',
  ],
  'es' => [
    'title' => 'Mejor Exchange — Binance vs Bybit | BTCtiming',
    'desc'  => 'Compara exchanges para operar futuros de Bitcoin y altcoins. Características y beneficios de comisiones de Binance y Bybit.',
    'h1'    => '¿Con qué exchange empezar?',
    'lead'  => 'Para actuar sobre las puntuaciones de BTCtiming necesitas una cuenta de exchange. Aquí están los dos más usados del mundo. Registrarte con los enlaces de abajo te da un descuento en comisiones.',
    'binance_tag' => '#1 por volumen',
    'binance_desc'=> 'La mayor cantidad de monedas y la liquidez más profunda. Amplio soporte de spot a futuros, con muchos recursos para principiantes.',
    'bybit_tag'   => 'Preferido por traders de futuros',
    'bybit_desc'  => 'Fuerte en futuros y derivados. Ejecución rápida e interfaz limpia, popular entre traders con apalancamiento.',
    'feat'        => 'Características clave',
    'b1'          => ['Enorme selección de monedas', 'Liquidez profunda', 'Fácil para principiantes'],
    'b2'          => ['Enfocado en futuros', 'Ejecución rápida', 'Comisiones competitivas'],
    'cta_binance' => 'Regístrate en Binance y obtén descuento',
    'cta_bybit'   => 'Regístrate en Bybit y obtén descuento',
    'note'        => 'Estos son enlaces de referido; BTCtiming puede ganar una pequeña comisión cuando te registras. No tiene costo extra para ti — recibes un descuento en comisiones.',
    'risk'        => '⚠ Operar con cripto, especialmente futuros y apalancamiento, conlleva un alto riesgo de pérdida. Las puntuaciones de BTCtiming son solo informativas y no son asesoramiento financiero. Opera bajo tu propio criterio y riesgo.',
    'back'        => '← Volver a BTCtiming',
  ],
  'de' => [
    'title' => 'Beste Börse — Binance vs Bybit | BTCtiming',
    'desc'  => 'Vergleiche Börsen für den Handel mit Bitcoin- und Altcoin-Futures. Merkmale und Gebührenvorteile von Binance und Bybit.',
    'h1'    => 'Mit welcher Börse anfangen?',
    'lead'  => 'Um BTCtiming-Scores umzusetzen, brauchst du ein Börsenkonto. Hier sind die zwei weltweit meistgenutzten. Mit den Links unten erhältst du einen Gebührenrabatt.',
    'binance_tag' => 'Nr. 1 nach Volumen',
    'binance_desc'=> 'Die meisten Coins und die tiefste Liquidität. Breite Unterstützung von Spot bis Futures, mit vielen Einsteiger-Ressourcen.',
    'bybit_tag'   => 'Von Futures-Tradern bevorzugt',
    'bybit_desc'  => 'Stark bei Futures und Derivaten. Schnelle Ausführung und klare Oberfläche, beliebt bei Hebel-Tradern.',
    'feat'        => 'Hauptmerkmale',
    'b1'          => ['Riesige Coin-Auswahl', 'Tiefe Liquidität', 'Einsteigerfreundlich'],
    'b2'          => ['Futures-fokussiert', 'Schnelle Ausführung', 'Wettbewerbsfähige Gebühren'],
    'cta_binance' => 'Bei Binance anmelden & Rabatt erhalten',
    'cta_bybit'   => 'Bei Bybit anmelden & Rabatt erhalten',
    'note'        => 'Dies sind Empfehlungslinks; BTCtiming kann bei deiner Anmeldung eine kleine Provision erhalten. Für dich entstehen keine Zusatzkosten — du erhältst stattdessen einen Gebührenrabatt.',
    'risk'        => '⚠ Krypto-Handel, besonders Futures und Hebel, birgt ein hohes Verlustrisiko. BTCtiming-Scores dienen nur der Information und sind keine Finanzberatung. Handle nach eigenem Ermessen und Risiko.',
    'back'        => '← Zurück zu BTCtiming',
  ],
];
$t = $T[$lang] ?? $T['en'];
$canonical = 'https://www.btctiming.com/exchanges.php' . $urlSuffix;
?>
<!DOCTYPE html>
<html lang="<?= h($htmlLang) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#080808">
<title><?= h($t['title']) ?></title>
<meta name="description" content="<?= h($t['desc']) ?>">
<link rel="canonical" href="<?= h($canonical) ?>">
<?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
<link rel="alternate" hreflang="<?= h($lc) ?>" href="https://www.btctiming.com/exchanges.php<?= h(langSuffix($lc)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="https://www.btctiming.com/exchanges.php">
<meta property="og:title" content="<?= h($t['title']) ?>">
<meta property="og:description" content="<?= h($t['desc']) ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= h($canonical) ?>">
<style>
:root{
  --bg:#080808;--bg2:#0f0f0f;--bg3:#151515;
  --b1:rgba(255,255,255,0.06);--b2:rgba(255,255,255,0.11);
  --t1:#f0f0f0;--t2:#aaaaaa;--t3:#666666;
  --green:#4ade80;--yellow:#fbbf24;--orange:#fb923c;--red:#f87171;
  --rad:12px;--rad-lg:16px;
}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
body{background:var(--bg);color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:14px;line-height:1.6;min-height:100vh;padding:24px 16px}
.wrap{max-width:840px;margin:0 auto}
.back{display:inline-block;color:var(--t3);text-decoration:none;font-size:13px;margin-bottom:20px}
.back:hover{color:var(--t1)}
h1{font-size:26px;font-weight:800;letter-spacing:-.5px;margin-bottom:12px}
.lead{color:var(--t2);margin-bottom:28px;font-size:14px}
.cards{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:640px){.cards{grid-template-columns:1fr}}
.card{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-lg);padding:22px;display:flex;flex-direction:column}
.card h2{font-size:20px;font-weight:800;margin-bottom:6px}
.tag{display:inline-block;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;margin-bottom:12px;width:fit-content}
.tag.b{background:rgba(251,191,36,.12);color:var(--yellow);border:1px solid rgba(251,191,36,.3)}
.tag.y{background:rgba(251,146,60,.12);color:var(--orange);border:1px solid rgba(251,146,60,.3)}
.card p.d{color:var(--t2);font-size:13px;margin-bottom:16px;flex-grow:0}
.feat{font-size:11px;color:var(--t3);text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px}
.card ul{list-style:none;margin-bottom:20px;flex-grow:1}
.card li{font-size:13px;color:var(--t1);padding:5px 0 5px 22px;position:relative}
.card li::before{content:"✓";position:absolute;left:0;color:var(--green);font-weight:700}
.cta{display:block;text-align:center;text-decoration:none;font-weight:700;font-size:14px;padding:13px 16px;border-radius:var(--rad);transition:transform .1s,opacity .15s}
.cta:active{transform:scale(.98)}
.cta.b{background:linear-gradient(135deg,#f0b90b,#f8d33a);color:#000}
.cta.y{background:linear-gradient(135deg,#fb923c,#fdba74);color:#000}
.cta:hover{opacity:.92}
.note{font-size:11.5px;color:var(--t3);margin-top:22px;line-height:1.6}
.risk{font-size:12px;color:var(--red);background:rgba(248,113,113,.07);border:1px solid rgba(248,113,113,.2);border-radius:var(--rad);padding:12px 14px;margin-top:14px;line-height:1.55}
</style>
</head>
<body>
<div class="wrap">
  <a href="/<?= h($urlSuffix) ?>" class="back"><?= h($t['back']) ?></a>
  <h1><?= h($t['h1']) ?></h1>
  <p class="lead"><?= h($t['lead']) ?></p>

  <div class="cards">
    <!-- Binance -->
    <div class="card">
      <h2>Binance</h2>
      <span class="tag b"><?= h($t['binance_tag']) ?></span>
      <p class="d"><?= h($t['binance_desc']) ?></p>
      <div class="feat"><?= h($t['feat']) ?></div>
      <ul>
        <?php foreach ($t['b1'] as $li): ?><li><?= h($li) ?></li><?php endforeach; ?>
      </ul>
      <a class="cta b" href="<?= h($REF_BINANCE) ?>" target="_blank" rel="sponsored nofollow noopener"><?= h($t['cta_binance']) ?></a>
    </div>
    <!-- Bybit -->
    <div class="card">
      <h2>Bybit</h2>
      <span class="tag y"><?= h($t['bybit_tag']) ?></span>
      <p class="d"><?= h($t['bybit_desc']) ?></p>
      <div class="feat"><?= h($t['feat']) ?></div>
      <ul>
        <?php foreach ($t['b2'] as $li): ?><li><?= h($li) ?></li><?php endforeach; ?>
      </ul>
      <a class="cta y" href="<?= h($REF_BYBIT) ?>" target="_blank" rel="sponsored nofollow noopener"><?= h($t['cta_bybit']) ?></a>
    </div>
  </div>

  <p class="note"><?= h($t['note']) ?></p>
  <div class="risk"><?= h($t['risk']) ?></div>
</div>
</body>
</html>
