<?php $slug = 'ku-leuven-wallet-extension-privacy-fingerprint-study'; require __DIR__.'/_header.php'; ?>

<p class="ko">벨기에 KU루벤대학교 보안연구그룹 디스트리넷(DistriNet)이 크롬 기반 크립토 지갑 확장앱 85개(합산 사용자 약 3,500만명)를 분석해, 사용자의 서로 다른 지갑 주소를 연결하고 웹사이트를 넘나들며 추적할 수 있게 하는 설계 결함을 발견했다고 더해커뉴스가 보도했다. 연구진은 7월7일 arXiv에 게재한 논문 「우리가 (쓰고 있다고 믿는) 가면들: Web3 생태계 속 브라우저 확장 지갑의 프라이버시 위협」에서 이 같은 결과를 밝혔다.</p>
<p class="en">Researchers at Belgium's KU Leuven, part of the DistriNet security research group, tested 85 of the most popular Chrome-based crypto wallet extensions — together serving roughly 35 million users — and found design flaws that let outside parties link a person's separate wallet addresses together and track them across websites, The Hacker News reported. The findings appear in a paper posted to arXiv on July 7 titled "The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem."</p>
<p class="ja">ベルギーのKUルーヴェン大学のセキュリティ研究グループ、ディストリネット(DistriNet)が、クロームベースの暗号資産ウォレット拡張機能85種(合計利用者約3,500万人)を検証し、ユーザーの異なるウォレットアドレスを紐付け、サイトをまたいで追跡できる設計上の欠陥を発見したと、ザ・ハッカーニュースが報じた。研究チームは7月7日にarXivへ投稿した論文『私たちが(着ていると思い込んでいる)仮面:Web3エコシステムにおけるブラウザ拡張ウォレットのプライバシー脅威』でこの結果を明らかにした。</p>
<p class="es">Investigadores de la KU Leuven en Bélgica, del grupo de investigación en seguridad DistriNet, analizaron 85 de las extensiones de billeteras cripto basadas en Chrome más populares —que sirven en conjunto a unos 35 millones de usuarios— y hallaron fallos de diseño que permiten a terceros vincular las distintas direcciones de billetera de una persona y rastrearla entre sitios web, informó The Hacker News. Los hallazgos aparecen en un artículo publicado en arXiv el 7 de julio titulado "Las máscaras que (creemos) llevamos: Amenazas de privacidad de las billeteras de extensión de navegador en el ecosistema Web3".</p>
<p class="de">Forscher der belgischen KU Leuven, Teil der Sicherheitsforschungsgruppe DistriNet, testeten 85 der beliebtesten Chrome-basierten Krypto-Wallet-Erweiterungen — die zusammen rund 35 Millionen Nutzer bedienen — und fanden Designfehler, durch die Außenstehende die separaten Wallet-Adressen einer Person verknüpfen und über Webseiten hinweg verfolgen können, berichtete The Hacker News. Die Ergebnisse erscheinen in einem am 7. Juli auf arXiv veröffentlichten Paper mit dem Titel "The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem".</p>
<p class="fr">Des chercheurs de la KU Leuven en Belgique, membres du groupe de recherche en sécurité DistriNet, ont testé 85 des extensions de portefeuilles crypto basées sur Chrome les plus populaires — desservant ensemble environ 35 millions d'utilisateurs — et ont découvert des failles de conception permettant à des tiers de relier les différentes adresses de portefeuille d'une personne et de la suivre d'un site à l'autre, a rapporté The Hacker News. Les résultats figurent dans un article publié sur arXiv le 7 juillet, intitulé « The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem ».</p>
<p class="pt">Pesquisadores da KU Leuven, na Bélgica, do grupo de pesquisa em segurança DistriNet, testaram 85 das extensões de carteiras cripto baseadas em Chrome mais populares — que juntas atendem cerca de 35 milhões de usuários — e encontraram falhas de design que permitem que terceiros vinculem os diferentes endereços de carteira de uma pessoa e a rastreiem entre sites, informou o The Hacker News. As descobertas aparecem em um artigo publicado no arXiv em 7 de julho, intitulado "The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem".</p>
<p class="tr">Belçika'daki KU Leuven'in güvenlik araştırma grubu DistriNet'ten araştırmacılar, toplamda yaklaşık 35 milyon kullanıcıya hizmet eden en popüler 85 Chrome tabanlı kripto cüzdan eklentisini test etti ve dışarıdaki tarafların bir kişinin farklı cüzdan adreslerini birbirine bağlayıp siteler arasında izlemesine olanak tanıyan tasarım kusurları buldu; haberi The Hacker News duyurdu. Bulgular, 7 Temmuz'da arXiv'e yüklenen ve "The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem" başlıklı bir makalede yer alıyor.</p>
<p class="vi">Các nhà nghiên cứu tại KU Leuven (Bỉ), thuộc nhóm nghiên cứu bảo mật DistriNet, đã kiểm tra 85 tiện ích ví crypto dựa trên Chrome phổ biến nhất — phục vụ tổng cộng khoảng 35 triệu người dùng — và phát hiện các lỗi thiết kế cho phép bên ngoài liên kết các địa chỉ ví khác nhau của một người và theo dõi họ qua các trang web, The Hacker News đưa tin. Kết quả nghiên cứu xuất hiện trong một bài báo đăng trên arXiv ngày 7/7 với tiêu đề "The Masks We (Think We) Wear: Privacy Threats of Browser-Extension Wallets in the Web3 Ecosystem".</p>

<p class="ko">숫자로 보면 심각성이 뚜렷하다. 지갑 17개는 네트워크 계층에서 '구조적 연결가능성' 신호를 유출해 3,500만명 중 2,300만명(65.4%)이 영향을 받았다. 웹 계층에서는 지갑 36개(전체 사용자의 82%)가 새로 발견된 지문 인식(fingerprinting) 방식으로 식별 가능했으며, 이 36개 중 22개는 사용자가 디앱(dApp)에서 로그아웃한 뒤에도 권한을 제대로 회수하지 않아 이미 승인된 주소를 계속 노출시켰다. 이 논문은 7월20~25일 캐나다 캘거리에서 열리는 프라이버시강화기술심포지엄(PETS 2026)에서 발표될 예정이다.</p>
<p class="en">The numbers make the severity concrete. Seventeen wallets leak "structural linkability" signals at the network layer, affecting 23.0 million of the 35 million combined users — 65.4%. At the web layer, 36 wallets, covering 82% of the total user base, are detectable through a newly identified fingerprinting vector. Among those 36, 22 fail to properly revoke wallet permissions after a user logs out of a decentralized app, continuing to expose previously granted addresses. The paper is accepted for presentation at the Privacy Enhancing Technologies Symposium (PETS 2026) in Calgary, Canada, from July 20 to 25.</p>
<p class="ja">数字で見るとその深刻さが具体的になる。ウォレット17種はネットワーク層で『構造的連結可能性』シグナルを漏らし、合計3,500万人のうち2,300万人(65.4%)が影響を受けた。ウェブ層では、ウォレット36種(利用者全体の82%)が新たに特定された指紋(フィンガープリンティング)手法によって識別可能だった。この36種のうち22種は、ユーザーがdApp(分散型アプリ)からログアウトした後も権限を適切に取り消さず、既に付与されたアドレスを露出し続けていた。この論文は7月20~25日にカナダ・カルガリーで開催されるプライバシー強化技術シンポジウム(PETS 2026)で発表される予定だ。</p>
<p class="es">Las cifras hacen concreta la gravedad. Diecisiete billeteras filtran señales de "vinculabilidad estructural" en la capa de red, afectando a 23,0 millones de los 35 millones de usuarios combinados, un 65,4%. En la capa web, 36 billeteras, que cubren el 82% de la base total de usuarios, son detectables mediante un vector de fingerprinting recién identificado. Entre esas 36, 22 no revocan correctamente los permisos de la billetera después de que un usuario cierra sesión en una aplicación descentralizada, continuando así exponiendo direcciones previamente otorgadas. El artículo ha sido aceptado para su presentación en el Simposio de Tecnologías de Mejora de la Privacidad (PETS 2026) en Calgary, Canadá, del 20 al 25 de julio.</p>
<p class="de">Die Zahlen machen den Ernst greifbar. Siebzehn Wallets geben "strukturelle Verknüpfbarkeits"-Signale auf der Netzwerkebene preis und betreffen 23,0 Millionen der insgesamt 35 Millionen Nutzer — 65,4 %. Auf der Web-Ebene sind 36 Wallets, die 82 % der gesamten Nutzerbasis abdecken, durch einen neu identifizierten Fingerprinting-Vektor erkennbar. Von diesen 36 versäumen es 22, Wallet-Berechtigungen ordnungsgemäß zu widerrufen, nachdem sich ein Nutzer von einer dezentralen App abgemeldet hat, und legen weiterhin zuvor gewährte Adressen offen. Das Paper wurde zur Präsentation beim Privacy Enhancing Technologies Symposium (PETS 2026) vom 20. bis 25. Juli in Calgary, Kanada, angenommen.</p>
<p class="fr">Les chiffres rendent la gravité concrète. Dix-sept portefeuilles laissent fuir des signaux de « liabilité structurelle » au niveau réseau, affectant 23,0 millions des 35 millions d'utilisateurs combinés, soit 65,4 %. Au niveau web, 36 portefeuilles, couvrant 82 % de la base d'utilisateurs totale, sont détectables via un vecteur de fingerprinting nouvellement identifié. Parmi ces 36, 22 ne parviennent pas à révoquer correctement les permissions du portefeuille après qu'un utilisateur se déconnecte d'une application décentralisée, continuant ainsi à exposer des adresses précédemment accordées. L'article a été accepté pour présentation au Symposium sur les Technologies Renforçant la Confidentialité (PETS 2026) à Calgary, au Canada, du 20 au 25 juillet.</p>
<p class="pt">Os números tornam a gravidade concreta. Dezessete carteiras vazam sinais de "vinculabilidade estrutural" na camada de rede, afetando 23,0 milhões dos 35 milhões de usuários combinados — 65,4%. Na camada web, 36 carteiras, cobrindo 82% da base total de usuários, são detectáveis por meio de um vetor de fingerprinting recém-identificado. Entre essas 36, 22 não revogam corretamente as permissões da carteira depois que um usuário sai de um aplicativo descentralizado, continuando a expor endereços previamente concedidos. O artigo foi aceito para apresentação no Simpósio de Tecnologias de Aprimoramento de Privacidade (PETS 2026) em Calgary, Canadá, de 20 a 25 de julho.</p>
<p class="tr">Rakamlar ciddiyeti somutlaştırıyor. On yedi cüzdan, ağ katmanında "yapısal bağlanabilirlik" sinyalleri sızdırıyor ve toplam 35 milyon kullanıcının 23,0 milyonunu -yüzde 65,4'ünü- etkiliyor. Web katmanında, toplam kullanıcı tabanının yüzde 82'sini oluşturan 36 cüzdan, yeni tespit edilen bir parmak izi (fingerprinting) vektörüyle tespit edilebiliyor. Bu 36 cüzdandan 22'si, bir kullanıcı bir dApp'ten çıkış yaptıktan sonra cüzdan izinlerini düzgün şekilde iptal etmeyi başaramıyor ve daha önce verilmiş adresleri açığa çıkarmaya devam ediyor. Makale, 20-25 Temmuz tarihleri arasında Kanada'nın Calgary kentinde düzenlenecek Gizlilik Geliştirme Teknolojileri Sempozyumu'nda (PETS 2026) sunulmak üzere kabul edildi.</p>
<p class="vi">Các con số làm cho mức độ nghiêm trọng trở nên cụ thể. Mười bảy ví rò rỉ tín hiệu "khả năng liên kết cấu trúc" ở lớp mạng, ảnh hưởng đến 23,0 triệu trong tổng số 35 triệu người dùng — 65,4%. Ở lớp web, 36 ví, chiếm 82% tổng số người dùng, có thể bị phát hiện thông qua một vector lấy dấu vân tay (fingerprinting) mới được xác định. Trong số 36 ví đó, 22 ví không thu hồi đúng cách quyền truy cập ví sau khi người dùng đăng xuất khỏi một dApp, tiếp tục phơi bày các địa chỉ đã được cấp quyền trước đó. Bài báo đã được chấp nhận trình bày tại Hội nghị chuyên đề về Công nghệ Tăng cường Quyền riêng tư (PETS 2026) tại Calgary, Canada, từ ngày 20 đến 25 tháng 7.</p>

