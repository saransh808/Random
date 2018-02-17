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
                                            <input type="hidden" name="id" value="<?php echo set_value('id')?>">
                                            <?php
                                            if(@$errormsg){
                                              echo @$errormsg;
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Old Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputPassword" name="oldPassword" value="<?php echo set_value('oldPassword')?>"  placeholder="Enter Your Old Password">
                                                    <?php echo form_error('oldPassword', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRePassword" class="col-sm-3 control-label">
New Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputRePassword" name="password" value="<?php echo set_value('password')?>" placeholder="Enter Your New Password">
                                                    <?php echo form_error('password', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRePassword" class="col-sm-3 control-label">Repeat  Password :</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputRePassword" name="confirmPass" value="<?php echo set_value('confirmPass')?>" placeholder="Repeat Your New Password">
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
                                        <!-- Password Area Starts -->                                            
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
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h1 class="panel-title">Delete Account</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row">
                              <div class="col-md-2">
                                </div>
                              <div class="col-md-8">
                                  <form class="form-horizontal" role="form">                           
                                        <!-- Password Area Starts -->                                            
                                            <div class="col-sm-offset-3 col-sm-9">
                                              <p>Are You Sure for Delete Account</p>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                </div>                
            </div>          
        </div>
    </div>
</section>

<?php require_once('footer.php');?>