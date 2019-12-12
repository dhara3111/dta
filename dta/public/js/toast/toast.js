function myToast(type, title, message, url) {

    var t, o = -1, e = 0;

    var n, a = type, i = message,
        s = title, r = 300, l = 1000, c = 5000,
        p = 1000, u = "swing", d = "linear", h = "fadeIn",
        v = "fadeOut", g = e++, f = $("#addClear").prop("checked");
    var k = toastr[a](i, s);
    t = k, void 0 !== k && (k.find("#okBtn").length && k.delegate("#okBtn", "click", function () {
        alert("you clicked me. i was toast #" + g + ". goodbye!"), k.remove()
    }), k.find("#surpriseBtn").length && k.delegate("#surpriseBtn", "click", function () {
        alert("Surprise! you clicked me. i was toast #" + g + ". You could perform an action here.")
    }), k.find(".clear").length && k.delegate(".clear", "click", function () {
        toastr.clear(k, {force: !0})
    }))
    toastr.options = {
        closeButton: 'checked',
        debug: $("#debugInfo").prop("checked"),
        newestOnTop: $("#newestOnTop").prop("checked"),
        progressBar: $("#progressBar").prop("checked"),
        positionClass: $("#positionGroup input:radio:checked").val() || "toast-top-right",
        preventDuplicates: $("#preventDuplicates").prop("checked"),
        onclick: null
    }, $("#addBehaviorOnToastClick").prop("checked") && (toastr.options.onclick = function () {
        alert("You can perform some custom action after a toast goes away")
    }), r.length && (toastr.options.showDuration = r), l.length && (toastr.options.hideDuration = l), c.length && (toastr.options.timeOut = f ? 0 : c), p.length && (toastr.options.extendedTimeOut = f ? 0 : p), u.length && (toastr.options.showEasing = u), d.length && (toastr.options.hideEasing = d), h.length && (toastr.options.showMethod = h), v.length && (toastr.options.hideMethod = v), f && (i = function (t) {
        return t = t || "Clear itself?", t += '<br /><br /><button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide clear">Yes</button>'
    }(i), toastr.options.tapToDismiss = !1), i || (++o === (n = ["New order has been placed!", "Are you the six fingered man?", "Inconceivable!", "I do not think that means what you think it means.", "Have fun storming the castle!"]).length && (o = 0), i = n[o]), $("#toastrOptions").text("toastr.options = " + JSON.stringify(toastr.options, null, 2) + ";\n\ntoastr." + a + '("' + i + (s ? '", "' + s : "") + '");');

}