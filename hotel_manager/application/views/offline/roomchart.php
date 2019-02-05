<div id="page-wrapper" class="add_room room_chart_cus_block">

            <div class="container-fluid profile-block-cus rooms_list_block_cus  offline_booking_chart_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Room Chart
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li> 
                             
                             <li class="active">
                                <i class="fa fa-fw fa-table"></i>Room Chart
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				 
				<div class="row">
					
					
					
                    <div class="col-lg-12 ">
                        <div class="panel panel-primary">
                        	
                        	
                        	          <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Room chart
                            <div class="pull-right">
                            	<a class="btn btn-success" href="<?php echo base_url('offline/add');?>"><span><i class="fa fa-plus"></i></span> Reservation</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                        	
                         
                            
                            
                            
                            <div class="panel-body  tab_main_content_cus">
                                
                               
		                            	
		              <div class="form-group col-lg-3">
                        <label class="col-lg-12">Check-in</label>
                        <span id="sandbox-container-cin">
                        <input class="col-lg-8 form-control " name="check_in" id="check_in" onchange="room_available();">
                        </span>
                       
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Check-out</label>
                        <span id="sandbox-container-cout">
                        <input class="col-lg-8 form-control " name="check_out" id="check_out" onchange="room_available();">
                      
                        </span>
                        
                      </div>
		                            
		                            <div class="col-lg-4 col-md-offset-1">
		                            	<div class="row well room_chart_block_cus_color_section">
		                            		
								                <div class="col-lg-12 ">
								                	<div class="col-lg-6 room_chart_block_cus_color_section_radio_btn  room_chart_block_cus_color_section_radio_btn_blocked">
								                		<input type="radio"   class="css-checkbox status chk1_block_cus"   id="chk1" value="booked" name="status"  onclick="room_available();" />
								                		<label  class="cus_clr1" for="chk1"><span><span></span></span>Blocked</label>
									                	
								                	</div>

								                	
								                	<div class="col-lg-6 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available" >
								                	<input type="radio"   class="css-checkbox status chk2_block_cus" id="chk1" value="available" name="status" onclick="room_available();"/>
													<label class="cus_clr2"  for="chk1"><span><span></span></span>Available</label>
 													</div>
		                            			</div>
		                            			    <div class="col-lg-12 ">
								                	<div class="col-lg-6 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available_occupied">
								                		<input type="radio"   class="css-checkbox status chk3_block_cus" id="chk1" value="checkin" name="status"  onclick="room_available();" />
								                		<label  class="cus_clr3"  for="chk1"><span><span></span></span>Occupied</label>
								                		
									                	
								                	</div>
								                	
								                	<div class="col-lg-6 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available_reserved">
								                	<input type="radio"   class="css-checkbox status chk4_block_cus" id="chk1" value="reserved" name="status" onclick="room_available();"/>
								                	<label class="cus_clr4"   for="chk1"><span><span></span></span>Reserved</label>
								                
								                	
								                	</div>
		                            			
		                            			</div>
		                            			<div class="col-lg-12 ">
								                	<div class="col-lg-6 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_checkout">
								                		<input type="radio"   class="css-checkbox status chk5_block_cus"   id="chk1" value="checkout" name="status"  onclick="room_available();" />
									                <label  class="cus_clr5"  for="chk1"><span><span></span></span>Checkout</label>
								                	</div>
								                	</div>
								               
		                            			
		                            			
		                           		</div>
		                            </div>
		                            
		                            

		                            
		                            
		                         <div class="col-lg-12 room_block room_block_cus " >
		                         	<label style="display: none" id="date_error" class="err">Check-out date should be greater than Check-in date</label>
		                            	<div class="row well room_status_cus"  id="room_status">
		                            			
		                            			 <?php
		                            			 $date=date('Y-m-d');
		                            			foreach($results as $result):
												$rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id,NULL,NULL);
												
												 ?>
		                            			
								            
								                	
								                	
						                         
						                     <div class="col-lg-12 room_status_cus_block  room_cus_room_chart_block">   		
												 	  <div class="form-group row">
							                      	<label class="col-lg-12"><?php echo $result->room_title;?></label>
							                  
							                      	    	
							                      	<?php
							                      	if(!empty($rooms))
													{
							                      	foreach($rooms as $roomnumber):
														
														
														$datewise = $this->Offline_model->check_rooms($date,$roomnumber->id);
															$data1['results1'] = $this->Roomnumber_model->allList_today($date,$result->hotel_id);
													
														//if($roomnumber->status==1){
															
															if(!empty($datewise))
															{
																if($datewise[0]->status==0 && $datewise[0]->cancel != 2)
																{ 
																?>
									                      	
										                    	<div class="col-md-1 room-list-block">
										                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #FF00FA;">
										                      	 </div> 	
										                      	    	
										                      	<?php
																}
																else if($datewise[0]->status==1 && $datewise[0]->cancel != 2)
																{
																?>
									                      	
										                    	<div class="col-md-1 room-list-block">
										                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #FEFE00;">
										                      	 </div> 	
										                      	    	
										                      	<?php
																}
																else if($datewise[0]->status==2 && $datewise[0]->cancel != 2)
																{
																?>
										                      	
										                    	<div class="col-md-1 room-list-block">
										                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #3BE6ED;">
										                      	 </div> 	
										                      	    	
										                      	<?php
																}
																if($datewise[0]->status==3 && $datewise[0]->cancel != 2)
																{
																?>
										                      	
										                    	<div class="col-md-1 room-list-block">
										                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #837EFC;">
										                      	 </div> 	
										                      	    	
										                      	<?php
																}
																
															}
															else
															{
																$x=0;
															if(!empty($data1['results1'])){
																$x=1;
																?>
																<div class="col-md-1 room-list-block">
										                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #03C100;">
										                      	 </div> 
										                      	 <?php
															}
															
															}
														//}
														//else 
														//{ //Not available rooms or blocked rooms
															?>
															
														<!-- <div class="col-md-1 room-list-block">
								                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #FF00FA;">
								                      	 </div>  -->	
															<?php 
														//}
														
													endforeach;
													if(empty($x))
															{?>	<!---<div class="col-md-3 ">
							                      	    No Rooms Added
							                      	   
							                      	    	</div> 	--->
															<?php }
													}
													else  {
														?>
														
															<div class="col-md-3 ">
							                      	    No Rooms Added
							                      	   
							                      	    	</div> 	
							                      	    	<?php
													}
													?>		
							                      	 	
							                      </div>
							                
			                          
			                            
		    								 </div> 
			                            
			                            
			                            <?php
										endforeach;?>
			                            
			                            
			                            
			                            
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            
		                            	
		                   </div>
		               	</div>
                    </div>
                </div>
                    
         </div>
                    
     </div> 