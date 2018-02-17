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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Agent</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Organisation</th>
								  <th>Owner Name</th>								  
								  <th>Email</th>
								  <th>Phone</th>
								  <th>Registered on</th>
								  <th>International Trip</th>
								  <th>Domestic Trip</th>
								  
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						 
						 
						  foreach($data as $mydata){
						  	//print_r($mydata);
							  ?>
                              <tr>
								
								
								<td class="center"><?=$mydata->organisation?></td>
								<td class="center"><?=$mydata->name?></td>
								<td class="center"><?=$mydata->email?></td>
								<td class="center"><?=$mydata->phone?></td>
								<td class="center"><?=$mydata->time?></td>

								<td class="center"><?=$mydata->international?> out of <?=$mydata->domestictrip?></td>
								<td class="center"><?=$mydata->dom?> out of <?=$mydata->internationaltrip?></td>
								
								
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="#/<?=$mydata->id?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onClick="return confirm('Are You Sure To Delete This.')" href="deleteAgent/<?=$mydata->id?>">
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