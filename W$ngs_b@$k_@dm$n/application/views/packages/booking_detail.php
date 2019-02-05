<?php $this->load->view('packages/side_menu');?>
  

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Package Booking Detail
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>packages">Dashboard</a>
                            </li> 
                            <li class="">
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>packages/booking">Manage Package Booking</a>
                            </li>
                             <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->Package Booking Detail
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Package Booking Detail</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                               	
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h2 class="page-header" >
								                    	<?php echo $result->title;?>
								                    </h2>
								                </div> 
			                            		
			                            		<div class="list-group">	                            			
				                            		<div class="col-lg-12">
						                              <?php echo $result->description;?>
				                            		</div>
				                            		<div class="col-lg-12">
				                            			<label> Duration :  <?php echo $result->nights;?> Nights  <?php echo $result->days;?> Days</label>
						                              
				                            		</div>
			                            		</div>
		                            		</div>
		                            	</div>
                                
								 <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	User Details
								                    </h4>
								                </div> 
								                
			                            		  <div class="col-lg-12">
			                            		  	<br/>
														
						                            	<label class="col-lg-3">Name</label>
														<label class="col-lg-2">Email</label>
						                            	<label class="col-lg-2">Phone</label>
								                        
						                             </div>
				                            		<?php $hotel=$result->hotel; ?>
				                         			                            	
				                             <div class="form-group col-lg-12">
											 
						                      	 <input class="col-lg-3 form-control" name="hotel[]" id="hotel" value="<?php echo $result->first_name." ".$result->last_name; ?>" >
												<input class="col-lg-2 form-control" name="day[]" id="day"  value="<?php echo $result->email;?>">
												<input class="col-lg-2 form-control" name="person[]" id="person"  value="<?php echo $result->phone;?>">
						                      </div>
				                            		
				                            		
			                            	
		                            		</div>
		                            	</div>
										
										
								       <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	Booking Details
								                    </h4>
								                </div> 
								                
												 <div class="col-lg-12">
			                            		  	<br/>
														
						                            	<label class="col-lg-1">Checkin</label>
														<input class="col-lg-2 form-control" name="day[]" id="day"  value="<?php echo $result->check_in; ?>">
												<label class="col-lg-1"></label>
						                            	<label class="col-lg-1">checkout</label>
								                        <input class="col-lg-2 form-control" name="day[]" id="day"  value="<?php echo $result->check_out;?>">
												
						                             </div>
													 
			                            		  <div class="col-lg-12">
			                            		  	<br/>
														<br/>
														
						                            	<label class="col-lg-3">Hotel</label>
														<label class="col-lg-2">Duration</label>
						                            	<label class="col-lg-2">No.of person</label>
						                            	<label class="col-lg-2">Price/person</label>
														<label class="col-lg-3">Total Price</label>
								                        
						                             </div>
				                            		<?php $hotel=$result->hotel; ?>
				                         			                            	
				                             <div class="form-group col-lg-12">
											 
						                      	 <input class="col-lg-3 form-control" name="hotel[]" id="hotel" value="<?php if(($hotel==2)){ echo "2 star"; } if(($hotel==3))
												 { echo "3 Star"; } if(($hotel==4)){ echo "4 Star"; } if(($hotel==5)){ echo "5 Star"; } ?>" >
												<input class="col-lg-2 form-control" name="day[]" id="day"  value="<?php echo $result->nights. "&nbsp;Nights," .$result->days. "&nbsp;Days";?>">
												<input class="col-lg-2 form-control" name="person[]" id="person"  value="<?php echo $person =$result->no_of_person;?>">
												<input class="col-lg-2 form-control" name="price[]" id="price"  value="<?php echo $result->price;?>">
						                      	 <input class="col-lg-3 form-control" name="total[]" id="total" value="<?php  echo $person * $result->price;?>">
						                      </div>
				                            		
				                            		
			                            	
		                            		</div>
		                            	</div>
										
								
                                <?php
		                         $veh='';
		                         if(!empty($result->vehicles) && $result->vehicles!='null')
											{
												$vehicle = json_decode($result->vehicles);
												
										?>	
		                            <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	Vehicle Details
								                    </h4>
								                </div> 
								                
			                            		  <div class="col-lg-12">
			                            		  	<br/>
														
						                            	<label class="col-lg-5">Vehicle Name</label>
						                            	<label class="col-lg-4">Capacity</label>
						                            	<label class="col-lg-2">Total Price</label>
								                        
						                             </div>
				                            		
				                            <?php 	foreach($vehicle as $veh_id)
												{ 
												 $this->db->select('*');
												$this->db->where('id',$veh_id);
												$veh_query = $this->db->get('tbl_package_vehicle');
												$res = $veh_query->row();
												$veh+= $res->price;
												?>				                            	
				                             <div class="form-group col-lg-12">
						                      	 <input class="col-lg-5 form-control" name="vehicle[]" id="vehicle" value="<?php echo $res->vehicle_name;?>" >
														
												 <input class="col-lg-4 form-control" name="capacity[]" id="capacity"  value="<?php echo $res->capacity;?>">
						                      	   <input class="col-lg-3 form-control" name="vehicle_charge[]" id="price" value="<?php  echo $res->price;?>">
						                      </div>
				                            		<?php }?>
				                            		
			                            	
		                            		</div>
		                            	</div>
		                         
                                <?php  }?>
                                
		                            	
		                            	<?php if(!empty($result->request))
										{?>
										
										
										
										   <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	Special Request
								                    </h4>
								                </div> 
								                
			                            		  <div class="col-lg-12">
			                            		  	<br/>
														
								                        
						                             </div>
				                           				                            	
				                             <div class="form-group col-lg-12">
											 <p class="col-lg-7"><?php echo $result->request;?> </p>
						                      	 
												  </div>
				                            		
				                            		
			                            	
		                            		</div>
		                            	</div>
										<?php }?>
										
										
										
										   <div class="col-lg-12">
		                            		<div class="row well">
			                            		<div class="col-lg-12 col_p_cus">
				                            		<h4 class="page-header" style="margin : 0px;">
								                    	Total Price
								                    </h4>
								                </div> 
								                
			                            		  <div class="col-lg-12">
			                            		  	<br/>
														
								                        
						                             </div>
				                           				                            	
				                             <div class="form-group col-lg-12">
						                      	 <label class="col-lg-7"></label>
												 <label class="col-lg-2">Grand Total</label>
						                      	   <input class="col-lg-2 form-control" name="vehicle_charge[]" id="price" value="<?php  echo ($person * $result->price) + $veh ;?>">
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
				