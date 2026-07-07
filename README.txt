[패치노트 블로그 10편 — 전체 배포 패키지]

■ 압축 구조 = GitHub repo(main 브랜치) 구조와 동일
  이 zip을 풀면 나오는 위치가 곧 repo에서의 위치입니다.

  {slug}.php          (zip 루트)   → repo 루트   → 서버 /www/blog/{slug}.php
  meta/{slug}.json                 → repo meta/  → 서버 /www/blog/meta/{slug}.json
  _category_meta.php  (zip 루트)   → repo 루트   → 서버 /www/blog/_category_meta.php
  site-root/og.php                 → repo site-root/ → 서버 /www/og.php
  site-root/app.js                 → repo site-root/ → 서버 /www/app.js

  ※ 블로그 파일은 repo 루트(main)에 그대로 커밋하면 됩니다.
    폴더로 감싸지 마세요.

■ 포함된 패치노트 10편 (모두 NYT식 차분한 서술체, 5개 언어, 이미지 다수)
  1. patch-long-exit          롱 점수가 낮으면 팔라는 뜻이 아니었다
  2. patch-realized-saturation 잡알트가 전부 만점이던 시절
  3. patch-quiet-bottom       역대 최저가인데 왜 점수가 낮았을까
  4. patch-eth-gap            이더리움은 왜 늘 비트코인보다 낮을까
  5. patch-trx-philosophy     안 빠진 코인은 상승장 와도 안 오르나
  6. patch-symmetry-trap      완벽한 대칭의 함정
  7. patch-volume-gating      거래량이 오르면 무조건 좋은가
  8. patch-correlation        상관계수의 착각
  9. patch-btc-first          비트코인이 1등인 게 맞나 (미완의 고민, 투명 공개)
  10. patch-long-entry        장기 상승 초입을 어떻게 점수화하나 (근본 철학)

  - 날짜: 2026-03-15 ~ 2026-07-02 로 분산 (오래 다뤄온 느낌)
  - 팀원은 인물로만 등장(Sophia, Kai, Randy, Leo, Mina), 담당 설명 없음
  - 각 글의 본문 첫 SVG가 OG 공유 이미지로 자동 사용됨 (og.php C안)
  - 카드 목업은 실제 대시보드 CSS 재현 → 실제 캡처 주시면 교체 가능

■ _category_meta.php
  '패치노트'(patch) 카테고리가 목록 맨 앞에 오도록 첫 항목으로 추가됨.
  색상 #f97316(주황). 기존 카테고리는 그대로 유지.

■ 태그(토픽)는 category와 다르게 지정 → 목록에서 "패치노트 · {토픽}" 표시
  (예: 패치노트 · 롱·숏 신호 / 패치노트 · 저점 관점 ...)

■ site-root 2개 파일 (이전 수정분 포함, 아직 미배포면 함께 올리세요)
  - og.php : 본문 첫 차트 SVG를 C안 레이아웃 OG로 생성
  - app.js : 코인검색 '전체' 탭 클릭 = 즐겨찾기 토글(이동 안함),
             '즐겨찾기' 탭 클릭 = 코인 이동

■ 줄바꿈: 블로그/repo-root = LF, site-root = CRLF

■ 배포 후 확인
  1. 블로그 목록에 '패치노트' 카테고리 탭이 맨 앞에 나오는지
  2. 각 글 열림: https://btctiming.com/blog/patch-long-exit.php 등
  3. 목록 카드에 "패치노트 · 롱·숏 신호"처럼 토픽이 중복 없이 표시
  4. OG: https://btctiming.com/og.php?slug=patch-quiet-bottom&lang=ko
     → 각 글 첫 차트가 이미지로. (배포 후 /www/og/*.png 캐시 삭제,
       페이스북 공유 디버거에서 Scrape Again)
  5. 코인검색 전체탭 클릭 = 별만 토글 / 즐겨찾기탭 클릭 = 이동
