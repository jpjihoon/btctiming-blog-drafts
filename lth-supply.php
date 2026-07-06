<?php $slug = 'lth-supply'; require __DIR__.'/_header.php'; ?>

  <p class="ko">비트코인 시장에는 성격이 정반대인 두 부류가 있습니다. 가격이 조금만 움직여도 사고파는 <strong>단기 보유자(STH)</strong>와, 몇 년의 하락장도 흔들림 없이 버티는 <strong>장기 보유자(LTH)</strong>입니다. 후자는 흔히 "스마트머니"로 불립니다. <strong>장기 보유자 공급량(LTH Supply)</strong>의 증감을 추적하면, 이 노련한 자금이 지금 조용히 사 모으는지(축적) 아니면 팔아치우는지(분산)를 미리 읽을 수 있습니다.</p>
  <p class="en">The Bitcoin market has two opposite personalities: <strong>short-term holders (STH)</strong> who trade on the smallest move, and <strong>long-term holders (LTH)</strong> who ride out multi-year bear markets unshaken. The latter are often called "smart money." Tracking the rise and fall of <strong>LTH Supply</strong> reveals whether this seasoned capital is quietly accumulating or distributing — often before price reacts.</p>
  <p class="ja">ビットコイン市場には性格が正反対の2つの層があります。価格が少し動くだけで売買する<strong>短期保有者(STH)</strong>と、数年の下落相場も動じず耐える<strong>長期保有者(LTH)</strong>です。後者はよく「スマートマネー」と呼ばれます。<strong>長期保有者供給量(LTH Supply)</strong>の増減を追えば、この老練な資金が今、静かに買い集めているか(蓄積)、売り払っているか(分散)を先読みできます。</p>

  <p class="es">El mercado de Bitcoin tiene dos personalidades opuestas: los <strong>poseedores a corto plazo (STH)</strong> que operan al menor movimiento, y los <strong>poseedores a largo plazo (LTH)</strong> que soportan mercados bajistas de años sin inmutarse. A estos últimos se les llama "dinero inteligente". Seguir el <strong>Suministro LTH</strong> revela si este capital experimentado acumula o distribuye — a menudo antes de que el precio reaccione.</p>
  <p class="de">Der Bitcoin-Markt hat zwei gegensätzliche Persönlichkeiten: <strong>kurzfristige Halter (STH)</strong>, die bei kleinster Bewegung handeln, und <strong>langfristige Halter (LTH)</strong>, die mehrjährige Bärenmärkte unerschütterlich aussitzen. Letztere nennt man oft "Smart Money". Das <strong>LTH-Angebot</strong> zu verfolgen zeigt, ob dieses erfahrene Kapital akkumuliert oder verteilt — oft bevor der Preis reagiert.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 장기 보유자는 코인을 155일(약 5개월) 이상 이동하지 않은 지갑입니다. LTH 공급량이 늘면 축적(강세 신호), 줄면 분산(고점 경계). 바닥에서는 LTH 비중이 최고치를 기록하고, 천장 부근에서는 이들이 매도를 시작해 비중이 꺾이는 경향이 있습니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Long-term holders are wallets that haven't moved coins for 155+ days (~5 months). Rising LTH supply means accumulation (bullish); falling means distribution (top warning). LTH supply peaks near bottoms and tends to roll over as these holders begin selling near tops.</div>
  <div class="box ja">💡 <strong>要点:</strong> 長期保有者は155日(約5ヶ月)以上コインを動かしていないウォレットです。LTH供給量が増えれば蓄積(強気シグナル)、減れば分散(天井警戒)。底値でLTH比率が最高値を記録し、天井付近では彼らが売却を始め比率が折れる傾向があります。</div>

  <div class="box es">💡 <strong>Resumen clave:</strong> Los poseedores a largo plazo son billeteras que no han movido monedas por 155+ días (~5 meses). Un suministro LTH creciente significa acumulación (alcista); decreciente, distribución. El suministro LTH alcanza máximos cerca de suelos y cae cuando venden cerca de techos.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Langfristige Halter sind Wallets, die seit 155+ Tagen (~5 Monate) keine Coins bewegt haben. Steigendes LTH-Angebot bedeutet Akkumulation (bullisch); fallendes Verteilung. Das LTH-Angebot erreicht nahe Böden Höchststände und kippt, wenn diese Halter nahe Tops verkaufen.</div>

  <h2 class="ko">보유자 흐름으로 시각화하면</h2>
  <h2 class="en">Visualized by holder flow</h2>
  <h2 class="ja">保有者フローで可視化すると</h2>
  <h2 class="es">Visualizado por flujo de poseedores</h2>
  <h2 class="de">Nach Halterfluss visualisiert</h2>

  <div class="ko">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">LTH 공급 사이클 (축적 → 분산)</text>
    <g font-family="sans-serif">
      <polyline points="40,150 160,90 300,70 440,80 560,130 660,160" fill="none" stroke="#60a5fa" stroke-width="2.5"/>
      <circle cx="160" cy="90" r="4" fill="#22c55e"/>
      <text x="160" y="78" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">축적</text>
      <circle cx="300" cy="70" r="5" fill="#22c55e"/>
      <text x="300" y="58" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">비중 최고 (바닥권)</text>
      <circle cx="560" cy="130" r="4" fill="#f87171"/>
      <text x="560" y="152" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">분산 (고점권)</text>
      <text x="40" y="185" fill="#71717a" font-size="9">← 약세장 (매집)</text>
      <text x="560" y="185" fill="#71717a" font-size="9">강세장 후반 (매도) →</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">LTH Supply Cycle (Accumulation → Distribution)</text>
    <g font-family="sans-serif">
      <polyline points="40,150 160,90 300,70 440,80 560,130 660,160" fill="none" stroke="#60a5fa" stroke-width="2.5"/>
      <circle cx="160" cy="90" r="4" fill="#22c55e"/>
      <text x="160" y="78" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">Accumulate</text>
      <circle cx="300" cy="70" r="5" fill="#22c55e"/>
      <text x="300" y="58" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">Peak (near bottom)</text>
      <circle cx="560" cy="130" r="4" fill="#f87171"/>
      <text x="560" y="152" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">Distribute (near top)</text>
      <text x="40" y="185" fill="#71717a" font-size="9">← Bear market (buying)</text>
      <text x="540" y="185" fill="#71717a" font-size="9">Late bull (selling) →</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">LTH供給サイクル (蓄積 → 分散)</text>
    <g font-family="sans-serif">
      <polyline points="40,150 160,90 300,70 440,80 560,130 660,160" fill="none" stroke="#60a5fa" stroke-width="2.5"/>
      <circle cx="160" cy="90" r="4" fill="#22c55e"/>
      <text x="160" y="78" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">蓄積</text>
      <circle cx="300" cy="70" r="5" fill="#22c55e"/>
      <text x="300" y="58" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">比率最高 (底値圏)</text>
      <circle cx="560" cy="130" r="4" fill="#f87171"/>
      <text x="560" y="152" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">分散 (天井圏)</text>
      <text x="40" y="185" fill="#71717a" font-size="9">← 弱気相場 (仕込み)</text>
      <text x="560" y="185" fill="#71717a" font-size="9">強気後半 (売却) →</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">LTH와 STH는 어떻게 나뉘나?</h2>
  <h2 class="en">How Are LTH and STH Defined?</h2>
  <h2 class="ja">LTHとSTHはどう分けられるか?</h2>
  <h2 class="es">¿Cómo se Definen LTH y STH?</h2>
  <h2 class="de">Wie werden LTH und STH definiert?</h2>

  <h3 class="ko">155일이라는 기준</h3>
  <h3 class="en">The 155-Day Threshold</h3>
  <h3 class="ja">155日という基準</h3>
  <h3 class="es">El Umbral de 155 Días</h3>
  <h3 class="de">Die 155-Tage-Schwelle</h3>

  <p class="ko">온체인 분석은 코인이 마지막으로 이동한 후 경과 시간(코인 나이)을 기준으로 보유자를 분류합니다. 통계적으로 코인이 <strong>155일</strong>을 넘기면 다시 매도될 확률이 급격히 낮아집니다. 그래서 이 기준을 넘긴 물량을 장기 보유자(LTH), 그 미만을 단기 보유자(STH)로 나눕니다. 155일은 임의의 숫자가 아니라, 과거 데이터에서 "손 바뀜 확률이 꺾이는 지점"으로 검증된 값입니다.</p>
  <p class="en">On-chain analysis classifies holders by coin age since last movement. Statistically, once a coin passes <strong>155 days</strong>, its probability of being sold again drops sharply. Supply older than this is labeled long-term holder (LTH); younger is short-term holder (STH). The 155-day mark isn't arbitrary — it's the point where historical data shows the probability of changing hands rolls over.</p>
  <p class="ja">オンチェーン分析は、コインが最後に動いてからの経過時間(コイン年齢)で保有者を分類します。統計的にコインが<strong>155日</strong>を超えると、再び売られる確率が急激に下がります。この基準を超えた物量を長期保有者(LTH)、未満を短期保有者(STH)とします。155日は任意の数字ではなく、過去データで「持ち替え確率が折れる地点」として検証された値です。</p>
  <p class="es">El análisis on-chain clasifica poseedores por edad de moneda desde el último movimiento. Estadísticamente, una vez que una moneda supera los <strong>155 días</strong>, su probabilidad de venderse cae bruscamente. El suministro más antiguo se etiqueta LTH; el más joven, STH. Los 155 días no son arbitrarios — es el punto donde los datos muestran que la probabilidad de cambiar de manos se quiebra.</p>
  <p class="de">Die On-Chain-Analyse klassifiziert Halter nach dem Münzalter seit der letzten Bewegung. Statistisch sinkt nach <strong>155 Tagen</strong> die Verkaufswahrscheinlichkeit einer Münze stark. Älteres Angebot gilt als LTH, jüngeres als STH. Die 155-Tage-Marke ist nicht willkürlich — es ist der Punkt, an dem laut Daten die Besitzwechsel-Wahrscheinlichkeit kippt.</p>

  <h3 class="ko">왜 스마트머니인가</h3>
  <h3 class="en">Why "Smart Money"</h3>
  <h3 class="ja">なぜスマートマネーか</h3>
  <h3 class="es">Por Qué "Dinero Inteligente"</h3>
  <h3 class="de">Warum "Smart Money"</h3>

  <p class="ko">장기 보유자는 대개 사이클을 여러 번 경험한 투자자입니다. 이들은 공포가 극에 달한 바닥에서 사서, 탐욕이 정점인 천장에서 팝니다. 그래서 LTH 공급 비중은 일반 투자자의 심리와 반대로 움직이는 역발상 지표 역할을 합니다.</p>
  <p class="en">Long-term holders are typically investors who have lived through multiple cycles. They buy when fear peaks at the bottom and sell when greed peaks at the top. As a result, LTH supply share acts as a contrarian indicator, moving opposite to the average investor's sentiment.</p>
  <p class="ja">長期保有者は大抵、サイクルを何度も経験した投資家です。彼らは恐怖が極まる底で買い、強欲が頂点の天井で売ります。そのためLTH供給比率は一般投資家の心理と逆に動く逆張り指標の役割を果たします。</p>
  <p class="es">Los poseedores a largo plazo suelen ser inversores que han vivido varios ciclos. Compran cuando el miedo llega al máximo en el suelo y venden cuando la codicia culmina en el techo. Por eso la cuota LTH actúa como indicador contrario al sentimiento del inversor medio.</p>
  <p class="de">Langfristige Halter sind meist Investoren, die mehrere Zyklen erlebt haben. Sie kaufen, wenn die Angst am Boden gipfelt, und verkaufen, wenn die Gier am Top gipfelt. Daher wirkt der LTH-Anteil als konträrer Indikator, entgegen der Stimmung des Durchschnittsanlegers.</p>

  <h2 class="ko">보유 흐름으로 사이클 읽기</h2>
  <h2 class="en">Reading the Cycle from Holder Flows</h2>
  <h2 class="ja">保有フローでサイクルを読む</h2>
  <h2 class="es">Leyendo el Ciclo desde los Flujos</h2>
  <h2 class="de">Den Zyklus aus Halter-Flüssen lesen</h2>

  <table class="zt ko">
    <tr><th>LTH 공급 추세</th><th>의미</th><th>사이클 위치</th><th>판단</th></tr>
    <tr><td class="g">급증 (신고점)</td><td>강한 축적</td><td>바닥~초기 상승</td><td class="g">매수 우위</td></tr>
    <tr><td class="g">완만한 증가</td><td>축적 지속</td><td>상승 초·중반</td><td class="g">보유</td></tr>
    <tr><td class="y">횡보</td><td>관망</td><td>중립</td><td class="y">중립</td></tr>
    <tr><td class="r">감소 시작</td><td>분산 개시</td><td>상승 후반</td><td class="r">경계</td></tr>
    <tr><td class="r">급감</td><td>대규모 매도</td><td>고점 부근</td><td class="r">차익 실현</td></tr>
  </table>
  <table class="zt en">
    <tr><th>LTH Supply Trend</th><th>Meaning</th><th>Cycle Position</th><th>Signal</th></tr>
    <tr><td class="g">Surging (new high)</td><td>Strong accumulation</td><td>Bottom to early rally</td><td class="g">Buy bias</td></tr>
    <tr><td class="g">Gradual rise</td><td>Ongoing accumulation</td><td>Early-mid uptrend</td><td class="g">Hold</td></tr>
    <tr><td class="y">Flat</td><td>Wait-and-see</td><td>Neutral</td><td class="y">Neutral</td></tr>
    <tr><td class="r">Starting to fall</td><td>Distribution begins</td><td>Late uptrend</td><td class="r">Caution</td></tr>
    <tr><td class="r">Sharp drop</td><td>Large-scale selling</td><td>Near top</td><td class="r">Take profit</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>LTH供給トレンド</th><th>意味</th><th>サイクル位置</th><th>判断</th></tr>
    <tr><td class="g">急増(新高値)</td><td>強い蓄積</td><td>底〜初期上昇</td><td class="g">買い優位</td></tr>
    <tr><td class="g">緩やかな増加</td><td>蓄積継続</td><td>上昇初〜中盤</td><td class="g">保有</td></tr>
    <tr><td class="y">横ばい</td><td>様子見</td><td>中立</td><td class="y">中立</td></tr>
    <tr><td class="r">減少開始</td><td>分散開始</td><td>上昇後半</td><td class="r">警戒</td></tr>
    <tr><td class="r">急減</td><td>大規模売却</td><td>天井付近</td><td class="r">利確</td></tr>
  </table>
  <table class="zt es">
    <tr><th>Tendencia LTH</th><th>Significado</th><th>Posición</th><th>Señal</th></tr>
    <tr><td class="g">Aumento fuerte</td><td>Acumulación fuerte</td><td>Suelo a rally inicial</td><td class="g">Sesgo compra</td></tr>
    <tr><td class="g">Subida gradual</td><td>Acumulación continua</td><td>Tendencia inicial</td><td class="g">Mantener</td></tr>
    <tr><td class="y">Plano</td><td>Esperar</td><td>Neutral</td><td class="y">Neutral</td></tr>
    <tr><td class="r">Empieza a caer</td><td>Comienza distribución</td><td>Tendencia tardía</td><td class="r">Precaución</td></tr>
    <tr><td class="r">Caída brusca</td><td>Venta a gran escala</td><td>Cerca del techo</td><td class="r">Tomar ganancias</td></tr>
  </table>
  <table class="zt de">
    <tr><th>LTH-Trend</th><th>Bedeutung</th><th>Position</th><th>Signal</th></tr>
    <tr><td class="g">Stark steigend</td><td>Starke Akkumulation</td><td>Boden bis früher Anstieg</td><td class="g">Kauf-Neigung</td></tr>
    <tr><td class="g">Allmählich steigend</td><td>Laufende Akkumulation</td><td>Früher Aufwärtstrend</td><td class="g">Halten</td></tr>
    <tr><td class="y">Flach</td><td>Abwarten</td><td>Neutral</td><td class="y">Neutral</td></tr>
    <tr><td class="r">Beginnt zu fallen</td><td>Verteilung beginnt</td><td>Später Aufwärtstrend</td><td class="r">Vorsicht</td></tr>
    <tr><td class="r">Starker Rückgang</td><td>Großverkauf</td><td>Nahe Top</td><td class="r">Gewinn sichern</td></tr>
  </table>

  <h2 class="ko">역사적 사례</h2>
  <h2 class="en">Historical Cases</h2>
  <h2 class="ja">歴史的事例</h2>
  <h2 class="es">Casos Históricos</h2>
  <h2 class="de">Historische Fälle</h2>

  <p class="ko"><strong>2022~2023년 약세장:</strong> 가격이 15,500달러까지 무너지는 동안, 장기 보유자 공급 비중은 오히려 사상 최고치를 경신했습니다. 공포에 질린 단기 투자자들이 던진 물량을 노련한 자금이 흡수한 것입니다 — 전형적인 바닥 신호였습니다. <strong>2021년 초 강세장:</strong> 가격이 급등하자 장기 보유자들이 보유분을 시장에 풀며 LTH 비중이 꺾였고, 이는 첫 번째 고점(6만 달러)을 앞둔 분산 신호였습니다. 이처럼 LTH 비중의 방향 전환은 사이클 국면 변화를 알리는 조기 경보 역할을 합니다.</p>
  <p class="en"><strong>2022–2023 bear:</strong> As price collapsed to $15,500, LTH supply share actually set new all-time highs. Seasoned capital absorbed the coins that panicked short-term traders threw out — a textbook bottom signal. <strong>Early 2021 bull:</strong> As price surged, long-term holders released supply and LTH share rolled over — a distribution signal ahead of the first top ($60K). These turns in LTH share serve as an early warning of shifts in cycle phase.</p>
  <p class="ja"><strong>2022〜2023年弱気相場:</strong> 価格が15,500ドルまで崩れる間、長期保有者供給比率はむしろ過去最高値を更新しました。恐怖に駆られた短期投資家が投げた物量を老練な資金が吸収したのです — 典型的な底値シグナルでした。<strong>2021年初の強気相場:</strong> 価格急騰で長期保有者が保有分を市場に放出しLTH比率が折れ、これは最初の天井(6万ドル)を控えた分散シグナルでした。このようにLTH比率の方向転換はサイクル局面変化を知らせる早期警報となります。</p>
  <p class="es"><strong>Bajista 2022–2023:</strong> Mientras el precio colapsaba a $15,500, la cuota LTH marcó nuevos máximos históricos. El capital experimentado absorbió las monedas que los traders en pánico soltaron — señal de suelo de manual. <strong>Alcista de inicios de 2021:</strong> Con el precio disparándose, los poseedores a largo plazo liberaron suministro y la cuota LTH se quebró — señal de distribución antes del primer techo ($60K). Estos giros son una alerta temprana de cambios de fase.</p>
  <p class="de"><strong>Bär 2022–2023:</strong> Während der Preis auf 15.500 $ einbrach, markierte der LTH-Anteil neue Allzeithochs. Erfahrenes Kapital absorbierte die Coins, die panische Trader abwarfen — ein Lehrbuch-Boden-Signal. <strong>Bulle Anfang 2021:</strong> Beim Preisanstieg gaben langfristige Halter Angebot frei und der LTH-Anteil kippte — ein Verteilungssignal vor dem ersten Top (60.000 $). Solche Wenden dienen als Frühwarnung für Phasenwechsel.</p>

  <h2 class="ko">한계점</h2>
  <h2 class="en">Limitations</h2>
  <h2 class="ja">限界点</h2>
  <h2 class="es">Limitaciones</h2>
  <h2 class="de">Grenzen</h2>

  <p class="ko">LTH 공급은 선행 지표가 아니라 확인 지표에 가깝습니다. 장기 보유자가 분산을 시작해도 가격은 한동안 더 오를 수 있어 정확한 고점 타이밍을 집어주지는 않습니다. 또한 거래소·ETF 커스터디 지갑의 대규모 이동이 통계를 일시적으로 왜곡할 수 있습니다(코인이 실제로 팔린 게 아니라 지갑만 옮긴 경우). 방향성과 추세로 해석하고, 단일 수치에 의존하지 마세요.</p>
  <p class="en">LTH supply is more a confirming than a leading indicator. Even after long-term holders begin distributing, price can keep rising, so it won't pinpoint the exact top. Large moves by exchange or ETF custody wallets can also temporarily distort the stats (coins relocated between wallets, not actually sold). Read it as direction and trend, not a single number.</p>
  <p class="ja">LTH供給は先行指標というより確認指標に近いです。長期保有者が分散を始めても価格はしばらく上昇し続けることがあり、正確な天井タイミングは示しません。また取引所・ETFカストディウォレットの大規模移動が統計を一時的に歪めることがあります(実際に売られたのではなくウォレット移動のみの場合)。方向性とトレンドで解釈してください。</p>
  <p class="es">El suministro LTH es más un indicador de confirmación que adelantado. Aunque los poseedores empiecen a distribuir, el precio puede seguir subiendo. Grandes movimientos de billeteras de custodia de exchanges o ETF también pueden distorsionar (monedas reubicadas, no vendidas). Léelo como dirección y tendencia.</p>
  <p class="de">Das LTH-Angebot ist eher bestätigend als führend. Selbst nach Verteilungsbeginn kann der Preis weiter steigen. Große Bewegungen von Börsen- oder ETF-Wallets können die Statistik verzerren (Coins verschoben, nicht verkauft). Lesen Sie es als Richtung und Trend.</p>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Indicators to Pair With</h2>
  <h2 class="ja">併せて見たい指標</h2>
  <h2 class="es">Indicadores Complementarios</h2>
  <h2 class="de">Ergänzende Indikatoren</h2>

  <p class="ko">LTH 공급은 <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a>(단기 보유자 손익)와 짝으로 볼 때 강력합니다. 장기 보유자가 축적하고 단기 보유자가 손실 실현 중이면 바닥의 전형적 조합입니다. <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> 심리 지표와도 궁합이 좋습니다. 전체 지표 활용법은 <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">온체인 지표 종합 가이드</a>를 참고하세요.</p>
  <p class="en">LTH supply is powerful paired with <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (short-term holder P&L). LTHs accumulating while STHs realize losses is a classic bottom combination. It also pairs well with the <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> sentiment gauge. See the <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain Indicators Complete Guide</a> for the full workflow.</p>
  <p class="ja">LTH供給は<a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a>(短期保有者損益)と組み合わせると強力です。長期保有者が蓄積し短期保有者が損失実現中なら底の典型的な組み合わせです。<a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a>心理指標とも相性が良いです。全指標の活用法は<a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">オンチェーン指標総合ガイド</a>を参照してください。</p>
  <p class="es">El suministro LTH es potente junto a <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (P&L de corto plazo). LTHs acumulando mientras STHs realizan pérdidas es una combinación clásica de suelo. También combina bien con <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a>. Consulta la <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">Guía Completa de Indicadores On-Chain</a>.</p>
  <p class="de">Das LTH-Angebot ist stark neben <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> (kurzfristige G&V). LTHs, die akkumulieren, während STHs Verluste realisieren, ist eine klassische Boden-Kombination. Es passt auch gut zu <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a>. Siehe die <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain-Indikatoren Komplettanleitung</a>.</p>

  <div class="box ko">📊 <strong>BTCtiming 대시보드에서는</strong> 장기 보유자 공급 비중이 매도 점수의 분산(Distribution) 신호로 반영됩니다. 실시간 LTH 비중이 현재 점수에 미치는 영향을 확인해 보세요.</div>
  <div class="box en">📊 <strong>On the BTCtiming dashboard,</strong> LTH supply share feeds the sell score as a distribution signal. Check how the live LTH share affects the current score.</div>
  <div class="box ja">📊 <strong>BTCtimingダッシュボードでは</strong> 長期保有者供給比率が売却スコアの分散シグナルとして反映されます。リアルタイムのLTH比率が現在スコアに与える影響を確認してみてください。</div>
  <div class="box es">📊 <strong>En el panel de BTCtiming,</strong> la cuota de suministro LTH alimenta la puntuación de venta como señal de distribución. Comprueba cómo afecta la cuota LTH en vivo.</div>
  <div class="box de">📊 <strong>Im BTCtiming-Dashboard</strong> fließt der LTH-Angebotsanteil als Verteilungssignal in den Verkaufsscore ein. Prüfen Sie, wie der Live-LTH-Anteil den Score beeinflusst.</div>

<?php require __DIR__.'/_footer.php'; ?>
