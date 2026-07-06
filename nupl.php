<?php $slug = 'nupl'; require __DIR__.'/_header.php'; ?>

  <p class="ko">가격 차트만 봐서는 시장이 지금 공포에 빠졌는지, 탐욕에 취했는지 알 수 없습니다. 하지만 블록체인에는 모든 투자자가 코인을 <strong>얼마에 샀는지</strong>가 기록돼 있습니다. <strong>NUPL(Net Unrealized Profit/Loss, 순 미실현 손익)</strong>은 이 데이터를 이용해 시장 전체가 지금 이익 상태인지 손실 상태인지를 하나의 숫자로 압축한 온체인 심리 지표입니다. 지난 세 번의 사이클에서 바닥과 천장을 모두 짚어낸, 가장 신뢰받는 심리 지표 중 하나입니다.</p>
  <p class="en">A price chart alone can't tell you whether the market is gripped by fear or drunk on greed. But the blockchain records <strong>what price every investor paid</strong> for their coins. <strong>NUPL (Net Unrealized Profit/Loss)</strong> uses this data to compress the entire market's profit-or-loss state into a single number. It is one of the most trusted sentiment indicators, having marked both the bottom and the top across the last three cycles.</p>
  <p class="ja">価格チャートだけでは、市場が今、恐怖に陥っているのか強欲に酔っているのか分かりません。しかしブロックチェーンには、すべての投資家がコインを<strong>いくらで買ったか</strong>が記録されています。<strong>NUPL(Net Unrealized Profit/Loss、純未実現損益)</strong>は、このデータを使って市場全体が今、含み益状態か含み損状態かを一つの数値に凝縮したオンチェーン心理指標です。過去3回のサイクルで底値と天井の両方を捉えた、最も信頼される心理指標の一つです。</p>

  <p class="es">Un gráfico de precios por sí solo no revela si el mercado está dominado por el miedo o embriagado de codicia. Pero la blockchain registra <strong>a qué precio compró cada inversor</strong> sus monedas. El <strong>NUPL (Net Unrealized Profit/Loss)</strong> usa estos datos para comprimir el estado de ganancia o pérdida de todo el mercado en un solo número. Es uno de los indicadores de sentimiento más fiables, habiendo marcado tanto el suelo como el techo en los últimos tres ciclos.</p>
  <p class="de">Ein Preischart allein verrät nicht, ob der Markt von Angst ergriffen oder von Gier berauscht ist. Doch die Blockchain zeichnet auf, <strong>zu welchem Preis jeder Investor</strong> seine Coins gekauft hat. Der <strong>NUPL (Net Unrealized Profit/Loss)</strong> nutzt diese Daten, um den Gewinn- oder Verlustzustand des gesamten Marktes in einer einzigen Zahl zu verdichten. Er ist einer der vertrauenswürdigsten Stimmungsindikatoren und markierte in den letzten drei Zyklen sowohl den Boden als auch das Top.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> NUPL = (시가총액 − 실현가치) ÷ 시가총액. 0 이하이면 시장 전체가 손실 상태(항복·바닥 신호), 0.5를 넘으면 탐욕, 0.75 이상이면 도취(고점 경계)입니다. 2018년·2022년 바닥은 모두 0 부근 이하, 2017년·2021년 천장은 0.75 안팎이었습니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> NUPL = (Market Cap − Realized Cap) ÷ Market Cap. Below 0 means the whole market is underwater (capitulation/bottom signal); above 0.5 is greed; above 0.75 is euphoria (top warning). The 2018 and 2022 bottoms sat near or below 0; the 2017 and 2021 tops hovered around 0.75.</div>
  <div class="box ja">💡 <strong>要点:</strong> NUPL =(時価総額 − 実現時価総額)÷ 時価総額。0以下なら市場全体が含み損(投げ売り・底値シグナル)、0.5超で強欲、0.75以上で陶酔(天井警戒)。2018年・2022年の底はいずれも0付近以下、2017年・2021年の天井は0.75前後でした。</div>

  <div class="box es">💡 <strong>Resumen clave:</strong> NUPL = (Cap. de Mercado − Cap. Realizada) ÷ Cap. de Mercado. Por debajo de 0 el mercado está en pérdida (señal de suelo); por encima de 0.5 es codicia; por encima de 0.75 es euforia (aviso de techo). Los suelos de 2018 y 2022 estuvieron cerca o bajo 0; los techos de 2017 y 2021 rondaron 0.75.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> NUPL = (Marktkap. − Realisierte Kap.) ÷ Marktkap. Unter 0 ist der Markt im Verlust (Boden-Signal); über 0,5 ist Gier; über 0,75 ist Euphorie (Top-Warnung). Die Tiefs 2018 und 2022 lagen nahe oder unter 0; die Tops 2017 und 2021 pendelten um 0,75.</div>

  <h2 class="ko">구간별로 시각화하면</h2>
  <h2 class="en">Visualized by zone</h2>
  <h2 class="ja">区間を可視化すると</h2>
  <h2 class="es">Visualizado por zona</h2>
  <h2 class="de">Nach Zonen visualisiert</h2>

  <div class="ko">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">NUPL 심리 단계 게이지</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="110" height="30" fill="#22c55e" rx="4"/>
      <text x="95" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0</text>
      <rect x="150" y="60" width="120" height="30" fill="#4ade80" rx="4"/>
      <text x="210" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0 ~ 0.25</text>
      <rect x="270" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="335" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.25 ~ 0.5</text>
      <rect x="400" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="465" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.5 ~ 0.75</text>
      <rect x="530" y="60" width="130" height="30" fill="#dc2626" rx="4"/>
      <text x="595" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 0.75</text>

      <text x="95" y="110" fill="#71717a" font-size="9" text-anchor="middle">항복</text>
      <text x="210" y="110" fill="#71717a" font-size="9" text-anchor="middle">희망·공포</text>
      <text x="335" y="110" fill="#71717a" font-size="9" text-anchor="middle">낙관·안도</text>
      <text x="465" y="110" fill="#71717a" font-size="9" text-anchor="middle">탐욕</text>
      <text x="595" y="110" fill="#71717a" font-size="9" text-anchor="middle">도취</text>

      <circle cx="110" cy="45" r="4" fill="#fff"/>
      <text x="110" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018 (≈0)</text>
      <circle cx="95" cy="45" r="4" fill="#fff"/>
      <text x="95" y="145" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2022 (−0.1)</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 (≈0.75)</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">NUPL Sentiment Gauge</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="110" height="30" fill="#22c55e" rx="4"/>
      <text x="95" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0</text>
      <rect x="150" y="60" width="120" height="30" fill="#4ade80" rx="4"/>
      <text x="210" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0 ~ 0.25</text>
      <rect x="270" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="335" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.25 ~ 0.5</text>
      <rect x="400" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="465" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.5 ~ 0.75</text>
      <rect x="530" y="60" width="130" height="30" fill="#dc2626" rx="4"/>
      <text x="595" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 0.75</text>

      <text x="95" y="110" fill="#71717a" font-size="9" text-anchor="middle">Capitulation</text>
      <text x="210" y="110" fill="#71717a" font-size="9" text-anchor="middle">Hope/Fear</text>
      <text x="335" y="110" fill="#71717a" font-size="9" text-anchor="middle">Optimism</text>
      <text x="465" y="110" fill="#71717a" font-size="9" text-anchor="middle">Greed</text>
      <text x="595" y="110" fill="#71717a" font-size="9" text-anchor="middle">Euphoria</text>

      <circle cx="110" cy="45" r="4" fill="#fff"/>
      <text x="110" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018 (≈0)</text>
      <circle cx="95" cy="45" r="4" fill="#fff"/>
      <text x="95" y="145" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2022 (−0.1)</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 (≈0.75)</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">NUPL 心理段階ゲージ</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="110" height="30" fill="#22c55e" rx="4"/>
      <text x="95" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0</text>
      <rect x="150" y="60" width="120" height="30" fill="#4ade80" rx="4"/>
      <text x="210" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0 ~ 0.25</text>
      <rect x="270" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="335" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.25 ~ 0.5</text>
      <rect x="400" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="465" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.5 ~ 0.75</text>
      <rect x="530" y="60" width="130" height="30" fill="#dc2626" rx="4"/>
      <text x="595" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 0.75</text>

      <text x="95" y="110" fill="#71717a" font-size="9" text-anchor="middle">投げ売り</text>
      <text x="210" y="110" fill="#71717a" font-size="9" text-anchor="middle">希望・恐怖</text>
      <text x="335" y="110" fill="#71717a" font-size="9" text-anchor="middle">楽観・安心</text>
      <text x="465" y="110" fill="#71717a" font-size="9" text-anchor="middle">強欲</text>
      <text x="595" y="110" fill="#71717a" font-size="9" text-anchor="middle">陶酔</text>

      <circle cx="110" cy="45" r="4" fill="#fff"/>
      <text x="110" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018 (≈0)</text>
      <circle cx="95" cy="45" r="4" fill="#fff"/>
      <text x="95" y="145" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2022 (−0.1)</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 (≈0.75)</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">NUPL이란 무엇인가?</h2>
  <h2 class="en">What Is NUPL?</h2>
  <h2 class="ja">NUPLとは何か?</h2>
  <h2 class="es">¿Qué es NUPL?</h2>
  <h2 class="de">Was ist NUPL?</h2>

  <p class="ko">NUPL을 이해하려면 세 가지 개념을 순서대로 알아야 합니다. 각각을 뜯어보겠습니다.</p>
  <p class="en">To understand NUPL, you need three concepts in sequence. Let's break each down.</p>
  <p class="ja">NUPLを理解するには、3つの概念を順に知る必要があります。それぞれを分解してみましょう。</p>
  <p class="es">Para entender NUPL, necesitas tres conceptos en secuencia. Desglosemos cada uno.</p>
  <p class="de">Um NUPL zu verstehen, braucht man drei Konzepte nacheinander. Zerlegen wir jedes.</p>

  <h3 class="ko">1. 시장가치 (Market Cap)</h3>
  <h3 class="en">1. Market Value (Market Cap)</h3>
  <h3 class="ja">1. 時価総額 (Market Cap)</h3>
  <h3 class="es">1. Valor de Mercado (Market Cap)</h3>
  <h3 class="de">1. Marktwert (Market Cap)</h3>

  <p class="ko">현재 코인 가격 × 유통량입니다. 우리가 흔히 말하는 "시가총액"으로, 지금 이 순간의 시장 평가액을 뜻합니다. 예를 들어 비트코인이 6만 달러이고 1,960만 개가 유통 중이면 시장가치는 약 1.18조 달러입니다.</p>
  <p class="en">Current coin price × circulating supply. This is the familiar "market cap" — the market's valuation at this moment. If Bitcoin is $60,000 with 19.6M coins circulating, market value is about $1.18 trillion.</p>
  <p class="ja">現在のコイン価格 × 流通量です。よく言う「時価総額」で、今この瞬間の市場評価額を意味します。例えばビットコインが6万ドルで1,960万枚が流通していれば、時価総額は約1.18兆ドルです。</p>
  <p class="es">Precio actual × suministro circulante. Es la conocida "capitalización" — la valoración del mercado en este momento. Si Bitcoin está a $60,000 con 19.6M monedas, el valor de mercado es unos $1.18 billones.</p>
  <p class="de">Aktueller Preis × zirkulierendes Angebot. Das ist die bekannte "Marktkapitalisierung" — die Bewertung in diesem Moment. Bei Bitcoin zu 60.000 $ mit 19,6 Mio. Coins beträgt der Marktwert etwa 1,18 Billionen $.</p>

  <h3 class="ko">2. 실현가치 (Realized Cap)</h3>
  <h3 class="en">2. Realized Value (Realized Cap)</h3>
  <h3 class="ja">2. 実現時価総額 (Realized Cap)</h3>
  <h3 class="es">2. Valor Realizado (Realized Cap)</h3>
  <h3 class="de">2. Realisierter Wert (Realized Cap)</h3>

  <p class="ko">각 코인을 "지금 가격"이 아니라 "마지막으로 지갑 사이를 이동한 시점의 가격"으로 평가해 모두 더한 값입니다. 즉 시장이 실제로 지불한 총 자본을 나타냅니다. 5년 전 1만 달러에 산 뒤 한 번도 옮기지 않은 코인은 여전히 1만 달러로 계산됩니다. 이것이 "시장의 총 취득원가"입니다.</p>
  <p class="en">Each coin is valued not at "today's price" but at "the price when it last moved between wallets," then summed. It represents the total capital the market actually paid. A coin bought at $10,000 five years ago and never moved still counts as $10,000. This is the market's total cost basis.</p>
  <p class="ja">各コインを「今の価格」ではなく「最後にウォレット間を移動した時点の価格」で評価して合計した値です。市場が実際に支払った総資本を表します。5年前に1万ドルで買って一度も動かしていないコインは、依然として1万ドルで計算されます。これが「市場の総取得原価」です。</p>
  <p class="es">Cada moneda se valora no al "precio de hoy" sino al "precio cuando se movió por última vez entre billeteras", luego se suman. Representa el capital total que el mercado realmente pagó. Una moneda comprada a $10,000 hace cinco años y nunca movida sigue contando como $10,000. Es el costo total del mercado.</p>
  <p class="de">Jede Münze wird nicht zum "heutigen Preis", sondern zum "Preis ihrer letzten Bewegung zwischen Wallets" bewertet und dann summiert. Sie repräsentiert das tatsächlich gezahlte Gesamtkapital. Eine vor fünf Jahren zu 10.000 $ gekaufte, nie bewegte Münze zählt weiterhin als 10.000 $. Das ist die Gesamtkostenbasis des Marktes.</p>

  <h3 class="ko">3. 미실현 손익을 비율로 (정규화)</h3>
  <h3 class="en">3. Normalizing Unrealized P&L</h3>
  <h3 class="ja">3. 未実現損益を比率に (正規化)</h3>
  <h3 class="es">3. Normalizar la P&L No Realizada</h3>
  <h3 class="de">3. Unrealisierten G&V normalisieren</h3>

  <p class="ko">시장가치에서 실현가치를 빼면 시장 전체의 <strong>미실현 손익(장부상 평가손익)</strong>이 나옵니다. 이 값을 다시 시가총액으로 나눠 −1~+1 범위의 비율로 만든 것이 NUPL입니다. 절대 금액이 아니라 비율이기 때문에, 사이클마다 시총 규모가 달라져도 과거와 직접 비교할 수 있습니다. 이것이 NUPL의 핵심 강점입니다.</p>
  <p class="en">Subtracting realized from market value gives the market's total <strong>unrealized profit/loss (paper gains/losses)</strong>. Dividing that by market cap turns it into a −1 to +1 ratio — that's NUPL. Because it's a ratio, not an absolute figure, you can compare directly across cycles even as market cap grows. This is NUPL's core strength.</p>
  <p class="ja">時価総額から実現時価総額を引くと、市場全体の<strong>未実現損益(帳簿上の評価損益)</strong>が出ます。これを再び時価総額で割り、−1〜+1の範囲の比率にしたものがNUPLです。絶対金額ではなく比率のため、サイクルごとに時価総額の規模が変わっても過去と直接比較できます。これがNUPLの核心的な強みです。</p>
  <p class="es">Restar el valor realizado del de mercado da la <strong>ganancia/pérdida no realizada</strong> total del mercado. Dividir eso por la capitalización lo convierte en una relación de −1 a +1 — eso es NUPL. Al ser una relación y no una cifra absoluta, se puede comparar entre ciclos aunque crezca la capitalización. Esa es su fortaleza clave.</p>
  <p class="de">Zieht man den realisierten vom Marktwert ab, erhält man den gesamten <strong>unrealisierten Gewinn/Verlust</strong> des Marktes. Teilt man das durch die Marktkapitalisierung, entsteht ein Verhältnis von −1 bis +1 — das ist NUPL. Da es ein Verhältnis und keine absolute Zahl ist, lässt es sich über Zyklen hinweg vergleichen. Das ist seine Kernstärke.</p>

  <h2 class="ko">구간별 해석</h2>
  <h2 class="en">Zone Interpretation</h2>
  <h2 class="ja">区間別の解釈</h2>
  <h2 class="es">Interpretación por Zona</h2>
  <h2 class="de">Zonen-Interpretation</h2>

  <table class="zt ko">
    <tr><th>NUPL</th><th>심리 단계</th><th>의미</th><th>투자 판단</th></tr>
    <tr><td class="g">0 이하</td><td>항복 (Capitulation)</td><td>대다수가 손실, 투매 발생</td><td class="g">강력 매수</td></tr>
    <tr><td class="g">0 ~ 0.25</td><td>희망·공포</td><td>본전 근처, 바닥 다지기</td><td class="g">매수 구간</td></tr>
    <tr><td class="y">0.25 ~ 0.5</td><td>낙관·안도</td><td>평균 이익 확대</td><td class="y">중립 / 보유</td></tr>
    <tr><td class="r">0.5 ~ 0.75</td><td>탐욕</td><td>과열 진입, 차익 매물</td><td class="r">차익 실현 고려</td></tr>
    <tr><td class="r">0.75 이상</td><td>도취 (Euphoria)</td><td>역사적 천장권</td><td class="r">고점 경계·분할 매도</td></tr>
  </table>
  <table class="zt en">
    <tr><th>NUPL</th><th>Sentiment Phase</th><th>Meaning</th><th>Signal</th></tr>
    <tr><td class="g">Below 0</td><td>Capitulation</td><td>Most underwater, panic selling</td><td class="g">Strong Buy</td></tr>
    <tr><td class="g">0 – 0.25</td><td>Hope / Fear</td><td>Near break-even, basing</td><td class="g">Buy Zone</td></tr>
    <tr><td class="y">0.25 – 0.5</td><td>Optimism / Denial</td><td>Average profit expanding</td><td class="y">Neutral / Hold</td></tr>
    <tr><td class="r">0.5 – 0.75</td><td>Greed</td><td>Overheating, profit supply</td><td class="r">Consider Taking Profit</td></tr>
    <tr><td class="r">Above 0.75</td><td>Euphoria</td><td>Historical top zone</td><td class="r">Top Warning / Scale Out</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>NUPL</th><th>心理段階</th><th>意味</th><th>投資判断</th></tr>
    <tr><td class="g">0以下</td><td>投げ売り</td><td>大多数が含み損、投売り</td><td class="g">強力買い</td></tr>
    <tr><td class="g">0〜0.25</td><td>希望・恐怖</td><td>損益分岐付近、底固め</td><td class="g">買い圏</td></tr>
    <tr><td class="y">0.25〜0.5</td><td>楽観・安心</td><td>平均利益が拡大</td><td class="y">中立 / 保有</td></tr>
    <tr><td class="r">0.5〜0.75</td><td>強欲</td><td>過熱入り、利確売り</td><td class="r">利益確定を検討</td></tr>
    <tr><td class="r">0.75以上</td><td>陶酔</td><td>歴史的天井圏</td><td class="r">天井警戒・分割売り</td></tr>
  </table>
  <table class="zt es">
    <tr><th>NUPL</th><th>Fase</th><th>Significado</th><th>Señal</th></tr>
    <tr><td class="g">Menos de 0</td><td>Capitulación</td><td>Mayoría en pérdida, pánico</td><td class="g">Compra Fuerte</td></tr>
    <tr><td class="g">0 – 0.25</td><td>Esperanza / Miedo</td><td>Cerca de equilibrio, base</td><td class="g">Zona de Compra</td></tr>
    <tr><td class="y">0.25 – 0.5</td><td>Optimismo</td><td>Ganancia media en aumento</td><td class="y">Neutral / Mantener</td></tr>
    <tr><td class="r">0.5 – 0.75</td><td>Codicia</td><td>Sobrecalentamiento</td><td class="r">Considerar Ganancias</td></tr>
    <tr><td class="r">Más de 0.75</td><td>Euforia</td><td>Zona de techo histórica</td><td class="r">Aviso de Techo</td></tr>
  </table>
  <table class="zt de">
    <tr><th>NUPL</th><th>Phase</th><th>Bedeutung</th><th>Signal</th></tr>
    <tr><td class="g">Unter 0</td><td>Kapitulation</td><td>Meiste im Verlust, Panik</td><td class="g">Starker Kauf</td></tr>
    <tr><td class="g">0 – 0,25</td><td>Hoffnung / Angst</td><td>Nahe Break-even, Bodenbildung</td><td class="g">Kaufzone</td></tr>
    <tr><td class="y">0,25 – 0,5</td><td>Optimismus</td><td>Durchschnittsgewinn wächst</td><td class="y">Neutral / Halten</td></tr>
    <tr><td class="r">0,5 – 0,75</td><td>Gier</td><td>Überhitzung, Gewinnangebot</td><td class="r">Gewinnmitnahme erwägen</td></tr>
    <tr><td class="r">Über 0,75</td><td>Euphorie</td><td>Historische Top-Zone</td><td class="r">Top-Warnung</td></tr>
  </table>

  <h2 class="ko">역사적 사례</h2>
  <h2 class="en">Historical Cases</h2>
  <h2 class="ja">歴史的事例</h2>
  <h2 class="es">Casos Históricos</h2>
  <h2 class="de">Historische Fälle</h2>

  <p class="ko"><strong>2017년 12월 (도취):</strong> 비트코인이 2만 달러 천장을 찍었을 때 NUPL은 0.75를 넘어 도취 구간에 진입했습니다. 이후 1년간 84% 하락했습니다. <strong>2018년 12월 (항복):</strong> 3,200달러 바닥에서 NUPL은 0 부근까지 떨어졌고, 이는 역사적 매수 기회였습니다. <strong>2021년 (도취):</strong> 두 차례 고점 모두 NUPL 0.7 이상을 기록. <strong>2022년 11월 (항복):</strong> FTX 붕괴로 NUPL이 −0.1 이하까지 내려가 시장 전체가 손실 상태가 됐고, 이 지점이 사이클 바닥이었습니다.</p>
  <p class="en"><strong>Dec 2017 (Euphoria):</strong> When Bitcoin topped at $20,000, NUPL crossed above 0.75 into euphoria. An 84% drawdown followed over the next year. <strong>Dec 2018 (Capitulation):</strong> At the $3,200 bottom, NUPL fell near 0 — a historic buying opportunity. <strong>2021 (Euphoria):</strong> Both peaks recorded NUPL above 0.7. <strong>Nov 2022 (Capitulation):</strong> The FTX collapse dragged NUPL below −0.1, putting the whole market underwater — and that marked the cycle bottom.</p>
  <p class="ja"><strong>2017年12月(陶酔):</strong> ビットコインが2万ドルの天井をつけた時、NUPLは0.75を超え陶酔圏に入りました。その後1年で84%下落。<strong>2018年12月(投げ売り):</strong> 3,200ドルの底でNUPLは0付近まで下落、歴史的な買い機会でした。<strong>2021年(陶酔):</strong> 2度の高値でいずれもNUPL 0.7以上。<strong>2022年11月(投げ売り):</strong> FTX破綻でNUPLが−0.1以下まで下がり市場全体が含み損に、この地点がサイクルの底でした。</p>
  <p class="es"><strong>Dic 2017 (Euforia):</strong> Cuando Bitcoin alcanzó $20,000, NUPL cruzó sobre 0.75 hacia la euforia. Siguió una caída del 84%. <strong>Dic 2018 (Capitulación):</strong> En el suelo de $3,200, NUPL cayó cerca de 0 — una oportunidad histórica. <strong>2021 (Euforia):</strong> Ambos picos registraron NUPL sobre 0.7. <strong>Nov 2022 (Capitulación):</strong> El colapso de FTX llevó NUPL bajo −0.1, y ese fue el suelo del ciclo.</p>
  <p class="de"><strong>Dez 2017 (Euphorie):</strong> Als Bitcoin bei 20.000 $ gipfelte, überschritt NUPL 0,75 in die Euphorie. Ein Rückgang von 84 % folgte. <strong>Dez 2018 (Kapitulation):</strong> Am Tief von 3.200 $ fiel NUPL nahe 0 — eine historische Gelegenheit. <strong>2021 (Euphorie):</strong> Beide Hochs verzeichneten NUPL über 0,7. <strong>Nov 2022 (Kapitulation):</strong> Der FTX-Kollaps drückte NUPL unter −0,1 — das war der Zyklusboden.</p>

  <h2 class="ko">MVRV와 무엇이 다른가?</h2>
  <h2 class="en">How Is It Different from MVRV?</h2>
  <h2 class="ja">MVRVとの違いは?</h2>
  <h2 class="es">¿En qué se diferencia del MVRV?</h2>
  <h2 class="de">Wie unterscheidet es sich von MVRV?</h2>

  <p class="ko">NUPL과 MVRV는 모두 실현가치를 기반으로 하지만 표현 방식이 다릅니다. MVRV는 시가총액을 실현가치로 <em>나눈</em> 배수이고, NUPL은 그 <em>차이</em>를 시가총액으로 정규화한 비율입니다. NUPL은 0을 기준으로 이익/손실이 명확히 갈려 심리 단계를 직관적으로 읽기 좋고, MVRV는 과열 정도를 배수(예: 3배)로 표현하는 데 강합니다. 실전에서는 둘이 같은 신호를 낼 때 신뢰도가 크게 올라갑니다.</p>
  <p class="en">NUPL and MVRV both build on realized value but express it differently. MVRV is market cap <em>divided</em> by realized value (a multiple); NUPL is the <em>difference</em> normalized by market cap (a ratio). NUPL's zero line cleanly splits profit from loss, making sentiment phases intuitive; MVRV excels at expressing the degree of overheating as a multiple (e.g. 3x). In practice, confidence rises sharply when both give the same signal.</p>
  <p class="ja">NUPLとMVRVはどちらも実現時価総額を基にしますが、表現が異なります。MVRVは時価総額を実現時価総額で<em>割った</em>倍率、NUPLはその<em>差</em>を時価総額で正規化した比率です。NUPLは0を基準に損益が明確に分かれ心理段階を直感的に読め、MVRVは過熱度を倍率(例:3倍)で表すのに優れます。実戦では両者が同じシグナルを出す時、信頼度が大きく上がります。</p>
  <p class="es">NUPL y MVRV se basan en el valor realizado pero lo expresan distinto. MVRV es la capitalización <em>dividida</em> por el valor realizado (un múltiplo); NUPL es la <em>diferencia</em> normalizada (una relación). La línea cero de NUPL separa ganancia de pérdida; MVRV destaca al expresar el sobrecalentamiento como múltiplo (ej. 3x). En la práctica, la confianza sube cuando ambos coinciden.</p>
  <p class="de">NUPL und MVRV bauen beide auf dem Realized Value auf, drücken ihn aber anders aus. MVRV ist die Marktkap. <em>geteilt</em> durch den Realized Value (ein Vielfaches); NUPL ist die <em>Differenz</em>, normalisiert (ein Verhältnis). NUPLs Nulllinie trennt Gewinn und Verlust; MVRV glänzt beim Ausdruck der Überhitzung als Vielfaches (z. B. 3x). In der Praxis steigt das Vertrauen stark, wenn beide dasselbe Signal geben.</p>

  <h2 class="ko">한계점</h2>
  <h2 class="en">Limitations</h2>
  <h2 class="ja">限界点</h2>
  <h2 class="es">Limitaciones</h2>
  <h2 class="de">Grenzen</h2>

  <p class="ko">NUPL은 중장기 사이클 판단에 강하지만 단기 매매 신호로는 느립니다. 강세장에서는 탐욕 구간에 몇 달씩 머물 수 있어, "0.75를 넘었으니 즉시 전량 매도"처럼 기계적으로 쓰면 큰 상승을 놓칩니다. 또한 분실된 코인이나 수년간 이동 없는 고래 물량이 실현가치를 왜곡할 수 있습니다. 반드시 단기 지표(SOPR, 펀딩비)와 함께 보고, 절대 수치보다 추세와 방향으로 해석하세요.</p>
  <p class="en">NUPL is strong for medium-to-long cycle judgment but slow as a short-term signal. In bull markets it can stay in the greed zone for months, so mechanical use ("above 0.75, sell everything now") misses major upside. Lost coins and whale supply dormant for years can also distort realized value. Always pair it with short-term indicators (SOPR, funding rate) and read trend and direction over absolute levels.</p>
  <p class="ja">NUPLは中長期サイクル判断に強いですが、短期売買シグナルとしては遅いです。強気相場では強欲圏に数ヶ月留まることがあり、「0.75を超えたので即全売り」のように機械的に使うと大きな上昇を逃します。また紛失コインや数年間動かない大口の物量が実現時価総額を歪めることがあります。必ず短期指標(SOPR、資金調達率)と併せ、絶対値より推移と方向で解釈してください。</p>
  <p class="es">NUPL es fuerte para el ciclo medio-largo pero lento a corto plazo. En mercados alcistas puede permanecer en codicia durante meses, así que el uso mecánico ("sobre 0.75, vender todo") pierde grandes subidas. Las monedas perdidas y el suministro de ballenas inactivo pueden distorsionar el valor realizado. Combínalo siempre con indicadores de corto plazo (SOPR, financiación) y lee tendencia sobre niveles absolutos.</p>
  <p class="de">NUPL ist stark für mittel-lange Zyklen, aber langsam kurzfristig. In Bullenmärkten kann es monatelang in der Gier-Zone bleiben, sodass mechanische Nutzung ("über 0,75, alles verkaufen") große Anstiege verpasst. Verlorene Coins und jahrelang inaktives Wal-Angebot können den Realized Value verzerren. Kombinieren Sie es stets mit kurzfristigen Indikatoren (SOPR, Funding) und lesen Sie Trend statt absoluter Werte.</p>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Indicators to Pair With</h2>
  <h2 class="ja">併せて見たい指標</h2>
  <h2 class="es">Indicadores Complementarios</h2>
  <h2 class="de">Ergänzende Indikatoren</h2>

  <p class="ko">NUPL은 <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a>(밸류에이션), <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a>(단기 보유자 손익), <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">실현가</a>(시장 취득원가)와 함께 볼 때 가장 강력합니다. 전체 지표를 어떻게 겹쳐 읽는지는 <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">온체인 지표 종합 가이드</a>에서 확인하세요.</p>
  <p class="en">NUPL is strongest alongside <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (valuation), <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (short-term holder P&L), and <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Realized Price</a> (market cost basis). See how to stack all indicators in the <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain Indicators Complete Guide</a>.</p>
  <p class="ja">NUPLは<a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Zスコア</a>(バリュエーション)、<a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a>(短期保有者損益)、<a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">実現価格</a>(市場取得原価)と併せると最も強力です。全指標の重ね方は<a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">オンチェーン指標総合ガイド</a>で確認してください。</p>
  <p class="es">NUPL es más potente junto a <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (valoración), <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (P&L de corto plazo) y <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Precio Realizado</a>. Aprende a combinar todos en la <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">Guía Completa de Indicadores On-Chain</a>.</p>
  <p class="de">NUPL ist am stärksten neben <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (Bewertung), <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (kurzfristige G&V) und <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Realized Price</a>. Wie man alle Indikatoren stapelt, zeigt die <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain-Indikatoren Komplettanleitung</a>.</p>

  <div class="box ko">📊 <strong>BTCtiming 대시보드에서는</strong> NUPL이 매수·매도 점수 계산에 직접 반영됩니다. 실시간 NUPL 값과 그것이 현재 점수를 얼마나 끌어올리거나 끌어내리는지 대시보드에서 확인해 보세요.</div>
  <div class="box en">📊 <strong>On the BTCtiming dashboard,</strong> NUPL feeds directly into the buy/sell score. Check the live NUPL value and how much it's pushing the current score up or down.</div>
  <div class="box ja">📊 <strong>BTCtimingダッシュボードでは</strong> NUPLが売買スコアの計算に直接反映されます。リアルタイムのNUPL値と、それが現在のスコアをどれだけ押し上げ・押し下げているかを確認してみてください。</div>
  <div class="box es">📊 <strong>En el panel de BTCtiming,</strong> NUPL alimenta directamente la puntuación de compra/venta. Consulta el valor NUPL en vivo y cuánto empuja la puntuación actual.</div>
  <div class="box de">📊 <strong>Im BTCtiming-Dashboard</strong> fließt NUPL direkt in den Kauf-/Verkaufsscore ein. Prüfen Sie den Live-NUPL-Wert und wie stark er den aktuellen Score treibt.</div>

<?php require __DIR__.'/_footer.php'; ?>
