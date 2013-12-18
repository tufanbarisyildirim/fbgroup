<?php   $controler_name =  get_instance()->uri->rsegments[1]; ?>    
<?php  $method_name =  get_instance()->uri->rsegments[2]; ?>    
<!-- start: SIDEBAR -->
<div class="main-navigation navbar-collapse collapse">
    <!-- start: MAIN MENU TOGGLER BUTTON -->
    <div class="navigation-toggler">
        <i class="clip-chevron-left"></i>
        <i class="clip-chevron-right"></i>
    </div>
    <!-- end: MAIN MENU TOGGLER BUTTON -->
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li<?php if($controler_name =='dashboard'):?> class="active open"<?php endif;?>>
            <a href="<?php echo site_url('dashboard'); ?>"><i class="clip-home-3"></i>
                <span class="title"> Dashboard </span><span class="selected"></span>
            </a>
        </li>
        <li<?php if($controler_name =='user'):?> class="active open"<?php endif;?>>
            <a href="<?php echo site_url('user'); ?>"><i class="clip-facebook"></i>
                <span class="title">Classmates</span><span class="selected"></span>
            </a>
        </li>
        <li<?php if($controler_name =='vocabulary'):?> class="active open"<?php endif;?>>
            <a href="<?php echo site_url('vocabulary'); ?>"><i class="clip-plus-circle-2"></i>
                <span class="title">Vocabulary</span><span class="selected"></span>
            </a>
        </li>
        <li<?php if($controler_name =='qa'):?> class="active open"<?php endif;?>>
            <a href="javascript:;"><i class="clip-question"></i>
                <span class="title">Questions &amp; Answers </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li<?php if($method_name =='ask'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('qa/ask'); ?>">
                        <span class="title"> Ask A Question </span>
                    </a>
                </li>
                <li<?php if($method_name =='all'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('qa/all'); ?>">
                        <span class="title"> All questions </span>
                    </a>
                </li>
                <li<?php if($method_name =='important'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('qa/important'); ?>">
                        <span class="title"> Important Questions </span>
                    </a>
                </li>
            </ul>
        </li>
        <li<?php if($controler_name =='blog'):?> class="active open"<?php endif;?>>
            <a href="javascript:;"><i class="clip-pencil-3"></i>
                <span class="title"> Writings </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li<?php if($method_name =='all'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('blog/all'); ?>">
                        <span class="title"> All Writings </span>
                    </a>
                </li>
                <li<?php if($method_name =='write'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('blog/write'); ?>">
                        <span class="title"> Write a new </span>
                    </a>
                </li>
                <li<?php if($method_name =='myblog'):?> class="active open"<?php endif;?>>
                    <a href="<?php echo site_url('blog/myblog'); ?>">
                        <span class="title"> My Writings </span>
                    </a>
                </li>
            </ul>
        </li>
        <!--li>  
            <a href="javascript:void(0)"><i class="clip-grid-6"></i>
                <span class="title"> Tables </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo site_url('tables/scoreboard'); ?>">
                        <span class="title">Score Board</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('tables/exammarks'); ?>">
                        <span class="title">Exam Marks</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="title">Work Charts</span> <i class="icon-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                Ireggular Verbs 
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Using "go" verb 
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                Verbs without "-ing"
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </li-->
        <li<?php if($controler_name =='documents'):?> class="active open"<?php endif;?>>
            <a href="javascript:void(0)"><i class="clip-file"></i>
                <span class="title"> Documents </span><i class="icon-arrow"></i>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo site_url('documents/all'); ?>">
                        <span class="title">All</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('documents/projects'); ?>">
                        <span class="title">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('documents/homeworks'); ?>">
                        <span class="title">Homeworks</span>
                    </a>
                </li>
            </ul>
        </li>     
        <li>
            <a href="<?php echo site_url('rank/top5s'); ?>"><i class="clip-bars"></i>
                <span class="title">Top 5s</span>
                <span class="selected"></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('help'); ?>"><i class="clip-question"></i>
                <span class="title">Help</span>
                <span class="selected"></span>
            </a>
        </li>
        <?php if($current_user->is_moderator):?>
            <li<?php if($controler_name =='manage'):?> class="active open"<?php endif;?>>
                <a href="javascript:void(0)"><i class="clip-file"></i>
                    <span class="title"> Management </span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($current_user->is_admin):?>
                        <li>
                            <a href="<?php echo site_url('manage/quizzes'); ?>">
                                <span class="title">Quizzes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manage/badges'); ?>">
                                <span class="title">Badges</span>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('manage/lessons'); ?>">
                                <span class="title">Lessons</span>
                            </a>
                        </li>
                        <?php endif; ?>

                    <?php if($current_user->is_moderator):?>
                        <li<?php if($method_name =='absentings'):?> class="active open"<?php endif;?>>
                            <a href="<?php echo site_url('manage/absentings'); ?>">
                                <span class="title">Absentings</span>
                            </a>
                        </li>
                        <?php endif;?>
                </ul>
            </li> 
            <?php endif;?>  
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
    </div>
    <!-- end: SIDEBAR -->