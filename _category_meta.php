<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 카테고리 메타데이터 (유일한 정답 소스)
// _articles.php(목록/피드)와 _header.php(개별 아티클) 둘 다 이 파일을 씁니다.
// 새 카테고리를 추가하려면 여기 한 줄만 추가하면 됩니다.
//
// 배열 순서 = 블로그 목록의 카테고리 탭 순서.
//   · 계속 쌓이는 콘텐츠(주간리포트/시황분석/코인뉴스/칼럼)를 앞에,
//   · 고정된 참고용 지표 사전 성격의 '가이드'는 맨 뒤에 배치.
// ═══════════════════════════════════════════════════════

return [
    'patch'    => ['ko' => '패치노트',   'en' => 'Patch Notes',   'ja' => 'パッチノート',   'es' => 'Notas de Parche',    'de' => 'Patch Notes', 'fr' => 'Notes de version', 'pt' => 'Notas de versão', 'tr' => 'Sürüm Notları', 'vi' => 'Ghi chú bản vá',     'color' => '#f97316'],
    'weekly'   => ['ko' => '주간리포트', 'en' => 'Weekly Report', 'ja' => '週間レポート',   'es' => 'Informe Semanal',     'de' => 'Wochenbericht', 'fr' => 'Rapport hebdomadaire', 'pt' => 'Relatório semanal', 'tr' => 'Haftalık Rapor', 'vi' => 'Báo cáo hàng tuần',   'color' => '#22c55e'],
    'news'     => ['ko' => '시황분석',   'en' => 'Market Watch',  'ja' => '市況分析',       'es' => 'Análisis de Mercado', 'de' => 'Marktanalyse', 'fr' => 'Analyse de marché', 'pt' => 'Análise de mercado', 'tr' => 'Piyasa Analizi', 'vi' => 'Phân tích thị trường',    'color' => '#38bdf8'],
    'coinnews' => ['ko' => '코인뉴스',   'en' => 'Coin News',     'ja' => 'コインニュース', 'es' => 'Noticias Cripto',     'de' => 'Krypto-News', 'fr' => 'Actus crypto', 'pt' => 'Notícias cripto', 'tr' => 'Kripto Haberleri', 'vi' => 'Tin tức coin',     'color' => '#06b6d4'],
    'column'   => ['ko' => '칼럼',       'en' => 'Column',        'ja' => 'コラム',         'es' => 'Columna',             'de' => 'Kolumne', 'fr' => 'Chronique', 'pt' => 'Coluna', 'tr' => 'Köşe Yazısı', 'vi' => 'Chuyên mục',         'color' => '#a78bfa'],
    'guide'    => ['ko' => '가이드',     'en' => 'Guides',        'ja' => 'ガイド',         'es' => 'Guías',               'de' => 'Anleitungen', 'fr' => 'Guides', 'pt' => 'Guias', 'tr' => 'Kılavuzlar', 'vi' => 'Hướng dẫn',     'color' => '#f7931a'],
];
