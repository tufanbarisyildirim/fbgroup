<?php echo get_instance()->header(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var oTable = $('#sample_1').dataTable({
            "aoColumnDefs": [{
                "aTargets": [0]
            }],
            "oLanguage": {
                "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": "",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "aaSorting": [
                [1, 'asc']
            ],
            "aLengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
        });
        $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#sample_1_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#sample_1_column_toggler input[type="checkbox"]').change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    });
</script>
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
            <div style="clear: both;"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    Common Knowledge
                    <!--div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                            <i class="icon-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="icon-resize-full"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                            <i class="icon-remove"></i>
                        </a>
                    </div-->
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-condensed" id="sample_1">
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

        </div>
    </div>
                    </div >
<?php echo get_instance()->footer(); ?>