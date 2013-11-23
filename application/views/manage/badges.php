<?php echo get_instance()->header(); ?>
<script type="text/javascript">
    function previewBadge()
    {
        $('#previewContainer').html('<span class="badge badge-'+$('#badge_class').val()+'">'+$('#badge_name').val()+'</span>')
    }
</script>
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
                    Badges
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
                <h1>Badges <small>management </small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    Add a Badge

                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post">
                        
                        <div class="form-group col-sm-12">
                            <label class="col-sm-2">Badge Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="badge_name" type="text" name="badge_name" onkeyup="previewBadge()"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2">Class</label>
                            <div class="col-sm-9">
                                <select name="badge_class" id="badge_class" class="form-control" onchange="previewBadge()">
                                    <option class="badge badge-beige" value="beige">Beige</option>
                                    <option class="badge badge-danger" value="danger">Danger</option>
                                    <option class="badge badge-green" value="green">Green</option>
                                    <option class="badge badge-info" value="info">Info</option>
                                    <option class="badge badge-inverse" value="inverse">Inverse</option>
                                    <option class="badge badge-orange" value="orange">Orange</option>
                                    <option class="badge badge-purple" value="purple">Purple</option>
                                    <option class="badge badge-success" value="success">Success</option>
                                    <option class="badge badge-yellow" value="yellow">Yellow</option>
                                    <option class="badge badge-warning" value="warning">Warning</option>
                                </select>
                            </div>
                        </div>
                          <div class="form-group col-sm-6">
                            <label class="col-sm-2">Type</label>
                            <div class="col-sm-9">
                                <select name="badge_type" id="badge_type" class="form-control" onchange="previewBadge()">
                                    <option value="badge">Badge</option>
                                    <option value="role">Role</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-2">Preview</label>
                            <dir class="col-sm-9" id="previewContainer"></dir>
                        </div>
                        <div class="form-group col-sm-12">
                            <input  type="submit" value="Save" class="btn btn-info pull-right"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Badge Name</th><th>Actions</th></tr>
                </thead>
                <?php foreach($badges as $badge):?>
                    <tr><td><span class="badge badge-<?php echo $badge->badge_class; ?>"><?php echo $badge->badge_name; ?></span></td><td><a href="<?php echo site_url('manage/delete_badge/'. $badge->badge_id); ?>"><i class="icon icon-check-minus"></i></a>&nbsp;<a href="<?php echo site_url('manage/badges/'. $badge->badge_id); ?>"><i class="icon icon-edit"></i></a></td></tr>
                    <?php endforeach;?>
            </table>
        </div>
    </div>

</div>
<?php echo get_instance()->footer(); ?>