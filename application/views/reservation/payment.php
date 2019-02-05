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
	<link href="<?php echo base_url();?>css/custom_search.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">

  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payment_form;
      payuForm.submit();
    }
  </script>
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body onload="submitPayuForm()" >
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
	      
	       <a class="" href="<?php echo base_url().'reservation/'.url_title($details->title).'?hotel='.$h_id;?>"> <img  class="logo_l" src="<?php echo base_url().$details->logo_img;?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	
	      		      	<div class="pull-right paddngMob">
				<?php
								if(!isset($this->session->userdata['log_username']))
								{?>
				<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
				<?php } else 
				{?>
				<li class="dropdown">
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				
				<a id="log_reserve" class="sign_in" href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $h_id; ?>"><i class="fa fa-user" aria-hidden="true"></i> My Account <i class="fa fa-angle-down"></i></a></button>
				
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
						
	
					<?php
					
					$tot_room =0;
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
								$room_detail = $this->Reservation_checkout_model->roombyid($rooms);
							}
							else
							{
								$room_detail = $this->Reservation_checkout_model->Package_roombyId($rooms); 
							}	 
							
							
							
										if(!empty($room_detail))
										{
										$room_price =  $room_detail[0]->price;
										
																				
										  $room_amounts = $room_price;
										
										$each_room_price=$room_amounts;
										}
										
										 $total_amount+= round($each_room_price)*$days*$num_room;
							$tot_room+=$num_room;		
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
	
	

	<div id="page-wrapper">
		<div class="container">
			<div class="check_out-cus=block">
				<h1 class="chk_title-cus">checkout  </h1>
				
			
						<div class="content_checkout content_checkout_2">
			<div class="">
				<h1 class="section2_chk_cus_block"> </h1>
				<div class="room_all_details_before_chkout">
					
					<div class="col-md-12">
					<div class="col-md-4 room_sec_chk_bf">
						<div  class="room_name_title_b_chk"><h4>
						<?php if($category=='hotel'){  echo $details->title;  } else { echo $room_detail[0]->title?>
<p class="pay-tit"><?php echo $details->title; ?></p> <?php   }?>
</h4>
						<span class="star-rating"> 
						 <?php for($i=1;$i<=$details->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$details->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
								</span>

								<p class="room_name_title_b_chk_sub_title"><?php echo $details->place;?>,  <?php echo $details->district;?> , <?php echo $details->state;?></p></div>
						
						</div>
					
						
						
					<div class="col-md-4"> 
						<div class="chk_details_chk_b col-md-5">
							<div class="chk_in_details_block mar_chk_b">
					<span class="cls1"><i class="fa fa-arrow-circle-o-right"></i> Check-In</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?></span>

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
							
							<p class="adults_b_chk"><?php echo $tot_room; ?> Room(s)</p>
							<!--<p class="adults_b_chk">1 Traveller(s)  </p>-->
							
							</div>
						
					</div>
					
					
		<div class="col-md-2 ">
						
						<div class="number_of_travellers_cus right_grand_total">
							
							<p class="grand-total_red">Grand total </p>
							<p class="grand-total_cus_red">
							<?php
							if($category=='hotel'){?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
							<?php }else
							{?><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php 	}
							if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
						echo round($total_amount+$room_tax_amounts);
						} else if(!$this->session->userdata('currency')) {
						echo round($total_amount+$room_tax_amounts);
						} else {
						echo convertCurrency(round($total_amount+$room_tax_amounts), $this->session->userdata('default'), $this->session->userdata('currency'));;
						}?></p>
							
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
									 <?php 
								if($category=='hotel')
									{?>
									 <th>Facilities</th>
									 <?php } else { ?> 
									 <th>Package</th>
									 <?php } ?>
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
									 $room_detail = $this->Reservation_checkout_model->roombyid($rooms);
									 }
									 else
									 {
										$room_detail = $this->Reservation_checkout_model->Package_roombyId($rooms); 
									 }	 
									  $fac_room = $this->Reservation_model->facilitiesById($room_detail[0]->room_id);
									 if(!empty($room_detail))
										{
										$room_price =  $room_detail[0]->price;
										
																				
										  $room_amounts = $room_price;
										
										 							 
										
										
										$each_room_price=round($room_amounts);
										}
									
								
								?>
									
							
								<tr class="room-chk_cus_block2  ">
										<td data-label="Room"><?php echo $room_detail[0]->room_title;?></td>
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
										<td data-label="Guest"> <?php echo $num_room;?></td>
											<td data-label="Guest/Room">
								 <?php echo $room_detail[0]->normal_allowed_adults;?>	<i class="fa fa-male"></i>
									<?php if(!empty($room_detail[0]->normal_allowed_kids))
			{?>
				+ <?php echo $room_detail[0]->normal_allowed_kids;?> <i class="fa fa-child"></i>
			<?php }?>
									</td>
										<td data-label="Extras">
										<?php
										if($category=='hotel'){?>
										<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
										<?php }else
										{?><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
										<?php } 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo $each_room_price;
										} else if(!$this->session->userdata('currency')) {
										echo $each_room_price;
										} else {
										echo convertCurrency($each_room_price, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?>
									    </td>
							
										<td data-label="Night(s)"><?php echo  $days;?></td>
										<td data-label="Total Price">
										<?php
										if($category=='hotel'){?>
										<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
										<?php }else
										{?><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
										<?php } 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo $each_room_price*$days*$num_room;
										} else if(!$this->session->userdata('currency')){
										echo $each_room_price*$days*$num_room;
										} else {
										echo convertCurrency($each_room_price*$days*$num_room, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?></td>

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
									
										<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>  
										<?php 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo $room_tax_amounts;
										} else if(!$this->session->userdata('currency')) {
										echo $room_tax_amounts;
										} else {
										echo convertCurrency($room_tax_amounts, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?> </td>

	</tr><?php 
									}?>										
					

								
						
								
								
										<tr class="room-chk_cus_block4  ">
										
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label=""></td>
									<td data-label="" class=" grand-total_red">Grand Total</td>
								<td data-label="" class="  grand-total_red"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
								<?php 
								if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
								echo round($total_amount+$room_tax_amounts);
								} else if(!$this->session->userdata('currency')) {
								echo round($total_amount+$room_tax_amounts);
								} else {
								echo convertCurrency(round($total_amount+$room_tax_amounts), $this->session->userdata('default'), $this->session->userdata('currency'));
								}?></td>

</tr>


										  </tbody>
</table>

								
								</div>					
							
								
								
											<div class="col-md-12 form_block_cus7 pay-align">
				<?php
				if($category=='package' && !empty($room_detail[0] -> services))
									{?>						
				<h2 class="user_title_cus user_title_cus_2">Services Offered</h2>
				<?php echo '<label>'.$room_detail[0] -> services.'</label>'; ?>
				<?php } ?>
				<h2 class="user_title_cus user_title_cus_2">User Details</h2>				
				
				<!-- <form method="post" action="<?php echo base_url();?>checkout/success?<?php $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);  echo $ckt_url[1];?>" name="payment_form" id="payment_form"> -->
				<form method="post" action="<?php echo $action; ?>" name="payment_form" id="payment_form">
					
<?php
$product['name'] = $details->title;
$product['value'] = round($total_amount+$room_tax_amounts);
?>
					
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      <input type="hidden" name="amount" value="<?php echo number_format(round($total_amount+$room_tax_amounts), 2, '.', '') ?>" />
      <input type="hidden" name="productinfo" value="bookingwings" />
      
      <?php $ckt_url =  explode('?',$_SERVER['REQUEST_URI']);?>
      <input type="hidden" name="surl" value="<?php echo base_url()."reservation_checkout/success?".$ckt_url[1] ?>" size="64" />
      <input type="hidden" name="furl" value="<?php echo base_url()."reservation_checkout/failure?hotel=".$h_id; ?>" size="64" />
     <!--- <input type="hidden" name="service_provider" value="payu_paisa" size="64" />--->
					
					<h2 class="user_title_cus">Primary User Details</h2>		
					<div class="form-group col-lg-6">
                        <label class="col-lg-4">First Name</label>
                        <input name="first_name" id="first_name" class="col-lg-8 form-control " value="<?php echo (empty($firstname)) ?  $user_details[0]->first_name : $firstname ?>">
                      	<div class="err" id="news_ltr"></div>
					  </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Last Name</label>
                        <input name="last_name" class="col-lg-8 form-control " value="<?php echo (empty($lastname)) ?  $user_details[0]->last_name : $lastname ?>">
                      </div>
                      
                      <h2 class="user_title_cus">Contact Details </h2>	
                      <p class="user_notes_cus">Your voucher and booking details shall be sent on the below email address and mobile number</p>	 
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Email ID</label>
						<input type="text" class="col-lg-8 form-control " name="email" id="email" placeholder="Enter you email Id" value="<?php echo (empty($email)) ? $user_details[0]->email : $email ?>">
								   	<div class="err" id="news_ltr"></div>
                        
						
							
					  
                      </div>
                      	<div class="form-group col-lg-6">
                        <label class="col-lg-4">Phone Number</label>
                        <input name="phone" class="col-lg-8 form-control " value="<?php echo (empty($phone)) ? $user_details[0]->phone : $phone ?>">
						<div class="err" id="news_ltr"></div>
                      </div>
					  
					   <h2 class="user_title_cus">Other  Details </h2>	
					  <div class="form-group col-lg-6">
                        <label class="col-lg-4">Special Requests</label>
						<textarea name="request" id="'" class="col-lg-8 form-control "><?php if(!empty($request)) echo $request; ?></textarea>
                       
						
                      </div>
					  
					  
					  	<div class="form-group col-lg-6">
                        <label class="col-lg-6">Your estimated time of arrival</label>
						
                        <input name="arrival" class="col-lg-8 form-control " value="<?php echo (empty($arrival)) ? '' : $arrival ?>">
							<div class="form-group col-lg-8 extra_fcus">
					<input name="pickup" type="checkbox" class=" " value="Yes" <?php echo (empty($pickup)) ? '' : 'checked' ?>> 
						I'm interested in renting a car
					</div>
                      </div>
					  
					  
                        	<div class="form-group col-lg-12">
                         
                        <input id="confirm" name="confirm" type="checkbox" class=" "> By clicking the button you agree with the hotel booking <a target="_blank" href="<?php echo base_url();?>privacy-policy">policies</a>, <a target="_blank" href="<?php echo base_url();?>terms-conditions">cancellation policies</a> and <a href="<?php echo base_url();?>terms-conditions" target="_blank">terms & conditions</a> of Bookingwings.com 
			
                      </div>
                     <br> <br>
                     <div class=" form-group col-lg-12">
					
								 
								 
								<!--<p class=" login_continue_chk b_chk_continue "><a href="<?php echo base_url();?>">
							 Continue to Check Out</a></p>-->
							           <?php if(!$hash) { ?>
							 <button type="submit" class=" btn btn-primary" id="payment_id">Continue to check out</button>
          <?php } ?>								
							

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
	 <div class="content_search_copyright ">
 <p class="copyright">Copyright © <?php echo date('Y').' '.$details -> title ?>. Powered by <a href="<?php echo base_url(); ?>">Bookingwings.com</a>.</p>
</div> 
		
		
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