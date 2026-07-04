<?php $slug = 'rainbow-chart-guide'; require __DIR__.'/_header.php'; ?>

<p class="ko">"밈으로 시작했는데 꽤 잘 맞아서 다들 진지하게 쓰고 있다"는 지표가 있다면 <strong>무지개차트(Rainbow Chart)</strong>가 대표적이에요. 로그 스케일에서 비트코인 가격의 장기 성장 추세를 색깔 띠로 표현한 차트입니다.</p>
  <p class="en">If there's an indicator that "started as a joke but turned out to work well enough that people use it seriously," it's the <strong>Rainbow Chart</strong> — a colored band visualizing Bitcoin's long-term log-scale growth trend.</p>
  <p class="ja">「ミームとして始まったのに、意外とよく当たるので皆が真剣に使っている」指標があるとすれば、それが<strong>虹チャート(Rainbow Chart)</strong>です。ログスケールでビットコイン価格の長期成長トレンドを色帯で表現したチャートです。</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 비트코인 가격을 로그 스케일로 놓고 시간에 따른 회귀선을 그은 뒤, 그 위아래로 색깔 띠를 나눈 차트입니다. 파란색(저평가)에서 빨간색(과열)까지 9단계로 나뉘며, 지금까지 극단적 색상 구간이 실제 사이클 저점·고점과 여러 번 겹쳤습니다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Bitcoin's price plotted on a log scale with a regression line through time, divided into color bands above and below it. Nine tiers run from blue (undervalued) to red (overheated), and the extreme-color zones have repeatedly overlapped with actual cycle tops and bottoms.</div>
  <div class="box ja">💡 <strong>要点:</strong> ビットコイン価格をログスケールで表示し、時間軸に沿った回帰線を引いた上で、その上下を色帯で分けたチャートです。青(割安)から赤(過熱)まで9段階に分かれ、これまで極端な色の区間が実際のサイクル底値・天井と何度も重なってきました。</div>

  <h2 class="ko">왜 로그 스케일인가</h2>
  <h2 class="en">Why a log scale?</h2>
  <h2 class="ja">なぜログスケールなのか</h2>
  <p class="ko">비트코인은 초기엔 몇 센트에서 몇 달러로 움직이는 것도 "수십 배" 상승이었고, 지금은 몇만 달러 단위로 움직여도 비율로는 작은 변화예요. 일반 선형 차트로 보면 초기 변동은 아예 안 보이고 최근 몇 년만 두드러지게 보이는 착시가 생깁니다. 로그 스케일은 "몇 배 상승했는가"라는 비율 변화를 동일한 시각적 간격으로 보여줘서, 전체 역사를 왜곡 없이 한눈에 담을 수 있게 해줘요.</p>
  <p class="en">Early Bitcoin moving from cents to a few dollars was a "tens-of-times" gain; today, moving by thousands of dollars is a small percentage change. A regular linear chart makes early history invisible and recent years look dominant — an optical illusion. A log scale shows proportional change ("how many times over") at equal visual intervals, letting the entire history be viewed without distortion.</p>
  <p class="ja">初期のビットコインは数セントから数ドルへの変動でも「数十倍」の上昇でしたが、今では数万ドル単位の変動でも比率としては小さな変化です。通常の線形チャートで見ると、初期の変動はまったく見えず直近数年だけが目立つという錯覚が生まれます。ログスケールは「何倍に上昇したか」という比率変化を同じ視覚的間隔で示すため、歴史全体を歪みなく一目で捉えられるようにしてくれます。</p>

  <h2 class="ko">역사적으로 어떻게 맞아떨어졌나</h2>
  <h2 class="en">How it's lined up historically</h2>
  <h2 class="ja">歴史的にどう一致してきたか</h2>
  <p class="ko">2018년 저점과 2022년 저점 모두 무지개차트의 파란색(저평가) 구간에서 형성됐고, 2017년과 2021년 고점은 모두 주황~빨강(과열) 구간에서 나왔습니다. 로그 성장 추세라는 단순한 가정 하나가 여러 사이클에 걸쳐 대략적인 궤도를 계속 그려낸 셈이에요.</p>
  <p class="en">Both the 2018 and 2022 bottoms formed within the blue (undervalued) band, and the 2017 and 2021 tops both landed in the orange-to-red (overheated) range. A single simple assumption — log-scale growth — has kept roughly tracing the path across multiple cycles.</p>
  <p class="ja">2018年の底値と2022年の底値はいずれも虹チャートの青(割安)区間で形成され、2017年と2021年の天井はいずれもオレンジ〜赤(過熱)区間から出ました。ログスケール成長というシンプルな一つの仮定が、複数のサイクルにわたっておおよその軌道を描き続けてきたことになります。</p>

  <h2 class="ko">주의할 점</h2>
  <h2 class="en">Important caveats</h2>
  <h2 class="ja">注意すべき点</h2>
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

  <h2 class="ko">함께 보면 좋은 지표</h2>
  <h2 class="en">Best combined with</h2>
  <h2 class="ja">併せて見るべき指標</h2>
  <p class="ko">단독으로 매매 근거로 삼기보다는, <a href="/blog/200-week-moving-average.html">200주 이동평균선</a>이나 <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> 같은 정량적 지표와 교차 확인하는 용도로 쓰는 게 좋습니다.</p>
  <p class="en">Better used to cross-check against quantitative indicators like the <a href="/blog/200-week-moving-average.html">200-week MA</a> or <a href="/blog/mvrv-z-score.html">MVRV Z-Score</a> than as a standalone trading trigger.</p>
  <p class="ja">単独で売買の根拠にするよりも、<a href="/blog/200-week-moving-average.html">200週移動平均線</a>や<a href="/blog/mvrv-z-score.html">MVRV Zスコア</a>のような定量的指標との相互確認用に使うのが良いでしょう。</p>
<?php require __DIR__.'/_footer.php'; ?>
