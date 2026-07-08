<?php $slug = 'deribit-put-skew-surge-80k-call-crowding-gap'; require __DIR__.'/_header.php'; ?>

  <p class="ko">이란-미국 휴전 파기 소식에 비트코인이 밀린 이야기는 이미 여러 각도에서 다뤄졌다. 그런데 같은 시각 디리빗 옵션시장 안을 들여다보면 조금 다른 그림이 보인다. 가격이 흔들리는 동안 옵션 트레이더들이 실제로 어디에 베팅했는지를 뜯어보면, 스큐(풋 프리미엄)와 실제 거래량·미결제약정이 정반대 방향을 가리키고 있었다.</p>
  <p class="en">The story of Bitcoin sliding on news that the U.S.-Iran ceasefire had collapsed has already been covered from several angles. But look inside Deribit's options market at the same moment, and a slightly different picture emerges. Break down where options traders were actually putting money to work while the price wobbled, and the skew (the put premium) and the actual volume and open interest were pointing in opposite directions.</p>
  <p class="ja">イラン・米国の停戦崩壊のニュースでビットコインが下落した経緯は、すでに複数の角度から取り上げられている。しかし同じ時間帯にディリビットのオプション市場の内部を見ると、少し違う絵が見えてくる。価格が揺れている間にオプショントレーダーが実際にどこへ資金を投じていたかを分解すると、スキュー(プットのプレミアム)と実際の出来高・建玉はまったく逆方向を指していた。</p>
  <p class="es">La historia de que Bitcoin cayó tras la noticia del colapso del alto el fuego entre EE. UU. e Irán ya se ha cubierto desde varios ángulos. Pero si se mira dentro del mercado de opciones de Deribit en ese mismo momento, aparece un cuadro ligeramente distinto. Al desglosar dónde apostaba realmente el dinero de los operadores de opciones mientras el precio se tambaleaba, el sesgo (la prima de las puts) y el volumen y el interés abierto reales apuntaban en direcciones opuestas.</p>
  <p class="de">Die Geschichte, dass Bitcoin nach der Nachricht vom Zusammenbruch des Waffenstillstands zwischen den USA und Iran fiel, wurde bereits aus mehreren Blickwinkeln beleuchtet. Doch wirft man einen Blick ins Innere von Deribits Optionsmarkt zum selben Zeitpunkt, ergibt sich ein etwas anderes Bild. Schlüsselt man auf, wo Optionshändler ihr Geld tatsächlich einsetzten, während der Kurs schwankte, zeigten Skew (die Put-Prämie) und das tatsächliche Volumen sowie Open Interest in entgegengesetzte Richtungen.</p>
  <p class="fr">L'histoire du bitcoin qui a chuté à l'annonce de l'effondrement du cessez-le-feu entre les États-Unis et l'Iran a déjà été couverte sous plusieurs angles. Mais si l'on regarde à l'intérieur du marché des options de Deribit au même moment, un tableau légèrement différent se dessine. En décomposant où les traders d'options plaçaient réellement leur argent pendant que le prix vacillait, le skew (la prime des puts) et le volume et l'open interest réels pointaient dans des directions opposées.</p>
  <p class="pt">A história de que o bitcoin caiu com a notícia do colapso do cessar-fogo entre EUA e Irã já foi coberta sob vários ângulos. Mas olhando dentro do mercado de opções da Deribit no mesmo momento, surge um quadro um pouco diferente. Ao detalhar onde os traders de opções realmente colocavam seu dinheiro enquanto o preço oscilava, o skew (o prêmio das puts) e o volume e open interest reais apontavam em direções opostas.</p>
  <p class="tr">ABD-İran ateşkesinin çöktüğü haberiyle Bitcoin'in gerilemesi öyküsü zaten birkaç açıdan ele alındı. Ancak aynı anda Deribit'in opsiyon piyasasının içine bakıldığında biraz farklı bir tablo ortaya çıkıyor. Fiyat sallanırken opsiyon yatırımcılarının parayı gerçekte nereye yatırdığını incelediğinizde, skew (put primi) ile gerçek işlem hacmi ve açık pozisyonun tam tersi yönleri gösterdiği görülüyor.</p>
  <p class="vi">Câu chuyện Bitcoin trượt giá trước tin lệnh ngừng bắn Mỹ-Iran sụp đổ đã được đề cập từ nhiều góc độ. Nhưng nhìn vào bên trong thị trường quyền chọn của Deribit cùng thời điểm đó, một bức tranh hơi khác xuất hiện. Khi phân tích xem các nhà giao dịch quyền chọn thực sự đặt tiền vào đâu trong lúc giá dao động, độ lệch (skew, mức phụ trội của put) và khối lượng giao dịch cùng open interest thực tế lại chỉ theo hai hướng ngược nhau.</p>

  <p class="ko">1주물 풋-콜 스큐는 6월 말 대비 다시 방어적으로 기울며 하루 만에 눈에 띄게 뛰었다. 그런데 같은 날 실제로 손바뀜한 옵션 계약 수를 세어 보면 콜이 풋보다 훨씬 많았고, 시장에서 가장 붐비는 단일 포지션은 여전히 현재가보다 30% 가까이 높은 콜 옵션이었다. 이 글은 두 신호가 서로 다른 이야기를 하는 지금 옵션시장의 구조를 진단한다 — 어느 쪽이 맞는지 예측하는 글이 아니라, 지켜봐야 할 균열이 어디에 있는지 짚는 글이다.</p>
  <p class="en">The one-week put-call skew swung back toward the defensive side compared to late June, jumping noticeably in a single day. Yet count the actual contracts that changed hands that same day, and calls outnumbered puts by a wide margin — with the single most crowded position in the market still a call option sitting nearly 30% above spot. This piece diagnoses the current structure of an options market where two signals are telling different stories, not which one will turn out to be right, but where the fault line actually sits.</p>
  <p class="ja">1週間物のプット・コールスキューは、6月末と比べて再び防御的に傾き、わずか1日で目立って跳ね上がった。しかし同じ日に実際に取引された契約数を数えると、コールがプットをはるかに上回っており、市場で最も混み合った単一ポジションは依然として現在価格より30%近く高いコールオプションだった。この記事は、二つのシグナルが異なる物語を語る今のオプション市場の構造を診断するものであり、どちらが正しいかを予測するのではなく、注視すべき亀裂がどこにあるかを指摘するものだ。</p>
  <p class="es">El sesgo put-call a una semana volvió a inclinarse hacia el lado defensivo respecto a finales de junio, saltando notablemente en un solo día. Sin embargo, al contar los contratos que realmente cambiaron de manos ese mismo día, las calls superaron ampliamente a las puts, y la posición individual más concurrida del mercado seguía siendo una opción call situada casi un 30% por encima del precio spot. Este artículo diagnostica la estructura actual de un mercado de opciones donde dos señales cuentan historias distintas, no cuál resultará correcta, sino dónde se encuentra realmente la fractura que hay que vigilar.</p>
  <p class="de">Der einwöchige Put-Call-Skew schwenkte im Vergleich zu Ende Juni wieder auf die defensive Seite und sprang innerhalb eines einzigen Tages spürbar nach oben. Zählt man jedoch die tatsächlich gehandelten Kontrakte desselben Tages, übertrafen Calls die Puts deutlich — und die am stärksten überfüllte Einzelposition am Markt war weiterhin eine Call-Option, die fast 30% über dem Spotpreis liegt. Dieser Beitrag diagnostiziert die aktuelle Struktur eines Optionsmarktes, in dem zwei Signale unterschiedliche Geschichten erzählen — nicht welches sich als richtig erweisen wird, sondern wo die eigentliche Bruchlinie liegt, die es zu beobachten gilt.</p>
  <p class="fr">Le skew put-call à une semaine a de nouveau basculé vers le côté défensif par rapport à fin juin, bondissant nettement en une seule journée. Pourtant, si l'on compte les contrats réellement échangés ce même jour, les calls ont largement dépassé les puts, et la position individuelle la plus encombrée du marché restait une option call se situant près de 30% au-dessus du spot. Cet article diagnostique la structure actuelle d'un marché d'options où deux signaux racontent des histoires différentes — non pas lequel se révélera juste, mais où se situe réellement la ligne de faille à surveiller.</p>
  <p class="pt">O skew put-call de uma semana voltou a pender para o lado defensivo em comparação com o final de junho, saltando visivelmente em um único dia. No entanto, ao contar os contratos que realmente mudaram de mãos nesse mesmo dia, as calls superaram amplamente as puts, e a posição individual mais lotada do mercado continuava sendo uma opção call quase 30% acima do preço à vista. Este texto diagnostica a estrutura atual de um mercado de opções em que dois sinais contam histórias diferentes — não qual delas vai se confirmar, mas onde está a real linha de fratura a observar.</p>
  <p class="tr">Haftalık put-call skew, haziran sonuna kıyasla yeniden savunmacı tarafa döndü ve tek bir günde belirgin şekilde sıçradı. Ancak aynı gün gerçekten el değiştiren sözleşmeleri saydığınızda, call'lar put'ları büyük farkla geride bıraktı ve piyasadaki en kalabalık tek pozisyon hâlâ spot fiyatın yaklaşık %30 üzerinde bir call opsiyonuydu. Bu yazı, hangisinin doğru çıkacağını tahmin etmek için değil, izlenmesi gereken çatlağın gerçekte nerede olduğunu göstermek için, iki sinyalin farklı hikayeler anlattığı bugünkü opsiyon piyasası yapısını teşhis ediyor.</p>
  <p class="vi">Độ lệch put-call kỳ hạn một tuần đã quay trở lại thiên về phía phòng thủ so với cuối tháng 6, tăng vọt rõ rệt chỉ trong một ngày. Thế nhưng nếu đếm số hợp đồng thực sự được giao dịch trong cùng ngày đó, call vượt xa put, và vị thế đơn lẻ đông đúc nhất thị trường vẫn là một quyền chọn call nằm cao hơn giá giao ngay gần 30%. Bài viết này chẩn đoán cấu trúc hiện tại của một thị trường quyền chọn nơi hai tín hiệu đang kể những câu chuyện khác nhau — không phải để dự đoán bên nào sẽ đúng, mà để chỉ ra vết nứt thực sự đang nằm ở đâu cần theo dõi.</p>

  <div class="box ko">💡 <strong>핵심 요약:</strong> 디리빗 1주물 25델타 풋-콜 스큐는 6월 말 급여지표 발표 이후 진정되며 최근 며칠간 16%대에서 안정됐다가, 7월 8일 이란 휴전 파기 소식에 하루 만에 20% 근처까지 뛰며 다시 방어적으로 기울었다. 그런데 같은 7월 8일 만기 옵션은 24시간 거래량 기준 콜 6,258계약 대 풋 3,610계약(풋/콜 비율 0.58)으로 콜이 더 많이 거래됐고, 맥스페인은 $63,000, 미결제약정은 628계약(약 $3,930만 규모)이었다. 디리빗 전체를 놓고 봐도 $80,000 콜은 여전히 미결제약정 $16억 넘게 쌓여 있는 최대 단일 포지션이며, 7월 8일 하루 콜 거래량이 가장 몰린 곳도 이 $80,000 스트라이크였다. 반면 11개 거래소 합산 비트코인 선물 미결제약정은 5월 30일 고점 $313억에서 7월 초 $216억으로 약 31% 줄어, 선물은 디레버리징 중인데 옵션 콜 포지셔닝은 그대로 버티는 엇박자가 뚜렷하다.</div>
  <div class="box en">💡 <strong>Key takeaway:</strong> Deribit's one-week 25-delta put-call skew, which had cooled to the mid-16% range after late-June payrolls data and held there for several days, jumped back toward 20% in a single day on July 8 as news broke that the U.S.-Iran ceasefire had collapsed. Yet that same July 8 expiry traded 6,258 calls versus 3,610 puts over 24 hours (a put/call ratio of 0.58), with max pain at $63,000 and open interest of just 628 contracts (roughly $39.3M notional). Across all of Deribit, the $80,000 call remains the single most crowded strike with over $1.6B in open interest, and July 8's heaviest 24-hour call volume was concentrated right there. Meanwhile, aggregate Bitcoin futures open interest across 11 exchanges has fallen roughly 31%, from a $31.3B peak on May 30 to about $21.6B in early July — futures are deleveraging while options call positioning holds firm.</div>
  <div class="box ja">💡 <strong>要点:</strong> ディリビットの1週間物25デルタ・プットコールスキューは、6月末の雇用統計発表後に落ち着き、ここ数日は16%台で安定していたが、7月8日にイランとの停戦崩壊のニュースが伝わると、わずか1日で20%近くまで再び防御的に跳ね上がった。ところが同じ7月8日満期のオプションは、24時間の出来高でコール6,258枚、プット3,610枚(プット・コール比率0.58)とコールの方が多く取引され、マックスペインは6万3,000ドル、建玉はわずか628枚(想定元本約3,930万ドル)だった。ディリビット全体で見ても8万ドルのコールは依然として建玉16億ドル超を抱える最大の単一ポジションであり、7月8日の24時間コール出来高が最も集中したのもこの8万ドルのストライクだった。一方、11取引所を合算したビットコイン先物建玉は、5月30日の高値313億ドルから7月初めには約216億ドルへと約31%減少しており、先物ではデレバレッジが進む一方でオプションのコールポジショニングはそのまま維持されているという食い違いが際立つ。</div>
  <div class="box es">💡 <strong>Resumen clave:</strong> El sesgo put-call a 25 delta y una semana de Deribit, que se había enfriado hasta la zona del 16% tras el informe de empleo de finales de junio y se mantuvo ahí varios días, volvió a saltar hacia el 20% en un solo día el 8 de julio, cuando se conoció el colapso del alto el fuego entre EE. UU. e Irán. Sin embargo, ese mismo vencimiento del 8 de julio negoció 6.258 calls frente a 3.610 puts en 24 horas (una ratio put/call de 0,58), con el max pain en 63.000 $ y un interés abierto de apenas 628 contratos (unos 39,3 millones de $ nocionales). En todo Deribit, la call de 80.000 $ sigue siendo el strike individual más concurrido, con más de 1.600 millones de $ en interés abierto, y el mayor volumen de calls en 24 horas del 8 de julio se concentró justo ahí. Mientras tanto, el interés abierto agregado de futuros de Bitcoin en 11 exchanges ha caído alrededor de un 31%, desde un máximo de 31.300 millones de $ el 30 de mayo hasta unos 21.600 millones de $ a principios de julio — los futuros se están desapalancando mientras el posicionamiento en calls se mantiene firme.</div>
  <div class="box de">💡 <strong>Kernaussage:</strong> Deribits einwöchiger 25-Delta-Put-Call-Skew, der sich nach den Arbeitsmarktdaten Ende Juni auf rund 16% abgekühlt hatte und dort mehrere Tage verharrte, sprang am 8. Juli innerhalb eines einzigen Tages wieder auf rund 20%, als bekannt wurde, dass der Waffenstillstand zwischen den USA und Iran zusammengebrochen war. Dennoch wurden bei diesem Verfall vom 8. Juli innerhalb von 24 Stunden 6.258 Calls gegenüber 3.610 Puts gehandelt (ein Put/Call-Verhältnis von 0,58), bei einem Max Pain von 63.000 $ und einem Open Interest von nur 628 Kontrakten (rund 39,3 Mio. $ Nominalwert). Über ganz Deribit hinweg bleibt der 80.000-$-Call mit über 1,6 Mrd. $ Open Interest der am stärksten überfüllte Einzelstrike, und das höchste 24-Stunden-Call-Volumen vom 8. Juli konzentrierte sich genau dort. Gleichzeitig ist das aggregierte Bitcoin-Futures-Open-Interest über 11 Börsen hinweg um rund 31% gefallen, von einem Höchststand von 31,3 Mrd. $ am 30. Mai auf etwa 21,6 Mrd. $ Anfang Juli — Futures entschulden sich, während die Call-Positionierung bei Optionen standhält.</div>
  <div class="box fr">💡 <strong>Point clé :</strong> Le skew put-call à 25 delta et une semaine de Deribit, qui s'était calmé autour de 16% après les chiffres de l'emploi de fin juin et y était resté plusieurs jours, a de nouveau bondi vers 20% en une seule journée le 8 juillet, à l'annonce de l'effondrement du cessez-le-feu entre les États-Unis et l'Iran. Pourtant, ce même échéance du 8 juillet a échangé 6 258 calls contre 3 610 puts en 24 heures (un ratio put/call de 0,58), avec un max pain à 63 000 $ et un open interest de seulement 628 contrats (environ 39,3 millions de $ de notionnel). Sur l'ensemble de Deribit, le call à 80 000 $ reste le strike individuel le plus encombré avec plus de 1,6 milliard de $ d'open interest, et le plus fort volume de calls sur 24 heures du 8 juillet s'y est concentré. Pendant ce temps, l'open interest agrégé des futures bitcoin sur 11 bourses a chuté d'environ 31%, passant d'un pic de 31,3 milliards de $ le 30 mai à environ 21,6 milliards de $ début juillet — les futures se désendettent tandis que le positionnement en calls sur options tient bon.</div>
  <div class="box pt">💡 <strong>Resumo:</strong> O skew put-call de 25 delta e uma semana da Deribit, que havia esfriado para a faixa de 16% após os dados de emprego do final de junho e permaneceu ali por vários dias, saltou de volta para cerca de 20% em um único dia, em 8 de julho, quando veio à tona a notícia do colapso do cessar-fogo entre EUA e Irã. No entanto, esse mesmo vencimento de 8 de julho negociou 6.258 calls contra 3.610 puts em 24 horas (uma razão put/call de 0,58), com max pain em US$ 63.000 e open interest de apenas 628 contratos (cerca de US$ 39,3 milhões em valor nocional). Em toda a Deribit, a call de US$ 80.000 continua sendo o strike individual mais lotado, com mais de US$ 1,6 bilhão em open interest, e o maior volume de calls em 24 horas de 8 de julho se concentrou exatamente ali. Enquanto isso, o open interest agregado de futuros de bitcoin em 11 corretoras caiu cerca de 31%, de um pico de US$ 31,3 bilhões em 30 de maio para cerca de US$ 21,6 bilhões no início de julho — os futuros estão se desalavancando enquanto o posicionamento em calls de opções se mantém firme.</div>
  <div class="box tr">💡 <strong>Ana çıkarım:</strong> Haziran sonu tarım dışı istihdam verisinin ardından yaklaşık %16 seviyesine soğuyan ve birkaç gün orada kalan Deribit'in haftalık 25-delta put-call skew'i, ABD-İran ateşkesinin çöktüğü haberi üzerine 8 Temmuz'da tek bir günde yeniden %20 civarına sıçradı. Ancak aynı 8 Temmuz vadesi 24 saatte 6.258 call'a karşı 3.610 put işlem gördü (put/call oranı 0,58), max pain 63.000 dolar ve açık pozisyon sadece 628 sözleşmeydi (yaklaşık 39,3 milyon dolar nominal). Deribit genelinde 80.000 dolarlık call, 1,6 milyar doları aşan açık pozisyonla hâlâ en kalabalık tek strike ve 8 Temmuz'un en yoğun 24 saatlik call hacmi tam da orada toplandı. Bu arada, 11 borsada toplam Bitcoin vadeli işlem açık pozisyonu, 30 Mayıs'taki 31,3 milyar dolarlık zirveden temmuz başında yaklaşık 21,6 milyar dolara, yani yaklaşık %31 geriledi — vadeli işlemler kaldıraç azaltırken opsiyonlardaki call pozisyonlanması sağlam duruyor.</div>
  <div class="box vi">💡 <strong>Tóm tắt chính:</strong> Độ lệch put-call 25-delta kỳ hạn một tuần của Deribit, vốn đã hạ nhiệt về khoảng 16% sau dữ liệu việc làm cuối tháng 6 và giữ nguyên ở đó trong vài ngày, đã bật tăng trở lại gần 20% chỉ trong một ngày vào 8/7 khi tin tức về việc lệnh ngừng bắn Mỹ-Iran sụp đổ lan truyền. Thế nhưng cùng kỳ hạn đáo hạn ngày 8/7 đó lại có 6.258 hợp đồng call được giao dịch so với 3.610 hợp đồng put trong 24 giờ (tỷ lệ put/call là 0,58), với max pain ở mức 63.000 USD và open interest chỉ 628 hợp đồng (khoảng 39,3 triệu USD giá trị danh nghĩa). Trên toàn bộ Deribit, quyền chọn call 80.000 USD vẫn là vị thế đơn lẻ đông đúc nhất với hơn 1,6 tỷ USD open interest, và khối lượng call trong 24 giờ cao nhất ngày 8/7 cũng tập trung chính tại đó. Trong khi đó, open interest hợp đồng tương lai Bitcoin tổng hợp trên 11 sàn đã giảm khoảng 31%, từ đỉnh 31,3 tỷ USD vào 30/5 xuống còn khoảng 21,6 tỷ USD đầu tháng 7 — hợp đồng tương lai đang giảm đòn bẩy trong khi vị thế call trong quyền chọn vẫn đứng vững.</div>

  <h2 class="ko">스큐는 다시 방어적으로 기울었다</h2>
  <h2 class="en">The Skew Tilted Defensive Again</h2>
  <h2 class="ja">スキューは再び防御的に傾いた</h2>
  <h2 class="es">El Sesgo Volvió a Inclinarse hacia lo Defensivo</h2>
  <h2 class="de">Der Skew Kippte Wieder ins Defensive</h2>
  <h2 class="fr">Le Skew a de Nouveau Basculé vers le Défensif</h2>
  <h2 class="pt">O Skew Voltou a Pender para o Defensivo</h2>
  <h2 class="tr">Skew Yeniden Savunmacı Tarafa Döndü</h2>
  <h2 class="vi">Độ Lệch Lại Nghiêng Về Phía Phòng Thủ</h2>

  <p class="ko">1주물 25델타 풋-콜 스큐는 방향성 있는 뉴스 흐름을 가장 민감하게 반영하는 지표 중 하나다. 6월 넷째 주 이란-이스라엘 긴장이 최고조에 달했을 때 이 스큐는 25% 근처까지 벌어지며 풋(하락 방어) 프리미엄이 크게 붙어 있었다. 이후 6월 말 발표된 미국 고용지표가 금리 인상 우려를 식히면서 스큐는 16%대로 내려앉았고, 지난 일주일 가까이 그 수준에서 안정적으로 유지됐다 — 시장이 단기 방향성에 대한 확신을 잃고 관망 모드로 들어갔다는 신호였다.</p>
  <p class="en">The one-week 25-delta put-call skew is one of the more sensitive gauges of directional news flow. When Iran-Israel tensions peaked in the fourth week of June, this skew widened to nearly 25%, with a hefty put (downside protection) premium built in. Once late-June U.S. payrolls data cooled rate-hike fears, the skew settled back into the mid-16% range and stayed there for nearly a week — a sign the market had lost conviction on near-term direction and slipped into a wait-and-see mode.</p>
  <p class="ja">1週間物25デルタ・プットコールスキューは、方向性のあるニュースの流れを最も敏感に反映する指標の一つだ。6月第4週にイラン・イスラエル間の緊張がピークに達した際、このスキューは25%近くまで拡大し、プット(下落防御)プレミアムが大きく上乗せされていた。その後、6月末に発表された米雇用統計が利上げ懸念を和らげたことで、スキューは16%台まで落ち着き、ここ1週間近くその水準で安定して推移した — 市場が短期的な方向性への確信を失い、様子見モードに入ったサインだった。</p>
  <p class="es">El sesgo put-call a 25 delta y una semana es uno de los indicadores más sensibles al flujo de noticias direccionales. Cuando las tensiones entre Irán e Israel alcanzaron su punto máximo en la cuarta semana de junio, este sesgo se amplió hasta casi el 25%, con una fuerte prima de puts (protección a la baja) incorporada. Una vez que los datos de empleo de EE. UU. de finales de junio enfriaron los temores de subida de tipos, el sesgo se asentó de nuevo en la zona del 16% y se mantuvo ahí durante casi una semana — una señal de que el mercado había perdido convicción sobre la dirección a corto plazo y había entrado en un modo de esperar y ver.</p>
  <p class="de">Der einwöchige 25-Delta-Put-Call-Skew ist einer der empfindlicheren Indikatoren für gerichteten Nachrichtenfluss. Als die Spannungen zwischen Iran und Israel in der vierten Juniwoche ihren Höhepunkt erreichten, weitete sich dieser Skew auf fast 25% aus, mit einer kräftigen Put-Prämie (Abwärtsschutz) eingepreist. Nachdem die US-Arbeitsmarktdaten Ende Juni die Zinserhöhungsängste abkühlten, pendelte sich der Skew wieder im Bereich von 16% ein und blieb dort fast eine Woche lang — ein Zeichen dafür, dass der Markt seine Überzeugung zur kurzfristigen Richtung verloren hatte und in einen Abwarte-Modus übergegangen war.</p>
  <p class="fr">Le skew put-call à 25 delta et une semaine est l'un des indicateurs les plus sensibles au flux d'actualités directionnelles. Lorsque les tensions entre l'Iran et Israël ont atteint leur paroxysme durant la quatrième semaine de juin, ce skew s'est élargi à près de 25%, avec une lourde prime de puts (protection à la baisse) intégrée. Une fois que les chiffres de l'emploi américain de fin juin ont refroidi les craintes de hausse des taux, le skew s'est réinstallé dans la zone des 16% et y est resté près d'une semaine — un signe que le marché avait perdu sa conviction sur la direction à court terme et était entré dans un mode attentiste.</p>
  <p class="pt">O skew put-call de 25 delta e uma semana é um dos indicadores mais sensíveis ao fluxo de notícias direcionais. Quando as tensões entre Irã e Israel atingiram o pico na quarta semana de junho, esse skew se ampliou para quase 25%, com um pesado prêmio de puts (proteção contra queda) embutido. Depois que os dados de emprego dos EUA do final de junho esfriaram os temores de alta de juros, o skew se acomodou de volta na faixa de 16% e permaneceu ali por quase uma semana — um sinal de que o mercado havia perdido convicção sobre a direção de curto prazo e entrado em modo de espera.</p>
  <p class="tr">Haftalık 25-delta put-call skew, yönlü haber akışını en hassas şekilde yansıtan göstergelerden biri. Haziran ayının dördüncü haftasında İran-İsrail gerilimi zirveye ulaştığında, bu skew neredeyse %25'e kadar genişledi ve içine ağır bir put (aşağı yönlü koruma) primi yerleşti. Haziran sonundaki ABD tarım dışı istihdam verileri faiz artışı endişelerini yatıştırdıktan sonra skew yeniden %16 civarına yerleşti ve neredeyse bir hafta boyunca orada kaldı — piyasanın kısa vadeli yön konusundaki inancını kaybedip bekle-gör moduna girdiğinin bir işareti.</p>
  <p class="vi">Độ lệch put-call 25-delta kỳ hạn một tuần là một trong những thước đo nhạy cảm nhất với dòng tin tức có tính định hướng. Khi căng thẳng Iran-Israel lên đến đỉnh điểm vào tuần thứ tư của tháng 6, độ lệch này đã nới rộng lên gần 25%, với mức phụ trội put (bảo vệ trước rủi ro giảm giá) khá lớn được tính vào giá. Sau khi dữ liệu việc làm Mỹ cuối tháng 6 làm dịu lo ngại tăng lãi suất, độ lệch đã lắng xuống về khoảng 16% và giữ ở đó gần một tuần — dấu hiệu cho thấy thị trường đã mất niềm tin vào hướng đi ngắn hạn và chuyển sang chế độ chờ xem.</p>

  <p class="ko">그런데 7월 8일 트럼프 대통령이 이란과의 휴전을 '끝났다'고 선언하고 미국이 호르무즈 인근에서 정밀 타격을 가했다는 소식이 전해지자, 이 스큐는 하루 만에 20% 근처까지 뛰었다. 나흘 넘게 잠잠하던 지표가 단일 헤드라인에 즉각 반응했다는 건, 옵션 트레이더들이 지정학 리스크를 여전히 '한 번의 뉴스로 가격이 크게 흔들릴 수 있는' 요인으로 가격에 반영하고 있다는 뜻이다. 같은 날 크립토 공포탐욕지수도 20대 초중반의 '극단적 공포'권에 머물러, 스큐가 보여주는 방어적 심리와 방향은 일치했다.</p>
  <p class="en">Then, on July 8, when President Trump declared the ceasefire with Iran "over" and U.S. forces carried out precision strikes near Hormuz, that skew jumped to nearly 20% in a single day. A metric that had sat quiet for more than four days reacting instantly to a single headline shows that options traders are still pricing geopolitical risk as something that can jolt prices sharply on any given news cycle. The same day, the crypto Fear &amp; Greed Index also sat in the low-to-mid 20s, "Extreme Fear" territory, pointing in the same defensive direction as the skew.</p>
  <p class="ja">ところが7月8日、トランプ大統領がイランとの停戦を「終わった」と宣言し、米軍がホルムズ海峡付近で精密攻撃を行ったとの知らせが伝わると、このスキューはわずか1日で20%近くまで跳ね上がった。4日以上静かだった指標が単一の見出しに即座に反応したという事実は、オプショントレーダーが地政学リスクを依然として「一つのニュースで価格が大きく揺れうる」要因として値付けしていることを示す。同日、クリプトの恐怖・強欲指数も20台前半から半ばの「極度の恐怖」圏にとどまり、スキューが示す防御的な心理と方向は一致していた。</p>
  <p class="es">Sin embargo, el 8 de julio, cuando el presidente Trump declaró que el alto el fuego con Irán había "terminado" y las fuerzas estadounidenses realizaron ataques de precisión cerca de Ormuz, ese sesgo saltó a casi el 20% en un solo día. Que un indicador que había permanecido en calma durante más de cuatro días reaccionara al instante ante un único titular muestra que los operadores de opciones siguen valorando el riesgo geopolítico como algo capaz de sacudir bruscamente los precios con cualquier ciclo de noticias. Ese mismo día, el Índice de Miedo y Codicia cripto también se situó en la zona baja-media de los 20, territorio de "Miedo Extremo", apuntando en la misma dirección defensiva que el sesgo.</p>
  <p class="de">Doch am 8. Juli, als Präsident Trump den Waffenstillstand mit Iran für "vorbei" erklärte und US-Streitkräfte Präzisionsschläge nahe Hormus ausführten, sprang dieser Skew innerhalb eines einzigen Tages auf fast 20%. Dass eine Kennzahl, die mehr als vier Tage lang ruhig geblieben war, sofort auf eine einzige Schlagzeile reagierte, zeigt, dass Optionshändler geopolitisches Risiko weiterhin als etwas einpreisen, das die Preise mit jedem beliebigen Nachrichtenzyklus stark erschüttern kann. Am selben Tag lag auch der Krypto-Angst-und-Gier-Index im unteren bis mittleren Bereich der 20er, im Territorium der "extremen Angst" — in dieselbe defensive Richtung wie der Skew.</p>
  <p class="fr">Pourtant, le 8 juillet, lorsque le président Trump a déclaré que le cessez-le-feu avec l'Iran était « terminé » et que les forces américaines ont mené des frappes de précision près d'Ormuz, ce skew a bondi à près de 20% en une seule journée. Le fait qu'un indicateur resté calme pendant plus de quatre jours ait réagi instantanément à un seul titre montre que les traders d'options continuent de valoriser le risque géopolitique comme quelque chose capable de secouer brutalement les prix à chaque cycle d'actualité. Le même jour, l'indice Peur et Cupidité des cryptos se situait aussi dans la fourchette basse à moyenne des 20, en territoire de « peur extrême », pointant dans la même direction défensive que le skew.</p>
  <p class="pt">No entanto, em 8 de julho, quando o presidente Trump declarou que o cessar-fogo com o Irã havia "acabado" e as forças dos EUA realizaram ataques de precisão perto de Ormuz, esse skew saltou para quase 20% em um único dia. O fato de um indicador que havia ficado quieto por mais de quatro dias reagir instantaneamente a uma única manchete mostra que os traders de opções ainda precificam o risco geopolítico como algo capaz de sacudir os preços bruscamente a qualquer ciclo de notícias. No mesmo dia, o Índice de Medo e Ganância cripto também ficou na faixa baixa a média dos 20, território de "Medo Extremo", apontando na mesma direção defensiva do skew.</p>
  <p class="tr">Ancak 8 Temmuz'da Başkan Trump İran ile ateşkesin "bittiğini" ilan edip ABD kuvvetleri Hürmüz yakınında hassas vuruşlar gerçekleştirince, bu skew tek bir günde neredeyse %20'ye sıçradı. Dört günden fazla sessiz kalan bir göstergenin tek bir manşete anında tepki vermesi, opsiyon yatırımcılarının jeopolitik riski hâlâ herhangi bir haber döngüsünde fiyatları sertçe sarsabilecek bir unsur olarak fiyatladığını gösteriyor. Aynı gün kripto Korku ve Açgözlülük Endeksi de 20'li yılların düşük-orta bölgesinde, "Aşırı Korku" bölgesinde kaldı ve skew'in gösterdiği savunmacı yönle örtüştü.</p>
  <p class="vi">Thế nhưng vào ngày 8/7, khi Tổng thống Trump tuyên bố lệnh ngừng bắn với Iran đã "kết thúc" và lực lượng Mỹ tiến hành không kích chính xác gần Hormuz, độ lệch đó đã tăng vọt lên gần 20% chỉ trong một ngày. Việc một chỉ báo đã im lìm hơn bốn ngày phản ứng ngay lập tức với một tiêu đề duy nhất cho thấy các nhà giao dịch quyền chọn vẫn đang định giá rủi ro địa chính trị như một yếu tố có thể làm giá biến động mạnh chỉ sau một chu kỳ tin tức. Cùng ngày, Chỉ số Sợ hãi và Tham lam trong tiền điện tử cũng nằm ở mức thấp đến trung bình của khoảng 20, vùng "Sợ hãi Cực độ", cùng hướng phòng thủ với độ lệch.</p>

  <h2 class="ko">그런데 그날 거래된 건 콜이 더 많았다</h2>
  <h2 class="en">But More Calls Traded That Day</h2>
  <h2 class="ja">しかしその日、実際に取引されたのはコールの方が多かった</h2>
  <h2 class="es">Pero Ese Día Se Negociaron Más Calls</h2>
  <h2 class="de">Doch An Jenem Tag Wurden Mehr Calls Gehandelt</h2>
  <h2 class="fr">Pourtant, Ce Jour-Là, Plus de Calls Ont Été Échangés</h2>
  <h2 class="pt">Mas Naquele Dia Mais Calls Foram Negociadas</h2>
  <h2 class="tr">Ama O Gün Daha Fazla Call İşlem Gördü</h2>
  <h2 class="vi">Nhưng Ngày Hôm Đó, Call Được Giao Dịch Nhiều Hơn</h2>

  <p class="ko">스큐가 방어적으로 기운 것과 별개로, 7월 8일 당일 만기였던 옵션의 실제 거래 흐름은 다른 그림을 그렸다. 맥스페인 $63,000짜리 이 만기물의 미결제약정은 628계약(약 $3,930만 규모)에 불과했지만, 만기를 앞둔 24시간 동안 실제로 손바뀜한 물량은 콜 6,258계약, 풋 3,610계약으로 콜이 풋보다 1.7배 이상 많았다. 풋/콜 거래량 비율로 환산하면 0.58 — 시장이 두려워하며 풋을 사들이고 있다는 스큐의 신호와는 결이 다른 숫자다.</p>
  <p class="en">Separately from the skew's defensive tilt, the actual trading flow in options expiring that same July 8 painted a different picture. Open interest for this expiry, with max pain at $63,000, stood at just 628 contracts (roughly $39.3M notional) — but over the 24 hours leading into expiry, actual volume ran 6,258 calls versus 3,610 puts, calls outnumbering puts by more than 1.7 to 1. Converted into a put/call volume ratio, that's 0.58 — a very different number from what the skew's "the market is buying puts out of fear" signal would suggest.</p>
  <p class="ja">スキューの防御的な傾きとは別に、同じ7月8日満期のオプションの実際の取引フローは異なる絵を描いていた。マックスペイン6万3,000ドルのこの満期物の建玉はわずか628枚(想定元本約3,930万ドル)にとどまったが、満期を控えた24時間で実際に取引された数量はコール6,258枚、プット3,610枚と、コールがプットの1.7倍以上だった。プット・コール出来高比率に換算すると0.58 — 市場が恐怖からプットを買っているというスキューのシグナルとは異なる数字だ。</p>
  <p class="es">Al margen de la inclinación defensiva del sesgo, el flujo real de negociación en las opciones que vencían ese mismo 8 de julio pintaba un cuadro distinto. El interés abierto de ese vencimiento, con max pain en 63.000 $, se situó en apenas 628 contratos (unos 39,3 millones de $ nocionales) — pero en las 24 horas previas al vencimiento, el volumen real fue de 6.258 calls frente a 3.610 puts, superando las calls a las puts en más de 1,7 a 1. Convertido en una ratio de volumen put/call, eso da 0,58 — una cifra muy distinta de lo que sugeriría la señal del sesgo de que "el mercado está comprando puts por miedo".</p>
  <p class="de">Unabhängig von der defensiven Neigung des Skews zeichnete der tatsächliche Handelsfluss bei den am selben 8. Juli verfallenden Optionen ein anderes Bild. Das Open Interest dieses Verfalls, mit einem Max Pain von 63.000 $, lag bei nur 628 Kontrakten (rund 39,3 Mio. $ Nominalwert) — doch in den 24 Stunden vor dem Verfall lag das tatsächliche Volumen bei 6.258 Calls gegenüber 3.610 Puts, wobei Calls die Puts um mehr als das 1,7-Fache übertrafen. Umgerechnet in ein Put/Call-Volumenverhältnis ergibt das 0,58 — eine ganz andere Zahl, als es das "der Markt kauft aus Angst Puts"-Signal des Skews nahelegen würde.</p>
  <p class="fr">Indépendamment de l'inclinaison défensive du skew, le flux de négociation réel des options expirant ce même 8 juillet dressait un tableau différent. L'open interest de cette échéance, avec un max pain à 63 000 $, s'élevait à seulement 628 contrats (environ 39,3 millions de $ de notionnel) — mais sur les 24 heures précédant l'expiration, le volume réel s'élevait à 6 258 calls contre 3 610 puts, les calls dépassant les puts de plus de 1,7 à 1. Converti en ratio de volume put/call, cela donne 0,58 — un chiffre très différent de ce que suggérerait le signal du skew selon lequel « le marché achète des puts par peur ».</p>
  <p class="pt">Independentemente da inclinação defensiva do skew, o fluxo real de negociação nas opções com vencimento naquele mesmo 8 de julho pintava um quadro diferente. O open interest desse vencimento, com max pain em US$ 63.000, ficou em apenas 628 contratos (cerca de US$ 39,3 milhões em valor nocional) — mas nas 24 horas antes do vencimento, o volume real foi de 6.258 calls contra 3.610 puts, com as calls superando as puts em mais de 1,7 para 1. Convertido em uma razão de volume put/call, isso dá 0,58 — um número bem diferente do que sugeriria o sinal do skew de que "o mercado está comprando puts por medo".</p>
  <p class="tr">Skew'in savunmacı eğiliminden bağımsız olarak, aynı 8 Temmuz'da vadesi dolan opsiyonlardaki gerçek işlem akışı farklı bir tablo çiziyordu. Max pain'i 63.000 dolar olan bu vadenin açık pozisyonu yalnızca 628 sözleşmeydi (yaklaşık 39,3 milyon dolar nominal) — ancak vadeye kalan 24 saatte gerçekleşen hacim 6.258 call'a karşı 3.610 put oldu, yani call'lar put'ları 1,7 katından fazla geride bıraktı. Put/call hacim oranına çevrildiğinde bu 0,58'e denk geliyor — skew'in "piyasa korkuyla put alıyor" sinyalinin ima ettiğinden çok farklı bir rakam.</p>
  <p class="vi">Tách biệt khỏi xu hướng phòng thủ của độ lệch, dòng giao dịch thực tế của các quyền chọn đáo hạn cùng ngày 8/7 đó lại vẽ nên một bức tranh khác. Open interest của kỳ đáo hạn này, với max pain ở 63.000 USD, chỉ ở mức 628 hợp đồng (khoảng 39,3 triệu USD giá trị danh nghĩa) — nhưng trong 24 giờ trước khi đáo hạn, khối lượng thực tế là 6.258 hợp đồng call so với 3.610 hợp đồng put, call vượt put hơn 1,7 lần. Quy đổi thành tỷ lệ khối lượng put/call, con số đó là 0,58 — một con số rất khác so với những gì tín hiệu "thị trường đang mua put vì sợ hãi" của độ lệch gợi ý.</p>

  <p class="ko">이 둘은 사실 서로 다른 것을 측정한다. 스큐는 '같은 델타에서 풋과 콜 중 어느 쪽에 프리미엄이 더 붙어 있는가'를 보여주는 가격 지표이고, 거래량은 '실제로 어느 쪽 계약이 더 많이 손바뀜했는가'를 보여주는 수량 지표다. 두 지표가 동시에 성립하려면, 소수의 대형 헤지 물량이 풋 가격을 밀어 올리는 동안 다수의 소액·투기성 주문은 여전히 콜에 몰리고 있었다는 그림이 나온다. 실제로 이날 콜 거래가 가장 몰린 지점은 현재가보다 한참 위인 $69,000 근방이었다 — 방어 목적의 매매가 아니라 반등 베팅에 가깝다.</p>
  <p class="en">The two are actually measuring different things. Skew is a price metric — which side, puts or calls, carries the fatter premium at the same delta — while volume is a quantity metric: which side actually saw more contracts change hands. For both to be true at once, the picture that emerges is one where a small number of large hedging orders pushed put prices higher, while a much larger number of smaller, speculative orders kept piling into calls. Indeed, that day's heaviest cluster of call trading sat near $69,000, well above spot — that looks less like protective hedging and more like a bet on a bounce.</p>
  <p class="ja">この二つは実際には異なるものを測定している。スキューは「同じデルタでプットとコールのどちらにより厚いプレミアムが付いているか」を示す価格指標であり、出来高は「実際にどちら側の契約がより多く取引されたか」を示す数量指標だ。両方が同時に成り立つには、少数の大口ヘッジ注文がプットの価格を押し上げる一方で、はるかに多い小口・投機的な注文が依然としてコールに殺到していたという構図が浮かび上がる。実際、この日コール取引が最も集中した水準は現在価格をはるかに上回る6万9,000ドル近辺だった — これは防御目的の売買というより、反発への賭けに近い。</p>
  <p class="es">Ambos miden en realidad cosas distintas. El sesgo es una medida de precio: qué lado, puts o calls, lleva la prima más gorda al mismo delta, mientras que el volumen es una medida de cantidad: qué lado tuvo realmente más contratos cambiando de manos. Para que ambos sean ciertos a la vez, el cuadro que emerge es uno en el que un pequeño número de grandes órdenes de cobertura empujó al alza los precios de las puts, mientras que un número mucho mayor de órdenes más pequeñas y especulativas seguía amontonándose en las calls. De hecho, el mayor grupo de negociación de calls ese día se situó cerca de 69.000 $, muy por encima del spot — eso se parece menos a una cobertura protectora y más a una apuesta por un rebote.</p>
  <p class="de">Beide messen eigentlich unterschiedliche Dinge. Skew ist eine Preiskennzahl — welche Seite, Puts oder Calls, bei gleichem Delta die fettere Prämie trägt —, während Volumen eine Mengenkennzahl ist: welche Seite tatsächlich mehr Kontrakte gehandelt hat. Damit beides gleichzeitig zutrifft, ergibt sich ein Bild, in dem eine kleine Zahl großer Hedging-Orders die Put-Preise nach oben trieb, während eine viel größere Zahl kleinerer, spekulativer Orders weiterhin in Calls strömte. Tatsächlich lag der stärkste Call-Handelscluster dieses Tages nahe 69.000 $, deutlich über dem Spotpreis — das sieht weniger nach Absicherung als nach einer Wette auf eine Erholung aus.</p>
  <p class="fr">Les deux mesurent en réalité des choses différentes. Le skew est une mesure de prix — quel côté, puts ou calls, porte la prime la plus grasse au même delta —, tandis que le volume est une mesure de quantité : quel côté a réellement vu le plus de contrats changer de mains. Pour que les deux soient vrais à la fois, le tableau qui émerge est celui où un petit nombre de grands ordres de couverture a poussé les prix des puts à la hausse, tandis qu'un nombre bien plus important d'ordres plus petits et spéculatifs continuait de s'entasser sur les calls. En effet, le plus fort regroupement de négociation de calls ce jour-là se situait près de 69 000 $, bien au-dessus du spot — cela ressemble moins à une couverture protectrice qu'à un pari sur un rebond.</p>
  <p class="pt">Os dois na verdade medem coisas diferentes. O skew é uma métrica de preço — qual lado, puts ou calls, carrega o prêmio mais gordo no mesmo delta —, enquanto o volume é uma métrica de quantidade: qual lado realmente teve mais contratos mudando de mãos. Para que ambos sejam verdadeiros ao mesmo tempo, o quadro que emerge é um em que um pequeno número de grandes ordens de hedge empurrou os preços das puts para cima, enquanto um número muito maior de ordens menores e especulativas continuava se acumulando em calls. De fato, o maior agrupamento de negociação de calls naquele dia ficou perto de US$ 69.000, bem acima do spot — isso parece menos uma proteção defensiva e mais uma aposta em uma recuperação.</p>
  <p class="tr">İkisi aslında farklı şeyleri ölçüyor. Skew bir fiyat ölçütü — aynı delta'da hangi tarafın, put mu call mı, daha şişkin bir prime sahip olduğu — hacim ise bir miktar ölçütü: hangi tarafta gerçekte daha fazla sözleşmenin el değiştirdiği. İkisinin aynı anda doğru olması için ortaya çıkan tablo, az sayıda büyük hedge emrinin put fiyatlarını yukarı ittiği, ama çok daha fazla sayıda küçük ve spekülatif emrin hâlâ call'lara akın ettiği bir tablo. Nitekim o gün call işlemlerinin en yoğun kümelendiği nokta, spot fiyatın çok üzerinde, 69.000 dolar civarıydı — bu, koruyucu bir işlemden çok bir toparlanma bahsine benziyor.</p>
  <p class="vi">Hai chỉ số này thực chất đo lường những thứ khác nhau. Độ lệch là thước đo giá — bên nào, put hay call, mang mức phụ trội dày hơn ở cùng mức delta — còn khối lượng là thước đo số lượng: bên nào thực sự có nhiều hợp đồng đổi chủ hơn. Để cả hai cùng đúng một lúc, bức tranh hiện ra là một số ít lệnh phòng hộ lớn đã đẩy giá put lên cao, trong khi một số lượng lớn hơn nhiều các lệnh nhỏ, mang tính đầu cơ vẫn tiếp tục đổ vào call. Thực tế, cụm giao dịch call dày đặc nhất trong ngày hôm đó nằm gần mức 69.000 USD, cao hơn nhiều so với giá giao ngay — điều này giống một canh bạc đặt cược vào sự phục hồi hơn là một giao dịch phòng hộ.</p>

  <h2 class="ko">8만 달러 콜은 흔들리지 않는다</h2>
  <h2 class="en">The $80,000 Call Isn't Budging</h2>
  <h2 class="ja">8万ドルのコールは揺るがない</h2>
  <h2 class="es">La Call de 80.000 $ No Cede</h2>
  <h2 class="de">Der 80.000-$-Call Rührt Sich Nicht</h2>
  <h2 class="fr">Le Call à 80 000 $ Ne Bouge Pas</h2>
  <h2 class="pt">A Call de US$ 80.000 Não Se Mexe</h2>
  <h2 class="tr">80.000 Dolarlık Call Yerinden Kımıldamıyor</h2>
  <h2 class="vi">Quyền Chọn Call 80.000 USD Không Hề Lay Chuyển</h2>

  <p class="ko">당일 만기물보다 더 눈에 띄는 건 디리빗 전체의 구조적 포지셔닝이다. $80,000 행사가 콜은 여전히 미결제약정 $16억 넘게 쌓여 있어, 만기가 제각각인 계약들을 통틀어 디리빗에서 가장 붐비는 단일 스트라이크 자리를 지키고 있다. 7월 8일 하루 24시간 콜 거래량이 가장 많이 몰린 곳도 바로 이 $80,000 근방이었다 — 현재가 $62,000대에서 30% 가까이 떨어진 자리에 여전히 신규·기존 매수세가 몰린다는 뜻이다.</p>
  <p class="en">More notable than the same-day expiry is Deribit's structural positioning overall. The $80,000 strike call still carries over $1.6B in open interest, holding its place as the single most crowded strike on Deribit across all expiries. July 8's heaviest 24-hour call volume was also concentrated right around that $80,000 level — meaning fresh and existing buying alike keeps piling into a strike sitting nearly 30% above the low-$62,000s spot price.</p>
  <p class="ja">当日満期のオプションよりも注目すべきは、ディリビット全体の構造的なポジショニングだ。8万ドルの行使価格のコールは依然として建玉16億ドル超を抱えており、満期がまちまちな契約全体を通して見ても、ディリビットで最も混み合った単一ストライクの座を保っている。7月8日の24時間コール出来高が最も集中したのもこの8万ドル近辺だった — 現在価格の6万2,000ドル台から30%近く離れた水準に、新規・既存を問わず買いが依然として集まっているということだ。</p>
  <p class="es">Más notable que el vencimiento del mismo día es el posicionamiento estructural general de Deribit. La call con strike de 80.000 $ sigue acumulando más de 1.600 millones de $ en interés abierto, manteniendo su lugar como el strike individual más concurrido de Deribit entre todos los vencimientos. El mayor volumen de calls en 24 horas del 8 de julio también se concentró justo en torno a ese nivel de 80.000 $ — lo que significa que tanto las compras nuevas como las existentes siguen amontonándose en un strike situado casi un 30% por encima del precio spot en la zona baja de los 62.000 $.</p>
  <p class="de">Bemerkenswerter als der Verfall am selben Tag ist Deribits strukturelle Positionierung insgesamt. Der Call mit Strike 80.000 $ trägt weiterhin über 1,6 Mrd. $ Open Interest und behält seinen Platz als der über alle Verfallstermine hinweg am stärksten überfüllte Einzelstrike auf Deribit. Das höchste 24-Stunden-Call-Volumen vom 8. Juli konzentrierte sich ebenfalls genau um dieses 80.000-$-Niveau — was bedeutet, dass sowohl frische als auch bestehende Kaufaufträge weiterhin in einen Strike strömen, der fast 30% über dem Spotpreis im unteren 62.000-$-Bereich liegt.</p>
  <p class="fr">Plus notable que l'échéance du même jour est le positionnement structurel global de Deribit. Le call au strike de 80 000 $ porte toujours plus de 1,6 milliard de $ d'open interest, conservant sa place de strike individuel le plus encombré sur Deribit toutes échéances confondues. Le plus fort volume de calls sur 24 heures du 8 juillet s'est également concentré juste autour de ce niveau de 80 000 $ — ce qui signifie que les achats neufs comme existants continuent de s'entasser sur un strike situé à près de 30% au-dessus du spot dans les bas 62 000 $.</p>
  <p class="pt">Mais notável que o vencimento do mesmo dia é o posicionamento estrutural geral da Deribit. A call com strike de US$ 80.000 continua acumulando mais de US$ 1,6 bilhão em open interest, mantendo seu lugar como o strike individual mais lotado da Deribit em todos os vencimentos. O maior volume de calls em 24 horas de 8 de julho também se concentrou bem em torno desse nível de US$ 80.000 — o que significa que compras novas e existentes continuam se acumulando em um strike quase 30% acima do preço à vista na faixa baixa dos US$ 62.000.</p>
  <p class="tr">Aynı gün vadesinden daha dikkat çekici olan, Deribit'in genel yapısal pozisyonlanması. 80.000 dolarlık kullanım fiyatına sahip call, 1,6 milyar doları aşan açık pozisyonu hâlâ taşıyor ve tüm vadeler arasında Deribit'in en kalabalık tek strike'ı olma konumunu koruyor. 8 Temmuz'un en yoğun 24 saatlik call hacmi de tam bu 80.000 dolar seviyesi civarında toplandı — bu, spot fiyatın 62.000 doların altındaki seviyesinden neredeyse %30 uzakta olan bir strike'a hem yeni hem de mevcut alım baskısının yığılmaya devam ettiği anlamına geliyor.</p>
  <p class="vi">Đáng chú ý hơn kỳ đáo hạn cùng ngày là vị thế cấu trúc tổng thể của Deribit. Quyền chọn call với giá thực hiện 80.000 USD vẫn duy trì hơn 1,6 tỷ USD open interest, giữ vị trí là strike đơn lẻ đông đúc nhất trên Deribit tính trên tất cả các kỳ đáo hạn. Khối lượng call trong 24 giờ cao nhất ngày 8/7 cũng tập trung ngay quanh mức 80.000 USD đó — nghĩa là cả lệnh mua mới lẫn lệnh cũ vẫn tiếp tục đổ vào một strike nằm cao hơn gần 30% so với giá giao ngay đang ở vùng thấp của 62.000 USD.</p>

  <p class="ko">이 포지셔닝을 다른 지표와 겹쳐 보면 균열이 더 뚜렷해진다. 11개 거래소를 합산한 비트코인 선물 미결제약정은 5월 30일 고점 약 $313억에서 7월 초 약 $216억으로 약 31% 줄었다 — 선형 레버리지는 눈에 띄게 빠지고 있다는 신호다. 그런데 옵션 시장, 특히 장기물 콜 포지셔닝은 거의 그대로 유지되고 있다. 선물 쪽 투기 수요는 식는데 옵션 쪽 투기 수요는 버틴다는 이 엇박자는, 만약 가격이 추가로 밀릴 경우 마켓메이커의 델타 헤지 흐름이 어느 방향으로 작동할지를 예측하기 어렵게 만드는 요인이다.</p>
  <p class="en">Layer this positioning against another indicator and the fracture becomes clearer. Aggregate Bitcoin futures open interest across 11 exchanges has fallen roughly 31%, from a $31.3B peak on May 30 to about $21.6B in early July — a visible sign of linear leverage unwinding. Options, and long-dated call positioning in particular, have held roughly steady in the meantime. Speculative demand cooling in futures while it holds firm in options makes it harder to predict which way market-maker delta-hedging flows would run if the price slides further from here.</p>
  <p class="ja">この持ち高を別の指標と重ね合わせると、亀裂がより鮮明になる。11取引所を合算したビットコイン先物建玉は、5月30日の高値約313億ドルから7月初めには約216億ドルへと約31%減少した — 線形レバレッジが目に見えて後退しているサインだ。ところがオプション市場、特に長期物のコールポジショニングはほぼ横ばいのまま維持されている。先物側の投機需要が冷え込む一方でオプション側の投機需要は持ちこたえるというこの食い違いは、今後価格がさらに下落した場合、マーケットメーカーのデルタヘッジフローがどちらの方向に働くかを予測しづらくする要因だ。</p>
  <p class="es">Al superponer este posicionamiento con otro indicador, la fractura se vuelve más clara. El interés abierto agregado de futuros de Bitcoin en 11 exchanges ha caído alrededor de un 31%, desde un máximo de 31.300 millones de $ el 30 de mayo hasta unos 21.600 millones de $ a principios de julio — una señal visible de que el apalancamiento lineal se está desmontando. Las opciones, y en particular el posicionamiento en calls de vencimiento lejano, se han mantenido en gran medida estables mientras tanto. Que la demanda especulativa se enfríe en futuros mientras se mantiene firme en opciones dificulta predecir en qué dirección irían los flujos de cobertura delta de los creadores de mercado si el precio cae aún más desde aquí.</p>
  <p class="de">Legt man diese Positionierung über einen anderen Indikator, wird der Bruch deutlicher. Das aggregierte Bitcoin-Futures-Open-Interest über 11 Börsen ist um rund 31% gefallen, von einem Höchststand von 31,3 Mrd. $ am 30. Mai auf etwa 21,6 Mrd. $ Anfang Juli — ein sichtbares Zeichen für den Abbau linearer Hebelwirkung. Optionen, insbesondere die langfristige Call-Positionierung, haben sich in der Zwischenzeit weitgehend stabil gehalten. Dass die spekulative Nachfrage bei Futures abkühlt, während sie bei Optionen standhält, macht es schwerer vorherzusagen, in welche Richtung die Delta-Hedging-Ströme der Market Maker laufen würden, sollte der Preis von hier aus weiter fallen.</p>
  <p class="fr">En superposant ce positionnement à un autre indicateur, la fracture devient plus claire. L'open interest agrégé des futures bitcoin sur 11 bourses a chuté d'environ 31%, passant d'un pic de 31,3 milliards de $ le 30 mai à environ 21,6 milliards de $ début juillet — un signe visible du désendettement du levier linéaire. Les options, et en particulier le positionnement en calls à échéance lointaine, sont restées globalement stables entre-temps. Le fait que la demande spéculative se refroidisse sur les futures tout en tenant bon sur les options rend plus difficile de prédire dans quelle direction iraient les flux de couverture delta des teneurs de marché si le prix venait à baisser davantage à partir d'ici.</p>
  <p class="pt">Ao sobrepor esse posicionamento a outro indicador, a fratura fica mais clara. O open interest agregado de futuros de bitcoin em 11 corretoras caiu cerca de 31%, de um pico de US$ 31,3 bilhões em 30 de maio para cerca de US$ 21,6 bilhões no início de julho — um sinal visível de desalavancagem linear. As opções, e em particular o posicionamento em calls de longo prazo, se mantiveram, entretanto, praticamente estáveis. A demanda especulativa esfriando em futuros enquanto se mantém firme em opções torna mais difícil prever em que direção os fluxos de hedge delta dos formadores de mercado seguiriam se o preço caísse ainda mais a partir daqui.</p>
  <p class="tr">Bu pozisyonlanmayı başka bir göstergeyle üst üste koyduğunuzda çatlak daha net görülüyor. 11 borsada toplam Bitcoin vadeli işlem açık pozisyonu, 30 Mayıs'taki 31,3 milyar dolarlık zirveden temmuz başında yaklaşık 21,6 milyar dolara, yani yaklaşık %31 geriledi — doğrusal kaldıracın gözle görülür şekilde çözüldüğünün bir işareti. Opsiyonlar, özellikle uzun vadeli call pozisyonlanması ise bu süre zarfında büyük ölçüde sabit kaldı. Vadeli işlemlerde spekülatif talebin soğurken opsiyonlarda sağlam kalması, fiyat buradan daha da gerilerse piyasa yapıcıların delta hedge akışlarının hangi yöne çalışacağını tahmin etmeyi zorlaştıran bir unsur.</p>
  <p class="vi">Đặt vị thế này chồng lên một chỉ báo khác, vết nứt càng trở nên rõ ràng hơn. Open interest hợp đồng tương lai Bitcoin tổng hợp trên 11 sàn đã giảm khoảng 31%, từ đỉnh 31,3 tỷ USD vào 30/5 xuống còn khoảng 21,6 tỷ USD đầu tháng 7 — một dấu hiệu rõ ràng của việc giảm đòn bẩy tuyến tính. Trong khi đó, quyền chọn, đặc biệt là vị thế call kỳ hạn dài, vẫn giữ tương đối ổn định. Việc nhu cầu đầu cơ nguội đi ở hợp đồng tương lai trong khi vẫn đứng vững ở quyền chọn khiến việc dự đoán dòng phòng hộ delta của các nhà tạo lập thị trường sẽ chạy theo hướng nào trở nên khó khăn hơn nếu giá tiếp tục giảm từ đây.</p>

  <div class="ko">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">디리빗 1주물 25델타 풋-콜 스큐 · 6월 24일~7월 8일</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">6/24</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/2</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/4</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">7/8 휴전 파기</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">스큐: 20%(풋 프리미엄 확대)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">공포탐욕지수 20대 초중반</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">거래량: 콜 6,258 vs 풋 3,610</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">$80K 콜 미결제약정 $16억+</text>
    </g>
  </svg>
  </div>
  <div class="en">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Deribit One-Week 25-Delta Put-Call Skew · June 24 - July 8</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">6/24</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/2</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/4</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">7/8 Ceasefire Collapse</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew: 20% (put premium widens)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Fear &amp; Greed low-to-mid 20s</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Volume: 6,258 calls vs 3,610 puts</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">$80K call OI $1.6B+</text>
    </g>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">ディリビット1週間物25デルタ・プットコールスキュー・6月24日~7月8日</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">6/24</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/2</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/4</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">7/8 停戦崩壊</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">スキュー: 20%(プットプレミアム拡大)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">恐怖強欲指数20台前半~半ば</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">出来高: コール6,258 vs プット3,610</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">8万ドルコール建玉16億ドル超</text>
    </g>
  </svg>
  </div>
  <div class="es">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Sesgo Put-Call 25 Delta a Una Semana de Deribit · 24 de Junio - 8 de Julio</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24/6</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2/7</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4/7</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8/7 Colapso del Alto el Fuego</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Sesgo: 20% (prima put se amplía)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Miedo y Codicia en 20 bajo-medio</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Volumen: 6.258 calls vs 3.610 puts</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">OI call $80K +1.600M $</text>
    </g>
  </svg>
  </div>
  <div class="de">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Deribit Einwöchiger 25-Delta-Put-Call-Skew · 24. Juni - 8. Juli</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24.6.</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2.7.</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4.7.</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7.7.</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8.7. Waffenstillstand kollabiert</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew: 20% (Put-Prämie steigt)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Angst&amp;Gier unteres bis mittl. 20er</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Volumen: 6.258 Calls vs 3.610 Puts</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">$80K Call OI $1,6 Mrd.+</text>
    </g>
  </svg>
  </div>
  <div class="fr">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Skew Put-Call 25 Delta à Une Semaine de Deribit · 24 Juin - 8 Juillet</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24/6</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2/7</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4/7</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8/7 Effondrement du Cessez-le-feu</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew : 20% (prime put s'élargit)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Peur&amp;Cupidité 20 bas à moyen</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Volume : 6 258 calls vs 3 610 puts</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">OI call 80K$ +1,6 Md$</text>
    </g>
  </svg>
  </div>
  <div class="pt">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Skew Put-Call 25 Delta de Uma Semana da Deribit · 24 de Junho - 8 de Julho</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24/6</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2/7</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4/7</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8/7 Colapso do Cessar-fogo</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew: 20% (prêmio de put se amplia)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Medo&amp;Ganância 20 baixo-médio</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Volume: 6.258 calls vs 3.610 puts</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">OI call $80K +US$ 1,6bi</text>
    </g>
  </svg>
  </div>
  <div class="tr">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Deribit Haftalık 25-Delta Put-Call Skew · 24 Haziran - 8 Temmuz</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">%16</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">%25</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~%19</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">%16</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">%16</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">%20</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24/6</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2/7</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4/7</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8/7 Ateşkes Çöktü</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew: %20 (put primi genişliyor)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Korku&amp;Açgözlülük düşük-orta 20'ler</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Hacim: 6.258 call vs 3.610 put</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">$80K call açık pozisyonu $1,6Mr+</text>
    </g>
  </svg>
  </div>
  <div class="vi">
  <svg viewBox="0 0 700 440" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">Độ Lệch Put-Call 25-Delta Kỳ Hạn 1 Tuần của Deribit · 24/6 - 8/7</text>
    <g font-family="sans-serif">
      <line x1="60" y1="340" x2="640" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="80" x2="60" y2="340" stroke="rgba(255,255,255,.2)" stroke-width="1"/>
      <line x1="60" y1="201" x2="640" y2="201" stroke="rgba(255,255,255,.1)" stroke-dasharray="4,4"/>
      <text x="645" y="205" fill="#71717a" font-size="13">16%</text>
      <polyline points="60,123 205,175 350,201 495,201 640,167" fill="none" stroke="#5eead4" stroke-width="3"/>
      <circle cx="60" cy="123" r="5" fill="#5eead4"/>
      <circle cx="205" cy="175" r="5" fill="#5eead4"/>
      <circle cx="350" cy="201" r="5" fill="#5eead4"/>
      <circle cx="495" cy="201" r="5" fill="#5eead4"/>
      <circle cx="640" cy="167" r="7" fill="#f87171" stroke="#fafafa" stroke-width="1.5"/>
      <text x="60" y="123" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle" font-weight="700">25%</text>
      <text x="205" y="175" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">~19%</text>
      <text x="350" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="495" y="201" dy="-12" fill="#a1a1aa" font-size="13" text-anchor="middle">16%</text>
      <text x="640" y="167" dy="-14" fill="#f87171" font-size="13.5" font-weight="800" text-anchor="middle">20%</text>
      <text x="60" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">24/6</text>
      <text x="205" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">2/7</text>
      <text x="350" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">4/7</text>
      <text x="495" y="360" fill="#a1a1aa" font-size="13" text-anchor="middle">7/7</text>
      <text x="640" y="360" fill="#f87171" font-size="13" text-anchor="middle" font-weight="700">8/7 Ngừng Bắn Sụp Đổ</text>
      <rect x="60" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="195" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Skew: 20% (phụ trội put nới rộng)</text>
      <text x="195" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">Sợ Hãi&amp;Tham Lam mức 20 thấp-vừa</text>
      <rect x="370" y="385" width="270" height="45" rx="6" fill="rgba(255,255,255,.03)" stroke="rgba(255,255,255,.12)" stroke-width="1"/>
      <text x="505" y="404" fill="#a1a1aa" font-size="13" text-anchor="middle">Khối lượng: 6.258 call vs 3.610 put</text>
      <text x="505" y="421" fill="#a1a1aa" font-size="13" text-anchor="middle">OI call $80K hơn 1,6 tỷ USD</text>
    </g>
  </svg>
  </div>

  <h2 class="ko">같은 옵션시장 안에 서로 다른 확신이 공존한다</h2>
  <h2 class="en">Two Different Convictions Coexist in the Same Options Market</h2>
  <h2 class="ja">同じオプション市場の中に異なる確信が共存する</h2>
  <h2 class="es">Dos Convicciones Distintas Coexisten en el Mismo Mercado de Opciones</h2>
  <h2 class="de">Zwei Verschiedene Überzeugungen Koexistieren im Selben Optionsmarkt</h2>
  <h2 class="fr">Deux Convictions Différentes Coexistent Sur le Même Marché d'Options</h2>
  <h2 class="pt">Duas Convicções Diferentes Coexistem no Mesmo Mercado de Opções</h2>
  <h2 class="tr">Aynı Opsiyon Piyasasında İki Farklı Kanaat Bir Arada</h2>
  <h2 class="vi">Hai Niềm Tin Khác Nhau Cùng Tồn Tại Trong Một Thị Trường Quyền Chọn</h2>

  <p class="ko">지금 옵션시장을 한 문장으로 정리하면 이렇다: 헤지 수요는 헤드라인 하나에도 즉각 반응해 프리미엄을 밀어 올리는데, 투기적 콜 포지셔닝은 몇 달째 거의 움직이지 않는다. 이는 서로 다른 참여자 그룹이 서로 다른 시간축에서 베팅하고 있다는 신호에 가깝다 — 단기 변동에 노출된 쪽(스팟 보유자, ETF 연계 헤지 데스크)은 매 헤드라인마다 보험료를 다시 책정하는 반면, 장기 방향성에 베팅한 쪽(디리빗의 레버리지 트레이더)은 단기 노이즈에 포지션을 바꾸지 않고 있다는 것이다.</p>
  <p class="en">If today's options market had to be summed up in one sentence: hedging demand reacts instantly to a single headline and pushes premiums higher, while speculative call positioning has barely budged in months. That looks less like a contradiction and more like a sign that different groups of participants are betting on different time horizons — those exposed to short-term swings (spot holders, ETF-linked hedging desks) are repricing insurance with every headline, while those betting on a longer-term direction (leveraged traders on Deribit) aren't changing positions over short-term noise.</p>
  <p class="ja">今のオプション市場を一言でまとめるならこうだ:ヘッジ需要は単一の見出しにも即座に反応してプレミアムを押し上げるが、投機的なコールポジショニングは何カ月もほとんど動いていない。これは矛盾というより、異なる参加者グループが異なる時間軸で賭けているというサインに近い — 短期的な変動にさらされている側(スポット保有者、ETF連動のヘッジデスク)は見出しが出るたびに保険料を付け直す一方、長期的な方向性に賭けている側(ディリビットのレバレッジトレーダー)は短期的なノイズでポジションを変えていない、ということだ。</p>
  <p class="es">Si el mercado de opciones actual tuviera que resumirse en una frase: la demanda de cobertura reacciona instantáneamente a un solo titular y empuja las primas al alza, mientras que el posicionamiento especulativo en calls apenas se ha movido en meses. Eso se parece menos a una contradicción y más a una señal de que distintos grupos de participantes están apostando en horizontes temporales distintos — quienes están expuestos a oscilaciones a corto plazo (tenedores de spot, mesas de cobertura vinculadas a ETF) están reajustando el precio del seguro con cada titular, mientras que quienes apuestan por una dirección a más largo plazo (traders apalancados en Deribit) no están cambiando de posición por el ruido de corto plazo.</p>
  <p class="de">Müsste man den heutigen Optionsmarkt in einem Satz zusammenfassen: Die Hedging-Nachfrage reagiert sofort auf eine einzelne Schlagzeile und treibt die Prämien nach oben, während sich die spekulative Call-Positionierung seit Monaten kaum bewegt hat. Das sieht weniger nach einem Widerspruch aus und mehr nach einem Zeichen dafür, dass verschiedene Teilnehmergruppen auf unterschiedlichen Zeithorizonten wetten — diejenigen, die kurzfristigen Schwankungen ausgesetzt sind (Spot-Halter, ETF-gebundene Hedging-Desks), bepreisen ihre Versicherung mit jeder Schlagzeile neu, während diejenigen, die auf eine längerfristige Richtung setzen (gehebelte Trader auf Deribit), ihre Positionen wegen kurzfristigem Rauschen nicht ändern.</p>
  <p class="fr">Si le marché des options d'aujourd'hui devait être résumé en une phrase : la demande de couverture réagit instantanément à un seul titre et pousse les primes à la hausse, tandis que le positionnement spéculatif en calls a à peine bougé depuis des mois. Cela ressemble moins à une contradiction qu'à un signe que différents groupes de participants parient sur des horizons temporels différents — ceux exposés aux fluctuations à court terme (détenteurs au comptant, bureaux de couverture liés aux ETF) revalorisent leur assurance à chaque titre, tandis que ceux qui parient sur une direction à plus long terme (traders à effet de levier sur Deribit) ne changent pas de position à cause du bruit à court terme.</p>
  <p class="pt">Se o mercado de opções de hoje tivesse que ser resumido em uma frase: a demanda por hedge reage instantaneamente a uma única manchete e empurra os prêmios para cima, enquanto o posicionamento especulativo em calls mal se moveu em meses. Isso parece menos uma contradição e mais um sinal de que diferentes grupos de participantes estão apostando em horizontes de tempo diferentes — aqueles expostos a oscilações de curto prazo (detentores de spot, mesas de hedge ligadas a ETFs) estão reprecificando o seguro a cada manchete, enquanto aqueles que apostam em uma direção de mais longo prazo (traders alavancados na Deribit) não estão mudando de posição por causa do ruído de curto prazo.</p>
  <p class="tr">Bugünün opsiyon piyasasını tek bir cümlede özetlemek gerekirse: hedge talebi tek bir manşete anında tepki verip primleri yukarı iterken, spekülatif call pozisyonlanması aylardır neredeyse hiç kımıldamadı. Bu bir çelişkiden çok, farklı katılımcı gruplarının farklı zaman ufuklarında bahis oynadığının bir işaretine benziyor — kısa vadeli dalgalanmalara maruz kalanlar (spot sahipleri, ETF'e bağlı hedge masaları) her manşette sigortayı yeniden fiyatlıyor, uzun vadeli yöne bahis oynayanlar (Deribit'teki kaldıraçlı yatırımcılar) ise kısa vadeli gürültüyle pozisyon değiştirmiyor.</p>
  <p class="vi">Nếu phải tóm tắt thị trường quyền chọn hiện nay trong một câu: nhu cầu phòng hộ phản ứng ngay lập tức với một tiêu đề duy nhất và đẩy mức phụ trội lên cao, trong khi vị thế call mang tính đầu cơ hầu như không nhúc nhích suốt nhiều tháng. Điều đó ít giống một mâu thuẫn mà giống dấu hiệu cho thấy các nhóm tham gia khác nhau đang đặt cược trên các khung thời gian khác nhau — những người tiếp xúc với biến động ngắn hạn (người nắm giữ giao ngay, bàn phòng hộ liên kết ETF) đang định giá lại bảo hiểm sau mỗi tiêu đề, trong khi những người đặt cược vào hướng đi dài hạn (nhà giao dịch đòn bẩy trên Deribit) không thay đổi vị thế vì nhiễu ngắn hạn.</p>

  <p class="ko">문제는 이 두 시간축이 언젠가는 만난다는 점이다. 스큐가 계속 오르며 20%를 넘어 6월 넷째 주 수준인 25%에 다가간다면, 그건 단기 공포가 구조적으로 굳어지고 있다는 신호로 읽어야 한다. 반대로 가격이 추가로 밀리는데도 $80,000 콜 미결제약정이 줄지 않는다면, 그건 그 포지셔닝이 실제로는 손절 기준을 넘어선 '매몰비용형 베팅'으로 변했을 가능성을 시사한다. 지금은 둘 중 어느 쪽도 아직 확정되지 않은, 신호가 갈라진 국면이다.</p>
  <p class="en">The catch is that these two time horizons eventually meet. If the skew keeps climbing past 20% toward the ~25% seen in late June, that should be read as short-term fear hardening into something more structural. Conversely, if the $80,000 call open interest doesn't shrink even as price slides further, that would suggest the positioning has effectively turned into a sunk-cost bet held past any reasonable stop-loss discipline. Right now, neither of those has resolved — this is a phase where the signals remain genuinely split.</p>
  <p class="ja">問題は、この二つの時間軸がいずれ交わるという点だ。スキューが上昇を続け20%を超えて6月第4週の水準である25%に近づくなら、それは短期的な恐怖が構造的に固まりつつあるサインとして読むべきだ。逆に、価格がさらに下落してもなお8万ドルのコール建玉が減らないなら、そのポジショニングが実質的に、合理的な損切りラインを超えて保有し続ける「サンクコスト型の賭け」に変わっている可能性を示唆する。現時点ではそのどちらも確定しておらず、シグナルが本当に分かれたままの局面だ。</p>
  <p class="es">El problema es que estos dos horizontes temporales acaban encontrándose. Si el sesgo sigue subiendo por encima del 20% acercándose al ~25% visto a finales de junio, eso debería leerse como que el miedo a corto plazo se está endureciendo hacia algo más estructural. Por el contrario, si el interés abierto de la call de 80.000 $ no se reduce aunque el precio siga cayendo, eso sugeriría que el posicionamiento se ha convertido en la práctica en una apuesta de costos hundidos mantenida más allá de cualquier disciplina razonable de stop-loss. Por ahora, ninguna de las dos cosas se ha resuelto — esta es una fase en la que las señales siguen genuinamente divididas.</p>
  <p class="de">Der Haken ist, dass sich diese beiden Zeithorizonte irgendwann treffen. Wenn der Skew weiter über 20% hinaus in Richtung der rund 25% steigt, die Ende Juni zu sehen waren, sollte das als Zeichen gelesen werden, dass sich kurzfristige Angst zu etwas Strukturellerem verhärtet. Schrumpft umgekehrt das Open Interest des 80.000-$-Calls nicht, selbst wenn der Preis weiter fällt, würde das darauf hindeuten, dass sich die Positionierung faktisch in eine Sunk-Cost-Wette verwandelt hat, die über jede vernünftige Stop-Loss-Disziplin hinaus gehalten wird. Im Moment hat sich keines von beidem aufgelöst — dies ist eine Phase, in der die Signale wirklich gespalten bleiben.</p>
  <p class="fr">Le hic, c'est que ces deux horizons temporels finissent par se rencontrer. Si le skew continue de grimper au-delà de 20% en se rapprochant des ~25% observés fin juin, cela devrait être lu comme une peur à court terme se durcissant en quelque chose de plus structurel. À l'inverse, si l'open interest du call à 80 000 $ ne diminue pas alors même que le prix continue de baisser, cela suggérerait que ce positionnement s'est en fait transformé en un pari de coûts irrécupérables, maintenu au-delà de toute discipline raisonnable de stop-loss. Pour l'instant, aucun des deux ne s'est résolu — c'est une phase où les signaux restent réellement divisés.</p>
  <p class="pt">O problema é que esses dois horizontes de tempo acabam se encontrando. Se o skew continuar subindo além de 20%, aproximando-se dos ~25% vistos no final de junho, isso deve ser lido como o medo de curto prazo se solidificando em algo mais estrutural. Por outro lado, se o open interest da call de US$ 80.000 não diminuir mesmo com o preço caindo ainda mais, isso sugeriria que o posicionamento efetivamente se transformou em uma aposta de custo irrecuperável, mantida além de qualquer disciplina razoável de stop-loss. No momento, nenhuma das duas coisas se resolveu — esta é uma fase em que os sinais permanecem genuinamente divididos.</p>
  <p class="tr">Sorun şu ki bu iki zaman ufku er ya da geç kesişecek. Skew %20'nin üzerine çıkmaya devam edip haziran sonunda görülen ~%25 seviyesine yaklaşırsa, bu kısa vadeli korkunun daha yapısal bir şeye dönüştüğünün işareti olarak okunmalı. Tersine, fiyat daha da gerilerken 80.000 dolarlık call açık pozisyonu küçülmezse, bu pozisyonlanmanın aslında makul bir zarar-kes disiplininin çok ötesinde tutulan bir "batık maliyet bahsine" dönüştüğünü düşündürür. Şu an için ikisi de henüz netleşmedi — bu, sinyallerin gerçekten ayrıştığı bir aşama.</p>
  <p class="vi">Vấn đề là hai khung thời gian này rồi sẽ gặp nhau. Nếu độ lệch tiếp tục tăng vượt 20% tiến gần mức ~25% từng thấy vào cuối tháng 6, điều đó nên được hiểu là nỗi sợ ngắn hạn đang cứng lại thành thứ gì đó mang tính cấu trúc hơn. Ngược lại, nếu open interest của quyền chọn call 80.000 USD không giảm dù giá tiếp tục trượt, điều đó cho thấy vị thế này trên thực tế đã biến thành một canh bạc "chi phí chìm" được giữ vượt quá mọi kỷ luật cắt lỗ hợp lý. Hiện tại, chưa điều nào trong hai điều đó được ngã ngũ — đây là giai đoạn mà các tín hiệu thực sự vẫn còn phân tách.</p>

  <div class="box ko">🎯 <strong>지켜볼 지점:</strong> ① 1주물 풋-콜 스큐가 20%를 넘어 6월 넷째 주 수준인 25%까지 재상승하는지, 아니면 다시 16%대로 돌아가는지. ② $80,000 콜 미결제약정이 향후 며칠 안에 눈에 띄게 줄어드는지 — 투기적 확신이 흔들리는 첫 신호가 될 수 있다. ③ 이후 만기물에서 풋/콜 거래량 비율이 1을 넘어서는 날이 나오는지(실제로 풋 매수가 콜을 앞지르는 순간). ④ 11개 거래소 합산 선물 미결제약정이 $216억 아래로 더 떨어지며 선물·옵션 간 엇박자가 깊어지는지. ⑤ 7월 17일 이란산 원유 거래 정리 시한을 전후해 새로운 헤드라인이 스큐를 한 번 더 밀어 올리는지.</div>
  <div class="box en">🎯 <strong>What to watch:</strong> ① Whether the one-week put-call skew keeps climbing past 20% back toward the ~25% seen in late June, or fades back into the mid-16% range. ② Whether the $80,000 call open interest shrinks noticeably over the coming days — a first sign speculative conviction is cracking. ③ Whether a future expiry shows a put/call volume ratio crossing above 1, meaning put buying actually outpaces calls. ④ Whether aggregate futures open interest across 11 exchanges falls further below $21.6B, deepening the futures/options bifurcation. ⑤ Whether fresh headlines around the July 17 wind-down deadline for Iranian oil transactions push the skew even higher.</div>
  <div class="box ja">🎯 <strong>注視点:</strong> ①1週間物プット・コールスキューが20%を超えて上昇を続け、6月第4週の水準である25%まで再び高まるか、それとも16%台へ戻るか。②今後数日で8万ドルのコール建玉が目立って減少するか — 投機的確信が揺らぐ最初のサインになりうる。③今後の満期物でプット・コール出来高比率が1を超える日が出るか(実際にプット買いがコールを上回る瞬間)。④11取引所を合算した先物建玉が216億ドルをさらに下回り、先物とオプションの食い違いが深まるか。⑤7月17日のイラン産原油取引清算期限を前後して新たな見出しがスキューをさらに押し上げるか。</div>
  <div class="box es">🎯 <strong>Qué observar:</strong> ① Si el sesgo put-call a una semana sigue subiendo por encima del 20%, acercándose al ~25% visto a finales de junio, o si vuelve a caer hacia la zona del 16%. ② Si el interés abierto de la call de 80.000 $ se reduce notablemente en los próximos días — una primera señal de que la convicción especulativa se está resquebrajando. ③ Si algún vencimiento futuro muestra una ratio de volumen put/call que supere 1, es decir, que la compra de puts realmente supere a la de calls. ④ Si el interés abierto agregado de futuros en 11 exchanges cae aún más por debajo de 21.600 millones de $, profundizando la bifurcación entre futuros y opciones. ⑤ Si nuevos titulares en torno al plazo del 17 de julio para liquidar transacciones de petróleo iraní empujan el sesgo aún más alto.</div>
  <div class="box de">🎯 <strong>Worauf zu achten ist:</strong> ① Ob der einwöchige Put-Call-Skew weiter über 20% hinaus in Richtung der Ende Juni gesehenen ~25% steigt oder wieder in den Bereich von 16% zurückfällt. ② Ob das Open Interest des 80.000-$-Calls in den kommenden Tagen spürbar schrumpft — ein erstes Zeichen dafür, dass die spekulative Überzeugung bröckelt. ③ Ob ein künftiger Verfall ein Put/Call-Volumenverhältnis über 1 zeigt, also der Put-Kauf die Calls tatsächlich übertrifft. ④ Ob das aggregierte Futures-Open-Interest über 11 Börsen weiter unter 21,6 Mrd. $ fällt und die Futures/Options-Spaltung vertieft. ⑤ Ob neue Schlagzeilen rund um die Frist zum 17. Juli für die Abwicklung iranischer Öltransaktionen den Skew noch weiter nach oben treiben.</div>
  <div class="box fr">🎯 <strong>À surveiller :</strong> ① Si le skew put-call à une semaine continue de grimper au-delà de 20% en se rapprochant des ~25% observés fin juin, ou s'il retombe dans la zone des 16%. ② Si l'open interest du call à 80 000 $ diminue nettement dans les jours à venir — un premier signe que la conviction spéculative se fissure. ③ Si une future échéance affiche un ratio de volume put/call dépassant 1, c'est-à-dire que l'achat de puts dépasse réellement celui de calls. ④ Si l'open interest agrégé des futures sur 11 bourses tombe encore en dessous de 21,6 milliards de $, approfondissant la bifurcation entre futures et options. ⑤ Si de nouveaux titres autour de l'échéance du 17 juillet pour liquider les transactions de pétrole iranien poussent le skew encore plus haut.</div>
  <div class="box pt">🎯 <strong>O que observar:</strong> ① Se o skew put-call de uma semana continua subindo além de 20%, aproximando-se dos ~25% vistos no final de junho, ou volta a cair para a faixa de 16%. ② Se o open interest da call de US$ 80.000 encolhe visivelmente nos próximos dias — um primeiro sinal de que a convicção especulativa está rachando. ③ Se algum vencimento futuro mostra uma razão de volume put/call ultrapassando 1, ou seja, a compra de puts realmente superando as calls. ④ Se o open interest agregado de futuros em 11 corretoras cai ainda mais abaixo de US$ 21,6 bilhões, aprofundando a bifurcação entre futuros e opções. ⑤ Se novas manchetes em torno do prazo de 17 de julho para liquidar transações de petróleo iraniano empurram o skew ainda mais alto.</div>
  <div class="box tr">🎯 <strong>İzlenecekler:</strong> ① Haftalık put-call skew'in %20'nin üzerine çıkmaya devam edip haziran sonunda görülen ~%25 seviyesine yaklaşıp yaklaşmayacağı, yoksa yeniden %16 civarına dönüp dönmeyeceği. ② 80.000 dolarlık call açık pozisyonunun önümüzdeki günlerde belirgin şekilde küçülüp küçülmeyeceği — spekülatif inancın çatladığının ilk işareti olabilir. ③ Gelecekteki bir vadede put/call hacim oranının 1'in üzerine çıkıp çıkmayacağı (put alımlarının gerçekten call'ları geçtiği an). ④ 11 borsada toplam vadeli işlem açık pozisyonunun 21,6 milyar doların daha da altına inip inmeyeceği ve vadeli işlem/opsiyon ayrışmasının derinleşip derinleşmeyeceği. ⑤ 17 Temmuz İran petrolü tasfiye son tarihi civarında yeni manşetlerin skew'i bir kez daha yukarı itip itmeyeceği.</div>
  <div class="box vi">🎯 <strong>Những điều cần theo dõi:</strong> ① Liệu độ lệch put-call kỳ hạn một tuần có tiếp tục tăng vượt 20% tiến gần mức ~25% từng thấy vào cuối tháng 6, hay quay trở lại vùng 16%. ② Liệu open interest của quyền chọn call 80.000 USD có giảm rõ rệt trong những ngày tới hay không — dấu hiệu đầu tiên cho thấy niềm tin đầu cơ đang lung lay. ③ Liệu một kỳ đáo hạn trong tương lai có cho thấy tỷ lệ khối lượng put/call vượt quá 1 hay không, nghĩa là lực mua put thực sự vượt qua call. ④ Liệu open interest hợp đồng tương lai tổng hợp trên 11 sàn có giảm sâu hơn nữa xuống dưới 21,6 tỷ USD, làm sâu sắc thêm sự phân kỳ giữa hợp đồng tương lai và quyền chọn. ⑤ Liệu các tiêu đề mới quanh thời hạn 17/7 để thanh lý các giao dịch dầu Iran có đẩy độ lệch lên cao hơn nữa hay không.</div>

  <h2 class="ko">함께 보면 좋은 글</h2>
  <h2 class="en">Best Combined With</h2>
  <h2 class="ja">併せて見るべき記事</h2>
  <h2 class="es">Mejor Combinado Con</h2>
  <h2 class="de">Am besten kombiniert mit</h2>
  <h2 class="fr">À Combiner Avec</h2>
  <h2 class="pt">Melhor Combinado Com</h2>
  <h2 class="tr">En İyi Şununla Birlikte</h2>
  <h2 class="vi">Kết Hợp Tốt Nhất Với</h2>

  <ul class="ko">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">오일은 급등하고 금은 등을 돌렸다 — 비트코인 파생시장은 이미 롱에 쏠려 있지 않았다</a>:</strong> 이번 글의 배경이 된 매크로 충격과 펀딩비·청산 데이터</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">CME 옵션시장은 6분의 1로 쪼그라들었는데, 디리빗은 12만 달러 콜에 7,527 BTC를 걸었다</a>:</strong> 같은 '옵션 낙관 vs 현물 방어' 구도를 장기물·거래소간 비교로</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">비트코인 $63,000 회복, 그런데 옵션 시장은 아직도 풋에 웃돈을 준다</a>:</strong> 이번에 다시 상승한 스큐가 어디서 출발했는지</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">선물 오픈 인터레스트 빠르게 복귀 — 그런데 롱숏비율은 아직 안 쏠렸다</a>:</strong> 선물 쪽 디레버리징 배경</li>
  </ul>
  <ul class="en">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">Oil Spiked and Gold Turned Its Back — Bitcoin's Derivatives Market Wasn't Crowded Long to Begin With</a>:</strong> The macro shock and funding/liquidation backdrop behind this piece</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">CME's Options Market Has Shrunk to a Sixth of Its Size — While Deribit Just Piled 7,527 BTC Into a $120K Call</a>:</strong> The same optimism-vs-caution split, seen through long-dated strikes and venue comparison</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin Reclaimed $63,000 — Options Traders Are Still Paying Up for Puts</a>:</strong> Where this week's renewed skew climb started from</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">Futures Open Interest Is Rebuilding Fast — But Long/Short Positioning Isn't Yet</a>:</strong> The backdrop to the futures-side deleveraging</li>
  </ul>
  <ul class="ja">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">原油は急騰し金は背を向けた — ビットコインのデリバティブ市場はもともとロングに偏っていなかった</a>:</strong> この記事の背景となったマクロショックと資金調達率・清算データ</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">CMEのオプション市場は6分の1に縮小、ディリビットは12万ドルコールに7,527 BTCを賭けた</a>:</strong> 同じ「オプションの楽観 vs 現物の防御」構図を長期物・取引所間比較で</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">ビットコイン6万3,000ドル回復、それでもオプション市場は依然プットに割増料金を払う</a>:</strong> 今回再上昇したスキューの出発点</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">先物オープンインタレストは急速に回復 — しかしロングショート比率はまだ偏っていない</a>:</strong> 先物側のデレバレッジの背景</li>
  </ul>
  <ul class="es">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">El Petróleo Se Disparó y el Oro Le Dio la Espalda — El Mercado de Derivados de Bitcoin No Estaba Abarrotado de Largos</a>:</strong> El shock macro y los datos de financiación/liquidaciones detrás de este artículo</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">El Mercado de Opciones de CME Se Redujo a una Sexta Parte — Mientras Deribit Apiló 7.527 BTC en una Call de 120K</a>:</strong> La misma división optimismo-vs-cautela, vista a través de strikes de largo plazo y comparación entre plataformas</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin Recuperó los 63.000 $, Pero los Operadores de Opciones Siguen Pagando de Más por Puts</a>:</strong> De dónde partió el nuevo repunte del sesgo esta semana</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">El Interés Abierto de Futuros Se Reconstruye Rápido — Pero el Posicionamiento Largo/Corto Aún No</a>:</strong> El contexto del desapalancamiento en futuros</li>
  </ul>
  <ul class="de">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">Öl Schoss Hoch und Gold Kehrte den Rücken — Bitcoins Derivatemarkt War Nicht Mit Long-Positionen Überfüllt</a>:</strong> Der Makroschock und die Funding-/Liquidations-Daten hinter diesem Beitrag</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">CMEs Optionsmarkt Ist Auf Ein Sechstel Geschrumpft — Während Deribit Gerade 7.527 BTC in Einen 120K-Call Steckte</a>:</strong> Dieselbe Optimismus-vs-Vorsicht-Spaltung, gesehen über langfristige Strikes und Börsenvergleich</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin Holte Sich 63.000 $ Zurück — Optionshändler Zahlen Immer Noch Aufpreis für Puts</a>:</strong> Wo der erneute Skew-Anstieg dieser Woche seinen Ursprung hatte</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">Futures-Open-Interest Baut Sich Schnell Wieder Auf — Aber Long/Short-Positionierung Noch Nicht</a>:</strong> Der Hintergrund zur Entschuldung auf der Futures-Seite</li>
  </ul>
  <ul class="fr">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">Le Pétrole a Flambé et l'Or a Tourné le Dos — Le Marché des Dérivés Bitcoin N'était Pas Encombré de Positions Longues</a>:</strong> Le choc macro et les données de funding/liquidations derrière cet article</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">Le Marché des Options du CME S'est Réduit au Sixième de Sa Taille — Pendant Que Deribit Empilait 7 527 BTC Dans un Call à 120K</a>:</strong> La même division optimisme-vs-prudence, vue à travers les strikes longs et la comparaison entre plateformes</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Le Bitcoin a Repris les 63 000 $, Mais les Traders d'Options Paient Toujours une Surprime sur les Puts</a>:</strong> D'où est parti le regain du skew cette semaine</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">L'Open Interest des Futures Se Reconstitue Vite — Mais Pas Encore le Positionnement Long/Short</a>:</strong> Le contexte du désendettement côté futures</li>
  </ul>
  <ul class="pt">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">O Petróleo Disparou e o Ouro Virou as Costas — O Mercado de Derivativos do Bitcoin Não Estava Lotado de Posições Compradas</a>:</strong> O choque macro e os dados de funding/liquidações por trás deste texto</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">O Mercado de Opções da CME Encolheu para um Sexto do Tamanho — Enquanto a Deribit Empilhou 7.527 BTC em uma Call de 120K</a>:</strong> A mesma divisão otimismo-vs-cautela, vista por strikes de longo prazo e comparação entre corretoras</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin Recuperou os US$ 63.000, Mas os Traders de Opções Ainda Pagam Mais Caro pelas Puts</a>:</strong> De onde partiu a nova alta do skew nesta semana</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">O Open Interest de Futuros Está se Reconstruindo Rápido — Mas o Posicionamento Comprado/Vendido Ainda Não</a>:</strong> O contexto da desalavancagem do lado dos futuros</li>
  </ul>
  <ul class="tr">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">Petrol Fırladı, Altın Sırtını Döndü — Bitcoin'in Türev Piyasası Zaten Long'a Sıkışmamıştı</a>:</strong> Bu yazının arka planındaki makro şok ve fonlama/tasfiye verileri</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">CME'nin Opsiyon Piyasası Altıda Birine Küçüldü — Deribit ise 120K'lık Call'a 7.527 BTC Yığdı</a>:</strong> Aynı iyimserlik-vs-temkin ayrımı, uzun vadeli strike'lar ve borsa karşılaştırmasıyla</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin 63.000 Doları Geri Aldı, Ama Opsiyon Yatırımcıları Hâlâ Put'lara Fazla Ödüyor</a>:</strong> Bu haftaki yeniden yükselişin skew açısından nereden başladığı</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">Vadeli İşlem Açık Pozisyonu Hızla Toparlanıyor — Ama Long/Short Pozisyonlanması Henüz Değil</a>:</strong> Vadeli işlem tarafındaki kaldıraç azaltmanın arka planı</li>
  </ul>
  <ul class="vi">
    <li><strong><a href="/blog/iran-shock-derivatives-positioning-gap.php">Dầu Tăng Vọt, Vàng Quay Lưng — Thị Trường Phái Sinh Bitcoin Vốn Không Chật Cứng Vị Thế Mua</a>:</strong> Cú sốc vĩ mô và dữ liệu funding/thanh lý làm nền cho bài viết này</li>
    <li><strong><a href="/blog/cme-options-collapse-120k-call-speculation-gap.php">Thị Trường Quyền Chọn CME Thu Hẹp Còn Một Phần Sáu — Trong Khi Deribit Vừa Dồn 7.527 BTC Vào Call 120K</a>:</strong> Cùng thế phân hóa lạc quan-vs-thận trọng, nhìn qua các strike kỳ hạn dài và so sánh giữa các sàn</li>
    <li><strong><a href="/blog/options-skew-not-confirming-rebound.php">Bitcoin Lấy Lại Mốc 63.000 USD, Nhưng Nhà Giao Dịch Quyền Chọn Vẫn Trả Giá Cao Cho Put</a>:</strong> Đợt tăng trở lại của độ lệch tuần này bắt đầu từ đâu</li>
    <li><strong><a href="/blog/oi-rebuild-balanced-positioning.php">Open Interest Hợp Đồng Tương Lai Đang Phục Hồi Nhanh — Nhưng Vị Thế Long/Short Thì Chưa</a>:</strong> Bối cảnh giảm đòn bẩy ở phía hợp đồng tương lai</li>
  </ul>

  <p class="ko" style="font-size:.85rem;color:#71717a">출처: CoinDesk(옵션 스큐·가격 흐름·Daybook), Deribit Insights(스큐 방법론), Yahoo Finance, Fortune, cryptonews.com·cryptonews.net, Kavout Market Lens(옵션 만기·미결제약정), Bitget News·CryptoRank(8만 달러 콜 포지셔닝), CoinGlass(선물 미결제약정·공포탐욕지수), Farside Investors 경유 CoinDesk(ETF 자금 흐름 배경), BTCtiming.com 자체 분석. 수치는 2026년 7월 8일 인용 시점 기준이며 실시간으로 변동할 수 있다. 본 글은 시장 상태를 진단하는 콘텐츠이며 투자 조언이 아니다.</p>
  <p class="en" style="font-size:.85rem;color:#71717a">Sources: CoinDesk (options skew, price action, Daybook), Deribit Insights (skew methodology), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (options expiry, open interest), Bitget News/CryptoRank ($80,000 call positioning), CoinGlass (futures open interest, Fear &amp; Greed Index), Farside Investors via CoinDesk (ETF flow background), BTCtiming.com's own analysis. Figures are as of July 8, 2026 and may change in real time. This piece diagnoses current market conditions and is not investment advice.</p>
  <p class="ja" style="font-size:.85rem;color:#71717a">出典: CoinDesk(オプションスキュー・価格動向・Daybook)、Deribit Insights(スキュー算出方法)、Yahoo Finance、Fortune、cryptonews.com・cryptonews.net、Kavout Market Lens(オプション満期・建玉)、Bitget News・CryptoRank(8万ドルコールのポジショニング)、CoinGlass(先物建玉・恐怖強欲指数)、Farside Investors経由CoinDesk(ETF資金フローの背景)、BTCtiming.com独自分析。数値は2026年7月8日時点の引用であり、リアルタイムで変動する可能性がある。本記事は市場状況を診断するコンテンツであり、投資助言ではない。</p>
  <p class="es" style="font-size:.85rem;color:#71717a">Fuentes: CoinDesk (sesgo de opciones, movimiento de precios, Daybook), Deribit Insights (metodología del sesgo), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (vencimiento de opciones, interés abierto), Bitget News/CryptoRank (posicionamiento de la call de 80.000 $), CoinGlass (interés abierto de futuros, Índice de Miedo y Codicia), Farside Investors vía CoinDesk (contexto de flujos de ETF), análisis propio de BTCtiming.com. Las cifras son del 8 de julio de 2026 y pueden cambiar en tiempo real. Este artículo diagnostica las condiciones actuales del mercado y no constituye asesoramiento de inversión.</p>
  <p class="de" style="font-size:.85rem;color:#71717a">Quellen: CoinDesk (Optionsskew, Kursverlauf, Daybook), Deribit Insights (Skew-Methodik), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (Optionsverfall, Open Interest), Bitget News/CryptoRank (80.000-$-Call-Positionierung), CoinGlass (Futures-Open-Interest, Angst-und-Gier-Index), Farside Investors via CoinDesk (Hintergrund zu ETF-Flüssen), BTCtiming.com eigene Analyse. Die Zahlen beziehen sich auf den Stand vom 8. Juli 2026 und können sich in Echtzeit ändern. Dieser Beitrag diagnostiziert aktuelle Marktbedingungen und stellt keine Anlageberatung dar.</p>
  <p class="fr" style="font-size:.85rem;color:#71717a">Sources : CoinDesk (skew des options, mouvement de prix, Daybook), Deribit Insights (méthodologie du skew), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (échéance des options, open interest), Bitget News/CryptoRank (positionnement du call à 80 000 $), CoinGlass (open interest des futures, indice Peur et Cupidité), Farside Investors via CoinDesk (contexte des flux ETF), analyse propre de BTCtiming.com. Les chiffres datent du 8 juillet 2026 et peuvent changer en temps réel. Cet article diagnostique les conditions actuelles du marché et ne constitue pas un conseil en investissement.</p>
  <p class="pt" style="font-size:.85rem;color:#71717a">Fontes: CoinDesk (skew de opções, movimento de preços, Daybook), Deribit Insights (metodologia do skew), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (vencimento de opções, open interest), Bitget News/CryptoRank (posicionamento da call de US$ 80.000), CoinGlass (open interest de futuros, Índice de Medo e Ganância), Farside Investors via CoinDesk (contexto de fluxos de ETF), análise própria da BTCtiming.com. Os números são de 8 de julho de 2026 e podem mudar em tempo real. Este texto diagnostica as condições atuais do mercado e não constitui aconselhamento de investimento.</p>
  <p class="tr" style="font-size:.85rem;color:#71717a">Kaynaklar: CoinDesk (opsiyon skew'i, fiyat hareketi, Daybook), Deribit Insights (skew metodolojisi), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (opsiyon vadesi, açık pozisyon), Bitget News/CryptoRank (80.000 dolarlık call pozisyonlanması), CoinGlass (vadeli işlem açık pozisyonu, Korku ve Açgözlülük Endeksi), Farside Investors üzerinden CoinDesk (ETF akış arka planı), BTCtiming.com'un kendi analizi. Rakamlar 8 Temmuz 2026 itibarıyla alıntılanmıştır ve gerçek zamanlı olarak değişebilir. Bu yazı mevcut piyasa koşullarını teşhis eder, yatırım tavsiyesi değildir.</p>
  <p class="vi" style="font-size:.85rem;color:#71717a">Nguồn: CoinDesk (độ lệch quyền chọn, diễn biến giá, Daybook), Deribit Insights (phương pháp tính skew), Yahoo Finance, Fortune, cryptonews.com/cryptonews.net, Kavout Market Lens (đáo hạn quyền chọn, open interest), Bitget News/CryptoRank (vị thế call 80.000 USD), CoinGlass (open interest hợp đồng tương lai, Chỉ số Sợ hãi và Tham lam), Farside Investors qua CoinDesk (bối cảnh dòng vốn ETF), phân tích riêng của BTCtiming.com. Số liệu được trích dẫn tính đến ngày 8/7/2026 và có thể thay đổi theo thời gian thực. Bài viết này chẩn đoán tình trạng thị trường hiện tại và không phải lời khuyên đầu tư.</p>

<?php require __DIR__.'/_footer.php'; ?>
