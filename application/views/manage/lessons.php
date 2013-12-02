<?php echo get_instance()->header(); ?>
<div class="container">
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
                    Lessons
                </li>
                <li class="search-box">
                    <form class="sidebar-search">
                        <div class="form-group">
                            <input type="text" placeholder="Start Searching..." data-default="130">
                            <button class="submit">
                                <i class="clip-search-3"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ol>
            <div class="page-header">
                <h1>Lessons <small>management </small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                   Add a Lesson
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="col-sm-2">Lesson Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="lesson_name"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <input  type="submit" value="Save" class="btn btn-info pull-right"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>    
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Lesson</th><th>Action</th></tr>
                </thead>
                <?php foreach($lessons as $lesson):?>
                    <tr><td><?php echo $lesson->lesson_name; ?></td><td><a onclick="return confirm('are you sure you want to delete this lesson?')" href="<?php echo site_url('manage/delete_lesson/' . $lesson->lesson_id); ?>">Delete</a></td></tr>
                    <?php endforeach;?>
            </table>
        </div>
    </div>

</div>
<?php echo get_instance()->footer(); ?>