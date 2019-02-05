<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Find different ayurveda packages available in Kerala and book ayurveda packages through Booking Wings and get great deals and offers.">
    <meta name="author" content="">


    <title>Ayurveda in Kerala | Ayurveda Packages Kerala – Booking Wings </title>

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>



</head>

<body class="htl_r hlr rem_cus_m">
	
	

	
	
	
	
<?php

$this->load->view('layout/header');

?>
	

    <div id="page-wrapper">
    	
    	<div id="search-banner" style="background: url(<?php echo base_url();?>img/ayurveda.jpg) no-repeat center center; background-size: cover;">
            
            <div class="container">
            		<br><br>
            	
            	<h1>Travel Easy, Fast and Safe !...</h1>
				
				<!-- <p>Find best deals across 200,000+ hotels worldwide</p> -->
				
							<br>
<br><br>
<br>


				<div class="row toper-row">
					
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
					          <!--  <li <?php if($sub_cat == 'resorts') echo 'class="active"'; ?> id="resort_active"><a class="resort" href="<?php echo base_url().'resorts';?>"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>-->
					            <li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?> id="ayurveda_active"><a class="ayurveda" href="<?php echo base_url().'ayurveda';?>"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li <?php if($sub_cat == 'yoga') echo 'class="active"'; ?> id="yoga_active"><a class="yoga" href="<?php echo base_url().'hotel-packages';?>"><span class="nav_menu_ico ico_yoga"></span> Hotel Packages</a></li>
					            <!--  <li <?php if($sub_cat == 'holiday') echo 'class="active"'; ?> id="package_active"><a class="package" href="<?php echo base_url().'holiday';?>"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>-->
					            <li <?php if($sub_cat == 'home') echo 'class="active"'; ?> id="home_active"><a class="home" href="<?php echo base_url().'homestays';?>"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?> id="apart_active"><a class="apart" href="<?php echo base_url().'apartments';?>"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					        </ul>

					    </div>
					</nav>
					
					<div class="col-xs-12 col-sm-12 col-md-12 search_options">

						
						<form role="form" method="get" name="search_form" class="sear_cus"   action="<?php echo base_url(); ?>ayurveda/search_list">														
							<div class="container-fluid bg-search">					
								<!-- Search Input >> -->
								<div class="col-md-8">
								  <div class="form-group ayurveda_c">
								    <!-- <input type="text" id="hidden-search"  name="hidden-search" autocomplete="off" class="form-control" id=""  placeholder="Enter City name, Area name or Hotel name..">
								    	<input id="display-search" type="text" autocomplete="off" readonly="readonly" />										
											<div id="artists"></div> -->
											 <!--mirrored input that shows the actual input value-->
											 <input id="hidden-search" name="hidden_search"  autocomplete="off"  class="form-control auto"  placeholder="Ayurveda package name  Eg: Panchakarma"/>
								
								<!---<input id="hidden-search" name="hidden-search"  autocomplete="off"  class="form-control auto" placeholder="Package name/ Hotel name"  />--->
								
								
								
								<input type="hidden" name="category" id="category" value="<?php echo $cat_id; ?>"/>
								  </div>
								</div>
							  	<!-- Search Input << -->			  	
							  	
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6">
								  	<div class="input-group">
					                  <span id="sandbox-container">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-in" name="check_in" id="valid_from" >
				                        </span>
									</div>
							  	</div>
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6">
									<div class="input-group">
				                  		<span id="sandbox-container4">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-out" name="check_out" id="valid_to"  >
				                        </span>
									</div>
							  	</div>
								<div class="col-md-2 pull-right searchButOutr1">
									<label for="pwd"></label>
									<div class="form-group sfb">
										
								    	<button type="submit" class="btn btn-primary pull-right" id="search_hotels"> SEARCH </button>
								    	
								  	</div>
							  	</div>
					       </div>
					       <div class="date_alert" style="display : none;">Please Enter a valid checkout date</div>
					       
					      													  							 						  	
						  	<!--<div class="container-fluid">
						  		
						  		
						  		
						  	</div>-->					  							  							  						  		
						</form>
						

						
					</div>
					
				</div>
				
            	
            </div>
            		
        </div>
        
        
        
        
        
    	<div class=" wrapper-row htl_ppr_blk wrapper-ch">
	<div class="container" style="width:100%;">
 	<h3 class="dest">Recommended Ayurveda Packages </h3>
	<!-- <h3>Top Destinations</h3> -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		
		 

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		 
			<div class="item active ayurvedaPack">
			
				<a href="<?php base_url();?>search_list?hidden_search=Panchakarma&packag=Panchakarma&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8 pull-left">
					<h4>Panchakarma</h4>
					<h5>In Ayurvedic medicine a fivefold detoxification procedures are claimed to eliminate the vitiated Doshas from the body </h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Panchakarma');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/1.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>search_list?hidden_search=Rejuvenation&packag=Rejuvenation&category=6&check_in=&check_out=">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8 pull-left">
					<h4>Rejuvenation (Rasayana)</h4>
						<h5>Rasayana therapy enriches rasa with nutrients to help one attain longevity, memory, intelligence & health</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Rejuvenation');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/2.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>search_list?hidden_search=Body Purification&packag=Body Purification&category=6&check_in=&check_out=">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Body Purification (Shodana)</h4>
						<h5>It is a curative line of treatment for all diseases which are not amenable to shamana chikitsa</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Body Purification');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/3.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Slimming&packag=Slimming&category=6&check_in=&check_out=">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Slimming (Weight Loss)</h4>
						<h5>To decrease weight and get rid of obesity naturally and gently.</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Slimming');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/4.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Stress Management&packag=Stress Management&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Stress Management</h4>
					<h5>Ayurvedic treatments for stress relief provide with relevant solutions both for Stress management as well as stress relief</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Stress Management');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
				<img src="<?php echo base_url();?>img/ayurveda/5.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>search_list?hidden_search=Beauty Care&packag=Beauty Care&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Beauty Care</h4>
						<h5>This is a special package designed to meet the needs of your body</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Beauty Care');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/6.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Anti Aging&packag=Anti Aging&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Anti Aging (Kayakalpa)</h4>
						<h5>Kaya Kalpa Chikitsa is a progeny of Ayurveda, a holistic approach to science of healing.</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Anti Aging');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/7.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Body Immunization&packag=Body Immunization&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Body Immunization</h4>
						<h5>This treatment is to enhance and preserve your natural Immunity of the body</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Body Immunization');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/8.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Get to know Ayurveda&packag=Get to know Ayurveda&category=6&check_in=&check_out=">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Get to know Ayurveda</h4>
						<h5>Getting benefit from the practice of Ayurveda and knowing Your Dosha</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Get to know Ayurveda');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/9.jpg">
					</div>
				</div>
			</a>
			
			<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Body, Mind & Soul&packag=Body, Mind & Soul&category=6&check_in=&check_out=">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Body, Mind & Soul</h4>
						<h5>Healing system that treats the whole person rather than simply treating individual symptoms.</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Body, Mind & Soul');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/10.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Punarjani&packag=Punarjani&category=6&check_in=&check_out=">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Punarjani</h4>
						<h5>A rebirth from your ailments</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Punarjani');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
				<img src="<?php echo base_url();?>img/ayurveda/11.jpg">
					</div>
				</div>
				</a>
				<a href="<?php echo base_url();?>ayurveda/search_list?hidden_search=Soukya&packag=Soukya&category=6&check_in=&check_out=">
				
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Soukya</h4>
						<h5>well being and a harmonious state of the mind, body and soul.</h5>
					<h6><?php echo $this->Ayurveda_model->package_count($cat_id,'Soukya');?> Packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/ayurveda/12.jpg">
					</div>
				</div>
				</a>
			</div>
			
			
			
			
			
			
			
	
		
  </div>

  <!-- Controls -->
 <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
