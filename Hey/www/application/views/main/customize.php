<?php require_once('header.php');?>
<section class="inner-banner">
  <div class="inner-banner-sec">
    <div class="inner-banner-content">
      <div class="container">
        <div class="inner-banner-title">
          <h1>Customize Your Trip</h1>
          <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="smart-breadcumb">
  <div class="container">
    <div class="smart-breadcumb-sec">
      <ol class="breadcrumb">
        <li><a href="index.html">Simplifytrips Home</a></li>
        <li class="active">Customize Your Trip</li>
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
              <h1>Customize Your Trip</h1>
              <p>Simplifytrips provide you the option to customize your trip as per your discretion.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="static-content">
        <div class="row">
        <form action="" method="post">
          <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2  col-md-offset-2  col-sm-offset-1">
            <div class="static-contact">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                    <label for="phone">Contact</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="origin">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" placeholder="Type Your Origin">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destinition" placeholder="Type Your Destination">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                  <div class="form-group">
                    <label for="numoftravelers">No. of travelers</label>
                    <input type="text" class="form-control" id="numoftravelers" name="numoftravelers" placeholder="No. of travelers">
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
                    <label for="numofdays">No. of days</label>
                    <input type="text" class="form-control" id="numofdays" name="numofdays" placeholder="No. of days">
                  </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
                    <label for="intermediateplace">Add intermediate places to visit</label>
                    <input type="text" class="form-control" id="intermediateplace" name="intermediateplace" placeholder="When are you planning to go">
                  </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                  <div class="form-group">
                    <label for="triptype">Trip Type</label>
                    <select class="form-control" name="triptype" id="triptype">
                      <option>Trip Type</option>
                      <option>Adventure Trip</option>
                      <option>Historical Trip</option>
                      <option>Honeymoon Trip</option>
                      <option>Weekend Gataway</option>
                      <option>Pligrimage</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="about">About Your Trip</label>
                    <textarea cols="4" rows="4" class="form-control" id="about" name="about" placeholder="About Your Trip"></textarea>
                  </div>                 
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="contact-btn pull-right" type="submit">Submit</button>                  
                </div>
              </div>

            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



<?php require_once('footer.php');?>