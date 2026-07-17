<?php
/* ══════════════════════════════════════════════════════════════
   공용 설정 모달 (⚙️) — 전 페이지 공통 [단일 소스]
   _shared_footer.php 가 include 하므로 대시보드·블로그·용어사전·안내페이지
   어디서든 그 페이지에서 바로 열린다(대시보드로 이동하지 않는다).

   원래 대시보드 index.php 안에만 있던 모달 HTML·CSS·위젯 JS 전부를 이 파일로 옮겼다.
   대시보드는 이제 이 파일을 통해서만 설정 모달을 갖는다(중복 정의 없음).

   · CSS: 페이지마다 CSS 변수가 미묘하게 다른 문제를 없애려고 #notifModal 스코프에
     자체 변수를 고정값으로 정의한다 → 어느 페이지에서 열어도 모양이 같다.
   · 알람 탭 문구: 원래 data-i(app.js applyStaticI18n) 의존이었으나, app.js가 없는
     페이지에서는 영어로 남는다. lang.js(134KB)를 전 페이지에 얹으면 트래픽이 늘어나므로
     필요한 11개 문구(9언어)만 아래 SM_ALERT_I18N 으로 가져왔다.
   · openModal/closeModal/toggleAlert/알람저장 등은 대시보드에선 app.js가 정의한다.
     app.js가 없는 페이지를 위해 아래에 '정의돼 있지 않을 때만' 쓰는 폴백을 둔다.
     (localStorage 키 'alertSettings' 는 app.js와 동일 → 설정이 페이지 간 그대로 유지)
   ══════════════════════════════════════════════════════════════ */
