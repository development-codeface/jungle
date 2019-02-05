 <!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title>Booking Wings - Best Online Hotel Booking Website</title>
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
	
	<div id="page-wrapper">
		<div class="container">
			<div class="check_out-cus=block">
				<h1 class="chk_title-cus">checkout  </h1>
				<div class="content_checkout">
				
					<section class="resutBack col-md-12">
				<article class="ytContainerFixed">
					<p class="inrCont padR20 col-md-2">
						Your Selection <i class="PaySpriteCommon arrowRight"></i>
					</p>
					<p id="topLegInfo" class="inrCont blockTop col-md-5">
		<span class="initialTrip type_R">
			<i class="fa fa-long-arrow-right"></i> 
			<span class="flL"><?php echo $details->title;?></span>
			
		</span>
	
	</p>
					<p class="travellers_count_cus_block">
						<i class="fa fa-user"></i><span class="travellers_count_cus">Traveller(s) - </span><small id="travellers_count_cus" ><span class="person">1</span> Person(s)</small>
					</p>
					<a href="<?php echo base_url();?>packages/detail/<?php echo $details->id;?>" class="btn btn-primary pull-right"> Change Package Details </a>
					<!--<input type="submit" value="Change Package Details " class="change_booking_details_input pull-right">-->
				</article>
				
				
				
				
			</section>
		
			<div class="check_content_start_cus row">
					<div class="col-md-7">
				<div class="col-md-6 check_content_start_cus_img ">
				<img src="<?php echo base_url();?><?php echo $img[0]->thumb_image; ?>">
				</div>
				<div class="col-md-6  check_content_start_cus_content_sec">
					<h4><?php echo $details->title;?>
										</h4>
					
					<span class="hotel_place_cus"><?php echo $details->nights;?> Night(s), <?php echo $details->days;?> Day(s) Package</span>


<!--<div class="facilities">
		<i class="fa fa-wifi"></i>
		<i class="fa fa-wifi"></i>
	<i class="fa fa-cab"></i>
