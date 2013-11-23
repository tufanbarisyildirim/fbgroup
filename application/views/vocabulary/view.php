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
                    Vocabulary
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
           <div class="pull-right"> Added by : <a href="<?php echo site_url('user/profile/' . $word->user_id)?>" class="badge badge-warning"><?php echo $word->user->full_name; ?></div></a>
                <h1><?php echo $word->word; ?> <small>(<?php echo $word->form; ?>)</small></h1>

            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p><?php echo $word->definition; ?></p>        
            <a href="javascript:;" class="badge badge-green pull-right" onclick="$('#example_form').toggle('fast')"><i class="icon icon-play-sign"></i>&nbsp; add an example</a>
            <div class="row" id="example_form" style="display:none;">
                <div class="col-sm-12">
                    <form action="#" method="post" role="form" id="form2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Example Sentence <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Write your example." class="form-control" id="example_sentence" name="example_sentence">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <p>

                                </p>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Send Example <i class="icon-circle-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr />
            <h4>Examples</h4>
            <table class="table table-condensed">
                <thead>
                    <tr><th>Example Usage</th><th>Contributor</th></tr>
                    <?php foreach($word_examples as $example): ?>
                        <tr><td><?php echo $example->sentence ?></td><td><a href="<?php echo site_url('user/profile/' . $example->user_id)?>"><img src="<?php echo  fb_profile_pic_url($example->user_id);?>" width="30" class="circle-img"/> <?php echo $example->user->full_name; ?></a></td></tr>
                        <?php endforeach; ?>
                </thead>
            </table>
        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>