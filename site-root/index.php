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
    <div class="icon-btn" id="refreshBtn" onclick="loadAll()" title="Refresh" style="display:none">↻</div>
    <div class="lang-dropdown" id="langDropdown">
      <button type="button" class="lang-trigger" id="langTrigger" onclick="toggleLangMenu(event)">
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
      <div class="mode-btn buy active" id="modeBuy" onclick="setMode('buy')">📈 LONG Timing</div>
      <div class="mode-btn sell" id="modeSell" onclick="setMode('sell')">📉 SHORT</div>
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
          <div class="hist-tab active" onclick="setHistPeriod('1d')" id="htp1d">24h</div>
          <div class="hist-tab" onclick="setHistPeriod('7d')" id="htp7d">7d</div>
          <div class="hist-tab" onclick="setHistPeriod('30d')" id="htp30d">30d</div>
          <div class="hist-tab" onclick="setHistPeriod('all')" id="htpAll">All</div>
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
// ═══════════════════════════════════════════════════════
// CONSTANTS & CONFIG
// ═══════════════════════════════════════════════════════
// 색상 팔레트 (CSS :root 변수와 동일한 값 — JS에서 style.color/background를 직접 찍을 때 사용)
const C = {
  green:'#4ade80', green2:'#86efac', green3:'#bbf7d0',
  yellow:'#fbbf24', orange:'#fb923c', red:'#f87171', blue:'#60a5fa',
};
// 블로그 카테고리 전체 목록(blog/_category_meta.php가 유일한 정답 소스). footer의
// "카테고리별 최신 글"이 4개 카테고리를 절대 빠짐없이 가져오기 위해 사용.
const CATEGORY_LIST = <?= json_encode(array_keys(require __DIR__ . '/blog/_category_meta.php')) ?>;

// 지표 카드의 signal(뱃지)/target(목표조건) 텍스트 번역 맵. 서버(score_calc.php)가 영어로만 내려주므로 클라이언트에서 번역.
const SIGNAL_MAP = {
  "Above": {"ko": "위", "en": "Above", "ja": "上", "es": "Por Encima", "de": "Darüber"},
  "Accumulating": {"ko": "매집 중", "en": "Accumulating", "ja": "蓄積中", "es": "Acumulando", "de": "Akkumulierend"},
  "Accumulation (Safe)": {"ko": "매집 구간 (안전)", "en": "Accumulation (Safe)", "ja": "蓄積ゾーン(安全)", "es": "Acumulación (Seguro)", "de": "Akkumulation (Sicher)"},
  "Alt Season Risk": {"ko": "알트시즌 리스크", "en": "Alt Season Risk", "ja": "アルトシーズンリスク", "es": "Riesgo Temporada Alt", "de": "Alt-Season-Risiko"},
  "Alt Season": {"ko": "알트시즌", "en": "Alt Season", "ja": "アルトシーズン", "es": "Temporada Alt", "de": "Alt Season"},
  "BTC Season (Safe)": {"ko": "BTC 시즌 (안전)", "en": "BTC Season (Safe)", "ja": "BTCシーズン(安全)", "es": "Temporada BTC (Seguro)", "de": "BTC-Season (Sicher)"},
  "BTC Season": {"ko": "BTC 시즌", "en": "BTC Season", "ja": "BTCシーズン", "es": "Temporada BTC", "de": "BTC-Season"},
  "Backwardation (Safe)": {"ko": "백워데이션 (안전)", "en": "Backwardation (Safe)", "ja": "バックワーデーション(安全)", "es": "Backwardation (Seguro)", "de": "Backwardation (Sicher)"},
  "Below Realized (Safe)": {"ko": "실현가 이하 (안전)", "en": "Below Realized (Safe)", "ja": "実現価格以下(安全)", "es": "Bajo Realizado (Seguro)", "de": "Unter Realized (Sicher)"},
  "Below Realized": {"ko": "실현가 이하", "en": "Below Realized", "ja": "実現価格以下", "es": "Bajo Realizado", "de": "Unter Realized"},
  "Borderline": {"ko": "경계선", "en": "Borderline", "ja": "境界線", "es": "Límite", "de": "Grenzwertig"},
  "Buyer-led (Caution)": {"ko": "매수 주도 (주의)", "en": "Buyer-led (Caution)", "ja": "買い主導(注意)", "es": "Liderado por Compra (Precaución)", "de": "Käufergetrieben (Vorsicht)"},
  "Capitulation": {"ko": "항복", "en": "Capitulation", "ja": "キャピチュレーション", "es": "Capitulación", "de": "Kapitulation"},
  "Caution": {"ko": "주의", "en": "Caution", "ja": "注意", "es": "Precaución", "de": "Vorsicht"},
  "Core Bottom Zone": {"ko": "핵심 저점 구간", "en": "Core Bottom Zone", "ja": "核心底値ゾーン", "es": "Zona Central de Suelo", "de": "Kern-Tiefzone"},
  "Correction": {"ko": "조정", "en": "Correction", "ja": "調整", "es": "Corrección", "de": "Korrektur"},
  "Deep Correction": {"ko": "깊은 조정", "en": "Deep Correction", "ja": "深い調整", "es": "Corrección Profunda", "de": "Tiefe Korrektur"},
  "Distribution": {"ko": "분산", "en": "Distribution", "ja": "分配", "es": "Distribución", "de": "Distribution"},
  "Elevated": {"ko": "상승", "en": "Elevated", "ja": "上昇", "es": "Elevado", "de": "Erhöht"},
  "Euphoria": {"ko": "도취", "en": "Euphoria", "ja": "陶酔", "es": "Euforia", "de": "Euphorie"},
  "FOMO Buying": {"ko": "FOMO 매수", "en": "FOMO Buying", "ja": "FOMO買い", "es": "Compra por FOMO", "de": "FOMO-Kauf"},
  "Far (Safe)": {"ko": "멀음 (안전)", "en": "Far (Safe)", "ja": "遠い(安全)", "es": "Lejos (Seguro)", "de": "Weit (Sicher)"},
  "Far from ATH (Safe)": {"ko": "ATH와 멀음 (안전)", "en": "Far from ATH (Safe)", "ja": "ATHから遠い(安全)", "es": "Lejos del ATH (Seguro)", "de": "Weit vom ATH (Sicher)"},
  "Fear (Safe)": {"ko": "공포 (안전)", "en": "Fear (Safe)", "ja": "恐怖(安全)", "es": "Miedo (Seguro)", "de": "Angst (Sicher)"},
  "Fear": {"ko": "공포", "en": "Fear", "ja": "恐怖", "es": "Miedo", "de": "Angst"},
  "General": {"ko": "일반", "en": "General", "ja": "一般", "es": "General", "de": "Allgemein"},
  "High": {"ko": "높음", "en": "High", "ja": "高い", "es": "Alto", "de": "Hoch"},
  "Highly Correlated": {"ko": "높은 상관관계", "en": "Highly Correlated", "ja": "高い相関", "es": "Muy Correlacionado", "de": "Stark Korreliert"},
  "Hope Bottom": {"ko": "희망 저점", "en": "Hope Bottom", "ja": "希望底値", "es": "Esperanza de Suelo", "de": "Hoffnung Boden"},
  "Hope": {"ko": "희망", "en": "Hope", "ja": "希望", "es": "Esperanza", "de": "Hoffnung"},
  "Ideal": {"ko": "이상적", "en": "Ideal", "ja": "理想的", "es": "Ideal", "de": "Ideal"},
  "Independent": {"ko": "독립적", "en": "Independent", "ja": "独立的", "es": "Independiente", "de": "Unabhängig"},
  "Institutional FOMO": {"ko": "기관 FOMO", "en": "Institutional FOMO", "ja": "機関FOMO", "es": "FOMO Institucional", "de": "Institutionelles FOMO"},
  "Long Overload": {"ko": "롱 과부하", "en": "Long Overload", "ja": "ロング過負荷", "es": "Sobrecarga de Largos", "de": "Long-Überlastung"},
  "Loss (Safe)": {"ko": "손실 (안전)", "en": "Loss (Safe)", "ja": "損失(安全)", "es": "Pérdida (Seguro)", "de": "Verlust (Sicher)"},
  "Low (Safe)": {"ko": "낮음 (안전)", "en": "Low (Safe)", "ja": "低い(安全)", "es": "Bajo (Seguro)", "de": "Niedrig (Sicher)"},
  "Mid Range": {"ko": "중간 구간", "en": "Mid Range", "ja": "中間レンジ", "es": "Rango Medio", "de": "Mittlerer Bereich"},
  "Mild Buying": {"ko": "약한 매수", "en": "Mild Buying", "ja": "弱い買い", "es": "Compra Leve", "de": "Leichter Kauf"},
  "Mild Premium": {"ko": "약한 프리미엄", "en": "Mild Premium", "ja": "弱いプレミアム", "es": "Prima Leve", "de": "Leichte Prämie"},
  "Mild Profit": {"ko": "약한 수익", "en": "Mild Profit", "ja": "弱い利益", "es": "Ganancia Leve", "de": "Leichter Gewinn"},
  "Mild Selling": {"ko": "약한 매도", "en": "Mild Selling", "ja": "弱い売り", "es": "Venta Leve", "de": "Leichter Verkauf"},
  "Mild": {"ko": "약함", "en": "Mild", "ja": "弱い", "es": "Leve", "de": "Leicht"},
  "Moderate": {"ko": "보통", "en": "Moderate", "ja": "中程度", "es": "Moderado", "de": "Moderat"},
  "Near ATH": {"ko": "ATH 근접", "en": "Near ATH", "ja": "ATH近接", "es": "Cerca del ATH", "de": "Nahe ATH"},
  "Near Bottom": {"ko": "저점 근접", "en": "Near Bottom", "ja": "底値近接", "es": "Cerca del Suelo", "de": "Nahe Boden"},
  "Neutral": {"ko": "중립", "en": "Neutral", "ja": "中立", "es": "Neutral", "de": "Neutral"},
  "Normal": {"ko": "정상", "en": "Normal", "ja": "正常", "es": "Normal", "de": "Normal"},
  "Optimism": {"ko": "낙관", "en": "Optimism", "ja": "楽観", "es": "Optimismo", "de": "Optimismus"},
  "Out of Range": {"ko": "범위 밖", "en": "Out of Range", "ja": "範囲外", "es": "Fuera de Rango", "de": "Außerhalb des Bereichs"},
  "Overbought (Top)": {"ko": "과매수 (고점)", "en": "Overbought (Top)", "ja": "買われすぎ(天井)", "es": "Sobrecompra (Techo)", "de": "Überkauft (Top)"},
  "Overbought": {"ko": "과매수", "en": "Overbought", "ja": "買われすぎ", "es": "Sobrecompra", "de": "Überkauft"},
  "Overheated": {"ko": "과열", "en": "Overheated", "ja": "過熱", "es": "Sobrecalentado", "de": "Überhitzt"},
  "Oversold (Bottom)": {"ko": "과매도 (저점)", "en": "Oversold (Bottom)", "ja": "売られすぎ(底値)", "es": "Sobreventa (Suelo)", "de": "Überverkauft (Boden)"},
  "Oversold": {"ko": "과매도", "en": "Oversold", "ja": "売られすぎ", "es": "Sobreventa", "de": "Überverkauft"},
  "Overvalued": {"ko": "고평가", "en": "Overvalued", "ja": "過大評価", "es": "Sobrevalorado", "de": "Überbewertet"},
  "Past Peak": {"ko": "고점 지남", "en": "Past Peak", "ja": "ピーク超過", "es": "Pasado el Pico", "de": "Über dem Höhepunkt"},
  "Peak Zone": {"ko": "고점 구간", "en": "Peak Zone", "ja": "ピークゾーン", "es": "Zona de Pico", "de": "Höchststand-Zone"},
  "Record Accumulation": {"ko": "역대급 매집", "en": "Record Accumulation", "ja": "記録的な蓄積", "es": "Acumulación Récord", "de": "Rekord-Akkumulation"},
  "Rising/Bottom": {"ko": "상승/저점", "en": "Rising/Bottom", "ja": "上昇/底値", "es": "Subiendo/Suelo", "de": "Steigend/Boden"},
  "Seller-led (Safe)": {"ko": "매도 주도 (안전)", "en": "Seller-led (Safe)", "ja": "売り主導(安全)", "es": "Liderado por Venta (Seguro)", "de": "Verkäufergetrieben (Sicher)"},
  "Sideline (Safe)": {"ko": "관망 (안전)", "en": "Sideline (Safe)", "ja": "様子見(安全)", "es": "Al Margen (Seguro)", "de": "Abseits (Sicher)"},
  "Strong": {"ko": "강함", "en": "Strong", "ja": "強い", "es": "Fuerte", "de": "Stark"},
  "Target Zone": {"ko": "목표 구간", "en": "Target Zone", "ja": "目標ゾーン", "es": "Zona Objetivo", "de": "Zielzone"},
  "Transitioning": {"ko": "전환 중", "en": "Transitioning", "ja": "転換中", "es": "Transición", "de": "Übergang"},
  "Volume Dry-up": {"ko": "거래량 고갈", "en": "Volume Dry-up", "ja": "出来高枯渇", "es": "Volumen Agotado", "de": "Volumen versiegt"},
  "Volume Spike": {"ko": "거래량 급증", "en": "Volume Spike", "ja": "出来高急増", "es": "Pico de Volumen", "de": "Volumenspike"},
  "Weak": {"ko": "약함", "en": "Weak", "ja": "弱い", "es": "Débil", "de": "Schwach"},
};
const TARGET_MAP = {
  "12~24mo before = bottom zone": {"ko": "반감기 12~24개월 전 = 저점 구간", "en": "12~24mo before = bottom zone", "ja": "半減期12〜24ヶ月前 = 底値ゾーン", "es": "12-24 meses antes = zona de suelo", "de": "12-24 Monate vorher = Tiefzone"},
  "55~63% BTC season": {"ko": "55~63% BTC 시즌", "en": "55~63% BTC season", "ja": "55~63% BTCシーズン", "es": "55-63% temporada BTC", "de": "55-63% BTC-Season"},
  "Alt season ≤ 50%": {"ko": "알트시즌 ≤ 50%", "en": "Alt season ≤ 50%", "ja": "アルトシーズン ≤ 50%", "es": "Temporada alt ≤ 50%", "de": "Alt-Season ≤ 50%"},
  "Backwardation = short squeeze signal": {"ko": "백워데이션 = 숏스퀴즈 신호", "en": "Backwardation = short squeeze signal", "ja": "バックワーデーション = ショートスクイーズシグナル", "es": "Backwardation = señal de short squeeze", "de": "Backwardation = Short-Squeeze-Signal"},
  "Below estimated realized price": {"ko": "추정 실현가 이하", "en": "Below estimated realized price", "ja": "推定実現価格以下", "es": "Bajo el precio realizado estimado", "de": "Unter geschätztem Realized Price"},
  "Bottom zone ≤ 0": {"ko": "저점 구간 ≤ 0", "en": "Bottom zone ≤ 0", "ja": "底値ゾーン ≤ 0", "es": "Zona de suelo ≤ 0", "de": "Tiefzone ≤ 0"},
  "Buy ratio ≥ 65% + volume spike + green candle (last 15m)": {"ko": "매수 비율 ≥ 65% + 거래량 급증 + 양봉 (최근 15분)", "en": "Buy ratio ≥ 65% + volume spike + green candle (last 15m)", "ja": "買い比率 ≥ 65% + 出来高急増 + 陽線(直近15分)", "es": "Ratio de compra ≥ 65% + pico de volumen + vela verde (últimos 15m)", "de": "Kaufquote ≥ 65% + Volumenspike + grüne Kerze (letzte 15m)"},
  "Capitulation ≤0.95": {"ko": "항복 ≤0.95", "en": "Capitulation ≤0.95", "ja": "キャピチュレーション ≤0.95", "es": "Capitulación ≤0.95", "de": "Kapitulation ≤0,95"},
  "Fear zone ≤ 0%": {"ko": "공포 구간 ≤ 0%", "en": "Fear zone ≤ 0%", "ja": "恐怖ゾーン ≤ 0%", "es": "Zona de miedo ≤ 0%", "de": "Angstzone ≤ 0%"},
  "High correlation = follows BTC weakness": {"ko": "높은 상관관계 = BTC 약세 추종", "en": "High correlation = follows BTC weakness", "ja": "高い相関 = BTCの弱さに追従", "es": "Alta correlación = sigue la debilidad de BTC", "de": "Hohe Korrelation = folgt BTC-Schwäche"},
  "High dominance = strong network": {"ko": "높은 도미넌스 = 강한 네트워크", "en": "High dominance = strong network", "ja": "高いドミナンス = 強いネットワーク", "es": "Alta dominancia = red fuerte", "de": "Hohe Dominanz = starkes Netzwerk"},
  "Low correlation = independent strength": {"ko": "낮은 상관관계 = 독자적 강세", "en": "Low correlation = independent strength", "ja": "低い相関 = 独自の強さ", "es": "Baja correlación = fortaleza independiente", "de": "Niedrige Korrelation = unabhängige Stärke"},
  "Overbought ≥ 70": {"ko": "과매수 ≥ 70", "en": "Overbought ≥ 70", "ja": "買われすぎ ≥ 70", "es": "Sobrecompra ≥ 70", "de": "Überkauft ≥ 70"},
  "Oversold ≤ 30": {"ko": "과매도 ≤ 30", "en": "Oversold ≤ 30", "ja": "売られすぎ ≤ 30", "es": "Sobreventa ≤ 30", "de": "Überverkauft ≤ 30"},
  "Positive = institutional re-entry": {"ko": "양수 = 기관 재진입", "en": "Positive = institutional re-entry", "ja": "プラス = 機関再参入", "es": "Positivo = reingreso institucional", "de": "Positiv = institutioneller Wiedereinstieg"},
  "Recovery cross (30MA>60MA)": {"ko": "회복 전환 (30MA>60MA)", "en": "Recovery cross (30MA>60MA)", "ja": "回復転換 (30MA>60MA)", "es": "Cruce de recuperación (30MA>60MA)", "de": "Erholungscross (30MA>60MA)"},
  "SHORT optimal: 12–18 months after halving": {"ko": "숏 최적: 반감기 후 12~18개월", "en": "SHORT optimal: 12–18 months after halving", "ja": "ショート最適: 半減期後12〜18ヶ月", "es": "Óptimo CORTO: 12-18 meses tras el halving", "de": "SHORT optimal: 12-18 Monate nach Halving"},
  "SHORT zone > -20%": {"ko": "숏 구간 > -20%", "en": "SHORT zone > -20%", "ja": "ショートゾーン > -20%", "es": "Zona CORTO > -20%", "de": "SHORT-Zone > -20%"},
  "SHORT zone ≤ 50%": {"ko": "숏 구간 ≤ 50%", "en": "SHORT zone ≤ 50%", "ja": "ショートゾーン ≤ 50%", "es": "Zona CORTO ≤ 50%", "de": "SHORT-Zone ≤ 50%"},
  "SHORT zone ≤ 70%": {"ko": "숏 구간 ≤ 70%", "en": "SHORT zone ≤ 70%", "ja": "ショートゾーン ≤ 70%", "es": "Zona CORTO ≤ 70%", "de": "SHORT-Zone ≤ 70%"},
  "SHORT zone ≥ 0.10%": {"ko": "숏 구간 ≥ 0.10%", "en": "SHORT zone ≥ 0.10%", "ja": "ショートゾーン ≥ 0.10%", "es": "Zona CORTO ≥ 0.10%", "de": "SHORT-Zone ≥ 0,10%"},
  "SHORT zone ≥ 0.15%": {"ko": "숏 구간 ≥ 0.15%", "en": "SHORT zone ≥ 0.15%", "ja": "ショートゾーン ≥ 0.15%", "es": "Zona CORTO ≥ 0.15%", "de": "SHORT-Zone ≥ 0,15%"},
  "SHORT zone ≥ 1.04": {"ko": "숏 구간 ≥ 1.04", "en": "SHORT zone ≥ 1.04", "ja": "ショートゾーン ≥ 1.04", "es": "Zona CORTO ≥ 1.04", "de": "SHORT-Zone ≥ 1,04"},
  "SHORT zone ≥ 20% above realized": {"ko": "숏 구간: 실현가 대비 20% 이상", "en": "SHORT zone ≥ 20% above realized", "ja": "ショートゾーン: 実現価格比20%以上", "es": "Zona CORTO: 20% o más sobre el realizado", "de": "SHORT-Zone: 20%+ über Realized"},
  "SHORT zone ≥ 3.5": {"ko": "숏 구간 ≥ 3.5", "en": "SHORT zone ≥ 3.5", "ja": "ショートゾーン ≥ 3.5", "es": "Zona CORTO ≥ 3.5", "de": "SHORT-Zone ≥ 3,5"},
  "SHORT zone ≥ 60%": {"ko": "숏 구간 ≥ 60%", "en": "SHORT zone ≥ 60%", "ja": "ショートゾーン ≥ 60%", "es": "Zona CORTO ≥ 60%", "de": "SHORT-Zone ≥ 60%"},
  "SHORT zone: within -15% of ATH": {"ko": "숏 구간: ATH 대비 -15% 이내", "en": "SHORT zone: within -15% of ATH", "ja": "ショートゾーン: ATH比-15%以内", "es": "Zona CORTO: dentro de -15% del ATH", "de": "SHORT-Zone: innerhalb -15% vom ATH"},
  "Sell ratio ≥ 58% + volume spike + red candle (last 15m)": {"ko": "매도 비율 ≥ 58% + 거래량 급증 + 음봉 (최근 15분)", "en": "Sell ratio ≥ 58% + volume spike + red candle (last 15m)", "ja": "売り比率 ≥ 58% + 出来高急増 + 陰線(直近15分)", "es": "Ratio de venta ≥ 58% + pico de volumen + vela roja (últimos 15m)", "de": "Verkaufsquote ≥ 58% + Volumenspike + rote Kerze (letzte 15m)"},
  "Volume spike near highs = distribution (selling) signal": {"ko": "고점 근처 거래량 급증 = 분산(매도) 신호", "en": "Volume spike near highs = distribution (selling) signal", "ja": "高値近くの出来高急増 = 分配(売り)シグナル", "es": "Pico de volumen cerca de máximos = señal de distribución (venta)", "de": "Volumenspike nahe Hochs = Distributionssignal (Verkauf)"},
  "Volume spike near lows = capitulation-to-rebound signal": {"ko": "저점 근처 거래량 급증 = 항복 후 반등 신호", "en": "Volume spike near lows = capitulation-to-rebound signal", "ja": "安値近くの出来高急増 = キャピチュレーション後反発シグナル", "es": "Pico de volumen cerca de mínimos = señal de capitulación a rebote", "de": "Volumenspike nahe Tiefs = Kapitulations-zu-Rebound-Signal"},
  "≤5% or below": {"ko": "≤5% 이하", "en": "≤5% or below", "ja": "≤5%以下", "es": "≤5% o menos", "de": "≤5% oder darunter"},
  "≥70% drawdown from ATH": {"ko": "ATH 대비 ≥70% 하락", "en": "≥70% drawdown from ATH", "ja": "ATH比≥70%下落", "es": "≥70% de caída desde el ATH", "de": "≥70% Drawdown vom ATH"},
  "≥75% whale accumulation": {"ko": "≥75% 고래 매집", "en": "≥75% whale accumulation", "ja": "≥75%クジラ蓄積", "es": "≥75% acumulación de ballenas", "de": "≥75% Wal-Akkumulation"},
};
function translateSignal(text) {
  const entry = SIGNAL_MAP[text];
  if (!entry) return text;
  return entry[currentLang] || entry.en || text;
}
function translateTarget(text) {
  const entry = TARGET_MAP[text];
  if (!entry) return text;
  return entry[currentLang] || entry.en || text;
}
const ATH_MAP = {BTC:126080, ETH:4955, BNB:1370, SOL:294, XRP:3.84, DOGE:0.74, ADA:3.09, TRX:0.45};
const HALVING_MONTHS = 21;
// 자산은 전체 포트폴리오 기준 — 코인 무관하게 동일 (분할 계획은 각 코인 가격으로 환산만 다름)
let TOTAL_USDT = parseFloat(localStorage.getItem('userAsset')) || 10000;

/** 분할 매수 계획 접기/펼치기. 기본값은 접힘 상태이며, 사용자가 펼친 상태는
 *  localStorage에 저장해서 새로고침해도 유지됨. */
function toggleSplitPlan(forceState) {
  const body = document.getElementById('splitPlanBody');
  const chevron = document.getElementById('splitPlanChevron');
  if (!body) return;
  const isOpen = forceState !== undefined ? forceState : body.style.display === 'none';
  body.style.display = isOpen ? 'block' : 'none';
  if (chevron) chevron.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(-90deg)';
  try { localStorage.setItem('splitPlanOpen', isOpen ? '1' : '0'); } catch(e) {}
}
(function restoreSplitPlanState() {
  try {
    if (localStorage.getItem('splitPlanOpen') === '1') toggleSplitPlan(true);
  } catch(e) {}
})();

function setUserAsset(val) {
  const n = parseFloat(val);
  if(!isNaN(n) && n > 0) {
    TOTAL_USDT = n;
    localStorage.setItem('userAsset', n.toString());
  } else if(val === '') {
    TOTAL_USDT = 10000;
    localStorage.removeItem('userAsset');
  }
  // 재렌더
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
}
const REALIZED_PRICE = {BTC:52400, ETH:2100, BNB:420, SOL:95, XRP:1.48, DOGE:0.09, ADA:0.32, TRX:0.30};

const COINS = [
  {id:'BTC', name:'Bitcoin',  sym:'BTCUSDT', color:'#F7931A'},
  {id:'ETH', name:'Ethereum', sym:'ETHUSDT', color:'#627EEA'},
  {id:'BNB', name:'BNB',      sym:'BNBUSDT', color:'#F3BA2F'},
  {id:'SOL', name:'Solana',   sym:'SOLUSDT', color:'#9945FF'},
  {id:'XRP', name:'XRP',      sym:'XRPUSDT', color:'#00AAE4'},
  {id:'DOGE',name:'Dogecoin', sym:'DOGEUSDT',color:'#C2A633'},
  {id:'ADA', name:'Cardano',  sym:'ADAUSDT', color:'#0033AD'},
  {id:'TRX', name:'TRON',     sym:'TRXUSDT', color:'#FF0013'},
];

let currentCoin = 'BTC';
let currentMode = 'buy';
let ws = null;
let livePrice = null;
let chatDB = null; // Firebase Realtime DB 핸들 (채팅 + 히스토리 공용)
let chatListenersAttached = false; // 채팅 메시지/접속자 리스너가 실제로 부착됐는지
let scoreHistory = [];
let currentScore = 0;
let lastResultDetails = null; // Why 패널이 참조할, 가장 최근 렌더된 지표 상세 breakdown
let alertSettings = {t1:true, t2:true, t3:true, t4:false, t5:false};
// (코인/모드별 점수 추적은 lastScoreByKey 사용 — 아래 checkAlerts 근처에 정의됨)
let notifGranted = false;
let indCache = {};

// ═══════════════════════════════════════════════════════
// COIN TABS
// ═══════════════════════════════════════════════════════
function initTabs() {
  const el = document.getElementById('coinTabs');
  el.innerHTML = COINS.map(c => `
    <div class="coin-tab${c.id===currentCoin?' active':''}"
      onclick="switchCoin('${c.id}')"
      ontouchend="event.preventDefault();switchCoin('${c.id}')"
      style="${c.id===currentCoin?`background:${c.color};border-color:${c.color};color:#000`:''}">
      ${c.id}
    </div>`).join('');
  // 모바일 드롭박스 업데이트
  const drop = document.getElementById('coinDrop');
  if(drop) {
    drop.innerHTML = COINS.map(c => `<option value="${c.id}" ${c.id===currentCoin?'selected':''}>${c.id}</option>`).join('');
  }
}

let loadToken = 0;

/** 로고 클릭 시: 이미 메인 대시보드에 있으면 BTC/롱 기본값으로 리셋 + 맨 위로 스크롤.
 *  (다른 페이지에서 로고를 누르는 경우는 이 파일이 곧 홈이라 해당 없음 — 블로그 쪽 로고는 href="/") */
function goHome() {
  window.scrollTo({top: 0, behavior: 'smooth'});
  if(currentCoin !== 'BTC') switchCoin('BTC');
  if(currentMode !== 'buy') setMode('buy');
}

function switchCoin(id) {
  if(currentCoin === id) return;
  currentCoin = id;
  livePrice = null;
  loadToken++;

  // 이 코인으로 전환할 때마다 알림 상태를 초기화 — 그래야 "이미 한 번 봤던 코인"이라도
  // 다시 들어올 때 지금 점수가 알림 구간에 있으면 매번 다시 효과(플래시+알림음)가 울림.
  // (안 그러면 세션 중 코인당 딱 한 번만 울리고 그 뒤로는 점수가 그대로면 다시는 안 울렸음)
  delete lastScoreByKey[`${id}_buy`];
  delete lastScoreByKey[`${id}_sell`];

  // 탭 즉시 업데이트
  initTabs();
  // 차트 즉시 교체 (가장 먼저 보임)
  initChart();
  // WebSocket 즉시 연결
  connectWS();

  // 캐시가 있으면 즉시 렌더 (지연 없이 바로 표시)
  const cached = indCache[id];
  if(cached) {
    currentScore = currentMode==='buy' ? (cached._buyResult?.final ?? 0) : (cached._sellResult?.final ?? 0);
    renderAll(cached);
  } else {
    // 캐시 없을 때만 스켈레톤 표시
    currentScore = 0;
    ['scoreNum','scoreAction','reachPct','mPrice','mFG','mRP','mMA'].forEach(elId=>{
      const el=document.getElementById(elId);
      if(el){el.textContent='—';el.style.color='var(--t3)';}
    });
    document.getElementById('reachBar').style.width='0%';
    ['g1','g2','g3','g4','bkGrid','splitRows','trigRows'].forEach(elId=>{
      const el=document.getElementById(elId);
      if(el) el.innerHTML='<div style="color:var(--t3);font-size:10px;padding:8px">Loading...</div>';
    });
  }

  // 백그라운드에서 최신 데이터 갱신 (캐시가 있어도 항상 갱신)
  loadAll();
}

// ═══════════════════════════════════════════════════════
// TICKER BAR — USD/KRW, USDT/KRW (직접 fetch) + 도미넌스/마켓캡/볼륨 (api.php에서 받아옴)
// ═══════════════════════════════════════════════════════
function updateTickerFromAPI(data) {
  if(!data) return;
  const set = (id, val) => { const el=document.getElementById(id); if(el && val!=null) el.textContent=val; };
  const setChg = (id, val) => {
    const el=document.getElementById(id); if(!el || val==null) return;
    const sign = val>=0?'+':'';
    el.textContent = `${sign}${Number(val).toFixed(2)}%`;
    el.style.color = val>=0 ? 'var(--green)' : 'var(--red)';
  };
  if(data.btc_dom) set('tkDom', Number(data.btc_dom).toFixed(2)+'%');
  if(data.dom_chg != null) setChg('tkDomChg', data.dom_chg);
  if(data.mcap)    set('tkMcap', (data.mcap/1e12).toFixed(2)+'T');
  if(data.vol24h)  set('tkVol',  (data.vol24h/1e9).toFixed(1)+'B');
  // 서버가 내려주는 usdt_krw/usdt_chg는 원화 전용 값이라, 한국어 모드일 때만 사용.
  // 다른 언어에서는 loadTicker()가 언어에 맞는 통화(USD/JPY/EUR 등)로 이미 채워둔 값을 덮어쓰지 않음.
  if(currentLang === 'ko') {
    if(data.usdt_krw != null && data.usdt_krw > 0) {
      set('tkUsdtKrw', Number(data.usdt_krw).toLocaleString('ko'));
    }
    if(data.usdt_chg != null) setChg('tkUsdtKrwChg', data.usdt_chg);
  }
}

// 언어별 기준 통화 매핑 — 한국어면 원화(김치프리미엄 확인용), 그 외 언어는 각 지역에서 익숙한 통화로.
// exchangerate-api/CoinGecko 둘 다 이 통화 코드들을 지원함.
const TICKER_CURRENCY_MAP = {ko:'KRW', en:'USD', ja:'JPY', es:'EUR', de:'EUR'};
function getTickerCurrency() { return TICKER_CURRENCY_MAP[currentLang] || 'USD'; }

async function loadTicker() {
  const cur = getTickerCurrency();
  const curLower = cur.toLowerCase();
  // 라벨 갱신 (USD/USD처럼 같은 통화가 겹치는 경우 — 예: 영어 사용자에게 USD/USD — 는
  // 굳이 환율이 항상 1.00이라 정보가 없으므로, 이 경우엔 "USD 기준"임을 자연스럽게 보여주는
  // USDT 페그 확인용 정보로도 여전히 유효함(디페깅 감시).
  const l1 = document.getElementById('tkFiatLabel1');
  const l2 = document.getElementById('tkFiatLabel2');
  const item1 = document.getElementById('tkFiatItem1');
  // USD/USD는 항상 1.000이라 정보값이 없으므로 통째로 숨기고, USDT/USD(테더 페그 감시)만 남김.
  if(item1) item1.style.display = (cur === 'USD') ? 'none' : '';
  if(l1) l1.textContent = `USD/${cur}`;
  if(l2) l2.textContent = `USDT/${cur}`;

  // 기준 통화 환율 + USDT 시세를 동시에 fetch
  // USDT/{통화}: CoinGecko simple/price (CORS 허용)
  // USD/{통화}: exchangerate-api (CORS 허용)
  const [r1, r2] = await Promise.allSettled([
    fetch('https://api.exchangerate-api.com/v4/latest/USD', {signal:AbortSignal.timeout(4000)}).then(r=>r.json()),
    fetchProxy(`https://api.coingecko.com/api/v3/simple/price?ids=tether&vs_currencies=${curLower}&include_24hr_change=true`),
  ]);

  const dLoc = SUPPORTED_LANG_CODES.includes(currentLang) ? currentLang : 'en';
  if(r1.status==='fulfilled') {
    const rate = cur === 'USD' ? 1 : r1.value?.rates?.[cur];
    const el = document.getElementById('tkUsdKrw');
    if(el && rate != null) el.textContent = rate.toLocaleString(dLoc, {maximumFractionDigits: cur==='JPY'||cur==='KRW' ? 1 : 2});
  }
  if(r2.status==='fulfilled' && r2.value?.tether?.[curLower] != null) {
    const rate = r2.value.tether[curLower];
    const chg = r2.value.tether[`${curLower}_24h_change`];
    const el = document.getElementById('tkUsdtKrw');
    if(el) el.textContent = rate.toLocaleString(dLoc, {maximumFractionDigits: cur==='JPY'||cur==='KRW' ? 0 : 3});
    const chgEl = document.getElementById('tkUsdtKrwChg');
    if(chgEl && chg != null) {
      chgEl.textContent = (chg>=0?'+':'') + chg.toFixed(2) + '%';
      chgEl.style.color = chg>=0 ? 'var(--green)' : 'var(--red)';
    }
  }
}
setInterval(loadTicker, 60*1000); // 1분마다 갱신 (최초 1회는 refreshLangDependentUI()에서 호출됨)

