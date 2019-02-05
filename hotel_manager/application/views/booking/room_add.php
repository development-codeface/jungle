<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Add Room</h1>
      </div>
    </div>                           



        <div class="row">
          <div class="col-lg-12 ">


            <div class="panel panel-primary">
            
              
              <div class="panel-heading  cus_panel_heading">
               <i class="fa fa-clock-o fa-fw"></i> 
              </div>
              
              <div class="panel-body  rooms_list_block_table">
                <div class="list-group tab_main_content_cus tab_main_content_cus_add_block">

                    	<?php echo form_error('r_num[]'); ?>
                    <form role="form" method="post" id="offline">
                    	<div class="cus_border2 col-md-12">
                    	<div class="form-group col-lg-4">
                        <label class="col-lg-12">Check-in</label>
                        <input class="col-lg-8 form-control" value="<?php echo $details[0] -> check_in; ?>" name="check_in" id="check_in" readonly>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12">Check-out</label>
                        <input class="col-lg-8 form-control" value="<?php echo $details[0] -> check_out; ?>" name="check_out" id="check_out" readonly>
                      </div>

                    
                       <div class="form-group col-lg-12" id="room_available">
					   <?php
                if(!empty($rooms)) {
					
					if($cat!=0)
					 {
					  $data['commision']	=	$this->Offline_model->getCommision($rooms[0]->hotel_id,$cat);
					 }
                  foreach($rooms as $result):
				  
				 $room_price= $result->price;
				 $extra_bed_rate = $result->room_adult_rate;
				 $extra_child_rate = $result->room_child_rate;
				 
				 
				 
				 if($result->tax_applicable=='0')
				{
					$tax = $this->Offline_model->tax_amount_off($result->hotel_id);
					$t_amount='';
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
													
				
				}
				else
				{
					$tax = $this->Offline_model->tax_amount($result->hotel_id);
					$t_amount='';
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
											
					
				}		


				if(!empty($data['commision'][0]->room_tariff))
				   {
					    $tariff =  $data['commision'][0]->room_tariff;
				   }
				   else
				   {
					    $tariff = '';
				   }
								
				   if(empty($query_flag)) {
					   $rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id,$check_in,$check_out);
				   } else {
					   $rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->room_id,$check_in,$check_out);
				   }
					 
					
					  
					   foreach($rooms as $roomnumber):
					  	$available='';
						 	if($roomnumber->status == '1'):
							if(empty($query_flag)) {
								$avail_room_check =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
								} else {
								$avail_room_check =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->room_id,$roomnumber->id);
								}
								$available += $avail_room_check;
							endif;
							
					   endforeach;
					   
					   
					  //if($available=='0'):
					  
					  if(!empty($rooms)){
					  
					  
					  ?>
					  <input type="hidden" name="hotel_tax" id="hotel_tax" value="<?php echo $t_amount;?>"/>
					   <input type="hidden" name="commision" id="commision" value="<?php echo $tariff;?>"/>
					  <input type="hidden" value="<?php echo  $days;?>" id="total_days" />
					  <input type="hidden" value="<?php echo $room_price;?>" name="room_basic_price[]" id="room_basic_price"/>
                     <ul class="delrom_cus delrom_cus_offline col-md-12">
                     	 <div class="col-md-3"><li class="block_cus_field_main_title_room"><?php echo $result->room_title .' (' . $result->allowed_persons . ' pax each)';?><br/>
						 <?php echo ' (' . $result->normal_allowed_adults . ' <i class="fa fa-male "></i>';
						 if(!empty($result->normal_allowed_kids)){
							echo " +" .$result->normal_allowed_kids . ' <i class="fa fa-child "></i>'; }
							echo ")";
							?></li> 
								<div class="notes_cus_offline notes_cus_offline_cus">	
							<?php
							 if(!empty($result->room_child_rate))
							   {
							echo "Free for upto ".$result->child_free_limit ." year old children";
							   }?>
							</div>
							</div>
                     	 <div class="col-md-4">
                     	 <?php
						  
                     	 foreach($rooms as $roomnumber):
							 $room_check='';
							 
							 	$block = $this -> Offline_model -> block_dates($roomnumber->room_number, $check_in, $check_out);
							
							 if(empty($block)):
								 if(empty($query_flag)) {
								  $avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
								  } else {
								  $avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->room_id,$roomnumber->id);
								  }
								  //echo $this -> db -> last_query();
												//echo $avail_rooms;
												//echo $this -> db -> last_query();
												$room_check += $avail_rooms;
												if($avail_rooms==0){
												$cu=true;
												?>
												
												<li class="block_cus_field_main_title_room_number_cus ">
												<input class="room_check<?php echo $result->setting_id;?> check_room_<?php echo $result->setting_id;?>_<?php echo $roomnumber->id;?> 
												check_room_number_<?php if(empty($query_flag)) { echo $result->id; } else { echo $result->room_id; } ;?>_<?php echo $roomnumber->id;?> room_number_id_<?php echo $roomnumber->id;?> numberrooms"
												onclick="getRooms('<?php echo $result->setting_id;?>','<?php if(empty($query_flag)) { echo $result->id; } else { echo $result->room_id; } ;?>','<?php echo $roomnumber->id;?>')"  type="checkbox" name="r_num[]" 
												value="<?php echo $result->setting_id.'|'.$roomnumber->room_number.'|'.$roomnumber->id.'|'.$room_price.'|'.$extra_bed_rate.'|'.$extra_child_rate;?>" id=""> <?php echo $roomnumber->room_number;?>
													
												</li>
                     	
												
												<?php	
													
												}
							
							 endif;
							 
						 endforeach;
						
						 
						if(empty($cu)) echo '<p class="notes_cus_offline">No rooms available</p>';
							  ?>
							  </div>
							    <span <?php  if(empty($result->no_of_bed)){?> style="display: none;" <?php }?>>
						<li class="extra_block_cus_field col-md-2"><label>Extra Bed</label>
                        <input onkeyup="getRoomsBed(<?php echo $result->setting_id ?>)" class="form-control" value="<?php echo set_value('extra_bed'); ?>" name="extra_bed[]" id="extra_bed<?php echo $result->setting_id;?>" disabled="" 
                        onkeypress="return onlyNumbers(event)" placeholder="Numbers only"  >
						<div class="notes_cus_offline">	
                        <span id="bed_count_<?php echo $result->setting_id ?>"><?php echo $result->no_of_bed;?></span>  extra bed for <span class="room_count_<?php echo $result->setting_id ?>">1</span> room
