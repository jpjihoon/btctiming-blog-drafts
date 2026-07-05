<?php
require_once __DIR__ . '/config.php';
// ── 서버사이드 언어 감지 (SEO) ──
// ?lang=en / ?lang=ja(/향후 ?lang=es 등) 요청 시 서버가 처음부터 해당 언어의 메타태그를
// 내려줘서, 구글이 언어별로 각각 별개 페이지로 색인할 수 있게 함.
// 지원 언어 목록은 config.php의 SUPPORTED_LANGS 하나로 관리 — 새 언어 추가 시 여기 코드는 안 건드려도 됨.
$lang = 'ko';
if (isset($_GET['lang']) && $_GET['lang'] !== 'ko' && array_key_exists($_GET['lang'], SUPPORTED_LANGS)) {
    $lang = $_GET['lang'];
}
$htmlLang = $lang;
$urlSuffix = langSuffix($lang);

$META = [
    'ko' => [
        'title' => '비트코인 매수 매도 타이밍 | BTCtiming.com — 온체인 지표 실시간 분석',
        'desc' => '비트코인·이더리움 등 주요 코인의 롱/숏 진입 타이밍을 온체인 지표로 분석합니다. MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, 코인베이스 프리미엄 등 13개 지표를 종합한 실시간 매수·매도 신호 — 한국 투자자를 위한 비트코인 타이밍 도구.',
        'keywords' => '비트코인 매수 타이밍, 비트코인 매도 타이밍, 코인 매수 시점, 비트코인 저점, 비트코인 고점, 온체인 지표, MVRV, NUPL, SOPR, 해시리본, 코인베이스 프리미엄, 롱숏 타이밍, 알트코인 타이밍, 이더리움 매수 타이밍, crypto entry signal, bitcoin on-chain indicator',
        'language' => 'Korean',
        'og_title' => '비트코인 매수 매도 타이밍 분석 | BTCtiming.com',
        'og_desc' => 'MVRV, NUPL, STH-SOPR, Hash Ribbon 등 온체인 지표 13개로 비트코인·알트코인 롱/숏 타이밍을 실시간 분석합니다.',
        'tw_title' => '비트코인 매수 매도 타이밍 | BTCtiming.com',
        'tw_desc' => '온체인 지표 기반 비트코인 롱/숏 타이밍 실시간 분석.',
        'og_image_alt' => 'BTCtiming.com — 비트코인 롱/숏 진입 타이밍 분석',
        'locale' => 'ko_KR',
    ],
    'en' => [
        'title' => 'Bitcoin Buy/Sell Timing | BTCtiming.com — Live On-Chain Indicator Analysis',
        'desc' => 'Real-time long/short entry timing analysis for Bitcoin, Ethereum, and major coins using on-chain indicators — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium, and 13 indicators combined into one buy/sell score.',
        'keywords' => 'bitcoin buy timing, bitcoin sell timing, crypto entry signal, bitcoin bottom, bitcoin top, on-chain indicator, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, long short timing, altcoin timing, ethereum buy timing',
        'language' => 'English',
        'og_title' => 'Bitcoin Buy/Sell Timing Analysis | BTCtiming.com',
        'og_desc' => 'Real-time long/short timing analysis for Bitcoin and altcoins using 13 on-chain indicators — MVRV, NUPL, STH-SOPR, Hash Ribbon, and more.',
        'tw_title' => 'Bitcoin Buy/Sell Timing | BTCtiming.com',
        'tw_desc' => 'Real-time Bitcoin long/short timing analysis powered by on-chain indicators.',
        'og_image_alt' => 'BTCtiming.com — Bitcoin Long/Short Entry Timing Analysis',
        'locale' => 'en_US',
    ],
    'ja' => [
        'title' => 'ビットコイン買い時・売り時タイミング | BTCtiming.com — オンチェーン指標リアルタイム分析',
        'desc' => 'ビットコイン・イーサリアムなど主要コインのロング/ショートエントリータイミングをオンチェーン指標で分析。MVRV Zスコア、NUPL、STH-SOPR、Hash Ribbon、Coinbaseプレミアムなど13指標を統合したリアルタイム売買シグナル。',
        'keywords' => 'ビットコイン 買い時, ビットコイン 売り時, 仮想通貨 エントリーシグナル, ビットコイン 底値, ビットコイン 天井, オンチェーン指標, MVRV, NUPL, SOPR, ハッシュリボン, Coinbaseプレミアム, ロングショート タイミング, アルトコイン タイミング, イーサリアム 買い時',
        'language' => 'Japanese',
        'og_title' => 'ビットコイン買い時・売り時分析 | BTCtiming.com',
        'og_desc' => 'MVRV、NUPL、STH-SOPR、Hash Ribbonなどオンチェーン指標13個でビットコイン・アルトコインのロング/ショートタイミングをリアルタイム分析。',
        'tw_title' => 'ビットコイン買い時・売り時 | BTCtiming.com',
        'tw_desc' => 'オンチェーン指標に基づくビットコインのロング/ショートタイミングをリアルタイム分析。',
        'og_image_alt' => 'BTCtiming.com — ビットコイン ロング/ショート エントリータイミング分析',
        'locale' => 'ja_JP',
    ],
    'es' => [
        'title' => 'Cuándo Comprar y Vender Bitcoin | BTCtiming.com — Análisis de Indicadores On-Chain en Vivo',
        'desc' => 'Análisis en tiempo real de puntos de entrada largo/corto para Bitcoin, Ethereum y las principales criptomonedas usando indicadores on-chain — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium y 13 indicadores combinados en una sola puntuación de compra/venta.',
        'keywords' => 'cuándo comprar bitcoin, cuándo vender bitcoin, señal de entrada cripto, suelo de bitcoin, techo de bitcoin, indicador on-chain, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, timing largo corto, timing altcoin, cuándo comprar ethereum',
        'language' => 'Spanish',
        'og_title' => 'Análisis de Compra/Venta de Bitcoin | BTCtiming.com',
        'og_desc' => 'Análisis en tiempo real de timing largo/corto para Bitcoin y altcoins usando 13 indicadores on-chain — MVRV, NUPL, STH-SOPR, Hash Ribbon y más.',
        'tw_title' => 'Cuándo Comprar y Vender Bitcoin | BTCtiming.com',
        'tw_desc' => 'Análisis en tiempo real del timing largo/corto de Bitcoin basado en indicadores on-chain.',
        'og_image_alt' => 'BTCtiming.com — Análisis de Timing de Entrada Largo/Corto en Bitcoin',
        'locale' => 'es_ES',
    ],
    'de' => [
        'title' => 'Bitcoin Kauf-/Verkaufszeitpunkt | BTCtiming.com — Live On-Chain-Indikatoren-Analyse',
        'desc' => 'Echtzeitanalyse von Long-/Short-Einstiegszeitpunkten für Bitcoin, Ethereum und wichtige Coins mithilfe von On-Chain-Indikatoren — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium und 13 Indikatoren, kombiniert zu einem Kauf-/Verkaufs-Score.',
        'keywords' => 'bitcoin kaufzeitpunkt, bitcoin verkaufszeitpunkt, krypto einstiegssignal, bitcoin boden, bitcoin höchststand, on-chain-indikator, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, long short timing, altcoin timing, ethereum kaufzeitpunkt',
        'language' => 'German',
        'og_title' => 'Bitcoin Kauf-/Verkaufsanalyse | BTCtiming.com',
        'og_desc' => 'Echtzeitanalyse von Long-/Short-Timing für Bitcoin und Altcoins mit 13 On-Chain-Indikatoren — MVRV, NUPL, STH-SOPR, Hash Ribbon und mehr.',
        'tw_title' => 'Bitcoin Kauf-/Verkaufszeitpunkt | BTCtiming.com',
        'tw_desc' => 'Echtzeitanalyse des Bitcoin Long-/Short-Timings auf Basis von On-Chain-Indikatoren.',
        'og_image_alt' => 'BTCtiming.com — Bitcoin Long-/Short-Einstiegszeitpunkt-Analyse',
        'locale' => 'de_DE',
    ],
];
$m = $META[$lang] ?? $META['en']; // SUPPORTED_LANGS에는 있지만 아직 META 콘텐츠를 안 채운 언어는 영어로 폴백

function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="<?= $htmlLang ?>">
<head>
<script src="/lang.js"></script>
<script src="https://s3.tradingview.com/tv.js" defer></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD01B9SL3K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-VD01B9SL3K');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="BTCtiming">
<meta name="theme-color" content="#080808">

