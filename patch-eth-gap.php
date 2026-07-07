<?php $slug = 'patch-eth-gap'; require __DIR__.'/_header.php'; ?>

  <p class="ko">저평가된 이더리움의 롱 점수는 늘 비트코인보다 낮게 나왔다. 두 코인이 비슷하게 싼 상황에서도 그랬다. 사용자 입장에서는 "왜 이더리움은 항상 한 수 아래인가"라는 의문이 남는다. 우리는 이 격차의 정체를 파고들었고, 그 원인이 비트코인이 가진 데이터의 양에 있다는 것을 확인했다.</p>
  <p class="en">Ethereum's long score, even when undervalued, always came out below Bitcoin's — even when the two were similarly cheap. From a user's view, the question lingers: "Why is Ethereum always a notch below?" We dug into the nature of this gap and confirmed its cause lay in the sheer amount of data Bitcoin has.</p>
  <p class="ja">割安なイーサリアムのロングスコアは常にビットコインより低く出た。二つのコインが同じように安い状況でもそうだった。ユーザーからすれば「なぜイーサリアムは常に一段下なのか」という疑問が残る。私たちはこの格差の正体を掘り下げ、その原因がビットコインの持つデータ量にあることを確認した。</p>
  <p class="es">La puntuación long de Ethereum, aun infravalorado, siempre salía por debajo de la de Bitcoin — incluso cuando ambos estaban igual de baratos. Desde la vista del usuario, queda la pregunta: "¿Por qué Ethereum siempre está un escalón abajo?" Indagamos la naturaleza de esta brecha y confirmamos que su causa estaba en la cantidad de datos que tiene Bitcoin.</p>
  <p class="de">Ethereums Long-Score fiel selbst bei Unterbewertung stets niedriger aus als der von Bitcoin — auch wenn beide ähnlich billig waren. Aus Nutzersicht bleibt die Frage: „Warum ist Ethereum immer eine Stufe darunter?" Wir gruben in die Natur dieser Lücke und bestätigten, dass ihre Ursache in der schieren Datenmenge lag, die Bitcoin hat.</p>

  <div class="ko">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">"싸다"를 세는 지표의 개수 차이</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f7931a" font-size="12" font-weight="700">비트코인 — 온체인 저평가 지표 6개</text>
      <rect x="30" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="75" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">MVRV</text>
      <rect x="126" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="171" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">NUPL</text>
      <rect x="222" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="267" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">실현가</text>
      <rect x="318" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="363" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">SOPR</text>
      <rect x="414" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="459" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">LTH</text>
      <rect x="510" y="75" width="130" height="30" fill="#f7931a" rx="3"/><text x="575" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">해시리본</text>
      <text x="30" y="150" fill="#627eea" font-size="12" font-weight="700">이더리움 — 저평가 지표 2개</text>
      <rect x="30" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="75" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">실현가</text>
      <rect x="126" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="171" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">ATH낙폭</text>
      <text x="30" y="228" fill="#a1a1aa" font-size="11">같은 "싸다"를 비트코인은 6번, 이더리움은 2번 계상 → 구조적 격차.</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">A difference in how many indicators count "cheap"</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f7931a" font-size="12" font-weight="700">Bitcoin — 6 on-chain valuation indicators</text>
      <rect x="30" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="75" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">MVRV</text>
      <rect x="126" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="171" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">NUPL</text>
      <rect x="222" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="267" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Realized</text>
      <rect x="318" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="363" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">SOPR</text>
      <rect x="414" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="459" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">LTH</text>
      <rect x="510" y="75" width="130" height="30" fill="#f7931a" rx="3"/><text x="575" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Hash Ribbon</text>
      <text x="30" y="150" fill="#627eea" font-size="12" font-weight="700">Ethereum — 2 valuation indicators</text>
      <rect x="30" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="75" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">Realized</text>
      <rect x="126" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="171" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">ATH drop</text>
      <text x="30" y="228" fill="#a1a1aa" font-size="11">The same "cheap" is counted 6 times for BTC, twice for ETH — a structural gap.</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">「安い」を数える指標の数の差</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f7931a" font-size="12" font-weight="700">ビットコイン — オンチェーン割安指標6個</text>
      <rect x="30" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="75" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">MVRV</text>
      <rect x="126" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="171" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">NUPL</text>
      <rect x="222" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="267" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">実現価</text>
      <rect x="318" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="363" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">SOPR</text>
      <rect x="414" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="459" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">LTH</text>
      <rect x="510" y="75" width="130" height="30" fill="#f7931a" rx="3"/><text x="575" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">ハッシュリボン</text>
      <text x="30" y="150" fill="#627eea" font-size="12" font-weight="700">イーサリアム — 割安指標2個</text>
      <rect x="30" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="75" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">実現価</text>
      <rect x="126" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="171" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">ATH下落</text>
      <text x="30" y="228" fill="#a1a1aa" font-size="11">同じ「安い」をBTCは6回、ETHは2回計上 → 構造的格差。</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Diferencia en cuántos indicadores cuentan lo "barato"</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f7931a" font-size="12" font-weight="700">Bitcoin — 6 indicadores de valoración</text>
      <rect x="30" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="75" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">MVRV</text>
      <rect x="126" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="171" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">NUPL</text>
      <rect x="222" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="267" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Realizado</text>
      <rect x="318" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="363" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">SOPR</text>
      <rect x="414" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="459" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">LTH</text>
      <rect x="510" y="75" width="130" height="30" fill="#f7931a" rx="3"/><text x="575" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Hash Ribbon</text>
      <text x="30" y="150" fill="#627eea" font-size="12" font-weight="700">Ethereum — 2 indicadores</text>
      <rect x="30" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="75" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">Realizado</text>
      <rect x="126" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="171" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">Caída ATH</text>
      <text x="30" y="228" fill="#a1a1aa" font-size="11">Lo mismo "barato" se cuenta 6 veces para BTC, 2 para ETH — brecha estructural.</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Unterschied, wie viele Indikatoren „billig" zählen</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f7931a" font-size="12" font-weight="700">Bitcoin — 6 On-Chain-Bewertungsindikatoren</text>
      <rect x="30" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="75" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">MVRV</text>
      <rect x="126" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="171" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">NUPL</text>
      <rect x="222" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="267" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Realized</text>
      <rect x="318" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="363" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">SOPR</text>
      <rect x="414" y="75" width="90" height="30" fill="#f7931a" rx="3"/><text x="459" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">LTH</text>
      <rect x="510" y="75" width="130" height="30" fill="#f7931a" rx="3"/><text x="575" y="95" fill="#000" font-size="9" text-anchor="middle" font-weight="700">Hash Ribbon</text>
      <text x="30" y="150" fill="#627eea" font-size="12" font-weight="700">Ethereum — 2 Indikatoren</text>
      <rect x="30" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="75" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">Realized</text>
      <rect x="126" y="160" width="90" height="30" fill="#627eea" rx="3"/><text x="171" y="180" fill="#fff" font-size="9" text-anchor="middle" font-weight="700">ATH-Fall</text>
      <text x="30" y="228" fill="#a1a1aa" font-size="11">Dasselbe „billig" wird für BTC 6-mal, für ETH 2-mal gezählt — strukturelle Lücke.</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">비트코인만 가진 데이터</h2>
  <h2 class="en">Data only Bitcoin has</h2>
  <h2 class="ja">ビットコインだけが持つデータ</h2>
  <h2 class="es">Datos que solo Bitcoin tiene</h2>
  <h2 class="de">Daten, die nur Bitcoin hat</h2>

  <p class="ko">비트코인은 온체인 데이터가 가장 풍부한 자산이다. MVRV, NUPL, 실현가, 장기 보유자 비율, 단기 보유자 손익 등, 블록체인에 기록된 "모든 투자자가 얼마에 샀는가"를 여러 각도에서 볼 수 있다. 이 지표들은 저평가를 각기 다른 방식으로 확인해 준다. 반면 이더리움을 포함한 알트코인은 이런 정밀한 온체인 데이터를 안정적으로 얻기 어렵다. 그래서 알트코인의 밸류에이션은 200주 이동평균과 전고점 낙폭이라는 두 가지 근사치로만 표현된다.</p>
  <p class="en">Bitcoin is the asset richest in on-chain data. MVRV, NUPL, realized price, long-term holder share, short-term holder profit-and-loss — the blockchain's record of "what price every investor paid" can be seen from many angles. These indicators confirm undervaluation in distinct ways. Altcoins, Ethereum included, cannot reliably obtain such precise on-chain data. So an altcoin's valuation is expressed only through two approximations: the 200-week moving average and the drawdown from its all-time high.</p>
  <p class="ja">ビットコインはオンチェーンデータが最も豊富な資産だ。MVRV、NUPL、実現価格、長期保有者比率、短期保有者損益など、ブロックチェーンに記録された「すべての投資家がいくらで買ったか」を様々な角度から見られる。これらの指標は割安を各々異なる方法で確認する。一方、イーサリアムを含むアルトコインはこうした精密なオンチェーンデータを安定的に得にくい。そのためアルトのバリュエーションは200週移動平均と最高値下落率という二つの近似値だけで表現される。</p>
  <p class="es">Bitcoin es el activo más rico en datos en cadena. MVRV, NUPL, precio realizado, proporción de tenedores a largo plazo, ganancias de tenedores a corto — el registro de "a qué precio compró cada inversor" se ve desde muchos ángulos. Estos indicadores confirman la infravaloración de formas distintas. Las altcoins, Ethereum incluido, no obtienen de forma fiable datos tan precisos. Así, la valoración de una altcoin se expresa solo con dos aproximaciones: la media de 200 semanas y la caída desde su máximo.</p>
  <p class="de">Bitcoin ist das an On-Chain-Daten reichste Asset. MVRV, NUPL, realisierter Preis, Anteil langfristiger Halter, Gewinn/Verlust kurzfristiger Halter — die Aufzeichnung „zu welchem Preis jeder Investor kaufte" lässt sich aus vielen Winkeln betrachten. Diese Indikatoren bestätigen Unterbewertung auf verschiedene Weise. Altcoins, auch Ethereum, erhalten solche präzisen Daten nicht zuverlässig. So wird die Bewertung eines Altcoins nur durch zwei Näherungen ausgedrückt: den 200-Wochen-Durchschnitt und den Rückgang vom Allzeithoch.</p>

  <p class="ko">여기서 격차가 생긴다. 비트코인은 "싸다"를 여섯 개의 지표로 확인받는다. 이더리움은 같은 "싸다"를 두 개로만 표현한다. 두 코인이 실제로 똑같이 저평가돼 있어도, 점수를 만드는 지표의 개수 자체가 다르니 총점에서 비트코인이 앞선다. 이것은 이더리움이 더 나쁜 자산이라는 뜻이 아니다. 단지 우리가 이더리움에 대해 아는 데이터가 더 적다는 뜻이다.</p>
  <p class="en">Here the gap arises. Bitcoin has its "cheapness" confirmed by six indicators. Ethereum expresses the same "cheapness" through only two. Even when the two are genuinely equally undervalued, the sheer number of scoring indicators differs, so Bitcoin leads in the total. This does not mean Ethereum is the worse asset. It only means we know less data about Ethereum.</p>
  <p class="ja">ここで格差が生じる。ビットコインは「安い」を六つの指標で確認される。イーサリアムは同じ「安い」を二つだけで表現する。二つのコインが実際に同じく割安でも、スコアを作る指標の数自体が違うため総合点でビットコインが先行する。これはイーサリアムがより悪い資産という意味ではない。ただ私たちがイーサリアムについて知るデータがより少ないという意味だ。</p>
  <p class="es">Aquí surge la brecha. Bitcoin tiene su "baratura" confirmada por seis indicadores. Ethereum expresa la misma "baratura" con solo dos. Aunque ambos estén genuinamente igual de infravalorados, el número de indicadores difiere, así que Bitcoin lidera el total. Esto no significa que Ethereum sea peor activo. Solo significa que sabemos menos datos sobre Ethereum.</p>
  <p class="de">Hier entsteht die Lücke. Bitcoins „Billigkeit" wird von sechs Indikatoren bestätigt. Ethereum drückt dieselbe „Billigkeit" durch nur zwei aus. Selbst wenn beide wirklich gleich unterbewertet sind, unterscheidet sich die Zahl der Indikatoren, sodass Bitcoin in der Summe führt. Das heißt nicht, dass Ethereum das schlechtere Asset ist. Es heißt nur, dass wir weniger Daten über Ethereum kennen.</p>

  <h2 class="ko">격차를 줄이되, 없애지는 않았다</h2>
  <h2 class="en">We narrowed the gap, but did not erase it</h2>
  <h2 class="ja">格差を縮めたが、消しはしなかった</h2>
  <h2 class="es">Redujimos la brecha, pero no la borramos</h2>
  <h2 class="de">Wir verringerten die Lücke, löschten sie aber nicht</h2>

  <p class="ko">우리는 알트코인의 밸류에이션이 저평가 국면에서 제 값을 더 강하게 인정받도록 곡선을 다시 그렸다. 200주 이동평균 대비 상당히 빠진 코인이라면, 두 개의 지표만으로도 충분히 높은 점수에 도달하도록 만들었다. 그 결과 저평가된 이더리움은 비트코인과의 격차가 절반 이하로 줄었다. 다만 우리는 그 격차를 완전히 없애지는 않았다.</p>
  <p class="en">We redrew the altcoin valuation curve so that undervaluation is recognized more strongly in the low zone. For a coin well below its 200-week moving average, two indicators alone are now enough to reach a high score. As a result, the gap between an undervalued Ethereum and Bitcoin shrank by more than half. But we did not erase that gap entirely.</p>
  <p class="ja">私たちはアルトのバリュエーションが割安局面でより強く認められるよう曲線を描き直した。200週移動平均比でかなり下落したコインなら、二つの指標だけでも十分高いスコアに達するようにした。その結果、割安なイーサリアムとビットコインの格差は半分以下に縮んだ。ただ私たちはその格差を完全には消さなかった。</p>
  <p class="es">Redibujamos la curva de valoración de las altcoins para que la infravaloración se reconozca con más fuerza en la zona baja. Para una moneda muy por debajo de su media de 200 semanas, dos indicadores ya bastan para alcanzar una puntuación alta. Como resultado, la brecha entre un Ethereum infravalorado y Bitcoin se redujo más de la mitad. Pero no borramos esa brecha del todo.</p>
  <p class="de">Wir zeichneten die Altcoin-Bewertungskurve neu, sodass Unterbewertung in der tiefen Zone stärker anerkannt wird. Für eine Münze weit unter ihrem 200-Wochen-Durchschnitt genügen nun zwei Indikatoren für einen hohen Wert. Dadurch schrumpfte die Lücke zwischen einem unterbewerteten Ethereum und Bitcoin um mehr als die Hälfte. Doch wir löschten diese Lücke nicht ganz.</p>

  <div class="box ko">남은 격차는 정직한 격차다. 비트코인에는 채굴자의 항복과 회복을 읽는 해시 리본처럼, 알트코인에 없는 진짜 고유 신호가 있다. 검증된 데이터가 더 많은 자산이 조금 더 높은 신뢰를 받는 것은 왜곡이 아니라 사실의 반영이다. 우리는 알트코인에 없는 데이터를 억지로 지어내 격차를 지우기보다, 격차의 근거를 투명하게 남기는 쪽을 택했다.</div>
  <div class="box en">The remaining gap is an honest one. Bitcoin has genuinely unique signals absent in altcoins — like the Hash Ribbon that reads miner capitulation and recovery. That an asset with more verified data earns slightly more trust is not a distortion but a reflection of fact. Rather than fabricate data Ethereum lacks to erase the gap, we chose to leave the basis for the gap transparent.</div>
  <div class="box ja">残った格差は正直な格差だ。ビットコインには、採掘者の投降と回復を読むハッシュリボンのように、アルトにない真の固有シグナルがある。検証されたデータがより多い資産が少し高い信頼を受けるのは歪みではなく事実の反映だ。私たちはアルトにないデータを無理に作り出して格差を消すより、格差の根拠を透明に残す方を選んだ。</div>
  <div class="box es">La brecha restante es honesta. Bitcoin tiene señales genuinamente únicas ausentes en las altcoins — como el Hash Ribbon que lee la capitulación y recuperación de los mineros. Que un activo con más datos verificados gane algo más de confianza no es distorsión, sino reflejo de un hecho. En lugar de fabricar datos que Ethereum no tiene, elegimos dejar transparente la base de la brecha.</div>
  <div class="box de">Die verbleibende Lücke ist ehrlich. Bitcoin hat wirklich einzigartige Signale, die Altcoins fehlen — wie das Hash Ribbon, das Miner-Kapitulation und -Erholung liest. Dass ein Asset mit mehr verifizierten Daten etwas mehr Vertrauen erhält, ist keine Verzerrung, sondern Abbild einer Tatsache. Statt fehlende Daten zu erfinden, ließen wir die Grundlage der Lücke transparent.</div>

<?php require __DIR__.'/_footer.php'; ?>
