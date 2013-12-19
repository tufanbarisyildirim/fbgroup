<?php echo get_instance()->header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<!-- start: PAGE TITLE & BREADCRUMB -->
			<ol class="breadcrumb">
				<li>
					<i class="clip-home-3"></i>
					<a href="#">
						Home
					</a>
				</li>
				<li class="active">
					Listening
				</li>
				<li class="search-box">
					<form class="sidebar-search">
						<div class="form-group">
							<input type="text" placeholder="Start Searching..." data-default="130">
							<button class="submit">
								<i class="clip-search-3"></i>
							</button>
						</div>
					</form>
				</li>
			</ol>
			<div class="page-header">
				<h1>Listening <small> </small></h1>
			</div>
			<!-- end: PAGE TITLE & BREADCRUMB -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php $i = 0;
				function sortus($a,$b){
					$sort = array(
						'Unit 1' =>  1,
						'Unit 2' =>  2,
						'Unit 3' =>  3,
						'Review 1' =>  4,
						'Unit 4' =>  5,
						'Unit 5' =>  6,
						'Unit 6' =>  7,
						'Review 2' =>  8,
						'Unit 7' =>  9,
						'Unit 8' =>  10,
						'Unit 9' =>  11,
						'Review 3' =>  12,
						'Unit 10' =>  13,
						'Unit 11' =>  14,
						'Unit 12' =>  15,
						'Review 4' =>  16
					);  
					return $sort[$a] - $sort[$b];
				}

				foreach($levels as $level => $units):
					uksort($units,'sortus');

				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="icon-question"></i>
						<?php echo $level; ?>
					</div>
					<div class="panel-body">
						<div class="panel-group accordion-custom accordion-teal" id="accordion">
							<?php  foreach($units as $unit => $recordings): ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
												<i class="icon-arrow"></i>
												<b><?php echo $unit; ?></b>
											</a></h4>
									</div>
									<div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
										<div class="panel-body">
											<?php $id = 1; foreach($recordings as $record):?>
												<div>Recording <?php echo $id++; ?> <object type="application/x-shockwave-flash" data="<?php echo assets_url();?>/plugins/player/player_mp3.swf" width="200" height="20">
														<param name="movie" value="<?php echo assets_url();?>/plugins/player/player_mp3.swf" />
														<param name="FlashVars" value="mp3=<?php echo assets_url();?>/listening/<?php echo $level . "/". $unit ."/". $record;?>" />
													</object></div> 
												<?php endforeach; ?>
										</div>
									</div>
								</div>
								<?php $i++; endforeach; ?>

						</div>
					</div>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>
<?php echo get_instance()->footer(); ?>