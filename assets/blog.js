/* BTCtiming blog shared script (externalized 2026-07-19). SUPPORTED_LANGS via window.BT_SUPPORTED_LANGS bootstrap in _footer.php. */
function __btArtAnchor() {
    var hs = document.querySelectorAll(".wrap-main h2, .wrap-main h3");
    var y = window.pageYOffset || document.documentElement.scrollTop || 0;
    if (y < 4) return null;
    var sh = document.documentElement.scrollHeight - window.innerHeight;
    var docFrac = sh > 0 ? y / sh : 0;
    if (!hs.length) return {
        i: -2,
        n: 0,
        f: 0,
        d: docFrac
    };
    var dtop = function(el) {
        return el.getBoundingClientRect().top + y;
    };
    var i = -1;
    for (var k = 0; k < hs.length; k++) {
        if (dtop(hs[k]) <= y + 1) i = k; else break;
    }
    var start, end;
    if (i < 0) {
        start = 0;
        end = dtop(hs[0]);
    } else {
        start = dtop(hs[i]);
        end = i + 1 < hs.length ? dtop(hs[i + 1]) : document.documentElement.scrollHeight;
    }
    var span = Math.max(1, end - start);
    return {
        i: i,
        n: hs.length,
        f: Math.max(0, Math.min(1, (y - start) / span)),
        d: docFrac
    };
}

function Lpick(l) {
    try {
        localStorage.setItem("blogLangPicked", "1");
    } catch (e) {}
    if (window.BTLang && BTLang.save) BTLang.save(l);
    try {
        var cur = location.pathname + location.search + location.hash;
        var to = window.BTLang && BTLang.i18nHref ? BTLang.i18nHref(cur, l) : null;
        if (to && to !== cur) {
            try {
                var a = __btArtAnchor();
                if (a) sessionStorage.setItem("btArtScroll", JSON.stringify(a));
            } catch (e) {}
            location.href = to;
            return;
        }
    } catch (e) {}
    L(l);
}

(function __btRestoreArtScroll() {
    var raw = null;
    try {
        raw = sessionStorage.getItem("btArtScroll");
        sessionStorage.removeItem("btArtScroll");
    } catch (e) {
        return;
    }
    if (!raw) return;
    var st;
    try {
        st = JSON.parse(raw);
    } catch (e) {
        return;
    }
    if (!st) return;
    var go = function() {
        var hs = document.querySelectorAll(".wrap-main h2, .wrap-main h3");
        var y = window.pageYOffset || document.documentElement.scrollTop || 0;
        var sh = document.documentElement.scrollHeight - window.innerHeight;
        if (!hs.length || hs.length !== st.n || st.i === -2) {
            if (sh > 0 && st.d != null) window.scrollTo(0, Math.round(st.d * sh));
            return;
        }
        if (st.i >= hs.length) return;
        var dtop = function(el) {
            return el.getBoundingClientRect().top + y;
        };
        var start, end;
        if (st.i < 0) {
            start = 0;
            end = dtop(hs[0]);
        } else {
            start = dtop(hs[st.i]);
            end = st.i + 1 < hs.length ? dtop(hs[st.i + 1]) : document.documentElement.scrollHeight;
        }
        var span = Math.max(1, end - start);
        window.scrollTo(0, Math.round(start + st.f * span));
    };
    go();
    requestAnimationFrame(go);
    window.addEventListener("load", function() {
        requestAnimationFrame(function() {
            requestAnimationFrame(go);
        });
    });
})();

