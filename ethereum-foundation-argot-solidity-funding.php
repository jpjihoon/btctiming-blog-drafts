<?php $slug = 'ethereum-foundation-argot-solidity-funding'; require __DIR__.'/_header.php'; ?>

<p class="ko">이더리움 재단(Ethereum Foundation·EF)이 7월 5일 스마트컨트랙트 언어 솔리디티(Solidity)를 비롯한 핵심 오픈소스 인프라를 유지보수하는 비영리 조직 <strong>아르고 컬렉티브(Argot Collective)</strong>에 <strong>2,469 stETH(약 434만 달러)</strong> 규모의 연간 운영 자금을 지급했다고 밝혔다. <strong>The Block</strong>과 <strong>crypto.news</strong> 등이 전한 바에 따르면 이는 EF가 2025년 7월 약속한 다년 운영 자금의 후속 분할분이며, 재단은 이듬해 마지막 분할분을 한 차례 더 지급할 예정이다. 금액 자체는 크지 않지만, 이더리움 위에서 돌아가는 스마트컨트랙트 대부분이 의존하는 컴파일러가 단일 조직의 재원에 매달려 있다는 구조를 다시 드러냈다.</p>
  <p class="en">The Ethereum Foundation (EF) said on July 5 it had disbursed <strong>2,469 stETH (about $4.34 million)</strong> in annual operating funds to <strong>Argot Collective</strong>, the not-for-profit that maintains Solidity — the dominant smart-contract language — and other core open-source infrastructure. As relayed by <strong>The Block</strong> and <strong>crypto.news</strong>, the payment is a follow-on tranche of a multi-year commitment the EF made in July 2025, with one final tranche expected the following year. The sum is modest, but it re-exposes a structure in which the compiler that nearly every contract on Ethereum depends on hangs on a single organization's funding.</p>
  <p class="ja">イーサリアム財団(Ethereum Foundation・EF)が7月5日、スマートコントラクト言語ソリディティ(Solidity)をはじめとする中核的なオープンソースインフラを維持する非営利組織<strong>アルゴ・コレクティブ(Argot Collective)</strong>に、<strong>2,469 stETH(約434万ドル)</strong>の年間運営資金を支給したと明らかにした。<strong>The Block</strong>や<strong>crypto.news</strong>などが伝えたところによれば、これはEFが2025年7月に約束した複数年の運営資金の後続分割分であり、財団は翌年に最後の分割分をもう一度支給する予定だ。金額自体は大きくないが、イーサリアム上で動くスマートコントラクトの大半が依存するコンパイラが、単一組織の財源にぶら下がっているという構造を改めて浮き彫りにした。</p>

  <p class="es">La Fundación Ethereum (EF) informó el 5 de julio que había desembolsado <strong>2.469 stETH (unos 4,34 millones de dólares)</strong> en fondos operativos anuales a <strong>Argot Collective</strong>, la organización sin ánimo de lucro que mantiene Solidity —el lenguaje de contratos inteligentes dominante— y otra infraestructura central de código abierto. Según lo transmitido por <strong>The Block</strong> y <strong>crypto.news</strong>, el pago es un tramo posterior de un compromiso plurianual que la EF asumió en julio de 2025, con un tramo final previsto para el año siguiente. La suma es modesta, pero vuelve a exponer una estructura en la que el compilador del que depende casi todo contrato en Ethereum pende de la financiación de una sola organización.</p>
  <p class="de">Die Ethereum Foundation (EF) teilte am 5. Juli mit, sie habe <strong>2.469 stETH (rund 4,34 Millionen Dollar)</strong> an jährlichen Betriebsmitteln an <strong>Argot Collective</strong> ausgezahlt — die gemeinnützige Organisation, die Solidity, die dominierende Smart-Contract-Sprache, sowie weitere zentrale Open-Source-Infrastruktur pflegt. Wie <strong>The Block</strong> und <strong>crypto.news</strong> berichteten, ist die Zahlung eine Folgetranche einer mehrjährigen Zusage der EF vom Juli 2025, wobei eine letzte Tranche für das Folgejahr erwartet wird. Die Summe ist bescheiden, doch sie legt erneut eine Struktur offen, in der der Compiler, von dem fast jeder Vertrag auf Ethereum abhängt, an der Finanzierung einer einzigen Organisation hängt.</p>

  <div class="ko">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">단일 의존성 구조: 스마트컨트랙트 → 솔리디티 → 아르고 ← EF</text>
    <rect x="40" y="70" width="150" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="115" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">이더리움</text>
    <text x="115" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">스마트컨트랙트 대다수</text>
    <line x1="190" y1="93" x2="270" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#a1)"/>
    <rect x="270" y="70" width="150" height="46" rx="8" fill="#3b2f6b" stroke="#6d5bd0"/>
    <text x="345" y="92" fill="#c4b5fd" font-size="11" text-anchor="middle" font-weight="700" font-family="sans-serif">솔리디티 컴파일러</text>
    <text x="345" y="107" fill="#a78bfa" font-size="10" text-anchor="middle" font-family="sans-serif">사실상 표준 언어</text>
    <line x1="420" y1="93" x2="500" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#a1)"/>
    <rect x="500" y="70" width="160" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="580" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">아르고 컬렉티브</text>
    <text x="580" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">약 25명·전 EF 인력</text>
    <line x1="580" y1="180" x2="580" y2="120" stroke="#22c55e" stroke-width="2" marker-end="url(#a2)"/>
    <rect x="480" y="180" width="200" height="52" rx="8" fill="#0f2e1c" stroke="#22c55e"/>
    <text x="580" y="203" fill="#86efac" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">EF 지원금</text>
    <text x="580" y="220" fill="#4ade80" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">2,469 stETH ≈ $4.34M / 년</text>
    <text x="40" y="270" fill="#a1a1aa" font-size="11" font-family="sans-serif">전체 온체인 가치를 지키는 도구가 연 수백만 달러 단일 재원에 의존</text>
    <text x="660" y="292" fill="#52525b" font-size="9" text-anchor="end" font-family="sans-serif">출처: Ethereum Foundation, Argot Collective, The Block</text>
    <defs><marker id="a1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#64748b"/></marker>
    <marker id="a2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#22c55e"/></marker></defs>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">A single dependency: contracts → Solidity → Argot ← EF</text>
    <rect x="40" y="70" width="150" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="115" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Ethereum</text>
    <text x="115" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">most smart contracts</text>
    <line x1="190" y1="93" x2="270" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#b1)"/>
    <rect x="270" y="70" width="150" height="46" rx="8" fill="#3b2f6b" stroke="#6d5bd0"/>
    <text x="345" y="92" fill="#c4b5fd" font-size="11" text-anchor="middle" font-weight="700" font-family="sans-serif">Solidity compiler</text>
    <text x="345" y="107" fill="#a78bfa" font-size="10" text-anchor="middle" font-family="sans-serif">de facto standard</text>
    <line x1="420" y1="93" x2="500" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#b1)"/>
    <rect x="500" y="70" width="160" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="580" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Argot Collective</text>
    <text x="580" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">~25 ex-EF staff</text>
    <line x1="580" y1="180" x2="580" y2="120" stroke="#22c55e" stroke-width="2" marker-end="url(#b2)"/>
    <rect x="480" y="180" width="200" height="52" rx="8" fill="#0f2e1c" stroke="#22c55e"/>
    <text x="580" y="203" fill="#86efac" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">EF grant</text>
    <text x="580" y="220" fill="#4ade80" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">2,469 stETH ≈ $4.34M / yr</text>
    <text x="40" y="270" fill="#a1a1aa" font-size="11" font-family="sans-serif">The tool securing all on-chain value leans on one multimillion-dollar source.</text>
    <text x="660" y="292" fill="#52525b" font-size="9" text-anchor="end" font-family="sans-serif">Source: Ethereum Foundation, Argot Collective, The Block</text>
    <defs><marker id="b1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#64748b"/></marker>
    <marker id="b2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#22c55e"/></marker></defs>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">単一依存の構造: コントラクト → ソリディティ → アルゴ ← EF</text>
    <rect x="40" y="70" width="150" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="115" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">イーサリアム</text>
    <text x="115" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">大半のコントラクト</text>
    <line x1="190" y1="93" x2="270" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#c1)"/>
    <rect x="270" y="70" width="150" height="46" rx="8" fill="#3b2f6b" stroke="#6d5bd0"/>
    <text x="345" y="92" fill="#c4b5fd" font-size="11" text-anchor="middle" font-weight="700" font-family="sans-serif">ソリディティ</text>
    <text x="345" y="107" fill="#a78bfa" font-size="10" text-anchor="middle" font-family="sans-serif">事実上の標準言語</text>
    <line x1="420" y1="93" x2="500" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#c1)"/>
    <rect x="500" y="70" width="160" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="580" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">アルゴ・コレクティブ</text>
    <text x="580" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">約25名・元EF人材</text>
    <line x1="580" y1="180" x2="580" y2="120" stroke="#22c55e" stroke-width="2" marker-end="url(#c2)"/>
    <rect x="480" y="180" width="200" height="52" rx="8" fill="#0f2e1c" stroke="#22c55e"/>
    <text x="580" y="203" fill="#86efac" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">EF助成金</text>
    <text x="580" y="220" fill="#4ade80" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">2,469 stETH ≈ $4.34M / 年</text>
    <text x="40" y="270" fill="#a1a1aa" font-size="11" font-family="sans-serif">全オンチェーン価値を守る道具が年数百万ドルの単一財源に依存。</text>
    <text x="660" y="292" fill="#52525b" font-size="9" text-anchor="end" font-family="sans-serif">出典: Ethereum Foundation, Argot Collective, The Block</text>
    <defs><marker id="c1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#64748b"/></marker>
    <marker id="c2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#22c55e"/></marker></defs>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Dependencia única: contratos → Solidity → Argot ← EF</text>
    <rect x="40" y="70" width="150" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="115" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Ethereum</text>
    <text x="115" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">casi todo contrato</text>
    <line x1="190" y1="93" x2="270" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#d1)"/>
    <rect x="270" y="70" width="150" height="46" rx="8" fill="#3b2f6b" stroke="#6d5bd0"/>
    <text x="345" y="92" fill="#c4b5fd" font-size="11" text-anchor="middle" font-weight="700" font-family="sans-serif">compilador Solidity</text>
    <text x="345" y="107" fill="#a78bfa" font-size="10" text-anchor="middle" font-family="sans-serif">estándar de facto</text>
    <line x1="420" y1="93" x2="500" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#d1)"/>
    <rect x="500" y="70" width="160" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="580" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Argot Collective</text>
    <text x="580" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">~25 ex-EF</text>
    <line x1="580" y1="180" x2="580" y2="120" stroke="#22c55e" stroke-width="2" marker-end="url(#d2)"/>
    <rect x="480" y="180" width="200" height="52" rx="8" fill="#0f2e1c" stroke="#22c55e"/>
    <text x="580" y="203" fill="#86efac" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">Subvención EF</text>
    <text x="580" y="220" fill="#4ade80" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">2.469 stETH ≈ $4,34M / año</text>
    <text x="40" y="270" fill="#a1a1aa" font-size="11" font-family="sans-serif">La herramienta que asegura todo el valor on-chain pende de una fuente única.</text>
    <text x="660" y="292" fill="#52525b" font-size="9" text-anchor="end" font-family="sans-serif">Fuente: Ethereum Foundation, Argot Collective, The Block</text>
    <defs><marker id="d1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#64748b"/></marker>
    <marker id="d2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#22c55e"/></marker></defs>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Einzelabhängigkeit: Verträge → Solidity → Argot ← EF</text>
    <rect x="40" y="70" width="150" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="115" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Ethereum</text>
    <text x="115" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">fast alle Verträge</text>
    <line x1="190" y1="93" x2="270" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#e1)"/>
    <rect x="270" y="70" width="150" height="46" rx="8" fill="#3b2f6b" stroke="#6d5bd0"/>
    <text x="345" y="92" fill="#c4b5fd" font-size="11" text-anchor="middle" font-weight="700" font-family="sans-serif">Solidity-Compiler</text>
    <text x="345" y="107" fill="#a78bfa" font-size="10" text-anchor="middle" font-family="sans-serif">De-facto-Standard</text>
    <line x1="420" y1="93" x2="500" y2="93" stroke="#64748b" stroke-width="2" marker-end="url(#e1)"/>
    <rect x="500" y="70" width="160" height="46" rx="8" fill="#1e293b" stroke="#334155"/>
    <text x="580" y="92" fill="#cbd5e1" font-size="11" text-anchor="middle" font-family="sans-serif">Argot Collective</text>
    <text x="580" y="107" fill="#94a3b8" font-size="10" text-anchor="middle" font-family="sans-serif">~25 Ex-EF-Leute</text>
    <line x1="580" y1="180" x2="580" y2="120" stroke="#22c55e" stroke-width="2" marker-end="url(#e2)"/>
    <rect x="480" y="180" width="200" height="52" rx="8" fill="#0f2e1c" stroke="#22c55e"/>
    <text x="580" y="203" fill="#86efac" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">EF-Zuschuss</text>
    <text x="580" y="220" fill="#4ade80" font-size="12" text-anchor="middle" font-weight="700" font-family="sans-serif">2.469 stETH ≈ $4,34M / Jahr</text>
    <text x="40" y="270" fill="#a1a1aa" font-size="11" font-family="sans-serif">Das Werkzeug, das allen On-Chain-Wert sichert, hängt an einer einzigen Quelle.</text>
    <text x="660" y="292" fill="#52525b" font-size="9" text-anchor="end" font-family="sans-serif">Quelle: Ethereum Foundation, Argot Collective, The Block</text>
    <defs><marker id="e1" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#64748b"/></marker>
    <marker id="e2" markerWidth="8" markerHeight="8" refX="6" refY="3" orient="auto"><path d="M0,0 L6,3 L0,6 Z" fill="#22c55e"/></marker></defs>
  </svg>
  </div>

  <h2 class="ko">'솔리디티'라는 단일 의존성</h2>
  <h2 class="en">The single dependency called Solidity</h2>
  <h2 class="ja">「ソリディティ」という単一依存</h2>
  <h2 class="es">La dependencia única llamada Solidity</h2>
  <h2 class="de">Die Einzelabhängigkeit namens Solidity</h2>
  <p class="ko">아르고 컬렉티브는 2024년 EF 내부의 솔리디티·소스파이(Sourcify) 등 개발 팀이 독립해 스위스 추크(Zug)에 비영리 결사체로 설립한 조직으로, 약 25명의 전 EF 인력으로 구성돼 있다고 <strong>crypto.news</strong>는 전했다. 이들이 유지보수하는 솔리디티는 이더리움은 물론 EVM 계열 체인 전반에서 사실상 표준으로 쓰이는 스마트컨트랙트 언어다. 즉 이 434만 달러 지원금은 특정 앱 하나가 아니라, 온체인에 예치된 수천억 달러 규모의 자산을 떠받치는 컴파일러 그 자체를 겨냥한 돈이다.</p>
  <p class="en">Argot Collective was set up in 2024 when EF's internal Solidity and Sourcify teams spun out and incorporated as a not-for-profit association in Zug, Switzerland, staffed by roughly 25 former EF people, <strong>crypto.news</strong> reported. The Solidity they maintain is the de facto standard smart-contract language across Ethereum and the wider EVM chain family. In other words, this $4.34 million grant targets not a single app but the compiler itself — the thing propping up the hundreds of billions of dollars in assets sitting on-chain.</p>
  <p class="ja">アルゴ・コレクティブは2024年、EF内部のソリディティ・ソースファイ(Sourcify)などの開発チームが独立し、スイス・ツーク(Zug)に非営利結社として設立した組織で、約25名の元EF人材で構成されていると<strong>crypto.news</strong>は伝えた。彼らが維持するソリディティは、イーサリアムはもとよりEVM系チェーン全般で事実上の標準として使われるスマートコントラクト言語だ。つまりこの434万ドルの助成金は、特定のアプリ一つではなく、オンチェーンに預けられた数千億ドル規模の資産を支えるコンパイラそのものを狙った資金である。</p>

  <p class="es">Argot Collective se creó en 2024, cuando los equipos internos de Solidity y Sourcify de la EF se escindieron y se constituyeron como asociación sin ánimo de lucro en Zug, Suiza, con unas 25 personas exEF, informó <strong>crypto.news</strong>. El Solidity que mantienen es el lenguaje de contratos inteligentes estándar de facto en Ethereum y en toda la familia de cadenas EVM. Dicho de otro modo, esta subvención de 4,34 millones de dólares apunta no a una sola aplicación, sino al compilador en sí: aquello que sostiene los cientos de miles de millones de dólares en activos alojados on-chain.</p>
  <p class="de">Argot Collective entstand 2024, als die internen Solidity- und Sourcify-Teams der EF ausgegliedert und als gemeinnütziger Verein in Zug (Schweiz) gegründet wurden, besetzt mit rund 25 ehemaligen EF-Mitarbeitern, berichtete <strong>crypto.news</strong>. Das von ihnen gepflegte Solidity ist die De-facto-Standardsprache für Smart Contracts auf Ethereum und in der gesamten EVM-Kettenfamilie. Mit anderen Worten: Dieser Zuschuss von 4,34 Millionen Dollar zielt nicht auf eine einzelne App, sondern auf den Compiler selbst — das, was die Hunderte Milliarden Dollar an On-Chain-Vermögen stützt.</p>

  <p class="ko">이 구조가 왜 위태로운지는 오픈소스 역사가 이미 보여줬다. 2014년 오픈SSL의 하트블리드(Heartbleed) 버그, 2021년 로그4j(Log4Shell) 사태는 모두 '세상 절반이 의존하는 코드를 소수의 자원봉사자가 사실상 무보수로 떠받치고 있었다'는 사실이 드러난 사건이었다. 코드가 무료로 쓰인다는 것과 그 코드를 계속 안전하게 유지할 재원이 있다는 것은 완전히 다른 문제다. EF가 매년 수백만 달러를 들여 컴파일러 팀에 <strong>급여성 운영 자금</strong>을 대는 이유가 바로 여기에 있다 — 크립토에서 컨트랙트 하나의 버그는 곧 자금 유출이기 때문이다.</p>
  <p class="en">Why that structure is precarious is something open-source history has already shown. OpenSSL's Heartbleed bug in 2014 and the 2021 Log4Shell episode both revealed that code half the world depends on was being propped up, essentially unpaid, by a handful of volunteers. That code is free to use and that there is funding to keep it safe are entirely different matters. That is precisely why the EF spends millions a year on <strong>salary-like operating funds</strong> for the compiler team — in crypto, a single contract bug is an immediate drain of funds.</p>
  <p class="ja">この構造がなぜ危ういかは、オープンソースの歴史がすでに示している。2014年のOpenSSLのHeartbleedバグ、2021年のLog4Shell騒動はいずれも、「世界の半分が依存するコードを、ごく少数のボランティアが事実上無報酬で支えていた」という事実が露呈した出来事だった。コードが無料で使えることと、そのコードを安全に維持し続ける財源があることは、まったく別の問題だ。EFが毎年数百万ドルをかけてコンパイラチームに<strong>給与相当の運営資金</strong>を出す理由はまさにここにある — 暗号資産ではコントラクト一つのバグが即、資金流出につながるからだ。</p>

  <p class="es">Por qué esa estructura es precaria ya lo ha demostrado la historia del código abierto. El fallo Heartbleed de OpenSSL en 2014 y el episodio Log4Shell de 2021 revelaron que el código del que depende medio mundo estaba sostenido, esencialmente sin cobrar, por un puñado de voluntarios. Que el código sea gratis de usar y que exista financiación para mantenerlo seguro son cuestiones totalmente distintas. Por eso precisamente la EF gasta millones al año en <strong>fondos operativos de tipo salarial</strong> para el equipo del compilador: en cripto, el fallo de un solo contrato es una fuga inmediata de fondos.</p>
  <p class="de">Warum diese Struktur prekär ist, hat die Open-Source-Geschichte bereits gezeigt. Der Heartbleed-Bug von OpenSSL 2014 und die Log4Shell-Episode 2021 legten beide offen, dass Code, von dem die halbe Welt abhängt, im Wesentlichen unbezahlt von einer Handvoll Freiwilliger getragen wurde. Dass Code kostenlos nutzbar ist und dass es Mittel gibt, ihn sicher zu halten, sind völlig verschiedene Dinge. Genau deshalb gibt die EF jährlich Millionen für <strong>gehaltsähnliche Betriebsmittel</strong> des Compiler-Teams aus — in Krypto ist der Bug eines einzigen Vertrags ein sofortiger Mittelabfluss.</p>

  <h2 class="ko">왜 하필 stETH로 지급하는가</h2>
  <h2 class="en">Why pay in stETH of all things</h2>
  <h2 class="ja">なぜよりによってstETHで支給するのか</h2>
  <h2 class="es">Por qué pagar precisamente en stETH</h2>
  <h2 class="de">Warum ausgerechnet in stETH zahlen</h2>
  <p class="ko">지원금이 현금이나 순수 ETH가 아니라 <strong>stETH(리도에 스테이킹된 ETH)</strong>로 지급된 점은 그 자체로 시사적이다. stETH는 보유하는 동안에도 스테이킹 이자가 붙는 자산이므로, 아르고가 이 자금을 곧바로 쓰지 않고 운영에 맞춰 나눠 쓰는 동안에도 재원이 스스로 불어난다. 동시에 수령 조직의 이해관계를 ETH 가격·네트워크 건전성과 묶어 두는 효과가 있다. EF가 최근 자체 재무 운용에서 유휴 ETH를 스테이킹·디파이에 배치하는 방향으로 전환해 온 흐름과도 맞닿아 있다.</p>
  <p class="en">That the grant came in <strong>stETH (ETH staked with Lido)</strong> rather than cash or plain ETH is itself telling. stETH accrues staking yield while it is held, so the funds keep compounding even as Argot draws them down over its operating year rather than spending them at once. It also ties the recipient's interests to ETH's price and the network's health. It dovetails with the EF's recent shift toward putting idle ETH to work in staking and DeFi within its own treasury management.</p>
  <p class="ja">助成金が現金や純粋なETHではなく<strong>stETH(リドにステーキングされたETH)</strong>で支給された点は、それ自体が示唆的だ。stETHは保有している間もステーキング利息が付く資産なので、アルゴがこの資金をすぐに使わず運営に合わせて分割して使う間も財源が自ら増える。同時に、受領組織の利害をETH価格・ネットワークの健全性と結びつける効果がある。EFが近年、自らの財務運用で遊休ETHをステーキング・DeFiに配置する方向へ転換してきた流れとも重なる。</p>

  <p class="es">Que la subvención llegara en <strong>stETH (ETH depositado en Lido)</strong> y no en efectivo o ETH simple es en sí mismo revelador. El stETH acumula rendimiento de staking mientras se mantiene, de modo que los fondos siguen capitalizándose incluso mientras Argot los va gastando a lo largo de su año operativo en vez de usarlos de golpe. Además ata los intereses del receptor al precio de ETH y a la salud de la red. Encaja con el giro reciente de la EF hacia poner a trabajar el ETH ocioso en staking y DeFi dentro de su propia gestión de tesorería.</p>
  <p class="de">Dass der Zuschuss in <strong>stETH (bei Lido gestaktes ETH)</strong> statt in Bargeld oder schlichtem ETH kam, ist für sich genommen aufschlussreich. stETH erwirtschaftet Staking-Rendite, solange es gehalten wird, sodass die Mittel weiter wachsen, während Argot sie über sein Betriebsjahr abruft, statt sie auf einmal auszugeben. Zugleich koppelt es die Interessen des Empfängers an den ETH-Preis und die Gesundheit des Netzwerks. Es passt zur jüngsten Wende der EF, ungenutztes ETH im eigenen Treasury-Management in Staking und DeFi arbeiten zu lassen.</p>

  <p class="ko">이 지점은 '<strong>EF 자금은 누가 대는가</strong>'라는 오래된 커뮤니티 논쟁과 직결된다. EF는 운영비 마련을 위해 주기적으로 ETH를 매도해 왔고, 그때마다 일부에서는 재단 매도가 시장에 하방 압력을 준다고 비판했다. 보유 ETH를 스테이킹해 그 수익(stETH의 이자)으로 공공재를 지원하는 방식은, 원금을 헐지 않고도 재원을 순환시켜 이 비판을 완화하려는 시도로 읽힌다. 프로토콜 차원에서 발행량과 소각으로 통화정책을 조정하는 <a href="/blog/solana-disinflation-fee-burn-simd.html">솔라나의 수수료 소각·디스인플레이션 실험</a>과 마찬가지로, '누가 지속가능하게 비용을 대느냐'는 결국 모든 퍼블릭 인프라의 핵심 질문이다.</p>
  <p class="en">This connects directly to a long-running community debate: <strong>who pays for the EF</strong>. The EF has periodically sold ETH to cover operating costs, and each time some critics argued that foundation selling puts downward pressure on the market. Funding public goods from the yield on staked ETH (stETH's interest) reads as an attempt to soften that criticism by cycling the funds without touching the principal. Just as with <a href="/blog/solana-disinflation-fee-burn-simd.html">Solana's fee-burn and disinflation experiment</a>, which tunes monetary policy through issuance and burn at the protocol level, "who sustainably foots the bill" is ultimately the core question for all public infrastructure.</p>
  <p class="ja">この点は「<strong>EFの資金は誰が出すのか</strong>」という長年のコミュニティ論争と直結する。EFは運営費を賄うため定期的にETHを売却してきており、その都度、一部からは財団の売却が市場に下押し圧力をかけると批判されてきた。保有ETHをステーキングし、その収益(stETHの利息)で公共財を支援する方式は、元本を崩さずに財源を循環させてこの批判を和らげようとする試みと読める。プロトコル次元で発行量と焼却によって金融政策を調整する<a href="/blog/solana-disinflation-fee-burn-simd.html">ソラナの手数料焼却・ディスインフレ実験</a>と同様、「誰が持続的に費用を負担するのか」は結局、あらゆるパブリックインフラの核心的な問いだ。</p>

  <p class="es">Esto conecta directamente con un debate comunitario de larga data: <strong>quién paga la EF</strong>. La EF ha vendido ETH periódicamente para cubrir costes operativos, y cada vez algunos críticos sostenían que las ventas de la fundación presionan el mercado a la baja. Financiar bienes públicos con el rendimiento del ETH en staking (el interés del stETH) se lee como un intento de suavizar esa crítica haciendo circular los fondos sin tocar el principal. Igual que con <a href="/blog/solana-disinflation-fee-burn-simd.html">el experimento de quema de comisiones y desinflación de Solana</a>, que ajusta la política monetaria mediante emisión y quema a nivel de protocolo, "quién sufraga de forma sostenible" es en el fondo la pregunta central de toda infraestructura pública.</p>
  <p class="de">Das hängt direkt mit einer langjährigen Community-Debatte zusammen: <strong>Wer zahlt für die EF</strong>. Die EF hat regelmäßig ETH verkauft, um Betriebskosten zu decken, und jedes Mal argumentierten einige Kritiker, dass Verkäufe der Foundation den Markt nach unten drücken. Öffentliche Güter aus der Rendite auf gestaktes ETH (dem Zins von stETH) zu finanzieren, liest sich als Versuch, diese Kritik zu entschärfen, indem die Mittel zirkulieren, ohne das Kapital anzutasten. Wie beim <a href="/blog/solana-disinflation-fee-burn-simd.html">Fee-Burn- und Disinflations-Experiment von Solana</a>, das die Geldpolitik über Emission und Burn auf Protokollebene steuert, ist „wer die Rechnung nachhaltig trägt" letztlich die Kernfrage jeder öffentlichen Infrastruktur.</p>

  <h2 class="ko">이게 왜 중요하고 무엇을 지켜봐야 하나</h2>
  <h2 class="en">Why it matters and what to watch</h2>
  <h2 class="ja">これがなぜ重要で何を注視すべきか</h2>
  <h2 class="es">Por qué importa y qué vigilar</h2>
  <h2 class="de">Warum es wichtig ist und worauf zu achten</h2>
  <p class="ko">반론도 분명하다. 연 434만 달러가 전 세계 스마트컨트랙트를 지탱하는 컴파일러 유지비로 <strong>충분한지</strong>는 의문이고, 반대로 '중립적'이어야 할 핵심 언어의 개발 재원을 특정 재단 한 곳이 사실상 독점하는 것이 <strong>지나친 중앙집중</strong> 아니냐는 지적도 있다. 실제로 <a href="/blog/decentralization-marketing-copy.html">탈중앙화가 마케팅 문구에 그치는 경우</a>가 많다는 비판은 프로토콜 거버넌스뿐 아니라 개발 자금 구조에도 그대로 적용된다. 자금원이 하나면, 그 자금원의 우선순위가 곧 언어의 우선순위가 될 위험이 있기 때문이다.</p>
  <p class="en">The counterarguments are clear too. It is doubtful whether $4.34 million a year is <strong>enough</strong> to maintain the compiler underpinning the world's smart contracts; conversely, some note that having a single foundation effectively monopolize funding for a language that is supposed to be "neutral" may be <strong>too centralized</strong>. Indeed, the critique that <a href="/blog/decentralization-marketing-copy.html">decentralization is often just marketing copy</a> applies to development-funding structures as much as to protocol governance. When there is a single source of money, that source's priorities risk becoming the language's priorities.</p>
  <p class="ja">反論も明確だ。年434万ドルが世界中のスマートコントラクトを支えるコンパイラの維持費として<strong>十分か</strong>は疑問であり、逆に「中立」であるべき中核言語の開発財源を特定の財団一つが事実上独占するのは<strong>過度な中央集権</strong>ではないかという指摘もある。実際、<a href="/blog/decentralization-marketing-copy.html">分散化がマーケティング文句にとどまる場合</a>が多いという批判は、プロトコルガバナンスだけでなく開発資金の構造にもそのまま当てはまる。資金源が一つなら、その資金源の優先順位がそのまま言語の優先順位になる危険があるからだ。</p>

  <p class="es">Los contraargumentos también son claros. Es dudoso que 4,34 millones de dólares al año basten para <strong>mantener</strong> el compilador que sustenta los contratos inteligentes del mundo; a la inversa, algunos señalan que una sola fundación monopolice de facto la financiación de un lenguaje que se supone "neutral" puede ser <strong>demasiado centralizado</strong>. De hecho, la crítica de que <a href="/blog/decentralization-marketing-copy.html">la descentralización suele ser mero eslogan</a> se aplica a las estructuras de financiación del desarrollo tanto como a la gobernanza del protocolo. Cuando hay una única fuente de dinero, sus prioridades corren el riesgo de convertirse en las prioridades del lenguaje.</p>
  <p class="de">Auch die Gegenargumente sind klar. Es ist fraglich, ob 4,34 Millionen Dollar im Jahr <strong>genügen</strong>, um den Compiler zu pflegen, der die Smart Contracts der Welt trägt; umgekehrt merken einige an, dass eine einzige Foundation, die die Finanzierung einer eigentlich „neutralen" Kernsprache faktisch monopolisiert, <strong>zu zentralisiert</strong> sein könnte. Tatsächlich gilt die Kritik, dass <a href="/blog/decentralization-marketing-copy.html">Dezentralisierung oft nur Marketing ist</a>, für Entwicklungsfinanzierungsstrukturen ebenso wie für Protokoll-Governance. Bei einer einzigen Geldquelle drohen deren Prioritäten zu den Prioritäten der Sprache zu werden.</p>

  <p class="ko">지켜봐야 할 것은 세 가지다. 첫째, 내년 마지막 분할분 이후 아르고의 재원이 EF 외의 출처(ENS 등 다른 프로토콜, 기업 후원)로 얼마나 다변화되는지다 — 다변화가 곧 탈중앙화된 지속가능성이다. 둘째, 지원이 stETH로 지급되는 흐름이 EF의 다른 공공재 지원으로 확산되는지, 그리고 이것이 재단의 ETH 매도 압력을 실제로 줄이는지다. 셋째, 솔리디티 외 대안 언어·툴체인(예: Vyper, 신형 컴파일러)에도 비슷한 규모의 자금이 흘러 생태계의 언어 단일 의존이 완화되는지다. 이더리움의 기술 로드맵은 <a href="/blog/ethereum-upgrade-roadmap-timeline.html">업그레이드 일정</a>으로 자주 조명되지만, 그 로드맵을 실제로 구현할 <strong>사람과 도구를 누가 먹여 살리는가</strong>라는 질문은 그만큼 주목받지 못한다. 이번 지원금은 그 조용한 배관을 잠깐 드러낸 사건이다.</p>
  <p class="en">Three things to watch. First, after next year's final tranche, how far Argot's funding diversifies beyond the EF — other protocols such as ENS, corporate sponsors; diversification is decentralized sustainability. Second, whether disbursing in stETH spreads to the EF's other public-goods grants, and whether it actually reduces the foundation's ETH-selling pressure. Third, whether comparable funding flows to alternative languages and toolchains beyond Solidity (Vyper, newer compilers), easing the ecosystem's single-language dependence. Ethereum's technical path is often spotlighted through its <a href="/blog/ethereum-upgrade-roadmap-timeline.html">upgrade schedule</a>, but the question of <strong>who feeds the people and tools</strong> that actually build that roadmap draws far less attention. This grant briefly exposed that quiet plumbing.</p>
  <p class="ja">注視すべきは三つだ。第一に、来年の最後の分割分の後、アルゴの財源がEF以外(ENSなど他のプロトコル、企業スポンサー)へどれだけ多様化するかだ — 多様化こそ分散化された持続可能性である。第二に、stETHで支給する流れがEFの他の公共財支援に広がるか、そしてこれが財団のETH売却圧力を実際に減らすかだ。第三に、ソリディティ以外の代替言語・ツールチェーン(Vyper、新型コンパイラなど)にも同規模の資金が流れ、エコシステムの言語単一依存が緩和されるかだ。イーサリアムの技術ロードマップは<a href="/blog/ethereum-upgrade-roadmap-timeline.html">アップグレード日程</a>で頻繁に注目されるが、そのロードマップを実際に実装する<strong>人と道具を誰が養うのか</strong>という問いはそれほど注目されない。今回の助成金は、その静かな配管を一瞬だけ露わにした出来事だ。</p>

  <p class="es">Tres cosas que vigilar. Primero, tras el tramo final del año que viene, cuánto se diversifica la financiación de Argot más allá de la EF —otros protocolos como ENS, patrocinadores corporativos—; la diversificación es sostenibilidad descentralizada. Segundo, si el desembolso en stETH se extiende a las demás subvenciones de bienes públicos de la EF, y si de verdad reduce la presión vendedora de ETH de la fundación. Tercero, si fluye financiación comparable hacia lenguajes y cadenas de herramientas alternativos más allá de Solidity (Vyper, compiladores más nuevos), aliviando la dependencia del ecosistema de un solo lenguaje. La ruta técnica de Ethereum suele iluminarse a través de su <a href="/blog/ethereum-upgrade-roadmap-timeline.html">calendario de actualizaciones</a>, pero la pregunta de <strong>quién alimenta a las personas y herramientas</strong> que realmente construyen esa hoja de ruta recibe mucha menos atención. Esta subvención expuso brevemente esa fontanería silenciosa.</p>
  <p class="de">Drei Dinge sind zu beobachten. Erstens, wie stark sich Argots Finanzierung nach der letzten Tranche im nächsten Jahr über die EF hinaus diversifiziert — andere Protokolle wie ENS, Unternehmenssponsoren; Diversifizierung ist dezentrale Nachhaltigkeit. Zweitens, ob sich die Auszahlung in stETH auf die anderen Public-Goods-Zuschüsse der EF ausweitet und ob sie den ETH-Verkaufsdruck der Foundation tatsächlich senkt. Drittens, ob vergleichbare Mittel zu alternativen Sprachen und Toolchains jenseits von Solidity (Vyper, neuere Compiler) fließen und so die Ein-Sprachen-Abhängigkeit des Ökosystems lockern. Ethereums technischer Weg wird oft über den <a href="/blog/ethereum-upgrade-roadmap-timeline.html">Upgrade-Fahrplan</a> beleuchtet, doch die Frage, <strong>wer die Menschen und Werkzeuge ernährt</strong>, die diesen Fahrplan tatsächlich bauen, erhält weit weniger Aufmerksamkeit. Dieser Zuschuss legte kurz jene stille Verrohrung frei.</p>

  <div class="box ko">💡 <strong>시사점:</strong> 434만 달러라는 작은 지원금의 진짜 메시지는 규모가 아니라 구조다. 이더리움 위 자산 대부분을 지키는 컴파일러가 단일 재단의 재원에 의존하고, 그 재원조차 이제 원금이 아닌 스테이킹 수익으로 순환된다. 지속가능성의 관건은 액수가 아니라 <strong>자금원의 다변화</strong>다. ETH가 다시 인플레이션으로 돌아선 국면은 <a href="/blog/ethereum-supply-inflationary-ultrasound-money.html">별도의 글</a>에서 다룬다.</div>
  <div class="box en">💡 <strong>Takeaway:</strong> The real message of a small $4.34M grant is structure, not size. The compiler that secures most assets on Ethereum leans on a single foundation's funds, and even those funds now cycle from staking yield rather than principal. The key to sustainability is not the amount but <strong>diversifying the funding source</strong>. The phase in which ETH turned inflationary again is covered in a <a href="/blog/ethereum-supply-inflationary-ultrasound-money.html">separate article</a>.</div>
  <div class="box ja">💡 <strong>示唆:</strong> 434万ドルという小さな助成金の本当のメッセージは規模ではなく構造だ。イーサリアム上の資産の大半を守るコンパイラが単一財団の財源に依存し、その財源すら今や元本ではなくステーキング収益で循環する。持続可能性の鍵は金額ではなく<strong>資金源の多様化</strong>だ。ETHが再びインフレに転じた局面は<a href="/blog/ethereum-supply-inflationary-ultrasound-money.html">別の記事</a>で扱う。</div>
  <div class="box es">💡 <strong>Conclusión:</strong> El verdadero mensaje de una pequeña subvención de 4,34M$ es la estructura, no el tamaño. El compilador que asegura la mayoría de los activos en Ethereum pende de los fondos de una sola fundación, y hasta esos fondos circulan ahora del rendimiento de staking y no del principal. La clave de la sostenibilidad no es el monto sino <strong>diversificar la fuente de financiación</strong>. La fase en que ETH volvió a ser inflacionario se aborda en un <a href="/blog/ethereum-supply-inflationary-ultrasound-money.html">artículo aparte</a>.</div>
  <div class="box de">💡 <strong>Fazit:</strong> Die eigentliche Botschaft eines kleinen 4,34-Mio.-$-Zuschusses ist die Struktur, nicht die Größe. Der Compiler, der die meisten Vermögenswerte auf Ethereum sichert, hängt an den Mitteln einer einzigen Foundation, und selbst diese Mittel zirkulieren nun aus Staking-Rendite statt aus dem Kapital. Der Schlüssel zur Nachhaltigkeit ist nicht der Betrag, sondern die <strong>Diversifizierung der Finanzierungsquelle</strong>. Die Phase, in der ETH wieder inflationär wurde, behandelt ein <a href="/blog/ethereum-supply-inflationary-ultrasound-money.html">eigener Artikel</a>.</div>

  <p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: Ethereum Foundation, Argot Collective, The Block, crypto.news, Bitget News. 지원금 규모는 2,469 stETH(보도 시점 약 434만 달러) 기준이며, 다년 약정의 분할 회차·총액은 보도별로 표현이 다를 수 있다. 이 글은 투자 조언이 아니다.</p>
  <p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: Ethereum Foundation, Argot Collective, The Block, crypto.news, Bitget News. The grant size is 2,469 stETH (about $4.34M at the time of reporting); the tranche numbering and total of the multi-year commitment are described differently across outlets. This article is not investment advice.</p>
  <p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: Ethereum Foundation、Argot Collective、The Block、crypto.news、Bitget News。助成金の規模は2,469 stETH(報道時点で約434万ドル)に基づき、複数年約定の分割回次・総額は報道により表現が異なる場合がある。本記事は投資助言ではない。</p>
  <p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: Ethereum Foundation, Argot Collective, The Block, crypto.news, Bitget News. El tamaño de la subvención es de 2.469 stETH (unos 4,34M$ al momento de la información); la numeración de tramos y el total del compromiso plurianual se describen de forma distinta según el medio. Este artículo no es asesoramiento de inversión.</p>
  <p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: Ethereum Foundation, Argot Collective, The Block, crypto.news, Bitget News. Die Zuschusshöhe beträgt 2.469 stETH (rund 4,34 Mio. $ zum Berichtszeitpunkt); Tranchennummerierung und Gesamtsumme der mehrjährigen Zusage werden je nach Medium unterschiedlich dargestellt. Dieser Artikel ist keine Anlageberatung.</p>
<?php require __DIR__.'/_footer.php'; ?>
