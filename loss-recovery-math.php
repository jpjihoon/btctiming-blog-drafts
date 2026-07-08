<?php $slug = 'loss-recovery-math'; require __DIR__.'/_header.php'; ?>

<p class="ko">퀴즈 하나 낼게요. 100만 원이 -50% 하락해서 50만 원이 됐어요. 다시 100만 원으로 돌아오려면 몇 % 올라야 할까요? 직관적으로 "+50%"라고 답하기 쉬운데, 정답은 <strong>+100%</strong>예요. 50만 원의 100%가 딱 50만 원이니까, 원금 100만 원을 채우려면 정확히 두 배가 필요합니다.</p>
  <p class="en">Quick quiz. $1,000 drops -50% to $500. What percentage gain gets it back to $1,000? The intuitive answer is "+50%" — the actual answer is <strong>+100%</strong>. 100% of $500 is exactly $500, so getting back to the original $1,000 requires exactly doubling it.</p>

  <p class="ko">이거 다들 머리로는 알아요. 근데 실제로 -30%, -40% 하락 구간에서 "이 정도면 금방 회복하겠지"라고 생각하는 걸 보면, 이 비대칭이 몸으로는 잘 안 와닿는 것 같더라고요. 그래서 곡선을 직접 그려봤어요.</p>
  <p class="en">Everyone knows this intellectually. Yet watching people assume "this'll bounce back quickly" during a -30% or -40% drawdown, the asymmetry clearly doesn't register intuitively. So I plotted the curve.</p>
  <p class="ja">これは皆頭では分かっています。しかし実際に-30%、-40%の下落区間で「これくらいならすぐ回復するだろう」と考える様子を見ると、この非対称性が体感としてはうまく伝わっていないようです。そこでグラフを実際に描いてみました。</p>

  <p class="es">Pregunta rápida. $1,000 cae -50% a $500. ¿Qué porcentaje de ganancia lo devuelve a $1,000? La respuesta intuitiva es "+50%" — la respuesta real es <strong>+100%</strong>. El 100% de $500 es exactamente $500, así que volver a los $1,000 originales requiere exactamente duplicarlo.</p>
  <p class="de">Schnelles Quiz. $1.000 fallen um -50% auf $500. Welcher prozentuale Gewinn bringt es zurück auf $1.000? Die intuitive Antwort ist "+50%" — die tatsächliche Antwort ist <strong>+100%</strong>. 100% von $500 sind genau $500, also erfordert die Rückkehr zu den ursprünglichen $1.000 genau eine Verdoppelung.</p>
  <p class="fr">Petit quiz. 1 000 $ chutent de -50 % à 500 $. Quel pourcentage de gain permet de revenir à 1 000 $ ? La réponse intuitive est « +50 % » — la réponse réelle est <strong>+100 %</strong>. 100 % de 500 $, c'est exactement 500 $, donc pour retrouver les 1 000 $ de départ, il faut exactement doubler la somme.</p>
  <p class="pt">Um teste rápido. 1.000 dólares caem -50% para 500 dólares. Que percentual de ganho é necessário para voltar a 1.000 dólares? A resposta intuitiva é "+50%" — a resposta real é <strong>+100%</strong>. 100% de 500 dólares são exatamente 500 dólares, então voltar aos 1.000 dólares originais exige exatamente dobrar o valor.</p>
  <p class="tr">Küçük bir test. 1.000 dolar %-50 düşüp 500 dolara iniyor. Tekrar 1.000 dolara dönmek için yüzde kaç kazanç gerekir? Sezgisel yanıt "%+50" gibi görünür — gerçek yanıt ise <strong>%+100</strong>'dür. 500 doların yüzde 100'ü tam olarak 500 dolardır, yani başlangıçtaki 1.000 dolara dönmek tam olarak iki katına çıkmayı gerektirir.</p>
  <p class="vi">Một câu đố nhanh. 1.000 đô la giảm -50% xuống còn 500 đô la. Cần tăng bao nhiêu phần trăm để quay lại 1.000 đô la? Câu trả lời trực giác thường là "+50%" — nhưng câu trả lời thực tế là <strong>+100%</strong>. 100% của 500 đô la chính xác là 500 đô la, nên để quay về 1.000 đô la ban đầu, cần tăng gấp đôi chính xác.</p>
  <p class="es">Todo el mundo sabe esto intelectualmente. Sin embargo, al ver a la gente asumir "esto rebotará rápido" durante un drawdown de -30% o -40%, la asimetría claramente no se registra intuitivamente. Así que grafiqué la curva.</p>
  <p class="de">Jeder weiß das intellektuell. Doch beobachtet man, wie Menschen bei einem Drawdown von -30% oder -40% annehmen "das erholt sich schnell wieder", registriert sich die Asymmetrie eindeutig nicht intuitiv. Also habe ich die Kurve gezeichnet.</p>
  <p class="fr">Tout le monde le sait intellectuellement. Pourtant, en observant les gens supposer « ça va vite remonter » pendant un repli de -30 % ou -40 %, on voit bien que cette asymétrie ne s'impose pas intuitivement. J'ai donc tracé la courbe.</p>
  <p class="pt">Todo mundo sabe disso racionalmente. No entanto, ao ver as pessoas presumirem que "isso vai se recuperar rápido" durante uma queda de -30% ou -40%, fica claro que essa assimetria não é percebida intuitivamente. Por isso, tracei a curva.</p>
  <p class="tr">Herkes bunu aklen bilir. Ama insanların %-30 ya da %-40'lık bir düşüş sırasında "bu çok geçmeden toparlanır" diye düşündüğünü görünce, bu asimetrinin sezgisel olarak hiç de kavranmadığı ortaya çıkıyor. Bu yüzden eğriyi çizdim.</p>
  <p class="vi">Ai cũng biết điều này về mặt lý thuyết. Nhưng khi thấy mọi người cho rằng "chắc sẽ hồi phục nhanh thôi" trong một đợt giảm -30% hay -40%, rõ ràng sự bất đối xứng này không được cảm nhận một cách trực giác. Vì vậy tôi đã vẽ đường cong này ra.</p>

  <div class="ko">
  <svg viewBox="0 0 700 340" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">하락폭 vs 원금 회복에 필요한 상승폭</text>
    <line x1="60" y1="280" x2="670" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <line x1="60" y1="30" x2="60" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <text x="10" y="285" fill="#71717a" font-size="10">0%</text>
    <text x="10" y="160" fill="#71717a" font-size="10">200%</text>
    <text x="10" y="40" fill="#71717a" font-size="10">400%+</text>
    <path d="M 60 280 L 150 268 L 240 250 L 330 220 L 390 190 L 440 150 L 480 110 L 520 65 L 550 35" fill="none" stroke="#f87171" stroke-width="3"/>
    <circle cx="150" cy="268" r="4" fill="#4ade80"/>
    <text x="150" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-10%</text>
    <text x="150" y="255" fill="#4ade80" font-size="10" text-anchor="middle">+11%</text>

    <circle cx="330" cy="220" r="4" fill="#facc15"/>
    <text x="330" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-30%</text>
    <text x="330" y="207" fill="#facc15" font-size="10" text-anchor="middle">+43%</text>

    <circle cx="440" cy="150" r="4" fill="#fb923c"/>
    <text x="440" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-50%</text>
    <text x="440" y="137" fill="#fb923c" font-size="10" text-anchor="middle">+100%</text>

    <circle cx="520" cy="65" r="4" fill="#f87171"/>
    <text x="520" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-70%</text>
    <text x="520" y="52" fill="#f87171" font-size="10" text-anchor="middle">+233%</text>

    <circle cx="550" cy="35" r="4" fill="#ef4444"/>
    <text x="565" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-73%</text>
    <text x="600" y="30" fill="#ef4444" font-size="10" text-anchor="middle">+270%</text>
  </svg>
  </div>
  <div class="en fr pt tr vi">
  <svg viewBox="0 0 700 340" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Drawdown vs Gain Needed to Break Even</text>
    <line x1="60" y1="280" x2="670" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <line x1="60" y1="30" x2="60" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <text x="10" y="285" fill="#71717a" font-size="10">0%</text>
    <text x="10" y="160" fill="#71717a" font-size="10">200%</text>
    <text x="10" y="40" fill="#71717a" font-size="10">400%+</text>
    <path d="M 60 280 L 150 268 L 240 250 L 330 220 L 390 190 L 440 150 L 480 110 L 520 65 L 550 35" fill="none" stroke="#f87171" stroke-width="3"/>
    <circle cx="150" cy="268" r="4" fill="#4ade80"/>
    <text x="150" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-10%</text>
    <text x="150" y="255" fill="#4ade80" font-size="10" text-anchor="middle">+11%</text>

    <circle cx="330" cy="220" r="4" fill="#facc15"/>
    <text x="330" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-30%</text>
    <text x="330" y="207" fill="#facc15" font-size="10" text-anchor="middle">+43%</text>

    <circle cx="440" cy="150" r="4" fill="#fb923c"/>
    <text x="440" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-50%</text>
    <text x="440" y="137" fill="#fb923c" font-size="10" text-anchor="middle">+100%</text>

    <circle cx="520" cy="65" r="4" fill="#f87171"/>
    <text x="520" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-70%</text>
    <text x="520" y="52" fill="#f87171" font-size="10" text-anchor="middle">+233%</text>

    <circle cx="550" cy="35" r="4" fill="#ef4444"/>
    <text x="565" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-73%</text>
    <text x="600" y="30" fill="#ef4444" font-size="10" text-anchor="middle">+270%</text>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 340" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">下落幅 vs 元本回復に必要な上昇幅</text>
    <line x1="60" y1="280" x2="670" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <line x1="60" y1="30" x2="60" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <text x="10" y="285" fill="#71717a" font-size="10">0%</text>
    <text x="10" y="160" fill="#71717a" font-size="10">200%</text>
    <text x="10" y="40" fill="#71717a" font-size="10">400%+</text>
    <path d="M 60 280 L 150 268 L 240 250 L 330 220 L 390 190 L 440 150 L 480 110 L 520 65 L 550 35" fill="none" stroke="#f87171" stroke-width="3"/>
    <circle cx="150" cy="268" r="4" fill="#4ade80"/>
    <text x="150" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-10%</text>
    <text x="150" y="255" fill="#4ade80" font-size="10" text-anchor="middle">+11%</text>

    <circle cx="330" cy="220" r="4" fill="#facc15"/>
    <text x="330" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-30%</text>
    <text x="330" y="207" fill="#facc15" font-size="10" text-anchor="middle">+43%</text>

    <circle cx="440" cy="150" r="4" fill="#fb923c"/>
    <text x="440" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-50%</text>
    <text x="440" y="137" fill="#fb923c" font-size="10" text-anchor="middle">+100%</text>

    <circle cx="520" cy="65" r="4" fill="#f87171"/>
    <text x="520" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-70%</text>
    <text x="520" y="52" fill="#f87171" font-size="10" text-anchor="middle">+233%</text>

    <circle cx="550" cy="35" r="4" fill="#ef4444"/>
    <text x="565" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-73%</text>
    <text x="600" y="30" fill="#ef4444" font-size="10" text-anchor="middle">+270%</text>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 340" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Caída vs Ganancia Necesaria para Recuperar</text>
    <line x1="60" y1="280" x2="670" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <line x1="60" y1="30" x2="60" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <text x="10" y="285" fill="#71717a" font-size="10">0%</text>
    <text x="10" y="160" fill="#71717a" font-size="10">200%</text>
    <text x="10" y="40" fill="#71717a" font-size="10">400%+</text>
    <path d="M 60 280 L 150 268 L 240 250 L 330 220 L 390 190 L 440 150 L 480 110 L 520 65 L 550 35" fill="none" stroke="#f87171" stroke-width="3"/>
    <circle cx="150" cy="268" r="4" fill="#4ade80"/>
    <text x="150" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-10%</text>
    <text x="150" y="255" fill="#4ade80" font-size="10" text-anchor="middle">+11%</text>

    <circle cx="330" cy="220" r="4" fill="#facc15"/>
    <text x="330" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-30%</text>
    <text x="330" y="207" fill="#facc15" font-size="10" text-anchor="middle">+43%</text>

    <circle cx="440" cy="150" r="4" fill="#fb923c"/>
    <text x="440" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-50%</text>
    <text x="440" y="137" fill="#fb923c" font-size="10" text-anchor="middle">+100%</text>

    <circle cx="520" cy="65" r="4" fill="#f87171"/>
    <text x="520" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-70%</text>
    <text x="520" y="52" fill="#f87171" font-size="10" text-anchor="middle">+233%</text>

    <circle cx="550" cy="35" r="4" fill="#ef4444"/>
    <text x="565" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-73%</text>
    <text x="600" y="30" fill="#ef4444" font-size="10" text-anchor="middle">+270%</text>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 340" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="26" fill="#fafafa" font-size="13" font-weight="700" font-family="sans-serif">Rückgang vs Benötigter Gewinn zum Ausgleich</text>
    <line x1="60" y1="280" x2="670" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <line x1="60" y1="30" x2="60" y2="280" stroke="#3f3f46" stroke-width="1"/>
    <text x="10" y="285" fill="#71717a" font-size="10">0%</text>
    <text x="10" y="160" fill="#71717a" font-size="10">200%</text>
    <text x="10" y="40" fill="#71717a" font-size="10">400%+</text>
    <path d="M 60 280 L 150 268 L 240 250 L 330 220 L 390 190 L 440 150 L 480 110 L 520 65 L 550 35" fill="none" stroke="#f87171" stroke-width="3"/>
    <circle cx="150" cy="268" r="4" fill="#4ade80"/>
    <text x="150" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-10%</text>
    <text x="150" y="255" fill="#4ade80" font-size="10" text-anchor="middle">+11%</text>

    <circle cx="330" cy="220" r="4" fill="#facc15"/>
    <text x="330" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-30%</text>
    <text x="330" y="207" fill="#facc15" font-size="10" text-anchor="middle">+43%</text>

    <circle cx="440" cy="150" r="4" fill="#fb923c"/>
    <text x="440" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-50%</text>
    <text x="440" y="137" fill="#fb923c" font-size="10" text-anchor="middle">+100%</text>

    <circle cx="520" cy="65" r="4" fill="#f87171"/>
    <text x="520" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-70%</text>
    <text x="520" y="52" fill="#f87171" font-size="10" text-anchor="middle">+233%</text>

    <circle cx="550" cy="35" r="4" fill="#ef4444"/>
    <text x="565" y="300" fill="#a1a1aa" font-size="10" text-anchor="middle">-73%</text>
    <text x="600" y="30" fill="#ef4444" font-size="10" text-anchor="middle">+270%</text>
  </svg>
  </div>

  <p class="ko">곡선을 보면 확 와닿아요. -10%는 +11%면 회복되니까 거의 대칭에 가까워요. 근데 -50%를 넘어가면 곡선이 완전히 꺾여서 치솟습니다. -70%는 +233%가 필요하고, 2018년 비트코인의 -73% 하락은 원금 회복에 <strong>+270%</strong>가 필요했어요.</p>
  <p class="en">The curve makes it click instantly. At -10%, you only need +11% — nearly symmetric. Past -50%, though, the curve bends sharply upward. A -70% drawdown needs +233%. Bitcoin's -73% drop in 2018 needed <strong>+270%</strong> just to break even.</p>
  <p class="ja">グラフを見ると一目瞭然です。-10%は+11%で回復するので、ほぼ対称に近いです。しかし-50%を超えると曲線が完全に折れて急上昇します。-70%は+233%が必要で、2018年のビットコインの-73%下落は元本回復に<strong>+270%</strong>が必要でした。</p>

  <p class="es">La curva lo hace evidente al instante. En -10%, solo necesitas +11% — casi simétrico. Pasando -50%, sin embargo, la curva se dobla bruscamente hacia arriba. Un drawdown de -70% necesita +233%. La caída de -73% de Bitcoin en 2018 necesitó <strong>+270%</strong> solo para recuperar el equilibrio.</p>
  <p class="de">Die Kurve macht es sofort klar. Bei -10% brauchst du nur +11% — fast symmetrisch. Über -50% hinaus biegt sich die Kurve jedoch scharf nach oben. Ein Drawdown von -70% braucht +233%. Bitcoins -73%-Rückgang 2018 brauchte <strong>+270%</strong>, nur um den Ausgleich zu schaffen.</p>
  <p class="fr">La courbe rend la chose limpide instantanément. À -10 %, il ne faut que +11 % — presque symétrique. Mais au-delà de -50 %, la courbe s'infléchit brutalement vers le haut. Un repli de -70 % exige +233 %. La chute de -73 % du Bitcoin en 2018 a nécessité <strong>+270 %</strong> rien que pour revenir à l'équilibre.</p>
  <p class="pt">O gráfico deixa isso evidente na hora. Em -10%, basta +11% — quase simétrico. Mas, passando de -50%, a curva se inclina bruscamente para cima. Uma queda de -70% exige +233%. A queda de -73% do Bitcoin em 2018 exigiu <strong>+270%</strong> só para voltar ao ponto de equilíbrio.</p>
  <p class="tr">Grafik durumu anında netleştiriyor. %-10'da sadece %+11 yeterli — neredeyse simetrik. Ama %-50'yi geçince eğri sertçe yukarı kıvrılıyor. %-70'lik bir düşüş %+233 gerektiriyor. Bitcoin'in 2018'deki %-73'lük düşüşü, sadece başa baş noktasına dönmek için <strong>%+270</strong> gerektirdi.</p>
  <p class="vi">Biểu đồ khiến mọi thứ trở nên rõ ràng ngay lập tức. Ở mức -10%, chỉ cần +11% là gần như đối xứng. Nhưng qua mốc -50%, đường cong bẻ ngoặt lên rất mạnh. Mức giảm -70% cần +233%. Cú giảm -73% của Bitcoin năm 2018 cần tới <strong>+270%</strong> chỉ để hòa vốn.</p>

  <h2 class="ko">왜 이게 심리적으로 중요한가</h2>
  <h2 class="en">Why this matters psychologically</h2>
  <h2 class="ja">なぜこれが心理的に重要なのか</h2>
  <h2 class="es">Por Qué Esto Importa Psicológicamente</h2>
  <h2 class="de">Warum das psychologisch wichtig ist</h2>
  <h2 class="fr">Pourquoi cela compte sur le plan psychologique</h2>
  <h2 class="pt">Por que isso importa psicologicamente</h2>
  <h2 class="tr">Bunun psikolojik açıdan neden önemli olduğu</h2>
  <h2 class="vi">Vì sao điều này quan trọng về mặt tâm lý</h2>
  <p class="ko">이 비대칭을 몸으로 느끼지 못하면 두 가지 실수를 하게 돼요. 하나는 하락 초반에 "조금만 더 버티면 금방 복구되겠지"라며 리스크 관리를 미루는 것. 초반 -10~20% 구간은 실제로 회복이 쉬운 편이라 이 착각이 강화되는데, 하락이 -40%를 넘는 순간부터는 완전히 다른 게임이 됩니다.</p>
  <p class="en">Not internalizing this asymmetry leads to two mistakes. One is delaying risk management early in a drawdown, thinking "just hold a bit longer, it'll bounce back." The -10% to -20% range genuinely does recover easily, reinforcing the illusion — but the moment a drawdown crosses -40%, it becomes an entirely different game.</p>
  <p class="ja">この非対称性を体感できていないと、2つの間違いを犯します。一つは下落初期に「もう少し耐えればすぐ回復するだろう」とリスク管理を先延ばしにすることです。初期の-10〜20%区間は実際に回復しやすいため、この錯覚が強化されますが、下落が-40%を超えた瞬間からはまったく別のゲームになります。</p>

  <p class="es">No internalizar esta asimetría lleva a dos errores. Uno es retrasar la gestión de riesgo temprano en un drawdown, pensando "solo aguanta un poco más, se recuperará." El rango de -10% a -20% realmente se recupera con facilidad, reforzando la ilusión — pero en el momento en que un drawdown cruza -40%, se convierte en un juego completamente diferente.</p>
  <p class="de">Diese Asymmetrie nicht zu verinnerlichen führt zu zwei Fehlern. Einer ist, das Risikomanagement früh in einem Drawdown zu verzögern, in dem Gedanken "halt einfach noch etwas länger durch, es erholt sich wieder." Der Bereich von -10% bis -20% erholt sich tatsächlich leicht, was die Illusion verstärkt — aber sobald ein Drawdown -40% überschreitet, wird es ein völlig anderes Spiel.</p>
  <p class="fr">Ne pas intégrer cette asymétrie mène à deux erreurs. La première consiste à retarder la gestion du risque au début d'un repli, en se disant « je tiens encore un peu, ça va remonter ». La zone de -10 % à -20 % se redresse effectivement assez facilement, ce qui renforce cette illusion — mais dès qu'un repli dépasse -40 %, on change complètement de jeu.</p>
  <p class="pt">Não internalizar essa assimetria leva a dois erros. Um deles é adiar a gestão de risco logo no início de uma queda, pensando "só mais um pouco e vai se recuperar." A faixa de -10% a -20% realmente costuma se recuperar com facilidade, o que reforça essa ilusão — mas, no momento em que a queda ultrapassa -40%, tudo muda completamente.</p>
  <p class="tr">Bu asimetriyi içselleştirememek iki hataya yol açar. Birincisi, düşüşün erken evresinde "biraz daha dayanayım, nasılsa toparlanır" diyerek risk yönetimini ertelemektir. %-10 ile %-20 aralığı gerçekten de kolayca toparlanır, bu da bu yanılsamayı pekiştirir — ama düşüş %-40'ı geçtiği anda oyun tamamen değişir.</p>
  <p class="vi">Không thấm nhuần sự bất đối xứng này dẫn đến hai sai lầm. Một là trì hoãn việc quản trị rủi ro ngay từ giai đoạn đầu của đợt giảm, với suy nghĩ "ráng chịu thêm chút nữa, rồi sẽ hồi lại thôi." Khoảng -10% đến -20% thực sự thường hồi phục khá dễ dàng, càng củng cố ảo tưởng này — nhưng ngay khi mức giảm vượt qua -40%, mọi thứ trở thành một cuộc chơi hoàn toàn khác.</p>
  <p class="ko">다른 하나는, 반대로 이미 크게 하락한 자산을 보고 "이 정도 빠졌으면 반등도 크겠지"라며 과도하게 낙관하는 거예요. -70% 빠진 자산이 원금을 회복하려면 +233%가 필요한데, 이게 "쉽게 일어날 일"처럼 느껴지지 않아야 정상이에요. <a href="/blog/ath-drawdown.html">ATH 대비 하락률 가이드</a>에서 다룬 과거 사이클 회복 사례들도, 실제로는 수년에 걸쳐 이 정도 배율의 상승이 필요했다는 걸 기억할 필요가 있습니다.</p>
  <p class="en">The other mistake runs the opposite direction — looking at an already-crushed asset and assuming "it's fallen this much, the rebound must be big too." An asset down -70% needs +233% just to get even, and that should not feel like something that happens easily. The historical cycle recoveries covered in the <a href="/blog/ath-drawdown.html">ATH drawdown guide</a> genuinely took years to produce gains of that magnitude — worth keeping in mind.</p>
  <p class="ja">もう一つは逆に、すでに大きく下落した資産を見て「これだけ下がったなら反発も大きいだろう」と過度に楽観することです。-70%下落した資産が元本を回復するには+233%が必要ですが、これは「簡単に起こること」のように感じられてはいけません。<a href="/blog/ath-drawdown.html">ATH比下落率ガイド</a>で扱った過去のサイクルの回復事例も、実際には数年かけてこの倍率の上昇が必要だったことを覚えておく必要があります。</p>

  <p class="es">El otro error va en la dirección opuesta — mirar un activo ya destrozado y asumir "ha caído tanto, el rebote también debe ser grande." Un activo caído -70% necesita +233% solo para nivelarse, y eso no debería sentirse como algo que sucede fácilmente. Las recuperaciones de ciclos históricos cubiertas en la <a href="/blog/ath-drawdown.html">guía de drawdown desde ATH</a> genuinamente tomaron años para producir ganancias de esa magnitud — vale la pena tenerlo presente.</p>
  <p class="de">Der andere Fehler geht in die entgegengesetzte Richtung — ein bereits zerschlagenes Asset zu betrachten und anzunehmen "es ist so stark gefallen, die Erholung muss auch groß sein." Ein Asset, das um -70% gefallen ist, braucht +233%, nur um den Ausgleich zu schaffen, und das sollte sich nicht wie etwas anfühlen, das leicht passiert. Die in der <a href="/blog/ath-drawdown.html">ATH-Drawdown-Anleitung</a> behandelten historischen Zykluserholungen brauchten tatsächlich Jahre, um Gewinne dieser Größenordnung zu erzielen — es lohnt sich, das im Hinterkopf zu behalten.</p>
  <p class="fr">L'autre erreur va dans le sens opposé — regarder un actif déjà écrasé et se dire « il est tellement tombé que le rebond sera forcément énorme aussi ». Un actif en baisse de -70 % a besoin de +233 % rien que pour revenir à l'équilibre, et cela ne devrait pas sembler être quelque chose qui arrive facilement. Les redressements historiques évoqués dans le <a href="/blog/ath-drawdown.html">guide sur le repli depuis l'ATH</a> ont réellement demandé des années pour produire des gains de cette ampleur — c'est utile de le garder en tête.</p>
  <p class="pt">O outro erro vai na direção oposta — olhar para um ativo já muito desvalorizado e presumir "já caiu tanto, a recuperação também deve ser grande." Um ativo que caiu -70% precisa de +233% só para empatar, e isso não deveria parecer algo que acontece facilmente. As recuperações históricas de ciclos abordadas no <a href="/blog/ath-drawdown.html">guia de queda em relação à ATH</a> realmente levaram anos para produzir ganhos dessa magnitude — vale a pena ter isso em mente.</p>
  <p class="tr">Diğer hata ise tam tersi yönde işler — çoktan çökmüş bir varlığa bakıp "bu kadar düştüyse, toparlanma da büyük olmalı" diye düşünmek. %-70 düşen bir varlığın sadece başa baş noktasına dönmesi için %+233 gerekir ve bunun kolayca gerçekleşen bir şey gibi hissettirmemesi gerekir. <a href="/blog/ath-drawdown.html">ATH'ye göre düşüş rehberinde</a> ele alınan geçmiş döngü toparlanmaları, bu büyüklükte kazanç üretmek için gerçekten yıllar aldı — bunu akılda tutmakta fayda var.</p>
  <p class="vi">Sai lầm còn lại đi theo hướng ngược lại — nhìn một tài sản đã giảm sâu và cho rằng "đã giảm nhiều như vậy thì cú hồi phục cũng phải lớn tương xứng." Một tài sản giảm -70% cần +233% chỉ để hòa vốn, và điều đó không nên bị xem là chuyện dễ xảy ra. Các đợt hồi phục chu kỳ trong lịch sử được đề cập trong <a href="/blog/ath-drawdown.html">hướng dẫn về mức giảm so với đỉnh ATH</a> thực tế đã mất nhiều năm mới tạo ra mức tăng lớn như vậy — điều đáng ghi nhớ.</p>

  <h2 class="ko">그래서 어떻게 쓰나</h2>
  <h2 class="en">So how do you actually use this</h2>
  <h2 class="ja">では実際どう使うか</h2>
  <h2 class="es">Entonces Cómo Usas Esto Realmente</h2>
  <h2 class="de">Wie nutzt man das also tatsächlich</h2>
  <h2 class="fr">Alors, comment s'en servir concrètement</h2>
  <h2 class="pt">Então, como usar isso na prática</h2>
  <h2 class="tr">Peki bunu gerçekte nasıl kullanmalı</h2>
  <h2 class="vi">Vậy nên áp dụng điều này như thế nào</h2>
  <p class="ko">이 곡선을 <a href="/blog/hard-to-cut-losses.html">손절선을 미리 정하는 것</a>과 같이 쓰면 좋아요. "-20%까지는 버틴다"는 계획을 세울 때, "-20%에서 원금 회복엔 +25%가 필요하다"는 걸 같이 계산해두면, 손절 라인을 훨씬 더 현실적인 숫자로 잡을 수 있습니다. 감으로 "이 정도는 버틸 수 있다"고 정하는 것보다, 회복에 필요한 실제 배율을 계산기 두드려보고 정하는 게 훨씬 냉정한 판단이 돼요.</p>
  <p class="en">Pair this curve with <a href="/blog/hard-to-cut-losses.html">deciding your stop-loss line in advance</a>. When planning "I'll hold through -20%," calculating that -20% requires +25% to break even alongside it lets you set a far more realistic stop-loss level. Deciding "I can handle this much" by gut feel is a much shakier judgment than running the actual recovery math first.</p>
  <p class="ja">このグラフは<a href="/blog/hard-to-cut-losses.html">損切りラインを事前に決めること</a>と一緒に使うと良いです。「-20%までは耐える」という計画を立てる時、「-20%からの元本回復には+25%が必要」ということを併せて計算しておけば、損切りラインをはるかに現実的な数字に設定できます。感覚で「これくらいは耐えられる」と決めるより、回復に必要な実際の倍率を計算してから決める方がはるかに冷静な判断になります。</p>
  <p class="es">Combina esta curva con <a href="/blog/hard-to-cut-losses.html">decidir tu línea de stop-loss de antemano</a>. Al planificar "aguantaré hasta -20%," calcular que -20% requiere +25% para recuperar el equilibrio junto con eso te permite fijar un nivel de stop-loss mucho más realista. Decidir "puedo soportar esto" por instinto es un juicio mucho más inestable que calcular primero las matemáticas reales de recuperación.</p>
  <p class="de">Kombiniere diese Kurve mit <a href="/blog/hard-to-cut-losses.html">deine Stop-Loss-Linie im Voraus festzulegen</a>. Wenn du planst "ich halte bis -20% durch," lässt dich die gleichzeitige Berechnung, dass -20% +25% zum Ausgleich braucht, ein weit realistischeres Stop-Loss-Niveau festlegen. "Das kann ich aushalten" aus dem Bauch heraus zu entscheiden, ist ein viel wackligeres Urteil, als zuerst die tatsächliche Erholungsmathematik durchzurechnen.</p>
  <p class="fr">Associez cette courbe à la <a href="/blog/hard-to-cut-losses.html">décision de fixer votre seuil de stop-loss à l'avance</a>. Quand vous prévoyez de « tenir jusqu'à -20 % », calculer en même temps qu'un -20 % exige +25 % pour revenir à l'équilibre vous permet de fixer un niveau de stop-loss bien plus réaliste. Décider « je peux encaisser ça » au feeling est un jugement bien plus fragile que de faire d'abord le vrai calcul de récupération.</p>
  <p class="pt">Combine essa curva com a <a href="/blog/hard-to-cut-losses.html">decisão de definir sua linha de stop-loss com antecedência</a>. Ao planejar "vou aguentar até -20%," calcular junto que -20% exige +25% para empatar permite definir um nível de stop-loss muito mais realista. Decidir "eu aguento isso" apenas no instinto é um julgamento muito mais instável do que fazer antes a conta real de recuperação.</p>
  <p class="tr">Bu eğriyi <a href="/blog/hard-to-cut-losses.html">stop-loss seviyenizi önceden belirleme</a> kararıyla birlikte kullanın. "%-20'ye kadar dayanırım" diye planlarken, %-20'nin başa baş noktasına dönmek için %+25 gerektirdiğini de hesaba katmak çok daha gerçekçi bir stop-loss seviyesi belirlemenizi sağlar. "Bu kadarına dayanabilirim" diye içgüdüyle karar vermek, önce gerçek toparlanma hesaplamasını yapmaktan çok daha zayıf bir karardır.</p>
  <p class="vi">Kết hợp đường cong này với việc <a href="/blog/hard-to-cut-losses.html">xác định trước ngưỡng cắt lỗ</a>. Khi lên kế hoạch "mình sẽ chịu đựng đến -20%," việc tính thêm rằng -20% cần +25% để hòa vốn sẽ giúp bạn đặt ra một mức cắt lỗ thực tế hơn nhiều. Quyết định "mình chịu được mức này" theo cảm tính là một phán đoán mong manh hơn nhiều so với việc tính toán con số hồi phục thực tế trước.</p>
<?php require __DIR__.'/_footer.php'; ?>
