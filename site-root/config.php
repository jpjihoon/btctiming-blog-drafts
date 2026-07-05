<?php
// ═══════════════════════════════════════════════════════
// BTCtiming.com — 백엔드 설정 및 상수
// ═══════════════════════════════════════════════════════
//
// 2026-07-03 수정: 이 파일 최상단에 있던 header('Content-Type: application/json'...) 등이
// 무조건 실행되던 걸 제거함. config.php는 index.php(HTML 응답)에서도 require하게 됐는데,
// 여기서 JSON 헤더를 강제로 찍으면 HTML 페이지 전체가 JSON/텍스트로 응답돼서 브라우저가
// 렌더링 대신 소스코드를 그대로 보여주는 심각한 버그가 생김. config.php는 순수 설정/상수만
// 담당하고, 실제로 JSON 응답이 필요한 곳(api.php 등)에서 각자 header()를 호출하도록 분리함.

// 코인별 Binance 심볼 매핑
const COIN_SYMBOLS = [
    'BTC'  => 'BTCUSDT',
    'ETH'  => 'ETHUSDT',
    'BNB'  => 'BNBUSDT',
    'SOL'  => 'SOLUSDT',
    'XRP'  => 'XRPUSDT',
    'DOGE' => 'DOGEUSDT',
    'ADA'  => 'ADAUSDT',
    'TRX'  => 'TRXUSDT',
];

// 알트코인 추정 실현가 (검증된 값, 주기적 갱신 필요)
// 2026-07-03 갱신: BTC는 실측 가능한 데이터로 갱신함 — 2026-07-01 기준 MVRV Z-Score 0.20,
// NUPL 0.12, BTC 현물 $61,318을 역산(realized = spot / MVRV, MVRV = 1/(1-NUPL))하면 약 $54,000.
// 나머지 알트코인 실현가는 CryptoQuant/Glassnode 같은 유료 온체인 API가 아니면 정밀 검증이 어려워
// 일반 웹 검색으로는 갱신하지 못함 — 기존 추정치 유지. 다음 갱신 시 온체인 데이터 소스로 직접 확인 권장.
const REALIZED_PRICE = [
    'BTC'  => 54000,
    'ETH'  => 2100,
    'BNB'  => 420,
    'SOL'  => 95,
    'XRP'  => 1.48,
    'DOGE' => 0.09,
    'ADA'  => 0.32,
    'TRX'  => 0.30,
];

// 코인별 ATH (역대 최고가)
// 2026-07-03 검증: BTC $126,080(2025.10), XRP $3.84(2018.1) 변동 없음 확인.
// SOL은 $293~$294.16으로 소스마다 약간 차이 있어 $294로 반올림. 나머지는 2026년 신고가 갱신 정황 없어 유지.
const ATH_MAP = [
    'BTC'  => 126080,
    'ETH'  => 4955,
    'BNB'  => 1370,
    'SOL'  => 294,
    'XRP'  => 3.84,
    'DOGE' => 0.74,
    'ADA'  => 3.09,
    'TRX'  => 0.45,
];

// 다음 반감기(2028.4)까지 남은 개월 수 — 주기적으로 갱신 필요
// 2026-07-03 기준 재계산: 오늘부터 2028년 4월까지 약 21개월.
const HALVING_MONTHS = 21;

// ── 지원 언어 목록 (단일 소스) ──
// 새 언어를 추가할 땐 이 배열에 한 줄만 추가하면 됨:
// - 메인 페이지(index.php) 언어 드롭다운, URL suffix 로직, LANG_META가 전부 여기서 파생됨
// - 블로그(blog/_header.php) 언어 드롭다운도 여기서 파생됨
// - 단, 실제 번역 콘텐츠(_meta.php의 title_xx 필드, 각 .php 파일의 <p class="xx"> 블록,
//   index.php의 LANGS 사전 문자열)는 이 배열 추가와 별개로 반드시 채워야 함 — 이건 배관이 아니라 콘텐츠라
//   구조를 아무리 잘 짜도 언어당 번역량 자체는 줄지 않음.
// 'ko' 값이 항상 fallback 언어(=URL 접미사 없음)이므로 배열 첫 번째 요소는 'ko' 유지.
const SUPPORTED_LANGS = [
    'ko' => ['code' => 'KO', 'flag' => '🇰🇷', 'name' => '한국어'],
    'en' => ['code' => 'EN', 'flag' => '🇺🇸', 'name' => 'English'],
    'ja' => ['code' => 'JA', 'flag' => '🇯🇵', 'name' => '日本語'],
    'es' => ['code' => 'ES', 'flag' => '🇪🇸', 'name' => 'Español'],
    'de' => ['code' => 'DE', 'flag' => '🇩🇪', 'name' => 'Deutsch'],
];

