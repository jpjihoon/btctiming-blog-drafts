<?php $slug = 'approval-phishing-999k-usdt-whale-hunting'; require __DIR__.'/_header.php'; ?>

<p class="ko">이더리움 지갑 하나가 7월 9일 악성 토큰 승인(approval) 서명 단 한 번으로 USDT 99만9999달러를 잃었다고 코인텔레그래프, 크립토타임스, 크립토뉴스가 전했다. 공격자의 자동 탈취 스크립트는 처음에는 피해자의 전체 잔액을 한 번에 인출하려다 잔액 부족으로 실패했고, 36초 뒤 금액을 다시 계산해 63만9999·15만9999·20만 USDT 세 건의 인출을 멀티콜(Multicall) 트랜잭션 하나로 묶어 실행했다.</p>
<p class="en">An Ethereum wallet lost 999,999 USDT to a single malicious token-approval signature on July 9, according to Cointelegraph, CryptoTimes and crypto.news. The attacker's automated draining script first tried to pull the victim's entire balance in one transaction, which failed for insufficient funds, then recalculated 36 seconds later and executed three separate withdrawals of 639,999, 159,999 and 200,000 USDT bundled through a single Multicall transaction.</p>
<p class="ja">7月9日、イーサリアムのウォレットが悪意あるトークン承認(approval)署名一つでUSDT99万9999ドルを失ったと、コインテレグラフ、クリプトタイムズ、クリプトニュースが伝えた。攻撃者の自動窃取スクリプトは最初、被害者の全残高を一度に引き出そうとして残高不足で失敗し、36秒後に金額を再計算して63万9999・15万9999・20万USDTの3件の引き出しを一つのマルチコール(Multicall)トランザクションにまとめて実行した。</p>
<p class="es">Una billetera de Ethereum perdió 999.999 USDT por una única firma maliciosa de aprobación de token el 9 de julio, según Cointelegraph, CryptoTimes y crypto.news. El script automatizado de vaciado del atacante primero intentó extraer todo el saldo de la víctima en una sola transacción, que falló por fondos insuficientes, y luego recalculó 36 segundos después y ejecutó tres retiros separados de 639.999, 159.999 y 200.000 USDT agrupados en una única transacción Multicall.</p>
<p class="de">Eine Ethereum-Wallet verlor am 9. Juli durch eine einzige bösartige Token-Freigabe-Signatur 999.999 USDT, so Cointelegraph, CryptoTimes und crypto.news. Das automatisierte Abfluss-Skript des Angreifers versuchte zunächst, das gesamte Guthaben des Opfers in einer Transaktion abzuziehen, was an unzureichenden Mitteln scheiterte, und berechnete 36 Sekunden später neu, wobei es drei separate Abhebungen von 639.999, 159.999 und 200.000 USDT ausführte, gebündelt in einer einzigen Multicall-Transaktion.</p>
<p class="fr">Un portefeuille Ethereum a perdu 999 999 USDT à cause d'une seule signature malveillante d'approbation de token le 9 juillet, selon Cointelegraph, CryptoTimes et crypto.news. Le script de vidage automatisé de l'attaquant a d'abord tenté de retirer la totalité du solde de la victime en une seule transaction, qui a échoué pour fonds insuffisants, puis a recalculé 36 secondes plus tard et exécuté trois retraits distincts de 639 999, 159 999 et 200 000 USDT regroupés dans une seule transaction Multicall.</p>
<p class="pt">Uma carteira Ethereum perdeu 999.999 USDT para uma única assinatura maliciosa de aprovação de token em 9 de julho, segundo Cointelegraph, CryptoTimes e crypto.news. O script de drenagem automatizado do atacante primeiro tentou sacar todo o saldo da vítima em uma transação, que falhou por fundos insuficientes, e recalculou 36 segundos depois, executando três saques separados de 639.999, 159.999 e 200.000 USDT agrupados em uma única transação Multicall.</p>
<p class="tr">Bir Ethereum cüzdanı, 9 Temmuz'da tek bir kötü niyetli token onay imzasıyla 999.999 USDT kaybetti; haberi Cointelegraph, CryptoTimes ve crypto.news duyurdu. Saldırganın otomatik boşaltma betiği önce kurbanın tüm bakiyesini tek işlemde çekmeye çalıştı, yetersiz bakiye nedeniyle başarısız oldu, ardından 36 saniye sonra yeniden hesaplayarak tek bir Multicall işleminde paketlenmiş 639.999, 159.999 ve 200.000 USDT'lik üç ayrı çekim gerçekleştirdi.</p>
<p class="vi">Một ví Ethereum đã mất 999.999 USDT vì một chữ ký phê duyệt token độc hại duy nhất vào ngày 9/7, theo Cointelegraph, CryptoTimes và crypto.news. Kịch bản rút tiền tự động của kẻ tấn công trước tiên cố gắng rút toàn bộ số dư của nạn nhân trong một giao dịch, giao dịch này thất bại vì không đủ tiền, sau đó tính toán lại 36 giây sau và thực hiện ba lần rút riêng biệt gồm 639.999, 159.999 và 200.000 USDT được gộp trong một giao dịch Multicall duy nhất.</p>

<h2 class="ko">서명 하나의 해부도</h2>
<h2 class="en">Anatomy of a Single Signature</h2>
<h2 class="ja">署名一つの解剖図</h2>
<h2 class="es">Anatomía de una Sola Firma</h2>
<h2 class="de">Anatomie Einer Einzigen Signatur</h2>
<h2 class="fr">Anatomie d'une Seule Signature</h2>
<h2 class="pt">Anatomia de Uma Única Assinatura</h2>
<h2 class="tr">Tek Bir İmzanın Anatomisi</h2>
<h2 class="vi">Giải Phẫu Một Chữ Ký Duy Nhất</h2>

<p class="ko">피해자는 정상적인 서비스를 흉내 낸 가짜 화면이나 악성 dApp과 상호작용하는 과정에서 '로그인 확인'처럼 보이는 서명 요청에 응했을 가능성이 크다. 토큰 승인 서명 자체는 피해자에게 가스비를 요구하지 않고, 온체인에 즉시 기록되지도 않기 때문에 서명 직후에는 아무 일도 일어나지 않은 것처럼 보인다 — 실제 탈취는 그보다 나중에, 공격자의 컨트랙트가 그 서명을 이용해 transferFrom을 호출하는 순간 일어난다.</p>
<p class="en">The victim most likely interacted with a fake front-end mimicking a legitimate service, or a malicious dApp, and signed a request disguised as something routine like a "login confirmation." The approval signature itself costs the victim no gas and isn't broadcast on-chain immediately, so nothing appears to happen right after signing — the actual theft occurs later, whenever the attacker's contract uses that signature to call transferFrom.</p>
<p class="ja">被害者はおそらく、正規のサービスを模倣した偽の画面や悪意あるdAppと相互作用する中で、「ログイン確認」のように見える署名要求に応じた可能性が高い。トークン承認署名そのものは被害者にガス代を要求せず、オンチェーンに即座に記録されるわけでもないため、署名直後には何も起きていないように見える——実際の窃取はそれより後、攻撃者のコントラクトがその署名を使ってtransferFromを呼び出す瞬間に発生する。</p>
<p class="es">Lo más probable es que la víctima interactuara con una interfaz falsa que imitaba un servicio legítimo, o con una dApp maliciosa, y firmara una solicitud disfrazada de algo rutinario como una "confirmación de inicio de sesión". La firma de aprobación en sí no cuesta gas a la víctima y no se transmite on-chain de inmediato, por lo que no parece pasar nada justo después de firmar —el robo real ocurre después, cuando el contrato del atacante usa esa firma para llamar a transferFrom.</p>
<p class="de">Das Opfer interagierte höchstwahrscheinlich mit einer gefälschten Oberfläche, die einen legitimen Dienst imitierte, oder mit einer bösartigen dApp, und signierte eine Anfrage, die als etwas Routinemäßiges wie eine „Login-Bestätigung" getarnt war. Die Freigabesignatur selbst kostet das Opfer kein Gas und wird nicht sofort on-chain übertragen, sodass unmittelbar nach der Signatur nichts zu passieren scheint — der eigentliche Diebstahl erfolgt später, sobald der Vertrag des Angreifers diese Signatur nutzt, um transferFrom aufzurufen.</p>
<p class="fr">La victime a très probablement interagi avec une interface factice imitant un service légitime, ou une dApp malveillante, et a signé une demande déguisée en quelque chose de routinier comme une « confirmation de connexion ». La signature d'approbation elle-même ne coûte aucun gas à la victime et n'est pas diffusée immédiatement on-chain, donc rien ne semble se passer juste après la signature — le vol réel se produit plus tard, dès que le contrat de l'attaquant utilise cette signature pour appeler transferFrom.</p>
<p class="pt">A vítima muito provavelmente interagiu com uma interface falsa imitando um serviço legítimo, ou um dApp malicioso, e assinou uma solicitação disfarçada de algo rotineiro como uma "confirmação de login". A própria assinatura de aprovação não custa gas à vítima e não é transmitida on-chain imediatamente, então nada parece acontecer logo após a assinatura — o roubo real ocorre depois, quando o contrato do atacante usa essa assinatura para chamar transferFrom.</p>
<p class="tr">Kurban büyük olasılıkla meşru bir hizmeti taklit eden sahte bir ön yüzle veya kötü niyetli bir dApp ile etkileşime girdi ve "giriş onayı" gibi rutin bir şey olarak gizlenmiş bir isteği imzaladı. Onay imzasının kendisi kurbana gaz maliyeti getirmez ve hemen zincir üzerinde yayınlanmaz, bu yüzden imzaladıktan hemen sonra hiçbir şey olmuyormuş gibi görünür — asıl hırsızlık daha sonra, saldırganın sözleşmesi o imzayı kullanarak transferFrom'u çağırdığında gerçekleşir.</p>
<p class="vi">Nạn nhân rất có thể đã tương tác với một giao diện giả mạo bắt chước một dịch vụ hợp pháp, hoặc một dApp độc hại, và ký một yêu cầu được ngụy trang thành thứ gì đó thông thường như "xác nhận đăng nhập". Bản thân chữ ký phê duyệt không tốn phí gas của nạn nhân và không được phát lên chuỗi ngay lập tức, vì vậy có vẻ như không có gì xảy ra ngay sau khi ký — vụ trộm thực sự xảy ra sau đó, bất cứ khi nào hợp đồng của kẻ tấn công sử dụng chữ ký đó để gọi transferFrom.</p>

