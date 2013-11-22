<?php echo get_instance()->header(); ?>
<link rel="stylesheet" href="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.css">
<script src="<?php echo assets_url(); ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo assets_url(); ?>/plugins/summernote/build/summernote.min.js"></script>
<script src="<?php echo assets_url(); ?>/js/form-validation.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function() {
        FormValidator.init();
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
                    Profile
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
                <h1>My Profile <small><?php echo $user->full_name; ?></small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <div class="panel-body">
                <h2><i class="icon-lightbulb teal"></i> Write about yourself</h2>
                <p>
                    Feel free to write what you want. Don't worry about mistakes, your friends (also the teacher and guests) will give you feedbacks about your writing. This is how we will learn english!
                </p>
                <hr>
                <form action="#" method="post" role="form" id="form2">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="summernote" style="border: 1px solid #eee;"><?php echo $user->user_about; ?></div>
                                <textarea class="form-control no-display" id="about_me" name="about_me" cols="10" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <p>

                            </p>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" type="submit">
                                Save About Me <i class="icon-circle-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>