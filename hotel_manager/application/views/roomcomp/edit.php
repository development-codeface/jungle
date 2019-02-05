<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Room Combination </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li> <!-- <i class="fa fa-table"></i> --> <a href="<?php echo base_url();?>roomcomp"> Room Settings</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i> --> Edit</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading cus_panel_heading">
                <i class="fa fa-list"></i> Edit Room
              </div>
              <div class="panel-body tab_main_content_cus">
                <div class="list-group">
                
                                  
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
				  } else if($this->session->flashdata('error'))
				  {?>     
				    <div class="row">
				                    <div class="col-lg-12">
				                        <div class="alert alert-danger alert-dismissable">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <?php echo $this->session->flashdata('error');?>
				                        </div>
				                    </div>
				                </div><?php } ?> 

                    <form role="form" method="post" >
                    	
                    	<div class="cus_border">
                    		<div class="col-lg-12 cus_border2">
                    			
                      <div class="form-group col-lg-12" style="display: none;">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" >
                        <?php foreach($all_hotels as $res_key){ ?>
                              <option value=<?php echo $res_key->id; if($result->hotel_id == $res_key->id){?> selected="selected"<?php }?>><?php echo $res_key->title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div>
                      
                    
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Rooms</label>
                        <select class="col-lg-12 form-control beds" name="room_id" id="room_id">
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value=<?php echo $res_key->id; if($result->room_id == $res_key->id){?> selected="selected"<?php }?>><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                        <?php echo form_error('room_id');?>
                      </div>
                      
                      <!-- <div class="form-group col-lg-12">
                        <label class="col-lg-4">No: of Rooms</label>
                        <select class="col-lg-8 form-control beds" name="num_rooms" >
                        <?php foreach($allRooms as $res_key){ ?>  
                        <?php } ?>
                              <option value=<?php echo "1"; if($result->num_rooms == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                              <option value=<?php echo "2"; if($result->num_rooms == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                              <option value=<?php echo "3"; if($result->num_rooms == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                              <option value=<?php echo "4"; if($result->num_rooms == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>
                              <option value=<?php echo "5"; if($result->num_rooms == '5'){?> selected="selected"<?php }?>><?php echo "5"; ?></option>
                              <option value=<?php echo "6"; if($result->num_rooms == '6'){?> selected="selected"<?php }?>><?php echo "6"; ?></option>
                           
                        </select>
                      </div> -->

                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Price</label>
                        <input class="col-lg-12 form-control " name="room_price" id="room_price" value="<?php echo $result->price;?>" onchange="max_allowed();">
                        <?php echo form_error('room_price');?>
                      </div>
                      <!-- <div class="form-group col-lg-12">
                        <label class="col-lg-4">Offer Price</label> 
                        <input class="col-lg-8 form-control " name="room_ofr_price" id="room_ofr_price" value="<?php echo $result->offer_price;?>">
                      </div> -->
                        <div class="form-group col-lg-3">
                        <label class="col-lg-12">Allowed Adults</label>
                        <select class="col-lg-12 form-control" name="allowed_adult" id="allowed_adult" onchange="max_allowed();">
							<?php for($x=1;$x<=20;$x++) { ?>
                          <option value="<?php echo $x ?>"<?php if($result->normal_allowed_adults == $x){ echo "selected"; }?>><?php echo $x ?></option>
						  <?php } ?>
                        	<!--<option value=<?php echo "1"; if($result->normal_allowed_adults == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                        	<option value=<?php echo "2"; if($result->normal_allowed_adults == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                        	<option value=<?php echo "3"; if($result->normal_allowed_adults == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                        	<option value=<?php echo "4"; if($result->normal_allowed_adults == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>-->
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Allowed Kids</label>
                        <select class="col-lg-12 form-control" name="allowed_kid" id="allowed_kid" onchange="max_allowed();">
						<?php for($x=0;$x<=20;$x++) { ?>
                          <option value="<?php echo $x ?>"<?php if($result->normal_allowed_kids == $x){ echo "selected"; }?>><?php echo $x ?></option>
						  <?php } ?>
						<!--<option value=<?php echo "0"; if($result->normal_allowed_kids == '0'){?> selected="selected"<?php }?>><?php echo "0"; ?></option>
                        	<option value=<?php echo "1"; if($result->normal_allowed_kids == '1'){?> selected="selected"<?php }?>><?php echo "1"; ?></option>
                        	<option value=<?php echo "2"; if($result->normal_allowed_kids == '2'){?> selected="selected"<?php }?>><?php echo "2"; ?></option>
                        	<option value=<?php echo "3"; if($result->normal_allowed_kids == '3'){?> selected="selected"<?php }?>><?php echo "3"; ?></option>
                        	<option value=<?php echo "4"; if($result->normal_allowed_kids == '4'){?> selected="selected"<?php }?>><?php echo "4"; ?></option>-->
                        </select>
                      </div>
                                       
                       <div class="form-group col-lg-6">
                        <label class="col-lg-12"> Max. Allowed Persons</label>
                        <input class="col-lg-12 form-control " name="allowed_persons" id="allowed_persons" value="<?php echo $result->allowed_persons;?>" readonly>
                      </div>
                      
                    
                      
                        <div class="form-group col-lg-6">
                        <label class="col-lg-12"> Child Age Limit (For rate free)</label>
                        <select class="col-lg-12 form-control" name="child_free_limit" >
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
					  
					    <div class="form-group col-lg-6">
                        <label class="col-lg-12">Extra Child rate</label>
                        <input class="col-lg-12 form-control " name="room_child_rate" id="room_child_rate" value="<?php echo $result->room_child_rate;?>">
                      </div>
                     
					   <div class="form-group col-lg-6">
                        <label class="col-lg-12">Number Of Extra Bed </label>
                         <select class="col-lg-12 form-control" name="no_of_bed" id="no_of_bed">
                            
						 <?php for($x=0;$x<=20;$x++) { 
						 
						 if($x==0){ ?>
						<option value="" <?php if($result->no_of_bed == 0){ echo "selected"; }?>><?php echo $x ?></option>
						<?php
						}else {?>
                          <option value="<?php echo $x ?>"<?php if($result->no_of_bed == $x){ echo "selected"; }?>><?php echo $x ?></option>
						  <?php } }?>
						  <!--<option value="" <?php if($result->no_of_bed == '0'){?> selected="selected"<?php }?>>0</option>
                        <option value="1" <?php if($result->no_of_bed == '1'){?> selected="selected"<?php }?>>1</option>
                        <option value="2" <?php if($result->no_of_bed == '2'){?> selected="selected"<?php }?>>2</option>
                        <option value="3" <?php if($result->no_of_bed == '3'){?> selected="selected"<?php }?>>3</option>
                        <option value="4" <?php if($result->no_of_bed == '4'){?> selected="selected"<?php }?>>4</option>-->
                        
                      </select>
                      </div>
					  
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Extra Bed Rate</label>
                        <input class="col-lg-12 form-control " name="room_adult_rate" id="room_adult_rate" value="<?php echo $result->room_adult_rate;?>">
                        </span>
                      </div>
                          
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12"> Tax Applicable</label>
                        <select class="col-lg-12 form-control" name="tax_applicable" id="tax_applicable" value="<?php echo $result->tax_applicable;?>">
                          <option value="1" <?php if($result->tax_applicable == '1'){?> selected="selected"<?php }?>>Seasonal</option>
                          <option value="0" <?php if($result->tax_applicable == '0'){?> selected="selected"<?php }?>>Off seasonal</option>

                        </select>
                      </div> 
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-12 form-control " name="valid_from" id="valid_from" value="<?php echo date_format(date_create_from_format('Y-m-d', $result->valid_from), 'd-m-Y');?>">
                        </span>
                        <?php echo form_error('valid_from');?>
                      </div> 
                      
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Valid Upto</label>
                        <span id="sandbox-container4">
                        <input class="col-lg-12 form-control " name="validity" id="validity" value="<?php echo date_format(date_create_from_format('Y-m-d', $result->valid_upto), 'd-m-Y');?>">
                        </span>
                        <?php echo form_error('validity');?>
                      </div>
                
                        <div class="form-group col-lg-12 marg_cus">
                        <label  class="col-lg-12">Cancellation Policy</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="conditions" id="conditions"><?php echo $result->conditions;?></textarea>
                        </div>
                      </div>
                      
                      <!---<div class="form-group col-lg-6 marg_cus">
                        <label  class="col-lg-12">Services Offered</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="services" id="services"><?php echo $result->services;?></textarea>
                        </div>
                      </div>--->
                      </div>
                      </div>

                      <div class="form-group ">
                      	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="room_settings_submit" id="edit_room_comb_submit" class="btn btn-primary cus-btn">Submit</button>
                        <button type="reset" class="btn btn-p cus-btn">Reset</button>
                      </div>
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
<!-- /.row --> 


