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

<?php if(!empty($hotel)) { ?>
										<div class="form_comment-block col-md-6 form_comment-block_cus_block">
											<div id="alert"></div>
											<!-- <h1  class="comments_title">Submit your review</h1> -->
											<h2 class="comments_subtitle">Submit your review</h2>
											<form id="review_form" method="post">
										
										<input type="hidden" value="<?php echo $hotel->hotel_id; ?>" name="hotel_id">
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

													
												
												
												
												

<?php } else echo 'You have made no booking to submit a review';  ?>
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