<!-- Favicon -->
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCI+CiAgPGNpcmNsZSBjeD0iMzIiIGN5PSIzMiIgcj0iMzAiIGZpbGw9IiMwYTBhMGEiIHN0cm9rZT0iIzJhMmEyYSIgc3Ryb2tlLXdpZHRoPSIxLjUiLz4KICA8IS0tIGdhdWdlIGFyYzogcmVkIC0+IHllbGxvdyAtPiBncmVlbiwgc2VtaWNpcmNsZSBvdmVyIHRoZSB0b3AgLS0+CiAgPHBhdGggZD0iTTEwLDQyIEEyMiwyMiAwIDAgMSAyMSwyMi45NSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZjg3MTcxIiBzdHJva2Utd2lkdGg9IjYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPgogIDxwYXRoIGQ9Ik0yMSwyMi45NSBBMjIsMjIgMCAwIDEgNDMsMjIuOTUiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZiYmYyNCIgc3Ryb2tlLXdpZHRoPSI2IiBzdHJva2UtbGluZWNhcD0icm91bmQiLz4KICA8cGF0aCBkPSJNNDMsMjIuOTUgQTIyLDIyIDAgMCAxIDU0LDQyIiBmaWxsPSJub25lIiBzdHJva2U9IiM0YWRlODAiIHN0cm9rZS13aWR0aD0iNiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+CiAgPCEtLSBuZWVkbGUgcG9pbnRpbmcgaW50byB0aGUgZ3JlZW4gem9uZSAtLT4KICA8bGluZSB4MT0iMzIiIHkxPSI0MiIgeDI9IjQ2IiB5Mj0iMjYiIHN0cm9rZT0iI2Y1ZjVmNSIgc3Ryb2tlLXdpZHRoPSIzIiBzdHJva2UtbGluZWNhcD0icm91bmQiLz4KICA8Y2lyY2xlIGN4PSIzMiIgY3k9IjQyIiByPSI0IiBmaWxsPSIjZjVmNWY1Ii8+Cjwvc3ZnPgo=">
<link rel="manifest" href="/manifest.json">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- Title (BTC price injected dynamically by JS on top of this server-rendered default) -->
<title id="pageTitle"><?= h($m['title']) ?></title>
<meta name="description" content="<?= h($m['desc']) ?>">
<meta name="keywords" content="<?= h($m['keywords']) ?>">
<meta name="language" content="<?= h($m['language']) ?>">
<meta name="robots" content="index, follow, max-image-preview:large">
<meta name="author" content="BTCtiming.com">
<link rel="canonical" href="https://btctiming.com/<?= h($urlSuffix) ?>">
<!-- hreflang: 홈페이지의 언어별 버전이 서로 대응 관계라는 걸 구글에 명시. SUPPORTED_LANGS 기반이라 새 언어 추가시 자동 반영됨. -->
<?php foreach (SUPPORTED_LANGS as $hlLang => $hlInfo): ?>
<link rel="alternate" hreflang="<?= $hlLang ?>" href="https://btctiming.com/<?= h(langSuffix($hlLang)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="https://btctiming.com/">

<!-- Open Graph (Facebook, KakaoTalk 등 — 한국 메신저 공유 미리보기에 필수) -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= h($m['og_title']) ?>">
<meta property="og:description" content="<?= h($m['og_desc']) ?>">
<meta property="og:image" content="https://btctiming.com/og-image.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= h($m['og_image_alt']) ?>">
<meta property="og:url" content="https://btctiming.com/<?= h($urlSuffix) ?>">
<meta property="og:site_name" content="BTCtiming.com">
<meta property="og:locale" content="<?= h($m['locale']) ?>">
<?php foreach ($META as $otherLang => $otherM): if ($otherLang === $lang) continue; ?>
<meta property="og:locale:alternate" content="<?= h($otherM['locale']) ?>">
<?php endforeach; ?>

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($m['tw_title']) ?>">
<meta name="twitter:description" content="<?= h($m['tw_desc']) ?>">
<meta name="twitter:image" content="https://btctiming.com/og-image.png">

<!-- 검색엔진 소유 확인 — 아래 코드는 각 콘솔에서 발급받은 값으로 교체 필요 -->
<!-- 네이버 서치어드바이저: https://searchadvisor.naver.com -->
<meta name="naver-site-verification" content="3424f0c456a2a94b6fd6307fb36a6b3c6564ce7f">
<meta name="google-site-verification" content="ef5X4Dv1YgD5IDItze-lDpQn0zK9WDU3Q0gP3PDALpI">

