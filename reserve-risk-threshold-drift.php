<?php $slug = 'reserve-risk-threshold-drift'; require __DIR__.'/_header.php'; ?>

<p class="ko">온체인 지표들은 대개 "지금 싸다" 또는 "지금 비싸다"라는 질문 하나에 답하는 걸 목표로 삼는다. 리저브 리스크(Reserve Risk)는 여기서 한 발 더 나아간다 — 가격이 얼마나 싼지가 아니라, 그 가격 앞에서 장기 보유자들이 얼마나 팔고 싶은 유혹을 견디고 있는지를 잰다. 온체인 애널리스트 한스 하우게(Hans Hauge)가 고안한 이 지표는 단순한 아이디어에서 출발한다: 보유자가 코인을 건드리지 않고 오래 들고 있을수록, '팔지 않기로 한' 그 선택이 누적된 기회비용으로 쌓인다는 것이다. 리저브 리스크는 이렇게 누적된 기회비용과, 지금 당장의 판매 유혹 — 즉 가격 — 사이의 비율을 나타낸다.</p>
  <p class="en">On-chain indicators usually aim to answer one question: is Bitcoin cheap right now, or expensive? Reserve Risk goes a step further — it doesn't measure how cheap the price is, but how much temptation to sell long-term holders are resisting at that price. Devised by on-chain analyst Hans Hauge, the metric starts from a simple idea: the longer a holder leaves coins untouched, the more that choice not to sell accumulates into a stored-up opportunity cost. Reserve Risk expresses the ratio between that accumulated cost and the immediate temptation to cash out today — the price.</p>
  <p class="ja">オンチェーン指標の多くは、「今は割安か、割高か」という一つの問いに答えることを目指す。リザーブリスク(Reserve Risk)はそこからさらに一歩進む——価格がどれだけ割安かではなく、その価格を前にして長期保有者がどれだけ売りたい誘惑に耐えているかを測るのだ。オンチェーンアナリストのハンス・ハウゲ(Hans Hauge)が考案したこの指標は、単純な発想から出発している。保有者がコインを動かさずに持ち続ける時間が長くなるほど、「売らない」という選択が積み重なって、蓄積された機会費用になっていくという発想だ。リザーブリスクは、この蓄積された機会費用と、今この瞬間の売却誘惑——つまり価格——との比率を表す。</p>

  <p class="es">Los indicadores on-chain suelen apuntar a responder una sola pregunta: ¿está Bitcoin barato o caro ahora mismo? Reserve Risk va un paso más allá: no mide cuán barato está el precio, sino cuánta tentación de vender están resistiendo los holders de largo plazo a ese precio. Ideado por el analista on-chain Hans Hauge, el indicador parte de una idea simple: cuanto más tiempo mantiene un holder sus monedas sin moverlas, más se acumula esa decisión de no vender en un coste de oportunidad acumulado. Reserve Risk expresa la razón entre ese coste acumulado y la tentación inmediata de vender hoy mismo, es decir, el precio.</p>
  <p class="de">On-Chain-Indikatoren wollen meist eine einzige Frage beantworten: Ist Bitcoin gerade günstig oder teuer? Reserve Risk geht einen Schritt weiter — es misst nicht, wie günstig der Preis ist, sondern wie viel Verkaufsversuchung langfristige Halter bei diesem Preis gerade widerstehen. Der von dem On-Chain-Analysten Hans Hauge entwickelte Indikator geht von einer einfachen Idee aus: Je länger ein Halter seine Coins unangetastet lässt, desto mehr summiert sich diese Entscheidung, nicht zu verkaufen, zu aufgestauten Opportunitätskosten. Reserve Risk drückt das Verhältnis zwischen diesen aufgestauten Kosten und der unmittelbaren Versuchung aus, heute zu verkaufen — also dem Preis.</p>

  <p class="ko">이 지표가 흥미로운 이유는 실적 때문만은 아니지만, 그 실적 자체는 진짜다. 리저브 리스크는 2015년 약세장과 2020년 3월 코로나 폭락 구간에서 역사상 가장 낮은 값을 기록했고, 2013년과 2017년, 2021년 초의 급등 국면에서는 정확히 반대 극단까지 치솟았다. 문제는 이 계산의 분모, 즉 '홀드뱅크(HODL Bank)'가 절대 0으로 리셋되지 않는 누적값이라는 데 있다. 누적값을 분모로 쓰는 모든 지표가 그렇듯, 사이클이 반복될수록 같은 절대 숫자가 다른 것을 의미하기 시작한다. 이 글은 리저브 리스크가 실제로 무엇을 계산하는지, 그리고 그 계산이 어디서부터 조용히 어긋나기 시작하는지를 다룬다.</p>
  <p class="en">What makes this metric interesting isn't just its track record, though that record is real: Reserve Risk hit its lowest readings in history during the 2015 bear market and the March 2020 COVID crash, and spiked to the opposite extreme during the 2013, 2017, and early-2021 blow-off tops. The trouble is the denominator behind that calculation — the so-called HODL Bank — is a cumulative sum that never resets to zero. And as with any indicator built on a cumulative denominator, the same absolute number starts to mean something different every time the cycle repeats. This piece looks at what Reserve Risk actually computes, and exactly where that computation quietly starts to drift.</p>
  <p class="ja">この指標が興味深いのは実績だけの話ではないが、その実績自体は本物だ。リザーブリスクは2015年の弱気相場と2020年3月のコロナ暴落局面で史上最低の値を記録し、2013年、2017年、2021年初めの急騰局面では正反対の極端にまで跳ね上がった。問題は、この計算の分母——いわゆる「ホドルバンク(HODL Bank)」——が決してゼロにリセットされない累積値だという点にある。そして累積分母を持つあらゆる指標がそうであるように、サイクルが繰り返されるたびに、同じ絶対数値が違う意味を持ち始める。本稿では、リザーブリスクが実際に何を計算しているのか、そしてその計算がどこから静かにずれ始めるのかを見ていく。</p>

  <p class="es">Lo que hace interesante a este indicador no es solo su historial, aunque ese historial es real: Reserve Risk marcó sus lecturas más bajas de la historia durante el mercado bajista de 2015 y el desplome de marzo de 2020 por el COVID, y se disparó al extremo opuesto durante los techos de 2013, 2017 y principios de 2021. El problema está en el denominador de ese cálculo —el llamado HODL Bank—, que es una suma acumulada que jamás vuelve a cero. Y como ocurre con cualquier indicador construido sobre un denominador acumulativo, el mismo número absoluto empieza a significar algo distinto cada vez que se repite el ciclo. Este artículo examina qué calcula realmente Reserve Risk, y en qué punto exacto ese cálculo empieza a desviarse silenciosamente.</p>
  <p class="de">Was diesen Indikator interessant macht, ist nicht nur seine Erfolgsbilanz, auch wenn diese real ist: Reserve Risk erreichte während des Bärenmarkts 2015 und des Corona-Crashs im März 2020 seine niedrigsten je gemessenen Werte und schoss während der Tops 2013, 2017 und Anfang 2021 ins genaue Gegenteil. Das Problem liegt im Nenner dieser Berechnung — der sogenannten HODL Bank —, einer kumulativen Summe, die nie wieder auf null zurückgesetzt wird. Und wie bei jedem Indikator mit kumulativem Nenner beginnt dieselbe absolute Zahl mit jedem wiederholten Zyklus, etwas anderes zu bedeuten. Dieser Beitrag untersucht, was Reserve Risk tatsächlich berechnet — und an welcher Stelle diese Berechnung beginnt, still zu driften.</p>

  <h2 class="ko">공식이 실제로 계산하는 것: 가격과 확신의 줄다리기</h2>
  <h2 class="en">What the Formula Actually Computes: Price Against Conviction</h2>
  <h2 class="ja">公式が実際に計算しているもの:価格と確信の綱引き</h2>
  <h2 class="es">Lo Que la Fórmula Realmente Calcula: Precio Contra Convicción</h2>
  <h2 class="de">Was die Formel tatsächlich berechnet: Preis gegen Überzeugung</h2>

  <p class="ko">공식 자체는 비율 하나로 요약된다. 리저브 리스크 = 가격 ÷ 홀드뱅크(HODL Bank). 분자인 가격은 '지금 팔고 싶은 유혹'의 크기를 나타낸다. 분모는 조금 더 복잡한데, 코인 소각일수(Coin Days Destroyed)에 가격을 곱한 값의 중앙값(MVOCD, Median Value of Coin Days Destroyed)을 매일의 가격에서 뺀 차이를, 첫날부터 오늘까지 전부 더한 누적합이다. 쉽게 풀면, 보유자가 코인을 옮기지 않고 하루를 더 버틸 때마다 '팔 수 있었지만 팔지 않은' 그날의 가격만큼이 이 은행에 조금씩 쌓인다. 홀드뱅크가 커진다는 건 그만큼 장기 보유자들의 누적된 확신이 두꺼워졌다는 뜻이다.</p>
  <p class="en">The formula itself boils down to one ratio: Reserve Risk = Price ÷ HODL Bank. The numerator, price, represents the size of the temptation to sell right now. The denominator is more involved: it's the running, lifetime cumulative sum of the daily gap between price and the Median Value of Coin Days Destroyed (MVOCD) — coin days destroyed multiplied by price, then smoothed to a median to strip out noise. In plain terms, every day a holder chooses not to move a coin, that day's price gets added, bit by bit, into this bank of foregone sales. A growing HODL Bank means the accumulated conviction of long-term holders has grown thicker.</p>
  <p class="ja">公式自体は一つの比率に集約される。リザーブリスク = 価格 ÷ ホドルバンク(HODL Bank)。分子である価格は、「今すぐ売りたい」という誘惑の大きさを表す。分母はもう少し複雑で、コイン消失日数(Coin Days Destroyed)に価格を掛けた値の中央値(MVOCD、Median Value of Coin Days Destroyed)を毎日の価格から差し引いた差を、最初から今日まですべて足し合わせた累積合計だ。平たく言えば、保有者がコインを動かさずにもう一日持ちこたえるたびに、「売れたのに売らなかった」その日の価格分が、少しずつこの銀行に積み立てられていく。ホドルバンクが増えるということは、それだけ長期保有者の累積された確信が厚みを増したということだ。</p>

  <p class="es">La fórmula en sí se reduce a una razón: Reserve Risk = Precio ÷ HODL Bank. El numerador, el precio, representa el tamaño de la tentación de vender ahora mismo. El denominador es más elaborado: es la suma acumulada, de por vida, de la diferencia diaria entre el precio y el Valor Mediano de los Días-Moneda Destruidos (MVOCD) —los días-moneda destruidos multiplicados por el precio, suavizados con una mediana para eliminar el ruido—. En términos simples, cada día que un holder decide no mover una moneda, el precio de ese día se suma, poco a poco, a este banco de ventas no realizadas. Un HODL Bank creciente significa que la convicción acumulada de los holders de largo plazo se ha vuelto más sólida.</p>
  <p class="de">Die Formel selbst läuft auf ein einziges Verhältnis hinaus: Reserve Risk = Preis ÷ HODL Bank. Der Zähler, der Preis, steht für die Größe der Versuchung, jetzt sofort zu verkaufen. Der Nenner ist komplizierter: Er ist die über die gesamte Lebensdauer laufende kumulative Summe der täglichen Differenz zwischen dem Preis und dem Medianwert der vernichteten Coin-Tage (MVOCD, Median Value of Coin Days Destroyed) — vernichtete Coin-Tage multipliziert mit dem Preis, geglättet auf einen Median, um Rauschen zu entfernen. Einfach gesagt: Jeden Tag, an dem ein Halter sich entscheidet, einen Coin nicht zu bewegen, wird der Preis dieses Tages Stück für Stück in diese Bank nicht realisierter Verkäufe eingezahlt. Eine wachsende HODL Bank bedeutet, dass die aufgestaute Überzeugung langfristiger Halter dicker geworden ist.</p>

  <p class="ko">이 비율이 낮다는 건 두 가지가 동시에 벌어지고 있다는 뜻이다 — 분자(가격)는 낮고, 분모(누적된 확신)는 두껍다. 실제로 리저브 리스크가 0.002 아래로 내려간 건 비트코인 역사 전체에서 단 두 번, 2015년 약세장과 2020년 3월 폭락 구간뿐이었다. 반대로 0.02를 넘어서는 순간은 가격이 급등해 분자가 부풀어 오르는 동시에, 오래 버티던 보유자들마저 물량을 풀기 시작해 분모의 증가세가 꺾이는 국면과 일치한다. 이 지표가 다른 밸류에이션 지표와 다른 지점이 여기다 — 가격의 절대 수준이 아니라 '팔지 않겠다는 결정이 얼마나 오래, 얼마나 두껍게 쌓여왔는가'라는 행동 데이터를 분모 자체에 직접 박아 넣었다는 것.</p>
  <p class="en">A low ratio means two things are happening at once — the numerator (price) is low, and the denominator (accumulated conviction) is thick. In practice, Reserve Risk has dropped below 0.002 only twice in Bitcoin's entire history: during the 2015 bear market and the March 2020 crash. The opposite extreme, crossing above 0.02, coincides with moments when price surges (inflating the numerator) at the very same time long-held coins start moving again, as even patient holders begin distributing (flattening the denominator's growth). This is where the metric departs from ordinary valuation indicators: instead of measuring the absolute price level, it bakes behavioral data — how long, and how thickly, the decision not to sell has been piling up — directly into the denominator.</p>
  <p class="ja">この比率が低いということは、二つのことが同時に起きているという意味だ——分子(価格)は低く、分母(蓄積された確信)は厚い。実際、リザーブリスクが0.002を下回ったのは、ビットコインの歴史全体でも2015年の弱気相場と2020年3月の暴落、この二回だけだ。逆に0.02を超える瞬間は、価格が急騰して分子が膨らむと同時に、長らく持ちこたえていた保有者までもが売り始め、分母の増加ペースが鈍る局面と一致する。この指標が他のバリュエーション指標と一線を画すのはここだ——価格の絶対水準ではなく、「売らないという決断がどれだけ長く、どれだけ厚く積み重なってきたか」という行動データを、分母そのものに組み込んでいる点だ。</p>

  <p class="es">Una razón baja significa que ocurren dos cosas a la vez: el numerador (precio) es bajo, y el denominador (convicción acumulada) es sólido. En la práctica, Reserve Risk solo ha caído por debajo de 0.002 dos veces en toda la historia de Bitcoin: durante el mercado bajista de 2015 y el desplome de marzo de 2020. El extremo opuesto, superar 0.02, coincide con momentos en que el precio se dispara (inflando el numerador) justo cuando incluso los holders más pacientes empiezan a distribuir, frenando el crecimiento del denominador. Aquí es donde este indicador se separa de los indicadores de valoración habituales: en lugar de medir el nivel absoluto del precio, incorpora directamente en el denominador un dato de comportamiento —cuánto tiempo, y con qué solidez, se ha ido acumulando la decisión de no vender—.</p>
  <p class="de">Ein niedriges Verhältnis bedeutet, dass zwei Dinge gleichzeitig passieren — der Zähler (Preis) ist niedrig, und der Nenner (aufgestaute Überzeugung) ist dick. In der Praxis ist Reserve Risk in der gesamten Geschichte von Bitcoin nur zweimal unter 0,002 gefallen: während des Bärenmarkts 2015 und des Crashs im März 2020. Das entgegengesetzte Extrem, das Überschreiten von 0,02, fällt mit Momenten zusammen, in denen der Preis in die Höhe schießt (der Zähler bläht sich auf) und gleichzeitig selbst geduldige Halter beginnen, Bestände abzugeben, wodurch das Wachstum des Nenners abflacht. Genau hier unterscheidet sich dieser Indikator von gewöhnlichen Bewertungsindikatoren: Statt das absolute Preisniveau zu messen, baut er Verhaltensdaten — wie lange und wie dick sich die Entscheidung, nicht zu verkaufen, aufgestaut hat — direkt in den Nenner ein.</p>

  <h2 class="ko">실제로 맞았던 순간들</h2>
  <h2 class="en">The Moments It Actually Called Right</h2>
  <h2 class="ja">実際に的中した瞬間</h2>
  <h2 class="es">Los Momentos en Que Realmente Acertó</h2>
  <h2 class="de">Die Momente, in denen es tatsächlich richtig lag</h2>

  <p class="ko">리저브 리스크의 트랙 레코드는 실제로 상당히 인상적이다. 0.02를 넘는 레드존은 비트코인 역사에서 네 차례 나타났고, 각각 2013년의 두 차례 급등, 2017년 12월의 블로우오프 탑, 그리고 2021년 초의 급등과 맞아떨어졌다. 반대로 0.002 아래의 그린존은 단 두 번, 2015년 바닥과 2020년 3월 팬데믹 폭락에서만 나타났다. 두 극단 모두에서 이 지표는 그 시점을 지배하던 '이번엔 다르다'는 서사와 무관하게, 순수하게 온체인 행동 데이터만으로 극단적 국면을 짚어냈다.</p>
  <p class="en">Reserve Risk's track record is genuinely striking. Its red zone, above 0.02, has appeared four times in Bitcoin's history, matching the two 2013 spikes, the December 2017 blow-off top, and the early-2021 surge. Its green zone, below 0.002, has appeared only twice — the 2015 bottom and the March 2020 pandemic crash. In both extremes, the metric flagged the moment purely from on-chain behavioral data, independent of whatever "this time is different" narrative dominated the headlines at the time.</p>
  <p class="ja">リザーブリスクの実績は実際、かなり印象的だ。0.02を超えるレッドゾーンはビットコインの歴史上4回現れ、それぞれ2013年の2度の急騰、2017年12月のブローオフトップ、そして2021年初めの急騰と一致した。逆に0.002を下回るグリーンゾーンは2回だけ——2015年の底と2020年3月のパンデミック暴落だ。両極端において、この指標は当時支配的だった「今回は違う」という物語とは無関係に、純粋にオンチェーンの行動データだけで極端な局面を言い当てた。</p>

  <p class="es">El historial de Reserve Risk es realmente notable. Su zona roja, por encima de 0.02, ha aparecido cuatro veces en la historia de Bitcoin, coincidiendo con los dos picos de 2013, el techo especulativo de diciembre de 2017 y el repunte de principios de 2021. Su zona verde, por debajo de 0.002, ha aparecido solo dos veces: el suelo de 2015 y el desplome pandémico de marzo de 2020. En ambos extremos, el indicador señaló el momento basándose únicamente en datos de comportamiento on-chain, sin importar qué narrativa de "esta vez es diferente" dominara los titulares en ese instante.</p>
  <p class="de">Die Erfolgsbilanz von Reserve Risk ist wirklich beeindruckend. Seine rote Zone, oberhalb von 0,02, ist in der Geschichte von Bitcoin viermal aufgetaucht — passend zu den beiden Spitzen von 2013, dem Blow-off-Top im Dezember 2017 und dem Anstieg Anfang 2021. Seine grüne Zone, unterhalb von 0,002, ist nur zweimal aufgetaucht: beim Boden 2015 und beim Pandemie-Crash im März 2020. In beiden Extremen markierte der Indikator den Moment rein anhand von On-Chain-Verhaltensdaten — unabhängig davon, welche "Diesmal ist alles anders"-Erzählung damals die Schlagzeilen beherrschte.</p>

  <div class="ko">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">리저브 리스크 흐름: 그린존·레드존, 그리고 2022년의 균열</text>
    <text x="20" y="42" fill="#71717a" font-size="10" font-family="sans-serif">레드존 &gt; 0.02(분산), 그린존 &lt; 0.002(축적) · 로그축 개념도</text>
    <rect x="70" y="40" width="580" height="50" fill="#f87171" opacity="0.08"/>
    <text x="360" y="55" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">레드존 (Reserve Risk &gt; 0.02)</text>
    <rect x="70" y="210" width="580" height="50" fill="#4ade80" opacity="0.08"/>
    <text x="360" y="252" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">그린존 (Reserve Risk &lt; 0.002)</text>
    <line x1="70" y1="90" x2="650" y2="90" stroke="#f87171" stroke-dasharray="4,4" opacity="0.5"/>
    <line x1="70" y1="210" x2="650" y2="210" stroke="#4ade80" stroke-dasharray="4,4" opacity="0.5"/>
    <polyline points="70,150 110,58 145,52 170,150 195,240 230,190 300,48 340,150 390,245 420,150 445,55 475,150 505,222 535,190 565,218 600,180 650,150" fill="none" stroke="#fbbf24" stroke-width="2.2"/>
    <circle cx="110" cy="58" r="4" fill="#f87171"/><circle cx="145" cy="52" r="4" fill="#f87171"/>
    <text x="127" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2013 (2차례)</text>
    <circle cx="195" cy="240" r="4" fill="#4ade80"/>
    <text x="195" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif">2015 바닥</text>
    <circle cx="300" cy="48" r="4" fill="#f87171"/>
    <text x="300" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2017.12 탑</text>
    <circle cx="390" cy="245" r="4.5" fill="#4ade80"/>
    <text x="390" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">2020.3 최저치</text>
    <circle cx="445" cy="55" r="4" fill="#f87171"/>
    <text x="445" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2021 초 탑</text>
    <circle cx="505" cy="222" r="4" fill="#fbbf24"/><circle cx="565" cy="218" r="4" fill="#fbbf24"/>
    <text x="535" y="30" fill="#fbbf24" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">2022.6·2023.8 두 차례 터치(그린존 근처, 미확정)</text>
    <circle cx="650" cy="150" r="4" fill="#a1a1aa"/>
    <text x="628" y="292" fill="#d4d4d8" font-size="10" text-anchor="end" font-family="sans-serif">현재</text>
  </svg>
  <p class="ko" style="font-size:12px;color:#71717a;margin-top:-10px">※ 공개된 임계값(0.002 / 0.02)과 해당 시점의 실제 극단 여부를 바탕으로 구성한 단순화된 개념도이며, 실측 일별 수치는 아닙니다.</p>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Reserve Risk Over Time: Green Zone, Red Zone, and the 2022 Crack</text>
    <text x="20" y="42" fill="#71717a" font-size="10" font-family="sans-serif">Red zone &gt; 0.02 (distribution), green zone &lt; 0.002 (accumulation) · conceptual log-scale illustration</text>
    <rect x="70" y="40" width="580" height="50" fill="#f87171" opacity="0.08"/>
    <text x="360" y="55" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">RED ZONE (Reserve Risk &gt; 0.02)</text>
    <rect x="70" y="210" width="580" height="50" fill="#4ade80" opacity="0.08"/>
    <text x="360" y="252" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">GREEN ZONE (Reserve Risk &lt; 0.002)</text>
    <line x1="70" y1="90" x2="650" y2="90" stroke="#f87171" stroke-dasharray="4,4" opacity="0.5"/>
    <line x1="70" y1="210" x2="650" y2="210" stroke="#4ade80" stroke-dasharray="4,4" opacity="0.5"/>
    <polyline points="70,150 110,58 145,52 170,150 195,240 230,190 300,48 340,150 390,245 420,150 445,55 475,150 505,222 535,190 565,218 600,180 650,150" fill="none" stroke="#fbbf24" stroke-width="2.2"/>
    <circle cx="110" cy="58" r="4" fill="#f87171"/><circle cx="145" cy="52" r="4" fill="#f87171"/>
    <text x="127" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2013 (x2)</text>
    <circle cx="195" cy="240" r="4" fill="#4ade80"/>
    <text x="195" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif">2015 bottom</text>
    <circle cx="300" cy="48" r="4" fill="#f87171"/>
    <text x="300" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Dec 2017 top</text>
    <circle cx="390" cy="245" r="4.5" fill="#4ade80"/>
    <text x="390" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Mar 2020 lowest</text>
    <circle cx="445" cy="55" r="4" fill="#f87171"/>
    <text x="445" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Early 2021 top</text>
    <circle cx="505" cy="222" r="4" fill="#fbbf24"/><circle cx="565" cy="218" r="4" fill="#fbbf24"/>
    <text x="535" y="30" fill="#fbbf24" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Jun 2022 &amp; Aug 2023: two touches near green, unconfirmed</text>
    <circle cx="650" cy="150" r="4" fill="#a1a1aa"/>
    <text x="628" y="292" fill="#d4d4d8" font-size="10" text-anchor="end" font-family="sans-serif">now</text>
  </svg>
  <p class="en" style="font-size:12px;color:#71717a;margin-top:-10px">※ Simplified conceptual illustration built from published thresholds (0.002 / 0.02) and known extreme periods, not raw daily readings.</p>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">リザーブリスクの推移:グリーンゾーン・レッドゾーン、そして2022年の亀裂</text>
    <text x="20" y="42" fill="#71717a" font-size="10" font-family="sans-serif">レッドゾーン &gt; 0.02(分散)、グリーンゾーン &lt; 0.002(蓄積) · 対数軸の概念図</text>
    <rect x="70" y="40" width="580" height="50" fill="#f87171" opacity="0.08"/>
    <text x="360" y="55" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">レッドゾーン (Reserve Risk &gt; 0.02)</text>
    <rect x="70" y="210" width="580" height="50" fill="#4ade80" opacity="0.08"/>
    <text x="360" y="252" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">グリーンゾーン (Reserve Risk &lt; 0.002)</text>
    <line x1="70" y1="90" x2="650" y2="90" stroke="#f87171" stroke-dasharray="4,4" opacity="0.5"/>
    <line x1="70" y1="210" x2="650" y2="210" stroke="#4ade80" stroke-dasharray="4,4" opacity="0.5"/>
    <polyline points="70,150 110,58 145,52 170,150 195,240 230,190 300,48 340,150 390,245 420,150 445,55 475,150 505,222 535,190 565,218 600,180 650,150" fill="none" stroke="#fbbf24" stroke-width="2.2"/>
    <circle cx="110" cy="58" r="4" fill="#f87171"/><circle cx="145" cy="52" r="4" fill="#f87171"/>
    <text x="127" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2013(2回)</text>
    <circle cx="195" cy="240" r="4" fill="#4ade80"/>
    <text x="195" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif">2015年 底</text>
    <circle cx="300" cy="48" r="4" fill="#f87171"/>
    <text x="300" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2017年12月 天井</text>
    <circle cx="390" cy="245" r="4.5" fill="#4ade80"/>
    <text x="390" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">2020年3月 最低値</text>
    <circle cx="445" cy="55" r="4" fill="#f87171"/>
    <text x="445" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2021年初 天井</text>
    <circle cx="505" cy="222" r="4" fill="#fbbf24"/><circle cx="565" cy="218" r="4" fill="#fbbf24"/>
    <text x="535" y="30" fill="#fbbf24" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">2022年6月・2023年8月:グリーンゾーン付近を2回タッチ(未確定)</text>
    <circle cx="650" cy="150" r="4" fill="#a1a1aa"/>
    <text x="628" y="292" fill="#d4d4d8" font-size="10" text-anchor="end" font-family="sans-serif">現在</text>
  </svg>
  <p class="ja" style="font-size:12px;color:#71717a;margin-top:-10px">※ 公開されている閾値(0.002 / 0.02)と各時期の実際の極端値を基に構成した単純化された概念図であり、実測の日次データではありません。</p>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Reserve Risk en el Tiempo: Zona Verde, Zona Roja y la Grieta de 2022</text>
    <text x="20" y="42" fill="#71717a" font-size="10" font-family="sans-serif">Zona roja &gt; 0.02 (distribución), zona verde &lt; 0.002 (acumulación) · ilustración conceptual en escala logarítmica</text>
    <rect x="70" y="40" width="580" height="50" fill="#f87171" opacity="0.08"/>
    <text x="360" y="55" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">ZONA ROJA (Reserve Risk &gt; 0.02)</text>
    <rect x="70" y="210" width="580" height="50" fill="#4ade80" opacity="0.08"/>
    <text x="360" y="252" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">ZONA VERDE (Reserve Risk &lt; 0.002)</text>
    <line x1="70" y1="90" x2="650" y2="90" stroke="#f87171" stroke-dasharray="4,4" opacity="0.5"/>
    <line x1="70" y1="210" x2="650" y2="210" stroke="#4ade80" stroke-dasharray="4,4" opacity="0.5"/>
    <polyline points="70,150 110,58 145,52 170,150 195,240 230,190 300,48 340,150 390,245 420,150 445,55 475,150 505,222 535,190 565,218 600,180 650,150" fill="none" stroke="#fbbf24" stroke-width="2.2"/>
    <circle cx="110" cy="58" r="4" fill="#f87171"/><circle cx="145" cy="52" r="4" fill="#f87171"/>
    <text x="127" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2013 (x2)</text>
    <circle cx="195" cy="240" r="4" fill="#4ade80"/>
    <text x="195" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif">Suelo 2015</text>
    <circle cx="300" cy="48" r="4" fill="#f87171"/>
    <text x="300" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Techo dic. 2017</text>
    <circle cx="390" cy="245" r="4.5" fill="#4ade80"/>
    <text x="390" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Mínimo mar. 2020</text>
    <circle cx="445" cy="55" r="4" fill="#f87171"/>
    <text x="445" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Techo inicio 2021</text>
    <circle cx="505" cy="222" r="4" fill="#fbbf24"/><circle cx="565" cy="218" r="4" fill="#fbbf24"/>
    <text x="535" y="30" fill="#fbbf24" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Jun 2022 y ago 2023: dos toques cerca de la zona verde, sin confirmar</text>
    <circle cx="650" cy="150" r="4" fill="#a1a1aa"/>
    <text x="628" y="292" fill="#d4d4d8" font-size="10" text-anchor="end" font-family="sans-serif">ahora</text>
  </svg>
  <p class="es" style="font-size:12px;color:#71717a;margin-top:-10px">※ Ilustración conceptual simplificada basada en umbrales publicados (0.002 / 0.02) y periodos extremos conocidos, no en lecturas diarias reales.</p>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Reserve Risk im Zeitverlauf: Grüne Zone, Rote Zone und der Riss von 2022</text>
    <text x="20" y="42" fill="#71717a" font-size="10" font-family="sans-serif">Rote Zone &gt; 0,02 (Distribution), grüne Zone &lt; 0,002 (Akkumulation) · konzeptionelle Darstellung, logarithmische Skala</text>
    <rect x="70" y="40" width="580" height="50" fill="#f87171" opacity="0.08"/>
    <text x="360" y="55" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">ROTE ZONE (Reserve Risk &gt; 0,02)</text>
    <rect x="70" y="210" width="580" height="50" fill="#4ade80" opacity="0.08"/>
    <text x="360" y="252" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">GRÜNE ZONE (Reserve Risk &lt; 0,002)</text>
    <line x1="70" y1="90" x2="650" y2="90" stroke="#f87171" stroke-dasharray="4,4" opacity="0.5"/>
    <line x1="70" y1="210" x2="650" y2="210" stroke="#4ade80" stroke-dasharray="4,4" opacity="0.5"/>
    <polyline points="70,150 110,58 145,52 170,150 195,240 230,190 300,48 340,150 390,245 420,150 445,55 475,150 505,222 535,190 565,218 600,180 650,150" fill="none" stroke="#fbbf24" stroke-width="2.2"/>
    <circle cx="110" cy="58" r="4" fill="#f87171"/><circle cx="145" cy="52" r="4" fill="#f87171"/>
    <text x="127" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">2013 (2×)</text>
    <circle cx="195" cy="240" r="4" fill="#4ade80"/>
    <text x="195" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif">Boden 2015</text>
    <circle cx="300" cy="48" r="4" fill="#f87171"/>
    <text x="300" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Top Dez. 2017</text>
    <circle cx="390" cy="245" r="4.5" fill="#4ade80"/>
    <text x="390" y="292" fill="#4ade80" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Tiefpunkt März 2020</text>
    <circle cx="445" cy="55" r="4" fill="#f87171"/>
    <text x="445" y="292" fill="#f87171" font-size="10" text-anchor="middle" font-family="sans-serif">Top Anfang 2021</text>
    <circle cx="505" cy="222" r="4" fill="#fbbf24"/><circle cx="565" cy="218" r="4" fill="#fbbf24"/>
    <text x="535" y="30" fill="#fbbf24" font-size="10" text-anchor="middle" font-family="sans-serif" font-weight="700">Jun. 2022 &amp; Aug. 2023: zwei Berührungen nahe Grün, unbestätigt</text>
    <circle cx="650" cy="150" r="4" fill="#a1a1aa"/>
    <text x="628" y="292" fill="#d4d4d8" font-size="10" text-anchor="end" font-family="sans-serif">jetzt</text>
  </svg>
  <p class="de" style="font-size:12px;color:#71717a;margin-top:-10px">※ Vereinfachte konzeptionelle Darstellung auf Basis veröffentlichter Schwellenwerte (0,002 / 0,02) und bekannter Extremperioden, keine rohen Tageswerte.</p>
  </div>

  <p class="ko">이 트랙 레코드가 설득력 있는 이유는 계산 방식 자체가 사후적으로 끼워 맞춘 게 아니라는 데 있다. 리저브 리스크는 가격을 둘러싼 서사가 형성되기 전부터 코인 이동 패턴을 그대로 반영하도록 설계돼 있어서, 애널리스트가 차트를 보고 나중에 임계값을 정한 게 아니라 서로 다른 붐-버스트 사이클마다 반복적으로 같은 절대 구간(0.002, 0.02)을 오갔다는 사실 자체가 우연이 아니라는 근거가 된다. 그런데 바로 이 "반복적으로 같은 절대 구간"이라는 표현 안에 이 지표의 다음 문제가 숨어 있다.</p>
  <p class="en">What makes this record persuasive is that the calculation wasn't fitted after the fact. Reserve Risk is built to track coin-movement patterns before any price narrative forms, which is exactly why it isn't a coincidence that the metric returned to the same absolute bands — 0.002, 0.02 — across separate boom-bust cycles, rather than an analyst drawing the line in hindsight. But that phrase, "the same absolute bands," is precisely where the metric's next problem is hiding.</p>
  <p class="ja">この実績が説得力を持つのは、計算方法自体が事後的に帳尻を合わせたものではないからだ。リザーブリスクは価格の物語が形成される前からコインの移動パターンをそのまま反映するように設計されており、だからこそアナリストが後からチャートを見て閾値を決めたのではなく、複数の別々のブーム・バスト・サイクルを通じて同じ絶対的な帯域(0.002、0.02)を繰り返し行き来したという事実自体が、偶然ではないことの根拠になる。しかし、この「同じ絶対的な帯域」という表現の中にこそ、この指標の次なる問題が隠れている。</p>

  <p class="es">Lo que hace convincente este historial es que el cálculo no se ajustó a posteriori. Reserve Risk está construido para reflejar los patrones de movimiento de monedas antes de que se forme cualquier narrativa de precio, razón por la cual no es casualidad que el indicador regresara a las mismas bandas absolutas —0.002, 0.02— a lo largo de ciclos de auge y caída independientes, en lugar de que un analista trazara la línea en retrospectiva. Pero esa frase, "las mismas bandas absolutas", es exactamente donde se esconde el siguiente problema del indicador.</p>
  <p class="de">Diese Bilanz überzeugt gerade deshalb, weil die Berechnung nicht im Nachhinein zurechtgebogen wurde. Reserve Risk ist so konstruiert, dass es Coin-Bewegungsmuster abbildet, bevor sich überhaupt eine Preis-Erzählung bildet — genau deshalb ist es kein Zufall, dass der Indikator über getrennte Boom-Bust-Zyklen hinweg immer wieder in dieselben absoluten Bänder — 0,002, 0,02 — zurückkehrte, statt dass ein Analyst die Linie im Rückblick gezogen hätte. Aber genau in dieser Formulierung, "dieselben absoluten Bänder", verbirgt sich das nächste Problem des Indikators.</p>

  <h2 class="ko">왜 누적합의 잣대는 사이클마다 조용히 늘어나는가</h2>
  <h2 class="en">Why the Cumulative Ruler Quietly Grows Every Cycle</h2>
  <h2 class="ja">なぜ累積合計という物差しはサイクルごとに静かに伸びていくのか</h2>
  <h2 class="es">Por Qué la Regla Acumulativa Crece Silenciosamente en Cada Ciclo</h2>
  <h2 class="de">Warum das kumulative Maß mit jedem Zyklus still weiterwächst</h2>

  <p class="ko">홀드뱅크는 절대 0으로 리셋되지 않는다. 첫날부터 오늘까지 누적된 값이기 때문에, 비트코인 시가총액과 보유자 기반이 구조적으로 커질수록 홀드뱅크 자체도 자연히 함께 불어난다. 이 말은 2015년의 0.002와 2026년의 0.002가 절대적으로 같은 무게를 갖지 않을 수 있다는 뜻이다. 분모가 매 사이클 자동으로 두꺼워지는 지표에서 고정된 절대 임계값을 그대로 다음 사이클에 적용하는 건, 인플레이션을 고려하지 않고 10년 전 물가와 지금 물가를 그대로 비교하는 것과 비슷한 함정이다.</p>
  <p class="en">The HODL Bank never resets to zero. Because it's a running sum from day one to today, it naturally grows in step with Bitcoin's expanding market cap and holder base. That means 0.002 in 2015 and 0.002 in 2026 don't necessarily carry the same weight. Applying a fixed absolute threshold, unchanged, to the next cycle of a metric whose denominator mechanically thickens every cycle is a trap similar to comparing prices from a decade ago to today's without adjusting for inflation.</p>
  <p class="ja">ホドルバンクは決してゼロにリセットされない。初日から今日までの累積値であるため、ビットコインの時価総額と保有者基盤が構造的に拡大するほど、ホドルバンク自体も自然と一緒に膨らんでいく。つまり、2015年の0.002と2026年の0.002は、必ずしも同じ重みを持つとは限らないということだ。分母が毎サイクル自動的に厚みを増していく指標において、固定された絶対閾値をそのまま次のサイクルに適用するのは、インフレを考慮せずに10年前の物価と今の物価をそのまま比較するのと似た罠だ。</p>

  <p class="es">El HODL Bank nunca vuelve a cero. Al ser una suma corrida desde el primer día hasta hoy, crece de forma natural junto con la capitalización de mercado y la base de holders de Bitcoin, que se expanden estructuralmente. Eso significa que el 0.002 de 2015 y el 0.002 de 2026 no necesariamente tienen el mismo peso. Aplicar un umbral absoluto fijo, sin cambios, al siguiente ciclo de un indicador cuyo denominador se engrosa mecánicamente en cada ciclo es una trampa parecida a comparar los precios de hace una década con los de hoy sin ajustar por inflación.</p>
  <p class="de">Die HODL Bank wird nie auf null zurückgesetzt. Da sie eine laufende Summe vom ersten Tag bis heute ist, wächst sie zwangsläufig mit Bitcoins strukturell wachsender Marktkapitalisierung und Halterbasis mit. Das bedeutet: Die 0,002 von 2015 und die 0,002 von 2026 tragen nicht zwangsläufig das gleiche Gewicht. Einen festen absoluten Schwellenwert unverändert auf den nächsten Zyklus eines Indikators anzuwenden, dessen Nenner sich mechanisch mit jedem Zyklus verdickt, ist eine Falle, die dem Vergleich von Preisen von vor zehn Jahren mit den heutigen ähnelt, ohne die Inflation zu berücksichtigen.</p>

  <p class="ko">이 균열이 실제로 드러난 첫 사례가 2022년 약세장이다. 2015년과 2020년 3월의 바닥은 리저브 리스크가 그린존을 단 한 번, 깔끔하게 뚫고 내려가는 모습으로 나타났다. 하지만 2022년은 그렇지 않았다. 가격은 2022년 6월과 2023년 8월, 두 차례에 걸쳐 핵심 지지선 아래로 미끄러졌고, 어느 쪽도 과거처럼 명확한 '바닥 확정' 신호를 주지 못했다. 이는 온체인 애널리스트들 사이에서도 널리 지적된 부분이다 — 직전 약세장에서는 이 지표가 과거처럼 깔끔한 바닥 신호로 작동하지 못했다는 것. 지표가 갑자기 고장 난 게 아니다. 누적합이라는 지표의 구조 자체가, 시장이 성숙할수록 절대 임계값의 의미를 서서히 희석시키고 있다는 신호로 읽는 편이 더 정확하다.</p>
  <p class="en">The first real crack in this showed up in the 2022 bear market. The 2015 and March 2020 bottoms each showed up as a single, clean break below the green threshold. 2022 didn't behave that way. Price slipped below the key support level twice — once in June 2022 and again in August 2023 — and neither crossing delivered the unambiguous "bottom confirmed" signal the metric had given in prior cycles. This has been noted widely among on-chain analysts: in the most recent bear market, the metric no longer acted as the clean floor it had been before. That's not the indicator suddenly breaking. It's more accurate to read it as the structure of a cumulative metric — one whose denominator can only grow — quietly diluting the meaning of its fixed thresholds as the market matures.</p>
  <p class="ja">この亀裂が実際に露呈した最初の事例が2022年の弱気相場だ。2015年と2020年3月の底は、いずれもリザーブリスクがグリーンゾーンを一度だけ、はっきりと突き抜けて下がる形で現れた。しかし2022年はそうならなかった。価格は2022年6月と2023年8月の二度にわたって主要な支持水準を割り込んだが、どちらも過去のような明確な「底確定」シグナルを出すことはなかった。これはオンチェーンアナリストの間でも広く指摘されている点だ——直近の弱気相場では、この指標がかつてのようなクリーンな底のシグナルとして機能しなくなったという指摘だ。指標が突然壊れたわけではない。累積合計という構造そのものが、市場が成熟するにつれて固定閾値の意味を静かに希釈させているサインだと読む方が正確だろう。</p>

  <p class="es">La primera grieta real de esto se hizo visible en el mercado bajista de 2022. Los suelos de 2015 y marzo de 2020 se manifestaron cada uno como una ruptura única y limpia por debajo del umbral verde. 2022 no se comportó así. El precio se deslizó por debajo del nivel de soporte clave dos veces —una en junio de 2022 y otra en agosto de 2023— y ninguno de los dos cruces entregó la señal inequívoca de "suelo confirmado" que el indicador había dado en ciclos anteriores. Esto ha sido señalado ampliamente entre analistas on-chain: en el mercado bajista más reciente, el indicador dejó de actuar como el suelo limpio que había sido antes. Eso no significa que el indicador se haya roto de repente. Es más preciso leerlo como la estructura de un indicador acumulativo —cuyo denominador solo puede crecer— diluyendo silenciosamente el significado de sus umbrales fijos a medida que el mercado madura.</p>
  <p class="de">Der erste echte Riss zeigte sich im Bärenmarkt 2022. Die Böden von 2015 und März 2020 zeigten sich jeweils als ein einziger, sauberer Durchbruch unter die grüne Schwelle. 2022 verhielt sich anders. Der Preis rutschte zweimal unter das entscheidende Unterstützungsniveau — einmal im Juni 2022, erneut im August 2023 —, und keiner der beiden Durchbrüche lieferte das eindeutige "Boden bestätigt"-Signal, das der Indikator in früheren Zyklen gegeben hatte. Das wurde unter On-Chain-Analysten breit diskutiert: Im jüngsten Bärenmarkt fungierte der Indikator nicht mehr als der saubere Boden, der er zuvor gewesen war. Das ist kein plötzlicher Defekt des Indikators. Es ist treffender, darin zu lesen, dass die Struktur eines kumulativen Indikators — dessen Nenner nur wachsen kann — die Bedeutung seiner festen Schwellenwerte still verwässert, während der Markt reift.</p>

  <h2 class="ko">그래서 실전에서 어떻게 읽어야 하는가</h2>
  <h2 class="en">So What Should You Actually Do With This, in Practice</h2>
  <h2 class="ja">では実践でこれをどう使うべきか</h2>
  <h2 class="es">Entonces, Qué Hacer Realmente Con Esto en la Práctica</h2>
  <h2 class="de">Was man in der Praxis also tatsächlich damit anfangen sollte</h2>

  <p class="ko">결론이 "리저브 리스크가 낮으면 사고, 높으면 팔아라"로 끝나면 이 지표의 절반만 쓰는 셈이다. 실행 가능한 규칙은 이렇다 — 0.002와 0.02라는 절대 숫자를 이번 사이클에도 그대로 적용되는 고정된 벽으로 보지 말고, 지표가 지난 몇 개월간 얼마나 빠르게 상승 또는 하강하고 있는지, 즉 방향과 변화율을 우선으로 읽는다. 절대 수준이 지난 사이클보다 살짝 높은 채로 정체돼 있어도, 하락 추세가 지속되고 있다면 그 자체가 유의미한 신호다.</p>
  <p class="en">A conclusion that just says "buy when Reserve Risk is low, sell when it's high" only uses half of what this indicator offers. Here's an actual rule: stop treating 0.002 and 0.02 as fixed walls that apply unchanged to this cycle, and read direction and rate of change first — how fast the metric has been rising or falling over the past several months. Even if the absolute level is stuck slightly higher than it was last cycle, a sustained downward trend is itself meaningful information.</p>
  <p class="ja">「リザーブリスクが低ければ買い、高ければ売り」で結論を終えるなら、この指標の半分しか使っていないことになる。実行可能なルールはこうだ——0.002と0.02という絶対数値を、今回のサイクルにもそのまま適用される固定された壁として見るのをやめ、まずこの指標がここ数ヶ月でどれだけ速く上昇、あるいは下降しているか——つまり方向と変化率——を優先して読む。絶対水準が前回のサイクルよりわずかに高いところで停滞していても、下降トレンドが持続しているなら、それ自体が意味のあるシグナルだ。</p>

  <p class="es">Una conclusión que solo diga "compra cuando Reserve Risk esté bajo, vende cuando esté alto" solo aprovecha la mitad de lo que ofrece este indicador. Aquí hay una regla real: deja de tratar 0.002 y 0.02 como muros fijos que se aplican sin cambios a este ciclo, y lee primero la dirección y la tasa de cambio —qué tan rápido ha subido o bajado el indicador en los últimos meses—. Aunque el nivel absoluto esté estancado ligeramente más alto que en el ciclo anterior, una tendencia bajista sostenida es, en sí misma, información significativa.</p>
  <p class="de">Ein Fazit, das nur sagt "kaufe, wenn Reserve Risk niedrig ist, verkaufe, wenn es hoch ist", nutzt nur die Hälfte dessen, was dieser Indikator bietet. Hier eine tatsächliche Regel: Hör auf, 0,002 und 0,02 als feste Mauern zu behandeln, die unverändert für diesen Zyklus gelten, und lies zuerst Richtung und Veränderungsrate — wie schnell der Indikator in den letzten Monaten gestiegen oder gefallen ist. Selbst wenn das absolute Niveau leicht höher als im letzten Zyklus verharrt, ist ein anhaltender Abwärtstrend für sich genommen eine bedeutsame Information.</p>

  <p class="ko">더 중요한 건 이 지표를 절대 혼자 쓰지 않는 것이다. <a href="/mvrv-z-score.php">MVRV Z-Score</a>나 <a href="/long-term-holder-supply.php">장기 보유자 공급량</a>처럼 분모의 성격이 다른 지표와 겹쳐 읽으면, 리저브 리스크 하나가 놓치는 국면을 다른 지표가 보완해준다. 그리고 이 사이클이 과거와 구조적으로 무엇이 다른지 — 예컨대 ETF 자금 유입으로 새로운 유형의 '장기 보유자'가 생겼다는 점 — 함께 따져보지 않고 2015년의 숫자를 그대로 2026년에 대입하는 건, 이 글이 방금 짚은 바로 그 함정에 스스로 걸어 들어가는 일이다. <a href="/this-time-is-different.php">"이번엔 다르다"</a>는 말은 대개 틀리지만, 이 지표의 분모가 구조적으로 계속 자라난다는 사실만큼은 이번에도, 다음에도 변하지 않는다.</p>
  <p class="en">More important still is never reading this metric alone. Layer it against indicators with a differently constructed denominator, such as the <a href="/mvrv-z-score.php">MVRV Z-Score</a> or <a href="/long-term-holder-supply.php">long-term holder supply</a>, and what one metric misses, the other tends to catch. And doing that without also asking what's structurally different about this cycle — a new class of "long-term holder" created by ETF inflows, for instance — and then plugging 2015's numbers straight into 2026 is walking directly into the trap this piece has just described. <a href="/this-time-is-different.php">"This time is different"</a> is usually wrong. But the fact that this metric's own denominator keeps structurally growing is the one thing that stays true, cycle after cycle.</p>
  <p class="ja">さらに重要なのは、この指標を絶対に単独で使わないことだ。<a href="/mvrv-z-score.php">MVRV Zスコア</a>や<a href="/long-term-holder-supply.php">長期保有者供給量</a>のように分母の性質が異なる指標と重ねて読めば、リザーブリスク一つが見落とす局面を別の指標が補ってくれる。そして、このサイクルが過去と構造的に何が違うのか——例えばETF資金流入によって新しいタイプの「長期保有者」が生まれたことなど——を併せて検討せずに、2015年の数字をそのまま2026年に当てはめるのは、本稿が指摘したまさにその罠に自ら踏み込むことになる。<a href="/this-time-is-different.php">「今回は違う」</a>という言葉は大抵間違っているが、この指標の分母が構造的に増え続けるという事実だけは、今回も、次回も変わらない。</p>

  <p class="es">Más importante aún es no leer nunca este indicador de forma aislada. Combínalo con indicadores cuyo denominador se construye de otra forma, como el <a href="/mvrv-z-score.php">MVRV Z-Score</a> o la <a href="/long-term-holder-supply.php">oferta de holders de largo plazo</a>, y lo que un indicador pasa por alto, el otro tiende a capturarlo. Y hacer esto sin preguntarse también qué es estructuralmente distinto en este ciclo —una nueva clase de "holder de largo plazo" creada por los flujos de los ETF, por ejemplo— y luego insertar directamente los números de 2015 en 2026 es caminar directo hacia la trampa que acaba de describir este artículo. <a href="/this-time-is-different.php">"Esta vez es diferente"</a> suele estar equivocado. Pero el hecho de que el propio denominador de este indicador siga creciendo estructuralmente es lo único que se mantiene cierto, ciclo tras ciclo.</p>
  <p class="de">Noch wichtiger ist es, diesen Indikator niemals isoliert zu lesen. Legt man ihn neben Indikatoren mit anders konstruiertem Nenner, etwa den <a href="/mvrv-z-score.php">MVRV Z-Score</a> oder das <a href="/long-term-holder-supply.php">Angebot langfristiger Halter</a>, fängt der eine oft auf, was der andere übersieht. Und das zu tun, ohne zugleich zu fragen, was an diesem Zyklus strukturell anders ist — etwa eine neue Klasse von "langfristigen Haltern", die durch ETF-Zuflüsse entstanden ist —, und dann die Zahlen von 2015 direkt in 2026 einzusetzen, bedeutet, genau in die Falle zu laufen, die dieser Beitrag gerade beschrieben hat. <a href="/this-time-is-different.php">"Diesmal ist alles anders"</a> liegt meistens falsch. Aber dass der Nenner dieses Indikators selbst strukturell weiterwächst, bleibt Zyklus für Zyklus die eine Konstante.</p>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: Glassnode Docs, "Reserve Risk — Coin Days Destroyed Metric Guide"(원 고안자 Hans Hauge 소개 포함). Bitcoin Magazine, "Measuring Conviction Of Bitcoin Holders With Reserve Risk". LookIntoBitcoin &amp; Decentrader, "Reserve Risk" 차트 및 역사적 임계값(0.002 / 0.02) 데이터.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: Glassnode Docs, "Reserve Risk — Coin Days Destroyed Metric Guide" (credits original creator Hans Hauge). Bitcoin Magazine, "Measuring Conviction Of Bitcoin Holders With Reserve Risk". LookIntoBitcoin &amp; Decentrader, "Reserve Risk" chart and historical threshold (0.002 / 0.02) data.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: Glassnode Docs, "Reserve Risk — Coin Days Destroyed Metric Guide"(考案者Hans Hauge氏の紹介を含む)。Bitcoin Magazine, "Measuring Conviction Of Bitcoin Holders With Reserve Risk"。LookIntoBitcoin &amp; Decentrader, "Reserve Risk" チャートおよび歴史的閾値(0.002 / 0.02)データ。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: Glassnode Docs, "Reserve Risk — Coin Days Destroyed Metric Guide" (menciona al creador original, Hans Hauge). Bitcoin Magazine, "Measuring Conviction Of Bitcoin Holders With Reserve Risk". LookIntoBitcoin &amp; Decentrader, gráfico de "Reserve Risk" y datos históricos de umbrales (0.002 / 0.02).</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: Glassnode Docs, „Reserve Risk — Coin Days Destroyed Metric Guide" (nennt den ursprünglichen Entwickler Hans Hauge). Bitcoin Magazine, „Measuring Conviction Of Bitcoin Holders With Reserve Risk". LookIntoBitcoin &amp; Decentrader, „Reserve Risk"-Chart und historische Schwellenwertdaten (0,002 / 0,02).</p>
<?php require __DIR__.'/_footer.php'; ?>
