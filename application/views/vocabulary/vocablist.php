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
                <h1>Vocabulary <small>common knowledge</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <a href="<?php echo site_url('vocabulary/add');?>" class="btn btn-success pull-right"><i class="icon icon-plus-sign"></i>&nbsp;Add a new</a>
            <table class="table table-condensed table-condensed">
                <thead>
                    <tr><th>Word</th><th>Form</th><th>Definition</th></tr>
                </thead>
                <tbody>
                    <?php foreach($words as $word):?>
                        <tr><td><a href="<?php echo site_url('vocabulary/view/' . $word->id  ) ; ?>"><b><?php echo $word->word; ?></b></a></td><td><?php echo $word->form; ?></td><td><?php echo $word->definition; ?></td></tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>