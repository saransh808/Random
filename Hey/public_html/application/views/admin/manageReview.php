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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Location</th>
								  <th>User</th>
								  <th>Review</th>
								  
								  <th>Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						 
						 
						  foreach($data as $mydata){
							  ?>
                              <tr>
								
								<td class="center"><?=$mydata->Location?></td>
								
								<td class="center"><?=$mydata->User_Name?></td>
								
								<td class="center"><?=$mydata->User_Review?></td>
								<td class="center"><?php if($mydata->status == 0){ echo 'Inactive'; } else{ echo 'Activated';} ; ?></td>
								<td class="center">
									<?php if($mydata->status == 0){ 
										echo '<a class="btn btn-success" href="'.base_url().'admin/activateReview/'.$mydata->SNO.'">&nbsp; Activate &nbsp;&nbsp;</a>'; } else{ echo '<a class="btn btn-danger" href="'.base_url().'admin/deactivateReview/'.$mydata->SNO.'">Deactivate</a>';} ; ?>
									
									<a class="btn btn-info" href="editReview/<?=$mydata->SNO?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onClick="return confirm('Are You Sure To Delete This.')" href="deleteReview/<?=$mydata->SNO?>">
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