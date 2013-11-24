<?php echo get_instance()->header(); ?>
<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.css">
<script src="<?php echo assets_url(); ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.min.js"></script>
<script src="<?php echo assets_url(); ?>/js/form-validation.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function() {
       // FormValidator.init();
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
                    Blog
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
                <h1>Blog <small>improve your english writing skill</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-sm-12">
      
            <h2><i class="clip-bubble-3"></i>&nbsp;What's Going On These Days?</h2>
            <p>
               Share with your friends, discuss on your writing or the topic you wrote.
            </p>
            <hr>
            <form action="#" method="post" role="form" id="form2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">
                                Post Title <span class="symbol required"></span>
                            </label>
                            <input type="text" placeholder="Write your post title" class="form-control" value="<?php echo isset($post) ? $post->post_title :'' ?>" id="post_title" name="post_title">
                        </div>  
                    </div>
                </div>
                <div class="row">
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

                <div class="row">
                    <div class="col-md-8">
                        <p>

                        </p>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block" type="submit" name="save_post">
                            Post it! <i class="icon-circle-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div >
<?php echo get_instance()->footer(); ?>