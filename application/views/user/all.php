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
                <li class="active">
                    Classmates
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
                <h1>Classmates <small>all</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- start: TABLE WITH IMAGES PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    All users
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>

                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                            <i class="icon-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="icon-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $badge_colors = array(
                                    'teacher' => 'success',
                                    'student' => 'info',
                                    'guest' => 'orange',
                                    'administrator' => 'danger'
                                ); 
                                foreach($users as $user):

                                ?>
                                <tr>
                                    <td><a href="<?php echo site_url('user/profile/' . $user->user_id)?>"><img src="<?php echo  fb_profile_pic_url($user->user_id);?>" width="30" class="circle-img"/> <?php echo $user->full_name; ?></a></td>
                                    <td><?php echo $user->print_badges(); ?></td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end: TABLE WITH IMAGES PANEL -->
        </div>
    </div>
</div >
<?php echo get_instance()->footer(); ?>