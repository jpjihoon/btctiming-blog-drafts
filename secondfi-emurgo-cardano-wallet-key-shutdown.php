<?php $slug = 'secondfi-emurgo-cardano-wallet-key-shutdown'; require __DIR__.'/_header.php'; ?>

  <p class="ko">카르다노(Cardano) 생태계의 지갑 서비스 세컨드파이(SecondFi)를 운영하는 엠어고(EMURGO)가 6월 하순 지갑 탈취 사고를 겪은 뒤 서비스를 영구 종료하기로 했다고 크립토타임스(CryptoTimes)가 7월 6일 보도했다. 엠어고는 감사가 끝나더라도 세컨드파이의 정상 운영을 재개하지 않으며, 앞으로는 복구팀 역할만 맡는다고 밝혔다. 도난 자산 반환 시점은 아직 확정되지 않았다. 이번 사고는 6월 21~23일 나흘간 네 차례의 지갑 탈취로 발생했으며, 이 중 세 건은 외부 공격자, 한 건은 세컨드파이 팀이 약 1억 2,900만 ADA를 제3자 수탁처로 긴급 이전한 예방 조치였다고 코인데스크(CoinDesk)와 크립토브리핑(Cryptobriefing)이 전했다. 세컨드파이의 온체인 예비 분석 기준 확인된 손실은 약 1,600만 ADA, 사고 당시 가치로 약 240만 달러다.</p>
  <p class="en">EMURGO, which operates the Cardano wallet service SecondFi, has decided to shut it down for good after a late-June wallet-draining incident, CryptoTimes reported on July 6. EMURGO said SecondFi will not resume normal operations even after audits are complete and that its role from here is limited to a recovery team, with no firm date yet for returning stolen assets. The incident stemmed from four wallet-draining events over four days on June 21–23; three were external attackers and one was a precautionary move by the SecondFi team that shifted roughly 129 million ADA to a third-party custodian, CoinDesk and Cryptobriefing reported. On SecondFi's preliminary on-chain analysis, confirmed losses were about 16 million ADA — roughly $2.4 million at the time of the incident.</p>
  <p class="ja">カルダノ(Cardano)エコシステムのウォレットサービス、セカンドファイ(SecondFi)を運営するエムアーゴ(EMURGO)が、6月下旬のウォレット奪取事故を受けてサービスを永久終了することを決めたと、クリプトタイムズ(CryptoTimes)が7月6日に報じた。エムアーゴは監査が終わってもセカンドファイの通常運営を再開せず、今後は復旧チームの役割のみを担うと明らかにした。盗難資産の返還時期はまだ確定していない。今回の事故は6月21〜23日の4日間に4回のウォレット奪取で発生し、うち3件は外部の攻撃者、1件はセカンドファイのチームが約1億2,900万ADAを第三者カストディアンへ緊急移転した予防措置だったと、コインデスク(CoinDesk)とクリプトブリーフィング(Cryptobriefing)が伝えた。セカンドファイのオンチェーン予備分析による確認済み損失は約1,600万ADA、事故当時の価値で約240万ドルだ。</p>
  <p class="es">EMURGO, que opera el servicio de billeteras de Cardano SecondFi, ha decidido cerrarlo definitivamente tras un incidente de vaciado de billeteras a finales de junio, informó CryptoTimes el 6 de julio. EMURGO dijo que SecondFi no reanudará operaciones normales ni siquiera tras completar las auditorías y que su papel a partir de ahora se limita a un equipo de recuperación, sin fecha firme aún para devolver los activos robados. El incidente surgió de cuatro eventos de vaciado en cuatro días, el 21–23 de junio; tres fueron atacantes externos y uno fue una medida preventiva del equipo de SecondFi que trasladó unos 129 millones de ADA a un custodio externo, informaron CoinDesk y Cryptobriefing. Según el análisis on-chain preliminar de SecondFi, las pérdidas confirmadas fueron de unos 16 millones de ADA, alrededor de 2,4 millones de dólares al momento del incidente.</p>
  <p class="de">EMURGO, Betreiber des Cardano-Wallet-Dienstes SecondFi, hat beschlossen, ihn nach einem Wallet-Leerungsvorfall Ende Juni endgültig einzustellen, berichtete CryptoTimes am 6. Juli. EMURGO erklärte, SecondFi werde selbst nach Abschluss der Audits den Normalbetrieb nicht wieder aufnehmen und seine Rolle beschränke sich künftig auf ein Wiederherstellungsteam, mit noch keinem festen Datum für die Rückgabe gestohlener Vermögenswerte. Der Vorfall ging auf vier Wallet-Leerungsereignisse an vier Tagen vom 21.–23. Juni zurück; drei waren externe Angreifer, eines eine Vorsichtsmaßnahme des SecondFi-Teams, das rund 129 Millionen ADA zu einem Drittverwahrer verschob, berichteten CoinDesk und Cryptobriefing. Nach SecondFis vorläufiger On-Chain-Analyse betrugen die bestätigten Verluste etwa 16 Millionen ADA — rund 2,4 Millionen Dollar zum Zeitpunkt des Vorfalls.</p>

  <h2 class="ko">무엇이 뚫렸나 — 예측 가능한 열쇠</h2>
  <h2 class="en">What was breached — predictable keys</h2>
  <h2 class="ja">何が破られたか — 予測可能な鍵</h2>
  <h2 class="es">Qué se vulneró — claves predecibles</h2>
  <h2 class="de">Was durchbrochen wurde — vorhersehbare Schlüssel</h2>
  <p class="ko">이번 사고의 근본 원인은 스마트컨트랙트 취약점이나 서버 침해가 아니라 지갑 그 자체에 있었다. 세컨드파이의 웹 지갑 생성 소프트웨어 — 새 지갑과 그에 딸린 개인키를 만드는 부분 — 가 예측 가능한 난수로 개인키를 생성했다는 것이다. 암호학적으로 안전한 지갑은 사실상 추측이 불가능한 무작위성(엔트로피)에서 개인키를 뽑아낸다. 그러나 난수 생성이 약하면, 공격자는 공개된 온체인 데이터만으로 개인키를 역산해낼 수 있다. 즉 이 생성기로 만들어진 모든 지갑이 원리적으로 위험에 노출됐다는 뜻이다.</p>
  <p class="ko">이 유형의 결함은 크립토 역사에서 반복돼 왔다. 열쇠를 만드는 '주사위'가 충분히 무작위적이지 않으면, 자금은 어느 서버가 뚫려서가 아니라 열쇠 자체가 예측 가능해서 사라진다. 앞서 다룬 <a href="/blog/ill-bloom-wallet-seed-vulnerability.html">일블룸 지갑 시드 취약점</a> 사례와 구조가 닮았다 — 둘 다 '지갑이 어떻게 열쇠를 만드느냐'가 실패 지점이었다. 반론의 여지는 크지 않다. 스마트컨트랙트 버그는 감사로 상당 부분 잡히지만, 난수 생성의 결함은 코드가 정상적으로 '작동'하는 것처럼 보이기 때문에 겉으로 드러나지 않는다. 세컨드파이 팀이 스스로 1억 2,900만 ADA를 긴급 이전한 것도, 결함이 특정 지갑이 아니라 생성기 전체에 걸쳐 있어 노출 범위를 좁힐 수 없었기 때문으로 풀이된다.</p>
  <p class="en">The root cause was not a smart-contract flaw or a server breach but the wallet itself. SecondFi's web wallet-generation software — the part that creates new wallets and their private keys — produced private keys with predictable randomness. A cryptographically sound wallet derives private keys from entropy that is effectively impossible to guess. When the randomness is weak, an attacker can back out the private key from public on-chain data alone. In effect, every wallet created by that generator was, in principle, exposed.</p>
  <p class="en">This class of flaw has recurred throughout crypto history. When the "dice" that make the keys are not random enough, funds vanish not because some server was breached but because the keys themselves are predictable. It structurally echoes the <a href="/blog/ill-bloom-wallet-seed-vulnerability.html">Ill Bloom wallet seed vulnerability</a> covered earlier — in both, "how the wallet makes the key" was the point of failure. There is little room for rebuttal here: smart-contract bugs are often caught in audits, but a randomness flaw hides because the code appears to "work" normally. SecondFi's own emergency move of 129 million ADA is best read as an admission that the flaw spanned the entire generator rather than specific wallets, leaving no way to narrow the blast radius.</p>
  <p class="ja">今回の事故の根本原因は、スマートコントラクトの脆弱性やサーバー侵害ではなく、ウォレットそのものにあった。セカンドファイのウェブウォレット生成ソフトウェア — 新しいウォレットとそれに付随する秘密鍵を作る部分 — が、予測可能な乱数で秘密鍵を生成したという。暗号学的に安全なウォレットは、事実上推測不可能な無作為性(エントロピー)から秘密鍵を引き出す。しかし乱数生成が弱いと、攻撃者は公開されたオンチェーンデータだけで秘密鍵を逆算できる。つまりこの生成器で作られたすべてのウォレットが原理的に危険にさらされたという意味だ。</p>
  <p class="ja">この種の欠陥は暗号資産の歴史で繰り返されてきた。鍵を作る「サイコロ」が十分に無作為でなければ、資金はどのサーバーが破られたからではなく、鍵そのものが予測可能だから消える。先に扱った<a href="/blog/ill-bloom-wallet-seed-vulnerability.html">イルブルームのウォレットシード脆弱性</a>の事例と構造が似ている — どちらも「ウォレットがどう鍵を作るか」が失敗地点だった。反論の余地は大きくない。スマートコントラクトのバグは監査で相当捕捉できるが、乱数生成の欠陥はコードが正常に「動く」ように見えるため表に出ない。セカンドファイのチームが自ら1億2,900万ADAを緊急移転したのも、欠陥が特定のウォレットではなく生成器全体に及び、露出範囲を狭められなかったためと解釈される。</p>
  <p class="es">La causa raíz no fue un fallo de contrato inteligente ni una brecha de servidor, sino la propia billetera. El software de generación de billeteras web de SecondFi —la parte que crea nuevas billeteras y sus claves privadas— producía claves privadas con aleatoriedad predecible. Una billetera criptográficamente sólida deriva las claves privadas de una entropía prácticamente imposible de adivinar. Cuando la aleatoriedad es débil, un atacante puede deducir la clave privada solo a partir de datos públicos on-chain. En efecto, cada billetera creada por ese generador quedó, en principio, expuesta.</p>
  <p class="es">Esta clase de fallo se ha repetido a lo largo de la historia cripto. Cuando los "dados" que hacen las claves no son lo bastante aleatorios, los fondos desaparecen no porque se vulnerara algún servidor, sino porque las propias claves son predecibles. Recuerda estructuralmente a la <a href="/blog/ill-bloom-wallet-seed-vulnerability.html">vulnerabilidad de semilla de la billetera Ill Bloom</a> tratada antes: en ambos casos, "cómo hace la billetera la clave" fue el punto de fallo. Hay poco margen de réplica: los bugs de contratos inteligentes suelen atraparse en auditorías, pero un fallo de aleatoriedad se oculta porque el código parece "funcionar" con normalidad. El propio traslado de emergencia de 129 millones de ADA por SecondFi se lee mejor como el reconocimiento de que el fallo abarcaba todo el generador y no billeteras concretas, sin forma de acotar el radio del daño.</p>
  <p class="de">Die Grundursache war kein Smart-Contract-Fehler und kein Server-Einbruch, sondern die Wallet selbst. SecondFis Web-Wallet-Generierungssoftware — der Teil, der neue Wallets und ihre privaten Schlüssel erzeugt — produzierte private Schlüssel mit vorhersehbarem Zufall. Eine kryptografisch solide Wallet leitet private Schlüssel aus Entropie ab, die praktisch nicht zu erraten ist. Ist der Zufall schwach, kann ein Angreifer den privaten Schlüssel allein aus öffentlichen On-Chain-Daten zurückrechnen. Faktisch war jede von diesem Generator erzeugte Wallet im Prinzip exponiert.</p>
  <p class="de">Diese Fehlerklasse hat sich durch die Krypto-Geschichte wiederholt. Sind die „Würfel", die die Schlüssel erzeugen, nicht zufällig genug, verschwinden Gelder nicht, weil ein Server durchbrochen wurde, sondern weil die Schlüssel selbst vorhersehbar sind. Es ähnelt strukturell der zuvor behandelten <a href="/blog/ill-bloom-wallet-seed-vulnerability.html">Ill-Bloom-Wallet-Seed-Schwachstelle</a> — in beiden war „wie die Wallet den Schlüssel erzeugt" der Fehlerpunkt. Für eine Gegenrede bleibt wenig Raum: Smart-Contract-Bugs werden oft in Audits gefunden, doch ein Zufallsfehler verbirgt sich, weil der Code normal zu „funktionieren" scheint. SecondFis eigene Notverschiebung von 129 Millionen ADA liest sich am besten als Eingeständnis, dass der Fehler den gesamten Generator umfasste statt einzelner Wallets und den Schadensradius nicht eingrenzbar machte.</p>

  <div class="ko">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">세컨드파이 사고 — 확인 손실 1,600만 vs 노출 1억 2,900만 ADA</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">6.21~23 나흘·4회 탈취 · 근본원인: 약한 난수 생성</text>
    <g font-family="sans-serif">
      <text x="24" y="94" fill="#e4e4e7" font-size="14" font-weight="700">ADA 규모 비교</text>
      <rect x="24" y="106" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="106" width="77" height="30" rx="4" fill="#ef4444"/>
      <text x="112" y="126" fill="#fca5a5" font-size="13">확인 손실 ~1,600만 ADA (~$2.4M)</text>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#f59e0b" opacity="0.5"/>
      <text x="34" y="166" fill="#fde68a" font-size="13">노출·긴급 이전 ~1억 2,900만 ADA (최대 ~$20M 위험)</text>
      <line x1="40" y1="238" x2="660" y2="238" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="90" cy="238" r="6" fill="#38bdf8"/>
      <text x="90" y="266" fill="#7dd3fc" font-size="13" text-anchor="middle">4월</text>
      <text x="90" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">요로이→세컨드파이</text>
      <circle cx="320" cy="238" r="6" fill="#ef4444"/>
      <text x="320" y="266" fill="#fca5a5" font-size="13" text-anchor="middle">6.21~23</text>
      <text x="320" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">4회 탈취</text>
      <circle cx="500" cy="238" r="6" fill="#f59e0b"/>
      <text x="500" y="266" fill="#fbbf24" font-size="13" text-anchor="middle">6.27</text>
      <text x="500" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">2주 복구 약속</text>
      <circle cx="650" cy="238" r="7" fill="#a1a1aa"/>
      <text x="650" y="266" fill="#e4e4e7" font-size="13" text-anchor="middle" font-weight="700">7.6</text>
      <text x="650" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">영구 종료</text>
      <text x="24" y="326" fill="#e4e4e7" font-size="13" font-weight="700">복구 2단계</text>
      <text x="24" y="350" fill="#a1a1aa" font-size="13">1주차: 복구 도구 개발 · 2주차: 테스트·보안 검토 → 반환</text>
      <text x="24" y="374" fill="#71717a" font-size="13">엠어고: 감사 후에도 정상 운영 재개 안 함 · 반환 시점 미정</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">SecondFi incident — 16M confirmed vs 129M ADA exposed</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">Jun 21–23, 4 events · root cause: weak randomness</text>
    <g font-family="sans-serif">
      <text x="24" y="94" fill="#e4e4e7" font-size="14" font-weight="700">ADA scale comparison</text>
      <rect x="24" y="106" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="106" width="77" height="30" rx="4" fill="#ef4444"/>
      <text x="112" y="126" fill="#fca5a5" font-size="13">Confirmed loss ~16M ADA (~$2.4M)</text>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#f59e0b" opacity="0.5"/>
      <text x="34" y="166" fill="#fde68a" font-size="13">Exposed / moved ~129M ADA (up to ~$20M at risk)</text>
      <line x1="40" y1="238" x2="660" y2="238" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="90" cy="238" r="6" fill="#38bdf8"/>
      <text x="90" y="266" fill="#7dd3fc" font-size="13" text-anchor="middle">Apr</text>
      <text x="90" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">Yoroi→SecondFi</text>
      <circle cx="320" cy="238" r="6" fill="#ef4444"/>
      <text x="320" y="266" fill="#fca5a5" font-size="13" text-anchor="middle">Jun 21–23</text>
      <text x="320" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">4 drains</text>
      <circle cx="500" cy="238" r="6" fill="#f59e0b"/>
      <text x="500" y="266" fill="#fbbf24" font-size="13" text-anchor="middle">Jun 27</text>
      <text x="500" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">2-week pledge</text>
      <circle cx="650" cy="238" r="7" fill="#a1a1aa"/>
      <text x="650" y="266" fill="#e4e4e7" font-size="13" text-anchor="middle" font-weight="700">Jul 6</text>
      <text x="650" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">wound down</text>
      <text x="24" y="326" fill="#e4e4e7" font-size="13" font-weight="700">Two-phase recovery</text>
      <text x="24" y="350" fill="#a1a1aa" font-size="13">Week 1: build recovery tool · Week 2: test & security review → return</text>
      <text x="24" y="374" fill="#71717a" font-size="13">EMURGO: no normal reopen even after audits · return date TBD</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">セカンドファイ事故 — 確認損失1,600万 vs 露出1億2,900万ADA</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">6.21〜23、4回奪取 · 根本原因: 弱い乱数生成</text>
    <g font-family="sans-serif">
      <text x="24" y="94" fill="#e4e4e7" font-size="14" font-weight="700">ADA規模の比較</text>
      <rect x="24" y="106" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="106" width="77" height="30" rx="4" fill="#ef4444"/>
      <text x="112" y="126" fill="#fca5a5" font-size="13">確認損失 ~1,600万ADA (~$2.4M)</text>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#f59e0b" opacity="0.5"/>
      <text x="34" y="166" fill="#fde68a" font-size="13">露出・緊急移転 ~1億2,900万ADA (最大~$20M危険)</text>
      <line x1="40" y1="238" x2="660" y2="238" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="90" cy="238" r="6" fill="#38bdf8"/>
      <text x="90" y="266" fill="#7dd3fc" font-size="13" text-anchor="middle">4月</text>
      <text x="90" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">ヨロイ→セカンドファイ</text>
      <circle cx="320" cy="238" r="6" fill="#ef4444"/>
      <text x="320" y="266" fill="#fca5a5" font-size="13" text-anchor="middle">6.21〜23</text>
      <text x="320" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">4回奪取</text>
      <circle cx="500" cy="238" r="6" fill="#f59e0b"/>
      <text x="500" y="266" fill="#fbbf24" font-size="13" text-anchor="middle">6.27</text>
      <text x="500" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">2週間復旧の約束</text>
      <circle cx="650" cy="238" r="7" fill="#a1a1aa"/>
      <text x="650" y="266" fill="#e4e4e7" font-size="13" text-anchor="middle" font-weight="700">7.6</text>
      <text x="650" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">永久終了</text>
      <text x="24" y="326" fill="#e4e4e7" font-size="13" font-weight="700">復旧2段階</text>
      <text x="24" y="350" fill="#a1a1aa" font-size="13">1週目: 復旧ツール開発 · 2週目: テスト・セキュリティ審査 → 返還</text>
      <text x="24" y="374" fill="#71717a" font-size="13">エムアーゴ: 監査後も通常運営を再開せず · 返還時期未定</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Incidente SecondFi — 16M confirmados vs 129M ADA expuestos</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">21–23 jun, 4 eventos · causa raíz: aleatoriedad débil</text>
    <g font-family="sans-serif">
      <text x="24" y="94" fill="#e4e4e7" font-size="14" font-weight="700">Comparación de escala en ADA</text>
      <rect x="24" y="106" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="106" width="77" height="30" rx="4" fill="#ef4444"/>
      <text x="112" y="126" fill="#fca5a5" font-size="13">Pérdida confirmada ~16M ADA (~$2,4M)</text>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#f59e0b" opacity="0.5"/>
      <text x="34" y="166" fill="#fde68a" font-size="13">Expuestos / movidos ~129M ADA (hasta ~$20M en riesgo)</text>
      <line x1="40" y1="238" x2="660" y2="238" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="90" cy="238" r="6" fill="#38bdf8"/>
      <text x="90" y="266" fill="#7dd3fc" font-size="13" text-anchor="middle">abr</text>
      <text x="90" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">Yoroi→SecondFi</text>
      <circle cx="320" cy="238" r="6" fill="#ef4444"/>
      <text x="320" y="266" fill="#fca5a5" font-size="13" text-anchor="middle">21–23 jun</text>
      <text x="320" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">4 vaciados</text>
      <circle cx="500" cy="238" r="6" fill="#f59e0b"/>
      <text x="500" y="266" fill="#fbbf24" font-size="13" text-anchor="middle">27 jun</text>
      <text x="500" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">promesa 2 sem.</text>
      <circle cx="650" cy="238" r="7" fill="#a1a1aa"/>
      <text x="650" y="266" fill="#e4e4e7" font-size="13" text-anchor="middle" font-weight="700">6 jul</text>
      <text x="650" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">cierre definitivo</text>
      <text x="24" y="326" fill="#e4e4e7" font-size="13" font-weight="700">Recuperación en dos fases</text>
      <text x="24" y="350" fill="#a1a1aa" font-size="13">Sem. 1: construir herramienta · Sem. 2: pruebas y revisión → devolución</text>
      <text x="24" y="374" fill="#71717a" font-size="13">EMURGO: sin reapertura normal aun tras auditorías · fecha por definir</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="24" y="34" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">SecondFi-Vorfall — 16 Mio. bestätigt vs. 129 Mio. ADA exponiert</text>
    <text x="24" y="58" fill="#a1a1aa" font-size="13" font-family="sans-serif">21.–23. Juni, 4 Ereignisse · Ursache: schwacher Zufall</text>
    <g font-family="sans-serif">
      <text x="24" y="94" fill="#e4e4e7" font-size="14" font-weight="700">ADA-Größenvergleich</text>
      <rect x="24" y="106" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="106" width="77" height="30" rx="4" fill="#ef4444"/>
      <text x="112" y="126" fill="#fca5a5" font-size="13">Bestätigter Verlust ~16 Mio. ADA (~$2,4M)</text>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#27272a"/>
      <rect x="24" y="146" width="620" height="30" rx="4" fill="#f59e0b" opacity="0.5"/>
      <text x="34" y="166" fill="#fde68a" font-size="13">Exponiert / verschoben ~129 Mio. ADA (bis ~$20M Risiko)</text>
      <line x1="40" y1="238" x2="660" y2="238" stroke="#3f3f46" stroke-width="2"/>
      <circle cx="90" cy="238" r="6" fill="#38bdf8"/>
      <text x="90" y="266" fill="#7dd3fc" font-size="13" text-anchor="middle">Apr</text>
      <text x="90" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">Yoroi→SecondFi</text>
      <circle cx="320" cy="238" r="6" fill="#ef4444"/>
      <text x="320" y="266" fill="#fca5a5" font-size="13" text-anchor="middle">21.–23. Juni</text>
      <text x="320" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">4 Leerungen</text>
      <circle cx="500" cy="238" r="6" fill="#f59e0b"/>
      <text x="500" y="266" fill="#fbbf24" font-size="13" text-anchor="middle">27. Juni</text>
      <text x="500" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">2-Wochen-Zusage</text>
      <circle cx="650" cy="238" r="7" fill="#a1a1aa"/>
      <text x="650" y="266" fill="#e4e4e7" font-size="13" text-anchor="middle" font-weight="700">6. Juli</text>
      <text x="650" y="284" fill="#a1a1aa" font-size="13" text-anchor="middle">eingestellt</text>
      <text x="24" y="326" fill="#e4e4e7" font-size="13" font-weight="700">Zweiphasige Wiederherstellung</text>
      <text x="24" y="350" fill="#a1a1aa" font-size="13">Woche 1: Tool bauen · Woche 2: Test & Sicherheitsprüfung → Rückgabe</text>
      <text x="24" y="374" fill="#71717a" font-size="13">EMURGO: keine Wiedereröffnung selbst nach Audits · Termin offen</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">요로이의 유산 — 브랜드가 짊어진 비용</h2>
  <h2 class="en">Yoroi's legacy — the cost the brand carries</h2>
  <h2 class="ja">ヨロイの遺産 — ブランドが背負う代償</h2>
  <h2 class="es">El legado de Yoroi — el costo que carga la marca</h2>
  <h2 class="de">Yoroi-Erbe — der Preis, den die Marke trägt</h2>
  <p class="ko">세컨드파이는 2018년 엠어고가 내놓아 100만 명 이상이 쓴 카르다노 경량 지갑 '요로이(Yoroi)'의 후신이다. 2026년 4월 요로이를 넓은 '네오파이낸스(neofinance)' 플랫폼으로 재출시하며 세컨드파이로 이름을 바꿨다. 카르다노 재단의 세 축 중 하나인 엠어고가 오래 운영해 온 브랜드였다는 점이 이번 사고의 무게를 키운다. 개인이 만든 무명 디앱이 아니라, 생태계 핵심 기관의 간판 지갑에서 열쇠 생성 결함이 나왔기 때문이다.</p>
  <p class="ko">엠어고의 대응 궤적은 그 부담을 그대로 보여준다. 6월 27일 엠어고는 2주 안에 복구 도구를 만들어 도난 ADA를 돌려주겠다고 약속했다 — 1주차엔 도구 개발, 2주차엔 테스트와 보안 검토라는 2단계 계획이었다. 그러나 7월 6일 결정은 정상 운영 재개가 아니라 영구 종료였다. 재출시 두 달여 만에 간판을 내린 셈이다. 이는 신뢰가 자산인 지갑 사업에서, 한 번의 근본적 열쇠 결함이 브랜드 자체를 어떻게 무너뜨리는지 보여주는 사례다. 크립토 상반기 지갑 침해가 코드 취약점보다 <a href="/blog/certik-h1-2026-wallet-compromise-playbook-shift.html">키·자격증명 탈취로 무게중심이 옮겨갔다</a>는 흐름과도 맞닿는다 — 방어의 초점이 스마트컨트랙트 감사에서 열쇠가 만들어지고 보관되는 과정으로 이동하고 있다.</p>
  <p class="en">SecondFi is the successor to Yoroi, the Cardano light wallet EMURGO launched in 2018 and that served more than a million users. In April 2026 it relaunched Yoroi as a broader "neofinance" platform and renamed it SecondFi. That this was a long-running brand from EMURGO — one of Cardano's three founding entities — magnifies the weight of the incident: a key-generation flaw emerged not in some anonymous individual dApp but in the flagship wallet of a core ecosystem institution.</p>
  <p class="en">EMURGO's response arc shows that burden directly. On June 27, EMURGO pledged to build a recovery tool and return the stolen ADA within two weeks — a two-phase plan of tool-building in week one and testing plus security review in week two. But the July 6 decision was not a return to normal operations; it was a permanent shutdown, retiring the brand barely two months after relaunch. It is a case study in how, in a wallet business where trust is the asset, a single fundamental key flaw can bring down the brand itself. It also aligns with the trend that first-half crypto wallet breaches <a href="/blog/certik-h1-2026-wallet-compromise-playbook-shift.html">shifted from code exploits toward key and credential compromise</a> — the focus of defense is moving from smart-contract audits to how keys are generated and stored.</p>
  <p class="ja">セカンドファイは、2018年にエムアーゴが出し100万人以上が使ったカルダノの軽量ウォレット「ヨロイ(Yoroi)」の後継だ。2026年4月にヨロイを広い「ネオファイナンス(neofinance)」プラットフォームとして再出発させ、セカンドファイに改称した。カルダノ財団の三本柱の一つであるエムアーゴが長く運営してきたブランドだった点が、今回の事故の重みを増す。個人が作った無名dAppではなく、エコシステム中核機関の看板ウォレットで鍵生成の欠陥が出たからだ。</p>
  <p class="ja">エムアーゴの対応の軌跡はその負担をそのまま示す。6月27日、エムアーゴは2週間以内に復旧ツールを作り盗難ADAを返すと約束した — 1週目にツール開発、2週目にテストとセキュリティ審査という2段階計画だった。しかし7月6日の決定は通常運営の再開ではなく永久終了だった。再出発から2カ月余りで看板を下ろした形だ。これは、信頼が資産であるウォレット事業で、一度の根本的な鍵の欠陥がブランドそのものをどう崩すかを示す事例だ。暗号資産の上半期のウォレット侵害がコードの脆弱性より<a href="/blog/certik-h1-2026-wallet-compromise-playbook-shift.html">鍵・認証情報の奪取へ重心が移った</a>という流れとも重なる — 防御の焦点がスマートコントラクト監査から、鍵が作られ保管される過程へ移っている。</p>
  <p class="es">SecondFi es el sucesor de Yoroi, la billetera ligera de Cardano que EMURGO lanzó en 2018 y que atendió a más de un millón de usuarios. En abril de 2026 relanzó Yoroi como una plataforma más amplia de "neofinance" y la renombró SecondFi. Que se tratara de una marca de larga trayectoria de EMURGO —una de las tres entidades fundadoras de Cardano— magnifica el peso del incidente: un fallo de generación de claves surgió no en una dApp individual y anónima, sino en la billetera insignia de una institución central del ecosistema.</p>
  <p class="es">El arco de la respuesta de EMURGO muestra esa carga con claridad. El 27 de junio, EMURGO prometió construir una herramienta de recuperación y devolver el ADA robado en dos semanas: un plan de dos fases, construcción de la herramienta en la primera semana y pruebas más revisión de seguridad en la segunda. Pero la decisión del 6 de julio no fue un regreso a la operación normal, sino un cierre permanente, retirando la marca apenas dos meses después del relanzamiento. Es un caso de estudio de cómo, en un negocio de billeteras donde la confianza es el activo, un único fallo fundamental de claves puede derribar la propia marca. También encaja con la tendencia de que las brechas de billeteras cripto del primer semestre <a href="/blog/certik-h1-2026-wallet-compromise-playbook-shift.html">se desplazaron de los exploits de código hacia el compromiso de claves y credenciales</a>: el foco de la defensa se mueve de las auditorías de contratos inteligentes a cómo se generan y guardan las claves.</p>
  <p class="de">SecondFi ist der Nachfolger von Yoroi, der Cardano-Light-Wallet, die EMURGO 2018 startete und die mehr als eine Million Nutzer bediente. Im April 2026 startete es Yoroi als breitere „Neofinance"-Plattform neu und benannte sie in SecondFi um. Dass dies eine langjährige Marke von EMURGO war — einer der drei Gründungsinstanzen von Cardano — verstärkt das Gewicht des Vorfalls: Ein Schlüsselerzeugungsfehler trat nicht in irgendeiner anonymen Einzel-dApp auf, sondern in der Flaggschiff-Wallet einer zentralen Ökosystem-Institution.</p>
  <p class="de">Der Verlauf von EMURGOs Reaktion zeigt diese Last unmittelbar. Am 27. Juni sagte EMURGO zu, binnen zwei Wochen ein Wiederherstellungswerkzeug zu bauen und das gestohlene ADA zurückzugeben — ein Zweiphasenplan: Werkzeugbau in Woche eins, Tests plus Sicherheitsprüfung in Woche zwei. Doch die Entscheidung vom 6. Juli war keine Rückkehr zum Normalbetrieb, sondern eine dauerhafte Einstellung, die die Marke kaum zwei Monate nach dem Neustart abwickelte. Es ist eine Fallstudie dafür, wie in einem Wallet-Geschäft, in dem Vertrauen das Kapital ist, ein einziger fundamentaler Schlüsselfehler die Marke selbst zu Fall bringen kann. Es passt auch zum Trend, dass Krypto-Wallet-Einbrüche im ersten Halbjahr <a href="/blog/certik-h1-2026-wallet-compromise-playbook-shift.html">von Code-Exploits hin zu Schlüssel- und Zugangsdaten-Kompromittierung wanderten</a> — der Fokus der Verteidigung verlagert sich von Smart-Contract-Audits auf die Erzeugung und Aufbewahrung von Schlüsseln.</p>

  <h2 class="ko">왜 중요한가 — 지켜봐야 할 것</h2>
  <h2 class="en">Why it matters — what to watch</h2>
  <h2 class="ja">なぜ重要か — 注視すべき点</h2>
  <h2 class="es">Por qué importa — qué vigilar</h2>
  <h2 class="de">Warum es wichtig ist — worauf zu achten ist</h2>
  <p class="ko">확인 손실 240만 달러는 2026년 크립토 해킹 규모에서 큰 축은 아니다. 6월 한 달 크립토 해킹 손실이 40건에 걸쳐 약 7,587만 달러였다는 펙실드(PeckShield) 집계에 비춰도 그렇다. 그러나 이 사고의 의미는 액수가 아니라 유형에 있다. 스마트컨트랙트 감사만으로는 잡히지 않는 클라이언트 측 열쇠 생성 결함이, 100만 사용자를 거친 신뢰받는 브랜드에서 나왔다는 점이다. 자기수탁 지갑의 안전은 결국 '열쇠가 얼마나 무작위로 만들어졌는가'라는, 사용자가 눈으로 확인할 수 없는 지점에 달려 있다.</p>
  <p class="ko">지켜봐야 할 것은 세 가지다. 첫째, 엠어고의 복구 도구가 실제로 자금을 돌려주는지, 그리고 반환 시점이 언제 확정되는지다. 둘째, 긴급 이전된 1억 2,900만 ADA가 원소유자에게 안전하게 돌아가는 절차의 투명성이다 — 팀이 자금을 옮겼다는 사실 자체가 새로운 신뢰 문제를 낳기 때문이다. 셋째, 이 사고가 카르다노 생태계의 다른 지갑·디앱에 대한 보안 감사 요구로 번지는지다. 반론의 관점도 필요하다 — 팀이 스스로 결함을 공개하고 자금을 선제적으로 이전한 것은, 침묵하거나 방치하는 것보다 나은 대응이라는 평가도 가능하다. 결국 이번 사건은 '어느 코인을 쓰느냐'보다 '어느 지갑이 열쇠를 어떻게 만드느냐'가 자기수탁의 진짜 위험임을 다시 상기시킨다.</p>
  <p class="en">The $2.4 million confirmed loss is not a large line in 2026's crypto-hack ledger. It looks modest even against PeckShield's tally of roughly $75.87 million lost across 40 hacks in June alone. But the meaning of this incident is in its type, not its size: a client-side key-generation flaw that no smart-contract audit would catch, emerging from a trusted brand that had passed through a million users. The safety of a self-custody wallet ultimately hinges on "how randomly the key was made" — a point users cannot verify with their own eyes.</p>
  <p class="en">Three things are worth watching. First, whether EMURGO's recovery tool actually returns funds, and when a return date is finally set. Second, the transparency of the process by which the 129 million ADA moved in the emergency actually returns to its rightful owners — the very fact that a team moved the funds creates a fresh trust problem. Third, whether the incident spreads into security-audit demands on other wallets and dApps across the Cardano ecosystem. A counterview is also warranted: a team disclosing its own flaw and pre-emptively moving funds can be judged a better response than silence or neglect. In the end, the episode is a reminder that "which wallet makes the key, and how" — more than "which coin you use" — is the real risk in self-custody.</p>
  <p class="ja">確認損失240万ドルは、2026年の暗号資産ハッキング規模で大きな部類ではない。6月の1カ月で40件・約7,587万ドルの損失というペックシールド(PeckShield)の集計に照らしても控えめだ。しかしこの事故の意味は金額ではなく類型にある。スマートコントラクト監査では捕捉できないクライアント側の鍵生成の欠陥が、100万人のユーザーを経た信頼あるブランドから出た点だ。自己保管ウォレットの安全は結局、「鍵がどれだけ無作為に作られたか」という、ユーザーが目で確認できない一点に懸かっている。</p>
  <p class="ja">注視すべきは三つだ。第一に、エムアーゴの復旧ツールが実際に資金を返すか、そして返還時期がいつ確定するかだ。第二に、緊急移転された1億2,900万ADAが元の所有者へ安全に戻る手続きの透明性だ — チームが資金を移したという事実自体が新たな信頼問題を生むからだ。第三に、この事故がカルダノ生態系の他のウォレット・dAppへのセキュリティ監査要求へ広がるかだ。反論の視点も必要だ — チームが自ら欠陥を公開し資金を先手で移したことは、沈黙や放置より良い対応だとの評価も可能だ。結局この件は、「どのコインを使うか」より「どのウォレットが鍵をどう作るか」が自己保管の真のリスクであることを改めて思い起こさせる。</p>
  <p class="es">La pérdida confirmada de 2,4 millones de dólares no es una línea grande en el libro de hackeos cripto de 2026. Parece modesta incluso frente al recuento de PeckShield de unos 75,87 millones perdidos en 40 hackeos solo en junio. Pero el sentido de este incidente está en su tipo, no en su tamaño: un fallo de generación de claves del lado del cliente que ninguna auditoría de contrato inteligente detectaría, surgido de una marca de confianza que había pasado por un millón de usuarios. La seguridad de una billetera de autocustodia depende, en última instancia, de "cuán aleatoriamente se creó la clave", un punto que los usuarios no pueden verificar con sus propios ojos.</p>
  <p class="es">Tres cosas merecen vigilancia. Primero, si la herramienta de recuperación de EMURGO devuelve realmente los fondos y cuándo se fija por fin una fecha de devolución. Segundo, la transparencia del proceso por el cual los 129 millones de ADA movidos en la emergencia regresan de verdad a sus legítimos dueños: el propio hecho de que un equipo moviera los fondos crea un nuevo problema de confianza. Tercero, si el incidente se extiende a exigencias de auditoría de seguridad sobre otras billeteras y dApps del ecosistema Cardano. También cabe una visión contraria: que un equipo revele su propio fallo y mueva fondos de forma preventiva puede juzgarse mejor respuesta que el silencio o la desidia. Al final, el episodio recuerda que "qué billetera hace la clave, y cómo" —más que "qué moneda usas"— es el verdadero riesgo de la autocustodia.</p>
  <p class="de">Der bestätigte Verlust von 2,4 Millionen Dollar ist keine große Zeile im Krypto-Hack-Register 2026. Er wirkt bescheiden selbst gegenüber PeckShields Zählung von rund 75,87 Millionen, die allein im Juni über 40 Hacks verloren gingen. Doch die Bedeutung dieses Vorfalls liegt in seiner Art, nicht in seiner Größe: ein clientseitiger Schlüsselerzeugungsfehler, den kein Smart-Contract-Audit erfassen würde, aus einer vertrauten Marke, die eine Million Nutzer durchlaufen hatte. Die Sicherheit einer Selbstverwahrungs-Wallet hängt letztlich davon ab, „wie zufällig der Schlüssel erzeugt wurde" — ein Punkt, den Nutzer mit eigenen Augen nicht prüfen können.</p>
  <p class="de">Drei Dinge sind beobachtenswert. Erstens, ob EMURGOs Wiederherstellungswerkzeug tatsächlich Gelder zurückgibt und wann endlich ein Rückgabetermin feststeht. Zweitens, die Transparenz des Prozesses, mit dem die im Notfall verschobenen 129 Millionen ADA wirklich an ihre rechtmäßigen Eigentümer zurückkehren — schon die Tatsache, dass ein Team die Gelder bewegte, schafft ein neues Vertrauensproblem. Drittens, ob sich der Vorfall zu Sicherheitsaudit-Forderungen an andere Wallets und dApps im Cardano-Ökosystem ausweitet. Auch eine Gegensicht ist angebracht: Dass ein Team den eigenen Fehler offenlegt und Gelder präventiv verschiebt, kann als bessere Reaktion gelten als Schweigen oder Untätigkeit. Am Ende erinnert die Episode daran, dass „welche Wallet den Schlüssel erzeugt und wie" — mehr als „welche Münze man nutzt" — das eigentliche Risiko der Selbstverwahrung ist.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 카르다노 지갑 세컨드파이(옛 요로이)가 웹 지갑의 약한 난수 생성으로 개인키가 예측 가능해진 결함을 맞았다. 6.21~23 네 차례 탈취로 확인 손실 약 1,600만 ADA(~$240만), 팀이 예방적으로 1억 2,900만 ADA를 긴급 이전(최대 ~$2,000만 노출). 운영사 엠어고는 7.6 서비스를 영구 종료하고 복구팀 역할만 맡기로 했으며, 반환 시점은 미정이다. 스마트컨트랙트가 아닌 열쇠 생성이 실패 지점이었다는 점이 핵심이다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> Cardano wallet SecondFi (formerly Yoroi) suffered a flaw in which weak randomness in its web wallet made private keys predictable. Four drains on Jun 21–23 caused a confirmed ~16M ADA (~$2.4M) loss, and the team pre-emptively moved 129M ADA (up to ~$20M exposed). Operator EMURGO permanently shut the service on Jul 6, keeping only a recovery role, with no set return date. The key point: the failure was in key generation, not a smart contract.</div>
  <div class="box ja">💡 <strong>示唆:</strong> カルダノのウォレット、セカンドファイ(旧ヨロイ)が、ウェブウォレットの弱い乱数生成で秘密鍵が予測可能になる欠陥を受けた。6.21〜23の4回の奪取で確認損失約1,600万ADA(~$240万)、チームが予防的に1億2,900万ADAを緊急移転(最大~$2,000万露出)。運営元エムアーゴは7.6にサービスを永久終了し復旧チームの役割のみとし、返還時期は未定だ。核心はスマートコントラクトではなく鍵生成が失敗地点だった点だ。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> La billetera de Cardano SecondFi (antes Yoroi) sufrió un fallo por el cual la aleatoriedad débil de su billetera web volvió predecibles las claves privadas. Cuatro vaciados el 21–23 jun causaron una pérdida confirmada de ~16M ADA (~$2,4M), y el equipo movió preventivamente 129M ADA (hasta ~$20M expuestos). La operadora EMURGO cerró el servicio de forma permanente el 6 jul, conservando solo un papel de recuperación, sin fecha de devolución. Lo clave: el fallo estuvo en la generación de claves, no en un contrato inteligente.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Die Cardano-Wallet SecondFi (früher Yoroi) erlitt einen Fehler, bei dem schwacher Zufall ihrer Web-Wallet private Schlüssel vorhersehbar machte. Vier Leerungen am 21.–23. Juni verursachten einen bestätigten Verlust von ~16 Mio. ADA (~$2,4M), und das Team verschob präventiv 129 Mio. ADA (bis ~$20M exponiert). Betreiber EMURGO stellte den Dienst am 6. Juli dauerhaft ein und behält nur eine Wiederherstellungsrolle, ohne festen Rückgabetermin. Der Kern: Der Fehler lag in der Schlüsselerzeugung, nicht in einem Smart Contract.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: CoinDesk, Cryptobriefing, CryptoTimes, MEXC, TradingView·99Bitcoins, Grafa, SlowMist(위셴·Yu Xian). 탈취 4회(6.21~23)·확인 손실 ~1,600만 ADA(~$240만)·긴급 이전 ~1억 2,900만 ADA·최대 ~$2,000만 위험(슬로우미스트 추정)·요로이 100만+ 사용자·재출시(4월)·2주 복구 약속(6.27)·영구 종료(7.6) 수치는 각 매체 및 온체인 분석 기준. 6월 크립토 해킹 ~$7,587만/40건은 펙실드(PeckShield). 본 글은 투자 자문이 아니다.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: CoinDesk, Cryptobriefing, CryptoTimes, MEXC, TradingView/99Bitcoins, Grafa, SlowMist (Yu Xian). The four drains (Jun 21–23), ~16M ADA (~$2.4M) confirmed loss, ~129M ADA emergency move, up to ~$20M at risk (SlowMist estimate), Yoroi's 1M+ users, April relaunch, June 27 two-week pledge and July 6 shutdown reflect those outlets and on-chain analysis. June crypto-hack losses of ~$75.87M across 40 incidents are per PeckShield. This article is not investment advice.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: CoinDesk、Cryptobriefing、CryptoTimes、MEXC、TradingView・99Bitcoins、Grafa、スローミスト(Yu Xian)。奪取4回(6.21〜23)・確認損失~1,600万ADA(~$240万)・緊急移転~1億2,900万ADA・最大~$2,000万危険(スローミスト推定)・ヨロイ100万人超・再出発(4月)・2週間復旧の約束(6.27)・永久終了(7.6)の数値は各媒体およびオンチェーン分析に基づく。6月の暗号資産ハッキング~$7,587万/40件はペックシールド(PeckShield)。本記事は投資助言ではない。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: CoinDesk, Cryptobriefing, CryptoTimes, MEXC, TradingView/99Bitcoins, Grafa, SlowMist (Yu Xian). Los cuatro vaciados (21–23 jun), la pérdida confirmada de ~16M ADA (~$2,4M), el movimiento de emergencia de ~129M ADA, hasta ~$20M en riesgo (estimación de SlowMist), el más de un millón de usuarios de Yoroi, el relanzamiento de abril, la promesa de dos semanas del 27 jun y el cierre del 6 jul reflejan esos medios y el análisis on-chain. Las pérdidas por hackeos cripto de junio de ~$75,87M en 40 incidentes son según PeckShield. Este artículo no es asesoramiento de inversión.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: CoinDesk, Cryptobriefing, CryptoTimes, MEXC, TradingView/99Bitcoins, Grafa, SlowMist (Yu Xian). Die vier Leerungen (21.–23. Juni), der bestätigte Verlust von ~16 Mio. ADA (~$2,4M), die Notverschiebung von ~129 Mio. ADA, bis ~$20M Risiko (SlowMist-Schätzung), Yorois über 1 Mio. Nutzer, der April-Neustart, die Zwei-Wochen-Zusage vom 27. Juni und die Einstellung am 6. Juli beruhen auf diesen Medien und On-Chain-Analysen. Juni-Krypto-Hack-Verluste von ~$75,87M über 40 Vorfälle laut PeckShield. Dieser Artikel ist keine Anlageberatung.</p>
<?php require __DIR__.'/_footer.php'; ?>
