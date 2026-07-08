<?php $slug = 'patch-symmetry-trap'; require __DIR__.'/_header.php'; ?>

  <p class="ko">초기의 숏 점수는 단순했다. 롱 점수를 뒤집으면 숏 점수라고 보았다. 롱이 8점이면 숏은 2점, 롱이 3점이면 숏은 7점. 깔끔한 대칭이었다. 그러나 이 대칭은 시장을 잘못 그리고 있었다. 매수 자리가 아니라는 것과 매도 자리라는 것은 같지 않기 때문이다.</p>
  <p class="en">The early short score was simple. We treated it as the inverse of the long score. Long at 8 meant short at 2; long at 3 meant short at 7. A clean symmetry. But this symmetry painted the market wrong — because "not a place to buy" and "a place to sell" are not the same thing.</p>
  <p class="ja">初期のショートスコアは単純だった。ロングスコアを反転すればショートスコアだと見なした。ロングが8点ならショートは2点、ロングが3点ならショートは7点。きれいな対称だった。しかしこの対称は市場を誤って描いていた。買い場でないことと売り場であることは同じではないからだ。</p>
  <p class="es">La puntuación short inicial era simple. La tratábamos como la inversa de la long. Long en 8 significaba short en 2; long en 3, short en 7. Una simetría limpia. Pero esta simetría pintaba mal el mercado — porque "no es lugar para comprar" y "es lugar para vender" no son lo mismo.</p>
  <p class="de">Der frühe Short-Score war einfach. Wir behandelten ihn als Umkehrung des Long-Scores. Long bei 8 hieß Short bei 2; Long bei 3 hieß Short bei 7. Eine saubere Symmetrie. Doch diese Symmetrie zeichnete den Markt falsch — denn „kein Kaufort" und „ein Verkaufsort" sind nicht dasselbe.</p>
  <p class="fr">Le score short initial était simple. Nous le traitions comme l'inverse du score long. Long à 8 signifiait short à 2 ; long à 3 signifiait short à 7. Une symétrie parfaite. Mais cette symétrie représentait mal le marché — car « ne pas être un lieu d'achat » et « être un lieu de vente » ne sont pas la même chose.</p>
  <p class="pt">A pontuação short inicial era simples. Nós a tratávamos como o inverso da pontuação long. Long em 8 significava short em 2; long em 3 significava short em 7. Uma simetria perfeita. Mas essa simetria retratava mal o mercado — porque "não é lugar para comprar" e "é lugar para vender" não são a mesma coisa.</p>
  <p class="tr">İlk short skoru basitti. Onu long skorunun tersi olarak ele alıyorduk. Long 8 ise short 2 demekti; long 3 ise short 7 demekti. Temiz bir simetri. Ama bu simetri piyasayı yanlış resmediyordu — çünkü "alım yeri değil" ile "satım yeridir" aynı şey değildir.</p>
  <p class="vi">Điểm short ban đầu rất đơn giản. Chúng tôi coi nó là nghịch đảo của điểm long. Long ở mức 8 nghĩa là short ở mức 2; long ở mức 3 nghĩa là short ở mức 7. Một sự đối xứng gọn gàng. Nhưng sự đối xứng này đã vẽ sai bức tranh thị trường — vì "không phải nơi để mua" và "là nơi để bán" không phải là cùng một điều.</p>

  <div class="ko">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">완벽한 대칭이 만드는 오류</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">기존 · 숏 = 10 − 롱 (거울처럼 반대)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">롱 4점(애매한 중립) → 숏 6점(숏 준비?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ 아무 방향도 아닌 구간에서 숏 신호가 켜짐</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">개선 · 롱과 숏은 독립된 두 개의 축</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">롱 4점(중립) + 숏 4점(중립) → 둘 다 "관망" 가능</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ 확실한 저점만 롱, 확실한 고점만 숏, 중간은 무포지션</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">The error a perfect symmetry creates</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Old · short = 10 − long (mirror opposite)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (vague neutral) → short 6 (prepare short?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ a short signal fires in a no-direction zone</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">New · long and short are two independent axes</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (neutral) + short 4 (neutral) → both can be "watch"</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ long only at a clear bottom, short only at a clear top, no-position in between</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">完全な対称が生む誤り</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">従来 · ショート = 10 − ロング(鏡のように反対)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">ロング4点(曖昧な中立) → ショート6点(ショート準備?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ どの方向でもない区間でショートシグナルが点灯</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">改善 · ロングとショートは独立した二つの軸</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">ロング4点(中立) + ショート4点(中立) → 両方「様子見」可能</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ 明確な底のみロング、明確な天井のみショート、中間は無ポジション</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">El error que crea una simetría perfecta</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Antes · short = 10 − long (espejo opuesto)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (neutral vago) → short 6 (¿preparar short?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ una señal short se activa en zona sin dirección</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Ahora · long y short son dos ejes independientes</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (neutral) + short 4 (neutral) → ambos "observar"</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ long solo en suelo claro, short solo en techo claro, sin posición en medio</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Der Fehler, den eine perfekte Symmetrie erzeugt</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Alt · Short = 10 − Long (Spiegel-Gegenteil)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (vage neutral) → Short 6 (Short vorbereiten?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ ein Short-Signal feuert in einer richtungslosen Zone</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Neu · Long und Short sind zwei unabhängige Achsen</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (neutral) + Short 4 (neutral) → beide „beobachten"</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ Long nur am klaren Boden, Short nur am klaren Top, dazwischen keine Position</text>
    </g>
  </svg>
  </div>
  <div class="fr">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">L'erreur que crée une symétrie parfaite</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Ancien · short = 10 − long (miroir opposé)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (neutre vague) → short 6 (préparer un short ?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ un signal short se déclenche dans une zone sans direction</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Nouveau · long et short sont deux axes indépendants</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (neutre) + short 4 (neutre) → les deux peuvent être « à observer »</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ long uniquement à un plancher clair, short uniquement à un sommet clair, aucune position entre les deux</text>
    </g>
  </svg>
  </div>
  <div class="pt">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">O erro que uma simetria perfeita cria</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Antigo · short = 10 − long (espelho oposto)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (neutro vago) → short 6 (preparar short?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ um sinal short dispara numa zona sem direção</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Novo · long e short são dois eixos independentes</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (neutro) + short 4 (neutro) → ambos podem ser "observar"</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ long apenas em um fundo claro, short apenas em um topo claro, sem posição no meio</text>
    </g>
  </svg>
  </div>
  <div class="tr">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Mükemmel bir simetrinin yarattığı hata</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Eski · short = 10 − long (ayna tersi)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (belirsiz nötr) → short 6 (short'a hazırlan?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ yönsüz bir bölgede short sinyali tetikleniyor</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Yeni · long ve short iki bağımsız eksendir</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (nötr) + short 4 (nötr) → ikisi de "izle" olabilir</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ long yalnızca net bir dipte, short yalnızca net bir tepede, aradaki bölgede pozisyon yok</text>
    </g>
  </svg>
  </div>
  <div class="vi">
  <svg viewBox="0 0 720 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Sai lầm mà một sự đối xứng hoàn hảo tạo ra</text>
    <g font-family="sans-serif">
      <text x="30" y="65" fill="#f87171" font-size="12" font-weight="700">Cũ · short = 10 − long (đối xứng gương)</text>
      <text x="30" y="92" fill="#a1a1aa" font-size="11">Long 4 (trung lập mơ hồ) → short 6 (chuẩn bị short?!)</text>
      <text x="30" y="112" fill="#71717a" font-size="10">→ tín hiệu short kích hoạt trong vùng không có xu hướng</text>
      <line x1="30" y1="135" x2="660" y2="135" stroke="#3f3f46"/>
      <text x="30" y="168" fill="#4ade80" font-size="12" font-weight="700">Mới · long và short là hai trục độc lập</text>
      <text x="30" y="195" fill="#a1a1aa" font-size="11">Long 4 (trung lập) + short 4 (trung lập) → cả hai đều có thể "theo dõi"</text>
      <text x="30" y="215" fill="#71717a" font-size="10">→ chỉ long tại đáy rõ ràng, chỉ short tại đỉnh rõ ràng, không có vị thế ở khoảng giữa</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">중간지대가 사라진 시장</h2>
  <h2 class="en">A market with no middle ground</h2>
  <h2 class="ja">中間地帯が消えた市場</h2>
  <h2 class="es">Un mercado sin terreno intermedio</h2>
  <h2 class="de">Ein Markt ohne Mittelweg</h2>
  <h2 class="fr">Un marché sans terrain intermédiaire</h2>
  <h2 class="pt">Um mercado sem terreno intermediário</h2>
  <h2 class="tr">Ortası olmayan bir piyasa</h2>
  <h2 class="vi">Một thị trường không có vùng trung gian</h2>

  <p class="ko">대칭 구조의 가장 큰 문제는 중간지대를 없앤다는 점이다. 롱이 4점이면 자동으로 숏이 6점이 된다. 그런데 4점은 "확실한 저점도 아니고 확실한 고점도 아닌" 애매한 구간이다. 이런 곳에서 숏 6점이 나와 "숏 준비"가 켜지면, 방향이 정해지지 않은 시장에서 포지션을 강요받는다. 실제 시장의 상당 부분은 이런 중립 구간인데, 대칭 모델은 그 구간을 인정하지 않았다.</p>
  <p class="en">The biggest problem with a symmetric structure is that it eliminates the middle ground. A long of 4 automatically makes a short of 6. But 4 is an ambiguous zone — "neither a clear bottom nor a clear top." When a short of 6 emerges there and "prepare short" lights up, you are forced into a position in a market with no settled direction. Much of a real market is exactly this neutral zone, yet the symmetric model refused to acknowledge it.</p>
  <p class="ja">対称構造の最大の問題は中間地帯をなくすことだ。ロングが4点なら自動的にショートが6点になる。だが4点は「明確な底でも明確な天井でもない」曖昧な区間だ。こんな所でショート6点が出て「ショート準備」が点灯すると、方向の定まらない市場でポジションを強いられる。実際の市場のかなりの部分はこうした中立区間なのに、対称モデルはその区間を認めなかった。</p>
  <p class="es">El mayor problema de una estructura simétrica es que elimina el terreno intermedio. Un long de 4 hace automáticamente un short de 6. Pero 4 es una zona ambigua — "ni un suelo claro ni un techo claro". Cuando ahí surge un short de 6 y se enciende "preparar short", te fuerzan a una posición en un mercado sin dirección definida. Gran parte de un mercado real es exactamente esta zona neutral, pero el modelo simétrico se negaba a reconocerla.</p>
  <p class="de">Das größte Problem einer symmetrischen Struktur ist, dass sie den Mittelweg beseitigt. Ein Long von 4 macht automatisch einen Short von 6. Doch 4 ist eine unklare Zone — „weder klarer Boden noch klares Top". Wenn dort ein Short von 6 erscheint und „Short vorbereiten" aufleuchtet, wird man in einem richtungslosen Markt zu einer Position gezwungen. Ein Großteil eines realen Marktes ist genau diese neutrale Zone, doch das symmetrische Modell erkannte sie nicht an.</p>
  <p class="fr">Le plus gros problème d'une structure symétrique est qu'elle élimine le terrain intermédiaire. Un long de 4 produit automatiquement un short de 6. Or 4 est une zone ambiguë — « ni un plancher clair, ni un sommet clair ». Lorsqu'un short de 6 y apparaît et que « préparer un short » s'allume, on est forcé de prendre position dans un marché sans direction établie. Une grande partie d'un marché réel est justement cette zone neutre, mais le modèle symétrique refusait de la reconnaître.</p>
  <p class="pt">O maior problema de uma estrutura simétrica é que ela elimina o terreno intermediário. Um long de 4 gera automaticamente um short de 6. Mas 4 é uma zona ambígua — "nem um fundo claro, nem um topo claro". Quando ali surge um short de 6 e "preparar short" se acende, você é forçado a assumir uma posição num mercado sem direção definida. Grande parte de um mercado real é exatamente essa zona neutra, mas o modelo simétrico se recusava a reconhecê-la.</p>
  <p class="tr">Simetrik bir yapının en büyük sorunu, ortası kaldırmasıdır. Long 4 otomatik olarak short 6 yapar. Ama 4, "ne net bir dip ne de net bir tepe" olan belirsiz bir bölgedir. Orada short 6 ortaya çıkıp "short'a hazırlan" yandığında, yönü belirlenmemiş bir piyasada pozisyon almaya zorlanırsınız. Gerçek bir piyasanın büyük bölümü tam olarak bu nötr bölgedir, ama simetrik model bunu kabul etmeyi reddediyordu.</p>
  <p class="vi">Vấn đề lớn nhất của cấu trúc đối xứng là nó loại bỏ vùng trung gian. Long 4 tự động tạo ra short 6. Nhưng 4 là một vùng mơ hồ — "không phải đáy rõ ràng cũng không phải đỉnh rõ ràng." Khi short 6 xuất hiện ở đó và "chuẩn bị short" bật sáng, bạn bị buộc phải vào vị thế trong một thị trường chưa có hướng đi rõ ràng. Phần lớn một thị trường thực chính là vùng trung lập này, nhưng mô hình đối xứng lại từ chối thừa nhận nó.</p>

  <h2 class="ko">두 개의 독립된 축으로</h2>
  <h2 class="en">Into two independent axes</h2>
  <h2 class="ja">二つの独立した軸へ</h2>
  <h2 class="es">Hacia dos ejes independientes</h2>
  <h2 class="de">Zu zwei unabhängigen Achsen</h2>
  <h2 class="fr">Vers deux axes indépendants</h2>
  <h2 class="pt">Rumo a dois eixos independentes</h2>
  <h2 class="tr">İki bağımsız eksene doğru</h2>
  <h2 class="vi">Hướng tới hai trục độc lập</h2>

  <p class="ko">우리는 롱과 숏을 서로 독립된 두 개의 점수로 분리했다. 롱 점수는 고유의 지표들로 "지금이 싼가"를 계산하고, 숏 점수는 별도의 지표들로 "지금이 비싸고 꺾였는가"를 계산한다. 두 점수는 서로의 반대가 아니다. 그래서 롱도 낮고 숏도 낮은 상태 — 즉 "어느 쪽도 확실하지 않으니 쉬어라"는 중립 국면이 비로소 표현된다.</p>
  <p class="en">We split long and short into two independent scores. The long score computes "is it cheap now" from its own indicators; the short score computes "is it expensive and rolling over" from a separate set. The two are not each other's opposite. So a state where both long and short are low — a neutral phase meaning "neither side is certain, so stay out" — can finally be expressed.</p>
  <p class="ja">私たちはロングとショートを互いに独立した二つのスコアに分離した。ロングスコアは固有の指標で「今が安いか」を計算し、ショートスコアは別の指標で「今が高く崩れたか」を計算する。二つのスコアは互いの反対ではない。だからロングも低くショートも低い状態 — つまり「どちらも確実でないから休め」という中立局面がようやく表現される。</p>
  <p class="es">Separamos long y short en dos puntuaciones independientes. La long calcula "¿está barato ahora?" con sus propios indicadores; la short calcula "¿está caro y girándose?" con un conjunto aparte. Las dos no son opuestas. Así, un estado donde tanto long como short son bajos — una fase neutral que significa "ningún lado es seguro, quédate fuera" — por fin puede expresarse.</p>
  <p class="de">Wir teilten Long und Short in zwei unabhängige Werte. Der Long-Score berechnet „ist es jetzt billig" aus eigenen Indikatoren; der Short-Score berechnet „ist es teuer und dreht" aus einem separaten Satz. Die beiden sind nicht Gegenteile. So kann ein Zustand, in dem Long und Short niedrig sind — eine neutrale Phase, die „keine Seite ist sicher, bleib draußen" bedeutet — endlich ausgedrückt werden.</p>
  <p class="fr">Nous avons scindé long et short en deux scores indépendants. Le score long calcule « est-ce bon marché en ce moment » à partir de ses propres indicateurs ; le score short calcule « est-ce cher et en train de se retourner » à partir d'un ensemble distinct. Les deux ne sont pas l'opposé l'un de l'autre. Ainsi, un état où long et short sont tous deux bas — une phase neutre signifiant « aucun des deux côtés n'est certain, donc restez en dehors » — peut enfin être exprimé.</p>
  <p class="pt">Separamos long e short em duas pontuações independentes. A pontuação long calcula "está barato agora" a partir de seus próprios indicadores; a pontuação short calcula "está caro e revertendo" a partir de um conjunto separado. As duas não são opostas uma à outra. Assim, um estado em que tanto long quanto short estão baixos — uma fase neutra que significa "nenhum dos lados está certo, então fique de fora" — finalmente pode ser expresso.</p>
  <p class="tr">Long ve short'u iki bağımsız skora ayırdık. Long skoru kendi göstergelerinden "şu an ucuz mu" hesaplar; short skoru ayrı bir gösterge setinden "şu an pahalı mı ve dönüyor mu" hesaplar. İkisi birbirinin tersi değildir. Böylece hem long hem short'un düşük olduğu bir durum — "hiçbir taraf net değil, o yüzden dışarıda kal" anlamına gelen nötr bir evre — sonunda ifade edilebilir hale geldi.</p>
  <p class="vi">Chúng tôi tách long và short thành hai điểm số độc lập. Điểm long tính toán "liệu bây giờ có rẻ không" từ các chỉ báo riêng của nó; điểm short tính toán "liệu bây giờ có đắt và đang đảo chiều không" từ một bộ chỉ báo riêng biệt. Hai điểm này không phải là đối lập của nhau. Vì vậy, trạng thái mà cả long và short đều thấp — một giai đoạn trung lập nghĩa là "không bên nào chắc chắn, nên đứng ngoài" — cuối cùng cũng có thể được thể hiện.</p>

  <div class="box ko">시장은 늘 매수 아니면 매도의 이분법으로 움직이지 않는다. 방향이 없는 구간이 훨씬 길다. 롱과 숏을 분리하자 이 도구는 "지금은 확실하지 않다"고 말할 수 있게 됐다. 아무 말도 하지 않을 수 있는 것이야말로, 지표가 갖춰야 할 정직함이다.</div>
  <div class="box en">Markets do not always move by the binary of buy or sell. Directionless stretches are far longer. Once long and short were separated, this tool became able to say "it is not certain right now." Being able to say nothing at all is precisely the honesty an indicator should have.</div>
  <div class="box ja">市場は常に買いか売りかの二分法で動くわけではない。方向のない区間の方がはるかに長い。ロングとショートを分離すると、この道具は「今は確実でない」と言えるようになった。何も言わずにいられることこそ、指標が備えるべき正直さだ。</div>
  <div class="box es">Los mercados no siempre se mueven por el binario de comprar o vender. Los tramos sin dirección son mucho más largos. Al separar long y short, esta herramienta pudo decir "no es seguro ahora mismo". Poder no decir nada es precisamente la honestidad que un indicador debe tener.</div>
  <div class="box de">Märkte bewegen sich nicht immer im Binär von Kaufen oder Verkaufen. Richtungslose Phasen sind weit länger. Nach der Trennung von Long und Short konnte dieses Werkzeug sagen „es ist gerade nicht sicher". Nichts sagen zu können, ist genau die Ehrlichkeit, die ein Indikator haben sollte.</div>
  <div class="box fr">Les marchés ne se déplacent pas toujours selon le binaire achat ou vente. Les phases sans direction sont bien plus longues. Une fois long et short séparés, cet outil est devenu capable de dire « ce n'est pas certain en ce moment ». Pouvoir ne rien dire du tout est précisément l'honnêteté qu'un indicateur devrait avoir.</div>
  <div class="box pt">Os mercados nem sempre se movem pelo binário de comprar ou vender. Os trechos sem direção são muito mais longos. Depois que long e short foram separados, esta ferramenta passou a poder dizer "não é seguro agora". Ser capaz de não dizer nada é exatamente a honestidade que um indicador deveria ter.</div>
  <div class="box tr">Piyasalar her zaman alım ya da satım ikilisiyle hareket etmez. Yönsüz dönemler çok daha uzundur. Long ve short ayrıldıktan sonra bu araç "şu an emin değiliz" diyebilir hale geldi. Hiçbir şey söylememeyi başarabilmek, tam olarak bir göstergenin sahip olması gereken dürüstlüktür.</div>
  <div class="box vi">Thị trường không phải lúc nào cũng vận động theo nhị phân mua hoặc bán. Những giai đoạn không có xu hướng dài hơn nhiều. Sau khi long và short được tách ra, công cụ này đã có thể nói "hiện tại chưa chắc chắn." Có thể không nói gì cả chính là sự trung thực mà một chỉ báo cần có.</div>

<?php require __DIR__.'/_footer.php'; ?>
