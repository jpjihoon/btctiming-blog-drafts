<?php $slug = 'patch-correlation'; require __DIR__.'/_header.php'; ?>

  <p class="ko">한동안 숏 점수에는 비트코인과의 상관계수가 들어가 있었다. 논리는 이랬다. 알트코인이 비트코인과 강하게 연동돼 있으면, 비트코인이 약할 때 함께 무너질 테니 숏에 유리하다. 그럴듯해 보였다. 그러나 이 논리에는 치명적인 빈틈이 있었다. 알트코인은 비트코인이 앞으로 오를지 내릴지를 알지 못한다.</p>
  <p class="en">For a time, the short score included the correlation with Bitcoin. The logic ran: if an altcoin is strongly linked to Bitcoin, then when Bitcoin is weak it will fall along with it, which favors a short. It seemed plausible. But the logic had a fatal gap: an altcoin does not know whether Bitcoin will rise or fall next.</p>
  <p class="ja">しばらくの間、ショートスコアにはビットコインとの相関係数が入っていた。論理はこうだ。アルトコインがビットコインと強く連動していれば、ビットコインが弱い時に共に崩れるからショートに有利だ。もっともらしく見えた。しかしこの論理には致命的な隙間があった。アルトコインはビットコインが今後上がるか下がるかを知らない。</p>
  <p class="es">Por un tiempo, la puntuación short incluía la correlación con Bitcoin. La lógica era: si una altcoin está fuertemente ligada a Bitcoin, cuando Bitcoin esté débil caerá con él, lo que favorece un short. Parecía plausible. Pero la lógica tenía un fallo fatal: una altcoin no sabe si Bitcoin subirá o bajará después.</p>
  <p class="de">Eine Zeit lang enthielt der Short-Score die Korrelation mit Bitcoin. Die Logik lautete: Ist ein Altcoin stark an Bitcoin gebunden, fällt er mit, wenn Bitcoin schwach ist, was einen Short begünstigt. Es schien plausibel. Doch die Logik hatte eine fatale Lücke: Ein Altcoin weiß nicht, ob Bitcoin als Nächstes steigt oder fällt.</p>
  <p class="fr">Pendant un temps, le score de short incluait la corrélation avec Bitcoin. La logique était la suivante : si un altcoin est fortement lié à Bitcoin, alors quand Bitcoin est faible, il chutera avec lui, ce qui favorise un short. Cela semblait plausible. Mais cette logique avait une faille fatale : un altcoin ne sait pas si Bitcoin va monter ou descendre ensuite.</p>
  <p class="pt">Por um tempo, o score de short incluía a correlação com o Bitcoin. A lógica era: se uma altcoin está fortemente ligada ao Bitcoin, quando o Bitcoin estiver fraco ela cairá junto, o que favorece um short. Parecia plausível. Mas a lógica tinha uma falha fatal: uma altcoin não sabe se o Bitcoin vai subir ou cair a seguir.</p>
  <p class="tr">Bir süre, short skoruna Bitcoin ile korelasyon dahil edildi. Mantık şöyleydi: bir altcoin Bitcoin'e güçlü şekilde bağlıysa, Bitcoin zayıfladığında onunla birlikte düşer, bu da short'u destekler. Mantıklı görünüyordu. Ama bu mantıkta ölümcül bir boşluk vardı: bir altcoin, Bitcoin'in bundan sonra yükselip yükselmeyeceğini bilmez.</p>
  <p class="vi">Trong một thời gian, điểm short có bao gồm hệ số tương quan với Bitcoin. Logic là: nếu một altcoin liên kết chặt chẽ với Bitcoin, thì khi Bitcoin yếu, nó sẽ giảm theo, điều này có lợi cho short. Nghe có vẻ hợp lý. Nhưng logic này có một lỗ hổng chí mạng: altcoin không biết liệu Bitcoin sắp tăng hay giảm.</p>

  <div class="ko">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">"높은 상관 = 숏 유리"가 성립하지 않는 이유</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">상관계수는 "얼마나 같이 움직이나"만 말해준다</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— "어느 방향으로" 움직일지는 말해주지 않는다.</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">BTC가 바닥일 때</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">높은 상관 → 알트도 곧 반등 (숏 불리!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">BTC가 천장일 때</text>
      <text x="375" y="150" fill="#f87171" font-size="10">높은 상관 → 알트도 곧 하락 (숏 유리)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">같은 "높은 상관"이 BTC 위치에 따라 정반대 결론.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ 알트는 BTC의 방향을 모르므로, 상관계수는 방향 신호가 될 수 없다.</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Why "high correlation = short favored" fails</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">Correlation only tells you "how much they move together"</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— it does not tell you "in which direction."</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">When BTC is at a bottom</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">high corr → alt rebounds too (short hurt!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">When BTC is at a top</text>
      <text x="375" y="150" fill="#f87171" font-size="10">high corr → alt falls too (short favored)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">The same "high correlation" gives opposite conclusions by BTC position.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Alts do not know BTC's direction, so correlation cannot be a directional signal.</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">「高い相関 = ショート有利」が成立しない理由</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">相関係数は「どれだけ一緒に動くか」だけを示す</text>
      <text x="30" y="88" fill="#71717a" font-size="11">—「どの方向へ」動くかは示さない。</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">BTCが底の時</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">高相関 → アルトも間もなく反発 (ショート不利!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">BTCが天井の時</text>
      <text x="375" y="150" fill="#f87171" font-size="10">高相関 → アルトも間もなく下落 (ショート有利)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">同じ「高い相関」がBTCの位置で正反対の結論。</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ アルトはBTCの方向を知らないので、相関係数は方向シグナルになれない。</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Por qué "alta correlación = short favorecido" falla</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">La correlación solo dice "cuánto se mueven juntos"</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— no dice "en qué dirección".</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">Cuando BTC está en suelo</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">alta corr → alt rebota (¡short dañado!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">Cuando BTC está en techo</text>
      <text x="375" y="150" fill="#f87171" font-size="10">alta corr → alt cae (short favorecido)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">La misma "alta correlación" da conclusiones opuestas según BTC.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Las alts no saben la dirección de BTC; la correlación no es señal direccional.</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Warum „hohe Korrelation = Short begünstigt" scheitert</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">Korrelation sagt nur „wie stark sie sich zusammen bewegen"</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— nicht „in welche Richtung".</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">Wenn BTC am Boden ist</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">hohe Korr → Alt erholt sich auch (Short schlecht!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">Wenn BTC am Top ist</text>
      <text x="375" y="150" fill="#f87171" font-size="10">hohe Korr → Alt fällt auch (Short begünstigt)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">Dieselbe „hohe Korrelation" gibt je nach BTC-Position gegenteilige Schlüsse.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Alts kennen BTCs Richtung nicht; Korrelation ist kein Richtungssignal.</text>
    </g>
  </svg>
  </div>
  <div class="fr">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Pourquoi « corrélation élevée = short favorisé » échoue</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">La corrélation ne dit que « à quel point ils bougent ensemble »</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— elle ne dit pas « dans quelle direction ».</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">Quand le BTC est au plus bas</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">corr élevée → l'alt rebondit aussi (short pénalisé !)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">Quand le BTC est au plus haut</text>
      <text x="375" y="150" fill="#f87171" font-size="10">corr élevée → l'alt chute aussi (short favorisé)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">La même « corrélation élevée » donne des conclusions opposées selon la position du BTC.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Les alts ne connaissent pas la direction du BTC, la corrélation ne peut donc pas être un signal directionnel.</text>
    </g>
  </svg>
  </div>
  <div class="pt">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Por que “alta correlação = short favorecido” falha</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">A correlação só diz “o quanto eles se movem juntos”</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— não diz “em que direção”.</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">Quando o BTC está no fundo</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">alta corr → alt também reage (short prejudicado!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">Quando o BTC está no topo</text>
      <text x="375" y="150" fill="#f87171" font-size="10">alta corr → alt também cai (short favorecido)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">A mesma “alta correlação” dá conclusões opostas conforme a posição do BTC.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ As alts não sabem a direção do BTC, então a correlação não pode ser um sinal direcional.</text>
    </g>
  </svg>
  </div>
  <div class="tr">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">“Yüksek korelasyon = short avantajlı” neden başarısız olur</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">Korelasyon sadece “ne kadar birlikte hareket ettiklerini” söyler</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— “hangi yönde” hareket ettiklerini söylemez.</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">BTC dipteyken</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">yüksek korelasyon → alt de toparlanır (short zarar görür!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">BTC tepedeyken</text>
      <text x="375" y="150" fill="#f87171" font-size="10">yüksek korelasyon → alt de düşer (short avantajlı)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">Aynı “yüksek korelasyon”, BTC'nin konumuna göre tam tersi sonuçlar verir.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Altcoin'ler BTC'nin yönünü bilmez, bu yüzden korelasyon yönsel bir sinyal olamaz.</text>
    </g>
  </svg>
  </div>
  <div class="vi">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Vì sao “tương quan cao = có lợi cho short” không đúng</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#a1a1aa" font-size="12">Tương quan chỉ cho biết “chúng di chuyển cùng nhau đến mức nào”</text>
      <text x="30" y="88" fill="#71717a" font-size="11">— không cho biết “theo hướng nào”.</text>
      <rect x="30" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="45" y="132" fill="#f7931a" font-size="11" font-weight="700">Khi BTC ở đáy</text>
      <text x="45" y="150" fill="#22c55e" font-size="10">tương quan cao → alt cũng phục hồi (short bất lợi!)</text>
      <rect x="360" y="110" width="300" height="50" fill="#1c1c20" rx="6" stroke="#3f3f46"/>
      <text x="375" y="132" fill="#f7931a" font-size="11" font-weight="700">Khi BTC ở đỉnh</text>
      <text x="375" y="150" fill="#f87171" font-size="10">tương quan cao → alt cũng giảm (short có lợi)</text>
      <text x="30" y="200" fill="#a1a1aa" font-size="11">Cùng một “tương quan cao” nhưng cho kết luận trái ngược tùy vị trí của BTC.</text>
      <text x="30" y="222" fill="#71717a" font-size="11">→ Altcoin không biết hướng đi của BTC, nên tương quan không thể là tín hiệu định hướng.</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">상관계수는 방향을 모른다</h2>
  <h2 class="en">Correlation does not know direction</h2>
  <h2 class="ja">相関係数は方向を知らない</h2>
  <h2 class="es">La correlación no conoce la dirección</h2>
  <h2 class="de">Korrelation kennt keine Richtung</h2>
  <h2 class="fr">La corrélation ne connaît pas la direction</h2>
  <h2 class="pt">A correlação não conhece a direção</h2>
  <h2 class="tr">Korelasyon yönü bilmez</h2>
  <h2 class="vi">Tương quan không biết hướng đi</h2>

  <p class="ko">상관계수는 두 자산이 얼마나 같은 방향으로 움직이는지를 재는 값일 뿐, 그 방향이 위인지 아래인지는 담지 않는다. 비트코인과 강하게 연동된 알트코인은, 비트코인이 오르면 같이 오르고 내리면 같이 내린다. 문제는 지금 비트코인이 오를 차례인지 내릴 차례인지를 알 수 없다는 것이다. 특히 비트코인이 온체인상 역사적 저점 근처에 있을 때, 높은 상관은 오히려 알트도 곧 반등한다는 뜻이 된다. 그런데 기존 로직은 이 경우에도 "높은 상관 = 숏 유리"로 점수를 줬다.</p>
  <p class="en">Correlation only measures how much two assets move in the same direction; it carries nothing about whether that direction is up or down. An altcoin tightly linked to Bitcoin rises when Bitcoin rises and falls when it falls. The trouble is that we cannot know whether it is Bitcoin's turn to rise or fall. Especially when Bitcoin sits near a historic on-chain low, high correlation instead means the altcoin, too, will soon rebound. Yet the old logic still scored this case as "high correlation = short favored."</p>
  <p class="ja">相関係数は二つの資産がどれだけ同じ方向に動くかを測る値でしかなく、その方向が上か下かは含まない。ビットコインと強く連動したアルトは、ビットコインが上がれば共に上がり下がれば共に下がる。問題は今、ビットコインが上がる番か下がる番かを知り得ないことだ。特にビットコインがオンチェーン上、歴史的低点付近にある時、高い相関はむしろアルトも間もなく反発するという意味になる。ところが従来のロジックはこの場合も「高い相関 = ショート有利」と点を与えた。</p>
  <p class="es">La correlación solo mide cuánto se mueven dos activos en la misma dirección; no lleva nada sobre si esa dirección es arriba o abajo. Una altcoin muy ligada a Bitcoin sube cuando Bitcoin sube y cae cuando cae. El problema es que no podemos saber si a Bitcoin le toca subir o bajar. Sobre todo cuando Bitcoin está cerca de un mínimo histórico en cadena, la alta correlación significa que la altcoin también rebotará pronto. Pero la lógica antigua puntuaba este caso como "alta correlación = short favorecido".</p>
  <p class="de">Korrelation misst nur, wie stark sich zwei Assets in dieselbe Richtung bewegen; sie trägt nichts darüber, ob diese Richtung nach oben oder unten geht. Ein eng an Bitcoin gebundener Altcoin steigt, wenn Bitcoin steigt, und fällt, wenn es fällt. Das Problem: Wir können nicht wissen, ob Bitcoin steigen oder fallen wird. Besonders wenn Bitcoin nahe einem historischen On-Chain-Tief liegt, bedeutet hohe Korrelation, dass auch der Altcoin bald zurückschnellt. Doch die alte Logik wertete auch diesen Fall als „hohe Korrelation = Short begünstigt".</p>
  <p class="fr">La corrélation ne mesure que la mesure dans laquelle deux actifs se déplacent dans la même direction ; elle ne dit rien sur si cette direction est à la hausse ou à la baisse. Un altcoin étroitement lié au Bitcoin monte quand le Bitcoin monte et baisse quand il baisse. Le problème est que nous ne pouvons pas savoir si c'est au tour du Bitcoin de monter ou de baisser. Surtout quand le Bitcoin se trouve près d'un plus bas historique on-chain, une corrélation élevée signifie au contraire que l'altcoin, lui aussi, va bientôt rebondir. Pourtant, l'ancienne logique notait encore ce cas comme « corrélation élevée = short favorisé ».</p>
  <p class="pt">A correlação apenas mede o quanto dois ativos se movem na mesma direção; ela não diz nada sobre se essa direção é para cima ou para baixo. Uma altcoin fortemente ligada ao Bitcoin sobe quando o Bitcoin sobe e cai quando ele cai. O problema é que não podemos saber se é a vez do Bitcoin subir ou cair. Especialmente quando o Bitcoin está perto de uma mínima histórica on-chain, alta correlação significa, ao contrário, que a altcoin também vai se recuperar em breve. Ainda assim, a lógica antiga pontuava esse caso como “alta correlação = short favorecido”.</p>
  <p class="tr">Korelasyon yalnızca iki varlığın ne kadar aynı yönde hareket ettiğini ölçer; bu yönün yukarı mı aşağı mı olduğu hakkında hiçbir şey söylemez. Bitcoin'e sıkı sıkıya bağlı bir altcoin, Bitcoin yükseldiğinde yükselir, düştüğünde düşer. Sorun şu ki, sıranın Bitcoin'in yükselmesinde mi yoksa düşmesinde mi olduğunu bilemeyiz. Özellikle Bitcoin zincir üstü tarihsel bir dibe yakınken, yüksek korelasyon aslında altcoin'in de yakında toparlanacağı anlamına gelir. Yine de eski mantık bu durumu hâlâ “yüksek korelasyon = short avantajlı” olarak puanlıyordu.</p>
  <p class="vi">Tương quan chỉ đo lường mức độ hai tài sản di chuyển cùng hướng; nó không cho biết gì về việc hướng đó là lên hay xuống. Một altcoin liên kết chặt chẽ với Bitcoin sẽ tăng khi Bitcoin tăng và giảm khi Bitcoin giảm. Vấn đề là chúng ta không thể biết liệu đến lượt Bitcoin tăng hay giảm. Đặc biệt khi Bitcoin ở gần một đáy on-chain lịch sử, tương quan cao thay vào đó có nghĩa là altcoin cũng sẽ sớm phục hồi. Vậy mà logic cũ vẫn chấm điểm trường hợp này là “tương quan cao = có lợi cho short”.</p>

  <h2 class="ko">방향 중립으로 바꾸다</h2>
  <h2 class="en">Making it direction-neutral</h2>
  <h2 class="ja">方向中立に変える</h2>
  <h2 class="es">Volverlo neutral en dirección</h2>
  <h2 class="de">Richtungsneutral machen</h2>
  <h2 class="fr">La rendre neutre en direction</h2>
  <h2 class="pt">Tornando-a neutra em relação à direção</h2>
  <h2 class="tr">Onu yön açısından nötr hale getirmek</h2>
  <h2 class="vi">Làm cho nó trung lập về hướng</h2>

  <p class="ko">우리는 숏 점수에서 상관계수가 방향을 결정하지 못하도록 바꿨다. 상관계수는 이제 "이 알트가 얼마나 독자적으로 움직이는가" 정도의 보조 정보로만 쓰이고, 그것만으로 숏 신호를 강하게 켜지 않는다. 알트가 비싸고 꺾였다는 별도의 근거가 있어야 숏 점수가 올라간다. 비트코인의 방향은 알트코인 화면이 함부로 예단할 수 없는 정보이기 때문이다.</p>
  <p class="en">We changed the short score so correlation no longer decides direction. Correlation is now used only as auxiliary information — roughly "how independently this altcoin moves" — and by itself no longer strongly triggers a short signal. The short score rises only when there is separate evidence that the altcoin is expensive and rolling over. Bitcoin's direction is information an altcoin screen must not presume to call.</p>
  <p class="ja">私たちはショートスコアで相関係数が方向を決めないよう変えた。相関係数は今や「このアルトがどれだけ独自に動くか」程度の補助情報としてのみ使われ、それだけでショートシグナルを強く点灯しない。アルトが高く崩れたという別の根拠があってこそショートスコアが上がる。ビットコインの方向はアルトコインの画面がむやみに予断できない情報だからだ。</p>
  <p class="es">Cambiamos la short para que la correlación ya no decida la dirección. Ahora la correlación se usa solo como información auxiliar — más o menos "cuán independiente se mueve esta altcoin" — y por sí sola ya no activa con fuerza un short. La short sube solo cuando hay evidencia aparte de que la altcoin está cara y girándose. La dirección de Bitcoin es algo que una pantalla de altcoin no debe presumir.</p>
  <p class="de">Wir änderten den Short-Score, sodass Korrelation nicht mehr die Richtung bestimmt. Korrelation dient nun nur als Hilfsinformation — etwa „wie unabhängig sich dieser Altcoin bewegt" — und löst allein kein starkes Short-Signal mehr aus. Der Short-Score steigt nur, wenn es separate Belege gibt, dass der Altcoin teuer ist und dreht. Bitcoins Richtung ist Information, die ein Altcoin-Bildschirm nicht anmaßen darf.</p>
  <p class="fr">Nous avons modifié le score de short pour que la corrélation ne décide plus de la direction. La corrélation n'est plus utilisée que comme information auxiliaire — en gros « à quel point cet altcoin bouge de façon indépendante » — et à elle seule, elle ne déclenche plus fortement un signal de short. Le score de short n'augmente que lorsqu'il existe une preuve distincte que l'altcoin est cher et se retourne. La direction du Bitcoin est une information qu'un écran d'altcoin ne doit pas présumer de deviner.</p>
  <p class="pt">Mudamos o score de short para que a correlação não decida mais a direção. A correlação agora é usada apenas como informação auxiliar — algo como “o quanto essa altcoin se move de forma independente” — e, sozinha, não dispara mais fortemente um sinal de short. O score de short só sobe quando há evidência separada de que a altcoin está cara e virando. A direção do Bitcoin é uma informação que uma tela de altcoin não deve presumir adivinhar.</p>
  <p class="tr">Short skorunu, korelasyonun artık yönü belirlemeyeceği şekilde değiştirdik. Korelasyon artık yalnızca yardımcı bilgi olarak kullanılıyor — kabaca “bu altcoin ne kadar bağımsız hareket ediyor” — ve tek başına artık güçlü bir short sinyali tetiklemiyor. Short skoru yalnızca altcoin'in pahalı olduğuna ve dönüş yaptığına dair ayrı bir kanıt olduğunda yükselir. Bitcoin'in yönü, bir altcoin ekranının tahmin etmeye kalkışmaması gereken bir bilgidir.</p>
  <p class="vi">Chúng tôi đã thay đổi điểm short để tương quan không còn quyết định hướng đi. Tương quan giờ đây chỉ được dùng như thông tin phụ trợ — đại loại là “altcoin này di chuyển độc lập đến mức nào” — và tự nó không còn kích hoạt mạnh tín hiệu short nữa. Điểm short chỉ tăng khi có bằng chứng riêng biệt cho thấy altcoin đang đắt và đảo chiều. Hướng đi của Bitcoin là thông tin mà một màn hình altcoin không được tự ý phán đoán.</p>

  <div class="box ko">상관관계는 인과가 아니고, 함께 움직인다는 사실이 어디로 움직이는지를 알려주지도 않는다. 통계값 하나를 방향 신호로 착각하는 것은 흔한 함정이다. 우리는 각 지표에게 "너는 정말 방향을 아는가"를 물었고, 모른다고 답하는 지표에게서는 방향 결정권을 회수했다.</div>
  <div class="box en">Correlation is not causation, and the fact that two things move together does not reveal where they move. Mistaking a single statistic for a directional signal is a common trap. We asked each indicator, "do you truly know the direction," and from those that answered no, we withdrew the power to decide direction.</div>
  <div class="box ja">相関は因果ではなく、共に動くという事実がどこへ動くかを教えもしない。統計値一つを方向シグナルと錯覚するのはよくある罠だ。私たちは各指標に「お前は本当に方向を知っているか」を問い、知らないと答える指標からは方向決定権を回収した。</div>
  <div class="box es">La correlación no es causalidad, y que dos cosas se muevan juntas no revela hacia dónde. Confundir una sola estadística con una señal direccional es una trampa común. Preguntamos a cada indicador "¿realmente conoces la dirección?" y a los que respondieron que no, les retiramos el poder de decidir la dirección.</div>
  <div class="box de">Korrelation ist keine Kausalität, und dass sich zwei Dinge zusammen bewegen, verrät nicht, wohin. Eine einzelne Statistik für ein Richtungssignal zu halten, ist eine häufige Falle. Wir fragten jeden Indikator: „Kennst du wirklich die Richtung?" und denen, die Nein sagten, entzogen wir die Macht, die Richtung zu bestimmen.</div>
  <div class="box fr">La corrélation n'est pas la causalité, et le fait que deux choses bougent ensemble ne révèle pas vers où elles bougent. Confondre une simple statistique avec un signal directionnel est un piège courant. Nous avons demandé à chaque indicateur : « connais-tu vraiment la direction ? » et à ceux qui ont répondu non, nous avons retiré le pouvoir de décider de la direction.</div>
  <div class="box pt">Correlação não é causalidade, e o fato de duas coisas se moverem juntas não revela para onde elas se movem. Confundir uma única estatística com um sinal direcional é uma armadilha comum. Perguntamos a cada indicador: “você realmente conhece a direção?” e daqueles que responderam que não, retiramos o poder de decidir a direção.</div>
  <div class="box tr">Korelasyon nedensellik değildir ve iki şeyin birlikte hareket etmesi nereye hareket ettiklerini göstermez. Tek bir istatistiği yönsel bir sinyalle karıştırmak yaygın bir tuzaktır. Her göstergeye “yönü gerçekten biliyor musun?” diye sorduk ve hayır yanıtı verenlerden yönü belirleme yetkisini geri aldık.</div>
  <div class="box vi">Tương quan không phải là nhân quả, và việc hai thứ di chuyển cùng nhau không cho biết chúng di chuyển về đâu. Nhầm lẫn một con số thống kê đơn lẻ với tín hiệu định hướng là một cái bẫy thường gặp. Chúng tôi đã hỏi từng chỉ báo, “bạn có thực sự biết hướng đi không,” và từ những chỉ báo trả lời không, chúng tôi đã thu hồi quyền quyết định hướng đi.</div>

<?php require __DIR__.'/_footer.php'; ?>
