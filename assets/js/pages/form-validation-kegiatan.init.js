$(document).ready(function() {
    $("form").parsley();
        
    $("#datepicker-autoclose-start").datepicker({
        autoclose: !0,
        todayHighlight: !0
    });
    $("#datepicker-autoclose-end").datepicker({
        autoclose: !0,
        todayHighlight: !0
    });
    $("#timepicker-start").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    });
    $("#timepicker-end").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    });
});