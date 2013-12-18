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
             <?php if($word):?>
                <h1><?php echo $word; ?> <small>edit the word</small></h1>
             <?php else:?>
                <h1>Add a new word <small>help to improve the common knowledge</small></h1>
                <?php endif;?>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="#" method="post" role="form" id="form2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                Word / Expression <span class="symbol required"></span>
                            </label>
                            <input type="text" placeholder="Word / Expression" value="<?php echo $word; ?>" class="form-control" id="word" name="word">
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                Form <span class="symbol required"></span>
                            </label>
                            <select name="word_form" class="form-control">
                                <option>Please Select</option>
                                <option value="noun"<?php if($word_form == 'noun'):?> selected="selected"<?php endif;?>>noun</option>
                                <option value="verb"<?php if($word_form == 'verb'):?> selected="selected"<?php endif;?>>verb</option>
                                <option value="adjactive"<?php if($word_form == 'adjactive'):?> selected="selected"<?php endif;?>>adjactive</option>
                                <option value="adverb"<?php if($word_form == 'adverb'):?> selected="selected"<?php endif;?>>adverb</option>
                                <option value="expression"<?php if($word_form == 'expression'):?> selected="selected"<?php endif;?>>expression</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">
                                Definition <span class="symbol required"></span>
                            </label>
                            <input type="text" placeholder="Describe the word you want to add." class="form-control" id="word_definition" value="<?php echo $word_definition; ?>" name="word_definition">
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>

                        </p>
                    </div>
                    <div class="col-md-4">
                    <?php if($word):?>
                         <button class="btn btn-warning btn-block" type="submit">
                            Save The Word <i class="icon-circle-arrow-right"></i>
                        </button>
                    <?php else: ?>
                        <button class="btn btn-primary btn-block" type="submit">
                            Send Word <i class="icon-circle-arrow-right"></i>
                        </button>
                        <?php endif;?>
                    </div>
                </div>
            </form>
        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>