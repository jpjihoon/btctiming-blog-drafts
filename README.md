# btctiming.com

> ⚠️ **레포 루트에 글 파일이 1,100개가 넘어서 GitHub 웹이 목록을 1,000개에서 자릅니다.**
> 그래서 `site-root` 폴더가 파일 목록에 안 보입니다. 아래 바로가기를 쓰세요.

## 📁 폴더 바로가기

| | 서버 위치 | 내용 |
|---|---|---|
| **[site-root/](../../tree/main/site-root)** | `/www/` | 대시보드·API·용어집·설정 (CRLF) |
| **[meta/](../../tree/main/meta)** | `/www/blog/meta/` | 글 메타데이터 json |
| **[.github/workflows/](../../tree/main/.github/workflows)** | — | 배포·자동화 |
| **[.github/scripts/](../../tree/main/.github/scripts)** | — | 링크 교정 스크립트 |
| 레포 루트 | `/www/blog/` | 블로그 글 `{slug}.php` (LF) |

## 📤 파일 올리기

**site-root 에 올릴 때** → [site-root/](../../tree/main/site-root) 들어가서 → `Add file` → `Upload files`

⚠️ **레포 첫 화면에서 그냥 올리면 루트(블로그)에 들어갑니다.** 반드시 폴더에 들어가서 올리세요.

## ▶️ 자주 쓰는 버튼

| 버튼 | 언제 |
|---|---|
| **[Merge all open PRs](../../actions/workflows/merge-all-prs.yml)** | 글 PR 일괄 병합 (병합 + 링크교정 + 배포 + 검증까지 함) |
| **[Deploy blog to Cafe24](../../actions/workflows/deploy.yml)** | 블로그 글이 서버에 안 올라갔을 때 |
| **[Deploy site root to Cafe24](../../actions/workflows/deploy-root.yml)** | site-root 가 서버에 안 올라갔을 때 |
| **[블로그 내부링크 교정](../../actions/workflows/%EB%B8%94%EB%A1%9C%EA%B7%B8-%EB%82%B4%EB%B6%80%EB%A7%81%ED%81%AC-%EA%B5%90%EC%A0%95.yml)** | 링크 형식 검사(check) / 수정(fix) |
| **[전체 Actions](../../actions)** | 실행 이력·실패 확인 |

각 워크플로우 페이지 오른쪽 **`Run workflow`** 버튼으로 수동 실행합니다.

## 🔗 주요 링크

| | |
|---|---|
| [사이트](https://btctiming.com) · [블로그](https://btctiming.com/blog/) · [용어집](https://btctiming.com/glossary) | |
| [Cloudflare](https://dash.cloudflare.com) | 캐시 Purge · 캐시규칙 · Security rules |
| [Firebase](https://console.firebase.google.com/project/btctiming-chat) | 조회수 · 점수히스토리 · 채팅 |
| [Search Console](https://search.google.com/search-console) · [Analytics](https://analytics.google.com) | |
| [Secrets 설정](../../settings/secrets/actions) | FTP_SERVER / FTP_USERNAME / FTP_PASSWORD / SNAPSHOT_TOKEN |

## 🚨 배포가 안 됐을 때

1. **[Actions](../../actions)** 에서 빨간 X 있는지 확인
2. 없으면 → 해당 `Deploy…` 워크플로우 → **`Run workflow`**
3. 글이 404면 → **Cloudflare → Caching → Configuration → Purge Everything**
   (배포 전에 URL을 눌러봤다면 404가 2시간 캐시에 박힙니다)

## ⚠️ 절대 규칙

- **`site-root/index.php`(대시보드)와 루트 `index.php`(블로그 목록)는 완전히 다른 파일입니다.** 교차 업로드하면 500.
- 라인엔딩: `site-root/` → **CRLF** / 레포 루트(블로그) → **LF**
- 이 레포는 **Public** 입니다. 비밀번호·토큰을 파일에 적어 커밋하지 마세요. Secrets 를 쓰세요.