?>
<style>
/* ── 설정 모달: 자체 변수 스코프(페이지별 변수 차이로 모양이 달라지지 않게 고정) ── */
#notifModal{--sm-bg2:#141418;--sm-bg3:#1b1b21;--sm-bg4:#24242b;
  --sm-b1:rgba(255,255,255,.07);--sm-b2:rgba(255,255,255,.12);
  --sm-t1:#f2f2f5;--sm-t2:#9a9aa4;--sm-t3:#63636d;
  --sm-green:#22c55e;--sm-or:#f7931a;--sm-rad-lg:16px;--sm-rad-sm:8px}
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:500;display:none;align-items:center;justify-content:center}
.modal-bg.open{display:flex}
.modal{background:var(--sm-bg2);border:1px solid var(--sm-b2);border-radius:var(--sm-rad-lg);padding:20px;width:min(360px,90vw);display:flex;flex-direction:column;gap:12px;color:var(--sm-t1);font-size:13px}
.modal-hd{font-size:14px;font-weight:600;display:flex;justify-content:space-between;align-items:center;color:var(--sm-t1)}
.modal-close{cursor:pointer;color:var(--sm-t2);font-size:18px;line-height:1}
.stab-row{display:flex;gap:8px;margin-bottom:14px}
.stab-desc{font-size:10px;color:var(--sm-t3);margin-bottom:10px;line-height:1.5}
.toggle{width:36px;height:20px;border-radius:10px;background:var(--sm-bg4);border:1px solid var(--sm-b2);cursor:pointer;position:relative;transition:background .2s;flex-shrink:0}
.toggle.on{background:var(--sm-green)}
.toggle::after{content:'';position:absolute;top:2px;left:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:transform .2s}
.toggle.on::after{transform:translateX(16px)}
.alert-row{display:flex;justify-content:space-between;align-items:center;padding:12px 4px;border-bottom:1px solid var(--sm-b1);font-size:12.5px;line-height:1.4;gap:10px}
.alert-row:last-child{border-bottom:none}
.alert-label{color:var(--sm-t2)}
.sset-label{font-size:10px;font-weight:600;color:var(--sm-t2);margin:10px 0 6px}
.wg-coin-grid{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:4px}
.wg-preview-wrap{margin-bottom:4px;border-radius:10px;overflow:hidden}
.wg-code-wrap{position:relative}
.wg-copy-btn{position:absolute;right:6px;top:6px;padding:3px 9px;border-radius:6px;background:var(--sm-bg4);border:1px solid var(--sm-b1);color:var(--sm-t1);font-size:10px;cursor:pointer}
.wg-copy-btn:hover{background:var(--sm-or);color:#000;border-color:var(--sm-or)}
/* 모달 내부는 페이지 변수에 기대지 않도록 매핑 (원본 인라인 style의 var(--xx) 대응) */
#notifModal .modal{--bg2:var(--sm-bg2);--bg3:var(--sm-bg3);--bg4:var(--sm-bg4);--b1:var(--sm-b1);--b2:var(--sm-b2);--t1:var(--sm-t1);--t2:var(--sm-t2);--t3:var(--sm-t3);--green:var(--sm-green);--or:var(--sm-or);--rad-sm:var(--sm-rad-sm);--rad-lg:var(--sm-rad-lg)}
</style>
<div class="modal-bg" id="notifModal" onclick="if(event.target===this)closeModal()">
  <div class="modal" style="max-height:92vh;min-height:min(680px,88vh);overflow-y:auto;width:min(560px,96vw)">
    <div class="modal-hd">
      ⚙️ <span id="smTxt_title">Settings</span>
      <span class="modal-close" onclick="closeModal()">×</span>
    </div>

    <!-- 탭 버튼 -->
    <div class="stab-row">
      <button id="stab_widget" onclick="switchTab('widget')" style="flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center">📋 Widget</button>
      <button id="stab_alert" onclick="switchTab('alert')" style="flex:1;padding:10px;border-radius:8px;border:1px solid var(--b2);background:var(--bg3);color:var(--t1);font-size:12.5px;cursor:pointer;font-weight:600;text-align:center">🔔 Alerts</button>
    </div>

    <!-- 위젯 탭 -->
    <div id="tab_widget">
      <!-- 위젯 ON/OFF -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:2px 0 10px;border-bottom:1px solid var(--b1);margin-bottom:12px">
        <div>
          <div id="wgTxt_title" style="font-size:13px;font-weight:700;color:var(--t1)">Widget</div>
          <div id="wgTxt_desc" style="font-size:10px;color:var(--t3);margin-top:1px">Use it yourself as a floating panel, or embed it on your site.</div>
        </div>
        <div class="toggle on" id="wgEnableToggle" onclick="toggleWgEnable(this)" role="switch" tabindex="0"
          aria-label="Enable widget" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleWgEnable(this);}"></div>
      </div>

      <div id="wgBody">
        <!-- 코인 선택 + 검색 -->
        <div class="sset-label" id="wgTxt_coins">My coins (favorites)</div>
        <div style="position:relative;margin-bottom:8px">
          <input type="text" id="wgCoinSearch" id="wgCoinSearch" placeholder="🔍 Search to add a coin (ETH, SOL, PEPE…)" data-ph="1" autocomplete="off"
            style="width:100%;padding:7px 10px;background:var(--bg3);border:1px solid var(--b1);border-radius:8px;color:var(--t1);font-size:12px;outline:none"
            oninput="filterWgCoins(this.value)" onfocus="filterWgCoins(this.value)">
          <div id="wgSearchResults" style="display:none;position:absolute;top:100%;left:0;right:0;margin-top:4px;background:var(--bg2);border:1px solid var(--b2);border-radius:8px;max-height:180px;overflow-y:auto;z-index:10;box-shadow:0 8px 24px rgba(0,0,0,.5)"></div>
        </div>
        <div class="wg-coin-grid" id="wgCoinGrid"></div>
        <div style="font-size:10px;color:var(--t3);margin-top:5px" id="wgSelCount"></div>

        <!-- 블로그 표시 -->
        <div class="sset-label" id="wgTxt_options">Options</div>
        <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 0">
          <span id="wgTxt_blog" style="font-size:11.5px;color:var(--t2)">Show latest blog posts (5)</span>
          <div class="toggle" id="wgBlogToggle" onclick="toggleWgBlog(this)" role="switch" tabindex="0"
            aria-label="Show blog" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleWgBlog(this);}"></div>
        </div>

        <!-- 미리보기 -->
        <div class="sset-label" id="wgTxt_preview">Preview</div>
        <div class="wg-preview-wrap">
          <iframe id="wgPreviewFrame"
            src="" frameborder="0" scrolling="no"
            style="width:320px;max-width:100%;height:260px;border-radius:12px;border:1px solid var(--b1);background:var(--bg3);display:block;margin:0 auto">
          </iframe>
        </div>

        <!-- 플로팅 위젯 (사이트 위 상주) -->
        <button onclick="btcLaunchFloating()" style="width:100%;margin-top:10px;background:rgba(247,147,26,.14);border:1px solid rgba(247,147,26,.5);border-radius:8px;padding:11px;font-size:12.5px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:7px">
          <span style="font-size:15px">📌</span><span id="wgTxt_pin" style="color:#f7931a;font-weight:700">Pin widget on screen</span>
        </button>
        <div style="font-size:9.5px;color:var(--t3);text-align:center;margin-top:5px;line-height:1.4">
          <span id="wgTxt_pinHint">Keeps a small live widget floating on this page — drag it anywhere.</span>
        </div>

        <!-- 앱으로 설치 (PWA) -->
        <button id="wgInstallBtn" onclick="installBtcApp()" style="width:100%;margin-top:8px;background:var(--bg3);border:1px solid var(--b2);color:var(--t1);border-radius:8px;padding:10px;font-size:12px;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:7px">
          <span>💻</span> <span id="wgTxt_install">Install widget as an app</span>
        </button>
        <div style="font-size:9.5px;color:var(--t3);text-align:center;margin-top:5px;line-height:1.4">
          <span id="wgTxt_installHint">Installs the widget as a standalone app window.</span>
        </div>



        <!-- 코드 복사 -->
        <div class="sset-label" id="wgTxt_code">Embed code (for your website)</div>
        <div class="wg-code-wrap">
          <textarea id="wgCodeBox" readonly rows="3" style="width:100%;background:var(--bg3);border:1px solid var(--b1);border-radius:8px;color:var(--t2);font-size:11px;padding:8px;resize:none;font-family:monospace;line-height:1.5"></textarea>
          <button class="wg-copy-btn" onclick="copyWidgetCode()" id="wgCopyBtn">
            <span id="wgTxt_copy">Copy</span>
          </button>
        </div>
      </div>
    </div>

    <!-- 알람 탭 -->
    <div id="tab_alert" style="display:none">
      <div class="stab-desc" id="smTxt_alertDesc">Get a browser notification when the score crosses these thresholds.</div>
      <div style="font-size:11px;font-weight:700;color:var(--or);margin:14px 0 8px" id="smTxt_buySec">📈 LONG TRIGGERS</div>
      <div class="alert-row"><span class="alert-label" id="smTxt_a2">Long Score ≥ 6.0 (Split Long)</span><div class="toggle on" id="a2" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" id="smTxt_a3">Long Score ≥ 7.0 (Add Long)</span><div class="toggle on" id="a3" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" id="smTxt_a4">Long Score ≥ 8.0 (Full Long)</span><div class="toggle on" id="a4" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div style="font-size:11px;font-weight:700;color:var(--or);margin:18px 0 8px" id="smTxt_sellSec">📉 SHORT TRIGGERS</div>
      <div class="alert-row"><span class="alert-label" id="smTxt_b1">Short Score ≥ 6.0 (Prepare Short)</span><div class="toggle" id="b1" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" id="smTxt_b2">Short Score ≥ 7.0 (Add Short)</span><div class="toggle" id="b2" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <div class="alert-row"><span class="alert-label" id="smTxt_b3">Short Score ≥ 8.0 (Full Short)</span><div class="toggle" id="b3" onclick="toggleAlert(this)" role="switch" tabindex="0" aria-label="Toggle alert" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleAlert(this);}"></div></div>
      <button onclick="requestNotif()" style="background:var(--green);color:#000;border:none;border-radius:var(--rad-sm);padding:9px;font-size:12px;font-weight:600;cursor:pointer;width:100%;margin-top:14px">
        <span id="smTxt_enableNotif">Enable Browser Notifications</span>
      </button>
      <div id="notifStatus" style="font-size:10px;color:var(--t3);text-align:center;margin-top:6px"></div>
    </div>
  </div>
