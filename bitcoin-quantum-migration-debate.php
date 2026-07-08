<?php $slug = 'bitcoin-quantum-migration-debate'; require __DIR__.'/_header.php'; ?>

<p class="ko">비트코인을 양자컴퓨터 위협으로부터 지키기 위한 개발자들의 논쟁이 다시 격화되고 있다. 논쟁의 중심에는 <strong>BIP-361</strong>이 있는데, 이 제안은 공개키가 이미 온체인에 노출된 주소에 담긴 수백만 BTC를 소유자가 양자내성 주소로 옮기지 않으면 사실상 동결하는 방안을 담고 있다. Glassnode 추정으로 노출된 물량은 약 604만 BTC(전체 발행량의 30.2%, 약 4,690억 달러 상당)에 달한다.</p>
  <p class="en">The debate among developers over how to protect Bitcoin from the quantum-computing threat has flared up again. At its center sits <strong>BIP-361</strong>, a proposal that would effectively freeze the millions of BTC held in addresses whose public keys are already exposed on-chain — unless their owners migrate the coins to quantum-resistant addresses. Glassnode estimates the exposed supply at roughly 6.04 million BTC (30.2% of issued supply, worth about $469 billion).</p>
  <p class="ja">ビットコインを量子コンピューターの脅威から守るための開発者たちの論争が再び激化しています。論争の中心にあるのが<strong>BIP-361</strong>で、この提案は公開鍵がすでにオンチェーンで露出したアドレスに保管された数百万BTCを、所有者が量子耐性アドレスへ移さなければ事実上凍結する内容です。Glassnodeの推定では露出した数量は約604万BTC(発行総量の30.2%、約4,690億ドル相当)に達します。</p>
  <p class="es">El debate entre desarrolladores sobre cómo proteger a Bitcoin de la amenaza de la computación cuántica ha vuelto a intensificarse. En su centro está <strong>BIP-361</strong>, una propuesta que congelaría de hecho los millones de BTC guardados en direcciones cuyas claves públicas ya están expuestas en la cadena — a menos que sus propietarios migren las monedas a direcciones resistentes a lo cuántico. Glassnode estima el suministro expuesto en unos 6,04 millones de BTC (30,2% del suministro emitido, unos 469.000 millones de dólares).</p>
  <p class="de">Die Debatte unter Entwicklern darüber, wie Bitcoin vor der Bedrohung durch Quantencomputer geschützt werden kann, ist erneut aufgeflammt. Im Zentrum steht <strong>BIP-361</strong>, ein Vorschlag, der die Millionen von BTC in Adressen, deren öffentliche Schlüssel bereits On-Chain offengelegt sind, faktisch einfrieren würde — es sei denn, ihre Besitzer migrieren die Coins zu quantenresistenten Adressen. Glassnode schätzt das exponierte Angebot auf rund 6,04 Millionen BTC (30,2% des ausgegebenen Angebots, etwa 469 Milliarden US-Dollar).</p>
  <p class="fr">Le débat entre développeurs sur la manière de protéger Bitcoin de la menace de l'informatique quantique a de nouveau éclaté. Au centre se trouve <strong>BIP-361</strong>, une proposition qui gèlerait de fait les millions de BTC détenus dans des adresses dont les clés publiques sont déjà exposées on-chain — à moins que leurs propriétaires ne migrent leurs pièces vers des adresses résistantes au quantique. Glassnode estime l'offre exposée à environ 6,04 millions de BTC (30,2% de l'offre émise, soit environ 469 milliards de dollars).</p>
  <p class="pt">O debate entre desenvolvedores sobre como proteger o Bitcoin da ameaça da computação quântica voltou a se intensificar. No centro está o <strong>BIP-361</strong>, uma proposta que congelaria efetivamente os milhões de BTC mantidos em endereços cujas chaves públicas já estão expostas on-chain — a menos que seus donos migrem as moedas para endereços resistentes a computadores quânticos. A Glassnode estima o suprimento exposto em cerca de 6,04 milhões de BTC (30,2% do suprimento emitido, no valor de cerca de US$ 469 bilhões).</p>
  <p class="tr">Bitcoin'i kuantum bilgisayar tehdidinden korumaya yönelik geliştiriciler arasındaki tartışma yeniden alevlendi. Tartışmanın merkezinde, açık anahtarları zaten zincir üzerinde ifşa olmuş adreslerde tutulan milyonlarca BTC'yi -sahipleri kuantuma dayanıklı adreslere taşımadıkça- fiilen dondurmayı öngören <strong>BIP-361</strong> teklifi yer alıyor. Glassnode, açığa çıkan arzı yaklaşık 6,04 milyon BTC (ihraç edilen arzın %30,2'si, yaklaşık 469 milyar dolar) olarak tahmin ediyor.</p>
  <p class="vi">Cuộc tranh luận giữa các nhà phát triển về cách bảo vệ Bitcoin trước mối đe dọa từ máy tính lượng tử lại bùng lên. Trung tâm của cuộc tranh luận là <strong>BIP-361</strong>, một đề xuất sẽ đóng băng trên thực tế hàng triệu BTC nằm trong các địa chỉ có khóa công khai đã bị lộ trên chuỗi — trừ khi chủ sở hữu di chuyển số coin đó sang các địa chỉ kháng lượng tử. Glassnode ước tính lượng cung bị lộ vào khoảng 6,04 triệu BTC (30,2% tổng cung đã phát hành, trị giá khoảng 469 tỷ đô la).</p>

  <h2 class="ko">두 개의 제안: BIP-360과 BIP-361</h2>
  <h2 class="en">Two proposals: BIP-360 and BIP-361</h2>
  <h2 class="ja">二つの提案: BIP-360とBIP-361</h2>
  <h2 class="es">Dos propuestas: BIP-360 y BIP-361</h2>
  <h2 class="de">Zwei Vorschläge: BIP-360 und BIP-361</h2>
  <h2 class="fr">Deux propositions : BIP-360 et BIP-361</h2>
  <h2 class="pt">Duas propostas: BIP-360 e BIP-361</h2>
  <h2 class="tr">İki teklif: BIP-360 ve BIP-361</h2>
  <h2 class="vi">Hai đề xuất: BIP-360 và BIP-361</h2>
  <p class="ko">문제는 두 갈래로 나뉜다. 첫째, 앞으로 만들 주소를 어떻게 양자내성으로 만들 것인가. 둘째, 이미 취약한 주소에 잠긴 코인을 어떻게 처리할 것인가. 첫 번째 질문에 답한 것이 <strong>BIP-360</strong>이다. Cryptopolitan과 Forbes에 따르면 2026년 2월 11일 비트코인 공식 BIP 저장소에 병합됐고, "Pay-to-Merkle-Root(P2MR)"라는 새 주소 방식을 제안한다. 이 방식은 주소 생성 시점에 공개키를 온체인에 전혀 드러내지 않아, 양자컴퓨터가 공개키로부터 개인키를 역산하는 공격을 원천 차단한다.</p>
  <p class="en">The problem splits in two. First, how do you make future addresses quantum-resistant? Second, what do you do about coins already locked in vulnerable addresses? <strong>BIP-360</strong> answers the first question. According to Cryptopolitan and Forbes, it was merged into Bitcoin's official BIP repository on February 11, 2026, proposing a new address scheme called "Pay-to-Merkle-Root" (P2MR). Because it reveals no public key on-chain at the moment an address is created, it forecloses the attack in which a quantum computer derives the private key from an exposed public key.</p>
  <p class="ja">問題は二つに分かれます。第一に、今後作るアドレスをどう量子耐性にするか。第二に、すでに脆弱なアドレスに閉じ込められたコインをどう扱うか。第一の問いに答えたのが<strong>BIP-360</strong>です。CryptopolitanとForbesによれば、2026年2月11日にビットコイン公式BIPリポジトリへマージされ、「Pay-to-Merkle-Root(P2MR)」という新しいアドレス方式を提案します。この方式はアドレス生成時点で公開鍵をオンチェーンに一切さらさないため、量子コンピューターが公開鍵から秘密鍵を逆算する攻撃を根本から遮断します。</p>
  <p class="es">El problema se divide en dos. Primero, ¿cómo hacer que las direcciones futuras sean resistentes a lo cuántico? Segundo, ¿qué hacer con las monedas ya bloqueadas en direcciones vulnerables? <strong>BIP-360</strong> responde a la primera pregunta. Según Cryptopolitan y Forbes, se fusionó en el repositorio oficial de BIP de Bitcoin el 11 de febrero de 2026, proponiendo un nuevo esquema de direcciones llamado "Pay-to-Merkle-Root" (P2MR). Como no revela ninguna clave pública en la cadena en el momento en que se crea una dirección, cierra el ataque en el que una computadora cuántica deriva la clave privada de una clave pública expuesta.</p>
  <p class="de">Das Problem teilt sich in zwei. Erstens: Wie macht man künftige Adressen quantenresistent? Zweitens: Was tut man mit Coins, die bereits in verwundbaren Adressen liegen? <strong>BIP-360</strong> beantwortet die erste Frage. Laut Cryptopolitan und Forbes wurde es am 11. Februar 2026 in das offizielle BIP-Repository von Bitcoin gemerged und schlägt ein neues Adressschema namens „Pay-to-Merkle-Root" (P2MR) vor. Da es zum Zeitpunkt der Adresserstellung keinen öffentlichen Schlüssel On-Chain preisgibt, unterbindet es den Angriff, bei dem ein Quantencomputer den privaten Schlüssel aus einem offengelegten öffentlichen Schlüssel ableitet.</p>
  <p class="fr">Le problème se divise en deux. D'abord, comment rendre les futures adresses résistantes au quantique ? Ensuite, que faire des pièces déjà bloquées dans des adresses vulnérables ? <strong>BIP-360</strong> répond à la première question. Selon Cryptopolitan et Forbes, il a été fusionné dans le dépôt officiel des BIP de Bitcoin le 11 février 2026, proposant un nouveau schéma d'adresses appelé « Pay-to-Merkle-Root » (P2MR). Comme il ne révèle aucune clé publique on-chain au moment de la création d'une adresse, il exclut l'attaque par laquelle un ordinateur quantique dériverait la clé privée à partir d'une clé publique exposée.</p>
  <p class="pt">O problema se divide em dois. Primeiro, como tornar os endereços futuros resistentes a computadores quânticos? Segundo, o que fazer com as moedas já presas em endereços vulneráveis? O <strong>BIP-360</strong> responde à primeira pergunta. Segundo a Cryptopolitan e a Forbes, ele foi incorporado ao repositório oficial de BIPs do Bitcoin em 11 de fevereiro de 2026, propondo um novo esquema de endereços chamado "Pay-to-Merkle-Root" (P2MR). Como não revela nenhuma chave pública on-chain no momento em que um endereço é criado, ele impede o ataque em que um computador quântico deriva a chave privada a partir de uma chave pública exposta.</p>
  <p class="tr">Sorun ikiye ayrılıyor. Birincisi, gelecekteki adresler nasıl kuantuma dayanıklı hale getirilir? İkincisi, halihazırda savunmasız adreslerde kilitli olan coinlere ne yapılır? <strong>BIP-360</strong> birinci soruyu yanıtlıyor. Cryptopolitan ve Forbes'a göre, 11 Şubat 2026'da Bitcoin'in resmi BIP deposuna dahil edildi ve "Pay-to-Merkle-Root" (P2MR) adlı yeni bir adres şeması öneriyor. Bir adres oluşturulduğu anda zincir üzerinde hiçbir açık anahtar ifşa etmediği için, bir kuantum bilgisayarın ifşa olmuş bir açık anahtardan özel anahtarı türetmesine dayanan saldırıyı baştan engelliyor.</p>
  <p class="vi">Vấn đề chia làm hai phần. Thứ nhất, làm thế nào để các địa chỉ trong tương lai kháng được lượng tử? Thứ hai, phải làm gì với số coin đã bị khóa trong các địa chỉ dễ tổn thương? <strong>BIP-360</strong> trả lời câu hỏi thứ nhất. Theo Cryptopolitan và Forbes, đề xuất này đã được hợp nhất vào kho lưu trữ BIP chính thức của Bitcoin vào ngày 11 tháng 2 năm 2026, đề xuất một cơ chế địa chỉ mới gọi là "Pay-to-Merkle-Root" (P2MR). Vì nó không tiết lộ bất kỳ khóa công khai nào trên chuỗi vào thời điểm địa chỉ được tạo, nó loại bỏ hoàn toàn kiểu tấn công trong đó máy tính lượng tử suy ra khóa riêng từ một khóa công khai đã bị lộ.</p>

  <p class="ko">두 번째 질문 — 이미 노출된 코인 — 을 다루는 것이 <strong>BIP-361</strong>이다. The Block과 Cointelegraph에 따르면 "Post Quantum Migration and Legacy Signature Sunset(양자 이후 마이그레이션 및 레거시 서명 일몰)"이라는 제목으로, 개발자 Jameson Lopp를 필두로 공동 연구자들이 2026년 4월 제출했다. 핵심은 3단계 일정이다. 아래 도표로 정리했다.</p>
  <p class="en"><strong>BIP-361</strong> tackles the second question — the already-exposed coins. Per The Block and Cointelegraph, it is titled "Post Quantum Migration and Legacy Signature Sunset" and was filed in April 2026 by developer Jameson Lopp and co-researchers. Its core is a three-phase schedule, laid out in the diagram below.</p>
  <p class="ja">二つ目の問い — すでに露出したコイン — を扱うのが<strong>BIP-361</strong>です。The BlockとCointelegraphによれば、「Post Quantum Migration and Legacy Signature Sunset(量子以後のマイグレーションおよびレガシー署名の日没)」という題名で、開発者Jameson Loppを筆頭に共同研究者たちが2026年4月に提出しました。核心は3段階のスケジュールです。下の図に整理しました。</p>
  <p class="es"><strong>BIP-361</strong> aborda la segunda pregunta — las monedas ya expuestas. Según The Block y Cointelegraph, se titula "Post Quantum Migration and Legacy Signature Sunset" y fue presentada en abril de 2026 por el desarrollador Jameson Lopp y coinvestigadores. Su núcleo es un calendario de tres fases, expuesto en el diagrama siguiente.</p>
  <p class="de"><strong>BIP-361</strong> nimmt sich der zweiten Frage an — den bereits exponierten Coins. Laut The Block und Cointelegraph trägt es den Titel „Post Quantum Migration and Legacy Signature Sunset" und wurde im April 2026 vom Entwickler Jameson Lopp und Mitforschern eingereicht. Sein Kern ist ein Dreiphasen-Zeitplan, dargestellt im Diagramm unten.</p>
  <p class="fr"><strong>BIP-361</strong> s'attaque à la seconde question — les pièces déjà exposées. Selon The Block et Cointelegraph, il s'intitule « Post Quantum Migration and Legacy Signature Sunset » et a été déposé en avril 2026 par le développeur Jameson Lopp et des co-chercheurs. Son cœur est un calendrier en trois phases, détaillé dans le diagramme ci-dessous.</p>
  <p class="pt">O <strong>BIP-361</strong> aborda a segunda pergunta — as moedas já expostas. Segundo The Block e Cointelegraph, é intitulado "Post Quantum Migration and Legacy Signature Sunset" e foi apresentado em abril de 2026 pelo desenvolvedor Jameson Lopp e coautores. Seu núcleo é um cronograma de três fases, detalhado no diagrama abaixo.</p>
  <p class="tr"><strong>BIP-361</strong>, ikinci soruyla — halihazırda ifşa olmuş coinlerle — ilgileniyor. The Block ve Cointelegraph'a göre, "Post Quantum Migration and Legacy Signature Sunset" başlığını taşıyor ve Nisan 2026'da geliştirici Jameson Lopp ve ortak araştırmacılar tarafından sunuldu. Özü, aşağıdaki diyagramda gösterilen üç aşamalı bir takvimdir.</p>
  <p class="vi"><strong>BIP-361</strong> giải quyết câu hỏi thứ hai — những đồng coin đã bị lộ. Theo The Block và Cointelegraph, đề xuất mang tên "Post Quantum Migration and Legacy Signature Sunset" và được nộp vào tháng 4 năm 2026 bởi nhà phát triển Jameson Lopp cùng các đồng nghiên cứu. Cốt lõi của đề xuất là một lịch trình ba giai đoạn, được trình bày trong sơ đồ bên dưới.</p>

  <div class="ko">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">BIP-361 제안: 레거시 서명 3단계 일몰 (활성화 시점 기준)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Phase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">활성화 후 약 3년</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">레거시 주소 신규 수신 금지</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Phase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">활성화 후 약 5년</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr 서명 폐지·동결</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Phase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">영지식증명 기반</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">동결 자금 복구 경로(불완전)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">노출 공급량 추정: Glassnode 604만 BTC(30.2%) · Deloitte 약 400만 BTC(약 25%) · BIP-361 본문 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">BIP-361 proposal: three-phase sunset of legacy signatures (from activation)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Phase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 years after activation</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">No new sends to legacy addrs</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Phase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 years after activation</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr deprecated, frozen</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Phase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">ZK-proof based</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Recovery path (incomplete)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Exposed-supply estimates: Glassnode 6.04M BTC (30.2%) · Deloitte ~4M BTC (~25%) · BIP-361 text 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">BIP-361提案: レガシー署名の3段階日没(活性化時点基準)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Phase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">活性化後 約3年</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">レガシー宛て新規受信禁止</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Phase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">活性化後 約5年</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr署名を廃止・凍結</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Phase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">ゼロ知識証明ベース</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">凍結資金の復旧経路(不完全)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">露出供給量推定: Glassnode 604万BTC(30.2%) · Deloitte 約400万BTC(約25%) · BIP-361本文 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Propuesta BIP-361: ocaso en tres fases de firmas heredadas (desde activación)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Fase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 años tras activación</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Sin envíos nuevos a dir. heredadas</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Fase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 años tras activación</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr obsoletas, congeladas</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Fase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">Basada en prueba ZK</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Ruta de recuperación (incompleta)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Estim. suministro expuesto: Glassnode 6,04M BTC (30,2%) · Deloitte ~4M BTC (~25%) · texto BIP-361 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">BIP-361-Vorschlag: Dreiphasiger Sonnenuntergang von Legacy-Signaturen (ab Aktivierung)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Phase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 Jahre nach Aktivierung</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Keine neuen Sends an Legacy-Adr.</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Phase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 Jahre nach Aktivierung</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr abgeschafft, eingefroren</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Phase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">ZK-Beweis-basiert</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Wiederherstellungspfad (unvollständig)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Exponiertes Angebot: Glassnode 6,04M BTC (30,2%) · Deloitte ~4M BTC (~25%) · BIP-361-Text 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="fr">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Proposition BIP-361 : extinction en trois phases des signatures héritées (depuis l'activation)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Phase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 ans après l'activation</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Aucun envoi vers adr. héritées</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Phase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 ans après l'activation</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr obsolètes, gelées</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Phase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">Basé sur preuve ZK</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Voie de récupération (incomplète)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Estimations de l'offre exposée : Glassnode 6,04M BTC (30,2%) · Deloitte ~4M BTC (~25%) · texte BIP-361 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="pt">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Proposta BIP-361: extinção em três fases das assinaturas legadas (a partir da ativação)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Fase A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 anos após a ativação</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Sem novos envios a end. legados</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Fase B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 anos após a ativação</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr obsoletas, congeladas</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Fase C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">Baseado em prova ZK</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Rota de recuperação (incompleta)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Estimativas de suprimento exposto: Glassnode 6,04M BTC (30,2%) · Deloitte ~4M BTC (~25%) · texto BIP-361 34%+ </text>
    </g>
  </svg>
  </div>
  <div class="tr">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">BIP-361 teklifi: eski imzaların üç aşamalı sona erdirilmesi (etkinleştirmeden itibaren)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Faz A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">Etkinleştirmeden ~3 yıl sonra</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Eski adreslere yeni gönderim yok</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Faz B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">Etkinleştirmeden ~5 yıl sonra</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr kaldırıldı, donduruldu</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Faz C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">ZK-kanıt tabanlı</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Kurtarma yolu (eksik)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Açığa çıkan arz tahminleri: Glassnode 6,04M BTC (%30,2) · Deloitte ~4M BTC (~%25) · BIP-361 metni %34+ </text>
    </g>
  </svg>
  </div>
  <div class="vi">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Đề xuất BIP-361: chấm dứt chữ ký cũ theo ba giai đoạn (tính từ khi kích hoạt)</text>
    <g font-family="sans-serif" font-size="10">
      <line x1="40" y1="150" x2="660" y2="150" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="120" cy="150" r="6" fill="#38bdf8"/><circle cx="360" cy="150" r="6" fill="#f7931a"/><circle cx="600" cy="150" r="6" fill="#ef4444"/>
      <rect x="45" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="120" y="90" fill="#38bdf8" font-weight="700" text-anchor="middle">Giai đoạn A</text>
      <text x="120" y="106" fill="#a1a1aa" text-anchor="middle">~3 năm sau khi kích hoạt</text>
      <text x="120" y="120" fill="#a1a1aa" text-anchor="middle">Không gửi mới đến địa chỉ cũ</text>
      <rect x="285" y="170" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.5"/>
      <text x="360" y="190" fill="#f7931a" font-weight="700" text-anchor="middle">Giai đoạn B</text>
      <text x="360" y="206" fill="#a1a1aa" text-anchor="middle">~5 năm sau khi kích hoạt</text>
      <text x="360" y="220" fill="#a1a1aa" text-anchor="middle">ECDSA/Schnorr ngừng dùng, đóng băng</text>
      <rect x="525" y="70" width="150" height="60" rx="6" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.5"/>
      <text x="600" y="90" fill="#ef4444" font-weight="700" text-anchor="middle">Giai đoạn C</text>
      <text x="600" y="106" fill="#a1a1aa" text-anchor="middle">Dựa trên bằng chứng ZK</text>
      <text x="600" y="120" fill="#a1a1aa" text-anchor="middle">Lộ trình khôi phục (chưa hoàn chỉnh)</text>
      <text x="350" y="270" fill="#71717a" font-size="9" text-anchor="middle">Ước tính cung bị lộ: Glassnode 6,04M BTC (30,2%) · Deloitte ~4M BTC (~25%) · văn bản BIP-361 34%+ </text>
    </g>
  </svg>
  </div>

  <h2 class="ko">얼마나 많은 코인이 취약한가</h2>
  <h2 class="en">How many coins are actually vulnerable</h2>
  <h2 class="ja">どれだけのコインが脆弱なのか</h2>
  <h2 class="es">Cuántas monedas son realmente vulnerables</h2>
  <h2 class="de">Wie viele Coins sind tatsächlich verwundbar</h2>
  <h2 class="fr">Combien de pièces sont réellement vulnérables</h2>
  <h2 class="pt">Quantas moedas são realmente vulneráveis</h2>
  <h2 class="tr">Gerçekte kaç coin savunmasız</h2>
  <h2 class="vi">Có bao nhiêu coin thực sự dễ bị tổn thương</h2>
  <p class="ko">추정치는 방법론에 따라 갈린다. Glassnode는 공개키가 노출된 UTXO를 약 604만 BTC(30.2%, 약 4,690억 달러)로 집계했다. 회계법인 Deloitte의 분석은 P2PK 및 재사용된 P2PKH 주소 기준 약 400만 BTC(약 25%)로 보는데, 이 중 약 200만 BTC는 한 번도 옮겨지지 않은 초기 채굴 코인(사토시 추정 물량 포함)이다. BIP-361 본문은 2026년 3월 1일 기준 전체 비트코인의 34% 이상이 이미 공개키를 노출했다고 명시한다. 숫자는 다르지만 결론은 같다 — 공급량의 4분의 1에서 3분의 1이 이론적 사정권 안에 있다.</p>
  <p class="en">Estimates diverge by methodology. Glassnode counts UTXOs with exposed public keys at roughly 6.04 million BTC (30.2%, about $469 billion). Accounting firm Deloitte's analysis, based on P2PK and reused P2PKH addresses, puts it near 4 million BTC (~25%), of which about 2 million are early-mined coins that have never moved (including presumed Satoshi holdings). The BIP-361 text itself states that, as of March 1, 2026, more than 34% of all bitcoin had already revealed a public key. The numbers differ, but the conclusion is the same — somewhere between a quarter and a third of supply sits in the theoretical blast radius.</p>
  <p class="ja">推定値は方法論によって分かれます。Glassnodeは公開鍵が露出したUTXOを約604万BTC(30.2%、約4,690億ドル)と集計しました。会計事務所Deloitteの分析はP2PKおよび再利用されたP2PKHアドレス基準で約400万BTC(約25%)とし、うち約200万BTCは一度も動かされていない初期採掘コイン(サトシ推定分を含む)です。BIP-361本文は2026年3月1日時点で全ビットコインの34%以上がすでに公開鍵を露出したと明記しています。数字は異なりますが結論は同じです — 供給量の4分の1から3分の1が理論上の射程圏内にあります。</p>
  <p class="es">Las estimaciones divergen según la metodología. Glassnode cuenta los UTXO con claves públicas expuestas en unos 6,04 millones de BTC (30,2%, unos 469.000 millones de dólares). El análisis de la firma contable Deloitte, basado en direcciones P2PK y P2PKH reutilizadas, lo sitúa cerca de 4 millones de BTC (~25%), de los cuales unos 2 millones son monedas de minería temprana que nunca se han movido (incluidas las supuestas tenencias de Satoshi). El propio texto de BIP-361 afirma que, al 1 de marzo de 2026, más del 34% de todo el bitcoin ya había revelado una clave pública. Las cifras difieren, pero la conclusión es la misma — entre una cuarta parte y un tercio del suministro está en el radio de impacto teórico.</p>
  <p class="de">Die Schätzungen gehen je nach Methodik auseinander. Glassnode beziffert UTXOs mit offengelegten öffentlichen Schlüsseln auf rund 6,04 Millionen BTC (30,2%, etwa 469 Milliarden Dollar). Die Analyse der Wirtschaftsprüfungsgesellschaft Deloitte, basierend auf P2PK- und wiederverwendeten P2PKH-Adressen, setzt sie bei knapp 4 Millionen BTC (~25%) an, davon etwa 2 Millionen früh geschürfte Coins, die nie bewegt wurden (einschließlich vermuteter Satoshi-Bestände). Der BIP-361-Text selbst gibt an, dass zum 1. März 2026 mehr als 34% aller Bitcoin bereits einen öffentlichen Schlüssel offengelegt hatten. Die Zahlen unterscheiden sich, doch die Schlussfolgerung ist dieselbe — zwischen einem Viertel und einem Drittel des Angebots liegt im theoretischen Wirkungsradius.</p>
  <p class="fr">Les estimations divergent selon la méthodologie. Glassnode dénombre les UTXO à clé publique exposée à environ 6,04 millions de BTC (30,2%, soit environ 469 milliards de dollars). L'analyse du cabinet comptable Deloitte, fondée sur les adresses P2PK et P2PKH réutilisées, l'estime à près de 4 millions de BTC (~25%), dont environ 2 millions sont des pièces minées tôt qui n'ont jamais bougé (y compris les avoirs présumés de Satoshi). Le texte même de BIP-361 indique qu'au 1er mars 2026, plus de 34% de tous les bitcoins avaient déjà révélé une clé publique. Les chiffres diffèrent, mais la conclusion est la même — entre un quart et un tiers de l'offre se trouve dans le rayon d'impact théorique.</p>
  <p class="pt">As estimativas divergem conforme a metodologia. A Glassnode contabiliza os UTXOs com chaves públicas expostas em cerca de 6,04 milhões de BTC (30,2%, cerca de US$ 469 bilhões). A análise da empresa de contabilidade Deloitte, baseada em endereços P2PK e P2PKH reutilizados, situa o número em cerca de 4 milhões de BTC (~25%), dos quais cerca de 2 milhões são moedas minadas nos primórdios que nunca se moveram (incluindo as supostas reservas de Satoshi). O próprio texto do BIP-361 afirma que, em 1º de março de 2026, mais de 34% de todo o bitcoin já havia revelado uma chave pública. Os números diferem, mas a conclusão é a mesma — entre um quarto e um terço do suprimento está no raio de impacto teórico.</p>
  <p class="tr">Tahminler yönteme göre farklılaşıyor. Glassnode, açık anahtarı ifşa olmuş UTXO'ları yaklaşık 6,04 milyon BTC (%30,2, yaklaşık 469 milyar dolar) olarak sayıyor. Muhasebe firması Deloitte'un P2PK ve yeniden kullanılmış P2PKH adreslerine dayanan analizi ise bunu yaklaşık 4 milyon BTC (~%25) olarak koyuyor; bunun yaklaşık 2 milyonu hiç hareket etmemiş erken dönem madencilik coinleri (varsayılan Satoshi varlıkları dahil). BIP-361 metninin kendisi, 1 Mart 2026 itibarıyla tüm bitcoinlerin %34'ünden fazlasının zaten bir açık anahtar ifşa ettiğini belirtiyor. Rakamlar farklı olsa da sonuç aynı — arzın dörtte biri ile üçte biri arasında bir kısmı teorik etki alanında bulunuyor.</p>
  <p class="vi">Các ước tính khác nhau tùy theo phương pháp. Glassnode đếm số UTXO có khóa công khai bị lộ vào khoảng 6,04 triệu BTC (30,2%, khoảng 469 tỷ đô la). Phân tích của công ty kiểm toán Deloitte, dựa trên các địa chỉ P2PK và P2PKH bị tái sử dụng, đưa ra con số gần 4 triệu BTC (~25%), trong đó khoảng 2 triệu là các đồng coin khai thác sớm chưa từng được di chuyển (bao gồm cả lượng nắm giữ được cho là của Satoshi). Bản thân văn bản BIP-361 nêu rằng, tính đến ngày 1 tháng 3 năm 2026, hơn 34% tổng số bitcoin đã lộ khóa công khai. Các con số khác nhau, nhưng kết luận là như nhau — khoảng từ một phần tư đến một phần ba tổng cung nằm trong phạm vi ảnh hưởng về mặt lý thuyết.</p>

  <h2 class="ko">개발자 커뮤니티가 갈라진 지점</h2>
  <h2 class="en">Where the developer community splits</h2>
  <h2 class="ja">開発者コミュニティが割れた地点</h2>
  <h2 class="es">Dónde se divide la comunidad de desarrolladores</h2>
  <h2 class="de">Wo sich die Entwickler-Community spaltet</h2>
  <h2 class="fr">Où se divise la communauté des développeurs</h2>
  <h2 class="pt">Onde a comunidade de desenvolvedores se divide</h2>
  <h2 class="tr">Geliştirici topluluğunun ayrıştığı nokta</h2>
  <h2 class="vi">Nơi cộng đồng nhà phát triển bị chia rẽ</h2>
  <p class="ko">반응은 극명하게 갈렸다. Bernstein 애널리스트들은 이를 실존적 위협이 아니라 통상적인 업그레이드 사이클로 규정했고, Michael Saylor는 우려가 과장됐다고 일축했다. 반대편에서는 더 격한 언어가 나왔다. Cointelegraph에 따르면 Marty Bent는 제안을 "터무니없다(ridiculous)"고 했고, Phil Geiger는 "돈을 도둑맞지 않게 하려고 돈을 훔쳐야 한다니"라고 비꼬았다. 정작 제안자인 Jameson Lopp조차 이 초안이 지금 채택될 수 있는 상태가 아니며 "다가오는 유통량 공급 충격에 접근하는 하나의 거친 스케치"일 뿐이라고 인정했다.</p>
  <p class="en">The reaction split sharply. Bernstein analysts framed it as a routine upgrade cycle rather than an existential threat, and Michael Saylor dismissed the concern as overblown. From the other side came harsher language. Per Cointelegraph, Marty Bent called the proposal "ridiculous," and Phil Geiger scoffed, "We have to steal people's money to prevent their money from being stolen." Even Jameson Lopp, the proposal's own lead author, conceded the draft is not in a position to be adopted, describing it as "a rough sketch of one way we could approach the issue of a looming circulating supply shock."</p>
  <p class="ja">反応は極めて明確に分かれました。Bernsteinのアナリストたちはこれを実存的脅威ではなく通常のアップグレードサイクルと位置づけ、Michael Saylorは懸念が誇張されていると一蹴しました。反対側からはより激しい言葉が出ました。Cointelegraphによれば、Marty Bentは提案を「ばかげている(ridiculous)」と述べ、Phil Geigerは「金を盗まれないようにするために金を盗まねばならないとは」と皮肉りました。提案者であるJameson Lopp自身でさえ、この草案が今採択できる状態ではなく「迫りくる流通量供給ショックに取り組む一つの粗いスケッチ」に過ぎないと認めました。</p>
  <p class="es">La reacción se dividió bruscamente. Los analistas de Bernstein lo enmarcaron como un ciclo de actualización rutinario más que como una amenaza existencial, y Michael Saylor descartó la preocupación como exagerada. Del otro lado llegó un lenguaje más duro. Según Cointelegraph, Marty Bent calificó la propuesta de "ridícula", y Phil Geiger se burló: "Tenemos que robar el dinero de la gente para evitar que se lo roben." Incluso Jameson Lopp, autor principal de la propuesta, admitió que el borrador no está en condiciones de ser adoptado, describiéndolo como "un boceto tosco de una forma en que podríamos abordar el problema de un inminente shock de suministro circulante."</p>
  <p class="de">Die Reaktion spaltete sich scharf. Bernstein-Analysten rahmten es als routinemäßigen Upgrade-Zyklus statt als existenzielle Bedrohung, und Michael Saylor tat die Sorge als übertrieben ab. Von der anderen Seite kam härtere Sprache. Laut Cointelegraph nannte Marty Bent den Vorschlag „lächerlich", und Phil Geiger spottete: „Wir müssen das Geld der Leute stehlen, um zu verhindern, dass ihr Geld gestohlen wird." Selbst Jameson Lopp, der Hauptautor des Vorschlags, räumte ein, dass der Entwurf nicht angenommen werden kann, und beschrieb ihn als „eine grobe Skizze eines Wegs, wie wir das Problem eines drohenden Umlauf-Angebotsschocks angehen könnten."</p>
  <p class="fr">La réaction s'est nettement scindée. Les analystes de Bernstein l'ont présenté comme un cycle de mise à niveau ordinaire plutôt qu'une menace existentielle, et Michael Saylor a jugé l'inquiétude exagérée. De l'autre côté, le ton était plus dur. Selon Cointelegraph, Marty Bent a qualifié la proposition de « ridicule », et Phil Geiger a ironisé : « Nous devons voler l'argent des gens pour empêcher que leur argent ne soit volé. » Même Jameson Lopp, l'auteur principal de la proposition, a reconnu que l'ébauche n'est pas en état d'être adoptée, la décrivant comme « une esquisse grossière d'une façon dont nous pourrions aborder le problème d'un choc imminent sur l'offre en circulation ».</p>
  <p class="pt">A reação se dividiu de forma acentuada. Os analistas da Bernstein a enquadraram como um ciclo de atualização rotineiro, e não como uma ameaça existencial, e Michael Saylor descartou a preocupação como exagerada. Do outro lado vieram palavras mais duras. Segundo a Cointelegraph, Marty Bent chamou a proposta de "ridícula", e Phil Geiger zombou: "Temos que roubar o dinheiro das pessoas para impedir que seu dinheiro seja roubado." Até mesmo Jameson Lopp, o autor principal da proposta, admitiu que o rascunho não está em condições de ser adotado, descrevendo-o como "um esboço bruto de uma forma pela qual poderíamos abordar o problema de um iminente choque na oferta circulante."</p>
  <p class="tr">Tepkiler keskin biçimde ayrıştı. Bernstein analistleri bunu varoluşsal bir tehditten çok rutin bir yükseltme döngüsü olarak nitelendirdi ve Michael Saylor endişenin abartıldığını söyleyerek reddetti. Diğer taraftan daha sert ifadeler geldi. Cointelegraph'a göre Marty Bent teklifi "gülünç" olarak nitelendirdi ve Phil Geiger alaycı bir dille şöyle dedi: "İnsanların parasının çalınmasını önlemek için önce o parayı çalmamız gerekiyor." Teklifin baş yazarı Jameson Lopp bile taslağın şu an kabul edilebilir durumda olmadığını kabul ederek bunu "yaklaşan bir dolaşımdaki arz şokuna nasıl yaklaşabileceğimize dair kaba bir taslak" olarak tanımladı.</p>
  <p class="vi">Phản ứng chia rẽ rõ rệt. Các nhà phân tích của Bernstein coi đây là một chu kỳ nâng cấp thông thường chứ không phải mối đe dọa sống còn, còn Michael Saylor bác bỏ lo ngại này là bị thổi phồng. Ở phía bên kia là những lời lẽ gay gắt hơn. Theo Cointelegraph, Marty Bent gọi đề xuất này là "lố bịch", còn Phil Geiger châm biếm: "Chúng ta phải đánh cắp tiền của người dân để ngăn tiền của họ bị đánh cắp." Ngay cả Jameson Lopp, tác giả chính của đề xuất, cũng thừa nhận bản dự thảo chưa ở trạng thái có thể được thông qua, mô tả nó là "một bản phác thảo thô sơ về một cách chúng ta có thể tiếp cận vấn đề cú sốc nguồn cung lưu hành đang cận kề."</p>

  <div class="box ko">💡 <strong>시사점:</strong> 이건 단순한 기술 논쟁이 아니라 비트코인의 근본 가치관을 건드리는 문제다. "코드는 곧 법(불변성)"이라는 원칙과, "취약한 코인을 방치하면 어느 날 양자컴퓨터가 604만 BTC를 시장에 쏟아낼 수 있다"는 현실이 정면충돌한다. 지금 당장 소프트포크 활성화가 임박한 건 아니지만, 지켜볼 세 가지가 있다 — (1) FN-DSA(FIPS 206) 등 양자내성 서명 표준의 최종 확정, (2) 하드웨어 지갑 업체들의 PQ 서명 통합 속도, (3) BIP-360/361 중 실제 활성화 경로에 오르는 제안이 나오는지. 어느 쪽도 가격 신호는 아니지만, 비트코인이 처음으로 "코인을 동결한다"는 선택지를 공식 테이블에 올렸다는 사실 자체가 이정표다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> This is not a mere technical squabble; it touches Bitcoin's foundational values. The principle that "code is law" (immutability) collides head-on with the reality that leaving vulnerable coins untouched could one day let a quantum computer dump 6.04 million BTC onto the market. No soft-fork activation is imminent, but three things are worth watching — (1) the finalization of quantum-resistant signature standards like FN-DSA (FIPS 206), (2) how quickly hardware-wallet makers integrate PQ signatures, and (3) whether any of BIP-360/361 reaches an actual activation path. None is a price signal, but the very fact that Bitcoin has, for the first time, put "freezing coins" on the official table is a milestone.</div>
  <div class="box ja">💡 <strong>示唆:</strong> これは単なる技術論争ではなく、ビットコインの根本的価値観に触れる問題です。「コードは法(不変性)」という原則と、「脆弱なコインを放置すればいつか量子コンピューターが604万BTCを市場に放出しうる」という現実が正面衝突します。今すぐソフトフォーク活性化が迫っているわけではありませんが、注視すべき三点があります — (1) FN-DSA(FIPS 206)など量子耐性署名標準の最終確定、(2) ハードウェアウォレット各社のPQ署名統合の速度、(3) BIP-360/361のうち実際の活性化経路に乗る提案が出るか。いずれも価格シグナルではありませんが、ビットコインが初めて「コインを凍結する」選択肢を公式のテーブルに載せたこと自体が里程標です。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> Esto no es una mera disputa técnica; toca los valores fundamentales de Bitcoin. El principio de que "el código es ley" (inmutabilidad) choca de frente con la realidad de que dejar las monedas vulnerables intactas podría permitir un día que una computadora cuántica vuelque 6,04 millones de BTC al mercado. Ninguna activación de soft-fork es inminente, pero vale la pena vigilar tres cosas — (1) la finalización de estándares de firma resistentes a lo cuántico como FN-DSA (FIPS 206), (2) la rapidez con que los fabricantes de monederos hardware integran firmas PQ, y (3) si alguna de BIP-360/361 alcanza una ruta de activación real. Ninguna es una señal de precio, pero el mero hecho de que Bitcoin haya puesto por primera vez "congelar monedas" sobre la mesa oficial es un hito.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Dies ist kein bloßer technischer Streit; es berührt Bitcoins Grundwerte. Das Prinzip „Code ist Gesetz" (Unveränderlichkeit) prallt frontal mit der Realität zusammen, dass unangetastete verwundbare Coins eines Tages einem Quantencomputer erlauben könnten, 6,04 Millionen BTC auf den Markt zu werfen. Keine Soft-Fork-Aktivierung steht unmittelbar bevor, doch drei Dinge sind beobachtenswert — (1) die Finalisierung quantenresistenter Signaturstandards wie FN-DSA (FIPS 206), (2) wie schnell Hardware-Wallet-Hersteller PQ-Signaturen integrieren, und (3) ob eines von BIP-360/361 einen tatsächlichen Aktivierungspfad erreicht. Keines ist ein Preissignal, aber allein die Tatsache, dass Bitcoin erstmals „Coins einfrieren" offiziell auf den Tisch gelegt hat, ist ein Meilenstein.</div>
  <div class="box fr">💡 <strong>À retenir :</strong> Il ne s'agit pas d'une simple querelle technique ; cela touche aux valeurs fondamentales de Bitcoin. Le principe selon lequel « le code fait loi » (immuabilité) entre en collision frontale avec la réalité que laisser les pièces vulnérables intactes pourrait un jour permettre à un ordinateur quantique de déverser 6,04 millions de BTC sur le marché. Aucune activation de soft-fork n'est imminente, mais trois choses méritent d'être surveillées — (1) la finalisation de normes de signature résistantes au quantique comme FN-DSA (FIPS 206), (2) la rapidité avec laquelle les fabricants de portefeuilles matériels intègrent les signatures PQ, et (3) si l'une des propositions BIP-360/361 atteint une véritable voie d'activation. Aucun de ces éléments n'est un signal de prix, mais le simple fait que Bitcoin ait, pour la première fois, mis « le gel de pièces » sur la table officielle est déjà un jalon.</div>
  <div class="box pt">💡 <strong>Conclusão:</strong> Isso não é uma mera briga técnica; toca nos valores fundamentais do Bitcoin. O princípio de que "código é lei" (imutabilidade) colide de frente com a realidade de que deixar moedas vulneráveis intocadas poderia, um dia, permitir que um computador quântico despejasse 6,04 milhões de BTC no mercado. Nenhuma ativação de soft fork é iminente, mas três coisas merecem atenção — (1) a finalização de padrões de assinatura resistentes a computadores quânticos, como o FN-DSA (FIPS 206), (2) a rapidez com que os fabricantes de carteiras de hardware integram assinaturas PQ, e (3) se algum dos BIP-360/361 chega a um caminho real de ativação. Nenhum desses pontos é um sinal de preço, mas o simples fato de o Bitcoin ter colocado, pela primeira vez, "congelar moedas" sobre a mesa oficial já é um marco.</div>
  <div class="box tr">💡 <strong>Sonuç:</strong> Bu sıradan bir teknik tartışma değil; Bitcoin'in temel değerlerine dokunuyor. "Kod kanundur" (değişmezlik) ilkesi, savunmasız coinlerin dokunulmadan bırakılmasının bir gün bir kuantum bilgisayarın 6,04 milyon BTC'yi piyasaya boşaltmasına izin verebileceği gerçeğiyle doğrudan çatışıyor. Şu an için bir soft-fork etkinleştirmesi yakın değil, ancak izlenmesi gereken üç şey var — (1) FN-DSA (FIPS 206) gibi kuantuma dayanıklı imza standartlarının kesinleşmesi, (2) donanım cüzdan üreticilerinin PQ imzalarını ne kadar hızlı entegre edeceği ve (3) BIP-360/361'den herhangi birinin gerçek bir etkinleştirme yoluna ulaşıp ulaşmayacağı. Bunların hiçbiri bir fiyat sinyali değil, ancak Bitcoin'in ilk kez "coinleri dondurma" seçeneğini resmi masaya koymuş olması başlı başına bir dönüm noktası.</div>
  <div class="box vi">💡 <strong>Điểm mấu chốt:</strong> Đây không đơn thuần là một cuộc tranh cãi kỹ thuật; nó chạm đến các giá trị nền tảng của Bitcoin. Nguyên tắc "mã nguồn là luật" (tính bất biến) va chạm trực diện với thực tế rằng nếu để yên những đồng coin dễ tổn thương, một ngày nào đó máy tính lượng tử có thể xả 6,04 triệu BTC ra thị trường. Hiện chưa có việc kích hoạt soft-fork nào sắp xảy ra, nhưng có ba điều đáng theo dõi — (1) việc hoàn thiện các tiêu chuẩn chữ ký kháng lượng tử như FN-DSA (FIPS 206), (2) tốc độ các nhà sản xuất ví cứng tích hợp chữ ký PQ, và (3) liệu BIP-360/361 có đạt được một lộ trình kích hoạt thực sự hay không. Không điều nào trong số này là tín hiệu về giá, nhưng chính việc Bitcoin lần đầu tiên đưa "đóng băng coin" lên bàn nghị sự chính thức đã là một cột mốc.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: The Block("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes(2026.2.23), Glassnode 온체인 데이터, Deloitte 양자 리스크 평가, BIP-361 원문(bips.dev/361).</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: The Block ("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph ("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan ("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (Feb 23, 2026), Glassnode on-chain data, Deloitte quantum risk assessment, BIP-361 text (bips.dev/361).</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: The Block(「Bitcoin researchers propose phased sunset of legacy signatures」)、Cointelegraph(「Bitcoin BIP-361 targets quantum security threat」)、Cryptopolitan(「Quantum attack resistance BIP-360 added into the official Bitcoin repository」)、Forbes(2026年2月23日)、Glassnodeオンチェーンデータ、Deloitte量子リスク評価、BIP-361原文(bips.dev/361)。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: The Block ("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph ("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan ("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (23 de febrero de 2026), datos on-chain de Glassnode, evaluación de riesgo cuántico de Deloitte, texto de BIP-361 (bips.dev/361).</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: The Block („Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph („Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan („Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (23. Februar 2026), Glassnode On-Chain-Daten, Deloitte Quanten-Risikobewertung, BIP-361-Text (bips.dev/361).</p>
  <p class="fr" style="font-size:12px;color:#52525b;margin-top:24px">Sources : The Block (« Bitcoin researchers propose phased sunset of legacy signatures »), Cointelegraph (« Bitcoin BIP-361 targets quantum security threat »), Cryptopolitan (« Quantum attack resistance BIP-360 added into the official Bitcoin repository »), Forbes (23 février 2026), données on-chain de Glassnode, évaluation des risques quantiques de Deloitte, texte de BIP-361 (bips.dev/361).</p>
  <p class="pt" style="font-size:12px;color:#52525b;margin-top:24px">Fontes: The Block ("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph ("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan ("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (23 de fevereiro de 2026), dados on-chain da Glassnode, avaliação de risco quântico da Deloitte, texto do BIP-361 (bips.dev/361).</p>
  <p class="tr" style="font-size:12px;color:#52525b;margin-top:24px">Kaynaklar: The Block ("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph ("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan ("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (23 Şubat 2026), Glassnode zincir üstü verileri, Deloitte kuantum risk değerlendirmesi, BIP-361 metni (bips.dev/361).</p>
  <p class="vi" style="font-size:12px;color:#52525b;margin-top:24px">Nguồn: The Block ("Bitcoin researchers propose phased sunset of legacy signatures"), Cointelegraph ("Bitcoin BIP-361 targets quantum security threat"), Cryptopolitan ("Quantum attack resistance BIP-360 added into the official Bitcoin repository"), Forbes (23/2/2026), dữ liệu on-chain của Glassnode, đánh giá rủi ro lượng tử của Deloitte, văn bản BIP-361 (bips.dev/361).</p>
<?php require __DIR__.'/_footer.php'; ?>
