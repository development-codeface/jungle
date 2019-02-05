 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title><?php echo $details -> title; ?> - My Account</title>
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body class="page-wrapper_cus_review book_details_cus_bk">
	
	<!----------header--------->
	
	
	<?php   $this->load->view('layout/user_res_header');  ?>

										<div class="form_comment-block col-md-6 form_comment-block_cus_block">
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
									
								$price = $room_detail->room_rate+($room_detail->commision/$sum->number_of_rooms);
								$amount = ($room_detail->room_rate*$room_detail->number_of_rooms)+(($room_detail->commision/$sum->number_of_rooms)*$room_detail->number_of_rooms);
								
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
							echo $rooms[0]->payment + $rooms[0]->commision;
							} else if(!$this->session->userdata('currency')){
							echo $rooms[0]->payment + $rooms[0]->commision;
							} else {
							echo convertCurrency($rooms[0]->payment + $rooms[0]->commision, $this->session->userdata('default'), $this->session->userdata('currency'));
							}?></div>



								
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