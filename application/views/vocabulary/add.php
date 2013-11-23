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
                <h1>Add a new word <small>help to improve the common knowledge</small></h1>
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
                            <input type="text" placeholder="Word / Expression" class="form-control" id="word" name="word">
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                Form <span class="symbol required"></span>
                            </label>
                            <select name="word_form" class="form-control">
                                <option>Please Select</option>
                                <option value="noun">noun</option>
                                <option value="verb">verb</option>
                                <option value="adjactive">adjactive</option>
                                <option value="adverb">adverb</option>
                                <option value="expression">expression</option>
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
                            <input type="text" placeholder="Describe the word you want to add." class="form-control" id="word_definition" name="word_definition">
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
                            Send Word <i class="icon-circle-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>