<p class="ko">이번 사건에서 드러난 구체적 기법에는 주목할 지점이 있다. 세 건으로 나뉜 인출을 멀티콜 하나로 묶은 구조는, 일부 지갑·거래소가 사용하는 단일 트랜잭션 규모 경보를 우회하도록 설계됐을 가능성을 시사한다. 그리고 36초 만의 재계산은 이런 탈취 봇이 이제 공격자의 수동 개입 없이도 거의 실시간으로 상황을 감지하고 조정할 만큼 자동화됐음을 보여준다 — 첫 시도의 실패가 방어가 아니라 그저 두 번째 시도를 위한 데이터였을 뿐이다.</p>
<p class="en">The specific mechanics revealed here are worth noting. Bundling three separate withdrawals into a single Multicall suggests the attacker structured the drain to route around single-transaction size alerts that some wallets and exchanges use. And the 36-second recalculation shows these sweeper bots are now automated enough to probe and adjust in near real time without requiring manual intervention from the attacker — the first failed attempt wasn't a defense that held, it was just data for the second one.</p>
<p class="ja">今回明らかになった具体的な手口には注目すべき点がある。3件に分かれた引き出しを一つのマルチコールにまとめる構造は、一部のウォレットや取引所が使う単一トランザクション規模の警告を回避するよう設計された可能性を示唆する。そして36秒での再計算は、こうした窃取ボットが攻撃者の手動介入なしにほぼリアルタイムで状況を感知・調整できるほど自動化されていることを示す——最初の失敗した試みは持ちこたえた防御ではなく、単に二度目の試みのためのデータに過ぎなかった。</p>
<p class="es">Vale la pena señalar los mecanismos específicos revelados aquí. Agrupar tres retiros separados en un único Multicall sugiere que el atacante estructuró el vaciado para eludir las alertas de tamaño de transacción única que usan algunas billeteras y exchanges. Y el recálculo de 36 segundos muestra que estos bots de barrido ahora están lo suficientemente automatizados como para sondear y ajustar casi en tiempo real sin requerir intervención manual del atacante —el primer intento fallido no fue una defensa que resistió, fue simplemente un dato para el segundo.</p>
<p class="de">Die hier offengelegte konkrete Mechanik ist bemerkenswert. Das Bündeln von drei separaten Abhebungen in einem einzigen Multicall deutet darauf hin, dass der Angreifer den Abfluss so strukturierte, dass er Warnungen zur Größe einzelner Transaktionen umgeht, die manche Wallets und Börsen verwenden. Und die Neuberechnung nach 36 Sekunden zeigt, dass diese Sweeper-Bots inzwischen automatisiert genug sind, um nahezu in Echtzeit zu sondieren und anzupassen, ohne manuelles Eingreifen des Angreifers zu benötigen — der erste fehlgeschlagene Versuch war keine standhaltende Verteidigung, sondern lediglich Daten für den zweiten.</p>
<p class="fr">Les mécanismes précis révélés ici méritent d'être notés. Regrouper trois retraits distincts en un seul Multicall suggère que l'attaquant a structuré le vidage pour contourner les alertes de taille de transaction unique utilisées par certains portefeuilles et bourses. Et le recalcul en 36 secondes montre que ces bots de vidage sont désormais assez automatisés pour sonder et s'ajuster en quasi temps réel sans intervention manuelle de l'attaquant — la première tentative échouée n'était pas une défense qui a tenu, ce n'était que des données pour la seconde.</p>
<p class="pt">Os mecanismos específicos revelados aqui merecem atenção. Agrupar três saques separados em um único Multicall sugere que o atacante estruturou a drenagem para contornar alertas de tamanho de transação única que algumas carteiras e corretoras usam. E o recálculo em 36 segundos mostra que esses bots de varredura agora são automatizados o suficiente para sondar e ajustar quase em tempo real sem exigir intervenção manual do atacante — a primeira tentativa falha não foi uma defesa que resistiu, foi apenas um dado para a segunda.</p>
<p class="tr">Burada ortaya çıkan spesifik mekanikler dikkat çekici. Üç ayrı çekimin tek bir Multicall'da paketlenmesi, saldırganın boşaltmayı bazı cüzdan ve borsaların kullandığı tekli işlem boyutu uyarılarını atlatacak şekilde yapılandırdığını düşündürüyor. 36 saniyelik yeniden hesaplama ise bu süpürücü botların artık saldırganın manuel müdahalesi olmadan neredeyse gerçek zamanlı olarak yoklama yapıp ayarlama yapacak kadar otomatikleştiğini gösteriyor — ilk başarısız deneme tutan bir savunma değildi, sadece ikincisi için veriydi.</p>
<p class="vi">Cơ chế cụ thể được tiết lộ ở đây đáng chú ý. Việc gộp ba lần rút riêng biệt vào một Multicall duy nhất cho thấy kẻ tấn công đã cấu trúc vụ rút tiền để né tránh các cảnh báo về quy mô giao dịch đơn lẻ mà một số ví và sàn giao dịch sử dụng. Và việc tính toán lại trong 36 giây cho thấy các bot quét này giờ đây đã được tự động hóa đủ để dò xét và điều chỉnh gần như theo thời gian thực mà không cần sự can thiệp thủ công của kẻ tấn công — lần thử thất bại đầu tiên không phải là một tuyến phòng thủ đứng vững, mà chỉ là dữ liệu cho lần thử thứ hai.</p>

<h2 class="ko">'해킹'이 아니라 '승인'이 반복되는 실패 지점인 이유</h2>
<h2 class="en">Why Approvals, Not Hacks, Are the Recurring Failure Mode</h2>
<h2 class="ja">『ハッキング』ではなく『承認』が繰り返される失敗の原因である理由</h2>
<h2 class="es">Por Qué las Aprobaciones, No los Hackeos, Son el Modo de Fallo Recurrente</h2>
<h2 class="de">Warum Freigaben, Nicht Hacks, Der Wiederkehrende Fehlermodus Sind</h2>
<h2 class="fr">Pourquoi les Approbations, Pas les Piratages, Sont le Mode de Défaillance Récurrent</h2>
<h2 class="pt">Por Que Aprovações, Não Hacks, São o Modo de Falha Recorrente</h2>
<h2 class="tr">Neden Hack Değil, Onaylar Tekrarlayan Hata Modu</h2>
<h2 class="vi">Vì Sao Phê Duyệt, Không Phải Hack, Là Chế Độ Lỗi Lặp Lại</h2>

