<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/layouts-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:47 GMT -->

<head>
    <meta charset="utf-8" />
    <title>E-Voting | <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/images/logo-pemilu.jpg">

    <?php echo $css; ?>

    <!-- App css -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">


                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url();?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1"><?php echo $this->session->userdata['nama']?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="<?php echo base_url()?>logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <!-- <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                            <i class="mdi mdi-settings noti-icon"></i>
                        </a>
                    </li> -->

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?php echo base_url()?>dashboard" class="logo text-center">
                    <span class="logo-lg">
                        <img src="<?php echo base_url();?>assets/images/logo-light.png" alt="" height="18">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">
                        
                        <li>
                            <a href="<?php echo base_url();?>dashboard" class="waves-effect waves-light">
                                <i class="mdi mdi-calendar"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="menu-title">Data E-Voting</li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="mdi mdi-invert-colors"></i>
                                <span> Kegiatan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="<?php echo base_url();?>kegiatan">Data Kegiatan</a></li>
                                <li><a href="<?php echo base_url();?>pemilihan">Data Pemilihan</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="mdi mdi-invert-colors"></i>
                                <span> TPS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="<?php echo base_url();?>tps">Data TPS</a></li>
                                <li><a href="<?php echo base_url();?>panitia">Data Panitia</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>bilik" class="waves-effect waves-light">
                                <i class="mdi mdi-calendar"></i>
                                <span> Bilik </span>
                            </a>
                        </li>
                        <li class="menu-title">Data Pemilih</li>
                        <li>
                            <a href="<?php echo base_url();?>pemilih_umum" class="waves-effect waves-light">
                                <i class="mdi mdi-calendar"></i>
                                <span> Umum </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>pemilih_pelajar" class="waves-effect waves-light">
                                <i class="mdi mdi-calendar"></i>
                                <span> Pelajar/Mahasiswa </span>
                            </a>
                        </li>
                        <li class="menu-title">Data Kandidat</li>
                        <li>
                            <a href="<?php echo base_url();?>kandidat" class="waves-effect waves-light">
                                <i class="mdi mdi-calendar"></i>
                                <span> Kandidat </span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php $this->load->view($page_content); ?>
                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2018 - 2020 &copy; Zircos theme by <a href="#">Coderthemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <!-- <div class="rightbar-overlay"></div> -->

    <!-- <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
        </a> -->

    <!-- Vendor js -->
    <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
    <!-- <script>
        var baseurl = "<?php echo base_url()?>";
    </script> -->
    <script src="<?php echo base_url();?>assets/js/url_api.js"></script>

    <?php echo $js; ?>
    
    <!-- App js -->
    <script src="<?php echo base_url();?>assets/js/app.min.js"></script>

    
    <!-- <script>
        $(document).ready(function(){
            console.log("ready")
        });
    </script> -->


</body>
<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/layouts-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:10:48 GMT -->

</html>