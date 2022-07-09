<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>E-voting | Login Administrator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/images/logo-pemilu.jpg">

        <!-- App css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="text-center account-logo-box">
                                <div class="mt-2 mb-2">
                                    <a href="index.html" class="text-success">
                                        <span><img src="<?php echo base_url();?>assets/images/logo-voting.png" alt="" height="36"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <form action="<?php echo base_url('login/auth_super')?>" method="POST">

                                    <div class="form-group">
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Password">
                                        <input class="form-control" type="password" name="level" required="" id="level" value="<?php echo $data_level?>" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox checkbox-success">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.min.js"></script>

        <?php if (isset($js)) {
            echo $js;
        } ?>

    </body>


<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:38 GMT -->
</html>