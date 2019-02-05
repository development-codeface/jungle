<?php $this->load->view('packages/side_menu');?>

<div id="page-wrapper" class="add_room wrapper_admin_cus_block2">
  <div class="container-fluid container_fuild_cus_admin_block3">
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Package </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>packages">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i><a href="<?php echo base_url();?>packages/add"> Package</a> </li>
           <li class="active"> <i class="fa fa-table"></i> <a href="<?php echo base_url();?>packages/packagelist">Manage Package</a> </li>
         <li class=""> <!-- <i class="fa fa-edit"></i> -->  Package </li>
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
        
  <form role="form" enctype="multipart/form-data" action="" method="post" class="pack_form_cus">
  	
  		<input type="hidden" name="id" value="<?php echo $result['package_data'][0]->id;?>" />
  		
   
      
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
          <div class="col-lg-12">
            <div class="panel panel-primary panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Packages</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel panel_cus_edit_sec_cus">
                  	
                 
								<div class="col-lg-12 r_padding">	
									<div class="col-lg-6 r_padding">
                      <div class="form-group col-lg-12">
                        <label class="col-lg-12">Title</label>
                        <input class="col-lg-12 form-control " name="title" id="title" placeholder="Incredible Kerala" value="<?php echo $result['package_data'][0]->title;?>">
                        <label class="err"><?php echo form_error('title');?></label>
                      </div>
                      
                      
           
                     
                      
                      <div class="form-group col-lg-12">
	                        <label class="col-lg-12">Nights</label>
	                         <input type="text" name="nights" class="col-lg-12 form-control" onkeypress="return onlyNumbers(event)" value="<?php echo $result['package_data'][0]->nights;?>" placeholder="Numbers only" />
                           <label class="err"><?php echo form_error('duration');?></label>
                      </div>
                      
                      <div class="form-group col-lg-12">
	                        <label class="col-lg-12">Days</label>
	                        <input type="text" name="days" class="col-lg-12 form-control" onkeypress="return onlyNumbers(event)" value="<?php echo $result['package_data'][0]->days;?>" placeholder="Numbers only"/>
                           <label class="err"><?php echo form_error('duration');?></label>
                      </div>
                      </div>

 					
<div class="col-lg-6 r_padding">

           <div class="form-group col-lg-12">
                        <label  class="col-lg-12">Description</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="description" id="description" placeholder='Tour Package to Kochi (Cochin), Munnar, Thekkady, Alappuzha (Alleppey)'><?php echo $result['package_data'][0]->description;?></textarea>
                        </div>
                         <label class="err"><?php echo form_error('description');?></label>
                      </div>
               
          
                      </div>
                     