<h2 class="ko">지갑이 어떻게 사용자의 '지문'을 남기는가</h2>
<h2 class="en">How a Wallet Extension Fingerprints You</h2>
<h2 class="ja">ウォレットはどのようにユーザーの『指紋』を残すのか</h2>
<h2 class="es">Cómo una Extensión de Billetera Te Deja "Huellas Dactilares"</h2>
<h2 class="de">Wie eine Wallet-Erweiterung Dich zu einem "Fingerabdruck" Macht</h2>
<h2 class="fr">Comment une Extension de Portefeuille Vous Laisse une « Empreinte »</h2>
<h2 class="pt">Como uma Extensão de Carteira Deixa Sua "Impressão Digital"</h2>
<h2 class="tr">Bir Cüzdan Eklentisi Sizi Nasıl "Parmak İzi" Bırakır</h2>
<h2 class="vi">Một Tiện Ích Ví Để Lại "Dấu Vân Tay" Của Bạn Như Thế Nào</h2>

<p class="ko">문제의 뿌리는 지갑 확장앱이 웹페이지에 심는 '프로바이더 주입(provider injection)' 방식에 있다. 이더리움 계열 지갑 대부분은 EIP-1193 표준에 따라 브라우저에 window.ethereum 같은 전역 객체를 심어두고, 어떤 웹사이트든 이 객체를 조회할 수 있게 한다. 문제는 지갑마다 이 객체의 속성 구조, RPC 메서드 호출 순서, 이벤트 발생 방식이 미묘하게 다르다는 점이다 — 사이트는 사용자가 '연결(connect)'을 명시적으로 승인하지 않아도 이런 미세한 차이만으로 방문자를 구분하는 지문을 만들 수 있다. 이는 2010년대 애드테크 업계에서 쓰이던 캔버스 지문(canvas fingerprinting) 같은 고전적 브라우저 추적 기법과 원리는 같지만, 크립토 지갑은 익명 광고 ID보다 훨씬 민감한 데이터 — 온체인에서 영구적으로 연결 가능한 지갑 주소 — 를 함께 노출한다는 점에서 위험도가 다르다.</p>
<p class="en">The root of the problem lies in "provider injection," the mechanism by which wallet extensions embed themselves into web pages. Most Ethereum-family wallets follow the EIP-1193 standard, injecting a global object like window.ethereum into the browser that any website's page script can query. The issue is that each wallet implements that object's property structure, RPC method-call ordering, and event-emission behavior with subtle differences — a site can build a fingerprint distinguishing visitors purely from those quirks, without ever needing an explicit "connect" approval from the user. That's the same underlying principle as classic browser-tracking techniques like canvas fingerprinting from the 2010s ad-tech era, but the risk profile differs because a crypto wallet additionally exposes far more sensitive data than an anonymous ad ID — a wallet address, a permanent identifier linkable forever on-chain.</p>
<p class="ja">問題の根源は、ウォレット拡張機能がウェブページに埋め込む『プロバイダー注入(provider injection)』という仕組みにある。イーサリアム系ウォレットの大半はEIP-1193規格に従い、window.ethereumのようなグローバルオブジェクトをブラウザに埋め込み、どのウェブサイトもこのオブジェクトを照会できるようにしている。問題は、ウォレットごとにこのオブジェクトのプロパティ構造、RPCメソッド呼び出しの順序、イベント発生の挙動が微妙に異なる点だ——サイトは、ユーザーが明示的に『接続(connect)』を承認しなくても、こうした微細な違いだけで訪問者を識別する指紋を作ることができる。これは2010年代のアドテック業界で使われていたキャンバス指紋(canvas fingerprinting)のような古典的なブラウザ追跡手法と原理は同じだが、暗号資産ウォレットは匿名の広告IDよりもはるかに機微なデータ——オンチェーンで永続的に紐付け可能なウォレットアドレス——も同時に晒すという点でリスクの度合いが異なる。</p>
<p class="es">La raíz del problema está en la "inyección de proveedor", el mecanismo mediante el cual las extensiones de billetera se incrustan en las páginas web. La mayoría de las billeteras de la familia Ethereum siguen el estándar EIP-1193, inyectando un objeto global como window.ethereum en el navegador que cualquier script de página de un sitio web puede consultar. El problema es que cada billetera implementa la estructura de propiedades de ese objeto, el orden de llamadas a métodos RPC y el comportamiento de emisión de eventos con sutiles diferencias: un sitio puede construir una huella digital que distinga a los visitantes basándose puramente en esas peculiaridades, sin necesitar nunca una aprobación explícita de "conexión" del usuario. Es el mismo principio subyacente que las técnicas clásicas de rastreo del navegador, como el fingerprinting de canvas de la era del ad-tech de los años 2010, pero el perfil de riesgo difiere porque una billetera cripto expone además datos mucho más sensibles que un ID de anuncio anónimo: una dirección de billetera, un identificador permanente vinculable para siempre on-chain.</p>
<p class="de">Die Wurzel des Problems liegt in der "Provider-Injektion", dem Mechanismus, mit dem sich Wallet-Erweiterungen in Webseiten einbetten. Die meisten Wallets der Ethereum-Familie folgen dem EIP-1193-Standard und injizieren ein globales Objekt wie window.ethereum in den Browser, das jedes Website-Skript abfragen kann. Das Problem ist, dass jede Wallet die Eigenschaftsstruktur dieses Objekts, die Reihenfolge der RPC-Methodenaufrufe und das Ereignis-Emissionsverhalten mit subtilen Unterschieden implementiert — eine Website kann allein aus diesen Eigenheiten einen Fingerabdruck erstellen, der Besucher unterscheidet, ohne je eine explizite "Connect"-Zustimmung des Nutzers zu benötigen. Das ist dasselbe zugrunde liegende Prinzip wie klassische Browser-Tracking-Techniken, etwa Canvas-Fingerprinting aus der Ad-Tech-Ära der 2010er-Jahre, doch das Risikoprofil unterscheidet sich, weil eine Krypto-Wallet zusätzlich weitaus sensiblere Daten preisgibt als eine anonyme Werbe-ID — eine Wallet-Adresse, einen dauerhaften, für immer on-chain verknüpfbaren Identifikator.</p>
<p class="fr">La racine du problème réside dans « l'injection de fournisseur », le mécanisme par lequel les extensions de portefeuille s'intègrent dans les pages web. La plupart des portefeuilles de la famille Ethereum suivent la norme EIP-1193, injectant un objet global comme window.ethereum dans le navigateur, que le script de n'importe quelle page de site peut interroger. Le problème est que chaque portefeuille implémente la structure de propriétés de cet objet, l'ordre des appels de méthodes RPC et le comportement d'émission d'événements avec de subtiles différences — un site peut construire une empreinte distinguant les visiteurs uniquement à partir de ces particularités, sans jamais avoir besoin d'une approbation explicite de « connexion » de l'utilisateur. C'est le même principe sous-jacent que les techniques classiques de suivi de navigateur comme le fingerprinting de canvas de l'ère de l'ad-tech des années 2010, mais le profil de risque diffère car un portefeuille crypto expose en plus des données bien plus sensibles qu'un identifiant publicitaire anonyme — une adresse de portefeuille, un identifiant permanent reliable pour toujours on-chain.</p>
<p class="pt">A raiz do problema está na "injeção de provedor", o mecanismo pelo qual as extensões de carteira se incorporam às páginas da web. A maioria das carteiras da família Ethereum segue o padrão EIP-1193, injetando um objeto global como window.ethereum no navegador, que o script de qualquer site pode consultar. O problema é que cada carteira implementa a estrutura de propriedades desse objeto, a ordem de chamadas de métodos RPC e o comportamento de emissão de eventos com diferenças sutis — um site pode construir uma impressão digital que distingue visitantes puramente a partir dessas peculiaridades, sem nunca precisar de uma aprovação explícita de "conexão" do usuário. Esse é o mesmo princípio subjacente das técnicas clássicas de rastreamento de navegador, como o fingerprinting de canvas da era do ad-tech dos anos 2010, mas o perfil de risco difere porque uma carteira cripto expõe adicionalmente dados muito mais sensíveis do que um ID de anúncio anônimo — um endereço de carteira, um identificador permanente vinculável para sempre on-chain.</p>
<p class="tr">Sorunun kökü, cüzdan eklentilerinin web sayfalarına kendilerini gömme mekanizması olan "sağlayıcı enjeksiyonu"nda yatıyor. Ethereum ailesi cüzdanların çoğu EIP-1193 standardını izleyerek, herhangi bir web sitesinin sayfa betiğinin sorgulayabileceği window.ethereum gibi küresel bir nesneyi tarayıcıya enjekte eder. Sorun, her cüzdanın bu nesnenin özellik yapısını, RPC yöntem çağırma sırasını ve olay yayma davranışını ince farklılıklarla uygulamasıdır -bir site, kullanıcıdan hiçbir zaman açık bir "bağlan" onayı almadan, sadece bu tuhaflıklardan ziyaretçileri ayırt eden bir parmak izi oluşturabilir. Bu, 2010'ların reklam teknolojisi çağından kalma canvas parmak izi gibi klasik tarayıcı izleme tekniklerindeki aynı temel ilkedir, ancak risk profili farklıdır çünkü bir kripto cüzdanı ayrıca anonim bir reklam kimliğinden çok daha hassas veriler açığa çıkarır -zincir üzerinde sonsuza kadar bağlanabilir kalıcı bir tanımlayıcı olan cüzdan adresi.</p>
<p class="vi">Gốc rễ của vấn đề nằm ở "tiêm nhà cung cấp" (provider injection), cơ chế mà các tiện ích ví tự nhúng vào các trang web. Hầu hết các ví thuộc họ Ethereum tuân theo tiêu chuẩn EIP-1193, tiêm một đối tượng toàn cục như window.ethereum vào trình duyệt mà bất kỳ script trang nào của trang web cũng có thể truy vấn. Vấn đề là mỗi ví triển khai cấu trúc thuộc tính của đối tượng đó, thứ tự gọi phương thức RPC và hành vi phát sự kiện với những khác biệt tinh vi — một trang web có thể xây dựng dấu vân tay phân biệt khách truy cập hoàn toàn từ những đặc điểm riêng đó, mà không bao giờ cần sự chấp thuận "kết nối" rõ ràng từ người dùng. Đó là cùng nguyên tắc nền tảng như các kỹ thuật theo dõi trình duyệt cổ điển như lấy dấu vân tay canvas từ thời kỳ ad-tech những năm 2010, nhưng hồ sơ rủi ro khác biệt vì một ví crypto còn phơi bày dữ liệu nhạy cảm hơn nhiều so với một ID quảng cáo ẩn danh — một địa chỉ ví, một định danh vĩnh viễn có thể liên kết mãi mãi trên chuỗi.</p>