</div>
<script>
const SM_ALERT_I18N = {
 "ko": {
  "alertDesc": "조건 충족 시 브라우저 알림 + 화면 깜빡임 + 알림음으로 알려드립니다.",
  "alertBuySection": "📈 롱 트리거",
  "alertSellSection": "📉 숏 트리거",
  "a2": "롱 점수 ≥ 6.0 (분할 시작)",
  "a3": "롱 점수 ≥ 7.0 (비중 확대)",
  "a4": "롱 점수 ≥ 8.0 (적극 매집)",
  "b1": "숏 점수 ≥ 6.0 (숏 준비)",
  "b2": "숏 점수 ≥ 7.0 (숏 비중 확대)",
  "b3": "숏 점수 ≥ 8.0 (풀 숏)",
  "enableNotif": "브라우저 알림 허용",
  "alertTitle": "알림 설정"
 },
 "en": {
  "alertDesc": "Get notified via browser push notification + visual flash + sound when conditions are met.",
  "alertBuySection": "📈 LONG TRIGGERS",
  "alertSellSection": "📉 SHORT TRIGGERS",
  "a2": "Long Score ≥ 6.0 (Start splitting)",
  "a3": "Long Score ≥ 7.0 (Increase position)",
  "a4": "Long Score ≥ 8.0 (Aggressive buy)",
  "b1": "Short Score ≥ 6.0 (Prepare short)",
  "b2": "Short Score ≥ 7.0 (Increase short)",
  "b3": "Short Score ≥ 8.0 (Full short)",
  "enableNotif": "Enable Browser Notifications",
  "alertTitle": "Alert Settings"
 },
 "ja": {
  "alertDesc": "条件達成時にブラウザプッシュ通知 + 画面フラッシュ + サウンドでお知らせします。",
  "alertBuySection": "📈 ロング トリガー",
  "alertSellSection": "📉 ショート トリガー",
  "a2": "ロングスコア ≥ 6.0 (分割開始)",
  "a3": "ロングスコア ≥ 7.0 (ポジション拡大)",
  "a4": "ロングスコア ≥ 8.0 (積極買い)",
  "b1": "ショートスコア ≥ 6.0 (ショート準備)",
  "b2": "ショートスコア ≥ 7.0 (ショート拡大)",
  "b3": "ショートスコア ≥ 8.0 (フルショート)",
  "enableNotif": "ブラウザ通知を有効化",
  "alertTitle": "アラート設定"
 },
 "es": {
  "alertDesc": "Recibe notificaciones vía push del navegador + destello visual + sonido cuando se cumplan las condiciones.",
  "alertBuySection": "📈 DISPARADORES LARGO",
  "alertSellSection": "📉 DISPARADORES CORTO",
  "a2": "Puntuación Largo ≥ 6.0 (Iniciar escalonado)",
  "a3": "Puntuación Largo ≥ 7.0 (Aumentar posición)",
  "a4": "Puntuación Largo ≥ 8.0 (Compra agresiva)",
  "b1": "Puntuación Corto ≥ 6.0 (Preparar corto)",
  "b2": "Puntuación Corto ≥ 7.0 (Aumentar corto)",
  "b3": "Puntuación Corto ≥ 8.0 (Corto total)",
  "enableNotif": "Activar Notificaciones del Navegador",
  "alertTitle": "Configuración de Alertas"
 },
 "de": {
  "alertDesc": "Erhalte Benachrichtigungen per Browser-Push + visuellem Blitz + Ton, wenn Bedingungen erfüllt sind.",
  "alertBuySection": "📈 LONG-TRIGGER",
  "alertSellSection": "📉 SHORT-TRIGGER",
  "a2": "Long-Score ≥ 6,0 (Staffelung starten)",
  "a3": "Long-Score ≥ 7,0 (Position erhöhen)",
  "a4": "Long-Score ≥ 8,0 (Aggressiver Kauf)",
  "b1": "Short-Score ≥ 6,0 (Short vorbereiten)",
  "b2": "Short-Score ≥ 7,0 (Short erhöhen)",
  "b3": "Short-Score ≥ 8,0 (Vollständiger Short)",
  "enableNotif": "Browser-Benachrichtigungen aktivieren",
  "alertTitle": "Alarm-Einstellungen"
 },
 "fr": {
  "alertDesc": "Recevez des notifications par push du navigateur + flash visuel + son lorsque les conditions sont remplies.",
  "alertBuySection": "📈 DÉCLENCHEURS LONG",
  "alertSellSection": "📉 DÉCLENCHEURS SHORT",
  "a2": "Score Long ≥ 6.0 (Démarrer l'échelonnement)",
  "a3": "Score Long ≥ 7.0 (Augmenter la position)",
  "a4": "Score Long ≥ 8.0 (Achat agressif)",
  "b1": "Score Short ≥ 6.0 (Préparer le short)",
  "b2": "Score Short ≥ 7.0 (Augmenter le short)",
  "b3": "Score Short ≥ 8.0 (Short total)",
  "enableNotif": "Activer les Notifications du Navigateur",
  "alertTitle": "Paramètres d'Alerte"
 },
 "pt": {
  "alertDesc": "Receba notificações via push do navegador + flash visual + som quando as condições forem atendidas.",
  "alertBuySection": "📈 GATILHOS LONG",
  "alertSellSection": "📉 GATILHOS SHORT",
  "a2": "Pontuação Long ≥ 6.0 (Iniciar escalonado)",
  "a3": "Pontuação Long ≥ 7.0 (Aumentar posição)",
  "a4": "Pontuação Long ≥ 8.0 (Compra agressiva)",
  "b1": "Pontuação Short ≥ 6.0 (Preparar short)",
  "b2": "Pontuação Short ≥ 7.0 (Aumentar short)",
  "b3": "Pontuação Short ≥ 8.0 (Short total)",
  "enableNotif": "Ativar Notificações do Navegador",
  "alertTitle": "Configuração de Alertas"
 },
 "tr": {
  "alertDesc": "Koşullar sağlandığında tarayıcı push bildirimi + görsel flaş + ses ile bildirim alın.",
  "alertBuySection": "📈 LONG TETİKLEYİCİLERİ",
  "alertSellSection": "📉 SHORT TETİKLEYİCİLERİ",
  "a2": "Long Puanı ≥ 6.0 (Kademeli başlat)",
  "a3": "Long Puanı ≥ 7.0 (Pozisyon artır)",
  "a4": "Long Puanı ≥ 8.0 (Agresif alım)",
  "b1": "Short Puanı ≥ 6.0 (Short hazırla)",
  "b2": "Short Puanı ≥ 7.0 (Short artır)",
  "b3": "Short Puanı ≥ 8.0 (Tam short)",
  "enableNotif": "Tarayıcı Bildirimlerini Etkinleştir",
  "alertTitle": "Uyarı Ayarları"
 },
 "vi": {
  "alertDesc": "Nhận thông báo qua push trình duyệt + nhấp nháy hình ảnh + âm thanh khi điều kiện được đáp ứng.",
  "alertBuySection": "📈 KÍCH HOẠT LONG",
  "alertSellSection": "📉 KÍCH HOẠT SHORT",
  "a2": "Điểm Long ≥ 6.0 (Bắt đầu từng phần)",
  "a3": "Điểm Long ≥ 7.0 (Tăng vị thế)",
  "a4": "Điểm Long ≥ 8.0 (Mua mạnh)",
  "b1": "Điểm Short ≥ 6.0 (Chuẩn bị short)",
  "b2": "Điểm Short ≥ 7.0 (Tăng short)",
  "b3": "Điểm Short ≥ 8.0 (Short toàn phần)",
  "enableNotif": "Bật Thông báo Trình duyệt",
  "alertTitle": "Cài đặt Cảnh báo"
 }
};

