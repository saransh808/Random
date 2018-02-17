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
                    
                    	<?php echo form_open_multipart('admin/editReviewaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							<?php
							foreach ($data as $mydata) {
								# code...
							}
							?>

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">Enter State</label>
							    <div class="controls">
							     <?php echo form_hidden('reviewid', $reviewid);?>
                                  <?php echo form_input(array('name'=>'name','value'=>set_value('name',$mydata->User_Name),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
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
							    <label class="control-label" for="focusedInput">Enter Location</label>
							    <div class="controls">
							     
                                  <?php echo form_textarea(array('name'=>'review','value'=>set_value('review',$mydata->User_Review),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('location', '<span class="red">', '</span>');?>
                                  
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