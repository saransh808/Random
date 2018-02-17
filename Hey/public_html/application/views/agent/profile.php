<?php require_once('header.php');?>

<section class="smart-breadcrumb">
  <div class="container">
      <div class="smart-breadcrumb-sec">
          <ol class="breadcrumb">
              <li><a href="#">Home</a></li>              
              <li class="active">Account settings</li>
            </ol>
        </div>
    </div>
</section>

<section class="user">
  <div class="container">
      <div class="user-sec">
          <div class="row">             
                <div class="col-md-12 col-sm-12">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          
                          <a href="<?=base_url();?>agent/international_trip" class="btn btn-success" style="float:right; margin-left:10px">International Trip</a>
                          <a href="<?=base_url();?>agent/domestic_trip" class="btn btn-success" style="float:right;">Domestic Trip</a>
                          <h1 class="panel-title">Profile Details</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row">
                              <div class="col-md-2">
                                </div>
                              <div class="col-md-8">
                                  <?= form_open('', array('class' => 'form-horizontal', 'role' => 'form', )); ?>                          
                                        <!-- Password Area Starts -->
                                            <input type="hidden" name="id" value="<?=$agent[0]->id?>">
                                            <div class="form-group">
                                                <label for="owner" class="col-sm-3 control-label">Owner Name :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="owner" name="owner" value="<?php echo  set_value('owner', $agent[0]->name)?>" placeholder="Owner Name">
                                                    <?php echo form_error('owner', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Organisation Name :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="organisation" name="organisation" value="<?php echo  set_value('organisation', $agent[0]->organisation)?>" placeholder="Organisation Name">
                                                    <?php echo form_error('organisation', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Organisation URL :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo  set_value('url', $agent[0]->url)?>" placeholder="Organisation Name">
                                                    <?php echo form_error('url', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Contact Number :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo set_value('contact', $agent[0]->phone)?>" placeholder="Contact Number">
                                                    <?php echo form_error('contact', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Email Id :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email', $agent[0]->email)?>" placeholder="Email Id">
                                                    <?php echo form_error('email', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">State :</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="state" name="state">
                                                      <option value="">Select State</option>
                                                      <?php 
                                                      foreach ($statelist as $key => $value) {
                                                        ?>
                                                        
                                                         <option value="<?=$value->id?>"><?=$value->state?></option>
                                                        <?php
                                                      }

                                                      ?>
                                                    </select>
                                                    <?php echo form_error('state', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="location" class="col-sm-3 control-label">Location :</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="location" name="location">
                                                      <option value="">Select State first</option>

                                                    </select>
                                                    <?php echo form_error('location', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-3 control-label"> Full Address :</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="5" class="form-control" id="address" name="address" placeholder="Address"><?php echo set_value('address', $agent[0]->address)?></textarea>
                                                    <?php echo form_error('address', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                                                                        
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    <div class="panel panel-primary" id="change_pass">
                      <div class="panel-heading">
                          <h1 class="panel-title">Change Password</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row">
                              <div class="col-md-2">
                                </div>
                              <div class="col-md-8">
                                  <?= form_open('agent/changepassword', array('class' => 'form-horizontal', 'role' => 'form', )); ?>                           
                                        <!-- Password Area Starts -->
                                            <input type="hidden" name="id" value="<?=$agent[0]->id?>">
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Old Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputPassword" name="oldPassword" placeholder="Enter Your Old Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRePassword" class="col-sm-3 control-label">
New Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputRePassword" name="password" placeholder="Enter Your New Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRePassword" class="col-sm-3 control-label">Repeat  Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputRePassword" name="confirmPass" placeholder="Repeat Your New Password">
                                                    <?php echo form_error('confirmPass', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    <!--
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h1 class="panel-title">Change Email</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row">
                              <div class="col-md-2">
                                </div>
                              <div class="col-md-8">
                                  <form class="form-horizontal" role="form">                           
                                                                                    
                                            <div class="form-group">
                                                <label for="inputRePassword" class="col-sm-3 control-label">New Email :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputRePassword" value="welcomemanish111@gmail.com">
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    -->
                    
                </div>                
            </div>          
        </div>
    </div>
</section>

<?php require_once('footer.php');?>

<script>
  $( function() {
    
    //$( "#amount-min" ).val( $( "#slider-range" ).slider( "values", 0 ) );
    $('#state').val("<?=$agent[0]->state?>").change();
    setTimeout(function(){
        $('#location').val("<?=$agent[0]->location?>").change();
    },600);
    
    
  } );
  </script>
