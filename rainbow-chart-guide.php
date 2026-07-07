<?php $slug = 'rainbow-chart-guide'; require __DIR__.'/_header.php'; ?>

<p class="ko">"밈으로 시작했는데 꽤 잘 맞아서 다들 진지하게 쓰고 있다"는 지표가 있다면 <strong>무지개차트(Rainbow Chart)</strong>가 대표적이에요. 로그 스케일에서 비트코인 가격의 장기 성장 추세를 색깔 띠로 표현한 차트입니다.</p>
  <p class="en">If there's an indicator that "started as a joke but turned out to work well enough that people use it seriously," it's the <strong>Rainbow Chart</strong> — a colored band visualizing Bitcoin's long-term log-scale growth trend.</p>
  <p class="ja">「ミームとして始まったのに、意外とよく当たるので皆が真剣に使っている」指標があるとすれば、それが<strong>虹チャート(Rainbow Chart)</strong>です。ログスケールでビットコイン価格の長期成長トレンドを色帯で表現したチャートです。</p>

  <p class="es">Si hay un indicador que "empezó como una broma pero funcionó lo suficientemente bien como para que la gente lo use en serio," es el <strong>Rainbow Chart</strong> — una banda de colores que visualiza la tendencia de crecimiento a largo plazo de Bitcoin en escala logarítmica.</p>
  <p class="de">Wenn es einen Indikator gibt, der "als Scherz begann, aber gut genug funktionierte, dass er ernsthaft genutzt wird," dann ist es der <strong>Rainbow Chart</strong> — ein farbiges Band, das Bitcoins langfristigen Wachstumstrend auf logarithmischer Skala visualisiert.</p>
  <p class="fr">S'il existe un indicateur qui « a commencé comme une blague, mais s'est avéré suffisamment fiable pour que tout le monde l'utilise sérieusement », c'est bien le <strong>Rainbow Chart</strong> — une bande colorée qui visualise la tendance de croissance à long terme du Bitcoin sur une échelle logarithmique.</p>
  <p class="pt">Se existe um indicador que "começou como uma piada, mas acabou funcionando bem o suficiente para que as pessoas o usem a sério", esse indicador é o <strong>Rainbow Chart</strong> — uma faixa colorida que visualiza a tendência de crescimento de longo prazo do Bitcoin em escala logarítmica.</p>
  <p class="tr">"Şaka olarak başladı ama yeterince işe yaradığı için insanlar onu ciddiye almaya başladı" denebilecek bir gösterge varsa, bu <strong>Rainbow Chart</strong>'tır — Bitcoin'in uzun vadeli logaritmik ölçekli büyüme trendini renkli bantlarla görselleştiren bir grafik.</p>
  <p class="vi">Nếu có một chỉ báo "bắt đầu như một trò đùa nhưng lại hoạt động đủ tốt để mọi người sử dụng nó một cách nghiêm túc," thì đó chính là <strong>Rainbow Chart</strong> — một dải màu thể hiện xu hướng tăng trưởng dài hạn của Bitcoin trên thang đo logarit.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 비트코인 가격을 로그 스케일로 놓고 시간에 따른 회귀선을 그은 뒤, 그 위아래로 색깔 띠를 나눈 차트입니다. 파란색(저평가)에서 빨간색(과열)까지 9단계로 나뉘며, 지금까지 극단적 색상 구간이 실제 사이클 저점·고점과 여러 번 겹쳤습니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Bitcoin's price plotted on a log scale with a regression line through time, divided into color bands above and below it. Nine tiers run from blue (undervalued) to red (overheated), and the extreme-color zones have repeatedly overlapped with actual cycle tops and bottoms.</div>
  <div class="box ja">💡 <strong>要点:</strong> ビットコイン価格をログスケールで表示し、時間軸に沿った回帰線を引いた上で、その上下を色帯で分けたチャートです。青(割安)から赤(過熱)まで9段階に分かれ、これまで極端な色の区間が実際のサイクル底値・天井と何度も重なってきました。</div>
  <div class="box es">💡 <strong>Resumen clave:</strong> El precio de Bitcoin trazado en escala logarítmica con una línea de regresión a través del tiempo, dividida en bandas de color por encima y por debajo. Nueve niveles van del azul (infravalorado) al rojo (sobrecalentado), y las zonas de color extremo han coincidido repetidamente con techos y suelos de ciclo reales.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Bitcoins Preis auf logarithmischer Skala mit einer Regressionslinie über die Zeit, unterteilt in Farbbänder darüber und darunter. Neun Stufen reichen von Blau (unterbewertet) bis Rot (überhitzt), und die Extremfarbzonen fielen wiederholt mit tatsächlichen Zyklushochs und -tiefs zusammen.</div>

  <h2 class="ko">왜 로그 스케일인가</h2>
  <h2 class="en">Why a log scale?</h2>
  <h2 class="ja">なぜログスケールなのか</h2>
  <h2 class="es">¿Por qué una escala logarítmica?</h2>
  <h2 class="de">Warum eine logarithmische Skala?</h2>
  <p class="ko">비트코인은 초기엔 몇 센트에서 몇 달러로 움직이는 것도 "수십 배" 상승이었고, 지금은 몇만 달러 단위로 움직여도 비율로는 작은 변화예요. 일반 선형 차트로 보면 초기 변동은 아예 안 보이고 최근 몇 년만 두드러지게 보이는 착시가 생깁니다. 로그 스케일은 "몇 배 상승했는가"라는 비율 변화를 동일한 시각적 간격으로 보여줘서, 전체 역사를 왜곡 없이 한눈에 담을 수 있게 해줘요.</p>
  <p class="en">Early Bitcoin moving from cents to a few dollars was a "tens-of-times" gain; today, moving by thousands of dollars is a small percentage change. A regular linear chart makes early history invisible and recent years look dominant — an optical illusion. A log scale shows proportional change ("how many times over") at equal visual intervals, letting the entire history be viewed without distortion.</p>
  <p class="ja">初期のビットコインは数セントから数ドルへの変動でも「数十倍」の上昇でしたが、今では数万ドル単位の変動でも比率としては小さな変化です。通常の線形チャートで見ると、初期の変動はまったく見えず直近数年だけが目立つという錯覚が生まれます。ログスケールは「何倍に上昇したか」という比率変化を同じ視覚的間隔で示すため、歴史全体を歪みなく一目で捉えられるようにしてくれます。</p>
  <p class="es">El Bitcoin temprano moviéndose de centavos a unos pocos dólares era una ganancia de "decenas de veces"; hoy, moverse por miles de dólares es un cambio porcentual pequeño. Un gráfico lineal normal hace invisible la historia temprana y hace que los años recientes parezcan dominantes — una ilusión óptica. Una escala logarítmica muestra el cambio proporcional ("cuántas veces más") en intervalos visuales iguales, permitiendo ver toda la historia sin distorsión.</p>
  <p class="de">Der frühe Bitcoin, der von Cent auf ein paar Dollar stieg, war ein Gewinn von "zig-facher" Größe; heute ist eine Bewegung um Tausende von Dollar eine kleine prozentuale Veränderung. Ein normales lineares Diagramm macht die frühe Geschichte unsichtbar und lässt die letzten Jahre dominant erscheinen — eine optische Täuschung. Eine logarithmische Skala zeigt proportionale Veränderung ("wie oft mehr") in gleichen visuellen Abständen und ermöglicht es, die gesamte Geschichte ohne Verzerrung zu betrachten.</p>

  <h2 class="ko">역사적으로 어떻게 맞아떨어졌나</h2>
  <h2 class="en">How it's lined up historically</h2>
  <h2 class="ja">歴史的にどう一致してきたか</h2>
  <h2 class="es">Cómo se ha alineado históricamente</h2>
  <h2 class="de">Wie es historisch übereinstimmte</h2>
  <p class="ko">2018년 저점과 2022년 저점 모두 무지개차트의 파란색(저평가) 구간에서 형성됐고, 2017년과 2021년 고점은 모두 주황~빨강(과열) 구간에서 나왔습니다. 로그 성장 추세라는 단순한 가정 하나가 여러 사이클에 걸쳐 대략적인 궤도를 계속 그려낸 셈이에요.</p>
  <p class="en">Both the 2018 and 2022 bottoms formed within the blue (undervalued) band, and the 2017 and 2021 tops both landed in the orange-to-red (overheated) range. A single simple assumption — log-scale growth — has kept roughly tracing the path across multiple cycles.</p>
  <p class="ja">2018年の底値と2022年の底値はいずれも虹チャートの青(割安)区間で形成され、2017年と2021年の天井はいずれもオレンジ〜赤(過熱)区間から出ました。ログスケール成長というシンプルな一つの仮定が、複数のサイクルにわたっておおよその軌道を描き続けてきたことになります。</p>
  <p class="es">Tanto el suelo de 2018 como el de 2022 se formaron dentro de la banda azul (infravalorada), y los techos de 2017 y 2021 cayeron ambos en el rango naranja-a-rojo (sobrecalentado). Una única suposición simple —crecimiento en escala logarítmica— ha seguido trazando aproximadamente el camino a través de múltiples ciclos.</p>
  <p class="de">Sowohl das Tief von 2018 als auch das von 2022 bildeten sich innerhalb des blauen (unterbewerteten) Bandes, und die Hochs von 2017 und 2021 fielen beide in den orange-bis-roten (überhitzten) Bereich. Eine einzige einfache Annahme — logarithmisches Wachstum — hat den Pfad über mehrere Zyklen hinweg ungefähr nachgezeichnet.</p>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <h2 class="es">Advertencias importantes</h2>
  <h2 class="de">Wichtige Einschränkungen</h2>
  <ul class="ko">
    <li><strong>회귀선 자체가 확정적 법칙이 아님.</strong> 과거 데이터에 맞춰 그린 곡선일 뿐, 미래에도 같은 성장률이 이어진다는 물리적 근거는 없습니다.</li>
    <li><strong>시가총액이 커질수록 성장률 둔화 가능.</strong> 자산 규모가 커지면 과거와 같은 배율의 상승은 통계적으로 점점 어려워집니다.</li>
    <li><strong>재미로 만들어진 지표라는 태생 자체를 기억할 것.</strong> 정밀한 계산이 아니라 시각적 직관을 돕는 보조 도구로 쓰는 게 적절합니다.</li>
  </ul>
  <ul class="en">
    <li><strong>The regression line isn't a physical law.</strong> It's fit to past data — there's no fundamental reason future growth must follow the same curve.</li>
    <li><strong>Growth rate likely decelerates as market cap grows.</strong> Larger asset size statistically makes past-style multiples harder to repeat.</li>
    <li><strong>Remember its playful origins.</strong> Best used as a visual intuition aid, not a precise calculation.</li>
  </ul>
  <ul class="ja">
    <li><strong>回帰線自体が確定的な法則ではない。</strong> 過去データに合わせて描いた曲線に過ぎず、将来も同じ成長率が続くという物理的根拠はありません。</li>
    <li><strong>時価総額が大きくなるほど成長率が鈍化する可能性。</strong> 資産規模が大きくなると、過去と同じ倍率の上昇は統計的にますます難しくなります。</li>
    <li><strong>遊び心から生まれた指標であることを忘れないこと。</strong> 精密な計算ではなく、視覚的直感を助ける補助ツールとして使うのが適切です。</li>
  </ul>
  <ul class="es">
    <li><strong>La línea de regresión no es una ley física.</strong> Está ajustada a datos pasados — no hay razón fundamental por la que el crecimiento futuro deba seguir la misma curva.</li>
    <li><strong>La tasa de crecimiento probablemente se desacelere a medida que crece la capitalización de mercado.</strong> Un mayor tamaño del activo hace estadísticamente más difícil repetir múltiplos del pasado.</li>
    <li><strong>Recuerde sus orígenes lúdicos.</strong> Mejor usado como ayuda de intuición visual, no como cálculo preciso.</li>
  </ul>
  <ul class="de">
    <li><strong>Die Regressionslinie ist kein physikalisches Gesetz.</strong> Sie ist an vergangene Daten angepasst — es gibt keinen fundamentalen Grund, warum zukünftiges Wachstum derselben Kurve folgen muss.</li>
    <li><strong>Die Wachstumsrate verlangsamt sich wahrscheinlich mit steigender Marktkapitalisierung.</strong> Größere Vermögensgröße macht es statistisch schwieriger, Multiplikatoren im alten Stil zu wiederholen.</li>
    <li><strong>Denken Sie an seinen spielerischen Ursprung.</strong> Am besten als visuelle Intuitionshilfe genutzt, nicht als präzise Berechnung.</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best combined with</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor combinado con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <p class="ko">단독으로 매매 근거로 삼기보다는, <a href="/blog/200-week-moving-average.html">200주 이동평균선</a>이나 <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> 같은 정량적 지표와 교차 확인하는 용도로 쓰는 게 좋습니다.</p>
  <p class="en">Better used to cross-check against quantitative indicators like the <a href="/blog/200-week-moving-average.html">200-week MA</a> or <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> than as a standalone trading trigger.</p>
  <p class="ja">単独で売買の根拠にするよりも、<a href="/blog/200-week-moving-average.html">200週移動平均線</a>や<a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>のような定量的指標との相互確認用に使うのが良いでしょう。</p>
<p class="es">Mejor usado para verificación cruzada con indicadores cuantitativos como la <a href="/blog/200-week-moving-average.html">MA de 200 semanas</a> o el <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> que como disparador de trading independiente.</p>
<p class="de">Besser geeignet zum Abgleich mit quantitativen Indikatoren wie dem <a href="/blog/200-week-moving-average.html">200-Wochen-MA</a> oder dem <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> als eigenständiger Handelsauslöser.</p>
<?php require __DIR__.'/_footer.php'; ?>
