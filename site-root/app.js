// BTCtiming 메인 로직 — index.php에서 분리 (유지보수·캐싱)
// 의존: window.LANGS(lang.js), CATEGORY_LIST/LANG_META/SUPPORTED_LANG_CODES(index.php 인라인)
// 이 파일은 lang.js와 인라인 상수 뒤에 로드되어야 함.
// ═══════════════════════════════════════════════════════
// CONSTANTS & CONFIG
// ═══════════════════════════════════════════════════════
// 색상 팔레트 (CSS :root 변수와 동일한 값 — JS에서 style.color/background를 직접 찍을 때 사용)
const C = {
  green:'#4ade80', green2:'#86efac', green3:'#bbf7d0',
  yellow:'#fbbf24', orange:'#fb923c', red:'#f87171', blue:'#60a5fa',
};
// 블로그 카테고리 전체 목록(blog/_category_meta.php가 유일한 정답 소스). footer의
// "카테고리별 최신 글"이 4개 카테고리를 절대 빠짐없이 가져오기 위해 사용.


// 지표 카드의 signal(뱃지)/target(목표조건) 텍스트 번역 맵. 서버(score_calc.php)가 영어로만 내려주므로 클라이언트에서 번역.
const SIGNAL_MAP = {
  "Above": {"ko": "위", "en": "Above", "ja": "上", "es": "Por Encima", "de": "Darüber", "fr": "Au-dessus", "pt": "Acima", "tr": "Üzerinde", "vi": "Trên"},
  "Accumulating": {"ko": "매집 중", "en": "Accumulating", "ja": "蓄積中", "es": "Acumulando", "de": "Akkumulierend", "fr": "En accumulation", "pt": "Acumulando", "tr": "Biriktiriyor", "vi": "Đang tích lũy"},
  "Accumulation (Safe)": {"ko": "매집 구간 (안전)", "en": "Accumulation (Safe)", "ja": "蓄積ゾーン(安全)", "es": "Acumulación (Seguro)", "de": "Akkumulation (Sicher)", "fr": "Accumulation (Sûr)", "pt": "Acumulação (Seguro)", "tr": "Biriktirme (Güvenli)", "vi": "Tích lũy (An toàn)"},
  "Alt Season Risk": {"ko": "알트시즌 리스크", "en": "Alt Season Risk", "ja": "アルトシーズンリスク", "es": "Riesgo Temporada Alt", "de": "Alt-Season-Risiko", "fr": "Risque Saison Alt", "pt": "Risco Temporada Alt", "tr": "Alt Sezon Riski", "vi": "Rủi ro Mùa Alt"},
  "Alt Season": {"ko": "알트시즌", "en": "Alt Season", "ja": "アルトシーズン", "es": "Temporada Alt", "de": "Alt Season", "fr": "Saison Alt", "pt": "Temporada Alt", "tr": "Alt Sezon", "vi": "Mùa Alt"},
  "BTC Season (Safe)": {"ko": "BTC 시즌 (안전)", "en": "BTC Season (Safe)", "ja": "BTCシーズン(安全)", "es": "Temporada BTC (Seguro)", "de": "BTC-Season (Sicher)", "fr": "Saison BTC (Sûr)", "pt": "Temporada BTC (Seguro)", "tr": "BTC Sezonu (Güvenli)", "vi": "Mùa BTC (An toàn)"},
  "BTC Season": {"ko": "BTC 시즌", "en": "BTC Season", "ja": "BTCシーズン", "es": "Temporada BTC", "de": "BTC-Season", "fr": "Saison BTC", "pt": "Temporada BTC", "tr": "BTC Sezonu", "vi": "Mùa BTC"},
  "Backwardation (Safe)": {"ko": "백워데이션 (안전)", "en": "Backwardation (Safe)", "ja": "バックワーデーション(安全)", "es": "Backwardation (Seguro)", "de": "Backwardation (Sicher)", "fr": "Backwardation (Sûr)", "pt": "Backwardation (Seguro)", "tr": "Backwardation (Güvenli)", "vi": "Backwardation (An toàn)"},
  "Below Realized (Safe)": {"ko": "실현가 이하 (안전)", "en": "Below Realized (Safe)", "ja": "実現価格以下(安全)", "es": "Bajo Realizado (Seguro)", "de": "Unter Realized (Sicher)", "fr": "Sous le Réalisé (Sûr)", "pt": "Abaixo do Realizado (Seguro)", "tr": "Gerçekleşenin Altında (Güvenli)", "vi": "Dưới Thực hiện (An toàn)"},
  "Below Realized": {"ko": "실현가 이하", "en": "Below Realized", "ja": "実現価格以下", "es": "Bajo Realizado", "de": "Unter Realized", "fr": "Sous le Réalisé", "pt": "Abaixo do Realizado", "tr": "Gerçekleşenin Altında", "vi": "Dưới Thực hiện"},
  "Borderline": {"ko": "경계선", "en": "Borderline", "ja": "境界線", "es": "Límite", "de": "Grenzwertig", "fr": "Limite", "pt": "Limítrofe", "tr": "Sınırda", "vi": "Ranh giới"},
  "Buyer-led (Caution)": {"ko": "매수 주도 (주의)", "en": "Buyer-led (Caution)", "ja": "買い主導(注意)", "es": "Liderado por Compra (Precaución)", "de": "Käufergetrieben (Vorsicht)", "fr": "Mené par l'Achat (Prudence)", "pt": "Liderado por Compra (Cautela)", "tr": "Alım Öncülüğünde (Dikkat)", "vi": "Do Mua dẫn dắt (Thận trọng)"},
  "Capitulation": {"ko": "항복", "en": "Capitulation", "ja": "キャピチュレーション", "es": "Capitulación", "de": "Kapitulation", "fr": "Capitulation", "pt": "Capitulação", "tr": "Kapitülasyon", "vi": "Đầu hàng"},
  "Caution": {"ko": "주의", "en": "Caution", "ja": "注意", "es": "Precaución", "de": "Vorsicht", "fr": "Prudence", "pt": "Cautela", "tr": "Dikkat", "vi": "Thận trọng"},
  "Core Bottom Zone": {"ko": "핵심 저점 구간", "en": "Core Bottom Zone", "ja": "核心底値ゾーン", "es": "Zona Central de Suelo", "de": "Kern-Tiefzone", "fr": "Zone de Creux Central", "pt": "Zona Central de Fundo", "tr": "Çekirdek Dip Bölgesi", "vi": "Vùng Đáy Cốt lõi"},
  "Correction": {"ko": "조정", "en": "Correction", "ja": "調整", "es": "Corrección", "de": "Korrektur", "fr": "Correction", "pt": "Correção", "tr": "Düzeltme", "vi": "Điều chỉnh"},
  "Deep Correction": {"ko": "깊은 조정", "en": "Deep Correction", "ja": "深い調整", "es": "Corrección Profunda", "de": "Tiefe Korrektur", "fr": "Correction Profonde", "pt": "Correção Profunda", "tr": "Derin Düzeltme", "vi": "Điều chỉnh Sâu"},
  "Distribution": {"ko": "분산", "en": "Distribution", "ja": "分配", "es": "Distribución", "de": "Distribution", "fr": "Distribution", "pt": "Distribuição", "tr": "Dağıtım", "vi": "Phân phối"},
  "Elevated": {"ko": "상승", "en": "Elevated", "ja": "上昇", "es": "Elevado", "de": "Erhöht", "fr": "Élevé", "pt": "Elevado", "tr": "Yükselmiş", "vi": "Tăng cao"},
  "Euphoria": {"ko": "도취", "en": "Euphoria", "ja": "陶酔", "es": "Euforia", "de": "Euphorie", "fr": "Euphorie", "pt": "Euforia", "tr": "Öfori", "vi": "Hưng phấn"},
  "FOMO Buying": {"ko": "FOMO 매수", "en": "FOMO Buying", "ja": "FOMO買い", "es": "Compra por FOMO", "de": "FOMO-Kauf", "fr": "Achat FOMO", "pt": "Compra por FOMO", "tr": "FOMO Alımı", "vi": "Mua theo FOMO"},
  "Far (Safe)": {"ko": "멀음 (안전)", "en": "Far (Safe)", "ja": "遠い(安全)", "es": "Lejos (Seguro)", "de": "Weit (Sicher)", "fr": "Loin (Sûr)", "pt": "Longe (Seguro)", "tr": "Uzak (Güvenli)", "vi": "Xa (An toàn)"},
  "Far from ATH (Safe)": {"ko": "ATH와 멀음 (안전)", "en": "Far from ATH (Safe)", "ja": "ATHから遠い(安全)", "es": "Lejos del ATH (Seguro)", "de": "Weit vom ATH (Sicher)", "fr": "Loin de l'ATH (Sûr)", "pt": "Longe do ATH (Seguro)", "tr": "ATH'den Uzak (Güvenli)", "vi": "Xa ATH (An toàn)"},
  "Fear (Safe)": {"ko": "공포 (안전)", "en": "Fear (Safe)", "ja": "恐怖(安全)", "es": "Miedo (Seguro)", "de": "Angst (Sicher)", "fr": "Peur (Sûr)", "pt": "Medo (Seguro)", "tr": "Korku (Güvenli)", "vi": "Sợ hãi (An toàn)"},
  "Fear": {"ko": "공포", "en": "Fear", "ja": "恐怖", "es": "Miedo", "de": "Angst", "fr": "Peur", "pt": "Medo", "tr": "Korku", "vi": "Sợ hãi"},
  "General": {"ko": "일반", "en": "General", "ja": "一般", "es": "General", "de": "Allgemein", "fr": "Général", "pt": "Geral", "tr": "Genel", "vi": "Chung"},
  "High": {"ko": "높음", "en": "High", "ja": "高い", "es": "Alto", "de": "Hoch", "fr": "Élevé", "pt": "Alto", "tr": "Yüksek", "vi": "Cao"},
  "Highly Correlated": {"ko": "높은 상관관계", "en": "Highly Correlated", "ja": "高い相関", "es": "Muy Correlacionado", "de": "Stark Korreliert", "fr": "Fortement Corrélé", "pt": "Altamente Correlacionado", "tr": "Yüksek Korelasyonlu", "vi": "Tương quan Cao"},
  "Hope Bottom": {"ko": "희망 저점", "en": "Hope Bottom", "ja": "希望底値", "es": "Esperanza de Suelo", "de": "Hoffnung Boden", "fr": "Creux d'Espoir", "pt": "Fundo de Esperança", "tr": "Umut Dibi", "vi": "Đáy Hy vọng"},
  "Hope": {"ko": "희망", "en": "Hope", "ja": "希望", "es": "Esperanza", "de": "Hoffnung", "fr": "Espoir", "pt": "Esperança", "tr": "Umut", "vi": "Hy vọng"},
  "Ideal": {"ko": "이상적", "en": "Ideal", "ja": "理想的", "es": "Ideal", "de": "Ideal", "fr": "Idéal", "pt": "Ideal", "tr": "İdeal", "vi": "Lý tưởng"},
  "Independent": {"ko": "독립적", "en": "Independent", "ja": "独立的", "es": "Independiente", "de": "Unabhängig", "fr": "Indépendant", "pt": "Independente", "tr": "Bağımsız", "vi": "Độc lập"},
  "Institutional FOMO": {"ko": "기관 FOMO", "en": "Institutional FOMO", "ja": "機関FOMO", "es": "FOMO Institucional", "de": "Institutionelles FOMO", "fr": "FOMO Institutionnel", "pt": "FOMO Institucional", "tr": "Kurumsal FOMO", "vi": "FOMO Tổ chức"},
  "Long Overload": {"ko": "롱 과부하", "en": "Long Overload", "ja": "ロング過負荷", "es": "Sobrecarga de Largos", "de": "Long-Überlastung", "fr": "Surcharge de Longs", "pt": "Sobrecarga de Longs", "tr": "Long Aşırı Yük", "vi": "Quá tải Long"},
  "Loss (Safe)": {"ko": "손실 (안전)", "en": "Loss (Safe)", "ja": "損失(安全)", "es": "Pérdida (Seguro)", "de": "Verlust (Sicher)", "fr": "Perte (Sûr)", "pt": "Prejuízo (Seguro)", "tr": "Zarar (Güvenli)", "vi": "Lỗ (An toàn)"},
  "Low (Safe)": {"ko": "낮음 (안전)", "en": "Low (Safe)", "ja": "低い(安全)", "es": "Bajo (Seguro)", "de": "Niedrig (Sicher)", "fr": "Bas (Sûr)", "pt": "Baixo (Seguro)", "tr": "Düşük (Güvenli)", "vi": "Thấp (An toàn)"},
  "Mid Range": {"ko": "중간 구간", "en": "Mid Range", "ja": "中間レンジ", "es": "Rango Medio", "de": "Mittlerer Bereich", "fr": "Fourchette Moyenne", "pt": "Faixa Média", "tr": "Orta Aralık", "vi": "Khoảng Giữa"},
  "Mild Buying": {"ko": "약한 매수", "en": "Mild Buying", "ja": "弱い買い", "es": "Compra Leve", "de": "Leichter Kauf", "fr": "Achat Léger", "pt": "Compra Leve", "tr": "Hafif Alım", "vi": "Mua Nhẹ"},
  "Mild Premium": {"ko": "약한 프리미엄", "en": "Mild Premium", "ja": "弱いプレミアム", "es": "Prima Leve", "de": "Leichte Prämie", "fr": "Prime Légère", "pt": "Prêmio Leve", "tr": "Hafif Prim", "vi": "Phần bù Nhẹ"},
  "Mild Profit": {"ko": "약한 수익", "en": "Mild Profit", "ja": "弱い利益", "es": "Ganancia Leve", "de": "Leichter Gewinn", "fr": "Profit Léger", "pt": "Lucro Leve", "tr": "Hafif Kar", "vi": "Lãi Nhẹ"},
  "Mild Selling": {"ko": "약한 매도", "en": "Mild Selling", "ja": "弱い売り", "es": "Venta Leve", "de": "Leichter Verkauf", "fr": "Vente Légère", "pt": "Venda Leve", "tr": "Hafif Satış", "vi": "Bán Nhẹ"},
  "Mild": {"ko": "약함", "en": "Mild", "ja": "弱い", "es": "Leve", "de": "Leicht", "fr": "Léger", "pt": "Leve", "tr": "Hafif", "vi": "Nhẹ"},
  "Moderate": {"ko": "보통", "en": "Moderate", "ja": "中程度", "es": "Moderado", "de": "Moderat", "fr": "Modéré", "pt": "Moderado", "tr": "Orta", "vi": "Vừa phải"},
  "Near ATH": {"ko": "ATH 근접", "en": "Near ATH", "ja": "ATH近接", "es": "Cerca del ATH", "de": "Nahe ATH", "fr": "Proche de l'ATH", "pt": "Perto do ATH", "tr": "ATH'ye Yakın", "vi": "Gần ATH"},
  "Near Bottom": {"ko": "저점 근접", "en": "Near Bottom", "ja": "底値近接", "es": "Cerca del Suelo", "de": "Nahe Boden", "fr": "Proche du Creux", "pt": "Perto do Fundo", "tr": "Dibe Yakın", "vi": "Gần Đáy"},
  "Neutral": {"ko": "중립", "en": "Neutral", "ja": "中立", "es": "Neutral", "de": "Neutral", "fr": "Neutre", "pt": "Neutro", "tr": "Nötr", "vi": "Trung lập"},
  "Normal": {"ko": "정상", "en": "Normal", "ja": "正常", "es": "Normal", "de": "Normal", "fr": "Normal", "pt": "Normal", "tr": "Normal", "vi": "Bình thường"},
  "Optimism": {"ko": "낙관", "en": "Optimism", "ja": "楽観", "es": "Optimismo", "de": "Optimismus", "fr": "Optimisme", "pt": "Otimismo", "tr": "İyimserlik", "vi": "Lạc quan"},
  "Out of Range": {"ko": "범위 밖", "en": "Out of Range", "ja": "範囲外", "es": "Fuera de Rango", "de": "Außerhalb des Bereichs", "fr": "Hors Fourchette", "pt": "Fora da Faixa", "tr": "Aralık Dışı", "vi": "Ngoài Khoảng"},
  "Overbought (Top)": {"ko": "과매수 (고점)", "en": "Overbought (Top)", "ja": "買われすぎ(天井)", "es": "Sobrecompra (Techo)", "de": "Überkauft (Top)", "fr": "Suracheté (Sommet)", "pt": "Sobrecompra (Topo)", "tr": "Aşırı Alım (Tepe)", "vi": "Quá mua (Đỉnh)"},
  "Overbought": {"ko": "과매수", "en": "Overbought", "ja": "買われすぎ", "es": "Sobrecompra", "de": "Überkauft", "fr": "Suracheté", "pt": "Sobrecompra", "tr": "Aşırı Alım", "vi": "Quá mua"},
  "Overheated": {"ko": "과열", "en": "Overheated", "ja": "過熱", "es": "Sobrecalentado", "de": "Überhitzt", "fr": "En Surchauffe", "pt": "Sobreaquecido", "tr": "Aşırı Isınmış", "vi": "Quá nóng"},
  "Oversold (Bottom)": {"ko": "과매도 (저점)", "en": "Oversold (Bottom)", "ja": "売られすぎ(底値)", "es": "Sobreventa (Suelo)", "de": "Überverkauft (Boden)", "fr": "Survendu (Creux)", "pt": "Sobrevenda (Fundo)", "tr": "Aşırı Satım (Dip)", "vi": "Quá bán (Đáy)"},
  "Oversold": {"ko": "과매도", "en": "Oversold", "ja": "売られすぎ", "es": "Sobreventa", "de": "Überverkauft", "fr": "Survendu", "pt": "Sobrevenda", "tr": "Aşırı Satım", "vi": "Quá bán"},
  "Overvalued": {"ko": "고평가", "en": "Overvalued", "ja": "過大評価", "es": "Sobrevalorado", "de": "Überbewertet", "fr": "Survalorisé", "pt": "Sobrevalorizado", "tr": "Aşırı Değerli", "vi": "Định giá cao"},
  "Past Peak": {"ko": "고점 지남", "en": "Past Peak", "ja": "ピーク超過", "es": "Pasado el Pico", "de": "Über dem Höhepunkt", "fr": "Sommet Dépassé", "pt": "Após o Pico", "tr": "Zirveyi Geçmiş", "vi": "Qua Đỉnh"},
  "Peak Zone": {"ko": "고점 구간", "en": "Peak Zone", "ja": "ピークゾーン", "es": "Zona de Pico", "de": "Höchststand-Zone", "fr": "Zone de Sommet", "pt": "Zona de Pico", "tr": "Zirve Bölgesi", "vi": "Vùng Đỉnh"},
  "Record Accumulation": {"ko": "역대급 매집", "en": "Record Accumulation", "ja": "記録的な蓄積", "es": "Acumulación Récord", "de": "Rekord-Akkumulation", "fr": "Accumulation Record", "pt": "Acumulação Recorde", "tr": "Rekor Biriktirme", "vi": "Tích lũy Kỷ lục"},
  "Rising/Bottom": {"ko": "상승/저점", "en": "Rising/Bottom", "ja": "上昇/底値", "es": "Subiendo/Suelo", "de": "Steigend/Boden", "fr": "En Hausse/Creux", "pt": "Subindo/Fundo", "tr": "Yükseliyor/Dip", "vi": "Tăng/Đáy"},
  "Seller-led (Safe)": {"ko": "매도 주도 (안전)", "en": "Seller-led (Safe)", "ja": "売り主導(安全)", "es": "Liderado por Venta (Seguro)", "de": "Verkäufergetrieben (Sicher)", "fr": "Mené par la Vente (Sûr)", "pt": "Liderado por Venda (Seguro)", "tr": "Satış Öncülüğünde (Güvenli)", "vi": "Do Bán dẫn dắt (An toàn)"},
  "Sideline (Safe)": {"ko": "관망 (안전)", "en": "Sideline (Safe)", "ja": "様子見(安全)", "es": "Al Margen (Seguro)", "de": "Abseits (Sicher)", "fr": "En Retrait (Sûr)", "pt": "À Margem (Seguro)", "tr": "Kenarda (Güvenli)", "vi": "Đứng ngoài (An toàn)"},
  "Strong": {"ko": "강함", "en": "Strong", "ja": "強い", "es": "Fuerte", "de": "Stark", "fr": "Fort", "pt": "Forte", "tr": "Güçlü", "vi": "Mạnh"},
  "Target Zone": {"ko": "목표 구간", "en": "Target Zone", "ja": "目標ゾーン", "es": "Zona Objetivo", "de": "Zielzone", "fr": "Zone Cible", "pt": "Zona Alvo", "tr": "Hedef Bölge", "vi": "Vùng Mục tiêu"},
  "Transitioning": {"ko": "전환 중", "en": "Transitioning", "ja": "転換中", "es": "Transición", "de": "Übergang", "fr": "En Transition", "pt": "Em Transição", "tr": "Geçiş Halinde", "vi": "Đang chuyển tiếp"},
  "Volume Dry-up": {"ko": "거래량 고갈", "en": "Volume Dry-up", "ja": "出来高枯渇", "es": "Volumen Agotado", "de": "Volumen versiegt", "fr": "Volume Asséché", "pt": "Volume Esgotado", "tr": "Hacim Kuruması", "vi": "Cạn Khối lượng"},
  "Volume Spike": {"ko": "거래량 급증", "en": "Volume Spike", "ja": "出来高急増", "es": "Pico de Volumen", "de": "Volumenspike", "fr": "Pic de Volume", "pt": "Pico de Volume", "tr": "Hacim Sıçraması", "vi": "Đột biến Khối lượng"},
  "Weak": {"ko": "약함", "en": "Weak", "ja": "弱い", "es": "Débil", "de": "Schwach", "fr": "Faible", "pt": "Fraco", "tr": "Zayıf", "vi": "Yếu"},
};
const TARGET_MAP = {
  "12~24mo before = bottom zone": {"ko": "반감기 12~24개월 전 = 저점 구간", "en": "12~24mo before = bottom zone", "ja": "半減期12〜24ヶ月前 = 底値ゾーン", "es": "12-24 meses antes = zona de suelo", "de": "12-24 Monate vorher = Tiefzone", "fr": "12-24 mois avant = zone de creux", "pt": "12-24 meses antes = zona de fundo", "tr": "Yarılanmadan 12-24 ay önce = dip bölgesi", "vi": "12~24 tháng trước = vùng đáy"},
  "55~63% BTC season": {"ko": "55~63% BTC 시즌", "en": "55~63% BTC season", "ja": "55~63% BTCシーズン", "es": "55-63% temporada BTC", "de": "55-63% BTC-Season", "fr": "55-63% saison BTC", "pt": "55-63% temporada BTC", "tr": "55-63% BTC sezonu", "vi": "55~63% mùa BTC"},
  "Alt season ≤ 50%": {"ko": "알트시즌 ≤ 50%", "en": "Alt season ≤ 50%", "ja": "アルトシーズン ≤ 50%", "es": "Temporada alt ≤ 50%", "de": "Alt-Season ≤ 50%", "fr": "Saison alt ≤ 50%", "pt": "Temporada alt ≤ 50%", "tr": "Alt sezon ≤ 50%", "vi": "Mùa alt ≤ 50%"},
  "Backwardation = short squeeze signal": {"ko": "백워데이션 = 숏스퀴즈 신호", "en": "Backwardation = short squeeze signal", "ja": "バックワーデーション = ショートスクイーズシグナル", "es": "Backwardation = señal de short squeeze", "de": "Backwardation = Short-Squeeze-Signal", "fr": "Backwardation = signal de short squeeze", "pt": "Backwardation = sinal de short squeeze", "tr": "Backwardation = short squeeze sinyali", "vi": "Backwardation = tín hiệu short squeeze"},
  "Below estimated realized price": {"ko": "추정 실현가 이하", "en": "Below estimated realized price", "ja": "推定実現価格以下", "es": "Bajo el precio realizado estimado", "de": "Unter geschätztem Realized Price", "fr": "Sous le prix réalisé estimé", "pt": "Abaixo do preço realizado estimado", "tr": "Tahmini gerçekleşen fiyatın altında", "vi": "Dưới giá thực hiện ước tính"},
  "Bottom zone ≤ 0": {"ko": "저점 구간 ≤ 0", "en": "Bottom zone ≤ 0", "ja": "底値ゾーン ≤ 0", "es": "Zona de suelo ≤ 0", "de": "Tiefzone ≤ 0", "fr": "Zone de creux ≤ 0", "pt": "Zona de fundo ≤ 0", "tr": "Dip bölgesi ≤ 0", "vi": "Vùng đáy ≤ 0"},
  "Buy ratio ≥ 65% + volume spike + green candle (last 15m)": {"ko": "매수 비율 ≥ 65% + 거래량 급증 + 양봉 (최근 15분)", "en": "Buy ratio ≥ 65% + volume spike + green candle (last 15m)", "ja": "買い比率 ≥ 65% + 出来高急増 + 陽線(直近15分)", "es": "Ratio de compra ≥ 65% + pico de volumen + vela verde (últimos 15m)", "de": "Kaufquote ≥ 65% + Volumenspike + grüne Kerze (letzte 15m)", "fr": "Ratio d'achat ≥ 65% + pic de volume + bougie verte (15 dernières min)", "pt": "Proporção de compra ≥ 65% + pico de volume + vela verde (últimos 15m)", "tr": "Alım oranı ≥ 65% + hacim sıçraması + yeşil mum (son 15d)", "vi": "Tỷ lệ mua ≥ 65% + đột biến khối lượng + nến xanh (15p qua)"},
  "Capitulation ≤0.95": {"ko": "항복 ≤0.95", "en": "Capitulation ≤0.95", "ja": "キャピチュレーション ≤0.95", "es": "Capitulación ≤0.95", "de": "Kapitulation ≤0,95", "fr": "Capitulation ≤0,95", "pt": "Capitulação ≤0,95", "tr": "Kapitülasyon ≤0,95", "vi": "Đầu hàng ≤0,95"},
  "Fear zone ≤ 0%": {"ko": "공포 구간 ≤ 0%", "en": "Fear zone ≤ 0%", "ja": "恐怖ゾーン ≤ 0%", "es": "Zona de miedo ≤ 0%", "de": "Angstzone ≤ 0%", "fr": "Zone de peur ≤ 0%", "pt": "Zona de medo ≤ 0%", "tr": "Korku bölgesi ≤ 0%", "vi": "Vùng sợ hãi ≤ 0%"},
  "High correlation = follows BTC weakness": {"ko": "높은 상관관계 = BTC 약세 추종", "en": "High correlation = follows BTC weakness", "ja": "高い相関 = BTCの弱さに追従", "es": "Alta correlación = sigue la debilidad de BTC", "de": "Hohe Korrelation = folgt BTC-Schwäche", "fr": "Forte corrélation = suit la faiblesse du BTC", "pt": "Alta correlação = segue a fraqueza do BTC", "tr": "Yüksek korelasyon = BTC zayıflığını izler", "vi": "Tương quan cao = theo điểm yếu BTC"},
  "High dominance = strong network": {"ko": "높은 도미넌스 = 강한 네트워크", "en": "High dominance = strong network", "ja": "高いドミナンス = 強いネットワーク", "es": "Alta dominancia = red fuerte", "de": "Hohe Dominanz = starkes Netzwerk", "fr": "Forte dominance = réseau solide", "pt": "Alta dominância = rede forte", "tr": "Yüksek dominans = güçlü ağ", "vi": "Thống trị cao = mạng mạnh"},
  "Low correlation = independent strength": {"ko": "낮은 상관관계 = 독자적 강세", "en": "Low correlation = independent strength", "ja": "低い相関 = 独自の強さ", "es": "Baja correlación = fortaleza independiente", "de": "Niedrige Korrelation = unabhängige Stärke", "fr": "Faible corrélation = force indépendante", "pt": "Baixa correlação = força independente", "tr": "Düşük korelasyon = bağımsız güç", "vi": "Tương quan thấp = sức mạnh độc lập"},
  "Overbought ≥ 70": {"ko": "과매수 ≥ 70", "en": "Overbought ≥ 70", "ja": "買われすぎ ≥ 70", "es": "Sobrecompra ≥ 70", "de": "Überkauft ≥ 70", "fr": "Suracheté ≥ 70", "pt": "Sobrecompra ≥ 70", "tr": "Aşırı alım ≥ 70", "vi": "Quá mua ≥ 70"},
  "Oversold ≤ 30": {"ko": "과매도 ≤ 30", "en": "Oversold ≤ 30", "ja": "売られすぎ ≤ 30", "es": "Sobreventa ≤ 30", "de": "Überverkauft ≤ 30", "fr": "Survendu ≤ 30", "pt": "Sobrevenda ≤ 30", "tr": "Aşırı satım ≤ 30", "vi": "Quá bán ≤ 30"},
  "Positive = institutional re-entry": {"ko": "양수 = 기관 재진입", "en": "Positive = institutional re-entry", "ja": "プラス = 機関再参入", "es": "Positivo = reingreso institucional", "de": "Positiv = institutioneller Wiedereinstieg", "fr": "Positif = réentrée institutionnelle", "pt": "Positivo = reentrada institucional", "tr": "Pozitif = kurumsal yeniden giriş", "vi": "Dương = tổ chức quay lại"},
  "Recovery cross (30MA>60MA)": {"ko": "회복 전환 (30MA>60MA)", "en": "Recovery cross (30MA>60MA)", "ja": "回復転換 (30MA>60MA)", "es": "Cruce de recuperación (30MA>60MA)", "de": "Erholungscross (30MA>60MA)", "fr": "Croisement de reprise (30MM>60MM)", "pt": "Cruzamento de recuperação (30MA>60MA)", "tr": "Toparlanma kesişimi (30HO>60HO)", "vi": "Giao cắt phục hồi (30MA>60MA)"},
  "SHORT optimal: 12–18 months after halving": {"ko": "숏 최적: 반감기 후 12~18개월", "en": "SHORT optimal: 12–18 months after halving", "ja": "ショート最適: 半減期後12〜18ヶ月", "es": "Óptimo CORTO: 12-18 meses tras el halving", "de": "SHORT optimal: 12-18 Monate nach Halving", "fr": "SHORT optimal : 12-18 mois après le halving", "pt": "SHORT ótimo: 12-18 meses após o halving", "tr": "SHORT optimal: yarılanmadan 12-18 ay sonra", "vi": "SHORT tối ưu: 12-18 tháng sau halving"},
  "SHORT zone > -20%": {"ko": "숏 구간 > -20%", "en": "SHORT zone > -20%", "ja": "ショートゾーン > -20%", "es": "Zona CORTO > -20%", "de": "SHORT-Zone > -20%", "fr": "Zone SHORT > -20%", "pt": "Zona SHORT > -20%", "tr": "SHORT bölgesi > -20%", "vi": "Vùng SHORT > -20%"},
  "SHORT zone ≤ 50%": {"ko": "숏 구간 ≤ 50%", "en": "SHORT zone ≤ 50%", "ja": "ショートゾーン ≤ 50%", "es": "Zona CORTO ≤ 50%", "de": "SHORT-Zone ≤ 50%", "fr": "Zone SHORT ≤ 50%", "pt": "Zona SHORT ≤ 50%", "tr": "SHORT bölgesi ≤ 50%", "vi": "Vùng SHORT ≤ 50%"},
  "SHORT zone ≤ 70%": {"ko": "숏 구간 ≤ 70%", "en": "SHORT zone ≤ 70%", "ja": "ショートゾーン ≤ 70%", "es": "Zona CORTO ≤ 70%", "de": "SHORT-Zone ≤ 70%", "fr": "Zone SHORT ≤ 70%", "pt": "Zona SHORT ≤ 70%", "tr": "SHORT bölgesi ≤ 70%", "vi": "Vùng SHORT ≤ 70%"},
  "SHORT zone ≥ 0.10%": {"ko": "숏 구간 ≥ 0.10%", "en": "SHORT zone ≥ 0.10%", "ja": "ショートゾーン ≥ 0.10%", "es": "Zona CORTO ≥ 0.10%", "de": "SHORT-Zone ≥ 0,10%", "fr": "Zone SHORT ≥ 0,10%", "pt": "Zona SHORT ≥ 0,10%", "tr": "SHORT bölgesi ≥ 0,10%", "vi": "Vùng SHORT ≥ 0,10%"},
  "SHORT zone ≥ 0.15%": {"ko": "숏 구간 ≥ 0.15%", "en": "SHORT zone ≥ 0.15%", "ja": "ショートゾーン ≥ 0.15%", "es": "Zona CORTO ≥ 0.15%", "de": "SHORT-Zone ≥ 0,15%", "fr": "Zone SHORT ≥ 0,15%", "pt": "Zona SHORT ≥ 0,15%", "tr": "SHORT bölgesi ≥ 0,15%", "vi": "Vùng SHORT ≥ 0,15%"},
  "SHORT zone ≥ 1.04": {"ko": "숏 구간 ≥ 1.04", "en": "SHORT zone ≥ 1.04", "ja": "ショートゾーン ≥ 1.04", "es": "Zona CORTO ≥ 1.04", "de": "SHORT-Zone ≥ 1,04", "fr": "Zone SHORT ≥ 1,04", "pt": "Zona SHORT ≥ 1,04", "tr": "SHORT bölgesi ≥ 1,04", "vi": "Vùng SHORT ≥ 1,04"},
  "SHORT zone ≥ 20% above realized": {"ko": "숏 구간: 실현가 대비 20% 이상", "en": "SHORT zone ≥ 20% above realized", "ja": "ショートゾーン: 実現価格比20%以上", "es": "Zona CORTO: 20% o más sobre el realizado", "de": "SHORT-Zone: 20%+ über Realized", "fr": "Zone SHORT : 20%+ au-dessus du réalisé", "pt": "Zona SHORT: 20% ou mais acima do realizado", "tr": "SHORT bölgesi: gerçekleşenin %20+ üstünde", "vi": "Vùng SHORT: 20%+ trên thực hiện"},
  "SHORT zone ≥ 3.5": {"ko": "숏 구간 ≥ 3.5", "en": "SHORT zone ≥ 3.5", "ja": "ショートゾーン ≥ 3.5", "es": "Zona CORTO ≥ 3.5", "de": "SHORT-Zone ≥ 3,5", "fr": "Zone SHORT ≥ 3,5", "pt": "Zona SHORT ≥ 3,5", "tr": "SHORT bölgesi ≥ 3,5", "vi": "Vùng SHORT ≥ 3,5"},
  "SHORT zone ≥ 60%": {"ko": "숏 구간 ≥ 60%", "en": "SHORT zone ≥ 60%", "ja": "ショートゾーン ≥ 60%", "es": "Zona CORTO ≥ 60%", "de": "SHORT-Zone ≥ 60%", "fr": "Zone SHORT ≥ 60%", "pt": "Zona SHORT ≥ 60%", "tr": "SHORT bölgesi ≥ 60%", "vi": "Vùng SHORT ≥ 60%"},
  "SHORT zone: within -15% of ATH": {"ko": "숏 구간: ATH 대비 -15% 이내", "en": "SHORT zone: within -15% of ATH", "ja": "ショートゾーン: ATH比-15%以内", "es": "Zona CORTO: dentro de -15% del ATH", "de": "SHORT-Zone: innerhalb -15% vom ATH", "fr": "Zone SHORT : à moins de -15% de l'ATH", "pt": "Zona SHORT: dentro de -15% do ATH", "tr": "SHORT bölgesi: ATH'nin -15% içinde", "vi": "Vùng SHORT: trong -15% của ATH"},
  "Sell ratio ≥ 58% + volume spike + red candle (last 15m)": {"ko": "매도 비율 ≥ 58% + 거래량 급증 + 음봉 (최근 15분)", "en": "Sell ratio ≥ 58% + volume spike + red candle (last 15m)", "ja": "売り比率 ≥ 58% + 出来高急増 + 陰線(直近15分)", "es": "Ratio de venta ≥ 58% + pico de volumen + vela roja (últimos 15m)", "de": "Verkaufsquote ≥ 58% + Volumenspike + rote Kerze (letzte 15m)", "fr": "Ratio de vente ≥ 58% + pic de volume + bougie rouge (15 dernières min)", "pt": "Proporção de venda ≥ 58% + pico de volume + vela vermelha (últimos 15m)", "tr": "Satış oranı ≥ 58% + hacim sıçraması + kırmızı mum (son 15d)", "vi": "Tỷ lệ bán ≥ 58% + đột biến khối lượng + nến đỏ (15p qua)"},
  "Volume spike near highs = distribution (selling) signal": {"ko": "고점 근처 거래량 급증 = 분산(매도) 신호", "en": "Volume spike near highs = distribution (selling) signal", "ja": "高値近くの出来高急増 = 分配(売り)シグナル", "es": "Pico de volumen cerca de máximos = señal de distribución (venta)", "de": "Volumenspike nahe Hochs = Distributionssignal (Verkauf)", "fr": "Pic de volume près des sommets = signal de distribution (vente)", "pt": "Pico de volume perto de máximas = sinal de distribuição (venda)", "tr": "Tepelere yakın hacim sıçraması = dağıtım (satış) sinyali", "vi": "Đột biến khối lượng gần đỉnh = tín hiệu phân phối (bán)"},
  "Volume spike near lows = capitulation-to-rebound signal": {"ko": "저점 근처 거래량 급증 = 항복 후 반등 신호", "en": "Volume spike near lows = capitulation-to-rebound signal", "ja": "安値近くの出来高急増 = キャピチュレーション後反発シグナル", "es": "Pico de volumen cerca de mínimos = señal de capitulación a rebote", "de": "Volumenspike nahe Tiefs = Kapitulations-zu-Rebound-Signal", "fr": "Pic de volume près des creux = signal de capitulation vers rebond", "pt": "Pico de volume perto de mínimas = sinal de capitulação para recuperação", "tr": "Diplere yakın hacim sıçraması = kapitülasyondan toparlanmaya sinyali", "vi": "Đột biến khối lượng gần đáy = tín hiệu đầu hàng-hồi phục"},
  "≤5% or below": {"ko": "≤5% 이하", "en": "≤5% or below", "ja": "≤5%以下", "es": "≤5% o menos", "de": "≤5% oder darunter", "fr": "≤5% ou moins", "pt": "≤5% ou menos", "tr": "≤5% veya altı", "vi": "≤5% hoặc thấp hơn"},
  "≥70% drawdown from ATH": {"ko": "ATH 대비 ≥70% 하락", "en": "≥70% drawdown from ATH", "ja": "ATH比≥70%下落", "es": "≥70% de caída desde el ATH", "de": "≥70% Drawdown vom ATH", "fr": "≥70% de baisse depuis l'ATH", "pt": "≥70% de queda desde o ATH", "tr": "ATH'den ≥70% düşüş", "vi": "≥70% sụt giảm từ ATH"},
  "≥75% whale accumulation": {"ko": "≥75% 고래 매집", "en": "≥75% whale accumulation", "ja": "≥75%クジラ蓄積", "es": "≥75% acumulación de ballenas", "de": "≥75% Wal-Akkumulation", "fr": "≥75% accumulation de baleines", "pt": "≥75% acumulação de baleias", "tr": "≥75% balina biriktirmesi", "vi": "≥75% cá voi tích lũy"},
};
function translateSignal(text) {
  const entry = SIGNAL_MAP[text];
  if (!entry) return text;
  return entry[currentLang] || entry.en || text;
}
function translateTarget(text) {
  const entry = TARGET_MAP[text];
  if (!entry) return text;
  return entry[currentLang] || entry.en || text;
}
const ATH_MAP = {BTC:126080, ETH:4955, BNB:1370, SOL:294, XRP:3.84, DOGE:0.74, ADA:3.09, TRX:0.45};
const HALVING_MONTHS = 21;
// 자산은 전체 포트폴리오 기준 — 코인 무관하게 동일 (분할 계획은 각 코인 가격으로 환산만 다름)
let TOTAL_USDT = parseFloat(localStorage.getItem('userAsset')) || 10000;

