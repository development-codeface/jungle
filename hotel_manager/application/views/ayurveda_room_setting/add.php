<?php 
$category_name = $this->uri->segment(3); ?>

<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Room Combination </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
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



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading  cus_panel_heading">
                <i class="fa fa-clock-o fa-fw"></i> Rooms
              </div>
              <div class="panel-body  rooms_list_block_table">
                <div class="list-group  tab_main_content_cus">
                  <div class="panel">
                  
                    <form role="form" method="post" id="add_pack">
                    	<div class="cus_border">
                    		<div class="col-lg-12 cus_border2">
                      
                        <input type='hidden' name="room_hotel" id="room_hotel" value="<?php echo $id; ?>">
                      
                       <div class="form-group col-md-6">
                        <label class="col-lg-4">Room</label>
                        <select class="col-lg-8 form-control beds" name="room_attached" id="room_attached">
                        	<?php foreach ($rooms as $tbl_room) {?>
								<option value="<?php echo $tbl_room->id; ?>"><?php echo $tbl_room->room_title; ?></option>
							<?php } ?>
                        </select>
                      </div>
						
						<div class="form-group col-md-6">
                        <label class="col-lg-4">Package</label>
                        <select class="col-lg-8 form-control beds" name="package" id="package">
                        	<?php foreach ($packages as $tbl_package) {?>
								<option value="<?php echo $tbl_package->id; ?>"><?php echo $tbl_package->title; ?></option>
							<?php } ?>
                        </select>
                      </div>


                      <div class="form-group col-md-6">
                        <label class="col-lg-4">Price</label>
                        <input class="col-lg-8 form-control " name="room_price" id="room_price">
                      </div>
                      <!-- <div class="form-group row">
                        <label class="col-lg-4">Offer Price</label>
                        <input class="col-lg-8 form-control " name="room_ofr_price" id="room_ofr_price">
                      </div> -->
					  
                           <div class="form-group col-md-6">
                        <label class="col-lg-6"> Tax Applicable</label>
                        <select class="col-lg-8 form-control" name="tax_applicable" id="tax_applicable">
                          <option value="1">seasonal</option>
                          <option value="0">off seasonal</option>
                        </select>
                      </div>
					  
                     <div class="form-group col-lg-3">
                        <label class="col-lg-12">Allowed Adults</label>
                        <select class="col-lg-12 form-control" name="allowed_adult" id="allowed_adult" onchange="max_allowed();">
                          <?php for($x=1;$x<=20;$x++) { ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
						  <?php } ?>
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-3">
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
                      
                        <div class="form-group col-md-6">
                      <label class="col-lg-6"> Child Age limit(For Rate free)</label>
                      <select class="col-lg-8 form-control" name="child_free_limit" id="child_free_limit">
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
                      
                      <div class="form-group col-md-6">
                        <label class="col-lg-4">Exta Child rate</label>
                        <input class="col-lg-8 form-control " name="room_child_rate" id="room_child_rate">
                      </div>
					  
					   <div class="form-group col-lg-6">
                        <label class="col-lg-12">Number Of Extra Bed </label>
                         <select class="col-lg-12 form-control" name="no_of_bed" id="no_of_bed">
						<?php for($x=0;$x<=20;$x++) {  
						if($x==0){ ?>
						<option value="" ><?php echo $x ?></option>
						<?php
						}else {?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
						  <?php } }?>
                        
                      </select>
                      </div>
					    <div class="form-group col-md-6">
                        <label class="col-lg-4">Extra Bed rate</label>
                        <input class="col-lg-8 form-control " name="room_adult_rate" id="room_adult_rate">
                      </div>
					  
                      <!--<div class="form-group col-md-6">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="valid_from" id="valid_from">
                        </span>
                      </div> 
                      
                      <div class="form-group col-md-6">
                        <label class="col-lg-4">Valid Upto</label>
                        <span id="sandbox-container4">
                        <input class="col-lg-8 form-control " name="validity" id="validity">
                        </span>
                      </div>-->

					  <div class="form-group col-lg-7 add_date">
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
					  
                      <div class="form-group col-lg-6 marg_cus">
                        <label  class="col-lg-4">Conditions</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="conditions" id="conditions"></textarea></div>
                      </div>
                       <div class="form-group col-lg-6 marg_cus">
                        <label  class="col-lg-4">Services offered</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="services" id="services"></textarea></div>
                      </div>
                      <!-- <div class="form-group col-md-6">
                        <label class="col-lg-4"> Allowed Person</label>
                        <select class="col-lg-8 form-control" name="allowed_persons" id="allowed_persons">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div> -->
                      
                      </div>

                      <div class="form-group ">
                      	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="room_submit" id="pack_room_submit" class="btn btn-success" >Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div> </div></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     
              </div>
            </div>
<!-- /.row --> 