<!-- FAQ 구조화 데이터 — 구글 검색결과에 리치 스니펫(질문/답변 노출)용 -->
<?php
$FAQ = [
    'ko' => [
        ['q' => '비트코인 매수 타이밍을 어떻게 알 수 있나요?',
         'a' => 'BTCtiming.com은 MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon 등 13개 온체인 지표를 종합해 0~10점으로 매수 타이밍을 실시간 분석합니다. 6점 이상이면 분할 매수 시작, 8점 이상이면 강력 매수 신호입니다.'],
        ['q' => 'MVRV Z-Score란 무엇인가요?',
         'a' => 'MVRV Z-Score는 비트코인의 시장가치(Market Value)와 실현가치(Realized Value)의 차이를 표준편차로 나눈 지표입니다. 0 이하면 역사적 저평가 구간, 3.5 이상이면 과열 구간으로 판단합니다.'],
        ['q' => 'Hash Ribbon 지표가 무엇인가요?',
         'a' => 'Hash Ribbon은 비트코인 채굴 해시레이트의 30일 이동평균이 60일 이동평균을 상향 돌파하는 시점을 포착하는 지표입니다. 역사적으로 2016년, 2018년, 2020년, 2022년 저점을 정확히 포착한 가장 신뢰도 높은 매수 선행 신호입니다.'],
        ['q' => '비트코인 반감기 이후 언제 매수하는 게 좋나요?',
         'a' => '역사적으로 반감기 12~24개월 전이 최적 매수 구간이었습니다. 2015년(2016반감기 18개월 전), 2018년(2020반감기 17개월 전), 2022년(2024반감기 17개월 전) 모두 같은 패턴이었습니다. 다음 반감기는 2028년 4월로 현재 약 22개월 전 구간입니다.'],
        ['q' => '코인베이스 프리미엄이란 무엇인가요?',
         'a' => '코인베이스 프리미엄은 코인베이스(미국)와 바이낸스의 비트코인 가격 차이를 비율로 나타낸 것입니다. 양수이면 미국 기관투자자들이 매수 중이라는 신호이며, ETF 유입 데이터보다 2~3일 앞서는 선행 지표입니다.'],
    ],
    'en' => [
        ['q' => "How can I tell Bitcoin's buy timing?",
         'a' => 'BTCtiming.com combines 13 on-chain indicators — including MVRV Z-Score, NUPL, STH-SOPR, and Hash Ribbon — into a real-time 0-10 buy timing score. A score of 6+ signals the start of split entries, and 8+ signals a strong buy.'],
        ['q' => 'What is MVRV Z-Score?',
         'a' => "MVRV Z-Score divides the gap between Bitcoin's market value and realized value by the standard deviation. A value below 0 signals historical undervaluation, while above 3.5 signals overheating."],
        ['q' => 'What is the Hash Ribbon indicator?',
         'a' => "Hash Ribbon captures the moment Bitcoin's 30-day mining hashrate moving average crosses above the 60-day average. It has historically pinpointed the 2016, 2018, 2020, and 2022 bottoms accurately, making it one of the most reliable leading buy signals."],
        ['q' => "When is the best time to buy relative to Bitcoin's halving?",
         'a' => 'Historically, 12-24 months before a halving has been the optimal buy window. 2015 (18 months before the 2016 halving), 2018 (17 months before 2020), and 2022 (17 months before 2024) all followed this pattern. The next halving is April 2028, currently about 22 months out.'],
        ['q' => 'What is Coinbase Premium?',
         'a' => 'Coinbase Premium is the percentage price difference between Bitcoin on Coinbase (US) and Binance. A positive value signals US institutional buying, and it typically leads ETF inflow data by 2-3 days.'],
    ],
    'ja' => [
        ['q' => 'ビットコインの買いタイミングはどうやって分かりますか?',
         'a' => 'BTCtiming.comはMVRV Zスコア、NUPL、STH-SOPR、Hash Ribbonなど13個のオンチェーン指標を統合し、0〜10点でリアルタイムに買いタイミングを分析します。6点以上で分割エントリー開始、8点以上で強い買いシグナルです。'],
        ['q' => 'MVRV Zスコアとは何ですか?',
         'a' => 'MVRV Zスコアは、ビットコインの時価総額(Market Value)と実現時価総額(Realized Value)の差を標準偏差で割った指標です。0以下は歴史的な割安圏、3.5以上は過熱圏と判断します。'],
        ['q' => 'Hash Ribbon指標とは何ですか?',
         'a' => 'Hash Ribbonは、ビットコインのマイニングハッシュレートの30日移動平均が60日移動平均を上抜けする瞬間を捉える指標です。過去、2016年・2018年・2020年・2022年の底値を正確に捉えた、最も信頼性の高い先行買いシグナルの一つです。'],
        ['q' => 'ビットコインの半減期を基準に、いつ買うのが良いですか?',
         'a' => '歴史的に、半減期の12〜24ヶ月前が最適な買い時でした。2015年(2016年半減期の18ヶ月前)、2018年(2020年半減期の17ヶ月前)、2022年(2024年半減期の17ヶ月前)、いずれも同じパターンでした。次回の半減期は2028年4月で、現在は約22ヶ月前の水準です。'],
        ['q' => 'Coinbaseプレミアムとは何ですか?',
         'a' => 'Coinbaseプレミアムは、Coinbase(米国)とBinanceのビットコイン価格差を比率で表したものです。プラスであれば米国機関投資家が買っているシグナルであり、ETF流入データより2〜3日先行する傾向があります。'],
    ],
    'es' => [
        ['q' => '¿Cómo puedo saber el momento de compra de Bitcoin?',
         'a' => 'BTCtiming.com combina 13 indicadores on-chain — incluyendo MVRV Z-Score, NUPL, STH-SOPR y Hash Ribbon — en una puntuación de timing de compra de 0 a 10 en tiempo real. Una puntuación de 6+ indica el inicio de entradas escalonadas, y 8+ indica una señal de compra fuerte.'],
        ['q' => '¿Qué es el MVRV Z-Score?',
         'a' => 'El MVRV Z-Score divide la diferencia entre el valor de mercado de Bitcoin y su valor realizado por la desviación estándar. Un valor por debajo de 0 indica infravaloración histórica, mientras que por encima de 3.5 indica sobrecalentamiento.'],
        ['q' => '¿Qué es el indicador Hash Ribbon?',
         'a' => 'Hash Ribbon captura el momento en que la media móvil de 30 días del hashrate de minería de Bitcoin cruza por encima de la media de 60 días. Históricamente ha identificado con precisión los suelos de 2016, 2018, 2020 y 2022, siendo una de las señales de compra líder más confiables.'],
        ['q' => '¿Cuál es el mejor momento para comprar en relación al halving de Bitcoin?',
         'a' => 'Históricamente, 12-24 meses antes de un halving ha sido la ventana óptima de compra. 2015 (18 meses antes del halving de 2016), 2018 (17 meses antes de 2020) y 2022 (17 meses antes de 2024) siguieron este patrón. El próximo halving es en abril de 2028, actualmente a unos 21 meses.'],
        ['q' => '¿Qué es el Coinbase Premium?',
         'a' => 'El Coinbase Premium es la diferencia porcentual de precio entre Bitcoin en Coinbase (EE.UU.) y Binance. Un valor positivo indica compra institucional estadounidense, y suele adelantarse 2-3 días a los datos de flujo de ETF.'],
    ],
    'de' => [
        ['q' => 'Wie erkenne ich den richtigen Kaufzeitpunkt für Bitcoin?',
         'a' => 'BTCtiming.com kombiniert 13 On-Chain-Indikatoren — darunter MVRV Z-Score, NUPL, STH-SOPR und Hash Ribbon — zu einem Echtzeit-Kaufsignal-Score von 0 bis 10. Ein Score von 6+ signalisiert den Beginn gestaffelter Einstiege, 8+ ein starkes Kaufsignal.'],
        ['q' => 'Was ist der MVRV Z-Score?',
         'a' => 'Der MVRV Z-Score teilt die Differenz zwischen Bitcoins Marktwert und realisiertem Wert durch die Standardabweichung. Ein Wert unter 0 signalisiert historische Unterbewertung, über 3,5 signalisiert Überhitzung.'],
        ['q' => 'Was ist der Hash-Ribbon-Indikator?',
         'a' => 'Hash Ribbon erfasst den Moment, in dem der 30-Tage-Durchschnitt der Bitcoin-Mining-Hashrate über den 60-Tage-Durchschnitt steigt. Historisch hat er die Tiefpunkte von 2016, 2018, 2020 und 2022 präzise erfasst — eines der zuverlässigsten Vorlauf-Kaufsignale.'],
        ['q' => 'Wann ist der beste Kaufzeitpunkt bezogen auf das Bitcoin-Halving?',
         'a' => 'Historisch waren 12-24 Monate vor einem Halving das optimale Kauffenster. 2015 (18 Monate vor dem Halving 2016), 2018 (17 Monate vor 2020) und 2022 (17 Monate vor 2024) folgten alle diesem Muster. Das nächste Halving ist im April 2028, aktuell noch etwa 21 Monate entfernt.'],
        ['q' => 'Was ist die Coinbase Premium?',
         'a' => 'Die Coinbase Premium ist die prozentuale Preisdifferenz zwischen Bitcoin auf Coinbase (USA) und Binance. Ein positiver Wert signalisiert institutionelle US-Käufe und läuft ETF-Zufluss-Daten meist 2-3 Tage voraus.'],
    ],
];
// SUPPORTED_LANGS에는 있지만 아직 FAQ 콘텐츠를 안 채운 언어는 영어로 폴백 (구조화 데이터 누락 방지)
if (!isset($FAQ[$lang])) { $lang_faq = $FAQ['en']; } else { $lang_faq = $FAQ[$lang]; }
$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(function($item) {
        return [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
        ];
    }, $lang_faq),
];
?>
<script type="application/ld+json">
<?= json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<!-- 구조화 데이터 (검색결과 리치 노출용) -->
<?php
$WEBAPP = [
    'ko' => ['alt' => '비트코인 타이밍', 'desc' => '비트코인 및 주요 알트코인의 온체인 지표 기반 롱/숏 진입 타이밍 분석 도구. MVRV Z-Score, NUPL, STH-SOPR 등 13개 지표로 실시간 매수/매도 신호를 제공합니다.', 'lang' => 'ko-KR'],
    'en' => ['alt' => 'Bitcoin Timing', 'desc' => 'A long/short entry timing analysis tool for Bitcoin and major altcoins based on on-chain indicators. Provides real-time buy/sell signals using 13 indicators including MVRV Z-Score, NUPL, and STH-SOPR.', 'lang' => 'en-US'],
    'ja' => ['alt' => 'ビットコインタイミング', 'desc' => 'ビットコインおよび主要アルトコインのオンチェーン指標に基づくロング/ショートエントリータイミング分析ツール。MVRV Zスコア、NUPL、STH-SOPRなど13の指標でリアルタイムの売買シグナルを提供します。', 'lang' => 'ja-JP'],
    'es' => ['alt' => 'Bitcoin Timing', 'desc' => 'Una herramienta de análisis de timing de entrada largo/corto para Bitcoin y las principales altcoins basada en indicadores on-chain. Ofrece señales de compra/venta en tiempo real usando 13 indicadores, incluyendo MVRV Z-Score, NUPL y STH-SOPR.', 'lang' => 'es-ES'],
    'de' => ['alt' => 'Bitcoin Timing', 'desc' => 'Ein Long-/Short-Einstiegs-Timing-Analysetool für Bitcoin und wichtige Altcoins auf Basis von On-Chain-Indikatoren. Liefert Echtzeit-Kauf-/Verkaufssignale anhand von 13 Indikatoren, darunter MVRV Z-Score, NUPL und STH-SOPR.', 'lang' => 'de-DE'],
];
$wa = $WEBAPP[$lang] ?? $WEBAPP['en']; // SUPPORTED_LANGS에는 있지만 아직 콘텐츠를 안 채운 언어는 영어로 폴백
$webAppSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebApplication',
    'name' => 'BTCtiming.com',
    'alternateName' => $wa['alt'],
    'url' => 'https://btctiming.com/',
    'description' => $wa['desc'],
    'applicationCategory' => 'FinanceApplication',
    'operatingSystem' => 'Web',
    'inLanguage' => $wa['lang'],
    'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'KRW'],
];
?>
<script type="application/ld+json">
<?= json_encode($webAppSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>

<!-- AdSense -->
<meta name="google-adsense-account" content="ca-pub-2639309536043953">
<style>
:root{
  --bg:#080808;--bg2:#0f0f0f;--bg3:#151515;--bg4:#1a1a1a;
  --b1:rgba(255,255,255,0.06);--b2:rgba(255,255,255,0.11);--b3:rgba(255,255,255,0.18);
  --t1:#f0f0f0;--t2:#aaaaaa;--t3:#666666;--t4:#252525;
  --green:#4ade80;--green2:#86efac;--green3:#bbf7d0;
  --yellow:#fbbf24;--orange:#fb923c;--red:#f87171;--blue:#60a5fa;
  --purple:#a78bfa;--pink:#f472b6;
  --rad:12px;--rad-sm:8px;--rad-lg:16px;
}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
body{background:var(--bg);color:var(--t1);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;font-size:13px;min-height:100vh;overflow-x:hidden}

/* ── SCROLLBAR ── */
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--b2);border-radius:2px}

/* ── NAV ── */
nav{background:var(--bg2);border-bottom:1px solid var(--b1);height:52px;display:flex;align-items:center;padding:0;gap:0;position:sticky;top:0;z-index:200}
.nav-inner{max-width:1280px;margin:0 auto;width:100%;display:flex;align-items:center;padding:0 16px;gap:12px}
.logo{font-size:15px;font-weight:700;letter-spacing:-.5px;white-space:nowrap;margin-right:4px;cursor:pointer;transition:opacity .15s;outline:none}
.logo:hover{opacity:.8}
.logo:focus-visible{outline:2px solid var(--orange);outline-offset:3px;border-radius:3px}
.logo span{color:var(--yellow)}
.coin-tabs{display:flex;gap:4px;overflow-x:auto;flex:1;scrollbar-width:none;-ms-overflow-style:none;-webkit-overflow-scrolling:touch}
.coin-tabs::-webkit-scrollbar{display:none}
@media(max-width:600px){
  .coin-tabs{display:none!important}
  #coinDrop{display:block!important}
}
.coin-tab{flex-shrink:0;padding:5px 12px;border-radius:99px;font-size:12px;font-weight:500;cursor:pointer;border:1px solid var(--b1);background:transparent;color:var(--t2);transition:all .15s;white-space:nowrap}
.coin-tab.active{background:var(--yellow);color:#000;border-color:var(--yellow)}
.nav-r{display:flex;align-items:center;gap:8px;flex-shrink:0;margin-left:auto}
.icon-btn{width:34px;height:34px;border-radius:var(--rad-sm);background:var(--bg3);border:1px solid var(--b1);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--t2);transition:all .15s;flex-shrink:0}
.lang-dropdown{position:relative;flex-shrink:0}
.lang-trigger{display:flex;align-items:center;gap:4px;height:34px;padding:0 10px;background:var(--bg3);
  border:1px solid var(--b1);border-radius:var(--rad-sm);color:var(--t1);font-size:11px;font-weight:700;
  letter-spacing:.02em;cursor:pointer;transition:all .15s}