</div>
                 

            
                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Inclusion details</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                         <textarea  class="ckeditor" rows="3" name="inclusion" id="inclusion"><?php echo $result['package_data'][0]->inclusion;?></textarea>
                        </div>
                          <label class="err"><?php echo form_error('inclusion');?></label>
                      </div>
                       

                      <div class="form-group col-lg-6">
                        <label class="col-lg-12">Exclusion details</label>
                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                         <textarea  class="ckeditor" rows="3" name="exclusion" id="exclusion"><?php echo $result['package_data'][0]->exclusion;?></textarea>
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
      <div id="tabs-2" class="tab-pane fade in">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Package Images and Itinerary Details</h3>
              </div>
              <div class="panel-body">
                <div class="list-group package_images_and_itinerary">
                  <div class="panel package_images_and_itinerary2">
                  	<div class="hotel_image_row img_listed_cus ">
                  
                  <?php
                   $image_count=count($result['image']);
                   if($image_count==0){
                  ?>
                   <div class="form-group col-lg-12">
                        <label class="col-lg-2">Image</label>
                        <input class="col-lg-6 form-control " type="file" name="package_image[]">
                     <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-default img_block_cus_btn pull-right package_image_add">Add</button>
                        </div>
                      </div>
                  <?php
				   }
				   else {
					   
                  ?>
                  	<input type="hidden" name="img_count" id="img_count" value="<?php echo $image_count;?>" />
                      <div class="form-group col-lg-12">
                        <label class="col-lg-6">Image</label>
                        
                        <div class="col-lg-6 text-right">
                        	<?php if($image_count<5):  ?>
                          <button type="button" class="btn btn-default img_block_cus_btn pull-right package_image_edit">Add More images</button>
                          <?php endif; ?>
                        </div>
                      </div> <!-- <input class="col-lg-6 form-control " type="file" name="package_image[]"> -->
                      
                      <?php foreach($result['image'] as $images): ?>
                      
                      <a href="<?php echo base_url();?>packages/image_edit/<?php echo $result['package_data'][0]->id;?>/<?php echo $images->id;?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=600,height=450,screenX=220,screenY=160,resizable,scrollbars');return false;" title="Zoom">	
	<img src="<?php echo base_url(). '../'.$images->thumb_image;?>" width='120' height='100'  /> </a>
                      	
                      	<input type="file" id="fileLoader" name="package_image[]" title="Load File" style = "display:none;" />
						<!-- <input type="button" id="btnOpenFileDialog" style="background: url(<?php echo base_url(). '../'.$images->thumb_image;?>); width: 100px; height: 100px;" onclick="openfileDialog();" />
						  -->
						 
                      <?php endforeach;
                      }
                      ?>
                    
                      </div>
                      <br/><br/>
                      <div class="room_image_row">
                      	
                      </div>
                      
                      <br/><br/>
                      <div class="col-md-12">
                      <div class="img_listed_cus4 ">
                      	  <div class="col-md-12">
                       <div class="form-group col-lg-12">
                        <label class="col-lg-3">Day</label>
                         <label class="col-lg-3">Title</label>
                          <label class="col-lg-3">Description</label>
                       <div class="col-lg-3 pull-right ">
                          <button type="button" class="btn btn-default img_block_cus_btn pull-right package_day_add">Add More images</button>
                        </div>
                      </div>
                      
                      
                       <div class="package_days">
                       	<?php
                       	foreach($result['itinerary'] as $package_days):
                       	?>
                      <div class="form-group col-lg-12">
                      	<input type="hidden" name="day_id[]" value="<?php echo $package_days->id;?>" />
                        <input class="col-lg-3 form-control " type="text" name="package_day[]" value="<?php echo $package_days->day;?>">
                        <input class="col-lg-3 form-control " type="text" name="day_title[]" value="<?php echo $package_days->title;?>">
                        <textarea  class="col-lg-3 form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"><?php echo $package_days->description;?></textarea>
                       
                      </div>
                      <?php
						endforeach;
                      ?>
                      </div>
                      
                      </div>
                       </div> </div>
                        
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
            <div class="panel panel-primary panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Charges</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                 
                 
                 
                 
                 
                 	<div class="col-lg-12">
                 		
                 		
		                   <div class="row well">
		                   	
		                     
				                     <h3 class="page-header">
								        <small>Off Seasonal</small>
								     </h3>
							
			                            	
		                 	 <div class="form-group col-lg-12">
		                 	 	
	                        	<label class="col-lg-2">Valid From</label>
		                         <span id="sandbox-container-frm">
									<input class="col-lg-3 form-control " name="off_seasonal_valid_from" id="valid_from"  value="<?php if($result['hotel'][0]->off_seasonal_valid_from<>'0000-00-00'): echo $result['hotel'][0]->off_seasonal_valid_from; endif;?>">                    	
								</span>
	                           <label class="err"><?php echo form_error('duration');?></label>
	                           
	                         
	                            <label class="col-lg-2">Valid To</label>
		                          <span id="sandbox-container-to">
									<input class="col-lg-3 form-control " name="off_seasonal_valid_to" id="valid_to" value="<?php if($result['hotel'][0]->off_seasonal_valid_to<>'0000-00-00'): echo $result['hotel'][0]->off_seasonal_valid_to; endif;?>" >                    	
								 </span>
	                           <label class="err"><?php echo form_error('duration');?></label>
	                          
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
                      	  <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_two_star) as $key => $off_seasonal_two_star):
						  ?>
	                         <input class="col-lg-1 form-control" name="off_seasonal_two_star[]" id="single" value="<?php echo $off_seasonal_two_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>	
	                       <label class="col-lg-1"></label>
                          <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_two_star_meals) as $key => $off_seasonal_two_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="off_seasonal_two_star_meals[]" id="single" value="<?php echo $off_seasonal_two_star_meals;?>" onkeypress="return onlyNumbers(event)">
                         <?php 
						  endforeach;
	                      ?>
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	 <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"><i class="fa fa-star stars"></i></i></label>
                      	  <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_three_star) as $key => $off_seasonal_three_star):
						  ?>
	                          <input class="col-lg-1 form-control" name="off_seasonal_three_star[]" id="single" value="<?php echo $off_seasonal_three_star;?>" onkeypress="return onlyNumbers(event)">
	                       <?php 
						  endforeach;
	                      ?>
                      	  
                      	   <label class="col-lg-1"></label>
                         <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_three_star_meals) as $key => $off_seasonal_three_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="off_seasonal_three_star_meals[]" id="single" value="<?php echo $off_seasonal_three_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	    <?php 
						  endforeach;
	                      ?>
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	   <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_four_star) as $key => $off_seasonal_four_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="off_seasonal_four_star[]" id="single" value="<?php echo $off_seasonal_four_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>
                      	  
                      	   <label class="col-lg-1"></label>
                         <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_four_star_meals) as $key => $off_seasonal_four_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="off_seasonal_four_star_meals[]" id="single" value="<?php echo $off_seasonal_four_star_meals;?>" onkeypress="return onlyNumbers(event)">
                          <?php 
						  endforeach;
	                      ?>
                      </div>
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  <?php
                      	  foreach (json_decode($result['hotel'][0]->off_seasonal_five_star) as $key => $off_seasonal_five_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="off_seasonal_five_star[]" id="single" value="<?php echo $off_seasonal_five_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>
                      	 
                      	  <label class="col-lg-1"></label>
                          <?php
	                      foreach (json_decode($result['hotel'][0]->off_seasonal_five_star_meals) as $key => $off_seasonal_five_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="off_seasonal_five_star_meals[]" id="single" value="<?php echo $off_seasonal_five_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	   <?php 
						  endforeach;
	                      ?>
                      </div>
                      
			                            		
		                            		</div>
		                            	</div>
                 
                 
                 
                 
                 <div class="col-lg-12">
                 		
                 		
		                   <div class="row well">
		                   	
		                      
				                     <h3 class="page-header">
								        <small>Seasonal</small>
								     </h3>
								
			                            		
		                 	 <div class="form-group col-lg-12">
		                 	 	
	                        	<label class="col-lg-2">Valid From</label>
		                         <span id="sandbox-container-frm1">
									<input class="col-lg-3 form-control " name="seasonal_valid_from" id="valid_from" value="<?php if($result['hotel'][0]->seasonal_valid_from<>'0000-00-00'): echo $result['hotel'][0]->seasonal_valid_from; endif;?>" >                    	
								</span>
	                           <label class="err"><?php echo form_error('duration');?></label>
	                           
	                         
	                            <label class="col-lg-2">Valid To</label>
		                          <span id="sandbox-container-to1">
									<input class="col-lg-3 form-control " name="seasonal_valid_to" id="valid_to" value="<?php if($result['hotel'][0]->seasonal_valid_to<>'0000-00-00'): echo $result['hotel'][0]->seasonal_valid_to; endif;?>">                    	
								 </span>
	                           <label class="err"><?php echo form_error('duration');?></label>
	                          
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
                      	 <?php
                      	  foreach (json_decode($result['hotel'][0]->seasonal_two_star) as $key => $seasonal_two_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="seasonal_two_star[]" id="single" value="<?php echo $seasonal_two_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>
                      	  
                      	   <label class="col-lg-1"></label>
                          <?php
	                      foreach (json_decode($result['hotel'][0]->seasonal_two_star_meals) as $key => $seasonal_two_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="seasonal_two_star_meals[]" id="single" value="<?php echo $seasonal_two_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	   <?php 
						  endforeach;
	                      ?>
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	  
                      	   <?php
                      	  foreach (json_decode($result['hotel'][0]->seasonal_three_star) as $key => $seasonal_three_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="seasonal_three_star[]" id="single" value="<?php echo $seasonal_three_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>
                      	
                      	 <label class="col-lg-1"></label>
                         <?php
	                      foreach (json_decode($result['hotel'][0]->seasonal_three_star_meals) as $key => $seasonal_three_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="seasonal_three_star_meals[]" id="single" value="<?php echo $seasonal_three_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	  <?php 
						  endforeach;
	                      ?>
                      </div>
                      
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	   <?php
                      	  foreach (json_decode($result['hotel'][0]->seasonal_four_star) as $key => $seasonal_four_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="seasonal_four_star[]" id="single" value="<?php echo $seasonal_four_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						 endforeach;
	                      ?>
                      	 
                      	  <label class="col-lg-1"></label>
                         <?php
	                      foreach (json_decode($result['hotel'][0]->seasonal_four_star_meals) as $key => $seasonal_four_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="seasonal_four_star_meals[]" id="single" value="<?php echo $seasonal_four_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	   <?php 
						 endforeach;
	                      ?>
                      </div>
                        <div class="form-group col-lg-12">
                      	  <label class="col-lg-2"><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i><i class="fa fa-star stars"></i></label>
                      	 <?php
                      	  foreach (json_decode($result['hotel'][0]->seasonal_five_star) as $key => $seasonal_five_star):
						  ?>
						  	<input class="col-lg-1 form-control" name="seasonal_five_star[]" id="single" value="<?php echo $seasonal_five_star;?>" onkeypress="return onlyNumbers(event)">
	                      <?php 
						  endforeach;
	                      ?>
                      	  
                      	   <label class="col-lg-1"></label>
                          <?php
	                      foreach (json_decode($result['hotel'][0]->seasonal_five_star_meals) as $key => $seasonal_five_star_meals):
						  ?>
                          <input class="col-lg-1 form-control" name="seasonal_five_star_meals[]" id="single" value="<?php echo $seasonal_five_star_meals;?>" onkeypress="return onlyNumbers(event)">
                      	   <?php 
						  endforeach;
	                      ?>
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
            <div class="panel panel-primary panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Available Vehicles</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                 
                      <div class="form-group col-lg-12">
                        <label class="col-lg-3">Vehicle</label>
                         <label class="col-lg-2">Capacity</label>
                          <label class="col-lg-2">Price</label>
                        <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-default pull-right package_vehicle_add">Add</button>
                        </div>
                      </div>
                    
                    
                      
                      <div class="package_vehicles">
                      	<?php
                      	$vehicle_count=count($result['vehicle']);
                      	if($vehicle_count==0)
                      	{
                      		?>
                      	<div class="form-group col-lg-12">
                      	 <input class="col-lg-3 form-control" name="vehicle[]" id="vehicle" >
                      	  <input class="col-lg-2 form-control" name="capacity[]" id="capacity" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-2 form-control" name="vehicle_charge[]" id="price" onkeypress="return onlyNumbersDots(event)">
                      </div>
                      <?php
                      }
					 else
					 {
                      	foreach ($result['vehicle'] as $vehicles):
						
							?>
					<div class="form-group col-lg-12">
						<input type="hidden" name="vehicle_id[]" value="<?php echo $vehicles->id;?>" />
                      	 <input class="col-lg-3 form-control" name="vehicle[]" id="vehicle"  value="<?php echo $vehicles->vehicle_name;?>">
                      	  <input class="col-lg-2 form-control" name="capacity[]" id="capacity" value="<?php echo $vehicles->capacity;?>" onkeypress="return onlyNumbers(event)">
                      	   <input class="col-lg-2 form-control" name="vehicle_charge[]" id="price" value="<?php echo $vehicles->price;?>" onkeypress="return onlyNumbersDots(event)">
                      </div>
							<?php
						endforeach;
						
					 }
                      	?>
                      	
                     
                      
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

