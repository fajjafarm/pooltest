!(function (t, n) {
    "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = n())
        : "function" == typeof define && define.amd
        ? define(n)
        : ((t =
              "undefined" != typeof globalThis
                  ? globalThis
                  : t || self).dayjs_plugin_quarterOfYear = n());
})(this, function () {
    "use strict";
    var s = "month",
        u = "quarter";
    return function (t, n) {
        n = n.prototype;
        n.quarter = function (t) {
            return this.$utils().u(t)
                ? Math.ceil((this.month() + 1) / 3)
                : this.month((this.month() % 3) + 3 * (t - 1));
        };
        var e = n.add;
        n.add = function (t, n) {
            return (
                (t = Number(t)),
                this.$utils().p(n) === u
                    ? this.add(3 * t, s)
                    : e.bind(this)(t, n)
            );
        };
        var r = n.startOf;
        n.startOf = function (t, n) {
            var e = this.$utils(),
                i = !!e.u(n) || n;
            if (e.p(t) !== u) return r.bind(this)(t, n);
            n = this.quarter() - 1;
            return i
                ? this.month(3 * n)
                      .startOf(s)
                      .startOf("day")
                : this.month(3 * n + 2)
                      .endOf(s)
                      .endOf("day");
        };
    };
});
