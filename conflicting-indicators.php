<?php $slug = 'conflicting-indicators'; require __DIR__.'/_header.php'; ?>

<p class="ko">온체인 지표를 몇 개 보다 보면 꼭 이런 순간이 와요. MVRV Z-Score는 저평가라고 하는데, 펀딩비는 과열이라고 하고, Hash Ribbon은 아직 항복 중이라고 하고. 셋 다 틀린 말은 아닌데, 셋 다 다른 방향을 가리키는 거죠. 이럴 때 뭘 믿어야 할까요?</p>
  <p class="en">Once you start tracking a few on-chain indicators, this moment always comes. MVRV Z-Score says undervalued. Funding says overheated. Hash Ribbon says still capitulating. None of them are wrong — they're just pointing in different directions. So what do you trust?</p>
  <p class="ja">オンチェーン指標をいくつか見ていると、必ずこんな瞬間が来ます。MVRV Zスコアは割安だと言い、ファンディングレートは過熱だと言い、Hash Ribbonはまだキャピチュレーション中だと言う。3つとも間違ってはいないのに、3つとも違う方向を指しているのです。こんな時、何を信じればいいでしょうか?</p>

  <p class="es">Una vez que empiezas a rastrear algunos indicadores on-chain, este momento siempre llega. El MVRV Z-Score dice infravalorado. La financiación dice sobrecalentado. Hash Ribbon dice que aún hay capitulación. Ninguno está equivocado — simplemente apuntan en direcciones diferentes. Entonces, ¿en qué confías?</p>
  <p class="de">Sobald man anfängt, einige On-Chain-Indikatoren zu verfolgen, kommt dieser Moment immer. Der MVRV Z-Score sagt unterbewertet. Die Funding Rate sagt überhitzt. Hash Ribbon sagt noch Kapitulation. Keiner von ihnen liegt falsch — sie zeigen einfach in unterschiedliche Richtungen. Also, wem vertraut man?</p>

  <h2 class="ko">먼저, 지표마다 "시간축"이 다르다는 걸 기억하세요</h2>
  <h2 class="en">First, remember every indicator has a different timeframe</h2>
  <h2 class="ja">まず、指標ごとに「時間軸」が違うことを覚えておく</h2>
  <h2 class="es">Primero, Recuerda Que Cada Indicador Tiene un Marco Temporal Diferente</h2>
  <h2 class="de">Erstens: Jeder Indikator hat einen anderen Zeitrahmen</h2>
  <p class="ko">이게 제일 자주 놓치는 부분이에요. <a href="/blog/funding-rate-futures-gap.html">펀딩비</a>는 몇 시간~며칠 단위로 움직이는 초단기 지표고, <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>는 몇 주~몇 달 단위의 밸류에이션 지표고, <a href="/blog/bitcoin-halving-timing.html">반감기 사이클</a>은 아예 몇 년 단위예요. 이 셋을 같은 무게로 비교하면 당연히 엇갈릴 수밖에 없어요. 마치 오늘 날씨랑 이번 달 기후랑 올해 계절을 같은 잣대로 비교하는 것과 비슷하달까요.</p>
  <p class="en">This is the most commonly missed point. <a href="/blog/funding-rate-futures-gap.html">Funding rate</a> operates on an hours-to-days timescale. <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> operates on a weeks-to-months valuation timescale. The <a href="/blog/bitcoin-halving-timing.html">halving cycle</a> operates on a years timescale. Comparing all three at equal weight is guaranteed to produce conflicts. It's a bit like comparing today's weather, this month's climate, and this year's season on the same scale.</p>
  <p class="ja">これが最もよく見落とされる部分です。<a href="/blog/funding-rate-futures-gap.html">ファンディングレート</a>は数時間〜数日単位で動く超短期指標、<a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>は数週間〜数ヶ月単位のバリュエーション指標、<a href="/blog/bitcoin-halving-timing.html">半減期サイクル</a>はそもそも数年単位です。この3つを同じ重みで比較すれば当然食い違うしかありません。今日の天気と今月の気候と今年の季節を同じ物差しで比較するようなものです。</p>

  <p class="es">Este es el punto más comúnmente pasado por alto. La <a href="/blog/funding-rate-futures-gap.html">tasa de financiación</a> opera en una escala de horas a días. El <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> opera en una escala de valoración de semanas a meses. El <a href="/blog/bitcoin-halving-timing.html">ciclo de halving</a> opera en una escala de años. Comparar los tres con el mismo peso está garantizado a producir conflictos. Es un poco como comparar el clima de hoy, el clima de este mes y la estación de este año en la misma escala.</p>
  <p class="de">Dies ist der am häufigsten übersehene Punkt. Die <a href="/blog/funding-rate-futures-gap.html">Funding Rate</a> arbeitet auf einer Stunden-bis-Tage-Zeitskala. Der <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> arbeitet auf einer Wochen-bis-Monate-Bewertungszeitskala. Der <a href="/blog/bitcoin-halving-timing.html">Halving-Zyklus</a> arbeitet auf einer Jahres-Zeitskala. Alle drei mit gleichem Gewicht zu vergleichen, führt garantiert zu Konflikten. Es ist ein bisschen wie das heutige Wetter, das Klima dieses Monats und die Jahreszeit dieses Jahres auf derselben Skala zu vergleichen.</p>

  <h2 class="ko">그럼 어떤 순서로 봐야 하나</h2>
  <h2 class="en">So what order should you check them in?</h2>
  <h2 class="ja">ではどんな順序で見るべきか</h2>
  <h2 class="es">Entonces En Qué Orden Deberías Revisarlos</h2>
  <h2 class="de">In welcher Reihenfolge sollte man sie also prüfen?</h2>
  <p class="ko">저는 개인적으로 이런 순서를 씁니다 — <strong>사이클(수년) → 밸류에이션(수개월) → 심리·자금흐름(수주) → 레버리지(수일)</strong>. 큰 시간축부터 작은 시간축 순서로요. 큰 그림이 매수 구간을 가리키면, 그다음엔 세부 타이밍을 작은 시간축 지표로 다듬는 식이에요.</p>
  <p class="en">Personally I check them in this order — <strong>cycle (years) → valuation (months) → sentiment/flow (weeks) → leverage (days)</strong>. From the largest timeframe to the smallest. If the big picture points to a buy zone, I use the shorter-timeframe indicators to fine-tune entry timing within that.</p>
  <p class="ja">私は個人的にこの順序を使っています — <strong>サイクル(数年)→バリュエーション(数ヶ月)→心理・資金フロー(数週間)→レバレッジ(数日)</strong>。大きな時間軸から小さな時間軸の順に。大きな絵が買いゾーンを示せば、その後は短い時間軸の指標で細かいタイミングを調整する方式です。</p>

  <p class="es">Personalmente los reviso en este orden — <strong>ciclo (años) → valoración (meses) → sentimiento/flujo (semanas) → apalancamiento (días)</strong>. Del marco temporal más grande al más pequeño. Si el panorama general apunta a una zona de compra, uso los indicadores de plazo más corto para afinar el momento de entrada dentro de eso.</p>
  <p class="de">Persönlich prüfe ich sie in dieser Reihenfolge — <strong>Zyklus (Jahre) → Bewertung (Monate) → Stimmung/Fluss (Wochen) → Hebel (Tage)</strong>. Vom größten zum kleinsten Zeitrahmen. Wenn das Gesamtbild auf eine Kaufzone hindeutet, nutze ich die kürzerfristigen Indikatoren, um das Einstiegs-Timing darin zu verfeinern.</p>

  <div class="rc">
    <div class="rd">예시</div>
    <div class="rt ko">반감기 사이클상 매수 구간(큰 그림 OK) + MVRV Z-Score 0 이하(밸류에이션 OK) + 그런데 펀딩비가 일시적으로 과열(단기 노이즈)</div>
    <div class="rt en">Cycle says buy zone (big picture OK) + MVRV Z-Score below 0 (valuation OK) + but funding is temporarily overheated (short-term noise)</div>
    <div class="rt ja">半減期サイクル上は買いゾーン(大きな絵OK) + MVRV Zスコア0以下(バリュエーションOK) + しかしファンディングレートが一時的に過熱(短期ノイズ)</div>
    <div class="rt es">El ciclo dice zona de compra (panorama general OK) + MVRV Z-Score por debajo de 0 (valoración OK) + pero la financiación está temporalmente sobrecalentada (ruido a corto plazo)</div>
    <div class="rt de">Der Zyklus sagt Kaufzone (Gesamtbild OK) + MVRV Z-Score unter 0 (Bewertung OK) + aber Funding ist vorübergehend überhitzt (kurzfristiges Rauschen)</div>
    <div class="rr ko">→ 이 경우, 펀딩비 과열은 며칠~몇 주 내 해소될 단기 노이즈로 보고 큰 그림을 우선시하는 게 합리적</div>
    <div class="rr en">→ Here, treating the funding overheat as short-term noise that resolves in days-to-weeks and prioritizing the big picture is the more reasonable call</div>
    <div class="rr ja">→ この場合、ファンディングレート過熱は数日〜数週間で解消される短期ノイズと見て、大きな絵を優先するのが合理的</div>
    <div class="rr es">→ Aquí, tratar el sobrecalentamiento de financiación como ruido a corto plazo que se resuelve en días a semanas y priorizar el panorama general es la decisión más razonable</div>
    <div class="rr de">→ Hier ist es die vernünftigere Entscheidung, die Funding-Überhitzung als kurzfristiges Rauschen zu behandeln, das sich in Tagen bis Wochen auflöst, und das Gesamtbild zu priorisieren</div>
  </div>

  <h2 class="ko">엇갈림 자체가 정보일 때도 있다</h2>
  <h2 class="en">Sometimes the disagreement itself is the information</h2>
  <h2 class="ja">食い違い自体が情報である時もある</h2>
  <h2 class="es">A Veces el Desacuerdo Mismo Es la Información</h2>
  <h2 class="de">Manchmal ist die Uneinigkeit selbst die Information</h2>
  <p class="ko">모든 지표가 완벽하게 일치하는 순간은 사실 드물어요. 오히려 그런 순간이 오면 이미 너무 많은 사람이 알아챈 뒤일 가능성이 높죠. 지표들이 살짝 엇갈리면서 "3~5개는 맞고 2~3개는 아직"인 상태가, 사실 진짜 기회가 형성되는 과정일 때가 많습니다. <a href="/blog/bitcoin-buy-timing-guide.html">종합 체크리스트</a>에서 신호 개수로 확신도를 나누는 것도 이런 이유예요.</p>
  <p class="en">Perfect alignment across every indicator is actually rare. And when it does happen, it's often because too many people have already noticed. A state where "3–5 line up, 2–3 don't yet" is frequently the actual process by which a real opportunity forms. That's exactly why the <a href="/blog/bitcoin-buy-timing-guide.html">complete checklist</a> tiers confidence by signal count rather than requiring unanimous agreement.</p>
  <p class="ja">すべての指標が完璧に一致する瞬間は実は稀です。むしろそんな瞬間が来た時は、すでにあまりに多くの人が気づいた後である可能性が高いです。指標が少し食い違いながら「3〜5個は合っていて2〜3個はまだ」という状態が、実は本物の機会が形成される過程であることが多いです。<a href="/blog/bitcoin-buy-timing-guide.html">総合チェックリスト</a>でシグナル数で確信度を分けているのもこの理由です。</p>
  <p class="es">La alineación perfecta entre todos los indicadores es en realidad rara. Y cuando sucede, a menudo es porque demasiada gente ya se dio cuenta. Un estado donde "3-5 se alinean, 2-3 aún no" es frecuentemente el proceso real por el cual se forma una oportunidad real. Por eso exactamente la <a href="/blog/bitcoin-buy-timing-guide.html">lista de verificación completa</a> escala la confianza por el número de señales en lugar de requerir acuerdo unánime.</p>
  <p class="de">Perfekte Übereinstimmung bei allen Indikatoren ist tatsächlich selten. Und wenn es passiert, liegt es oft daran, dass bereits zu viele Menschen es bemerkt haben. Ein Zustand, in dem "3-5 stimmen überein, 2-3 noch nicht" ist häufig der tatsächliche Prozess, durch den sich eine echte Chance bildet. Genau deshalb stuft die <a href="/blog/bitcoin-buy-timing-guide.html">vollständige Checkliste</a> das Vertrauen nach Signalanzahl ab, statt einstimmige Übereinstimmung zu verlangen.</p>
<?php require __DIR__.'/_footer.php'; ?>