/* ── app.js 가 없는 페이지(블로그·용어사전·안내페이지)용 폴백 ──
   대시보드에서는 app.js가 같은 이름으로 나중에 정의하므로 app.js 쪽이 그대로 쓰인다.
   localStorage 키는 app.js와 동일한 'alertSettings' → 어느 페이지에서 바꿔도 설정이 이어진다. */
var SM_ALERT_IDS = ['a2','a3','a4','b1','b2','b3'];
if (typeof window.openModal !== 'function') {
  window.openModal = function(){ var m=document.getElementById('notifModal'); if(m) m.classList.add('open'); };
}
if (typeof window.closeModal !== 'function') {
  window.closeModal = function(){ var m=document.getElementById('notifModal'); if(m) m.classList.remove('open'); };
}
if (typeof window.saveAlertSettings !== 'function') {
  window.saveAlertSettings = function(){
    var st={}; SM_ALERT_IDS.forEach(function(id){ var e=document.getElementById(id); if(e) st[id]=e.classList.contains('on'); });
    try { localStorage.setItem('alertSettings', JSON.stringify(st)); } catch(e){}
  };
}
if (typeof window.loadAlertSettings !== 'function') {
  window.loadAlertSettings = function(){
    try {
      var raw = localStorage.getItem('alertSettings'); if(!raw) return;
      var st = JSON.parse(raw);
      SM_ALERT_IDS.forEach(function(id){ if(!(id in st)) return; var e=document.getElementById(id); if(e) e.classList.toggle('on', !!st[id]); });
    } catch(e){}
  };
}
if (typeof window.toggleAlert !== 'function') {
  window.toggleAlert = function(el){ el.classList.toggle('on'); window.saveAlertSettings(); };
}
if (typeof window.requestNotif !== 'function') {
  window.requestNotif = function(){
    var st = document.getElementById('notifStatus');
    var L = (SM_ALERT_I18N[getWidgetLang()] || SM_ALERT_I18N.en);
    if(!('Notification' in window)){ if(st) st.textContent = L.notifUnsupported || 'This browser does not support notifications.'; return; }
    Notification.requestPermission().then(function(p){
      if(!st) return;
      st.textContent = (p === 'granted') ? (L.notifOn || 'Notifications enabled.') : (L.notifOff || 'Notifications blocked.');
    });
  };
}
/* 알람 탭 문구를 현재 언어로 적용 (app.js applyStaticI18n 이 없는 페이지 대응) */
function smApplyAlertI18n(){
  var L = SM_ALERT_I18N[getWidgetLang()] || SM_ALERT_I18N.en; if(!L) return;
  var map = {smTxt_title:'alertTitle', smTxt_alertDesc:'alertDesc', smTxt_buySec:'alertBuySection',
             smTxt_sellSec:'alertSellSection', smTxt_a2:'a2', smTxt_a3:'a3', smTxt_a4:'a4',
             smTxt_b1:'b1', smTxt_b2:'b2', smTxt_b3:'b3', smTxt_enableNotif:'enableNotif'};
  for (var id in map){ var e=document.getElementById(id); if(e && L[map[id]]) e.textContent = L[map[id]]; }
}

// 위젯 설정은 데스크톱 브라우저 전용. 모바일·앱에서는 설정 버튼은 유지하되(알람 필요)
// '위젯 탭'만 숨기고 알람 탭만 보이게 한다.
function btcIsMobileOrApp(){
  var mobile = /Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent);
  var standalone = (window.matchMedia && window.matchMedia('(display-mode: standalone)').matches) || navigator.standalone === true;
  var inApp = document.referrer && document.referrer.indexOf('android-app://') === 0;
  var narrow = window.innerWidth < 768;
  return mobile || standalone || inApp || narrow;
}
(function(){
  function apply(){
    var wtab = document.getElementById('stab_widget');
    var tabRow = wtab ? wtab.parentNode : null;
    if(btcIsMobileOrApp()){
      if(wtab) wtab.style.display = 'none';
      if(tabRow) tabRow.style.display = 'none';
    } else {
      if(wtab) wtab.style.display = '';
      if(tabRow) tabRow.style.display = '';
    }
  }
  if(document.readyState !== 'loading') apply();
  else document.addEventListener('DOMContentLoaded', apply);
  window.addEventListener('resize', apply);
  window._btcApplyTabVisibility = apply;
})();

// PWA: 서비스 워커는 위젯 페이지(/widget.php)에서만 등록한다("위젯만 앱" 기획).
// 대시보드에서 사이트 전체(scope:/)로 등록하면 모든 페이지를 가로채 옛 캐시를 서빙 →
// ?lang= 잔존·글 캐시 확인 불가·배포 반영 안 됨 등의 문제가 생김. 그래서 여기선 등록하지 않고,
// 과거에 잘못 등록된 '사이트 전체(scope:/)' SW가 남아있으면 제거한다(위젯 scope는 유지).
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.getRegistrations().then(function(regs){
    regs.forEach(function(r){
      try { if (new URL(r.scope).pathname === '/') r.unregister(); } catch(e){}
    });
  }).catch(function(){});
  // 잘못된 SW가 캐시해둔 옛 자원도 정리
  if (window.caches && caches.keys) {
    caches.keys().then(function(keys){ keys.forEach(function(k){ caches.delete(k); }); }).catch(function(){});
  }
}
// 앱 설치 프롬프트 캡처 (버튼 누를 때 사용)
let btcInstallPrompt = null;
window.addEventListener('beforeinstallprompt', function(e){
  e.preventDefault();
  btcInstallPrompt = e;
  // (위젯 설치 버튼 제거됨)
});
window.addEventListener('appinstalled', function(){ btcInstallPrompt = null; });
// ── 설정 모달 탭 전환 ────────────────────────────────
// 위젯만 별도 작은 창으로 띄우기 (홈페이지 전체가 아니라 위젯 페이지만)
function openWidgetWindow(){
  // pwa=1: 위젯이 전용 manifest로 로드 → 그 창의 브라우저 메뉴에서 "앱 설치" 시 위젯만 독립 앱으로 뜸
  const url = buildWidgetUrl() + '&pwa=1';
  const w = 340;
  const h = Math.min(widgetHeight() + 40, 640);
  const left = (screen.availWidth - w - 40);
  const top = 80;
  const features = 'popup=yes,width='+w+',height='+h+',left='+left+',top='+top+',resizable=yes,scrollbars=yes';
  const win = window.open(url, 'btctimingWidgetWindow', features);
  if(win){ win.focus(); }
  else { alert(getWidgetLang()==='ko' ? '팝업이 차단되었습니다. 팝업 허용 후 다시 시도해주세요.' : 'Popup blocked. Please allow popups and try again.'); }
}

