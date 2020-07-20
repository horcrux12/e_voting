$(document).ready(function(){

    // var url = window.location.origin+"/"+window.location.pathname.split('/')[1];
    "use strict";
    // var d = 
    // console.log(d);
    

    var interval_start = setInterval(function() {
        $.ajax({
            type: 'POST',
            url: baseurl + 'dashboard/time-limit',
            dataType : 'JSON',
            success: function(params) {
                // console.log(params);
                var tgl_end     = new Date(params.kegiatan[0].end_date);
                var tgl_begin   = new Date(params.kegiatan[0].start_date); 
                
                var tanggal     = new Date();
                var hasil_awal  =  tanggal - tgl_begin;
                var hasil_akhir =  tgl_end - tanggal;

                var bulan       = [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'Sepetember',
                    'Oktober',
                    'November',
                    'Desember'
                ];

                var tanggal_indo = tgl_end.getDate()+' '+bulan[tgl_end.getMonth()]+' '+tgl_end.getFullYear()+' '+tgl_end.getHours()+':'+tgl_end.getMinutes();

                // console.log(tanggal_indo);

                if ($('#waktu-pemilihan').data('time') != params.kegiatan[0].end_date) {
                    var waktu = '<span class="font-weight-medium">Waktu Akhir: </span>'+tanggal_indo;
                    $('#waktu-pemilihan').html(waktu);
                    $('#waktu-pemilihan').data('time',params.kegiatan[0].end_date);
                }
                
                if (hasil_awal < 0 || hasil_akhir < 0) {
                    // console.log(hasil_awal);
                    // console.log(hasil_akhir);
                    // console.log('disable');
                    if (!$('#link-beita-acara, #link-data').hasClass('disabled')) {
                        $('#link-beita-acara, #link-data').addClass('disabled');
                        $("#daftar_bilik").hide();
                    }

                    $('.bilik_suara').each(function(){
                        if (!$(this).hasClass('disabled')) {
                            $(this).addClass('disabled');
                        }
                        if ($(this).hasClass('disabled')) {
                            $('.bilik_suara').parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Tidak Aktif, Waktu Pemilihan Habis');                        
                        }
                    });
                    
                    if (!$('#bilik-habis').is(':visible')) {
                        $('#bilik-habis').show();
                    }
                    
                    $(".disabled").click(function(e){
                        e.preventDefault();
                    });
                }else{
                    // console.log('not disable');
                    if ($('#link-beita-acara, #link-data').hasClass('disabled')) {
                        $('#link-beita-acara, #link-data').removeClass('disabled');
                    }
                    if ($('#bilik-habis').is(':visible')) {
                        $('#bilik-habis').hide();
                        // console.log('keliatan');
                    }
                    if (params.bilik.length > 0) {
                        for (let i = 0; i < params.bilik.length; i++) {
                            if (params.bilik[i].id_pemilih != null) {
                                if (!$('#bilik-'+params.bilik[i].id_pemilih).hasClass('disabled')) {
                                    $('#bilik-'+params.bilik[i].id_pemilih).addClass('disabled');
                                    $('#bilik-'+params.bilik[i].id_pemilih).parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Tidak Aktif, Bilik terisi');                        
                                }
                                if ($('#bilik-'+params.bilik[i].id_pemilih).hasClass('disabled')) {
                                    $('#bilik-'+params.bilik[i].id_pemilih).parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Tidak Aktif, Bilik terisi');                        
                                }
                            }else{

                            }
                        }
                    }
                }
            }
        })
        
        // if (hasil < 0) {
        //     clearInterval(interval_start);
        // }
    }, 1000); 
});