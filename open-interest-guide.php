<?php $slug = 'open-interest-guide'; require __DIR__.'/_header.php'; ?>

<p class="ko">가격이 오르는데, 그게 "새로운 돈이 들어와서"인지 "숏 포지션들이 청산당해서"인지 구분하고 싶다면 <strong>미결제약정(Open Interest, OI)</strong>을 봐야 합니다.</p>
  <p class="en">Want to know whether a price rally comes from fresh capital or just short positions getting squeezed out? That's exactly what <strong>Open Interest (OI)</strong> tells you.</p>
  <p class="ja">価格が上昇している理由が「新しい資金が入ってきたから」なのか「ショートポジションが清算されたから」なのかを見分けたいなら、<strong>未決済建玉(Open Interest, OI)</strong>を見る必要があります。</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 미결제약정은 아직 청산되지 않고 열려 있는 선물·옵션 계약의 총 규모입니다. 가격 상승 + OI 증가는 새 자금 유입(건강한 추세), 가격 상승 + OI 감소는 숏 청산에 의한 반등(지속성 낮음)을 시사합니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Open Interest is the total value of futures/options contracts still open. Price up + OI up suggests fresh capital (healthy trend); price up + OI down suggests a short-squeeze bounce (less likely to persist).</div>
  <div class="box ja">💡 <strong>要点:</strong> 未決済建玉は、まだ清算されずに残っている先物・オプション契約の総量です。価格上昇+OI増加は新規資金流入(健全なトレンド)、価格上昇+OI減少はショート清算による反発(持続性が低い)を示唆します。</div>

  <h2 class="ko">거래량과 뭐가 다른가</h2>
  <h2 class="en">How is this different from volume?</h2>
  <h2 class="ja">出来高と何が違うのか</h2>
  <p class="ko">거래량은 "일정 기간 동안 얼마나 많이 사고팔았나"를 보여주는 유량(flow) 지표예요. 반면 미결제약정은 "지금 이 순간 청산되지 않고 열려 있는 포지션이 총 얼마인가"를 보여주는 저량(stock) 지표입니다. 거래량이 아무리 많아도 기존 포지션이 청산되고 새 포지션이 열리는 거라면 OI는 그대로일 수 있어요.</p>
  <p class="en">Volume is a flow metric — how much traded over some period. Open Interest is a stock metric — how much stands open right now, unclosed. Volume can be huge even if OI stays flat, if it's just old positions closing and new ones opening in equal measure.</p>
  <p class="ja">出来高は「一定期間にどれだけ売買されたか」を示すフロー指標です。一方、未決済建玉は「今この瞬間、清算されずに残っているポジションが合計いくらか」を示すストック指標です。出来高がどれだけ多くても、既存ポジションの決済と新規ポジションの開設が同量なら、OIは横ばいのままということもあります。</p>

  <h2 class="ko">4가지 조합으로 읽기</h2>
  <h2 class="en">Reading the 4 combinations</h2>
  <h2 class="ja">4つの組み合わせで読む</h2>
  <table class="zt ko">
    <tr><th>가격</th><th>OI</th><th>해석</th></tr>
    <tr><td class="g">상승</td><td class="g">증가</td><td class="g">새 매수세 유입 — 건강한 상승</td></tr>
    <tr><td class="g">상승</td><td class="y">감소</td><td class="y">숏 청산에 의한 반등 — 지속성 의문</td></tr>
    <tr><td class="r">하락</td><td class="r">증가</td><td class="r">새 매도세(숏) 유입 — 건강한 하락 추세</td></tr>
    <tr><td class="r">하락</td><td class="y">감소</td><td class="y">롱 청산에 의한 하락 — 저점 근접 가능성</td></tr>
  </table>
  <table class="zt en">
    <tr><th>Price</th><th>OI</th><th>Reading</th></tr>
    <tr><td class="g">Up</td><td class="g">Rising</td><td class="g">Fresh buying — healthy uptrend</td></tr>
    <tr><td class="g">Up</td><td class="y">Falling</td><td class="y">Short-squeeze bounce — sustainability in question</td></tr>
    <tr><td class="r">Down</td><td class="r">Rising</td><td class="r">Fresh shorting — healthy downtrend</td></tr>
    <tr><td class="r">Down</td><td class="y">Falling</td><td class="y">Long liquidation — possibly nearing a bottom</td></tr>
  </table>
  <table class="zt ja">
    <tr><th>価格</th><th>OI</th><th>解釈</th></tr>
    <tr><td class="g">上昇</td><td class="g">増加</td><td class="g">新規買い流入 — 健全な上昇</td></tr>
    <tr><td class="g">上昇</td><td class="y">減少</td><td class="y">ショート清算による反発 — 持続性に疑問</td></tr>
    <tr><td class="r">下落</td><td class="r">増加</td><td class="r">新規売り(ショート)流入 — 健全な下降トレンド</td></tr>
    <tr><td class="r">下落</td><td class="y">減少</td><td class="y">ロング清算による下落 — 底値接近の可能性</td></tr>
  </table>

  <h2 class="ko">청산 리스크와의 관계</h2>
  <h2 class="en">Relationship to liquidation risk</h2>
  <h2 class="ja">清算リスクとの関係</h2>
  <p class="ko">OI가 급격히 커진 상태에서 가격이 특정 방향으로 쏠리면, <a href="/blog/liquidation-price-math.html">레버리지 청산</a>이 연쇄적으로 발생할 위험도 커집니다. OI가 사상 최고치를 경신하는 시점은 종종 시장이 가장 과열된 순간과 겹치는데, 이는 그만큼 많은 베팅이 걸려 있어 작은 가격 변동에도 큰 연쇄 반응이 나올 수 있기 때문이에요.</p>
  <p class="en">When OI balloons and price leans hard in one direction, the risk of a <a href="/blog/liquidation-price-math.html">leveraged liquidation</a> cascade rises with it. Record-high OI often coincides with peak market overheating — because so much is riding on open positions that even a small price move can trigger an outsized chain reaction.</p>
  <p class="ja">OIが急激に膨らんだ状態で価格が特定の方向に傾くと、<a href="/blog/liquidation-price-math.html">レバレッジ清算</a>が連鎖的に発生するリスクも高まります。OIが過去最高値を更新する時点は、しばしば市場が最も過熱した瞬間と重なります。それだけ多くの賭けがかかっているため、わずかな価格変動でも大きな連鎖反応が起こり得るからです。</p>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important caveats</h2>
  <h2 class="ja">注意すべき点</h2>
  <ul class="ko">
    <li><strong>거래소별로 집계 방식이 다름.</strong> 여러 거래소의 OI를 합산해서 보는 게 왜곡을 줄입니다.</li>
    <li><strong>절대치보다 변화율이 중요.</strong> OI 자체의 크기보다, 최근 대비 급증·급감했는지가 더 유의미한 신호입니다.</li>
  </ul>
  <ul class="en">
    <li><strong>Aggregation methods vary by exchange.</strong> Summing OI across multiple exchanges reduces distortion.</li>
    <li><strong>Rate of change matters more than the absolute level.</strong> A sharp spike or drop relative to recent norms is more meaningful than the raw number.</li>
  </ul>
  <ul class="ja">
    <li><strong>取引所ごとに集計方法が異なる。</strong> 複数の取引所のOIを合算して見ることで歪みを減らせます。</li>
    <li><strong>絶対値より変化率が重要。</strong> OI自体の大きさよりも、直近と比べて急増・急減したかどうかがより意味のあるシグナルです。</li>
  </ul>

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best combined with</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <p class="ko"><a href="/blog/funding-rate-futures-gap.html">펀딩비</a>와 함께 보면 완성도가 높아집니다 — OI가 크고 펀딩비도 극단적이면, 레버리지가 한쪽으로 심하게 쏠려 있다는 이중 확인이 됩니다.</p>
  <p class="en">Pairs well with <a href="/blog/funding-rate-futures-gap.html">funding rate</a> — large OI plus extreme funding double-confirms that leverage is heavily tilted in one direction.</p>
  <p class="ja"><a href="/blog/funding-rate-futures-gap.html">ファンディングレート</a>と併せて見ると精度が上がります — OIが大きくファンディングレートも極端であれば、レバレッジが一方向に大きく偏っていることの二重確認になります。</p>
<?php require __DIR__.'/_footer.php'; ?>
