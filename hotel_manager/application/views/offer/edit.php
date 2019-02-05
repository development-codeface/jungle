<div id="page-wrapper" class="edit_offers_block_cus">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Bookingwings Offer </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i>  -->Edit Bookingwings Offer </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
               <i class="fa fa-edit"></i> Edit Bookingwings Offer
              </div>
              <div class="panel-body">
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
				  }?>                   


                    <form role="form" method="post">
                      <div class="form-group col-lg-12" style="display: none;">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" onchange="get_Room(this.value)">
                        <?php foreach($hotel_list as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      
                    
                     <!-- <div class="form-group col-lg-12">
                        <label class="col-lg-4">Rooms</label>
                        <select class="col-lg-8 form-control beds" name="room_id" >
                        	<option value="">--Select--</option>
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value="<?php echo $res_key->id;?>" <?php if($offer -> room_id == $res_key->id) echo "selected"; ?>><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div> -->
                      
                      <div class="form_group_block2_cus_commision">
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Offer Type</label>
                        <input class="col-lg-8 form-control" value="<?php echo $offer -> offer_type ?>" name="offer_type" id="offer_type">
                      </div>
                      
                      
                       <div class="form-group col-lg-6">
                        <label class="col-lg-4">Offer</label>
                        <input class="col-lg-8 form-control" value="<?php echo $offer -> offer ?>" name="offer" id="offer">
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control" value="<?php echo date_format(date_create_from_format('Y-m-d', $offer -> from_date), 'd-m-Y') ?>" name="valid_from" id="valid_from">
                        </span>
                      </div> 
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Valid Upto</label>
                         <span id="sandbox-container4">
                        <input class="col-lg-8 form-control" value="<?php echo date_format(date_create_from_format('Y-m-d', $offer -> to_date), 'd-m-Y') ?>" name="valid_to" id="valid_to">
                        </span>
                      </div>
                      
                      </div>
  <div class="form_group_block3_cus_commision">
                      <div class="form-group col-lg-12">
                        <button type="submit" name="offer_edit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
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