.lang-trigger:hover{background:var(--bg4)}
.lang-caret{font-size:9px;color:var(--t3);transition:transform .15s}
.lang-dropdown.open .lang-caret{transform:rotate(180deg)}
.lang-menu{position:absolute;top:calc(100% + 6px);right:0;min-width:130px;background:var(--bg2);
  border:1px solid var(--b1);border-radius:var(--rad-sm);box-shadow:0 8px 24px rgba(0,0,0,.4);
  overflow:hidden;z-index:200;opacity:0;pointer-events:none;transform:translateY(-4px);transition:all .15s}
.lang-dropdown.open .lang-menu{opacity:1;pointer-events:auto;transform:translateY(0)}
.lang-menu-item{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;background:transparent;
  border:none;color:var(--t2);font-size:12px;font-weight:600;text-align:left;cursor:pointer;transition:all .1s}
.lang-menu-item:hover{background:var(--bg3);color:var(--t1)}
.lang-menu-item.active{color:var(--orange);background:rgba(247,147,26,.08)}
.nav-insight{height:34px;padding:0 11px;border-radius:var(--rad-sm);background:var(--bg3);border:1px solid var(--b1);
  display:flex;align-items:center;gap:5px;font-size:11px;font-weight:600;color:var(--t2);text-decoration:none;
  flex-shrink:0;transition:all .15s;white-space:nowrap}
.nav-insight:hover{background:var(--bg4);color:var(--t1);text-decoration:none}
@media(max-width:520px){.nav-insight span{display:none}.nav-insight{padding:0 9px}}
@media(max-width:400px){
  .nav-inner{gap:6px;padding:0 10px}
  .nav-r{gap:5px}
  #liveTag{display:none}
  .lang-trigger{padding:0 8px}
}
.icon-btn:hover{background:var(--bg4);color:var(--t1)}
.icon-btn.active{background:var(--yellow);color:#000;border-color:var(--yellow)}
#liveTag{font-size:9px;padding:2px 7px;border-radius:99px;border:1px solid rgba(74,222,128,.3);background:rgba(74,222,128,.08);color:var(--green);display:flex;align-items:center;gap:4px;white-space:nowrap}
.live-dot{width:5px;height:5px;border-radius:50%;background:var(--green);animation:pulse 1.5s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}

/* ── LAYOUT ── */
.page-wrap{max-width:1280px;margin:0 auto;width:100%}
.layout{display:grid;grid-template-columns:280px 1fr;grid-template-areas:"sidebar chart" "sidebar mainrest";gap:0;align-items:start}
.sidebar{grid-area:sidebar}
.chart-wrap-cell{grid-area:chart;padding:16px 16px 0}
@media(max-width:900px){.chart-wrap-cell{padding:16px 16px 0}}
.main{grid-area:mainrest}
@media(max-width:900px){.layout{grid-template-columns:1fr;grid-template-areas:"chart" "sidebar" "mainrest"}}
.sidebar{background:var(--bg2);border-right:1px solid var(--b1);padding:16px;display:flex;flex-direction:column;gap:12px;align-self:start}
@media(max-width:900px){.sidebar{position:static;height:auto;border-right:none;border-bottom:1px solid var(--b1)}}
.main{padding:16px;display:flex;flex-direction:column;gap:14px;min-width:0}

/* ── SCORE CARD ── */
.score-card{background:var(--bg3);border:1px solid var(--b1);border-radius:var(--rad-lg);padding:18px;position:relative;overflow:hidden;z-index:1;flex-shrink:0}
.score-card::before{content:'';position:absolute;z-index:0;inset:0;background:radial-gradient(ellipse at top left, rgba(251,191,36,.05) 0%, transparent 60%);pointer-events:none}
.score-label{font-size:10px;color:var(--t3);letter-spacing:.06em;margin-bottom:4px}
.score-num{font-size:64px;font-weight:800;line-height:1;letter-spacing:-3px}
/* 로딩 스켈레톤 — 데이터 오기 전 회색 깜빡임으로 "불러오는 중"임을 알림 */
@keyframes skShimmer{0%{opacity:.35}50%{opacity:.75}100%{opacity:.35}}
.sk-load{position:relative;color:transparent!important}
.sk-load::after{content:"";position:absolute;left:0;top:15%;width:100%;height:70%;border-radius:8px;background:var(--bg3);animation:skShimmer 1.1s ease-in-out infinite}
.score-den{font-size:18px;color:var(--t2);font-weight:400}
.score-action{font-size:20px;font-weight:700;margin-top:8px}
.score-sub{font-size:10px;color:var(--t3);margin-top:2px}
.reach-bar{height:3px;background:rgba(255,255,255,.06);border-radius:2px;overflow:hidden;margin-top:10px}
.reach-fill{height:100%;border-radius:2px;transition:width .5s ease}
.reach-pct{font-size:12px;font-weight:600;margin-top:4px}

/* ── MODE TOGGLE ── */
.mode-toggle{display:grid;grid-template-columns:1fr 1fr;gap:4px;background:var(--bg4);border-radius:var(--rad-sm);padding:3px;flex-shrink:0}
.mode-btn{padding:7px;border-radius:6px;text-align:center;cursor:pointer;font-size:11px;font-weight:600;color:var(--t2);transition:all .15s}
.mode-btn.active{background:var(--bg2);color:var(--t1)}
.mode-btn.buy.active{color:var(--green)}
.mode-btn.sell.active{color:var(--red)}

/* ── MINI STATS ── */
.mini-stats{display:grid;grid-template-columns:1fr 1fr;gap:8px;flex-shrink:0}
.mini-stat{background:var(--bg3);border:1px solid var(--b1);border-radius:var(--rad-sm);padding:10px 12px}
.mini-stat .lbl{font-size:9px;color:var(--t3);margin-bottom:3px}
.mini-stat .val{font-size:20px;font-weight:600;line-height:1}
.mini-stat .sub{font-size:9px;color:var(--t2);margin-top:2px}

/* ── SPLIT PLAN ── */
.split-plan{background:var(--bg3);border:1px solid var(--b1);border-radius:var(--rad)}
.split-hd{padding:10px 14px;font-size:11px;font-weight:600;border-bottom:1px solid var(--b1)}
.split-row{padding:9px 14px;border-bottom:1px solid rgba(255,255,255,.03);display:flex;flex-direction:column;gap:4px}
.split-row:last-child{border-bottom:none}
.split-top{display:flex;align-items:center;gap:8px}
.step-now{font-size:9px;padding:2px 7px;border-radius:99px;background:rgba(74,222,128,.12);color:var(--green);border:1px solid rgba(74,222,128,.25);font-weight:600}
.step-wait{font-size:9px;padding:2px 7px;border-radius:99px;background:var(--bg4);color:var(--t2);border:1px solid var(--b1);font-weight:600}
.split-cond{font-size:12px;color:var(--t2)}
.split-bot{display:flex;justify-content:space-between;font-size:11px}
.split-usdt{font-weight:600}
.split-btc{color:var(--yellow)}
.split-price{color:var(--t3)}

/* ── SECTION HDR ── */
.sec-hd{font-size:10px;font-weight:600;color:var(--t3);letter-spacing:.1em;display:flex;align-items:center;gap:8px}
.sec-hd::after{content:'';flex:1;height:1px;background:var(--b1)}
.sec-tag{font-size:9px;padding:1px 6px;border-radius:4px;background:var(--blue);color:#000;font-weight:700;letter-spacing:.02em}

/* ── CHART ── */
.chart-wrap{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-lg);overflow:hidden;height:420px}
@media(max-width:600px){.chart-wrap{height:280px}}

/* ── INDICATOR GRID ── */
.ind-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:12px;align-items:start}
@media(max-width:600px){.ind-grid{grid-template-columns:1fr 1fr}}
.icard{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad);padding:13px 14px;cursor:pointer;transition:border-color .15s}
.icard:hover{border-color:var(--b2)}
.icard-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:5px}
.icard-name{font-size:13px;font-weight:500;line-height:1.3}
.icard-wt{font-size:9px;color:var(--t3);flex-shrink:0;margin-left:4px}
.icard-score{display:flex;align-items:baseline;gap:3px;margin-bottom:4px}
.icard-n{font-size:30px;font-weight:700;line-height:1}
.icard-m{font-size:10px;color:var(--t3)}
.ibar{height:2px;background:rgba(255,255,255,.05);border-radius:1px;overflow:hidden;margin-bottom:8px}
.ibf{height:100%;border-radius:1px;transition:width .4s}
.icard-vals{display:grid;grid-template-columns:1fr 1fr;gap:3px}
.vbox{background:rgba(255,255,255,.03);border-radius:5px;padding:4px 6px}
.vl{font-size:10px;color:var(--t3);margin-bottom:1px}
.vv{font-size:12px;font-weight:500}
.icard-note{font-size:9px;color:var(--t3);margin-top:6px;border-top:1px solid var(--b1);padding-top:5px;line-height:1.5;display:none}
.icard.expanded .icard-note{display:block}
.pill{display:inline-block;font-size:8px;padding:1px 5px;border-radius:99px;margin-left:3px;vertical-align:middle;font-weight:500}
.p-g{background:rgba(74,222,128,.1);color:var(--green);border:1px solid rgba(74,222,128,.2)}
.p-y{background:rgba(251,191,36,.1);color:var(--yellow);border:1px solid rgba(251,191,36,.2)}
.p-r{background:rgba(248,113,113,.1);color:var(--red);border:1px solid rgba(248,113,113,.2)}
.p-o{background:rgba(251,146,60,.1);color:var(--orange);border:1px solid rgba(251,146,60,.2)}

