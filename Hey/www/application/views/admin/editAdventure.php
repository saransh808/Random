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
					<a href="#">Edit Content</a>
				</li>
			</ul>
			<div class="box-content alerts">
						                        
                        
						
						
						
					</div>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Location &amp; Content to Adveture Trip</h2>
						
					</div>
					<div class="box-content">
                    
                    	<?php echo form_open_multipart('admin/editAdventureaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter State</label>
							    <div class="controls">
							     <?php echo form_hidden('id', $id);?>
                                  <?php echo form_input(array('name'=>'state','value'=>set_value('state',$mydata->State),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('state', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
						      

							
							 <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Location</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'location','value'=>set_value('location',$mydata->Location),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('location', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>


						      <div class="control-group">
							    <label class="control-label" >Select Bannner</label>
							    <div class="controls">
							     <img src="<?=base_url().'uploads/'.$mydata->image?>" width="150px">
                                  <input type="file" name="bannerimage"  size="20"/>
                                  
                                  
						        </div>
						      </div>

						      <div class="control-group">
							    <label class="control-label" >Select Multiple Images For Bannners</label>
							    <div class="controls post-pics">
							     
                                  <?php
							     
							     	$banimg = explode(', ', $mydata->banner_images);
							     	foreach($banimg as $bannimg):
							     		if($bannimg != ''){
							     		?>
							     		

							     		
							     			<img src="<?=base_url().'uploads/'.$bannimg?>" style="width:100px; height: 100px;">
							     			<a href="#" onclick="imgdel('<?=$bannimg?>');"><img src="http://justwravel.com/img/x.png" width="15px" style="position: absolute; margin: 10px -50px;"></a>
							     	<?php
							     	}
							     		endforeach;
							     	?>
                                  
                                  <div class="pics">
                                	<div id="filediv"><input name="userfile[]" type="file" id="file" accept="image/*"/></div>
                                </div>           
                    			<input type="button" id="add_more" class="upload" style="display:none;" value="Add More Files"/>
						        </div>

						      </div>
							

							  <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Introduction Info</label>
							    <div class="controls">
							    		 <?php echo $this->ckeditor->editor('description',@$default_value=$mydata->Info);?> 
							    		 <?php echo form_error('description','<span class="red">', '</span>'); ?>
							    </div>
							   </div>


							   <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Attraction Info</label>
							    <div class="controls">
							    		 <?php echo $this->ckeditor->editor('attraction',@$default_value=$mydata->Attractions);?> <?php echo form_error('attraction','<span class="red">', '</span>'); ?>
							    </div>
							   </div>

			

						      <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter State Initial</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'stateini','value'=>set_value('stateini',$mydata->stateini),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('stateini', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
							
							<div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Latitude</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'Lat','value'=>set_value('Lat',$mydata->Lat),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('Lat', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
							
							<div class="control-group">
							    <label class="control-label" for="focusedInput">Enter Longitude</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'Longi','value'=>set_value('Longi',$mydata->Longi),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('Longi', '<span class="red">', '</span>');?>
                                  
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
								<button class="btn">Cancel</button>
							  </div>
						  </fieldset>
					  </form>
					
					</div>
				
					
					
				</div><!--/span-->

			</div><!--/row-->
    

	</div>

		
<?php include('admin_site_footer.php'); ?>
<script>
    function imgdel(imgname){
        
        $.post("<?=base_url()?>deleteImage",
        {
          imgname: imgname,
          theme: 'adventure',
          id: <?=$id?>
          
        },
        function(data){
        	window.location.reload()
            
        });
    }

</script>