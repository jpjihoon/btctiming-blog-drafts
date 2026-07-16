#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
btctiming.com — 블로그 글 내부링크 경로형(A안) 일괄 교정   2026-07-16 (v2)

경로형 URL 전환(온보딩 가이드 섹션 5) 후에도 글 본문의 링크가 옛 형식으로 남아 있다.
실측으로 확인된 형태 4가지:

  A) /{slug}.php               /blog/ 누락 → 실제로 404
  B) /blog/{slug}.php          200 이지만 옛 형식 (중복 URL)
  C) /blog/{slug}.html         .htaccess 가 301 로 .php 에 넘겨 살아난다.
                               404 는 아니지만 링크마다 301 왕복 1회를 낭비하고,
                               9개 언어 블록이 전부 ko 주소를 가리켜 언어가 안 맞는다.
                               ★ 주간리포트 루틴이 이 형식을 '정답'이라고 지시하고 있었다.
  D) /blog/{slug}?lang=xx      옛 언어 지정 방식
  E) /blog/{slug}              형식은 맞지만 비-ko 블록에 있어 언어가 안 맞는 경우

교정 규칙 (가이드 5.1 A안):
  ko    블록 안의 링크 →  /blog/{slug}
  비-ko 블록 안의 링크 →  /{lang}/blog/{slug}

  글 본문은 <p class="ko">…</p> 처럼 9개 언어 블록이 나란히 들어 있다.
  링크가 어느 언어 블록 안에 있는지 보고 그 언어의 주소로 보낸다.
  ?lang=xx 가 명시돼 있으면 그걸 우선한다.
  href 속성값만 바꾼다. 본문 텍스트는 한 글자도 건드리지 않는다.

