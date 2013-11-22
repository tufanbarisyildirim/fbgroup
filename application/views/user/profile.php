<?php echo get_instance()->header(); ?>
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
        <div class="page-header">
            <img width="50" src="https://graph.facebook.com/<?php echo $user->user_id; ?>/picture?large" class="pull-left" alt="<?php echo $user->full_name; ?> picture in facebook" style="margin-right:5px"/>
            <h1>Classmate <small><?php echo $user->full_name; ?></small></h1>
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
                <li class="Comments">
                    <a href="#panel_tab2_example3" data-toggle="tab">
                        Exam Marks
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="panel_tab2_example1">
                    <?php echo $user->user_about; ?>
                    <?php if($current_user->user_id == $user->user_id):?>
                        <p class="alert alert-info">You are looking your own profile. <?php if(!$user->user_about):?> But, why did not you write anything abouy yourself? <a href="<?php echo site_url('account/about_me'); ?>">Click here to complete your profile.</a><?php else: ?> <a href="<?php echo site_url('account/about_me'); ?>">Click here to edit this text.</a><?php endif; ?></p>
                        <?php elseif(!$user->user_about): ?>
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
                        </di
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
                </div>
            </div>
        </div>
    </div> 
     </div >
<?php echo get_instance()->footer(); ?>
