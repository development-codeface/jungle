<div id="page-wrapper" class="user_details_cus_block user_details_cus_block_column_2">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Booking Detail View
                        </h1>
                        
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li> 
                              <li class="">
                                <!-- <i class="fa fa-fw fa-table"></i>  --><a href="<?php echo base_url();?>booking">Booking List </a>
                            </li>
                          
                             <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->Booking detail view
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
		<?php
	 
		 $diff = abs(strtotime($results[0]->check_out) - strtotime($results[0]->check_in)); 
		 $years   = floor($diff / (365*60*60*24)); 
		 $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		 $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		 
		 
		 ?>

				
				 
				<div class="row">
					
					

                    <div class="col-lg-12 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <i class="fa fa-clock-o fa-fw"></i> Booking Detail View
                               <span class="ch_in_cus_and_chk_out_cus pull-right" style="width:42%;"> Check-in Date : <b><?php echo date_format(date_create_from_format('Y-m-d',$results[0]->check_in), 'd/m/Y');?> </b> Check-out : <b><?php echo date_format(date_create_from_format('Y-m-d',$results[0]->check_out), 'd/m/Y');?></b>  </span>
                            </div>
                            <div class="panel-body">
                                
                                 <div class="col-md-12 space_cus_user_details">
                               	
		                            <div class=" cus_user_block2">
		                            	
		                            		<div class="row well box_border ">
			                            		<div class="col-lg-12 user_details_label ">
				                            		<h4 class="page-header cus_header  kre" style="margin : 0px;">
								                    <label><?php //echo $result['package_data'][0]->title;?> <span class="bncus">Booking No:</span> <span class="bncusn"><?php echo $results[0]->booking_number;?></span></label>
														
														<a class="btn btn-success pull-right" href="<?php echo base_url() . 'booking/room_interchange/'.$results[0]->booking_number; ?>" 
														onclick="javascript&#58;window.open(this.href, this.target, 'width=500,height=500,screenX=400,screenY=100,resizable,scrollbars');return false;">
														Room Interchange</a>
														
														<a class="btn btn-success pull-right" onclick="return cancelConfirm()" href="<?php echo base_url() . 'booking/cancel/'.$results[0]->booking_number; ?>">
														Cancel</a>
														 </h4>	
													
													
								                </div> 
												
												
												<div class="row">
												<div class="col-lg-1">
												</div>
												
				                    <div class="col-lg-10" id="msg_div">
				                       
				                    </div>
									
				                </div>
											 <div class="form-group col-lg-2">
											</div>
												                	
		              <div class="form-group col-lg-3">
                        <label class="col-lg-12">Check-in</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="check_in" id="check_in" value="<?php echo date_format(date_create_from_format('Y-m-d',$results[0]->check_in), 'd-m-Y');?>" >
                        </span>
                       
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-12">Check-out</label>
                        <span id="sandbox-container4">
                        <input class="col-lg-8 form-control " name="check_out" id="check_out" value="<?php echo date_format(date_create_from_format('Y-m-d',$results[0]->check_out), 'd-m-Y');?>">
                        </span>
                      </div>
					  <input type="hidden" name="offline_user" value="<?php echo $results[0]->offline_user;?>" id="offline_user"/>
					   <input type="hidden" name="cat" value="<?php echo $results[0]->category;?>" id="cat"/>
					  <input type="hidden" name="book_num" id="book_num" value="<?php echo $results[0]->booking_number;?>"/>
					   <div class="form-group col-lg-3">
					    <label class="col-lg-12">&nbsp;</label>
                       <input type="button" name="" class="col-md-6 btn btn-success" value="Update" onclick="booking_date_change();" />
												
                        
                      </div>
					  
					   <div class="form-group col-lg-2">
											</div>
					  
					  
											
												
 			                            		<div class="list-group col-md-4 col-sm-4   col-xs-4">	
			                            	<br/>
						                         	  	<div class="col-md-12">  
													<div class="guest_detailsb"> 														
													<label class="pyt">User Details</label>																
				                            		<div class="col-lg-12">
				                            			<div class="col-lg-4">Name </div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" style="word-wrap:break-word;"><?php echo $results[0]->first_name;?></div>
						                             
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Address</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" style="word-wrap:break-word;"><?php echo $results[0]->address;?></div>
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Contact</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" style="word-wrap:break-word;"><?php echo $results[0]->phone;?></div>
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Email</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" style="word-wrap:break-word;"><?php echo $results[0]->email;?></div>
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Country</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" style="word-wrap:break-word;"><?php echo $results[0]->country;?></div>
</div>
				                            		</div>
													</div>
													</div>
													
															
			                            		<div class="list-group col-md-4 col-sm-4   col-xs-4">	
			                            		<br/>
						                         	  	<div class="col-md-12"> 
						                         	  	<div class="guest_detailsb"> 
														<label class="pyt">Guest Details</label>														
				                            		<div class="col-lg-12">
				                            			<div class="col-lg-4">Name </div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" ><input type="text" name="g_name" id="g_name" class="form-control" value="<?php echo $results[0]->guest;?>" /><?php //echo $results[0]->guest;?></div>
						                             
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Contact</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" ><input type="text" name="g_phone" id="g_phone" class="form-control" value="<?php echo $results[0]->guest_phone;?>" /><?php //echo $results[0]->guest_phone;?></div>
				                            		</div>
				                            		<div class="col-lg-12">
						                             <div class="col-lg-4">Email</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-6" ><input type="text" name="g_mail" id="g_mail" class="form-control" value="<?php echo $results[0]->guest_email;?>" />
														
														<input type="hidden" name="g_id" id="g_id" value="<?php echo $results[0]->booking_number;?>" />
														
														
														<?php //echo $results[0]->guest_email;?></div>
				                            		</div>
													<div class="col-lg-7">
													<input class="btn btn-success pull-right g_update" id="" value="Update" type="button">
