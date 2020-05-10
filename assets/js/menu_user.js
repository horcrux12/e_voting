$(document).ready(function(){
    $("#shown").on('click',function() {
        var $pwd = $("#inputPassword");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });

    $("#user_datatable").DataTable({
        lengthMenu: [[10, 25, 60, -1], [10, 25, 60, "All"]],
		cahce: false
    });
});