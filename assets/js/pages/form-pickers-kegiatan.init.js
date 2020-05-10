// ! function(n) {
//     "use strict";
//     var e = function() {};
//     e.prototype.init = function() {
//         n("#timepicker").timepicker({
//             defaultTIme: !1,
//             icons: {
//                 up: "mdi mdi-chevron-up",
//                 down: "mdi mdi-chevron-down"
//             }
//         }), n("#timepicker2").timepicker({
//             showMeridian: !1,
//             icons: {
//                 up: "mdi mdi-chevron-up",
//                 down: "mdi mdi-chevron-down"
//             }
//         }), n("#timepicker3").timepicker({
//             minuteStep: 15,
//             icons: {
//                 up: "mdi mdi-chevron-up",
//                 down: "mdi mdi-chevron-down"
//             }
//         }), n("#datepicker-autoclose-start").datepicker({
//             autoclose: !0,
//             todayHighlight: !0
//         }),n("#datepicker-autoclose-end").datepicker({
//             autoclose: !0,
//             todayHighlight: !0
//         })
//     }, n.FormPickers = new e, n.FormPickers.Constructor = e
// }(window.jQuery),
// function(e) {
//     "use strict";
//     window.jQuery.FormPickers.init()
// }();
(function ($) {
    $("#datepicker-autoclose-start").datepicker({
        autoclose: !0,
        todayHighlight: !0
    })
    $("#datepicker-autoclose-end").datepicker({
        autoclose: !0,
        todayHighlight: !0
    })
})