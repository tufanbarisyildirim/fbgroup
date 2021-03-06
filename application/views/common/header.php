<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
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
	<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/datepicker/css/datepicker.css" id="skin_color">
	<!--[if IE 7]>
	<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
	<!-- end: MAIN CSS -->
	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
	<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/fullcalendar/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/DataTables/media/css/DT_bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>/plugins/select2/select2.css" />
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
	<script src="<?php echo assets_url(); ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo assets_url(); ?>/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo assets_url(); ?>/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo assets_url(); ?>/plugins/DataTables/media/js/DT_bootstrap.js"></script>
	<script src="<?php echo assets_url(); ?>/js/index.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Index.init();
			$('.date-picker').datepicker({
				autoclose: true
			});
		});
	</script>  
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top" style="background:url('<?php echo assets_url();?>/images/xmas_bg_n.gif');">
	<!-- start: TOP NAVIGATION CONTAINER -->
	<div class="container">

		<div class="navbar-header">
			<!-- start: RESPONSIVE MENU TOGGLER -->
			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="clip-list-2"></span>
			</button>
			<!-- end: RESPONSIVE MENU TOGGLER -->
			<!-- start: LOGO -->
			<a class="navbar-brand" href="<?php echo site_url(); ?>" style="color: #fff;">
				LEARN ENGLISH
			</a>  
			<div class="pull-left alert alert-info" style="margin-top: 6px;margin-bottom: 6px;padding: 5px;"><b><?php echo $random_word->word; ?></b> (<?php echo $random_word->form; ?>) : <?php echo $random_word->definition; ?></div>      
			<!-- end: LOGO -->
		</div>
		<div class="navbar-tools">
			<!-- start: TOP NAVIGATION MENU -->
			<ul class="nav navbar-right">    
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="clip-list-5" style="color: #fff;"></i>
						<?php if(count($todolist)): ?>   <span class="badge"><?php echo count($todolist)?></span>  <?php endif;?>
					</a>
					<ul class="dropdown-menu todo">
						<li>
							<span class="dropdown-menu-title"> You have <?php if(count($todolist)): ?><?php echo count($todolist)?><?php else:?>no<?php endif;?> pending <?php echo count($todolist) > 1 ? "tasks" : "task";?></span>
						</li>
						<li>
							<div class="drop-down-wrapper">
								<ul>
									<?php foreach($todolist as $task):?>
										<li>
											<a  href="<?php echo site_url('account/me/marks'); ?>">
												<span class="desc" style="opacity: 1; text-decoration: none;">Your <?php echo $task->quiz_name;?> mark is missing.</span>
											</a>
										</li>
										<?php endforeach; ?>
								</ul>
							</div>
						</li>
						<?php if(false):?>
							<li class="view-all">
								<a href="javascript:void(0)">
									See all tasks <i class="fa fa-arrow-circle-o-right"></i>
								</a>
							</li>
							<?php endif;?>

					</ul>
				</li>

				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="clip-list-5" style="color: #fff;"></i>
						<span class="badge"><?php echo $current_user->point ;?></span> 
					</a>
					<ul class="dropdown-menu todo">
						<li>
							<span class="dropdown-menu-title">Reputation details</span>
						</li>
						<li>
							<div class="drop-down-wrapper">
								<ul>
									<?php foreach($points as $point):?>
										<li>
											<a href="<?php echo site_url( $point->url); ?>"><span class="desc" style="opacity: 1; text-decoration: none;"><?php echo $point->text; ?></span></a>
										</li>
										<?php endforeach; ?>
								</ul>
							</div>
						</li>
						<?php if(false):?>
							<li class="view-all">
								<a href="javascript:void(0)">
									See all tasks <i class="fa fa-arrow-circle-o-right"></i>
								</a>
							</li>
							<?php endif;?>

					</ul>
				</li>

				<!-- start: USER DROPDOWN -->
				<li class="dropdown current-user" >
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img src="<?php echo assets_url(); ?>/images/christmas_hat.png" style="width: 30px;position: absolute;top: -2px;left: 17px;">
						<img width="30" src="<?php echo fb_profile_pic_url($controller->current_user->user_id); ?>" class="circle-img" alt="">
						<span class="username" style="color: #fff;"><?php echo $controller->current_user->user_name ?> <?php echo $controller->current_user->user_surname ?></span>
						<i class="clip-chevron-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo site_url('account/me'); ?>">
								<i class="clip-user-2"></i>
								&nbsp;My Profile
							</a>
						</li>
						<li class="divider"></li>   
						<li>
							<a href="<?php echo site_url('actions/logout'); ?>">
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