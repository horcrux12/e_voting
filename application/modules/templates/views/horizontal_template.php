<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:07:55 GMT -->
<head>
        <meta charset="utf-8" />
        <title>E-Voting | <?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

        <?php echo $css; ?>

        <!-- App css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body data-layout="horizontal">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <div class="container-fluid"> 
                            <ul class="list-unstyled topnav-menu float-right mb-0">
    
                                <li class="dropdown notification-list">
                                    <!-- Mobile menu toggle-->
                                    <a class="navbar-toggle nav-link">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>
    
                                <li class="dropdown notification-list">
                                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="<?php echo base_url();?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
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
    
                            </ul>
    
                            <!-- LOGO -->
                            <div class="logo-box">
                                <a href="index.html" class="logo text-center">
                                    <span class="logo-lg">
                                        <img src="<?php echo base_url();?>assets/images/logo.png" alt="" height="30">
                                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                                    </span>
                                    <span class="logo-sm">
                                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                                        <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end Topbar -->
    
                    <div class="topbar-menu">
                        <div class="container-fluid">
                            <div id="navigation">
                                <!-- Navigation Menu-->
                                <ul class="navigation-menu">
    
                                    <li class="has-submenu">
                                        <a href="#"> <i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                                        <ul class="submenu">
                                            <li><a href="index.html">Dashboard 1</a></li>
                                            <li><a href="dashboard_2.html">Dashboard 2</a></li>
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#">
                                            <i class="mdi mdi-layers"></i>UI Kit
                                        </a>
                                        <ul class="submenu megamenu">
                                            <li>
                                                <ul>
                                                    <li>
                                                        <span>Components</span>
                                                    </li>
                                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                                    <li><a href="ui-typography.html">Typography</a></li>
                                                    <li><a href="ui-card.html">Card</a></li>
                                                    <li><a href="ui-portlets.html">Portlets</a></li>
                                                    <li><a href="ui-modals.html">Modals</a></li>
                                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                                    <li><a href="ui-tabs.html">Tabs</a></li>
                                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                                </ul>
                                            </li>
    
                                            <li>
                                                <ul>
                                                    <li>
                                                        <span>Components</span>
                                                    </li>
                                                    <li><a href="ui-notifications.html">Notification</a></li>
                                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                                    <li><a href="ui-carousel.html">Carousel</a></li>
                                                    <li><a href="ui-video.html">Video</a></li>
                                                    <li><a href="ui-tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                                                    <li><a href="ui-images.html">Images</a></li>
                                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                                    <li><a href="ui-grid.html">Grid</a></li>
                                                </ul>
                                            </li>
    
                                            <li>
                                                <ul>
                                                    <li>
                                                        <span>Admin UI</span>
                                                    </li>
                                                    <li><a href="admin-sweet-alert2.html">Sweet Alert 2</a></li>
                                                    <li><a href="admin-widgets.html">Widgets</a></li>
                                                    <li><a href="admin-nestable.html">Nestable List</a></li>
                                                    <li><a href="admin-rangeslider.html">Range Slider</a></li>
                                                    <li><a href="admin-ratings.html">Ratings</a></li>
                                                    <li><a href="admin-animation.html">Animation</a></li>
                                                    <li><a href="calendar.html">Calendar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#">
                                            <i class="mdi mdi-diamond-stone"></i>Components
                                        </a>
                                        <ul class="submenu">
                                            <li class="has-submenu">
                                                <a href="#">Forms <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="form-elements.html">Form Elements</a></li>
                                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                                    <li><a href="form-validation.html">Form Validation</a></li>
                                                    <li><a href="form-pickers.html">Form Pickers</a></li>
                                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                                    <li><a href="form-mask.html">Form Masks</a></li>
                                                    <li><a href="form-summernote.html">Summernote</a></li>
                                                    <li><a href="form-quilljs.html">Quilljs Editor</a></li>
                                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-submenu">
                                                <a href="#">Charts <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="chart-flot.html">Flot Charts</a></li>
                                                    <li><a href="chart-morris.html">Morris Charts</a></li>
                                                    <li><a href="chart-google.html">Google Charts</a></li>
                                                    <li><a href="chart-chartist.html">Chartist Charts</a></li>
                                                    <li><a href="chart-chartjs.html">Chartjs Charts</a></li>
                                                    <li><a href="chart-c3.html">C3 Charts</a></li>
                                                    <li><a href="chart-sparkline.html">Sparkline Charts</a></li>
                                                    <li><a href="chart-knob.html">Jquery Knob</a></li>
                                                </ul>
                                            </li>
    
                                            <li class="has-submenu">
                                                <a href="#">Email <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="email-inbox.html"> Inbox</a></li>
                                                    <li><a href="email-read.html"> Read Mail</a></li>
                                                    <li><a href="email-compose.html"> Compose Mail</a></li>
                                                </ul>
                                            </li>
    
                                            <li class="has-submenu">
                                                <a href="#">Icons <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="icons-colored.html">Colored Icons</a></li>
                                                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                                                    <li><a href="icons-ionicons.html">Ion Icons</a></li>
                                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                                    <li><a href="icons-themifyicon.html">Themify Icons</a></li>
                                                    <li><a href="icons-typicons.html">Typicons</a></li>
                                                </ul>
                                            </li>
    
                                            <li class="has-submenu">
                                                <a href="#">Tables <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                                    <li><a href="tables-layouts.html">Tables Layouts</a></li>
                                                    <li><a href="tables-datatable.html">Data Table</a></li>
                                                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                                                    <li><a href="tables-tablesaw.html">Tablesaw Table</a></li>
                                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                                </ul>
                                            </li>
    
                                            <li class="has-submenu">
                                                <a href="#">Maps <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                    <li><a href="maps-google.html">Google Maps</a></li>
                                                    <li><a href="maps-vector.html">Vector Maps</a></li>
                                                    <li><a href="maps-mapael.html">Mapael Maps</a></li>
                                                </ul>
                                            </li>
    
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#">
                                            <i class="mdi mdi-google-pages"></i>Pages
                                        </a>
                                        <ul class="submenu megamenu">
                                            <li>
                                                <ul>
                                                    <li><a href="page-starter.html">Starter Page</a></li>
                                                    <li><a href="page-login.html">Login</a></li>
                                                    <li><a href="page-register.html">Register</a></li>
                                                    <li><a href="page-logout.html">Logout</a></li>
                                                    <li><a href="page-recoverpw.html">Recover Password</a></li>
                                                </ul>
                                            </li>
    
                                            <li>
                                                <ul>
                                                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                                    <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                                    <li><a href="page-404.html">Error 404</a></li>
                                                    <li><a href="page-404-alt.html">Error 404-alt</a></li>
                                                    <li><a href="page-500.html">Error 500</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#">
                                            <i class="mdi mdi-book-multiple"></i>Extras
                                        </a>
                                        <ul class="submenu megamenu">
                                            <li>
                                                <ul>
                                                    <li><a href="extras-profile.html">Profile</a></li>
                                                    <li><a href="extras-sitemap.html">Sitemap</a></li>
                                                    <li><a href="extras-about.html">About Us</a></li>
                                                    <li><a href="extras-contact.html">Contact</a></li>
                                                    <li><a href="extras-members.html">Members</a></li>
                                                    <li><a href="extras-timeline.html">Timeline</a></li>
                                                    <li><a href="extras-invoice.html">Invoice</a></li>
                                                </ul>
                                            </li>
    
                                            <li>
                                                <ul>
                                                    <li><a href="extras-search-result.html">Search Result</a></li>
                                                    <li><a href="extras-emailtemplate.html">Email Template</a></li>
                                                    <li><a href="extras-maintenance.html">Maintenance</a></li>
                                                    <li><a href="extras-coming-soon.html">Coming Soon</a></li>
                                                    <li><a href="extras-faq.html">FAQ</a></li>
                                                    <li><a href="extras-gallery.html">Gallery</a></li>
                                                    <li><a href="extras-pricing.html">Pricing</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#"> <i class="mdi mdi-comment-text"></i>Blog
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="blogs-dashboard.html">Dashboard</a></li>
                                            <li><a href="blogs-blog-list.html">Blog List</a></li>
                                            <li><a href="blogs-blog-column.html">Blog Column</a></li>
                                            <li><a href="blogs-blog-post.html">Blog Post</a></li>
                                            <li><a href="blogs-blog-add.html">Add Blog</a></li>
                                        </ul>
                                    </li>
    
                                    <li class="has-submenu">
                                        <a href="#"> <i class="mdi mdi-home-map-marker"></i>Real Estate
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="real-estate-dashboard.html">Dashboard</a></li>
                                            <li><a href="real-estate-list.html">Property List</a></li>
                                            <li><a href="real-estate-column.html">Property Column</a></li>
                                            <li><a href="real-estate-detail.html">Property Detail</a></li>
                                            <li><a href="real-estate-agents.html">Agents</a></li>
                                            <li><a href="real-estate-profile.html">Agent Details</a></li>
                                            <li><a href="real-estate-add.html">Add Property</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Layouts
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="layouts-vertical.html">Vertical</a></li>
                                            <li><a href="layouts-topbar-light.html">Topbar Light</a></li>
                                            <li><a href="layouts-center-menu.html">Center Menu</a></li>
                                            <li><a href="layouts-normal-header.html">Unsticky Header</a></li>
                                        </ul>
                                    </li>
    
                                </ul>
                                <!-- End navigation menu -->
    
                                <div class="clearfix"></div>
                            </div>
                            <!-- end #navigation -->
                        </div>
                        <!-- end container -->
                    </div>
                    <!-- end navbar-custom -->
                </header>
                <!-- End Navigation Bar-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <?php $this->load->view($page_content) ?>
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
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">
        
                <div class="p-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="<?php echo base_url();?>assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="<?php echo base_url();?>assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="<?php echo base_url();?>assets/css/bootstrap-dark.min.css" 
                            data-appStyle="<?php echo base_url();?>assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="<?php echo base_url();?>assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="<?php echo base_url();?>assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="<?php echo base_url();?>assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="<?php echo base_url();?>assets/css/bootstrap-dark.min.css" 
                            data-appStyle="<?php echo base_url();?>assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/eKY0g" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->

        <!-- Vendor js -->
        <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> -->
        <!-- <script>
            var baseurl = "<?php echo base_url()?>";
        </script> -->
        <script src="<?php echo base_url();?>assets/js/url_api.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.min.js"></script>

        <?php echo $js ?>
    </body>


<!-- Mirrored from coderthemes.com/zircos/layouts/horizontal/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 19:08:27 GMT -->
</html>