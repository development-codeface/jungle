<?php $this->load->view('packages/side_menu');?>
  

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Packages
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>packages">Dashboard</a>
                            </li> 
                              <li class="">
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>packages/add">Add Packages </a>
                            </li>
                            <li class="">
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>packages/packagelist">Manage Packages</a>
                            </li>
                             <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->Package View
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				 
				<div class="row">
					
					
					
                    <div class="col-lg-12 ">
                        <div class="panel panel-primary panel_primary_travels_cus view_page_packages_block">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Package</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                               	
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h2 class="page-header" >
								                    	<?php echo $result['package_data'][0]->title;?>
								                    </h2>
								                </div> 
			                            		
			                            		<div class="list-group">	                            			
				                            		<div class="col-lg-12">
						                              <?php echo $result['package_data'][0]->description;?>
				                            		</div>
				                            		<div class="col-lg-12">
				                            			<label> Duration :  <?php echo $result['package_data'][0]->nights;?> Nights  <?php echo $result['package_data'][0]->days;?> Days</label>
						                              
				                            		</div>
			                            		</div>
		                            		</div>
		                            	</div>
                                
                                
                                
                                	<div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header">
								                    	Itinerary
								                    </h4>
								                </div> 
								                
								                <?php
								                $i=1;
								                 foreach($result['itinerary'] as $package_days):
								                ?>
								                
								                   <div class="col-lg-12">
						                            	<label>Day <?php echo $i++;?> : <?php echo $package_days->title;?></label>
								                         <div class="form-group input-group">
										                   <p>
						                             <?php echo $package_days->description;?>
						                                   </p>
										                 </div>
						                             </div>
			                            		
			                            		<?php
												 endforeach;
			                            		?>
			                            		
			                            		
		                            		</div>
		                            </div>
		                            
		                            
		                            
		                            
		                            
		                               	
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" >
								                    	Photos
								                    </h4>
								                </div> 
								                <div class="photo_cus_block_packages">
			                            		 		
				                            		<div class="col-lg-12">
				                            			  <?php foreach($result['image'] as $images): ?>
				                            			<div class="col-lg-2">
						                               <img src="<?php echo base_url(). '../'.$images->thumb_image;?>" width='100%' height='auto' />
						                              </div>
						                          	<?php endforeach;?>
				                            		</div>
				                            		</div>
				                            		
			                            	
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            
		                                	
		                            <div class="col-lg-12">
		                            		<div class="row well">
		                            			
		                            				<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header col_p_cus">
								                    	Price & validity
								                    </h4>
								                </div> 
								                
								                	<div class="col-lg-12 title_cus_packages">
				                            		<label>Seasonal</label>
								                </div> 
								                	
								                	<div class="seasonal_content_cus  ">
								                 	<div class="col-lg-12 ">
								                 		<div class="col-lg-12 form_cus_block_title">
							                 		<br/>
						                        	<label class="col-lg-2">Valid From :</label>
							                       <label class="col-lg-2"><?php echo $result['hotel'][0]->seasonal_valid_from;?></label>
						                           
						                            <label class="col-lg-1"></label>
						                         
						                            <label class="col-lg-2">Valid To :</label>
							                          <label class="col-lg-2"><?php echo $result['hotel'][0]->seasonal_valid_to; ?></label>
						                         	<br/>
						                     
						                     	</div>  	
						                       	</div>  	  
						                
						                
						                <div class="col-lg-12 ">         		
							           <div class="form-group  ">
							           	 <div class="col-lg-12  star_rating_block">   
							           	 <br/>	
				                        <label class="col-lg-2"></label>
				                         <label class="col-lg-1">Single</label>
				                          <label class="col-lg-1">Double</label>
				                           <label class="col-lg-1">Triple</label>
				                           
				                            <label class="col-lg-1"></label>
				                            
				                           <label class="col-lg-1">Breakfast</label>
				                          <label class="col-lg-1">Dinner</label>
				                           <label class="col-lg-1">Fullmeal</label>
				                        </div> 
				                      </div>
				                      
				                    
                       <div class="col-lg-12 star_rating_block">  
                       	
                     
                     		<?php if(count(array_filter(json_decode($result['hotel'][0]->seasonal_two_star)))): ?>
		                      <div class="form-group row star_label_cus">
		                      	 <label class="col-lg-2"><i class="fa fa-star stars" ></i><i class="fa fa-star stars"></i></label>
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
		                      <?php endif; ?>
							
		                       
							 <?php if(count(array_filter(json_decode($result['hotel'][0]->seasonal_three_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
		                      
		                       <?php if(count(array_filter(json_decode($result['hotel'][0]->seasonal_four_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?> 


		                       <?php if(count(array_filter(json_decode($result['hotel'][0]->seasonal_five_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
			                           </div> 
			                            
			                        </div>      </div>      
			                            <br/>
			                            
			                            
								          <div class="col-md-12">
								          	<br>
								          	</div> 
								          	
								           
								           	<div class="col-lg-12 title_cus_packages">
								           		
				                            		<label>Off Seasonal</label>
								                </div> 
								                	
								                	<div class="col-lg-12 ">
								                 	
								                 	<div class="col-lg-12 form_cus_block_title">
							                 		<br/>
						                        	<label class="col-lg-2">Valid From</label>
							                       <label class="col-lg-3">2015-10-11</label>
						                           
						                            <label class="col-lg-1"></label>
						                         
						                            <label class="col-lg-2">Valid To</label>
							                          <label class="col-lg-3">2015-10-11</label>
						                         	<br/>
						                     	</div>  </div>	
						                         
						                         <div class="col-lg-12">   		
							           <div class="form-group ">
							           	<div class="col-lg-12 star_rating_block">
							           	 <br/>
							           	 	
				                        <label class="col-lg-2"></label>
				                         <label class="col-lg-1">Single</label>
				                          <label class="col-lg-1">Double</label>
				                           <label class="col-lg-1">Triple</label>
				                           
				                            <label class="col-lg-1"></label>
				                            
				                           <label class="col-lg-1">Breakfast</label>
				                          <label class="col-lg-1">Dinner</label>
				                           <label class="col-lg-1">Fullmeal</label>
				                       
				                      </div></div>
				                    
                      
                      <div class="col-lg-12 star_rating_block">   		
		                     <?php if(count(array_filter(json_decode($result['hotel'][0]->off_seasonal_two_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
		                         <?php if(count(array_filter(json_decode($result['hotel'][0]->off_seasonal_three_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
		                        <?php if(count(array_filter(json_decode($result['hotel'][0]->off_seasonal_four_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
		                        <?php if(count(array_filter(json_decode($result['hotel'][0]->off_seasonal_five_star)))): ?>
		                      <div class="form-group row">
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
		                      <?php endif; ?>
		                      
			                           </div> 
			                           
			                       </div>      
			                           <div class="col-md-12">
								          	<br>
								          	</div> 
			                            		
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            	
		                            	
		                            	   	
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" >
								                    	Inclusion/Exclusion Details
								                    </h4>
								                </div> 
								                
								                
								                <div class="col-lg-12">
			                            		  <div class="col-lg-12 col_p_cus">
			                            		  	
						                            	<label>Inclusion Details</label>
								                         <div class="form-group input-group">
										                   <p>
						                               <?php echo $result['package_data'][0]->inclusion;?>
						                                   </p>
										                 </div>
						                             </div>
				                            		
				                            		
				                            		
				                            		 <div class="col-lg-12 col_p_cus">
						                            	<label>Exclusion Details</label>
								                         <div class="form-group input-group">
										                   <p>
						                               <?php echo $result['package_data'][0]->exclusion;?>
						                                   </p>
										                 </div>
						                             </div>
				                            		</div>
			                            	
		                            		</div>
		                            	</div>
		                         
		                         
		                         
		                         
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	Vehicle Details
								                    </h4>
								                </div> 
								                
			                            		  <div class="col-lg-12">
			                            		  	<br/>
						                            	<label class="col-lg-3">Vehicle Name</label>
						                            	<label class="col-lg-2">Capacity</label>
						                            	<label class="col-lg-2">Price</label>
								                        
						                             </div>
				                            		
				                            <?php 	foreach ($result['vehicle'] as $vehicles): ?>
				                            	
				                             <div class="form-group col-lg-12">
						                      	 <input class="col-lg-3 form-control" name="vehicle[]" id="vehicle" value="<?php echo $vehicles->vehicle_name;?>" >
						                      	  <input class="col-lg-2 form-control" name="capacity[]" id="capacity"  value="<?php echo $vehicles->capacity;?>">
						                      	   <input class="col-lg-2 form-control" name="vehicle_charge[]" id="price" value="<?php echo $vehicles->price;?>">
						                      </div>
						                    
				                            		<?php endforeach;?>
				                            		
			                            	
		                            		</div>
		                            	</div>
		                         
                                
                                
		                            	
		                            	
		                            	
		                            	
		                            	
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            	
		                                                           
                                
                                
                            </div>
                        </div>
                    
                  
                    </div>
                    
                </div>
                <!-- /.row -->
				