function L(l) {
    document.getElementById("hr").lang = l;
    const trigLabel = document.getElementById("langTriggerLabel");
    if (trigLabel) trigLabel.textContent = l.toUpperCase();
    document.querySelectorAll(".lang-menu-item").forEach(el => {
        el.classList.toggle("active", el.dataset.lang === l);
    });
    closeLangMenu();
    const bcCat = document.getElementById("bcCatLink");
    if (bcCat) {
        const cat = bcCat.dataset.cat || "";
        bcCat.setAttribute("href", (l === "ko" ? "" : "/" + l) + "/blog/?cat=" + cat);
    }
    if (window.cbSyncLang) cbSyncLang(l);
    if (window.BTLang && BTLang.pathify) BTLang.pathify(l);
    try {
        if (window.__ART_TITLE && window.__ART_TITLE[l]) document.title = window.__ART_TITLE[l];
        var __md = document.querySelector('meta[name="description"]');
        if (__md && window.__ART_DESC && window.__ART_DESC[l]) __md.setAttribute("content", window.__ART_DESC[l]);
    } catch (e) {}
    try {
        if (window.BTLang && BTLang.i18nHref) history.replaceState(null, "", BTLang.i18nHref(location.pathname + location.search + location.hash, l));
    } catch (e) {}
    if (window.BTLang) {
        BTLang.save(l);
    } else {
        try {
            localStorage.setItem("blogLang", l);
            document.cookie = "blogLang=" + encodeURIComponent(l) + "; path=/; max-age=31536000; SameSite=Lax";
        } catch (e) {}
    }
    try {
        if (window.BTLang && BTLang.i18nHref) history.replaceState(null, "", BTLang.i18nHref(location.pathname + location.search + location.hash, l));
    } catch (e) {}
    try {
        if (window.__refreshShare) window.__refreshShare();
    } catch (e) {}
}

function toggleLangMenu(e) {
    if (e) e.stopPropagation();
    const dd = document.getElementById("langDropdown");
    if (dd) dd.classList.toggle("open");
}

function closeLangMenu() {
    const dd = document.getElementById("langDropdown");
    if (dd) dd.classList.remove("open");
}

document.addEventListener("click", e => {
    const dd = document.getElementById("langDropdown");
    if (dd && dd.classList.contains("open") && !dd.contains(e.target)) closeLangMenu();
});

function getBlogLang() {
    if (window.BTLang) return BTLang.get(false);
    var SUP = window.BT_SUPPORTED_LANGS || [ "ko", "en", "ja", "es", "de", "fr", "pt", "tr", "vi", "id", "pl", "it", "ru", "zh" ];
    try {
        const p = new URLSearchParams(location.search).get("lang");
        if (p && SUP.indexOf(p) !== -1) return p;
    } catch (e) {}
    try {
        const m = document.cookie.match(/(?:^|;\s*)blogLang=([^;]+)/);
        const c = m ? decodeURIComponent(m[1]) : null;
        if (c && SUP.indexOf(c) !== -1) return c;
    } catch (e) {}
    try {
        const s = localStorage.getItem("blogLang") || localStorage.getItem("lang");
        if (s && SUP.indexOf(s) !== -1) return s;
    } catch (e) {}
    return "ko";
}

function applySavedLang() {
    try {
        var SUP = window.BT_SUPPORTED_LANGS || [ "ko", "en", "ja", "es", "de", "fr", "pt", "tr", "vi", "id", "pl", "it", "ru", "zh" ];
        var picked = false;
        try {
            picked = localStorage.getItem("blogLangPicked") === "1";
        } catch (e) {}
        var __plm = location.pathname.match(/^\/([a-z]{2})(?:\/|$)/);
        var __pathLang = __plm && SUP.indexOf(__plm[1]) !== -1 ? __plm[1] : null;
        const urlLang = __pathLang || new URLSearchParams(location.search).get("lang");
        if ((__pathLang || !picked) && SUP.indexOf(urlLang) !== -1) return;
        const saved = getBlogLang();
        const current = document.getElementById("hr").lang;
        if (saved === current) return;
        if (saved !== "ko" && SUP.indexOf(saved) !== -1) {
            const hasMenuItem = document.querySelector('.lang-menu-item[data-lang="' + saved + '"]');
            if (hasMenuItem) L(saved);
        } else if (saved === "ko") {
            L("ko");
        }
    } catch (e) {}
}

try {
    var _cur = document.getElementById("hr") ? document.getElementById("hr").lang || "ko" : "ko";
    if (window.BTLang) window.BTLang.stampUrl(_cur);
} catch (e) {}

function syncPrevNextLang() {
    try {
        const cur = document.getElementById("hr").lang || "ko";
        document.querySelectorAll('a[data-base^="/blog/"]').forEach(a => {
            const base = a.getAttribute("data-base");
            if (base) a.setAttribute("href", base);
        });
        if (window.BTLang && BTLang.pathify) BTLang.pathify(cur);
    } catch (e) {}
}

