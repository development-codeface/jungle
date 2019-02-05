 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title><?php echo $details -> title; ?></title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/custom_search.css" rel="stylesheet">
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
		  <?php  $this->load->view('main/login'); ?>
	
	<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	       <a class="" href="<?php echo base_url().'reservation/'.url_title($details->title).'?hotel='.$h_id;?>"> <img class="logo_l" src="<?php echo base_url().$details->logo_img;?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	
	      <!--<ul class="nav navbar-nav navbar-right cus_nav_block">

	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-default navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
			<i class="fa fa-user"></i> My Account<i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> --
	          
	          
	          <ul class="dropdown-menu">
	          	
	            		          	<?php
	          	if(isset($this->session->userdata['log_username']))
				{?>
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $h_id; ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
				<?php } else { ?>
					            <li class="sign_in"><a href="" data-toggle="modal" data-target="#login_model" id="login_data" >Sign In</a></li>
	            
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#register_model">Register</a></li>
				<?php } ?>
	          </ul>
	        </li>
	      </ul>-->
	      		      	<div class="pull-right paddngMob">
				<?php
								if(!isset($this->session->userdata['log_username']))
								{?>
				<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
				<?php } else 
				{?>
				<li class="dropdown">
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
				<a id="log_reserve" class="sign_in" href="#"><i class="fa fa-user" aria-hidden="true"></i> My Account <i class="fa fa-angle-down"></i></a></button>
				
				<ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $h_id; ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
			  </li>
				<?php } ?>
				
			</div>
	      	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> <?php if(!empty($details->phone)){ ?> Call Us : <?php echo $details->phone ;?> <?php }?> </span>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
	
	
		<?php $tot_room =0;
			 $count = count(array_filter($ck_data));
							// $count = count(array_filter($no_of_rooms));
							 $key = array_keys(array_filter($ck_data));
								$total_amount='';
						
							for($j=0; $j<$count; $j++)
								{
									  $k=$key[$j];
									  $ck_value = $ck_data[$k];
									 $explode_value=explode('|',$ck_value);
									 $num_room=$explode_value[0];
									  $rooms = $explode_value[1];
									 //$each_room_price= $each_room_amount[$j];
									 if($category=='hotel')
									 {
									 $room_detail = $this->Reservation_checkout_model->roombyid($rooms);
									 }
									 else
									 {
										$room_detail = $this->Reservation_checkout_model->Package_roombyId($rooms); 
									 }
									 $tot_room+=$num_room;
								}									 
									 
						?>
	
	
	
	
	
		<div id="page-wrapper">
		<div class="container">
			<div class="check_out-cus=block">
				<h1 class="chk_title-cus">checkout  </h1>
				<div class="content_checkout">
				
				
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
				
				
				
					<section class="resutBack col-md-12">
				<article class="ytContainerFixed">
					<p class="inrCont padR20 col-md-2 col-xs-12 com-sm-12">
						Your Selection <i class="PaySpriteCommon arrowRight"></i>
					</p>
					<p id="topLegInfo" class="inrCont blockTop col-md-5 col-xs-6 com-sm-6">
		<span class="initialTrip type_R">
			<i class="fa fa-long-arrow-right">
			</i> 
			<!-- <i class="fa fa-exchange"></i>
			</i> <span class="flL">Singapore</span> -->
		</span>
		<small class="date_cus_chk"><i class="fa fa-calendar"></i> <?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?>  - <?php echo $out_day.",&nbsp;".$out_date. "&nbsp;". $out_month. "&nbsp;" .$out_year;?> </small>
	</p>
					<p class="travellers_count_cus_block col-md-2 col-xs-12 com-sm-12">
						<span class="travellers_count_cus">Room(s) - </span><small id="travellers_count_cus"><?php echo $tot_room; ?></small>
					</p>
					
					<?php
					$reserve_name=(str_replace(" ","-",$details->title));
						$enc_id=$this->encrypt->encode($hotel_id);
						$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id); 
					if($category=='hotel')
					{
						
						?>
					<div class="col-md-3" ><a href="<?php echo base_url();?>reservation/<?php echo $reserve_name;?>?hotel=<?php echo $enc_id;?>" class="btn btn-primary pull-right"> Change Booking Details </a></div>
					<?php
					}
					else
					{
						?> 
						
					<a href="<?php echo base_url();?>reservation/<?php echo $reserve_name;?>?hotel=<?php echo $enc_id;?>&source=package&package=<?php echo $package_id;?>" class="btn btn-primary pull-right"> Change Booking Details </a>
					
					<?php 
					}?>
					
					
				</article>
				
				
				
				
			</section>
			
			<div class="check_content_start_cus row">
					<div class="col-md-7">
				<div class="col-md-6 check_content_start_cus_img ">
				<img src="<?php echo base_url();?><?php echo $image[0]->thumb;?>">
				</div>
				<div class="col-md-6  check_content_start_cus_content_sec">
					<h4><?php if($category=='hotel'){  echo $details->title;  } else { 
		echo $room_detail[0]->title;?>  <p class="checkout-tit"><?php echo $details->title;?></p>  <?php   }?>
						<span class="star-rating"> 
						
						 <?php for($i=1;$i<=$details->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$details->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
					            
											
											</span>
										</h4>
					
				<span class="hotel_place_cus"><?php echo $details->place;?>,  <?php echo $details->district;?> , <?php echo $details->state;?></span>



<div class="facilities">
		<?php if(!empty($details->free_parking)){?><i class="fa fa-cab"></i><?php } ?>
		<?php if(!empty($details->free_wifi)){?><i class="fa fa-wifi"></i><?php } ?>
</div>
				
				

					</div>
					</div>
					
					
									<div class="col-md-4  col-sm-11  col-xs-11   chk_block1_left">
										
										<div class="cus_block_2_chk">
											<h2 class="cls_cus">Checkin/Out Details</h2>
				<div class="chk_in_details_block col-lg-6">
					<span class="cls1">Check-In</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?> </span>

<!--<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span> -->
					
					
					</div>
				
								<div class="chk_in_details_block col-lg-6">
					<span class="cls1">Check-Out</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $out_day.",&nbsp;".$out_date. "&nbsp;". $out_month. "&nbsp;" .$out_year;?></span>

<!--<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span>--> 
					
					
					</div>
					
					
					<div class="col-md-12 day_and_night_cus_right">
						
						<?php echo $days; ;?> - Night stay
						
						</div>
				
				
						</div>	</div>
					
					
							
											
						<div class="col-md-12">
							
							<div class="food_plan_block ">
							<h2 class="chk_food_plan">Room Details<!----: <span class="rom_type_cus_title"> 5 Star Hotel</span>---></h2>
							<div class="room-chk_cus_block1 col-md-12">
	<div class="chk_t">							
<table >
  <thead>
    <tr>
      <th>Room type</th>
	 <?php 
								if($category=='hotel')
									{?>
									 <th>Facilities</th>
									 <?php } else { ?> 
									 <th>Package</th>
									 <?php } ?>
      <th>No. of rooms</th>
      <th>Guest/Room</th>
      <th>price/room/night</th>
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
									 //$each_room_price= $each_room_amount[$j];
									 if($category=='hotel')
									 {
									 $room_detail = $this->Reservation_checkout_model->roombyid($rooms);
									 }
									 else
									 {
										$room_detail = $this->Reservation_checkout_model->Package_roombyId($rooms); 
									 }	
									 
									 $fac_room = $this->Reservation_model->facilitiesById($room_detail[0]->room_id);
								//print_r($fac_room);
								
								
										if(!empty($room_detail))
										{
										$room_price =  $room_detail[0]->price;	
										  $room_amounts = $room_price;
										$each_room_price=round($room_amounts);
										}
								
								
								?>
									
								
								<tr class="room-chk_cus_block2  ">
								<td data-label="Room type"><?php echo $room_detail[0]->room_title;?></td>
								<td data-label="Room type">
								<?php 
								if($category=='hotel')
									{
										if(!empty($fac_room->free_wifi)) {?>
				 <span data-tooltip="Free WIFI"><i class="fa fa-wifi"></i>  </span><br/>
				 <?php } ?>
				 <?php if(!empty($fac_room->breakfast)) {?>
					<span class="room_faci" data-tooltip="Breakfast included"><i class="fa fa-cutlery"></i></span>  
					 <?php }
									}
else
{
	echo $room_detail[0]->title;
}	?>
								</td>
									<td data-label="No. of rooms"> <?php echo $num_room;?>
								<td data-label="Guest/Room">
								 <?php echo $room_detail[0]->normal_allowed_adults;?>	<i class="fa fa-male"></i>
									<?php if(!empty($room_detail[0]->normal_allowed_kids))
			{?>
				+ <?php echo $room_detail[0]->normal_allowed_kids;?> <i class="fa fa-child"></i>
			<?php }?>
									</td>
									<td data-label="Price/room/night"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
									<?php
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									echo $each_room_price;
									} else if(!$this->session->userdata('currency')){
									echo $each_room_price;
									} else {
									echo convertCurrency($each_room_price, $this->session->userdata('default'), $this->session->userdata('currency'));
									}?></td>
									<td data-label="Night(s)"><?php echo  $days;?></td>
									<td data-label="Total Price">
									<?php if($category=='hotel'){?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }else{?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									 echo $each_room_price*$days*$num_room;
									 } else if(!$this->session->userdata('currency')){
									 echo $each_room_price*$days*$num_room;
									 } else {
									 echo convertCurrency($each_room_price*$days*$num_room, $this->session->userdata('default'), $this->session->userdata('currency'));;
									 }?></td>
									</tr>
								
								
								<?php
								$total_amount+=round($each_room_price)*$days*$num_room;
								}
								
								$room_tax_amounts='';
									if($category=='hotel')
									{
										
										if($room_detail[0]->tax_applicable==0)
										{
											
										 	$tax = $this->Reservation_model->tax_amount_off($details->hotel_id);
											
											$t_amount='';
											foreach($tax as $tax_amount)
											{
												 $t_amount+=$tax_amount->tax_amount;
											}
											
											 $room_tax_amounts = ($total_amount*$t_amount)/100;
										 }
										 else
										 {
											
											 $tax = $this->Reservation_model->tax_amount($details->hotel_id);
										     $t_amount='';
											 foreach($tax as $tax_amount)
											 {
												$t_amount+=$tax_amount->tax_amount;
											 }
											 
											  $room_tax_amounts = ($total_amount*$t_amount)/100;
										 } 
									}
								
										
										 
								?>
										
								<tr class="room-chk_cus_block3">
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<?php
									if($category=='hotel')
									{?>
									<td data-label="">Taxes & service fee - <?php echo $t_amount;?>%</td>
								<td data-label="Taxes & service fee"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
								<?php 
								if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
								echo $room_tax_amounts;
								} else if(!$this->session->userdata('currency')){
								echo $room_tax_amounts;
								} else {
								echo convertCurrency($room_tax_amounts, $this->session->userdata('default'), $this->session->userdata('currency'));
								}
								?></td>
									<?php 
									}?>

