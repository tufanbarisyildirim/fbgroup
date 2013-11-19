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
                Top 5s
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
            <h1>Top 5s <small>these charts will show you as soon as you believed!</small></h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>

<?php foreach($panels as $track_id => $panel):?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-question-sign"></i>
                    Track # <?php echo $track_id; ?>
                </div>
                <div class="panel-body">  

                    <?php foreach($panel as $quiz):?>    
                        <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="icon-question-sign"></i>
                                   <?php echo $quiz['name']; ?>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed">
                                        <tr><th>Name</th><th>Score</th></tr>
                                        <?php foreach($quiz['top5'] as $user): ?>
                                            <tr><td><img src="<?php echo fb_profile_pic_url($user['user_id']); ?>" class="circle-img" width="30" />&nbsp;<a href="<?php echo site_url('user/profile/' . $user['id'] )?>"><?php echo $user['name']; ?> <?php echo $user['surname']; ?></a></td><td><?php echo $user['score']; ?></td></tr>
                                            <?php endforeach;?>
                                    </table>
                                </div>
                            </div> 

                        </div>

                        <?php endforeach;?>


                </div>
            </div> 

        </div>
    </div>   
    <?php endforeach;?>
    
        
<?php echo get_instance()->footer(); ?>