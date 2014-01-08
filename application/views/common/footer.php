</div>
<!-- end: PAGE -->
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<div class="footer clearfix">
	<div class="footer-inner">
		2013 - 2014 &copy; İstanbul Aydın University English Preparatory School. Class 317
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
<?php if(ENVIRONMENT == 'production'):?>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-19794840-11', 'prepeng.com');
	ga('send', 'pageview');

</script>
<?php endif; ?>
    </body>
    <!-- end: BODY -->
</html>