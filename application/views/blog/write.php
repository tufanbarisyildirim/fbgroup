<?php echo get_instance()->header(); ?>
<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.css">
<script src="<?php echo assets_url(); ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.min.js"></script>
<script src="<?php echo assets_url(); ?>/js/form-validation.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
	jQuery(document).ready(function() {
		$(".search-select").select2({
			placeholder: "Select permitted users",
			allowClear: true
		});
	});
</script>
<div class="container">
	<!-- start: PAGE HEADER -->
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
					Writing
				</li>
				<li class="search-box">
					<form class="sidebar-search">
						<div class="form-group">
							<input type="text" placeholder="Start Searching...">
							<button class="submit">
								<i class="clip-search-3"></i>
							</button>
						</div>
					</form>
				</li>
			</ol>
			<div class="page-header">
				<h1>Writing <small>improve your english writing skill</small></h1>
			</div>
			<!-- end: PAGE TITLE & BREADCRUMB -->
		</div>
	</div>
	<div class="row col-sm-12">  
		<h2><i class="clip-bubble-3"></i>&nbsp;What's Going On These Days?</h2>
		<p>
			Share with your friends, discuss on your writing or the topic you wrote.
		</p>
		<p class="alert alert-success"><b>"Mistakes are for learning, not repeating".</b><br /> 
			When learning a language, don't worry about making mistakes - just get out there and practice!</p>
		<hr>
		<form action="#" method="post" role="form" id="form2">
			<div class="form-group">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">
							Post Title <span class="symbol required"></span>
						</label>
						<input type="text" placeholder="Write your post title" class="form-control" value="<?php echo isset($post) ? $post->post_title :'' ?>" id="post_title" name="post_title">
					</div>  
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">
							Post content <span class="symbol required"></span>
						</label>
						<div class="summernote" style="border: 1px solid #eee;display: none;"></div>
						<textarea class="form-control" id="post_content" name="post_content" cols="10" rows="10"><?php echo isset($post) ? $post->post_content :'' ?></textarea>
					</div>
				</div>
			</div>
			<?php if(isset($allusers) && $allusers):?>
				<div class="form-group">
					<div class="col-sm-12">
						<label>Is this a private writing for someones? Choose them! (empty means public)</label>
						<select name="permitted_users[]" multiple="multiple" id="form-field-select-2" class="form-control search-select">
							<?php foreach($allusers as $user): ?>
								<option value="<?php echo $user->user_id; ?>"><?php echo $user->full_name; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>
				<?php endif;?>

			<?php if($parent_id):?>
				<div class="form-group">
					<div class="col-sm-12">
					   <label>Do you want to add some notes for this revision?</label>
					   <textarea  name="revision_notes" class="form-control"></textarea>
					</div>
				</div>
				<?php endif; ?>

			<div class="form-group">
				<div class="col-md-8">

					<p>

					</p>
				</div>
				<div class="col-md-4">
				<input type="hidden" name="save_post" value="Yes!"/>
					<button onclick="$(this).attr('onlick','return false');$(this).html('Posting.. Please wait.');$('#form2').submit()" class="btn btn-primary btn-block" type="submit" value="Yes!" name="save_post">
						Post it! <i class="icon-circle-arrow-right"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div >
<?php echo get_instance()->footer(); ?>