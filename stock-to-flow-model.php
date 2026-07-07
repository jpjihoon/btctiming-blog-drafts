<?php $slug = 'stock-to-flow-model'; require __DIR__.'/_header.php'; ?>

<p class="ko">2019년, 익명 트위터 계정 "PlanB"가 발표한 논문 하나가 비트코인 커뮤니티를 뒤집어놨어요. 채굴량이 줄어드는 반감기 구조만으로 미래 가격을 예측할 수 있다는 주장이었죠. 이게 <strong>Stock-to-Flow(S2F) 모델</strong>입니다. 한동안 무서울 정도로 잘 맞았고, 그다음엔 완전히 틀렸어요. 둘 다 사실이에요.</p>
  <p class="en">In 2019, a paper from an anonymous Twitter account called "PlanB" turned the Bitcoin community upside down. The claim: you could predict future price purely from the halving-driven scarcity structure. This is the <strong>Stock-to-Flow (S2F) model</strong>. For a while, it was eerily accurate. Then it was completely wrong. Both of those are true.</p>
  <p class="ja">2019年、匿名Twitterアカウント「PlanB」が発表した論文一つが、ビットコインコミュニティをひっくり返しました。減少していく半減期の採掘構造だけで将来価格を予測できるという主張でした。これが<strong>Stock-to-Flow(S2F)モデル</strong>です。しばらくは恐ろしいほど当たり、その後完全に外れました。両方とも事実です。</p>

  <p class="es">En 2019, un artículo de una cuenta anónima de Twitter llamada "PlanB" puso patas arriba a la comunidad de Bitcoin. La afirmación: se podía predecir el precio futuro únicamente a partir de la estructura de escasez impulsada por el halving. Esto es el <strong>modelo Stock-to-Flow (S2F)</strong>. Por un tiempo, fue inquietantemente preciso. Luego estuvo completamente equivocado. Ambas cosas son ciertas.</p>
  <p class="de">2019 stellte ein Papier von einem anonymen Twitter-Konto namens "PlanB" die Bitcoin-Community auf den Kopf. Die Behauptung: Man könnte den zukünftigen Preis rein aus der durch das Halving getriebenen Knappheitsstruktur vorhersagen. Dies ist das <strong>Stock-to-Flow-(S2F)-Modell</strong>. Eine Zeit lang war es unheimlich genau. Dann lag es völlig falsch. Beides ist wahr.</p>
  <p class="fr">En 2019, un article publié par un compte Twitter anonyme appelé "PlanB" a bouleversé la communauté Bitcoin. L'affirmation : on pouvait prédire le prix futur uniquement à partir de la structure de rareté induite par le halving. C'est le <strong>modèle Stock-to-Flow (S2F)</strong>. Pendant un temps, il fut d'une précision troublante. Puis il s'est révélé complètement faux. Les deux affirmations sont vraies.</p>
  <p class="pt">Em 2019, um artigo de uma conta anônima do Twitter chamada "PlanB" virou a comunidade Bitcoin de cabeça para baixo. A afirmação: seria possível prever o preço futuro unicamente a partir da estrutura de escassez gerada pelo halving. Este é o <strong>modelo Stock-to-Flow (S2F)</strong>. Por um tempo, foi assustadoramente preciso. Depois, revelou-se completamente equivocado. Ambas as afirmações são verdadeiras.</p>
  <p class="tr">2019 yılında, "PlanB" adlı anonim bir Twitter hesabından yayımlanan bir makale Bitcoin topluluğunu altüst etti. İddia şuydu: gelecekteki fiyat, yalnızca yarılanmanın (halving) yönlendirdiği kıtlık yapısından tahmin edilebilirdi. Bu, <strong>Stock-to-Flow (S2F) modeli</strong>dir. Bir süre ürkütücü derecede isabetliydi. Sonra tamamen yanlış çıktı. İkisi de doğru.</p>
  <p class="vi">Năm 2019, một bài viết từ một tài khoản Twitter ẩn danh có tên "PlanB" đã đảo lộn cộng đồng Bitcoin. Tuyên bố: có thể dự đoán giá tương lai chỉ dựa vào cấu trúc khan hiếm do halving tạo ra. Đây chính là <strong>mô hình Stock-to-Flow (S2F)</strong>. Trong một thời gian, nó chính xác đến mức đáng sợ. Sau đó nó hoàn toàn sai. Cả hai điều đều đúng.</p>

  <h2 class="ko">모델 자체는 단순하다</h2>
  <h2 class="en">The model itself is simple</h2>
  <h2 class="ja">モデル自体はシンプル</h2>
  <h2 class="es">El modelo en sí es simple</h2>
  <h2 class="de">Das Modell selbst ist einfach</h2>
  <h2 class="fr">Le modèle lui-même est simple</h2>
  <h2 class="pt">O modelo em si é simples</h2>
  <h2 class="tr">Modelin kendisi basit</h2>
  <h2 class="vi">Bản thân mô hình rất đơn giản</h2>
  <p class="ko">Stock-to-Flow는 원래 금이나 은 같은 귀금속의 희소성을 측정하던 지표예요. 계산법은 이렇습니다.</p>
  <p class="en">Stock-to-Flow originally measured scarcity for precious metals like gold and silver. The formula:</p>
  <p class="ja">Stock-to-Flowはもともと金や銀のような貴金属の希少性を測定していた指標です。計算方法は以下の通りです。</p>
  <p class="es">Stock-to-Flow medía originalmente la escasez de metales preciosos como el oro y la plata. La fórmula:</p>
  <p class="de">Stock-to-Flow maß ursprünglich die Knappheit von Edelmetallen wie Gold und Silber. Die Formel:</p>
  <p class="fr">Stock-to-Flow mesurait à l'origine la rareté des métaux précieux comme l'or et l'argent. La formule :</p>
  <p class="pt">O Stock-to-Flow media originalmente a escassez de metais preciosos como ouro e prata. A fórmula:</p>
  <p class="tr">Stock-to-Flow başlangıçta altın ve gümüş gibi değerli metallerin kıtlığını ölçmek için kullanılıyordu. Formül:</p>
  <p class="vi">Stock-to-Flow ban đầu được dùng để đo độ khan hiếm của các kim loại quý như vàng và bạc. Công thức:</p>
  <div class="box ko"><strong>S2F = 현재까지 채굴된 총량(Stock) ÷ 연간 신규 채굴량(Flow)</strong><br>숫자가 클수록 "이미 있는 양 대비 새로 생기는 양이 적다" = 희소하다는 뜻</div>
  <div class="box en"><strong>S2F = Total existing supply (Stock) ÷ Annual new production (Flow)</strong><br>A higher number means "less new supply relative to what already exists" — i.e., more scarce</div>
  <div class="box ja"><strong>S2F = 現在までに採掘された総量(Stock) ÷ 年間新規採掘量(Flow)</strong><br>数字が大きいほど「既存量に対して新たに生まれる量が少ない」= 希少であることを意味する</div>
  <div class="box es"><strong>S2F = Suministro total existente (Stock) ÷ Producción anual nueva (Flow)</strong><br>Un número más alto significa "menos suministro nuevo relativo al existente" — es decir, más escaso</div>
  <div class="box de"><strong>S2F = Gesamtes bestehendes Angebot (Stock) ÷ Jährliche Neuproduktion (Flow)</strong><br>Eine höhere Zahl bedeutet "weniger neues Angebot relativ zum bestehenden" — also knapper</div>
  <div class="box fr"><strong>S2F = Offre totale existante (Stock) ÷ Production annuelle nouvelle (Flow)</strong><br>Un nombre plus élevé signifie "moins de nouvelle offre par rapport à ce qui existe déjà" — c'est-à-dire plus rare</div>
  <div class="box pt"><strong>S2F = Oferta total existente (Stock) ÷ Produção anual nova (Flow)</strong><br>Um número mais alto significa "menos oferta nova em relação ao que já existe" — ou seja, mais escasso</div>
  <div class="box tr"><strong>S2F = Mevcut toplam arz (Stock) ÷ Yıllık yeni üretim (Flow)</strong><br>Daha yüksek bir sayı, "mevcut miktara göre daha az yeni arz" anlamına gelir — yani daha kıt</div>
  <div class="box vi"><strong>S2F = Tổng nguồn cung hiện có (Stock) ÷ Sản lượng mới hàng năm (Flow)</strong><br>Con số càng cao nghĩa là "nguồn cung mới càng ít so với lượng đã tồn tại" — tức là càng khan hiếm</div>
  <p class="ko">비트코인은 4년마다 반감기로 Flow(신규 발행량)가 정확히 절반이 되니까, S2F 값이 계단식으로 두 배씩 뛰어요. PlanB는 이 S2F 값과 과거 가격 데이터를 로그 스케일로 회귀분석해서, "S2F가 이만큼이면 가격은 이 정도여야 한다"는 공식을 뽑아냈습니다.</p>
  <p class="en">Bitcoin's halving cuts Flow (new issuance) exactly in half every 4 years, so S2F jumps in step-function doublings. PlanB ran a log-scale regression between this S2F value and historical price, producing a formula: "at this S2F level, price should be roughly this."</p>
  <p class="ja">ビットコインは4年ごとの半減期でFlow(新規発行量)がちょうど半分になるため、S2F値は階段状に2倍ずつ跳ね上がります。PlanBはこのS2F値と過去の価格データをログスケールで回帰分析し、「S2Fがこの値なら価格はこの程度であるべき」という公式を導き出しました。</p>
  <p class="es">El halving de Bitcoin corta Flow (nueva emisión) exactamente a la mitad cada 4 años, por lo que S2F salta en duplicaciones escalonadas. PlanB ejecutó una regresión logarítmica entre este valor S2F y el precio histórico, produciendo una fórmula: "a este nivel de S2F, el precio debería ser aproximadamente este."</p>
  <p class="de">Bitcoins Halving halbiert Flow (Neuemission) alle 4 Jahre exakt, sodass S2F in stufenweisen Verdopplungen springt. PlanB führte eine logarithmische Regression zwischen diesem S2F-Wert und dem historischen Preis durch und erstellte eine Formel: "bei diesem S2F-Niveau sollte der Preis etwa so sein."</p>
  <p class="fr">Le halving de Bitcoin réduit exactement de moitié le Flow (nouvelle émission) tous les 4 ans, ce qui fait bondir le S2F par doublements en escalier. PlanB a réalisé une régression logarithmique entre cette valeur S2F et le prix historique, produisant une formule : "à ce niveau de S2F, le prix devrait être approximativement celui-ci."</p>
  <p class="pt">O halving do Bitcoin corta o Flow (nova emissão) exatamente pela metade a cada 4 anos, fazendo o S2F saltar em duplicações escalonadas. PlanB realizou uma regressão logarítmica entre esse valor de S2F e o preço histórico, produzindo uma fórmula: "neste nível de S2F, o preço deveria ser aproximadamente este."</p>
  <p class="tr">Bitcoin'in yarılanması, Flow'u (yeni arzı) her 4 yılda bir tam olarak yarıya indirir, bu yüzden S2F basamaklı ikiye katlanmalarla sıçrar. PlanB, bu S2F değeri ile geçmiş fiyat arasında logaritmik ölçekte bir regresyon yaptı ve şu formülü ortaya çıkardı: "bu S2F seviyesinde, fiyat yaklaşık şu kadar olmalı."</p>
  <p class="vi">Việc halving của Bitcoin cắt giảm chính xác một nửa Flow (lượng phát hành mới) mỗi 4 năm, khiến S2F tăng vọt theo từng bậc nhân đôi. PlanB đã chạy một phép hồi quy theo thang log giữa giá trị S2F này và giá lịch sử, cho ra một công thức: "ở mức S2F này, giá nên vào khoảng chừng này."</p>

  <h2 class="ko">그래프로 그려보면 이렇게 생겼다</h2>
  <h2 class="en">Here's what it looks like plotted out</h2>
  <h2 class="ja">グラフに描くとこうなる</h2>
  <h2 class="es">Así es como se ve graficado</h2>
  <h2 class="de">So sieht es grafisch dargestellt aus</h2>
  <h2 class="fr">Voici à quoi cela ressemble une fois représenté graphiquement</h2>
  <h2 class="pt">Veja como isso se parece quando plotado</h2>
  <h2 class="tr">Grafiğe döküldüğünde şöyle görünüyor</h2>
  <h2 class="vi">Đây là hình dạng của nó khi được vẽ ra</h2>

  <div class="ko">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">S2F 모델 예측선 vs 실제 비트코인 가격 (로그 스케일, 개념도)</text>
    <line x1="55" y1="270" x2="670" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <line x1="55" y1="40" x2="55" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <text x="20" y="270" fill="#71717a" font-size="10">$1</text>
    <text x="10" y="160" fill="#71717a" font-size="10">$10K</text>
    <text x="10" y="50" fill="#71717a" font-size="10">$100K+</text>
    <text x="55" y="290" fill="#71717a" font-size="10">2013</text>
    <text x="250" y="290" fill="#71717a" font-size="10">2017</text>
    <text x="430" y="290" fill="#71717a" font-size="10">2021</text>
    <text x="610" y="290" fill="#71717a" font-size="10">2025</text>
    <path d="M 55 260 Q 200 230 280 160 T 430 90 T 600 55 T 660 45" fill="none" stroke="#facc15" stroke-width="2.5" stroke-dasharray="6,4"/>
    <text x="500" y="70" fill="#facc15" font-size="11" font-weight="700">S2F 예측선</text>
    <path d="M 55 265 L 130 255 L 200 150 L 240 260 L 300 240 L 360 90 L 400 230 L 460 200 L 520 60 L 560 190 L 610 130 L 660 100" fill="none" stroke="#4ade80" stroke-width="2"/>
    <text x="360" y="105" fill="#4ade80" font-size="11" font-weight="700">실제 가격</text>
  </svg>
  </div>
  <div class="en es de fr pt tr vi">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">S2F Prediction Line vs Actual Bitcoin Price (log scale, conceptual)</text>
    <line x1="55" y1="270" x2="670" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <line x1="55" y1="40" x2="55" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <text x="20" y="270" fill="#71717a" font-size="10">$1</text>
    <text x="10" y="160" fill="#71717a" font-size="10">$10K</text>
    <text x="10" y="50" fill="#71717a" font-size="10">$100K+</text>
    <text x="55" y="290" fill="#71717a" font-size="10">2013</text>
    <text x="250" y="290" fill="#71717a" font-size="10">2017</text>
    <text x="430" y="290" fill="#71717a" font-size="10">2021</text>
    <text x="610" y="290" fill="#71717a" font-size="10">2025</text>
    <path d="M 55 260 Q 200 230 280 160 T 430 90 T 600 55 T 660 45" fill="none" stroke="#facc15" stroke-width="2.5" stroke-dasharray="6,4"/>
    <text x="500" y="70" fill="#facc15" font-size="11" font-weight="700">S2F Prediction</text>
    <path d="M 55 265 L 130 255 L 200 150 L 240 260 L 300 240 L 360 90 L 400 230 L 460 200 L 520 60 L 560 190 L 610 130 L 660 100" fill="none" stroke="#4ade80" stroke-width="2"/>
    <text x="360" y="105" fill="#4ade80" font-size="11" font-weight="700">Actual Price</text>
  </svg>
  </div>
  <div class="ja">
  <svg viewBox="0 0 700 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
    <text x="20" y="28" fill="#fafafa" font-size="14" font-weight="700" font-family="sans-serif">S2Fモデル予測線 vs 実際のビットコイン価格 (ログスケール、概念図)</text>
    <line x1="55" y1="270" x2="670" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <line x1="55" y1="40" x2="55" y2="270" stroke="#3f3f46" stroke-width="1"/>
    <text x="20" y="270" fill="#71717a" font-size="10">$1</text>
    <text x="10" y="160" fill="#71717a" font-size="10">$10K</text>
    <text x="10" y="50" fill="#71717a" font-size="10">$100K+</text>
    <text x="55" y="290" fill="#71717a" font-size="10">2013</text>
    <text x="250" y="290" fill="#71717a" font-size="10">2017</text>
    <text x="430" y="290" fill="#71717a" font-size="10">2021</text>
    <text x="610" y="290" fill="#71717a" font-size="10">2025</text>
    <path d="M 55 260 Q 200 230 280 160 T 430 90 T 600 55 T 660 45" fill="none" stroke="#facc15" stroke-width="2.5" stroke-dasharray="6,4"/>
    <text x="500" y="70" fill="#facc15" font-size="11" font-weight="700">S2F予測線</text>
    <path d="M 55 265 L 130 255 L 200 150 L 240 260 L 300 240 L 360 90 L 400 230 L 460 200 L 520 60 L 560 190 L 610 130 L 660 100" fill="none" stroke="#4ade80" stroke-width="2"/>
    <text x="360" y="105" fill="#4ade80" font-size="11" font-weight="700">実際の価格</text>
  </svg>
  </div>
  <p class="ko" style="font-size:12px;color:#71717a;margin-top:-10px">※ 실제 데이터가 아닌 두 궤적의 관계를 보여주기 위한 개념도입니다.</p>
  <p class="en" style="font-size:12px;color:#71717a;margin-top:-10px">※ Conceptual illustration of the relationship, not exact historical data.</p>
  <p class="ja" style="font-size:12px;color:#71717a;margin-top:-10px">※ 実際のデータではなく、2つの軌跡の関係を示すための概念図です。</p>

  <p class="ko">2019~2020년까지는 실제 가격이 이 예측선 근처에서 등락했어요. 그래서 신봉자가 폭발적으로 늘었습니다. "S2F가 곧 신의 계시"라는 농담까지 나올 정도였죠.</p>
  <p class="en">Through 2019-2020, actual price oscillated close to that predicted line. Believers multiplied fast — there were even jokes that "S2F is basically gospel."</p>
  <p class="ja">2019〜2020年までは実際の価格がこの予測線付近で上下していました。そのため信奉者が爆発的に増えました。「S2Fはもはや神の啓示だ」という冗談まで出るほどでした。</p>
  <p class="es">Hasta 2019-2020, el precio real oscilaba cerca de esa línea predicha. Los creyentes se multiplicaron rápido — incluso hubo bromas de que "S2F es básicamente el evangelio."</p>
  <p class="de">Bis 2019-2020 schwankte der tatsächliche Preis nahe dieser vorhergesagten Linie. Die Gläubigen vermehrten sich schnell — es gab sogar Witze, dass "S2F im Grunde das Evangelium ist."</p>
  <p class="fr">Entre 2019 et 2020, le prix réel a oscillé près de cette ligne prédite. Les adeptes se sont multipliés rapidement — il y avait même des blagues disant que "le S2F est pratiquement un évangile."</p>
  <p class="pt">Ao longo de 2019-2020, o preço real oscilou perto dessa linha prevista. Os crentes se multiplicaram rapidamente — havia até piadas de que "o S2F é basicamente um evangelho."</p>
  <p class="tr">2019-2020 boyunca, gerçek fiyat bu tahmin çizgisine yakın bir seyir izledi. İnananların sayısı hızla arttı — hatta "S2F neredeyse bir kutsal metin" diye şakalar bile yapılıyordu.</p>
  <p class="vi">Trong suốt 2019-2020, giá thực tế dao động sát đường dự đoán đó. Số người tin theo tăng nhanh chóng — thậm chí còn có những câu đùa rằng "S2F về cơ bản là phúc âm."</p>

  <h2 class="ko">그리고 2021년, 선을 완전히 이탈했다</h2>
  <h2 class="en">Then, in 2021, it went completely off the rails</h2>
  <h2 class="ja">そして2021年、線から完全に外れた</h2>
  <h2 class="es">Luego, en 2021, se descarriló por completo</h2>
  <h2 class="de">Dann, 2021, entgleiste es komplett</h2>
  <h2 class="fr">Puis, en 2021, tout a complètement déraillé</h2>
  <h2 class="pt">Depois, em 2021, tudo saiu completamente dos trilhos</h2>
  <h2 class="tr">Sonra 2021'de tamamen raydan çıktı</h2>
  <h2 class="vi">Rồi đến năm 2021, mọi thứ hoàn toàn trật bánh</h2>
  <p class="ko">2021년 하반기부터 실제 가격이 S2F 예측선에서 계속 아래로 벌어지기 시작했어요. 2024~2025년 상승장에서도 실제 가격은 모델이 예상했던 궤적을 한참 밑돌았습니다. PlanB가 원래 제시했던 2021년 목표가($288,000)는 결국 달성되지 못했고요.</p>
  <p class="en">From late 2021, actual price kept diverging further below the S2F prediction line. Even through the 2024-2025 bull run, actual price stayed well under the model's projected path. PlanB's original 2021 price target ($288,000) never materialized.</p>
  <p class="ja">2021年後半から、実際の価格はS2F予測線から下方に乖離し続けました。2024〜2025年の上昇相場でも、実際の価格はモデルが予想していた軌道をかなり下回りました。PlanBが元々提示していた2021年の目標価格($288,000)は結局達成されませんでした。</p>
  <p class="es">Desde finales de 2021, el precio real siguió divergiendo cada vez más por debajo de la línea de predicción S2F. Incluso durante el mercado alcista de 2024-2025, el precio real se mantuvo muy por debajo de la trayectoria proyectada por el modelo. El objetivo de precio original de PlanB para 2021 ($288,000) nunca se materializó.</p>
  <p class="de">Ab Ende 2021 wich der tatsächliche Preis weiterhin zunehmend unter die S2F-Vorhersagelinie ab. Selbst während der Bullenrally 2024-2025 blieb der tatsächliche Preis weit unter dem vom Modell projizierten Pfad. PlanBs ursprüngliches Preisziel für 2021 ($288.000) wurde nie erreicht.</p>
  <p class="fr">À partir de fin 2021, le prix réel n'a cessé de s'écarter de plus en plus en dessous de la ligne de prédiction S2F. Même pendant le marché haussier de 2024-2025, le prix réel est resté largement inférieur à la trajectoire projetée par le modèle. L'objectif de prix initial de PlanB pour 2021 (288 000 $) ne s'est jamais concrétisé.</p>
  <p class="pt">A partir do final de 2021, o preço real continuou a divergir cada vez mais abaixo da linha de previsão do S2F. Mesmo durante o mercado em alta de 2024-2025, o preço real permaneceu bem abaixo da trajetória projetada pelo modelo. A meta de preço original de PlanB para 2021 (US$ 288.000) nunca se concretizou.</p>
  <p class="tr">2021'in sonlarından itibaren, gerçek fiyat S2F tahmin çizgisinin giderek daha da altına sapmaya devam etti. 2024-2025 boğa piyasası boyunca bile gerçek fiyat, modelin öngördüğü yörüngenin oldukça altında kaldı. PlanB'nin 2021 için belirlediği orijinal fiyat hedefi (288.000 $) hiçbir zaman gerçekleşmedi.</p>
  <p class="vi">Từ cuối năm 2021, giá thực tế tiếp tục lệch ngày càng xa xuống dưới đường dự đoán của S2F. Ngay cả trong đợt tăng giá 2024-2025, giá thực tế vẫn ở mức thấp hơn nhiều so với quỹ đạo mà mô hình dự báo. Mục tiêu giá ban đầu của PlanB cho năm 2021 (288.000 đô la) chưa bao giờ trở thành hiện thực.</p>

  <h2 class="ko">왜 틀렸을까 — 비판의 핵심</h2>
  <h2 class="en">Why it broke — the core criticism</h2>
  <h2 class="ja">なぜ外れたのか — 批判の核心</h2>
  <h2 class="es">Por qué se rompió — la crítica central</h2>
  <h2 class="de">Warum es scheiterte — die Kernkritik</h2>
  <h2 class="fr">Pourquoi ça a échoué — la critique centrale</h2>
  <h2 class="pt">Por que falhou — a crítica central</h2>
  <h2 class="tr">Neden başarısız oldu — temel eleştiri</h2>
  <h2 class="vi">Vì sao nó thất bại — lời chỉ trích cốt lõi</h2>
  <p class="ko">가장 널리 인용되는 반박은 계량경제학자 Nicholas Vardy와 여러 정량 분석가들이 지적한 <strong>"허위 회귀(spurious regression)"</strong> 문제예요. 두 개의 시계열 데이터가 둘 다 시간이 지나며 우상향하기만 하면, 실제 인과관계가 전혀 없어도 통계적으로는 강한 상관관계가 나올 수 있습니다. 비트코인 가격도 우상향, S2F도 반감기마다 계단식으로 우상향 — 이 둘을 겹쳐 놓으면 상관계수가 높게 나오는 게 당연하다는 지적이었어요.</p>
  <p class="en">The most widely cited rebuttal is the <strong>"spurious regression"</strong> problem, raised by econometrician-style critics and various quant analysts. When two time series both simply trend upward over time, they can show a strong statistical correlation even with zero real causal relationship. Bitcoin price trends up; S2F also steps up with each halving — overlay the two, and a high correlation coefficient is almost guaranteed regardless of whether one actually drives the other.</p>
  <p class="ja">最も広く引用される反論は、計量経済学者Nicholas Vardyや複数の定量分析家が指摘した<strong>「見せかけの回帰(spurious regression)」</strong>の問題です。2つの時系列データが両方とも時間とともに右肩上がりであるだけで、実際の因果関係がまったくなくても統計的には強い相関関係が出ることがあります。ビットコイン価格も右肩上がり、S2Fも半減期ごとに階段状に右肩上がり — この2つを重ねれば相関係数が高く出るのは当然だという指摘でした。</p>
  <p class="es">La refutación más citada es el problema de <strong>"regresión espuria"</strong>, planteado por críticos econométricos y varios analistas cuantitativos. Cuando dos series temporales simplemente tienden al alza con el tiempo, pueden mostrar una fuerte correlación estadística incluso sin relación causal real. El precio de Bitcoin tiende al alza; S2F también sube en cada halving — superpón ambos, y una alta correlación es casi garantizada independientemente de si uno realmente impulsa al otro.</p>
  <p class="de">Die am häufigsten zitierte Widerlegung ist das Problem der <strong>"Scheinregression"</strong>, das von ökonometrischen Kritikern und verschiedenen Quant-Analysten aufgeworfen wurde. Wenn zwei Zeitreihen einfach beide im Laufe der Zeit ansteigen, können sie eine starke statistische Korrelation zeigen, selbst ohne echte kausale Beziehung. Der Bitcoin-Preis steigt; S2F steigt ebenfalls mit jedem Halving — überlagert man beide, ist eine hohe Korrelation fast garantiert, unabhängig davon, ob eines das andere tatsächlich antreibt.</p>
  <p class="fr">La réfutation la plus citée est le problème de la <strong>"régression fallacieuse"</strong>, soulevé par des critiques de type économétrique et divers analystes quantitatifs. Lorsque deux séries temporelles se contentent toutes deux de suivre une tendance haussière dans le temps, elles peuvent afficher une forte corrélation statistique même en l'absence de tout lien de causalité réel. Le prix du Bitcoin suit une tendance haussière ; le S2F augmente lui aussi par paliers à chaque halving — en superposant les deux, un coefficient de corrélation élevé est presque garanti, que l'un influence réellement l'autre ou non.</p>
  <p class="pt">A refutação mais citada é o problema da <strong>"regressão espúria"</strong>, levantado por críticos de estilo econométrico e vários analistas quantitativos. Quando duas séries temporais simplesmente tendem para cima ao longo do tempo, elas podem mostrar uma forte correlação estatística mesmo sem nenhuma relação causal real. O preço do Bitcoin tende para cima; o S2F também sobe em degraus a cada halving — sobrepondo os dois, um alto coeficiente de correlação é quase garantido, independentemente de um realmente impulsionar o outro.</p>
  <p class="tr">En sık dile getirilen itiraz, ekonometri odaklı eleştirmenler ve çeşitli kantitatif analistler tarafından öne sürülen <strong>"sahte regresyon (spurious regression)"</strong> sorunudur. İki zaman serisi zaman içinde sadece yukarı yönlü bir eğilim gösterdiğinde, aralarında gerçek bir nedensellik ilişkisi olmasa bile güçlü bir istatistiksel korelasyon ortaya çıkabilir. Bitcoin fiyatı yükseliş eğiliminde; S2F de her yarılanmada basamak basamak yükseliyor — ikisini üst üste koyduğunuzda, biri diğerini gerçekten yönlendirsin ya da yönlendirmesin, yüksek bir korelasyon katsayısı neredeyse garantidir.</p>
  <p class="vi">Lời phản bác được trích dẫn nhiều nhất là vấn đề <strong>"hồi quy giả (spurious regression)"</strong>, được nêu ra bởi các nhà phê bình theo hướng kinh tế lượng và nhiều nhà phân tích định lượng khác nhau. Khi hai chuỗi thời gian đơn thuần đều có xu hướng tăng theo thời gian, chúng có thể cho thấy mối tương quan thống kê mạnh dù không hề có quan hệ nhân quả thực sự. Giá Bitcoin có xu hướng tăng; S2F cũng tăng theo từng bậc ở mỗi lần halving — chồng hai đường này lên nhau, một hệ số tương quan cao gần như chắc chắn xuất hiện, bất kể một yếu tố có thực sự chi phối yếu tố kia hay không.</p>
  <p class="ko">또 다른 비판은 공급 측면만 본다는 점이에요. S2F는 "얼마나 새로 생기는가"만 계산하지, "얼마나 사려는 수요가 있는가"는 전혀 반영하지 않습니다. 매크로 환경, 규제, 기관 참여 같은 수요 측 변수가 실제 가격을 흔드는데, 이 모델은 그걸 구조적으로 볼 수 없는 거죠.</p>
  <p class="en">Another critique: it's purely supply-side. S2F only measures "how much new supply appears" — it says nothing about "how much demand exists to buy it." Macro conditions, regulation, institutional participation all move actual price, and the model is structurally blind to every one of them.</p>
  <p class="ja">別の批判は、供給側だけを見ている点です。S2Fは「どれだけ新しく生まれるか」だけを計算し、「どれだけ買いたい需要があるか」はまったく反映しません。マクロ環境、規制、機関投資家の参加といった需要側の変数が実際の価格を動かしますが、このモデルはそれを構造的に見ることができないのです。</p>
  <p class="es">Otra crítica: es puramente del lado de la oferta. S2F solo mide "cuánto nuevo suministro aparece" — no dice nada sobre "cuánta demanda existe para comprarlo." Las condiciones macro, la regulación, la participación institucional mueven el precio real, y el modelo es estructuralmente ciego a todas ellas.</p>
  <p class="de">Eine weitere Kritik: Es ist rein angebotsseitig. S2F misst nur, "wie viel neues Angebot erscheint" — es sagt nichts darüber aus, "wie viel Nachfrage besteht, um es zu kaufen." Makrobedingungen, Regulierung, institutionelle Beteiligung bewegen alle den tatsächlichen Preis, und das Modell ist strukturell blind für jede einzelne davon.</p>
  <p class="fr">Autre critique : il est purement du côté de l'offre. Le S2F mesure uniquement "combien de nouvelle offre apparaît" — il ne dit rien sur "combien de demande existe pour l'acheter." Les conditions macroéconomiques, la réglementation, la participation institutionnelle font toutes bouger le prix réel, et le modèle est structurellement aveugle à chacune d'entre elles.</p>
  <p class="pt">Outra crítica: é puramente do lado da oferta. O S2F mede apenas "quanta nova oferta surge" — não diz nada sobre "quanta demanda existe para comprá-la." Condições macroeconômicas, regulação, participação institucional movem o preço real, e o modelo é estruturalmente cego a todas elas.</p>
  <p class="tr">Bir başka eleştiri de şu: model tamamen arz odaklıdır. S2F yalnızca "ne kadar yeni arz ortaya çıktığını" ölçer — "onu satın alacak ne kadar talep olduğu" konusunda hiçbir şey söylemez. Makro koşullar, düzenlemeler, kurumsal katılım gerçek fiyatı hareket ettirir, ancak model bunların hiçbirini yapısal olarak göremez.</p>
  <p class="vi">Một chỉ trích khác: mô hình này thuần túy chỉ nhìn từ phía cung. S2F chỉ đo lường "bao nhiêu nguồn cung mới xuất hiện" — nó không nói gì về "có bao nhiêu nhu cầu mua." Các điều kiện vĩ mô, quy định pháp lý, sự tham gia của tổ chức đều tác động đến giá thực tế, và mô hình này về mặt cấu trúc hoàn toàn mù trước tất cả những yếu tố đó.</p>

  <h2 class="ko">그럼 완전히 버려야 하나</h2>
  <h2 class="en">So should it be thrown out entirely?</h2>
  <h2 class="ja">では完全に捨てるべきか</h2>
  <h2 class="es">¿Entonces debería descartarse por completo?</h2>
  <h2 class="de">Sollte es also ganz verworfen werden?</h2>
  <h2 class="fr">Faut-il alors le rejeter entièrement ?</h2>
  <h2 class="pt">Então deve ser totalmente descartado?</h2>
  <h2 class="tr">Peki tamamen çöpe mi atılmalı?</h2>
  <h2 class="vi">Vậy có nên loại bỏ hoàn toàn mô hình này không?</h2>
  <p class="ko">저는 "정확한 가격 예측 도구"로는 폐기하되, "반감기가 공급에 미치는 구조적 영향을 시각화하는 도구"로는 여전히 쓸모 있다고 봐요. <a href="/blog/bitcoin-halving-timing.html">반감기 사이클 가이드</a>에서 다뤘듯, 공급 충격 자체는 실재하는 현상입니다. 다만 그 공급 충격이 "정확히 얼마의 가격"으로 이어지는지는 수요 측 변수 없이는 절대 알 수 없다는 게, S2F가 우리에게 남긴 진짜 교훈이에요.</p>
  <p class="en">I'd retire it as a "precise price prediction tool" while keeping it as a "visualization of the halving's structural supply impact." As covered in the <a href="/blog/bitcoin-halving-timing.html">halving cycle guide</a>, the supply shock itself is real. What S2F actually taught us is that translating that supply shock into "exactly this price" is simply impossible without accounting for demand-side variables — no formula gets around that.</p>
  <p class="ja">私は「正確な価格予測ツール」としては廃棄すべきだが、「半減期が供給に与える構造的影響を可視化するツール」としては依然として有用だと考えます。<a href="/blog/bitcoin-halving-timing.html">半減期サイクルガイド</a>で扱った通り、供給ショック自体は実在する現象です。ただ、その供給ショックが「正確にいくらの価格」につながるかは需要側の変数なしには絶対に分からないというのが、S2Fが私たちに残した本当の教訓です。</p>
  <p class="es">Yo lo retiraría como "herramienta de predicción precisa de precios" mientras lo mantengo como "visualización del impacto estructural del halving en la oferta." Como se cubrió en la <a href="/blog/bitcoin-halving-timing.html">guía del ciclo de halving</a>, el shock de oferta en sí es real. Lo que S2F realmente nos enseñó es que traducir ese shock de oferta en "exactamente este precio" es simplemente imposible sin tener en cuenta las variables del lado de la demanda — ninguna fórmula puede evitarlo.</p>
  <p class="de">Ich würde es als "präzises Preisvorhersagewerkzeug" ausrangieren, aber als "Visualisierung der strukturellen Angebotsauswirkung des Halvings" beibehalten. Wie in der <a href="/blog/bitcoin-halving-timing.html">Halving-Zyklus-Anleitung</a> behandelt, ist der Angebotsschock selbst real. Was S2F uns tatsächlich lehrte, ist, dass die Übersetzung dieses Angebotsschocks in "genau diesen Preis" ohne Berücksichtigung der Nachfrageseite schlicht unmöglich ist — keine Formel kommt daran vorbei.</p>
  <p class="fr">Je le mettrais à la retraite en tant qu'"outil de prédiction précise du prix", tout en le conservant comme "visualisation de l'impact structurel du halving sur l'offre." Comme évoqué dans le <a href="/blog/bitcoin-halving-timing.html">guide du cycle de halving</a>, le choc d'offre lui-même est bien réel. Ce que le S2F nous a réellement appris, c'est que traduire ce choc d'offre en "exactement ce prix" est tout simplement impossible sans tenir compte des variables du côté de la demande — aucune formule n'y échappe.</p>
  <p class="pt">Eu o aposentaria como "ferramenta de previsão precisa de preço", mantendo-o como "visualização do impacto estrutural do halving sobre a oferta." Como abordado no <a href="/blog/bitcoin-halving-timing.html">guia do ciclo de halving</a>, o choque de oferta em si é real. O que o S2F realmente nos ensinou é que traduzir esse choque de oferta em "exatamente este preço" é simplesmente impossível sem levar em conta as variáveis do lado da demanda — nenhuma fórmula escapa disso.</p>
  <p class="tr">"Kesin fiyat tahmin aracı" olarak onu emekliye ayırır, ancak "yarılanmanın arz üzerindeki yapısal etkisini görselleştiren bir araç" olarak elde tutardım. <a href="/blog/bitcoin-halving-timing.html">Yarılanma döngüsü rehberinde</a> ele alındığı gibi, arz şoku gerçek bir olgudur. S2F'nin bize asıl öğrettiği şey, bu arz şokunu "tam olarak şu fiyat"a dönüştürmenin, talep tarafındaki değişkenler hesaba katılmadan basitçe mümkün olmadığıdır — hiçbir formül bunun önüne geçemez.</p>
  <p class="vi">Tôi sẽ gác lại nó như một "công cụ dự đoán giá chính xác", nhưng vẫn giữ nó lại như một "công cụ trực quan hóa tác động cấu trúc của halving lên nguồn cung." Như đã đề cập trong <a href="/blog/bitcoin-halving-timing.html">hướng dẫn về chu kỳ halving</a>, cú sốc nguồn cung tự nó là có thật. Điều mà S2F thực sự dạy chúng ta là việc chuyển cú sốc nguồn cung đó thành "chính xác mức giá này" đơn giản là bất khả thi nếu không tính đến các biến số phía cầu — không công thức nào có thể tránh được điều đó.</p>
<?php require __DIR__.'/_footer.php'; ?>
