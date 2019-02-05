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
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap-datepicker.css" rel="stylesheet">
    
     <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">



    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->





</head>

<body class="htl_r rem_cus_m">
	
	

	
	
	
	
<?php

$this->load->view('layout/header');

?>
	

    <div id="page-wrapper">
    	
    	<div id="search-banner" class="resort_img_search_banner" style="background: url(<?php echo base_url();?>img/resort_main_bg.jpg) no-repeat center center; background-size: cover;">
            
            <div class="container">
            	<br><br>
            	
            	<h1>Book Domestic & International Hotels</h1>
				
				<!-- <p>Find best deals across 200,000+ hotels worldwide</p> -->
				
				<br><br>		
	<br>
	<br>

				<div class="row">
					
					<nav role="navigation" class="navbar no_padding_l no_padding_r no_border">
					    
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					        </button>
					    </div>
					    <!-- Collection of nav links and other content for toggling -->
					    <div id="navbarCollapse" class="collapse navbar-collapse navbar no_padding_l no_padding_r no_margin no_border">
					        <ul class="nav navbar-nav home_search_nav">
					            <li <?php if($sub_cat == 'hotels') echo 'class="active"'; ?> id="hotels_active"><a class="hotels" href="<?php echo base_url().'hotels';?>"><span class="nav_menu_ico ico_hotel"></span> Hotels</a></li>
					            <li <?php if($sub_cat == 'resorts') echo 'class="active"'; ?> id="resort_active"><a class="resort" href="<?php echo base_url().'resorts';?>"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>
										           

							  <li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?> id="ayurveda_active"><a class="ayurveda" href="<?php echo base_url().'ayurveda';?>"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li <?php if($sub_cat == 'yoga') echo 'class="active"'; ?> id="yoga_active"><a class="yoga" href="<?php echo base_url().'hotel-packages';?>"><span class="nav_menu_ico ico_yoga"></span> Hotel Packages</a></li>
					           <!--  <li <?php if($sub_cat == 'holiday') echo 'class="active"'; ?> id="package_active"><a class="package" href="<?php echo base_url().'holiday';?>"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li> --> 
					            <li <?php if($sub_cat == 'home') echo 'class="active"'; ?> id="home_active"><a class="home" href="<?php echo base_url().'homestays';?>"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?> id="apart_active"><a class="apart" href="<?php echo base_url().'apartments';?>"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					      </ul>
					    </div>
					</nav>
					
					<div class="col-xs-12 col-sm-12 col-md-12 search_options">

						
						<form role="form" method="get" name="search_form" class="sear_cus"  action="<?php echo base_url(); ?>resorts/search_list">														
							<div class="container-fluid">					
								<!-- Search Input >> -->
								<div class="col-md-8">
								  <div class="form-group resortc">
								    <!-- <input type="text" id="hidden-search"  name="hidden-search" autocomplete="off" class="form-control" id=""  placeholder="Enter City name, Area name or Hotel name..">
								    	<input id="display-search" type="text" autocomplete="off" readonly="readonly" />										
											<div id="artists"></div> -->
											 <!--mirrored input that shows the actual input value-->
											<!-- <input id="search" name="hidden-search" onkeyup="InitAutoComplete(event, 'search');" autocomplete="off"  class="form-control" />
								 -->
								<input id="hidden-search" name="hidden-search"   autocomplete="off"  class="form-control auto"  placeholder="City, Area or Resort name"/>
								
								<input type="hidden" name="category" id="category" class="cat_name" value="<?php echo $cat_id; ?>" />
								  </div>
								</div>
							  	<!-- Search Input << -->			  	
							  	
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6 ">
								  	<div class="input-group">
					                  <span id="sandbox-container">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-in" name="check_in" id="valid_from" >
				                        </span>
									</div>
							  	</div>
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6 ">
									<div class="input-group">
				                  		<span id="sandbox-container4">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-out" name="check_out" id="valid_to"  >
				                        </span>
									</div>
							  	</div>
					       </div>
					       <div class="date_alert" style="display : none;">Please Enter a valid checkout date</div>
					       
					       <div class="container-fluid" id="rooms">								
									<div class="col-md-2 col-sm-3 col-xs-3">
										
										<label>Rooms</label>										
										<select class="form_search" id="reg_mem_type" name="mem_type" value="" autocomplete="off">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>	
											<option  value="1">More</option>	
											
										</select>
										<input type="hidden" id="selected_room" value="1" autocomplete="off" />
									</div>																																				
									<div class="col-md-10 col-sm-9 col-xs-9 no_padding_l no_padding_r">
										
										<div class="demo_div" id="room-1">
											<div class="container-fluid no_padding_l no_padding_r" id="age-1">
												
												<div class="col-md-2 col-sm-4 col-xs-4">
													<p>Room 1</p>
												</div>
												
												<div class="col-md-2 col-sm-4 col-xs-4 clone_me">
													<label>Adults</label>
													<select class="form_search" name="adults[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
												</div>
												<div class="col-md-2 col-sm-4 col-xs-4 clone_me">
													<label>Children(0-13yrs)</label>
													<select class="form_search" name="childrens[]" id="childrens-1" onchange="childs(1);" autocomplete="off">
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
													<input type="hidden"  id="prev-childs-1" name="prev-childs-1[]" value="0" autocomplete="off" />
												</div>																																																
											</div>
										</div>																														
										<div id="new_rooms">
										 </div>

										
									</div>																	
							</div>														  							 						  	
						  	<div class="container-fluid">
						  		
						  		<div class="col-md-2 pull-right">
									<label for="pwd"></label>
									<div class="form-group sfb">
										
								    	<button type="submit" class="btn btn-primary pull-right" id="search_hotels"> SEARCH </button>
								    	
								  	</div>
							  	</div>
						  		
						  	</div>						  							  							  						  		
						</form>
						

						
					</div>
					
				</div>
				
            	
            </div>
            		
        </div>
        
        
        
        
		        
        
        		<div class=" wrapper-row htl_ppr_blk">
				<div class="container">	
				<div class="row">	
				
					
							<div class="col-md-4">
							<div class="block1_c">
									<div class="abt_us_h">
							<div class="img_blk"><img src="img/experience.png"> </div>
							<h1 class="owl_slider_title mr_h_t">  <!--<span><i class="fa fa-home"></i></span> --> About our company</h1>
							<p class="abt_cnt-h">Booking wings.com is a concerted effort by a group of travel enthusiasts by Aman Hospitality Solutions to help other travel buffs and also to make travelling easier for the new bees. The possibility of waking up in your bedroom in your home town,
							</p>
						</div>
						
						</div>
						</div>
								<div class="col-md-4">
							
							
							
							
							<div class="block1_c">
									<div class="abt_us_h">
							<div class="img_blk"><img src="img/abut1_imhh.png"> </div>
							<h1 class="owl_slider_title mr_h_t"> <!--<span><i class="fa fa-home"></i></span> -->kerala</h1>
							<p class="abt_cnt-h">  To feel pampered in the lap of nature, to enjoy the exotic sights, to experience life like never before, Booking wings welcomes each one of you to God's own country-- Kerala.
