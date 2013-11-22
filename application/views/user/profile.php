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
                            <i class="green fa fa-home"></i> About her/him
                        </a>
                    </li>
                    <li class="Comments">
                        <a href="#panel_tab2_example2" data-toggle="tab">
                            Comments <?php if($comments): ?><span class="badge badge-danger"><?php echo count($comments); ?></span><?php endif; ?>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Dropdown &nbsp; <i class="fa fa-caret-down width-auto"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-info">
                            <li>
                                <a href="#panel_tab2_example3" data-toggle="tab">
                                    Dropdown 1
                                </a>
                            </li>
                            <li>
                                <a href="#panel_tab2_example4" data-toggle="tab">
                                    Dropdown 2
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel_tab2_example1">
                        
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
                        <p>
                            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.
                        </p>
                        <p>
                            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                        </p> 
                    </div>
                    <div class="tab-pane" id="panel_tab2_example4">
                      
                    </div>
                </div>
            </div>
        </div>
    </div> 
     </div >
<?php echo get_instance()->footer(); ?>
