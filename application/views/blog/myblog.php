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
                    Writing
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
                <h1>Writing <small>improve your english writing skill</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-sm-12">
  <table class="table table-condensed table-hover">
            <thead><tr><th>Post Title</th><th>Action</th></tr></thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                <tr><td><a href="<?php echo site_url('blog/view/' . $post->post_id); ?>"><?php echo $post->post_title ?></a></td><td>Edit / Delete</td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div >
<?php echo get_instance()->footer(); ?>