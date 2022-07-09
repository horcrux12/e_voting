$(document).ready(function(){
    // console.log('ready');

    var waktu = setInterval(function() {
        $.ajax({
            type: 'POST',
            url: baseurl + 'bilik-suara/get-interval',
            dataType : 'JSON',
            success: function(params) {
                
                // if (hasil < 0) {
                //     clearInterval(waktu);
                //     location.reload();
                // }
                if (params.tps[0].tambahan_waktu != null) {
                    var tgl_end     = new Date(params.tps[0].tambahan_waktu);
                    var time_limits = params.tps[0].tambahan_waktu;
                }else{
                    var tgl_end     = new Date(params.kegiatan[0].end_date);
                    var time_limits = params.kegiatan[0].end_date;
                }
                var tgl_begin   = new Date(params.kegiatan[0].start_date); 
                
                var tanggal     = new Date();
                var hasil_awal  =  tgl_begin - tanggal;
                var hasil_akhir =  tgl_end - tanggal;
                
                if (hasil_awal < 0 ) {
                    if (hasil_akhir < 0) {
                        clearInterval(waktu);
                        location.reload();
                    }else{
                        clearInterval(waktu);
                        location.reload();
                    }
                }
                
            }
        })
        
        // if (hasil < 0) {
        //     clearInterval(interval_start);
        // }
    }, 1000);
});