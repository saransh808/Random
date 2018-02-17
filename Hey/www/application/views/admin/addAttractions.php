<?php include('admin_site_header.php'); ?>
<?php include('admin_site_sidebar.php'); ?>
<?php
	if(isset($_GET['q']) && $_GET['q'] == 1){
		?>
	
	<script type="text/javascript">
		alert('Attraction has been successfully submitted');
	</script>
	<?php
}
?>
<div id="content" class="span10" style="min-height: 451px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Content</a>
				</li>
			</ul>
			<div class="box-content alerts">
						                        
                        
						
						
						
					</div>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Location &amp; Content to Adveture Trip</h2>
						
					</div>
					<div class="box-content">
                    
                    	<?php echo form_open_multipart('admin/addAttractionaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
								<div class="control-group">
								<label class="control-label" for="selectErrorstate"> Select State</label>
								<div class="controls">
								  <select id="selectErrorstate" name="state" data-rel="chosen" onchange="getLoc(this.value);">
								  <option value="">Select State</option>
								  <?php 
								 
								  foreach ($statename as $key => $state) {
								  	?>
								  	<option value="<?=$state->state?>" <?php if($_GET['state'] == $state->state) { echo 'selected'; } ?>><?=$state->state?></option>
								  	<?php
								  }
								   ?>
									
								  </select>
								</div>
							  </div>
							  <script type="text/javascript">
							  	function getLoc(state){
							  		location.replace("?state="+state);
							  	}
							  </script>

							  <div class="control-group">
								<label class="control-label" for="selectErrorlocation"> Select Location</label>
								<div class="controls">
								  <select id="selectErrorlocation" name="locationid" data-rel="chosen" onchange="getatt(this.value);">
									<option value="">Select City</option>
									<?php 
								  
								  foreach ($locationname as $key1 => $location) {
								  	?>
								  	<option value="<?=$location->id?>" <?php if($_GET['location'] == $location->id) { echo 'selected'; } ?>><?=$location->location?></option>
								  	<?php
								  }
								   ?>
									
								  </select>
								</div>
							  </div>
							   <script type="text/javascript">
							  	function getatt(mylocation){
							  		var url=window.location;
							  		location.replace(url+"&location="+mylocation);
							  		//alert(location);
							  	}
							  </script>



							  <div class="control-group">
							    <label class="control-label" >Selected Atractions</label>
							    <div class="controls post-pics">
							      <?php 
						       foreach ($attractions as $attractionskey => $attractionsvalue) {
						       	?>
						       	<img src="<?=base_url();?>uploads/<?=$attractionsvalue->imagename?>" style="width:250px; height:250px">
						       	<input type="text" readonly="readonly" value="<?=$attractionsvalue->image_text?>" style="position: absolute;  margin: 201px 0 0px -240px;">
						       	<a href="#" onclick="imgdelatt('<?=$attractionsvalue->id?>');"><img src="http://justwravel.com/img/x.png" width="50px" style="position: absolute; margin: 0 0 0 -50px;"></a>
						       	
						       <?php
						       }
						        ?>
                                 
                                  
                                  
						        </div>
						      </div>
							
						      

						      <div class="control-group">
							    <label class="control-label" >Select Multiple Images For Bannner</label>
							    <div class="controls post-pics">
							     
                                  
                                  
                                  <div class="pics">
                                	<div id="filediv1"><input name="userfile[]" type="file" id="file1" accept="image/*"/></div>
                                </div>           
                    			<input type="button" id="add_more1" class="upload" style="" value="Add More Files"/>
						        </div>
						      </div>
							

							 

			

						      
							
							  <div class="control-group">
							    <label class="control-label" for="selectError4">Plain Select</label>
							    <div class="controls">
							      <?php echo form_dropdown('status', array('0' => 'Active', '1' => 'Inactive'), '0', array('id' => 'selectError4'));
									?>

                                  
						        </div>
						      </div>
					
							  <div class="form-actions">
								<input type="submit" class="btn btn-primary" name="submit" value="Submit">
								<button class="btn" type="reset">Cancel</button>
							  </div>
						  </fieldset>
					  </form>
					
					</div>
				
					
					
				</div><!--/span-->

			</div><!--/row-->
    

	</div>
		
<?php include('admin_site_footer.php'); ?>
<script src="<?php echo base_url(); ?>admin-assets/js/jquery.uniform.min.js"></script>
<script>
    function imgdelatt(attractionid){


        
        $.post("<?=base_url()?>deleteImage/attraction",
        {
          attractionid: attractionid
         
        },
        function(data){
        	//alert(data);
        	window.location.reload()
            
        });
    }

</script>