<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website</title>

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
												
													
													<?php //foreach($bookings as $tbl_booking): 
														$rooms = $this -> db
														-> select_sum('number_of_rooms')
														-> where('booking_number', $bookings -> booking_number)
														-> get('tbl_booking')
														-> row();
														?>
												<div class="review-block odd_review_block booking_review_block col-md-12 ">
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
															<div class="col-md-3 bk_dtils_1" >
										<div class="inline_cus_bk pull-right booking_num_sec_cus" >
																	<p class="chkin_date_dk ">Booking No.</p>
																<p class=""><span class="date_sec_bold_price bk_num_cus"><?php echo $bookings->booking_number; ?></span></p>
																	</div>
										</div>
								
								
																<div class="col-md-12 bK_booking_details" >
																	<div class="review_block_cus_cont bk_details col-md-3">
																	<div class="inline_cus_bk">
																		<div class="re_p_bk">
																	<p class="chkin_date_dk">Check-in</p>
																	<p class=""><span class="date_sec"><?php echo date('M j, Y', strtotime($bookings->check_in));?></span></p>
																	</div>
																			
																	</div>
																	<div class="inline_cus_bk">
																
																	<p class="chkin_date_dk">Check-out</p>
																	<p class=""><span class="date_sec"><?php echo date('M j, Y', strtotime($bookings->check_out));?></span></p>
																	
																	</div>
																</div>
																				<div class="review_block_cus_cont bk_details col-md-3">
																	<div class="inline_cus_bk">
																	<p class="chkin_date_dk">Booked on</p>
																	<p class=""><span class="date_sec"><?php echo date('M j, Y', strtotime($bookings->date));?></span></p>
																	</div>
																	<div class="inline_cus_bk">
																	<p class="chkin_date_dk">No. of Room(s)</p>
																	<p class=""><span class="date_sec"><?php echo $rooms->number_of_rooms; ?></span></p>
																	</div>
																</div>
																		<!-- <div class="review_block_cus_cont bk_details col-md-3">
																	<div class="inline_cus_bk">
																	<p class="chkin_date_dk">No. Of Adults</p>
																	<p class=""><span class="date_sec">4 Adult(s)</span></p>
																	</div>
																	<div class="inline_cus_bk">
																	<p class="chkin_date_dk">No. Of Kids</p>
																	<p class=""><span class="date_sec">4 Kid(s)</span></p>
																	</div>
																</div> -->
																		<div class="review_block_cus_cont bk_details col-md-3">
																	
																	<div class="inline_cus_bk last_amount_dk">
																		<p class="chkin_date_dk">Amount</p>
																<p class=""><span class="date_sec_bold_price">Rs. <?php echo $bookings->total_amount; ?>/-</span></p>
																	</div>
																	
																</div>
																</div>	
																</div>	
														
												
													
													</div>
													
													</div><?php //endforeach; ?>
													


<!---footer---->

    

</body>

</html>