</div>
						
						<input type="hidden" value="<?php echo $extra_bed_rate;?>" id="extra_bed_rate<?php echo $result->setting_id;?>"/>
                         <input type="hidden" id="extra_amount<?php echo $result->setting_id;?>" value="" class="extra_amount">
						  <input type="hidden" id="no_of_bed_<?php echo $result->setting_id;?>" value="<?php echo $result->no_of_bed;?>" class="">
						     
						</li></span>
                          

							   <?php
							   if(!empty($result->room_child_rate))
							   {
							   ?>
							   <span <?php  if(empty($result->normal_allowed_kids)){?> style="display: none;" <?php }?>>
							<li class="extra_block_cus_field col-md-2"><label>No. of children</label>					 
							<input onkeyup="getChilds(<?php echo $result->setting_id ?>)" type="text" name="number_of_childrens[]" id="childs<?php echo $result->setting_id;?>" disabled=""
.							class="form-control"  onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>

			<input type="hidden" value="<?php echo $extra_child_rate;?>" id="extra_child_rate<?php echo $result->setting_id;?>"/>
			<input type="hidden" id="extra_child_amount<?php echo $result->setting_id;?>" value="" class="extra_child_amount">
			<input type="hidden" id="no_of_child_<?php echo $result->setting_id;?>" value="<?php echo $result->normal_allowed_kids;?>" class="">
<div class="notes_cus_offline">						     
<span id="child_count_<?php echo $result->setting_id ?>"><?php echo $result->normal_allowed_kids;?></span>  child for each <span class="room_count_<?php echo $result->setting_id ?>">1</span> room</div>	
					 
									</li>	</span>			 
                        <?php 
							   }
							   echo form_error('extra_bed'); 
												//  endif;
                        ?>
                        
                        
                     </ul>
                     
                     
                  <?php
					  }
						// endif;
                 // if($avail_rooms<>'0'): echo "No Rooms"; endif;
				  endforeach; } else { echo 'No rooms'; } 
				 if(count(array_filter($food)) > 0) { ?>
                <div class="form-group col-lg-12" id="food_paln">
			  
                      <div class="room-list-cus room_list_cus_offline col-lg-12">
						<label class="col-lg-12 cus_offline_rooms_title">Food Plan</label>
						
					
							
						 <ul class="delrom_cus delrom_cus_offline col-md-12">
						 <?php
						  if(!empty($foodplan[0] -> breakfast))
							{
						 ?>
                     	 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="breakfast" value="<?php  echo $foodplan[0] -> breakfast;?>" id="" onclick="food_plan();" >  &nbsp;
						 Breakfast 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan[0] -> lunch))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="lunch" value="<?php  echo $foodplan[0] -> lunch;?>" id="" onclick="food_plan();">  &nbsp;
						 Lunch  
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan[0] -> dinner))
							{
								?>
							
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="dinner" value="<?php  echo $foodplan[0] -> dinner;?>" id="" onclick="food_plan();">  &nbsp;
						 Dinner 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan[0] -> all_meals))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="all" value="<?php  echo $foodplan[0] -> all_meals;?>" id="" onclick="food_plan();">  &nbsp;
						 All Meals 
						  
						</li>  
							</div>
							<?php
							}?>
                        <div class="form-group col-lg-6">
						</div>
                     </ul>
					
					
						<div class="form-group col-lg-4">
                        <label class="col-lg-4">No. of days</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_days" id="no_of_days" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
						
					<div class="form-group col-lg-4">
                        <label class="col-lg-6">No. of persons</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_persons" id="no_of_persons" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
					  
					  <div class="form-group col-lg-6">
					 <br/>
                        <label class="col-lg-6">Total Food Plan Amount</label>
                        <input class="col-lg-4 form-control" value="" name="total_food" id="total_food" readonly="">
                      </div>
				</div>
						
             </div>
				   <?php } ?>
                        </div>
						

                    
                      <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Total</label>
                        <input class="col-lg-8 form-control" value="" name="total" id="total" readonly="">
                        <input type="hidden" id="total_hid">
                      </div>
					  
					  <?php if($cat!=0)
					 { ?>
					     <div class="form-group col-lg-4" >
                      	<label class="col-lg-12">Agency Commision</label>
                        <input class="col-lg-8 form-control" value="" name="agency" id="agency" readonly="">
                      </div>
					  <?php } ?>
					  
					  
					    <div class="form-group col-lg-4" id="offline_tax">
                      	<label class="col-lg-12">Tax</label>
                        <input class="col-lg-8 form-control" value="" name="tax" id="tax" readonly="">
                      </div>
					  
                        
						 <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Net Amount</label>
                        <input class="col-lg-8 form-control" value="" name="net_amount" id="net_amount" readonly="" placeholder="Numbers only">
                       
                      </div>
					  
                       </div>
                      
                      <div class="form-group ">
                      	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="room_sub" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                        </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
     
              </div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row --> 