/** 분할 매수 계획 접기/펼치기. 기본값은 접힘 상태이며, 사용자가 펼친 상태는
 *  localStorage에 저장해서 새로고침해도 유지됨. */
function toggleSplitPlan(forceState) {
  const body = document.getElementById('splitPlanBody');
  const chevron = document.getElementById('splitPlanChevron');
  if (!body) return;
  const isOpen = forceState !== undefined ? forceState : body.style.display === 'none';
  body.style.display = isOpen ? 'block' : 'none';
  if (chevron) chevron.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(-90deg)';
  try { localStorage.setItem('splitPlanOpen', isOpen ? '1' : '0'); } catch(e) {}
}
(function restoreSplitPlanState() {
  try {
    if (localStorage.getItem('splitPlanOpen') === '1') toggleSplitPlan(true);
  } catch(e) {}
})();

function setUserAsset(val) {
  const n = parseFloat(val);
  if(!isNaN(n) && n > 0) {
    TOTAL_USDT = n;
    localStorage.setItem('userAsset', n.toString());
  } else if(val === '') {
    TOTAL_USDT = 10000;
    localStorage.removeItem('userAsset');
  }
  // 재렌더
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
}
// 실현가는 백엔드(api.php)가 계산해 ind.realized_price로 내려줌 (BTC=온체인 추정, 알트=200주 MA).
// 아래 상수는 하위호환용 폴백일 뿐 실제 표시에는 ind.realized_price를 사용한다.
const REALIZED_PRICE = {BTC:54000, ETH:2100, BNB:420, SOL:95, XRP:1.48, DOGE:0.09, ADA:0.32, TRX:0.30};

// 서버가 주입한 자동 코인목록(window.COINS_AUTO)이 있으면 우선 사용.
// 없으면(구버전 캐시 등) 아래 하드코딩 폴백을 쓴다.
const COINS = (Array.isArray(window.COINS_AUTO) && window.COINS_AUTO.length >= 8)
  ? window.COINS_AUTO
  : [
  {id:'BTC', name:'Bitcoin',  sym:'BTCUSDT', color:'#F7931A'},
  {id:'ETH', name:'Ethereum', sym:'ETHUSDT', color:'#627EEA'},
  {id:'BNB', name:'BNB',      sym:'BNBUSDT', color:'#F3BA2F'},
  {id:'SOL', name:'Solana',   sym:'SOLUSDT', color:'#9945FF'},
  {id:'XRP', name:'XRP',      sym:'XRPUSDT', color:'#00AAE4'},
  {id:'DOGE',name:'Dogecoin', sym:'DOGEUSDT',color:'#C2A633'},
  {id:'ADA', name:'Cardano',  sym:'ADAUSDT', color:'#0033AD'},
  {id:'TRX', name:'TRON',     sym:'TRXUSDT', color:'#FF0013'},
  {id:'AVAX',name:'Avalanche',sym:'AVAXUSDT',color:'#E84142'},
  {id:'LINK',name:'Chainlink',sym:'LINKUSDT',color:'#2A5ADA'},
  {id:'DOT', name:'Polkadot', sym:'DOTUSDT', color:'#E6007A'},
  {id:'POL',  name:'Polygon',  sym:'POLUSDT',  color:'#8247E5'},
  {id:'LTC', name:'Litecoin', sym:'LTCUSDT', color:'#BFBBBB'},
  {id:'BCH', name:'Bitcoin Cash',sym:'BCHUSDT',color:'#0AC18E'},
  {id:'NEAR',name:'NEAR',     sym:'NEARUSDT',color:'#00EC97'},
  {id:'UNI', name:'Uniswap',  sym:'UNIUSDT', color:'#FF007A'},
  {id:'APT', name:'Aptos',    sym:'APTUSDT', color:'#4CB4A4'},
  {id:'ICP', name:'Internet Computer',sym:'ICPUSDT',color:'#3B00B9'},
  {id:'ATOM',name:'Cosmos',   sym:'ATOMUSDT',color:'#2E3148'},
  {id:'XLM', name:'Stellar',  sym:'XLMUSDT', color:'#14B6E7'},
  {id:'ETC', name:'Ethereum Classic',sym:'ETCUSDT',color:'#328332'},
  {id:'FIL', name:'Filecoin', sym:'FILUSDT', color:'#0090FF'},
  {id:'HBAR',name:'Hedera',   sym:'HBARUSDT',color:'#8A94A6'},
  {id:'ARB', name:'Arbitrum', sym:'ARBUSDT', color:'#28A0F0'},
  {id:'OP',  name:'Optimism', sym:'OPUSDT',  color:'#FF0420'},
  {id:'VET', name:'VeChain',  sym:'VETUSDT', color:'#15BDFF'},
  {id:'INJ', name:'Injective',sym:'INJUSDT', color:'#00D2FF'},
  {id:'SUI', name:'Sui',      sym:'SUIUSDT', color:'#4DA2FF'},
  {id:'AAVE',name:'Aave',     sym:'AAVEUSDT',color:'#B6509E'},
  {id:'GRT', name:'The Graph',sym:'GRTUSDT', color:'#6747ED'},
  {id:'ALGO',name:'Algorand', sym:'ALGOUSDT',color:'#9CA3AF'},
  {id:'SEI', name:'Sei',      sym:'SEIUSDT', color:'#8B1E2B'},
  {id:'RUNE',name:'THORChain',sym:'RUNEUSDT',color:'#00CCFF'},
  {id:'S',   name:'Sonic',    sym:'SUSDT',   color:'#1969FF'},
  {id:'TIA', name:'Celestia', sym:'TIAUSDT', color:'#7B2BF9'},
  {id:'IMX', name:'Immutable',sym:'IMXUSDT', color:'#3B82F6'},
  {id:'RENDER',name:'Render', sym:'RENDERUSDT',color:'#CF1011'},
  {id:'SKY', name:'Sky',      sym:'SKYUSDT', color:'#1AAB9B'},
  {id:'LDO', name:'Lido DAO', sym:'LDOUSDT', color:'#00A3FF'},
  {id:'STX', name:'Stacks',   sym:'STXUSDT', color:'#5546FF'},
  {id:'THETA',name:'Theta',   sym:'THETAUSDT',color:'#2AB8E6'},
  {id:'SAND',name:'The Sandbox',sym:'SANDUSDT',color:'#00ADEF'},
  {id:'AXS', name:'Axie Infinity',sym:'AXSUSDT',color:'#0055D5'},
  {id:'MANA',name:'Decentraland',sym:'MANAUSDT',color:'#FF2D55'},
  {id:'FLOW',name:'Flow',     sym:'FLOWUSDT',color:'#00EF8B'},
  {id:'CHZ', name:'Chiliz',   sym:'CHZUSDT', color:'#CD0124'},
  {id:'GALA',name:'Gala',     sym:'GALAUSDT',color:'#B0B7C3'},
  {id:'A',   name:'Vaulta',   sym:'AUSDT',   color:'#8B9DC3'},
  {id:'PEPE',name:'Pepe',     sym:'PEPEUSDT',color:'#3D8130'},
  {id:'SHIB',name:'Shiba Inu',sym:'SHIBUSDT',color:'#FFA409'},
];

let currentCoin = (function(){
  try { const c = localStorage.getItem('selectedCoin'); if(c && COINS.some(x=>x.id===c)) return c; } catch(e){}
  return 'BTC';
})();

// ═══════════════════════════════════════════════════════
// 즐겨찾기 (관심 코인) — localStorage 저장, 대시보드 탭에 노출되는 코인 목록
// ═══════════════════════════════════════════════════════
const DEFAULT_FAVORITES = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX']; // 기존 8개

// ── 상장폐지/이용불가 코인 자동 숨김 ──
// api.php가 'coin_unavailable'을 반환한 코인(상폐/티커변경)을 기억해,
// 코인 목록·즐겨찾기·검색에서 자동으로 숨긴다. (하나씩 수동으로 지울 필요 없음)
function getDelistedCoins() {
  try {
    const raw = localStorage.getItem('delistedCoins');
    return raw ? (JSON.parse(raw) || []) : [];
  } catch(e) { return []; }
}
function markCoinDelisted(id) {
  if (!id || id === 'BTC') return; // BTC는 절대 숨기지 않음(안전장치)
  const list = getDelistedCoins();
  if (!list.includes(id)) {
    list.push(id);
    try { localStorage.setItem('delistedCoins', JSON.stringify(list)); } catch(e) {}
  }
  const favs = getFavorites().filter(x => x !== id);
  saveFavorites(favs);
  try { initTabs(); } catch(e) {}
}
function isDelisted(id) { return getDelistedCoins().includes(id); }
function activeCoins() {
  const dead = getDelistedCoins();
  return COINS.filter(c => !dead.includes(c.id));
}

function getFavorites() {
  try {
    const raw = localStorage.getItem('favoriteCoins');
    if (raw === null) return [...DEFAULT_FAVORITES]; // 최초 방문 = 기본 8개
    const arr = JSON.parse(raw);
    // 존재하는 코인만 필터. 비었으면 최소 BTC 하나는 보장.
    const valid = Array.isArray(arr) ? arr.filter(id => COINS.some(c => c.id === id)) : [];
    return valid.length ? valid : ['BTC'];
  } catch(e) { return [...DEFAULT_FAVORITES]; }
}
function saveFavorites(list) {
  // 최소 1개 강제 (다 지우면 BTC 유지)
  const clean = (Array.isArray(list) ? list : []).filter(id => COINS.some(c => c.id === id));
  const finalList = clean.length ? clean : ['BTC'];
  try { localStorage.setItem('favoriteCoins', JSON.stringify(finalList)); } catch(e) {}
  return finalList;
}
function isFavorite(id) { return getFavorites().includes(id); }
function toggleFavorite(id) {
  if (!COINS.some(c => c.id === id)) return getFavorites();
  let favs = getFavorites();
  if (favs.includes(id)) {
    favs = favs.filter(x => x !== id); // 제거 (최소 1개는 saveFavorites가 보장)
  } else {
    favs.push(id); // 추가 (순서 유지)
  }
  return saveFavorites(favs);
}
function resetFavorites() { return saveFavorites([...DEFAULT_FAVORITES]); }
// 즐겨찾기를 COINS 정의 순서(거래량 순)대로 정렬해 반환 — 탭 순서 일관성
function getFavoriteCoins() {
  const favs = getFavorites();
  const dead = getDelistedCoins();
  // 저장된 즐겨찾기 순서를 그대로 따르되, 상폐된 코인은 제외
  return favs.map(id => COINS.find(c => c.id === id)).filter(c => c && !dead.includes(c.id));
}
// 즐겨찾기 순서 이동 (검색 오버레이/coins.php에서 위/아래로 조정)
function moveFavorite(id, dir) { // dir: -1(위) | +1(아래)
  const favs = getFavorites();
  const i = favs.indexOf(id);
  if (i < 0) return favs;
  const j = i + dir;
  if (j < 0 || j >= favs.length) return favs;
  [favs[i], favs[j]] = [favs[j], favs[i]];
  return saveFavorites(favs);
}

let currentMode = 'buy';
let ws = null;
let livePrice = null;
let chatDB = null; // Firebase Realtime DB 핸들 (채팅 + 히스토리 공용)
let chatListenersAttached = false; // 채팅 메시지/접속자 리스너가 실제로 부착됐는지
let scoreHistory = [];
let currentScore = 0;
let lastResultDetails = null; // Why 패널이 참조할, 가장 최근 렌더된 지표 상세 breakdown
let alertSettings = {t1:true, t2:true, t3:true, t4:false, t5:false};
// (코인/모드별 점수 추적은 lastScoreByKey 사용 — 아래 checkAlerts 근처에 정의됨)
let notifGranted = false;
let indCache = {};