/* ── HISTORY CHART ── */
.history-wrap{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-lg);padding:14px}
.history-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
.history-title{font-size:12px;font-weight:600}
.history-sub{font-size:10px;color:var(--t3)}
#historyCanvas{width:100%;height:160px}
#historyHoverCanvas{width:100%;height:160px;cursor:crosshair}

/* ── BREAKDOWN ── */
.bk{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-lg);padding:14px}
.bk-hd{font-size:11px;font-weight:600;margin-bottom:10px;color:var(--t2)}
.bk-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:3px 14px}
.bk-row{display:flex;justify-content:space-between;align-items:center;padding:3px 0;font-size:11px;border-bottom:1px solid rgba(255,255,255,.03)}
.bk-n{color:var(--t2);font-size:12px}
.bk-r{display:flex;align-items:center;gap:5px;font-weight:600}
.mbar{width:28px;height:2px;background:rgba(255,255,255,.05);border-radius:1px;overflow:hidden;display:inline-block;vertical-align:middle}
.mfill{height:100%;border-radius:1px}
.bk-tot{border-top:1px solid var(--b2);margin-top:10px;padding-top:10px;display:flex;justify-content:space-between;font-size:14px;font-weight:700}

/* ── ACTION BAR ── */
.abar{display:flex;border-radius:var(--rad-sm);overflow:hidden;height:36px}
.aseg-item{display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:10px;gap:1px;cursor:default;padding:5px 2px}

/* ── TRIGGERS ── */
.trig{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-lg);padding:14px}
.trig-hd{font-size:11px;font-weight:600;margin-bottom:8px;display:flex;align-items:center;gap:6px}
.trow{display:flex;gap:7px;font-size:12px;color:var(--t2);padding:5px 0;border-bottom:1px solid var(--b1);line-height:1.4}
.trow:last-child{border-bottom:none}
.tnum{font-weight:700;flex-shrink:0;width:14px}
.trow.done .tnum{color:var(--green)}
.trow.done{color:var(--green)}
.trow.pending .tnum{color:var(--yellow)}

/* ── MACRO ── */
.macro-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:8px}
.mc{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-sm);padding:9px 11px;display:flex;gap:8px;align-items:flex-start}
.mdot{width:6px;height:6px;border-radius:50%;flex-shrink:0;margin-top:3px}
.mc-title{font-size:10px;font-weight:500;margin-bottom:1px}
.mc-desc{font-size:9px;color:var(--t2);line-height:1.4}
.sec-link{font-size:9px;padding:1px 6px;border-radius:4px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2);
  font-weight:700;letter-spacing:.02em;text-decoration:none;margin-left:auto;transition:all .15s}
.sec-link:hover{background:var(--bg4);color:var(--t1);text-decoration:none}
.insight-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:10px}
.insight-card.hidden{display:none}
.load-more{display:block;width:100%;margin-top:10px;padding:11px;background:#111113;
  border:1px solid rgba(255,255,255,.08);border-radius:var(--rad-sm,8px);color:var(--t3,#71717a);
  font-size:12px;font-weight:600;cursor:pointer;text-align:center;transition:all .15s;
  font-family:inherit;box-sizing:border-box}
.load-more:hover{border-color:rgba(247,147,26,.4);color:#f7931a;background:#131316}
#insightMoreCount{color:var(--t3,#52525b);font-weight:400;margin-left:4px}
#insightAllLink2{flex-shrink:0;padding:0 14px;margin-top:10px;color:var(--t3,#71717a);font-size:11px;
  text-decoration:none;white-space:nowrap;display:flex;align-items:center}
#insightAllLink2:hover{color:#f7931a}
.insight-card{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-sm);padding:12px;
  display:flex;gap:10px;align-items:flex-start;text-decoration:none;color:inherit;transition:all .15s}
.insight-card:hover{border-color:var(--icard-accent,var(--orange));background:var(--bg3);text-decoration:none}
.insight-icon{flex-shrink:0;width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;
  font-size:16px;background:var(--icard-accent-bg,rgba(247,147,26,.15))}
.insight-body{min-width:0;flex:1}
.insight-cat{font-size:8px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--icard-accent,var(--orange));margin-bottom:3px}
.insight-title{font-size:11px;font-weight:600;color:var(--t1);line-height:1.4;margin-bottom:2px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.insight-date{font-size:9px;color:var(--t3)}
.insight-more{grid-column:1/-1;display:flex;align-items:center;justify-content:center;
  padding:10px;font-size:11px;font-weight:600;color:var(--orange);border:1px dashed rgba(247,147,26,.35);
  border-radius:var(--rad-sm);text-decoration:none;transition:all .15s}
.insight-more:hover{background:rgba(247,147,26,.08);text-decoration:none}

/* ── Sidebar Blog List (좌측 하단 컴팩트 목록) ── */
.sb-blog{background:var(--bg2);border:1px solid var(--b1);border-radius:var(--rad-sm);padding:12px 13px;flex-shrink:0}
.sb-blog-hd{display:flex;align-items:center;font-size:10px;font-weight:700;letter-spacing:.07em;color:var(--t3);margin-bottom:8px}
.sb-blog-hd a{font-size:9px;padding:1px 6px;border-radius:4px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2);
  font-weight:700;text-decoration:none;margin-left:auto}
.sb-blog-hd a:hover{background:var(--bg4);color:var(--t1);text-decoration:none}
.sb-blog-item{display:flex;gap:8px;align-items:flex-start;padding:6px 0;border-top:1px solid var(--b1);text-decoration:none;color:inherit}
.sb-blog-item:first-child{border-top:none}
.sb-blog-item:hover .sb-blog-title{color:var(--orange)}
.sb-blog-icon{flex-shrink:0;font-size:13px;width:20px;text-align:center}
.sb-blog-title{font-size:11px;color:var(--t1);line-height:1.4;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}

/* ── NOTIFICATION MODAL ── */
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:500;display:flex;align-items:center;justify-content:center;display:none}
.modal-bg.open{display:flex}
.modal{background:var(--bg2);border:1px solid var(--b2);border-radius:var(--rad-lg);padding:20px;width:min(360px,90vw);display:flex;flex-direction:column;gap:12px}
.modal-hd{font-size:14px;font-weight:600;display:flex;justify-content:space-between;align-items:center}
.modal-close{cursor:pointer;color:var(--t2);font-size:18px;line-height:1}
.alert-row{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid var(--b1);font-size:12px}
.alert-row:last-child{border-bottom:none}
.alert-label{color:var(--t2)}
.toggle{width:36px;height:20px;border-radius:10px;background:var(--bg4);border:1px solid var(--b2);cursor:pointer;position:relative;transition:background .2s}
.toggle.on{background:var(--green)}
.toggle::after{content:'';position:absolute;top:2px;left:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:transform .2s}
.toggle.on::after{transform:translateX(16px)}

/* ── OVERLAY ── */
#overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:999;gap:16px}
.ov-logo{font-size:24px;font-weight:800;letter-spacing:-1px}
.ov-logo span{color:var(--yellow)}
.ov-spin{width:32px;height:32px;border:2px solid rgba(255,255,255,.08);border-top-color:var(--green);border-radius:50%;animation:rot .8s linear infinite}
.ov-txt{font-size:12px;color:var(--t2)}
@keyframes rot{to{transform:rotate(360deg)}}

/* ── ERR ── */
.err-bar{background:rgba(248,113,113,.08);border:1px solid rgba(248,113,113,.2);border-radius:var(--rad-sm);padding:8px 12px;font-size:11px;color:var(--red);display:none}

/* ── SELL MODE ── */
body.sell-mode .score-card::before{background:radial-gradient(ellipse at top left, rgba(248,113,113,.05) 0%, transparent 60%)}

/* ── SELL SIGNAL ── */
.sell-signal{background:var(--bg3);border:1px solid rgba(248,113,113,.2);border-radius:var(--rad);padding:12px 14px;display:flex;gap:12px}
.sell-sig-icon{font-size:20px;flex-shrink:0}
.sell-sig-title{font-size:12px;font-weight:600;color:var(--red);margin-bottom:4px}
.sell-sig-desc{font-size:10px;color:var(--t2);line-height:1.5}