syncPrevNextLang();

window.addEventListener("pageshow", function(e) {
    syncPrevNextLang();
});

(function initShare() {
    try {
        function buildShareUrls() {
            const u = encodeURIComponent(location.href);
            const t = encodeURIComponent(document.title || "BTCtiming.com");
            return {
                x: `https://twitter.com/intent/tweet?url=${u}&text=${t}`,
                fb: `https://www.facebook.com/sharer/sharer.php?u=${u}`,
                in: `https://www.linkedin.com/sharing/share-offsite/?url=${u}`,
                tg: `https://t.me/share/url?url=${u}&text=${t}`,
                line: `https://social-plugins.line.me/lineit/share?url=${u}`,
                wa: `https://api.whatsapp.com/send?text=${t}%20${u}`
            };
        }
        function applyShareUrls() {
            const map = buildShareUrls();
            document.querySelectorAll("[data-share] .share-btn[data-net]").forEach(function(b) {
                const n = b.getAttribute("data-net");
                if (map[n]) b.setAttribute("href", map[n]);
            });
        }
        window.__refreshShare = applyShareUrls;
        let shareUrls = buildShareUrls();
        function closeAllPops() {
            document.querySelectorAll("[data-share-pop]").forEach(p => {
                p.hidden = true;
            });
            document.querySelectorAll("[data-share-toggle]").forEach(b => b.setAttribute("aria-expanded", "false"));
        }
        document.addEventListener("click", e => {
            if (!e.target.closest(".share-wrap")) closeAllPops();
        });
        document.querySelectorAll("[data-share]").forEach(bar => {
            bar.querySelectorAll(".share-btn[data-net]").forEach(btn => {
                const net = btn.getAttribute("data-net");
                if (shareUrls[net]) btn.setAttribute("href", shareUrls[net]);
                btn.addEventListener("click", () => setTimeout(closeAllPops, 50));
            });
            const toggle = bar.querySelector("[data-share-toggle]");
            const pop = bar.querySelector("[data-share-pop]");
            if (toggle) {
                toggle.addEventListener("click", e => {
                    e.stopPropagation();
                    if (pop) {
                        const willOpen = pop.hidden;
                        closeAllPops();
                        if (willOpen) {
                            pop.hidden = false;
                            toggle.setAttribute("aria-expanded", "true");
                        }
                    }
                });
            }
            const copyBtn = bar.querySelector('[data-net="copy"]');
            if (copyBtn) {
                copyBtn.addEventListener("click", () => {
                    const pageUrl = location.href;
                    const done = () => {
                        copyBtn.classList.add("copied");
                        setTimeout(() => copyBtn.classList.remove("copied"), 1500);
                    };
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(pageUrl).then(done).catch(() => {
                            const ta = document.createElement("textarea");
                            ta.value = pageUrl;
                            document.body.appendChild(ta);
                            ta.select();
                            try {
                                document.execCommand("copy");
                            } catch (e) {}
                            document.body.removeChild(ta);
                            done();
                        });
                    } else {
                        const ta = document.createElement("textarea");
                        ta.value = pageUrl;
                        document.body.appendChild(ta);
                        ta.select();
                        try {
                            document.execCommand("copy");
                        } catch (e) {}
                        document.body.removeChild(ta);
                        done();
                    }
                });
            }
        });
    } catch (e) {}
})();

(function wrapSvgCharts() {
    try {
        var wrap = document.querySelector(".wrap");
        if (!wrap) return;
        var svgs = wrap.querySelectorAll("svg");
        svgs.forEach(function(svg) {
            if (svg.closest(".svg-scroll")) return;
            if (svg.closest(".lang-menu, nav, .prevnext, .other-articles")) return;
            var vb = svg.getAttribute("viewBox");
            var wide = false;
            if (vb) {
                var p = vb.split(/[ ,]+/);
                if (p.length === 4 && parseFloat(p[2]) >= 400) wide = true;
            }
            if (!wide) return;
            var box = document.createElement("div");
            box.className = "svg-scroll";
            svg.parentNode.insertBefore(box, svg);
            box.appendChild(svg);
        });
    } catch (e) {}
})();