
<?php $this->load->view('hotel/side_menu');?>


<div id="page-wrapper">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Room </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>hotel">Dashboard</a> </li>
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
  <form role="form" enctype="multipart/form-data" action="" method="post">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Basic</a></li>
        <li><a href="#tabs-2">Images</a></li>
        <li><a href="#tabs-4">Facilities </a></li>
      </ul>
      <div id="tabs-1">
        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                      <div class="form-group row">
                        <label class="col-lg-4">Title</label>
                        <input class="col-lg-8 form-control " name="room_title"  id="room_title" value="<?php echo $result->room_title;?>">
                      </div>
                      <div class="form-group row">
                        <label  class="col-lg-4">Description</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="room_des" id="room_des"><?php echo $result->room_des;?></textarea>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Room size</label>
                        <input class="col-lg-8 form-control " name="room_size" id="room_size" value="<?php echo $result->room_size;?>">
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-4">No of Beds</label>
                        <select class="col-lg-8 form-control beds" name="room_beds" id="room_beds">
                              <option value="1" <?php if($result->room_beds == 1){?> selected="selected"<?php }?>>1</option>
                              <option value="2" <?php if($result->room_beds == 2){?> selected="selected"<?php }?>>2</option>
                              <option value="3" <?php if($result->room_beds == 3){?> selected="selected"<?php }?>>3</option>
                              <option value="4" <?php if($result->room_beds == 4){?> selected="selected"<?php }?>>4</option>
                        </select>
                      </div>

                      <!-- <div class="form-group row">
                        <label class="col-lg-4">Room Price</label>
                        <input class="col-lg-8 form-control " name="room_price" value="<?php echo $result->room_price;?>">
                      </div>


                      <div class="form-group row">
                        <label class="col-lg-4">Room Offer Price</label>
                        <input class="col-lg-8 form-control " name="room_offer_price" value="<?php echo $result->room_offer_price;?>">
                      </div> -->

                      <div class="form-group row">
                        <label class="col-lg-4">Bed Size(s)</label> 
                        <input class="col-lg-8 form-control " name="room_bed_size" id="room_bed_size" value="<?php echo $result->room_bed_size;?>">
                      </div>

                   
                      <div class="form-group row">
                        <label  class="col-lg-4">Tax</label>
                        <input class="col-lg-4 form-control " name="room_tax" id="room_tax" value="<?php echo $result->room_tax;?>">
                      </div>
                      <div class="form-group row">
                        <label  class="col-lg-4">Tax Description</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="room_tax_des" id="room_tax_des"><?php echo $result->room_tax_des;?></textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-2">
        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Room Images</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                  <div class="room_image_row">

                    <?php
				$image_count=count($result_images);
                if($image_count==0)
                      {?>
                        <!-- <div class="form-group row">
                          <label class="col-lg-3">Image <?php echo $i; ?></label>
                          <input class="col-lg-5 form-control " type="file" name="room_image[]">
                          <img src="<?php echo base_url('../'.$image->image_url);?>" width="100" />
                          <input type="hidden" name="img_url" value="<?php echo base_url('../'.$image->image_url);?>">
                          <div class="col-lg-2 text-right">
                          <?php if($i==1){?>
                            <button type="button" class="btn btn-success room_image_add">Add</button>
                            <?php } else {?>
                              <button type="button" class="btn btn-success room_image_remove" onClick="remove_room_image(this)"  >Remove</button>
                              <?php }?>
                          </div>
                        </div> -->
                        
                        <div class="form-group row">
                        <label class="col-lg-2">Image</label>
                        <input class="col-lg-6 form-control " type="file" name="room_image[]" id="room_image">
                     <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-success room_image_add">Add</button>
                        </div>
                      </div>
                    <?php }
				   else { ?>
				   	<input type="hidden" name="img_count" id="img_count" value="<?php echo $image_count;?>" />
				   	<div class="form-group row">
                        <label class="col-lg-2">Image</label>
                         <label class="col-lg-4"></label>
                        <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-success room_image_add">Add</button>
                        </div>
                      </div>                      <?php foreach($result_images as $images): ?>
                      
                      <a href="<?php echo base_url() . 'roomtype/image_edit/' . $images->room_id . '/' . $images->id;?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=600,height=450,screenX=220,screenY=160,resizable,scrollbars');return false;" title="Zoom">	
	<img src="<?php echo base_url(). '../'.$images->thumb;?>" width='120' height='100' /> </a>
                      	
                      	<input type="file" id="fileLoader" name="room_image[]" title="Load File" style = "display:none;" />
						<?php endforeach;  }
                  ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-4">
        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Room Facilities</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="form-group row">
                      <label class="col-lg-3">Facilities</label>
                      <div class="col-lg-9">
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_city_view" <?php echo ($result_facilities->city_view==1 ? 'checked' : '');?> class="room_facilities">
                          City view </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_tel" <?php echo ($result_facilities->telephone==1 ? 'checked' : '');?> class="room_facilities">
                          Telephone </label>
                          <label class="radio-inline"> 
                          <input type="checkbox"  value="1" name="room_sat_channels" <?php echo ($result_facilities->satellite_channels==1 ? 'checked' : '');?> class="room_facilities">
                          Satellite Channels </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_flat_screen_tv" <?php echo ($result_facilities->flat_screen_tv==1 ? 'checked' : '');?> class="room_facilities">
                          Flat-screen TV </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_safety_deposit_box" <?php echo ($result_facilities->safety_deposit_box==1 ? 'checked' : '');?> class="room_facilities">
                          Safety Deposit Box </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_ac" <?php echo ($result_facilities->air_conditioning==1 ? 'checked' : '');?> class="room_facilities">
                          Air Conditioning </label>
                          <label class="radio-inline"  >
                          <input type="checkbox"  value="1" name="room_iron" <?php echo ($result_facilities->iron==1 ? 'checked' : '');?> class="room_facilities">
                          Iron </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_desk" <?php echo ($result_facilities->desk==1 ? 'checked' : '');?> class="room_facilities">
                          Desk </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_ironing_facilities" <?php echo ($result_facilities->iron_facilities==1 ? 'checked' : '');?> class="room_facilities">
                          Ironing Facilities</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_heating" <?php echo ($result_facilities->heating==1 ? 'checked' : '');?> class="room_facilities">
                          Heating</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_carpeted" <?php echo ($result_facilities->carpeted==1 ? 'checked' : '');?> class="room_facilities">
                          Carpeted</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_interconnected_rooms" <?php echo ($result_facilities->interconnected_rooms==1 ? 'checked' : '');?> class="room_facilities">
                          Interconnected room(s) available </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_private_entrance" <?php echo ($result_facilities->private_entrance==1 ? 'checked' : '');?> class="room_facilities">
                          Private entrance </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_sofa" <?php echo ($result_facilities->sofa==1 ? 'checked' : '');?> class="room_facilities">
                          Sofa</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_sound_proofing" <?php echo ($result_facilities->soundproofing==1 ? 'checked' : '');?> class="room_facilities">
                          Soundproofing  </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_wardrobe_closet" <?php echo ($result_facilities->wardrobe_closet==1 ? 'checked' : '');?> class="room_facilities">
                          Wardrobe/Closet </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_hypoallergenic" <?php echo ($result_facilities->hypoallergenic==1 ? 'checked' : '');?> class="room_facilities">
                          Hypoallergenic </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_shower" <?php echo ($result_facilities->shower==1 ? 'checked' : '');?> class="room_facilities">
                          Shower </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_hair_dryer" <?php echo ($result_facilities->hairdryer==1 ? 'checked' : '');?> class="room_facilities">
                          Hairdryer</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_free_toiletries" <?php echo ($result_facilities->free_toiletries==1 ? 'checked' : '');?> class="room_facilities">
                          Free toiletries </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_toilet" <?php echo ($result_facilities->toilet==1 ? 'checked' : '');?> class="room_facilities">
                          Toilet</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_bathroom" <?php echo ($result_facilities->bathroom==1 ? 'checked' : '');?> class="room_facilities">
                          Bathroom </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_minibar" <?php echo ($result_facilities->minibar==1 ? 'checked' : '');?> class="room_facilities">
                          Minibar</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_electric_kettle" <?php echo ($result_facilities->electric_kettle==1 ? 'checked' : '');?> class="room_facilities">
                          Electric kettle</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_wakeup_service" <?php echo ($result_facilities->wakeup_service==1 ? 'checked' : '');?> class="room_facilities">
                          Wake-up service</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_towels" <?php echo ($result_facilities->towels==1 ? 'checked' : '');?> class="room_facilities">
                          Towels</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1"name="room_free_wifi" <?php echo ($result_facilities->free_wifi==1 ? 'checked' : '');?> class="room_facilities">
                          Free Wifi</label>
                      </div>
                    </div>                                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success" name="room_sub_edt" id="room_sub_edt">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

