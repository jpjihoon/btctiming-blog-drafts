<?php $slug = 'liquidation-price-math'; require __DIR__.'/_header.php'; ?>

<p class="ko">"레버리지는 위험하다"는 말, 너무 많이 들어서 이제 아무 감흥이 없죠. 근데 진짜 숫자로 한번 계산해보면 얘기가 좀 달라져요.</p>
  <p class="en">"Leverage is risky" is a phrase we've all heard so many times it's lost its punch. But running the actual numbers hits differently.</p>
  <p class="ja">「レバレッジは危険だ」という言葉、聞きすぎてもう何も感じなくなっていますよね。しかし実際の数字で計算してみると話は少し変わってきます。</p>

  <p class="es">"El apalancamiento es riesgoso" es una frase que todos hemos escuchado tantas veces que perdió su impacto. Pero calcular los números reales golpea diferente.</p>
  <p class="de">"Hebel ist riskant" ist ein Satz, den wir alle so oft gehört haben, dass er seine Wirkung verloren hat. Aber die tatsächlichen Zahlen durchzurechnen, trifft anders.</p>

  <h2 class="ko">10배 레버리지면, 딱 10% 하락으로 청산</h2>
  <h2 class="en">10x leverage means a 10% drop wipes you out</h2>
  <h2 class="ja">10倍レバレッジなら、たった10%の下落で清算</h2>
  <h2 class="es">Un Apalancamiento de 10x Significa que una Caída del 10% Te Elimina</h2>
  <h2 class="de">10-facher Hebel bedeutet, ein Rückgang von 10% löscht dich aus</h2>
  <p class="ko">10배 레버리지로 롱 포지션을 잡았다고 해봐요. 비트코인이 진입가 대비 <strong>딱 10% 하락하면 청산</strong>됩니다. 비트코인은 하루에도 5~8% 변동이 흔한 자산이에요. 즉, 하루이틀 안에 청산 라인에 닿을 확률이 결코 낮지 않다는 뜻이죠.</p>
  <p class="en">Say you open a 10x long. If Bitcoin drops just <strong>10% from your entry, you get liquidated</strong>. Bitcoin routinely moves 5–8% in a single day. Which means the odds of hitting that liquidation line within a day or two are not remotely negligible.</p>
  <p class="ja">10倍レバレッジでロングポジションを取ったとします。ビットコインがエントリー価格から<strong>たった10%下落すれば清算</strong>されます。ビットコインは1日で5〜8%の変動が珍しくない資産です。つまり1〜2日以内に清算ラインに触れる確率は決して低くないということです。</p>

  <p class="es">Digamos que abres un largo de 10x. Si Bitcoin cae solo <strong>10% desde tu entrada, te liquidan</strong>. Bitcoin rutinariamente se mueve 5-8% en un solo día. Lo que significa que las probabilidades de llegar a esa línea de liquidación en uno o dos días no son en absoluto insignificantes.</p>
  <p class="de">Angenommen, du eröffnest einen 10-fachen Long. Wenn Bitcoin nur <strong>10% von deinem Einstieg fällt, wirst du liquidiert</strong>. Bitcoin bewegt sich routinemäßig 5-8% an einem einzigen Tag. Das bedeutet, die Chancen, diese Liquidationslinie innerhalb ein oder zwei Tagen zu erreichen, sind keineswegs vernachlässigbar.</p>

  <table class="zt ko">
    <tr><th>레버리지</th><th>청산까지 필요한 하락폭</th><th>체감 난이도</th></tr>
    <tr><td class="g">2배</td><td class="g">약 50%</td><td class="g">사이클 저점급 폭락이어야 도달</td></tr>
    <tr><td class="y">5배</td><td class="y">약 20%</td><td class="y">한 달 안에도 종종 발생</td></tr>
    <tr><td class="r">10배</td><td class="r">약 10%</td><td class="r">며칠 안에도 발생 가능</td></tr>
    <tr><td class="r">20배</td><td class="r">약 5%</td><td class="r">하루 변동성만으로도 도달</td></tr>
  </table>
  <table class="zt en">
    <tr><th>Leverage</th><th>Drop to Liquidation</th><th>Real-World Odds</th></tr>
    <tr><td class="g">2x</td><td class="g">~50%</td><td class="g">Needs a cycle-bottom-level crash</td></tr>
    <tr><td class="y">5x</td><td class="y">~20%</td><td class="y">Not uncommon within a month</td></tr>
    <tr><td class="r">10x</td><td class="r">~10%</td><td class="r">Can happen within days</td></tr>
    <tr><td class="r">20x</td><td class="r">~5%</td><td class="r">A single day's volatility can do it</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>レバレッジ</th><th>清算までの下落幅</th><th>体感難易度</th></tr>
    <tr><td class="g">2倍</td><td class="g">約50%</td><td class="g">サイクル底値級の暴落が必要</td></tr>
    <tr><td class="y">5倍</td><td class="y">約20%</td><td class="y">1ヶ月以内でも度々発生</td></tr>
    <tr><td class="r">10倍</td><td class="r">約10%</td><td class="r">数日以内でも発生し得る</td></tr>
    <tr><td class="r">20倍</td><td class="r">約5%</td><td class="r">1日の変動だけでも到達</td></tr>
  </table>
  <table class="zt es">
    <tr><th>Apalancamiento</th><th>Caída Hasta Liquidación</th><th>Probabilidad Real</th></tr>
    <tr><td class="g">2x</td><td class="g">~50%</td><td class="g">Necesita un colapso a nivel de suelo de ciclo</td></tr>
    <tr><td class="y">5x</td><td class="y">~20%</td><td class="y">No es raro dentro de un mes</td></tr>
    <tr><td class="r">10x</td><td class="r">~10%</td><td class="r">Puede ocurrir en días</td></tr>
    <tr><td class="r">20x</td><td class="r">~5%</td><td class="r">La volatilidad de un solo día puede lograrlo</td></tr>
  </table>
  <table class="zt de">
    <tr><th>Hebel</th><th>Rückgang bis Liquidation</th><th>Reale Wahrscheinlichkeit</th></tr>
    <tr><td class="g">2x</td><td class="g">~50%</td><td class="g">Braucht einen Crash auf Zyklustief-Niveau</td></tr>
    <tr><td class="y">5x</td><td class="y">~20%</td><td class="y">Nicht ungewöhnlich innerhalb eines Monats</td></tr>
    <tr><td class="r">10x</td><td class="r">~10%</td><td class="r">Kann innerhalb von Tagen passieren</td></tr>
    <tr><td class="r">20x</td><td class="r">~5%</td><td class="r">Die Volatilität eines einzigen Tages kann es schaffen</td></tr>
  </table>

  <h2 class="ko">그런데 왜 다들 레버리지를 쓸까</h2>
  <h2 class="en">So why does everyone still use it?</h2>
  <h2 class="ja">それでもなぜ皆レバレッジを使うのか</h2>
  <h2 class="es">Entonces Por Qué Todos Todavía lo Usan</h2>
  <h2 class="de">Warum benutzen es dann alle noch?</h2>
  <p class="ko">간단해요 — 반대 방향으로 맞으면 수익도 그만큼 커지니까요. 10배 레버리지면 10% 상승에 100% 수익이 나죠. 문제는 사람 심리가 "이번엔 맞을 것 같다"는 확신을 늘 과대평가한다는 거예요. 실제로 대부분의 청산 사례를 보면, 방향은 맞았는데 <strong>타이밍이 며칠 어긋나서</strong> 중간에 청산당하고, 그 뒤에 원래 예상했던 방향으로 움직이는 경우가 허다합니다.</p>
  <p class="en">Simple — get the direction right and the gains scale the same way. 10x leverage on a 10% move means 100% profit. The problem is that human psychology consistently overrates "I'm pretty sure this time." Look at most liquidation stories and you'll find the direction was actually right — the timing was just off by a few days, they got liquidated mid-move, and price then went exactly where they expected.</p>
  <p class="ja">簡単です — 逆方向に当たれば利益も同じだけ大きくなるからです。10倍レバレッジなら10%の上昇で100%の利益になります。問題は人間の心理が「今回は当たりそうだ」という確信を常に過大評価することです。実際にほとんどの清算事例を見ると、方向は合っていたのに<strong>タイミングが数日ずれて</strong>途中で清算され、その後元々予想していた方向に動くケースが多々あります。</p>

  <p class="es">Simple — acierta la dirección y las ganancias escalan igual. Un apalancamiento de 10x en un movimiento del 10% significa 100% de ganancia. El problema es que la psicología humana constantemente sobreestima "estoy bastante seguro esta vez." Mira la mayoría de las historias de liquidación y encontrarás que la dirección era en realidad correcta — el momento simplemente estaba equivocado por unos días, fueron liquidados a mitad del movimiento, y el precio luego fue exactamente adonde esperaban.</p>
  <p class="de">Einfach — trifft man die Richtung, skalieren die Gewinne genauso. Ein 10-facher Hebel bei einer 10%-Bewegung bedeutet 100% Gewinn. Das Problem ist, dass die menschliche Psyche ständig "ich bin mir diesmal ziemlich sicher" überschätzt. Schaut man sich die meisten Liquidationsgeschichten an, findet man, dass die Richtung tatsächlich richtig war — das Timing lag nur um ein paar Tage daneben, sie wurden mitten in der Bewegung liquidiert, und der Preis ging dann genau dorthin, wo sie es erwartet hatten.</p>

  <div class="box ko">💡 <strong>이 글에서 기억할 한 가지:</strong> 방향을 맞히는 것보다 어려운 건 "청산당하지 않고 버티는 것"입니다. 레버리지를 쓴다면 최소한 청산가를 직접 계산해보고, 그게 최근 한 달 변동폭 안에 들어오는지부터 확인하세요.</div>
  <div class="box en">💡 <strong>One thing to take away:</strong> Getting the direction right is easier than surviving long enough without getting liquidated. If you use leverage, at minimum calculate your liquidation price and check whether it falls within the last month's typical price range.</div>
  <div class="box ja">💡 <strong>この記事で覚えておくこと:</strong> 方向を当てるより難しいのは「清算されずに耐えること」です。レバレッジを使うなら、最低限清算価格を自分で計算し、それが直近1ヶ月の変動幅内に入るか確認してください。</div>
  <div class="box es">💡 <strong>Una cosa para recordar:</strong> Acertar la dirección es más fácil que sobrevivir lo suficiente sin ser liquidado. Si usas apalancamiento, como mínimo calcula tu precio de liquidación y verifica si cae dentro del rango de precio típico del último mes.</div>
  <div class="box de">💡 <strong>Eine Sache zum Mitnehmen:</strong> Die Richtung richtig zu treffen ist leichter, als lange genug zu überleben, ohne liquidiert zu werden. Wenn du Hebel nutzt, berechne zumindest deinen Liquidationspreis und prüfe, ob er innerhalb der typischen Preisspanne des letzten Monats liegt.</div>

  <h2 class="ko">참고할 지표</h2>
  <h2 class="en">Indicators worth checking</h2>
  <h2 class="ja">参考にすべき指標</h2>
  <h2 class="es">Indicadores que Vale la Pena Verificar</h2>
  <h2 class="de">Sehenswerte Indikatoren</h2>
  <p class="ko"><a href="/blog/funding-rate-futures-gap.html">펀딩비와 선물-현물 갭</a>을 보면 지금 시장 전체가 얼마나 레버리지에 쏠려있는지 대략 감이 옵니다. 펀딩비가 극단적으로 높다면, 나만 레버리지를 쓰는 게 아니라 시장 전체가 한쪽으로 쏠려 있다는 뜻이고 — 이런 상황은 청산 캐스케이드(연쇄 청산)로 이어지기 쉽습니다.</p>
  <p class="en">Checking <a href="/blog/funding-rate-futures-gap.html">funding rate and the futures-spot gap</a> gives you a rough sense of how leveraged the whole market currently is. Extremely high funding means it's not just you using leverage — the entire market is tilted one way, and that setup tends to end in liquidation cascades.</p>
  <p class="ja"><a href="/blog/funding-rate-futures-gap.html">ファンディングレートと先物-現物ギャップ</a>を見ると、今市場全体がどれだけレバレッジに偏っているかおおよその感覚がつかめます。ファンディングレートが極端に高ければ、自分だけがレバレッジを使っているのではなく市場全体が一方向に偏っているということで — こうした状況は連鎖清算につながりやすいです。</p>
  <p class="es">Revisar <a href="/blog/funding-rate-futures-gap.html">la tasa de financiación y la brecha futuros-spot</a> te da una idea aproximada de cuán apalancado está actualmente todo el mercado. Una financiación extremadamente alta significa que no eres solo tú usando apalancamiento — todo el mercado está inclinado en una dirección, y esa configuración tiende a terminar en cascadas de liquidación.</p>
  <p class="de">Ein Blick auf <a href="/blog/funding-rate-futures-gap.html">die Funding Rate und die Futures-Spot-Lücke</a> gibt dir ein grobes Gefühl dafür, wie gehebelt der gesamte Markt derzeit ist. Extrem hohes Funding bedeutet, dass nicht nur du Hebel nutzt — der gesamte Markt ist in eine Richtung geneigt, und dieses Setup endet tendenziell in Liquidationskaskaden.</p>
<?php require __DIR__.'/_footer.php'; ?>
