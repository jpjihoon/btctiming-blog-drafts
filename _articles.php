<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 아티클 목록 헬퍼
// index.php(목록 페이지)와 feed.php(홈페이지용 JSON 피드)가 함께 사용합니다.
//
// _meta.php를 유일한 정답 소스로 사용합니다 (더 이상 HTML 파일을
// 스캔/파싱하지 않습니다 — .php로 전환하면서 정적 파일에서 메타데이터를
// 정규식으로 뽑아내던 예전 방식은 폐기했습니다).
// ═══════════════════════════════════════════════════════

/**
 * _meta.php의 모든 아티클을 최신순으로 반환
 * @param string $blogDir 호환성을 위해 남겨둔 매개변수 (더 이상 사용 안 함)
 */
function collectArticles(string $blogDir = __DIR__): array {
    $meta = require __DIR__ . '/_meta.php';
    $articles = [];
    foreach ($meta as $slug => $m) {
        $m['file'] = $slug . '.php';
        $m['category'] = $m['category'] ?? 'guide';
        $articles[] = $m;
    }

    usort($articles, function($a, $b) {
        return strcmp($b['date'] ?? '', $a['date'] ?? ''); // 최신 날짜 우선
    });

    return $articles;
}

/** HTML 이스케이프 헬퍼 */
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
/** 날짜 2026-07-01 (또는 2026-07-01 14:30:00) → 2026.07.01 표시용 변환.
 *  시간 컴포넌트가 붙어 있어도(정밀 정렬용) 화면엔 날짜만 노출합니다. */
function displayDate(string $iso): string {
    $datePart = explode(' ', trim($iso))[0];
    $parts = explode('-', $datePart);
    return count($parts) === 3 ? "{$parts[0]}.{$parts[1]}.{$parts[2]}" : $iso;
}

/** 카테고리 메타 (이름/색상) — 새 카테고리 추가 시 _category_meta.php만 수정하면 됨.
 *  _header.php와 공유하기 위해 별도 파일로 분리 (define으로 로드해 기존 CATEGORY_META 참조 코드는 그대로 유지). */
if (!defined('CATEGORY_META')) {
    define('CATEGORY_META', require __DIR__ . '/_category_meta.php');
}
