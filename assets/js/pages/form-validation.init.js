$(document).ready(function() {
    $("form").parsley()
}), $(function() {
    $("#demo-form").parsley().on("field:validated", function() {
        var n = 0 === $(".parsley-error").length;
        $(".alert-info").toggleClass("d-none", !n), $(".alert-warning").toggleClass("d-none", n)
    }).on("form:submit", function() {
        return !1
    })
});