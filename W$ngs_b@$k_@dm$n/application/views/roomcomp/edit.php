<?php $this->load->view('hotel/side_menu');?>


<div id="page-wrapper">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Room Combination </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i> Room Combination </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              
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


        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                 
                    <form role="form" method="post">
                      <div class="form-group row">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" onchange="get_Room(this.value)">
                        <?php foreach($all_hotels as $res_key){ ?>
                              <option value=<?php echo $res_key->id; if($result->hotel_id == $res_key->id){?> selected="selected"<?php }?>><?php echo $res_key->title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div>
                      
                        
                        <div id="rooms_show">


                      <div class="form-group row">
                        <label class="col-lg-4">Rooms</label>
                        <select class="col-lg-8 form-control beds" name="room_id" >
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value=<?php echo $res_key->id; if($result->room_id == $res_key->id){?> selected="selected"<?php }?>><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div>
                        

                       </div>

                      <div class="form-group row">
                        <label class="col-lg-4">No: of Rooms</label>
                        <select class="col-lg-8 form-control beds" name="num_rooms" >
                        <?php foreach($allRooms as $res_key){ ?> <?php ?>
                        <?php } ?>
                              <option value=<?php echo "1"; if($result->num_rooms == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                              <option value=<?php echo "2"; if($result->num_rooms == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                              <option value=<?php echo "3"; if($result->num_rooms == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                              <option value=<?php echo "4"; if($result->num_rooms == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>
                              <option value=<?php echo "5"; if($result->num_rooms == '5'){?> selected="selected"<?php }?>><?php echo "5"; ?></option>
                              <option value=<?php echo "6"; if($result->num_rooms == '6'){?> selected="selected"<?php }?>><?php echo "6"; ?></option>
                             
                        </select>
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-4">Price</label>
                        <input class="col-lg-8 form-control " name="room_price" id="room_price" value="<?php echo $result->price;?>">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Offer Price</label> 
                        <input class="col-lg-8 form-control " name="room_ofr_price" id="room_ofr_price" value="<?php echo $result->offer_price;?>">
                      </div>
                      
                        <div class="form-group row">
                        <label class="col-lg-4"> Child Age limit(For Rate free)</label>
                        <select class="col-lg-8 form-control" name="child_free_limit" >
                        <?php foreach($allRooms as $res_key){ ?> <?php ?>
                        <?php } ?>
                              <option value=<?php echo "1"; if($result->child_free_limit == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                              <option value=<?php echo "2"; if($result->child_free_limit == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                              <option value=<?php echo "3"; if($result->child_free_limit == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                              <option value=<?php echo "4"; if($result->child_free_limit == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>
                              <option value=<?php echo "5"; if($result->child_free_limit == '5'){?> selected="selected"<?php }?>><?php echo "5"; ?></option>
                              <option value=<?php echo "6"; if($result->child_free_limit == '6'){?> selected="selected"<?php }?>><?php echo "6"; ?></option>
                              <option value=<?php echo "7"; if($result->child_free_limit == '7'){?> selected="selected"<?php }?>><?php echo "7"; ?></option>
                              <option value=<?php echo "8"; if($result->child_free_limit == '8'){?> selected="selected"<?php }?>><?php echo "8"; ?></option>
                              <option value=<?php echo "9"; if($result->child_free_limit == '9'){?> selected="selected"<?php }?>><?php echo "9"; ?></option>
                              <option value=<?php echo "10"; if($result->child_free_limit == '10'){?> selected="selected"<?php }?>><?php echo "10"; ?></option>
                              <option value=<?php echo "11"; if($result->child_free_limit == '11'){?> selected="selected"<?php }?>><?php echo "11"; ?></option>
                              <option value=<?php echo "12"; if($result->child_free_limit == '12'){?> selected="selected"<?php }?>><?php echo "12"; ?></option> 
                              <option value=<?php echo "13"; if($result->child_free_limit == '13'){?> selected="selected"<?php }?>><?php echo "13"; ?></option>                           
                        </select>
                      </div>
                      
                      
                      <div class="form-group row">
                        <label class="col-lg-4">Child rate</label>
                        <input class="col-lg-8 form-control " name="room_child_rate" id="room_child_rate" value="<?php echo $result->room_child_rate;?>">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Adult Rate</label>
                        <input class="col-lg-8 form-control " name="room_adult_rate" id="room_adult_rate" value="<?php echo $result->room_adult_rate;?>">
                        </span>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="valid_from" id="valid_from" value="<?php echo $result->valid_from;?>">
                        </span>
                      </div> 
                      
                      
                      <div class="form-group row">
                        <label class="col-lg-4">Valid Upto</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="validity" id="validity" value="<?php echo $result->valid_upto;?>">
                        </span>
                      </div>                     
                      <div class="form-group row">
                        <label  class="col-lg-4">Conditions</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="conditions" id="conditions"><?php echo $result->conditions;?></textarea>
                      </div>
                     <div class="form-group row">
                        <label class="col-lg-4"> Max Allowed Person</label>
                        <select class="col-lg-8 form-control" name="allowed_persons" id="allowed_persons">
                        	<option value=<?php echo "1"; if($result->allowed_persons == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                        	<option value=<?php echo "2"; if($result->allowed_persons == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                        	<option value=<?php echo "3"; if($result->allowed_persons == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                        	<option value=<?php echo "4"; if($result->allowed_persons == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>
                        	<option value=<?php echo "5"; if($result->allowed_persons == '5'){?> selected="selected"<?php }?>><?php echo "5"; ?></option>
                        </select>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-lg-4"> Tax Applicable</label>
                        <select class="col-lg-8 form-control" name="tax_applicable" id="tax_applicable" value="<?php echo $result->tax_applicable;?>">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <button type="submit" name="room_settings_submit" class="btn btn-success" id="edit_room_comb_submit">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                    </form>
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
      </div>
    </div>
  </div>
</div>
<!-- /.row --> 


