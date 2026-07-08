<?php
// BTCtiming 용어사전 데이터 로더 (v3)
// 실제 콘텐츠는 glossary_data.json에 있고(9개 언어 × 16지표 + 게이지 + 개념도),
// 이 파일은 그걸 읽어 배열로 반환한다. json_decode가 PHP 파싱보다 빠르고 관리가 쉽다.
$__gjson = __DIR__ . '/glossary_data.json';
if (!is_file($__gjson)) return [];
$__graw = file_get_contents($__gjson);
$__gdata = json_decode($__graw, true);
return is_array($__gdata) ? $__gdata : [];