<p class="ko">두 번째 계층은 네트워크 층위의 유출이다. 일부 지갑은 잔액이나 RPC 조회를 디앱을 거치지 않고 자체 기본 노드나 인프라 제공업체로 직접 쏘아 보낸다. 이 경우 그 인프라 제공업체는 사용자가 어떤 사이트에서도 '연결'을 승인한 적이 없어도, 방문한 모든 사이트에 걸쳐 IP 주소와 지갑 주소를 상시로 대조할 수 있게 된다. 이는 웹사이트 자체가 아니라 지갑이 의존하는 백엔드 인프라가 추적 지점이 된다는 뜻이며, 사용자가 아무리 개별 디앱의 프라이버시 정책을 신뢰해도 통제할 수 없는 층위에서 발생한다는 점에서 기존의 '디앱을 조심하라'는 통상적 보안 조언이 닿지 않는 사각지대다.</p>
<p class="en">The second layer is a network-layer leak. Some wallets route balance and RPC queries directly to their own default node or infrastructure provider without the dApp acting as an intermediary. In that case, the infrastructure provider can correlate a user's IP address with their wallet address across every site visited, continuously, even when the user never explicitly approved a "connect" on any of those sites. That means the tracking point sits in the wallet's own backend infrastructure rather than the website itself — a blind spot that ordinary security advice like "be careful which dApp you trust" doesn't reach, because it operates at a layer users have no visibility into or control over.</p>
<p class="ja">第二の層はネットワーク層での漏洩だ。一部のウォレットは残高やRPC照会を、dAppを仲介させずに自社の既定ノードやインフラプロバイダーへ直接送っている。この場合、インフラプロバイダーは、ユーザーがどのサイトでも一度も明示的に『接続』を承認していなくても、訪問したすべてのサイトにわたってIPアドレスとウォレットアドレスを常時照合できてしまう。これは追跡ポイントがウェブサイト自体ではなく、ウォレットが依存するバックエンドインフラにあることを意味し、ユーザーが個々のdAppのプライバシーポリシーをどれだけ信頼していても制御できない層で発生するという点で、『どのdAppを信頼するか気をつけろ』という通常のセキュリティ助言が届かない死角だ。</p>
<p class="es">La segunda capa es una fuga a nivel de red. Algunas billeteras enrutan las consultas de saldo y RPC directamente a su propio nodo predeterminado o proveedor de infraestructura sin que la dApp actúe como intermediaria. En ese caso, el proveedor de infraestructura puede correlacionar la dirección IP de un usuario con su dirección de billetera en todos los sitios visitados, de forma continua, incluso cuando el usuario nunca aprobó explícitamente una "conexión" en ninguno de esos sitios. Eso significa que el punto de rastreo se sitúa en la infraestructura backend propia de la billetera en lugar de en el sitio web en sí, un punto ciego que el consejo de seguridad habitual, como "ten cuidado en qué dApp confías", no alcanza, porque opera en una capa sobre la que los usuarios no tienen visibilidad ni control.</p>
<p class="de">Die zweite Ebene ist ein Leck auf Netzwerkebene. Manche Wallets leiten Guthaben- und RPC-Abfragen direkt an ihren eigenen Standard-Node oder Infrastrukturanbieter weiter, ohne dass die dApp als Vermittler fungiert. In diesem Fall kann der Infrastrukturanbieter die IP-Adresse eines Nutzers durchgehend mit dessen Wallet-Adresse über jede besuchte Website hinweg korrelieren, selbst wenn der Nutzer auf keiner dieser Seiten je explizit eine "Connect"-Zustimmung gegeben hat. Das bedeutet, der Verfolgungspunkt liegt in der eigenen Backend-Infrastruktur der Wallet statt auf der Website selbst — ein blinder Fleck, den der übliche Sicherheitsratschlag "sei vorsichtig, welcher dApp du vertraust" nicht erreicht, weil er auf einer Ebene operiert, die für Nutzer weder einsehbar noch kontrollierbar ist.</p>
<p class="fr">La deuxième couche est une fuite au niveau réseau. Certains portefeuilles acheminent les requêtes de solde et RPC directement vers leur propre nœud par défaut ou fournisseur d'infrastructure sans que la dApp n'agisse comme intermédiaire. Dans ce cas, le fournisseur d'infrastructure peut corréler l'adresse IP d'un utilisateur avec son adresse de portefeuille sur chaque site visité, en continu, même lorsque l'utilisateur n'a jamais explicitement approuvé une « connexion » sur aucun de ces sites. Cela signifie que le point de suivi se situe dans l'infrastructure backend propre du portefeuille plutôt que sur le site web lui-même — un angle mort que le conseil de sécurité habituel, comme « faites attention à la dApp à laquelle vous faites confiance », n'atteint pas, car il opère à un niveau sur lequel les utilisateurs n'ont ni visibilité ni contrôle.</p>
<p class="pt">A segunda camada é um vazamento na camada de rede. Algumas carteiras encaminham consultas de saldo e RPC diretamente para seu próprio nó padrão ou provedor de infraestrutura sem que o dApp atue como intermediário. Nesse caso, o provedor de infraestrutura pode correlacionar o endereço IP de um usuário com seu endereço de carteira em todos os sites visitados, continuamente, mesmo quando o usuário nunca aprovou explicitamente uma "conexão" em nenhum desses sites. Isso significa que o ponto de rastreamento está na própria infraestrutura de backend da carteira, e não no próprio site — um ponto cego que o conselho de segurança comum, como "tome cuidado com qual dApp você confia", não alcança, porque opera em uma camada sobre a qual os usuários não têm visibilidade nem controle.</p>
<p class="tr">İkinci katman bir ağ katmanı sızıntısıdır. Bazı cüzdanlar, bakiye ve RPC sorgularını dApp aracı olmadan doğrudan kendi varsayılan düğümlerine veya altyapı sağlayıcılarına yönlendirir. Bu durumda, altyapı sağlayıcısı, kullanıcı bu sitelerin hiçbirinde açıkça bir "bağlan" onayı vermemiş olsa bile, ziyaret edilen her sitede kullanıcının IP adresini cüzdan adresiyle sürekli olarak ilişkilendirebilir. Bu, izleme noktasının web sitesinin kendisinde değil, cüzdanın kendi arka uç altyapısında bulunduğu anlamına gelir -kullanıcıların ne görünürlüğe ne de kontrole sahip olduğu bir katmanda çalıştığı için "hangi dApp'e güvendiğinize dikkat edin" gibi olağan güvenlik tavsiyesinin ulaşamadığı bir kör nokta.</p>
<p class="vi">Lớp thứ hai là rò rỉ ở lớp mạng. Một số ví định tuyến truy vấn số dư và RPC trực tiếp đến node mặc định hoặc nhà cung cấp hạ tầng riêng của mình mà không qua dApp làm trung gian. Trong trường hợp đó, nhà cung cấp hạ tầng có thể liên kết địa chỉ IP của người dùng với địa chỉ ví của họ trên mọi trang web đã truy cập, liên tục, ngay cả khi người dùng chưa bao giờ phê duyệt rõ ràng "kết nối" trên bất kỳ trang nào trong số đó. Điều đó có nghĩa là điểm theo dõi nằm ở hạ tầng backend của chính ví thay vì bản thân trang web — một điểm mù mà lời khuyên bảo mật thông thường như "hãy cẩn thận với dApp bạn tin tưởng" không thể chạm tới, vì nó hoạt động ở một lớp mà người dùng không có khả năng nhìn thấy hay kiểm soát.</p>

