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
                      <a href="<?=base_url();?>agent" class="btn btn-success" style="float:right; margin-left:10px">Back to Profile</a>
                          <h1 class="panel-title">International Trip</h1>
                        </div>
                        <div class="panel-body">                          
                          <div class="row" style="margin-bottom: 15px ">
                            <div class="col-md-12">
                            <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  You are having <strong><?=$agent->internationaltrip - count($trip)?></strong> International trip left to add out of <strong><?=$agent->internationaltrip?></strong> International trip.
                            </div>
                              <div class="col-md-2"><a href="<?=base_url()?>agent/addtrip_international" class="btn btn-primary">Add New</a></div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="user-trip">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-highlight">
                                  <thead>
                                    <th>S.No.</th>
                                    <th>Trip Title</th>
                                    <th>Destination</th>
                                    <th>Description</th>
                                    <th>Days</th>
                                    <th>Cost</th>                
                                  </thead>
                                  <tbody>
                                  <?php
                                  foreach ($trip as $tripkey => $tripvalue) {
                                  ?>
                                    <tr>
                                      <td class="text-center"><?=$tripkey+1?>.</td>
                                      <td><div class="col-md-12"><?=$tripvalue->title?></div><div class="col-md-12"><!--<a href="<?=base_url()?>agent/international/view/<?=$tripvalue->id?>">view</a>--> <a href="<?=base_url()?>agent/international/edit/<?=$tripvalue->id?>">edit</a> <a href="<?=base_url()?>agent/international/delete/<?=$tripvalue->id?>">delete</a> </div></td>
                                      <td><?=$tripvalue->country?></td>
                                      <td><?=nl2br($tripvalue->description)?></td>
                                      <td><?=$tripvalue->numofdays?></td>
                                      <td><?=$tripvalue->price?></td>
                                    </tr>
                                  <?php
                                   }
                                  ?>
                                  </tbody>
                                </table>
                              </div>
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