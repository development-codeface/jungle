<link href="http://localhost/booking/css/custom.css" rel="stylesheet">

<div id="page-wrapper" class="add_room">
  <div class="container-fluid profile-block-cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"> New Room </h3>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i> Hotel </li>
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
  }?>
  <form  class="profile_tab_cus_block_1" role="form" enctype="multipart/form-data" action="" method="post">
  
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
                <div class="list-group">
					<div class="panel col-md-12">
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Room Type</label>
                        <input class="col-lg-8 form-control " name="room_title" id="room_title">
                      </div>

                      <div class="form-group col-lg-12" style="display: none;">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" >
                        <?php
                        foreach($results as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>


                  
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Room size</label>
                        <input class="col-lg-8 form-control " name="room_size">
                      </div>

                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">No of Beds</label>
                        <select class="col-lg-8 form-control beds" name="room_beds">
						<?php for($x=1;$x<=20;$x++){?>
						<option value="<?php echo $x;?>"><?Php echo $x;?></option>
						<?php }?>
                        </select>
                      </div>

    				<div class="form-group col-lg-6">
                        <label class="col-lg-4">Bed Size(s)</label>
                        <input class="col-lg-8 form-control " name="room_bed_size">
                      </div>
                      
   					 <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Description</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="room_des" id="room_des"></textarea>
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
                <div class="list-group ">
             		<div class="panel">
             			
					<div class="room_image_row hotel_image_row col-lg-12">
					<div class="col-md-12">
                      <div class="form-group col-md-12 hotel_img_title_block ">
					  
                        <label class="col-lg-6">Image</label> 
                         <div class="pull-right col-lg-6">
                          <button type="button" class="btn cus-btn btn-success  pull-right room_image_add"> <i class="fa fa-plus"></i> Add More Images</button>
                      </div>
                         </div>
                         
                         
                         
                         
                        <div class="img_cus_block ">
                        <input class=" " type="file" name="room_image[]" >

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
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Room Facilities</h3>
              </div>
              <div class="panel-body h_facilities_block">
                <div class="list-group">
				<div class="panel col-md-12 ">
                    <div class="container-fluid  hotel_fac">
					
                      <h4>Facilities</h4>
					  
                      <div class="col-lg-12 no_padding_l no_padding_r">
                          <span class=" radio-inline col-md-3">
                          <input type="checkbox"  id="chk83" class="css-checkbox room_facilities" value="1" name="room_city_view" >
                          <label class="css-label" for="chk83"> City view </label></span>
                          
                          <span class="radio-inline col-md-3">
                          <input  type="checkbox" id="chk84" class="css-checkbox room_facilities" value="1" name="room_tel">
                           <label class="css-label" for="chk84">Telephone </label></span>
                           
                          <span class=" radio-inline col-md-3"> 
                          <input id="chk85"  type="checkbox" class="css-checkbox room_facilities" value="1" name="room_sat_channels" >
                          <label class="css-label" for="chk85">Satellite Channels </label></span>
                          <span class=" radio-inline col-md-3"> 
                          <input id="chk86" type="checkbox" class="css-checkbox room_facilities"  value="1" name="room_flat_screen_tv">
                          <label class="css-label" for="chk86">Flat-screen TV </label></span>
                          <span  class=" radio-inline col-md-3"> 
                          <input id="chk87" class="css-checkbox room_facilities"  type="checkbox"  value="1" name="room_safety_deposit_box">
                          <label class="css-label" for="chk87">Safety Deposit Box </label></span>
                          <span  class=" radio-inline col-md-3" name="room_ac">
                          <input type="checkbox" id="chk88" class="css-checkbox room_facilities"  value="1" name="room_ac" >
                          <label class="css-label" for="chk88">Air Conditioning </label></span>
                          <span  class=" radio-inline col-md-3" name="room_iron">
                          <input  id="chk89" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_iron" >
                          <label class="css-label" for="chk89"> Iron</label></span>
                          <span  class=" radio-inline col-md-3"> 
                          <input id="chk90" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_desk" >
                          <label class="css-label" for="chk90">Desk </label></span>
                         <span class=" radio-inline col-md-3"> 
                          <input type="checkbox" id="chk91" class="css-checkbox room_facilities"  value="1" name="room_ironing_facilities" >
                          <label class="css-label" for="chk91">Ironing Facilities</label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk92" class="css-checkbox room_facilities"  type="checkbox"  value="1" name="room_heating">
                          <label class="css-label" for="chk92">Heating</label></span>
                           <span class=" radio-inline col-md-3">
                          <input id="chk93" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_carpeted" >
                         <label class="css-label" for="chk93"> Carpeted</label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk94" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_interconnected_rooms">
                          <label class="css-label" for="chk94"> Interconnected room(s) available </label></span>
                           <span class=" radio-inline col-md-3">
                          <input id="chk95" type="checkbox"  value="1"  class="css-checkbox room_facilities" name="room_private_entrance">
                          <label class="css-label" for="chk95"> Private entrance  </label></span>
                          
                          <span class=" radio-inline col-md-3">
                          <input  id="chk96" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_sofa">
                          <label class="css-label" for="chk96">Sofa </label></span>
                         <span class=" radio-inline col-md-3">
                          <input id="chk97" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_sound_proofing">
                           <label class="css-label" for="chk97"> Soundproofing   </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk98" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_wardrobe_closet">
                           <label class="css-label" for="chk98"> Wardrobe/Closet  </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk99" class="css-checkbox" type="checkbox"  value="1" name="room_hypoallergenic">
                          <label class="css-label" for="chk99">  Hypoallergenic  </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk100" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_shower">
                           <label class="css-label" for="chk100"> Shower  </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk101" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_hair_dryer">
                           <label class="css-label" for="chk101"> Hairdryer </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk102" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_free_toiletries">
                           <label class="css-label" for="chk102"> Free toiletries  </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk103" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_toilet">
                           <label class="css-label" for="chk103"> Toilet </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk104" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_bathroom">
                           <label class="css-label" for="chk104"> Bathroom  </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk105" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_minibar">
                           <label class="css-label" for="chk105"> Minibar </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk106" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_electric_kettle">
                           <label class="css-label" for="chk106"> Electric kettle </label></span>
                         <span class=" radio-inline col-md-3">
                          <input id="chk107" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_wakeup_service">
                           <label class="css-label" for="chk107"> Wake-up service </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk108" class="css-checkbox room_facilities" type="checkbox"  value="1" name="room_towels">
                          <label class="css-label" for="chk108">  Towels </label></span>
                          <span class=" radio-inline col-md-3">
                          <input id="chk109" class="css-checkbox room_facilities" type="checkbox"  value="1"name="room_free_wifi" >
                          <label class="css-label" for="chk109">  Free Wifi </label></span>
                           <span class=" radio-inline col-md-3">
                          <input id="chk110" class="css-checkbox room_facilities" type="checkbox"  value="1" name="breakfast" >
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
      <button type="submit" class="btn cus-btn btn-primary" name="room_sub" id="add_room_submit">Submit</button>
      <button type="reset" class="btn cus-btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

