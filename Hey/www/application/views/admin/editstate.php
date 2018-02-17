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
					<a href="#">Add State</a>
				</li>
			</ul>
			<div class="box-content alerts">
						                        
                        
						
						
						
					</div>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add State Here</h2>
						
					</div>
					<div class="box-content">
                    
                    	<?php echo form_open_multipart(current_url(),array('class'=>'form-horizontal'));?>
						<fieldset>
							<?php echo form_hidden('id', $data->id); ?>
							  <div class="control-group">
							    <label class="control-label" for="selectError4">Select a country</label>
							    <div class="controls">
							      <?php echo form_dropdown('country', $country_dropdown, set_value('country', $data->country_id), array('id' => 'selectError4'));
									?>
									<?php echo form_error('country', '<span class="red">', '</span>');?>

                                  
						        </div>
						      </div>

						       <div class="control-group">
							    <label class="control-label" for="focusedInput">New State</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'state','value'=>set_value('state',$data->state),'class'=>'input-xlarge focused','id'=>'focusedInput'));?>
                                  <?php echo form_error('state', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>

							
							  <div class="control-group">
							    <label class="control-label" for="selectError4">Plain Select</label>
							    <div class="controls">
							      <?php echo form_dropdown('status', array('0' => 'Active', '1' => 'Inactive'), $data->status, array('id' => 'selectError4'));
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