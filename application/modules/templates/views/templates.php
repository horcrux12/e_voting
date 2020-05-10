<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/adminty/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 10:49:02 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <title>Adminty - Premium Admin Template by Colorlib </title>


  <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords"
    content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">

  <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/bower_components/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/assets/icon/themify-icons/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/assets/icon/icofont/css/icofont.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/assets/icon/feather/css/feather.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/files/assets/css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/files/_pcmenu.scss">
  <?php echo $css ?>
</head>

<body>

<!-- Loader -->
  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
          <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
              <i class="feather icon-menu"></i>
            </a>
            <a href="index.html">
              <img class="img-fluid" src="<?php echo base_url();?>/files/assets/images/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
              <i class="feather icon-more-horizontal"></i>
            </a>
          </div>
          <div class="navbar-container container-fluid">
            <!-- <ul class="nav-left">
              <li class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                  </div>
                </div>
              </li>
              <li>
                <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                  data-cf-modified-73ce404e8c00386d4c2e041a-="">
                  <i class="feather icon-maximize full-screen"></i>
                </a>
              </li>
            </ul> -->
            <!-- Right Navbar -->
            <ul class="nav-right">
              <!-- <li class="header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">
                    <i class="feather icon-bell"></i>
                    <span class="badge bg-c-pink">5</span>
                  </div>
                  <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
                    data-dropdown-out="fadeOut">
                    <li>
                      <h6>Notifications</h6>
                      <label class="label label-danger">New</label>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-4.jpg"
                          alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">John Doe</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-3.jpg"
                          alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">Joseph William</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-4.jpg"
                          alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">Sara Soudein</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                    <i class="feather icon-message-square"></i>
                    <span class="badge bg-c-green">3</span>
                  </div>
                </div>
              </li> -->
              <li class="user-profile header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url();?>/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                    <span>John Doe</span>
                    <i class="feather icon-chevron-down"></i>
                  </div>
                  <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                    data-dropdown-out="fadeOut">
                    <li>
                      <a href="#!">
                        <i class="feather icon-settings"></i> Settings
                      </a>
                    </li>
                    <li>
                      <a href="user-profile.html">
                        <i class="feather icon-user"></i> Profile
                      </a>
                    </li>
                    <li>
                      <a href="email-inbox.html">
                        <i class="feather icon-mail"></i> My Messages
                      </a>
                    </li>
                    <li>
                      <a href="auth-lock-screen.html">
                        <i class="feather icon-lock"></i> Lock Screen
                      </a>
                    </li>
                    <li>
                      <a href="auth-normal-sign-in.html">
                        <i class="feather icon-log-out"></i> Logout
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- <div id="sidebar" class="users p-chat-user showChat">
        <div class="had-container">
          <div class="card card_main p-fixed users-main">
            <div class="user-box">
              <div class="chat-inner-header">
                <div class="back_chatBox">
                  <div class="right-icon-control">
                    <input type="text" class="form-control  search-text" placeholder="Search Friend"
                      id="search-friends">
                    <div class="form-icon">
                      <i class="icofont icofont-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-friend-list">
                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe"
                  data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                  <a class="media-left" href="#!">
                    <img class="media-object img-radius img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-3.jpg"
                      alt="Generic placeholder image ">
                    <div class="live-status bg-success"></div>
                  </a>
                  <div class="media-body">
                    <div class="f-13 chat-header">Josephin Doe</div>
                  </div>
                </div>
                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe"
                  data-toggle="tooltip" data-placement="left" title="Lary Doe">
                  <a class="media-left" href="#!">
                    <img class="media-object img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-2.jpg"
                      alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                  </a>
                  <div class="media-body">
                    <div class="f-13 chat-header">Lary Doe</div>
                  </div>
                </div>
                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice"
                  data-toggle="tooltip" data-placement="left" title="Alice">
                  <a class="media-left" href="#!">
                    <img class="media-object img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-4.jpg"
                      alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                  </a>
                  <div class="media-body">
                    <div class="f-13 chat-header">Alice</div>
                  </div>
                </div>
                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia"
                  data-toggle="tooltip" data-placement="left" title="Alia">
                  <a class="media-left" href="#!">
                    <img class="media-object img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-3.jpg"
                      alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                  </a>
                  <div class="media-body">
                    <div class="f-13 chat-header">Alia</div>
                  </div>
                </div>
                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen"
                  data-toggle="tooltip" data-placement="left" title="Suzen">
                  <a class="media-left" href="#!">
                    <img class="media-object img-radius" src="<?php echo base_url();?>/files/assets/images/avatar-2.jpg"
                      alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                  </a>
                  <div class="media-body">
                    <div class="f-13 chat-header">Suzen</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- <div class="showChat_inner">
        <div class="media chat-inner-header">
          <a class="back_chatBox">
            <i class="feather icon-chevron-left"></i> Josephin Doe
          </a>
        </div>
        <div class="media chat-messages">
          <a class="media-left photo-table" href="#!">
            <img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url();?>/files/assets/images/avatar-3.jpg"
              alt="Generic placeholder image">
          </a>
          <div class="media-body chat-menu-content">
            <div class="">
              <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
              <p class="chat-time">8:20 a.m.</p>
            </div>
          </div>
        </div>
        <div class="media chat-messages">
          <div class="media-body chat-menu-reply">
            <div class="">
              <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
              <p class="chat-time">8:20 a.m.</p>
            </div>
          </div>
          <div class="media-right photo-table">
            <a href="#!">
              <img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url();?>/files/assets/images/avatar-4.jpg"
                alt="Generic placeholder image">
            </a>
          </div>
        </div>
        <div class="chat-reply-box p-b-20">
          <div class="right-icon-control">
            <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
            <div class="form-icon">
              <i class="feather icon-navigation"></i>
            </div>
          </div>
        </div>
      </div> -->

      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
              <div class="pcoded-navigatio-lavel">Navigation</div>
              <ul class="pcoded-item pcoded-left-item">
                <li class="">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                  </a>
                </li>
                <li class="">
                  <a href="navbar-light.html">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Navigation</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- Main Content -->
          <div class="pcoded-content">
            <div class="pcoded-inner-content">

              <div class="main-body">
                <div class="page-wrapper">
                  <?php $this->load->view($page_content) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?php echo base_url();?>/files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php echo base_url();?>/files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php echo base_url();?>/files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php echo base_url();?>/files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php echo base_url();?>/files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/jquery/js/jquery.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/popper.js/js/popper.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/modernizr/js/modernizr.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/modernizr/js/css-scrollbars.js"></script>

  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/i18next/js/i18next.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <script src="<?php echo base_url();?>/files/assets/js/pcoded.min.js" type="73ce404e8c00386d4c2e041a-text/javascript"></script>
  <script src="<?php echo base_url();?>/files/assets/js/vartical-layout.min.js" type="73ce404e8c00386d4c2e041a-text/javascript"></script>
  <script src="<?php echo base_url();?>/files/assets/js/jquery.mCustomScrollbar.concat.min.js" type="73ce404e8c00386d4c2e041a-text/javascript"></script>

  <script type="73ce404e8c00386d4c2e041a-text/javascript" src="<?php echo base_url();?>/files/assets/js/script.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"type="73ce404e8c00386d4c2e041a-text/javascript"></script>
  <script type="73ce404e8c00386d4c2e041a-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script src="<?php echo base_url();?>/files/rocket-loader.min.js" data-cf-settings="73ce404e8c00386d4c2e041a-|49" defer=""></script>
  <script>
    $( document ).ready(function() {
        $( "#pcoded" ).pcodedmenu({
            FixedHeaderPosition: true,
            FixedNavbarPosition: false,
        });
    });
  </script>

  <?php echo $js ?>
</body>

<!-- Mirrored from colorlib.com//polygon/adminty/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Mar 2020 10:49:02 GMT -->

</html>