</div>
				</div>
				</div>
        
        
		
		
				
	<!---	<div class="container">	
			

			
			
						
			<div class="row wrapper-row">
				
				<div class="col-md-12">
					<h1 class="owl_slider_title"> <span><i class="fa fa-commenting-o"></i></span> New Listings</h1>
				</div>
				
				<?php
				
				if(!empty($new)) { foreach ($new as $hotel_new) { 
					

					$img = $this -> Hotels_model -> img_thumb($hotel_new -> id);
					
					$cat = $this -> db -> where('id',$hotel_new->sub_category_id) -> get('tbl_sub_category') -> row();
					
					$enc_id=$this->encrypt->encode($hotel_new->ayurveda_id);
					$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id); 
					?>
					
					
				
		    	<div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="<?php echo base_url();?>ayurveda/detail/<?php echo $enc_id; ?>">
				        <div class="thumbnail">
				        	<span class="category"> <p><?php echo $cat -> name; ?></p> </span>
				          	<div class="h_i"><img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo base_url();?><?php echo $hotel_new -> thumb_image; ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"></div>
					    	<div class="caption">
					        	<h4><?php echo $hotel_new->title; ?></h4>
					        	<p>(<?php echo $hotel_new->hotel; ?>)</p>
					          
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
		    
		    
			
			
			
			
			<div class="row wrapper-row">

						<div class="col-md-4">
							
							
							<h1 class="owl_slider_title"> <span><i class="fa fa-pencil"></i></span> Reviews</h1>
							<?php 
							
							if(!empty($tbl_review)): //echo $tbl_review; exit;
							
							//print_r($tbl_review);
							foreach($tbl_review as $review): 
							 $enc_id=$this->encrypt->encode($review->ayurveda_id);
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
									<a class="hotel_name" href="<?php echo base_url();?>yoga/detail/<?php echo $enc_id;?>"><?php echo $review->hotel; ?></a>
									<p class="yt"><?php echo character_limiter($review->review, 30); ?> <a href="<?php echo base_url();?>reviews/<?php echo $review->hotel_id;?>">Read more.</a> </p>
									 <p class="rev_n"><span class="place pull-right"><?php echo $review->country; ?></span>
									<span class="name pull-right"><?php echo $review->first_name . ' ' . $review->last_name; ?></span> </p>
								</div>
								<div class="media-right">
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo base_url();?><?php echo $review->photo; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;">
								</div>
							</div>
							
							<?php endforeach; endif; ?>
							
							
							
							
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
			
			
			
			
		</div>--->
				
				
		
				

       </div>
       <!-- /#page-wrapper -->
	
	
		

	
	
			
	
	<?php

$this->load->view('layout/footer');

?>
	
  
  
  
  
        
        


    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>
    
    
    
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    
    
    <script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
    
    
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>
        

      
    <script type="text/javascript">
    	$(document).ready(function() {
 
		  $("#hot-deals").owlCarousel({
		    navigation:true,
		    singleItem:true,
		    autoPlay : false,
        	stopOnHover : true,
        	pagination : false,  // remove bullets
		    afterInit : function(elem){
		    var that = this
		    that.owlControls.prependTo(elem)
		    }
		  });
		  
		  
		  $("#latest-destinations").owlCarousel({
		    navigation:true,
		    singleItem:true,
		    autoPlay : false,
        	stopOnHover : true,
        	pagination : false,  // remove bullets
		    afterInit : function(elem){
		    var that = this
		    that.owlControls.prependTo(elem)
		    }
		  });
		  
		 
		});
    </script>

	
	<script src="<?php echo base_url();?>js/demo.js"></script>
	

	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
	var cat_name = 'ayurveda';
    //autocomplete
    $(".auto").autocomplete({
        source: baseurl+"hotels/ayurveda_keyword/"+cat_name,
        minLength: 1
    });                

});
</script>

<script type="text/javascript">
					
/* 					
 $(function() {
    var availableTags = [
      "Panchakrma",
      "Rejuvenation (Rasayana)",
      "Body Purification (Shodana)",
      "Slimming (Weight Loss)",
      "Stress Management",
      "Beauty Care",
      "Anti Aging (Kayakalpa)",
      "Body Immunization",
      "Get to know Ayurveda",
      "Body, Mind & Soul",
      "Punarjani",
      "Soukya",
     
    ];
    $( "#hidden-search" ).autocomplete({
      source: availableTags
    });
  }); */

</script>

    
   
</body>

</html>