<h2 class="ko">벤더 대응이 엇갈린 이유 — 셋은 고쳤고, 메타마스크는 '알려진 이슈'라 답했다</h2>
<h2 class="en">Why Vendors Responded Differently — Three Fixed It, MetaMask Called It a Known Issue</h2>
<h2 class="ja">ベンダーの対応が分かれた理由——3社は修正、メタマスクは『既知の問題』と回答</h2>
<h2 class="es">Por Qué los Proveedores Respondieron de Forma Distinta: Tres lo Corrigieron, MetaMask lo Llamó un Problema Conocido</h2>
<h2 class="de">Warum Anbieter Unterschiedlich Reagierten — Drei Behoben, MetaMask Nannte es ein Bekanntes Problem</h2>
<h2 class="fr">Pourquoi les Fournisseurs Ont Réagi Différemment — Trois l'Ont Corrigé, MetaMask l'a Qualifié de Problème Connu</h2>
<h2 class="pt">Por Que os Fornecedores Responderam de Forma Diferente — Três Corrigiram, a MetaMask Chamou de Problema Conhecido</h2>
<h2 class="tr">Satıcılar Neden Farklı Tepki Verdi — Üçü Düzeltti, MetaMask Bilinen Bir Sorun Dedi</h2>
<h2 class="vi">Tại Sao Các Nhà Cung Cấp Phản Ứng Khác Nhau — Ba Ví Đã Khắc Phục, MetaMask Gọi Đây Là Vấn Đề Đã Biết</h2>

<p class="ko">벤더별 대응은 크게 갈렸다. 2026년 2월 재검증 시점까지 코인베이스월렛과 코인98은 이미 결함을 수정했고, 하나월렛(Hana Wallet)은 이후 수정을 완료했다. 반면 버그바운티 프로그램을 통해 회신한 8개 벤더 중 대다수는 이를 정식 버그로 인정하지 않았다. 특히 메타마스크는 이를 '알려진 이슈'라 부르며 신고를 중복 항목으로 종결했고, 프로바이더 주입을 중단할 즉각적 계획이 없다고 답했다 — 그렇게 하면 기존 디앱 상당수가 작동하지 않게 되기 때문이라는 이유였다.</p>
<p class="en">Vendor responses split sharply. By a February 2026 retest, Coinbase Wallet and Coin98 had already fixed the flaw, and Hana Wallet did so later. Of eight vendors that replied through bug bounty programs, however, most declined to treat it as a valid bug. MetaMask in particular called it a "known issue," closed the report as a duplicate, and said it had no immediate plan to stop injecting its provider — because doing so would break too many existing dApps.</p>
<p class="ja">ベンダー各社の対応は大きく分かれた。2026年2月の再検証時点で、コインベースウォレットとCoin98はすでに欠陥を修正しており、ハナウォレット(Hana Wallet)もその後修正を完了した。一方、バグバウンティプログラムを通じて回答した8社のベンダーのうち、大半はこれを正式なバグとして認めなかった。特にメタマスクはこれを『既知の問題』と呼び、報告を重複案件として終了させ、プロバイダー注入を止める即座の計画はないと答えた——そうすれば既存のdAppの多くが動かなくなるためだという理由からだ。</p>
<p class="es">Las respuestas de los proveedores se dividieron marcadamente. Para una nueva prueba en febrero de 2026, Coinbase Wallet y Coin98 ya habían corregido el fallo, y Hana Wallet lo hizo más tarde. Sin embargo, de ocho proveedores que respondieron a través de programas de recompensas por errores, la mayoría se negó a tratarlo como un fallo válido. MetaMask, en particular, lo calificó de "problema conocido", cerró el informe como duplicado y dijo que no tenía un plan inmediato para dejar de inyectar su proveedor, porque hacerlo rompería demasiadas dApps existentes.</p>
<p class="de">Die Reaktionen der Anbieter fielen stark unterschiedlich aus. Bei einem erneuten Test im Februar 2026 hatten Coinbase Wallet und Coin98 den Fehler bereits behoben, Hana Wallet tat dies später. Von acht Anbietern, die über Bug-Bounty-Programme antworteten, lehnte jedoch die Mehrheit ab, es als gültigen Fehler zu behandeln. MetaMask insbesondere nannte es ein "bekanntes Problem", schloss den Bericht als Duplikat und erklärte, es habe keinen unmittelbaren Plan, die Injektion seines Providers zu stoppen — weil dies zu viele bestehende dApps beschädigen würde.</p>
<p class="fr">Les réponses des fournisseurs se sont fortement divisées. Lors d'un nouveau test en février 2026, Coinbase Wallet et Coin98 avaient déjà corrigé la faille, et Hana Wallet l'a fait plus tard. Cependant, parmi huit fournisseurs ayant répondu via des programmes de bug bounty, la plupart ont refusé de la traiter comme un bug valide. MetaMask, en particulier, l'a qualifiée de « problème connu », a clos le rapport comme doublon, et a déclaré n'avoir aucun plan immédiat pour cesser d'injecter son fournisseur — car cela casserait trop de dApps existantes.</p>
<p class="pt">As respostas dos fornecedores se dividiram fortemente. Em um novo teste em fevereiro de 2026, Coinbase Wallet e Coin98 já haviam corrigido a falha, e a Hana Wallet o fez depois. No entanto, de oito fornecedores que responderam por meio de programas de recompensa por bugs, a maioria se recusou a tratá-la como um bug válido. A MetaMask, em particular, a chamou de "problema conhecido", encerrou o relatório como duplicado e disse não ter plano imediato de parar de injetar seu provedor — porque isso quebraria muitos dApps existentes.</p>
<p class="tr">Satıcı tepkileri keskin biçimde ayrıştı. Şubat 2026'daki yeniden testte, Coinbase Wallet ve Coin98 kusuru zaten düzeltmişti ve Hana Wallet bunu daha sonra yaptı. Ancak hata ödül programları aracılığıyla yanıt veren sekiz satıcıdan çoğu, bunu geçerli bir hata olarak ele almayı reddetti. Özellikle MetaMask bunu "bilinen bir sorun" olarak adlandırdı, raporu tekrar eden bir kayıt olarak kapattı ve sağlayıcısını enjekte etmeyi durdurmak için acil bir planı olmadığını söyledi -çünkü bunu yapmak mevcut birçok dApp'i bozardı.</p>
<p class="vi">Phản ứng của các nhà cung cấp có sự phân hóa rõ rệt. Đến đợt kiểm tra lại vào tháng 2/2026, Coinbase Wallet và Coin98 đã khắc phục lỗ hổng, còn Hana Wallet làm điều đó sau đó. Tuy nhiên, trong số tám nhà cung cấp phản hồi qua các chương trình thưởng lỗi bug bounty, hầu hết từ chối coi đây là lỗi hợp lệ. Đặc biệt, MetaMask gọi đây là "vấn đề đã biết", đóng báo cáo với lý do trùng lặp, và cho biết không có kế hoạch ngay lập tức để ngừng tiêm nhà cung cấp của mình — vì làm vậy sẽ phá vỡ quá nhiều dApp hiện có.</p>

