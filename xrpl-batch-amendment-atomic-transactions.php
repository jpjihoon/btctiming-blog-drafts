<?php $slug = 'xrpl-batch-amendment-atomic-transactions'; require __DIR__.'/_header.php'; ?>

<p class="ko">XRP 레저(XRPL)의 코어 개발자 데니스 앤젤(Denis Angell)이 '배치(Batch)' 수정안을 rippled 코어 저장소에 다시 병합했다고 밝혔다. 유투데이(U.Today)와 코인센트럴(CoinCentral)에 따르면 이 기능(XLS-56d)은 어택애톤(attack-a-thon)과 보안 감사, 그리고 네 차례의 검토를 거친 뒤 앤젤의 브랜치에서 XRPLF/rippled 개발 브랜치로 정식 병합됐고, 다음 릴리스에서 검증인(validator) 투표에 부쳐질 예정이다. 배치는 최대 8개의 개별 트랜잭션을 하나의 원자적(atomic) 묶음으로 실행하게 해, 여러 작업이 전부 성공하거나 전부 무효화되도록 만든다. 이 수정안은 지난 2월 심각한 보안 결함이 발견돼 활성화가 지연됐던 바로 그 기능이다.</p>
  <p class="en">XRP Ledger (XRPL) core developer Denis Angell said the "Batch" amendment has been merged back into the rippled core repository. Per U.Today and CoinCentral, the feature (XLS-56d) was officially merged from Angell's branch into the XRPLF/rippled development branch after an attack-a-thon, a security audit and four reviews, and is set to go up for validator voting in the next release. Batch lets up to eight individual transactions execute as a single atomic bundle, so that a set of operations either all succeed together or all void. This is the very amendment whose activation was delayed after a serious security flaw was found this past February.</p>
  <p class="ja">XRP Ledger(XRPL)のコア開発者Denis Angellが、「Batch」修正案をrippledコアリポジトリに再統合したと明らかにした。U.TodayやCoinCentralによると、この機能(XLS-56d)はアタックアソン(attack-a-thon)とセキュリティ監査、そして四度の検討を経て、AngellのブランチからXRPLF/rippledの開発ブランチへ正式に統合され、次のリリースで検証者(validator)投票にかけられる予定だ。Batchは最大8件の個別トランザクションを一つの原子的(atomic)な束として実行させ、複数の処理がすべて成功するか、すべて無効化されるようにする。この修正案は、去る2月に深刻なセキュリティ欠陥が発見され活性化が遅れた、まさにその機能だ。</p>
  <p class="es">El desarrollador central de XRP Ledger (XRPL), Denis Angell, dijo que la enmienda "Batch" ha vuelto a fusionarse en el repositorio central de rippled. Según U.Today y CoinCentral, la función (XLS-56d) se fusionó oficialmente desde la rama de Angell a la rama de desarrollo de XRPLF/rippled tras un attack-a-thon, una auditoría de seguridad y cuatro revisiones, y se someterá a votación de validadores en la próxima versión. Batch permite que hasta ocho transacciones individuales se ejecuten como un único paquete atómico, de modo que un conjunto de operaciones tenga éxito en su totalidad o se anule por completo. Esta es precisamente la enmienda cuya activación se retrasó tras hallarse un grave fallo de seguridad el pasado febrero.</p>
  <p class="de">Der XRP-Ledger-(XRPL)-Kernentwickler Denis Angell erklärte, das „Batch"-Amendment sei wieder in das rippled-Kern-Repository gemergt worden. Laut U.Today und CoinCentral wurde die Funktion (XLS-56d) nach einem Attack-a-thon, einem Sicherheitsaudit und vier Prüfungen offiziell von Angells Branch in den XRPLF/rippled-Entwicklungs-Branch gemergt und soll in der nächsten Version zur Validator-Abstimmung gestellt werden. Batch lässt bis zu acht einzelne Transaktionen als ein atomares Bündel ausführen, sodass ein Satz von Operationen entweder gemeinsam gelingt oder vollständig verfällt. Dies ist genau jenes Amendment, dessen Aktivierung sich verzögerte, nachdem im vergangenen Februar ein schwerwiegender Sicherheitsfehler gefunden wurde.</p>

  <h2 class="ko">무엇이 바뀌나 — 원자적 배치 트랜잭션</h2>
  <h2 class="en">What changes — atomic batch transactions</h2>
  <h2 class="ja">何が変わるか — 原子的バッチトランザクション</h2>
  <h2 class="es">Qué cambia — transacciones atómicas por lotes</h2>
  <h2 class="de">Was sich ändert — atomare Batch-Transaktionen</h2>
  <p class="ko">현재 XRP 레저에서 여러 작업을 잇달아 처리하려면 트랜잭션을 개별로 하나씩 제출해야 하고, 그 사이에 하나가 실패하면 나머지는 의도치 않은 상태로 남는다. 배치는 이 문제를 '원자성(atomicity)'으로 푼다. 원자적 트랜잭션이란 여러 작업을 쪼갤 수 없는 하나의 단위로 묶어, 전부 함께 성립하거나 전부 무효가 되게 하는 것을 뜻한다. 예컨대 '보내기'와 '받기'를 한 배치로 묶으면, 양측이 각자의 의무를 동시에 이행할 때에만 토큰 스왑이 성사되므로 상대방 위험(counterparty risk)이 사라진다. 리플엑스(RippleX) 개발 문서에 따르면 한 배치에는 최대 8개의 내부 트랜잭션을 담을 수 있고, 이들은 한 계정에서 나올 수도, 여러 계정에서 나올 수도 있다.</p>
  <p class="en">Today, running several operations in sequence on the XRP Ledger means submitting transactions one by one, and if one fails in between, the rest are left in an unintended state. Batch solves this with "atomicity." An atomic transaction bundles several operations into a single, indivisible unit so that they all hold together or all void. Bundle a "send" and a "receive" into one batch, for instance, and a token swap only completes when both sides fulfill their obligations simultaneously — so counterparty risk disappears. Per RippleX developer documentation, a single batch can hold up to eight inner transactions, and they can come from one account or from multiple accounts.</p>
  <p class="ja">現在のXRP Ledgerで複数の処理を続けて行うには、トランザクションを個別に一つずつ提出せねばならず、その間に一つが失敗すると残りは意図しない状態のまま残る。Batchはこの問題を「原子性(atomicity)」で解く。原子的トランザクションとは、複数の処理を分割できない一つの単位として束ね、すべてが共に成立するか、すべてが無効になるようにすることを意味する。たとえば「送る」と「受け取る」を一つのバッチに束ねれば、双方が各自の義務を同時に履行したときにのみトークンスワップが成立するため、相手方リスク(counterparty risk)が消える。RippleX開発文書によると、一つのバッチには最大8件の内部トランザクションを収められ、それらは一つの口座からも、複数の口座からも出せる。</p>
  <p class="es">Hoy, ejecutar varias operaciones en secuencia en el XRP Ledger significa enviar transacciones una por una, y si una falla en el intermedio, el resto queda en un estado no deseado. Batch resuelve esto con la "atomicidad". Una transacción atómica agrupa varias operaciones en una unidad única e indivisible, de modo que todas se sostienen juntas o todas se anulan. Agrupa un "enviar" y un "recibir" en un solo lote, por ejemplo, y un intercambio de tokens solo se completa cuando ambas partes cumplen sus obligaciones simultáneamente — así desaparece el riesgo de contraparte. Según la documentación para desarrolladores de RippleX, un solo lote puede contener hasta ocho transacciones internas, y pueden proceder de una cuenta o de varias.</p>
  <p class="de">Heute bedeutet das Ausführen mehrerer Operationen in Folge im XRP Ledger, Transaktionen einzeln einzureichen, und schlägt zwischendurch eine fehl, bleibt der Rest in einem unbeabsichtigten Zustand. Batch löst dies mit „Atomarität". Eine atomare Transaktion bündelt mehrere Operationen zu einer einzigen, unteilbaren Einheit, sodass sie alle zusammen halten oder alle verfallen. Bündelt man etwa ein „Senden" und ein „Empfangen" in einen Batch, wird ein Token-Tausch nur abgeschlossen, wenn beide Seiten ihre Pflichten gleichzeitig erfüllen — so verschwindet das Kontrahentenrisiko. Laut RippleX-Entwicklerdokumentation kann ein einzelner Batch bis zu acht innere Transaktionen enthalten, und diese können von einem Konto oder von mehreren Konten stammen.</p>
  <p class="ko">배치의 유연성은 네 가지 실행 모드에서 나온다. XRPL 문서에 따르면 <strong>ALLORNOTHING</strong>은 내부 트랜잭션이 모두 성공해야 하나라도 성립하는 완전 원자적 모드이고, <strong>ONLYONE</strong>은 처음 성공한 하나만 적용하고 나머지는 버린다. <strong>UNTILFAILURE</strong>는 첫 실패가 나오기 전까지만 순차 적용하며, <strong>INDEPENDENT</strong>는 일부가 실패해도 나머지를 모두 적용한다. 이 네 모드 덕분에 개발자는 '전부 아니면 전무'가 필요한 결제·스왑부터, '여러 후보 중 먼저 되는 것 하나'가 필요한 경매·입찰까지 상황에 맞는 논리를 고를 수 있다. 이는 이더리움이 계정 추상화와 번들링으로 뒤늦게 확보해 온 조합성(composability)을, XRPL이 프로토콜 레벨에서 네 가지 규격화된 형태로 제공하려는 시도로 볼 수 있다.</p>
  <p class="en">Batch's flexibility comes from four execution modes. Per XRPL documentation, <strong>ALLORNOTHING</strong> is the fully atomic mode in which every inner transaction must succeed for any one to hold; <strong>ONLYONE</strong> applies only the first to succeed and discards the rest; <strong>UNTILFAILURE</strong> applies sequentially until the first failure; and <strong>INDEPENDENT</strong> applies all the rest even if some fail. These four modes let a developer pick logic to fit the case — from payments and swaps that need "all or nothing," to auctions and bids that need "just the first one that works." It can be read as XRPL's attempt to offer, at the protocol level and in four standardized shapes, the composability that Ethereum has been securing belatedly through account abstraction and bundling.</p>
  <p class="ja">Batchの柔軟性は四つの実行モードから生まれる。XRPL文書によると、<strong>ALLORNOTHING</strong>は内部トランザクションがすべて成功して初めて一つでも成立する完全原子的モードで、<strong>ONLYONE</strong>は最初に成功した一つだけを適用し残りは捨てる。<strong>UNTILFAILURE</strong>は最初の失敗が出る前まで順次適用し、<strong>INDEPENDENT</strong>は一部が失敗しても残りをすべて適用する。この四モードのおかげで開発者は、「全部か無か」が必要な決済・スワップから、「複数の候補のうち先に成るもの一つ」が必要な競売・入札まで、状況に合った論理を選べる。これは、イーサリアムがアカウント抽象化とバンドリングで後追い的に確保してきた構成可能性(composability)を、XRPLがプロトコルレベルで四つの規格化された形で提供しようとする試みと見られる。</p>
  <p class="es">La flexibilidad de Batch proviene de cuatro modos de ejecución. Según la documentación de XRPL, <strong>ALLORNOTHING</strong> es el modo plenamente atómico en el que toda transacción interna debe tener éxito para que cualquiera se sostenga; <strong>ONLYONE</strong> aplica solo la primera que tenga éxito y descarta el resto; <strong>UNTILFAILURE</strong> aplica secuencialmente hasta el primer fallo; e <strong>INDEPENDENT</strong> aplica todo el resto aunque algunas fallen. Estos cuatro modos permiten al desarrollador elegir la lógica según el caso — desde pagos y swaps que necesitan "todo o nada", hasta subastas y pujas que necesitan "solo la primera que funcione". Puede leerse como el intento de XRPL de ofrecer, a nivel de protocolo y en cuatro formas estandarizadas, la componibilidad que Ethereum ha ido asegurando tardíamente mediante la abstracción de cuentas y el bundling.</p>
  <p class="de">Die Flexibilität von Batch stammt aus vier Ausführungsmodi. Laut XRPL-Dokumentation ist <strong>ALLORNOTHING</strong> der vollständig atomare Modus, in dem jede innere Transaktion gelingen muss, damit auch nur eine hält; <strong>ONLYONE</strong> wendet nur die erste erfolgreiche an und verwirft den Rest; <strong>UNTILFAILURE</strong> wendet sequenziell bis zum ersten Fehler an; und <strong>INDEPENDENT</strong> wendet alle übrigen an, selbst wenn einige scheitern. Diese vier Modi lassen den Entwickler die passende Logik wählen — von Zahlungen und Swaps, die „alles oder nichts" brauchen, bis zu Auktionen und Geboten, die „nur das erste, das funktioniert" brauchen. Es lässt sich als XRPLs Versuch lesen, auf Protokollebene und in vier standardisierten Formen jene Komponierbarkeit anzubieten, die Ethereum verspätet über Account Abstraction und Bundling gesichert hat.</p>

  <div class="ko">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">XRPL 배치(XLS-56d) — 하나의 묶음, 네 가지 실행 모드</text>
    <g font-family="sans-serif">
      <rect x="18" y="50" width="666" height="42" rx="8" fill="#0f1720" stroke="#3b82f6" stroke-width="1.4"/>
      <text x="351" y="76" fill="#93c5fd" font-size="14" text-anchor="middle" font-weight="700">1개 서명 · 최대 8개 내부 트랜잭션 · 한 계정 또는 여러 계정 · 단일 원자적 묶음</text>

      <rect x="18" y="106" width="325" height="92" rx="10" fill="#101f14" stroke="#22c55e" stroke-width="1.6"/>
      <text x="34" y="132" fill="#22c55e" font-size="15" font-weight="700">ALLORNOTHING</text>
      <text x="34" y="156" fill="#e4e4e7" font-size="13.5">모두 성공해야 전체 성립,</text>
      <text x="34" y="176" fill="#e4e4e7" font-size="13.5">하나라도 실패하면 전부 무효</text>

      <rect x="359" y="106" width="325" height="92" rx="10" fill="#101a24" stroke="#38bdf8" stroke-width="1.6"/>
      <text x="375" y="132" fill="#38bdf8" font-size="15" font-weight="700">ONLYONE</text>
      <text x="375" y="156" fill="#e4e4e7" font-size="13.5">처음 성공한 하나만 적용,</text>
      <text x="375" y="176" fill="#e4e4e7" font-size="13.5">나머지는 버려짐</text>

      <rect x="18" y="210" width="325" height="92" rx="10" fill="#1c1a10" stroke="#f7931a" stroke-width="1.6"/>
      <text x="34" y="236" fill="#f7931a" font-size="15" font-weight="700">UNTILFAILURE</text>
      <text x="34" y="260" fill="#e4e4e7" font-size="13.5">첫 실패 직전까지 순차 적용,</text>
      <text x="34" y="280" fill="#e4e4e7" font-size="13.5">이후는 중단</text>

      <rect x="359" y="210" width="325" height="92" rx="10" fill="#1a1226" stroke="#a78bfa" stroke-width="1.6"/>
      <text x="375" y="236" fill="#a78bfa" font-size="15" font-weight="700">INDEPENDENT</text>
      <text x="375" y="260" fill="#e4e4e7" font-size="13.5">일부 실패와 무관하게</text>
      <text x="375" y="280" fill="#e4e4e7" font-size="13.5">나머지 전부 적용</text>

      <rect x="18" y="316" width="666" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.2"/>
      <text x="351" y="342" fill="#a1a1aa" font-size="14" text-anchor="middle">활성화 요건: 신뢰 검증인 80% 초과 지지를 2주 연속 유지 (도중 이탈 시 2주 재시작)</text>
      <text x="351" y="366" fill="#71717a" font-size="13" text-anchor="middle">코어 재병합 완료 → 다음 rippled 릴리스에서 투표 개시 예정 · 자료: XRPL.org, U.Today</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">XRPL Batch (XLS-56d) — one bundle, four execution modes</text>
    <g font-family="sans-serif">
      <rect x="18" y="50" width="666" height="42" rx="8" fill="#0f1720" stroke="#3b82f6" stroke-width="1.4"/>
      <text x="351" y="76" fill="#93c5fd" font-size="14" text-anchor="middle" font-weight="700">1 signature · up to 8 inner transactions · one or many accounts · a single atomic bundle</text>

      <rect x="18" y="106" width="325" height="92" rx="10" fill="#101f14" stroke="#22c55e" stroke-width="1.6"/>
      <text x="34" y="132" fill="#22c55e" font-size="15" font-weight="700">ALLORNOTHING</text>
      <text x="34" y="156" fill="#e4e4e7" font-size="13.5">All must succeed for any to hold;</text>
      <text x="34" y="176" fill="#e4e4e7" font-size="13.5">one failure voids the whole batch</text>

      <rect x="359" y="106" width="325" height="92" rx="10" fill="#101a24" stroke="#38bdf8" stroke-width="1.6"/>
      <text x="375" y="132" fill="#38bdf8" font-size="15" font-weight="700">ONLYONE</text>
      <text x="375" y="156" fill="#e4e4e7" font-size="13.5">Only the first to succeed applies;</text>
      <text x="375" y="176" fill="#e4e4e7" font-size="13.5">the rest are discarded</text>

      <rect x="18" y="210" width="325" height="92" rx="10" fill="#1c1a10" stroke="#f7931a" stroke-width="1.6"/>
      <text x="34" y="236" fill="#f7931a" font-size="15" font-weight="700">UNTILFAILURE</text>
      <text x="34" y="260" fill="#e4e4e7" font-size="13.5">Applies in order until the first</text>
      <text x="34" y="280" fill="#e4e4e7" font-size="13.5">failure, then stops</text>

      <rect x="359" y="210" width="325" height="92" rx="10" fill="#1a1226" stroke="#a78bfa" stroke-width="1.6"/>
      <text x="375" y="236" fill="#a78bfa" font-size="15" font-weight="700">INDEPENDENT</text>
      <text x="375" y="260" fill="#e4e4e7" font-size="13.5">Applies all the rest regardless</text>
      <text x="375" y="280" fill="#e4e4e7" font-size="13.5">of individual failures</text>

      <rect x="18" y="316" width="666" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.2"/>
      <text x="351" y="342" fill="#a1a1aa" font-size="14" text-anchor="middle">Activation: over 80% of trusted validators must hold support for two straight weeks (a drop restarts it)</text>
      <text x="351" y="366" fill="#71717a" font-size="13" text-anchor="middle">Core merge done → voting to open in the next rippled release · Sources: XRPL.org, U.Today</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">XRPL Batch(XLS-56d) — 一つの束、四つの実行モード</text>
    <g font-family="sans-serif">
      <rect x="18" y="50" width="666" height="42" rx="8" fill="#0f1720" stroke="#3b82f6" stroke-width="1.4"/>
      <text x="351" y="76" fill="#93c5fd" font-size="14" text-anchor="middle" font-weight="700">1署名 · 最大8件の内部取引 · 一口座または複数口座 · 単一の原子的な束</text>

      <rect x="18" y="106" width="325" height="92" rx="10" fill="#101f14" stroke="#22c55e" stroke-width="1.6"/>
      <text x="34" y="132" fill="#22c55e" font-size="15" font-weight="700">ALLORNOTHING</text>
      <text x="34" y="156" fill="#e4e4e7" font-size="13.5">すべて成功して初めて成立、</text>
      <text x="34" y="176" fill="#e4e4e7" font-size="13.5">一つでも失敗すれば全体が無効</text>

      <rect x="359" y="106" width="325" height="92" rx="10" fill="#101a24" stroke="#38bdf8" stroke-width="1.6"/>
      <text x="375" y="132" fill="#38bdf8" font-size="15" font-weight="700">ONLYONE</text>
      <text x="375" y="156" fill="#e4e4e7" font-size="13.5">最初に成功した一つだけ適用、</text>
      <text x="375" y="176" fill="#e4e4e7" font-size="13.5">残りは破棄</text>

      <rect x="18" y="210" width="325" height="92" rx="10" fill="#1c1a10" stroke="#f7931a" stroke-width="1.6"/>
      <text x="34" y="236" fill="#f7931a" font-size="15" font-weight="700">UNTILFAILURE</text>
      <text x="34" y="260" fill="#e4e4e7" font-size="13.5">最初の失敗の直前まで順次適用、</text>
      <text x="34" y="280" fill="#e4e4e7" font-size="13.5">以降は中断</text>

      <rect x="359" y="210" width="325" height="92" rx="10" fill="#1a1226" stroke="#a78bfa" stroke-width="1.6"/>
      <text x="375" y="236" fill="#a78bfa" font-size="15" font-weight="700">INDEPENDENT</text>
      <text x="375" y="260" fill="#e4e4e7" font-size="13.5">一部の失敗と無関係に</text>
      <text x="375" y="280" fill="#e4e4e7" font-size="13.5">残りをすべて適用</text>

      <rect x="18" y="316" width="666" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.2"/>
      <text x="351" y="342" fill="#a1a1aa" font-size="14" text-anchor="middle">活性化要件: 信頼検証者の80%超の支持を2週間連続で維持(途中で下回れば2週間再開)</text>
      <text x="351" y="366" fill="#71717a" font-size="13" text-anchor="middle">コア再統合完了 → 次のrippledリリースで投票開始予定 · 資料: XRPL.org, U.Today</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">XRPL Batch (XLS-56d) — un paquete, cuatro modos de ejecución</text>
    <g font-family="sans-serif">
      <rect x="18" y="50" width="666" height="42" rx="8" fill="#0f1720" stroke="#3b82f6" stroke-width="1.4"/>
      <text x="351" y="76" fill="#93c5fd" font-size="13.5" text-anchor="middle" font-weight="700">1 firma · hasta 8 transacciones internas · una o varias cuentas · un paquete atómico</text>

      <rect x="18" y="106" width="325" height="92" rx="10" fill="#101f14" stroke="#22c55e" stroke-width="1.6"/>
      <text x="34" y="132" fill="#22c55e" font-size="15" font-weight="700">ALLORNOTHING</text>
      <text x="34" y="156" fill="#e4e4e7" font-size="13.5">Todas deben tener éxito;</text>
      <text x="34" y="176" fill="#e4e4e7" font-size="13.5">un fallo anula todo el lote</text>

      <rect x="359" y="106" width="325" height="92" rx="10" fill="#101a24" stroke="#38bdf8" stroke-width="1.6"/>
      <text x="375" y="132" fill="#38bdf8" font-size="15" font-weight="700">ONLYONE</text>
      <text x="375" y="156" fill="#e4e4e7" font-size="13.5">Solo aplica la primera con éxito;</text>
      <text x="375" y="176" fill="#e4e4e7" font-size="13.5">el resto se descarta</text>

      <rect x="18" y="210" width="325" height="92" rx="10" fill="#1c1a10" stroke="#f7931a" stroke-width="1.6"/>
      <text x="34" y="236" fill="#f7931a" font-size="15" font-weight="700">UNTILFAILURE</text>
      <text x="34" y="260" fill="#e4e4e7" font-size="13.5">Aplica en orden hasta el primer</text>
      <text x="34" y="280" fill="#e4e4e7" font-size="13.5">fallo, y luego se detiene</text>

      <rect x="359" y="210" width="325" height="92" rx="10" fill="#1a1226" stroke="#a78bfa" stroke-width="1.6"/>
      <text x="375" y="236" fill="#a78bfa" font-size="15" font-weight="700">INDEPENDENT</text>
      <text x="375" y="260" fill="#e4e4e7" font-size="13.5">Aplica todo el resto pese a</text>
      <text x="375" y="280" fill="#e4e4e7" font-size="13.5">fallos individuales</text>

      <rect x="18" y="316" width="666" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.2"/>
      <text x="351" y="342" fill="#a1a1aa" font-size="13.5" text-anchor="middle">Activación: más del 80% de validadores confiables debe sostener apoyo dos semanas seguidas (una caída reinicia)</text>
      <text x="351" y="366" fill="#71717a" font-size="13" text-anchor="middle">Fusión al núcleo hecha → votación en la próxima versión de rippled · Fuentes: XRPL.org, U.Today</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="32" fill="#fafafa" font-size="15" font-weight="700" font-family="sans-serif">XRPL Batch (XLS-56d) — ein Bündel, vier Ausführungsmodi</text>
    <g font-family="sans-serif">
      <rect x="18" y="50" width="666" height="42" rx="8" fill="#0f1720" stroke="#3b82f6" stroke-width="1.4"/>
      <text x="351" y="76" fill="#93c5fd" font-size="13" text-anchor="middle" font-weight="700">1 Signatur · bis zu 8 innere Transaktionen · ein oder mehrere Konten · ein atomares Bündel</text>

      <rect x="18" y="106" width="325" height="92" rx="10" fill="#101f14" stroke="#22c55e" stroke-width="1.6"/>
      <text x="34" y="132" fill="#22c55e" font-size="15" font-weight="700">ALLORNOTHING</text>
      <text x="34" y="156" fill="#e4e4e7" font-size="13.5">Alle müssen gelingen;</text>
      <text x="34" y="176" fill="#e4e4e7" font-size="13.5">ein Fehler annulliert das Bündel</text>

      <rect x="359" y="106" width="325" height="92" rx="10" fill="#101a24" stroke="#38bdf8" stroke-width="1.6"/>
      <text x="375" y="132" fill="#38bdf8" font-size="15" font-weight="700">ONLYONE</text>
      <text x="375" y="156" fill="#e4e4e7" font-size="13.5">Nur die erste erfolgreiche gilt;</text>
      <text x="375" y="176" fill="#e4e4e7" font-size="13.5">der Rest wird verworfen</text>

      <rect x="18" y="210" width="325" height="92" rx="10" fill="#1c1a10" stroke="#f7931a" stroke-width="1.6"/>
      <text x="34" y="236" fill="#f7931a" font-size="15" font-weight="700">UNTILFAILURE</text>
      <text x="34" y="260" fill="#e4e4e7" font-size="13.5">Gilt der Reihe nach bis zum</text>
      <text x="34" y="280" fill="#e4e4e7" font-size="13.5">ersten Fehler, dann Stopp</text>

      <rect x="359" y="210" width="325" height="92" rx="10" fill="#1a1226" stroke="#a78bfa" stroke-width="1.6"/>
      <text x="375" y="236" fill="#a78bfa" font-size="15" font-weight="700">INDEPENDENT</text>
      <text x="375" y="260" fill="#e4e4e7" font-size="13.5">Wendet den Rest an, trotz</text>
      <text x="375" y="280" fill="#e4e4e7" font-size="13.5">einzelner Fehlschläge</text>

      <rect x="18" y="316" width="666" height="66" rx="8" fill="#1c1c1f" stroke="#3f3f46" stroke-width="1.2"/>
      <text x="351" y="342" fill="#a1a1aa" font-size="13" text-anchor="middle">Aktivierung: über 80 % der vertrauten Validatoren müssen zwei Wochen am Stück Unterstützung halten (ein Abfall startet neu)</text>
      <text x="351" y="366" fill="#71717a" font-size="13" text-anchor="middle">Kern-Merge erledigt → Abstimmung im nächsten rippled-Release · Quellen: XRPL.org, U.Today</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">2월의 교훈 — 서명 검증 결함이 남긴 것</h2>
  <h2 class="en">February's lesson — what the signature-validation flaw left behind</h2>
  <h2 class="ja">2月の教訓 — 署名検証の欠陥が残したもの</h2>
  <h2 class="es">La lección de febrero — lo que dejó el fallo de validación de firmas</h2>
  <h2 class="de">Die Lektion vom Februar — was der Signaturvalidierungsfehler hinterließ</h2>
  <p class="ko">이번 재병합이 주목받는 이유는 배치가 한 번 크게 넘어졌던 기능이기 때문이다. XRPL.org 공개 보고서에 따르면 2026년 2월 19일, 연구자 프라나미아 케시카맛(Pranamya Keshkamat)과 칸티나 AI(Cantina AI)가 배치 수정안의 서명 검증 로직에서 치명적 결함을 발견했다. 이 결함은 공격자가 피해자의 개인키 없이도 임의 계정을 대신해 내부 트랜잭션을 실행하게 해, 무단 자금 이전과 원장 상태 변경을 가능케 하는 것이었다. 다행히 당시 수정안은 투표 단계에 있었을 뿐 메인넷에서 활성화되지 않았기 때문에 실제 피해 자금은 없었다.</p>
  <p class="en">This re-merge draws attention because Batch is a feature that once stumbled badly. Per an XRPL.org disclosure report, on February 19, 2026, researchers Pranamya Keshkamat and Cantina AI found a critical flaw in the Batch amendment's signature-validation logic. The flaw would let an attacker execute inner transactions on behalf of an arbitrary account without the victim's private key, enabling unauthorized fund transfers and ledger-state changes. Fortunately, the amendment was only in its voting phase and had not been activated on mainnet at the time, so no actual funds were at risk.</p>
  <p class="ja">今回の再統合が注目されるのは、Batchが一度大きく躓いた機能だからだ。XRPL.orgの公開報告書によると、2026年2月19日、研究者Pranamya KeshkamatとCantina AIがBatch修正案の署名検証ロジックに致命的な欠陥を発見した。この欠陥は、攻撃者が被害者の秘密鍵なしに任意の口座を代行して内部トランザクションを実行できるようにし、無断の資金移転や台帳状態の変更を可能にするものだった。幸い当時、修正案は投票段階にあっただけでメインネットでは活性化されておらず、実際の被害資金はなかった。</p>
  <p class="es">Esta refusión llama la atención porque Batch es una función que tropezó gravemente una vez. Según un informe de divulgación de XRPL.org, el 19 de febrero de 2026 los investigadores Pranamya Keshkamat y Cantina AI hallaron un fallo crítico en la lógica de validación de firmas de la enmienda Batch. El fallo permitiría a un atacante ejecutar transacciones internas en nombre de una cuenta arbitraria sin la clave privada de la víctima, habilitando transferencias de fondos no autorizadas y cambios en el estado del libro mayor. Por fortuna, la enmienda estaba solo en su fase de votación y no se había activado en la mainnet en ese momento, así que no hubo fondos reales en riesgo.</p>
  <p class="de">Dieser erneute Merge erregt Aufmerksamkeit, weil Batch eine Funktion ist, die einmal schwer stolperte. Laut einem Offenlegungsbericht von XRPL.org fanden die Forscher Pranamya Keshkamat und Cantina AI am 19. Februar 2026 einen kritischen Fehler in der Signaturvalidierungslogik des Batch-Amendments. Der Fehler hätte einem Angreifer erlaubt, innere Transaktionen im Namen eines beliebigen Kontos ohne den privaten Schlüssel des Opfers auszuführen, was unbefugte Geldtransfers und Änderungen des Ledger-Zustands ermöglicht hätte. Glücklicherweise befand sich das Amendment nur in der Abstimmungsphase und war zu jener Zeit nicht im Mainnet aktiviert, sodass keine tatsächlichen Gelder gefährdet waren.</p>
  <p class="ko">여기서 XRPL의 수정안 프로세스가 왜 이렇게 느린가에 대한 답이 나온다. 새 기능은 코드 병합만으로 네트워크에 반영되지 않고, 검증인 투표라는 별도의 관문을 통과해야 한다. 2월 사례는 이 지연 구간이 '느려서 답답한 절차'가 아니라 '실수를 붙잡는 안전망'으로 작동한 대표적 장면이다. 코드가 개발자 손을 떠나 활성화 전까지 공개 검증에 노출되는 이 구조 덕분에, 결함이 메인넷 자금이 아니라 테스트 단계에서 발견됐다. 앞서 다룬 서머파이 사례처럼 이미 운영 중인 컨트랙트의 회계 로직이 뚫린 사건과 정확히 대비되는 지점이다 — 한쪽은 활성화 후 실제 자금을 잃었고, 다른 쪽은 활성화 전에 결함을 걸러냈다.</p>
  <p class="en">Here is the answer to why XRPL's amendment process is so slow. A new feature is not reflected on the network by a code merge alone; it must pass a separate gate — validator voting. The February case is a prime scene of this delay window working not as "a slow, frustrating procedure" but as "a safety net that catches mistakes." Because the code, once out of the developer's hands, is exposed to public scrutiny until activation, the flaw was found at the test stage rather than in mainnet funds. It stands in exact contrast to an incident like the Summer.fi case covered earlier, where the accounting logic of an already-live contract was breached — one side lost real funds after activation; the other filtered out the flaw before it.</p>
  <p class="ja">ここに、XRPLの修正案プロセスがなぜこれほど遅いのかへの答えがある。新機能はコード統合だけではネットワークに反映されず、検証者投票という別の関門を通らねばならない。2月の事例は、この遅延区間が「遅くてもどかしい手続き」ではなく「ミスを捕まえる安全網」として働いた代表的な場面だ。コードが開発者の手を離れ活性化前まで公開検証にさらされるこの構造のおかげで、欠陥はメインネットの資金ではなくテスト段階で発見された。先に扱ったSummer.fiの事例のように、すでに稼働中のコントラクトの会計ロジックが破られた事件と正確に対比される点だ — 一方は活性化後に実際の資金を失い、他方は活性化前に欠陥を濾し取った。</p>
  <p class="es">Aquí está la respuesta a por qué el proceso de enmiendas de XRPL es tan lento. Una nueva función no se refleja en la red con una simple fusión de código; debe pasar una puerta aparte: la votación de validadores. El caso de febrero es una escena ejemplar de esa ventana de demora funcionando no como "un trámite lento y frustrante" sino como "una red de seguridad que atrapa errores". Porque el código, una vez fuera de las manos del desarrollador, queda expuesto al escrutinio público hasta la activación, el fallo se halló en la etapa de pruebas y no en fondos de mainnet. Contrasta exactamente con un incidente como el de Summer.fi tratado antes, donde se vulneró la lógica contable de un contrato ya activo — un lado perdió fondos reales tras la activación; el otro filtró el fallo antes.</p>
  <p class="de">Hier ist die Antwort darauf, warum XRPLs Amendment-Prozess so langsam ist. Eine neue Funktion wird nicht allein durch einen Code-Merge im Netzwerk wirksam; sie muss ein separates Tor passieren — die Validator-Abstimmung. Der Februar-Fall ist eine Musterszene dafür, dass dieses Verzögerungsfenster nicht als „langsames, frustrierendes Verfahren", sondern als „Sicherheitsnetz, das Fehler auffängt" wirkt. Weil der Code, einmal aus den Händen des Entwicklers, bis zur Aktivierung öffentlicher Prüfung ausgesetzt ist, wurde der Fehler in der Testphase statt in Mainnet-Geldern gefunden. Er steht im genauen Gegensatz zu einem Vorfall wie dem zuvor behandelten Summer.fi-Fall, bei dem die Buchhaltungslogik eines bereits aktiven Vertrags durchbrochen wurde — die eine Seite verlor nach der Aktivierung echte Gelder; die andere filterte den Fehler zuvor heraus.</p>

  <h2 class="ko">남은 관문 — 80% 정족수와 검증인의 보수성</h2>
  <h2 class="en">The remaining hurdle — the 80% quorum and validator conservatism</h2>
  <h2 class="ja">残る関門 — 80%定足数と検証者の保守性</h2>
  <h2 class="es">El obstáculo restante — el quórum del 80% y el conservadurismo de los validadores</h2>
  <h2 class="de">Die verbleibende Hürde — das 80-%-Quorum und der Konservatismus der Validatoren</h2>
  <p class="ko">코어 병합은 끝이 아니라 시작이다. XRPL.org 문서에 따르면 수정안이 메인넷에서 켜지려면 신뢰 검증인 목록의 80%를 초과하는 지지를 2주 동안 연속으로 유지해야 한다. 이 기간에 지지가 80% 밑으로 한 번이라도 떨어지면 수정안은 일시 거부되고, 2주 시계가 처음부터 다시 시작된다. 즉 활성화는 순간적 다수결이 아니라 '흔들림 없이 유지된 합의'를 요구하는, 이동하는 2주 창(window) 방식이다. 수정안은 영구 활성화 전까지 다수를 얻었다 잃었다를 얼마든 반복할 수 있다.</p>
  <p class="en">The core merge is not the finish but the start. Per XRPL.org documentation, for an amendment to switch on at mainnet it must hold support from over 80% of the trusted validator list continuously for two weeks. If support dips below 80% even once in that span, the amendment is temporarily rejected and the two-week clock restarts from scratch. Activation thus demands not a momentary majority but "a consensus held without wavering" — a moving two-week window. An amendment can gain and lose a majority any number of times before it becomes permanently enabled.</p>
  <p class="ja">コア統合は終わりではなく始まりだ。XRPL.org文書によると、修正案がメインネットで有効化されるには、信頼検証者リストの80%を超える支持を2週間連続で維持せねばならない。この期間に支持が一度でも80%を下回れば修正案は一時的に拒否され、2週間の時計が最初から再開する。つまり活性化は瞬間的な多数決ではなく「揺らぎなく維持された合意」を求める、移動する2週間の窓(window)方式だ。修正案は永久活性化の前まで、多数を得たり失ったりを何度でも繰り返しうる。</p>
  <p class="es">La fusión al núcleo no es el final sino el comienzo. Según la documentación de XRPL.org, para que una enmienda se active en la mainnet debe mantener el apoyo de más del 80% de la lista de validadores confiables de forma continua durante dos semanas. Si el apoyo cae por debajo del 80% aunque sea una vez en ese lapso, la enmienda se rechaza temporalmente y el reloj de dos semanas se reinicia desde cero. La activación exige así no una mayoría momentánea sino "un consenso sostenido sin vacilar" — una ventana móvil de dos semanas. Una enmienda puede ganar y perder una mayoría cuantas veces sea antes de habilitarse permanentemente.</p>
  <p class="de">Der Kern-Merge ist nicht das Ende, sondern der Anfang. Laut XRPL.org-Dokumentation muss ein Amendment, um im Mainnet aktiviert zu werden, die Unterstützung von über 80 % der Liste vertrauter Validatoren zwei Wochen lang ununterbrochen halten. Fällt die Unterstützung in dieser Spanne auch nur einmal unter 80 %, wird das Amendment vorübergehend abgelehnt und die Zwei-Wochen-Uhr startet von vorn. Aktivierung verlangt somit keine momentane Mehrheit, sondern „einen ohne Wanken gehaltenen Konsens" — ein gleitendes Zwei-Wochen-Fenster. Ein Amendment kann eine Mehrheit beliebig oft gewinnen und verlieren, bevor es dauerhaft aktiviert wird.</p>
  <p class="ko">이 대목에서 반론의 여지가 있다. 코어 재병합이 곧 활성화를 뜻하지는 않으며, 검증인들이 2월 결함의 기억 때문에 이번에는 더 신중하게 투표에 임할 수 있다. XRPL에서는 지금도 기관용 대출 기능인 XLS-65·XLS-66 같은 수정안이 6월 30일 기준 '투표 중' 상태로 80% 정족수를 기다리고 있어, 배치가 곧바로 통과하리라는 보장은 없다. 반대로, 원자적 트랜잭션은 XRPL이 디파이·기관 결제 경쟁에서 오래 지적받아 온 조합성 부족을 메우는 핵심 조각이기 때문에, 생태계 압력이 활성화를 앞당길 수도 있다. 한 검증인은 배치가 NFT 대 NFT 직접 거래 같은 새로운 시장을 열 잠재력이 있다고 언급하기도 했다. 요컨대 코어 병합은 기술적 준비 완료를 뜻할 뿐, 정치적·거버넌스적 관문은 이제부터다.</p>
  <p class="en">Here there is room for a counterpoint. A core re-merge does not equal activation, and validators may vote more cautiously this time given the memory of February's flaw. On XRPL, amendments like the institutional-lending features XLS-65 and XLS-66 were still "open for voting" and awaiting the 80% quorum as of June 30, so there is no guarantee Batch sails straight through. Conversely, because atomic transactions are a key piece filling the composability gap XRPL has long been faulted for in DeFi and institutional-payment competition, ecosystem pressure could pull activation forward. One validator even remarked that Batch has the potential to open new markets such as direct NFT-to-NFT trading. In short, the core merge signals technical readiness only; the political and governance gate begins now.</p>
  <p class="ja">この点で反論の余地がある。コア再統合が即活性化を意味するわけではなく、検証者は2月の欠陥の記憶ゆえ今回はより慎重に投票に臨むかもしれない。XRPLでは今も、機関向け貸出機能のXLS-65・XLS-66のような修正案が6月30日時点で「投票中」の状態で80%定足数を待っており、Batchがすぐ通過する保証はない。逆に、原子的トランザクションはXRPLがDeFi・機関決済の競争で長く指摘されてきた構成可能性の不足を埋める中核の部品であるため、エコシステムの圧力が活性化を早める可能性もある。ある検証者は、BatchがNFT対NFTの直接取引のような新市場を開く潜在力があると述べもした。要するにコア統合は技術的準備完了を意味するだけで、政治的・ガバナンス的な関門はこれからだ。</p>
  <p class="es">Aquí hay margen para una réplica. Una refusión al núcleo no equivale a activación, y los validadores podrían votar con más cautela esta vez dada la memoria del fallo de febrero. En XRPL, enmiendas como las funciones de préstamo institucional XLS-65 y XLS-66 seguían "abiertas a votación" y esperando el quórum del 80% a 30 de junio, así que no hay garantía de que Batch pase de largo. A la inversa, como las transacciones atómicas son una pieza clave que llena la carencia de componibilidad que a XRPL se le reprocha desde hace tiempo en la competencia de DeFi y pagos institucionales, la presión del ecosistema podría adelantar la activación. Un validador incluso comentó que Batch tiene potencial para abrir nuevos mercados como el comercio directo NFT a NFT. En resumen, la fusión al núcleo solo señala preparación técnica; la puerta política y de gobernanza empieza ahora.</p>
  <p class="de">Hier gibt es Raum für einen Einwand. Ein Kern-Re-Merge ist nicht gleich Aktivierung, und Validatoren könnten diesmal angesichts der Erinnerung an den Februar-Fehler vorsichtiger abstimmen. Auf XRPL waren Amendments wie die institutionellen Kreditfunktionen XLS-65 und XLS-66 zum 30. Juni noch „zur Abstimmung offen" und warteten auf das 80-%-Quorum, sodass es keine Garantie gibt, dass Batch glatt durchgeht. Umgekehrt könnte, da atomare Transaktionen ein Schlüsselstück sind, das die Komponierbarkeitslücke füllt, die XRPL im DeFi- und institutionellen Zahlungswettbewerb lange vorgeworfen wird, der Druck des Ökosystems die Aktivierung vorziehen. Ein Validator merkte sogar an, Batch habe das Potenzial, neue Märkte wie den direkten NFT-zu-NFT-Handel zu eröffnen. Kurz: Der Kern-Merge signalisiert nur technische Bereitschaft; das politische und Governance-Tor beginnt jetzt.</p>

  <h2 class="ko">왜 중요하고 무엇을 지켜봐야 하나</h2>
  <h2 class="en">Why it matters, and what to watch</h2>
  <h2 class="ja">なぜ重要で、何を注視すべきか</h2>
  <h2 class="es">Por qué importa, y qué vigilar</h2>
  <h2 class="de">Warum es wichtig ist, und worauf zu achten</h2>
  <p class="ko">배치가 중요한 이유는 XRPL의 경쟁 지형과 맞닿아 있다. 이 원장은 결제·정산 속도에서는 강점을 인정받았지만, 이더리움·솔라나 같은 스마트컨트랙트 체인에 비해 여러 작업을 한 번에 묶는 조합성이 약하다는 지적을 오래 받았다. 배치가 활성화되면 온체인 스왑, 조건부 결제, 담보 이동 같은 복합 작업을 상대방 위험 없이 한 번에 처리할 수 있어, <a href="/blog/ripple-rlusd-xrpl-settlement-volume.html">RLUSD 스테이블코인 정산</a>이나 기관 결제 워크플로에 직접 쓰일 여지가 커진다. 이는 단순한 기능 추가가 아니라, XRPL이 '빠른 송금망'을 넘어 '프로그래머블 결제 인프라'로 이동하려는 방향성을 보여주는 지표다.</p>
  <p class="en">Batch matters because it touches XRPL's competitive terrain. The ledger is credited for payment and settlement speed, but has long been faulted for weak composability — bundling several operations at once — relative to smart-contract chains like Ethereum and Solana. Once Batch is active, complex operations such as on-chain swaps, conditional payments and collateral moves can be handled in one shot without counterparty risk, widening the room to use it directly in <a href="/blog/ripple-rlusd-xrpl-settlement-volume.html">RLUSD stablecoin settlement</a> or institutional-payment workflows. This is not a mere feature add but a marker of XRPL's intent to move beyond a "fast remittance rail" toward "programmable payment infrastructure."</p>
  <p class="ja">Batchが重要なのは、XRPLの競争地形に触れるからだ。この台帳は決済・清算の速度では強みを認められてきたが、イーサリアムやソラナのようなスマートコントラクトチェーンに比べ、複数の処理を一度に束ねる構成可能性が弱いと長く指摘されてきた。Batchが活性化されれば、オンチェーンスワップ、条件付き決済、担保移動のような複合処理を相手方リスクなしに一度で処理でき、<a href="/blog/ripple-rlusd-xrpl-settlement-volume.html">RLUSDステーブルコインの清算</a>や機関決済ワークフローに直接使われる余地が広がる。これは単なる機能追加ではなく、XRPLが「速い送金網」を超えて「プログラマブルな決済インフラ」へ移ろうとする方向性を示す指標だ。</p>
  <p class="es">Batch importa porque toca el terreno competitivo de XRPL. Al libro mayor se le reconoce la velocidad de pago y liquidación, pero se le reprocha desde hace tiempo una débil componibilidad —agrupar varias operaciones a la vez— frente a cadenas de contratos inteligentes como Ethereum y Solana. Una vez activo Batch, operaciones complejas como swaps on-chain, pagos condicionales y movimientos de colateral pueden gestionarse de una sola vez sin riesgo de contraparte, ampliando el margen para usarlo directamente en la <a href="/blog/ripple-rlusd-xrpl-settlement-volume.html">liquidación de la stablecoin RLUSD</a> o en flujos de pago institucionales. No es una mera adición de función, sino un indicador de la intención de XRPL de ir más allá de un "carril de remesas rápido" hacia una "infraestructura de pagos programable".</p>
  <p class="de">Batch ist wichtig, weil es XRPLs Wettbewerbsterrain berührt. Dem Ledger wird Zahlungs- und Abwicklungsgeschwindigkeit zugutegehalten, doch ihm wird gegenüber Smart-Contract-Ketten wie Ethereum und Solana lange eine schwache Komponierbarkeit vorgeworfen — das Bündeln mehrerer Operationen auf einmal. Ist Batch einmal aktiv, lassen sich komplexe Operationen wie On-Chain-Swaps, bedingte Zahlungen und Sicherheitenbewegungen in einem Zug ohne Kontrahentenrisiko abwickeln, was den Spielraum erweitert, es direkt in der <a href="/blog/ripple-rlusd-xrpl-settlement-volume.html">RLUSD-Stablecoin-Abwicklung</a> oder in institutionellen Zahlungs-Workflows zu nutzen. Das ist keine bloße Funktionsergänzung, sondern ein Marker für XRPLs Absicht, über eine „schnelle Überweisungsschiene" hinaus zu einer „programmierbaren Zahlungsinfrastruktur" zu wandern.</p>
  <p class="ko"><strong>지켜봐야 할 것</strong>은 세 가지다. 첫째, 다음 rippled 릴리스의 시점과 그에 담길 배치 투표 개시 여부다. 코어에는 들어갔지만 언제 실제 투표에 부쳐지느냐가 남은 변수다. 둘째, 투표가 시작된 뒤 검증인 지지율이 80% 선을 흔들림 없이 넘기는지, 아니면 2월 결함의 여파로 지지가 오르내리며 2주 시계가 반복 재시작되는지다. 셋째, 앞서 <a href="/blog/flare-confidential-compute-xrpl-vote.html">XRPL 관련 온체인 투표</a>에서 확인됐듯 거버넌스 결과는 종종 막판까지 유동적이므로, 개발자 발표를 활성화 확정으로 오해하지 않는 것이다. 코드가 병합됐다는 사실과 기능이 켜졌다는 사실은 XRPL에서 명확히 다른 단계이며, 그 사이에 놓인 검증인 합의야말로 이 원장의 보안 모델의 핵심이다.</p>
  <p class="en"><strong>Three things to watch.</strong> First, the timing of the next rippled release and whether it opens Batch voting. It is in core, but when it actually goes to a vote is the open variable. Second, once voting starts, whether validator support clears the 80% line without wavering, or whether — in the aftershock of February's flaw — support seesaws and the two-week clock keeps restarting. Third, as seen earlier in an <a href="/blog/flare-confidential-compute-xrpl-vote.html">XRPL-related on-chain vote</a>, governance outcomes are often fluid until the end, so do not mistake a developer announcement for confirmed activation. That code was merged and that a feature is switched on are distinctly different stages on XRPL, and the validator consensus that sits between them is the heart of this ledger's security model.</p>
  <p class="ja"><strong>注視すべきは</strong>三つだ。第一に、次のrippledリリースの時期と、それにBatch投票開始が含まれるかだ。コアには入ったが、いつ実際に投票にかけられるかが残る変数だ。第二に、投票開始後、検証者の支持率が80%線を揺らぎなく超えるのか、それとも2月の欠陥の余波で支持が上下し2週間の時計が繰り返し再開するのかだ。第三に、先に<a href="/blog/flare-confidential-compute-xrpl-vote.html">XRPL関連のオンチェーン投票</a>で確認されたように、ガバナンスの結果は往々にして最後まで流動的なので、開発者の発表を活性化確定と誤解しないことだ。コードが統合された事実と機能が有効化された事実は、XRPLでは明確に異なる段階であり、その間に置かれる検証者合意こそがこの台帳のセキュリティモデルの核心だ。</p>
  <p class="es"><strong>Tres cosas que vigilar.</strong> Primero, el momento de la próxima versión de rippled y si abre la votación de Batch. Está en el núcleo, pero cuándo va realmente a votación es la variable abierta. Segundo, una vez iniciada la votación, si el apoyo de los validadores supera la línea del 80% sin vacilar, o si —por la réplica del fallo de febrero— el apoyo oscila y el reloj de dos semanas se reinicia una y otra vez. Tercero, como se vio antes en una <a href="/blog/flare-confidential-compute-xrpl-vote.html">votación on-chain relacionada con XRPL</a>, los resultados de gobernanza suelen ser fluidos hasta el final, así que no confundir un anuncio de desarrollador con una activación confirmada. Que el código se fusione y que una función se active son etapas claramente distintas en XRPL, y el consenso de validadores que se sitúa entre ambas es el corazón del modelo de seguridad de este libro mayor.</p>
  <p class="de"><strong>Drei Dinge sind zu beobachten.</strong> Erstens der Zeitpunkt des nächsten rippled-Releases und ob es die Batch-Abstimmung eröffnet. Es ist im Kern, doch wann es tatsächlich zur Abstimmung geht, ist die offene Variable. Zweitens, ob nach Beginn der Abstimmung die Validator-Unterstützung die 80-%-Linie ohne Wanken überschreitet, oder ob — im Nachbeben des Februar-Fehlers — die Unterstützung schwankt und die Zwei-Wochen-Uhr immer wieder neu startet. Drittens, wie zuvor bei einer <a href="/blog/flare-confidential-compute-xrpl-vote.html">XRPL-bezogenen On-Chain-Abstimmung</a> gesehen, sind Governance-Ergebnisse oft bis zuletzt fließend, also eine Entwicklerankündigung nicht mit bestätigter Aktivierung verwechseln. Dass Code gemergt wurde und dass eine Funktion aktiviert ist, sind auf XRPL deutlich verschiedene Stufen, und der Validator-Konsens dazwischen ist das Herz des Sicherheitsmodells dieses Ledgers.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 배치(XLS-56d)는 최대 8개 트랜잭션을 하나의 원자적 묶음으로 실행하는 XRPL 프로토콜 업그레이드로, 코어 재병합을 마치고 검증인 투표를 앞뒀다. 네 가지 실행 모드(ALLORNOTHING·ONLYONE·UNTILFAILURE·INDEPENDENT)로 조합성을 프로토콜 레벨에서 규격화한다. 2월의 서명 검증 결함이 활성화 전 걸러졌다는 사실은, 느린 투표 절차가 곧 XRPL의 안전망임을 보여준다. 다만 코어 병합은 기술적 준비일 뿐, 80% 정족수 관문이 남아 있다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> Batch (XLS-56d) is an XRPL protocol upgrade that runs up to eight transactions as one atomic bundle; it has finished its core re-merge and awaits validator voting. Four modes (ALLORNOTHING, ONLYONE, UNTILFAILURE, INDEPENDENT) standardize composability at the protocol level. That February's signature-validation flaw was caught before activation shows the slow voting process is XRPL's safety net. But the core merge is only technical readiness — the 80% quorum gate remains.</div>
  <div class="box ja">💡 <strong>示唆:</strong> Batch(XLS-56d)は最大8件の取引を一つの原子的な束として実行するXRPLのプロトコルアップグレードで、コア再統合を終え検証者投票を控える。四つのモード(ALLORNOTHING・ONLYONE・UNTILFAILURE・INDEPENDENT)で構成可能性をプロトコルレベルで規格化する。2月の署名検証欠陥が活性化前に濾し取られた事実は、遅い投票手続きこそがXRPLの安全網であることを示す。ただしコア統合は技術的準備にすぎず、80%定足数の関門が残る。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> Batch (XLS-56d) es una actualización de protocolo de XRPL que ejecuta hasta ocho transacciones como un paquete atómico; ha completado su refusión al núcleo y espera la votación de validadores. Cuatro modos (ALLORNOTHING, ONLYONE, UNTILFAILURE, INDEPENDENT) estandarizan la componibilidad a nivel de protocolo. Que el fallo de validación de firmas de febrero se atrapara antes de la activación muestra que el lento proceso de votación es la red de seguridad de XRPL. Pero la fusión al núcleo es solo preparación técnica — queda la puerta del quórum del 80%.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Batch (XLS-56d) ist ein XRPL-Protokoll-Upgrade, das bis zu acht Transaktionen als ein atomares Bündel ausführt; es hat seinen Kern-Re-Merge abgeschlossen und wartet auf die Validator-Abstimmung. Vier Modi (ALLORNOTHING, ONLYONE, UNTILFAILURE, INDEPENDENT) standardisieren Komponierbarkeit auf Protokollebene. Dass der Signaturvalidierungsfehler vom Februar vor der Aktivierung gefangen wurde, zeigt, dass der langsame Abstimmungsprozess XRPLs Sicherheitsnetz ist. Doch der Kern-Merge ist nur technische Bereitschaft — die 80-%-Quorum-Hürde bleibt.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: U.Today, CoinCentral, XRPL.org(수정안·배치 트랜잭션 문서 및 2026-02 취약점 공개 보고서), RippleX 개발 블로그, TradingView/NewsBTC. 배치는 XLS-56d 규격이며, 코어 병합·투표 예정 상태는 보도 시점 기준으로 활성화가 확정된 것은 아니다. 이 글은 투자 조언이 아니다.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: U.Today, CoinCentral, XRPL.org (amendments and batch-transactions docs, plus the Feb 2026 vulnerability disclosure report), RippleX developer blog, TradingView/NewsBTC. Batch is the XLS-56d spec; the core-merge and pending-vote status is as of reporting and does not mean activation is confirmed. This article is not investment advice.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: U.Today、CoinCentral、XRPL.org(修正案・バッチトランザクション文書および2026年2月の脆弱性公開報告書)、RippleX開発ブログ、TradingView/NewsBTC。BatchはXLS-56d規格であり、コア統合・投票予定の状態は報道時点のもので活性化が確定したわけではない。本記事は投資助言ではない。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: U.Today, CoinCentral, XRPL.org (documentación de enmiendas y de transacciones por lotes, más el informe de divulgación de vulnerabilidad de feb. 2026), blog de desarrolladores de RippleX, TradingView/NewsBTC. Batch es la especificación XLS-56d; el estado de fusión al núcleo y votación pendiente es al momento de la información y no implica que la activación esté confirmada. Este artículo no es asesoramiento de inversión.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: U.Today, CoinCentral, XRPL.org (Amendment- und Batch-Transaktions-Dokumentation sowie der Schwachstellen-Offenlegungsbericht vom Feb. 2026), RippleX-Entwicklerblog, TradingView/NewsBTC. Batch ist die XLS-56d-Spezifikation; der Kern-Merge- und Abstimmungs-Status ist zum Berichtszeitpunkt und bedeutet nicht, dass die Aktivierung bestätigt ist. Dieser Artikel ist keine Anlageberatung.</p>
<?php require __DIR__.'/_footer.php'; ?>
