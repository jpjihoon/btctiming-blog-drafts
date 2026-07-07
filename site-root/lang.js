// BTCtiming 언어 사전 — index.php에서 분리 (유지보수·브라우저 캐싱용)
// 이 파일은 index.php의 메인 스크립트보다 먼저 로드되어야 함 (<head>에서 로드)
window.LANGS = {
  en: {
    exchBannerT:"Which exchange to start with?", exchBannerD:"Compare Binance & Bybit + fee discount",
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Privacy Policy', footerTerms:'Terms of Service', footerDisclaimer:'Not financial advice',
    whyBtnLabel:'Why?', whyTopTitle:'Top contributors', whyBottomTitle:'Holding it back', histToday:'Today', histYesterday:'Yesterday', histWeekAgo:'Last Week',
    buyTiming:'📈 LONG Timing', sellTiming:'📉 SHORT Timing',
    livePriceLabel:'Price · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Realized Price Gap', maLabel:'200W MA (ref)',
    splitPlan:'Split Entry Plan', splitTitle:'Allocation by Stage',
    splitStep1:(s)=>`Now (Score ${s})`, splitStep2:'Hash Ribbon Recovery',
    splitStep3:'Coinbase Premium → Positive', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Updated',
    // Mode labels
    modeTitle_buy:'LONG TIMING SCORE', modeTitle_sell:'SELL PRESSURE GAUGE',
    modeSub_buy:'Cycle bottom long entry model', modeSub_sell:'Short entry timing model',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ How to read Sell Score',
    sellExplain_low:'🟢 LOW (0~3): Market is in bottom zone. No exit signal. Hold or accumulate.',
    sellExplain_mid:'🟡 MID (4~6): Market heating up. Monitor for partial reduction.',
    sellExplain_high:'🔴 HIGH (7~10): Strong sell signal. Exit long / Consider short entry.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Realized Price Gap',
    ind_alt_valuation:'Price vs Est. Realized (200W MA)', ind_alt_drawdown:'ATH Drawdown',
    tab_dashboard:'Live', tab_coins:'Coins', tab_blog:'Blog',
    ind_alt_short_val:'Price vs Est. Realized (Short)', ind_alt_short_ath:'ATH Proximity — Overheat',
    ind_rsi:'RSI (14d)', ind_vol_change:'Volume Acceleration (15m vs 1h/4h)', ind_btc_corr_tech:'BTC Correlation (30d)',
    ind_buy_pressure:'Live Buy-Led Volume — FOMO', ind_sell_pressure:'Live Sell-Led Volume — Capitulation',
    desc_buy_pressure:`Share of the most recent 15-minute candles' volume driven by aggressive buying. A high ratio (65%+) combined with a volume spike and a green candle can signal FOMO-driven overheating near a local top. Uses 15-minute data instead of daily, so it reflects conditions almost in real time (15min–1hr lag vs. up to 24hr for daily volume).`,
    desc_sell_pressure:`Share of the most recent 15-minute candles' volume driven by aggressive selling. A high ratio (58%+) combined with a volume spike and a red candle can signal capitulation selling that often precedes a reversal near a local bottom. Uses 15-minute data instead of daily, so it reflects conditions almost in real time.`,
    desc_rsi:`Relative Strength Index over 14 days, a momentum oscillator measuring the speed and magnitude of recent price changes. RSI below 30 indicates oversold conditions (often a bottom signal), while RSI above 70 indicates overbought conditions (often a top signal). Applies equally to all coins since it's purely price-based.`,
    desc_vol_change:`Compares the most recent 15-minute candle's volume to the 1-hour and 4-hour averages. A large spike combined with a price near a low can signal capitulation selling that often precedes a reversal. A spike near a high can signal distribution by large holders. Using 15-minute data instead of daily reflects conditions almost in real time.`,
    desc_btc_corr_tech:`Pearson correlation coefficient between this coin's daily returns and Bitcoin's over the past 30 days. A low correlation (below 0.5) suggests the coin is moving independently of BTC, which can indicate coin-specific strength or weakness rather than broad market movement.`,
    desc_alt_short_val:`Estimated overvaluation indicator for altcoins in SHORT mode. Measures how far the current price sits above the estimated realized price — the higher above, the more overheated and SHORT-favorable. ⚠️ Realized price is an estimate, not live on-chain data.`,
    desc_alt_short_ath:`Distance from all-time high (ATH), used as an overheat signal for altcoin SHORT timing. Being close to ATH (within -15%) historically coincides with local tops and increased SHORT favorability.`,
    ind_btc_corr:'BTC Dominance — Alt Cycle', desc_btc_corr:`Tracks Bitcoin's market cap dominance as a proxy for the broader altcoin cycle position. When BTC dominance is high (55%+), capital is concentrated in Bitcoin and altcoins tend to underperform — often a sign the alt cycle hasn't started yet. When dominance falls (below 50%), capital rotates into altcoins, historically associated with "alt season."`,
    desc_alt_valuation:`Estimated valuation indicator for altcoins. Unlike BTC/ETH/BNB, this coin does not have reliable on-chain MVRV Z-Score data available, so we use price vs. an estimated realized price as a proxy.

⚠️ Important: the estimated realized price for this coin is approximated using the 200-week moving average (200W MA), not live on-chain data. The 200W MA is a widely-used proxy that tracks on-chain realized price closely, but differs from precise on-chain data. Use as a directional signal only.

Below estimated realized price = potential undervaluation zone.`,
    desc_alt_drawdown:`Distance from all-time high (ATH), used as a substitute for NUPL on altcoins without reliable on-chain profit/loss data.

Deep drawdowns (70%+) from ATH have historically coincided with cycle bottoms for major altcoins, though this varies significantly by coin.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Futures-Spot Gap',
    ind_cbp:'Coinbase Premium', ind_lth:'LTH Supply %', ind_dom:'BTC Dominance',
    ind_halving:'Halving Cycle',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Greed Level',
    ind_sell_funding:'Futures Premium', ind_sell_fg:'LTH-STH SOPR Spread',
    desc_sell_fg:`LTH-STH SOPR Spread measures the gap between long-term and short-term holder profit-taking behavior.
A large positive spread means short-term holders are realizing profits much faster than long-term holders — an early sign of distribution.

SHORT zone: spread ≥ 0.15 (STH selling aggressively while LTH holds)
Safe zone: spread ≤ 0.02 (aligned behavior, no distribution signal)

Current: STH realizing significant profit relative to LTH → distribution may be starting.`,
    ind_sell_sopr:'STH-SOPR — Profit Taking', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ON-CHAIN VALUATION', sec_miner:'MINER / SENTIMENT',
    sec_inst:'INSTITUTIONAL FLOW', sec_cycle:'CYCLE POSITION',
    sec_breakdown:'Score Breakdown', sec_triggers:'Next Level Triggers',
    sec_sellTriggers:'Sell Signal Triggers', sec_macro:'MACRO WARNINGS',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'ALL →', loadingInsights:'Loading...', loadMoreInsights:'Load More', collapseInsights:'Collapse',
    sec_history:'Score History', sec_histSub:'Saved locally in browser',
    histH:'Hour', histD:'Day', histM:'Month',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score measures how overvalued or undervalued Bitcoin is relative to its realized value. \n• < 0: Historically undervalued (bottom zone) → Strong buy\n• 0~1: Slightly undervalued → Accumulation zone  \n• 1~3: Fair value → Neutral\n• > 3: Overvalued (top zone) → Consider selling\nCurrent phase: 0.27 — Near bottom. Historically, values under 0.5 have preceded major bull runs.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) shows the overall profit/loss state of all BTC holders.\n• < 0% (Capitulation): Holders in loss → Extreme buy signal\n• 0~25% (Hope/Fear): Recovering from bottom → Buy zone  \n• 25~50% (Optimism): Mid-cycle → Neutral\n• 50~75% (Belief/Greed): Late cycle → Watch\n• > 75% (Euphoria): Peak greed → Sell signal",
    desc_realized:"Shows how far the current price is from the average cost basis of all BTC holders (Realized Price).\n• Below 0%: Price below average cost → Panic zone, strongest buy\n• 0~5%: Near realized price → Ideal entry\n• 5~20%: Moderate premium → Acceptable\n• > 20%: High premium → Caution",
    desc_hash:"Hash Ribbon tracks Bitcoin mining hashrate momentum (30-day vs 60-day moving average).\n• Capitulation: Weak miners shutting down (30MA < 60MA) → Bottom forming\n• Recovery Cross: 30MA crosses above 60MA → Most reliable leading buy signal (2~4 weeks ahead)\nHistorical accuracy: Perfectly timed 2016, 2018, 2020, 2022 bottoms.",
    desc_sopr:"Short-Term Holder SOPR measures if recent buyers are selling at profit or loss.\n• < 0.95: Panic selling at heavy losses → Capitulation = buy signal\n• 0.95~1.0: Mild loss realization → Near bottom\n• 1.0~1.03: Neutral profit taking\n• > 1.05: Strong profit taking → Distribution = top signal",
    desc_funding:"Futures-Spot Gap = (Futures Mark Price - Spot Index Price) / Spot Price\nShows real-time leverage positioning without the 8-hour settlement delay.\n• Negative (backwardation): Futures cheaper than spot → Short overload → Leading buy signal\n• ±0.01%: Neutral (normal range for BTC)\n• > 0.05%: Contango → Long overload → Caution\n• > 0.15%: Extreme contango → Top signal",
    desc_cbp:"Coinbase Premium = (Coinbase BTC Price - Binance BTC Price) / Binance Price\nReflects US institutional demand in real-time. Leads ETF flow data by 2~3 days.\n• Positive: US institutions buying → Bullish\n• Near zero: Watching/neutral\n• Negative: Institutions on sideline → Bearish for short-term\nCurrent: Negative (46+ consecutive days) → Institutions waiting for macro clarity.",
    desc_lth:"Long-Term Holder Supply % = percentage of BTC supply held by addresses inactive 155+ days.\n• > 75%: Whales in aggressive accumulation → Strong buy signal\n• 70~75%: Normal accumulation\n• < 70%: Distribution (whales selling)\nRecord levels (79%) mean the smart money is not selling — supply shock incoming when demand returns.",
    desc_dom:"BTC Dominance = BTC market cap / Total crypto market cap\nRises when capital flows from altcoins to Bitcoin — typical pattern before major bull runs.\n• 55~63% (CoinGecko basis): BTC season → Capital consolidating into BTC → Buy zone\n• < 50%: Alt season → Risk on\n• > 65%: Extreme BTC dominance → May signal alt rotation incoming",
    desc_halving:"Bitcoin halvings cut mining rewards by 50% every ~4 years, creating supply shocks.\nHistorical bottom timing:\n• 2015 bottom: 18 months before 2016 halving\n• 2018 bottom: 17 months before 2020 halving  \n• 2022 bottom: 17 months before 2024 halving\n• Current: ~22 months before April 2028 halving → In the core bottom window.",
    // Alert labels
    alertTitle:'Alert Settings',
    alertDesc:'Get notified via browser push notification + visual flash + sound when conditions are met.',
    alertBuySection:'📈 LONG TRIGGERS', alertSellSection:'📉 SHORT TRIGGERS',
    a2:'Long Score ≥ 6.0 (Start splitting)',
    a3:'Long Score ≥ 7.0 (Increase position)', a4:'Long Score ≥ 8.0 (Aggressive buy)',
    a5:'MVRV Z ≤ 0 — Full bottom zone', a6:'NUPL below 0% — Capitulation',
    a7:'Futures gap turns negative (backwardation)', a8:'Hash Ribbon recovery cross',
    a9:'Coinbase Premium turns positive',
    b1:'Short Score ≥ 6.0 (Prepare short)', b2:'Short Score ≥ 7.0 (Increase short)',
    b3:'Short Score ≥ 8.0 (Full short)', b4:'MVRV Z ≥ 3.5 — Euphoria zone',
    b5:'NUPL ≥ 75% — Extreme greed', b6:'Fear & Greed ≥ 80',
    b7:'Futures contango ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alert when price drops below $', priceAbove:'Alert when price rises above $',
    enableNotif:'Enable Browser Notifications',
    ind_sell_lth:'LTH Supply — Distribution', ind_sell_dom:'BTC Dom — Risk',
    ind_sell_halving:'Halving — Cycle Phase', ind_sell_ath:'ATH Proximity — Top Risk',
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Greed',
    ind_sell_funding:'Futures Premium', ind_sell_fg:'LTH-STH SOPR Spread',
    desc_sell_fg:`LTH-STH SOPR Spread measures the gap between long-term and short-term holder profit-taking behavior.
A large positive spread means short-term holders are realizing profits much faster than long-term holders — an early sign of distribution.

SHORT zone: spread ≥ 0.15 (STH selling aggressively while LTH holds)
Safe zone: spread ≤ 0.02 (aligned behavior, no distribution signal)

Current: STH realizing significant profit relative to LTH → distribution may be starting.`,
    ind_sell_sopr:'STH-SOPR — Profit Taking', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  ja: {
    exchBannerT:"取引所はどこで始める?", exchBannerD:"Binance・Bybit比較 + 手数料割引",
    // NAV
    navInsights:'ブログ',
    footerPrivacy:'プライバシーポリシー', footerTerms:'利用規約', footerDisclaimer:'投資助言ではありません',
    whyBtnLabel:'理由?', whyTopTitle:'寄与度が高い指標', whyBottomTitle:'足を引っ張る指標', histToday:'今日', histYesterday:'昨日', histWeekAgo:'先週',
    buyTiming:'📈 ロング タイミング', sellTiming:'📉 ショート タイミング',
    livePriceLabel:'現在価格 · Binance', fgLabel:'恐怖・強欲指数',
    rpLabel:'実現価格乖離率', maLabel:'200週移動平均線 (参考)',
    splitPlan:'分割エントリー計画', splitTitle:'段階別配分',
    splitStep1:(s)=>`今すぐ (スコア${s})`, splitStep2:'Hash Ribbon 回復転換',
    splitStep3:'Coinbase プレミアム → プラス転換', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'更新日時',
    // Mode labels
    modeTitle_buy:'ロング エントリースコア', modeTitle_sell:'売り圧力ゲージ',
    modeSub_buy:'サイクル底値ロングエントリーモデル', modeSub_sell:'ショートエントリータイミングモデル',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ 売りスコアの見方',
    sellExplain_low:'🟢 低 (0~3): 市場は底値圏。決済/ショートシグナルなし。保有または買い増し。',
    sellExplain_mid:'🟡 中 (4~6): 市場が過熱し始めています。一部利確を検討。',
    sellExplain_high:'🔴 高 (7~10): 強い売りシグナル。ロング決済 / ショートエントリー検討。',
    longExitLabel:'ロング決済', shortEntryLabel:'ショートエントリーシグナル',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Zスコア', ind_nupl:'NUPL', ind_realized:'実現価格乖離率',
    ind_alt_valuation:'価格 vs 推定実現価格 (200W MA)', ind_alt_drawdown:'ATH比下落率',
    tab_dashboard:'リアルタイム', tab_coins:'コイン', tab_blog:'ブログ',
    ind_alt_short_val:'価格 vs 推定実現価格 (ショート)', ind_alt_short_ath:'ATH近接度 — 過熱',
    ind_rsi:'RSI (14日)', ind_vol_change:'出来高変化率 (15分足 vs 1h/4h)', ind_btc_corr_tech:'BTC相関係数 (30日)',
    ind_buy_pressure:'リアルタイム買い主導出来高 — FOMO/過熱', ind_sell_pressure:'リアルタイム売り主導出来高 — Capitulation',
    desc_buy_pressure:`直近の15分足の出来高のうち、買い注文が主導した割合です。65%以上 + 出来高急増 + 陽線が重なると、局所的な高値圏でのFOMO過熱買いを示唆する場合があります。日足の代わりに15分足を使用するため、ほぼリアルタイム(15分〜1時間の遅延、日足は最大24時間)で反映されます。`,
    desc_sell_pressure:`直近の15分足の出来高のうち、売り注文が主導した割合です。58%以上 + 出来高急増 + 陰線が重なると、局所的な安値圏でのキャピチュレーション(投げ売り)後の反発が続くことが多いです。日足の代わりに15分足を使用するため、ほぼリアルタイムで反映されます。`,
    desc_rsi:`14日間の相対力指数(RSI)で、直近の価格変動の速度と強さを測るモメンタム指標です。RSI 30以下は売られすぎ(通常は底値シグナル)、70以上は買われすぎ(通常は天井シグナル)を意味します。純粋に価格ベースのため、全てのコインに同様に適用できます。`,
    desc_vol_change:`直近の15分足の出来高を1時間・4時間平均と比較します。安値圏で出来高が急増すると投げ売り後の反発が続くことが多く、高値圏での急増は大口保有者による分配(売却)を示唆する場合があります。日足の代わりに15分足を使用し、ほぼリアルタイムで反映されます。`,
    desc_btc_corr_tech:`過去30日間のこのコインの日次リターンとビットコインのリターンとの間のピアソン相関係数です。相関係数が低いほど(0.5以下)、このコインがBTCと独立して動いていることを意味し、コイン固有の強さ・弱さを示唆する場合があります。`,
    desc_alt_short_val:`ショートモード用のアルトコイン割高推定指標です。現在価格が推定実現価格をどれだけ上回っているかを測定し、乖離が大きいほど過熱しておりショートに有利です。⚠️ 実現価格はリアルタイムのオンチェーンデータではなく推定値です。`,
    desc_alt_short_ath:`史上最高値(ATH)からの距離で、アルトコインのショートタイミングにおける過熱シグナルとして使用します。ATHに近いほど(−15%以内)歴史的に局所的な天井と重なり、ショートに有利です。`,
    ind_btc_corr:'BTCドミナンス — アルトサイクル', desc_btc_corr:`ビットコインの時価総額ドミナンスを、アルトコインサイクルの位置を示す代理指標として活用します。BTCドミナンスが高いとき(55%以上)は資金がビットコインに集中し、アルトコインが軟調な傾向があり、通常はアルトサイクルがまだ始まっていないシグナルです。ドミナンスが下落すると(50%以下)資金がアルトコインに移動し、歴史的に「アルトシーズン」と関連付けられます。`,
    desc_alt_valuation:`アルトコイン向けの推定バリュエーション指標です。BTC/ETH/BNBと異なり、このコインには信頼できるオンチェーンMVRV Zスコアデータがないため、現在価格と推定実現価格の比較を代替指標として使用します。

⚠️ 重要: このコインの推定実現価格はリアルタイムのオンチェーンデータではなく、200週移動平均(200W MA)で近似した値です。200W MAはオンチェーン実現価格に近い動きをする広く使われるプロキシですが、精密なオンチェーンデータとは異なります。方向性の参考としてのみ活用してください。

推定実現価格以下 = 割安の可能性がある水準。`,
    desc_alt_drawdown:`オンチェーンの損益データが不足しているアルトコインでNUPLの代替指標として使用する、ATH(史上最高値)からの下落率です。

主要アルトコインは歴史的にATH比70%以上の下落でサイクル底値と重なることが多いですが、コインごとの差が大きい場合があります。`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'先物-現物ギャップ',
    ind_cbp:'Coinbaseプレミアム', ind_lth:'LTH供給比率', ind_dom:'BTCドミナンス',
    ind_halving:'半減期サイクル',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — 過熱ゲージ', ind_sell_nupl:'NUPL — 強欲レベル',
    ind_sell_funding:'先物プレミアム', ind_sell_fg:'LTH-STH SOPR格差',
    desc_sell_fg:`LTH-STH SOPR格差は、長期保有者と短期保有者の利益確定行動の違いを測定します。
格差が大きくプラスの場合、短期保有者が長期保有者よりもはるかに速いペースで利益確定中 = 分配(売却)の初期シグナル。

ショート圏: 格差 ≥ 0.15 (短期は積極的に売却、長期は保有継続)
安全圏: 格差 ≤ 0.02 (行動が一致、分配シグナルなし)

現在: 短期保有者が長期保有者に比べ大きな利益を実現中 → 分配が始まる可能性。`,
    ind_sell_sopr:'STH-SOPR — 利益確定', ind_sell_cbp:'Coinbaseプレミアム — FOMO',
    // Section headers
    sec_onchain:'オンチェーン バリュエーション', sec_miner:'マイナー / センチメント',
    sec_inst:'機関資金フロー (先行)', sec_cycle:'サイクル位置',
    sec_breakdown:'スコア内訳', sec_triggers:'次段階トリガー',
    sec_sellTriggers:'売りシグナルトリガー', sec_macro:'マクロ警告',
    sec_insights:'ブログ', sec_insights2:'ブログ', viewAllInsights:'全て見る →', loadingInsights:'読み込み中...', loadMoreInsights:'もっと見る', collapseInsights:'閉じる',
    sec_history:'スコア履歴', sec_histSub:'ブラウザにローカル保存',
    histH:'時間別', histD:'日別', histM:'月別',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Zスコアは、ビットコインが実現価値に対してどれだけ割高・割安かを測定します。\n• 0以下: 歴史的に割安(底値圏) → 強力な買いシグナル\n• 0~1: やや割安 → 蓄積ゾーン\n• 1~3: 適正価値 → 中立\n• 3以上: 割高(天井圏) → 売却検討\n現在 0.27 — 底値に近い水準。歴史的に0.5以下から大型上昇が始まっています。",
    desc_nupl:"NUPL(未実現純損益)は、全BTC保有者の平均損益状況を示します。\n• 0%以下(キャピチュレーション): 保有者が損失中 → 極端な買いシグナル\n• 0~25%(希望・恐怖): 底値から回復中 → 買いゾーン\n• 25~50%(楽観): サイクル中盤 → 中立\n• 50~75%(強欲): サイクル後半 → 注視\n• 75%以上(陶酔): 極端な強欲 → 売りシグナル",
    desc_realized:"現在価格が全BTC保有者の平均取得原価(実現価格)からどれだけ乖離しているかを示します。\n• 0%以下: 平均原価以下 → パニックゾーン、最強の買い\n• 0~5%: 実現価格付近 → 理想的なエントリー\n• 5~20%: 適度なプレミアム → 許容範囲\n• 20%以上: 高いプレミアム → 注意",
    desc_hash:"Hash Ribbonはビットコインのマイニングハッシュレートのモメンタム(30日 vs 60日移動平均)を追跡します。\n• キャピチュレーション: 弱小マイナーが停止中 → 底値形成中\n• 回復転換: 30日MAが60日MAを上抜け → 最も信頼性の高い先行買いシグナル(2~4週間先行)\n過去の的中率: 2016・2018・2020・2022年の底値を正確に捉えています。",
    desc_sopr:"短期保有者SOPR — 直近の買い手が利益確定・損切りのどちらで売っているかを測定します。\n• 0.95以下: パニック損切り → キャピチュレーション = 買いシグナル\n• 0.95~1.0: 小幅な損失確定 → 底値付近\n• 1.0~1.03: 小幅な利益確定 → 中立\n• 1.05以上: 強い利益確定 → 分配 = 天井シグナル",
    desc_funding:"先物-現物ギャップ = (先物マーク価格 - 現物インデックス価格) / 現物価格\n8時間の精算遅延なしに、リアルタイムでレバレッジの偏りを捉えます。\n• マイナス(逆プレミアム): 先物が現物より安い → ショート過多 → 先行買いシグナル\n• ±0.01%: 中立(BTCの正常範囲)\n• 0.05%以上: コンタンゴ → ロング過多 → 注意\n• 0.15%以上: 極端なコンタンゴ → 天井シグナル",
    desc_cbp:"Coinbaseプレミアム = (Coinbase価格 - Binance価格) / Binance価格\n米国機関の需要をリアルタイムで反映。ETF資金フローデータより2~3日先行します。\n• プラス: 米国機関が買い中 → 強気\n• ゼロ付近: 様子見/中立\n• マイナス: 機関が様子見 → 短期的に弱気\n現在: マイナス(46日以上連続) → 米国機関がマクロの明確化を待っている状態。",
    desc_lth:"長期保有者供給比率 = 155日以上未移動のアドレスが保有するBTCの割合\n• 75%以上: クジラが積極的に蓄積中 → 強力な買いシグナル\n• 70~75%: 通常の蓄積\n• 70%以下: 分配(クジラが売却中)\n現在79%(過去最高) — スマートマネーは売っていません。需要回復時に供給ショックが予想されます。",
    desc_dom:"BTCドミナンス = BTC時価総額 / 暗号資産全体の時価総額\nアルトコインからビットコインへ資金が移動すると上昇 — 大型上昇相場前の典型的なパターンです。\n• 55~63%(CoinGecko基準): BTCシーズン → 資本がBTCに集中 → 買いゾーン\n• 50%以下: アルトシーズン → リスクオン\n• 65%以上: 極端なBTC支配 → アルトへのローテーションが近い可能性",
    desc_halving:"ビットコインの半減期は約4年ごとにマイニング報酬を50%削減し、供給ショックを生み出します。\n過去の底値タイミング:\n• 2015年の底値: 2016年半減期の18ヶ月前\n• 2018年の底値: 2020年半減期の17ヶ月前\n• 2022年の底値: 2024年半減期の17ヶ月前\n• 現在: 2028年4月の半減期まで約22ヶ月 → コア底値ゾーン内。",
    // Alert labels
    alertTitle:'アラート設定',
    alertDesc:'条件達成時にブラウザプッシュ通知 + 画面フラッシュ + サウンドでお知らせします。',
    alertBuySection:'📈 ロング トリガー', alertSellSection:'📉 ショート トリガー',
    a2:'ロングスコア ≥ 6.0 (分割開始)',
    a3:'ロングスコア ≥ 7.0 (ポジション拡大)', a4:'ロングスコア ≥ 8.0 (積極買い)',
    a5:'MVRV Z ≤ 0 — 完全な底値圏', a6:'NUPL 0%以下 — キャピチュレーション',
    a7:'先物ギャップがマイナスに転換(逆プレミアム)', a8:'Hash Ribbon 回復転換',
    a9:'Coinbaseプレミアムがプラスに転換',
    b1:'ショートスコア ≥ 6.0 (ショート準備)', b2:'ショートスコア ≥ 7.0 (ショート拡大)',
    b3:'ショートスコア ≥ 8.0 (フルショート)', b4:'MVRV Z ≥ 3.5 — 陶酔ゾーン',
    b5:'NUPL ≥ 75% — 極端な強欲', b6:'恐怖・強欲指数 ≥ 80',
    b7:'先物コンタンゴ ≥ 0.15%', b8:'Coinbaseプレミアム ≥ 0.3% — FOMO',
    priceBelow:'価格が$以下に下落したら通知', priceAbove:'価格が$以上に上昇したら通知',
    enableNotif:'ブラウザ通知を有効化',
    ind_sell_lth:'LTH供給 — 分配検知', ind_sell_dom:'BTCドミナンス — リスク',
    ind_sell_halving:'半減期 — サイクル位置', ind_sell_ath:'ATH近接度 — 天井リスク',
    ind_sell_mvrv:'MVRV Z — 過熱ゲージ', ind_sell_nupl:'NUPL — 強欲レベル',
    ind_sell_funding:'先物プレミアム', ind_sell_fg:'LTH-STH SOPR格差',
    ind_sell_sopr:'STH-SOPR — 利益確定', ind_sell_cbp:'Coinbaseプレミアム — FOMO',
  },

  ko: {
    exchBannerT:"거래소, 어디서 시작할까?", exchBannerD:"바이낸스·바이비트 비교 + 수수료 할인",
    navInsights:'블로그',
    footerPrivacy:'개인정보처리방침', footerTerms:'이용약관', footerDisclaimer:'투자 조언이 아닙니다',
    whyBtnLabel:'왜?', whyTopTitle:'점수를 끌어올린 지표', whyBottomTitle:'점수를 끌어내린 지표', histToday:'오늘', histYesterday:'어제', histWeekAgo:'지난주',
    buyTiming:'📈 롱 타이밍', sellTiming:'📉 매도/청산 타이밍',
    livePriceLabel:'현재가 · 바이낸스', fgLabel:'공포·탐욕 지수',
    rpLabel:'실현가 이격률', maLabel:'200주 이평선 (참고)',
    splitPlan:'단계별 진입 계획', splitTitle:'단계별 비중 배분',
    splitStep1:(s)=>`지금 진입 (${s}점)`, splitStep2:'Hash Ribbon 회복 전환',
    splitStep3:'Coinbase Premium 양전환', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'업데이트',
    modeTitle_buy:'롱 진입 점수', modeTitle_sell:'숏 타이밍 게이지',
    modeSub_buy:'사이클 저점 롱 진입 모델', modeSub_sell:'숏 진입 타이밍 모델',
    sellExplainTitle:'ℹ️ 매도 점수 해석 방법',
    sellExplain_low:'🟢 낮음 (0~3점): 시장이 저점 구간. 청산/숏 신호 없음. 보유 또는 매집.',
    sellExplain_mid:'🟡 중간 (4~6점): 시장 과열 시작. 일부 비중 축소 검토.',
    sellExplain_high:'🔴 높음 (7~10점): 강한 매도 신호. 장기 보유 청산 / 숏 진입 검토.',
    longExitLabel:'장기 보유 청산', shortEntryLabel:'숏 진입 신호',
    ind_mvrv_z:'MVRV Z 스코어', ind_nupl:'NUPL', ind_realized:'실현가 이격률',
    ind_alt_valuation:'가격 vs 추정 실현가 (200주 MA)', ind_alt_drawdown:'ATH 대비 낙폭',
    tab_dashboard:'실시간 지표', tab_coins:'코인', tab_blog:'블로그',
    ind_alt_short_val:'가격 vs 추정 실현가 (숏)', ind_alt_short_ath:'ATH 근접도 — 과열',
    ind_rsi:'RSI (14일)', ind_vol_change:'거래량 가속도 (15분봉 vs 1h/4h)', ind_btc_corr_tech:'BTC 상관계수 (30일)',
    ind_buy_pressure:'실시간 매수 주도 거래량 — FOMO/과열', ind_sell_pressure:'실시간 매도 주도 거래량 — Capitulation',
    desc_buy_pressure:`최근 15분봉 거래량 중 매수 주도 비중입니다. 65% 이상 + 거래량 급증 + 양봉이 겹치면 국소 고점 근처에서 FOMO 과열 매수를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간(15분~1시간 지연, 일봉은 최대 24시간)으로 반영됩니다.`,
    desc_sell_pressure:`최근 15분봉 거래량 중 매도 주도 비중입니다. 58% 이상 + 거래량 급증 + 음봉이 겹치면 국소 저점 근처에서 항복 매도(캐피틀레이션) 후 반등이 따라오는 경우가 많습니다. 일봉 대신 15분봉을 사용해 거의 실시간으로 반영됩니다.`,
    desc_rsi:`14일 기준 상대강도지수(RSI)로, 최근 가격 변화의 속도와 강도를 측정하는 모멘텀 지표입니다. RSI 30 이하는 과매도(보통 저점 신호), 70 이상은 과매수(보통 고점 신호)를 의미합니다. 순수 가격 기반이라 모든 코인에 동일하게 적용 가능합니다.`,
    desc_vol_change:`최근 15분봉 거래량을 1시간·4시간 평균과 비교합니다. 저점 근처에서 거래량이 급증하면 항복 매도 후 반등이 따라오는 경우가 많고, 고점 근처에서의 급증은 대형 보유자의 분배(매도)를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간으로 반영됩니다.`,
    desc_btc_corr_tech:`최근 30일간 이 코인의 일간 수익률과 비트코인 수익률 간 피어슨 상관계수입니다. 상관계수가 낮을수록(0.5 이하) 이 코인이 BTC와 독립적으로 움직인다는 뜻이며, 코인 고유의 강세/약세를 시사할 수 있습니다.`,
    desc_alt_short_val:`숏 모드용 알트코인 고평가 추정 지표입니다. 현재가가 추정 실현가보다 얼마나 높은지 측정하며, 갭이 클수록 과열되어 숏에 유리합니다. ⚠️ 실현가는 실시간 온체인 데이터가 아닌 추정치입니다.`,
    desc_alt_short_ath:`역대 최고가(ATH) 대비 거리로, 알트코인 숏 타이밍의 과열 신호로 사용합니다. ATH에 근접할수록(−15% 이내) 역사적으로 국지적 고점과 겹치며 숏에 유리합니다.`,
    ind_btc_corr:'BTC 도미넌스 — 알트 사이클', desc_btc_corr:`비트코인 시가총액 도미넌스를 알트코인 사이클 위치의 대리 지표로 활용합니다. BTC 도미넌스가 높을 때(55% 이상)는 자금이 비트코인에 집중되어 알트코인이 부진한 경향이 있고, 이는 보통 알트 사이클이 아직 시작되지 않았다는 신호입니다. 도미넌스가 하락하면(50% 이하) 자금이 알트코인으로 이동하며, 역사적으로 '알트 시즌'과 연관됩니다.`,
    desc_alt_valuation:`알트코인용 추정 밸류에이션 지표입니다. BTC/ETH/BNB와 달리 이 코인은 신뢰할 수 있는 온체인 MVRV Z-Score 데이터가 없어, 현재가 대비 추정 실현가를 대체 지표로 사용합니다.

⚠️ 중요: 이 코인의 추정 실현가는 실시간 온체인 데이터가 아니라 200주 이동평균(200W MA)으로 근사한 값입니다. 200주 MA는 온체인 실현가와 비슷하게 움직이는 널리 쓰이는 프록시지만, 정밀한 온체인 실현가와는 다릅니다. 방향성 참고용으로만 활용하세요.

추정 실현가(200주 MA) 이하 = 저평가 가능 구간.`,
    desc_alt_drawdown:`온체인 손익 데이터가 부족한 알트코인에서 NUPL 대체 지표로 사용하는 ATH(역대 최고가) 대비 낙폭입니다.

주요 알트코인은 역사적으로 ATH 대비 70% 이상 하락 시 사이클 저점과 겹치는 경우가 많았으나, 코인별 편차가 클 수 있습니다.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'선물-현물 갭',
    ind_cbp:'코인베이스 프리미엄', ind_lth:'LTH 공급 비중', ind_dom:'BTC 도미넌스',
    ind_halving:'반감기 사이클',
    ind_sell_mvrv:'MVRV Z — 과열 게이지', ind_sell_nupl:'NUPL — 탐욕 수준',
    ind_sell_funding:'선물 프리미엄', ind_sell_fg:'LTH-STH SOPR 격차',
    desc_sell_fg:`LTH-STH SOPR 격차는 장기 보유자와 단기 보유자의 수익실현 행동 차이를 측정합니다.
격차가 크게 양수면 단기 보유자가 장기 보유자보다 훨씬 빠르게 수익을 실현 중 = 분산(매도) 초기 신호.

숏 구간: 격차 ≥ 0.15 (단기는 적극 매도, 장기는 보유 유지)
안전 구간: 격차 ≤ 0.02 (행동 일치, 분산 신호 없음)

현재: 단기 보유자가 장기 보유자 대비 상당한 수익을 실현 중 → 분산 시작 가능성.`,
    ind_sell_sopr:'STH-SOPR — 수익 실현', ind_sell_cbp:'코인베이스 프리미엄 — FOMO',
    sec_onchain:'온체인 밸류에이션', sec_miner:'채굴자 / 심리',
    sec_inst:'기관 수급 (선행)', sec_cycle:'사이클 위치',
    sec_breakdown:'점수 합산', sec_triggers:'다음 단계 트리거',
    sec_sellTriggers:'매도 신호 트리거', sec_macro:'매크로 경고등',
    sec_insights:'블로그', sec_insights2:'블로그', viewAllInsights:'전체 →', loadingInsights:'불러오는 중...', loadMoreInsights:'더 보기', collapseInsights:'접기',
    sec_history:'점수 히스토리', sec_histSub:'브라우저에 로컬 저장',
    histH:'시간별', histD:'일별', histM:'월별',
    desc_mvrv_z:"MVRV Z Score는 비트코인이 실현 가치 대비 얼마나 고평가/저평가됐는지 측정합니다.\n• 0 이하: 역사적 저평가 (저점 구간) → 강력 매수\n• 0~1: 약간 저평가 → 축적 구간\n• 1~3: 적정 가치 → 중립\n• 3 이상: 고평가 (고점 구간) → 매도 고려\n현재 0.27 — 저점 근접. 역사적으로 0.5 이하에서 대형 상승이 시작됐습니다.",
    desc_nupl:"NUPL(미실현 순손익)은 전체 BTC 보유자들의 평균 손익 상태를 보여줍니다.\n• 0% 이하 (항복): 보유자 손실 → 극단 매수 신호\n• 0~25% (희망/공포): 저점 회복 중 → 매수 구간\n• 25~50% (낙관): 사이클 중반 → 중립\n• 50~75% (탐욕): 후기 사이클 → 주시\n• 75% 이상 (도취): 극단 탐욕 → 매도 신호",
    desc_realized:"현재 가격이 전체 BTC 보유자의 평균 취득 원가(실현가) 대비 얼마나 떨어져 있는지 보여줍니다.\n• 0% 이하: 평균 원가 이하 → 패닉 구간, 최강 매수\n• 0~5%: 실현가 근처 → 이상적 진입\n• 5~20%: 적당한 프리미엄 → 수용 가능\n• 20% 이상: 높은 프리미엄 → 주의",
    desc_hash:"Hash Ribbon은 비트코인 채굴 해시레이트 모멘텀(30일 vs 60일 이평)을 추적합니다.\n• 캐피튤레이션: 약한 채굴자 가동 중단 → 저점 형성 중\n• 회복 전환: 30일 MA가 60일 MA 상향 돌파 → 가장 신뢰도 높은 선행 매수 신호 (2~4주 선행)\n역사적 정확도: 2016, 2018, 2020, 2022년 저점 모두 정확히 포착.",
    desc_sopr:"단기 보유자 SOPR — 최근 매수자들이 수익인지 손실인지로 매도하는지 측정합니다.\n• 0.95 이하: 패닉 손절 → 캐피튤레이션 = 매수 신호\n• 0.95~1.0: 소폭 손실 실현 → 저점 근처\n• 1.0~1.03: 소폭 수익 실현 → 중립\n• 1.05 이상: 강한 수익 실현 → 분산 = 고점 신호",
    desc_funding:"선물-현물 갭 = (선물 마크가격 - 현물 인덱스가격) / 현물가격\n8시간 정산 딜레이 없이 실시간으로 레버리지 쏠림을 포착합니다.\n• 음수 (역프리미엄): 선물이 현물보다 낮음 → 숏 과부하 → 선행 매수 신호\n• ±0.01%: 중립 (BTC 정상 범위)\n• 0.05% 이상: 콘탱고 → 롱 과부하 → 주의\n• 0.15% 이상: 극단 콘탱고 → 고점 신호",
    desc_cbp:"코인베이스 프리미엄 = (코인베이스 가격 - 바이낸스 가격) / 바이낸스 가격\n미국 기관 수요를 실시간으로 반영. ETF 유입 데이터보다 2~3일 선행합니다.\n• 양수: 미국 기관 매수 중 → 강세\n• 0 근처: 관망/중립\n• 음수: 기관 관망 → 단기 약세\n현재: 음수 (46일+ 연속) → 미국 기관들이 매크로 명확성을 기다리는 중.",
    desc_lth:"장기 보유자 공급 비중 = 155일 이상 미이동 주소가 보유한 BTC 비율\n• 75% 이상: 고래들의 공격적 매집 → 강력 매수 신호\n• 70~75%: 일반적 매집\n• 70% 이하: 분산 (고래 매도 중)\n현재 79%(역대 최고치) — 스마트머니가 팔지 않음. 수요 회복 시 공급 충격 예상.",
    desc_dom:"BTC 도미넌스 = BTC 시총 / 전체 암호화폐 시총\n알트코인에서 비트코인으로 자금이 이동할 때 상승 — 대형 상승장 전 전형적 패턴입니다.\n• 55~63% (코인게코 기준): BTC 시즌 → 자본이 BTC에 집중 → 매수 구간\n• 50% 이하: 알트 시즌 → 리스크온\n• 65% 이상: 극단 BTC 지배 → 알트 로테이션 임박 가능",
    desc_halving:"비트코인 반감기는 약 4년마다 채굴 보상을 50% 줄여 공급 충격을 만듭니다.\n역사적 저점 타이밍:\n• 2015년 저점: 2016년 반감기 18개월 전\n• 2018년 저점: 2020년 반감기 17개월 전\n• 2022년 저점: 2024년 반감기 17개월 전\n• 현재: 2028년 4월 반감기까지 약 22개월 → 핵심 저점 구간.",
    alertTitle:'알림 설정',
    alertDesc:'조건 충족 시 브라우저 알림 + 화면 깜빡임 + 알림음으로 알려드립니다.',
    alertBuySection:'📈 롱 트리거', alertSellSection:'📉 숏 트리거',
    a2:'롱 점수 ≥ 6.0 (분할 시작)',
    a3:'롱 점수 ≥ 7.0 (비중 확대)', a4:'롱 점수 ≥ 8.0 (적극 매집)',
    a5:'MVRV Z ≤ 0 — 완전 저점 구간', a6:'NUPL 0% 이하 — 항복 구간',
    a7:'선물-현물 갭 음수 전환 (역프리미엄)', a8:'Hash Ribbon 회복 전환',
    a9:'코인베이스 프리미엄 양전환',
    b1:'숏 점수 ≥ 6.0 (숏 준비)', b2:'숏 점수 ≥ 7.0 (숏 비중 확대)',
    b3:'숏 점수 ≥ 8.0 (풀 숏)', b4:'MVRV Z ≥ 3.5 — 도취 구간',
    b5:'NUPL ≥ 75% — 극단 탐욕', b6:'공포·탐욕 지수 ≥ 80',
    b7:'선물 프리미엄 ≥ 0.15%', b8:'코인베이스 프리미엄 ≥ 0.3% — FOMO',
    priceBelow:'가격이 $ 이하 하락 시 알림', priceAbove:'가격이 $ 이상 상승 시 알림',
    enableNotif:'브라우저 알림 허용',
    
    // Short 모드 지표명
    ind_sell_mvrv:'MVRV Z — 과열 위치', ind_sell_nupl:'NUPL — 탐욕 수준',
    ind_sell_funding:'선물 프리미엄', ind_sell_fg:'LTH-STH SOPR 격차',
    desc_sell_fg:`LTH-STH SOPR 격차는 장기 보유자와 단기 보유자의 수익실현 행동 차이를 측정합니다.
격차가 크게 양수면 단기 보유자가 장기 보유자보다 훨씬 빠르게 수익을 실현 중 = 분산(매도) 초기 신호.

숏 구간: 격차 ≥ 0.15 (단기는 적극 매도, 장기는 보유 유지)
안전 구간: 격차 ≤ 0.02 (행동 일치, 분산 신호 없음)

현재: 단기 보유자가 장기 보유자 대비 상당한 수익을 실현 중 → 분산 시작 가능성.`,
    ind_sell_sopr:'STH-SOPR — 수익실현', ind_sell_cbp:'코인베이스 프리미엄 — FOMO',
    ind_sell_lth:'LTH 공급 — 분산 감지', ind_sell_dom:'BTC 도미넌스 — 리스크',
    ind_sell_halving:'반감기 — 사이클 위치', ind_sell_ath:'ATH 근접도 — 고점 리스크',
  },
  es: {
    exchBannerT:"¿Con qué exchange empezar?", exchBannerD:"Compara Binance y Bybit + descuento",
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Política de Privacidad', footerTerms:'Términos de Servicio', footerDisclaimer:'No es asesoramiento financiero',
    whyBtnLabel:'¿Por qué?', whyTopTitle:'Principales contribuyentes', whyBottomTitle:'Lo que frena', histToday:'Hoy', histYesterday:'Ayer', histWeekAgo:'Semana pasada',
    buyTiming:'📈 Timing LARGO', sellTiming:'📉 Timing CORTO',
    livePriceLabel:'Precio · Binance', fgLabel:'Miedo y Codicia',
    rpLabel:'Brecha del Precio Realizado', maLabel:'MA 200S (ref)',
    splitPlan:'Plan de Entrada Escalonada', splitTitle:'Asignación por Etapa',
    splitStep1:(s)=>`Ahora (Puntuación ${s})`, splitStep2:'Recuperación Hash Ribbon',
    splitStep3:'Coinbase Premium → Positivo', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Actualizado',
    // Mode labels
    modeTitle_buy:'PUNTUACIÓN DE TIMING LARGO', modeTitle_sell:'MEDIDOR DE PRESIÓN DE VENTA',
    modeSub_buy:'Modelo de entrada larga en suelo de ciclo', modeSub_sell:'Modelo de timing de entrada corta',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Cómo leer la Puntuación de Venta',
    sellExplain_low:'🟢 BAJA (0~3): Mercado en zona de suelo. Sin señal de salida. Mantener o acumular.',
    sellExplain_mid:'🟡 MEDIA (4~6): Mercado calentándose. Vigilar para reducción parcial.',
    sellExplain_high:'🔴 ALTA (7~10): Señal de venta fuerte. Salir de largo / Considerar entrada corta.',
    // Indicator names (buy)
    ind_mvrv_z:'Puntuación Z MVRV', ind_nupl:'NUPL', ind_realized:'Brecha del Precio Realizado',
    ind_alt_valuation:'Precio vs Realizado Est. (200W MA)', ind_alt_drawdown:'Caída desde ATH',
    tab_dashboard:'En vivo', tab_coins:'Monedas', tab_blog:'Blog',
    ind_alt_short_val:'Precio vs Realizado Est. (Corto)', ind_alt_short_ath:'Proximidad a ATH — Sobrecalentamiento',
    ind_rsi:'RSI (14d)', ind_vol_change:'Aceleración de Volumen (15m vs 1h/4h)', ind_btc_corr_tech:'Correlación con BTC (30d)',
    ind_buy_pressure:'Volumen en Vivo Liderado por Compra — FOMO', ind_sell_pressure:'Volumen en Vivo Liderado por Venta — Capitulación',
    desc_buy_pressure:`Proporción del volumen de las velas de 15 minutos más recientes impulsado por compras agresivas. Un ratio alto (65%+) combinado con un pico de volumen y una vela verde puede señalar sobrecalentamiento por FOMO cerca de un techo local. Usa datos de 15 minutos en lugar de diarios, reflejando condiciones casi en tiempo real (retraso de 15min–1h vs. hasta 24h para el volumen diario).`,
    desc_sell_pressure:`Proporción del volumen de las velas de 15 minutos más recientes impulsado por ventas agresivas. Un ratio alto (58%+) combinado con un pico de volumen y una vela roja puede señalar una venta de capitulación que a menudo precede a un rebote cerca de un suelo local. Usa datos de 15 minutos en lugar de diarios, reflejando condiciones casi en tiempo real.`,
    desc_rsi:`Índice de Fuerza Relativa a 14 días, un oscilador de momentum que mide la velocidad y magnitud de los cambios de precio recientes. RSI por debajo de 30 indica sobreventa (a menudo señal de suelo), mientras que por encima de 70 indica sobrecompra (a menudo señal de techo). Se aplica igual a todas las monedas ya que se basa puramente en el precio.`,
    desc_vol_change:`Compara el volumen de la vela de 15 minutos más reciente con los promedios de 1 hora y 4 horas. Un pico grande combinado con un precio cerca de un mínimo puede señalar una venta de capitulación que a menudo precede a un rebote. Un pico cerca de un máximo puede señalar distribución por parte de grandes tenedores. Usar datos de 15 minutos en lugar de diarios refleja condiciones casi en tiempo real.`,
    desc_btc_corr_tech:`Coeficiente de correlación de Pearson entre los retornos diarios de esta moneda y los de Bitcoin en los últimos 30 días. Una correlación baja (por debajo de 0.5) sugiere que la moneda se mueve independientemente de BTC, lo que puede indicar fortaleza o debilidad específica de la moneda en lugar de un movimiento amplio del mercado.`,
    desc_alt_short_val:`Indicador estimado de sobrevaloración para altcoins en modo CORTO. Mide cuánto está el precio actual por encima del precio realizado estimado — cuanto más alto, más sobrecalentado y favorable para CORTO. ⚠️ El precio realizado es una estimación, no datos on-chain en vivo.`,
    desc_alt_short_ath:`Distancia desde el máximo histórico (ATH), usado como señal de sobrecalentamiento para el timing CORTO de altcoins. Estar cerca del ATH (dentro de -15%) históricamente coincide con techos locales y mayor favorabilidad para CORTO.`,
    ind_btc_corr:'Dominancia BTC — Ciclo Alt', desc_btc_corr:`Rastrea la dominancia de capitalización de mercado de Bitcoin como proxy de la posición del ciclo alt más amplio. Cuando la dominancia BTC es alta (55%+), el capital se concentra en Bitcoin y las altcoins tienden a rendir menos — a menudo señal de que el ciclo alt aún no ha comenzado. Cuando la dominancia cae (por debajo de 50%), el capital rota hacia altcoins, históricamente asociado con la "temporada alt".`,
    desc_alt_valuation:`Indicador de valoración estimado para altcoins. A diferencia de BTC/ETH/BNB, esta moneda no tiene datos confiables de MVRV Z-Score on-chain disponibles, por lo que usamos precio vs. un precio realizado estimado como proxy.

⚠️ Importante: el precio realizado estimado de esta moneda se aproxima con la media móvil de 200 semanas (200W MA), no con datos on-chain en vivo. La 200W MA es un proxy ampliamente usado que sigue de cerca el precio realizado on-chain, pero difiere de los datos precisos. Úselo solo como señal direccional.

Por debajo del precio realizado estimado = posible zona de infravaloración.`,
    desc_alt_drawdown:`Distancia desde el máximo histórico (ATH), usado como sustituto de NUPL en altcoins sin datos confiables de ganancia/pérdida on-chain.

Las caídas profundas (70%+) desde el ATH han coincidido históricamente con suelos de ciclo para altcoins principales, aunque esto varía significativamente según la moneda.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Brecha Futuros-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Suministro LTH', ind_dom:'Dominancia BTC',
    ind_halving:'Ciclo de Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Sobrecalentamiento', ind_sell_nupl:'NUPL — Nivel de Codicia',
    ind_sell_funding:'Prima de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`El Spread SOPR LTH-STH mide la brecha entre el comportamiento de toma de ganancias de tenedores a largo y corto plazo.
Un spread positivo grande significa que los tenedores a corto plazo están realizando ganancias mucho más rápido que los de largo plazo — una señal temprana de distribución.

Zona CORTO: spread ≥ 0.15 (STH vendiendo agresivamente mientras LTH mantiene)
Zona segura: spread ≤ 0.02 (comportamiento alineado, sin señal de distribución)

Actual: STH realizando ganancias significativas en relación a LTH → la distribución puede estar comenzando.`,
    ind_sell_sopr:'STH-SOPR — Toma de Ganancias', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALORACIÓN ON-CHAIN', sec_miner:'MINERO / SENTIMIENTO',
    sec_inst:'FLUJO INSTITUCIONAL', sec_cycle:'POSICIÓN DEL CICLO',
    sec_breakdown:'Desglose de Puntuación', sec_triggers:'Próximos Disparadores',
    sec_sellTriggers:'Disparadores de Señal de Venta', sec_macro:'ADVERTENCIAS MACRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TODO →', loadingInsights:'Cargando...', loadMoreInsights:'Ver Más', collapseInsights:'Contraer',
    sec_history:'Historial de Puntuación', sec_histSub:'Guardado localmente en el navegador',
    histH:'Hora', histD:'Día', histM:'Mes',
    // Indicator detailed descriptions
    desc_mvrv_z:"La Puntuación Z MVRV mide cuán sobrevalorado o infravalorado está Bitcoin en relación a su valor realizado. \n• < 0: Históricamente infravalorado (zona de suelo) → Compra fuerte\n• 0~1: Ligeramente infravalorado → Zona de acumulación  \n• 1~3: Valor justo → Neutral\n• > 3: Sobrevalorado (zona de techo) → Considerar venta\nFase actual: 0.27 — Cerca del suelo. Históricamente, valores por debajo de 0.5 han precedido a grandes mercados alcistas.",
    desc_nupl:"NUPL (Ganancia/Pérdida Neta No Realizada) muestra el estado general de ganancia/pérdida de todos los tenedores de BTC.\n• < 0% (Capitulación): Tenedores en pérdida → Señal de compra extrema\n• 0~25% (Esperanza/Miedo): Recuperándose del suelo → Zona de compra  \n• 25~50% (Optimismo): Medio del ciclo → Neutral\n• 50~75% (Creencia/Codicia): Final del ciclo → Vigilar\n• > 75% (Euforia): Codicia máxima → Señal de venta",
    desc_realized:"Muestra cuán lejos está el precio actual de la base de costo promedio de todos los tenedores de BTC (Precio Realizado).\n• Por debajo de 0%: Precio bajo el costo promedio → Zona de pánico, compra más fuerte\n• 0~5%: Cerca del precio realizado → Entrada ideal\n• 5~20%: Prima moderada → Aceptable\n• > 20%: Prima alta → Precaución",
    desc_hash:"Hash Ribbon rastrea el momentum del hashrate de minería de Bitcoin (media móvil de 30 días vs 60 días).\n• Capitulación: Mineros débiles cerrando (30MA < 60MA) → Formándose un suelo\n• Cruce de Recuperación: 30MA cruza por encima de 60MA → Señal de compra líder más confiable (2~4 semanas de anticipación)\nPrecisión histórica: Marcó perfectamente los suelos de 2016, 2018, 2020 y 2022.",
    desc_sopr:"El SOPR de Tenedores a Corto Plazo mide si los compradores recientes están vendiendo con ganancia o pérdida.\n• < 0.95: Venta de pánico con pérdidas fuertes → Capitulación = señal de compra\n• 0.95~1.0: Realización leve de pérdidas → Cerca del suelo\n• 1.0~1.03: Toma de ganancias neutral\n• > 1.05: Toma de ganancias fuerte → Distribución = señal de techo",
    desc_funding:"Brecha Futuros-Spot = (Precio Marca Futuros - Precio Índice Spot) / Precio Spot\nMuestra el posicionamiento de apalancamiento en tiempo real sin el retraso de liquidación de 8 horas.\n• Negativo (backwardation): Futuros más baratos que spot → Sobrecarga de cortos → Señal de compra líder\n• ±0.01%: Neutral (rango normal para BTC)\n• > 0.05%: Contango → Sobrecarga de largos → Precaución\n• > 0.15%: Contango extremo → Señal de techo",
    desc_cbp:"Coinbase Premium = (Precio BTC Coinbase - Precio BTC Binance) / Precio Binance\nRefleja la demanda institucional estadounidense en tiempo real. Se adelanta a los datos de flujo de ETF por 2~3 días.\n• Positivo: Instituciones estadounidenses comprando → Alcista\n• Cerca de cero: Observando/neutral\n• Negativo: Instituciones al margen → Bajista a corto plazo\nActual: Negativo (46+ días consecutivos) → Instituciones esperando claridad macro.",
    desc_lth:"% Suministro de Tenedores a Largo Plazo = porcentaje del suministro de BTC en manos de direcciones inactivas 155+ días.\n• > 75%: Ballenas en acumulación agresiva → Señal de compra fuerte\n• 70~75%: Acumulación normal\n• < 70%: Distribución (ballenas vendiendo)\nNiveles récord (79%) significan que el dinero inteligente no está vendiendo — shock de suministro llegará cuando regrese la demanda.",
    desc_dom:"Dominancia BTC = Capitalización de mercado BTC / Capitalización total de mercado cripto\nSube cuando el capital fluye de altcoins a Bitcoin — patrón típico antes de grandes mercados alcistas.\n• 55~63% (base CoinGecko): Temporada BTC → Capital consolidándose en BTC → Zona de compra\n• < 50%: Temporada alt → Riesgo activado\n• > 65%: Dominancia BTC extrema → Puede señalar rotación alt próxima",
    desc_halving:"Los halvings de Bitcoin reducen las recompensas de minería en 50% cada ~4 años, creando shocks de suministro.\nTiming histórico de suelos:\n• Suelo 2015: 18 meses antes del halving 2016\n• Suelo 2018: 17 meses antes del halving 2020  \n• Suelo 2022: 17 meses antes del halving 2024\n• Actual: ~21 meses antes del halving de abril 2028 → En la ventana central del suelo.",
    // Alert labels
    alertTitle:'Configuración de Alertas',
    alertDesc:'Recibe notificaciones vía push del navegador + destello visual + sonido cuando se cumplan las condiciones.',
    alertBuySection:'📈 DISPARADORES LARGO', alertSellSection:'📉 DISPARADORES CORTO',
    a2:'Puntuación Largo ≥ 6.0 (Iniciar escalonado)',
    a3:'Puntuación Largo ≥ 7.0 (Aumentar posición)', a4:'Puntuación Largo ≥ 8.0 (Compra agresiva)',
    a5:'MVRV Z ≤ 0 — Zona de suelo total', a6:'NUPL por debajo de 0% — Capitulación',
    a7:'Brecha de futuros se vuelve negativa (backwardation)', a8:'Cruce de recuperación Hash Ribbon',
    a9:'Coinbase Premium se vuelve positivo',
    b1:'Puntuación Corto ≥ 6.0 (Preparar corto)', b2:'Puntuación Corto ≥ 7.0 (Aumentar corto)',
    b3:'Puntuación Corto ≥ 8.0 (Corto total)', b4:'MVRV Z ≥ 3.5 — Zona de euforia',
    b5:'NUPL ≥ 75% — Codicia extrema', b6:'Miedo y Codicia ≥ 80',
    b7:'Contango de futuros ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alertar cuando el precio baje de $', priceAbove:'Alertar cuando el precio suba de $',
    enableNotif:'Activar Notificaciones del Navegador',
    ind_sell_lth:'Suministro LTH — Distribución', ind_sell_dom:'Dominancia BTC — Riesgo',
    ind_sell_halving:'Halving — Fase del Ciclo', ind_sell_ath:'Proximidad ATH — Riesgo de Techo',
    ind_sell_mvrv:'MVRV Z — Sobrecalentamiento', ind_sell_nupl:'NUPL — Codicia',
    ind_sell_funding:'Prima de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`El Spread SOPR LTH-STH mide la brecha entre el comportamiento de toma de ganancias de tenedores a largo y corto plazo.
Un spread positivo grande significa que los tenedores a corto plazo están realizando ganancias mucho más rápido que los de largo plazo — una señal temprana de distribución.

Zona CORTO: spread ≥ 0.15 (STH vendiendo agresivamente mientras LTH mantiene)
Zona segura: spread ≤ 0.02 (comportamiento alineado, sin señal de distribución)

Actual: STH realizando ganancias significativas en relación a LTH → la distribución puede estar comenzando.`,
    ind_sell_sopr:'STH-SOPR — Toma de Ganancias', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  de: {
    exchBannerT:"Mit welcher Börse anfangen?", exchBannerD:"Binance & Bybit vergleichen + Rabatt",
    // NAV
    navInsights:'Blog',
    footerPrivacy:'Datenschutzerklärung', footerTerms:'Nutzungsbedingungen', footerDisclaimer:'Keine Finanzberatung',
    whyBtnLabel:'Warum?', whyTopTitle:'Größte Treiber', whyBottomTitle:'Was bremst', histToday:'Heute', histYesterday:'Gestern', histWeekAgo:'Letzte Woche',
    buyTiming:'📈 LONG-Timing', sellTiming:'📉 SHORT-Timing',
    livePriceLabel:'Preis · Binance', fgLabel:'Angst & Gier',
    rpLabel:'Realized-Price-Abstand', maLabel:'200W-MA (Ref.)',
    splitPlan:'Gestaffelter Einstiegsplan', splitTitle:'Verteilung nach Stufe',
    splitStep1:(s)=>`Jetzt (Score ${s})`, splitStep2:'Hash-Ribbon-Erholung',
    splitStep3:'Coinbase Premium → Positiv', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Aktualisiert',
    // Mode labels
    modeTitle_buy:'LONG-TIMING-SCORE', modeTitle_sell:'VERKAUFSDRUCK-ANZEIGE',
    modeSub_buy:'Long-Einstiegsmodell am Zyklustief', modeSub_sell:'Short-Einstiegs-Timing-Modell',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ So liest du den Verkaufs-Score',
    sellExplain_low:'🟢 NIEDRIG (0~3): Markt in Tiefzone. Kein Ausstiegssignal. Halten oder akkumulieren.',
    sellExplain_mid:'🟡 MITTEL (4~6): Markt heizt sich auf. Teilreduzierung beobachten.',
    sellExplain_high:'🔴 HOCH (7~10): Starkes Verkaufssignal. Long-Position schließen / Short-Einstieg erwägen.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z-Score', ind_nupl:'NUPL', ind_realized:'Realized-Price-Abstand',
    ind_alt_valuation:'Preis vs. gesch. Realized (200W MA)', ind_alt_drawdown:'ATH-Drawdown',
    tab_dashboard:'Live', tab_coins:'Coins', tab_blog:'Blog',
    ind_alt_short_val:'Preis vs. gesch. Realized (Short)', ind_alt_short_ath:'ATH-Nähe — Überhitzung',
    ind_rsi:'RSI (14T)', ind_vol_change:'Volumenbeschleunigung (15m vs 1h/4h)', ind_btc_corr_tech:'BTC-Korrelation (30T)',
    ind_buy_pressure:'Live Kaufgetriebenes Volumen — FOMO', ind_sell_pressure:'Live Verkaufsgetriebenes Volumen — Kapitulation',
    desc_buy_pressure:`Anteil des Volumens der letzten 15-Minuten-Kerzen, der durch aggressive Käufe getrieben wird. Eine hohe Quote (65%+) kombiniert mit einem Volumenspike und einer grünen Kerze kann FOMO-getriebene Überhitzung nahe eines lokalen Hochs signalisieren. Nutzt 15-Minuten- statt Tagesdaten und bildet Bedingungen so nahezu in Echtzeit ab (15min–1h Verzögerung vs. bis zu 24h beim Tagesvolumen).`,
    desc_sell_pressure:`Anteil des Volumens der letzten 15-Minuten-Kerzen, der durch aggressive Verkäufe getrieben wird. Eine hohe Quote (58%+) kombiniert mit einem Volumenspike und einer roten Kerze kann Kapitulationsverkäufe signalisieren, die oft einer Umkehr nahe eines lokalen Tiefs vorausgehen. Nutzt 15-Minuten- statt Tagesdaten für nahezu Echtzeit-Abbildung.`,
    desc_rsi:`Relative-Stärke-Index über 14 Tage, ein Momentum-Oszillator, der Geschwindigkeit und Ausmaß jüngster Preisänderungen misst. RSI unter 30 zeigt überverkaufte Bedingungen an (oft ein Tiefsignal), über 70 überkaufte Bedingungen (oft ein Hochsignal). Gilt für alle Coins gleichermaßen, da rein preisbasiert.`,
    desc_vol_change:`Vergleicht das Volumen der letzten 15-Minuten-Kerze mit dem 1-Stunden- und 4-Stunden-Durchschnitt. Ein großer Spike kombiniert mit einem Preis nahe einem Tief kann Kapitulationsverkäufe signalisieren, die oft einer Umkehr vorausgehen. Ein Spike nahe einem Hoch kann Distribution durch Großanleger signalisieren. Die Nutzung von 15-Minuten- statt Tagesdaten bildet Bedingungen nahezu in Echtzeit ab.`,
    desc_btc_corr_tech:`Pearson-Korrelationskoeffizient zwischen den täglichen Renditen dieses Coins und denen von Bitcoin über die letzten 30 Tage. Eine niedrige Korrelation (unter 0,5) deutet darauf hin, dass sich der Coin unabhängig von BTC bewegt, was auf coin-spezifische Stärke oder Schwäche statt breiter Marktbewegung hindeuten kann.`,
    desc_alt_short_val:`Geschätzter Überbewertungsindikator für Altcoins im SHORT-Modus. Misst, wie weit der aktuelle Preis über dem geschätzten Realized Price liegt — je höher, desto überhitzter und SHORT-günstiger. ⚠️ Der Realized Price ist eine Schätzung, keine Live-On-Chain-Daten.`,
    desc_alt_short_ath:`Abstand vom Allzeithoch (ATH), genutzt als Überhitzungssignal für Altcoin-SHORT-Timing. Nähe zum ATH (innerhalb von -15%) fällt historisch mit lokalen Hochs und erhöhter SHORT-Günstigkeit zusammen.`,
    ind_btc_corr:'BTC-Dominanz — Alt-Zyklus', desc_btc_corr:`Verfolgt Bitcoins Marktkapitalisierungs-Dominanz als Proxy für die Position im breiteren Alt-Zyklus. Bei hoher BTC-Dominanz (55%+) konzentriert sich Kapital auf Bitcoin und Altcoins tendieren zur Underperformance — oft ein Zeichen, dass der Alt-Zyklus noch nicht begonnen hat. Fällt die Dominanz (unter 50%), rotiert Kapital in Altcoins, historisch verbunden mit der "Alt Season".`,
    desc_alt_valuation:`Geschätzter Bewertungsindikator für Altcoins. Anders als bei BTC/ETH/BNB liegen für diesen Coin keine verlässlichen On-Chain-MVRV-Z-Score-Daten vor, daher nutzen wir Preis vs. geschätzten Realized Price als Proxy.

⚠️ Wichtig: Der geschätzte Realized Price dieses Coins wird über den 200-Wochen-Durchschnitt (200W MA) approximiert, nicht über Live-On-Chain-Daten. Der 200W MA ist ein weit verbreiteter Proxy, der dem On-Chain-Realized-Price nahe folgt, sich aber von präzisen Daten unterscheidet. Nur als Richtungssignal nutzen.

Unter geschätztem Realized Price = mögliche Unterbewertungszone.`,
    desc_alt_drawdown:`Abstand vom Allzeithoch (ATH), genutzt als Ersatz für NUPL bei Altcoins ohne verlässliche On-Chain-Gewinn/Verlust-Daten.

Tiefe Drawdowns (70%+) vom ATH fielen historisch mit Zyklustiefs bei großen Altcoins zusammen, variiert jedoch stark je nach Coin.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Futures-Spot-Spread',
    ind_cbp:'Coinbase Premium', ind_lth:'LTH-Angebot %', ind_dom:'BTC-Dominanz',
    ind_halving:'Halving-Zyklus',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Überhitzung', ind_sell_nupl:'NUPL — Gier-Level',
    ind_sell_funding:'Futures-Prämie', ind_sell_fg:'LTH-STH-SOPR-Spread',
    desc_sell_fg:`Der LTH-STH-SOPR-Spread misst die Kluft zwischen dem Gewinnmitnahmeverhalten von langfristigen und kurzfristigen Haltern.
Ein großer positiver Spread bedeutet, dass kurzfristige Halter Gewinne viel schneller realisieren als langfristige — ein frühes Zeichen für Distribution.

SHORT-Zone: Spread ≥ 0,15 (STH verkauft aggressiv, während LTH hält)
Sichere Zone: Spread ≤ 0,02 (abgestimmtes Verhalten, kein Distributionssignal)

Aktuell: STH realisiert deutliche Gewinne relativ zu LTH → Distribution könnte beginnen.`,
    ind_sell_sopr:'STH-SOPR — Gewinnmitnahme', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ON-CHAIN-BEWERTUNG', sec_miner:'MINER / SENTIMENT',
    sec_inst:'INSTITUTIONELLER FLUSS', sec_cycle:'ZYKLUSPOSITION',
    sec_breakdown:'Score-Aufschlüsselung', sec_triggers:'Nächste Trigger',
    sec_sellTriggers:'Verkaufssignal-Trigger', sec_macro:'MAKRO-WARNUNGEN',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'ALLE →', loadingInsights:'Lädt...', loadMoreInsights:'Mehr laden', collapseInsights:'Einklappen',
    sec_history:'Score-Verlauf', sec_histSub:'Lokal im Browser gespeichert',
    histH:'Stunde', histD:'Tag', histM:'Monat',
    // Indicator detailed descriptions
    desc_mvrv_z:"Der MVRV Z-Score misst, wie über- oder unterbewertet Bitcoin relativ zu seinem Realized Value ist. \n• < 0: Historisch unterbewertet (Tiefzone) → Starker Kauf\n• 0~1: Leicht unterbewertet → Akkumulationszone  \n• 1~3: Fairer Wert → Neutral\n• > 3: Überbewertet (Hochzone) → Verkauf erwägen\nAktuelle Phase: 0,27 — Nahe am Tief. Historisch gingen Werte unter 0,5 großen Bullenmärkten voraus.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) zeigt den Gesamtgewinn-/-verluststatus aller BTC-Halter.\n• < 0% (Kapitulation): Halter in Verlust → Extremes Kaufsignal\n• 0~25% (Hoffnung/Angst): Erholung vom Tief → Kaufzone  \n• 25~50% (Optimismus): Zyklusmitte → Neutral\n• 50~75% (Glaube/Gier): Spätzyklus → Beobachten\n• > 75% (Euphorie): Gier-Höhepunkt → Verkaufssignal",
    desc_realized:"Zeigt, wie weit der aktuelle Preis von der durchschnittlichen Kostenbasis aller BTC-Halter (Realized Price) entfernt ist.\n• Unter 0%: Preis unter Durchschnittskosten → Panikzone, stärkster Kauf\n• 0~5%: Nahe Realized Price → Idealer Einstieg\n• 5~20%: Moderate Prämie → Akzeptabel\n• > 20%: Hohe Prämie → Vorsicht",
    desc_hash:"Hash Ribbon verfolgt das Momentum der Bitcoin-Mining-Hashrate (30-Tage- vs. 60-Tage-Durchschnitt).\n• Kapitulation: Schwache Miner schalten ab (30MA < 60MA) → Tief bildet sich\n• Erholungs-Cross: 30MA kreuzt über 60MA → Zuverlässigstes Vorlauf-Kaufsignal (2~4 Wochen Vorlauf)\nHistorische Genauigkeit: Traf die Tiefs 2016, 2018, 2020, 2022 präzise.",
    desc_sopr:"Der Short-Term-Holder-SOPR misst, ob jüngste Käufer mit Gewinn oder Verlust verkaufen.\n• < 0,95: Panikverkauf mit hohen Verlusten → Kapitulation = Kaufsignal\n• 0,95~1,0: Leichte Verlustrealisierung → Nahe am Tief\n• 1,0~1,03: Neutrale Gewinnmitnahme\n• > 1,05: Starke Gewinnmitnahme → Distribution = Hochsignal",
    desc_funding:"Futures-Spot-Spread = (Futures-Markpreis - Spot-Indexpreis) / Spot-Preis\nZeigt Echtzeit-Hebelpositionierung ohne die 8-Stunden-Abrechnungsverzögerung.\n• Negativ (Backwardation): Futures günstiger als Spot → Short-Überlastung → Vorlauf-Kaufsignal\n• ±0,01%: Neutral (normaler BTC-Bereich)\n• > 0,05%: Contango → Long-Überlastung → Vorsicht\n• > 0,15%: Extremer Contango → Hochsignal",
    desc_cbp:"Coinbase Premium = (Coinbase-BTC-Preis - Binance-BTC-Preis) / Binance-Preis\nSpiegelt US-institutionelle Nachfrage in Echtzeit. Läuft ETF-Flussdaten um 2~3 Tage voraus.\n• Positiv: US-Institutionen kaufen → Bullisch\n• Nahe null: Beobachtung/neutral\n• Negativ: Institutionen abwartend → Kurzfristig bärisch\nAktuell: Negativ (46+ aufeinanderfolgende Tage) → Institutionen warten auf Makro-Klarheit.",
    desc_lth:"LTH-Angebot % = Prozentsatz des BTC-Angebots, gehalten von seit 155+ Tagen inaktiven Adressen.\n• > 75%: Wale in aggressiver Akkumulation → Starkes Kaufsignal\n• 70~75%: Normale Akkumulation\n• < 70%: Distribution (Wale verkaufen)\nRekordniveaus (79%) bedeuten, dass Smart Money nicht verkauft — Angebotsschock kommt bei Nachfragerückkehr.",
    desc_dom:"BTC-Dominanz = BTC-Marktkapitalisierung / Gesamte Krypto-Marktkapitalisierung\nSteigt, wenn Kapital von Altcoins zu Bitcoin fließt — typisches Muster vor großen Bullenmärkten.\n• 55~63% (CoinGecko-Basis): BTC-Saison → Kapital konsolidiert sich in BTC → Kaufzone\n• < 50%: Alt-Saison → Risiko an\n• > 65%: Extreme BTC-Dominanz → Kann bevorstehende Alt-Rotation signalisieren",
    desc_halving:"Bitcoin-Halvings reduzieren Mining-Belohnungen alle ~4 Jahre um 50% und erzeugen Angebotsschocks.\nHistorisches Tief-Timing:\n• Tief 2015: 18 Monate vor Halving 2016\n• Tief 2018: 17 Monate vor Halving 2020  \n• Tief 2022: 17 Monate vor Halving 2024\n• Aktuell: ~21 Monate vor Halving April 2028 → Im Kern-Tieffenster.",
    // Alert labels
    alertTitle:'Alarm-Einstellungen',
    alertDesc:'Erhalte Benachrichtigungen per Browser-Push + visuellem Blitz + Ton, wenn Bedingungen erfüllt sind.',
    alertBuySection:'📈 LONG-TRIGGER', alertSellSection:'📉 SHORT-TRIGGER',
    a2:'Long-Score ≥ 6,0 (Staffelung starten)',
    a3:'Long-Score ≥ 7,0 (Position erhöhen)', a4:'Long-Score ≥ 8,0 (Aggressiver Kauf)',
    a5:'MVRV Z ≤ 0 — Volle Tiefzone', a6:'NUPL unter 0% — Kapitulation',
    a7:'Futures-Spread wird negativ (Backwardation)', a8:'Hash-Ribbon-Erholungscross',
    a9:'Coinbase Premium wird positiv',
    b1:'Short-Score ≥ 6,0 (Short vorbereiten)', b2:'Short-Score ≥ 7,0 (Short erhöhen)',
    b3:'Short-Score ≥ 8,0 (Vollständiger Short)', b4:'MVRV Z ≥ 3,5 — Euphoriezone',
    b5:'NUPL ≥ 75% — Extreme Gier', b6:'Angst & Gier ≥ 80',
    b7:'Futures-Contango ≥ 0,15%', b8:'Coinbase Premium ≥ 0,3% — FOMO',
    priceBelow:'Alarm wenn Preis fällt unter $', priceAbove:'Alarm wenn Preis steigt über $',
    enableNotif:'Browser-Benachrichtigungen aktivieren',
    ind_sell_lth:'LTH-Angebot — Distribution', ind_sell_dom:'BTC-Dominanz — Risiko',
    ind_sell_halving:'Halving — Zyklusphase', ind_sell_ath:'ATH-Nähe — Hochrisiko',
    ind_sell_mvrv:'MVRV Z — Überhitzung', ind_sell_nupl:'NUPL — Gier',
    ind_sell_funding:'Futures-Prämie', ind_sell_fg:'LTH-STH-SOPR-Spread',
    desc_sell_fg:`Der LTH-STH-SOPR-Spread misst die Kluft zwischen dem Gewinnmitnahmeverhalten von langfristigen und kurzfristigen Haltern.
Ein großer positiver Spread bedeutet, dass kurzfristige Halter Gewinne viel schneller realisieren als langfristige — ein frühes Zeichen für Distribution.

SHORT-Zone: Spread ≥ 0,15 (STH verkauft aggressiv, während LTH hält)
Sichere Zone: Spread ≤ 0,02 (abgestimmtes Verhalten, kein Distributionssignal)

Aktuell: STH realisiert deutliche Gewinne relativ zu LTH → Distribution könnte beginnen.`,
    ind_sell_sopr:'STH-SOPR — Gewinnmitnahme', ind_sell_cbp:'Coinbase Premium — FOMO',
  }

};