<p class="ko">이 사건이 보여주는 근본 메커니즘은 ERC-20 무제한 승인(approve)과 EIP-2612 퍼밋(permit) 서명이다. 이더리움 표준에서 approve 함수는 특정 주소에 자신의 토큰을 얼마까지 가져갈 수 있는지 권한을 위임하는데, 많은 dApp이 사용성을 위해 사실상 무제한 금액을 요청하고 이용자도 습관적으로 승인한다. EIP-2612 퍼밋은 여기서 한 걸음 더 나아가 이 위임 자체를 온체인 트랜잭션 없이 오프체인 서명 하나로 끝낼 수 있게 해, 서명 시점에는 가스비도 들지 않고 지갑의 '트랜잭션 발생' 경고도 뜨지 않는다. 이는 프로토콜 버그를 이용한 '해킹'이 아니라 이용자가 승인한 이전을 그대로 실행한 것이므로, 어떤 프로토콜도 침해되지 않았고 버그 바운티도 적용되지 않는다.</p>
<p class="en">The underlying mechanism this incident exposes is the ERC-20 unlimited approve function and EIP-2612 permit signatures. In the Ethereum standard, the approve function delegates permission for a given address to move up to a specified amount of your tokens, but many dApps request effectively unlimited amounts for convenience, and users habitually sign off on it. EIP-2612 permit goes a step further, letting that delegation happen through a single off-chain signature instead of an on-chain transaction, so signing costs no gas and doesn't trigger a wallet's "transaction pending" warning. This isn't a "hack" exploiting a bug — it is the exact transfer the user authorized, which is why no protocol was compromised and no bug bounty applies.</p>
<p class="ja">今回の事件が明らかにする根底のメカニズムは、ERC-20の無制限承認(approve)機能とEIP-2612のパーミット(permit)署名だ。イーサリアム標準では、approve関数は特定のアドレスに自分のトークンを指定額まで動かす権限を委譲するが、多くのdAppは利便性のために事実上無制限の金額を要求し、利用者も習慣的にそれに応じてしまう。EIP-2612パーミットはさらに一歩進んで、この委譲をオンチェーン取引ではなく単一のオフチェーン署名で完結させるため、署名時にガス代もかからず、ウォレットの『取引実行中』の警告も出ない。これはバグを突いた『ハッキング』ではなく、利用者が承認した通りの移転そのものであり、だからこそどのプロトコルも侵害されておらず、バグ報奨金も適用されない。</p>
<p class="es">El mecanismo subyacente que este incidente expone es la función de aprobación ilimitada ERC-20 y las firmas permit de EIP-2612. En el estándar de Ethereum, la función approve delega permiso para que una dirección determinada mueva hasta una cantidad especificada de tus tokens, pero muchas dApps solicitan montos efectivamente ilimitados por conveniencia, y los usuarios lo aprueban habitualmente. El permit de EIP-2612 va un paso más allá, permitiendo que esa delegación ocurra mediante una sola firma off-chain en lugar de una transacción on-chain, por lo que firmar no cuesta gas ni activa la advertencia de "transacción pendiente" de la billetera. Esto no es un "hackeo" que explota un error —es exactamente la transferencia que el usuario autorizó, razón por la cual ningún protocolo fue comprometido y no aplica ninguna recompensa por errores.</p>
<p class="de">Der zugrunde liegende Mechanismus, den dieser Vorfall offenlegt, ist die unbegrenzte ERC-20-approve-Funktion und EIP-2612-Permit-Signaturen. Im Ethereum-Standard delegiert die approve-Funktion die Berechtigung für eine bestimmte Adresse, bis zu einem festgelegten Betrag Ihrer Token zu bewegen, aber viele dApps fordern aus Bequemlichkeit praktisch unbegrenzte Beträge an, und Nutzer stimmen dem gewohnheitsmäßig zu. EIP-2612-Permit geht einen Schritt weiter und lässt diese Delegation über eine einzige Off-Chain-Signatur statt einer On-Chain-Transaktion geschehen, sodass das Signieren kein Gas kostet und keine „Transaktion ausstehend"-Warnung der Wallet auslöst. Dies ist kein „Hack", der einen Fehler ausnutzt — es ist genau die Übertragung, die der Nutzer autorisiert hat, weshalb kein Protokoll kompromittiert wurde und kein Bug-Bounty greift.</p>
<p class="fr">Le mécanisme sous-jacent que cet incident expose est la fonction d'approbation illimitée ERC-20 et les signatures permit de l'EIP-2612. Dans le standard Ethereum, la fonction approve délègue à une adresse donnée l'autorisation de déplacer jusqu'à un montant spécifié de vos tokens, mais de nombreuses dApps demandent des montants effectivement illimités par commodité, et les utilisateurs les approuvent par habitude. Le permit de l'EIP-2612 va plus loin, permettant que cette délégation se fasse via une seule signature hors chaîne plutôt qu'une transaction on-chain, de sorte que signer ne coûte aucun gas et ne déclenche pas l'avertissement « transaction en attente » du portefeuille. Ce n'est pas un « piratage » exploitant un bug — c'est exactement le transfert que l'utilisateur a autorisé, ce qui explique qu'aucun protocole n'ait été compromis et qu'aucune prime aux bugs ne s'applique.</p>
<p class="pt">O mecanismo subjacente que este incidente expõe é a função de aprovação ilimitada ERC-20 e as assinaturas permit do EIP-2612. No padrão Ethereum, a função approve delega permissão para que um determinado endereço mova até um valor especificado de seus tokens, mas muitos dApps solicitam valores efetivamente ilimitados por conveniência, e os usuários aprovam isso habitualmente. O permit do EIP-2612 vai além, permitindo que essa delegação ocorra por meio de uma única assinatura off-chain em vez de uma transação on-chain, então assinar não custa gas nem aciona o aviso de "transação pendente" da carteira. Isso não é um "hack" explorando uma falha — é exatamente a transferência que o usuário autorizou, motivo pelo qual nenhum protocolo foi comprometido e nenhuma recompensa por bugs se aplica.</p>
<p class="tr">Bu olayın ortaya koyduğu temel mekanizma, ERC-20'nin sınırsız approve fonksiyonu ve EIP-2612 permit imzalarıdır. Ethereum standardında approve fonksiyonu, belirli bir adrese token'larınızın belirtilen bir miktarına kadarını hareket ettirme izni devreder, ancak birçok dApp kolaylık için fiilen sınırsız miktarlar talep eder ve kullanıcılar da alışkanlıkla bunu onaylar. EIP-2612 permit bir adım daha ileri giderek bu devri zincir üstü işlem yerine tek bir zincir dışı imzayla gerçekleştirir, böylece imzalamak gaz maliyeti getirmez ve cüzdanın "işlem beklemede" uyarısını tetiklemez. Bu bir hatayı istismar eden bir "hack" değildir — kullanıcının yetkilendirdiği transferin ta kendisidir, bu yüzden hiçbir protokol ihlal edilmemiştir ve hiçbir hata ödülü uygulanmaz.</p>
<p class="vi">Cơ chế nền tảng mà sự cố này phơi bày là chức năng approve không giới hạn của ERC-20 và chữ ký permit EIP-2612. Trong tiêu chuẩn Ethereum, hàm approve ủy quyền cho một địa chỉ nhất định di chuyển tối đa một số lượng token được chỉ định của bạn, nhưng nhiều dApp yêu cầu số lượng gần như không giới hạn vì sự tiện lợi, và người dùng theo thói quen chấp thuận điều đó. Permit EIP-2612 đi xa hơn một bước, cho phép việc ủy quyền đó diễn ra qua một chữ ký off-chain duy nhất thay vì một giao dịch on-chain, vì vậy việc ký không tốn phí gas và không kích hoạt cảnh báo "giao dịch đang chờ" của ví. Đây không phải là một "vụ hack" khai thác lỗi — đó chính xác là khoản chuyển tiền mà người dùng đã ủy quyền, đó là lý do không có giao thức nào bị xâm phạm và không có khoản thưởng lỗi nào được áp dụng.</p>

