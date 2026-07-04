<?php $slug = 'realized-cap-guide'; require __DIR__.'/_header.php'; ?>

<p class="ko">이 사이트에서 다룬 <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>와 <a href="/blog/nupl-indicator.html">NUPL</a> 둘 다 같은 재료를 씁니다 — 바로 <strong>실현시가총액(Realized Cap)</strong>이에요. 이 지표 자체를 제대로 이해하면, 파생된 다른 지표들도 훨씬 직관적으로 읽힙니다.</p>
  <p class="en">Two indicators covered on this blog — <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> and <a href="/blog/nupl-indicator.html">NUPL</a> — both share the same core ingredient: <strong>Realized Cap</strong>. Understand this base metric well, and every indicator built on top of it becomes far more intuitive.</p>
  <p class="ja">このブログで扱った<a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>と<a href="/blog/nupl-indicator.html">NUPL</a>はどちらも同じ材料を使っています — それが<strong>実現時価総額(Realized Cap)</strong>です。この指標自体をしっかり理解すれば、派生する他の指標もはるかに直感的に読めるようになります。</p>

  <p class="es">Dos indicadores cubiertos en este blog — <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> y <a href="/blog/nupl-indicator.html">NUPL</a> — comparten el mismo ingrediente base: la <strong>Capitalización Realizada (Realized Cap)</strong>. Entender bien esta métrica base hace que cada indicador construido sobre ella sea mucho más intuitivo.</p>
  <p class="de">Zwei in diesem Blog behandelte Indikatoren — <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> und <a href="/blog/nupl-indicator.html">NUPL</a> — teilen sich dieselbe Grundzutat: die <strong>Realized Cap</strong>. Wer diese Basiskennzahl gut versteht, findet jeden darauf aufbauenden Indikator weit intuitiver.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 실현시가총액은 각 비트코인이 마지막으로 온체인에서 이동했을 때의 가격을 합산한 값입니다. 쉽게 말해, 현재 시장 참여자 전체의 "평균 취득원가"에 가장 가까운 근사치예요.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Realized Cap sums the value of every Bitcoin at the price it last moved on-chain. In plain terms, it's the closest approximation to the market's aggregate average cost basis.</div>
  <div class="box ja">💡 <strong>要点:</strong> 実現時価総額は、各ビットコインが最後にオンチェーンで移動した時点の価格を合計した値です。簡単に言えば、現在の市場参加者全体の「平均取得原価」に最も近い近似値です。</div>
  <div class="box es">💡 <strong>Resumen clave:</strong> Realized Cap suma el valor de cada Bitcoin al precio de su último movimiento on-chain. En términos simples, es la aproximación más cercana a la base de costo promedio agregada del mercado.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Realized Cap summiert den Wert jedes Bitcoin zum Preis seiner letzten On-Chain-Bewegung. Einfach gesagt, ist es die nächstliegende Annäherung an die aggregierte durchschnittliche Kostenbasis des Marktes.</div>

  <h2 class="ko">시가총액과 뭐가 다른가</h2>
  <h2 class="en">How is this different from market cap?</h2>
  <h2 class="ja">時価総額と何が違うのか</h2>
  <h2 class="es">¿En qué se diferencia de la capitalización de mercado?</h2>
  <h2 class="de">Wie unterscheidet sich das von der Marktkapitalisierung?</h2>
  <p class="ko">일반적인 시가총액은 "현재 가격 × 유통 공급량"으로 계산돼요. 문제는 이 계산이 10년 전에 산 사람이나 어제 산 사람이나 똑같이 "지금 가격"으로 평가한다는 거예요. 실현시가총액은 다릅니다 — 각 코인을 "그 코인이 마지막으로 거래된 그 시점의 가격"으로 평가해요. 그래서 오래 묶여있는 코인일수록 시가총액과 실현가치 사이에 괴리가 생기고, 이 괴리 자체가 시장의 과열·저평가를 읽는 재료가 됩니다.</p>
  <p class="en">Regular market cap is calculated as "current price × circulating supply" — treating a coin bought 10 years ago the same as one bought yesterday, both valued at today's price. Realized Cap instead values each coin at the price it last actually moved. The longer a coin sits dormant, the wider the gap between market cap and realized value grows — and that gap itself becomes the raw material for reading overheating or undervaluation.</p>
  <p class="ja">一般的な時価総額は「現在価格 × 流通供給量」で計算されます。問題は、この計算が10年前に買った人も昨日買った人も同じく「今の価格」で評価してしまうことです。実現時価総額は違います — 各コインを「そのコインが最後に取引されたその時点の価格」で評価します。そのため長く動かないコインほど時価総額と実現価値の間に乖離が生まれ、この乖離自体が市場の過熱・割安を読む材料になります。</p>
  <p class="es">La capitalización de mercado normal se calcula como "precio actual × suministro circulante" — tratando a alguien que compró hace 10 años igual que a alguien que compró ayer, ambos valorados al precio de hoy. Realized Cap en cambio valora cada moneda al precio en que se movió por última vez. Cuanto más tiempo permanece inactiva una moneda, más se amplía la brecha entre la capitalización de mercado y el valor realizado — y esa brecha misma se convierte en la materia prima para leer sobrecalentamiento o infravaloración.</p>
  <p class="de">Die reguläre Marktkapitalisierung wird als "aktueller Preis × zirkulierendes Angebot" berechnet — sie behandelt eine vor 10 Jahren gekaufte Münze genauso wie eine gestern gekaufte, beide zum heutigen Preis bewertet. Realized Cap bewertet stattdessen jede Münze zum Preis ihrer letzten tatsächlichen Bewegung. Je länger eine Münze inaktiv bleibt, desto größer wird die Lücke zwischen Marktkapitalisierung und realisiertem Wert — und diese Lücke selbst wird zum Rohmaterial, um Überhitzung oder Unterbewertung zu lesen.</p>

  <h2 class="ko">왜 시가총액보다 안정적인가</h2>
  <h2 class="en">Why it's more stable than market cap</h2>
  <h2 class="ja">なぜ時価総額より安定しているのか</h2>
  <h2 class="es">Por qué es más estable que la capitalización de mercado</h2>
  <h2 class="de">Warum es stabiler ist als die Marktkapitalisierung</h2>
  <p class="ko">시가총액은 하루 만에도 20~30%씩 출렁일 수 있어요. 근데 실현시가총액은 실제로 코인이 이동해야만 갱신되기 때문에, 단기 가격 변동에 훨씬 덜 민감합니다. 이 "느리게 움직인다"는 특성이 오히려 장점이에요 — 노이즈가 걸러진, 시장의 구조적 위치를 보여주는 지표가 되거든요.</p>
  <p class="en">Market cap can swing 20-30% in a single day. Realized Cap only updates when coins actually move on-chain, making it far less sensitive to short-term price swings. That slowness is actually the point — it filters out noise and reveals the market's structural position instead.</p>
  <p class="ja">時価総額は1日で20〜30%も変動することがあります。しかし実現時価総額は実際にコインが移動しないと更新されないため、短期的な価格変動にはるかに鈍感です。この「ゆっくり動く」特性こそが利点です — ノイズが取り除かれ、市場の構造的な位置を示す指標になるのです。</p>
  <p class="es">La capitalización de mercado puede oscilar 20-30% en un solo día. Realized Cap solo se actualiza cuando las monedas realmente se mueven on-chain, haciéndola mucho menos sensible a las oscilaciones de precio a corto plazo. Esa lentitud es precisamente el punto — filtra el ruido y revela en su lugar la posición estructural del mercado.</p>
  <p class="de">Die Marktkapitalisierung kann an einem einzigen Tag um 20-30% schwanken. Realized Cap aktualisiert sich nur, wenn Münzen tatsächlich on-chain bewegt werden, was sie weit weniger empfindlich gegenüber kurzfristigen Preisschwankungen macht. Diese Langsamkeit ist genau der Punkt — sie filtert Rauschen heraus und zeigt stattdessen die strukturelle Position des Marktes.</p>

  <h2 class="ko">실전에서 어떻게 쓰이나</h2>
  <h2 class="en">How it's actually used</h2>
  <h2 class="ja">実際にどう使われるか</h2>
  <h2 class="es">Cómo se usa en la práctica</h2>
  <h2 class="de">Wie es tatsächlich verwendet wird</h2>
  <ul class="ko">
    <li><strong>MVRV Z-Score:</strong> (시가총액 − 실현시가총액)을 표준편차로 정규화</li>
    <li><strong>NUPL:</strong> (시가총액 − 실현시가총액)을 시가총액 대비 비율로 표현</li>
    <li><strong>실현가(Realized Price):</strong> 실현시가총액을 유통 공급량으로 나눈 값 — "시장 평균 매수가"를 가격 단위로 직접 보여줌</li>
  </ul>
  <ul class="en">
    <li><strong>MVRV Z-Score:</strong> normalizes (market cap − realized cap) by standard deviation</li>
    <li><strong>NUPL:</strong> expresses (market cap − realized cap) as a percentage of market cap</li>
    <li><strong>Realized Price:</strong> realized cap divided by circulating supply — showing the market's average cost basis directly in price terms</li>
  </ul>
  <ul class="ja">
    <li><strong>MVRV Zスコア:</strong> (時価総額 − 実現時価総額)を標準偏差で正規化</li>
    <li><strong>NUPL:</strong> (時価総額 − 実現時価総額)を時価総額比の割合で表現</li>
    <li><strong>実現価格(Realized Price):</strong> 実現時価総額を流通供給量で割った値 — 「市場の平均取得価格」を価格単位で直接示す</li>
  </ul>
  <ul class="es">
    <li><strong>MVRV Z-Score:</strong> normaliza (capitalización de mercado − capitalización realizada) por desviación estándar</li>
    <li><strong>NUPL:</strong> expresa (capitalización de mercado − capitalización realizada) como porcentaje de la capitalización de mercado</li>
    <li><strong>Precio Realizado:</strong> capitalización realizada dividida por el suministro circulante — mostrando la base de costo promedio del mercado directamente en términos de precio</li>
  </ul>
  <ul class="de">
    <li><strong>MVRV Z-Score:</strong> normalisiert (Marktkapitalisierung − Realized Cap) durch die Standardabweichung</li>
    <li><strong>NUPL:</strong> drückt (Marktkapitalisierung − Realized Cap) als Prozentsatz der Marktkapitalisierung aus</li>
    <li><strong>Realized Price:</strong> Realized Cap geteilt durch das zirkulierende Angebot — zeigt die durchschnittliche Kostenbasis des Marktes direkt in Preiseinheiten</li>
  </ul>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <h2 class="es">Advertencias importantes</h2>
  <h2 class="de">Wichtige Einschränkungen</h2>
  <p class="ko">실현시가총액도 결국 "온체인 이동"을 기준으로 계산되기 때문에, 거래소 내부 이체나 지갑 재배치 같은 비매매성 이동이 섞이면 살짝 왜곡될 수 있어요. 또한 분실된 개인키로 인해 영원히 못 움직이는 코인도 계속 오래된 가격으로 잡혀있다 보니, 실제 유통 가능한 공급량보다 실현가치가 낮게 잡히는 경향도 있습니다.</p>
  <p class="en">Since it's still calculated from on-chain movement, non-sale transfers — internal exchange shuffling, wallet reorganization — can slightly distort the reading. Coins with permanently lost keys also stay frozen at old prices indefinitely, which tends to understate realized value relative to the truly circulating float.</p>
  <p class="ja">実現時価総額も結局は「オンチェーン移動」を基準に計算されるため、取引所内部の送金やウォレット再編成のような非売却性の移動が混ざると多少歪む可能性があります。また、紛失した秘密鍵により永遠に動かせないコインも古い価格のまま計上され続けるため、実際に流通可能な供給量よりも実現価値が低く出る傾向もあります。</p>
  <p class="es">Dado que sigue calculándose a partir del movimiento on-chain, las transferencias que no son ventas —reorganización interna de exchanges, reorganización de billeteras— pueden distorsionar ligeramente la lectura. Las monedas con claves perdidas permanentemente también quedan congeladas indefinidamente a precios antiguos, lo que tiende a subestimar el valor realizado en relación con el suministro realmente circulante.</p>
  <p class="de">Da es weiterhin aus On-Chain-Bewegungen berechnet wird, können Nicht-Verkaufs-Transfers — interne Börsenumschichtungen, Wallet-Reorganisation — die Messung leicht verzerren. Münzen mit dauerhaft verlorenen Schlüsseln bleiben ebenfalls unbegrenzt bei alten Preisen eingefroren, was den realisierten Wert im Verhältnis zum tatsächlich zirkulierenden Angebot tendenziell unterschätzt.</p>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best combined with</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor combinado con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <p class="ko"><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>와 <a href="/blog/nupl-indicator.html">NUPL</a>은 이 실현시가총액을 서로 다른 방식으로 정규화한 것뿐이라, 원리를 이해하고 나면 두 지표를 훨씬 빠르게 해석할 수 있습니다.</p>
  <p class="en"><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> and <a href="/blog/nupl-indicator.html">NUPL</a> are really just two different normalizations of this same realized cap concept — understanding the base metric makes reading both far faster.</p>
  <p class="ja"><a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>と<a href="/blog/nupl-indicator.html">NUPL</a>は、この実現時価総額を異なる方法で正規化しただけのものなので、原理を理解すれば両方の指標をはるかに速く解釈できるようになります。</p>
<p class="es"><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> y <a href="/blog/nupl-indicator.html">NUPL</a> son en realidad solo dos normalizaciones diferentes de este mismo concepto de capitalización realizada — entender la métrica base hace que leer ambos indicadores sea mucho más rápido.</p>
<p class="de"><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> und <a href="/blog/nupl-indicator.html">NUPL</a> sind eigentlich nur zwei unterschiedliche Normalisierungen desselben Realized-Cap-Konzepts — wer die Basiskennzahl versteht, kann beide Indikatoren weit schneller lesen.</p>
<?php require __DIR__.'/_footer.php'; ?>