// ═══════════════════════════════════════════════════════
// COIN TABS
// ═══════════════════════════════════════════════════════
function initTabs() {
  // 이전에 body로 옮겨진 더보기 메뉴가 있으면 제거 (중복 방지)
  const orphan = document.getElementById('coinMoreMenu');
  if (orphan && orphan.parentElement === document.body) orphan.remove();
  const favCoins = getFavoriteCoins();
  // 현재 선택된 코인이 즐겨찾기에서 빠졌으면 첫 즐겨찾기로 이동
  if (!favCoins.some(c => c.id === currentCoin)) {
    currentCoin = favCoins.length ? favCoins[0].id : 'BTC';
    try { localStorage.setItem('selectedCoin', currentCoin); } catch(e) {}
  }
  const el = document.getElementById('coinTabs');

  // 상단바에 직접 노출할 최대 개수 (넘치면 나머지는 "더보기" 드롭다운으로).
  // 화면 폭에 따라 다르게: 좁으면 적게, 넓으면 많이.
  const vw = window.innerWidth || 1280;
  const MAX_VISIBLE = vw >= 1400 ? 12 : vw >= 1100 ? 9 : vw >= 800 ? 6 : 5;

  let visible = favCoins, overflow = [];
  if (favCoins.length > MAX_VISIBLE) {
    visible = favCoins.slice(0, MAX_VISIBLE);
    overflow = favCoins.slice(MAX_VISIBLE);
    // 현재 선택된 코인이 오버플로(숨김) 쪽에 있으면, 맨 앞으로 끌어와 항상 보이게
    if (overflow.some(c => c.id === currentCoin)) {
      const cur = favCoins.find(c => c.id === currentCoin);
      visible = [cur, ...favCoins.filter(c => c.id !== currentCoin).slice(0, MAX_VISIBLE - 1)];
      const visIds = new Set(visible.map(c => c.id));
      overflow = favCoins.filter(c => !visIds.has(c.id));
    }
  }

  let html = visible.map(c => `
    <div class="coin-tab${c.id===currentCoin?' active':''}"
      onclick="switchCoin('${c.id}')"
      ontouchend="event.preventDefault();switchCoin('${c.id}')"
      style="${c.id===currentCoin?`background:${c.color};border-color:${c.color};color:#000`:''}">
      ${c.id}
    </div>`).join('');

  // 넘치는 코인들은 드롭다운으로
  if (overflow.length) {
    html += `<div class="coin-tab coin-tab-more" onclick="toggleCoinMore(event)" title="더 보기">
      +${overflow.length} ▾
      <div class="coin-more-menu" id="coinMoreMenu">
        ${overflow.map(c => `<div class="coin-more-item${c.id===currentCoin?' active':''}" onclick="event.stopPropagation();switchCoin('${c.id}');closeCoinMore()">
          <span class="cm-dot" style="background:${c.color}"></span>${c.id} <span class="cm-name">${c.name}</span></div>`).join('')}
      </div>
    </div>`;
  }
  // 검색/관리 버튼
  html += `<div class="coin-tab coin-tab-add" onclick="openCoinSearch()" ontouchend="event.preventDefault();openCoinSearch()" title="코인 추가/관리" aria-label="Add coins">＋</div>`;
  el.innerHTML = html;

  // 모바일 드롭박스도 즐겨찾기만
  const drop = document.getElementById('coinDrop');
  if(drop) {
    drop.innerHTML = favCoins.map(c => `<option value="${c.id}" ${c.id===currentCoin?'selected':''}>${c.id}</option>`).join('');
  }
}
function toggleCoinMore(e) {
  e.stopPropagation();
  const menu = document.getElementById('coinMoreMenu');
  const btn = e.currentTarget; // .coin-tab-more
  if (!menu) return;
  const isOpen = menu.classList.contains('open');
  if (isOpen) { closeCoinMore(); return; }
  // overflow:auto 컨테이너에 잘리지 않도록 body로 옮기고 버튼 위치 기준 fixed 배치
  if (menu.parentElement !== document.body) document.body.appendChild(menu);
  const r = btn.getBoundingClientRect();
  menu.style.position = 'fixed';
  menu.style.top = (r.bottom + 6) + 'px';
  // 오른쪽 정렬(화면 밖으로 안 나가게). 버튼 오른쪽 끝에 메뉴 오른쪽을 맞춤.
  menu.style.left = 'auto';
  menu.style.right = Math.max(8, window.innerWidth - r.right) + 'px';
  menu.classList.add('open');
}
function closeCoinMore() {
  const m = document.getElementById('coinMoreMenu');
  if (m) m.classList.remove('open');
}
document.addEventListener('click', (e) => {
  // 메뉴 내부나 more 버튼 클릭이 아니면 닫기
  if (!e.target.closest('.coin-tab-more') && !e.target.closest('#coinMoreMenu')) closeCoinMore();
});
// 페이지 스크롤 시 닫되, 드롭다운 메뉴 자체의 내부 스크롤은 제외 (스크롤로 선택 가능하게)
window.addEventListener('scroll', (e) => {
  const m = document.getElementById('coinMoreMenu');
  if (!m || !m.classList.contains('open')) return;
  if (e.target && e.target.id === 'coinMoreMenu') return; // 메뉴 내부 스크롤은 무시
  closeCoinMore();
}, true);

// ═══════════════════════════════════════════════════════
// 코인 검색/즐겨찾기 오버레이
// ═══════════════════════════════════════════════════════
let coinSearchTab = 'fav'; // 'fav' | 'all'
// 즐겨찾기 코인 전환 시트 (모바일 하단바 "코인" 탭). 즐겨찾기한 코인을 빠르게 전환.
function openCoinSwitcher() {
  let ov = document.getElementById('coinSwitchOverlay');
  if (!ov) {
    ov = document.createElement('div');
    ov.id = 'coinSwitchOverlay';
    ov.className = 'coin-ov coin-switch-ov';
    ov.innerHTML = `
      <div class="coin-ov-box" role="dialog" aria-modal="true" aria-label="코인 전환">
        <div class="coin-ov-grip"></div>
        <div class="coin-sw-head">
          <div>
            <span class="coin-sw-title">${TT({ko:'코인 전환',en:'Switch coin',ja:'コイン切替',es:'Cambiar moneda',de:'Coin wechseln'})}</span>
            <span class="coin-sw-sub">${TT({ko:'즐겨찾기한 코인',en:'Your favorite coins',ja:'お気に入りコイン',es:'Tus favoritos',de:'Deine Favoriten'})}</span>
          </div>
          <button class="coin-ov-close" onclick="closeCoinSwitcher()" aria-label="Close">✕</button>
        </div>
        <div id="coinSwitchList" class="coin-ov-list"></div>
        <button class="coin-sw-manage" onclick="closeCoinSwitcher();openCoinSearch()">
          ＋ ${TT({ko:'코인 검색 / 관리',en:'Search / manage coins',ja:'コイン検索・管理',es:'Buscar / gestionar',de:'Coins suchen / verwalten'})}
        </button>
      </div>`;
    document.body.appendChild(ov);
    ov.addEventListener('click', (e) => { if (e.target === ov) closeCoinSwitcher(); });
  }
  ov.style.display = 'flex';
  renderCoinSwitchList();
}
function closeCoinSwitcher() {
  const ov = document.getElementById('coinSwitchOverlay');
  if (ov) ov.style.display = 'none';
}
function renderCoinSwitchList() {
  const list = document.getElementById('coinSwitchList');
  if (!list) return;
  const favCoins = getFavoriteCoins();
  if (!favCoins.length) {
    list.innerHTML = `<div class="coin-ov-empty">${TT({ko:'즐겨찾기한 코인이 없습니다.',en:'No favorite coins yet.',ja:'お気に入りがありません。',es:'Sin favoritos.',de:'Keine Favoriten.'})}</div>`;
    return;
  }
  list.innerHTML = favCoins.map(c => `
    <div class="coin-sw-item${c.id===currentCoin?' current':''}" onclick="switchCoinFromSheet('${c.id}')">
      <span class="coin-ov-dot" style="background:${c.color}"></span>
      <span class="coin-ov-id">${c.id}</span>
      <span class="coin-ov-name">${c.name}</span>
      ${c.id===currentCoin?`<span class="coin-sw-cur">${TT({ko:'보는 중',en:'viewing',ja:'表示中',es:'viendo',de:'aktiv'})}</span>`:''}
    </div>`).join('');
}
function switchCoinFromSheet(id) {
  closeCoinSwitcher();
  switchCoin(id);
}

function openCoinSearch() {
  let ov = document.getElementById('coinSearchOverlay');
  if (!ov) {
    ov = document.createElement('div');
    ov.id = 'coinSearchOverlay';
    ov.className = 'coin-ov';
    ov.innerHTML = `
      <div class="coin-ov-box" role="dialog" aria-modal="true" aria-label="코인 검색">
        <div class="coin-ov-grip"></div>
        <div class="coin-ov-head">
          <input id="coinSearchInput" class="coin-ov-input" type="text" placeholder="${TT({ko:'코인 검색 (이름/심볼)',en:'Search coins (name/symbol)',ja:'コイン検索(名前/シンボル)',es:'Buscar monedas',de:'Coins suchen'})}" autocomplete="off">
          <button class="coin-ov-close" onclick="closeCoinSearch()" aria-label="Close">✕</button>
        </div>
        <div class="coin-ov-tabs">
          <button id="covTabFav" class="cov-tab active" onclick="setCoinSearchTab('fav')">★ ${TT({ko:'즐겨찾기',en:'Favorites',ja:'お気に入り',es:'Favoritos',de:'Favoriten'})} <span id="covFavCount" class="cov-cnt"></span></button>
          <button id="covTabAll" class="cov-tab" onclick="setCoinSearchTab('all')">${TT({ko:'전체',en:'All',ja:'すべて',es:'Todo',de:'Alle'})} <span class="cov-cnt">${COINS.length}</span></button>
        </div>
        <div class="coin-ov-bar">
          <span class="coin-ov-hint" id="covHint">${TT({ko:'별을 눌러 추가/제거',en:'Tap the star to add/remove',ja:'星をタップして追加/削除',es:'Toca la estrella',de:'Stern tippen'})}</span>
          <button class="coin-ov-reset" onclick="resetFavAndRefresh()">${TT({ko:'기본값 초기화',en:'Reset',ja:'リセット',es:'Restablecer',de:'Zurücksetzen'})}</button>
        </div>
        <div id="coinSearchList" class="coin-ov-list"></div>
      </div>`;
    document.body.appendChild(ov);
    ov.addEventListener('click', (e) => { if (e.target === ov) closeCoinSearch(); });
    const inp = ov.querySelector('#coinSearchInput');
    inp.addEventListener('input', () => renderCoinSearchList(inp.value));
  }
  ov.style.display = 'flex';
  const inp = ov.querySelector('#coinSearchInput');
  inp.value = '';
  setCoinSearchTab('fav'); // 열 때마다 즐겨찾기 탭부터
  // 데스크톱만 자동 포커스 (모바일은 키보드가 시트를 가려서 제외)
  if (window.matchMedia('(min-width:601px)').matches) setTimeout(() => inp.focus(), 50);
}
function closeCoinSearch() {
  const ov = document.getElementById('coinSearchOverlay');
  if (ov) ov.style.display = 'none';
}
function setCoinSearchTab(tab) {
  coinSearchTab = tab;
  const f = document.getElementById('covTabFav'), a = document.getElementById('covTabAll');
  if (f) f.classList.toggle('active', tab === 'fav');
  if (a) a.classList.toggle('active', tab === 'all');
  const inp = document.getElementById('coinSearchInput');
  renderCoinSearchList(inp ? inp.value : '');
}
function renderCoinSearchList(q) {
  const list = document.getElementById('coinSearchList');
  if (!list) return;
  const query = (q || '').trim().toUpperCase();
  const favs = getFavorites();
  // 즐겨찾기 카운트 뱃지 갱신
  const cnt = document.getElementById('covFavCount');
  if (cnt) cnt.textContent = favs.length;
  // 탭에 따라 힌트 텍스트 갱신: 전체 탭은 "탭=즐겨찾기 토글", 즐겨찾기 탭은 "탭=이동"
  const hint = document.getElementById('covHint');
  if (hint) {
    hint.textContent = coinSearchTab === 'all'
      ? TT({ko:'항목을 눌러 즐겨찾기 추가/제거',en:'Tap an item to add/remove favorite',ja:'項目をタップして追加/削除',es:'Toca para añadir/quitar favorito',de:'Tippen zum Hinzufügen/Entfernen'})
      : TT({ko:'항목을 눌러 이동 · 별로 제거',en:'Tap to switch · star to remove',ja:'タップで移動・星で削除',es:'Toca para ir · estrella para quitar',de:'Tippen zum Wechseln · Stern entfernt'});
  }
  // 탭에 따라 대상 코인 선정. 검색어가 있으면 전체에서 찾되 즐겨찾기 탭은 즐겨찾기 내에서만.
  const dead = getDelistedCoins();
  let base;
  if (coinSearchTab === 'fav') {
    // 즐겨찾기는 저장된 순서대로 표시 (순서 조정 반영), 상폐 제외
    base = favs.map(id => COINS.find(c => c.id === id)).filter(c => c && !dead.includes(c.id));
  } else {
    base = COINS.filter(c => !dead.includes(c.id)); // 전체 탭도 상폐 제외
  }
  const matched = base.filter(c =>
    !query || c.id.includes(query) || c.name.toUpperCase().includes(query)
  );
  if (!matched.length) {
    const emptyMsg = coinSearchTab === 'fav' && !query
      ? TT({ko:'즐겨찾기한 코인이 없습니다. 전체 탭에서 추가하세요.',en:'No favorites yet. Add from the All tab.',ja:'お気に入りがありません。すべてタブから追加してください。',es:'Sin favoritos. Añade desde la pestaña Todo.',de:'Keine Favoriten. Über den Alle-Tab hinzufügen.'})
      : TT({ko:'검색 결과 없음',en:'No results',ja:'該当なし',es:'Sin resultados',de:'Keine Ergebnisse'});
    list.innerHTML = `<div class="coin-ov-empty">${emptyMsg}</div>`;
    return;
  }
  // 즐겨찾기 탭 & 검색어 없을 때만 순서조정 버튼 노출 (검색 중엔 순서 의미 없음)
  const showReorder = coinSearchTab === 'fav' && !query;
  list.innerHTML = matched.map((c, i) => {
    const on = favs.includes(c.id);
    const reorder = showReorder ? `
      <span class="coin-ov-move">
        <button class="cov-mv" onclick="event.stopPropagation();moveFavAndRefresh('${c.id}',-1)" ${i===0?'disabled':''} aria-label="up">▲</button>
        <button class="cov-mv" onclick="event.stopPropagation();moveFavAndRefresh('${c.id}',1)" ${i===matched.length-1?'disabled':''} aria-label="down">▼</button>
      </span>` : '';
    return `<div class="coin-ov-item${on?' fav':''}" onclick="selectCoinFromSearch('${c.id}')">
      <span class="coin-ov-dot" style="background:${c.color}"></span>
      <span class="coin-ov-id">${c.id}</span>
      <span class="coin-ov-name">${c.name}</span>
      ${reorder}
      <span class="coin-ov-star" onclick="event.stopPropagation();toggleFavFromSearch('${c.id}')" role="button" aria-label="toggle favorite">${on?'★':'☆'}</span>
    </div>`;
  }).join('');
}
// 항목 클릭 동작은 탭에 따라 다르다.
//  · 즐겨찾기 탭: 그 코인으로 전환하고 오버레이 닫기
//  · 전체 탭: 코인 이동이 아니라 즐겨찾기 추가/해제만 (실수로 이동 방지 + 즐겨찾기 관리 편의)
function selectCoinFromSearch(id) {
  if (coinSearchTab === 'all') {
    // 전체 탭에서는 클릭이 곧 즐겨찾기 토글
    toggleFavFromSearch(id);
    return;
  }
  closeCoinSearch();
  switchCoin(id);
}
function moveFavAndRefresh(id, dir) {
  moveFavorite(id, dir);
  const inp = document.getElementById('coinSearchInput');
  renderCoinSearchList(inp ? inp.value : '');
  initTabs();
}
function toggleFavFromSearch(id) {
  toggleFavorite(id);
  const inp = document.getElementById('coinSearchInput');
  renderCoinSearchList(inp ? inp.value : '');
  initTabs(); // 대시보드 탭 즉시 갱신
}
function resetFavAndRefresh() {
  resetFavorites();
  const inp = document.getElementById('coinSearchInput');
  renderCoinSearchList(inp ? inp.value : '');
  initTabs();
}

let loadToken = 0;

/** 로고 클릭 시: 이미 메인 대시보드에 있으면 BTC/롱 기본값으로 리셋 + 맨 위로 스크롤.
 *  (다른 페이지에서 로고를 누르는 경우는 이 파일이 곧 홈이라 해당 없음 — 블로그 쪽 로고는 href="/") */
function goHome() {
  window.scrollTo({top: 0, behavior: 'smooth'});
  if(currentCoin !== 'BTC') switchCoin('BTC');
  if(currentMode !== 'buy') setMode('buy');
}

function switchCoin(id) {
  if(currentCoin === id) return;
  currentCoin = id;
  try { localStorage.setItem('selectedCoin', id); } catch(e){}
  livePrice = null;
  loadToken++;

  // 코인 전환 시 이전 코인의 히스토리 상태를 즉시 비운다.
  // (안 그러면 새 코인 히스토리가 비어있어도 호버 시 이전 코인의 점수가 잘못 표시됨)
  historyPlotState = null;
  scoreHistory = [];

  // 이 코인으로 전환할 때마다 알림 상태를 초기화 — 그래야 "이미 한 번 봤던 코인"이라도
  // 다시 들어올 때 지금 점수가 알림 구간에 있으면 매번 다시 효과(플래시+알림음)가 울림.
  // (안 그러면 세션 중 코인당 딱 한 번만 울리고 그 뒤로는 점수가 그대로면 다시는 안 울렸음)
  delete lastScoreByKey[`${id}_buy`];
  delete lastScoreByKey[`${id}_sell`];

  // 탭 즉시 업데이트
  initTabs();
  // 차트 즉시 교체 (가장 먼저 보임)
  initChart();
  // WebSocket 즉시 연결
  connectWS();

  // 캐시가 있으면 즉시 렌더 (지연 없이 바로 표시)
  const cached = indCache[id];
  if(cached) {
    currentScore = currentMode==='buy' ? (cached._buyResult?.final ?? 0) : (cached._sellResult?.final ?? 0);
    renderAll(cached);
  } else {
    // 캐시 없을 때만 스켈레톤 표시
    currentScore = 0;
    ['scoreNum','scoreAction','reachPct','mPrice','mFG','mRP','mMA'].forEach(elId=>{
      const el=document.getElementById(elId);
      if(el){el.textContent='—';el.style.color='var(--t3)';el.classList.add('sk-load');}
    });
    document.getElementById('reachBar').style.width='0%';
    ['g1','g2','g3','g4','bkGrid','splitRows','trigRows'].forEach(elId=>{
      const el=document.getElementById(elId);
      if(el) el.innerHTML='<div style="color:var(--t3);font-size:10px;padding:8px">Loading...</div>';
    });
  }

  // 백그라운드에서 최신 데이터 갱신 (캐시가 있어도 항상 갱신)
  loadAll();
}

// ═══════════════════════════════════════════════════════
// TICKER BAR — USD/KRW, USDT/KRW (직접 fetch) + 도미넌스/마켓캡/볼륨 (api.php에서 받아옴)
// ═══════════════════════════════════════════════════════
function updateTickerFromAPI(data) {
  if(!data) return;
  const set = (id, val) => { const el=document.getElementById(id); if(el && val!=null) el.textContent=val; };
  const setChg = (id, val) => {
    const el=document.getElementById(id); if(!el || val==null) return;
    const sign = val>=0?'+':'';
    el.textContent = `${sign}${Number(val).toFixed(2)}%`;
    el.style.color = val>=0 ? 'var(--green)' : 'var(--red)';
  };
  if(data.btc_dom) set('tkDom', Number(data.btc_dom).toFixed(2)+'%');
  if(data.dom_chg != null) setChg('tkDomChg', data.dom_chg);
  if(data.mcap)    set('tkMcap', (data.mcap/1e12).toFixed(2)+'T');
  if(data.vol24h)  set('tkVol',  (data.vol24h/1e9).toFixed(1)+'B');
  // USDT 시세를 캐시에 즉시 반영해서 loadTicker가 첫 렌더에도 실제 값을 쓰게 함 (렌더 순서 타이밍 방지)
  try {
    if(typeof indCache !== 'undefined'){
      indCache[currentCoin] = indCache[currentCoin] || {};
      indCache[currentCoin].usdt_krw = data.usdt_krw;
      indCache[currentCoin].usdt_chg = data.usdt_chg;
      indCache[currentCoin].usdt_prices = data.usdt_prices;
      indCache[currentCoin].fx_rates = data.fx_rates;
    }
  } catch(e){}
  loadTicker();
}

// 언어별 기준 통화 매핑 — 한국어면 원화(김치프리미엄 확인용), 그 외 언어는 각 지역에서 익숙한 통화로.
// exchangerate-api/CoinGecko 둘 다 이 통화 코드들을 지원함.
const TICKER_CURRENCY_MAP = {ko:'KRW', en:'USD', ja:'JPY', es:'EUR', de:'EUR', fr:'EUR', pt:'BRL', tr:'TRY', vi:'VND'};
function getTickerCurrency() { return TICKER_CURRENCY_MAP[currentLang] || 'USD'; }

async function loadTicker() {
  const cur = getTickerCurrency();
  const curLower = cur.toLowerCase();
  // 라벨 갱신 (USD/USD처럼 같은 통화가 겹치는 경우 — 예: 영어 사용자에게 USD/USD — 는
  // 굳이 환율이 항상 1.00이라 정보가 없으므로, 이 경우엔 "USD 기준"임을 자연스럽게 보여주는
  // USDT 페그 확인용 정보로도 여전히 유효함(디페깅 감시).
  const l1 = document.getElementById('tkFiatLabel1');
  const l2 = document.getElementById('tkFiatLabel2');
  const item1 = document.getElementById('tkFiatItem1');
  // USD/USD는 항상 1.000이라 정보값이 없으므로 통째로 숨기고, USDT/USD(테더 페그 감시)만 남김.
  if(item1) item1.style.display = (cur === 'USD') ? 'none' : '';
  if(l1) l1.textContent = `USD/${cur}`;
  if(l2) l2.textContent = `USDT/${cur}`;

  // USD/{통화} 환율: 서버(api.php fx_rates)를 우선 사용. 서버값 없으면 exchangerate-api 직접호출로 폴백.
  const cacheForFx = (typeof indCache !== 'undefined') ? indCache[currentCoin] : null;
  let rate = (cur === 'USD') ? 1 : (cacheForFx && cacheForFx.fx_rates && cacheForFx.fx_rates[cur]);
  if(rate == null && cur !== 'USD') {
    const r1 = await fetch('https://api.exchangerate-api.com/v4/latest/USD', {signal:AbortSignal.timeout(4000)})
      .then(r=>r.json()).catch(()=>null);
    rate = r1?.rates?.[cur];
  }

  const dLoc = SUPPORTED_LANG_CODES.includes(currentLang) ? currentLang : 'en';
  if(rate != null) {
    const el = document.getElementById('tkUsdKrw');
    if(el) el.textContent = rate.toLocaleString(dLoc, {maximumFractionDigits: (cur==='JPY'||cur==='KRW') ? 1 : 2});
  }

  // USDT/{통화}: 서버가 내려준 실제 테더 시세(usdt_prices) 사용. 원화는 업비트 정밀값 우선.
  const src = (typeof indCache !== 'undefined') ? indCache[currentCoin] : null;
  let price = null, chg = null;
  if(cur === 'KRW' && src){ const v = Number(src.usdt_krw); if(v>=500 && v<=3000){ price=v; chg=src.usdt_chg; } }
  if(price == null && src && src.usdt_prices && src.usdt_prices[curLower]){
    price = src.usdt_prices[curLower].p; chg = src.usdt_prices[curLower].c;
  }
  const elU = document.getElementById('tkUsdtKrw');
  const chgEl = document.getElementById('tkUsdtKrwChg');
  if(price != null && elU){
    const digits = (cur==='JPY') ? 0 : (cur==='KRW' ? 1 : 4);
    elU.textContent = price.toLocaleString(dLoc, {maximumFractionDigits: digits, minimumFractionDigits: (cur==='USD'||cur==='EUR')?4:0});
  }
  if(chgEl){
    if(chg != null){ const s=chg>=0?'+':''; chgEl.textContent=`${s}${Number(chg).toFixed(2)}%`; chgEl.style.color=chg>=0?'var(--green)':'var(--red)'; }
    else chgEl.textContent = '';
  }
}
setInterval(loadTicker, 60*1000); // 1분마다 갱신 (최초 1회는 refreshLangDependentUI()에서 호출됨)

// ═══════════════════════════════════════════════════════
// MODE
// ═══════════════════════════════════════════════════════
function setMode(mode) {
  currentMode = mode;
  document.getElementById('modeBuy').classList.toggle('active', mode==='buy');
  document.getElementById('modeSell').classList.toggle('active', mode==='sell');
  document.body.classList.toggle('sell-mode', mode==='sell');
  document.getElementById('sellPanel').style.display = mode==='sell' ? 'block' : 'none';
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
  // 알림 모달 등 모든 [data-i] 라벨 갱신 (모드 전환 시에도 언어가 흐트러지지 않도록)
  applyStaticI18n();
  // histInfo 업데이트
  const hi=document.getElementById('histInfo');
  if(hi) hi.innerHTML = TT({ko:`📊 <b>시간별</b>: 최근 24시간, 5분마다<br>📅 <b>일별</b>: 최근 30일, 일별 평균<br>📆 <b>월별</b>: 전체 기간, 월별 평균<br>💾 데이터는 브라우저 로컬저장소에 저장됩니다. 브라우저 데이터 삭제 시 초기화됩니다.`,en:`📊 <b>Hour</b>: Last 24 hours, every 5 minutes<br>📅 <b>Day</b>: Last 30 days, daily average<br>📆 <b>Month</b>: All time, monthly average<br>💾 Data is stored in your browser (localStorage). Clears if browser data is wiped.`,ja:`📊 <b>時間別</b>: 直近24時間、5分ごと<br>📅 <b>日別</b>: 直近30日間、日次平均<br>📆 <b>月別</b>: 全期間、月次平均<br>💾 データはブラウザ(localStorage)に保存されます。ブラウザデータを消去すると初期化されます。`,es:`📊 <b>Hora</b>: Últimas 24 horas, cada 5 minutos<br>📅 <b>Día</b>: Últimos 30 días, promedio diario<br>📆 <b>Mes</b>: Todo el período, promedio mensual<br>💾 Los datos se guardan en tu navegador (localStorage). Se borran si se limpian los datos del navegador.`,de:`📊 <b>Stunde</b>: Letzte 24 Stunden, alle 5 Minuten<br>📅 <b>Tag</b>: Letzte 30 Tage, Tagesdurchschnitt<br>📆 <b>Monat</b>: Gesamter Zeitraum, Monatsdurchschnitt<br>💾 Daten werden lokal im Browser (localStorage) gespeichert. Werden beim Löschen der Browserdaten zurückgesetzt.`});
}

// ═══════════════════════════════════════════════════════
// TRADINGVIEW CHART
// ═══════════════════════════════════════════════════════
let chartInterval = (function(){
  try { const v = localStorage.getItem('chartInterval'); if(v) return v; } catch(e){}
  return 'D';
})();
let tvWidget = null;

// TradingView 고급 위젯(tv.js). 사용자가 위젯 안에서 봉을 바꾸면 localStorage에 저장되어,
// 코인을 바꾸거나 재방문해도 같은 봉으로 다시 그려짐. (별도 봉 버튼 불필요 — 위젯 내장 버튼 사용)
function initChart() {
  const coin = COINS.find(c=>c.id===currentCoin);
  const sym = (currentCoin==='USDT') ? 'BINANCE:USDCUSDT' : ('BINANCE:'+coin.sym);
  const wrap = document.getElementById('tvChart');
  if(!wrap) return;

  // tv.js가 아직 로드 안 됐으면 잠시 후 재시도 (defer 로드)
  if(typeof TradingView === 'undefined' || !TradingView.widget) {
    setTimeout(initChart, 300);
    return;
  }

  // 이전 위젯이 있으면, 그 위젯이 현재 보고 있던 봉을 읽어서 저장 (사용자가 위젯 안에서 바꾼 봉 유지)
  const buildNew = function(){
    wrap.innerHTML = '';
    const inner = document.createElement('div');
    inner.id = 'tvChartInner';
    inner.style.cssText = 'width:100%;height:100%';
    wrap.appendChild(inner);
    try {
      tvWidget = new TradingView.widget({
        container_id: 'tvChartInner',
        symbol: sym,
        interval: chartInterval,     // 저장된 봉으로 시작
        autosize: true,
        theme: 'dark',
        style: '1',
        locale: 'en',
        toolbar_bg: '#0f0f0f',
        hide_top_toolbar: false,
        hide_legend: false,
        studies: ['MAExp@tv-basicstudies'],
        backgroundColor: '#0f0f0f',
        allow_symbol_change: false
      });
    } catch(e) {
      const iframe = document.createElement('iframe');
      iframe.style.cssText = 'width:100%;height:100%;border:none';
      iframe.src = 'https://s.tradingview.com/widgetembed/?frameElementId=tv_widget&symbol='
        + encodeURIComponent(sym) + '&interval=' + encodeURIComponent(chartInterval)
        + '&theme=dark&style=1&locale=en&toolbar_bg=%230f0f0f&hide_top_toolbar=0'
        + '&studies=MAExp%40tv-basicstudies&backgroundColor=%230f0f0f';
      iframe.setAttribute('allowtransparency','true');
      iframe.setAttribute('allowfullscreen','true');
      wrap.appendChild(iframe);
    }
  };

  // 기존 위젯에서 현재 봉을 읽어 저장한 뒤 새로 생성 (getSymbolInfo는 무료 위젯에서 interval 제공)
  if(tvWidget && typeof tvWidget.getSymbolInfo === 'function') {
    let done = false;
    const proceed = function(){ if(done) return; done = true; buildNew(); };
    try {
      tvWidget.getSymbolInfo(function(info){
        if(info && info.interval){
          chartInterval = info.interval;
          try { localStorage.setItem('chartInterval', info.interval); } catch(e){}
        }
        proceed();
      });
      // 콜백이 안 오면 250ms 후 강제 진행 (안전장치)
      setTimeout(proceed, 250);
    } catch(e) { proceed(); }
  } else {
    buildNew();
  }
}
function _initChart_unused_old() {
}


// ═══════════════════════════════════════════════════════
// WEBSOCKET — Binance Real-time Price
// ═══════════════════════════════════════════════════════
let wsCoinToken = 0; // WebSocket 전용 토큰 (코인 전환 시 이전 WS 응답 무시)

function connectWS() {
  wsCoinToken++;
  const myWsToken = wsCoinToken;
  const wsCoin = currentCoin; // 이 WS가 담당하는 코인 고정

  if(ws) {
    try { ws.onclose = null; ws.close(); } catch(e){} // onclose 핸들러 제거 후 닫기 (재연결 방지)
  }
  const coin = COINS.find(c=>c.id===wsCoin);
  if(!coin || wsCoin==='USDT') { livePrice=1.0; return; }
  try {
    ws = new WebSocket(`wss://stream.binance.com:9443/ws/${coin.sym.toLowerCase()}@ticker`);
    ws.onmessage = e => {
      // 토큰 불일치 또는 코인 전환됨 → 무시
      if(myWsToken !== wsCoinToken || wsCoin !== currentCoin) return;
      const d = JSON.parse(e.data);
      livePrice = parseFloat(d.c);
      const chg = parseFloat(d.P);
      const el = document.getElementById('mPrice');
      if(el) {
        el.textContent = fmtP(livePrice);
        el.style.color = chg >= 0 ? 'var(--green)' : 'var(--red)';
        document.getElementById('mPriceSub').textContent = `${chg>=0?'+':''}${chg.toFixed(2)}% 24h`;
      }
    };
    ws.onerror = () => {};
    ws.onclose = () => {
      // 이 WS가 여전히 현재 코인 담당일 때만 재연결
      if(myWsToken === wsCoinToken && wsCoin === currentCoin) {
        setTimeout(connectWS, 3000);
      }
    };
  } catch(e) {}
}

// ═══════════════════════════════════════════════════════
// CORS PROXY
// ═══════════════════════════════════════════════════════
// ═══════════════════════════════════════════════════════
// USDT 시세 등 CORS 미허용 API를 위한 프록시 헬퍼. 직접 호출을 먼저 시도하고,
// 막히면 아래 프록시들을 병렬로 시도해 가장 빠른 성공을 사용.
// (죽은 corsproxy.io/thingproxy는 제외. 살아있는 것들만 유지 — 하나 죽어도 나머지로 대체됨)
const PROXIES = [
  'https://api.allorigins.win/raw?url=',
  'https://api.codetabs.com/v1/proxy/?quest=',
];

async function fetchProxy(url, isJson=true) {
  try {
    const direct = fetch(url, {signal:AbortSignal.timeout(3000)})
      .then(r=>r.ok?(isJson?r.json():r.text()):Promise.reject('direct_fail'));
    const proxies = PROXIES.map(px=>
      fetch(px+encodeURIComponent(url),{signal:AbortSignal.timeout(6000)})
        .then(r=>r.ok?(isJson?r.json():r.text()):Promise.reject('proxy_fail'))
    );
    return await Promise.any([direct, ...proxies]);
  } catch(e){}
  return null;
}

// ═══════════════════════════════════════════════════════
// UI RENDERING — 카드 생성 (순수 화면 표시용, 계산 로직 아님)
// ═══════════════════════════════════════════════════════
function fmtP(v){
  if(v==null||isNaN(v))return'—';
  const n=Number(v);
  return'$'+n.toLocaleString('en',{minimumFractionDigits:n<10?4:n<1000?2:0,maximumFractionDigits:n<10?4:n<1000?2:0});
}
function fmtN(v){
  if(v==null||isNaN(v))return'0';
  return Number(v).toLocaleString('en',{maximumFractionDigits:0});
}
function col(r){
  if(r>=.9)return C.green;if(r>=.75)return C.green2;if(r>=.55)return C.green3;
  if(r>=.35)return C.yellow;if(r>=.2)return C.orange;return C.red;
}
function pillCls(sig){
  const s=(sig||'').toLowerCase();
  if(s.includes('bottom')||s.includes('safe')||s.includes('accumul')||s.includes('recovery')||
     s.includes('near bottom')||s.includes('backwardation')||s.includes('early cycle')||
     s.includes('ideal')||s.includes('capitul')||s.includes('record'))return'p-g';
  if(s.includes('mid')||s.includes('mild')||s.includes('neutral')||s.includes('watch')||
     s.includes('transitioning')||s.includes('borderline'))return'p-y';
  if(s.includes('overheat')||s.includes('fomo')||s.includes('euphoria')||s.includes('distribution')||
     s.includes('overload')||s.includes('alt season')||s.includes('late cycle')||
     s.includes('extreme greed')||s.includes('near ath'))return'p-r';
  return'p-o';
}

const IND_KEY_MAP={
  mvrv_z:    {buy:'ind_mvrv_z',  sell:'ind_sell_mvrv', desc:'desc_mvrv_z'},
  nupl:      {buy:'ind_nupl',    sell:'ind_sell_nupl',  desc:'desc_nupl'},
  realized:  {buy:'ind_realized',sell:'ind_realized',   desc:'desc_realized'},
  hash_ribbon:{buy:'ind_hash',   sell:'ind_hash',       desc:'desc_hash'},
  sth_sopr:  {buy:'ind_sth_sopr',sell:'ind_sell_sopr',  desc:'desc_sopr'},
  funding:   {buy:'ind_funding', sell:'ind_sell_funding',desc:'desc_funding'},
  cb_premium:{buy:'ind_cbp',     sell:'ind_sell_cbp',   desc:'desc_cbp'},
  lth_supply:{buy:'ind_lth',     sell:'ind_sell_lth',   desc:'desc_lth'},
  dom:       {buy:'ind_dom',     sell:'ind_sell_dom',   desc:'desc_dom'},
  halving:   {buy:'ind_halving', sell:'ind_sell_halving',desc:'desc_halving'},
  btc_corr:  {buy:'ind_btc_corr',sell:'ind_btc_corr',   desc:'desc_btc_corr'},
  ath_pos:   {buy:'ind_halving', sell:'ind_sell_ath',   desc:'desc_halving'},
  alt_valuation: {buy:'ind_alt_valuation', sell:'ind_alt_valuation', desc:'desc_alt_valuation'},
  alt_drawdown:  {buy:'ind_alt_drawdown',  sell:'ind_alt_drawdown',  desc:'desc_alt_drawdown'},
  alt_short_valuation: {buy:'ind_alt_short_val', sell:'ind_alt_short_val', desc:'desc_alt_short_val'},
  alt_short_ath:        {buy:'ind_alt_short_ath', sell:'ind_alt_short_ath', desc:'desc_alt_short_ath'},
  rsi:           {buy:'ind_rsi', sell:'ind_rsi', desc:'desc_rsi'},
  vol_change:    {buy:'ind_vol_change', sell:'ind_vol_change', desc:'desc_vol_change'},
  btc_corr_tech: {buy:'ind_btc_corr_tech', sell:'ind_btc_corr_tech', desc:'desc_btc_corr_tech'},
  buy_pressure:  {buy:'ind_buy_pressure', sell:'ind_buy_pressure', desc:'desc_buy_pressure'},
  sell_pressure: {buy:'ind_sell_pressure', sell:'ind_sell_pressure', desc:'desc_sell_pressure'},
};

// 지표 키 → 관련 블로그 가이드 slug. 없는 키는 버튼 자체를 숨김.
const GUIDE_LINK_MAP={
  mvrv_z:'mvrv-z-score', nupl:'nupl-indicator', realized:'realized-cap-guide',
  hash_ribbon:'hash-ribbon-indicator', sth_sopr:'sth-sopr', funding:'funding-rate-futures-gap',
  cb_premium:'coinbase-premium', lth_supply:'long-term-holder-supply', dom:'btc-dominance',
  halving:'bitcoin-halving-timing', ath_pos:'ath-drawdown', alt_drawdown:'ath-drawdown',
  alt_short_ath:'ath-drawdown', rsi:'rsi-bitcoin',
  alt_valuation:'200-week-moving-average', alt_short_valuation:'200-week-moving-average',
  btc_corr:'btc-dominance', btc_corr_tech:'btc-correlation-guide',
  buy_pressure:'buy-sell-led-volume-guide', sell_pressure:'buy-sell-led-volume-guide',
  vol_change:'volume-acceleration-guide',
};

function makeCard(d,mode='buy'){
  if(!d)return'';
  const r=d.score/d.max;
  const clr=col(r);
  const pc=pillCls(d.signal||''); // 뱃지 색상 분류는 원문(영어) 기준으로 그대로 판정 (번역 텍스트로는 매칭 안 되므로)
  const ko=currentLang==='ko'; // 블로그 링크 접미사 등에서 계속 사용
  const km=IND_KEY_MAP[d.key]||{};
  const lk=mode==='sell'?km.sell:km.buy;
  const localLabel=lk?(T(lk)||d.label):d.label;
  const dk=km.desc;
  const detDesc=dk?(T(dk)||d.note||''):(d.note||'');
  const valLbl=TT({ko:'현재값',en:'Value',ja:'現在値',es:'Valor',de:'Wert'});
  const scoreLbl=TT({ko:'점수',en:'Score',ja:'スコア',es:'Puntuación',de:'Score'});
  const targetLbl=TT({ko:'목표',en:'Target',ja:'目標',es:'Objetivo',de:'Ziel'});
  const detailLbl=TT({ko:'▼ 탭하여 설명 보기',en:'▼ Tap for details',ja:'▼ タップして詳細を見る',es:'▼ Toca para ver detalles',de:'▼ Tippen für Details'});
  const localSignal=translateSignal(d.signal||'');
  const localTarget=translateTarget(d.target||'—');
  const vStr=`${d.value}${d.unit||''}`;
  const guideSlug=GUIDE_LINK_MAP[d.key];
  const blogSuffixVal = blogSuffix(currentLang);
  const guideBtn=guideSlug?`<a href="/blog/${guideSlug}.php${blogSuffixVal}" target="_blank" rel="noopener"
      onclick="event.stopPropagation()"
      style="display:inline-flex;align-items:center;gap:4px;margin-top:8px;font-size:10px;color:var(--orange);
      text-decoration:none;border:1px solid rgba(247,147,26,.3);border-radius:6px;padding:4px 8px">
      📖 ${TT({ko:'가이드 보기',en:'Read Guide',ja:'ガイドを見る',es:'Ver Guía',de:'Anleitung ansehen'})} →</a>`:'';
  return`<div class="icard" onclick="this.classList.toggle('expanded')">
    <div class="icard-top">
      <span class="icard-name">${localLabel}<span class="pill ${pc}">${localSignal}</span></span>
      <span class="icard-wt">${d.max}pt</span>
    </div>
    <div class="icard-score">
      <span class="icard-n" style="color:${clr}">${d.score}</span>
      <span class="icard-m">/ ${d.max}</span>
    </div>
    <div class="ibar"><div class="ibf" style="width:${Math.round(r*100)}%;background:${clr}"></div></div>
    <div class="icard-vals">
      <div class="vbox"><div class="vl">${valLbl}</div><div class="vv">${vStr}</div></div>
      <div class="vbox"><div class="vl">${scoreLbl}</div><div class="vv" style="color:${clr}">${d.score}/${d.max}</div></div>
      <div class="vbox" style="grid-column:1/-1"><div class="vl">${targetLbl}</div><div class="vv" style="font-size:9px;color:var(--t2)">${localTarget}</div></div>
    </div>
    <div class="icard-note">
      <div style="font-size:9px;color:var(--t3);margin-bottom:6px">${detailLbl}</div>
      <div style="white-space:pre-line;line-height:1.6;color:var(--t2);font-size:10px">${detDesc}</div>
      ${guideBtn}
    </div>
  </div>`;
}
function validSOPR(v){return typeof v==='number'&&!isNaN(v)&&v>=0.90&&v<=1.10;}

// ═══════════════════════════════════════════════════════
// API FETCHER — 백엔드(PHP)에서 완성된 점수 결과를 받아옴
// 점수 계산 로직(calcBuy/calcSell)은 서버에서만 실행되며 클라이언트에 노출되지 않음
// ═══════════════════════════════════════════════════════
async function fetchScoreFromAPI(coin, mode) {
  const url = `/api.php?coin=${coin}&mode=${mode}`;
  const cacheKey = `btct_cache_${coin}_${mode}`;
  const cacheTtl = 90 * 1000; // 90초 — 서버 캐시(60초)보다 약간 길게

  // 캐시된 데이터가 있으면 즉시 반환 (화면이 바로 뜸)
  try {
    const cached = localStorage.getItem(cacheKey);
    if(cached) {
      const {data, ts} = JSON.parse(cached);
      if(Date.now() - ts < cacheTtl) return data; // 아직 신선함 → 그대로 사용
      // 만료됐어도 일단 캐시를 먼저 보여주고 백그라운드에서 갱신
      if(data) {
        fetch(url, {signal: AbortSignal.timeout(20000)})
          .then(r => r.ok ? r.json() : null)
          .then(fresh => { if(fresh) localStorage.setItem(cacheKey, JSON.stringify({data:fresh, ts:Date.now()})); })
          .catch(()=>{});
        return data;
      }
    }
  } catch(e){}

  // 캐시 없음 → 직접 fetch
  let res;
  try {
    res = await fetch(url, {signal: AbortSignal.timeout(20000)});
  } catch(fetchErr) {
    // 네트워크 오류 또는 타임아웃 — 오버레이에 에러 표시
    const ov=document.getElementById('overlay');
    const txt=document.getElementById('ovTxt');
    if(ov) ov.style.display='flex';
    if(txt) txt.innerHTML=TT({ko:`⚠ 서버 응답 없음<br><small style="color:#888">새로고침하거나 잠시 후 다시 시도해주세요</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">재시도</button>`,en:`⚠ No server response<br><small style="color:#888">Please refresh or try again shortly</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Retry</button>`,ja:`⚠ サーバーからの応答がありません<br><small style="color:#888">更新するか、しばらくしてから再度お試しください</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">再試行</button>`,es:`⚠ Sin respuesta del servidor<br><small style="color:#888">Actualiza o inténtalo de nuevo en breve</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Reintentar</button>`,de:`⚠ Keine Serverantwort<br><small style="color:#888">Bitte aktualisieren oder in Kürze erneut versuchen</small><br><button onclick="loadAll()" style="margin-top:12px;padding:8px 20px;background:var(--orange);color:#000;border:none;border-radius:8px;cursor:pointer;font-weight:700">Erneut versuchen</button>`});
    throw fetchErr;
  }
  if (!res.ok) throw new Error(`API error: ${res.status}`);
  const data = await res.json();

  // 서버가 상폐/변경된 코인이라고 알려주면, 자동으로 목록에서 숨기고 다른 코인으로 전환
  if (data && data.error === 'coin_unavailable') {
    const deadId = (data.coin || coin);
    markCoinDelisted(deadId); // 목록·즐겨찾기에서 자동 제거 + 기억
    // 살아있는 즐겨찾기 코인으로 자동 전환 (없으면 BTC)
    const alive = getFavoriteCoins().filter(c => c.id !== deadId);
    const next = alive.length ? alive[0].id : 'BTC';
    if (next !== currentCoin && next !== deadId) {
      setTimeout(() => { try { switchCoin(next); } catch(e){} }, 30);
    }
    // 짧은 토스트성 안내 (오버레이 대신)
    try {
      const ov=document.getElementById('overlay');
      const txt=document.getElementById('ovTxt');
      if(ov) ov.style.display='flex';
      if(txt) txt.innerHTML=TT({
        ko:`⚠ ${deadId}는 상장폐지되어 목록에서 제거했습니다<br><small style="color:#888">다른 코인으로 전환합니다…</small>`,
        en:`⚠ ${deadId} was delisted and removed from your list<br><small style="color:#888">Switching to another coin…</small>`,
        ja:`⚠ ${deadId}は上場廃止のためリストから削除しました<br><small style="color:#888">他のコインに切り替えます…</small>`,
        es:`⚠ ${deadId} fue retirada y eliminada de tu lista<br><small style="color:#888">Cambiando a otra moneda…</small>`,
        de:`⚠ ${deadId} wurde delistet und aus der Liste entfernt<br><small style="color:#888">Wechsle zu einem anderen Coin…</small>`
      });
      setTimeout(() => { if(ov) ov.style.display='none'; }, 2500);
    } catch(e){}
    throw new Error('coin_unavailable');
  }

  // 새 데이터 캐시 저장
  try { localStorage.setItem(cacheKey, JSON.stringify({data, ts:Date.now()})); } catch(e){}
  return data;
}


