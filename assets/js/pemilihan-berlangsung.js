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
                var hasil_awal  =  tanggal - tgl_begin;
                var hasil_akhir =  tgl_end - tanggal;
                
                if (hasil_awal < 0 || hasil_akhir < 0) {
                    clearInterval(waktu);
                    location.reload();
                }
            }
        })
        
        // if (hasil < 0) {
        //     clearInterval(interval_start);
        // }
    }, 1000);  

    $('.pilihan').on('click',function(){
        // console.log();
        let img_src = $(this).children('img').attr('src');
        let no_urut = $(this).siblings('.judul').children('.card-title').text();
        let nama_kdt = $(this).siblings('.judul').children('.card-subtitle').text()
        Swal.fire({
            title: 'Apakah Anda setuju?',
            text: `Memilih kandidat ${nama_kdt}, dengan nomor urut ${no_urut}`,
            imageUrl: img_src,
            imageHeight: 200,
            showDenyButton: true,
            confirmButtonText: `Setuju`,
            denyButtonText: `Tidak Setuju`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var no_urut = $(this).parents('.alas').data('urutan');
                var id      = $(this).parents('.alas').data('id');
                var next    = no_urut + 1;
    
                var isi = $(this).data('kandidat');
                $('#pilihan-'+id).val(isi);
                // console.log($('#pilihan-'+id).val())
    
                if ($('#alas-'+no_urut).data('index') != 'end') {
                    $.when($('#alas-'+no_urut).fadeOut(1200)).done(function(){
                        $('#alas-'+next).slideDown(1200);
                    });
                }else{
                    $('#form').submit();
                }
            } else if (result.isDenied || result.dismiss === Swal.DismissReason.backdrop) {
              Swal.fire('Silahkan lakukan pemilihan kembali', '', 'info')
            }
        });
    });
});