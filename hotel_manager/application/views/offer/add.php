<div id="page-wrapper">
  <div class="container-fluid rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Bookingwings Offer </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li> <a href="<?php echo base_url();?>offers">Manage</a></li>
          <li class="active"> <!-- <i class="fa fa-edit"></i> --> Add Bookingwings Offer </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading cus_panel_heading">
                <i class="fa fa-clock-o fa-fw"></i> Add Bookingwings Offer
                
                
                
                
                <div class="pull-right">
                            	<a class="btn btn-success" href="<?php echo base_url('offers');?>"><span><i class="fa fa-plus"></i></span> Manage Bookingwings Offer</a>
                           
                              
                            </div>
                
                
                
                
                
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
				  }?>                   


                    <form class="profile_tab_cus_block_1" id="add_offer" role="form" method="post">
                    	 <div class="cus_border">
                    	 	 <div class="col-lg-12 cus_border2">
                      <div class="form-group col-lg-12" style="display: none;">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" onchange="get_Room(this.value)">
                        <?php foreach($hotel_list as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      
                    
                     <!-- <div class="form-group col-lg-6">
                        <label class="col-lg-4">Rooms</label>
                        <select class="col-lg-8 form-control beds" name="room_id" >
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value="<?php echo $res_key->id;?>"><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                      </div> -->
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Offer Type</label>
                        <input class="col-lg-8 form-control " name="offer_type" id="offer_type">
                      </div>
                      
                       <div class="form-group col-lg-6">
                        <label class="col-lg-4">Offer</label>
                        <input class="col-lg-8 form-control " name="offer" id="offer">
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="valid_from" id="valid_from">
                        </span>
                      </div> 
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Valid Upto</label>
                         <span id="sandbox-container4">
                        <input class="col-lg-8 form-control " name="valid_to" id="valid_to">
                        </span>
                      </div>
                      
                     
 						</div>
 						</div>
                      <div class="form-group ">
                      	  <div class="form-group form-footer cus_border3">
                        <button type="submit" name="offer_sub" class="btn cus-btn btn-primary">Submit</button>
                        <button type="reset" class="btn cus-btn btn-default">Reset</button>
                      </div> </div>
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

