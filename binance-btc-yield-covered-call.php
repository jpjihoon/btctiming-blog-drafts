<?php $slug = 'binance-btc-yield-covered-call'; require __DIR__.'/_header.php'; ?>

  <p class="ko">세계 최대 암호화폐 거래소 <strong>바이낸스(Binance)</strong>가 보유한 비트코인을 팔지 않고도 추가 수익을 낼 수 있다는 신상품 'BTC Yield'를 7일 자사 상품 코너 '바이낸스 어닝(Binance Earn)' 안에 출시했다고 <strong>코인데스크(CoinDesk)</strong>가 전했다. 이 상품은 스테이블코인이 아니라 오직 비트코인으로만 예치할 수 있으며, 바이낸스가 예치된 비트코인을 담보로 잡고 <strong>콜옵션(call option)을 체계적으로 매도</strong>해 받은 프리미엄 대부분을 참여자에게 나눠주는 구조다. 겉으로는 '비트코인으로 받는 이자'처럼 보이지만, 실체는 상승 여력을 팔아 변동성을 현금화하는 커버드콜 전략이다.</p>
  <p class="en">The world's largest crypto exchange, <strong>Binance</strong>, launched a new product called BTC Yield on the 7th inside its Binance Earn hub, pitched as a way to earn extra return on held bitcoin without selling it, <strong>CoinDesk</strong> reported. The product can be funded only with bitcoin — not stablecoins — and works by having Binance hold the deposited BTC as collateral while it <strong>systematically sells call options</strong>, passing most of the collected premium to participants. It looks on the surface like "interest paid in bitcoin," but it is in substance a covered-call strategy that monetizes volatility by selling away upside.</p>
  <p class="ja">世界最大の暗号資産取引所<strong>バイナンス(Binance)</strong>が、保有するビットコインを売らずに追加収益を得られるという新商品「BTC Yield」を7日、自社の商品コーナー「バイナンス・アーン(Binance Earn)」内に投入したと<strong>コインデスク(CoinDesk)</strong>が伝えた。この商品はステーブルコインではなくビットコインでのみ預け入れでき、バイナンスが預けられたビットコインを担保に取り<strong>コールオプションを体系的に売却</strong>し、受け取ったプレミアムの大半を参加者に分配する構造だ。表向きは「ビットコインで受け取る利子」のように見えるが、実体は上昇余地を売ってボラティリティを現金化するカバードコール戦略である。</p>
  <p class="es">La mayor casa de cambio de criptomonedas del mundo, <strong>Binance</strong>, lanzó el día 7 un nuevo producto llamado BTC Yield dentro de su sección Binance Earn, presentado como una forma de obtener rendimiento adicional sobre el bitcoin en cartera sin venderlo, informó <strong>CoinDesk</strong>. El producto solo puede financiarse con bitcoin —no con stablecoins— y funciona con Binance reteniendo el BTC depositado como garantía mientras <strong>vende opciones de compra de forma sistemática</strong>, repartiendo la mayor parte de la prima recaudada entre los participantes. En apariencia parece "interés pagado en bitcoin", pero en esencia es una estrategia de covered call que monetiza la volatilidad vendiendo el potencial alcista.</p>
  <p class="de">Die größte Kryptobörse der Welt, <strong>Binance</strong>, hat am 7. ein neues Produkt namens BTC Yield in ihrem Bereich Binance Earn eingeführt, das als Möglichkeit beworben wird, mit gehaltenem Bitcoin zusätzliche Rendite zu erzielen, ohne ihn zu verkaufen, wie <strong>CoinDesk</strong> berichtete. Das Produkt kann nur mit Bitcoin — nicht mit Stablecoins — bestückt werden und funktioniert, indem Binance den eingezahlten BTC als Sicherheit hält und <strong>systematisch Call-Optionen verkauft</strong>, wobei der Großteil der eingenommenen Prämie an die Teilnehmer weitergegeben wird. Oberflächlich wirkt es wie „in Bitcoin gezahlte Zinsen", ist im Kern aber eine Covered-Call-Strategie, die Volatilität zu Geld macht, indem sie das Aufwärtspotenzial verkauft.</p>

  <div class="ko">
  <svg viewBox="0 0 700 360" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">커버드콜의 손익 구조: 횡보장에 강하고 급등장에 약하다 (개념도)</text>
    <line x1="60" y1="210" x2="650" y2="210" stroke="#3f3f46" stroke-width="1.5"/>
    <text x="655" y="214" fill="#71717a" font-size="13" text-anchor="start" font-family="sans-serif">0%</text>
    <rect x="500" y="42" width="185" height="46" rx="6" fill="#18181b" stroke="#27272a"/>
    <rect x="512" y="52" width="16" height="12" fill="#38bdf8"/><text x="534" y="62" fill="#e4e4e7" font-size="13" font-family="sans-serif">단순 보유(HODL)</text>
    <rect x="512" y="70" width="16" height="12" fill="#f0b90b"/><text x="534" y="80" fill="#e4e4e7" font-size="13" font-family="sans-serif">BTC Yield(커버드콜)</text>
    <rect x="110" y="210" width="42" height="60" fill="#38bdf8" opacity="0.85"/>
    <rect x="156" y="210" width="42" height="51" fill="#f0b90b"/>
    <text x="131" y="288" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">-20%</text>
    <text x="177" y="288" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">-17%</text>
    <text x="154" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">하락장</text>
    <rect x="310" y="206" width="42" height="4" fill="#38bdf8" opacity="0.85"/>
    <rect x="356" y="192" width="42" height="18" fill="#f0b90b"/>
    <text x="331" y="200" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">0%</text>
    <text x="377" y="184" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+6%</text>
    <text x="354" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">횡보장</text>
    <rect x="510" y="90" width="42" height="120" fill="#38bdf8" opacity="0.85"/>
    <rect x="556" y="174" width="42" height="36" fill="#f0b90b"/>
    <text x="531" y="82" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">+40%</text>
    <text x="577" y="166" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+12%</text>
    <text x="554" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">강한 상승장</text>
    <text x="60" y="340" fill="#71717a" font-size="12" font-family="sans-serif">※ 수치는 전략 특성을 보여주기 위한 예시이며 실제 수익률이 아니다.</text>
    <text x="650" y="352" fill="#52525b" font-size="11" text-anchor="end" font-family="sans-serif">출처: CoinDesk 보도 기반 개념도</text>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 360" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Covered-call payoff: strong in chop, weak in sharp rallies (illustrative)</text>
    <line x1="60" y1="210" x2="650" y2="210" stroke="#3f3f46" stroke-width="1.5"/>
    <text x="655" y="214" fill="#71717a" font-size="13" text-anchor="start" font-family="sans-serif">0%</text>
    <rect x="490" y="42" width="195" height="46" rx="6" fill="#18181b" stroke="#27272a"/>
    <rect x="502" y="52" width="16" height="12" fill="#38bdf8"/><text x="524" y="62" fill="#e4e4e7" font-size="13" font-family="sans-serif">Simple hold (HODL)</text>
    <rect x="502" y="70" width="16" height="12" fill="#f0b90b"/><text x="524" y="80" fill="#e4e4e7" font-size="13" font-family="sans-serif">BTC Yield (covered call)</text>
    <rect x="110" y="210" width="42" height="60" fill="#38bdf8" opacity="0.85"/>
    <rect x="156" y="210" width="42" height="51" fill="#f0b90b"/>
    <text x="131" y="288" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">-20%</text>
    <text x="177" y="288" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">-17%</text>
    <text x="154" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Falling</text>
    <rect x="310" y="206" width="42" height="4" fill="#38bdf8" opacity="0.85"/>
    <rect x="356" y="192" width="42" height="18" fill="#f0b90b"/>
    <text x="331" y="200" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">0%</text>
    <text x="377" y="184" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+6%</text>
    <text x="354" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Ranging</text>
    <rect x="510" y="90" width="42" height="120" fill="#38bdf8" opacity="0.85"/>
    <rect x="556" y="174" width="42" height="36" fill="#f0b90b"/>
    <text x="531" y="82" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">+40%</text>
    <text x="577" y="166" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+12%</text>
    <text x="554" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Strong rally</text>
    <text x="60" y="340" fill="#71717a" font-size="12" font-family="sans-serif">Figures are illustrative of the strategy's character, not actual returns.</text>
    <text x="650" y="352" fill="#52525b" font-size="11" text-anchor="end" font-family="sans-serif">Source: schematic based on CoinDesk reporting</text>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 360" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">カバードコールの損益: 横ばいに強く急騰に弱い(概念図)</text>
    <line x1="60" y1="210" x2="650" y2="210" stroke="#3f3f46" stroke-width="1.5"/>
    <text x="655" y="214" fill="#71717a" font-size="13" text-anchor="start" font-family="sans-serif">0%</text>
    <rect x="500" y="42" width="185" height="46" rx="6" fill="#18181b" stroke="#27272a"/>
    <rect x="512" y="52" width="16" height="12" fill="#38bdf8"/><text x="534" y="62" fill="#e4e4e7" font-size="13" font-family="sans-serif">単純保有(HODL)</text>
    <rect x="512" y="70" width="16" height="12" fill="#f0b90b"/><text x="534" y="80" fill="#e4e4e7" font-size="13" font-family="sans-serif">BTC Yield(カバードコール)</text>
    <rect x="110" y="210" width="42" height="60" fill="#38bdf8" opacity="0.85"/>
    <rect x="156" y="210" width="42" height="51" fill="#f0b90b"/>
    <text x="131" y="288" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">-20%</text>
    <text x="177" y="288" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">-17%</text>
    <text x="154" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">下落相場</text>
    <rect x="310" y="206" width="42" height="4" fill="#38bdf8" opacity="0.85"/>
    <rect x="356" y="192" width="42" height="18" fill="#f0b90b"/>
    <text x="331" y="200" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">0%</text>
    <text x="377" y="184" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+6%</text>
    <text x="354" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">横ばい相場</text>
    <rect x="510" y="90" width="42" height="120" fill="#38bdf8" opacity="0.85"/>
    <rect x="556" y="174" width="42" height="36" fill="#f0b90b"/>
    <text x="531" y="82" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">+40%</text>
    <text x="577" y="166" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+12%</text>
    <text x="554" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">強い上昇相場</text>
    <text x="60" y="340" fill="#71717a" font-size="12" font-family="sans-serif">※ 数値は戦略の特性を示す例示であり実際の利回りではない。</text>
    <text x="650" y="352" fill="#52525b" font-size="11" text-anchor="end" font-family="sans-serif">出典: CoinDesk報道に基づく概念図</text>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 360" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Pago del covered call: fuerte en lateral, débil en subidas fuertes</text>
    <line x1="60" y1="210" x2="650" y2="210" stroke="#3f3f46" stroke-width="1.5"/>
    <text x="655" y="214" fill="#71717a" font-size="13" text-anchor="start" font-family="sans-serif">0%</text>
    <rect x="486" y="42" width="199" height="46" rx="6" fill="#18181b" stroke="#27272a"/>
    <rect x="498" y="52" width="16" height="12" fill="#38bdf8"/><text x="520" y="62" fill="#e4e4e7" font-size="13" font-family="sans-serif">Solo mantener (HODL)</text>
    <rect x="498" y="70" width="16" height="12" fill="#f0b90b"/><text x="520" y="80" fill="#e4e4e7" font-size="13" font-family="sans-serif">BTC Yield (covered call)</text>
    <rect x="110" y="210" width="42" height="60" fill="#38bdf8" opacity="0.85"/>
    <rect x="156" y="210" width="42" height="51" fill="#f0b90b"/>
    <text x="131" y="288" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">-20%</text>
    <text x="177" y="288" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">-17%</text>
    <text x="154" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Bajista</text>
    <rect x="310" y="206" width="42" height="4" fill="#38bdf8" opacity="0.85"/>
    <rect x="356" y="192" width="42" height="18" fill="#f0b90b"/>
    <text x="331" y="200" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">0%</text>
    <text x="377" y="184" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+6%</text>
    <text x="354" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Lateral</text>
    <rect x="510" y="90" width="42" height="120" fill="#38bdf8" opacity="0.85"/>
    <rect x="556" y="174" width="42" height="36" fill="#f0b90b"/>
    <text x="531" y="82" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">+40%</text>
    <text x="577" y="166" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+12%</text>
    <text x="554" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Subida fuerte</text>
    <text x="60" y="340" fill="#71717a" font-size="12" font-family="sans-serif">Las cifras ilustran el carácter de la estrategia, no rendimientos reales.</text>
    <text x="650" y="352" fill="#52525b" font-size="11" text-anchor="end" font-family="sans-serif">Fuente: esquema basado en CoinDesk</text>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 360" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Covered-Call-Auszahlung: stark im Seitwärts, schwach bei Rallyes</text>
    <line x1="60" y1="210" x2="650" y2="210" stroke="#3f3f46" stroke-width="1.5"/>
    <text x="655" y="214" fill="#71717a" font-size="13" text-anchor="start" font-family="sans-serif">0%</text>
    <rect x="492" y="42" width="193" height="46" rx="6" fill="#18181b" stroke="#27272a"/>
    <rect x="504" y="52" width="16" height="12" fill="#38bdf8"/><text x="526" y="62" fill="#e4e4e7" font-size="13" font-family="sans-serif">Nur Halten (HODL)</text>
    <rect x="504" y="70" width="16" height="12" fill="#f0b90b"/><text x="526" y="80" fill="#e4e4e7" font-size="13" font-family="sans-serif">BTC Yield (Covered Call)</text>
    <rect x="110" y="210" width="42" height="60" fill="#38bdf8" opacity="0.85"/>
    <rect x="156" y="210" width="42" height="51" fill="#f0b90b"/>
    <text x="131" y="288" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">-20%</text>
    <text x="177" y="288" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">-17%</text>
    <text x="154" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Fallend</text>
    <rect x="310" y="206" width="42" height="4" fill="#38bdf8" opacity="0.85"/>
    <rect x="356" y="192" width="42" height="18" fill="#f0b90b"/>
    <text x="331" y="200" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">0%</text>
    <text x="377" y="184" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+6%</text>
    <text x="354" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Seitwärts</text>
    <rect x="510" y="90" width="42" height="120" fill="#38bdf8" opacity="0.85"/>
    <rect x="556" y="174" width="42" height="36" fill="#f0b90b"/>
    <text x="531" y="82" fill="#38bdf8" font-size="13" text-anchor="middle" font-family="sans-serif">+40%</text>
    <text x="577" y="166" fill="#f0b90b" font-size="13" text-anchor="middle" font-family="sans-serif">+12%</text>
    <text x="554" y="312" fill="#a1a1aa" font-size="13" text-anchor="middle" font-family="sans-serif">Starke Rallye</text>
    <text x="60" y="340" fill="#71717a" font-size="12" font-family="sans-serif">Zahlen illustrieren den Charakter der Strategie, keine realen Renditen.</text>
    <text x="650" y="352" fill="#52525b" font-size="11" text-anchor="end" font-family="sans-serif">Quelle: Schema nach CoinDesk</text>
  </svg>
  </div>

  <h2 class="ko">상품은 어떻게 작동하나</h2>
  <h2 class="en">How the product works</h2>
  <h2 class="ja">商品はどう機能するか</h2>
  <h2 class="es">Cómo funciona el producto</h2>
  <h2 class="de">Wie das Produkt funktioniert</h2>
  <p class="ko">코인데스크 설명에 따르면 이용자가 비트코인을 예치하면 'BTCY'라는 내부 포지션을 받아 전략 내 자기 몫을 추적한다. 모든 계산은 비트코인 단위로 이뤄지며 스테이블코인이나 다른 자산으로는 넣을 수 없다. 바이낸스는 예치된 비트코인을 담보로 두고 <strong>비트코인 콜옵션을 반복적으로 매도</strong>한다. 콜옵션 매도자는 '가격이 특정 수준(행사가) 위로 오르지 않는다'에 베팅하고 그 대가로 프리미엄을 미리 받는다. 커버드콜이 '커버드(covered·담보된)'인 이유는 매도한 콜을 뒷받침할 현물 비트코인을 이미 보유하고 있어서, 급등 시 없는 물량을 사서 갚아야 하는 무제한 손실 위험이 없기 때문이다.</p>
  <p class="en">Per CoinDesk, a user who deposits bitcoin receives an internal position called BTCY that tracks their share of the strategy. Everything is denominated in bitcoin; the product cannot be funded with stablecoins or other assets. Binance holds the deposited BTC as collateral and <strong>repeatedly sells bitcoin call options</strong>. A call seller is betting that price will not rise above a chosen level (the strike) and is paid a premium up front for that bet. A covered call is "covered" because the writer already holds the spot bitcoin backing the sold call, so there is no risk of unlimited loss from having to buy missing coins in a spike.</p>
  <p class="ja">コインデスクの説明によると、利用者がビットコインを預けると「BTCY」という内部ポジションを受け取り、戦略内の自分の持ち分を追跡する。すべての計算はビットコイン単位で行われ、ステーブルコインや他の資産では入れられない。バイナンスは預けられたビットコインを担保に置き<strong>ビットコインのコールオプションを繰り返し売却する</strong>。コール売り手は「価格が特定水準(権利行使価格)を超えて上がらない」に賭け、その対価としてプレミアムを前もって受け取る。カバードコールが「カバード(担保された)」なのは、売ったコールを裏付ける現物ビットコインをすでに保有しているため、急騰時に無い数量を買って返す無制限損失リスクがないからだ。</p>
  <p class="es">Según CoinDesk, el usuario que deposita bitcoin recibe una posición interna llamada BTCY que registra su parte en la estrategia. Todo se denomina en bitcoin; el producto no puede financiarse con stablecoins ni otros activos. Binance retiene el BTC depositado como garantía y <strong>vende repetidamente opciones de compra de bitcoin</strong>. Quien vende una call apuesta a que el precio no superará cierto nivel (el strike) y cobra por adelantado una prima por esa apuesta. Un covered call está "cubierto" porque quien lo escribe ya posee el bitcoin al contado que respalda la call vendida, de modo que no hay riesgo de pérdida ilimitada por tener que comprar monedas faltantes en un salto.</p>
  <p class="de">Laut CoinDesk erhält ein Nutzer, der Bitcoin einzahlt, eine interne Position namens BTCY, die seinen Anteil an der Strategie abbildet. Alles ist in Bitcoin denominiert; das Produkt kann nicht mit Stablecoins oder anderen Assets bestückt werden. Binance hält den eingezahlten BTC als Sicherheit und <strong>verkauft wiederholt Bitcoin-Call-Optionen</strong>. Ein Call-Verkäufer wettet darauf, dass der Preis ein gewähltes Niveau (den Strike) nicht übersteigt, und erhält dafür vorab eine Prämie. Ein Covered Call ist „gedeckt", weil der Schreiber den zugrunde liegenden Spot-Bitcoin bereits hält, sodass kein Risiko unbegrenzten Verlusts besteht, fehlende Coins in einem Sprung nachkaufen zu müssen.</p>
  <p class="ko">수익은 두 갈래로 발생한다. 첫째, 모인 프리미엄의 일부가 비트코인으로 환산돼 매주 금요일 이용자의 현물 계좌로 분배되는데, 이는 '가능한' 주간 지급일 뿐 보장되지 않으며 0이 될 수도 있다. 둘째, 남은 프리미엄은 전략 안에 쌓여 BTCY 한 단위가 대표하는 실제 비트코인 수량을 서서히 늘린다. 이용자가 나중에 환매하면 처음보다 늘어난 비트코인을 돌려받는다. 다만 바이낸스는 <strong>총 옵션 프리미엄의 15%를 먼저 떼어간 뒤</strong> 이용자 수익률을 계산하며 환매 시 수수료도 붙는다. 원금 보장은 없다. 결국 이용자는 비트코인 가격 하락 위험은 거의 그대로 떠안으면서, 상승 이익은 콜 행사로 잘려나가는 비대칭을 받아들이는 셈이다.</p>
  <p class="en">Return comes in two streams. First, part of the collected premium is converted to bitcoin and distributed to the user's spot account every Friday — a "possible" weekly payout, not guaranteed, and it can be zero. Second, the remaining premium accrues inside the strategy, slowly raising the actual amount of bitcoin each BTCY unit represents; on later redemption the user gets back more bitcoin than they put in. But Binance <strong>takes 15% of gross option premiums first</strong>, before user yield is calculated, and redemption fees apply. There is no principal protection. In the end the user accepts an asymmetry: they still bear nearly all of bitcoin's downside, while their upside is shaved off whenever the calls are exercised.</p>
  <p class="ja">収益は二つの流れで発生する。第一に、集めたプレミアムの一部がビットコインに換算され毎週金曜に利用者の現物口座へ分配されるが、これは「可能な」週次支給にすぎず保証されず、ゼロになりうる。第二に、残ったプレミアムは戦略内に積み上がり、BTCY一単位が表す実際のビットコイン数量を徐々に増やす。利用者が後で換金すると最初より増えたビットコインを受け取る。ただしバイナンスは<strong>総オプションプレミアムの15%を先に差し引いた上で</strong>利用者利回りを計算し、換金時に手数料も付く。元本保証はない。結局利用者は、ビットコイン価格の下落リスクはほぼそのまま抱えつつ、上昇利益はコール行使で削られる非対称を受け入れることになる。</p>
  <p class="es">El rendimiento llega en dos flujos. Primero, parte de la prima recaudada se convierte en bitcoin y se distribuye a la cuenta al contado del usuario cada viernes: un pago semanal "posible", no garantizado, que puede ser cero. Segundo, la prima restante se acumula dentro de la estrategia, elevando poco a poco la cantidad real de bitcoin que representa cada unidad BTCY; al redimir después, el usuario recibe más bitcoin del que puso. Pero Binance <strong>se queda primero con el 15% de las primas brutas</strong>, antes de calcular el rendimiento del usuario, y aplican comisiones de reembolso. No hay protección del principal. Al final el usuario acepta una asimetría: sigue soportando casi toda la caída del bitcoin, mientras su subida se recorta cada vez que se ejercen las calls.</p>
  <p class="de">Rendite entsteht in zwei Strömen. Erstens wird ein Teil der eingenommenen Prämie in Bitcoin umgewandelt und jeden Freitag auf das Spot-Konto des Nutzers ausgeschüttet — eine „mögliche" wöchentliche Auszahlung, nicht garantiert, sie kann null sein. Zweitens sammelt sich die restliche Prämie in der Strategie an und erhöht langsam die tatsächliche Bitcoin-Menge, die jede BTCY-Einheit repräsentiert; bei späterer Rücknahme erhält der Nutzer mehr Bitcoin zurück, als er eingezahlt hat. Doch Binance <strong>nimmt zuerst 15% der Brutto-Optionsprämien</strong>, bevor die Nutzerrendite berechnet wird, und Rücknahmegebühren fallen an. Es gibt keinen Kapitalschutz. Am Ende akzeptiert der Nutzer eine Asymmetrie: Er trägt weiterhin fast das gesamte Abwärtsrisiko von Bitcoin, während sein Aufwärtspotenzial gekappt wird, sobald die Calls ausgeübt werden.</p>

  <h2 class="ko">왜 지금인가, 그리고 유사 상품과의 비교</h2>
  <h2 class="en">Why now, and how it compares</h2>
  <h2 class="ja">なぜ今か、そして類似商品との比較</h2>
  <h2 class="es">Por qué ahora, y cómo se compara</h2>
  <h2 class="de">Warum jetzt, und der Vergleich</h2>
  <p class="ko">이 상품은 진공에서 나오지 않았다. 2026년 6월에는 커버드콜 방식으로 연 15~25% 수익률을 겨냥한 비트코인 인컴형 ETF가 등장했고, 대형 운용사들도 유사한 옵션 기반 상품을 잇달아 신청해 왔다. 즉 '비트코인을 보유하되 옵션 프리미엄으로 현금흐름을 만든다'는 아이디어는 이미 규제권 ETF 시장에서 검증되던 흐름이며, 바이낸스는 이를 거래소 리테일 이용자에게 원클릭 상품으로 옮겨온 것이다. 이런 구조화·파생 상품이 뒤늦게 층층이 쌓이는 패턴은 과거 비트코인 <a href="/blog/bitcoin-etf-options-volume-surge.html">ETF 옵션 거래가 급증하며 시장 구조가 다층화됐던 국면</a>과 닮아 있다.</p>
  <p class="en">The product did not emerge in a vacuum. In June 2026 a bitcoin income-style ETF using a covered-call approach and targeting a 15–25% annual yield appeared, and large managers have filed a string of similar option-based products. The idea of "hold bitcoin but manufacture cash flow from option premium" was already being validated in the regulated ETF market; Binance simply ported it to exchange retail users as a one-click product. This pattern of structured and derivative products stacking up later mirrors the earlier phase when bitcoin <a href="/blog/bitcoin-etf-options-volume-surge.html">ETF options volume surged and layered the market's structure</a>.</p>
  <p class="ja">この商品は真空から生まれたわけではない。2026年6月にはカバードコール方式で年15~25%の利回りを狙うビットコイン・インカム型ETFが登場し、大手運用会社も類似のオプション基盤商品を相次いで申請してきた。つまり「ビットコインを保有しつつオプションプレミアムでキャッシュフローを作る」という発想はすでに規制圏ETF市場で検証されていた流れであり、バイナンスはそれを取引所リテール利用者へワンクリック商品として移植したのだ。こうした仕組み・デリバティブ商品が遅れて層状に積み上がるパターンは、過去のビットコイン<a href="/blog/bitcoin-etf-options-volume-surge.html">ETFオプション取引が急増し市場構造が多層化した局面</a>に似ている。</p>
  <p class="es">El producto no surgió en el vacío. En junio de 2026 apareció un ETF de bitcoin tipo income con enfoque de covered call que apuntaba a un rendimiento anual del 15–25%, y grandes gestoras han presentado una serie de productos similares basados en opciones. La idea de "mantener bitcoin pero fabricar flujo de caja con la prima de opciones" ya se validaba en el mercado regulado de ETF; Binance simplemente la trasladó a los usuarios minoristas de la casa de cambio como producto de un clic. Este patrón de productos estructurados y derivados apilándose después recuerda la fase previa en que el <a href="/blog/bitcoin-etf-options-volume-surge.html">volumen de opciones de los ETF de bitcoin se disparó y estratificó la estructura del mercado</a>.</p>
  <p class="de">Das Produkt entstand nicht im luftleeren Raum. Im Juni 2026 erschien ein Bitcoin-Income-ETF mit Covered-Call-Ansatz, der eine Jahresrendite von 15–25% anpeilte, und große Verwalter haben eine Reihe ähnlicher optionsbasierter Produkte eingereicht. Die Idee, „Bitcoin halten, aber aus Optionsprämien Cashflow erzeugen", wurde bereits im regulierten ETF-Markt erprobt; Binance hat sie schlicht als Ein-Klick-Produkt zu den Retail-Nutzern der Börse portiert. Dieses Muster, in dem strukturierte und Derivateprodukte später Schicht um Schicht entstehen, ähnelt der früheren Phase, als das <a href="/blog/bitcoin-etf-options-volume-surge.html">Optionsvolumen der Bitcoin-ETFs sprunghaft stieg und die Marktstruktur mehrschichtig machte</a>.</p>
  <p class="ko">그러나 반론도 분명하다. 커버드콜은 본질적으로 '변동성을 파는' 전략이라, 비트코인이 강하게 추세 상승할 때 단순 보유자보다 구조적으로 뒤처진다. 위 개념도가 보여주듯 횡보·완만한 장에서는 프리미엄이 쿠션이 되지만, 급등장에서는 콜이 행사되며 상승분을 대부분 반납한다. 여기에 15%라는 운영사 몫이 더해지면, 장기적으로 이 상품이 단순 홀딩을 이길 수 있는 구간은 생각보다 좁다. 손실은 온전히 이용자 몫이고 이익 상단은 잘리는데, 그 대가로 받는 프리미엄의 상당 부분을 거래소가 먼저 가져가는 구조이기 때문이다. 이는 앞서 <a href="/blog/volatility-decay-leverage-tokens.html">레버리지 토큰이 횡보장에서 가치가 갉아먹혔던 사례</a>처럼, 구조화 상품의 '숨은 비용'이 시간이 지나야 드러난다는 점을 상기시킨다.</p>
  <p class="en">Yet the counterargument is clear. A covered call is at heart a "sell volatility" strategy, so it structurally lags simple holders when bitcoin trends strongly higher. As the schematic shows, premium acts as a cushion in flat or mild markets, but in a sharp rally the calls are exercised and most of the gain is handed back. Add the manager's 15% cut and the range in which this product can beat plain holding over time is narrower than it looks. The loss is fully the user's and the upside is capped, while the exchange takes a big slice of the premium paid for that trade-off first. It recalls how <a href="/blog/volatility-decay-leverage-tokens.html">leverage tokens had their value eroded in choppy markets</a> — a reminder that the "hidden cost" of structured products only surfaces with time.</p>
  <p class="ja">しかし反論も明確だ。カバードコールは本質的に「ボラティリティを売る」戦略なので、ビットコインが強く上昇トレンドを描くとき単純保有者に構造的に劣後する。上の概念図が示すように、横ばい・緩やかな相場ではプレミアムがクッションになるが、急騰相場ではコールが行使され上昇分の大半を返上する。ここに15%という運営者の取り分が加われば、長期的にこの商品が単純保有に勝てる区間は見た目より狭い。損失は丸ごと利用者のもので上昇の上限は切られる一方、その対価として受け取るプレミアムの相当部分を取引所が先に取る構造だからだ。これは以前の<a href="/blog/volatility-decay-leverage-tokens.html">レバレッジトークンが横ばい相場で価値を削られた事例</a>のように、仕組み商品の「隠れコスト」は時間が経って初めて表れることを思い出させる。</p>
  <p class="es">Pero el contraargumento es claro. Un covered call es en esencia una estrategia de "vender volatilidad", así que queda estructuralmente rezagado frente a quien solo mantiene cuando el bitcoin sube con fuerza. Como muestra el esquema, la prima actúa de colchón en mercados planos o suaves, pero en un rally fuerte se ejercen las calls y se devuelve la mayor parte de la ganancia. Súmese el 15% de la gestora y el rango en que este producto puede batir a la simple tenencia con el tiempo es más estrecho de lo que parece. La pérdida es enteramente del usuario y el alza está limitada, mientras la casa se lleva primero una gran tajada de la prima pagada por esa compensación. Recuerda cómo <a href="/blog/volatility-decay-leverage-tokens.html">los leverage tokens vieron erosionado su valor en mercados laterales</a>: el "coste oculto" de los productos estructurados solo aflora con el tiempo.</p>
  <p class="de">Doch das Gegenargument ist klar. Ein Covered Call ist im Kern eine „Volatilität-verkaufen"-Strategie und bleibt daher strukturell hinter reinen Haltern zurück, wenn Bitcoin stark aufwärts tendiert. Wie das Schema zeigt, wirkt die Prämie in flachen oder milden Märkten als Puffer, doch in einer scharfen Rallye werden die Calls ausgeübt und der Großteil des Gewinns zurückgegeben. Hinzu kommt der 15%-Anteil des Verwalters, und der Bereich, in dem dieses Produkt schlichtes Halten über die Zeit schlagen kann, ist enger als es scheint. Der Verlust liegt vollständig beim Nutzer und das Aufwärtspotenzial ist gedeckelt, während die Börse zuerst ein großes Stück der für diesen Kompromiss gezahlten Prämie nimmt. Es erinnert daran, wie <a href="/blog/volatility-decay-leverage-tokens.html">Leverage-Token in Seitwärtsmärkten an Wert verloren</a> — ein Hinweis, dass die „versteckten Kosten" strukturierter Produkte erst mit der Zeit sichtbar werden.</p>

  <h2 class="ko">왜 중요하고 무엇을 지켜봐야 하나</h2>
  <h2 class="en">Why it matters, and what to watch</h2>
  <h2 class="ja">なぜ重要で、何を注視すべきか</h2>
  <h2 class="es">Por qué importa, y qué vigilar</h2>
  <h2 class="de">Warum es wichtig ist, und worauf zu achten</h2>
  <p class="ko">더 큰 그림에서 BTC Yield의 의미는 개별 상품의 수익률이 아니라, 비트코인을 '이자 없는 무수익 자산'에서 '현금흐름을 만드는 자산'으로 재포장하려는 업계의 지속적 시도라는 점이다. 스테이킹이 없는 비트코인은 구조적으로 배당이나 이자가 없는데, 옵션 프리미엄은 이 공백을 메우는 유일하게 현실적인 '수익원'으로 계속 소환된다. 이는 예금·채권에 익숙한 자금을 비트코인으로 끌어들이는 마케팅상 강력한 서사이지만, 동시에 '수익'의 원천이 사실은 이용자가 매도한 변동성이라는 점을 흐린다. 거래소가 이런 상품을 밀수록, 시장 전체의 내재변동성(옵션 가격)이 구조적으로 눌릴 가능성도 있다.</p>
  <p class="en">In the bigger picture, the meaning of BTC Yield is not any single product's yield but the industry's persistent attempt to repackage bitcoin from a "yield-less, non-earning asset" into a "cash-flow-generating asset." Bitcoin without staking structurally pays no dividend or interest, so option premium keeps getting summoned as the only realistic "source of yield" to fill that gap. That is a powerful marketing narrative for pulling deposit- and bond-minded money into bitcoin, but it also blurs the fact that the "yield" is really the volatility the user has sold. The more exchanges push such products, the more the market's implied volatility (option prices) could be structurally suppressed.</p>
  <p class="ja">より大きな絵で見れば、BTC Yieldの意味は個別商品の利回りではなく、ビットコインを「利子のない無収益資産」から「キャッシュフローを生む資産」へ再包装しようとする業界の持続的な試みという点だ。ステーキングのないビットコインは構造的に配当も利子もないため、オプションプレミアムはこの空白を埋める唯一現実的な「収益源」として繰り返し召喚される。これは預金・債券に慣れた資金をビットコインへ引き込むマーケティング上強力な物語だが、同時に「収益」の源泉が実は利用者が売ったボラティリティである点を曖昧にする。取引所がこうした商品を推すほど、市場全体の内在ボラティリティ(オプション価格)が構造的に抑えられる可能性もある。</p>
  <p class="es">En el panorama más amplio, el significado de BTC Yield no es el rendimiento de un producto concreto, sino el intento persistente de la industria de reempaquetar el bitcoin de "activo sin rendimiento que no genera nada" a "activo que produce flujo de caja". El bitcoin sin staking no paga estructuralmente dividendo ni interés, así que la prima de opciones se invoca una y otra vez como la única "fuente de rendimiento" realista para llenar ese vacío. Es un relato de marketing potente para atraer al bitcoin dinero acostumbrado a depósitos y bonos, pero también difumina que el "rendimiento" es en realidad la volatilidad que el usuario ha vendido. Cuanto más empujen las casas de cambio estos productos, más podría quedar estructuralmente reprimida la volatilidad implícita del mercado (los precios de las opciones).</p>
  <p class="de">Im größeren Bild liegt die Bedeutung von BTC Yield nicht in der Rendite eines einzelnen Produkts, sondern im anhaltenden Versuch der Branche, Bitcoin von einem „renditelosen, nicht ertragbringenden Asset" in ein „Cashflow erzeugendes Asset" umzuverpacken. Bitcoin ohne Staking zahlt strukturell weder Dividende noch Zinsen, weshalb die Optionsprämie immer wieder als die einzig realistische „Renditequelle" beschworen wird, um diese Lücke zu füllen. Das ist ein starkes Marketing-Narrativ, um einlagen- und anleihegewohntes Geld in Bitcoin zu ziehen, verschleiert aber zugleich, dass die „Rendite" in Wahrheit die vom Nutzer verkaufte Volatilität ist. Je stärker Börsen solche Produkte pushen, desto mehr könnte die implizite Volatilität des Marktes (Optionspreise) strukturell gedämpft werden.</p>
  <p class="ko"><strong>지켜봐야 할 것</strong>은 세 가지다. 첫째, BTC Yield에 실제로 얼마의 비트코인이 유입되는지다 — 거래소에 묶인 대규모 물량은 단기 매도 압력을 줄이지만 동시에 <a href="/blog/open-interest-guide.html">거래소·파생 포지션</a>에 대한 집중 위험을 키운다. 둘째, 강한 상승장이 왔을 때 이용자들이 상단이 잘린 수익에 실망해 자금을 빼는지, 즉 상품이 추세장에서 얼마나 견디는지다. 셋째, 15% 수수료와 주간 지급의 실제 실현 수익률이 초기 마케팅 기대와 얼마나 벌어지는지다. 커버드콜은 오래된 정통 전략이지만, 원클릭·비보장·거래소 리테일이라는 포장 안에서 그 위험이 충분히 이해되고 있는지는 별개의 문제다.</p>
  <p class="en"><strong>Three things to watch.</strong> First, how much bitcoin actually flows into BTC Yield — large amounts locked on the exchange reduce near-term sell pressure but also raise concentration risk in <a href="/blog/open-interest-guide.html">exchange and derivative positions</a>. Second, whether users, disappointed by capped gains when a strong rally arrives, pull their funds — that is, how well the product holds up in a trending market. Third, how far the realized yield, after the 15% fee and given the variable weekly payout, diverges from the initial marketing expectation. A covered call is an old, orthodox strategy, but whether its risks are well understood inside a one-click, non-guaranteed, exchange-retail wrapper is a separate question.</p>
  <p class="ja"><strong>注視すべきは</strong>三つだ。第一に、BTC Yieldに実際どれだけのビットコインが流入するかだ — 取引所に固定される大規模な数量は短期の売り圧力を減らすが、同時に<a href="/blog/open-interest-guide.html">取引所・デリバティブポジション</a>への集中リスクを高める。第二に、強い上昇相場が来たとき、利用者が上限の切られた収益に失望して資金を引くか、つまり商品がトレンド相場でどれだけ持ちこたえるかだ。第三に、15%手数料と週次支給を踏まえた実現利回りが、初期のマーケティング期待とどれだけ乖離するかだ。カバードコールは古い正統な戦略だが、その危険がワンクリック・非保証・取引所リテールという包装の中で十分理解されているかは別の問題だ。</p>
  <p class="es"><strong>Tres cosas que vigilar.</strong> Primero, cuánto bitcoin fluye realmente hacia BTC Yield: grandes cantidades bloqueadas en la casa de cambio reducen la presión vendedora inmediata, pero también elevan el riesgo de concentración en <a href="/blog/open-interest-guide.html">posiciones de exchange y derivados</a>. Segundo, si los usuarios, decepcionados por las ganancias limitadas cuando llega un rally fuerte, retiran sus fondos; es decir, cuán bien aguanta el producto en un mercado con tendencia. Tercero, cuánto se aleja el rendimiento realizado —tras el 15% de comisión y con el pago semanal variable— de la expectativa inicial de marketing. El covered call es una estrategia antigua y ortodoxa, pero si sus riesgos se entienden bien dentro de un envoltorio de un clic, sin garantía y minorista de exchange es otra cuestión.</p>
  <p class="de"><strong>Drei Dinge sind zu beobachten.</strong> Erstens, wie viel Bitcoin tatsächlich in BTC Yield fließt — große auf der Börse gebundene Mengen verringern den kurzfristigen Verkaufsdruck, erhöhen aber auch das Konzentrationsrisiko bei <a href="/blog/open-interest-guide.html">Börsen- und Derivatepositionen</a>. Zweitens, ob Nutzer, enttäuscht von gedeckelten Gewinnen bei einer starken Rallye, ihr Geld abziehen — also wie gut sich das Produkt in einem Trendmarkt hält. Drittens, wie weit die realisierte Rendite nach der 15%-Gebühr und angesichts der variablen wöchentlichen Auszahlung von der anfänglichen Marketingerwartung abweicht. Ein Covered Call ist eine alte, orthodoxe Strategie, doch ob seine Risiken innerhalb einer Ein-Klick-, nicht garantierten Börsen-Retail-Verpackung gut verstanden werden, ist eine andere Frage.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 바이낸스 BTC Yield는 '비트코인으로 받는 이자'로 홍보되지만 실체는 이용자의 변동성(상승 여력)을 파는 커버드콜이다. 횡보장에선 프리미엄이 이익이 되지만 급등장에선 단순 보유에 뒤처지고, 하락 위험은 거의 그대로 남으며 프리미엄의 15%는 거래소가 먼저 가져간다. 원클릭 포장 안에 담긴 오래된 옵션 전략의 비대칭을 이해하는 것이 핵심이다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> Binance BTC Yield is marketed as "interest paid in bitcoin," but it is in substance a covered call that sells the user's volatility (upside). Premium is a gain in flat markets, but it lags simple holding in sharp rallies, downside risk stays nearly intact, and the exchange takes 15% of the premium first. The point is to understand the asymmetry of an old option strategy wrapped in one click.</div>
  <div class="box ja">💡 <strong>示唆:</strong> バイナンスBTC Yieldは「ビットコインで受け取る利子」と宣伝されるが、実体は利用者のボラティリティ(上昇余地)を売るカバードコールだ。横ばい相場ではプレミアムが利益になるが急騰相場では単純保有に劣後し、下落リスクはほぼそのまま残り、プレミアムの15%は取引所が先に取る。ワンクリック包装に収められた古いオプション戦略の非対称を理解することが核心だ。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> Binance BTC Yield se comercializa como "interés pagado en bitcoin", pero en esencia es un covered call que vende la volatilidad (el alza) del usuario. La prima es ganancia en mercados planos, pero queda rezagada frente a la simple tenencia en rallies fuertes, el riesgo bajista permanece casi intacto y la casa se lleva primero el 15% de la prima. La clave es entender la asimetría de una vieja estrategia de opciones envuelta en un clic.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Binance BTC Yield wird als „in Bitcoin gezahlte Zinsen" vermarktet, ist im Kern aber ein Covered Call, der die Volatilität (das Aufwärtspotenzial) des Nutzers verkauft. Die Prämie ist ein Gewinn in flachen Märkten, bleibt aber in scharfen Rallyes hinter schlichtem Halten zurück, das Abwärtsrisiko bleibt nahezu unangetastet, und die Börse nimmt zuerst 15% der Prämie. Entscheidend ist, die Asymmetrie einer alten Optionsstrategie in Ein-Klick-Verpackung zu verstehen.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: CoinDesk, cryptonews.net, Binance(상품 공지), BTC.network. 상품 구조·수수료·지급 방식은 보도 시점 기준이며 이후 변경될 수 있다. 예시 수익률은 전략 특성을 설명하기 위한 개념적 수치일 뿐 실제 성과가 아니다. 이 글은 투자 조언이 아니다.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: CoinDesk, cryptonews.net, Binance (product announcement), BTC.network. Product structure, fees, and payout mechanics are as of the time of reporting and may change later. Illustrative return figures are conceptual, meant to explain the strategy's character, not actual performance. This article is not investment advice.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: CoinDesk、cryptonews.net、Binance(商品告知)、BTC.network。商品構造・手数料・支給方式は報道時点基準で、以後変更されうる。例示利回りは戦略の特性を説明するための概念的数値にすぎず実際の成果ではない。本記事は投資助言ではない。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: CoinDesk, cryptonews.net, Binance (anuncio del producto), BTC.network. La estructura del producto, las comisiones y la mecánica de pago son a la fecha de la información y pueden cambiar después. Las cifras de rendimiento ilustrativas son conceptuales, destinadas a explicar el carácter de la estrategia, no un desempeño real. Este artículo no es asesoramiento de inversión.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: CoinDesk, cryptonews.net, Binance (Produktankündigung), BTC.network. Produktstruktur, Gebühren und Auszahlungsmechanik entsprechen dem Stand der Berichterstattung und können sich später ändern. Illustrative Renditezahlen sind konzeptionell und sollen den Charakter der Strategie erläutern, keine tatsächliche Wertentwicklung. Dieser Artikel ist keine Anlageberatung.</p>

<?php require __DIR__.'/_footer.php'; ?>
