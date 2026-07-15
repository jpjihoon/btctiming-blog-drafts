<?php
/* ══════════════════════════════════════════════════════
   공용 카테고리 바 — 블로그 목록/뷰 공통 (단일 소스)
   호출 전 변수 지정:
     $__cbMode   : 'list' | 'view'
     $__cbActive : 현재 카테고리 키('news'…) / 목록 전체는 'all'
     $__cbLang   : 현재 언어 코드
     $__cbQ      : (선택) 검색어 프리필
   CATEGORY_META / SUPPORTED_LANGS / h() 필요.
   ══════════════════════════════════════════════════════ */
if (!defined('CATEGORY_META')) define('CATEGORY_META', require __DIR__ . '/_category_meta.php');
$__cbMode   = $__cbMode   ?? 'list';
$__cbLang   = $__cbLang   ?? 'ko';
$__cbActive = $__cbActive ?? 'all';
$__cbQ      = $__cbQ      ?? '';
$__cbKeys   = array_keys(SUPPORTED_LANGS);
$__cbLangQ  = ($__cbLang !== 'ko') ? ('&lang=' . rawurlencode($__cbLang)) : '';
$__cbAllQ   = ($__cbLang !== 'ko') ? ('?lang=' . rawurlencode($__cbLang)) : '';
$__cbAll    = ['ko'=>'전체','en'=>'All','ja'=>'すべて','es'=>'Todo','de'=>'Alle','fr'=>'Tout','pt'=>'Tudo','tr'=>'Tümü','vi'=>'Tất cả'];
// 언어 라벨 스팬: 목록은 .{lang}-show, 뷰는 [lang] .{lang} 방식이라 양쪽 클래스를 다 부여
$__cbSpan = function(array $lab) use ($__cbKeys) {
    $o = '';
    foreach ($__cbKeys as $l) {
        $cls = ($l === 'ko') ? 'ko' : ($l . ' ' . $l . '-show');
        $o .= '<span class="' . $cls . '">' . h($lab[$l] ?? $lab['en']) . '</span>';
    }
    return $o;
};
$__cbPh     = ['ko'=>'글 검색 — 지표·코인·키워드','en'=>'Search posts…','ja'=>'記事を検索…','es'=>'Buscar…','de'=>'Suchen…','fr'=>'Rechercher…','pt'=>'Buscar…','tr'=>'Ara…','vi'=>'Tìm bài…'];
$__cbSvg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
?>
<style>
/* ── 공용 카테고리 바 ── */
.catbar{background:#0f0f12;border-bottom:1px solid rgba(255,255,255,.08);position:sticky;top:52px;z-index:199;transition:transform .25s ease;will-change:transform}
.catbar.cb-hidden{transform:translateY(-100%)}
.cb-in{max-width:1120px;margin:0 auto;padding:0 24px;display:flex;align-items:center;gap:6px;min-height:46px}
.cb-left{flex:1;min-width:0;display:flex;align-items:center}
.cb-icon{flex-shrink:0;width:38px;height:38px;border:none;background:transparent;color:#9a9aa3;cursor:pointer;border-radius:8px;display:grid;place-items:center}
.cb-icon:hover{color:#e9e9ee;background:rgba(255,255,255,.05)}
.cb-icon svg{width:18px;height:18px}
.catbar.cb-searching .cb-icon{color:#f7931a}
/* 검색줄: 카테고리 아래 별도 줄 (카테고리 안 가림) */
.cb-searchrow{max-width:1120px;margin:0 auto;padding:0 24px;height:0;overflow:hidden;transition:height .2s ease}
.catbar.cb-searching .cb-searchrow{height:52px;border-top:1px solid rgba(255,255,255,.08)}
.cb-searchbox{display:flex;align-items:center;gap:9px;background:#141418;border:1px solid rgba(255,255,255,.16);border-radius:10px;padding:0 12px;height:38px;margin-top:7px}
.cb-searchbox>svg{width:16px;height:16px;flex-shrink:0;color:#6d6d76}
.cb-searchbox input{flex:1;min-width:0;background:transparent;border:none;outline:none;color:#e9e9ee;font-size:14px}
.cb-searchbox input::placeholder{color:#6d6d76}
.cb-searchbox input::-webkit-search-cancel-button{display:none}
.cb-close{border:none;background:transparent;color:#6d6d76;cursor:pointer;font-size:15px;padding:4px;line-height:1}
.cb-close:hover{color:#e9e9ee}
/* 목록: 탭 펼침 */
.cb-tabs{display:flex;align-items:center;gap:2px;overflow-x:auto;scrollbar-width:none;flex:1;min-width:0}
.cb-tabs::-webkit-scrollbar{display:none}
.cb-tab{white-space:nowrap;padding:11px 12px;font-size:13.5px;font-weight:600;color:#9a9aa3;border-bottom:2px solid transparent;text-decoration:none;cursor:pointer}
.cb-tab:hover{color:#e9e9ee}
.cb-tab.on{color:#e9e9ee;border-bottom-color:var(--tabc,#f7931a)}
/* 뷰: 드롭다운 */
.cb-drop{position:relative}
.cb-dropbtn{display:flex;align-items:center;gap:7px;background:transparent;border:none;cursor:pointer;padding:10px 4px;font-size:14px;font-weight:700;color:#e9e9ee}
.cb-dropbtn .car{color:#6d6d76;font-size:11px;transition:transform .18s}
.cb-drop.open .cb-dropbtn .car{transform:rotate(180deg)}
.cb-menu{position:absolute;top:calc(100% + 6px);left:0;min-width:190px;background:#16161b;border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:6px;box-shadow:0 12px 30px rgba(0,0,0,.5);display:none;z-index:60}
.cb-drop.open .cb-menu{display:block}
.cb-menu a{display:block;padding:9px 12px;border-radius:8px;font-size:13.5px;font-weight:600;color:#9a9aa3;text-decoration:none}
.cb-menu a:hover{background:rgba(255,255,255,.06);color:#e9e9ee}
.cb-menu a.on{color:#e9e9ee;background:rgba(255,255,255,.04)}
@media(max-width:600px){.cb-in,.cb-searchrow{padding:0 24px}.cb-tab{padding:10px 9px;font-size:12.5px}}
</style>
<div class="catbar<?= ($__cbQ !== '') ? ' cb-searching' : '' ?>" id="btCatbar">
  <div class="cb-in">
    <div class="cb-left">
<?php if ($__cbMode === 'view'):
      $__cbCur = CATEGORY_META[$__cbActive] ?? CATEGORY_META['guide']; ?>
      <div class="cb-drop" id="cbDrop">
        <button class="cb-dropbtn" type="button" onclick="cbToggleDrop(event)"><span><?= $__cbSpan($__cbCur) ?></span><span class="car">▼</span></button>
        <div class="cb-menu">
          <a href="/blog/<?= $__cbAllQ ?>"><?= $__cbSpan($__cbAll) ?></a>
<?php foreach (CATEGORY_META as $ck => $cm): if (!isset($cm['ko'])) continue; ?>
          <a class="<?= $__cbActive === $ck ? 'on' : '' ?>" href="/blog/?cat=<?= h($ck) ?><?= $__cbLangQ ?>"><?= $__cbSpan($cm) ?></a>
<?php endforeach; ?>
        </div>
      </div>
<?php else: ?>
      <div class="cb-tabs">
        <a class="cb-tab <?= $__cbActive === 'all' ? 'on' : '' ?>" style="--tabc:#f7931a" href="/blog/<?= $__cbAllQ ?>"><?= $__cbSpan($__cbAll) ?></a>
<?php foreach (CATEGORY_META as $ck => $cm): if (!isset($cm['ko'])) continue; ?>
        <a class="cb-tab <?= $__cbActive === $ck ? 'on' : '' ?>" style="--tabc:<?= h($cm['color'] ?? '#f7931a') ?>" href="/blog/?cat=<?= h($ck) ?><?= $__cbLangQ ?>"><?= $__cbSpan($cm) ?></a>
<?php endforeach; ?>
      </div>
<?php endif; ?>
    </div>
    <button class="cb-icon" type="button" onclick="cbToggleSearch()" aria-label="Search"><?= $__cbSvg ?></button>
  </div>
  <div class="cb-searchrow">
    <form class="cb-searchbox" action="/blog/" method="get" role="search">
      <?= $__cbSvg ?>
      <input type="search" name="q" value="<?= h($__cbQ) ?>" placeholder="<?= h($__cbPh[$__cbLang] ?? $__cbPh['en']) ?>" autocomplete="off" enterkeyhint="search" aria-label="Search posts">
<?php if ($__cbLang !== 'ko'): ?>      <input type="hidden" name="lang" value="<?= h($__cbLang) ?>">
<?php endif; ?>
<?php if ($__cbMode === 'list' && $__cbActive !== 'all' && $__cbActive !== ''): ?>      <input type="hidden" name="cat" value="<?= h($__cbActive) ?>">
<?php endif; ?>
      <button class="cb-close" type="button" onclick="cbToggleSearch()" aria-label="Close">✕</button>
    </form>
  </div>
</div>
<script>
(function(){
  var bar=document.getElementById('btCatbar'); if(!bar) return;
  window.cbToggleSearch=function(){
    bar.classList.toggle('cb-searching');
    if(bar.classList.contains('cb-searching')){ var i=bar.querySelector('input[name=q]'); if(i) setTimeout(function(){i.focus();},60); }
  };
  window.cbToggleDrop=function(e){ if(e) e.stopPropagation(); var d=document.getElementById('cbDrop'); if(d) d.classList.toggle('open'); };
  // 언어 전환 시 카테고리 링크·검색폼의 lang 파라미터를 현재 언어로 동기화 (setLang/L에서 호출)
  window.cbSyncLang=function(lang){
    try{
      [].forEach.call(document.querySelectorAll('#btCatbar a[href*="/blog/"]'),function(a){
        var u=new URL(a.getAttribute('href'), location.origin);
        if(lang==='ko') u.searchParams.delete('lang'); else u.searchParams.set('lang', lang);
        a.setAttribute('href', u.pathname + (u.search||''));
      });
      var f=document.querySelector('#btCatbar form.cb-searchbox');
      if(f){ var li=f.querySelector('input[name=lang]');
        if(lang==='ko'){ if(li && li.parentNode) li.parentNode.removeChild(li); }
        else { if(!li){ li=document.createElement('input'); li.type='hidden'; li.name='lang'; f.appendChild(li); } li.value=lang; }
      }
    }catch(e){}
  };
  document.addEventListener('click',function(e){ var d=document.getElementById('cbDrop'); if(d && !d.contains(e.target)) d.classList.remove('open'); });
  // auto-hide: 스크롤 내리면 접힘, 올리면 펼침 (상단 근처는 항상 펼침)
  var lastY=window.scrollY||window.pageYOffset||0, ticking=false;
  function upd(){
    var y=window.scrollY||window.pageYOffset||0;
    if(y<70) bar.classList.remove('cb-hidden');
    else if(y>lastY+5){ bar.classList.add('cb-hidden'); bar.classList.remove('cb-searching'); }
    else if(y<lastY-5) bar.classList.remove('cb-hidden');
    lastY=y; ticking=false;
  }
  window.addEventListener('scroll',function(){ if(!ticking){ requestAnimationFrame(upd); ticking=true; } },{passive:true});
})();
</script>