<p class="ko">다만 메타마스크의 소극적 태도가 단순한 안일함만은 아닐 수 있다는 반론도 있다. 이런 지문 인식 위험을 근본적으로 없애기 위해 이미 수년 전 EIP-6963이라는 표준이 마련됐다 — 여러 지갑이 기존의 전역 window.ethereum 주입 방식 없이도 공존할 수 있게 하는 규격이다. 문제는 디앱 생태계 전반의 채택이 아직 완전하지 않다는 점이다. 만약 메타마스크가 레거시 주입 방식을 갑작스레 없앤다면, 하룻밤 사이에 상당수 기존 디앱에서 사용자 접속이 끊길 수 있다. 이는 단순한 '고칠 의지가 없다'는 문제가 아니라, 프라이버시와 하위호환성 사이의 실질적인 엔지니어링 트레이드오프에 가깝다.</p>
<p class="en">There is a counterargument, though, that MetaMask's reluctance isn't necessarily just complacency. A standard called EIP-6963 was designed years ago specifically to eliminate this fingerprinting risk at the root — it lets multiple wallets coexist without the legacy global window.ethereum injection pattern. The problem is that adoption across the broader dApp ecosystem remains incomplete. If MetaMask abruptly removed legacy injection, a large share of existing dApps could lose user access overnight. That isn't simply "unwillingness to fix a bug" — it's a genuine engineering trade-off between privacy and backward compatibility.</p>
<p class="ja">ただし、メタマスクの消極的な姿勢が単なる怠慢とは限らないという反論もある。この指紋認識リスクを根本から取り除くため、EIP-6963という規格がすでに数年前に策定されている——これは複数のウォレットが従来の全域的なwindow.ethereum注入方式なしに共存できるようにする規格だ。問題は、dAppエコシステム全体での採用がまだ完全ではないことにある。もしメタマスクがレガシーな注入方式を突然取り除けば、既存の多くのdAppでユーザーのアクセスが一夜にして失われかねない。これは単に『修正する意志がない』という問題ではなく、プライバシーと後方互換性の間の実質的なエンジニアリング上のトレードオフに近い。</p>
<p class="es">Sin embargo, hay un contraargumento: la reticencia de MetaMask no es necesariamente solo complacencia. Un estándar llamado EIP-6963 fue diseñado años atrás específicamente para eliminar este riesgo de fingerprinting de raíz: permite que múltiples billeteras coexistan sin el patrón heredado de inyección global de window.ethereum. El problema es que la adopción en todo el ecosistema de dApps más amplio sigue siendo incompleta. Si MetaMask eliminara abruptamente la inyección heredada, una gran parte de las dApps existentes podría perder el acceso de los usuarios de la noche a la mañana. Eso no es simplemente "falta de voluntad para corregir un fallo": es una compensación de ingeniería genuina entre privacidad y compatibilidad con versiones anteriores.</p>
<p class="de">Es gibt jedoch ein Gegenargument, dass MetaMasks Zurückhaltung nicht unbedingt nur Selbstgefälligkeit ist. Ein Standard namens EIP-6963 wurde bereits vor Jahren speziell entwickelt, um dieses Fingerprinting-Risiko an der Wurzel zu beseitigen — er erlaubt es mehreren Wallets, ohne das veraltete globale window.ethereum-Injektionsmuster nebeneinander zu existieren. Das Problem ist, dass die Akzeptanz im breiteren dApp-Ökosystem noch unvollständig ist. Würde MetaMask die alte Injektion abrupt entfernen, könnte ein Großteil bestehender dApps über Nacht den Nutzerzugriff verlieren. Das ist nicht einfach "Unwilligkeit, einen Fehler zu beheben" — es ist ein echter technischer Kompromiss zwischen Datenschutz und Abwärtskompatibilität.</p>
<p class="fr">Il existe cependant un contre-argument selon lequel la réticence de MetaMask n'est pas nécessairement de la simple complaisance. Une norme appelée EIP-6963 a été conçue il y a des années spécifiquement pour éliminer ce risque de fingerprinting à la racine — elle permet à plusieurs portefeuilles de coexister sans le schéma d'injection globale héritée window.ethereum. Le problème est que l'adoption dans l'ensemble de l'écosystème dApp plus large reste incomplète. Si MetaMask supprimait brusquement l'injection héritée, une grande partie des dApps existantes pourrait perdre l'accès des utilisateurs du jour au lendemain. Ce n'est pas simplement une « réticence à corriger un bug » — c'est un véritable compromis d'ingénierie entre confidentialité et rétrocompatibilité.</p>
<p class="pt">Há, porém, um contra-argumento de que a relutância da MetaMask não é necessariamente apenas acomodação. Um padrão chamado EIP-6963 foi projetado anos atrás especificamente para eliminar esse risco de fingerprinting pela raiz — ele permite que múltiplas carteiras coexistam sem o padrão legado de injeção global window.ethereum. O problema é que a adoção em todo o ecossistema de dApps mais amplo permanece incompleta. Se a MetaMask removesse abruptamente a injeção legada, uma grande parcela dos dApps existentes poderia perder o acesso dos usuários da noite para o dia. Isso não é simplesmente "falta de vontade de corrigir um bug" — é uma verdadeira contrapartida de engenharia entre privacidade e compatibilidade retroativa.</p>
<p class="tr">Yine de MetaMask'ın isteksizliğinin illa da sadece rehavet olmadığına dair bir karşı argüman var. EIP-6963 adlı bir standart, yıllar önce özellikle bu parmak izi riskini kökünden ortadan kaldırmak için tasarlandı -bu standart, eski küresel window.ethereum enjeksiyon modeli olmadan birden fazla cüzdanın bir arada var olmasına izin veriyor. Sorun, daha geniş dApp ekosistemindeki benimsemenin hâlâ tamamlanmamış olmasıdır. MetaMask eski enjeksiyonu aniden kaldırsaydı, mevcut dApp'lerin büyük bir kısmı bir gecede kullanıcı erişimini kaybedebilirdi. Bu basitçe "bir hatayı düzeltme isteksizliği" değil -gizlilik ile geriye dönük uyumluluk arasında gerçek bir mühendislik ödünleşimi.</p>
<p class="vi">Tuy nhiên, cũng có lập luận phản biện rằng sự miễn cưỡng của MetaMask không hẳn chỉ là sự tự mãn. Một tiêu chuẩn có tên EIP-6963 đã được thiết kế từ nhiều năm trước với mục đích cụ thể là loại bỏ tận gốc rủi ro lấy dấu vân tay này — nó cho phép nhiều ví cùng tồn tại mà không cần mô hình tiêm window.ethereum toàn cục kiểu cũ. Vấn đề là việc áp dụng trên toàn bộ hệ sinh thái dApp rộng lớn hơn vẫn chưa hoàn thiện. Nếu MetaMask đột ngột loại bỏ cơ chế tiêm kiểu cũ, một phần lớn các dApp hiện có có thể mất quyền truy cập của người dùng chỉ sau một đêm. Đó không đơn thuần là "không muốn sửa lỗi" — đó là một sự đánh đổi kỹ thuật thực sự giữa quyền riêng tư và khả năng tương thích ngược.</p>

<div class="ko">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">지갑 확장앱 85개 분석 결과</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="21" font-weight="800">85개</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">분석 대상 지갑</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="21" font-weight="800">3,500만</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">합산 사용자 수</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="21" font-weight="800">65.4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">네트워크 계층 노출</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="21" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">웹 계층 지문인식 가능</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">36개 지문인식 가능 지갑 중 권한 회수 실패 비율</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">회수 실패 (22개)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">로그아웃 후에도</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">이전 승인 주소 계속 노출</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">36개 중 61%</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">벤더 대응</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">코인베이스월렛·코인98: 수정 완료</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">하나월렛: 이후 수정</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">메타마스크: 알려진 이슈, 수정 계획 없음</text>
    <text x="20" y="386" fill="#52525b" font-size="12">출처: KU루벤대 디스트리넷, 더해커뉴스, PETS 2026 논문</text>
  </g>
</svg>
</div>
<div class="en">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Findings From Testing 85 Wallet Extensions</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="21" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">wallets tested</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="21" font-weight="800">35M</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">combined users</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="21" font-weight="800">65.4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">exposed, network layer</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="21" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">fingerprintable, web layer</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">Of 36 fingerprintable wallets, share failing to revoke permission</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Revocation failure (22 wallets)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Keep exposing addresses</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">granted before logout</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% of the 36</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Vendor response</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: fixed</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: fixed later</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: known issue, no fix planned</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Sources: KU Leuven DistriNet, The Hacker News, PETS 2026 paper</text>
  </g>
</svg>
</div>
<div class="ja">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">ウォレット拡張85種の検証結果</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85種</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">検証対象ウォレット</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">3,500万</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">合計利用者数</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65.4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">ネットワーク層で露出</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">ウェブ層で指紋認識可能</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">指紋認識可能な36種のうち権限回収に失敗した割合</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">回収失敗(22種)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">ログアウト後も</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">既承認アドレスを露出し続ける</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">36種中61%</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">ベンダー対応</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">コインベースウォレット・Coin98: 修正済み</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">ハナウォレット: 後に修正</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">メタマスク: 既知の問題、修正予定なし</text>
    <text x="20" y="386" fill="#52525b" font-size="12">出典: KUルーヴェン大学DistriNet、ザ・ハッカーニュース、PETS 2026論文</text>
  </g>
</svg>
</div>
<div class="es">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Resultados de Probar 85 Extensiones de Billetera</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">billeteras probadas</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35M</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">usuarios combinados</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65.4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">expuesto, capa de red</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">rastreable, capa web</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">De 36 billeteras rastreables, proporción que no revoca permisos</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Fallo de revocación (22)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Siguen exponiendo direcciones</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">concedidas antes del cierre de sesión</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% de las 36</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Respuesta de proveedores</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: corregido</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: corregido después</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: problema conocido, sin corrección</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Fuentes: KU Leuven DistriNet, The Hacker News, artículo PETS 2026</text>
  </g>
</svg>
</div>
<div class="de">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Ergebnisse aus dem Test von 85 Wallet-Erweiterungen</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">getestete Wallets</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35 Mio.</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">Nutzer insgesamt</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65,4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">Netzwerkebene betroffen</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">Web-Ebene verfolgbar</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">Von 36 verfolgbaren Wallets, Anteil ohne Rechte-Widerruf</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Widerruf fehlgeschlagen (22)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Adressen bleiben offengelegt</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">nach dem Abmelden</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% der 36</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Anbieterreaktion</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: behoben</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: später behoben</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: bekanntes Problem, kein Fix geplant</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Quellen: KU Leuven DistriNet, The Hacker News, PETS-2026-Paper</text>
  </g>
