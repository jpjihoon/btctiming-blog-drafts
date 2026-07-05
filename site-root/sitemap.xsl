<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xhtml="http://www.w3.org/1999/xhtml">
<xsl:output method="html" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<html>
<head>
<meta charset="UTF-8"/>
<title>BTCtiming.com — Sitemap</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { background: #09090b; color: #e4e4e7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; padding: 32px 20px; }
  .wrap { max-width: 1100px; margin: 0 auto; }
  h1 { font-size: 20px; font-weight: 800; color: #fafafa; margin-bottom: 4px; }
  .sub { color: #71717a; font-size: 13px; margin-bottom: 24px; }
  .sub b { color: #f7931a; }
  table { width: 100%; border-collapse: collapse; font-size: 13px; background: #111113; border-radius: 10px; overflow: hidden; border: 1px solid rgba(255,255,255,.08); }
  th { background: #1c1c1f; color: #fafafa; text-align: left; padding: 10px 14px; font-weight: 600; border-bottom: 1px solid rgba(255,255,255,.08); }
  td { padding: 9px 14px; border-bottom: 1px solid rgba(255,255,255,.05); color: #a1a1aa; vertical-align: top; }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: #16161a; }
  a { color: #f7931a; text-decoration: none; word-break: break-all; }
  a:hover { text-decoration: underline; }
  .badge { display: inline-block; font-size: 10px; font-weight: 700; padding: 1px 6px; border-radius: 4px; background: rgba(247,147,26,.15); color: #f7931a; margin-left: 6px; }
  .lang { display: inline-block; font-size: 10px; color: #52525b; margin-right: 8px; }
  .lang a { color: #71717a; }
  .count { color: #4ade80; font-weight: 700; }
  footer { margin-top: 20px; font-size: 11px; color: #52525b; text-align: center; }
</style>
</head>
<body>
<div class="wrap">
  <h1>🗺️ BTCtiming.com Sitemap</h1>
  <div class="sub">검색엔진이 읽는 XML 사이트맵입니다 · 총 <span class="count"><xsl:value-of select="count(sitemap:urlset/sitemap:url)"/></span>개 URL (한국어/영어 버전 포함)</div>
  <table>
    <tr>
      <th style="width:46%">URL</th>
      <th style="width:12%">최종수정</th>
      <th style="width:10%">갱신주기</th>
      <th style="width:8%">우선순위</th>
      <th style="width:24%">언어 버전</th>
    </tr>
    <xsl:for-each select="sitemap:urlset/sitemap:url">
    <tr>
      <td><a href="{sitemap:loc}"><xsl:value-of select="sitemap:loc"/></a></td>
      <td><xsl:value-of select="sitemap:lastmod"/></td>
      <td><xsl:value-of select="sitemap:changefreq"/></td>
      <td><xsl:value-of select="sitemap:priority"/></td>
      <td>
        <xsl:for-each select="xhtml:link">
          <span class="lang">
            <xsl:value-of select="@hreflang"/>: <a href="{@href}">↗</a>
          </span>
        </xsl:for-each>
      </td>
    </tr>
    </xsl:for-each>
  </table>
  <footer>BTCtiming.com · Auto-generated sitemap · 이 페이지는 사람이 읽기 편하도록 XSL로 변환된 화면이며, 검색엔진은 원본 XML을 그대로 읽습니다.</footer>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
