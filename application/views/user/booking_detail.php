<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>css/social_buttons.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">







    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url(); ?>font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->





</head>

<body class="page-wrapper_cus_review book_details_cus_bk">
	
	<!----------header--------->
	<?php   $this->load->view('layout/user_header');  
	
	if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>




<!--Travel Agent Account - Profile view >> -->
<nav class="account_menu">
	<ul>
		<li class="current"><a href="<?php echo base_url(); ?>travel_agent/profile">Profile</a></li>
		<li><a href="<?php echo base_url(); ?>travel_agent/edit_profile">Edit Profile</a></li>
		<li><a href="<?php echo base_url(); ?>travel_agent/change_password">Passsword</a></li>
	</ul>
</nav>
<!--Travel Agent Account - Profile view << -->

<div class="pro_padding">
	
	<h3>Account Information</h3>
	
	<div class="account_info">
		<b class="info_name">Name :</b><span><?php echo $profile -> name; ?></span>
	</div>
	
	
	<div class="account_info">
		<b class="info_name">Address :</b><span><?php echo $profile -> address; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">E mail :</b><span><?php echo $profile -> email; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">Phone :</b><span><?php echo $profile -> contact; ?></span>
	</div>
	
	<!-- <div class="account_info">
		<b class="info_name">Gender :</b><span></span>
	</div> -->
	
	<div class="account_info">
		<b class="info_name">Fax :</b><span><?php echo $profile -> fax; ?></span>
	</div>
	
