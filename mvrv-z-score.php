<?php $slug = 'mvrv-z-score'; require __DIR__.'/_header.php'; ?>

  <p class="ko">비트코인 투자에서 가장 어려운 질문은 언제나 같습니다. <strong>"지금이 바닥인가, 아니면 더 떨어질 것인가?"</strong> MVRV Z-Score는 이 질문에 데이터로 답하는 온체인 지표로, 지난 10년간 비트코인의 주요 저점과 고점을 놀라울 정도로 정확하게 포착해왔습니다.</p>
  <p class="en">The hardest question in Bitcoin investing is always the same: <strong>"Is this the bottom, or will it fall further?"</strong> MVRV Z-Score answers this with data — catching every major Bitcoin bottom and top over the past decade with remarkable accuracy.</p>
  <p class="ja">ビットコイン投資で最も難しい問いは、いつも同じです。<strong>「今が底値なのか、それともまだ下がるのか?」</strong> MVRV Zスコアは、この問いにデータで答えるオンチェーン指標で、過去10年間のビットコインの主要な底値と天井を驚くほど正確に捉えてきました。</p>

  <p class="es">La pregunta más difícil en la inversión en Bitcoin siempre es la misma: <strong>"¿es este el suelo, o caerá más?"</strong> El MVRV Z-Score responde a esto con datos — capturando cada suelo y techo importante de Bitcoin en la última década con notable precisión.</p>
  <p class="de">Die schwierigste Frage beim Bitcoin-Investment ist immer dieselbe: <strong>"Ist das der Boden, oder fällt es noch weiter?"</strong> Der MVRV Z-Score beantwortet dies mit Daten — er hat jedes wichtige Bitcoin-Tief und -Hoch der letzten zehn Jahre mit bemerkenswerter Genauigkeit erfasst.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> MVRV Z-Score가 0 이하이면 역사적 저평가 구간, 3.5 이상이면 과열 구간입니다. 2015년, 2018년, 2022년 비트코인 바닥에서 모두 0 이하를 기록했습니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> MVRV Z-Score below 0 signals historical undervaluation; above 3.5 signals overheating. All three major Bitcoin bottoms — 2015, 2018, 2022 — recorded values below 0.</div>
  <div class="box ja">💡 <strong>要点:</strong> MVRV Zスコアが0以下なら歴史的な割安圏、3.5以上なら過熱圏です。2015年・2018年・2022年のビットコイン底値は、いずれも0以下を記録しました。</div>

  <div class="box es">💡 <strong>Resumen clave:</strong> Un MVRV Z-Score por debajo de 0 señala infravaloración histórica; por encima de 3.5 señala sobrecalentamiento. Los tres suelos principales de Bitcoin — 2015, 2018, 2022 — registraron valores por debajo de 0.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Ein MVRV Z-Score unter 0 signalisiert historische Unterbewertung; über 3,5 signalisiert Überhitzung. Alle drei großen Bitcoin-Tiefs — 2015, 2018, 2022 — verzeichneten Werte unter 0.</div>

  <h2 class="ko">구간별로 시각화하면</h2>
  <h2 class="en">Visualized by zone</h2>
  <h2 class="ja">区間を可視化すると</h2>

  <div class="ko">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">MVRV Z-Score 구간 게이지</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="100" height="30" fill="#22c55e" rx="4"/>
      <text x="90" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ -1</text>
      <rect x="140" y="60" width="100" height="30" fill="#4ade80" rx="4"/>
      <text x="190" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">-1~0</text>
      <rect x="240" y="60" width="120" height="30" fill="#fbbf24" rx="4"/>
      <text x="300" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0~1</text>
      <rect x="360" y="60" width="140" height="30" fill="#fb923c" rx="4"/>
      <text x="430" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1~3</text>
      <rect x="500" y="60" width="90" height="30" fill="#f87171" rx="4"/>
      <text x="545" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">3.5~7</text>
      <rect x="590" y="60" width="70" height="30" fill="#dc2626" rx="4"/>
      <text x="625" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥7</text>

      <text x="90" y="110" fill="#71717a" font-size="9" text-anchor="middle">극단 저평가</text>
      <text x="190" y="110" fill="#71717a" font-size="9" text-anchor="middle">역사적 저평가</text>
      <text x="300" y="110" fill="#71717a" font-size="9" text-anchor="middle">약간 저평가</text>
      <text x="430" y="110" fill="#71717a" font-size="9" text-anchor="middle">적정~고평가</text>
      <text x="545" y="110" fill="#71717a" font-size="9" text-anchor="middle">과열</text>
      <text x="625" y="110" fill="#71717a" font-size="9" text-anchor="middle">극단 과열</text>

      <circle cx="140" cy="45" r="4" fill="#fff"/>
      <text x="140" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2015 (-0.8)</text>
      <circle cx="220" cy="45" r="4" fill="#fff"/>
      <text x="220" y="145" fill="#facc15" font-size="10" font-weight="700" text-anchor="middle">2018 (-0.2)</text>
      <circle cx="260" cy="45" r="4" fill="#fff"/>
      <text x="260" y="35" fill="#fbbf24" font-size="10" font-weight="700" text-anchor="middle">2022 (0.1)</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">MVRV Z-Score Zone Gauge</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="100" height="30" fill="#22c55e" rx="4"/>
      <text x="90" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ -1</text>
      <rect x="140" y="60" width="100" height="30" fill="#4ade80" rx="4"/>
      <text x="190" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">-1~0</text>
      <rect x="240" y="60" width="120" height="30" fill="#fbbf24" rx="4"/>
      <text x="300" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0~1</text>
      <rect x="360" y="60" width="140" height="30" fill="#fb923c" rx="4"/>
      <text x="430" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1~3</text>
      <rect x="500" y="60" width="90" height="30" fill="#f87171" rx="4"/>
      <text x="545" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">3.5~7</text>
      <rect x="590" y="60" width="70" height="30" fill="#dc2626" rx="4"/>
      <text x="625" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥7</text>

      <text x="90" y="110" fill="#71717a" font-size="9" text-anchor="middle">Extreme low</text>
      <text x="190" y="110" fill="#71717a" font-size="9" text-anchor="middle">Undervalued</text>
      <text x="300" y="110" fill="#71717a" font-size="9" text-anchor="middle">Slightly low</text>
      <text x="430" y="110" fill="#71717a" font-size="9" text-anchor="middle">Fair~high</text>
      <text x="545" y="110" fill="#71717a" font-size="9" text-anchor="middle">Overheated</text>
      <text x="625" y="110" fill="#71717a" font-size="9" text-anchor="middle">Extreme high</text>

      <circle cx="140" cy="45" r="4" fill="#fff"/>
      <text x="140" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2015 (-0.8)</text>
      <circle cx="220" cy="45" r="4" fill="#fff"/>
      <text x="220" y="145" fill="#facc15" font-size="10" font-weight="700" text-anchor="middle">2018 (-0.2)</text>
      <circle cx="260" cy="45" r="4" fill="#fff"/>
      <text x="260" y="35" fill="#fbbf24" font-size="10" font-weight="700" text-anchor="middle">2022 (0.1)</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 200" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">MVRV Zスコア 区間ゲージ</text>
    <g font-family="sans-serif">
      <rect x="40" y="60" width="100" height="30" fill="#22c55e" rx="4"/>
      <text x="90" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">≤ -1</text>
      <rect x="140" y="60" width="100" height="30" fill="#4ade80" rx="4"/>
      <text x="190" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">-1~0</text>
      <rect x="240" y="60" width="120" height="30" fill="#fbbf24" rx="4"/>
      <text x="300" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">0~1</text>
      <rect x="360" y="60" width="140" height="30" fill="#fb923c" rx="4"/>
      <text x="430" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">1~3</text>
      <rect x="500" y="60" width="90" height="30" fill="#f87171" rx="4"/>
      <text x="545" y="80" fill="#000" font-size="11" font-weight="700" text-anchor="middle">3.5~7</text>
      <rect x="590" y="60" width="70" height="30" fill="#dc2626" rx="4"/>
      <text x="625" y="80" fill="#fff" font-size="11" font-weight="700" text-anchor="middle">≥7</text>

      <text x="90" y="110" fill="#71717a" font-size="9" text-anchor="middle">極端割安</text>
      <text x="190" y="110" fill="#71717a" font-size="9" text-anchor="middle">歴史的割安</text>
      <text x="300" y="110" fill="#71717a" font-size="9" text-anchor="middle">やや割安</text>
      <text x="430" y="110" fill="#71717a" font-size="9" text-anchor="middle">適正~割高</text>
      <text x="545" y="110" fill="#71717a" font-size="9" text-anchor="middle">過熱</text>
      <text x="625" y="110" fill="#71717a" font-size="9" text-anchor="middle">極端過熱</text>

      <circle cx="140" cy="45" r="4" fill="#fff"/>
      <text x="140" y="35" fill="#4ade80" font-size="10" font-weight="700" text-anchor="middle">2015 (-0.8)</text>
      <circle cx="220" cy="45" r="4" fill="#fff"/>
      <text x="220" y="145" fill="#facc15" font-size="10" font-weight="700" text-anchor="middle">2018 (-0.2)</text>
      <circle cx="260" cy="45" r="4" fill="#fff"/>
      <text x="260" y="35" fill="#fbbf24" font-size="10" font-weight="700" text-anchor="middle">2022 (0.1)</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">MVRV Z-Score란 무엇인가?</h2>
  <h2 class="en">What Is MVRV Z-Score?</h2>
  <h2 class="ja">MVRV Zスコアとは何か?</h2>

  <h3 class="ko">시장가치(Market Value)</h3>
  <h3 class="en">Market Value (MV)</h3>
  <h3 class="ja">時価総額 (Market Value)</h3>
  <h3 class="es">Valor de Mercado (MV)</h3>
  <h3 class="de">Marktwert (MV)</h3>
  <p class="ko">우리가 흔히 아는 시가총액입니다. 현재 비트코인 가격 × 유통 공급량으로 계산하며, 공포와 탐욕에 따라 크게 흔들립니다.</p>
  <p class="en">The familiar market cap: current price × circulating supply. It swings wildly with fear and greed.</p>
  <p class="ja">おなじみの時価総額です。現在のビットコイン価格 × 流通供給量で計算され、恐怖と強欲によって大きく揺れ動きます。</p>
  <p class="es">La conocida capitalización de mercado: precio actual × suministro circulante. Oscila bruscamente con el miedo y la codicia.</p>
  <p class="de">Die bekannte Marktkapitalisierung: aktueller Preis × zirkulierendes Angebot. Sie schwankt stark mit Angst und Gier.</p>

  <h3 class="ko">실현가치(Realized Value)</h3>
  <h3 class="en">Realized Value (RV)</h3>
  <h3 class="ja">実現時価総額 (Realized Value)</h3>
  <h3 class="es">Valor Realizado (RV)</h3>
  <h3 class="de">Realized Value (RV)</h3>
  <p class="ko">각 비트코인이 마지막으로 온체인에서 이동했을 때의 가격으로 평가한 총 가치입니다. 모든 BTC 보유자들의 평균 취득 원가에 가깝고, 시장가치보다 훨씬 안정적입니다.</p>
  <p class="en">Total value of all Bitcoin priced at the moment each coin last moved on-chain — essentially the aggregate cost basis of all holders. Far more stable than market value.</p>
  <p class="ja">各ビットコインが最後にオンチェーンで移動した時点の価格で評価した総価値です。全BTC保有者の平均取得原価に近く、時価総額よりもはるかに安定しています。</p>
  <p class="es">Valor total de todo el Bitcoin valorado al precio del momento en que cada moneda se movió por última vez on-chain — esencialmente la base de costo agregada de todos los tenedores. Mucho más estable que el valor de mercado.</p>
  <p class="de">Gesamtwert aller Bitcoin, bewertet zum Preis des Zeitpunkts, an dem jede Münze zuletzt on-chain bewegt wurde — im Wesentlichen die aggregierte Kostenbasis aller Halter. Weitaus stabiler als der Marktwert.</p>

  <h3 class="ko">Z-Score (표준편차 정규화)</h3>
  <h3 class="en">Z-Score (Standard Deviation Normalization)</h3>
  <h3 class="ja">Zスコア (標準偏差による正規化)</h3>
  <h3 class="es">Z-Score (Normalización por Desviación Estándar)</h3>
  <h3 class="de">Z-Score (Standardabweichungs-Normalisierung)</h3>
  <p class="ko">(시장가치 - 실현가치)를 표준편차로 나눈 값으로, 역사적으로 얼마나 극단적인 수준인지를 숫자 하나로 보여줍니다.</p>
  <p class="en">(Market Value − Realized Value) ÷ standard deviation of Market Value — a single number showing how historically extreme current valuations are.</p>
  <p class="ja">(時価総額 − 実現時価総額)を標準偏差で割った値で、歴史的に見てどれだけ極端な水準かを一つの数字で示します。</p>
  <p class="es">(Valor de Mercado − Valor Realizado) ÷ desviación estándar del Valor de Mercado — un solo número que muestra qué tan extremas son las valoraciones actuales históricamente.</p>
  <p class="de">(Marktwert − Realized Value) ÷ Standardabweichung des Marktwerts — eine einzige Zahl, die zeigt, wie extrem die aktuellen Bewertungen historisch gesehen sind.</p>

  <div class="box ko"><strong>계산 공식:</strong> MVRV Z-Score = (시장가치 − 실현가치) ÷ 표준편차(시장가치)</div>
  <div class="box en"><strong>Formula:</strong> MVRV Z-Score = (Market Value − Realized Value) ÷ StdDev(Market Value)</div>
  <div class="box ja"><strong>計算式:</strong> MVRV Zスコア = (時価総額 − 実現時価総額) ÷ 標準偏差(時価総額)</div>
  <div class="box es"><strong>Fórmula:</strong> MVRV Z-Score = (Valor de Mercado − Valor Realizado) ÷ DesvEst(Valor de Mercado)</div>
  <div class="box de"><strong>Formel:</strong> MVRV Z-Score = (Marktwert − Realized Value) ÷ StdAbw(Marktwert)</div>

  <h2 class="ko">구간별 해석</h2>
  <h2 class="en">Zone Interpretation</h2>
  <h2 class="ja">区間別の解釈</h2>
  <h2 class="es">Interpretación por Zona</h2>
  <h2 class="de">Zonen-Interpretation</h2>
  <table class="zt ko">
    <tr><th>Z-Score</th><th>시장 상태</th><th>투자 판단</th></tr>
    <tr><td class="g">−1 이하</td><td>극단적 저평가</td><td class="g">강력 매수</td></tr>
    <tr><td class="g">0 이하</td><td>역사적 저평가</td><td class="g">매수 구간</td></tr>
    <tr><td class="y">0 ~ 1</td><td>약간 저평가</td><td class="y">축적 구간</td></tr>
    <tr><td class="y">1 ~ 3</td><td>적정 ~ 고평가</td><td class="y">중립 / 주의</td></tr>
    <tr><td class="r">3.5 이상</td><td>과열 구간</td><td class="r">매도 고려</td></tr>
    <tr><td class="r">7 이상</td><td>극단적 과열</td><td class="r">강력 매도</td></tr>
  </table>
  <table class="zt en">
    <tr><th>Z-Score</th><th>Market State</th><th>Signal</th></tr>
    <tr><td class="g">Below −1</td><td>Extreme undervaluation</td><td class="g">Strong Buy</td></tr>
    <tr><td class="g">Below 0</td><td>Historical undervaluation</td><td class="g">Buy Zone</td></tr>
    <tr><td class="y">0 – 1</td><td>Slightly undervalued</td><td class="y">Accumulate</td></tr>
    <tr><td class="y">1 – 3</td><td>Fair to overvalued</td><td class="y">Neutral / Caution</td></tr>
    <tr><td class="r">Above 3.5</td><td>Overheated</td><td class="r">Consider Selling</td></tr>
    <tr><td class="r">Above 7</td><td>Extreme overheating</td><td class="r">Strong Sell</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>Zスコア</th><th>市場状態</th><th>投資判断</th></tr>
    <tr><td class="g">−1以下</td><td>極端な割安</td><td class="g">強力買い</td></tr>
    <tr><td class="g">0以下</td><td>歴史的割安</td><td class="g">買いゾーン</td></tr>
    <tr><td class="y">0〜1</td><td>やや割安</td><td class="y">蓄積ゾーン</td></tr>
    <tr><td class="y">1〜3</td><td>適正〜割高</td><td class="y">中立/注意</td></tr>
    <tr><td class="r">3.5以上</td><td>過熱ゾーン</td><td class="r">売却検討</td></tr>
    <tr><td class="r">7以上</td><td>極端な過熱</td><td class="r">強力売り</td></tr>
  </table>
  <table class="zt es">
    <tr><th>Z-Score</th><th>Estado del Mercado</th><th>Señal</th></tr>
    <tr><td class="g">Bajo −1</td><td>Infravaloración extrema</td><td class="g">Compra Fuerte</td></tr>
    <tr><td class="g">Bajo 0</td><td>Infravaloración histórica</td><td class="g">Zona de Compra</td></tr>
    <tr><td class="y">0 – 1</td><td>Ligeramente infravalorado</td><td class="y">Acumular</td></tr>
    <tr><td class="y">1 – 3</td><td>Justo a sobrevalorado</td><td class="y">Neutral / Precaución</td></tr>
    <tr><td class="r">Sobre 3.5</td><td>Sobrecalentado</td><td class="r">Considerar Venta</td></tr>
    <tr><td class="r">Sobre 7</td><td>Sobrecalentamiento extremo</td><td class="r">Venta Fuerte</td></tr>
  </table>
  <table class="zt de">
    <tr><th>Z-Score</th><th>Marktzustand</th><th>Signal</th></tr>
    <tr><td class="g">Unter −1</td><td>Extreme Unterbewertung</td><td class="g">Starker Kauf</td></tr>
    <tr><td class="g">Unter 0</td><td>Historische Unterbewertung</td><td class="g">Kaufzone</td></tr>
    <tr><td class="y">0 – 1</td><td>Leicht unterbewertet</td><td class="y">Akkumulieren</td></tr>
    <tr><td class="y">1 – 3</td><td>Fair bis überbewertet</td><td class="y">Neutral / Vorsicht</td></tr>
    <tr><td class="r">Über 3,5</td><td>Überhitzt</td><td class="r">Verkauf erwägen</td></tr>
    <tr><td class="r">Über 7</td><td>Extreme Überhitzung</td><td class="r">Starker Verkauf</td></tr>
  </table>

  <h2 class="ko">역사적 저점 포착 사례</h2>
  <h2 class="en">Historical Bottom Cases</h2>
  <h2 class="ja">歴史的な底値捕捉事例</h2>
  <h2 class="es">Casos Históricos de Suelo</h2>
  <h2 class="de">Historische Tiefpunkt-Fälle</h2>

  <h3>2015 (Z-Score: −0.8)</h3>
  <p class="ko">비트코인이 $150 근처까지 하락했던 2015년 1월, MVRV Z-Score는 −0.8까지 내려갔습니다. 이후 2017년 $20,000까지 약 130배 상승했습니다.</p>
  <p class="en">In January 2015 with Bitcoin near $150, MVRV Z-Score hit −0.8. Bitcoin subsequently rose ~130x to $20,000 by 2017.</p>
  <p class="ja">ビットコインが$150付近まで下落した2015年1月、MVRV Zスコアは−0.8まで低下しました。その後2017年には$20,000まで約130倍上昇しました。</p>
  <p class="es">En enero de 2015, con Bitcoin cerca de $150, el MVRV Z-Score llegó a −0.8. Bitcoin posteriormente subió ~130x hasta $20,000 en 2017.</p>
  <p class="de">Im Januar 2015, als Bitcoin bei etwa $150 lag, erreichte der MVRV Z-Score −0,8. Bitcoin stieg danach bis 2017 um das ~130-fache auf $20.000.</p>

  <h3>2018–2019 (Z-Score: −0.2)</h3>
  <p class="ko">2018년 12월 $3,200 바닥에서 −0.2를 기록했습니다. 이 구간에서 매수한 투자자들은 2021년 고점까지 약 20배 수익을 올렸습니다.</p>
  <p class="en">At the $3,200 bottom in December 2018, the score hit −0.2. Buyers at this level saw ~20x gains by the 2021 peak.</p>
  <p class="ja">2018年12月、$3,200の底値で−0.2を記録しました。この水準で買った投資家は、2021年の天井までに約20倍の利益を得ました。</p>
  <p class="es">En el suelo de $3,200 en diciembre de 2018, la puntuación llegó a −0.2. Los compradores en este nivel vieron ganancias de ~20x hasta el pico de 2021.</p>
  <p class="de">Am Tief von $3.200 im Dezember 2018 erreichte der Score −0,2. Käufer auf diesem Niveau sahen bis zum Höchststand 2021 Gewinne von ~20x.</p>

  <h3>2022 FTX (Z-Score: 0.1)</h3>
  <p class="ko">FTX 붕괴로 비트코인이 $15,500까지 폭락했던 2022년 11월, MVRV Z-Score는 0.1로 역사적 저점 구간에 근접했습니다.</p>
  <p class="en">During the FTX collapse in November 2022 with Bitcoin at $15,500, the score was 0.1 — near the historical bottom zone.</p>
  <p class="ja">FTX破綻でビットコインが$15,500まで暴落した2022年11月、MVRV Zスコアは0.1と歴史的な底値圏に近づきました。</p>
  <p class="es">Durante el colapso de FTX en noviembre de 2022, con Bitcoin en $15,500, la puntuación fue 0.1 — cerca de la zona de suelo histórico.</p>
  <p class="de">Während des FTX-Zusammenbruchs im November 2022, als Bitcoin bei $15.500 lag, betrug der Score 0,1 — nahe der historischen Tiefzone.</p>

  <h2 class="ko">한계점</h2>
  <h2 class="en">Limitations</h2>
  <h2 class="ja">限界点</h2>
  <ul class="ko">
    <li><strong>선행 지표가 아님:</strong> 언제 반등할지는 알려주지 않습니다. 저평가 구간에서도 수개월 더 하락할 수 있습니다.</li>
    <li><strong>NUPL과 상관관계 높음:</strong> 두 지표 모두 실현가치 기반이라 같은 방향으로 움직이는 경향이 있습니다.</li>
    <li><strong>단독 사용 금지:</strong> 반드시 다른 지표와 함께 종합적으로 판단해야 합니다.</li>
  </ul>
  <ul class="en">
    <li><strong>Not a leading indicator:</strong> Doesn't tell you when the rebound starts. Prices can fall for months more even in the undervaluation zone.</li>
    <li><strong>High correlation with NUPL:</strong> Both are realized-value based and tend to move together.</li>
    <li><strong>Never use alone:</strong> Always combine with other indicators for a complete picture.</li>
  </ul>
  <ul class="ja">
    <li><strong>先行指標ではない:</strong> いつ反発するかは示しません。割安圏でも数ヶ月さらに下落する可能性があります。</li>
    <li><strong>NUPLとの相関が高い:</strong> どちらも実現時価総額ベースのため、同じ方向に動く傾向があります。</li>
    <li><strong>単独使用は禁物:</strong> 必ず他の指標と組み合わせて総合的に判断する必要があります。</li>
  </ul>
  <ul class="es">
    <li><strong>No es un indicador líder:</strong> No indica cuándo comenzará el rebote. Los precios pueden caer meses más incluso en la zona de infravaloración.</li>
    <li><strong>Alta correlación con NUPL:</strong> Ambos se basan en el valor realizado y tienden a moverse juntos.</li>
    <li><strong>Nunca usar solo:</strong> Combinar siempre con otros indicadores para una imagen completa.</li>
  </ul>
  <ul class="de">
    <li><strong>Kein Vorlaufindikator:</strong> Zeigt nicht an, wann die Erholung beginnt. Preise können selbst in der Unterbewertungszone noch monatelang fallen.</li>
    <li><strong>Hohe Korrelation mit NUPL:</strong> Beide basieren auf dem Realized Value und bewegen sich tendenziell gemeinsam.</li>
    <li><strong>Niemals allein verwenden:</strong> Immer mit anderen Indikatoren kombinieren für ein vollständiges Bild.</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best Combined With</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor Combinado Con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <ul class="ko">
    <li><strong><a href="/blog/hash-ribbon-indicator.html">Hash Ribbon 회복 전환</a>:</strong> 가장 강력한 매수 선행 신호</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR 0.95 이하</a>:</strong> 단기 보유자들의 패닉 손절</li>
    <li><strong><a href="/blog/coinbase-premium.html">Coinbase Premium 양전환</a>:</strong> 미국 기관투자자 재진입 신호</li>
    <li><strong><a href="/blog/funding-rate-futures-gap.html">선물-현물 갭 음수</a>:</strong> 레버리지 롱 청산 완료</li>
  </ul>
  <ul class="en">
    <li><strong><a href="/blog/hash-ribbon-indicator.html">Hash Ribbon recovery cross</a>:</strong> The strongest leading buy signal</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR below 0.95</a>:</strong> Short-term holders panic selling</li>
    <li><strong><a href="/blog/coinbase-premium.html">Coinbase Premium turns positive</a>:</strong> US institutional re-entry signal</li>
    <li><strong><a href="/blog/funding-rate-futures-gap.html">Futures-Spot gap negative</a>:</strong> Leveraged longs flushed out</li>
  </ul>
  <ul class="ja">
    <li><strong><a href="/blog/hash-ribbon-indicator.html">Hash Ribbon 回復転換</a>:</strong> 最も強力な先行買いシグナル</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR 0.95以下</a>:</strong> 短期保有者のパニック損切り</li>
    <li><strong><a href="/blog/coinbase-premium.html">Coinbaseプレミアムのプラス転換</a>:</strong> 米国機関投資家の再参入シグナル</li>
    <li><strong><a href="/blog/funding-rate-futures-gap.html">先物-現物ギャップのマイナス化</a>:</strong> レバレッジロングの清算完了</li>
  </ul>
  <ul class="es">
    <li><strong><a href="/blog/hash-ribbon-indicator.html">Cruce de Recuperación de Hash Ribbon</a>:</strong> La señal de compra líder más fuerte</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR por debajo de 0.95</a>:</strong> Venta de pánico de tenedores a corto plazo</li>
    <li><strong><a href="/blog/coinbase-premium.html">Coinbase Premium se vuelve positivo</a>:</strong> Señal de reingreso institucional de EE.UU.</li>
    <li><strong><a href="/blog/funding-rate-futures-gap.html">Brecha Futuros-Spot negativa</a>:</strong> Largos apalancados liquidados</li>
  </ul>
  <ul class="de">
    <li><strong><a href="/blog/hash-ribbon-indicator.html">Hash-Ribbon-Erholungscross</a>:</strong> Das stärkste vorlaufende Kaufsignal</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR unter 0,95</a>:</strong> Panikverkäufe kurzfristiger Halter</li>
    <li><strong><a href="/blog/coinbase-premium.html">Coinbase Premium wird positiv</a>:</strong> Signal für US-institutionellen Wiedereinstieg</li>
    <li><strong><a href="/blog/funding-rate-futures-gap.html">Futures-Spot-Spread negativ</a>:</strong> Gehebelte Longs ausgespült</li>
  </ul>

<?php require __DIR__.'/_footer.php'; ?>