</div>													
				                            		
													</div>
													</div>
													
													</div>
													
													
													
				                            		<div class="col-md-4 col-sm-4   col-xs-4   kh_i pull-right user_details_block_cus_booking_page">
				                            		<br/>
				                            		<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Type</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b><?php echo $results[0]->category ; ?> </b></div>
				                            		</div>
				                            		<?php
				                            		if(!empty($results[0]->agency)) {?>
				                            		<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Booked Via</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b><?php echo $results[0]->agency ; ?> (Offline)</b></div>
				                            		</div>
				                            		<?php 
													$payment = $results[0]->advance+$results[0]->payment;
													}
													else {
													
													if($results[0]->reservation==1) {?>
													<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Booked Via</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b>Hotel (booking engine)</b></div>
				                            		</div>
													<?php 
													$payment = $results[0]->advance+$results[0]->payment;
													}
													
															else if(empty($results[0]->agency) && $results[0]->offline_user!=0)
															{?>
																<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Booked Via</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b>Direct Booking</b></div>
				                            		</div>
																<?php
																$payment = $results[0]->advance+$results[0]->payment;
															} else
															{?>
															<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Booked Via</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b>bookingwings.com, online</b></div>
				                            		</div>
														
													<?php $payment = $results[0]->payment; }} ?>
			                            		
			                            		
			                            		<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Status</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b><?php if($results[0]->status=='0') { echo "Room Blocked"; } else { echo "Room Reserved" ;}?></b></div>
				                            		</div>
			                            			
			                            			<?php if($results[0]->status=='1' && $results[0]->offline_user!=0):?>
			                            				
			                            				<div class="col-lg-12 booking_details_cus">
						                             <div class="col-lg-5">Amount Payed</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-5"><b><?php echo $payment = $results[0]->advance+$results[0]->payment;?></b></div>
				                            		</div>
				                            		
			                            				<?php  endif;?>
				                            			
				                            			</div>	
		                            		</div>
		                            	</div>
                                
                                
                                <?php 
                                $total_amount=0;
								$j=1;
								
								//print_r($results);
                                foreach($results as $result):
					//print_r($result);				
									
									?>
                                	<div class="">
		                            		<div class="row well box_border ">
			                            		<div class="col-lg-12 user_details_label ">
				                            	
								                </div> 
								               	<div class="list-group col-md-10 col-sm-9   col-xs-9">	
			                            			<div class="col-lg-10">
													<div class="guest_detailsb">
													
								                    	<label class="pyt"><?php echo $result->room_title;?></label>
								                    	
				                            		
				                            		
				                            		
				                            		
				                            		<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">No. of Rooms</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $result->number_of_rooms;?></div>
							                      		
							                      		
				                            		</div>
				                            		
				                            				
				                            		<div class="col-lg-6 space_cus_user_details">
						                           
							                      		
							                      		 <div class="col-lg-6">Allowed Occupancy</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
														<?php if($result->normal_allowed_adults != 0 && $result->normal_allowed_kids != 0) { ?>
							                      		<div class="col-lg-5">(<?php echo $result->normal_allowed_adults.'<i class="fa fa-male"></i>+'.$result->normal_allowed_kids.'<i class="fa fa-child"></i>';?>) each room</div>
														<?php } else if($result->normal_allowed_adults != 0) { ?>
														<div class="col-lg-4"><?php echo $result->normal_allowed_adults.' <i class="fa fa-male"></i>';?>) each room</div>
														<?php } ?>
				                            		</div>
				                            		
				                            		<?php if($result->normal_allowed_kids != 0 && $result->child_rate != 0  && $result->offline_user != 0) {$upd_flag=1;
				                            		?>
				                            			<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">No. of children</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-md-4"><input name="ex_kid" id="ex_kid<?php echo $result->booking_id; ?>" onkeyup="extrakid(<?php echo $result->booking_id; ?>)" class="form-control" value="<?php echo $result->number_of_childrens;?>" type="text"></div>
							                      		
							                      		
				                            		</div>
				                            		<?php if(!empty($result->number_of_childrens)){?>
				                            		 <div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">Child Rate</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $result->child_rate; ?></div>
				                            		</div>
				                            		
				                            		<?php
													}
													$extra_child_rate = $result->child_rate*$result->number_of_childrens;
													}
													else
													{
														?>
													
				                            		<!--<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">No. of children</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-md-4"><input name="ex_kid" id="ex_kid<?php echo $result->booking_id; ?>" onkeyup="extrakid(<?php echo $result->booking_id; ?>)" class="form-control" value="0" type="text"></div>
							                      		
							                      		
				                            		</div>-->
													<?php
														$extra_child_rate ='';
													}
													?>
													
													<input name="ex_kid_hid" id="ex_kid_hid<?php echo $result->booking_id * count($results); ?>" class="form-control" value="<?php echo $result->normal_allowed_kids;?>" type="hidden">
													
													
													<input name="ex_bed_hid" id="ex_bed_hid<?php echo $result->booking_id * count($results); ?>" class="form-control" value="<?php echo $result->no_of_bed;?>" type="hidden">
													
													<?php if(!empty($result->no_of_bed) && !empty($result->bed_rate) && $result->offline_user != 0){
													$upd_flag=1;
													?>
				                            			<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">Extra Bed</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-md-4"><input name="ex_bed" id="ex_bed<?php echo $result->booking_id;?>" onkeyup="extrabed(<?php echo $result->booking_id; ?>)" class="form-control" value="<?php if($result->extra_bed) { echo $result->extra_bed; } else { echo '0'; }?>" type="text"></div>
							                      		
							                      		
				                            		</div>
				                            		<?php if(!empty($result->extra_bed)){?>
				                            		  			<div class="col-lg-6 space_cus_user_details">
						                         
							                      		
							                      		 <div class="col-lg-6">Extra Bed Rate</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $result->bed_rate; ?></div>
				                            		</div>
				                            		
				                            		<?php
													}
													$extr_bed_rate = $result->bed_rate*$result->extra_bed;
													}
													else
													{
													?>
													<!--<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">Extra Bed</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-md-4"><input name="ex_bed" id="ex_bed<?php echo $result->booking_id;?>" onkeyup="extrabed(<?php echo $result->booking_id; ?>)" class="form-control" value="0" type="text"></div>
														
														
							                      		
							                      		
				                            		</div>-->
													<?php
														$extr_bed_rate = $result->bed_rate*$result->extra_bed;
													}
													?>
				                            		
				                            		<div class="col-lg-6 space_cus_user_details">
						                             <div class="col-lg-6">Price/Room</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $result->room_rate; ?></div>
				                            		
				                            		</div>
													<div class="col-lg-7">
													<?php
												$this -> db -> select('room_id');
												$this -> db -> from('tbl_booking');
												$this -> db -> where('id', $result->booking_id);
												$query = $this -> db -> get();
												$res = $query -> row();
												//print_r($res->room_id);
												//$room_num=$this->Bookingmodel->book_no($result->booking_id);
													//$room_num=$this->Bookingmodel->book_no($result->booking_id);
													?>
													
												<?php //echo $result->room_id; ?>
													<input name="bookid" id="bookid" class="form-control" value="<?php echo $result->booking_id;?>" type="hidden">
													
												<input type="hidden" value="<?php echo $res->room_id; ?>" id="room_id"/>
												<?php if(!empty($upd_flag)) { ?>
													<input class="btn btn-success pull-right ex_update"  value="Update" type="button" onclick="booking(<?php echo $result->booking_id; ?>)">
													<?php } ?>
				                            		</div>
														</div>
														<?php if(!empty($result->wifi) && !empty($result->breakfast)) { ?>
														<div class="amount_section_cus_block">
														<p>Free Wifi & Breakfast included</p>
														</div>
														<?php } else if(!empty($result->wifi)) { ?>
														<div class="amount_section_cus_block">
														<p>Free Wifi included</p>
														</div>
														<?php } else if(!empty($result->breakfast)) { ?>
														<div class="amount_section_cus_block">
														<p>Breakfast included</p>
														</div>
														<?php } ?>
				                            		</div>
				                            		
				                            					<div class="col-lg-12">
				                            		<?php
				                            		
													$amount= $days*(($result->room_rate*$result->number_of_rooms) + $extr_bed_rate + $extra_child_rate);
				                            		?>
				                            		 <div class="col-lg-6 amount_cus_block_user_details"><label>Amount : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo ($amount) ;?></label></div>
				                            		</div>
				                            		
				                            		
			                            		</div>
			                            	
			                            	
											
											

											
											<div class="col-md-2 col-sm-3   kh_i">
	  											<?php
								$rooms =$this->Bookingmodel->room_numbers($id,$result->room_id,$results[0]->check_in,$results[0]->check_out);
					$room_check = '';			
			foreach($rooms as $roomnumber){
		$avail_rooms =$this->Bookingmodel->available_room_numbers($results[0]->check_in,$results[0]->check_out,$id,$result->room_id,$roomnumber->id);
		$room_check += $avail_rooms;
			}
								
								
	  											$room_number=$this->Bookingmodel->booking_room_number($result->booking_id);
	  											
												$i=1;
				                            	foreach($room_number as $booking_rooms)
				                            	{ $check_user_checkin = $this->Bookingmodel->check_user_checkin($booking_rooms->booking_room_id);
													
												 ?>    	
						                      	<div class="custom_form custom_form_cus_block7 col-md-12">
						                    	<h3 class="room_title_cus_form_block lp col-md-6  rom_n">Room <?php echo $i;?></h3>
						                    	<div class="form-group cus_input_user_details_section">
								                  </div>    
								                     <div class="form-group  cus_input_user_details_section col-md-6">
								                     	 
						                       <input value="<?php echo $booking_rooms->room_number;?>" name="room_number" class="col-lg-12 form-control " readonly>
											   
											   <?php if(count($results) > 1 || count($room_number) > 1) {?>
											   <a class="admin_delete_btn" href="<?php echo base_url().'booking/del_room/'.$result->booking_id.'/'.$booking_rooms->room_id; ?>" onclick="return confirmationDelete();"><i class="fa fa-fw fa-trash"></i></a>
											   <?php } ?>
						                      </div>
											  
			                            		</div>
										
										   
			                            		<?php
			                            		$i++;
			                            		}
			                            		if($room_check != count($rooms)) {
			                            		?>
		                            		       <a class="btn btn-success" href="<?php echo base_url().'booking/add_room/'.$result->booking_number.'/'.$result->room_id.'/'.$result->set_id; ?>" onclick="javascript:window.open(this.href, this.target, 'width=500,height=500,screenX=400,screenY=100,resizable,scrollbars');return false;">Add room</a>
		                            		       
		                            		       <?php } ?>

				                            </div>
											
											
											
											
											
											
											
											
														
			                            
		                            		</div>
		                            </div>
		                            
		                            
		                            <?php
		                            $total_amount += $amount;
									$j++;
									endforeach;
									?>
		                            
		                            
									
									<?php
									$foodplan = $this->Bookingmodel->food_plan($result->booking_number);
									if(!empty($foodplan))
									{
									?>
									
									
									   <div class="">
		                            		<div class="row well box_border ">
			                            		<div class="col-lg-12 user_details_label ">
				                            		
								                </div> 
								               	<div class="list-group">	
			                            				<div class="col-lg-8">
															<div class="guest_detailsb">
																<label class="pyt">Food Plan</label>
															
													<div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">No. of Days</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->no_of_days;?></div>
				                            		</div>
													
													
						                        	<div class="col-lg-6 space_cus_user_details">
														<div class="col-lg-6">No. of Persons</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->no_of_person;?></div>
				                            		</div>
				                            		<?php
													if(!empty($foodplan[0]->breakfast))
													{?>
				                            		<div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">Breakfast</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->breakfast;?></div>
				                            		</div>
													<?php
													}
													if(!empty($foodplan[0]->lunch))
													{?>
				                            		<div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">Lunch</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->lunch;?></div>
				                            		</div>
													<?php
													}
													if(!empty($foodplan[0]->dinner))
													{?>
				                            		<div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">Dinner</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->dinner;?></div>
				                            		</div>
													<?php
													}
													if(!empty($foodplan[0]->all))
													{?>
				                            		<div class="col-lg-6 space_cus_user_details">
							                      		 <div class="col-lg-6">All Meals</div>
				                            			<div class="col-lg-1 cus_column_block"> :</div>
							                      		<div class="col-lg-2"><?php echo $foodplan[0]->all;?></div>
				                            		</div>
													<?php
													}?>
													</div>
													</div>
													
				                            		<div class="col-lg-12">
				                            		 <div class="col-lg-6 amount_cus_block_user_details"><label>Amount : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo ($foodplan[0]->amount) ;?></label></div>
				                            		</div>
													
			                            		</div>
			                            		
			                            		
			                            		
			                            			<div class="col-md-12 ">
				                            			</div>
			                     
			                            		
		                            		</div>
		                            </div>
		                            
									
									<?php
									$total_amount = $total_amount + $foodplan[0]->amount; 
									}
									?>
									
									
									
		                            
		                            
		                            
		                            <div class="">
		                            		<div class="row well box_border box_border7">
			                            		<div class="col-lg-12 user_details_label ">
				                            		<h4 class="page-header  cus_header" style="margin : 0px;">
								                    	<label>Total Price</label>
								                    </h4>
								                </div> 
												
											<div class=" col-md-12 ">
													<div class=" col-md-12 amount_section_cus_block extra_dff">
													<?php if($results[0]->arrival<>''){?>
													<b>Arrival Time</b> : <span>  <?php echo $results[0]->arrival;?> </span><br><?php }?>
				                            		<?php if($results[0]->pickup<>''){?>
													<b>Pick Up Option</b> : <span>  <?php echo $results[0]->pickup;?> </span><br><?php }?>
				                            		<?php if($results[0]->request<>''){?>  
													<b>Special Request</b> : <span><?php echo $results[0]->request;?>	</span>	<?php }?>		                            				</div></div>
												
								               	<div class="list-group col-md-6">	
			                            			<?php
													if(!empty($result->tax))
													{?>
			                            			
													
													<div class="col-lg-12 klm">
													<div class="col-lg-4">
													
													<label>Tax : <?php echo $result->tax;?></label> 
													
													</div>
													</div>
													
													<?php $total_amount = $total_amount + $result->tax;
													}
													?>
													
													<?php
													if(!empty($results[0]->agency) || !empty($results[0]->offline_user))
													{
													if(!empty($result->commision))
													{?>
													<div class=" col-lg-12">
													
													<div class="col-lg-4"><label>Agency discount rate : <?php echo $result->commision;?></label> </div></div>
													
													<?php $total_amount = $total_amount - $result->commision;
													}
													}
													?>
													
				                            		<div class="col-lg-12 ">
				                            			<div class="col-lg-12 total_amount_label_cus  jh_f"><h3 class="total_amount_label_cus_h3"><label>Net Price : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo round($total_amount);?></label> </h3></div>
						                          
				                            		</div>
											
														<div class=" col-md-12 ">
													 <div class=" col-md-12 amount_section_cus_block">
				                            				<b>You need to ensure the following :</b>	
				                            					<p>Please do not disclose our rate to guest	</p>
																</div>
														</div>
													
				                            		
			                            		</div>
			                            		
			                            		
			                            		
			                            		<?php
			                            		if($result->status=='0' || $result->status=='1' ):
												
												$total_price = round($total_amount-$result->discount);
												if($total_price <= $payment)
												{
												}
												else
												{
			                            		?>
			                            			<div class="col-md-6 ">
														
				                            	<div class="col-lg-12 ">
				                            			
														<?php if(!empty($result->discount)){?>
				                            			<div class="col-lg-12 total_amount_label_cus"><label>Discount : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo ($result->discount);?></label> </div>
														<?php 
														}
														if(!empty($result->payment) || !empty($result->advance))
														{?>
															<div class="col-lg-12 total_amount_label_cus"><label>Amount payed : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo ($result->payment+$result->advance);?></label> </div>
														<?php
															
														}
														
														if(!empty($results[0]->agency) || $results[0]->offline_user!=0)
														{
														if(($result->payment+$result->advance)!= round($result->total_amount))
														{?>
															<div class="col-lg-12 total_amount_label_cus"><label>Balance : <?php if($result -> package_id == 0) echo '<i class="fa fa-inr"></i> '; else echo '<i class="fa fa-euro"></i> '; echo (round($result->total_amount) - ($result->payment+$result->advance)) ;?></label> </div> 
														<?php }
														}
															?>
														<!--<div class="col-lg-12 total_amount_label_cus"><label>Amount payed : Rs. &nbsp;<?php echo ($result->advance);?></label> </div>
														<div class="col-lg-12 total_amount_label_cus"><label>Amount payed : Rs. &nbsp;<?php echo ($result->payment);?></label> </div>-->
						                          
				                            		</div>
				                            	   
				                            		<form class='checkin_form fgh'	>
				                            			
				                            			<input type="hidden" name="booking_number" id="booking_number" value="<?php echo $result->booking_number;?>" />
				                            			
				                            			
						                    	<div class="custom_form custom_form_cus_block7 col-md-8 pull-right">
						                    	<h3 class="room_title_cus_form_block">Amount / Voucher Number</h3>
								              
						                      <div class="form-group col-lg-8">
						                       <input placeholder="Voucher" name="voucher" id="voucher" value=""   class="col-lg-8 form-control ">
						                      </div>
											  
											<div class="form-group col-lg-8">
						                      <label class="">OR</label>
						                      </div>
											  
											   <div class="form-group col-lg-8">
						                       <input placeholder="Amount" name="advance" id="advance" value="" onkeypress="return onlyNumbers(event)"  class="col-lg-8 form-control ">
						                      </div>
											  
											    
						                     <div class="form-group  col-lg-4 cus_user_details_btn">
										      <button name="room_sub" class="btn cus-btn btn-primary" type="button" id="" onclick="advance_amount();">Submit</button>
										  
											    </div>
			                            		</div>
			                            		</form>
			                            	
				                            			</div>
			                            		
			                            	<?php 
												}endif;?>
			                            		
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