</div><?php } else { ?>








<!-- User Account - Profile view >> -->
<!-- <nav class="account_menu">
	<ul>
		<li class="current"><a href="<?php echo base_url(); ?>user">Profile</a></li>
		<li><a href="<?php echo base_url(); ?>user/editprofile">Edit Profile</a></li>
		<li><a href="<?php echo base_url(); ?>user/changepassword">Passsword</a></li>
	</ul>
</nav> -->
<!-- User Account - Profile view << -->
<?php //if(!empty($hotel)) { ?>
										<div class="form_comment-block col-md-6 form_comment-block_cus_block ">
											<div id="alert"></div>
											<!-- <h1  class="comments_title">Submit your review</h1> -->
											<h2 class="comments_subtitle">Booking Details</h2>
					
										  
										
												</div>
												
													
												<div class="review-block odd_review_block booking_review_block col-md-12 bk_dt_page_cus">
													<div class="">
														
														<div class="col-md-3 rew_img-block">
															<img src="<?php echo base_url().$bookings->thumb; ?>">
															
															</div>
															<div class="col-md-9 rew_content-block  ">
																
																<div class="col-md-9 bk_dtils_1" >
																<h3 class="name_review_block_cus"><?php echo $bookings->title; ?></h3>
															<h4 class="name_review_block_cus_location"><?php echo $bookings->district.', '.$bookings->state; ?>
												<span class="star-rating">
					            	
					            <?php for($i=1;$i<=$bookings->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$bookings->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
					            
					            </span>
															</h4>
								</div>
										<div class="inline_cus_bk booking_num_sec_cus col-md-3 " >
											  <div class="pull-right">
																	<p class="chkin_date_dk ">Booking No.</p>
																<p class=""><span class="date_sec_bold_price bk_num_cus"><?php echo $bookings->booking_number; ?></span></p>
																	</div></div>
															
								
								
																<div class="col-md-12 bK_booking_details" >
																	
																		<div class="review_block_cus_cont bk_details col-md-6">
																
																	
															
																		<div class="inline_cus_bk">
																	<p class="chkin_date_dk">Booked on</p>
																	<p class=""><span class="date_sec"><?php echo date('D M j, Y', strtotime($bookings->date));?></span></p>
																	</div>
																	
																</div>
																	<div class="review_block_cus_cont bk_details col-md-6">
																<div class="cus_block_2_chk">
											<h2 class="cls_cus">Check-In/Out Details</h2>
				<div class="chk_in_details_block">
					<span class="cls1">Check-In</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo date('D M j, Y', strtotime($bookings->check_in));?></span>

<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span> 
					
					
					</div>
				
								<div class="chk_in_details_block chk_in_details_block_asd">
					<span class="cls1">Check-Out</span>

<span class="date"><i class="fa fa-calendar"></i> <?php echo date('D M j, Y', strtotime($bookings->check_out));?></span>

<span class="time"><i class="fa fa-clock-o"></i> 12 PM</span> <?php $diff = strtotime($bookings->check_out) - strtotime($bookings->check_in); 

$datediff = floor($diff/(60*60*24)); ?>
					
					
					</div>
					
					
					<div class="col-md-12 day_and_night_cus_right">
						
						Night(s) - <?php echo $datediff - 1; ?> &amp; Day(s) - <?php echo $datediff; ?> 
						
						</div>
				
				
						</div>
																</div>
													
																</div>	
																
																
																
																
																
																</div>	
														
												<div class="col-md-12">
							
							<div class="food_plan_block booking_details_page ">
							<h2 class="chk_food_plan"> Room Details</h2>
								<div class="room-chk_cus_block1">
								<div class="col-md-4">Room Type</div>
									<div class="col-md-2">No. of Rooms</div>
									<div class="col-md-2">Allowed Persons</div>
									<div class="col-md-2">Price/Night</div>
									<div class="col-md-2">Amount</div>
								</div>
									

							<?php
							
						
								foreach($rooms as $room_detail) {
									
								$sum = $this -> db
								-> select_sum('number_of_rooms')
								-> where('booking_number', $room_detail->booking_number)
								-> get('tbl_booking')
								-> row();
								
								 $commision_price = $this -> db
														-> select_sum('commision')
														-> where('booking_number', $room_detail -> booking_number)
														-> get('tbl_booking')
														-> row();
									
									
								//$price = $room_detail->room_rate+($room_detail->commision/$sum->number_of_rooms);
								//$amount = ($room_detail->room_rate*$room_detail->number_of_rooms)+(($room_detail->commision/$sum->number_of_rooms)*$room_detail->number_of_rooms);
								 $commision_rate_final=  ($room_detail->commision/$room_detail->number_of_rooms)/$datediff;
								$price = $room_detail->room_rate+$commision_rate_final;
								 $amount = ($room_detail->room_rate*$room_detail->number_of_rooms)+($commision_rate_final*$room_detail->number_of_rooms);
								 $amount=  $datediff*$amount;
								
								?>
										
								<div class="room-chk_cus_block2 col-md-12  ">
								<div class="col-md-4"><?php echo $room_detail->room_title; ?></div>
									<div class="col-md-2"><?php echo $room_detail->number_of_rooms; ?></div>
									<div class="col-md-2"> 
									
									<?php echo $room_detail->normal_allowed_adults;?> <i class="fa fa-male "></i> 
			<?php
			
			if(!empty($room_detail->normal_allowed_kids))
			{?>
				+ <?php echo $room_detail->normal_allowed_kids;?><i class="fa fa-child"></i></span>
			<?php }
			
			?>
			</div>
									
									<div class="col-md-2"><?php
								if($bookings->category=='hotel')
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php 
								}
								else
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php }
if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
echo $price; 
} else if(!$this->session->userdata('currency')) {
echo $price; 
} else {
echo convertCurrency($price, $this->session->userdata('default'), $this->session->userdata('currency'));
}
?></div>
									<div class="col-md-2"><?php
								if($bookings->category=='hotel')
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php 
								}
								else
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php } 
							if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
							echo $amount;
							} else if(!$this->session->userdata('currency')){
							echo $amount;
							} else {
							echo convertCurrency($amount, $this->session->userdata('default'), $this->session->userdata('currency'));
							}?></div>
								</div>
								
								<?php } ?>
								
								<?php
								if($bookings->category=='hotel')
								{?>
								<div class="room-chk_cus_block4 chk_cus_block_tax  row">
								
								
									<div class="col-md-7"></div>
									<div class="col-md-3">Taxes & Services</div>
									<div class="col-md-2"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
									<?php 
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
									echo $rooms[0]->tax;
									} else if(!$this->session->userdata('currency')){
									echo $rooms[0]->tax;
									} else {
									echo convertCurrency($rooms[0]->tax, $this->session->userdata('default'), $this->session->userdata('currency'));
									}
									?></div>

								
								</div>
								<?php }?>
						
							<div class="room-chk_cus_block4  row">
								
									
									<div class="col-md-7"></div>
									<div class="col-md-3">Grand Total</div>
									<div class="col-md-2">
									<?php
								if($bookings->category=='hotel')
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php 
								}
								else
								{?>
							<i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i>
							<?php }
							if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
							echo $rooms[0]->payment +$commision_price->commision;
							} else if(!$this->session->userdata('currency')){
							echo $rooms[0]->payment +$commision_price->commision;
							} else {
							echo convertCurrency($rooms[0]->payment+$commision_price->commision, $this->session->userdata('default'), $this->session->userdata('currency'));
							}?></div>



								
								</div>
									</div>
	
									</div>
													
													</div>
													
													</div><?php //endforeach; ?>
													
												
												
												
												

<?php //} else echo 'You have made no booking to submit a review'; 
} ?>
<!---footer---->
<?php $this -> load -> view('layout/user_footer'); ?>



 

 <!-- jQuery -->
    
     <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>js/login.js"></script>
    
     <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url(); ?>js/validation.js"></script>

    

</body>

</html>
