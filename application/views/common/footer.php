</div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2013 &copy; clip-one by cliptheme.
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">Event Management</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger remove-event no-display">
                            <i class='icon-trash'></i> Delete Event
                        </button>
                        <button type='submit' class='btn btn-success save-event'>
                            <i class='icon-ok'></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="<?php echo assets_url(); ?>/plugins/respond.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="<?php echo assets_url(); ?>/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo assets_url(); ?>/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/jquery.sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo assets_url(); ?>/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <script src="<?php echo assets_url(); ?>/js/index.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>