function renderAll(ind) {
  // 데이터가 도착했으니 로딩 스켈레톤 제거
  ['scoreNum','scoreAction','reachPct','mPrice','mFG','mRP','mMA'].forEach(id=>{
    const el=document.getElementById(id); if(el) el.classList.remove('sk-load');
  });
  // 타이틀에 BTC 가격 노출 (BTC 탭일 때만, 다른 코인이면 코인명 표시)
  try {
    const priceForTitle = livePrice || ind.price;
    if(priceForTitle) {
      // 메인 가격 카드와 동일한 포맷(fmtP) 사용 — 저가 코인 소수점 유지, 표기 일관성
      const priceStr = fmtP(priceForTitle);
      document.title = `${currentCoin} ${priceStr} — BTCtiming.com`;
    }
  } catch(e){}
  // 오버레이 즉시 숨김
  const ov=document.getElementById('overlay');if(ov)ov.style.display='none';
  // 점수 계산은 서버(PHP)에서 완료되어 ind._buyResult / ind._sellResult로 전달됨
  let result;
  try {
    if(currentMode==='buy') {
      result = ind._buyResult;
    } else {
      result = ind._sellResult;
    }
    if(!result) throw new Error('No score result from server');
  } catch(calcErr) {
    document.getElementById('err').textContent='⚠ Calc Error: '+calcErr.message;
    document.getElementById('err').style.display='block';
    return;
  }
  indCache[currentCoin] = ind;

  const sc = result.final;
  const isInvert = currentMode==='sell';
  const scoreColor = isInvert ? (sc>=7?C.red:sc>=5?C.orange:C.yellow) : col(sc/10);
  const isKo = currentLang==='ko'; // 블로그 링크 등에서 계속 사용

  // 섹션 헤더 다국어화
  const secMap = {
    'sec_onchain': TT({ko:'온체인 밸류에이션',en:'ON-CHAIN VALUATION',ja:'オンチェーン バリュエーション',es:'VALORACIÓN ON-CHAIN',de:'ON-CHAIN-BEWERTUNG'}),
    'sec_miner':   TT({ko:'채굴자 / 심리',en:'MINER / SENTIMENT',ja:'マイナー / センチメント',es:'MINERO / SENTIMIENTO',de:'MINER / SENTIMENT'}),
    'sec_inst':    TT({ko:'기관 수급 (선행)',en:'INSTITUTIONAL FLOW',ja:'機関資金フロー (先行)',es:'FLUJO INSTITUCIONAL (adelantado)',de:'INSTITUTIONELLER FLUSS (Vorlauf)'}),
    'sec_cycle':   TT({ko:'사이클 위치',en:'CYCLE POSITION',ja:'サイクル位置',es:'POSICIÓN DEL CICLO',de:'ZYKLUSPOSITION'}),
    'sec_breakdown': TT({ko:'점수 합산',en:'Score Breakdown',ja:'スコア内訳',es:'Desglose de Puntuación',de:'Score-Aufschlüsselung'}),
    'sec_macro':   TT({ko:'매크로 경고등',en:'MACRO WARNINGS',ja:'マクロ警告',es:'ADVERTENCIAS MACRO',de:'MAKRO-WARNUNGEN'}),
    'sec_history': TT({ko:'점수 히스토리',en:'Score History',ja:'スコア履歴',es:'Historial de Puntuación',de:'Score-Verlauf'}),
    'sec_histSub': TT({ko:'브라우저 로컬 저장',en:'Saved locally in browser',ja:'ブラウザにローカル保存',es:'Guardado localmente en el navegador',de:'Lokal im Browser gespeichert'}),
  };
  Object.entries(secMap).forEach(([key,val])=>{
    document.querySelectorAll('[data-i="'+key+'"]').forEach(el=>{
      const span = el.querySelector('span');
      if(span) {
        const txt = el.childNodes[0];
        if(txt && txt.nodeType===3) txt.textContent=val+' ';
      } else el.textContent=val;
    });
  });

  // 모드 버튼 (언어 무관하게 동일 표기)
  const modeBuyEl=document.getElementById('modeBuy');
  const modeSellEl=document.getElementById('modeSell');
  if(modeBuyEl) modeBuyEl.textContent='📈 LONG';
  if(modeSellEl) modeSellEl.textContent='📉 SHORT';

  // 사이드바 라벨 다국어화
  document.querySelectorAll('.mini-stat .lbl').forEach((el,i)=>{
    const keys = currentLang==='ko'
      ? ['현재가 · 바이낸스','공포·탐욕 지수','실현가 이격률','200주 이평선 (참고)']
      : currentLang==='ja'
      ? ['現在価格 · Binance','恐怖・強欲指数','実現価格乖離率','200週移動平均線 (参考)']
      : ['Price · Binance','Fear & Greed','Realized Price Gap','200W MA (ref)'];
    if(keys[i]) el.textContent=keys[i];
  });

  // 분할 계획 헤더
  const splitHd=document.querySelector('.split-hd');
  if(splitHd) splitHd.textContent=TT({ko:'단계별 진입 계획',en:'Split Entry Plan',ja:'段階別エントリー計画',es:'Plan de Entrada Escalonada',de:'Gestaffelter Einstiegsplan'});
  const scoreLabel2=document.getElementById('scoreLabel');
  if(scoreLabel2) scoreLabel2.textContent = currentMode==='buy'
    ? TT({ko:'롱 타이밍 점수',en:'LONG TIMING SCORE',ja:'ロング タイミングスコア',es:'PUNTUACIÓN DE TIMING LARGO',de:'LONG-TIMING-SCORE'})
    : TT({ko:'숏 타이밍 점수',en:'SHORT TIMING SCORE',ja:'ショート タイミングスコア',es:'PUNTUACIÓN DE TIMING CORTO',de:'SHORT-TIMING-SCORE'});

  // Score card
  const snEl=document.getElementById('scoreNum');
  if(snEl){
    snEl.textContent=sc.toFixed(1);
    snEl.style.setProperty('color', scoreColor, 'important');
    snEl.style.fontSize='64px';
    snEl.style.fontWeight='800';
    snEl.style.display='inline';
  }
  // 액션 코드(FULL LONG, WATCH 등)는 백엔드(score_calc.php)가 영어 코드로만 내려주므로,
  // 화면에 보여줄 땐 언어별로 번역해서 표시. (이전엔 result.action을 그대로 찍어서 모든 언어에서 항상 영어로만 보였음)
  const actionLabelMap = {
    'FULL LONG':    TT({ko:'전량 진입',en:'FULL LONG',ja:'全量エントリー',es:'LONG TOTAL',de:'VOLL-LONG'}),
    'ADD LONG':     TT({ko:'비중 확대',en:'ADD LONG',ja:'比率拡大',es:'MÁS LONG',de:'LONG+'}),
    'SPLIT LONG':   TT({ko:'분할 진입',en:'SPLIT LONG',ja:'分割エントリー',es:'LONG PARCIAL',de:'TEIL-LONG'}),
    'WATCH':        TT({ko:'관찰',en:'WATCH',ja:'様子見',es:'ESPERAR',de:'WARTEN'}),
    'SPLIT EXIT':   TT({ko:'분할 청산',en:'SPLIT EXIT',ja:'分割決済',es:'SALIDA PARCIAL',de:'TEIL-EXIT'}),
    'EXIT LONG':    TT({ko:'청산 권고',en:'EXIT LONG',ja:'決済推奨',es:'SALIR',de:'EXIT'}),
    'FULL SHORT':   TT({ko:'풀 숏 진입',en:'FULL SHORT',ja:'フルショート',es:'SHORT TOTAL',de:'VOLL-SHORT'}),
    'ADD SHORT':    TT({ko:'숏 확대',en:'ADD SHORT',ja:'ショート拡大',es:'MÁS SHORT',de:'SHORT+'}),
    'PREPARE SHORT':TT({ko:'숏 준비',en:'PREPARE SHORT',ja:'ショート準備',es:'PREPARAR',de:'BEREIT'}),
    'EXIT SHORT':   TT({ko:'숏 청산',en:'EXIT SHORT',ja:'ショート決済',es:'SALIR',de:'EXIT'}),
  };
  document.getElementById('scoreAction').textContent=actionLabelMap[result.action] || result.action;
  document.getElementById('scoreAction').style.color=result.acolor;
  // 액션 설명
  const descEl = document.getElementById('scoreDesc');
  if(descEl) {
    let descTxt = '';
    if(currentMode === 'buy') {
      const buyDescMap = {
        'FULL LONG':    TT({ko:'최강 신호. 풀 롱 or 레버리지 진입.',en:'Max signal. Full long entry.',ja:'最強シグナル。フルロングまたはレバレッジエントリー。',es:'Señal máxima. Largo total o entrada apalancada.',de:'Maximales Signal. Voller Long oder gehebelter Einstieg.'}),
        'ADD LONG':     TT({ko:'강한 신호. 목표 비중 70~100% 진입.',en:'Strong signal. 70~100% of target.',ja:'強いシグナル。目標比率70~100%でエントリー。',es:'Señal fuerte. Entrada 70~100% del objetivo.',de:'Starkes Signal. Einstieg 70~100% des Ziels.'}),
        'SPLIT LONG':   TT({ko:'분할 시작. 목표 비중 30~50% 진입.',en:'Split entry. 30~50% of target.',ja:'分割開始。目標比率30~50%でエントリー。',es:'Inicio escalonado. Entrada 30~50% del objetivo.',de:'Staffelung startet. Einstieg 30~50% des Ziels.'}),
        'WATCH':        TT({ko:'관찰 구간. 소량 선진입 or 트리거 대기.',en:'Watch. Small entry or await trigger.',ja:'様子見ゾーン。少量の先行エントリーまたはトリガー待ち。',es:'Zona de observación. Entrada pequeña o esperar disparador.',de:'Beobachtungszone. Kleiner Voreinstieg oder auf Trigger warten.'}),
        'SPLIT EXIT':   TT({ko:'일부 정리. 리스크 관리 구간.',en:'Partial exit. Risk management zone.',ja:'一部決済。リスク管理ゾーン。',es:'Salida parcial. Zona de gestión de riesgo.',de:'Teilausstieg. Risikomanagement-Zone.'}),
        'EXIT LONG':    TT({ko:'전량 청산 고려. 고점 경고.',en:'Consider full exit. Top warning.',ja:'全量決済を検討。天井警告。',es:'Considerar salida total. Advertencia de techo.',de:'Vollständigen Ausstieg erwägen. Top-Warnung.'}),
      };
      descTxt = buyDescMap[result.action] || (currentLang==='ko' ? (result.actionDesc || '') : '');
    } else {
      // 백엔드(score_calc.php)는 한글 설명만 내려주므로, 영어/일본어 모드에서는 별도 번역 맵을 사용
      const sellDescMap = {
        'FULL SHORT':    TT({ko:'극단 과열. 풀 숏 진입.',en:'Extreme overheat. Full short entry.',ja:'極端な過熱。フルショートエントリー。',es:'Sobrecalentamiento extremo. Entrada corta total.',de:'Extreme Überhitzung. Vollständiger Short-Einstieg.'}),
        'ADD SHORT':     TT({ko:'강한 과열. 숏 비중 확대.',en:'Strong overheat. Increase short.',ja:'強い過熱。ショート比率拡大。',es:'Sobrecalentamiento fuerte. Aumentar posición corta.',de:'Starke Überhitzung. Short-Position erhöhen.'}),
        'PREPARE SHORT': TT({ko:'과열 시작. 숏 준비.',en:'Overheat starting. Prepare short.',ja:'過熱開始。ショート準備。',es:'Inicio de sobrecalentamiento. Preparar corto.',de:'Überhitzung beginnt. Short vorbereiten.'}),
        'WATCH':         TT({ko:'중립 관찰.',en:'Neutral watch.',ja:'中立の様子見。',es:'Observación neutral.',de:'Neutrale Beobachtung.'}),
        'SPLIT EXIT':    TT({ko:'저점 근접. 숏 분할 청산.',en:'Near bottom. Scale out of short.',ja:'底値接近。ショート分割決済。',es:'Cerca del suelo. Salida escalonada del corto.',de:'Nahe am Tief. Gestaffelter Short-Ausstieg.'}),
        'EXIT SHORT':    TT({ko:'바닥. 숏 즉시 청산.',en:'Bottom zone. Exit short immediately.',ja:'底値圏。ショート即時決済。',es:'Suelo. Cerrar corto inmediatamente.',de:'Boden. Short sofort schließen.'}),
      };
      descTxt = sellDescMap[result.shortSignal] || (currentLang==='ko' ? (result.shortDesc || '') : '');
    }
    descEl.textContent = descTxt;
    descEl.style.color = result.acolor;
  }
  lastResultDetails = result.details; // Why 패널이 최신 지표 breakdown을 참조할 수 있도록 저장
  // Why 패널이 열려 있으면 최신 details로 다시 그린다 (롱↔숏/코인 전환 시 이전 내용이 남는 버그 방지)
  const _whyPanel = document.getElementById('whyPanel');
  if (_whyPanel && _whyPanel.style.display !== 'none') renderWhyPanel();
  renderMiniHistory();
  document.getElementById('scoreSub').textContent=`${currentCoin} · ${T(currentMode==='buy'?'modeSub_buy':'modeSub_sell')}`;
  const slEl=document.getElementById('scoreLabel');
  if(slEl) slEl.textContent=T(currentMode==='buy'?'modeTitle_buy':'modeTitle_sell');

  const reach=result.reach;
  document.getElementById('reachPct').textContent=reach+'%';
  document.getElementById('reachPct').style.color=scoreColor;
  document.getElementById('reachBar').style.width=reach+'%';
  document.getElementById('reachBar').style.background=scoreColor;

  // Action bar
  // ── 액션바: 전체 점수 스펙트럼 표시 ──────────────────────
  const abarEl = document.getElementById('abar');
  if(abarEl) {
    // LONG 모드: 0점(Exit Long) → 9+점(Add Long) 스펙트럼
    // SHORT 모드: 0점(Exit Short) → 9+점(Add Short) 반대 스펙트럼
    const segments = currentMode === 'buy' ? [
      {min:0,  max:3.5, bg:'#2d0a0a', color:'#ef4444', en:'EXIT LONG',  ko:'롱청산',  ja:'ロング決済', es:'SALIR', de:'EXIT', s:'≤3.5'},
      {min:3.5,max:5.0, bg:'#2d1a0a', color:'#f97316', en:'SPLIT EXIT', ko:'분할청산', ja:'分割決済', es:'PARCIAL', de:'TEIL-EXIT', s:'3.5~5'},
      {min:5.0,max:6.0, bg:'#2d2a00', color:'#fbbf24', en:'WATCH',      ko:'관찰',    ja:'観察', es:'ESPERAR', de:'WARTEN', s:'5~6'},
      {min:6.0,max:7.0, bg:'#0d2208', color:'#86efac', en:'SPLIT LONG', ko:'분할매수', ja:'分割買い', es:'ENTRAR', de:'TEIL-LONG', s:'6~7'},
      {min:7.0,max:8.0, bg:'#071a05', color:'#4ade80', en:'ADD LONG',   ko:'추가매수', ja:'追加買い', es:'LONG+', de:'LONG+', s:'7~8'},
      {min:8.0,max:11,  bg:'#041203', color:'#22c55e', en:'FULL LONG',  ko:'풀롱',    ja:'フルロング', es:'TODO LONG', de:'VOLL-LONG', s:'8+'},
    ] : [
      {min:0,  max:3.5, bg:'#041203', color:'#22c55e', en:'EXIT SHORT', ko:'숏청산',  ja:'ショート決済', es:'SALIR', de:'EXIT', s:'≤3.5'},
      {min:3.5,max:5.0, bg:'#071a05', color:'#4ade80', en:'SPLIT EXIT', ko:'분할청산', ja:'分割決済', es:'PARCIAL', de:'TEIL-EXIT', s:'3.5~5'},
      {min:5.0,max:6.0, bg:'#2d2a00', color:'#fbbf24', en:'WATCH',      ko:'관찰',    ja:'観察', es:'ESPERAR', de:'WARTEN', s:'5~6'},
      {min:6.0,max:7.0, bg:'#2d1a0a', color:'#f97316', en:'PREPARE',    ko:'숏준비',  ja:'ショート準備', es:'PREPARAR', de:'BEREIT', s:'6~7'},
      {min:7.0,max:8.0, bg:'#2d0a0a', color:'#ef4444', en:'ADD SHORT',  ko:'숏추가',  ja:'ショート追加', es:'SHORT+', de:'SHORT+', s:'7~8'},
      {min:8.0,max:11,  bg:'#1a0505', color:'#dc2626', en:'FULL SHORT', ko:'풀숏',    ja:'フルショート', es:'TODO SHORT', de:'VOLL-SHORT', s:'8+'},
    ]
    // 2줄 레이아웃: 위 4개 / 아래 3개
    const top4 = segments.slice(0, 3);
    const bot3 = segments.slice(3);
    const makeRow = (segs) => segs.map((seg) => {
      const active = sc >= seg.min && sc < seg.max;
      const segLabel = seg[currentLang] || seg.en;
      return `<div style="flex:1;min-width:0;display:flex;flex-direction:column;align-items:center;justify-content:center;
        background:${seg.bg};color:#f5f5f5;font-size:9px;gap:1px;padding:4px 2px;
        cursor:default;border-radius:0;border-bottom:3px solid ${seg.color};
        ${active?'outline:2px solid rgba(255,255,255,.55);outline-offset:-2px;font-weight:700;font-size:10px':''}">
        <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:100%;text-align:center;color:#f5f5f5">${segLabel}</span>
        <span style="font-size:7px;opacity:.75;color:#f5f5f5">${seg.s}</span>
      </div>`;
    }).join('');
    abarEl.style.flexDirection = 'column';
    abarEl.style.height = 'auto';
    abarEl.style.overflow = 'visible';
    abarEl.innerHTML =
      `<div style="display:flex;border-radius:6px 6px 0 0;overflow:hidden;height:38px">${makeRow(top4)}</div>` +
      `<div style="display:flex;border-radius:0 0 6px 6px;overflow:hidden;height:38px;margin-top:1px">${makeRow(bot3)}</div>`;
  }

  // Mini stats
  const p=ind.price;
  if(livePrice) {
    document.getElementById('mPrice').textContent=fmtP(livePrice);
  } else {
    document.getElementById('mPrice').textContent=fmtP(p);
    document.getElementById('mPriceSub').textContent=`ATH ${ind.ath_drop?.toFixed(1)||'—'}%`;
  }

  const fg=ind.fear_greed;
  document.getElementById('mFG').textContent=fg;
  document.getElementById('mFG').style.color=fg<=25?C.red:fg<=45?C.yellow:C.green;
  document.getElementById('mFGLbl').textContent=ind.fg_label||'';

  const rpGap=ind.realized_price>0?((p-ind.realized_price)/ind.realized_price*100):0;
  document.getElementById('mRP').textContent=(rpGap>=0?'+':'')+rpGap.toFixed(1)+'%';
  document.getElementById('mRP').style.color=rpGap<0?C.green:rpGap<5?C.green2:C.yellow;
  document.getElementById('mRPSub').textContent=`Realized ~${fmtP(ind.realized_price)}`;

  const maGap=ind.ma200w>0?((p-ind.ma200w)/ind.ma200w*100):0;
  document.getElementById('mMA').textContent=(maGap>=0?'+':'')+maGap.toFixed(1)+'%';
  document.getElementById('mMA').style.color=maGap<0?C.green:C.yellow;
  document.getElementById('mMASub').textContent=`200W MA ${fmtP(ind.ma200w)} (ref)`;

  // Sell/Long exit panel
  // 패널 표시/숨김
  const spEl=document.getElementById('sellPanel');
  const lgEl=document.getElementById('longGuidePanel');
  if(spEl) spEl.style.display=currentMode==='sell'?'block':'none';
  if(lgEl) lgEl.style.display=currentMode==='buy'?'block':'none';

  if(currentMode==='sell') {
    const sc=result.final;
    const el=(id)=>document.getElementById(id);
    let stMain,stDesc,gAction,gDesc,exitSig,exitDesc;

    if(sc>=8.0){
      stMain=TT({ko:'🔴 극단 과열 — 역대 고점 수준',en:'🔴 Extreme Overheat — Historical Top',ja:'🔴 極端な過熱 — 歴代高値水準',es:'🔴 Sobrecalentamiento Extremo — Nivel de Techo Histórico',de:'🔴 Extreme Überhitzung — Historisches Hoch-Niveau'});
      stDesc=TT({ko:'모든 과열 지표가 위험 구간. 2021년 11월 ATH 직전과 유사한 패턴.',en:'All overheat indicators in danger zone.',ja:'全ての過熱指標が危険水準。2021年11月のATH直前と類似したパターン。',es:'Todos los indicadores de sobrecalentamiento en zona de peligro. Patrón similar al justo antes del ATH de noviembre 2021.',de:'Alle Überhitzungsindikatoren im Gefahrenbereich. Ähnliches Muster wie kurz vor dem ATH im November 2021.'});
      gAction=TT({ko:'FULL SHORT — 풀 숏 진입',en:'FULL SHORT — Full short entry',ja:'FULL SHORT — フルショートエントリー',es:'SHORT TOTAL — Entrada corta total',de:'VOLL-SHORT — Vollständiger Short-Einstieg'});
      gDesc=TT({ko:'목표 비중 100% 숏 진입. 레버리지 숏 고려 가능. 스탑로스: ATH +5% 위 설정.',en:'Enter 100% short. Leverage possible. Stop loss: 5% above ATH.',ja:'目標比率100%でショートエントリー。レバレッジショートも検討可。ストップロス: ATH+5%上に設定。',es:'Entrada corta 100% del objetivo. Corto apalancado posible. Stop loss: 5% por encima del ATH.',de:'Short-Einstieg 100% des Ziels. Gehebelter Short möglich. Stop-Loss: 5% über ATH.'});
      exitSig=TT({ko:'청산 조건 (중요)',en:'Exit Conditions (Important)',ja:'決済条件 (重要)',es:'Condiciones de Salida (Importante)',de:'Ausstiegsbedingungen (Wichtig)'});
      exitDesc=TT({ko:'• MVRV Z 2.5 이하 하락\n• Fear & Greed 50 이하\n• 선물 갭 0.05% 이하로 축소',en:'• MVRV Z drops below 2.5\n• Fear & Greed below 50\n• Futures gap shrinks below 0.05%',ja:'• MVRV Zが2.5以下に低下\n• Fear & Greedが50以下\n• 先物ギャップが0.05%以下に縮小',es:'• MVRV Z cae por debajo de 2.5\n• Fear & Greed por debajo de 50\n• Brecha de futuros se reduce por debajo de 0.05%',de:'• MVRV Z fällt unter 2,5\n• Angst & Gier unter 50\n• Futures-Spread schrumpft unter 0,05%'});
    } else if(sc>=7.0){
      stMain=TT({ko:'🔴 강한 과열 신호',en:'🔴 Strong Overheat Signal',ja:'🔴 強い過熱シグナル',es:'🔴 Señal de Sobrecalentamiento Fuerte',de:'🔴 Starkes Überhitzungssignal'});
      stDesc=TT({ko:'주요 과열 지표들이 경고 수준. 탐욕 지수와 선물 포지션이 과도하게 롱 쏠림.',en:'Key overheat indicators at warning levels. Extreme long bias.',ja:'主要な過熱指標が警告水準。強欲指数と先物ポジションが過度にロングに偏っています。',es:'Los principales indicadores de sobrecalentamiento en nivel de advertencia. Índice de codicia y posiciones de futuros muy sesgados a largo.',de:'Wichtige Überhitzungsindikatoren auf Warnstufe. Gier-Index und Futures-Positionen stark long-lastig.'});
      gAction=TT({ko:'ADD SHORT — 숏 비중 확대',en:'ADD SHORT — Increase short',ja:'ADD SHORT — ショート比率拡大',es:'SHORT+ — Ampliar posición corta',de:'SHORT+ — Short-Position erhöhen'});
      gDesc=TT({ko:'기존 숏 있다면 목표 비중의 70~100%로 확대. 신규 진입은 분할로.',en:'If holding short, scale to 70~100%. New entry: split in.',ja:'既存ショートがあれば目標比率の70~100%まで拡大。新規エントリーは分割で。',es:'Si mantiene un corto, ampliar al 70~100% del objetivo. Nueva entrada de forma escalonada.',de:'Bei bestehendem Short auf 70~100% des Ziels erhöhen. Neueinstieg gestaffelt.'});
      exitSig=TT({ko:'숏 청산 조건',en:'Short Exit Conditions',ja:'ショート決済条件',es:'Condiciones de Salida Corta',de:'Short-Ausstiegsbedingungen'});
      exitDesc=TT({ko:'• NUPL 50% 이하\n• Fear & Greed 60 이하\n• Coinbase Premium 음수 전환',en:'• NUPL drops below 50%\n• Fear & Greed below 60\n• Coinbase Premium turns negative',ja:'• NUPLが50%以下\n• Fear & Greedが60以下\n• Coinbaseプレミアムがマイナスに転換',es:'• NUPL cae por debajo de 50%\n• Fear & Greed por debajo de 60\n• Coinbase Premium se vuelve negativo',de:'• NUPL fällt unter 50%\n• Angst & Gier unter 60\n• Coinbase Premium wird negativ'});
    } else if(sc>=6.0){
      stMain=TT({ko:'🟠 과열 시작 — 준비 구간',en:'🟠 Overheat Beginning — Prepare',ja:'🟠 過熱開始 — 準備ゾーン',es:'🟠 Inicio de Sobrecalentamiento — Zona de Preparación',de:'🟠 Überhitzung beginnt — Vorbereitungszone'});
      stDesc=TT({ko:'일부 지표가 과열 신호. 아직 확정은 아니지만 숏 준비할 타이밍.',en:'Some overheat signals. Not confirmed but time to prepare.',ja:'一部の指標が過熱シグナル。まだ確定ではないもののショート準備のタイミング。',es:'Algunos indicadores muestran sobrecalentamiento. Aún no confirmado, pero es momento de preparar corto.',de:'Einige Indikatoren zeigen Überhitzung. Noch nicht bestätigt, aber Zeit, Short vorzubereiten.'});
      gAction=TT({ko:'PREPARE SHORT — 소량 선진입',en:'PREPARE SHORT — Small entry',ja:'PREPARE SHORT — 少量の先行エントリー',es:'PREPARAR — Entrada pequeña anticipada',de:'BEREIT — Kleiner Voreinstieg'});
      gDesc=TT({ko:'목표 비중의 30~50% 소량 선진입. 추가 과열 확인 후 비중 확대.',en:'Enter 30~50% of target. Wait for confirmation to add.',ja:'目標比率の30~50%を少量先行エントリー。さらなる過熱確認後に拡大。',es:'Entrada pequeña anticipada 30~50% del objetivo. Ampliar tras confirmar más sobrecalentamiento.',de:'Kleiner Voreinstieg 30~50% des Ziels. Nach Bestätigung weiterer Überhitzung erhöhen.'});
      exitSig=TT({ko:'추가 확인 조건',en:'Confirmation needed',ja:'追加確認条件',es:'Confirmación necesaria',de:'Bestätigung erforderlich'});
      exitDesc=TT({ko:'• 다음 추가 조건 대기:\n• NUPL 60% 이상\n• Fear & Greed 75 이상',en:'• Wait for:\n• NUPL above 60%\n• Fear & Greed above 75',ja:'• 次の条件を待機:\n• NUPLが60%以上\n• Fear & Greedが75以上',es:'• Esperar próxima condición:\n• NUPL por encima de 60%\n• Fear & Greed por encima de 75',de:'• Warten auf nächste Bedingung:\n• NUPL über 60%\n• Angst & Gier über 75'});
    } else if(sc>=5.0){
      stMain=TT({ko:'🟡 중립 관찰 구간',en:'🟡 Neutral Watch Zone',ja:'🟡 中立の様子見ゾーン',es:'🟡 Zona de Observación Neutral',de:'🟡 Neutrale Beobachtungszone'});
      stDesc=TT({ko:'뚜렷한 방향성 없음. 과열도 저점도 아닌 중간 구간. 서두르지 마세요.',en:'No clear direction. Neither overheat nor bottom.',ja:'明確な方向性なし。過熱でも底値でもない中間ゾーン。焦らないでください。',es:'Sin dirección clara. Ni sobrecalentado ni en suelo, zona intermedia. No se apresure.',de:'Keine klare Richtung. Weder überhitzt noch am Tief, mittlere Zone. Nicht überstürzen.'});
      gAction=TT({ko:'WATCH — 진입 대기',en:'WATCH — Wait for signal',ja:'WATCH — エントリー待機',es:'ESPERAR — Esperar señal',de:'WARTEN — Auf Signal warten'});
      gDesc=TT({ko:'숏 진입 서두르지 마세요. 6.0점 이상 도달 시 행동. 현 시장 모니터링 지속.',en:'Do not rush. Act when score reaches 6.0+. Keep monitoring.',ja:'ショートエントリーを急がないでください。スコア6.0以上で行動。現市場を継続監視。',es:'No se apresure a entrar en corto. Actuar al alcanzar 6.0+. Seguir monitoreando el mercado actual.',de:'Nicht überstürzt short gehen. Bei Erreichen von 6,0+ handeln. Markt weiter beobachten.'});
      exitSig=TT({ko:'기존 숏 보유 중이라면',en:'If holding short position',ja:'既存ショート保有中の場合',es:'Si mantiene posición corta',de:'Bei bestehender Short-Position'});
      exitDesc=TT({ko:'• 목표 수익 50% 달성 시 절반 청산\n• 손절: 진입가 대비 +5%',en:'• Close 50% at 50% profit target\n• Stop loss: +5% from entry',ja:'• 目標利益50%達成時に半分決済\n• 損切り: エントリー価格比+5%',es:'• Cerrar la mitad al alcanzar 50% de ganancia objetivo\n• Stop loss: +5% desde entrada',de:'• Bei 50% Zielgewinn die Hälfte schließen\n• Stop-Loss: +5% vom Einstieg'});
    } else if(sc>=3.5){
      stMain=TT({ko:'🟢 과열 신호 부재 — 숏 위험',en:'🟢 No Overheat Signals — Short Risky',ja:'🟢 過熱シグナル不在 — ショートリスク高',es:'🟢 Sin Señales de Sobrecalentamiento — Corto Riesgoso',de:'🟢 Keine Überhitzungssignale — Short riskant'});
      stDesc=TT({ko:'현재 과열·고점 신호가 거의 없는 구간. 숏 포지션 보유 중이라면 일부 청산 권고. (※ 이 점수는 "지금 가격이 비싸 보이지 않는다"는 뜻이지, 실제 역사적 저점이라는 의미는 아닙니다.)',en:'Few overheat signals present right now. Partial exit recommended for shorts. (※ This means current price doesn\'t look overextended — not that it\'s an actual historical low.)',ja:'現在過熱・天井シグナルがほとんどないゾーン。ショートポジション保有中なら一部決済を推奨。(※このスコアは「今の価格が割高に見えない」という意味であり、実際の歴史的底値という意味ではありません。)',es:'Zona con casi ninguna señal de sobrecalentamiento o techo actualmente. Se recomienda salida parcial si mantiene posición corta. (※ Esta puntuación significa que "el precio actual no parece caro", no que sea un suelo histórico real.)',de:'Zone mit derzeit kaum Überhitzungs- oder Top-Signalen. Bei bestehender Short-Position wird Teilausstieg empfohlen. (※ Dieser Score bedeutet "aktueller Preis wirkt nicht teuer", nicht dass es sich um ein echtes historisches Tief handelt.)'});
      gAction=TT({ko:'SPLIT EXIT — 분할 청산',en:'SPLIT EXIT — Scale out',ja:'SPLIT EXIT — 分割決済',es:'PARCIAL — Salida escalonada',de:'TEIL-EXIT — Gestaffelter Ausstieg'});
      gDesc=TT({ko:'기존 숏의 50% 청산. 나머지는 추가 하락 관찰 후 판단. 신규 숏 진입 절대 금지.',en:'Close 50% of short. Hold rest carefully. No new short entries.',ja:'既存ショートの50%を決済。残りはさらなる下落を観察して判断。新規ショートエントリーは厳禁。',es:'Cerrar el 50% del corto existente. Decidir el resto tras observar más caídas. Prohibido abrir nuevos cortos.',de:'50% der bestehenden Short-Position schließen. Rest nach weiterer Beobachtung entscheiden. Keine neuen Short-Einstiege.'});
      exitSig=TT({ko:'전량 청산 조건',en:'Full exit conditions',ja:'全量決済条件',es:'Condiciones de salida total',de:'Vollständige Ausstiegsbedingungen'});
      exitDesc=TT({ko:'• MVRV Z 0.5 이하\n• Fear & Greed 20 이하\n• 선물 갭 음수 전환',en:'• MVRV Z below 0.5\n• Fear & Greed below 20\n• Futures gap turns negative',ja:'• MVRV Zが0.5以下\n• Fear & Greedが20以下\n• 先物ギャップがマイナスに転換',es:'• MVRV Z por debajo de 0.5\n• Fear & Greed por debajo de 20\n• Brecha de futuros se vuelve negativa',de:'• MVRV Z unter 0,5\n• Angst & Gier unter 20\n• Futures-Spread wird negativ'});
    } else {
      stMain=TT({ko:'🟢 과열 신호 전무 — 숏 즉시 청산',en:'🟢 Zero Overheat Signals — Exit Short Now',ja:'🟢 過熱シグナル皆無 — ショート即時決済',es:'🟢 Cero Señales de Sobrecalentamiento — Cerrar Corto Ahora',de:'🟢 Keine Überhitzungssignale — Short sofort schließen'});
      stDesc=TT({ko:'고점·과열 신호가 전혀 없는 구간. 숏 포지션 유지는 위험하니 손실이더라도 즉시 청산을 고려하세요. (※ 차트가 실제로 상승 추세 중이어도 뜰 수 있는 메시지입니다 — 이 점수는 "역사적 저점"이 아니라 "지금은 과열되지 않았다"만 의미합니다. 차트와 함께 직접 판단하세요.)',en:'No overheat or top signals present at all. Holding a short here is risky — consider exiting even at a loss. (※ This can appear even while the chart is in a clear uptrend — the score means "not currently overheated," not "historical low." Always check the chart yourself.)',ja:'天井・過熱シグナルが全くないゾーン。ショートポジション維持はリスクが高いため、損失が出ていても即時決済を検討してください。(※チャートが実際に上昇トレンド中でも表示されうるメッセージです — このスコアは「歴史的底値」ではなく「今は過熱していない」という意味だけです。チャートと合わせてご自身で判断してください。)',es:'Zona sin ninguna señal de techo o sobrecalentamiento. Mantener una posición corta aquí es arriesgado — considere salir incluso con pérdida. (※ Este mensaje puede aparecer incluso con el gráfico en clara tendencia alcista — la puntuación significa "no sobrecalentado actualmente", no "suelo histórico". Siempre revise el gráfico usted mismo.)',de:'Zone ohne jegliche Top- oder Überhitzungssignale. Eine Short-Position hier zu halten ist riskant — Ausstieg auch bei Verlust erwägen. (※ Diese Meldung kann auch bei klarem Aufwärtstrend im Chart erscheinen — der Score bedeutet "aktuell nicht überhitzt", nicht "historisches Tief". Chart immer selbst prüfen.)'});
      gAction=TT({ko:'EXIT SHORT — 전량 즉시 청산',en:'EXIT SHORT — Close all immediately',ja:'EXIT SHORT — 全量即時決済',es:'SALIR — Cerrar todo de inmediato',de:'EXIT — Alles sofort schließen'});
      gDesc=TT({ko:'모든 숏 즉시 청산. 손실 감수하더라도 추가 손실 방지 최우선. 롱 전환 검토.',en:'Close ALL shorts now. Prevent further losses. Consider switching to long.',ja:'全てのショートを即時決済。損失を受け入れてでもさらなる損失防止を最優先。ロング転換を検討。',es:'Cerrar TODOS los cortos ahora. Priorizar evitar más pérdidas incluso asumiendo pérdida. Considerar cambiar a largo.',de:'ALLE Short-Positionen sofort schließen. Weitere Verluste vermeiden hat Priorität, auch bei Verlust. Wechsel zu Long erwägen.'});
      exitSig=TT({ko:'⚠️ 지금 즉시 행동',en:'⚠️ Act right now',ja:'⚠️ 今すぐ行動',es:'⚠️ Actuar ahora mismo',de:'⚠️ Sofort handeln'});
      exitDesc=TT({ko:'• 현재 시장가로 전량 청산\n• 숏 재진입은 6.0점 이상에서만\n• 롱 진입 적극 검토',en:'• Close at market price now\n• Only re-short above 6.0\n• Strongly consider going long',ja:'• 現在の市場価格で全量決済\n• ショート再エントリーはスコア6.0以上でのみ\n• ロングエントリーを積極的に検討',es:'• Cerrar todo al precio de mercado actual\n• Reingresar corto solo por encima de 6.0\n• Considerar seriamente entrada larga',de:'• Alles zum aktuellen Marktpreis schließen\n• Short-Wiedereinstieg nur über 6,0\n• Long-Einstieg stark erwägen'});
    }

    if(el('sStatusTitle')) el('sStatusTitle').textContent=TT({ko:'📊 현재 시장 상태',en:'📊 MARKET STATUS',ja:'📊 現在の市場状況',es:'📊 ESTADO DEL MERCADO',de:'📊 MARKTSTATUS'});
    if(el('sStatusMain'))  {el('sStatusMain').textContent=stMain;el('sStatusMain').style.color=result.acolor;}
    if(el('sStatusDesc'))  el('sStatusDesc').textContent=stDesc;
    if(el('sGuideTitle'))  el('sGuideTitle').textContent=TT({ko:'💡 숏 포지션 가이드',en:'💡 SHORT GUIDE',ja:'💡 ショートポジションガイド',es:'💡 GUÍA CORTO',de:'💡 SHORT-ANLEITUNG'});
    if(el('sGuideAction')) {el('sGuideAction').textContent=gAction;el('sGuideAction').style.color=result.acolor;}
    if(el('sGuideDesc'))   el('sGuideDesc').textContent=gDesc;
    if(el('sExitTitle'))   el('sExitTitle').textContent=TT({ko:'🎯 숏 청산 조건',en:'🎯 SHORT EXIT',ja:'🎯 ショート決済条件',es:'🎯 SALIDA CORTA',de:'🎯 SHORT-AUSSTIEG'});
    if(el('sExitSig'))     el('sExitSig').textContent=exitSig;
    if(el('sExitDesc'))    el('sExitDesc').textContent=exitDesc;

  } else {
    const sc=result.final;
    const el=(id)=>document.getElementById(id);
    let stMain,stDesc,gAction,gDesc,nextDesc;

    if(sc>=8.0){
      stMain=TT({ko:'🟢 저점형 신호 다수 — 매수 타이밍',en:'🟢 Multiple Bottom Signals — Buy Timing',ja:'🟢 底値型シグナル多数 — 買いタイミング',es:'🟢 Múltiples Señales de Suelo — Momento de Compra',de:'🟢 Mehrere Tiefsignale — Kaufzeitpunkt'});
      stDesc=TT({ko:'현재 온체인·기술 지표 대부분이 저평가 구간을 가리킴. (※ 2018·2022년 바닥과 "비슷한 신호 조합"일 뿐, 정확히 같은 패턴이 반복된다는 보장은 아닙니다.)',en:'Most on-chain/technical indicators currently point to undervaluation. (※ A similar signal combination to 2018/2022 bottoms — not a guarantee the exact pattern repeats.)',ja:'現在オンチェーン・テクニカル指標の大半が割安ゾーンを示唆。(※2018・2022年の底値と「似たシグナルの組み合わせ」であるだけで、正確に同じパターンが繰り返される保証ではありません。)',es:'La mayoría de los indicadores on-chain y técnicos actuales apuntan a una zona de infravaloración. (※ Solo es una "combinación de señales similar" a los suelos de 2018/2022 — no garantiza que se repita exactamente el mismo patrón.)',de:'Die meisten aktuellen On-Chain- und technischen Indikatoren deuten auf eine Unterbewertungszone hin. (※ Nur eine "ähnliche Signalkombination" wie die Tiefs 2018/2022 — keine Garantie, dass sich genau dasselbe Muster wiederholt.)'});
      gAction=TT({ko:'FULL LONG — 전량 진입',en:'FULL LONG — Enter full position',ja:'FULL LONG — 全量エントリー',es:'LONG TOTAL — Entrada total',de:'VOLL-LONG — Vollständiger Einstieg'});
      gDesc=TT({ko:'목표 비중 100% 진입. 레버리지 고려 가능. 스탑로스: 현재가 -15%. 장기 보유 전략.',en:'Enter 100%. Leverage possible. Stop loss -15%. Long-term hold.',ja:'目標比率100%でエントリー。レバレッジも検討可。ストップロス: 現在価格-15%。長期保有戦略。',es:'Entrada 100% del objetivo. Apalancamiento posible. Stop loss -15% del precio actual. Estrategia de largo plazo.',de:'Einstieg 100% des Ziels. Hebel möglich. Stop-Loss -15% vom aktuellen Preis. Langfristige Halte-Strategie.'});
      nextDesc=TT({ko:'✓ 모든 트리거 달성\n목표: 다음 반감기 후 12~18개월',en:'✓ All triggers achieved\nTarget: 12~18mo after next halving',ja:'✓ 全トリガー達成\n目標: 次回半減期後12~18ヶ月',es:'✓ Todos los disparadores logrados\nObjetivo: 12~18 meses tras el próximo halving',de:'✓ Alle Trigger erreicht\nZiel: 12~18 Monate nach dem nächsten Halving'});
    } else if(sc>=7.0){
      stMain=TT({ko:'🟢 강한 저점 신호',en:'🟢 Strong Bottom Signal',ja:'🟢 強い底値シグナル',es:'🟢 Señal de Suelo Fuerte',de:'🟢 Starkes Tiefsignal'});
      stDesc=TT({ko:'MVRV Z, NUPL 등 핵심 지표가 저점 구간. 역사적으로 최고의 매수 기회 중 하나.',en:'Core indicators in bottom zone. One of the best historical buy opportunities.',ja:'MVRV Z、NUPLなど主要指標が底値ゾーン。歴史的に最良の買い場の一つ。',es:'Indicadores clave como MVRV Z y NUPL en zona de suelo. Una de las mejores oportunidades de compra históricas.',de:'Kernindikatoren wie MVRV Z und NUPL in der Tiefzone. Eine der historisch besten Kaufgelegenheiten.'});
      gAction=TT({ko:'ADD LONG — 비중 70~100% 확대',en:'ADD LONG — Scale to 70~100%',ja:'ADD LONG — 比率70~100%に拡大',es:'LONG+ — Ampliar a 70~100%',de:'LONG+ — Auf 70~100% erhöhen'});
      gDesc=TT({ko:'목표 비중 70~100% 분할 진입. 1~2차 진입 후 추가 하락 시 나머지 투입.',en:'Split entry 70~100%. Enter 1st tranche, add rest on dips.',ja:'目標比率70~100%を分割エントリー。1~2回目のエントリー後、さらなる下落時に残りを投入。',es:'Entrada escalonada 70~100% del objetivo. Tras la 1ª-2ª entrada, invertir el resto en más caídas.',de:'Gestaffelter Einstieg 70~100% des Ziels. Nach 1.-2. Tranche bei weiterem Rückgang den Rest investieren.'});
      nextDesc=TT({ko:'• Hash Ribbon 회복 전환 → FULL LONG\n• Coinbase Premium 양전환 → 기관 진입 신호',en:'• Hash Ribbon recovery → FULL LONG\n• Coinbase Premium positive → institutional signal',ja:'• Hash Ribbon回復転換 → FULL LONG\n• Coinbaseプレミアムがプラス転換 → 機関エントリーシグナル',es:'• Recuperación Hash Ribbon → FULL LONG\n• Coinbase Premium positivo → señal institucional',de:'• Hash-Ribbon-Erholung → FULL LONG\n• Coinbase Premium positiv → institutionelles Signal'});
    } else if(sc>=6.0){
      stMain=TT({ko:'🟡 분할 진입 시작 구간',en:'🟡 Split Entry Zone',ja:'🟡 分割エントリー開始ゾーン',es:'🟡 Zona de Inicio de Entrada Escalonada',de:'🟡 Gestaffelte Einstiegszone'});
      stDesc=TT({ko:'저점 신호가 나타나고 있지만 확정 전. 분할 매수로 리스크 분산 권고.',en:'Bottom signals emerging, not confirmed. Spread risk with split entries.',ja:'底値シグナルが出始めていますが確定前。分割買いでリスク分散を推奨。',es:'Aparecen señales de suelo, aún sin confirmar. Se recomienda dispersar el riesgo con entradas escalonadas.',de:'Tiefsignale erscheinen, noch unbestätigt. Risikostreuung mit gestaffelten Einstiegen empfohlen.'});
      gAction=TT({ko:'SPLIT LONG — 30~50% 분할 진입',en:'SPLIT LONG — 30~50% split entry',ja:'SPLIT LONG — 30~50%分割エントリー',es:'LONG PARCIAL — Entrada escalonada 30~50%',de:'TEIL-LONG — Gestaffelter Einstieg 30~50%'});
      gDesc=TT({ko:'목표 비중 30~50% 1차 진입. 트리거 달성 시마다 추가 진입. 한 번에 올인 금지.',en:'Enter 30~50% first. Add more at each trigger. No all-in.',ja:'目標比率30~50%を1回目エントリー。トリガー達成ごとに追加エントリー。一括投入は禁止。',es:'Primera entrada 30~50% del objetivo. Añadir en cada disparador. No invertir todo de una vez.',de:'Erster Einstieg 30~50% des Ziels. Bei jedem Trigger nachlegen. Kein All-in auf einmal.'});
      nextDesc=TT({ko:'• MVRV Z 0 이하 → ADD LONG\n• Hash Ribbon 회복 전환\n• Coinbase Premium 양전환',en:'• MVRV Z below 0 → ADD LONG\n• Hash Ribbon recovery\n• Coinbase Premium turns positive',ja:'• MVRV Zが0以下 → ADD LONG\n• Hash Ribbon回復転換\n• Coinbaseプレミアムがプラス転換',es:'• MVRV Z por debajo de 0 → ADD LONG\n• Recuperación Hash Ribbon\n• Coinbase Premium se vuelve positivo',de:'• MVRV Z unter 0 → ADD LONG\n• Hash-Ribbon-Erholung\n• Coinbase Premium wird positiv'});
    } else if(sc>=5.0){
      stMain=TT({ko:'🟡 관찰 구간 — 트리거 대기',en:'🟡 Watch Zone — Await Triggers',ja:'🟡 様子見ゾーン — トリガー待ち',es:'🟡 Zona de Observación — Esperando Disparadores',de:'🟡 Beobachtungszone — Warten auf Trigger'});
      stDesc=TT({ko:'일부 저점 신호 있으나 확신 부족. 핵심 트리거 발생 전까지 소량만 허용.',en:'Some signals but not enough. Small entry only before key triggers.',ja:'一部底値シグナルはあるが確信不足。主要トリガー発生前は少量のみ許可。',es:'Hay algunas señales de suelo pero falta confianza. Solo se permite entrada pequeña hasta el disparador clave.',de:'Einige Tiefsignale vorhanden, aber unzureichend. Nur kleiner Einstieg bis zum Haupttrigger erlaubt.'});
      gAction=TT({ko:'WATCH — 소량 선진입 10~20%',en:'WATCH — Small entry 10~20%',ja:'WATCH — 少量先行エントリー10~20%',es:'ESPERAR — Entrada pequeña 10~20%',de:'WARTEN — Kleiner Voreinstieg 10~20%'});
      gDesc=TT({ko:'성급한 진입 금지. 전체 계획의 10~20%만 선진입 허용. 손절 명확히 설정.',en:'No rush. 10~20% entry max. Set clear stop loss.',ja:'拙速なエントリーは禁止。全体計画の10~20%のみ先行エントリー許可。損切りを明確に設定。',es:'No entrar apresuradamente. Solo se permite 10~20% del plan total como entrada anticipada. Fijar stop loss claramente.',de:'Keine überstürzten Einstiege. Nur 10~20% des Gesamtplans als Voreinstieg erlaubt. Stop-Loss klar festlegen.'});
      nextDesc=TT({ko:'• Coinbase Premium 양전환\n• NUPL 0% 이하\n• 선물 갭 음수 전환',en:'• Coinbase Premium turns positive\n• NUPL drops below 0%\n• Futures gap turns negative',ja:'• Coinbaseプレミアムがプラス転換\n• NUPLが0%以下\n• 先物ギャップがマイナスに転換',es:'• Coinbase Premium se vuelve positivo\n• NUPL cae por debajo de 0%\n• Brecha de futuros se vuelve negativa',de:'• Coinbase Premium wird positiv\n• NUPL fällt unter 0%\n• Futures-Spread wird negativ'});
    } else if(sc>=3.5){
      stMain=TT({ko:'🟠 조정 진행 중 — 진입 이름',en:'🟠 Correction In Progress — Too Early',ja:'🟠 調整進行中 — エントリーには早い',es:'🟠 Corrección en Curso — Muy Pronto',de:'🟠 Korrektur im Gange — Zu früh'});
      stDesc=TT({ko:'시장 조정 진행 중. 기존 롱 포지션 일부 정리 고려. 신규 진입은 아직 이름.',en:'Market correcting. Consider trimming longs. Too early for new entry.',ja:'市場調整が進行中。既存ロングポジションの一部整理を検討。新規エントリーはまだ早い。',es:'Corrección de mercado en curso. Considerar reducir parcialmente posiciones largas. Aún es pronto para nueva entrada.',de:'Marktkorrektur im Gange. Teilweise Reduzierung bestehender Long-Positionen erwägen. Für Neueinstieg noch zu früh.'});
      gAction=TT({ko:'SPLIT EXIT — 30~50% 일부 정리',en:'SPLIT EXIT — Trim 30~50%',ja:'SPLIT EXIT — 30~50%一部整理',es:'PARCIAL — Reducir 30~50%',de:'TEIL-EXIT — 30~50% teilweise reduzieren'});
      gDesc=TT({ko:'기존 롱의 30~50% 정리. 현금 비중 확보. 5.0점 이상 회복 시 재진입.',en:'Trim 30~50% of long. Build cash. Re-enter when score recovers to 5.0+.',ja:'既存ロングの30~50%を整理。現金比率を確保。スコア5.0以上に回復時に再エントリー。',es:'Reducir 30~50% del largo. Asegurar liquidez. Reingresar si la puntuación recupera 5.0+.',de:'Long-Position um 30~50% reduzieren. Cash-Anteil sichern. Bei Erholung auf 5,0+ wiedereinsteigen.'});
      nextDesc=TT({ko:'재진입 조건:\n• 점수 5.0 이상 회복\n• Coinbase Premium 개선\n• STH-SOPR 0.97 이하',en:'Re-entry:\n• Score above 5.0\n• Coinbase Premium improves\n• STH-SOPR below 0.97',ja:'再エントリー条件:\n• スコア5.0以上に回復\n• Coinbaseプレミアム改善\n• STH-SOPRが0.97以下',es:'Condiciones de reingreso:\n• Puntuación recupera 5.0+\n• Coinbase Premium mejora\n• STH-SOPR por debajo de 0.97',de:'Wiedereinstiegsbedingungen:\n• Score erholt sich auf 5,0+\n• Coinbase Premium verbessert sich\n• STH-SOPR unter 0,97'});
    } else {
      stMain=TT({ko:'🔴 고점/과열 — 즉시 청산',en:'🔴 Top/Overheat — Exit Now',ja:'🔴 天井/過熱 — 即時決済',es:'🔴 Techo/Sobrecalentamiento — Salir Ahora',de:'🔴 Top/Überhitzung — Sofort aussteigen'});
      stDesc=TT({ko:'시장 고점 신호. 롱 포지션 매우 위험. 수익 있다면 즉시 확보.',en:'Top signals. Long position very risky. Take profit immediately.',ja:'市場天井シグナル。ロングポジションは非常に危険。利益があれば即時確保。',es:'Señal de techo de mercado. Posición larga muy riesgosa. Asegurar ganancias de inmediato si las hay.',de:'Marktsignal für Hoch. Long-Position sehr riskant. Gewinne sofort sichern, falls vorhanden.'});
      gAction=TT({ko:'EXIT LONG — 전량 즉시 청산',en:'EXIT LONG — Exit all immediately',ja:'EXIT LONG — 全量即時決済',es:'SALIR — Cerrar todo de inmediato',de:'EXIT — Alles sofort schließen'});
      gDesc=TT({ko:'모든 롱 청산. 수익 확보 우선. 손실 발생 시에도 추가 손실 방지 최우선.',en:'Close all longs. Protect profits. Prevent further losses.',ja:'全てのロングを決済。利益確保を優先。損失発生時もさらなる損失防止を最優先。',es:'Cerrar todos los largos. Priorizar asegurar ganancias. Priorizar evitar más pérdidas incluso con pérdida actual.',de:'Alle Long-Positionen schließen. Gewinnsicherung priorisieren. Auch bei Verlust weitere Verluste vermeiden.'});
      nextDesc=TT({ko:'재진입 조건:\n• 점수 6.0 이상\n• 온체인 지표 저점 진입 확인',en:'Re-entry:\n• Score above 6.0\n• On-chain confirms bottom',ja:'再エントリー条件:\n• スコア6.0以上\n• オンチェーン指標が底値を確認',es:'Condiciones de reingreso:\n• Puntuación por encima de 6.0\n• On-chain confirma suelo',de:'Wiedereinstiegsbedingungen:\n• Score über 6,0\n• On-Chain bestätigt Tief'});
    }

    if(el('lStatusTitle')) el('lStatusTitle').textContent=TT({ko:'📊 현재 시장 상태',en:'📊 MARKET STATUS',ja:'📊 現在の市場状況',es:'📊 ESTADO DEL MERCADO',de:'📊 MARKTSTATUS'});
    if(el('lStatusMain'))  {el('lStatusMain').textContent=stMain;el('lStatusMain').style.color=result.acolor;}
    if(el('lStatusDesc'))  el('lStatusDesc').textContent=stDesc;
    if(el('lGuideTitle'))  el('lGuideTitle').textContent=TT({ko:'💡 롱 포지션 가이드',en:'💡 LONG GUIDE',ja:'💡 ロングポジションガイド',es:'💡 GUÍA LARGO',de:'💡 LONG-ANLEITUNG'});
    if(el('lGuideAction')) {el('lGuideAction').textContent=gAction;el('lGuideAction').style.color=result.acolor;}
    if(el('lGuideDesc'))   el('lGuideDesc').textContent=gDesc;
    if(el('lNextTitle'))   el('lNextTitle').textContent=TT({ko:'🎯 다음 진입 조건',en:'🎯 NEXT TRIGGER',ja:'🎯 次のエントリー条件',es:'🎯 SIGUIENTE DISPARADOR',de:'🎯 NÄCHSTER TRIGGER'});
    if(el('lNextDesc'))    el('lNextDesc').textContent=nextDesc;
    if(el('lSplitTitle'))  el('lSplitTitle').textContent=TT({ko:'💰 분할 매수 계획',en:'💰 SPLIT ENTRY PLAN',ja:'💰 分割エントリー計画',es:'💰 PLAN DE ENTRADA ESCALONADA',de:'💰 GESTAFFELTER EINSTIEGSPLAN'});
  const assetInput = document.getElementById('userAsset');
  if(assetInput && document.activeElement !== assetInput) assetInput.value = TOTAL_USDT;
  const assetLbl = document.getElementById('lAssetLabel');
  if(assetLbl) assetLbl.textContent = TT({ko:'투자 자산',en:'Investment',ja:'投資資産',es:'Inversión',de:'Investition'});
  }

  // Grids — buy: 고정 키 배분, sell: 동적 배분
  const det=result.details;
  const keys=Object.keys(det);
  let g1k,g2k,g3k,g4k;
  if(currentMode==='buy') {
    // buy: 온체인(3) / 채굴자+심리(3) / 기관수급(3) / 사이클(1)
    const buyG1 = ['mvrv_z','nupl','realized','alt_valuation','alt_drawdown'];
    const buyG2 = ['hash_ribbon','sth_sopr','funding','rsi','vol_change'];
    const buyG3 = ['cb_premium','lth_supply','dom'];
    const buyG4 = ['halving','btc_corr','btc_corr_tech'].filter(k=>det[k]);
    g1k = buyG1.filter(k=>det[k]);
    g2k = buyG2.filter(k=>det[k]);
    g3k = buyG3.filter(k=>det[k]);
    g4k = buyG4.filter(k=>det[k]);
    // 나머지 키
    const used = [...g1k,...g2k,...g3k,...g4k];
    const rest = keys.filter(k=>!used.includes(k));
    g4k = [...g4k, ...rest];
  } else {
    // sell: 키 이름 기반 고정 배치 (BTC family와 알트코인 둘 다 대응)
    const sellG1 = ['mvrv_z','nupl','sth_sopr','alt_short_valuation'];          // 온체인 밸류에이션
    const sellG2 = ['funding','alt_short_ath','rsi','vol_change'];               // 채굴자/심리
    const sellG3 = ['cb_premium','lth_supply'];                                  // 기관 수급(선행)
    const sellG4 = ['dom','halving','btc_corr_tech'];                           // 사이클 위치
    g1k = sellG1.filter(k=>det[k]);
    g2k = sellG2.filter(k=>det[k]);
    g3k = sellG3.filter(k=>det[k]);
    g4k = sellG4.filter(k=>det[k]);
    // 매핑 안 된 나머지 키는 g4로
    const usedSell = [...g1k,...g2k,...g3k,...g4k];
    const restSell = keys.filter(k=>!usedSell.includes(k));
    g4k = [...g4k, ...restSell];
  }
  document.getElementById('g1').innerHTML=(g1k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g2').innerHTML=(g2k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g3').innerHTML=(g3k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');
  document.getElementById('g4').innerHTML=(g4k||[]).filter(k=>det[k]).map(k=>makeCard(det[k],currentMode)).join('');

  // 빈 섹션은 헤더까지 함께 숨김 (알트코인 SHORT처럼 카드가 없는 섹션 대응)
  [['g1',(g1k||[]).filter(k=>det[k])],['g2',(g2k||[]).filter(k=>det[k])],
   ['g3',(g3k||[]).filter(k=>det[k])],['g4',(g4k||[]).filter(k=>det[k])]].forEach(([gridId,arr])=>{
    const gridEl = document.getElementById(gridId);
    if(!gridEl) return;
    const headerEl = gridEl.previousElementSibling; // sec-hd는 grid 바로 위 형제
    const isEmpty = arr.length === 0;
    gridEl.style.display = isEmpty ? 'none' : '';
    if(headerEl && headerEl.classList.contains('sec-hd')) {
      headerEl.style.display = isEmpty ? 'none' : '';
    }
  });

  // Breakdown
  document.getElementById('bkGrid').innerHTML=keys.map(k=>{
    const d=det[k];const r=d.score/d.max;const c=col(r);
    return `<div class="bk-row"><span class="bk-n">${d.label}</span>
      <span class="bk-r" style="color:${c}">${d.score}/${d.max}
        <div class="mbar"><div class="mfill" style="width:${Math.round(r*100)}%;background:${c}"></div></div>
      </span></div>`;
  }).join('');
  document.getElementById('bkTot').textContent=`${sc.toFixed(1)} / 10`;
  document.getElementById('bkTot').style.color=scoreColor;
  // 점수합산 헤더 한글화
  const bkHd=document.querySelector('.bk-hd');
  if(bkHd) bkHd.textContent=TT({ko:`점수 합산 (${result.max}pt → 10점 환산)`,en:`Score Breakdown (${result.max}pt → 10pt)`,ja:`スコア内訳 (${result.max}pt → 10pt換算)`,es:`Desglose de puntuación (${result.max}pt → convertido a 10pt)`,de:`Score-Aufschlüsselung (${result.max}pt → auf 10pt umgerechnet)`});
  // 트리거 헤더
  const trigTitleEl=document.getElementById('trigTitle');
  if(trigTitleEl) {
    if(currentMode==='buy') trigTitleEl.textContent=TT({ko:'다음 단계 트리거',en:'Next Level Triggers',ja:'次段階トリガー',es:'Próximos Disparadores',de:'Nächste Trigger'});
    else trigTitleEl.textContent=TT({ko:'숏 신호 트리거',en:'Short Signal Triggers',ja:'ショートシグナルトリガー',es:'Disparadores de Señal de Venta',de:'Verkaufssignal-Trigger'});
  }
  // 분할계획 단계 라벨
  const stepNow=document.querySelector('.step-now');
  if(stepNow&&isKo) stepNow.textContent=stepNow.textContent.replace('NOW','지금');

  // Triggers
  renderTriggers(result, ind);

  // Split plan (buy mode only) — 점수 6.0 이상(SPLIT LONG 이상)일 때만 진입 단계 활성화
  if(currentMode==='buy') {
    const canEnter = sc >= 6.0; // SPLIT LONG 이상이어야 분할 진입 시작
    const steps=[
      {pct:25,cond:canEnter?TT({ko:`지금 진입 (${sc.toFixed(1)}점)`,en:`Now (${sc.toFixed(1)}pt)`,ja:`今すぐ (${sc.toFixed(1)}pt)`,es:`Ahora (${sc.toFixed(1)}pt)`,de:`Jetzt (${sc.toFixed(1)}pt)`}):TT({ko:`점수 6.0 이상 대기 (현재 ${sc.toFixed(1)}점)`,en:`Await 6.0+ (now ${sc.toFixed(1)}pt)`,ja:`スコア6.0以上を待機 (現在${sc.toFixed(1)}pt)`,es:`Esperando 6.0+ (actual ${sc.toFixed(1)}pt)`,de:`Warten auf 6,0+ (aktuell ${sc.toFixed(1)}pt)`}),
       price:livePrice||p, now:canEnter, waiting:!canEnter},
      {pct:30,cond:TT({ko:'Hash Ribbon 회복 전환',en:'Hash Ribbon Recovery Cross',ja:'Hash Ribbon 回復転換',es:'Cruce de Recuperación Hash Ribbon',de:'Hash-Ribbon-Erholungscross'}),price:null,range:'$50K~$58K'},
      {pct:25,cond:TT({ko:'Coinbase Premium 양전환',en:'Coinbase Premium Turns Positive',ja:'Coinbaseプレミアムがプラス転換',es:'Coinbase Premium se vuelve positivo',de:'Coinbase Premium wird positiv'}),price:null,range:'$52K~$62K'},
      {pct:20,cond:'NUPL 0% + MVRV Z ≤ 0',price:null,range:'$45K~$55K'},
    ];
    document.getElementById('splitRows').innerHTML=steps.map((s,i)=>{
      const usdt=Math.round(TOTAL_USDT*s.pct/100);
      const refPrice = s.price || p;
      const coinAmt = refPrice ? (usdt/refPrice) : 0;
      const coinAmtStr = coinAmt >= 1 ? coinAmt.toFixed(4) : coinAmt.toFixed(6);
      const stepLabel = s.now ? `${i+1} ◀ NOW` : (s.waiting ? `${i+1} ⏸` : `${i+1}`);
      const stepCls = s.now ? 'step-now' : 'step-wait';
      return `<div class="split-row">
        <div class="split-top">
          <span class="${stepCls}">${stepLabel}</span>
          <span class="split-cond">${s.cond}</span>
        </div>
        <div class="split-bot">
          <span style="color:${s.waiting?'var(--t3)':'var(--yellow)'};font-weight:700;font-size:13px">${s.pct}%</span>
          <span style="color:${s.waiting?'var(--t3)':'var(--t1)'};font-size:11px;font-weight:600">${usdt.toLocaleString()} USDT</span>
        </div>
        <div style="font-size:10px;color:var(--t3);margin-top:2px">≈ ${coinAmtStr} ${currentCoin}</div>
      </div>`;
    }).join('');
  }

  // Timestamp — 언어별 타임존으로 표시 (ko→KST, ja→JST, en→UTC, es·de→CET/CEST)
  document.getElementById('tsLabel').textContent =
    `${T('updated')} ${formatUpdatedStamp(currentLang)}`;

  // History
  saveHistory(sc);
  drawHistory();

  // Alerts
  checkAlerts(sc, ind);
}

// ═══════════════════════════════════════════════════════
// TRIGGERS
// ═══════════════════════════════════════════════════════
function renderTriggers(result, ind) {
  const sc=result.final;
  const ach=TT({ko:'달성',en:'Achieved',ja:'達成',es:'Logrado',de:'Erreicht'});
  const trig_ko=TT({ko:'발생',en:'Triggered!',ja:'発生!',es:'¡Activado!',de:'Ausgelöst!'});
  const pick = (t) => t[currentLang] || t.en;
  let rows=[];
  if(currentMode==='buy') {
    const triggers=[
      {en:'Hash Ribbon 30d>60d recovery',ko:'Hash Ribbon 30일MA > 60일MA 회복 전환', ja:'Hash Ribbon 30日MA > 60日MA 回復転換', es:'Hash Ribbon: recuperación MA 30d > 60d', de:'Hash Ribbon: Erholung 30T-MA > 60T-MA', done: ind.hr_status==='Recovering'},
      {en:'Coinbase Premium turns positive',ko:'Coinbase Premium 양전환', ja:'Coinbaseプレミアムがプラス転換', es:'Coinbase Premium se vuelve positivo', de:'Coinbase Premium wird positiv', done: ind.cb_premium>0},
      {en:'NUPL below 0% (Fear zone)',ko:'NUPL 0% 이하 (공포 구간)', ja:'NUPLが0%以下 (恐怖ゾーン)', es:'NUPL por debajo de 0% (zona de miedo)', de:'NUPL unter 0% (Angstzone)', done: ind.nupl<=0},
      {en:'MVRV Z Score ≤ 0',ko:'MVRV Z Score 0 이하', ja:'MVRV Zスコアが0以下', es:'MVRV Z-Score ≤ 0', de:'MVRV Z-Score ≤ 0', done: ind.mvrv_z<=0},
      {en:'Futures-Spot gap negative',ko:'선물-현물 갭 음수 전환', ja:'先物-現物ギャップがマイナスに転換', es:'Brecha futuros-spot se vuelve negativa', de:'Futures-Spot-Spread wird negativ', done: ind.funding<0},
    ];
    rows=triggers.map(t=>`
      <div class="trow ${t.done?'done':'pending'}">
        <span class="tnum">${t.done?'✓':'○'}</span>
        ${pick(t)}${t.done?` — <b>${ach}</b>`:''}
      </div>`);
  } else {
    const triggers=[
      {en:'MVRV Z Score ≥ 3.5 (euphoria)',ko:'MVRV Z ≥ 3.5 (도취 구간)', ja:'MVRV Z ≥ 3.5 (陶酔ゾーン)', es:'MVRV Z ≥ 3.5 (euforia)', de:'MVRV Z ≥ 3,5 (Euphorie)', done: ind.mvrv_z>=3.5},
      {en:'NUPL ≥ 75% (extreme greed)',ko:'NUPL ≥ 75% (극단 탐욕)', ja:'NUPL ≥ 75% (極端な強欲)', es:'NUPL ≥ 75% (codicia extrema)', de:'NUPL ≥ 75% (extreme Gier)', done: ind.nupl>=0.75},
      {en:'Fear & Greed ≥ 80',ko:'공포·탐욕 ≥ 80', ja:'恐怖・強欲指数 ≥ 80', es:'Miedo y Codicia ≥ 80', de:'Angst & Gier ≥ 80', done: (ind.fear_greed||0)>=80},
      {en:'Futures contango ≥ 0.15%',ko:'선물 프리미엄 ≥ 0.15%', ja:'先物プレミアム ≥ 0.15%', es:'Contango de futuros ≥ 0.15%', de:'Futures-Contango ≥ 0,15%', done: ind.funding>=0.15},
      {en:'Coinbase Premium ≥ 0.3%',ko:'Coinbase Premium ≥ 0.3%', ja:'Coinbaseプレミアム ≥ 0.3%', es:'Coinbase Premium ≥ 0.3%', de:'Coinbase Premium ≥ 0,3%', done: ind.cb_premium>=0.3},
    ];
    rows=triggers.map(t=>`
      <div class="trow ${t.done?'done':'pending'}">
        <span class="tnum">${t.done?'✓':'○'}</span>
        ${pick(t)}${t.done?` — <b>${trig_ko}</b>`:''}
      </div>`);
  }
  document.getElementById('trigRows').innerHTML=rows.join('');
}

// ═══════════════════════════════════════════════════════
// SCORE HISTORY
// ═══════════════════════════════════════════════════════
function saveHistory(score) {
  // long 모드 점수만 저장 (short 모드는 별도)
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h=[];
  try { h=JSON.parse(localStorage.getItem(key)||'[]'); } catch(e){}
  const now=Date.now();
  // 직전 저장값과 5분 이내로 가까우면 중복 저장 방지
  const lastSaved = h.length > 0 ? h[h.length-1].t : 0;
  const shouldSave = now - lastSaved > 4*60*1000; // 4분 이상 지났을 때만 신규 저장

  if(shouldSave) {
    h.push({t:now, s:parseFloat(score.toFixed(2))});
    h=h.slice(-2000); // 로컬은 최근 2000개만 (서버가 장기 보관 담당)
    try { localStorage.setItem(key,JSON.stringify(h)); } catch(e){}
    // 서버(Firebase)에도 비동기 저장 — 모든 사용자가 공유하는 히스토리
    saveHistoryToServer(currentCoin, modeKey, now, score);
  }
  scoreHistory=h;
  currentScore = score;
}

// Firebase에 점수 히스토리 저장 (전역 공유, 코인별/모드별)
let historyDBReady = false;
function ensureHistoryDB() {
  if(historyDBReady) return true;
  try {
    if(typeof firebase === 'undefined') return false;
    if(!firebase.apps || !firebase.apps.length) {
      firebase.initializeApp({
        apiKey: "AIzaSyAdmKYQ3w02e9gbvcRUEM7Q_jcgBKtkgDw",
        authDomain: "btctiming-chat.firebaseapp.com",
        databaseURL: "https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "btctiming-chat",
        storageBucket: "btctiming-chat.firebasestorage.app",
        messagingSenderId: "1037450881238",
        appId: "1:1037450881238:web:d21d0deff6e9aef1bf4177",
        measurementId: "G-VD01B9SL3K"
      });
    }
    if(!chatDB) chatDB = firebase.database();
    historyDBReady = true;
    return true;
  } catch(e) {
    console.error('[history] Firebase init failed:', e);
    return false;
  }
}

function saveHistoryToServer(coin, modeKey, t, score) {
  if(!ensureHistoryDB()) return;
  const path = `scoreHistory/${coin}_${modeKey}`;
  chatDB.ref(path).push({t, s: parseFloat(score.toFixed(2))}).then(() => {
    pruneOldHistory(path);
  }).catch(e => console.error('[history] save FAILED (DB 규칙/권한 확인 필요):', e && e.message ? e.message : e));
}

// 서버 히스토리도 일정 개수 넘으면 오래된 것부터 삭제 (코인당 최대 2000개)
const HISTORY_MAX_POINTS = 2000;
function pruneOldHistory(path) {
  if(!chatDB) return;
  chatDB.ref(path).orderByChild('t').once('value', (snap) => {
    const data = snap.val();
    if(!data) return;
    const entries = Object.entries(data).sort((a,b) => a[1].t - b[1].t);
    if(entries.length > HISTORY_MAX_POINTS) {
      const toDelete = entries.slice(0, entries.length - HISTORY_MAX_POINTS);
      toDelete.forEach(([key]) => chatDB.ref(path + '/' + key).remove());
    }
  });
}

// 서버에서 히스토리 불러오기 (페이지 로드/코인 전환 시)
function loadHistoryFromServer(coin, modeKey, callback) {
  if(!ensureHistoryDB()) { callback(null); return; }
  const path = `scoreHistory/${coin}_${modeKey}`;
  chatDB.ref(path).orderByChild('t').limitToLast(500).once('value', (snap) => {
    const data = snap.val();
    if(!data) { callback(null); return; }
    const points = Object.values(data).sort((a,b) => a.t - b.t);
    callback(points);
  }).catch(e => {
    console.error('[history] load failed:', e);
    callback(null);
  });
}

let serverHistoryLoaded = {}; // 코인+모드별 서버 로드 여부 캐시

function drawHistory() {
  // 서버 히스토리 최초 1회 로드 (코인+모드별)
  const modeKey0 = currentMode === 'buy' ? 'long' : 'short';
  const loadKey = `${currentCoin}_${modeKey0}`;
  if(!serverHistoryLoaded[loadKey]) {
    loadHistoryFromServer(currentCoin, modeKey0, (serverPoints) => {
      if(serverPoints && serverPoints.length > 0) {
        serverHistoryLoaded[loadKey] = true; // 성공적으로 받았을 때만 로드완료 처리 (실패 시 다음 렌더에서 재시도)
        // 서버 데이터를 로컬과 병합 (서버가 더 풍부하면 우선)
        const localKey = `history_${currentCoin}_${modeKey0}`;
        let local = [];
        try { local = JSON.parse(localStorage.getItem(localKey)||'[]'); } catch(e){}
        const merged = [...serverPoints, ...local];
        // 중복 제거 (같은 시각 데이터)
        const seen = new Set();
        const dedup = merged.filter(p => {
          const k = Math.floor(p.t/60000); // 1분 단위로 묶어서 중복 체크
          if(seen.has(k)) return false;
          seen.add(k);
          return true;
        }).sort((a,b)=>a.t-b.t);
        try { localStorage.setItem(localKey, JSON.stringify(dedup.slice(-2000))); } catch(e){}
        drawHistory(); // 데이터 갱신 후 재렌더
      }
    });
  }

  let data = getHistoryData();
  // 현재 점수를 항상 최신 포인트로 표시
  if(currentScore > 0) {
    const now = Date.now();
    if(data.length === 0) {
      data = [{t: now, s: currentScore}];
    } else {
      // 마지막 포인트가 2분 이내면 업데이트, 아니면 추가
      if(now - data[data.length-1].t < 120000) {
        data = [...data.slice(0,-1), {t: now, s: currentScore}];
      } else {
        data = [...data, {t: now, s: currentScore}];
      }
    }
  }
  scoreHistory = data;

  const canvas = document.getElementById('historyCanvas');
  if(!canvas) return;
  const ctx = canvas.getContext('2d');
  const dpr = window.devicePixelRatio||1;
  const w = canvas.offsetWidth||600;
  const h = canvas.offsetHeight||120;
  canvas.width = w*dpr; canvas.height = h*dpr;
  ctx.scale(dpr,dpr);

  if(data.length < 2) {
    historyPlotState = null; // 데이터 부족 시 호버 상태도 비워 이전 코인 값이 안 뜨게
    ctx.fillStyle='rgba(255,255,255,0.15)';
    ctx.font='11px system-ui'; ctx.textAlign='center';
    ctx.fillText('Score history will appear after multiple data points', w/2, h/2);
    return;
  }

  const scores = data.map(x=>x.s);
  // Y축을 데이터 실제 범위에 맞춰 동적으로 (위/아래 여백이 과하게 남지 않게).
  // 변동이 너무 작으면 최소 범위(1.5)를 보장해 선이 납작해지지 않게 함.
  let dataMin = Math.min(...scores);
  let dataMax = Math.max(...scores);
  let span = dataMax - dataMin;
  const MIN_SPAN = 1.5;
  if (span < MIN_SPAN) { const mid=(dataMin+dataMax)/2; dataMin=mid-MIN_SPAN/2; dataMax=mid+MIN_SPAN/2; span=MIN_SPAN; }
  const yPad = span * 0.15;              // 위아래 15% 여백
  const minS = Math.max(0, dataMin - yPad);
  const maxS = Math.min(10, dataMax + yPad);
  const pad = {l:28,r:10,t:10,b:20};
  const pw = w-pad.l-pad.r;
  const ph = h-pad.t-pad.b;

  // X축을 '선택한 기간' 전체로 고정하되, 사용자의 팬(좌우 이동)·줌(확대)을 반영.
  // chartZoom: 1이면 기간 전체, >1이면 확대. chartPan: 오른쪽 끝 기준 과거로 밀어낸 ms.
  const rangeMsMap = {'1h':3600000,'4h':4*3600000,'6h':6*3600000,'12h':12*3600000,'1d':86400000,'7d':7*86400000,'30d':30*86400000};
  const nowT = Date.now();
  const fullSpan = rangeMsMap[histPeriod] || (data[data.length-1].t - data[0].t) || 86400000;
  const spanMs = fullSpan / chartZoom;              // 줌인하면 보이는 폭이 좁아짐
  const maxPan = Math.max(0, fullSpan - spanMs);     // 과거로 밀 수 있는 최대치
  chartPan = Math.max(0, Math.min(chartPan, maxPan)); // 범위 밖으로 못 나가게
  const tEnd = nowT - chartPan;
  const tStart = tEnd - spanMs;
  const tSpan = Math.max(tEnd - tStart, 1);
  // 시각 → X좌표 (시간 비례)
  const xAt = (t) => pad.l + Math.max(0, Math.min(1, (t - tStart)/tSpan)) * pw;
  const zones = [
    {min:8.0,max:10,color:'rgba(34,197,94,0.07)',label:'FULL LONG'},
    {min:7.0,max:8.0,color:'rgba(74,222,128,0.05)',label:'ADD LONG'},
    {min:6.0,max:7.0,color:'rgba(134,239,172,0.04)',label:'SPLIT LONG'},
    {min:5.0,max:6.0,color:'rgba(163,230,53,0.03)',label:'WATCH'},
    {min:3.5,max:5.0,color:'rgba(251,191,36,0.03)',label:'SPLIT EXIT'},
    {min:0,max:3.5,color:'rgba(239,68,68,0.03)',label:'EXIT LONG'},
  ];
  zones.forEach(z=>{
    const y1=pad.t+ph-(z.max-minS)/(maxS-minS)*ph;
    const y2=pad.t+ph-(z.min-minS)/(maxS-minS)*ph;
    ctx.fillStyle=z.color;
    ctx.fillRect(pad.l,y1,pw,y2-y1);
  });

  // Grid lines
  ctx.lineWidth=1;
  [3.5,5.0,6.0,7.0,8.0].forEach(v=>{
    if(v<minS||v>maxS) return;
    const y=pad.t+ph-(v-minS)/(maxS-minS)*ph;
    ctx.strokeStyle=v>=8.0?'rgba(74,222,128,0.15)':v>=7.0?'rgba(190,242,100,0.1)':'rgba(255,255,255,0.04)';
    ctx.beginPath();ctx.moveTo(pad.l,y);ctx.lineTo(w-pad.r,y);ctx.stroke();
    ctx.fillStyle='rgba(255,255,255,0.25)';
    ctx.font='8px system-ui'; ctx.textAlign='right';
    ctx.fillText(v.toFixed(1),pad.l-3,y+3);
  });

  // 최신 점수에 따라 라인 색상 결정 (롱/숏 강도 시각화)
  const lastScore = data[data.length-1].s;
  const lineColor = lastScore >= 7 ? '#5b9d78' : lastScore >= 5 ? '#8a9a5b' : lastScore >= 3.5 ? '#c99a52' : '#bd6b6b';
  const lineRGB = lastScore >= 7 ? '91,157,120' : lastScore >= 5 ? '138,154,91' : lastScore >= 3.5 ? '201,154,82' : '189,107,107';

  // Gradient fill (라인 색상과 연동)
  const grad=ctx.createLinearGradient(0,pad.t,0,h-pad.b);
  grad.addColorStop(0,`rgba(${lineRGB},0.28)`);
  grad.addColorStop(0.7,`rgba(${lineRGB},0.06)`);
  grad.addColorStop(1,`rgba(${lineRGB},0)`);
  ctx.beginPath();
  data.forEach((p,i)=>{
    const x=xAt(p.t);
    const y=pad.t+ph-(p.s-minS)/(maxS-minS)*ph;
    i===0?ctx.moveTo(x,y):ctx.lineTo(x,y);
  });
  ctx.lineTo(xAt(data[data.length-1].t),h-pad.b);
  ctx.lineTo(xAt(data[0].t),h-pad.b);
  ctx.closePath();
  ctx.fillStyle=grad; ctx.fill();

  // Line — 부드러운 연결 (글로우 없이 차분하게)
  ctx.beginPath(); ctx.strokeStyle=lineColor; ctx.lineWidth=1.75;
  ctx.lineJoin='round'; ctx.lineCap='round';
  data.forEach((p,i)=>{
    const x=xAt(p.t);
    const y=pad.t+ph-(p.s-minS)/(maxS-minS)*ph;
    i===0?ctx.moveTo(x,y):ctx.lineTo(x,y);
  });
  ctx.stroke();

  // Latest dot — 은은한 링 + 코어 (발광 최소화)
  const last=data[data.length-1];
  const lx=xAt(last.t);
  const ly=pad.t+ph-(last.s-minS)/(maxS-minS)*ph;
  ctx.beginPath();ctx.arc(lx,ly,4.5,0,Math.PI*2);
  ctx.fillStyle=`rgba(${lineRGB},0.2)`;ctx.fill();
  ctx.beginPath();ctx.arc(lx,ly,3,0,Math.PI*2);
  ctx.fillStyle=lineColor;ctx.fill();
  ctx.fillStyle='rgba(255,255,255,0.75)';ctx.font='bold 10px system-ui';ctx.textAlign='right';
  ctx.fillText(last.s.toFixed(1),lx-8,ly-6);

  // Time labels (x-axis, 5 labels) — 데이터가 아니라 '기간 전체' 기준 균등 시각 + 언어별 타임존
  const TZ = {ko:'Asia/Seoul', ja:'Asia/Tokyo', en:'America/New_York', es:'Europe/Madrid', de:'Europe/Berlin', fr:'Europe/Paris', pt:'America/Sao_Paulo', tr:'Europe/Istanbul', vi:'Asia/Ho_Chi_Minh'};
  const tz = TZ[currentLang] || undefined;
  const loc = SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en';
  ctx.fillStyle='rgba(255,255,255,0.2)';ctx.font='8px system-ui';ctx.textAlign='center';
  const steps=[0,0.25,0.5,0.75,1];
  const shortR=['1h','4h','6h','12h','1d'].includes(histPeriod);
  steps.forEach(r=>{
    const t = tStart + r*tSpan;          // 기간 전체를 균등 분할한 시각
    const x = pad.l + r*pw;
    const d = new Date(t);
    let lbl='';
    try {
      if(shortR) lbl=d.toLocaleTimeString(loc,{hour:'2-digit',minute:'2-digit',timeZone:tz});
      else lbl=d.toLocaleDateString(loc,{month:'numeric',day:'numeric',timeZone:tz});
    } catch(e){
      if(shortR) lbl=d.toLocaleTimeString(loc,{hour:'2-digit',minute:'2-digit'});
      else lbl=d.toLocaleDateString(loc,{month:'numeric',day:'numeric'});
    }
    ctx.fillText(lbl,x,h-pad.b+12);
  });

  // Range info
  const sub=document.getElementById('histRangeSub');
  if(sub){
    const rangeLabel = {
      '1m':'Last 1h','5m':'Last 6h','15m':'Last 24h','30m':'Last 3d',
      '1h':'Last 7d','4h':'Last 14d','1d':'Last 30d','1w':'Last 90d','1M':'All time'
    };
    const rlKo = {
      '1m':'최근 1시간','5m':'최근 6시간','15m':'최근 24시간','30m':'최근 3일',
      '1h':'최근 7일','4h':'최근 14일','1d':'최근 30일','1w':'최근 90일','1M':'전체'
    };
    const pLabels={
      '1h': TT({ko:'최근 1시간',en:'Last 1h',ja:'直近1時間',es:'Última 1h',de:'Letzte 1 Std.'}),
      '4h': TT({ko:'최근 4시간',en:'Last 4h',ja:'直近4時間',es:'Últimas 4h',de:'Letzte 4 Std.'}),
      '6h': TT({ko:'최근 6시간',en:'Last 6h',ja:'直近6時間',es:'Últimas 6h',de:'Letzte 6 Std.'}),
      '12h': TT({ko:'최근 12시간',en:'Last 12h',ja:'直近12時間',es:'Últimas 12h',de:'Letzte 12 Std.'}),
      '1d': TT({ko:'최근 24시간',en:'Last 24h',ja:'直近24時間',es:'Últimas 24h',de:'Letzte 24 Std.'}),
      '7d': TT({ko:'최근 7일',en:'Last 7d',ja:'直近7日間',es:'Últimos 7d',de:'Letzte 7 Tage'}),
      '30d': TT({ko:'최근 30일',en:'Last 30d',ja:'直近30日間',es:'Últimos 30d',de:'Letzte 30 Tage'}),
      'all': TT({ko:'전체',en:'All time',ja:'全期間',es:'Todo el tiempo',de:'Gesamter Zeitraum'}),
    };
    sub.textContent=`${pLabels[histPeriod]||histPeriod} · ${data.length} ${TT({ko:'포인트',en:'points',ja:'ポイント',es:'puntos',de:'Punkte'})}`;
    // 통계 업데이트
    if(data.length > 0) {
      const scores = data.map(x=>x.s);
      const hi = Math.max(...scores);
      const lo = Math.min(...scores);
      const now = scores[scores.length-1];
      const hEl=document.getElementById('histHigh');
      const lEl=document.getElementById('histLow');
      const nEl=document.getElementById('histNow');
      if(hEl) hEl.textContent=hi.toFixed(1);
      if(lEl) lEl.textContent=lo.toFixed(1);
      if(nEl) nEl.textContent=now.toFixed(1);
    }
  }

  // 호버 툴팁이 참조할 플롯 상태 저장 (좌표 재계산 없이 최근점을 빠르게 찾기 위함)
  historyPlotState = {data, minS, maxS, pad, pw, ph, w, h, tStart, tSpan};
  attachHistoryHover(); // 최초 1회만 실제로 이벤트를 붙임 (내부에서 중복 방지)
}

let historyPlotState = null;
let historyHoverAttached = false;

/** 스코어 히스토리 차트에 마우스오버 시 각 포인트의 점수/시각을 툴팁으로 표시 */
function attachHistoryHover() {
  if(historyHoverAttached) return;
  const canvas = document.getElementById('historyCanvas');
  const hoverCanvas = document.getElementById('historyHoverCanvas');
  const tooltip = document.getElementById('histTooltip');
  const tScore = document.getElementById('histTooltipScore');
  const tTime = document.getElementById('histTooltipTime');
  if(!canvas || !hoverCanvas || !tooltip) return;
  historyHoverAttached = true;

  function findNearestPoint(mouseX) {
    if(!historyPlotState) return null;
    const {data, pad, pw, tStart, tSpan} = historyPlotState;
    if(!data || data.length === 0) return null;
    const ratio = Math.max(0, Math.min(1, (mouseX - pad.l) / pw));
    const targetT = tStart + ratio * tSpan;      // 마우스 위치의 시각
    // 그 시각에 가장 가까운 데이터 포인트 찾기
    let bestIdx = 0, bestDiff = Infinity;
    for(let i=0;i<data.length;i++){
      const diff = Math.abs(data[i].t - targetT);
      if(diff < bestDiff){ bestDiff = diff; bestIdx = i; }
    }
    return {idx: bestIdx, point: data[bestIdx]};
  }

  function drawCrosshair(x, y) {
    const dpr = window.devicePixelRatio||1;
    const hctx = hoverCanvas.getContext('2d');
    const w = hoverCanvas.offsetWidth||600, h = hoverCanvas.offsetHeight||160;
    hoverCanvas.width = w*dpr; hoverCanvas.height = h*dpr;
    hctx.scale(dpr,dpr);
    hctx.clearRect(0,0,w,h);
    if(!historyPlotState) return;
    const {pad, ph} = historyPlotState;
    // 세로 점선 가이드
    hctx.strokeStyle='rgba(255,255,255,.2)';
    hctx.setLineDash([3,3]);
    hctx.beginPath(); hctx.moveTo(x, pad.t); hctx.lineTo(x, pad.t+ph); hctx.stroke();
    hctx.setLineDash([]);
    // 강조 점
    hctx.beginPath(); hctx.arc(x, y, 4, 0, Math.PI*2);
    hctx.fillStyle='#fff'; hctx.fill();
    hctx.beginPath(); hctx.arc(x, y, 6, 0, Math.PI*2);
    hctx.strokeStyle='#4ade80'; hctx.lineWidth=2; hctx.stroke();
  }

  function handleMove(clientX, clientY) {
    if(!historyPlotState) return;
    const rect = canvas.getBoundingClientRect();
    const mouseX = clientX - rect.left;
    const nearest = findNearestPoint(mouseX);
    if(!nearest || !nearest.point) { hideTooltip(); return; }
    const {data, minS, maxS, pad, pw, ph, tStart, tSpan} = historyPlotState;
    const x = pad.l + Math.max(0, Math.min(1, (nearest.point.t - tStart)/tSpan))*pw;
    const y = pad.t + ph - (nearest.point.s - minS)/(maxS - minS)*ph;
    drawCrosshair(x, y);

    // 툴팁 텍스트: 점수 + 날짜/시각 (기간이 짧으면 시각, 길면 날짜) — 언어별 타임존 적용
    const shortR = ['1h','4h','6h','12h','1d'].includes(histPeriod);
    const dLoc = SUPPORTED_LANG_CODES.includes(currentLang) ? currentLang : 'en';
    const TZ2 = {ko:'Asia/Seoul', ja:'Asia/Tokyo', en:'America/New_York', es:'Europe/Madrid', de:'Europe/Berlin', fr:'Europe/Paris', pt:'America/Sao_Paulo', tr:'Europe/Istanbul', vi:'Asia/Ho_Chi_Minh'};
    const dtz = TZ2[currentLang] || undefined;
    let timeStr;
    try {
      timeStr = shortR
        ? new Date(nearest.point.t).toLocaleTimeString(dLoc,{hour:'2-digit',minute:'2-digit',timeZone:dtz})
        : new Date(nearest.point.t).toLocaleDateString(dLoc,{year:'numeric',month:'short',day:'numeric',timeZone:dtz});
    } catch(e){
      timeStr = shortR
        ? new Date(nearest.point.t).toLocaleTimeString(dLoc,{hour:'2-digit',minute:'2-digit'})
        : new Date(nearest.point.t).toLocaleDateString(dLoc,{year:'numeric',month:'short',day:'numeric'});
    }
    tScore.textContent = TT({ko:`점수 ${nearest.point.s.toFixed(2)}`,en:`Score ${nearest.point.s.toFixed(2)}`,ja:`スコア ${nearest.point.s.toFixed(2)}`,es:`Puntuación ${nearest.point.s.toFixed(2)}`,de:`Score ${nearest.point.s.toFixed(2)}`});
    tTime.textContent = timeStr;

    // 툴팁 위치 (캔버스 좌상단 기준 오프셋)
    tooltip.style.left = x + 'px';
    tooltip.style.top = Math.max(20, y - 12) + 'px';
    tooltip.style.display = 'block';
  }

  function hideTooltip() {
    tooltip.style.display = 'none';
    const hctx = hoverCanvas.getContext('2d');
    hctx.clearRect(0,0,hoverCanvas.width,hoverCanvas.height);
  }

  hoverCanvas.style.pointerEvents = 'auto'; // 이벤트 수신을 위해 이 캔버스가 마우스 이벤트를 받도록
  hoverCanvas.addEventListener('mousemove', (e) => handleMove(e.clientX, e.clientY));
  hoverCanvas.addEventListener('mouseleave', hideTooltip);
  hoverCanvas.addEventListener('touchmove', (e) => {
    if(e.touches && e.touches[0]) { handleMove(e.touches[0].clientX, e.touches[0].clientY); e.preventDefault(); }
  }, {passive:false});
  hoverCanvas.addEventListener('touchend', hideTooltip);

  // ── 좌우 드래그(팬) ──────────────────────────────
  let dragging=false, dragStartX=0, dragStartPan=0;
  const pxToMs = () => {
    // 화면 1px이 몇 ms인지 (현재 보이는 폭 기준)
    const st = historyPlotState;
    if(!st || !st.pw) return 0;
    return st.tSpan / st.pw;
  };
  const startDrag = (x) => { dragging=true; dragStartX=x; dragStartPan=chartPan; hoverCanvas.style.cursor='grabbing'; };
  const moveDrag = (x) => {
    if(!dragging) return;
    const dx = x - dragStartX;               // 오른쪽으로 끌면 +
    chartPan = dragStartPan + dx * pxToMs();  // 오른쪽 드래그 = 과거로
    drawHistory();
  };
  const endDrag = () => { dragging=false; hoverCanvas.style.cursor='crosshair'; };

  hoverCanvas.addEventListener('mousedown', (e) => { startDrag(e.clientX); e.preventDefault(); });
  window.addEventListener('mousemove', (e) => { if(dragging) moveDrag(e.clientX); });
  window.addEventListener('mouseup', endDrag);

  // ── 휠 줌 (확대/축소) ────────────────────────────
  hoverCanvas.addEventListener('wheel', (e) => {
    e.preventDefault();
    const factor = e.deltaY < 0 ? 1.2 : 1/1.2;   // 위로 굴리면 확대
    const newZoom = Math.max(1, Math.min(50, chartZoom * factor));
    chartZoom = newZoom;
    drawHistory();
  }, {passive:false});

  // ── 터치: 한 손가락 팬 + 두 손가락 핀치 줌 ──────────
  let pinchStartDist=0, pinchStartZoom=1, touchPanStartX=0, touchPanStartPan=0, touchMode='';
  hoverCanvas.addEventListener('touchstart', (e) => {
    if(e.touches.length===2){
      touchMode='pinch';
      const dx=e.touches[0].clientX-e.touches[1].clientX, dy=e.touches[0].clientY-e.touches[1].clientY;
      pinchStartDist=Math.hypot(dx,dy); pinchStartZoom=chartZoom;
    } else if(e.touches.length===1){
      touchMode='pan'; touchPanStartX=e.touches[0].clientX; touchPanStartPan=chartPan;
    }
  }, {passive:true});
  hoverCanvas.addEventListener('touchmove', (e) => {
    if(touchMode==='pinch' && e.touches.length===2){
      const dx=e.touches[0].clientX-e.touches[1].clientX, dy=e.touches[0].clientY-e.touches[1].clientY;
      const dist=Math.hypot(dx,dy);
      if(pinchStartDist>0){ chartZoom=Math.max(1,Math.min(50,pinchStartZoom*(dist/pinchStartDist))); drawHistory(); }
      e.preventDefault();
    } else if(touchMode==='pan' && e.touches.length===1){
      const dx=e.touches[0].clientX-touchPanStartX;
      chartPan=touchPanStartPan + dx*pxToMs(); drawHistory();
    }
  }, {passive:false});
  hoverCanvas.addEventListener('touchend', () => { touchMode=''; });

  // 더블클릭: 확대/이동 초기화
  hoverCanvas.addEventListener('dblclick', () => { chartZoom=1; chartPan=0; drawHistory(); });
}

// ═══════════════════════════════════════════════════════
// NOTIFICATIONS
// ═══════════════════════════════════════════════════════
function openModal(){document.getElementById('notifModal').classList.add('open')}
function closeModal(){document.getElementById('notifModal').classList.remove('open')}
function toggleAlert(el){
  el.classList.toggle('on');
  saveAlertSettings();
}

// 알림 토글 상태를 브라우저에 저장/복원 (새로고침해도 설정 유지)
const ALERT_IDS = ['a2','a3','a4','b1','b2','b3'];
function saveAlertSettings(){
  const state = {};
  ALERT_IDS.forEach(id=>{
    const el=document.getElementById(id);
    if(el) state[id]=el.classList.contains('on');
  });
  try { localStorage.setItem('alertSettings', JSON.stringify(state)); } catch(e){}
}
function loadAlertSettings(){
  try {
    const raw = localStorage.getItem('alertSettings');
    if(!raw) return; // 저장된 값이 없으면 HTML에 박혀있는 기본값(on/off) 그대로 사용
    const state = JSON.parse(raw);
    ALERT_IDS.forEach(id=>{
      if(!(id in state)) return;
      const el=document.getElementById(id);
      if(el) el.classList.toggle('on', !!state[id]);
    });
  } catch(e){}
}
async function requestNotif() {
  const statusEl = document.getElementById('notifStatus');
  if(!('Notification' in window)) {
    if(statusEl) { statusEl.textContent = TT({ko:'이 브라우저는 알림을 지원하지 않습니다.',en:'This browser does not support notifications.',ja:'このブラウザは通知に対応していません。',es:'Este navegador no admite notificaciones.',de:'Dieser Browser unterstützt keine Benachrichtigungen.'}); statusEl.style.color='var(--red)'; }
    return;
  }
  try {
    const p = await Notification.requestPermission();
    notifGranted = (p === 'granted');
    if(statusEl) {
      if(notifGranted) { statusEl.textContent = TT({ko:'✓ 알림이 활성화되었습니다',en:'✓ Notifications enabled',ja:'✓ 通知が有効になりました',es:'✓ Notificaciones activadas',de:'✓ Benachrichtigungen aktiviert'}); statusEl.style.color='var(--green)'; }
      else { statusEl.textContent = TT({ko:'알림 권한이 거부되었습니다.',en:'Notification permission denied.',ja:'通知の許可が拒否されました。',es:'Permiso de notificación denegado.',de:'Benachrichtigungsberechtigung verweigert.'}); statusEl.style.color='var(--red)'; }
    }
  } catch(e) {
    console.error('[notif] permission request failed:', e);
    if(statusEl) { statusEl.textContent = TT({ko:'알림 설정 중 오류 발생',en:'Error setting up notifications',ja:'通知設定中にエラーが発生しました',es:'Error al configurar notificaciones',de:'Fehler bei der Benachrichtigungseinrichtung'}); statusEl.style.color='var(--red)'; }
  }
}

// 점수 기반 LONG/SHORT 트리거만 체크 (가격 알림 제거됨)
// 코인/모드별로 직전 점수를 따로 추적 — 안 그러면 코인을 바꿨을 때
// "이전 코인의 점수 → 새 코인의 점수"를 마치 같은 코인의 시간 흐름인 것처럼
// 잘못 비교해서, 정작 새 코인이 이미 알림 구간에 들어와 있어도 못 잡거나
// 반대로 엉뚱하게 잘못 울리는 문제가 있었음.
let lastScoreByKey = {};

function checkAlerts(score, ind) {
  const key = `${currentCoin}_${currentMode}`;
  const isFirstView = !(key in lastScoreByKey); // 이 세션에서 이 코인/모드를 처음 보는 경우
  // 처음 보는 코인이면 "이전 점수"가 없으므로 -Infinity로 간주.
  // 이렇게 하면 코인을 막 전환했을 때 그 코인이 이미 알림 구간에 들어와 있으면
  // (이전엔 비교 대상이 없어서 조용히 넘어갔던 것과 달리) 바로 알림이 울림.
  const prev = isFirstView ? -Infinity : lastScoreByKey[key];
  lastScoreByKey[key] = score;

  const on=id=>document.getElementById(id)?.classList.contains('on');
  const rules = currentMode === 'buy' ? [
    {id:'a2', th:6.0, color:'var(--green2)', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 분할 매수 시작`,en:`${currentCoin} Long score ${score.toFixed(1)} — Split Long`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — 分割買い開始`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — Inicio de entrada escalonada`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Gestaffelter Einstieg startet`})},
    {id:'a3', th:7.0, color:'var(--green)', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 비중 확대`,en:`${currentCoin} Long score ${score.toFixed(1)} — Add Long`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — 比率拡大`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — Ampliar posición`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Position erhöhen`})},
    {id:'a4', th:8.0, color:'#22c55e', msg:TT({ko:`${currentCoin} 롱 점수 ${score.toFixed(1)} — 풀 롱!`,en:`${currentCoin} Long score ${score.toFixed(1)} — Full Long!`,ja:`${currentCoin} ロングスコア ${score.toFixed(1)} — フルロング!`,es:`Puntuación larga de ${currentCoin} ${score.toFixed(1)} — ¡Largo total!`,de:`${currentCoin} Long-Score ${score.toFixed(1)} — Voller Long!`})},
  ] : [
    {id:'b1', th:6.0, color:'var(--orange)', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 숏 준비`,en:`${currentCoin} Short score ${score.toFixed(1)} — Prepare Short`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — ショート準備`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — Preparar corto`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Short vorbereiten`})},
    {id:'b2', th:7.0, color:'var(--red)', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 숏 추가`,en:`${currentCoin} Short score ${score.toFixed(1)} — Add Short`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — ショート追加`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — Añadir corto`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Short erhöhen`})},
    {id:'b3', th:8.0, color:'#dc2626', msg:TT({ko:`${currentCoin} 숏 점수 ${score.toFixed(1)} — 풀 숏!`,en:`${currentCoin} Short score ${score.toFixed(1)} — Full Short!`,ja:`${currentCoin} ショートスコア ${score.toFixed(1)} — フルショート!`,es:`Puntuación corta de ${currentCoin} ${score.toFixed(1)} — ¡Corto total!`,de:`${currentCoin} Short-Score ${score.toFixed(1)} — Voller Short!`})},
  ];

  if(isFirstView) {
    // 코인을 막 바꿨을 때: 이미 넘어선 임계값이 여러 개라도 토스트는 "가장 높은 것" 딱 하나만 —
    // 예전엔 6.0/7.0 임계값을 동시에 넘긴 상태면 두 토스트가 겹쳐 뜨면서 "알림이 두 번 뜨는" 것처럼 보였음.
    const passed = rules.filter(r => on(r.id) && score >= r.th);
    if(passed.length > 0) {
      const top = passed.reduce((a,b) => a.th > b.th ? a : b);
      flashAlert(top.msg, top.color);
    }
  } else {
    // 평소(같은 코인 유지 중): 새로 진입한 임계값마다 각각 알림 — 정상적으로 여러 단계를 순서대로 넘을 수 있음
    rules.forEach(r => { if(on(r.id) && prev < r.th && score >= r.th) flashAlert(r.msg, r.color); });
  }
}

