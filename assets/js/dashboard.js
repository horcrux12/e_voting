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

                $('a').on('click',function(e){
                    e.stopImmediatePropagation();
                    if ($(this).hasClass('disabled')) {
                        // console.log('a');
                        e.preventDefault();
                    }
                    
                });

                var tanggal_indo = tgl_end.getDate()+' '+bulan[tgl_end.getMonth()]+' '+tgl_end.getFullYear()+' '+tgl_end.getHours()+':'+tgl_end.getMinutes();

                // console.log(tanggal_indo);

                if ($('#waktu-pemilihan').data('time') != time_limits) {
                    var waktu = '<span class="font-weight-medium">Waktu Akhir: </span>'+tanggal_indo;
                    $('#waktu-pemilihan').html(waktu);
                    $('#waktu-pemilihan').data('time',time_limits);
                }
                
                if (hasil_awal < 0 || hasil_akhir < 0) {
                    // console.log(hasil_awal);
                    // console.log(hasil_akhir);
                    // console.log('disable');
                    if (!$('#link-data').hasClass('disabled')) {
                        $('#link-data').toggleClass('disabled');
                        $("#daftar_bilik").hide();
                    }
                    if ($('#link-berita-acara').hasClass('disabled')) {
                        $('#link-berita-acara').toggleClass('disabled');
                    }

                    $('.bilik_suara').each(function(){
                        if (!$(this).hasClass('disabled')) {
                            $(this).toggleClass('disabled');
                        }
                        if ($(this).hasClass('disabled')) {
                            $('.bilik_suara').parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Tidak Aktif, Waktu Pemilihan Habis');                        
                        }
                    });
                    
                    if (!$('#bilik-habis').is(':visible')) {
                        $('#bilik-habis').show();
                    }
                }else{
                    // #link-berita-acara
                    // console.log('not disable');
                    if ($('#link-data').hasClass('disabled')) {
                        $('#link-data').removeClass('disabled');
                    }
                    if (!$('#link-berita-acara').hasClass('disabled')) {
                        $('#link-berita-acara').toggleClass('disabled');
                    }
                    if ($('#bilik-habis').is(':visible')) {
                        $('#bilik-habis').hide();
                        // console.log('keliatan');
                    }
                    if (params.bilik.length > 0) {
                        for (let i = 0; i < params.bilik.length; i++) {
                            if (params.bilik[i].id_pemilih != null) {
                                if (!$('#bilik-'+params.bilik[i].id_bilik).hasClass('disabled')) {
                                    $('#bilik-'+params.bilik[i].id_bilik).toggleClass('disabled');
                                    $('#bilik-'+params.bilik[i].id_bilik).parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Tidak Aktif, Bilik Terisi, '+params.bilik[i].nama);
                                }
                            }else{
                                if ($('#bilik-'+params.bilik[i].id_bilik).hasClass('disabled')) {
                                    $('#bilik-'+params.bilik[i].id_bilik).toggleClass('disabled');
                                    $('#bilik-'+params.bilik[i].id_bilik).parents('.card-body').find('.wigdet-one-content .text-bawah').html('<span class="font-weight-medium">Status : </span>Aktif, Bilik Kosong');
                                }
                            }
                        }
                    }
                }
            }
        });
        
    
        
        // if (hasil < 0) {
        //     clearInterval(interval_start);
        // }
    }, 1000); 
});