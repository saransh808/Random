<?php
include('admin_site_header.php');
?>

		
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php include('admin_site_sidebar.php'); ?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
            <div class="box-content alerts">
						<?php
						if(isset($_GET['action']) && $_GET['action'] == 'del'){
	delState($_GET,$msg);
	
						if($msg == 'deleted'){
							echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Wooohooo!</strong> State has been successfully deleted.
						</div>';
							}
						
						
						}
						?>
                        
                        
						
						
						
					</div>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span> Packages</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Title</th>
								  <th>Location</th>
								  <th>State</th>
								  <th>Image</th>
								  <th>category</th>
								  
								  
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						 
						 
						  foreach($data as $mydata){
							  ?>
                              <tr>
								<td class="center"><?=$mydata->title?></td>

								<td class="center"><?=$mydata->location?></td>

														
								<td class="center"><?=$mydata->state?></td>
								<td class="center"><img src="<?=base_url();?>uploads/package/<?=$mydata->image?>" width="70"></td>
								<td class="center"><?=str_replace(',', '<br/>', $mydata->gallery_cat_id)?></td>
								
								
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="editpackage/<?=$mydata->id?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onClick="return confirm('Are You Sure To Delete This.')" href="deletepackage/<?=$mydata->id?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
                              <?php
                              }
						  ?>
							
							
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


	</div><!--/.fluid-container-->

	
		<?php include('admin_site_footer.php'); ?>
		<script src="<?php echo base_url(); ?>admin-assets/js/jquery.uniform.min.js"></script>