// ═══════════════════════════════════════════════════════
// MODE
// ═══════════════════════════════════════════════════════
function setMode(mode) {
  currentMode = mode;
  document.getElementById('modeBuy').classList.toggle('active', mode==='buy');
  document.getElementById('modeSell').classList.toggle('active', mode==='sell');
  document.body.classList.toggle('sell-mode', mode==='sell');
  document.getElementById('sellPanel').style.display = mode==='sell' ? 'block' : 'none';
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
  // 알림 모달 등 모든 [data-i] 라벨 갱신 (모드 전환 시에도 언어가 흐트러지지 않도록)
  applyStaticI18n();
  // histInfo 업데이트
  const hi=document.getElementById('histInfo');
  if(hi) hi.innerHTML = TT({ko:`📊 <b>시간별</b>: 최근 24시간, 5분마다<br>📅 <b>일별</b>: 최근 30일, 일별 평균<br>📆 <b>월별</b>: 전체 기간, 월별 평균<br>💾 데이터는 브라우저 로컬저장소에 저장됩니다. 브라우저 데이터 삭제 시 초기화됩니다.`,en:`📊 <b>Hour</b>: Last 24 hours, every 5 minutes<br>📅 <b>Day</b>: Last 30 days, daily average<br>📆 <b>Month</b>: All time, monthly average<br>💾 Data is stored in your browser (localStorage). Clears if browser data is wiped.`,ja:`📊 <b>時間別</b>: 直近24時間、5分ごと<br>📅 <b>日別</b>: 直近30日間、日次平均<br>📆 <b>月別</b>: 全期間、月次平均<br>💾 データはブラウザ(localStorage)に保存されます。ブラウザデータを消去すると初期化されます。`,es:`📊 <b>Hora</b>: Últimas 24 horas, cada 5 minutos<br>📅 <b>Día</b>: Últimos 30 días, promedio diario<br>📆 <b>Mes</b>: Todo el período, promedio mensual<br>💾 Los datos se guardan en tu navegador (localStorage). Se borran si se limpian los datos del navegador.`,de:`📊 <b>Stunde</b>: Letzte 24 Stunden, alle 5 Minuten<br>📅 <b>Tag</b>: Letzte 30 Tage, Tagesdurchschnitt<br>📆 <b>Monat</b>: Gesamter Zeitraum, Monatsdurchschnitt<br>💾 Daten werden lokal im Browser (localStorage) gespeichert. Werden beim Löschen der Browserdaten zurückgesetzt.`});
}

// ═══════════════════════════════════════════════════════
// TRADINGVIEW CHART
// ═══════════════════════════════════════════════════════
function initChart() {
  const coin = COINS.find(c=>c.id===currentCoin);
  const sym = (currentCoin==='USDT') ? 'BINANCE:USDCUSDT' : ('BINANCE:'+coin.sym);
  const wrap = document.getElementById('tvChart');
  wrap.innerHTML = '';
  const iframe = document.createElement('iframe');
  iframe.style.cssText = 'width:100%;height:100%;border:none';
  iframe.src = 'https://s.tradingview.com/widgetembed/?frameElementId=tv_widget'
    + '&symbol=' + encodeURIComponent(sym)
    + '&interval=D&theme=dark&style=1&locale=en'
    + '&toolbar_bg=%230f0f0f&hide_top_toolbar=0'
    + '&studies=MAExp%40tv-basicstudies'
    + '&backgroundColor=%230f0f0f';
  iframe.setAttribute('allowtransparency','true');
  iframe.setAttribute('allowfullscreen','true');
  wrap.appendChild(iframe);
}

// ═══════════════════════════════════════════════════════
// WEBSOCKET — Binance Real-time Price
// ═══════════════════════════════════════════════════════
let wsCoinToken = 0; // WebSocket 전용 토큰 (코인 전환 시 이전 WS 응답 무시)

function connectWS() {
  wsCoinToken++;
  const myWsToken = wsCoinToken;
  const wsCoin = currentCoin; // 이 WS가 담당하는 코인 고정

  if(ws) {
    try { ws.onclose = null; ws.close(); } catch(e){} // onclose 핸들러 제거 후 닫기 (재연결 방지)
  }
  const coin = COINS.find(c=>c.id===wsCoin);
  if(!coin || wsCoin==='USDT') { livePrice=1.0; return; }
  try {
    ws = new WebSocket(`wss://stream.binance.com:9443/ws/${coin.sym.toLowerCase()}@ticker`);
    ws.onmessage = e => {
      // 토큰 불일치 또는 코인 전환됨 → 무시
      if(myWsToken !== wsCoinToken || wsCoin !== currentCoin) return;
      const d = JSON.parse(e.data);
      livePrice = parseFloat(d.c);
      const chg = parseFloat(d.P);
      const el = document.getElementById('mPrice');
      if(el) {
        el.textContent = fmtP(livePrice);
        el.style.color = chg >= 0 ? 'var(--green)' : 'var(--red)';
        document.getElementById('mPriceSub').textContent = `${chg>=0?'+':''}${chg.toFixed(2)}% 24h`;
      }
    };
    ws.onerror = () => {};
    ws.onclose = () => {
      // 이 WS가 여전히 현재 코인 담당일 때만 재연결
      if(myWsToken === wsCoinToken && wsCoin === currentCoin) {
        setTimeout(connectWS, 3000);
      }
    };
  } catch(e) {}
}

// ═══════════════════════════════════════════════════════
// CORS PROXY
// ═══════════════════════════════════════════════════════
const PROXIES = [
  'https://corsproxy.io/?',
  'https://api.allorigins.win/raw?url=',
  'https://thingproxy.freeboard.io/fetch/',
];

async function fetchProxy(url, isJson=true) {
  // 직접+프록시 모두 동시에 시도, 가장 빠른 것 사용
  try {
    const direct = fetch(url, {signal:AbortSignal.timeout(2500)})
      .then(r=>r.ok?(isJson?r.json():r.text()):Promise.reject('direct_fail'));
    const proxies = PROXIES.map(px=>
      fetch(px+encodeURIComponent(url),{signal:AbortSignal.timeout(5000)})
        .then(r=>r.ok?(isJson?r.json():r.text()):Promise.reject('proxy_fail'))
    );
    return await Promise.any([direct,...proxies]);
  } catch(e){}
  return null;
}

// ═══════════════════════════════════════════════════════
// UI RENDERING — 카드 생성 (순수 화면 표시용, 계산 로직 아님)
// ═══════════════════════════════════════════════════════
function fmtP(v){
  if(v==null||isNaN(v))return'—';
  const n=Number(v);
  return'$'+n.toLocaleString('en',{minimumFractionDigits:n<10?4:n<1000?2:0,maximumFractionDigits:n<10?4:n<1000?2:0});
}
function fmtN(v){
  if(v==null||isNaN(v))return'0';
  return Number(v).toLocaleString('en',{maximumFractionDigits:0});
}
function col(r){
  if(r>=.9)return C.green;if(r>=.75)return C.green2;if(r>=.55)return C.green3;
  if(r>=.35)return C.yellow;if(r>=.2)return C.orange;return C.red;
}
function pillCls(sig){
  const s=(sig||'').toLowerCase();
  if(s.includes('bottom')||s.includes('safe')||s.includes('accumul')||s.includes('recovery')||
     s.includes('near bottom')||s.includes('backwardation')||s.includes('early cycle')||
     s.includes('ideal')||s.includes('capitul')||s.includes('record'))return'p-g';
  if(s.includes('mid')||s.includes('mild')||s.includes('neutral')||s.includes('watch')||
     s.includes('transitioning')||s.includes('borderline'))return'p-y';
  if(s.includes('overheat')||s.includes('fomo')||s.includes('euphoria')||s.includes('distribution')||
     s.includes('overload')||s.includes('alt season')||s.includes('late cycle')||
     s.includes('extreme greed')||s.includes('near ath'))return'p-r';
  return'p-o';
}

const IND_KEY_MAP={
  mvrv_z:    {buy:'ind_mvrv_z',  sell:'ind_sell_mvrv', desc:'desc_mvrv_z'},
  nupl:      {buy:'ind_nupl',    sell:'ind_sell_nupl',  desc:'desc_nupl'},
  realized:  {buy:'ind_realized',sell:'ind_realized',   desc:'desc_realized'},
  hash_ribbon:{buy:'ind_hash',   sell:'ind_hash',       desc:'desc_hash'},
  sth_sopr:  {buy:'ind_sth_sopr',sell:'ind_sell_sopr',  desc:'desc_sopr'},
  funding:   {buy:'ind_funding', sell:'ind_sell_funding',desc:'desc_funding'},
  cb_premium:{buy:'ind_cbp',     sell:'ind_sell_cbp',   desc:'desc_cbp'},
  lth_supply:{buy:'ind_lth',     sell:'ind_sell_lth',   desc:'desc_lth'},
  dom:       {buy:'ind_dom',     sell:'ind_sell_dom',   desc:'desc_dom'},
  halving:   {buy:'ind_halving', sell:'ind_sell_halving',desc:'desc_halving'},
  btc_corr:  {buy:'ind_btc_corr',sell:'ind_btc_corr',   desc:'desc_btc_corr'},
  ath_pos:   {buy:'ind_halving', sell:'ind_sell_ath',   desc:'desc_halving'},
  alt_valuation: {buy:'ind_alt_valuation', sell:'ind_alt_valuation', desc:'desc_alt_valuation'},
  alt_drawdown:  {buy:'ind_alt_drawdown',  sell:'ind_alt_drawdown',  desc:'desc_alt_drawdown'},
  alt_short_valuation: {buy:'ind_alt_short_val', sell:'ind_alt_short_val', desc:'desc_alt_short_val'},
  alt_short_ath:        {buy:'ind_alt_short_ath', sell:'ind_alt_short_ath', desc:'desc_alt_short_ath'},
  rsi:           {buy:'ind_rsi', sell:'ind_rsi', desc:'desc_rsi'},
  vol_change:    {buy:'ind_vol_change', sell:'ind_vol_change', desc:'desc_vol_change'},
  btc_corr_tech: {buy:'ind_btc_corr_tech', sell:'ind_btc_corr_tech', desc:'desc_btc_corr_tech'},
  buy_pressure:  {buy:'ind_buy_pressure', sell:'ind_buy_pressure', desc:'desc_buy_pressure'},
  sell_pressure: {buy:'ind_sell_pressure', sell:'ind_sell_pressure', desc:'desc_sell_pressure'},
};

// 지표 키 → 관련 블로그 가이드 slug. 없는 키는 버튼 자체를 숨김.
const GUIDE_LINK_MAP={
  mvrv_z:'mvrv-z-score', nupl:'nupl-indicator', realized:'realized-cap-guide',
  hash_ribbon:'hash-ribbon-indicator', sth_sopr:'sth-sopr', funding:'funding-rate-futures-gap',
  cb_premium:'coinbase-premium', lth_supply:'long-term-holder-supply', dom:'btc-dominance',
  halving:'bitcoin-halving-timing', ath_pos:'ath-drawdown', alt_drawdown:'ath-drawdown',
  alt_short_ath:'ath-drawdown', rsi:'rsi-bitcoin',
  alt_valuation:'mvrv-z-score', alt_short_valuation:'mvrv-z-score',
  btc_corr:'btc-dominance', btc_corr_tech:'btc-correlation-guide',
  buy_pressure:'buy-sell-led-volume-guide', sell_pressure:'buy-sell-led-volume-guide',
  vol_change:'volume-acceleration-guide',
};

function makeCard(d,mode='buy'){
  if(!d)return'';
  const r=d.score/d.max;
  const clr=col(r);
  const pc=pillCls(d.signal||''); // 뱃지 색상 분류는 원문(영어) 기준으로 그대로 판정 (번역 텍스트로는 매칭 안 되므로)
  const ko=currentLang==='ko'; // 블로그 링크 접미사 등에서 계속 사용
  const km=IND_KEY_MAP[d.key]||{};
  const lk=mode==='sell'?km.sell:km.buy;
  const localLabel=lk?(T(lk)||d.label):d.label;
  const dk=km.desc;
  const detDesc=dk?(T(dk)||d.note||''):(d.note||'');
  const valLbl=TT({ko:'현재값',en:'Value',ja:'現在値',es:'Valor',de:'Wert'});
  const scoreLbl=TT({ko:'점수',en:'Score',ja:'スコア',es:'Puntuación',de:'Score'});
  const targetLbl=TT({ko:'목표',en:'Target',ja:'目標',es:'Objetivo',de:'Ziel'});
  const detailLbl=TT({ko:'▼ 탭하여 설명 보기',en:'▼ Tap for details',ja:'▼ タップして詳細を見る',es:'▼ Toca para ver detalles',de:'▼ Tippen für Details'});
  const localSignal=translateSignal(d.signal||'');
  const localTarget=translateTarget(d.target||'—');
  const vStr=`${d.value}${d.unit||''}`;
  const guideSlug=GUIDE_LINK_MAP[d.key];
  const blogSuffixVal = blogSuffix(currentLang);
  const guideBtn=guideSlug?`<a href="/blog/${guideSlug}.php${blogSuffixVal}" target="_blank" rel="noopener"
      onclick="event.stopPropagation()"
      style="display:inline-flex;align-items:center;gap:4px;margin-top:8px;font-size:10px;color:var(--orange);
      text-decoration:none;border:1px solid rgba(247,147,26,.3);border-radius:6px;padding:4px 8px">
      📖 ${TT({ko:'가이드 보기',en:'Read Guide',ja:'ガイドを見る',es:'Ver Guía',de:'Anleitung ansehen'})} →</a>`:'';
  return`<div class="icard" onclick="this.classList.toggle('expanded')">
    <div class="icard-top">
      <span class="icard-name">${localLabel}<span class="pill ${pc}">${localSignal}</span></span>
      <span class="icard-wt">${d.max}pt</span>
    </div>
    <div class="icard-score">
      <span class="icard-n" style="color:${clr}">${d.score}</span>
      <span class="icard-m">/ ${d.max}</span>
    </div>
    <div class="ibar"><div class="ibf" style="width:${Math.round(r*100)}%;background:${clr}"></div></div>
    <div class="icard-vals">
      <div class="vbox"><div class="vl">${valLbl}</div><div class="vv">${vStr}</div></div>
      <div class="vbox"><div class="vl">${scoreLbl}</div><div class="vv" style="color:${clr}">${d.score}/${d.max}</div></div>
      <div class="vbox" style="grid-column:1/-1"><div class="vl">${targetLbl}</div><div class="vv" style="font-size:9px;color:var(--t2)">${localTarget}</div></div>
    </div>
    <div class="icard-note">
      <div style="font-size:9px;color:var(--t3);margin-bottom:6px">${detailLbl}</div>
      <div style="white-space:pre-line;line-height:1.6;color:var(--t2);font-size:10px">${detDesc}</div>
      ${guideBtn}
    </div>
  </div>`;
}
function validSOPR(v){return typeof v==='number'&&!isNaN(v)&&v>=0.90&&v<=1.10;}

// ═══════════════════════════════════════════════════════
// API FETCHER — 백엔드(PHP)에서 완성된 점수 결과를 받아옴
// 점수 계산 로직(calcBuy/calcSell)은 서버에서만 실행되며 클라이언트에 노출되지 않음
// ═══════════════════════════════════════════════════════
async function fetchScoreFromAPI(coin, mode) {
  const url = `/api.php?coin=${coin}&mode=${mode}`;
  const cacheKey = `btct_cache_${coin}_${mode}`;
  const cacheTtl = 90 * 1000; // 90초 — 서버 캐시(60초)보다 약간 길게

  // 캐시된 데이터가 있으면 즉시 반환 (화면이 바로 뜸)
  try {
    const cached = localStorage.getItem(cacheKey);
    if(cached) {
      const {data, ts} = JSON.parse(cached);
      if(Date.now() - ts < cacheTtl) return data; // 아직 신선함 → 그대로 사용
      // 만료됐어도 일단 캐시를 먼저 보여주고 백그라운드에서 갱신
      if(data) {
        fetch(url, {signal: AbortSignal.timeout(20000)})
          .then(r => r.ok ? r.json() : null)
          .then(fresh => { if(fresh) localStorage.setItem(cacheKey, JSON.stringify({data:fresh, ts:Date.now()})); })
          .catch(()=>{});
        return data;
      }
    }
  } catch(e){}

  // 캐시 없음 → 직접 fetch
  let res;
  try {
    res = await fetch(url, {signal: AbortSignal.timeout(20000)});
  } catch(fetchErr) {
    // 네트워크 오류 또는 타임아웃 — 오버레이에 에러 표시
    const ov=document.getElementById('overlay');
    const txt=document.getElementById('ovTxt');
    if(ov) ov.style.display='flex';
    if(txt) txt.innerHTML=TT({ko:`⚠ 서버 응답 없음<br><small style="color:#888">새로고침하거나 잠시 후 다시 시도해주세요</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">재시도</button>`,en:`⚠ No server response<br><small style="color:#888">Please refresh or try again shortly</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Retry</button>`,ja:`⚠ サーバーからの応答がありません<br><small style="color:#888">更新するか、しばらくしてから再度お試しください</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">再試行</button>`,es:`⚠ Sin respuesta del servidor<br><small style="color:#888">Actualiza o inténtalo de nuevo en breve</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Reintentar</button>`,de:`⚠ Keine Serverantwort<br><small style="color:#888">Bitte aktualisieren oder in Kürze erneut versuchen</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Erneut versuchen</button>`});
    throw fetchErr;
  }
  if (!res.ok) throw new Error(`API error: ${res.status}`);
  const data = await res.json();

  // 새 데이터 캐시 저장
  try { localStorage.setItem(cacheKey, JSON.stringify({data, ts:Date.now()})); } catch(e){}
  return data;
}


