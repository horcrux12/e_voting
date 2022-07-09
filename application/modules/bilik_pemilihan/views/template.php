<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/extras-coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 16:07:18 GMT -->
<head>
    <meta charset="utf-8" />
    <title>E-voting | Bilik Suara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/images/logo-pemilu.jpg">

    <!-- App css -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <?php if(isset($css)){
        echo $css;
    } ?>
    <style>
        .ilang{
            display: none;
        }
    </style>

</head>

<body class="authentication-bg">
    <!-- <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="fas fa-home h2"></i></a>
    </div> -->
    <div class="d-block p-2 text-white" style="background-color: #cc0000!important;">
        <div class="row my-3">
            <div class="col-lg-2 col-sm-3">
                <img class="pl-5" src="<?php echo base_url()?>assets/images/images/pemilu-logo.png" alt="" height="150">
            </div>
            <div class="col-lg-8 col-sm-6 text-center align-middle">
                <h2 class="text-white align-middle">Bilik Suara <?php echo $this->session->userdata['no_bilik'].' - '.$tps[0]['nama']?></h2>
                <p class="text-white mb-1" style="font-size: 26px;"><?php echo $kegiatan[0]['nama_kegiatan']?></p>
                <p class="text-white"><?php echo $kegiatan[0]['alamat']?></p>
            </div>
        </div>
    </div>
    <div class="account-pages my-4 pt-4">
        <?php isset($page) ? $this->load->view($page) :'' ?>
        <!-- end col -->
    </div>
    <!-- end container -->

    <!-- Vendor js -->
    <script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="<?php echo base_url()?>assets/libs/jquery-countdown/jquery.countdown.min.js"></script>

    <!-- Countdown js -->
    <script src="<?php echo base_url()?>assets/js/pages/coming-soon.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>assets/js/app.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/url_api.js"></script>
    
    <?php if(isset($js)){
        echo $js;
    } ?>

    <script>
        $(document).ready(function(){
            // console.log('ready');

            var interval_start = setInterval(function() {
                $.ajax({
                    type: 'POST',
                    url: baseurl + 'bilik-suara/get-status',
                    dataType : 'JSON',
                    success: function(params) {
                        // console.log(params);
                        if (params.status_login == 0) {
                            clearInterval(interval_start);
                            alert('Akun sedang digunakan, Anda akan logout secara otomatis!!');
                            window.location.href = baseurl+'logout';
                        }
                    }
                });
            }, 1000);

            // var waktu = setInterval(function() {
            //     $.ajax({
            //         type: 'POST',
            //         url: baseurl + 'bilik-suara/get-interval',
            //         dataType : 'JSON',
            //         success: function(params) {
            //             // console.log(params);
            //             if (params.tps[0].tambahan_waktu != null) {
            //                 var tgl_end     = new Date(params.tps[0].tambahan_waktu);
            //                 var time_limits = params.tps[0].tambahan_waktu;
            //             }else{
            //                 var tgl_end     = new Date(params.kegiatan[0].end_date);
            //                 var time_limits = params.kegiatan[0].end_date;
            //             }
            //             var tgl_begin   = new Date(params.kegiatan[0].start_date); 
                        
            //             var tanggal     = new Date();
            //             var hasil_awal  =  tanggal - tgl_begin;
            //             var hasil_akhir =  tgl_end - tanggal;
                        
            //             if (hasil_awal < 0 || hasil_akhir < 0) {
            //                 clearInterval(waktu);
            //                 location.reload();
            //             }
            //         }
            //     })
                
            //     // if (hasil < 0) {
            //     //     clearInterval(interval_start);
            //     // }
            // }, 1000);

            // $('.pilihan').on('click',function(){
            //     if (confirm('Apakah Anda Yakin Memilih ?')) {
            //         var no_urut = $(this).parents('.alas').data('urutan');
            //         var id      = $(this).parents('.alas').data('id');
            //         var next    = no_urut + 1;

            //         var isi = $(this).data('kandidat');
            //         $('[name="pilihan-'+id+'"]').val(isi);
            //         console.log($('[name="pilihan-'+id+'"]').val())

            //         if ($('#alas-'+no_urut).data('index') != 'end') {
            //             $.when($('#alas-'+no_urut).fadeOut(1200)).done(function(){
            //                 $('#alas-'+next).slideDown(1200);
            //             });
            //         }else{
            //             $('#form').submit();
            //         }
                    
            //         // $('#alas-'+next).show();
            //     }
            // });
        });
        
    </script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/extras-coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 16:07:20 GMT -->
</html>