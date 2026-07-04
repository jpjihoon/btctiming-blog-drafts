<?php $slug = 'funding-rate-futures-gap'; require __DIR__.'/_header.php'; ?>

  <p class="ko">선물 시장에서 가격이 현물보다 훨씬 비싸게(혹은 싸게) 거래되고 있다면, 그건 시장 참여자들이 얼마나 공격적으로 레버리지를 쓰고 있는지를 보여주는 신호입니다. <strong>펀딩비(Funding Rate)</strong>와 <strong>선물-현물 갭</strong>은 이 레버리지 압력을 실시간으로 추적하는 지표입니다.</p>
  <p class="en">When futures trade far above (or below) spot price, it signals how aggressively the market is using leverage. <strong>Funding Rate</strong> and the <strong>Futures-Spot Gap</strong> track this leverage pressure in real time.</p>
  <p class="ja">先物市場で価格が現物よりもはるかに高く(または安く)取引されている場合、それは市場参加者がどれだけ積極的にレバレッジを使っているかを示すシグナルです。<strong>ファンディングレート(Funding Rate)</strong>と<strong>先物-現物ギャップ</strong>は、このレバレッジ圧力をリアルタイムで追跡する指標です。</p>

  <p class="es">Cuando los futuros cotizan muy por encima (o por debajo) del precio spot, señala qué tan agresivamente el mercado está usando apalancamiento. La <strong>Tasa de Financiación</strong> y la <strong>Brecha Futuros-Spot</strong> rastrean esta presión de apalancamiento en tiempo real.</p>
  <p class="de">Wenn Futures weit über (oder unter) dem Spot-Preis handeln, signalisiert dies, wie aggressiv der Markt Hebelwirkung einsetzt. Die <strong>Funding Rate</strong> und der <strong>Futures-Spot-Spread</strong> verfolgen diesen Hebeldruck in Echtzeit.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 펀딩비가 극단적으로 높으면(과열 롱 포지션 과다) 조정 위험이 큽니다. 반대로 펀딩비가 마이너스로 전환되면 과도한 레버리지가 청산되어 매도 압력이 소진됐다는 신호입니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Extremely high funding (excess leveraged longs) signals correction risk. A flip to negative funding means over-leveraged positions have been flushed out and selling pressure is exhausted.</div>
  <div class="box ja">💡 <strong>要点:</strong> ファンディングレートが極端に高い(過熱したロングポジションが多すぎる)場合、調整リスクが大きくなります。逆にマイナスに転じた場合は、過度なレバレッジが清算され売り圧力が枯渇したシグナルです。</div>
  <div class="box es">💡 <strong>Resumen clave:</strong> Una financiación extremadamente alta (exceso de largos apalancados) señala riesgo de corrección. Un giro a financiación negativa significa que las posiciones sobreapalancadas fueron liquidadas y la presión de venta se agotó.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Extrem hohe Funding Rate (übermäßige gehebelte Longs) signalisiert Korrekturrisiko. Ein Umschwung zu negativer Funding Rate bedeutet, dass überhebelte Positionen ausgespült wurden und der Verkaufsdruck erschöpft ist.</div>

  <h2 class="ko">펀딩비란 무엇인가?</h2>
  <h2 class="en">What Is Funding Rate?</h2>
  <h2 class="ja">ファンディングレートとは何か?</h2>
  <h2 class="es">¿Qué es la Tasa de Financiación?</h2>
  <h2 class="de">Was ist die Funding Rate?</h2>
  <p class="ko">무기한 선물(Perpetual Futures)은 만기가 없는 대신, 선물 가격을 현물 가격에 붙들어 두기 위해 롱과 숏 포지션 보유자끼리 주기적으로 수수료를 주고받습니다. 롱이 많으면(선물이 현물보다 비싸면) 롱이 숏에게 펀딩비를 지불하고, 반대면 그 반대입니다.</p>
  <p class="en">Perpetual futures have no expiry, so instead, long and short holders periodically exchange a fee to keep the futures price anchored to spot. When longs dominate (futures trade above spot), longs pay shorts — and vice versa.</p>
  <p class="ja">無期限先物(Perpetual Futures)には満期がない代わりに、先物価格を現物価格に連動させるため、ロングとショートの保有者同士が定期的に手数料をやり取りします。ロングが多い(先物が現物より高い)場合、ロングがショートに手数料を支払い、逆の場合はその逆になります。</p>
  <p class="es">Los futuros perpetuos no tienen vencimiento; en su lugar, los tenedores de posiciones largas y cortas intercambian periódicamente una tarifa para mantener el precio de futuros anclado al spot. Cuando dominan los largos (futuros por encima del spot), los largos pagan a los cortos, y viceversa.</p>
  <p class="de">Perpetual Futures haben kein Ablaufdatum; stattdessen tauschen Long- und Short-Halter periodisch eine Gebühr aus, um den Futures-Preis am Spot-Preis zu verankern. Wenn Longs dominieren (Futures über Spot), zahlen Longs an Shorts — und umgekehrt.</p>

  <h2 class="ko">자금 흐름을 시각화하면</h2>
  <h2 class="en">The payment flow, visualized</h2>
  <h2 class="ja">資金の流れを可視化すると</h2>
  <h2 class="es">El flujo de pago, visualizado</h2>
  <h2 class="de">Der Zahlungsfluss, visualisiert</h2>

  <div class="ko">
  <svg viewBox="0 0 700 180" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">펀딩비 지불 방향 (양수 펀딩비일 때)</text>
    <g font-family="sans-serif">
      <rect x="80" y="60" width="140" height="60" fill="#1c1c1f" stroke="#4ade80" stroke-width="1.5" rx="8"/>
      <text x="150" y="95" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">롱 포지션</text>
      <path d="M 220 90 L 470 90" stroke="#fbbf24" stroke-width="2" marker-end="url(#arf1)"/>
      <text x="345" y="80" fill="#fbbf24" font-size="11" font-weight="700" text-anchor="middle">펀딩비 지불 →</text>
      <rect x="480" y="60" width="140" height="60" fill="#1c1c1f" stroke="#f87171" stroke-width="1.5" rx="8"/>
      <text x="550" y="95" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">숏 포지션</text>
      <text x="150" y="150" fill="#71717a" font-size="10" text-anchor="middle">과열 시 압도적으로 많음</text>
    </g>
    <defs><marker id="arf1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6" fill="#fbbf24"/></marker></defs>
  </svg>
  </div>
  <div class="en es de">
  <svg viewBox="0 0 700 180" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Funding Payment Direction (Positive Funding)</text>
    <g font-family="sans-serif">
      <rect x="80" y="60" width="140" height="60" fill="#1c1c1f" stroke="#4ade80" stroke-width="1.5" rx="8"/>
      <text x="150" y="95" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">Longs</text>
      <path d="M 220 90 L 470 90" stroke="#fbbf24" stroke-width="2" marker-end="url(#arf2)"/>
      <text x="345" y="80" fill="#fbbf24" font-size="11" font-weight="700" text-anchor="middle">Pay funding →</text>
      <rect x="480" y="60" width="140" height="60" fill="#1c1c1f" stroke="#f87171" stroke-width="1.5" rx="8"/>
      <text x="550" y="95" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">Shorts</text>
      <text x="150" y="150" fill="#71717a" font-size="10" text-anchor="middle">Overwhelming majority when overheated</text>
    </g>
    <defs><marker id="arf2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6" fill="#fbbf24"/></marker></defs>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 180" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">ファンディングレート支払方向 (プラス時)</text>
    <g font-family="sans-serif">
      <rect x="80" y="60" width="140" height="60" fill="#1c1c1f" stroke="#4ade80" stroke-width="1.5" rx="8"/>
      <text x="150" y="95" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">ロング</text>
      <path d="M 220 90 L 470 90" stroke="#fbbf24" stroke-width="2" marker-end="url(#arf3)"/>
      <text x="345" y="80" fill="#fbbf24" font-size="11" font-weight="700" text-anchor="middle">手数料支払い →</text>
      <rect x="480" y="60" width="140" height="60" fill="#1c1c1f" stroke="#f87171" stroke-width="1.5" rx="8"/>
      <text x="550" y="95" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">ショート</text>
      <text x="150" y="150" fill="#71717a" font-size="10" text-anchor="middle">過熱時に圧倒的に多い</text>
    </g>
    <defs><marker id="arf3" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6" fill="#fbbf24"/></marker></defs>
  </svg>
  </div>

  <h2 class="ko">역사적 사례</h2>
  <h2 class="en">Historical Cases</h2>
  <h2 class="ja">歴史的事例</h2>
  <h2 class="es">Casos Históricos</h2>
  <h2 class="de">Historische Fälle</h2>
  <div class="rc">
    <div class="rd">2021.04 (고점 근접)</div>
    <div class="rt ko">$64,000 근처에서 펀딩비가 연환산 100% 이상까지 치솟으며 극단적 롱 과열.</div>
    <div class="rt en">Funding rates spiked above 100% annualized near $64,000, signaling extreme long-side overheating.</div>
    <div class="rt ja">$64,000付近でファンディングレートが年率換算100%以上まで急騰し、極端なロング過熱に。</div>
    <div class="rt es">Las tasas de financiación se dispararon por encima del 100% anualizado cerca de $64,000, señalando sobrecalentamiento extremo del lado largo.</div>
    <div class="rt de">Die Funding Rates schossen nahe $64.000 auf über 100% annualisiert und signalisierten extreme Long-Überhitzung.</div>
    <div class="rr ko">→ 이후 급격한 조정으로 $30,000대까지 하락</div>
    <div class="rr en">→ Followed by a sharp correction down to the $30,000s</div>
    <div class="rr ja">→ その後急激な調整で$30,000台まで下落</div>
    <div class="rr es">→ Seguido por una corrección brusca hasta los $30,000</div>
    <div class="rr de">→ Gefolgt von einer scharfen Korrektur auf die $30.000er-Marke</div>
  </div>
  <div class="rc">
    <div class="rd">2024.08 (엔캐리 트레이드 청산)</div>
    <div class="rt ko">글로벌 리스크오프로 펀딩비가 급격히 마이너스 전환, 롱 포지션 대거 청산.</div>
    <div class="rt en">A global risk-off wave sent funding sharply negative as long positions were mass-liquidated.</div>
    <div class="rt ja">グローバルなリスクオフでファンディングレートが急激にマイナス転換、ロングポジションが大量清算。</div>
    <div class="rt es">Una ola global de aversión al riesgo hizo que la financiación se volviera fuertemente negativa mientras las posiciones largas eran liquidadas masivamente.</div>
    <div class="rt de">Eine globale Risk-Off-Welle ließ die Funding Rate stark negativ werden, während Long-Positionen massenhaft liquidiert wurden.</div>
    <div class="rr ko">→ 레버리지 청산 완료 후 빠른 반등</div>
    <div class="rr en">→ Rebounded quickly once leverage was flushed out</div>
    <div class="rr ja">→ レバレッジ清算完了後、速やかに反発</div>
    <div class="rr es">→ Rebote rápido una vez que el apalancamiento fue eliminado</div>
    <div class="rr de">→ Schnelle Erholung, nachdem der Hebel ausgespült war</div>
  </div>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important Caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <h2 class="es">Advertencias Importantes</h2>
  <h2 class="de">Wichtige Einschränkungen</h2>
  <ul class="ko">
    <li><strong>거래소마다 차이 있음.</strong> 거래소별 펀딩비가 다를 수 있어 여러 거래소를 평균 내는 것이 좋습니다.</li>
    <li><strong>강세장에서는 지속적 양수가 정상.</strong> 펀딩비가 양수라고 무조건 위험한 것은 아니며, 극단적 수준인지가 중요합니다.</li>
    <li><strong>초단기 지표.</strong> 몇 시간~며칠 단위로 급변하므로 스윙 매매보다는 단기 리스크 관리에 적합합니다.</li>
  </ul>
  <ul class="en">
    <li><strong>Varies by exchange.</strong> Funding rates differ across exchanges — averaging several is recommended.</li>
    <li><strong>Sustained positive funding is normal in bull markets.</strong> Positive funding alone isn't dangerous; what matters is whether it's at an extreme.</li>
    <li><strong>A short-term indicator.</strong> It can swing within hours to days, making it better suited to short-term risk management than swing trading.</li>
  </ul>
  <ul class="ja">
    <li><strong>取引所によって差がある。</strong> 取引所ごとにファンディングレートが異なるため、複数の平均を取ることが望ましいです。</li>
    <li><strong>強気相場では持続的なプラスが正常。</strong> プラスであること自体が危険なのではなく、極端な水準かどうかが重要です。</li>
    <li><strong>超短期指標。</strong> 数時間〜数日単位で急変するため、スイングトレードよりも短期的なリスク管理に適しています。</li>
  </ul>
  <ul class="es">
    <li><strong>Varía según el exchange.</strong> Las tasas de financiación difieren entre exchanges — se recomienda promediar varios.</li>
    <li><strong>Financiación positiva sostenida es normal en mercados alcistas.</strong> La financiación positiva por sí sola no es peligrosa; lo que importa es si está en un nivel extremo.</li>
    <li><strong>Un indicador de corto plazo.</strong> Puede oscilar en horas o días, siendo más adecuado para gestión de riesgo a corto plazo que para swing trading.</li>
  </ul>
  <ul class="de">
    <li><strong>Variiert je nach Börse.</strong> Funding Rates unterscheiden sich zwischen Börsen — Durchschnittsbildung über mehrere wird empfohlen.</li>
    <li><strong>Anhaltend positive Funding Rate ist in Bullenmärkten normal.</strong> Positive Funding allein ist nicht gefährlich; entscheidend ist, ob sie extrem ist.</li>
    <li><strong>Ein kurzfristiger Indikator.</strong> Kann innerhalb von Stunden bis Tagen schwanken, daher besser geeignet für kurzfristiges Risikomanagement als für Swing-Trading.</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best Combined With</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <h2 class="es">Mejor Combinado Con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <ul class="ko">
    <li><strong><a href="/blog/fear-greed-index.html">공포탐욕지수</a>:</strong> 극단적 탐욕과 펀딩비 과열이 겹치는지 확인</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR</a>:</strong> 레버리지 청산과 현물 매도가 동시에 일어나는지 확인</li>
  </ul>
  <ul class="en">
    <li><strong><a href="/blog/fear-greed-index.html">Fear &amp; Greed Index</a>:</strong> Check whether extreme greed overlaps with funding overheating</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR</a>:</strong> Check whether leverage flushes coincide with spot selling</li>
  </ul>
  <ul class="ja">
    <li><strong><a href="/blog/fear-greed-index.html">恐怖・強欲指数</a>:</strong> 極端な強欲とファンディングレート過熱が重なるか確認</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR</a>:</strong> レバレッジ清算と現物売りが同時に起きているか確認</li>
  </ul>
  <ul class="es">
    <li><strong><a href="/blog/fear-greed-index.html">Índice de Miedo y Codicia</a>:</strong> Verificar si la codicia extrema coincide con sobrecalentamiento de financiación</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR</a>:</strong> Verificar si las liquidaciones de apalancamiento coinciden con ventas spot</li>
  </ul>
  <ul class="de">
    <li><strong><a href="/blog/fear-greed-index.html">Angst-&amp;-Gier-Index</a>:</strong> Prüfen, ob extreme Gier mit Funding-Überhitzung zusammenfällt</li>
    <li><strong><a href="/blog/sth-sopr.html">STH-SOPR</a>:</strong> Prüfen, ob Hebel-Ausspülungen mit Spot-Verkäufen zusammenfallen</li>
  </ul>

<?php require __DIR__.'/_footer.php'; ?>