function renderAll(ind) {
  // 타이틀에 BTC 가격 노출 (BTC 탭일 때만, 다른 코인이면 코인명 표시)
  try {
    const priceForTitle = livePrice || ind.price;
    if(priceForTitle) {
      const priceStr = priceForTitle >= 1 ? '$'+Math.round(priceForTitle).toLocaleString() : '$'+priceForTitle.toFixed(4);
      document.title = `${currentCoin} ${priceStr} — BTCtiming.com`;
    }
  } catch(e){}
  // 오버레이 즉시 숨김
  const ov=document.getElementById('overlay');if(ov)ov.style.display='none';
  // 점수 계산은 서버(PHP)에서 완료되어 ind._buyResult / ind._sellResult로 전달됨
  let result;
  try {
    if(currentMode==='buy') {
      result = ind._buyResult;
    } else {
      result = ind._sellResult;
    }
    if(!result) throw new Error('No score result from server');
  } catch(calcErr) {
    document.getElementById('err').textContent='⚠ Calc Error: '+calcErr.message;
    document.getElementById('err').style.display='block';
    return;
  }
  indCache[currentCoin] = ind;

  const sc = result.final;
  const isInvert = currentMode==='sell';
  const scoreColor = isInvert ? (sc>=7?C.red:sc>=5?C.orange:C.yellow) : col(sc/10);
  const isKo = currentLang==='ko'; // 블로그 링크 등에서 계속 사용

  // 섹션 헤더 다국어화
  const secMap = {
    'sec_onchain': TT({ko:'온체인 밸류에이션',en:'ON-CHAIN VALUATION',ja:'オンチェーン バリュエーション',es:'VALORACIÓN ON-CHAIN',de:'ON-CHAIN-BEWERTUNG'}),
    'sec_miner':   TT({ko:'채굴자 / 심리',en:'MINER / SENTIMENT',ja:'マイナー / センチメント',es:'MINERO / SENTIMIENTO',de:'MINER / SENTIMENT'}),
    'sec_inst':    TT({ko:'기관 수급 (선행)',en:'INSTITUTIONAL FLOW',ja:'機関資金フロー (先行)',es:'FLUJO INSTITUCIONAL (adelantado)',de:'INSTITUTIONELLER FLUSS (Vorlauf)'}),
    'sec_cycle':   TT({ko:'사이클 위치',en:'CYCLE POSITION',ja:'サイクル位置',es:'POSICIÓN DEL CICLO',de:'ZYKLUSPOSITION'}),
    'sec_breakdown': TT({ko:'점수 합산',en:'Score Breakdown',ja:'スコア内訳',es:'Desglose de Puntuación',de:'Score-Aufschlüsselung'}),
    'sec_macro':   TT({ko:'매크로 경고등',en:'MACRO WARNINGS',ja:'マクロ警告',es:'ADVERTENCIAS MACRO',de:'MAKRO-WARNUNGEN'}),
    'sec_history': TT({ko:'점수 히스토리',en:'Score History',ja:'スコア履歴',es:'Historial de Puntuación',de:'Score-Verlauf'}),
    'sec_histSub': TT({ko:'브라우저 로컬 저장',en:'Saved locally in browser',ja:'ブラウザにローカル保存',es:'Guardado localmente en el navegador',de:'Lokal im Browser gespeichert'}),
  };
  Object.entries(secMap).forEach(([key,val])=>{
    document.querySelectorAll('[data-i="'+key+'"]').forEach(el=>{
      const span = el.querySelector('span');
      if(span) {
        const txt = el.childNodes[0];
        if(txt && txt.nodeType===3) txt.textContent=val+' ';
      } else el.textContent=val;
    });
  });

  // 모드 버튼 (언어 무관하게 동일 표기)
  const modeBuyEl=document.getElementById('modeBuy');
  const modeSellEl=document.getElementById('modeSell');
  if(modeBuyEl) modeBuyEl.textContent='📈 LONG';
  if(modeSellEl) modeSellEl.textContent='📉 SHORT';

  // 사이드바 라벨 다국어화
  document.querySelectorAll('.mini-stat .lbl').forEach((el,i)=>{
    const keys = currentLang==='ko'
      ? ['현재가 · 바이낸스','공포·탐욕 지수','실현가 이격률','200주 이평선 (참고)']
      : currentLang==='ja'
      ? ['現在価格 · Binance','恐怖・強欲指数','実現価格乖離率','200週移動平均線 (参考)']
      : ['Price · Binance','Fear & Greed','Realized Price Gap','200W MA (ref)'];
    if(keys[i]) el.textContent=keys[i];
  });

  // 분할 계획 헤더
  const splitHd=document.querySelector('.split-hd');
  if(splitHd) splitHd.textContent=TT({ko:'단계별 진입 계획',en:'Split Entry Plan',ja:'段階別エントリー計画',es:'Plan de Entrada Escalonada',de:'Gestaffelter Einstiegsplan'});
  const scoreLabel2=document.getElementById('scoreLabel');
  if(scoreLabel2) scoreLabel2.textContent = currentMode==='buy'
    ? TT({ko:'롱 타이밍 점수',en:'LONG TIMING SCORE',ja:'ロング タイミングスコア',es:'PUNTUACIÓN DE TIMING LARGO',de:'LONG-TIMING-SCORE'})
    : TT({ko:'숏 타이밍 점수',en:'SHORT TIMING SCORE',ja:'ショート タイミングスコア',es:'PUNTUACIÓN DE TIMING CORTO',de:'SHORT-TIMING-SCORE'});

  // Score card
  const snEl=document.getElementById('scoreNum');
  if(snEl){
    snEl.textContent=sc.toFixed(1);
    snEl.style.setProperty('color', scoreColor, 'important');
    snEl.style.fontSize='64px';
    snEl.style.fontWeight='800';
    snEl.style.display='inline';
  }
  // 액션 코드(FULL LONG, WATCH 등)는 백엔드(score_calc.php)가 영어 코드로만 내려주므로,
  // 화면에 보여줄 땐 언어별로 번역해서 표시. (이전엔 result.action을 그대로 찍어서 모든 언어에서 항상 영어로만 보였음)
  const actionLabelMap = {
    'FULL LONG':    TT({ko:'전량 진입',en:'FULL LONG',ja:'全量エントリー',es:'LONG TOTAL',de:'VOLL-LONG'}),
    'ADD LONG':     TT({ko:'비중 확대',en:'ADD LONG',ja:'比率拡大',es:'MÁS LONG',de:'LONG+'}),
    'SPLIT LONG':   TT({ko:'분할 진입',en:'SPLIT LONG',ja:'分割エントリー',es:'LONG PARCIAL',de:'TEIL-LONG'}),
    'WATCH':        TT({ko:'관찰',en:'WATCH',ja:'様子見',es:'ESPERAR',de:'WARTEN'}),
    'SPLIT EXIT':   TT({ko:'분할 청산',en:'SPLIT EXIT',ja:'分割決済',es:'SALIDA PARCIAL',de:'TEIL-EXIT'}),
    'EXIT LONG':    TT({ko:'청산 권고',en:'EXIT LONG',ja:'決済推奨',es:'SALIR',de:'EXIT'}),
    'FULL SHORT':   TT({ko:'풀 숏 진입',en:'FULL SHORT',ja:'フルショート',es:'SHORT TOTAL',de:'VOLL-SHORT'}),
    'ADD SHORT':    TT({ko:'숏 확대',en:'ADD SHORT',ja:'ショート拡大',es:'MÁS SHORT',de:'SHORT+'}),
    'PREPARE SHORT':TT({ko:'숏 준비',en:'PREPARE SHORT',ja:'ショート準備',es:'PREPARAR',de:'BEREIT'}),
    'EXIT SHORT':   TT({ko:'숏 청산',en:'EXIT SHORT',ja:'ショート決済',es:'SALIR',de:'EXIT'}),
  };
  document.getElementById('scoreAction').textContent=actionLabelMap[result.action] || result.action;
  document.getElementById('scoreAction').style.color=result.acolor;
  // 액션 설명
  const descEl = document.getElementById('scoreDesc');
  if(descEl) {
    let descTxt = '';
    if(currentMode === 'buy') {
      const buyDescMap = {
        'FULL LONG':    TT({ko:'최강 신호. 풀 롱 or 레버리지 진입.',en:'Max signal. Full long entry.',ja:'最強シグナル。フルロングまたはレバレッジエントリー。',es:'Señal máxima. Largo total o entrada apalancada.',de:'Maximales Signal. Voller Long oder gehebelter Einstieg.'}),
        'ADD LONG':     TT({ko:'강한 신호. 목표 비중 70~100% 진입.',en:'Strong signal. 70~100% of target.',ja:'強いシグナル。目標比率70~100%でエントリー。',es:'Señal fuerte. Entrada 70~100% del objetivo.',de:'Starkes Signal. Einstieg 70~100% des Ziels.'}),
        'SPLIT LONG':   TT({ko:'분할 시작. 목표 비중 30~50% 진입.',en:'Split entry. 30~50% of target.',ja:'分割開始。目標比率30~50%でエントリー。',es:'Inicio escalonado. Entrada 30~50% del objetivo.',de:'Staffelung startet. Einstieg 30~50% des Ziels.'}),
        'WATCH':        TT({ko:'관찰 구간. 소량 선진입 or 트리거 대기.',en:'Watch. Small entry or await trigger.',ja:'様子見ゾーン。少量の先行エントリーまたはトリガー待ち。',es:'Zona de observación. Entrada pequeña o esperar disparador.',de:'Beobachtungszone. Kleiner Voreinstieg oder auf Trigger warten.'}),
        'SPLIT EXIT':   TT({ko:'일부 정리. 리스크 관리 구간.',en:'Partial exit. Risk management zone.',ja:'一部決済。リスク管理ゾーン。',es:'Salida parcial. Zona de gestión de riesgo.',de:'Teilausstieg. Risikomanagement-Zone.'}),
        'EXIT LONG':    TT({ko:'전량 청산 고려. 고점 경고.',en:'Consider full exit. Top warning.',ja:'全量決済を検討。天井警告。',es:'Considerar salida total. Advertencia de techo.',de:'Vollständigen Ausstieg erwägen. Top-Warnung.'}),
      };
      descTxt = buyDescMap[result.action] || (currentLang==='ko' ? (result.actionDesc || '') : '');
    } else {
      // 백엔드(score_calc.php)는 한글 설명만 내려주므로, 영어/일본어 모드에서는 별도 번역 맵을 사용
      const sellDescMap = {
        'FULL SHORT':    TT({ko:'극단 과열. 풀 숏 진입.',en:'Extreme overheat. Full short entry.',ja:'極端な過熱。フルショートエントリー。',es:'Sobrecalentamiento extremo. Entrada corta total.',de:'Extreme Überhitzung. Vollständiger Short-Einstieg.'}),
        'ADD SHORT':     TT({ko:'강한 과열. 숏 비중 확대.',en:'Strong overheat. Increase short.',ja:'強い過熱。ショート比率拡大。',es:'Sobrecalentamiento fuerte. Aumentar posición corta.',de:'Starke Überhitzung. Short-Position erhöhen.'}),
        'PREPARE SHORT': TT({ko:'과열 시작. 숏 준비.',en:'Overheat starting. Prepare short.',ja:'過熱開始。ショート準備。',es:'Inicio de sobrecalentamiento. Preparar corto.',de:'Überhitzung beginnt. Short vorbereiten.'}),
        'WATCH':         TT({ko:'중립 관찰.',en:'Neutral watch.',ja:'中立の様子見。',es:'Observación neutral.',de:'Neutrale Beobachtung.'}),
        'SPLIT EXIT':    TT({ko:'저점 근접. 숏 분할 청산.',en:'Near bottom. Scale out of short.',ja:'底値接近。ショート分割決済。',es:'Cerca del suelo. Salida escalonada del corto.',de:'Nahe am Tief. Gestaffelter Short-Ausstieg.'}),
        'EXIT SHORT':    TT({ko:'바닥. 숏 즉시 청산.',en:'Bottom zone. Exit short immediately.',ja:'底値圏。ショート即時決済。',es:'Suelo. Cerrar corto inmediatamente.',de:'Boden. Short sofort schließen.'}),
      };
      descTxt = sellDescMap[result.shortSignal] || (currentLang==='ko' ? (result.shortDesc || '') : '');
    }
    descEl.textContent = descTxt;
    descEl.style.color = result.acolor;
  }
  lastResultDetails = result.details; // Why 패널이 최신 지표 breakdown을 참조할 수 있도록 저장
  renderMiniHistory();
  document.getElementById('scoreSub').textContent=`${currentCoin} · ${T(currentMode==='buy'?'modeSub_buy':'modeSub_sell')}`;
  const slEl=document.getElementById('scoreLabel');
  if(slEl) slEl.textContent=T(currentMode==='buy'?'modeTitle_buy':'modeTitle_sell');

  const reach=result.reach;
  document.getElementById('reachPct').textContent=reach+'%';
  document.getElementById('reachPct').style.color=scoreColor;
  document.getElementById('reachBar').style.width=reach+'%';
  document.getElementById('reachBar').style.background=scoreColor;

  // Action bar
  // ── 액션바: 전체 점수 스펙트럼 표시 ──────────────────────
  const abarEl = document.getElementById('abar');
  if(abarEl) {
    // LONG 모드: 0점(Exit Long) → 9+점(Add Long) 스펙트럼
    // SHORT 모드: 0점(Exit Short) → 9+점(Add Short) 반대 스펙트럼
    const segments = currentMode === 'buy' ? [
      {min:0,  max:3.5, bg:'#2d0a0a', color:'#ef4444', en:'EXIT LONG',  ko:'롱청산',  ja:'ロング決済', es:'SALIR', de:'EXIT', s:'≤3.5'},
      {min:3.5,max:5.0, bg:'#2d1a0a', color:'#f97316', en:'SPLIT EXIT', ko:'분할청산', ja:'分割決済', es:'PARCIAL', de:'TEIL-EXIT', s:'3.5~5'},
      {min:5.0,max:6.0, bg:'#2d2a00', color:'#fbbf24', en:'WATCH',      ko:'관찰',    ja:'観察', es:'ESPERAR', de:'WARTEN', s:'5~6'},
      {min:6.0,max:7.0, bg:'#0d2208', color:'#86efac', en:'SPLIT LONG', ko:'분할매수', ja:'分割買い', es:'ENTRAR', de:'TEIL-LONG', s:'6~7'},
      {min:7.0,max:8.0, bg:'#071a05', color:'#4ade80', en:'ADD LONG',   ko:'추가매수', ja:'追加買い', es:'LONG+', de:'LONG+', s:'7~8'},
      {min:8.0,max:11,  bg:'#041203', color:'#22c55e', en:'FULL LONG',  ko:'풀롱',    ja:'フルロング', es:'TODO LONG', de:'VOLL-LONG', s:'8+'},
    ] : [
      {min:0,  max:3.5, bg:'#041203', color:'#22c55e', en:'EXIT SHORT', ko:'숏청산',  ja:'ショート決済', es:'SALIR', de:'EXIT', s:'≤3.5'},
      {min:3.5,max:5.0, bg:'#071a05', color:'#4ade80', en:'SPLIT EXIT', ko:'분할청산', ja:'分割決済', es:'PARCIAL', de:'TEIL-EXIT', s:'3.5~5'},
      {min:5.0,max:6.0, bg:'#2d2a00', color:'#fbbf24', en:'WATCH',      ko:'관찰',    ja:'観察', es:'ESPERAR', de:'WARTEN', s:'5~6'},
      {min:6.0,max:7.0, bg:'#2d1a0a', color:'#f97316', en:'PREPARE',    ko:'숏준비',  ja:'ショート準備', es:'PREPARAR', de:'BEREIT', s:'6~7'},
      {min:7.0,max:8.0, bg:'#2d0a0a', color:'#ef4444', en:'ADD SHORT',  ko:'숏추가',  ja:'ショート追加', es:'SHORT+', de:'SHORT+', s:'7~8'},
      {min:8.0,max:11,  bg:'#1a0505', color:'#dc2626', en:'FULL SHORT', ko:'풀숏',    ja:'フルショート', es:'TODO SHORT', de:'VOLL-SHORT', s:'8+'},
    ]
    // 2줄 레이아웃: 위 4개 / 아래 3개
    const top4 = segments.slice(0, 3);
    const bot3 = segments.slice(3);
    const makeRow = (segs) => segs.map((seg) => {
      const active = sc >= seg.min && sc < seg.max;
      const segLabel = seg[currentLang] || seg.en;
      return `<div style="flex:1;min-width:0;display:flex;flex-direction:column;align-items:center;justify-content:center;
        background:${seg.bg};color:#f5f5f5;font-size:9px;gap:1px;padding:4px 2px;
        cursor:default;border-radius:0;border-bottom:3px solid ${seg.color};
        ${active?'outline:2px solid rgba(255,255,255,.55);outline-offset:-2px;font-weight:700;font-size:10px':''}">
        <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:100%;text-align:center;color:#f5f5f5">${segLabel}</span>
        <span style="font-size:7px;opacity:.75;color:#f5f5f5">${seg.s}</span>
      </div>`;
    }).join('');
    abarEl.style.flexDirection = 'column';
    abarEl.style.height = 'auto';
    abarEl.style.overflow = 'visible';
    abarEl.innerHTML =
      `<div style="display:flex;border-radius:6px 6px 0 0;overflow:hidden;height:38px">${makeRow(top4)}</div>` +
      `<div style="display:flex;border-radius:0 0 6px 6px;overflow:hidden;height:38px;margin-top:1px">${makeRow(bot3)}</div>`;
  }

  // Mini stats
  const p=ind.price;
  if(livePrice) {
    document.getElementById('mPrice').textContent=fmtP(livePrice);
  } else {
    document.getElementById('mPrice').textContent=fmtP(p);
    document.getElementById('mPriceSub').textContent=`ATH ${ind.ath_drop?.toFixed(1)||'—'}%`;
  }

  const fg=ind.fear_greed;
  document.getElementById('mFG').textContent=fg;
  document.getElementById('mFG').style.color=fg<=25?C.red:fg<=45?C.yellow:C.green;
  document.getElementById('mFGLbl').textContent=ind.fg_label||'';

  const rpGap=ind.realized_price>0?((p-ind.realized_price)/ind.realized_price*100):0;
  document.getElementById('mRP').textContent=(rpGap>=0?'+':'')+rpGap.toFixed(1)+'%';
  document.getElementById('mRP').style.color=rpGap<0?C.green:rpGap<5?C.green2:C.yellow;
  document.getElementById('mRPSub').textContent=`Realized ~${fmtP(ind.realized_price)}`;

  const maGap=ind.ma200w>0?((p-ind.ma200w)/ind.ma200w*100):0;
  document.getElementById('mMA').textContent=(maGap>=0?'+':'')+maGap.toFixed(1)+'%';
  document.getElementById('mMA').style.color=maGap<0?C.green:C.yellow;
  document.getElementById('mMASub').textContent=`200W MA ${fmtP(ind.ma200w)} (ref)`;

  // Sell/Long exit panel
  // 패널 표시/숨김
  const spEl=document.getElementById('sellPanel');
  const lgEl=document.getElementById('longGuidePanel');
  if(spEl) spEl.style.display=currentMode==='sell'?'block':'none';
  if(lgEl) lgEl.style.display=currentMode==='buy'?'block':'none';

  if(currentMode==='sell') {
    const sc=result.final;
    const el=(id)=>document.getElementById(id);
    let stMain,stDesc,gAction,gDesc,exitSig,exitDesc;

    if(sc>=8.0){
      stMain=TT({ko:'🔴 극단 과열 — 역대 고점 수준',en:'🔴 Extreme Overheat — Historical Top',ja:'🔴 極端な過熱 — 歴代高値水準',es:'🔴 Sobrecalentamiento Extremo — Nivel de Techo Histórico',de:'🔴 Extreme Überhitzung — Historisches Hoch-Niveau'});
      stDesc=TT({ko:'모든 과열 지표가 위험 구간. 2021년 11월 ATH 직전과 유사한 패턴.',en:'All overheat indicators in danger zone.',ja:'全ての過熱指標が危険水準。2021年11月のATH直前と類似したパターン。',es:'Todos los indicadores de sobrecalentamiento en zona de peligro. Patrón similar al justo antes del ATH de noviembre 2021.',de:'Alle Überhitzungsindikatoren im Gefahrenbereich. Ähnliches Muster wie kurz vor dem ATH im November 2021.'});
      gAction=TT({ko:'FULL SHORT — 풀 숏 진입',en:'FULL SHORT — Full short entry',ja:'FULL SHORT — フルショートエントリー',es:'SHORT TOTAL — Entrada corta total',de:'VOLL-SHORT — Vollständiger Short-Einstieg'});
      gDesc=TT({ko:'목표 비중 100% 숏 진입. 레버리지 숏 고려 가능. 스탑로스: ATH +5% 위 설정.',en:'Enter 100% short. Leverage possible. Stop loss: 5% above ATH.',ja:'目標比率100%でショートエントリー。レバレッジショートも検討可。ストップロス: ATH+5%上に設定。',es:'Entrada corta 100% del objetivo. Corto apalancado posible. Stop loss: 5% por encima del ATH.',de:'Short-Einstieg 100% des Ziels. Gehebelter Short möglich. Stop-Loss: 5% über ATH.'});
      exitSig=TT({ko:'청산 조건 (중요)',en:'Exit Conditions (Important)',ja:'決済条件 (重要)',es:'Condiciones de Salida (Importante)',de:'Ausstiegsbedingungen (Wichtig)'});
      exitDesc=TT({ko:'• MVRV Z 2.5 이하 하락\n• Fear & Greed 50 이하\n• 선물 갭 0.05% 이하로 축소',en:'• MVRV Z drops below 2.5\n• Fear & Greed below 50\n• Futures gap shrinks below 0.05%',ja:'• MVRV Zが2.5以下に低下\n• Fear & Greedが50以下\n• 先物ギャップが0.05%以下に縮小',es:'• MVRV Z cae por debajo de 2.5\n• Fear & Greed por debajo de 50\n• Brecha de futuros se reduce por debajo de 0.05%',de:'• MVRV Z fällt unter 2,5\n• Angst & Gier unter 50\n• Futures-Spread schrumpft unter 0,05%'});
    } else if(sc>=7.0){
      stMain=TT({ko:'🔴 강한 과열 신호',en:'🔴 Strong Overheat Signal',ja:'🔴 強い過熱シグナル',es:'🔴 Señal de Sobrecalentamiento Fuerte',de:'🔴 Starkes Überhitzungssignal'});
      stDesc=TT({ko:'주요 과열 지표들이 경고 수준. 탐욕 지수와 선물 포지션이 과도하게 롱 쏠림.',en:'Key overheat indicators at warning levels. Extreme long bias.',ja:'主要な過熱指標が警告水準。強欲指数と先物ポジションが過度にロングに偏っています。',es:'Los principales indicadores de sobrecalentamiento en nivel de advertencia. Índice de codicia y posiciones de futuros muy sesgados a largo.',de:'Wichtige Überhitzungsindikatoren auf Warnstufe. Gier-Index und Futures-Positionen stark long-lastig.'});
      gAction=TT({ko:'ADD SHORT — 숏 비중 확대',en:'ADD SHORT — Increase short',ja:'ADD SHORT — ショート比率拡大',es:'SHORT+ — Ampliar posición corta',de:'SHORT+ — Short-Position erhöhen'});
      gDesc=TT({ko:'기존 숏 있다면 목표 비중의 70~100%로 확대. 신규 진입은 분할로.',en:'If holding short, scale to 70~100%. New entry: split in.',ja:'既存ショートがあれば目標比率の70~100%まで拡大。新規エントリーは分割で。',es:'Si mantiene un corto, ampliar al 70~100% del objetivo. Nueva entrada de forma escalonada.',de:'Bei bestehendem Short auf 70~100% des Ziels erhöhen. Neueinstieg gestaffelt.'});
      exitSig=TT({ko:'숏 청산 조건',en:'Short Exit Conditions',ja:'ショート決済条件',es:'Condiciones de Salida Corta',de:'Short-Ausstiegsbedingungen'});
      exitDesc=TT({ko:'• NUPL 50% 이하\n• Fear & Greed 60 이하\n• Coinbase Premium 음수 전환',en:'• NUPL drops below 50%\n• Fear & Greed below 60\n• Coinbase Premium turns negative',ja:'• NUPLが50%以下\n• Fear & Greedが60以下\n• Coinbaseプレミアムがマイナスに転換',es:'• NUPL cae por debajo de 50%\n• Fear & Greed por debajo de 60\n• Coinbase Premium se vuelve negativo',de:'• NUPL fällt unter 50%\n• Angst & Gier unter 60\n• Coinbase Premium wird negativ'});
    } else if(sc>=6.0){
      stMain=TT({ko:'🟠 과열 시작 — 준비 구간',en:'🟠 Overheat Beginning — Prepare',ja:'🟠 過熱開始 — 準備ゾーン',es:'🟠 Inicio de Sobrecalentamiento — Zona de Preparación',de:'🟠 Überhitzung beginnt — Vorbereitungszone'});
      stDesc=TT({ko:'일부 지표가 과열 신호. 아직 확정은 아니지만 숏 준비할 타이밍.',en:'Some overheat signals. Not confirmed but time to prepare.',ja:'一部の指標が過熱シグナル。まだ確定ではないもののショート準備のタイミング。',es:'Algunos indicadores muestran sobrecalentamiento. Aún no confirmado, pero es momento de preparar corto.',de:'Einige Indikatoren zeigen Überhitzung. Noch nicht bestätigt, aber Zeit, Short vorzubereiten.'});
      gAction=TT({ko:'PREPARE SHORT — 소량 선진입',en:'PREPARE SHORT — Small entry',ja:'PREPARE SHORT — 少量の先行エントリー',es:'PREPARAR — Entrada pequeña anticipada',de:'BEREIT — Kleiner Voreinstieg'});
      gDesc=TT({ko:'목표 비중의 30~50% 소량 선진입. 추가 과열 확인 후 비중 확대.',en:'Enter 30~50% of target. Wait for confirmation to add.',ja:'目標比率の30~50%を少量先行エントリー。さらなる過熱確認後に拡大。',es:'Entrada pequeña anticipada 30~50% del objetivo. Ampliar tras confirmar más sobrecalentamiento.',de:'Kleiner Voreinstieg 30~50% des Ziels. Nach Bestätigung weiterer Überhitzung erhöhen.'});
      exitSig=TT({ko:'추가 확인 조건',en:'Confirmation needed',ja:'追加確認条件',es:'Confirmación necesaria',de:'Bestätigung erforderlich'});
      exitDesc=TT({ko:'• 다음 추가 조건 대기:\n• NUPL 60% 이상\n• Fear & Greed 75 이상',en:'• Wait for:\n• NUPL above 60%\n• Fear & Greed above 75',ja:'• 次の条件を待機:\n• NUPLが60%以上\n• Fear & Greedが75以上',es:'• Esperar próxima condición:\n• NUPL por encima de 60%\n• Fear & Greed por encima de 75',de:'• Warten auf nächste Bedingung:\n• NUPL über 60%\n• Angst & Gier über 75'});
    } else if(sc>=5.0){
      stMain=TT({ko:'🟡 중립 관찰 구간',en:'🟡 Neutral Watch Zone',ja:'🟡 中立の様子見ゾーン',es:'🟡 Zona de Observación Neutral',de:'🟡 Neutrale Beobachtungszone'});
      stDesc=TT({ko:'뚜렷한 방향성 없음. 과열도 저점도 아닌 중간 구간. 서두르지 마세요.',en:'No clear direction. Neither overheat nor bottom.',ja:'明確な方向性なし。過熱でも底値でもない中間ゾーン。焦らないでください。',es:'Sin dirección clara. Ni sobrecalentado ni en suelo, zona intermedia. No se apresure.',de:'Keine klare Richtung. Weder überhitzt noch am Tief, mittlere Zone. Nicht überstürzen.'});
      gAction=TT({ko:'WATCH — 진입 대기',en:'WATCH — Wait for signal',ja:'WATCH — エントリー待機',es:'ESPERAR — Esperar señal',de:'WARTEN — Auf Signal warten'});
      gDesc=TT({ko:'숏 진입 서두르지 마세요. 6.0점 이상 도달 시 행동. 현 시장 모니터링 지속.',en:'Do not rush. Act when score reaches 6.0+. Keep monitoring.',ja:'ショートエントリーを急がないでください。スコア6.0以上で行動。現市場を継続監視。',es:'No se apresure a entrar en corto. Actuar al alcanzar 6.0+. Seguir monitoreando el mercado actual.',de:'Nicht überstürzt short gehen. Bei Erreichen von 6,0+ handeln. Markt weiter beobachten.'});
      exitSig=TT({ko:'기존 숏 보유 중이라면',en:'If holding short position',ja:'既存ショート保有中の場合',es:'Si mantiene posición corta',de:'Bei bestehender Short-Position'});
      exitDesc=TT({ko:'• 목표 수익 50% 달성 시 절반 청산\n• 손절: 진입가 대비 +5%',en:'• Close 50% at 50% profit target\n• Stop loss: +5% from entry',ja:'• 目標利益50%達成時に半分決済\n• 損切り: エントリー価格比+5%',es:'• Cerrar la mitad al alcanzar 50% de ganancia objetivo\n• Stop loss: +5% desde entrada',de:'• Bei 50% Zielgewinn die Hälfte schließen\n• Stop-Loss: +5% vom Einstieg'});
    } else if(sc>=3.5){
      stMain=TT({ko:'🟢 과열 신호 부재 — 숏 위험',en:'🟢 No Overheat Signals — Short Risky',ja:'🟢 過熱シグナル不在 — ショートリスク高',es:'🟢 Sin Señales de Sobrecalentamiento — Corto Riesgoso',de:'🟢 Keine Überhitzungssignale — Short riskant'});
      stDesc=TT({ko:'현재 과열·고점 신호가 거의 없는 구간. 숏 포지션 보유 중이라면 일부 청산 권고. (※ 이 점수는 "지금 가격이 비싸 보이지 않는다"는 뜻이지, 실제 역사적 저점이라는 의미는 아닙니다.)',en:'Few overheat signals present right now. Partial exit recommended for shorts. (※ This means current price doesn\'t look overextended — not that it\'s an actual historical low.)',ja:'現在過熱・天井シグナルがほとんどないゾーン。ショートポジション保有中なら一部決済を推奨。(※このスコアは「今の価格が割高に見えない」という意味であり、実際の歴史的底値という意味ではありません。)',es:'Zona con casi ninguna señal de sobrecalentamiento o techo actualmente. Se recomienda salida parcial si mantiene posición corta. (※ Esta puntuación significa que "el precio actual no parece caro", no que sea un suelo histórico real.)',de:'Zone mit derzeit kaum Überhitzungs- oder Top-Signalen. Bei bestehender Short-Position wird Teilausstieg empfohlen. (※ Dieser Score bedeutet "aktueller Preis wirkt nicht teuer", nicht dass es sich um ein echtes historisches Tief handelt.)'});
      gAction=TT({ko:'SPLIT EXIT — 분할 청산',en:'SPLIT EXIT — Scale out',ja:'SPLIT EXIT — 分割決済',es:'PARCIAL — Salida escalonada',de:'TEIL-EXIT — Gestaffelter Ausstieg'});
      gDesc=TT({ko:'기존 숏의 50% 청산. 나머지는 추가 하락 관찰 후 판단. 신규 숏 진입 절대 금지.',en:'Close 50% of short. Hold rest carefully. No new short entries.',ja:'既存ショートの50%を決済。残りはさらなる下落を観察して判断。新規ショートエントリーは厳禁。',es:'Cerrar el 50% del corto existente. Decidir el resto tras observar más caídas. Prohibido abrir nuevos cortos.',de:'50% der bestehenden Short-Position schließen. Rest nach weiterer Beobachtung entscheiden. Keine neuen Short-Einstiege.'});
      exitSig=TT({ko:'전량 청산 조건',en:'Full exit conditions',ja:'全量決済条件',es:'Condiciones de salida total',de:'Vollständige Ausstiegsbedingungen'});
      exitDesc=TT({ko:'• MVRV Z 0.5 이하\n• Fear & Greed 20 이하\n• 선물 갭 음수 전환',en:'• MVRV Z below 0.5\n• Fear & Greed below 20\n• Futures gap turns negative',ja:'• MVRV Zが0.5以下\n• Fear & Greedが20以下\n• 先物ギャップがマイナスに転換',es:'• MVRV Z por debajo de 0.5\n• Fear & Greed por debajo de 20\n• Brecha de futuros se vuelve negativa',de:'• MVRV Z unter 0,5\n• Angst & Gier unter 20\n• Futures-Spread wird negativ'});
    } else {
      stMain=TT({ko:'🟢 과열 신호 전무 — 숏 즉시 청산',en:'🟢 Zero Overheat Signals — Exit Short Now',ja:'🟢 過熱シグナル皆無 — ショート即時決済',es:'🟢 Cero Señales de Sobrecalentamiento — Cerrar Corto Ahora',de:'🟢 Keine Überhitzungssignale — Short sofort schließen'});
      stDesc=TT({ko:'고점·과열 신호가 전혀 없는 구간. 숏 포지션 유지는 위험하니 손실이더라도 즉시 청산을 고려하세요. (※ 차트가 실제로 상승 추세 중이어도 뜰 수 있는 메시지입니다 — 이 점수는 "역사적 저점"이 아니라 "지금은 과열되지 않았다"만 의미합니다. 차트와 함께 직접 판단하세요.)',en:'No overheat or top signals present at all. Holding a short here is risky — consider exiting even at a loss. (※ This can appear even while the chart is in a clear uptrend — the score means "not currently overheated," not "historical low." Always check the chart yourself.)',ja:'天井・過熱シグナルが全くないゾーン。ショートポジション維持はリスクが高いため、損失が出ていても即時決済を検討してください。(※チャートが実際に上昇トレンド中でも表示されうるメッセージです — このスコアは「歴史的底値」ではなく「今は過熱していない」という意味だけです。チャートと合わせてご自身で判断してください。)',es:'Zona sin ninguna señal de techo o sobrecalentamiento. Mantener una posición corta aquí es arriesgado — considere salir incluso con pérdida. (※ Este mensaje puede aparecer incluso con el gráfico en clara tendencia alcista — la puntuación significa "no sobrecalentado actualmente", no "suelo histórico". Siempre revise el gráfico usted mismo.)',de:'Zone ohne jegliche Top- oder Überhitzungssignale. Eine Short-Position hier zu halten ist riskant — Ausstieg auch bei Verlust erwägen. (※ Diese Meldung kann auch bei klarem Aufwärtstrend im Chart erscheinen — der Score bedeutet "aktuell nicht überhitzt", nicht "historisches Tief". Chart immer selbst prüfen.)'});
      gAction=TT({ko:'EXIT SHORT — 전량 즉시 청산',en:'EXIT SHORT — Close all immediately',ja:'EXIT SHORT — 全量即時決済',es:'SALIR — Cerrar todo de inmediato',de:'EXIT — Alles sofort schließen'});
      gDesc=TT({ko:'모든 숏 즉시 청산. 손실 감수하더라도 추가 손실 방지 최우선. 롱 전환 검토.',en:'Close ALL shorts now. Prevent further losses. Consider switching to long.',ja:'全てのショートを即時決済。損失を受け入れてでもさらなる損失防止を最優先。ロング転換を検討。',es:'Cerrar TODOS los cortos ahora. Priorizar evitar más pérdidas incluso asumiendo pérdida. Considerar cambiar a largo.',de:'ALLE Short-Positionen sofort schließen. Weitere Verluste vermeiden hat Priorität, auch bei Verlust. Wechsel zu Long erwägen.'});
      exitSig=TT({ko:'⚠️ 지금 즉시 행동',en:'⚠️ Act right now',ja:'⚠️ 今すぐ行動',es:'⚠️ Actuar ahora mismo',de:'⚠️ Sofort handeln'});
      exitDesc=TT({ko:'• 현재 시장가로 전량 청산\n• 숏 재진입은 6.0점 이상에서만\n• 롱 진입 적극 검토',en:'• Close at market price now\n• Only re-short above 6.0\n• Strongly consider going long',ja:'• 現在の市場価格で全量決済\n• ショート再エントリーはスコア6.0以上でのみ\n• ロングエントリーを積極的に検討',es:'• Cerrar todo al precio de mercado actual\n• Reingresar corto solo por encima de 6.0\n• Considerar seriamente entrada larga',de:'• Alles zum aktuellen Marktpreis schließen\n• Short-Wiedereinstieg nur über 6,0\n• Long-Einstieg stark erwägen'});
    }

    if(el('sStatusTitle')) el('sStatusTitle').textContent=TT({ko:'📊 현재 시장 상태',en:'📊 MARKET STATUS',ja:'📊 現在の市場状況',es:'📊 ESTADO DEL MERCADO',de:'📊 MARKTSTATUS'});
    if(el('sStatusMain'))  {el('sStatusMain').textContent=stMain;el('sStatusMain').style.color=result.acolor;}
    if(el('sStatusDesc'))  el('sStatusDesc').textContent=stDesc;
    if(el('sGuideTitle'))  el('sGuideTitle').textContent=TT({ko:'💡 숏 포지션 가이드',en:'💡 SHORT GUIDE',ja:'💡 ショートポジションガイド',es:'💡 GUÍA CORTO',de:'💡 SHORT-ANLEITUNG'});
    if(el('sGuideAction')) {el('sGuideAction').textContent=gAction;el('sGuideAction').style.color=result.acolor;}
    if(el('sGuideDesc'))   el('sGuideDesc').textContent=gDesc;
    if(el('sExitTitle'))   el('sExitTitle').textContent=TT({ko:'🎯 숏 청산 조건',en:'🎯 SHORT EXIT',ja:'🎯 ショート決済条件',es:'🎯 SALIDA CORTA',de:'🎯 SHORT-AUSSTIEG'});
    if(el('sExitSig'))     el('sExitSig').textContent=exitSig;
    if(el('sExitDesc'))    el('sExitDesc').textContent=exitDesc;

  } else {
    const sc=result.final;
    const el=(id)=>document.getElementById(id);
    let stMain,stDesc,gAction,gDesc,nextDesc;

    if(sc>=8.0){
      stMain=TT({ko:'🟢 저점형 신호 다수 — 매수 타이밍',en:'🟢 Multiple Bottom Signals — Buy Timing',ja:'🟢 底値型シグナル多数 — 買いタイミング',es:'🟢 Múltiples Señales de Suelo — Momento de Compra',de:'🟢 Mehrere Tiefsignale — Kaufzeitpunkt'});
      stDesc=TT({ko:'현재 온체인·기술 지표 대부분이 저평가 구간을 가리킴. (※ 2018·2022년 바닥과 "비슷한 신호 조합"일 뿐, 정확히 같은 패턴이 반복된다는 보장은 아닙니다.)',en:'Most on-chain/technical indicators currently point to undervaluation. (※ A similar signal combination to 2018/2022 bottoms — not a guarantee the exact pattern repeats.)',ja:'現在オンチェーン・テクニカル指標の大半が割安ゾーンを示唆。(※2018・2022年の底値と「似たシグナルの組み合わせ」であるだけで、正確に同じパターンが繰り返される保証ではありません。)',es:'La mayoría de los indicadores on-chain y técnicos actuales apuntan a una zona de infravaloración. (※ Solo es una "combinación de señales similar" a los suelos de 2018/2022 — no garantiza que se repita exactamente el mismo patrón.)',de:'Die meisten aktuellen On-Chain- und technischen Indikatoren deuten auf eine Unterbewertungszone hin. (※ Nur eine "ähnliche Signalkombination" wie die Tiefs 2018/2022 — keine Garantie, dass sich genau dasselbe Muster wiederholt.)'});
      gAction=TT({ko:'FULL LONG — 전량 진입',en:'FULL LONG — Enter full position',ja:'FULL LONG — 全量エントリー',es:'LONG TOTAL — Entrada total',de:'VOLL-LONG — Vollständiger Einstieg'});
      gDesc=TT({ko:'목표 비중 100% 진입. 레버리지 고려 가능. 스탑로스: 현재가 -15%. 장기 보유 전략.',en:'Enter 100%. Leverage possible. Stop loss -15%. Long-term hold.',ja:'目標比率100%でエントリー。レバレッジも検討可。ストップロス: 現在価格-15%。長期保有戦略。',es:'Entrada 100% del objetivo. Apalancamiento posible. Stop loss -15% del precio actual. Estrategia de largo plazo.',de:'Einstieg 100% des Ziels. Hebel möglich. Stop-Loss -15% vom aktuellen Preis. Langfristige Halte-Strategie.'});
      nextDesc=TT({ko:'✓ 모든 트리거 달성\n목표: 다음 반감기 후 12~18개월',en:'✓ All triggers achieved\nTarget: 12~18mo after next halving',ja:'✓ 全トリガー達成\n目標: 次回半減期後12~18ヶ月',es:'✓ Todos los disparadores logrados\nObjetivo: 12~18 meses tras el próximo halving',de:'✓ Alle Trigger erreicht\nZiel: 12~18 Monate nach dem nächsten Halving'});
    } else if(sc>=7.0){
      stMain=TT({ko:'🟢 강한 저점 신호',en:'🟢 Strong Bottom Signal',ja:'🟢 強い底値シグナル',es:'🟢 Señal de Suelo Fuerte',de:'🟢 Starkes Tiefsignal'});
      stDesc=TT({ko:'MVRV Z, NUPL 등 핵심 지표가 저점 구간. 역사적으로 최고의 매수 기회 중 하나.',en:'Core indicators in bottom zone. One of the best historical buy opportunities.',ja:'MVRV Z、NUPLなど主要指標が底値ゾーン。歴史的に最良の買い場の一つ。',es:'Indicadores clave como MVRV Z y NUPL en zona de suelo. Una de las mejores oportunidades de compra históricas.',de:'Kernindikatoren wie MVRV Z und NUPL in der Tiefzone. Eine der historisch besten Kaufgelegenheiten.'});
      gAction=TT({ko:'ADD LONG — 비중 70~100% 확대',en:'ADD LONG — Scale to 70~100%',ja:'ADD LONG — 比率70~100%に拡大',es:'LONG+ — Ampliar a 70~100%',de:'LONG+ — Auf 70~100% erhöhen'});
      gDesc=TT({ko:'목표 비중 70~100% 분할 진입. 1~2차 진입 후 추가 하락 시 나머지 투입.',en:'Split entry 70~100%. Enter 1st tranche, add rest on dips.',ja:'目標比率70~100%を分割エントリー。1~2回目のエントリー後、さらなる下落時に残りを投入。',es:'Entrada escalonada 70~100% del objetivo. Tras la 1ª-2ª entrada, invertir el resto en más caídas.',de:'Gestaffelter Einstieg 70~100% des Ziels. Nach 1.-2. Tranche bei weiterem Rückgang den Rest investieren.'});
      nextDesc=TT({ko:'• Hash Ribbon 회복 전환 → FULL LONG\n• Coinbase Premium 양전환 → 기관 진입 신호',en:'• Hash Ribbon recovery → FULL LONG\n• Coinbase Premium positive → institutional signal',ja:'• Hash Ribbon回復転換 → FULL LONG\n• Coinbaseプレミアムがプラス転換 → 機関エントリーシグナル',es:'• Recuperación Hash Ribbon → FULL LONG\n• Coinbase Premium positivo → señal institucional',de:'• Hash-Ribbon-Erholung → FULL LONG\n• Coinbase Premium positiv → institutionelles Signal'});
    } else if(sc>=6.0){
      stMain=TT({ko:'🟡 분할 진입 시작 구간',en:'🟡 Split Entry Zone',ja:'🟡 分割エントリー開始ゾーン',es:'🟡 Zona de Inicio de Entrada Escalonada',de:'🟡 Gestaffelte Einstiegszone'});
      stDesc=TT({ko:'저점 신호가 나타나고 있지만 확정 전. 분할 매수로 리스크 분산 권고.',en:'Bottom signals emerging, not confirmed. Spread risk with split entries.',ja:'底値シグナルが出始めていますが確定前。分割買いでリスク分散を推奨。',es:'Aparecen señales de suelo, aún sin confirmar. Se recomienda dispersar el riesgo con entradas escalonadas.',de:'Tiefsignale erscheinen, noch unbestätigt. Risikostreuung mit gestaffelten Einstiegen empfohlen.'});
      gAction=TT({ko:'SPLIT LONG — 30~50% 분할 진입',en:'SPLIT LONG — 30~50% split entry',ja:'SPLIT LONG — 30~50%分割エントリー',es:'LONG PARCIAL — Entrada escalonada 30~50%',de:'TEIL-LONG — Gestaffelter Einstieg 30~50%'});
      gDesc=TT({ko:'목표 비중 30~50% 1차 진입. 트리거 달성 시마다 추가 진입. 한 번에 올인 금지.',en:'Enter 30~50% first. Add more at each trigger. No all-in.',ja:'目標比率30~50%を1回目エントリー。トリガー達成ごとに追加エントリー。一括投入は禁止。',es:'Primera entrada 30~50% del objetivo. Añadir en cada disparador. No invertir todo de una vez.',de:'Erster Einstieg 30~50% des Ziels. Bei jedem Trigger nachlegen. Kein All-in auf einmal.'});
      nextDesc=TT({ko:'• MVRV Z 0 이하 → ADD LONG\n• Hash Ribbon 회복 전환\n• Coinbase Premium 양전환',en:'• MVRV Z below 0 → ADD LONG\n• Hash Ribbon recovery\n• Coinbase Premium turns positive',ja:'• MVRV Zが0以下 → ADD LONG\n• Hash Ribbon回復転換\n• Coinbaseプレミアムがプラス転換',es:'• MVRV Z por debajo de 0 → ADD LONG\n• Recuperación Hash Ribbon\n• Coinbase Premium se vuelve positivo',de:'• MVRV Z unter 0 → ADD LONG\n• Hash-Ribbon-Erholung\n• Coinbase Premium wird positiv'});
    } else if(sc>=5.0){
      stMain=TT({ko:'🟡 관찰 구간 — 트리거 대기',en:'🟡 Watch Zone — Await Triggers',ja:'🟡 様子見ゾーン — トリガー待ち',es:'🟡 Zona de Observación — Esperando Disparadores',de:'🟡 Beobachtungszone — Warten auf Trigger'});
      stDesc=TT({ko:'일부 저점 신호 있으나 확신 부족. 핵심 트리거 발생 전까지 소량만 허용.',en:'Some signals but not enough. Small entry only before key triggers.',ja:'一部底値シグナルはあるが確信不足。主要トリガー発生前は少量のみ許可。',es:'Hay algunas señales de suelo pero falta confianza. Solo se permite entrada pequeña hasta el disparador clave.',de:'Einige Tiefsignale vorhanden, aber unzureichend. Nur kleiner Einstieg bis zum Haupttrigger erlaubt.'});
      gAction=TT({ko:'WATCH — 소량 선진입 10~20%',en:'WATCH — Small entry 10~20%',ja:'WATCH — 少量先行エントリー10~20%',es:'ESPERAR — Entrada pequeña 10~20%',de:'WARTEN — Kleiner Voreinstieg 10~20%'});
      gDesc=TT({ko:'성급한 진입 금지. 전체 계획의 10~20%만 선진입 허용. 손절 명확히 설정.',en:'No rush. 10~20% entry max. Set clear stop loss.',ja:'拙速なエントリーは禁止。全体計画の10~20%のみ先行エントリー許可。損切りを明確に設定。',es:'No entrar apresuradamente. Solo se permite 10~20% del plan total como entrada anticipada. Fijar stop loss claramente.',de:'Keine überstürzten Einstiege. Nur 10~20% des Gesamtplans als Voreinstieg erlaubt. Stop-Loss klar festlegen.'});
      nextDesc=TT({ko:'• Coinbase Premium 양전환\n• NUPL 0% 이하\n• 선물 갭 음수 전환',en:'• Coinbase Premium turns positive\n• NUPL drops below 0%\n• Futures gap turns negative',ja:'• Coinbaseプレミアムがプラス転換\n• NUPLが0%以下\n• 先物ギャップがマイナスに転換',es:'• Coinbase Premium se vuelve positivo\n• NUPL cae por debajo de 0%\n• Brecha de futuros se vuelve negativa',de:'• Coinbase Premium wird positiv\n• NUPL fällt unter 0%\n• Futures-Spread wird negativ'});
    } else if(sc>=3.5){
      stMain=TT({ko:'🟠 조정 진행 중 — 진입 이름',en:'🟠 Correction In Progress — Too Early',ja:'🟠 調整進行中 — エントリーには早い',es:'🟠 Corrección en Curso — Muy Pronto',de:'🟠 Korrektur im Gange — Zu früh'});
      stDesc=TT({ko:'시장 조정 진행 중. 기존 롱 포지션 일부 정리 고려. 신규 진입은 아직 이름.',en:'Market correcting. Consider trimming longs. Too early for new entry.',ja:'市場調整が進行中。既存ロングポジションの一部整理を検討。新規エントリーはまだ早い。',es:'Corrección de mercado en curso. Considerar reducir parcialmente posiciones largas. Aún es pronto para nueva entrada.',de:'Marktkorrektur im Gange. Teilweise Reduzierung bestehender Long-Positionen erwägen. Für Neueinstieg noch zu früh.'});
      gAction=TT({ko:'SPLIT EXIT — 30~50% 일부 정리',en:'SPLIT EXIT — Trim 30~50%',ja:'SPLIT EXIT — 30~50%一部整理',es:'PARCIAL — Reducir 30~50%',de:'TEIL-EXIT — 30~50% teilweise reduzieren'});
      gDesc=TT({ko:'기존 롱의 30~50% 정리. 현금 비중 확보. 5.0점 이상 회복 시 재진입.',en:'Trim 30~50% of long. Build cash. Re-enter when score recovers to 5.0+.',ja:'既存ロングの30~50%を整理。現金比率を確保。スコア5.0以上に回復時に再エントリー。',es:'Reducir 30~50% del largo. Asegurar liquidez. Reingresar si la puntuación recupera 5.0+.',de:'Long-Position um 30~50% reduzieren. Cash-Anteil sichern. Bei Erholung auf 5,0+ wiedereinsteigen.'});
      nextDesc=TT({ko:'재진입 조건:\n• 점수 5.0 이상 회복\n• Coinbase Premium 개선\n• STH-SOPR 0.97 이하',en:'Re-entry:\n• Score above 5.0\n• Coinbase Premium improves\n• STH-SOPR below 0.97',ja:'再エントリー条件:\n• スコア5.0以上に回復\n• Coinbaseプレミアム改善\n• STH-SOPRが0.97以下',es:'Condiciones de reingreso:\n• Puntuación recupera 5.0+\n• Coinbase Premium mejora\n• STH-SOPR por debajo de 0.97',de:'Wiedereinstiegsbedingungen:\n• Score erholt sich auf 5,0+\n• Coinbase Premium verbessert sich\n• STH-SOPR unter 0,97'});
    } else {
      stMain=TT({ko:'🔴 고점/과열 — 즉시 청산',en:'🔴 Top/Overheat — Exit Now',ja:'🔴 天井/過熱 — 即時決済',es:'🔴 Techo/Sobrecalentamiento — Salir Ahora',de:'🔴 Top/Überhitzung — Sofort aussteigen'});
      stDesc=TT({ko:'시장 고점 신호. 롱 포지션 매우 위험. 수익 있다면 즉시 확보.',en:'Top signals. Long position very risky. Take profit immediately.',ja:'市場天井シグナル。ロングポジションは非常に危険。利益があれば即時確保。',es:'Señal de techo de mercado. Posición larga muy riesgosa. Asegurar ganancias de inmediato si las hay.',de:'Marktsignal für Hoch. Long-Position sehr riskant. Gewinne sofort sichern, falls vorhanden.'});
      gAction=TT({ko:'EXIT LONG — 전량 즉시 청산',en:'EXIT LONG — Exit all immediately',ja:'EXIT LONG — 全量即時決済',es:'SALIR — Cerrar todo de inmediato',de:'EXIT — Alles sofort schließen'});
      gDesc=TT({ko:'모든 롱 청산. 수익 확보 우선. 손실 발생 시에도 추가 손실 방지 최우선.',en:'Close all longs. Protect profits. Prevent further losses.',ja:'全てのロングを決済。利益確保を優先。損失発生時もさらなる損失防止を最優先。',es:'Cerrar todos los largos. Priorizar asegurar ganancias. Priorizar evitar más pérdidas incluso con pérdida actual.',de:'Alle Long-Positionen schließen. Gewinnsicherung priorisieren. Auch bei Verlust weitere Verluste vermeiden.'});
      nextDesc=TT({ko:'재진입 조건:\n• 점수 6.0 이상\n• 온체인 지표 저점 진입 확인',en:'Re-entry:\n• Score above 6.0\n• On-chain confirms bottom',ja:'再エントリー条件:\n• スコア6.0以上\n• オンチェーン指標が底値を確認',es:'Condiciones de reingreso:\n• Puntuación por encima de 6.0\n• On-chain confirma suelo',de:'Wiedereinstiegsbedingungen:\n• Score über 6,0\n• On-Chain bestätigt Tief'});
    }

    if(el('lStatusTitle')) el('lStatusTitle').textContent=TT({ko:'📊 현재 시장 상태',en:'📊 MARKET STATUS',ja:'📊 現在の市場状況',es:'📊 ESTADO DEL MERCADO',de:'📊 MARKTSTATUS'});
    if(el('lStatusMain'))  {el('lStatusMain').textContent=stMain;el('lStatusMain').style.color=result.acolor;}
    if(el('lStatusDesc'))  el('lStatusDesc').textContent=stDesc;
    if(el('lGuideTitle'))  el('lGuideTitle').textContent=TT({ko:'💡 롱 포지션 가이드',en:'💡 LONG GUIDE',ja:'💡 ロングポジションガイド',es:'💡 GUÍA LARGO',de:'💡 LONG-ANLEITUNG'});
    if(el('lGuideAction')) {el('lGuideAction').textContent=gAction;el('lGuideAction').style.color=result.acolor;}
    if(el('lGuideDesc'))   el('lGuideDesc').textContent=gDesc;
    if(el('lNextTitle'))   el('lNextTitle').textContent=TT({ko:'🎯 다음 진입 조건',en:'🎯 NEXT TRIGGER',ja:'🎯 次のエントリー条件',es:'🎯 SIGUIENTE DISPARADOR',de:'🎯 NÄCHSTER TRIGGER'});
    if(el('lNextDesc'))    el('lNextDesc').textContent=nextDesc;
    if(el('lSplitTitle'))  el('lSplitTitle').textContent=TT({ko:'💰 분할 매수 계획',en:'💰 SPLIT ENTRY PLAN',ja:'💰 分割エントリー計画',es:'💰 PLAN DE ENTRADA ESCALONADA',de:'💰 GESTAFFELTER EINSTIEGSPLAN'});
  const assetInput = document.getElementById('userAsset');
  if(assetInput && document.activeElement !== assetInput) assetInput.value = TOTAL_USDT;
  const assetLbl = document.getElementById('lAssetLabel');
  if(assetLbl) assetLbl.textContent = TT({ko:'투자 자산',en:'Investment',ja:'投資資産',es:'Inversión',de:'Investition'});
  }

  // Grids — buy: 고정 키 배분, sell: 동적 배분
  const det=result.details;
  const keys=Object.keys(det);
  let g1k,g2k,g3k,g4k;
  if(currentMode==='buy') {
    // buy: 온체인(3) / 채굴자+심리(3) / 기관수급(3) / 사이클(1)
    const buyG1 = ['mvrv_z','nupl','realized','alt_valuation','alt_drawdown'];
    const buyG2 = ['hash_ribbon','sth_sopr','funding','rsi','vol_change'];
    const buyG3 = ['cb_premium','lth_supply','dom'];
    const buyG4 = ['halving','btc_corr','btc_corr_tech'].filter(k=>det[k]);
    g1k = buyG1.filter(k=>det[k]);
    g2k = buyG2.filter(k=>det[k]);
    g3k = buyG3.filter(k=>det[k]);
    g4k = buyG4.filter(k=>det[k]);
    // 나머지 키
    const used = [...g1k,...g2k,...g3k,...g4k];
    const rest = keys.filter(k=>!used.includes(k));
    g4k = [...g4k, ...rest];
  } else {
    // sell: 키 이름 기반 고정 배치 (BTC family와 알트코인 둘 다 대응)
    const sellG1 = ['mvrv_z','nupl','sth_sopr','alt_short_valuation'];          // 온체인 밸류에이션
    const sellG2 = ['funding','alt_short_ath','rsi','vol_change'];               // 채굴자/심리
    const sellG3 = ['cb_premium','lth_supply'];                                  // 기관 수급(선행)
    const sellG4 = ['dom','halving','btc_corr_tech'];                           // 사이클 위치
    g1k = sellG1.filter(k=>det[k]);
    g2k = sellG2.filter(k=>det[k]);
    g3k = sellG3.filter(k=>det[k]);
    g4k = sellG4.filter(k=>det[k]);
    // 매핑 안 된 나머지 키는 g4로
    const usedSell = [...g1k,...g2k,...g3k,...g4k];
    const restSell = keys.filter(k=>!usedSell.includes(k));
    g4k = [...g4k, ...restSell];
  }
  document.getElementById('g1').innerHTML=(g1k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g2').innerHTML=(g2k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g3').innerHTML=(g3k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g4').innerHTML=(g4k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');

  // 빈 섹션은 헤더까지 함께 숨김 (알트코인 SHORT처럼 카드가 없는 섹션 대응)
  [['g1',(g1k||[]).filter(k=>det[k])],['g2',(g2k||[]).filter(k=>det[k])],
   ['g3',(g3k||[]).filter(k=>det[k])],['g4',(g4k||[]).filter(k=>det[k])]].forEach(([gridId,arr])=>{
    const gridEl = document.getElementById(gridId);
    if(!gridEl) return;
    const headerEl = gridEl.previousElementSibling; // sec-hd는 grid 바로 위 형제
    const isEmpty = arr.length === 0;
    gridEl.style.display = isEmpty ? 'none' : '';
    if(headerEl && headerEl.classList.contains('sec-hd')) {
      headerEl.style.display = isEmpty ? 'none' : '';
    }
  });

  // Breakdown
  document.getElementById('bkGrid').innerHTML=keys.map(k=>{
    const d=det[k];const r=d.score/d.max;const c=col(r);
    return `<div class="bk-row"><span class="bk-n">${d.label}</span>
      <span class="bk-r" style="color:${c}">${d.score}/${d.max}
        <div class="mbar"><div class="mfill" style="width:${Math.round(r*100)}%;background:${c}"></div></div>
      </span></div>`;
  }).join('');
  document.getElementById('bkTot').textContent=`${sc.toFixed(1)} / 10`;
  document.getElementById('bkTot').style.color=scoreColor;
  // 점수합산 헤더 한글화
  const bkHd=document.querySelector('.bk-hd');
  if(bkHd) bkHd.textContent=TT({ko:`점수 합산 (${result.max}pt → 10점 환산)`,en:`Score Breakdown (${result.max}pt → 10pt)`,ja:`スコア内訳 (${result.max}pt → 10pt換算)`,es:`Desglose de puntuación (${result.max}pt → convertido a 10pt)`,de:`Score-Aufschlüsselung (${result.max}pt → auf 10pt umgerechnet)`});
  // 트리거 헤더
  const trigTitleEl=document.getElementById('trigTitle');
  if(trigTitleEl) {
    if(currentMode==='buy') trigTitleEl.textContent=TT({ko:'다음 단계 트리거',en:'Next Level Triggers',ja:'次段階トリガー',es:'Próximos Disparadores',de:'Nächste Trigger'});
    else trigTitleEl.textContent=TT({ko:'숏 신호 트리거',en:'Short Signal Triggers',ja:'ショートシグナルトリガー',es:'Disparadores de Señal de Venta',de:'Verkaufssignal-Trigger'});
  }
  // 분할계획 단계 라벨
  const stepNow=document.querySelector('.step-now');
  if(stepNow&&isKo) stepNow.textContent=stepNow.textContent.replace('NOW','지금');

  // Triggers
  renderTriggers(result, ind);

  // Split plan (buy mode only) — 점수 6.0 이상(SPLIT LONG 이상)일 때만 진입 단계 활성화
  if(currentMode==='buy') {
    const canEnter = sc >= 6.0; // SPLIT LONG 이상이어야 분할 진입 시작
    const steps=[
      {pct:25,cond:canEnter?TT({ko:`지금 진입 (${sc.toFixed(1)}점)`,en:`Now (${sc.toFixed(1)}pt)`,ja:`今すぐ (${sc.toFixed(1)}pt)`,es:`Ahora (${sc.toFixed(1)}pt)`,de:`Jetzt (${sc.toFixed(1)}pt)`}):TT({ko:`점수 6.0 이상 대기 (현재 ${sc.toFixed(1)}점)`,en:`Await 6.0+ (now ${sc.toFixed(1)}pt)`,ja:`スコア6.0以上を待機 (現在${sc.toFixed(1)}pt)`,es:`Esperando 6.0+ (actual ${sc.toFixed(1)}pt)`,de:`Warten auf 6,0+ (aktuell ${sc.toFixed(1)}pt)`}),
       price:livePrice||p, now:canEnter, waiting:!canEnter},
      {pct:30,cond:TT({ko:'Hash Ribbon 회복 전환',en:'Hash Ribbon Recovery Cross',ja:'Hash Ribbon 回復転換',es:'Cruce de Recuperación Hash Ribbon',de:'Hash-Ribbon-Erholungscross'}),price:null,range:'$50K~$58K'},
      {pct:25,cond:TT({ko:'Coinbase Premium 양전환',en:'Coinbase Premium Turns Positive',ja:'Coinbaseプレミアムがプラス転換',es:'Coinbase Premium se vuelve positivo',de:'Coinbase Premium wird positiv'}),price:null,range:'$52K~$62K'},
      {pct:20,cond:'NUPL 0% + MVRV Z ≤ 0',price:null,range:'$45K~$55K'},
    ];
    document.getElementById('splitRows').innerHTML=steps.map((s,i)=>{
      const usdt=Math.round(TOTAL_USDT*s.pct/100);
      const refPrice = s.price || p;
      const coinAmt = refPrice ? (usdt/refPrice) : 0;
      const coinAmtStr = coinAmt >= 1 ? coinAmt.toFixed(4) : coinAmt.toFixed(6);
      const stepLabel = s.now ? `${i+1} ◀ NOW` : (s.waiting ? `${i+1} ⏸` : `${i+1}`);
      const stepCls = s.now ? 'step-now' : 'step-wait';
      return `<div class="split-row">
        <div class="split-top">
          <span class="${stepCls}">${stepLabel}</span>
          <span class="split-cond">${s.cond}</span>
        </div>
        <div class="split-bot">
          <span style="color:${s.waiting?'var(--t3)':'var(--yellow)'};font-weight:700;font-size:13px">${s.pct}%</span>
          <span style="color:${s.waiting?'var(--t3)':'var(--t1)'};font-size:11px;font-weight:600">${usdt.toLocaleString()} USDT</span>
        </div>
        <div style="font-size:10px;color:var(--t3);margin-top:2px">≈ ${coinAmtStr} ${currentCoin}</div>
      </div>`;
    }).join('');
  }

  // Timestamp
  document.getElementById('tsLabel').textContent=
    `${T('updated')} ${new Date().toLocaleString(SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en',{month:'short',day:'numeric',hour:'2-digit',minute:'2-digit'})}`;

  // History
  saveHistory(sc);
  drawHistory();

  // Alerts
  checkAlerts(sc, ind);
}