</svg>
</div>
<div class="fr">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Résultats des Tests sur 85 Extensions de Portefeuille</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">portefeuilles testés</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35M</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">utilisateurs combinés</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65,4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">exposés, couche réseau</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">traçables, couche web</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">Sur 36 portefeuilles traçables, part sans révocation des permissions</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Échec de révocation (22)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Continuent d'exposer les adresses</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">accordées avant déconnexion</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% des 36</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Réponse des fournisseurs</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98 : corrigé</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet : corrigé plus tard</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask : problème connu, aucun correctif prévu</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Sources : KU Leuven DistriNet, The Hacker News, article PETS 2026</text>
  </g>
</svg>
</div>
<div class="pt">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">Resultados dos Testes em 85 Extensões de Carteira</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">carteiras testadas</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35M</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">usuários combinados</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65,4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">expostos, camada de rede</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">rastreáveis, camada web</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">Das 36 carteiras rastreáveis, parcela sem revogação de permissão</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Falha na revogação (22)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Continuam expondo endereços</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">concedidos antes do logout</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% das 36</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Resposta dos fornecedores</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: corrigido</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: corrigido depois</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: problema conhecido, sem correção prevista</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Fontes: KU Leuven DistriNet, The Hacker News, artigo PETS 2026</text>
  </g>
</svg>
</div>
<div class="tr">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">85 Cüzdan Eklentisi Testinin Sonuçları</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">test edilen cüzdan</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35M</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">toplam kullanıcı</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">%65,4</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">ağ katmanında açık</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">%82</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">web katmanında izlenebilir</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">İzlenebilir 36 cüzdandan izin iptalinde başarısız olanların payı</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">İptal başarısız (22)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Çıkıştan önce verilen adresleri</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">açığa çıkarmaya devam ediyor</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">36'nın %61'i</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Satıcı tepkisi</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: düzeltildi</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: sonra düzeltildi</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: bilinen sorun, düzeltme planı yok</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Kaynaklar: KU Leuven DistriNet, The Hacker News, PETS 2026 makalesi</text>
  </g>
</svg>
</div>
<div class="vi">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Kết Quả Kiểm Tra 85 Tiện Ích Ví</text>
  <g font-family="sans-serif">
    <rect x="20" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="99" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">85</text>
    <text x="99" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">ví được kiểm tra</text>
    <rect x="188" y="52" width="158" height="86" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1.3"/>
    <text x="267" y="88" fill="#fafafa" text-anchor="middle" font-size="20" font-weight="800">35 triệu</text>
    <text x="267" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">người dùng tổng cộng</text>
    <rect x="356" y="52" width="158" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="435" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">65,4%</text>
    <text x="435" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">lộ ở lớp mạng</text>
    <rect x="524" y="52" width="156" height="86" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.6"/>
    <text x="602" y="88" fill="#f87171" text-anchor="middle" font-size="20" font-weight="800">82%</text>
    <text x="602" y="114" fill="#a1a1aa" text-anchor="middle" font-size="13">bị lấy dấu vân tay, lớp web</text>
    <line x1="20" y1="156" x2="680" y2="156" stroke="#27272a" stroke-width="1"/>
    <text x="20" y="184" fill="#e4e4e7" font-size="14" font-weight="700">Trong 36 ví bị lấy dấu vân tay, tỷ lệ không thu hồi quyền</text>
    <rect x="20" y="202" width="320" height="158" rx="10" fill="#2a1414" stroke="#ef4444" stroke-width="1.4"/>
    <text x="180" y="228" fill="#f87171" text-anchor="middle" font-size="14" font-weight="700">Thu hồi thất bại (22 ví)</text>
    <text x="40" y="256" fill="#e4e4e7" font-size="13">Tiếp tục phơi bày địa chỉ</text>
    <text x="40" y="280" fill="#e4e4e7" font-size="13">đã cấp trước khi đăng xuất</text>
    <text x="40" y="332" fill="#f87171" font-size="13" font-weight="700">61% trong số 36 ví</text>
    <rect x="360" y="202" width="320" height="158" rx="10" fill="#14311f" stroke="#22c55e" stroke-width="1.4"/>
    <text x="520" y="228" fill="#4ade80" text-anchor="middle" font-size="14" font-weight="700">Phản ứng của nhà cung cấp</text>
    <text x="380" y="256" fill="#e4e4e7" font-size="13">Coinbase Wallet, Coin98: đã khắc phục</text>
    <text x="380" y="280" fill="#e4e4e7" font-size="13">Hana Wallet: khắc phục sau đó</text>
    <text x="380" y="332" fill="#4ade80" font-size="13" font-weight="700">MetaMask: vấn đề đã biết, không có kế hoạch sửa</text>
    <text x="20" y="386" fill="#52525b" font-size="12">Nguồn: KU Leuven DistriNet, The Hacker News, bài báo PETS 2026</text>
  </g>
</svg>
</div>

<h2 class="ko">숫자가 작아 보여도 무시할 수 없는 이유</h2>
<h2 class="en">Why the Numbers Matter More Than They Look</h2>
<h2 class="ja">数字が小さく見えても無視できない理由</h2>
<h2 class="es">Por Qué las Cifras Importan Más de lo Que Parecen</h2>
<h2 class="de">Warum die Zahlen Mehr Bedeuten, als sie Scheinen</h2>
<h2 class="fr">Pourquoi les Chiffres Comptent Plus Qu'ils N'y Paraissent</h2>
<h2 class="pt">Por Que os Números Importam Mais do que Parecem</h2>
<h2 class="tr">Rakamlar Göründüğünden Neden Daha Önemli</h2>
<h2 class="vi">Tại Sao Các Con Số Quan Trọng Hơn Vẻ Bề Ngoài</h2>

<p class="ko">이번 사건을 최근 발견된 '일 블룸(Ill Bloom)' 취약점이나 트러스트월렛의 크롬 확장앱 침해 사고 같은, 시드 문구나 자금이 직접 유출된 과거 사례와 비교하면 헤드라인 손실액은 0달러다. 아무도 직접 자금을 도난당하지 않았다. 그러나 위험의 성격 자체가 범주적으로 다르다 — 이번은 절도가 아니라 '탈익명화(deanonymization)' 위험이다. 이미 이름이나 이메일을 알고 있는 사이트가 이런 유출 기법으로 '익명'이라 여겨지던 지갑 주소에 실제 신원을 결부시킬 수 있다면, 이는 한 프로토콜 해킹의 피해자 몇 명에 그치지 않고 수천만명에게 조용히 퍼지는, 더 느리지만 잠재적으로 더 큰 규모의 프라이버시 피해다.</p>
<p class="en">Compared to recently discovered incidents like the Ill Bloom vulnerability or the Trust Wallet Chrome-extension breach, where a seed phrase or funds were directly exposed, this study's headline dollar figure is zero — no one had funds directly stolen. But the risk is categorically different: this is a deanonymization risk, not a theft. If a site that already knows someone's name or email can use these leaks to attach a real identity to what was assumed to be an "anonymous" wallet address, that's a slower-burn but potentially larger-scale privacy harm — one that quietly spreads across tens of millions of people rather than hitting the victims of a single hacked protocol.</p>
<p class="ja">最近発見された『イル・ブルーム(Ill Bloom)』脆弱性やトラストウォレットのクローム拡張機能侵害事件のような、シードフレーズや資金が直接流出した過去の事例と比較すると、この研究の見出しの損失額はゼロだ——誰も直接資金を盗まれてはいない。しかしリスクの性質そのものが範疇として異なる——これは窃盗ではなく『脱匿名化(deanonymization)』のリスクだ。すでに氏名やメールアドレスを把握しているサイトが、こうした漏洩手法を使って『匿名』とみなされていたウォレットアドレスに実際の身元を結びつけられるとしたら、それは一つのプロトコルハッキングの被害者数名にとどまらず、数千万人に静かに広がる、より緩やかだが潜在的により大規模なプライバシー被害だ。</p>
<p class="es">En comparación con incidentes recientemente descubiertos como la vulnerabilidad Ill Bloom o la brecha de la extensión de Chrome de Trust Wallet, donde una frase semilla o fondos fueron expuestos directamente, la cifra titular en dólares de este estudio es cero: a nadie se le robaron fondos directamente. Pero el riesgo es categóricamente diferente: se trata de un riesgo de desanonimización, no de un robo. Si un sitio que ya conoce el nombre o correo electrónico de alguien puede usar estas fugas para vincular una identidad real a lo que se asumía como una dirección de billetera "anónima", eso es un daño de privacidad de combustión más lenta pero potencialmente de mayor escala, uno que se propaga silenciosamente entre decenas de millones de personas en lugar de golpear a las víctimas de un único protocolo hackeado.</p>
<p class="de">Im Vergleich zu kürzlich entdeckten Vorfällen wie der Ill-Bloom-Schwachstelle oder dem Trust-Wallet-Chrome-Erweiterungs-Einbruch, bei denen eine Seed-Phrase oder Gelder direkt offengelegt wurden, liegt die Schlagzeilen-Dollarsumme dieser Studie bei null — niemandem wurden direkt Gelder gestohlen. Doch das Risiko ist kategorisch anders: Es handelt sich um ein Deanonymisierungsrisiko, keinen Diebstahl. Wenn eine Website, die bereits den Namen oder die E-Mail-Adresse einer Person kennt, diese Lecks nutzen kann, um einer als "anonym" angenommenen Wallet-Adresse eine echte Identität zuzuordnen, ist das ein langsamer, aber potenziell größerer Datenschutzschaden — einer, der sich still über zig Millionen Menschen verbreitet, statt nur die Opfer eines einzigen gehackten Protokolls zu treffen.</p>
<p class="fr">Comparé à des incidents récemment découverts comme la vulnérabilité Ill Bloom ou la faille de l'extension Chrome de Trust Wallet, où une phrase de récupération ou des fonds ont été directement exposés, le chiffre en dollars affiché par cette étude est nul — personne n'a eu de fonds directement volés. Mais le risque est catégoriquement différent : il s'agit d'un risque de désanonymisation, pas d'un vol. Si un site qui connaît déjà le nom ou l'e-mail de quelqu'un peut utiliser ces fuites pour associer une identité réelle à ce qui était supposé être une adresse de portefeuille « anonyme », c'est un préjudice de confidentialité à combustion plus lente mais potentiellement à plus grande échelle — un préjudice qui se propage silencieusement à des dizaines de millions de personnes plutôt que de frapper les victimes d'un seul protocole piraté.</p>
<p class="pt">Em comparação com incidentes recentemente descobertos, como a vulnerabilidade Ill Bloom ou a violação da extensão Chrome da Trust Wallet, em que uma frase-semente ou fundos foram diretamente expostos, o valor em dólares em destaque neste estudo é zero — ninguém teve fundos diretamente roubados. Mas o risco é categoricamente diferente: trata-se de um risco de desanonimização, não de roubo. Se um site que já conhece o nome ou e-mail de alguém puder usar esses vazamentos para atribuir uma identidade real ao que se presumia ser um endereço de carteira "anônimo", esse é um dano de privacidade de combustão mais lenta, mas potencialmente de maior escala — um que se espalha silenciosamente por dezenas de milhões de pessoas, em vez de atingir apenas as vítimas de um único protocolo hackeado.</p>
<p class="tr">Yakın zamanda keşfedilen Ill Bloom açığı veya bir tohum ifadesinin ya da fonların doğrudan açığa çıktığı Trust Wallet Chrome eklenti ihlali gibi olaylarla karşılaştırıldığında, bu çalışmanın manşet dolar rakamı sıfırdır -kimsenin fonları doğrudan çalınmadı. Ancak risk kategorik olarak farklıdır: bu bir hırsızlık değil, bir kimliksizleştirme (deanonymization) riskidir. Birinin adını veya e-postasını zaten bilen bir site, bu sızıntıları "anonim" varsayılan bir cüzdan adresine gerçek bir kimlik iliştirmek için kullanabiliyorsa, bu daha yavaş yanan ama potansiyel olarak daha büyük ölçekli bir gizlilik zararıdır -tek bir hacklenmiş protokolün kurbanlarını vurmak yerine on milyonlarca insana sessizce yayılan bir zarar.</p>
<p class="vi">So với các sự cố được phát hiện gần đây như lỗ hổng Ill Bloom hay vụ vi phạm tiện ích Chrome của Trust Wallet, nơi cụm từ khôi phục hoặc tiền bị lộ trực tiếp, con số đô la nổi bật của nghiên cứu này là số 0 — không ai bị mất tiền trực tiếp. Nhưng rủi ro này khác biệt về bản chất: đây là rủi ro giải ẩn danh (deanonymization), không phải trộm cắp. Nếu một trang web đã biết tên hoặc email của ai đó có thể sử dụng những rò rỉ này để gắn một danh tính thật vào thứ được cho là địa chỉ ví "ẩn danh", đó là một tổn hại quyền riêng tư âm ỉ hơn nhưng có quy mô tiềm năng lớn hơn — một tổn hại lặng lẽ lan rộng tới hàng chục triệu người thay vì chỉ ảnh hưởng đến nạn nhân của một giao thức bị hack duy nhất.</p>