function installBtcApp(){
  const url = buildWidgetUrl() + '&pwa=1';
  const isKo = getWidgetLang() === 'ko';
  window.open(url, '_blank');
  alert(isKo
    ? '새 탭에서 위젯 페이지가 열렸습니다.\n\n그 탭으로 이동해서 상단의 "💻 앱으로 설치" 버튼을 누르세요.\n그러면 이 위젯만 독립 앱 창으로 설치됩니다.\n\n(지금 이 홈 화면에서 설치하면 사이트 전체가 앱이 되니, 꼭 새로 열린 위젯 탭에서 설치하세요.)'
    : 'The widget page opened in a new tab.\n\nGo to that tab and click the "Install app" button at the top.\nThat installs ONLY the widget as a standalone app.');
}

function showInstallGuide(mode){
  const lang = getWidgetLang();
  const isKo = lang === 'ko';
  const ua = navigator.userAgent;
  const isEdge = /Edg/.test(ua), isChrome = /Chrome/.test(ua) && !isEdge;
  const isSafari = /Safari/.test(ua) && !/Chrome/.test(ua);
  let steps;
  if(mode === 'widget'){
    steps = isKo
      ? '<b>위젯이 새 탭에서 열렸습니다.</b><br><br>'
        + '그 탭에서 아래처럼 설치하면 <b>위젯만</b> 독립 앱 창으로 뜹니다 (홈페이지 전체가 아니라):<br><br>'
        + '1. 새로 열린 위젯 탭으로 이동<br>'
        + '2. 주소창 오른쪽의 <b>설치 아이콘(⊕)</b> 클릭<br>'
        + '&nbsp;&nbsp;&nbsp;(또는 <b>⋮ 메뉴 → 앱 → 이 페이지를 앱으로 설치</b>)<br>'
        + '3. 설치하면 바탕화면에 <b>BTC Widget</b> 아이콘 생성<br>'
        + '4. 클릭하면 위젯만 독립 창으로 실행 🎉'
      : '<b>The widget opened in a new tab.</b><br><br>'
        + 'Install it from that tab and <b>only the widget</b> runs as a standalone app (not the whole site):<br><br>'
        + '1. Go to the new widget tab<br>'
        + '2. Click the <b>install icon</b> in the address bar<br>'
        + '&nbsp;&nbsp;&nbsp;(or <b>menu -> Apps -> Install this page as an app</b>)<br>'
        + '3. A <b>BTC Widget</b> icon appears on your desktop<br>'
        + '4. Click it to run just the widget 🎉';
  } else if(mode === 'already'){
    steps = isKo ? '이미 앱으로 설치되어 실행 중입니다. ✓' : 'Already installed and running as an app. ✓';
  } else if(isChrome || isEdge){
    steps = isKo
      ? '<b>' + (isEdge?'Edge':'Chrome') + '에서 설치하기</b><br><br>'
        + '1. 주소창 오른쪽 끝의 <b>설치 아이콘(⊕ 또는 🖥️)</b>을 클릭<br>'
        + '&nbsp;&nbsp;&nbsp;(안 보이면 우측 상단 <b>⋮ 메뉴</b> → <b>"앱"</b> → <b>"이 사이트를 앱으로 설치"</b>)<br>'
        + '2. 팝업에서 <b>"설치"</b> 클릭<br>'
        + '3. 바탕화면·시작메뉴에 <b>BTCtiming 아이콘</b>이 생깁니다<br>'
        + '4. 클릭하면 독립 앱 창으로 실행됩니다 🎉'
      : '<b>Install on ' + (isEdge?'Edge':'Chrome') + '</b><br><br>'
        + '1. Click the <b>install icon (⊕ / 🖥️)</b> at the right of the address bar<br>'
        + '&nbsp;&nbsp;&nbsp;(or <b>⋮ menu</b> → <b>Apps</b> → <b>Install this site as an app</b>)<br>'
        + '2. Click <b>Install</b> in the popup<br>'
        + '3. A <b>BTCtiming icon</b> appears on your desktop<br>'
        + '4. Click it to run as a standalone app 🎉';
  } else if(isSafari){
    steps = isKo
      ? '<b>Safari에서는 앱 설치가 제한됩니다.</b><br><br>Chrome 또는 Edge 브라우저에서 이 페이지를 열면 데스크톱 앱으로 설치할 수 있습니다.'
      : '<b>Safari has limited install support.</b><br><br>Open this page in Chrome or Edge to install as a desktop app.';
  } else {
    steps = isKo
      ? 'Chrome 또는 Edge 브라우저의 메뉴에서 <b>"앱 설치"</b> 또는 <b>"홈 화면에 추가"</b>를 선택하세요.'
      : 'Use your browser menu → <b>Install app</b> / <b>Add to Home screen</b> (Chrome or Edge recommended).';
  }
  // 안내 오버레이
  let ov = document.getElementById('btcInstallGuide');
  if(ov) ov.remove();
  ov = document.createElement('div');
  ov.id = 'btcInstallGuide';
  ov.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:100000;display:flex;align-items:center;justify-content:center;padding:20px';
  ov.innerHTML = '<div style="background:#17171c;border:1px solid rgba(255,255,255,.14);border-radius:16px;max-width:400px;width:100%;padding:22px;color:#f0f0f2">'
    + '<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px">'
    + '<span style="font-size:15px;font-weight:700">💻 ' + (isKo?'앱으로 설치':'Install as app') + '</span>'
    + '<span onclick="document.getElementById(\'btcInstallGuide\').remove()" style="cursor:pointer;color:#9090a0;font-size:20px;line-height:1">×</span></div>'
    + '<div style="font-size:12.5px;line-height:1.9;color:#c8c8d0">' + steps + '</div>'
    + '<button onclick="document.getElementById(\'btcInstallGuide\').remove()" style="width:100%;margin-top:18px;background:#f7931a;color:#0a0a0a;border:none;border-radius:9px;padding:11px;font-size:13px;font-weight:700;cursor:pointer">' + (isKo?'확인':'Got it') + '</button>'
    + '</div>';
  ov.onclick = function(e){ if(e.target === ov) ov.remove(); };
  document.body.appendChild(ov);
}
function openSettings(){
  openModal();                 // 모달 열기 (app.js 또는 위 폴백)
  try { smApplyAlertI18n(); } catch(e){}          // 알람 탭 문구를 현재 언어로
  try { if(window.loadAlertSettings) window.loadAlertSettings(); } catch(e){}  // 저장된 알람 상태 복원
  if(window._btcApplyTabVisibility) window._btcApplyTabVisibility();
  // 모바일·앱: 위젯 탭 숨김 → 알람 탭 기본. 데스크톱: 위젯 탭 기본.
  switchTab(btcIsMobileOrApp() ? 'alert' : 'widget');
}
function switchTab(tab){
  document.getElementById('tab_widget').style.display = tab==='widget' ? '' : 'none';
  document.getElementById('tab_alert').style.display  = tab==='alert'  ? '' : 'none';
  // 탭 색상: 활성 = 오렌지 배경+검은 글씨, 비활성 = 회색 배경+밝은 글씨 (인라인 강제)
  const w = document.getElementById('stab_widget');
  const a = document.getElementById('stab_alert');
  if(tab==='widget'){
    w.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center';
    a.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,.14);background:#1e1e25;color:#f0f0f2;font-size:12.5px;cursor:pointer;font-weight:600;text-align:center';
  } else {
    a.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid #f7931a;background:#f7931a;color:#0a0a0a;font-size:12.5px;cursor:pointer;font-weight:700;text-align:center';
    w.style.cssText = 'flex:1;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,.14);background:#1e1e25;color:#f0f0f2;font-size:12.5px;cursor:pointer;font-weight:600;text-align:center';
  }
  if(tab==='widget') initWidgetTab();
}

