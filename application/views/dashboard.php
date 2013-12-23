<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<?php echo get_instance()->header(); ?>
    <!-- start: PANEL CONFIGURATION MODAL FORM -->
                <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title">Panel Configuration</h4>
                            </div>
                            <div class="modal-body">
                                Here will be a configuration form
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
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
                                    Dashboard
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
                                <h1>Dashboard <small>overview &amp; stats </small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <div class="row">
                        <div class="col-sm-4"> 
                            <div class="core-box">
                                <div class="heading">
                                    <i class="clip-question-2 circle-icon circle-teal"></i>
                                    <h2>Ask &amp; Answer</h2>
                                </div>
                                <div class="content">
                                    Here is yours! Feel free to ask any question and answer your friends as you can. Knowledge is useless unless you share it. So, The motto : "Your knowledge consists of your shares.".
                                </div>
                                <a class="view-more" href="<?php echo site_url('qa/all'); ?>">
                                    View More <i class="clip-arrow-right-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="core-box">
                                <div class="heading">
                                    <i class="clip-users circle-icon circle-teal"></i>
                                    <h2>Be In Collaboration</h2>
                                </div>
                                <div class="content">
                                   We believe that; "One of the most unquestionable key of succes is being a team!" Please contribute if you agree with us.
                                </div>
                                <a class="view-more" href="#nomore" onclick="alert('Do you like details? That\'s nice.')">
                                    View More <i class="clip-arrow-right-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="icon-question-sign"></i>
                                    Your Track <?php echo $track_id; ?> Summary
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-condensed">
                                        <tr><th>Exam / Lesson</th><th>Weight</th><th>Average</th></tr>
                                        <?php $point = 0; foreach($quiz_scores as $quiz): $point += $quiz->class_avg / 100 *$quiz->quiz_weight;  ?>
                                            <tr><td><?php echo $quiz->lesson_name ?></td><td>%<?php echo $quiz->quiz_weight; ?></td><td style="text-align: right"><?php echo number_format($quiz->class_avg,2); ?></td></tr>
                                            <?php endforeach;?>
                                            <tr><td>Teacher Note</td><td>%10</td><td>100  :)</td></tr>
                                            <tr><th>General Average</th><th colspan="3" style="text-align: right;"><?php echo number_format($point + 10,2) ?></th></tr>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
               
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="clip-calendar"></i>
                                    Class Clendar
                                    <div class="panel-tools">
                                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                      <iframe src="https://www.google.com/calendar/embed?title=Upcoming%20Events%28Class%29&amp;showPrint=0&amp;height=400&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=9uu9jqt7fdfi1g1e5umvlaapo0%40group.calendar.google.com&amp;color=%23B1440E&amp;src=tr.turkish%23holiday%40group.v.calendar.google.com&amp;color=%23691426&amp;ctz=Europe%2FIstanbul" style=" border-width:0 " width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="clip-calendar"></i>
                                    School Calendar
                                    <div class="panel-tools">
                                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                     <iframe src="https://www.google.com/calendar/embed?title=Upcoming%20Events%20%28School%29&amp;showPrint=0&amp;height=400&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23FFFFFF&amp;src=iau.takvim%40gmail.com&amp;color=%238D6F47&amp;src=tr.turkish%23holiday%40group.v.calendar.google.com&amp;color=%23691426&amp;ctz=Europe%2FIstanbul" style=" border-width:0 " width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <!-- end: PAGE CONTENT-->
                </div>
                <?php echo get_instance()->footer(); ?>