<?php $slug = 'onchain-indicators-guide'; require __DIR__.'/_header.php'; ?>

  <p class="ko">차트의 가격과 거래량만으로는 시장의 절반밖에 못 봅니다. 나머지 절반은 블록체인 위에 기록된 <strong>온체인 데이터</strong> — 누가, 언제, 얼마에 코인을 옮겼는가 — 에 있습니다. 이 글은 비트코인 타이밍 판단에 핵심이 되는 온체인 지표들을 한눈에 정리한 종합 가이드입니다.</p>
  <p class="en">Price and volume alone show only half the market. The other half lives in <strong>on-chain data</strong> recorded on the blockchain — who moved coins, when, and at what price. This is a comprehensive map of the on-chain indicators that matter most for Bitcoin timing.</p>
  <p class="ja">チャートの価格と出来高だけでは市場の半分しか見えません。残りの半分はブロックチェーン上に記録された<strong>オンチェーンデータ</strong> — 誰が、いつ、いくらでコインを動かしたか — にあります。この記事は、ビットコインのタイミング判断に核心となるオンチェーン指標を一覧で整理した総合ガイドです。</p>

  <p class="es">El precio y el volumen solo muestran la mitad del mercado. La otra mitad vive en los <strong>datos on-chain</strong> registrados en la blockchain — quién movió monedas, cuándo y a qué precio. Este es un mapa completo de los indicadores on-chain más importantes para el timing de Bitcoin.</p>
  <p class="de">Preis und Volumen zeigen nur die Hälfte des Marktes. Die andere Hälfte liegt in den <strong>On-Chain-Daten</strong> auf der Blockchain — wer wann zu welchem Preis Coins bewegte. Dies ist eine umfassende Karte der wichtigsten On-Chain-Indikatoren für das Bitcoin-Timing.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 온체인 지표는 크게 ①밸류에이션(MVRV·실현가·NUPL) ②수익성/심리(SOPR) ③보유자 행동(LTH 공급) ④채굴자(해시 리본) ⑤자금 흐름(코인베이스 프리미엄·펀딩비)으로 나뉩니다. 하나의 지표보다 여러 지표를 겹쳐 볼 때 신뢰도가 높아집니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> On-chain indicators group into ① valuation (MVRV, Realized Price, NUPL) ② profitability/sentiment (SOPR) ③ holder behavior (LTH supply) ④ miners (Hash Ribbon) ⑤ capital flow (Coinbase Premium, funding rate). Confidence rises when you stack several indicators rather than trusting one.</div>
  <div class="box ja">💡 <strong>要点:</strong> オンチェーン指標は大きく①バリュエーション(MVRV・実現価格・NUPL)②収益性/心理(SOPR)③保有者行動(LTH供給)④マイナー(ハッシュリボン)⑤資金フロー(コインベースプレミアム・資金調達率)に分かれます。単一指標より複数を重ねて見ると信頼度が高まります。</div>

  <div class="box es">💡 <strong>Resumen clave:</strong> Los indicadores on-chain se agrupan en ① valoración (MVRV, Precio Realizado, NUPL) ② rentabilidad/sentimiento (SOPR) ③ comportamiento de poseedores (suministro LTH) ④ mineros (Hash Ribbon) ⑤ flujo de capital (Coinbase Premium, tasa de financiación). La confianza aumenta al combinar varios en vez de confiar en uno.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> On-Chain-Indikatoren gruppieren sich in ① Bewertung (MVRV, Realized Price, NUPL) ② Rentabilität/Stimmung (SOPR) ③ Halterverhalten (LTH-Angebot) ④ Miner (Hash Ribbon) ⑤ Kapitalfluss (Coinbase Premium, Funding Rate). Das Stapeln mehrerer Indikatoren erhöht die Zuverlässigkeit.</div>

  <h2 class="ko">5가지 지표 그룹 한눈에 보기</h2>
  <h2 class="en">The 5 Indicator Groups at a Glance</h2>
  <h2 class="ja">5つの指標グループを一覧で</h2>
  <h2 class="es">Los 5 Grupos de Indicadores de un Vistazo</h2>
  <h2 class="de">Die 5 Indikatorgruppen auf einen Blick</h2>

  <div class="ko">
  <svg viewBox="0 0 700 240" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">온체인 지표 5대 그룹 → 매수·매도 점수</text>
    <g font-family="sans-serif" font-size="10" font-weight="700">
      <rect x="30" y="50" width="150" height="34" fill="#a78bfa" rx="6"/><text x="105" y="72" fill="#000" text-anchor="middle">밸류에이션</text>
      <rect x="30" y="92" width="150" height="34" fill="#38bdf8" rx="6"/><text x="105" y="114" fill="#000" text-anchor="middle">수익성·심리</text>
      <rect x="30" y="134" width="150" height="34" fill="#60a5fa" rx="6"/><text x="105" y="156" fill="#000" text-anchor="middle">보유자 행동</text>
      <rect x="30" y="176" width="150" height="34" fill="#fbbf24" rx="6"/><text x="105" y="198" fill="#000" text-anchor="middle">채굴자 / 자금흐름</text>
      <path d="M180 67 H320 M180 109 H320 M180 151 H320 M180 193 H320" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="320" y="105" width="180" height="50" fill="#22c55e" rx="8"/><text x="410" y="128" fill="#000" font-size="11" text-anchor="middle">겹쳐 읽기</text><text x="410" y="144" fill="#000" font-size="9" text-anchor="middle">(합의 = 신호)</text>
      <path d="M500 130 H600" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="600" y="108" width="70" height="44" fill="#f7931a" rx="8"/><text x="635" y="127" fill="#000" font-size="11" text-anchor="middle">0~10</text><text x="635" y="143" fill="#000" font-size="9" text-anchor="middle">점수</text>
    </g>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 240" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">5 On-Chain Groups → Buy/Sell Score</text>
    <g font-family="sans-serif" font-size="10" font-weight="700">
      <rect x="30" y="50" width="150" height="34" fill="#a78bfa" rx="6"/><text x="105" y="72" fill="#000" text-anchor="middle">Valuation</text>
      <rect x="30" y="92" width="150" height="34" fill="#38bdf8" rx="6"/><text x="105" y="114" fill="#000" text-anchor="middle">Profit / Sentiment</text>
      <rect x="30" y="134" width="150" height="34" fill="#60a5fa" rx="6"/><text x="105" y="156" fill="#000" text-anchor="middle">Holder Behavior</text>
      <rect x="30" y="176" width="150" height="34" fill="#fbbf24" rx="6"/><text x="105" y="198" fill="#000" text-anchor="middle">Miners / Flow</text>
      <path d="M180 67 H320 M180 109 H320 M180 151 H320 M180 193 H320" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="320" y="105" width="180" height="50" fill="#22c55e" rx="8"/><text x="410" y="128" fill="#000" font-size="11" text-anchor="middle">Stack them</text><text x="410" y="144" fill="#000" font-size="9" text-anchor="middle">(consensus = signal)</text>
      <path d="M500 130 H600" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="600" y="108" width="70" height="44" fill="#f7931a" rx="8"/><text x="635" y="127" fill="#000" font-size="11" text-anchor="middle">0-10</text><text x="635" y="143" fill="#000" font-size="9" text-anchor="middle">Score</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 240" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">5大オンチェーングループ → 売買スコア</text>
    <g font-family="sans-serif" font-size="10" font-weight="700">
      <rect x="30" y="50" width="150" height="34" fill="#a78bfa" rx="6"/><text x="105" y="72" fill="#000" text-anchor="middle">バリュエーション</text>
      <rect x="30" y="92" width="150" height="34" fill="#38bdf8" rx="6"/><text x="105" y="114" fill="#000" text-anchor="middle">収益性・心理</text>
      <rect x="30" y="134" width="150" height="34" fill="#60a5fa" rx="6"/><text x="105" y="156" fill="#000" text-anchor="middle">保有者行動</text>
      <rect x="30" y="176" width="150" height="34" fill="#fbbf24" rx="6"/><text x="105" y="198" fill="#000" text-anchor="middle">マイナー / 資金</text>
      <path d="M180 67 H320 M180 109 H320 M180 151 H320 M180 193 H320" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="320" y="105" width="180" height="50" fill="#22c55e" rx="8"/><text x="410" y="128" fill="#000" font-size="11" text-anchor="middle">重ねて読む</text><text x="410" y="144" fill="#000" font-size="9" text-anchor="middle">(合意 = シグナル)</text>
      <path d="M500 130 H600" stroke="#52525b" stroke-width="1.5" fill="none"/>
      <rect x="600" y="108" width="70" height="44" fill="#f7931a" rx="8"/><text x="635" y="127" fill="#000" font-size="11" text-anchor="middle">0〜10</text><text x="635" y="143" fill="#000" font-size="9" text-anchor="middle">スコア</text>
    </g>
  </svg>
  </div>

  <table class="zt ko">
    <tr><th>그룹</th><th>대표 지표</th><th>무엇을 알려주나</th></tr>
    <tr><td>밸류에이션</td><td>MVRV Z, 실현가, NUPL</td><td>고평가 / 저평가</td></tr>
    <tr><td>수익성·심리</td><td>SOPR, STH-SOPR</td><td>보유자 손익·차익 실현</td></tr>
    <tr><td>보유자 행동</td><td>LTH 공급 비중</td><td>축적 / 분산</td></tr>
    <tr><td>채굴자</td><td>해시 리본</td><td>채굴자 항복·바닥</td></tr>
    <tr><td>자금 흐름</td><td>코인베이스 프리미엄, 펀딩비</td><td>기관 매수세·레버리지 쏠림</td></tr>
  </table>
  <table class="zt en">
    <tr><th>Group</th><th>Key Indicators</th><th>What It Tells You</th></tr>
    <tr><td>Valuation</td><td>MVRV Z, Realized Price, NUPL</td><td>Over / undervaluation</td></tr>
    <tr><td>Profitability / Sentiment</td><td>SOPR, STH-SOPR</td><td>Holder P&L, profit-taking</td></tr>
    <tr><td>Holder Behavior</td><td>LTH supply share</td><td>Accumulation / distribution</td></tr>
    <tr><td>Miners</td><td>Hash Ribbon</td><td>Miner capitulation, bottoms</td></tr>
    <tr><td>Capital Flow</td><td>Coinbase Premium, funding</td><td>Institutional demand, leverage skew</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>グループ</th><th>代表指標</th><th>何が分かるか</th></tr>
    <tr><td>バリュエーション</td><td>MVRV Z、実現価格、NUPL</td><td>割高 / 割安</td></tr>
    <tr><td>収益性・心理</td><td>SOPR、STH-SOPR</td><td>保有者損益・利確</td></tr>
    <tr><td>保有者行動</td><td>LTH供給比率</td><td>蓄積 / 分散</td></tr>
    <tr><td>マイナー</td><td>ハッシュリボン</td><td>マイナー投降・底値</td></tr>
    <tr><td>資金フロー</td><td>コインベースプレミアム、資金調達率</td><td>機関需要・レバレッジ偏り</td></tr>
  </table>
  <table class="zt es">
    <tr><th>Grupo</th><th>Indicadores Clave</th><th>Qué Revela</th></tr>
    <tr><td>Valoración</td><td>MVRV Z, Precio Realizado, NUPL</td><td>Sobre / infravaloración</td></tr>
    <tr><td>Rentabilidad / Sentimiento</td><td>SOPR, STH-SOPR</td><td>P&L de poseedores, toma de ganancias</td></tr>
    <tr><td>Comportamiento</td><td>Cuota de suministro LTH</td><td>Acumulación / distribución</td></tr>
    <tr><td>Mineros</td><td>Hash Ribbon</td><td>Capitulación de mineros, suelos</td></tr>
    <tr><td>Flujo de Capital</td><td>Coinbase Premium, financiación</td><td>Demanda institucional, sesgo de apalancamiento</td></tr>
  </table>
  <table class="zt de">
    <tr><th>Gruppe</th><th>Schlüsselindikatoren</th><th>Was es zeigt</th></tr>
    <tr><td>Bewertung</td><td>MVRV Z, Realized Price, NUPL</td><td>Über- / Unterbewertung</td></tr>
    <tr><td>Rentabilität / Stimmung</td><td>SOPR, STH-SOPR</td><td>Halter-G&V, Gewinnmitnahme</td></tr>
    <tr><td>Halterverhalten</td><td>LTH-Angebotsanteil</td><td>Akkumulation / Verteilung</td></tr>
    <tr><td>Miner</td><td>Hash Ribbon</td><td>Miner-Kapitulation, Böden</td></tr>
    <tr><td>Kapitalfluss</td><td>Coinbase Premium, Funding</td><td>Institutionelle Nachfrage, Hebel-Neigung</td></tr>
  </table>

  <div class="box ko">🔗 <strong>각 지표 자세히 보기:</strong>
    <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> ·
    <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">실현가</a> ·
    <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> ·
    <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> ·
    <a href="/blog/lth-supply.php<?= h(langSuffix($lang)) ?>">LTH 공급량</a> ·
    <a href="/blog/hash-ribbon-indicator.php<?= h(langSuffix($lang)) ?>">해시 리본</a> ·
    <a href="/blog/coinbase-premium.php<?= h(langSuffix($lang)) ?>">코인베이스 프리미엄</a> ·
    <a href="/blog/funding-rate-futures-gap.php<?= h(langSuffix($lang)) ?>">펀딩비</a> ·
    <a href="/blog/bitcoin-dominance.php<?= h(langSuffix($lang)) ?>">BTC 도미넌스</a></div>
  <div class="box en">🔗 <strong>Read more on each indicator:</strong>
    <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> ·
    <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Realized Price</a> ·
    <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> ·
    <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> ·
    <a href="/blog/lth-supply.php<?= h(langSuffix($lang)) ?>">LTH Supply</a> ·
    <a href="/blog/hash-ribbon-indicator.php<?= h(langSuffix($lang)) ?>">Hash Ribbon</a> ·
    <a href="/blog/coinbase-premium.php<?= h(langSuffix($lang)) ?>">Coinbase Premium</a> ·
    <a href="/blog/funding-rate-futures-gap.php<?= h(langSuffix($lang)) ?>">Funding Rate</a> ·
    <a href="/blog/bitcoin-dominance.php<?= h(langSuffix($lang)) ?>">BTC Dominance</a></div>
  <div class="box ja">🔗 <strong>各指標の詳細:</strong>
    <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Zスコア</a> ·
    <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">実現価格</a> ·
    <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> ·
    <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> ·
    <a href="/blog/lth-supply.php<?= h(langSuffix($lang)) ?>">LTH供給量</a> ·
    <a href="/blog/hash-ribbon-indicator.php<?= h(langSuffix($lang)) ?>">ハッシュリボン</a> ·
    <a href="/blog/coinbase-premium.php<?= h(langSuffix($lang)) ?>">コインベースプレミアム</a> ·
    <a href="/blog/funding-rate-futures-gap.php<?= h(langSuffix($lang)) ?>">資金調達率</a> ·
    <a href="/blog/bitcoin-dominance.php<?= h(langSuffix($lang)) ?>">BTCドミナンス</a></div>

  <div class="box es">🔗 <strong>Más sobre cada indicador:</strong>
    <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> ·
    <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Precio Realizado</a> ·
    <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> ·
    <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> ·
    <a href="/blog/lth-supply.php<?= h(langSuffix($lang)) ?>">Suministro LTH</a> ·
    <a href="/blog/hash-ribbon-indicator.php<?= h(langSuffix($lang)) ?>">Hash Ribbon</a> ·
    <a href="/blog/coinbase-premium.php<?= h(langSuffix($lang)) ?>">Coinbase Premium</a> ·
    <a href="/blog/funding-rate-futures-gap.php<?= h(langSuffix($lang)) ?>">Tasa de Financiación</a> ·
    <a href="/blog/bitcoin-dominance.php<?= h(langSuffix($lang)) ?>">Dominancia BTC</a></div>
  <div class="box de">🔗 <strong>Mehr zu jedem Indikator:</strong>
    <a href="/blog/mvrv-z-score.php<?= h(langSuffix($lang)) ?>">MVRV Z-Score</a> ·
    <a href="/blog/realized-price.php<?= h(langSuffix($lang)) ?>">Realized Price</a> ·
    <a href="/blog/nupl.php<?= h(langSuffix($lang)) ?>">NUPL</a> ·
    <a href="/blog/sth-sopr.php<?= h(langSuffix($lang)) ?>">STH-SOPR</a> ·
    <a href="/blog/lth-supply.php<?= h(langSuffix($lang)) ?>">LTH-Angebot</a> ·
    <a href="/blog/hash-ribbon-indicator.php<?= h(langSuffix($lang)) ?>">Hash Ribbon</a> ·
    <a href="/blog/coinbase-premium.php<?= h(langSuffix($lang)) ?>">Coinbase Premium</a> ·
    <a href="/blog/funding-rate-futures-gap.php<?= h(langSuffix($lang)) ?>">Funding Rate</a> ·
    <a href="/blog/bitcoin-dominance.php<?= h(langSuffix($lang)) ?>">BTC-Dominanz</a></div>

  <h2 class="ko">지표를 겹쳐 읽는 법</h2>
  <h2 class="en">How to Stack Indicators</h2>
  <h2 class="ja">指標を重ねて読む方法</h2>
  <h2 class="es">Cómo Combinar Indicadores</h2>
  <h2 class="de">Wie man Indikatoren stapelt</h2>

  <p class="ko">가장 강력한 신호는 서로 다른 그룹의 지표가 같은 방향을 가리킬 때 나옵니다. 예를 들어 <strong>바닥 신호</strong>는 MVRV Z 0 이하(저평가) + NUPL 0 이하(항복) + 해시 리본 회복 + 코인베이스 프리미엄 양전환이 겹칠 때 신뢰도가 매우 높아집니다. 반대로 <strong>고점 경계</strong>는 NUPL 0.75 이상 + LTH 분산 시작 + 펀딩비 과열이 동시에 나타날 때입니다. 하나의 지표는 노이즈지만, 여러 그룹의 합의는 신호입니다.</p>
  <p class="en">The strongest signals appear when indicators from different groups point the same way. A <strong>bottom signal</strong> gains high confidence when MVRV Z below 0 (undervalued) + NUPL below 0 (capitulation) + Hash Ribbon recovery + Coinbase Premium turning positive line up together. Conversely, a <strong>top warning</strong> is NUPL above 0.75 + LTH distribution beginning + overheated funding at once. One indicator is noise; consensus across groups is signal.</p>
  <p class="ja">最も強力なシグナルは、異なるグループの指標が同じ方向を指す時に現れます。例えば<strong>底値シグナル</strong>は、MVRV Z 0以下(割安)+NUPL 0以下(投降)+ハッシュリボン回復+コインベースプレミアムのプラス転換が重なると信頼度が非常に高まります。逆に<strong>天井警戒</strong>は、NUPL 0.75以上+LTH分散開始+資金調達率過熱が同時に現れる時です。単一指標はノイズ、複数グループの合意はシグナルです。</p>
  <p class="es">Las señales más fuertes aparecen cuando indicadores de diferentes grupos apuntan igual. Una <strong>señal de suelo</strong> gana confianza cuando MVRV Z bajo 0 (infravalorado) + NUPL bajo 0 (capitulación) + recuperación de Hash Ribbon + Coinbase Premium volviéndose positivo se alinean. Por el contrario, un <strong>aviso de techo</strong> es NUPL sobre 0.75 + inicio de distribución LTH + financiación sobrecalentada a la vez. Un indicador es ruido; el consenso entre grupos es señal.</p>
  <p class="de">Die stärksten Signale entstehen, wenn Indikatoren verschiedener Gruppen in dieselbe Richtung zeigen. Ein <strong>Boden-Signal</strong> gewinnt an Vertrauen, wenn MVRV Z unter 0 (unterbewertet) + NUPL unter 0 (Kapitulation) + Hash-Ribbon-Erholung + Coinbase Premium ins Positive zusammenkommen. Umgekehrt ist eine <strong>Top-Warnung</strong> NUPL über 0,75 + beginnende LTH-Verteilung + überhitztes Funding zugleich. Ein Indikator ist Rauschen; Konsens über Gruppen ist Signal.</p>

  <h2 class="ko">한계와 주의점</h2>
  <h2 class="en">Limitations</h2>
  <h2 class="ja">限界と注意点</h2>
  <h2 class="es">Limitaciones</h2>
  <h2 class="de">Grenzen</h2>

  <p class="ko">온체인 지표는 중장기 사이클 판단에 강하지만 단기 가격 예측 도구가 아닙니다. 대부분 며칠~몇 주 단위로 유효하며, 초 단위 트레이딩에는 맞지 않습니다. 또한 ETF·거래소 커스터디 확산으로 과거 대비 온체인 데이터의 해석이 달라지는 추세이니, 절대 기준을 맹신하지 말고 추세와 맥락으로 읽으세요.</p>
  <p class="en">On-chain indicators are strong for medium-to-long cycle judgment but not short-term price predictors. Most are valid over days to weeks, not seconds. And with the spread of ETF and exchange custody, interpretation of on-chain data is shifting versus the past — don't blindly trust absolute thresholds; read trend and context.</p>
  <p class="ja">オンチェーン指標は中長期サイクル判断に強いですが、短期価格予測ツールではありません。多くは数日〜数週間単位で有効で、秒単位のトレーディングには合いません。またETF・取引所カストディの拡大で過去と比べオンチェーンデータの解釈が変わりつつあるため、絶対基準を盲信せず、トレンドと文脈で読んでください。</p>
  <p class="es">Los indicadores on-chain son fuertes para juicios de ciclo medio-largo pero no predictores de precio a corto plazo. La mayoría son válidos en días a semanas, no segundos. Y con la expansión de ETF y custodia de exchanges, la interpretación de datos on-chain está cambiando — no confíes ciegamente en umbrales absolutos; lee tendencia y contexto.</p>
  <p class="de">On-Chain-Indikatoren sind stark für mittel- bis langfristige Zyklusbeurteilung, aber keine kurzfristigen Preisprädiktoren. Die meisten sind über Tage bis Wochen gültig, nicht Sekunden. Und mit der Verbreitung von ETF- und Börsenverwahrung verschiebt sich die Interpretation von On-Chain-Daten — vertrauen Sie nicht blind absoluten Schwellen; lesen Sie Trend und Kontext.</p>

  <div class="box ko">📊 <strong>BTCtiming 대시보드는</strong> 위 지표들을 종합해 0~10점의 매수·매도 타이밍 점수로 환산합니다. 각 지표가 현재 점수를 얼마나 끌어올리고 끌어내리는지 실시간으로 확인해 보세요.</div>
  <div class="box en">📊 <strong>The BTCtiming dashboard</strong> combines these indicators into a 0–10 buy/sell timing score. See in real time how much each indicator pushes the current score up or down.</div>
  <div class="box ja">📊 <strong>BTCtimingダッシュボードは</strong> 上記の指標を総合して0〜10点の売買タイミングスコアに換算します。各指標が現在スコアをどれだけ押し上げ・押し下げているかをリアルタイムで確認してみてください。</div>
  <div class="box es">📊 <strong>El panel de BTCtiming</strong> combina estos indicadores en una puntuación de timing de 0–10. Ve en tiempo real cuánto empuja cada indicador la puntuación actual hacia arriba o abajo.</div>
  <div class="box de">📊 <strong>Das BTCtiming-Dashboard</strong> kombiniert diese Indikatoren zu einem 0–10 Kauf-/Verkaufs-Timing-Score. Sehen Sie in Echtzeit, wie stark jeder Indikator den aktuellen Score treibt.</div>

<?php require __DIR__.'/_footer.php'; ?>
