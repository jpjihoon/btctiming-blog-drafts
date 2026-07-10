<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/coin_meta.php';
// 자동 코인목록(COIN_SYMBOLS: coins-auto.json 또는 폴백)에 이름·색을 붙여 프론트로 전달.
// app.js는 window.COINS_AUTO가 있으면 그걸 우선 사용(없으면 자체 하드코딩 폴백).
$__coinsForJs = [];
foreach (COIN_SYMBOLS as $__id => $__sym) {
    $__m = coinMeta($__id);
    $__coinsForJs[] = ['id' => $__id, 'sym' => $__sym, 'name' => $__m['name'], 'color' => $__m['color']];
}
$__coinsJson = json_encode($__coinsForJs, JSON_UNESCAPED_UNICODE);
// ── 서버사이드 언어 감지 (SEO) ──
// ?lang=en / ?lang=ja(/향후 ?lang=es 등) 요청 시 서버가 처음부터 해당 언어의 메타태그를
// 내려줘서, 구글이 언어별로 각각 별개 페이지로 색인할 수 있게 함.
// 지원 언어 목록은 config.php의 SUPPORTED_LANGS 하나로 관리 — 새 언어 추가 시 여기 코드는 안 건드려도 됨.
// 언어 결정: URL ?lang 우선 → 없으면 쿠키(blogLang, 마지막 선택) → ko.
// 쿠키를 읽으므로 뒤로가기로 lang 없는 URL(대시보드)에 와도 마지막 선택 언어로 렌더된다.
$lang = resolveLang();   // 사이트 전역 단일 규칙(config.php)
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
    'fr' => [
        'title' => 'Quand Acheter et Vendre du Bitcoin | BTCtiming.com — Analyse d\'Indicateurs On-Chain en Direct',
        'desc' => 'Analyse en temps réel du timing d\'entrée long/short pour le Bitcoin, l\'Ethereum et les principales cryptos à l\'aide d\'indicateurs on-chain — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium et 13 indicateurs combinés en un seul score d\'achat/vente.',
        'keywords' => 'quand acheter bitcoin, quand vendre bitcoin, signal d\'entrée crypto, creux du bitcoin, sommet du bitcoin, indicateur on-chain, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, timing long short, timing altcoin, quand acheter ethereum',
        'language' => 'French',
        'og_title' => 'Analyse d\'Achat/Vente de Bitcoin | BTCtiming.com',
        'og_desc' => 'Analyse en temps réel du timing long/short pour le Bitcoin et les altcoins avec 13 indicateurs on-chain — MVRV, NUPL, STH-SOPR, Hash Ribbon et plus.',
        'tw_title' => 'Quand Acheter et Vendre du Bitcoin | BTCtiming.com',
        'tw_desc' => 'Analyse en temps réel du timing long/short du Bitcoin basée sur les indicateurs on-chain.',
        'og_image_alt' => 'BTCtiming.com — Analyse du Timing d\'Entrée Long/Short du Bitcoin',
        'locale' => 'fr_FR',
    ],
    'pt' => [
        'title' => 'Quando Comprar e Vender Bitcoin | BTCtiming.com — Análise de Indicadores On-Chain ao Vivo',
        'desc' => 'Análise em tempo real de pontos de entrada long/short para Bitcoin, Ethereum e as principais criptomoedas usando indicadores on-chain — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium e 13 indicadores combinados em uma única pontuação de compra/venda.',
        'keywords' => 'quando comprar bitcoin, quando vender bitcoin, sinal de entrada cripto, fundo do bitcoin, topo do bitcoin, indicador on-chain, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, timing long short, timing altcoin, quando comprar ethereum',
        'language' => 'Portuguese',
        'og_title' => 'Análise de Compra/Venda de Bitcoin | BTCtiming.com',
        'og_desc' => 'Análise em tempo real de timing long/short para Bitcoin e altcoins usando 13 indicadores on-chain — MVRV, NUPL, STH-SOPR, Hash Ribbon e mais.',
        'tw_title' => 'Quando Comprar e Vender Bitcoin | BTCtiming.com',
        'tw_desc' => 'Análise em tempo real do timing long/short de Bitcoin baseada em indicadores on-chain.',
        'og_image_alt' => 'BTCtiming.com — Análise de Timing de Entrada Long/Short em Bitcoin',
        'locale' => 'pt_BR',
    ],
    'tr' => [
        'title' => 'Bitcoin Alım/Satım Zamanlaması | BTCtiming.com — Canlı Zincir Üstü Gösterge Analizi',
        'desc' => 'Bitcoin, Ethereum ve büyük coinler için zincir üstü göstergelerle long/short giriş zamanlaması gerçek zamanlı analizi — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium ve 13 gösterge tek bir alım/satım puanında birleştirildi.',
        'keywords' => 'bitcoin alım zamanı, bitcoin satım zamanı, kripto giriş sinyali, bitcoin dip, bitcoin tepe, zincir üstü gösterge, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, long short zamanlama, altcoin zamanlama, ethereum alım zamanı',
        'language' => 'Turkish',
        'og_title' => 'Bitcoin Alım/Satım Analizi | BTCtiming.com',
        'og_desc' => 'Bitcoin ve altcoinler için 13 zincir üstü göstergeyle long/short zamanlaması gerçek zamanlı analizi — MVRV, NUPL, STH-SOPR, Hash Ribbon ve daha fazlası.',
        'tw_title' => 'Bitcoin Alım/Satım Zamanlaması | BTCtiming.com',
        'tw_desc' => 'Zincir üstü göstergelere dayalı Bitcoin long/short zamanlaması gerçek zamanlı analizi.',
        'og_image_alt' => 'BTCtiming.com — Bitcoin Long/Short Giriş Zamanlaması Analizi',
        'locale' => 'tr_TR',
    ],
    'vi' => [
        'title' => 'Thời Điểm Mua Bán Bitcoin | BTCtiming.com — Phân Tích Chỉ Báo On-Chain Trực Tiếp',
        'desc' => 'Phân tích thời gian thực điểm vào long/short cho Bitcoin, Ethereum và các coin lớn bằng chỉ báo on-chain — MVRV Z-Score, NUPL, STH-SOPR, Hash Ribbon, Coinbase Premium và 13 chỉ báo kết hợp thành một điểm mua/bán duy nhất.',
        'keywords' => 'khi nào mua bitcoin, khi nào bán bitcoin, tín hiệu vào lệnh crypto, đáy bitcoin, đỉnh bitcoin, chỉ báo on-chain, MVRV, NUPL, SOPR, hash ribbon, coinbase premium, thời điểm long short, thời điểm altcoin, khi nào mua ethereum',
        'language' => 'Vietnamese',
        'og_title' => 'Phân Tích Mua/Bán Bitcoin | BTCtiming.com',
        'og_desc' => 'Phân tích thời gian thực thời điểm long/short cho Bitcoin và altcoin bằng 13 chỉ báo on-chain — MVRV, NUPL, STH-SOPR, Hash Ribbon và hơn thế.',
        'tw_title' => 'Thời Điểm Mua Bán Bitcoin | BTCtiming.com',
        'tw_desc' => 'Phân tích thời gian thực thời điểm long/short Bitcoin dựa trên chỉ báo on-chain.',
        'og_image_alt' => 'BTCtiming.com — Phân Tích Thời Điểm Vào Long/Short Bitcoin',
        'locale' => 'vi_VN',
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
<script src="/lang.js" defer></script>
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="p:domain_verify" content="7aa5d0e2fb9fe7cc948d6989b7ba624f">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="BTCtiming">
<meta name="theme-color" content="#080808">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="any" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAL7ElEQVR4nO2bbZBU1ZnHf8+5t293T/dM9/QwDLIZQEhcIyQVEqmQSVxXF3EFibqbKKmYcn3ZSm3lxQ+xqGxla2trs1W7WpVKdhMgVsRoiR+yIbECYuELizFKKBFJ3E3QGBHRIg4MzExP90z3fTnPfri3hwGGYXgdHPxX9bx039P3+f/P8zznOefcI4wOA9jkb7e9fdoiVV0mwkJVZgMFQI7TdqKgQL8Iu1XZJiIbDhx49xkgTD4fyWkYo5FwgAiQKVM67hDhKyDzh++iehZsP3MQGUlJd6qysqen+0FigRrcDl9/VHsXCFtbO+Y5DvcbY7pUFY1Z2+R6GaXd+QId8TISA2vt1ijiy7293f9HwrHRYCQRFwjb2jqWichaEVpUNSR2HXMOSZxJWMCKiKtKWVVvPXiwewMjRGgI4ADRlCkdS0XkF6o4oFHy/mRABOKIEKnqDT093RtJOAtJciiVpn1YhO0i2kTiQhNp8VmABURVBlVZcOjQu7sA0yDpGmMfNoZccuFkIw9JRxtDzhj7MHEYxG+2t3fcaoyzIIn5yeL2o8FR1dAYZ0F7e8etgDVwmaeq30gy/WTs+aNhNMY34DJP2tvbF4PzZCLA+Tq8nWmoiAhE1xpVc1Py5jFV0iSGBVA1NxlVFiZvXii9DwlXVRYaES5OytsLIf4bMKqKCBcboGWirZlAtBguLNc/GuKe8zsCjQlb43djgqkal6AjYSS+ThXsWZiInhMBjMQvqxBaCEKILNiEuRHBMZBywDWHrwWoBVALIe1CNnXmRTirAjgm7rlBPyaRcqDUBDNLQmsWWrIpQCnXIvoGYX8FDg0KfghZD0Ir/PlU4cPT4bV9Ebu6leb0mRXhrAjgmNjI3sGY9Eenw19dInTNigm15+PedJ2YSRQZBkOhp6L84V2fbXsi1r8Sctk0WPk5aMlARfN8bZ3wk5ctLdnYg84EZMqUjjOmpxCT76+B58CyecLtn4yJZzKABRvGYRDZw/EuIhgNSLkOpjgd0k0M+jnEy+PlCgzVlXz307zVE9H1X5Z6oBg5Nl+cCs6YBzTitqca9/Y//7XQNTu2slaHSvXIBAgNAgLWEjkZWPwjdHoXKik8Lw0mFsozELz4XZqe/ha5dCuDvsWYUTLmKeCMCOCYOFmBcO9nDXdfCY5AdTD+3IxIbI7EYeE0BmABgoCopRM7Z3HcIIywoQ8oYgNsOotXLPDCvgJ/qrikGUxMP30FTlsAx8RJrpCFh79ouPoyGKzEya+RC1ShyYvvFtRhXxm6B5SKH8+8c16ai/r3cNFz/4id+nGY/hmkqR2sxYqLJw7PbO9h09ASllwDv/rlk9RqdVzXPe1F2tMSwBEY8qEtB4/dafjYDBgoxz2sErtvLhNfu32v8PjvheffVN44YOkfsoRWUSDtClkHZtx/Hw+t/g9mz76eyFpcxwEraGT51W6XwOT4wEV5Fi1awubNmxgaGjptEU5ZABEILGQ84b//zvCxThioxMkv0tjlcznY+kflu88ZnvjfGoMDFRBDsdhMJp3CRiGO4zA0VGMgMPzD937GrOtuRCKLsRH9/f0Ui0X6+vqo9O4nnXIYHBqiVGrj6qsX89RTTxBFEcaYUxbBnGpDAQYD+MHfGhbMhoHqYfIpJ477f1pvWbbGYd3WXmZ+YBoPPbiaFfd8DccoBw8eBDEMVKrkm5t5fP3P+dLyG3HCAN+vs2LFN+nvLwMwMFChUh1CjMEYQ71eY8qUqXR1XUEURWMbOgZU9dQEcA0cGoS7FgqfvxwqlZh0pOC5UAng8w8p921xGOg7wNVXfZKNGx/ntttv59777uXZZ7dw11134vs+M2Z0smnTRq74i5hMeaDKzTcvZ/XqH1KtVjHGsHnzFsrlMp7nxUYbQ602xMUXz+HSS+dSr9eP2hAZvwBSLLap644/EkTAD6GjGZ7/ukMhC41OMAZ8C5/7sfI/ryspv5cv3Polvv/9/ySTyWDMkTPunTt3Uiq1MXPmDAD27t3L8uVfZMeOHeTzeTo6Opg3by5btjxLoVBk8eIlibvHezQiQhiGPPHEL6hWKxhzciNDGIYYa0+upHIEqj7cfaWhvQh+kExWAC8Fdz8GT/0uIEeFf/n2v7FmzY9wHAdjDJs2PckjjzxKEMQbM/Pnz2f69IsA+O1vX+Haa5ckopRwHId9+/axfv0GAA4c6Gbr1udwHGd48mRtRDbbxNy5HyUMI07WCay1cQiMVwQRGArgknb4wscFvwaOE1d2TVlYux1+/EKNzvYMDz2ylhUr7qFer5NOp1m16ofcfPNy7rzz77nmmmtZt+5n+L5PKpXimWc2s2TJ9bzzzjsUi0XCMERV8TyPYrEIQCaTZffuN3jttV2k0+nYfcXg+3VmzZpNsdhKFIXjDgVrbfwdzc1FFRE8zzthI9fEld43Fxm+vUyoVOOx3jXQVxO6vhdQCTJsWL+OyxcsIAwDVOGee1awatVqWltbcRyHcrlMEARcddVfMmfOHH7603X4vk82mx0zqalaPC/N0qU3kMlkExKWdDrLyy9v5ze/eYl0OjOuEcH3/TifxF+shGF4ojbxuO7B9XMFDeOhLrKQSsPaHfDHfT4zOju4fMECAPbv7+HGG/+GlStX0dbWBsRxl8/nKZVKPP/8CzzwwBoAMpnMCTO6MS6VSoXXX/8DrpuisZAdRSGdnTNIpbxxkW94GIxYB4yiaMxQMBJPaT/YDvM64kQoQMrA4BD8ZEdES0uGV197na9+9eusXfso1123lKef3szUqVOJomj4ptZaoigaFiLZwT2h4aC4rstbb+2mXq8hEifCKIooFIoUCkWiKBozDBr3HuY18sMgCI5riJvU+/OmCbkmCKM48aU9eGWfsmu/knYVz0uzZs2D3HHHXezZ8xalUitBEIxpzHiHYtVYgP7+fg4e7BmuAhv5orW1NGYesNYeY8sxK8FBEBzjikZgoA6I8IlOGd6At8kjBy+9LQz68QgBUCgUKJVKZDLeaRUqx0MUhfT07MeYI3fx2tqmAEIQBMeIEEXRqB0xagEQhiHWWlzXxXWEgRosvlT416WGWUWo12KyfhR7wqvdFuHwCHw2SB8Job+/D2vjsDXGwfd95sz5INOmTWfnzu28/fZeUikPa6NhPqPhuHsBsbv4VIdC/qygPHCL4SPT45hXBdeBQrPgNgl9NYMYhmPybL+MEXzfx/PSZLNNOI4B4mGxtbWVT3/6SnK5PPV6bcywhhNMhoxAeSjkkjalLe/Sn5S8jgP7+pVHXwrIeMLv/wQuEX4gnObsdFxQVQ4dOsj27b8mCEI+9KFLyOdbsDaiVquRyWTI55vp6TlAOp0e87vGFMAqZFLCrm6ltwqteRiqQbrFsO6Xdb718zqkhEwKUo7g++fmASoRoa+vj23btlKv1zBG6Oq6gkqlQiaToV6v09t7iPGU+NLcXBzTaidJgJ/9iMO/3+BRygmbX424e12dehgXQqHlnPT80WhMg0WET33qM3R2zsT3fV588dfs2fPGuOqCEwoAyShQg5YsFLLCO72K5yYLH+fBU3ONQi6XyxMEfpIfxlcUjUsASHo6ShYp3eRZtPOAfAONgsgYg4iMu7YY9zw4sskOj3t2tqhOF411gsbf48VJLYnp8I/JgwvpmYBR8b4AE23ARON9ASbagInG+wIw6Qa2k4IaVS1PtBUTBVUtGxF5M/n/gntSVETeNMC2ZPnoQgoFTThvMyLmsaNXiC8AGFUQMY8J4DU3F3aAmZvM7ya7EDbe47K/Gxjo/4QBfOA7IggXRh6wCdfvAH7jzJDJ54tbjZEFqpPqsNTRiETEsVa3Vyp9XcQnRgAIwdymqlWOc8JyEsASPxBSBXMbybG5BlmnUjm0C+SWxoUcdcLyPY6IYa5yS8wVhxEeEAHuwEDvRuAmoCwiDrFK72VvsECYcCkDNyUcXZIOHvXobC7XOk9E7zdGuoD39NFZAGt1q6p8uVrtHfPobAPDh6fz+cIdIvIVkPmNR9bP/3pJGGHrTlVdWan0j/vwdANHHJ9vaWldpMoy0IWqzBY5P4/Pq8bH50G2ibChXO494fH5/wfXSH67tJjggAAAAABJRU5ErkJggg==">
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
<meta property="og:image" content="https://btctiming.com/og-image-<?= h($lang) ?>.png">
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
<meta name="twitter:image" content="https://btctiming.com/og-image-<?= h($lang) ?>.png">

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
    'fr' => [
        ['q' => 'Comment connaître le bon moment pour acheter du Bitcoin ?',
         'a' => 'BTCtiming.com combine 13 indicateurs on-chain — dont MVRV Z-Score, NUPL, STH-SOPR et Hash Ribbon — en un score de timing d\'achat de 0 à 10 en temps réel. Un score de 6+ signale le début d\'entrées échelonnées, et 8+ signale un achat fort.'],
        ['q' => 'Qu\'est-ce que le MVRV Z-Score ?',
         'a' => 'Le MVRV Z-Score divise l\'écart entre la valeur de marché du Bitcoin et sa valeur réalisée par l\'écart-type. Une valeur inférieure à 0 signale une sous-valorisation historique, tandis qu\'au-dessus de 3,5 elle signale une surchauffe.'],
        ['q' => 'Qu\'est-ce que l\'indicateur Hash Ribbon ?',
         'a' => 'Le Hash Ribbon capture le moment où la moyenne mobile sur 30 jours du hashrate de minage du Bitcoin passe au-dessus de la moyenne sur 60 jours. Il a historiquement identifié avec précision les creux de 2016, 2018, 2020 et 2022, ce qui en fait l\'un des signaux d\'achat avancés les plus fiables.'],
        ['q' => 'Quel est le meilleur moment pour acheter par rapport au halving du Bitcoin ?',
         'a' => 'Historiquement, 12-24 mois avant un halving a été la fenêtre d\'achat optimale. 2015 (18 mois avant le halving de 2016), 2018 (17 mois avant 2020) et 2022 (17 mois avant 2024) ont tous suivi ce schéma. Le prochain halving est en avril 2028, actuellement à environ 21 mois.'],
        ['q' => 'Qu\'est-ce que le Coinbase Premium ?',
         'a' => 'Le Coinbase Premium est la différence de prix en pourcentage entre le Bitcoin sur Coinbase (États-Unis) et Binance. Une valeur positive signale des achats institutionnels américains et devance généralement les données de flux ETF de 2-3 jours.'],
    ],
    'pt' => [
        ['q' => 'Como saber o momento de compra do Bitcoin?',
         'a' => 'O BTCtiming.com combina 13 indicadores on-chain — incluindo MVRV Z-Score, NUPL, STH-SOPR e Hash Ribbon — em uma pontuação de timing de compra de 0 a 10 em tempo real. Uma pontuação de 6+ sinaliza o início de entradas escalonadas, e 8+ sinaliza uma compra forte.'],
        ['q' => 'O que é o MVRV Z-Score?',
         'a' => 'O MVRV Z-Score divide a diferença entre o valor de mercado do Bitcoin e seu valor realizado pelo desvio padrão. Um valor abaixo de 0 sinaliza subvalorização histórica, enquanto acima de 3,5 sinaliza sobreaquecimento.'],
        ['q' => 'O que é o indicador Hash Ribbon?',
         'a' => 'O Hash Ribbon captura o momento em que a média móvel de 30 dias do hashrate de mineração do Bitcoin cruza acima da média de 60 dias. Historicamente identificou com precisão os fundos de 2016, 2018, 2020 e 2022, sendo um dos sinais de compra antecedentes mais confiáveis.'],
        ['q' => 'Qual o melhor momento para comprar em relação ao halving do Bitcoin?',
         'a' => 'Historicamente, 12-24 meses antes de um halving tem sido a janela ideal de compra. 2015 (18 meses antes do halving de 2016), 2018 (17 meses antes de 2020) e 2022 (17 meses antes de 2024) seguiram esse padrão. O próximo halving é em abril de 2028, atualmente a cerca de 21 meses.'],
        ['q' => 'O que é o Coinbase Premium?',
         'a' => 'O Coinbase Premium é a diferença percentual de preço entre o Bitcoin na Coinbase (EUA) e na Binance. Um valor positivo sinaliza compra institucional americana e costuma anteceder os dados de fluxo de ETF em 2-3 dias.'],
    ],
    'tr' => [
        ['q' => 'Bitcoin alım zamanını nasıl anlarım?',
         'a' => 'BTCtiming.com, MVRV Z-Score, NUPL, STH-SOPR ve Hash Ribbon dahil 13 zincir üstü göstergeyi gerçek zamanlı 0-10 alım zamanlaması puanında birleştirir. 6+ puan kademeli girişlerin başlangıcını, 8+ puan güçlü alım sinyalini gösterir.'],
        ['q' => 'MVRV Z-Score nedir?',
         'a' => 'MVRV Z-Score, Bitcoin\'in piyasa değeri ile gerçekleşen değeri arasındaki farkı standart sapmaya böler. 0\'ın altındaki değer tarihsel düşük değerlemeyi, 3,5 üzeri aşırı ısınmayı gösterir.'],
        ['q' => 'Hash Ribbon göstergesi nedir?',
         'a' => 'Hash Ribbon, Bitcoin madencilik hash oranının 30 günlük hareketli ortalamasının 60 günlük ortalamayı yukarı kestiği anı yakalar. Tarihsel olarak 2016, 2018, 2020 ve 2022 diplerini tam olarak işaretledi ve en güvenilir öncü alım sinyallerinden biridir.'],
        ['q' => 'Bitcoin yarılanmasına göre en iyi alım zamanı ne zaman?',
         'a' => 'Tarihsel olarak, yarılanmadan 12-24 ay önce optimal alım penceresi olmuştur. 2015 (2016 yarılanmasından 18 ay önce), 2018 (2020\'den 17 ay önce) ve 2022 (2024\'ten 17 ay önce) bu deseni izledi. Sonraki yarılanma Nisan 2028\'de, şu anda yaklaşık 21 ay uzakta.'],
        ['q' => 'Coinbase Premium nedir?',
         'a' => 'Coinbase Premium, Coinbase (ABD) ile Binance arasındaki Bitcoin fiyatının yüzde farkıdır. Pozitif değer ABD kurumsal alımını gösterir ve genellikle ETF akış verisinden 2-3 gün önde gider.'],
    ],
    'vi' => [
        ['q' => 'Làm sao biết thời điểm mua Bitcoin?',
         'a' => 'BTCtiming.com kết hợp 13 chỉ báo on-chain — gồm MVRV Z-Score, NUPL, STH-SOPR và Hash Ribbon — thành điểm thời điểm mua 0-10 theo thời gian thực. Điểm 6+ báo hiệu bắt đầu vào lệnh từng phần, và 8+ báo hiệu tín hiệu mua mạnh.'],
        ['q' => 'MVRV Z-Score là gì?',
         'a' => 'MVRV Z-Score chia khoảng cách giữa giá trị thị trường và giá trị thực hiện của Bitcoin cho độ lệch chuẩn. Giá trị dưới 0 báo hiệu định giá thấp về mặt lịch sử, còn trên 3,5 báo hiệu quá nóng.'],
        ['q' => 'Chỉ báo Hash Ribbon là gì?',
         'a' => 'Hash Ribbon nắm bắt thời điểm trung bình động 30 ngày của hash rate khai thác Bitcoin cắt lên trên trung bình 60 ngày. Về mặt lịch sử nó đã xác định chính xác các đáy 2016, 2018, 2020 và 2022, là một trong những tín hiệu mua dẫn dắt đáng tin cậy nhất.'],
        ['q' => 'Thời điểm mua tốt nhất so với halving Bitcoin là khi nào?',
         'a' => 'Về mặt lịch sử, 12-24 tháng trước một đợt halving là cửa sổ mua tối ưu. 2015 (18 tháng trước halving 2016), 2018 (17 tháng trước 2020) và 2022 (17 tháng trước 2024) đều theo mô hình này. Halving tiếp theo là tháng 4/2028, hiện còn khoảng 21 tháng.'],
        ['q' => 'Coinbase Premium là gì?',
         'a' => 'Coinbase Premium là chênh lệch giá phần trăm của Bitcoin giữa Coinbase (Mỹ) và Binance. Giá trị dương báo hiệu tổ chức Mỹ đang mua, và thường đi trước dữ liệu dòng tiền ETF 2-3 ngày.'],
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
    'fr' => ['alt' => 'Bitcoin Timing', 'desc' => 'Un outil d\'analyse du timing d\'entrée long/short pour le Bitcoin et les principaux altcoins basé sur des indicateurs on-chain. Fournit des signaux d\'achat/vente en temps réel à l\'aide de 13 indicateurs, dont MVRV Z-Score, NUPL et STH-SOPR.', 'lang' => 'fr-FR'],
    'pt' => ['alt' => 'Bitcoin Timing', 'desc' => 'Uma ferramenta de análise de timing de entrada long/short para Bitcoin e as principais altcoins baseada em indicadores on-chain. Oferece sinais de compra/venda em tempo real usando 13 indicadores, incluindo MVRV Z-Score, NUPL e STH-SOPR.', 'lang' => 'pt-BR'],
    'tr' => ['alt' => 'Bitcoin Timing', 'desc' => 'Zincir üstü göstergelere dayalı, Bitcoin ve büyük altcoinler için long/short giriş zamanlaması analiz aracı. MVRV Z-Score, NUPL ve STH-SOPR dahil 13 göstergeyle gerçek zamanlı alım/satım sinyalleri sunar.', 'lang' => 'tr-TR'],
    'vi' => ['alt' => 'Bitcoin Timing', 'desc' => 'Công cụ phân tích thời điểm vào long/short cho Bitcoin và các altcoin lớn dựa trên chỉ báo on-chain. Cung cấp tín hiệu mua/bán thời gian thực bằng 13 chỉ báo gồm MVRV Z-Score, NUPL và STH-SOPR.', 'lang' => 'vi-VN'],
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

<!-- Organization + WebSite 구조화 데이터 (브랜드 검색결과·발행자 정보 강화) -->
<?php
$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => 'https://btctiming.com/#organization',
    'name' => 'BTCtiming.com',
    'url' => 'https://btctiming.com/',
    'logo' => [
        '@type' => 'ImageObject',
        'url' => 'https://btctiming.com/icon-512.png',
    ],
];
$siteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => 'https://btctiming.com/#website',
    'name' => 'BTCtiming.com',
    'url' => 'https://btctiming.com/',
    'inLanguage' => $wa['lang'],
    'publisher' => ['@id' => 'https://btctiming.com/#organization'],
];
?>
<script type="application/ld+json">
<?= json_encode($orgSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
</script>
<script type="application/ld+json">
<?= json_encode($siteSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
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
.coin-tab-add{font-weight:700;color:var(--t3);padding:5px 11px}
.coin-tab-add:hover{color:var(--t1);border-color:var(--b2)}
.coin-tab-more{position:relative;font-weight:700;color:var(--t2);padding:5px 11px}
.coin-tab-more:hover{color:var(--t1);border-color:var(--b2)}
.coin-more-menu{display:none;position:fixed;min-width:180px;max-height:340px;overflow-y:auto;background:#131316;border:1px solid rgba(255,255,255,.12);border-radius:10px;padding:5px;z-index:1200;box-shadow:0 12px 40px rgba(0,0,0,.5)}
.coin-more-menu.open{display:block}
.coin-more-item{display:flex;align-items:center;gap:8px;padding:9px 11px;border-radius:7px;font-size:12px;font-weight:600;color:var(--t2);cursor:pointer;white-space:nowrap}
.coin-more-item:hover{background:#1f1f24;color:var(--t1)}
.coin-more-item.active{background:rgba(251,146,60,.14);color:var(--orange)}
.cm-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0}
.cm-name{color:var(--t3);font-weight:400;font-size:11px}
/* 코인 검색 오버레이 */
.coin-ov{display:none;position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,.66);backdrop-filter:blur(3px);align-items:flex-start;justify-content:center;padding:8vh 16px 16px}
.coin-ov-box{width:100%;max-width:460px;height:70vh;max-height:640px;display:flex;flex-direction:column;background:#131316;border:1px solid rgba(255,255,255,.1);border-radius:16px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.5)}
.coin-ov-grip{display:none}
.coin-ov-head{display:flex;align-items:center;gap:8px;padding:14px 14px 10px}
.coin-ov-input{flex:1;height:40px;padding:0 14px;background:#1c1c20;border:1px solid rgba(255,255,255,.1);border-radius:10px;color:#f0f0f0;font-size:14px;outline:none}
.coin-ov-input:focus{border-color:var(--orange)}
.coin-ov-close{width:34px;height:34px;flex-shrink:0;background:transparent;border:none;color:#888;font-size:16px;cursor:pointer;border-radius:8px}
.coin-ov-close:hover{background:#1c1c20;color:#f0f0f0}
.coin-ov-tabs{display:flex;gap:6px;padding:0 14px 8px}
.cov-tab{flex:1;height:36px;background:#1c1c20;border:1px solid rgba(255,255,255,.08);border-radius:9px;color:#999;font-size:12.5px;font-weight:700;cursor:pointer;transition:all .12s;display:flex;align-items:center;justify-content:center;gap:5px}
.cov-tab.active{background:var(--orange);border-color:var(--orange);color:#000}
.cov-cnt{font-size:11px;font-weight:700;opacity:.7}
.coin-ov-bar{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:0 16px 10px}
.coin-ov-hint{font-size:11px;color:#777}
.coin-ov-reset{font-size:11px;color:#aaa;background:#1c1c20;border:1px solid rgba(255,255,255,.1);border-radius:7px;padding:5px 10px;cursor:pointer}
.coin-ov-reset:hover{color:#f0f0f0;border-color:var(--orange)}
.coin-ov-list{flex:1;min-height:0;overflow-y:auto;-webkit-overflow-scrolling:touch;padding:4px 8px 10px}
.coin-ov-item{display:flex;align-items:center;gap:10px;height:52px;padding:0 12px;border-radius:10px;cursor:pointer;transition:background .1s}
.coin-ov-item:hover{background:#1c1c20}
.coin-ov-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.coin-ov-id{font-size:13px;font-weight:700;color:#f0f0f0;min-width:56px}
.coin-ov-name{font-size:12px;color:#888;flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.coin-ov-star{font-size:18px;color:#3a3a40;flex-shrink:0;padding:6px 4px;margin:-6px -2px;cursor:pointer}
.coin-ov-item.fav .coin-ov-star{color:var(--orange)}
.coin-ov-move{display:flex;flex-direction:column;gap:1px;flex-shrink:0}
.cov-mv{width:22px;height:15px;line-height:1;padding:0;background:#26262c;border:1px solid rgba(255,255,255,.08);border-radius:4px;color:#999;font-size:8px;cursor:pointer}
.cov-mv:hover:not(:disabled){background:var(--orange);color:#000;border-color:var(--orange)}
.cov-mv:disabled{opacity:.25;cursor:default}
.coin-ov-empty{padding:30px;text-align:center;color:#666;font-size:13px;line-height:1.6}
/* 코인 전환 시트 (하단바 코인 탭) */
.coin-sw-head{display:flex;align-items:center;justify-content:space-between;padding:12px 14px 8px}
.coin-sw-title{font-size:15px;font-weight:700;color:#f0f0f0}
.coin-sw-sub{display:block;font-size:11px;color:#888;margin-top:2px}
.coin-sw-item{display:flex;align-items:center;gap:10px;padding:13px 14px;border-radius:10px;cursor:pointer;transition:background .1s}
.coin-sw-item:hover{background:#1c1c20}
.coin-sw-item.current{background:rgba(251,146,60,.1)}
.coin-sw-item.current .coin-ov-id{color:var(--orange)}
.coin-sw-cur{margin-left:auto;font-size:10px;font-weight:700;color:var(--orange);flex-shrink:0}
.coin-sw-manage{margin:6px 12px 12px;padding:12px;background:#1c1c20;border:1px solid rgba(255,255,255,.1);border-radius:10px;color:#bbb;font-size:13px;font-weight:600;cursor:pointer;width:calc(100% - 24px)}
.coin-sw-manage:hover{color:#f0f0f0;border-color:var(--orange)}
/* 모바일: 하단 시트 형태 */
@media(max-width:600px){
  .coin-ov{align-items:flex-end;padding:0 0 48px}
  .coin-ov-box{max-width:none;height:76vh;max-height:none;border-radius:18px 18px 0 0;border-bottom:none;
    animation:sheetUp .22s ease-out}
  .coin-ov-grip{display:block;width:38px;height:4px;border-radius:99px;background:rgba(255,255,255,.2);margin:9px auto 2px}
  .coin-ov-list{padding-bottom:calc(14px + env(safe-area-inset-bottom))}
  .coin-ov-item{height:54px;padding:0 12px}
  .coin-ov-star{font-size:22px}
}
@keyframes sheetUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
/* 모바일 하단 탭바 */
.mobile-tabbar{display:none}
@media(max-width:600px){
  .mobile-tabbar{display:flex;position:fixed;left:0;right:0;top:auto;bottom:0;z-index:900;
    height:48px;background:rgba(15,15,17,.96);backdrop-filter:blur(12px);
    border-top:1px solid rgba(255,255,255,.07);padding-bottom:env(safe-area-inset-bottom);
    transition:transform .25s ease}
  .mobile-tabbar.tabbar-hidden{transform:translateY(110%)}
  .mtab{position:relative;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;
    background:transparent;border:none;color:#6b6b72;font-size:9.5px;font-weight:600;text-decoration:none;cursor:pointer;
    transition:color .15s;-webkit-tap-highlight-color:transparent}
  .mtab.active{color:var(--orange)}
  .mtab.active::before{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:22px;height:2px;border-radius:0 0 3px 3px;background:var(--orange)}
  .mtab-ic{width:20px;height:20px;display:block}
  .mtab-tx{font-size:9.5px;letter-spacing:-.2px}
  body{padding-bottom:48px}
}
/* 모바일: 채팅 버튼이 하단 탭바를 안 가리게 위로 + 축소 */
@media(max-width:600px){
  #chatToggle{width:44px!important;height:44px!important;font-size:19px!important;
    bottom:60px!important;right:14px!important}
  #chatToggle #chatBadge{width:15px!important;height:15px!important;font-size:9px!important}
  #chatBox{bottom:112px!important;right:10px!important;
    width:calc(100vw - 20px)!important;max-width:340px!important;
    height:min(60vh,420px)!important}
}
.nav-r{display:flex;align-items:center;gap:8px;flex-shrink:0;margin-left:auto}
.icon-btn{width:34px;height:34px;border-radius:var(--rad-sm);background:var(--bg3);border:1px solid var(--b1);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--t2);transition:all .15s;flex-shrink:0}
/* 우측 바깥 여백 고정 광고 (레이아웃 1280 + 광고 160 + 여백이 들어갈 만큼 넓을 때만) */
.side-ad:empty{display:none}
.side-ad:not(:empty){position:fixed;top:50%;right:16px;transform:translateY(-50%);width:160px;min-height:600px;z-index:40}
@media(max-width:1620px){.side-ad{display:none!important}}
/* 티커: 깔끔한 스크롤 + 모바일에서 '더 있음' 페이드 힌트 */
.ticker-scroll{scrollbar-width:none;-ms-overflow-style:none}
.ticker-scroll::-webkit-scrollbar{display:none}
.ticker-bar{position:relative}
@media(max-width:600px){
  .ticker-bar::after{content:'';position:absolute;top:0;right:0;bottom:0;width:32px;background:linear-gradient(to right,transparent,#0a0a0a);pointer-events:none}
}
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
/* SEO 대표 제목(h1) — 티커바 오른쪽 끝에 작게. 모바일에선 공간이 좁아 숨김 */
.ticker-h1{overflow:hidden;text-overflow:ellipsis;max-width:340px}
@media(max-width:900px){.ticker-h1{display:none}}
.seo-hero{padding:0 2px 10px}
.seo-hero h1{font-size:14px;font-weight:700;color:var(--t1);line-height:1.3;margin:0 0 2px;letter-spacing:-.2px}
.seo-hero p{font-size:11px;color:var(--t3);line-height:1.4;margin:0}
@media(max-width:900px){.seo-hero{padding:0 2px 8px}}
@media(max-width:600px){.seo-hero h1{font-size:13px}.seo-hero p{font-size:10.5px}}
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
.sb-blog-hd{display:flex;align-items:center;font-size:11px;font-weight:700;letter-spacing:.07em;color:var(--t3);margin-bottom:8px}
.sb-blog-hd a{font-size:10px;padding:2px 7px;border-radius:4px;background:var(--bg3);border:1px solid var(--b1);color:var(--t2);
  font-weight:700;text-decoration:none;margin-left:auto}
.sb-blog-hd a:hover{background:var(--bg4);color:var(--t1);text-decoration:none}
.sb-blog-item{display:flex;gap:10px;align-items:flex-start;padding:14px 0;border-top:1px solid var(--b1);text-decoration:none;color:inherit;transition:padding-left .12s}
.sb-blog-item:first-child{border-top:none;padding-top:4px}
.sb-blog-item:hover{padding-left:3px}
.sb-blog-item:hover .sb-blog-title{color:var(--orange)}
.sb-blog-icon{flex-shrink:0;font-size:16px;width:26px;height:26px;display:flex;align-items:center;justify-content:center;
  background:rgba(255,255,255,.05);background:color-mix(in srgb, var(--sb-accent, var(--orange)) 14%, transparent);border-radius:7px;margin-top:1px}
.sb-blog-main{display:flex;flex-direction:column;gap:3px;min-width:0}
.sb-blog-cat{font-size:10px;font-weight:700;letter-spacing:.02em;color:var(--sb-accent, var(--t3));text-transform:uppercase;opacity:.85}
.sb-blog-title{font-size:13.5px;color:var(--t1);line-height:1.5;font-weight:600;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.sb-blog-date{font-size:10.5px;color:var(--t3);font-variant-numeric:tabular-nums;margin-top:1px}
@media(max-width:768px){
  .sb-blog-item{padding:16px 0;gap:11px}
  .sb-blog-icon{font-size:17px;width:28px;height:28px}
  .sb-blog-title{font-size:14.5px;line-height:1.55}
  .sb-blog-cat{font-size:10.5px}
  .sb-blog-date{font-size:11px}
}

/* ── NOTIFICATION MODAL ── */
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:500;display:flex;align-items:center;justify-content:center;display:none}
.modal-bg.open{display:flex}
.modal{background:var(--bg2);border:1px solid var(--b2);border-radius:var(--rad-lg);padding:20px;width:min(360px,90vw);display:flex;flex-direction:column;gap:12px}
.modal-hd{font-size:14px;font-weight:600;display:flex;justify-content:space-between;align-items:center}
.modal-close{cursor:pointer;color:var(--t2);font-size:18px;line-height:1}
.alert-row{display:flex;justify-content:space-between;align-items:center;padding:12px 4px;border-bottom:1px solid var(--b1);font-size:12.5px;line-height:1.5}
.alert-row:last-child{border-bottom:none}
.alert-label{color:var(--t2)}
.toggle{width:36px;height:20px;border-radius:10px;background:var(--bg4);border:1px solid var(--b2);cursor:pointer;position:relative;transition:background .2s}
.toggle.on{background:var(--green)}
.toggle::after{content:'';position:absolute;top:2px;left:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:transform .2s}
.toggle.on::after{transform:translateX(16px)}
/* 설정 탭 */
.stab-row{display:flex;gap:8px;margin-bottom:14px}
.stab{flex:1;padding:10px;border-radius:8px;border:1px solid var(--b2);background:var(--bg3);color:var(--t1)!important;font-size:12.5px;cursor:pointer;font-weight:600;transition:all .15s;text-align:center}
.stab:hover{background:var(--bg4)}
.stab.active{background:var(--or)!important;color:#0a0a0a!important;border-color:var(--or);font-weight:700;box-shadow:0 2px 8px rgba(247,147,26,.3)}
.stab-desc{font-size:10px;color:var(--t3);margin-bottom:10px;line-height:1.5}
.sset-label{font-size:10px;font-weight:600;color:var(--t2);margin:10px 0 6px}
.wg-coin-grid{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:4px}
.wg-coin-chip{padding:4px 10px;border-radius:20px;font-size:11px;font-weight:600;cursor:pointer;border:1px solid var(--b1);background:var(--bg3);color:var(--t2);transition:all .15s;user-select:none}
.wg-coin-chip.on{background:var(--bg4);color:var(--or);border-color:var(--or);box-shadow:0 0 0 1px var(--or)}
.wg-preview-wrap{margin-bottom:4px;border-radius:10px;overflow:hidden}
.wg-code-wrap{position:relative}
.wg-copy-btn{position:absolute;right:6px;top:6px;padding:3px 9px;border-radius:6px;background:var(--bg4);border:1px solid var(--b1);color:var(--t1);font-size:10px;cursor:pointer}
.wg-copy-btn:hover{background:var(--or);color:#000;border-color:var(--or)}
#wgCoinSearch:focus{border-color:var(--or);outline:none}

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

.hist-tab{font-size:10px;padding:3px 9px;border-radius:6px;cursor:pointer;color:var(--t3);border:1px solid transparent;transition:all .15s;font-weight:600;user-select:none}
.hist-tab:hover{color:var(--t2);background:var(--bg3)}
.hist-tab.active{background:var(--orange);color:#000;border-color:transparent;font-weight:700}
/* 거래소 제휴 배너 — 눈에 띄는 골드 톤 */
.exch-banner{display:flex;align-items:center;gap:12px;text-decoration:none;background:linear-gradient(135deg,rgba(240,185,11,.16),rgba(251,146,60,.12));border:1px solid rgba(240,185,11,.45);border-radius:14px;padding:14px 15px;margin:12px 0;position:relative;overflow:hidden;box-shadow:0 0 0 rgba(240,185,11,.4);animation:exchGlow 2.6s ease-in-out infinite;transition:transform .1s}
@keyframes exchGlow{0%,100%{box-shadow:0 0 0 0 rgba(240,185,11,.0)}50%{box-shadow:0 0 16px 1px rgba(240,185,11,.22)}}
.exch-banner::after{content:"";position:absolute;top:0;left:-60%;width:40%;height:100%;background:linear-gradient(105deg,transparent,rgba(255,255,255,.13),transparent);transform:skewX(-18deg);animation:exchShine 3.6s ease-in-out infinite}
@keyframes exchShine{0%{left:-60%}45%,100%{left:130%}}
.exch-banner:hover{border-color:rgba(240,185,11,.7)}
.exch-banner:active{transform:scale(.99)}
.exch-banner-ic{font-size:23px;flex-shrink:0;position:relative;z-index:1}
.exch-banner-tx{display:flex;flex-direction:column;gap:2px;line-height:1.3;flex:1;min-width:0;position:relative;z-index:1}
.exch-banner-tx b{font-size:13px;color:#fff;font-weight:800;letter-spacing:-.2px}
.exch-banner-tx span{font-size:11px;color:rgba(255,255,255,.72)}
.exch-banner-ar{color:var(--yellow);font-weight:700;font-size:20px;flex-shrink:0;position:relative;z-index:1;line-height:1}
footer{font-size:9px;color:var(--t3);line-height:1.8;padding:12px 16px;border-top:1px solid var(--b1);grid-column:1/-1}
#blogTickerScroll::-webkit-scrollbar{display:none}
#blogCategoryScroll::-webkit-scrollbar{display:none}
</style>
</head>
<body>

<!-- Overlay -->
<div id="overlay">
  <div class="ov-logo">BTC<span>timing.com</span></div>
  <div class="ov-spin"></div>
  <div class="ov-txt" id="ovTxt"><?php echo ['ko'=>'실시간 데이터 불러오는 중...','en'=>'Fetching live data...','ja'=>'リアルタイムデータ取得中...','es'=>'Obteniendo datos en vivo...','de'=>'Live-Daten werden geladen...','fr'=>'Chargement des données en direct...','pt'=>'Carregando dados ao vivo...','tr'=>'Canlı veriler yükleniyor...','vi'=>'Đang tải dữ liệu trực tiếp...'][$lang] ?? 'Fetching live data...'; ?></div>
</div>

<!-- Settings Modal (Widget + Alert tabs) -->
<div class="modal-bg" id="notifModal" onclick="if(event.target===this)closeModal()">
  <div class="modal" style="max-height:92vh;min-height:min(680px,88vh);overflow-y:auto;width:min(560px,96vw)">
    <div class="modal-hd">
      ⚙️ <span data-i="settingsTitle">Settings</span>
      <span class="modal-close" onclick="closeModal()">×</span>
    </div>

    <!-- 탭 버튼 -->
    <div class="stab-row">
      <button id="stab_widget" onclick="switchTab('widget')" style="flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center">📋 Widget</button>
      <button id="stab_alert" onclick="switchTab('alert')" style="flex:1;padding:10px;border-radius:8px;border:1px solid var(--b2);background:var(--bg3);color:var(--t1);font-size:12.5px;cursor:pointer;font-weight:600;text-align:center">🔔 Alerts</button>
    </div>

    <!-- 위젯 탭 -->
    <div id="tab_widget">
      <!-- 위젯 ON/OFF -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:2px 0 10px;border-bottom:1px solid var(--b1);margin-bottom:12px">
        <div>
          <div id="wgTxt_title" style="font-size:13px;font-weight:700;color:var(--t1)">Widget</div>
          <div id="wgTxt_desc" style="font-size:10px;color:var(--t3);margin-top:1px">Use it yourself as a floating panel, or embed it on your site.</div>
        </div>
        <div class="toggle on" id="wgEnableToggle" onclick="toggleWgEnable(this)" role="switch" tabindex="0"
          aria-label="Enable widget" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleWgEnable(this);}"></div>
      </div>

      <div id="wgBody">
        <!-- 코인 선택 + 검색 -->
        <div class="sset-label" id="wgTxt_coins">My coins (favorites)</div>
        <div style="position:relative;margin-bottom:8px">
          <input type="text" id="wgCoinSearch" id="wgCoinSearch" placeholder="🔍 Search to add a coin (ETH, SOL, PEPE…)" data-ph="1" autocomplete="off"
            style="width:100%;padding:7px 10px;background:var(--bg3);border:1px solid var(--b1);border-radius:8px;color:var(--t1);font-size:12px;outline:none"
            oninput="filterWgCoins(this.value)" onfocus="filterWgCoins(this.value)">
          <div id="wgSearchResults" style="display:none;position:absolute;top:100%;left:0;right:0;margin-top:4px;background:var(--bg2);border:1px solid var(--b2);border-radius:8px;max-height:180px;overflow-y:auto;z-index:10;box-shadow:0 8px 24px rgba(0,0,0,.5)"></div>
        </div>
        <div class="wg-coin-grid" id="wgCoinGrid"></div>
        <div style="font-size:10px;color:var(--t3);margin-top:5px" id="wgSelCount"></div>

        <!-- 블로그 표시 -->
        <div class="sset-label" id="wgTxt_options">Options</div>
        <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 0">
          <span id="wgTxt_blog" style="font-size:11.5px;color:var(--t2)">Show latest blog posts (5)</span>
          <div class="toggle" id="wgBlogToggle" onclick="toggleWgBlog(this)" role="switch" tabindex="0"
            aria-label="Show blog" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleWgBlog(this);}"></div>
        </div>

        <!-- 미리보기 -->
        <div class="sset-label" id="wgTxt_preview">Preview</div>
        <div class="wg-preview-wrap">
          <iframe id="wgPreviewFrame"
            src="" frameborder="0" scrolling="no"
            style="width:320px;max-width:100%;height:260px;border-radius:12px;border:1px solid var(--b1);background:var(--bg3);display:block;margin:0 auto">
          </iframe>
        </div>

        <!-- 플로팅 위젯 (사이트 위 상주) -->
        <button onclick="btcLaunchFloating()" style="width:100%;margin-top:10px;background:rgba(247,147,26,.14);border:1px solid rgba(247,147,26,.5);border-radius:8px;padding:11px;font-size:12.5px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:7px">
          <span style="font-size:15px">📌</span><span id="wgTxt_pin" style="color:#f7931a;font-weight:700">Pin widget on screen</span>
        </button>
        <div style="font-size:9.5px;color:var(--t3);text-align:center;margin-top:5px;line-height:1.4">
          <span id="wgTxt_pinHint">Keeps a small live widget floating on this page — drag it anywhere.</span>
        </div>

        <!-- 앱으로 설치 (PWA) -->
        <button id="wgInstallBtn" onclick="installBtcApp()" style="width:100%;margin-top:8px;background:var(--bg3);border:1px solid var(--b2);color:var(--t1);border-radius:8px;padding:10px;font-size:12px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:7px">
          <span>💻</span> <span id="wgTxt_install">Install widget as an app</span>
        </button>
        <div style="font-size:9.5px;color:var(--t3);text-align:center;margin-top:5px;line-height:1.4">
          <span id="wgTxt_installHint">Installs the widget as a standalone app window.</span>
        </div>



        <!-- 코드 복사 -->
        <div class="sset-label" id="wgTxt_code">Embed code (for your website)</div>
        <div class="wg-code-wrap">
          <textarea id="wgCodeBox" readonly rows="3" style="width:100%;background:var(--bg3);border:1px solid var(--b1);border-radius:8px;color:var(--t2);font-size:11px;padding:8px;resize:none;font-family:monospace;line-height:1.5"></textarea>
          <button class="wg-copy-btn" onclick="copyWidgetCode()" id="wgCopyBtn">
            <span id="wgTxt_copy">Copy</span>
          </button>
        </div>
      </div>
    </div>

    <!-- 알람 탭 -->
    <div id="tab_alert" style="display:none">
      <div class="stab-desc" data-i="alertDesc">Get a browser notification when the score crosses these thresholds.</div>
      <div style="font-size:11px;font-weight:700;color:var(--or);margin:14px 0 8px" data-i="alertBuySection">📈 LONG TRIGGERS</div>
      <div class="alert-row"><span class="alert-label" data-i="a2">Long Score ≥ 6.0 (Split Long)</span><div class="toggle on" id="a2" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" data-i="a3">Long Score ≥ 7.0 (Add Long)</span><div class="toggle on" id="a3" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" data-i="a4">Long Score ≥ 8.0 (Full Long)</span><div class="toggle on" id="a4" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div style="font-size:11px;font-weight:700;color:var(--or);margin:18px 0 8px" data-i="alertSellSection">📉 SHORT TRIGGERS</div>
      <div class="alert-row"><span class="alert-label" data-i="b1">Short Score ≥ 6.0 (Prepare Short)</span><div class="toggle" id="b1" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" data-i="b2">Short Score ≥ 7.0 (Add Short)</span><div class="toggle" id="b2" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" data-i="b3">Short Score ≥ 8.0 (Full Short)</span><div class="toggle" id="b3" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <button onclick="requestNotif()" style="background:var(--green);color:#000;border:none;border-radius:var(--rad-sm);padding:9px;font-size:12px;font-weight:600;cursor:pointer;width:100%;margin-top:14px">
        <span data-i="enableNotif">Enable Browser Notifications</span>
      </button>
      <div id="notifStatus" style="font-size:10px;color:var(--t3);text-align:center;margin-top:6px"></div>
    </div>
  </div>
</div>

<!-- Ticker Bar -->
<?php
// SEO: 페이지의 대표 제목(h1). 대시보드는 숫자·라벨 위주라 h1이 없으면 구글이 주제를
// 파악하기 어렵다. 티커바 위에 현재 언어로 h1을 노출(JS data-i로 언어 즉시 전환됨).
$__seoH1 = [
  'ko' => '비트코인·알트코인 실시간 매수·매도 타이밍 점수',
  'en' => 'Real-Time Bitcoin & Altcoin Buy/Sell Timing Score',
  'ja' => 'ビットコイン・アルトコインのリアルタイム売買タイミングスコア',
  'es' => 'Puntuación de Timing de Compra/Venta de Bitcoin y Altcoins en Tiempo Real',
  'de' => 'Echtzeit-Kauf-/Verkaufs-Timing-Score für Bitcoin & Altcoins',
  'fr' => 'Score de Timing d\'Achat/Vente Bitcoin & Altcoins en Temps Réel',
  'pt' => 'Pontuação de Timing de Compra/Venda de Bitcoin e Altcoins em Tempo Real',
  'tr' => 'Gerçek Zamanlı Bitcoin ve Altcoin Alım/Satım Zamanlama Skoru',
  'vi' => 'Điểm Thời Điểm Mua/Bán Bitcoin & Altcoin Theo Thời Gian Thực',
];
$__seoSub = [
  'ko' => '온체인 지표를 종합한 0~10점 타이밍 신호를 무료로 실시간 확인하세요.',
  'en' => 'A free real-time 0–10 timing signal combining on-chain indicators.',
  'ja' => 'オンチェーン指標を統合した0〜10のタイミングシグナルを無料でリアルタイム表示。',
  'es' => 'Una señal de timing de 0 a 10 en tiempo real que combina indicadores on-chain, gratis.',
  'de' => 'Ein kostenloses Echtzeit-Timing-Signal von 0–10, das On-Chain-Indikatoren kombiniert.',
  'fr' => 'Un signal de timing de 0 à 10 en temps réel combinant des indicateurs on-chain, gratuit.',
  'pt' => 'Um sinal de timing de 0 a 10 em tempo real combinando indicadores on-chain, grátis.',
  'tr' => 'Zincir üstü göstergeleri birleştiren, ücretsiz ve gerçek zamanlı 0–10 zamanlama sinyali.',
  'vi' => 'Tín hiệu thời điểm 0–10 theo thời gian thực, kết hợp các chỉ báo on-chain, miễn phí.',
];
?>
<div id="tickerBar" class="ticker-bar" style="background:#0a0a0a;border-bottom:1px solid var(--b1)">
  <div class="ticker-scroll" style="max-width:1280px;margin:0 auto;padding:6px 16px;
    font-size:11px;color:var(--t2);display:flex;align-items:center;gap:20px;overflow-x:auto;white-space:nowrap;-webkit-overflow-scrolling:touch">
    <span id="tkFiatItem1"><span id="tkFiatLabel1">USD/KRW</span> <b id="tkUsdKrw" style="color:var(--t1)">—</b> <span id="tkUsdKrwChg"></span></span>
    <span><span id="tkFiatLabel2">USDT/KRW</span> <b id="tkUsdtKrw" style="color:var(--t1)">—</b> <span id="tkUsdtKrwChg"></span></span>
    <span><span data-i="tkDomLabel">BTC Dominance</span> <b id="tkDom" style="color:var(--t1)">—</b> <span id="tkDomChg"></span></span>
    <span><span data-i="tkMcapLabel">Market Cap</span> <b id="tkMcap" style="color:var(--t1)">—</b></span>
    <span><span data-i="tkVolLabel">24h Volume</span> <b id="tkVol" style="color:var(--t1)">—</b></span>
    <h1 class="ticker-h1" data-i="seoH1" style="margin-left:auto;flex-shrink:0;font-size:11px;font-weight:600;color:var(--t3);letter-spacing:0;line-height:1"><?= h($__seoH1[$lang] ?? $__seoH1['en']) ?></h1>
  </div>
</div>

<!-- Nav -->
<nav>
<div class="nav-inner">
  <div class="logo" onclick="goHome()" title="BTCtiming.com — Home" role="button" tabindex="0"
    onkeydown="if(event.key==='Enter')goHome()">BTC<span>timing</span></div>
  <!-- PC: 탭, 모바일: 드롭박스 -->
  <div class="coin-tabs" id="coinTabs"></div>
  <select id="coinDrop" onchange="switchCoin(this.value)" aria-label="Select coin"
    style="display:none;background:var(--bg3);border:1px solid var(--b2);color:var(--t1);
    padding:5px 8px;border-radius:var(--rad-sm);font-size:13px;font-weight:600;cursor:pointer;flex-shrink:0;width:68px">
  </select>
  <div class="nav-r">
    <div id="liveTag"><div class="live-dot"></div>LIVE</div>
    <a href="/blog/<?= h(langSuffix($lang)) ?>" class="nav-insight" id="navBlogLink" title="Blog">📖 <span data-i="navInsights">Blog</span></a>
    <a href="/glossary<?= h(langSuffix($lang)) ?>" class="nav-insight" id="navGlossaryLink" title="Glossary">📚 <span data-i="navGlossary">용어사전</span></a>
    <div class="icon-btn" id="settingsBtn" onclick="openSettings()" title="Settings" role="button" tabindex="0" aria-label="Settings" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openSettings();}">⚙️</div>
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
  <div style="max-width:1280px;margin:0 auto;padding:6px 16px;font-size:12px;color:var(--t2);
    display:flex;align-items:center;gap:0;overflow:hidden">
    <span id="blogTickerLabel" style="flex-shrink:0;white-space:nowrap;margin-right:10px;color:var(--t2);font-weight:600"></span>
    <div id="blogTickerScroll" style="flex:1;min-width:0;overflow-x:auto;white-space:nowrap;
      -webkit-overflow-scrolling:touch;touch-action:pan-x;scrollbar-width:none;position:relative">
      <span id="blogTickerLinks"></span>
      <div style="position:absolute;top:0;right:0;bottom:0;width:24px;pointer-events:none;
        background:linear-gradient(to right,transparent,#0a0a0a)"></div>
    </div>
    <a id="blogTickerAllLink" aria-label="View all blog posts" href="/blog/<?= h(langSuffix($lang)) ?>" style="flex-shrink:0;color:var(--orange);text-decoration:underline;
      margin-left:12px;padding-left:12px;border-left:1px solid var(--b1);white-space:nowrap"></a>
  </div>
</div>

<div class="page-wrap">
<?php
?>
<div class="layout">
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
        <div style="display:flex;align-items:center;justify-content:space-between;cursor:pointer" onclick="toggleSplitPlan()" role="button" tabindex="0" aria-label="Toggle split entry plan" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleSplitPlan();}">
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

    <!-- Exchange referral banner → 전용 비교 페이지로 이동 (data-i로 언어 즉시 전환) -->
    <a href="/exchanges.php<?= h(langSuffix($lang)) ?>" class="exch-banner" id="exchBanner">
      <span class="exch-banner-ic">🎁</span>
      <span class="exch-banner-tx">
        <b data-i="exchBannerT">Which exchange to start with?</b>
        <span data-i="exchBannerD">Compare Binance &amp; Bybit + fee discount</span>
      </span>
      <span class="exch-banner-ar">›</span>
    </a>

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
          <div class="hist-tab" onclick="setHistPeriod('1h')" id="htp1h" role="button" tabindex="0" aria-label="Show 1 hour">1h</div>
          <div class="hist-tab" onclick="setHistPeriod('4h')" id="htp4h" role="button" tabindex="0" aria-label="Show 4 hours">4h</div>
          <div class="hist-tab" onclick="setHistPeriod('6h')" id="htp6h" role="button" tabindex="0" aria-label="Show 6 hours">6h</div>
          <div class="hist-tab" onclick="setHistPeriod('12h')" id="htp12h" role="button" tabindex="0" aria-label="Show 12 hours">12h</div>
          <div class="hist-tab active" onclick="setHistPeriod('1d')" id="htp1d" role="button" tabindex="0" aria-label="Show 24 hours">24h</div>
          <div class="hist-tab" onclick="setHistPeriod('7d')" id="htp7d" role="button" tabindex="0" aria-label="Show 7 days">7d</div>
          <div class="hist-tab" onclick="setHistPeriod('30d')" id="htp30d" role="button" tabindex="0" aria-label="Show 30 days">30d</div>
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
        <span style="color:var(--t2)" data-i="bkTotalLabel">Total → /10</span>
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
      <span data-i="footerSources">Auto-fetched</span>: Price·200wMA·Futures Gap (Binance API) · Fear&Greed (Alternative.me) · Dominance (CoinGecko) · MVRV·Puell (MacroMicro) · NUPL·SOPR (Newhedge) · Coinbase Premium (Coinbase API)<br>
      <span data-i="footerDisclaimer2">On-chain scraping may use fallback values. Score history saved in browser localStorage. Not financial advice.</span><br><br>
      <div id="blogCategoryBar" style="display:flex;align-items:center;gap:0;max-width:100%;overflow:hidden">
        <span id="blogGuideLabel" style="color:var(--t2);font-size:12px;font-weight:600;flex-shrink:0;white-space:nowrap;margin-right:8px"></span>
        <div id="blogCategoryScroll" style="flex:1;min-width:0;overflow-x:auto;white-space:nowrap;scrollbar-width:none;-webkit-overflow-scrolling:touch">
          <span id="blogCategoryLinks"></span>
        </div>
        <a id="blogCategoryAllLink" aria-label="View all blog categories" href="/blog/" style="color:var(--orange);text-decoration:none;font-size:12px;white-space:nowrap;flex-shrink:0;margin-left:10px"></a>
      </div>
</footer>
</div><!-- /page-wrap -->

<script>
// 서버(PHP)가 생성해야 하는 설정값만 인라인 유지 — 나머지 로직은 /app.js로 분리됨
const CATEGORY_LIST = <?= json_encode(array_keys(require __DIR__ . '/blog/_category_meta.php')) ?>;
const LANG_META = <?= json_encode(array_map(fn($l) => ['code' => $l['code'], 'name' => $l['flag'] . ' ' . $l['name']], SUPPORTED_LANGS), JSON_UNESCAPED_UNICODE) ?>;
const SUPPORTED_LANG_CODES = <?= json_encode(array_keys(SUPPORTED_LANGS)) ?>;
window.BT_SUPPORTED_LANGS = SUPPORTED_LANG_CODES; // 공통 언어 유틸(lang-common.js)이 참조
window.BT_SERVER_LANG = <?= json_encode($lang) ?>; // 서버가 URL 기준으로 렌더한 언어(단일 진실)
</script>
<script>window.COINS_AUTO = <?= $__coinsJson ?>;</script>
<script src="/lang-common.js" defer></script>
<script src="/app.js" defer></script>
<script>
// 위젯 설정은 데스크톱 브라우저 전용. 모바일·앱에서는 설정 버튼은 유지하되(알람 필요)
// '위젯 탭'만 숨기고 알람 탭만 보이게 한다.
function btcIsMobileOrApp(){
  var mobile = /Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent);
  var standalone = (window.matchMedia && window.matchMedia('(display-mode: standalone)').matches) || navigator.standalone === true;
  var inApp = document.referrer && document.referrer.indexOf('android-app://') === 0;
  var narrow = window.innerWidth < 768;
  return mobile || standalone || inApp || narrow;
}
(function(){
  function apply(){
    var wtab = document.getElementById('stab_widget');
    var tabRow = wtab ? wtab.parentNode : null;
    if(btcIsMobileOrApp()){
      if(wtab) wtab.style.display = 'none';
      if(tabRow) tabRow.style.display = 'none';
    } else {
      if(wtab) wtab.style.display = '';
      if(tabRow) tabRow.style.display = '';
    }
  }
  if(document.readyState !== 'loading') apply();
  else document.addEventListener('DOMContentLoaded', apply);
  window.addEventListener('resize', apply);
  window._btcApplyTabVisibility = apply;
})();

// PWA: service worker 등록 (앱 설치 조건 충족)
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function(){
    navigator.serviceWorker.register('/sw.js').catch(function(){});
  });
}
// 앱 설치 프롬프트 캡처 (버튼 누를 때 사용)
let btcInstallPrompt = null;
window.addEventListener('beforeinstallprompt', function(e){
  e.preventDefault();
  btcInstallPrompt = e;
  // (위젯 설치 버튼 제거됨)
});
window.addEventListener('appinstalled', function(){ btcInstallPrompt = null; });
</script>
<script>
// ── 설정 모달 탭 전환 ────────────────────────────────
// 위젯만 별도 작은 창으로 띄우기 (홈페이지 전체가 아니라 위젯 페이지만)
function openWidgetWindow(){
  // pwa=1: 위젯이 전용 manifest로 로드 → 그 창의 브라우저 메뉴에서 "앱 설치" 시 위젯만 독립 앱으로 뜸
  const url = buildWidgetUrl() + '&pwa=1';
  const w = 340;
  const h = Math.min(widgetHeight() + 40, 640);
  const left = (screen.availWidth - w - 40);
  const top = 80;
  const features = 'popup=yes,width='+w+',height='+h+',left='+left+',top='+top+',resizable=yes,scrollbars=yes';
  const win = window.open(url, 'btctimingWidgetWindow', features);
  if(win){ win.focus(); }
  else { alert(getWidgetLang()==='ko' ? '팝업이 차단되었습니다. 팝업 허용 후 다시 시도해주세요.' : 'Popup blocked. Please allow popups and try again.'); }
}

function installBtcApp(){
  const url = buildWidgetUrl() + '&pwa=1';
  const isKo = getWidgetLang() === 'ko';
  window.open(url, '_blank');
  alert(isKo
    ? '새 탭에서 위젯 페이지가 열렸습니다.\n\n그 탭으로 이동해서 상단의 "💻 앱으로 설치" 버튼을 누르세요.\n그러면 이 위젯만 독립 앱 창으로 설치됩니다.\n\n(지금 이 홈 화면에서 설치하면 사이트 전체가 앱이 되니, 꼭 새로 열린 위젯 탭에서 설치하세요.)'
    : 'The widget page opened in a new tab.\n\nGo to that tab and click the "Install app" button at the top.\nThat installs ONLY the widget as a standalone app.');
}

function showInstallGuide(mode){
  const lang = getWidgetLang();
  const isKo = lang === 'ko';
  const ua = navigator.userAgent;
  const isEdge = /Edg/.test(ua), isChrome = /Chrome/.test(ua) && !isEdge;
  const isSafari = /Safari/.test(ua) && !/Chrome/.test(ua);
  let steps;
  if(mode === 'widget'){
    steps = isKo
      ? '<b>위젯이 새 탭에서 열렸습니다.</b><br><br>'
        + '그 탭에서 아래처럼 설치하면 <b>위젯만</b> 독립 앱 창으로 뜹니다 (홈페이지 전체가 아니라):<br><br>'
        + '1. 새로 열린 위젯 탭으로 이동<br>'
        + '2. 주소창 오른쪽의 <b>설치 아이콘(⊕)</b> 클릭<br>'
        + '&nbsp;&nbsp;&nbsp;(또는 <b>⋮ 메뉴 → 앱 → 이 페이지를 앱으로 설치</b>)<br>'
        + '3. 설치하면 바탕화면에 <b>BTC Widget</b> 아이콘 생성<br>'
        + '4. 클릭하면 위젯만 독립 창으로 실행 🎉'
      : '<b>The widget opened in a new tab.</b><br><br>'
        + 'Install it from that tab and <b>only the widget</b> runs as a standalone app (not the whole site):<br><br>'
        + '1. Go to the new widget tab<br>'
        + '2. Click the <b>install icon</b> in the address bar<br>'
        + '&nbsp;&nbsp;&nbsp;(or <b>menu -> Apps -> Install this page as an app</b>)<br>'
        + '3. A <b>BTC Widget</b> icon appears on your desktop<br>'
        + '4. Click it to run just the widget 🎉';
  } else if(mode === 'already'){
    steps = isKo ? '이미 앱으로 설치되어 실행 중입니다. ✓' : 'Already installed and running as an app. ✓';
  } else if(isChrome || isEdge){
    steps = isKo
      ? '<b>' + (isEdge?'Edge':'Chrome') + '에서 설치하기</b><br><br>'
        + '1. 주소창 오른쪽 끝의 <b>설치 아이콘(⊕ 또는 🖥️)</b>을 클릭<br>'
        + '&nbsp;&nbsp;&nbsp;(안 보이면 우측 상단 <b>⋮ 메뉴</b> → <b>"앱"</b> → <b>"이 사이트를 앱으로 설치"</b>)<br>'
        + '2. 팝업에서 <b>"설치"</b> 클릭<br>'
        + '3. 바탕화면·시작메뉴에 <b>BTCtiming 아이콘</b>이 생깁니다<br>'
        + '4. 클릭하면 독립 앱 창으로 실행됩니다 🎉'
      : '<b>Install on ' + (isEdge?'Edge':'Chrome') + '</b><br><br>'
        + '1. Click the <b>install icon (⊕ / 🖥️)</b> at the right of the address bar<br>'
        + '&nbsp;&nbsp;&nbsp;(or <b>⋮ menu</b> → <b>Apps</b> → <b>Install this site as an app</b>)<br>'
        + '2. Click <b>Install</b> in the popup<br>'
        + '3. A <b>BTCtiming icon</b> appears on your desktop<br>'
        + '4. Click it to run as a standalone app 🎉';
  } else if(isSafari){
    steps = isKo
      ? '<b>Safari에서는 앱 설치가 제한됩니다.</b><br><br>Chrome 또는 Edge 브라우저에서 이 페이지를 열면 데스크톱 앱으로 설치할 수 있습니다.'
      : '<b>Safari has limited install support.</b><br><br>Open this page in Chrome or Edge to install as a desktop app.';
  } else {
    steps = isKo
      ? 'Chrome 또는 Edge 브라우저의 메뉴에서 <b>"앱 설치"</b> 또는 <b>"홈 화면에 추가"</b>를 선택하세요.'
      : 'Use your browser menu → <b>Install app</b> / <b>Add to Home screen</b> (Chrome or Edge recommended).';
  }
  // 안내 오버레이
  let ov = document.getElementById('btcInstallGuide');
  if(ov) ov.remove();
  ov = document.createElement('div');
  ov.id = 'btcInstallGuide';
  ov.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:100000;display:flex;align-items:center;justify-content:center;padding:20px';
  ov.innerHTML = '<div style="background:#17171c;border:1px solid rgba(255,255,255,.14);border-radius:16px;max-width:400px;width:100%;padding:22px;color:#f0f0f2">'
    + '<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px">'
    + '<span style="font-size:15px;font-weight:700">💻 ' + (isKo?'앱으로 설치':'Install as app') + '</span>'
    + '<span onclick="document.getElementById(\'btcInstallGuide\').remove()" style="cursor:pointer;color:#9090a0;font-size:20px;line-height:1">×</span></div>'
    + '<div style="font-size:12.5px;line-height:1.9;color:#c8c8d0">' + steps + '</div>'
    + '<button onclick="document.getElementById(\'btcInstallGuide\').remove()" style="width:100%;margin-top:18px;background:#f7931a;color:#0a0a0a;border:none;border-radius:9px;padding:11px;font-size:13px;font-weight:700;cursor:pointer">' + (isKo?'확인':'Got it') + '</button>'
    + '</div>';
  ov.onclick = function(e){ if(e.target === ov) ov.remove(); };
  document.body.appendChild(ov);
}
function openSettings(){
  openModal();                 // app.js의 모달 열기
  if(window._btcApplyTabVisibility) window._btcApplyTabVisibility();
  // 모바일·앱: 위젯 탭 숨김 → 알람 탭 기본. 데스크톱: 위젯 탭 기본.
  switchTab(btcIsMobileOrApp() ? 'alert' : 'widget');
}
function switchTab(tab){
  document.getElementById('tab_widget').style.display = tab==='widget' ? '' : 'none';
  document.getElementById('tab_alert').style.display  = tab==='alert'  ? '' : 'none';
  // 탭 색상: 활성 = 오렌지 배경+검은 글씨, 비활성 = 회색 배경+밝은 글씨 (인라인 강제)
  const w = document.getElementById('stab_widget');
  const a = document.getElementById('stab_alert');
  if(tab==='widget'){
    w.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center';
    a.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,.14);background:#1e1e25;color:#f0f0f2;font-size:12.5px;cursor:pointer;font-weight:600;text-align:center';
  } else {
    a.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center';
    w.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,.14);background:#1e1e25;color:#f0f0f2;font-size:12.5px;cursor:pointer;font-weight:600;text-align:center';
  }
  if(tab==='widget') initWidgetTab();
}

// 검색 드롭다운 바깥 클릭 시 닫기
document.addEventListener('click', function(e){
  const search = document.getElementById('wgCoinSearch');
  const results = document.getElementById('wgSearchResults');
  if(!search || !results) return;
  if(e.target !== search && !results.contains(e.target)){
    results.style.display = 'none';
  }
});

// ── 위젯 탭 초기화 ────────────────────────────────────
// 전체 코인 목록 (config.php COIN_SYMBOLS와 동일, 검색 대상)
const WG_ALL_COINS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX','AVAX','LINK','DOT','POL','LTC','BCH','NEAR','UNI','APT','ICP','ATOM','XLM','ETC','FIL','HBAR','ARB','OP','VET','INJ','SUI','AAVE','GRT','ALGO','SEI','RUNE','S','TIA','IMX','RENDER','SKY','LDO','STX','THETA','SAND','AXS','MANA','FLOW','CHZ','GALA','PEPE','SHIB'];
let wgSelected = [];
let wgShowBlog = false;
let wgEnabled = true;
let wgInited = false;

const WG_I18N = {
  ko:{title:'위젯',desc:'플로팅 패널로 직접 쓰거나, 사이트에 임베드할 수 있습니다.',coins:'내 코인 (즐겨찾기)',ph:'🔍 코인 검색해서 추가 (ETH, SOL, PEPE…)',options:'옵션',blog:'최신 블로그 글 표시 (5개)',preview:'미리보기',pin:'화면에 위젯 고정',pinHint:'이 페이지 위에 작은 실시간 위젯을 띄웁니다 — 원하는 곳으로 드래그하세요.',code:'임베드 코드 (내 웹사이트용)',copy:'복사',install:'위젯을 앱으로 설치',installHint:'위젯만 독립 앱 창으로 추가합니다.',count:function(n){return n+' / 10개 · 코인을 탭하면 제거';}},
  en:{title:'Widget',desc:'Use it yourself as a floating panel, or embed it on your site.',coins:'My coins (favorites)',ph:'🔍 Search to add a coin (ETH, SOL, PEPE…)',options:'Options',blog:'Show latest blog posts (5)',preview:'Preview',pin:'Pin widget on screen',pinHint:'Keeps a small live widget floating on this page — drag it anywhere.',code:'Embed code (for your website)',copy:'Copy',install:'Install widget as an app',installHint:'Installs the widget as a standalone app window.',count:function(n){return n+' / 10 coins · tap a coin to remove';}},
  ja:{title:'ウィジェット',desc:'フローティングパネルとして使うか、サイトに埋め込めます。',coins:'マイコイン（お気に入り）',ph:'🔍 コインを検索して追加 (ETH, SOL, PEPE…)',options:'オプション',blog:'最新ブログ記事を表示 (5件)',preview:'プレビュー',pin:'画面に固定',pinHint:'このページ上に小さなライブウィジェットを表示します。ドラッグで移動できます。',code:'埋め込みコード（サイト用）',copy:'コピー',install:'ウィジェットをアプリ化',installHint:'ウィジェットを独立アプリ窓として追加します。',count:function(n){return n+' / 10 · タップで削除';}},
  es:{title:'Widget',desc:'Úsalo como panel flotante o incrústalo en tu sitio.',coins:'Mis monedas (favoritas)',ph:'🔍 Busca para añadir (ETH, SOL, PEPE…)',options:'Opciones',blog:'Mostrar últimas entradas (5)',preview:'Vista previa',pin:'Fijar widget en pantalla',pinHint:'Mantiene un widget flotante en esta página — arrástralo donde quieras.',code:'Código para incrustar',copy:'Copiar',install:'Instalar widget como app',installHint:'Instala el widget como ventana de app.',count:function(n){return n+' / 10 · toca para quitar';}},
  de:{title:'Widget',desc:'Nutze es als schwebendes Panel oder bette es auf deiner Seite ein.',coins:'Meine Coins (Favoriten)',ph:'🔍 Coin suchen zum Hinzufügen (ETH, SOL…)',options:'Optionen',blog:'Neueste Blogbeiträge zeigen (5)',preview:'Vorschau',pin:'Widget anheften',pinHint:'Hält ein kleines Live-Widget auf dieser Seite — beliebig ziehbar.',code:'Einbettungscode (für deine Website)',copy:'Kopieren',install:'Widget als App installieren',installHint:'Installiert das Widget als eigenes App-Fenster.',count:function(n){return n+' / 10 · zum Entfernen tippen';}},
  fr:{title:'Widget',desc:'Utilisez-le comme panneau flottant ou intégrez-le à votre site.',coins:'Mes cryptos (favoris)',ph:'🔍 Rechercher pour ajouter (ETH, SOL…)',options:'Options',blog:'Afficher les derniers articles (5)',preview:'Aperçu',pin:'Épingler le widget',pinHint:'Garde un petit widget flottant sur cette page — déplaçable à volonté.',code:"Code d'intégration (pour votre site)",copy:'Copier',install:'Installer le widget comme app',installHint:'Installe le widget comme fenêtre d\'app.',count:function(n){return n+' / 10 · touchez pour retirer';}},
  pt:{title:'Widget',desc:'Use como painel flutuante ou incorpore no seu site.',coins:'Minhas moedas (favoritas)',ph:'🔍 Busque para adicionar (ETH, SOL…)',options:'Opções',blog:'Mostrar últimos posts (5)',preview:'Prévia',pin:'Fixar widget na tela',pinHint:'Mantém um widget flutuante nesta página — arraste para qualquer lugar.',code:'Código de incorporação',copy:'Copiar',install:'Instalar widget como app',installHint:'Instala o widget como janela de app.',count:function(n){return n+' / 10 · toque para remover';}},
  tr:{title:'Widget',desc:'Yüzen panel olarak kullan veya sitene göm.',coins:'Coinlerim (favoriler)',ph:'🔍 Eklemek için ara (ETH, SOL…)',options:'Seçenekler',blog:'Son blog yazılarını göster (5)',preview:'Önizleme',pin:"Widget'ı ekrana sabitle",pinHint:'Bu sayfada küçük bir canlı widget tutar — istediğin yere sürükle.',code:'Yerleştirme kodu (siten için)',copy:'Kopyala',install:'Widget\'i uygulama olarak kur',installHint:'Widget\'ı bağımsız uygulama penceresi olarak kurar.',count:function(n){return n+' / 10 · kaldırmak için dokun';}},
  vi:{title:'Widget',desc:'Dùng như bảng nổi hoặc nhúng vào trang của bạn.',coins:'Coin của tôi (yêu thích)',ph:'🔍 Tìm để thêm coin (ETH, SOL…)',options:'Tùy chọn',blog:'Hiện bài blog mới nhất (5)',preview:'Xem trước',pin:'Ghim widget lên màn hình',pinHint:'Giữ một widget nhỏ nổi trên trang này — kéo đến bất cứ đâu.',code:'Mã nhúng (cho website của bạn)',copy:'Sao chép',install:'Cài widget như ứng dụng',installHint:'Cài widget như cửa sổ ứng dụng độc lập.',count:function(n){return n+' / 10 · chạm để xóa';}}
};
function applyWgI18n(){
  const L = WG_I18N[getWidgetLang()] || WG_I18N.en;
  const set=function(id,txt){var e=document.getElementById(id);if(e&&txt)e.textContent=txt;};
  set('wgTxt_title',L.title); set('wgTxt_desc',L.desc); set('wgTxt_coins',L.coins);
  set('wgTxt_options',L.options); set('wgTxt_blog',L.blog); set('wgTxt_preview',L.preview);
  set('wgTxt_pin',L.pin); set('wgTxt_pinHint',L.pinHint); set('wgTxt_code',L.code); set('wgTxt_copy',L.copy);
  set('wgTxt_install',L.install); set('wgTxt_installHint',L.installHint);
  var s=document.getElementById('wgCoinSearch'); if(s) s.placeholder=L.ph;
  var cnt=document.getElementById('wgSelCount'); if(cnt) cnt.textContent=L.count(wgSelected.length);
}

function initWidgetTab(){
  if(wgInited){ applyWgI18n(); buildCoinGrid(); updateWidgetPreview(); return; }
  wgInited = true;
  try { wgSelected = JSON.parse(localStorage.getItem('btc_wg_coins')||'["BTC","ETH","SOL","XRP","DOGE"]'); } catch(e){ wgSelected=['BTC','ETH','SOL','XRP','DOGE']; }
  try { wgShowBlog = localStorage.getItem('btc_wg_blog') === '1'; } catch(e){}
  try { wgEnabled = localStorage.getItem('btc_wg_enabled') !== '0'; } catch(e){}
  const blogToggle = document.getElementById('wgBlogToggle');
  if(blogToggle && wgShowBlog) blogToggle.classList.add('on');
  const enableToggle = document.getElementById('wgEnableToggle');
  if(enableToggle) enableToggle.classList.toggle('on', wgEnabled);
  applyWgEnabledUI();
  applyWgI18n();
  buildCoinGrid();
  updateWidgetPreview();
}

function toggleWgEnable(el){
  el.classList.toggle('on');
  wgEnabled = el.classList.contains('on');
  try { localStorage.setItem('btc_wg_enabled', wgEnabled ? '1' : '0'); } catch(e){}
  applyWgEnabledUI();
}

function applyWgEnabledUI(){
  const body = document.getElementById('wgBody');
  if(body){
    body.style.opacity = wgEnabled ? '1' : '0.4';
    body.style.pointerEvents = wgEnabled ? '' : 'none';
    body.style.filter = wgEnabled ? '' : 'grayscale(0.5)';
    body.style.transition = 'opacity .2s';
  }
}

// 코인 그리드 = 항상 즐겨찾기만 표시 (검색과 무관)
function buildCoinGrid(){
  const grid = document.getElementById('wgCoinGrid');
  if(!grid) return;
  grid.innerHTML = '';
  if(wgSelected.length === 0){
    grid.innerHTML = '<div style="font-size:10.5px;color:var(--t3);padding:4px 0">No coins yet — search above to add.</div>';
  } else {
    wgSelected.forEach(c=>{
      const chip = document.createElement('button');
      chip.className = 'wg-coin-chip on';
      chip.innerHTML = c + ' <span style="opacity:.6;margin-left:2px">×</span>';
      chip.title = 'Remove ' + c;
      chip.onclick = ()=>{ removeWgCoin(c); };
      grid.appendChild(chip);
    });
  }
  const countEl = document.getElementById('wgSelCount');
  if(countEl){ const L=WG_I18N[getWidgetLang()]||WG_I18N.en; countEl.textContent = L.count(wgSelected.length); }
}

// 검색은 드롭다운으로 (즐겨찾기에 없는 코인만 후보로) — 그리드는 안 건드림
function filterWgCoins(val){
  const box = document.getElementById('wgSearchResults');
  if(!box) return;
  const q = (val||'').toUpperCase().trim();
  let matches;
  if(!q){
    // 검색어 없을 때: 아직 추가 안 한 인기 코인 추천
    const popular = ['BTC','ETH','SOL','XRP','DOGE','ADA','BNB','AVAX','LINK','DOT','TRX','MATIC','LTC','SHIB','PEPE'];
    matches = popular.filter(c => WG_ALL_COINS.includes(c) && !wgSelected.includes(c)).slice(0, 8);
  } else {
    matches = WG_ALL_COINS.filter(c => c.includes(q) && !wgSelected.includes(c)).slice(0, 8);
  }
  if(!matches.length){
    box.innerHTML = '<div style="padding:8px 11px;font-size:11px;color:var(--t3)">' + (q ? 'No match, or already added.' : 'All popular coins added.') + '</div>';
    box.style.display='block';
    return;
  }
  box.innerHTML = matches.map(c =>
    '<div onclick="addWgCoin(\''+c+'\')" style="padding:8px 11px;font-size:12px;color:var(--t1);cursor:pointer;border-bottom:1px solid var(--b1)" onmouseover="this.style.background=\'var(--bg3)\'" onmouseout="this.style.background=\'\'">'
    + '<span style="font-weight:700">'+c+'</span> <span style="color:var(--or);font-size:10px;margin-left:4px">+ add</span></div>'
  ).join('');
  box.style.display='block';
}

function addWgCoin(coin){
  if(wgSelected.includes(coin)) return;
  if(wgSelected.length >= 10) { alert('Max 10 coins'); return; }
  wgSelected.push(coin);
  try { localStorage.setItem('btc_wg_coins', JSON.stringify(wgSelected)); } catch(e){}
  const search = document.getElementById('wgCoinSearch');
  if(search){ search.value=''; }
  document.getElementById('wgSearchResults').style.display='none';
  buildCoinGrid();
  updateWidgetPreview();
  syncFloatingWidget();
}

function removeWgCoin(coin){
  if(wgSelected.length <= 1) return; // 최소 1개
  wgSelected = wgSelected.filter(c => c !== coin);
  try { localStorage.setItem('btc_wg_coins', JSON.stringify(wgSelected)); } catch(e){}
  buildCoinGrid();
  updateWidgetPreview();
  syncFloatingWidget();
}

function toggleWgBlog(el){
  el.classList.toggle('on');
  wgShowBlog = el.classList.contains('on');
  try { localStorage.setItem('btc_wg_blog', wgShowBlog ? '1' : '0'); } catch(e){}
  updateWidgetPreview();
  syncFloatingWidget();
}

function getWidgetLang(){
  // 홈 대시보드가 "실제로 표시 중인" 언어를 최우선으로 따라감.
  const valid = ['ko','en','ja','es','de','fr','pt','tr','vi'];
  if(typeof currentLang !== 'undefined' && currentLang && valid.includes(currentLang)) return currentLang;
  const hl = document.documentElement.getAttribute('lang');
  if(hl && valid.includes(hl)) return hl;
  try { if(window.BTLang && BTLang.get){ const l = BTLang.get(); if(l && valid.includes(l)) return l; } } catch(e){}
  return 'ko';
}
function buildWidgetUrl(){
  const coins = wgSelected.join(',');
  const lang  = getWidgetLang();
  const blog  = wgShowBlog ? '&blog=1' : '';
  return 'https://btctiming.com/widget.php?coins=' + encodeURIComponent(coins) + '&lang=' + lang + blog;
}

function widgetHeight(){
  const rowH = 38, headH = 38, footH = 28, tabH = wgShowBlog ? 34 : 0;
  return Math.min(headH + tabH + Math.max(wgSelected.length,1) * rowH + footH, 340);
}

function updateWidgetPreview(){
  const src = buildWidgetUrl();
  const h = widgetHeight();
  const frame = document.getElementById('wgPreviewFrame');
  if(frame){
    frame.src = src;
    frame.style.height = h + 'px';
    if(window._btcPreviewPoll) clearInterval(window._btcPreviewPoll);
    function fitPreview(){
      try{
        const doc = frame.contentDocument || frame.contentWindow.document;
        if(!doc || !doc.body) return;
        const ih = Math.min(doc.body.scrollHeight, 400);
        if(Math.abs(parseInt(frame.style.height) - ih) > 2) frame.style.height = ih + 'px';
      }catch(e){}
    }
    window._btcPreviewPoll = setInterval(fitPreview, 250);
    frame.addEventListener('load', fitPreview);
  }
  const code = '<iframe src="' + src + '" width="320" height="' + h + '" frameborder="0" scrolling="no" style="border-radius:12px"></iframe>';
  const box = document.getElementById('wgCodeBox');
  if(box) box.value = code;
}

// ── 플로팅 위젯: 현재 페이지 위에 드래그 가능한 패널로 상주 ──
// (브라우저 확장프로그램처럼 화면 위에 항상 떠있는 경험. 별도 창/앱 설치 불필요.)
// 플로팅 위젯은 _shared_footer.php 공통 코드(btcLaunchFloating)가 전 페이지에서 처리.
// 대시보드에서 코인/블로그 설정을 바꾸면 떠있는 플로팅을 새 설정으로 갱신.
function syncFloatingWidget(){
  var fw=document.getElementById('btcFloatWidget');
  if(!fw) return;
  var iframe=document.getElementById('btcFloatFrame');
  if(iframe) iframe.src = buildWidgetUrl();
}

function copyWidgetCode(){
  const box = document.getElementById('wgCodeBox');
  if(!box) return;
  navigator.clipboard.writeText(box.value).then(()=>{
    const btn = document.getElementById('wgCopyBtn');
    const orig = btn.innerHTML;
    btn.textContent = '✓ Copied!';
    btn.style.background = 'var(--green)'; btn.style.color = '#000';
    setTimeout(()=>{ btn.innerHTML=orig; btn.style.background=''; btn.style.color=''; }, 2000);
  }).catch(()=>{ box.select(); document.execCommand('copy'); });
}
</script>

<!-- ═══════════════════════════════════════════════════════ -->
<!-- LIVE CHAT WIDGET -->
<!-- ═══════════════════════════════════════════════════════ -->
<div id="chatToggle" onclick="toggleChat()" role="button" tabindex="0" aria-label="Open chat" style="position:fixed;bottom:20px;right:20px;width:46px;height:46px;
  border-radius:50%;background:var(--orange);display:flex;align-items:center;justify-content:center;
  cursor:pointer;z-index:500;box-shadow:0 4px 16px rgba(0,0,0,.4);font-size:20px;transition:transform .2s">
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
      <div id="chatNickBtn" onclick="promptNickname()" title="닉네임 변경" role="button" tabindex="0" aria-label="Change nickname" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();promptNickname();}" style="cursor:pointer;color:var(--t3);font-size:13px">⚙️</div>
      <div onclick="toggleChat()" role="button" tabindex="0" aria-label="Close chat" style="cursor:pointer;color:var(--t3);font-size:16px;padding:2px 4px">✕</div>
    </div>
  </div>
  <div id="chatMessages" style="flex:1;overflow-y:auto;padding:10px 12px;display:flex;flex-direction:column;gap:8px"></div>
  <div style="padding:8px 10px;border-top:1px solid var(--b1);display:flex;gap:6px">
    <input id="chatInput" type="text" placeholder="메시지 입력..." maxlength="200"
      style="flex:1;background:var(--bg4);border:1px solid var(--b2);color:var(--t1);
      padding:8px 10px;border-radius:8px;font-size:12px"
      onkeydown="if(event.key==='Enter')sendChatMsg()">
    <button id="chatSendBtn" onclick="sendChatMsg()" style="background:var(--orange);color:#000;border:none;
      padding:8px 14px;border-radius:8px;font-size:12px;font-weight:700;cursor:pointer">전송</button>
  </div>
</div>

<?php require __DIR__ . '/_shared_footer.php'; ?>

<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js" defer onerror="console.error('Firebase app SDK failed to load')"></script>
<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-database-compat.js" defer onerror="console.error('Firebase database SDK failed to load')"></script>
<!-- 우측 바깥 여백 광고 (화면이 넓고 광고가 있을 때만 노출, 승인 전엔 비어서 숨김) -->
<aside class="side-ad" aria-hidden="true"><!-- ad slot: 승인 후 채움 --></aside>
<!-- 모바일 하단 탭바 -->
<nav class="mobile-tabbar" id="mobileTabbar">
  <a class="mtab active" href="/<?= h($urlSuffix ?? '') ?>" data-tab="dashboard">
    <svg class="mtab-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 15l3-4 3 2 4-6"/></svg>
    <span class="mtab-tx" data-i="tab_dashboard">실시간 지표</span>
  </a>
  <button type="button" class="mtab" onclick="openCoinSwitcher()" data-tab="coins">
    <svg class="mtab-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9.5 10h4a1.5 1.5 0 0 1 0 3h-3.5a1.5 1.5 0 0 0 0 3h4"/></svg>
    <span class="mtab-tx" data-i="tab_coins">코인 검색</span>
  </button>
  <a class="mtab" href="/blog/<?= isset($urlSuffix) && $urlSuffix ? h($urlSuffix) : '' ?>" data-tab="blog">
    <svg class="mtab-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3h10l4 4v14H5z"/><path d="M14 3v5h5M8 13h8M8 17h6"/></svg>
    <span class="mtab-tx" data-i="tab_blog">블로그</span>
  </a>
</nav>
</body>
</html>
