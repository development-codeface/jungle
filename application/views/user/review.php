<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. ">
    <meta name="author" content="">


    <title> Booking Wings - Best Online Hotel Booking Website </title>

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

<body class="page-wrapper_cus_review">
	
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
<?php if(!empty($hotel)) { ?>
										<div class="form_comment-block col-md-6 form_comment-block_cus_block">
											<div id="alert"></div>
											<!-- <h1  class="comments_title">Submit your review</h1> -->
											<h2 class="comments_subtitle">Submit your review</h2>
											<form id="review_form" method="post">
												<div class="form-group">
										   
										    <div class="input-group">
										  <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
										  
										  <?php if(empty($review)){ ?>
										  <select class="form-control" name="hotel_id"><option>--Select--</option>
										  	<?php foreach ($hotel as $h_id) {
										  		 
										  		$hotel = $this->db->select('title')->where('id', $h_id->hotel_id)->get('tbl_hotel')->row();?>
										  		
												  <option value="<?php echo $h_id->hotel_id; ?>"><?php echo $hotel->title; ?></option>
												  
											 <?php } ?>
										  	
										  </select><?php } else {?>
										  	
										  	<select class="form-control" name="hotel_id"><option>--Select--</option>
										  	<?php foreach ($hotel as $h_id) {
										  		 
										  		$hotel = $this->db->select('title')->where('id', $h_id->hotel_id)->get('tbl_hotel')->row();?>
										  		
												  <option value="<?php echo $h_id->hotel_id; ?>"
												  	<?php if($h_id->hotel_id == $review->hotel_id) echo 'selected'; ?>><?php echo $hotel->title; ?></option>
												  
											 <?php } ?>
										  	
										  </select><?php } ?>
										
										</div>
										  </div>											
										
										<?php if(!empty($review)) {?>
											<input type="hidden" value="<?php echo $review->id; ?>" name="review_id"><?php } ?>
													
										  	 <input type="hidden" value="<?php echo $user[0]->id; ?>" name="user_id">		
																			
																		  <div class="form-group">
																		  	
											<div class="input-group">
										  <div class="input-group-addon"><i class="fa fa-comment"></i></div>
										  <input type="text" name="reviewtitle" placeholder="Give a title" value="<?php if(!empty($review)) echo $review->title; ?>" id="" class="form-control comments_block_message" />
										
										</div>
										</div>
										   <div class="form-group">
										    <div class="input-group">
										  <div class="input-group-addon"><i class="fa fa-comment"></i></div>
										  <textarea type="text" name="userreview" placeholder="Enter your feedback here" id="" class="form-control comments_block_message"><?php if(!empty($review)) echo $review->review; ?></textarea>
										
										</div>
										    
										  </div>	
															
										
										  
										  
										  </form>	
										  <?php if(!empty($review)) {?>
										  <input type="submit"  value ="Update"  name="submit" id="comments_edit" ><?php } else {?>
												
										<input type="submit"  value ="Submit"  name="submit" id="comments_submit" ><?php } ?>
												</div>
												
													
													<?php foreach($reviews as $tbl_review): 
														$hotel = $this->db->where('hotel_id', $tbl_review->id)->get('tbl_hotel_image')->row();
														?>
												<div class="review-block odd_review-block col-md-12">
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="<?php echo base_url().$hotel->thumb; ?>">
															<h3 class="name_review_block_cus"><?php echo $tbl_review->hotel; ?></h3>
															<h4 class="name_review_block_cus_location"><?php echo $tbl_review->district.', '.$tbl_review->state; ?></h4>
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus"><!--<span class="rating_section_cus">4.8</span>--->“<?php echo $tbl_review->title; ?>” </h4>
																<p class="review_block_cus_cont"><?php echo $tbl_review->review; ?></p>
																
																</div>	
														
														<p class="col-md-10 cus_btn_sec">
															<a href="<?php echo base_url().'user/review/'.$tbl_review->review_id; ?>"><i class="fa fa-edit"></i> Edit</a> <!-- <a href="#"><i class="fa fa-remove"></i> Delete</a> -->
															
															</p>
													
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
													
												
												
												
												

<?php } else echo 'You have made no booking to submit a review'; } ?>
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
