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

    <div class="row">
        <div class="col-sm-12">
            <div class="tabbable">
                <ul id="myTab" class="nav nav-tabs tab-bricky">
                    <li<?php if($tab == null || $tab == 'general'): ?> class="active"<?php endif;?>>
                        <a href="#panel_tab2_example1" data-toggle="tab">
                            General
                        </a>
                    </li>
                    <?php if($user->is_student()):?>
                        <li<?php if($tab == 'marks'): ?> class="active"<?php endif;?>>
                            <a href="#panel_tab2_example3" data-toggle="tab">
                                My Exam Marks
                            </a>
                        </li>
                        <?php endif;?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane<?php if($tab == null || $tab == 'general'): ?>active<?php endif;?>" id="panel_tab2_example1">
                        <h4>My badges</h4><?php echo $user->print_all_badges(); ?>
                        <h4><a href="<?php echo site_url('account/about_me'); ?>">About me</a></h4>
                        <h4><a href="<?php echo site_url('user/profile/' . $user->user_id); ?>">My Public Profile</a></h4>

                    </div>
                    <div class="tab-pane<?php if($tab == 'marks'): ?> active<?php endif;?>" id="panel_tab2_example3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="icon-external-link-sign"></i>
                                        Add a Result

                                    </div>
                                    <div class="panel-body">
                                        <form role="form" class="form-horizontal" method="post">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="col-sm-2">Quiz</label>
                                                    <div class="col-sm-9">
                                                        <select name="quiz_id" id="quiz_id" class="form-control">
                                                            <?php foreach($tracks as $track_id => $quizzes): ?>
                                                                <optgroup label="Track #<?php echo $track_id; ?>">
                                                                    <?php foreach($quizzes as $quiz): ?>
                                                                        <option value="<?php echo $quiz->quiz_id; ?>"><?php echo $quiz->quiz_name; ?></option>
                                                                        <?php endforeach;?>
                                                                </optgroup>
                                                                <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="col-sm-2">Result</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exam_result" name="exam_result"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <input  type="submit" name="save_result" value="Save" class="btn btn-info pull-right"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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


    </div>
              
<?php echo get_instance()->footer(); ?>