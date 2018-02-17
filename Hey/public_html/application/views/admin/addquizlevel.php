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
                    
                    	<?php echo form_open_multipart('admin/addquizlevelaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							

						       <div class="control-group">
							    <label class="control-label" for="startdate">Start Date for Level</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('type'=>'date', 'name'=>'startdate','value'=>set_value('startdate'),'class'=>'input-xlarge focused','id'=>'startdate', 'onblur'=>"lastdateautofill(this.value,'lastdate');"));?>
                                  <?php echo form_error('startdate', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>


						       <div class="control-group">
							    <label class="control-label" for="lastdate">Last Date for Level</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('type'=>'date', 'name'=>'lastdate','value'=>set_value('lastdate'),'class'=>'input-xlarge focused','id'=>'lastdate'));?>
                                  <?php echo form_error('lastdate', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>

						       <div class="control-group">
							    <label class="control-label" for="level">Level</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'level','value'=>set_value('level'),'class'=>'input-xlarge focused','id'=>'level'));?>
                                  <?php echo form_error('level', '<span class="red">', '</span>');?>
                                  
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
		function lastdateautofill(tVal,toId){
				//alert(tVal);
				//alert(toId);

				var date = new Date(tVal);
				//alert('the original date is '+date);
				var newdate = new Date(date);

				newdate.setDate(newdate.getDate() + 7); // minus the date
				var nd = newdate.toISOString().substr(0,10);

				document.getElementById(toId).value = nd;
			
			}

		
	</script>
		
<?php include('admin_site_footer.php'); ?>