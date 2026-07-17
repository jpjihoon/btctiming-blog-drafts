// BTCtiming 언어 사전 — index.php에서 분리 (유지보수·브라우저 캐싱용)
// 이 파일은 index.php의 메인 스크립트보다 먼저 로드되어야 함 (<head>에서 로드)
window.LANGS = {
  en: {
    exchBannerT:"Which exchange to start with?", exchBannerD:"Compare Binance & Bybit + fee discount",
    // NAV
    navInsights:'Blog',
    navGlossary:'Glossary',
    footerPrivacy:'Privacy Policy', footerTerms:'Terms of Service', footerDisclaimer:'Not financial advice',
    whyBtnLabel:'Why?', whyTopTitle:'Top contributors', whyBottomTitle:'Holding it back', histToday:'Today', histYesterday:'Yesterday', histWeekAgo:'Last Week',
    buyTiming:'📈 LONG Timing', sellTiming:'📉 SHORT Timing',
    livePriceLabel:'Price · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Realized Price Gap', maLabel:'200W MA (ref)',
    splitPlan:'Split Entry Plan', splitTitle:'Allocation by Stage',
    splitStep1:(s)=>`Now (Score ${s})`, splitStep2:'Hash Ribbon Recovery',
    splitStep3:'Coinbase Premium → Positive', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Updated',
    footerSources:'Auto-fetched', footerDisclaimer2:'On-chain scraping may use fallback values. Score history saved in browser localStorage. Not financial advice.',
    tkDomLabel:'BTC Dominance', tkMcapLabel:'Market Cap', tkVolLabel:'24h Volume', bkTotalLabel:'Total → /10',
    seoH1:'Real-Time Bitcoin & Altcoin Buy/Sell Timing Score', seoSub:'A free real-time 0–10 timing signal combining on-chain indicators.',
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
    tab_dashboard:'Live', tab_coins:'Find Coins', tab_blog:'Blog',
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
    navGlossary:'用語集',
    footerPrivacy:'プライバシーポリシー', footerTerms:'利用規約', footerDisclaimer:'投資助言ではありません',
    whyBtnLabel:'理由?', whyTopTitle:'寄与度が高い指標', whyBottomTitle:'足を引っ張る指標', histToday:'今日', histYesterday:'昨日', histWeekAgo:'先週',
    buyTiming:'📈 ロング タイミング', sellTiming:'📉 ショート タイミング',
    livePriceLabel:'現在価格 · Binance', fgLabel:'恐怖・強欲指数',
    rpLabel:'実現価格乖離率', maLabel:'200週移動平均線 (参考)',
    splitPlan:'分割エントリー計画', splitTitle:'段階別配分',
    splitStep1:(s)=>`今すぐ (スコア${s})`, splitStep2:'Hash Ribbon 回復転換',
    splitStep3:'Coinbase プレミアム → プラス転換', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'更新日時',
    footerSources:'自動取得', footerDisclaimer2:'オンチェーンのスクレイピングはフォールバック値を使用する場合があります。スコア履歴はブラウザのlocalStorageに保存されます。投資助言ではありません。',
    tkDomLabel:'BTCドミナンス', tkMcapLabel:'時価総額', tkVolLabel:'24時間出来高', bkTotalLabel:'合計 → /10',
    seoH1:'ビットコイン・アルトコインのリアルタイム売買タイミングスコア', seoSub:'オンチェーン指標を統合した0〜10のタイミングシグナルを無料でリアルタイム表示。',
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
    tab_dashboard:'リアルタイム', tab_coins:'コイン検索', tab_blog:'ブログ',
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
    navGlossary:'용어사전',
    footerPrivacy:'개인정보처리방침', footerTerms:'이용약관', footerDisclaimer:'투자 조언이 아닙니다',
    whyBtnLabel:'왜?', whyTopTitle:'점수를 끌어올린 지표', whyBottomTitle:'점수를 끌어내린 지표', histToday:'오늘', histYesterday:'어제', histWeekAgo:'지난주',
    buyTiming:'📈 롱 타이밍', sellTiming:'📉 매도/청산 타이밍',
    livePriceLabel:'현재가 · 바이낸스', fgLabel:'공포·탐욕 지수',
    rpLabel:'실현가 이격률', maLabel:'200주 이평선 (참고)',
    splitPlan:'단계별 진입 계획', splitTitle:'단계별 비중 배분',
    splitStep1:(s)=>`지금 진입 (${s}점)`, splitStep2:'Hash Ribbon 회복 전환',
    splitStep3:'Coinbase Premium 양전환', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'업데이트',
    footerSources:'자동 수집', footerDisclaimer2:'온체인 스크래핑은 대체값을 사용할 수 있습니다. 점수 히스토리는 브라우저 localStorage에 저장됩니다. 투자 조언이 아닙니다.',
    tkDomLabel:'BTC 도미넌스', tkMcapLabel:'시가총액', tkVolLabel:'24시간 거래량', bkTotalLabel:'합계 → /10점',
    seoH1:'비트코인·알트코인 실시간 매수·매도 타이밍 점수', seoSub:'온체인 지표를 종합한 0~10점 타이밍 신호를 무료로 실시간 확인하세요.',
    modeTitle_buy:'롱 진입 점수', modeTitle_sell:'숏 타이밍 게이지',
    modeSub_buy:'사이클 저점 롱 진입 모델', modeSub_sell:'숏 진입 타이밍 모델',
    sellExplainTitle:'ℹ️ 매도 점수 해석 방법',
    sellExplain_low:'🟢 낮음 (0~3점): 시장이 저점 구간. 청산/숏 신호 없음. 보유 또는 매집.',
    sellExplain_mid:'🟡 중간 (4~6점): 시장 과열 시작. 일부 비중 축소 검토.',
    sellExplain_high:'🔴 높음 (7~10점): 강한 매도 신호. 장기 보유 청산 / 숏 진입 검토.',
    longExitLabel:'장기 보유 청산', shortEntryLabel:'숏 진입 신호',
    ind_mvrv_z:'MVRV Z 스코어', ind_nupl:'NUPL', ind_realized:'실현가 이격률',
    ind_alt_valuation:'가격 vs 추정 실현가 (200주 MA)', ind_alt_drawdown:'ATH 대비 낙폭',
    tab_dashboard:'실시간 지표', tab_coins:'코인 검색', tab_blog:'블로그',
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
    navGlossary:'Glosario',
    footerPrivacy:'Política de Privacidad', footerTerms:'Términos de Servicio', footerDisclaimer:'No es asesoramiento financiero',
    whyBtnLabel:'¿Por qué?', whyTopTitle:'Principales contribuyentes', whyBottomTitle:'Lo que frena', histToday:'Hoy', histYesterday:'Ayer', histWeekAgo:'Semana pasada',
    buyTiming:'📈 Timing LARGO', sellTiming:'📉 Timing CORTO',
    livePriceLabel:'Precio · Binance', fgLabel:'Miedo y Codicia',
    rpLabel:'Brecha del Precio Realizado', maLabel:'MA 200S (ref)',
    splitPlan:'Plan de Entrada Escalonada', splitTitle:'Asignación por Etapa',
    splitStep1:(s)=>`Ahora (Puntuación ${s})`, splitStep2:'Recuperación Hash Ribbon',
    splitStep3:'Coinbase Premium → Positivo', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Actualizado',
    footerSources:'Obtención automática', footerDisclaimer2:'El scraping on-chain puede usar valores de reserva. El historial de puntuación se guarda en el localStorage del navegador. No es asesoramiento financiero.',
    tkDomLabel:'Dominancia BTC', tkMcapLabel:'Cap. de Mercado', tkVolLabel:'Volumen 24h', bkTotalLabel:'Total → /10',
    seoH1:'Puntuación de Timing de Compra/Venta de Bitcoin y Altcoins en Tiempo Real', seoSub:'Una señal de timing de 0 a 10 en tiempo real que combina indicadores on-chain, gratis.',
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
    tab_dashboard:'En vivo', tab_coins:'Buscar', tab_blog:'Blog',
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
    navGlossary:'Glossar',
    footerPrivacy:'Datenschutzerklärung', footerTerms:'Nutzungsbedingungen', footerDisclaimer:'Keine Finanzberatung',
    whyBtnLabel:'Warum?', whyTopTitle:'Größte Treiber', whyBottomTitle:'Was bremst', histToday:'Heute', histYesterday:'Gestern', histWeekAgo:'Letzte Woche',
    buyTiming:'📈 LONG-Timing', sellTiming:'📉 SHORT-Timing',
    livePriceLabel:'Preis · Binance', fgLabel:'Angst & Gier',
    rpLabel:'Realized-Price-Abstand', maLabel:'200W-MA (Ref.)',
    splitPlan:'Gestaffelter Einstiegsplan', splitTitle:'Verteilung nach Stufe',
    splitStep1:(s)=>`Jetzt (Score ${s})`, splitStep2:'Hash-Ribbon-Erholung',
    splitStep3:'Coinbase Premium → Positiv', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Aktualisiert',
    footerSources:'Automatisch abgerufen', footerDisclaimer2:'On-Chain-Scraping kann Fallback-Werte verwenden. Score-Verlauf wird im localStorage des Browsers gespeichert. Keine Finanzberatung.',
    tkDomLabel:'BTC-Dominanz', tkMcapLabel:'Marktkapitalisierung', tkVolLabel:'24h-Volumen', bkTotalLabel:'Gesamt → /10',
    seoH1:'Echtzeit-Kauf-/Verkaufs-Timing-Score für Bitcoin & Altcoins', seoSub:'Ein kostenloses Echtzeit-Timing-Signal von 0–10, das On-Chain-Indikatoren kombiniert.',
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
    tab_dashboard:'Live', tab_coins:'Find Coins', tab_blog:'Blog',
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
  },
  fr: {
    exchBannerT:"Par quel exchange commencer ?", exchBannerD:"Comparez Binance et Bybit + réduction de frais",
    // NAV
    navInsights:'Blog',
    navGlossary:'Glossaire',
    footerPrivacy:'Politique de confidentialité', footerTerms:'Conditions d\'utilisation', footerDisclaimer:'Pas un conseil financier',
    whyBtnLabel:'Pourquoi ?', whyTopTitle:'Principaux contributeurs', whyBottomTitle:'Ce qui freine', histToday:'Aujourd\'hui', histYesterday:'Hier', histWeekAgo:'Semaine dernière',
    buyTiming:'📈 Timing LONG', sellTiming:'📉 Timing SHORT',
    livePriceLabel:'Prix · Binance', fgLabel:'Peur et Avidité',
    rpLabel:'Écart de Prix Réalisé', maLabel:'MM 200S (réf)',
    splitPlan:'Plan d\'Entrée Échelonnée', splitTitle:'Répartition par Étape',
    splitStep1:(s)=>`Maintenant (Score ${s})`, splitStep2:'Reprise Hash Ribbon',
    splitStep3:'Coinbase Premium → Positif', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Mis à jour',
    footerSources:'Récupéré automatiquement', footerDisclaimer2:'Le scraping on-chain peut utiliser des valeurs de secours. L\'historique des scores est enregistré dans le localStorage du navigateur. Pas un conseil financier.',
    tkDomLabel:'Dominance BTC', tkMcapLabel:'Cap. Marché', tkVolLabel:'Volume 24h', bkTotalLabel:'Total → /10',
    seoH1:'Score de Timing d\'Achat/Vente Bitcoin & Altcoins en Temps Réel', seoSub:'Un signal de timing de 0 à 10 en temps réel combinant des indicateurs on-chain, gratuit.',
    // Mode labels
    modeTitle_buy:'SCORE DE TIMING LONG', modeTitle_sell:'JAUGE DE PRESSION DE VENTE',
    modeSub_buy:'Modèle d\'entrée long au creux du cycle', modeSub_sell:'Modèle de timing d\'entrée short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Comment lire le Score de Vente',
    sellExplain_low:'🟢 FAIBLE (0~3) : Marché en zone de creux. Aucun signal de sortie. Conserver ou accumuler.',
    sellExplain_mid:'🟡 MOYEN (4~6) : Marché en surchauffe. Surveiller pour réduction partielle.',
    sellExplain_high:'🔴 ÉLEVÉ (7~10) : Signal de vente fort. Sortir du long / Envisager une entrée short.',
    // Indicator names (buy)
    ind_mvrv_z:'Score Z MVRV', ind_nupl:'NUPL', ind_realized:'Écart de Prix Réalisé',
    ind_alt_valuation:'Prix vs Réalisé Est. (MM 200S)', ind_alt_drawdown:'Baisse depuis l\'ATH',
    tab_dashboard:'En direct', tab_coins:'Rechercher', tab_blog:'Blog',
    ind_alt_short_val:'Prix vs Réalisé Est. (Short)', ind_alt_short_ath:'Proximité de l\'ATH — Surchauffe',
    ind_rsi:'RSI (14j)', ind_vol_change:'Accélération du Volume (15m vs 1h/4h)', ind_btc_corr_tech:'Corrélation BTC (30j)',
    ind_buy_pressure:'Volume en Direct Mené par l\'Achat — FOMO', ind_sell_pressure:'Volume en Direct Mené par la Vente — Capitulation',
    desc_buy_pressure:`Proportion du volume des bougies de 15 minutes les plus récentes portée par des achats agressifs. Un ratio élevé (65%+) combiné à un pic de volume et une bougie verte peut signaler une surchauffe due au FOMO près d'un sommet local. Utilise des données de 15 minutes plutôt que quotidiennes, reflétant des conditions quasi en temps réel (délai de 15min–1h vs jusqu'à 24h pour le volume quotidien).`,
    desc_sell_pressure:`Proportion du volume des bougies de 15 minutes les plus récentes portée par des ventes agressives. Un ratio élevé (58%+) combiné à un pic de volume et une bougie rouge peut signaler une vente de capitulation qui précède souvent un rebond près d'un creux local. Utilise des données de 15 minutes plutôt que quotidiennes, reflétant des conditions quasi en temps réel.`,
    desc_rsi:`Indice de Force Relative sur 14 jours, un oscillateur de momentum mesurant la vitesse et l'ampleur des variations de prix récentes. Un RSI inférieur à 30 indique une survente (souvent signal de creux), tandis qu'au-dessus de 70 il indique un surachat (souvent signal de sommet). S'applique de la même manière à toutes les cryptos car il repose uniquement sur le prix.`,
    desc_vol_change:`Compare le volume de la bougie de 15 minutes la plus récente aux moyennes de 1 heure et 4 heures. Un pic important combiné à un prix près d'un plus bas peut signaler une vente de capitulation qui précède souvent un rebond. Un pic près d'un plus haut peut signaler une distribution par les gros détenteurs. Utiliser des données de 15 minutes plutôt que quotidiennes reflète des conditions quasi en temps réel.`,
    desc_btc_corr_tech:`Coefficient de corrélation de Pearson entre les rendements quotidiens de cette crypto et ceux du Bitcoin sur les 30 derniers jours. Une faible corrélation (inférieure à 0,5) suggère que la crypto évolue indépendamment du BTC, ce qui peut indiquer une force ou une faiblesse propre à la crypto plutôt qu'un mouvement de marché général.`,
    desc_alt_short_val:`Indicateur estimé de survalorisation pour les altcoins en mode SHORT. Mesure de combien le prix actuel dépasse le prix réalisé estimé — plus il est élevé, plus la crypto est en surchauffe et favorable au SHORT. ⚠️ Le prix réalisé est une estimation, pas des données on-chain en direct.`,
    desc_alt_short_ath:`Distance par rapport au plus haut historique (ATH), utilisée comme signal de surchauffe pour le timing SHORT des altcoins. Être proche de l'ATH (à moins de -15%) coïncide historiquement avec des sommets locaux et une plus grande favorabilité au SHORT.`,
    ind_btc_corr:'Dominance BTC — Cycle Alt', desc_btc_corr:`Suit la dominance de capitalisation du Bitcoin comme indicateur de la position du cycle alt plus large. Quand la dominance BTC est élevée (55%+), le capital se concentre sur le Bitcoin et les altcoins tendent à sous-performer — souvent le signe que le cycle alt n'a pas encore commencé. Quand la dominance chute (sous 50%), le capital tourne vers les altcoins, historiquement associé à la "saison alt".`,
    desc_alt_valuation:`Indicateur de valorisation estimé pour les altcoins. Contrairement à BTC/ETH/BNB, cette crypto n'a pas de données MVRV Z-Score on-chain fiables disponibles, nous utilisons donc le prix vs un prix réalisé estimé comme approximation.

⚠️ Important : le prix réalisé estimé de cette crypto est approximé par la moyenne mobile sur 200 semaines (MM 200S), et non par des données on-chain en direct. La MM 200S est une approximation largement utilisée qui suit de près le prix réalisé on-chain, mais diffère des données précises. À utiliser uniquement comme signal directionnel.

Sous le prix réalisé estimé = zone de sous-valorisation possible.`,
    desc_alt_drawdown:`Distance par rapport au plus haut historique (ATH), utilisée comme substitut du NUPL pour les altcoins sans données fiables de profit/perte on-chain.

Les baisses profondes (70%+) depuis l'ATH ont historiquement coïncidé avec les creux de cycle des principaux altcoins, bien que cela varie fortement selon la crypto.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Écart Futures-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Offre LTH', ind_dom:'Dominance BTC',
    ind_halving:'Cycle de Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Surchauffe', ind_sell_nupl:'NUPL — Niveau d\'Avidité',
    ind_sell_funding:'Prime des Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Le Spread SOPR LTH-STH mesure l'écart entre le comportement de prise de bénéfices des détenteurs à long et à court terme.
Un spread positif important signifie que les détenteurs à court terme prennent leurs bénéfices bien plus vite que ceux à long terme — un signal précoce de distribution.

Zone SHORT : spread ≥ 0,15 (STH vend agressivement tandis que LTH conserve)
Zone sûre : spread ≤ 0,02 (comportement aligné, aucun signal de distribution)

Actuel : STH prend des bénéfices significatifs par rapport à LTH → la distribution pourrait commencer.`,
    ind_sell_sopr:'STH-SOPR — Prise de Bénéfices', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALORISATION ON-CHAIN', sec_miner:'MINEUR / SENTIMENT',
    sec_inst:'FLUX INSTITUTIONNEL', sec_cycle:'POSITION DU CYCLE',
    sec_breakdown:'Détail du Score', sec_triggers:'Prochains Déclencheurs',
    sec_sellTriggers:'Déclencheurs de Signal de Vente', sec_macro:'AVERTISSEMENTS MACRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TOUT →', loadingInsights:'Chargement...', loadMoreInsights:'Voir Plus', collapseInsights:'Réduire',
    sec_history:'Historique des Scores', sec_histSub:'Enregistré localement dans le navigateur',
    histH:'Heure', histD:'Jour', histM:'Mois',
    // Indicator detailed descriptions
    desc_mvrv_z:"Le Score Z MVRV mesure à quel point le Bitcoin est survalorisé ou sous-valorisé par rapport à sa valeur réalisée. \n• < 0 : Sous-valorisé historiquement (zone de creux) → Achat fort\n• 0~1 : Légèrement sous-valorisé → Zone d'accumulation  \n• 1~3 : Juste valeur → Neutre\n• > 3 : Survalorisé (zone de sommet) → Envisager la vente\nPhase actuelle : 0,27 — Proche du creux. Historiquement, les valeurs sous 0,5 ont précédé de grands marchés haussiers.",
    desc_nupl:"Le NUPL (Profit/Perte Net Non Réalisé) montre l'état global de profit/perte de tous les détenteurs de BTC.\n• < 0% (Capitulation) : Détenteurs en perte → Signal d'achat extrême\n• 0~25% (Espoir/Peur) : Reprise depuis le creux → Zone d'achat  \n• 25~50% (Optimisme) : Milieu de cycle → Neutre\n• 50~75% (Croyance/Avidité) : Fin de cycle → Surveiller\n• > 75% (Euphorie) : Avidité maximale → Signal de vente",
    desc_realized:"Montre à quelle distance le prix actuel se situe du coût moyen de tous les détenteurs de BTC (Prix Réalisé).\n• Sous 0% : Prix sous le coût moyen → Zone de panique, achat le plus fort\n• 0~5% : Proche du prix réalisé → Entrée idéale\n• 5~20% : Prime modérée → Acceptable\n• > 20% : Prime élevée → Prudence",
    desc_hash:"Le Hash Ribbon suit le momentum du hashrate de minage du Bitcoin (moyenne mobile 30 jours vs 60 jours).\n• Capitulation : Mineurs faibles à l'arrêt (30MM < 60MM) → Formation d'un creux\n• Croisement de Reprise : la 30MM passe au-dessus de la 60MM → Signal d'achat avancé le plus fiable (2~4 semaines à l'avance)\nPrécision historique : A parfaitement marqué les creux de 2016, 2018, 2020 et 2022.",
    desc_sopr:"Le SOPR des Détenteurs à Court Terme mesure si les acheteurs récents vendent à profit ou à perte.\n• < 0,95 : Vente panique à forte perte → Capitulation = signal d'achat\n• 0,95~1,0 : Légère prise de perte → Proche du creux\n• 1,0~1,03 : Prise de bénéfices neutre\n• > 1,05 : Forte prise de bénéfices → Distribution = signal de sommet",
    desc_funding:"Écart Futures-Spot = (Prix Mark Futures - Prix Indice Spot) / Prix Spot\nMontre le positionnement du levier en temps réel sans le délai de règlement de 8 heures.\n• Négatif (backwardation) : Futures moins chers que le spot → Surcharge de shorts → Signal d'achat avancé\n• ±0,01% : Neutre (fourchette normale pour BTC)\n• > 0,05% : Contango → Surcharge de longs → Prudence\n• > 0,15% : Contango extrême → Signal de sommet",
    desc_cbp:"Coinbase Premium = (Prix BTC Coinbase - Prix BTC Binance) / Prix Binance\nReflète la demande institutionnelle américaine en temps réel. Devance les données de flux ETF de 2~3 jours.\n• Positif : Institutions américaines en achat → Haussier\n• Proche de zéro : En observation/neutre\n• Négatif : Institutions en retrait → Baissier à court terme\nActuel : Négatif (46+ jours consécutifs) → Institutions en attente de clarté macro.",
    desc_lth:"% Offre des Détenteurs à Long Terme = pourcentage de l'offre de BTC détenue par des adresses inactives depuis 155+ jours.\n• > 75% : Baleines en accumulation agressive → Signal d'achat fort\n• 70~75% : Accumulation normale\n• < 70% : Distribution (baleines en vente)\nDes niveaux records (79%) signifient que l'argent intelligent ne vend pas — un choc d'offre arrivera au retour de la demande.",
    desc_dom:"Dominance BTC = Capitalisation BTC / Capitalisation totale du marché crypto\nAugmente quand le capital passe des altcoins au Bitcoin — schéma typique avant de grands marchés haussiers.\n• 55~63% (base CoinGecko) : Saison BTC → Capital consolidé sur BTC → Zone d'achat\n• < 50% : Saison alt → Risque activé\n• > 65% : Dominance BTC extrême → Peut signaler une rotation alt imminente",
    desc_halving:"Les halvings du Bitcoin réduisent les récompenses de minage de 50% tous les ~4 ans, créant des chocs d'offre.\nTiming historique des creux :\n• Creux 2015 : 18 mois avant le halving 2016\n• Creux 2018 : 17 mois avant le halving 2020  \n• Creux 2022 : 17 mois avant le halving 2024\n• Actuel : ~21 mois avant le halving d'avril 2028 → Au centre de la fenêtre de creux.",
    // Alert labels
    alertTitle:'Paramètres d\'Alerte',
    alertDesc:'Recevez des notifications par push du navigateur + flash visuel + son lorsque les conditions sont remplies.',
    alertBuySection:'📈 DÉCLENCHEURS LONG', alertSellSection:'📉 DÉCLENCHEURS SHORT',
    a2:'Score Long ≥ 6.0 (Démarrer l\'échelonnement)',
    a3:'Score Long ≥ 7.0 (Augmenter la position)', a4:'Score Long ≥ 8.0 (Achat agressif)',
    a5:'MVRV Z ≤ 0 — Zone de creux totale', a6:'NUPL sous 0% — Capitulation',
    a7:'L\'écart des futures devient négatif (backwardation)', a8:'Croisement de reprise Hash Ribbon',
    a9:'Coinbase Premium devient positif',
    b1:'Score Short ≥ 6.0 (Préparer le short)', b2:'Score Short ≥ 7.0 (Augmenter le short)',
    b3:'Score Short ≥ 8.0 (Short total)', b4:'MVRV Z ≥ 3.5 — Zone d\'euphorie',
    b5:'NUPL ≥ 75% — Avidité extrême', b6:'Peur et Avidité ≥ 80',
    b7:'Contango des futures ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alerter quand le prix descend sous $', priceAbove:'Alerter quand le prix monte au-dessus de $',
    enableNotif:'Activer les Notifications du Navigateur',
    ind_sell_lth:'Offre LTH — Distribution', ind_sell_dom:'Dominance BTC — Risque',
    ind_sell_halving:'Halving — Phase du Cycle', ind_sell_ath:'Proximité ATH — Risque de Sommet',
    ind_sell_mvrv:'MVRV Z — Surchauffe', ind_sell_nupl:'NUPL — Avidité',
    ind_sell_funding:'Prime des Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Le Spread SOPR LTH-STH mesure l'écart entre le comportement de prise de bénéfices des détenteurs à long et à court terme.
Un spread positif important signifie que les détenteurs à court terme prennent leurs bénéfices bien plus vite que ceux à long terme — un signal précoce de distribution.

Zone SHORT : spread ≥ 0,15 (STH vend agressivement tandis que LTH conserve)
Zone sûre : spread ≤ 0,02 (comportement aligné, aucun signal de distribution)

Actuel : STH prend des bénéfices significatifs par rapport à LTH → la distribution pourrait commencer.`,
    ind_sell_sopr:'STH-SOPR — Prise de Bénéfices', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  pt: {
    exchBannerT:"Por qual exchange começar?", exchBannerD:"Compare Binance e Bybit + desconto de taxa",
    // NAV
    navInsights:'Blog',
    navGlossary:'Glossário',
    footerPrivacy:'Política de Privacidade', footerTerms:'Termos de Serviço', footerDisclaimer:'Não é aconselhamento financeiro',
    whyBtnLabel:'Por quê?', whyTopTitle:'Principais contribuidores', whyBottomTitle:'O que está segurando', histToday:'Hoje', histYesterday:'Ontem', histWeekAgo:'Semana passada',
    buyTiming:'📈 Timing LONG', sellTiming:'📉 Timing SHORT',
    livePriceLabel:'Preço · Binance', fgLabel:'Medo e Ganância',
    rpLabel:'Diferença do Preço Realizado', maLabel:'MM 200S (ref)',
    splitPlan:'Plano de Entrada Escalonada', splitTitle:'Alocação por Etapa',
    splitStep1:(s)=>`Agora (Pontuação ${s})`, splitStep2:'Recuperação Hash Ribbon',
    splitStep3:'Coinbase Premium → Positivo', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Atualizado',
    footerSources:'Obtido automaticamente', footerDisclaimer2:'O scraping on-chain pode usar valores de reserva. O histórico de pontuação é salvo no localStorage do navegador. Não é aconselhamento financeiro.',
    tkDomLabel:'Dominância BTC', tkMcapLabel:'Cap. de Mercado', tkVolLabel:'Volume 24h', bkTotalLabel:'Total → /10',
    seoH1:'Pontuação de Timing de Compra/Venda de Bitcoin e Altcoins em Tempo Real', seoSub:'Um sinal de timing de 0 a 10 em tempo real combinando indicadores on-chain, grátis.',
    // Mode labels
    modeTitle_buy:'PONTUAÇÃO DE TIMING LONG', modeTitle_sell:'MEDIDOR DE PRESSÃO DE VENDA',
    modeSub_buy:'Modelo de entrada long no fundo do ciclo', modeSub_sell:'Modelo de timing de entrada short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Como ler a Pontuação de Venda',
    sellExplain_low:'🟢 BAIXA (0~3): Mercado em zona de fundo. Sem sinal de saída. Manter ou acumular.',
    sellExplain_mid:'🟡 MÉDIA (4~6): Mercado esquentando. Vigiar para redução parcial.',
    sellExplain_high:'🔴 ALTA (7~10): Sinal de venda forte. Sair do long / Considerar entrada short.',
    // Indicator names (buy)
    ind_mvrv_z:'Pontuação Z MVRV', ind_nupl:'NUPL', ind_realized:'Diferença do Preço Realizado',
    ind_alt_valuation:'Preço vs Realizado Est. (200W MA)', ind_alt_drawdown:'Queda desde ATH',
    tab_dashboard:'Ao vivo', tab_coins:'Buscar', tab_blog:'Blog',
    ind_alt_short_val:'Preço vs Realizado Est. (Short)', ind_alt_short_ath:'Proximidade do ATH — Sobreaquecimento',
    ind_rsi:'RSI (14d)', ind_vol_change:'Aceleração de Volume (15m vs 1h/4h)', ind_btc_corr_tech:'Correlação com BTC (30d)',
    ind_buy_pressure:'Volume ao Vivo Liderado por Compra — FOMO', ind_sell_pressure:'Volume ao Vivo Liderado por Venda — Capitulação',
    desc_buy_pressure:`Proporção do volume das velas de 15 minutos mais recentes impulsionado por compras agressivas. Um índice alto (65%+) combinado com um pico de volume e uma vela verde pode sinalizar sobreaquecimento por FOMO perto de um topo local. Usa dados de 15 minutos em vez de diários, refletindo condições quase em tempo real (atraso de 15min–1h vs. até 24h para o volume diário).`,
    desc_sell_pressure:`Proporção do volume das velas de 15 minutos mais recentes impulsionado por vendas agressivas. Um índice alto (58%+) combinado com um pico de volume e uma vela vermelha pode sinalizar uma venda de capitulação que muitas vezes precede uma recuperação perto de um fundo local. Usa dados de 15 minutos em vez de diários, refletindo condições quase em tempo real.`,
    desc_rsi:`Índice de Força Relativa de 14 dias, um oscilador de momentum que mede a velocidade e a magnitude das variações de preço recentes. RSI abaixo de 30 indica sobrevenda (muitas vezes sinal de fundo), enquanto acima de 70 indica sobrecompra (muitas vezes sinal de topo). Aplica-se igualmente a todas as moedas por se basear puramente no preço.`,
    desc_vol_change:`Compara o volume da vela de 15 minutos mais recente com as médias de 1 hora e 4 horas. Um pico grande combinado com um preço perto de uma mínima pode sinalizar uma venda de capitulação que muitas vezes precede uma recuperação. Um pico perto de uma máxima pode sinalizar distribuição por grandes detentores. Usar dados de 15 minutos em vez de diários reflete condições quase em tempo real.`,
    desc_btc_corr_tech:`Coeficiente de correlação de Pearson entre os retornos diários desta moeda e os do Bitcoin nos últimos 30 dias. Uma correlação baixa (abaixo de 0,5) sugere que a moeda se move independentemente do BTC, o que pode indicar força ou fraqueza específica da moeda em vez de um movimento amplo do mercado.`,
    desc_alt_short_val:`Indicador estimado de sobrevalorização para altcoins no modo SHORT. Mede quanto o preço atual está acima do preço realizado estimado — quanto mais alto, mais sobreaquecido e favorável para SHORT. ⚠️ O preço realizado é uma estimativa, não dados on-chain ao vivo.`,
    desc_alt_short_ath:`Distância do máximo histórico (ATH), usada como sinal de sobreaquecimento para o timing SHORT de altcoins. Estar perto do ATH (dentro de -15%) historicamente coincide com topos locais e maior favorabilidade para SHORT.`,
    ind_btc_corr:'Dominância BTC — Ciclo Alt', desc_btc_corr:`Acompanha a dominância de capitalização de mercado do Bitcoin como proxy da posição do ciclo alt mais amplo. Quando a dominância BTC é alta (55%+), o capital concentra-se no Bitcoin e as altcoins tendem a render menos — muitas vezes sinal de que o ciclo alt ainda não começou. Quando a dominância cai (abaixo de 50%), o capital gira para altcoins, historicamente associado à "temporada alt".`,
    desc_alt_valuation:`Indicador de valorização estimado para altcoins. Diferente de BTC/ETH/BNB, esta moeda não tem dados confiáveis de MVRV Z-Score on-chain disponíveis, por isso usamos preço vs. um preço realizado estimado como proxy.

⚠️ Importante: o preço realizado estimado desta moeda é aproximado pela média móvel de 200 semanas (200W MA), não por dados on-chain ao vivo. A 200W MA é um proxy amplamente usado que segue de perto o preço realizado on-chain, mas difere dos dados precisos. Use apenas como sinal direcional.

Abaixo do preço realizado estimado = possível zona de subvalorização.`,
    desc_alt_drawdown:`Distância do máximo histórico (ATH), usada como substituto do NUPL em altcoins sem dados confiáveis de lucro/prejuízo on-chain.

Quedas profundas (70%+) desde o ATH coincidiram historicamente com fundos de ciclo para altcoins principais, embora isso varie significativamente conforme a moeda.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Diferença Futuros-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Fornecimento LTH', ind_dom:'Dominância BTC',
    ind_halving:'Ciclo de Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Sobreaquecimento', ind_sell_nupl:'NUPL — Nível de Ganância',
    ind_sell_funding:'Prêmio de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`O Spread SOPR LTH-STH mede a diferença entre o comportamento de realização de lucros de detentores de longo e curto prazo.
Um spread positivo grande significa que os detentores de curto prazo estão realizando lucros muito mais rápido que os de longo prazo — um sinal precoce de distribuição.

Zona SHORT: spread ≥ 0,15 (STH vendendo agressivamente enquanto LTH mantém)
Zona segura: spread ≤ 0,02 (comportamento alinhado, sem sinal de distribuição)

Atual: STH realizando lucros significativos em relação ao LTH → a distribuição pode estar começando.`,
    ind_sell_sopr:'STH-SOPR — Realização de Lucros', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALORIZAÇÃO ON-CHAIN', sec_miner:'MINERADOR / SENTIMENTO',
    sec_inst:'FLUXO INSTITUCIONAL', sec_cycle:'POSIÇÃO DO CICLO',
    sec_breakdown:'Detalhamento da Pontuação', sec_triggers:'Próximos Gatilhos',
    sec_sellTriggers:'Gatilhos de Sinal de Venda', sec_macro:'AVISOS MACRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TUDO →', loadingInsights:'Carregando...', loadMoreInsights:'Ver Mais', collapseInsights:'Recolher',
    sec_history:'Histórico de Pontuação', sec_histSub:'Salvo localmente no navegador',
    histH:'Hora', histD:'Dia', histM:'Mês',
    // Indicator detailed descriptions
    desc_mvrv_z:"A Pontuação Z MVRV mede o quão sobrevalorizado ou subvalorizado o Bitcoin está em relação ao seu valor realizado. \n• < 0: Historicamente subvalorizado (zona de fundo) → Compra forte\n• 0~1: Ligeiramente subvalorizado → Zona de acumulação  \n• 1~3: Valor justo → Neutro\n• > 3: Sobrevalorizado (zona de topo) → Considerar venda\nFase atual: 0,27 — Perto do fundo. Historicamente, valores abaixo de 0,5 precederam grandes mercados de alta.",
    desc_nupl:"NUPL (Lucro/Prejuízo Líquido Não Realizado) mostra o estado geral de lucro/prejuízo de todos os detentores de BTC.\n• < 0% (Capitulação): Detentores no prejuízo → Sinal de compra extrema\n• 0~25% (Esperança/Medo): Recuperando do fundo → Zona de compra  \n• 25~50% (Otimismo): Meio do ciclo → Neutro\n• 50~75% (Crença/Ganância): Fim do ciclo → Vigiar\n• > 75% (Euforia): Ganância máxima → Sinal de venda",
    desc_realized:"Mostra o quão longe o preço atual está da base de custo médio de todos os detentores de BTC (Preço Realizado).\n• Abaixo de 0%: Preço abaixo do custo médio → Zona de pânico, compra mais forte\n• 0~5%: Perto do preço realizado → Entrada ideal\n• 5~20%: Prêmio moderado → Aceitável\n• > 20%: Prêmio alto → Cautela",
    desc_hash:"Hash Ribbon acompanha o momentum do hashrate de mineração do Bitcoin (média móvel de 30 dias vs 60 dias).\n• Capitulação: Mineradores fracos encerrando (30MA < 60MA) → Formando um fundo\n• Cruzamento de Recuperação: 30MA cruza acima de 60MA → Sinal de compra líder mais confiável (2~4 semanas de antecedência)\nPrecisão histórica: Marcou perfeitamente os fundos de 2016, 2018, 2020 e 2022.",
    desc_sopr:"O SOPR de Detentores de Curto Prazo mede se os compradores recentes estão vendendo com lucro ou prejuízo.\n• < 0,95: Venda de pânico com prejuízos fortes → Capitulação = sinal de compra\n• 0,95~1,0: Realização leve de prejuízos → Perto do fundo\n• 1,0~1,03: Realização de lucros neutra\n• > 1,05: Realização de lucros forte → Distribuição = sinal de topo",
    desc_funding:"Diferença Futuros-Spot = (Preço Marca Futuros - Preço Índice Spot) / Preço Spot\nMostra o posicionamento de alavancagem em tempo real sem o atraso de liquidação de 8 horas.\n• Negativo (backwardation): Futuros mais baratos que spot → Sobrecarga de shorts → Sinal de compra líder\n• ±0,01%: Neutro (faixa normal para BTC)\n• > 0,05%: Contango → Sobrecarga de longs → Cautela\n• > 0,15%: Contango extremo → Sinal de topo",
    desc_cbp:"Coinbase Premium = (Preço BTC Coinbase - Preço BTC Binance) / Preço Binance\nReflete a demanda institucional dos EUA em tempo real. Antecipa os dados de fluxo de ETF em 2~3 dias.\n• Positivo: Instituições dos EUA comprando → Altista\n• Perto de zero: Observando/neutro\n• Negativo: Instituições à margem → Baixista a curto prazo\nAtual: Negativo (46+ dias consecutivos) → Instituições aguardando clareza macro.",
    desc_lth:"% Fornecimento de Detentores de Longo Prazo = percentual do fornecimento de BTC em mãos de endereços inativos por 155+ dias.\n• > 75%: Baleias em acumulação agressiva → Sinal de compra forte\n• 70~75%: Acumulação normal\n• < 70%: Distribuição (baleias vendendo)\nNíveis recordes (79%) significam que o dinheiro inteligente não está vendendo — choque de oferta virá quando a demanda retornar.",
    desc_dom:"Dominância BTC = Capitalização de mercado BTC / Capitalização total do mercado cripto\nSobe quando o capital flui de altcoins para o Bitcoin — padrão típico antes de grandes mercados de alta.\n• 55~63% (base CoinGecko): Temporada BTC → Capital consolidando em BTC → Zona de compra\n• < 50%: Temporada alt → Risco ativado\n• > 65%: Dominância BTC extrema → Pode sinalizar rotação alt próxima",
    desc_halving:"Os halvings do Bitcoin reduzem as recompensas de mineração em 50% a cada ~4 anos, criando choques de oferta.\nTiming histórico de fundos:\n• Fundo 2015: 18 meses antes do halving 2016\n• Fundo 2018: 17 meses antes do halving 2020  \n• Fundo 2022: 17 meses antes do halving 2024\n• Atual: ~21 meses antes do halving de abril 2028 → Na janela central do fundo.",
    // Alert labels
    alertTitle:'Configuração de Alertas',
    alertDesc:'Receba notificações via push do navegador + flash visual + som quando as condições forem atendidas.',
    alertBuySection:'📈 GATILHOS LONG', alertSellSection:'📉 GATILHOS SHORT',
    a2:'Pontuação Long ≥ 6.0 (Iniciar escalonado)',
    a3:'Pontuação Long ≥ 7.0 (Aumentar posição)', a4:'Pontuação Long ≥ 8.0 (Compra agressiva)',
    a5:'MVRV Z ≤ 0 — Zona de fundo total', a6:'NUPL abaixo de 0% — Capitulação',
    a7:'Diferença de futuros fica negativa (backwardation)', a8:'Cruzamento de recuperação Hash Ribbon',
    a9:'Coinbase Premium fica positivo',
    b1:'Pontuação Short ≥ 6.0 (Preparar short)', b2:'Pontuação Short ≥ 7.0 (Aumentar short)',
    b3:'Pontuação Short ≥ 8.0 (Short total)', b4:'MVRV Z ≥ 3.5 — Zona de euforia',
    b5:'NUPL ≥ 75% — Ganância extrema', b6:'Medo e Ganância ≥ 80',
    b7:'Contango de futuros ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alertar quando o preço cair abaixo de $', priceAbove:'Alertar quando o preço subir acima de $',
    enableNotif:'Ativar Notificações do Navegador',
    ind_sell_lth:'Fornecimento LTH — Distribuição', ind_sell_dom:'Dominância BTC — Risco',
    ind_sell_halving:'Halving — Fase do Ciclo', ind_sell_ath:'Proximidade ATH — Risco de Topo',
    ind_sell_mvrv:'MVRV Z — Sobreaquecimento', ind_sell_nupl:'NUPL — Ganância',
    ind_sell_funding:'Prêmio de Futuros', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`O Spread SOPR LTH-STH mede a diferença entre o comportamento de realização de lucros de detentores de longo e curto prazo.
Um spread positivo grande significa que os detentores de curto prazo estão realizando lucros muito mais rápido que os de longo prazo — um sinal precoce de distribuição.

Zona SHORT: spread ≥ 0,15 (STH vendendo agressivamente enquanto LTH mantém)
Zona segura: spread ≤ 0,02 (comportamento alinhado, sem sinal de distribuição)

Atual: STH realizando lucros significativos em relação ao LTH → a distribuição pode estar começando.`,
    ind_sell_sopr:'STH-SOPR — Realização de Lucros', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  tr: {
    exchBannerT:"Hangi borsayla başlamalı?", exchBannerD:"Binance ve Bybit karşılaştır + komisyon indirimi",
    // NAV
    navInsights:'Blog',
    navGlossary:'Sözlük',
    footerPrivacy:'Gizlilik Politikası', footerTerms:'Hizmet Şartları', footerDisclaimer:'Yatırım tavsiyesi değildir',
    whyBtnLabel:'Neden?', whyTopTitle:'Başlıca katkıda bulunanlar', whyBottomTitle:'Geride tutan', histToday:'Bugün', histYesterday:'Dün', histWeekAgo:'Geçen hafta',
    buyTiming:'📈 LONG Zamanlaması', sellTiming:'📉 SHORT Zamanlaması',
    livePriceLabel:'Fiyat · Binance', fgLabel:'Korku ve Açgözlülük',
    rpLabel:'Gerçekleşen Fiyat Farkı', maLabel:'200H HO (ref)',
    splitPlan:'Kademeli Giriş Planı', splitTitle:'Aşamaya Göre Dağılım',
    splitStep1:(s)=>`Şimdi (Puan ${s})`, splitStep2:'Hash Ribbon Toparlanması',
    splitStep3:'Coinbase Premium → Pozitif', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Güncellendi',
    footerSources:'Otomatik alındı', footerDisclaimer2:'Zincir üstü kazıma yedek değerler kullanabilir. Puan geçmişi tarayıcının localStorage\'ında saklanır. Yatırım tavsiyesi değildir.',
    tkDomLabel:'BTC Dominansı', tkMcapLabel:'Piyasa Değeri', tkVolLabel:'24s Hacim', bkTotalLabel:'Toplam → /10',
    seoH1:'Gerçek Zamanlı Bitcoin ve Altcoin Alım/Satım Zamanlama Skoru', seoSub:'Zincir üstü göstergeleri birleştiren, ücretsiz ve gerçek zamanlı 0–10 zamanlama sinyali.',
    // Mode labels
    modeTitle_buy:'LONG ZAMANLAMA PUANI', modeTitle_sell:'SATIŞ BASKISI GÖSTERGESİ',
    modeSub_buy:'Döngü dibi long giriş modeli', modeSub_sell:'Short giriş zamanlama modeli',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Satış Puanı nasıl okunur',
    sellExplain_low:'🟢 DÜŞÜK (0~3): Piyasa dip bölgesinde. Çıkış sinyali yok. Tut veya biriktir.',
    sellExplain_mid:'🟡 ORTA (4~6): Piyasa ısınıyor. Kısmi azaltma için izle.',
    sellExplain_high:'🔴 YÜKSEK (7~10): Güçlü satış sinyali. Long çık / Short girişi düşün.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Puanı', ind_nupl:'NUPL', ind_realized:'Gerçekleşen Fiyat Farkı',
    ind_alt_valuation:'Fiyat vs Tahmini Gerçekleşen (200H HO)', ind_alt_drawdown:'ATH\u2019den Düşüş',
    tab_dashboard:'Canlı', tab_coins:'Ara', tab_blog:'Blog',
    ind_alt_short_val:'Fiyat vs Tahmini Gerçekleşen (Short)', ind_alt_short_ath:'ATH Yakınlığı — Aşırı Isınma',
    ind_rsi:'RSI (14g)', ind_vol_change:'Hacim Hızlanması (15d vs 1s/4s)', ind_btc_corr_tech:'BTC Korelasyonu (30g)',
    ind_buy_pressure:'Canlı Alım Öncülüğünde Hacim — FOMO', ind_sell_pressure:'Canlı Satış Öncülüğünde Hacim — Kapitülasyon',
    desc_buy_pressure:`En son 15 dakikalık mumların hacminin agresif alımlarla yönlendirilen oranı. Yüksek bir oran (%65+) ile hacim sıçraması ve yeşil mum birleştiğinde, yerel bir tepe yakınında FOMO kaynaklı aşırı ısınmaya işaret edebilir. Günlük yerine 15 dakikalık veri kullanır ve neredeyse gerçek zamanlı koşulları yansıtır (günlük hacim için 24 saate kadar gecikme yerine 15dk–1s gecikme).`,
    desc_sell_pressure:`En son 15 dakikalık mumların hacminin agresif satışlarla yönlendirilen oranı. Yüksek bir oran (%58+) ile hacim sıçraması ve kırmızı mum birleştiğinde, yerel bir dip yakınında sıklıkla bir toparlanmadan önce gelen kapitülasyon satışına işaret edebilir. Günlük yerine 15 dakikalık veri kullanır ve neredeyse gerçek zamanlı koşulları yansıtır.`,
    desc_rsi:`14 günlük Göreceli Güç Endeksi, son fiyat değişimlerinin hızını ve büyüklüğünü ölçen bir momentum osilatörü. 30\u2019un altındaki RSI aşırı satımı gösterir (genellikle dip sinyali), 70\u2019in üzeri ise aşırı alımı gösterir (genellikle tepe sinyali). Tamamen fiyata dayandığı için tüm coinlere eşit uygulanır.`,
    desc_vol_change:`En son 15 dakikalık mumun hacmini 1 saatlik ve 4 saatlik ortalamalarla karşılaştırır. Bir dibin yakınındaki fiyatla birleşen büyük bir sıçrama, sıklıkla bir toparlanmadan önce gelen kapitülasyon satışına işaret edebilir. Bir tepenin yakınındaki sıçrama, büyük sahiplerce dağıtıma işaret edebilir. Günlük yerine 15 dakikalık veri kullanmak neredeyse gerçek zamanlı koşulları yansıtır.`,
    desc_btc_corr_tech:`Bu coinin günlük getirileri ile Bitcoin\u2019in son 30 gündeki getirileri arasındaki Pearson korelasyon katsayısı. Düşük korelasyon (0,5 altı) coinin BTC\u2019den bağımsız hareket ettiğini gösterir; bu, geniş piyasa hareketi yerine coine özgü güç veya zayıflığa işaret edebilir.`,
    desc_alt_short_val:`SHORT modunda altcoinler için tahmini aşırı değerleme göstergesi. Mevcut fiyatın tahmini gerçekleşen fiyatın ne kadar üzerinde olduğunu ölçer — ne kadar yüksekse o kadar aşırı ısınmış ve SHORT için elverişli. ⚠️ Gerçekleşen fiyat bir tahmindir, canlı zincir üstü veri değildir.`,
    desc_alt_short_ath:`Altcoin SHORT zamanlaması için aşırı ısınma sinyali olarak kullanılan, tüm zamanların en yüksek seviyesine (ATH) olan uzaklık. ATH\u2019ye yakın olmak (-15% içinde) tarihsel olarak yerel tepelerle ve SHORT için daha yüksek elverişlilikle örtüşür.`,
    ind_btc_corr:'BTC Dominansı — Alt Döngü', desc_btc_corr:`Bitcoin\u2019in piyasa değeri dominansını, daha geniş alt döngü konumunun bir vekili olarak izler. BTC dominansı yüksek olduğunda (%55+) sermaye Bitcoin\u2019de yoğunlaşır ve altcoinler genellikle daha az getiri sağlar — çoğu zaman alt döngüsünün henüz başlamadığının işaretidir. Dominans düştüğünde (%50 altı) sermaye altcoinlere döner; bu tarihsel olarak "alt sezonu" ile ilişkilendirilir.`,
    desc_alt_valuation:`Altcoinler için tahmini değerleme göstergesi. BTC/ETH/BNB\u2019nin aksine, bu coinin güvenilir zincir üstü MVRV Z-Score verisi yoktur, bu yüzden vekil olarak fiyat vs. tahmini gerçekleşen fiyat kullanırız.

⚠️ Önemli: bu coinin tahmini gerçekleşen fiyatı, canlı zincir üstü veriyle değil 200 haftalık hareketli ortalama (200H HO) ile yaklaşık hesaplanır. 200H HO, zincir üstü gerçekleşen fiyatı yakından takip eden yaygın bir vekildir ama kesin veriden farklıdır. Yalnızca yönsel sinyal olarak kullanın.

Tahmini gerçekleşen fiyatın altında = olası düşük değerleme bölgesi.`,
    desc_alt_drawdown:`Güvenilir zincir üstü kar/zarar verisi olmayan altcoinlerde NUPL yerine kullanılan, tüm zamanların en yüksek seviyesine (ATH) olan uzaklık.

ATH\u2019den derin düşüşler (%70+) tarihsel olarak büyük altcoinler için döngü diplerine denk gelmiştir, ancak bu coine göre önemli ölçüde değişir.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Vadeli-Spot Farkı',
    ind_cbp:'Coinbase Premium', ind_lth:'% LTH Arzı', ind_dom:'BTC Dominansı',
    ind_halving:'Halving Döngüsü',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Aşırı Isınma', ind_sell_nupl:'NUPL — Açgözlülük Seviyesi',
    ind_sell_funding:'Vadeli Primi', ind_sell_fg:'SOPR LTH-STH Spreadi',
    desc_sell_fg:`SOPR LTH-STH Spreadi, uzun ve kısa vadeli sahiplerin kar realizasyonu davranışı arasındaki farkı ölçer.
Büyük pozitif bir spread, kısa vadeli sahiplerin uzun vadelilere göre çok daha hızlı kar realize ettiği anlamına gelir — erken bir dağıtım sinyali.

SHORT bölgesi: spread ≥ 0,15 (STH agresif satarken LTH tutuyor)
Güvenli bölge: spread ≤ 0,02 (uyumlu davranış, dağıtım sinyali yok)

Mevcut: STH, LTH\u2019ye göre önemli kar realize ediyor → dağıtım başlıyor olabilir.`,
    ind_sell_sopr:'STH-SOPR — Kar Realizasyonu', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ZİNCİR ÜSTÜ DEĞERLEME', sec_miner:'MADENCİ / DUYGU',
    sec_inst:'KURUMSAL AKIŞ', sec_cycle:'DÖNGÜ KONUMU',
    sec_breakdown:'Puan Dökümü', sec_triggers:'Sonraki Tetikleyiciler',
    sec_sellTriggers:'Satış Sinyali Tetikleyicileri', sec_macro:'MAKRO UYARILARI',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TÜMÜ →', loadingInsights:'Yükleniyor...', loadMoreInsights:'Daha Fazla', collapseInsights:'Daralt',
    sec_history:'Puan Geçmişi', sec_histSub:'Tarayıcıda yerel olarak kaydedildi',
    histH:'Saat', histD:'Gün', histM:'Ay',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Puanı, Bitcoin\u2019in gerçekleşen değerine göre ne kadar aşırı veya düşük değerli olduğunu ölçer. \n• < 0: Tarihsel olarak düşük değerli (dip bölgesi) → Güçlü alım\n• 0~1: Hafif düşük değerli → Biriktirme bölgesi  \n• 1~3: Adil değer → Nötr\n• > 3: Aşırı değerli (tepe bölgesi) → Satışı düşün\nMevcut faz: 0,27 — Dibe yakın. Tarihsel olarak 0,5 altı değerler büyük boğa piyasalarından önce gelmiştir.",
    desc_nupl:"NUPL (Net Gerçekleşmemiş Kar/Zarar) tüm BTC sahiplerinin genel kar/zarar durumunu gösterir.\n• < 0% (Kapitülasyon): Sahipler zararda → Aşırı alım sinyali\n• 0~25% (Umut/Korku): Dipten toparlanma → Alım bölgesi  \n• 25~50% (İyimserlik): Döngü ortası → Nötr\n• 50~75% (İnanç/Açgözlülük): Döngü sonu → İzle\n• > 75% (Öfori): Maksimum açgözlülük → Satış sinyali",
    desc_realized:"Mevcut fiyatın tüm BTC sahiplerinin ortalama maliyet tabanından (Gerçekleşen Fiyat) ne kadar uzak olduğunu gösterir.\n• 0% altında: Fiyat ortalama maliyetin altında → Panik bölgesi, en güçlü alım\n• 0~5%: Gerçekleşen fiyata yakın → İdeal giriş\n• 5~20%: Orta prim → Kabul edilebilir\n• > 20%: Yüksek prim → Dikkat",
    desc_hash:"Hash Ribbon, Bitcoin madencilik hash oranının momentumunu izler (30 günlük vs 60 günlük hareketli ortalama).\n• Kapitülasyon: Zayıf madenciler kapanıyor (30HO < 60HO) → Dip oluşuyor\n• Toparlanma Kesişimi: 30HO, 60HO\u2019yu yukarı keser → En güvenilir öncü alım sinyali (2~4 hafta önceden)\nTarihsel doğruluk: 2016, 2018, 2020 ve 2022 diplerini mükemmel işaretledi.",
    desc_sopr:"Kısa Vadeli Sahip SOPR\u2019u, son alıcıların karla mı zararla mı sattığını ölçer.\n• < 0,95: Ağır zararla panik satışı → Kapitülasyon = alım sinyali\n• 0,95~1,0: Hafif zarar realizasyonu → Dibe yakın\n• 1,0~1,03: Nötr kar realizasyonu\n• > 1,05: Güçlü kar realizasyonu → Dağıtım = tepe sinyali",
    desc_funding:"Vadeli-Spot Farkı = (Vadeli Mark Fiyatı - Spot Endeks Fiyatı) / Spot Fiyat\n8 saatlik takas gecikmesi olmadan gerçek zamanlı kaldıraç konumlanmasını gösterir.\n• Negatif (backwardation): Vadeli spottan ucuz → Aşırı short → Öncü alım sinyali\n• ±0,01%: Nötr (BTC için normal aralık)\n• > 0,05%: Contango → Aşırı long → Dikkat\n• > 0,15%: Aşırı contango → Tepe sinyali",
    desc_cbp:"Coinbase Premium = (Coinbase BTC Fiyatı - Binance BTC Fiyatı) / Binance Fiyatı\nABD kurumsal talebini gerçek zamanlı yansıtır. ETF akış verisinden 2~3 gün önde gider.\n• Pozitif: ABD kurumları alıyor → Boğa\n• Sıfıra yakın: İzliyor/nötr\n• Negatif: Kurumlar kenarda → Kısa vadeli ayı\nMevcut: Negatif (46+ ardışık gün) → Kurumlar makro netlik bekliyor.",
    desc_lth:"% Uzun Vadeli Sahip Arzı = 155+ gün hareketsiz adreslerdeki BTC arzının yüzdesi.\n• > 75%: Balinalar agresif biriktiriyor → Güçlü alım sinyali\n• 70~75%: Normal biriktirme\n• < 70%: Dağıtım (balinalar satıyor)\nRekor seviyeler (%79) akıllı paranın satmadığı anlamına gelir — talep döndüğünde arz şoku gelecek.",
    desc_dom:"BTC Dominansı = BTC piyasa değeri / Toplam kripto piyasa değeri\nSermaye altcoinlerden Bitcoin\u2019e aktığında yükselir — büyük boğa piyasalarından önceki tipik desen.\n• 55~63% (CoinGecko bazlı): BTC sezonu → Sermaye BTC\u2019de yoğunlaşıyor → Alım bölgesi\n• < 50%: Alt sezonu → Risk açık\n• > 65%: Aşırı BTC dominansı → Yaklaşan alt rotasyonuna işaret edebilir",
    desc_halving:"Bitcoin halvingleri madencilik ödüllerini her ~4 yılda %50 azaltır ve arz şokları yaratır.\nTarihsel dip zamanlaması:\n• 2015 dibi: 2016 halvinginden 18 ay önce\n• 2018 dibi: 2020 halvinginden 17 ay önce  \n• 2022 dibi: 2024 halvinginden 17 ay önce\n• Mevcut: Nisan 2028 halvinginden ~21 ay önce → Dip penceresinin merkezinde.",
    // Alert labels
    alertTitle:'Uyarı Ayarları',
    alertDesc:'Koşullar sağlandığında tarayıcı push bildirimi + görsel flaş + ses ile bildirim alın.',
    alertBuySection:'📈 LONG TETİKLEYİCİLERİ', alertSellSection:'📉 SHORT TETİKLEYİCİLERİ',
    a2:'Long Puanı ≥ 6.0 (Kademeli başlat)',
    a3:'Long Puanı ≥ 7.0 (Pozisyon artır)', a4:'Long Puanı ≥ 8.0 (Agresif alım)',
    a5:'MVRV Z ≤ 0 — Tam dip bölgesi', a6:'NUPL 0% altında — Kapitülasyon',
    a7:'Vadeli farkı negatife döner (backwardation)', a8:'Hash Ribbon toparlanma kesişimi',
    a9:'Coinbase Premium pozitife döner',
    b1:'Short Puanı ≥ 6.0 (Short hazırla)', b2:'Short Puanı ≥ 7.0 (Short artır)',
    b3:'Short Puanı ≥ 8.0 (Tam short)', b4:'MVRV Z ≥ 3.5 — Öfori bölgesi',
    b5:'NUPL ≥ 75% — Aşırı açgözlülük', b6:'Korku ve Açgözlülük ≥ 80',
    b7:'Vadeli contango ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Fiyat şunun altına düşünce uyar $', priceAbove:'Fiyat şunun üstüne çıkınca uyar $',
    enableNotif:'Tarayıcı Bildirimlerini Etkinleştir',
    ind_sell_lth:'LTH Arzı — Dağıtım', ind_sell_dom:'BTC Dominansı — Risk',
    ind_sell_halving:'Halving — Döngü Fazı', ind_sell_ath:'ATH Yakınlığı — Tepe Riski',
    ind_sell_mvrv:'MVRV Z — Aşırı Isınma', ind_sell_nupl:'NUPL — Açgözlülük',
    ind_sell_funding:'Vadeli Primi', ind_sell_fg:'SOPR LTH-STH Spreadi',
    desc_sell_fg:`SOPR LTH-STH Spreadi, uzun ve kısa vadeli sahiplerin kar realizasyonu davranışı arasındaki farkı ölçer.
Büyük pozitif bir spread, kısa vadeli sahiplerin uzun vadelilere göre çok daha hızlı kar realize ettiği anlamına gelir — erken bir dağıtım sinyali.

SHORT bölgesi: spread ≥ 0,15 (STH agresif satarken LTH tutuyor)
Güvenli bölge: spread ≤ 0,02 (uyumlu davranış, dağıtım sinyali yok)

Mevcut: STH, LTH\u2019ye göre önemli kar realize ediyor → dağıtım başlıyor olabilir.`,
    ind_sell_sopr:'STH-SOPR — Kar Realizasyonu', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  vi: {
    exchBannerT:"Bắt đầu với sàn nào?", exchBannerD:"So sánh Binance & Bybit + giảm phí",
    // NAV
    navInsights:'Blog',
    navGlossary:'Từ điển',
    footerPrivacy:'Chính sách bảo mật', footerTerms:'Điều khoản dịch vụ', footerDisclaimer:'Không phải lời khuyên tài chính',
    whyBtnLabel:'Tại sao?', whyTopTitle:'Đóng góp hàng đầu', whyBottomTitle:'Đang kìm hãm', histToday:'Hôm nay', histYesterday:'Hôm qua', histWeekAgo:'Tuần trước',
    buyTiming:'📈 Thời điểm LONG', sellTiming:'📉 Thời điểm SHORT',
    livePriceLabel:'Giá · Binance', fgLabel:'Sợ hãi & Tham lam',
    rpLabel:'Chênh lệch Giá Thực hiện', maLabel:'MA 200T (tham chiếu)',
    splitPlan:'Kế hoạch Vào lệnh Từng phần', splitTitle:'Phân bổ theo Giai đoạn',
    splitStep1:(s)=>`Bây giờ (Điểm ${s})`, splitStep2:'Hash Ribbon Phục hồi',
    splitStep3:'Coinbase Premium → Dương', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Đã cập nhật',
    footerSources:'Tự động lấy', footerDisclaimer2:'Việc thu thập on-chain có thể dùng giá trị dự phòng. Lịch sử điểm được lưu trong localStorage của trình duyệt. Không phải lời khuyên tài chính.',
    tkDomLabel:'Thống trị BTC', tkMcapLabel:'Vốn hóa', tkVolLabel:'Khối lượng 24h', bkTotalLabel:'Tổng → /10',
    seoH1:'Điểm Thời Điểm Mua/Bán Bitcoin & Altcoin Theo Thời Gian Thực', seoSub:'Tín hiệu thời điểm 0–10 theo thời gian thực, kết hợp các chỉ báo on-chain, miễn phí.',
    // Mode labels
    modeTitle_buy:'ĐIỂM THỜI ĐIỂM LONG', modeTitle_sell:'THƯỚC ĐO ÁP LỰC BÁN',
    modeSub_buy:'Mô hình vào long ở đáy chu kỳ', modeSub_sell:'Mô hình thời điểm vào short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Cách đọc Điểm Bán',
    sellExplain_low:'🟢 THẤP (0~3): Thị trường ở vùng đáy. Không có tín hiệu thoát. Giữ hoặc tích lũy.',
    sellExplain_mid:'🟡 TRUNG BÌNH (4~6): Thị trường đang nóng lên. Theo dõi để giảm một phần.',
    sellExplain_high:'🔴 CAO (7~10): Tín hiệu bán mạnh. Thoát long / Cân nhắc vào short.',
    // Indicator names (buy)
    ind_mvrv_z:'Điểm Z MVRV', ind_nupl:'NUPL', ind_realized:'Chênh lệch Giá Thực hiện',
    ind_alt_valuation:'Giá vs Giá Thực hiện Ước tính (MA 200T)', ind_alt_drawdown:'Sụt giảm từ ATH',
    tab_dashboard:'Trực tiếp', tab_coins:'Tìm kiếm', tab_blog:'Blog',
    ind_alt_short_val:'Giá vs Thực hiện Ước tính (Short)', ind_alt_short_ath:'Gần ATH — Quá nóng',
    ind_rsi:'RSI (14n)', ind_vol_change:'Tăng tốc Khối lượng (15p vs 1g/4g)', ind_btc_corr_tech:'Tương quan BTC (30n)',
    ind_buy_pressure:'Khối lượng Trực tiếp do Mua dẫn dắt — FOMO', ind_sell_pressure:'Khối lượng Trực tiếp do Bán dẫn dắt — Đầu hàng',
    desc_buy_pressure:`Tỷ lệ khối lượng của các nến 15 phút gần nhất được thúc đẩy bởi lực mua chủ động. Tỷ lệ cao (65%+) kết hợp với đột biến khối lượng và nến xanh có thể báo hiệu quá nóng do FOMO gần đỉnh cục bộ. Dùng dữ liệu 15 phút thay vì hàng ngày, phản ánh điều kiện gần thời gian thực (độ trễ 15p–1g so với tối đa 24g cho khối lượng hàng ngày).`,
    desc_sell_pressure:`Tỷ lệ khối lượng của các nến 15 phút gần nhất được thúc đẩy bởi lực bán chủ động. Tỷ lệ cao (58%+) kết hợp với đột biến khối lượng và nến đỏ có thể báo hiệu đợt bán đầu hàng thường xảy ra trước một đợt hồi phục gần đáy cục bộ. Dùng dữ liệu 15 phút thay vì hàng ngày, phản ánh điều kiện gần thời gian thực.`,
    desc_rsi:`Chỉ số Sức mạnh Tương đối 14 ngày, một dao động động lượng đo tốc độ và mức độ thay đổi giá gần đây. RSI dưới 30 cho thấy quá bán (thường là tín hiệu đáy), trong khi trên 70 cho thấy quá mua (thường là tín hiệu đỉnh). Áp dụng như nhau cho mọi đồng vì hoàn toàn dựa trên giá.`,
    desc_vol_change:`So sánh khối lượng nến 15 phút gần nhất với trung bình 1 giờ và 4 giờ. Một đột biến lớn kết hợp với giá gần mức thấp có thể báo hiệu đợt bán đầu hàng thường xảy ra trước một đợt hồi phục. Đột biến gần mức cao có thể báo hiệu phân phối bởi các tay to. Dùng dữ liệu 15 phút thay vì hàng ngày phản ánh điều kiện gần thời gian thực.`,
    desc_btc_corr_tech:`Hệ số tương quan Pearson giữa lợi nhuận hàng ngày của đồng này và của Bitcoin trong 30 ngày qua. Tương quan thấp (dưới 0,5) cho thấy đồng này di chuyển độc lập với BTC, có thể chỉ ra sức mạnh hoặc điểm yếu riêng của đồng thay vì biến động thị trường chung.`,
    desc_alt_short_val:`Chỉ báo định giá quá cao ước tính cho altcoin ở chế độ SHORT. Đo giá hiện tại cao hơn giá thực hiện ước tính bao nhiêu — càng cao càng quá nóng và thuận lợi cho SHORT. ⚠️ Giá thực hiện là ước tính, không phải dữ liệu on-chain trực tiếp.`,
    desc_alt_short_ath:`Khoảng cách từ mức cao nhất mọi thời đại (ATH), dùng làm tín hiệu quá nóng cho thời điểm SHORT của altcoin. Ở gần ATH (trong -15%) về mặt lịch sử trùng với đỉnh cục bộ và mức thuận lợi cao hơn cho SHORT.`,
    ind_btc_corr:'Thống trị BTC — Chu kỳ Alt', desc_btc_corr:`Theo dõi mức thống trị vốn hóa của Bitcoin như một chỉ báo về vị trí của chu kỳ alt rộng hơn. Khi thống trị BTC cao (55%+), vốn tập trung vào Bitcoin và altcoin có xu hướng kém hơn — thường là dấu hiệu chu kỳ alt chưa bắt đầu. Khi thống trị giảm (dưới 50%), vốn xoay sang altcoin, về mặt lịch sử gắn với "mùa alt".`,
    desc_alt_valuation:`Chỉ báo định giá ước tính cho altcoin. Khác với BTC/ETH/BNB, đồng này không có dữ liệu MVRV Z-Score on-chain đáng tin cậy, nên chúng tôi dùng giá vs. giá thực hiện ước tính làm chỉ báo thay thế.

⚠️ Quan trọng: giá thực hiện ước tính của đồng này được xấp xỉ bằng trung bình động 200 tuần (MA 200T), không phải dữ liệu on-chain trực tiếp. MA 200T là chỉ báo thay thế được dùng rộng rãi, bám sát giá thực hiện on-chain nhưng khác với dữ liệu chính xác. Chỉ dùng như tín hiệu định hướng.

Dưới giá thực hiện ước tính = vùng có thể bị định giá thấp.`,
    desc_alt_drawdown:`Khoảng cách từ mức cao nhất mọi thời đại (ATH), dùng thay cho NUPL ở các altcoin không có dữ liệu lãi/lỗ on-chain đáng tin cậy.

Các đợt sụt sâu (70%+) từ ATH về mặt lịch sử trùng với đáy chu kỳ của các altcoin lớn, tuy điều này khác biệt đáng kể tùy đồng.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Chênh lệch Tương lai-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Nguồn cung LTH', ind_dom:'Thống trị BTC',
    ind_halving:'Chu kỳ Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Quá nóng', ind_sell_nupl:'NUPL — Mức Tham lam',
    ind_sell_funding:'Phần bù Tương lai', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH đo khoảng cách giữa hành vi chốt lời của người nắm giữ dài hạn và ngắn hạn.
Spread dương lớn nghĩa là người nắm giữ ngắn hạn đang chốt lời nhanh hơn nhiều so với dài hạn — tín hiệu sớm của phân phối.

Vùng SHORT: spread ≥ 0,15 (STH bán mạnh trong khi LTH giữ)
Vùng an toàn: spread ≤ 0,02 (hành vi đồng nhất, không có tín hiệu phân phối)

Hiện tại: STH chốt lời đáng kể so với LTH → phân phối có thể đang bắt đầu.`,
    ind_sell_sopr:'STH-SOPR — Chốt lời', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ĐỊNH GIÁ ON-CHAIN', sec_miner:'THỢ ĐÀO / TÂM LÝ',
    sec_inst:'DÒNG TIỀN TỔ CHỨC', sec_cycle:'VỊ TRÍ CHU KỲ',
    sec_breakdown:'Phân tích Điểm', sec_triggers:'Kích hoạt Tiếp theo',
    sec_sellTriggers:'Kích hoạt Tín hiệu Bán', sec_macro:'CẢNH BÁO VĨ MÔ',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TẤT CẢ →', loadingInsights:'Đang tải...', loadMoreInsights:'Xem thêm', collapseInsights:'Thu gọn',
    sec_history:'Lịch sử Điểm', sec_histSub:'Lưu cục bộ trên trình duyệt',
    histH:'Giờ', histD:'Ngày', histM:'Tháng',
    // Indicator detailed descriptions
    desc_mvrv_z:"Điểm Z MVRV đo mức Bitcoin bị định giá cao hay thấp so với giá trị thực hiện của nó. \n• < 0: Định giá thấp về mặt lịch sử (vùng đáy) → Mua mạnh\n• 0~1: Định giá hơi thấp → Vùng tích lũy  \n• 1~3: Giá trị hợp lý → Trung lập\n• > 3: Định giá cao (vùng đỉnh) → Cân nhắc bán\nGiai đoạn hiện tại: 0,27 — Gần đáy. Về mặt lịch sử, giá trị dưới 0,5 đã đi trước các thị trường tăng lớn.",
    desc_nupl:"NUPL (Lãi/Lỗ Ròng Chưa thực hiện) cho thấy trạng thái lãi/lỗ tổng thể của tất cả người nắm giữ BTC.\n• < 0% (Đầu hàng): Người nắm giữ đang lỗ → Tín hiệu mua cực mạnh\n• 0~25% (Hy vọng/Sợ hãi): Hồi phục từ đáy → Vùng mua  \n• 25~50% (Lạc quan): Giữa chu kỳ → Trung lập\n• 50~75% (Tin tưởng/Tham lam): Cuối chu kỳ → Theo dõi\n• > 75% (Hưng phấn): Tham lam tối đa → Tín hiệu bán",
    desc_realized:"Cho thấy giá hiện tại cách bao xa so với giá vốn trung bình của tất cả người nắm giữ BTC (Giá Thực hiện).\n• Dưới 0%: Giá dưới giá vốn trung bình → Vùng hoảng loạn, mua mạnh nhất\n• 0~5%: Gần giá thực hiện → Điểm vào lý tưởng\n• 5~20%: Phần bù vừa phải → Chấp nhận được\n• > 20%: Phần bù cao → Thận trọng",
    desc_hash:"Hash Ribbon theo dõi động lượng hash rate khai thác Bitcoin (trung bình động 30 ngày vs 60 ngày).\n• Đầu hàng: Thợ đào yếu đóng cửa (30MA < 60MA) → Đang tạo đáy\n• Giao cắt Phục hồi: 30MA cắt lên trên 60MA → Tín hiệu mua dẫn dắt đáng tin cậy nhất (báo trước 2~4 tuần)\nĐộ chính xác lịch sử: Đánh dấu hoàn hảo các đáy 2016, 2018, 2020 và 2022.",
    desc_sopr:"SOPR của Người nắm giữ Ngắn hạn đo xem người mua gần đây đang bán lãi hay lỗ.\n• < 0,95: Bán hoảng loạn với lỗ nặng → Đầu hàng = tín hiệu mua\n• 0,95~1,0: Chốt lỗ nhẹ → Gần đáy\n• 1,0~1,03: Chốt lời trung lập\n• > 1,05: Chốt lời mạnh → Phân phối = tín hiệu đỉnh",
    desc_funding:"Chênh lệch Tương lai-Spot = (Giá Mark Tương lai - Giá Chỉ số Spot) / Giá Spot\nCho thấy vị thế đòn bẩy thời gian thực mà không có độ trễ thanh toán 8 giờ.\n• Âm (backwardation): Tương lai rẻ hơn spot → Quá tải short → Tín hiệu mua dẫn dắt\n• ±0,01%: Trung lập (khoảng bình thường cho BTC)\n• > 0,05%: Contango → Quá tải long → Thận trọng\n• > 0,15%: Contango cực đoan → Tín hiệu đỉnh",
    desc_cbp:"Coinbase Premium = (Giá BTC Coinbase - Giá BTC Binance) / Giá Binance\nPhản ánh nhu cầu tổ chức Mỹ theo thời gian thực. Đi trước dữ liệu dòng tiền ETF 2~3 ngày.\n• Dương: Tổ chức Mỹ đang mua → Tăng giá\n• Gần 0: Đang quan sát/trung lập\n• Âm: Tổ chức đứng ngoài → Giảm giá ngắn hạn\nHiện tại: Âm (46+ ngày liên tiếp) → Tổ chức chờ sự rõ ràng vĩ mô.",
    desc_lth:"% Nguồn cung Người nắm giữ Dài hạn = phần trăm nguồn cung BTC nằm trong các địa chỉ không hoạt động 155+ ngày.\n• > 75%: Cá voi tích lũy mạnh → Tín hiệu mua mạnh\n• 70~75%: Tích lũy bình thường\n• < 70%: Phân phối (cá voi đang bán)\nMức kỷ lục (79%) nghĩa là tiền thông minh không bán — cú sốc nguồn cung sẽ đến khi nhu cầu quay lại.",
    desc_dom:"Thống trị BTC = Vốn hóa BTC / Tổng vốn hóa thị trường crypto\nTăng khi vốn chảy từ altcoin sang Bitcoin — mô hình điển hình trước các thị trường tăng lớn.\n• 55~63% (theo CoinGecko): Mùa BTC → Vốn củng cố vào BTC → Vùng mua\n• < 50%: Mùa alt → Bật rủi ro\n• > 65%: Thống trị BTC cực đoan → Có thể báo hiệu xoay vòng alt sắp tới",
    desc_halving:"Các đợt halving của Bitcoin giảm phần thưởng khai thác 50% mỗi ~4 năm, tạo cú sốc nguồn cung.\nThời điểm đáy lịch sử:\n• Đáy 2015: 18 tháng trước halving 2016\n• Đáy 2018: 17 tháng trước halving 2020  \n• Đáy 2022: 17 tháng trước halving 2024\n• Hiện tại: ~21 tháng trước halving tháng 4/2028 → Ở giữa cửa sổ đáy.",
    // Alert labels
    alertTitle:'Cài đặt Cảnh báo',
    alertDesc:'Nhận thông báo qua push trình duyệt + nhấp nháy hình ảnh + âm thanh khi điều kiện được đáp ứng.',
    alertBuySection:'📈 KÍCH HOẠT LONG', alertSellSection:'📉 KÍCH HOẠT SHORT',
    a2:'Điểm Long ≥ 6.0 (Bắt đầu từng phần)',
    a3:'Điểm Long ≥ 7.0 (Tăng vị thế)', a4:'Điểm Long ≥ 8.0 (Mua mạnh)',
    a5:'MVRV Z ≤ 0 — Vùng đáy hoàn toàn', a6:'NUPL dưới 0% — Đầu hàng',
    a7:'Chênh lệch tương lai thành âm (backwardation)', a8:'Giao cắt phục hồi Hash Ribbon',
    a9:'Coinbase Premium thành dương',
    b1:'Điểm Short ≥ 6.0 (Chuẩn bị short)', b2:'Điểm Short ≥ 7.0 (Tăng short)',
    b3:'Điểm Short ≥ 8.0 (Short toàn phần)', b4:'MVRV Z ≥ 3.5 — Vùng hưng phấn',
    b5:'NUPL ≥ 75% — Tham lam cực độ', b6:'Sợ hãi & Tham lam ≥ 80',
    b7:'Contango tương lai ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Cảnh báo khi giá xuống dưới $', priceAbove:'Cảnh báo khi giá lên trên $',
    enableNotif:'Bật Thông báo Trình duyệt',
    ind_sell_lth:'Nguồn cung LTH — Phân phối', ind_sell_dom:'Thống trị BTC — Rủi ro',
    ind_sell_halving:'Halving — Pha Chu kỳ', ind_sell_ath:'Gần ATH — Rủi ro Đỉnh',
    ind_sell_mvrv:'MVRV Z — Quá nóng', ind_sell_nupl:'NUPL — Tham lam',
    ind_sell_funding:'Phần bù Tương lai', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH đo khoảng cách giữa hành vi chốt lời của người nắm giữ dài hạn và ngắn hạn.
Spread dương lớn nghĩa là người nắm giữ ngắn hạn đang chốt lời nhanh hơn nhiều so với dài hạn — tín hiệu sớm của phân phối.

Vùng SHORT: spread ≥ 0,15 (STH bán mạnh trong khi LTH giữ)
Vùng an toàn: spread ≤ 0,02 (hành vi đồng nhất, không có tín hiệu phân phối)

Hiện tại: STH chốt lời đáng kể so với LTH → phân phối có thể đang bắt đầu.`,
    ind_sell_sopr:'STH-SOPR — Chốt lời', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  id: {
    exchBannerT:"Mulai dari bursa mana?", exchBannerD:"Bandingkan Binance & Bybit + diskon biaya",
    // NAV
    navInsights:'Blog',
    navGlossary:'Glosarium',
    footerPrivacy:'Kebijakan Privasi', footerTerms:'Ketentuan Layanan', footerDisclaimer:'Bukan nasihat keuangan',
    whyBtnLabel:'Kenapa?', whyTopTitle:'Kontributor teratas', whyBottomTitle:'Faktor penahan', histToday:'Hari ini', histYesterday:'Kemarin', histWeekAgo:'Minggu lalu',
    buyTiming:'📈 Timing LONG', sellTiming:'📉 Timing SHORT',
    livePriceLabel:'Harga · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Selisih Realized Price', maLabel:'MA 200M (ref)',
    splitPlan:'Rencana Entry Bertahap', splitTitle:'Alokasi per Tahap',
    splitStep1:(s)=>`Sekarang (Skor ${s})`, splitStep2:'Pemulihan Hash Ribbon',
    splitStep3:'Coinbase Premium → Positif', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Diperbarui',
    footerSources:'Diambil otomatis', footerDisclaimer2:'Scraping on-chain dapat memakai nilai cadangan. Riwayat skor disimpan di localStorage browser. Bukan nasihat keuangan.',
    tkDomLabel:'Dominasi BTC', tkMcapLabel:'Kapitalisasi Pasar', tkVolLabel:'Volume 24j', bkTotalLabel:'Total → /10',
    seoH1:'Skor Timing Beli/Jual Bitcoin & Altcoin Real-Time', seoSub:'Sinyal timing 0–10 real-time gratis yang menggabungkan indikator on-chain.',
    // Mode labels
    modeTitle_buy:'SKOR TIMING LONG', modeTitle_sell:'PENGUKUR TEKANAN JUAL',
    modeSub_buy:'Model entry long di dasar siklus', modeSub_sell:'Model timing entry short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Cara membaca Skor Jual',
    sellExplain_low:'🟢 RENDAH (0~3): Pasar di zona dasar. Tidak ada sinyal keluar. Tahan atau akumulasi.',
    sellExplain_mid:'🟡 SEDANG (4~6): Pasar memanas. Pantau untuk pengurangan sebagian.',
    sellExplain_high:'🔴 TINGGI (7~10): Sinyal jual kuat. Keluar dari long / Pertimbangkan entry short.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Selisih Realized Price',
    ind_alt_valuation:'Harga vs Realized Est. (200W MA)', ind_alt_drawdown:'Penurunan dari ATH',
    tab_dashboard:'Langsung', tab_coins:'Cari Koin', tab_blog:'Blog',
    ind_alt_short_val:'Harga vs Realized Est. (Short)', ind_alt_short_ath:'Kedekatan ATH — Overheat',
    ind_rsi:'RSI (14h)', ind_vol_change:'Akselerasi Volume (15m vs 1j/4j)', ind_btc_corr_tech:'Korelasi BTC (30h)',
    ind_buy_pressure:'Volume Live Dominasi Beli — FOMO', ind_sell_pressure:'Volume Live Dominasi Jual — Kapitulasi',
    desc_buy_pressure:`Proporsi volume candle 15 menit terakhir yang didorong pembelian agresif. Rasio tinggi (65%+) dipadu lonjakan volume dan candle hijau bisa menandakan overheat karena FOMO dekat puncak lokal. Memakai data 15 menit alih-alih harian, sehingga mencerminkan kondisi hampir real-time (jeda 15mnt–1j vs. hingga 24j untuk volume harian).`,
    desc_sell_pressure:`Proporsi volume candle 15 menit terakhir yang didorong penjualan agresif. Rasio tinggi (58%+) dipadu lonjakan volume dan candle merah bisa menandakan penjualan kapitulasi yang sering mendahului pembalikan dekat dasar lokal. Memakai data 15 menit alih-alih harian, sehingga mencerminkan kondisi hampir real-time.`,
    desc_rsi:`Relative Strength Index selama 14 hari, osilator momentum yang mengukur kecepatan dan besarnya perubahan harga terkini. RSI di bawah 30 menandakan kondisi oversold (sering jadi sinyal dasar), sedangkan di atas 70 menandakan overbought (sering jadi sinyal puncak). Berlaku sama untuk semua koin karena murni berbasis harga.`,
    desc_vol_change:`Membandingkan volume candle 15 menit terakhir dengan rata-rata 1 jam dan 4 jam. Lonjakan besar dipadu harga dekat titik rendah bisa menandakan penjualan kapitulasi yang sering mendahului pembalikan. Lonjakan dekat titik tinggi bisa menandakan distribusi oleh pemegang besar. Memakai data 15 menit alih-alih harian mencerminkan kondisi hampir real-time.`,
    desc_btc_corr_tech:`Koefisien korelasi Pearson antara return harian koin ini dengan Bitcoin selama 30 hari terakhir. Korelasi rendah (di bawah 0,5) menunjukkan koin bergerak independen dari BTC, yang bisa mengindikasikan kekuatan atau kelemahan khas koin itu, bukan pergerakan pasar secara luas.`,
    desc_alt_short_val:`Indikator estimasi overvaluasi untuk altcoin dalam mode SHORT. Mengukur seberapa jauh harga saat ini di atas realized price estimasi — makin tinggi, makin overheat dan mendukung SHORT. ⚠️ Realized price adalah estimasi, bukan data on-chain langsung.`,
    desc_alt_short_ath:`Jarak dari all-time high (ATH), dipakai sebagai sinyal overheat untuk timing SHORT altcoin. Berada dekat ATH (dalam -15%) secara historis bertepatan dengan puncak lokal dan meningkatnya peluang SHORT.`,
    ind_btc_corr:'Dominasi BTC — Siklus Alt', desc_btc_corr:`Melacak dominasi kapitalisasi pasar Bitcoin sebagai proksi posisi siklus altcoin yang lebih luas. Saat dominasi BTC tinggi (55%+), modal terkonsentrasi di Bitcoin dan altcoin cenderung tertinggal — sering menandakan siklus alt belum dimulai. Saat dominasi turun (di bawah 50%), modal berputar ke altcoin, secara historis dikaitkan dengan "alt season".`,
    desc_alt_valuation:`Indikator valuasi estimasi untuk altcoin. Tidak seperti BTC/ETH/BNB, koin ini tidak punya data MVRV Z-Score on-chain yang andal, jadi kami memakai harga vs. realized price estimasi sebagai proksi.

⚠️ Penting: realized price estimasi koin ini didekati memakai rata-rata bergerak 200 minggu (200W MA), bukan data on-chain langsung. 200W MA adalah proksi yang banyak dipakai dan mengikuti realized price on-chain secara dekat, tetapi berbeda dari data presisi. Pakai hanya sebagai sinyal arah.

Di bawah realized price estimasi = potensi zona undervaluasi.`,
    desc_alt_drawdown:`Jarak dari all-time high (ATH), dipakai sebagai pengganti NUPL pada altcoin tanpa data untung/rugi on-chain yang andal.

Penurunan dalam (70%+) dari ATH secara historis bertepatan dengan dasar siklus untuk altcoin utama, meski ini sangat bervariasi per koin.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Selisih Futures-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Suplai LTH', ind_dom:'Dominasi BTC',
    ind_halving:'Siklus Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Tingkat Keserakahan',
    ind_sell_funding:'Premium Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH mengukur jarak antara perilaku ambil untung pemegang jangka panjang dan jangka pendek.
Spread positif besar berarti pemegang jangka pendek merealisasikan untung jauh lebih cepat daripada jangka panjang — sinyal awal distribusi.

Zona SHORT: spread ≥ 0,15 (STH menjual agresif sementara LTH menahan)
Zona aman: spread ≤ 0,02 (perilaku selaras, tanpa sinyal distribusi)

Saat ini: STH merealisasikan untung signifikan dibanding LTH → distribusi mungkin mulai.`,
    ind_sell_sopr:'STH-SOPR — Ambil Untung', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALUASI ON-CHAIN', sec_miner:'PENAMBANG / SENTIMEN',
    sec_inst:'ALIRAN INSTITUSIONAL', sec_cycle:'POSISI SIKLUS',
    sec_breakdown:'Rincian Skor', sec_triggers:'Pemicu Level Berikutnya',
    sec_sellTriggers:'Pemicu Sinyal Jual', sec_macro:'PERINGATAN MAKRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'SEMUA →', loadingInsights:'Memuat...', loadMoreInsights:'Muat Lagi', collapseInsights:'Tutup',
    sec_history:'Riwayat Skor', sec_histSub:'Disimpan lokal di browser',
    histH:'Jam', histD:'Hari', histM:'Bulan',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score mengukur seberapa overvalued atau undervalued Bitcoin relatif terhadap realized value-nya. \n• < 0: Historis undervalued (zona dasar) → Beli kuat\n• 0~1: Sedikit undervalued → Zona akumulasi  \n• 1~3: Nilai wajar → Netral\n• > 3: Overvalued (zona puncak) → Pertimbangkan jual\nFase saat ini: 0,27 — Dekat dasar. Historis, nilai di bawah 0,5 mendahului bull run besar.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) menunjukkan kondisi untung/rugi keseluruhan semua pemegang BTC.\n• < 0% (Kapitulasi): Pemegang merugi → Sinyal beli ekstrem\n• 0~25% (Harapan/Takut): Pulih dari dasar → Zona beli  \n• 25~50% (Optimisme): Tengah siklus → Netral\n• 50~75% (Keyakinan/Serakah): Akhir siklus → Pantau\n• > 75% (Euforia): Puncak keserakahan → Sinyal jual",
    desc_realized:"Menunjukkan seberapa jauh harga saat ini dari basis biaya rata-rata semua pemegang BTC (Realized Price).\n• Di bawah 0%: Harga di bawah biaya rata-rata → Zona panik, beli terkuat\n• 0~5%: Dekat realized price → Entry ideal\n• 5~20%: Premium sedang → Bisa diterima\n• > 20%: Premium tinggi → Hati-hati",
    desc_hash:"Hash Ribbon melacak momentum hashrate penambangan Bitcoin (rata-rata bergerak 30 hari vs 60 hari).\n• Kapitulasi: Penambang lemah berhenti (30MA < 60MA) → Dasar terbentuk\n• Recovery Cross: 30MA memotong ke atas 60MA → Sinyal beli terdepan paling andal (2~4 minggu lebih awal)\nAkurasi historis: Menandai dengan tepat dasar 2016, 2018, 2020, 2022.",
    desc_sopr:"SOPR Pemegang Jangka Pendek mengukur apakah pembeli baru menjual untung atau rugi.\n• < 0,95: Panik jual dengan rugi berat → Kapitulasi = sinyal beli\n• 0,95~1,0: Realisasi rugi ringan → Dekat dasar\n• 1,0~1,03: Ambil untung netral\n• > 1,05: Ambil untung kuat → Distribusi = sinyal puncak",
    desc_funding:"Selisih Futures-Spot = (Harga Mark Futures - Harga Indeks Spot) / Harga Spot\nMenunjukkan posisi leverage real-time tanpa jeda settlement 8 jam.\n• Negatif (backwardation): Futures lebih murah dari spot → Short berlebih → Sinyal beli terdepan\n• ±0,01%: Netral (rentang normal BTC)\n• > 0,05%: Contango → Long berlebih → Hati-hati\n• > 0,15%: Contango ekstrem → Sinyal puncak",
    desc_cbp:"Coinbase Premium = (Harga BTC Coinbase - Harga BTC Binance) / Harga Binance\nMencerminkan permintaan institusi AS real-time. Mendahului data aliran ETF 2~3 hari.\n• Positif: Institusi AS membeli → Bullish\n• Dekat nol: Mengamati/netral\n• Negatif: Institusi menepi → Bearish jangka pendek\nSaat ini: Negatif (46+ hari beruntun) → Institusi menunggu kejelasan makro.",
    desc_lth:"% Suplai Pemegang Jangka Panjang = persentase suplai BTC di alamat tidak aktif 155+ hari.\n• > 75%: Whale akumulasi agresif → Sinyal beli kuat\n• 70~75%: Akumulasi normal\n• < 70%: Distribusi (whale menjual)\nLevel rekor (79%) berarti smart money tidak menjual — supply shock datang saat permintaan kembali.",
    desc_dom:"Dominasi BTC = kapitalisasi pasar BTC / total kapitalisasi pasar kripto\nNaik saat modal mengalir dari altcoin ke Bitcoin — pola khas sebelum bull run besar.\n• 55~63% (basis CoinGecko): BTC season → Modal konsolidasi ke BTC → Zona beli\n• < 50%: Alt season → Risk on\n• > 65%: Dominasi BTC ekstrem → Bisa menandakan rotasi alt mendekat",
    desc_halving:"Halving Bitcoin memangkas hadiah penambangan 50% tiap ~4 tahun, menciptakan supply shock.\nTiming dasar historis:\n• Dasar 2015: 18 bulan sebelum halving 2016\n• Dasar 2018: 17 bulan sebelum halving 2020  \n• Dasar 2022: 17 bulan sebelum halving 2024\n• Saat ini: ~22 bulan sebelum halving April 2028 → Di dalam jendela inti dasar.",
    // Alert labels
    alertTitle:'Pengaturan Alarm',
    alertDesc:'Dapatkan notifikasi via push browser + kilatan visual + suara saat kondisi terpenuhi.',
    alertBuySection:'📈 PEMICU LONG', alertSellSection:'📉 PEMICU SHORT',
    a2:'Skor Long ≥ 6.0 (Mulai bertahap)',
    a3:'Skor Long ≥ 7.0 (Tambah posisi)', a4:'Skor Long ≥ 8.0 (Beli agresif)',
    a5:'MVRV Z ≤ 0 — Zona dasar penuh', a6:'NUPL di bawah 0% — Kapitulasi',
    a7:'Selisih futures jadi negatif (backwardation)', a8:'Recovery cross Hash Ribbon',
    a9:'Coinbase Premium jadi positif',
    b1:'Skor Short ≥ 6.0 (Siapkan short)', b2:'Skor Short ≥ 7.0 (Tambah short)',
    b3:'Skor Short ≥ 8.0 (Short penuh)', b4:'MVRV Z ≥ 3.5 — Zona euforia',
    b5:'NUPL ≥ 75% — Serakah ekstrem', b6:'Fear & Greed ≥ 80',
    b7:'Contango futures ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alarm saat harga turun di bawah $', priceAbove:'Alarm saat harga naik di atas $',
    enableNotif:'Aktifkan Notifikasi Browser',
    ind_sell_lth:'Suplai LTH — Distribusi', ind_sell_dom:'Dominasi BTC — Risiko',
    ind_sell_halving:'Halving — Fase Siklus', ind_sell_ath:'Kedekatan ATH — Risiko Puncak',
    ind_sell_mvrv:'MVRV Z — Overheat', ind_sell_nupl:'NUPL — Keserakahan',
    ind_sell_funding:'Premium Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH mengukur jarak antara perilaku ambil untung pemegang jangka panjang dan jangka pendek.
Spread positif besar berarti pemegang jangka pendek merealisasikan untung jauh lebih cepat daripada jangka panjang — sinyal awal distribusi.

Zona SHORT: spread ≥ 0,15 (STH menjual agresif sementara LTH menahan)
Zona aman: spread ≤ 0,02 (perilaku selaras, tanpa sinyal distribusi)

Saat ini: STH merealisasikan untung signifikan dibanding LTH → distribusi mungkin mulai.`,
    ind_sell_sopr:'STH-SOPR — Ambil Untung', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  pl: {
    exchBannerT:"Od której giełdy zacząć?", exchBannerD:"Porównaj Binance i Bybit + zniżka na prowizje",
    // NAV
    navInsights:'Blog',
    navGlossary:'Słownik',
    footerPrivacy:'Polityka Prywatności', footerTerms:'Warunki Usługi', footerDisclaimer:'To nie porada finansowa',
    whyBtnLabel:'Dlaczego?', whyTopTitle:'Główni sprawcy wzrostu', whyBottomTitle:'Czynniki hamujące', histToday:'Dziś', histYesterday:'Wczoraj', histWeekAgo:'Tydzień temu',
    buyTiming:'📈 Timing LONG', sellTiming:'📉 Timing SHORT',
    livePriceLabel:'Cena · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Różnica Realized Price', maLabel:'MA 200T (ref)',
    splitPlan:'Plan Wejścia Etapami', splitTitle:'Alokacja wg Etapu',
    splitStep1:(s)=>`Teraz (Wynik ${s})`, splitStep2:'Odbicie Hash Ribbon',
    splitStep3:'Coinbase Premium → Dodatni', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Zaktualizowano',
    footerSources:'Pobierane automatycznie', footerDisclaimer2:'Scraping on-chain może używać wartości zapasowych. Historia wyników zapisana w localStorage przeglądarki. To nie porada finansowa.',
    tkDomLabel:'Dominacja BTC', tkMcapLabel:'Kapitalizacja', tkVolLabel:'Wolumen 24h', bkTotalLabel:'Suma → /10',
    seoH1:'Wynik Timingu Kupna/Sprzedaży Bitcoina i Altcoinów w Czasie Rzeczywistym', seoSub:'Darmowy sygnał timingu 0–10 w czasie rzeczywistym łączący wskaźniki on-chain.',
    // Mode labels
    modeTitle_buy:'WYNIK TIMINGU LONG', modeTitle_sell:'MIERNIK PRESJI SPRZEDAŻY',
    modeSub_buy:'Model wejścia long na dnie cyklu', modeSub_sell:'Model timingu wejścia short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Jak czytać Wynik Sprzedaży',
    sellExplain_low:'🟢 NISKI (0~3): Rynek w strefie dna. Brak sygnału wyjścia. Trzymaj lub akumuluj.',
    sellExplain_mid:'🟡 ŚREDNI (4~6): Rynek się rozgrzewa. Obserwuj pod kątem częściowej redukcji.',
    sellExplain_high:'🔴 WYSOKI (7~10): Silny sygnał sprzedaży. Wyjdź z long / Rozważ wejście short.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Różnica Realized Price',
    ind_alt_valuation:'Cena vs Realized Szac. (200W MA)', ind_alt_drawdown:'Spadek od ATH',
    tab_dashboard:'Na żywo', tab_coins:'Znajdź', tab_blog:'Blog',
    ind_alt_short_val:'Cena vs Realized Szac. (Short)', ind_alt_short_ath:'Bliskość ATH — Przegrzanie',
    ind_rsi:'RSI (14d)', ind_vol_change:'Przyspieszenie Wolumenu (15m vs 1h/4h)', ind_btc_corr_tech:'Korelacja z BTC (30d)',
    ind_buy_pressure:'Wolumen na Żywo z Przewagą Kupna — FOMO', ind_sell_pressure:'Wolumen na Żywo z Przewagą Sprzedaży — Kapitulacja',
    desc_buy_pressure:`Udział wolumenu najnowszych 15-minutowych świec napędzany agresywnym kupnem. Wysoki wskaźnik (65%+) w połączeniu ze skokiem wolumenu i zieloną świecą może sygnalizować przegrzanie napędzane FOMO blisko lokalnego szczytu. Używa danych 15-minutowych zamiast dziennych, więc odzwierciedla warunki niemal w czasie rzeczywistym (opóźnienie 15min–1h vs. do 24h dla wolumenu dziennego).`,
    desc_sell_pressure:`Udział wolumenu najnowszych 15-minutowych świec napędzany agresywną sprzedażą. Wysoki wskaźnik (58%+) w połączeniu ze skokiem wolumenu i czerwoną świecą może sygnalizować sprzedaż kapitulacyjną, która często poprzedza odwrócenie blisko lokalnego dna. Używa danych 15-minutowych zamiast dziennych, więc odzwierciedla warunki niemal w czasie rzeczywistym.`,
    desc_rsi:`Relative Strength Index z 14 dni, oscylator momentum mierzący prędkość i wielkość ostatnich zmian ceny. RSI poniżej 30 wskazuje wyprzedanie (często sygnał dna), a powyżej 70 wykupienie (często sygnał szczytu). Stosuje się jednakowo do wszystkich monet, bo opiera się wyłącznie na cenie.`,
    desc_vol_change:`Porównuje wolumen najnowszej 15-minutowej świecy ze średnimi z 1 godziny i 4 godzin. Duży skok w połączeniu z ceną blisko minimum może sygnalizować sprzedaż kapitulacyjną poprzedzającą odwrócenie. Skok blisko maksimum może sygnalizować dystrybucję przez dużych posiadaczy. Użycie danych 15-minutowych zamiast dziennych odzwierciedla warunki niemal w czasie rzeczywistym.`,
    desc_btc_corr_tech:`Współczynnik korelacji Pearsona między dziennymi zwrotami tej monety a Bitcoinem w ciągu ostatnich 30 dni. Niska korelacja (poniżej 0,5) sugeruje, że moneta porusza się niezależnie od BTC, co może wskazywać na siłę lub słabość specyficzną dla monety, a nie na szeroki ruch rynku.`,
    desc_alt_short_val:`Szacunkowy wskaźnik przewartościowania altcoinów w trybie SHORT. Mierzy, jak daleko obecna cena znajduje się powyżej szacowanej realized price — im wyżej, tym bardziej przegrzane i sprzyjające SHORT. ⚠️ Realized price to szacunek, nie dane on-chain na żywo.`,
    desc_alt_short_ath:`Odległość od all-time high (ATH), używana jako sygnał przegrzania dla timingu SHORT altcoinów. Bliskość ATH (w granicach -15%) historycznie zbiega się z lokalnymi szczytami i większą korzyścią dla SHORT.`,
    ind_btc_corr:'Dominacja BTC — Cykl Alt', desc_btc_corr:`Śledzi dominację kapitalizacji Bitcoina jako wskaźnik zastępczy pozycji szerszego cyklu altcoinów. Gdy dominacja BTC jest wysoka (55%+), kapitał koncentruje się w Bitcoinie, a altcoiny zwykle radzą sobie gorzej — często oznaka, że cykl alt jeszcze się nie zaczął. Gdy dominacja spada (poniżej 50%), kapitał przepływa do altcoinów, co historycznie wiąże się z "alt season".`,
    desc_alt_valuation:`Szacunkowy wskaźnik wyceny altcoinów. W przeciwieństwie do BTC/ETH/BNB, ta moneta nie ma wiarygodnych danych MVRV Z-Score on-chain, więc używamy ceny vs. szacowanej realized price jako wskaźnika zastępczego.

⚠️ Ważne: szacowana realized price tej monety jest przybliżana za pomocą 200-tygodniowej średniej kroczącej (200W MA), a nie danych on-chain na żywo. 200W MA to szeroko stosowany wskaźnik zastępczy blisko śledzący realized price on-chain, ale różni się od danych precyzyjnych. Używaj tylko jako sygnału kierunkowego.

Poniżej szacowanej realized price = potencjalna strefa niedowartościowania.`,
    desc_alt_drawdown:`Odległość od all-time high (ATH), używana jako zamiennik NUPL dla altcoinów bez wiarygodnych danych zysk/strata on-chain.

Głębokie spadki (70%+) od ATH historycznie zbiegały się z dnami cyklu dla głównych altcoinów, choć znacznie różni się to w zależności od monety.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Różnica Futures-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Podaży LTH', ind_dom:'Dominacja BTC',
    ind_halving:'Cykl Halvingu',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Przegrzanie', ind_sell_nupl:'NUPL — Poziom Chciwości',
    ind_sell_funding:'Premia Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH mierzy różnicę między zachowaniem realizacji zysków posiadaczy długo- i krótkoterminowych.
Duży dodatni spread oznacza, że posiadacze krótkoterminowi realizują zyski znacznie szybciej niż długoterminowi — wczesny sygnał dystrybucji.

Strefa SHORT: spread ≥ 0,15 (STH sprzedaje agresywnie, gdy LTH trzyma)
Strefa bezpieczna: spread ≤ 0,02 (spójne zachowanie, brak sygnału dystrybucji)

Obecnie: STH realizuje znaczny zysk względem LTH → dystrybucja może się zaczynać.`,
    ind_sell_sopr:'STH-SOPR — Realizacja Zysków', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'WYCENA ON-CHAIN', sec_miner:'GÓRNICY / SENTYMENT',
    sec_inst:'PRZEPŁYW INSTYTUCJONALNY', sec_cycle:'POZYCJA CYKLU',
    sec_breakdown:'Rozkład Wyniku', sec_triggers:'Wyzwalacze Kolejnego Poziomu',
    sec_sellTriggers:'Wyzwalacze Sygnału Sprzedaży', sec_macro:'OSTRZEŻENIA MAKRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'WSZYSTKO →', loadingInsights:'Ładowanie...', loadMoreInsights:'Załaduj Więcej', collapseInsights:'Zwiń',
    sec_history:'Historia Wyniku', sec_histSub:'Zapisana lokalnie w przeglądarce',
    histH:'Godz.', histD:'Dzień', histM:'Miesiąc',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score mierzy, jak bardzo Bitcoin jest przewartościowany lub niedowartościowany względem swojej realized value. \n• < 0: Historycznie niedowartościowany (strefa dna) → Silne kupno\n• 0~1: Lekko niedowartościowany → Strefa akumulacji  \n• 1~3: Wartość godziwa → Neutralnie\n• > 3: Przewartościowany (strefa szczytu) → Rozważ sprzedaż\nObecna faza: 0,27 — Blisko dna. Historycznie wartości poniżej 0,5 poprzedzały wielkie hossy.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) pokazuje ogólny stan zysku/straty wszystkich posiadaczy BTC.\n• < 0% (Kapitulacja): Posiadacze na stracie → Ekstremalny sygnał kupna\n• 0~25% (Nadzieja/Strach): Odbicie od dna → Strefa kupna  \n• 25~50% (Optymizm): Środek cyklu → Neutralnie\n• 50~75% (Wiara/Chciwość): Późny cykl → Obserwuj\n• > 75% (Euforia): Szczyt chciwości → Sygnał sprzedaży",
    desc_realized:"Pokazuje, jak daleko obecna cena jest od średniej bazy kosztowej wszystkich posiadaczy BTC (Realized Price).\n• Poniżej 0%: Cena poniżej średniego kosztu → Strefa paniki, najsilniejsze kupno\n• 0~5%: Blisko realized price → Idealne wejście\n• 5~20%: Umiarkowana premia → Akceptowalne\n• > 20%: Wysoka premia → Ostrożnie",
    desc_hash:"Hash Ribbon śledzi momentum hashrate wydobycia Bitcoina (średnia 30-dniowa vs 60-dniowa).\n• Kapitulacja: Słabi górnicy wyłączają się (30MA < 60MA) → Tworzy się dno\n• Recovery Cross: 30MA przecina 60MA w górę → Najbardziej wiarygodny wyprzedzający sygnał kupna (2~4 tygodnie wcześniej)\nDokładność historyczna: Idealnie wskazał dna 2016, 2018, 2020, 2022.",
    desc_sopr:"SOPR Posiadaczy Krótkoterminowych mierzy, czy niedawni kupujący sprzedają z zyskiem czy stratą.\n• < 0,95: Paniczna sprzedaż z dużymi stratami → Kapitulacja = sygnał kupna\n• 0,95~1,0: Lekka realizacja straty → Blisko dna\n• 1,0~1,03: Neutralna realizacja zysku\n• > 1,05: Silna realizacja zysku → Dystrybucja = sygnał szczytu",
    desc_funding:"Różnica Futures-Spot = (Cena Mark Futures - Cena Indeksu Spot) / Cena Spot\nPokazuje pozycjonowanie dźwigni w czasie rzeczywistym bez 8-godzinnego opóźnienia rozliczenia.\n• Ujemna (backwardation): Futures tańsze niż spot → Przeciążenie shortów → Wyprzedzający sygnał kupna\n• ±0,01%: Neutralnie (normalny zakres dla BTC)\n• > 0,05%: Contango → Przeciążenie longów → Ostrożnie\n• > 0,15%: Ekstremalne contango → Sygnał szczytu",
    desc_cbp:"Coinbase Premium = (Cena BTC Coinbase - Cena BTC Binance) / Cena Binance\nOdzwierciedla popyt instytucji USA w czasie rzeczywistym. Wyprzedza dane przepływów ETF o 2~3 dni.\n• Dodatni: Instytucje USA kupują → Byczo\n• Blisko zera: Obserwacja/neutralnie\n• Ujemny: Instytucje na uboczu → Niedźwiedzio krótkoterminowo\nObecnie: Ujemny (46+ dni z rzędu) → Instytucje czekają na jasność makro.",
    desc_lth:"% Podaży Posiadaczy Długoterminowych = odsetek podaży BTC w adresach nieaktywnych 155+ dni.\n• > 75%: Wieloryby w agresywnej akumulacji → Silny sygnał kupna\n• 70~75%: Normalna akumulacja\n• < 70%: Dystrybucja (wieloryby sprzedają)\nRekordowe poziomy (79%) oznaczają, że smart money nie sprzedaje — supply shock nadejdzie, gdy wróci popyt.",
    desc_dom:"Dominacja BTC = kapitalizacja BTC / całkowita kapitalizacja rynku krypto\nRośnie, gdy kapitał przepływa z altcoinów do Bitcoina — typowy wzorzec przed wielkimi hossami.\n• 55~63% (baza CoinGecko): BTC season → Kapitał konsoliduje się w BTC → Strefa kupna\n• < 50%: Alt season → Risk on\n• > 65%: Ekstremalna dominacja BTC → Może sygnalizować nadchodzącą rotację alt",
    desc_halving:"Halvingi Bitcoina tną nagrody za wydobycie o 50% co ~4 lata, tworząc supply shocki.\nHistoryczny timing dna:\n• Dno 2015: 18 miesięcy przed halvingiem 2016\n• Dno 2018: 17 miesięcy przed halvingiem 2020  \n• Dno 2022: 17 miesięcy przed halvingiem 2024\n• Obecnie: ~22 miesiące przed halvingiem kwiecień 2028 → W centralnym oknie dna.",
    // Alert labels
    alertTitle:'Ustawienia Alertów',
    alertDesc:'Otrzymuj powiadomienia push przeglądarki + błysk wizualny + dźwięk po spełnieniu warunków.',
    alertBuySection:'📈 WYZWALACZE LONG', alertSellSection:'📉 WYZWALACZE SHORT',
    a2:'Wynik Long ≥ 6.0 (Zacznij etapami)',
    a3:'Wynik Long ≥ 7.0 (Zwiększ pozycję)', a4:'Wynik Long ≥ 8.0 (Agresywne kupno)',
    a5:'MVRV Z ≤ 0 — Pełna strefa dna', a6:'NUPL poniżej 0% — Kapitulacja',
    a7:'Różnica futures staje się ujemna (backwardation)', a8:'Recovery cross Hash Ribbon',
    a9:'Coinbase Premium staje się dodatni',
    b1:'Wynik Short ≥ 6.0 (Przygotuj short)', b2:'Wynik Short ≥ 7.0 (Zwiększ short)',
    b3:'Wynik Short ≥ 8.0 (Pełny short)', b4:'MVRV Z ≥ 3.5 — Strefa euforii',
    b5:'NUPL ≥ 75% — Ekstremalna chciwość', b6:'Fear & Greed ≥ 80',
    b7:'Contango futures ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Alert, gdy cena spadnie poniżej $', priceAbove:'Alert, gdy cena wzrośnie powyżej $',
    enableNotif:'Włącz Powiadomienia Przeglądarki',
    ind_sell_lth:'Podaż LTH — Dystrybucja', ind_sell_dom:'Dominacja BTC — Ryzyko',
    ind_sell_halving:'Halving — Faza Cyklu', ind_sell_ath:'Bliskość ATH — Ryzyko Szczytu',
    ind_sell_mvrv:'MVRV Z — Przegrzanie', ind_sell_nupl:'NUPL — Chciwość',
    ind_sell_funding:'Premia Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Spread SOPR LTH-STH mierzy różnicę między zachowaniem realizacji zysków posiadaczy długo- i krótkoterminowych.
Duży dodatni spread oznacza, że posiadacze krótkoterminowi realizują zyski znacznie szybciej niż długoterminowi — wczesny sygnał dystrybucji.

Strefa SHORT: spread ≥ 0,15 (STH sprzedaje agresywnie, gdy LTH trzyma)
Strefa bezpieczna: spread ≤ 0,02 (spójne zachowanie, brak sygnału dystrybucji)

Obecnie: STH realizuje znaczny zysk względem LTH → dystrybucja może się zaczynać.`,
    ind_sell_sopr:'STH-SOPR — Realizacja Zysków', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  it: {
    exchBannerT:"Da quale exchange iniziare?", exchBannerD:"Confronta Binance e Bybit + sconto commissioni",
    // NAV
    navInsights:'Blog',
    navGlossary:'Glossario',
    footerPrivacy:'Informativa sulla Privacy', footerTerms:'Termini di Servizio', footerDisclaimer:'Non è consulenza finanziaria',
    whyBtnLabel:'Perché?', whyTopTitle:'Principali contributori', whyBottomTitle:'Fattori frenanti', histToday:'Oggi', histYesterday:'Ieri', histWeekAgo:'Settimana scorsa',
    buyTiming:'📈 Timing LONG', sellTiming:'📉 Timing SHORT',
    livePriceLabel:'Prezzo · Binance', fgLabel:'Fear & Greed',
    rpLabel:'Scarto Realized Price', maLabel:'MA 200S (rif)',
    splitPlan:'Piano di Ingresso Scaglionato', splitTitle:'Allocazione per Fase',
    splitStep1:(s)=>`Ora (Punteggio ${s})`, splitStep2:'Recupero Hash Ribbon',
    splitStep3:'Coinbase Premium → Positivo', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Aggiornato',
    footerSources:'Recupero automatico', footerDisclaimer2:'Lo scraping on-chain può usare valori di riserva. Lo storico dei punteggi è salvato nel localStorage del browser. Non è consulenza finanziaria.',
    tkDomLabel:'Dominanza BTC', tkMcapLabel:'Capitalizzazione', tkVolLabel:'Volume 24h', bkTotalLabel:'Totale → /10',
    seoH1:'Punteggio di Timing Acquisto/Vendita di Bitcoin e Altcoin in Tempo Reale', seoSub:'Un segnale di timing 0–10 in tempo reale e gratuito che combina indicatori on-chain.',
    // Mode labels
    modeTitle_buy:'PUNTEGGIO TIMING LONG', modeTitle_sell:'INDICATORE PRESSIONE DI VENDITA',
    modeSub_buy:'Modello di ingresso long sul minimo del ciclo', modeSub_sell:'Modello di timing di ingresso short',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Come leggere il Punteggio di Vendita',
    sellExplain_low:'🟢 BASSO (0~3): Mercato in zona minimo. Nessun segnale di uscita. Mantieni o accumula.',
    sellExplain_mid:'🟡 MEDIO (4~6): Mercato in surriscaldamento. Monitora per una riduzione parziale.',
    sellExplain_high:'🔴 ALTO (7~10): Forte segnale di vendita. Esci dal long / Valuta ingresso short.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Scarto Realized Price',
    ind_alt_valuation:'Prezzo vs Realized Stim. (200W MA)', ind_alt_drawdown:'Calo da ATH',
    tab_dashboard:'Live', tab_coins:'Cerca', tab_blog:'Blog',
    ind_alt_short_val:'Prezzo vs Realized Stim. (Short)', ind_alt_short_ath:'Vicinanza ATH — Surriscaldamento',
    ind_rsi:'RSI (14g)', ind_vol_change:'Accelerazione Volume (15m vs 1h/4h)', ind_btc_corr_tech:'Correlazione BTC (30g)',
    ind_buy_pressure:'Volume Live a Prevalenza Acquisto — FOMO', ind_sell_pressure:'Volume Live a Prevalenza Vendita — Capitolazione',
    desc_buy_pressure:`Quota del volume delle candele a 15 minuti più recenti guidata da acquisti aggressivi. Un rapporto elevato (65%+) unito a un picco di volume e a una candela verde può segnalare surriscaldamento da FOMO vicino a un massimo locale. Usa dati a 15 minuti anziché giornalieri, riflettendo condizioni quasi in tempo reale (ritardo 15min–1h vs. fino a 24h per il volume giornaliero).`,
    desc_sell_pressure:`Quota del volume delle candele a 15 minuti più recenti guidata da vendite aggressive. Un rapporto elevato (58%+) unito a un picco di volume e a una candela rossa può segnalare vendite di capitolazione che spesso precedono un rimbalzo vicino a un minimo locale. Usa dati a 15 minuti anziché giornalieri, riflettendo condizioni quasi in tempo reale.`,
    desc_rsi:`Relative Strength Index a 14 giorni, un oscillatore di momentum che misura velocità ed entità delle variazioni di prezzo recenti. RSI sotto 30 indica ipervenduto (spesso segnale di minimo), mentre sopra 70 indica ipercomprato (spesso segnale di massimo). Si applica allo stesso modo a tutte le monete perché è puramente basato sul prezzo.`,
    desc_vol_change:`Confronta il volume della candela a 15 minuti più recente con le medie a 1 e 4 ore. Un grande picco unito a un prezzo vicino a un minimo può segnalare vendite di capitolazione che spesso precedono un rimbalzo. Un picco vicino a un massimo può segnalare distribuzione da parte di grandi detentori. Usare dati a 15 minuti anziché giornalieri riflette condizioni quasi in tempo reale.`,
    desc_btc_corr_tech:`Coefficiente di correlazione di Pearson tra i rendimenti giornalieri di questa moneta e Bitcoin negli ultimi 30 giorni. Una correlazione bassa (sotto 0,5) suggerisce che la moneta si muove in modo indipendente da BTC, il che può indicare forza o debolezza specifica della moneta anziché un movimento ampio del mercato.`,
    desc_alt_short_val:`Indicatore stimato di sopravvalutazione per le altcoin in modalità SHORT. Misura quanto il prezzo attuale è sopra la realized price stimata — più è alto, più è surriscaldato e favorevole allo SHORT. ⚠️ La realized price è una stima, non dati on-chain in tempo reale.`,
    desc_alt_short_ath:`Distanza dal massimo storico (ATH), usata come segnale di surriscaldamento per il timing SHORT delle altcoin. Essere vicini all'ATH (entro -15%) storicamente coincide con massimi locali e maggiore favorevolezza allo SHORT.`,
    ind_btc_corr:'Dominanza BTC — Ciclo Alt', desc_btc_corr:`Traccia la dominanza della capitalizzazione di Bitcoin come proxy della posizione del più ampio ciclo delle altcoin. Quando la dominanza BTC è alta (55%+), il capitale è concentrato in Bitcoin e le altcoin tendono a rendere meno — spesso segno che il ciclo alt non è ancora iniziato. Quando la dominanza scende (sotto 50%), il capitale ruota verso le altcoin, storicamente associato alla "alt season".`,
    desc_alt_valuation:`Indicatore di valutazione stimato per le altcoin. A differenza di BTC/ETH/BNB, questa moneta non dispone di dati MVRV Z-Score on-chain affidabili, quindi usiamo il prezzo vs. una realized price stimata come proxy.

⚠️ Importante: la realized price stimata di questa moneta è approssimata con la media mobile a 200 settimane (200W MA), non con dati on-chain in tempo reale. La 200W MA è un proxy molto usato che segue da vicino la realized price on-chain, ma differisce dai dati precisi. Usare solo come segnale direzionale.

Sotto la realized price stimata = potenziale zona di sottovalutazione.`,
    desc_alt_drawdown:`Distanza dal massimo storico (ATH), usata come sostituto del NUPL sulle altcoin senza dati profitto/perdita on-chain affidabili.

Cali profondi (70%+) dall'ATH hanno storicamente coinciso con i minimi di ciclo per le principali altcoin, anche se varia molto da moneta a moneta.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Scarto Futures-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% Offerta LTH', ind_dom:'Dominanza BTC',
    ind_halving:'Ciclo di Halving',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Surriscaldamento', ind_sell_nupl:'NUPL — Livello di Avidità',
    ind_sell_funding:'Premio Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Lo Spread SOPR LTH-STH misura il divario tra il comportamento di presa di profitto dei detentori a lungo e a breve termine.
Uno spread positivo ampio significa che i detentori a breve termine realizzano profitti molto più velocemente di quelli a lungo termine — un segnale precoce di distribuzione.

Zona SHORT: spread ≥ 0,15 (STH vende aggressivamente mentre LTH mantiene)
Zona sicura: spread ≤ 0,02 (comportamento allineato, nessun segnale di distribuzione)

Attuale: STH realizza profitti significativi rispetto a LTH → la distribuzione potrebbe iniziare.`,
    ind_sell_sopr:'STH-SOPR — Presa di Profitto', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'VALUTAZIONE ON-CHAIN', sec_miner:'MINER / SENTIMENT',
    sec_inst:'FLUSSO ISTITUZIONALE', sec_cycle:'POSIZIONE DEL CICLO',
    sec_breakdown:'Dettaglio Punteggio', sec_triggers:'Trigger Livello Successivo',
    sec_sellTriggers:'Trigger Segnale di Vendita', sec_macro:'AVVISI MACRO',
    sec_insights:'BLOG', sec_insights2:'BLOG', viewAllInsights:'TUTTI →', loadingInsights:'Caricamento...', loadMoreInsights:'Carica Altro', collapseInsights:'Comprimi',
    sec_history:'Storico Punteggio', sec_histSub:'Salvato localmente nel browser',
    histH:'Ora', histD:'Giorno', histM:'Mese',
    // Indicator detailed descriptions
    desc_mvrv_z:"L'MVRV Z Score misura quanto Bitcoin sia sopravvalutato o sottovalutato rispetto al suo realized value. \n• < 0: Storicamente sottovalutato (zona minimo) → Acquisto forte\n• 0~1: Leggermente sottovalutato → Zona di accumulo  \n• 1~3: Valore equo → Neutrale\n• > 3: Sopravvalutato (zona massimo) → Valuta la vendita\nFase attuale: 0,27 — Vicino al minimo. Storicamente valori sotto 0,5 hanno preceduto grandi rialzi.",
    desc_nupl:"Il NUPL (Net Unrealized Profit/Loss) mostra lo stato complessivo di profitto/perdita di tutti i detentori di BTC.\n• < 0% (Capitolazione): Detentori in perdita → Segnale di acquisto estremo\n• 0~25% (Speranza/Paura): Ripresa dal minimo → Zona di acquisto  \n• 25~50% (Ottimismo): Metà ciclo → Neutrale\n• 50~75% (Fiducia/Avidità): Fine ciclo → Osserva\n• > 75% (Euforia): Picco di avidità → Segnale di vendita",
    desc_realized:"Mostra quanto il prezzo attuale sia lontano dalla base di costo media di tutti i detentori di BTC (Realized Price).\n• Sotto 0%: Prezzo sotto il costo medio → Zona di panico, acquisto più forte\n• 0~5%: Vicino alla realized price → Ingresso ideale\n• 5~20%: Premio moderato → Accettabile\n• > 20%: Premio elevato → Cautela",
    desc_hash:"L'Hash Ribbon traccia il momentum dell'hashrate di mining di Bitcoin (media a 30 giorni vs 60 giorni).\n• Capitolazione: Miner deboli si spengono (30MA < 60MA) → Minimo in formazione\n• Recovery Cross: la 30MA incrocia sopra la 60MA → Segnale di acquisto anticipatore più affidabile (2~4 settimane di anticipo)\nAccuratezza storica: Ha marcato con precisione i minimi 2016, 2018, 2020, 2022.",
    desc_sopr:"Lo SOPR dei detentori a breve termine misura se i compratori recenti vendono in profitto o in perdita.\n• < 0,95: Vendita di panico con forti perdite → Capitolazione = segnale di acquisto\n• 0,95~1,0: Lieve realizzo di perdita → Vicino al minimo\n• 1,0~1,03: Presa di profitto neutrale\n• > 1,05: Forte presa di profitto → Distribuzione = segnale di massimo",
    desc_funding:"Scarto Futures-Spot = (Prezzo Mark Futures - Prezzo Indice Spot) / Prezzo Spot\nMostra il posizionamento della leva in tempo reale senza il ritardo di regolamento di 8 ore.\n• Negativo (backwardation): Futures più economici dello spot → Sovraccarico di short → Segnale di acquisto anticipatore\n• ±0,01%: Neutrale (range normale per BTC)\n• > 0,05%: Contango → Sovraccarico di long → Cautela\n• > 0,15%: Contango estremo → Segnale di massimo",
    desc_cbp:"Coinbase Premium = (Prezzo BTC Coinbase - Prezzo BTC Binance) / Prezzo Binance\nRiflette la domanda istituzionale USA in tempo reale. Anticipa i dati di flusso ETF di 2~3 giorni.\n• Positivo: Istituzioni USA in acquisto → Rialzista\n• Vicino a zero: Osservazione/neutrale\n• Negativo: Istituzioni in disparte → Ribassista nel breve\nAttuale: Negativo (46+ giorni consecutivi) → Istituzioni in attesa di chiarezza macro.",
    desc_lth:"% Offerta dei Detentori a Lungo Termine = percentuale dell'offerta di BTC in indirizzi inattivi da 155+ giorni.\n• > 75%: Whale in accumulo aggressivo → Segnale di acquisto forte\n• 70~75%: Accumulo normale\n• < 70%: Distribuzione (whale in vendita)\nLivelli record (79%) significano che gli smart money non vendono — supply shock in arrivo al ritorno della domanda.",
    desc_dom:"Dominanza BTC = capitalizzazione BTC / capitalizzazione totale del mercato crypto\nSale quando il capitale passa dalle altcoin a Bitcoin — schema tipico prima di grandi rialzi.\n• 55~63% (base CoinGecko): BTC season → Capitale in consolidamento su BTC → Zona di acquisto\n• < 50%: Alt season → Risk on\n• > 65%: Dominanza BTC estrema → Può segnalare una rotazione alt in arrivo",
    desc_halving:"Gli halving di Bitcoin dimezzano le ricompense di mining ogni ~4 anni, creando supply shock.\nTiming storico dei minimi:\n• Minimo 2015: 18 mesi prima dell'halving 2016\n• Minimo 2018: 17 mesi prima dell'halving 2020  \n• Minimo 2022: 17 mesi prima dell'halving 2024\n• Attuale: ~22 mesi prima dell'halving di aprile 2028 → Nella finestra centrale del minimo.",
    // Alert labels
    alertTitle:'Impostazioni Avvisi',
    alertDesc:'Ricevi notifiche via push del browser + lampeggio visivo + suono al verificarsi delle condizioni.',
    alertBuySection:'📈 TRIGGER LONG', alertSellSection:'📉 TRIGGER SHORT',
    a2:'Punteggio Long ≥ 6.0 (Inizia scaglionamento)',
    a3:'Punteggio Long ≥ 7.0 (Aumenta posizione)', a4:'Punteggio Long ≥ 8.0 (Acquisto aggressivo)',
    a5:'MVRV Z ≤ 0 — Zona di minimo pieno', a6:'NUPL sotto 0% — Capitolazione',
    a7:'Lo scarto futures diventa negativo (backwardation)', a8:'Recovery cross Hash Ribbon',
    a9:'Coinbase Premium diventa positivo',
    b1:'Punteggio Short ≥ 6.0 (Prepara short)', b2:'Punteggio Short ≥ 7.0 (Aumenta short)',
    b3:'Punteggio Short ≥ 8.0 (Short pieno)', b4:'MVRV Z ≥ 3.5 — Zona di euforia',
    b5:'NUPL ≥ 75% — Avidità estrema', b6:'Fear & Greed ≥ 80',
    b7:'Contango futures ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Avvisa quando il prezzo scende sotto $', priceAbove:'Avvisa quando il prezzo sale sopra $',
    enableNotif:'Attiva Notifiche del Browser',
    ind_sell_lth:'Offerta LTH — Distribuzione', ind_sell_dom:'Dominanza BTC — Rischio',
    ind_sell_halving:'Halving — Fase del Ciclo', ind_sell_ath:'Vicinanza ATH — Rischio Massimo',
    ind_sell_mvrv:'MVRV Z — Surriscaldamento', ind_sell_nupl:'NUPL — Avidità',
    ind_sell_funding:'Premio Futures', ind_sell_fg:'Spread SOPR LTH-STH',
    desc_sell_fg:`Lo Spread SOPR LTH-STH misura il divario tra il comportamento di presa di profitto dei detentori a lungo e a breve termine.
Uno spread positivo ampio significa che i detentori a breve termine realizzano profitti molto più velocemente di quelli a lungo termine — un segnale precoce di distribuzione.

Zona SHORT: spread ≥ 0,15 (STH vende aggressivamente mentre LTH mantiene)
Zona sicura: spread ≤ 0,02 (comportamento allineato, nessun segnale di distribuzione)

Attuale: STH realizza profitti significativi rispetto a LTH → la distribuzione potrebbe iniziare.`,
    ind_sell_sopr:'STH-SOPR — Presa di Profitto', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  ru: {
    exchBannerT:"С какой биржи начать?", exchBannerD:"Сравните Binance и Bybit + скидка на комиссии",
    // NAV
    navInsights:'Блог',
    navGlossary:'Глоссарий',
    footerPrivacy:'Политика конфиденциальности', footerTerms:'Условия использования', footerDisclaimer:'Не финансовый совет',
    whyBtnLabel:'Почему?', whyTopTitle:'Главные драйверы роста', whyBottomTitle:'Сдерживающие факторы', histToday:'Сегодня', histYesterday:'Вчера', histWeekAgo:'Неделю назад',
    buyTiming:'📈 Тайминг ЛОНГ', sellTiming:'📉 Тайминг ШОРТ',
    livePriceLabel:'Цена · Binance', fgLabel:'Индекс страха и жадности',
    rpLabel:'Разрыв Realized Price', maLabel:'200-нед. MA (справ.)',
    splitPlan:'План поэтапного входа', splitTitle:'Распределение по этапам',
    splitStep1:(s)=>`Сейчас (Оценка ${s})`, splitStep2:'Восстановление Hash Ribbon',
    splitStep3:'Coinbase Premium → Положительный', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'Обновлено',
    footerSources:'Автозагрузка', footerDisclaimer2:'Сбор on-chain данных может использовать резервные значения. История оценок хранится в localStorage браузера. Не финансовый совет.',
    tkDomLabel:'Доминация BTC', tkMcapLabel:'Капитализация', tkVolLabel:'Объём 24ч', bkTotalLabel:'Итого → /10',
    seoH1:'Оценка тайминга покупки/продажи Bitcoin и альткоинов в реальном времени', seoSub:'Бесплатный сигнал тайминга 0–10 в реальном времени на основе on-chain индикаторов.',
    // Mode labels
    modeTitle_buy:'ОЦЕНКА ТАЙМИНГА ЛОНГ', modeTitle_sell:'ИЗМЕРИТЕЛЬ ДАВЛЕНИЯ ПРОДАЖ',
    modeSub_buy:'Модель входа в лонг на дне цикла', modeSub_sell:'Модель тайминга входа в шорт',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ Как читать оценку продажи',
    sellExplain_low:'🟢 НИЗКАЯ (0~3): Рынок в зоне дна. Нет сигнала на выход. Держите или накапливайте.',
    sellExplain_mid:'🟡 СРЕДНЯЯ (4~6): Рынок разогревается. Наблюдайте за частичным сокращением.',
    sellExplain_high:'🔴 ВЫСОКАЯ (7~10): Сильный сигнал на продажу. Выход из лонга / Рассмотрите вход в шорт.',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Разрыв Realized Price',
    ind_alt_valuation:'Цена vs Realized оц. (200W MA)', ind_alt_drawdown:'Просадка от ATH',
    tab_dashboard:'Онлайн', tab_coins:'Поиск', tab_blog:'Блог',
    ind_alt_short_val:'Цена vs Realized оц. (Шорт)', ind_alt_short_ath:'Близость к ATH — Перегрев',
    ind_rsi:'RSI (14д)', ind_vol_change:'Ускорение объёма (15м vs 1ч/4ч)', ind_btc_corr_tech:'Корреляция с BTC (30д)',
    ind_buy_pressure:'Объём с преобладанием покупок — FOMO', ind_sell_pressure:'Объём с преобладанием продаж — Капитуляция',
    desc_buy_pressure:`Доля объёма последних 15-минутных свечей, обусловленная агрессивными покупками. Высокое соотношение (65%+) вместе со всплеском объёма и зелёной свечой может сигнализировать о перегреве на волне FOMO вблизи локального максимума. Использует 15-минутные данные вместо дневных, отражая условия почти в реальном времени (задержка 15мин–1ч против до 24ч у дневного объёма).`,
    desc_sell_pressure:`Доля объёма последних 15-минутных свечей, обусловленная агрессивными продажами. Высокое соотношение (58%+) вместе со всплеском объёма и красной свечой может сигнализировать о капитуляционных продажах, которые часто предшествуют развороту вблизи локального дна. Использует 15-минутные данные вместо дневных, отражая условия почти в реальном времени.`,
    desc_rsi:`Relative Strength Index за 14 дней — осциллятор моментума, измеряющий скорость и величину недавних изменений цены. RSI ниже 30 указывает на перепроданность (часто сигнал дна), а выше 70 — на перекупленность (часто сигнал вершины). Применяется одинаково ко всем монетам, так как основан только на цене.`,
    desc_vol_change:`Сравнивает объём последней 15-минутной свечи со средними за 1 час и 4 часа. Крупный всплеск вместе с ценой у минимума может сигнализировать о капитуляционных продажах, часто предшествующих развороту. Всплеск у максимума может сигнализировать о распределении крупными держателями. Использование 15-минутных данных вместо дневных отражает условия почти в реальном времени.`,
    desc_btc_corr_tech:`Коэффициент корреляции Пирсона между дневной доходностью этой монеты и Bitcoin за последние 30 дней. Низкая корреляция (ниже 0,5) говорит о том, что монета движется независимо от BTC, что может указывать на силу или слабость самой монеты, а не на широкое движение рынка.`,
    desc_alt_short_val:`Оценочный индикатор переоценённости альткоинов в режиме ШОРТ. Измеряет, насколько текущая цена выше оценочной realized price — чем выше, тем сильнее перегрев и благоприятнее для ШОРТА. ⚠️ Realized price — это оценка, а не on-chain данные в реальном времени.`,
    desc_alt_short_ath:`Расстояние от исторического максимума (ATH), используется как сигнал перегрева для тайминга ШОРТА альткоинов. Близость к ATH (в пределах -15%) исторически совпадает с локальными вершинами и повышенной благоприятностью для ШОРТА.`,
    ind_btc_corr:'Доминация BTC — Альт-цикл', desc_btc_corr:`Отслеживает доминацию рыночной капитализации Bitcoin как индикатор позиции более широкого альткоин-цикла. Когда доминация BTC высока (55%+), капитал сосредоточен в Bitcoin, а альткоины обычно отстают — часто признак того, что альт-цикл ещё не начался. Когда доминация падает (ниже 50%), капитал перетекает в альткоины, что исторически связано с "alt season".`,
    desc_alt_valuation:`Оценочный индикатор стоимости альткоинов. В отличие от BTC/ETH/BNB, у этой монеты нет надёжных on-chain данных MVRV Z-Score, поэтому мы используем цену vs. оценочную realized price как приближение.

⚠️ Важно: оценочная realized price этой монеты приближается 200-недельной скользящей средней (200W MA), а не on-chain данными в реальном времени. 200W MA — широко используемое приближение, близко отслеживающее on-chain realized price, но отличающееся от точных данных. Используйте только как сигнал направления.

Ниже оценочной realized price = потенциальная зона недооценки.`,
    desc_alt_drawdown:`Расстояние от исторического максимума (ATH), используется как замена NUPL для альткоинов без надёжных on-chain данных о прибыли/убытке.

Глубокие просадки (70%+) от ATH исторически совпадали с днами цикла для крупных альткоинов, хотя это сильно варьируется от монеты к монете.`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'Разрыв Futures-Spot',
    ind_cbp:'Coinbase Premium', ind_lth:'% предложения LTH', ind_dom:'Доминация BTC',
    ind_halving:'Цикл халвинга',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — Перегрев', ind_sell_nupl:'NUPL — Уровень жадности',
    ind_sell_funding:'Премия фьючерсов', ind_sell_fg:'Спред SOPR LTH-STH',
    desc_sell_fg:`Спред SOPR LTH-STH измеряет разрыв в поведении фиксации прибыли между долгосрочными и краткосрочными держателями.
Большой положительный спред означает, что краткосрочные держатели фиксируют прибыль намного быстрее долгосрочных — ранний признак распределения.

Зона ШОРТ: спред ≥ 0,15 (STH агрессивно продают, пока LTH держат)
Безопасная зона: спред ≤ 0,02 (согласованное поведение, нет сигнала распределения)

Сейчас: STH фиксируют значительную прибыль относительно LTH → распределение может начинаться.`,
    ind_sell_sopr:'STH-SOPR — Фиксация прибыли', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'ON-CHAIN ОЦЕНКА', sec_miner:'МАЙНЕРЫ / НАСТРОЕНИЯ',
    sec_inst:'ИНСТИТУЦИОНАЛЬНЫЙ ПОТОК', sec_cycle:'ПОЗИЦИЯ ЦИКЛА',
    sec_breakdown:'Разбор оценки', sec_triggers:'Триггеры следующего уровня',
    sec_sellTriggers:'Триггеры сигнала продажи', sec_macro:'МАКРО-ПРЕДУПРЕЖДЕНИЯ',
    sec_insights:'БЛОГ', sec_insights2:'БЛОГ', viewAllInsights:'ВСЕ →', loadingInsights:'Загрузка...', loadMoreInsights:'Показать ещё', collapseInsights:'Свернуть',
    sec_history:'История оценок', sec_histSub:'Сохранено локально в браузере',
    histH:'Час', histD:'День', histM:'Месяц',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score измеряет, насколько Bitcoin переоценён или недооценён относительно своей realized value. \n• < 0: Исторически недооценён (зона дна) → Сильная покупка\n• 0~1: Слегка недооценён → Зона накопления  \n• 1~3: Справедливая цена → Нейтрально\n• > 3: Переоценён (зона вершины) → Рассмотрите продажу\nТекущая фаза: 0,27 — Вблизи дна. Исторически значения ниже 0,5 предшествовали крупным бычьим ралли.",
    desc_nupl:"NUPL (Net Unrealized Profit/Loss) показывает общее состояние прибыли/убытка всех держателей BTC.\n• < 0% (Капитуляция): Держатели в убытке → Экстремальный сигнал покупки\n• 0~25% (Надежда/Страх): Восстановление от дна → Зона покупки  \n• 25~50% (Оптимизм): Середина цикла → Нейтрально\n• 50~75% (Вера/Жадность): Поздний цикл → Наблюдайте\n• > 75% (Эйфория): Пик жадности → Сигнал продажи",
    desc_realized:"Показывает, насколько текущая цена далека от средней себестоимости всех держателей BTC (Realized Price).\n• Ниже 0%: Цена ниже средней себестоимости → Зона паники, сильнейшая покупка\n• 0~5%: Вблизи realized price → Идеальный вход\n• 5~20%: Умеренная премия → Приемлемо\n• > 20%: Высокая премия → Осторожность",
    desc_hash:"Hash Ribbon отслеживает моментум хешрейта майнинга Bitcoin (скользящая средняя 30 дней vs 60 дней).\n• Капитуляция: Слабые майнеры отключаются (30MA < 60MA) → Формируется дно\n• Recovery Cross: 30MA пересекает 60MA снизу вверх → Самый надёжный опережающий сигнал покупки (на 2~4 недели раньше)\nИсторическая точность: Точно отметил дна 2016, 2018, 2020, 2022.",
    desc_sopr:"SOPR краткосрочных держателей измеряет, продают ли недавние покупатели с прибылью или убытком.\n• < 0,95: Паническая продажа с большими убытками → Капитуляция = сигнал покупки\n• 0,95~1,0: Лёгкая фиксация убытка → Вблизи дна\n• 1,0~1,03: Нейтральная фиксация прибыли\n• > 1,05: Сильная фиксация прибыли → Распределение = сигнал вершины",
    desc_funding:"Разрыв Futures-Spot = (Цена Mark фьючерса - Цена индекса Spot) / Цена Spot\nПоказывает позиционирование по плечу в реальном времени без 8-часовой задержки расчёта.\n• Отрицательный (backwardation): Фьючерсы дешевле спота → Перегрузка шортов → Опережающий сигнал покупки\n• ±0,01%: Нейтрально (нормальный диапазон для BTC)\n• > 0,05%: Contango → Перегрузка лонгов → Осторожность\n• > 0,15%: Экстремальное contango → Сигнал вершины",
    desc_cbp:"Coinbase Premium = (Цена BTC Coinbase - Цена BTC Binance) / Цена Binance\nОтражает спрос институтов США в реальном времени. Опережает данные потоков ETF на 2~3 дня.\n• Положительный: Институты США покупают → Бычий\n• Около нуля: Наблюдение/нейтрально\n• Отрицательный: Институты в стороне → Медвежий на короткий срок\nСейчас: Отрицательный (46+ дней подряд) → Институты ждут макро-ясности.",
    desc_lth:"% предложения долгосрочных держателей = доля предложения BTC на адресах, неактивных 155+ дней.\n• > 75%: Киты в агрессивном накоплении → Сильный сигнал покупки\n• 70~75%: Обычное накопление\n• < 70%: Распределение (киты продают)\nРекордные уровни (79%) означают, что умные деньги не продают — supply shock придёт с возвращением спроса.",
    desc_dom:"Доминация BTC = капитализация BTC / общая капитализация крипторынка\nРастёт, когда капитал перетекает из альткоинов в Bitcoin — типичная картина перед крупными ралли.\n• 55~63% (база CoinGecko): BTC season → Капитал консолидируется в BTC → Зона покупки\n• < 50%: Alt season → Risk on\n• > 65%: Экстремальная доминация BTC → Может сигнализировать о скорой ротации в альты",
    desc_halving:"Халвинги Bitcoin сокращают награду за майнинг на 50% каждые ~4 года, создавая supply shock.\nИсторический тайминг дна:\n• Дно 2015: за 18 месяцев до халвинга 2016\n• Дно 2018: за 17 месяцев до халвинга 2020  \n• Дно 2022: за 17 месяцев до халвинга 2024\n• Сейчас: ~22 месяца до халвинга апреля 2028 → В центральном окне дна.",
    // Alert labels
    alertTitle:'Настройки оповещений',
    alertDesc:'Получайте уведомления через push браузера + визуальную вспышку + звук при выполнении условий.',
    alertBuySection:'📈 ТРИГГЕРЫ ЛОНГ', alertSellSection:'📉 ТРИГГЕРЫ ШОРТ',
    a2:'Оценка лонга ≥ 6.0 (Начать поэтапно)',
    a3:'Оценка лонга ≥ 7.0 (Увеличить позицию)', a4:'Оценка лонга ≥ 8.0 (Агрессивная покупка)',
    a5:'MVRV Z ≤ 0 — Полная зона дна', a6:'NUPL ниже 0% — Капитуляция',
    a7:'Разрыв фьючерсов становится отрицательным (backwardation)', a8:'Recovery cross Hash Ribbon',
    a9:'Coinbase Premium становится положительным',
    b1:'Оценка шорта ≥ 6.0 (Подготовить шорт)', b2:'Оценка шорта ≥ 7.0 (Увеличить шорт)',
    b3:'Оценка шорта ≥ 8.0 (Полный шорт)', b4:'MVRV Z ≥ 3.5 — Зона эйфории',
    b5:'NUPL ≥ 75% — Крайняя жадность', b6:'Fear & Greed ≥ 80',
    b7:'Contango фьючерсов ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'Оповестить, когда цена упадёт ниже $', priceAbove:'Оповестить, когда цена вырастет выше $',
    enableNotif:'Включить уведомления браузера',
    ind_sell_lth:'Предложение LTH — Распределение', ind_sell_dom:'Доминация BTC — Риск',
    ind_sell_halving:'Халвинг — Фаза цикла', ind_sell_ath:'Близость к ATH — Риск вершины',
    ind_sell_mvrv:'MVRV Z — Перегрев', ind_sell_nupl:'NUPL — Жадность',
    ind_sell_funding:'Премия фьючерсов', ind_sell_fg:'Спред SOPR LTH-STH',
    desc_sell_fg:`Спред SOPR LTH-STH измеряет разрыв в поведении фиксации прибыли между долгосрочными и краткосрочными держателями.
Большой положительный спред означает, что краткосрочные держатели фиксируют прибыль намного быстрее долгосрочных — ранний признак распределения.

Зона ШОРТ: спред ≥ 0,15 (STH агрессивно продают, пока LTH держат)
Безопасная зона: спред ≤ 0,02 (согласованное поведение, нет сигнала распределения)

Сейчас: STH фиксируют значительную прибыль относительно LTH → распределение может начинаться.`,
    ind_sell_sopr:'STH-SOPR — Фиксация прибыли', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
  zh: {
    exchBannerT:"該從哪個交易所開始？", exchBannerD:"比較 Binance 與 Bybit + 手續費折扣",
    // NAV
    navInsights:'部落格',
    navGlossary:'術語表',
    footerPrivacy:'隱私政策', footerTerms:'服務條款', footerDisclaimer:'非投資建議',
    whyBtnLabel:'為什麼？', whyTopTitle:'主要貢獻因素', whyBottomTitle:'拖累因素', histToday:'今天', histYesterday:'昨天', histWeekAgo:'上週',
    buyTiming:'📈 做多時機', sellTiming:'📉 做空時機',
    livePriceLabel:'價格 · Binance', fgLabel:'恐懼與貪婪',
    rpLabel:'Realized Price 差距', maLabel:'200週 MA（參考）',
    splitPlan:'分批進場計畫', splitTitle:'各階段配置',
    splitStep1:(s)=>`現在（分數 ${s}）`, splitStep2:'Hash Ribbon 復甦',
    splitStep3:'Coinbase Premium → 轉正', splitStep4:'NUPL 0% + MVRV Z ≤ 0',
    updated:'已更新',
    footerSources:'自動抓取', footerDisclaimer2:'鏈上抓取可能使用備援數值。分數歷史儲存在瀏覽器 localStorage。非投資建議。',
    tkDomLabel:'BTC 市佔率', tkMcapLabel:'市值', tkVolLabel:'24小時成交量', bkTotalLabel:'總計 → /10',
    seoH1:'即時比特幣與山寨幣買賣時機分數', seoSub:'結合鏈上指標的免費即時 0–10 時機訊號。',
    // Mode labels
    modeTitle_buy:'做多時機分數', modeTitle_sell:'賣壓量表',
    modeSub_buy:'週期底部做多進場模型', modeSub_sell:'做空進場時機模型',
    // Sell mode explanation
    sellExplainTitle:'ℹ️ 如何解讀賣出分數',
    sellExplain_low:'🟢 低（0~3）：市場處於底部區。無出場訊號。持有或累積。',
    sellExplain_mid:'🟡 中（4~6）：市場升溫。留意部分減倉。',
    sellExplain_high:'🔴 高（7~10）：強烈賣出訊號。出清多單／考慮做空進場。',
    // Indicator names (buy)
    ind_mvrv_z:'MVRV Z Score', ind_nupl:'NUPL', ind_realized:'Realized Price 差距',
    ind_alt_valuation:'價格 vs 估算 Realized（200W MA）', ind_alt_drawdown:'距 ATH 回檔',
    tab_dashboard:'即時', tab_coins:'找幣', tab_blog:'部落格',
    ind_alt_short_val:'價格 vs 估算 Realized（做空）', ind_alt_short_ath:'接近 ATH — 過熱',
    ind_rsi:'RSI（14日）', ind_vol_change:'成交量加速（15分 vs 1時/4時）', ind_btc_corr_tech:'BTC 相關性（30日）',
    ind_buy_pressure:'即時買方主導成交量 — FOMO', ind_sell_pressure:'即時賣方主導成交量 — 投降',
    desc_buy_pressure:`最近 15 分鐘 K 線成交量中由積極買進推動的比例。高比例（65%+）搭配成交量暴增與綠 K，可能預示接近局部頂部的 FOMO 過熱。使用 15 分鐘數據而非日線，因此幾乎即時反映狀況（延遲 15分–1小時，相對日線成交量最高達 24 小時）。`,
    desc_sell_pressure:`最近 15 分鐘 K 線成交量中由積極賣出推動的比例。高比例（58%+）搭配成交量暴增與紅 K，可能預示常先於接近局部底部反轉的投降式賣壓。使用 15 分鐘數據而非日線，因此幾乎即時反映狀況。`,
    desc_rsi:`14 日相對強弱指標（Relative Strength Index），衡量近期價格變動速度與幅度的動能震盪指標。RSI 低於 30 表示超賣（常為底部訊號），高於 70 表示超買（常為頂部訊號）。因純粹以價格為基礎，適用於所有幣種。`,
    desc_vol_change:`比較最近一根 15 分鐘 K 線成交量與 1 小時、4 小時均值。大幅暴增搭配價格接近低點，可能預示常先於反轉的投降式賣壓。接近高點的暴增可能預示大戶派發。使用 15 分鐘數據而非日線，可幾乎即時反映狀況。`,
    desc_btc_corr_tech:`此幣種與比特幣過去 30 日每日報酬之間的皮爾森相關係數。低相關性（低於 0.5）表示該幣獨立於 BTC 波動，可能代表幣種自身的強弱，而非大盤整體走勢。`,
    desc_alt_short_val:`做空模式下山寨幣的估算高估指標。衡量目前價格高於估算 Realized Price 的幅度——越高代表越過熱、越有利做空。⚠️ Realized Price 為估算值，非即時鏈上數據。`,
    desc_alt_short_ath:`距歷史高點（ATH）的距離，用作山寨幣做空時機的過熱訊號。接近 ATH（-15% 以內）在歷史上常與局部頂部及較高的做空有利度重合。`,
    ind_btc_corr:'BTC 市佔率 — 山寨週期', desc_btc_corr:`追蹤比特幣市值佔比，作為更廣泛山寨幣週期位置的代理指標。當 BTC 市佔率偏高（55%+），資金集中於比特幣，山寨幣往往表現落後——常代表山寨週期尚未開始。當市佔率下降（低於 50%），資金輪動進入山寨幣，歷史上與「alt season」相關。`,
    desc_alt_valuation:`山寨幣的估算估值指標。與 BTC/ETH/BNB 不同，此幣種沒有可靠的鏈上 MVRV Z-Score 數據，因此我們以價格 vs. 估算 Realized Price 作為代理。

⚠️ 重要：此幣種的估算 Realized Price 以 200 週移動平均線（200W MA）近似，而非即時鏈上數據。200W MA 是廣泛使用的代理，能貼近追蹤鏈上 Realized Price，但與精確數據有別。僅作方向性訊號使用。

低於估算 Realized Price = 潛在低估區。`,
    desc_alt_drawdown:`距歷史高點（ATH）的距離，用作缺乏可靠鏈上盈虧數據之山寨幣的 NUPL 替代指標。

自 ATH 的深度回檔（70%+）在歷史上常與主要山寨幣的週期底部重合，惟因幣而異差異甚大。`,
    ind_hash:'Hash Ribbon', ind_sth_sopr:'STH-SOPR', ind_funding:'期現差距',
    ind_cbp:'Coinbase Premium', ind_lth:'LTH 供給 %', ind_dom:'BTC 市佔率',
    ind_halving:'減半週期',
    // Indicator names (sell)
    ind_sell_mvrv:'MVRV Z — 過熱', ind_sell_nupl:'NUPL — 貪婪程度',
    ind_sell_funding:'期貨溢價', ind_sell_fg:'SOPR LTH-STH 價差',
    desc_sell_fg:`SOPR LTH-STH 價差衡量長期與短期持有者獲利了結行為之間的差距。
較大的正價差代表短期持有者比長期持有者更快實現獲利——為派發的早期訊號。

做空區：價差 ≥ 0.15（STH 積極賣出而 LTH 續抱）
安全區：價差 ≤ 0.02（行為一致，無派發訊號）

目前：STH 相對 LTH 實現可觀獲利 → 派發可能正在開始。`,
    ind_sell_sopr:'STH-SOPR — 獲利了結', ind_sell_cbp:'Coinbase Premium — FOMO',
    // Section headers
    sec_onchain:'鏈上估值', sec_miner:'礦工／情緒',
    sec_inst:'機構資金流', sec_cycle:'週期位置',
    sec_breakdown:'分數拆解', sec_triggers:'下一級觸發條件',
    sec_sellTriggers:'賣出訊號觸發條件', sec_macro:'總體經濟警示',
    sec_insights:'部落格', sec_insights2:'部落格', viewAllInsights:'全部 →', loadingInsights:'載入中...', loadMoreInsights:'載入更多', collapseInsights:'收合',
    sec_history:'分數歷史', sec_histSub:'儲存在瀏覽器本機',
    histH:'時', histD:'日', histM:'月',
    // Indicator detailed descriptions
    desc_mvrv_z:"MVRV Z Score 衡量比特幣相對其 realized value 被高估或低估的程度。\n• < 0：歷史上低估（底部區）→ 強力買進\n• 0~1：略微低估 → 累積區\n• 1~3：合理價值 → 中性\n• > 3：高估（頂部區）→ 考慮賣出\n目前階段：0.27 — 接近底部。歷史上低於 0.5 的數值常先於大型牛市。",
    desc_nupl:"NUPL（Net Unrealized Profit/Loss）顯示所有 BTC 持有者整體的盈虧狀態。\n• < 0%（投降）：持有者虧損 → 極度買進訊號\n• 0~25%（希望/恐懼）：自底部回升 → 買進區\n• 25~50%（樂觀）：週期中段 → 中性\n• 50~75%（信念/貪婪）：週期後段 → 觀望\n• > 75%（狂熱）：貪婪頂峰 → 賣出訊號",
    desc_realized:"顯示目前價格距所有 BTC 持有者平均成本基礎（Realized Price）的幅度。\n• 低於 0%：價格低於平均成本 → 恐慌區，最強買進\n• 0~5%：接近 realized price → 理想進場\n• 5~20%：溫和溢價 → 可接受\n• > 20%：高溢價 → 謹慎",
    desc_hash:"Hash Ribbon 追蹤比特幣挖礦算力的動能（30 日均線 vs 60 日均線）。\n• 投降：弱勢礦工關機（30MA < 60MA）→ 底部形成中\n• 復甦交叉：30MA 上穿 60MA → 最可靠的領先買進訊號（提前 2~4 週）\n歷史準確度：精準標記 2016、2018、2020、2022 年底部。",
    desc_sopr:"短期持有者 SOPR 衡量近期買家賣出時是獲利還是虧損。\n• < 0.95：大幅虧損下的恐慌賣出 → 投降＝買進訊號\n• 0.95~1.0：輕微實現虧損 → 接近底部\n• 1.0~1.03：中性獲利了結\n• > 1.05：強力獲利了結 → 派發＝頂部訊號",
    desc_funding:"期現差距 =（期貨標記價 - 現貨指數價）/ 現貨價\n無需等待 8 小時結算延遲即可即時顯示槓桿部位。\n• 負值（backwardation）：期貨較現貨便宜 → 空單過載 → 領先買進訊號\n• ±0.01%：中性（BTC 正常範圍）\n• > 0.05%：Contango → 多單過載 → 謹慎\n• > 0.15%：極端 Contango → 頂部訊號",
    desc_cbp:"Coinbase Premium =（Coinbase BTC 價 - Binance BTC 價）/ Binance 價\n即時反映美國機構需求。領先 ETF 資金流數據 2~3 天。\n• 正值：美國機構買進 → 偏多\n• 接近零：觀望/中性\n• 負值：機構觀望 → 短期偏空\n目前：負值（連續 46+ 天）→ 機構等待總經明朗。",
    desc_lth:"長期持有者供給 % ＝ 由閒置 155 天以上地址持有的 BTC 供給比例。\n• > 75%：巨鯨積極累積 → 強力買進訊號\n• 70~75%：正常累積\n• < 70%：派發（巨鯨賣出）\n創紀錄水準（79%）代表聰明錢並未賣出 — 需求回歸時將出現供給衝擊。",
    desc_dom:"BTC 市佔率 ＝ BTC 市值 / 加密貨幣總市值\n當資金自山寨幣流向比特幣時上升 — 大型牛市前的典型型態。\n• 55~63%（CoinGecko 基準）：BTC season → 資金向 BTC 集中 → 買進區\n• < 50%：Alt season → 風險偏好\n• > 65%：極端 BTC 市佔率 → 可能預示山寨輪動將至",
    desc_halving:"比特幣減半每 ~4 年將挖礦獎勵砍半，造成供給衝擊。\n歷史底部時機：\n• 2015 底部：2016 減半前 18 個月\n• 2018 底部：2020 減半前 17 個月\n• 2022 底部：2024 減半前 17 個月\n• 目前：2028 年 4 月減半前 ~22 個月 → 處於核心底部窗口。",
    // Alert labels
    alertTitle:'警報設定',
    alertDesc:'條件達成時透過瀏覽器推播 + 視覺閃爍 + 聲音通知你。',
    alertBuySection:'📈 做多觸發', alertSellSection:'📉 做空觸發',
    a2:'做多分數 ≥ 6.0（開始分批）',
    a3:'做多分數 ≥ 7.0（加碼部位）', a4:'做多分數 ≥ 8.0（積極買進）',
    a5:'MVRV Z ≤ 0 — 完全底部區', a6:'NUPL 低於 0% — 投降',
    a7:'期貨差距轉為負值（backwardation）', a8:'Hash Ribbon 復甦交叉',
    a9:'Coinbase Premium 轉正',
    b1:'做空分數 ≥ 6.0（準備做空）', b2:'做空分數 ≥ 7.0（加碼做空）',
    b3:'做空分數 ≥ 8.0（完全做空）', b4:'MVRV Z ≥ 3.5 — 狂熱區',
    b5:'NUPL ≥ 75% — 極度貪婪', b6:'Fear & Greed ≥ 80',
    b7:'期貨 Contango ≥ 0.15%', b8:'Coinbase Premium ≥ 0.3% — FOMO',
    priceBelow:'價格跌破時警報 $', priceAbove:'價格漲破時警報 $',
    enableNotif:'啟用瀏覽器通知',
    ind_sell_lth:'LTH 供給 — 派發', ind_sell_dom:'BTC 市佔率 — 風險',
    ind_sell_halving:'減半 — 週期階段', ind_sell_ath:'接近 ATH — 頂部風險',
    ind_sell_mvrv:'MVRV Z — 過熱', ind_sell_nupl:'NUPL — 貪婪',
    ind_sell_funding:'期貨溢價', ind_sell_fg:'SOPR LTH-STH 價差',
    desc_sell_fg:`SOPR LTH-STH 價差衡量長期與短期持有者獲利了結行為之間的差距。
較大的正價差代表短期持有者比長期持有者更快實現獲利——為派發的早期訊號。

做空區：價差 ≥ 0.15（STH 積極賣出而 LTH 續抱）
安全區：價差 ≤ 0.02（行為一致，無派發訊號）

目前：STH 相對 LTH 實現可觀獲利 → 派發可能正在開始。`,
    ind_sell_sopr:'STH-SOPR — 獲利了結', ind_sell_cbp:'Coinbase Premium — FOMO',
  },
};
