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
<?php
//print_r($user[0]);
//echo json_encode($user[0]);
?>
<section class="user">
  <div class="container">
      <div class="user-sec">
          <div class="row">             
                <div class="col-md-12 col-sm-12">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h1 class="panel-title">Change Profile Details</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row">
                              <div class="col-md-2">
                                </div>
                              <div class="col-md-8">
                                  <?= form_open('', array('class' => 'form-horizontal', 'role' => 'form', )); ?>                          
                                        <!-- Password Area Starts -->
                                            <input type="hidden" name="id" value="<?=$user[0]->id?>">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 control-label">Name :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo  set_value('name', $user[0]->name)?>" placeholder="Name">
                                                    <?php echo form_error('name', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Contact Number :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo set_value('contact', $user[0]->phone)?>" placeholder="Contact Number">
                                                    <?php echo form_error('contact', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-3 control-label">Email Id :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email', $user[0]->email)?>" placeholder="Email Id" readonly="readonly">
                                                    <?php echo form_error('email', '<div class="error">', '</div>');?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="address" class="col-sm-3 control-label"> About Yourself :</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="5" class="form-control" id="about" name="about" placeholder="About Yourself"><?php echo set_value('address', $user[0]->about)?></textarea>
                                                    <?php echo form_error('about', '<div class="error">', '</div>');?>
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
                                  <?= form_open('user/changepassword', array('class' => 'form-horizontal', 'role' => 'form', )); ?>                           
                                        <!-- Password Area Starts -->
                                            <input type="hidden" name="id" value="<?=$user[0]->id?>">
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
                                                    <input type="text" class="form-control" id="inputRePassword" value="">
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
                    
                </div>                
            </div>          
        </div>
    </div>
</section>

<?php require_once('footer.php');?>