// ═══════════════════════════════════════════════════════
// TRIGGERS
// ═══════════════════════════════════════════════════════
function renderTriggers(result, ind) {
  const sc=result.final;
  const ach=TT({ko:'달성',en:'Achieved',ja:'達成',es:'Logrado',de:'Erreicht'});
  const trig_ko=TT({ko:'발생',en:'Triggered!',ja:'発生!',es:'¡Activado!',de:'Ausgelöst!'});
  const pick = (t) => t[currentLang] || t.en;
  let rows=[];
  if(currentMode==='buy') {
    const triggers=[
      {en:'Hash Ribbon 30d>60d recovery',ko:'Hash Ribbon 30일MA > 60일MA 회복 전환', ja:'Hash Ribbon 30日MA > 60日MA 回復転換', es:'Hash Ribbon: recuperación MA 30d > 60d', de:'Hash Ribbon: Erholung 30T-MA > 60T-MA', done: ind.hr_status==='Recovering'},
      {en:'Coinbase Premium turns positive',ko:'Coinbase Premium 양전환', ja:'Coinbaseプレミアムがプラス転換', es:'Coinbase Premium se vuelve positivo', de:'Coinbase Premium wird positiv', done: ind.cb_premium>0},
      {en:'NUPL below 0% (Fear zone)',ko:'NUPL 0% 이하 (공포 구간)', ja:'NUPLが0%以下 (恐怖ゾーン)', es:'NUPL por debajo de 0% (zona de miedo)', de:'NUPL unter 0% (Angstzone)', done: ind.nupl<=0},
      {en:'MVRV Z Score ≤ 0',ko:'MVRV Z Score 0 이하', ja:'MVRV Zスコアが0以下', es:'MVRV Z-Score ≤ 0', de:'MVRV Z-Score ≤ 0', done: ind.mvrv_z<=0},
      {en:'Futures-Spot gap negative',ko:'선물-현물 갭 음수 전환', ja:'先物-現物ギャップがマイナスに転換', es:'Brecha futuros-spot se vuelve negativa', de:'Futures-Spot-Spread wird negativ', done: ind.funding<0},
    ];
    rows=triggers.map(t=>`
      <div class="trow ${t.done?'done':'pending'}">
        <span class="tnum">${t.done?'✓':'○'}</span>
        ${pick(t)}${t.done?` — <b>${ach}</b>`:''}
      </div>`);
  } else {
    const triggers=[
      {en:'MVRV Z Score ≥ 3.5 (euphoria)',ko:'MVRV Z ≥ 3.5 (도취 구간)', ja:'MVRV Z ≥ 3.5 (陶酔ゾーン)', es:'MVRV Z ≥ 3.5 (euforia)', de:'MVRV Z ≥ 3,5 (Euphorie)', done: ind.mvrv_z>=3.5},
      {en:'NUPL ≥ 75% (extreme greed)',ko:'NUPL ≥ 75% (극단 탐욕)', ja:'NUPL ≥ 75% (極端な強欲)', es:'NUPL ≥ 75% (codicia extrema)', de:'NUPL ≥ 75% (extreme Gier)', done: ind.nupl>=0.75},
      {en:'Fear & Greed ≥ 80',ko:'공포·탐욕 ≥ 80', ja:'恐怖・強欲指数 ≥ 80', es:'Miedo y Codicia ≥ 80', de:'Angst & Gier ≥ 80', done: (ind.fear_greed||0)>=80},
      {en:'Futures contango ≥ 0.15%',ko:'선물 프리미엄 ≥ 0.15%', ja:'先物プレミアム ≥ 0.15%', es:'Contango de futuros ≥ 0.15%', de:'Futures-Contango ≥ 0,15%', done: ind.funding>=0.15},
      {en:'Coinbase Premium ≥ 0.3%',ko:'Coinbase Premium ≥ 0.3%', ja:'Coinbaseプレミアム ≥ 0.3%', es:'Coinbase Premium ≥ 0.3%', de:'Coinbase Premium ≥ 0,3%', done: ind.cb_premium>=0.3},
    ];
    rows=triggers.map(t=>`
      <div class="trow ${t.done?'done':'pending'}">
        <span class="tnum">${t.done?'✓':'○'}</span>
        ${pick(t)}${t.done?` — <b>${trig_ko}</b>`:''}
      </div>`);
  }
  document.getElementById('trigRows').innerHTML=rows.join('');
}

// ═══════════════════════════════════════════════════════
// SCORE HISTORY
// ═══════════════════════════════════════════════════════
function saveHistory(score) {
  // long 모드 점수만 저장 (short 모드는 별도)
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h=[];
  try { h=JSON.parse(localStorage.getItem(key)||'[]'); } catch(e){}
  const now=Date.now();
  // 직전 저장값과 5분 이내로 가까우면 중복 저장 방지
  const lastSaved = h.length > 0 ? h[h.length-1].t : 0;
  const shouldSave = now - lastSaved > 4*60*1000; // 4분 이상 지났을 때만 신규 저장

  if(shouldSave) {
    h.push({t:now, s:parseFloat(score.toFixed(2))});
    h=h.slice(-2000); // 로컬은 최근 2000개만 (서버가 장기 보관 담당)
    try { localStorage.setItem(key,JSON.stringify(h)); } catch(e){}
    // 서버(Firebase)에도 비동기 저장 — 모든 사용자가 공유하는 히스토리
    saveHistoryToServer(currentCoin, modeKey, now, score);
  }
  scoreHistory=h;
  currentScore = score;
}

// Firebase에 점수 히스토리 저장 (전역 공유, 코인별/모드별)
let historyDBReady = false;
function ensureHistoryDB() {
  if(historyDBReady) return true;
  try {
    if(typeof firebase === 'undefined') return false;
    if(!firebase.apps || !firebase.apps.length) {
      firebase.initializeApp({
        apiKey: "AIzaSyAdmKYQ3w02e9gbvcRUEM7Q_jcgBKtkgDw",
        authDomain: "btctiming-chat.firebaseapp.com",
        databaseURL: "https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "btctiming-chat",
        storageBucket: "btctiming-chat.firebasestorage.app",
        messagingSenderId: "1037450881238",
        appId: "1:1037450881238:web:d21d0deff6e9aef1bf4177",
        measurementId: "G-VD01B9SL3K"
      });
    }
    if(!chatDB) chatDB = firebase.database();
    historyDBReady = true;
    return true;
  } catch(e) {
    console.error('[history] Firebase init failed:', e);
    return false;
  }
}

function saveHistoryToServer(coin, modeKey, t, score) {
  if(!ensureHistoryDB()) return;
  const path = `scoreHistory/${coin}_${modeKey}`;
  chatDB.ref(path).push({t, s: parseFloat(score.toFixed(2))}).then(() => {
    pruneOldHistory(path);
  }).catch(e => console.error('[history] save failed:', e));
}

// 서버 히스토리도 일정 개수 넘으면 오래된 것부터 삭제 (코인당 최대 2000개)
const HISTORY_MAX_POINTS = 2000;
function pruneOldHistory(path) {
  if(!chatDB) return;
  chatDB.ref(path).orderByChild('t').once('value', (snap) => {
    const data = snap.val();
    if(!data) return;
    const entries = Object.entries(data).sort((a,b) => a[1].t - b[1].t);
    if(entries.length > HISTORY_MAX_POINTS) {
      const toDelete = entries.slice(0, entries.length - HISTORY_MAX_POINTS);
      toDelete.forEach(([key]) => chatDB.ref(path + '/' + key).remove());
    }
  });
}

// 서버에서 히스토리 불러오기 (페이지 로드/코인 전환 시)
function loadHistoryFromServer(coin, modeKey, callback) {
  if(!ensureHistoryDB()) { callback(null); return; }
  const path = `scoreHistory/${coin}_${modeKey}`;
  chatDB.ref(path).orderByChild('t').limitToLast(500).once('value', (snap) => {
    const data = snap.val();
    if(!data) { callback(null); return; }
    const points = Object.values(data).sort((a,b) => a.t - b.t);
    callback(points);
  }).catch(e => {
    console.error('[history] load failed:', e);
    callback(null);
  });
}

let serverHistoryLoaded = {}; // 코인+모드별 서버 로드 여부 캐시

