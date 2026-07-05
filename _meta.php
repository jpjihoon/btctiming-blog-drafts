<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 블로그 아티클 메타데이터 (자동 로더)
//
// ⚠️ 이 파일은 더 이상 직접 수정하지 않습니다.
// 실제 메타데이터는 meta/{slug}.json 파일 하나하나에 들어있고,
// 이 파일은 그 폴더를 스캔해서 자동으로 합쳐주는 역할만 합니다.
//
// 새 글 추가 방법:
//   1) meta/{slug}.json 파일을 새로 하나 만든다
//   2) blog/{slug}.php 파일을 생성한다 (본문만 작성)
// 기존 파일은 절대 건드리지 않기 때문에, 여러 글이 동시에
// 추가돼도 git 병합 충돌이 생기지 않습니다.
// ═══════════════════════════════════════════════════════

$__metaDir = __DIR__ . '/meta';
$__articles = [];

foreach (glob($__metaDir . '/*.json') as $__file) {
    $__slug = basename($__file, '.json');
    $__decoded = json_decode(file_get_contents($__file), true);
    if (is_array($__decoded)) {
        $__articles[$__slug] = $__decoded;
    }
}

return $__articles;