<p class="ko">이 수법을 산업 규모로 자동화한 것이 2023년부터 성행한 인페르노 드레이너(Inferno Drainer), 핑크 드레이너(Pink Drainer) 같은 '드레이너 서비스형'(drainer-as-a-service) 키트다. 스캠스니퍼(ScamSniffer)의 2025년 보고서에 따르면 전체 피싱 피해액은 2024년 약 4억9,400만 달러에서 2025년 약 8,400만 달러로 83% 급감했지만, 같은 기간 피해자 1인당 평균 손실액은 오히려 늘었다 — 공격자들이 다수의 저가치 스팸형 공격에서 벗어나, 이번 사건처럼 소수의 부유한 지갑만 정밀 타격하는 '고래 사냥(whale hunting)'으로 전략을 옮겼기 때문이다. 다만 일부 보안 연구자는 이를 프로토콜의 실패라기보다 이용자 부주의로 규정한다 — 오래된 승인을 주기적으로 취소(revoke)하거나 명확한 서명(clear-signing)을 지원하는 하드웨어 지갑을 썼다면 막을 수 있었다는 것이다. 그러나 이런 시각은 오늘날의 피싱 사이트가 정상 인터페이스를 얼마나 정교하게 흉내 내는지를 과소평가하는 측면이 있다.</p>
<p class="en">What industrialized this playbook was a wave of "drainer-as-a-service" kits like Inferno Drainer and Pink Drainer that have proliferated since 2023. According to ScamSniffer's 2025 report, total phishing losses fell 83% to about $84 million, down from roughly $494 million in 2024, yet the average loss per victim rose over the same period — attackers have shifted away from mass, low-value spam toward precisely targeted "whale hunting" like this one. Some security researchers frame incidents like this as user error rather than protocol failure, arguing that periodically revoking stale approvals or using a hardware wallet with clear-signing would have prevented it. That view arguably understates how convincingly modern phishing interfaces now mimic legitimate ones.</p>
<p class="ja">この手口を産業規模で自動化したのが、2023年以降拡大したインフェルノ・ドレイナー(Inferno Drainer)やピンク・ドレイナー(Pink Drainer)のような『ドレイナー・アズ・ア・サービス』キットだ。スキャムスニッファー(ScamSniffer)の2025年報告書によると、フィッシング被害総額は2024年の約4億9,400万ドルから2025年には約8,400万ドルへと83%急減した一方、同期間の被害者一人当たりの平均損失額はむしろ増加した——攻撃者が多数を狙う低価値のスパム型攻撃から離れ、今回のような少数の富裕なウォレットだけを精密に狙う『ホエールハンティング』へ戦略を移したためだ。ただし一部のセキュリティ研究者はこれをプロトコルの失敗ではなく利用者の不注意だと位置づける——古い承認を定期的に取り消す(revoke)、あるいはクリアサイニングに対応したハードウェアウォレットを使っていれば防げたはずだというのだ。しかしこの見方は、今日のフィッシングサイトが正規のインターフェースをいかに巧妙に模倣しているかを過小評価している面がある。</p>
<p class="es">Lo que industrializó esta estrategia fue una ola de kits de "drainer-as-a-service" como Inferno Drainer y Pink Drainer que han proliferado desde 2023. Según el informe 2025 de ScamSniffer, las pérdidas totales por phishing cayeron un 83% a unos 84 millones de dólares, desde aproximadamente 494 millones en 2024, pero la pérdida promedio por víctima aumentó en el mismo período —los atacantes se han alejado del spam masivo de bajo valor hacia una "caza de ballenas" precisamente dirigida como esta. Algunos investigadores de seguridad enmarcan incidentes como este como error del usuario más que como falla del protocolo, argumentando que revocar periódicamente aprobaciones obsoletas o usar una billetera de hardware con firma clara lo habría evitado. Esa visión posiblemente subestima cuán convincentemente las interfaces de phishing modernas ahora imitan a las legítimas.</p>
<p class="de">Was dieses Vorgehen industrialisierte, war eine Welle von „Drainer-as-a-Service"-Kits wie Inferno Drainer und Pink Drainer, die sich seit 2023 verbreitet haben. Laut dem 2025er-Bericht von ScamSniffer fielen die gesamten Phishing-Verluste um 83% auf etwa 84 Millionen Dollar, gegenüber rund 494 Millionen Dollar im Jahr 2024, doch der durchschnittliche Verlust pro Opfer stieg im selben Zeitraum — Angreifer haben sich von massenhaftem, geringwertigem Spam hin zu präzise gezieltem „Whale Hunting" wie diesem verlagert. Manche Sicherheitsforscher stufen solche Vorfälle eher als Nutzerfehler denn als Protokollversagen ein und argumentieren, dass regelmäßiges Widerrufen veralteter Freigaben oder eine Hardware-Wallet mit Clear-Signing dies verhindert hätte. Diese Sichtweise unterschätzt womöglich, wie überzeugend moderne Phishing-Oberflächen legitime Interfaces heute nachahmen.</p>
<p class="fr">Ce qui a industrialisé ce mode opératoire est une vague de kits « drainer-as-a-service » comme Inferno Drainer et Pink Drainer, qui prolifèrent depuis 2023. Selon le rapport 2025 de ScamSniffer, les pertes totales dues au phishing ont chuté de 83 % à environ 84 millions de dollars, contre environ 494 millions en 2024, mais la perte moyenne par victime a augmenté sur la même période — les attaquants se sont détournés du spam massif à faible valeur pour se tourner vers une « chasse à la baleine » précisément ciblée comme celle-ci. Certains chercheurs en sécurité qualifient de tels incidents d'erreur utilisateur plutôt que de défaillance de protocole, arguant que révoquer périodiquement les approbations obsolètes ou utiliser un portefeuille matériel avec signature claire l'aurait évité. Ce point de vue sous-estime sans doute à quel point les interfaces de phishing modernes imitent désormais convaincamment les interfaces légitimes.</p>
<p class="pt">O que industrializou essa tática foi uma onda de kits "drainer-as-a-service" como Inferno Drainer e Pink Drainer, que proliferaram desde 2023. Segundo o relatório de 2025 da ScamSniffer, as perdas totais com phishing caíram 83%, para cerca de US$ 84 milhões, ante aproximadamente US$ 494 milhões em 2024, mas a perda média por vítima aumentou no mesmo período — os atacantes se afastaram do spam massivo de baixo valor rumo a uma "caça a baleias" precisamente direcionada como esta. Alguns pesquisadores de segurança classificam incidentes assim como erro do usuário em vez de falha de protocolo, argumentando que revogar periodicamente aprovações antigas ou usar uma carteira de hardware com clear-signing teria evitado isso. Essa visão possivelmente subestima o quão convincentemente as interfaces de phishing modernas agora imitam as legítimas.</p>
<p class="tr">Bu senaryoyu endüstriyel hale getiren şey, 2023'ten beri yaygınlaşan Inferno Drainer ve Pink Drainer gibi "hizmet olarak boşaltıcı" (drainer-as-a-service) kitleri oldu. ScamSniffer'ın 2025 raporuna göre, toplam kimlik avı kayıpları 2024'teki yaklaşık 494 milyon dolardan %83 düşerek yaklaşık 84 milyon dolara geriledi, ancak aynı dönemde kurban başına ortalama kayıp arttı — saldırganlar kitlesel, düşük değerli spam'den, bunun gibi kesin hedefli "balina avcılığına" kaydı. Bazı güvenlik araştırmacıları bu tür olayları protokol arızasından çok kullanıcı hatası olarak nitelendiriyor ve eski onayları düzenli olarak iptal etmenin (revoke) veya açık imzalamalı bir donanım cüzdanı kullanmanın bunu önleyebileceğini savunuyor. Bu görüş, günümüz kimlik avı arayüzlerinin meşru arayüzleri ne kadar ikna edici biçimde taklit ettiğini muhtemelen hafife alıyor.</p>
<p class="vi">Điều đã công nghiệp hóa chiêu thức này là làn sóng các bộ công cụ "drainer-as-a-service" như Inferno Drainer và Pink Drainer đã lan rộng từ năm 2023. Theo báo cáo năm 2025 của ScamSniffer, tổng thiệt hại do lừa đảo giảm 83% xuống còn khoảng 84 triệu USD, từ mức khoảng 494 triệu USD năm 2024, nhưng mức thiệt hại trung bình mỗi nạn nhân lại tăng lên trong cùng kỳ — những kẻ tấn công đã chuyển từ spam hàng loạt, giá trị thấp sang "săn cá voi" nhắm mục tiêu chính xác như trường hợp này. Một số nhà nghiên cứu bảo mật xếp những sự cố như thế này vào lỗi người dùng hơn là lỗi giao thức, lập luận rằng việc thường xuyên thu hồi các phê duyệt cũ hoặc sử dụng ví cứng có clear-signing lẽ ra đã ngăn được việc này. Quan điểm đó có thể đã đánh giá thấp mức độ thuyết phục mà các giao diện lừa đảo hiện đại hiện nay bắt chước giao diện hợp pháp.</p>