// 검색 드롭다운 바깥 클릭 시 닫기
document.addEventListener('click', function(e){
  const search = document.getElementById('wgCoinSearch');
  const results = document.getElementById('wgSearchResults');
  if(!search || !results) return;
  if(e.target !== search && !results.contains(e.target)){
    results.style.display = 'none';
  }
});

// ── 위젯 탭 초기화 ────────────────────────────────────
// 전체 코인 목록 (config.php COIN_SYMBOLS와 동일, 검색 대상)
const WG_ALL_COINS = ['BTC','ETH','BNB','SOL','XRP','DOGE','ADA','TRX','AVAX','LINK','DOT','POL','LTC','BCH','NEAR','UNI','APT','ICP','ATOM','XLM','ETC','FIL','HBAR','ARB','OP','VET','INJ','SUI','AAVE','GRT','ALGO','SEI','RUNE','S','TIA','IMX','RENDER','SKY','LDO','STX','THETA','SAND','AXS','MANA','FLOW','CHZ','GALA','PEPE','SHIB'];
let wgSelected = [];
let wgShowBlog = false;
let wgEnabled = true;
let wgInited = false;

const WG_I18N = {
  ko:{title:'위젯',desc:'플로팅 패널로 직접 쓰거나, 사이트에 임베드할 수 있습니다.',coins:'내 코인 (즐겨찾기)',ph:'🔍 코인 검색해서 추가 (ETH, SOL, PEPE…)',options:'옵션',blog:'최신 블로그 글 표시 (5개)',preview:'미리보기',pin:'화면에 위젯 고정',pinHint:'이 페이지 위에 작은 실시간 위젯을 띄웁니다 — 원하는 곳으로 드래그하세요.',code:'임베드 코드 (내 웹사이트용)',copy:'복사',install:'위젯을 앱으로 설치',installHint:'위젯만 독립 앱 창으로 추가합니다.',count:function(n){return n+' / 10개 · 코인을 탭하면 제거';}},
  en:{title:'Widget',desc:'Use it yourself as a floating panel, or embed it on your site.',coins:'My coins (favorites)',ph:'🔍 Search to add a coin (ETH, SOL, PEPE…)',options:'Options',blog:'Show latest blog posts (5)',preview:'Preview',pin:'Pin widget on screen',pinHint:'Keeps a small live widget floating on this page — drag it anywhere.',code:'Embed code (for your website)',copy:'Copy',install:'Install widget as an app',installHint:'Installs the widget as a standalone app window.',count:function(n){return n+' / 10 coins · tap a coin to remove';}},
  ja:{title:'ウィジェット',desc:'フローティングパネルとして使うか、サイトに埋め込めます。',coins:'マイコイン（お気に入り）',ph:'🔍 コインを検索して追加 (ETH, SOL, PEPE…)',options:'オプション',blog:'最新ブログ記事を表示 (5件)',preview:'プレビュー',pin:'画面に固定',pinHint:'このページ上に小さなライブウィジェットを表示します。ドラッグで移動できます。',code:'埋め込みコード（サイト用）',copy:'コピー',install:'ウィジェットをアプリ化',installHint:'ウィジェットを独立アプリ窓として追加します。',count:function(n){return n+' / 10 · タップで削除';}},
  es:{title:'Widget',desc:'Úsalo como panel flotante o incrústalo en tu sitio.',coins:'Mis monedas (favoritas)',ph:'🔍 Busca para añadir (ETH, SOL, PEPE…)',options:'Opciones',blog:'Mostrar últimas entradas (5)',preview:'Vista previa',pin:'Fijar widget en pantalla',pinHint:'Mantiene un widget flotante en esta página — arrástralo donde quieras.',code:'Código para incrustar',copy:'Copiar',install:'Instalar widget como app',installHint:'Instala el widget como ventana de app.',count:function(n){return n+' / 10 · toca para quitar';}},
  de:{title:'Widget',desc:'Nutze es als schwebendes Panel oder bette es auf deiner Seite ein.',coins:'Meine Coins (Favoriten)',ph:'🔍 Coin suchen zum Hinzufügen (ETH, SOL…)',options:'Optionen',blog:'Neueste Blogbeiträge zeigen (5)',preview:'Vorschau',pin:'Widget anheften',pinHint:'Hält ein kleines Live-Widget auf dieser Seite — beliebig ziehbar.',code:'Einbettungscode (für deine Website)',copy:'Kopieren',install:'Widget als App installieren',installHint:'Installiert das Widget als eigenes App-Fenster.',count:function(n){return n+' / 10 · zum Entfernen tippen';}},
  fr:{title:'Widget',desc:'Utilisez-le comme panneau flottant ou intégrez-le à votre site.',coins:'Mes cryptos (favoris)',ph:'🔍 Rechercher pour ajouter (ETH, SOL…)',options:'Options',blog:'Afficher les derniers articles (5)',preview:'Aperçu',pin:'Épingler le widget',pinHint:'Garde un petit widget flottant sur cette page — déplaçable à volonté.',code:"Code d'intégration (pour votre site)",copy:'Copier',install:'Installer le widget comme app',installHint:'Installe le widget comme fenêtre d\'app.',count:function(n){return n+' / 10 · touchez pour retirer';}},
  pt:{title:'Widget',desc:'Use como painel flutuante ou incorpore no seu site.',coins:'Minhas moedas (favoritas)',ph:'🔍 Busque para adicionar (ETH, SOL…)',options:'Opções',blog:'Mostrar últimos posts (5)',preview:'Prévia',pin:'Fixar widget na tela',pinHint:'Mantém um widget flutuante nesta página — arraste para qualquer lugar.',code:'Código de incorporação',copy:'Copiar',install:'Instalar widget como app',installHint:'Instala o widget como janela de app.',count:function(n){return n+' / 10 · toque para remover';}},
  tr:{title:'Widget',desc:'Yüzen panel olarak kullan veya sitene göm.',coins:'Coinlerim (favoriler)',ph:'🔍 Eklemek için ara (ETH, SOL…)',options:'Seçenekler',blog:'Son blog yazılarını göster (5)',preview:'Önizleme',pin:"Widget'ı ekrana sabitle",pinHint:'Bu sayfada küçük bir canlı widget tutar — istediğin yere sürükle.',code:'Yerleştirme kodu (siten için)',copy:'Kopyala',install:'Widget\'i uygulama olarak kur',installHint:'Widget\'ı bağımsız uygulama penceresi olarak kurar.',count:function(n){return n+' / 10 · kaldırmak için dokun';}},
  vi:{title:'Widget',desc:'Dùng như bảng nổi hoặc nhúng vào trang của bạn.',coins:'Coin của tôi (yêu thích)',ph:'🔍 Tìm để thêm coin (ETH, SOL…)',options:'Tùy chọn',blog:'Hiện bài blog mới nhất (5)',preview:'Xem trước',pin:'Ghim widget lên màn hình',pinHint:'Giữ một widget nhỏ nổi trên trang này — kéo đến bất cứ đâu.',code:'Mã nhúng (cho website của bạn)',copy:'Sao chép',install:'Cài widget như ứng dụng',installHint:'Cài widget như cửa sổ ứng dụng độc lập.',count:function(n){return n+' / 10 · chạm để xóa';}}
};
function applyWgI18n(){
  const L = WG_I18N[getWidgetLang()] || WG_I18N.en;
  const set=function(id,txt){var e=document.getElementById(id);if(e&&txt)e.textContent=txt;};
  set('wgTxt_title',L.title); set('wgTxt_desc',L.desc); set('wgTxt_coins',L.coins);
  set('wgTxt_options',L.options); set('wgTxt_blog',L.blog); set('wgTxt_preview',L.preview);
  set('wgTxt_pin',L.pin); set('wgTxt_pinHint',L.pinHint); set('wgTxt_code',L.code); set('wgTxt_copy',L.copy);
  set('wgTxt_install',L.install); set('wgTxt_installHint',L.installHint);
  var s=document.getElementById('wgCoinSearch'); if(s) s.placeholder=L.ph;
  var cnt=document.getElementById('wgSelCount'); if(cnt) cnt.textContent=L.count(wgSelected.length);
}

