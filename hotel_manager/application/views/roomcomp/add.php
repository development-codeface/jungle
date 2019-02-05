<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Room Combination </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i><a href="<?php echo base_url();?>dashboard"> Dashboard</a></li>
          <li><!-- <i class="fa fa-edit"></i> --><a href="<?php echo base_url();?>roomcomp"> Room Settings</a></li>
          <li class="active"><!-- <i class="fa fa-edit"></i> -->Add</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading cus_panel_heading">
               <i class="fa fa-list"></i> New Room
              </div>
              <div class="panel-body  tab_main_content_cus">
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


                    <form role="form" method="post">
                    	<div class="cus_border">
                    		<div class="col-lg-12 cus_border2">
                    	
                      <div class="form-group col-lg-12" style="display: none;">
                        <label class="col-lg-12">Hotel</label>
                        <select class="col-lg-12 form-control beds" name="room_hotel" onchange="get_Room(this.value)">
                        <?php foreach($hotel_list as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      
                    
                     <div class="form-group col-lg-6">
                        <label class="col-lg-12">Rooms</label>
                        <select class="col-lg-12 form-control beds" name="room_id" id="room_id">
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value="<?php echo $res_key->id;?>"><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div>

                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Price</label>
                        <input class="col-lg-12 form-control " name="room_price" id="room_price" value="<?php echo set_value('room_price'); ?>" onkeypress="return onlyNumbers(event)">
                        <?php echo form_error('room_price');?>
                      </div>
                      <!-- <div class="form-group col-lg-12">
                        <label class="col-lg-4">Offer Price</label>
                        <input class="col-lg-8 form-control " name="room_ofr_price" id="room_ofr_price">
                      </div> -->
                    
                         <div class="form-group col-lg-6">
                        <label class="col-lg-12">Allowed Adults</label>
                        <select class="col-lg-12 form-control" name="allowed_adult" id="allowed_adult" onchange="max_allowed();">
						<?php for($x=1;$x<=20;$x++) { ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
						  <?php } ?>
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Allowed Kids</label>
                        <select class="col-lg-12 form-control" name="allowed_kid" id="allowed_kid" onchange="max_allowed();">
						<?php for($x=0;$x<=20;$x++) { ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
						  <?php } ?>
                        </select>
                      </div>
                    
                       <div class="form-group col-lg-6">
                        <label class="col-lg-12"> Max. Allowed Persons</label>
                        <input class="col-lg-12 form-control " name="allowed_persons" id="allowed_persons" readonly value="1">
                      </div> 
                        <div class="form-group col-lg-6">
                      <label class="col-lg-12"> Child Age Limit (For rate free)</label>
                      <select class="col-lg-12 form-control" name="child_free_limit" id="child_free_limit">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        
                      </select>
                    </div>
					
					
					<div class="form-group col-lg-6">
                        <label class="col-lg-12">Extra Child Rate</label>
                        <input class="col-lg-12 form-control " name="room_child_rate" id="room_child_rate">
                      </div>
                    
					 <div class="form-group col-lg-6">
                        <label class="col-lg-12">Number Of Extra Bed </label>
                         <select class="col-lg-12 form-control" name="no_of_bed" id="no_of_bed">
						<?php for($x=0;$x<=20;$x++) { 
						if($x==0){ ?>
						<option value=""><?php echo $x ?></option>
						<?php
						}else {?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
						  <?php } } ?>
                        
                      </select>
                      </div>
					  
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Extra Bed Rate</label>
                        <input class="col-lg-12 form-control " name="room_adult_rate" id="room_adult_rate">
                      </div>
                         
						
					   
                      
					    <div class="form-group col-lg-6">
                        <label class="col-lg-12"> Tax Applicable</label>
                        <select class="col-lg-6 form-control" name="tax_applicable" id="tax_applicable">
                          <option value="1">Seasonal</option>
                          <option value="0">Off seasonal</option>
                        </select>
                      </div>  
                        
                      <div class="form-group col-lg-6 add_date">
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-12 form-control " name="validity_from[]" id="validity_from">
                        </span>
                      </div>   
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Valid Upto</label>
                         <span id="sandbox-container4">
                        <input class="col-lg-12 form-control " name="validity[]" id="validity">
                        </span>
                      </div>
					  </div>
					  
					  <div class="form-group col-lg-3">
					  <button type="button" class="btn btn-xs btn-success add_more">Add More</button>
                      </div>					  
                  
                        <div class="form-group col-lg-12 marg_cus">
                        <label  class="col-lg-12">Cancellation Policy</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea class="ckeditor" rows="3" name="conditions" id="conditions"></textarea>
                        </div>
                      </div>
                      
                     </div>
                     </div>

                      <div class="form-group ">
                      	 	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="room_submit" class="btn btn-primary cus-btn" id="add_room_comb_submit">Submit</button>
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

