<?php $slug = 'gnosis-pay-zodiac-hack-postmortem'; require __DIR__.'/_header.php'; ?>

<p class="ko">자기수탁형 크립토 결제카드 서비스 그노시스 페이(Gnosis Pay)가 지난 3일 발표한 사고보고서(postmortem)에서, 6월 1일 발생한 150만 달러 규모 해킹의 근본 원인이 2023년 10월 30일부터 존재해온 조디악(Zodiac) 프레임워크 결함이었다고 밝혔다. 피해를 입은 지갑은 5,281개였고, 회사는 이용자 손실 전액을 자체 부담으로 보전했다. 다만 이 사고에서 가장 눈에 띄는 대목은 결함 자체가 아니라, 그 결함을 고친 새 코드가 이미 몇 달 전부터 존재했는데도 실제 운영 중인 계약에는 반영되지 않았다는 사실이다.</p>
  <p class="en">Self-custodial crypto payment card service Gnosis Pay disclosed in a postmortem published July 3 that the root cause of a $1.5 million hack on June 1 was a flaw in the Zodiac framework that had existed since October 30, 2023. 5,281 wallets were affected, and the company covered the full user losses out of its own pocket. But the most notable part of this incident isn't the flaw itself — it's that fixed code already existed months earlier, yet was never applied to the contracts actually running in production.</p>
  <p class="ja">自己保管型暗号資産決済カードサービスのグノシス・ペイ(Gnosis Pay)が7月3日に発表した事故報告書(postmortem)で、6月1日に発生した150万ドル規模のハッキングの根本原因が、2023年10月30日から存在していたZodiac(ゾディアック)フレームワークの欠陥だったことを明らかにした。被害を受けたウォレットは5,281件で、同社は利用者の損失全額を自己負担で補填した。ただしこの事件で最も注目すべきは欠陥自体ではなく、その欠陥を修正した新コードがすでに数ヶ月前から存在していたにもかかわらず、実際に稼働中の契約には反映されていなかったという事実だ。</p>
  <p class="es">El servicio de tarjeta de pago cripto autocustodiada Gnosis Pay reveló en un postmortem publicado el 3 de julio que la causa raíz de un hackeo de $1.5 millones el 1 de junio fue una falla en el framework Zodiac que existía desde el 30 de octubre de 2023. Se vieron afectadas 5,281 wallets, y la empresa cubrió la totalidad de las pérdidas de los usuarios de su propio bolsillo. Pero la parte más notable de este incidente no es la falla en sí — es que el código corregido ya existía meses antes, pero nunca se aplicó a los contratos que realmente estaban en producción.</p>
  <p class="de">Der selbstverwahrende Krypto-Zahlungskartendienst Gnosis Pay legte in einem am 3. Juli veröffentlichten Postmortem offen, dass die Grundursache eines Hacks über 1,5 Millionen Dollar am 1. Juni ein Fehler im Zodiac-Framework war, der seit dem 30. Oktober 2023 bestand. 5.281 Wallets waren betroffen, und das Unternehmen deckte die vollen Nutzerverluste aus eigener Tasche. Der bemerkenswerteste Teil dieses Vorfalls ist jedoch nicht der Fehler selbst — es ist, dass bereits Monate zuvor korrigierter Code existierte, aber nie auf die tatsächlich in Produktion laufenden Verträge angewendet wurde.</p>

  <h2 class="ko">지연 모듈이라는 안전장치가 오히려 공격 경로가 됐다</h2>
  <h2 class="en">A safety mechanism called the Delay Module became the attack path</h2>
  <h2 class="ja">遅延モジュールという安全装置がむしろ攻撃経路になった</h2>
  <h2 class="es">Un mecanismo de seguridad llamado Delay Module se convirtió en la vía de ataque</h2>
  <h2 class="de">Ein Sicherheitsmechanismus namens Delay Module wurde zum Angriffsweg</h2>
  <p class="ko">그노시스 페이는 세이프(Safe) 스마트 계정에 두 개의 조디악 모듈을 얹어 카드 결제를 처리한다. 롤즈 모듈(Roles Module)은 카드 결제를 승인하는 권한을 관리하고, 딜레이 모듈(Delay Module)은 카드 결제가 아닌 일반 출금 거래에 대해 약 3분의 대기시간을 강제한다. 취지는 명확하다 — 이상 거래가 실행되기 전에 사용자가 발견하고 막을 수 있는 시간을 벌어주는 것이다. 문제는 이 대기 지연 장치 자체가 아니라, 그 큐(대기열)에 애초에 무엇이 들어갈 수 있는지를 검증하는 서명 확인 로직에 있었다.</p>
  <p class="en">Gnosis Pay processes card payments by layering two Zodiac modules onto Safe smart accounts. The Roles Module manages permission to authorize card payments, while the Delay Module enforces roughly a three-minute wait on non-card, general withdrawal transactions. The intent is straightforward — buying users time to spot and block an anomalous transaction before it executes. The problem wasn't the delay mechanism itself, but the signature-verification logic that decides what's allowed into that queue in the first place.</p>
  <p class="ja">グノシス・ペイはセーフ(Safe)スマートアカウントに2つのZodiacモジュールを重ねてカード決済を処理する。ロールズモジュール(Roles Module)はカード決済を承認する権限を管理し、ディレイモジュール(Delay Module)はカード決済以外の一般出金取引に対して約3分の待機時間を強制する。趣旨は明確だ — 異常取引が実行される前にユーザーが発見し止められる時間を稼ぐことだ。問題はこの待機遅延装置自体ではなく、そのキュー(待機列)にそもそも何が入れるかを検証する署名確認ロジックにあった。</p>
  <p class="es">Gnosis Pay procesa pagos con tarjeta superponiendo dos módulos Zodiac sobre cuentas inteligentes Safe. El Roles Module gestiona el permiso para autorizar pagos con tarjeta, mientras que el Delay Module impone una espera de aproximadamente tres minutos en transacciones de retiro general que no son de tarjeta. La intención es sencilla — dar tiempo a los usuarios para detectar y bloquear una transacción anómala antes de que se ejecute. El problema no era el mecanismo de retraso en sí, sino la lógica de verificación de firma que decide qué se permite entrar en esa cola en primer lugar.</p>
  <p class="de">Gnosis Pay verarbeitet Kartenzahlungen, indem es zwei Zodiac-Module auf Safe-Smart-Konten legt. Das Roles Module verwaltet die Berechtigung zur Autorisierung von Kartenzahlungen, während das Delay Module eine Wartezeit von etwa drei Minuten für allgemeine Abhebungstransaktionen ohne Karte erzwingt. Die Absicht ist einfach — Nutzern Zeit zu verschaffen, eine anomale Transaktion zu erkennen und zu blockieren, bevor sie ausgeführt wird. Das Problem war nicht der Verzögerungsmechanismus selbst, sondern die Signaturprüflogik, die entscheidet, was überhaupt in diese Warteschlange gelangen darf.</p>

  <p class="ko">보안업체 베리체인스(Verichains)의 코드 분석에 따르면, 결함은 딜레이 모듈이 EIP-1271 계약서명을 검증하는 방식에 있었다. 정상적인 구현이라면 스마트 계약에 서명 검증을 요청하는 로우레벨 호출(staticcall) 자체가 성공했는지부터 확인해야 하는데, 문제의 코드는 그 호출의 성공 여부(success)를 무시한 채 반환된 데이터 값(returnData)에 특정 "매직 값"이 담겨 있는지만 확인했다. 즉 호출이 실패해서 반환값이 비어 있거나 조작 가능한 상태였더라도, 그 매직 값 패턴만 맞으면 서명이 유효하다고 착각하도록 만들 수 있었던 것이다. 이런 방식으로 공격자는 출금 승인이 없었음에도 있었던 것처럼 큐에 거짓 거래를 밀어 넣었다.</p>
  <p class="en">Per code analysis by security firm Verichains, the flaw was in how the Delay Module verified EIP-1271 contract signatures. A correct implementation would first check whether the low-level call (staticcall) requesting signature verification from the smart contract actually succeeded — but the flawed code ignored that success status entirely, checking only whether the returned data contained a specific "magic value." In other words, even if the call failed and the return value was empty or manipulable, matching that magic-value pattern alone could trick the system into believing the signature was valid. That's how an attacker pushed forged transactions into the queue that made it look like withdrawal approval existed when it didn't.</p>
  <p class="ja">セキュリティ企業ベリチェインズ(Verichains)のコード分析によると、欠陥はディレイモジュールがEIP-1271契約署名を検証する方式にあった。正しい実装であれば、スマートコントラクトに署名検証を要求する低レベル呼び出し(staticcall)自体が成功したかどうかをまず確認すべきだが、問題のコードはその呼び出しの成功可否(success)を無視し、返却されたデータ値(returnData)に特定の「マジック値」が含まれているかだけを確認していた。つまり呼び出しが失敗し戻り値が空または操作可能な状態であっても、そのマジック値のパターンさえ合致すれば署名が有効だと錯覚させることができたのだ。この方法で攻撃者は出金承認がなかったにもかかわらずあったかのように偽の取引をキューに押し込んだ。</p>
  <p class="es">Según el análisis de código de la firma de seguridad Verichains, la falla estaba en cómo el Delay Module verificaba las firmas de contrato EIP-1271. Una implementación correcta primero verificaría si la llamada de bajo nivel (staticcall) que solicita la verificación de firma del contrato inteligente realmente tuvo éxito — pero el código defectuoso ignoraba por completo ese estado de éxito, verificando solo si los datos devueltos contenían un "valor mágico" específico. En otras palabras, incluso si la llamada fallaba y el valor de retorno estaba vacío o era manipulable, hacer coincidir ese patrón de valor mágico por sí solo podía engañar al sistema para que creyera que la firma era válida. Así fue como un atacante empujó transacciones falsificadas a la cola que hacían parecer que existía una aprobación de retiro cuando no la había.</p>
  <p class="de">Laut Code-Analyse des Sicherheitsunternehmens Verichains lag der Fehler darin, wie das Delay Module EIP-1271-Vertragssignaturen verifizierte. Eine korrekte Implementierung würde zunächst prüfen, ob der Low-Level-Aufruf (staticcall), der die Signaturverifizierung vom Smart Contract anfordert, tatsächlich erfolgreich war — aber der fehlerhafte Code ignorierte diesen Erfolgsstatus vollständig und prüfte nur, ob die zurückgegebenen Daten einen bestimmten "magischen Wert" enthielten. Mit anderen Worten, selbst wenn der Aufruf fehlschlug und der Rückgabewert leer oder manipulierbar war, konnte das bloße Übereinstimmen dieses Magic-Value-Musters das System dazu bringen zu glauben, die Signatur sei gültig. So schob ein Angreifer gefälschte Transaktionen in die Warteschlange, die den Anschein erweckten, eine Auszahlungsgenehmigung existiere, obwohl dies nicht der Fall war.</p>

  <h2 class="ko">고쳐진 코드가 이미 있었다 — 그런데 왜 안 썼나</h2>
  <h2 class="en">The fix already existed — so why wasn't it used?</h2>
  <h2 class="ja">修正されたコードはすでにあった — ではなぜ使われなかったのか</h2>
  <h2 class="es">La corrección ya existía — ¿entonces por qué no se usó?</h2>
  <h2 class="de">Der Fix existierte bereits — warum wurde er nicht verwendet?</h2>
  <p class="ko">베리체인스 조사에서 가장 놀라운 대목이 여기서 나온다. 조디악 코드베이스는 한때 두 갈래로 나뉘어 있었다 — 예전 패키지(@gnosis.pm/zodiac, 훗날 @gnosis-guild/zodiac로 개명)와 완전히 새로 다시 짠 코어 패키지(@gnosis-guild/zodiac-core)다. 2026년 2월 27일, 새 코어 패키지 쪽에서 이 결함을 조용히 고치는 커밋이 올라오며 v4.0.0-알파 버전이 나왔다. 그런데 실제로 사고를 낸 딜레이 모듈 v1.1.0은 여전히 옛 패키지 라인을 그대로 쓰고 있었다. 즉 수정본이 4개월 넘게 존재했지만, 이미 배포돼 운영 중인 계약에는 소급 적용되지 않았던 것이다.</p>
  <p class="en">This is where Verichains' investigation turns up the most surprising detail. The Zodiac codebase had at one point split into two lines — the legacy package (@gnosis.pm/zodiac, later renamed @gnosis-guild/zodiac) and a completely rewritten core package (@gnosis-guild/zodiac-core). On February 27, 2026, a commit quietly fixing this exact flaw landed in the new core package, shipping as v4.0.0-alpha. But the Delay Module v1.1.0 that actually caused the incident was still running on the old package line. In other words, the fix had existed for more than four months, but was never retroactively applied to contracts already deployed and in production.</p>
  <p class="ja">ここでベリチェインズの調査が最も驚くべき詳細を明らかにする。Zodiacのコードベースはかつて二手に分かれていた — 古いパッケージ(@gnosis.pm/zodiac、後に@gnosis-guild/zodiacに改名)と、完全に書き直された新コアパッケージ(@gnosis-guild/zodiac-core)だ。2026年2月27日、新コアパッケージ側でこの欠陥を静かに修正するコミットが入り、v4.0.0-アルファ版としてリリースされた。しかし実際に事故を起こしたディレイモジュールv1.1.0は依然として旧パッケージ系列をそのまま使っていた。つまり修正版は4ヶ月以上存在していたが、すでに配備され稼働中の契約には遡って適用されていなかったのだ。</p>
  <p class="es">Aquí es donde la investigación de Verichains revela el detalle más sorprendente. La base de código de Zodiac se había dividido en un momento en dos líneas — el paquete heredado (@gnosis.pm/zodiac, luego renombrado @gnosis-guild/zodiac) y un paquete central completamente reescrito (@gnosis-guild/zodiac-core). El 27 de febrero de 2026, un commit que corregía silenciosamente esta falla exacta llegó al nuevo paquete central, lanzándose como v4.0.0-alpha. Pero el Delay Module v1.1.0 que realmente causó el incidente seguía funcionando en la línea del paquete antiguo. En otras palabras, la corrección había existido durante más de cuatro meses, pero nunca se aplicó retroactivamente a los contratos ya desplegados y en producción.</p>
  <p class="de">Hier zeigt die Untersuchung von Verichains das überraschendste Detail. Die Zodiac-Codebasis hatte sich zu einem Zeitpunkt in zwei Linien aufgespalten — das Legacy-Paket (@gnosis.pm/zodiac, später umbenannt in @gnosis-guild/zodiac) und ein komplett neu geschriebenes Kernpaket (@gnosis-guild/zodiac-core). Am 27. Februar 2026 landete ein Commit, der genau diesen Fehler still behob, im neuen Kernpaket und wurde als v4.0.0-alpha veröffentlicht. Aber das Delay Module v1.1.0, das den Vorfall tatsächlich verursachte, lief immer noch auf der alten Paketlinie. Mit anderen Worten, der Fix existierte seit mehr als vier Monaten, wurde aber nie rückwirkend auf bereits bereitgestellte und in Produktion befindliche Verträge angewendet.</p>

  <div class="ko">
  <svg viewBox="0 0 700 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">결함부터 사고까지 — 4년의 시차</text>
    <g font-family="sans-serif" font-size="10">
      <circle cx="60" cy="70" r="6" fill="#71717a"/>
      <text x="80" y="65" fill="#e4e4e7" font-weight="700">2023.10.28</text>
      <text x="80" y="80" fill="#a1a1aa">옛 패키지에 결함 있는 커밋 도입</text>
      <circle cx="60" cy="110" r="6" fill="#4ade80"/>
      <text x="80" y="105" fill="#e4e4e7" font-weight="700">2026.2.27</text>
      <text x="80" y="120" fill="#a1a1aa">새 코어 패키지에서 결함 조용히 수정 (v4.0.0-alpha)</text>
      <circle cx="60" cy="150" r="6" fill="#ef4444"/>
      <text x="80" y="145" fill="#ef4444" font-weight="700">2026.6.1, 06:17 UTC</text>
      <text x="80" y="160" fill="#a1a1aa">실제 운영 중인 옛 패키지 계약에서 사고 발생, 150만 달러 탈취</text>
      <circle cx="60" cy="190" r="6" fill="#38bdf8"/>
      <text x="80" y="185" fill="#e4e4e7" font-weight="700">2026.6.5 ~ 7.3</text>
      <text x="80" y="200" fill="#a1a1aa">패치 완료, 전액 보전, 사고보고서 공개</text>
      <rect x="15" y="215" width="670" height="28" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.3"/>
      <text x="350" y="234" fill="#f7931a" text-anchor="middle" font-weight="700">"고쳐졌다"는 사실이, 이미 배포된 계약을 자동으로 지켜주지 않는다</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">From Flaw to Incident — A Four-Year Gap</text>
    <g font-family="sans-serif" font-size="10">
      <circle cx="60" cy="70" r="6" fill="#71717a"/>
      <text x="80" y="65" fill="#e4e4e7" font-weight="700">Oct 28, 2023</text>
      <text x="80" y="80" fill="#a1a1aa">Flawed commit introduced into legacy package</text>
      <circle cx="60" cy="110" r="6" fill="#4ade80"/>
      <text x="80" y="105" fill="#e4e4e7" font-weight="700">Feb 27, 2026</text>
      <text x="80" y="120" fill="#a1a1aa">Flaw quietly fixed in new core package (v4.0.0-alpha)</text>
      <circle cx="60" cy="150" r="6" fill="#ef4444"/>
      <text x="80" y="145" fill="#ef4444" font-weight="700">Jun 1, 2026, 06:17 UTC</text>
      <text x="80" y="160" fill="#a1a1aa">Incident on legacy contracts still in production, $1.5M drained</text>
      <circle cx="60" cy="190" r="6" fill="#38bdf8"/>
      <text x="80" y="185" fill="#e4e4e7" font-weight="700">Jun 5 - Jul 3, 2026</text>
      <text x="80" y="200" fill="#a1a1aa">Patch complete, full reimbursement, postmortem published</text>
      <rect x="15" y="215" width="670" height="28" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.3"/>
      <text x="350" y="234" fill="#f7931a" text-anchor="middle" font-weight="700">"Fixed" doesn't automatically protect contracts already deployed</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">欠陥から事故まで — 4年の時差</text>
    <g font-family="sans-serif" font-size="10">
      <circle cx="60" cy="70" r="6" fill="#71717a"/>
      <text x="80" y="65" fill="#e4e4e7" font-weight="700">2023.10.28</text>
      <text x="80" y="80" fill="#a1a1aa">旧パッケージに欠陥あるコミット導入</text>
      <circle cx="60" cy="110" r="6" fill="#4ade80"/>
      <text x="80" y="105" fill="#e4e4e7" font-weight="700">2026.2.27</text>
      <text x="80" y="120" fill="#a1a1aa">新コアパッケージで欠陥を静かに修正(v4.0.0-alpha)</text>
      <circle cx="60" cy="150" r="6" fill="#ef4444"/>
      <text x="80" y="145" fill="#ef4444" font-weight="700">2026.6.1、06:17 UTC</text>
      <text x="80" y="160" fill="#a1a1aa">実運用中の旧パッケージ契約で事故発生、150万ドル窃取</text>
      <circle cx="60" cy="190" r="6" fill="#38bdf8"/>
      <text x="80" y="185" fill="#e4e4e7" font-weight="700">2026.6.5〜7.3</text>
      <text x="80" y="200" fill="#a1a1aa">パッチ完了、全額補填、事故報告書公開</text>
      <rect x="15" y="215" width="670" height="28" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.3"/>
      <text x="350" y="234" fill="#f7931a" text-anchor="middle" font-weight="700">「修正された」という事実が、すでに配備された契約を自動的に守ってくれるわけではない</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">De la Falla al Incidente — Una Brecha de Cuatro Años</text>
    <g font-family="sans-serif" font-size="10">
      <circle cx="60" cy="70" r="6" fill="#71717a"/>
      <text x="80" y="65" fill="#e4e4e7" font-weight="700">28 oct 2023</text>
      <text x="80" y="80" fill="#a1a1aa">Commit defectuoso introducido en paquete heredado</text>
      <circle cx="60" cy="110" r="6" fill="#4ade80"/>
      <text x="80" y="105" fill="#e4e4e7" font-weight="700">27 feb 2026</text>
      <text x="80" y="120" fill="#a1a1aa">Falla corregida silenciosamente en nuevo paquete central (v4.0.0-alpha)</text>
      <circle cx="60" cy="150" r="6" fill="#ef4444"/>
      <text x="80" y="145" fill="#ef4444" font-weight="700">1 jun 2026, 06:17 UTC</text>
      <text x="80" y="160" fill="#a1a1aa">Incidente en contratos heredados aún en producción, $1.5M drenados</text>
      <circle cx="60" cy="190" r="6" fill="#38bdf8"/>
      <text x="80" y="185" fill="#e4e4e7" font-weight="700">5 jun - 3 jul 2026</text>
      <text x="80" y="200" fill="#a1a1aa">Parche completo, reembolso total, postmortem publicado</text>
      <rect x="15" y="215" width="670" height="28" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.3"/>
      <text x="350" y="234" fill="#f7931a" text-anchor="middle" font-weight="700">"Corregido" no protege automáticamente los contratos ya desplegados</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 250" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="24" fill="#fafafa" font-size="12" font-weight="700" font-family="sans-serif">Vom Fehler zum Vorfall — Eine Vierjahreslücke</text>
    <g font-family="sans-serif" font-size="10">
      <circle cx="60" cy="70" r="6" fill="#71717a"/>
      <text x="80" y="65" fill="#e4e4e7" font-weight="700">28.10.2023</text>
      <text x="80" y="80" fill="#a1a1aa">Fehlerhafter Commit ins Legacy-Paket eingeführt</text>
      <circle cx="60" cy="110" r="6" fill="#4ade80"/>
      <text x="80" y="105" fill="#e4e4e7" font-weight="700">27.2.2026</text>
      <text x="80" y="120" fill="#a1a1aa">Fehler still im neuen Kernpaket behoben (v4.0.0-alpha)</text>
      <circle cx="60" cy="150" r="6" fill="#ef4444"/>
      <text x="80" y="145" fill="#ef4444" font-weight="700">1.6.2026, 06:17 UTC</text>
      <text x="80" y="160" fill="#a1a1aa">Vorfall bei Legacy-Verträgen noch in Produktion, 1,5 Mio. $ abgeflossen</text>
      <circle cx="60" cy="190" r="6" fill="#38bdf8"/>
      <text x="80" y="185" fill="#e4e4e7" font-weight="700">5.6. - 3.7.2026</text>
      <text x="80" y="200" fill="#a1a1aa">Patch abgeschlossen, volle Erstattung, Postmortem veröffentlicht</text>
      <rect x="15" y="215" width="670" height="28" rx="6" fill="#1c1c1f" stroke="#f7931a" stroke-width="1.3"/>
      <text x="350" y="234" fill="#f7931a" text-anchor="middle" font-weight="700">"Behoben" schützt bereits bereitgestellte Verträge nicht automatisch</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">이건 그노시스만의 문제가 아니다</h2>
  <h2 class="en">This isn't just a Gnosis problem</h2>
  <h2 class="ja">これはグノシスだけの問題ではない</h2>
  <h2 class="es">Esto no es solo un problema de Gnosis</h2>
  <h2 class="de">Das ist kein reines Gnosis-Problem</h2>
  <p class="ko">6월 2일, 조디악 개발팀은 이번 결함이 롤즈 모디파이어(Roles Modifier) v2와 딜레이 모디파이어(Delay Modifier) v1.1.0 두 모듈에 걸쳐 있으며, 그노시스 페이 외에도 이 모듈을 쓰는 다른 프로젝트들이 영향을 받는다고 공지했다. 그노시스 공동창립자 마르틴 쾨펠만은 "여러 프로젝트가 영향을 받는다"며 사전에 비공개로 통보를 시도했다고 밝혔다. 세이프(Safe) 랩스 측은 이번 사고가 세이프 코어 자체나 지갑 인프라에는 영향을 미치지 않는다고 선을 그었지만, 조디악처럼 세이프 위에 얹어 쓰는 모듈형 확장 생태계 전반이 같은 구조적 위험을 안고 있다는 사실은 남는다.</p>
  <p class="en">On June 2, the Zodiac development team announced that this flaw spanned two modules, Roles Modifier v2 and Delay Modifier v1.1.0, and that other projects using these modules beyond Gnosis Pay were also affected. Gnosis co-founder Martin Köppelmann said "several projects are affected" and that the team had tried to notify them privately in advance. Safe Labs drew a clear line that the incident didn't affect Safe's core or wallet infrastructure itself, but the fact remains that the broader ecosystem of modular extensions built on top of Safe, like Zodiac, carries the same structural risk.</p>
  <p class="ja">6月2日、Zodiac開発チームは今回の欠陥がロールズモディファイア(Roles Modifier)v2とディレイモディファイア(Delay Modifier)v1.1.0の2つのモジュールにまたがっており、グノシス・ペイ以外にもこのモジュールを使う他のプロジェクトが影響を受けると通知した。グノシス共同創業者のマルティン・ケッペルマンは「複数のプロジェクトが影響を受ける」と述べ、事前に非公開で通知を試みたことを明らかにした。セーフ(Safe)ラボ側は今回の事故がセーフのコア自体やウォレットインフラには影響を与えないと一線を画したが、Zodiacのようにセーフの上に乗せて使うモジュール型拡張エコシステム全体が同じ構造的リスクを抱えているという事実は残る。</p>
  <p class="es">El 2 de junio, el equipo de desarrollo de Zodiac anunció que esta falla abarcaba dos módulos, Roles Modifier v2 y Delay Modifier v1.1.0, y que otros proyectos que usan estos módulos más allá de Gnosis Pay también se vieron afectados. El cofundador de Gnosis, Martin Köppelmann, dijo que "varios proyectos están afectados" y que el equipo había intentado notificarles en privado de antemano. Safe Labs trazó una línea clara de que el incidente no afectó al núcleo de Safe ni a la infraestructura de wallet en sí, pero el hecho permanece de que el ecosistema más amplio de extensiones modulares construidas sobre Safe, como Zodiac, conlleva el mismo riesgo estructural.</p>
  <p class="de">Am 2. Juni gab das Zodiac-Entwicklungsteam bekannt, dass dieser Fehler zwei Module betraf, Roles Modifier v2 und Delay Modifier v1.1.0, und dass auch andere Projekte, die diese Module über Gnosis Pay hinaus verwenden, betroffen waren. Gnosis-Mitgründer Martin Köppelmann sagte, "mehrere Projekte sind betroffen" und dass das Team versucht hatte, sie im Voraus privat zu benachrichtigen. Safe Labs zog eine klare Linie, dass der Vorfall den Safe-Kern oder die Wallet-Infrastruktur selbst nicht betraf, aber die Tatsache bleibt bestehen, dass das breitere Ökosystem modularer Erweiterungen, die auf Safe aufbauen, wie Zodiac, das gleiche strukturelle Risiko trägt.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 이 사고가 남긴 진짜 교훈은 "감사받은 오픈소스 코드도 안전을 보장하지 않는다"는 흔한 결론보다 한 단계 더 구체적입니다 — 코드가 고쳐졌다는 사실 자체가, 이미 배포돼 돈을 담고 있는 계약을 자동으로 지켜주지는 않는다는 것입니다. 프로젝트가 레거시 패키지에서 새 코어로 갈아타지 않는 한, 업스트림에 존재하는 수정본은 그저 존재할 뿐입니다. 스마트 계약 기반 서비스를 평가할 때는 "감사를 받았는가"뿐 아니라 "실제 배포된 바이트코드가 최신 수정본을 반영하고 있는가"까지 확인하는 습관이 필요합니다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> The real lesson from this incident goes one step further than the common conclusion that "audited open-source code doesn't guarantee safety" — the fact that code has been fixed doesn't automatically protect contracts already deployed and holding money. Unless a project actually migrates from a legacy package to the new core, an upstream fix just sits there existing. When evaluating smart-contract-based services, it's worth checking not just "was this audited" but "does the actually deployed bytecode reflect the latest fix."</div>
  <div class="box ja">💡 <strong>示唆:</strong> この事件が残した本当の教訓は、「監査済みのオープンソースコードも安全を保証しない」というありふれた結論より一段具体的です — コードが修正されたという事実自体が、すでに配備され資金を保有している契約を自動的に守ってくれるわけではないということです。プロジェクトがレガシーパッケージから新コアに乗り換えない限り、アップストリームに存在する修正版はただ存在するだけです。スマートコントラクトベースのサービスを評価する際は「監査を受けたか」だけでなく「実際に配備されたバイトコードが最新の修正版を反映しているか」まで確認する習慣が必要です。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> La verdadera lección de este incidente va un paso más allá de la conclusión común de que "el código abierto auditado no garantiza la seguridad" — el hecho de que el código haya sido corregido no protege automáticamente los contratos ya desplegados y que contienen dinero. A menos que un proyecto realmente migre de un paquete heredado al nuevo núcleo, una corrección upstream simplemente existe ahí. Al evaluar servicios basados en contratos inteligentes, vale la pena verificar no solo "esto fue auditado" sino "el bytecode realmente desplegado refleja la corrección más reciente".</div>
  <div class="box de">💡 <strong>Fazit:</strong> Die eigentliche Lehre aus diesem Vorfall geht einen Schritt weiter als die übliche Schlussfolgerung, dass "geprüfter Open-Source-Code keine Sicherheit garantiert" — die Tatsache, dass Code behoben wurde, schützt bereits bereitgestellte, geldhaltende Verträge nicht automatisch. Sofern ein Projekt nicht tatsächlich von einem Legacy-Paket zum neuen Kern migriert, existiert ein Upstream-Fix einfach nur. Bei der Bewertung von Smart-Contract-basierten Diensten lohnt es sich, nicht nur zu prüfen "wurde dies geprüft", sondern "spiegelt der tatsächlich bereitgestellte Bytecode den neuesten Fix wider".</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: 그노시스 페이 공식 사고보고서(2026.7.3), Verichains 기술 분석 블로그, crypto.news, CoinGape, The Defiant, CryptoTimes.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: Gnosis Pay official postmortem (July 3, 2026), Verichains technical analysis blog, crypto.news, CoinGape, The Defiant, CryptoTimes.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: グノシス・ペイ公式事故報告書(2026年7月3日)、Verichains技術分析ブログ、crypto.news、CoinGape、The Defiant、CryptoTimes。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: Postmortem oficial de Gnosis Pay (3 de julio de 2026), blog de análisis técnico de Verichains, crypto.news, CoinGape, The Defiant, CryptoTimes.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: Offizielles Gnosis-Pay-Postmortem (3. Juli 2026), technischer Analyseblog von Verichains, crypto.news, CoinGape, The Defiant, CryptoTimes.</p>
<?php require __DIR__.'/_footer.php'; ?>
