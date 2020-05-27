$(document).ready(function() {
    $("form").parsley();
        
    $("#datepicker-autoclose-start").datepicker({
        autoclose: !0,
        todayHighlight: !0
    }).on('changeDate', function(e) {
        // Revalidate the date field
        $(this).parsley().validate();
    });
    $("#datepicker-autoclose-end").datepicker({
        autoclose: !0,
        todayHighlight: !0
    }).on('changeDate', function(e) {
        // Revalidate the date field
        $(this).parsley().validate();
    });
    $("#timepicker-start").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    }).on('changeDate', function(e) {
        // Revalidate the date field
        $(this).parsley().validate();
    });
    $("#timepicker-end").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    }).on('changeDate', function(e) {
        // Revalidate the date field
        $(this).parsley().validate();
    });
});