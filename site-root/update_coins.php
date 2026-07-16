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
    // 패턴 기반 스테이블 감지: USD/EUR로 끝나는 토큰 대부분이 스테이블 (RLUSD, XUSD 등).
    // 단 실제 코인 오탐 방지 화이트리스트(끝이 USD여도 스테이블 아닌 것).
    $notStable = ['PAXG']; // 금 등 예외 (필요시 추가)
    if (!in_array($base, $notStable, true)) {
        if (preg_match('/(USD|EUR)$/', $base) && strlen($base) >= 4) return true;
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

// ═══════════════════════════════════════════════════════════════
// ★ 2026-07-16: 표지 OG 용 코인 로고 캐시
//
//   og.php 가 글의 표지 SVG 안 <image href="/oglogo/ETH.png"> 를 읽어
//   Imagick 으로 합성한다. 그 PNG 를 여기서 미리 받아둔다.
//   (이 파일은 이미 매일 크론으로 도니 크론을 새로 만들 필요가 없다)
//
//   - CoinGecko markets 1회 호출로 symbol→image 매핑을 받는다
//   - 이미 있고 30일 안 지난 로고는 건너뛴다 (매일 50장씩 받지 않는다)
//   - 실패해도 update_coins 본래 기능(coins-auto.json)에는 영향 없다
// ═══════════════════════════════════════════════════════════════
$logoStat = ['dir' => false, 'skipped' => 0, 'downloaded' => 0, 'converted' => 0, 'failed' => 0, 'badfmt' => []];
$logoDir = __DIR__ . '/oglogo';
if (!is_dir($logoDir)) @mkdir($logoDir, 0755, true);
if (is_dir($logoDir) && is_writable($logoDir)) {
    $logoStat['dir'] = true;
    $need = [];
    foreach ($out as $c) {
        $id = strtoupper((string)($c['id'] ?? ''));
        if (!preg_match('/^[A-Z0-9_\-]{1,20}$/', $id)) continue;   // 경로 탈출 차단
        $f = $logoDir . '/' . $id . '.png';
        // ?relogo=1 을 붙이면 30일 캐시를 무시하고 전부 다시 받는다.
        // (로직을 고쳤을 때 옛날에 실패했던 것들을 재시도하기 위함)
        $force = isset($_GET['relogo']);
        if (!$force && is_file($f) && (time() - filemtime($f)) < 30 * 86400) { $logoStat['skipped']++; continue; }
        $need[$id] = true;
    }
    if ($need) {
        // ★ 2026-07-16: 1페이지(상위 250위)만 보면 27/50 밖에 못 잡았다(실측).
        //   우리 코인 목록은 '바이낸스 거래량' 기준이라 시총 상위와 다르다.
        //   실측: 상위250 → 32/50, 상위500 → 38/50, 상위750 → 40/50.
        //   3페이지까지 본다. 나머지 10개(OPN/TREE/ZBT/UTK/TOWNS/SKHYB/PORTO/SXT/TON/VANRY)는
        //   시총 750위 밖이라 못 찾는다 — 그런 코인으로 글을 쓸 일이 없으므로 로고 없이 간다.
        $map = [];
        for ($pg = 1; $pg <= 3; $pg++) {
            $ch = curl_init('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=' . $pg);
            curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 25,
                                    CURLOPT_USERAGENT => 'btctiming-og/1.0']);
            $mk = curl_exec($ch); curl_close($ch);
            $rows = $mk ? json_decode($mk, true) : null;
            if (!is_array($rows)) break;
            foreach ($rows as $r) {
                $sy = strtoupper((string)($r['symbol'] ?? ''));
                if ($sy !== '' && !isset($map[$sy]) && !empty($r['image'])) $map[$sy] = $r['image'];
            }
            if ($pg < 3) sleep(2);   // CoinGecko 무료 레이트리밋 배려
        }
        if ($map) {
            $logoStat['notfound'] = [];
            foreach (array_keys($need) as $id) {
                if (empty($map[$id])) { $logoStat['failed']++; $logoStat['notfound'][] = $id; continue; }
                $c2 = curl_init($map[$id]);
                curl_setopt_array($c2, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 20,
                                        CURLOPT_FOLLOWLOCATION => true, CURLOPT_USERAGENT => 'btctiming-og/1.0']);
                $img = curl_exec($c2); $code = curl_getinfo($c2, CURLINFO_HTTP_CODE); curl_close($c2);
                // ★ 2026-07-16: CoinGecko 는 일부 코인을 JPEG 로 준다(실측: NEAR .jpg, PEPE .jpeg).
                //   PNG 시그니처만 통과시켰더니 그것들이 전부 버려졌다(14 failed 중 8건).
                //   og.php 는 /oglogo/{티커}.png 를 기대하므로, PNG 가 아니면 Imagick 으로 변환해 저장한다.
                if (!$img || $code !== 200 || strlen($img) >= 2000000) { $logoStat['failed']++; continue; }
                $isPng  = substr($img, 0, 8) === "\x89PNG\r\n\x1a\n";
                $isJpg  = substr($img, 0, 3) === "\xff\xd8\xff";
                $isGif  = substr($img, 0, 4) === 'GIF8';
                $isWebp = substr($img, 0, 4) === 'RIFF' && substr($img, 8, 4) === 'WEBP';
                if ($isPng) {
                    @file_put_contents($logoDir . '/' . $id . '.png', $img);
                    $logoStat['downloaded']++;
                } elseif (($isJpg || $isGif || $isWebp) && extension_loaded('imagick')) {
                    try {
                        $cv = new Imagick();
                        $cv->readImageBlob($img);
                        $cv->setImageFormat('png');
                        @file_put_contents($logoDir . '/' . $id . '.png', $cv->getImageBlob());
                        $cv->clear();
                        $logoStat['converted']++;
                    } catch (Throwable $e) { $logoStat['failed']++; $logoStat['badfmt'][] = $id; }
                } else {
                    $logoStat['failed']++; $logoStat['badfmt'][] = $id;
                }
            }
        }
    }
}

echo json_encode([
    'ok'      => true,
    'logos'   => $logoStat,
    'count'   => count($out),
    'updated' => $payload['updated'],
    'sample'  => array_slice(array_column($out, 'id'), 0, 12),
], JSON_UNESCAPED_UNICODE);