<h2 class="ko">왜 중요하며, 무엇을 지켜봐야 하나</h2>
<h2 class="en">Why This Matters, and What to Watch</h2>
<h2 class="ja">なぜ重要で、何を注視すべきか</h2>
<h2 class="es">Por Qué Importa y Qué Observar</h2>
<h2 class="de">Warum Das Wichtig Ist Und Worauf Zu Achten Ist</h2>
<h2 class="fr">Pourquoi C'est Important, et Ce Qu'il Faut Surveiller</h2>
<h2 class="pt">Por Que Isso Importa e O Que Observar</h2>
<h2 class="tr">Bu Neden Önemli ve Nelere Dikkat Edilmeli</h2>
<h2 class="vi">Vì Sao Điều Này Quan Trọng Và Cần Theo Dõi Điều Gì</h2>

<p class="ko">자본이 소수의 지갑에 점점 더 집중될수록, 성공한 피싱 한 건이 가져다주는 수익은 커진다. 이는 스캠스니퍼가 강조한 전체 피해액 83% 감소라는 수치가 실제로 대형 보유자가 마주한 위험을 상당히 축소해 보여줄 수 있다는 뜻이기도 하다. 아울러 CertiK 같은 다른 보안 업체가 2025년 한 해 동안 248건, 7억2,300만 달러 규모의 피해를 집계한 것과 스캠스니퍼의 8,400만 달러라는 수치가 크게 어긋나는 것도 눈여겨볼 대목이다 — 이는 수치가 틀렸다기보다, 각 업체가 '피싱'으로 분류하는 사고의 범위(지갑 드레이너만 포함하는지, 브리지·다중서명 취약점까지 포함하는지)가 서로 다르기 때문일 가능성이 크며, 따라서 단일 숫자만으로 업계 전체의 피해 규모를 판단하는 것은 위험하다.</p>
<p class="en">As capital increasingly concentrates in fewer wallets, each successful phish pays off more, meaning the 83% aggregate-loss decline that ScamSniffer highlighted may substantially understate the risk actually facing large holders today. It's also worth noting how sharply ScamSniffer's $84 million figure diverges from CertiK's count of $723 million across 248 incidents over the same year — likely not because either number is wrong, but because different security firms scope "phishing" differently (wallet drainers only, versus also counting bridge and multisig exploits), which makes it risky to read any single industry-wide figure as the whole picture.</p>
<p class="ja">資本がますます少数のウォレットに集中するにつれ、成功した1件のフィッシングがもたらす見返りは大きくなる。これは、スキャムスニッファーが強調した被害総額83%減という数字が、実際に大口保有者が直面するリスクをかなり過小評価している可能性を意味する。またCertiKなど別のセキュリティ企業が同じ年に248件、7億2,300万ドル規模の被害を集計していることと、スキャムスニッファーの8,400万ドルという数字が大きく食い違う点も注目に値する——これはどちらかの数字が間違っているというより、各企業が『フィッシング』として分類する事故の範囲(ウォレットドレイナーのみか、ブリッジ・マルチシグの脆弱性まで含むか)が異なるためである可能性が高く、業界全体の被害規模を単一の数字だけで判断するのは危うい。</p>
<p class="es">A medida que el capital se concentra cada vez más en menos billeteras, cada phishing exitoso rinde más, lo que significa que la caída del 83% en las pérdidas agregadas que destacó ScamSniffer podría subestimar sustancialmente el riesgo que realmente enfrentan hoy los grandes tenedores. También vale la pena señalar cuán marcadamente diverge la cifra de 84 millones de dólares de ScamSniffer del recuento de CertiK de 723 millones de dólares en 248 incidentes durante el mismo año —probablemente no porque alguna de las dos cifras esté equivocada, sino porque distintas firmas de seguridad delimitan el "phishing" de forma diferente (solo drainers de billetera, frente a también contar exploits de puentes y multifirma), lo que hace arriesgado leer cualquier cifra única a nivel de industria como la imagen completa.</p>
<p class="de">Da sich Kapital zunehmend in weniger Wallets konzentriert, zahlt sich jeder erfolgreiche Phishing-Angriff stärker aus, was bedeutet, dass der von ScamSniffer hervorgehobene Rückgang der Gesamtverluste um 83% das Risiko, dem große Halter heute tatsächlich ausgesetzt sind, erheblich unterschätzen könnte. Bemerkenswert ist auch, wie stark ScamSniffers Zahl von 84 Millionen Dollar von CertiKs Zählung von 723 Millionen Dollar über 248 Vorfälle im selben Jahr abweicht — wahrscheinlich nicht, weil eine der Zahlen falsch ist, sondern weil verschiedene Sicherheitsfirmen „Phishing" unterschiedlich abgrenzen (nur Wallet-Drainer gegenüber zusätzlicher Zählung von Brücken- und Multisig-Exploits), was es riskant macht, eine einzelne branchenweite Zahl als Gesamtbild zu lesen.</p>
<p class="fr">À mesure que le capital se concentre de plus en plus dans un nombre réduit de portefeuilles, chaque phishing réussi rapporte davantage, ce qui signifie que la baisse de 83 % des pertes agrégées mise en avant par ScamSniffer pourrait sous-estimer substantiellement le risque auquel les grands détenteurs font réellement face aujourd'hui. Il convient aussi de noter à quel point le chiffre de 84 millions de dollars de ScamSniffer diverge de celui de CertiK, qui recense 723 millions de dollars sur 248 incidents la même année — probablement non pas parce que l'un des deux chiffres est faux, mais parce que différentes sociétés de sécurité délimitent le « phishing » différemment (uniquement les drainers de portefeuille, contre aussi les exploits de ponts et de multisignature), ce qui rend risqué le fait de lire un seul chiffre à l'échelle du secteur comme représentant l'ensemble du tableau.</p>
<p class="pt">À medida que o capital se concentra cada vez mais em menos carteiras, cada phishing bem-sucedido rende mais, o que significa que a queda de 83% nas perdas agregadas destacada pela ScamSniffer pode subestimar substancialmente o risco que os grandes detentores realmente enfrentam hoje. Também vale notar o quanto o número de US$ 84 milhões da ScamSniffer diverge da contagem da CertiK de US$ 723 milhões em 248 incidentes no mesmo ano — provavelmente não porque algum dos números esteja errado, mas porque diferentes empresas de segurança delimitam "phishing" de forma diferente (apenas drainers de carteira, versus também contar exploits de pontes e multisig), o que torna arriscado ler qualquer número único do setor como o quadro completo.</p>
<p class="tr">Sermaye giderek daha az sayıda cüzdanda yoğunlaştıkça, başarılı her kimlik avı daha fazla kazanç sağlıyor; bu da ScamSniffer'ın vurguladığı %83'lük toplam kayıp düşüşünün, büyük varlık sahiplerinin bugün gerçekte karşı karşıya olduğu riski önemli ölçüde hafife gösterebileceği anlamına geliyor. ScamSniffer'ın 84 milyon dolarlık rakamının, CertiK'in aynı yıl için 248 olayda 723 milyon dolar olarak saydığı rakamdan ne kadar keskin biçimde ayrıldığı da dikkat çekici — bu muhtemelen iki rakamdan birinin yanlış olmasından değil, farklı güvenlik firmalarının "kimlik avını" farklı kapsamlarda tanımlamasından kaynaklanıyor (yalnızca cüzdan boşaltıcıları mı, yoksa köprü ve çoklu imza istismarlarını da mı sayıyorlar), bu da tek bir sektör genelindeki rakamı tüm tabloymuş gibi okumayı riskli kılıyor.</p>
<p class="vi">Khi vốn ngày càng tập trung vào ít ví hơn, mỗi vụ lừa đảo thành công mang lại lợi nhuận lớn hơn, nghĩa là mức giảm 83% tổng thiệt hại mà ScamSniffer nêu bật có thể đánh giá thấp đáng kể rủi ro thực sự mà các nhà nắm giữ lớn phải đối mặt ngày nay. Cũng đáng chú ý là con số 84 triệu USD của ScamSniffer khác biệt mạnh mẽ như thế nào so với con số 723 triệu USD trên 248 sự cố mà CertiK ghi nhận trong cùng năm — có lẽ không phải vì con số nào đó sai, mà vì các công ty bảo mật khác nhau xác định phạm vi "lừa đảo" khác nhau (chỉ tính drainer ví, so với việc còn tính cả các vụ khai thác cầu nối và đa chữ ký), điều này khiến việc đọc bất kỳ con số toàn ngành đơn lẻ nào như bức tranh toàn cảnh trở nên rủi ro.</p>