.hist-tab{font-size:10px;padding:3px 10px;border-radius:5px;cursor:pointer;color:var(--t3);border:1px solid transparent;transition:all .15s}
.hist-tab.active{background:var(--bg3);color:var(--t1);border-color:var(--b2)}
footer{font-size:9px;color:var(--t3);line-height:1.8;padding:12px 16px;border-top:1px solid var(--b1);grid-column:1/-1}
</style>
</head>
<body>

<!-- Overlay -->
<div id="overlay">
  <div class="ov-logo">BTC<span>timing.com</span></div>
  <div class="ov-spin"></div>
  <div class="ov-txt" id="ovTxt">Fetching live data...</div>
</div>

<!-- Notification Modal -->
<div class="modal-bg" id="notifModal" onclick="if(event.target===this)closeModal()">
  <div class="modal" style="max-height:85vh;overflow-y:auto;width:min(420px,95vw)">
    <div class="modal-hd">
      🔔 <span data-i="alertTitle">Alert Settings</span>
      <span class="modal-close" onclick="closeModal()">×</span>
    </div>
    <div style="font-size:10px;color:var(--t3);margin-bottom:10px;line-height:1.5" data-i="alertDesc">
      Get a browser notification when the score crosses these thresholds.
    </div>

    <div style="font-size:10px;font-weight:600;color:var(--t2);margin:8px 0 6px" data-i="alertBuySection">📈 LONG TRIGGERS</div>
    <div class="alert-row"><span class="alert-label" data-i="a2">Long Score ≥ 6.0 (Split Long)</span><div class="toggle on" id="a2" onclick="toggleAlert(this)"></div></div>
    <div class="alert-row"><span class="alert-label" data-i="a3">Long Score ≥ 7.0 (Add Long)</span><div class="toggle on" id="a3" onclick="toggleAlert(this)"></div></div>
    <div class="alert-row"><span class="alert-label" data-i="a4">Long Score ≥ 8.0 (Full Long)</span><div class="toggle on" id="a4" onclick="toggleAlert(this)"></div></div>

    <div style="font-size:10px;font-weight:600;color:var(--t2);margin:12px 0 6px" data-i="alertSellSection">📉 SHORT TRIGGERS</div>
    <div class="alert-row"><span class="alert-label" data-i="b1">Short Score ≥ 6.0 (Prepare Short)</span><div class="toggle" id="b1" onclick="toggleAlert(this)"></div></div>
    <div class="alert-row"><span class="alert-label" data-i="b2">Short Score ≥ 7.0 (Add Short)</span><div class="toggle" id="b2" onclick="toggleAlert(this)"></div></div>
    <div class="alert-row"><span class="alert-label" data-i="b3">Short Score ≥ 8.0 (Full Short)</span><div class="toggle" id="b3" onclick="toggleAlert(this)"></div></div>

    <button onclick="requestNotif()" style="background:var(--green);color:#000;border:none;border-radius:var(--rad-sm);padding:9px;font-size:12px;font-weight:600;cursor:pointer;width:100%;margin-top:14px">
      <span data-i="enableNotif">Enable Browser Notifications</span>
    </button>
    <div id="notifStatus" style="font-size:10px;color:var(--t3);text-align:center;margin-top:6px"></div>
  </div>
</div>

<!-- Ticker Bar -->
<div id="tickerBar" style="background:#0a0a0a;border-bottom:1px solid var(--b1)">
  <div style="max-width:1280px;margin:0 auto;padding:6px 16px;
    font-size:11px;color:var(--t2);display:flex;gap:20px;overflow-x:auto;white-space:nowrap;-webkit-overflow-scrolling:touch">
    <span id="tkFiatItem1"><span id="tkFiatLabel1">USD/KRW</span> <b id="tkUsdKrw" style="color:var(--t1)">—</b> <span id="tkUsdKrwChg"></span></span>
    <span><span id="tkFiatLabel2">USDT/KRW</span> <b id="tkUsdtKrw" style="color:var(--t1)">—</b> <span id="tkUsdtKrwChg"></span></span>
    <span>BTC Dominance <b id="tkDom" style="color:var(--t1)">—</b> <span id="tkDomChg"></span></span>
    <span>Market Cap <b id="tkMcap" style="color:var(--t1)">—</b></span>
    <span>24h Volume <b id="tkVol" style="color:var(--t1)">—</b></span>
  </div>
</div>

<!-- Nav -->
<nav>
<div class="nav-inner">
  <div class="logo" onclick="goHome()" title="BTCtiming.com — Home" role="button" tabindex="0"
    onkeydown="if(event.key==='Enter')goHome()">BTC<span>timing</span></div>
  <!-- PC: 탭, 모바일: 드롭박스 -->
  <div class="coin-tabs" id="coinTabs"></div>
  <select id="coinDrop" onchange="switchCoin(this.value)"
    style="display:none;background:var(--bg3);border:1px solid var(--b2);color:var(--t1);
    padding:5px 8px;border-radius:var(--rad-sm);font-size:13px;font-weight:600;cursor:pointer;flex-shrink:0;width:68px">
  </select>
  <div class="nav-r">
    <div id="liveTag"><div class="live-dot"></div>LIVE</div>
    <a href="/blog/<?= h(langSuffix($lang)) ?>" class="nav-insight" id="navBlogLink" title="Blog">📖 <span data-i="navInsights">Blog</span></a>
    <div class="icon-btn" onclick="openModal()" title="Alerts">🔔</div>
    <div class="icon-btn" id="refreshBtn" onclick="loadAll()" title="Refresh" role="button" tabindex="0" aria-label="Refresh data" style="display:none">↻</div>
    <div class="lang-dropdown" id="langDropdown">
      <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)" aria-label="Select language" aria-haspopup="true">
        <span id="langTriggerLabel">KO</span><span class="lang-caret">▾</span>
      </button>
      <div class="lang-menu" id="langMenu">
        <?php foreach (SUPPORTED_LANGS as $lc => $li): ?>
        <button type="button" class="lang-menu-item<?= $lc === 'ko' ? ' active' : '' ?>" data-lang="<?= $lc ?>" onclick="setLang('<?= $lc ?>')"><?= $li['flag'] ?> <?= htmlspecialchars($li['name']) ?></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</nav>

