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
                <h1><i class="icon-question-sign teal"></i> <small style="color: #000;font-weight: 700"><?php echo $question->question_title; ?></small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-md-12">
        <div class="panel-body messages">
            <div class="messages-content" style="margin-left: 0px;">
                <div class="message-header">
                    <img style="margin-right: 10px" class="pull-left" src="<?php echo  fb_profile_pic_url($question->user_id);?>" width="40" />
                    <div class="message-time">
                        <?php echo $question->question_date; ?>
                    </div>
                    <div class="message-from">
                        <?php echo $question->user->full_name; ?>
                    </div>

                    <?php if($controller->current_user->user_id=='680557739'):?>
                        <div class="message-actions">
                            <a title="Move to trash" href="#"><i class="icon-trash"></i></a>
                            <a title="Reply" href="#"><i class="icon-reply"></i></a>
                            <a title="Reply to all" href="#"><i class="icon-reply-all"></i></a>
                            <a title="Forward" href="#"><i class="icon-long-arrow-right"></i></a>
                        </div>
                        <?php endif;?>
                    <div style="clear: both;"></div>
                </div>
                <div class="message-content">     
                    <?php echo $question->question_content; ?>
                </div>
            </div>
        </div>
        <?php foreach($answers as $answer): ?>
            <div class="panel-body messages">
                <div class="messages-content" style="margin-left: 0px;">
                    <div class="message-header">
                        <img style="margin-right: 10px" class="pull-left" src="<?php echo  fb_profile_pic_url($answer->user_id);?>" width="40" />
                        <div class="message-time">
                            <?php echo $answer->answer_date; ?>
                        </div>
                        <div class="message-from">
                            <?php echo $answer->user->full_name; ?>
                        </div>

                        <?php if($controller->current_user->user_id=='680557739'):?>
                            <div class="message-actions">
                                <a title="Move to trash" href="#"><i class="icon-trash"></i></a>
                                <a title="Reply" href="#"><i class="icon-reply"></i></a>
                                <a title="Reply to all" href="#"><i class="icon-reply-all"></i></a>
                                <a title="Forward" href="#"><i class="icon-long-arrow-right"></i></a>
                            </div>
                            <?php endif;?>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="message-content">     
                        <?php echo $answer->answer_content; ?>
                    </div>
                </div>
            </div> 
            <?php endforeach; ?>

    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- start: FORM VALIDATION 2 PANEL -->
            <div class="panel-body">
                <h2><i class="icon-lightbulb teal"></i> ANSWER</h2>
                <p>
                    Remember; Your knowledge consists of your shares!
                </p>
                <hr>
                <form action="#" method="post" role="form" id="form2">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">
                                    Answer details <span class="symbol required"></span>
                                </label>
                                <div class="summernote" style="border: 1px solid #eee;"></div>
                                <textarea class="form-control no-display" id="comment_detail" name="answer_detail" cols="10" rows="10"></textarea>
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
                                Send Answer <i class="icon-circle-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- end: FORM VALIDATION 2 PANEL -->
        </div>
    </div>
</div>
<?php echo get_instance()->footer(); ?>