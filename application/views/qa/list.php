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
                    Questions
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
                <h1>Questions <small><?php echo $questions_type; ?></small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
      <?php if($questions_type == 'Important'): ?>
      <div class="row">
      <div class="col-md-12">
      <div class="alert alert-warning">These questions are marked as "<b>Important</b>" by the teacher.</div>
      </div>
      </div>
      <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <!-- start: TABLE WITH IMAGES PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    Questions
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
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($questions as $question):     
                                ?>
                                <tr>
                                    <td><img src="<?php echo  fb_profile_pic_url($question->user_id);?>" width="30" class="circle-img"/>&nbsp;<a href="<?php echo site_url('qa/view/' . $question->question_id)?>"><b><?php echo $question->question_title; ?></b></a>
                                    </td>
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