★ "실존하는 글"의 판정 기준 (2026-07-16)
  레포의 *.php 만 보면 안 된다. 레포엔 없고 서버에만 있는 글이 3편 있다(실측):
      genius-act-stablecoin-kyc-rule / gnosis-pay-zodiac-hack-postmortem /
      world-solana-prediction-market-phantom
  셋 다 라이브 200 이고 본문도 멀쩡한데 커밋 2,067개 어디에도 이력이 없다
  (FTP로 직접 올라간 것으로 보인다). 이걸 '없는 글'로 처리해 가짜 404 경고가 떴다.
  → meta/{slug}.json 이 있으면 발행된 글로 인정한다.
    사이트도 같은 기준이다(_meta.php 가 meta/*.json 을 스캔해 목록·피드·사이트맵을 만든다).

사용:
  python3 .github/scripts/fix_blog_links.py           # 검사만 (dry-run)
  python3 .github/scripts/fix_blog_links.py --write   # 실제 수정
"""
import re, glob, os, sys, collections

LANGS = ['ko', 'en', 'ja', 'es', 'de', 'fr', 'pt', 'tr', 'vi']
LANGSET = set(LANGS)

# 레포 루트에 있지만 블로그 '글'이 아닌 파일
SYS = {'index.php', 'feed.php', 'rss.php', 'news-sitemap.php', 'og.php',
       'sitemap.php', 'widget.php'}

HREF = re.compile(r'href="([^"]+)"')
LANGQ = re.compile(r'\?lang=([a-z]{2})\b')
OPENTAG = re.compile(r'<(\w+)\b[^>]*\bclass="(%s)"[^>]*?(/?)>' % '|'.join(LANGS))
# /{slug}.php | /blog/{slug}[.php|.html] | /{lang}/blog/{slug}[.php|.html]
LINK = re.compile(r'\A/(?:([a-z]{2})/)?(?:blog/)?([a-z0-9][a-z0-9\-]*)(?:\.(?:php|html?))?\Z')


def article_files():
    return sorted(f for f in glob.glob('*.php') if f not in SYS and not f.startswith('_'))


def known_slugs(files):
    """실존하는 글. 레포 *.php + meta/*.json 합집합. (헤더 주석 참고)"""
    from_php = {f[:-4] for f in files}
    from_meta = {os.path.basename(f)[:-5] for f in glob.glob(os.path.join('meta', '*.json'))}
    return from_php | from_meta, (from_meta - from_php)


def lang_spans(s):
    """class="{lang}" 태그의 본문 구간. 같은 태그 이름 중첩을 세어 처리."""
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
    best, blen = None, None
    for a, b, l in spans:
        if a <= idx < b and (blen is None or (b - a) < blen):
            best, blen = l, b - a
    return best


def own_lang(s, href_pos):
    """href 를 담고 있는 태그 '자신'의 class 에서 언어를 읽는다.

    ★ 이게 없으면 멀쩡한 링크를 부순다(실측 32개).
      <a class="other-card en" href="/en/blog/xxx"> 처럼 언어 클래스가 <a> 자신에 붙는 경우가 있다.
      lang_spans() 는 '여는 태그 다음'부터를 구간으로 잡는데 href 는 '여는 태그 안'에 있어서
      자기 클래스를 못 본다 → 블록 미검출 → ko 로 오판 → /en/blog/xxx 를 /blog/xxx 로 망가뜨린다.
      class="back en" / class="en main-live-link" 같은 <a> 도 같은 경우다.
    """
    lt = s.rfind('<', 0, href_pos)
    if lt < 0:
        return None
    gt = s.find('>', href_pos)
    if gt < 0:
        return None
    cm = re.search(r'\bclass="([^"]*)"', s[lt:gt + 1])
    if not cm:
        return None
    for c in cm.group(1).split():
        if c in LANGSET:
            return c
    return None


def target(slug, lang):
    return '/blog/%s' % slug if lang == 'ko' else '/%s/blog/%s' % (lang, slug)


def process(path, slugs, bylang, bykind, missing):
    s = open(path, encoding='utf-8', errors='replace').read()
    if 'href="' not in s:
        return None
    spans = lang_spans(s)
    out, last, changed = [], 0, 0
    for m in HREF.finditer(s):
        href = m.group(1)
        p = href.replace('https://btctiming.com', '').replace('http://btctiming.com', '')
        q = LANGQ.search(p)
        qlang = q.group(1) if q else None
        p = p.split('?')[0]
        mm = LINK.match(p)
        if not mm:
            continue
        pre, slug = mm.group(1), mm.group(2)
        # 앞 2글자가 언어코드가 아니면 /{slug} 형태 → 그게 슬러그다
        if pre is not None and pre not in LANGSET:
            continue
        if slug not in slugs:
            missing[slug] += 1
            continue
        # 우선순위: ?lang= > 태그 자신의 class > 감싸는 블록 > 이미 붙은 언어접두어 > ko
        lang = (qlang if qlang in LANGSET else None) \
            or own_lang(s, m.start(1)) \
            or lang_at(spans, m.start()) \
            or (pre if pre in LANGSET else None) \
            or 'ko'
        new = target(slug, lang)
        if new == href:
            continue
        if p.endswith('.html') or p.endswith('.htm'):
            bykind['.html (301 우회)'] += 1
        elif p.endswith('.php'):
            bykind['.php (옛 형식)'] += 1
        elif qlang:
            bykind['?lang= 잔존'] += 1
        else:
            bykind['/blog/ 누락 또는 언어 불일치'] += 1
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
    slugs, server_only = known_slugs(files)
    bylang = collections.Counter()
    bykind = collections.Counter()
    missing = collections.Counter()
    touched = []

    for f in files:
        r = process(f, slugs, bylang, bykind, missing)
        if not r:
            continue
        new, n = r
        touched.append((f, n))
        if write:
            # blog-root 는 LF. 원본 그대로 보존하려 newline='' 으로 쓴다.
            open(f, 'w', encoding='utf-8', newline='').write(new)

    print('=' * 62)
    print('모드        : %s' % ('실제 수정(--write)' if write else '검사만 (dry-run)'))
    print('검사한 글   : %d 편' % len(files))
    print('수정 대상   : %d 편' % len(touched))
    print('교정 링크   : %d 개' % sum(n for _, n in touched))
    if bykind:
        print('유형별      : %s' % ', '.join('%s=%d' % (k, v) for k, v in bykind.most_common()))
    if bylang:
        print('언어별      : %s' % ', '.join('%s=%d' % (k, bylang[k]) for k in LANGS if bylang[k]))
    print('=' * 62)

    if server_only:
        print('')
        print('ℹ 레포엔 .php 가 없지만 meta json 이 있어 실존으로 인정한 글: %d편' % len(server_only))
        for k in sorted(server_only):
            print('    %s' % k)
        print('  → 라이브 200 으로 정상 동작한다. 이 글로 가는 링크도 정상 교정된다.')
        print('    다만 레포에 없어 repo-snapshot 주간 백업에 안 들어간다.')
        print('    FTP(222.122.198.186) /www/blog/ 에서 받아 레포에 넣으면 해결. 급하지 않다.')

    if missing:
        print('')
        print('★ 레포에도 meta json 에도 없는 글로 걸린 링크 (진짜 404):')
        for k, v in missing.most_common():
            print('    %s  (%d 곳)' % (k, v))
        print('  → 글을 새로 쓰거나 해당 링크를 본문에서 빼야 한다.')
        print('    링크를 임의로 지우면 본문이 바뀌므로 자동 처리하지 않는다.')

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