function drawHistory() {
  // 서버 히스토리 최초 1회 로드 (코인+모드별)
  const modeKey0 = currentMode === 'buy' ? 'long' : 'short';
  const loadKey = `${currentCoin}_${modeKey0}`;
  if(!serverHistoryLoaded[loadKey]) {
    serverHistoryLoaded[loadKey] = true; // 중복 요청 방지
    loadHistoryFromServer(currentCoin, modeKey0, (serverPoints) => {
      if(serverPoints && serverPoints.length > 0) {
        // 서버 데이터를 로컬과 병합 (서버가 더 풍부하면 우선)
        const localKey = `history_${currentCoin}_${modeKey0}`;
        let local = [];
        try { local = JSON.parse(localStorage.getItem(localKey)||'[]'); } catch(e){}
        const merged = [...serverPoints, ...local];
        // 중복 제거 (같은 시각 데이터)
        const seen = new Set();
        const dedup = merged.filter(p => {
          const k = Math.floor(p.t/60000); // 1분 단위로 묶어서 중복 체크
          if(seen.has(k)) return false;
          seen.add(k);
          return true;
        }).sort((a,b)=>a.t-b.t);
        try { localStorage.setItem(localKey, JSON.stringify(dedup.slice(-2000))); } catch(e){}
        drawHistory(); // 데이터 갱신 후 재렌더
      }
    });
  }

  let data = getHistoryData();
  // 현재 점수를 항상 최신 포인트로 표시
  if(currentScore > 0) {
    const now = Date.now();
    if(data.length === 0) {
      data = [{t: now, s: currentScore}];
    } else {
      // 마지막 포인트가 2분 이내면 업데이트, 아니면 추가
      if(now - data[data.length-1].t < 120000) {
        data = [...data.slice(0,-1), {t: now, s: currentScore}];
      } else {
        data = [...data, {t: now, s: currentScore}];
      }
    }
  }
  scoreHistory = data;

  const canvas = document.getElementById('historyCanvas');
  if(!canvas) return;
  const ctx = canvas.getContext('2d');
  const dpr = window.devicePixelRatio||1;
  const w = canvas.offsetWidth||600;
  const h = canvas.offsetHeight||120;
  canvas.width = w*dpr; canvas.height = h*dpr;
  ctx.scale(dpr,dpr);

  if(data.length < 2) {
    ctx.fillStyle='rgba(255,255,255,0.15)';
    ctx.font='11px system-ui'; ctx.textAlign='center';
    ctx.fillText('Score history will appear after multiple data points', w/2, h/2);
    return;
  }

  const scores = data.map(x=>x.s);
  const minS = Math.min(...scores, 6);
  const maxS = Math.max(...scores, 10);
  const pad = {l:28,r:10,t:10,b:20};
  const pw = w-pad.l-pad.r;
  const ph = h-pad.t-pad.b;

  // Zone backgrounds
  const zones = [
    {min:8.0,max:10,color:'rgba(34,197,94,0.07)',label:'FULL LONG'},
    {min:7.0,max:8.0,color:'rgba(74,222,128,0.05)',label:'ADD LONG'},
    {min:6.0,max:7.0,color:'rgba(134,239,172,0.04)',label:'SPLIT LONG'},
    {min:5.0,max:6.0,color:'rgba(163,230,53,0.03)',label:'WATCH'},
    {min:3.5,max:5.0,color:'rgba(251,191,36,0.03)',label:'SPLIT EXIT'},
    {min:0,max:3.5,color:'rgba(239,68,68,0.03)',label:'EXIT LONG'},
  ];
  zones.forEach(z=>{
    const y1=pad.t+ph-(z.max-minS)/(maxS-minS)*ph;
    const y2=pad.t+ph-(z.min-minS)/(maxS-minS)*ph;
    ctx.fillStyle=z.color;
    ctx.fillRect(pad.l,y1,pw,y2-y1);
  });

  // Grid lines
  ctx.lineWidth=1;
  [3.5,5.0,6.0,7.0,8.0].forEach(v=>{
    if(v<minS||v>maxS) return;
    const y=pad.t+ph-(v-minS)/(maxS-minS)*ph;
    ctx.strokeStyle=v>=8.0?'rgba(74,222,128,0.15)':v>=7.0?'rgba(190,242,100,0.1)':'rgba(255,255,255,0.04)';
    ctx.beginPath();ctx.moveTo(pad.l,y);ctx.lineTo(w-pad.r,y);ctx.stroke();
    ctx.fillStyle='rgba(255,255,255,0.25)';
    ctx.font='8px system-ui'; ctx.textAlign='right';
    ctx.fillText(v.toFixed(1),pad.l-3,y+3);
  });

  // Gradient fill
  const grad=ctx.createLinearGradient(0,pad.t,0,h-pad.b);
  grad.addColorStop(0,'rgba(74,222,128,0.25)');
  grad.addColorStop(1,'rgba(74,222,128,0)');
  ctx.beginPath();
  data.forEach((p,i)=>{
    const x=pad.l+i/(data.length-1)*pw;
    const y=pad.t+ph-(p.s-minS)/(maxS-minS)*ph;
    i===0?ctx.moveTo(x,y):ctx.lineTo(x,y);
  });
  ctx.lineTo(pad.l+pw,h-pad.b);
  ctx.lineTo(pad.l,h-pad.b);
  ctx.closePath();
  ctx.fillStyle=grad; ctx.fill();

  // Line
  ctx.beginPath(); ctx.strokeStyle='#4ade80'; ctx.lineWidth=1.5;
  data.forEach((p,i)=>{
    const x=pad.l+i/(data.length-1)*pw;
    const y=pad.t+ph-(p.s-minS)/(maxS-minS)*ph;
    i===0?ctx.moveTo(x,y):ctx.lineTo(x,y);
  });
  ctx.stroke();

  // Latest dot + value
  const last=data[data.length-1];
  const lx=pad.l+pw;
  const ly=pad.t+ph-(last.s-minS)/(maxS-minS)*ph;
  ctx.beginPath();ctx.arc(lx,ly,4,0,Math.PI*2);
  ctx.fillStyle='#4ade80';ctx.fill();
  ctx.fillStyle='rgba(255,255,255,0.8)';ctx.font='bold 9px system-ui';ctx.textAlign='right';
  ctx.fillText(last.s.toFixed(1),lx-7,ly-5);

  // Time labels (x-axis, 5 labels)
  ctx.fillStyle='rgba(255,255,255,0.2)';ctx.font='8px system-ui';ctx.textAlign='center';
  const steps=[0,0.25,0.5,0.75,1];
  steps.forEach(r=>{
    const idx=Math.min(Math.round(r*(data.length-1)),data.length-1);
    const p=data[idx];
    const x=pad.l+r*pw;
    let lbl='';
    const shortR=['1d'].includes(histPeriod);
    if(shortR) lbl=new Date(p.t).toLocaleTimeString(SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en',{hour:'2-digit',minute:'2-digit'});
    else lbl=new Date(p.t).toLocaleDateString(SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en',{month:'numeric',day:'numeric'});
    ctx.fillText(lbl,x,h-pad.b+12);
  });

  // Range info
  const sub=document.getElementById('histRangeSub');
  if(sub){
    const rangeLabel = {
      '1m':'Last 1h','5m':'Last 6h','15m':'Last 24h','30m':'Last 3d',
      '1h':'Last 7d','4h':'Last 14d','1d':'Last 30d','1w':'Last 90d','1M':'All time'
    };
    const rlKo = {
      '1m':'최근 1시간','5m':'최근 6시간','15m':'최근 24시간','30m':'최근 3일',
      '1h':'최근 7일','4h':'최근 14일','1d':'최근 30일','1w':'최근 90일','1M':'전체'
    };
    const pLabels={
      '1d': TT({ko:'최근 24시간',en:'Last 24h',ja:'直近24時間',es:'Últimas 24h',de:'Letzte 24 Std.'}),
      '7d': TT({ko:'최근 7일',en:'Last 7d',ja:'直近7日間',es:'Últimos 7d',de:'Letzte 7 Tage'}),
      '30d': TT({ko:'최근 30일',en:'Last 30d',ja:'直近30日間',es:'Últimos 30d',de:'Letzte 30 Tage'}),
      'all': TT({ko:'전체',en:'All time',ja:'全期間',es:'Todo el tiempo',de:'Gesamter Zeitraum'}),
    };
    sub.textContent=`${pLabels[histPeriod]||histPeriod} · ${data.length} ${TT({ko:'포인트',en:'points',ja:'ポイント',es:'puntos',de:'Punkte'})}`;
    // 통계 업데이트
    if(data.length > 0) {
      const scores = data.map(x=>x.s);
      const hi = Math.max(...scores);
      const lo = Math.min(...scores);
      const now = scores[scores.length-1];
      const hEl=document.getElementById('histHigh');
      const lEl=document.getElementById('histLow');
      const nEl=document.getElementById('histNow');
      if(hEl) hEl.textContent=hi.toFixed(1);
      if(lEl) lEl.textContent=lo.toFixed(1);
      if(nEl) nEl.textContent=now.toFixed(1);
    }
  }

  // 호버 툴팁이 참조할 플롯 상태 저장 (좌표 재계산 없이 최근점을 빠르게 찾기 위함)
  historyPlotState = {data, minS, maxS, pad, pw, ph, w, h};
  attachHistoryHover(); // 최초 1회만 실제로 이벤트를 붙임 (내부에서 중복 방지)
}

let historyPlotState = null;
let historyHoverAttached = false;

/** 스코어 히스토리 차트에 마우스오버 시 각 포인트의 점수/시각을 툴팁으로 표시 */
function attachHistoryHover() {
  if(historyHoverAttached) return;
  const canvas = document.getElementById('historyCanvas');
  const hoverCanvas = document.getElementById('historyHoverCanvas');
  const tooltip = document.getElementById('histTooltip');
  const tScore = document.getElementById('histTooltipScore');
  const tTime = document.getElementById('histTooltipTime');
  if(!canvas || !hoverCanvas || !tooltip) return;
  historyHoverAttached = true;

  function findNearestPoint(mouseX) {
    if(!historyPlotState) return null;
    const {data, pad, pw} = historyPlotState;
    if(!data || data.length === 0) return null;
    const ratio = Math.max(0, Math.min(1, (mouseX - pad.l) / pw));
    const idx = Math.round(ratio * (data.length - 1));
    return {idx, point: data[Math.max(0, Math.min(data.length - 1, idx))]};
  }

  function drawCrosshair(x, y) {
    const dpr = window.devicePixelRatio||1;
    const hctx = hoverCanvas.getContext('2d');
    const w = hoverCanvas.offsetWidth||600, h = hoverCanvas.offsetHeight||160;
    hoverCanvas.width = w*dpr; hoverCanvas.height = h*dpr;
    hctx.scale(dpr,dpr);
    hctx.clearRect(0,0,w,h);
    if(!historyPlotState) return;
    const {pad, ph} = historyPlotState;
    // 세로 점선 가이드
    hctx.strokeStyle='rgba(255,255,255,.2)';
    hctx.setLineDash([3,3]);
    hctx.beginPath(); hctx.moveTo(x, pad.t); hctx.lineTo(x, pad.t+ph); hctx.stroke();
    hctx.setLineDash([]);
    // 강조 점
    hctx.beginPath(); hctx.arc(x, y, 4, 0, Math.PI*2);
    hctx.fillStyle='#fff'; hctx.fill();
    hctx.beginPath(); hctx.arc(x, y, 6, 0, Math.PI*2);
    hctx.strokeStyle='#4ade80'; hctx.lineWidth=2; hctx.stroke();
  }

  function handleMove(clientX, clientY) {
    if(!historyPlotState) return;
    const rect = canvas.getBoundingClientRect();
    const mouseX = clientX - rect.left;
    const nearest = findNearestPoint(mouseX);
    if(!nearest || !nearest.point) { hideTooltip(); return; }
    const {data, minS, maxS, pad, pw, ph} = historyPlotState;
    const x = pad.l + nearest.idx/(Math.max(1,data.length-1))*pw;
    const y = pad.t + ph - (nearest.point.s - minS)/(maxS - minS)*ph;
    drawCrosshair(x, y);

    // 툴팁 텍스트: 점수 + 날짜/시각 (기간이 짧으면 시각, 길면 날짜)
    const shortR = ['1d'].includes(histPeriod);
    const dLoc = SUPPORTED_LANG_CODES.includes(currentLang) ? currentLang : 'en';
    const timeStr = shortR
      ? new Date(nearest.point.t).toLocaleTimeString(dLoc,{hour:'2-digit',minute:'2-digit'})
      : new Date(nearest.point.t).toLocaleDateString(dLoc,{year:'numeric',month:'short',day:'numeric'});
    tScore.textContent = TT({ko:`점수 ${nearest.point.s.toFixed(2)}`,en:`Score ${nearest.point.s.toFixed(2)}`,ja:`スコア ${nearest.point.s.toFixed(2)}`,es:`Puntuación ${nearest.point.s.toFixed(2)}`,de:`Score ${nearest.point.s.toFixed(2)}`});
    tTime.textContent = timeStr;

    // 툴팁 위치 (캔버스 좌상단 기준 오프셋)
    tooltip.style.left = x + 'px';
    tooltip.style.top = Math.max(20, y - 12) + 'px';
    tooltip.style.display = 'block';
  }

  function hideTooltip() {
    tooltip.style.display = 'none';
    const hctx = hoverCanvas.getContext('2d');
    hctx.clearRect(0,0,hoverCanvas.width,hoverCanvas.height);
  }

  hoverCanvas.style.pointerEvents = 'auto'; // 이벤트 수신을 위해 이 캔버스가 마우스 이벤트를 받도록
  hoverCanvas.addEventListener('mousemove', (e) => handleMove(e.clientX, e.clientY));
  hoverCanvas.addEventListener('mouseleave', hideTooltip);
  hoverCanvas.addEventListener('touchmove', (e) => {
    if(e.touches && e.touches[0]) { handleMove(e.touches[0].clientX, e.touches[0].clientY); e.preventDefault(); }
  }, {passive:false});
  hoverCanvas.addEventListener('touchend', hideTooltip);
}

// ═══════════════════════════════════════════════════════
// NOTIFICATIONS
// ═══════════════════════════════════════════════════════
function openModal(){document.getElementById('notifModal').classList.add('open')}
function closeModal(){document.getElementById('notifModal').classList.remove('open')}
function toggleAlert(el){
  el.classList.toggle('on');
  saveAlertSettings();
}

// 알림 토글 상태를 브라우저에 저장/복원 (새로고침해도 설정 유지)
const ALERT_IDS = ['a2','a3','a4','b1','b2','b3'];
function saveAlertSettings(){
  const state = {};
  ALERT_IDS.forEach(id=>{
    const el=document.getElementById(id);
    if(el) state[id]=el.classList.contains('on');
  });
  try { localStorage.setItem('alertSettings', JSON.stringify(state)); } catch(e){}
}
function loadAlertSettings(){
  try {
    const raw = localStorage.getItem('alertSettings');
    if(!raw) return; // 저장된 값이 없으면 HTML에 박혀있는 기본값(on/off) 그대로 사용
    const state = JSON.parse(raw);
    ALERT_IDS.forEach(id=>{
      if(!(id in state)) return;
      const el=document.getElementById(id);
      if(el) el.classList.toggle('on', !!state[id]);
    });
  } catch(e){}
}
async function requestNotif() {
  const statusEl = document.getElementById('notifStatus');
  if(!('Notification' in window)) {
    if(statusEl) { statusEl.textContent = TT({ko:'이 브라우저는 알림을 지원하지 않습니다.',en:'This browser does not support notifications.',ja:'このブラウザは通知に対応していません。',es:'Este navegador no admite notificaciones.',de:'Dieser Browser unterstützt keine Benachrichtigungen.'}); statusEl.style.color='var(--red)'; }
    return;
  }
  try {
    const p = await Notification.requestPermission();
    notifGranted = (p === 'granted');
    if(statusEl) {
      if(notifGranted) { statusEl.textContent = TT({ko:'✓ 알림이 활성화되었습니다',en:'✓ Notifications enabled',ja:'✓ 通知が有効になりました',es:'✓ Notificaciones activadas',de:'✓ Benachrichtigungen aktiviert'}); statusEl.style.color='var(--green)'; }
      else { statusEl.textContent = TT({ko:'알림 권한이 거부되었습니다.',en:'Notification permission denied.',ja:'通知の許可が拒否されました。',es:'Permiso de notificación denegado.',de:'Benachrichtigungsberechtigung verweigert.'}); statusEl.style.color='var(--red)'; }
    }
  } catch(e) {
    console.error('[notif] permission request failed:', e);
    if(statusEl) { statusEl.textContent = TT({ko:'알림 설정 중 오류 발생',en:'Error setting up notifications',ja:'通知設定中にエラーが発生しました',es:'Error al configurar notificaciones',de:'Fehler bei der Benachrichtigungseinrichtung'}); statusEl.style.color='var(--red)'; }
  }
}

// 점수 기반 LONG/SHORT 트리거만 체크 (가격 알림 제거됨)
// 코인/모드별로 직전 점수를 따로 추적 — 안 그러면 코인을 바꿨을 때
// "이전 코인의 점수 → 새 코인의 점수"를 마치 같은 코인의 시간 흐름인 것처럼
// 잘못 비교해서, 정작 새 코인이 이미 알림 구간에 들어와 있어도 못 잡거나
// 반대로 엉뚱하게 잘못 울리는 문제가 있었음.
let lastScoreByKey = {};

function checkAlerts(score, ind) {
  const key = `${currentCoin}_${currentMode}`;
  const isFirstView = !(key in lastScoreByKey); // 이 세션에서 이 코인/모드를 처음 보는 경우
  // 처음 보는 코인이면 "이전 점수"가 없으므로 -Infinity로 간주.
  // 이렇게 하면 코인을 막 전환했을 때 그 코인이 이미 알림 구간에 들어와 있으면
  // (이전엔 비교 대상이 없어서 조용히 넘어갔던 것과 달리) 바로 알림이 울림.
  const prev = isFirstView ? -Infinity : lastScoreByKey[key];
  lastScoreByKey[key] = score;

  const on=id=>document.getElementById(id)?.classList.contains('on');
  const rules = currentMode === 'buy' ? [
    {id:'a2', th:6.0, color:'var(--green2)', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 분할 매수 시작`,en:`${currentCoin} Long score ${score.toFixed(1)} — Split Long`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — 分割買い開始`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — Inicio de entrada escalonada`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Gestaffelter Einstieg startet`})},
    {id:'a3', th:7.0, color:'var(--green)', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 비중 확대`,en:`${currentCoin} Long score ${score.toFixed(1)} — Add Long`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — 比率拡大`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — Ampliar posición`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Position erhöhen`})},
    {id:'a4', th:8.0, color:'#22c55e', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 풀 롱!`,en:`${currentCoin} Long score ${score.toFixed(1)} — Full Long!`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — フルロング!`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — ¡Largo total!`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Voller Long!`})},
  ] : [
    {id:'b1', th:6.0, color:'var(--orange)', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 숏 준비`,en:`${currentCoin} Short score ${score.toFixed(1)} — Prepare Short`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — ショート準備`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — Preparar corto`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Short vorbereiten`})},
    {id:'b2', th:7.0, color:'var(--red)', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 숏 추가`,en:`${currentCoin} Short score ${score.toFixed(1)} — Add Short`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — ショート追加`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — Añadir corto`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Short erhöhen`})},
    {id:'b3', th:8.0, color:'#dc2626', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 풀 숏!`,en:`${currentCoin} Short score ${score.toFixed(1)} — Full Short!`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — フルショート!`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — ¡Corto total!`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Voller Short!`})},
  ];

  if(isFirstView) {
    // 코인을 막 바꿨을 때: 이미 넘어선 임계값이 여러 개라도 토스트는 "가장 높은 것" 딱 하나만 —
    // 예전엔 6.0/7.0 임계값을 동시에 넘긴 상태면 두 토스트가 겹쳐 뜨면서 "알림이 두 번 뜨는" 것처럼 보였음.
    const passed = rules.filter(r => on(r.id) && score >= r.th);
    if(passed.length > 0) {
      const top = passed.reduce((a,b) => a.th > b.th ? a : b);
      flashAlert(top.msg, top.color);
    }
  } else {
    // 평소(같은 코인 유지 중): 새로 진입한 임계값마다 각각 알림 — 정상적으로 여러 단계를 순서대로 넘을 수 있음
    rules.forEach(r => { if(on(r.id) && prev < r.th && score >= r.th) flashAlert(r.msg, r.color); });
  }
}

// ═══════════════════════════════════════════════════════
// MAIN LOAD
// ═══════════════════════════════════════════════════════
async function loadAll() {
  const myToken = loadToken;
  const btn=document.getElementById('refreshBtn');
  btn.style.opacity='.4';btn.style.pointerEvents='none';
  document.getElementById('err').style.display='none';

  // 캐시가 있으면 오버레이를 즉시 숨김 — 재방문 시 빈 화면 없이 바로 표시
  try {
    const hasCached = localStorage.getItem(`btct_cache_${currentCoin}_buy`);
    if(hasCached) {
      const ov=document.getElementById('overlay'); if(ov) ov.style.display='none';
    }
  } catch(e){}

  try {
    const loadingCoin = currentCoin; // 로드 시작 시점의 코인
    document.getElementById('ovTxt').textContent=`Fetching ${currentCoin} data...`;

    // 서버(PHP)에서 LONG/SHORT 점수를 동시에 받아옴 — 계산 로직은 서버에서만 실행됨
    const [buyData, sellData] = await Promise.all([
      fetchScoreFromAPI(currentCoin, 'buy'),
      fetchScoreFromAPI(currentCoin, 'sell'),
    ]);

    // 티커바 도미넌스/마켓캡/볼륨 — api.php 응답에서 직접 채움 (CoinGecko 별도 호출 불필요)
    updateTickerFromAPI(buyData);

    // 토큰 불일치 = 다른 코인으로 전환됨 → 결과 무시
    if(myToken !== loadToken || loadingCoin !== currentCoin) {
      console.log('Coin switched, ignoring stale data');
      return;
    }

    const p = livePrice || buyData.price || 60000;

    // ind: 화면 표시용 메타데이터 + 서버가 계산한 결과(_buyResult, _sellResult) 포함
    const raw = buyData.raw || {};
    const ind = {
      coin: currentCoin,
      price: p,
      ma200w: buyData.ma200w || 62000,
      fear_greed: buyData.fear_greed ?? 13,
      fg_label: buyData.fg_label || 'Extreme Fear',
      ath_drop: buyData.ath_drop,
      realized_price: buyData.realized_price,
      // 트리거 체크리스트 패널용 raw 값 (서버에서 전달받음, 계산식은 노출 안 됨)
      mvrv_z: raw.mvrv_z,
      nupl: raw.nupl,
      funding: raw.funding,
      cb_premium: raw.cb_premium,
      hr_status: raw.hr_status,
      _buyResult: buyData.result,
      _sellResult: sellData.result,
    };

    renderAll(ind);

  } catch(e) {
    document.getElementById('err').textContent=`⚠ Error: ${e.message}`;
    document.getElementById('err').style.display='block';
  } finally {
    btn.style.opacity='';btn.style.pointerEvents='';
    // 오버레이는 첫 로딩 후 완전히 제거
    const ov = document.getElementById('overlay');
    if(ov) ov.style.display='none';
  }
}

