<?php echo get_instance()->header(); ?>
<script type="text/javascript">
    function SetCoverHeight()
    {
        var h = $('#page_header').height();
        console.log(h);
        if(h == 190)
        {
            $('#page_header').animate({height:'500px'});
            $('#show_icon').removeClass('icon-download-alt');
            $('#show_icon').addClass('icon-upload-alt');
        }
        else
        {
            $('#page_header').animate({height:'200px'}); 
            $('#show_icon').removeClass('icon-upload-alt');
            $('#show_icon').addClass('icon-download-alt')
        }
    }
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
                <li>
                    <a href="<?php echo site_url('user/all')?>">Classmates</a>
                </li>
                <li class="active">
                    <?php echo $user->full_name; ?>
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
            <div class="page-header" id="page_header" style="position: relative;overflow:hidden;margin-top:0px;height:200px">
                <img src="<?php echo $user->user_cover_photo; ?>" style="position: absolute;top:-<?php echo $user->cover_offset_y; ?>px;width:100%" />
                <a href="javascript:;" class="badge badge-teal"  onclick="SetCoverHeight()" style="position: absolute;bottom:10px;right:10px"><i id="show_icon" class="icon icon-download-alt"></i></a>
                <div class="well well-sm" style="position:absolute;bottom:0px;">
                    <img width="90" class="pull-left" src="https://graph.facebook.com/<?php echo $user->user_id; ?>/picture?width=90&height=90" class="pull-left" alt="<?php echo $user->full_name; ?> picture in facebook" style="margin-right:5px"/>
                    <h1 class="pull-left"><?php echo $user->full_name; ?><br /><small><?php echo $user->is_teacher() ? 'Teacher' : ($user->is_guest () ? 'Guest' :  'Classmate'); ?></small></h1>
                <div style="clear: both;"></div>
                <div class="row" style="padding-right: 15px;"><a target="_blank" href="https://www.facebook.com/<?php echo $user->fb_username; ?>"><i class="icon icon-facebook pull-right"<?php if(strlen($user->access_token)): ?> style="color: blue;"<?php else:?> style="color: black;"<?php endif;?>></i></a></div>
                </div>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="tabbable">
                <ul id="myTab" class="nav nav-tabs tab-bricky">
                    <li class="active">
                        <a href="#panel_tab2_example1" data-toggle="tab">
                            <i class="green fa fa-home"></i> About <?php echo $user->herhim; ?>
                        </a>
                    </li>
                    <li class="Comments">
                        <a href="#panel_tab2_example2" data-toggle="tab">
                            Comments <?php if($comments): ?><span class="badge badge-danger"><?php echo count($comments); ?></span><?php endif; ?>
                        </a>
                    </li>
                    <?php if($user->is_student()):?>
                        <li class="Comments">
                            <a href="#panel_tab2_example3" data-toggle="tab">
                                Exam Marks
                            </a>
                        </li>
                        <?php endif;?>
                    <?php if($current_user->is_admin()): ?>
                        <li class="Comments">
                            <a href="#panel_tab2_example4" data-toggle="tab">
                                Manage
                            </a>
                        </li>
                        <?php endif;?>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel_tab2_example1">
                        <?php echo $user->herhis; ?> badges : <?php echo $user->print_all_bages(); ?>
                        <hr />
                        <?php echo $user->user_about; ?>
                        <?php if($current_user->user_id == $user->user_id):?>
                            <p class="alert alert-info">You are looking your own profile. <?php if(!$user->user_about):?> But, why did not you write anything abouy yourself? <a href="<?php echo site_url('account/about_me'); ?>">Click here to complete your profile.</a><?php else: ?> <a href="<?php echo site_url('account/about_me'); ?>">Click here to edit this text.</a><?php endif; ?></p>
                            <?php elseif(!strlen(trim($user->user_about))): ?>
                            <?php echo $user->user_name; ?> has not written anything about <?php echo $user->herhim; ?>self yet :(                        
                            <?php endif; ?>   

                    </div>
                    <div class="tab-pane" id="panel_tab2_example2">
                        <div class="panel-body panel-scroll">
                            <ol class="discussion">   
                                <?php if($comments) foreach($comments as $comment):?>
                                    <li class="<?php echo $user->user_id == $this->current_user->user_id ? 'self' : 'other'?>">
                                        <div class="avatar">
                                            <img alt="" src="<?php echo fb_profile_pic_url($comment->comment_from_id); ?>">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                <?php echo $comment->comment_text; ?>
                                            </p>
                                            <span class="time" style="font-size: 11px;"><?php echo $comment->comment_date ?></span>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="chat-form">
                            <form method="post">
                                <div class="input-group">
                                    <textarea type="text" name="comment_text" class="form-control input-mask-date" placeholder="Write something about <?php echo $user->user_id == $this->current_user->user_id ? "yourself" : $user->user_name; ?>"></textarea>
                                    <span class="input-group-btn">
                                        <input class="btn btn-primary" name="add_comment" type="submit" value="Send"/>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="panel_tab2_example3">

                        <?php foreach($panels as $track_id => $panel):?>

                            <div class="row">
                                <div class="col-md-12">      
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="icon-question-sign"></i>
                                            Track # <?php echo $track_id; ?>
                                        </div>
                                        <div class="panel-body">    
                                            <table class="table table-bordered table-condensed">
                                                <tr><th>Quiz Name</th><th>Quiz Date</th><th>Score</th></tr>
                                                <?php foreach($panel as $quiz): ?>  
                                                    <tr><td><?php echo $quiz['quiz_name']?></td><td><?php echo $quiz['quiz_date']?></td><td><?php echo $quiz['score']; ?></td></tr>
                                                    <?php endforeach;?>
                                            </table>   

                                        </div>
                                    </div> 

                                </div>
                            </div>   
                            <?php endforeach;?>

                    </div>
                    <?php if($current_user->is_admin()): ?>
                        <div class="tab-pane" id="panel_tab2_example4">
                            <div class="row col-md-12" style="padding: 10px;">
                                <a href="<?php echo site_url('user/delete/' . $user->user_id);?>" class="badge badge-danger">Delete User</a>
                            </div>

                            <form method="post">
                                <div class="input-group">
                                    <select name="badge_id" class="form-control">
                                        <?php  foreach($all_badges  as $badge):?>
                                            <option value="<?php echo $badge->badge_id?>"><?php echo $badge->badge_name?></option> 
                                            <?php  endforeach; ?> 
                                    </select>
                                    <span class="input-group-btn">
                                        <input class="btn btn-primary" name="add_badge" type="submit" value="Add"/>
                                    </span>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th>Badge</th><th>Action</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach($badges as $badge):?>
                                        <tr><th><?php echo $badge; ?></th><th><a href="<?php echo site_url('user/delete_badge/' . $badge->user_badge_id); ?>">Delete</a></th></tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php endif;?>
                </div>
            </div>
        </div>
    </div> 
     </div>
<?php echo get_instance()->footer(); ?>
