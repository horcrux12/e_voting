<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>E-Voting </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/images/logo-pemilu.jpg">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">x -->
    <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #36404e;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        a.pilihan {
            margin: 0 20px;
            width: 80px;
            height: 80px;
            background-color: #ccc;
            display: inline-block;
            border-radius: 24px;
            box-shadow: 6px 6px 12px rgba(0, 0, 0, .15),
                -6px -6px 12px rgba(255, 255, 255, .1);
            overflow: hidden;
            font-size: 28px;
            transition: .3s linear;
            position: relative;
        }

        a.pilihan:hover {
            transform: scale(1.3);
            border-radius: 50%;
        }

        .over:hover {
            transform: scale(1.1);
            transition: .3s linear;
        }
        .over:hover h4.judul {
            color: #fff !important;
            transition: .3s linear;
        }

        a.pilihan i::before {
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            background-size: 200% 200%;
            background-position: 75% 75%;
            top: 0;
            left: 0;
            line-height: 80px;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: background .5s linear;
        }

        a.pilihan:hover i::before {
            background-position: 0% 0%;
        }

        .mdi-chart-tree::before {
            background-image: linear-gradient(135deg, #3b5998 30%, #0a3d62 50%);
        }

        .mdi-home-edit::before {
            background-image: linear-gradient(135deg, #1da1f2 30%, #0a3d62 50%);
        }

        .fa-instagram::before {
            background-image: linear-gradient(135deg, #c32aa3 30%, #0a3d62 50%);
        }

        .mdi-water-well-outline::before {
            background-image: linear-gradient(135deg, #d71e18 30%, #0a3d62 50%);
        }

        .fa-linkedin-in::before {
            background-image: linear-gradient(135deg, #007bb5 30%, #0a3d62 50%);
        }
        .tittle {
            font-size: 400%;
            line-height: .8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-xl-12" style="margin-bottom: 150px;">
                <h4 class="tittle text-light">
                    <img src="<?php echo base_url()?>assets/images/logo-voting.png" alt="" style="height: 100px">
                </h4>
            </div>
            <div class="col-lg-4 mb-5 over">
                <a href="<?php echo base_url()?>login/super-admin" class="pilihan"><i class=" mdi mdi-chart-tree"></i></a>
                <a href="<?php echo base_url()?>login/super-admin"><h4 class="judul text-muted">Administrator</h4></a>
            </div>
            <div class="col-lg-4 over">
                <a href="<?php echo base_url()?>login/admin-tps" class="pilihan"><i class="mdi mdi-home-edit"></i></a>
                <a href="<?php echo base_url()?>login/admin-tps"><h4 class="judul text-muted">TPS</h4></a>
            </div>
            <div class="col-lg-4 over">
                <a href="<?php echo base_url()?>login/bilik" class="pilihan"><i class="mdi mdi-water-well-outline"></i></a>
                <a href="<?php echo base_url()?>login/bilik"><h4 class="judul text-muted">Bilik Suara</h4></a>
            </div>
        </div>
    </div>
    <div class="sm">
        
        
        
        
    </div>
    <!-- Vendor js -->
    <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url();?>assets/js/app.min.js"></script>
    <script>
        $(document).ready(function(){
            // $(".over").each(function(){
            //     $(this).on('hover',function(){
            //         ("a.pilihan").css({"transform":"scale(1.3)","border-radius":"50%"});
            //     })
            // })
            // $(".over").hover(function(){
            //     $(this"a.pilihan").css({"transform":"scale(1.3)","border-radius":" %"});
            // })
        });
    </script>
</body>

</html>