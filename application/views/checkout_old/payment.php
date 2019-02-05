 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website </title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">
</head>

<body>
	<?php   $this->load->view('layout/header');   ?>
	
	
	<div id="page-wrapper">
		<div class="container">
			<div class="check_out-cus=block">
				<h1 class="chk_title-cus">checkout  </h1>
				
			
						<div class="content_checkout content_checkout_2">
			<div class="">
				<h1 class="section2_chk_cus_block">Section 2 </h1>
				<div class="room_all_details_before_chkout">
					
					<div class="col-md-12">
					<div class="col-md-4 room_sec_chk_bf">
						<div  class="room_name_title_b_chk"><h4><?php echo $details->title;?> </h4>
						<span class="star-rating"> 
						 <?php for($i=1;$i<=$details->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$details->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
								</span>

								<p class="room_name_title_b_chk_sub_title"><?php echo $details->place;?>,  <?php echo $details->district;?> , <?php echo $details->state;?></p></div>
						
						</div>
						<?php
									
				 		
						$check_in_time=strtotime($check_in); 
						$in_month=date("M",$check_in_time);
						$in_year=date("Y",$check_in_time);
						$in_date=date("d",$check_in_time);
						$in_day = date("D",$check_in_time);
											 
						$check_out_time=strtotime($check_out);
						$out_month=date("M",$check_out_time);
						$out_year=date("Y",$check_out_time);
						$out_date=date("d",$check_out_time);
						$out_day = date("D",$check_out_time);
						
						 $diff = abs(strtotime($check_out) - strtotime($check_in)); 
						 $years   = floor($diff / (365*60*60*24)); 
						 $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
						 $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						
					?>
						
						
						
					<div class="col-md-4"> 
						<div class="chk_details_chk_b col-md-5">
							<div class="chk_in_details_block mar_chk_b">
					<span class="cls1">Check-In</span>

<span class="date"><i class="fa fa-calendar"></i><?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?></span>

<!---<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span> --->
					
					
					</div>
							
						</div>
						<div class="col-md-1">
						
						<i class="fa fa-arrow-circle-o-right"></i>
						
						</div>
						
							<div class="chk_details_chk_b col-md-5">
							<div class="chk_in_details_block mar_chk_b">
					<span class="cls1">Check-Out</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $out_day.",&nbsp;".$out_date. "&nbsp;". $out_month. "&nbsp;" .$out_year;?></span>

<!--<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span> -->
					
					
					</div>
						</div>
						
						</div>
						
						
						
					<div class="col-md-2">
						
						<div class="number_of_travellers_cus">
							
							<p class="adults_b_chk">1 Room(s)</p>
							<p class="adults_b_chk">1 Traveller(s)  </p>
							
							</div>
						
					</div>
					
					
					<?php
					
					
					 $count = count(array_filter($ck_data));
							 $key = array_keys(array_filter($ck_data));
							 $total_amount='';
						for($i=0; $i<$count; $i++)
						{
							  $j=$key[$i];
							  $ck_value = $ck_data[$j];
							  $explode_value=explode('|',$ck_value);
							  $num_room=$explode_value[0];
							  $rooms = $explode_value[1];
							if($category=='hotel')
							{
								$room_detail = $this->Checkout_model->roombyid($rooms);
							}
							else
							{
								$room_detail = $this->Checkout_model->Package_roombyId($rooms); 
							}	 
							
							
							
										if(!empty($room_detail))
										{
										$room_price =  $room_detail[0]->price;
										$offer_percentage= $this->Room_detail_model->hotelofferById($hotel_id);
										$agency_rate=$this->Room_detail_model->hotelAgencyById($hotel_id);
										$agency_commission=$this->Room_detail_model->hotelAgencyCommissionById($hotel_id);
																				
										  $room_amounts = $room_price;
										
										 ////////offer price calculation/////////////
										 
										 if(!empty($offer_percentage))
										 {
											  $offer_percentage[0]->offer;
										 	 $room_amounts = $room_amounts - (($room_amounts* $offer_percentage[0]->offer)/100);
										 }	
										 		
										/////////agency price calculation ////////
																	
										 if(!empty($agency_rate))
										 {
											 
										 	$tariff =  $agency_rate[0]->room_tariff;
											$last_string =  substr($tariff,-1);
											if($last_string=='%')
											{
												 $room_amounts = $room_amounts - ($room_amounts*$tariff)/100;
											}
											else
											{
												$room_amounts = $room_amounts -  $tariff;
											}
											
										 }																	 
										////////commision calculation///////
										if(!empty($agency_commission))
										{
											
										$room_amounts = $room_amounts+ $agency_commission[0]->commision;
										}
										
										$each_room_price=$room_amounts;
										}
										
										 $total_amount+= round($each_room_price)*$days*$num_room;
									
						}
								$room_tax_amounts='';
									if($category=='hotel')
									{
										
										if($room_detail[0]->tax_applicable==0)
										{
											
										 	$tax = $this->Room_detail_model->tax_amount_off($details->hotel_id);
											
											$t_amount='';
											foreach($tax as $tax_amount)
											{
												 $t_amount+=$tax_amount->tax_amount;
											}
											
											 $room_tax_amounts = ($total_amount*$t_amount)/100;
										 }
										 else
										 {
											
											 $tax = $this->Room_detail_model->tax_amount($details->hotel_id);
										     $t_amount='';
											 foreach($tax as $tax_amount)
											 {
												$t_amount+=$tax_amount->tax_amount;
											 }
											 
											   $room_tax_amounts = ($total_amount*$t_amount)/100;
										 } 
									}
								
					?>
		<div class="col-md-2 ">
						
						<div class="number_of_travellers_cus right_grand_total">
							
							<p class="grand-total_red">Grand total </p>
							<p class="grand-total_cus_red">
							<?php
							if($category=='hotel'){?>
							<i class="fa fa-rupee"></i> 
							<?php }else
							{?><i class="fa fa-euro"></i>
							<?php 	} 	
						echo round($total_amount+$room_tax_amounts);?></p>
							
							</div>
						
					</div>
					
					
					</div>
											<div class="col-md-12">
							
							<div class="food_plan_block ">
							<h2 class="chk_food_plan">Room Details <!---: <span class="rom_type_cus_title"> 5 Star Hotel</span>--></h2>
								<div class="room-chk_cus_block1">
								
								
									<div class="chk_t">							
<table >
  <thead>
    <tr>
								
								
									 <th>Room</th>
									 <th>Facilities</th>
									 <th>No.Of Rooms</th>
									 <th>GUEST/ROOM</th>
									 <th>PRICE/ROOM/NIGHT</th>
									 <th>Night(s)</th>
									 <th>Total Price</th>
  </tr>
  </thead>


								
							  <tbody>
										
								<?php
							
								for($i=0; $i<$count; $i++)
								{
									 $j=$key[$i];
									  $ck_value = $ck_data[$j];
									 $explode_value=explode('|',$ck_value);
									 $num_room=$explode_value[0];
									  $rooms = $explode_value[1];
									 
									if($category=='hotel')
									 {
									 $room_detail = $this->Checkout_model->roombyid($rooms);
									 }
									 else
									 {
										$room_detail = $this->Checkout_model->Package_roombyId($rooms); 
									 }	 
									  $fac_room = $this->Room_detail_model->facilitiesById($room_detail[0]->room_id);
									 if(!empty($room_detail))
										{
										$room_price =  $room_detail[0]->price;
										$offer_percentage= $this->Room_detail_model->hotelofferById($hotel_id);
										$agency_rate=$this->Room_detail_model->hotelAgencyById($hotel_id);
										$agency_commission=$this->Room_detail_model->hotelAgencyCommissionById($hotel_id);
																				
										  $room_amounts = $room_price;
										
										 ////////offer price calculation/////////////
										 
										 if(!empty($offer_percentage))
										 {
											  $offer_percentage[0]->offer;
										 	 $room_amounts = $room_amounts - (($room_amounts* $offer_percentage[0]->offer)/100);
										 }	
										 		
										/////////agency price calculation ////////
																	
										 if(!empty($agency_rate))
										 {
											 
										 	$tariff =  $agency_rate[0]->room_tariff;
											$last_string =  substr($tariff,-1);
											if($last_string=='%')
											{
												 $room_amounts = $room_amounts - ($room_amounts*$tariff)/100;
											}
											else
											{
												$room_amounts = $room_amounts -  $tariff;
											}
											
										 }																	 
										////////commision calculation///////
										if(!empty($agency_commission))
										{
											
										$room_amounts = $room_amounts+ $agency_commission[0]->commision;
										}
										
										$each_room_price=round($room_amounts);
										}
									
								
								?>
									
							
								<tr class="room-chk_cus_block2  ">
										<td data-label="Room"><?php echo $room_detail[0]->room_title;?></td>
											<td data-label="Room type">
								<?php if(!empty($fac_room->free_wifi)) {?>
				 <span data-tooltip="Free WIFI"> <i class="fa fa-wifi"></i> </span> <br/>
				 <?php } ?>
				 <?php if(!empty($fac_room->breakfast)) {?>
					<span class="room_faci" data-tooltip="Breakfast included"><i class="fa fa-cutlery"></i></span>  
					 <?php } ?>
								</td>
										<td data-label="Guest"> <?php echo $num_room;?></td>
										<td data-label="Price/Night">
									<i class="fa fa-user"></i> <?php echo $room_detail[0]->normal_allowed_adults;?>
									</td>
										<td data-label="Extras">
										<?php
										if($category=='hotel'){?>
										<i class="fa fa-rupee"></i> 
										<?php }else
										{?><i class="fa fa-euro"></i>
										<?php 	}  echo $each_room_price;?>
									    </td>
							
										<td data-label="Night(s)"><?php echo  $days;?></td>
										<td data-label="Total Price">
										<?php
										if($category=='hotel'){?>
										<i class="fa fa-rupee"></i> 
										<?php }else
										{?><i class="fa fa-euro"></i>
										<?php 	} echo $each_room_price*$days*$num_room;?></td>

							</tr>
								
								<?php
								}
									
								?>
										
										
									<?php
									if($category=='hotel')
									{?>
												<tr class="room-chk_cus_block3 ">
								
							<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label="">
										taxes & service fee - <?php echo $t_amount;?>%
										</td>
										<td data-label="" class=" clr_green_cus">
									
										<i class="fa fa-rupee"></i>  <?php echo $room_tax_amounts;?> </td>

	</tr><?php 
									}?>										
					

								
						
								
								
										<tr class="room-chk_cus_block4  ">
										
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label="" class=" grand-total_red">Grand Total</td>
								<td data-label="" class="  grand-total_red"><i class="fa fa-rupee"></i> <?php echo round($total_amount+$room_tax_amounts);?></td>

</tr>


										  </tbody>
</table>

								
								</div>					
							
								
								
											<div class="col-md-12 form_block_cus7">
				
				<h2 class="user_title_cus user_title_cus_2">User Details</h2>				
				
				<form method="post" action="<?php echo base_url();?>checkout/success?<?php $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);  echo $ckt_url[1];?>" name="payment_form" id="payment_form">
				<!--<form  id="payment_form" method="post" action="<?php echo base_url();?>checkout/success?<?php $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);  echo $ckt_url[1];?>">-->
					
					<h2 class="user_title_cus">Primary User Details</h2>		
					<div class="form-group col-lg-6">
                        <label class="col-lg-4">First Name</label>
                        <input name="first_name" id="first_name" class="col-lg-8 form-control " value="<?php echo $user_details[0]->first_name;?>">
                      	<div class="err" id="news_ltr"></div>
					  </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Last Name</label>
                        <input name="last_name" class="col-lg-8 form-control " value="<?php echo $user_details[0]->last_name;?>">
                      </div>
                      
                      <h2 class="user_title_cus">Contact Details </h2>	
                      <p class="user_notes_cus">Your voucher and booking details shall be sent on the below email address and mobile number</p>	 
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Email ID</label>
						<input type="text" class="col-lg-8 form-control " name="email" id="email" placeholder="Enter you email Id" value="<?php echo $user_details[0]->email;?>">
								   	<div class="err" id="news_ltr"></div>
                        
                      </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Phone Number</label>
                        <input name="phone" class="col-lg-8 form-control " value="<?php echo $user_details[0]->phone;?>">
						<div class="err" id="news_ltr"></div>
                      </div>
                        	<div class="form-group col-lg-12">
                        
                        <input name="booking" type="checkbox" class=" "> I am booking for myself
                      </div>
                     <br> <br>
                     <div class=" form-group col-lg-12">
					
								 
								 
								<!--<p class=" login_continue_chk b_chk_continue "><a href="<?php echo base_url();?>">
							 Continue to Check Out</a></p>-->
							 
							 <button type="submit" class=" btn btn-primary" id="payment_id">Continue to check out</button>
								
							

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
	
		<?php   $this->load->view('layout/footer');   ?>
		
		
	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>

</body>

</html> 