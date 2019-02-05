<?php $this->load->view('packages/side_menu');?>
  
  
<div id="page-wrapper" class="add_room wrapper_admin_cus_block">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Package </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>packages">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i> Package </li>
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
  }if($this->session->flashdata('error'))
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
                
  <form role="form" enctype="multipart/form-data" action="" method="post" class="cus_admin_form" >
  	
  
      
   <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Package Details</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Itinerary Details</a></li>
        <li><a data-toggle="tab" href="#tabs-4">Hotel Charges</a></li>
         <li><a data-toggle="tab" href="#tabs-5">Available Vehicles</a></li>
	</ul>
		
	<br>
	
  
    <div  class="tab-content">

      <div id="tabs-1" class="tab-pane fade in active">
        <div class="row">
          <div class="col-lg-12 ">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Packages</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                  	 <div class="col-lg-12 r_padding">
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Title</label>
                        <input class="col-lg-12 form-control " name="title" id="title" placeholder="Incredible Kerala">
                        <label class="err"><?php echo form_error('title');?></label>
                       <p class="space_line_cus"></p>
                        <label class="col-lg-12">Nights</label>
	                         <input type="text" name="nights" class="col-lg-12 form-control" onkeypress="return onlyNumbers(event)"  placeholder="Numbers only" />
                           <label class="err"><?php echo form_error('duration');?></label>
                           
                            <p class="space_line_cus"></p>
                                <label class="col-lg-12">Days</label>
	                        <input type="text" name="days" class="col-lg-12 form-control" onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>
                           <label class="err"><?php echo form_error('duration');?></label>
                      </div>
                      
                      
                      <div class="form-group col-lg-6" style="">
                        <label  class="col-lg-12">Description</label>
                        
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        	<textarea  class="ckeditor" rows="3" name="description" id="description" placeholder='Tour Package to Kochi (Cochin), Munnar, Thekkady, Alappuzha (Alleppey)'></textarea>
                        </div>
                        
                        <label class="err"><?php echo form_error('description');?></label>
                        
                      </div>
                     
                      
                </div>
                      
             

 					 <div class="form-group col-lg-12 r_padding">

                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Inclusion details</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                         <textarea  class="ckeditor " rows="3" name="inclusion" id="inclusion"></textarea>
                         </div>
                          <label class="err"><?php echo form_error('inclusion');?></label>
                      </div>
                       

                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Exclusion details</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                         <textarea  class="ckeditor" rows="3" name="exclusion" id="exclusion"></textarea>
                         </div>
                           <label class="err"><?php echo form_error('exclusion');?></label>
                      </div>
                     
