<?php $slug = 'patch-long-exit'; require __DIR__.'/_header.php'; ?>

  <p class="ko">안녕하세요. BTCtiming에서 알트코인 지표를 맡고 있는 <strong>Kai</strong>입니다. 오늘은 우리가 최근에 겪은, 조금 부끄럽지만 꼭 공유하고 싶은 이야기를 하나 하려고 합니다. 이더리움 점수 하나 때문에 지표 설계 전체를 다시 들여다보게 된 사건입니다.</p>
  <p class="en">Hi, I'm <strong>Kai</strong>, and I handle the altcoin indicators here at BTCtiming. Today I want to share a slightly embarrassing but important story — how a single Ethereum score made us rethink the entire scoring design.</p>
  <p class="ja">こんにちは。BTCtimingでアルトコイン指標を担当している<strong>Kai</strong>です。今日は少し恥ずかしいですが、ぜひ共有したい話をします。イーサリアムのスコア一つが、指標設計全体を見直すきっかけになった出来事です。</p>
  <p class="es">Hola, soy <strong>Kai</strong> y me encargo de los indicadores de altcoins en BTCtiming. Hoy quiero compartir una historia un poco vergonzosa pero importante: cómo una sola puntuación de Ethereum nos hizo replantear todo el diseño.</p>
  <p class="de">Hallo, ich bin <strong>Kai</strong> und betreue die Altcoin-Indikatoren bei BTCtiming. Heute erzähle ich eine etwas peinliche, aber wichtige Geschichte — wie ein einziger Ethereum-Wert uns das gesamte Bewertungsdesign überdenken ließ.</p>

  <div class="box ko">🩹 <strong>이번 패치 한 줄 요약:</strong> "롱 점수가 낮다 = 팔아라"라는 잘못된 등식을 걷어냈습니다. 낮은 롱 점수는 "지금 사기엔 매력이 약하다"는 뜻이지, "들고 있는 걸 던지라"는 뜻이 아닙니다.</div>
  <div class="box en">🩹 <strong>Patch in one line:</strong> We removed the false equation "low long score = sell." A low long score means "not an attractive place to buy right now," not "dump what you're holding."</div>
  <div class="box ja">🩹 <strong>今回のパッチ要約:</strong>「ロングスコアが低い＝売れ」という誤った等式を取り除きました。低いロングスコアは「今は買う魅力が弱い」という意味であって、「持っているものを投げろ」ではありません。</div>
  <div class="box es">🩹 <strong>Resumen del parche:</strong> Eliminamos la ecuación falsa "puntuación long baja = vender." Una puntuación long baja significa "no es un buen momento para comprar," no "vende lo que tienes."</div>
  <div class="box de">🩹 <strong>Patch in einem Satz:</strong> Wir haben die falsche Gleichung „niedriger Long-Score = verkaufen" entfernt. Ein niedriger Long-Score bedeutet „gerade kein attraktiver Kaufzeitpunkt", nicht „wirf ab, was du hältst".</div>

  <h2 class="ko">발단: 64% 폭락한 이더리움에 "일부 정리하라"고 뜬 화면</h2>
  <h2 class="en">The trigger: a screen telling us to "partially exit" an Ethereum down 64%</h2>
  <h2 class="ja">発端：64%暴落したイーサリアムに「一部売却」と表示された画面</h2>
  <h2 class="es">El detonante: una pantalla que decía "salir parcialmente" de un Ethereum caído un 64%</h2>
  <h2 class="de">Der Auslöser: ein Bildschirm, der bei einem 64% gefallenen Ethereum „teilweise verkaufen" anzeigte</h2>

  <p class="ko">어느 날 이더리움 카드를 보다가 이상한 걸 발견했습니다. 이더리움은 전고점 대비 <strong>64% 하락</strong>한 상태였고, 추정 실현가(200주 이동평균)보다도 28% 아래에 있었습니다. 누가 봐도 "많이 싸진" 상태였죠. 그런데 롱 점수가 <strong>4.9점</strong>이 나오면서 액션에는 <strong>"SPLIT EXIT — 일부 정리"</strong>가 떠 있었습니다. 쉽게 말해 "들고 있는 이더리움을 좀 팔아라"였습니다.</p>
  <p class="en">One day, looking at the Ethereum card, I noticed something odd. Ethereum was down <strong>64% from its all-time high</strong>, and sitting 28% below its estimated realized price (the 200-week moving average). By any measure, it had gotten "cheap." Yet the long score read <strong>4.9</strong>, and the action label said <strong>"SPLIT EXIT."</strong> In plain terms: "sell some of the Ethereum you're holding."</p>
  <p class="ja">ある日、イーサリアムのカードを見ていて奇妙なことに気づきました。イーサリアムは最高値から<strong>64%下落</strong>し、推定実現価格(200週移動平均)よりも28%下にありました。誰が見ても「かなり安く」なった状態です。ところがロングスコアは<strong>4.9点</strong>で、アクションには<strong>「SPLIT EXIT — 一部売却」</strong>と表示されていました。要するに「持っているイーサリアムを少し売れ」です。</p>
  <p class="es">Un día, mirando la tarjeta de Ethereum, noté algo extraño. Ethereum había caído un <strong>64% desde su máximo histórico</strong> y estaba un 28% por debajo de su precio realizado estimado (la media móvil de 200 semanas). Por cualquier medida, se había vuelto "barato." Sin embargo, la puntuación long marcaba <strong>4.9</strong>, y la acción decía <strong>"SPLIT EXIT."</strong> En pocas palabras: "vende parte de tu Ethereum."</p>
  <p class="de">Eines Tages fiel mir beim Betrachten der Ethereum-Karte etwas Seltsames auf. Ethereum war <strong>64% unter seinem Allzeithoch</strong> und lag 28% unter seinem geschätzten realisierten Preis (dem 200-Wochen-Durchschnitt). Nach jedem Maßstab war es „billig" geworden. Trotzdem zeigte der Long-Score <strong>4,9</strong> und die Aktion lautete <strong>„SPLIT EXIT."</strong> Im Klartext: „Verkaufe einen Teil deines Ethereums."</p>

  <p class="ko">뭔가 크게 잘못됐다는 느낌이 들었습니다. 64% 빠져서 바닥 근처인 코인한테 "더 팔아라"라니, 이건 상식적으로 이상하잖아요. 그래서 그 순간 같은 이더리움의 <strong>숏 점수</strong>도 같이 확인해봤습니다. 그랬더니 더 이상한 그림이 나왔습니다.</p>
  <p class="en">Something felt deeply wrong. Telling someone to "sell more" of a coin that's down 64% and near a bottom just defies common sense. So I checked the <strong>short score</strong> for the same Ethereum at that moment. And the picture got even stranger.</p>
  <p class="ja">何かが大きく間違っていると感じました。64%下落して底値付近のコインに「もっと売れ」というのは、常識的におかしいですよね。そこでその瞬間、同じイーサリアムの<strong>ショートスコア</strong>も確認してみました。すると、さらに奇妙な絵が見えてきました。</p>
  <p class="es">Algo estaba profundamente mal. Decirle a alguien que "venda más" de una moneda caída un 64% y cerca de un suelo simplemente desafía el sentido común. Así que revisé la <strong>puntuación short</strong> del mismo Ethereum en ese momento. Y el panorama se volvió aún más extraño.</p>
  <p class="de">Etwas fühlte sich zutiefst falsch an. Jemandem zu sagen, er solle „mehr verkaufen" von einer Münze, die 64% gefallen und nahe einem Boden ist, widerspricht dem gesunden Menschenverstand. Also prüfte ich den <strong>Short-Score</strong> desselben Ethereums. Und das Bild wurde noch seltsamer.</p>

  <h2 class="ko">모순의 발견: 롱은 "팔아라", 숏은 "바닥이다"</h2>
  <h2 class="en">The contradiction: long says "sell," short says "it's a bottom"</h2>
  <h2 class="ja">矛盾の発見：ロングは「売れ」、ショートは「底だ」</h2>
  <h2 class="es">La contradicción: long dice "vende," short dice "es un suelo"</h2>
  <h2 class="de">Der Widerspruch: Long sagt „verkaufen", Short sagt „es ist ein Boden"</h2>

  <div class="ko">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">같은 이더리움, 같은 순간 — 롱과 숏이 서로 모순</text>
    <g font-family="sans-serif">
      <text x="20" y="70" fill="#a3e635" font-size="12" font-weight="700">롱(매수) 점수</text>
      <rect x="20" y="80" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="80" width="215" height="26" fill="#f97316" rx="4"/>
      <text x="245" y="98" fill="#fff" font-size="12" font-weight="700">4.9 → "SPLIT EXIT (일부 정리 = 팔아라)"</text>

      <text x="20" y="140" fill="#f87171" font-size="12" font-weight="700">숏(매도) 점수</text>
      <rect x="20" y="150" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="150" width="158" height="26" fill="#22c55e" rx="4"/>
      <text x="188" y="168" fill="#fff" font-size="12" font-weight="700">3.6 → "EXIT SHORT (바닥이니 숏 청산)"</text>

      <text x="20" y="205" fill="#71717a" font-size="11">→ "바닥이라 숏을 접으라"면서 동시에 "롱을 팔라"고 함. 둘 다 맞을 수 없음.</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Same Ethereum, same moment — long and short contradict</text>
    <g font-family="sans-serif">
      <text x="20" y="70" fill="#a3e635" font-size="12" font-weight="700">LONG score</text>
      <rect x="20" y="80" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="80" width="215" height="26" fill="#f97316" rx="4"/>
      <text x="245" y="98" fill="#fff" font-size="12" font-weight="700">4.9 → "SPLIT EXIT (sell some)"</text>

      <text x="20" y="140" fill="#f87171" font-size="12" font-weight="700">SHORT score</text>
      <rect x="20" y="150" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="150" width="158" height="26" fill="#22c55e" rx="4"/>
      <text x="188" y="168" fill="#fff" font-size="12" font-weight="700">3.6 → "EXIT SHORT (bottom, cover)"</text>

      <text x="20" y="205" fill="#71717a" font-size="11">→ "It's a bottom, cover your short" AND "sell your long" at once. Both can't be right.</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">同じイーサリアム、同じ瞬間 — ロングとショートが矛盾</text>
    <g font-family="sans-serif">
      <text x="20" y="70" fill="#a3e635" font-size="12" font-weight="700">ロング スコア</text>
      <rect x="20" y="80" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="80" width="215" height="26" fill="#f97316" rx="4"/>
      <text x="245" y="98" fill="#fff" font-size="12" font-weight="700">4.9 → "SPLIT EXIT (一部売却)"</text>

      <text x="20" y="140" fill="#f87171" font-size="12" font-weight="700">ショート スコア</text>
      <rect x="20" y="150" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="150" width="158" height="26" fill="#22c55e" rx="4"/>
      <text x="188" y="168" fill="#fff" font-size="12" font-weight="700">3.6 → "EXIT SHORT (底・決済)"</text>

      <text x="20" y="205" fill="#71717a" font-size="11">→「底だからショートを閉じろ」と同時に「ロングを売れ」。両方は成立しない。</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Mismo Ethereum, mismo momento — long y short se contradicen</text>
    <g font-family="sans-serif">
      <text x="20" y="70" fill="#a3e635" font-size="12" font-weight="700">Puntuación LONG</text>
      <rect x="20" y="80" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="80" width="215" height="26" fill="#f97316" rx="4"/>
      <text x="245" y="98" fill="#fff" font-size="12" font-weight="700">4.9 → "SPLIT EXIT (vende algo)"</text>

      <text x="20" y="140" fill="#f87171" font-size="12" font-weight="700">Puntuación SHORT</text>
      <rect x="20" y="150" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="150" width="158" height="26" fill="#22c55e" rx="4"/>
      <text x="188" y="168" fill="#fff" font-size="12" font-weight="700">3.6 → "EXIT SHORT (suelo)"</text>

      <text x="20" y="205" fill="#71717a" font-size="11">→ "Es un suelo, cierra el short" Y "vende tu long" a la vez. Ambos no pueden ser correctos.</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 220" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Gleiches Ethereum, gleicher Moment — Long und Short widersprechen sich</text>
    <g font-family="sans-serif">
      <text x="20" y="70" fill="#a3e635" font-size="12" font-weight="700">LONG-Score</text>
      <rect x="20" y="80" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="80" width="215" height="26" fill="#f97316" rx="4"/>
      <text x="245" y="98" fill="#fff" font-size="12" font-weight="700">4,9 → "SPLIT EXIT (etwas verkaufen)"</text>

      <text x="20" y="140" fill="#f87171" font-size="12" font-weight="700">SHORT-Score</text>
      <rect x="20" y="150" width="440" height="26" fill="#27272a" rx="4"/>
      <rect x="20" y="150" width="158" height="26" fill="#22c55e" rx="4"/>
      <text x="188" y="168" fill="#fff" font-size="12" font-weight="700">3,6 → "EXIT SHORT (Boden)"</text>

      <text x="20" y="205" fill="#71717a" font-size="11">→ "Boden, Short schließen" UND "Long verkaufen" zugleich. Beides kann nicht stimmen.</text>
    </g>
  </svg>
  </div>

  <p class="ko">보시다시피 롱 점수는 "팔아라(SPLIT EXIT)"라고 하는데, 숏 점수는 "지금 바닥이니 숏을 청산하라(EXIT SHORT)"라고 하고 있었습니다. 바닥이라 숏을 접으라면서, 동시에 롱은 팔라니 — 이건 논리적으로 앞뒤가 안 맞습니다. 둘 중 하나는 분명히 틀린 겁니다.</p>
  <p class="en">As you can see, the long score said "sell (SPLIT EXIT)," while the short score said "this is a bottom, cover your short (EXIT SHORT)." Telling you to cover shorts because it's a bottom, while also telling you to sell your longs — that simply doesn't add up. One of them had to be wrong.</p>
  <p class="ja">ご覧の通り、ロングスコアは「売れ(SPLIT EXIT)」と言い、ショートスコアは「今は底だからショートを決済しろ(EXIT SHORT)」と言っていました。底だからショートを閉じろと言いながら、同時にロングを売れとは — 論理的に辻褄が合いません。どちらかが間違っているのです。</p>
  <p class="es">Como ven, la puntuación long decía "vende (SPLIT EXIT)," mientras la short decía "esto es un suelo, cierra tu short (EXIT SHORT)." Decir que cierres shorts porque es un suelo, mientras también dices que vendas tus longs — simplemente no cuadra. Una de las dos tenía que estar mal.</p>
  <p class="de">Wie Sie sehen, sagte der Long-Score „verkaufen (SPLIT EXIT)", während der Short-Score „das ist ein Boden, schließe deinen Short (EXIT SHORT)" sagte. Zu sagen, man solle Shorts schließen, weil es ein Boden ist, und gleichzeitig Longs verkaufen — das passt nicht zusammen. Eines von beiden musste falsch sein.</p>

  <h2 class="ko">원인: 점수 하나에 두 가지 뜻을 억지로 담고 있었다</h2>
  <h2 class="en">The cause: one score was forced to mean two different things</h2>
  <h2 class="ja">原因：一つのスコアに二つの意味を無理やり詰め込んでいた</h2>
  <h2 class="es">La causa: una puntuación forzada a significar dos cosas</h2>
  <h2 class="de">Die Ursache: ein Score musste zwei Dinge zugleich bedeuten</h2>

  <p class="ko">범인을 찾는 데는 오래 걸리지 않았습니다. 문제는 개별 지표 계산이 아니라 <strong>점수를 액션(행동 지시)으로 바꾸는 부분</strong>에 있었습니다. 당시 롱 점수의 구간 표는 이렇게 돼 있었습니다: 5점 이상은 관찰, <strong>3.5~5점은 "SPLIT EXIT(일부 정리)"</strong>, 3.5점 미만은 "EXIT LONG(청산)". 즉 <strong>롱 점수가 낮으면 무조건 "팔아라"로 해석</strong>하고 있었던 겁니다.</p>
  <p class="en">Finding the culprit didn't take long. The problem wasn't in the individual indicator math — it was in <strong>how the score was translated into an action</strong>. Back then, the long score bands looked like this: above 5 was watch, <strong>3.5–5 was "SPLIT EXIT,"</strong> below 3.5 was "EXIT LONG." In other words, <strong>a low long score was always read as "sell."</strong></p>
  <p class="ja">犯人を見つけるのに時間はかかりませんでした。問題は個別指標の計算ではなく、<strong>スコアをアクション(行動指示)に変換する部分</strong>にありました。当時のロングスコアの区分表はこうでした：5点以上は観察、<strong>3.5〜5点は「SPLIT EXIT(一部売却)」</strong>、3.5点未満は「EXIT LONG(決済)」。つまり<strong>ロングスコアが低いと必ず「売れ」と解釈</strong>していたのです。</p>
  <p class="es">Encontrar al culpable no tomó mucho. El problema no estaba en el cálculo de los indicadores — estaba en <strong>cómo se traducía la puntuación en una acción</strong>. Entonces, las bandas de la puntuación long eran así: arriba de 5 era observar, <strong>3.5–5 era "SPLIT EXIT,"</strong> abajo de 3.5 era "EXIT LONG." Es decir, <strong>una puntuación long baja siempre se leía como "vender."</strong></p>
  <p class="de">Den Übeltäter zu finden dauerte nicht lange. Das Problem lag nicht in der Berechnung der Indikatoren — sondern darin, <strong>wie der Score in eine Aktion übersetzt wurde</strong>. Damals sahen die Long-Score-Bänder so aus: über 5 war beobachten, <strong>3,5–5 war „SPLIT EXIT",</strong> unter 3,5 war „EXIT LONG." Mit anderen Worten: <strong>ein niedriger Long-Score wurde immer als „verkaufen" gelesen.</strong></p>

  <p class="ko">여기서 핵심을 놓치고 있었습니다. <strong>"지금 사기 나쁘다"와 "지금 팔아야 한다"는 완전히 다른 이야기입니다.</strong> 이더리움은 실현가 근처까지 내려온, "지금 신규로 진입하기엔 아주 매력적이진 않지만 그렇다고 팔 이유는 전혀 없는" 상태였습니다. 그런데 점수 체계는 "매수 매력이 약함"을 곧바로 "매도 신호"로 번역해버린 거죠. 매도 판단은 원래 <strong>숏 점수</strong>가 담당해야 하는데, 롱 점수가 그 일까지 억지로 하고 있었습니다.</p>
  <p class="en">Here's the key thing we were missing. <strong>"A bad time to buy" and "time to sell" are completely different statements.</strong> Ethereum had dropped near its realized price — "not especially attractive for a fresh entry, but with no reason at all to sell." Yet the scoring system translated "weak buy appeal" straight into a "sell signal." Selling decisions should belong to the <strong>short score</strong>, but the long score was being forced to do that job too.</p>
  <p class="ja">ここで核心を見落としていました。<strong>「今は買いに悪い」と「今は売るべき」はまったく別の話です。</strong>イーサリアムは実現価格付近まで下がった、「新規参入するには特別魅力的ではないが、売る理由は全くない」状態でした。ところがスコア体系は「買い魅力が弱い」をそのまま「売りシグナル」に翻訳していたのです。売却判断は本来<strong>ショートスコア</strong>が担うべきなのに、ロングスコアがその仕事まで無理にやっていました。</p>
  <p class="es">Aquí está lo que se nos escapaba. <strong>"Mal momento para comprar" y "momento de vender" son afirmaciones completamente distintas.</strong> Ethereum había bajado cerca de su precio realizado — "no especialmente atractivo para entrar, pero sin razón alguna para vender." Sin embargo, el sistema traducía "poco atractivo de compra" directamente en "señal de venta." La decisión de vender debería pertenecer a la <strong>puntuación short</strong>, pero la long estaba forzada a hacer también ese trabajo.</p>
  <p class="de">Hier lag unser Denkfehler. <strong>„Ein schlechter Zeitpunkt zum Kaufen" und „Zeit zu verkaufen" sind völlig verschiedene Aussagen.</strong> Ethereum war nahe seinen realisierten Preis gefallen — „nicht besonders attraktiv für einen Einstieg, aber ohne jeden Grund zu verkaufen." Doch das System übersetzte „schwacher Kaufreiz" direkt in ein „Verkaufssignal." Verkaufsentscheidungen sollten zum <strong>Short-Score</strong> gehören, aber der Long-Score musste diese Aufgabe mitübernehmen.</p>

  <h2 class="ko">수정: 롱 점수의 낮은 구간을 다시 정의하다</h2>
  <h2 class="en">The fix: redefining the low end of the long score</h2>
  <h2 class="ja">修正：ロングスコアの低い区間を再定義</h2>
  <h2 class="es">La solución: redefinir la parte baja de la puntuación long</h2>
  <h2 class="de">Die Lösung: das untere Ende des Long-Scores neu definieren</h2>

  <p class="ko">그래서 롱 점수의 액션을 이렇게 다시 나눴습니다. 롱은 <strong>"진입 매력 ↔ 익절 신호"라는 하나의 축</strong>으로 보되, 낮은 점수가 "왜 낮은지"를 구분하게 했습니다. 단순히 저평가가 아니라서 낮은 거라면 <strong>"관망/진입 보류"</strong>이고, 실제로 고평가·과열이라 낮은 거라면 그때 비로소 <strong>"분할 익절"</strong>입니다.</p>
  <p class="en">So we re-split the long score's actions. We keep the long score as <strong>a single axis: "entry appeal ↔ profit-taking signal,"</strong> but we made the low end distinguish <strong>why</strong> it's low. If it's low simply because it isn't cheap, that's <strong>"watch / hold off on entry."</strong> If it's low because the coin is genuinely overvalued and overheated, only then is it <strong>"take partial profit."</strong></p>
  <p class="ja">そこでロングスコアのアクションをこう分け直しました。ロングは<strong>「参入魅力 ↔ 利確シグナル」という一つの軸</strong>として見つつ、低いスコアが「なぜ低いか」を区別させました。単に割安でないから低いなら<strong>「様子見/参入保留」</strong>、実際に割高・過熱で低いなら初めて<strong>「分割利確」</strong>です。</p>
  <p class="es">Así que redividimos las acciones del long. Mantenemos el long como <strong>un solo eje: "atractivo de entrada ↔ señal de toma de ganancias,"</strong> pero hicimos que la parte baja distinga <strong>por qué</strong> es baja. Si es baja simplemente porque no está barato, eso es <strong>"observar / esperar."</strong> Si es baja porque está genuinamente sobrevalorado y sobrecalentado, solo entonces es <strong>"toma de ganancias parcial."</strong></p>
  <p class="de">Also teilten wir die Aktionen des Long-Scores neu auf. Wir behalten den Long-Score als <strong>eine einzige Achse: „Einstiegsreiz ↔ Gewinnmitnahme-Signal",</strong> ließen aber das untere Ende unterscheiden, <strong>warum</strong> es niedrig ist. Ist es niedrig, weil es einfach nicht billig ist, heißt das <strong>„beobachten / Einstieg abwarten."</strong> Ist es niedrig, weil die Münze wirklich überbewertet und überhitzt ist, erst dann heißt es <strong>„Teilgewinn mitnehmen."</strong></p>

  <p class="ko">그리고 여기서 한 가지를 더 배웠습니다. <strong>롱을 정리할 시점이 곧 숏을 잡을 시점은 아니라는 것</strong>입니다. 고평가가 시작돼서 롱 익절을 고민할 무렵에도, 숏은 아직 "확실히 꺾였다"는 확인이 필요합니다. 그래서 롱 익절이 뜨는 지점과 숏 진입이 뜨는 지점을 서로 어긋나게 배치했습니다. 그 사이에는 "롱은 익절, 숏은 아직 관찰"이라는 중간지대가 생깁니다. 이게 실제 트레이딩 감각에 훨씬 가깝습니다.</p>
  <p class="en">And we learned one more thing here: <strong>the moment to trim a long is not the same as the moment to open a short.</strong> When overvaluation begins and you start thinking about taking long profits, a short still needs confirmation that the trend has truly rolled over. So we deliberately offset the point where "trim long" appears from the point where "enter short" appears. In between sits a middle zone: "trim your long, but only watch for a short." That's far closer to how trading actually feels.</p>
  <p class="ja">そしてここでもう一つ学びました。<strong>ロングを整理する時点が、そのままショートを取る時点ではない</strong>ということです。割高が始まりロング利確を考える頃でも、ショートはまだ「確実に崩れた」という確認が必要です。そこでロング利確が出る地点とショート参入が出る地点をあえてずらして配置しました。その間には「ロングは利確、ショートはまだ観察」という中間地帯が生まれます。これが実際のトレード感覚にずっと近いのです。</p>
  <p class="es">Y aquí aprendimos algo más: <strong>el momento de recortar un long no es el mismo que el de abrir un short.</strong> Cuando empieza la sobrevaloración y piensas en tomar ganancias del long, un short todavía necesita confirmación de que la tendencia realmente se giró. Así que separamos deliberadamente el punto donde aparece "recortar long" del punto donde aparece "entrar short." En medio queda una zona: "recorta tu long, pero solo observa para un short." Eso se acerca mucho más a cómo se siente operar.</p>
  <p class="de">Und wir lernten noch etwas: <strong>der Moment, einen Long zu reduzieren, ist nicht derselbe wie der, einen Short zu eröffnen.</strong> Wenn die Überbewertung beginnt und man über Long-Gewinne nachdenkt, braucht ein Short noch die Bestätigung, dass der Trend wirklich gedreht hat. Also verschoben wir bewusst den Punkt, an dem „Long reduzieren" erscheint, gegenüber dem Punkt, an dem „Short eröffnen" erscheint. Dazwischen liegt eine Zone: „reduziere deinen Long, aber beobachte nur für einen Short." Das kommt dem echten Trading-Gefühl viel näher.</p>

  <h2 class="ko">결과</h2>
  <h2 class="en">The result</h2>
  <h2 class="ja">結果</h2>
  <h2 class="es">El resultado</h2>
  <h2 class="de">Das Ergebnis</h2>

  <p class="ko">패치 후 그 이더리움을 다시 보니, 롱 점수는 여전히 5점대였지만 액션은 <strong>"HOLD(관망)"</strong>으로 바뀌었습니다. "지금 신규로 크게 담기엔 애매하지만, 들고 있다면 굳이 팔 이유는 없다"는, 처음부터 나왔어야 할 메시지입니다. 그리고 숏이 "바닥"이라고 말하는 것과도 더 이상 충돌하지 않습니다. 이제 <strong>매도·청산 신호는 오로지 숏 점수가</strong>, <strong>매수·익절 판단은 롱 점수가</strong> 각자의 자리에서 담당합니다.</p>
  <p class="en">After the patch, that same Ethereum still scored in the 5s, but its action changed to <strong>"HOLD."</strong> "Not a compelling spot to load up fresh, but no reason to sell if you're holding" — the message that should have shown from the start. And it no longer clashes with the short score saying "bottom." Now <strong>sell/exit signals come solely from the short score,</strong> and <strong>buy/profit-taking from the long score</strong> — each in its own lane.</p>
  <p class="ja">パッチ後、その同じイーサリアムを再び見ると、ロングスコアは依然5点台でしたが、アクションは<strong>「HOLD(様子見)」</strong>に変わりました。「今、新規で大きく仕込むには微妙だが、持っているなら売る理由はない」という、最初から出るべきだったメッセージです。そしてショートが「底」と言うことともう衝突しません。今や<strong>売り・決済シグナルはショートスコアのみが</strong>、<strong>買い・利確判断はロングスコアが</strong>それぞれの持ち場で担当します。</p>
  <p class="es">Tras el parche, ese mismo Ethereum seguía puntuando en los 5, pero su acción cambió a <strong>"HOLD."</strong> "No es un punto convincente para cargar de nuevo, pero sin razón para vender si lo tienes" — el mensaje que debió aparecer desde el principio. Y ya no choca con el short diciendo "suelo." Ahora <strong>las señales de venta/salida vienen solo de la puntuación short,</strong> y <strong>las de compra/ganancias de la long</strong> — cada una en su carril.</p>
  <p class="de">Nach dem Patch bewertete dasselbe Ethereum immer noch im 5er-Bereich, aber seine Aktion wechselte zu <strong>„HOLD."</strong> „Kein überzeugender Punkt zum Nachladen, aber kein Grund zu verkaufen, wenn man hält" — die Botschaft, die von Anfang an hätte erscheinen sollen. Und sie kollidiert nicht mehr mit dem Short, der „Boden" sagt. Jetzt kommen <strong>Verkaufs-/Ausstiegssignale allein vom Short-Score</strong> und <strong>Kauf-/Gewinnmitnahme vom Long-Score</strong> — jeder in seiner Spur.</p>

  <div class="box ko">📝 <strong>Kai의 메모:</strong> 이 사건이 우리한테 남긴 교훈은 "지표 숫자가 맞느냐"보다 "그 숫자를 사람에게 어떤 말로 전하느냐"가 똑같이 중요하다는 것이었습니다. 4.9라는 점수 자체는 틀리지 않았습니다. 그걸 "팔아라"로 번역한 게 틀렸던 거죠. 앞으로도 이런 번역의 실수를 발견하면 숨기지 않고 여기 패치노트에 남기겠습니다.</div>
  <div class="box en">📝 <strong>Kai's note:</strong> The lesson this left us with is that "is the number right" matters just as much as "what words do we use to tell a human that number." The 4.9 itself wasn't wrong. Translating it into "sell" was. Whenever we catch a translation mistake like this, we'll leave it here in the patch notes rather than hide it.</div>
  <div class="box ja">📝 <strong>Kaiのメモ:</strong> この出来事が残した教訓は、「指標の数字が正しいか」と同じくらい「その数字を人にどんな言葉で伝えるか」が重要だということでした。4.9というスコア自体は間違っていません。それを「売れ」と翻訳したのが間違いでした。今後もこうした翻訳のミスを見つけたら、隠さずここパッチノートに残します。</div>
  <div class="box es">📝 <strong>Nota de Kai:</strong> La lección que nos dejó es que "¿es correcto el número?" importa tanto como "¿con qué palabras se lo decimos a una persona?" El 4.9 no estaba mal. Traducirlo como "vender" sí. Cada vez que detectemos un error de traducción así, lo dejaremos aquí en las notas del parche en vez de ocultarlo.</div>
  <div class="box de">📝 <strong>Kais Notiz:</strong> Die Lektion war, dass „stimmt die Zahl" genauso wichtig ist wie „mit welchen Worten sagen wir sie einem Menschen." Die 4,9 selbst war nicht falsch. Sie als „verkaufen" zu übersetzen schon. Wann immer wir so einen Übersetzungsfehler finden, lassen wir ihn hier in den Patch Notes, statt ihn zu verstecken.</div>

  <p class="ko" style="margin-top:32px;color:#71717a;font-size:14px">— Kai, BTCtiming 알트코인 지표 담당</p>
  <p class="en" style="margin-top:32px;color:#71717a;font-size:14px">— Kai, Altcoin Indicators, BTCtiming</p>
  <p class="ja" style="margin-top:32px;color:#71717a;font-size:14px">— Kai, BTCtiming アルトコイン指標担当</p>
  <p class="es" style="margin-top:32px;color:#71717a;font-size:14px">— Kai, Indicadores de Altcoins, BTCtiming</p>
  <p class="de" style="margin-top:32px;color:#71717a;font-size:14px">— Kai, Altcoin-Indikatoren, BTCtiming</p>

<?php require __DIR__.'/_footer.php'; ?>
