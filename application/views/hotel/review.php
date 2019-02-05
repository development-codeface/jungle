 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. " name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website </title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
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

	<!----------header--------->
	<?php   $this->load->view('layout/header');   ?>
										
				
	
		
	
	<div id="page-wrapper" class="full_page_review_cus">
		<div class="container">
			<div class="hotel_page_review_cus_block">
				<h1 class="chk_title-cus">Reviews  </h1>
	
		
					<div class="col-md-12 header_review_cus_block ">
						<div class="header_review_cus">
							<div class=" col-md-2 header_review_cus_img_hotel ">
								<img src="<?php echo base_url().$hotel->thumb; ?>">
							</div>
								<div class=" col-md-10 header_review_cus_details_hotel">
									<div class="col-md-9 no_padding_l">
										<h1 class="view_hotel_name_cus"><?php echo $hotel->title; ?></h1>
										<span class="star-rating"> 
											<?php for($i=1;$i<=$hotel->star_rating;$i++) { ?>
											<span data-rating="<?php echo $i; ?>" class="fa fa-star gold"></span><?php } ?>
											
											<?php for($i=0;$i<(5-$hotel->star_rating);$i++) { ?>
											<span class="fa fa-star-o"></span><?php } ?>
										</span>
										<p><?php echo $hotel->place.', '.$hotel->state.', '.$hotel->district; ?> </p>
									</div>
									
									<div class="book_now_btn col-md-3">
										<a href="<?php echo base_url();?>hotels/detail/<?php echo $this->uri->segment(2);?>">View Property</a>
										</div>
							</div>
						</div>
						
					</div>
					<!---<div class="col-md-3 header_review_cus_block2 ">
						<div class="review_block_rating">
							<div class="review_list_score_breakdown_left">
<h4 class="review_list_score_title">Review score</h4>
<p class="review_list_score_count" id="review_list_score_count">
Based on <strong>7129 reviews</strong>
</p>
<div class="review_list_score" id="review_list_main_score">
8.4
</div>
</div>
						</div>
						
					</div>--->
								<!---	<div class="col-md-9 header_review_cus_block2  header_review_cus_block2_cus ">
<div class="col-md-12 revd_policy revd_collapsible lock_price v2 clearfix  policy_margin_fix">
<div  class=" col-md-1" id="rev_policy_left">
<i class="policy_icon"><i class="fa fa-check-square-o"></i></i>
</div>
<div class=" col-md-9"  id="rev_policy_right">
<h3 class="verified_reviews">100% Verified Reviews</h3>
<p class="policy_subs">Real guests. Real stays. Real opinions.</p>
</div>
<div class="policy_more col-md-2">
<a class="no_underline v_review_modal js-guidelines_open_link" id="guidelines_open_link" href="#">Read more</a>
</div>
</div>--->

<!-- <div class="col-md-12 search_options_cus">

		<div class="col-md-6">
	
	<span> Sort By :  <span>
		<select>
		
<option value="">Select Date</option>
<option value="f_recent_desc">Date (newer to older)</option>
<option value="f_recent_asc">Date (older to newer)</option>
<option value="f_score_desc">Score (higher to lower)</option>
<option value="f_score_asc">Score (lower to higher)</option>

			</select>
		</div>
	
	
	
	</div> -->
						
					<!---</div>--->
		
		
												
													
													<?php foreach ($reviews as $tbl_review) {?>
												<div class="review-block odd_review-block col-lg-12">
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="<?php echo base_url().$tbl_review->photo; ?>">
															<h3 class="name_review_block_cus"><?php echo $tbl_review->first_name.' '.$tbl_review->last_name; ?></h3>
															<h4 class="name_review_block_cus_location"><?php echo $tbl_review->state.', '.$tbl_review->country; ?></h4>
																
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus">“<?php echo $tbl_review->title; ?>”  <span class="name_review_block_cus_location1_date pull-right"><?php echo date('M j, Y', strtotime($tbl_review->date));?></span></h4>
																<p class="review_block_cus_cont"><?php echo $tbl_review->review; ?>. </p>
																</div>	
														
													
													</div>
												<!-- <p class="helpful_cus pull-right"><span class="h_v_cus">You found this review helpful.  </span><a href="#"><i class="fa fa-check"></i> Helpful</a> </p>	 -->
												</div><?php } ?>
																<!--<div class="review-block odd_review-block">
													
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="http://localhost/booking/user/city_nights__lights.jpg">
															<h3 class="name_review_block_cus">Smith John</h3>
															<h4 class="name_review_block_cus_location">Location</h4>
																
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus"><span class="rating_section_cus">4.8</span>“Fantastic staying”  <span class="name_review_block_cus_location1_date pull-right">Jan 25 2016 </span></h4>
																<p class="review_block_cus_cont">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
																	</p>
																
																</div>	
														
													
													
													</div>
													<p class="helpful_cus pull-right"><span class="h_v_cus">2 helpful votes  </span><a href="#"> Helpful</a></p>
													</div>
																				<!-- <div class="review-block odd_review-block">
													
													<div class="col-md-12">
														
														<div class="col-md-2 rew_img-block">
															<img src="http://localhost/booking/user/city_nights__lights.jpg">
															<h3 class="name_review_block_cus">Smith John</h3>
															<h4 class="name_review_block_cus_location">Location</h4>
																
																</div>
															<div class="col-md-10 rew_content-block  ">
																<h4 class="titile_review_block_cus"><span class="rating_section_cus">4.8</span>“Fantastic staying”  <span class="name_review_block_cus_location1_date pull-right">Jan 25 2016 </span></h4>
																<p class="review_block_cus_cont">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
																	</p>
																
																</div>	
														
													
													
													</div>
													<p class="helpful_cus pull-right"><a href="#">Helpful</a></p>
													</div> -->
													
		
		
		</div>
		
		
		
		
	</div>
	
		
	</div>
	
	
	
	<!---footer---->
<?php   $this->load->view('layout/footer');   ?>



	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

</body>

</html> 