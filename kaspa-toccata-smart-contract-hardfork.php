<?php $slug = 'kaspa-toccata-smart-contract-hardfork'; require __DIR__.'/_header.php'; ?>

<p class="ko">작업증명(PoW) 블록DAG 체인 카스파(Kaspa)가 지난 6월 30일 '토카타(Toccata)' 하드포크를 메인넷에 활성화하며 순수 결제 체인에서 프로그래머블 레이어1으로 전환했다고 코인알럿뉴스(CoinAlertNews)와 게이트(Gate) 리서치 등이 보도했다. 이번 업그레이드는 베이스 레이어에 스마트 계약, KRC-20 네이티브 토큰 표준, 그리고 영지식(ZK) 증명 검증 오프코드를 도입했다. 활성화는 네트워크가 DAA 스코어 474,165,565에 도달한 시점에 이뤄졌으며, 카스파 출범 이래 가장 중대한 기술 변경 중 하나로 평가된다. 카스파 코어 개발자 마이클 서튼(Michael Sutton)은 토카타를 비트코인의 미실현 제안인 'OP_CAT++'에 가깝다고 설명한 바 있다.</p>
  <p class="en">Kaspa, a proof-of-work (PoW) blockDAG chain, activated its "Toccata" hard fork on mainnet on June 30, turning a pure payments chain into a programmable Layer 1, according to CoinAlertNews and Gate research. The upgrade introduces smart contracts, the KRC-20 native token standard, and zero-knowledge (ZK) proof-verification opcodes at the base layer. Activation occurred when the network reached DAA score 474,165,565 and is regarded as one of the most significant technical changes since Kaspa's launch. Kaspa core developer Michael Sutton has described Toccata as closer to Bitcoin's still-unrealized "OP_CAT++" proposal.</p>
  <p class="ja">プルーフ・オブ・ワーク(PoW)ブロックDAGチェーンのカスパ(Kaspa)が6月30日、「トッカータ(Toccata)」ハードフォークをメインネットで活性化し、純粋な決済チェーンからプログラマブルなレイヤー1へ転換したと、コインアラートニュース(CoinAlertNews)やゲート(Gate)リサーチなどが報じた。今回のアップグレードはベースレイヤーにスマートコントラクト、KRC-20ネイティブトークン標準、そしてゼロ知識(ZK)証明検証オペコードを導入した。活性化はネットワークがDAAスコア474,165,565に到達した時点で行われ、カスパ発足以来もっとも重大な技術変更の一つと評価される。カスパのコア開発者マイケル・サットン(Michael Sutton)氏はトッカータをビットコインの未実現提案「OP_CAT++」に近いと説明していた。</p>
  <p class="es">Kaspa, una cadena blockDAG de prueba de trabajo (PoW), activó su bifurcación dura "Toccata" en la red principal el 30 de junio, convirtiendo una cadena de pagos pura en una Layer 1 programable, según CoinAlertNews y la investigación de Gate. La actualización introduce contratos inteligentes, el estándar de token nativo KRC-20 y opcodes de verificación de pruebas de conocimiento cero (ZK) en la capa base. La activación ocurrió cuando la red alcanzó una puntuación DAA de 474.165.565 y se considera uno de los cambios técnicos más significativos desde el lanzamiento de Kaspa. El desarrollador principal de Kaspa, Michael Sutton, ha descrito Toccata como más cercana a la aún no realizada propuesta "OP_CAT++" de Bitcoin.</p>
  <p class="de">Kaspa, eine Proof-of-Work-(PoW-)BlockDAG-Chain, aktivierte am 30. Juni ihren „Toccata"-Hardfork im Mainnet und verwandelte eine reine Zahlungs-Chain in eine programmierbare Layer 1, wie CoinAlertNews und Gate-Research berichteten. Das Upgrade führt auf der Basisschicht Smart Contracts, den nativen Token-Standard KRC-20 und Opcodes zur Verifikation von Zero-Knowledge-(ZK-)Beweisen ein. Die Aktivierung erfolgte, als das Netzwerk den DAA-Score 474.165.565 erreichte, und gilt als eine der bedeutendsten technischen Änderungen seit dem Start von Kaspa. Kaspa-Kernentwickler Michael Sutton beschrieb Toccata als näher an Bitcoins noch unrealisiertem Vorschlag „OP_CAT++".</p>

  <h2 class="ko">무엇이 바뀌었나 — 결제 체인에서 프로그래머블 L1으로</h2>
  <h2 class="en">What changed — from payments chain to programmable L1</h2>
  <h2 class="ja">何が変わったか — 決済チェーンからプログラマブルL1へ</h2>
  <h2 class="es">Qué cambió — de cadena de pagos a L1 programable</h2>
  <h2 class="de">Was sich änderte — von der Zahlungs-Chain zur programmierbaren L1</h2>
  <p class="ko">카스파는 그동안 '빠른 결제'로만 정의되던 체인이었다. 히브리대·하버드에서 출발한 블록DAG 연구를 기반으로, 여러 블록이 병렬로 공존하면서도 GHOSTDAG 합의로 순서를 매기는 구조를 쓴다. 2025년 5월 크레센도(Crescendo) 하드포크로 블록 생성 속도를 초당 1개에서 10개(10 BPS)로 끌어올려 사실상 실시간 결제를 구현했지만, 여기까지는 '가치 이전'에 특화된 체인이었다. 토카타는 이 토대 위에 세 가지 능력을 베이스 레이어에 직접 심었다. 스마트 계약, KRC-20 네이티브 토큰, 그리고 L1에서 직접 증명을 검증하는 ZK 오프코드다.</p>
  <p class="ko">주목할 점은 접근 방식이다. 토카타는 커버넌트(covenant)라는 스크립트 확장(KIP-17)과 계보 추적용 커버넌트 ID(KIP-20), ZK 검증 오프코드(KIP-16), 분할 시퀀싱 커밋 구조(KIP-21)를 한꺼번에 도입했다. 여기에 개발자가 커버넌트를 작성할 수 있는 전용 컴파일러 실버스크립트(SilverScript)가 얹혔다. 실행 환경 측면에서는 두 개의 L2 — 카스플렉스(Kasplex)와 이그라(Igra) — 가 완전한 EVM 호환성을 제공하며, 이더리움 메인넷보다 200배 이상 저렴한 거래 비용을 내세운다. 즉 카스파는 '네이티브 커버넌트(L1)'와 'EVM 호환(L2)'이라는 두 개의 개발 경로를 동시에 여는 이원 전략을 택했다.</p>
  <p class="en">Kaspa had until now been defined purely by "fast payments." Built on blockDAG research that began at the Hebrew University and Harvard, it uses a structure in which many blocks coexist in parallel yet are ordered by GHOSTDAG consensus. The May 2025 Crescendo hard fork raised block production from one to ten per second (10 BPS), effectively achieving real-time settlement — but up to that point it was a chain specialized in "value transfer." Toccata plants three new capabilities directly into the base layer atop that foundation: smart contracts, the KRC-20 native token, and ZK opcodes that verify proofs on L1 itself.</p>
  <p class="en">What stands out is the approach. Toccata introduces at once a script extension called covenants (KIP-17), covenant IDs for lineage tracking (KIP-20), ZK verification opcodes (KIP-16), and a partitioned sequencing commitment architecture (KIP-21). On top sits SilverScript, a dedicated compiler that lets developers write covenants. On the execution side, two L2s — Kasplex and Igra — provide full EVM compatibility and tout transaction costs more than 200 times cheaper than Ethereum mainnet. In short, Kaspa has chosen a dual strategy that opens two developer paths at once: "native covenants (L1)" and "EVM compatibility (L2)."</p>
  <p class="ja">カスパはこれまで「速い決済」だけで定義されるチェーンだった。ヘブライ大学・ハーバードから始まったブロックDAG研究を基盤に、複数のブロックが並列で共存しながらGHOSTDAG合意で順序づけする構造を使う。2025年5月のクレセンド(Crescendo)ハードフォークでブロック生成速度を毎秒1個から10個(10 BPS)へ引き上げ事実上のリアルタイム決済を実現したが、ここまでは「価値移転」に特化したチェーンだった。トッカータはこの土台の上に三つの能力をベースレイヤーへ直接埋め込んだ。スマートコントラクト、KRC-20ネイティブトークン、そしてL1で直接証明を検証するZKオペコードだ。</p>
  <p class="ja">注目すべきはアプローチだ。トッカータはカバナント(covenant)というスクリプト拡張(KIP-17)、系譜追跡用のカバナントID(KIP-20)、ZK検証オペコード(KIP-16)、分割シーケンシングコミット構造(KIP-21)を一挙に導入した。そこに開発者がカバナントを書ける専用コンパイラのシルバースクリプト(SilverScript)が乗る。実行環境の面では二つのL2 — カスプレックス(Kasplex)とイグラ(Igra) — が完全なEVM互換性を提供し、イーサリアム・メインネットより200倍以上安い取引コストを掲げる。すなわちカスパは「ネイティブ・カバナント(L1)」と「EVM互換(L2)」という二つの開発経路を同時に開く二元戦略を選んだ。</p>
  <p class="es">Kaspa se había definido hasta ahora únicamente por los "pagos rápidos". Construida sobre la investigación en blockDAG que comenzó en la Universidad Hebrea y en Harvard, usa una estructura en la que muchos bloques coexisten en paralelo pero se ordenan mediante el consenso GHOSTDAG. La bifurcación Crescendo de mayo de 2025 elevó la producción de bloques de uno a diez por segundo (10 BPS), logrando de hecho una liquidación en tiempo real — pero hasta ese punto era una cadena especializada en la "transferencia de valor". Toccata planta tres nuevas capacidades directamente en la capa base sobre esa base: contratos inteligentes, el token nativo KRC-20 y opcodes ZK que verifican pruebas en la propia L1.</p>
  <p class="es">Lo que destaca es el enfoque. Toccata introduce de una vez una extensión de script llamada covenants (KIP-17), IDs de covenant para el rastreo de linaje (KIP-20), opcodes de verificación ZK (KIP-16) y una arquitectura de compromiso de secuenciación particionada (KIP-21). Encima se sitúa SilverScript, un compilador dedicado que permite a los desarrolladores escribir covenants. En el lado de la ejecución, dos L2 — Kasplex e Igra — ofrecen compatibilidad total con EVM y presumen de costes de transacción más de 200 veces más baratos que la red principal de Ethereum. En resumen, Kaspa ha elegido una estrategia dual que abre dos caminos de desarrollo a la vez: "covenants nativos (L1)" y "compatibilidad EVM (L2)".</p>
  <p class="de">Kaspa war bisher rein durch „schnelle Zahlungen" definiert. Aufbauend auf BlockDAG-Forschung, die an der Hebräischen Universität und in Harvard begann, nutzt es eine Struktur, in der viele Blöcke parallel koexistieren, aber durch den GHOSTDAG-Konsens geordnet werden. Der Crescendo-Hardfork vom Mai 2025 erhöhte die Blockproduktion von einem auf zehn pro Sekunde (10 BPS) und erreichte damit faktisch Echtzeit-Abwicklung — bis dahin war es jedoch eine auf „Werttransfer" spezialisierte Chain. Toccata pflanzt drei neue Fähigkeiten direkt in die Basisschicht auf dieses Fundament: Smart Contracts, den nativen Token KRC-20 und ZK-Opcodes, die Beweise auf der L1 selbst verifizieren.</p>
  <p class="de">Bemerkenswert ist der Ansatz. Toccata führt auf einen Schlag eine Skripterweiterung namens Covenants (KIP-17), Covenant-IDs zur Abstammungsverfolgung (KIP-20), ZK-Verifikations-Opcodes (KIP-16) und eine partitionierte Sequenzierungs-Commitment-Architektur (KIP-21) ein. Darüber liegt SilverScript, ein dedizierter Compiler, mit dem Entwickler Covenants schreiben können. Auf der Ausführungsseite bieten zwei L2s — Kasplex und Igra — volle EVM-Kompatibilität und werben mit Transaktionskosten, die mehr als 200-mal günstiger sind als das Ethereum-Mainnet. Kurz gesagt hat Kaspa eine duale Strategie gewählt, die zwei Entwicklerpfade zugleich öffnet: „native Covenants (L1)" und „EVM-Kompatibilität (L2)".</p>

  <div class="ko">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">토카타 하드포크 — 결제 체인 위에 얹힌 3개 층</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">활성화 2026.06.30 · DAA 스코어 474,165,565</text>
    <g font-family="sans-serif">
      <rect x="28" y="78" width="644" height="60" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="103" fill="#e4e4e7" font-size="14" font-weight="700">기반: PoW 블록DAG · GHOSTDAG · 10 BPS (크레센도 2025)</text>
      <text x="44" y="125" fill="#a1a1aa" font-size="13">병렬 블록을 합의로 순서화 → 실시간 결제</text>
      <rect x="28" y="150" width="210" height="92" rx="9" fill="#14212e" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="133" y="176" fill="#7dd3fc" text-anchor="middle" font-size="14" font-weight="700">스마트 계약</text>
      <text x="133" y="200" fill="#cbd5e1" text-anchor="middle" font-size="13">커버넌트(KIP-17/20)</text>
      <text x="133" y="222" fill="#cbd5e1" text-anchor="middle" font-size="13">실버스크립트 컴파일러</text>
      <rect x="245" y="150" width="210" height="92" rx="9" fill="#1c1c2e" stroke="#a78bfa" stroke-width="1.5"/>
      <text x="350" y="176" fill="#c4b5fd" text-anchor="middle" font-size="14" font-weight="700">KRC-20 토큰</text>
      <text x="350" y="200" fill="#d8d4e8" text-anchor="middle" font-size="13">네이티브 자산 발행</text>
      <text x="350" y="222" fill="#d8d4e8" text-anchor="middle" font-size="13">L1 표준</text>
      <rect x="462" y="150" width="210" height="92" rx="9" fill="#0f2e2a" stroke="#14b8a6" stroke-width="1.5"/>
      <text x="567" y="176" fill="#5eead4" text-anchor="middle" font-size="14" font-weight="700">ZK 오프코드</text>
      <text x="567" y="200" fill="#99f6e4" text-anchor="middle" font-size="13">L1 증명 검증(KIP-16)</text>
      <text x="567" y="222" fill="#99f6e4" text-anchor="middle" font-size="13">확장·프라이버시 토대</text>
      <rect x="28" y="256" width="644" height="52" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="281" fill="#e4e4e7" font-size="14" font-weight="700">L2: 카스플렉스 · 이그라 — EVM 호환 (메인넷比 200배 저렴)</text>
      <text x="44" y="300" fill="#a1a1aa" font-size="13">네이티브 커버넌트(L1)와 EVM(L2) 이원 개발 경로</text>
      <rect x="28" y="322" width="644" height="52" rx="9" fill="#2a1616" stroke="#ef4444" stroke-width="1.4"/>
      <text x="44" y="347" fill="#fecaca" font-size="14" font-weight="700">시장 반응: 활성화 직후 +20.4% → 10시간 내 -7.8%</text>
      <text x="44" y="366" fill="#fca5a5" font-size="13">전형적 '뉴스에 팔자(sell-the-news)' 패턴</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">The Toccata hard fork — three layers atop a payments chain</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">Activated 2026.06.30 · DAA score 474,165,565</text>
    <g font-family="sans-serif">
      <rect x="28" y="78" width="644" height="60" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="103" fill="#e4e4e7" font-size="14" font-weight="700">Base: PoW blockDAG · GHOSTDAG · 10 BPS (Crescendo 2025)</text>
      <text x="44" y="125" fill="#a1a1aa" font-size="13">Parallel blocks ordered by consensus → real-time settlement</text>
      <rect x="28" y="150" width="210" height="92" rx="9" fill="#14212e" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="133" y="176" fill="#7dd3fc" text-anchor="middle" font-size="14" font-weight="700">Smart contracts</text>
      <text x="133" y="200" fill="#cbd5e1" text-anchor="middle" font-size="13">Covenants (KIP-17/20)</text>
      <text x="133" y="222" fill="#cbd5e1" text-anchor="middle" font-size="13">SilverScript compiler</text>
      <rect x="245" y="150" width="210" height="92" rx="9" fill="#1c1c2e" stroke="#a78bfa" stroke-width="1.5"/>
      <text x="350" y="176" fill="#c4b5fd" text-anchor="middle" font-size="14" font-weight="700">KRC-20 tokens</text>
      <text x="350" y="200" fill="#d8d4e8" text-anchor="middle" font-size="13">Native asset issuance</text>
      <text x="350" y="222" fill="#d8d4e8" text-anchor="middle" font-size="13">L1 standard</text>
      <rect x="462" y="150" width="210" height="92" rx="9" fill="#0f2e2a" stroke="#14b8a6" stroke-width="1.5"/>
      <text x="567" y="176" fill="#5eead4" text-anchor="middle" font-size="14" font-weight="700">ZK opcodes</text>
      <text x="567" y="200" fill="#99f6e4" text-anchor="middle" font-size="13">On-L1 proof verify (KIP-16)</text>
      <text x="567" y="222" fill="#99f6e4" text-anchor="middle" font-size="13">Base for scaling · privacy</text>
      <rect x="28" y="256" width="644" height="52" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="281" fill="#e4e4e7" font-size="14" font-weight="700">L2: Kasplex · Igra — EVM-compatible (200× cheaper than mainnet)</text>
      <text x="44" y="300" fill="#a1a1aa" font-size="13">Dual dev paths: native covenants (L1) and EVM (L2)</text>
      <rect x="28" y="322" width="644" height="52" rx="9" fill="#2a1616" stroke="#ef4444" stroke-width="1.4"/>
      <text x="44" y="347" fill="#fecaca" font-size="14" font-weight="700">Market: +20.4% on activation → -7.8% within 10 hours</text>
      <text x="44" y="366" fill="#fca5a5" font-size="13">A textbook "sell-the-news" pattern</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">トッカータ・ハードフォーク — 決済チェーンに乗る3層</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">活性化 2026.06.30 · DAAスコア 474,165,565</text>
    <g font-family="sans-serif">
      <rect x="28" y="78" width="644" height="60" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="103" fill="#e4e4e7" font-size="14" font-weight="700">基盤: PoWブロックDAG · GHOSTDAG · 10 BPS (クレセンド2025)</text>
      <text x="44" y="125" fill="#a1a1aa" font-size="13">並列ブロックを合意で順序化 → リアルタイム決済</text>
      <rect x="28" y="150" width="210" height="92" rx="9" fill="#14212e" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="133" y="176" fill="#7dd3fc" text-anchor="middle" font-size="14" font-weight="700">スマート契約</text>
      <text x="133" y="200" fill="#cbd5e1" text-anchor="middle" font-size="13">カバナント(KIP-17/20)</text>
      <text x="133" y="222" fill="#cbd5e1" text-anchor="middle" font-size="13">シルバースクリプト</text>
      <rect x="245" y="150" width="210" height="92" rx="9" fill="#1c1c2e" stroke="#a78bfa" stroke-width="1.5"/>
      <text x="350" y="176" fill="#c4b5fd" text-anchor="middle" font-size="14" font-weight="700">KRC-20トークン</text>
      <text x="350" y="200" fill="#d8d4e8" text-anchor="middle" font-size="13">ネイティブ資産発行</text>
      <text x="350" y="222" fill="#d8d4e8" text-anchor="middle" font-size="13">L1標準</text>
      <rect x="462" y="150" width="210" height="92" rx="9" fill="#0f2e2a" stroke="#14b8a6" stroke-width="1.5"/>
      <text x="567" y="176" fill="#5eead4" text-anchor="middle" font-size="14" font-weight="700">ZKオペコード</text>
      <text x="567" y="200" fill="#99f6e4" text-anchor="middle" font-size="13">L1で証明検証(KIP-16)</text>
      <text x="567" y="222" fill="#99f6e4" text-anchor="middle" font-size="13">拡張・プライバシー基盤</text>
      <rect x="28" y="256" width="644" height="52" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="281" fill="#e4e4e7" font-size="14" font-weight="700">L2: カスプレックス · イグラ — EVM互換(メインネット比200倍安)</text>
      <text x="44" y="300" fill="#a1a1aa" font-size="13">ネイティブ・カバナント(L1)とEVM(L2)の二元開発経路</text>
      <rect x="28" y="322" width="644" height="52" rx="9" fill="#2a1616" stroke="#ef4444" stroke-width="1.4"/>
      <text x="44" y="347" fill="#fecaca" font-size="14" font-weight="700">市場反応: 活性化直後 +20.4% → 10時間内 -7.8%</text>
      <text x="44" y="366" fill="#fca5a5" font-size="13">典型的な「ニュースで売る(sell-the-news)」パターン</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">La bifurcación Toccata — tres capas sobre una cadena de pagos</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">Activada 2026.06.30 · puntuación DAA 474.165.565</text>
    <g font-family="sans-serif">
      <rect x="28" y="78" width="644" height="60" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="103" fill="#e4e4e7" font-size="14" font-weight="700">Base: PoW blockDAG · GHOSTDAG · 10 BPS (Crescendo 2025)</text>
      <text x="44" y="125" fill="#a1a1aa" font-size="13">Bloques paralelos ordenados por consenso → liquidación en tiempo real</text>
      <rect x="28" y="150" width="210" height="92" rx="9" fill="#14212e" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="133" y="176" fill="#7dd3fc" text-anchor="middle" font-size="14" font-weight="700">Contratos int.</text>
      <text x="133" y="200" fill="#cbd5e1" text-anchor="middle" font-size="13">Covenants (KIP-17/20)</text>
      <text x="133" y="222" fill="#cbd5e1" text-anchor="middle" font-size="13">Compilador SilverScript</text>
      <rect x="245" y="150" width="210" height="92" rx="9" fill="#1c1c2e" stroke="#a78bfa" stroke-width="1.5"/>
      <text x="350" y="176" fill="#c4b5fd" text-anchor="middle" font-size="14" font-weight="700">Tokens KRC-20</text>
      <text x="350" y="200" fill="#d8d4e8" text-anchor="middle" font-size="13">Emisión de activos nativos</text>
      <text x="350" y="222" fill="#d8d4e8" text-anchor="middle" font-size="13">Estándar L1</text>
      <rect x="462" y="150" width="210" height="92" rx="9" fill="#0f2e2a" stroke="#14b8a6" stroke-width="1.5"/>
      <text x="567" y="176" fill="#5eead4" text-anchor="middle" font-size="14" font-weight="700">Opcodes ZK</text>
      <text x="567" y="200" fill="#99f6e4" text-anchor="middle" font-size="13">Verificar prueba en L1 (KIP-16)</text>
      <text x="567" y="222" fill="#99f6e4" text-anchor="middle" font-size="13">Base de escala · privacidad</text>
      <rect x="28" y="256" width="644" height="52" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="281" fill="#e4e4e7" font-size="14" font-weight="700">L2: Kasplex · Igra — compatibles con EVM (200× más baratas)</text>
      <text x="44" y="300" fill="#a1a1aa" font-size="13">Doble vía de desarrollo: covenants nativos (L1) y EVM (L2)</text>
      <rect x="28" y="322" width="644" height="52" rx="9" fill="#2a1616" stroke="#ef4444" stroke-width="1.4"/>
      <text x="44" y="347" fill="#fecaca" font-size="14" font-weight="700">Mercado: +20,4% al activarse → -7,8% en 10 horas</text>
      <text x="44" y="366" fill="#fca5a5" font-size="13">Un patrón de manual de "vender con la noticia"</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Der Toccata-Hardfork — drei Schichten auf einer Zahlungs-Chain</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">Aktiviert 2026.06.30 · DAA-Score 474.165.565</text>
    <g font-family="sans-serif">
      <rect x="28" y="78" width="644" height="60" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="103" fill="#e4e4e7" font-size="14" font-weight="700">Basis: PoW blockDAG · GHOSTDAG · 10 BPS (Crescendo 2025)</text>
      <text x="44" y="125" fill="#a1a1aa" font-size="13">Parallele Blöcke per Konsens geordnet → Echtzeit-Abwicklung</text>
      <rect x="28" y="150" width="210" height="92" rx="9" fill="#14212e" stroke="#38bdf8" stroke-width="1.5"/>
      <text x="133" y="176" fill="#7dd3fc" text-anchor="middle" font-size="14" font-weight="700">Smart Contracts</text>
      <text x="133" y="200" fill="#cbd5e1" text-anchor="middle" font-size="13">Covenants (KIP-17/20)</text>
      <text x="133" y="222" fill="#cbd5e1" text-anchor="middle" font-size="13">SilverScript-Compiler</text>
      <rect x="245" y="150" width="210" height="92" rx="9" fill="#1c1c2e" stroke="#a78bfa" stroke-width="1.5"/>
      <text x="350" y="176" fill="#c4b5fd" text-anchor="middle" font-size="14" font-weight="700">KRC-20-Token</text>
      <text x="350" y="200" fill="#d8d4e8" text-anchor="middle" font-size="13">Native Asset-Ausgabe</text>
      <text x="350" y="222" fill="#d8d4e8" text-anchor="middle" font-size="13">L1-Standard</text>
      <rect x="462" y="150" width="210" height="92" rx="9" fill="#0f2e2a" stroke="#14b8a6" stroke-width="1.5"/>
      <text x="567" y="176" fill="#5eead4" text-anchor="middle" font-size="14" font-weight="700">ZK-Opcodes</text>
      <text x="567" y="200" fill="#99f6e4" text-anchor="middle" font-size="13">Beweis auf L1 prüfen (KIP-16)</text>
      <text x="567" y="222" fill="#99f6e4" text-anchor="middle" font-size="13">Basis für Skalierung · Privatsphäre</text>
      <rect x="28" y="256" width="644" height="52" rx="9" fill="#161616" stroke="#3f3f46" stroke-width="1.3"/>
      <text x="44" y="281" fill="#e4e4e7" font-size="14" font-weight="700">L2: Kasplex · Igra — EVM-kompatibel (200× günstiger als Mainnet)</text>
      <text x="44" y="300" fill="#a1a1aa" font-size="13">Duale Entwicklerpfade: native Covenants (L1) und EVM (L2)</text>
      <rect x="28" y="322" width="644" height="52" rx="9" fill="#2a1616" stroke="#ef4444" stroke-width="1.4"/>
      <text x="44" y="347" fill="#fecaca" font-size="14" font-weight="700">Markt: +20,4% bei Aktivierung → -7,8% binnen 10 Stunden</text>
      <text x="44" y="366" fill="#fca5a5" font-size="13">Ein Lehrbuch-„Sell-the-News"-Muster</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">어떻게 작동하나 — '커버넌트'가 PoW 위에 스마트 계약을 여는 법</h2>
  <h2 class="en">How it works — how "covenants" open smart contracts on PoW</h2>
  <h2 class="ja">どう動くか — 「カバナント」がPoW上にスマート契約を開く仕組み</h2>
  <h2 class="es">Cómo funciona — cómo los "covenants" abren contratos inteligentes sobre PoW</h2>
  <h2 class="de">Wie es funktioniert — wie „Covenants" Smart Contracts auf PoW ermöglichen</h2>
  <p class="ko">카스파는 비트코인처럼 UTXO(미사용 거래 출력) 모델을 쓴다. 계정 잔고를 하나의 변수로 저장하는 이더리움과 달리, UTXO 체인은 '아직 쓰이지 않은 동전 조각'들의 집합으로 상태를 표현한다. 이 구조는 병렬 처리와 검증에 유리하지만, 복잡한 스마트 계약을 짜기는 어렵다는 게 오랜 통념이었다. 토카타의 핵심인 커버넌트는 이 한계를 정면으로 뚫는다. 커버넌트란 '이 동전은 앞으로 이런 조건으로만 쓸 수 있다'고 지출 방식 자체에 제약을 거는 재귀적 규칙이다. 지출 규칙을 코인에 각인하면, 별도의 계정 상태 없이도 금고(vault)·스마트 지갑·조건부 결제 같은 상태 기계를 UTXO 위에 구현할 수 있다.</p>
  <p class="ko">여기서 비교가 선명해진다. 비트코인 진영은 정확히 같은 기능을 두고 수년째 논쟁 중이다. OP_CAT, OP_CTV, 그리고 <a href="/blog/blockstream-op-checkshrincs-quantum-opcode.html">블록스트림의 OP_CHECKSHRINCS</a> 같은 커버넌트 계열 오프코드 제안들은 안전성·재귀성·MEV 우려로 아직 메인넷에 오르지 못했다. 서튼이 토카타를 'OP_CAT++'에 비유한 것은 이 맥락이다 — 비트코인이 신중하게 미뤄온 커버넌트를, 카스파는 더 넓은 표면적으로 먼저 출하했다. 여기에 ZK 검증 오프코드(KIP-16)를 더해, 체인 밖에서 계산한 증명을 L1에서 직접 검증할 수 있게 했다. 이는 <a href="/blog/lean-ethereum-quantum-stark-roadmap.html">이더리움의 STARK 기반 로드맵</a>이 지향하는 방향과 같은 계열의 확장·프라이버시 토대다. 다만 '먼저 출하했다'는 사실이 곧 '더 안전하다'를 의미하지는 않는다.</p>
  <p class="en">Kaspa, like Bitcoin, uses the UTXO (unspent transaction output) model. Unlike Ethereum, which stores an account balance as a single variable, a UTXO chain expresses state as a set of "not-yet-spent coin fragments." That structure is favorable for parallel processing and verification, but the long-standing conventional wisdom was that it makes complex smart contracts hard to write. Covenants, the heart of Toccata, breach that limit head-on. A covenant is a recursive rule that constrains the very way a coin may be spent — "this coin may only be spent under these conditions going forward." By imprinting spending rules onto coins, you can implement state machines such as vaults, smart wallets and conditional payments on top of UTXOs without a separate account state.</p>
  <p class="en">Here the comparison sharpens. The Bitcoin camp has been debating exactly this functionality for years. Covenant-family opcode proposals such as OP_CAT, OP_CTV and <a href="/blog/blockstream-op-checkshrincs-quantum-opcode.html">Blockstream's OP_CHECKSHRINCS</a> have yet to reach mainnet over concerns about safety, recursion and MEV. That is the context in which Sutton likened Toccata to "OP_CAT++": Kaspa shipped, with a broader surface, the covenants Bitcoin has cautiously deferred. Add ZK verification opcodes (KIP-16), and proofs computed off-chain can be verified directly on L1. This is the same family of scaling-and-privacy foundation that <a href="/blog/lean-ethereum-quantum-stark-roadmap.html">Ethereum's STARK-based roadmap</a> is aiming at. Still, "shipped first" does not by itself mean "safer."</p>
  <p class="ja">カスパはビットコインのようにUTXO(未使用取引出力)モデルを使う。口座残高を一つの変数として保存するイーサリアムと異なり、UTXOチェーンは「まだ使われていないコインの断片」の集合で状態を表す。この構造は並列処理と検証に有利だが、複雑なスマートコントラクトを書くのは難しいというのが長年の通念だった。トッカータの核心であるカバナントはこの限界を正面から突破する。カバナントとは「このコインは今後こうした条件でのみ使える」と支出方法自体に制約をかける再帰的ルールだ。支出ルールをコインに刻めば、別途の口座状態なしに金庫(vault)・スマートウォレット・条件付き決済のような状態機械をUTXO上に実装できる。</p>
  <p class="ja">ここで比較が鮮明になる。ビットコイン陣営はまさに同じ機能をめぐり数年来論争中だ。OP_CAT、OP_CTV、そして<a href="/blog/blockstream-op-checkshrincs-quantum-opcode.html">ブロックストリームのOP_CHECKSHRINCS</a>のようなカバナント系オペコード提案は、安全性・再帰性・MEVの懸念でまだメインネットに載っていない。サットン氏がトッカータを「OP_CAT++」に例えたのはこの文脈だ — ビットコインが慎重に先送りしてきたカバナントを、カスパはより広い表面積で先に出荷した。そこにZK検証オペコード(KIP-16)を加え、チェーン外で計算した証明をL1で直接検証できるようにした。これは<a href="/blog/lean-ethereum-quantum-stark-roadmap.html">イーサリアムのSTARKベースのロードマップ</a>が目指す方向と同系列の拡張・プライバシー基盤だ。ただし「先に出荷した」という事実が即「より安全」を意味するわけではない。</p>
  <p class="es">Kaspa, como Bitcoin, usa el modelo UTXO (salida de transacción no gastada). A diferencia de Ethereum, que almacena un saldo de cuenta como una sola variable, una cadena UTXO expresa el estado como un conjunto de "fragmentos de moneda aún no gastados". Esa estructura es favorable para el procesamiento y la verificación en paralelo, pero la sabiduría convencional de siempre era que dificulta escribir contratos inteligentes complejos. Los covenants, el corazón de Toccata, rompen ese límite de frente. Un covenant es una regla recursiva que restringe la forma misma en que puede gastarse una moneda — "esta moneda solo podrá gastarse bajo estas condiciones en adelante". Al imprimir reglas de gasto en las monedas, se pueden implementar máquinas de estado como bóvedas, monederos inteligentes y pagos condicionales sobre UTXO sin un estado de cuenta separado.</p>
  <p class="es">Aquí la comparación se agudiza. El bando de Bitcoin lleva años debatiendo exactamente esta funcionalidad. Propuestas de opcodes de la familia covenant como OP_CAT, OP_CTV y <a href="/blog/blockstream-op-checkshrincs-quantum-opcode.html">OP_CHECKSHRINCS de Blockstream</a> aún no han llegado a la red principal por preocupaciones sobre seguridad, recursividad y MEV. Ese es el contexto en el que Sutton comparó Toccata con "OP_CAT++": Kaspa entregó, con una superficie más amplia, los covenants que Bitcoin ha aplazado con cautela. Añade los opcodes de verificación ZK (KIP-16) y las pruebas calculadas fuera de cadena pueden verificarse directamente en L1. Es la misma familia de base de escala y privacidad a la que apunta la <a href="/blog/lean-ethereum-quantum-stark-roadmap.html">hoja de ruta de Ethereum basada en STARK</a>. Aun así, "entregar primero" no significa por sí mismo "más seguro".</p>
  <p class="de">Kaspa nutzt wie Bitcoin das UTXO-Modell (unspent transaction output). Anders als Ethereum, das einen Kontostand als einzelne Variable speichert, drückt eine UTXO-Chain den Zustand als Menge „noch nicht ausgegebener Münzfragmente" aus. Diese Struktur ist günstig für parallele Verarbeitung und Verifikation, doch die langjährige gängige Meinung war, dass sie das Schreiben komplexer Smart Contracts erschwert. Covenants, das Herz von Toccata, durchbrechen diese Grenze frontal. Ein Covenant ist eine rekursive Regel, die die Art und Weise beschränkt, wie eine Münze ausgegeben werden darf — „diese Münze darf künftig nur unter diesen Bedingungen ausgegeben werden". Prägt man Ausgaberegeln in Münzen ein, lassen sich Zustandsmaschinen wie Vaults, Smart Wallets und bedingte Zahlungen auf UTXOs ohne separaten Kontozustand umsetzen.</p>
  <p class="de">Hier schärft sich der Vergleich. Das Bitcoin-Lager debattiert genau diese Funktionalität seit Jahren. Covenant-Opcode-Vorschläge wie OP_CAT, OP_CTV und <a href="/blog/blockstream-op-checkshrincs-quantum-opcode.html">Blockstreams OP_CHECKSHRINCS</a> haben es wegen Bedenken um Sicherheit, Rekursion und MEV noch nicht ins Mainnet geschafft. In diesem Kontext verglich Sutton Toccata mit „OP_CAT++": Kaspa lieferte mit breiterer Oberfläche die Covenants aus, die Bitcoin vorsichtig aufgeschoben hat. Ergänzt um ZK-Verifikations-Opcodes (KIP-16) können off-chain berechnete Beweise direkt auf der L1 verifiziert werden. Das ist dieselbe Familie von Skalierungs- und Privatsphäre-Grundlage, auf die <a href="/blog/lean-ethereum-quantum-stark-roadmap.html">Ethereums STARK-basierte Roadmap</a> abzielt. Dennoch bedeutet „zuerst geliefert" für sich genommen nicht „sicherer".</p>

  <h2 class="ko">시장은 왜 '뉴스에 팔았나' — 반론과 리스크</h2>
  <h2 class="en">Why the market "sold the news" — counterpoints and risks</h2>
  <h2 class="ja">なぜ市場は「ニュースで売った」か — 反論とリスク</h2>
  <h2 class="es">Por qué el mercado "vendió con la noticia" — contrapuntos y riesgos</h2>
  <h2 class="de">Warum der Markt „die Nachricht verkaufte" — Gegenpunkte und Risiken</h2>
  <p class="ko">기술적 성취에도 시장 반응은 냉정했다. KAS 가격은 활성화 직후 20.4% 급등해 0.032달러를 찍었지만, 10시간 만에 7.8% 되밀렸다. 전형적인 '뉴스에 팔자(sell-the-news)' 패턴이다. 이 메커니즘은 단순하다 — 하드포크 일정은 몇 달 전부터 공지되므로, 기대는 이미 가격에 선반영된다. 실제 이벤트가 도래하는 순간, 선취매했던 참가자들이 차익을 실현하면서 오히려 매도 압력이 나온다. 카스파는 연초 대비 큰 폭의 하락 국면에 있었던 터라, 업그레이드가 추세를 되돌릴 만한 신규 수요를 즉각 만들어내지는 못했다.</p>
  <p class="ko">더 근본적인 반론은 '기능이 곧 생태계는 아니다'라는 점이다. 스마트 계약을 켜는 것과 개발자·유동성·킬러 앱이 실제로 옮겨오는 것은 전혀 다른 문제다. 이더리움은 스마트 계약을 켠 뒤에도 생태계가 형성되기까지 수년이 걸렸고, PoW 위에서 복잡한 상태를 다루는 일은 상태 팽창(state bloat)과 검증 비용이라는 부담을 동반한다. 이더리움이 PoS로 전환한 배경에도 이런 실행 부하 문제가 있었다. 게다가 카스파는 네이티브 커버넌트(L1)와 EVM 호환(L2, 카스플렉스·이그라)이라는 두 경로를 동시에 밀고 있어, 개발자 역량이 어느 쪽으로도 충분히 응집되지 못하고 분산될 위험도 있다. 반대로, 이 이원 구조가 '검증된 EVM 도구'와 '새로운 커버넌트 실험'을 병행하게 해 오히려 진입 문턱을 낮춘다는 낙관론도 성립한다. 어느 쪽이 맞을지는 온체인 활동이 답한다.</p>
  <p class="en">Despite the technical achievement, the market's reaction was cool. KAS spiked 20.4% on activation to $0.032, then gave back 7.8% within ten hours — a textbook "sell-the-news" pattern. The mechanism is simple: hard-fork schedules are announced months in advance, so expectations are already priced in. The moment the actual event arrives, participants who bought ahead take profits, producing selling pressure instead. Kaspa had been in a steep drawdown from earlier in the year, so the upgrade did not immediately generate the fresh demand needed to reverse the trend.</p>
  <p class="en">The more fundamental counterpoint is that "capability is not ecosystem." Turning on smart contracts and actually attracting developers, liquidity and killer apps are entirely different problems. Even Ethereum took years to form an ecosystem after enabling smart contracts, and handling complex state on PoW carries the burden of state bloat and verification cost. Such execution load was part of the backdrop to Ethereum's move to PoS. Moreover, Kaspa is pushing two paths at once — native covenants (L1) and EVM compatibility (L2, Kasplex and Igra) — risking that developer capacity is dispersed rather than concentrated on either. Conversely, an optimist can argue this dual structure lowers the barrier to entry by letting "proven EVM tooling" and "new covenant experiments" proceed in parallel. Which is right will be answered by on-chain activity.</p>
  <p class="ja">技術的成果にもかかわらず市場の反応は冷静だった。KAS価格は活性化直後に20.4%急騰し0.032ドルを付けたが、10時間で7.8%押し戻された。典型的な「ニュースで売る(sell-the-news)」パターンだ。この仕組みは単純だ — ハードフォークの日程は数か月前から告知されるため、期待はすでに価格に織り込まれる。実際のイベントが到来する瞬間、先回り買いした参加者が利益を確定し、むしろ売り圧力が出る。カスパは年初来の大幅な下落局面にあったため、アップグレードがトレンドを反転させるほどの新規需要を即座には生み出せなかった。</p>
  <p class="ja">より根本的な反論は「機能は即エコシステムではない」という点だ。スマートコントラクトを有効にすることと、開発者・流動性・キラーアプリが実際に移ってくることはまったく別の問題だ。イーサリアムもスマートコントラクトを有効化した後、エコシステムが形成されるまで数年かかり、PoW上で複雑な状態を扱うことは状態肥大(state bloat)と検証コストという負担を伴う。イーサリアムがPoSへ移行した背景にもこうした実行負荷の問題があった。さらにカスパはネイティブ・カバナント(L1)とEVM互換(L2、カスプレックス・イグラ)の二経路を同時に推しており、開発者の力がどちらにも十分に凝集せず分散するリスクもある。逆に、この二元構造が「検証済みのEVMツール」と「新しいカバナント実験」を並行させ、むしろ参入障壁を下げるという楽観論も成り立つ。どちらが正しいかはオンチェーン活動が答える。</p>
  <p class="es">A pesar del logro técnico, la reacción del mercado fue fría. KAS subió un 20,4% al activarse hasta 0,032 dólares, y luego devolvió un 7,8% en diez horas — un patrón de manual de "vender con la noticia". El mecanismo es simple: los calendarios de las bifurcaciones se anuncian con meses de antelación, así que las expectativas ya están descontadas. En el momento en que llega el evento real, los participantes que compraron por adelantado toman ganancias, generando en cambio presión vendedora. Kaspa venía de una fuerte caída desde comienzos de año, por lo que la actualización no generó de inmediato la demanda nueva necesaria para revertir la tendencia.</p>
  <p class="es">El contrapunto más fundamental es que "capacidad no es ecosistema". Encender los contratos inteligentes y atraer realmente a desarrolladores, liquidez y aplicaciones estrella son problemas completamente distintos. Incluso Ethereum tardó años en formar un ecosistema tras habilitar los contratos inteligentes, y manejar estado complejo sobre PoW acarrea la carga de la hinchazón de estado (state bloat) y el coste de verificación. Esa carga de ejecución fue parte del trasfondo del paso de Ethereum a PoS. Además, Kaspa impulsa dos vías a la vez — covenants nativos (L1) y compatibilidad EVM (L2, Kasplex e Igra) — con el riesgo de que la capacidad de los desarrolladores se disperse en lugar de concentrarse en una. A la inversa, un optimista puede argumentar que esta estructura dual reduce la barrera de entrada al dejar avanzar en paralelo "herramientas EVM probadas" y "nuevos experimentos con covenants". Cuál es correcta lo responderá la actividad on-chain.</p>
  <p class="de">Trotz der technischen Leistung fiel die Marktreaktion kühl aus. KAS sprang bei der Aktivierung um 20,4 % auf 0,032 Dollar, gab dann binnen zehn Stunden 7,8 % ab — ein Lehrbuch-„Sell-the-News"-Muster. Der Mechanismus ist einfach: Hardfork-Termine werden Monate im Voraus angekündigt, sodass Erwartungen bereits eingepreist sind. Im Moment des tatsächlichen Ereignisses realisieren vorab eingestiegene Teilnehmer Gewinne und erzeugen stattdessen Verkaufsdruck. Kaspa befand sich in einem steilen Abschwung seit Jahresbeginn, sodass das Upgrade nicht sofort die frische Nachfrage erzeugte, die zur Trendwende nötig gewesen wäre.</p>
  <p class="de">Der grundlegendere Einwand lautet: „Fähigkeit ist kein Ökosystem." Smart Contracts einzuschalten und tatsächlich Entwickler, Liquidität und Killer-Apps anzuziehen, sind völlig verschiedene Probleme. Selbst Ethereum brauchte Jahre, um nach der Aktivierung von Smart Contracts ein Ökosystem zu bilden, und komplexen Zustand auf PoW zu handhaben bringt die Last von State Bloat und Verifikationskosten mit sich. Solche Ausführungslast war Teil des Hintergrunds für Ethereums Wechsel zu PoS. Zudem treibt Kaspa zwei Pfade zugleich voran — native Covenants (L1) und EVM-Kompatibilität (L2, Kasplex und Igra) — mit dem Risiko, dass Entwicklerkapazität zerstreut statt auf einem konzentriert wird. Umgekehrt kann ein Optimist argumentieren, diese duale Struktur senke die Einstiegshürde, indem „bewährtes EVM-Tooling" und „neue Covenant-Experimente" parallel laufen. Was zutrifft, wird die On-Chain-Aktivität beantworten.</p>

  <h2 class="ko">지켜봐야 할 것</h2>
  <h2 class="en">What to watch</h2>
  <h2 class="ja">注視すべき点</h2>
  <h2 class="es">Qué vigilar</h2>
  <h2 class="de">Worauf zu achten ist</h2>
  <p class="ko">첫째, 실사용 지표다. KRC-20 발행 건수, 커버넌트 기반 컨트랙트 배포 수, 카스플렉스·이그라 L2의 활성 지갑과 총예치금(TVL)이 활성화 이후 몇 주간 어떻게 움직이는지가 첫 시험대다. 하드포크는 '가능성'을 열었을 뿐, 그 가능성이 실제 트래픽으로 전환되는지는 별개다. 상태 팽창과 검증 비용이 10 BPS의 고처리량과 충돌하지 않고 관리되는지도 함께 봐야 한다.</p>
  <p class="ko">둘째, 보안 검증의 시간이다. 커버넌트와 새 ZK 오프코드는 비트코인이 신중을 기하며 미뤄온 강력한 원시 기능이다. 강력함은 곧 넓은 공격 표면을 뜻한다. 재귀적 지출 규칙에서 의도치 않은 무한 루프나 자금 동결, ZK 검증 로직의 구현 결함 같은 위험이 실전에서 드러나기까지는 시간이 걸린다. '먼저 출하했다'는 것이 이 검증 과정을 건너뛰게 해주지는 않는다. 카스파의 토카타는 PoW 체인도 커버넌트로 프로그래머블해질 수 있음을 입증한 첫 대규모 사례이며, 그 실험의 성패는 앞으로 몇 분기의 온체인 데이터가 판정할 것이다.</p>
  <p class="en">First, real-usage metrics. How KRC-20 issuances, the number of covenant-based contract deployments, and the active wallets and total value locked (TVL) on the Kasplex and Igra L2s move over the weeks after activation is the first test. The hard fork only opened "possibility"; whether that possibility converts into real traffic is a separate matter. Watch too whether state bloat and verification cost are managed without colliding with the high throughput of 10 BPS.</p>
  <p class="en">Second, the time it takes to vet security. Covenants and the new ZK opcodes are powerful primitives that Bitcoin has deferred out of caution. Power means a wide attack surface. Risks such as unintended infinite loops or frozen funds in recursive spending rules, or implementation flaws in ZK verification logic, take time to surface in the wild. "Shipped first" does not let one skip that vetting. Kaspa's Toccata is the first large-scale proof that a PoW chain, too, can become programmable via covenants — and whether the experiment succeeds will be judged by on-chain data over the coming quarters.</p>
  <p class="ja">第一に、実使用の指標だ。KRC-20の発行件数、カバナントベースのコントラクト展開数、カスプレックス・イグラのL2の活性ウォレットと総預入額(TVL)が活性化後の数週間でどう動くかが最初の試金石だ。ハードフォークは「可能性」を開いただけで、その可能性が実際のトラフィックに転換するかは別問題だ。状態肥大と検証コストが10 BPSの高処理量と衝突せず管理されるかも併せて見る必要がある。</p>
  <p class="ja">第二に、セキュリティ検証の時間だ。カバナントと新しいZKオペコードは、ビットコインが慎重を期して先送りしてきた強力なプリミティブだ。強力さは即ち広い攻撃表面を意味する。再帰的な支出ルールでの意図しない無限ループや資金凍結、ZK検証ロジックの実装欠陥のようなリスクが実戦で露呈するまでには時間がかかる。「先に出荷した」ことがこの検証過程を飛ばしてくれるわけではない。カスパのトッカータはPoWチェーンもカバナントでプログラマブルになりうることを実証した初の大規模事例であり、その実験の成否は今後数四半期のオンチェーンデータが判定するだろう。</p>
  <p class="es">Primero, las métricas de uso real. Cómo se mueven las emisiones de KRC-20, el número de despliegues de contratos basados en covenants, y las carteras activas y el valor total bloqueado (TVL) en las L2 Kasplex e Igra durante las semanas posteriores a la activación es la primera prueba. La bifurcación solo abrió la "posibilidad"; que esa posibilidad se convierta en tráfico real es otra cuestión. Vigila también si la hinchazón de estado y el coste de verificación se gestionan sin chocar con el alto rendimiento de 10 BPS.</p>
  <p class="es">Segundo, el tiempo que lleva examinar la seguridad. Los covenants y los nuevos opcodes ZK son primitivas potentes que Bitcoin ha aplazado por prudencia. La potencia significa una amplia superficie de ataque. Riesgos como bucles infinitos no intencionados o fondos congelados en reglas de gasto recursivas, o fallos de implementación en la lógica de verificación ZK, tardan en aflorar en el mundo real. "Entregar primero" no permite saltarse ese examen. La Toccata de Kaspa es la primera prueba a gran escala de que una cadena PoW también puede volverse programable mediante covenants — y si el experimento tiene éxito lo juzgarán los datos on-chain de los próximos trimestres.</p>
  <p class="de">Erstens die Kennzahlen zur realen Nutzung. Wie sich KRC-20-Ausgaben, die Zahl covenant-basierter Vertragsbereitstellungen sowie aktive Wallets und Total Value Locked (TVL) auf den L2s Kasplex und Igra in den Wochen nach der Aktivierung bewegen, ist der erste Test. Der Hardfork öffnete nur „Möglichkeit"; ob diese Möglichkeit sich in echten Traffic verwandelt, ist eine andere Frage. Zu beobachten ist auch, ob State Bloat und Verifikationskosten gehandhabt werden, ohne mit dem hohen Durchsatz von 10 BPS zu kollidieren.</p>
  <p class="de">Zweitens die Zeit, die die Sicherheitsprüfung braucht. Covenants und die neuen ZK-Opcodes sind mächtige Primitive, die Bitcoin aus Vorsicht aufgeschoben hat. Macht bedeutet eine große Angriffsfläche. Risiken wie unbeabsichtigte Endlosschleifen oder eingefrorene Gelder in rekursiven Ausgaberegeln oder Implementierungsfehler in der ZK-Verifikationslogik brauchen Zeit, um in der Praxis zutage zu treten. „Zuerst geliefert" erlaubt es nicht, diese Prüfung zu überspringen. Kaspas Toccata ist der erste groß angelegte Beweis, dass auch eine PoW-Chain über Covenants programmierbar werden kann — und ob das Experiment gelingt, werden die On-Chain-Daten der kommenden Quartale beurteilen.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 카스파 토카타는 PoW·UTXO 체인이 커버넌트로 스마트 계약·KRC-20·ZK 검증을 베이스 레이어에 담은 첫 대규모 사례다. 비트코인이 수년째 논쟁만 하는 커버넌트를 먼저 출하했다는 점이 상징적이나, 기능이 곧 생태계는 아니다. 가격의 'sell-the-news' 반응(+20.4%→-7.8%)이 보여주듯, 진짜 시험대는 KRC-20·L2 TVL 같은 실사용 지표와 커버넌트의 보안 검증이다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> Kaspa's Toccata is the first large-scale case of a PoW/UTXO chain placing smart contracts, KRC-20 and ZK verification into the base layer via covenants. Shipping the covenants Bitcoin has argued over for years is symbolic, but capability is not ecosystem. As the price's "sell-the-news" reaction (+20.4% → -7.8%) shows, the real test is real-usage metrics like KRC-20 and L2 TVL, plus the security vetting of covenants.</div>
  <div class="box ja">💡 <strong>示唆:</strong> カスパのトッカータは、PoW・UTXOチェーンがカバナントでスマートコントラクト・KRC-20・ZK検証をベースレイヤーに収めた初の大規模事例だ。ビットコインが数年来論争するばかりのカバナントを先に出荷した点は象徴的だが、機能は即エコシステムではない。価格の「sell-the-news」反応(+20.4%→-7.8%)が示すように、真の試金石はKRC-20・L2のTVLといった実使用指標とカバナントのセキュリティ検証だ。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> La Toccata de Kaspa es el primer caso a gran escala de una cadena PoW/UTXO que coloca contratos inteligentes, KRC-20 y verificación ZK en la capa base mediante covenants. Entregar los covenants que Bitcoin lleva años debatiendo es simbólico, pero capacidad no es ecosistema. Como muestra la reacción de "vender con la noticia" (+20,4% → -7,8%), la verdadera prueba son las métricas de uso real como KRC-20 y el TVL de las L2, más el examen de seguridad de los covenants.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Kaspas Toccata ist der erste groß angelegte Fall, in dem eine PoW/UTXO-Chain Smart Contracts, KRC-20 und ZK-Verifikation über Covenants in die Basisschicht bringt. Die Covenants auszuliefern, über die Bitcoin seit Jahren streitet, ist symbolisch, doch Fähigkeit ist kein Ökosystem. Wie die „Sell-the-News"-Reaktion des Kurses (+20,4 % → -7,8 %) zeigt, ist der eigentliche Test die reale Nutzung wie KRC-20 und L2-TVL sowie die Sicherheitsprüfung der Covenants.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: CoinAlertNews, Gate 리서치, ainvest, KuCoin, kaspa.org(크레센도·10BPS·기여자), 마이클 서튼(Kaspa 코어). DAA 스코어·KIP 번호·L2 비용 비교는 카스파 문서 및 보도 기준. 가격 수치(+20.4%/-7.8%, 0.032달러)는 활성화 당시 시장 데이터. 본 글은 투자 자문이 아니다.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: CoinAlertNews, Gate research, ainvest, KuCoin, kaspa.org (Crescendo, 10BPS, contributors), Michael Sutton (Kaspa core). DAA score, KIP numbers and L2 cost comparison per Kaspa documentation and reporting. Price figures (+20.4%/-7.8%, $0.032) reflect market data at activation. This article is not investment advice.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: CoinAlertNews、Gateリサーチ、ainvest、KuCoin、kaspa.org(クレセンド・10BPS・貢献者)、マイケル・サットン(Kaspaコア)。DAAスコア・KIP番号・L2コスト比較はカスパ文書および報道に基づく。価格数値(+20.4%/-7.8%、0.032ドル)は活性化当時の市場データ。本記事は投資助言ではない。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: CoinAlertNews, investigación de Gate, ainvest, KuCoin, kaspa.org (Crescendo, 10BPS, colaboradores), Michael Sutton (núcleo de Kaspa). Puntuación DAA, números KIP y comparación de costes L2 según la documentación de Kaspa y la prensa. Las cifras de precio (+20,4%/-7,8%, 0,032 USD) reflejan datos de mercado en la activación. Este artículo no es asesoramiento de inversión.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: CoinAlertNews, Gate-Research, ainvest, KuCoin, kaspa.org (Crescendo, 10BPS, Mitwirkende), Michael Sutton (Kaspa-Core). DAA-Score, KIP-Nummern und L2-Kostenvergleich gemäß Kaspa-Dokumentation und Berichterstattung. Kurszahlen (+20,4 %/-7,8 %, 0,032 USD) spiegeln Marktdaten bei der Aktivierung wider. Dieser Artikel ist keine Anlageberatung.</p>
<?php require __DIR__.'/_footer.php'; ?>
