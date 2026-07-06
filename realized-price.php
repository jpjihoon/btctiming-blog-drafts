<?php $slug = 'realized-price'; require __DIR__.'/_header.php'; ?>

  <p class="ko">비트코인의 "진짜 평균 매입가"를 알 수 있다면 어떨까요? 거래소 차트의 가격은 마지막 한 건의 거래일 뿐이지만, 블록체인에는 지금까지 이동한 모든 코인의 가격이 남아 있습니다. <strong>실현가(Realized Price)</strong>는 이 데이터를 평균 내, 시장 전체가 실제로 지불한 평균 단가를 보여줍니다. 현재가가 이 선 아래로 내려가면 평균적인 투자자가 손실 상태라는 뜻으로, 역사상 가장 강력한 바닥 신호 중 하나였습니다.</p>
  <p class="en">What if you could know Bitcoin's "true average cost basis"? An exchange price is just the last single trade, but the blockchain preserves the price of every coin ever moved. <strong>Realized Price</strong> averages this data to reveal the price the entire market actually paid. When spot falls below this line, the average investor is underwater — historically one of the strongest bottom signals.</p>
  <p class="ja">ビットコインの「本当の平均取得価格」が分かればどうでしょう? 取引所の価格は最後の1件の取引にすぎませんが、ブロックチェーンにはこれまで動いたすべてのコインの価格が残っています。<strong>実現価格(Realized Price)</strong>は、このデータを平均し、市場全体が実際に支払った平均単価を示します。現在価格がこの線を下回ると、平均的な投資家が含み損状態という意味で、歴史上最も強力な底値シグナルの一つでした。</p>

  <p class="es">¿Y si pudieras conocer el "costo promedio real" de Bitcoin? El precio de un exchange es solo la última operación, pero la blockchain preserva el precio de cada moneda movida. El <strong>Precio Realizado</strong> promedia estos datos para revelar el precio que el mercado realmente pagó. Cuando el spot cae bajo esta línea, el inversor promedio está en pérdida — históricamente una de las señales de suelo más potentes.</p>
  <p class="de">Was, wenn Sie Bitcoins "wahre durchschnittliche Kostenbasis" kennen könnten? Ein Börsenpreis ist nur der letzte einzelne Handel, doch die Blockchain bewahrt den Preis jeder je bewegten Münze. Der <strong>Realized Price</strong> mittelt diese Daten und zeigt den Preis, den der Markt tatsächlich zahlte. Fällt der Spot unter diese Linie, ist der Durchschnittsinvestor im Verlust — historisch eines der stärksten Boden-Signale.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 실현가 = 실현가치 ÷ 유통 공급량. 현재가가 실현가 아래이면 역사적 저평가(2015·2018·2020·2022년 바닥에서 반복 확인), 크게 위이면 미실현 이익이 과도한 과열 구간입니다. 현재가÷실현가 비율이 2.5를 넘으면 대개 사이클 후반입니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Realized Price = Realized Cap ÷ circulating supply. Spot below it marks historical undervaluation (confirmed at the 2015, 2018, 2020, 2022 bottoms); far above it signals excessive unrealized profit. A spot/realized ratio above 2.5 is usually late-cycle.</div>
  <div class="box ja">💡 <strong>要点:</strong> 実現価格 = 実現時価総額 ÷ 流通供給量。現在価格が実現価格を下回れば歴史的割安(2015・2018・2020・2022年の底で反復確認)、大きく上回れば含み益過多の過熱圏。現在価格÷実現価格の比率が2.5を超えると大抵サイクル後半です。</div>

  <div class="box es">💡 <strong>Resumen clave:</strong> Precio Realizado = Cap. Realizada ÷ suministro circulante. El spot por debajo marca infravaloración histórica (2015, 2018, 2020, 2022); muy por encima señala ganancia excesiva. Una relación spot/realizado sobre 2.5 suele ser ciclo tardío.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Realized Price = Realized Cap ÷ zirkulierendes Angebot. Spot darunter markiert historische Unterbewertung (2015, 2018, 2020, 2022); weit darüber signalisiert übermäßigen Gewinn. Ein Spot/Realized-Verhältnis über 2,5 ist meist später Zyklus.</div>

  <h2 class="ko">구간별로 시각화하면</h2>
  <h2 class="en">Visualized by zone</h2>
  <h2 class="ja">区間を可視化すると</h2>
  <h2 class="es">Visualizado por zona</h2>
  <h2 class="de">Nach Zonen visualisiert</h2>

  <div class="ko">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">현재가 ÷ 실현가 (MVRV Ratio) 게이지</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="120" height="30" fill="#22c55e" rx="4"/>
      <text x="100" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0.7</text>
      <rect x="160" y="60" width="130" height="30" fill="#4ade80" rx="4"/>
      <text x="225" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.7 ~ 1.0</text>
      <rect x="290" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="355" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.0 ~ 1.5</text>
      <rect x="420" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="485" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.5 ~ 2.5</text>
      <rect x="550" y="60" width="110" height="30" fill="#dc2626" rx="4"/>
      <text x="605" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 2.5</text>

      <text x="100" y="110" fill="#71717a" font-size="9" text-anchor="middle">극단 저평가</text>
      <text x="225" y="110" fill="#71717a" font-size="9" text-anchor="middle">평균 손실</text>
      <text x="355" y="110" fill="#71717a" font-size="9" text-anchor="middle">적정</text>
      <text x="485" y="110" fill="#71717a" font-size="9" text-anchor="middle">이익 확대</text>
      <text x="605" y="110" fill="#71717a" font-size="9" text-anchor="middle">과열</text>

      <circle cx="120" cy="45" r="4" fill="#fff"/>
      <text x="120" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018·2022 저점</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 고점</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Spot ÷ Realized Price (MVRV Ratio) Gauge</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="120" height="30" fill="#22c55e" rx="4"/>
      <text x="100" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0.7</text>
      <rect x="160" y="60" width="130" height="30" fill="#4ade80" rx="4"/>
      <text x="225" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.7 ~ 1.0</text>
      <rect x="290" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="355" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.0 ~ 1.5</text>
      <rect x="420" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="485" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.5 ~ 2.5</text>
      <rect x="550" y="60" width="110" height="30" fill="#dc2626" rx="4"/>
      <text x="605" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 2.5</text>

      <text x="100" y="110" fill="#71717a" font-size="9" text-anchor="middle">Extreme Low</text>
      <text x="225" y="110" fill="#71717a" font-size="9" text-anchor="middle">Underwater</text>
      <text x="355" y="110" fill="#71717a" font-size="9" text-anchor="middle">Fair</text>
      <text x="485" y="110" fill="#71717a" font-size="9" text-anchor="middle">Profit</text>
      <text x="605" y="110" fill="#71717a" font-size="9" text-anchor="middle">Overheated</text>

      <circle cx="120" cy="45" r="4" fill="#fff"/>
      <text x="120" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018·2022 bottom</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 top</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">現在価格 ÷ 実現価格 (MVRV Ratio) ゲージ</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="120" height="30" fill="#22c55e" rx="4"/>
      <text x="100" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ 0.7</text>
      <rect x="160" y="60" width="130" height="30" fill="#4ade80" rx="4"/>
      <text x="225" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0.7 ~ 1.0</text>
      <rect x="290" y="60" width="130" height="30" fill="#fbbf24" rx="4"/>
      <text x="355" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.0 ~ 1.5</text>
      <rect x="420" y="60" width="130" height="30" fill="#fb923c" rx="4"/>
      <text x="485" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1.5 ~ 2.5</text>
      <rect x="550" y="60" width="110" height="30" fill="#dc2626" rx="4"/>
      <text x="605" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥ 2.5</text>

      <text x="100" y="110" fill="#71717a" font-size="9" text-anchor="middle">極端割安</text>
      <text x="225" y="110" fill="#71717a" font-size="9" text-anchor="middle">含み損</text>
      <text x="355" y="110" fill="#71717a" font-size="9" text-anchor="middle">適正</text>
      <text x="485" y="110" fill="#71717a" font-size="9" text-anchor="middle">利益拡大</text>
      <text x="605" y="110" fill="#71717a" font-size="9" text-anchor="middle">過熱</text>

      <circle cx="120" cy="45" r="4" fill="#fff"/>
      <text x="120" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2018·2022 底</text>
      <circle cx="600" cy="45" r="4" fill="#fff"/>
      <text x="600" y="35" fill="#f87171" font-size="10" font-weight="700" text-anchor="middle">2017·2021 天井</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">실현가는 어떻게 계산되나?</h2>
  <h2 class="en">How Is Realized Price Calculated?</h2>
  <h2 class="ja">実現価格はどう計算されるか?</h2>
  <h2 class="es">¿Cómo se Calcula el Precio Realizado?</h2>
  <h2 class="de">Wie wird der Realized Price berechnet?</h2>

  <h3 class="ko">1. 실현가치 (Realized Cap)</h3>
  <h3 class="en">1. Realized Cap</h3>
  <h3 class="ja">1. 実現時価総額 (Realized Cap)</h3>
  <h3 class="es">1. Cap. Realizada</h3>
  <h3 class="de">1. Realisierte Kapitalisierung</h3>

  <p class="ko">각 코인을 마지막으로 온체인에서 이동한 시점의 가격으로 평가해 모두 더한 값입니다. 일반 시가총액이 "모든 코인을 지금 가격으로" 계산한다면, 실현가치는 "각자 산 가격 그대로" 계산합니다. 그래서 투기적 거품이 걷힌 시장의 실제 투입 자본을 나타냅니다.</p>
  <p class="en">Each coin is valued at the price when it last moved on-chain, then summed. Where ordinary market cap values "every coin at today's price," Realized Cap values "each at the price it was acquired." It therefore represents the real capital deployed into the market, stripped of speculative froth.</p>
  <p class="ja">各コインを最後にオンチェーンで動いた時点の価格で評価して合計した値です。通常の時価総額が「全コインを今の価格で」計算するのに対し、実現時価総額は「各自が買った価格で」計算します。そのため投機的な泡を除いた市場の実際の投入資本を表します。</p>
  <p class="es">Cada moneda se valora al precio de su último movimiento on-chain, luego se suman. Donde la capitalización normal valora "cada moneda al precio de hoy", la Cap. Realizada valora "cada una al precio de adquisición". Representa el capital real desplegado, sin espuma especulativa.</p>
  <p class="de">Jede Münze wird zum Preis ihrer letzten On-Chain-Bewegung bewertet und summiert. Wo die normale Marktkap. "jede Münze zum heutigen Preis" bewertet, bewertet die Realized Cap "jede zum Erwerbspreis". Sie repräsentiert das real eingesetzte Kapital ohne spekulativen Schaum.</p>

  <h3 class="ko">2. 유통 공급량으로 나누기</h3>
  <h3 class="en">2. Divide by Circulating Supply</h3>
  <h3 class="ja">2. 流通供給量で割る</h3>
  <h3 class="es">2. Dividir por Suministro Circulante</h3>
  <h3 class="de">2. Durch das Umlaufangebot teilen</h3>

  <p class="ko">실현가치를 유통 중인 코인 개수로 나누면 코인 한 개당 평균 취득 단가, 즉 실현가가 나옵니다. 이것이 "시장의 손익분기선"입니다. 현재가가 이 선 위에 있으면 시장 평균이 이익, 아래에 있으면 손실 상태입니다.</p>
  <p class="en">Dividing Realized Cap by the number of circulating coins yields the average acquisition cost per coin — the Realized Price. This is the market's break-even line. Above it, the average holder is in profit; below it, in loss.</p>
  <p class="ja">実現時価総額を流通中のコイン数で割ると、コイン1枚あたりの平均取得単価、すなわち実現価格が出ます。これが「市場の損益分岐線」です。現在価格がこの線の上なら市場平均は利益、下なら含み損状態です。</p>
  <p class="es">Dividir la Cap. Realizada por el número de monedas circulantes da el costo promedio por moneda — el Precio Realizado. Es la línea de equilibrio del mercado. Por encima, el poseedor promedio gana; por debajo, pierde.</p>
  <p class="de">Die Realized Cap durch die Anzahl umlaufender Münzen zu teilen ergibt die durchschnittliche Kostenbasis pro Münze — den Realized Price. Das ist die Break-even-Linie des Marktes. Darüber ist der Durchschnittshalter im Gewinn, darunter im Verlust.</p>

  <h2 class="ko">현재가 대비 실현가 해석</h2>
  <h2 class="en">Spot vs Realized Price</h2>
  <h2 class="ja">現在価格と実現価格の解釈</h2>
  <h2 class="es">Spot vs Precio Realizado</h2>
  <h2 class="de">Spot vs Realized Price</h2>

  <table class="zt ko">
    <tr><th>현재가 / 실현가</th><th>시장 상태</th><th>의미</th><th>투자 판단</th></tr>
    <tr><td class="g">0.7 이하</td><td>극단적 저평가</td><td>거의 전부 손실</td><td class="g">강력 매수</td></tr>
    <tr><td class="g">0.7 ~ 1.0</td><td>평균 손실 구간</td><td>평균 취득가 하회</td><td class="g">매수 구간</td></tr>
    <tr><td class="y">1.0 ~ 1.5</td><td>적정</td><td>완만한 이익</td><td class="y">중립</td></tr>
    <tr><td class="y">1.5 ~ 2.5</td><td>이익 확대</td><td>차익 매물 증가</td><td class="y">주의</td></tr>
    <tr><td class="r">2.5 이상</td><td>과열</td><td>사이클 후반</td><td class="r">매도 고려</td></tr>
  </table>
  <table class="zt en">
    <tr><th>Spot / Realized</th><th>Market State</th><th>Meaning</th><th>Signal</th></tr>
    <tr><td class="g">Below 0.7</td><td>Extreme undervaluation</td><td>Nearly all underwater</td><td class="g">Strong Buy</td></tr>
    <tr><td class="g">0.7 – 1.0</td><td>Underwater zone</td><td>Below average cost</td><td class="g">Buy Zone</td></tr>
    <tr><td class="y">1.0 – 1.5</td><td>Fair</td><td>Mild profit</td><td class="y">Neutral</td></tr>
    <tr><td class="y">1.5 – 2.5</td><td>Expanding profit</td><td>Rising profit supply</td><td class="y">Caution</td></tr>
    <tr><td class="r">Above 2.5</td><td>Overheated</td><td>Late cycle</td><td class="r">Consider Selling</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>現在価格 / 実現価格</th><th>市場状態</th><th>意味</th><th>投資判断</th></tr>
    <tr><td class="g">0.7以下</td><td>極端な割安</td><td>ほぼ全員含み損</td><td class="g">強力買い</td></tr>
    <tr><td class="g">0.7〜1.0</td><td>含み損圏</td><td>平均取得価下回り</td><td class="g">買い圏</td></tr>
    <tr><td class="y">1.0〜1.5</td><td>適正</td><td>緩やかな利益</td><td class="y">中立</td></tr>
    <tr><td class="y">1.5〜2.5</td><td>利益拡大</td><td>利確売り増加</td><td class="y">注意</td></tr>
    <tr><td class="r">2.5以上</td><td>過熱</td><td>サイクル後半</td><td class="r">売却検討</td></tr>
  </table>
  <table class="zt es">
    <tr><th>Spot / Realizado</th><th>Estado</th><th>Significado</th><th>Señal</th></tr>
    <tr><td class="g">Menos de 0.7</td><td>Infravaloración extrema</td><td>Casi todos en pérdida</td><td class="g">Compra Fuerte</td></tr>
    <tr><td class="g">0.7 – 1.0</td><td>Zona de pérdida</td><td>Bajo costo medio</td><td class="g">Zona de Compra</td></tr>
    <tr><td class="y">1.0 – 1.5</td><td>Justo</td><td>Ganancia leve</td><td class="y">Neutral</td></tr>
    <tr><td class="y">1.5 – 2.5</td><td>Ganancia en aumento</td><td>Más oferta de ganancia</td><td class="y">Precaución</td></tr>
    <tr><td class="r">Más de 2.5</td><td>Sobrecalentado</td><td>Ciclo tardío</td><td class="r">Considerar Vender</td></tr>
  </table>
  <table class="zt de">
    <tr><th>Spot / Realized</th><th>Zustand</th><th>Bedeutung</th><th>Signal</th></tr>
    <tr><td class="g">Unter 0,7</td><td>Extreme Unterbewertung</td><td>Fast alle im Verlust</td><td class="g">Starker Kauf</td></tr>
    <tr><td class="g">0,7 – 1,0</td><td>Verlustzone</td><td>Unter Durchschnittskosten</td><td class="g">Kaufzone</td></tr>
    <tr><td class="y">1,0 – 1,5</td><td>Fair</td><td>Milder Gewinn</td><td class="y">Neutral</td></tr>
    <tr><td class="y">1,5 – 2,5</td><td>Wachsender Gewinn</td><td>Mehr Gewinnangebot</td><td class="y">Vorsicht</td></tr>
    <tr><td class="r">Über 2,5</td><td>Überhitzt</td><td>Später Zyklus</td><td class="r">Verkauf erwägen</td></tr>
  </table>

  <h2 class="ko">역사적 사례</h2>
  <h2 class="en">Historical Cases</h2>
  <h2 class="ja">歴史的事例</h2>
  <h2 class="es">Casos Históricos</h2>
  <h2 class="de">Historische Fälle</h2>

  <p class="ko"><strong>2018년 12월:</strong> 비트코인이 실현가(약 3,600달러)를 하회하며 3,200달러 바닥을 형성. 이후 강세장이 시작됐습니다. <strong>2020년 3월 (코로나 쇼크):</strong> 3,800달러까지 급락하며 실현가를 크게 밑돌았으나, 이 지점이 사상 최고의 매수 기회였습니다. <strong>2022년 11월:</strong> FTX 붕괴로 15,500달러까지 하락하며 실현가(약 21,000달러)를 30% 밑돌았고, 이것이 사이클 바닥이었습니다. 세 번 모두 실현가 하회는 "패닉 매도의 정점"과 일치했습니다.</p>
  <p class="en"><strong>Dec 2018:</strong> Bitcoin fell below Realized Price (~$3,600), forming the $3,200 bottom; a bull market followed. <strong>Mar 2020 (COVID crash):</strong> A plunge to $3,800 pushed spot far below Realized Price — the best buying opportunity in history. <strong>Nov 2022:</strong> The FTX collapse drove spot to $15,500, ~30% below Realized Price (~$21,000), marking the cycle bottom. In all three, falling below Realized Price coincided with the peak of panic selling.</p>
  <p class="ja"><strong>2018年12月:</strong> ビットコインが実現価格(約3,600ドル)を下回り3,200ドルの底を形成。その後強気相場が始まりました。<strong>2020年3月(コロナショック):</strong> 3,800ドルまで急落し実現価格を大きく下回りましたが、この地点が史上最高の買い機会でした。<strong>2022年11月:</strong> FTX破綻で15,500ドルまで下落、実現価格(約21,000ドル)を30%下回り、これがサイクルの底でした。3回とも実現価格割れは「パニック売りの頂点」と一致しました。</p>
  <p class="es"><strong>Dic 2018:</strong> Bitcoin cayó bajo el Precio Realizado (~$3,600), formando el suelo de $3,200; siguió un mercado alcista. <strong>Mar 2020 (crash COVID):</strong> Una caída a $3,800 llevó el spot muy por debajo — la mejor oportunidad de la historia. <strong>Nov 2022:</strong> El colapso de FTX llevó el spot a $15,500, ~30% bajo el Precio Realizado (~$21,000), marcando el suelo. En los tres, caer bajo el Precio Realizado coincidió con el pico del pánico.</p>
  <p class="de"><strong>Dez 2018:</strong> Bitcoin fiel unter den Realized Price (~3.600 $) und bildete den Boden bei 3.200 $; ein Bullenmarkt folgte. <strong>März 2020 (COVID-Crash):</strong> Ein Sturz auf 3.800 $ drückte den Spot weit darunter — die beste Gelegenheit der Geschichte. <strong>Nov 2022:</strong> Der FTX-Kollaps trieb den Spot auf 15.500 $, ~30 % unter den Realized Price (~21.000 $), und markierte den Boden. In allen drei Fällen fiel das Unterschreiten mit dem Höhepunkt der Panik zusammen.</p>

  <h2 class="ko">한계점</h2>
  <h2 class="en">Limitations</h2>
  <h2 class="ja">限界点</h2>
  <h2 class="es">Limitaciones</h2>
  <h2 class="de">Grenzen</h2>

  <p class="ko">실현가는 강력한 지지선이지만 절대적 바닥은 아닙니다. 2018년과 2022년 약세장에서는 현재가가 실현가 아래로 내려간 뒤에도 수개월간 그 상태가 이어졌습니다. 즉 "실현가 하회 = 즉시 반등"이 아니라 "역사적으로 유리한 매집 구간"으로 해석해야 합니다. 알트코인은 온체인 데이터 신뢰도가 낮아 추정치를 쓰는 경우가 많으니 참고용으로만 보세요.</p>
  <p class="en">Realized Price is a powerful support but not an absolute floor. In the 2018 and 2022 bears, spot stayed below Realized Price for months after crossing under. Read it as "a historically favorable accumulation zone," not "an instant bounce." For altcoins, on-chain data reliability is lower and estimates are often used — treat those as reference only.</p>
  <p class="ja">実現価格は強力な支持線ですが絶対的な底ではありません。2018年と2022年の弱気相場では、現在価格が実現価格を下回った後も数ヶ月その状態が続きました。「実現価格割れ=即反発」ではなく「歴史的に有利な仕込み圏」と解釈すべきです。アルトコインはオンチェーンデータの信頼度が低く推定値を使う場合が多いため、参考程度に見てください。</p>
  <p class="es">El Precio Realizado es un soporte poderoso pero no un suelo absoluto. En 2018 y 2022, el spot permaneció por debajo durante meses tras cruzar. Léelo como "zona de acumulación favorable", no "rebote instantáneo". Para altcoins, la fiabilidad on-chain es menor y se usan estimaciones — solo como referencia.</p>
  <p class="de">Der Realized Price ist eine starke Unterstützung, aber kein absoluter Boden. In den Bärenmärkten 2018 und 2022 blieb der Spot nach dem Unterschreiten monatelang darunter. Lesen Sie ihn als "günstige Akkumulationszone", nicht als "sofortige Erholung". Bei Altcoins ist die On-Chain-Zuverlässigkeit geringer — nur als Referenz.</p>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Indicators to Pair With</h2>
  <h2 class="ja">併せて見たい指標</h2>
  <h2 class="es">Indicadores Complementarios</h2>
  <h2 class="de">Ergänzende Indikatoren</h2>

  <p class="ko">실현가는 <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a>(현재가÷실현가의 통계적 정규화), <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a>(미실현 손익 심리)과 형제 지표입니다. 세 지표를 함께 보면 밸류에이션 판단이 훨씬 견고해집니다. 전체 지표 활용법은 <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">온체인 지표 종합 가이드</a>를 참고하세요.</p>
  <p class="en">Realized Price is a sibling of <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (a statistical normalization of spot÷realized) and <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> (unrealized-P&L sentiment). Reading all three makes valuation calls far more robust. See the <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain Indicators Complete Guide</a> for the full picture.</p>
  <p class="ja">実現価格は<a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Zスコア</a>(現在価格÷実現価格の統計的正規化)、<a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a>(未実現損益心理)の兄弟指標です。3指標を併せて見ると評価判断がより強固になります。全指標の活用法は<a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">オンチェーン指標総合ガイド</a>を参照してください。</p>
  <p class="es">El Precio Realizado es hermano del <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (normalización estadística de spot÷realizado) y del <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> (sentimiento de P&L). Leer los tres hace las valoraciones más robustas. Consulta la <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">Guía Completa de Indicadores On-Chain</a>.</p>
  <p class="de">Der Realized Price ist ein Geschwister des <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> (statistische Normalisierung von Spot÷Realized) und des <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> (Sentiment). Alle drei zu lesen macht Bewertungen robuster. Siehe die <a href="/blog/onchain-indicators-guide.php<?= h(langSuffix($lang)) ?>">On-Chain-Indikatoren Komplettanleitung</a>.</p>

  <div class="box ko">📊 <strong>BTCtiming 대시보드에서는</strong> 현재가와 실현가의 괴리가 매수·매도 점수에 반영됩니다. 실시간 실현가 대비 위치를 대시보드에서 확인해 보세요.</div>
  <div class="box en">📊 <strong>On the BTCtiming dashboard,</strong> the gap between spot and Realized Price feeds the buy/sell score. Check where price sits relative to Realized Price in real time.</div>
  <div class="box ja">📊 <strong>BTCtimingダッシュボードでは</strong> 現在価格と実現価格の乖離が売買スコアに反映されます。リアルタイムの実現価格に対する位置を確認してみてください。</div>
  <div class="box es">📊 <strong>En el panel de BTCtiming,</strong> la brecha entre spot y Precio Realizado alimenta la puntuación. Consulta la posición del precio en tiempo real.</div>
  <div class="box de">📊 <strong>Im BTCtiming-Dashboard</strong> fließt die Lücke zwischen Spot und Realized Price in den Score ein. Prüfen Sie die Position des Preises in Echtzeit.</div>

<?php require __DIR__.'/_footer.php'; ?>