/** 언어 코드로 블로그/페이지 URL suffix 생성. 'ko'는 접미사 없음(fallback). */
function langSuffix(string $lang): string {
    return $lang === 'ko' ? '' : "?lang={$lang}";
}

/**
 * HTTP GET 요청 헬퍼 (단건, cURL 기반, 타임아웃/User-Agent 설정)
 * 병렬 호출이 불가능한 단일 백업/재시도 용도로만 사용.
 * @param string $url 요청 URL
 * @param bool $isJson true면 JSON 디코딩, false면 원문 텍스트 반환
 * @return mixed 성공 시 데이터, 실패 시 null
 */
function http_get(string $url, bool $isJson = true) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 6,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (BTCtiming.com data fetcher)',
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_FOLLOWLOCATION => true,
    ]);
    $body = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($body === false || $httpCode >= 400) {
        return null;
    }
    if ($isJson) {
        $decoded = json_decode($body, true);
        return $decoded;
    }
    return $body;
}

/**
 * HTTP GET 요청을 여러 개 "동시에" 보내는 헬퍼 (curl_multi 기반)
 * 외부 API 호출이 여러 개일 때, 순차 호출 대신 이걸로 한 번에 묶어 보내면
 * 전체 소요시간이 "모든 호출의 합"이 아니라 "가장 느린 호출 1개" 수준으로 줄어듦.
 *
 * @param array $urls ['key' => 'https://...', ...] 형태. key는 결과를 찾을 때 쓰는 이름표.
 * @param int $timeout 개별 요청 타임아웃(초)
 * @return array ['key' => string|null, ...] 각 요청의 원문 응답 (실패 시 null)
 */
function http_get_multi(array $urls, int $timeout = 6): array {
    if (empty($urls)) return [];

    $mh = curl_multi_init();
    $handles = [];

    foreach ($urls as $key => $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (BTCtiming.com data fetcher)',
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[$key] = $ch;
    }

    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);
        if ($running) {
            curl_multi_select($mh, 1.0);
        }
    } while ($running > 0 && $status === CURLM_OK);

    $results = [];
    foreach ($handles as $key => $ch) {
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $body = curl_multi_getcontent($ch);
        $results[$key] = ($body !== false && $body !== '' && $code < 400) ? $body : null;
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);

    return $results;
}

/**
 * 캐시 디렉토리 경로 (코인별로 짧게 캐싱해 외부 API 호출 줄임)
 */
function cache_path(string $key): string {
    $dir = __DIR__ . '/cache';
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    return $dir . '/' . preg_replace('/[^a-zA-Z0-9_]/', '_', $key) . '.json';
}

/**
 * 캐시에서 읽기 (TTL 초과 시 null)
 */
function cache_get(string $key, int $ttlSeconds) {
    $path = cache_path($key);
    if (!file_exists($path)) return null;
    if (time() - filemtime($path) > $ttlSeconds) return null;
    $content = @file_get_contents($path);
    if ($content === false) return null;
    return json_decode($content, true);
}

/**
 * 캐시에 쓰기
 */
function cache_set(string $key, $data): void {
    $path = cache_path($key);
    @file_put_contents($path, json_encode($data), LOCK_EX);
}

/**
 * 캐시 갱신 락 — 같은 코인에 대해 동시에 여러 요청(예: buy+sell 동시 호출,
 * 또는 여러 사용자가 동시 접속)이 콜드스타트로 겹쳐 들어와도,
 * 외부 API 풀세트 호출은 "한 번만" 일어나게 막아주는 락.
 * 락을 못 잡은 요청은 잠깐 기다렸다가 캐시가 채워지면 그걸 읽어서 씀.
 *
 * @return resource|false 락 파일 핸들 (cache_unlock에 그대로 넘길 것)
 */
function cache_lock(string $key) {
    $path = cache_path($key) . '.lock';
    $fh = @fopen($path, 'c');
    if (!$fh) return false;
    $acquired = flock($fh, LOCK_EX);
    return $acquired ? $fh : false;
}

function cache_unlock($fh): void {
    if ($fh) {
        flock($fh, LOCK_UN);
        fclose($fh);
    }
}