Be our guests and we are sure that the services we offer you will make your journey something above the rest. 
In fact, we believe that the journey itself is the destination 
							</p>
						</div>
						
						</div>
						</div>
						
						
						<div class="col-md-4">
							
							
						
							
							<div class="block1_c">
									<div class="abt_us_h">
						
								<h1 class="owl_slider_title why_tit"> <span><i class="fa fa-gift"></i></span> WHY  BOOKING WINGS</h1>
							<ul class="ul_list-h">
					
						<li>
						<div class="row col-xs-12 col-md-12 col-lg-12 strng">
										<div class="col-md-12">
					<p class="img5_cs_ico"><img src="img/travel_img.png"></p>
					<p class="Customer_satisfaction_heading"><strong>Dedicated travel portal kerala as destinations.</strong></p>
					</div>
			
					
					</div>
					
					</li>
						<li>
						<div class="row col-xs-12 col-md-12 col-lg-12 ">
				
						<div class="col-md-12">
						
					<p class="img5_cs_ico"><img src="img/doallr_img.png"></p>
					<p class="Customer_satisfaction_heading"><strong>Clear pricing with out hidden charges</strong></p>
					</div>
					
					</div>
					
					</li>
								<li><div class="row col-xs-12 col-md-12 col-lg-12">
					<div class="col-md-12">
					<p class="img5_cs_ico"><img src="img/cusmr_review.png"></p><p class="Customer_satisfaction_heading"><strong>Customer reviews</strong></p>
					
					</div>
				
					</div>
					
					</li>
					<li><div class="row col-xs-12 col-md-12 col-lg-12">
				
					<div class="col-md-12">
					<p class="img5_cs_ico"><img src="img/checkout_h.png"></p><p class="Customer_satisfaction_heading"><strong>Simple Check out</strong></p>
					
					</div>
					</div>
					
					</li>
						<li><div class="row col-xs-12 col-md-12 col-lg-12">
			
				<div class="col-md-12">
					<p class="img5_cs_ico"><img src="img/savings_h.png"></p><p class="Customer_satisfaction_heading"><strong>Great savings for all bookings </strong></p>
					
					</div>
					</div>
					
					</li>
						<li><div class="row col-xs-12 col-md-12 col-lg-12">
				
					<div class="col-md-12">
					<p class="img5_cs_ico"><img src="img/booking_reservd.png"></p><p class="Customer_satisfaction_heading"><strong>Real time booking experience.</strong></p>
					
					</div>
					</div>
					
					</li>
				
					</ul>
						</div>
						
						</div>
						</div>
					
	
					
				</div>
				</div>
				</div>
        
    	
				
        
    	
				
		<div class="container">	

			
			
						
			<div class="row wrapper-row wrp1">
				
				<div class="col-md-12">
					<h1 class="owl_slider_title"> <span><i class="fa fa-commenting-o"></i></span> New Listings</h1>
				</div>
				
				<?php
				
				if(!empty($new)) { foreach ($new as $hotel_new) { 
					
					$img = $this -> Hotels_model -> img_thumb($hotel_new -> id);
					
					$cat = $this -> db -> where('id',$hotel_new->sub_category_id) -> get('tbl_sub_category') -> row();
					
					$enc_id=$this->encrypt->encode($hotel_new->id);
					$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id); 
					?>
					
					
				
		    	<div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="<?php echo base_url();?>resorts/detail/<?php echo $enc_id; ?>">
				        <div class="thumbnail">
				        	<span class="category"> <p><?php echo $cat -> name; ?></p> </span>
							<div class="h_i">
				          	<img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo base_url();?><?php echo $img -> thumb; ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"></div>
					    	<div class="caption">
					        	<h4><?php echo $hotel_new->title; ?></h4>
					            <!-- <p><?php echo character_limiter($hotel_new->des, 100); ?></p> -->
					            <span class="star-rating">
					            	
					            <?php for($i=1;$i<=$hotel_new->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$hotel_new->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
					            
					            </span>
					            <p></p>
					        </div>
					        <div class="location">
					        	<i class="fa fa-location-arrow"></i> <?php echo $hotel_new->place; ?>
					        </div>
				        </div>
					</a>
		      	</div>
		      	
		      	<?php } } ?>
		      	
		      
		    </div>
		    
		    
			
			
			
			
			<div class="row wrapper-row ">

						<div class="col-md-4">
							
							
							<h1 class="owl_slider_title"> <span><i class="fa fa-pencil"></i></span> Reviews</h1>
							<?php 
							
							if(!empty($tbl_review)): //echo $tbl_review; exit;
							foreach($tbl_review as $review): 
							 $enc_id=$this->encrypt->encode($review->hotel_id);
					$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id); 
					?>
	          
							<div class="home_reviews">
								<div class="media-body">
									<h4><?php echo character_limiter($review->title, 30); ?></h4>
									<span class="star-rating block"> 
										<?php for($i=1;$i<=$review->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            
					            <?php for($i=0;$i<(5-$review->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
									</span>
									<a class="hotel_name" href="<?php echo base_url;?>resorts/detail<?php echo $enc_id;?>"><?php echo $review->hotel; ?></a>
									<p class="yt"><?php echo character_limiter($review->review, 30); ?> <a href="<?php echo base_url();?>reviews/<?php echo $review->hotel_id;?>">Read more.</a> </p>
									 <p class="rev_n"><span class="place pull-right"><?php echo $review->country; ?></span>
									<span class="name pull-right"><?php echo $review->first_name . ' ' . $review->last_name; ?></span></p>
								</div>
								<div class="media-right">
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo base_url();?><?php echo $review->photo; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;">
								</div>
							</div>
							
							<?php endforeach; endif; ?>
							
							<!-- <div class="home_reviews">
								<div class="media-body">
									<h4>Review title Donec sed odio ...</h4>
									<span class="star-rating block"> 
										<span class="fa fa-star gold" data-rating="1"></span>
										<span class="fa fa-star gold" data-rating="2"></span>
										<span class="fa fa-star gold" data-rating="3"></span>
										<span class="fa fa-star gold" data-rating="4"></span>
										<span class="fa fa-star-o" data-rating="5"></span>
									</span>
									<a href="#"><span class="hotel_name">Hotel name</span></a>
									<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. <a href="#">Read more.</a> </p>
									<span class="place pull-right">Thiruvananthapuram</span>
									<span class="name pull-right">Sumesh S M</span>
								</div>
								<div class="media-right">
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/hot_deals-2.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
								</div>
							</div> --
							
							<div class="home_reviews">
								<div class="media-body">
									<h4>Review title Donec sed odio ...</h4>
									<span class="star-rating block"> 
										<span class="fa fa-star gold" data-rating="1"></span>
										<span class="fa fa-star gold" data-rating="2"></span>
										<span class="fa fa-star gold" data-rating="3"></span>
										<span class="fa fa-star gold" data-rating="4"></span>
										<span class="fa fa-star-o" data-rating="5"></span>
									</span>
									<a href="#"><span class="hotel_name">Hotel name</span></a>
									<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. <a href="#">Read more.</a> </p>
									<span class="place pull-right">Thiruvananthapuram</span>
									<span class="name pull-right">Sumesh S M</span>
								</div>
								<div class="media-right">
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/hot_deals-2.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
								</div>
							</div>-->
							
							
						</div>
					
					
						<div class="col-md-8">
	
							<h1 class="owl_slider_title"> <span><i class="fa fa-map-marker"></i></span> Top Booking</h1>
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/tvm_img.png" />
									<div class="label"> Thiruvananthapuram </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/cochin_img.png" />
									<div class="label"> Cochin </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/kozhikodu_img.png" />
									<div class="label"> Kozhikodu </div>
								</div>
							</div>
							
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/varkala_img.png" />
									<div class="label"> Varkala </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/Idukki_img.png" />
									<div class="label"> Idukki </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-4 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/wayanadu.png" />
									<div class="label"> Wayanadu </div>
								</div>
							</div>
							
							
						</div>
					
	
					
				</div>
			
			
			
			
		</div>
				
				
		
				

       </div>
       <!-- /#page-wrapper -->
	
	
		

	
	
			
	
	<?php

$this->load->view('layout/footer');

?>
	
  
  
  
  
        
        


    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

   
    
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>
        

    

	
	<script src="<?php echo base_url();?>js/demo.js"></script>
	


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script> 
<script type="text/javascript">
$(function() {
    //autocomplete
	var cat_name = 'resorts';
    $(".auto").autocomplete({
        source: baseurl+"hotels/search_keyword/"+cat_name,
        minLength: 1
    });                

});
</script>

    
   
</body>

</html>