</div>-->
				
				

					</div>
					</div>
					<?php
					  $hotel ='';
						$val='';
						$person='';
						if(!empty($_REQUEST['hotel']))
						{
							$hotel =  $_REQUEST['hotel'];
						}
						if(!empty($_REQUEST['veh']))
						{
							$vehicle_type = $_REQUEST['veh'];
						}
						if(!empty($_REQUEST['person']))
						{
							$person = $_REQUEST['person'];
						}
						
						?>
					
									<div class="col-md-4 chk_block1_left">
										
										<div class="cus_block_2_chk">
											<h2 class="cls_cus">Checkin/Out Details</h2>
				<div class="chk_in_details_block chk_in_details_block123 col-md-6">
					<span class="cls1">Check-In</span>

					
								<div class="input-group">
								<span style="background-color:#FFFFFF" class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<span id="sandbox-container" >
								<input class="form-control clsDatePicker hasDatepicker" name="check_out" id="valid_from" value="<?php if(!empty($_REQUEST['checkin'])){ 
								echo $_REQUEST['checkin']; }?>" type="text" onchange="holiday_package();" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;">
								</span>
							</div>		
					
					
					</div>
				
								<div class="chk_in_details_block chk_in_details_block123  col-md-6">
					<span class="cls1">Check-Out</span>

					
									<div class="input-group">
								<span style="background-color:#FFFFFF" class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<span id="sandbox-container4" >
								<input class="form-control clsDatePicker hasDatepicker" name="check_out" id="valid_to" value="<?php if(!empty($_REQUEST['checkout'])){ 
								echo $_REQUEST['checkout']; }?>" onchange="holiday_package();" type="text" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;">
								</span>
							</div>		
					</div>
						<div class="chk_in_details_block chk_in_details_block123 chk_in_details_block123asd  col-md-12">
					<span class="cls1 col-md-7 pr_cs">No Of Persons</span>

					
									<div class="input-group col-md-5 pr_cs">
								<select class="" onchange="holiday_package()" id="no_of_person" name="no_of_person">
											
									<?php for($j=1;$j<=12;$j++){?>
									<option value="<?php echo $j;?>" <?php if($j==$person){?> selected="selected" <?php }?>><?php echo $j;?></option>
									<?php }?>										
											</select>
							</div>		
					</div>
					<input type="hidden" name="package_id" id="package_id" value="<?php echo $details->id;?>"/>
					
					<div class="col-md-12 day_and_night_cus_right day_and_night_cus_right123">
						
						<?php echo $details->nights;?> Night(s), <?php echo $details->days;?> Day(s) Package
						
						</div>
				
				
						</div>	</div>
					 
					
					
					<?php 
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
					
						
							?>
							
							
			<input type="hidden" name="price" value="<?php echo $price;?>" id="price" />						
						<div class="col-md-12">
							<div class="food_plan_block">
							
							<h2 class="chk_food_plan">Price & Validity </h2>
							<div class="food_plan_list">
								
								<ul>
								<?php if(!empty($a)){?>
								<li> <input id="" type="radio" <?php if($price == $a || $hotel==2){ ?> checked="checked" <?php } ?> value="<?php echo $a."|2"; ?>" name="price_validity" onclick="holiday_package()" class="hotel"> 2 Star</li><?php } 
								if(!empty($b)){?>
									<li> <input id="" type="radio" <?php if($price == $b || $hotel==3){?>checked="checked" <?php } ?> value="<?php echo $b."|3"; ?>" name="price_validity" onclick="holiday_package()" class="hotel"> 3 Star</li><?php } 
								if(!empty($c)){?>
									<li> <input id="" type="radio" <?php if($price == $c || $hotel==4){?>checked="checked" <?php } ?> value="<?php echo $c."|4"; ?>" name="price_validity" onclick="holiday_package()" class="hotel"> 4 Star</li><?php } 
								if(!empty($d)){?>
									<li> <input id="" type="radio" <?php if($price == $d || $hotel==5){?>checked="checked" <?php } ?> value="<?php echo $d."|5"; ?>" name="price_validity" onclick="holiday_package()" class="hotel"> 5 Star</li><?php } ?>
								</ul>
							</div>
						</div>
					</div>
					
					<?php 
							if(!empty($vehicle))
							{?>
						<div class="col-md-12">
							<div class="food_plan_block">
							
							<h2 class="chk_food_plan">Available Vehicles  </h2>
							<div class="food_plan_list">
								<ul>
								 <?php foreach ($vehicle as $tbl_vehicle) {
									 
									 if(!empty($vehicle_type))
									 {  $vehiclesid= $tbl_vehicle->id;
										$val = 	in_array($vehiclesid, $vehicle_type);
									 } 
									 
									 ?>
								 <li> <input id="" type="checkbox" <?php if($val==1){ ?> checked="checked" <?php } ?>value="<?php echo $tbl_vehicle->price."|".$tbl_vehicle->vehicle_name."|".$tbl_vehicle->capacity."|".$tbl_vehicle->id; ?>" name="available_vehicles" class="vehicles" onclick="holiday_package_vehicle('<?php echo $tbl_vehicle->id;?>')"> <?php echo $tbl_vehicle->vehicle_name; ?></li>
								 <?php } ?>
																										
								</ul>
							</div>
						</div>
					</div>
					
							<?php } ?>
					
						
							
							
												
						
							
							
							
							
											
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
									<div class="col-md-3"><?php if(($a==$price)){ echo "2 star"; } if(($b==$price)){ echo "3 Star"; } if(($c==$price)){ echo "4 Star"; } if(($d==$price)){ echo "5 Star"; } ?></div>
									<div class="col-md-1"> &nbsp;</div>
									<div class="col-md-2"><?php echo $details->nights;?> Night(s), <?php echo $details->days;?> Day(s) </div>
									<div class="col-md-2 person" >1</div>
									<div class="col-md-2 each_person" ><?php echo $price;?>	</div>
									<div class="col-md-2"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> <span id="total">
									<?php 
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									echo $person * $price;
									} else if(!$this->session->userdata('currency')){
									echo $person * $price;
									} else {
									echo convertCurrency($person * $price, $this->session->userdata('default'), $this->session->userdata('currency'));
									}?></span></div>
								</div>
									<div class="room-chk_cus_block4  row">
								
								</div>
				
										
									</div>
									</div>
							
							
									
									
							
							
							<div class="col-md-12" <?php if(empty($vehicle_type)){?> style="display:none" <?php }?> id="avail_vehicles">
							
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
									
								<div class="room-chk_cus_block2 " id="selected_vehicle">
								<?php 
								$veh_price='';
								if(!empty($vehicle_type))
								{
								for($i=0;$i<count($vehicle_type);$i++){
									$vid =  $vehicle_type[$i];
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
								}
								}?>
								</div>
										<div class="room-chk_cus_block4  row">
								
								</div>
			
										
									</div>
									</div>
							
							
							<div class="col-md-12">
							<div class="food_plan_block ">
							<h2 class="chk_food_plan">Total Price <!--: <span class="rom_type_cus_title"> 5 Star Hotel</span>--></h2>
							<div class="room-chk_cus_block4  row">
									<div class="col-md-1"></div>
									<div class="col-md-2"> </div>
									<div class="col-md-2"></div>
									<div class="col-md-2"></div>
									<div class="col-md-3">Grand Total</div>
									<div class="col-md-2"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> <span id="grand_total">
									<?php 
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									echo ($person * $price)+$veh_price;
									} else if(!$this->session->userdata('currency')){
									echo ($person * $price)+$veh_price;
									} else {
									echo convertCurrency(($person * $price)+$veh_price, $this->session->userdata('default'), $this->session->userdata('currency'));
									}?></span></div>
								</div>
									</div>
						    </div>
						
					
					
									
						<div class="col-md-6">
							<div class="food_plan_block">
							
							<h2 class="chk_food_plan">Discount/Cashback Voucher</h2>
							<div class="food_plan_list coupon-code-block">
								<!--<p class="e-coup_cus">Additional cashback of 30% on amount paid through Axis cards will be processed within 21 working days. Max cashback INR 1250. *T&C Apply</p>
								--><input type="text" placeholder="E-Coupon or Deal Code(uppercase)" id="" class="" />
								
								
								</div>
							
							
							
							</div>
							</div>
				
				
				
					
			<div class=" col-md-12">
					<div class="footer-block_chk_block ">
					<!-- <p class="col-md-3 continue_as_guest_chk"><a href="#">
							Continue as Guest</a></p> -->
								<!-- <p class="col-md-1">
							<span> OR </span></p> -->

						<?php
						
						if(!empty($this->session->userdata['log_username']))
						{
							 $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);  
							// echo $ckt_url[1];
						?>							
						<div id="payment_url"><p class="col-md-4 login_deals_chk page_url" ><a href="<?php echo base_url();?>packages/payment?<?php echo $ckt_url[1];?>">
							Continue</a></p></div>
						<?php
						}
						else
						{
						?>								
								<!--- <p class="col-md-1">
							<span> OR </span></p>-->
							
							<p class="col-md-3 login_continue_chk">
						<a class="sign_in" href="" data-toggle="modal" data-target="#login_model" id="login_holiday">Login & Continue</a>
						</p>
								
							<?php
							}?>

					</div>	</div>
				
				
				
				
				
					
						
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
		<script src="<?php echo base_url();?>assets/js/package.js"></script>

</body>

</html> 