<?php require_once('header.php');?>

<section class="inner-banner">
  <div class="inner-banner-sec">
    <div class="inner-banner-content">
      <div class="container">
        <div class="inner-banner-title">
          <h1>Contact Us</h1>
          <p>For any queries, please fill the details</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="smart-breadcumb">
  <div class="container">
    <div class="smart-breadcumb-sec">
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>">Simplifytrips Home</a></li>
        <li class="active">Contact Us</li>
      </ol>
    </div>
  </div>
</section>

<section class="static-page">
  <div class="container">
    <div class="static-page-sec">
      <div class="static-heading">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
            <div class="static-title">
              <h1>Contact Us</h1>
              <h3>Email: info@simplifytrips.com</h3>
              <h3>Phone: +91-8890780236, +91-7567949606</h3>
              <p>For any queries, please fill the details</p>
            </div>
          </div>
        </div>
      </div>
      <div class="static-content">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2  col-md-offset-2  col-sm-offset-1">
            <div class="static-contact">
            <?php echo form_open(''); ?>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="email" placeholder="Email Id" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="phone" placeholder="Contact" aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-comments-o" aria-hidden="true"></i></span>
                    <textarea type="text" rows="6" class="form-control" name="message" placeholder="Comment..." aria-describedby="basic-addon1"></textarea>
                  </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="contact-btn pull-right" type="submit">Submit</button>                  
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once('footer.php');?>