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
					<a href="#">Add Questions</a>
				</li>
			</ul>
			<div class="box-content alerts">
						                        
                        
						
						
						
					</div>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Questions</h2>
						
					</div>
					<div class="box-content">
                    
                    	<?php echo form_open_multipart('admin/addquizquestionsaction',array('class'=>'form-horizontal'));?>
						<fieldset>
							
							

						       <div class="control-group">
							    <label class="control-label" for="question">Enter Questions</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'question','value'=>set_value('question'),'class'=>'input-xlarge focused','id'=>'question','style'=>'width:90%'));?>
                                  <?php echo form_error('question', '<span class="red">', '</span>');?>
                                  
						        </div>

						      </div>

						      <div class="control-group">
							    <label class="control-label" for="Option1">Enter Option 1</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'option1','value'=>set_value('option1'),'class'=>'input-xlarge focused','id'=>'Option1'));?>
                                  <?php echo form_error('option1', '<span class="red">', '</span>');?>
                                  
						        </div>

						      </div>
						      <div class="control-group">
							    <label class="control-label" for="Option2">Enter Option 2</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'option2','value'=>set_value('option2'),'class'=>'input-xlarge focused','id'=>'Option2'));?>
                                  <?php echo form_error('option2', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
						      <div class="control-group">
							    <label class="control-label" for="Option3">Enter Option 3</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'option3','value'=>set_value('option3'),'class'=>'input-xlarge focused','id'=>'Option3'));?>
                                  <?php echo form_error('option3', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
						      <div class="control-group">
							    <label class="control-label" for="Option4">Enter Option 4</label>
							    <div class="controls">
							     
                                  <?php echo form_input(array('name'=>'option4','value'=>set_value('option4'),'class'=>'input-xlarge focused','id'=>'Option4'));?>
                                  <?php echo form_error('option4', '<span class="red">', '</span>');?>
                                  
						        </div>
						      </div>
						      <div class="control-group">
							    <label class="control-label" for="correctanswer">Correct Answer</label>
							    <div class="controls">
							      <?php echo form_dropdown('correctanswer', array('' => 'Select an Option', '1' => 'Option 1', '2' => 'Option 2', '3' => 'Option 3', '4' => 'Option 4'));
									?>
									<?php echo form_error('correctanswer', '<span class="red">', '</span>');?>

                                  
						        </div>
						      </div>
						      <div class="control-group">
							    <label class="control-label" for="level">Level </label>
							    <div class="controls">
							    <?php 
							    $a = array();
							    			$a[''] = 'Select Level ';
							    		foreach($level as $levl){
									    	$a[$levl->id] = 'Level '.$levl->id;
									    }
							    	

							    
							    ?>
							      <?php echo form_dropdown('level', $a);
									?>
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
		function createHeading(tVal,toId){
				//alert(tVal);
				//alert(toId);
				document.getElementById(toId).value = tVal;
			
			}

		
	</script>
		
<?php include('admin_site_footer.php'); ?>