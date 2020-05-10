<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:38 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Login | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/images/logo-pemilu.jpg">

    <!-- App css -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" /> -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Alegreya+Sans:900');

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: sans-serif;
            color: #36342F;
        }

        #home {
            background: url('assets/images/images/BG_kotak_02.jpg');
            background-repeat: repeat;
            background-position: center;
            height: 50%;
            width: 100%;
            display: table;
        }

        #home::before {
            content: '';
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 9;
        }

        .landing-text {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            position: relative;
            z-index: 10;
            height: 100vh;
        }

        h1 {
            font-family: 'Alegreya Sans', sans-serif;
            font-size: 400%;
            line-height: .8;
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
            transition: .3s linear!important;
            position: relative;
        }
        a.pilihan::hover {
            transform: scale(1.3)!important;
            border-radius: 50%!important;
        }

        a.pilihan i::before {
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            background-size: 200% 200%!important;
            background-position: 75% 75%!important;
            top: 0;
            left: 0;
            line-height: 80px;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        a.pilihan:hover i::before {
            background-position: 0% 0%;
        }

        .mdi-water-well-outline::before{
            background-image: linear-gradient(135deg, #3b5998 30%, #0a3d62 50%);
        }

    </style>

</head>

<body>
    <div id="home">
        <div class="landing-text">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-4 col-xl-4 ">
                        <a href="" class="pilihan">
                            <i class="mdi mdi-water-well-outline"></i>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="card">

                            <div class="text-center account-logo-box">
                                <div class="mt-2 mb-2">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/logo.png" alt="" height="36"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <form action="#">

                                    <div class="form-group">
                                        <input class="form-control" type="text" id="username" required=""
                                            placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="password" required="" id="password"
                                            placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox checkbox-success">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                                checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember
                                                me</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mt-4 pt-2">
                                        <div class="col-sm-12">
                                            <a href="page-recoverpw.html" class="text-muted"><i
                                                    class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center mt-2">
                                        <div class="col-12">
                                            <button
                                                class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-5">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html"
                                        class="text-primary ml-1"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </div>



    <!-- end page -->

    <!-- Vendor js -->
    <!-- <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script> -->

    <!-- App js -->
    <!-- <script src="<?php echo base_url();?>assets/js/app.min.js"></script> -->

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:38 GMT -->

</html>