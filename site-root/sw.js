// BTCtiming.com — Service Worker
// PWA 설치(앱 설치) 조건 충족용. 오프라인 최소 지원 + 네트워크 우선.
const CACHE = 'btctiming-v1';
const CORE = ['/', '/manifest.json', '/icon-192.png', '/icon-512.png'];

self.addEventListener('install', (e) => {
  self.skipWaiting();
  e.waitUntil(
    caches.open(CACHE).then((c) => c.addAll(CORE).catch(() => {}))
  );
});

self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(keys.filter((k) => k !== CACHE).map((k) => caches.delete(k)))
    ).then(() => self.clients.claim())
  );
});

// 네트워크 우선, 실패 시 캐시 (실시간 점수가 중요하므로 API는 항상 네트워크)
self.addEventListener('fetch', (e) => {
  const url = new URL(e.request.url);
  // API·동적 요청은 캐시하지 않음
  if (url.pathname.includes('/api.php') || url.search.includes('coin=')) {
    return; // 브라우저 기본 처리(항상 네트워크)
  }
  if (e.request.method !== 'GET') return;
  e.respondWith(
    fetch(e.request)
      .then((res) => {
        // 정적 자원만 캐시 갱신
        if (res.ok && (url.pathname.endsWith('.png') || url.pathname.endsWith('.js') ||
            url.pathname.endsWith('.css') || url.pathname === '/' || url.pathname.endsWith('.json'))) {
          const copy = res.clone();
          caches.open(CACHE).then((c) => c.put(e.request, copy).catch(() => {}));
        }
        return res;
      })
      .catch(() => caches.match(e.request))
  );
});
