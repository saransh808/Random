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
					<a href="#">Add Gallery Item</a>
				</li>
			</ul>
			<div class="box-content alerts">
						                        
                        
						
						
						
					</div>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Gallery Item &amp; Their Description</h2>
						
					</div>
					<div class="box-content">
                    
                    	<?php echo form_open_multipart('admin/addgalleryitemaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							
							  <div class="control-group">
							    <label class="control-label" for="selectError4">Select a Category</label>
							    <div class="controls">
							    
							      
									<select name="category" id="selectError4">
										<option value="">Select a Category</option>
										<?php 
							    
							    foreach ($gallery_category as $cat) { 
							    	?>
							    	<option value="<?=$cat->id?>"><?=$cat->name?></option>
							    	<?php
							    }

							     ?>
									</select>
                                  
						        </div>
						      </div>

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Title</label>
							    <div class="controls">	
							     
                                  <?php echo form_input(array('name'=>'title','value'=>set_value('title'),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('title', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>

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