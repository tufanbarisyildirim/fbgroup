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
                <h1>Profile <small><?php echo $user->full_name; ?></small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-sm-12">
    
        <h4>My badges</h4><?php echo $user->print_all_badges(); ?>
        <h4><a href="<?php echo site_url('account/about_me'); ?>">About me</a></h4>
        <h4><a href="<?php echo site_url('user/profile/' . $user->user_id); ?>">My Public Profile</a></h4>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>