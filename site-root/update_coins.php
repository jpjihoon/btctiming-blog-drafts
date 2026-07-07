<?php
// ─────────────────────────────────────────────────────────────
// update_coins.php — 코인 목록 자동 갱신 (매일 크론 실행)
//
// 바이낸스 24h 거래량 상위 USDT 페어를 받아서,
// 스테이블코인·레버리지 토큰을 제외하고 상위 N개를 선정,
// coins-auto.json 으로 저장한다.
//
// 규칙:
//  - 기본 8개(BTC/ETH/BNB/SOL/XRP/DOGE/ADA/TRX)는 순위와 무관하게 항상 포함
//  - 스테이블코인·레버리지/특수토큰 제외
//  - 나머지는 거래대금(quoteVolume) 순으로 채워 총 TARGET_COUNT개
//  - 각 코인에 표시 메타(이름·색) 부여 (마스터에 없으면 자동 생성)
//
// 크론 예: 매일 1회  →  https://btctiming.com/update_coins.php?token=XXXX
// ─────────────────────────────────────────────────────────────

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/coin_meta.php';

header('Content-Type: application/json; charset=utf-8');

// PHP 8.0 미만 서버 호환 (Cafe24 버전이 낮을 수 있음)
if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool {
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }
}

// 간단한 토큰 보호 (무단 실행 방지). config의 SNAPSHOT_TOKEN 재사용.
$token = $_GET['token'] ?? '';
if (!defined('SNAPSHOT_TOKEN') || $token !== SNAPSHOT_TOKEN) {
    http_response_code(403);
    echo json_encode(['error' => 'forbidden']);
    exit;
}

const TARGET_COUNT   = 50;
const DEFAULT_ALWAYS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX']; // 항상 포함

// ── 1) 바이낸스 24h 티커 받기 ──
function uc_http_get(string $url, int $timeout = 15): ?string {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => $timeout,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => 'btctiming-coinupdater/1.0',
    ]);
    $r = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($r !== false && $code === 200) ? $r : null;
}

$raw = uc_http_get('https://api.binance.com/api/v3/ticker/24hr');
if ($raw === null) {
    // 폴백 도메인 시도
    $raw = uc_http_get('https://data-api.binance.vision/api/v3/ticker/24hr');
}
if ($raw === null) {
    http_response_code(502);
    echo json_encode(['error' => 'binance_unreachable']);
    exit;
}

$tickers = json_decode($raw, true);
if (!is_array($tickers)) {
    http_response_code(502);
    echo json_encode(['error' => 'bad_response']);
    exit;
}

// ── 2) USDT 페어만 + 필터링 ──
function is_excluded(string $base): bool {
    if (in_array($base, STABLECOINS, true)) return true;
    foreach (EXCLUDE_KEYWORDS as $kw) {
        // 레버리지 토큰: BASE 끝에 UP/DOWN/BULL/BEAR/3L/3S 등
        if (str_ends_with($base, $kw) && strlen($base) > strlen($kw)) return true;
    }
    return false;
}

$candidates = []; // base => quoteVolume
foreach ($tickers as $t) {
    $sym = $t['symbol'] ?? '';
    if (!str_ends_with($sym, 'USDT')) continue;
    $base = substr($sym, 0, -4); // 'BTCUSDT' → 'BTC'
    if ($base === '') continue;
    if (is_excluded($base)) continue;
    $qv = (float)($t['quoteVolume'] ?? 0); // 거래대금(USDT)
    if ($qv <= 0) continue;
    $candidates[$base] = $qv;
}

if (count($candidates) < 10) {
    http_response_code(502);
    echo json_encode(['error' => 'too_few_pairs', 'count' => count($candidates)]);
    exit;
}

// ── 3) 거래대금 순 정렬 ──
arsort($candidates);
$ranked = array_keys($candidates); // 거래대금 높은 순 base 목록

// ── 4) 기본 8개 항상 포함 + 상위로 채워 TARGET_COUNT개 ──
$selected = [];
// 기본 8개 먼저 (거래소에 존재하는 경우만)
foreach (DEFAULT_ALWAYS as $b) {
    if (isset($candidates[$b])) $selected[] = $b;
}
// 상위 랭킹으로 채우기 (중복 제외)
foreach ($ranked as $b) {
    if (count($selected) >= TARGET_COUNT) break;
    if (!in_array($b, $selected, true)) $selected[] = $b;
}

// ── 5) 메타 부여 + JSON 구성 ──
$out = [];
foreach ($selected as $b) {
    $m = coinMeta($b);
    $out[] = [
        'id'    => $b,
        'sym'   => $b . 'USDT',
        'name'  => $m['name'],
        'color' => $m['color'],
    ];
}

$payload = [
    'updated'  => date('c'),
    'count'    => count($out),
    'coins'    => $out,
];

$json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$path = __DIR__ . '/coins-auto.json';
$ok = @file_put_contents($path, $json);

if ($ok === false) {
    http_response_code(500);
    echo json_encode(['error' => 'write_failed', 'path' => $path]);
    exit;
}

echo json_encode([
    'ok'      => true,
    'count'   => count($out),
    'updated' => $payload['updated'],
    'sample'  => array_slice(array_column($out, 'id'), 0, 12),
], JSON_UNESCAPED_UNICODE);
