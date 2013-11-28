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
                <li>
                    Manage
                </li>
                <li class="active">
                    Absentings
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
                <h1>Absentings <small>management </small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            Manage absentings.
        </div>
    </div>
</div>
<?php echo get_instance()->footer(); ?>