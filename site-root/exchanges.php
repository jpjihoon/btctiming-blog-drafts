<?php
require_once __DIR__ . '/config.php';

// 언어 결정 (블로그와 동일 규칙)
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
    'desc'  => '비트코인·알트코인 선물 거래를 시작할 거래소 비교. 바이낸스와 바이비트의 특징, 장단점, 수수료 할인 혜택을 정리했습니다.',
    'back'  => '실시간 분석으로 돌아가기',
    'h1'    => '어느 거래소로 시작할까?',
    'lead'  => 'BTCtiming의 점수를 실제 거래로 옮기려면 거래소 계정이 필요합니다. 세계에서 가장 많이 쓰이는 두 거래소를 비교했습니다. 아래 링크로 가입하면 거래 수수료 할인 혜택을 받을 수 있습니다.',
    'binance_tag' => '세계 1위 거래량',
    'binance_desc'=> '전 세계에서 거래량이 가장 많은 거래소입니다. 350개 이상의 코인을 상장해 알트코인 선택폭이 넓고, 유동성이 깊어 큰 금액도 슬리피지 없이 체결됩니다. 현물·선물·마진·스테이킹·런치패드까지 한 곳에서 처리할 수 있어, 처음 시작하는 사람부터 전문 트레이더까지 폭넓게 씁니다. 한국어 지원과 입문 자료도 충실합니다.',
    'bybit_tag'   => '선물 트레이더 선호',
    'bybit_desc'  => '선물·파생상품에 특화된 거래소로, 단타와 레버리지 트레이더 사이에서 인기가 높습니다. 주문 체결 속도가 빠르고 인터페이스가 직관적이라 빠른 진입·청산에 유리합니다. 최대 100배 레버리지, 다양한 주문 유형, 카피 트레이딩을 지원하며, 선물 거래 수수료가 경쟁력 있습니다.',
    'feat'        => '주요 특징',
    'b1'          => ['350개+ 코인 상장', '세계 최고 수준의 유동성', '현물·선물·스테이킹 통합', '초보자 친화적 UI'],
    'b2'          => ['선물·파생상품 특화', '빠른 체결 속도', '최대 100배 레버리지', '카피 트레이딩 지원'],
    'cta_binance' => '바이낸스 가입하고 수수료 할인 받기',
    'cta_bybit'   => '바이비트 가입하고 수수료 할인 받기',
    'note'        => '위 링크로 가입하면 거래 수수료 할인 혜택을 받을 수 있습니다.',
    'risk'        => '⚠ 암호화폐 거래, 특히 선물·레버리지 거래는 높은 손실 위험을 동반합니다. BTCtiming의 점수는 정보 제공용이며 투자 조언이 아닙니다. 본인의 판단과 책임하에 거래하세요.',
    'f_privacy'   => '개인정보처리방침', 'f_terms' => '이용약관',
    'f_sitemap'   => '사이트맵', 'f_disclaimer' => '투자 조언이 아닙니다',
  ],
  'en' => [
    'title' => 'Best Exchange — Binance vs Bybit | BTCtiming',
    'desc'  => 'Compare exchanges to start trading Bitcoin and altcoin futures. Features, pros and cons, and fee discounts for Binance and Bybit.',
    'back'  => 'Back to Live Analysis',
    'h1'    => 'Which exchange should you start with?',
    'lead'  => 'To act on BTCtiming scores you need an exchange account. We compared the two most widely used exchanges worldwide. Signing up via the links below gets you a trading fee discount.',
    'binance_tag' => '#1 by volume',
    'binance_desc'=> 'The highest-volume exchange in the world. With 350+ listed coins it offers a wide range of altcoins, and its deep liquidity fills large orders with minimal slippage. Spot, futures, margin, staking and launchpad are all in one place, making it popular with everyone from first-timers to pro traders. Solid beginner resources too.',
    'bybit_tag'   => 'Favored by futures traders',
    'bybit_desc'  => 'A derivatives-focused exchange, popular among scalpers and leverage traders. Fast order execution and a clean interface make quick entries and exits easy. It offers up to 100x leverage, a range of order types, copy trading, and competitive futures fees.',
    'feat'        => 'Key features',
    'b1'          => ['350+ coins listed', 'World-class liquidity', 'Spot, futures & staking in one', 'Beginner-friendly UI'],
    'b2'          => ['Futures & derivatives focus', 'Fast execution', 'Up to 100x leverage', 'Copy trading support'],
    'cta_binance' => 'Sign up on Binance & get a fee discount',
    'cta_bybit'   => 'Sign up on Bybit & get a fee discount',
    'note'        => 'Signing up via the links above gets you a trading fee discount.',
    'risk'        => '⚠ Crypto trading, especially futures and leverage, carries a high risk of loss. BTCtiming scores are for information only and are not financial advice. Trade at your own discretion and risk.',
    'f_privacy'   => 'Privacy Policy', 'f_terms' => 'Terms of Service',
    'f_sitemap'   => 'Sitemap', 'f_disclaimer' => 'Not financial advice',
  ],
  'ja' => [
    'title' => 'おすすめ取引所 — Binance vs Bybit | BTCtiming',
    'desc'  => 'ビットコイン・アルトコインの先物取引を始める取引所を比較。BinanceとBybitの特徴、長所短所、手数料割引をまとめました。',
    'back'  => 'リアルタイム分析に戻る',
    'h1'    => 'どの取引所から始める?',
    'lead'  => 'BTCtimingのスコアを実際の取引に活かすには取引所口座が必要です。世界で最も使われている2つの取引所を比較しました。下のリンクから登録すると取引手数料の割引を受けられます。',
    'binance_tag' => '取引量世界1位',
    'binance_desc'=> '世界で最も取引量の多い取引所です。350以上の銘柄を上場しアルトコインの選択肢が広く、流動性が深いため大口注文もスリッページなく約定します。現物・先物・証拠金・ステーキング・ローンチパッドまで一箇所で完結でき、初心者からプロまで幅広く利用しています。日本語対応と入門資料も充実。',
    'bybit_tag'   => '先物トレーダーに人気',
    'bybit_desc'  => '先物・デリバティブに特化した取引所で、スキャルピングやレバレッジ取引者に人気です。注文約定が速く、直感的なUIで素早いエントリー・決済に有利。最大100倍レバレッジ、多様な注文タイプ、コピートレードに対応し、先物手数料が競争力あります。',
    'feat'        => '主な特徴',
    'b1'          => ['350以上の銘柄', '世界最高水準の流動性', '現物・先物・ステーキング統合', '初心者に優しいUI'],
    'b2'          => ['先物・デリバティブ特化', '高速約定', '最大100倍レバレッジ', 'コピートレード対応'],
    'cta_binance' => 'Binanceに登録して手数料割引を受ける',
    'cta_bybit'   => 'Bybitに登録して手数料割引を受ける',
    'note'        => '上記のリンクから登録すると取引手数料の割引を受けられます。',
    'risk'        => '⚠ 暗号資産取引、特に先物・レバレッジ取引は高い損失リスクを伴います。BTCtimingのスコアは情報提供用であり投資助言ではありません。自己の判断と責任で取引してください。',
    'f_privacy'   => 'プライバシーポリシー', 'f_terms' => '利用規約',
    'f_sitemap'   => 'サイトマップ', 'f_disclaimer' => '投資助言ではありません',
  ],
  'es' => [
    'title' => 'Mejor Exchange — Binance vs Bybit | BTCtiming',
    'desc'  => 'Compara exchanges para operar futuros de Bitcoin y altcoins. Características, pros y contras, y descuentos de comisiones de Binance y Bybit.',
    'back'  => 'Volver al Análisis en Vivo',
    'h1'    => '¿Con qué exchange empezar?',
    'lead'  => 'Para actuar sobre las puntuaciones de BTCtiming necesitas una cuenta de exchange. Comparamos los dos exchanges más usados del mundo. Registrarte con los enlaces de abajo te da un descuento en comisiones de trading.',
    'binance_tag' => '#1 por volumen',
    'binance_desc'=> 'El exchange de mayor volumen del mundo. Con más de 350 monedas listadas ofrece una amplia gama de altcoins, y su profunda liquidez ejecuta órdenes grandes con mínimo deslizamiento. Spot, futuros, margen, staking y launchpad en un solo lugar, popular desde principiantes hasta traders profesionales. Buenos recursos para empezar.',
    'bybit_tag'   => 'Preferido por traders de futuros',
    'bybit_desc'  => 'Un exchange enfocado en derivados, popular entre scalpers y traders con apalancamiento. Ejecución rápida e interfaz limpia facilitan entradas y salidas rápidas. Ofrece hasta 100x de apalancamiento, varios tipos de órdenes, copy trading y comisiones de futuros competitivas.',
    'feat'        => 'Características clave',
    'b1'          => ['Más de 350 monedas', 'Liquidez de primer nivel', 'Spot, futuros y staking', 'Interfaz para principiantes'],
    'b2'          => ['Enfoque en futuros', 'Ejecución rápida', 'Hasta 100x apalancamiento', 'Copy trading'],
    'cta_binance' => 'Regístrate en Binance y obtén descuento',
    'cta_bybit'   => 'Regístrate en Bybit y obtén descuento',
    'note'        => 'Registrarte con los enlaces de arriba te da un descuento en comisiones de trading.',
    'risk'        => '⚠ Operar con cripto, especialmente futuros y apalancamiento, conlleva un alto riesgo de pérdida. Las puntuaciones de BTCtiming son solo informativas y no son asesoramiento financiero. Opera bajo tu propio criterio y riesgo.',
    'f_privacy'   => 'Política de Privacidad', 'f_terms' => 'Términos de Servicio',
    'f_sitemap'   => 'Mapa del sitio', 'f_disclaimer' => 'No es asesoramiento financiero',
  ],
  'de' => [
    'title' => 'Beste Börse — Binance vs Bybit | BTCtiming',
    'desc'  => 'Vergleiche Börsen für den Handel mit Bitcoin- und Altcoin-Futures. Merkmale, Vor- und Nachteile sowie Gebührenrabatte von Binance und Bybit.',
    'back'  => 'Zurück zur Live-Analyse',
    'h1'    => 'Mit welcher Börse anfangen?',
    'lead'  => 'Um BTCtiming-Scores umzusetzen, brauchst du ein Börsenkonto. Wir haben die zwei weltweit meistgenutzten Börsen verglichen. Mit den Links unten erhältst du einen Rabatt auf die Handelsgebühren.',
    'binance_tag' => 'Nr. 1 nach Volumen',
    'binance_desc'=> 'Die umsatzstärkste Börse der Welt. Mit über 350 gelisteten Coins bietet sie eine große Auswahl an Altcoins, und die tiefe Liquidität führt große Orders mit minimalem Slippage aus. Spot, Futures, Margin, Staking und Launchpad an einem Ort — beliebt von Einsteigern bis Profis. Gute Einsteiger-Ressourcen.',
    'bybit_tag'   => 'Von Futures-Tradern bevorzugt',
    'bybit_desc'  => 'Eine auf Derivate fokussierte Börse, beliebt bei Scalpern und Hebel-Tradern. Schnelle Orderausführung und eine klare Oberfläche erleichtern schnelle Ein- und Ausstiege. Bis zu 100x Hebel, verschiedene Ordertypen, Copy-Trading und wettbewerbsfähige Futures-Gebühren.',
    'feat'        => 'Hauptmerkmale',
    'b1'          => ['Über 350 Coins', 'Erstklassige Liquidität', 'Spot, Futures & Staking', 'Einsteigerfreundlich'],
    'b2'          => ['Futures-Fokus', 'Schnelle Ausführung', 'Bis zu 100x Hebel', 'Copy-Trading'],
    'cta_binance' => 'Bei Binance anmelden & Rabatt erhalten',
    'cta_bybit'   => 'Bei Bybit anmelden & Rabatt erhalten',
    'note'        => 'Mit den Links oben erhältst du einen Rabatt auf die Handelsgebühren.',
    'risk'        => '⚠ Krypto-Handel, besonders Futures und Hebel, birgt ein hohes Verlustrisiko. BTCtiming-Scores dienen nur der Information und sind keine Finanzberatung. Handle nach eigenem Ermessen und Risiko.',
    'f_privacy'   => 'Datenschutzerklärung', 'f_terms' => 'Nutzungsbedingungen',
    'f_sitemap'   => 'Sitemap', 'f_disclaimer' => 'Keine Finanzberatung',
  ],
  'fr' => [
    'title' => 'Meilleure plateforme — Binance vs Bybit | BTCtiming',
    'desc'  => 'Comparez les plateformes pour trader les futures Bitcoin et altcoins. Caractéristiques, avantages et inconvénients, réductions de frais de Binance et Bybit.',
    'back'  => 'Retour à l\'analyse en direct',
    'h1'    => 'Par quelle plateforme commencer ?',
    'lead'  => 'Pour appliquer les scores BTCtiming, il vous faut un compte sur une plateforme d\'échange. Nous avons comparé les deux plateformes les plus utilisées au monde. S\'inscrire via les liens ci-dessous vous donne une réduction sur les frais de trading.',
    'binance_tag' => 'N°1 en volume',
    'binance_desc'=> 'La plateforme au plus gros volume au monde. Avec plus de 350 cryptos listées, elle offre un large choix d\'altcoins, et sa liquidité profonde exécute les gros ordres avec un slippage minimal. Spot, futures, margin, staking et launchpad au même endroit — populaire des débutants aux pros. Bonnes ressources pour débutants.',
    'bybit_tag'   => 'Prisée des traders de futures',
    'bybit_desc'  => 'Une plateforme axée sur les dérivés, populaire auprès des scalpers et traders à effet de levier. L\'exécution rapide des ordres et une interface épurée facilitent les entrées et sorties rapides. Jusqu\'à 100x de levier, divers types d\'ordres, copy trading et frais de futures compétitifs.',
    'feat'        => 'Caractéristiques clés',
    'b1'          => ['350+ cryptos listées', 'Liquidité de premier ordre', 'Spot, futures et staking réunis', 'Interface adaptée aux débutants'],
    'b2'          => ['Axée futures et dérivés', 'Exécution rapide', 'Jusqu\'à 100x de levier', 'Copy trading disponible'],
    'cta_binance' => 'S\'inscrire sur Binance et obtenir une réduction',
    'cta_bybit'   => 'S\'inscrire sur Bybit et obtenir une réduction',
    'note'        => 'S\'inscrire via les liens ci-dessus vous donne une réduction sur les frais de trading.',
    'risk'        => '⚠ Le trading de crypto, surtout les futures et l\'effet de levier, comporte un risque de perte élevé. Les scores BTCtiming sont fournis à titre informatif uniquement et ne constituent pas un conseil financier. Tradez à votre propre discrétion et à vos risques.',
    'f_privacy'   => 'Politique de confidentialité', 'f_terms' => 'Conditions d\'utilisation',
    'f_sitemap'   => 'Plan du site', 'f_disclaimer' => 'Pas un conseil financier',
  ],
  'pt' => [
    'title' => 'Melhor corretora — Binance vs Bybit | BTCtiming',
    'desc'  => 'Compare corretoras para começar a operar futuros de Bitcoin e altcoins. Características, prós e contras e descontos de taxas da Binance e Bybit.',
    'back'  => 'Voltar à análise ao vivo',
    'h1'    => 'Por qual corretora começar?',
    'lead'  => 'Para aplicar as pontuações do BTCtiming você precisa de uma conta em corretora. Comparamos as duas corretoras mais usadas no mundo. Cadastrar-se pelos links abaixo garante um desconto na taxa de negociação.',
    'binance_tag' => 'Nº 1 em volume',
    'binance_desc'=> 'A corretora de maior volume do mundo. Com mais de 350 moedas listadas, oferece ampla variedade de altcoins, e sua liquidez profunda executa grandes ordens com slippage mínimo. Spot, futuros, margem, staking e launchpad em um só lugar — popular de iniciantes a profissionais. Bons materiais para iniciantes.',
    'bybit_tag'   => 'Preferida por traders de futuros',
    'bybit_desc'  => 'Uma corretora focada em derivativos, popular entre scalpers e traders de alavancagem. Execução rápida de ordens e uma interface limpa facilitam entradas e saídas rápidas. Oferece até 100x de alavancagem, vários tipos de ordem, copy trading e taxas de futuros competitivas.',
    'feat'        => 'Principais recursos',
    'b1'          => ['350+ moedas listadas', 'Liquidez de classe mundial', 'Spot, futuros e staking juntos', 'Interface amigável para iniciantes'],
    'b2'          => ['Foco em futuros e derivativos', 'Execução rápida', 'Até 100x de alavancagem', 'Suporte a copy trading'],
    'cta_binance' => 'Cadastre-se na Binance e ganhe desconto',
    'cta_bybit'   => 'Cadastre-se na Bybit e ganhe desconto',
    'note'        => 'Cadastrar-se pelos links acima garante um desconto na taxa de negociação.',
    'risk'        => '⚠ Negociar cripto, especialmente futuros e alavancagem, envolve alto risco de perda. As pontuações do BTCtiming são apenas informativas e não constituem aconselhamento financeiro. Negocie por sua conta e risco.',
    'f_privacy'   => 'Política de Privacidade', 'f_terms' => 'Termos de Serviço',
    'f_sitemap'   => 'Mapa do site', 'f_disclaimer' => 'Não é aconselhamento financeiro',
  ],
  'tr' => [
    'title' => 'En İyi Borsa — Binance vs Bybit | BTCtiming',
    'desc'  => 'Bitcoin ve altcoin vadeli işlemlerine başlamak için borsaları karşılaştırın. Binance ve Bybit\'in özellikleri, artıları eksileri ve komisyon indirimleri.',
    'back'  => 'Canlı analize dön',
    'h1'    => 'Hangi borsayla başlamalı?',
    'lead'  => 'BTCtiming puanlarını uygulamak için bir borsa hesabına ihtiyacınız var. Dünyada en çok kullanılan iki borsayı karşılaştırdık. Aşağıdaki bağlantılardan kaydolmak size işlem komisyonu indirimi sağlar.',
    'binance_tag' => 'Hacimde 1 numara',
    'binance_desc'=> 'Dünyanın en yüksek hacimli borsası. 350\'den fazla listelenmiş coin ile geniş bir altcoin yelpazesi sunar ve derin likiditesi büyük emirleri minimum kaymayla gerçekleştirir. Spot, vadeli, marjin, staking ve launchpad tek yerde — yeni başlayanlardan profesyonellere kadar popüler. İyi başlangıç kaynakları da var.',
    'bybit_tag'   => 'Vadeli traderların tercihi',
    'bybit_desc'  => 'Türev odaklı bir borsa, scalperlar ve kaldıraç traderları arasında popüler. Hızlı emir gerçekleştirme ve temiz bir arayüz, hızlı giriş ve çıkışları kolaylaştırır. 100x\'e kadar kaldıraç, çeşitli emir türleri, copy trading ve rekabetçi vadeli işlem komisyonları sunar.',
    'feat'        => 'Temel özellikler',
    'b1'          => ['350+ listelenmiş coin', 'Dünya standartında likidite', 'Spot, vadeli ve staking bir arada', 'Yeni başlayan dostu arayüz'],
    'b2'          => ['Vadeli ve türev odaklı', 'Hızlı gerçekleştirme', '100x\'e kadar kaldıraç', 'Copy trading desteği'],
    'cta_binance' => 'Binance\'e kaydol ve komisyon indirimi al',
    'cta_bybit'   => 'Bybit\'e kaydol ve komisyon indirimi al',
    'note'        => 'Yukarıdaki bağlantılardan kaydolmak size işlem komisyonu indirimi sağlar.',
    'risk'        => '⚠ Kripto ticareti, özellikle vadeli işlemler ve kaldıraç, yüksek kayıp riski taşır. BTCtiming puanları yalnızca bilgi amaçlıdır ve yatırım tavsiyesi değildir. Kendi takdirinizle ve riskinizle işlem yapın.',
    'f_privacy'   => 'Gizlilik Politikası', 'f_terms' => 'Hizmet Şartları',
    'f_sitemap'   => 'Site haritası', 'f_disclaimer' => 'Yatırım tavsiyesi değildir',
  ],
  'vi' => [
    'title' => 'Sàn tốt nhất — Binance vs Bybit | BTCtiming',
    'desc'  => 'So sánh các sàn để bắt đầu giao dịch futures Bitcoin và altcoin. Tính năng, ưu nhược điểm và ưu đãi giảm phí của Binance và Bybit.',
    'back'  => 'Quay lại phân tích trực tiếp',
    'h1'    => 'Nên bắt đầu với sàn nào?',
    'lead'  => 'Để áp dụng điểm BTCtiming, bạn cần một tài khoản sàn giao dịch. Chúng tôi đã so sánh hai sàn được dùng nhiều nhất thế giới. Đăng ký qua các liên kết bên dưới sẽ giúp bạn được giảm phí giao dịch.',
    'binance_tag' => 'Số 1 về khối lượng',
    'binance_desc'=> 'Sàn có khối lượng giao dịch lớn nhất thế giới. Với hơn 350 coin được niêm yết, sàn cung cấp nhiều lựa chọn altcoin, và thanh khoản sâu giúp khớp các lệnh lớn với trượt giá tối thiểu. Spot, futures, margin, staking và launchpad đều ở một nơi — phổ biến từ người mới đến trader chuyên nghiệp. Tài liệu cho người mới cũng tốt.',
    'bybit_tag'   => 'Được trader futures ưa chuộng',
    'bybit_desc'  => 'Một sàn tập trung vào phái sinh, phổ biến với scalper và trader đòn bẩy. Khớp lệnh nhanh và giao diện gọn gàng giúp vào/ra lệnh nhanh chóng. Sàn cung cấp đòn bẩy tới 100x, nhiều loại lệnh, copy trading và phí futures cạnh tranh.',
    'feat'        => 'Tính năng chính',
    'b1'          => ['350+ coin niêm yết', 'Thanh khoản đẳng cấp thế giới', 'Spot, futures và staking cùng nơi', 'Giao diện thân thiện người mới'],
    'b2'          => ['Tập trung futures và phái sinh', 'Khớp lệnh nhanh', 'Đòn bẩy tới 100x', 'Hỗ trợ copy trading'],
    'cta_binance' => 'Đăng ký Binance và nhận giảm phí',
    'cta_bybit'   => 'Đăng ký Bybit và nhận giảm phí',
    'note'        => 'Đăng ký qua các liên kết trên sẽ giúp bạn được giảm phí giao dịch.',
    'risk'        => '⚠ Giao dịch crypto, đặc biệt là futures và đòn bẩy, mang rủi ro thua lỗ cao. Điểm BTCtiming chỉ mang tính thông tin và không phải lời khuyên tài chính. Hãy giao dịch theo quyết định và rủi ro của riêng bạn.',
    'f_privacy'   => 'Chính sách bảo mật', 'f_terms' => 'Điều khoản dịch vụ',
    'f_sitemap'   => 'Sơ đồ trang', 'f_disclaimer' => 'Không phải lời khuyên tài chính',
  ],
];
$t = $T[$lang] ?? $T['en'];
$canonical = 'https://www.btctiming.com/exchanges.php' . $urlSuffix;
// 언어 드롭다운 이름: SUPPORTED_LANGS(config.php)의 flag+name → 언어 추가 시 이 파일 불변
$LNG = [];
foreach (SUPPORTED_LANGS as $__lc => $__m) { $LNG[$__lc] = ($__m['flag'] ?? '') . ' ' . ($__m['name'] ?? strtoupper($__lc)); }
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
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
body{background:#080808;color:#f0f0f0;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:14px;line-height:1.6;min-height:100vh;display:flex;flex-direction:column}
a{color:inherit}
/* ── 헤더 (블로그 리스트와 동일) ── */
nav{background:#0f0f0f;border-bottom:1px solid rgba(255,255,255,0.06);position:sticky;top:0;z-index:200;height:52px}
.nav-w{max-width:1280px;margin:0 auto;padding:0 16px;height:52px;display:flex;align-items:center;gap:12px}
.logo{font-size:15px;font-weight:700;letter-spacing:-.5px;color:#f0f0f0;text-decoration:none}.logo span{color:#fbbf24}
.back{font-size:13px;color:#666666;flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.back a{color:#666666;text-decoration:none}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:#151515;border:1px solid rgba(255,255,255,0.06);border-radius:8px;color:#f0f0f0;font-size:11px;font-weight:700;letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:#1a1a1a}
.lang-caret{font-size:9px;color:#666666;transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:#0f0f0f;border:1px solid rgba(255,255,255,0.06);border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.4);overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;border:none;color:#aaaaaa;font-size:12px;font-weight:600;text-align:left;text-decoration:none;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:#151515;color:#f0f0f0}
.lang-menu-item.active{color:#fb923c;background:rgba(247,147,26,.08)}
/* ── 본문 ── */
.wrap{max-width:840px;margin:0 auto;width:100%;padding:32px 16px;flex:1}
h1{font-size:26px;font-weight:800;letter-spacing:-.5px;margin-bottom:12px}
.lead{color:#a1a1aa;margin-bottom:28px;font-size:14px}
.cards{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:640px){.cards{grid-template-columns:1fr}}
.card{background:#0f0f0f;border:1px solid rgba(255,255,255,.06);border-radius:16px;padding:22px;display:flex;flex-direction:column}
.card h2{font-size:20px;font-weight:800;margin-bottom:6px}
.tag{display:inline-block;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;margin-bottom:12px;width:fit-content}
.tag.b{background:rgba(240,185,11,.12);color:#f0b90b;border:1px solid rgba(240,185,11,.3)}
.tag.y{background:rgba(251,146,60,.12);color:#fb923c;border:1px solid rgba(251,146,60,.3)}
.card p.d{color:#a1a1aa;font-size:13px;margin-bottom:16px}
.feat{font-size:11px;color:#71717a;text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px}
.card ul{list-style:none;margin-bottom:20px;flex-grow:1}
.card li{font-size:13px;color:#f0f0f0;padding:5px 0 5px 22px;position:relative}
.card li::before{content:"✓";position:absolute;left:0;color:#4ade80;font-weight:700}
.cta{display:block;text-align:center;text-decoration:none;font-weight:700;font-size:14px;padding:13px 16px;border-radius:12px;transition:transform .1s,opacity .15s}
.cta:active{transform:scale(.98)}
.cta.b{background:linear-gradient(135deg,#f0b90b,#f8d33a);color:#000}
.cta.y{background:linear-gradient(135deg,#fb923c,#fdba74);color:#000}
.cta:hover{opacity:.92}
.note{font-size:12px;color:#71717a;margin-top:22px;line-height:1.6}
.risk{font-size:12px;color:#f87171;background:rgba(248,113,113,.07);border:1px solid rgba(248,113,113,.2);border-radius:12px;padding:12px 14px;margin-top:14px;line-height:1.55}
/* ── 푸터 (블로그 리스트와 동일) ── */
footer{border-top:1px solid rgba(255,255,255,.06);padding:24px;text-align:center;font-size:11px;color:#666666}
footer a{color:#666666;text-decoration:underline}
</style>
</head>
<body>
<nav><div class="nav-w">
  <a href="/<?= h($urlSuffix) ?>" class="logo">BTC<span>timing</span></a>
  <span class="back">← <a href="/<?= h($urlSuffix) ?>"><?= h($t['back']) ?></a></span>
  <div class="lang-dropdown" id="langDropdown">
    <button type="button" class="lang-trigger" onclick="document.getElementById('langDropdown').classList.toggle('open');event.stopPropagation()">
      <span><?= strtoupper($lang) ?></span><span class="lang-caret">▾</span>
    </button>
    <div class="lang-menu">
      <?php foreach (array_keys(SUPPORTED_LANGS) as $lc): ?>
      <a class="lang-menu-item<?= $lc===$lang ? ' active' : '' ?>" href="/exchanges.php<?= h(langSuffix($lc)) ?>"><?= h($LNG[$lc] ?? strtoupper($lc)) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</div></nav>

<div class="wrap">
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

<footer>
  © 2026 BTCtiming.com ·
  <a href="/rss-guide.php"><?= h($t['f_rss'] ?? 'RSS') ?></a> ·
  <a href="/sitemap-guide.php<?= h($urlSuffix) ?>"><?= h($t['f_sitemap']) ?></a> ·
  <a href="/privacy<?= h($urlSuffix) ?>"><?= h($t['f_privacy']) ?></a> ·
  <a href="/terms<?= h($urlSuffix) ?>"><?= h($t['f_terms']) ?></a> ·
  <?= h($t['f_disclaimer']) ?>
</footer>

<script>
document.addEventListener('click', function(e){
  var dd = document.getElementById('langDropdown');
  if(dd && !dd.contains(e.target)) dd.classList.remove('open');
});
</script>
</body>
</html>