// ═══════════════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════════════
// ═══════════════════════════════════════════════════════
// i18n
// ═══════════════════════════════════════════════════════
const LANGS = {
  en: {
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Privacy Policy', footerTerms:'Terms of Service', footerDisclaimer:'Not financial advice',
    whyBtnLabel:'Why?', whyTopTitle:'Top contributors', whyBottomTitle:'Holding it back', histToday:'Today', histYesterday:'Yesterday', histWeekAgo:'Last Week',
    buyTiming:'📈 LONG Timing', sellTiming:'📉 SHORT Timing',
    livePriceLabel:'Price · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Realized Price Gap', maLabel:'200W MA (ref)',
    splitPlan:'Split Entry Plan', splitTitle:'Allocation by Stage',
    splitStep1:(s)=>`Now (Score ${s})`, splitStep2:'Hash Ribbon Recovery',
    splitStep3:'Coinbase Premium → Positive', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Updated',
    // Mode labels
    modeTitle_buy:'LONG TIMING SCORE', modeTitle_sell:'SELL PRESSURE GAUGE',
    modeSub_buy:'Cycle bottom long entry model', modeSub_sell:'Short entry timing model',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ How to read Sell Score',
    sellExplain_low:'🟢 LOW (0~3): Market is in bottom zone. No exit signal. Hold or accumulate.',
    sellExplain_mid:'🟡 MID (4~6): Market heating up. Monitor for partial reduction.',
    sellExplain_high:'🔴 HIGH (7~10): Strong sell signal. Exit long / Consider short entry.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Realized Price Gap',
    ind_alt_valuation:'Price vs Est. Realized', ind_alt_drawdown:'ATH Drawdown',
    ind_alt_short_val:'Price vs Est. Realized (Short)', ind_alt_short_ath:'ATH Proximity — Overheat',
    ind_rsi:'RSI (14d)', ind_vol_change:'Volume Acceleration (15m vs 1h/4h)', ind_btc_corr_tech:'BTC Correlation (30d)',
    ind_buy_pressure:'Live Buy-Led Volume — FOMO', ind_sell_pressure:'Live Sell-Led Volume — Capitulation',
    desc_buy_pressure:`Share of the most recent 15-minute candles' volume driven by aggressive buying. A high ratio (65%+) combined with a volume spike and a green candle can signal FOMO-driven overheating near a local top. Uses 15-minute data instead of daily, so it reflects conditions almost in real time (15min–1hr lag vs. up to 24hr for daily volume).`,
    desc_sell_pressure:`Share of the most recent 15-minute candles' volume driven by aggressive selling. A high ratio (58%+) combined with a volume spike and a red candle can signal capitulation selling that often precedes a reversal near a local bottom. Uses 15-minute data instead of daily, so it reflects conditions almost in real time.`,
    desc_rsi:`Relative Strength Index over 14 days, a momentum oscillator measuring the speed and magnitude of recent price changes. RSI below 30 indicates oversold conditions (often a bottom signal), while RSI above 70 indicates overbought conditions (often a top signal). Applies equally to all coins since it's purely price-based.`,
    desc_vol_change:`Compares the most recent 15-minute candle's volume to the 1-hour and 4-hour averages. A large spike combined with a price near a low can signal capitulation selling that often precedes a reversal. A spike near a high can signal distribution by large holders. Using 15-minute data instead of daily reflects conditions almost in real time.`,
    desc_btc_corr_tech:`Pearson correlation coefficient between this coin's daily returns and Bitcoin's over the past 30 days. A low correlation (below 0.5) suggests the coin is moving independently of BTC, which can indicate coin-specific strength or weakness rather than broad market movement.`,
    desc_alt_short_val:`Estimated overvaluation indicator for altcoins in SHORT mode. Measures how far the current price sits above the estimated realized price — the higher above, the more overheated and SHORT-favorable. ⚠️ Realized price is an estimate, not live on-chain data.`,
    desc_alt_short_ath:`Distance from all-time high (ATH), used as an overheat signal for altcoin SHORT timing. Being close to ATH (within -15%) historically coincides with local tops and increased SHORT favorability.`,
    ind_btc_corr:'BTC Dominance — Alt Cycle', desc_btc_corr:`Tracks Bitcoin's market cap dominance as a proxy for the broader altcoin cycle position. When BTC dominance is high (55%+), capital is concentrated in Bitcoin and altcoins tend to underperform — often a sign the alt cycle hasn't started yet. When dominance falls (below 50%), capital rotates into altcoins, historically associated with "alt season."`,
    desc_alt_valuation:`Estimated valuation indicator for altcoins. Unlike BTC/ETH/BNB, this coin does not have reliable on-chain MVRV Z-Score data available, so we use price vs. an estimated realized price as a proxy.

⚠️ Important: the realized price for this coin is a rough estimate, not live on-chain data. Use this as a directional signal only, not a precise valuation.

Below estimated realized price = potential undervaluation zone.`,
    desc_alt_drawdown:`Distance from all-time high (ATH), used as a substitute for NUPL on altcoins without reliable on-chain profit/loss data.

Deep drawdowns (70%+) from ATH have historically coincided with cycle bottoms for major altcoins, though this varies significantly by coin.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Futures-Spot Gap',
    ind_cbp:'Coinbase Premium', ind_lth:'LTH Supply %', ind_dom:'BTC Dominance',
    ind_halving:'Halving Cycle',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Greed Level',
    ind_sell_funding:'Futures Premium', ind_sell_fg:'LTH-STH SOPR Spread',
    desc_sell_fg:`LTH-STH SOPR Spread measures the gap between long-term and short-term holder profit-taking behavior.
A large positive spread means short-term holders are realizing profits much faster than long-term holders — an early sign of distribution.

SHORT zone: spread ≥ 0.15 (STH selling aggressively while LTH holds)
Safe zone: spread ≤ 0.02 (aligned behavior, no distribution signal)

Current: STH realizing significant profit relative to LTH → distribution may be starting.`,
    ind_sell_sopr:'STH-SOPR — Profit Taking', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ON-CHAIN VALUATION', sec_miner:'MINER / SENTIMENT',
    sec_inst:'INSTITUTIONAL FLOW', sec_cycle:'CYCLE POSITION',
    sec_breakdown:'Score Breakdown', sec_triggers:'Next Level Triggers',
    sec_sellTriggers:'Sell Signal Triggers', sec_macro:'MACRO WARNINGS',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'ALL →', loadingInsights:'Loading...', loadMoreInsights:'Load More', collapseInsights:'Collapse',
    sec_history:'Score History', sec_histSub:'Saved locally in browser',
    histH:'Hour', histD:'Day', histM:'Month',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score measures how overvalued or undervalued Bitcoin is relative to its realized value. \n• < 0: Historically undervalued (bottom zone) → Strong buy\n• 0~1: Slightly undervalued → Accumulation zone  \n• 1~3: Fair value → Neutral\n• > 3: Overvalued (top zone) → Consider selling\nCurrent phase: 0.27 — Near bottom. Historically, values under 0.5 have preceded major bull runs.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) shows the overall profit/loss state of all BTC holders.\n• < 0% (Capitulation): Holders in loss → Extreme buy signal\n• 0~25% (Hope/Fear): Recovering from bottom → Buy zone  \n• 25~50% (Optimism): Mid-cycle → Neutral\n• 50~75% (Belief/Greed): Late cycle → Watch\n• > 75% (Euphoria): Peak greed → Sell signal",
    desc_realized:"Shows how far the current price is from the average cost basis of all BTC holders (Realized Price).\n• Below 0%: Price below average cost → Panic zone, strongest buy\n• 0~5%: Near realized price → Ideal entry\n• 5~20%: Moderate premium → Acceptable\n• > 20%: High premium → Caution",
    desc_hash:"Hash Ribbon tracks Bitcoin mining hashrate momentum (30-day vs 60-day moving average).\n• Capitulation: Weak miners shutting down (30MA < 60MA) → Bottom forming\n• Recovery Cross: 30MA crosses above 60MA → Most reliable leading buy signal (2~4 weeks ahead)\nHistorical accuracy: Perfectly timed 2016, 2018, 2020, 2022 bottoms.",
    desc_sopr:"Short-Term Holder SOPR measures if recent buyers are selling at profit or loss.\n• < 0.95: Panic selling at heavy losses → Capitulation = buy signal\n• 0.95~1.0: Mild loss realization → Near bottom\n• 1.0~1.03: Neutral profit taking\n• > 1.05: Strong profit taking → Distribution = top signal",
    desc_funding:"Futures-Spot Gap = (Futures Mark Price - Spot Index Price) / Spot Price\nShows real-time leverage positioning without the 8-hour settlement delay.\n• Negative (backwardation): Futures cheaper than spot → Short overload → Leading buy signal\n• ±0.01%: Neutral (normal range for BTC)\n• > 0.05%: Contango → Long overload → Caution\n• > 0.15%: Extreme contango → Top signal",
    desc_cbp:"Coinbase Premium = (Coinbase BTC Price - Binance BTC Price) / Binance Price\nReflects US institutional demand in real-time. Leads ETF flow data by 2~3 days.\n• Positive: US institutions buying → Bullish\n• Near zero: Watching/neutral\n• Negative: Institutions on sideline → Bearish for short-term\nCurrent: Negative (46+ consecutive days) → Institutions waiting for macro clarity.",
    desc_lth:"Long-Term Holder Supply % = percentage of BTC supply held by addresses inactive 155+ days.\n• > 75%: Whales in aggressive accumulation → Strong buy signal\n• 70~75%: Normal accumulation\n• < 70%: Distribution (whales selling)\nRecord levels (79%) mean the smart money is not selling — supply shock incoming when demand returns.",
    desc_dom:"BTC Dominance = BTC market cap / Total crypto market cap\nRises when capital flows from altcoins to Bitcoin — typical pattern before major bull runs.\n• 55~63% (CoinGecko basis): BTC season → Capital consolidating into BTC → Buy zone\n• < 50%: Alt season → Risk on\n• > 65%: Extreme BTC dominance → May signal alt rotation incoming",
    desc_halving:"Bitcoin halvings cut mining rewards by 50% every ~4 years, creating supply shocks.\nHistorical bottom timing:\n• 2015 bottom: 18 months before 2016 halving\n• 2018 bottom: 17 months before 2020 halving  \n• 2022 bottom: 17 months before 2024 halving\n• Current: ~22 months before April 2028 halving → In the core bottom window.",
    // Alert labels
    alertTitle:'Alert Settings',
    alertDesc:'Get notified via browser push notification + visual flash + sound when conditions are met.',
    alertBuySection:'📈 LONG TRIGGERS', alertSellSection:'📉 SHORT TRIGGERS',
    a2:'Long Score ≥ 6.0 (Start splitting)',
    a3:'Long Score ≥ 7.0 (Increase position)', a4:'Long Score ≥ 8.0 (Aggressive buy)',
    a5:'MVRV Z ≤ 0 — Full bottom zone', a6:'NUPL below 0% — Capitulation',
    a7:'Futures gap turns negative (backwardation)', a8:'Hash Ribbon recovery cross',
    a9:'Coinbase Premium turns positive',
    b1:'Short Score ≥ 6.0 (Prepare short)', b2:'Short Score ≥ 7.0 (Increase short)',
    b3:'Short Score ≥ 8.0 (Full short)', b4:'MVRV Z ≥ 3.5 — Euphoria zone',
    b5:'NUPL ≥ 75% — Extreme greed', b6:'Fear & Greed ≥ 80',
    b7:'Futures contango ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alert when price drops below $', priceAbove:'Alert when price rises above $',
    enableNotif:'Enable Browser Notifications',
    ind_sell_lth:'LTH Supply — Distribution', ind_sell_dom:'BTC Dom — Risk',
    ind_sell_halving:'Halving — Cycle Phase', ind_sell_ath:'ATH Proximity — Top Risk',
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Greed',
    ind_sell_funding:'Futures Premium', ind_sell_fg:'LTH-STH SOPR Spread',
    desc_sell_fg:`LTH-STH SOPR Spread measures the gap between long-term and short-term holder profit-taking behavior.
A large positive spread means short-term holders are realizing profits much faster than long-term holders — an early sign of distribution.

SHORT zone: spread ≥ 0.15 (STH selling aggressively while LTH holds)
Safe zone: spread ≤ 0.02 (aligned behavior, no distribution signal)

Current: STH realizing significant profit relative to LTH → distribution may be starting.`,
    ind_sell_sopr:'STH-SOPR — Profit Taking', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  ja: {
    // NAV
    navInsights:'ブログ',
    footerPrivacy:'プライバシーポリシー', footerTerms:'利用規約', footerDisclaimer:'投資助言ではありません',
    whyBtnLabel:'理由?', whyTopTitle:'寄与度が高い指標', whyBottomTitle:'足を引っ張る指標', histToday:'今日', histYesterday:'昨日', histWeekAgo:'先週',
    buyTiming:'📈 ロング タイミング', sellTiming:'📉 ショート タイミング',
    livePriceLabel:'現在価格 · Binance', fgLabel:'恐怖・強欲指数',
    rpLabel:'実現価格乖離率', maLabel:'200週移動平均線 (参考)',
    splitPlan:'分割エントリー計画', splitTitle:'段階別配分',
    splitStep1:(s)=>`今すぐ (スコア${s})`, splitStep2:'Hash Ribbon 回復転換',
    splitStep3:'Coinbase プレミアム → プラス転換', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'更新日時',
    // Mode labels
    modeTitle_buy:'ロング エントリースコア', modeTitle_sell:'売り圧力ゲージ',
    modeSub_buy:'サイクル底値ロングエントリーモデル', modeSub_sell:'ショートエントリータイミングモデル',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ 売りスコアの見方',
    sellExplain_low:'🟢 低 (0~3): 市場は底値圏。決済/ショートシグナルなし。保有または買い増し。',
    sellExplain_mid:'🟡 中 (4~6): 市場が過熱し始めています。一部利確を検討。',
    sellExplain_high:'🔴 高 (7~10): 強い売りシグナル。ロング決済 / ショートエントリー検討。',
    longExitLabel:'ロング決済', shortEntryLabel:'ショートエントリーシグナル',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Zスコア', ind_nupl:'NUPL', ind_realized:'実現価格乖離率',
    ind_alt_valuation:'価格 vs 推定実現価格', ind_alt_drawdown:'ATH比下落率',
    ind_alt_short_val:'価格 vs 推定実現価格 (ショート)', ind_alt_short_ath:'ATH近接度 — 過熱',
    ind_rsi:'RSI (14日)', ind_vol_change:'出来高変化率 (15分足 vs 1h/4h)', ind_btc_corr_tech:'BTC相関係数 (30日)',
    ind_buy_pressure:'リアルタイム買い主導出来高 — FOMO/過熱', ind_sell_pressure:'リアルタイム売り主導出来高 — Capitulation',
    desc_buy_pressure:`直近の15分足の出来高のうち、買い注文が主導した割合です。65%以上 + 出来高急増 + 陽線が重なると、局所的な高値圏でのFOMO過熱買いを示唆する場合があります。日足の代わりに15分足を使用するため、ほぼリアルタイム(15分〜1時間の遅延、日足は最大24時間)で反映されます。`,
    desc_sell_pressure:`直近の15分足の出来高のうち、売り注文が主導した割合です。58%以上 + 出来高急増 + 陰線が重なると、局所的な安値圏でのキャピチュレーション(投げ売り)後の反発が続くことが多いです。日足の代わりに15分足を使用するため、ほぼリアルタイムで反映されます。`,
    desc_rsi:`14日間の相対力指数(RSI)で、直近の価格変動の速度と強さを測るモメンタム指標です。RSI 30以下は売られすぎ(通常は底値シグナル)、70以上は買われすぎ(通常は天井シグナル)を意味します。純粋に価格ベースのため、全てのコインに同様に適用できます。`,
    desc_vol_change:`直近の15分足の出来高を1時間・4時間平均と比較します。安値圏で出来高が急増すると投げ売り後の反発が続くことが多く、高値圏での急増は大口保有者による分配(売却)を示唆する場合があります。日足の代わりに15分足を使用し、ほぼリアルタイムで反映されます。`,
    desc_btc_corr_tech:`過去30日間のこのコインの日次リターンとビットコインのリターンとの間のピアソン相関係数です。相関係数が低いほど(0.5以下)、このコインがBTCと独立して動いていることを意味し、コイン固有の強さ・弱さを示唆する場合があります。`,
    desc_alt_short_val:`ショートモード用のアルトコイン割高推定指標です。現在価格が推定実現価格をどれだけ上回っているかを測定し、乖離が大きいほど過熱しておりショートに有利です。⚠️ 実現価格はリアルタイムのオンチェーンデータではなく推定値です。`,
    desc_alt_short_ath:`史上最高値(ATH)からの距離で、アルトコインのショートタイミングにおける過熱シグナルとして使用します。ATHに近いほど(−15%以内)歴史的に局所的な天井と重なり、ショートに有利です。`,
    ind_btc_corr:'BTCドミナンス — アルトサイクル', desc_btc_corr:`ビットコインの時価総額ドミナンスを、アルトコインサイクルの位置を示す代理指標として活用します。BTCドミナンスが高いとき(55%以上)は資金がビットコインに集中し、アルトコインが軟調な傾向があり、通常はアルトサイクルがまだ始まっていないシグナルです。ドミナンスが下落すると(50%以下)資金がアルトコインに移動し、歴史的に「アルトシーズン」と関連付けられます。`,
    desc_alt_valuation:`アルトコイン向けの推定バリュエーション指標です。BTC/ETH/BNBと異なり、このコインには信頼できるオンチェーンMVRV Zスコアデータがないため、現在価格と推定実現価格の比較を代替指標として使用します。

⚠️ 重要: このコインの実現価格はリアルタイムのオンチェーンデータではなく、大まかな推定値です。精密なバリュエーションではなく方向性の参考としてのみ活用してください。

推定実現価格以下 = 割安の可能性がある水準。`,
    desc_alt_drawdown:`オンチェーンの損益データが不足しているアルトコインでNUPLの代替指標として使用する、ATH(史上最高値)からの下落率です。

主要アルトコインは歴史的にATH比70%以上の下落でサイクル底値と重なることが多いですが、コインごとの差が大きい場合があります。`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'先物-現物ギャップ',
    ind_cbp:'Coinbaseプレミアム', ind_lth:'LTH供給比率', ind_dom:'BTCドミナンス',
    ind_halving:'半減期サイクル',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — 過熱ゲージ', ind_sell_nupl:'NUPL — 強欲レベル',
    ind_sell_funding:'先物プレミアム', ind_sell_fg:'LTH-STH SOPR格差',
    desc_sell_fg:`LTH-STH SOPR格差は、長期保有者と短期保有者の利益確定行動の違いを測定します。
格差が大きくプラスの場合、短期保有者が長期保有者よりもはるかに速いペースで利益確定中 = 分配(売却)の初期シグナル。

ショート圏: 格差 ≥ 0.15 (短期は積極的に売却、長期は保有継続)
安全圏: 格差 ≤ 0.02 (行動が一致、分配シグナルなし)

現在: 短期保有者が長期保有者に比べ大きな利益を実現中 → 分配が始まる可能性。`,
    ind_sell_sopr:'STH-SOPR — 利益確定', ind_sell_cbp:'Coinbaseプレミアム — FOMO',
    // Section headers
    sec_onchain:'オンチェーン バリュエーション', sec_miner:'マイナー / センチメント',
    sec_inst:'機関資金フロー (先行)', sec_cycle:'サイクル位置',
    sec_breakdown:'スコア内訳', sec_triggers:'次段階トリガー',
    sec_sellTriggers:'売りシグナルトリガー', sec_macro:'マクロ警告',
    sec_insights:'ブログ', sec_insights2:'ブログ', viewAllInsights:'全て見る →', loadingInsights:'読み込み中...', loadMoreInsights:'もっと見る', collapseInsights:'閉じる',
    sec_history:'スコア履歴', sec_histSub:'ブラウザにローカル保存',
    histH:'時間別', histD:'日別', histM:'月別',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Zスコアは、ビットコインが実現価値に対してどれだけ割高・割安かを測定します。\n• 0以下: 歴史的に割安(底値圏) → 強力な買いシグナル\n• 0~1: やや割安 → 蓄積ゾーン\n• 1~3: 適正価値 → 中立\n• 3以上: 割高(天井圏) → 売却検討\n現在 0.27 — 底値に近い水準。歴史的に0.5以下から大型上昇が始まっています。",
    desc_nupl:"NUPL(未実現純損益)は、全BTC保有者の平均損益状況を示します。\n• 0%以下(キャピチュレーション): 保有者が損失中 → 極端な買いシグナル\n• 0~25%(希望・恐怖): 底値から回復中 → 買いゾーン\n• 25~50%(楽観): サイクル中盤 → 中立\n• 50~75%(強欲): サイクル後半 → 注視\n• 75%以上(陶酔): 極端な強欲 → 売りシグナル",
    desc_realized:"現在価格が全BTC保有者の平均取得原価(実現価格)からどれだけ乖離しているかを示します。\n• 0%以下: 平均原価以下 → パニックゾーン、最強の買い\n• 0~5%: 実現価格付近 → 理想的なエントリー\n• 5~20%: 適度なプレミアム → 許容範囲\n• 20%以上: 高いプレミアム → 注意",
    desc_hash:"Hash Ribbonはビットコインのマイニングハッシュレートのモメンタム(30日 vs 60日移動平均)を追跡します。\n• キャピチュレーション: 弱小マイナーが停止中 → 底値形成中\n• 回復転換: 30日MAが60日MAを上抜け → 最も信頼性の高い先行買いシグナル(2~4週間先行)\n過去の的中率: 2016・2018・2020・2022年の底値を正確に捉えています。",
    desc_sopr:"短期保有者SOPR — 直近の買い手が利益確定・損切りのどちらで売っているかを測定します。\n• 0.95以下: パニック損切り → キャピチュレーション = 買いシグナル\n• 0.95~1.0: 小幅な損失確定 → 底値付近\n• 1.0~1.03: 小幅な利益確定 → 中立\n• 1.05以上: 強い利益確定 → 分配 = 天井シグナル",
    desc_funding:"先物-現物ギャップ = (先物マーク価格 - 現物インデックス価格) / 現物価格\n8時間の精算遅延なしに、リアルタイムでレバレッジの偏りを捉えます。\n• マイナス(逆プレミアム): 先物が現物より安い → ショート過多 → 先行買いシグナル\n• ±0.01%: 中立(BTCの正常範囲)\n• 0.05%以上: コンタンゴ → ロング過多 → 注意\n• 0.15%以上: 極端なコンタンゴ → 天井シグナル",
    desc_cbp:"Coinbaseプレミアム = (Coinbase価格 - Binance価格) / Binance価格\n米国機関の需要をリアルタイムで反映。ETF資金フローデータより2~3日先行します。\n• プラス: 米国機関が買い中 → 強気\n• ゼロ付近: 様子見/中立\n• マイナス: 機関が様子見 → 短期的に弱気\n現在: マイナス(46日以上連続) → 米国機関がマクロの明確化を待っている状態。",
    desc_lth:"長期保有者供給比率 = 155日以上未移動のアドレスが保有するBTCの割合\n• 75%以上: クジラが積極的に蓄積中 → 強力な買いシグナル\n• 70~75%: 通常の蓄積\n• 70%以下: 分配(クジラが売却中)\n現在79%(過去最高) — スマートマネーは売っていません。需要回復時に供給ショックが予想されます。",
    desc_dom:"BTCドミナンス = BTC時価総額 / 暗号資産全体の時価総額\nアルトコインからビットコインへ資金が移動すると上昇 — 大型上昇相場前の典型的なパターンです。\n• 55~63%(CoinGecko基準): BTCシーズン → 資本がBTCに集中 → 買いゾーン\n• 50%以下: アルトシーズン → リスクオン\n• 65%以上: 極端なBTC支配 → アルトへのローテーションが近い可能性",
    desc_halving:"ビットコインの半減期は約4年ごとにマイニング報酬を50%削減し、供給ショックを生み出します。\n過去の底値タイミング:\n• 2015年の底値: 2016年半減期の18ヶ月前\n• 2018年の底値: 2020年半減期の17ヶ月前\n• 2022年の底値: 2024年半減期の17ヶ月前\n• 現在: 2028年4月の半減期まで約22ヶ月 → コア底値ゾーン内。",
    // Alert labels
    alertTitle:'アラート設定',
    alertDesc:'条件達成時にブラウザプッシュ通知 + 画面フラッシュ + サウンドでお知らせします。',
    alertBuySection:'📈 ロング トリガー', alertSellSection:'📉 ショート トリガー',
    a2:'ロングスコア ≥ 6.0 (分割開始)',
    a3:'ロングスコア ≥ 7.0 (ポジション拡大)', a4:'ロングスコア ≥ 8.0 (積極買い)',
    a5:'MVRV Z ≤ 0 — 完全な底値圏', a6:'NUPL 0%以下 — キャピチュレーション',
    a7:'先物ギャップがマイナスに転換(逆プレミアム)', a8:'Hash Ribbon 回復転換',
    a9:'Coinbaseプレミアムがプラスに転換',
    b1:'ショートスコア ≥ 6.0 (ショート準備)', b2:'ショートスコア ≥ 7.0 (ショート拡大)',
    b3:'ショートスコア ≥ 8.0 (フルショート)', b4:'MVRV Z ≥ 3.5 — 陶酔ゾーン',
    b5:'NUPL ≥ 75% — 極端な強欲', b6:'恐怖・強欲指数 ≥ 80',
    b7:'先物コンタンゴ ≥ 0.15%', b8:'Coinbaseプレミアム ≥ 0.3% — FOMO',
    priceBelow:'価格が$以下に下落したら通知', priceAbove:'価格が$以上に上昇したら通知',
    enableNotif:'ブラウザ通知を有効化',
    ind_sell_lth:'LTH供給 — 分配検知', ind_sell_dom:'BTCドミナンス — リスク',
    ind_sell_halving:'半減期 — サイクル位置', ind_sell_ath:'ATH近接度 — 天井リスク',
    ind_sell_mvrv:'MVRV Z — 過熱ゲージ', ind_sell_nupl:'NUPL — 強欲レベル',
    ind_sell_funding:'先物プレミアム', ind_sell_fg:'LTH-STH SOPR格差',
    ind_sell_sopr:'STH-SOPR — 利益確定', ind_sell_cbp:'Coinbaseプレミアム — FOMO',
  },

  ko: {
    navInsights:'블로그',
    footerPrivacy:'개인정보처리방침', footerTerms:'이용약관', footerDisclaimer:'투자 조언이 아닙니다',
    whyBtnLabel:'왜?', whyTopTitle:'점수를 끌어올린 지표', whyBottomTitle:'점수를 끌어내린 지표', histToday:'오늘', histYesterday:'어제', histWeekAgo:'지난주',
    buyTiming:'📈 롱 타이밍', sellTiming:'📉 매도/청산 타이밍',
    livePriceLabel:'현재가 · 바이낸스', fgLabel:'공포·탐욕 지수',
    rpLabel:'실현가 이격률', maLabel:'200주 이평선 (참고)',
    splitPlan:'단계별 진입 계획', splitTitle:'단계별 비중 배분',
    splitStep1:(s)=>`지금 진입 (${s}점)`, splitStep2:'Hash Ribbon 회복 전환',
    splitStep3:'Coinbase Premium 양전환', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'업데이트',
    modeTitle_buy:'롱 진입 점수', modeTitle_sell:'숏 타이밍 게이지',
    modeSub_buy:'사이클 저점 롱 진입 모델', modeSub_sell:'숏 진입 타이밍 모델',
    sellExplainTitle:'ℹ️ 매도 점수 해석 방법',
    sellExplain_low:'🟢 낮음 (0~3점): 시장이 저점 구간. 청산/숏 신호 없음. 보유 또는 매집.',
    sellExplain_mid:'🟡 중간 (4~6점): 시장 과열 시작. 일부 비중 축소 검토.',
    sellExplain_high:'🔴 높음 (7~10점): 강한 매도 신호. 장기 보유 청산 / 숏 진입 검토.',
    longExitLabel:'장기 보유 청산', shortEntryLabel:'숏 진입 신호',
    ind_mvrv_z:'MVRV Z 스코어', ind_nupl:'NUPL', ind_realized:'실현가 이격률',
    ind_alt_valuation:'가격 vs 추정 실현가', ind_alt_drawdown:'ATH 대비 낙폭',
    ind_alt_short_val:'가격 vs 추정 실현가 (숏)', ind_alt_short_ath:'ATH 근접도 — 과열',
    ind_rsi:'RSI (14일)', ind_vol_change:'거래량 가속도 (15분봉 vs 1h/4h)', ind_btc_corr_tech:'BTC 상관계수 (30일)',
    ind_buy_pressure:'실시간 매수 주도 거래량 — FOMO/과열', ind_sell_pressure:'실시간 매도 주도 거래량 — Capitulation',
    desc_buy_pressure:`최근 15분봉 거래량 중 매수 주도 비중입니다. 65% 이상 + 거래량 급증 + 양봉이 겹치면 국소 고점 근처에서 FOMO 과열 매수를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간(15분~1시간 지연, 일봉은 최대 24시간)으로 반영됩니다.`,
    desc_sell_pressure:`최근 15분봉 거래량 중 매도 주도 비중입니다. 58% 이상 + 거래량 급증 + 음봉이 겹치면 국소 저점 근처에서 항복 매도(캐피틀레이션) 후 반등이 따라오는 경우가 많습니다. 일봉 대신 15분봉을 사용해 거의 실시간으로 반영됩니다.`,
    desc_rsi:`14일 기준 상대강도지수(RSI)로, 최근 가격 변화의 속도와 강도를 측정하는 모멘텀 지표입니다. RSI 30 이하는 과매도(보통 저점 신호), 70 이상은 과매수(보통 고점 신호)를 의미합니다. 순수 가격 기반이라 모든 코인에 동일하게 적용 가능합니다.`,
    desc_vol_change:`최근 15분봉 거래량을 1시간·4시간 평균과 비교합니다. 저점 근처에서 거래량이 급증하면 항복 매도 후 반등이 따라오는 경우가 많고, 고점 근처에서의 급증은 대형 보유자의 분배(매도)를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간으로 반영됩니다.`,
    desc_btc_corr_tech:`최근 30일간 이 코인의 일간 수익률과 비트코인 수익률 간 피어슨 상관계수입니다. 상관계수가 낮을수록(0.5 이하) 이 코인이 BTC와 독립적으로 움직인다는 뜻이며, 코인 고유의 강세/약세를 시사할 수 있습니다.`,
    desc_alt_short_val:`숏 모드용 알트코인 고평가 추정 지표입니다. 현재가가 추정 실현가보다 얼마나 높은지 측정하며, 갭이 클수록 과열되어 숏에 유리합니다. ⚠️ 실현가는 실시간 온체인 데이터가 아닌 추정치입니다.`,
    desc_alt_short_ath:`역대 최고가(ATH) 대비 거리로, 알트코인 숏 타이밍의 과열 신호로 사용합니다. ATH에 근접할수록(−15% 이내) 역사적으로 국지적 고점과 겹치며 숏에 유리합니다.`,
    ind_btc_corr:'BTC 도미넌스 — 알트 사이클', desc_btc_corr:`비트코인 시가총액 도미넌스를 알트코인 사이클 위치의 대리 지표로 활용합니다. BTC 도미넌스가 높을 때(55% 이상)는 자금이 비트코인에 집중되어 알트코인이 부진한 경향이 있고, 이는 보통 알트 사이클이 아직 시작되지 않았다는 신호입니다. 도미넌스가 하락하면(50% 이하) 자금이 알트코인으로 이동하며, 역사적으로 '알트 시즌'과 연관됩니다.`,
    desc_alt_valuation:`알트코인용 추정 밸류에이션 지표입니다. BTC/ETH/BNB와 달리 이 코인은 신뢰할 수 있는 온체인 MVRV Z-Score 데이터가 없어, 현재가 대비 추정 실현가를 대체 지표로 사용합니다.

⚠️ 중요: 이 코인의 실현가는 실시간 온체인 데이터가 아닌 대략적인 추정치입니다. 정밀한 밸류에이션이 아닌 방향성 참고용으로만 활용하세요.

추정 실현가 이하 = 저평가 가능 구간.`,
    desc_alt_drawdown:`온체인 손익 데이터가 부족한 알트코인에서 NUPL 대체 지표로 사용하는 ATH(역대 최고가) 대비 낙폭입니다.

주요 알트코인은 역사적으로 ATH 대비 70% 이상 하락 시 사이클 저점과 겹치는 경우가 많았으나, 코인별 편차가 클 수 있습니다.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'선물-현물 갭',
    ind_cbp:'코인베이스 프리미엄', ind_lth:'LTH 공급 비중', ind_dom:'BTC 도미넌스',
    ind_halving:'반감기 사이클',
    ind_sell_mvrv:'MVRV Z — 과열 게이지', ind_sell_nupl:'NUPL — 탐욕 수준',
    ind_sell_funding:'선물 프리미엄', ind_sell_fg:'LTH-STH SOPR 격차',
    desc_sell_fg:`LTH-STH SOPR 격차는 장기 보유자와 단기 보유자의 수익실현 행동 차이를 측정합니다.
격차가 크게 양수면 단기 보유자가 장기 보유자보다 훨씬 빠르게 수익을 실현 중 = 분산(매도) 초기 신호.

숏 구간: 격차 ≥ 0.15 (단기는 적극 매도, 장기는 보유 유지)
안전 구간: 격차 ≤ 0.02 (행동 일치, 분산 신호 없음)

현재: 단기 보유자가 장기 보유자 대비 상당한 수익을 실현 중 → 분산 시작 가능성.`,
    ind_sell_sopr:'STH-SOPR — 수익 실현', ind_sell_cbp:'코인베이스 프리미엄 — FOMO',
    sec_onchain:'온체인 밸류에이션', sec_miner:'채굴자 / 심리',
    sec_inst:'기관 수급 (선행)', sec_cycle:'사이클 위치',
    sec_breakdown:'점수 합산', sec_triggers:'다음 단계 트리거',
    sec_sellTriggers:'매도 신호 트리거', sec_macro:'매크로 경고등',
    sec_insights:'블로그', sec_insights2:'블로그', viewAllInsights:'전체 →', loadingInsights:'불러오는 중...', loadMoreInsights:'더 보기', collapseInsights:'접기',
    sec_history:'점수 히스토리', sec_histSub:'브라우저에 로컬 저장',
    histH:'시간별', histD:'일별', histM:'월별',
    desc_mvrv_z:"MVRV Z Score는 비트코인이 실현 가치 대비 얼마나 고평가/저평가됐는지 측정합니다.\n• 0 이하: 역사적 저평가 (저점 구간) → 강력 매수\n• 0~1: 약간 저평가 → 축적 구간\n• 1~3: 적정 가치 → 중립\n• 3 이상: 고평가 (고점 구간) → 매도 고려\n현재 0.27 — 저점 근접. 역사적으로 0.5 이하에서 대형 상승이 시작됐습니다.",
    desc_nupl:"NUPL(미실현 순손익)은 전체 BTC 보유자들의 평균 손익 상태를 보여줍니다.\n• 0% 이하 (항복): 보유자 손실 → 극단 매수 신호\n• 0~25% (희망/공포): 저점 회복 중 → 매수 구간\n• 25~50% (낙관): 사이클 중반 → 중립\n• 50~75% (탐욕): 후기 사이클 → 주시\n• 75% 이상 (도취): 극단 탐욕 → 매도 신호",
    desc_realized:"현재 가격이 전체 BTC 보유자의 평균 취득 원가(실현가) 대비 얼마나 떨어져 있는지 보여줍니다.\n• 0% 이하: 평균 원가 이하 → 패닉 구간, 최강 매수\n• 0~5%: 실현가 근처 → 이상적 진입\n• 5~20%: 적당한 프리미엄 → 수용 가능\n• 20% 이상: 높은 프리미엄 → 주의",
    desc_hash:"Hash Ribbon은 비트코인 채굴 해시레이트 모멘텀(30일 vs 60일 이평)을 추적합니다.\n• 캐피튤레이션: 약한 채굴자 가동 중단 → 저점 형성 중\n• 회복 전환: 30일 MA가 60일 MA 상향 돌파 → 가장 신뢰도 높은 선행 매수 신호 (2~4주 선행)\n역사적 정확도: 2016, 2018, 2020, 2022년 저점 모두 정확히 포착.",
    desc_sopr:"단기 보유자 SOPR — 최근 매수자들이 수익인지 손실인지로 매도하는지 측정합니다.\n• 0.95 이하: 패닉 손절 → 캐피튤레이션 = 매수 신호\n• 0.95~1.0: 소폭 손실 실현 → 저점 근처\n• 1.0~1.03: 소폭 수익 실현 → 중립\n• 1.05 이상: 강한 수익 실현 → 분산 = 고점 신호",
    desc_funding:"선물-현물 갭 = (선물 마크가격 - 현물 인덱스가격) / 현물가격\n8시간 정산 딜레이 없이 실시간으로 레버리지 쏠림을 포착합니다.\n• 음수 (역프리미엄): 선물이 현물보다 낮음 → 숏 과부하 → 선행 매수 신호\n• ±0.01%: 중립 (BTC 정상 범위)\n• 0.05% 이상: 콘탱고 → 롱 과부하 → 주의\n• 0.15% 이상: 극단 콘탱고 → 고점 신호",
    desc_cbp:"코인베이스 프리미엄 = (코인베이스 가격 - 바이낸스 가격) / 바이낸스 가격\n미국 기관 수요를 실시간으로 반영. ETF 유입 데이터보다 2~3일 선행합니다.\n• 양수: 미국 기관 매수 중 → 강세\n• 0 근처: 관망/중립\n• 음수: 기관 관망 → 단기 약세\n현재: 음수 (46일+ 연속) → 미국 기관들이 매크로 명확성을 기다리는 중.",
    desc_lth:"장기 보유자 공급 비중 = 155일 이상 미이동 주소가 보유한 BTC 비율\n• 75% 이상: 고래들의 공격적 매집 → 강력 매수 신호\n• 70~75%: 일반적 매집\n• 70% 이하: 분산 (고래 매도 중)\n현재 79%(역대 최고치) — 스마트머니가 팔지 않음. 수요 회복 시 공급 충격 예상.",
    desc_dom:"BTC 도미넌스 = BTC 시총 / 전체 암호화폐 시총\n알트코인에서 비트코인으로 자금이 이동할 때 상승 — 대형 상승장 전 전형적 패턴입니다.\n• 55~63% (코인게코 기준): BTC 시즌 → 자본이 BTC에 집중 → 매수 구간\n• 50% 이하: 알트 시즌 → 리스크온\n• 65% 이상: 극단 BTC 지배 → 알트 로테이션 임박 가능",
    desc_halving:"비트코인 반감기는 약 4년마다 채굴 보상을 50% 줄여 공급 충격을 만듭니다.\n역사적 저점 타이밍:\n• 2015년 저점: 2016년 반감기 18개월 전\n• 2018년 저점: 2020년 반감기 17개월 전\n• 2022년 저점: 2024년 반감기 17개월 전\n• 현재: 2028년 4월 반감기까지 약 22개월 → 핵심 저점 구간.",
    alertTitle:'알림 설정',
    alertDesc:'조건 충족 시 브라우저 알림 + 화면 깜빡임 + 알림음으로 알려드립니다.',
    alertBuySection:'📈 롱 트리거', alertSellSection:'📉 숏 트리거',
    a2:'롱 점수 ≥ 6.0 (분할 시작)',
    a3:'롱 점수 ≥ 7.0 (비중 확대)', a4:'롱 점수 ≥ 8.0 (적극 매집)',
    a5:'MVRV Z ≤ 0 — 완전 저점 구간', a6:'NUPL 0% 이하 — 항복 구간',
    a7:'선물-현물 갭 음수 전환 (역프리미엄)', a8:'Hash Ribbon 회복 전환',
    a9:'코인베이스 프리미엄 양전환',
    b1:'숏 점수 ≥ 6.0 (숏 준비)', b2:'숏 점수 ≥ 7.0 (숏 비중 확대)',
    b3:'숏 점수 ≥ 8.0 (풀 숏)', b4:'MVRV Z ≥ 3.5 — 도취 구간',
    b5:'NUPL ≥ 75% — 극단 탐욕', b6:'공포·탐욕 지수 ≥ 80',
    b7:'선물 프리미엄 ≥ 0.15%', b8:'코인베이스 프리미엄 ≥ 0.3% — FOMO',
    priceBelow:'가격이 $ 이하 하락 시 알림', priceAbove:'가격이 $ 이상 상승 시 알림',
    enableNotif:'브라우저 알림 허용',
    
    // Short 모드 지표명
    ind_sell_mvrv:'MVRV Z — 과열 위치', ind_sell_nupl:'NUPL — 탐욕 수준',
    ind_sell_funding:'선물 프리미엄', ind_sell_fg:'LTH-STH SOPR 격차',
    desc_sell_fg:`LTH-STH SOPR 격차는 장기 보유자와 단기 보유자의 수익실현 행동 차이를 측정합니다.
격차가 크게 양수면 단기 보유자가 장기 보유자보다 훨씬 빠르게 수익을 실현 중 = 분산(매도) 초기 신호.

숏 구간: 격차 ≥ 0.15 (단기는 적극 매도, 장기는 보유 유지)
안전 구간: 격차 ≤ 0.02 (행동 일치, 분산 신호 없음)

현재: 단기 보유자가 장기 보유자 대비 상당한 수익을 실현 중 → 분산 시작 가능성.`,
    ind_sell_sopr:'STH-SOPR — 수익실현', ind_sell_cbp:'코인베이스 프리미엄 — FOMO',
    ind_sell_lth:'LTH 공급 — 분산 감지', ind_sell_dom:'BTC 도미넌스 — 리스크',
    ind_sell_halving:'반감기 — 사이클 위치', ind_sell_ath:'ATH 근접도 — 고점 리스크',
  },
  es: {
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Política de Privacidad', footerTerms:'Términos de Servicio', footerDisclaimer:'No es asesoramiento financiero',
    whyBtnLabel:'¿Por qué?', whyTopTitle:'Principales contribuyentes', whyBottomTitle:'Lo que frena', histToday:'Hoy', histYesterday:'Ayer', histWeekAgo:'Semana pasada',
    buyTiming:'📈 Timing LARGO', sellTiming:'📉 Timing CORTO',
    livePriceLabel:'Precio · Binance', fgLabel:'Miedo y Codicia',
    rpLabel:'Brecha del Precio Realizado', maLabel:'MA 200S (ref)',
    splitPlan:'Plan de Entrada Escalonada', splitTitle:'Asignación por Etapa',
    splitStep1:(s)=>`Ahora (Puntuación ${s})`, splitStep2:'Recuperación Hash Ribbon',
    splitStep3:'Coinbase Premium → Positivo', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Actualizado',
    // Mode labels
    modeTitle_buy:'PUNTUACIÓN DE TIMING LARGO', modeTitle_sell:'MEDIDOR DE PRESIÓN DE VENTA',
    modeSub_buy:'Modelo de entrada larga en suelo de ciclo', modeSub_sell:'Modelo de timing de entrada corta',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Cómo leer la Puntuación de Venta',
    sellExplain_low:'🟢 BAJA (0~3): Mercado en zona de suelo. Sin señal de salida. Mantener o acumular.',
    sellExplain_mid:'🟡 MEDIA (4~6): Mercado calentándose. Vigilar para reducción parcial.',
    sellExplain_high:'🔴 ALTA (7~10): Señal de venta fuerte. Salir de largo / Considerar entrada corta.',
    // Indicator names (buy)
    ind_mvrv_z:'Puntuación Z MVRV', ind_nupl:'NUPL', ind_realized:'Brecha del Precio Realizado',
    ind_alt_valuation:'Precio vs Realizado Est.', ind_alt_drawdown:'Caída desde ATH',
    ind_alt_short_val:'Precio vs Realizado Est. (Corto)', ind_alt_short_ath:'Proximidad a ATH — Sobrecalentamiento',
    ind_rsi:'RSI (14d)', ind_vol_change:'Aceleración de Volumen (15m vs 1h/4h)', ind_btc_corr_tech:'Correlación con BTC (30d)',
    ind_buy_pressure:'Volumen en Vivo Liderado por Compra — FOMO', ind_sell_pressure:'Volumen en Vivo Liderado por Venta — Capitulación',
    desc_buy_pressure:`Proporción del volumen de las velas de 15 minutos más recientes impulsado por compras agresivas. Un ratio alto (65%+) combinado con un pico de volumen y una vela verde puede señalar sobrecalentamiento por FOMO cerca de un techo local. Usa datos de 15 minutos en lugar de diarios, reflejando condiciones casi en tiempo real (retraso de 15min–1h vs. hasta 24h para el volumen diario).`,
    desc_sell_pressure:`Proporción del volumen de las velas de 15 minutos más recientes impulsado por ventas agresivas. Un ratio alto (58%+) combinado con un pico de volumen y una vela roja puede señalar una venta de capitulación que a menudo precede a un rebote cerca de un suelo local. Usa datos de 15 minutos en lugar de diarios, reflejando condiciones casi en tiempo real.`,
    desc_rsi:`Índice de Fuerza Relativa a 14 días, un oscilador de momentum que mide la velocidad y magnitud de los cambios de precio recientes. RSI por debajo de 30 indica sobreventa (a menudo señal de suelo), mientras que por encima de 70 indica sobrecompra (a menudo señal de techo). Se aplica igual a todas las monedas ya que se basa puramente en el precio.`,
    desc_vol_change:`Compara el volumen de la vela de 15 minutos más reciente con los promedios de 1 hora y 4 horas. Un pico grande combinado con un precio cerca de un mínimo puede señalar una venta de capitulación que a menudo precede a un rebote. Un pico cerca de un máximo puede señalar distribución por parte de grandes tenedores. Usar datos de 15 minutos en lugar de diarios refleja condiciones casi en tiempo real.`,
    desc_btc_corr_tech:`Coeficiente de correlación de Pearson entre los retornos diarios de esta moneda y los de Bitcoin en los últimos 30 días. Una correlación baja (por debajo de 0.5) sugiere que la moneda se mueve independientemente de BTC, lo que puede indicar fortaleza o debilidad específica de la moneda en lugar de un movimiento amplio del mercado.`,
    desc_alt_short_val:`Indicador estimado de sobrevaloración para altcoins en modo CORTO. Mide cuánto está el precio actual por encima del precio realizado estimado — cuanto más alto, más sobrecalentado y favorable para CORTO. ⚠️ El precio realizado es una estimación, no datos on-chain en vivo.`,
    desc_alt_short_ath:`Distancia desde el máximo histórico (ATH), usado como señal de sobrecalentamiento para el timing CORTO de altcoins. Estar cerca del ATH (dentro de -15%) históricamente coincide con techos locales y mayor favorabilidad para CORTO.`,
    ind_btc_corr:'Dominancia BTC — Ciclo Alt', desc_btc_corr:`Rastrea la dominancia de capitalización de mercado de Bitcoin como proxy de la posición del ciclo alt más amplio. Cuando la dominancia BTC es alta (55%+), el capital se concentra en Bitcoin y las altcoins tienden a rendir menos — a menudo señal de que el ciclo alt aún no ha comenzado. Cuando la dominancia cae (por debajo de 50%), el capital rota hacia altcoins, históricamente asociado con la "temporada alt".`,
    desc_alt_valuation:`Indicador de valoración estimado para altcoins. A diferencia de BTC/ETH/BNB, esta moneda no tiene datos confiables de MVRV Z-Score on-chain disponibles, por lo que usamos precio vs. un precio realizado estimado como proxy.

⚠️ Importante: el precio realizado de esta moneda es una estimación aproximada, no datos on-chain en vivo. Úselo solo como señal direccional, no como valoración precisa.

Por debajo del precio realizado estimado = posible zona de infravaloración.`,
    desc_alt_drawdown:`Distancia desde el máximo histórico (ATH), usado como sustituto de NUPL en altcoins sin datos confiables de ganancia/pérdida on-chain.

Las caídas profundas (70%+) desde el ATH han coincidido históricamente con suelos de ciclo para altcoins principales, aunque esto varía significativamente según la moneda.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Brecha Futuros-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Suministro LTH', ind_dom:'Dominancia BTC',
    ind_halving:'Ciclo de Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Sobrecalentamiento', ind_sell_nupl:'NUPL — Nivel de Codicia',
    ind_sell_funding:'Prima de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`El Spread SOPR LTH-STH mide la brecha entre el comportamiento de toma de ganancias de tenedores a largo y corto plazo.
Un spread positivo grande significa que los tenedores a corto plazo están realizando ganancias mucho más rápido que los de largo plazo — una señal temprana de distribución.

Zona CORTO: spread ≥ 0.15 (STH vendiendo agresivamente mientras LTH mantiene)
Zona segura: spread ≤ 0.02 (comportamiento alineado, sin señal de distribución)

Actual: STH realizando ganancias significativas en relación a LTH → la distribución puede estar comenzando.`,
    ind_sell_sopr:'STH-SOPR — Toma de Ganancias', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALORACIÓN ON-CHAIN', sec_miner:'MINERO / SENTIMIENTO',
    sec_inst:'FLUJO INSTITUCIONAL', sec_cycle:'POSICIÓN DEL CICLO',
    sec_breakdown:'Desglose de Puntuación', sec_triggers:'Próximos Disparadores',
    sec_sellTriggers:'Disparadores de Señal de Venta', sec_macro:'ADVERTENCIAS MACRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TODO →', loadingInsights:'Cargando...', loadMoreInsights:'Ver Más', collapseInsights:'Contraer',
    sec_history:'Historial de Puntuación', sec_histSub:'Guardado localmente en el navegador',
    histH:'Hora', histD:'Día', histM:'Mes',
    // Indicator detailed descriptions
    desc_mvrv_z:"La Puntuación Z MVRV mide cuán sobrevalorado o infravalorado está Bitcoin en relación a su valor realizado. \n• < 0: Históricamente infravalorado (zona de suelo) → Compra fuerte\n• 0~1: Ligeramente infravalorado → Zona de acumulación  \n• 1~3: Valor justo → Neutral\n• > 3: Sobrevalorado (zona de techo) → Considerar venta\nFase actual: 0.27 — Cerca del suelo. Históricamente, valores por debajo de 0.5 han precedido a grandes mercados alcistas.",
    desc_nupl:"NUPL (Ganancia/Pérdida Neta No Realizada) muestra el estado general de ganancia/pérdida de todos los tenedores de BTC.\n• < 0% (Capitulación): Tenedores en pérdida → Señal de compra extrema\n• 0~25% (Esperanza/Miedo): Recuperándose del suelo → Zona de compra  \n• 25~50% (Optimismo): Medio del ciclo → Neutral\n• 50~75% (Creencia/Codicia): Final del ciclo → Vigilar\n• > 75% (Euforia): Codicia máxima → Señal de venta",
    desc_realized:"Muestra cuán lejos está el precio actual de la base de costo promedio de todos los tenedores de BTC (Precio Realizado).\n• Por debajo de 0%: Precio bajo el costo promedio → Zona de pánico, compra más fuerte\n• 0~5%: Cerca del precio realizado → Entrada ideal\n• 5~20%: Prima moderada → Aceptable\n• > 20%: Prima alta → Precaución",
    desc_hash:"Hash Ribbon rastrea el momentum del hashrate de minería de Bitcoin (media móvil de 30 días vs 60 días).\n• Capitulación: Mineros débiles cerrando (30MA < 60MA) → Formándose un suelo\n• Cruce de Recuperación: 30MA cruza por encima de 60MA → Señal de compra líder más confiable (2~4 semanas de anticipación)\nPrecisión histórica: Marcó perfectamente los suelos de 2016, 2018, 2020 y 2022.",
    desc_sopr:"El SOPR de Tenedores a Corto Plazo mide si los compradores recientes están vendiendo con ganancia o pérdida.\n• < 0.95: Venta de pánico con pérdidas fuertes → Capitulación = señal de compra\n• 0.95~1.0: Realización leve de pérdidas → Cerca del suelo\n• 1.0~1.03: Toma de ganancias neutral\n• > 1.05: Toma de ganancias fuerte → Distribución = señal de techo",
    desc_funding:"Brecha Futuros-Spot = (Precio Marca Futuros - Precio Índice Spot) / Precio Spot\nMuestra el posicionamiento de apalancamiento en tiempo real sin el retraso de liquidación de 8 horas.\n• Negativo (backwardation): Futuros más baratos que spot → Sobrecarga de cortos → Señal de compra líder\n• ±0.01%: Neutral (rango normal para BTC)\n• > 0.05%: Contango → Sobrecarga de largos → Precaución\n• > 0.15%: Contango extremo → Señal de techo",
    desc_cbp:"Coinbase Premium = (Precio BTC Coinbase - Precio BTC Binance) / Precio Binance\nRefleja la demanda institucional estadounidense en tiempo real. Se adelanta a los datos de flujo de ETF por 2~3 días.\n• Positivo: Instituciones estadounidenses comprando → Alcista\n• Cerca de cero: Observando/neutral\n• Negativo: Instituciones al margen → Bajista a corto plazo\nActual: Negativo (46+ días consecutivos) → Instituciones esperando claridad macro.",
    desc_lth:"% Suministro de Tenedores a Largo Plazo = porcentaje del suministro de BTC en manos de direcciones inactivas 155+ días.\n• > 75%: Ballenas en acumulación agresiva → Señal de compra fuerte\n• 70~75%: Acumulación normal\n• < 70%: Distribución (ballenas vendiendo)\nNiveles récord (79%) significan que el dinero inteligente no está vendiendo — shock de suministro llegará cuando regrese la demanda.",
    desc_dom:"Dominancia BTC = Capitalización de mercado BTC / Capitalización total de mercado cripto\nSube cuando el capital fluye de altcoins a Bitcoin — patrón típico antes de grandes mercados alcistas.\n• 55~63% (base CoinGecko): Temporada BTC → Capital consolidándose en BTC → Zona de compra\n• < 50%: Temporada alt → Riesgo activado\n• > 65%: Dominancia BTC extrema → Puede señalar rotación alt próxima",
    desc_halving:"Los halvings de Bitcoin reducen las recompensas de minería en 50% cada ~4 años, creando shocks de suministro.\nTiming histórico de suelos:\n• Suelo 2015: 18 meses antes del halving 2016\n• Suelo 2018: 17 meses antes del halving 2020  \n• Suelo 2022: 17 meses antes del halving 2024\n• Actual: ~21 meses antes del halving de abril 2028 → En la ventana central del suelo.",
    // Alert labels
    alertTitle:'Configuración de Alertas',
    alertDesc:'Recibe notificaciones vía push del navegador + destello visual + sonido cuando se cumplan las condiciones.',
    alertBuySection:'📈 DISPARADORES LARGO', alertSellSection:'📉 DISPARADORES CORTO',
    a2:'Puntuación Largo ≥ 6.0 (Iniciar escalonado)',
    a3:'Puntuación Largo ≥ 7.0 (Aumentar posición)', a4:'Puntuación Largo ≥ 8.0 (Compra agresiva)',
    a5:'MVRV Z ≤ 0 — Zona de suelo total', a6:'NUPL por debajo de 0% — Capitulación',
    a7:'Brecha de futuros se vuelve negativa (backwardation)', a8:'Cruce de recuperación Hash Ribbon',
    a9:'Coinbase Premium se vuelve positivo',
    b1:'Puntuación Corto ≥ 6.0 (Preparar corto)', b2:'Puntuación Corto ≥ 7.0 (Aumentar corto)',
    b3:'Puntuación Corto ≥ 8.0 (Corto total)', b4:'MVRV Z ≥ 3.5 — Zona de euforia',
    b5:'NUPL ≥ 75% — Codicia extrema', b6:'Miedo y Codicia ≥ 80',
    b7:'Contango de futuros ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alertar cuando el precio baje de $', priceAbove:'Alertar cuando el precio suba de $',
    enableNotif:'Activar Notificaciones del Navegador',
    ind_sell_lth:'Suministro LTH — Distribución', ind_sell_dom:'Dominancia BTC — Riesgo',
    ind_sell_halving:'Halving — Fase del Ciclo', ind_sell_ath:'Proximidad ATH — Riesgo de Techo',
    ind_sell_mvrv:'MVRV Z — Sobrecalentamiento', ind_sell_nupl:'NUPL — Codicia',
    ind_sell_funding:'Prima de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`El Spread SOPR LTH-STH mide la brecha entre el comportamiento de toma de ganancias de tenedores a largo y corto plazo.
Un spread positivo grande significa que los tenedores a corto plazo están realizando ganancias mucho más rápido que los de largo plazo — una señal temprana de distribución.

Zona CORTO: spread ≥ 0.15 (STH vendiendo agresivamente mientras LTH mantiene)
Zona segura: spread ≤ 0.02 (comportamiento alineado, sin señal de distribución)

Actual: STH realizando ganancias significativas en relación a LTH → la distribución puede estar comenzando.`,
    ind_sell_sopr:'STH-SOPR — Toma de Ganancias', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  de: {
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Datenschutzerklärung', footerTerms:'Nutzungsbedingungen', footerDisclaimer:'Keine Finanzberatung',
    whyBtnLabel:'Warum?', whyTopTitle:'Größte Treiber', whyBottomTitle:'Was bremst', histToday:'Heute', histYesterday:'Gestern', histWeekAgo:'Letzte Woche',
    buyTiming:'📈 LONG-Timing', sellTiming:'📉 SHORT-Timing',
    livePriceLabel:'Preis · Binance', fgLabel:'Angst & Gier',
    rpLabel:'Realized-Price-Abstand', maLabel:'200W-MA (Ref.)',
    splitPlan:'Gestaffelter Einstiegsplan', splitTitle:'Verteilung nach Stufe',
    splitStep1:(s)=>`Jetzt (Score ${s})`, splitStep2:'Hash-Ribbon-Erholung',
    splitStep3:'Coinbase Premium → Positiv', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Aktualisiert',
    // Mode labels
    modeTitle_buy:'LONG-TIMING-SCORE', modeTitle_sell:'VERKAUFSDRUCK-ANZEIGE',
    modeSub_buy:'Long-Einstiegsmodell am Zyklustief', modeSub_sell:'Short-Einstiegs-Timing-Modell',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ So liest du den Verkaufs-Score',
    sellExplain_low:'🟢 NIEDRIG (0~3): Markt in Tiefzone. Kein Ausstiegssignal. Halten oder akkumulieren.',
    sellExplain_mid:'🟡 MITTEL (4~6): Markt heizt sich auf. Teilreduzierung beobachten.',
    sellExplain_high:'🔴 HOCH (7~10): Starkes Verkaufssignal. Long-Position schließen / Short-Einstieg erwägen.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z-Score', ind_nupl:'NUPL', ind_realized:'Realized-Price-Abstand',
    ind_alt_valuation:'Preis vs. gesch. Realized', ind_alt_drawdown:'ATH-Drawdown',
    ind_alt_short_val:'Preis vs. gesch. Realized (Short)', ind_alt_short_ath:'ATH-Nähe — Überhitzung',
    ind_rsi:'RSI (14T)', ind_vol_change:'Volumenbeschleunigung (15m vs 1h/4h)', ind_btc_corr_tech:'BTC-Korrelation (30T)',
    ind_buy_pressure:'Live Kaufgetriebenes Volumen — FOMO', ind_sell_pressure:'Live Verkaufsgetriebenes Volumen — Kapitulation',
    desc_buy_pressure:`Anteil des Volumens der letzten 15-Minuten-Kerzen, der durch aggressive Käufe getrieben wird. Eine hohe Quote (65%+) kombiniert mit einem Volumenspike und einer grünen Kerze kann FOMO-getriebene Überhitzung nahe eines lokalen Hochs signalisieren. Nutzt 15-Minuten- statt Tagesdaten und bildet Bedingungen so nahezu in Echtzeit ab (15min–1h Verzögerung vs. bis zu 24h beim Tagesvolumen).`,
    desc_sell_pressure:`Anteil des Volumens der letzten 15-Minuten-Kerzen, der durch aggressive Verkäufe getrieben wird. Eine hohe Quote (58%+) kombiniert mit einem Volumenspike und einer roten Kerze kann Kapitulationsverkäufe signalisieren, die oft einer Umkehr nahe eines lokalen Tiefs vorausgehen. Nutzt 15-Minuten- statt Tagesdaten für nahezu Echtzeit-Abbildung.`,
    desc_rsi:`Relative-Stärke-Index über 14 Tage, ein Momentum-Oszillator, der Geschwindigkeit und Ausmaß jüngster Preisänderungen misst. RSI unter 30 zeigt überverkaufte Bedingungen an (oft ein Tiefsignal), über 70 überkaufte Bedingungen (oft ein Hochsignal). Gilt für alle Coins gleichermaßen, da rein preisbasiert.`,
    desc_vol_change:`Vergleicht das Volumen der letzten 15-Minuten-Kerze mit dem 1-Stunden- und 4-Stunden-Durchschnitt. Ein großer Spike kombiniert mit einem Preis nahe einem Tief kann Kapitulationsverkäufe signalisieren, die oft einer Umkehr vorausgehen. Ein Spike nahe einem Hoch kann Distribution durch Großanleger signalisieren. Die Nutzung von 15-Minuten- statt Tagesdaten bildet Bedingungen nahezu in Echtzeit ab.`,
    desc_btc_corr_tech:`Pearson-Korrelationskoeffizient zwischen den täglichen Renditen dieses Coins und denen von Bitcoin über die letzten 30 Tage. Eine niedrige Korrelation (unter 0,5) deutet darauf hin, dass sich der Coin unabhängig von BTC bewegt, was auf coin-spezifische Stärke oder Schwäche statt breiter Marktbewegung hindeuten kann.`,
    desc_alt_short_val:`Geschätzter Überbewertungsindikator für Altcoins im SHORT-Modus. Misst, wie weit der aktuelle Preis über dem geschätzten Realized Price liegt — je höher, desto überhitzter und SHORT-günstiger. ⚠️ Der Realized Price ist eine Schätzung, keine Live-On-Chain-Daten.`,
    desc_alt_short_ath:`Abstand vom Allzeithoch (ATH), genutzt als Überhitzungssignal für Altcoin-SHORT-Timing. Nähe zum ATH (innerhalb von -15%) fällt historisch mit lokalen Hochs und erhöhter SHORT-Günstigkeit zusammen.`,
    ind_btc_corr:'BTC-Dominanz — Alt-Zyklus', desc_btc_corr:`Verfolgt Bitcoins Marktkapitalisierungs-Dominanz als Proxy für die Position im breiteren Alt-Zyklus. Bei hoher BTC-Dominanz (55%+) konzentriert sich Kapital auf Bitcoin und Altcoins tendieren zur Underperformance — oft ein Zeichen, dass der Alt-Zyklus noch nicht begonnen hat. Fällt die Dominanz (unter 50%), rotiert Kapital in Altcoins, historisch verbunden mit der "Alt Season".`,
    desc_alt_valuation:`Geschätzter Bewertungsindikator für Altcoins. Anders als bei BTC/ETH/BNB liegen für diesen Coin keine verlässlichen On-Chain-MVRV-Z-Score-Daten vor, daher nutzen wir Preis vs. geschätzten Realized Price als Proxy.

⚠️ Wichtig: Der Realized Price dieses Coins ist eine grobe Schätzung, keine Live-On-Chain-Daten. Nur als Richtungssignal nutzen, nicht als präzise Bewertung.

Unter geschätztem Realized Price = mögliche Unterbewertungszone.`,
    desc_alt_drawdown:`Abstand vom Allzeithoch (ATH), genutzt als Ersatz für NUPL bei Altcoins ohne verlässliche On-Chain-Gewinn/Verlust-Daten.

Tiefe Drawdowns (70%+) vom ATH fielen historisch mit Zyklustiefs bei großen Altcoins zusammen, variiert jedoch stark je nach Coin.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Futures-Spot-Spread',
    ind_cbp:'Coinbase Premium', ind_lth:'LTH-Angebot %', ind_dom:'BTC-Dominanz',
    ind_halving:'Halving-Zyklus',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Überhitzung', ind_sell_nupl:'NUPL — Gier-Level',
    ind_sell_funding:'Futures-Prämie', ind_sell_fg:'LTH-STH-SOPR-Spread',
    desc_sell_fg:`Der LTH-STH-SOPR-Spread misst die Kluft zwischen dem Gewinnmitnahmeverhalten von langfristigen und kurzfristigen Haltern.
Ein großer positiver Spread bedeutet, dass kurzfristige Halter Gewinne viel schneller realisieren als langfristige — ein frühes Zeichen für Distribution.

SHORT-Zone: Spread ≥ 0,15 (STH verkauft aggressiv, während LTH hält)
Sichere Zone: Spread ≤ 0,02 (abgestimmtes Verhalten, kein Distributionssignal)

Aktuell: STH realisiert deutliche Gewinne relativ zu LTH → Distribution könnte beginnen.`,
    ind_sell_sopr:'STH-SOPR — Gewinnmitnahme', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ON-CHAIN-BEWERTUNG', sec_miner:'MINER / SENTIMENT',
    sec_inst:'INSTITUTIONELLER FLUSS', sec_cycle:'ZYKLUSPOSITION',
    sec_breakdown:'Score-Aufschlüsselung', sec_triggers:'Nächste Trigger',
    sec_sellTriggers:'Verkaufssignal-Trigger', sec_macro:'MAKRO-WARNUNGEN',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'ALLE →', loadingInsights:'Lädt...', loadMoreInsights:'Mehr laden', collapseInsights:'Einklappen',
    sec_history:'Score-Verlauf', sec_histSub:'Lokal im Browser gespeichert',
    histH:'Stunde', histD:'Tag', histM:'Monat',
    // Indicator detailed descriptions
    desc_mvrv_z:"Der MVRV Z-Score misst, wie über- oder unterbewertet Bitcoin relativ zu seinem Realized Value ist. \n• < 0: Historisch unterbewertet (Tiefzone) → Starker Kauf\n• 0~1: Leicht unterbewertet → Akkumulationszone  \n• 1~3: Fairer Wert → Neutral\n• > 3: Überbewertet (Hochzone) → Verkauf erwägen\nAktuelle Phase: 0,27 — Nahe am Tief. Historisch gingen Werte unter 0,5 großen Bullenmärkten voraus.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) zeigt den Gesamtgewinn-/-verluststatus aller BTC-Halter.\n• < 0% (Kapitulation): Halter in Verlust → Extremes Kaufsignal\n• 0~25% (Hoffnung/Angst): Erholung vom Tief → Kaufzone  \n• 25~50% (Optimismus): Zyklusmitte → Neutral\n• 50~75% (Glaube/Gier): Spätzyklus → Beobachten\n• > 75% (Euphorie): Gier-Höhepunkt → Verkaufssignal",
    desc_realized:"Zeigt, wie weit der aktuelle Preis von der durchschnittlichen Kostenbasis aller BTC-Halter (Realized Price) entfernt ist.\n• Unter 0%: Preis unter Durchschnittskosten → Panikzone, stärkster Kauf\n• 0~5%: Nahe Realized Price → Idealer Einstieg\n• 5~20%: Moderate Prämie → Akzeptabel\n• > 20%: Hohe Prämie → Vorsicht",
    desc_hash:"Hash Ribbon verfolgt das Momentum der Bitcoin-Mining-Hashrate (30-Tage- vs. 60-Tage-Durchschnitt).\n• Kapitulation: Schwache Miner schalten ab (30MA < 60MA) → Tief bildet sich\n• Erholungs-Cross: 30MA kreuzt über 60MA → Zuverlässigstes Vorlauf-Kaufsignal (2~4 Wochen Vorlauf)\nHistorische Genauigkeit: Traf die Tiefs 2016, 2018, 2020, 2022 präzise.",
    desc_sopr:"Der Short-Term-Holder-SOPR misst, ob jüngste Käufer mit Gewinn oder Verlust verkaufen.\n• < 0,95: Panikverkauf mit hohen Verlusten → Kapitulation = Kaufsignal\n• 0,95~1,0: Leichte Verlustrealisierung → Nahe am Tief\n• 1,0~1,03: Neutrale Gewinnmitnahme\n• > 1,05: Starke Gewinnmitnahme → Distribution = Hochsignal",
    desc_funding:"Futures-Spot-Spread = (Futures-Markpreis - Spot-Indexpreis) / Spot-Preis\nZeigt Echtzeit-Hebelpositionierung ohne die 8-Stunden-Abrechnungsverzögerung.\n• Negativ (Backwardation): Futures günstiger als Spot → Short-Überlastung → Vorlauf-Kaufsignal\n• ±0,01%: Neutral (normaler BTC-Bereich)\n• > 0,05%: Contango → Long-Überlastung → Vorsicht\n• > 0,15%: Extremer Contango → Hochsignal",
    desc_cbp:"Coinbase Premium = (Coinbase-BTC-Preis - Binance-BTC-Preis) / Binance-Preis\nSpiegelt US-institutionelle Nachfrage in Echtzeit. Läuft ETF-Flussdaten um 2~3 Tage voraus.\n• Positiv: US-Institutionen kaufen → Bullisch\n• Nahe null: Beobachtung/neutral\n• Negativ: Institutionen abwartend → Kurzfristig bärisch\nAktuell: Negativ (46+ aufeinanderfolgende Tage) → Institutionen warten auf Makro-Klarheit.",
    desc_lth:"LTH-Angebot % = Prozentsatz des BTC-Angebots, gehalten von seit 155+ Tagen inaktiven Adressen.\n• > 75%: Wale in aggressiver Akkumulation → Starkes Kaufsignal\n• 70~75%: Normale Akkumulation\n• < 70%: Distribution (Wale verkaufen)\nRekordniveaus (79%) bedeuten, dass Smart Money nicht verkauft — Angebotsschock kommt bei Nachfragerückkehr.",
    desc_dom:"BTC-Dominanz = BTC-Marktkapitalisierung / Gesamte Krypto-Marktkapitalisierung\nSteigt, wenn Kapital von Altcoins zu Bitcoin fließt — typisches Muster vor großen Bullenmärkten.\n• 55~63% (CoinGecko-Basis): BTC-Saison → Kapital konsolidiert sich in BTC → Kaufzone\n• < 50%: Alt-Saison → Risiko an\n• > 65%: Extreme BTC-Dominanz → Kann bevorstehende Alt-Rotation signalisieren",
    desc_halving:"Bitcoin-Halvings reduzieren Mining-Belohnungen alle ~4 Jahre um 50% und erzeugen Angebotsschocks.\nHistorisches Tief-Timing:\n• Tief 2015: 18 Monate vor Halving 2016\n• Tief 2018: 17 Monate vor Halving 2020  \n• Tief 2022: 17 Monate vor Halving 2024\n• Aktuell: ~21 Monate vor Halving April 2028 → Im Kern-Tieffenster.",
    // Alert labels
    alertTitle:'Alarm-Einstellungen',
    alertDesc:'Erhalte Benachrichtigungen per Browser-Push + visuellem Blitz + Ton, wenn Bedingungen erfüllt sind.',
    alertBuySection:'📈 LONG-TRIGGER', alertSellSection:'📉 SHORT-TRIGGER',
    a2:'Long-Score ≥ 6,0 (Staffelung starten)',
    a3:'Long-Score ≥ 7,0 (Position erhöhen)', a4:'Long-Score ≥ 8,0 (Aggressiver Kauf)',
    a5:'MVRV Z ≤ 0 — Volle Tiefzone', a6:'NUPL unter 0% — Kapitulation',
    a7:'Futures-Spread wird negativ (Backwardation)', a8:'Hash-Ribbon-Erholungscross',
    a9:'Coinbase Premium wird positiv',
    b1:'Short-Score ≥ 6,0 (Short vorbereiten)', b2:'Short-Score ≥ 7,0 (Short erhöhen)',
    b3:'Short-Score ≥ 8,0 (Vollständiger Short)', b4:'MVRV Z ≥ 3,5 — Euphoriezone',
    b5:'NUPL ≥ 75% — Extreme Gier', b6:'Angst & Gier ≥ 80',
    b7:'Futures-Contango ≥ 0,15%', b8:'Coinbase Premium ≥ 0,3% — FOMO',
    priceBelow:'Alarm wenn Preis fällt unter $', priceAbove:'Alarm wenn Preis steigt über $',
    enableNotif:'Browser-Benachrichtigungen aktivieren',
    ind_sell_lth:'LTH-Angebot — Distribution', ind_sell_dom:'BTC-Dominanz — Risiko',
    ind_sell_halving:'Halving — Zyklusphase', ind_sell_ath:'ATH-Nähe — Hochrisiko',
    ind_sell_mvrv:'MVRV Z — Überhitzung', ind_sell_nupl:'NUPL — Gier',
    ind_sell_funding:'Futures-Prämie', ind_sell_fg:'LTH-STH-SOPR-Spread',
    desc_sell_fg:`Der LTH-STH-SOPR-Spread misst die Kluft zwischen dem Gewinnmitnahmeverhalten von langfristigen und kurzfristigen Haltern.
Ein großer positiver Spread bedeutet, dass kurzfristige Halter Gewinne viel schneller realisieren als langfristige — ein frühes Zeichen für Distribution.

SHORT-Zone: Spread ≥ 0,15 (STH verkauft aggressiv, während LTH hält)
Sichere Zone: Spread ≤ 0,02 (abgestimmtes Verhalten, kein Distributionssignal)

Aktuell: STH realisiert deutliche Gewinne relativ zu LTH → Distribution könnte beginnen.`,
    ind_sell_sopr:'STH-SOPR — Gewinnmitnahme', ind_sell_cbp:'Coinbase Premium — FOMO',
  }

};
const LANG_META = <?= json_encode(array_map(fn($l) => ['code' => $l['code'], 'name' => $l['flag'] . ' ' . $l['name']], SUPPORTED_LANGS), JSON_UNESCAPED_UNICODE) ?>;
const SUPPORTED_LANG_CODES = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
let currentLang = (function() {
  // 언어 우선순위: URL ?lang= 파라미터 > localStorage(blogLang, 블로그와 공유) > 기본값 ko
  // SUPPORTED_LANG_CODES는 서버(config.php의 SUPPORTED_LANGS)에서 내려주므로, 새 언어 추가시 이 코드는 안 건드려도 됨.
  try {
    const p = new URLSearchParams(location.search).get('lang');
    if (SUPPORTED_LANG_CODES.includes(p)) return p;
  } catch(e) {}
  try {
    const saved = localStorage.getItem('blogLang');
    if (SUPPORTED_LANG_CODES.includes(saved)) return saved;
  } catch(e) {}
  return 'ko';
})();