</tr>
								
								
										
								<tr class="room-chk_cus_block4 ">
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label="">Grand Total</td>
								<td data-label="Grand Total ">
								<?php
									if($category=='hotel')
									{?><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
									<?php
									}
									else
									{?>
										<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
										<?php
									}
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									echo round($total_amount+$room_tax_amounts);
									} else if(!$this->session->userdata('currency')){
									echo round($total_amount+$room_tax_amounts); }
									else {
									echo convertCurrency(round($total_amount+$room_tax_amounts), $this->session->userdata('default'), $this->session->userdata('currency'));
									}?></td>
									</tr>

							  </tbody>
</table>

								
								</div>
									</div>
									</div>
							

						
					
									
						<div class="col-md-6">
							<div class="food_plan_block">
							
							<h2 class="chk_food_plan">Discount/Cashback Voucher</h2>
							<div class="food_plan_list coupon-code-block">
								<!--<p class="e-coup_cus">Additional cashback of 30% on amount paid through Axis cards will be processed within 21 working days. Max cashback INR 1250. *T&C Apply</p>-->
								<input type="text" placeholder="E-Coupon or Deal Code(uppercase)" id="" class="" />
								
								
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
						?>							
						<p class="col-md-4 login_deals_chk"><a href="<?php echo base_url();?>reservation_checkout/payment?<?php echo $ckt_url[1];?>">
							Continue</a></p>
						<?php
						}
						else
						{
						?>								
								<!--- <p class="col-md-1">
							<span> OR </span></p>-->
							
							<p class="col-md-3 login_continue_chk">
						<a class="sign_in" href="" data-toggle="modal" data-target="#login_model" id="login_reservation">Login & Continue</a>
						</p>
								
							<?php
							}?>

					</div>	</div>
				
				
				
				<div class=" col-md-12">
				<!--<p class="notes-chk">By clicking the above buttons you agree with the hotel booking policies, cancellation policies and terms & conditions of Bookingwings.com </p>-->
			
			</div>
					
						
				</div>
			</div>
			
		
		
		</div>
		
	</div>
	
	
	</div>
	
	
	

 <div class="content_search_copyright ">
 <p class="copyright">Copyright © <?php echo date('Y').' '.$details -> title ?>. Powered by <a href="<?php echo base_url(); ?>">Bookingwings.com</a>.</p>
</div> 
<script > var baseurl ="<?php echo base_url();?>"; </script>

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