<!-- Blog Ticker: 최신 블로그 글을 아주 작은 글씨로 노출. 개별 링크는 말줄임 처리, 모바일에서 좌우 스와이프 가능, 오른쪽 끝에 흐림 효과로 "더 있음"을 암시 -->
<div id="blogTickerBar" style="background:#0a0a0a;border-bottom:1px solid var(--b1)">
  <div style="max-width:1280px;margin:0 auto;padding:5px 16px;font-size:10px;color:var(--t3);
    display:flex;align-items:center;gap:0;overflow:hidden">
    <span id="blogTickerLabel" style="flex-shrink:0;white-space:nowrap;margin-right:10px">📰 블로그:</span>
    <div id="blogTickerScroll" style="flex:1;min-width:0;overflow-x:auto;white-space:nowrap;
      -webkit-overflow-scrolling:touch;touch-action:pan-x;scrollbar-width:none;position:relative">
      <span id="blogTickerLinks"></span>
      <div style="position:absolute;top:0;right:0;bottom:0;width:24px;pointer-events:none;
        background:linear-gradient(to right,transparent,#0a0a0a)"></div>
    </div>
    <a id="blogTickerAllLink" href="/blog/<?= h(langSuffix($lang)) ?>" style="flex-shrink:0;color:var(--orange);text-decoration:underline;
      margin-left:12px;padding-left:12px;border-left:1px solid var(--b1);white-space:nowrap"></a>
  </div>
</div>
<style>#blogTickerScroll::-webkit-scrollbar{display:none}</style>

<div class="page-wrap"><div class="layout">
  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="err-bar" id="err"></div>

    <!-- Score -->
    <div class="score-card">
      <div id="onboardTip" style="display:none;background:var(--bg3);border:1px solid var(--b2);border-radius:8px;padding:9px 11px;margin-bottom:10px;font-size:11.5px;line-height:1.55;color:var(--t2)">
        <span id="onboardTipText"></span>
        <span onclick="dismissOnboard()" role="button" tabindex="0" aria-label="Dismiss guide" style="float:right;cursor:pointer;color:var(--t3);font-weight:700;margin-left:8px">✕</span>
      </div>
      <div class="score-label" id="scoreLabel">ENTRY SCORE</div>
      <div style="display:flex;align-items:baseline;gap:4px">
        <span class="score-num" id="scoreNum">—</span>
        <span class="score-den">/10</span>
      </div>
      <div class="reach-bar"><div class="reach-fill" id="reachBar" style="width:0%"></div></div>
      <div class="reach-pct" id="reachPct">—</div>
      <div class="score-action" id="scoreAction" style="font-size:18px;letter-spacing:.5px">—</div>
      <div style="display:flex;align-items:flex-start;gap:6px;margin-top:6px">
        <div id="scoreDesc" style="font-size:13px;font-weight:600;color:var(--t1);line-height:1.4;flex:1">—</div>
        <button id="whyBtn" onclick="toggleWhyPanel()" style="flex-shrink:0;background:var(--bg3);border:1px solid var(--b2);
          border-radius:6px;color:var(--t2);font-size:11px;font-weight:700;padding:3px 9px;cursor:pointer;white-space:nowrap">
          <span data-i="whyBtnLabel">왜?</span>
        </button>
      </div>
      <div id="whyPanel" style="display:none;margin-top:8px;padding:10px 12px;background:var(--bg3);border-radius:8px;font-size:11.5px;line-height:1.6"></div>
      <div id="miniHistory" style="display:flex;gap:10px;margin-top:8px;font-size:10.5px;color:var(--t3)"></div>
      <div class="score-sub" id="scoreSub">—</div>
    </div>

    <!-- Mode Toggle -->
    <div class="mode-toggle">
      <div class="mode-btn buy active" id="modeBuy" onclick="setMode('buy')" role="button" tabindex="0" aria-label="Long timing mode">📈 LONG Timing</div>
      <div class="mode-btn sell" id="modeSell" onclick="setMode('sell')" role="button" tabindex="0" aria-label="Short timing mode">📉 SHORT</div>
    </div>

    <!-- Action Bar (동적 렌더링) -->
    <div id="abar" style="border-radius:8px;overflow:hidden;margin-bottom:2px;flex-shrink:0"></div>

    <!-- Mini Stats -->
    <div class="mini-stats">
      <div class="mini-stat">
        <div class="lbl">Price · Binance</div>
        <div class="val" id="mPrice">—</div>
        <div class="sub" id="mPriceSub">—</div>
      </div>
      <div class="mini-stat">
        <div class="lbl">Fear & Greed</div>
        <div class="val" id="mFG">—</div>
        <div class="sub" id="mFGLbl">—</div>
      </div>
      <div class="mini-stat">
        <div class="lbl">Realized Price Gap</div>
        <div class="val" id="mRP">—</div>
        <div class="sub" id="mRPSub">—</div>
      </div>
      <div class="mini-stat">
        <div class="lbl">200W MA Gap</div>
        <div class="val" id="mMA">—</div>
        <div class="sub" id="mMASub">—</div>
      </div>
    </div>

    <!-- Position Guide (Long/Short 공통 위치) -->
    <div id="sellPanel" style="display:none">
      <div style="background:var(--bg3);border:1px solid var(--b2);border-radius:var(--rad-sm);padding:13px 15px;margin-bottom:8px">
        <div style="font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.07em;margin-bottom:6px" id="sStatusTitle">📊 MARKET STATUS</div>
        <div style="font-size:14px;font-weight:700;margin-bottom:5px" id="sStatusMain">—</div>
        <div style="font-size:11px;color:var(--t2);line-height:1.6" id="sStatusDesc">—</div>
      </div>
      <div style="background:var(--bg3);border:1px solid var(--b2);border-radius:var(--rad-sm);padding:13px 15px;margin-bottom:8px">
        <div style="font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.07em;margin-bottom:6px" id="sGuideTitle">💡 SHORT GUIDE</div>
        <div style="font-size:14px;font-weight:700;margin-bottom:5px" id="sGuideAction">—</div>
        <div style="font-size:11px;color:var(--t2);line-height:1.6" id="sGuideDesc">—</div>
      </div>
      <div style="background:var(--bg3);border:1px solid rgba(74,222,128,.2);border-radius:var(--rad-sm);padding:13px 15px">
        <div style="display:flex;align-items:center;gap:5px;margin-bottom:6px">
          <div style="width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.5s infinite"></div>
          <div style="font-size:10px;color:var(--green);font-weight:600" id="sExitTitle">🎯 SHORT EXIT</div>
        </div>
        <div style="font-size:13px;font-weight:700;margin-bottom:4px" id="sExitSig">—</div>
        <div style="font-size:11px;color:var(--t2);line-height:1.6;white-space:pre-line" id="sExitDesc">—</div>
      </div>
    </div>
    <!-- LONG Guide Panel -->
    <div id="longGuidePanel">
      <div style="background:var(--bg3);border:1px solid var(--b2);border-radius:var(--rad-sm);padding:13px 15px;margin-bottom:8px">
        <div style="font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.07em;margin-bottom:6px" id="lStatusTitle">📊 MARKET STATUS</div>
        <div style="font-size:14px;font-weight:700;margin-bottom:5px" id="lStatusMain">—</div>
        <div style="font-size:11px;color:var(--t2);line-height:1.6" id="lStatusDesc">—</div>
      </div>
      <div style="background:var(--bg3);border:1px solid var(--b2);border-radius:var(--rad-sm);padding:13px 15px;margin-bottom:8px">
        <div style="font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.07em;margin-bottom:6px" id="lGuideTitle">💡 LONG GUIDE</div>
        <div style="font-size:14px;font-weight:700;margin-bottom:5px" id="lGuideAction">—</div>
        <div style="font-size:11px;color:var(--t2);line-height:1.6" id="lGuideDesc">—</div>
      </div>
      <div style="background:var(--bg3);border:1px solid rgba(251,191,36,.2);border-radius:var(--rad-sm);padding:13px 15px;margin-bottom:8px">
        <div style="display:flex;align-items:center;gap:5px;margin-bottom:6px">
          <div style="width:6px;height:6px;border-radius:50%;background:var(--yellow);animation:pulse 1.5s infinite"></div>
          <div style="font-size:10px;color:var(--yellow);font-weight:600" id="lNextTitle">🎯 NEXT TRIGGER</div>
        </div>
        <div style="font-size:11px;color:var(--t2);line-height:1.8;white-space:pre-line" id="lNextDesc">—</div>
      </div>
      <div style="background:var(--bg3);border:1px solid var(--b1);border-radius:var(--rad-sm);padding:13px 15px">
        <div style="display:flex;align-items:center;justify-content:space-between;cursor:pointer" onclick="toggleSplitPlan()">
          <div style="font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.07em" id="lSplitTitle">💰 SPLIT ENTRY PLAN</div>
          <span id="splitPlanChevron" style="font-size:10px;color:var(--t3);transition:transform .2s;transform:rotate(-90deg)">▾</span>
        </div>
        <div id="splitPlanBody" style="display:none;margin-top:10px">
          <div style="display:flex;align-items:center;gap:6px;margin-bottom:10px">
            <span style="font-size:11px;color:var(--t2);flex-shrink:0" id="lAssetLabel">투자 자산</span>
            <input type="number" id="userAsset" placeholder="10000"
              style="flex:1;min-width:0;background:var(--bg4);border:1px solid var(--b2);color:var(--t1);
              padding:6px 8px;border-radius:var(--rad-sm);font-size:12px;font-weight:600"
              onchange="setUserAsset(this.value)" oninput="setUserAsset(this.value)">
            <span style="font-size:11px;color:var(--t3);flex-shrink:0">USDT</span>
          </div>
          <div id="splitRows"></div>
        </div>
      </div>
    </div>

    <!-- Sidebar Blog List: 좌측 하단 여백 채우는 컴팩트 블로그 리스트 -->
    <div class="sb-blog">
      <div class="sb-blog-hd"><span data-i="sec_insights2">BLOG</span><a href="/blog/<?= h(langSuffix($lang)) ?>" id="sbBlogAllLink" data-i="viewAllInsights">ALL →</a></div>
      <div id="sbBlogList"><div style="color:var(--t3);font-size:11px;padding:6px 0" data-i="loadingInsights">Loading...</div></div>
    </div>

    <!-- Timestamp -->
    <div style="font-size:9px;color:var(--t3);text-align:center;flex-shrink:0" id="tsLabel">—</div>
  </div>


  <!-- Chart: 데스크톱에선 사이드바 옆, 모바일에선 최상단(grid-template-areas로 순서 제어) -->
  <div class="chart-wrap-cell">
    <div class="chart-wrap" id="tvChart"></div>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- Score History -->
    <div class="history-wrap">
      <div class="history-hd">
        <div>
          <div class="history-title" data-i="sec_history">Score History</div>
          <div class="history-sub" id="histRangeSub" data-i="sec_histSub">Saved locally in browser</div>
        </div>
        <div style="display:flex;gap:3px;flex-wrap:wrap">
          <div class="hist-tab active" onclick="setHistPeriod('1d')" id="htp1d" role="button" tabindex="0" aria-label="Show 24 hours">24h</div>
          <div class="hist-tab" onclick="setHistPeriod('7d')" id="htp7d" role="button" tabindex="0" aria-label="Show 7 days">7d</div>
          <div class="hist-tab" onclick="setHistPeriod('30d')" id="htp30d" role="button" tabindex="0" aria-label="Show 30 days">30d</div>
          <div class="hist-tab" onclick="setHistPeriod('all')" id="htpAll" role="button" tabindex="0" aria-label="Show all time">All</div>
        </div>
      </div>
      <div style="position:relative">
        <canvas id="historyCanvas" height="160"></canvas>
        <canvas id="historyHoverCanvas" height="160" style="position:absolute;top:0;left:0;pointer-events:none"></canvas>
        <div id="histTooltip" style="position:absolute;display:none;pointer-events:none;background:#1c1c1f;
          border:1px solid rgba(255,255,255,.15);border-radius:6px;padding:6px 10px;font-size:11px;
          color:var(--t1);white-space:nowrap;z-index:10;box-shadow:0 4px 12px rgba(0,0,0,.4);transform:translate(-50%,-100%)">
          <div id="histTooltipScore" style="font-weight:700;font-size:13px;color:#4ade80"></div>
          <div id="histTooltipTime" style="color:var(--t3);font-size:10px;margin-top:1px"></div>
        </div>
      </div>
      <div id="histInfo" style="display:none;font-size:10px;color:var(--t2);margin-top:8px;padding:8px;background:var(--bg3);border-radius:6px;line-height:1.6">
        📊 <b>Hour</b>: Last 24 hours, every 5 minutes<br>
        📅 <b>Day</b>: Last 30 days, daily average<br>
        📆 <b>Month</b>: All time, monthly average<br>
        💾 Data is stored in your browser (localStorage). Clears if browser data is wiped.
      </div>
    </div>

    <!-- Blog widget: 점수 히스토리 바로 아래, 8개 박스(2행) + 더보기(펼침) → 접기(큰 버튼)/전체(우측하단 작은 링크) -->
    <div class="sec-hd" data-i="sec_insights2">BLOG <a href="/blog/<?= h(langSuffix($lang)) ?>" class="sec-link" id="insightAllLink" data-i="viewAllInsights">ALL →</a></div>
    <div class="insight-grid" id="insightGrid2">
      <div style="grid-column:1/-1;color:var(--t3);font-size:12px;padding:12px 0" data-i="loadingInsights">Loading...</div>
    </div>
    <button class="load-more" id="insightMoreBtn" onclick="loadMoreInsights()" style="display:none">
      <span data-i="loadMoreInsights">더 보기</span>
      <span id="insightMoreCount"></span>
    </button>
    <div id="insightExpandedActions" style="display:none;flex-direction:row;align-items:stretch;gap:8px">
      <button class="load-more" style="flex:1;margin-top:10px" onclick="collapseInsights()">
        <span data-i="collapseInsights">접기</span>
      </button>
      <a href="/blog/<?= h(langSuffix($lang)) ?>" id="insightAllLink2" data-i="viewAllInsights">전체 →</a>
    </div>

    <!-- Indicators -->
    <div class="sec-hd" data-i="sec_onchain">ON-CHAIN VALUATION</div>
    <div class="ind-grid" id="g1"></div>

    <div class="sec-hd" data-i="sec_miner">MINER / SENTIMENT</div>
    <div class="ind-grid" id="g2"></div>

    <div class="sec-hd" data-i="sec_inst">INSTITUTIONAL FLOW <span class="sec-tag">LEADING</span></div>
    <div class="ind-grid" id="g3"></div>

    <div class="sec-hd" data-i="sec_cycle">CYCLE POSITION</div>
    <div class="ind-grid" id="g4"></div>

    <!-- Breakdown -->
    <div class="bk">
      <div class="bk-hd" data-i="sec_breakdown">Score Breakdown (94pt → 10pt)</div>
      <div class="bk-grid" id="bkGrid"></div>
      <div class="bk-tot">
        <span style="color:var(--t2)">Total → /10</span>
        <span id="bkTot">—</span>
      </div>
    </div>

    <!-- Triggers -->
    <div class="trig">
      <div class="trig-hd">⚡ <span id="trigTitle">Next Level Triggers</span></div>
      <div id="trigRows"></div>
    </div>
  </div>
</div>
<footer style="max-width:1280px;margin:0 auto;width:100%;padding:12px 16px;font-size:10px;color:var(--t3)">
      Auto-fetched: Price·200wMA·Futures Gap (Binance API) · Fear&Greed (Alternative.me) · Dominance (CoinGecko) · MVRV·Puell (MacroMicro) · NUPL·SOPR (Newhedge) · Coinbase Premium (Coinbase API)<br>
      On-chain scraping may use fallback values. Score history saved in browser localStorage. Not financial advice.<br><br>
      <span id="blogGuideLabel" style="color:var(--t3)">📖 카테고리별 최신 글: </span>
      <span id="blogCategoryLinks"></span>
</footer>

<script>
// 서버(PHP)가 생성해야 하는 설정값만 인라인 유지 — 나머지 로직은 /app.js로 분리됨
const CATEGORY_LIST = <?= json_encode(array_keys(require __DIR__ . '/blog/_category_meta.php')) ?>;
const LANG_META = <?= json_encode(array_map(fn($l) => ['code' => $l['code'], 'name' => $l['flag'] . ' ' . $l['name']], SUPPORTED_LANGS), JSON_UNESCAPED_UNICODE) ?>;
const SUPPORTED_LANG_CODES = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
</script>
<script src="/app.js" defer></script>

<!-- ═══════════════════════════════════════════════════════ -->
<!-- LIVE CHAT WIDGET -->
<!-- ═══════════════════════════════════════════════════════ -->
<div id="chatToggle" onclick="toggleChat()" role="button" tabindex="0" aria-label="Open chat" style="position:fixed;bottom:20px;right:20px;width:56px;height:56px;
  border-radius:50%;background:var(--orange);display:flex;align-items:center;justify-content:center;
  cursor:pointer;z-index:500;box-shadow:0 4px 16px rgba(0,0,0,.4);font-size:24px;transition:transform .2s">
  💬
  <span id="chatBadge" style="position:absolute;top:-2px;right:-2px;background:var(--red);color:#fff;
    font-size:10px;font-weight:700;border-radius:50%;width:18px;height:18px;display:none;
    align-items:center;justify-content:center">0</span>
</div>

<div id="chatBox" style="display:none;position:fixed;bottom:84px;right:20px;width:320px;height:440px;
  background:var(--bg2);border:1px solid var(--b2);border-radius:12px;z-index:501;
  flex-direction:column;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,.5)">
  <div style="background:var(--bg3);padding:12px 14px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--b1)">
    <div style="display:flex;align-items:center;gap:6px;min-width:0">
      <div style="width:7px;height:7px;border-radius:50%;background:var(--green);flex-shrink:0"></div>
      <span style="font-size:13px;font-weight:700;flex-shrink:0" id="chatTitle">LIVE CHAT</span>
      <span id="chatUserCount" style="font-size:10px;color:var(--t3);flex-shrink:0"></span>
    </div>
    <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
      <div onclick="promptNickname()" title="닉네임 변경" style="cursor:pointer;color:var(--t3);font-size:13px">⚙️</div>
      <div onclick="toggleChat()" role="button" tabindex="0" aria-label="Close chat" style="cursor:pointer;color:var(--t3);font-size:16px;padding:2px 4px">✕</div>
    </div>
  </div>
  <div id="chatMessages" style="flex:1;overflow-y:auto;padding:10px 12px;display:flex;flex-direction:column;gap:8px"></div>
  <div style="padding:8px 10px;border-top:1px solid var(--b1);display:flex;gap:6px">
    <input id="chatInput" type="text" placeholder="메시지 입력..." maxlength="200"
      style="flex:1;background:var(--bg4);border:1px solid var(--b2);color:var(--t1);
      padding:8px 10px;border-radius:8px;font-size:12px"
      onkeydown="if(event.key==='Enter')sendChatMsg()">
    <button onclick="sendChatMsg()" style="background:var(--orange);color:#000;border:none;
      padding:8px 14px;border-radius:8px;font-size:12px;font-weight:700;cursor:pointer">전송</button>
  </div>
