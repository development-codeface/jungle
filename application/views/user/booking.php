<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. ">
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
										<div class="form_comment-block col-md-6 form_comment-block_cus_block">
											<div id="alert"></div>
											<!-- <h1  class="comments_title">Submit your review</h1> -->
											<h2 class="comments_subtitle">Booking Details</h2>
					
										  
										
												</div>
												
												
							<!-- cancel modal << -->
												
							<div class="modal in" id="booking_cancel" role="dialog">
							<div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header login_header">
						          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
						          	Cancel Booking
						        </div>
						        <div class="modal-body login_form">
						        <h1>Cancel Your Booking</h1>
						          	
						          	
						           <form method="post" action="" name="cancel_form" id="cancel_form">
						           	<div id="cancel_sent"></div>
						        	<div class="row">
						        		<div class="col-md-8 col-md-offset-2">
						        			
											
											<div class="form-group ">
						        				<label class="" >Booking Number</label>
												
													<input type="text" class="form-control" name="bookno" id="bookno" readonly=""/>
											</div>
											
						        			<div class="form-group form_login">
						        				
												<textarea cols="30" rows="5" name="message" id="message" class="form-control" placeholder="Please specify the reason"></textarea>
												<div id="email_err"></div>
											</div>
											
											<div class="form-group">
												<button type="submit" class="btn btn-primary" name="cancel_book" id="cancel_book"> Continue </button> 
												
												
											</div>
											
											<br>
											
										</div>
										
								  	</div>
								  	</form>
						        </div>
						      </div>
						      
						    </div>
						</div>
						
						
							<!-- amendment modal << -->
												
							<div class="modal in" id="booking_amend" role="dialog">
							<div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header login_header">
						          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
						          	Amend your booking
						        </div>
						        <div class="modal-body login_form">
						        <h1>Make changes to your booking</h1>
						          	
						          	
						           	<div id="amend_sent"></div>
						           <form method="post" action="" name="amend_form" id="amend_form">
						        	<div class="row">
						        		<div class="col-md-8 col-md-offset-2">
						        			
											
											<div class="form-group ">
						        				<label class="" >Booking Number</label>
													<input type="text" class="form-control" name="bookamend_no" id="bookamend_no" readonly=""/><div id="email_err"></div>
											</div>
											
						        			<div class="form-group form_login">
						        				
												<textarea cols="30" rows="5" name="amend_message" id="amend_message" class="form-control" placeholder="Please enter your message"></textarea>
												<div id="email_err"></div>
											</div>
										
											<div class="form-group">
												<button type="submit" class="btn btn-primary" name="amend_book" id="amend_book"> Submit</button> 
												
												
											</div>
											
											<br>
											
										</div>
										
								  	</div>
								  	</form>
						        </div>
						      </div>
						      
						    </div>
						</div>


												
												
												
													
													<?php foreach($bookings as $tbl_booking): 
														$rooms = $this -> db
														-> select_sum('number_of_rooms')
														-> where('booking_number', $tbl_booking -> booking_number)
														-> get('tbl_booking')
														-> row();
														
														
														 $commision_price = $this -> db
														-> select_sum('commision')
														-> where('booking_number', $tbl_booking -> booking_number)
														-> get('tbl_booking')
														-> row();
														
														
														?>
												<div class="review-block odd_review_block booking_review_block col-md-12 ">
													<div class="">
														
														<div class="col-md-3 rew_img-block">
															<img src="<?php echo base_url().$tbl_booking->thumb; ?>">
															
																</div>
															<div class="col-md-9 rew_content-block  ">
																
																<div class="col-md-9 bk_dtils_1" >
																<h3 class="name_review_block_cus"><?php echo $tbl_booking->title; ?></h3>
															<h4 class="name_review_block_cus_location"><?php echo $tbl_booking->district.', '.$tbl_booking->state; ?>
																					            <span class="star-rating">
					            	
					            <?php for($i=1;$i<=$tbl_booking->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$tbl_booking->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
					            
					            </span>
															</h4>
								</div>
															<div class="col-md-3 bk_dtils_1" >
										<div class="inline_cus_bk pull-right booking_num_sec_cus" >
																	<p class="chkin_date_dk ">Booking No.</p>
																<p class=""><span class="date_sec_bold_price bk_num_cus" id="booking_no"><?php echo $tbl_booking->booking_number; ?></span></p>
																	</div>
										</div>
								
								
																<div class="col-md-12 bK_booking_details" >
																	<div class="review_block_cus_cont bk_details col-md-3">
																	<div class="inline_cus_bk">
																		<div class="re_p_bk">
																	<p class="chkin_date_dk">Check-in</p>
																	<p class=""><span class="date_sec"><?php echo date('D M j, Y', strtotime($tbl_booking->check_in));?></span></p>
																	</div>
																			
																	</div>
																	<div class="inline_cus_bk">
																
																	<p class="chkin_date_dk">Check-out</p>
																	<p class=""><span class="date_sec"><?php echo date('D M j, Y', strtotime($tbl_booking->check_out));?></span></p>
																	
																	</div>
																</div>
																				<div class="review_block_cus_cont bk_details col-md-3">
																	<div class="inline_cus_bk">
																	<p class="chkin_date_dk">Booked on</p>
																	<p class=""><span class="date_sec"><?php echo date('D M j, Y', strtotime($tbl_booking->date));?></span></p>
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
																<p class=""><span class="date_sec_bold_price"><span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>" data-rating="1"></span> 
																<?php 
																if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
																echo $tbl_booking->payment+$commision_price->commision; 
																} else if(!$this->session->userdata('currency')){
																echo $tbl_booking->payment+$commision_price->commision; 
																} else {
																echo convertCurrency($tbl_booking->payment+$commision_price->commision, $this->session->userdata('default'), $this->session->userdata('currency'));
																}?></span></p>
																	</div>
																	
																</div>
																</div>
																
																
																
																<!--<p class="print_icon_cus"><a target="_blank" href="<?php echo base_url().'user/viewPDF/'.$tbl_booking->booking_number; ?>"><i class="fa fa-print"></i></a></p>-->
																
																<p class="print_icon_cus"><a href="<?php echo base_url().'user/booking/'.$tbl_booking->booking_number; ?>"><i class="fa fa-eye"></i></a></p>
																<p class="print_icon_cus"><a target="_blank" href="<?php echo base_url().'user/invoice/'.$tbl_booking->booking_number;?>"><i class="fa fa-print"></i></a></p>
																
																<p class="print_icon_cus"><a data-dismiss="modal" href="" data-toggle="modal" data-target="#booking_amend" id="book_amend_no" onclick="amend_book('<?php echo $tbl_booking->booking_number; ?>');"><i class="fa ">Amend</i></a></p>
																<p class="print_icon_cus"><a data-dismiss="modal" href="" data-toggle="modal" data-target="#booking_cancel" id="book_can_no" onclick="cancel_book('<?php echo $tbl_booking->booking_number; ?>');"><i class="fa ">Cancel</i></a></p>
																
																</div>	
														
												
													
													</div>
													
													</div><?php endforeach; ?>
													
													
		
																		<!--<div class="review-block even_review-block">
													
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="http://localhost/booking/user/city_nights__lights.jpg">
															<h3 class="name_review_block_cus">Hotel Name</h3>
															<h4 class="name_review_block_cus_location">Location</h4>
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus"><span class="rating_section_cus">4.8</span>“Fantastic staying” </h4>
																<p class="review_block_cus_cont">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
																	</p>
																
																</div>	
														
														<p class="col-md-10 cus_btn_sec">
															<a href="#"><i class="fa fa-edit"></i> Edit</a> <a href="#"><i class="fa fa-remove"></i> Delete</a>
															
															</p>
													
													</div>
													
													</div>
													
															
												<div class="review-block odd_review-block">
													
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="http://localhost/booking/user/city_nights__lights.jpg">
															<h3 class="name_review_block_cus">Hotel Name</h3>
															<h4 class="name_review_block_cus_location">Location</h4>
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus"><span class="rating_section_cus">4.8</span>“Fantastic staying” </h4>
																<p class="review_block_cus_cont">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
																	</p>
																
																</div>	
														
														<p class="col-md-10 cus_btn_sec">
															<a href="#"><i class="fa fa-edit"></i> Edit</a> <a href="#"><i class="fa fa-remove"></i> Delete</a>
															
															</p>
													
													</div>
													
													</div> -->
													
												
												
												
												

<?php 
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