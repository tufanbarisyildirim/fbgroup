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
                    Questions
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
                <h1>Questions <small>ask a new one</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- start: FORM VALIDATION 2 PANEL -->
          
          
                
                <div class="panel-body">
                    <h2><i class="icon-question-sign teal"></i> ASK A QUESTION</h2>
                    <p>
                        Don't hasitate to ask about anything, we have a great teacher who can give tons of tricks in a lesson!
                    </p>
                    <hr>
                    <form action="#" method="post" role="form" id="form2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                                </div>
                                <div class="successHandler alert alert-success no-display">
                                    <i class="icon-ok"></i> Your form validation is successful!
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Question title <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Summerize your question" class="form-control" id="firstname2" name="question_title">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Question details <span class="symbol required"></span>
                                    </label>
                                    <div class="summernote" style="border: 1px solid #eee;"></div>
                                    <textarea class="form-control no-display" id="comment_detail" name="question_detail" cols="10" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <span class="symbol required"></span>Required Fields
                                    <hr>
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
                                    Send Question <i class="icon-circle-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
            <!-- end: FORM VALIDATION 2 PANEL -->
        </div>
    </div>

                    </div >
<?php echo get_instance()->footer(); ?>