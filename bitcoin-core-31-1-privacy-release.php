<?php $slug = 'bitcoin-core-31-1-privacy-release'; require __DIR__.'/_header.php'; ?>

<p class="ko">비트코인의 참조 구현 소프트웨어인 비트코인 코어(Bitcoin Core)가 31.1 버전의 첫 릴리스 후보(31.1rc1)를 지난 1일 공개하고 공개 테스트 단계에 들어갔다. 크립토뉴스(crypto.news)와 코인게이프(CoinGape) 등에 따르면 이번 판의 핵심은 프라이버시 기능인 'PrivateBroadcast'에서 특정 네트워크 조건일 때 사용자의 실제 IP 주소가 노출될 수 있던 결함을 바로잡은 것으로 나타났다. 함께 MuSig2 다중서명 검증 로직이 강화됐고, 블록체인 검증·저장 방식도 개선됐다. 비트코인 코어 측은 아직 안정판(stable) 출시 일정을 확정하지 않았으며, 릴리스 후보 단계는 커뮤니티 테스트 결과에 따라 길이가 정해진다고 밝혔다.</p>
  <p class="en">Bitcoin Core, the reference implementation software for Bitcoin, published the first release candidate of version 31.1 (31.1rc1) on July 1 and entered a public testing phase. According to crypto.news and CoinGape, the release's centerpiece is a fix for a flaw in the "PrivateBroadcast" privacy feature that, under specific network conditions, could expose a user's real IP address. The version also hardens MuSig2 multisignature verification logic and improves blockchain validation and storage. Bitcoin Core has not set a date for the stable release, saying the length of the release-candidate phase is determined by community testing results.</p>
  <p class="ja">ビットコインの参照実装ソフトウェアであるBitcoin Coreが、バージョン31.1の最初のリリース候補(31.1rc1)を1日に公開し、公開テスト段階に入った。crypto.newsやCoinGapeなどによると、今回の版の核心は、プライバシー機能「PrivateBroadcast」において特定のネットワーク条件下でユーザーの実際のIPアドレスが露出しうる欠陥を修正した点にあることが分かった。あわせてMuSig2マルチシグ検証ロジックが強化され、ブロックチェーンの検証・保存方式も改善された。Bitcoin Core側はまだ安定版(stable)のリリース時期を確定しておらず、リリース候補段階の長さはコミュニティのテスト結果によって決まると明らかにした。</p>
  <p class="es">Bitcoin Core, el software de implementación de referencia de Bitcoin, publicó el primer candidato de lanzamiento de la versión 31.1 (31.1rc1) el 1 de julio y entró en una fase de pruebas públicas. Según crypto.news y CoinGape, el eje de esta versión es la corrección de una falla en la función de privacidad "PrivateBroadcast" que, bajo condiciones de red específicas, podía exponer la dirección IP real de un usuario. La versión también refuerza la lógica de verificación de multifirma MuSig2 y mejora la validación y el almacenamiento de la blockchain. Bitcoin Core no ha fijado una fecha para el lanzamiento estable, indicando que la duración de la fase de candidato de lanzamiento se determina por los resultados de las pruebas de la comunidad.</p>
  <p class="de">Bitcoin Core, die Referenzimplementierungs-Software für Bitcoin, veröffentlichte am 1. Juli den ersten Release-Candidate der Version 31.1 (31.1rc1) und trat in eine öffentliche Testphase ein. Laut crypto.news und CoinGape ist das Kernstück dieser Version die Behebung eines Fehlers in der Datenschutzfunktion "PrivateBroadcast", der unter bestimmten Netzwerkbedingungen die echte IP-Adresse eines Nutzers offenlegen konnte. Die Version härtet zudem die Verifizierungslogik der MuSig2-Mehrfachsignatur und verbessert die Blockchain-Validierung und -Speicherung. Bitcoin Core hat kein Datum für die stabile Veröffentlichung festgelegt und erklärt, dass die Länge der Release-Candidate-Phase durch die Ergebnisse der Community-Tests bestimmt wird.</p>

  <h2 class="ko">무엇이 바뀌었나</h2>
  <h2 class="en">What changed</h2>
  <h2 class="ja">何が変わったのか</h2>
  <h2 class="es">Qué cambió</h2>
  <h2 class="de">Was sich geändert hat</h2>
  <p class="ko">이번 판은 31.0(지난 4월 19일 출시)에 이은 마이너 릴리스로, 합의 규칙(consensus)을 바꾸는 하드포크가 아니다. 즉 대다수 사용자에게 눈에 보이는 새 기능은 없고, 성격상 보안·유지보수 업데이트에 가깝다. 구체적으로는 세 갈래다. 첫째, PrivateBroadcast 기능의 IP 노출 결함 수정이다. 이 기능은 사용자가 자기 지갑 거래를 토르(Tor) 같은 프라이버시 네트워크 뒤에서 조용히 전파하도록 설계됐는데, 특정 조건에서 그 보호막이 벗겨지고 실제 인터넷 주소가 드러날 수 있었다. 둘째, 코인게이프·쿠코인(KuCoin) 보도에 따르면 MuSig2 서명 집계 과정에서 빈 공개키 목록이나 무효한 공개키가 집계 이전에 걸러지도록 검증이 강화됐다. 셋째, 거래 데이터를 더 효율적으로 처리해 데이터베이스를 정돈하고 불필요한 저장공간 증가를 줄여 장기 성능을 개선했다. 지원 운영체제는 리눅스·맥OS·윈도이며, 최근 버전에서는 곧바로 업그레이드할 수 있다.</p>
  <p class="en">This is a minor release following 31.0 (shipped April 19) and is not a consensus-changing hard fork. In other words, there is no visible new feature for most users; by nature it is closer to a security and maintenance update. Concretely, it splits into three parts. First, the IP-exposure fix in PrivateBroadcast. That feature is designed to let a user quietly broadcast their own wallet transactions from behind a privacy network such as Tor, but under specific conditions that shield could slip and the real internet address could be revealed. Second, per CoinGape and KuCoin reporting, MuSig2 signature aggregation was hardened so that empty public-key lists or invalid public keys are rejected before aggregation begins. Third, transaction data is handled more efficiently, tidying the database and reducing unnecessary storage growth to improve long-term performance. Supported operating systems are Linux, macOS, and Windows, and recent versions can upgrade directly.</p>
  <p class="ja">今回の版は31.0(4月19日リリース)に続くマイナーリリースで、合意ルール(consensus)を変えるハードフォークではない。つまり大多数のユーザーに目に見える新機能はなく、性格としてはセキュリティ・保守アップデートに近い。具体的には三つに分かれる。第一に、PrivateBroadcast機能のIP露出欠陥の修正だ。この機能はユーザーが自分のウォレット取引をTorなどのプライバシーネットワークの背後で静かに伝播するよう設計されているが、特定の条件下でその保護膜が剥がれ実際のインターネットアドレスが露見しうる状態だった。第二に、CoinGapeやKuCoinの報道によれば、MuSig2署名集計の過程で空の公開鍵リストや無効な公開鍵が集計前に排除されるよう検証が強化された。第三に、取引データをより効率的に処理してデータベースを整理し、不要なストレージ増加を減らして長期性能を改善した。対応OSはLinux・macOS・Windowsで、最近のバージョンからは直接アップグレードできる。</p>
  <p class="es">Esta es una versión menor que sigue a la 31.0 (lanzada el 19 de abril) y no es un hard fork que cambie el consenso. En otras palabras, no hay una función nueva visible para la mayoría de los usuarios; por naturaleza está más cerca de una actualización de seguridad y mantenimiento. En concreto, se divide en tres partes. Primero, la corrección de exposición de IP en PrivateBroadcast. Esa función está diseñada para que un usuario transmita silenciosamente sus propias transacciones de billetera desde detrás de una red de privacidad como Tor, pero bajo condiciones específicas ese escudo podía deslizarse y revelarse la dirección real de internet. Segundo, según informes de CoinGape y KuCoin, la agregación de firmas MuSig2 se reforzó para que las listas de claves públicas vacías o las claves públicas inválidas se rechacen antes de que comience la agregación. Tercero, los datos de transacciones se manejan de forma más eficiente, ordenando la base de datos y reduciendo el crecimiento innecesario de almacenamiento para mejorar el rendimiento a largo plazo. Los sistemas operativos compatibles son Linux, macOS y Windows, y las versiones recientes pueden actualizarse directamente.</p>
  <p class="de">Dies ist ein Minor-Release nach 31.0 (veröffentlicht am 19. April) und kein konsensändernder Hard Fork. Mit anderen Worten, es gibt für die meisten Nutzer keine sichtbare neue Funktion; von Natur aus ist es eher ein Sicherheits- und Wartungsupdate. Konkret gliedert es sich in drei Teile. Erstens die IP-Offenlegungs-Korrektur in PrivateBroadcast. Diese Funktion ist darauf ausgelegt, dass ein Nutzer seine eigenen Wallet-Transaktionen leise hinter einem Datenschutznetzwerk wie Tor sendet, aber unter bestimmten Bedingungen konnte dieser Schutz abrutschen und die echte Internetadresse offengelegt werden. Zweitens wurde laut Berichten von CoinGape und KuCoin die MuSig2-Signaturaggregation gehärtet, sodass leere Public-Key-Listen oder ungültige Public Keys vor Beginn der Aggregation abgewiesen werden. Drittens werden Transaktionsdaten effizienter verarbeitet, was die Datenbank aufräumt und unnötiges Speicherwachstum reduziert, um die langfristige Leistung zu verbessern. Unterstützte Betriebssysteme sind Linux, macOS und Windows, und aktuelle Versionen können direkt aktualisiert werden.</p>

  <h2 class="ko">'조용한 실패'가 특히 위험한 이유</h2>
  <h2 class="en">Why a silent failure is especially dangerous</h2>
  <h2 class="ja">「静かな失敗」が特に危険な理由</h2>
  <h2 class="es">Por qué un fallo silencioso es especialmente peligroso</h2>
  <h2 class="de">Warum ein stilles Versagen besonders gefährlich ist</h2>
  <p class="ko">세 변경 중 가장 주목할 만한 건 프라이버시 결함이다. 보안에서 가장 다루기 까다로운 유형이 바로 이런 '조용한 실패(silent failure)'다. 프라이버시 기능이 아예 없었다면 사용자는 스스로 조심했을 텐데, 있는데도 특정 조건에서 소리 없이 작동을 멈추면 사용자는 보호받고 있다고 착각한 채 거래를 계속하게 된다. 즉 노출 자체보다도, 사용자가 안전하다고 믿었다는 사실이 더 큰 문제다. IP가 드러나면 그 거래를 특정 노드에 연결할 수 있게 되고, 이는 온체인 주소를 실제 신원이나 지리적 위치에 연결하는 첫 실마리가 된다. 비트코인 거래 내역 자체는 공개돼 있어도, 그 거래를 '누가' 처음 방송했는지는 원래 숨겨져 있어야 할 정보이기 때문이다. 이번 수정이 별도 CVE 번호를 부여받은 치명적 취약점 등급인지는 공개 정보만으로 단정하기 어렵지만, 프라이버시를 이유로 이 기능을 켜둔 사용자에게는 실질적 의미가 있는 변경이다.</p>
  <p class="en">Of the three changes, the privacy flaw is the most noteworthy. The trickiest category in security is precisely this kind of "silent failure." Had the privacy feature not existed at all, users would have been cautious on their own; but when it exists and quietly stops working under specific conditions, users keep transacting under the mistaken belief that they are protected. In other words, the bigger problem than the exposure itself is that the user believed they were safe. A revealed IP makes it possible to tie a transaction to a specific node, and that becomes the first thread linking an on-chain address to a real identity or geographic location. Even though Bitcoin's transaction history is itself public, "who" first broadcast a transaction is information that was supposed to stay hidden. Whether this fix carries a dedicated CVE and a critical-severity rating cannot be stated definitively from public information alone, but for any user who kept this feature on for privacy reasons, it is a change with real meaning.</p>
  <p class="ja">三つの変更のうち最も注目すべきはプライバシー欠陥だ。セキュリティで最も扱いにくい類型が、まさにこの「静かな失敗(silent failure)」である。プライバシー機能がそもそも無ければユーザーは自ら用心しただろうが、あるのに特定条件下で音もなく動作を止めると、ユーザーは保護されていると錯覚したまま取引を続けてしまう。つまり露出そのものよりも、ユーザーが安全だと信じていたという事実のほうが大きな問題だ。IPが露見すればその取引を特定のノードに結びつけられるようになり、これはオンチェーンアドレスを実際の身元や地理的位置に結びつける最初の糸口になる。ビットコインの取引履歴自体は公開されていても、その取引を「誰が」最初に放送したかは本来隠されているべき情報だからだ。今回の修正が個別のCVE番号を付与された致命的脆弱性の等級かどうかは公開情報だけでは断定しにくいが、プライバシーを理由にこの機能を有効にしていたユーザーには実質的な意味のある変更だ。</p>
  <p class="es">De los tres cambios, la falla de privacidad es la más notable. La categoría más complicada en seguridad es precisamente este tipo de "fallo silencioso". Si la función de privacidad no hubiera existido en absoluto, los usuarios habrían sido cautelosos por su cuenta; pero cuando existe y deja de funcionar en silencio bajo condiciones específicas, los usuarios siguen operando bajo la creencia errónea de que están protegidos. En otras palabras, el problema mayor que la exposición misma es que el usuario creía estar seguro. Una IP revelada permite vincular una transacción a un nodo específico, y eso se convierte en el primer hilo que conecta una dirección on-chain con una identidad real o una ubicación geográfica. Aunque el historial de transacciones de Bitcoin es en sí mismo público, "quién" transmitió primero una transacción es información que se suponía debía permanecer oculta. Si esta corrección lleva un CVE dedicado y una clasificación de severidad crítica no puede afirmarse con certeza solo con información pública, pero para cualquier usuario que mantuvo activa esta función por razones de privacidad, es un cambio con significado real.</p>
  <p class="de">Von den drei Änderungen ist der Datenschutzfehler der bemerkenswerteste. Die kniffligste Kategorie in der Sicherheit ist genau diese Art von "stillem Versagen". Hätte die Datenschutzfunktion gar nicht existiert, wären die Nutzer von sich aus vorsichtig gewesen; wenn sie aber existiert und unter bestimmten Bedingungen leise aufhört zu funktionieren, transagieren die Nutzer weiter im irrigen Glauben, geschützt zu sein. Mit anderen Worten, das größere Problem als die Offenlegung selbst ist, dass der Nutzer sich sicher glaubte. Eine offengelegte IP macht es möglich, eine Transaktion an einen bestimmten Knoten zu binden, und das wird zum ersten Faden, der eine On-Chain-Adresse mit einer realen Identität oder einem geografischen Ort verbindet. Obwohl Bitcoins Transaktionshistorie selbst öffentlich ist, ist "wer" eine Transaktion zuerst gesendet hat eine Information, die verborgen bleiben sollte. Ob dieser Fix ein eigenes CVE und eine kritische Schweregrad-Einstufung trägt, lässt sich allein aus öffentlichen Informationen nicht abschließend sagen, aber für jeden Nutzer, der diese Funktion aus Datenschutzgründen aktiviert ließ, ist es eine Änderung mit realer Bedeutung.</p>

  <div class="ko">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">릴리스에서 네트워크 반영까지 — 탈중앙 소프트웨어의 보안 시차</text>
    <g font-family="sans-serif">
      <rect x="15" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="90" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.0</text>
      <text x="90" y="102" fill="#71717a" text-anchor="middle" font-size="10">안정판 · 4/19</text>
      <rect x="190" y="55" width="150" height="66" rx="8" fill="#26210f" stroke="#f7931a" stroke-width="1.8"/>
      <text x="265" y="82" fill="#f7931a" text-anchor="middle" font-size="13" font-weight="700">31.1rc1</text>
      <text x="265" y="102" fill="#e4e4e7" text-anchor="middle" font-size="10">테스트 · 7/1 (현재)</text>
      <rect x="365" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="440" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.1 안정판</text>
      <text x="440" y="102" fill="#71717a" text-anchor="middle" font-size="10">일정 미정</text>
      <rect x="530" y="55" width="155" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="607" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">네트워크 반영</text>
      <text x="607" y="102" fill="#71717a" text-anchor="middle" font-size="10">수주~수개월 · 자발적</text>
      <text x="177" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="352" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="522" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <rect x="15" y="150" width="670" height="44" rx="8" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.3"/>
      <text x="350" y="169" fill="#ef4444" text-anchor="middle" font-size="11" font-weight="700">보안·프라이버시 수정은 '실제로 업그레이드한 노드'만 보호한다</text>
      <text x="350" y="186" fill="#a1a1aa" text-anchor="middle" font-size="10">강제 자동 업데이트가 없는 구조 — 수정 배포 ≠ 네트워크 안전</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">From release to network adoption — the security lag of decentralized software</text>
    <g font-family="sans-serif">
      <rect x="15" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="90" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.0</text>
      <text x="90" y="102" fill="#71717a" text-anchor="middle" font-size="10">stable · Apr 19</text>
      <rect x="190" y="55" width="150" height="66" rx="8" fill="#26210f" stroke="#f7931a" stroke-width="1.8"/>
      <text x="265" y="82" fill="#f7931a" text-anchor="middle" font-size="13" font-weight="700">31.1rc1</text>
      <text x="265" y="102" fill="#e4e4e7" text-anchor="middle" font-size="10">testing · Jul 1 (now)</text>
      <rect x="365" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="440" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.1 stable</text>
      <text x="440" y="102" fill="#71717a" text-anchor="middle" font-size="10">date TBD</text>
      <rect x="530" y="55" width="155" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="607" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">network adoption</text>
      <text x="607" y="102" fill="#71717a" text-anchor="middle" font-size="10">weeks–months · opt-in</text>
      <text x="177" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="352" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="522" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <rect x="15" y="150" width="670" height="44" rx="8" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.3"/>
      <text x="350" y="169" fill="#ef4444" text-anchor="middle" font-size="11" font-weight="700">A security/privacy fix only protects nodes that actually upgrade</text>
      <text x="350" y="186" fill="#a1a1aa" text-anchor="middle" font-size="10">No forced auto-update — fix shipped &#8800; network safe</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">リリースからネットワーク反映まで — 分散型ソフトのセキュリティ時差</text>
    <g font-family="sans-serif">
      <rect x="15" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="90" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.0</text>
      <text x="90" y="102" fill="#71717a" text-anchor="middle" font-size="10">安定版 · 4/19</text>
      <rect x="190" y="55" width="150" height="66" rx="8" fill="#26210f" stroke="#f7931a" stroke-width="1.8"/>
      <text x="265" y="82" fill="#f7931a" text-anchor="middle" font-size="13" font-weight="700">31.1rc1</text>
      <text x="265" y="102" fill="#e4e4e7" text-anchor="middle" font-size="10">テスト · 7/1 (現在)</text>
      <rect x="365" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="440" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.1 安定版</text>
      <text x="440" y="102" fill="#71717a" text-anchor="middle" font-size="10">日程未定</text>
      <rect x="530" y="55" width="155" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="607" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">ネットワーク反映</text>
      <text x="607" y="102" fill="#71717a" text-anchor="middle" font-size="10">数週間~数ヶ月 · 任意</text>
      <text x="177" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="352" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="522" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <rect x="15" y="150" width="670" height="44" rx="8" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.3"/>
      <text x="350" y="169" fill="#ef4444" text-anchor="middle" font-size="11" font-weight="700">セキュリティ・プライバシー修正は「実際に更新したノード」だけを守る</text>
      <text x="350" y="186" fill="#a1a1aa" text-anchor="middle" font-size="10">強制自動更新がない構造 — 修正配布 ≠ ネットワークの安全</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Del lanzamiento a la adopción — el desfase de seguridad del software descentralizado</text>
    <g font-family="sans-serif">
      <rect x="15" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="90" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.0</text>
      <text x="90" y="102" fill="#71717a" text-anchor="middle" font-size="10">estable · 19 abr</text>
      <rect x="190" y="55" width="150" height="66" rx="8" fill="#26210f" stroke="#f7931a" stroke-width="1.8"/>
      <text x="265" y="82" fill="#f7931a" text-anchor="middle" font-size="13" font-weight="700">31.1rc1</text>
      <text x="265" y="102" fill="#e4e4e7" text-anchor="middle" font-size="10">pruebas · 1 jul (ahora)</text>
      <rect x="365" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="440" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.1 estable</text>
      <text x="440" y="102" fill="#71717a" text-anchor="middle" font-size="10">fecha por definir</text>
      <rect x="530" y="55" width="155" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="607" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">adopción de red</text>
      <text x="607" y="102" fill="#71717a" text-anchor="middle" font-size="10">semanas–meses · voluntario</text>
      <text x="177" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="352" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="522" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <rect x="15" y="150" width="670" height="44" rx="8" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.3"/>
      <text x="350" y="169" fill="#ef4444" text-anchor="middle" font-size="11" font-weight="700">Una corrección de seguridad solo protege a los nodos que realmente se actualizan</text>
      <text x="350" y="186" fill="#a1a1aa" text-anchor="middle" font-size="10">Sin auto-actualización forzada — corrección publicada &#8800; red segura</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 210" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Von der Veröffentlichung zur Adoption — die Sicherheitsverzögerung dezentraler Software</text>
    <g font-family="sans-serif">
      <rect x="15" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="90" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.0</text>
      <text x="90" y="102" fill="#71717a" text-anchor="middle" font-size="10">stabil · 19. Apr</text>
      <rect x="190" y="55" width="150" height="66" rx="8" fill="#26210f" stroke="#f7931a" stroke-width="1.8"/>
      <text x="265" y="82" fill="#f7931a" text-anchor="middle" font-size="13" font-weight="700">31.1rc1</text>
      <text x="265" y="102" fill="#e4e4e7" text-anchor="middle" font-size="10">Test · 1. Jul (jetzt)</text>
      <rect x="365" y="55" width="150" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="440" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">31.1 stabil</text>
      <text x="440" y="102" fill="#71717a" text-anchor="middle" font-size="10">Datum offen</text>
      <rect x="530" y="55" width="155" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.5"/>
      <text x="607" y="82" fill="#e4e4e7" text-anchor="middle" font-size="13" font-weight="700">Netzwerk-Adoption</text>
      <text x="607" y="102" fill="#71717a" text-anchor="middle" font-size="10">Wochen–Monate · freiwillig</text>
      <text x="177" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="352" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <text x="522" y="93" fill="#52525b" font-size="16">&#8594;</text>
      <rect x="15" y="150" width="670" height="44" rx="8" fill="#1c1c1f" stroke="#ef4444" stroke-width="1.3"/>
      <text x="350" y="169" fill="#ef4444" text-anchor="middle" font-size="11" font-weight="700">Ein Sicherheitsfix schützt nur Knoten, die tatsächlich aktualisieren</text>
      <text x="350" y="186" fill="#a1a1aa" text-anchor="middle" font-size="10">Kein erzwungenes Auto-Update — Fix veröffentlicht &#8800; Netzwerk sicher</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">'수정 배포'와 '네트워크 반영' 사이의 시차</h2>
  <h2 class="en">The gap between 'fix shipped' and 'network adopted'</h2>
  <h2 class="ja">「修正配布」と「ネットワーク反映」の時差</h2>
  <h2 class="es">El desfase entre 'corrección publicada' y 'red que la adopta'</h2>
  <h2 class="de">Die Lücke zwischen 'Fix veröffentlicht' und 'Netzwerk übernommen'</h2>
  <p class="ko">여기서 놓치기 쉬운 지점이 있다. 수정이 배포됐다는 것과 네트워크가 실제로 안전해졌다는 것은 전혀 다른 이야기다. 중앙 서버를 둔 서비스라면 회사가 전체 사용자에게 강제 업데이트를 밀어넣어 결함을 하루아침에 덮을 수 있다. 그러나 비트코인은 수만 개의 노드를 각자 다른 운영자가 자발적으로 돌리는 구조이고, 강제 자동 업데이트가 없다. 따라서 오늘 프라이버시 결함이 고쳐져도, 실제로 보호받는 건 그 판으로 직접 업그레이드한 노드뿐이다. 과거 사례를 보면 새 마이너 릴리스가 네트워크의 다수 노드에 반영되기까지 수주에서 수개월이 걸렸고, 상당수 노드는 몇 판 뒤처진 버전을 오래 유지했다. 지켜봐야 할 지표는 명확하다 — 비트노드스(Bitnodes) 같은 서비스가 집계하는 노드 버전 분포가 향후 몇 주간 얼마나 빠르게 31.1 쪽으로 이동하는지다. 이 곡선의 기울기가 곧 '결함이 고쳐졌다'는 발표와 '네트워크가 실제로 안전해졌다'는 현실 사이의 거리다.</p>
  <p class="en">Here is a point that is easy to miss. That a fix has shipped and that the network has actually become safe are entirely different stories. For a service with a central server, the company can push a forced update to all users and paper over a flaw overnight. But Bitcoin is a structure of tens of thousands of nodes, each run voluntarily by a different operator, with no forced auto-update. So even though a privacy flaw is fixed today, only nodes that directly upgrade to that version are actually protected. History shows that a new minor release has taken weeks to months to reach a majority of the network's nodes, and a substantial share of nodes lingered on versions several releases behind. The metric to watch is clear — how quickly the node-version distribution tracked by services like Bitnodes shifts toward 31.1 over the coming weeks. The slope of that curve is the distance between the announcement that "the flaw is fixed" and the reality that "the network is actually safe."</p>
  <p class="ja">ここで見落としやすい点がある。修正が配布されたことと、ネットワークが実際に安全になったことは全く別の話だ。中央サーバーを持つサービスなら、会社が全ユーザーに強制アップデートを押し込み欠陥を一夜で覆い隠せる。しかしビットコインは数万のノードをそれぞれ別の運用者が任意で動かす構造であり、強制自動更新がない。したがって今日プライバシー欠陥が直っても、実際に守られるのはその版に直接アップグレードしたノードだけだ。過去の事例を見ると、新しいマイナーリリースがネットワークの多数ノードに反映されるまで数週間から数ヶ月かかり、相当数のノードは数版遅れのバージョンを長く維持した。注視すべき指標は明確だ — Bitnodesのようなサービスが集計するノードのバージョン分布が、今後数週間でどれだけ速く31.1側へ移るかだ。この曲線の傾きこそが、「欠陥が直った」という発表と「ネットワークが実際に安全になった」という現実の間の距離である。</p>
  <p class="es">Aquí hay un punto fácil de pasar por alto. Que una corrección se haya publicado y que la red se haya vuelto realmente segura son historias completamente distintas. Para un servicio con un servidor central, la empresa puede enviar una actualización forzada a todos los usuarios y tapar una falla de la noche a la mañana. Pero Bitcoin es una estructura de decenas de miles de nodos, cada uno operado voluntariamente por un operador distinto, sin auto-actualización forzada. Así que aunque una falla de privacidad se corrija hoy, solo los nodos que se actualizan directamente a esa versión quedan realmente protegidos. La historia muestra que una nueva versión menor ha tardado de semanas a meses en llegar a la mayoría de los nodos de la red, y una parte considerable de los nodos permaneció en versiones varias entregas por detrás. La métrica a vigilar es clara — con qué rapidez la distribución de versiones de nodos que rastrean servicios como Bitnodes se desplaza hacia la 31.1 en las próximas semanas. La pendiente de esa curva es la distancia entre el anuncio de que "la falla está corregida" y la realidad de que "la red es realmente segura".</p>
  <p class="de">Hier ist ein Punkt, der leicht übersehen wird. Dass ein Fix veröffentlicht wurde und dass das Netzwerk tatsächlich sicher geworden ist, sind völlig verschiedene Geschichten. Bei einem Dienst mit zentralem Server kann das Unternehmen ein erzwungenes Update an alle Nutzer ausspielen und einen Fehler über Nacht überdecken. Aber Bitcoin ist eine Struktur aus Zehntausenden von Knoten, die jeweils freiwillig von einem anderen Betreiber betrieben werden, ohne erzwungenes Auto-Update. Selbst wenn heute ein Datenschutzfehler behoben wird, sind also nur die Knoten tatsächlich geschützt, die direkt auf diese Version aktualisieren. Die Geschichte zeigt, dass ein neues Minor-Release Wochen bis Monate gebraucht hat, um eine Mehrheit der Netzwerkknoten zu erreichen, und ein erheblicher Teil der Knoten blieb lange auf Versionen mehrere Releases zurück. Die zu beobachtende Kennzahl ist klar — wie schnell sich die von Diensten wie Bitnodes erfasste Knotenversionsverteilung in den kommenden Wochen zur 31.1 verschiebt. Die Steigung dieser Kurve ist der Abstand zwischen der Ankündigung "der Fehler ist behoben" und der Realität "das Netzwerk ist tatsächlich sicher".</p>

  <div class="box ko">💡 <strong>시사점:</strong> 비트코인 코어 31.1은 하드포크나 화려한 신기능이 아니라 조용한 보안·프라이버시 정비 릴리스이며, 이런 판이야말로 실사용자에게 실질적 영향을 준다. 기억할 원칙 하나 — 탈중앙 소프트웨어에서 '수정 배포'는 시작이지 끝이 아니다. 노드를 직접 운영한다면 안정판 출시 후 검증된 시점에 업그레이드하는 것이 실익이고, 그렇지 않은 투자자라면 노드 버전 분포가 새 판으로 이동하는 속도를 네트워크 위생 상태를 보는 하나의 창으로 삼을 만하다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> Bitcoin Core 31.1 is not a hard fork or a flashy new feature but a quiet security-and-privacy housekeeping release — and it is exactly this kind of release that has real impact on actual users. One principle to remember: in decentralized software, "a fix shipped" is the beginning, not the end. If you run a node yourself, upgrading at a verified point after the stable release is the practical win; if you don't, the pace at which the node-version distribution shifts to the new release is a useful window into the network's hygiene.</div>
  <div class="box ja">💡 <strong>示唆:</strong> Bitcoin Core 31.1はハードフォークや派手な新機能ではなく、静かなセキュリティ・プライバシー整備リリースであり、こうした版こそ実利用者に実質的な影響を与える。覚えておくべき原則が一つ — 分散型ソフトでは「修正配布」は始まりであって終わりではない。ノードを自ら運用するなら安定版リリース後の検証された時点でアップグレードするのが実益で、そうでない投資家ならノードのバージョン分布が新版へ移る速度を、ネットワークの衛生状態を見る一つの窓とする価値がある。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> Bitcoin Core 31.1 no es un hard fork ni una función nueva llamativa, sino una versión discreta de mantenimiento de seguridad y privacidad — y es precisamente este tipo de versión la que tiene un impacto real en los usuarios reales. Un principio para recordar: en el software descentralizado, "se publicó una corrección" es el comienzo, no el final. Si operas un nodo, actualizar en un momento verificado tras el lanzamiento estable es la ventaja práctica; si no, el ritmo al que la distribución de versiones de nodos se desplaza a la nueva versión es una ventana útil a la higiene de la red.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Bitcoin Core 31.1 ist kein Hard Fork und keine auffällige neue Funktion, sondern ein stiller Sicherheits- und Datenschutz-Wartungs-Release — und genau diese Art von Release hat echte Auswirkungen auf tatsächliche Nutzer. Ein Prinzip zum Merken: In dezentraler Software ist "ein Fix ist veröffentlicht" der Anfang, nicht das Ende. Wer selbst einen Knoten betreibt, für den ist das Aktualisieren zu einem verifizierten Zeitpunkt nach dem stabilen Release der praktische Gewinn; wer das nicht tut, für den ist das Tempo, mit dem sich die Knotenversionsverteilung zur neuen Version verschiebt, ein nützliches Fenster in die Hygiene des Netzwerks.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: Bitcoin Core 릴리스 노트(bitcoincore.org), crypto.news, CoinGape, KuCoin, TheCCPress, Cryptobreaking. 노드 버전 분포는 Bitnodes 참고.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: Bitcoin Core release notes (bitcoincore.org), crypto.news, CoinGape, KuCoin, TheCCPress, Cryptobreaking. Node-version distribution via Bitnodes.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: Bitcoin Coreリリースノート(bitcoincore.org)、crypto.news、CoinGape、KuCoin、TheCCPress、Cryptobreaking。ノードのバージョン分布はBitnodes参照。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: Notas de versión de Bitcoin Core (bitcoincore.org), crypto.news, CoinGape, KuCoin, TheCCPress, Cryptobreaking. Distribución de versiones de nodos vía Bitnodes.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: Bitcoin Core Release Notes (bitcoincore.org), crypto.news, CoinGape, KuCoin, TheCCPress, Cryptobreaking. Knotenversionsverteilung über Bitnodes.</p>
<?php require __DIR__.'/_footer.php'; ?>
