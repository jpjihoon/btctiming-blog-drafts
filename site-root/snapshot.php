<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 점수 히스토리 스냅샷 엔드포인트
// GET /snapshot.php?key=<SNAPSHOT_TOKEN>
//
// 8개 코인 × (매수long/매도short) 점수를 계산해 Firebase의
// scoreHistory/{coin}_{long|short} 에 {t,s} 형식으로 저장한다.
//
// GitHub Actions 크론과 외부 크론(cron-job.org 등)이 "이 URL 하나만" 호출하면
// 히스토리에 점이 찍힌다. 한쪽 스케줄러가 스킵돼도 다른 쪽이 채워 구멍을 막는다.
//
// ※ 토큰(key)로 보호 — 아무나 호출해 데이터를 늘리지 못하게 한다.
// ※ api.php를 내부 HTTP로 재사용하므로 점수 계산 로직 중복이 없다.
// ═══════════════════════════════════════════════════════

require_once __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

// ── 인증: 토큰 확인 ─────────────────────────────────
// config.php 에 define('SNAPSHOT_TOKEN', '긴-랜덤-문자열'); 를 넣어두고
// 크론에서 ?key=그값 으로 호출한다. 토큰이 없거나 틀리면 거부.
if (!defined('SNAPSHOT_TOKEN') || SNAPSHOT_TOKEN === '') {
    http_response_code(500);
    echo json_encode(['error' => 'SNAPSHOT_TOKEN not configured']);
    exit;
}
$key = $_GET['key'] ?? '';
if (!hash_equals(SNAPSHOT_TOKEN, (string)$key)) {
    http_response_code(403);
    echo json_encode(['error' => 'forbidden']);
    exit;
}

// ── 설정 ────────────────────────────────────────────
$FB_BASE  = defined('FIREBASE_DB_URL') && FIREBASE_DB_URL
    ? rtrim(FIREBASE_DB_URL, '/')
    : 'https://btctiming-chat-default-rtdb.asia-southeast1.firebasedatabase.app';
// 자기 자신의 api.php 호출 (내부에서 localhost로 때려 외부 왕복 최소화; 실패 시 공개 도메인 폴백)
$API_LOCAL  = 'http://127.0.0.1/api.php';
$API_PUBLIC = 'https://btctiming.com/api.php';

$coins = array_keys(COIN_SYMBOLS);
$modes = [['buy', 'long'], ['sell', 'short']];
$nowMs = (int) round(microtime(true) * 1000);

$ok = 0; $fail = 0; $details = [];

function fetch_score(string $apiBase, string $coin, string $mode): ?float {
    $url = $apiBase . '?coin=' . urlencode($coin) . '&mode=' . urlencode($mode);
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 25,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER     => ['Host: btctiming.com'], // 로컬 호출 시 vhost 매칭
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($resp === false || $code !== 200) return null;
    $j = json_decode($resp, true);
    if (!is_array($j) || !isset($j['result']['final'])) return null;
    $s = $j['result']['final'];
    return is_numeric($s) ? (float) $s : null;
}

function fb_push(string $fbBase, string $coin, string $modekey, int $t, float $s): bool {
    $path = $fbBase . '/scoreHistory/' . $coin . '_' . $modekey . '.json';
    $body = json_encode(['t' => $t, 's' => round($s, 2)]);
    $ch = curl_init($path);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $body,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $resp !== false && $code >= 200 && $code < 300;
}

// api.php 응답(JSON)에서 점수 추출
function extract_score($resp, int $code): ?float {
    if ($resp === false || $code !== 200) return null;
    $j = json_decode($resp, true);
    if (!is_array($j) || !isset($j['result']['final'])) return null;
    $s = $j['result']['final'];
    return is_numeric($s) ? (float) $s : null;
}

// ── 병렬 점수 수집 (curl_multi) ──
// 50개 코인 × 2모드 = 100개를 순차로 돌면 타임아웃(30s) → 배치 병렬로 처리.
// 배치 크기만큼 동시에 던지고, 한 배치가 끝나면 다음 배치. 서버 과부하 방지.
function fetch_scores_parallel(string $apiBase, array $jobs, int $batchSize = 12): array {
    $results = []; // "coin|mode" => ?float
    foreach (array_chunk($jobs, $batchSize) as $batch) {
        $mh = curl_multi_init();
        $handles = [];
        foreach ($batch as $job) {
            [$coin, $mode] = $job;
            $url = $apiBase . '?coin=' . urlencode($coin) . '&mode=' . urlencode($mode);
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 22,
                CURLOPT_CONNECTTIMEOUT => 8,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTPHEADER     => ['Host: btctiming.com'],
            ]);
            curl_multi_add_handle($mh, $ch);
            $handles["$coin|$mode"] = $ch;
        }
        // 배치 실행
        do {
            $status = curl_multi_exec($mh, $running);
            if ($running) curl_multi_select($mh, 1.0);
        } while ($running && $status === CURLM_OK);
        // 결과 수집
        foreach ($handles as $key => $ch) {
            $resp = curl_multi_getcontent($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $results[$key] = extract_score($resp, $code);
            curl_multi_remove_handle($mh, $ch);
            curl_close($ch);
        }
        curl_multi_close($mh);
    }
    return $results;
}

// 작업 목록 구성
$jobs = [];
foreach ($coins as $coin) {
    foreach ($modes as [$mode, $modekey]) {
        $jobs[] = [$coin, $mode, $modekey];
    }
}

// 1차: 로컬 병렬 호출
$scoreMap = fetch_scores_parallel($API_LOCAL, array_map(fn($j) => [$j[0], $j[1]], $jobs));

// 2차: 로컬에서 실패한 것만 공개 도메인으로 재시도 (병렬)
$retry = [];
foreach ($jobs as [$coin, $mode, $modekey]) {
    if (($scoreMap["$coin|$mode"] ?? null) === null) $retry[] = [$coin, $mode];
}
if ($retry) {
    $retryMap = fetch_scores_parallel($API_PUBLIC, $retry);
    foreach ($retryMap as $k => $v) { if ($v !== null) $scoreMap[$k] = $v; }
}

// Firebase 저장 (병렬 — 저장은 가벼우니 한 번에)
$pushMh = curl_multi_init();
$pushHandles = [];
foreach ($jobs as [$coin, $mode, $modekey]) {
    $score = $scoreMap["$coin|$mode"] ?? null;
    if ($score === null) {
        $fail++; $details[] = "$coin/$modekey: score fetch failed";
        continue;
    }
    $path = rtrim($FB_BASE, '/') . '/scoreHistory/' . $coin . '_' . $modekey . '.json';
    $body = json_encode(['t' => $nowMs, 's' => round($score, 2)]);
    $ch = curl_init($path);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $body,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    ]);
    curl_multi_add_handle($pushMh, $ch);
    $pushHandles["$coin/$modekey"] = $ch;
}
do {
    $status = curl_multi_exec($pushMh, $running);
    if ($running) curl_multi_select($pushMh, 1.0);
} while ($running && $status === CURLM_OK);
foreach ($pushHandles as $label => $ch) {
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($code >= 200 && $code < 300) $ok++;
    else { $fail++; $details[] = "$label: firebase push failed ($code)"; }
    curl_multi_remove_handle($pushMh, $ch);
    curl_close($ch);
}
curl_multi_close($pushMh);

echo json_encode([
    'ok'      => $ok,
    'fail'    => $fail,
    't'       => $nowMs,
    'at'      => gmdate('Y-m-d H:i:s', (int) ($nowMs / 1000)) . ' UTC',
    'details' => $details,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
