<?php
// 서버 이미지 생성 능력 진단 (OG 이미지 자동생성 가능 여부 확인용)
header('Content-Type: application/json; charset=utf-8');

$result = [
    'php_version' => PHP_VERSION,
    'gd'          => extension_loaded('gd'),
    'imagick'     => extension_loaded('imagick'),
    'freetype'    => false,
    'gd_info'     => null,
    'ttf_write'   => false,
    'writable'    => [],
];

if (extension_loaded('gd')) {
    $info = gd_info();
    $result['gd_info'] = [
        'version'    => $info['GD Version'] ?? '?',
        'freetype'   => $info['FreeType Support'] ?? false,
        'png'        => $info['PNG Support'] ?? false,
        'jpeg'       => $info['JPEG Support'] ?? false,
    ];
    $result['freetype'] = $info['FreeType Support'] ?? false;
    // 실제로 TTF 텍스트를 그릴 수 있는지 테스트
    if (function_exists('imagettftext') && function_exists('imagecreatetruecolor')) {
        $result['ttf_write'] = true;
    }
}

// 쓰기 가능한 디렉토리 확인 (생성 이미지 캐시용)
foreach (['.', './og', __DIR__, __DIR__ . '/og'] as $d) {
    $result['writable'][$d] = is_writable($d);
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