function initWidgetTab(){
  if(wgInited){ applyWgI18n(); buildCoinGrid(); updateWidgetPreview(); return; }
  wgInited = true;
  try { wgSelected = JSON.parse(localStorage.getItem('btc_wg_coins')||'["BTC","ETH","SOL","XRP","DOGE"]'); } catch(e){ wgSelected=['BTC','ETH','SOL','XRP','DOGE']; }
  try { wgShowBlog = localStorage.getItem('btc_wg_blog') === '1'; } catch(e){}
  try { wgEnabled = localStorage.getItem('btc_wg_enabled') !== '0'; } catch(e){}
  const blogToggle = document.getElementById('wgBlogToggle');
  if(blogToggle && wgShowBlog) blogToggle.classList.add('on');
  const enableToggle = document.getElementById('wgEnableToggle');
  if(enableToggle) enableToggle.classList.toggle('on', wgEnabled);
  applyWgEnabledUI();
  applyWgI18n();
  buildCoinGrid();
  updateWidgetPreview();
}

function toggleWgEnable(el){
  el.classList.toggle('on');
  wgEnabled = el.classList.contains('on');
  try { localStorage.setItem('btc_wg_enabled', wgEnabled ? '1' : '0'); } catch(e){}
  applyWgEnabledUI();
}

function applyWgEnabledUI(){
  const body = document.getElementById('wgBody');
  if(body){
    body.style.opacity = wgEnabled ? '1' : '0.4';
    body.style.pointerEvents = wgEnabled ? '' : 'none';
    body.style.filter = wgEnabled ? '' : 'grayscale(0.5)';
    body.style.transition = 'opacity .2s';
  }
}

// 코인 그리드 = 항상 즐겨찾기만 표시 (검색과 무관)
function buildCoinGrid(){
  const grid = document.getElementById('wgCoinGrid');
  if(!grid) return;
  grid.innerHTML = '';
  if(wgSelected.length === 0){
    grid.innerHTML = '<div style="font-size:10.5px;color:var(--t3);padding:4px 0">No coins yet — search above to add.</div>';
  } else {
    wgSelected.forEach(c=>{
      const chip = document.createElement('button');
      chip.className = 'wg-coin-chip on';
      chip.innerHTML = c + ' <span style="opacity:.6;margin-left:2px">×</span>';
      chip.title = 'Remove ' + c;
      chip.onclick = ()=>{ removeWgCoin(c); };
      grid.appendChild(chip);
    });
  }
  const countEl = document.getElementById('wgSelCount');
  if(countEl){ const L=WG_I18N[getWidgetLang()]||WG_I18N.en; countEl.textContent = L.count(wgSelected.length); }
}

