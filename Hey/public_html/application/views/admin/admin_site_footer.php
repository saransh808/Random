<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2016 <a href="<?=base_url();?>" alt="Simplify Trips">Simplify Trips</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="<?php echo base_url(); ?>admin-assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">$(document).ready(function(){
			$("#checkAll").change(function () {
				//alert('dfgdf');
	   		$("[name='triptype[]']").prop('checked', $(this).prop("checked"));
			});
		});</script>
	<script src="<?php echo base_url(); ?>admin-assets/js/jquery-migrate-1.0.0.min.js"></script>
	<script src="<?php echo base_url(); ?>admin-assets/js/script.js"></script>
		<script src="<?php echo base_url(); ?>admin-assets/js/script1.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.ui.touch-punch.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/modernizr.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.cookie.js"></script>
	
		<script src='<?php echo base_url(); ?>admin-assets/js/fullcalendar.min.js'></script>
	
		<script src='<?php echo base_url(); ?>admin-assets/js/jquery.dataTables.min.js'></script>

		<script src="<?php echo base_url(); ?>admin-assets/js/excanvas.js"></script>
	<script src="<?php echo base_url(); ?>admin-assets/js/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>admin-assets/js/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url(); ?>admin-assets/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url(); ?>admin-assets/js/jquery.flot.resize.min.js"></script>
	

		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.chosen.min.js"></script>
	
		
		
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.cleditor.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.noty.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.elfinder.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.raty.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.iphone.toggle.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.gritter.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.imagesloaded.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.masonry.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.knob.modified.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.sparkline.min.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/counter.js"></script>
	
		<script src="<?php echo base_url(); ?>admin-assets/js/retina.js"></script>

<script src="<?php echo base_url(); ?>admin-assets/js/custom.js"></script>

<script src="<?php echo base_url(); ?>admin-assets/js/script2.js"></script>

	<!-- end: JavaScript-->
</body>
</html>