/** 코드 곳곳에 흩어진 'ko ? A : B' 삼항연산자들을 여러 언어로 확장하기 위한 헬퍼.
 *  기존 사용법(하위호환, ko/en/ja 3개 고정): TT({ko:'한국어',en:'English',ja:'日本語',es:'Español',de:'Deutsch'})
 *    → 신규 언어(스페인어 등)로 전환 시 이 형태의 호출은 자동으로 en 텍스트가 뜸(디그레이드).
 *  신규 사용법(언어 무제한 확장): TT({ko:'한국어', en:'English', ja:'日本語', es:'Español'})
 *    → 이 객체 형태를 쓰면 SUPPORTED_LANGS에 언어가 추가될 때마다 자연스럽게 대응됨.
 *  앞으로 새로 쓰는 코드는 가급적 객체 형태를 쓰는 걸 권장 — 위치 인자 방식은 3개 언어에서 더 안 늘어남. */
function TT(a, en, ja) {
  if(a !== null && typeof a === 'object') {
    return a[currentLang] ?? a.en ?? a.ko ?? '';
  }
  const ko = a;
  if(currentLang === 'ko') return ko;
  if(currentLang === 'ja') return (ja !== undefined && ja !== null) ? ja : en;
  return en; // ko/en/ja 외 언어(스페인어 등)는 위치 인자 호출에선 영어로 폴백
}

function T(key, args) {
  const L = LANGS[currentLang] || LANGS.en;
  const v = L[key] || LANGS.en[key] || key;
  if(typeof v === 'function') return v(...(args||[]));
  return v;
}



// ═══════════════════════════════════════════════════════
// HISTORY TAB
// ═══════════════════════════════════════════════════════
let histPeriod = '1d'; // 1d, 7d, 30d, all

function setHistPeriod(p) {
  histPeriod = p;
  ['1d','7d','30d','all'].forEach(t => {
    const el = document.getElementById('htp'+t);
    if(el) el.classList.toggle('active', t===p);
  });
  drawHistory();
}
// 호환성
function setHistTab(tab) { setHistPeriod('1d'); }

/** "왜?" 버튼 — 지금 이 점수에 가장 크게 기여한 지표(상위)와 가장 발목을 잡은 지표(하위)를
 *  보여줌. 히스토리에는 개별 지표별 과거값이 저장되지 않아서 "직전 대비 변화"는 안 되고,
 *  대신 "현재 이 점수를 구성하는 요인"을 정직하게 설명하는 방식으로 구현함. */
function toggleWhyPanel() {
  const panel = document.getElementById('whyPanel');
  if (!panel) return;
  const isOpen = panel.style.display !== 'none';
  if (isOpen) { panel.style.display = 'none'; return; }
  renderWhyPanel();
  panel.style.display = 'block';
}

function renderWhyPanel() {
  const panel = document.getElementById('whyPanel');
  if (!panel || !lastResultDetails) return;
  const items = Object.values(lastResultDetails)
    .filter(d => typeof d.score === 'number' && typeof d.max === 'number' && d.max > 0)
    .map(d => ({ label: d.label, ratio: d.score / d.max, score: d.score, max: d.max }));
  if (!items.length) { panel.innerHTML = ''; return; }
  const sorted = [...items].sort((a, b) => b.ratio - a.ratio);
  const top = sorted.slice(0, 3);
  const bottom = sorted.slice(-3).reverse();
  const row = (it, positive) => `<div style="display:flex;justify-content:space-between;padding:3px 0">
    <span style="color:var(--t2)">${positive ? '✓' : '✗'} ${it.label}</span>
    <span style="color:${positive ? 'var(--green)' : 'var(--red)'};font-weight:700">${it.score}/${it.max}</span>
  </div>`;
  panel.innerHTML = `
    <div style="font-weight:700;color:var(--t1);margin-bottom:4px">${T('whyTopTitle')}</div>
    ${top.map(it => row(it, true)).join('')}
    <div style="font-weight:700;color:var(--t1);margin:8px 0 4px">${T('whyBottomTitle')}</div>
    ${bottom.map(it => row(it, false)).join('')}
  `;
}

/** 스코어 카드 하단의 작은 "오늘/어제/지난주" 점수 미니 위젯.
 *  localStorage에 쌓인 전체 히스토리에서 가장 가까운 시점의 값을 찾아 보여줌. */
function renderMiniHistory() {
  const el = document.getElementById('miniHistory');
  if (!el) return;
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h = [];
  try { h = JSON.parse(localStorage.getItem(key) || '[]'); } catch(e) {}
  if (!h.length) { el.innerHTML = ''; return; }
  const now = Date.now();
  const findNearest = (targetAgoMs) => {
    const targetT = now - targetAgoMs;
    let best = null, bestDiff = Infinity;
    for (const p of h) {
      const diff = Math.abs(p.t - targetT);
      if (diff < bestDiff) { bestDiff = diff; best = p; }
    }
    // 목표 시점과 6시간 이상 차이나면(데이터가 그 시점에 아예 없었던 것) 표시하지 않음
    return bestDiff <= 6 * 60 * 60 * 1000 ? best : null;
  };
  const yesterday = findNearest(24 * 60 * 60 * 1000);
  const weekAgo = findNearest(7 * 24 * 60 * 60 * 1000);
  const chip = (label, val) => val == null ? '' :
    `<div><span style="opacity:.7">${label}</span> <b style="color:var(--t1)">${val.s.toFixed(1)}</b></div>`;
  el.innerHTML = [
    chip(T('histToday'), { s: currentScore }),
    chip(T('histYesterday'), yesterday),
    chip(T('histWeekAgo'), weekAgo),
  ].filter(Boolean).join('');
}

function getHistoryData() {
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h = [];
  try { h = JSON.parse(localStorage.getItem(key)||'[]'); } catch(e) {}
  const now = Date.now();
  const rangeMap = {'1d':86400000,'7d':7*86400000,'30d':30*86400000,'all':Infinity};
  const range = rangeMap[histPeriod] || rangeMap['1d'];
  const filtered = range===Infinity ? h : h.filter(x=>now-x.t<range);
  // 최대 300포인트
  if(filtered.length<=300) return filtered.sort((a,b)=>a.t-b.t);
  const step=Math.ceil(filtered.length/300);
  return filtered.filter((_,i)=>i%step===0).sort((a,b)=>a.t-b.t);
}

// ═══════════════════════════════════════════════════════
// IMPROVED SELL SCORE — 현재 시장 상황 반영
// ═══════════════════════════════════════════════════════
// buy가 낮을 때(저점)는 sell도 낮아야 정상
// 별도 "셀 압력 게이지"로 표현

// ═══════════════════════════════════════════════════════
// ALERT SYSTEM 강화
// ═══════════════════════════════════════════════════════
let alertState = {};
let prevIndicators = {};

let activeToastCount = 0; // 동시에 떠 있는 토스트 개수 — 겹치지 않게 세로로 쌓기 위함

function flashAlert(msg, color='#fbbf24') {
  // 화면 테두리 깜빡임
  const div = document.createElement('div');
  div.style.cssText = `position:fixed;inset:0;pointer-events:none;border:3px solid ${color};z-index:9999;border-radius:0;animation:flashAnim .6s ease 3`;
  div.innerHTML = `<style>@keyframes flashAnim{0%,100%{opacity:0}50%{opacity:1}}</style>`;
  document.body.appendChild(div);
  setTimeout(()=>div.remove(), 2000);

  // 토스트 메시지 — 이미 떠 있는 토스트가 있으면 그 아래로 쌓음 (겹쳐 보이는 문제 방지)
  const topOffset = 70 + activeToastCount * 54;
  activeToastCount++;
  const toast = document.createElement('div');
  toast.style.cssText = `position:fixed;top:${topOffset}px;right:16px;background:${color};color:#000;padding:10px 16px;border-radius:10px;font-size:12px;font-weight:600;z-index:9999;max-width:min(280px, calc(100vw - 32px));box-shadow:0 4px 20px rgba(0,0,0,.4);animation:slideIn .3s ease;transition:top .25s ease`;
  toast.innerHTML = `<style>@keyframes slideIn{from{transform:translateX(120%)}to{transform:translateX(0)}}</style>🔔 ${msg}`;
  document.body.appendChild(toast);
  setTimeout(()=>{
    toast.remove();
    activeToastCount = Math.max(0, activeToastCount - 1);
  }, 5000);

  // 브라우저 알림
  if(notifGranted) {
    try { new Notification('BTCtiming.com', {body:msg}); } catch(e){}
  }

  // 알림음 (간단한 비프)
  try {
    const ctx = new (window.AudioContext||window.webkitAudioContext)();
    const osc = ctx.createOscillator();
    const gain = ctx.createGain();
    osc.connect(gain); gain.connect(ctx.destination);
    osc.frequency.value = 880;
    gain.gain.setValueAtTime(0.3, ctx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime+0.5);
    osc.start(); osc.stop(ctx.currentTime+0.5);
  } catch(e){}
}

function isOn(id) { return document.getElementById(id)?.classList.contains('on'); }


// ═══════════════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════════════
// TradingView: iframe 방식 (스크립트 불필요)
initChart();

initTabs();
connectWS();
// 저장된/URL 언어 설정을 드롭다운과 html 태그에도 반영
/** 블로그/페이지 URL 언어 접미사 생성. 'ko'는 접미사 없음(fallback 언어). SUPPORTED_LANGS 기반이라 새 언어 추가시 코드 수정 불필요. */
function blogSuffix(lang) { return lang === 'ko' ? '' : '?lang=' + lang; }
/** feed.php가 내려주는 title_xx/category_xx 등 언어별 필드에서 현재 언어 값을 꺼내되, 없으면 영어→한국어 순으로 폴백. */
function pickLangField(obj, prefix, lang) { return obj[prefix + '_' + lang] || obj[prefix + '_en'] || obj[prefix + '_ko'] || ''; }
/** 언어에 의존하는 위젯/링크/정적 라벨을 전부 다시 그림.
 *  최초 페이지 로드는 물론, 브라우저 "뒤로가기"로 bfcache(캐시된 페이지 스냅샷)에서
 *  복원되는 경우에도 다시 실행되어야 함 — bfcache 복원 시에는 <script> 태그가 재실행되지
 *  않아서, 이 함수를 한 번만 호출하는 구조로는 뒤로가기 후 하단 링크/문구가 예전 상태
 *  (혹은 기본값인 한국어)로 굳어버리는 문제가 있었음. */
