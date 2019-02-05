<div id="page-wrapper" class="add_room profile-block-cus">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Room </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i>  -->Hotel </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>
    <!-- Page Heading << -->
    <?php
  if($this->session->flashdata('success'))
  {?>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                    </div>
                </div>
   <?php
  }
  if($this->session->flashdata('error'))
  {?>
  	  <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <?php echo $this->session->flashdata('error');?>
                        </div>
                    </div>
                </div>
  <?php
  }
  ?>   
  <form class="profile_tab_cus_block_1" role="form" enctype="multipart/form-data" action="" method="post">
    
     <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Basic</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Images</a></li>
        <li><a data-toggle="tab" href="#tabs-3">Facilities </a></li>
	</ul>
		
	<br>
	 <div  class="tab-content">
       <div id="tabs-1" class="tab-pane fade in active tab_main_content_cus">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms</h3>
              </div>
              <div class="panel-body">
              	   	<div class=" col-lg-12">
                <div class="list-group">
                
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Room Type</label>
                        <input class="col-lg-8 form-control " name="room_title" id="room_title" value="<?php echo $result->room_title;?>">
                      </div>
                  
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Room size</label>
                        <input class="col-lg-8 form-control " name="room_size" value="<?php echo $result->room_size;?>">
                      </div>

                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">No of Beds</label>
                        <select class="col-lg-8 form-control beds" name="room_beds">
						
						<?php for($x=1;$x<=20;$x++){?>
						<option value="<?php echo $x;?>" <?php  if($result->room_beds == $x){?> selected="selected"<?php }?> ><?Php echo $x;?></option>
						<?php }?>
						
                            
                        </select>
                      </div>

                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Bed Size(s)</label> 
                        <input class="col-lg-8 form-control " name="room_bed_size" value="<?php echo $result->room_bed_size;?>">
                      </div>
                          <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Description</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor " rows="3" name="room_des"><?php echo $result->room_des;?></textarea>
                      	</div>
                       </div>
                      
                      

                      </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      
     <div id="tabs-2" class="tab-pane fade in tab_main_content_cus">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Room Images</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  
                  	<div class="panel">
                  		<div class="hotel_image_row col-lg-12">
                  	<div class="col-md-12">
                  	   <?php
                    $image_count=count($result_images);
                   if($image_count==0){
                  ?>
                  
                  
                   <div class="form-group col-md-12 hotel_img_title_block   h_cus_1 ">
					  
                        <label class="col-lg-6 h_cus_1_2">Image</label> 
                         <div class="col-lg-6 text-right">
                          <button type="button" class="btn cus-btn btn-success  pull-right room_image_add h2_cus_img"> <i class="fa fa-plus"></i> Add More Images</button>
                      </div>
                         
                 
                   <div class="img_cus_block  img_cus_block_h1">
                        <input class=" " type="file" name="room_image[]"/>

                    </div>
                    
                    
                  
                   <!-- <div class="form-group row">
                        <label class="col-lg-2 ">Image</label>
                        <input class="col-lg-5 form-control " type="file" name="room_image[]">
                     <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-default pull-right room_image_add">Add More Images</button>
                        </div>
                      </div> -->
                  <?php
				   }
					else
					{?>
						
						<input type="hidden" name="img_count" id="img_count" value="<?php echo $image_count;?>" />
                      <div class="form-group col-md-12 hotel_img_title_block ">
                        <label class="col-lg-6">Images</label>
                       
                        <div class="col-lg-6 text-right">
                        	<?php if($image_count<5):  ?>
                          <button type="button" class="btn cus-btn btn-success pull-right  room_image_edit"><i class="fa fa-plus"></i> Add More Images</button>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="img_cus_block ">
                      <input type="file" id="fileLoader" name="room_image[]" title="Load File" style = "display:none;" />
                    
					<?php	foreach($result_images as $images): ?>
					
					 <a class="hotel_images_cus"  href="<?php echo base_url();?>roomtype/image_edit/<?php echo $result->id;?>/<?php echo $images->id;?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=600,height=450,screenX=220,screenY=160,resizable,scrollbars');return false;" title="Zoom">	
	<img src="<?php echo base_url(). '../'.$images->thumb;?>" width='120' height='100'  /> </a>
                      	
                      	<input type="file" id="fileLoader" name="package_image[]" title="Load File" style = "display:none;" />
                      	
					<?php endforeach;
					}
				   
                  ?>
                  
                  	<br/><br/>
                  	
                  	 </div>
                  <div class="room_image_row">
				 </div>
                   </div>
                    </div>   
                 </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
        </div>
      </div>





      
      
      <div id="tabs-3" class="tab-pane fade in tab_main_content_cus">
        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Room Facilities</h3>
              </div>
              <div class="panel-body h_facilities_block">
                <div class="list-group">
                 
                    <div class="panel col-md-12 ">
                    	<div class="container-fluid hotel_fac">

                      <h4>Facilities</h4>
                      <div class="col-lg-12 no_padding_l no_padding_r">
                          <span class="radio-inline  col-md-3 ">
                          <input  class="css-checkbox room_facilities" type="checkbox"   id="chk56"  value="1" name="room_city_view" <?php echo ($result_facilities->city_view==1 ? 'checked' : '');?>>
                         <label for="chk56" class="css-label">  City view </label></span>
                         
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk57"  value="1" name="room_tel" class="css-checkbox room_facilities" <?php echo ($result_facilities->telephone==1 ? 'checked' : '');?>>
                          <label for="chk57" class="css-label"> Telephone </label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"   id="chk58" class="css-checkbox room_facilities" value="1" name="room_sat_channels" <?php echo ($result_facilities->satellite_channels==1 ? 'checked' : '');?>>
                         <label for="chk58" class="css-label">  Satellite Channels </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"   id="chk59" class="css-checkbox room_facilities" value="1" name="room_flat_screen_tv" <?php echo ($result_facilities->flat_screen_tv==1 ? 'checked' : '');?>>
                          <label for="chk59" class="css-label">  Flat-screen TV </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk60"  class="css-checkbox room_facilities" value="1" name="room_safety_deposit_box" <?php echo ($result_facilities->safety_deposit_box==1 ? 'checked' : '');?>>
                          <label for="chk60" class="css-label">Safety Deposit Box  </label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk61" value="1" class="css-checkbox room_facilities" name="room_ac" <?php echo ($result_facilities->air_conditioning==1 ? 'checked' : '');?>>
                         <label for="chk61" class="css-label"> Air Conditioning </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk62"  value="1" class="css-checkbox room_facilities" name="room_iron" <?php echo ($result_facilities->iron==1 ? 'checked' : '');?> >
                          <label for="chk62" class="css-label">  Iron </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk63" value="1" name="room_desk" <?php echo ($result_facilities->desk==1 ? 'checked' : '');?>>
                         <label for="chk63" class="css-label">   Desk </label></span>
                         <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk64"  value="1" class="css-checkbox room_facilities" name="room_ironing_facilities" <?php echo ($result_facilities->iron_facilities==1 ? 'checked' : '');?>>
                         <label for="chk64" class="css-label"> Ironing Facilities</label></span>
                         <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk65" value="1" class="css-checkbox room_facilities" name="room_heating" <?php echo ($result_facilities->heating==1 ? 'checked' : '');?>>
                           <label for="chk65" class="css-label"> Heating</label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk66" value="1" name="room_carpeted" class="css-checkbox room_facilities" <?php echo ($result_facilities->carpeted==1 ? 'checked' : '');?>>
                          <label for="chk66" class="css-label">Carpeted</label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk67" value="1" class="css-checkbox room_facilities" name="room_interconnected_rooms" <?php echo ($result_facilities->interconnected_rooms==1 ? 'checked' : '');?>>
                           <label for="chk67" class="css-label"> Interconnected room(s) available </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk68" value="1" class="css-checkbox room_facilities" name="room_private_entrance" <?php echo ($result_facilities->private_entrance==1 ? 'checked' : '');?>>
                          <label for="chk68" class="css-label">Private entrance </label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk69" value="1" class="css-checkbox room_facilities" name="room_sofa" <?php echo ($result_facilities->sofa==1 ? 'checked' : '');?>>
                           <label for="chk69" class="css-label">Sofa </label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk70"  value="1" name="room_sound_proofing" <?php echo ($result_facilities->soundproofing==1 ? 'checked' : '');?>>
                           <label for="chk70" class="css-label">Soundproofing </label></span>
                         <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk71" value="1" class="css-checkbox room_facilities" name="room_wardrobe_closet" <?php echo ($result_facilities->wardrobe_closet==1 ? 'checked' : '');?>>
                          <label for="chk71" class="css-label"> Wardrobe/Closet </label></span>
                         <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk72" value="1" class="css-checkbox room_facilities" name="room_hypoallergenic" <?php echo ($result_facilities->hypoallergenic==1 ? 'checked' : '');?>>
                         <label for="chk72" class="css-label"> Hypoallergenic </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk73" value="1" name="room_shower" <?php echo ($result_facilities->shower==1 ? 'checked' : '');?>>
                          <label for="chk73" class="css-label">Shower </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk74"  value="1" class="css-checkbox room_facilities" name="room_hair_dryer" <?php echo ($result_facilities->hairdryer==1 ? 'checked' : '');?>>
                         <label for="chk74" class="css-label"> Hairdryer</label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk75" value="1" class="css-checkbox room_facilities" name="room_free_toiletries" <?php echo ($result_facilities->free_toiletries==1 ? 'checked' : '');?>>
                           <label for="chk75" class="css-label"> Free toiletries </label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk76" value="1" name="room_toilet" <?php echo ($result_facilities->toilet==1 ? 'checked' : '');?>>
                          <label for="chk76" class="css-label"> Toilet</label></span>
                            <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk77" value="1" class="css-checkbox room_facilities" name="room_bathroom" <?php echo ($result_facilities->bathroom==1 ? 'checked' : '');?>>
                          <label for="chk77" class="css-label">  Bathroom </label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk78" value="1" class="css-checkbox room_facilities" name="room_minibar" <?php echo ($result_facilities->minibar==1 ? 'checked' : '');?>>
                           <label for="chk78" class="css-label"> Minibar</label></span>
                          <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk79" value="1" class="css-checkbox room_facilities" name="room_electric_kettle" <?php echo ($result_facilities->electric_kettle==1 ? 'checked' : '');?>>
                          <label for="chk79" class="css-label"> Electric kettle</label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"   id="chk80" value="1" class="css-checkbox room_facilities" name="room_wakeup_service" <?php echo ($result_facilities->wakeup_service==1 ? 'checked' : '');?>>
                         <label for="chk80" class="css-label">  Wake-up service</label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk81"  value="1"  class="css-checkbox room_facilities" name="room_towels" <?php echo ($result_facilities->towels==1 ? 'checked' : '');?>>
                         <label for="chk81" class="css-label">  Towels</label></span>
                           <span class="radio-inline  col-md-3 ">
                          <input type="checkbox"  id="chk82" value="1"name="room_free_wifi" class="css-checkbox room_facilities" <?php echo ($result_facilities->free_wifi==1 ? 'checked' : '');?>>
                          <label for="chk82" class="css-label"> Free Wifi</label></span>
                            <span class=" radio-inline col-md-3">
                          <input id="chk110" class="css-checkbox room_facilities" type="checkbox"  value="1"name="breakfast" <?php echo ($result_facilities->breakfast==1 ? 'checked' : '');?>>
                          <label class="css-label" for="chk110"> Breakfast </label></span>
                      </div>
                    </div>                                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group form-footer">
      <button type="submit" class="btn btn-primary btn cus-btn" name="room_sub_edt" id="room_sub_edt">Submit</button>
      <button type="reset" class="btn btn-default btn cus-btn">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

