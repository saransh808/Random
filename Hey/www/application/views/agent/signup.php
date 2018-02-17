<?php require_once('headerwithoutlogin.php');?>
<section class="account">
  <div class="container">
    <div class="account-sec">
      <div class="account-user-sec">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="acount-info">
                  <div class="account-sign-up">
                    <div class="account-heading">Agent Sign up with your email</div>
                    
                    <?php echo form_open('', array('class' => 'user-sign-in-info')); ?>
                      <?php echo form_hidden('url', set_value('url', @$_GET["redir"])); ?>
                      <label for="basic-url">Full Name</label>
                      <div class="input-group">
                      <?php echo form_input(array(
                                            'type'    => 'text',
                                            'name'    => 'fullname',
                                            'value'   => set_value('fullname'),
                                            'placeholder'  => 'Enter your Full name',
                                            'id'      => '',
                                            'class'   => 'form-control',
                                            'aria-describedby' => 'basic-addon2'
                                              )); ?>
                        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user" aria-hidden="true"></i></span>
                      </div>
                      <?php echo form_error('fullname', '<div class="error">', '</div>');?><br>
                      
                      <label for="basic-url">Email address</label>
                      <div class="input-group">
                        <?php echo form_input(array(
                                            'type'    => 'text',
                                            'name'    => 'email',
                                            'value'   => set_value('email'),
                                            'placeholder'  => 'Enter your Email-id',
                                            'id'      => '',
                                            'class'   => 'form-control',
                                            'aria-describedby' => 'basic-addon2'
                                              )); ?>
                        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                      </div>
                      <?php echo form_error('email', '<div class="error">', '</div>');?><br>
                      <label for="basic-url">Password</label>
                      <div class="input-group">
                        <?php echo form_input(array(
                                            'type'    => 'password',
                                            'name'    => 'password',
                                            'value'   => set_value('password'),
                                            'placeholder'  => 'Enter your password',
                                            'id'      => '',
                                            'class'   => 'form-control',
                                            'aria-describedby' => 'basic-addon2'
                                              )); ?>
                        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                      </div>
                      <?php echo form_error('password', '<div class="error">', '</div>');?><br>
                      
                      <?php echo form_submit('signupSubmit', 'Sign up',"class='user-log-in-btn'"); ?>
                      <span class="clearfix"></span>
                    <?php echo form_close(); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="user-extra">
              <div class="create-account">
                <p><a href="<?=base_url()?>agent/signin?redir=<?=@$_GET['redir']?>"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to login</a></p>
              </div>
              <div class="account-content">                
                <p>Do you need help? <a href="">Contact us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once('footer.php');?>