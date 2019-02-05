 <!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>

</head>


<body>

		<?php   $this->load->view('layout/header');   ?>
	
	
	
	
	<?php 
	$veh_price='';
	if(!empty($veh))
	{
	for($i=0;$i<count($veh);$i++)
	{
		$vid =  $veh[$i];
		$this->db->select('*');
		$this->db->where('id',$vid);
		$query = $this->db->get('tbl_package_vehicle');
		$res = $query->row();
		$veh_price+=$res->price;
	}
	}
	
							$seasonal = $this->Packages_model->get_price($details->id);
							if(!empty($seasonal)):
							$two_star =  json_decode($seasonal[0]->seasonal_two_star);
							$three_star = json_decode($seasonal[0]->seasonal_three_star);
							$four_star =  json_decode($seasonal[0]->seasonal_four_star);
							$five_star =  json_decode($seasonal[0]->seasonal_five_star);
							endif;
							
							$off_seasonal = $this->Packages_model->get_price_off($details->id);
							if(!empty($off_seasonal)):
							$two_star =  json_decode($off_seasonal[0]->off_seasonal_two_star);
							$three_star =  json_decode($off_seasonal[0]->off_seasonal_three_star);
							$four_star =  json_decode($off_seasonal[0]->off_seasonal_four_star);
							$five_star =  json_decode($off_seasonal[0]->off_seasonal_five_star);
							
							endif;
							
							
							function small_price($value)
							{
								$filter_array= array_filter(func_get_args());
								
								if(!empty($filter_array))
								{
								return min(array_filter(func_get_args()));
								}
								else
								{
									return 0;
								}
							//return min((func_get_args()));
							}
							$a= $two_star[0];
							$b=$three_star[0];
							$c=$four_star[0];
							$d=$five_star[0];

							$price = small_price($a,$b,$c,$d);
							if($hotel==2)
							{
								$amount = $a;
							}
							if($hotel==3)
							{
								 $amount = $b;
							}
							if($hotel==4)
							{
								$amount = $c;
							}
							if($hotel==5)
							{
								$amount = $d;
							}
							
	?>
	
	
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
						
						 $days = floor((strtotime($check_out) - strtotime($check_in))/(60*60*24));
						
					?>
						
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
						<div  class="room_name_title_b_chk"><h4><?php echo $details->title;?></h4>
							<span class="star-rating"> 
											
											</span> <p class="room_name_title_b_chk_sub_title"><?php echo $details->nights;?> Night(s), <?php echo $details->days;?> Day(s) Package</p></div>
						
						</div>
						<?php if(!empty($_REQUEST['checkin']) && !empty($_REQUEST['checkout'])){?>
					<div class="col-md-4"> 
					
						<div class="chk_details_chk_b col-md-5">
							<div class="chk_in_details_block mar_chk_b">
					<span class="cls1">Check-In</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?></span>

					
					
					</div>
						</div>
						
						<div class="col-md-1">
						
						<i class="fa fa-arrow-circle-o-right"></i>
						
						</div>
						
							<div class="chk_details_chk_b col-md-5">
							<div class="chk_in_details_block mar_chk_b">
					<span class="cls1">Check-Out</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $out_day.",&nbsp;".$out_date. "&nbsp;". $out_month. "&nbsp;" .$out_year;?></span>

					
					
					</div>
						</div>
						
						</div>
						
						<?php }?>
						
					<div class="col-md-2">
						
						<div class="number_of_travellers_cus">
							
							<!--<p class="adults_b_chk">1 Room(s)</p>-->
							<p class="adults_b_chk"><?php echo $person;?> Traveller(s)  </p>
							
							</div>
						
					</div>

		<div class="col-md-2 ">
						
						<div class="number_of_travellers_cus right_grand_total">
							
							<p class="grand-total_red">Grand total </p>
							<p class="grand-total_cus_red"><i class="fa fa-rupee"></i> <?php echo ($amount*$person)+$veh_price;?></p>
							
							</div>
						
					</div>
					
					
					</div>
											<div class="col-md-12">
							
							<div class="food_plan_block ">
						<h2 class="chk_food_plan">Booking Details <!--: <span class="rom_type_cus_title"> 5 Star Hotel</span>--></h2>
								<div class="room-chk_cus_block1">
								
								<div class="col-md-3">Hotel</div>
									<div class="col-md-1"> &nbsp;</div>
									<div class="col-md-2">Day/Night</div>
									<div class="col-md-2">No. Of Persons</div>
									<div class="col-md-2">Price/Person</div>
									<div class="col-md-2">Total Price</div>

								</div>
										
								<div class="room-chk_cus_block2 ">
								
									<div class="col-md-3"><?php if(($hotel==2)){ echo "2 star"; } if(($hotel==3)){ echo "3 Star"; } if(($hotel==4)){ echo "4 Star"; } if(($hotel==5)){ echo "5 Star"; } ?></div>
									<div class="col-md-1"> &nbsp;</div>
									<div class="col-md-2"><?php echo $details->nights;?> Night(s), <?php echo $details->days;?> Day(s) </div>
									<div class="col-md-2 person" ><?php echo $person;?></div>
									<div class="col-md-2 each_person" ><?php echo $amount;?>	</div>
									<div class="col-md-2"><i class="fa fa-rupee"></i> <span id="total"><?php echo $person * $amount;?></span></div>


								</div>
										
								<div class="room-chk_cus_block4  row">
								
								</div>
			
							
							</div>
							</div>
							
							
							

							
							<?php if(!empty($veh)){?>
							
							<div class="col-md-12">
							
							<div class="food_plan_block ">
						<h2 class="chk_food_plan">Vehicle Details <!--: <span class="rom_type_cus_title"> 5 Star Hotel</span>--></h2>
								<div class="room-chk_cus_block1">
								
								<div class="col-md-3">Vehicle Name</div>
									<div class="col-md-2"> </div>
									<div class="col-md-2">Capacity</div>
									<div class="col-md-2"></div>
									<div class="col-md-1"></div>
									<div class="col-md-2">Total Price</div>

								</div>
										
								<div class="room-chk_cus_block2 ">
								<?php
								$veh_price='';
								for($i=0;$i<count($veh);$i++){
									$vid =  $veh[$i];
									$this->db->select('*');
									$this->db->where('id',$vid);
									$query = $this->db->get('tbl_package_vehicle');
									$res = $query->row();
									?>
									<div class="col-md-3"><?php echo $res->vehicle_name;?></div>
									<div class="col-md-2"> </div>
									<div class="col-md-2"><?php echo $res->capacity;?></div>
									<div class="col-md-2"></div>
									<div class="col-md-1"></div>
									<div class="col-md-2"><?php echo $res->price;?></div>
									<?php
									$veh_price+=$res->price;
								}?>

								</div>
										
								<div class="room-chk_cus_block4  row">
								
								</div>
			
							</div>
							</div>
							
								
							<?php }?>
								
								
								
								<div class="col-md-12">
							<div class="food_plan_block ">
							<h2 class="chk_food_plan">Total Price <!--: <span class="rom_type_cus_title"> 5 Star Hotel</span>--></h2>
							<div class="room-chk_cus_block4  row">
									<div class="col-md-1"></div>
									<div class="col-md-2"> </div>
									<div class="col-md-2"></div>
									<div class="col-md-2"></div>
									<div class="col-md-3">Grand Total</div>
									<div class="col-md-2"><i class="fa fa-rupee"></i> <span id="grand_total"><?php echo ($person * $amount)+$veh_price;?></span></div>
								</div>
									</div>
						    </div>
							
							
								
											<div class="col-md-12 form_block_cus7">
				
				<h2 class="user_title_cus user_title_cus_2">User Details</h2>				
				
				
					<form method="post" action="<?php echo base_url();?>packages/success?<?php $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);  echo $ckt_url[1];?>" name="payment_form" id="payment_form">
	
	
					
					<h2 class="user_title_cus">Primary User Details</h2>		
					<div class="form-group col-lg-6">
                        <label class="col-lg-4">First Name</label>
                        <input name="first_name" id="first_name" class="col-lg-8 form-control " value="<?php //echo (empty($firstname)) ?  $user_details[0]->first_name : $firstname ?>">
                      	<div class="err" id="news_ltr"></div>
					  </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Last Name</label>
                        <input name="last_name" class="col-lg-8 form-control " value="<?php //echo (empty($lastname)) ?  $user_details[0]->last_name : $lastname ?>">
                      </div>
                      
                      <h2 class="user_title_cus">Contact Details </h2>	
                      <p class="user_notes_cus">Your voucher and booking details shall be sent on the below email address and mobile number</p>	 
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Email ID</label>
						<input type="text" class="col-lg-8 form-control " name="email" id="email" placeholder="Enter you email Id" value="<?php // echo (empty($email)) ? $user_details[0]->email : $email ?>">
								   	<div class="err" id="news_ltr"></div>
                        
						
							
					  
                      </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Phone Number</label>
                        <input name="phone" class="col-lg-8 form-control " value="<?php //echo (empty($phone)) ? $user_details[0]->phone : $phone ?>">
						<div class="err" id="news_ltr"></div>
                      </div>
					  
					   <h2 class="user_title_cus">Other  Details </h2>	
					  <div class="form-group col-lg-6">
                        <label class="col-lg-4">Special Requests</label>
						<textarea name="request" id="'" class="col-lg-8 form-control "><?php //if(!empty($request)) echo $request; ?></textarea>
                       
						
                      </div>
					  
					
					  
					  
                        	<div class="form-group col-lg-12">
                        
                        <input id="confirm" name="confirm" type="checkbox" class=" "> By clicking the above buttons you agree with the hotel booking <a href="<?php echo base_url();?>privacy-policy">policies</a>, cancellation policies and <a href="<?php echo base_url();?>terms">terms & conditions</a> of Bookingwings.com 
			
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

		

<?php   $this->load->view('layout/footer');   ?>
	
	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
	   <script src="<?php echo base_url();?>js/detail_search.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>

</body>

</html> 