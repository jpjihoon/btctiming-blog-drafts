<?php $slug = 'tax-scenario-worked-example'; require __DIR__.'/_header.php'; ?>

<p class="ko"><a href="/blog/2027-crypto-tax-unprepared.html">2027년 코인 과세</a>에서 손익통산이 안 된다는 문제를 짚었는데, 말로만 들으면 잘 안 와닿아요. 그래서 가상의 3년 시나리오를 직접 계산해봤습니다.</p>
  <p class="en">The <a href="/blog/2027-crypto-tax-unprepared.html">2027 crypto tax piece</a> flagged the lack of loss offsetting — but as an abstract statement, it doesn't quite land. So here's a worked hypothetical across 3 years.</p>
  <p class="ja"><a href="/blog/2027-crypto-tax-unprepared.html">2027年暗号資産課税</a>で損益通算ができない問題を指摘しましたが、言葉だけではピンときません。そこで仮想の3年シナリオを実際に計算してみました。</p>

  <p class="es">La pieza de <a href="/blog/2027-crypto-tax-unprepared.html">impuesto cripto 2027</a> señaló la falta de compensación de pérdidas — pero como declaración abstracta, no termina de resonar. Así que aquí hay un hipotético calculado a lo largo de 3 años.</p>
  <p class="de">Der Beitrag <a href="/blog/2027-crypto-tax-unprepared.html">Krypto-Steuer 2027</a> markierte das Fehlen des Verlustausgleichs — aber als abstrakte Aussage kommt es nicht ganz an. Hier ist also ein durchgerechnetes Hypothetisches über 3 Jahre.</p>

  <div class="box en">🇰🇷 <strong>Why this matters beyond Korea:</strong> This worked example uses South Korea's specific tax rate (22%) and won-denominated brackets. The exact numbers won't transfer to your jurisdiction — but the underlying math (why "no loss offsetting" can tax a break-even investor) applies anywhere a similar rule exists.</div>
  <div class="box ja">🇰🇷 <strong>韓国以外の読者になぜ関係するか:</strong> この計算例は韓国特有の税率(22%)とウォン建ての区分を使用しています。正確な数字は他の法域には当てはまりませんが、その根底にある数学(なぜ「損益通算なし」が損益ゼロの投資家に課税し得るか)は、同様のルールが存在するどこでも適用されます。</div>
  <div class="box es">🇰🇷 <strong>Por qué esto importa más allá de Corea:</strong> Este ejemplo calculado usa la tasa impositiva específica de Corea del Sur (22%) y tramos denominados en wones. Los números exactos no se trasladarán a tu jurisdicción — pero las matemáticas subyacentes (por qué "sin compensación de pérdidas" puede gravar a un inversor en punto de equilibrio) se aplican en cualquier lugar donde exista una regla similar.</div>
  <div class="box de">🇰🇷 <strong>Warum das über Korea hinaus wichtig ist:</strong> Dieses durchgerechnete Beispiel verwendet Südkoreas spezifischen Steuersatz (22%) und Won-denominierte Steuerklassen. Die genauen Zahlen übertragen sich nicht auf deine Rechtsordnung — aber die zugrunde liegende Mathematik (warum "kein Verlustausgleich" einen Break-Even-Investor besteuern kann) gilt überall, wo eine ähnliche Regel existiert.</div>

  <h2 class="ko">가정</h2>
  <h2 class="en">The setup</h2>
  <h2 class="ja">前提</h2>
  <h2 class="es">El Planteamiento</h2>
  <h2 class="de">Die Ausgangslage</h2>
  <p class="ko">투자자 A씨가 2027년 1억 원 손실, 2028년 5천만 원 이익, 2029년 다시 5천만 원 이익을 냈다고 가정해볼게요. 3년 합산 손익은 <strong>0원</strong>입니다 — 딱 본전이에요. 세율은 22%(기본공제 250만 원 제외, 단순화를 위해 매년 공제만 적용).</p>
  <p class="en">Suppose investor A loses 100M won in 2027, gains 50M in 2028, and gains another 50M in 2029. Net across 3 years: <strong>exactly 0 won</strong> — break-even. Tax rate: 22% (2.5M won annual deduction applied each year, simplified).</p>
  <p class="ja">投資家Aさんが2027年に1億ウォンの損失、2028年に5千万ウォンの利益、2029年にまた5千万ウォンの利益を出したと仮定してみましょう。3年合計の損益は<strong>0ウォン</strong>です — ちょうど損益ゼロです。税率は22%(基礎控除250万ウォンを除き、簡略化のため毎年の控除のみ適用)。</p>

  <p class="es">Supongamos que la inversora A pierde 100M won en 2027, gana 50M en 2028, y gana otros 50M en 2029. Neto en 3 años: <strong>exactamente 0 won</strong> — punto de equilibrio. Tasa impositiva: 22% (deducción anual de 2.5M won aplicada cada año, simplificado).</p>
  <p class="de">Angenommen, Investorin A verliert 2027 100 Mio. Won, gewinnt 2028 50 Mio., und gewinnt 2029 weitere 50 Mio. Netto über 3 Jahre: <strong>genau 0 Won</strong> — Break-even. Steuersatz: 22% (jährlicher Abzug von 2,5 Mio. Won jedes Jahr angewendet, vereinfacht).</p>

  <table class="zt ko">
    <tr><th>연도</th><th>손익</th><th>손익통산 있을 때 세금</th><th>손익통산 없을 때 세금</th></tr>
    <tr><td>2027</td><td class="r">-1억원</td><td>0원</td><td>0원</td></tr>
    <tr><td>2028</td><td class="g">+5천만원</td><td>0원 (전년 손실과 상계)</td><td class="r">약 1,045만원</td></tr>
    <tr><td>2029</td><td class="g">+5천만원</td><td>0원 (남은 손실과 상계)</td><td class="r">약 1,045만원</td></tr>
    <tr><td><strong>3년 합계</strong></td><td><strong>0원 (본전)</strong></td><td><strong>0원</strong></td><td><strong class="r">약 2,090만원</strong></td></tr>
  </table>
  <table class="zt en">
    <tr><th>Year</th><th>P&amp;L</th><th>Tax w/ Offsetting</th><th>Tax w/o Offsetting</th></tr>
    <tr><td>2027</td><td class="r">-100M won</td><td>0 won</td><td>0 won</td></tr>
    <tr><td>2028</td><td class="g">+50M won</td><td>0 won (offset vs. prior loss)</td><td class="r">~10.45M won</td></tr>
    <tr><td>2029</td><td class="g">+50M won</td><td>0 won (offset vs. remaining loss)</td><td class="r">~10.45M won</td></tr>
    <tr><td><strong>3-yr total</strong></td><td><strong>0 won (break-even)</strong></td><td><strong>0 won</strong></td><td><strong class="r">~20.9M won</strong></td></tr>
  </table>
  <table class="zt ja">
    <tr><th>年度</th><th>損益</th><th>損益通算ありの税金</th><th>損益通算なしの税金</th></tr>
    <tr><td>2027</td><td class="r">-1億ウォン</td><td>0ウォン</td><td>0ウォン</td></tr>
    <tr><td>2028</td><td class="g">+5千万ウォン</td><td>0ウォン(前年損失と相殺)</td><td class="r">約1,045万ウォン</td></tr>
    <tr><td>2029</td><td class="g">+5千万ウォン</td><td>0ウォン(残り損失と相殺)</td><td class="r">約1,045万ウォン</td></tr>
    <tr><td><strong>3年合計</strong></td><td><strong>0ウォン(損益ゼロ)</strong></td><td><strong>0ウォン</strong></td><td><strong class="r">約2,090万ウォン</strong></td></tr>
  </table>
  <table class="zt es">
    <tr><th>Año</th><th>Ganancia/Pérdida</th><th>Impuesto con Compensación</th><th>Impuesto sin Compensación</th></tr>
    <tr><td>2027</td><td class="r">-100M won</td><td>0 won</td><td>0 won</td></tr>
    <tr><td>2028</td><td class="g">+50M won</td><td>0 won (compensado con pérdida previa)</td><td class="r">~10.45M won</td></tr>
    <tr><td>2029</td><td class="g">+50M won</td><td>0 won (compensado con pérdida restante)</td><td class="r">~10.45M won</td></tr>
    <tr><td><strong>Total 3 años</strong></td><td><strong>0 won (equilibrio)</strong></td><td><strong>0 won</strong></td><td><strong class="r">~20.9M won</strong></td></tr>
  </table>
  <table class="zt de">
    <tr><th>Jahr</th><th>Gewinn/Verlust</th><th>Steuer mit Ausgleich</th><th>Steuer ohne Ausgleich</th></tr>
    <tr><td>2027</td><td class="r">-100 Mio. Won</td><td>0 Won</td><td>0 Won</td></tr>
    <tr><td>2028</td><td class="g">+50 Mio. Won</td><td>0 Won (mit Vorjahresverlust verrechnet)</td><td class="r">~10,45 Mio. Won</td></tr>
    <tr><td>2029</td><td class="g">+50 Mio. Won</td><td>0 Won (mit Restverlust verrechnet)</td><td class="r">~10,45 Mio. Won</td></tr>
    <tr><td><strong>3-Jahres-Summe</strong></td><td><strong>0 Won (Break-even)</strong></td><td><strong>0 Won</strong></td><td><strong class="r">~20,9 Mio. Won</strong></td></tr>
  </table>

  <h2 class="ko">본전인데 세금은 2,090만원</h2>
  <h2 class="en">Break-even, yet 20.9M won in tax</h2>
  <h2 class="ja">損益ゼロなのに税金は2,090万ウォン</h2>
  <h2 class="es">Equilibrio, Pero 20.9M Won en Impuestos</h2>
  <h2 class="de">Break-even, dennoch 20,9 Mio. Won Steuern</h2>
  <p class="ko">3년 통산으로는 A씨가 <strong>1원도 벌지 못했는데</strong>, 손익통산이 없는 현재 법안대로면 약 2,090만 원의 세금을 내야 해요. 이건 세율이 높아서가 아니라, <strong>손실 해가 통계적으로 무시되는 구조</strong> 때문입니다. 주식 양도소득세처럼 손실을 이월공제할 수 있었다면 이 세금은 정확히 0원이었을 거예요.</p>
  <p class="en">Across 3 years, A made <strong>literally zero net gain</strong> — yet under the current bill's lack of loss offsetting, they'd owe roughly 20.9M won. This isn't because the tax rate is high. It's because <strong>the loss year gets statistically erased</strong>. If losses could carry forward like stock capital gains tax allows, this tax bill would be exactly zero.</p>
  <p class="ja">3年通算ではAさんは<strong>1ウォンも稼いでいない</strong>のに、損益通算がない現行法案通りなら約2,090万ウォンの税金を払わなければなりません。これは税率が高いからではなく、<strong>損失を出した年が統計的に無視される構造</strong>のためです。株式譲渡所得税のように損失を繰越控除できれば、この税額は正確に0ウォンだったはずです。</p>

  <p class="es">A lo largo de 3 años, A tuvo <strong>literalmente cero ganancia neta</strong> — sin embargo, bajo la falta de compensación de pérdidas de la ley actual, debería aproximadamente 20.9M won. Esto no es porque la tasa impositiva sea alta. Es porque <strong>el año de pérdida se borra estadísticamente</strong>. Si las pérdidas pudieran arrastrarse como permite el impuesto de ganancias de capital sobre acciones, este impuesto sería exactamente cero.</p>
  <p class="de">Über 3 Jahre hatte A <strong>buchstäblich null Nettogewinn</strong> — dennoch würde sie unter dem fehlenden Verlustausgleich des aktuellen Gesetzes etwa 20,9 Mio. Won schulden. Das liegt nicht daran, dass der Steuersatz hoch ist. Es liegt daran, dass <strong>das Verlustjahr statistisch ausgelöscht wird</strong>. Könnten Verluste vorgetragen werden, wie es die Kapitalertragsteuer bei Aktien erlaubt, wäre diese Steuerrechnung genau null.</p>

  <h2 class="ko">변동성이 클수록 더 아프다</h2>
  <h2 class="en">The more volatile, the worse it gets</h2>
  <h2 class="ja">変動性が大きいほどさらに痛い</h2>
  <h2 class="es">Cuanto Más Volátil, Peor Se Pone</h2>
  <h2 class="de">Je volatiler, desto schlimmer wird es</h2>
  <p class="ko">이 계산은 손실과 이익이 딱 한 번씩 상쇄되는 단순한 경우예요. 실제로 비트코인처럼 변동성이 큰 자산은 손실-이익이 여러 해에 걸쳐 반복되는 경우가 흔한데, 반복 횟수가 늘어날수록 손익통산 없는 구조에서 내야 하는 누적 세금은 기하급수적으로 불어납니다. <a href="/blog/preparing-for-tax-reporting.html">세금 신고 준비</a>에서 다룬 것처럼, 이 구조를 미리 이해하고 있는 것과 모르고 있다가 나중에 당하는 것은 완전히 다른 결과로 이어져요.</p>
  <p class="en">This example uses a simple single loss-then-gain cycle. In reality, a volatile asset like Bitcoin often sees losses and gains repeat across many years — and the more repetitions, the more the cumulative tax burden compounds under a no-offsetting structure. As covered in <a href="/blog/preparing-for-tax-reporting.html">preparing for tax reporting</a>, understanding this structure in advance versus getting blindsided by it later leads to very different outcomes.</p>
  <p class="ja">この計算は損失と利益がちょうど1回ずつ相殺される単純なケースです。実際にビットコインのように変動性の大きい資産は損失-利益が何年にもわたって繰り返されることが珍しくなく、繰り返し回数が増えるほど損益通算なしの構造で払わなければならない累積税額は幾何級数的に膨らみます。<a href="/blog/preparing-for-tax-reporting.html">税務申告の準備</a>で扱った通り、この構造を事前に理解しておくことと、知らずに後で痛い目に遭うことはまったく異なる結果につながります。</p>

  <p class="es">Este ejemplo usa un simple ciclo único de pérdida-luego-ganancia. En realidad, un activo volátil como Bitcoin a menudo ve repetirse pérdidas y ganancias a lo largo de muchos años — y cuantas más repeticiones, más se compone la carga fiscal acumulada bajo una estructura sin compensación. Como se cubrió en <a href="/blog/preparing-for-tax-reporting.html">preparándose para el reporte de impuestos</a>, entender esta estructura de antemano versus ser sorprendido por ella después lleva a resultados muy diferentes.</p>
  <p class="de">Dieses Beispiel verwendet einen einfachen Einzelzyklus von Verlust-dann-Gewinn. In Wirklichkeit sieht ein volatiles Asset wie Bitcoin oft Verluste und Gewinne, die sich über viele Jahre wiederholen — und je mehr Wiederholungen, desto mehr summiert sich die kumulative Steuerlast unter einer Struktur ohne Ausgleich. Wie in <a href="/blog/preparing-for-tax-reporting.html">Vorbereitung auf die Steuermeldung</a> behandelt, führt es zu sehr unterschiedlichen Ergebnissen, diese Struktur im Voraus zu verstehen, verglichen damit, später davon überrascht zu werden.</p>

  <div class="box ko">⚠️ 이 계산은 단순화된 예시이며, 실제 세액은 개인 상황과 최종 확정된 법령에 따라 달라집니다. 정확한 세무 판단은 전문가와 상담하세요.</div>
  <div class="box en">⚠️ This is a simplified illustrative example. Actual tax owed depends on individual circumstances and the finalized law. Consult a tax professional for precise guidance.</div>
  <div class="box ja">⚠️ この計算は簡略化された例であり、実際の税額は個人の状況と最終確定した法令によって異なります。正確な税務判断は専門家にご相談ください。</div>
  <div class="box es">⚠️ Este es un ejemplo ilustrativo simplificado. El impuesto real adeudado depende de circunstancias individuales y la ley finalizada. Consulta a un profesional de impuestos para orientación precisa.</div>
  <div class="box de">⚠️ Dies ist ein vereinfachtes Anschauungsbeispiel. Die tatsächlich geschuldete Steuer hängt von individuellen Umständen und dem finalisierten Gesetz ab. Konsultiere einen Steuerberater für genaue Beratung.</div>
<?php require __DIR__.'/_footer.php'; ?>
