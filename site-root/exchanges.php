<?php
require_once __DIR__ . '/config.php';

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

// 수수료 할인율(%) — 프로그램 최대치. 실제 코드 적용률 확인 후 숫자만 수정하세요.
$DISCOUNT_BINANCE = '20';
$DISCOUNT_BYBIT   = '20';

// 바이낸스 공식 레퍼럴 이미지(QR 포함) 슬롯: /binance-referral.png 로 업로드하면 자동 표시
$OFFICIAL_IMG = __DIR__ . '/binance-referral.png';

$T = [
  'ko' => [
    'title' => '거래소 추천 — 바이낸스 vs 바이비트 | BTCtiming',
    'desc' => '비트코인·알트코인 거래를 시작할 거래소 비교. 바이낸스와 바이비트의 특징, 장단점, 최대 수수료 할인과 신규 가입 보너스를 정리했습니다.',
    'back' => '실시간 분석으로 돌아가기',
    'h1' => '어느 거래소로 시작할까?',
    'lead' => 'BTCtiming의 점수를 실제 수익으로 바꾸려면 거래소 계정이 필요합니다. 세계에서 가장 많이 쓰이는 두 거래소를, 아래 링크로 가입하면 <b>거래 수수료를 할인</b>받고 <b>신규 가입 보너스</b>까지 받을 수 있습니다.',
    'disc' => '최대 %s%% 수수료 할인',
    'hero_disc' => '이 페이지의 링크로 가입 시',
    'hero_disc2' => '수수료 할인 + 신규 보너스',
    'binance_tag' => '세계 1위 거래량',
    'binance_desc' => '전 세계 거래량 1위 거래소입니다. 350개 이상 코인을 상장해 알트코인 선택폭이 넓고, 유동성이 깊어 큰 금액도 슬리피지 없이 체결됩니다. 현물·선물·마진·스테이킹을 한 곳에서 처리할 수 있고 한국어 지원과 입문 자료가 충실해, 처음 시작하는 사람에게 특히 추천합니다.',
    'bonus' => '신규 가입 보너스 최대 $100 USDT',
    'bybit_tag' => '선물 트레이더 선호',
    'bybit_desc' => '선물·파생상품에 특화된 거래소로 단타·레버리지 트레이더에게 인기입니다. 체결 속도가 빠르고 인터페이스가 직관적이라 빠른 진입·청산에 유리합니다. 최대 100배 레버리지, 다양한 주문 유형, 카피 트레이딩을 지원해 초보자도 고수의 매매를 따라할 수 있습니다.',
    'bonus_y' => '신규 웰컴 보너스 최대 $30,000 USDT',
    'pros_label' => '장점',
    'cons_label' => '단점',
    'pros_b' => ['압도적 유동성 — 대형 주문도 슬리피지 최소', '350개+ 코인, 현물·선물·스테이킹 통합', '한국어 지원·입문 자료 충실', 'BNB로 수수료 결제 시 추가 할인'],
    'cons_b' => ['기능이 많아 처음엔 화면이 복잡', '일부 지역·상품에 규제 제한'],
    'pros_y' => ['빠른 선물 체결 — 스캘핑에 유리', '최대 100배 레버리지·다양한 주문', '카피 트레이딩으로 초보도 따라하기', '웰컴 보너스·트라이얼 펀드 등 혜택'],
    'cons_y' => ['현물·알트코인 수는 바이낸스보다 적음', '고배율 레버리지는 청산 위험 큼'],
    'cta_binance' => '바이낸스 가입하고 할인받기',
    'cta_bybit' => '바이비트 가입하고 할인받기',
    'why_title' => '왜 링크로 가입해야 할까?',
    'why' => ['수수료는 매 거래마다 나가는 고정 비용입니다. 할인 한 번 설정으로 장기적으로 큰 차이를 만듭니다.', '신규 보너스·바우처는 가입 초기에만 받는 일회성 혜택입니다.'],
    'verify_note' => '표시된 할인율은 프로그램 최대치(“최대”)이며, 실제 적용률은 가입 화면의 추천인(Referral ID) 칸에서 확인할 수 있습니다. 지역·상품·캠페인에 따라 달라질 수 있습니다.',
    'note' => '위 링크로 가입하면 거래 수수료 할인과 신규 가입 혜택을 받을 수 있습니다.',
    'risk' => '⚠ 암호화폐 거래, 특히 선물·레버리지 거래는 높은 손실 위험을 동반합니다. BTCtiming의 점수는 정보 제공용이며 투자 조언이 아닙니다. 본인의 판단과 책임하에 거래하세요.',
    'f_privacy' => '개인정보처리방침',
    'f_terms' => '이용약관',
    'f_sitemap' => '사이트맵',
    'f_disclaimer' => '투자 조언이 아닙니다',
  ],
  'en' => [
    'title' => 'Best Exchange — Binance vs Bybit | BTCtiming',
    'desc' => 'Compare exchanges to start trading Bitcoin and altcoins. Features, pros and cons, top fee discounts and new-user bonuses for Binance and Bybit.',
    'back' => 'Back to Live Analysis',
    'h1' => 'Which exchange should you start with?',
    'lead' => 'To turn BTCtiming scores into real results you need an exchange account. Sign up for either of the two most-used exchanges via the links below to get a <b>trading fee discount</b> plus a <b>new-user bonus</b>.',
    'disc' => 'Up to %s%% fee discount',
    'hero_disc' => 'Sign up via the links here for',
    'hero_disc2' => 'a fee discount + new-user bonus',
    'binance_tag' => '#1 by volume',
    'binance_desc' => 'The highest-volume exchange in the world. With 350+ listed coins it offers a wide range of altcoins, and its deep liquidity fills large orders with minimal slippage. Spot, futures, margin and staking are all in one place, with solid beginner resources — a great fit for first-timers.',
    'bonus' => 'New-user bonus up to $100 USDT',
    'bybit_tag' => 'Favored by futures traders',
    'bybit_desc' => 'A derivatives-focused exchange, popular with scalpers and leverage traders. Fast execution and a clean interface make quick entries and exits easy. Up to 100x leverage, a range of order types and copy trading let beginners mirror experienced traders.',
    'bonus_y' => 'Welcome bonus up to $30,000 USDT',
    'pros_label' => 'Pros',
    'cons_label' => 'Cons',
    'pros_b' => ['Unmatched liquidity — minimal slippage on big orders', '350+ coins; spot, futures & staking in one', 'Strong beginner resources', 'Extra discount when paying fees in BNB'],
    'cons_b' => ['Feature-rich UI can feel complex at first', 'Some regional/product restrictions'],
    'pros_y' => ['Fast futures execution — great for scalping', 'Up to 100x leverage, many order types', 'Copy trading to mirror pros', 'Welcome bonus & trial funds'],
    'cons_y' => ['Fewer spot/altcoins than Binance', 'High leverage carries big liquidation risk'],
    'cta_binance' => 'Sign up on Binance & save',
    'cta_bybit' => 'Sign up on Bybit & save',
    'why_title' => 'Why sign up via the link?',
    'why' => ['Fees are a fixed cost on every trade. Setting a discount once makes a big difference long-term.', 'New-user bonuses and vouchers are one-time perks available only at the start.'],
    'verify_note' => 'The rate shown is the program maximum (“up to”). Your actual rate appears in the Referral ID field on the signup screen and may vary by region, product and campaign.',
    'note' => 'Signing up via the links above gets you a trading fee discount and new-user perks.',
    'risk' => '⚠ Crypto trading, especially futures and leverage, carries a high risk of loss. BTCtiming scores are for information only and are not financial advice. Trade at your own discretion and risk.',
    'f_privacy' => 'Privacy Policy',
    'f_terms' => 'Terms of Service',
    'f_sitemap' => 'Sitemap',
    'f_disclaimer' => 'Not financial advice',
  ],
  'ja' => [
    'title' => 'おすすめ取引所 — Binance vs Bybit | BTCtiming',
    'desc' => 'ビットコイン・アルトコイン取引を始める取引所を比較。BinanceとBybitの特徴、長所短所、最大手数料割引と新規登録ボーナスをまとめました。',
    'back' => 'リアルタイム分析に戻る',
    'h1' => 'どの取引所から始める?',
    'lead' => 'BTCtimingのスコアを実際の成果に変えるには取引所口座が必要です。世界で最も使われている2つの取引所を、下のリンクから登録すると<b>取引手数料の割引</b>に加え<b>新規登録ボーナス</b>も受けられます。',
    'disc' => '最大%s%%の手数料割引',
    'hero_disc' => 'このページのリンクから登録で',
    'hero_disc2' => '手数料割引＋新規ボーナス',
    'binance_tag' => '取引量世界1位',
    'binance_desc' => '世界で最も取引量の多い取引所です。350以上の銘柄を上場しアルトコインの選択肢が広く、流動性が深いため大口注文もスリッページなく約定します。現物・先物・証拠金・ステーキングを一箇所で扱え、入門資料も充実。初めての方に特におすすめです。',
    'bonus' => '新規登録ボーナス最大$100 USDT',
    'bybit_tag' => '先物トレーダーに人気',
    'bybit_desc' => '先物・デリバティブに特化した取引所で、スキャルピングやレバレッジ取引者に人気です。約定が速く直感的なUIで素早いエントリー・決済に有利。最大100倍レバレッジ、多様な注文、コピートレードに対応し、初心者も上級者の取引を真似できます。',
    'bonus_y' => '新規ウェルカムボーナス最大$30,000 USDT',
    'pros_label' => '長所',
    'cons_label' => '短所',
    'pros_b' => ['圧倒的な流動性 — 大口でもスリッページ最小', '350以上の銘柄、現物・先物・ステーキング統合', '入門資料が充実', 'BNBで手数料支払いなら追加割引'],
    'cons_b' => ['機能が多く最初は画面が複雑', '一部地域・商品に規制制限'],
    'pros_y' => ['速い先物約定 — スキャルピングに有利', '最大100倍レバレッジ・多様な注文', 'コピートレードで初心者も追随', 'ウェルカムボーナス・トライアル資金'],
    'cons_y' => ['現物・アルトコイン数はBinanceより少ない', '高倍率レバレッジは清算リスク大'],
    'cta_binance' => 'Binanceに登録して割引を受ける',
    'cta_bybit' => 'Bybitに登録して割引を受ける',
    'why_title' => 'なぜリンクから登録すべき?',
    'why' => ['手数料は毎取引でかかる固定コスト。一度の割引設定が長期的に大きな差を生みます。', '新規ボーナス・バウチャーは登録初期のみの一度きりの特典です。'],
    'verify_note' => '表示の割引率はプログラム上限(「最大」)です。実際の適用率は登録画面の紹介人(Referral ID)欄で確認でき、地域・商品・キャンペーンにより異なります。',
    'note' => '上記のリンクから登録すると取引手数料の割引と新規特典を受けられます。',
    'risk' => '⚠ 暗号資産取引、特に先物・レバレッジ取引は高い損失リスクを伴います。BTCtimingのスコアは情報提供用であり投資助言ではありません。自己の判断と責任で取引してください。',
    'f_privacy' => 'プライバシーポリシー',
    'f_terms' => '利用規約',
    'f_sitemap' => 'サイトマップ',
    'f_disclaimer' => '投資助言ではありません',
  ],
  'es' => [
    'title' => 'Mejor Exchange — Binance vs Bybit | BTCtiming',
    'desc' => 'Compara exchanges para operar Bitcoin y altcoins. Características, pros y contras, mayores descuentos de comisiones y bonos para nuevos usuarios de Binance y Bybit.',
    'back' => 'Volver al Análisis en Vivo',
    'h1' => '¿Con qué exchange empezar?',
    'lead' => 'Para convertir las puntuaciones de BTCtiming en resultados reales necesitas una cuenta de exchange. Regístrate en cualquiera de los dos exchanges más usados con los enlaces de abajo para obtener un <b>descuento en comisiones</b> más un <b>bono de bienvenida</b>.',
    'disc' => 'Hasta %s%% de descuento en comisiones',
    'hero_disc' => 'Regístrate con los enlaces aquí para',
    'hero_disc2' => 'un descuento + bono de bienvenida',
    'binance_tag' => '#1 por volumen',
    'binance_desc' => 'El exchange de mayor volumen del mundo. Con más de 350 monedas listadas ofrece amplia variedad de altcoins, y su liquidez profunda ejecuta órdenes grandes con mínimo deslizamiento. Spot, futuros, margen y staking en un solo lugar, con buenos recursos para principiantes.',
    'bonus' => 'Bono para nuevos usuarios hasta $100 USDT',
    'bybit_tag' => 'Preferido por traders de futuros',
    'bybit_desc' => 'Un exchange enfocado en derivados, popular entre scalpers y traders con apalancamiento. Ejecución rápida e interfaz limpia facilitan entradas y salidas veloces. Hasta 100x, varios tipos de órdenes y copy trading permiten a principiantes imitar a expertos.',
    'bonus_y' => 'Bono de bienvenida hasta $30,000 USDT',
    'pros_label' => 'Pros',
    'cons_label' => 'Contras',
    'pros_b' => ['Liquidez inigualable — mínimo deslizamiento', '350+ monedas; spot, futuros y staking juntos', 'Buenos recursos para principiantes', 'Descuento extra pagando comisiones con BNB'],
    'cons_b' => ['Interfaz con muchas funciones, compleja al inicio', 'Algunas restricciones por región/producto'],
    'pros_y' => ['Ejecución rápida de futuros — ideal scalping', 'Hasta 100x, muchos tipos de órdenes', 'Copy trading para imitar a expertos', 'Bono de bienvenida y fondos de prueba'],
    'cons_y' => ['Menos spot/altcoins que Binance', 'El alto apalancamiento implica gran riesgo de liquidación'],
    'cta_binance' => 'Regístrate en Binance y ahorra',
    'cta_bybit' => 'Regístrate en Bybit y ahorra',
    'why_title' => '¿Por qué registrarse con el enlace?',
    'why' => ['Las comisiones son un costo fijo en cada operación. Un descuento marca gran diferencia a largo plazo.', 'Los bonos y vales para nuevos usuarios son beneficios únicos disponibles solo al inicio.'],
    'verify_note' => 'La tasa mostrada es el máximo del programa ("hasta"). Tu tasa real aparece en el campo Referral ID al registrarte y puede variar por región, producto y campaña.',
    'note' => 'Registrarte con los enlaces de arriba te da un descuento en comisiones y beneficios de bienvenida.',
    'risk' => '⚠ Operar con cripto, especialmente futuros y apalancamiento, conlleva un alto riesgo de pérdida. Las puntuaciones de BTCtiming son solo informativas y no son asesoramiento financiero. Opera bajo tu propio criterio y riesgo.',
    'f_privacy' => 'Política de Privacidad',
    'f_terms' => 'Términos de Servicio',
    'f_sitemap' => 'Mapa del sitio',
    'f_disclaimer' => 'No es asesoramiento financiero',
  ],
  'de' => [
    'title' => 'Beste Börse — Binance vs Bybit | BTCtiming',
    'desc' => 'Vergleiche Börsen für den Handel mit Bitcoin und Altcoins. Merkmale, Vor- und Nachteile, höchste Gebührenrabatte und Neukundenboni von Binance und Bybit.',
    'back' => 'Zurück zur Live-Analyse',
    'h1' => 'Mit welcher Börse anfangen?',
    'lead' => 'Um BTCtiming-Scores in echte Ergebnisse zu verwandeln, brauchst du ein Börsenkonto. Melde dich über die Links unten bei einer der zwei meistgenutzten Börsen an und erhalte einen <b>Gebührenrabatt</b> plus einen <b>Neukundenbonus</b>.',
    'disc' => 'Bis zu %s%% Gebührenrabatt',
    'hero_disc' => 'Über die Links hier anmelden für',
    'hero_disc2' => 'Rabatt + Neukundenbonus',
    'binance_tag' => 'Nr. 1 nach Volumen',
    'binance_desc' => 'Die umsatzstärkste Börse der Welt. Mit über 350 Coins bietet sie große Altcoin-Auswahl, und die tiefe Liquidität führt große Orders mit minimalem Slippage aus. Spot, Futures, Margin und Staking an einem Ort, mit guten Einsteiger-Ressourcen.',
    'bonus' => 'Neukundenbonus bis zu $100 USDT',
    'bybit_tag' => 'Von Futures-Tradern bevorzugt',
    'bybit_desc' => 'Eine auf Derivate fokussierte Börse, beliebt bei Scalpern und Hebel-Tradern. Schnelle Ausführung und klare Oberfläche erleichtern schnelle Ein- und Ausstiege. Bis zu 100x, viele Ordertypen und Copy-Trading lassen Einsteiger Profis nachahmen.',
    'bonus_y' => 'Willkommensbonus bis zu $30.000 USDT',
    'pros_label' => 'Vorteile',
    'cons_label' => 'Nachteile',
    'pros_b' => ['Unübertroffene Liquidität — minimaler Slippage', '350+ Coins; Spot, Futures & Staking vereint', 'Gute Einsteiger-Ressourcen', 'Extra-Rabatt bei Gebührenzahlung in BNB'],
    'cons_b' => ['Funktionsreiche UI wirkt anfangs komplex', 'Einige regionale/Produkt-Einschränkungen'],
    'pros_y' => ['Schnelle Futures-Ausführung — top fürs Scalping', 'Bis zu 100x, viele Ordertypen', 'Copy-Trading zum Nachahmen von Profis', 'Willkommensbonus & Trial-Funds'],
    'cons_y' => ['Weniger Spot/Altcoins als Binance', 'Hoher Hebel birgt großes Liquidationsrisiko'],
    'cta_binance' => 'Bei Binance anmelden & sparen',
    'cta_bybit' => 'Bei Bybit anmelden & sparen',
    'why_title' => 'Warum über den Link anmelden?',
    'why' => ['Gebühren sind ein fixer Kostenpunkt bei jedem Trade. Ein Rabatt macht langfristig viel aus.', 'Neukundenboni und Gutscheine sind einmalige Vorteile nur zu Beginn.'],
    'verify_note' => 'Der gezeigte Satz ist das Programm-Maximum ("bis zu"). Dein tatsächlicher Satz erscheint im Feld Referral ID bei der Anmeldung und kann je nach Region, Produkt und Kampagne variieren.',
    'note' => 'Die Anmeldung über die Links oben bringt dir einen Gebührenrabatt und Neukundenvorteile.',
    'risk' => '⚠ Krypto-Handel, besonders Futures und Hebel, birgt ein hohes Verlustrisiko. BTCtiming-Scores dienen nur der Information und sind keine Finanzberatung. Handle nach eigenem Ermessen und Risiko.',
    'f_privacy' => 'Datenschutzerklärung',
    'f_terms' => 'Nutzungsbedingungen',
    'f_sitemap' => 'Sitemap',
    'f_disclaimer' => 'Keine Finanzberatung',
  ],
  'fr' => [
    'title' => 'Meilleure plateforme — Binance vs Bybit | BTCtiming',
    'desc' => 'Comparez les plateformes pour trader Bitcoin et altcoins. Caractéristiques, avantages et inconvénients, meilleures réductions de frais et bonus de bienvenue de Binance et Bybit.',
    'back' => 'Retour à l\'analyse en direct',
    'h1' => 'Par quelle plateforme commencer ?',
    'lead' => 'Pour transformer les scores BTCtiming en résultats réels, il vous faut un compte. Inscrivez-vous sur l\'une des deux plateformes les plus utilisées via les liens ci-dessous pour obtenir une <b>réduction de frais</b> plus un <b>bonus de bienvenue</b>.',
    'disc' => 'Jusqu\'à %s%% de réduction de frais',
    'hero_disc' => 'Inscrivez-vous via les liens ici pour',
    'hero_disc2' => 'une réduction + un bonus',
    'binance_tag' => 'N°1 en volume',
    'binance_desc' => 'La plateforme au plus gros volume au monde. Avec plus de 350 cryptos, elle offre un large choix d\'altcoins, et sa liquidité profonde exécute les gros ordres avec un slippage minimal. Spot, futures, margin et staking au même endroit, avec de bonnes ressources pour débutants.',
    'bonus' => 'Bonus nouveau membre jusqu\'à 100 $ USDT',
    'bybit_tag' => 'Prisée des traders de futures',
    'bybit_desc' => 'Une plateforme axée dérivés, populaire chez les scalpers et traders à levier. Exécution rapide et interface épurée facilitent les entrées/sorties rapides. Jusqu\'à 100x, divers ordres et copy trading permettent aux débutants d\'imiter les pros.',
    'bonus_y' => 'Bonus de bienvenue jusqu\'à 30 000 $ USDT',
    'pros_label' => 'Avantages',
    'cons_label' => 'Inconvénients',
    'pros_b' => ['Liquidité inégalée — slippage minimal', '350+ cryptos ; spot, futures et staking réunis', 'Bonnes ressources pour débutants', 'Réduction supplémentaire en payant en BNB'],
    'cons_b' => ['Interface riche, complexe au début', 'Certaines restrictions régionales/produit'],
    'pros_y' => ['Exécution futures rapide — idéal scalping', 'Jusqu\'à 100x, nombreux types d\'ordres', 'Copy trading pour imiter les pros', 'Bonus de bienvenue et fonds d’essai'],
    'cons_y' => ['Moins de spot/altcoins que Binance', 'Le fort levier comporte un grand risque de liquidation'],
    'cta_binance' => 'S\'inscrire sur Binance et économiser',
    'cta_bybit' => 'S\'inscrire sur Bybit et économiser',
    'why_title' => 'Pourquoi s’inscrire via le lien ?',
    'why' => ['Les frais sont un coût fixe à chaque trade. Une réduction fait une grande différence à long terme.', 'Les bonus et bons nouveaux membres sont des avantages uniques, uniquement au début.'],
    'verify_note' => 'Le taux affiché est le maximum du programme (« jusqu\'à »). Votre taux réel apparaît dans le champ Referral ID à l\'inscription et peut varier selon la région, le produit et la campagne.',
    'note' => 'S\'inscrire via les liens ci-dessus vous donne une réduction de frais et des avantages de bienvenue.',
    'risk' => '⚠ Le trading de crypto, surtout les futures et l\'effet de levier, comporte un risque de perte élevé. Les scores BTCtiming sont informatifs et ne constituent pas un conseil financier. Tradez à vos propres risques.',
    'f_privacy' => 'Politique de confidentialité',
    'f_terms' => 'Conditions d\'utilisation',
    'f_sitemap' => 'Plan du site',
    'f_disclaimer' => 'Pas un conseil financier',
  ],
  'pt' => [
    'title' => 'Melhor corretora — Binance vs Bybit | BTCtiming',
    'desc' => 'Compare corretoras para operar Bitcoin e altcoins. Características, prós e contras, maiores descontos de taxas e bônus para novos usuários da Binance e Bybit.',
    'back' => 'Voltar à análise ao vivo',
    'h1' => 'Por qual corretora começar?',
    'lead' => 'Para transformar as pontuações do BTCtiming em resultados reais você precisa de uma conta. Cadastre-se em uma das duas corretoras mais usadas pelos links abaixo para ter <b>desconto na taxa</b> mais um <b>bônus de boas-vindas</b>.',
    'disc' => 'Até %s%% de desconto na taxa',
    'hero_disc' => 'Cadastre-se pelos links aqui para',
    'hero_disc2' => 'desconto + bônus de boas-vindas',
    'binance_tag' => 'Nº 1 em volume',
    'binance_desc' => 'A corretora de maior volume do mundo. Com mais de 350 moedas, oferece ampla variedade de altcoins, e sua liquidez profunda executa grandes ordens com slippage mínimo. Spot, futuros, margem e staking em um só lugar, com bons materiais para iniciantes.',
    'bonus' => 'Bônus para novos usuários até $100 USDT',
    'bybit_tag' => 'Preferida por traders de futuros',
    'bybit_desc' => 'Uma corretora focada em derivativos, popular entre scalpers e traders de alavancagem. Execução rápida e interface limpa facilitam entradas e saídas rápidas. Até 100x, vários tipos de ordem e copy trading deixam iniciantes imitarem os profissionais.',
    'bonus_y' => 'Bônus de boas-vindas até $30.000 USDT',
    'pros_label' => 'Prós',
    'cons_label' => 'Contras',
    'pros_b' => ['Liquidez incomparável — slippage mínimo', '350+ moedas; spot, futuros e staking juntos', 'Bons materiais para iniciantes', 'Desconto extra pagando taxas em BNB'],
    'cons_b' => ['Interface cheia de recursos, complexa no início', 'Algumas restrições por região/produto'],
    'pros_y' => ['Execução rápida de futuros — ótimo p/ scalping', 'Até 100x, vários tipos de ordem', 'Copy trading para imitar profissionais', 'Bônus de boas-vindas e fundos de teste'],
    'cons_y' => ['Menos spot/altcoins que a Binance', 'Alta alavancagem tem grande risco de liquidação'],
    'cta_binance' => 'Cadastre-se na Binance e economize',
    'cta_bybit' => 'Cadastre-se na Bybit e economize',
    'why_title' => 'Por que se cadastrar pelo link?',
    'why' => ['Taxas são um custo fixo em cada operação. Um desconto faz grande diferença no longo prazo.', 'Bônus e vales para novos usuários são benefícios únicos, só no início.'],
    'verify_note' => 'A taxa exibida é o máximo do programa ("até"). Sua taxa real aparece no campo Referral ID no cadastro e pode variar por região, produto e campanha.',
    'note' => 'Cadastrar-se pelos links acima garante desconto na taxa e benefícios de boas-vindas.',
    'risk' => '⚠ Negociar cripto, especialmente futuros e alavancagem, envolve alto risco de perda. As pontuações do BTCtiming são apenas informativas e não constituem aconselhamento financeiro. Negocie por sua conta e risco.',
    'f_privacy' => 'Política de Privacidade',
    'f_terms' => 'Termos de Serviço',
    'f_sitemap' => 'Mapa do site',
    'f_disclaimer' => 'Não é aconselhamento financeiro',
  ],
  'tr' => [
    'title' => 'En İyi Borsa — Binance vs Bybit | BTCtiming',
    'desc' => 'Bitcoin ve altcoin işlemlerine başlamak için borsaları karşılaştırın. Binance ve Bybit özellikleri, artıları eksileri, en yüksek komisyon indirimleri ve yeni kullanıcı bonusları.',
    'back' => 'Canlı analize dön',
    'h1' => 'Hangi borsayla başlamalı?',
    'lead' => 'BTCtiming puanlarını gerçek sonuca çevirmek için bir borsa hesabı gerekir. Aşağıdaki bağlantılardan en çok kullanılan iki borsadan birine kaydolun; <b>komisyon indirimi</b> ve <b>yeni kullanıcı bonusu</b> kazanın.',
    'disc' => '%s%% e varan komisyon indirimi',
    'hero_disc' => 'Buradaki bağlantılardan kaydolun',
    'hero_disc2' => 'indirim + yeni kullanıcı bonusu',
    'binance_tag' => 'Hacimde 1 numara',
    'binance_desc' => 'Dünyanın en yüksek hacimli borsası. 350\'den fazla coin ile geniş altcoin yelpazesi sunar; derin likiditesi büyük emirleri minimum kaymayla gerçekleştirir. Spot, vadeli, marjin ve staking tek yerde, iyi başlangıç kaynaklarıyla.',
    'bonus' => 'Yeni kullanıcı bonusu 100 $ USDT\'ye kadar',
    'bybit_tag' => 'Vadeli traderların tercihi',
    'bybit_desc' => 'Türev odaklı bir borsa; scalperlar ve kaldıraç traderları arasında popüler. Hızlı gerçekleştirme ve temiz arayüz hızlı giriş-çıkışı kolaylaştırır. 100x\'e kadar kaldıraç, çeşitli emirler ve copy trading yenilerin profesyonelleri taklit etmesini sağlar.',
    'bonus_y' => 'Hoş geldin bonusu 30.000 $ USDT\'ye kadar',
    'pros_label' => 'Artılar',
    'cons_label' => 'Eksiler',
    'pros_b' => ['Eşsiz likidite — büyük emirlerde minimum kayma', '350+ coin; spot, vadeli ve staking bir arada', 'İyi başlangıç kaynakları', 'Komisyonu BNB ile ödeyince ek indirim'],
    'cons_b' => ['Özellik dolu arayüz başta karmaşık gelebilir', 'Bazı bölge/ürün kısıtlamaları'],
    'pros_y' => ['Hızlı vadeli gerçekleştirme — scalping için ideal', '100x\'e kadar kaldıraç, çok sayıda emir türü', 'Copy trading ile profesyonelleri taklit', 'Hoş geldin bonusu ve deneme fonları'],
    'cons_y' => ['Spot/altcoin sayısı Binance\'ten az', 'Yüksek kaldıraç büyük tasfiye riski taşır'],
    'cta_binance' => 'Binance\'e kaydol ve kazan',
    'cta_bybit' => 'Bybit\'e kaydol ve kazan',
    'why_title' => 'Neden bağlantıdan kaydolmalı?',
    'why' => ['Komisyon her işlemde sabit bir maliyettir. Bir kez indirim ayarı uzun vadede büyük fark yaratır.', 'Yeni kullanıcı bonusları ve kuponları yalnızca başlangıçta verilen tek seferlik avantajlardır.'],
    'verify_note' => 'Gösterilen oran program üst sınırıdır ("e varan"). Gerçek oranınız kayıt ekranındaki Referral ID alanında görünür; bölge, ürün ve kampanyaya göre değişebilir.',
    'note' => 'Yukarıdaki bağlantılardan kaydolmak komisyon indirimi ve yeni kullanıcı avantajları sağlar.',
    'risk' => '⚠ Kripto ticareti, özellikle vadeli ve kaldıraç, yüksek kayıp riski taşır. BTCtiming puanları yalnızca bilgi amaçlıdır ve yatırım tavsiyesi değildir. Kendi takdirinizle ve riskinizle işlem yapın.',
    'f_privacy' => 'Gizlilik Politikası',
    'f_terms' => 'Hizmet Şartları',
    'f_sitemap' => 'Site haritası',
    'f_disclaimer' => 'Yatırım tavsiyesi değildir',
  ],
  'vi' => [
    'title' => 'Sàn tốt nhất — Binance vs Bybit | BTCtiming',
    'desc' => 'So sánh các sàn để bắt đầu giao dịch Bitcoin và altcoin. Tính năng, ưu nhược điểm, ưu đãi giảm phí cao nhất và thưởng cho người dùng mới của Binance và Bybit.',
    'back' => 'Quay lại phân tích trực tiếp',
    'h1' => 'Nên bắt đầu với sàn nào?',
    'lead' => 'Để biến điểm BTCtiming thành kết quả thực tế, bạn cần một tài khoản sàn. Đăng ký một trong hai sàn được dùng nhiều nhất qua các liên kết bên dưới để được <b>giảm phí giao dịch</b> cùng <b>thưởng người dùng mới</b>.',
    'disc' => 'Giảm phí tới %s%%',
    'hero_disc' => 'Đăng ký qua liên kết ở đây để nhận',
    'hero_disc2' => 'giảm phí + thưởng người dùng mới',
    'binance_tag' => 'Số 1 về khối lượng',
    'binance_desc' => 'Sàn có khối lượng lớn nhất thế giới. Với hơn 350 coin niêm yết, sàn có nhiều lựa chọn altcoin, và thanh khoản sâu khớp các lệnh lớn với trượt giá tối thiểu. Spot, futures, margin và staking ở một nơi, cùng tài liệu tốt cho người mới.',
    'bonus' => 'Thưởng người dùng mới tới $100 USDT',
    'bybit_tag' => 'Được trader futures ưa chuộng',
    'bybit_desc' => 'Một sàn tập trung phái sinh, phổ biến với scalper và trader đòn bẩy. Khớp lệnh nhanh và giao diện gọn giúp vào/ra lệnh nhanh. Đòn bẩy tới 100x, nhiều loại lệnh và copy trading giúp người mới bắt chước người chuyên nghiệp.',
    'bonus_y' => 'Thưởng chào mừng tới $30,000 USDT',
    'pros_label' => 'Ưu điểm',
    'cons_label' => 'Nhược điểm',
    'pros_b' => ['Thanh khoản vượt trội — trượt giá tối thiểu', '350+ coin; spot, futures và staking cùng nơi', 'Tài liệu tốt cho người mới', 'Giảm thêm khi trả phí bằng BNB'],
    'cons_b' => ['Giao diện nhiều tính năng, ban đầu phức tạp', 'Một số hạn chế theo khu vực/sản phẩm'],
    'pros_y' => ['Khớp futures nhanh — tốt cho scalping', 'Đòn bẩy tới 100x, nhiều loại lệnh', 'Copy trading để bắt chước chuyên gia', 'Thưởng chào mừng và quỹ dùng thử'],
    'cons_y' => ['Ít spot/altcoin hơn Binance', 'Đòn bẩy cao có rủi ro thanh lý lớn'],
    'cta_binance' => 'Đăng ký Binance và tiết kiệm',
    'cta_bybit' => 'Đăng ký Bybit và tiết kiệm',
    'why_title' => 'Vì sao nên đăng ký qua liên kết?',
    'why' => ['Phí là chi phí cố định mỗi lần giao dịch. Thiết lập giảm phí một lần tạo khác biệt lớn về lâu dài.', 'Thưởng và voucher người dùng mới là ưu đãi một lần, chỉ có lúc bắt đầu.'],
    'verify_note' => 'Mức hiển thị là tối đa của chương trình ("tới"). Mức thực tế của bạn hiện ở ô Referral ID khi đăng ký và có thể khác theo khu vực, sản phẩm và chiến dịch.',
    'note' => 'Đăng ký qua các liên kết trên giúp bạn được giảm phí và nhận ưu đãi người dùng mới.',
    'risk' => '⚠ Giao dịch crypto, đặc biệt futures và đòn bẩy, mang rủi ro thua lỗ cao. Điểm BTCtiming chỉ mang tính thông tin và không phải lời khuyên tài chính. Hãy giao dịch theo quyết định và rủi ro của riêng bạn.',
    'f_privacy' => 'Chính sách bảo mật',
    'f_terms' => 'Điều khoản dịch vụ',
    'f_sitemap' => 'Sơ đồ trang',
    'f_disclaimer' => 'Không phải lời khuyên tài chính',
  ],
];
$t = $T[$lang] ?? $T['en'];
$canonical = i18nUrl('/exchanges.php', $lang);
$LNG = [];
foreach (SUPPORTED_LANGS as $__lc => $__m) { $LNG[$__lc] = ($__m['flag'] ?? '') . ' ' . ($__m['name'] ?? strtoupper($__lc)); }
$discB = sprintf($t['disc'], $DISCOUNT_BINANCE);
$discY = sprintf($t['disc'], $DISCOUNT_BYBIT);
?>
<!DOCTYPE html>
<html lang="<?= h($htmlLang) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#0a0a0c">
<title><?= h($t['title']) ?></title>
<meta name="description" content="<?= h($t['desc']) ?>">
<link rel="canonical" href="<?= h($canonical) ?>">
<?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
<link rel="alternate" hreflang="<?= h($lc) ?>" href="<?= h(i18nUrl('/exchanges.php', $lc)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= h(i18nUrl('/exchanges.php', 'ko')) ?>">
<meta property="og:title" content="<?= h($t['title']) ?>">
<meta property="og:description" content="<?= h($t['desc']) ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= h($canonical) ?>">
<style>
:root{--bg:#0a0a0c;--bg2:#141418;--bg3:#1b1b21;--bg4:#24242b;--t1:#f2f2f5;--t2:#9a9aa4;--t3:#63636d;--b1:rgba(255,255,255,.07);--b2:rgba(255,255,255,.12);--green:#22c55e;--red:#ef4444;--orange:#f7931a;--gold:#f0b90b}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
html{scrollbar-gutter:stable}  /* 스크롤바 자리 항상 예약 → 글 개수·페이지 길이와 무관하게 헤더 위치 고정 */

body{background:var(--bg);color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:14px;line-height:1.6;min-height:100vh;display:flex;flex-direction:column;overflow-x:clip}
a{color:inherit}
nav{background:var(--bg2);border-bottom:1px solid var(--b1);position:sticky;top:0;z-index:200;height:52px}
.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{display:inline-flex;align-items:center;gap:7px;font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f2f2f5;text-decoration:none;line-height:1;margin-right:4px;white-space:nowrap;outline:none}
.logo span{color:#f59e0b}
.logo svg{flex-shrink:0}
.back{font-size:13px;color:var(--t2,#9a9aa4);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.back a{color:var(--t2,#9a9aa4);text-decoration:none}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:var(--bg3);border:1px solid var(--b1);border-radius:8px;color:var(--t1);font-size:11px;font-weight:700;letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:var(--bg4)}
.lang-caret{font-size:9px;color:var(--t3);transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:var(--bg2);border:1px solid var(--b1);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:none;color:var(--t2);font-size:12px;font-weight:600;text-align:left;text-decoration:none;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:var(--bg3);color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
.wrap{max-width:900px;margin:0 auto;width:100%;padding:32px 16px 48px;flex:1}
h1{font-size:27px;font-weight:800;letter-spacing:-.5px;margin-bottom:12px}
.lead{color:var(--t2);margin-bottom:22px;font-size:14.5px;line-height:1.7}
.lead b{color:var(--t1);font-weight:700}
/* 할인 강조 배너 */
.promo{display:flex;align-items:center;gap:14px;background:linear-gradient(135deg,rgba(247,147,26,.14),rgba(247,147,26,.05));border:1px solid rgba(247,147,26,.4);border-radius:16px;padding:16px 18px;margin-bottom:28px}
.promo-ic{flex-shrink:0;width:40px;height:40px;border-radius:12px;background:rgba(247,147,26,.16);display:flex;align-items:center;justify-content:center}
.promo-tx{display:flex;flex-direction:column;gap:2px}
.promo-tx .s{font-size:12px;color:var(--t2)}
.promo-tx .l{font-size:16px;font-weight:800;color:var(--orange);letter-spacing:-.2px}
/* 카드 */
.cards{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:680px){.cards{grid-template-columns:1fr}}
.card{background:var(--bg2);border:1px solid var(--b1);border-radius:18px;padding:22px;display:flex;flex-direction:column}
.card-hd{margin-bottom:14px}
.card-hd h2{font-size:20px;font-weight:800;line-height:1.1;margin-bottom:5px}
.tag{display:inline-block;font-size:11px;font-weight:700;padding:3px 9px;border-radius:20px;white-space:nowrap}
.tag.b{background:rgba(240,185,11,.12);color:var(--gold);border:1px solid rgba(240,185,11,.3)}
.tag.y{background:rgba(247,147,26,.12);color:var(--orange);border:1px solid rgba(247,147,26,.3)}
/* 할인 pill */
.disc{display:flex;flex-direction:column;align-items:flex-start;gap:2px;background:var(--bg3);border:1px solid var(--b1);border-radius:12px;padding:11px 13px;margin-bottom:8px}
.disc .pct{font-size:18px;font-weight:800;letter-spacing:-.3px;white-space:nowrap}
.disc.b .pct{color:var(--gold)}.disc.y .pct{color:var(--orange)}
.disc .bo{font-size:11.5px;color:var(--t2);line-height:1.3}
.card p.d{color:var(--t2);font-size:13px;line-height:1.7;margin-bottom:16px}
.pc{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:16px;flex-grow:1;align-content:start}
@media(max-width:400px){.pc{grid-template-columns:1fr}}
.pc h3{font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--t3);margin-bottom:7px}
.pc ul{list-style:none}
.pc li{font-size:12px;color:var(--t2);padding:3px 0 3px 17px;position:relative;line-height:1.45}
.pc .pros li::before{content:"✓";position:absolute;left:0;color:var(--green);font-weight:700}
.pc .cons li::before{content:"–";position:absolute;left:2px;color:var(--t3);font-weight:700}
.feat{font-size:10.5px;color:var(--t3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:8px}
.card>ul.f{list-style:none;margin-bottom:18px;flex-grow:1}
.card>ul.f li{font-size:12.5px;color:var(--t1);padding:4px 0 4px 20px;position:relative}
.card>ul.f li::before{content:"✓";position:absolute;left:0;color:var(--green);font-weight:700}
.cta{display:block;margin-top:auto;text-align:center;text-decoration:none;font-weight:800;font-size:14px;padding:14px 16px;border-radius:12px;transition:transform .1s,opacity .15s}
.cta:active{transform:scale(.98)}.cta:hover{opacity:.92}
.cta.b{background:linear-gradient(135deg,#f0b90b,#f8d33a);color:#000}
.cta.y{background:linear-gradient(135deg,#f7931a,#fdba74);color:#000}
.verify{font-size:11.5px;color:var(--t3);margin-top:14px;line-height:1.6;padding-left:2px}
/* why 섹션 */
.why{background:var(--bg2);border:1px solid var(--b1);border-radius:16px;padding:20px 22px;margin-top:26px}
.why h2{font-size:16px;font-weight:800;margin-bottom:14px}
.why ol{list-style:none;counter-reset:w;display:flex;flex-direction:column;gap:12px}
.why li{counter-increment:w;position:relative;padding-left:34px;font-size:13px;color:var(--t2);line-height:1.6}
.why li::before{content:counter(w);position:absolute;left:0;top:0;width:22px;height:22px;border-radius:7px;background:rgba(247,147,26,.14);color:var(--orange);font-size:12px;font-weight:800;display:flex;align-items:center;justify-content:center}
/* 공식 이미지 */
.official{margin-top:26px;text-align:center}
.official img{max-width:320px;width:100%;border-radius:14px;border:1px solid var(--b1)}
.official .cap{font-size:11px;color:var(--t3);margin-top:8px}
.note{font-size:12px;color:var(--t3);margin-top:24px;line-height:1.6}
.risk{font-size:12px;color:var(--red);background:rgba(239,68,68,.07);border:1px solid rgba(239,68,68,.2);border-radius:12px;padding:12px 14px;margin-top:14px;line-height:1.55}
footer{border-top:1px solid var(--b1);padding:24px;text-align:center;font-size:11px;color:var(--t3)}
footer a{color:var(--t3);text-decoration:underline}
</style>
<script src="/lang-common.js"></script>
</head>
<body>
<nav><div class="nav-w">
  <a href="<?= h(i18nPath('/', $lang)) ?>" class="logo">
    <svg class="logo-ic" width="19" height="19" viewBox="0 0 64 64" aria-hidden="true"><rect x="2" y="2" width="60" height="60" rx="15" fill="#0d0d10"/><path d="M13 44 A19 19 0 0 1 51 44" fill="none" stroke="#6a6d75" stroke-width="6" stroke-linecap="round"/><path d="M13 44 A19 19 0 0 1 44 26" fill="none" stroke="#f7931a" stroke-width="6" stroke-linecap="round"/><circle cx="51" cy="44" r="3.6" fill="#6a6d75"/><circle cx="13" cy="44" r="3.6" fill="#f7931a"/><circle cx="44" cy="26" r="3.6" fill="#f7931a"/><polyline points="22,40 29,33 35,37 45,25" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/><polyline points="39,25 45,25 45,31" fill="none" stroke="#fafafa" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
    BTC<span>timing</span>
  </a>
  <span class="back">← <a href="<?= h(i18nPath('/', $lang)) ?>"><?= h($t['back']) ?></a></span>
  <?php $__nbLang = $lang; $__nbHide = ''; include __DIR__ . '/_nav_btns.php'; ?>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" onclick="document.getElementById('langDropdown').classList.toggle('open');event.stopPropagation()">
      <span><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu">
      <?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
      <a class="lang-menu-item<?= $lc===$lang ? ' active' : '' ?>" href="<?= h(i18nPath('/exchanges.php', $lc)) ?>"><?= h($LNG[$lc] ?? strtoupper($lc)) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>

<div class="wrap">
  <h1><?= h($t['h1']) ?></h1>
  <p class="lead"><?= $t['lead'] ?></p>

  <div class="promo">
    <span class="promo-ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f7931a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12V8H6a2 2 0 0 1 0-4h12v4"/><path d="M4 6v12a2 2 0 0 0 2 2h14v-4"/><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/></svg></span>
    <span class="promo-tx"><span class="s"><?= h($t['hero_disc']) ?></span><span class="l"><?= h($t['hero_disc2']) ?></span></span>
  </div>

  <div class="cards">
    <!-- Binance -->
    <div class="card">
      <div class="card-hd">
        <div><h2>Binance</h2><span class="tag b"><?= h($t['binance_tag']) ?></span></div>
      </div>
      <div class="disc b"><span class="pct"><?= h($discB) ?></span><span class="bo"><?= h($t['bonus']) ?></span></div>
      <p class="d"><?= h($t['binance_desc']) ?></p>
      <div class="pc">
        <div class="pros"><h3><?= h($t['pros_label']) ?></h3><ul><?php foreach ($t['pros_b'] as $p): ?><li><?= h($p) ?></li><?php endforeach; ?></ul></div>
        <div class="cons"><h3><?= h($t['cons_label']) ?></h3><ul><?php foreach ($t['cons_b'] as $p): ?><li><?= h($p) ?></li><?php endforeach; ?></ul></div>
      </div>
      <a class="cta b" href="<?= h($REF_BINANCE) ?>" target="_blank" rel="sponsored nofollow noopener"><?= h($t['cta_binance']) ?></a>
    </div>
    <!-- Bybit -->
    <div class="card">
      <div class="card-hd">
        <div><h2>Bybit</h2><span class="tag y"><?= h($t['bybit_tag']) ?></span></div>
      </div>
      <div class="disc y"><span class="pct"><?= h($discY) ?></span><span class="bo"><?= h($t['bonus_y']) ?></span></div>
      <p class="d"><?= h($t['bybit_desc']) ?></p>
      <div class="pc">
        <div class="pros"><h3><?= h($t['pros_label']) ?></h3><ul><?php foreach ($t['pros_y'] as $p): ?><li><?= h($p) ?></li><?php endforeach; ?></ul></div>
        <div class="cons"><h3><?= h($t['cons_label']) ?></h3><ul><?php foreach ($t['cons_y'] as $p): ?><li><?= h($p) ?></li><?php endforeach; ?></ul></div>
      </div>
      <a class="cta y" href="<?= h($REF_BYBIT) ?>" target="_blank" rel="sponsored nofollow noopener"><?= h($t['cta_bybit']) ?></a>
    </div>
  </div>

  <p class="verify"><?= h($t['verify_note']) ?></p>

  <div class="why">
    <h2><?= h($t['why_title']) ?></h2>
    <ol><?php foreach ($t['why'] as $w): ?><li><?= h($w) ?></li><?php endforeach; ?></ol>
  </div>

  <?php if (file_exists($OFFICIAL_IMG)): ?>
  <div class="official">
    <a href="<?= h($REF_BINANCE) ?>" target="_blank" rel="sponsored nofollow noopener"><img src="/binance-referral.png?v=<?= @filemtime($OFFICIAL_IMG) ?>" alt="Binance referral"></a>
    <div class="cap"><?= h($t['cta_binance']) ?></div>
  </div>
  <?php endif; ?>

  <p class="note"><?= h($t['note']) ?></p>
  <div class="risk"><?= h($t['risk']) ?></div>
</div>

<footer>
  © 2026 BTCtiming.com ·
  <a href="/rss-guide.php"><?= h($t['f_rss'] ?? 'RSS') ?></a> ·
  <a href="<?= h(i18nPath('/sitemap-guide.php', $lang)) ?>"><?= h($t['f_sitemap']) ?></a> ·
  <a href="<?= h(i18nPath('/privacy', $lang)) ?>"><?= h($t['f_privacy']) ?></a> ·
  <a href="<?= h(i18nPath('/terms', $lang)) ?>"><?= h($t['f_terms']) ?></a> ·
  <?= h($t['f_disclaimer']) ?>
</footer>

<script>
document.addEventListener('click', function(e){
  var dd = document.getElementById('langDropdown');
  if(dd && !dd.contains(e.target)) dd.classList.remove('open');
});
</script>
<?php /* 설정 모달(⚙️) — 이 페이지는 _shared_footer 를 쓰지 않으므로 직접 include */
   include __DIR__ . '/_settings_modal.php'; ?>
</body>
</html>