// ═══════════════════════════════════════════════════════
// MAIN LOAD
// ═══════════════════════════════════════════════════════
async function loadAll() {
  const myToken = loadToken;
  const btn=document.getElementById('refreshBtn');
  btn.style.opacity='.4';btn.style.pointerEvents='none';
  document.getElementById('err').style.display='none';

  // 캐시가 있으면 오버레이를 즉시 숨김 — 재방문 시 빈 화면 없이 바로 표시
  try {
    const hasCached = localStorage.getItem(`btct_cache_${currentCoin}_buy`);
    if(hasCached) {
      const ov=document.getElementById('overlay'); if(ov) ov.style.display='none';
    }
  } catch(e){}

  try {
    const loadingCoin = currentCoin; // 로드 시작 시점의 코인
    document.getElementById('ovTxt').textContent=`Fetching ${currentCoin} data...`;

    // 서버(PHP)에서 LONG/SHORT 점수를 동시에 받아옴 — 계산 로직은 서버에서만 실행됨
    const [buyData, sellData] = await Promise.all([
      fetchScoreFromAPI(currentCoin, 'buy'),
      fetchScoreFromAPI(currentCoin, 'sell'),
    ]);

    // 티커바 도미넌스/마켓캡/볼륨 — api.php 응답에서 직접 채움 (CoinGecko 별도 호출 불필요)
    updateTickerFromAPI(buyData);

    // 데이터 신선도 표시: 서버 updated_at이 3분 이내면 LIVE(초록), 그 이상이면 DELAYED(주황)
    updateLiveTag(buyData && buyData.updated_at);

    // 토큰 불일치 = 다른 코인으로 전환됨 → 결과 무시
    if(myToken !== loadToken || loadingCoin !== currentCoin) {
      return;
    }

    const p = livePrice || buyData.price || 60000;

    // ind: 화면 표시용 메타데이터 + 서버가 계산한 결과(_buyResult, _sellResult) 포함
    const raw = buyData.raw || {};
    const ind = {
      coin: currentCoin,
      price: p,
      ma200w: buyData.ma200w || 62000,
      fear_greed: buyData.fear_greed ?? 13,
      fg_label: buyData.fg_label || 'Extreme Fear',
      ath_drop: buyData.ath_drop,
      realized_price: buyData.realized_price,
      // 트리거 체크리스트 패널용 raw 값 (서버에서 전달받음, 계산식은 노출 안 됨)
      mvrv_z: raw.mvrv_z,
      nupl: raw.nupl,
      funding: raw.funding,
      cb_premium: raw.cb_premium,
      hr_status: raw.hr_status,
      _buyResult: buyData.result,
      _sellResult: sellData.result,
      usdt_krw: buyData.usdt_krw,
      usdt_chg: buyData.usdt_chg,
      usdt_prices: buyData.usdt_prices,
      fx_rates: buyData.fx_rates,
    };

    renderAll(ind);

  } catch(e) {
    document.getElementById('err').textContent=`⚠ Error: ${e.message}`;
    document.getElementById('err').style.display='block';
  } finally {
    btn.style.opacity='';btn.style.pointerEvents='';
    // 오버레이는 첫 로딩 후 완전히 제거
    const ov = document.getElementById('overlay');
    if(ov) ov.style.display='none';
  }
}

