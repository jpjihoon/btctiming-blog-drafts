<?php $slug = 'patch-score-cliffs'; require __DIR__.'/_header.php'; ?>

  <p class="ko">비트코인의 MVRV Z-Score가 1.00을 막 넘긴 날이었다. 전날은 0.98, 그날은 1.03. 지표는 사실상 제자리였다. 그런데 매수 점수는 8.4에서 5.1로 주저앉았다. '강력 매수'가 하루아침에 '관망'으로 바뀐 것이다. 지표가 거의 움직이지 않았는데 신호가 통째로 뒤집힌 이유를 한 사용자가 물었다. 답을 찾던 우리는 점수 산출의 가장 기초적인 결함과 마주쳤다.</p>
  <p class="en">It was the day Bitcoin's MVRV Z-Score had just crossed 1.00. The day before it read 0.98; that day, 1.03. The metric had barely moved. Yet the buy score collapsed from 8.4 to 5.1 — 'strong buy' had turned into 'wait' overnight. A user asked why the signal had flipped entirely when the indicator had hardly budged. Chasing the answer, we ran into the most basic flaw in how we turned data into a score.</p>
  <p class="ja">ビットコインのMVRV Zスコアが1.00をちょうど超えた日だった。前日は0.98、その日は1.03。指標はほぼ動いていなかった。ところが買いスコアは8.4から5.1へ崩れ落ちた。「強い買い」が一夜にして「様子見」に変わったのだ。指標がほとんど動いていないのに、なぜ信号が丸ごと反転したのか——あるユーザーがそう問うた。答えを探すうちに、私たちはスコア算出の最も基礎的な欠陥にぶつかった。</p>
  <p class="es">Era el día en que el MVRV Z-Score de Bitcoin acababa de cruzar 1,00. El día anterior marcaba 0,98; ese día, 1,03. El indicador apenas se había movido. Sin embargo, la puntuación de compra se desplomó de 8,4 a 5,1: 'compra fuerte' se había convertido en 'esperar' de la noche a la mañana. Un usuario preguntó por qué la señal se había invertido por completo si el indicador apenas se había movido. Buscando la respuesta, chocamos con el fallo más básico en cómo convertíamos los datos en una puntuación.</p>
  <p class="de">Es war der Tag, an dem Bitcoins MVRV Z-Score gerade die 1,00 überschritten hatte. Am Vortag stand er bei 0,98, an jenem Tag bei 1,03. Der Wert hatte sich kaum bewegt. Dennoch stürzte der Kauf-Score von 8,4 auf 5,1 — aus 'starkem Kauf' war über Nacht 'abwarten' geworden. Ein Nutzer fragte, warum das Signal komplett kippte, obwohl sich der Indikator kaum gerührt hatte. Auf der Suche nach der Antwort stießen wir auf den grundlegendsten Fehler darin, wie wir Daten in einen Score verwandelten.</p>
  <p class="fr">C'était le jour où le MVRV Z-Score du Bitcoin venait de franchir 1,00. La veille, il affichait 0,98 ; ce jour-là, 1,03. L'indicateur avait à peine bougé. Pourtant, le score d'achat s'est effondré de 8,4 à 5,1 : « achat fort » était devenu « attendre » du jour au lendemain. Un utilisateur a demandé pourquoi le signal s'était entièrement inversé alors que l'indicateur avait à peine bougé. En cherchant la réponse, nous avons heurté le défaut le plus fondamental de notre façon de transformer les données en score.</p>
  <p class="pt">Era o dia em que o MVRV Z-Score do Bitcoin acabara de cruzar 1,00. No dia anterior marcava 0,98; naquele dia, 1,03. O indicador mal havia se movido. Ainda assim, a pontuação de compra desabou de 8,4 para 5,1 — 'compra forte' virara 'esperar' da noite para o dia. Um usuário perguntou por que o sinal se invertera por completo se o indicador mal havia se mexido. Ao buscar a resposta, esbarramos na falha mais básica de como transformávamos dados em pontuação.</p>
  <p class="tr">Bitcoin'in MVRV Z-Skoru'nun 1,00'i yeni geçtiği gündü. Bir önceki gün 0,98, o gün 1,03 gösteriyordu. Gösterge neredeyse hiç kımıldamamıştı. Yine de alım puanı 8,4'ten 5,1'e çöktü — 'güçlü alım' bir gecede 'bekle'ye dönüşmüştü. Bir kullanıcı, gösterge neredeyse hiç oynamamışken sinyalin neden tümüyle terse döndüğünü sordu. Yanıtı ararken, veriyi puana çevirme biçimimizdeki en temel kusura çarptık.</p>
  <p class="vi">Đó là ngày MVRV Z-Score của Bitcoin vừa vượt qua 1,00. Hôm trước là 0,98; hôm đó là 1,03. Chỉ báo gần như không nhúc nhích. Vậy mà điểm mua sụp từ 8,4 xuống 5,1 — 'mua mạnh' bỗng thành 'chờ đợi' chỉ sau một đêm. Một người dùng hỏi vì sao tín hiệu lại đảo ngược hoàn toàn khi chỉ báo hầu như không đổi. Đi tìm câu trả lời, chúng tôi va phải khiếm khuyết cơ bản nhất trong cách biến dữ liệu thành điểm số.</p>

  <p class="ko">문제는 데이터가 아니라 데이터를 점수로 바꾸는 방식에 있었다. 당시 우리는 지표를 몇 개의 구간으로 나눠 점수를 매겼다. MVRV가 1.0 미만이면 만점, 1.0 이상이면 절반. 이 방식은 구현이 간단하고 직관적이지만, 구간의 경계에서 점수가 절벽처럼 떨어진다. 지표가 0.99에서 1.01로 단 0.02만 움직여도, 그 0.02가 하필 경계를 넘는 순간 점수는 몇 점씩 폭락했다.</p>
  <p class="en">The problem was not the data but how we turned the data into a score. Back then we scored each indicator by carving it into a few buckets: MVRV below 1.0 earned full marks, at or above 1.0 earned half. That approach is simple and intuitive, but at a bucket's edge the score falls off a cliff. Move the metric from 0.99 to 1.01 — a mere 0.02 — and the instant that 0.02 crosses the boundary, the score plunges by several points.</p>
  <p class="ja">問題はデータではなく、データをスコアに変える方法にあった。当時、私たちは指標をいくつかの区間に分けて点数を付けていた。MVRVが1.0未満なら満点、1.0以上なら半分。この方式は実装が簡単で直感的だが、区間の境界でスコアが崖のように落ちる。指標が0.99から1.01へ、わずか0.02動いただけでも、その0.02が境界を越えた瞬間にスコアは数点も暴落した。</p>
  <p class="es">El problema no eran los datos, sino cómo los convertíamos en una puntuación. Entonces puntuábamos cada indicador dividiéndolo en unos pocos tramos: MVRV por debajo de 1,0 obtenía la nota máxima; en 1,0 o por encima, la mitad. Es un método simple e intuitivo, pero en el borde de un tramo la puntuación cae por un precipicio. Mueve el indicador de 0,99 a 1,01 —apenas 0,02— y, en cuanto ese 0,02 cruza la frontera, la puntuación se desploma varios puntos.</p>
  <p class="de">Das Problem waren nicht die Daten, sondern wie wir sie in einen Score verwandelten. Damals bewerteten wir jeden Indikator, indem wir ihn in wenige Stufen zerlegten: MVRV unter 1,0 erhielt die Höchstnote, bei 1,0 oder darüber die Hälfte. Das ist einfach und intuitiv, doch am Rand einer Stufe fällt der Score über eine Klippe. Bewegt sich der Wert von 0,99 auf 1,01 — nur 0,02 — stürzt der Score in dem Moment, in dem diese 0,02 die Grenze überschreiten, um mehrere Punkte ab.</p>
  <p class="fr">Le problème n'était pas les données, mais notre façon de les transformer en score. À l'époque, nous notions chaque indicateur en le découpant en quelques tranches : un MVRV sous 1,0 obtenait la note maximale, à 1,0 ou au-dessus, la moitié. C'est simple et intuitif, mais au bord d'une tranche le score tombe d'une falaise. Faites passer l'indicateur de 0,99 à 1,01 — à peine 0,02 — et dès que ce 0,02 franchit la frontière, le score plonge de plusieurs points.</p>
  <p class="pt">O problema não eram os dados, mas como os transformávamos em pontuação. Na época, pontuávamos cada indicador dividindo-o em algumas faixas: MVRV abaixo de 1,0 recebia nota máxima; em 1,0 ou acima, metade. É simples e intuitivo, mas na borda de uma faixa a pontuação cai de um penhasco. Mova o indicador de 0,99 para 1,01 — apenas 0,02 — e, no instante em que esse 0,02 cruza a fronteira, a pontuação despenca vários pontos.</p>
  <p class="tr">Sorun veri değil, veriyi puana çevirme biçimimizdi. O dönem her göstergeyi birkaç aralığa bölerek puanlıyorduk: 1,0'ın altındaki MVRV tam not, 1,0 ve üzeri yarı not alıyordu. Bu yöntem basit ve sezgiseldir, ama bir aralığın kenarında puan uçurumdan düşer. Göstergeyi 0,99'dan 1,01'e — yalnızca 0,02 — oynatın; o 0,02 sınırı geçtiği anda puan birkaç puan birden çöker.</p>
  <p class="vi">Vấn đề không phải là dữ liệu, mà là cách chúng tôi biến dữ liệu thành điểm số. Khi đó, chúng tôi chấm mỗi chỉ báo bằng cách chia nó thành vài khoảng: MVRV dưới 1,0 được điểm tối đa, từ 1,0 trở lên chỉ còn một nửa. Cách này đơn giản và trực quan, nhưng ở ranh giới giữa các khoảng, điểm số rơi thẳng đứng. Dịch chỉ báo từ 0,99 lên 1,01 — chỉ 0,02 — và ngay khi 0,02 đó vượt qua ranh giới, điểm số lao xuống vài điểm.</p>

  <div class="ko">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">같은 지표, 다른 점수 곡선</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">점수</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">지표값 →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0.02 이동 → 3점 급락</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">구간식 (계단)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">선형 보간 (곡선)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ 계단식은 경계에서 점수가 절벽처럼 떨어진다. 곡선은 지표가 움직인 만큼만 점수를 바꾼다.</p>
  </div>
  <div class="en">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Same metric, two ways to score</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Score</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Metric value →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0.02 move → 3-pt drop</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Buckets (steps)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Interpolation (curve)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Buckets drop the score off a cliff at the boundary. The curve changes the score only as much as the metric moves.</p>
  </div>
  <div class="ja">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">同じ指標、二つの採点法</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">スコア</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">指標値 →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0.02の移動→3点急落</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">区間式(階段)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">線形補間(曲線)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ 区間式は境界でスコアが崖のように落ちる。曲線は指標が動いたぶんだけスコアを変える。</p>
  </div>
  <div class="es">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Mismo indicador, dos formas de puntuar</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Puntuación</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Valor →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → caída de 3 pts</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Tramos (escalones)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Interpolación (curva)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Los tramos hacen caer la puntuación por un precipicio en la frontera. La curva cambia la puntuación solo lo que se mueve el indicador.</p>
  </div>
  <div class="de">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Gleicher Wert, zwei Bewertungen</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Score</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Wert →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → 3-Punkte-Sturz</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Stufen</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Interpolation (Kurve)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Stufen lassen den Score an der Grenze über eine Klippe fallen. Die Kurve ändert den Score nur so weit, wie sich der Wert bewegt.</p>
  </div>
  <div class="fr">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Même indicateur, deux notations</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Score</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Valeur →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → chute de 3 pts</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Paliers</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Interpolation (courbe)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Les paliers font tomber le score d'une falaise à la frontière. La courbe ne change le score qu'autant que l'indicateur bouge.</p>
  </div>
  <div class="pt">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Mesmo indicador, duas notas</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Pontuação</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Valor →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → queda de 3 pts</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Faixas (degraus)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Interpolação (curva)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ As faixas fazem a pontuação cair de um penhasco na fronteira. A curva muda a pontuação apenas o quanto o indicador se move.</p>
  </div>
  <div class="tr">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Aynı gösterge, iki puanlama</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Puan</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Değer →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → 3 puan düşüş</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Aralık (basamak)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">İnterpolasyon (eğri)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Aralıklar sınırda puanı uçurumdan düşürür. Eğri puanı yalnızca gösterge kadar değiştirir.</p>
  </div>
  <div class="vi">
  <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#080808;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <rect x="20" y="16" width="720" height="268" rx="14" fill="#151515" stroke="rgba(255,255,255,0.06)"/>
    <text x="48" y="48" fill="#f0f0f0" font-size="17" font-weight="700" font-family="sans-serif">Cùng chỉ báo, hai cách chấm</text>
    <line x1="70" y1="80" x2="70" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <line x1="70" y1="240" x2="700" y2="240" stroke="#3a3a3a" stroke-width="1.5"/>
    <text x="52" y="86" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">10</text>
    <text x="52" y="244" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">0</text>
    <text x="40" y="165" fill="#71717a" font-size="11" text-anchor="middle" font-family="sans-serif" transform="rotate(-90 40 165)">Điểm</text>
    <text x="700" y="262" fill="#71717a" font-size="11" text-anchor="end" font-family="sans-serif">Giá trị →</text>
    <polyline points="70,92 250,92 250,140 430,140 430,205 610,205 610,232 700,232" fill="none" stroke="#f87171" stroke-width="2.4" stroke-dasharray="6 5"/>
    <path d="M70,92 C250,96 300,150 430,168 C560,186 640,224 700,230" fill="none" stroke="#22c55e" stroke-width="2.8"/>
    <line x1="430" y1="80" x2="430" y2="240" stroke="#555" stroke-width="1" stroke-dasharray="3 4"/>
    <circle cx="430" cy="140" r="4" fill="#f87171"/>
    <circle cx="430" cy="205" r="4" fill="#f87171"/>
    <text x="442" y="176" fill="#f87171" font-size="12" font-weight="700" font-family="sans-serif">0,02 → giảm 3 điểm</text>
    <rect x="500" y="52" width="14" height="3" fill="#f87171"/>
    <text x="520" y="57" fill="#aaaaaa" font-size="12" font-family="sans-serif">Khoảng (bậc)</text>
    <rect x="500" y="70" width="14" height="3" fill="#22c55e"/>
    <text x="520" y="75" fill="#aaaaaa" font-size="12" font-family="sans-serif">Nội suy (đường cong)</text>
  </svg>
  <p style="color:#71717a;font-size:12px;margin-top:-8px">▲ Kiểu khoảng làm điểm rơi thẳng đứng tại ranh giới. Đường cong chỉ đổi điểm đúng bằng mức chỉ báo dịch chuyển.</p>
  </div>

  <h2 class="ko">경계가 만든 절벽</h2>
  <h2 class="en">The Cliff the Boundary Built</h2>
  <h2 class="ja">境界が生んだ崖</h2>
  <h2 class="es">El precipicio que creó la frontera</h2>
  <h2 class="de">Die Klippe, die die Grenze schuf</h2>
  <h2 class="fr">La falaise créée par la frontière</h2>
  <h2 class="pt">O penhasco criado pela fronteira</h2>
  <h2 class="tr">Sınırın Yarattığı Uçurum</h2>
  <h2 class="vi">Vách đá do ranh giới tạo ra</h2>

  <p class="ko">절벽의 문제는 두 가지다. 첫째, 지표의 사소한 노이즈가 신호를 뒤집는다. 온체인 지표는 하루에도 소수점 아래로 흔들리는데, 그 흔들림이 하필 경계에 걸치면 점수가 매일 급등락한다. 사용자에게는 시장이 급변한 것처럼 보이지만, 실제로는 아무 일도 일어나지 않았다. 둘째, 절벽은 없는 정밀함을 지어낸다. 1.0이라는 숫자는 시장이 국면을 바꾸는 마법의 선이 아니다. 그것은 우리가 계산 편의를 위해 그은 임의의 금일 뿐이다. 시장은 0.99와 1.01 사이에서 아무것도 다르게 행동하지 않는다.</p>
  <p class="en">A cliff causes two problems. First, trivial noise in the metric flips the signal. On-chain indicators wobble by fractions every day, and when that wobble happens to straddle a boundary, the score lurches up and down daily. To the user it looks as if the market lurched, when in fact nothing happened. Second, a cliff manufactures a precision that isn't there. The number 1.0 is not a magic line where the market changes regime; it is an arbitrary mark we drew for computational convenience. The market does nothing differently between 0.99 and 1.01.</p>
  <p class="ja">崖の問題は二つある。第一に、指標の些細なノイズが信号を反転させる。オンチェーン指標は一日でも小数点以下で揺れるが、その揺れがちょうど境界に掛かると、スコアは毎日乱高下する。ユーザーには市場が急変したように見えるが、実際には何も起きていない。第二に、崖はありもしない精密さをでっち上げる。1.0という数字は市場が局面を変える魔法の線ではない。それは計算の都合で私たちが引いた恣意的な線にすぎない。市場は0.99と1.01の間で何ひとつ違う振る舞いをしない。</p>
  <p class="es">Un precipicio genera dos problemas. Primero, el ruido trivial del indicador invierte la señal. Los indicadores on-chain oscilan por fracciones cada día, y cuando esa oscilación cae justo sobre una frontera, la puntuación salta arriba y abajo a diario. Al usuario le parece que el mercado dio un salto, cuando en realidad no pasó nada. Segundo, un precipicio fabrica una precisión que no existe. El número 1,0 no es una línea mágica donde el mercado cambia de régimen; es una marca arbitraria que trazamos por comodidad de cálculo. El mercado no hace nada distinto entre 0,99 y 1,01.</p>
  <p class="de">Eine Klippe verursacht zwei Probleme. Erstens kippt triviales Rauschen im Wert das Signal. On-Chain-Indikatoren schwanken täglich um Bruchteile, und wenn dieses Schwanken gerade eine Grenze berührt, schnellt der Score täglich auf und ab. Dem Nutzer scheint es, als hätte der Markt einen Sprung gemacht, obwohl tatsächlich nichts geschah. Zweitens erfindet eine Klippe eine Präzision, die es nicht gibt. Die Zahl 1,0 ist keine magische Linie, an der der Markt sein Regime wechselt; sie ist eine willkürliche Marke, die wir aus Rechenbequemlichkeit gezogen haben. Zwischen 0,99 und 1,01 verhält sich der Markt in keiner Weise anders.</p>
  <p class="fr">Une falaise cause deux problèmes. D'abord, un bruit insignifiant de l'indicateur inverse le signal. Les indicateurs on-chain oscillent de quelques fractions chaque jour, et quand cette oscillation chevauche justement une frontière, le score monte et descend quotidiennement. À l'utilisateur, il semble que le marché a fait un bond, alors qu'en réalité rien ne s'est produit. Ensuite, une falaise fabrique une précision qui n'existe pas. Le nombre 1,0 n'est pas une ligne magique où le marché change de régime ; c'est une marque arbitraire que nous avons tracée par commodité de calcul. Le marché ne fait rien de différent entre 0,99 et 1,01.</p>
  <p class="pt">Um penhasco causa dois problemas. Primeiro, um ruído trivial do indicador inverte o sinal. Indicadores on-chain oscilam por frações todos os dias e, quando essa oscilação cai justamente sobre uma fronteira, a pontuação sobe e desce diariamente. Para o usuário parece que o mercado deu um salto, quando na verdade nada aconteceu. Segundo, um penhasco fabrica uma precisão que não existe. O número 1,0 não é uma linha mágica onde o mercado muda de regime; é uma marca arbitrária que traçamos por comodidade de cálculo. O mercado não faz nada diferente entre 0,99 e 1,01.</p>
  <p class="tr">Uçurum iki soruna yol açar. Birincisi, göstergedeki önemsiz gürültü sinyali ters çevirir. Zincir üstü göstergeler her gün ondalık kesirlerle salınır ve bu salınım tam bir sınıra denk geldiğinde puan her gün inip çıkar. Kullanıcıya piyasa sıçramış gibi görünür, oysa aslında hiçbir şey olmamıştır. İkincisi, uçurum var olmayan bir hassasiyet uydurur. 1,0 sayısı, piyasanın rejim değiştirdiği sihirli bir çizgi değildir; hesap kolaylığı için çizdiğimiz keyfî bir işarettir. Piyasa 0,99 ile 1,01 arasında hiçbir şeyi farklı yapmaz.</p>
  <p class="vi">Một vách đá gây ra hai vấn đề. Thứ nhất, nhiễu vụn vặt của chỉ báo làm đảo tín hiệu. Các chỉ báo on-chain dao động vài phần nhỏ mỗi ngày, và khi dao động đó vắt ngang ranh giới, điểm số nhảy lên xuống hằng ngày. Với người dùng, có vẻ thị trường vừa giật mạnh, trong khi thực ra chẳng có gì xảy ra. Thứ hai, vách đá tạo ra một độ chính xác không hề tồn tại. Con số 1,0 không phải lằn ranh thần kỳ nơi thị trường đổi chế độ; nó chỉ là vạch tùy tiện chúng tôi kẻ ra cho tiện tính toán. Thị trường chẳng hành xử khác đi chút nào giữa 0,99 và 1,01.</p>

  <p class="ko">계단식 점수는 오래된 기술적 지표들의 유산이다. RSI 30·70, 이동평균의 골든크로스처럼, 하나의 임계선으로 매수와 매도를 가르는 방식은 이해하기 쉽다. 그러나 이 단순함은 대가를 치른다. 임계선 근처에서 신호가 끊임없이 깜빡이는 '휩쏘(whipsaw)'다. 실제 트레이더가 임계선 하나에 기계적으로 반응하다 잦은 손절에 시달리는 이유가 바로 이것이다. 우리 점수도 똑같은 함정에 빠져 있었다.</p>
  <p class="en">Step-wise scoring is a legacy of the old technical indicators. Splitting buy from sell with a single threshold — RSI 30/70, a moving-average golden cross — is easy to grasp. But that simplicity exacts a price: the whipsaw, where the signal flickers on and off around the line. It is precisely why traders who react mechanically to a single threshold get ground down by repeated stop-outs. Our score had fallen into the same trap.</p>
  <p class="ja">段階式のスコアリングは古いテクニカル指標の遺産だ。RSIの30・70、移動平均のゴールデンクロスのように、一本の閾値で買いと売りを分ける方式は理解しやすい。だがこの単純さは代償を払う。閾値の近くで信号が絶えず点滅する「ダマシ(ウィップソー)」だ。一本の閾値に機械的に反応するトレーダーが頻繁な損切りに苦しむ理由がまさにこれだ。私たちのスコアも同じ罠に落ちていた。</p>
  <p class="es">La puntuación por escalones es una herencia de los viejos indicadores técnicos. Separar compra de venta con un único umbral —RSI 30/70, un cruce dorado de medias— es fácil de entender. Pero esa simplicidad tiene un precio: el whipsaw, esa señal que parpadea de encendida a apagada alrededor de la línea. Es exactamente por eso que los operadores que reaccionan mecánicamente a un solo umbral acaban desgastados por continuos stops. Nuestra puntuación había caído en la misma trampa.</p>
  <p class="de">Stufenweise Bewertung ist ein Erbe der alten technischen Indikatoren. Kauf und Verkauf mit einer einzigen Schwelle zu trennen — RSI 30/70, ein Golden Cross der Durchschnitte — ist leicht verständlich. Doch diese Einfachheit hat ihren Preis: den Whipsaw, bei dem das Signal rund um die Linie ständig an- und ausflackert. Genau deshalb reiben sich Trader, die mechanisch auf eine einzige Schwelle reagieren, an ständigen Stopps auf. Unser Score war in dieselbe Falle getappt.</p>
  <p class="fr">La notation par paliers est un héritage des vieux indicateurs techniques. Séparer l'achat de la vente avec un seul seuil — RSI 30/70, un croisement doré de moyennes — est facile à saisir. Mais cette simplicité a un prix : le whipsaw, ce signal qui clignote autour de la ligne. C'est précisément pour cela que les traders qui réagissent mécaniquement à un seul seuil s'usent en stops répétés. Notre score était tombé dans le même piège.</p>
  <p class="pt">A pontuação em degraus é herança dos velhos indicadores técnicos. Separar compra de venda com um único limiar — RSI 30/70, um cruzamento dourado de médias — é fácil de entender. Mas essa simplicidade cobra um preço: o whipsaw, aquele sinal que pisca ligando e desligando em torno da linha. É exatamente por isso que traders que reagem mecanicamente a um único limiar acabam desgastados por stops repetidos. Nossa pontuação havia caído na mesma armadilha.</p>
  <p class="tr">Basamaklı puanlama, eski teknik göstergelerin mirasıdır. Alımı satımdan tek bir eşikle ayırmak — RSI 30/70, ortalamaların altın kesişimi — anlaşılması kolaydır. Ama bu basitliğin bir bedeli var: çizginin çevresinde sinyalin sürekli yanıp sönmesi, yani whipsaw. Tek bir eşiğe mekanik tepki veren yatırımcıların sık sık stop yiyerek yıpranmasının nedeni tam da budur. Bizim puanımız da aynı tuzağa düşmüştü.</p>
  <p class="vi">Chấm điểm theo bậc thang là di sản của các chỉ báo kỹ thuật cũ. Tách mua khỏi bán bằng một ngưỡng duy nhất — RSI 30/70, giao cắt vàng của đường trung bình — thì dễ hiểu. Nhưng sự đơn giản đó phải trả giá: hiện tượng whipsaw, khi tín hiệu chớp tắt liên tục quanh lằn ranh. Đó chính là lý do những trader phản ứng máy móc với một ngưỡng duy nhất bị bào mòn vì liên tục dính stop. Điểm số của chúng tôi cũng đã rơi vào chính cái bẫy ấy.</p>

  <h2 class="ko">구간을 잇는 곡선</h2>
  <h2 class="en">A Curve That Joins the Points</h2>
  <h2 class="ja">点をつなぐ曲線</h2>
  <h2 class="es">Una curva que une los puntos</h2>
  <h2 class="de">Eine Kurve, die die Punkte verbindet</h2>
  <h2 class="fr">Une courbe qui relie les points</h2>
  <h2 class="pt">Uma curva que une os pontos</h2>
  <h2 class="tr">Noktaları Birleştiren Eğri</h2>
  <h2 class="vi">Đường cong nối các điểm</h2>

  <p class="ko">해법은 계단을 곡선으로 바꾸는 것이었다. 우리는 지표마다 몇 개의 기준점(앵커)을 정하고, 그 사이를 직선으로 이어 점수를 매겼다. 이것을 구간 선형 보간이라 부른다. 예를 들어 MVRV가 0.5에서 만점, 2.0에서 0점이라면, 그 사이의 값은 두 점을 잇는 직선 위에서 계산된다. 이제 0.99와 1.01은 거의 같은 점수를 받는다. 점수가 바뀌려면 지표가 '의미 있게' 움직여야 한다.</p>
  <p class="en">The fix was to turn the staircase into a curve. For each indicator we set a few anchor points and drew straight lines between them to compute the score. We call this piecewise linear interpolation. If MVRV scores full marks at 0.5 and zero at 2.0, any value in between is read off the straight line joining those two points. Now 0.99 and 1.01 earn almost the same score. For the score to change, the metric must move meaningfully.</p>
  <p class="ja">解決策は階段を曲線に変えることだった。指標ごとにいくつかの基準点(アンカー)を定め、その間を直線でつないでスコアを算出した。これを区間線形補間と呼ぶ。たとえばMVRVが0.5で満点、2.0で0点なら、その間の値は二点を結ぶ直線の上で計算される。いまや0.99と1.01はほぼ同じスコアを受ける。スコアが変わるには、指標が「意味のある」動きをしなければならない。</p>
  <p class="es">La solución fue convertir la escalera en una curva. Para cada indicador fijamos unos pocos puntos de anclaje y trazamos rectas entre ellos para calcular la puntuación. A esto lo llamamos interpolación lineal por tramos. Si el MVRV saca la nota máxima en 0,5 y cero en 2,0, cualquier valor intermedio se lee sobre la recta que une esos dos puntos. Ahora 0,99 y 1,01 obtienen casi la misma puntuación. Para que la puntuación cambie, el indicador debe moverse de forma significativa.</p>
  <p class="de">Die Lösung war, die Treppe in eine Kurve zu verwandeln. Für jeden Indikator legten wir einige Ankerpunkte fest und zogen gerade Linien dazwischen, um den Score zu berechnen. Das nennen wir stückweise lineare Interpolation. Erzielt MVRV bei 0,5 die Höchstnote und bei 2,0 null, so wird jeder Wert dazwischen auf der Geraden abgelesen, die diese beiden Punkte verbindet. Nun erhalten 0,99 und 1,01 fast denselben Score. Damit sich der Score ändert, muss sich der Wert bedeutsam bewegen.</p>
  <p class="fr">La solution était de transformer l'escalier en courbe. Pour chaque indicateur, nous avons fixé quelques points d'ancrage et tracé des droites entre eux pour calculer le score. Nous appelons cela l'interpolation linéaire par morceaux. Si le MVRV vaut la note maximale à 0,5 et zéro à 2,0, toute valeur intermédiaire se lit sur la droite reliant ces deux points. Désormais, 0,99 et 1,01 obtiennent presque le même score. Pour que le score change, l'indicateur doit bouger de façon significative.</p>
  <p class="pt">A solução foi transformar a escada em curva. Para cada indicador definimos alguns pontos de ancoragem e traçamos retas entre eles para calcular a pontuação. Chamamos isso de interpolação linear por partes. Se o MVRV tira nota máxima em 0,5 e zero em 2,0, qualquer valor intermediário é lido sobre a reta que une esses dois pontos. Agora 0,99 e 1,01 recebem quase a mesma pontuação. Para a pontuação mudar, o indicador precisa se mover de forma significativa.</p>
  <p class="tr">Çözüm, merdiveni bir eğriye çevirmekti. Her gösterge için birkaç çıpa noktası belirledik ve puanı hesaplamak için aralarına düz çizgiler çektik. Buna parçalı doğrusal interpolasyon diyoruz. MVRV 0,5'te tam not, 2,0'de sıfır alıyorsa, aradaki her değer bu iki noktayı birleştiren doğru üzerinde okunur. Artık 0,99 ile 1,01 neredeyse aynı puanı alıyor. Puanın değişmesi için göstergenin anlamlı biçimde hareket etmesi gerekir.</p>
  <p class="vi">Giải pháp là biến bậc thang thành đường cong. Với mỗi chỉ báo, chúng tôi đặt vài điểm neo và kẻ các đoạn thẳng nối chúng để tính điểm. Chúng tôi gọi đó là nội suy tuyến tính từng đoạn. Nếu MVRV đạt điểm tối đa tại 0,5 và bằng 0 tại 2,0, thì mọi giá trị ở giữa được đọc trên đoạn thẳng nối hai điểm ấy. Giờ đây 0,99 và 1,01 nhận điểm gần như nhau. Muốn điểm thay đổi, chỉ báo phải dịch chuyển một cách đáng kể.</p>

  <p class="ko">물론 곡선에도 대가가 있다. 계단은 '지금 신호가 켜졌다'를 선명하게 외치지만, 곡선은 완만해서 그 선명함을 일부 잃는다. 우리는 이 둘을 절충했다. 정말 중요한 구간—과열의 정점이나 항복의 바닥—에서는 곡선의 기울기를 가파르게 두어 결정력을 살리고, 나머지 애매한 구간에서는 완만하게 두어 휩쏘를 없앴다. 점수는 이제 지표가 움직인 만큼만 움직인다. 그 이상도, 그 이하도 아니다.</p>
  <p class="en">A curve, of course, has its own cost. A step shouts 'the signal is on now,' while a smooth curve, being gradual, gives up some of that clarity. We split the difference. In the zones that truly matter — the peak of overheating, the floor of capitulation — we keep the curve steep to preserve decisiveness; across the ambiguous middle we keep it gentle to kill the whipsaw. The score now moves only as much as the metric moves. No more, no less.</p>
  <p class="ja">もちろん曲線にも代償がある。階段は「今、信号が点いた」と鮮明に叫ぶが、曲線は緩やかなぶんその鮮明さを一部失う。私たちはこの二つを折衷した。本当に重要な区間——過熱の頂点や投降の底——では曲線の傾きを急にして決定力を保ち、残りの曖昧な区間では緩やかにしてダマシを消した。スコアはいまや指標が動いたぶんだけ動く。それ以上でも、それ以下でもない。</p>
  <p class="es">Una curva, claro, tiene su propio coste. Un escalón grita 'la señal está encendida ahora', mientras que una curva suave, por ser gradual, cede parte de esa nitidez. Buscamos un punto medio. En las zonas que de verdad importan —el pico del sobrecalentamiento, el suelo de la capitulación— mantenemos la curva empinada para preservar la contundencia; en el medio ambiguo la mantenemos suave para matar el whipsaw. Ahora la puntuación se mueve solo lo que se mueve el indicador. Ni más, ni menos.</p>
  <p class="de">Eine Kurve hat natürlich ihren eigenen Preis. Eine Stufe ruft 'das Signal ist jetzt an', während eine glatte Kurve, weil sie allmählich ist, etwas von dieser Klarheit aufgibt. Wir gingen einen Mittelweg. In den wirklich wichtigen Zonen — dem Gipfel der Überhitzung, dem Boden der Kapitulation — halten wir die Kurve steil, um die Entschiedenheit zu bewahren; in der mehrdeutigen Mitte halten wir sie sanft, um den Whipsaw abzutöten. Der Score bewegt sich nun nur so weit, wie sich der Wert bewegt. Nicht mehr und nicht weniger.</p>
  <p class="fr">Une courbe a bien sûr son propre coût. Un palier crie « le signal est allumé maintenant », tandis qu'une courbe douce, parce qu'elle est progressive, cède une part de cette netteté. Nous avons trouvé un compromis. Dans les zones qui comptent vraiment — le sommet de la surchauffe, le plancher de la capitulation — nous gardons la courbe raide pour préserver la fermeté ; dans le milieu ambigu, nous la gardons douce pour tuer le whipsaw. Le score ne bouge désormais qu'autant que l'indicateur bouge. Ni plus, ni moins.</p>
  <p class="pt">Uma curva, claro, tem seu próprio custo. Um degrau grita 'o sinal está ligado agora', enquanto uma curva suave, por ser gradual, abre mão de parte dessa nitidez. Buscamos um meio-termo. Nas zonas que realmente importam — o pico do sobreaquecimento, o fundo da capitulação — mantemos a curva íngreme para preservar a firmeza; no meio ambíguo, mantemos suave para matar o whipsaw. Agora a pontuação se move apenas o quanto o indicador se move. Nem mais, nem menos.</p>
  <p class="tr">Elbette bir eğrinin de kendi bedeli var. Basamak 'sinyal şimdi açıldı' diye haykırır; yumuşak bir eğri ise kademeli olduğu için bu netliğin bir kısmını verir. İkisinin ortasını bulduk. Gerçekten önemli bölgelerde — aşırı ısınmanın tepesi, teslimiyetin dibi — kararlılığı korumak için eğriyi dik tutuyoruz; belirsiz orta kısımda ise whipsaw'ı yok etmek için yumuşak tutuyoruz. Puan artık yalnızca gösterge kadar hareket ediyor. Ne fazla, ne eksik.</p>
  <p class="vi">Tất nhiên đường cong cũng có cái giá của nó. Bậc thang hét lên 'tín hiệu đã bật ngay bây giờ', còn đường cong mượt, vì diễn ra từ từ, đánh mất một phần sự sắc bén ấy. Chúng tôi chọn cách dung hòa. Ở những vùng thực sự quan trọng — đỉnh của quá nóng, đáy của đầu hàng — chúng tôi giữ đường cong dốc để bảo toàn tính dứt khoát; ở khoảng giữa mơ hồ, chúng tôi giữ nó thoải để triệt tiêu whipsaw. Điểm số giờ chỉ dịch chuyển đúng bằng mức chỉ báo dịch chuyển. Không hơn, không kém.</p>

  <p class="ko">이 변경은 화면에 드러나는 숫자 하나 새로 만들지 않았다. 그러나 그 숫자가 '어떻게' 움직이는지를 바꿨다. 패치 이후, 지표가 경계를 스칠 때마다 점수가 요동치던 현상은 사라졌다. 점수는 더 조용해졌고, 그만큼 더 믿을 만해졌다.</p>
  <p class="en">This change added not a single new number to the screen. But it changed how those numbers move. After the patch, the score no longer convulses every time a metric grazes a boundary. The score became quieter — and, in equal measure, more trustworthy.</p>
  <p class="ja">この変更は画面に映る数字を一つも新たに作らなかった。だがその数字が「どう」動くかを変えた。パッチ以降、指標が境界をかすめるたびにスコアが乱高下する現象は消えた。スコアはより静かになり、そのぶん信頼できるものになった。</p>
  <p class="es">Este cambio no añadió ni un solo número nuevo a la pantalla. Pero cambió cómo se mueven esos números. Tras el parche, la puntuación ya no convulsiona cada vez que un indicador roza una frontera. La puntuación se volvió más silenciosa y, en la misma medida, más confiable.</p>
  <p class="de">Diese Änderung fügte dem Bildschirm keine einzige neue Zahl hinzu. Aber sie änderte, wie sich diese Zahlen bewegen. Nach dem Patch krampft der Score nicht mehr jedes Mal, wenn ein Wert eine Grenze streift. Der Score wurde ruhiger — und im selben Maße vertrauenswürdiger.</p>
  <p class="fr">Ce changement n'a ajouté aucun nouveau chiffre à l'écran. Mais il a changé la façon dont ces chiffres bougent. Après le patch, le score ne convulse plus chaque fois qu'un indicateur effleure une frontière. Le score est devenu plus calme — et, d'autant, plus digne de confiance.</p>
  <p class="pt">Essa mudança não acrescentou um único número novo à tela. Mas mudou como esses números se movem. Após o patch, a pontuação não convulsiona mais toda vez que um indicador roça uma fronteira. A pontuação ficou mais silenciosa — e, na mesma medida, mais confiável.</p>
  <p class="tr">Bu değişiklik ekrana tek bir yeni sayı bile eklemedi. Ama o sayıların nasıl hareket ettiğini değiştirdi. Yamadan sonra puan, bir gösterge her sınırı sıyırdığında artık kasılmıyor. Puan daha sessiz — ve aynı ölçüde daha güvenilir — hale geldi.</p>
  <p class="vi">Thay đổi này không thêm một con số mới nào lên màn hình. Nhưng nó thay đổi cách những con số đó dịch chuyển. Sau bản vá, điểm số không còn co giật mỗi khi một chỉ báo lướt qua ranh giới. Điểm số trở nên tĩnh hơn — và ở mức tương đương, đáng tin hơn.</p>

  <div class="box ko">좋은 점수는 데이터가 움직인 만큼만 움직인다. 연속적인 데이터에는 연속적인 점수가 어울린다. 경계에서의 정밀함은 진짜 정밀함이 아니라, 우리가 그은 금이 만든 착시였다.</div>
  <div class="box en">A good score moves only as much as the data moves. Continuous data deserves a continuous score. Precision at a boundary was never real precision — it was an illusion created by a line we ourselves drew.</div>
  <div class="box ja">良いスコアはデータが動いたぶんだけ動く。連続的なデータには連続的なスコアがふさわしい。境界での精密さは本物の精密さではなく、私たちが引いた線が生んだ錯覚だった。</div>
  <div class="box es">Una buena puntuación se mueve solo lo que se mueven los datos. Los datos continuos merecen una puntuación continua. La precisión en una frontera nunca fue precisión real: fue una ilusión creada por una línea que nosotros mismos trazamos.</div>
  <div class="box de">Ein guter Score bewegt sich nur so weit, wie sich die Daten bewegen. Kontinuierliche Daten verdienen einen kontinuierlichen Score. Präzision an einer Grenze war nie echte Präzision — sie war eine Illusion, geschaffen von einer Linie, die wir selbst gezogen haben.</div>
  <div class="box fr">Un bon score ne bouge qu'autant que bougent les données. Des données continues méritent un score continu. La précision à une frontière n'a jamais été une vraie précision — c'était une illusion créée par une ligne que nous avions nous-mêmes tracée.</div>
  <div class="box pt">Uma boa pontuação se move apenas o quanto os dados se movem. Dados contínuos merecem uma pontuação contínua. Precisão em uma fronteira nunca foi precisão real — foi uma ilusão criada por uma linha que nós mesmos traçamos.</div>
  <div class="box tr">İyi bir puan yalnızca veri kadar hareket eder. Sürekli veri, sürekli bir puanı hak eder. Bir sınırdaki hassasiyet asla gerçek hassasiyet değildi — kendi çizdiğimiz bir çizginin yarattığı bir yanılsamaydı.</div>
  <div class="box vi">Một điểm số tốt chỉ dịch chuyển đúng bằng mức dữ liệu dịch chuyển. Dữ liệu liên tục xứng đáng có một điểm số liên tục. Độ chính xác ở ranh giới chưa bao giờ là chính xác thật — đó là ảo giác do chính lằn ranh chúng tôi kẻ ra tạo nên.</div>

<?php require __DIR__.'/_footer.php'; ?>