<p class="ko">앞으로 지켜볼 지점은 두 가지다. 첫째, 리보크캐시(Revoke.cash) 같은 승인 취소 도구와 만료 기한이 있는 승인 기본값을 주요 지갑들이 얼마나 빠르게 채택하는가. 둘째, EIP-7702 같은 새로운 계정 추상화(account abstraction) 표준이 피싱 공격면을 개선할지 오히려 악화시킬지다 — 연구자들은 이미 EIP-7702를 겨냥한 개념 증명(PoC) 피싱 공격을 발표한 바 있어, 다음 세대 계정 추상화 지갑이 신중하게 설계되지 않으면 서명 기반의 유사한 취약점을 다시 들여올 수 있음을 시사한다.</p>
<p class="en">Two things are worth watching going forward. First, how quickly major wallets adopt expiring approval defaults and revocation tooling such as Revoke.cash. Second, whether new account-abstraction standards like EIP-7702 improve or worsen the phishing attack surface — researchers have already published proof-of-concept EIP-7702 phishing attacks, suggesting the next generation of account-abstraction wallets could reintroduce a similar signature-based vulnerability if not carefully designed.</p>
<p class="ja">今後注視すべき点は二つある。第一に、リボークキャッシュ(Revoke.cash)のような取り消しツールや、期限付き承認をデフォルトにする仕組みを主要ウォレットがどれだけ早く採用するか。第二に、EIP-7702のような新しいアカウント抽象化(account abstraction)標準がフィッシングの攻撃面を改善するのか、それとも悪化させるのかだ——研究者らは既にEIP-7702を狙った概念実証(PoC)フィッシング攻撃を発表しており、慎重に設計されなければ次世代のアカウント抽象化ウォレットが同様の署名ベースの脆弱性を再び持ち込みかねないことを示唆している。</p>
<p class="es">Hay dos cosas que vale la pena observar de aquí en adelante. Primero, qué tan rápido adoptan las billeteras principales aprobaciones predeterminadas con vencimiento y herramientas de revocación como Revoke.cash. Segundo, si nuevos estándares de abstracción de cuenta como EIP-7702 mejoran o empeoran la superficie de ataque de phishing —los investigadores ya han publicado ataques de phishing de prueba de concepto contra EIP-7702, lo que sugiere que la próxima generación de billeteras con abstracción de cuenta podría reintroducir una vulnerabilidad similar basada en firmas si no se diseña con cuidado.</p>
<p class="de">Zwei Dinge sind künftig beobachtenswert. Erstens, wie schnell große Wallets standardmäßig ablaufende Freigaben und Widerrufs-Tools wie Revoke.cash übernehmen. Zweitens, ob neue Account-Abstraction-Standards wie EIP-7702 die Phishing-Angriffsfläche verbessern oder verschlechtern — Forscher haben bereits Proof-of-Concept-Phishing-Angriffe gegen EIP-7702 veröffentlicht, was darauf hindeutet, dass die nächste Generation von Account-Abstraction-Wallets eine ähnliche signaturbasierte Schwachstelle wieder einführen könnte, wenn sie nicht sorgfältig gestaltet wird.</p>
<p class="fr">Deux éléments méritent d'être surveillés à l'avenir. Premièrement, la rapidité avec laquelle les principaux portefeuilles adopteront des approbations expirant par défaut et des outils de révocation comme Revoke.cash. Deuxièmement, si les nouveaux standards d'abstraction de compte comme l'EIP-7702 améliorent ou aggravent la surface d'attaque du phishing — des chercheurs ont déjà publié des attaques de phishing de preuve de concept contre l'EIP-7702, suggérant que la prochaine génération de portefeuilles à abstraction de compte pourrait réintroduire une vulnérabilité similaire basée sur la signature si elle n'est pas conçue avec soin.</p>
<p class="pt">Duas coisas merecem atenção daqui para frente. Primeiro, quão rapidamente as principais carteiras adotam aprovações com expiração padrão e ferramentas de revogação como o Revoke.cash. Segundo, se novos padrões de abstração de conta como o EIP-7702 melhoram ou pioram a superfície de ataque de phishing — pesquisadores já publicaram ataques de phishing de prova de conceito contra o EIP-7702, sugerindo que a próxima geração de carteiras com abstração de conta poderia reintroduzir uma vulnerabilidade similar baseada em assinatura se não for cuidadosamente projetada.</p>
<p class="tr">Bundan sonra izlenmeye değer iki şey var. Birincisi, büyük cüzdanların süresi dolan onay varsayılanlarını ve Revoke.cash gibi iptal araçlarını ne kadar hızlı benimseyeceği. İkincisi, EIP-7702 gibi yeni hesap soyutlama (account abstraction) standartlarının kimlik avı saldırı yüzeyini iyileştirip iyileştirmeyeceği ya da kötüleştirip kötüleştirmeyeceği — araştırmacılar EIP-7702'ye yönelik kavram kanıtı (PoC) kimlik avı saldırılarını zaten yayımladı; bu da dikkatle tasarlanmazsa yeni nesil hesap soyutlama cüzdanlarının benzer imza tabanlı bir zafiyeti yeniden getirebileceğini gösteriyor.</p>
<p class="vi">Có hai điều đáng theo dõi trong thời gian tới. Thứ nhất, các ví lớn sẽ áp dụng nhanh đến đâu các mặc định phê duyệt có thời hạn và công cụ thu hồi như Revoke.cash. Thứ hai, liệu các tiêu chuẩn trừu tượng hóa tài khoản mới như EIP-7702 có cải thiện hay làm xấu đi bề mặt tấn công lừa đảo — các nhà nghiên cứu đã công bố các cuộc tấn công lừa đảo dạng bằng chứng khái niệm (PoC) nhắm vào EIP-7702, cho thấy thế hệ ví trừu tượng hóa tài khoản tiếp theo có thể tái xuất hiện một lỗ hổng dựa trên chữ ký tương tự nếu không được thiết kế cẩn thận.</p>