// ═══════════════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════════════
// ═══════════════════════════════════════════════════════
// i18n
// ═══════════════════════════════════════════════════════
// LANGS 사전은 /lang.js로 분리됨 (window.LANGS로 접근). — head에서 먼저 로드



let currentLang = (function() {
  // 언어 우선순위: URL ?lang= (사이트맵·구글 검색결과·공유링크로 특정 언어 진입) > localStorage(마지막 선택) > 브라우저 언어 > ko.
  // URL에 lang이 명시돼 있으면 그 의도를 최우선으로 존중한다. (사용자가 페이지 안에서 언어를 바꾸면
  //  setLang이 URL의 ?lang=도 함께 갱신하므로, 이후 저장값 기반 동작과 충돌하지 않는다.)
  try {
    const p = new URLSearchParams(location.search).get('lang');
    if (SUPPORTED_LANG_CODES.includes(p)) return p;
  } catch(e) {}
  try {
    const saved = localStorage.getItem('blogLang');
    if (SUPPORTED_LANG_CODES.includes(saved)) return saved;
  } catch(e) {}
  // 첫 방문(저장값·URL 모두 없음)이면 브라우저 언어를 감지해 시작. 지원 언어가 아니면 ko.
  try {
    const nav = (navigator.languages && navigator.languages[0]) || navigator.language || '';
    const code = nav.toLowerCase().split('-')[0]; // 'en-US' → 'en'
    if (SUPPORTED_LANG_CODES.includes(code)) return code;
  } catch(e) {}
  return 'ko';
})();

