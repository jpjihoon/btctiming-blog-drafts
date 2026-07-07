<?php $slug = 'patch-long-entry'; require __DIR__.'/_header.php'; ?>

  <p class="ko">이 도구를 처음 만들 때 우리가 답하려던 질문은 하나였다. "장기 상승의 초입을, 그 상승이 시작되기 전에 점수로 잡아낼 수 있는가." 지금까지의 모든 패치는 사실 이 하나의 질문을 더 정확히 답하기 위한 과정이었다. 마지막 패치노트에서는 그 근본 질문으로 돌아가, 이 점수가 무엇을 향하고 있는지를 정리한다.</p>
  <p class="en">When we first built this tool, there was a single question we set out to answer: "Can the beginning of a long uptrend be captured as a score, before that rise has started?" Every patch so far has, in truth, been a process of answering this one question more precisely. In this final patch note, we return to that root question and lay out what this score is aiming at.</p>
  <p class="ja">この道具を初めて作った時、私たちが答えようとした問いは一つだった。「長期上昇の初入を、その上昇が始まる前にスコアで捉えられるか。」これまでのすべてのパッチは実は、この一つの問いをより正確に答えるための過程だった。最後のパッチノートでは、その根本の問いに戻り、このスコアが何を目指しているのかを整理する。</p>
  <p class="es">Cuando construimos esta herramienta, había una sola pregunta que queríamos responder: "¿Puede captarse como puntuación el comienzo de una tendencia alcista larga, antes de que ese ascenso empiece?" Cada parche hasta ahora ha sido, en verdad, un proceso para responder esta pregunta con más precisión. En esta última nota volvemos a esa pregunta raíz y exponemos hacia qué apunta esta puntuación.</p>
  <p class="de">Als wir dieses Werkzeug bauten, gab es eine einzige Frage, die wir beantworten wollten: „Lässt sich der Beginn eines langen Aufwärtstrends als Wert erfassen, bevor dieser Anstieg begonnen hat?" Jeder Patch bisher war in Wahrheit ein Prozess, diese eine Frage präziser zu beantworten. In dieser letzten Patch Note kehren wir zu dieser Wurzelfrage zurück und legen dar, worauf dieser Wert zielt.</p>

  <div class="ko">
  <svg viewBox="0 0 720 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">우리가 잡으려는 구간</text>
    <g font-family="sans-serif">
      <path d="M 40 180 Q 120 190 200 185 Q 280 180 340 120 Q 400 60 500 50" fill="none" stroke="#4ade80" stroke-width="2.5"/>
      <rect x="150" y="150" width="120" height="60" fill="rgba(74,222,128,0.12)" rx="6"/>
      <text x="210" y="145" fill="#4ade80" font-size="11" font-weight="700" text-anchor="middle">여기</text>
      <text x="210" y="230" fill="#4ade80" font-size="10" text-anchor="middle">조용한 바닥 · 상승 초입</text>
      <circle cx="470" cy="60" r="6" fill="#f87171"/>
      <text x="470" y="45" fill="#f87171" font-size="10" text-anchor="middle">여기 아님</text>
      <text x="470" y="90" fill="#71717a" font-size="9" text-anchor="middle">이미 오른 뒤</text>
      <text x="40" y="250" fill="#a1a1aa" font-size="11">목표: 오르기 "전", 조용할 때. 오른 뒤 추격이 아니라.</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 720 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">The zone we aim to capture</text>
    <g font-family="sans-serif">
      <path d="M 40 180 Q 120 190 200 185 Q 280 180 340 120 Q 400 60 500 50" fill="none" stroke="#4ade80" stroke-width="2.5"/>
      <rect x="150" y="150" width="120" height="60" fill="rgba(74,222,128,0.12)" rx="6"/>
      <text x="210" y="145" fill="#4ade80" font-size="11" font-weight="700" text-anchor="middle">here</text>
      <text x="210" y="230" fill="#4ade80" font-size="10" text-anchor="middle">quiet bottom · start of the rise</text>
      <circle cx="470" cy="60" r="6" fill="#f87171"/>
      <text x="470" y="45" fill="#f87171" font-size="10" text-anchor="middle">not here</text>
      <text x="470" y="90" fill="#71717a" font-size="9" text-anchor="middle">after it already rose</text>
      <text x="40" y="250" fill="#a1a1aa" font-size="11">Goal: "before" the rise, while it is quiet. Not chasing after it rose.</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 720 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">私たちが捉えようとする区間</text>
    <g font-family="sans-serif">
      <path d="M 40 180 Q 120 190 200 185 Q 280 180 340 120 Q 400 60 500 50" fill="none" stroke="#4ade80" stroke-width="2.5"/>
      <rect x="150" y="150" width="120" height="60" fill="rgba(74,222,128,0.12)" rx="6"/>
      <text x="210" y="145" fill="#4ade80" font-size="11" font-weight="700" text-anchor="middle">ここ</text>
      <text x="210" y="230" fill="#4ade80" font-size="10" text-anchor="middle">静かな底 · 上昇の初入</text>
      <circle cx="470" cy="60" r="6" fill="#f87171"/>
      <text x="470" y="45" fill="#f87171" font-size="10" text-anchor="middle">ここではない</text>
      <text x="470" y="90" fill="#71717a" font-size="9" text-anchor="middle">既に上がった後</text>
      <text x="40" y="250" fill="#a1a1aa" font-size="11">目標: 上がる「前」、静かな時。上がった後の追撃ではなく。</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 720 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">La zona que buscamos captar</text>
    <g font-family="sans-serif">
      <path d="M 40 180 Q 120 190 200 185 Q 280 180 340 120 Q 400 60 500 50" fill="none" stroke="#4ade80" stroke-width="2.5"/>
      <rect x="150" y="150" width="120" height="60" fill="rgba(74,222,128,0.12)" rx="6"/>
      <text x="210" y="145" fill="#4ade80" font-size="11" font-weight="700" text-anchor="middle">aquí</text>
      <text x="210" y="230" fill="#4ade80" font-size="10" text-anchor="middle">suelo tranquilo · inicio del alza</text>
      <circle cx="470" cy="60" r="6" fill="#f87171"/>
      <text x="470" y="45" fill="#f87171" font-size="10" text-anchor="middle">aquí no</text>
      <text x="470" y="90" fill="#71717a" font-size="9" text-anchor="middle">tras ya haber subido</text>
      <text x="40" y="250" fill="#a1a1aa" font-size="11">Meta: "antes" del alza, cuando está tranquilo. No perseguir tras subir.</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 720 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Die Zone, die wir erfassen wollen</text>
    <g font-family="sans-serif">
      <path d="M 40 180 Q 120 190 200 185 Q 280 180 340 120 Q 400 60 500 50" fill="none" stroke="#4ade80" stroke-width="2.5"/>
      <rect x="150" y="150" width="120" height="60" fill="rgba(74,222,128,0.12)" rx="6"/>
      <text x="210" y="145" fill="#4ade80" font-size="11" font-weight="700" text-anchor="middle">hier</text>
      <text x="210" y="230" fill="#4ade80" font-size="10" text-anchor="middle">ruhiger Boden · Beginn des Anstiegs</text>
      <circle cx="470" cy="60" r="6" fill="#f87171"/>
      <text x="470" y="45" fill="#f87171" font-size="10" text-anchor="middle">nicht hier</text>
      <text x="470" y="90" fill="#71717a" font-size="9" text-anchor="middle">nachdem es bereits stieg</text>
      <text x="40" y="250" fill="#a1a1aa" font-size="11">Ziel: „vor" dem Anstieg, wenn es ruhig ist. Kein Nachjagen danach.</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">예측이 아니라 위치</h2>
  <h2 class="en">Not prediction, but position</h2>
  <h2 class="ja">予測ではなく位置</h2>
  <h2 class="es">No predicción, sino posición</h2>
  <h2 class="de">Keine Vorhersage, sondern Position</h2>

  <p class="ko">우리는 미래를 예측하지 않는다. 내일 가격이 오를지 내릴지는 아무도 모른다. 대신 우리는 현재의 "위치"를 측정한다. 지금 이 자산이 사이클의 어디쯤에 있는가, 역사적으로 볼 때 싼 구간인가 비싼 구간인가. 장기 상승은 언제나 깊은 저평가에서 시작됐다. 그러므로 "지금이 역사적 저평가 구간인가"를 정확히 아는 것은, 예측 없이도 상승 초입에 가까이 서는 방법이다.</p>
  <p class="en">We do not predict the future. No one knows whether price rises or falls tomorrow. Instead, we measure the present "position." Where in the cycle this asset now stands, whether historically it is in a cheap zone or an expensive one. Long uptrends have always begun from deep undervaluation. So knowing precisely "whether this is a historically undervalued zone" is a way to stand near the start of a rise without any prediction.</p>
  <p class="ja">私たちは未来を予測しない。明日、価格が上がるか下がるかは誰も知らない。代わりに私たちは現在の「位置」を測る。今、この資産がサイクルのどこにあるか、歴史的に見て安い区間か高い区間か。長期上昇は常に深い割安から始まった。ゆえに「今が歴史的割安区間か」を正確に知ることは、予測なしに上昇の初入に近く立つ方法だ。</p>
  <p class="es">No predecimos el futuro. Nadie sabe si el precio sube o baja mañana. En cambio, medimos la "posición" presente. Dónde está este activo en el ciclo ahora, si históricamente está en zona barata o cara. Las tendencias alcistas largas siempre empezaron desde una infravaloración profunda. Así, saber con precisión "si esta es una zona históricamente infravalorada" es una forma de situarse cerca del inicio de un alza sin ninguna predicción.</p>
  <p class="de">Wir sagen die Zukunft nicht voraus. Niemand weiß, ob der Preis morgen steigt oder fällt. Stattdessen messen wir die gegenwärtige „Position". Wo im Zyklus dieses Asset jetzt steht, ob es historisch in einer billigen oder teuren Zone ist. Lange Aufwärtstrends begannen stets aus tiefer Unterbewertung. Genau zu wissen, „ob dies eine historisch unterbewertete Zone ist", ist daher ein Weg, ohne Vorhersage nahe am Beginn eines Anstiegs zu stehen.</p>

  <h2 class="ko">모든 패치가 향한 곳</h2>
  <h2 class="en">Where every patch was headed</h2>
  <h2 class="ja">すべてのパッチが向かった先</h2>
  <h2 class="es">Hacia dónde apuntaba cada parche</h2>
  <h2 class="de">Wohin jeder Patch zielte</h2>

  <p class="ko">돌아보면 지금까지의 패치는 모두 이 한 지점을 향해 있었다. 조용한 바닥에서 점수가 깎이던 문제를 고친 것은, 상승 초입이 대개 조용하기 때문이다. 롱과 숏을 분리한 것은, 저점을 확인하는 눈과 고점을 확인하는 눈이 달라야 하기 때문이다. 거래량의 방향을 구분한 것은, 바닥의 투매와 천장의 광풍을 혼동하면 초입을 놓치기 때문이다. 실현가 곡선을 다시 그린 것은, 얼마나 싼지를 더 정밀하게 재기 위해서였다.</p>
  <p class="en">Looking back, every patch so far pointed toward this single spot. Fixing the problem where quiet bottoms lost points — because the start of a rise is usually quiet. Separating long and short — because the eye that confirms a bottom must differ from the eye that confirms a top. Distinguishing volume direction — because confusing a bottom's capitulation with a top's frenzy makes you miss the start. Redrawing the realized-price curve — to measure just how cheap something is more precisely.</p>
  <p class="ja">振り返ると、これまでのパッチはすべてこの一点に向かっていた。静かな底で点が削られる問題を直したのは、上昇の初入がたいてい静かだからだ。ロングとショートを分離したのは、底を確認する目と天井を確認する目が異なるべきだからだ。出来高の方向を区別したのは、底の投げ売りと天井の狂乱を混同すると初入を逃すからだ。実現価曲線を描き直したのは、どれだけ安いかをより精密に測るためだった。</p>
  <p class="es">Mirando atrás, cada parche apuntaba a este único punto. Arreglar que los suelos tranquilos perdieran puntos — porque el inicio de un alza suele ser tranquilo. Separar long y short — porque el ojo que confirma un suelo debe diferir del que confirma un techo. Distinguir la dirección del volumen — porque confundir la capitulación de un suelo con el frenesí de un techo hace perder el inicio. Redibujar la curva del precio realizado — para medir con más precisión cuán barato está algo.</p>
  <p class="de">Rückblickend zielte jeder Patch auf diesen einen Punkt. Das Problem zu beheben, dass ruhige Böden Punkte verloren — weil der Beginn eines Anstiegs meist ruhig ist. Long und Short zu trennen — weil das Auge, das einen Boden bestätigt, sich von dem unterscheiden muss, das ein Top bestätigt. Die Volumenrichtung zu unterscheiden — weil das Verwechseln der Bodenkapitulation mit dem Top-Rausch den Beginn verpassen lässt. Die Kurve neu zu zeichnen — um genauer zu messen, wie billig etwas ist.</p>

  <p class="ko">이 도구는 짧은 파도를 타는 서핑보드가 아니다. 밀물이 들어오기 전에 해안선의 높이를 재는 자다. 정확한 저점을 사서 다음 사이클의 큰 상승을 온전히 누리는 것, 그것이 처음부터 우리가 만들려던 도구였다. 조용한 바닥은 몇 달 더 조용할 수 있다. 그 인내를 요구하는 것이 이 도구의 성격이고, 우리는 그 성격을 흐리지 않으려 매번 지표를 다시 손본다.</p>
  <p class="en">This tool is not a surfboard for riding short waves. It is a ruler that measures the shoreline's height before the tide comes in. To buy a precise bottom and fully enjoy the next cycle's large rise — that was the tool we set out to build from the start. A quiet bottom may stay quiet for months more. Demanding that patience is the character of this tool, and to keep that character from blurring, we revise the indicators again and again.</p>
  <p class="ja">この道具は短い波に乗るサーフボードではない。満ち潮が来る前に海岸線の高さを測る定規だ。正確な底を買い、次のサイクルの大きな上昇を存分に享受すること、それが初めから私たちが作ろうとした道具だった。静かな底は数ヶ月さらに静かでいられる。その忍耐を要求するのがこの道具の性格であり、私たちはその性格を曖昧にしないよう毎回指標を手直しする。</p>
  <p class="es">Esta herramienta no es una tabla para surfear olas cortas. Es una regla que mide la altura de la orilla antes de que suba la marea. Comprar un suelo preciso y disfrutar plenamente el gran alza del próximo ciclo — esa fue la herramienta que quisimos construir desde el inicio. Un suelo tranquilo puede seguir tranquilo meses más. Exigir esa paciencia es el carácter de esta herramienta, y para que no se difumine, revisamos los indicadores una y otra vez.</p>
  <p class="de">Dieses Werkzeug ist kein Surfbrett für kurze Wellen. Es ist ein Lineal, das die Höhe der Küstenlinie misst, bevor die Flut kommt. Einen präzisen Boden zu kaufen und den großen Anstieg des nächsten Zyklus voll zu genießen — das war das Werkzeug, das wir von Anfang an bauen wollten. Ein ruhiger Boden kann Monate länger ruhig bleiben. Diese Geduld zu verlangen, ist der Charakter dieses Werkzeugs, und damit er nicht verschwimmt, überarbeiten wir die Indikatoren immer wieder.</p>

  <div class="box ko">패치노트를 여기까지 공개하는 이유는 분명하다. 우리는 이 점수가 완벽하다고 말하지 않는다. 다만 우리가 이 숫자 하나하나를 얼마나 오래, 얼마나 깊이 고민하는지를 보여주고 싶었다. 당신의 실제 매수·매도 타이밍에 영향을 주는 숫자이기 때문이다. 그 무게를 알기에, 우리는 앞으로도 틀린 것을 발견하면 숨기지 않고 이곳에 기록할 것이다.</div>
  <div class="box en">The reason we open the patch notes this far is clear. We do not claim this score is perfect. We only wanted to show how long and how deeply we deliberate over each of these numbers — because it is a number that affects your actual buy and sell timing. Knowing that weight, we will keep recording here, rather than hiding, whatever we find to be wrong.</div>
  <div class="box ja">パッチノートをここまで公開する理由は明確だ。私たちはこのスコアが完璧だとは言わない。ただ、私たちがこの数字一つ一つをどれだけ長く、どれだけ深く考えるかを見せたかった。あなたの実際の売買タイミングに影響する数字だからだ。その重みを知るゆえに、私たちは今後も誤りを見つけたら隠さずここに記録する。</div>
  <div class="box es">La razón de abrir las notas de parche hasta aquí es clara. No afirmamos que esta puntuación sea perfecta. Solo queríamos mostrar cuánto tiempo y con cuánta profundidad deliberamos cada uno de estos números — porque es un número que afecta tu momento real de compra y venta. Conociendo ese peso, seguiremos registrando aquí, sin ocultar, lo que hallemos erróneo.</div>
  <div class="box de">Der Grund, die Patch Notes so weit zu öffnen, ist klar. Wir behaupten nicht, dieser Wert sei perfekt. Wir wollten nur zeigen, wie lange und wie tief wir über jede dieser Zahlen nachdenken — denn es ist eine Zahl, die deinen tatsächlichen Kauf- und Verkaufszeitpunkt beeinflusst. Dieses Gewicht kennend, werden wir weiterhin hier festhalten, statt zu verbergen, was wir für falsch befinden.</div>

<?php require __DIR__.'/_footer.php'; ?>
