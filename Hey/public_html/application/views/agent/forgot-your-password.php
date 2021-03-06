<?php require_once('headerwithoutlogin.php');?>
<section class="account">
  <div class="container">
    <div class="account-sec">
      <div class="account-user-sec">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
            <div class="row">
              
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="acount-info">
                  <div class="account-sign-up">
                    <div class="account-heading">Recover your Password on your email</div>
                    <?php echo form_open('', array('class' => 'user-sign-in-info')); ?>
                      <?php echo form_hidden('url', set_value('url', @$_GET["redir"])); ?>
                      
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
              
                      <?php echo form_submit('signinSubmit', 'Log In',"class='user-log-in-btn'"); ?>
                      <span class="clearfix"></span>
                    <?php echo form_close(); ?>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="user-extra">
              <div class="create-account">
                <p>Know your password ? <a href="<?=base_url()?>agent/signin?redir=<?=@$_GET['redir']?>">Login here.</a></p>
                <p>Don't have an account? <a href="<?=base_url()?>agent/signup?redir=<?=@$_GET['redir']?>">Sign up.</a></p>
              </div>
              <div class="account-content">
                <div class="account-content-heading">Do more with simplifytrips!</div>
                <p>With your simplifytrips account you can save and share multiple trip lists with your fellow travellers. You can even create price alerts for your upcoming trips.We will automatically sync your account across all of your devices.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once('footer.php');?>