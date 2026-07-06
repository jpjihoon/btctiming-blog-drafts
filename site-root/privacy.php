<?php
// BTCtiming.com — 개인정보처리방침 (.php, 공용 헤더/푸터 include)
header('Content-Type: text/html; charset=utf-8');
$baseUrl = 'https://btctiming.com';
$GUIDE_TITLE = '개인정보처리방침 · BTCtiming.com';
$GUIDE_DESC = 'BTCtiming.com 개인정보처리방침.';
$GUIDE_CANONICAL = $baseUrl . '/privacy';
$GUIDE_EXTRA_CSS = <<<CSS
.wrap{max-width:760px;margin:0 auto;padding:48px 24px 100px}
h1{font-size:2rem;font-weight:800;line-height:1.25;margin-bottom:8px;color:#fafafa}
.meta{font-size:13px;color:var(--t3);margin-bottom:36px}
h2{font-size:1.3rem;font-weight:700;margin:36px 0 12px;color:#fafafa;padding-top:8px;border-top:1px solid var(--b1)}
h2:first-of-type{border-top:none;padding-top:0;margin-top:0}
p{margin-bottom:14px;color:#a1a1aa}
ul,ol{margin:0 0 14px 22px;color:#a1a1aa}
li{margin-bottom:8px}
strong{color:#e4e4e7}
.box{background:#1c1c1f;border-left:3px solid var(--orange);border-radius:6px;padding:16px 20px;margin:20px 0;color:#d4d4d8}
.box.warn{border-left-color:var(--red)}
.box b{color:#fafafa}
table.zt{width:100%;border-collapse:collapse;margin:16px 0;font-size:13.5px}
table.zt th{background:#1c1c1f;padding:9px 12px;text-align:left;font-weight:600;color:#fafafa;border:1px solid var(--b1)}
table.zt td{padding:9px 12px;border:1px solid var(--b1);color:#a1a1aa}
.tocbox{background:#111113;border:1px solid var(--b1);border-radius:10px;padding:18px 22px;margin:24px 0 36px}
.tocbox b{display:block;color:#fafafa;font-size:13px;margin-bottom:10px}
.tocbox ol{margin:0 0 0 18px;color:#a1a1aa;font-size:13.5px}
.tocbox a{color:#a1a1aa;text-decoration:none}
.tocbox a:hover{color:var(--orange)}
CSS;
require __DIR__ . '/_guide_head.php';
?>

<div class="wrap">
<h1><span class="l-ko">개인정보처리방침</span><span class="l-en">Privacy Policy</span><span class="l-ja">プライバシーポリシー</span><span class="l-es">Política de Privacidad</span><span class="l-de">Datenschutzerklärung</span></h1>
<div class="meta"><span class="l-ko">최종 수정일: 2026년 7월 4일</span><span class="l-en">Last updated: July 4, 2026</span><span class="l-ja">最終更新日: 2026年7月4日</span><span class="l-es">Última actualización: 4 de julio de 2026</span><span class="l-de">Zuletzt aktualisiert: 4. Juli 2026</span></div>

<div class="tocbox">
  <b class="l-ko">목차</b><b class="l-en">Contents</b><b class="l-ja">目次</b><b class="l-es">Índice</b><b class="l-de">Inhalt</b>
  <ol>
    <li><a href="#s1"><span class="l-ko">개요</span><span class="l-en">Overview</span><span class="l-ja">概要</span><span class="l-es">Resumen</span><span class="l-de">Überblick</span></a></li>
    <li><a href="#s2"><span class="l-ko">수집하는 정보</span><span class="l-en">Information We Collect</span><span class="l-ja">収集する情報</span><span class="l-es">Información que Recopilamos</span><span class="l-de">Erfasste Informationen</span></a></li>
    <li><a href="#s3"><span class="l-ko">정보 이용 목적</span><span class="l-en">How We Use Information</span><span class="l-ja">情報の利用目的</span><span class="l-es">Cómo Usamos la Información</span><span class="l-de">Verwendung der Informationen</span></a></li>
    <li><a href="#s4"><span class="l-ko">쿠키 및 추적 기술</span><span class="l-en">Cookies &amp; Tracking</span><span class="l-ja">Cookieと追跡技術</span><span class="l-es">Cookies y Rastreo</span><span class="l-de">Cookies &amp; Tracking</span></a></li>
    <li><a href="#s5"><span class="l-ko">제3자 서비스</span><span class="l-en">Third-Party Services</span><span class="l-ja">第三者サービス</span><span class="l-es">Servicios de Terceros</span><span class="l-de">Drittanbieter-Dienste</span></a></li>
    <li><a href="#s6"><span class="l-ko">데이터 보관 기간</span><span class="l-en">Data Retention</span><span class="l-ja">データ保持期間</span><span class="l-es">Retención de Datos</span><span class="l-de">Datenspeicherung</span></a></li>
    <li><a href="#s7"><span class="l-ko">이용자의 권리</span><span class="l-en">Your Rights</span><span class="l-ja">利用者の権利</span><span class="l-es">Sus Derechos</span><span class="l-de">Ihre Rechte</span></a></li>
    <li><a href="#s8"><span class="l-ko">아동의 개인정보</span><span class="l-en">Children's Privacy</span><span class="l-ja">児童のプライバシー</span><span class="l-es">Privacidad de Menores</span><span class="l-de">Datenschutz für Kinder</span></a></li>
    <li><a href="#s9"><span class="l-ko">국외 데이터 이전</span><span class="l-en">International Data Transfers</span><span class="l-ja">国外データ移転</span><span class="l-es">Transferencias Internacionales</span><span class="l-de">Internationale Datenübertragung</span></a></li>
    <li><a href="#s10"><span class="l-ko">보안</span><span class="l-en">Security</span><span class="l-ja">セキュリティ</span><span class="l-es">Seguridad</span><span class="l-de">Sicherheit</span></a></li>
    <li><a href="#s11"><span class="l-ko">정책 변경</span><span class="l-en">Changes to This Policy</span><span class="l-ja">ポリシーの変更</span><span class="l-es">Cambios en esta Política</span><span class="l-de">Änderungen dieser Richtlinie</span></a></li>
    <li><a href="#s12"><span class="l-ko">문의</span><span class="l-en">Contact</span><span class="l-ja">お問い合わせ</span><span class="l-es">Contacto</span><span class="l-de">Kontakt</span></a></li>
  </ol>
</div>
<h2 id="s1"><span class="l-ko">1. 개요</span><span class="l-en">1. Overview</span><span class="l-ja">1. 概要</span><span class="l-es">1. Resumen</span><span class="l-de">1. Überblick</span></h2>
<p class="l-ko">BTCtiming.com("본 사이트", "저희")은 비트코인 및 주요 알트코인의 온체인 지표를 실시간으로 분석해 보여주는 무료 웹 서비스입니다. 본 방침은 본 사이트를 이용하는 과정에서 어떤 정보가 어떻게 수집·이용·보관되는지 설명합니다. 본 사이트는 회원가입이나 로그인 기능이 없으며, 실명·주소·전화번호 같은 개인 식별 정보를 요구하지 않습니다.</p>
<p class="l-en">BTCtiming.com ("the Site," "we," "us") is a free web service that analyzes on-chain indicators for Bitcoin and major altcoins in real time. This policy explains what information is collected, how it's used, and how it's stored while you use the Site. The Site has no account registration or login system, and does not request personally identifying information such as your legal name, address, or phone number.</p>
<p class="l-ja">BTCtiming.com(以下「本サイト」「当方」)は、ビットコインおよび主要アルトコインのオンチェーン指標をリアルタイムで分析・表示する無料ウェブサービスです。本方針は、本サイトをご利用いただく過程でどのような情報がどのように収集・利用・保管されるかを説明します。本サイトには会員登録やログイン機能がなく、実名・住所・電話番号などの個人識別情報を要求しません。</p>
<p class="l-es">BTCtiming.com ("el Sitio", "nosotros") es un servicio web gratuito que analiza indicadores on-chain de Bitcoin y las principales altcoins en tiempo real. Esta política explica qué información se recopila, cómo se usa y cómo se almacena mientras utiliza el Sitio. El Sitio no tiene registro de cuenta ni sistema de inicio de sesión, y no solicita información de identificación personal como su nombre legal, dirección o número de teléfono.</p>
<p class="l-de">BTCtiming.com ("die Website", "wir") ist ein kostenloser Webdienst, der On-Chain-Indikatoren für Bitcoin und wichtige Altcoins in Echtzeit analysiert. Diese Richtlinie erklärt, welche Informationen erfasst, wie sie verwendet und wie sie gespeichert werden, während Sie die Website nutzen. Die Website verfügt über keine Kontoregistrierung oder Anmeldefunktion und fragt keine personenbezogenen Daten wie Ihren vollständigen Namen, Ihre Adresse oder Telefonnummer ab.</p>

<h2 id="s2"><span class="l-ko">2. 수집하는 정보</span><span class="l-en">2. Information We Collect</span><span class="l-ja">2. 収集する情報</span><span class="l-es">2. Información que Recopilamos</span><span class="l-de">2. Erfasste Informationen</span></h2>

<h3 style="font-size:1.02rem;font-weight:700;margin:20px 0 8px;color:#e4e4e7">
<span class="l-ko">2.1 자동으로 수집되는 정보</span><span class="l-en">2.1 Automatically Collected Information</span><span class="l-ja">2.1 自動的に収集される情報</span><span class="l-es">2.1 Información Recopilada Automáticamente</span><span class="l-de">2.1 Automatisch erfasste Informationen</span>
</h3>
<p class="l-ko">Google Analytics를 통해 페이지 방문 통계(방문 페이지, 체류 시간, 대략적인 지역, 기기·브라우저 종류, 유입 경로)를 익명화된 형태로 수집합니다. 이 정보는 개별 사용자를 특정하지 않으며, 서비스 이용 패턴을 파악해 사이트를 개선하는 데만 사용됩니다.</p>
<p class="l-en">Through Google Analytics, we collect anonymized page visit statistics (pages viewed, time on page, approximate region, device/browser type, referral source). This information does not identify individual users and is used solely to understand usage patterns and improve the Site.</p>
<p class="l-ja">Google Analyticsを通じて、ページ訪問統計(閲覧ページ、滞在時間、おおよその地域、デバイス・ブラウザの種類、流入経路)を匿名化された形で収集します。この情報は個々のユーザーを特定するものではなく、サービスの利用パターンを把握しサイトを改善する目的のみに使用されます。</p>
<p class="l-es">A través de Google Analytics, recopilamos estadísticas anónimas de visitas a páginas (páginas vistas, tiempo en la página, región aproximada, tipo de dispositivo/navegador, fuente de referencia). Esta información no identifica a usuarios individuales y se utiliza únicamente para comprender los patrones de uso y mejorar el Sitio.</p>
<p class="l-de">Über Google Analytics erfassen wir anonymisierte Seitenaufrufstatistiken (aufgerufene Seiten, Verweildauer, ungefähre Region, Geräte-/Browsertyp, Verweisquelle). Diese Informationen identifizieren keine einzelnen Nutzer und werden ausschließlich zur Analyse von Nutzungsmustern und Verbesserung der Website verwendet.</p>

<h3 style="font-size:1.02rem;font-weight:700;margin:20px 0 8px;color:#e4e4e7">
<span class="l-ko">2.2 브라우저 로컬 저장소(localStorage)</span><span class="l-en">2.2 Browser Local Storage (localStorage)</span><span class="l-ja">2.2 ブラウザローカルストレージ(localStorage)</span><span class="l-es">2.2 Almacenamiento Local del Navegador (localStorage)</span><span class="l-de">2.2 Lokaler Browser-Speicher (localStorage)</span>
</h3>
<p class="l-ko">본 사이트는 아래 항목을 사용자의 브라우저(localStorage)에만 저장하며, 이 데이터는 서버로 전송되지 않고 사용자의 기기에만 존재합니다. 브라우저 데이터를 삭제하면 함께 삭제됩니다.</p>
<p class="l-en">The Site stores the following items only in your browser (localStorage). This data is never transmitted to our servers and exists only on your device. Clearing your browser data removes it entirely.</p>
<p class="l-ja">本サイトは以下の項目をユーザーのブラウザ(localStorage)にのみ保存し、このデータはサーバーに送信されず、ユーザーの端末にのみ存在します。ブラウザデータを削除すると一緒に削除されます。</p>
<p class="l-es">El Sitio almacena los siguientes elementos únicamente en su navegador (localStorage). Estos datos nunca se transmiten a nuestros servidores y existen solo en su dispositivo. Al borrar los datos de su navegador, se eliminan por completo.</p>
<p class="l-de">Die Website speichert die folgenden Elemente ausschließlich in Ihrem Browser (localStorage). Diese Daten werden niemals an unsere Server übertragen und existieren nur auf Ihrem Gerät. Beim Löschen Ihrer Browserdaten werden sie vollständig entfernt.</p>
<ul class="l-ko"><li>선택한 언어 설정</li><li>점수 히스토리(직접 조회한 코인의 점수 변화 기록)</li><li>입력한 투자 자산 금액(분할매수 계산용)</li><li>알림 설정(가격/지표 알림 On/Off)</li><li>채팅 닉네임(선택적으로 커뮤니티 채팅 이용 시)</li></ul>
<ul class="l-en"><li>Selected language preference</li><li>Score history (a record of score changes for coins you've viewed)</li><li>Investment amount you entered (for split-entry calculations)</li><li>Alert settings (price/indicator alert on-off states)</li><li>Chat nickname (only if you optionally use the community chat)</li></ul>
<ul class="l-ja"><li>選択した言語設定</li><li>スコア履歴(閲覧したコインのスコア変化記録)</li><li>入力した投資資産額(分割購入計算用)</li><li>通知設定(価格・指標通知のオン/オフ)</li><li>チャットニックネーム(コミュニティチャットを任意で利用する場合)</li></ul>
<ul class="l-es"><li>Preferencia de idioma seleccionada</li><li>Historial de puntuación (registro de cambios de puntuación de las monedas que ha visto)</li><li>Monto de inversión que ingresó (para cálculos de entrada escalonada)</li><li>Configuración de alertas (estados de activación de alertas de precio/indicador)</li><li>Apodo de chat (solo si utiliza opcionalmente el chat de la comunidad)</li></ul>
<ul class="l-de"><li>Ausgewählte Spracheinstellung</li><li>Score-Verlauf (Aufzeichnung der Score-Änderungen für von Ihnen angesehene Coins)</li><li>Von Ihnen eingegebener Investitionsbetrag (für gestaffelte Einstiegsberechnungen)</li><li>Benachrichtigungseinstellungen (Ein-/Aus-Status für Preis-/Indikatorbenachrichtigungen)</li><li>Chat-Spitzname (nur bei optionaler Nutzung des Community-Chats)</li></ul>

<h3 style="font-size:1.02rem;font-weight:700;margin:20px 0 8px;color:#e4e4e7">
<span class="l-ko">2.3 커뮤니티 채팅 데이터</span><span class="l-en">2.3 Community Chat Data</span><span class="l-ja">2.3 コミュニティチャットデータ</span><span class="l-es">2.3 Datos del Chat Comunitario</span><span class="l-de">2.3 Community-Chat-Daten</span>
</h3>
<p class="l-ko">본 사이트는 실시간 커뮤니티 채팅 기능을 Google Firebase(Realtime Database)를 통해 제공합니다. 채팅 이용 시 저장되는 정보는 사용자가 직접 입력한 닉네임, 채팅 메시지 내용, 대략적인 지역(국가 단위) 정도이며, 이메일이나 실명 같은 신원 확인 정보는 수집하지 않습니다. 채팅 메시지는 모든 방문자에게 공개적으로 노출된다는 점을 유의해주세요.</p>
<p class="l-en">The Site's live community chat feature is powered by Google Firebase (Realtime Database). Information stored when you use chat includes the nickname you enter, your message content, and an approximate region (country level) — we do not collect identity-verifying information such as email or legal name. Please note that chat messages are publicly visible to all visitors.</p>
<p class="l-ja">本サイトのリアルタイムコミュニティチャット機能はGoogle Firebase(Realtime Database)を通じて提供されます。チャット利用時に保存される情報は、ユーザーが入力したニックネーム、チャットメッセージの内容、おおよその地域(国単位)程度で、メールアドレスや実名などの本人確認情報は収集しません。チャットメッセージはすべての訪問者に公開される点にご留意ください。</p>
<p class="l-es">La función de chat comunitario en vivo del Sitio funciona con Google Firebase (Realtime Database). La información almacenada cuando usa el chat incluye el apodo que ingresa, el contenido de su mensaje y una región aproximada (a nivel de país) — no recopilamos información de verificación de identidad como correo electrónico o nombre legal. Tenga en cuenta que los mensajes de chat son visibles públicamente para todos los visitantes.</p>
<p class="l-de">Die Live-Community-Chat-Funktion der Website wird von Google Firebase (Realtime Database) bereitgestellt. Bei der Nutzung des Chats gespeicherte Informationen umfassen den von Ihnen eingegebenen Spitznamen, Ihren Nachrichteninhalt und eine ungefähre Region (Länderebene) — wir erfassen keine identitätsprüfenden Informationen wie E-Mail oder vollständigen Namen. Bitte beachten Sie, dass Chat-Nachrichten für alle Besucher öffentlich sichtbar sind.</p>

<h2 id="s3"><span class="l-ko">3. 정보 이용 목적</span><span class="l-en">3. How We Use Information</span><span class="l-ja">3. 情報の利用目的</span><span class="l-es">3. Cómo Usamos la Información</span><span class="l-de">3. Verwendung der Informationen</span></h2>
<ul class="l-ko"><li>서비스 제공 및 개인화(선택한 언어, 코인, 알림 설정 유지)</li><li>서비스 이용 통계 분석을 통한 사이트 개선</li><li>버그 및 오류 파악, 서버 부하 대응</li><li>커뮤니티 채팅 기능 제공</li><li>광고 게재(Google AdSense, 아래 4·5항 참고)</li></ul>
<ul class="l-en"><li>Providing and personalizing the service (retaining your language, coin, and alert preferences)</li><li>Analyzing usage statistics to improve the Site</li><li>Identifying bugs and errors, managing server load</li><li>Powering the community chat feature</li><li>Serving advertisements (Google AdSense — see sections 4 and 5)</li></ul>
<ul class="l-ja"><li>サービスの提供とパーソナライズ(選択した言語、コイン、通知設定の維持)</li><li>利用統計の分析によるサイト改善</li><li>バグ・エラーの把握、サーバー負荷への対応</li><li>コミュニティチャット機能の提供</li><li>広告配信(Google AdSense、下記4・5項参照)</li></ul>
<ul class="l-es"><li>Proporcionar y personalizar el servicio (mantener sus preferencias de idioma, moneda y alertas)</li><li>Analizar estadísticas de uso para mejorar el Sitio</li><li>Identificar errores y fallos, gestionar la carga del servidor</li><li>Habilitar la función de chat comunitario</li><li>Mostrar anuncios (Google AdSense — ver secciones 4 y 5)</li></ul>
<ul class="l-de"><li>Bereitstellung und Personalisierung des Dienstes (Beibehaltung Ihrer Sprach-, Coin- und Benachrichtigungseinstellungen)</li><li>Analyse von Nutzungsstatistiken zur Verbesserung der Website</li><li>Erkennung von Fehlern, Management der Serverlast</li><li>Bereitstellung der Community-Chat-Funktion</li><li>Anzeigenschaltung (Google AdSense — siehe Abschnitte 4 und 5)</li></ul>

<h2 id="s4"><span class="l-ko">4. 쿠키 및 추적 기술</span><span class="l-en">4. Cookies &amp; Tracking Technologies</span><span class="l-ja">4. Cookieと追跡技術</span><span class="l-es">4. Cookies y Tecnologías de Rastreo</span><span class="l-de">4. Cookies &amp; Tracking-Technologien</span></h2>
<p class="l-ko">본 사이트는 Google Analytics와 Google AdSense가 설정하는 쿠키를 사용합니다. 이 쿠키들은 방문 통계 수집과 관심사 기반 광고 제공을 위해 사용되며, 대부분의 브라우저에서 쿠키 설정을 통해 차단하거나 삭제할 수 있습니다. 다만 쿠키를 차단할 경우 사이트 일부 기능(언어 설정 유지 등)이 정상 작동하지 않을 수 있습니다.</p>
<p class="l-en">The Site uses cookies set by Google Analytics and Google AdSense. These cookies are used to collect visit statistics and serve interest-based advertising, and can be blocked or deleted through your browser's cookie settings in most browsers. Note that blocking cookies may prevent some Site features (such as retaining your language setting) from working correctly.</p>
<p class="l-ja">本サイトはGoogle AnalyticsとGoogle AdSenseが設定するCookieを使用します。これらのCookieは訪問統計の収集と興味関心に基づく広告の提供のために使用され、ほとんどのブラウザではCookie設定でブロックまたは削除できます。ただしCookieをブロックすると、サイトの一部機能(言語設定の保持など)が正常に動作しない場合があります。</p>
<p class="l-es">El Sitio utiliza cookies establecidas por Google Analytics y Google AdSense. Estas cookies se utilizan para recopilar estadísticas de visitas y mostrar publicidad basada en intereses, y pueden bloquearse o eliminarse a través de la configuración de cookies de su navegador en la mayoría de los navegadores. Tenga en cuenta que bloquear las cookies puede impedir que algunas funciones del Sitio (como mantener su configuración de idioma) funcionen correctamente.</p>
<p class="l-de">Die Website verwendet Cookies, die von Google Analytics und Google AdSense gesetzt werden. Diese Cookies dienen der Erfassung von Besuchsstatistiken und der interessenbasierten Werbeschaltung und können in den meisten Browsern über die Cookie-Einstellungen blockiert oder gelöscht werden. Bitte beachten Sie, dass das Blockieren von Cookies dazu führen kann, dass einige Website-Funktionen (wie die Beibehaltung Ihrer Spracheinstellung) nicht korrekt funktionieren.</p>

<h2 id="s5"><span class="l-ko">5. 제3자 서비스</span><span class="l-en">5. Third-Party Services</span><span class="l-ja">5. 第三者サービス</span><span class="l-es">5. Servicios de Terceros</span><span class="l-de">5. Drittanbieter-Dienste</span></h2>
<p class="l-ko">본 사이트는 서비스 운영을 위해 아래 제3자 서비스를 이용합니다. 각 서비스는 자체 개인정보처리방침에 따라 운영되며, 해당 방침은 본 사이트가 통제하지 않습니다.</p>
<p class="l-en">The Site relies on the following third-party services to operate. Each service is governed by its own privacy policy, which is not controlled by the Site.</p>
<p class="l-ja">本サイトはサービス運営のため、以下の第三者サービスを利用しています。各サービスはそれぞれ独自のプライバシーポリシーに基づいて運営されており、当該ポリシーは本サイトが管理するものではありません。</p>
<p class="l-es">El Sitio depende de los siguientes servicios de terceros para operar. Cada servicio se rige por su propia política de privacidad, que no está controlada por el Sitio.</p>
<p class="l-de">Die Website ist für den Betrieb auf die folgenden Drittanbieter-Dienste angewiesen. Jeder Dienst unterliegt seiner eigenen Datenschutzerklärung, die nicht von der Website kontrolliert wird.</p>
<table class="zt">
<tr>
<th><span class="l-ko">서비스</span><span class="l-en">Service</span><span class="l-ja">サービス</span><span class="l-es">Servicio</span><span class="l-de">Dienst</span></th>
<th><span class="l-ko">용도</span><span class="l-en">Purpose</span><span class="l-ja">用途</span><span class="l-es">Propósito</span><span class="l-de">Zweck</span></th>
</tr>
<tr><td>Google Analytics</td><td><span class="l-ko">방문 통계 분석</span><span class="l-en">Visit statistics analysis</span><span class="l-ja">訪問統計分析</span><span class="l-es">Análisis de estadísticas de visitas</span><span class="l-de">Analyse von Besuchsstatistiken</span></td></tr>
<tr><td>Google AdSense</td><td><span class="l-ko">광고 게재</span><span class="l-en">Advertisement serving</span><span class="l-ja">広告配信</span><span class="l-es">Publicación de anuncios</span><span class="l-de">Anzeigenschaltung</span></td></tr>
<tr><td>Google Firebase</td><td><span class="l-ko">실시간 커뮤니티 채팅</span><span class="l-en">Live community chat</span><span class="l-ja">リアルタイムコミュニティチャット</span><span class="l-es">Chat comunitario en vivo</span><span class="l-de">Live-Community-Chat</span></td></tr>
<tr><td>Binance / CoinGecko / Upbit API</td><td><span class="l-ko">공개 시세 데이터 조회 (개인정보 미전송)</span><span class="l-en">Fetching public market data (no personal data sent)</span><span class="l-ja">公開相場データの取得(個人情報は送信されません)</span><span class="l-es">Obtención de datos de mercado públicos (no se envían datos personales)</span><span class="l-de">Abruf öffentlicher Marktdaten (keine personenbezogenen Daten werden übertragen)</span></td></tr>
</table>
<p class="l-ko">Google이 제공하는 서비스에 대한 자세한 내용은 <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google 개인정보처리방침</a>을 참고해주세요.</p>
<p class="l-en">For details on Google's services, see the <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google Privacy Policy</a>.</p>
<p class="l-ja">Googleが提供するサービスの詳細については、<a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Googleプライバシーポリシー</a>をご参照ください。</p>
<p class="l-es">Para más detalles sobre los servicios de Google, consulte la <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Política de Privacidad de Google</a>.</p>
<p class="l-de">Details zu den Diensten von Google finden Sie in der <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google-Datenschutzerklärung</a>.</p>

<h2 id="s6"><span class="l-ko">6. 데이터 보관 기간</span><span class="l-en">6. Data Retention</span><span class="l-ja">6. データ保持期間</span><span class="l-es">6. Retención de Datos</span><span class="l-de">6. Datenspeicherung</span></h2>
<p class="l-ko">브라우저 로컬 저장소(localStorage)의 데이터는 사용자가 직접 브라우저 데이터를 삭제하기 전까지 사용자의 기기에 남아있으며, 본 사이트 서버에는 별도로 보관되지 않습니다. 커뮤니티 채팅 메시지는 Firebase에 일정 기간 보관된 후 순차적으로 정리되며, Google Analytics 데이터는 Google의 표준 보관 정책(통상 2개월~수년, 설정에 따라 상이)을 따릅니다.</p>
<p class="l-en">Data in browser local storage (localStorage) remains on your device until you clear your browser data yourself; it is not separately retained on the Site's servers. Community chat messages are kept in Firebase for a limited period before periodic cleanup. Google Analytics data follows Google's standard retention policy (typically 2 months to several years, depending on configuration).</p>
<p class="l-ja">ブラウザローカルストレージ(localStorage)のデータは、ユーザーが自らブラウザデータを削除するまでユーザーの端末に残り、本サイトのサーバーには別途保管されません。コミュニティチャットメッセージはFirebaseに一定期間保管された後、順次整理されます。Google Analyticsのデータは、Googleの標準保持ポリシー(通常2ヶ月〜数年、設定により異なる)に従います。</p>
<p class="l-es">Los datos en el almacenamiento local del navegador (localStorage) permanecen en su dispositivo hasta que usted mismo borre los datos de su navegador; no se conservan por separado en los servidores del Sitio. Los mensajes del chat comunitario se guardan en Firebase durante un período limitado antes de una limpieza periódica. Los datos de Google Analytics siguen la política de retención estándar de Google (generalmente de 2 meses a varios años, según la configuración).</p>
<p class="l-de">Daten im lokalen Browser-Speicher (localStorage) verbleiben auf Ihrem Gerät, bis Sie Ihre Browserdaten selbst löschen; sie werden nicht separat auf den Servern der Website gespeichert. Community-Chat-Nachrichten werden für einen begrenzten Zeitraum in Firebase aufbewahrt, bevor sie regelmäßig bereinigt werden. Google-Analytics-Daten folgen der Standard-Aufbewahrungsrichtlinie von Google (in der Regel 2 Monate bis mehrere Jahre, abhängig von der Konfiguration).</p>

<h2 id="s7"><span class="l-ko">7. 이용자의 권리</span><span class="l-en">7. Your Rights</span><span class="l-ja">7. 利用者の権利</span><span class="l-es">7. Sus Derechos</span><span class="l-de">7. Ihre Rechte</span></h2>
<p class="l-ko">거주 지역의 법률(예: EU GDPR, 캘리포니아 CCPA 등)에 따라 이용자는 자신에 관한 정보에 접근·정정·삭제를 요청하거나 처리에 반대할 권리를 가질 수 있습니다. 본 사이트는 개인 식별 정보를 서버에 보관하지 않으므로, 대부분의 권리 행사는 다음 방법으로 직접 가능합니다.</p>
<p class="l-en">Depending on the laws of your jurisdiction (e.g., EU GDPR, California CCPA), you may have rights to access, correct, or delete information about you, or to object to its processing. Since the Site does not store personally identifying information on its servers, most of these rights can be exercised directly through the following methods.</p>
<p class="l-ja">お住まいの地域の法律(例:EU一般データ保護規則(GDPR)、カリフォルニア州消費者プライバシー法(CCPA)など)により、利用者はご自身に関する情報へのアクセス・訂正・削除を要求したり、処理に異議を唱えたりする権利を有する場合があります。本サイトは個人識別情報をサーバーに保管しないため、これらの権利のほとんどは以下の方法で直接行使可能です。</p>
<p class="l-es">Según las leyes de su jurisdicción (por ejemplo, el RGPD de la UE, la CCPA de California), puede tener derechos para acceder, corregir o eliminar información sobre usted, u oponerse a su procesamiento. Dado que el Sitio no almacena información de identificación personal en sus servidores, la mayoría de estos derechos se pueden ejercer directamente mediante los siguientes métodos.</p>
<p class="l-de">Je nach den Gesetzen Ihres Rechtsgebiets (z. B. EU-DSGVO, kalifornisches CCPA) haben Sie möglicherweise das Recht, auf Informationen über Sie zuzugreifen, diese zu berichtigen oder zu löschen, oder der Verarbeitung zu widersprechen. Da die Website keine personenbezogenen Daten auf ihren Servern speichert, können die meisten dieser Rechte direkt über die folgenden Methoden ausgeübt werden.</p>
<ul class="l-ko"><li><b>브라우저 데이터 삭제</b> — 설정에서 사이트 데이터/쿠키를 지우면 localStorage에 저장된 모든 정보가 즉시 삭제됩니다.</li><li><b>광고 개인화 거부</b> — <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google 광고 설정</a>에서 관심 기반 광고를 비활성화할 수 있습니다.</li><li><b>Analytics 수집 거부</b> — <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics 차단 브라우저 확장 프로그램</a>을 설치할 수 있습니다.</li><li><b>채팅 메시지 삭제 요청</b> — 아래 12항의 연락처로 요청 시 확인 후 조치합니다.</li></ul>
<ul class="l-en"><li><b>Clear browser data</b> — Clearing site data/cookies in your browser settings immediately deletes everything stored in localStorage.</li><li><b>Opt out of ad personalization</b> — You can disable interest-based ads at <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google Ads Settings</a>.</li><li><b>Opt out of Analytics collection</b> — You can install the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</li><li><b>Request chat message deletion</b> — Contact us using the details in Section 12, and we'll review and act on the request.</li></ul>
<ul class="l-ja"><li><b>ブラウザデータの削除</b> — ブラウザ設定でサイトデータ・Cookieを削除すると、localStorageに保存されたすべての情報が即座に削除されます。</li><li><b>広告のパーソナライズ拒否</b> — <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google広告設定</a>で興味関心に基づく広告を無効にできます。</li><li><b>Analytics収集の拒否</b> — <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analyticsオプトアウトアドオン</a>をインストールできます。</li><li><b>チャットメッセージの削除依頼</b> — 下記12項の連絡先にご依頼いただければ、確認の上対応いたします。</li></ul>
<ul class="l-es"><li><b>Borrar datos del navegador</b> — Borrar los datos/cookies del sitio en la configuración de su navegador elimina inmediatamente todo lo almacenado en localStorage.</li><li><b>Rechazar la personalización de anuncios</b> — Puede desactivar los anuncios basados en intereses en <a href="https://adssettings.google.com" target="_blank" rel="noopener">Configuración de anuncios de Google</a>.</li><li><b>Rechazar la recopilación de Analytics</b> — Puede instalar el <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">complemento de exclusión de Google Analytics</a>.</li><li><b>Solicitar eliminación de mensajes de chat</b> — Contáctenos usando los datos de la Sección 12, y revisaremos y actuaremos sobre la solicitud.</li></ul>
<ul class="l-de"><li><b>Browserdaten löschen</b> — Das Löschen von Website-Daten/Cookies in Ihren Browsereinstellungen entfernt sofort alle in localStorage gespeicherten Informationen.</li><li><b>Anzeigenpersonalisierung ablehnen</b> — Sie können interessenbasierte Werbung in den <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google-Anzeigeneinstellungen</a> deaktivieren.</li><li><b>Analytics-Erfassung ablehnen</b> — Sie können das <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser-Add-on</a> installieren.</li><li><b>Löschung von Chat-Nachrichten beantragen</b> — Kontaktieren Sie uns über die Angaben in Abschnitt 12, und wir prüfen und bearbeiten die Anfrage.</li></ul>

<h2 id="s8"><span class="l-ko">8. 아동의 개인정보</span><span class="l-en">8. Children's Privacy</span><span class="l-ja">8. 児童のプライバシー</span><span class="l-es">8. Privacidad de Menores</span><span class="l-de">8. Datenschutz für Kinder</span></h2>
<p class="l-ko">본 사이트는 만 14세(또는 거주 지역 법률상 그에 상응하는 연령) 미만 아동을 대상으로 하지 않으며, 이들로부터 고의로 개인정보를 수집하지 않습니다. 아동이 본 사이트를 통해 개인정보를 제공한 사실을 알게 된 경우, 12항의 연락처로 알려주시면 즉시 삭제 조치하겠습니다.</p>
<p class="l-en">The Site is not directed at children under the age of 13 (or the equivalent minimum age under your local law) and we do not knowingly collect personal information from them. If you become aware that a child has provided personal information through the Site, please contact us using the details in Section 12 and we will delete it promptly.</p>
<p class="l-ja">本サイトは13歳未満(またはお住まいの地域の法律で定める同等の年齢)の児童を対象としておらず、これらの方から意図的に個人情報を収集することはありません。児童が本サイトを通じて個人情報を提供したことが判明した場合は、12項の連絡先までお知らせください。速やかに削除措置を行います。</p>
<p class="l-es">El Sitio no está dirigido a niños menores de 13 años (o la edad mínima equivalente según su ley local) y no recopilamos conscientemente información personal de ellos. Si toma conocimiento de que un menor ha proporcionado información personal a través del Sitio, contáctenos usando los datos de la Sección 12 y la eliminaremos de inmediato.</p>
<p class="l-de">Die Website richtet sich nicht an Kinder unter 13 Jahren (oder das entsprechende Mindestalter nach Ihrem lokalen Recht), und wir erfassen wissentlich keine personenbezogenen Daten von ihnen. Wenn Sie feststellen, dass ein Kind über die Website personenbezogene Daten bereitgestellt hat, kontaktieren Sie uns bitte über die Angaben in Abschnitt 12, und wir werden diese umgehend löschen.</p>

<h2 id="s9"><span class="l-ko">9. 국외 데이터 이전</span><span class="l-en">9. International Data Transfers</span><span class="l-ja">9. 国外データ移転</span><span class="l-es">9. Transferencias Internacionales de Datos</span><span class="l-de">9. Internationale Datenübertragung</span></h2>
<p class="l-ko">본 사이트가 이용하는 Google Analytics, Google AdSense, Firebase는 모두 미국에 본사를 둔 Google LLC가 운영하며, 데이터가 미국을 포함한 여러 국가의 서버에서 처리될 수 있습니다. 이러한 이전은 각 서비스의 표준 계약 조항 등 적용 가능한 법적 보호장치 하에 이루어집니다.</p>
<p class="l-en">Google Analytics, Google AdSense, and Firebase, all used by the Site, are operated by Google LLC, headquartered in the United States, and data may be processed on servers in multiple countries including the U.S. These transfers occur under applicable legal safeguards such as each service's standard contractual clauses.</p>
<p class="l-ja">本サイトが利用するGoogle Analytics、Google AdSense、Firebaseはいずれも米国に本社を置くGoogle LLCが運営しており、データは米国を含む複数の国のサーバーで処理される場合があります。これらの移転は、各サービスの標準契約条項など、適用される法的保護措置の下で行われます。</p>
<p class="l-es">Google Analytics, Google AdSense y Firebase, todos utilizados por el Sitio, son operados por Google LLC, con sede en Estados Unidos, y los datos pueden procesarse en servidores de múltiples países, incluido EE. UU. Estas transferencias se realizan bajo las salvaguardas legales aplicables, como las cláusulas contractuales estándar de cada servicio.</p>
<p class="l-de">Google Analytics, Google AdSense und Firebase, die alle von der Website genutzt werden, werden von der in den USA ansässigen Google LLC betrieben, und Daten können auf Servern in mehreren Ländern, einschließlich der USA, verarbeitet werden. Diese Übertragungen erfolgen im Rahmen geltender rechtlicher Schutzmaßnahmen wie den Standardvertragsklauseln der jeweiligen Dienste.</p>

<h2 id="s10"><span class="l-ko">10. 보안</span><span class="l-en">10. Security</span><span class="l-ja">10. セキュリティ</span><span class="l-es">10. Seguridad</span><span class="l-de">10. Sicherheit</span></h2>
<p class="l-ko">본 사이트는 HTTPS 암호화 통신을 사용하며, 신뢰할 수 있는 제3자 인프라(Google Firebase 등)를 통해 데이터를 처리합니다. 다만 인터넷을 통한 전송이나 전자적 저장 방식 어느 것도 100% 안전을 보장할 수는 없다는 점을 안내드립니다.</p>
<p class="l-en">The Site uses HTTPS encrypted communication and processes data through trusted third-party infrastructure (such as Google Firebase). That said, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
<p class="l-ja">本サイトはHTTPS暗号化通信を使用し、信頼できる第三者インフラ(Google Firebaseなど)を通じてデータを処理します。ただし、インターネットを介した伝送や電子的な保存方法のいずれも100%の安全性を保証できるものではないことをご了承ください。</p>
<p class="l-es">El Sitio utiliza comunicación encriptada HTTPS y procesa datos a través de infraestructura de terceros confiable (como Google Firebase). Dicho esto, ningún método de transmisión por internet o almacenamiento electrónico es 100% seguro, y no podemos garantizar una seguridad absoluta.</p>
<p class="l-de">Die Website nutzt HTTPS-verschlüsselte Kommunikation und verarbeitet Daten über vertrauenswürdige Drittanbieter-Infrastruktur (wie Google Firebase). Dennoch ist keine Methode der Übertragung über das Internet oder der elektronischen Speicherung zu 100% sicher, und wir können keine absolute Sicherheit garantieren.</p>

<h2 id="s11"><span class="l-ko">11. 정책 변경</span><span class="l-en">11. Changes to This Policy</span><span class="l-ja">11. ポリシーの変更</span><span class="l-es">11. Cambios en esta Política</span><span class="l-de">11. Änderungen dieser Richtlinie</span></h2>
<p class="l-ko">본 방침은 서비스 변경이나 법률 개정에 따라 수정될 수 있습니다. 중요한 변경이 있을 경우 이 페이지 상단의 "최종 수정일"을 갱신하며, 필요시 사이트 내 공지를 통해 안내합니다. 정기적으로 본 페이지를 확인하시길 권장합니다.</p>
<p class="l-en">This policy may be updated to reflect changes to the Site or applicable law. When material changes occur, we will update the "Last updated" date at the top of this page and, where appropriate, provide notice through the Site. We recommend checking this page periodically.</p>
<p class="l-ja">本方針は、サービスの変更や法改正に伴い修正される場合があります。重要な変更がある場合は、本ページ上部の「最終更新日」を更新し、必要に応じてサイト内でお知らせします。定期的に本ページをご確認いただくことをお勧めします。</p>
<p class="l-es">Esta política puede actualizarse para reflejar cambios en el Sitio o en la legislación aplicable. Cuando se produzcan cambios importantes, actualizaremos la fecha de "Última actualización" en la parte superior de esta página y, cuando corresponda, proporcionaremos un aviso a través del Sitio. Recomendamos revisar esta página periódicamente.</p>
<p class="l-de">Diese Richtlinie kann aktualisiert werden, um Änderungen an der Website oder geltendem Recht widerzuspiegeln. Bei wesentlichen Änderungen aktualisieren wir das Datum "Zuletzt aktualisiert" oben auf dieser Seite und geben gegebenenfalls einen Hinweis über die Website. Wir empfehlen, diese Seite regelmäßig zu überprüfen.</p>

<h2 id="s12"><span class="l-ko">12. 문의</span><span class="l-en">12. Contact</span><span class="l-ja">12. お問い合わせ</span><span class="l-es">12. Contacto</span><span class="l-de">12. Kontakt</span></h2>
<p class="l-ko">본 방침이나 개인정보 처리와 관련해 문의사항이 있으시면 아래 이메일로 연락해 주세요.<br><a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a></p>
<p class="l-en">If you have questions about this policy or how your information is handled, please contact us at the email below.<br><a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a></p>
<p class="l-ja">本方針や個人情報の取り扱いに関してご質問がある場合は、以下のメールアドレスまでご連絡ください。<br><a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a></p>
<p class="l-es">Si tiene preguntas sobre esta política o cómo se maneja su información, contáctenos en el correo electrónico a continuación.<br><a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a></p>
<p class="l-de">Wenn Sie Fragen zu dieser Richtlinie oder zur Verarbeitung Ihrer Daten haben, kontaktieren Sie uns bitte unter der folgenden E-Mail-Adresse.<br><a href="mailto:jpjihoon@gmail.com">jpjihoon@gmail.com</a></p>
  <div class="pagefoot" style="margin-top:56px;padding-top:24px;border-top:1px solid var(--b1);font-size:12.5px;color:var(--t3);display:flex;gap:18px;flex-wrap:wrap">
    <a href="/" style="color:var(--t3);text-decoration:underline"><span class="l-ko">← 메인으로</span><span class="l-en">← Back to Home</span><span class="l-ja">← ホームへ戻る</span><span class="l-es">← Volver al Inicio</span><span class="l-de">← Zurück zur Startseite</span></a>
    <a href="/terms" style="color:var(--t3);text-decoration:underline"><span class="l-ko">이용약관</span><span class="l-en">Terms of Service</span><span class="l-ja">利用規約</span><span class="l-es">Términos de Servicio</span><span class="l-de">Nutzungsbedingungen</span></a>
  </div>
</div>

<?php require __DIR__ . '/_guide_foot.php';
