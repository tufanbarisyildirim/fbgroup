<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>Learn English</title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link href="<?php echo assets_url(); ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/fonts/style.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/iCheck/skins/all.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/css/theme_light.css" id="skin_color">
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/fullcalendar/fullcalendar/fullcalendar.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    
    
    <link rel="shortcut icon" href="favicon.ico" />
    
     <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="<?php echo assets_url(); ?>/plugins/respond.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo assets_url(); ?>/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="<?php echo assets_url(); ?>/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo assets_url(); ?>/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <script src="<?php echo assets_url(); ?>/js/index.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
            });
        </script>
    
    
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">

        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <!-- end: RESPONSIVE MENU TOGGLER -->
            <!-- start: LOGO -->
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                LEARN ENGLISH
            </a>          
            <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: TO-DO DROPDOWN -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="clip-list-5"></i>
                        <span class="badge"> 12</span>
                    </a>
                    <ul class="dropdown-menu todo">
                        <li>
                            <span class="dropdown-menu-title"> You have 12 pending tasks</span>
                        </li>
                        <li>
                            <div class="drop-down-wrapper">
                                <ul>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc" style="opacity: 1; text-decoration: none;"> Windows Phone 8 App</span>
                                            <span class="label label-danger" style="opacity: 1;"> today</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                            <span class="label label-danger" style="opacity: 1;"> today</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> Hire developers</span>
                                            <span class="label label-warning"> tommorow</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> Windows Phone 8 App</span>
                                            <span class="label label-warning"> tommorow</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> New frontend layout</span>
                                            <span class="label label-success"> this week</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> Hire developers</span>
                                            <span class="label label-success"> this week</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> New frontend layout</span>
                                            <span class="label label-info"> this month</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> Hire developers</span>
                                            <span class="label label-info"> this month</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc" style="opacity: 1; text-decoration: none;"> Windows Phone 8 App</span>
                                            <span class="label label-danger" style="opacity: 1;"> today</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                            <span class="label label-danger" style="opacity: 1;"> today</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="todo-actions" href="javascript:void(0)">
                                            <i class="icon-check-empty"></i>
                                            <span class="desc"> Hire developers</span>
                                            <span class="label label-warning"> tommorow</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="view-all">
                            <a href="javascript:void(0)">
                                See all tasks <i class="icon-circle-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: TO-DO DROPDOWN-->
                <!-- start: NOTIFICATION DROPDOWN -->
                <li class="dropdown">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                        <i class="clip-notification-2"></i>
                        <span class="badge"> 11</span>
                    </a>
                    <ul class="dropdown-menu notifications">
                        <li>
                            <span class="dropdown-menu-title"> You have 11 notifications</span>
                        </li>
                        <li>
                            <div class="drop-down-wrapper">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-primary"><i class="icon-user"></i></span>
                                            <span class="message"> New user registration</span>
                                            <span class="time"> 1 min</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> 7 min</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> 8 min</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> 16 min</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-primary"><i class="icon-user"></i></span>
                                            <span class="message"> New user registration</span>
                                            <span class="time"> 36 min</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-warning"><i class="icon-shopping-cart"></i></span>
                                            <span class="message"> 2 items sold</span>
                                            <span class="time"> 1 hour</span>
                                        </a>
                                    </li>
                                    <li class="warning">
                                        <a href="javascript:void(0)">
                                            <span class="label label-danger"><i class="icon-user"></i></span>
                                            <span class="message"> User deleted account</span>
                                            <span class="time"> 2 hour</span>
                                        </a>
                                    </li>
                                    <li class="warning">
                                        <a href="javascript:void(0)">
                                            <span class="label label-danger"><i class="icon-shopping-cart"></i></span>
                                            <span class="message"> Transaction was canceled</span>
                                            <span class="time"> 6 hour</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> yesterday</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-primary"><i class="icon-user"></i></span>
                                            <span class="message"> New user registration</span>
                                            <span class="time"> yesterday</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-primary"><i class="icon-user"></i></span>
                                            <span class="message"> New user registration</span>
                                            <span class="time"> yesterday</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> yesterday</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="label label-success"><i class="icon-comment"></i></span>
                                            <span class="message"> New comment</span>
                                            <span class="time"> yesterday</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="view-all">
                            <a href="javascript:void(0)">
                                See all notifications <i class="icon-circle-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: NOTIFICATION DROPDOWN -->
                <!-- start: MESSAGE DROPDOWN -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                        <i class="clip-bubble-3"></i>
                        <span class="badge"> 9</span>
                    </a>
                    <ul class="dropdown-menu posts">
                        <li>
                            <span class="dropdown-menu-title"> You have 9 messages</span>
                        </li>
                        <li>
                            <div class="drop-down-wrapper">
                                <ul>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="clearfix">
                                                <div class="thread-image">
                                                    <img alt="" src="assets/images/avatar-2.jpg">
                                                </div>
                                                <div class="thread-content">
                                                    <span class="author">Nicole Bell</span>
                                                    <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                    <span class="time"> Just Now</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="clearfix">
                                                <div class="thread-image">
                                                    <img alt="" src="assets/images/avatar-1.jpg">
                                                </div>
                                                <div class="thread-content">
                                                    <span class="author">Peter Clark</span>
                                                    <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                    <span class="time">2 mins</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="clearfix">
                                                <div class="thread-image">
                                                    <img alt="" src="assets/images/avatar-3.jpg">
                                                </div>
                                                <div class="thread-content">
                                                    <span class="author">Steven Thompson</span>
                                                    <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                    <span class="time">8 hrs</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="clearfix">
                                                <div class="thread-image">
                                                    <img alt="" src="assets/images/avatar-1.jpg">
                                                </div>
                                                <div class="thread-content">
                                                    <span class="author">Peter Clark</span>
                                                    <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                    <span class="time">9 hrs</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="clearfix">
                                                <div class="thread-image">
                                                    <img alt="" src="assets/images/avatar-5.jpg">
                                                </div>
                                                <div class="thread-content">
                                                    <span class="author">Kenneth Ross</span>
                                                    <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                    <span class="time">14 hrs</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="view-all">
                            <a href="pages_messages.html">
                                See all messages <i class="icon-circle-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: MESSAGE DROPDOWN -->
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img width="30" src="<?php echo fb_profile_pic_url($controller->current_user->id); ?>" class="circle-img" alt="">
                        <span class="username"><?php echo $controller->current_user->name ?> <?php echo $controller->current_user->surname ?></span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('account/me'); ?>">
                                <i class="clip-user-2"></i>
                                &nbsp;My Profile
                            </a>
                        </li>
                        <li>
                            <a href="pages_messages.html">
                                <i class="clip-bubble-4"></i>
                                &nbsp;My Messages
                            </a>
                        </li>
                        <li class="divider"></li>   
                        <li>
                            <a href="login_example1.html">
                                <i class="clip-exit"></i>
                                &nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
<div class="navbar-content">
<?php echo get_instance()->sidebar(); ?>
            </div>
            <!-- start: PAGE -->
            <div class="main-content">