<div class="ko">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">서명 한 번 → 36초 → USDT 99만9999달러 증발</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① 악성 승인 서명</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">가스비 없음 · 온체인 미기록</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ 겉보기엔 "아무 일도 없음"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② 전액 인출 시도 (실패)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">약 100만 달러 요청 → 잔액 부족</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">스크립트가 자동 거부 감지</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">36초 후 재계산</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 멀티콜(Multicall) 하나로 3건 분할 인출</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639,999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159,999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200,000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">합계 ≈ 999,998 USDT ($999,999)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">스캠스니퍼 2025년 데이터</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">전체 피싱 피해: 2024년 $4.94억 → 2025년 $0.84억 (-83%)</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">피해자 1인당 평균 손실은 오히려 증가 — "고래 사냥"형 표적 공격 확산</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">CertiK 집계(2025년 248건, $7.23억)와의 격차는 '피싱' 정의 범위 차이에서 비롯</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">출처: 코인텔레그래프, 크립토타임스, crypto.news, 스캠스니퍼(ScamSniffer), CertiK · 2026년 7월 기준</text>
</svg>
</div>
<div class="en">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">One Signature → 36 Seconds → $999,999 USDT Gone</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Malicious approval signed</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">No gas · not on-chain yet</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Looks like "nothing happened"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Full-drain attempt (fails)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~$1M requested → insufficient funds</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Script auto-detects the rejection</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Recalculates 36 sec later</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 withdrawals bundled in one Multicall</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639,999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159,999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200,000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Total ≈ 999,998 USDT ($999,999)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">ScamSniffer's 2025 Data</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Total phishing losses: $494M (2024) → $84M (2025), -83%</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">Average loss per victim rose instead — "whale hunting" targeted hits spread</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">Gap with CertiK's count (248 incidents, $723M in 2025) stems from differing "phishing" scope</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Sources: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · as of July 2026</text>
</svg>
</div>
<div class="ja">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">署名一つ → 36秒 → USDT99万9999ドルが消失</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① 悪意ある承認署名</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">ガス代なし・未オンチェーン</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ 表面上「何も起きていない」</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② 全額引き出し試行(失敗)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">約100万ドル要求 → 残高不足</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">スクリプトが拒否を自動検知</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">36秒後に再計算</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ マルチコール一つで3件分割引き出し</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639,999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159,999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200,000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">合計 ≈ 999,998 USDT($999,999)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">スキャムスニッファー 2025年データ</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">フィッシング被害総額: 2024年$4.94億 → 2025年$0.84億(-83%)</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">被害者一人当たりの平均損失はむしろ増加 —「ホエールハンティング」型が拡散</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">CertiK集計(2025年248件、$7.23億)との差は「フィッシング」定義範囲の違いに起因</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">出典: コインテレグラフ、クリプトタイムズ、crypto.news、スキャムスニッファー、CertiK · 2026年7月時点</text>
</svg>
</div>
<div class="es">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Una Firma → 36 Segundos → $999,999 en USDT Desaparecidos</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Aprobación maliciosa firmada</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Sin gas · aún no on-chain</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Parece que "no pasó nada"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Intento de vaciado total (falla)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~$1M solicitado → fondos insuficientes</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">El script detecta el rechazo automáticamente</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Recalcula 36 s después</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 retiros agrupados en un Multicall</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639,999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159,999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200,000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Total ≈ 999,998 USDT ($999,999)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">Datos 2025 de ScamSniffer</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Pérdidas totales por phishing: $494M (2024) → $84M (2025), -83%</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">La pérdida promedio por víctima aumentó — se propaga la "caza de ballenas"</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">La brecha con el conteo de CertiK (248 incidentes, $723M en 2025) viene del alcance de "phishing"</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Fuentes: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · a julio de 2026</text>
</svg>
</div>
<div class="de">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Eine Signatur → 36 Sekunden → 999.999 $ USDT Verschwunden</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Bösartige Freigabe signiert</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Kein Gas · noch nicht on-chain</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Sieht aus wie "nichts passiert"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Komplettabfluss-Versuch (scheitert)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~1 Mio.$ angefordert → unzureichende Mittel</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Skript erkennt Ablehnung automatisch</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Neuberechnung 36 Sek. später</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 Abhebungen in einem Multicall gebündelt</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639.999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159.999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200.000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Summe ≈ 999.998 USDT (999.999$)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">ScamSniffers 2025er-Daten</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Gesamte Phishing-Verluste: 494 Mio.$ (2024) → 84 Mio.$ (2025), -83%</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">Durchschnittsverlust pro Opfer stieg stattdessen — "Whale Hunting" breitet sich aus</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">Abweichung zu CertiKs Zählung (248 Vorfälle, 723 Mio.$ in 2025) durch unterschiedlichen "Phishing"-Umfang</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Quellen: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · Stand Juli 2026</text>
</svg>
</div>
<div class="fr">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Une Signature → 36 Secondes → 999 999 $ en USDT Disparus</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Approbation malveillante signée</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Pas de gas · pas encore on-chain</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Semble « ne rien s'être passé »</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Tentative de vidage total (échoue)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~1 M$ demandé → fonds insuffisants</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Le script détecte le rejet automatiquement</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Recalcul 36 s plus tard</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 retraits regroupés en un seul Multicall</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639 999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159 999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200 000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Total ≈ 999 998 USDT (999 999 $)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">Données 2025 de ScamSniffer</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Pertes totales de phishing : 494 M$ (2024) → 84 M$ (2025), -83 %</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">La perte moyenne par victime a plutôt augmenté — la « chasse à la baleine » se répand</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">L'écart avec le décompte de CertiK (248 incidents, 723 M$ en 2025) vient du périmètre du « phishing »</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Sources : Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · en date de juillet 2026</text>
</svg>
</div>
<div class="pt">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Uma Assinatura → 36 Segundos → US$ 999.999 em USDT Sumiram</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Aprovação maliciosa assinada</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Sem gas · ainda não on-chain</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Parece que "nada aconteceu"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Tentativa de drenagem total (falha)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~US$ 1M solicitado → fundos insuficientes</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Script detecta a rejeição automaticamente</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Recalcula 36 s depois</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 saques agrupados em um único Multicall</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639.999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159.999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200.000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Total ≈ 999.998 USDT (US$ 999.999)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">Dados de 2025 da ScamSniffer</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Perdas totais com phishing: US$ 494M (2024) → US$ 84M (2025), -83%</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">A perda média por vítima aumentou — a "caça a baleias" se espalha</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">A diferença com a contagem da CertiK (248 incidentes, US$ 723M em 2025) vem do escopo de "phishing"</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Fontes: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · em julho de 2026</text>
</svg>
</div>
<div class="tr">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Tek İmza → 36 Saniye → 999.999 Dolarlık USDT Yok Oldu</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Kötü niyetli onay imzalandı</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Gaz yok · henüz zincirde değil</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ "Hiçbir şey olmadı" gibi görünüyor</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Tam boşaltma denemesi (başarısız)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">~1M$ istendi → yetersiz bakiye</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Betik reddi otomatik algılıyor</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">36 sn sonra yeniden hesaplıyor</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ Tek Multicall'da paketlenmiş 3 çekim</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639.999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159.999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200.000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Toplam ≈ 999.998 USDT (999.999$)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">ScamSniffer'ın 2025 Verileri</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Toplam kimlik avı kaybı: 494M$ (2024) → 84M$ (2025), -%83</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">Kurban başına ortalama kayıp yükseldi — "balina avcılığı" hedefli saldırılar yayılıyor</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">CertiK'in sayımıyla (2025'te 248 olay, 723M$) fark, "kimlik avı" kapsam tanımından kaynaklanıyor</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Kaynaklar: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · Temmuz 2026 itibarıyla</text>
</svg>
</div>
<div class="vi">
<svg viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="28" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Một Chữ Ký → 36 Giây → 999.999 USD USDT Biến Mất</text>
  <g font-family="sans-serif">
    <rect x="20" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="165" y="80" fill="#e4e4e7" font-size="13" font-weight="700" text-anchor="middle">① Ký phê duyệt độc hại</text>
    <text x="165" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Không tốn gas · chưa lên chuỗi</text>
    <text x="165" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">→ Trông như "không có gì xảy ra"</text>

    <rect x="390" y="55" width="290" height="80" rx="10" fill="#18181b" stroke="#f87171" stroke-width="1"/>
    <text x="535" y="80" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">② Thử rút toàn bộ (thất bại)</text>
    <text x="535" y="102" fill="#a1a1aa" font-size="12" text-anchor="middle">Yêu cầu ~1 triệu$ → không đủ tiền</text>
    <text x="535" y="120" fill="#a1a1aa" font-size="12" text-anchor="middle">Kịch bản tự phát hiện việc từ chối</text>

    <line x1="165" y1="135" x2="165" y2="165" stroke="#3f3f46" stroke-width="2"/>
    <line x1="535" y1="135" x2="535" y2="165" stroke="#f87171" stroke-width="2"/>
    <text x="350" y="158" fill="#fbbf24" font-size="14" font-weight="700" text-anchor="middle">Tính lại sau 36 giây</text>

    <rect x="20" y="175" width="660" height="95" rx="10" fill="#18181b" stroke="#71717a" stroke-width="1"/>
    <text x="350" y="200" fill="#fafafa" font-size="14" font-weight="700" text-anchor="middle">③ 3 lần rút gộp trong một Multicall</text>
    <text x="180" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">639.999 USDT</text>
    <text x="350" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">159.999 USDT</text>
    <text x="520" y="228" fill="#e4e4e7" font-size="13" text-anchor="middle">200.000 USDT</text>
    <text x="350" y="252" fill="#fca5a5" font-size="13" font-weight="700" text-anchor="middle">Tổng ≈ 999.998 USDT (999.999$)</text>

    <rect x="20" y="285" width="660" height="105" rx="10" fill="#18181b" stroke="#3f3f46" stroke-width="1"/>
    <text x="40" y="311" fill="#fafafa" font-size="14" font-weight="700">Dữ liệu 2025 của ScamSniffer</text>
    <text x="40" y="335" fill="#e4e4e7" font-size="13">Tổng thiệt hại lừa đảo: 494 triệu$ (2024) → 84 triệu$ (2025), -83%</text>
    <text x="40" y="357" fill="#e4e4e7" font-size="13">Thiệt hại trung bình mỗi nạn nhân lại tăng — kiểu "săn cá voi" đang lan rộng</text>
    <text x="40" y="378" fill="#a1a1aa" font-size="12">Khoảng cách với số liệu của CertiK (248 vụ, 723 triệu$ năm 2025) đến từ phạm vi định nghĩa "lừa đảo"</text>
  </g>
  <text x="350" y="408" fill="#71717a" font-size="12" text-anchor="middle" font-family="sans-serif">Nguồn: Cointelegraph, CryptoTimes, crypto.news, ScamSniffer, CertiK · tính đến tháng 7/2026</text>
