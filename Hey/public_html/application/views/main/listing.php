
<?php require_once('header.php'); ?>
<?php
  
if ($error == 'loc') {
  ?>
  <script type="text/javascript">
    alert('It seems there are no tour packages of your choice, don\'t worry use our "customize your trip" option to get package created');
    window.history.back();
  </script>
  <?php
}
else if ($error == 'serch') {
  ?>
  <script type="text/javascript">
    alert('We are sorry...it seems no tour operator is registered with us from your region...don\'t worry we are working on it');
    window.history.back();
  </script>
  <?php
}
?>

<section class="listing">
  <div class="container">
  	<div class="listing-sec">
  	  <div class="row">
  	  	<div class="col-lg-3 col-md-3 col-sm-3 col-lg-12">
          <div class="listing-left">
            <div class="mani-filter">
              <div class="mani-filter-heading">
                <h2>Filter</h2>
              </div>
              <div class="mani-filter-body">
                <div class="mani-search">
                  <div class="mani-search-title">Search</div>
                  <?php echo form_open(base_url().'search', array('method' => 'get')); ?>
                  <?php echo form_hidden('options', $_GET["options"]); ?>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="origin" value="<?=$_GET['origin']?>" placeholder="Origin">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="destination" value="<?=$_GET['destination']?>" placeholder="Destination">
                  </div>
                  <input type="hidden" name="minprice" value="0">
                  <input type="hidden" name="maxprice" value="500000">
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="float: right; display: block;" >Submit</button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <div class="clearfix"></div>
                <div class="mani-price">
                  <div class="mani-search-title">Filter by Price</div>
                  
                 
                <div id="slider-range"></div>
                <input type="text" id="amount-min" readonly="" value="" style="border:0;color:#f6931f;font-weight:bold;float:left;width: 50%;">
                <input type="text" id="amount-max" readonly="" value="" style="border:0;color:#f6931f;font-weight:bold;float: left;width: 50%;text-align: right;">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="pricesubmit" style="float: right; display: block;" >Submit</button>
                  </div>
                </div>
                <br/>
                <div  class="mani-type" style="clear: both">
                  <div class="mani-search-title">Filter by Trip category</div>
                  <?php
                    foreach ($category as $keycategory => $valuecategory) {
                      ?>
                      <div class="checkbox">
                    <label>
                      <input type="checkbox" value="<?=$valuecategory->id?>"> <?=$valuecategory->category?>
                    </label>
                  </div>
                  <?php
                    }
                  ?>
                  
                  
                </div>
                
             </div>
             <!--<div class="mani-filter-footer">
              <ul class="mani-filter-btns">
                <li><a href="#">Filter</a></li>
                <li><a href="#">Reset</li>
              </ul>
             </div>-->
            </div>
          </div>
        </div>
  	  	<div class="col-lg-9 col-md-9 col-sm-9 col-lg-12">
  	  	  <div class="listing-right">
  	  	  	<div class="listing-sort">
  	  	  	  <div class="row">
  	  	  	  	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-12">
  	  	  	  	  <div class="sort-left">
  	  	  	  	  	<p>Showing <?=count($result)?> out of <?=count($result)?> Trips</p>
  	  	  	  	  </div>
  	  	  	  	</div>
  	  	  	  	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-12">
  	  	  	  	  <div class="sort-right">
  	  	  	  	  	<div class="row">
  	  	  	  	  	  <div class="col-lg-6 col-md-6 col-sm-6 col-lg-12">
  	  	  	  	  	  	<div class="sort-popularity">
                        <?php
                        if(!isset($_GET['pricesort'])){
                          $pricesort = '';

                        }
                        else{
                          $pricesort = $_GET['pricesort'];
                        }
                         ?>

  	  	  	  	  	  	  <select class="form-control" id="pricesort" name="pricesort">
            						    <option value="" <?php if($pricesort == ''): echo 'selected'; endif;  ?>>Sort by Price</option>
            						    <option value="ASC" <?php if($pricesort == 'ASC'): echo 'selected'; endif;  ?>>Low to High</option>
            						    <option value="DESC" <?php if($pricesort == 'DESC'): echo 'selected'; endif;  ?>>High to Low</option>
            						    <option value="RANDOM" <?php if($pricesort == 'RANDOM'): echo 'selected'; endif;  ?>>Random</option>
            						    
            						  </select>
  	  	  	  	  	  	</div>
  	  	  	  	  	  </div>
  	  	  	  	  	  <div class="col-lg-6 col-md-6 col-sm-6 col-lg-12">
  	  	  	  	  	  	<div class="share-social">
                        <?php
                        if(!isset($_GET['daysort'])){
                          $daysort = '';

                        }
                        else{
                          $daysort = $_GET['daysort'];
                        }
                         ?>
  	  	  	  	  	  	  <select class="form-control" id="daysort" name="daysort">
            						    <option value="" <?php if($daysort == ''): echo 'selected'; endif;  ?>>Sort by Days</option>
            						    <option value="ASC" <?php if($daysort == 'ASC'): echo 'selected'; endif;  ?>>Low to High</option>
                            <option value="DESC" <?php if($daysort == 'DESC'): echo 'selected'; endif;  ?>>High to Low</option>
                            <option value="RANDOM" <?php if($daysort == 'RANDOM'): echo 'selected'; endif;  ?>>Random</option>
            						    
            						  </select>
  	  	  	  	  	  	</div>
  	  	  	  	  	  </div>
  	  	  	  	  	</div>
  	  	  	  	  </div>
  	  	  	  	</div>
  	  	  	  </div>
  	  	  	</div>
            <?php
              foreach ($result as $key => $value) {
               // print_r($value);
                ?>
            <div class="listing-info">
              <div class="listing-info-sec">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="listing-img">
                      <figure>
                        <img src="<?=base_url();?>uploads/<?=array_values(unserialize($value->images))[0]?>" alt="" title="" class="img-responsive list-img">
                        <figcaption>
                          <div class="tour-add-list">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </div>
                        </figcaption>
                      </figure>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                    <div class="listing-details">
                      <h2 class="tour-name"><?=$value->title?></h2>
                      
                      <p>&nbsp;</p>
                      <div class="tour-inclusions">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="tour-inclusions-info accommodation" data-toggle="tooltip" title="<?=$value->accommodation?>">
                              <div class="tour-inclusions-info-icon"><i class="fa fa-bed" aria-hidden="true"></i></div>
                              <div class="tour-inclusions-info-title"><?=$value->accommodation?></div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="tour-inclusions-info" data-toggle="tooltip" title="<?=$value->transportation?>">
                              <div class="tour-inclusions-info-icon"><i class="fa fa-car" aria-hidden="true"></i></div>
                              <div class="tour-inclusions-info-title"><?=$value->transportation?></div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="tour-inclusions-info" data-toggle="tooltip" title="<?=$value->categoryname?>">
                              <div class="tour-inclusions-info-icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                              <div class="tour-inclusions-info-title"><?=$value->categoryname?></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <p>&nbsp;</p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; <?=nl2br($value->description)?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="tour-booking">
                      <div class="tour-provider"><?=$value->organisation?></div>
                      <div class="tour-phone"><?=$value->phone?></div>
                      <div class="tour-phone"><a href=""><?=$value->url?></a></div>
                      <div class="tour-price"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value->price?></div>
                      <br/>
                      <!--<div class="brck-optn">Breakfast included</div>-->
                      <a href="javascript:void(0)" class="tour-view-details">View Detail</a>
                    </div>
                  </div>
                </div>
                <div class="row detail hide">
                  <div style="padding:20px; border:0px solid #000">
                  <!--<div class="description">
                    <h2>Description</h2>
                    <p><?=nl2br($value->description)?></p>
                  </div>-->
                  <div class="itinerary">
                    <h2>Itinerary</h2>
                    <p><?=nl2br($value->itinerary)?></p>
                  </div>
                  
                  </div>
                </div>
                <div class="row image hide">
                  <div style="padding:20px; border:0px solid #000">
                  <div class="description">
                    <?php
                      foreach (unserialize($value->images) as $images) {
                        ?>
                        <img src="<?=base_url()?>uploads/<?=$images?>">
                        <?php
                      }
                     // unserialize($value->images)
                    ?>
                  </div>
                  
                  </div>
                </div>                
              </div>              
            </div>
                <?php
              }
            ?>
  	  	  	
  	  	  	<!--
  	  	  	<div class="tour-pagination">
  	  	  	  <nav aria-label="Page navigation">
			  	<ul class="pagination">
			      <li>
			      	<a href="#" aria-label="Previous">
			          <span aria-hidden="true">&laquo;</span>  
			      	</a>
			      </li>
			      <li><a href="#">1</a></li>
			      <li><a href="#">2</a></li>
			      <li><a href="#">3</a></li>
			      <li><a href="#">4</a></li>
			      <li><a href="#">5</a></li>
			      <li><a href="#">6</a></li>
			      <li><a href="#">7</a></li>
			      <li><a href="#">8</a></li>
			      <li><a href="#">9</a></li>
			      <li><a href="#">10</a></li>
			      <li>
			      	<a href="#" aria-label="Next">
			          <span aria-hidden="true">&raquo;</span>
			      	</a>
			      </li>
			  	</ul>
			  </nav>
  	  	  	</div>-->
  	  	  </div>
  	  	</div>
  	  </div>  		
  	</div>
  </div>
</section>
<div class="customize-btn">
  <div class="customize-btn-sec">
    <p><a href="http://www.simplifytrips.com/home/customize"><i class="fa fa-cogs" aria-hidden="true"></i>  Plan your trip</a></p>
  </div>
</div>
<?php require_once('footer.php'); ?>

  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 1000,
      max: 500000,
      <?php
      if($_GET['minprice'] != '' && $_GET['maxprice'] != ''){
        ?>
        values: [ <?=$_GET['minprice']?>, <?=$_GET['maxprice']?> ],
        <?php
      }
      else{
        ?>
        values: [ 2000, 50000 ],
        <?php
      }
      ?>
      
      slide: function( event, ui ) {
        $( "#amount-min" ).val( ui.values[ 0 ]);
        $( "#amount-max" ).val( ui.values[ 1 ] );
      }
    });
    $( "#amount-min" ).val( $( "#slider-range" ).slider( "values", 0 ) );
    $( "#amount-max" ).val( $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
