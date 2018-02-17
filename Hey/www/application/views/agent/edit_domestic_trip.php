<?php require_once('header.php');?>
<style type="text/css">
#file::-webkit-file-upload-button{
visibility:hidden;
}
#file{

    color:green;
    padding:5px; border:1px dashed #123456;
    background-color: #f9ffe5;
  width:94px;
  height: 94px;
}
#upload{
    margin-left: 45px;
}
.post-pics {width: 60%;height: auto;position: relative;}
#noerror{
    color:green;
    text-align: left;
}
#error{
    color:red;
    text-align: left;
}
#img{ 
    width: 25px;
    border: none; 
    height:25px;
    margin-left: -20px;
    margin-bottom: 91px;
}
.abcd{
    text-align: center;
}

.abcd img{
    height:90px;
    width:90px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
  float:left;
  
}

#file1{
    color:green;
    padding:5px; border:1px dashed #123456;
    background-color: #f9ffe5;
  width:94px;
}
#upload1{
    margin-left: 45px;
}

#img1{ 
    width: 25px;
    border: none; 
    height:25px;
    margin-left: -20px;
    margin-bottom: 91px;
}
.abcd1{
    text-align: center;
}

.abcd1 img{
    height:250px;
    width:250px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
  
  
}
#text1 {
    /* display: block; */
    text-align: center;
    margin-left: 224px;
    margin-top: -123px;
}


</style>

<?php
  //print_r($trip[0]);
?>
<section class="user-panel">
  <div class="container">
    <div class="user-panel-sec">
      <div class="user-panel-box">
        <div class="user-sec">
          <h1 class="text-center">Edit Your Domestic Trip and its Description</h1>
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
              
              <?php echo form_open_multipart('', array('class' => 'form-1')); ?>
                
                <div class="form-group">
                  <label for="title">Trip Title</label>
                  <input type="text" class="form-control" name="title" value="<?=set_value('title', $trip[0]->title)?>" id="title" placeholder="Trip Title">
                  <?php echo form_error('title', '<div class="error">', '</div>');?>
                </div>
                <?php //print_r($tripcategory); ?>
                <div class="form-group">
                  <label for="state">Trip State</label>
                  <select class="form-control" id="state" name="state">
                    <option value="">Select Trip State</option>
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
                <div class="form-group">
                  <label for="location">Trip Location</label>
                  <select class="form-control" id="location" name="location">
                    <option value="">Select Trip State first</option>
                  </select>
                  <?php echo form_error('location', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Trip Type</label>
                  <select class="form-control" id="category" name="category">
                    <option value="">Select Trip category</option>
                    <?php 
                    foreach ($tripcategory as $tripcategorykey => $tripcategoryvalue) {
                      ?>
                      
                       <option value="<?=$tripcategoryvalue->id?>"><?=$tripcategoryvalue->category?></option>
                      <?php
                    }

                    ?>
                  </select>
                  <?php echo form_error('category', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="description">Covered Places</label>
                  <textarea rows="5" class="form-control" id="description" name="description" placeholder="Covered Places : List the places that can be covered during the trip"><?=set_value('description', $trip[0]->description)?></textarea>
                  <?php echo form_error('description', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="accommodation">Accommodation type</label>
                  <input type="text" class="form-control" id="accommodation" name="accommodation" placeholder="Accommodation type: eg. Hotel or Camp or Homestay" value="<?=set_value('accommodation', $trip[0]->accommodation)?>">
                  <?php echo form_error('accommodation', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="transportation">Transportation type</label>
                  <input type="text" class="form-control" id="transportation" name="transportation" placeholder="Transportation type: eg. Bus or Flight or Train or Slef Drive" value="<?=set_value('transportation', $trip[0]->transportation)?>">
                  <?php echo form_error('transportation', '<div class="error">', '</div>');?>
                </div>

                <div class="form-group">
                  <label for="accommodation">Price in Rs.</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price e.g.: 4999" value="<?=set_value('price', $trip[0]->price)?>">
                  <?php echo form_error('price', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="">Included food</label><br>
                  <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-type active">
                    <input type="checkbox" name="food[]" autocomplete="off" checked> Breakfast
                  </label>
                  <label class="btn btn-type">
                    <input type="checkbox" name="food[]" autocomplete="off"> Lunch
                  </label>
                  <label class="btn btn-type">
                    <input type="checkbox" name="food[]" autocomplete="off"> Dinner
                  </label>
                </div>
                
                </div>
                <div class="form-group">
                  <label for="numofdays">No of Days</label>
                  <input type="number" class="form-control" id="numofdays" name="numofdays">
                    
                  <?php echo form_error('numofdays', '<div class="error">', '</div>');?>
                </div>
                <div class="form-group">
                  <label for="itinerary">Trip Itinerary</label>
                  <textarea rows="5" class="form-control" id="itinerary" name="itinerary" placeholder="Trip Itinerary"><?=set_value('price', $trip[0]->itinerary)?></textarea>
                  <?php echo form_error('itinerary', '<div class="error">', '</div>');?>  
                </div>
                <div class="form-group">
                  <label>Select Multiple Images For Bannner</label>
                  <div class="controls post-pics" id="mulimg">
                  <?php
                   
                    $banimg = unserialize($trip[0]->images);
                    if(is_array($banimg)):
                    foreach($banimg as $bannimg):
                      if($bannimg != ''){
                      ?>
                      

                      
                        <img src="<?=base_url().'uploads/'.$bannimg?>" style="width:100px; height: 100px;">
                        <a href="javascript:void(0)" data-image="<?=$bannimg?>" class="delimg" ><img src="<?=base_url()?>main-assets/images/delete.png" width="15px" style="position: absolute; margin: 10px -50px;"></a>
                    <?php
                    }
                      endforeach;
                      endif;
                    ?>
                    <div class="pics">
                      <div id="filediv"><input name="userfile[]" type="file" id="file" accept="image/*"/></div>
                    </div>           
                    <input type="button" id="add_more" class="upload" style="display:none;" value="Add More Files"/>
                    </div>
                  </div>
                <br>
                <button type="submit" class="btn btn-default pull-right">Submit</button>
                <span class="clearfix"></span>
              <?php echo form_close(); ?>
            </div>            
          </div>
        </div>        
      </div>
    </div>
  </div>
</section>

<?php require_once('footer.php');?>
<script type="text/javascript">
        $(document).ready(function(){

        $('#state').val('<?=set_value('state', $trip[0]->state_id)?>').change();

        setTimeout(function(){
         $('#location').val('<?=set_value('location', $trip[0]->location_id)?>').change();
         $('#category').val('<?=set_value('category', $trip[0]->categoryid)?>').change();
         $('#numofdays').val('<?=set_value('numofdays', $trip[0]->numofdays)?>');
       }, 500);

        $('.delimg').click(function(){
          var imgname = $(this).attr('data-image');
          //alert(imgname);
          $.post("<?=base_url()?>ajax/deleteimg_domestic_trip", {imgname: imgname, id: <?=$trip[0]->id?>, agent_id: <?=$trip[0]->agent_id?>}, function(data){
              window.location.reload();
              
              
          });
        });
       
});
</script>