<p class="ko">이 결함의 구조 자체도 눈여겨봐야 한다. 다수 지갑이 비슷한 프로바이더 주입 방식을 공유한다는 점에서, 이는 계정 추상화 인프라 결함이 여러 애플리케이션에 동시에 영향을 미쳤던 최근의 다른 지갑 인프라 사건들과 마찬가지로 '공급망형' 위험 패턴을 띤다. 앞으로 지켜봐야 할 실질적 지표는 이번 PETS 2026 발표를 계기로 EIP-6963 채택이 가속화되는지, 그리고 이미 수정한 세 곳 외에 다른 벤더들도 패치를 내놓기 시작하는지 여부다. 3,500만명이라는 숫자는 프로토콜 하나가 해킹당한 것보다 훨씬 넓은 반경에서 조용히 진행되는 문제라는 점에서, 헤드라인 손실액이 없다고 해서 안심할 사안은 아니다.</p>
<p class="en">The structural nature of the flaw itself is worth watching, too. Because many wallets share similar provider-injection patterns, this fits a "supply-chain-style" risk pattern similar to other recent wallet-infrastructure incidents where a single flaw in shared account-abstraction infrastructure affected many applications at once. The real metric worth tracking going forward is whether EIP-6963 adoption accelerates following this PETS 2026 presentation, and whether vendors beyond the three that have already patched begin shipping fixes. A figure of 35 million people is a quieter, wider-radius problem than a single hacked protocol — the absence of a headline dollar loss is no reason for complacency.</p>
<p class="ja">この欠陥自体の構造的性質にも注目すべきだ。多くのウォレットが類似したプロバイダー注入方式を共有しているという点で、これは共有されたアカウント抽象化インフラの単一の欠陥が多数のアプリケーションに同時に影響を与えた最近の他のウォレットインフラ事件と同様の『サプライチェーン型』リスクパターンに当てはまる。今後注視すべき実質的な指標は、今回のPETS 2026での発表を契機にEIP-6963の採用が加速するか、そしてすでに修正済みの3社以外のベンダーもパッチを出し始めるかどうかだ。3,500万人という数字は、一つのプロトコルがハッキングされるよりもはるかに広い半径で静かに進行する問題であり、見出しの損失額がないからといって安心できる話ではない。</p>
<p class="es">La naturaleza estructural del propio fallo también merece atención. Dado que muchas billeteras comparten patrones similares de inyección de proveedor, esto encaja en un patrón de riesgo "tipo cadena de suministro" similar a otros incidentes recientes de infraestructura de billeteras, donde un solo fallo en la infraestructura compartida de abstracción de cuentas afectó a muchas aplicaciones a la vez. La métrica real que vale la pena rastrear en adelante es si la adopción de EIP-6963 se acelera tras esta presentación en PETS 2026, y si proveedores más allá de los tres que ya han corregido el problema comienzan a lanzar parches. Una cifra de 35 millones de personas es un problema más silencioso y de mayor radio que un único protocolo hackeado: la ausencia de una pérdida titular en dólares no es motivo para la complacencia.</p>
<p class="de">Auch die strukturelle Natur des Fehlers selbst verdient Aufmerksamkeit. Da viele Wallets ähnliche Provider-Injektionsmuster teilen, passt dies zu einem "lieferkettenartigen" Risikomuster, ähnlich anderen jüngsten Wallet-Infrastruktur-Vorfällen, bei denen ein einzelner Fehler in gemeinsam genutzter Kontenabstraktions-Infrastruktur viele Anwendungen gleichzeitig betraf. Die wirklich zu verfolgende Kennzahl ist, ob sich die Akzeptanz von EIP-6963 nach dieser PETS-2026-Präsentation beschleunigt und ob über die drei bereits gepatchten Anbieter hinaus weitere Anbieter mit Fixes nachziehen. Eine Zahl von 35 Millionen Menschen ist ein leiseres, aber weiter reichendes Problem als ein einzelnes gehacktes Protokoll — das Fehlen eines Schlagzeilenverlusts in Dollar ist kein Grund zur Selbstzufriedenheit.</p>
<p class="fr">La nature structurelle de la faille elle-même mérite également d'être surveillée. Comme de nombreux portefeuilles partagent des schémas d'injection de fournisseur similaires, cela correspond à un schéma de risque de type « chaîne d'approvisionnement », semblable à d'autres incidents récents d'infrastructure de portefeuille où une seule faille dans une infrastructure d'abstraction de compte partagée a affecté de nombreuses applications à la fois. La véritable mesure à surveiller à l'avenir est de savoir si l'adoption d'EIP-6963 s'accélère après cette présentation à PETS 2026, et si des fournisseurs au-delà des trois ayant déjà corrigé le problème commencent à publier des correctifs. Un chiffre de 35 millions de personnes est un problème plus silencieux et à plus large rayon qu'un seul protocole piraté — l'absence d'une perte en dollars affichée n'est pas une raison pour la complaisance.</p>
<p class="pt">A natureza estrutural da própria falha também merece atenção. Como muitas carteiras compartilham padrões semelhantes de injeção de provedor, isso se encaixa em um padrão de risco do "tipo cadeia de suprimentos", semelhante a outros incidentes recentes de infraestrutura de carteira, em que uma única falha em infraestrutura compartilhada de abstração de conta afetou muitos aplicativos ao mesmo tempo. A métrica real que vale a pena acompanhar daqui para frente é se a adoção do EIP-6963 acelera após esta apresentação na PETS 2026, e se fornecedores além dos três que já corrigiram começam a lançar correções. Um número de 35 milhões de pessoas é um problema mais silencioso e de raio mais amplo do que um único protocolo hackeado — a ausência de uma perda em destaque em dólares não é motivo para complacência.</p>
<p class="tr">Kusurun kendisinin yapısal doğası da izlenmeye değer. Birçok cüzdan benzer sağlayıcı enjeksiyon modellerini paylaştığından, bu durum, paylaşılan hesap soyutlama altyapısındaki tek bir kusurun birçok uygulamayı aynı anda etkilediği diğer yakın tarihli cüzdan altyapısı olaylarına benzer bir "tedarik zinciri tarzı" risk modeline uyuyor. İleriye dönük olarak izlenmesi gereken gerçek ölçüt, bu PETS 2026 sunumunun ardından EIP-6963 benimsemesinin hızlanıp hızlanmadığı ve zaten yama yapmış üç satıcının ötesindeki satıcıların düzeltme yayınlamaya başlayıp başlamadığıdır. 35 milyon kişilik bir rakam, tek bir hacklenmiş protokolden daha sessiz ama daha geniş çaplı bir sorundur -manşet dolar kaybının olmaması, rehavete kapılmak için bir neden değildir.</p>
<p class="vi">Bản chất cấu trúc của chính lỗ hổng này cũng đáng theo dõi. Vì nhiều ví chia sẻ các mô hình tiêm nhà cung cấp tương tự nhau, điều này phù hợp với một mô hình rủi ro kiểu "chuỗi cung ứng" tương tự các sự cố hạ tầng ví gần đây khác, nơi một lỗ hổng duy nhất trong hạ tầng trừu tượng hóa tài khoản dùng chung đã ảnh hưởng đến nhiều ứng dụng cùng lúc. Chỉ số thực sự đáng theo dõi trong thời gian tới là liệu việc áp dụng EIP-6963 có tăng tốc sau bài trình bày tại PETS 2026 này hay không, và liệu các nhà cung cấp khác ngoài ba nhà cung cấp đã vá lỗi có bắt đầu tung ra bản sửa hay không. Con số 35 triệu người là một vấn đề âm thầm hơn nhưng có bán kính rộng hơn so với một giao thức bị hack duy nhất — việc không có khoản lỗ đô la nổi bật không phải là lý do để chủ quan.</p>

