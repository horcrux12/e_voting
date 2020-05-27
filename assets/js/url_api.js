function base_url(){
    var url = 'https://apimaflo.ojk.go.id/v1/'        
    return url;
}

var baseurl = window.location.origin+"/"+window.location.pathname.split('/')[1]+"/";
// console.log(baseurl);

function get_token(data_token){
    jQuery(document).ready(function ($) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: baseurl+'ambil-data/user',
        success : function(data){
            data_token(data.data);
            // console.log(data.data)
        }
    });
});
}

function get_user(data_user){
    jQuery(document).ready(function ($) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: baseurl+'ambil-data/user',
        success : function(data){
            data_user(data);
            // console.log(data.data)
        }
    });
});
}