function refreshLangDependentUI() {
  updateLangUI(currentLang);
  applyStaticI18n();
  loadCategoryLinks();
  loadInsightWidget();
  loadBlogTicker();
  loadTicker(); // bfcache 복원 시에도 언어에 맞는 통화(KRW/USD/JPY/EUR)로 티커 재조회
}
refreshLangDependentUI(); // 최초 로딩
// 뒤로가기/앞으로가기로 bfcache에서 페이지가 복원될 때(event.persisted === true) 다시 동기화.
// 이때 localStorage에 저장된 언어가 그 사이 바뀌었을 수도 있으니 currentLang도 다시 읽음.
window.addEventListener('pageshow', function(e) {
  if (e.persisted) {
    try {
      const saved = localStorage.getItem('blogLang');
      if (SUPPORTED_LANG_CODES.includes(saved)) currentLang = saved;
    } catch(err) {}
    refreshLangDependentUI();
    loadAll(); // 가격/지표 데이터도 뒤로가기로 돌아온 사이 오래됐을 수 있으니 함께 갱신
  }
});
loadAlertSettings(); // 저장된 알림 토글 설정 복원 (새로고침해도 유지)
loadAll();

// Auto-refresh every 5 minutes
setInterval(loadAll, 5*60*1000);

// 1분마다 현재 점수 히스토리 저장 (탭 변경 시 데이터 축적)
setInterval(() => {
  if(currentScore > 0) {
    saveHistory(currentScore);
    drawHistory();
  }
}, 60*1000);

// Redraw history on resize
window.addEventListener('resize', drawHistory);

function setLang(lang) {
  currentLang = lang;
  try { localStorage.setItem('blogLang', lang); } catch(e) {}
  // 2026-07 수정: 여기서 URL을 안 바꿔주고 있어서, 언어를 바꾼 뒤 URL은 계속 예전 언어(?lang=ja 등)로
  // 남아있었음. 이 상태에서 다른 페이지로 갔다가 "뒤로가기"가 bfcache 복원이 아니라 진짜 새로고침으로
  // 처리되면, 그 오래된 URL 기준으로 서버가 다시 렌더링하면서 방금 바꾼 언어가 원래대로 되돌아갔음.
  try {
    const url = new URL(location.href);
    if(lang === 'ko') url.searchParams.delete('lang'); else url.searchParams.set('lang', lang);
    history.replaceState(null, '', url);
  } catch(e) {}
  updateLangUI(lang);
  closeLangMenu();
  applyStaticI18n();
  renderCategoryLinks();
  renderInsightWidget();
  renderBlogTicker();
  loadTicker(); // 언어가 바뀌면 상단 티커의 기준 통화(KRW/USD/JPY/EUR)도 다시 불러옴
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
  else loadAll();
}

/** 드롭다운 트리거 라벨 + 메뉴 항목 active 상태 + <html lang> + nav Blog 링크를 한 번에 갱신 */
function updateLangUI(lang) {
  const meta = LANG_META[lang] || LANG_META.ko;
  const triggerLabel = document.getElementById('langTriggerLabel');
  if(triggerLabel) triggerLabel.textContent = meta.code;
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });
  document.documentElement.lang = lang;
  const navBlog = document.getElementById('navBlogLink');
  if(navBlog) navBlog.href = '/blog/' + blogSuffix(lang);
  const privacyLink = document.getElementById('footerPrivacyLink');
  if(privacyLink) privacyLink.href = '/privacy' + blogSuffix(lang);
  const termsLink = document.getElementById('footerTermsLink');
  if(termsLink) termsLink.href = '/terms' + blogSuffix(lang);
}

function toggleLangMenu(e) {
  if(e) e.stopPropagation();
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.toggle('open');
}
function closeLangMenu() {
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.remove('open');
}
// 드롭다운 바깥을 클릭하면 자동으로 닫힘
document.addEventListener('click', (e) => {
  const dd = document.getElementById('langDropdown');
  if(dd && dd.classList.contains('open') && !dd.contains(e.target)) closeLangMenu();
});

let insightArticles = [];
let tickerArticles = [];

/** 상단 얇은 블로그 티커 — feed.php에서 최신 글 8개를 가져와 작은 글씨로 노출 */
function loadBlogTicker() {
  fetch('/blog/feed.php?limit=8')
    .then(r => r.json())
    .then(data => {
      tickerArticles = (data && data.articles) || [];
      renderBlogTicker();
    })
    .catch(() => {
      const bar = document.getElementById('blogTickerBar');
      if(bar) bar.style.display = 'none'; // 실패 시 조용히 숨김 (메인 기능에 영향 없도록)
    });
}

function renderBlogTicker() {
  const el = document.getElementById('blogTickerLinks');
  const label = document.getElementById('blogTickerLabel');
  const allLink = document.getElementById('blogTickerAllLink');
  if(!el || !tickerArticles.length) return;
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  if(label) label.textContent = TT({ko:'📰 블로그:',en:'📰 Blog:',ja:'📰 ブログ:',es:'📰 Blog:',de:'📰 Blog:'});
  if(allLink) {
    allLink.textContent = TT({ko:'전체 보기 →',en:'View All →',ja:'全て見る →',es:'Ver Todo →',de:'Alle ansehen →'});
    allLink.href = '/blog/' + suffix;
  }
  el.innerHTML = tickerArticles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    return `<a href="${a.url}${suffix}" style="color:var(--t3);text-decoration:underline;margin-right:14px;
      display:inline-block;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
      vertical-align:bottom" title="${title.replace(/"/g,'&quot;')}">${title}</a>`;
  }).join('');
}

/** 홈페이지 "최신 인사이트" 위젯 — blog/feed.php에서 최신 글들을 가져와 렌더링
 *  더보기 버튼으로 트래픽을 늘리기 위해 사이드바용 5개 + 그리드용 최대 25개를 한 번에 받아두고,
 *  그리드는 8개씩 점진적으로 공개한다. */
let insightGridPool = [];
let insightGridVisible = 8;
const INSIGHT_PAGE_SIZE = 8;

function loadInsightWidget() {
  fetch('/blog/feed.php?limit=30')
    .then(r => r.json())
    .then(data => {
      insightArticles = (data && data.articles) || [];
      renderInsightWidget();
    })
    .catch(() => {
      const grid = document.getElementById('insightGrid2');
      if(grid) grid.innerHTML = '';  // 실패 시 조용히 위젯 숨김 (메인 대시보드 기능에 영향 없도록)
    });
}

/** 카드들을 지정된 컨테이너에 렌더링하는 공통 헬퍼 */
function renderInsightCards(containerId, articles, ko, suffix) {
  const grid = document.getElementById(containerId);
  if(!grid || !articles.length) return;
  grid.innerHTML = articles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    const cat = pickLangField(a, 'category', currentLang);
    return `<a href="${a.url}${suffix}" class="insight-card" style="--icard-accent:${a.color};--icard-accent-bg:${a.color}26">
      <div class="insight-icon">${a.icon}</div>
      <div class="insight-body">
        <div class="insight-cat">${cat}</div>
        <div class="insight-title">${title}</div>
        <div class="insight-date">${formatInsightDate(a.date, currentLang)}</div>
      </div>
    </a>`;
  }).join('');
}

/**
 * feed.php가 주는 date 문자열(예: "2026-07-05 14:30:00")은 항상 KST(한국시간) 기준으로 저장돼 있음.
 * 현재 언어에 맞는 시간대로 환산해서 라벨과 함께 보여줌 (ko→KST, ja→JST, en→UTC, es/de→CET/CEST 자동).
 * — 이렇게 해야 어느 언어로 보든 "이게 무슨 시간대인지" 헷갈리지 않음.
 */
function formatInsightDate(dateStr, lang) {
  if(!dateStr) return '';
  const m = String(dateStr).match(/^(\d{4})-(\d{2})-(\d{2})[ T](\d{2}):(\d{2})/);
  if(!m) return String(dateStr).replaceAll('-', '.'); // 형식이 다르면 예전처럼 안전하게 표시
  const y = Number(m[1]), mo = Number(m[2]), d = Number(m[3]), h = Number(m[4]), mi = Number(m[5]);
  const kstEpoch = Date.UTC(y, mo - 1, d, h - 9, mi); // KST → UTC epoch로 정규화

  const TZ_BY_LANG = { ko: 'Asia/Seoul', ja: 'Asia/Tokyo', en: 'UTC', es: 'Europe/Madrid', de: 'Europe/Berlin' };
  const tz = TZ_BY_LANG[lang] || 'UTC';
  const dt = new Date(kstEpoch);

  const parts = new Intl.DateTimeFormat('en-CA', {
    timeZone: tz, hourCycle: 'h23',
    year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit',
  }).formatToParts(dt).reduce((acc, x) => (acc[x.type] = x.value, acc), {});

  let label;
  if (tz === 'Asia/Seoul') label = 'KST';
  else if (tz === 'Asia/Tokyo') label = 'JST';
  else if (tz === 'UTC') label = 'UTC';
  else {
    // 유럽 서머타임(CET/CEST) 자동 판별: 브라우저마다 다른 Intl timeZoneName 대신
    // UTC와의 실제 분(分) 차이를 직접 계산해서 안정적으로 라벨을 정함
    const asUTC = Date.UTC(Number(parts.year), Number(parts.month) - 1, Number(parts.day), Number(parts.hour), Number(parts.minute));
    const offsetMin = Math.round((asUTC - dt.getTime()) / 60000);
    label = offsetMin === 120 ? 'CEST' : 'CET';
  }
  return `${parts.year}.${parts.month}.${parts.day} ${parts.hour}:${parts.minute} ${label}`;
}

function updateInsightMoreButton() {
  const btn = document.getElementById('insightMoreBtn');
  const countEl = document.getElementById('insightMoreCount');
  const actions = document.getElementById('insightExpandedActions');
  if(!btn) return;
  if(insightGridVisible > INSIGHT_PAGE_SIZE) {
    // 한 번이라도 펼친 상태 — "더보기" 대신 "접기 / 전체 보기"로 전환
    btn.style.display = 'none';
    if(actions) actions.style.display = 'flex';
    return;
  }
  if(actions) actions.style.display = 'none';
  const remaining = insightGridPool.length - insightGridVisible;
  if(remaining <= 0) { btn.style.display = 'none'; return; }
  btn.style.display = '';
  if(countEl) countEl.textContent = `(${Math.min(remaining, INSIGHT_PAGE_SIZE)})`;
}

function loadMoreInsights() {
  // 한 번 누르면 8개만 추가로 펼침(총 16개) — 그 뒤엔 접기/전체보기 두 버튼으로 전환
  insightGridVisible = Math.min(insightGridPool.length, INSIGHT_PAGE_SIZE * 2);
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
}

function collapseInsights() {
  insightGridVisible = INSIGHT_PAGE_SIZE;
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
  // 접었을 때 위젯이 화면 밖으로 벗어나 있으면 섹션 헤더로 살짝 스크롤 복귀
  const hd = document.getElementById('insightGrid2');
  if(hd) {
    const rect = hd.getBoundingClientRect();
    if(rect.top < 0) hd.scrollIntoView({behavior:'smooth', block:'start'});
  }
}

function renderInsightWidget() {
  if(!insightArticles.length) return; // 아직 로딩중이거나 글이 없으면 기존 상태 유지
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  // 사이드바(좌측): 최신 5개 먼저 노출 / 상단 위젯: 그다음 글들 전부를 "더보기 풀"로 확보 — 서로 겹치지 않게
  renderSidebarBlogList(insightArticles.slice(0, 5), ko, suffix);
  insightGridPool = insightArticles.slice(5);
  insightGridVisible = INSIGHT_PAGE_SIZE;
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
  const allLink = document.getElementById('insightAllLink');
  if(allLink) allLink.href = '/blog/' + suffix;
  const allLink2 = document.getElementById('insightAllLink2');
  if(allLink2) allLink2.href = '/blog/' + suffix;
  const sbAllLink = document.getElementById('sbBlogAllLink');
  if(sbAllLink) sbAllLink.href = '/blog/' + suffix;
}

/** 사이드바 좌측 하단 컴팩트 블로그 리스트 (텍스트 위주, 아이콘만) */
function renderSidebarBlogList(articles, ko, suffix) {
  const list = document.getElementById('sbBlogList');
  if(!list || !articles.length) return;
  list.innerHTML = articles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    return `<a href="${a.url}${suffix}" class="sb-blog-item">
      <span class="sb-blog-icon">${a.icon}</span>
      <span class="sb-blog-title">${title}</span>
    </a>`;
  }).join('');
}

let categoryFooterArticles = [];

/** footer의 "카테고리별 최신 글" 링크 — 카테고리 4개를 각각 명시적으로 fetch해서 최신글 1개씩 가져옴.
 *  (이전엔 "최신 20개"만 가져와서 카테고리별로 걸러냈는데, 그 20개 안에 하필 특정 카테고리가
 *   하나도 없으면 그 카테고리 전체가 통째로 안 보이는 문제가 있었음 — 예: 시황분석/코인뉴스 누락)
 *  카테고리 목록 자체는 CATEGORY_LIST(서버에서 내려줌)를 써서, 새 카테고리 추가시 이 코드는 안 건드려도 됨. */
function loadCategoryLinks() {
  Promise.all(CATEGORY_LIST.map(cat =>
    fetch(`/blog/feed.php?category=${cat}&limit=1`).then(r => r.json()).catch(() => null)
  )).then(results => {
    categoryFooterArticles = results
      .map(data => (data && data.articles && data.articles[0]) || null)
      .filter(Boolean);
    renderCategoryLinks();
  }).catch(() => {
    const label = document.getElementById('blogGuideLabel');
    if(label) label.style.display = 'none'; // 실패 시 조용히 숨김
  });
}

function renderCategoryLinks() {
  const el = document.getElementById('blogCategoryLinks');
  if(!el || !categoryFooterArticles.length) return;
  const suffix = blogSuffix(currentLang);
  const label = document.getElementById('blogGuideLabel');
  if(label) label.textContent = TT({ko:'📖 카테고리별 최신 글: ',en:'📖 Latest by Category: ',ja:'📖 カテゴリー別最新記事: ',es:'📖 Últimas por Categoría: ',de:'📖 Neueste nach Kategorie: '});
  el.innerHTML = categoryFooterArticles.map(a => {
    const cat = pickLangField(a, 'category', currentLang);
    const title = pickLangField(a, 'title', currentLang);
    return `<a href="${a.url}${suffix}" style="color:var(--t3);text-decoration:underline;margin-right:12px">[${cat}] ${title}</a>`;
  }).join('') + `<a href="/blog/${suffix}" style="color:var(--t3);text-decoration:underline">${TT({ko:'전체 블로그 보기 →',en:'All Posts →',ja:'全ての記事を見る →',es:'Ver Todas las Publicaciones →',de:'Alle Beiträge ansehen →'})}</a>`;
}

function applyStaticI18n() {
  const ko = currentLang === 'ko';
  const allLbl = TT({ko:'전체',en:'All',ja:'全期間',es:'Todo',de:'Alle'});
  const tabMap = {'1m':ko?'1h':'1h','5m':ko?'6h':'5m','15m':ko?'1d':'15m',
    '30m':ko?'3d':'30m','1h':ko?'7d':'1h','4h':ko?'14d':'4h',
    '1d':ko?'30d':'1d','1w':ko?'90d':'1w','1M':ko?allLbl:'1M'};
  Object.entries(tabMap).forEach(([id,lbl])=>{
    const el=document.getElementById('ht'+id); if(el) el.textContent=lbl;
  });

  // 페이지 안의 모든 [data-i] 요소를 빠짐없이 일괄 번역.
  // (이전엔 차트 탭 라벨만 여기서 갱신되고, 알림창/섹션 헤더 등은
  //  setMode() 안에서만 일부 키가 갱신되거나 아예 갱신되지 않아서
  //  언어를 바꿔도 일부 텍스트가 기존 언어로 남아있는 문제가 있었음)
  document.querySelectorAll('[data-i]').forEach(el => {
    const key = el.getAttribute('data-i');
    const translated = T(key);
    if (!translated || translated === key) return; // 번역 사전에 없는 키는 건드리지 않음
    if (key === 'sec_inst') {
      // 이 요소엔 "LEADING" 뱃지(<span class="sec-tag">)가 같이 들어있어서
      // textContent로 덮어쓰면 뱃지가 같이 사라짐 → 텍스트만 교체하고 뱃지는 보존
      const badge = el.querySelector('.sec-tag');
      el.textContent = translated + ' ';
      if (badge) el.appendChild(badge);
    } else {
      el.textContent = translated;
    }
  });
}

// ═══════════════════════════════════════════════════════
// LIVE CHAT (Firebase Realtime Database)
// ═══════════════════════════════════════════════════════
let chatUnsub = null;
let chatNickname = (function(){
  try {
    const saved = localStorage.getItem('chatNickname');
    if(saved) return saved;
  } catch(e){}
  const generated = 'Trader' + Math.floor(Math.random()*9999);
  try { localStorage.setItem('chatNickname', generated); } catch(e){}
  return generated;
})();

// ── 지역 감지 + 자동 번역 ──
// IP 기반으로 대략적인 국가 코드를 알아내서(ipapi.co, 무료·키 불필요),
// 채팅 닉네임 앞에 국기로 표시하고, 내 지역과 다른 메시지는 자동 번역해서 보여줌.
let myRegion = null; // 예: 'KR', 'JP', 'US' ...

const REGION_LANG = { // 지역 코드 → 번역 대상 언어 코드 (없으면 en으로 대체)
  KR:'ko', JP:'ja', CN:'zh', TW:'zh', HK:'zh', VN:'vi', TH:'th', ID:'id',
  US:'en', GB:'en', CA:'en', AU:'en', IN:'en', SG:'en', PH:'en',
  BR:'pt', PT:'pt', ES:'es', MX:'es', AR:'es', CL:'es', CO:'es',
  DE:'de', FR:'fr', IT:'it', RU:'ru', TR:'tr', NL:'nl', PL:'pl'
};
function regionToLang(cc) { return REGION_LANG[cc] || 'en'; }

/** 2글자 국가코드를 국기 이모지로 변환 (별도 이미지/폰트 불필요, 유니코드 계산) */
function regionFlag(cc) {
  if(!cc || cc.length !== 2) return '🌐';
  return cc.toUpperCase().replace(/./g, c => String.fromCodePoint(127397 + c.charCodeAt(0)));
}

/** 내 지역 코드를 가져옴 (세션당 1회만 조회, localStorage에 24시간 캐싱) */
function detectMyRegion() {
  return new Promise((resolve) => {
    try {
      const cached = JSON.parse(localStorage.getItem('myRegionCache') || 'null');
      if(cached && cached.exp > Date.now()) { myRegion = cached.cc; resolve(myRegion); return; }
    } catch(e){}
    fetch('https://ipapi.co/json/')
      .then(r => r.json())
      .then(d => {
        myRegion = (d && d.country_code) ? d.country_code : fallbackRegionFromLocale();
        try { localStorage.setItem('myRegionCache', JSON.stringify({cc: myRegion, exp: Date.now() + 86400000})); } catch(e){}
        resolve(myRegion);
      })
      .catch(() => { myRegion = fallbackRegionFromLocale(); resolve(myRegion); });
  });
}
/** IP 조회 실패 시 브라우저 언어 설정으로 대략 추정 (완전 실패는 방지) */
function fallbackRegionFromLocale() {
  try {
    const loc = navigator.language || 'en-US';
    const parts = loc.split('-');
    return parts[1] ? parts[1].toUpperCase() : (parts[0] === 'ko' ? 'KR' : parts[0] === 'ja' ? 'JP' : 'US');
  } catch(e){ return 'US'; }
}

const translationCache = {}; // { messageKey: translatedText } — 같은 메시지 반복 번역 방지
/** MyMemory 무료 번역 API 사용 (키 불필요, 소규모 트래픽에 적합) */
function translateText(text, targetLang, sourceLang) {
  const cacheKey = sourceLang + '|' + targetLang + '|' + text;
  if(translationCache[cacheKey]) return Promise.resolve(translationCache[cacheKey]);
  const url = `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=${sourceLang}|${targetLang}`;
  return fetch(url)
    .then(r => r.json())
    .then(d => {
      const translated = (d && d.responseData && d.responseData.translatedText) ? d.responseData.translatedText : null;
      if(translated) translationCache[cacheKey] = translated;
      return translated;
    })
    .catch(() => null);
}

let chatUnreadCount = 0;
let chatOpen = false;
let chatInitialized = false;

function initFirebaseChat() {
  console.log('[chat] initFirebaseChat called, chatDB=', !!chatDB, 'listenersAttached=', chatListenersAttached);
  if(chatDB && chatListenersAttached) return; // 이미 완전히 연결됨
  try {
    console.log('[chat] typeof firebase =', typeof firebase);
    if(typeof firebase === 'undefined') {
      console.error('[chat] Firebase SDK not loaded yet');
      showChatError('Firebase SDK not loaded. Retrying...');
      chatListenersAttached = false;
      // SDK가 늦게 로드될 수 있으니 1초 후 재시도
      setTimeout(initFirebaseChat, 1000);
      return;
    }
    const firebaseConfig = {
      apiKey: "AIzaSyAdmKYQ3w02e9gbvcRUEM7Q_jcgBKtkgDw",
      authDomain: "btctiming-chat.firebaseapp.com",
      databaseURL: "https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "btctiming-chat",
      storageBucket: "btctiming-chat.firebasestorage.app",
      messagingSenderId: "1037450881238",
      appId: "1:1037450881238:web:d21d0deff6e9aef1bf4177",
      measurementId: "G-VD01B9SL3K"
    };
    console.log('[chat] firebase.apps =', firebase.apps);
    if(!firebase.apps || !firebase.apps.length) {
      firebase.initializeApp(firebaseConfig);
      console.log('[chat] initializeApp called');
    }
    if(!chatDB) chatDB = firebase.database();
    console.log('[chat] chatDB ready:', chatDB);
    if(!myRegion) {
      detectMyRegion().then(() => {
        if(lastChatData) renderChatMessages(lastChatData); // 감지 완료 후 이미 그려진 메시지에 번역 적용
      });
    }
    listenChatMessages();
    trackPresence();
    chatListenersAttached = true;
    console.log('[chat] listeners attached successfully');
  } catch(e) {
    console.error('[chat] init failed:', e.message, e);
    showChatError(e.message);
    chatListenersAttached = false;
  }
}

function showChatSetupNeeded() {
  const msgsEl = document.getElementById('chatMessages');
  if(msgsEl) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t2);font-size:11px;padding:20px;line-height:1.7">
      ${TT({ko:'⚙️ 채팅 기능을 사용하려면 Firebase 설정이 필요합니다.<br><br>코드 상단 주석을 참고해 무료 Firebase 프로젝트를 생성하고<br>firebaseConfig 값을 입력해주세요.<br><br>(5분이면 완료됩니다)',en:'⚙️ Chat requires Firebase setup.<br><br>See code comments to create a free Firebase project<br>and fill in firebaseConfig.<br><br>(Takes about 5 minutes)',ja:'⚙️ チャット機能を使用するにはFirebaseの設定が必要です。<br><br>コード上部のコメントを参考に無料のFirebaseプロジェクトを作成し<br>firebaseConfigの値を入力してください。<br><br>(5分ほどで完了します)',es:'⚙️ El chat requiere configuración de Firebase.<br><br>Consulta los comentarios del código para crear un proyecto Firebase gratuito<br>y completar firebaseConfig.<br><br>(Toma unos 5 minutos)',de:'⚙️ Der Chat erfordert eine Firebase-Einrichtung.<br><br>Siehe Codekommentare, um ein kostenloses Firebase-Projekt zu erstellen<br>und firebaseConfig auszufüllen.<br><br>(Dauert etwa 5 Minuten)'})}
    </div>`;
  }
}

function showChatError(detail) {
  const msgsEl = document.getElementById('chatMessages');
  if(msgsEl) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t3);font-size:11px;padding:20px;line-height:1.6">
      ${TT({ko:'채팅 서버 연결 실패.',en:'Chat server connection failed.',ja:'チャットサーバーへの接続に失敗しました。',es:'Falló la conexión al servidor de chat.',de:'Verbindung zum Chat-Server fehlgeschlagen.'})}<br>
      ${detail ? `<span style="color:var(--red);font-size:10px">${escapeHtml(detail)}</span>` : ''}
    </div>`;
  }
}

let lastChatData = null; // 최신 메시지 스냅샷 (지역 감지 완료 후 재렌더링용)

function listenChatMessages() {
  console.log('[chat] listenChatMessages called, chatDB=', chatDB);
  if(!chatDB) { console.error('[chat] listenChatMessages: chatDB is null!'); return; }
  const msgsRef = chatDB.ref('messages').limitToLast(50);
  console.log('[chat] msgsRef created:', msgsRef.toString());
  msgsRef.on('value', (snapshot) => {
    console.log('[chat] onValue fired! exists=', snapshot.exists(), 'val=', snapshot.val());
    lastChatData = snapshot.val();
    renderChatMessages(lastChatData);
  }, (error) => {
    console.error('[chat] listenChatMessages ERROR:', error.message, error);
    showChatError('Listen failed: ' + error.message);
  });
}

function renderChatMessages(data) {
  const msgsEl = document.getElementById('chatMessages');
  if(!msgsEl) { console.error('[chat] chatMessages element not found!'); return; }
  if(!data) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t3);font-size:11px;padding:20px">${TT({ko:'첫 메시지를 남겨보세요!',en:'Be the first to chat!',ja:'最初のメッセージを送ってみましょう!',es:'¡Sé el primero en chatear!',de:'Sei der Erste im Chat!'})}</div>`;
    return;
  }
  const entries = Object.entries(data).sort((a,b)=>a[1].t-b[1].t);
  const wasAtBottom = msgsEl.scrollTop + msgsEl.clientHeight >= msgsEl.scrollHeight - 30;
  msgsEl.innerHTML = entries.map(([key, m]) => {
    const isMe = m.nick === chatNickname;
    const time = new Date(m.t).toLocaleTimeString(SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en',{hour:'2-digit',minute:'2-digit'});
    const flag = m.region ? regionFlag(m.region) : '';
    // 내 지역과 다르고, 언어까지 다를 때만 번역 필요 (예: US-GB는 지역은 달라도 둘 다 영어라 번역 불필요)
    const needsTranslation = myRegion && m.region && m.region !== myRegion && regionToLang(m.region) !== regionToLang(myRegion);
    return `<div style="display:flex;flex-direction:column;align-items:${isMe?'flex-end':'flex-start'}">
      <div style="font-size:10px;color:var(--t3);margin-bottom:2px">${flag} ${escapeHtml(m.nick)} · ${time}</div>
      <div style="background:${isMe?'var(--orange)':'var(--bg4)'};color:${isMe?'#000':'var(--t1)'};
        padding:7px 11px;border-radius:12px;font-size:12px;max-width:85%;word-break:break-word;line-height:1.4">
        ${escapeHtml(m.text)}
      </div>
      ${needsTranslation ? `<div id="tr-${key}" class="chat-tr" style="font-size:11px;color:var(--t3);margin-top:2px;font-style:italic;max-width:85%">🌐 …</div>` : ''}
    </div>`;
  }).join('');
  if(wasAtBottom || !chatOpen) {
    msgsEl.scrollTop = msgsEl.scrollHeight;
  }
  // 안읽은 메시지 카운트
  if(!chatOpen) {
    chatUnreadCount++;
    updateChatBadge();
  }
  // 지역이 다른 메시지들을 백그라운드에서 순차 번역 (MyMemory 무료 API, 과도한 동시요청 방지 위해 순서대로)
  if(myRegion) {
    const toTranslate = entries.filter(([key, m]) =>
      m.region && m.region !== myRegion && regionToLang(m.region) !== regionToLang(myRegion));
    let chain = Promise.resolve();
    toTranslate.forEach(([key, m]) => {
      chain = chain.then(() =>
        translateText(m.text, regionToLang(myRegion), regionToLang(m.region)).then(translated => {
          const el = document.getElementById('tr-' + key);
          if(el) el.textContent = translated ? `🌐 ${translated}` : '';
        })
      );
    });
  }
}

function trackPresence() {
  if(!chatDB) return;
  const presenceRef = chatDB.ref('presence/' + chatNickname);
  presenceRef.set({online: true, t: Date.now()}).then(()=>{
    console.log('[chat] presence set OK');
  }).catch(e=>console.error('[chat] presence set failed:', e.message));
  presenceRef.onDisconnect().remove();
  chatDB.ref('presence').on('value', (snap) => {
    console.log('[chat] presence listener fired:', snap.val());
    const data = snap.val();
    const count = data ? Object.keys(data).length : 0;
    const cEl = document.getElementById('chatUserCount');
    if(cEl) cEl.textContent = `· ${count}명 접속중`;
  }, (error) => {
    console.error('[chat] presence listener ERROR:', error.message);
  });
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

function sendChatMsg() {
  const input = document.getElementById('chatInput');
  if(!input) return;
  const text = input.value.trim();
  if(!text) return;
  if(!chatDB) {
    console.error('[chat] sendChatMsg: chatDB not initialized, attempting init + retry...');
    initFirebaseChat();
    // 1.2초 후 자동 재시도 (사용자가 다시 누를 필요 없게)
    setTimeout(() => {
      if(chatDB && input.value.trim() === text) {
        sendChatMsg();
      } else if(!chatDB) {
        alert(TT({ko:'채팅 연결 실패. 새로고침 후 다시 시도해주세요.',en:'Chat connection failed. Please refresh and try again.',ja:'チャット接続に失敗しました。更新して再度お試しください。',es:'Conexión de chat fallida. Actualiza e inténtalo de nuevo.',de:'Chat-Verbindung fehlgeschlagen. Bitte aktualisieren und erneut versuchen.'}));
      }
    }, 1200);
    return;
  }
  chatDB.ref('messages').push({
    nick: chatNickname,
    text: text,
    t: Date.now(),
    region: myRegion || 'US'
  }).then(() => {
    console.log('Message sent successfully');
    pruneOldMessages();
  }).catch((err) => {
    console.error('Send failed:', err);
    alert(TT({ko:'전송 실패: ',en:'Send failed: ',ja:'送信失敗: ',es:'Error al enviar: ',de:'Senden fehlgeschlagen: '}) + err.message);
  });
  input.value = '';
}

// 메시지 100개 초과 시 가장 오래된 것부터 삭제 (DB 용량 관리)
const CHAT_MAX_MESSAGES = 100;
function pruneOldMessages() {
  if(!chatDB) return;
  chatDB.ref('messages').orderByChild('t').once('value', (snap) => {
    const data = snap.val();
    if(!data) return;
    const entries = Object.entries(data).sort((a,b) => a[1].t - b[1].t);
    if(entries.length > CHAT_MAX_MESSAGES) {
      const toDelete = entries.slice(0, entries.length - CHAT_MAX_MESSAGES);
      toDelete.forEach(([key]) => {
        chatDB.ref('messages/' + key).remove();
      });
    }
  });
}

function toggleChat() {
  const box = document.getElementById('chatBox');
  if(!box) return;
  chatOpen = box.style.display === 'none' || box.style.display === '';
  box.style.display = chatOpen ? 'flex' : 'none';
  if(chatOpen) {
    if(!chatListenersAttached) initFirebaseChat(); // 리스너 미부착이면 무조건 (재)시도
    chatUnreadCount = 0;
    updateChatBadge();
    setTimeout(()=>{
      const input = document.getElementById('chatInput');
      if(input) input.focus();
      const msgsEl = document.getElementById('chatMessages');
      if(msgsEl) msgsEl.scrollTop = msgsEl.scrollHeight;
    }, 50);
  }
}

function updateChatBadge() {
  const badge = document.getElementById('chatBadge');
  if(!badge) return;
  if(chatUnreadCount > 0) {
    badge.style.display = 'flex';
    badge.textContent = chatUnreadCount > 9 ? '9+' : chatUnreadCount;
  } else {
    badge.style.display = 'none';
  }
}

// 닉네임 최초 설정 (선택적)
function promptNickname() {
  const newNick = prompt(TT({ko:'채팅 닉네임을 입력하세요:',en:'Enter your chat nickname:',ja:'チャットニックネームを入力してください:',es:'Ingresa tu apodo de chat:',de:'Gib deinen Chat-Spitznamen ein:'}), chatNickname);
  if(newNick && newNick.trim()) {
    const oldNick = chatNickname;
    chatNickname = newNick.trim().slice(0, 20);
    localStorage.setItem('chatNickname', chatNickname);
    // presence 갱신
    if(chatDB) {
      chatDB.ref('presence/' + oldNick).remove();
      chatDB.ref('presence/' + chatNickname).set({online: true, t: Date.now()});
      chatDB.ref('presence/' + chatNickname).onDisconnect().remove();
    }
  }
}

// 페이지 로드 시 채팅 위젯 lazy init (처음 열 때만 Firebase 연결)
</script>

<!-- ═══════════════════════════════════════════════════════ -->
<!-- LIVE CHAT WIDGET -->
<!-- ═══════════════════════════════════════════════════════ -->
<div id="chatToggle" onclick="toggleChat()" style="position:fixed;bottom:20px;right:20px;width:56px;height:56px;
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
      <div onclick="toggleChat()" style="cursor:pointer;color:var(--t3);font-size:16px;padding:2px 4px">✕</div>
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

<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js" onerror="console.error('Firebase app SDK failed to load')"></script>
<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-database-compat.js" onerror="console.error('Firebase database SDK failed to load')"></script>
</body>
</html>