</div>

<?php
// 이 3개 문구는 PHP에서 $lang 기준으로 먼저 정확하게 렌더링해둠 (data-i는 그대로 유지해서
// 클라이언트에서 언어를 전환할 때는 계속 JS가 갱신함). 예전엔 무조건 한국어로 하드코딩돼 있어서,
// 어떤 이유로든(외부 스크립트 로드 실패, 광고차단기 등) JS의 applyStaticI18n()이 못 돌면
// 영어/일본어/스페인어/독일어 사용자에게도 이 부분만 한국어로 굳어버리는 문제가 있었음.
$footerText = [
    'ko' => ['privacy' => '개인정보처리방침', 'terms' => '이용약관', 'disclaimer' => '투자 조언이 아닙니다'],
    'en' => ['privacy' => 'Privacy Policy', 'terms' => 'Terms of Service', 'disclaimer' => 'Not financial advice'],
    'ja' => ['privacy' => 'プライバシーポリシー', 'terms' => '利用規約', 'disclaimer' => '投資助言ではありません'],
    'es' => ['privacy' => 'Política de Privacidad', 'terms' => 'Términos de Servicio', 'disclaimer' => 'No es asesoramiento financiero'],
    'de' => ['privacy' => 'Datenschutzerklärung', 'terms' => 'Nutzungsbedingungen', 'disclaimer' => 'Keine Finanzberatung'],
];
$ft = $footerText[$lang] ?? $footerText['en'];
?>
<div style="text-align:center;padding:20px 16px 90px;font-size:11px;color:var(--t3)">
  © 2026 BTCtiming.com ·
  <a href="/privacy<?= h($urlSuffix) ?>" id="footerPrivacyLink" style="color:var(--t3);text-decoration:underline" data-i="footerPrivacy"><?= h($ft['privacy']) ?></a>
  ·
  <a href="/terms<?= h($urlSuffix) ?>" id="footerTermsLink" style="color:var(--t3);text-decoration:underline" data-i="footerTerms"><?= h($ft['terms']) ?></a>
  · <span data-i="footerDisclaimer"><?= h($ft['disclaimer']) ?></span>
</div>

<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js" defer onerror="console.error('Firebase app SDK failed to load')"></script>
<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-database-compat.js" defer onerror="console.error('Firebase database SDK failed to load')"></script>
</body>
</html>