</div>
                    

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-2" class="tab-pane fade in">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Package Images and Itinerary Details</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                  <div class="room_image_row">
                      <div class="form-group col-lg-12  img_block_tab_cus">
                        <label class="col-lg-2">Image</label>
                        
                        
                          <button type="button" class=" pull-right  btn img_block_cus_btn btn-default pull-right package_image_add">Add More Images</button>
                       
                        
                        
                        
                      </div>
                      
                      <div class="form-group col-lg-12 upload_new_img_cus_block">
                      	<input class="col-lg-6 form-control " type="file" name="package_image[]">
                      	</div>
                      
                      </div>
                      
                      <br/><br/>
                      
                      <div class="package_days colmd-12">
                         <div class="form-group col-lg-3">
                        <label class="col-lg-12">Day</label>
                        <input class="col-lg-12 form-control " type="text" name="package_day[]">
                       
                      </div>
                      
                               <div class="form-group col-lg-3">
                       
                         <label class="col-lg-12">Title</label>
                        
                          <input class="col-lg-12 form-control " type="text" name="day_title[]">
                      </div>
                      
                      
                       <div class="form-group col-lg-3">
                       
                          <label class="col-lg-12">Description</label>
                        <textarea  class="col-lg-12 form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"></textarea>
                      </div>
                      
                      
                       
                      <div class="form-group col-lg-3">
                        
                        
                     
                       
                       
                       <label class="col-lg-12 add_more_imgs">Add More Images</label>
                        <div class="col-lg-3 text-right">
                          <button type="button" class="btn btn-default pull-right package_day_add">Add</button>
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
      <div id="tabs-4" class="tab-pane fade in">
         <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Charges</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                 
                 
                 
                 
                 
                 	<div class="col-lg-12">
                 		
                 		
		                   <div class="row well">
		                   	
		                      
				                     <h3 class="page-header off_seasonal_block1">
								        <small >Off Seasonal</small>
								     </h3>
							
			                            		
		                 	 <div class="form-group col-lg-12">
		                 	 	
	                        	<label class="col-lg-2">Valid From</label>
		                         <span id="sandbox-container-frm">
									<input class="col-lg-3 form-control " name="off_seasonal_valid_from" id="valid_from" >                    	
								</span>
	                           
	                            <label class="col-lg-1"></label>
	                         
	                            <label class="col-lg-2">Valid To</label>
		                          <span id="sandbox-container-to">
									<input class="col-lg-3 form-control " name="off_seasonal_valid_to" id="valid_to" >                    	
								 </span>
	                          
	                          
	                     	</div>  
                      
                      <br/>
                      
                      
                      
                      <div class="form-group col-lg-12">
                        <label class="col-lg-2"></label>
                         <label class="col-lg-1">Single</label>
                          <label class="col-lg-1">Double</label>
                           <label class="col-lg-1">Triple</label>
                           
                            <label class="col-lg-1"></label>
                            
                           <label class="col-lg-1">Breakfast</label>
                          <label class="col-lg-1">Dinner</label>
                           <label class="col-lg-1">Fullmeal</label>
                       
                      </div>
                    
                      
                     
                      <div class="form-group col-lg-12">
                      	 <label class="col-lg-2"><i class="fa fa-star stars" ></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="off_seasonal_two_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_two_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_two_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="off_seasonal_two_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_two_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_two_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	 <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"><i class="fa fa-star stars"></i></i></label>
                      	  <input class="col-lg-1 form-control" name="off_seasonal_three_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_three_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_three_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                          <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="off_seasonal_three_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_three_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_three_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="off_seasonal_four_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_four_star[]" id="double" onkeypress="return onlyNumbers(event)"> 
                         <input class="col-lg-1 form-control " name="off_seasonal_four_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                          <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="off_seasonal_four_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_four_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_four_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                      </div>
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="off_seasonal_five_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_five_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_five_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="off_seasonal_five_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="off_seasonal_five_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="off_seasonal_five_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                      </div>
                      
			                            		
		                            		</div>
		                            	</div>
                 
                 
                 
                 
                 <div class="col-lg-12">
                 		
                 		
		                   <div class="row well">
		                   	
		                      
				                     <h3 class="page-header off_seasonal_block1">
								        <small >Seasonal</small>
								     </h3>
								
			                            		
		                 	 <div class="form-group col-lg-12">
		                 	 	
	                        	<label class="col-lg-2">Valid From</label>
		                         <span id="sandbox-container-frm1">
									<input class="col-lg-3 form-control " name="seasonal_valid_from" id="valid_from" >                    	
								</span>
	                          
	                           <label class="col-lg-1"></label>
	                         
	                            <label class="col-lg-2">Valid To</label>
		                          <span id="sandbox-container-to1">
									<input class="col-lg-3 form-control " name="seasonal_valid_to" id="valid_to" >                    	
								 </span>
	                           
	                          
	                     	</div>  
                      
                      <br/>
                      
                      
                      
                      <div class="form-group col-lg-12">
                        <label class="col-lg-2"></label>
                         <label class="col-lg-1">Single</label>
                          <label class="col-lg-1">Double</label>
                           <label class="col-lg-1">Triple</label>
                           
                            <label class="col-lg-1"></label>
                            
                           <label class="col-lg-1">Breakfast</label>
                          <label class="col-lg-1">Dinner</label>
                           <label class="col-lg-1">Fullmeal</label>
                       
                      </div>
                    
                      
                     
                      <div class="form-group col-lg-12">
                      	 <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="seasonal_two_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_two_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_two_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="seasonal_two_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_two_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_two_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="seasonal_three_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_three_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_three_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="seasonal_three_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_three_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_three_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="seasonal_four_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_four_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_four_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="seasonal_four_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_four_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_four_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                      </div>
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <input class="col-lg-1 form-control" name="seasonal_five_star[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_five_star[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_five_star[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
                         <label class="col-lg-1"></label>
                         
                          <input class="col-lg-1 form-control" name="seasonal_five_star_meals[]" id="single" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-1 form-control" name="seasonal_five_star_meals[]" id="double" onkeypress="return onlyNumbers(event)">
                         <input class="col-lg-1 form-control " name="seasonal_five_star_meals[]" id="triple" onkeypress="return onlyNumbers(event)">
                         
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
    
    
       <div id="tabs-5" class="tab-pane fade in">
         <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Available Vehicles</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                 
                  <div class="package_vehicles">
                 
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Vehicle</label>
                          <input class="col-lg-12 form-control" name="vehicle[]" id="vehicle" >
                     
                      </div>
                           <div class="form-group col-lg-3">
                        
                         <label class="col-lg-12">Capacity</label>
                         <input class="col-lg-12 form-control" name="capacity[]" id="capacity" onkeypress="return onlyNumbers(event)">
                     
                      </div>
                    
                        <div class="form-group col-lg-3">
                      
                          <label class="col-lg-12">Price</label>
                      <input class="col-lg-12 form-control" name="vehicle_charge[]" id="price" onkeypress="return onlyNumbersDots(event)">
                      </div>
                      
                     
                      <div class="form-group col-lg-3">
                      	
                      	  
                      	   <label class="col-lg-12  hidden_label_add_more_imgs" >Add More Images</label>
                      	      <div class="col-lg-12 text-right">
                          <button type="button" class="btn btn-default pull-right package_vehicle_add">Add</button>
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



    <div class="form-group admin_footer_btn_cus">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
    
    
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

