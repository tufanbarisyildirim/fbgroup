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
                    Help
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
                <h1>Help <small>all topics </small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-question"></i>
                    All Help Topics
                </div>
                <div class="panel-body">
                    <div class="panel-group accordion-custom accordion-teal" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="icon-arrow"></i>
                                        How can I contribute?
                                    </a></h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    This is the easiest thing in this application. Just read, write, ask and vote. That's all.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <i class="icon-arrow"></i>
                                        How can I increase my score.
                                    </a></h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Do you want to see yourself in a <a href="<?php echo site_url('rank/top5s')?>">Top5 chart</a>? Be a team member. Just share to show your collaboration. And then, charts will really be glad to show your name at the top! : )
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <i class="icon-arrow"></i>
                                        Any other question?
                                    </a></h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Well, this part is under construction. If you really want to ask a question urgently use the <a href="https://www.facebook.com/groups/iauengprep317">facebook page</a>. Thank you for your understanding. 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        <i class="icon-arrow"></i>
                                        Do you want to be a developer?
                                    </a></h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    This is an opensource application. It's not just for using. Also for learning <b>web development technologies</b> for my classmates who will study <b>Computer or Software Engineering</b>.
                                    If you will study Computer / Software Engineering you can contribute for development of this collaboration area. Just send me (<a href="https://www.facebook.com/tufan.baris.yildirim">Tufan Barış YILDIRIM</a>) a private message to start learn how to contribute and start to develop.
                                    <pre class="prettyprint">
                                        if(You.want(to_learn(Coding)))
                                        {
                                            Just.Join(Team());
                                        } 
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo get_instance()->footer(); ?>