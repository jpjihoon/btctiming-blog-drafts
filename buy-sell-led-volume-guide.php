<?php $slug = 'buy-sell-led-volume-guide'; require __DIR__.'/_header.php'; ?>

<p class="ko">이 사이트의 대부분 온체인 지표는 하루 단위(일봉)로 갱신돼요. 정확하지만, 최대 24시간 지연될 수 있다는 단점이 있습니다. <strong>매수·매도 주도 거래량</strong>은 이 지연을 없애려고 만든 지표예요 — 15분봉 데이터를 써서, 지금 이 순간의 심리를 거의 실시간으로 잡아냅니다.</p>
  <p class="en">Most on-chain indicators on this site update once daily. Accurate, but with up to a 24-hour lag baked in. <strong>Buy/Sell-Led Volume</strong> exists to close that gap — built on 15-minute candle data, it captures the current moment's sentiment almost in real time.</p>
  <p class="ja">このサイトのほとんどのオンチェーン指標は1日単位(日足)で更新されます。正確ですが、最大24時間の遅延があるという欠点があります。<strong>買い・売り主導出来高</strong>はこの遅延をなくすために作られた指標です — 15分足データを使い、今この瞬間の心理をほぼリアルタイムで捉えます。</p>

  <p class="es">La mayoría de los indicadores on-chain en este sitio se actualizan una vez al día. Precisos, pero con hasta 24 horas de retraso incorporado. El <strong>Volumen Liderado por Compra/Venta</strong> existe para cerrar esa brecha — construido sobre datos de velas de 15 minutos, captura el sentimiento del momento actual casi en tiempo real.</p>
  <p class="de">Die meisten On-Chain-Indikatoren auf dieser Seite werden einmal täglich aktualisiert. Genau, aber mit bis zu 24 Stunden eingebauter Verzögerung. <strong>Kauf-/Verkaufsgeführtes Volumen</strong> existiert, um diese Lücke zu schließen — aufgebaut auf 15-Minuten-Kerzendaten erfasst es die Stimmung des aktuellen Moments fast in Echtzeit.</p>

  <h2 class="ko">계산 방식</h2>
  <h2 class="en">How it's calculated</h2>
  <h2 class="ja">計算方法</h2>
  <h2 class="es">Cómo se calcula</h2>
  <h2 class="de">Wie es berechnet wird</h2>
  <p class="ko">각 15분봉 안에서 "매수 주문으로 체결된 거래량"과 "매도 주문으로 체결된 거래량"을 나눠서, 어느 쪽이 그 캔들의 거래량을 주도했는지 비율로 계산해요. 이 비율이 거래량 급증, 캔들 색깔(양봉/음봉)과 함께 나타날 때 신호로 취급합니다.</p>
  <p class="en">Within each 15-minute candle, volume executed via buy orders versus sell orders gets split out, producing a ratio showing which side dominated that candle's volume. This ratio is treated as a signal when it coincides with a volume spike and a matching candle color (green/red).</p>
  <p class="ja">各15分足の中で「買い注文で約定した出来高」と「売り注文で約定した出来高」を分け、どちらがそのローソク足の出来高を主導したかを比率で計算します。この比率が出来高急増、ローソク足の色(陽線/陰線)と共に現れる時にシグナルとして扱います。</p>
  <p class="es">Dentro de cada vela de 15 minutos, el volumen ejecutado vía órdenes de compra versus órdenes de venta se separa, produciendo una proporción que muestra qué lado dominó el volumen de esa vela. Esta proporción se trata como una señal cuando coincide con un pico de volumen y un color de vela correspondiente (verde/rojo).</p>
  <p class="de">Innerhalb jeder 15-Minuten-Kerze wird das über Kauf- versus Verkaufsaufträge ausgeführte Volumen aufgeteilt, was ein Verhältnis ergibt, das zeigt, welche Seite das Volumen dieser Kerze dominierte. Dieses Verhältnis wird als Signal behandelt, wenn es mit einem Volumenspitzenwert und einer passenden Kerzenfarbe (grün/rot) zusammenfällt.</p>

  <div class="ko">
  <svg viewBox="0 0 700 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">두 신호가 트리거되는 조건</text>
    <g font-family="sans-serif">
      <rect x="40" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#4ade80" stroke-width="1.5"/>
      <text x="185" y="85" fill="#4ade80" font-size="13" font-weight="700" text-anchor="middle">매수 주도 (FOMO/과열)</text>
      <text x="60" y="115" fill="#e4e4e7" font-size="11">✓ 매수 비율 ≥ 65%</text>
      <text x="60" y="140" fill="#e4e4e7" font-size="11">✓ 거래량 급증 (직전 대비)</text>
      <text x="60" y="165" fill="#e4e4e7" font-size="11">✓ 양봉 (가격 상승 마감)</text>
      <text x="60" y="200" fill="#71717a" font-size="10">→ 고점 근처에서 나오면</text>
      <text x="60" y="215" fill="#71717a" font-size="10">   과열 매수 경계 신호</text>

      <rect x="370" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#f87171" stroke-width="1.5"/>
      <text x="515" y="85" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">매도 주도 (Capitulation)</text>
      <text x="390" y="115" fill="#e4e4e7" font-size="11">✓ 매도 비율 ≥ 58%</text>
      <text x="390" y="140" fill="#e4e4e7" font-size="11">✓ 거래량 급증 (직전 대비)</text>
      <text x="390" y="165" fill="#e4e4e7" font-size="11">✓ 음봉 (가격 하락 마감)</text>
      <text x="390" y="200" fill="#71717a" font-size="10">→ 저점 근처에서 나오면</text>
      <text x="390" y="215" fill="#71717a" font-size="10">   항복 매도 후 반등 신호</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Conditions That Trigger Each Signal</text>
    <g font-family="sans-serif">
      <rect x="40" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#4ade80" stroke-width="1.5"/>
      <text x="185" y="85" fill="#4ade80" font-size="13" font-weight="700" text-anchor="middle">Buy-Led (FOMO/Overheat)</text>
      <text x="60" y="115" fill="#e4e4e7" font-size="11">✓ Buy ratio ≥ 65%</text>
      <text x="60" y="140" fill="#e4e4e7" font-size="11">✓ Volume spike (vs. prior)</text>
      <text x="60" y="165" fill="#e4e4e7" font-size="11">✓ Green candle (closed up)</text>
      <text x="60" y="200" fill="#71717a" font-size="10">→ Near a high, signals</text>
      <text x="60" y="215" fill="#71717a" font-size="10">   overheated buying caution</text>

      <rect x="370" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#f87171" stroke-width="1.5"/>
      <text x="515" y="85" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">Sell-Led (Capitulation)</text>
      <text x="390" y="115" fill="#e4e4e7" font-size="11">✓ Sell ratio ≥ 58%</text>
      <text x="390" y="140" fill="#e4e4e7" font-size="11">✓ Volume spike (vs. prior)</text>
      <text x="390" y="165" fill="#e4e4e7" font-size="11">✓ Red candle (closed down)</text>
      <text x="390" y="200" fill="#71717a" font-size="10">→ Near a low, signals</text>
      <text x="390" y="215" fill="#71717a" font-size="10">   capitulation-then-rebound</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">2つのシグナルが発動する条件</text>
    <g font-family="sans-serif">
      <rect x="40" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#4ade80" stroke-width="1.5"/>
      <text x="185" y="85" fill="#4ade80" font-size="13" font-weight="700" text-anchor="middle">買い主導 (FOMO/過熱)</text>
      <text x="60" y="115" fill="#e4e4e7" font-size="11">✓ 買い比率 ≥ 65%</text>
      <text x="60" y="140" fill="#e4e4e7" font-size="11">✓ 出来高急増 (直前比)</text>
      <text x="60" y="165" fill="#e4e4e7" font-size="11">✓ 陽線 (価格上昇で終了)</text>
      <text x="60" y="200" fill="#71717a" font-size="10">→ 天井付近で出現すると</text>
      <text x="60" y="215" fill="#71717a" font-size="10">   過熱買い警戒シグナル</text>

      <rect x="370" y="55" width="290" height="175" rx="10" fill="#111113" stroke="#f87171" stroke-width="1.5"/>
      <text x="515" y="85" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">売り主導 (Capitulation)</text>
      <text x="390" y="115" fill="#e4e4e7" font-size="11">✓ 売り比率 ≥ 58%</text>
      <text x="390" y="140" fill="#e4e4e7" font-size="11">✓ 出来高急増 (直前比)</text>
      <text x="390" y="165" fill="#e4e4e7" font-size="11">✓ 陰線 (価格下落で終了)</text>
      <text x="390" y="200" fill="#71717a" font-size="10">→ 底値付近で出現すると</text>
      <text x="390" y="215" fill="#71717a" font-size="10">   投げ売り後の反発シグナル</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">왜 매수 임계값(65%)이 매도 임계값(58%)보다 높은가</h2>
  <h2 class="en">Why is the buy threshold (65%) higher than the sell threshold (58%)?</h2>
  <h2 class="es">¿Por qué el umbral de compra (65%) es más alto que el de venta (58%)?</h2>
  <h2 class="de">Warum ist die Kaufschwelle (65%) höher als die Verkaufsschwelle (58%)?</h2>
  <p class="ko">이건 시장의 비대칭적 습성 때문이에요. 패닉 매도는 상대적으로 빠르고 격렬하게 나타나는 경향이 있어서, 상대적으로 낮은 매도 비중에서도 유의미한 신호가 되는 경우가 많아요. 반면 매수 주도 랠리는 좀 더 점진적으로 쌓이는 경향이 있어서, 진짜 과열을 구분하려면 더 높은 기준이 필요합니다.</p>
  <p class="en">This reflects a real market asymmetry. Panic selling tends to strike faster and harder, so a meaningful signal can show up at a relatively lower sell-side ratio. Buy-led rallies tend to build more gradually, so distinguishing genuine overheating requires a higher bar.</p>
  <p class="ja">これは市場の非対称的な性質によるものです。パニック売りは相対的に速く激しく現れる傾向があるため、比較的低い売り比率でも意味のあるシグナルになることが多いです。一方、買い主導のラリーはより緩やかに積み上がる傾向があるため、本当の過熱を見分けるにはより高い基準が必要です。</p>
  <p class="es">Esto refleja una asimetría real del mercado. La venta de pánico tiende a golpear más rápido y con más fuerza, por lo que una señal significativa puede aparecer con una proporción del lado vendedor relativamente más baja. Los repuntes liderados por compra tienden a construirse más gradualmente, por lo que distinguir el sobrecalentamiento genuino requiere un umbral más alto.</p>
  <p class="de">Dies spiegelt eine echte Marktasymmetrie wider. Panikverkäufe treten tendenziell schneller und heftiger auf, sodass ein bedeutsames Signal bereits bei einem relativ niedrigeren Verkaufsverhältnis auftreten kann. Kaufgeführte Rallys bauen sich tendenziell allmählicher auf, sodass die Unterscheidung echter Überhitzung eine höhere Schwelle erfordert.</p>

  <h2 class="ko">이 지표만의 장점 — 다른 지표가 놓치는 걸 잡는다</h2>
  <h2 class="en">Its unique edge — catching what other indicators miss</h2>
  <h2 class="ja">この指標だけの強み — 他の指標が見逃すものを捉える</h2>
  <h2 class="es">Su ventaja única — captura lo que otros indicadores pierden</h2>
  <h2 class="de">Sein einzigartiger Vorteil — erfasst, was andere Indikatoren übersehen</h2>
  <p class="ko">일봉 <a href="/blog/rsi-bitcoin.html">RSI</a>나 온체인 지표들은 하루가 지나야 반영되는데, 그 사이에 이미 상황이 끝나버리는 경우가 많아요. 15분봉 기반이라, 급락·급등이 실시간으로 진행 중일 때 <strong>그 순간의 매수·매도 압력이 어느 쪽으로 쏠렸는지</strong>를 몇 시간~하루 지연되는 지표들보다 훨씬 빠르게 보여줍니다.</p>
  <p class="en">Daily <a href="/blog/rsi-bitcoin.html">RSI</a> and on-chain indicators only reflect a day later — often after the situation has already resolved. Built on 15-minute candles, this shows <strong>which direction buy/sell pressure is leaning right now</strong> while a sharp move is still unfolding, far faster than indicators with hours-to-a-day of lag.</p>
  <p class="ja">日足の<a href="/blog/rsi-bitcoin.html">RSI</a>やオンチェーン指標は1日経ってから反映されますが、その間にすでに状況が終わっていることが多いです。15分足ベースのため、急落・急騰がリアルタイムで進行している時に、<strong>その瞬間の買い・売り圧力がどちらに傾いているか</strong>を、数時間〜1日遅延する指標よりもはるかに速く示します。</p>
  <p class="es">El <a href="/blog/rsi-bitcoin.html">RSI</a> diario y los indicadores on-chain solo reflejan un día después — a menudo cuando la situación ya se ha resuelto. Construido sobre velas de 15 minutos, este muestra <strong>hacia dónde se inclina la presión de compra/venta en este momento</strong> mientras un movimiento brusco todavía se está desarrollando, mucho más rápido que indicadores con horas a un día de retraso.</p>
  <p class="de">Der tägliche <a href="/blog/rsi-bitcoin.html">RSI</a> und On-Chain-Indikatoren spiegeln erst einen Tag später wider — oft nachdem sich die Situation bereits aufgelöst hat. Aufgebaut auf 15-Minuten-Kerzen zeigt dies, <strong>in welche Richtung der Kauf-/Verkaufsdruck gerade tendiert</strong>, während sich eine scharfe Bewegung noch entfaltet, weit schneller als Indikatoren mit Stunden- bis Tagesverzögerung.</p>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <h2 class="es">Advertencias importantes</h2>
  <h2 class="de">Wichtige Einschränkungen</h2>
  <ul class="ko">
    <li><strong>노이즈가 많음.</strong> 15분이라는 짧은 시간축 특성상 가짜 신호가 자주 나올 수 있어, 단독으로 큰 포지션의 근거로 쓰기엔 부적합합니다.</li>
    <li><strong>거래소 데이터 한정.</strong> 특정 거래소의 체결 데이터를 기준으로 하므로, 전체 시장을 완벽히 대표하지 않을 수 있습니다.</li>
  </ul>
  <ul class="en">
    <li><strong>Noisy by nature.</strong> The short 15-minute window means false signals are common — not ideal as sole justification for a large position.</li>
    <li><strong>Limited to exchange-specific data.</strong> Based on one exchange's execution data, so it may not perfectly represent the entire market.</li>
  </ul>
  <ul class="ja">
    <li><strong>ノイズが多い。</strong> 15分という短い時間軸の特性上、偽シグナルが頻繁に出ることがあり、単独で大きなポジションの根拠にするには不向きです。</li>
    <li><strong>取引所データに限定。</strong> 特定の取引所の約定データを基準とするため、市場全体を完全に代表しない可能性があります。</li>
  </ul>
  <ul class="es">
    <li><strong>Ruidoso por naturaleza.</strong> La corta ventana de 15 minutos significa que las señales falsas son comunes — no ideal como única justificación para una posición grande.</li>
    <li><strong>Limitado a datos específicos del exchange.</strong> Basado en los datos de ejecución de un exchange, por lo que puede no representar perfectamente todo el mercado.</li>
  </ul>
  <ul class="de">
    <li><strong>Von Natur aus verrauscht.</strong> Das kurze 15-Minuten-Fenster bedeutet, dass Fehlsignale häufig sind — nicht ideal als alleinige Rechtfertigung für eine große Position.</li>
    <li><strong>Beschränkt auf börsenspezifische Daten.</strong> Basiert auf den Ausführungsdaten einer Börse, sodass es den gesamten Markt möglicherweise nicht perfekt repräsentiert.</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best combined with</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor combinado con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <p class="ko"><a href="/blog/sth-sopr.html">STH-SOPR</a>이나 <a href="/blog/hash-ribbon-indicator.html">Hash Ribbon</a> 같은 느린 지표가 "큰 그림에서 항복 국면"을 확인해줄 때, 이 지표로 "지금 이 순간이 바로 그 항복의 정점인지"를 초 단위로 확인하는 조합이 효과적입니다.</p>
  <p class="en">Effective when combined with slower indicators like <a href="/blog/sth-sopr.html">STH-SOPR</a> or <a href="/blog/hash-ribbon-indicator.html">Hash Ribbon</a> confirming "capitulation in the big picture," while this indicator confirms "whether this exact moment is the peak of that capitulation" down to the minute.</p>
  <p class="ja"><a href="/blog/sth-sopr.html">STH-SOPR</a>や<a href="/blog/hash-ribbon-indicator.html">Hash Ribbon</a>のような遅い指標が「大局的なキャピチュレーション局面」を確認してくれる時、この指標で「今この瞬間がまさにそのキャピチュレーションのピークなのか」を分単位で確認する組み合わせが効果的です。</p>
  <p class="es">Efectivo cuando se combina con indicadores más lentos como <a href="/blog/sth-sopr.html">STH-SOPR</a> o <a href="/blog/hash-ribbon-indicator.html">Hash Ribbon</a> que confirman "capitulación en el panorama general," mientras este indicador confirma "si este momento exacto es el pico de esa capitulación" al minuto.</p>
  <p class="de">Effektiv in Kombination mit langsameren Indikatoren wie <a href="/blog/sth-sopr.html">STH-SOPR</a> oder <a href="/blog/hash-ribbon-indicator.html">Hash Ribbon</a>, die "Kapitulation im großen Bild" bestätigen, während dieser Indikator bestätigt, "ob genau dieser Moment der Höhepunkt dieser Kapitulation ist" auf die Minute genau.</p>
<?php require __DIR__.'/_footer.php'; ?>
