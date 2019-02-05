
<?php $this->load->view('hotel/side_menu');?>

<div id="page-wrapper">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Room </h1>
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
  }?>
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
                        <input class="col-lg-8 form-control " name="room_title" id="room_title">
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" id="room_hotel">
                        <?php foreach($results as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>


                      <div class="form-group row">
                        <label  class="col-lg-4">Description</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="room_des" id="room_des"></textarea>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Room size</label>
                        <input class="col-lg-8 form-control " name="room_size" id="room_size">
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-4">No of Beds</label>
                        <select class="col-lg-8 form-control beds" name="room_beds" id="room_beds">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                        </select>
                      </div>

                      <!-- <div class="form-group row">
                        <label class="col-lg-4">Room Price</label>
                        <input class="col-lg-8 form-control " name="room_price">
                      </div>


                      <div class="form-group row">
                        <label class="col-lg-4">Room Offer Price</label>
                        <input class="col-lg-8 form-control " name="room_offer_price">
                      </div> -->

                      <div class="form-group row">
                        <label class="col-lg-4">Bed Size(s)</label>
                        <input class="col-lg-8 form-control " name="room_bed_size" id="room_bed_size">
                      </div>

                   
                      <div class="form-group row">
                        <label  class="col-lg-4">Tax</label>
                        <input class="col-lg-4 form-control " name="room_tax" id="room_tax">
                      </div>
                      <div class="form-group row">
                        <label  class="col-lg-4">Tax Description</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="room_tax_des" id="room_tax_des"></textarea>
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
                      <div class="form-group row">
                        <label class="col-lg-3">Image</label>
                        <input class="col-lg-5 form-control " type="file" name="room_image[]" id="room_image">
                        <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-success room_image_add">Add</button>
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
                          <input type="checkbox"  value="1" name="room_city_view" class="room_facilities">
                          City view </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_tel" class="room_facilities">
                          Telephone </label>
                          <label class="radio-inline"> 
                          <input type="checkbox"  value="1" name="room_sat_channels" class="room_facilities">
                          Satellite Channels </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_flat_screen_tv" class="room_facilities">
                          Flat-screen TV </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_safety_deposit_box" class="room_facilities">
                          Safety Deposit Box </label>
                          <label class="radio-inline" name="room_ac" class="room_facilities">
                          <input type="checkbox"  value="1" >
                          Air Conditioning </label>
                          <label class="radio-inline" name="room_iron" class="room_facilities">
                          <input type="checkbox"  value="1" >
                          Iron </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_desk" class="room_facilities">
                          Desk </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_ironing_facilities" class="room_facilities">
                          Ironing Facilities</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_heating" class="room_facilities">
                          Heating</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_carpeted" class="room_facilities">
                          Carpeted</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_interconnected_rooms" class="room_facilities">
                          Interconnected room(s) available </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_private_entrance" class="room_facilities">
                          Private entrance </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_sofa" class="room_facilities">
                          Sofa</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_sound_proofing" class="room_facilities">
                          Soundproofing  </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_wardrobe_closet" class="room_facilities">
                          Wardrobe/Closet </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_hypoallergenic" class="room_facilities">
                          Hypoallergenic </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_shower" class="room_facilities">
                          Shower </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_hair_dryer" class="room_facilities">
                          Hairdryer</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_free_toiletries" class="room_facilities">
                          Free toiletries </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_toilet" class="room_facilities">
                          Toilet</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_bathroom" class="room_facilities">
                          Bathroom </label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_minibar" class="room_facilities">
                          Minibar</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_electric_kettle" class="room_facilities">
                          Electric kettle</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_wakeup_service" class="room_facilities">
                          Wake-up service</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1" name="room_towels" class="room_facilities">
                          Towels</label>
                          <label class="radio-inline">
                          <input type="checkbox"  value="1"name="room_free_wifi" class="room_facilities">
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
      <button type="submit" class="btn btn-success" name="room_sub" id="add_room_submit">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

