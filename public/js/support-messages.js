"use strict";
!(function (l, o) {
    var t = o(window),
        d = o("body"),
        s = l.Break,
        n = o(".profile-toggle"),
        r = o(".nk-msg-profile"),
        h = o(".nk-msg-body"),
        m = o(".nk-msg-aside"),
        C = o(".nk-msg-item"),
        g = o(".nk-msg-hide"),
        c = s.lg,
        v = d.hasClass("has-apps-sidebar") ? 1280 : s.xxl,
        f = "nk-msg-profile-overlay",
        u = "profile-shown",
        p = "hide-aside",
        w = "show-message";
    (l.Message = function () {
        function e() {
            l.Win.width >= c ? d.hasClass("msg-profile-autohide") || d.addClass("msg-profile-autohide") : d.hasClass("msg-profile-autohide") && d.removeClass("msg-profile-autohide");
        }
        function s(s) {
            n.addClass("active"), r.addClass("visible"), h.addClass(u), !0 === s && d.addClass("msg-" + u);
        }
        function a(s) {
            n.removeClass("active"), r.removeClass("visible"), h.removeClass(u), !0 === s && d.removeClass("msg-" + u);
        }
        function i() {
            var s = "." + f;
            l.Win.width < v && r.hasClass("visible") ? r.next().hasClass(f) || r.after('<div class="' + f + '"></div>') : o(s).remove(),
                o(s).on("click", function () {
                    o(this).remove(), a(!0), e();
                });
        }g.on("click", function () {
                m.removeClass(p), h.removeClass(w);
            }),
            n.on("click", function (s) {
                n.toggleClass("active"),
                    r.toggleClass("visible"),
                    h.toggleClass(u),
                    o(this).hasClass("active") && !d.hasClass("msg-" + u) ? d.addClass("msg-" + u) : d.removeClass("msg-" + u),
                    l.Win.width >= c && (d.hasClass("msg-profile-autohide") ? d.removeClass("msg-profile-autohide") : l.Win.width < v && !o(this).hasClass("active") && d.addClass("msg-profile-autohide")),
                    i(),
                    s.preventDefault();
            }),
            (l.Win.width >= v ? s : a)(),
            e(),
            t.on("resize", function () {
                d.hasClass("msg-profile-autohide") && (l.Win.width >= v ? s : a)(), l.Win.width >= c && l.Win.width < v && d.hasClass("msg-" + u) && (d.removeClass("msg-" + u), a()), i();
            });
    }),
        l.coms.docReady.push(l.Message);
})(NioApp, jQuery);