/** 코드 곳곳에 흩어진 'ko ? A : B' 삼항연산자들을 여러 언어로 확장하기 위한 헬퍼.
 *  기존 사용법(하위호환, ko/en/ja 3개 고정): TT({ko:'한국어',en:'English',ja:'日本語',es:'Español',de:'Deutsch'})
 *    → 신규 언어(스페인어 등)로 전환 시 이 형태의 호출은 자동으로 en 텍스트가 뜸(디그레이드).
 *  신규 사용법(언어 무제한 확장): TT({ko:'한국어', en:'English', ja:'日本語', es:'Español'})
 *    → 이 객체 형태를 쓰면 SUPPORTED_LANGS에 언어가 추가될 때마다 자연스럽게 대응됨.
 *  앞으로 새로 쓰는 코드는 가급적 객체 형태를 쓰는 걸 권장 — 위치 인자 방식은 3개 언어에서 더 안 늘어남. */
function TT(a, en, ja) {
  if(a !== null && typeof a === 'object') {
    return a[currentLang] ?? a.en ?? a.ko ?? '';
  }
  const ko = a;
  if(currentLang === 'ko') return ko;
  if(currentLang === 'ja') return (ja !== undefined && ja !== null) ? ja : en;
  return en; // ko/en/ja 외 언어(스페인어 등)는 위치 인자 호출에선 영어로 폴백
}

function T(key, args) {
  const L = LANGS[currentLang] || LANGS.en;
  const v = L[key] || LANGS.en[key] || key;
  if(typeof v === 'function') return v(...(args||[]));
  return v;
}



// ═══════════════════════════════════════════════════════
// HISTORY TAB
// ═══════════════════════════════════════════════════════
let histPeriod = '1d'; // 1h, 6h, 1d, 7d, 30d
let chartZoom = 1;     // 1=기간 전체, >1=확대
let chartPan = 0;      // 오른쪽(현재) 기준 과거로 밀어낸 ms

function setHistPeriod(p) {
  histPeriod = p;
  chartZoom = 1; chartPan = 0; // 기간 바꾸면 확대/이동 초기화
  const idMap = {'1h':'htp1h','4h':'htp4h','6h':'htp6h','12h':'htp12h','1d':'htp1d','7d':'htp7d','30d':'htp30d'};
  Object.entries(idMap).forEach(([t, id]) => {
    const el = document.getElementById(id);
    if(el) el.classList.toggle('active', t===p);
  });
  drawHistory();
}
// 호환성
function setHistTab(tab) { setHistPeriod('1d'); }

/** "왜?" 버튼 — 지금 이 점수에 가장 크게 기여한 지표(상위)와 가장 발목을 잡은 지표(하위)를
 *  보여줌. 히스토리에는 개별 지표별 과거값이 저장되지 않아서 "직전 대비 변화"는 안 되고,
 *  대신 "현재 이 점수를 구성하는 요인"을 정직하게 설명하는 방식으로 구현함. */
function toggleWhyPanel() {
  const panel = document.getElementById('whyPanel');
  if (!panel) return;
  const isOpen = panel.style.display !== 'none';
  if (isOpen) { panel.style.display = 'none'; return; }
  renderWhyPanel();
  panel.style.display = 'block';
}

function renderWhyPanel() {
  const panel = document.getElementById('whyPanel');
  if (!panel || !lastResultDetails) return;
  const items = Object.values(lastResultDetails)
    .filter(d => typeof d.score === 'number' && typeof d.max === 'number' && d.max > 0)
    .map(d => ({ label: d.label, ratio: d.score / d.max, score: d.score, max: d.max }));
  if (!items.length) { panel.innerHTML = ''; return; }
  const sorted = [...items].sort((a, b) => b.ratio - a.ratio);
  const top = sorted.slice(0, 3);
  const bottom = sorted.slice(-3).reverse();
  const row = (it, positive) => `<div style="display:flex;justify-content:space-between;padding:3px 0">
    <span style="color:var(--t2)">${positive ? '✓' : '✗'} ${it.label}</span>
    <span style="color:${positive ? 'var(--green)' : 'var(--red)'};font-weight:700">${it.score}/${it.max}</span>
  </div>`;
  panel.innerHTML = `
    <div style="font-weight:700;color:var(--t1);margin-bottom:4px">${T('whyTopTitle')}</div>
    ${top.map(it => row(it, true)).join('')}
    <div style="font-weight:700;color:var(--t1);margin:8px 0 4px">${T('whyBottomTitle')}</div>
    ${bottom.map(it => row(it, false)).join('')}
  `;
}

/** 스코어 카드 하단의 작은 "오늘/어제/지난주" 점수 미니 위젯.
 *  localStorage에 쌓인 전체 히스토리에서 가장 가까운 시점의 값을 찾아 보여줌. */
function renderMiniHistory() {
  const el = document.getElementById('miniHistory');
  if (!el) return;
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h = [];
  try { h = JSON.parse(localStorage.getItem(key) || '[]'); } catch(e) {}
  if (!h.length) { el.innerHTML = ''; return; }
  const now = Date.now();
  const findNearest = (targetAgoMs) => {
    const targetT = now - targetAgoMs;
    let best = null, bestDiff = Infinity;
    for (const p of h) {
      const diff = Math.abs(p.t - targetT);
      if (diff < bestDiff) { bestDiff = diff; best = p; }
    }
    // 목표 시점과 6시간 이상 차이나면(데이터가 그 시점에 아예 없었던 것) 표시하지 않음
    return bestDiff <= 6 * 60 * 60 * 1000 ? best : null;
  };
  const yesterday = findNearest(24 * 60 * 60 * 1000);
  const weekAgo = findNearest(7 * 24 * 60 * 60 * 1000);
  const chip = (label, val) => val == null ? '' :
    `<div><span style="opacity:.7">${label}</span> <b style="color:var(--t1)">${val.s.toFixed(1)}</b></div>`;
  el.innerHTML = [
    chip(T('histToday'), { s: currentScore }),
    chip(T('histYesterday'), yesterday),
    chip(T('histWeekAgo'), weekAgo),
  ].filter(Boolean).join('');
}

function getHistoryData() {
  const modeKey = currentMode === 'buy' ? 'long' : 'short';
  const key = `history_${currentCoin}_${modeKey}`;
  let h = [];
  try { h = JSON.parse(localStorage.getItem(key)||'[]'); } catch(e) {}
  const now = Date.now();
  const rangeMap = {'1h':3600000,'4h':4*3600000,'6h':6*3600000,'12h':12*3600000,'1d':86400000,'7d':7*86400000,'30d':30*86400000,'all':Infinity};
  const range = rangeMap[histPeriod] || rangeMap['1d'];
  const filtered = range===Infinity ? h : h.filter(x=>now-x.t<range);
  // 최대 300포인트
  if(filtered.length<=300) return filtered.sort((a,b)=>a.t-b.t);
  const step=Math.ceil(filtered.length/300);
  return filtered.filter((_,i)=>i%step===0).sort((a,b)=>a.t-b.t);
}

// ═══════════════════════════════════════════════════════
// IMPROVED SELL SCORE — 현재 시장 상황 반영
// ═══════════════════════════════════════════════════════
// buy가 낮을 때(저점)는 sell도 낮아야 정상
// 별도 "셀 압력 게이지"로 표현

// ═══════════════════════════════════════════════════════
// ALERT SYSTEM 강화
// ═══════════════════════════════════════════════════════
let alertState = {};
let prevIndicators = {};

let activeToastCount = 0; // 동시에 떠 있는 토스트 개수 — 겹치지 않게 세로로 쌓기 위함

function flashAlert(msg, color='#fbbf24') {
  // 화면 테두리 깜빡임
  const div = document.createElement('div');
  div.style.cssText = `position:fixed;inset:0;pointer-events:none;border:3px solid ${color};z-index:9999;border-radius:0;animation:flashAnim .6s ease 3`;
  div.innerHTML = `<style>@keyframes flashAnim{0%,100%{opacity:0}50%{opacity:1}}</style>`;
  document.body.appendChild(div);
  setTimeout(()=>div.remove(), 2000);

  // 토스트 메시지 — 이미 떠 있는 토스트가 있으면 그 아래로 쌓음 (겹쳐 보이는 문제 방지)
  const topOffset = 70 + activeToastCount * 54;
  activeToastCount++;
  const toast = document.createElement('div');
  toast.style.cssText = `position:fixed;top:${topOffset}px;right:16px;background:${color};color:#000;padding:10px 16px;border-radius:10px;font-size:12px;font-weight:600;z-index:9999;max-width:min(280px, calc(100vw - 32px));box-shadow:0 4px 20px rgba(0,0,0,.4);animation:slideIn .3s ease;transition:top .25s ease`;
  toast.innerHTML = `<style>@keyframes slideIn{from{transform:translateX(120%)}to{transform:translateX(0)}}</style>🔔 ${msg}`;
  document.body.appendChild(toast);
  setTimeout(()=>{
    toast.remove();
    activeToastCount = Math.max(0, activeToastCount - 1);
  }, 5000);

  // 브라우저 알림
  if(notifGranted) {
    try { new Notification('BTCtiming.com', {body:msg}); } catch(e){}
  }

  // 알림음 (간단한 비프)
  try {
    const ctx = new (window.AudioContext||window.webkitAudioContext)();
    const osc = ctx.createOscillator();
    const gain = ctx.createGain();
    osc.connect(gain); gain.connect(ctx.destination);
    osc.frequency.value = 880;
    gain.gain.setValueAtTime(0.3, ctx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime+0.5);
    osc.start(); osc.stop(ctx.currentTime+0.5);
  } catch(e){}
}

function isOn(id) { return document.getElementById(id)?.classList.contains('on'); }


// ═══════════════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════════════
// TradingView: iframe 방식 (스크립트 불필요)
initChart();

initTabs();
connectWS();
// 저장된/URL 언어 설정을 드롭다운과 html 태그에도 반영
/** 블로그/페이지 URL 언어 접미사 생성. 'ko'는 접미사 없음(fallback 언어). SUPPORTED_LANGS 기반이라 새 언어 추가시 코드 수정 불필요. */
function blogSuffix(lang) { return lang === 'ko' ? '' : '?lang=' + lang; }
/** feed.php가 내려주는 title_xx/category_xx 등 언어별 필드에서 현재 언어 값을 꺼내되, 없으면 영어→한국어 순으로 폴백. */
function pickLangField(obj, prefix, lang) { return obj[prefix + '_' + lang] || obj[prefix + '_en'] || obj[prefix + '_ko'] || ''; }
/** 언어에 의존하는 위젯/링크/정적 라벨을 전부 다시 그림.
 *  최초 페이지 로드는 물론, 브라우저 "뒤로가기"로 bfcache(캐시된 페이지 스냅샷)에서
 *  복원되는 경우에도 다시 실행되어야 함 — bfcache 복원 시에는 <script> 태그가 재실행되지
 *  않아서, 이 함수를 한 번만 호출하는 구조로는 뒤로가기 후 하단 링크/문구가 예전 상태
 *  (혹은 기본값인 한국어)로 굳어버리는 문제가 있었음. */
function refreshLangDependentUI() {
  updateLangUI(currentLang);
  applyStaticI18n();
  loadCategoryLinks();
  loadInsightWidget();
  loadBlogTicker();
  loadTicker(); // bfcache 복원 시에도 언어에 맞는 통화(KRW/USD/JPY/EUR)로 티커 재조회
}
refreshLangDependentUI(); // 최초 로딩 (단, footer 등 이 <script> 뒤에 오는 요소는 아직 DOM에 없음)
// ⚠ 이 스크립트는 문서 중간(footer 앞)에서 실행되므로, footer의 [data-i](개인정보처리방침/이용약관/
//   투자조언 등)는 위 호출 시점엔 아직 존재하지 않아 번역이 안 됨. 서버는 URL ?lang=만 보고 footer를
//   렌더하므로, 저장 언어가 ko가 아니면 footer만 한국어로 남는다. → DOM 완성 후 한 번 더 적용.
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', function(){ applyStaticI18n(); updateLangUI(currentLang); loadCategoryLinks(); });
} else {
  applyStaticI18n(); updateLangUI(currentLang); loadCategoryLinks();
}
// 뒤로가기/앞으로가기 복원(bfcache, event.persisted===true)뿐 아니라, URL에 ?lang= 없이
// 홈으로 돌아온 경우(서버는 ?lang만 보므로 footer 등을 한국어로 렌더함)에도 언어가 어긋난다.
// 그래서 표시될 때마다 localStorage의 저장 언어와 현재 언어가 다르면 재동기화한다.
function syncLangFromStorage() {
  try {
    // URL에 lang이 명시돼 있으면 그것을 최우선으로 존중(사이트맵·검색결과 진입).
    const urlLang = new URLSearchParams(location.search).get('lang');
    const desired = SUPPORTED_LANG_CODES.includes(urlLang)
      ? urlLang
      : localStorage.getItem('blogLang');
    if (SUPPORTED_LANG_CODES.includes(desired) && desired !== currentLang) {
      currentLang = desired;
      refreshLangDependentUI();
    }
  } catch(err) {}
}
window.addEventListener('pageshow', function(e) {
  if (e.persisted) {
    // bfcache 복원: 스냅샷 일부 텍스트(footer 등)가 어긋날 수 있으므로 언어를 다시 읽어 전체 UI 재적용.
    // URL에 lang이 명시돼 있으면 그것을 우선(사이트맵·검색결과 진입), 아니면 저장값.
    try {
      const urlLang = new URLSearchParams(location.search).get('lang');
      const desired = SUPPORTED_LANG_CODES.includes(urlLang) ? urlLang : localStorage.getItem('blogLang');
      if (SUPPORTED_LANG_CODES.includes(desired)) currentLang = desired;
    } catch(err) {}
    refreshLangDependentUI();
    loadAll();
  } else {
    // 일반 표시(fresh load 등): 저장 언어와 다르면만 재동기화
    syncLangFromStorage();
  }
});
loadAlertSettings(); // 저장된 알림 토글 설정 복원 (새로고침해도 유지)

// 첫 방문자 안내 — 점수 의미를 한 줄로. 닫으면 localStorage에 기록해 다시 안 띄움.
// 데이터 신선도 배지: updated_at 기준 3분 이내면 LIVE(초록), 초과면 DELAYED(주황)
function updateLiveTag(updatedAt){
  const tag=document.getElementById('liveTag'); if(!tag) return;
  let fresh=true;
  if(updatedAt){ const age=Date.now()-new Date(updatedAt).getTime(); fresh = age >= 0 && age < 3*60*1000; }
  const dot=tag.querySelector('.live-dot');
  if(fresh){
    tag.style.color='var(--green)'; tag.style.borderColor='rgba(74,222,128,.3)'; tag.style.background='rgba(74,222,128,.08)';
    if(dot){ dot.style.background='var(--green)'; dot.style.animation='pulse 1.5s infinite'; }
    tag.childNodes[tag.childNodes.length-1].nodeValue='LIVE';
  } else {
    tag.style.color='var(--orange)'; tag.style.borderColor='rgba(251,146,60,.3)'; tag.style.background='rgba(251,146,60,.08)';
    if(dot){ dot.style.background='var(--orange)'; dot.style.animation='none'; }
    tag.childNodes[tag.childNodes.length-1].nodeValue='DELAYED';
  }
}

function dismissOnboard(){
  try { localStorage.setItem('onboardSeen','1'); } catch(e){}
  const t=document.getElementById('onboardTip'); if(t) t.style.display='none';
}
function renderOnboardText(){
  const txt=document.getElementById('onboardTipText'); if(!txt) return;
  const isShort = (currentMode === 'sell');
  if(isShort){
    txt.innerHTML = TT({
      ko:'👋 <b>처음 오셨나요?</b> 이 점수는 0~10으로, <b>높을수록 매도·숏(하락 베팅) 타이밍</b>에 가깝다는 뜻입니다. 아래 지표들을 종합한 값이에요.',
      en:'👋 <b>New here?</b> This 0–10 score shows how good the <b>sell / short (bet on a drop) timing</b> is — higher is better. It combines the indicators below.',
      ja:'👋 <b>初めてですか?</b> このスコアは0〜10で、<b>高いほど売り・ショート(下落ベット)のタイミング</b>が良いことを示します。下の指標を総合した値です。',
      es:'👋 <b>¿Primera vez?</b> Esta puntuación de 0 a 10 indica qué tan buen <b>momento de venta / corto (apostar a la baja)</b> es — más alto es mejor. Combina los indicadores de abajo.',
      de:'👋 <b>Neu hier?</b> Dieser Wert von 0–10 zeigt, wie gut das <b>Verkaufs-/Short-Timing (auf fallende Kurse setzen)</b> ist — höher ist besser. Er fasst die Indikatoren unten zusammen.'
    });
  } else {
    txt.innerHTML = TT({
      ko:'👋 <b>처음 오셨나요?</b> 이 점수는 0~10으로, <b>높을수록 매수·롱(상승 베팅) 타이밍</b>에 가깝다는 뜻입니다. 아래 지표들을 종합한 값이에요.',
      en:'👋 <b>New here?</b> This 0–10 score shows how good the <b>buy / long (bet on a rise) timing</b> is — higher is better. It combines the indicators below.',
      ja:'👋 <b>初めてですか?</b> このスコアは0〜10で、<b>高いほど買い・ロング(上昇ベット)のタイミング</b>が良いことを示します。下の指標を総合した値です。',
      es:'👋 <b>¿Primera vez?</b> Esta puntuación de 0 a 10 indica qué tan buen <b>momento de compra / largo (apostar a la subida)</b> es — más alto es mejor. Combina los indicadores de abajo.',
      de:'👋 <b>Neu hier?</b> Dieser Wert von 0–10 zeigt, wie gut das <b>Kauf-/Long-Timing (auf steigende Kurse setzen)</b> ist — höher ist besser. Er fasst die Indikatoren unten zusammen.'
    });
  }
}
function showOnboardIfFirst(){
  try { if(localStorage.getItem('onboardSeen')) return; } catch(e){}
  const tip=document.getElementById('onboardTip'), txt=document.getElementById('onboardTipText');
  if(!tip||!txt) return;
  renderOnboardText();
  tip.style.display='block';
}
showOnboardIfFirst();
loadAll();

// Auto-refresh every 5 minutes
setInterval(loadAll, 5*60*1000);

// 1분마다 현재 점수 히스토리 저장 (탭 변경 시 데이터 축적)
setInterval(() => {
  if(currentScore > 0) {
    saveHistory(currentScore);
    drawHistory();
  }
}, 60*1000);

// Redraw history on resize
window.addEventListener('resize', drawHistory);
// 리사이즈 시 상단바 노출 개수도 재계산 (디바운스)
let _tabResizeTimer = null;
window.addEventListener('resize', () => {
  clearTimeout(_tabResizeTimer);
  _tabResizeTimer = setTimeout(() => { try { initTabs(); } catch(e){} }, 200);
});

// ── 스크롤 방향에 따라 모바일 하단바 표시/숨김 ──
// 아래로 스크롤(콘텐츠 읽는 중) → 숨김, 위로 스크롤 또는 멈춤 → 표시.
(function(){
  const bar = document.getElementById('mobileTabbar');
  if (!bar) return;
  let lastY = window.scrollY || 0;
  let idleTimer = null;
  const SHOW = () => bar.classList.remove('tabbar-hidden');
  const HIDE = () => bar.classList.add('tabbar-hidden');
  window.addEventListener('scroll', () => {
    const y = window.scrollY || 0;
    const dy = y - lastY;
    // 최상단 근처면 항상 표시
    if (y < 60) { SHOW(); }
    else if (dy > 6) { HIDE(); }        // 아래로 스크롤 → 숨김
    else if (dy < -6) { SHOW(); }       // 위로 스크롤 → 표시
    lastY = y;
    // 스크롤 멈추고 잠시 지나면 표시
    clearTimeout(idleTimer);
    idleTimer = setTimeout(SHOW, 900);
  }, { passive: true });
})();

function setLang(lang) {
  currentLang = lang;
  try { localStorage.setItem('blogLang', lang); } catch(e) {}
  // 2026-07 수정: 여기서 URL을 안 바꿔주고 있어서, 언어를 바꾼 뒤 URL은 계속 예전 언어(?lang=ja 등)로
  // 남아있었음. 이 상태에서 다른 페이지로 갔다가 "뒤로가기"가 bfcache 복원이 아니라 진짜 새로고침으로
  // 처리되면, 그 오래된 URL 기준으로 서버가 다시 렌더링하면서 방금 바꾼 언어가 원래대로 되돌아갔음.
  try {
    const url = new URL(location.href);
    if(lang === 'ko') url.searchParams.delete('lang'); else url.searchParams.set('lang', lang);
    history.replaceState(null, '', url);
  } catch(e) {}
  updateLangUI(lang);
  closeLangMenu();
  applyStaticI18n();
  renderCategoryLinks();
  renderInsightWidget();
  renderBlogTicker();
  loadTicker(); // 언어가 바뀌면 상단 티커의 기준 통화(KRW/USD/JPY/EUR)도 다시 불러옴
  if(indCache[currentCoin]) renderAll(indCache[currentCoin]);
  else loadAll();
}

/** 드롭다운 트리거 라벨 + 메뉴 항목 active 상태 + <html lang> + nav Blog 링크를 한 번에 갱신 */
function updateLangUI(lang) {
  const meta = LANG_META[lang] || LANG_META.ko;
  const triggerLabel = document.getElementById('langTriggerLabel');
  if(triggerLabel) triggerLabel.textContent = meta.code;
  document.querySelectorAll('.lang-menu-item').forEach(el => {
    el.classList.toggle('active', el.dataset.lang === lang);
  });
  document.documentElement.lang = lang;
  const navBlog = document.getElementById('navBlogLink');
  if(navBlog) navBlog.href = '/blog/' + blogSuffix(lang);
  const privacyLink = document.getElementById('footerPrivacyLink');
  if(privacyLink) privacyLink.href = '/privacy' + blogSuffix(lang);
  const termsLink = document.getElementById('footerTermsLink');
  if(termsLink) termsLink.href = '/terms' + blogSuffix(lang);
}

function toggleLangMenu(e) {
  if(e) e.stopPropagation();
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.toggle('open');
}
function closeLangMenu() {
  const dd = document.getElementById('langDropdown');
  if(dd) dd.classList.remove('open');
}
// 드롭다운 바깥을 클릭하면 자동으로 닫힘
document.addEventListener('click', (e) => {
  const dd = document.getElementById('langDropdown');
  if(dd && dd.classList.contains('open') && !dd.contains(e.target)) closeLangMenu();
});

let insightArticles = [];
let tickerArticles = [];

/** 상단 얇은 블로그 티커 — feed.php에서 최신 글 8개를 가져와 작은 글씨로 노출 */
function loadBlogTicker() {
  fetch('/blog/feed.php?limit=8')
    .then(r => r.json())
    .then(data => {
      tickerArticles = (data && data.articles) || [];
      renderBlogTicker();
    })
    .catch(() => {
      const bar = document.getElementById('blogTickerBar');
      if(bar) bar.style.display = 'none'; // 실패 시 조용히 숨김 (메인 기능에 영향 없도록)
    });
}

