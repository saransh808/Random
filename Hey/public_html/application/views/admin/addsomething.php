<?php include('admin_site_header.php'); ?>
<?php include('admin_site_sidebar.php'); ?>

	
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
                    
                    	<?php echo form_open_multipart('admin/addlocationsaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter State</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'state','value'=>set_value('state'),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('state', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>

							
							 <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Location</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'location','value'=>set_value('location'),'class'=>'input-xlarge focused','id'=>'focusedInput','onBlur'=>"createHeading(this.value, 'nearbylocation');"));?>
                                  <?php echo form_error('location', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
						      

						      <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Near by Road Head Location</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'nearbylocation','value'=>set_value('nearbylocation'),'class'=>'input-xlarge focused','id'=>'nearbylocation'));?>
                                  <?php echo form_error('nearbylocation', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>


							  <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Tagline for location</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'tagline','value'=>set_value('tagline'),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('tagline', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Introduction Info</label>
							    <div class="controls">
							    		 <?php echo $this->ckeditor->editor('description',@$default_value);?> 
							    		 <?php echo form_error('description','<span class="red">', '</span>'); ?>
							    </div>
							   </div>


						      <div class="control-group">
							    <label class="control-label" >Select  Bannner</label>
							    <div class="controls">
							     
                                  <input type="file" name="bannerimage" size="20"/>
                                  <?php echo $upload_error;?>
                                  
						        </div>
						      </div>

						      <div class="control-group">
							    <label class="control-label" >Select Multiple Images For Bannner</label>
							    <div class="controls post-pics">
							     
                                  
                                  
                                  <div class="pics">
                                	<div id="filediv"><input name="userfile[]" type="file" id="file" accept="image/*"/></div>
                                </div>           
                    			<input type="button" id="add_more" class="upload" style="display:none;" value="Add More Files"/>
						        </div>
						      </div>
							

							 

						      <div class="control-group">
								<label class="control-label">Select Trip Types for the Locations</label>
								<div class="controls">
								  <label class="checkbox inline">
									<div class="" id="uniform-inlineCheckbox1"><span class="checked"><input type="checkbox" id="checkAll"></span></div> All
								  </label>
								   <?php
								     
								      foreach ($triptypelist as $i => $triptype) {
								      	?>
								      	<label class="checkbox inline">
									<div class="" ><span class="checked"><input type="checkbox" id="inlineCheckbox<?=$i?>" name="triptype[]" value="<?=$triptype->tripshortname?>" ></span></div> <?=$triptype->TripName?>
								  </label>
								      	<?php
								      }
								      ?>
								  
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label">Add in Wravellers Favorite</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="wravlersfav" id="wravlersfav1" value="1" >
									Yes
								  </label>
								  
								  <label class="radio inline">
									<input type="radio" name="wravlersfav" id="wravlersfav2" value="0" checked="">
									No
								  </label>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label">Add in Sessions Favorite</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="sessionsfav" id="sessionsfav2" value="1" >
									Yes
								  </label>
								  
								  <label class="radio inline">
									<input type="radio" name="sessionsfav" id="sessionsfav2" value="0" checked="">
									No
								  </label>
								</div>
							  </div>

							   

			

						      
							
							<div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Latitude</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'Lat','value'=>set_value('Lat'),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('Lat', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
							
							<div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Longitude</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'Long','value'=>set_value('Long'),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('Long', '<span class="red">', '</span>');?>
                                  
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
	<script type="text/javascript">
		function createHeading(tVal,toId){
				//alert(tVal);
				//alert(toId);
				document.getElementById(toId).value = tVal;
			
			}

		
	</script>
		
<?php include('admin_site_footer.php'); ?>