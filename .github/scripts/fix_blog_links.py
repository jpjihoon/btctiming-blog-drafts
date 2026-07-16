#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
btctiming.com — 블로그 글 내부링크 경로형(A안) 일괄 교정   2026-07-15

경로형 URL 전환(온보딩 가이드 섹션 5) 후에도 글 본문 안의 링크가 옛 형식으로 남아 있다.

  A) /{slug}.php              → /blog/ 누락. 실제로 404 난다.       ★ 이게 터지던 것
  B) /blog/{slug}.php         → .php 잔존. 200 이지만 옛 형식(중복 URL, SEO 손해)
  D) /blog/{slug}.php?lang=xx → ?lang= 잔존

교정 규칙 (가이드 5.1 A안):
  ko    블록 안의 링크 →  /blog/{slug}
  비-ko 블록 안의 링크 →  /{lang}/blog/{slug}

  글 본문은 <p class="ko">…</p> 처럼 9개 언어 블록이 나란히 들어 있다.
  링크가 어느 언어 블록 안에 있는지 보고 그 언어의 주소로 보낸다.
  ?lang=xx 가 명시돼 있으면 그걸 우선한다.

  href 속성값만 바꾼다. 본문 텍스트는 한 글자도 건드리지 않는다.
  대상 글이 실제로 존재하지 않으면 건드리지 않고 보고만 한다.

사용:
  python3 .github/scripts/fix_blog_links.py           # 검사만 (dry-run)
  python3 .github/scripts/fix_blog_links.py --write   # 실제 수정
"""
import re, glob, sys, collections

LANGS = ['ko', 'en', 'ja', 'es', 'de', 'fr', 'pt', 'tr', 'vi']

# 레포 루트에 있지만 블로그 '글'이 아닌 파일들
SYS = {
    'index.php', 'feed.php', 'rss.php', 'news-sitemap.php', 'og.php',
    'sitemap.php', 'widget.php',
}

HREF = re.compile(r'href="([^"]+)"')
SLUGPATH = re.compile(r'/?(?:blog/)?([a-z0-9][a-z0-9\-]*)\.php\Z')
LANGQ = re.compile(r'\?lang=([a-z]{2})\b')
OPENTAG = re.compile(r'<(\w+)\b[^>]*\bclass="(%s)"[^>]*?(/?)>' % '|'.join(LANGS))


def article_files():
    return sorted(f for f in glob.glob('*.php') if f not in SYS and not f.startswith('_'))


def lang_spans(s):
    """class="{lang}" 를 가진 태그의 본문 구간 목록. 같은 태그 이름 중첩을 세어 처리."""
    spans = []
    for m in OPENTAG.finditer(s):
        tag, lang, selfclose = m.group(1), m.group(2), m.group(3)
        if selfclose:
            continue
        depth, pos = 1, m.end()
        pat = re.compile(r'<(/?)%s\b' % re.escape(tag), re.I)
        while depth > 0:
            mm = pat.search(s, pos)
            if not mm:
                break
            depth += -1 if mm.group(1) else 1
            pos = mm.end()
        if depth == 0:
            spans.append((m.end(), s.rfind('<', 0, pos), lang))
    return spans


def lang_at(spans, idx):
    """idx 위치를 감싸는 가장 안쪽 언어 블록."""
    best, blen = None, None
    for a, b, l in spans:
        if a <= idx < b and (blen is None or (b - a) < blen):
            best, blen = l, b - a
    return best


def target(slug, lang):
    return '/blog/%s' % slug if lang == 'ko' else '/%s/blog/%s' % (lang, slug)


def process(path, slugs, bylang, missing):
    s = open(path, encoding='utf-8', errors='replace').read()
    if '.php"' not in s and ".php?" not in s:
        return None
    spans = lang_spans(s)
    out, last, changed = [], 0, 0
    for m in HREF.finditer(s):
        href = m.group(1)
        p = href.replace('https://btctiming.com', '').replace('http://btctiming.com', '')
        q = LANGQ.search(p)
        qlang = q.group(1) if q else None
        p = p.split('?')[0]
        mm = SLUGPATH.fullmatch(p)
        if not mm:
            continue
        slug = mm.group(1)
        if slug not in slugs:
            missing[slug] += 1
            continue
        lang = qlang if qlang in LANGS else (lang_at(spans, m.start()) or 'ko')
        new = target(slug, lang)
        if new == href:
            continue
        out.append(s[last:m.start(1)])
        out.append(new)
        last = m.end(1)
        changed += 1
        bylang[lang] += 1
    if not changed:
        return None
    out.append(s[last:])
    return ''.join(out), changed


def main():
    write = '--write' in sys.argv
    files = article_files()
    slugs = {f[:-4] for f in files}
    bylang = collections.Counter()
    missing = collections.Counter()
    touched = []

    for f in files:
        r = process(f, slugs, bylang, missing)
        if not r:
            continue
        new, n = r
        touched.append((f, n))
        if write:
            # blog-root 는 LF. 원본 그대로 보존하기 위해 newline='' 으로 쓴다.
            open(f, 'w', encoding='utf-8', newline='').write(new)

    print('=' * 60)
    print('모드        : %s' % ('실제 수정(--write)' if write else '검사만 (dry-run)'))
    print('검사한 글   : %d 편' % len(files))
    print('수정 대상   : %d 편' % len(touched))
    print('교정 링크   : %d 개' % sum(n for _, n in touched))
    print('언어별      : %s' % ', '.join('%s=%d' % (k, bylang[k]) for k in LANGS if bylang[k]))
    print('=' * 60)

    if missing:
        print('')
        print('★ 대상 글이 존재하지 않아 건드리지 않은 링크:')
        for k, v in missing.most_common():
            print('    %s  (%d 곳)' % (k, v))
        print('  → 이 글을 새로 쓰거나, 해당 링크를 본문에서 빼야 합니다.')
        print('    링크를 임의로 지우면 본문이 바뀌므로 자동으로 처리하지 않았습니다.')

    if touched:
        print('')
        print('수정된 글 (앞 15편):')
        for f, n in touched[:15]:
            print('    %-58s %d개' % (f, n))
        if len(touched) > 15:
            print('    ... 외 %d 편' % (len(touched) - 15))
    return 0


if __name__ == '__main__':
    sys.exit(main())
