<?php
// BTCtiming.com — 소개 / 편집정책 / 연락처 (About, .php, 공용 헤더/푸터 include)
header('Content-Type: text/html; charset=utf-8');
$baseUrl = 'https://btctiming.com';
$GUIDE_TITLE = 'BTCtiming.com 소개 · 편집정책 · 연락처';
$GUIDE_DESC = 'BTCtiming.com은 비트코인·알트코인의 온체인 지표를 종합해 매수·매도 타이밍 점수를 제공하는 분석 사이트입니다. 운영 주체, 편집 원칙, 데이터 출처, 연락처를 안내합니다.';
$GUIDE_CANONICAL = $baseUrl . '/about';
$GUIDE_EXTRA_CSS = <<<CSS
.wrap{max-width:760px;margin:0 auto;padding:48px 24px 100px}
h1{font-size:2rem;font-weight:800;line-height:1.25;margin-bottom:8px;color:#fafafa}
.meta{font-size:13px;color:var(--t3);margin-bottom:36px}
h2{font-size:1.3rem;font-weight:700;margin:36px 0 12px;color:#fafafa;padding-top:8px;border-top:1px solid var(--b1)}
h2:first-of-type{border-top:none;padding-top:0;margin-top:0}
p{margin-bottom:14px;color:#a1a1aa}
ul,ol{margin:0 0 14px 22px;color:#a1a1aa}
li{margin-bottom:8px}
strong{color:#e4e4e7}
a.inline{color:var(--orange);text-decoration:none}
a.inline:hover{text-decoration:underline}
.box{background:#1c1c1f;border-left:3px solid var(--orange);border-radius:6px;padding:16px 20px;margin:20px 0;color:#d4d4d8}
.box.warn{border-left-color:var(--red)}
.box b{color:#fafafa}
.contact-card{background:#111113;border:1px solid var(--b1);border-radius:10px;padding:20px 22px;margin:20px 0}
.contact-card b{display:block;color:#fafafa;font-size:14px;margin-bottom:8px}
.contact-card a{color:var(--orange);text-decoration:none;font-size:15px;font-weight:600}
.contact-card a:hover{text-decoration:underline}
.tocbox{background:#111113;border:1px solid var(--b1);border-radius:10px;padding:18px 22px;margin:24px 0 36px}
.tocbox b{display:block;color:#fafafa;font-size:13px;margin-bottom:10px}
.tocbox ol{margin:0 0 0 18px;color:#a1a1aa;font-size:13.5px}
.tocbox a{color:#a1a1aa;text-decoration:none}
.tocbox a:hover{color:var(--orange)}
CSS;
require __DIR__ . '/_guide_head.php';
?>

<div class="wrap">
<h1><span class="l-ko">BTCtiming.com 소개</span><span class="l-en">About BTCtiming.com</span><span class="l-ja">BTCtiming.com について</span><span class="l-es">Acerca de BTCtiming.com</span><span class="l-de">Über BTCtiming.com</span><span class="l-fr">À propos de BTCtiming.com</span><span class="l-pt">Sobre a BTCtiming.com</span><span class="l-tr">BTCtiming.com Hakkında</span><span class="l-vi">Giới thiệu BTCtiming.com</span></h1>
<div class="meta"><span class="l-ko">최종 수정일: 2026년 7월 8일</span><span class="l-en">Last updated: July 8, 2026</span><span class="l-ja">最終更新日: 2026年7月8日</span><span class="l-es">Última actualización: 8 de julio de 2026</span><span class="l-de">Zuletzt aktualisiert: 8. Juli 2026</span><span class="l-fr">Dernière mise à jour : 8 juillet 2026</span><span class="l-pt">Última atualização: 8 de julho de 2026</span><span class="l-tr">Son güncelleme: 8 Temmuz 2026</span><span class="l-vi">Cập nhật lần cuối: 8 tháng 7, 2026</span></div>

<div class="tocbox">
  <b class="l-ko">목차</b><b class="l-en">Contents</b><b class="l-ja">目次</b><b class="l-es">Índice</b><b class="l-de">Inhalt</b><b class="l-fr">Sommaire</b><b class="l-pt">Conteúdo</b><b class="l-tr">İçindekiler</b><b class="l-vi">Mục lục</b>
  <ol>
    <li><a href="#s1"><span class="l-ko">우리는 누구인가</span><span class="l-en">Who We Are</span><span class="l-ja">私たちについて</span><span class="l-es">Quiénes Somos</span><span class="l-de">Wer wir sind</span><span class="l-fr">Qui sommes-nous</span><span class="l-pt">Quem Somos</span><span class="l-tr">Biz Kimiz</span><span class="l-vi">Chúng tôi là ai</span></a></li>
    <li><a href="#s2"><span class="l-ko">무엇을 제공하는가</span><span class="l-en">What We Provide</span><span class="l-ja">提供するもの</span><span class="l-es">Qué Ofrecemos</span><span class="l-de">Was wir bieten</span><span class="l-fr">Ce que nous proposons</span><span class="l-pt">O que Oferecemos</span><span class="l-tr">Ne Sunuyoruz</span><span class="l-vi">Chúng tôi cung cấp gì</span></a></li>
    <li><a href="#s3"><span class="l-ko">편집·분석 원칙</span><span class="l-en">Editorial &amp; Analysis Principles</span><span class="l-ja">編集・分析方針</span><span class="l-es">Principios Editoriales y de Análisis</span><span class="l-de">Redaktions- und Analysegrundsätze</span><span class="l-fr">Principes éditoriaux et d'analyse</span><span class="l-pt">Princípios Editoriais e de Análise</span><span class="l-tr">Editoryal ve Analiz İlkeleri</span><span class="l-vi">Nguyên tắc biên tập &amp; phân tích</span></a></li>
    <li><a href="#s4"><span class="l-ko">데이터 출처</span><span class="l-en">Data Sources</span><span class="l-ja">データソース</span><span class="l-es">Fuentes de Datos</span><span class="l-de">Datenquellen</span><span class="l-fr">Sources de données</span><span class="l-pt">Fontes de Dados</span><span class="l-tr">Veri Kaynakları</span><span class="l-vi">Nguồn dữ liệu</span></a></li>
    <li><a href="#s5"><span class="l-ko">면책 고지</span><span class="l-en">Disclaimer</span><span class="l-ja">免責事項</span><span class="l-es">Aviso Legal</span><span class="l-de">Haftungsausschluss</span><span class="l-fr">Avertissement</span><span class="l-pt">Aviso Legal</span><span class="l-tr">Sorumluluk Reddi</span><span class="l-vi">Miễn trừ trách nhiệm</span></a></li>
    <li><a href="#s6"><span class="l-ko">운영 및 연락처</span><span class="l-en">Operator &amp; Contact</span><span class="l-ja">運営・連絡先</span><span class="l-es">Operador y Contacto</span><span class="l-de">Betreiber &amp; Kontakt</span><span class="l-fr">Exploitant et contact</span><span class="l-pt">Operador e Contato</span><span class="l-tr">İşletmeci ve İletişim</span><span class="l-vi">Người vận hành &amp; Liên hệ</span></a></li>
  </ol>
</div>

<h2 id="s1"><span class="l-ko">1. 우리는 누구인가</span><span class="l-en">1. Who We Are</span><span class="l-ja">1. 私たちについて</span><span class="l-es">1. Quiénes Somos</span><span class="l-de">1. Wer wir sind</span><span class="l-fr">1. Qui sommes-nous</span><span class="l-pt">1. Quem Somos</span><span class="l-tr">1. Biz Kimiz</span><span class="l-vi">1. Chúng tôi là ai</span></h2>
<p class="l-ko"><strong>BTCtiming.com</strong>은 비트코인과 주요 알트코인의 온체인 지표를 종합해 <strong>매수·매도 타이밍 점수</strong>를 제공하는 독립 분석 사이트입니다. 특정 거래소나 발행 재단, 투자 상품과 이해관계가 없는 개인 운영 프로젝트로, 온체인 데이터를 정량적으로 해석해 시장의 과열·저평가 구간을 판단하는 것을 목표로 합니다.</p>
<p class="l-en"><strong>BTCtiming.com</strong> is an independent analysis site that combines on-chain indicators for Bitcoin and major altcoins into a single <strong>buy/sell timing score</strong>. It is an individually operated project with no financial ties to any exchange, token foundation, or investment product, and it aims to interpret on-chain data quantitatively to identify overheated and undervalued phases in the market.</p>
<p class="l-ja"><strong>BTCtiming.com</strong> は、ビットコインおよび主要アルトコインのオンチェーン指標を統合し、<strong>売買タイミングスコア</strong>を提供する独立系分析サイトです。特定の取引所・発行財団・投資商品と利害関係を持たない個人運営プロジェクトであり、オンチェーンデータを定量的に解釈して市場の過熱・割安局面を判断することを目的としています。</p>
<p class="l-es"><strong>BTCtiming.com</strong> es un sitio de análisis independiente que combina indicadores on-chain de Bitcoin y las principales altcoins en una única <strong>puntuación de timing de compra/venta</strong>. Es un proyecto de operación individual sin vínculos financieros con ninguna casa de cambio, fundación de tokens o producto de inversión, y busca interpretar los datos on-chain de forma cuantitativa para identificar fases de sobrecalentamiento e infravaloración del mercado.</p>
<p class="l-de"><strong>BTCtiming.com</strong> ist eine unabhängige Analyseseite, die On-Chain-Indikatoren für Bitcoin und wichtige Altcoins zu einem einzigen <strong>Kauf-/Verkaufs-Timing-Score</strong> zusammenfasst. Es handelt sich um ein individuell betriebenes Projekt ohne finanzielle Verbindungen zu einer Börse, Token-Stiftung oder einem Anlageprodukt, das darauf abzielt, On-Chain-Daten quantitativ zu interpretieren, um überhitzte und unterbewertete Marktphasen zu erkennen.</p>
<p class="l-fr"><strong>BTCtiming.com</strong> est un site d'analyse indépendant qui combine les indicateurs on-chain du Bitcoin et des principales altcoins en un seul <strong>score de timing d'achat/vente</strong>. Il s'agit d'un projet exploité individuellement, sans lien financier avec une plateforme d'échange, une fondation de jetons ou un produit d'investissement, et qui vise à interpréter les données on-chain de manière quantitative afin d'identifier les phases de surchauffe et de sous-évaluation du marché.</p>
<p class="l-pt"><strong>BTCtiming.com</strong> é um site de análise independente que combina indicadores on-chain de Bitcoin e das principais altcoins em uma única <strong>pontuação de timing de compra/venda</strong>. É um projeto de operação individual, sem vínculos financeiros com qualquer corretora, fundação de tokens ou produto de investimento, e busca interpretar dados on-chain de forma quantitativa para identificar fases de sobreaquecimento e subvalorização do mercado.</p>
<p class="l-tr"><strong>BTCtiming.com</strong>, Bitcoin ve başlıca altcoin'lerin zincir üstü göstergelerini tek bir <strong>alım/satım zamanlama skorunda</strong> birleştiren bağımsız bir analiz sitesidir. Herhangi bir borsa, token vakfı veya yatırım ürünüyle finansal bağı olmayan, bireysel olarak işletilen bir projedir ve zincir üstü verileri niceliksel olarak yorumlayarak piyasanın aşırı ısınmış ve değerinin altında olduğu evreleri belirlemeyi amaçlar.</p>
<p class="l-vi"><strong>BTCtiming.com</strong> là một trang phân tích độc lập, kết hợp các chỉ báo on-chain của Bitcoin và các altcoin lớn thành một <strong>điểm thời điểm mua/bán</strong> duy nhất. Đây là dự án do cá nhân vận hành, không có liên hệ tài chính với bất kỳ sàn giao dịch, quỹ token hay sản phẩm đầu tư nào, và hướng tới việc diễn giải dữ liệu on-chain một cách định lượng để nhận diện các giai đoạn thị trường quá nóng và bị định giá thấp.</p>

<h2 id="s2"><span class="l-ko">2. 무엇을 제공하는가</span><span class="l-en">2. What We Provide</span><span class="l-ja">2. 提供するもの</span><span class="l-es">2. Qué Ofrecemos</span><span class="l-de">2. Was wir bieten</span><span class="l-fr">2. Ce que nous proposons</span><span class="l-pt">2. O que Oferecemos</span><span class="l-tr">2. Ne Sunuyoruz</span><span class="l-vi">2. Chúng tôi cung cấp gì</span></h2>
<p class="l-ko">핵심은 여러 온체인·기술 지표를 하나의 <strong>0~10점 타이밍 점수</strong>로 종합하는 것입니다. 비트코인은 MVRV Z-Score, NUPL, STH-SOPR, 코인베이스 프리미엄, 해시리본 등 완전한 온체인 데이터를 사용하고, 알트코인은 추정 밸류에이션 지표로 보완합니다. 점수와 함께 각 지표의 현재 상태, 분할 진입 가이드, 점수 히스토리를 제공하며, 블로그에서 지표 해설·시황 분석·주간 리포트를 함께 발행합니다.</p>
<p class="l-en">At its core, the site condenses multiple on-chain and technical indicators into a single <strong>0–10 timing score</strong>. Bitcoin uses full on-chain data such as MVRV Z-Score, NUPL, STH-SOPR, Coinbase Premium, and Hash Ribbon, while altcoins are supplemented with estimated valuation metrics. Alongside the score, we show the current state of each indicator, a split-entry guide, and score history, and our blog publishes indicator explainers, market analysis, and weekly reports.</p>
<p class="l-ja">中心となるのは、複数のオンチェーン・テクニカル指標を単一の<strong>0〜10のタイミングスコア</strong>に統合することです。ビットコインは MVRV Z-Score、NUPL、STH-SOPR、コインベースプレミアム、ハッシュリボンなどの完全なオンチェーンデータを使用し、アルトコインは推定バリュエーション指標で補完します。スコアとともに各指標の現在の状態、分割エントリーガイド、スコア履歴を提供し、ブログでは指標解説・市況分析・週次レポートを発行しています。</p>
<p class="l-es">En esencia, el sitio condensa múltiples indicadores on-chain y técnicos en una única <strong>puntuación de timing de 0 a 10</strong>. Bitcoin utiliza datos on-chain completos como MVRV Z-Score, NUPL, STH-SOPR, Coinbase Premium y Hash Ribbon, mientras que las altcoins se complementan con métricas de valoración estimadas. Junto con la puntuación, mostramos el estado actual de cada indicador, una guía de entrada escalonada y el historial de puntuaciones, y nuestro blog publica explicaciones de indicadores, análisis de mercado e informes semanales.</p>
<p class="l-de">Im Kern verdichtet die Seite mehrere On-Chain- und technische Indikatoren zu einem einzigen <strong>Timing-Score von 0 bis 10</strong>. Bitcoin nutzt vollständige On-Chain-Daten wie MVRV Z-Score, NUPL, STH-SOPR, Coinbase Premium und Hash Ribbon, während Altcoins durch geschätzte Bewertungskennzahlen ergänzt werden. Neben dem Score zeigen wir den aktuellen Stand jedes Indikators, einen Leitfaden für gestaffelte Einstiege und den Score-Verlauf; unser Blog veröffentlicht Indikator-Erklärungen, Marktanalysen und Wochenberichte.</p>
<p class="l-fr">Au cœur du site, plusieurs indicateurs on-chain et techniques sont condensés en un seul <strong>score de timing de 0 à 10</strong>. Le Bitcoin utilise des données on-chain complètes telles que le MVRV Z-Score, le NUPL, le STH-SOPR, la prime Coinbase et le Hash Ribbon, tandis que les altcoins sont complétées par des mesures de valorisation estimées. Outre le score, nous affichons l'état actuel de chaque indicateur, un guide d'entrée échelonnée et l'historique des scores ; notre blog publie des explications d'indicateurs, des analyses de marché et des rapports hebdomadaires.</p>
<p class="l-pt">Em essência, o site condensa múltiplos indicadores on-chain e técnicos em uma única <strong>pontuação de timing de 0 a 10</strong>. O Bitcoin usa dados on-chain completos como MVRV Z-Score, NUPL, STH-SOPR, Coinbase Premium e Hash Ribbon, enquanto as altcoins são complementadas com métricas de avaliação estimadas. Junto com a pontuação, mostramos o estado atual de cada indicador, um guia de entrada escalonada e o histórico de pontuações, e nosso blog publica explicações de indicadores, análises de mercado e relatórios semanais.</p>
<p class="l-tr">Sitenin özü, birden fazla zincir üstü ve teknik göstergeyi tek bir <strong>0–10 zamanlama skorunda</strong> yoğunlaştırmaktır. Bitcoin, MVRV Z-Score, NUPL, STH-SOPR, Coinbase Primi ve Hash Ribbon gibi tam zincir üstü verileri kullanırken, altcoin'ler tahmini değerleme ölçütleriyle desteklenir. Skorun yanı sıra her göstergenin mevcut durumunu, kademeli giriş kılavuzunu ve skor geçmişini sunuyoruz; blogumuz gösterge açıklamaları, piyasa analizleri ve haftalık raporlar yayınlıyor.</p>
<p class="l-vi">Cốt lõi của trang là cô đọng nhiều chỉ báo on-chain và kỹ thuật thành một <strong>điểm thời điểm từ 0 đến 10</strong>. Bitcoin sử dụng dữ liệu on-chain đầy đủ như MVRV Z-Score, NUPL, STH-SOPR, Coinbase Premium và Hash Ribbon, trong khi altcoin được bổ sung bằng các chỉ số định giá ước tính. Cùng với điểm số, chúng tôi hiển thị trạng thái hiện tại của từng chỉ báo, hướng dẫn vào lệnh chia nhỏ và lịch sử điểm; blog của chúng tôi đăng các bài giải thích chỉ báo, phân tích thị trường và báo cáo hàng tuần.</p>

<h2 id="s3"><span class="l-ko">3. 편집·분석 원칙</span><span class="l-en">3. Editorial &amp; Analysis Principles</span><span class="l-ja">3. 編集・分析方針</span><span class="l-es">3. Principios Editoriales y de Análisis</span><span class="l-de">3. Redaktions- und Analysegrundsätze</span><span class="l-fr">3. Principes éditoriaux et d'analyse</span><span class="l-pt">3. Princípios Editoriais e de Análise</span><span class="l-tr">3. Editoryal ve Analiz İlkeleri</span><span class="l-vi">3. Nguyên tắc biên tập &amp; phân tích</span></h2>
<ul class="l-ko">
  <li><strong>데이터 우선</strong> — 모든 점수와 판단은 공개된 온체인·시장 데이터에 근거하며, 계산 방식과 데이터 출처를 투명하게 밝힙니다.</li>
  <li><strong>과장 배제</strong> — 특정 코인의 매수를 부추기거나 가격을 단정적으로 예측하지 않습니다. 지표가 가리키는 확률적 상태를 설명할 뿐입니다.</li>
  <li><strong>이해관계 없음</strong> — 코인 발행처·거래소로부터 대가를 받고 특정 자산을 홍보하지 않습니다. 제휴 링크가 있는 경우 명확히 표시합니다.</li>
  <li><strong>정정</strong> — 오류가 확인되면 해당 글을 수정하고 수정 사실을 밝힙니다.</li>
</ul>
<ul class="l-en">
  <li><strong>Data first</strong> — Every score and judgment is grounded in public on-chain and market data, and we disclose our calculation method and data sources transparently.</li>
  <li><strong>No hype</strong> — We do not push the purchase of any specific coin or make categorical price predictions. We only describe the probabilistic state that the indicators point to.</li>
  <li><strong>No conflicts of interest</strong> — We do not promote specific assets in exchange for payment from token issuers or exchanges. Where affiliate links exist, they are clearly labeled.</li>
  <li><strong>Corrections</strong> — When an error is confirmed, we revise the article and note that a correction was made.</li>
</ul>
<ul class="l-ja">
  <li><strong>データ優先</strong> — すべてのスコアと判断は公開されたオンチェーン・市場データに基づき、計算方法とデータソースを透明に開示します。</li>
  <li><strong>誇張の排除</strong> — 特定コインの購入を煽ったり、価格を断定的に予測したりしません。指標が示す確率的な状態を説明するだけです。</li>
  <li><strong>利害関係なし</strong> — 発行元・取引所から対価を受け取って特定資産を宣伝することはありません。アフィリエイトリンクがある場合は明確に表示します。</li>
  <li><strong>訂正</strong> — 誤りが確認された場合は該当記事を修正し、訂正した旨を明記します。</li>
</ul>
<ul class="l-es">
  <li><strong>Los datos primero</strong> — Cada puntuación y juicio se basa en datos públicos on-chain y de mercado, y divulgamos nuestro método de cálculo y fuentes de datos de forma transparente.</li>
  <li><strong>Sin exageraciones</strong> — No impulsamos la compra de ninguna moneda específica ni hacemos predicciones categóricas de precios. Solo describimos el estado probabilístico que señalan los indicadores.</li>
  <li><strong>Sin conflictos de interés</strong> — No promocionamos activos específicos a cambio de pagos de emisores de tokens o casas de cambio. Cuando existen enlaces de afiliados, se identifican claramente.</li>
  <li><strong>Correcciones</strong> — Cuando se confirma un error, revisamos el artículo y señalamos que se realizó una corrección.</li>
</ul>
<ul class="l-de">
  <li><strong>Daten zuerst</strong> — Jeder Score und jede Einschätzung beruht auf öffentlichen On-Chain- und Marktdaten; unsere Berechnungsmethode und Datenquellen legen wir transparent offen.</li>
  <li><strong>Kein Hype</strong> — Wir drängen niemanden zum Kauf einer bestimmten Coin und treffen keine kategorischen Preisprognosen. Wir beschreiben lediglich den wahrscheinlichkeitsbasierten Zustand, auf den die Indikatoren hindeuten.</li>
  <li><strong>Keine Interessenkonflikte</strong> — Wir bewerben keine bestimmten Assets gegen Bezahlung durch Token-Emittenten oder Börsen. Sofern Affiliate-Links vorhanden sind, werden sie klar gekennzeichnet.</li>
  <li><strong>Korrekturen</strong> — Wird ein Fehler bestätigt, überarbeiten wir den Artikel und weisen auf die Korrektur hin.</li>
</ul>
<ul class="l-fr">
  <li><strong>Les données d'abord</strong> — Chaque score et jugement repose sur des données publiques on-chain et de marché, et nous divulguons notre méthode de calcul et nos sources de données de manière transparente.</li>
  <li><strong>Pas de battage</strong> — Nous n'incitons pas à l'achat d'une monnaie en particulier et ne faisons pas de prévisions de prix catégoriques. Nous décrivons seulement l'état probabiliste indiqué par les indicateurs.</li>
  <li><strong>Aucun conflit d'intérêts</strong> — Nous ne promouvons pas d'actifs spécifiques en échange d'un paiement d'émetteurs de jetons ou de plateformes d'échange. Lorsque des liens d'affiliation existent, ils sont clairement signalés.</li>
  <li><strong>Corrections</strong> — Lorsqu'une erreur est confirmée, nous révisons l'article et indiquons qu'une correction a été apportée.</li>
</ul>
<ul class="l-pt">
  <li><strong>Dados em primeiro lugar</strong> — Cada pontuação e julgamento baseia-se em dados públicos on-chain e de mercado, e divulgamos nosso método de cálculo e fontes de dados de forma transparente.</li>
  <li><strong>Sem sensacionalismo</strong> — Não incentivamos a compra de nenhuma moeda específica nem fazemos previsões categóricas de preço. Apenas descrevemos o estado probabilístico que os indicadores apontam.</li>
  <li><strong>Sem conflitos de interesse</strong> — Não promovemos ativos específicos mediante pagamento de emissores de tokens ou corretoras. Quando há links de afiliados, eles são claramente identificados.</li>
  <li><strong>Correções</strong> — Quando um erro é confirmado, revisamos o artigo e indicamos que uma correção foi feita.</li>
</ul>
<ul class="l-tr">
  <li><strong>Önce veri</strong> — Her skor ve değerlendirme kamuya açık zincir üstü ve piyasa verilerine dayanır; hesaplama yöntemimizi ve veri kaynaklarımızı şeffaf biçimde açıklarız.</li>
  <li><strong>Abartı yok</strong> — Belirli bir coin'in alımını teşvik etmez, kesin fiyat tahminleri yapmayız. Yalnızca göstergelerin işaret ettiği olasılıksal durumu açıklarız.</li>
  <li><strong>Çıkar çatışması yok</strong> — Token ihraççılarından veya borsalardan ödeme karşılığında belirli varlıkları tanıtmayız. Ortaklık bağlantıları varsa açıkça belirtilir.</li>
  <li><strong>Düzeltmeler</strong> — Bir hata doğrulandığında ilgili yazıyı düzeltir ve düzeltme yapıldığını belirtiriz.</li>
</ul>
<ul class="l-vi">
  <li><strong>Dữ liệu là trên hết</strong> — Mọi điểm số và đánh giá đều dựa trên dữ liệu on-chain và thị trường công khai, và chúng tôi công bố phương pháp tính cùng nguồn dữ liệu một cách minh bạch.</li>
  <li><strong>Không thổi phồng</strong> — Chúng tôi không thúc đẩy việc mua bất kỳ đồng coin cụ thể nào hay đưa ra dự đoán giá dứt khoát. Chúng tôi chỉ mô tả trạng thái xác suất mà các chỉ báo hướng tới.</li>
  <li><strong>Không xung đột lợi ích</strong> — Chúng tôi không quảng bá tài sản cụ thể để đổi lấy khoản thanh toán từ nhà phát hành token hay sàn giao dịch. Khi có liên kết tiếp thị, chúng được ghi rõ.</li>
  <li><strong>Đính chính</strong> — Khi xác nhận có lỗi, chúng tôi sửa bài viết và ghi chú rằng đã có đính chính.</li>
</ul>

<h2 id="s4"><span class="l-ko">4. 데이터 출처</span><span class="l-en">4. Data Sources</span><span class="l-ja">4. データソース</span><span class="l-es">4. Fuentes de Datos</span><span class="l-de">4. Datenquellen</span><span class="l-fr">4. Sources de données</span><span class="l-pt">4. Fontes de Dados</span><span class="l-tr">4. Veri Kaynakları</span><span class="l-vi">4. Nguồn dữ liệu</span></h2>
<p class="l-ko">가격·이동평균·선물 데이터는 바이낸스 API, 공포·탐욕 지수는 Alternative.me, 도미넌스·시가총액은 CoinGecko, 온체인 지표는 Glassnode·MacroMicro·Newhedge 등 공개 소스, 코인베이스 프리미엄은 코인베이스 API, 환율은 Upbit·exchangerate-api를 참조합니다. 일부 온체인 값은 스크래핑 실패 시 대체값을 사용할 수 있으며, 이 경우 화면에 안내합니다.</p>
<p class="l-en">Price, moving-average, and futures data come from the Binance API; the Fear &amp; Greed Index from Alternative.me; dominance and market cap from CoinGecko; on-chain indicators from public sources such as Glassnode, MacroMicro, and Newhedge; Coinbase Premium from the Coinbase API; and exchange rates from Upbit and exchangerate-api. Some on-chain values may fall back to substitute figures if scraping fails, in which case this is indicated on screen.</p>
<p class="l-ja">価格・移動平均・先物データは Binance API、恐怖・貪欲指数は Alternative.me、ドミナンス・時価総額は CoinGecko、オンチェーン指標は Glassnode・MacroMicro・Newhedge などの公開ソース、コインベースプレミアムは Coinbase API、為替レートは Upbit・exchangerate-api を参照します。一部のオンチェーン値はスクレイピングに失敗した場合に代替値を使用することがあり、その際は画面に表示します。</p>
<p class="l-es">Los datos de precio, media móvil y futuros provienen de la API de Binance; el Índice de Miedo y Codicia de Alternative.me; la dominancia y capitalización de mercado de CoinGecko; los indicadores on-chain de fuentes públicas como Glassnode, MacroMicro y Newhedge; el Coinbase Premium de la API de Coinbase; y los tipos de cambio de Upbit y exchangerate-api. Algunos valores on-chain pueden recurrir a cifras sustitutas si falla el scraping, en cuyo caso se indica en pantalla.</p>
<p class="l-de">Preis-, Gleitdurchschnitts- und Futures-Daten stammen von der Binance-API; der Fear-&amp;-Greed-Index von Alternative.me; Dominanz und Marktkapitalisierung von CoinGecko; On-Chain-Indikatoren aus öffentlichen Quellen wie Glassnode, MacroMicro und Newhedge; Coinbase Premium von der Coinbase-API; und Wechselkurse von Upbit und exchangerate-api. Einige On-Chain-Werte können auf Ersatzzahlen zurückgreifen, falls das Scraping fehlschlägt, was dann auf dem Bildschirm angezeigt wird.</p>
<p class="l-fr">Les données de prix, de moyenne mobile et de contrats à terme proviennent de l'API Binance ; l'indice Fear &amp; Greed d'Alternative.me ; la dominance et la capitalisation de CoinGecko ; les indicateurs on-chain de sources publiques telles que Glassnode, MacroMicro et Newhedge ; la prime Coinbase de l'API Coinbase ; et les taux de change d'Upbit et exchangerate-api. Certaines valeurs on-chain peuvent recourir à des chiffres de substitution en cas d'échec du scraping, ce qui est alors indiqué à l'écran.</p>
<p class="l-pt">Os dados de preço, média móvel e futuros vêm da API da Binance; o Índice de Medo e Ganância da Alternative.me; a dominância e capitalização de mercado da CoinGecko; os indicadores on-chain de fontes públicas como Glassnode, MacroMicro e Newhedge; o Coinbase Premium da API da Coinbase; e as taxas de câmbio da Upbit e da exchangerate-api. Alguns valores on-chain podem recorrer a números substitutos se o scraping falhar, caso em que isso é indicado na tela.</p>
<p class="l-tr">Fiyat, hareketli ortalama ve vadeli işlem verileri Binance API'sinden; Korku ve Açgözlülük Endeksi Alternative.me'den; hâkimiyet ve piyasa değeri CoinGecko'dan; zincir üstü göstergeler Glassnode, MacroMicro ve Newhedge gibi kamuya açık kaynaklardan; Coinbase Primi Coinbase API'sinden; döviz kurları ise Upbit ve exchangerate-api'den alınır. Bazı zincir üstü değerler, veri çekme başarısız olursa yedek değerlere başvurabilir; bu durumda ekranda belirtilir.</p>
<p class="l-vi">Dữ liệu giá, đường trung bình động và hợp đồng tương lai đến từ API Binance; Chỉ số Sợ hãi &amp; Tham lam từ Alternative.me; độ thống trị và vốn hóa từ CoinGecko; các chỉ báo on-chain từ nguồn công khai như Glassnode, MacroMicro và Newhedge; Coinbase Premium từ API Coinbase; và tỷ giá từ Upbit và exchangerate-api. Một số giá trị on-chain có thể dùng số thay thế nếu việc thu thập thất bại, và điều này được hiển thị trên màn hình.</p>

<h2 id="s5"><span class="l-ko">5. 면책 고지</span><span class="l-en">5. Disclaimer</span><span class="l-ja">5. 免責事項</span><span class="l-es">5. Aviso Legal</span><span class="l-de">5. Haftungsausschluss</span><span class="l-fr">5. Avertissement</span><span class="l-pt">5. Aviso Legal</span><span class="l-tr">5. Sorumluluk Reddi</span><span class="l-vi">5. Miễn trừ trách nhiệm</span></h2>
<div class="box warn">
<p class="l-ko"><b>본 사이트의 모든 정보는 참고용이며 투자 조언이 아닙니다.</b> 암호화폐 투자에는 원금 손실 위험이 따르며, 최종 투자 판단과 그 결과에 대한 책임은 전적으로 이용자 본인에게 있습니다. 타이밍 점수는 과거 데이터에 기반한 확률적 지표일 뿐 미래 수익을 보장하지 않습니다.</p>
<p class="l-en"><b>All information on this site is for reference only and is not investment advice.</b> Cryptocurrency investing carries the risk of losing your principal, and the final investment decision and its consequences rest entirely with you. The timing score is a probabilistic indicator based on historical data and does not guarantee future returns.</p>
<p class="l-ja"><b>本サイトのすべての情報は参考用であり、投資助言ではありません。</b> 暗号資産投資には元本損失のリスクが伴い、最終的な投資判断とその結果に対する責任はすべて利用者本人にあります。タイミングスコアは過去データに基づく確率的指標にすぎず、将来の収益を保証しません。</p>
<p class="l-es"><b>Toda la información de este sitio es solo de referencia y no constituye asesoramiento de inversión.</b> Invertir en criptomonedas conlleva el riesgo de perder su capital, y la decisión final de inversión y sus consecuencias recaen enteramente en usted. La puntuación de timing es un indicador probabilístico basado en datos históricos y no garantiza rendimientos futuros.</p>
<p class="l-de"><b>Alle Informationen auf dieser Seite dienen nur als Referenz und stellen keine Anlageberatung dar.</b> Kryptowährungsinvestitionen bergen das Risiko eines Kapitalverlusts, und die endgültige Anlageentscheidung sowie deren Folgen liegen vollständig bei Ihnen. Der Timing-Score ist ein wahrscheinlichkeitsbasierter Indikator auf Basis historischer Daten und garantiert keine zukünftigen Renditen.</p>
<p class="l-fr"><b>Toutes les informations de ce site sont fournies à titre indicatif et ne constituent pas des conseils en investissement.</b> Investir dans les cryptomonnaies comporte un risque de perte en capital, et la décision d'investissement finale ainsi que ses conséquences vous incombent entièrement. Le score de timing est un indicateur probabiliste fondé sur des données historiques et ne garantit pas les rendements futurs.</p>
<p class="l-pt"><b>Todas as informações deste site são apenas para referência e não constituem aconselhamento de investimento.</b> Investir em criptomoedas acarreta o risco de perda do capital, e a decisão final de investimento e suas consequências cabem inteiramente a você. A pontuação de timing é um indicador probabilístico baseado em dados históricos e não garante retornos futuros.</p>
<p class="l-tr"><b>Bu sitedeki tüm bilgiler yalnızca referans amaçlıdır ve yatırım tavsiyesi değildir.</b> Kripto para yatırımı ana para kaybı riski taşır; nihai yatırım kararı ve sonuçları tamamen size aittir. Zamanlama skoru, geçmiş verilere dayalı olasılıksal bir göstergedir ve gelecekteki getirileri garanti etmez.</p>
<p class="l-vi"><b>Mọi thông tin trên trang này chỉ để tham khảo và không phải lời khuyên đầu tư.</b> Đầu tư tiền mã hóa có rủi ro mất vốn, và quyết định đầu tư cuối cùng cùng hậu quả của nó hoàn toàn thuộc về bạn. Điểm thời điểm là chỉ báo xác suất dựa trên dữ liệu lịch sử và không đảm bảo lợi nhuận trong tương lai.</p>
</div>

<h2 id="s6"><span class="l-ko">6. 운영 및 연락처</span><span class="l-en">6. Operator &amp; Contact</span><span class="l-ja">6. 運営・連絡先</span><span class="l-es">6. Operador y Contacto</span><span class="l-de">6. Betreiber &amp; Kontakt</span><span class="l-fr">6. Exploitant et contact</span><span class="l-pt">6. Operador e Contato</span><span class="l-tr">6. İşletmeci ve İletişim</span><span class="l-vi">6. Người vận hành &amp; Liên hệ</span></h2>
<p class="l-ko">BTCtiming.com은 개인이 운영합니다. 제보·정정 요청·제휴 문의·기타 의견은 아래 이메일로 연락해 주세요. 확인 후 성실히 답변드리겠습니다.</p>
<p class="l-en">BTCtiming.com is operated by an individual. For tips, correction requests, partnership inquiries, or any other feedback, please reach us at the email below. We review every message and reply in good faith.</p>
<p class="l-ja">BTCtiming.com は個人が運営しています。情報提供・訂正依頼・提携のお問い合わせ・その他のご意見は、以下のメールアドレスまでご連絡ください。確認のうえ誠実に返信いたします。</p>
<p class="l-es">BTCtiming.com es operado por un particular. Para sugerencias, solicitudes de corrección, consultas de colaboración o cualquier otro comentario, contáctenos en el correo a continuación. Revisamos cada mensaje y respondemos de buena fe.</p>
<p class="l-de">BTCtiming.com wird von einer Privatperson betrieben. Für Hinweise, Korrekturanfragen, Kooperationsanfragen oder sonstiges Feedback erreichen Sie uns unter der folgenden E-Mail-Adresse. Wir prüfen jede Nachricht und antworten nach bestem Wissen.</p>
<p class="l-fr">BTCtiming.com est exploité par un particulier. Pour toute information, demande de correction, demande de partenariat ou autre retour, contactez-nous à l'e-mail ci-dessous. Nous examinons chaque message et répondons de bonne foi.</p>
<p class="l-pt">A BTCtiming.com é operada por um indivíduo. Para dicas, pedidos de correção, consultas de parceria ou qualquer outro feedback, contate-nos pelo e-mail abaixo. Analisamos cada mensagem e respondemos de boa-fé.</p>
<p class="l-tr">BTCtiming.com bir birey tarafından işletilmektedir. İhbar, düzeltme talebi, iş birliği sorusu veya diğer geri bildirimler için aşağıdaki e-postadan bize ulaşın. Her mesajı inceler ve iyi niyetle yanıtlarız.</p>
<p class="l-vi">BTCtiming.com do một cá nhân vận hành. Với thông tin, yêu cầu đính chính, câu hỏi hợp tác hay góp ý khác, vui lòng liên hệ chúng tôi qua email bên dưới. Chúng tôi xem xét mọi tin nhắn và phản hồi một cách thiện chí.</p>

<div class="contact-card">
  <b class="l-ko">이메일</b><b class="l-en">Email</b><b class="l-ja">メール</b><b class="l-es">Correo electrónico</b><b class="l-de">E-Mail</b><b class="l-fr">E-mail</b><b class="l-pt">E-mail</b><b class="l-tr">E-posta</b><b class="l-vi">Email</b>
  <a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a>
</div>
</div>

<?php require __DIR__ . '/_guide_foot.php';
