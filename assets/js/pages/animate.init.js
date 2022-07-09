$(function () {
    $("body").on("click", ".demo-animation .btn", function () {
        var i = $(this).text(),
            n = $(this).closest(".card-box").find("img");
        (animationDuration = "hinge" === i ? 2100 : 1200),
            n.removeAttr("class"),
            n.addClass("animated " + i),
            setTimeout(function () {
                n.removeClass(i);
            }, animationDuration);
    });
});