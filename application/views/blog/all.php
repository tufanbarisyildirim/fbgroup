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
                    Blog
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
                <h1>Blog <small>improve your english writing skill</small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-sm-12">
        <table class="table table-condensed table-hover">
            <thead><tr><th>Post Title</th><th>Writer</th><?php if($current_user->is_admin()):?><th>Actions</th><?php endif;?></tr></thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td><a href="<?php echo site_url('blog/view/' . $post->post_id); ?>"><?php echo $post->post_title ?></a></td><td><?php echo $post->user->profile_link_with_avatar(); ?></td>
                        <?php if($current_user->is_admin()):?>
                            <td><a onclick="return comfirm('are you sure?')" href="<?php echo site_url('blog/delete/' . $post->post_id); ?>">Delete</a></td>
                            <?php endif;?>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div >
<?php echo get_instance()->footer(); ?>