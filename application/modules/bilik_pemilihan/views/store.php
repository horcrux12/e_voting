<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-voting - Store Suara</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/images/logo-pemilu.jpg">

    <!-- App css -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/libs/sweetalert2-10.0.2/package/dist/sweetalert2.min.css">
</head>
<body>
    
</body>
    <!-- Vendor js -->
    <script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="<?php echo base_url()?>assets/libs/jquery-countdown/jquery.countdown.min.js"></script>

    <!-- Countdown js -->
    <script src="<?php echo base_url()?>assets/js/pages/coming-soon.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>assets/js/app.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/url_api.js"></script>
    <script src="<?php echo base_url()?>assets/libs/sweetalert2-10.0.2/package/dist/sweetalert2.min.js"></script>
    <script>
        let timerInterval
        Swal.fire({
        title: 'Pemilihan berhasil!',
        html: 'Terimakasih telah mengguanakan hak pilih Anda,<br> Peringatan ini akan otomatis tertutup pada <b></b> milliseconds.',
        timer: 10000,
        timerProgressBar: true,
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
            const content = Swal.getContent()
            if (content) {
                const b = content.querySelector('b')
                if (b) {
                b.textContent = Swal.getTimerLeft()
                }
            }
            }, 100)
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer || result.dismiss === Swal.DismissReason.backdrop) {
                window.location.href='<?php echo base_url('bilik-suara/bilik')?>';
            }
        });
    </script>
</html>