<?php $slug = 'patch-signal-lag'; require __DIR__.'/_header.php'; ?>

  <p class="ko">매도 물량이 쏟아지고 있었다. 가격은 몇 분 만에 급락했고, 차트는 긴 음봉을 그렸다. 전형적인 투매, 곧 항복의 순간이었다. 그런데 대시보드의 매도 압력 점수는 태연했다. 폭락이 눈앞에서 벌어지는데도 지표는 몇 시간째 어제의 값에 머물러 있었다. '지금 일어나는 일을 왜 지표는 모르는가.' 이 질문이 우리를 데이터의 시간 문제로 데려갔다.</p>
  <p class="en">Sell orders were pouring in. Price cratered within minutes and the chart printed a long red candle — a textbook flush, the moment of capitulation. Yet the dashboard's sell-pressure score sat unmoved. A crash was unfolding in plain sight, and for hours the indicator still clung to yesterday's value. 'Why doesn't the indicator know what is happening right now?' That question led us to a problem of time in the data.</p>
  <p class="ja">売り物が殺到していた。価格は数分で急落し、チャートには長い陰線が刻まれた。典型的な投げ売り、すなわち投降の瞬間だった。ところがダッシュボードの売り圧力スコアは平然としていた。暴落が目の前で起きているのに、指標は何時間も昨日の値にとどまっていた。「今起きていることを、なぜ指標は知らないのか。」この問いが私たちをデータの時間問題へと導いた。</p>
  <p class="es">Las órdenes de venta se amontonaban. El precio se desplomó en minutos y el gráfico dibujó una vela roja larga: un desplome de manual, el momento de la capitulación. Sin embargo, la puntuación de presión vendedora del panel seguía inmóvil. El desplome ocurría a plena vista y, durante horas, el indicador seguía aferrado al valor de ayer. '¿Por qué el indicador no sabe lo que está pasando ahora mismo?' Esa pregunta nos llevó a un problema de tiempo en los datos.</p>
  <p class="de">Verkaufsorders strömten herein. Der Preis brach binnen Minuten ein, und der Chart druckte eine lange rote Kerze — ein Lehrbuch-Ausverkauf, der Moment der Kapitulation. Doch der Verkaufsdruck-Score des Dashboards blieb unbewegt. Ein Crash entfaltete sich vor aller Augen, und stundenlang klammerte sich der Indikator noch an den Wert von gestern. 'Warum weiß der Indikator nicht, was gerade geschieht?' Diese Frage führte uns zu einem Zeitproblem in den Daten.</p>
  <p class="fr">Les ordres de vente affluaient. Le prix s'est effondré en quelques minutes et le graphique a imprimé une longue bougie rouge — un flush de manuel, l'instant de la capitulation. Pourtant, le score de pression vendeuse du tableau de bord restait immobile. Un krach se déroulait sous nos yeux et, pendant des heures, l'indicateur s'accrochait encore à la valeur de la veille. « Pourquoi l'indicateur ignore-t-il ce qui se passe maintenant ? » Cette question nous a menés à un problème de temps dans les données.</p>
  <p class="pt">Ordens de venda se acumulavam. O preço despencou em minutos e o gráfico imprimiu uma longa vela vermelha — um flush de manual, o momento da capitulação. Ainda assim, a pontuação de pressão vendedora do painel seguia imóvel. Um crash se desenrolava à vista de todos e, por horas, o indicador ainda se apegava ao valor de ontem. 'Por que o indicador não sabe o que está acontecendo agora?' Essa pergunta nos levou a um problema de tempo nos dados.</p>
  <p class="tr">Satış emirleri yağıyordu. Fiyat dakikalar içinde çöktü ve grafik uzun bir kırmızı mum bastı — ders kitabı gibi bir boşalma, teslimiyet anı. Yine de panonun satış baskısı puanı kıpırdamadan duruyordu. Bir çöküş göz önünde yaşanıyordu ve saatlerce gösterge hâlâ dünün değerine tutunuyordu. 'Gösterge şu anda olan biteni neden bilmiyor?' Bu soru bizi verideki bir zaman sorununa götürdü.</p>
  <p class="vi">Lệnh bán ồ ạt đổ vào. Giá lao dốc chỉ trong vài phút và biểu đồ in ra một cây nến đỏ dài — một cú xả sách giáo khoa, khoảnh khắc đầu hàng. Vậy mà điểm áp lực bán trên bảng điều khiển vẫn trơ ra. Một cú sập đang diễn ra ngay trước mắt, và suốt nhiều giờ chỉ báo vẫn bám lấy giá trị của hôm qua. 'Vì sao chỉ báo không biết điều đang xảy ra ngay lúc này?' Câu hỏi đó dẫn chúng tôi đến một vấn đề về thời gian trong dữ liệu.</p>

  <p class="ko">원인은 지표가 참조하는 봉(캔들)의 주기에 있었다. 당시 거래량과 매도 압력 지표는 일봉을 기준으로 계산됐다. 일봉은 하루에 한 번 마감된다. 즉 오늘 장중에 무슨 일이 벌어지든, 그것이 점수에 반영되려면 하루가 지나 봉이 마감돼야 했다. 타이밍 도구에게 최대 24시간의 지연은 치명적이다. 잡아야 할 바로 그 순간—투매의 정점—은 언제나 장중에 일어나기 때문이다.</p>
  <p class="en">The cause lay in the candle interval the indicators referenced. At the time, the volume and sell-pressure indicators were computed from daily candles. A daily candle closes once a day. So whatever happens intraday cannot reach the score until a full day passes and the candle closes. For a timing tool, up to 24 hours of lag is fatal — because the very moment you need to catch, the peak of a flush, always happens intraday.</p>
  <p class="ja">原因は、指標が参照する足(ローソク)の周期にあった。当時、出来高と売り圧力の指標は日足を基準に計算されていた。日足は一日に一度確定する。つまり日中に何が起きても、それがスコアに反映されるには一日が過ぎて足が確定しなければならなかった。タイミング・ツールにとって最大24時間の遅延は致命的だ。捉えるべきまさにその瞬間——投げ売りの頂点——は、いつも日中に起きるからだ。</p>
  <p class="es">La causa estaba en el intervalo de vela que los indicadores tomaban como referencia. Entonces, los indicadores de volumen y presión vendedora se calculaban a partir de velas diarias. Una vela diaria cierra una vez al día. Así que ocurra lo que ocurra intradía, no puede llegar a la puntuación hasta que pase un día completo y la vela cierre. Para una herramienta de timing, hasta 24 horas de retraso es fatal, porque el instante exacto que hay que capturar —el pico del desplome— siempre ocurre intradía.</p>
  <p class="de">Die Ursache lag im Kerzenintervall, auf das sich die Indikatoren bezogen. Damals wurden die Indikatoren für Volumen und Verkaufsdruck aus Tageskerzen berechnet. Eine Tageskerze schließt einmal am Tag. Was auch immer also innertägig geschieht, kann den Score erst erreichen, wenn ein ganzer Tag vergeht und die Kerze schließt. Für ein Timing-Werkzeug ist eine Verzögerung von bis zu 24 Stunden fatal — denn genau der Moment, den man einfangen muss, der Höhepunkt eines Ausverkaufs, geschieht stets innertägig.</p>
  <p class="fr">La cause tenait à l'intervalle de bougie auquel se référaient les indicateurs. À l'époque, les indicateurs de volume et de pression vendeuse étaient calculés à partir de bougies journalières. Une bougie journalière clôture une fois par jour. Ainsi, quoi qu'il se passe en intrajournalier, cela ne peut atteindre le score qu'après qu'un jour entier se soit écoulé et que la bougie ait clôturé. Pour un outil de timing, jusqu'à 24 heures de retard est fatal — car l'instant précis à saisir, le sommet d'un flush, se produit toujours en intrajournalier.</p>
  <p class="pt">A causa estava no intervalo de vela que os indicadores usavam como referência. Na época, os indicadores de volume e pressão vendedora eram calculados a partir de velas diárias. Uma vela diária fecha uma vez por dia. Então, aconteça o que acontecer no intradiário, isso só chega à pontuação depois que um dia inteiro passa e a vela fecha. Para uma ferramenta de timing, até 24 horas de atraso é fatal — porque o instante exato a capturar, o pico de um flush, acontece sempre no intradiário.</p>
  <p class="tr">Neden, göstergelerin başvurduğu mum aralığındaydı. O dönem hacim ve satış baskısı göstergeleri günlük mumlardan hesaplanıyordu. Günlük mum günde bir kez kapanır. Yani gün içinde ne olursa olsun, tam bir gün geçip mum kapanmadan puana ulaşamaz. Bir zamanlama aracı için 24 saate varan gecikme ölümcüldür — çünkü yakalanması gereken tam an, bir boşalmanın zirvesi, her zaman gün içinde gerçekleşir.</p>
  <p class="vi">Nguyên nhân nằm ở chu kỳ nến mà các chỉ báo tham chiếu. Khi đó, các chỉ báo khối lượng và áp lực bán được tính từ nến ngày. Một nến ngày đóng mỗi ngày một lần. Vậy nên dù có chuyện gì xảy ra trong phiên, nó cũng không thể vào điểm số cho đến khi trọn một ngày trôi qua và nến đóng. Với một công cụ canh thời điểm, độ trễ tới 24 giờ là chí mạng — bởi đúng khoảnh khắc cần chộp lấy, đỉnh của cú xả, luôn xảy ra trong phiên.</p>

  <div class="ko">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">같은 폭락, 다른 반응 속도</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">투매 발생 (0시간)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">15분봉 · 15분 후 반응</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">일봉 · 최대 24시간 후 반응</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ 같은 투매라도 15분봉 지표는 15분 안에, 일봉 지표는 최대 하루 뒤에야 반응했다.</p>
  </div>
  <div class="en">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Same crash, different reaction speed</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Sell-off hits (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">15m candles · reacts in 15 min</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Daily candles · up to 24h later</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ For the same flush, the 15-minute indicator reacts within 15 minutes; the daily indicator, only up to a day later.</p>
  </div>
  <div class="ja">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">同じ暴落、異なる反応速度</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">投げ売り発生(0時間)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">15分足 · 15分後に反応</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">日足 · 最大24時間後に反応</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ 同じ投げ売りでも、15分足の指標は15分以内に、日足の指標は最大で一日後にようやく反応した。</p>
  </div>
  <div class="es">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Mismo desplome, distinta velocidad de reacción</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Llega el desplome (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">Velas 15m · reacciona en 15 min</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Velas diarias · hasta 24h después</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Ante el mismo desplome, el indicador de 15 minutos reacciona en 15 minutos; el diario, hasta un día después.</p>
  </div>
  <div class="de">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Gleicher Crash, andere Reaktionsgeschwindigkeit</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Ausverkauf (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">15m-Kerzen · reagiert in 15 Min</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Tageskerzen · bis zu 24h später</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Beim selben Ausverkauf reagiert der 15-Minuten-Indikator binnen 15 Minuten; der tägliche erst bis zu einen Tag später.</p>
  </div>
  <div class="fr">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Même krach, vitesse de réaction différente</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Le flush frappe (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">Bougies 15m · réagit en 15 min</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Bougies journalières · jusqu'à 24h après</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Pour le même flush, l'indicateur 15 minutes réagit en 15 minutes ; l'indicateur journalier, jusqu'à un jour plus tard.</p>
  </div>
  <div class="pt">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Mesmo crash, velocidade de reação diferente</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Chega o flush (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">Velas 15m · reage em 15 min</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Velas diárias · até 24h depois</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Para o mesmo flush, o indicador de 15 minutos reage em 15 minutos; o diário, só até um dia depois.</p>
  </div>
  <div class="tr">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Aynı çöküş, farklı tepki hızı</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Boşalma (0s)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">15dk mum · 15 dk'da tepki</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Günlük mum · en geç 24s sonra</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Aynı boşalmada 15 dakikalık gösterge 15 dakikada, günlük gösterge ise en geç bir gün sonra tepki verdi.</p>
  </div>
  <div class="vi">
  <svg viewBox="0 0 760 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="228" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Cùng cú sập, tốc độ phản ứng khác</text>
    <line x1="120" y1="210" x2="700" y2="210" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="120" y1="80" x2="120" y2="210" stroke="#f7931a" stroke-width="1.5" stroke-dasharray="4 4"/>
    <text x="120" y="74" fill="#f7931a" font-size="12" font-weight="700" text-anchor="middle" font-family="sans-serif">Cú xả xảy ra (0h)</text>
    <rect x="120" y="112" width="44" height="16" rx="4" fill="#22c55e"/>
    <text x="176" y="124" fill="#22c55e" font-size="12.5" font-weight="700" font-family="sans-serif">Nến 15m · phản ứng sau 15 phút</text>
    <line x1="120" y1="173" x2="612" y2="173" stroke="#3a3a3a" stroke-width="10" stroke-linecap="round" opacity="0.35"/>
    <rect x="612" y="165" width="44" height="16" rx="4" fill="#f87171"/>
    <text x="120" y="196" fill="#f87171" font-size="12.5" font-weight="700" font-family="sans-serif">Nến ngày · trễ tới 24h</text>
    <text x="120" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">0h</text>
    <text x="366" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+12h</text>
    <text x="634" y="228" fill="#71717a" font-size="10.5" text-anchor="middle" font-family="sans-serif">+24h</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Cùng một cú xả, chỉ báo 15 phút phản ứng trong 15 phút; chỉ báo nến ngày thì tới cả một ngày sau.</p>
  </div>

  <h2 class="ko">하루에 한 번만 뛰는 지표</h2>
  <h2 class="en">An Indicator That Beats Once a Day</h2>
  <h2 class="ja">一日に一度しか鼓動しない指標</h2>
  <h2 class="es">Un indicador que late una vez al día</h2>
  <h2 class="de">Ein Indikator, der einmal am Tag schlägt</h2>
  <h2 class="fr">Un indicateur qui bat une fois par jour</h2>
  <h2 class="pt">Um indicador que bate uma vez por dia</h2>
  <h2 class="tr">Günde Bir Kez Atan Bir Gösterge</h2>
  <h2 class="vi">Chỉ báo mỗi ngày chỉ đập một nhịp</h2>

  <p class="ko">일봉 기반 지표의 본질적 한계는 '집계의 지연'이다. 하루치 거래량을 하나의 숫자로 뭉치면, 장중의 급변은 평균에 묻혀 희미해진다. 오전에 폭락하고 오후에 반등하면, 일봉은 그 격렬함을 '보합'으로 뭉개버린다. 우리가 포착하려는 것은 바로 그 격렬함인데, 일봉은 그것을 지우는 방향으로 작동했다.</p>
  <p class="en">The intrinsic limit of a daily-candle indicator is the lag of aggregation. Squash a day's worth of volume into a single number, and the intraday violence gets buried in the average. Crash in the morning, bounce in the afternoon, and the daily candle mashes that ferocity into 'flat.' The very ferocity we are trying to capture is what the daily candle works to erase.</p>
  <p class="ja">日足ベースの指標の本質的な限界は「集計の遅延」だ。一日ぶんの出来高を一つの数字にまとめると、日中の急変は平均に埋もれて薄れる。午前に暴落し午後に反発すれば、日足はその激しさを「保ち合い」に潰してしまう。私たちが捉えようとするのはまさにその激しさなのに、日足はそれを消す方向に働いた。</p>
  <p class="es">El límite intrínseco de un indicador basado en velas diarias es el retraso de la agregación. Aplasta el volumen de un día en un solo número y la violencia intradía queda enterrada en el promedio. Desplome por la mañana, rebote por la tarde, y la vela diaria machaca esa ferocidad hasta dejarla en 'plano'. Justo esa ferocidad que intentamos captar es la que la vela diaria se afana en borrar.</p>
  <p class="de">Die intrinsische Grenze eines Indikators auf Tageskerzenbasis ist die Verzögerung der Aggregation. Presst man das Volumen eines ganzen Tages in eine einzige Zahl, versinkt die innertägige Heftigkeit im Durchschnitt. Crash am Morgen, Erholung am Nachmittag — und die Tageskerze zerdrückt diese Wucht zu 'seitwärts'. Genau die Wucht, die wir einfangen wollen, ist das, was die Tageskerze auszulöschen arbeitet.</p>
  <p class="fr">La limite intrinsèque d'un indicateur en bougies journalières est le retard de l'agrégation. Écrasez le volume d'une journée en un seul chiffre et la violence intrajournalière se noie dans la moyenne. Krach le matin, rebond l'après-midi, et la bougie journalière broie cette férocité en « stable ». La férocité même que nous cherchons à saisir est ce que la bougie journalière s'emploie à effacer.</p>
  <p class="pt">O limite intrínseco de um indicador baseado em velas diárias é o atraso da agregação. Comprima o volume de um dia inteiro num único número e a violência intradiária se afoga na média. Crash de manhã, repique à tarde, e a vela diária amassa essa ferocidade até virar 'estável'. Justamente a ferocidade que tentamos captar é o que a vela diária trabalha para apagar.</p>
  <p class="tr">Günlük muma dayalı bir göstergenin özündeki sınır, toplulaştırmanın gecikmesidir. Bir günlük hacmi tek bir sayıya sıkıştırırsanız, gün içindeki şiddet ortalamada gömülür. Sabah çöküş, öğleden sonra sıçrama olursa, günlük mum bu şiddeti 'yatay'a ezer. Yakalamaya çalıştığımız asıl şiddeti, günlük mum tam da silmeye çalışır.</p>
  <p class="vi">Giới hạn cố hữu của chỉ báo dựa trên nến ngày là độ trễ do gộp dữ liệu. Nén khối lượng cả một ngày vào một con số, và sự dữ dội trong phiên bị chôn vùi trong mức trung bình. Sập vào buổi sáng, bật lại vào buổi chiều, và nến ngày nghiền sự dữ dội ấy thành 'đi ngang'. Chính sự dữ dội mà chúng tôi muốn nắm bắt lại là thứ nến ngày ra sức xóa đi.</p>

  <p class="ko">더 큰 문제는 마감 시점이다. 일봉은 하루의 끝에 확정된다. 그전까지는 아직 완성되지 않은 봉이라 신뢰할 수 없다. 결국 장중에 벌어진 항복은, 봉이 마감되는 시각까지 점수에 잡히지 않는다. 저점은 대개 이 미완성 봉 안에서 만들어지는데, 도구는 그 저점이 지나간 뒤에야 '아, 저점이었네'라고 말하는 셈이었다. 사후 확인은 타이밍이 아니다.</p>
  <p class="en">The bigger problem is the close. A daily candle is finalized at the end of the day. Until then it is an unfinished candle and cannot be trusted. So a capitulation that unfolds intraday goes unregistered by the score until the candle closes. The low is usually forged inside that very unfinished candle — and the tool would only say 'ah, that was the bottom' after it had passed. Confirmation after the fact is not timing.</p>
  <p class="ja">より大きな問題は確定のタイミングだ。日足は一日の終わりに確定する。それまでは未完成の足であり、信頼できない。結局、日中に起きた投降は、足が確定する時刻までスコアに捉えられない。底はたいていこの未完成の足の中で作られるのに、ツールはその底が過ぎ去った後に初めて「ああ、底だった」と言う始末だった。事後の確認はタイミングではない。</p>
  <p class="es">El problema mayor es el cierre. Una vela diaria se finaliza al final del día. Hasta entonces es una vela sin terminar y no se puede confiar en ella. Así que una capitulación que se desarrolla intradía no queda registrada por la puntuación hasta que la vela cierra. El mínimo suele forjarse dentro de esa misma vela sin terminar, y la herramienta solo diría 'ah, ese era el suelo' después de que hubiera pasado. La confirmación a posteriori no es timing.</p>
  <p class="de">Das größere Problem ist der Schluss. Eine Tageskerze wird am Tagesende finalisiert. Bis dahin ist sie eine unfertige Kerze und nicht vertrauenswürdig. So bleibt eine Kapitulation, die sich innertägig entfaltet, vom Score unregistriert, bis die Kerze schließt. Das Tief entsteht meist innerhalb ebendieser unfertigen Kerze — und das Werkzeug würde erst 'ach, das war der Boden' sagen, nachdem er vorbei war. Bestätigung im Nachhinein ist kein Timing.</p>
  <p class="fr">Le problème plus grave, c'est la clôture. Une bougie journalière est finalisée en fin de journée. Jusque-là, c'est une bougie inachevée à laquelle on ne peut se fier. Ainsi, une capitulation qui se déroule en intrajournalier n'est pas enregistrée par le score tant que la bougie n'a pas clôturé. Le plus bas se forge le plus souvent à l'intérieur de cette bougie inachevée — et l'outil ne dirait « ah, c'était le creux » qu'après coup. La confirmation après coup n'est pas du timing.</p>
  <p class="pt">O problema maior é o fechamento. Uma vela diária é finalizada no fim do dia. Até lá é uma vela inacabada e não se pode confiar nela. Assim, uma capitulação que se desenrola no intradiário não é registrada pela pontuação até a vela fechar. O fundo costuma se forjar dentro dessa mesma vela inacabada — e a ferramenta só diria 'ah, aquele era o fundo' depois que ele passasse. Confirmação a posteriori não é timing.</p>
  <p class="tr">Daha büyük sorun kapanıştır. Günlük mum, günün sonunda kesinleşir. O ana kadar tamamlanmamış bir mumdur ve güvenilemez. Böylece gün içinde gelişen bir teslimiyet, mum kapanana dek puana kaydolmaz. Dip genellikle tam da bu tamamlanmamış mumun içinde oluşur — ve araç ancak dip geçtikten sonra 'ah, dip buymuş' derdi. Olay olduktan sonra teyit, zamanlama değildir.</p>
  <p class="vi">Vấn đề lớn hơn là thời điểm đóng nến. Nến ngày được chốt vào cuối ngày. Trước đó nó là nến chưa hoàn tất và không thể tin cậy. Thế nên một cú đầu hàng diễn ra trong phiên sẽ không được điểm số ghi nhận cho đến khi nến đóng. Đáy thường được rèn ngay bên trong cây nến chưa hoàn tất ấy — và công cụ chỉ nói 'à, đó là đáy' sau khi nó đã trôi qua. Xác nhận sau sự việc không phải là canh thời điểm.</p>

  <h2 class="ko">15분마다 뛰는 심장</h2>
  <h2 class="en">A Heart That Beats Every 15 Minutes</h2>
  <h2 class="ja">15分ごとに鼓動する心臓</h2>
  <h2 class="es">Un corazón que late cada 15 minutos</h2>
  <h2 class="de">Ein Herz, das alle 15 Minuten schlägt</h2>
  <h2 class="fr">Un cœur qui bat toutes les 15 minutes</h2>
  <h2 class="pt">Um coração que bate a cada 15 minutos</h2>
  <h2 class="tr">Her 15 Dakikada Atan Bir Kalp</h2>
  <h2 class="vi">Trái tim đập mỗi 15 phút</h2>

  <p class="ko">해법은 명확했다. 거래량과 매도 압력 지표를 15분봉으로 옮겼다. 이제 지표는 15분마다 갱신된다. 장중에 매도가 쏟아지면, 늦어도 15분 안에 점수가 반응한다. 하루의 지연이 15분으로 줄었다. 특히 투매나 거래량 폭증처럼 '지금 이 순간'이 중요한 지표일수록 이 변화의 효과가 컸다.</p>
  <p class="en">The fix was clear: we moved the volume and sell-pressure indicators to 15-minute candles. Now the indicator refreshes every 15 minutes. When selling pours in intraday, the score reacts within 15 minutes at most. A day of lag shrank to a quarter-hour. The effect was largest exactly where 'this very moment' matters most — flushes and volume spikes.</p>
  <p class="ja">解決策は明確だった。出来高と売り圧力の指標を15分足に移した。いまや指標は15分ごとに更新される。日中に売りが殺到すれば、遅くとも15分以内にスコアが反応する。一日の遅延が15分に縮まった。とりわけ投げ売りや出来高急増のように「今この瞬間」が重要な指標ほど、この変化の効果は大きかった。</p>
  <p class="es">La solución fue clara: pasamos los indicadores de volumen y presión vendedora a velas de 15 minutos. Ahora el indicador se actualiza cada 15 minutos. Cuando las ventas se desatan intradía, la puntuación reacciona en 15 minutos como máximo. Un día de retraso se redujo a un cuarto de hora. El efecto fue mayor justo donde 'este preciso instante' más importa: desplomes y picos de volumen.</p>
  <p class="de">Die Lösung war klar: Wir verlegten die Indikatoren für Volumen und Verkaufsdruck auf 15-Minuten-Kerzen. Nun aktualisiert sich der Indikator alle 15 Minuten. Wenn innertägig Verkäufe hereinströmen, reagiert der Score in höchstens 15 Minuten. Ein Tag Verzögerung schrumpfte auf eine Viertelstunde. Am größten war der Effekt genau dort, wo 'genau dieser Moment' am meisten zählt — bei Ausverkäufen und Volumenspitzen.</p>
  <p class="fr">La solution était claire : nous avons basculé les indicateurs de volume et de pression vendeuse sur des bougies de 15 minutes. Désormais, l'indicateur se rafraîchit toutes les 15 minutes. Quand les ventes affluent en intrajournalier, le score réagit en 15 minutes au plus. Un jour de retard s'est réduit à un quart d'heure. L'effet fut le plus fort là précisément où « cet instant même » compte le plus — flushs et pics de volume.</p>
  <p class="pt">A solução era clara: passamos os indicadores de volume e pressão vendedora para velas de 15 minutos. Agora o indicador se atualiza a cada 15 minutos. Quando as vendas jorram no intradiário, a pontuação reage em no máximo 15 minutos. Um dia de atraso encolheu para um quarto de hora. O efeito foi maior exatamente onde 'este exato instante' mais importa — flushes e picos de volume.</p>
  <p class="tr">Çözüm netti: hacim ve satış baskısı göstergelerini 15 dakikalık mumlara taşıdık. Artık gösterge her 15 dakikada bir yenileniyor. Gün içinde satış yağdığında, puan en geç 15 dakika içinde tepki veriyor. Bir günlük gecikme, çeyrek saate indi. Etki en çok 'tam şu an'ın en önemli olduğu yerde büyüktü — boşalmalar ve hacim sıçramaları.</p>
  <p class="vi">Giải pháp đã rõ: chúng tôi chuyển các chỉ báo khối lượng và áp lực bán sang nến 15 phút. Giờ đây chỉ báo làm mới mỗi 15 phút. Khi lệnh bán ồ ạt trong phiên, điểm số phản ứng chậm nhất trong 15 phút. Một ngày trễ co lại còn mười lăm phút. Hiệu quả lớn nhất đúng ở nơi 'chính khoảnh khắc này' quan trọng nhất — các cú xả và đợt tăng vọt khối lượng.</p>

  <p class="ko">물론 짧은 봉은 노이즈가 많다. 15분봉 하나하나는 일봉보다 훨씬 거칠고, 사소한 변동에도 쉽게 튄다. 우리는 이를 두 가지 방법으로 다스렸다. 첫째, 15분봉의 값을 곧바로 쓰지 않고 1시간·4시간 흐름과 비교해 '가속'을 봤다. 순간의 튐이 아니라 압력이 실제로 붙고 있는지를 확인한 것이다. 둘째, 모든 지표를 15분봉으로 바꾸지는 않았다. 온체인 지표나 200주 이동평균처럼 사이클을 보는 느린 지표는 원래의 주기를 그대로 유지했다. 지표마다 봐야 할 시간의 폭이 다르기 때문이다.</p>
  <p class="en">Short candles, of course, are noisy. Each 15-minute candle is far rougher than a daily one and jumps at the slightest wiggle. We tamed this two ways. First, we did not use the raw 15-minute value; we compared it against the 1-hour and 4-hour flow to read 'acceleration' — confirming that pressure is genuinely building, not that a single bar twitched. Second, we did not convert every indicator to 15 minutes. Slow, cycle-reading indicators — on-chain metrics, the 200-week moving average — kept their original cadence. Each indicator measures a different span of time.</p>
  <p class="ja">もちろん短い足はノイズが多い。15分足の一本一本は日足よりはるかに粗く、些細な変動にも簡単に跳ねる。私たちはこれを二つの方法で御した。第一に、15分足の値をそのまま使わず、1時間・4時間の流れと比較して「加速」を見た。瞬間の跳ねではなく、圧力が実際に強まっているかを確認したのだ。第二に、すべての指標を15分足に変えたわけではない。オンチェーン指標や200週移動平均のようにサイクルを見る遅い指標は、元の周期をそのまま保った。指標ごとに見るべき時間の幅が違うからだ。</p>
  <p class="es">Las velas cortas, claro, son ruidosas. Cada vela de 15 minutos es mucho más brusca que una diaria y salta al menor temblor. Domamos esto de dos formas. Primero, no usamos el valor bruto de 15 minutos; lo comparamos con el flujo de 1 hora y 4 horas para leer la 'aceleración', confirmando que la presión realmente se acumula, no que una sola barra tuvo un espasmo. Segundo, no convertimos todos los indicadores a 15 minutos. Los indicadores lentos, de ciclo —métricas on-chain, la media de 200 semanas— conservaron su cadencia original. Cada indicador mide un lapso de tiempo distinto.</p>
  <p class="de">Kurze Kerzen sind natürlich verrauscht. Jede 15-Minuten-Kerze ist weit gröber als eine Tageskerze und springt beim kleinsten Zucken. Wir zähmten das auf zwei Arten. Erstens verwendeten wir nicht den rohen 15-Minuten-Wert; wir verglichen ihn mit dem 1-Stunden- und 4-Stunden-Verlauf, um 'Beschleunigung' abzulesen — um zu bestätigen, dass sich Druck wirklich aufbaut und nicht bloß ein einzelner Balken zuckte. Zweitens stellten wir nicht jeden Indikator auf 15 Minuten um. Langsame, zyklusbezogene Indikatoren — On-Chain-Kennzahlen, der 200-Wochen-Durchschnitt — behielten ihren ursprünglichen Takt. Jeder Indikator misst eine andere Zeitspanne.</p>
  <p class="fr">Les bougies courtes, bien sûr, sont bruitées. Chaque bougie de 15 minutes est bien plus brute qu'une journalière et sursaute au moindre frémissement. Nous avons dompté cela de deux façons. D'abord, nous n'avons pas utilisé la valeur brute de 15 minutes ; nous l'avons comparée au flux de 1 heure et 4 heures pour lire une « accélération » — confirmant que la pression s'accumule vraiment, et non qu'une seule barre a tressailli. Ensuite, nous n'avons pas converti tous les indicateurs en 15 minutes. Les indicateurs lents, de cycle — métriques on-chain, moyenne à 200 semaines — ont gardé leur cadence d'origine. Chaque indicateur mesure une plage de temps différente.</p>
  <p class="pt">Velas curtas, claro, são ruidosas. Cada vela de 15 minutos é muito mais bruta que uma diária e salta ao menor tremor. Domamos isso de duas formas. Primeiro, não usamos o valor bruto de 15 minutos; comparamo-lo com o fluxo de 1 hora e 4 horas para ler a 'aceleração' — confirmando que a pressão realmente se acumula, e não que uma única barra teve um espasmo. Segundo, não convertemos todos os indicadores para 15 minutos. Indicadores lentos, de ciclo — métricas on-chain, a média de 200 semanas — mantiveram sua cadência original. Cada indicador mede um intervalo de tempo diferente.</p>
  <p class="tr">Kısa mumlar elbette gürültülüdür. Her 15 dakikalık mum, günlük olandan çok daha kabadır ve en ufak kıpırtıda zıplar. Bunu iki yolla evcilleştirdik. Birincisi, ham 15 dakikalık değeri doğrudan kullanmadık; 'ivmeyi' okumak için onu 1 saatlik ve 4 saatlik akışla karşılaştırdık — baskının gerçekten arttığını, tek bir çubuğun seğirmediğini doğruladık. İkincisi, her göstergeyi 15 dakikaya çevirmedik. Döngüyü okuyan yavaş göstergeler — zincir üstü metrikler, 200 haftalık ortalama — özgün temposunu korudu. Her gösterge farklı bir zaman aralığını ölçer.</p>
  <p class="vi">Tất nhiên nến ngắn thì nhiều nhiễu. Mỗi cây nến 15 phút thô hơn nhiều so với nến ngày và dễ nảy chỉ vì một rung động nhỏ. Chúng tôi chế ngự điều này bằng hai cách. Thứ nhất, chúng tôi không dùng thẳng giá trị 15 phút; chúng tôi so nó với dòng chảy 1 giờ và 4 giờ để đọc 'gia tốc' — xác nhận rằng áp lực thực sự đang dồn lên, chứ không phải một thanh nến vừa giật. Thứ hai, chúng tôi không chuyển mọi chỉ báo sang 15 phút. Những chỉ báo chậm, mang tính chu kỳ — các chỉ số on-chain, đường trung bình 200 tuần — vẫn giữ nhịp ban đầu. Mỗi chỉ báo đo một khoảng thời gian khác nhau.</p>

  <p class="ko">타이밍 도구의 가치는 '지금'에 있다. 어제를 설명하는 신호는 아무리 정확해도 타이밍이 아니다. 이 패치는 새로운 지표를 더한 것이 아니라, 이미 있던 지표에게 현재를 볼 눈을 준 작업이었다. 화면의 점수는 그대로지만, 그 점수가 세상과 같은 속도로 숨 쉬기 시작했다.</p>
  <p class="en">The value of a timing tool lies in 'now.' A signal that describes yesterday, however accurate, is not timing. This patch did not add a new indicator; it gave an existing indicator eyes to see the present. The number on the screen is the same, but it began to breathe at the same pace as the world.</p>
  <p class="ja">タイミング・ツールの価値は「今」にある。昨日を説明する信号は、どれほど正確でもタイミングではない。このパッチは新しい指標を加えたのではなく、すでにある指標に現在を見る目を与えた作業だった。画面のスコアはそのままだが、そのスコアが世界と同じ速さで呼吸し始めた。</p>
  <p class="es">El valor de una herramienta de timing está en el 'ahora'. Una señal que describe el ayer, por precisa que sea, no es timing. Este parche no añadió un indicador nuevo; le dio a un indicador existente ojos para ver el presente. El número en pantalla es el mismo, pero empezó a respirar al mismo ritmo que el mundo.</p>
  <p class="de">Der Wert eines Timing-Werkzeugs liegt im 'Jetzt'. Ein Signal, das das Gestern beschreibt, ist, wie genau auch immer, kein Timing. Dieser Patch fügte keinen neuen Indikator hinzu; er gab einem bestehenden Indikator Augen für die Gegenwart. Die Zahl auf dem Bildschirm ist dieselbe, doch sie begann, im selben Takt wie die Welt zu atmen.</p>
  <p class="fr">La valeur d'un outil de timing est dans le « maintenant ». Un signal qui décrit hier, aussi précis soit-il, n'est pas du timing. Ce patch n'a pas ajouté de nouvel indicateur ; il a donné à un indicateur existant des yeux pour voir le présent. Le chiffre à l'écran est le même, mais il s'est mis à respirer au rythme du monde.</p>
  <p class="pt">O valor de uma ferramenta de timing está no 'agora'. Um sinal que descreve o ontem, por mais exato que seja, não é timing. Este patch não acrescentou um novo indicador; deu a um indicador existente olhos para ver o presente. O número na tela é o mesmo, mas passou a respirar no mesmo ritmo do mundo.</p>
  <p class="tr">Bir zamanlama aracının değeri 'şimdi'dedir. Dünü anlatan bir sinyal, ne kadar isabetli olursa olsun, zamanlama değildir. Bu yama yeni bir gösterge eklemedi; mevcut bir göstergeye bugünü görecek gözler verdi. Ekrandaki sayı aynı, ama dünyayla aynı hızda nefes almaya başladı.</p>
  <p class="vi">Giá trị của một công cụ canh thời điểm nằm ở chữ 'bây giờ'. Một tín hiệu mô tả hôm qua, dù chính xác đến đâu, cũng không phải là canh thời điểm. Bản vá này không thêm chỉ báo mới; nó trao cho một chỉ báo sẵn có đôi mắt để nhìn hiện tại. Con số trên màn hình vẫn thế, nhưng nó bắt đầu thở cùng nhịp với thế giới.</p>

  <div class="box ko">지표에는 저마다의 시계가 있어야 한다. 사이클을 보는 지표는 느리게, 지금을 보는 지표는 빠르게 뛰어야 한다. 우리가 고친 것은 계산식이 아니라, 지표가 사는 시간이었다.</div>
  <div class="box en">Each indicator must keep its own clock. A cycle-reading indicator should beat slowly; a now-reading indicator, fast. What we fixed was not a formula, but the time each indicator lives in.</div>
  <div class="box ja">指標にはそれぞれの時計が必要だ。サイクルを見る指標はゆっくり、今を見る指標は速く鼓動すべきだ。私たちが直したのは計算式ではなく、指標が生きる時間だった。</div>
  <div class="box es">Cada indicador debe llevar su propio reloj. Un indicador que lee el ciclo debe latir despacio; uno que lee el ahora, rápido. Lo que arreglamos no fue una fórmula, sino el tiempo en el que vive cada indicador.</div>
  <div class="box de">Jeder Indikator muss seine eigene Uhr führen. Ein zykluslesender Indikator sollte langsam schlagen, ein gegenwartslesender schnell. Was wir behoben, war keine Formel, sondern die Zeit, in der jeder Indikator lebt.</div>
  <div class="box fr">Chaque indicateur doit garder sa propre horloge. Un indicateur qui lit le cycle doit battre lentement ; celui qui lit le présent, vite. Ce que nous avons corrigé, ce n'est pas une formule, mais le temps dans lequel vit chaque indicateur.</div>
  <div class="box pt">Cada indicador deve manter seu próprio relógio. Um indicador que lê o ciclo deve bater devagar; um que lê o agora, rápido. O que corrigimos não foi uma fórmula, mas o tempo em que cada indicador vive.</div>
  <div class="box tr">Her gösterge kendi saatini tutmalı. Döngüyü okuyan bir gösterge yavaş, şimdiyi okuyan bir gösterge hızlı atmalı. Düzelttiğimiz şey bir formül değil, her göstergenin yaşadığı zamandı.</div>
  <div class="box vi">Mỗi chỉ báo phải giữ chiếc đồng hồ riêng. Chỉ báo đọc chu kỳ nên đập chậm; chỉ báo đọc hiện tại, đập nhanh. Thứ chúng tôi sửa không phải một công thức, mà là khoảng thời gian mà mỗi chỉ báo đang sống.</div>

<?php require __DIR__.'/_footer.php'; ?>
