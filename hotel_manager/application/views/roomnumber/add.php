

<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Add Room Number </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i>  -->Room Combination </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
            
                                  
                           
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> New Rooms
                
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
				  if(!empty($validation))
				  {?>
				  	<div class="row">
				                    <div class="col-lg-12">
				                        <div class="alert alert-danger alert-dismissable">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <?php  print_r($validation); ?>
				                        </div>
				                    </div>
				                </div>
				 <?php
				  }
				 
				  ?>                   


                    <form role="form" method="post" id="add_room">
                      <div class="form-group col-lg-10" style="display: none;">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" > 
                        <?php foreach($hotel_list as $res_key){ ?>
                              <option value=<?php echo $res_key->id; ?>><?php echo $res_key->title; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      
                    
                       <div class="form-group col-lg-10">
                        <label class="col-lg-4">Rooms</label>
                        <select class="col-lg-8 form-control beds" name="room_id" onchange="get_Room_number(this.value)">
                        	<option value="">--Select--</option>
                        <?php foreach($allRooms as $res_key){ ?>
                              <option value="<?php echo $res_key->id;?>"><?php echo $res_key->room_title; ?></option>
                              <?php ?>
                        <?php } ?>
                        </select>
                        <label class="err"><?php echo form_error('room_id');?></label>
                      </div>

                     
                     
                    
                      
                        <div class="form-group col-lg-10">
                        <label class="col-lg-4"> No: of Rooms</label>
                        
                         <input class="col-lg-8 form-control " name="num_rooms" id="num_rooms" onkeypress="return onlyNumbers(event)">
                         
                          <input class="col-lg-8 form-control " name="hid_num_rooms" id="hid_num_rooms" type="hidden" onkeypress="return onlyNumbers(event)" value="0">
                    
                      <label class="err"><?php echo form_error('num_rooms');?></label>
                      </div>
                      
                         <div class="col-lg-12">
                          <button type="button" class="btn btn-default  room_number_add">Add </button>
                          
                      </div>
					  <div class="col-md-12">
					  		                   <div class="room_block">
							                 	
							                     <br/>
							                      
							                      <div class="form-group row room_number">
							                      						                    						                      	    	
							                      	   
							                      	    
							                      </div>
							                      
							              
							                     
							                 </div>       </div>
                     
                                            
                    

                      <div class="form-group col-lg-12">
                      
                        <button type="submit" name="room_submit" class="btn btn-success" id="">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
          
          
          
          <div id="rooms_number_show">  </div>
          
         
          
          
          
          
          
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