<div class="box ko">💡 <strong>시사점:</strong> 이번 연구가 밝힌 위험은 '도난'이 아니라 '탈익명화'다. 헤드라인 손실액이 0달러라고 해서 위험이 작다는 뜻은 아니다 — 오히려 3,500만명이라는 규모와, 지갑 주소가 온체인에서 영구적으로 추적 가능하다는 특성 때문에 장기적으로 더 큰 파급력을 가질 수 있다. 다음으로 확인해야 할 것은 EIP-6963 채택 속도와 메타마스크를 포함한 나머지 벤더들의 패치 여부다.</div>
<div class="box en">💡 <strong>Takeaway:</strong> What this study exposes isn't theft — it's deanonymization. A headline loss of $0 doesn't mean the risk is small; if anything, the scale of 35 million users, combined with the fact that wallet addresses are permanently traceable on-chain, could make this a bigger long-term problem. What's worth watching next is whether EIP-6963 adoption speeds up and whether the remaining vendors, including MetaMask, eventually ship a fix.</div>
<div class="box ja">💡 <strong>示唆:</strong> この研究が明らかにしたリスクは『盗難』ではなく『脱匿名化』だ。見出しの損失額が0ドルだからといってリスクが小さいという意味ではない——むしろ3,500万人という規模と、ウォレットアドレスがオンチェーンで永久に追跡可能であるという特性ゆえに、長期的にはより大きな影響力を持ちうる。次に注視すべきは、EIP-6963の採用速度と、メタマスクを含む残りのベンダーが最終的にパッチを出すかどうかだ。</div>
<div class="box es">💡 <strong>Conclusión:</strong> Lo que este estudio expone no es un robo, sino una desanonimización. Una pérdida titular de 0 dólares no significa que el riesgo sea pequeño; si acaso, la escala de 35 millones de usuarios, combinada con el hecho de que las direcciones de billetera son rastreables permanentemente on-chain, podría convertir esto en un problema más grande a largo plazo. Lo que vale la pena observar a continuación es si la adopción de EIP-6963 se acelera y si los proveedores restantes, incluido MetaMask, eventualmente lanzan una corrección.</div>
<div class="box de">💡 <strong>Fazit:</strong> Was diese Studie offenlegt, ist kein Diebstahl — es ist Deanonymisierung. Ein Schlagzeilenverlust von 0 Dollar bedeutet nicht, dass das Risiko gering ist; im Gegenteil könnte der Umfang von 35 Millionen Nutzern, kombiniert mit der Tatsache, dass Wallet-Adressen dauerhaft on-chain nachverfolgbar sind, dies langfristig zu einem größeren Problem machen. Was als Nächstes zu beobachten ist, ist, ob sich die Akzeptanz von EIP-6963 beschleunigt und ob die verbleibenden Anbieter, einschließlich MetaMask, irgendwann einen Fix liefern.</div>
<div class="box fr">💡 <strong>À retenir :</strong> Ce que cette étude révèle n'est pas un vol — c'est une désanonymisation. Une perte affichée de 0 dollar ne signifie pas que le risque est faible ; au contraire, l'échelle de 35 millions d'utilisateurs, combinée au fait que les adresses de portefeuille sont traçables en permanence on-chain, pourrait en faire un problème plus important à long terme. Ce qui mérite d'être surveillé ensuite, c'est si l'adoption d'EIP-6963 s'accélère et si les fournisseurs restants, y compris MetaMask, finissent par publier un correctif.</div>
<div class="box pt">💡 <strong>Conclusão:</strong> O que este estudo expõe não é roubo — é desanonimização. Uma perda em destaque de US$ 0 não significa que o risco seja pequeno; pelo contrário, a escala de 35 milhões de usuários, combinada com o fato de que endereços de carteira são rastreáveis permanentemente on-chain, pode tornar isso um problema maior a longo prazo. O que vale a pena observar a seguir é se a adoção do EIP-6963 acelera e se os fornecedores restantes, incluindo a MetaMask, eventualmente lançam uma correção.</div>
<div class="box tr">💡 <strong>Sonuç:</strong> Bu araştırmanın ortaya koyduğu şey hırsızlık değil -kimliksizleştirmenin tersine çevrilmesi (deanonymization). Manşet kaybının 0 dolar olması riskin küçük olduğu anlamına gelmiyor; tam tersine, 35 milyon kullanıcı ölçeği ile cüzdan adreslerinin zincir üzerinde kalıcı olarak izlenebilir olması bir araya geldiğinde, bu uzun vadede daha büyük bir sorun haline gelebilir. Bundan sonra izlenmesi gereken şey, EIP-6963 benimsemesinin hızlanıp hızlanmayacağı ve MetaMask dahil kalan satıcıların sonunda bir düzeltme yayınlayıp yayınlamayacağıdır.</div>
<div class="box vi">💡 <strong>Điểm mấu chốt:</strong> Điều mà nghiên cứu này phơi bày không phải là trộm cắp — mà là giải ẩn danh. Khoản lỗ nổi bật 0 đô la không có nghĩa là rủi ro nhỏ; ngược lại, quy mô 35 triệu người dùng, kết hợp với việc địa chỉ ví có thể bị theo dõi vĩnh viễn trên chuỗi, có thể khiến đây trở thành vấn đề lớn hơn về lâu dài. Điều đáng theo dõi tiếp theo là liệu việc áp dụng EIP-6963 có tăng tốc hay không, và liệu các nhà cung cấp còn lại, bao gồm cả MetaMask, có cuối cùng tung ra bản sửa lỗi hay không.</div>

<p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: 더해커뉴스(The Hacker News), KU루벤대학교 디스트리넷(DistriNet) 보안연구그룹, arXiv 논문 「The Masks We (Think We) Wear」, 프라이버시강화기술심포지엄(PETS 2026)</p>
<p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: The Hacker News, KU Leuven DistriNet security research group, arXiv paper "The Masks We (Think We) Wear," Privacy Enhancing Technologies Symposium (PETS 2026)</p>
<p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: ザ・ハッカーニュース(The Hacker News)、KUルーヴェン大学DistriNetセキュリティ研究グループ、arXiv論文「The Masks We (Think We) Wear」、プライバシー強化技術シンポジウム(PETS 2026)</p>
<p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: The Hacker News, grupo de investigación en seguridad DistriNet de la KU Leuven, artículo de arXiv "The Masks We (Think We) Wear," Simposio de Tecnologías de Mejora de la Privacidad (PETS 2026)</p>
<p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: The Hacker News, KU Leuven DistriNet Sicherheitsforschungsgruppe, arXiv-Paper "The Masks We (Think We) Wear," Privacy Enhancing Technologies Symposium (PETS 2026)</p>
<p class="fr" style="font-size:12px;color:#52525b;margin-top:24px">Sources : The Hacker News, groupe de recherche en sécurité DistriNet de la KU Leuven, article arXiv « The Masks We (Think We) Wear », Symposium sur les Technologies Renforçant la Confidentialité (PETS 2026)</p>
<p class="pt" style="font-size:12px;color:#52525b;margin-top:24px">Fontes: The Hacker News, grupo de pesquisa em segurança DistriNet da KU Leuven, artigo arXiv "The Masks We (Think We) Wear," Simpósio de Tecnologias de Aprimoramento de Privacidade (PETS 2026)</p>
<p class="tr" style="font-size:12px;color:#52525b;margin-top:24px">Kaynaklar: The Hacker News, KU Leuven DistriNet güvenlik araştırma grubu, arXiv makalesi "The Masks We (Think We) Wear," Gizlilik Geliştirme Teknolojileri Sempozyumu (PETS 2026)</p>
<p class="vi" style="font-size:12px;color:#52525b;margin-top:24px">Nguồn: The Hacker News, nhóm nghiên cứu bảo mật DistriNet của KU Leuven, bài báo arXiv "The Masks We (Think We) Wear," Hội nghị chuyên đề Công nghệ Tăng cường Quyền riêng tư (PETS 2026)</p>
<?php require __DIR__.'/_footer.php'; ?>
