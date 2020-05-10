$(document).ready(function(){

    var url = window.location.origin+"/"+window.location.pathname.split('/')[1];
    
    $.ajax({
        type: 'POST',
        url: url + '/menu-user/ambil',
        dataType : 'JSON',
        success: function(params) {
            var tgl_end = new Date(2020,02,28,15,43,00);
            console.log(tgl_end)
            var tgl_ends = new Date(params[0].end);
            console.log(tgl_ends)
            var tanggal = new Date();
            console.log(tanggal)
            var hasil = 0;
            
            var interval = setInterval(function() {
                tanggal = new Date();
                hasil = tgl_end - tanggal;
                console.log(hasil)
                console.log(tanggal)
                if (hasil < 0) {
                    clearInterval(interval);
                }
            }, 1000);
            
        }
    })
    
});