// 검색은 드롭다운으로 (즐겨찾기에 없는 코인만 후보로) — 그리드는 안 건드림
function filterWgCoins(val){
  const box = document.getElementById('wgSearchResults');
  if(!box) return;
  const q = (val||'').toUpperCase().trim();
  let matches;
  if(!q){
    // 검색어 없을 때: 아직 추가 안 한 인기 코인 추천
    const popular = ['BTC','ETH','SOL','XRP','DOGE','ADA','BNB','AVAX','LINK','DOT','TRX','MATIC','LTC','SHIB','PEPE'];
    matches = popular.filter(c => WG_ALL_COINS.includes(c) && !wgSelected.includes(c)).slice(0, 8);
  } else {
    matches = WG_ALL_COINS.filter(c => c.includes(q) && !wgSelected.includes(c)).slice(0, 8);
  }
  if(!matches.length){
    box.innerHTML = '<div style="padding:8px 11px;font-size:11px;color:var(--t3)">' + (q ? 'No match, or already added.' : 'All popular coins added.') + '</div>';
    box.style.display='block';
    return;
  }
  box.innerHTML = matches.map(c =>
    '<div onclick="addWgCoin(\''+c+'\')" style="padding:8px 11px;font-size:12px;color:var(--t1);cursor:pointer;border-bottom:1px solid var(--b1)" onmouseover="this.style.background=\'var(--bg3)\'" onmouseout="this.style.background=\'\'">'
    + '<span style="font-weight:700">'+c+'</span> <span style="color:var(--or);font-size:10px;margin-left:4px">+ add</span></div>'
  ).join('');
  box.style.display='block';
}

function addWgCoin(coin){
  if(wgSelected.includes(coin)) return;
  if(wgSelected.length >= 10) { alert('Max 10 coins'); return; }
  wgSelected.push(coin);
  try { localStorage.setItem('btc_wg_coins', JSON.stringify(wgSelected)); } catch(e){}
  const search = document.getElementById('wgCoinSearch');
  if(search){ search.value=''; }
  document.getElementById('wgSearchResults').style.display='none';
  buildCoinGrid();
  updateWidgetPreview();
  syncFloatingWidget();
}

function removeWgCoin(coin){
  if(wgSelected.length <= 1) return; // 최소 1개
  wgSelected = wgSelected.filter(c => c !== coin);
  try { localStorage.setItem('btc_wg_coins', JSON.stringify(wgSelected)); } catch(e){}
  buildCoinGrid();
  updateWidgetPreview();
  syncFloatingWidget();
}

function toggleWgBlog(el){
  el.classList.toggle('on');
  wgShowBlog = el.classList.contains('on');
  try { localStorage.setItem('btc_wg_blog', wgShowBlog ? '1' : '0'); } catch(e){}
  updateWidgetPreview();
  syncFloatingWidget();
}

function getWidgetLang(){
  // 홈 대시보드가 "실제로 표시 중인" 언어를 최우선으로 따라감.
  const valid = ['ko','en','ja','es','de','fr','pt','tr','vi','id','pl','it','ru','zh'];
  if(typeof currentLang !== 'undefined' && currentLang && valid.includes(currentLang)) return currentLang;
  const hl = document.documentElement.getAttribute('lang');
  if(hl && valid.includes(hl)) return hl;
  try { if(window.BTLang && BTLang.get){ const l = BTLang.get(); if(l && valid.includes(l)) return l; } } catch(e){}
  return 'ko';
}
function buildWidgetUrl(){
  const coins = wgSelected.join(',');
  const lang  = getWidgetLang();
  const blog  = wgShowBlog ? '&blog=1' : '';
  return 'https://btctiming.com/widget.php?coins=' + encodeURIComponent(coins) + '&lang=' + lang + blog;
}

function widgetHeight(){
  const rowH = 38, headH = 38, footH = 28, tabH = wgShowBlog ? 34 : 0;
  return Math.min(headH + tabH + Math.max(wgSelected.length,1) * rowH + footH, 340);
}

function updateWidgetPreview(){
  const src = buildWidgetUrl();
  const h = widgetHeight();
  const frame = document.getElementById('wgPreviewFrame');
  if(frame){
    frame.src = src;
    frame.style.height = h + 'px';
    if(window._btcPreviewPoll) clearInterval(window._btcPreviewPoll);
    function fitPreview(){
      try{
        const doc = frame.contentDocument || frame.contentWindow.document;
        if(!doc || !doc.body) return;
        const ih = Math.min(doc.body.scrollHeight, 400);
        if(Math.abs(parseInt(frame.style.height) - ih) > 2) frame.style.height = ih + 'px';
      }catch(e){}
    }
    window._btcPreviewPoll = setInterval(fitPreview, 250);
    frame.addEventListener('load', fitPreview);
  }
  const code = '<iframe src="' + src + '" width="320" height="' + h + '" frameborder="0" scrolling="no" style="border-radius:12px"></iframe>';
  const box = document.getElementById('wgCodeBox');
  if(box) box.value = code;
}

// ── 플로팅 위젯: 현재 페이지 위에 드래그 가능한 패널로 상주 ──
// (브라우저 확장프로그램처럼 화면 위에 항상 떠있는 경험. 별도 창/앱 설치 불필요.)
// 플로팅 위젯은 _shared_footer.php 공통 코드(btcLaunchFloating)가 전 페이지에서 처리.
// 대시보드에서 코인/블로그 설정을 바꾸면 떠있는 플로팅을 새 설정으로 갱신.
function syncFloatingWidget(){
  var fw=document.getElementById('btcFloatWidget');
  if(!fw) return;
  var iframe=document.getElementById('btcFloatFrame');
  if(iframe) iframe.src = buildWidgetUrl();
}

function copyWidgetCode(){
  const box = document.getElementById('wgCodeBox');
  if(!box) return;
  navigator.clipboard.writeText(box.value).then(()=>{
    const btn = document.getElementById('wgCopyBtn');
    const orig = btn.innerHTML;
    btn.textContent = '✓ Copied!';
    btn.style.background = 'var(--green)'; btn.style.color = '#000';
    setTimeout(()=>{ btn.innerHTML=orig; btn.style.background=''; btn.style.color=''; }, 2000);
  }).catch(()=>{ box.select(); document.execCommand('copy'); });
}
</script>
