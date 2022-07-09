$(document).ready(function(){
    // console.log('ready');

    var waktu = setInterval(function() {
        $.ajax({
            type: 'POST',
            url: baseurl + 'bilik-suara/get-interval',
            dataType : 'JSON',
            success: function(params) {
                // console.log(params);
                if (params.tps[0].tambahan_waktu != null) {
                    var tgl_end     = new Date(params.tps[0].tambahan_waktu);
                    var time_limits = params.tps[0].tambahan_waktu;
                }else{
                    var tgl_end     = new Date(params.kegiatan[0].end_date);
                    var time_limits = params.kegiatan[0].end_date;
                }
                var tgl_begin   = new Date(params.kegiatan[0].start_date); 
                
                var tanggal     = new Date();
                var hasil       = tgl_end - tanggal;
                
                if (hasil > 0) {
                    // console.log()
                    clearInterval(waktu);
                    location.reload();
                }
            }
        })
        
        // if (hasil < 0) {
        //     clearInterval(interval_start);
        // }
    }, 1000);
});