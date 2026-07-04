<?php $slug = 'ath-drawdown'; require __DIR__.'/_header.php'; ?>

  <p class="ko">가장 복잡한 온체인 계산 없이도, 딱 하나의 질문으로 지금이 역사적 저점 구간에 가까운지 판단할 수 있습니다. <strong>"역대 최고가(ATH) 대비 얼마나 떨어졌는가?"</strong> 이것이 바로 <strong>ATH 대비 하락률(Drawdown)</strong> 지표입니다.</p>
  <p class="en">Without any complex on-chain math, one simple question can tell you how close price is to a historical bottom zone: <strong>"How far has it fallen from its all-time high (ATH)?"</strong> That's exactly what the <strong>ATH Drawdown</strong> indicator measures.</p>
  <p class="ja">複雑なオンチェーン計算をしなくても、たった一つの問いで今が歴史的な底値圏に近いかどうか判断できます。<strong>「史上最高値(ATH)からどれだけ下落したか?」</strong> これがまさに<strong>ATH下落率(Drawdown)</strong>指標です。</p>

  <p class="es">Sin cálculos on-chain complejos, una simple pregunta puede indicar qué tan cerca está el precio de una zona de suelo histórica: <strong>"¿Cuánto ha caído desde su máximo histórico (ATH)?"</strong> Eso es exactamente lo que mide el indicador de <strong>Drawdown desde el ATH</strong>.</p>
  <p class="de">Ohne komplexe On-Chain-Berechnungen kann eine einfache Frage zeigen, wie nahe der Preis einer historischen Tiefzone ist: <strong>"Wie weit ist er von seinem Allzeithoch (ATH) gefallen?"</strong> Genau das misst der <strong>ATH-Drawdown</strong>-Indikator.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 비트코인의 지난 4번의 주요 사이클 저점은 모두 ATH 대비 -70%에서 -85% 사이에서 형성됐습니다. 이 구간에 진입하면 다른 지표들과 교차 확인할 가치가 충분합니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Bitcoin's last 4 major cycle bottoms all formed between -70% and -85% below the all-time high. Entering this range is worth cross-checking against other indicators.</div>
  <div class="box ja">💡 <strong>要点:</strong> ビットコインの過去4回の主要サイクル底値は、すべてATHから-70%〜-85%の間で形成されました。この水準に達したら、他の指標との照合が十分に価値があります。</div>
  <div class="box es">💡 <strong>Resumen clave:</strong> Los últimos 4 suelos de ciclo principales de Bitcoin se formaron todos entre -70% y -85% por debajo del máximo histórico. Al entrar en este rango vale la pena verificar cruzadamente con otros indicadores.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Bitcoins letzte 4 große Zyklustiefs bildeten sich alle zwischen -70% und -85% unter dem Allzeithoch. Bei Erreichen dieses Bereichs lohnt sich der Abgleich mit anderen Indikatoren.</div>

  <h2 class="ko">사이클별 하락률을 시각화하면</h2>
  <h2 class="en">Drawdown by cycle, visualized</h2>
  <h2 class="ja">サイクル別下落率を可視化すると</h2>
  <h2 class="es">Drawdown por Ciclo, Visualizado</h2>
  <h2 class="de">Drawdown nach Zyklus, visualisiert</h2>

  <div class="ko">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">사이클별 ATH 대비 하락률 — 완만해지는 추세</text>
    <line x1="60" y1="180" x2="660" y2="180" stroke="#3f3f46"/>
    <g font-family="sans-serif">
      <rect x="90" y="45" width="80" height="135" fill="#f87171" rx="4"/>
      <text x="130" y="37" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">-87%</text>
      <text x="130" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2015</text>

      <rect x="240" y="55" width="80" height="125" fill="#fb923c" rx="4"/>
      <text x="280" y="47" fill="#fb923c" font-size="13" font-weight="700" text-anchor="middle">-84%</text>
      <text x="280" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2018</text>

      <rect x="390" y="75" width="80" height="105" fill="#fbbf24" rx="4"/>
      <text x="430" y="67" fill="#fbbf24" font-size="13" font-weight="700" text-anchor="middle">-77%</text>
      <text x="430" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2022</text>

      <text x="540" y="120" fill="#4ade80" font-size="11" text-anchor="middle">시가총액 성장 →</text>
      <text x="540" y="140" fill="#4ade80" font-size="11" text-anchor="middle">낙폭 완화 추세</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">ATH Drawdown by Cycle — Gradually Moderating</text>
    <line x1="60" y1="180" x2="660" y2="180" stroke="#3f3f46"/>
    <g font-family="sans-serif">
      <rect x="90" y="45" width="80" height="135" fill="#f87171" rx="4"/>
      <text x="130" y="37" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">-87%</text>
      <text x="130" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2015</text>

      <rect x="240" y="55" width="80" height="125" fill="#fb923c" rx="4"/>
      <text x="280" y="47" fill="#fb923c" font-size="13" font-weight="700" text-anchor="middle">-84%</text>
      <text x="280" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2018</text>

      <rect x="390" y="75" width="80" height="105" fill="#fbbf24" rx="4"/>
      <text x="430" y="67" fill="#fbbf24" font-size="13" font-weight="700" text-anchor="middle">-77%</text>
      <text x="430" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2022</text>

      <text x="540" y="120" fill="#4ade80" font-size="11" text-anchor="middle">Market cap grows →</text>
      <text x="540" y="140" fill="#4ade80" font-size="11" text-anchor="middle">drawdowns moderate</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">サイクル別ATH下落率 — 緩やかになる傾向</text>
    <line x1="60" y1="180" x2="660" y2="180" stroke="#3f3f46"/>
    <g font-family="sans-serif">
      <rect x="90" y="45" width="80" height="135" fill="#f87171" rx="4"/>
      <text x="130" y="37" fill="#f87171" font-size="13" font-weight="700" text-anchor="middle">-87%</text>
      <text x="130" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2015</text>

      <rect x="240" y="55" width="80" height="125" fill="#fb923c" rx="4"/>
      <text x="280" y="47" fill="#fb923c" font-size="13" font-weight="700" text-anchor="middle">-84%</text>
      <text x="280" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2018</text>

      <rect x="390" y="75" width="80" height="105" fill="#fbbf24" rx="4"/>
      <text x="430" y="67" fill="#fbbf24" font-size="13" font-weight="700" text-anchor="middle">-77%</text>
      <text x="430" y="198" fill="#a1a1aa" font-size="10" text-anchor="middle">2022</text>

      <text x="540" y="120" fill="#4ade80" font-size="11" text-anchor="middle">時価総額の成長 →</text>
      <text x="540" y="140" fill="#4ade80" font-size="11" text-anchor="middle">下落幅が緩和傾向</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">역사적 사례</h2>
  <h2 class="en">Historical Cases</h2>
  <h2 class="ja">歴史的事例</h2>
  <div class="rc">
    <div class="rd">2015.01</div>
    <div class="rt ko">2013년 고점 $1,150 대비 -87%인 $150까지 하락.</div>
    <div class="rt en">Fell -87% from the 2013 top of $1,150 to $150.</div>
    <div class="rt ja">2013年の天井$1,150から-87%の$150まで下落。</div>
    <div class="rt es">Cayó -87% desde el techo de 2013 de $1,150 hasta $150.</div>
    <div class="rt de">Fiel um -87% vom Hoch 2013 bei $1.150 auf $150.</div>
    <div class="rr ko">→ 이후 2017년 $20,000까지 약 130배 상승</div>
    <div class="rr en">→ Rose ~130x to $20,000 by 2017</div>
    <div class="rr ja">→ その後2017年に$20,000まで約130倍上昇</div>
    <div class="rr es">→ Subió ~130x hasta $20,000 en 2017</div>
    <div class="rr de">→ Stieg bis 2017 um das ~130-fache auf $20.000</div>
  </div>
  <div class="rc">
    <div class="rd">2018.12</div>
    <div class="rt ko">2017년 고점 $19,800 대비 -84%인 $3,200까지 하락.</div>
    <div class="rt en">Fell -84% from the 2017 top of $19,800 to $3,200.</div>
    <div class="rt ja">2017年の天井$19,800から-84%の$3,200まで下落。</div>
    <div class="rt es">Cayó -84% desde el techo de 2017 de $19,800 hasta $3,200.</div>
    <div class="rt de">Fiel um -84% vom Hoch 2017 bei $19.800 auf $3.200.</div>
    <div class="rr ko">→ 이후 2021년 $69,000까지 약 20배 상승</div>
    <div class="rr en">→ Rose ~20x to $69,000 by 2021</div>
    <div class="rr ja">→ その後2021年に$69,000まで約20倍上昇</div>
    <div class="rr es">→ Subió ~20x hasta $69,000 en 2021</div>
    <div class="rr de">→ Stieg bis 2021 um das ~20-fache auf $69.000</div>
  </div>
  <div class="rc">
    <div class="rd">2022.11</div>
    <div class="rt ko">2021년 고점 $69,000 대비 -77%인 $15,500까지 하락.</div>
    <div class="rt en">Fell -77% from the 2021 top of $69,000 to $15,500.</div>
    <div class="rt ja">2021年の天井$69,000から-77%の$15,500まで下落。</div>
    <div class="rt es">Cayó -77% desde el techo de 2021 de $69,000 hasta $15,500.</div>
    <div class="rt de">Fiel um -77% vom Hoch 2021 bei $69.000 auf $15.500.</div>
    <div class="rr ko">→ 이후 2025년 $126,000까지 약 8배 상승</div>
    <div class="rr en">→ Rose ~8x to $126,000 by 2025</div>
    <div class="rr ja">→ その後2025年に$126,000まで約8倍上昇</div>
    <div class="rr es">→ Subió ~8x hasta $126,000 en 2025</div>
    <div class="rr de">→ Stieg bis 2025 um das ~8-fache auf $126.000</div>
  </div>

  <h2 class="ko">사이클이 성숙하며 나타나는 변화</h2>
  <h2 class="en">The Shift as the Market Matures</h2>
  <h2 class="ja">サイクルが成熟するにつれ現れる変化</h2>
  <h2 class="es">El Cambio a Medida que el Mercado Madura</h2>
  <h2 class="de">Der Wandel mit zunehmender Marktreife</h2>
  <p class="ko">주목할 점은 시가총액이 커질수록 낙폭이 점진적으로 줄어드는 추세가 관찰된다는 것입니다. 2015년 -87%에서 2022년 -77%까지, 매 사이클마다 조금씩 낙폭이 완화되고 있습니다. 시장이 성숙하면서 유동성과 기관 참여가 늘어난 결과로 해석됩니다.</p>
  <p class="en">Notably, drawdown magnitude has gradually shrunk as market cap has grown. From -87% in 2015 to -77% in 2022, each cycle's drawdown has moderated slightly — likely a result of growing liquidity and institutional participation as the market matures.</p>
  <p class="ja">注目すべきは、時価総額が大きくなるにつれて下落幅が徐々に縮小する傾向が観察されることです。2015年の-87%から2022年の-77%まで、サイクルごとに下落幅が少しずつ緩和されています。市場が成熟し、流動性と機関投資家の参加が増えた結果と解釈されます。</p>
  <p class="es">Notablemente, la magnitud del drawdown se ha reducido gradualmente a medida que ha crecido la capitalización de mercado. De -87% en 2015 a -77% en 2022, el drawdown de cada ciclo se ha moderado ligeramente — probablemente resultado de la creciente liquidez y participación institucional a medida que el mercado madura.</p>
  <p class="de">Bemerkenswerterweise hat sich das Ausmaß des Drawdowns mit wachsender Marktkapitalisierung allmählich verringert. Von -87% im Jahr 2015 auf -77% im Jahr 2022 hat sich der Drawdown jedes Zyklus leicht abgeschwächt — wahrscheinlich ein Ergebnis wachsender Liquidität und institutioneller Beteiligung mit zunehmender Marktreife.</p>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important Caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <h2 class="es">Advertencias Importantes</h2>
  <h2 class="de">Wichtige Einschränkungen</h2>
  <ul class="ko">
    <li><strong>과거 낙폭이 미래를 보장하지 않음.</strong> 다음 사이클이 반드시 -70~-85% 구간에서 멈춘다는 보장은 없습니다.</li>
    <li><strong>단독 신호로는 부족.</strong> 단순히 "많이 떨어졌다"는 것만으로 매수 근거가 되긴 어려우며, 다른 온체인·심리 지표와 함께 봐야 합니다.</li>
  </ul>
  <ul class="en">
    <li><strong>Past drawdowns don't guarantee the future.</strong> There's no guarantee the next cycle will bottom within the -70% to -85% range.</li>
    <li><strong>Not sufficient alone.</strong> "It's fallen a lot" isn't enough of a buy thesis by itself — it should be combined with other on-chain and sentiment indicators.</li>
  </ul>
  <ul class="ja">
    <li><strong>過去の下落幅が未来を保証しない。</strong> 次のサイクルが必ず-70%〜-85%の範囲で止まる保証はありません。</li>
    <li><strong>単独のシグナルとしては不十分。</strong> 単に「大きく下落した」だけでは買いの根拠として弱く、他のオンチェーン・心理指標と併せて見る必要があります。</li>
  </ul>
  <ul class="es">
    <li><strong>Los drawdowns pasados no garantizan el futuro.</strong> No hay garantía de que el próximo ciclo forme suelo dentro del rango -70% a -85%.</li>
    <li><strong>No es suficiente por sí solo.</strong> "Ha caído mucho" no es suficiente tesis de compra por sí mismo — debe combinarse con otros indicadores on-chain y de sentimiento.</li>
  </ul>
  <ul class="de">
    <li><strong>Vergangene Drawdowns garantieren nicht die Zukunft.</strong> Es gibt keine Garantie, dass der nächste Zyklus im Bereich -70% bis -85% einen Boden bildet.</li>
    <li><strong>Allein nicht ausreichend.</strong> "Es ist stark gefallen" ist allein keine ausreichende Kaufthese — sollte mit anderen On-Chain- und Stimmungsindikatoren kombiniert werden.</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best Combined With</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor Combinado Con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <ul class="ko">
    <li><strong><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>:</strong> 단순 낙폭이 아니라 온체인 밸류에이션까지 저평가인지 확인</li>
    <li><strong><a href="/blog/bitcoin-halving-timing.html">반감기 사이클</a>:</strong> 현재 사이클 위치와 함께 판단</li>
  </ul>
  <ul class="en">
    <li><strong><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>:</strong> Confirm on-chain valuation is undervalued, not just price drawdown</li>
    <li><strong><a href="/blog/bitcoin-halving-timing.html">Halving Cycle</a>:</strong> Read alongside current cycle position</li>
  </ul>
  <ul class="ja">
    <li><strong><a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>:</strong> 単純な下落幅だけでなく、オンチェーン評価も割安かを確認</li>
    <li><strong><a href="/blog/bitcoin-halving-timing.html">半減期サイクル</a>:</strong> 現在のサイクル位置と併せて判断</li>
  </ul>
  <ul class="es">
    <li><strong><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>:</strong> Confirmar que la valoración on-chain está infravalorada, no solo el drawdown de precio</li>
    <li><strong><a href="/blog/bitcoin-halving-timing.html">Ciclo de Halving</a>:</strong> Leer junto con la posición actual del ciclo</li>
  </ul>
  <ul class="de">
    <li><strong><a href="/blog/mvrv-z-score.html">MVRV Z-Score</a>:</strong> Bestätigen, dass die On-Chain-Bewertung unterbewertet ist, nicht nur der Preis-Drawdown</li>
    <li><strong><a href="/blog/bitcoin-halving-timing.html">Halving-Zyklus</a>:</strong> Zusammen mit der aktuellen Zyklusposition lesen</li>
  </ul>

<?php require __DIR__.'/_footer.php'; ?>