function renderBlogTicker() {
  const el = document.getElementById('blogTickerLinks');
  const label = document.getElementById('blogTickerLabel');
  const allLink = document.getElementById('blogTickerAllLink');
  if(!el || !tickerArticles.length) return;
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  if(label) label.textContent = TT({ko:'📰 블로그:',en:'📰 Blog:',ja:'📰 ブログ:',es:'📰 Blog:',de:'📰 Blog:'});
  if(allLink) {
    allLink.textContent = TT({ko:'전체 보기 →',en:'View All →',ja:'全て見る →',es:'Ver Todo →',de:'Alle ansehen →'});
    allLink.href = '/blog/' + suffix;
  }
  el.innerHTML = tickerArticles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    return `<a href="${a.url}${suffix}" style="color:var(--t2);text-decoration:none;margin-right:16px;
      display:inline-block;max-width:170px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
      vertical-align:bottom;border-bottom:1px solid var(--b1)" title="${title.replace(/"/g,'&quot;')}">${title}</a>`;
  }).join('');
}

/** 홈페이지 "최신 인사이트" 위젯 — blog/feed.php에서 최신 글들을 가져와 렌더링
 *  더보기 버튼으로 트래픽을 늘리기 위해 사이드바용 5개 + 그리드용 최대 25개를 한 번에 받아두고,
 *  그리드는 8개씩 점진적으로 공개한다. */
let insightGridPool = [];
let insightGridVisible = 8;
const INSIGHT_PAGE_SIZE = 8;

function loadInsightWidget() {
  fetch('/blog/feed.php?limit=30')
    .then(r => r.json())
    .then(data => {
      insightArticles = (data && data.articles) || [];
      renderInsightWidget();
    })
    .catch(() => {
      const grid = document.getElementById('insightGrid2');
      if(grid) grid.innerHTML = '';  // 실패 시 조용히 위젯 숨김 (메인 대시보드 기능에 영향 없도록)
    });
}

/** 카드들을 지정된 컨테이너에 렌더링하는 공통 헬퍼 */
/** 주어진 UTC 시점의 특정 타임존 오프셋(분) — CET(+60)/CEST(+120) 판별용 */
function tzOffsetMin(instant, tz) {
  const p = new Intl.DateTimeFormat('en-US', { timeZone: tz, hourCycle: 'h23',
    year:'numeric', month:'2-digit', day:'2-digit',
    hour:'2-digit', minute:'2-digit', second:'2-digit' })
    .formatToParts(instant).reduce((o,x)=>(o[x.type]=x.value,o),{});
  const asUTC = Date.UTC(+p.year, +p.month-1, +p.day, +p.hour, +p.minute, +p.second);
  return Math.round((asUTC - instant.getTime()) / 60000);
}

/**
 * 저장된 date(항상 KST 기준, "YYYY-MM-DD HH:mm:ss")를 현재 언어의 타임존으로 변환해
 * "YYYY.MM.DD HH:mm 라벨" 형태로 반환. 블로그 상세 표기 규칙과 동일하게 맞춤:
 *   ko→KST, ja→JST, en→UTC, es·de→CET/CEST(서머타임 자동 판별)
 */
function formatBlogCardDate(dateStr, lang) {
  if(!dateStr) return '';
  const m = String(dateStr).match(/^(\d{4})-(\d{2})-(\d{2})[ T](\d{2}):(\d{2})/);
  if(!m) return String(dateStr).replaceAll('-', '.'); // 형식이 다르면 안전하게 원본 표시
  // KST(UTC+9) 기준 문자열 → UTC epoch로 정규화 (브라우저 로컬 타임존에 의존하지 않음)
  const instant = new Date(Date.UTC(+m[1], +m[2]-1, +m[3], +m[4]-9, +m[5]));
  const CONF = {
    ko: { tz:'Asia/Seoul',    label:'KST' },
    ja: { tz:'Asia/Tokyo',    label:'JST' },
    en: { tz:'UTC',           label:'UTC' },
    es: { tz:'Europe/Madrid', label:null },
    de: { tz:'Europe/Berlin', label:null },
    fr: { tz:'Europe/Paris',  label:null },
    pt: { tz:'America/Sao_Paulo', label:'BRT' },
    tr: { tz:'Europe/Istanbul',   label:'TRT' },
    vi: { tz:'Asia/Ho_Chi_Minh',  label:'ICT' },
  };
  const c = CONF[lang] || CONF.en;
  const p = new Intl.DateTimeFormat('en-CA', { timeZone: c.tz, hourCycle: 'h23',
    year:'numeric', month:'2-digit', day:'2-digit',
    hour:'2-digit', minute:'2-digit' })
    .formatToParts(instant).reduce((o,x)=>(o[x.type]=x.value,o),{});
  const label = c.label || (tzOffsetMin(instant, c.tz) >= 120 ? 'CEST' : 'CET');
  return `${p.year}.${p.month}.${p.day} ${p.hour}:${p.minute} ${label}`;
}

/**
 * 현재 시각(지금)을 언어별 타임존으로 "M월 D일 오후 H:mm 라벨" 형태 짧게 표시.
 *   ko→KST, ja→JST, en→UTC, es·de→CET/CEST. tsLabel(업데이트 시각)용.
 */
function formatUpdatedStamp(lang) {
  const now = new Date();
  const CONF = {
    ko: { tz:'Asia/Seoul',    label:'KST' },
    ja: { tz:'Asia/Tokyo',    label:'JST' },
    en: { tz:'UTC',           label:'UTC' },
    es: { tz:'Europe/Madrid', label:null },
    de: { tz:'Europe/Berlin', label:null },
    fr: { tz:'Europe/Paris',  label:null },
    pt: { tz:'America/Sao_Paulo', label:'BRT' },
    tr: { tz:'Europe/Istanbul',   label:'TRT' },
    vi: { tz:'Asia/Ho_Chi_Minh',  label:'ICT' },
  };
  const c = CONF[lang] || CONF.en;
  const dLoc = (typeof SUPPORTED_LANG_CODES !== 'undefined' && SUPPORTED_LANG_CODES.includes(lang)) ? lang : 'en';
  const t = new Intl.DateTimeFormat(dLoc, {
    timeZone: c.tz, month:'short', day:'numeric', hour:'2-digit', minute:'2-digit'
  }).format(now);
  const label = c.label || (tzOffsetMin(now, c.tz) >= 120 ? 'CEST' : 'CET');
  return `${t} ${label}`;
}

function renderInsightCards(containerId, articles, ko, suffix) {
  const grid = document.getElementById(containerId);
  if(!grid || !articles.length) return;
  grid.innerHTML = articles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    const cat = pickLangField(a, 'category', currentLang);
    return `<a href="${a.url}${suffix}" class="insight-card" style="--icard-accent:${a.color};--icard-accent-bg:${a.color}26">
      <div class="insight-icon">${a.icon}</div>
      <div class="insight-body">
        <div class="insight-cat">${cat}</div>
        <div class="insight-title">${title}</div>
        <div class="insight-date">${formatBlogCardDate(a.date, currentLang)}</div>
      </div>
    </a>`;
  }).join('');
}

function updateInsightMoreButton() {
  const btn = document.getElementById('insightMoreBtn');
  const countEl = document.getElementById('insightMoreCount');
  const actions = document.getElementById('insightExpandedActions');
  if(!btn) return;
  if(insightGridVisible > INSIGHT_PAGE_SIZE) {
    // 한 번이라도 펼친 상태 — "더보기" 대신 "접기 / 전체 보기"로 전환
    btn.style.display = 'none';
    if(actions) actions.style.display = 'flex';
    return;
  }
  if(actions) actions.style.display = 'none';
  const remaining = insightGridPool.length - insightGridVisible;
  if(remaining <= 0) { btn.style.display = 'none'; return; }
  btn.style.display = '';
  if(countEl) countEl.textContent = `(${Math.min(remaining, INSIGHT_PAGE_SIZE)})`;
}

function loadMoreInsights() {
  // 한 번 누르면 8개만 추가로 펼침(총 16개) — 그 뒤엔 접기/전체보기 두 버튼으로 전환
  insightGridVisible = Math.min(insightGridPool.length, INSIGHT_PAGE_SIZE * 2);
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
}

function collapseInsights() {
  insightGridVisible = INSIGHT_PAGE_SIZE;
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
  // 접었을 때 위젯이 화면 밖으로 벗어나 있으면 섹션 헤더로 살짝 스크롤 복귀
  const hd = document.getElementById('insightGrid2');
  if(hd) {
    const rect = hd.getBoundingClientRect();
    if(rect.top < 0) hd.scrollIntoView({behavior:'smooth', block:'start'});
  }
}

function renderInsightWidget() {
  if(!insightArticles.length) return; // 아직 로딩중이거나 글이 없으면 기존 상태 유지
  const ko = currentLang === 'ko';
  const suffix = blogSuffix(currentLang);
  // 사이드바(좌측): 최신 5개 먼저 노출 / 상단 위젯: 그다음 글들 전부를 "더보기 풀"로 확보 — 서로 겹치지 않게
  renderSidebarBlogList(insightArticles.slice(0, 5), ko, suffix);
  insightGridPool = insightArticles.slice(5);
  insightGridVisible = INSIGHT_PAGE_SIZE;
  renderInsightCards('insightGrid2', insightGridPool.slice(0, insightGridVisible), ko, suffix);
  updateInsightMoreButton();
  const allLink = document.getElementById('insightAllLink');
  if(allLink) allLink.href = '/blog/' + suffix;
  const allLink2 = document.getElementById('insightAllLink2');
  if(allLink2) allLink2.href = '/blog/' + suffix;
  const sbAllLink = document.getElementById('sbBlogAllLink');
  if(sbAllLink) sbAllLink.href = '/blog/' + suffix;
}

/** 사이드바 좌측 블로그 리스트 — 카테고리·제목·발행시각까지 표시 (우측 카드 수준 가독성) */
function renderSidebarBlogList(articles, ko, suffix) {
  const list = document.getElementById('sbBlogList');
  if(!list || !articles.length) return;
  list.innerHTML = articles.map(a => {
    const title = pickLangField(a, 'title', currentLang);
    const cat = pickLangField(a, 'category', currentLang);
    return `<a href="${a.url}${suffix}" class="sb-blog-item" style="--sb-accent:${a.color}">
      <span class="sb-blog-icon">${a.icon}</span>
      <span class="sb-blog-main">
        <span class="sb-blog-cat">${cat}</span>
        <span class="sb-blog-title">${title}</span>
        <span class="sb-blog-date">${formatBlogCardDate(a.date, currentLang)}</span>
      </span>
    </a>`;
  }).join('');
}

let categoryFooterArticles = [];

/** footer의 "카테고리별 최신 글" 링크 — 카테고리 4개를 각각 명시적으로 fetch해서 최신글 1개씩 가져옴.
 *  (이전엔 "최신 20개"만 가져와서 카테고리별로 걸러냈는데, 그 20개 안에 하필 특정 카테고리가
 *   하나도 없으면 그 카테고리 전체가 통째로 안 보이는 문제가 있었음 — 예: 시황분석/코인뉴스 누락)
 *  카테고리 목록 자체는 CATEGORY_LIST(서버에서 내려줌)를 써서, 새 카테고리 추가시 이 코드는 안 건드려도 됨. */
function loadCategoryLinks() {
  Promise.all(CATEGORY_LIST.map(cat =>
    fetch(`/blog/feed.php?category=${cat}&limit=1`).then(r => r.json()).catch(() => null)
  )).then(results => {
    categoryFooterArticles = results
      .map(data => (data && data.articles && data.articles[0]) || null)
      .filter(Boolean);
    renderCategoryLinks();
  }).catch(() => {
    const label = document.getElementById('blogGuideLabel');
    if(label) label.style.display = 'none'; // 실패 시 조용히 숨김
  });
}

function renderCategoryLinks() {
  const el = document.getElementById('blogCategoryLinks');
  if(!el || !categoryFooterArticles.length) return;
  const suffix = blogSuffix(currentLang);
  const label = document.getElementById('blogGuideLabel');
  if(label) label.textContent = TT({ko:'📖 카테고리별 최신 글:',en:'📖 Latest by Category:',ja:'📖 カテゴリー別最新記事:',es:'📖 Últimas por Categoría:',de:'📖 Neueste nach Kategorie:'});
  el.innerHTML = categoryFooterArticles.map(a => {
    const cat = pickLangField(a, 'category', currentLang);
    const title = pickLangField(a, 'title', currentLang);
    return `<a href="${a.url}${suffix}" title="[${cat}] ${title.replace(/"/g,'&quot;')}" style="color:var(--t2);text-decoration:none;margin-right:14px;font-size:12px;
      display:inline-block;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
      vertical-align:bottom;border-bottom:1px solid var(--b1)"><b style="color:var(--t3);font-weight:600">[${cat}]</b> ${title}</a>`;
  }).join('');
  // "전체 블로그 보기"는 오른쪽 끝 고정 요소로 분리 (한 줄 유지, 스크롤 밖)
  const allLink = document.getElementById('blogCategoryAllLink');
  if(allLink) {
    allLink.href = '/blog/' + suffix;
    allLink.textContent = TT({ko:'전체 블로그 보기 →',en:'All Posts →',ja:'全ての記事を見る →',es:'Ver Todas las Publicaciones →',de:'Alle Beiträge ansehen →'});
  }
}

function applyStaticI18n() {
  const ko = currentLang === 'ko';
  const allLbl = TT({ko:'전체',en:'All',ja:'全期間',es:'Todo',de:'Alle'});
  const tabMap = {'1m':ko?'1h':'1h','5m':ko?'6h':'5m','15m':ko?'1d':'15m',
    '30m':ko?'3d':'30m','1h':ko?'7d':'1h','4h':ko?'14d':'4h',
    '1d':ko?'30d':'1d','1w':ko?'90d':'1w','1M':ko?allLbl:'1M'};
  Object.entries(tabMap).forEach(([id,lbl])=>{
    const el=document.getElementById('ht'+id); if(el) el.textContent=lbl;
  });

  // 페이지 안의 모든 [data-i] 요소를 빠짐없이 일괄 번역.
  // (이전엔 차트 탭 라벨만 여기서 갱신되고, 알림창/섹션 헤더 등은
  //  setMode() 안에서만 일부 키가 갱신되거나 아예 갱신되지 않아서
  //  언어를 바꿔도 일부 텍스트가 기존 언어로 남아있는 문제가 있었음)
  document.querySelectorAll('[data-i]').forEach(el => {
    const key = el.getAttribute('data-i');
    const translated = T(key);
    if (!translated || translated === key) return; // 번역 사전에 없는 키는 건드리지 않음
    if (key === 'sec_inst') {
      // 이 요소엔 "LEADING" 뱃지(<span class="sec-tag">)가 같이 들어있어서
      // textContent로 덮어쓰면 뱃지가 같이 사라짐 → 텍스트만 교체하고 뱃지는 보존
      const badge = el.querySelector('.sec-tag');
      el.textContent = translated + ' ';
      if (badge) el.appendChild(badge);
    } else {
      el.textContent = translated;
    }
  });
  // 온보딩 안내가 표시 중이면 현재 언어·모드에 맞게 문구 갱신
  const _tip = document.getElementById('onboardTip');
  if(_tip && _tip.style.display !== 'none' && typeof renderOnboardText === 'function') renderOnboardText();
  // 거래소 배너 링크도 현재 언어를 따라가게 (한국어는 접미사 없음)
  const _bn = document.getElementById('exchBanner');
  if(_bn){ _bn.setAttribute('href', '/exchanges.php' + (currentLang && currentLang!=='ko' ? ('?lang='+currentLang) : '')); }

  // 라이브 채팅 UI 문구도 현재 언어로 갱신 (data-i가 없어 일괄 번역에서 빠지므로 별도 함수로)
  if(typeof syncChatLang === 'function') syncChatLang();
}

// 라이브 채팅 UI 문구를 현재 언어로 갱신 (applyStaticI18n + 채팅 열 때 공용)
function syncChatLang() {
  const _chatTitle = document.getElementById('chatTitle');
  if(_chatTitle) _chatTitle.textContent = TT({ko:'실시간 채팅',en:'LIVE CHAT',ja:'ライブチャット',es:'CHAT EN VIVO',de:'LIVE-CHAT'});
  const _chatInput = document.getElementById('chatInput');
  if(_chatInput) _chatInput.setAttribute('placeholder', TT({ko:'메시지 입력...',en:'Type a message...',ja:'メッセージを入力...',es:'Escribe un mensaje...',de:'Nachricht eingeben...'}));
  const _chatSend = document.getElementById('chatSendBtn');
  if(_chatSend) _chatSend.textContent = TT({ko:'전송',en:'Send',ja:'送信',es:'Enviar',de:'Senden'});
  const _chatNick = document.getElementById('chatNickBtn');
  if(_chatNick) _chatNick.setAttribute('title', TT({ko:'닉네임 변경',en:'Change nickname',ja:'ニックネーム変更',es:'Cambiar apodo',de:'Spitznamen ändern'}));
}
// ═══════════════════════════════════════════════════════
// LIVE CHAT (Firebase Realtime Database)
// ═══════════════════════════════════════════════════════
let chatUnsub = null;
let chatNickname = (function(){
  try {
    const saved = localStorage.getItem('chatNickname');
    if(saved) return saved;
  } catch(e){}
  const generated = 'Trader' + Math.floor(Math.random()*9999);
  try { localStorage.setItem('chatNickname', generated); } catch(e){}
  return generated;
})();

// ── 지역 감지 + 자동 번역 ──
// IP 기반으로 대략적인 국가 코드를 알아내서(ipapi.co, 무료·키 불필요),
// 채팅 닉네임 앞에 국기로 표시하고, 내 지역과 다른 메시지는 자동 번역해서 보여줌.
let myRegion = null; // 예: 'KR', 'JP', 'US' ...

const REGION_LANG = { // 지역 코드 → 번역 대상 언어 코드 (없으면 en으로 대체)
  KR:'ko', JP:'ja', CN:'zh', TW:'zh', HK:'zh', VN:'vi', TH:'th', ID:'id',
  US:'en', GB:'en', CA:'en', AU:'en', IN:'en', SG:'en', PH:'en',
  BR:'pt', PT:'pt', ES:'es', MX:'es', AR:'es', CL:'es', CO:'es',
  DE:'de', FR:'fr', IT:'it', RU:'ru', TR:'tr', NL:'nl', PL:'pl'
};
function regionToLang(cc) { return REGION_LANG[cc] || 'en'; }

/** 2글자 국가코드를 국기 이모지로 변환 (별도 이미지/폰트 불필요, 유니코드 계산) */
function regionFlag(cc) {
  if(!cc || cc.length !== 2) return '🌐';
  return cc.toUpperCase().replace(/./g, c => String.fromCodePoint(127397 + c.charCodeAt(0)));
}

/** 내 지역 코드를 가져옴 (세션당 1회만 조회, localStorage에 24시간 캐싱) */
function detectMyRegion() {
  return new Promise((resolve) => {
    try {
      const cached = JSON.parse(localStorage.getItem('myRegionCache') || 'null');
      if(cached && cached.exp > Date.now()) { myRegion = cached.cc; resolve(myRegion); return; }
    } catch(e){}
    fetch('https://ipapi.co/json/')
      .then(r => r.json())
      .then(d => {
        myRegion = (d && d.country_code) ? d.country_code : fallbackRegionFromLocale();
        try { localStorage.setItem('myRegionCache', JSON.stringify({cc: myRegion, exp: Date.now() + 86400000})); } catch(e){}
        resolve(myRegion);
      })
      .catch(() => { myRegion = fallbackRegionFromLocale(); resolve(myRegion); });
  });
}
/** IP 조회 실패 시 브라우저 언어 설정으로 대략 추정 (완전 실패는 방지) */
function fallbackRegionFromLocale() {
  try {
    const loc = navigator.language || 'en-US';
    const parts = loc.split('-');
    return parts[1] ? parts[1].toUpperCase() : (parts[0] === 'ko' ? 'KR' : parts[0] === 'ja' ? 'JP' : 'US');
  } catch(e){ return 'US'; }
}

const translationCache = {}; // { messageKey: translatedText } — 같은 메시지 반복 번역 방지
/** MyMemory 무료 번역 API 사용 (키 불필요, 소규모 트래픽에 적합) */
function translateText(text, targetLang, sourceLang) {
  const cacheKey = sourceLang + '|' + targetLang + '|' + text;
  if(translationCache[cacheKey]) return Promise.resolve(translationCache[cacheKey]);
  const url = `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=${sourceLang}|${targetLang}`;
  return fetch(url)
    .then(r => r.json())
    .then(d => {
      const translated = (d && d.responseData && d.responseData.translatedText) ? d.responseData.translatedText : null;
      if(translated) translationCache[cacheKey] = translated;
      return translated;
    })
    .catch(() => null);
}

let chatUnreadCount = 0;
let chatOpen = false;
let chatInitialized = false;

function initFirebaseChat() {
  if(chatDB && chatListenersAttached) return; // 이미 완전히 연결됨
  try {
    if(typeof firebase === 'undefined') {
      console.error('[chat] Firebase SDK not loaded yet');
      showChatError('Firebase SDK not loaded. Retrying...');
      chatListenersAttached = false;
      // SDK가 늦게 로드될 수 있으니 1초 후 재시도
      setTimeout(initFirebaseChat, 1000);
      return;
    }
    const firebaseConfig = {
      apiKey: "AIzaSyAdmKYQ3w02e9gbvcRUEM7Q_jcgBKtkgDw",
      authDomain: "btctiming-chat.firebaseapp.com",
      databaseURL: "https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "btctiming-chat",
      storageBucket: "btctiming-chat.firebasestorage.app",
      messagingSenderId: "1037450881238",
      appId: "1:1037450881238:web:d21d0deff6e9aef1bf4177",
      measurementId: "G-VD01B9SL3K"
    };
    if(!firebase.apps || !firebase.apps.length) {
      firebase.initializeApp(firebaseConfig);
    }
    if(!chatDB) chatDB = firebase.database();
    if(!myRegion) {
      detectMyRegion().then(() => {
        if(lastChatData) renderChatMessages(lastChatData); // 감지 완료 후 이미 그려진 메시지에 번역 적용
      });
    }
    listenChatMessages();
    trackPresence();
    chatListenersAttached = true;
  } catch(e) {
    console.error('[chat] init failed:', e.message, e);
    showChatError(e.message);
    chatListenersAttached = false;
  }
}

function showChatSetupNeeded() {
  const msgsEl = document.getElementById('chatMessages');
  if(msgsEl) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t2);font-size:11px;padding:20px;line-height:1.7">
      ${TT({ko:'⚙️ 채팅 기능을 사용하려면 Firebase 설정이 필요합니다.<br><br>코드 상단 주석을 참고해 무료 Firebase 프로젝트를 생성하고<br>firebaseConfig 값을 입력해주세요.<br><br>(5분이면 완료됩니다)',en:'⚙️ Chat requires Firebase setup.<br><br>See code comments to create a free Firebase project<br>and fill in firebaseConfig.<br><br>(Takes about 5 minutes)',ja:'⚙️ チャット機能を使用するにはFirebaseの設定が必要です。<br><br>コード上部のコメントを参考に無料のFirebaseプロジェクトを作成し<br>firebaseConfigの値を入力してください。<br><br>(5分ほどで完了します)',es:'⚙️ El chat requiere configuración de Firebase.<br><br>Consulta los comentarios del código para crear un proyecto Firebase gratuito<br>y completar firebaseConfig.<br><br>(Toma unos 5 minutos)',de:'⚙️ Der Chat erfordert eine Firebase-Einrichtung.<br><br>Siehe Codekommentare, um ein kostenloses Firebase-Projekt zu erstellen<br>und firebaseConfig auszufüllen.<br><br>(Dauert etwa 5 Minuten)'})}
    </div>`;
  }
}

function showChatError(detail) {
  const msgsEl = document.getElementById('chatMessages');
  if(msgsEl) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t3);font-size:11px;padding:20px;line-height:1.6">
      ${TT({ko:'채팅 서버 연결 실패.',en:'Chat server connection failed.',ja:'チャットサーバーへの接続に失敗しました。',es:'Falló la conexión al servidor de chat.',de:'Verbindung zum Chat-Server fehlgeschlagen.'})}<br>
      ${detail ? `<span style="color:var(--red);font-size:10px">${escapeHtml(detail)}</span>` : ''}
    </div>`;
  }
}

let lastChatData = null; // 최신 메시지 스냅샷 (지역 감지 완료 후 재렌더링용)

function listenChatMessages() {
  if(!chatDB) { console.error('[chat] listenChatMessages: chatDB is null!'); return; }
  const msgsRef = chatDB.ref('messages').limitToLast(50);
  msgsRef.on('value', (snapshot) => {
    lastChatData = snapshot.val();
    renderChatMessages(lastChatData);
  }, (error) => {
    console.error('[chat] listenChatMessages ERROR:', error.message, error);
    showChatError('Listen failed: ' + error.message);
  });
}

function renderChatMessages(data) {
  const msgsEl = document.getElementById('chatMessages');
  if(!msgsEl) { console.error('[chat] chatMessages element not found!'); return; }
  if(!data) {
    msgsEl.innerHTML = `<div style="text-align:center;color:var(--t3);font-size:11px;padding:20px">${TT({ko:'첫 메시지를 남겨보세요!',en:'Be the first to chat!',ja:'最初のメッセージを送ってみましょう!',es:'¡Sé el primero en chatear!',de:'Sei der Erste im Chat!'})}</div>`;
    return;
  }
  const entries = Object.entries(data).sort((a,b)=>a[1].t-b[1].t);
  const wasAtBottom = msgsEl.scrollTop + msgsEl.clientHeight >= msgsEl.scrollHeight - 30;
  msgsEl.innerHTML = entries.map(([key, m]) => {
    const isMe = m.nick === chatNickname;
    const time = new Date(m.t).toLocaleTimeString(SUPPORTED_LANG_CODES.includes(currentLang)?currentLang:'en',{hour:'2-digit',minute:'2-digit'});
    const flag = m.region ? regionFlag(m.region) : '';
    // 내 지역과 다르고, 언어까지 다를 때만 번역 필요 (예: US-GB는 지역은 달라도 둘 다 영어라 번역 불필요)
    const needsTranslation = myRegion && m.region && m.region !== myRegion && regionToLang(m.region) !== regionToLang(myRegion);
    return `<div style="display:flex;flex-direction:column;align-items:${isMe?'flex-end':'flex-start'}">
      <div style="font-size:10px;color:var(--t3);margin-bottom:2px">${flag} ${escapeHtml(m.nick)} · ${time}</div>
      <div style="background:${isMe?'var(--orange)':'var(--bg4)'};color:${isMe?'#000':'var(--t1)'};
        padding:7px 11px;border-radius:12px;font-size:12px;max-width:85%;word-break:break-word;line-height:1.4">
        ${escapeHtml(m.text)}
      </div>
      ${needsTranslation ? `<div id="tr-${key}" class="chat-tr" style="font-size:11px;color:var(--t3);margin-top:2px;font-style:italic;max-width:85%">🌐 …</div>` : ''}
    </div>`;
  }).join('');
  if(wasAtBottom || !chatOpen) {
    msgsEl.scrollTop = msgsEl.scrollHeight;
  }
  // 안읽은 메시지 카운트
  if(!chatOpen) {
    chatUnreadCount++;
    updateChatBadge();
  }
  // 지역이 다른 메시지들을 백그라운드에서 순차 번역 (MyMemory 무료 API, 과도한 동시요청 방지 위해 순서대로)
  if(myRegion) {
    const toTranslate = entries.filter(([key, m]) =>
      m.region && m.region !== myRegion && regionToLang(m.region) !== regionToLang(myRegion));
    let chain = Promise.resolve();
    toTranslate.forEach(([key, m]) => {
      chain = chain.then(() =>
        translateText(m.text, regionToLang(myRegion), regionToLang(m.region)).then(translated => {
          const el = document.getElementById('tr-' + key);
          if(el) el.textContent = translated ? `🌐 ${translated}` : '';
        })
      );
    });
  }
}

function trackPresence() {
  if(!chatDB) return;
  const presenceRef = chatDB.ref('presence/' + chatNickname);
  presenceRef.set({online: true, t: Date.now()}).then(()=>{
  }).catch(e=>console.error('[chat] presence set failed:', e.message));
  presenceRef.onDisconnect().remove();
  chatDB.ref('presence').on('value', (snap) => {
    const data = snap.val();
    const count = data ? Object.keys(data).length : 0;
    const cEl = document.getElementById('chatUserCount');
    if(cEl) cEl.textContent = '· ' + TT({ko:`${count}명 접속중`, en:`${count} online`, ja:`${count}人 接続中`, es:`${count} en línea`, de:`${count} online`});
  }, (error) => {
    console.error('[chat] presence listener ERROR:', error.message);
  });
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

function sendChatMsg() {
  const input = document.getElementById('chatInput');
  if(!input) return;
  const text = input.value.trim();
  if(!text) return;
  if(!chatDB) {
    console.error('[chat] sendChatMsg: chatDB not initialized, attempting init + retry...');
    initFirebaseChat();
    // 1.2초 후 자동 재시도 (사용자가 다시 누를 필요 없게)
    setTimeout(() => {
      if(chatDB && input.value.trim() === text) {
        sendChatMsg();
      } else if(!chatDB) {
        alert(TT({ko:'채팅 연결 실패. 새로고침 후 다시 시도해주세요.',en:'Chat connection failed. Please refresh and try again.',ja:'チャット接続に失敗しました。更新して再度お試しください。',es:'Conexión de chat fallida. Actualiza e inténtalo de nuevo.',de:'Chat-Verbindung fehlgeschlagen. Bitte aktualisieren und erneut versuchen.'}));
      }
    }, 1200);
    return;
  }
  chatDB.ref('messages').push({
    nick: chatNickname,
    text: text,
    t: Date.now(),
    region: myRegion || 'US'
  }).then(() => {
    pruneOldMessages();
  }).catch((err) => {
    console.error('Send failed:', err);
    alert(TT({ko:'전송 실패: ',en:'Send failed: ',ja:'送信失敗: ',es:'Error al enviar: ',de:'Senden fehlgeschlagen: '}) + err.message);
  });
  input.value = '';
}

// 메시지 100개 초과 시 가장 오래된 것부터 삭제 (DB 용량 관리)
const CHAT_MAX_MESSAGES = 100;
function pruneOldMessages() {
  if(!chatDB) return;
  chatDB.ref('messages').orderByChild('t').once('value', (snap) => {
    const data = snap.val();
    if(!data) return;
    const entries = Object.entries(data).sort((a,b) => a[1].t - b[1].t);
    if(entries.length > CHAT_MAX_MESSAGES) {
      const toDelete = entries.slice(0, entries.length - CHAT_MAX_MESSAGES);
      toDelete.forEach(([key]) => {
        chatDB.ref('messages/' + key).remove();
      });
    }
  });
}

function toggleChat() {
  const box = document.getElementById('chatBox');
  if(!box) return;
  chatOpen = box.style.display === 'none' || box.style.display === '';
  box.style.display = chatOpen ? 'flex' : 'none';
  if(chatOpen) {
    if(typeof syncChatLang === 'function') syncChatLang(); // 열 때 현재 언어로 채팅 UI 맞춤
    if(!chatListenersAttached) initFirebaseChat(); // 리스너 미부착이면 무조건 (재)시도
    chatUnreadCount = 0;
    updateChatBadge();
    setTimeout(()=>{
      const input = document.getElementById('chatInput');
      if(input) input.focus();
      const msgsEl = document.getElementById('chatMessages');
      if(msgsEl) msgsEl.scrollTop = msgsEl.scrollHeight;
    }, 50);
  }
}

function updateChatBadge() {
  const badge = document.getElementById('chatBadge');
  if(!badge) return;
  if(chatUnreadCount > 0) {
    badge.style.display = 'flex';
    badge.textContent = chatUnreadCount > 9 ? '9+' : chatUnreadCount;
  } else {
    badge.style.display = 'none';
  }
}

// 닉네임 최초 설정 (선택적)
function promptNickname() {
  const newNick = prompt(TT({ko:'채팅 닉네임을 입력하세요:',en:'Enter your chat nickname:',ja:'チャットニックネームを入力してください:',es:'Ingresa tu apodo de chat:',de:'Gib deinen Chat-Spitznamen ein:'}), chatNickname);
  if(newNick && newNick.trim()) {
    const oldNick = chatNickname;
    chatNickname = newNick.trim().slice(0, 20);
    localStorage.setItem('chatNickname', chatNickname);
    // presence 갱신
    if(chatDB) {
      chatDB.ref('presence/' + oldNick).remove();
      chatDB.ref('presence/' + chatNickname).set({online: true, t: Date.now()});
      chatDB.ref('presence/' + chatNickname).onDisconnect().remove();
    }
  }
}

// 페이지 로드 시 채팅 위젯 lazy init (처음 열 때만 Firebase 연결)