</svg>
</div>

<div class="box ko">💡 <strong>정리:</strong> 7월 9일 이더리움 지갑 한 곳이 악성 토큰 승인 서명 한 번으로 USDT 99만9999달러를 잃었다. 자동 스크립트는 전액 인출에 실패한 뒤 36초 만에 재계산해 멀티콜로 세 차례 나눠 빼갔다. 이는 프로토콜 버그가 아니라 무제한 approve·EIP-2612 퍼밋이라는 설계 자체의 구조적 취약점이며, 스캠스니퍼 데이터가 보여주듯 업계는 다수 저가치 스팸에서 소수의 부유한 지갑을 노리는 '고래 사냥'으로 옮겨가고 있다.</div>
<div class="box en">💡 <strong>Bottom line:</strong> On July 9, an Ethereum wallet lost 999,999 USDT to a single malicious token-approval signature. An automated script failed to drain the full balance, then recalculated 36 seconds later and pulled the funds in three Multicall-bundled withdrawals. This isn't a protocol bug — it's a structural weakness in how unlimited approve and EIP-2612 permit are designed by default, and as ScamSniffer's data shows, the industry is shifting from mass low-value spam toward "whale hunting" targeting fewer, wealthier wallets.</div>
<div class="box ja">💡 <strong>まとめ:</strong> 7月9日、あるイーサリアムウォレットが悪意あるトークン承認署名一つでUSDT99万9999ドルを失った。自動スクリプトは全額引き出しに失敗した後、36秒後に再計算しマルチコールで3回に分けて資金を抜き取った。これはプロトコルのバグではなく、無制限approveとEIP-2612パーミットという設計自体の構造的脆弱性であり、スキャムスニッファーのデータが示す通り、業界は多数の低価値スパムから少数の富裕なウォレットを狙う「ホエールハンティング」へと移行している。</div>
<div class="box es">💡 <strong>En resumen:</strong> El 9 de julio, una billetera de Ethereum perdió 999.999 USDT por una única firma maliciosa de aprobación de token. Un script automatizado no logró vaciar todo el saldo, luego recalculó 36 segundos después y extrajo los fondos en tres retiros agrupados por Multicall. No es un error de protocolo —es una debilidad estructural en cómo se diseñan por defecto el approve ilimitado y el permit de EIP-2612, y como muestran los datos de ScamSniffer, la industria está pasando del spam masivo de bajo valor a la "caza de ballenas" dirigida a menos billeteras, pero más ricas.</div>
<div class="box de">💡 <strong>Fazit:</strong> Am 9. Juli verlor eine Ethereum-Wallet durch eine einzige bösartige Token-Freigabe-Signatur 999.999 USDT. Ein automatisiertes Skript scheiterte daran, das gesamte Guthaben abzuziehen, berechnete dann 36 Sekunden später neu und zog die Mittel in drei per Multicall gebündelten Abhebungen ab. Das ist kein Protokollfehler — es ist eine strukturelle Schwäche darin, wie unbegrenztes approve und EIP-2612-Permit standardmäßig gestaltet sind, und wie die Daten von ScamSniffer zeigen, verlagert sich die Branche von massenhaftem, geringwertigem Spam hin zu "Whale Hunting", das auf weniger, aber reichere Wallets abzielt.</div>
<div class="box fr">💡 <strong>En résumé :</strong> Le 9 juillet, un portefeuille Ethereum a perdu 999 999 USDT à cause d'une seule signature malveillante d'approbation de token. Un script automatisé n'a pas réussi à vider tout le solde, a ensuite recalculé 36 secondes plus tard et a retiré les fonds en trois retraits groupés via Multicall. Ce n'est pas un bug de protocole — c'est une faiblesse structurelle dans la manière dont l'approbation illimitée et le permit de l'EIP-2612 sont conçus par défaut, et comme le montrent les données de ScamSniffer, le secteur passe du spam massif à faible valeur à la « chasse à la baleine » ciblant moins de portefeuilles, mais plus riches.</div>
<div class="box pt">💡 <strong>Resumo:</strong> Em 9 de julho, uma carteira Ethereum perdeu 999.999 USDT para uma única assinatura maliciosa de aprovação de token. Um script automatizado não conseguiu drenar o saldo total, depois recalculou 36 segundos depois e retirou os fundos em três saques agrupados via Multicall. Isso não é um bug de protocolo — é uma fraqueza estrutural em como a aprovação ilimitada e o permit do EIP-2612 são projetados por padrão, e como os dados da ScamSniffer mostram, o setor está migrando do spam massivo de baixo valor para a "caça a baleias" mirando menos carteiras, porém mais ricas.</div>
<div class="box tr">💡 <strong>Özet:</strong> 9 Temmuz'da bir Ethereum cüzdanı tek bir kötü niyetli token onay imzasıyla 999.999 USDT kaybetti. Otomatik bir betik tüm bakiyeyi boşaltmayı başaramadı, ardından 36 saniye sonra yeniden hesaplayarak fonları üç Multicall'da paketlenmiş çekimle çekti. Bu bir protokol hatası değil — sınırsız approve ve EIP-2612 permit'in varsayılan olarak nasıl tasarlandığına dair yapısal bir zayıflık ve ScamSniffer'ın verilerinin gösterdiği gibi, sektör kitlesel düşük değerli spam'den daha az ama daha zengin cüzdanları hedefleyen "balina avcılığına" kayıyor.</div>
<div class="box vi">💡 <strong>Chốt lại:</strong> Vào ngày 9/7, một ví Ethereum đã mất 999.999 USDT vì một chữ ký phê duyệt token độc hại duy nhất. Một kịch bản tự động không rút được toàn bộ số dư, sau đó tính toán lại 36 giây sau và rút tiền qua ba lần rút được gộp bằng Multicall. Đây không phải là lỗi giao thức — mà là điểm yếu mang tính cấu trúc trong cách approve không giới hạn và permit EIP-2612 được thiết kế theo mặc định, và như dữ liệu của ScamSniffer cho thấy, ngành đang chuyển từ spam hàng loạt giá trị thấp sang "săn cá voi" nhắm vào ít ví hơn nhưng giàu có hơn.</div>

<p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: 코인텔레그래프(Cointelegraph), 크립토타임스(CryptoTimes), crypto.news, GN크립토(GNCrypto), 크라이프(Cryip), 유즈더비트코인(UseTheBitcoin), 스캠스니퍼(ScamSniffer), CertiK. 피해 규모·거래 세부 내역은 각 매체 보도 시점 기준이며 조사 진행에 따라 바뀔 수 있다.</p>
<p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Loss figures and transaction details are as of each outlet's reporting and may change as investigations continue.</p>
<p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: コインテレグラフ(Cointelegraph)、クリプトタイムズ(CryptoTimes)、crypto.news、GNクリプト(GNCrypto)、クライプ(Cryip)、ユーズザビットコイン(UseTheBitcoin)、スキャムスニッファー(ScamSniffer)、CertiK。被害額・取引詳細は各媒体の報道時点のものであり、調査の進行に伴い変わる可能性がある。</p>
<p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Las cifras de pérdidas y detalles de transacciones corresponden a la fecha de cada informe y pueden cambiar conforme avancen las investigaciones.</p>
<p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Verlustzahlen und Transaktionsdetails entsprechen dem jeweiligen Berichtszeitpunkt und können sich im Zuge weiterer Ermittlungen ändern.</p>
<p class="fr" style="font-size:12px;color:#52525b;margin-top:24px">Sources : Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Les chiffres de pertes et les détails des transactions correspondent à la date de chaque rapport et peuvent évoluer avec l'avancée des enquêtes.</p>
<p class="pt" style="font-size:12px;color:#52525b;margin-top:24px">Fontes: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Os números de perdas e detalhes das transações referem-se à data de cada reportagem e podem mudar conforme as investigações avançam.</p>
<p class="tr" style="font-size:12px;color:#52525b;margin-top:24px">Kaynaklar: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Kayıp rakamları ve işlem detayları her kaynağın yayın tarihine aittir ve soruşturmalar ilerledikçe değişebilir.</p>
<p class="vi" style="font-size:12px;color:#52525b;margin-top:24px">Nguồn: Cointelegraph, CryptoTimes, crypto.news, GNCrypto, Cryip, UseTheBitcoin, ScamSniffer, CertiK. Số liệu thiệt hại và chi tiết giao dịch tính theo thời điểm đưa tin của từng nguồn và có thể thay đổi khi điều tra tiếp diễn.</p>
<?php require __DIR__.'/_footer.php'; ?>
