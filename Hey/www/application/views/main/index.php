  <?php require_once('header-home.php');?>
  <section class="home-search">
  
<div class="home-slider">
  <div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active slide1" style="background-image: url(<?=base_url();?>main-assets/images/banner/img-1.jpg);"></div>
        <div class="item slide2" style="background-image: url(<?=base_url();?>main-assets/images/banner/img-2.jpg);"></div>
        <div class="item slide3" style="background-image: url(<?=base_url();?>main-assets/images/banner/img-3.jpg);"></div>
      </div>
    </div>
  </div>
</div>

  <div class="container">
    <div class="home-search-sec">
      <div class="home-search-info">        
        <div class="row">
          <div class="col-lg-8 col-md-6 col-sm-6 col-sm-12 col-md-offset-3  col-lg-offset-2">
            <div class="home-search-box">
              <div class="home-search-box-sec">
                <div class="home-search-content">
                  <div class="home-seach-content-info">
                    <p>YOUR HOLIDAY SEARCH ENDS HERE...!!!</p>
                  </div>
                </div>
                <div class="home-search-cat">
                  <div>
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#home" role="tab" data-toggle="tab">Domestic</a></li>
                      <li><a href="#profile" role="tab" data-toggle="tab">International</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="tab-content">
                    <div class="tab-pane active" id="home">
                      <?php echo form_open('search', array('method' => 'get')); ?>
                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                        <div class="search-icons">
                          <div class="search-icon-first">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                          </div>
                            <div class="search-line"></div>
                          <div class="search-icon-second">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="hidden" name="options" value="domestic">
                        <div class="origin">
                          <div class="form-group">

                            <label for="exampleInputEmail1">Your Origin</label>
                            <input class="form-control awesomplete" name="origin" id="exampleInputEmail1" placeholder="Type Departure City" data-autofirst data-minchars="1" data-list="<?php foreach ($origin as $key => $value) {
                            echo $value->location.', ';
                        } ?>" xautofocus />
                          </div>
                        </div>
                        <div class="destination">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Your Destination</label>
                            <input class="form-control awesomplete" name="destination" id="exampleInputEmail1" placeholder="Don't know where to go? Inspire Me !!" data-autofirst data-minchars="1" data-list="<?php foreach ($destination as $key1 => $value1) {
                            echo $value1->location.', ';
                        } ?>" xautofocus />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                          <button type="submit" class="btn btn-search pull-right">Search Holidays</button>
                        </div>
                      </div>
                      <input type="hidden" name="minprice" value="0">
                          <input type="hidden" name="maxprice" value="500000">
                      <?php echo form_close(); ?>
                    </div>
                    <div class="tab-pane" id="profile">
                      <?php echo form_open('search', array('method' => 'get')); ?>
                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                        <div class="search-icons">
                          <div class="search-icon-first">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                          </div>
                            <div class="search-line"></div>
                          <div class="search-icon-second">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="hidden" name="options" value="international">
                        <div class="origin">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Your Origin</label>
                            <input class="form-control awesomplete" name="origin" id="exampleInputEmail1" placeholder="Type Departure City" data-autofirst data-minchars="1" data-list="<?php foreach ($origin as $key => $value) {
                            echo $value->location.', ';
                        } ?>" xautofocus />
                          </div>
                        </div>
                        <div class="destination">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Your Destination</label>
                            <input class="form-control awesomplete" name="destination" id="exampleInputEmail1" placeholder="Don't know where to go? Inspire Me !!" data-autofirst data-minchars="1" data-list="<?php foreach ($origin_country as $key_country => $value_country) {
                            echo $value_country->location.' - '.$value_country->country.', ';
                        } ?>" xautofocus />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                          <button type="submit" class="btn btn-search pull-right">Search Holidays</button>
                        </div>
                      </div>
                      <input type="hidden" name="minprice" value="0">
                          <input type="hidden" name="maxprice" value="500000">
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>                                
                <span class="clearfix"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="home-about">
  <div class="container">
    <div class="home-about-sec">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
          <div class="home-about-header">
            <!--<h1>Simplifytrips</h1>-->
          </div>
          <div class="home-about-body">
            <p><b><i>“The most beautiful things in life are not things they are people & places, memories & pictures they are feelings & moments, smiles & laughter”</i></b></p>
            <p style="text-align: center;">-  Anonymous traveler</p>
            <p>All the above felt emotions can be tied to one word & that is “travelling”. It leaves an everlasting impression on you & that changes your viewpoint, well or more so in most cases.</p>
            <p>The only constant in this world is change …… & we are going to offer you just that in terms of spectacular views, breathtaking experiences & last but not the least some time away from humdrum of daily life.</p>
            <p>Simplify trips is a result of one of those changes observed by its founder Mr. Tushar Choudhary an avid biker & traveler himself.  Traveling & experiencing things first hand, he observed the things required for a traveler whether going solo or with a group (family, friends, honeymoon etc).</p>
            <p>Since an untouched place needs a little introduction & education before planning. It also needs a little assurance from the people who either have been there or have an idea about the place. This is where “Simplify trips” comes in handy, who you can trust & interact with our network of operators.</p>
            <p>Not only will they give you assurance about your forthcoming holidays you can choose them depending on your budget & the information furnished by them on the website.</p>
            <p>In a nut shell we wishes to combine these two important facts 1st) Ease of search 2nd) Comparison amongst various options.  Comparing will empower the customers to get the best deal & let’s be honest who doesn’t like a good deal.</p>
            <p>A big cheers !!...........To those unlimited memories we'll help you make</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<section class="home-testimonial">
  <div class="home-testimonial-sec">
    <div class="home-testimonial-header">
      <h1>What Our Travelers Say About Us?</h1>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">      
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="home-testimonial-box">
            <div class="container">
              <div class="home-testimonial-user">
                <figure>
                  <img src="http://www.simplifytrips.com/main-assets/images/testimonial/img-1.jpg" alt="" title="" class="img-responsive">
                </figure>
                <div class="home-testimonial-user-content">
                  <p>It was a great experience searching and comparing trips on in this site...kudos to them for bringing all things at one place.</p>
                  <h6>Harsh dev</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="home-testimonial-box">
            <div class="container">
              <div class="home-testimonial-user">
                <figure>
                  <img src="http://www.simplifytrips.com/main-assets/images/testimonial/img-2.jpg" alt="" title="" class="img-responsive">
                </figure>
                <div class="home-testimonial-user-content">
                  <p>Simplifytrips is so simple and easy to use, and from the customer’s point of view it is very intuitive.</p>
                  <h6>Deepak Choudhary</h6>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="item">
          <div class="home-testimonial-box">
            <div class="container">
              <div class="home-testimonial-user">
                <figure>
                  <img src="http://www.simplifytrips.com/main-assets/images/testimonial/img-3.jpg" alt="" title="" class="img-responsive">
                </figure>
                <div class="home-testimonial-user-content">
                  <p>A very nice concept and a unique user experience, loved the deals and ease to use this site. A definite recommendation from my side for travelers to use this platform.</p>
                  <h6>Ashutosh Mishra</h6>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="item">
          <div class="home-testimonial-box">
            <div class="container">
              <div class="home-testimonial-user">
                <figure>
                  <img src="http://www.simplifytrips.com/main-assets/images/testimonial/img-4.jpg" alt="" title="" class="img-responsive">
                </figure>
                <div class="home-testimonial-user-content">
                  <p>What can we expect nowadays…?? All the deals at one place…moreover customize your trip and get quotes from various tour operators…..a thumps up from my side.</p>
                  <h6>Ajay Kumar</h6>
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