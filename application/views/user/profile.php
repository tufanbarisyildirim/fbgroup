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
                    <?php echo $user->name. " " . $user->surname; ?>
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
                <h1>Classmate <small><?php echo $user->name. " " . $user->surname; ?></small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="clip-bubble-4"></i>
                    Comments
                </div>
                <div class="panel-body panel-scroll">
                    <ol class="discussion">

                        <?php if($comments) foreach($comments as $comment):?>
                            <li class="<?php echo $user->id == $this->current_user->id ? 'self' : 'other'?>">
                                <div class="avatar">
                                    <img alt="" src="<?php echo fb_profile_pic_url($comment->from_id); ?>">
                                </div>
                                <div class="messages">
                                    <p>
                                        <?php echo $comment->text; ?>
                                    </p>
                                    <span class="time" style="font-size: 11px;"><?php echo $comment->comment_date ?></span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="chat-form">
                <form method="post">
                    <div class="input-group">
                        <textarea type="text" name="comment_text" class="form-control input-mask-date" placeholder="Write something about <?php echo $user->id == $this->current_user->id ? "yourself" : $user->name; ?>"></textarea>
                        <span class="input-group-btn">
                            <input class="btn btn-primary" name="add_comment" type="submit" value="Send"/>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div> 
     </div >
<?php echo get_instance()->footer(); ?>
