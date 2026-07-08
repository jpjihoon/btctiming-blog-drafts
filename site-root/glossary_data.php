<?php
// BTCtiming.com 용어사전 데이터 (대시보드 lang.js에서 추출·정리)
// 각 지표: slug => [category, name[9], desc[9]]
// desc 안의 \n(리터럴)은 구간 설명 줄바꿈 → 템플릿에서 목록으로 렌더
return [
  'mvrv-z' => [
    'category' => 'onchain',
    'name' => [
      'ko' => 'MVRV Z 스코어',
      'en' => 'MVRV Z Score',
      'ja' => 'MVRV Zスコア',
      'es' => 'Puntuación Z MVRV',
      'de' => 'MVRV Z-Score',
      'fr' => 'Score Z MVRV',
      'pt' => 'Pontuação Z MVRV',
      'tr' => 'MVRV Z Puanı',
      'vi' => 'Điểm Z MVRV',
    ],
    'desc' => [
      'ko' => 'MVRV Z Score는 비트코인이 실현 가치 대비 얼마나 고평가/저평가됐는지 측정합니다.\\n• 0 이하: 역사적 저평가 (저점 구간) → 강력 매수\\n• 0~1: 약간 저평가 → 축적 구간\\n• 1~3: 적정 가치 → 중립\\n• 3 이상: 고평가 (고점 구간) → 매도 고려',
      'en' => 'MVRV Z Score measures how overvalued or undervalued Bitcoin is relative to its realized value. \\n• < 0: Historically undervalued (bottom zone) → Strong buy\\n• 0~1: Slightly undervalued → Accumulation zone  \\n• 1~3: Fair value → Neutral\\n• > 3: Overvalued (top zone) → Consider selling',
      'ja' => 'MVRV Zスコアは、ビットコインが実現価値に対してどれだけ割高・割安かを測定します。\\n• 0以下: 歴史的に割安(底値圏) → 強力な買いシグナル\\n• 0~1: やや割安 → 蓄積ゾーン\\n• 1~3: 適正価値 → 中立\\n• 3以上: 割高(天井圏) → 売却検討',
      'es' => 'La Puntuación Z MVRV mide cuán sobrevalorado o infravalorado está Bitcoin en relación a su valor realizado. \\n• < 0: Históricamente infravalorado (zona de suelo) → Compra fuerte\\n• 0~1: Ligeramente infravalorado → Zona de acumulación  \\n• 1~3: Valor justo → Neutral\\n• > 3: Sobrevalorado (zona de techo) → Considerar venta',
      'de' => 'Der MVRV Z-Score misst, wie über- oder unterbewertet Bitcoin relativ zu seinem Realized Value ist. \\n• < 0: Historisch unterbewertet (Tiefzone) → Starker Kauf\\n• 0~1: Leicht unterbewertet → Akkumulationszone  \\n• 1~3: Fairer Wert → Neutral\\n• > 3: Überbewertet (Hochzone) → Verkauf erwägen',
      'fr' => 'Le Score Z MVRV mesure à quel point le Bitcoin est survalorisé ou sous-valorisé par rapport à sa valeur réalisée. \\n• < 0 : Sous-valorisé historiquement (zone de creux) → Achat fort\\n• 0~1 : Légèrement sous-valorisé → Zone d\'accumulation  \\n• 1~3 : Juste valeur → Neutre\\n• > 3 : Survalorisé (zone de sommet) → Envisager la vente',
      'pt' => 'A Pontuação Z MVRV mede o quão sobrevalorizado ou subvalorizado o Bitcoin está em relação ao seu valor realizado. \\n• < 0: Historicamente subvalorizado (zona de fundo) → Compra forte\\n• 0~1: Ligeiramente subvalorizado → Zona de acumulação  \\n• 1~3: Valor justo → Neutro\\n• > 3: Sobrevalorizado (zona de topo) → Considerar venda',
      'tr' => 'MVRV Z Puanı, Bitcoin\\u2019in gerçekleşen değerine göre ne kadar aşırı veya düşük değerli olduğunu ölçer. \\n• < 0: Tarihsel olarak düşük değerli (dip bölgesi) → Güçlü alım\\n• 0~1: Hafif düşük değerli → Biriktirme bölgesi  \\n• 1~3: Adil değer → Nötr\\n• > 3: Aşırı değerli (tepe bölgesi) → Satışı düşün',
      'vi' => 'Điểm Z MVRV đo mức Bitcoin bị định giá cao hay thấp so với giá trị thực hiện của nó. \\n• < 0: Định giá thấp về mặt lịch sử (vùng đáy) → Mua mạnh\\n• 0~1: Định giá hơi thấp → Vùng tích lũy  \\n• 1~3: Giá trị hợp lý → Trung lập\\n• > 3: Định giá cao (vùng đỉnh) → Cân nhắc bán',
    ],
  ],
  'nupl' => [
    'category' => 'onchain',
    'name' => [
      'ko' => 'NUPL',
      'en' => 'NUPL',
      'ja' => 'NUPL',
      'es' => 'NUPL',
      'de' => 'NUPL',
      'fr' => 'NUPL',
      'pt' => 'NUPL',
      'tr' => 'NUPL',
      'vi' => 'NUPL',
    ],
    'desc' => [
      'ko' => 'NUPL(미실현 순손익)은 전체 BTC 보유자들의 평균 손익 상태를 보여줍니다.\\n• 0% 이하 (항복): 보유자 손실 → 극단 매수 신호\\n• 0~25% (희망/공포): 저점 회복 중 → 매수 구간\\n• 25~50% (낙관): 사이클 중반 → 중립\\n• 50~75% (탐욕): 후기 사이클 → 주시\\n• 75% 이상 (도취): 극단 탐욕 → 매도 신호',
      'en' => 'NUPL (Net Unrealized Profit/Loss) shows the overall profit/loss state of all BTC holders.\\n• < 0% (Capitulation): Holders in loss → Extreme buy signal\\n• 0~25% (Hope/Fear): Recovering from bottom → Buy zone  \\n• 25~50% (Optimism): Mid-cycle → Neutral\\n• 50~75% (Belief/Greed): Late cycle → Watch\\n• > 75% (Euphoria): Peak greed → Sell signal',
      'ja' => 'NUPL(未実現純損益)は、全BTC保有者の平均損益状況を示します。\\n• 0%以下(キャピチュレーション): 保有者が損失中 → 極端な買いシグナル\\n• 0~25%(希望・恐怖): 底値から回復中 → 買いゾーン\\n• 25~50%(楽観): サイクル中盤 → 中立\\n• 50~75%(強欲): サイクル後半 → 注視\\n• 75%以上(陶酔): 極端な強欲 → 売りシグナル',
      'es' => 'NUPL (Ganancia/Pérdida Neta No Realizada) muestra el estado general de ganancia/pérdida de todos los tenedores de BTC.\\n• < 0% (Capitulación): Tenedores en pérdida → Señal de compra extrema\\n• 0~25% (Esperanza/Miedo): Recuperándose del suelo → Zona de compra  \\n• 25~50% (Optimismo): Medio del ciclo → Neutral\\n• 50~75% (Creencia/Codicia): Final del ciclo → Vigilar\\n• > 75% (Euforia): Codicia máxima → Señal de venta',
      'de' => 'NUPL (Net Unrealized Profit/Loss) zeigt den Gesamtgewinn-/-verluststatus aller BTC-Halter.\\n• < 0% (Kapitulation): Halter in Verlust → Extremes Kaufsignal\\n• 0~25% (Hoffnung/Angst): Erholung vom Tief → Kaufzone  \\n• 25~50% (Optimismus): Zyklusmitte → Neutral\\n• 50~75% (Glaube/Gier): Spätzyklus → Beobachten\\n• > 75% (Euphorie): Gier-Höhepunkt → Verkaufssignal',
      'fr' => 'Le NUPL (Profit/Perte Net Non Réalisé) montre l\'état global de profit/perte de tous les détenteurs de BTC.\\n• < 0% (Capitulation) : Détenteurs en perte → Signal d\'achat extrême\\n• 0~25% (Espoir/Peur) : Reprise depuis le creux → Zone d\'achat  \\n• 25~50% (Optimisme) : Milieu de cycle → Neutre\\n• 50~75% (Croyance/Avidité) : Fin de cycle → Surveiller\\n• > 75% (Euphorie) : Avidité maximale → Signal de vente',
      'pt' => 'NUPL (Lucro/Prejuízo Líquido Não Realizado) mostra o estado geral de lucro/prejuízo de todos os detentores de BTC.\\n• < 0% (Capitulação): Detentores no prejuízo → Sinal de compra extrema\\n• 0~25% (Esperança/Medo): Recuperando do fundo → Zona de compra  \\n• 25~50% (Otimismo): Meio do ciclo → Neutro\\n• 50~75% (Crença/Ganância): Fim do ciclo → Vigiar\\n• > 75% (Euforia): Ganância máxima → Sinal de venda',
      'tr' => 'NUPL (Net Gerçekleşmemiş Kar/Zarar) tüm BTC sahiplerinin genel kar/zarar durumunu gösterir.\\n• < 0% (Kapitülasyon): Sahipler zararda → Aşırı alım sinyali\\n• 0~25% (Umut/Korku): Dipten toparlanma → Alım bölgesi  \\n• 25~50% (İyimserlik): Döngü ortası → Nötr\\n• 50~75% (İnanç/Açgözlülük): Döngü sonu → İzle\\n• > 75% (Öfori): Maksimum açgözlülük → Satış sinyali',
      'vi' => 'NUPL (Lãi/Lỗ Ròng Chưa thực hiện) cho thấy trạng thái lãi/lỗ tổng thể của tất cả người nắm giữ BTC.\\n• < 0% (Đầu hàng): Người nắm giữ đang lỗ → Tín hiệu mua cực mạnh\\n• 0~25% (Hy vọng/Sợ hãi): Hồi phục từ đáy → Vùng mua  \\n• 25~50% (Lạc quan): Giữa chu kỳ → Trung lập\\n• 50~75% (Tin tưởng/Tham lam): Cuối chu kỳ → Theo dõi\\n• > 75% (Hưng phấn): Tham lam tối đa → Tín hiệu bán',
    ],
  ],
  'realized-price' => [
    'category' => 'onchain',
    'name' => [
      'ko' => '실현가 이격률',
      'en' => 'Realized Price Gap',
      'ja' => '実現価格乖離率',
      'es' => 'Brecha del Precio Realizado',
      'de' => 'Realized-Price-Abstand',
      'fr' => 'Écart de Prix Réalisé',
      'pt' => 'Diferença do Preço Realizado',
      'tr' => 'Gerçekleşen Fiyat Farkı',
      'vi' => 'Chênh lệch Giá Thực hiện',
    ],
    'desc' => [
      'ko' => '현재 가격이 전체 BTC 보유자의 평균 취득 원가(실현가) 대비 얼마나 떨어져 있는지 보여줍니다.\\n• 0% 이하: 평균 원가 이하 → 패닉 구간, 최강 매수\\n• 0~5%: 실현가 근처 → 이상적 진입\\n• 5~20%: 적당한 프리미엄 → 수용 가능\\n• 20% 이상: 높은 프리미엄 → 주의',
      'en' => 'Shows how far the current price is from the average cost basis of all BTC holders (Realized Price).\\n• Below 0%: Price below average cost → Panic zone, strongest buy\\n• 0~5%: Near realized price → Ideal entry\\n• 5~20%: Moderate premium → Acceptable\\n• > 20%: High premium → Caution',
      'ja' => '現在価格が全BTC保有者の平均取得原価(実現価格)からどれだけ乖離しているかを示します。\\n• 0%以下: 平均原価以下 → パニックゾーン、最強の買い\\n• 0~5%: 実現価格付近 → 理想的なエントリー\\n• 5~20%: 適度なプレミアム → 許容範囲\\n• 20%以上: 高いプレミアム → 注意',
      'es' => 'Muestra cuán lejos está el precio actual de la base de costo promedio de todos los tenedores de BTC (Precio Realizado).\\n• Por debajo de 0%: Precio bajo el costo promedio → Zona de pánico, compra más fuerte\\n• 0~5%: Cerca del precio realizado → Entrada ideal\\n• 5~20%: Prima moderada → Aceptable\\n• > 20%: Prima alta → Precaución',
      'de' => 'Zeigt, wie weit der aktuelle Preis von der durchschnittlichen Kostenbasis aller BTC-Halter (Realized Price) entfernt ist.\\n• Unter 0%: Preis unter Durchschnittskosten → Panikzone, stärkster Kauf\\n• 0~5%: Nahe Realized Price → Idealer Einstieg\\n• 5~20%: Moderate Prämie → Akzeptabel\\n• > 20%: Hohe Prämie → Vorsicht',
      'fr' => 'Montre à quelle distance le prix actuel se situe du coût moyen de tous les détenteurs de BTC (Prix Réalisé).\\n• Sous 0% : Prix sous le coût moyen → Zone de panique, achat le plus fort\\n• 0~5% : Proche du prix réalisé → Entrée idéale\\n• 5~20% : Prime modérée → Acceptable\\n• > 20% : Prime élevée → Prudence',
      'pt' => 'Mostra o quão longe o preço atual está da base de custo médio de todos os detentores de BTC (Preço Realizado).\\n• Abaixo de 0%: Preço abaixo do custo médio → Zona de pânico, compra mais forte\\n• 0~5%: Perto do preço realizado → Entrada ideal\\n• 5~20%: Prêmio moderado → Aceitável\\n• > 20%: Prêmio alto → Cautela',
      'tr' => 'Mevcut fiyatın tüm BTC sahiplerinin ortalama maliyet tabanından (Gerçekleşen Fiyat) ne kadar uzak olduğunu gösterir.\\n• 0% altında: Fiyat ortalama maliyetin altında → Panik bölgesi, en güçlü alım\\n• 0~5%: Gerçekleşen fiyata yakın → İdeal giriş\\n• 5~20%: Orta prim → Kabul edilebilir\\n• > 20%: Yüksek prim → Dikkat',
      'vi' => 'Cho thấy giá hiện tại cách bao xa so với giá vốn trung bình của tất cả người nắm giữ BTC (Giá Thực hiện).\\n• Dưới 0%: Giá dưới giá vốn trung bình → Vùng hoảng loạn, mua mạnh nhất\\n• 0~5%: Gần giá thực hiện → Điểm vào lý tưởng\\n• 5~20%: Phần bù vừa phải → Chấp nhận được\\n• > 20%: Phần bù cao → Thận trọng',
    ],
  ],
  'sth-sopr' => [
    'category' => 'onchain',
    'name' => [
      'ko' => 'STH-SOPR',
      'en' => 'STH-SOPR',
      'ja' => 'STH-SOPR',
      'es' => 'STH-SOPR',
      'de' => 'STH-SOPR',
      'fr' => 'STH-SOPR',
      'pt' => 'STH-SOPR',
      'tr' => 'STH-SOPR',
      'vi' => 'STH-SOPR',
    ],
    'desc' => [
      'ko' => '단기 보유자 SOPR — 최근 매수자들이 수익인지 손실인지로 매도하는지 측정합니다.\\n• 0.95 이하: 패닉 손절 → 캐피튤레이션 = 매수 신호\\n• 0.95~1.0: 소폭 손실 실현 → 저점 근처\\n• 1.0~1.03: 소폭 수익 실현 → 중립\\n• 1.05 이상: 강한 수익 실현 → 분산 = 고점 신호',
      'en' => 'Short-Term Holder SOPR measures if recent buyers are selling at profit or loss.\\n• < 0.95: Panic selling at heavy losses → Capitulation = buy signal\\n• 0.95~1.0: Mild loss realization → Near bottom\\n• 1.0~1.03: Neutral profit taking\\n• > 1.05: Strong profit taking → Distribution = top signal',
      'ja' => '短期保有者SOPR — 直近の買い手が利益確定・損切りのどちらで売っているかを測定します。\\n• 0.95以下: パニック損切り → キャピチュレーション = 買いシグナル\\n• 0.95~1.0: 小幅な損失確定 → 底値付近\\n• 1.0~1.03: 小幅な利益確定 → 中立\\n• 1.05以上: 強い利益確定 → 分配 = 天井シグナル',
      'es' => 'El SOPR de Tenedores a Corto Plazo mide si los compradores recientes están vendiendo con ganancia o pérdida.\\n• < 0.95: Venta de pánico con pérdidas fuertes → Capitulación = señal de compra\\n• 0.95~1.0: Realización leve de pérdidas → Cerca del suelo\\n• 1.0~1.03: Toma de ganancias neutral\\n• > 1.05: Toma de ganancias fuerte → Distribución = señal de techo',
      'de' => 'Der Short-Term-Holder-SOPR misst, ob jüngste Käufer mit Gewinn oder Verlust verkaufen.\\n• < 0,95: Panikverkauf mit hohen Verlusten → Kapitulation = Kaufsignal\\n• 0,95~1,0: Leichte Verlustrealisierung → Nahe am Tief\\n• 1,0~1,03: Neutrale Gewinnmitnahme\\n• > 1,05: Starke Gewinnmitnahme → Distribution = Hochsignal',
      'fr' => 'Le SOPR des Détenteurs à Court Terme mesure si les acheteurs récents vendent à profit ou à perte.\\n• < 0,95 : Vente panique à forte perte → Capitulation = signal d\'achat\\n• 0,95~1,0 : Légère prise de perte → Proche du creux\\n• 1,0~1,03 : Prise de bénéfices neutre\\n• > 1,05 : Forte prise de bénéfices → Distribution = signal de sommet',
      'pt' => 'O SOPR de Detentores de Curto Prazo mede se os compradores recentes estão vendendo com lucro ou prejuízo.\\n• < 0,95: Venda de pânico com prejuízos fortes → Capitulação = sinal de compra\\n• 0,95~1,0: Realização leve de prejuízos → Perto do fundo\\n• 1,0~1,03: Realização de lucros neutra\\n• > 1,05: Realização de lucros forte → Distribuição = sinal de topo',
      'tr' => 'Kısa Vadeli Sahip SOPR\\u2019u, son alıcıların karla mı zararla mı sattığını ölçer.\\n• < 0,95: Ağır zararla panik satışı → Kapitülasyon = alım sinyali\\n• 0,95~1,0: Hafif zarar realizasyonu → Dibe yakın\\n• 1,0~1,03: Nötr kar realizasyonu\\n• > 1,05: Güçlü kar realizasyonu → Dağıtım = tepe sinyali',
      'vi' => 'SOPR của Người nắm giữ Ngắn hạn đo xem người mua gần đây đang bán lãi hay lỗ.\\n• < 0,95: Bán hoảng loạn với lỗ nặng → Đầu hàng = tín hiệu mua\\n• 0,95~1,0: Chốt lỗ nhẹ → Gần đáy\\n• 1,0~1,03: Chốt lời trung lập\\n• > 1,05: Chốt lời mạnh → Phân phối = tín hiệu đỉnh',
    ],
  ],
  'coinbase-premium' => [
    'category' => 'institutional',
    'name' => [
      'ko' => '코인베이스 프리미엄',
      'en' => 'Coinbase Premium',
      'ja' => 'Coinbaseプレミアム',
      'es' => 'Coinbase Premium',
      'de' => 'Coinbase Premium',
      'fr' => 'Coinbase Premium',
      'pt' => 'Coinbase Premium',
      'tr' => 'Coinbase Premium',
      'vi' => 'Coinbase Premium',
    ],
    'desc' => [
      'ko' => '코인베이스 프리미엄 = (코인베이스 가격 - 바이낸스 가격) / 바이낸스 가격\\n미국 기관 수요를 실시간으로 반영. ETF 유입 데이터보다 2~3일 선행합니다.\\n• 양수: 미국 기관 매수 중 → 강세\\n• 0 근처: 관망/중립\\n• 음수: 기관 관망 → 단기 약세\\n현재: 음수 (46일+ 연속) → 미국 기관들이 매크로 명확성을 기다리는 중.',
      'en' => 'Coinbase Premium = (Coinbase BTC Price - Binance BTC Price) / Binance Price\\nReflects US institutional demand in real-time. Leads ETF flow data by 2~3 days.\\n• Positive: US institutions buying → Bullish\\n• Near zero: Watching/neutral\\n• Negative: Institutions on sideline → Bearish for short-term\\nCurrent: Negative (46+ consecutive days) → Institutions waiting for macro clarity.',
      'ja' => 'Coinbaseプレミアム = (Coinbase価格 - Binance価格) / Binance価格\\n米国機関の需要をリアルタイムで反映。ETF資金フローデータより2~3日先行します。\\n• プラス: 米国機関が買い中 → 強気\\n• ゼロ付近: 様子見/中立\\n• マイナス: 機関が様子見 → 短期的に弱気\\n現在: マイナス(46日以上連続) → 米国機関がマクロの明確化を待っている状態。',
      'es' => 'Coinbase Premium = (Precio BTC Coinbase - Precio BTC Binance) / Precio Binance\\nRefleja la demanda institucional estadounidense en tiempo real. Se adelanta a los datos de flujo de ETF por 2~3 días.\\n• Positivo: Instituciones estadounidenses comprando → Alcista\\n• Cerca de cero: Observando/neutral\\n• Negativo: Instituciones al margen → Bajista a corto plazo\\nActual: Negativo (46+ días consecutivos) → Instituciones esperando claridad macro.',
      'de' => 'Coinbase Premium = (Coinbase-BTC-Preis - Binance-BTC-Preis) / Binance-Preis\\nSpiegelt US-institutionelle Nachfrage in Echtzeit. Läuft ETF-Flussdaten um 2~3 Tage voraus.\\n• Positiv: US-Institutionen kaufen → Bullisch\\n• Nahe null: Beobachtung/neutral\\n• Negativ: Institutionen abwartend → Kurzfristig bärisch\\nAktuell: Negativ (46+ aufeinanderfolgende Tage) → Institutionen warten auf Makro-Klarheit.',
      'fr' => 'Coinbase Premium = (Prix BTC Coinbase - Prix BTC Binance) / Prix Binance\\nReflète la demande institutionnelle américaine en temps réel. Devance les données de flux ETF de 2~3 jours.\\n• Positif : Institutions américaines en achat → Haussier\\n• Proche de zéro : En observation/neutre\\n• Négatif : Institutions en retrait → Baissier à court terme\\nActuel : Négatif (46+ jours consécutifs) → Institutions en attente de clarté macro.',
      'pt' => 'Coinbase Premium = (Preço BTC Coinbase - Preço BTC Binance) / Preço Binance\\nReflete a demanda institucional dos EUA em tempo real. Antecipa os dados de fluxo de ETF em 2~3 dias.\\n• Positivo: Instituições dos EUA comprando → Altista\\n• Perto de zero: Observando/neutro\\n• Negativo: Instituições à margem → Baixista a curto prazo\\nAtual: Negativo (46+ dias consecutivos) → Instituições aguardando clareza macro.',
      'tr' => 'Coinbase Premium = (Coinbase BTC Fiyatı - Binance BTC Fiyatı) / Binance Fiyatı\\nABD kurumsal talebini gerçek zamanlı yansıtır. ETF akış verisinden 2~3 gün önde gider.\\n• Pozitif: ABD kurumları alıyor → Boğa\\n• Sıfıra yakın: İzliyor/nötr\\n• Negatif: Kurumlar kenarda → Kısa vadeli ayı\\nMevcut: Negatif (46+ ardışık gün) → Kurumlar makro netlik bekliyor.',
      'vi' => 'Coinbase Premium = (Giá BTC Coinbase - Giá BTC Binance) / Giá Binance\\nPhản ánh nhu cầu tổ chức Mỹ theo thời gian thực. Đi trước dữ liệu dòng tiền ETF 2~3 ngày.\\n• Dương: Tổ chức Mỹ đang mua → Tăng giá\\n• Gần 0: Đang quan sát/trung lập\\n• Âm: Tổ chức đứng ngoài → Giảm giá ngắn hạn\\nHiện tại: Âm (46+ ngày liên tiếp) → Tổ chức chờ sự rõ ràng vĩ mô.',
    ],
  ],
  'lth-supply' => [
    'category' => 'onchain',
    'name' => [
      'ko' => 'LTH 공급 비중',
      'en' => 'LTH Supply %',
      'ja' => 'LTH供給比率',
      'es' => '% Suministro LTH',
      'de' => 'LTH-Angebot %',
      'fr' => '% Offre LTH',
      'pt' => '% Fornecimento LTH',
      'tr' => '% LTH Arzı',
      'vi' => '% Nguồn cung LTH',
    ],
    'desc' => [
      'ko' => '장기 보유자 공급 비중 = 155일 이상 미이동 주소가 보유한 BTC 비율\\n• 75% 이상: 고래들의 공격적 매집 → 강력 매수 신호\\n• 70~75%: 일반적 매집\\n• 70% 이하: 분산 (고래 매도 중)',
      'en' => 'Long-Term Holder Supply % = percentage of BTC supply held by addresses inactive 155+ days.\\n• > 75%: Whales in aggressive accumulation → Strong buy signal\\n• 70~75%: Normal accumulation\\n• < 70%: Distribution (whales selling)',
      'ja' => '長期保有者供給比率 = 155日以上未移動のアドレスが保有するBTCの割合\\n• 75%以上: クジラが積極的に蓄積中 → 強力な買いシグナル\\n• 70~75%: 通常の蓄積\\n• 70%以下: 分配(クジラが売却中)',
      'es' => '% Suministro de Tenedores a Largo Plazo = porcentaje del suministro de BTC en manos de direcciones inactivas 155+ días.\\n• > 75%: Ballenas en acumulación agresiva → Señal de compra fuerte\\n• 70~75%: Acumulación normal\\n• < 70%: Distribución (ballenas vendiendo)',
      'de' => 'LTH-Angebot % = Prozentsatz des BTC-Angebots, gehalten von seit 155+ Tagen inaktiven Adressen.\\n• > 75%: Wale in aggressiver Akkumulation → Starkes Kaufsignal\\n• 70~75%: Normale Akkumulation\\n• < 70%: Distribution (Wale verkaufen)',
      'fr' => '% Offre des Détenteurs à Long Terme = pourcentage de l\'offre de BTC détenue par des adresses inactives depuis 155+ jours.\\n• > 75% : Baleines en accumulation agressive → Signal d\'achat fort\\n• 70~75% : Accumulation normale\\n• < 70% : Distribution (baleines en vente)',
      'pt' => '% Fornecimento de Detentores de Longo Prazo = percentual do fornecimento de BTC em mãos de endereços inativos por 155+ dias.\\n• > 75%: Baleias em acumulação agressiva → Sinal de compra forte\\n• 70~75%: Acumulação normal\\n• < 70%: Distribuição (baleias vendendo)',
      'tr' => '% Uzun Vadeli Sahip Arzı = 155+ gün hareketsiz adreslerdeki BTC arzının yüzdesi.\\n• > 75%: Balinalar agresif biriktiriyor → Güçlü alım sinyali\\n• 70~75%: Normal biriktirme\\n• < 70%: Dağıtım (balinalar satıyor)',
      'vi' => '% Nguồn cung Người nắm giữ Dài hạn = phần trăm nguồn cung BTC nằm trong các địa chỉ không hoạt động 155+ ngày.\\n• > 75%: Cá voi tích lũy mạnh → Tín hiệu mua mạnh\\n• 70~75%: Tích lũy bình thường\\n• < 70%: Phân phối (cá voi đang bán)',
    ],
  ],
  'hash-ribbon' => [
    'category' => 'miner',
    'name' => [
      'ko' => 'Hash Ribbon',
      'en' => 'Hash Ribbon',
      'ja' => 'Hash Ribbon',
      'es' => 'Hash Ribbon',
      'de' => 'Hash Ribbon',
      'fr' => 'Hash Ribbon',
      'pt' => 'Hash Ribbon',
      'tr' => 'Hash Ribbon',
      'vi' => 'Hash Ribbon',
    ],
    'desc' => [
      'ko' => 'Hash Ribbon은 비트코인 채굴 해시레이트 모멘텀(30일 vs 60일 이평)을 추적합니다.\\n• 캐피튤레이션: 약한 채굴자 가동 중단 → 저점 형성 중\\n• 회복 전환: 30일 MA가 60일 MA 상향 돌파 → 가장 신뢰도 높은 선행 매수 신호 (2~4주 선행)\\n역사적 정확도: 2016, 2018, 2020, 2022년 저점 모두 정확히 포착.',
      'en' => 'Hash Ribbon tracks Bitcoin mining hashrate momentum (30-day vs 60-day moving average).\\n• Capitulation: Weak miners shutting down (30MA < 60MA) → Bottom forming\\n• Recovery Cross: 30MA crosses above 60MA → Most reliable leading buy signal (2~4 weeks ahead)\\nHistorical accuracy: Perfectly timed 2016, 2018, 2020, 2022 bottoms.',
      'ja' => 'Hash Ribbonはビットコインのマイニングハッシュレートのモメンタム(30日 vs 60日移動平均)を追跡します。\\n• キャピチュレーション: 弱小マイナーが停止中 → 底値形成中\\n• 回復転換: 30日MAが60日MAを上抜け → 最も信頼性の高い先行買いシグナル(2~4週間先行)\\n過去の的中率: 2016・2018・2020・2022年の底値を正確に捉えています。',
      'es' => 'Hash Ribbon rastrea el momentum del hashrate de minería de Bitcoin (media móvil de 30 días vs 60 días).\\n• Capitulación: Mineros débiles cerrando (30MA < 60MA) → Formándose un suelo\\n• Cruce de Recuperación: 30MA cruza por encima de 60MA → Señal de compra líder más confiable (2~4 semanas de anticipación)\\nPrecisión histórica: Marcó perfectamente los suelos de 2016, 2018, 2020 y 2022.',
      'de' => 'Hash Ribbon verfolgt das Momentum der Bitcoin-Mining-Hashrate (30-Tage- vs. 60-Tage-Durchschnitt).\\n• Kapitulation: Schwache Miner schalten ab (30MA < 60MA) → Tief bildet sich\\n• Erholungs-Cross: 30MA kreuzt über 60MA → Zuverlässigstes Vorlauf-Kaufsignal (2~4 Wochen Vorlauf)\\nHistorische Genauigkeit: Traf die Tiefs 2016, 2018, 2020, 2022 präzise.',
      'fr' => 'Le Hash Ribbon suit le momentum du hashrate de minage du Bitcoin (moyenne mobile 30 jours vs 60 jours).\\n• Capitulation : Mineurs faibles à l\'arrêt (30MM < 60MM) → Formation d\'un creux\\n• Croisement de Reprise : la 30MM passe au-dessus de la 60MM → Signal d\'achat avancé le plus fiable (2~4 semaines à l\'avance)\\nPrécision historique : A parfaitement marqué les creux de 2016, 2018, 2020 et 2022.',
      'pt' => 'Hash Ribbon acompanha o momentum do hashrate de mineração do Bitcoin (média móvel de 30 dias vs 60 dias).\\n• Capitulação: Mineradores fracos encerrando (30MA < 60MA) → Formando um fundo\\n• Cruzamento de Recuperação: 30MA cruza acima de 60MA → Sinal de compra líder mais confiável (2~4 semanas de antecedência)\\nPrecisão histórica: Marcou perfeitamente os fundos de 2016, 2018, 2020 e 2022.',
      'tr' => 'Hash Ribbon, Bitcoin madencilik hash oranının momentumunu izler (30 günlük vs 60 günlük hareketli ortalama).\\n• Kapitülasyon: Zayıf madenciler kapanıyor (30HO < 60HO) → Dip oluşuyor\\n• Toparlanma Kesişimi: 30HO, 60HO\\u2019yu yukarı keser → En güvenilir öncü alım sinyali (2~4 hafta önceden)\\nTarihsel doğruluk: 2016, 2018, 2020 ve 2022 diplerini mükemmel işaretledi.',
      'vi' => 'Hash Ribbon theo dõi động lượng hash rate khai thác Bitcoin (trung bình động 30 ngày vs 60 ngày).\\n• Đầu hàng: Thợ đào yếu đóng cửa (30MA < 60MA) → Đang tạo đáy\\n• Giao cắt Phục hồi: 30MA cắt lên trên 60MA → Tín hiệu mua dẫn dắt đáng tin cậy nhất (báo trước 2~4 tuần)\\nĐộ chính xác lịch sử: Đánh dấu hoàn hảo các đáy 2016, 2018, 2020 và 2022.',
    ],
  ],
  'funding-rate' => [
    'category' => 'miner',
    'name' => [
      'ko' => '선물-현물 갭',
      'en' => 'Futures-Spot Gap',
      'ja' => '先物-現物ギャップ',
      'es' => 'Brecha Futuros-Spot',
      'de' => 'Futures-Spot-Spread',
      'fr' => 'Écart Futures-Spot',
      'pt' => 'Diferença Futuros-Spot',
      'tr' => 'Vadeli-Spot Farkı',
      'vi' => 'Chênh lệch Tương lai-Spot',
    ],
    'desc' => [
      'ko' => '선물-현물 갭 = (선물 마크가격 - 현물 인덱스가격) / 현물가격\\n8시간 정산 딜레이 없이 실시간으로 레버리지 쏠림을 포착합니다.\\n• 음수 (역프리미엄): 선물이 현물보다 낮음 → 숏 과부하 → 선행 매수 신호\\n• ±0.01%: 중립 (BTC 정상 범위)\\n• 0.05% 이상: 콘탱고 → 롱 과부하 → 주의\\n• 0.15% 이상: 극단 콘탱고 → 고점 신호',
      'en' => 'Futures-Spot Gap = (Futures Mark Price - Spot Index Price) / Spot Price\\nShows real-time leverage positioning without the 8-hour settlement delay.\\n• Negative (backwardation): Futures cheaper than spot → Short overload → Leading buy signal\\n• ±0.01%: Neutral (normal range for BTC)\\n• > 0.05%: Contango → Long overload → Caution\\n• > 0.15%: Extreme contango → Top signal',
      'ja' => '先物-現物ギャップ = (先物マーク価格 - 現物インデックス価格) / 現物価格\\n8時間の精算遅延なしに、リアルタイムでレバレッジの偏りを捉えます。\\n• マイナス(逆プレミアム): 先物が現物より安い → ショート過多 → 先行買いシグナル\\n• ±0.01%: 中立(BTCの正常範囲)\\n• 0.05%以上: コンタンゴ → ロング過多 → 注意\\n• 0.15%以上: 極端なコンタンゴ → 天井シグナル',
      'es' => 'Brecha Futuros-Spot = (Precio Marca Futuros - Precio Índice Spot) / Precio Spot\\nMuestra el posicionamiento de apalancamiento en tiempo real sin el retraso de liquidación de 8 horas.\\n• Negativo (backwardation): Futuros más baratos que spot → Sobrecarga de cortos → Señal de compra líder\\n• ±0.01%: Neutral (rango normal para BTC)\\n• > 0.05%: Contango → Sobrecarga de largos → Precaución\\n• > 0.15%: Contango extremo → Señal de techo',
      'de' => 'Futures-Spot-Spread = (Futures-Markpreis - Spot-Indexpreis) / Spot-Preis\\nZeigt Echtzeit-Hebelpositionierung ohne die 8-Stunden-Abrechnungsverzögerung.\\n• Negativ (Backwardation): Futures günstiger als Spot → Short-Überlastung → Vorlauf-Kaufsignal\\n• ±0,01%: Neutral (normaler BTC-Bereich)\\n• > 0,05%: Contango → Long-Überlastung → Vorsicht\\n• > 0,15%: Extremer Contango → Hochsignal',
      'fr' => 'Écart Futures-Spot = (Prix Mark Futures - Prix Indice Spot) / Prix Spot\\nMontre le positionnement du levier en temps réel sans le délai de règlement de 8 heures.\\n• Négatif (backwardation) : Futures moins chers que le spot → Surcharge de shorts → Signal d\'achat avancé\\n• ±0,01% : Neutre (fourchette normale pour BTC)\\n• > 0,05% : Contango → Surcharge de longs → Prudence\\n• > 0,15% : Contango extrême → Signal de sommet',
      'pt' => 'Diferença Futuros-Spot = (Preço Marca Futuros - Preço Índice Spot) / Preço Spot\\nMostra o posicionamento de alavancagem em tempo real sem o atraso de liquidação de 8 horas.\\n• Negativo (backwardation): Futuros mais baratos que spot → Sobrecarga de shorts → Sinal de compra líder\\n• ±0,01%: Neutro (faixa normal para BTC)\\n• > 0,05%: Contango → Sobrecarga de longs → Cautela\\n• > 0,15%: Contango extremo → Sinal de topo',
      'tr' => 'Vadeli-Spot Farkı = (Vadeli Mark Fiyatı - Spot Endeks Fiyatı) / Spot Fiyat\\n8 saatlik takas gecikmesi olmadan gerçek zamanlı kaldıraç konumlanmasını gösterir.\\n• Negatif (backwardation): Vadeli spottan ucuz → Aşırı short → Öncü alım sinyali\\n• ±0,01%: Nötr (BTC için normal aralık)\\n• > 0,05%: Contango → Aşırı long → Dikkat\\n• > 0,15%: Aşırı contango → Tepe sinyali',
      'vi' => 'Chênh lệch Tương lai-Spot = (Giá Mark Tương lai - Giá Chỉ số Spot) / Giá Spot\\nCho thấy vị thế đòn bẩy thời gian thực mà không có độ trễ thanh toán 8 giờ.\\n• Âm (backwardation): Tương lai rẻ hơn spot → Quá tải short → Tín hiệu mua dẫn dắt\\n• ±0,01%: Trung lập (khoảng bình thường cho BTC)\\n• > 0,05%: Contango → Quá tải long → Thận trọng\\n• > 0,15%: Contango cực đoan → Tín hiệu đỉnh',
    ],
  ],
  'rsi' => [
    'category' => 'miner',
    'name' => [
      'ko' => 'RSI (14일)',
      'en' => 'RSI (14d)',
      'ja' => 'RSI (14日)',
      'es' => 'RSI (14d)',
      'de' => 'RSI (14T)',
      'fr' => 'RSI (14j)',
      'pt' => 'RSI (14d)',
      'tr' => 'RSI (14g)',
      'vi' => 'RSI (14n)',
    ],
    'desc' => [
      'ko' => '14일 기준 상대강도지수(RSI)로, 최근 가격 변화의 속도와 강도를 측정하는 모멘텀 지표입니다. RSI 30 이하는 과매도(보통 저점 신호), 70 이상은 과매수(보통 고점 신호)를 의미합니다. 순수 가격 기반이라 모든 코인에 동일하게 적용 가능합니다.',
      'en' => 'Relative Strength Index over 14 days, a momentum oscillator measuring the speed and magnitude of recent price changes. RSI below 30 indicates oversold conditions (often a bottom signal), while RSI above 70 indicates overbought conditions (often a top signal). Applies equally to all coins since it\'s purely price-based.',
      'ja' => '14日間の相対力指数(RSI)で、直近の価格変動の速度と強さを測るモメンタム指標です。RSI 30以下は売られすぎ(通常は底値シグナル)、70以上は買われすぎ(通常は天井シグナル)を意味します。純粋に価格ベースのため、全てのコインに同様に適用できます。',
      'es' => 'Índice de Fuerza Relativa a 14 días, un oscilador de momentum que mide la velocidad y magnitud de los cambios de precio recientes. RSI por debajo de 30 indica sobreventa (a menudo señal de suelo), mientras que por encima de 70 indica sobrecompra (a menudo señal de techo). Se aplica igual a todas las monedas ya que se basa puramente en el precio.',
      'de' => 'Relative-Stärke-Index über 14 Tage, ein Momentum-Oszillator, der Geschwindigkeit und Ausmaß jüngster Preisänderungen misst. RSI unter 30 zeigt überverkaufte Bedingungen an (oft ein Tiefsignal), über 70 überkaufte Bedingungen (oft ein Hochsignal). Gilt für alle Coins gleichermaßen, da rein preisbasiert.',
      'fr' => 'Indice de Force Relative sur 14 jours, un oscillateur de momentum mesurant la vitesse et l\'ampleur des variations de prix récentes. Un RSI inférieur à 30 indique une survente (souvent signal de creux), tandis qu\'au-dessus de 70 il indique un surachat (souvent signal de sommet). S\'applique de la même manière à toutes les cryptos car il repose uniquement sur le prix.',
      'pt' => 'Índice de Força Relativa de 14 dias, um oscilador de momentum que mede a velocidade e a magnitude das variações de preço recentes. RSI abaixo de 30 indica sobrevenda (muitas vezes sinal de fundo), enquanto acima de 70 indica sobrecompra (muitas vezes sinal de topo). Aplica-se igualmente a todas as moedas por se basear puramente no preço.',
      'tr' => '14 günlük Göreceli Güç Endeksi, son fiyat değişimlerinin hızını ve büyüklüğünü ölçen bir momentum osilatörü. 30\\u2019un altındaki RSI aşırı satımı gösterir (genellikle dip sinyali), 70\\u2019in üzeri ise aşırı alımı gösterir (genellikle tepe sinyali). Tamamen fiyata dayandığı için tüm coinlere eşit uygulanır.',
      'vi' => 'Chỉ số Sức mạnh Tương đối 14 ngày, một dao động động lượng đo tốc độ và mức độ thay đổi giá gần đây. RSI dưới 30 cho thấy quá bán (thường là tín hiệu đáy), trong khi trên 70 cho thấy quá mua (thường là tín hiệu đỉnh). Áp dụng như nhau cho mọi đồng vì hoàn toàn dựa trên giá.',
    ],
  ],
  'btc-dominance' => [
    'category' => 'cycle',
    'name' => [
      'ko' => 'BTC 도미넌스',
      'en' => 'BTC Dominance',
      'ja' => 'BTCドミナンス',
      'es' => 'Dominancia BTC',
      'de' => 'BTC-Dominanz',
      'fr' => 'Dominance BTC',
      'pt' => 'Dominância BTC',
      'tr' => 'BTC Dominansı',
      'vi' => 'Thống trị BTC',
    ],
    'desc' => [
      'ko' => 'BTC 도미넌스 = BTC 시총 / 전체 암호화폐 시총\\n알트코인에서 비트코인으로 자금이 이동할 때 상승 — 대형 상승장 전 전형적 패턴입니다.\\n• 55~63% (코인게코 기준): BTC 시즌 → 자본이 BTC에 집중 → 매수 구간\\n• 50% 이하: 알트 시즌 → 리스크온\\n• 65% 이상: 극단 BTC 지배 → 알트 로테이션 임박 가능',
      'en' => 'BTC Dominance = BTC market cap / Total crypto market cap\\nRises when capital flows from altcoins to Bitcoin — typical pattern before major bull runs.\\n• 55~63% (CoinGecko basis): BTC season → Capital consolidating into BTC → Buy zone\\n• < 50%: Alt season → Risk on\\n• > 65%: Extreme BTC dominance → May signal alt rotation incoming',
      'ja' => 'BTCドミナンス = BTC時価総額 / 暗号資産全体の時価総額\\nアルトコインからビットコインへ資金が移動すると上昇 — 大型上昇相場前の典型的なパターンです。\\n• 55~63%(CoinGecko基準): BTCシーズン → 資本がBTCに集中 → 買いゾーン\\n• 50%以下: アルトシーズン → リスクオン\\n• 65%以上: 極端なBTC支配 → アルトへのローテーションが近い可能性',
      'es' => 'Dominancia BTC = Capitalización de mercado BTC / Capitalización total de mercado cripto\\nSube cuando el capital fluye de altcoins a Bitcoin — patrón típico antes de grandes mercados alcistas.\\n• 55~63% (base CoinGecko): Temporada BTC → Capital consolidándose en BTC → Zona de compra\\n• < 50%: Temporada alt → Riesgo activado\\n• > 65%: Dominancia BTC extrema → Puede señalar rotación alt próxima',
      'de' => 'BTC-Dominanz = BTC-Marktkapitalisierung / Gesamte Krypto-Marktkapitalisierung\\nSteigt, wenn Kapital von Altcoins zu Bitcoin fließt — typisches Muster vor großen Bullenmärkten.\\n• 55~63% (CoinGecko-Basis): BTC-Saison → Kapital konsolidiert sich in BTC → Kaufzone\\n• < 50%: Alt-Saison → Risiko an\\n• > 65%: Extreme BTC-Dominanz → Kann bevorstehende Alt-Rotation signalisieren',
      'fr' => 'Dominance BTC = Capitalisation BTC / Capitalisation totale du marché crypto\\nAugmente quand le capital passe des altcoins au Bitcoin — schéma typique avant de grands marchés haussiers.\\n• 55~63% (base CoinGecko) : Saison BTC → Capital consolidé sur BTC → Zone d\'achat\\n• < 50% : Saison alt → Risque activé\\n• > 65% : Dominance BTC extrême → Peut signaler une rotation alt imminente',
      'pt' => 'Dominância BTC = Capitalização de mercado BTC / Capitalização total do mercado cripto\\nSobe quando o capital flui de altcoins para o Bitcoin — padrão típico antes de grandes mercados de alta.\\n• 55~63% (base CoinGecko): Temporada BTC → Capital consolidando em BTC → Zona de compra\\n• < 50%: Temporada alt → Risco ativado\\n• > 65%: Dominância BTC extrema → Pode sinalizar rotação alt próxima',
      'tr' => 'BTC Dominansı = BTC piyasa değeri / Toplam kripto piyasa değeri\\nSermaye altcoinlerden Bitcoin\\u2019e aktığında yükselir — büyük boğa piyasalarından önceki tipik desen.\\n• 55~63% (CoinGecko bazlı): BTC sezonu → Sermaye BTC\\u2019de yoğunlaşıyor → Alım bölgesi\\n• < 50%: Alt sezonu → Risk açık\\n• > 65%: Aşırı BTC dominansı → Yaklaşan alt rotasyonuna işaret edebilir',
      'vi' => 'Thống trị BTC = Vốn hóa BTC / Tổng vốn hóa thị trường crypto\\nTăng khi vốn chảy từ altcoin sang Bitcoin — mô hình điển hình trước các thị trường tăng lớn.\\n• 55~63% (theo CoinGecko): Mùa BTC → Vốn củng cố vào BTC → Vùng mua\\n• < 50%: Mùa alt → Bật rủi ro\\n• > 65%: Thống trị BTC cực đoan → Có thể báo hiệu xoay vòng alt sắp tới',
    ],
  ],
  'halving' => [
    'category' => 'cycle',
    'name' => [
      'ko' => '반감기 사이클',
      'en' => 'Halving Cycle',
      'ja' => '半減期サイクル',
      'es' => 'Ciclo de Halving',
      'de' => 'Halving-Zyklus',
      'fr' => 'Cycle de Halving',
      'pt' => 'Ciclo de Halving',
      'tr' => 'Halving Döngüsü',
      'vi' => 'Chu kỳ Halving',
    ],
    'desc' => [
      'ko' => '비트코인 반감기는 약 4년마다 채굴 보상을 50% 줄여 공급 충격을 만듭니다.\\n역사적 저점 타이밍:\\n• 2015년 저점: 2016년 반감기 18개월 전\\n• 2018년 저점: 2020년 반감기 17개월 전\\n• 2022년 저점: 2024년 반감기 17개월 전\\n• 현재: 2028년 4월 반감기까지 약 22개월 → 핵심 저점 구간.',
      'en' => 'Bitcoin halvings cut mining rewards by 50% every ~4 years, creating supply shocks.\\nHistorical bottom timing:\\n• 2015 bottom: 18 months before 2016 halving\\n• 2018 bottom: 17 months before 2020 halving  \\n• 2022 bottom: 17 months before 2024 halving\\n• Current: ~22 months before April 2028 halving → In the core bottom window.',
      'ja' => 'ビットコインの半減期は約4年ごとにマイニング報酬を50%削減し、供給ショックを生み出します。\\n過去の底値タイミング:\\n• 2015年の底値: 2016年半減期の18ヶ月前\\n• 2018年の底値: 2020年半減期の17ヶ月前\\n• 2022年の底値: 2024年半減期の17ヶ月前\\n• 現在: 2028年4月の半減期まで約22ヶ月 → コア底値ゾーン内。',
      'es' => 'Los halvings de Bitcoin reducen las recompensas de minería en 50% cada ~4 años, creando shocks de suministro.\\nTiming histórico de suelos:\\n• Suelo 2015: 18 meses antes del halving 2016\\n• Suelo 2018: 17 meses antes del halving 2020  \\n• Suelo 2022: 17 meses antes del halving 2024\\n• Actual: ~21 meses antes del halving de abril 2028 → En la ventana central del suelo.',
      'de' => 'Bitcoin-Halvings reduzieren Mining-Belohnungen alle ~4 Jahre um 50% und erzeugen Angebotsschocks.\\nHistorisches Tief-Timing:\\n• Tief 2015: 18 Monate vor Halving 2016\\n• Tief 2018: 17 Monate vor Halving 2020  \\n• Tief 2022: 17 Monate vor Halving 2024\\n• Aktuell: ~21 Monate vor Halving April 2028 → Im Kern-Tieffenster.',
      'fr' => 'Les halvings du Bitcoin réduisent les récompenses de minage de 50% tous les ~4 ans, créant des chocs d\'offre.\\nTiming historique des creux :\\n• Creux 2015 : 18 mois avant le halving 2016\\n• Creux 2018 : 17 mois avant le halving 2020  \\n• Creux 2022 : 17 mois avant le halving 2024\\n• Actuel : ~21 mois avant le halving d\'avril 2028 → Au centre de la fenêtre de creux.',
      'pt' => 'Os halvings do Bitcoin reduzem as recompensas de mineração em 50% a cada ~4 anos, criando choques de oferta.\\nTiming histórico de fundos:\\n• Fundo 2015: 18 meses antes do halving 2016\\n• Fundo 2018: 17 meses antes do halving 2020  \\n• Fundo 2022: 17 meses antes do halving 2024\\n• Atual: ~21 meses antes do halving de abril 2028 → Na janela central do fundo.',
      'tr' => 'Bitcoin halvingleri madencilik ödüllerini her ~4 yılda %50 azaltır ve arz şokları yaratır.\\nTarihsel dip zamanlaması:\\n• 2015 dibi: 2016 halvinginden 18 ay önce\\n• 2018 dibi: 2020 halvinginden 17 ay önce  \\n• 2022 dibi: 2024 halvinginden 17 ay önce\\n• Mevcut: Nisan 2028 halvinginden ~21 ay önce → Dip penceresinin merkezinde.',
      'vi' => 'Các đợt halving của Bitcoin giảm phần thưởng khai thác 50% mỗi ~4 năm, tạo cú sốc nguồn cung.\\nThời điểm đáy lịch sử:\\n• Đáy 2015: 18 tháng trước halving 2016\\n• Đáy 2018: 17 tháng trước halving 2020  \\n• Đáy 2022: 17 tháng trước halving 2024\\n• Hiện tại: ~21 tháng trước halving tháng 4/2028 → Ở giữa cửa sổ đáy.',
    ],
  ],
  'volume-change' => [
    'category' => 'miner',
    'name' => [
      'ko' => '거래량 가속도 (15분봉 vs 1h/4h)',
      'en' => 'Volume Acceleration (15m vs 1h/4h)',
      'ja' => '出来高変化率 (15分足 vs 1h/4h)',
      'es' => 'Aceleración de Volumen (15m vs 1h/4h)',
      'de' => 'Volumenbeschleunigung (15m vs 1h/4h)',
      'fr' => 'Accélération du Volume (15m vs 1h/4h)',
      'pt' => 'Aceleração de Volume (15m vs 1h/4h)',
      'tr' => 'Hacim Hızlanması (15d vs 1s/4s)',
      'vi' => 'Tăng tốc Khối lượng (15p vs 1g/4g)',
    ],
    'desc' => [
      'ko' => '최근 15분봉 거래량을 1시간·4시간 평균과 비교합니다. 저점 근처에서 거래량이 급증하면 항복 매도 후 반등이 따라오는 경우가 많고, 고점 근처에서의 급증은 대형 보유자의 분배(매도)를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간으로 반영됩니다.',
      'en' => 'Compares the most recent 15-minute candle\'s volume to the 1-hour and 4-hour averages. A large spike combined with a price near a low can signal capitulation selling that often precedes a reversal. A spike near a high can signal distribution by large holders. Using 15-minute data instead of daily reflects conditions almost in real time.',
      'ja' => '直近の15分足の出来高を1時間・4時間平均と比較します。安値圏で出来高が急増すると投げ売り後の反発が続くことが多く、高値圏での急増は大口保有者による分配(売却)を示唆する場合があります。日足の代わりに15分足を使用し、ほぼリアルタイムで反映されます。',
      'es' => 'Compara el volumen de la vela de 15 minutos más reciente con los promedios de 1 hora y 4 horas. Un pico grande combinado con un precio cerca de un mínimo puede señalar una venta de capitulación que a menudo precede a un rebote. Un pico cerca de un máximo puede señalar distribución por parte de grandes tenedores. Usar datos de 15 minutos en lugar de diarios refleja condiciones casi en tiempo real.',
      'de' => 'Vergleicht das Volumen der letzten 15-Minuten-Kerze mit dem 1-Stunden- und 4-Stunden-Durchschnitt. Ein großer Spike kombiniert mit einem Preis nahe einem Tief kann Kapitulationsverkäufe signalisieren, die oft einer Umkehr vorausgehen. Ein Spike nahe einem Hoch kann Distribution durch Großanleger signalisieren. Die Nutzung von 15-Minuten- statt Tagesdaten bildet Bedingungen nahezu in Echtzeit ab.',
      'fr' => 'Compare le volume de la bougie de 15 minutes la plus récente aux moyennes de 1 heure et 4 heures. Un pic important combiné à un prix près d\'un plus bas peut signaler une vente de capitulation qui précède souvent un rebond. Un pic près d\'un plus haut peut signaler une distribution par les gros détenteurs. Utiliser des données de 15 minutes plutôt que quotidiennes reflète des conditions quasi en temps réel.',
      'pt' => 'Compara o volume da vela de 15 minutos mais recente com as médias de 1 hora e 4 horas. Um pico grande combinado com um preço perto de uma mínima pode sinalizar uma venda de capitulação que muitas vezes precede uma recuperação. Um pico perto de uma máxima pode sinalizar distribuição por grandes detentores. Usar dados de 15 minutos em vez de diários reflete condições quase em tempo real.',
      'tr' => 'En son 15 dakikalık mumun hacmini 1 saatlik ve 4 saatlik ortalamalarla karşılaştırır. Bir dibin yakınındaki fiyatla birleşen büyük bir sıçrama, sıklıkla bir toparlanmadan önce gelen kapitülasyon satışına işaret edebilir. Bir tepenin yakınındaki sıçrama, büyük sahiplerce dağıtıma işaret edebilir. Günlük yerine 15 dakikalık veri kullanmak neredeyse gerçek zamanlı koşulları yansıtır.',
      'vi' => 'So sánh khối lượng nến 15 phút gần nhất với trung bình 1 giờ và 4 giờ. Một đột biến lớn kết hợp với giá gần mức thấp có thể báo hiệu đợt bán đầu hàng thường xảy ra trước một đợt hồi phục. Đột biến gần mức cao có thể báo hiệu phân phối bởi các tay to. Dùng dữ liệu 15 phút thay vì hàng ngày phản ánh điều kiện gần thời gian thực.',
    ],
  ],
  'buy-pressure' => [
    'category' => 'miner',
    'name' => [
      'ko' => '실시간 매수 주도 거래량 — FOMO/과열',
      'en' => 'Live Buy-Led Volume — FOMO',
      'ja' => 'リアルタイム買い主導出来高 — FOMO/過熱',
      'es' => 'Volumen en Vivo Liderado por Compra — FOMO',
      'de' => 'Live Kaufgetriebenes Volumen — FOMO',
      'fr' => 'Volume en Direct Mené par l\\\'Achat — FOMO',
      'pt' => 'Volume ao Vivo Liderado por Compra — FOMO',
      'tr' => 'Canlı Alım Öncülüğünde Hacim — FOMO',
      'vi' => 'Khối lượng Trực tiếp do Mua dẫn dắt — FOMO',
    ],
    'desc' => [
      'ko' => '최근 15분봉 거래량 중 매수 주도 비중입니다. 65% 이상 + 거래량 급증 + 양봉이 겹치면 국소 고점 근처에서 FOMO 과열 매수를 시사할 수 있습니다. 일봉 대신 15분봉을 사용해 거의 실시간(15분~1시간 지연, 일봉은 최대 24시간)으로 반영됩니다.',
      'en' => 'Share of the most recent 15-minute candles\' volume driven by aggressive buying. A high ratio (65%+) combined with a volume spike and a green candle can signal FOMO-driven overheating near a local top. Uses 15-minute data instead of daily, so it reflects conditions almost in real time (15min–1hr lag vs. up to 24hr for daily volume).',
      'ja' => '直近の15分足の出来高のうち、買い注文が主導した割合です。65%以上 + 出来高急増 + 陽線が重なると、局所的な高値圏でのFOMO過熱買いを示唆する場合があります。日足の代わりに15分足を使用するため、ほぼリアルタイム(15分〜1時間の遅延、日足は最大24時間)で反映されます。',
      'es' => 'Proporción del volumen de las velas de 15 minutos más recientes impulsado por compras agresivas. Un ratio alto (65%+) combinado con un pico de volumen y una vela verde puede señalar sobrecalentamiento por FOMO cerca de un techo local. Usa datos de 15 minutos en lugar de diarios, reflejando condiciones casi en tiempo real (retraso de 15min–1h vs. hasta 24h para el volumen diario).',
      'de' => 'Anteil des Volumens der letzten 15-Minuten-Kerzen, der durch aggressive Käufe getrieben wird. Eine hohe Quote (65%+) kombiniert mit einem Volumenspike und einer grünen Kerze kann FOMO-getriebene Überhitzung nahe eines lokalen Hochs signalisieren. Nutzt 15-Minuten- statt Tagesdaten und bildet Bedingungen so nahezu in Echtzeit ab (15min–1h Verzögerung vs. bis zu 24h beim Tagesvolumen).',
      'fr' => 'Proportion du volume des bougies de 15 minutes les plus récentes portée par des achats agressifs. Un ratio élevé (65%+) combiné à un pic de volume et une bougie verte peut signaler une surchauffe due au FOMO près d\'un sommet local. Utilise des données de 15 minutes plutôt que quotidiennes, reflétant des conditions quasi en temps réel (délai de 15min–1h vs jusqu\'à 24h pour le volume quotidien).',
      'pt' => 'Proporção do volume das velas de 15 minutos mais recentes impulsionado por compras agressivas. Um índice alto (65%+) combinado com um pico de volume e uma vela verde pode sinalizar sobreaquecimento por FOMO perto de um topo local. Usa dados de 15 minutos em vez de diários, refletindo condições quase em tempo real (atraso de 15min–1h vs. até 24h para o volume diário).',
      'tr' => 'En son 15 dakikalık mumların hacminin agresif alımlarla yönlendirilen oranı. Yüksek bir oran (%65+) ile hacim sıçraması ve yeşil mum birleştiğinde, yerel bir tepe yakınında FOMO kaynaklı aşırı ısınmaya işaret edebilir. Günlük yerine 15 dakikalık veri kullanır ve neredeyse gerçek zamanlı koşulları yansıtır (günlük hacim için 24 saate kadar gecikme yerine 15dk–1s gecikme).',
      'vi' => 'Tỷ lệ khối lượng của các nến 15 phút gần nhất được thúc đẩy bởi lực mua chủ động. Tỷ lệ cao (65%+) kết hợp với đột biến khối lượng và nến xanh có thể báo hiệu quá nóng do FOMO gần đỉnh cục bộ. Dùng dữ liệu 15 phút thay vì hàng ngày, phản ánh điều kiện gần thời gian thực (độ trễ 15p–1g so với tối đa 24g cho khối lượng hàng ngày).',
    ],
  ],
  'btc-correlation' => [
    'category' => 'cycle',
    'name' => [
      'ko' => 'BTC 도미넌스 — 알트 사이클',
      'en' => 'BTC Dominance — Alt Cycle',
      'ja' => 'BTCドミナンス — アルトサイクル',
      'es' => 'Dominancia BTC — Ciclo Alt',
      'de' => 'BTC-Dominanz — Alt-Zyklus',
      'fr' => 'Dominance BTC — Cycle Alt',
      'pt' => 'Dominância BTC — Ciclo Alt',
      'tr' => 'BTC Dominansı — Alt Döngü',
      'vi' => 'Thống trị BTC — Chu kỳ Alt',
    ],
    'desc' => [
      'ko' => '비트코인 시가총액 도미넌스를 알트코인 사이클 위치의 대리 지표로 활용합니다. BTC 도미넌스가 높을 때(55% 이상)는 자금이 비트코인에 집중되어 알트코인이 부진한 경향이 있고, 이는 보통 알트 사이클이 아직 시작되지 않았다는 신호입니다. 도미넌스가 하락하면(50% 이하) 자금이 알트코인으로 이동하며, 역사적으로 \'알트 시즌\'과 연관됩니다.',
      'en' => 'Tracks Bitcoin\'s market cap dominance as a proxy for the broader altcoin cycle position. When BTC dominance is high (55%+), capital is concentrated in Bitcoin and altcoins tend to underperform — often a sign the alt cycle hasn\'t started yet. When dominance falls (below 50%), capital rotates into altcoins, historically associated with "alt season."',
      'ja' => 'ビットコインの時価総額ドミナンスを、アルトコインサイクルの位置を示す代理指標として活用します。BTCドミナンスが高いとき(55%以上)は資金がビットコインに集中し、アルトコインが軟調な傾向があり、通常はアルトサイクルがまだ始まっていないシグナルです。ドミナンスが下落すると(50%以下)資金がアルトコインに移動し、歴史的に「アルトシーズン」と関連付けられます。',
      'es' => 'Rastrea la dominancia de capitalización de mercado de Bitcoin como proxy de la posición del ciclo alt más amplio. Cuando la dominancia BTC es alta (55%+), el capital se concentra en Bitcoin y las altcoins tienden a rendir menos — a menudo señal de que el ciclo alt aún no ha comenzado. Cuando la dominancia cae (por debajo de 50%), el capital rota hacia altcoins, históricamente asociado con la "temporada alt".',
      'de' => 'Verfolgt Bitcoins Marktkapitalisierungs-Dominanz als Proxy für die Position im breiteren Alt-Zyklus. Bei hoher BTC-Dominanz (55%+) konzentriert sich Kapital auf Bitcoin und Altcoins tendieren zur Underperformance — oft ein Zeichen, dass der Alt-Zyklus noch nicht begonnen hat. Fällt die Dominanz (unter 50%), rotiert Kapital in Altcoins, historisch verbunden mit der "Alt Season".',
      'fr' => 'Suit la dominance de capitalisation du Bitcoin comme indicateur de la position du cycle alt plus large. Quand la dominance BTC est élevée (55%+), le capital se concentre sur le Bitcoin et les altcoins tendent à sous-performer — souvent le signe que le cycle alt n\'a pas encore commencé. Quand la dominance chute (sous 50%), le capital tourne vers les altcoins, historiquement associé à la "saison alt".',
      'pt' => 'Acompanha a dominância de capitalização de mercado do Bitcoin como proxy da posição do ciclo alt mais amplo. Quando a dominância BTC é alta (55%+), o capital concentra-se no Bitcoin e as altcoins tendem a render menos — muitas vezes sinal de que o ciclo alt ainda não começou. Quando a dominância cai (abaixo de 50%), o capital gira para altcoins, historicamente associado à "temporada alt".',
      'tr' => 'Bitcoin\\u2019in piyasa değeri dominansını, daha geniş alt döngü konumunun bir vekili olarak izler. BTC dominansı yüksek olduğunda (%55+) sermaye Bitcoin\\u2019de yoğunlaşır ve altcoinler genellikle daha az getiri sağlar — çoğu zaman alt döngüsünün henüz başlamadığının işaretidir. Dominans düştüğünde (%50 altı) sermaye altcoinlere döner; bu tarihsel olarak "alt sezonu" ile ilişkilendirilir.',
      'vi' => 'Theo dõi mức thống trị vốn hóa của Bitcoin như một chỉ báo về vị trí của chu kỳ alt rộng hơn. Khi thống trị BTC cao (55%+), vốn tập trung vào Bitcoin và altcoin có xu hướng kém hơn — thường là dấu hiệu chu kỳ alt chưa bắt đầu. Khi thống trị giảm (dưới 50%), vốn xoay sang altcoin, về mặt lịch sử gắn với "mùa alt".',
    ],
  ],
  'altcoin-valuation' => [
    'category' => 'altcoin',
    'name' => [
      'ko' => '가격 vs 추정 실현가 (200주 MA)',
      'en' => 'Price vs Est. Realized (200W MA)',
      'ja' => '価格 vs 推定実現価格 (200W MA)',
      'es' => 'Precio vs Realizado Est. (200W MA)',
      'de' => 'Preis vs. gesch. Realized (200W MA)',
      'fr' => 'Prix vs Réalisé Est. (MM 200S)',
      'pt' => 'Preço vs Realizado Est. (200W MA)',
      'tr' => 'Fiyat vs Tahmini Gerçekleşen (200H HO)',
      'vi' => 'Giá vs Giá Thực hiện Ước tính (MA 200T)',
    ],
    'desc' => [
      'ko' => '알트코인용 추정 밸류에이션 지표입니다. BTC/ETH/BNB와 달리 이 코인은 신뢰할 수 있는 온체인 MVRV Z-Score 데이터가 없어, 현재가 대비 추정 실현가를 대체 지표로 사용합니다.

⚠️ 중요: 이 코인의 추정 실현가는 실시간 온체인 데이터가 아니라 200주 이동평균(200W MA)으로 근사한 값입니다. 200주 MA는 온체인 실현가와 비슷하게 움직이는 널리 쓰이는 프록시지만, 정밀한 온체인 실현가와는 다릅니다. 방향성 참고용으로만 활용하세요.

추정 실현가(200주 MA) 이하 = 저평가 가능 구간.',
      'en' => 'Estimated valuation indicator for altcoins. Unlike BTC/ETH/BNB, this coin does not have reliable on-chain MVRV Z-Score data available, so we use price vs. an estimated realized price as a proxy.

⚠️ Important: the estimated realized price for this coin is approximated using the 200-week moving average (200W MA), not live on-chain data. The 200W MA is a widely-used proxy that tracks on-chain realized price closely, but differs from precise on-chain data. Use as a directional signal only.

Below estimated realized price = potential undervaluation zone.',
      'ja' => 'アルトコイン向けの推定バリュエーション指標です。BTC/ETH/BNBと異なり、このコインには信頼できるオンチェーンMVRV Zスコアデータがないため、現在価格と推定実現価格の比較を代替指標として使用します。

⚠️ 重要: このコインの推定実現価格はリアルタイムのオンチェーンデータではなく、200週移動平均(200W MA)で近似した値です。200W MAはオンチェーン実現価格に近い動きをする広く使われるプロキシですが、精密なオンチェーンデータとは異なります。方向性の参考としてのみ活用してください。

推定実現価格以下 = 割安の可能性がある水準。',
      'es' => 'Indicador de valoración estimado para altcoins. A diferencia de BTC/ETH/BNB, esta moneda no tiene datos confiables de MVRV Z-Score on-chain disponibles, por lo que usamos precio vs. un precio realizado estimado como proxy.

⚠️ Importante: el precio realizado estimado de esta moneda se aproxima con la media móvil de 200 semanas (200W MA), no con datos on-chain en vivo. La 200W MA es un proxy ampliamente usado que sigue de cerca el precio realizado on-chain, pero difiere de los datos precisos. Úselo solo como señal direccional.

Por debajo del precio realizado estimado = posible zona de infravaloración.',
      'de' => 'Geschätzter Bewertungsindikator für Altcoins. Anders als bei BTC/ETH/BNB liegen für diesen Coin keine verlässlichen On-Chain-MVRV-Z-Score-Daten vor, daher nutzen wir Preis vs. geschätzten Realized Price als Proxy.

⚠️ Wichtig: Der geschätzte Realized Price dieses Coins wird über den 200-Wochen-Durchschnitt (200W MA) approximiert, nicht über Live-On-Chain-Daten. Der 200W MA ist ein weit verbreiteter Proxy, der dem On-Chain-Realized-Price nahe folgt, sich aber von präzisen Daten unterscheidet. Nur als Richtungssignal nutzen.

Unter geschätztem Realized Price = mögliche Unterbewertungszone.',
      'fr' => 'Indicateur de valorisation estimé pour les altcoins. Contrairement à BTC/ETH/BNB, cette crypto n\'a pas de données MVRV Z-Score on-chain fiables disponibles, nous utilisons donc le prix vs un prix réalisé estimé comme approximation.

⚠️ Important : le prix réalisé estimé de cette crypto est approximé par la moyenne mobile sur 200 semaines (MM 200S), et non par des données on-chain en direct. La MM 200S est une approximation largement utilisée qui suit de près le prix réalisé on-chain, mais diffère des données précises. À utiliser uniquement comme signal directionnel.

Sous le prix réalisé estimé = zone de sous-valorisation possible.',
      'pt' => 'Indicador de valorização estimado para altcoins. Diferente de BTC/ETH/BNB, esta moeda não tem dados confiáveis de MVRV Z-Score on-chain disponíveis, por isso usamos preço vs. um preço realizado estimado como proxy.

⚠️ Importante: o preço realizado estimado desta moeda é aproximado pela média móvel de 200 semanas (200W MA), não por dados on-chain ao vivo. A 200W MA é um proxy amplamente usado que segue de perto o preço realizado on-chain, mas difere dos dados precisos. Use apenas como sinal direcional.

Abaixo do preço realizado estimado = possível zona de subvalorização.',
      'tr' => 'Altcoinler için tahmini değerleme göstergesi. BTC/ETH/BNB\\u2019nin aksine, bu coinin güvenilir zincir üstü MVRV Z-Score verisi yoktur, bu yüzden vekil olarak fiyat vs. tahmini gerçekleşen fiyat kullanırız.

⚠️ Önemli: bu coinin tahmini gerçekleşen fiyatı, canlı zincir üstü veriyle değil 200 haftalık hareketli ortalama (200H HO) ile yaklaşık hesaplanır. 200H HO, zincir üstü gerçekleşen fiyatı yakından takip eden yaygın bir vekildir ama kesin veriden farklıdır. Yalnızca yönsel sinyal olarak kullanın.

Tahmini gerçekleşen fiyatın altında = olası düşük değerleme bölgesi.',
      'vi' => 'Chỉ báo định giá ước tính cho altcoin. Khác với BTC/ETH/BNB, đồng này không có dữ liệu MVRV Z-Score on-chain đáng tin cậy, nên chúng tôi dùng giá vs. giá thực hiện ước tính làm chỉ báo thay thế.

⚠️ Quan trọng: giá thực hiện ước tính của đồng này được xấp xỉ bằng trung bình động 200 tuần (MA 200T), không phải dữ liệu on-chain trực tiếp. MA 200T là chỉ báo thay thế được dùng rộng rãi, bám sát giá thực hiện on-chain nhưng khác với dữ liệu chính xác. Chỉ dùng như tín hiệu định hướng.

Dưới giá thực hiện ước tính = vùng có thể bị định giá thấp.',
    ],
  ],
  'altcoin-drawdown' => [
    'category' => 'altcoin',
    'name' => [
      'ko' => 'ATH 대비 낙폭',
      'en' => 'ATH Drawdown',
      'ja' => 'ATH比下落率',
      'es' => 'Caída desde ATH',
      'de' => 'ATH-Drawdown',
      'fr' => 'Baisse depuis l\\\'ATH',
      'pt' => 'Queda desde ATH',
      'tr' => 'ATH\\u2019den Düşüş',
      'vi' => 'Sụt giảm từ ATH',
    ],
    'desc' => [
      'ko' => '온체인 손익 데이터가 부족한 알트코인에서 NUPL 대체 지표로 사용하는 ATH(역대 최고가) 대비 낙폭입니다.

주요 알트코인은 역사적으로 ATH 대비 70% 이상 하락 시 사이클 저점과 겹치는 경우가 많았으나, 코인별 편차가 클 수 있습니다.',
      'en' => 'Distance from all-time high (ATH), used as a substitute for NUPL on altcoins without reliable on-chain profit/loss data.

Deep drawdowns (70%+) from ATH have historically coincided with cycle bottoms for major altcoins, though this varies significantly by coin.',
      'ja' => 'オンチェーンの損益データが不足しているアルトコインでNUPLの代替指標として使用する、ATH(史上最高値)からの下落率です。

主要アルトコインは歴史的にATH比70%以上の下落でサイクル底値と重なることが多いですが、コインごとの差が大きい場合があります。',
      'es' => 'Distancia desde el máximo histórico (ATH), usado como sustituto de NUPL en altcoins sin datos confiables de ganancia/pérdida on-chain.

Las caídas profundas (70%+) desde el ATH han coincidido históricamente con suelos de ciclo para altcoins principales, aunque esto varía significativamente según la moneda.',
      'de' => 'Abstand vom Allzeithoch (ATH), genutzt als Ersatz für NUPL bei Altcoins ohne verlässliche On-Chain-Gewinn/Verlust-Daten.

Tiefe Drawdowns (70%+) vom ATH fielen historisch mit Zyklustiefs bei großen Altcoins zusammen, variiert jedoch stark je nach Coin.',
      'fr' => 'Distance par rapport au plus haut historique (ATH), utilisée comme substitut du NUPL pour les altcoins sans données fiables de profit/perte on-chain.

Les baisses profondes (70%+) depuis l\'ATH ont historiquement coïncidé avec les creux de cycle des principaux altcoins, bien que cela varie fortement selon la crypto.',
      'pt' => 'Distância do máximo histórico (ATH), usada como substituto do NUPL em altcoins sem dados confiáveis de lucro/prejuízo on-chain.

Quedas profundas (70%+) desde o ATH coincidiram historicamente com fundos de ciclo para altcoins principais, embora isso varie significativamente conforme a moeda.',
      'tr' => 'Güvenilir zincir üstü kar/zarar verisi olmayan altcoinlerde NUPL yerine kullanılan, tüm zamanların en yüksek seviyesine (ATH) olan uzaklık.

ATH\\u2019den derin düşüşler (%70+) tarihsel olarak büyük altcoinler için döngü diplerine denk gelmiştir, ancak bu coine göre önemli ölçüde değişir.',
      'vi' => 'Khoảng cách từ mức cao nhất mọi thời đại (ATH), dùng thay cho NUPL ở các altcoin không có dữ liệu lãi/lỗ on-chain đáng tin cậy.

Các đợt sụt sâu (70%+) từ ATH về mặt lịch sử trùng với đáy chu kỳ của các altcoin lớn, tuy điều này khác biệt đáng kể tùy đồng.',
    ],
  ],
];