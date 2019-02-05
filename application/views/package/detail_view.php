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

	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>
	


</head>

<body data-spy="scroll" data-target=".scrollspy" data-offset="75" class="filter_block-cus_3">
	
	
	
	
	<!----------header--------->
	<?php   $this->load->view('layout/header');   ?>
										
							  
						
	
    <div id="result-wrapper">

    	
<?php   $this->load->view('layout/menu');   ?>

        
    	
				
		<div class="container">
			
			

			
			

			
			
			
			
			<div class="row">
				
				<div class="col-md-8">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li class="active">Holidays</li>
					</ol>
				</div>
				
				<div class="col-md-4 modify_btn">
					
					<!-- <a href="#" class="btn btn-default pull-right">MODIFY SEAECH</a> -->
					
				</div>
				
			</div>

			

			
			<div class="row">
				
				<div class="col-md-3">
				
					<div class="view_filter">
						
						<!-- <span class="sub"> BOOKING DETAILS </span> -->
						<span class="sub">REFINE RESULTS</span>	
						
						<form class="coontainer-fluid search_block" role="form" action="<?php echo base_url();?>holiday/search_list" method="get">
							
									<div class=" col-md-12 ">
							<div class="input-group">
								
								<input type="text" name="hidden-search" id="holiday_search" class="span2  hotel_name_cus_input_box" placeholder="Search">
							</div>
							</div>
								<div class=" col-md-6 ">
								<div class="input-group1">
								
									<span class="view_label cus_room_title_2">Night(s)</span>
							<select class="form_search" id="reg_mem_type" name="nights" value="" autocomplete="off">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
							</div>
							</div>
											<div class=" col-md-6 ">
								<div class="input-group1">
								
									<span class="view_label cus_room_title_2">Day(s)</span>
							<select class="form_search" id="reg_mem_type" name="days" value="" autocomplete="off">
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
							</div>
							
							</div>
						
							
						<div class=" col-md-12 p5r hj_l">
							<!--<p class="sidebar_sub"><a href="#">Submit</a></p>-->
							<input type="submit" name="search"  id="holiday_button" class="btn btn-primary" value="Search" disabled="" /> 
							</div>
							
							</form>
				
							
							<div id="new_rooms">
										 </div>
							
						
					</div>
					
				</div>
				
				<?php if(!empty($details)) {
// 						
				// $state = $this->Hotels_model->location($details->state);
// 				
				// $image = $this->Hotel_detail_model->imagesById($details->id);
// 				
				// $facilities = $this->Hotel_detail_model->facilitiesById($details->id);
// 				
				// $room_detail = $this->Room_detail_model->roomsByHotel($details->id);
					?>
				<div class="col-md-9 ">
					
					<div class="row">
						<div class="col-md-12">
							<div class="view_hotel_name">
								
								<div class="container-fluid">
									<div class="col-md-9 no_padding_l">
										<h1 class="view_hotel_name_cus"><?php echo $details->title; ?></h1>
										<!-- <span class="star-rating"> 
											<span class="fa fa-star gold" data-rating="1"></span>
											<span class="fa fa-star gold" data-rating="2"></span>
											<span class="fa fa-star gold" data-rating="3"></span>
											<span class="fa fa-star gold" data-rating="4"></span>
											<span class="fa fa-star-o" data-rating="5"></span>
										</span> -->
										<p><?php echo $details->nights.' Night(s), '. $details->days .' Day(s) Package';?></p>
									</div> 
								<div class="col-md-3 no_padding_l no_padding_r">
										<!--<span class="gen_info">Sat, 31 Oct - Mon, 2 Nov </span>
										<span class="gen_info">2 rooms, 4 adults, 4 children</span>--->
										
										
										<?php 
							$seasonal = $this->Packages_model->get_price($details->id);
							if(!empty($seasonal)):
							$two_star =  json_decode($seasonal[0]->seasonal_two_star);
							$three_star = json_decode($seasonal[0]->seasonal_three_star);
							$four_star =  json_decode($seasonal[0]->seasonal_four_star);
							$five_star =  json_decode($seasonal[0]->seasonal_five_star);
							endif;
							
							$off_seasonal = $this->Packages_model->get_price_off($details->id);
							if(!empty($off_seasonal)):
							$two_star =  json_decode($off_seasonal[0]->off_seasonal_two_star);
							$three_star =  json_decode($off_seasonal[0]->off_seasonal_three_star);
							$four_star =  json_decode($off_seasonal[0]->off_seasonal_four_star);
							$five_star =  json_decode($off_seasonal[0]->off_seasonal_five_star);
							
							endif;
							
							
							function small_price($value)
							{
								$filter_array= array_filter(func_get_args());
								
								if(!empty($filter_array))
								{
								return min(array_filter(func_get_args()));
								}
								else
								{
									return 0;
								}
							//return min((func_get_args()));
							}
							$a= $two_star[0];
							$b=$three_star[0];
							$c=$four_star[0];
							$d=$five_star[0];
							
							$price = small_price($a,$b,$c,$d);
					

							?>
							
							<?php if(!empty($price))
						{?>
										<span class="price"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
										<?php 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo $price;
										} else if(!$this->session->userdata('currency')){
										echo $price;
										} else {
										echo convertCurrency($price, $this->session->userdata('default'), $this->session->userdata('currency'));
										}
										?></span>
						<?php }?>										<a href="#" class="btn btn-primary btn-sm pull-right select_padding">BOOK NOW</a>
									</div> 
									
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="row">

				<div class="container-fluid">		
						<div class="col-md-12 scrollspy ">
							
							
							<nav class="navbar" id="sticky_navbar">
							  <div class="container-fluid" id="sticky_navbar_inner">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
							      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
							      
							    </div>
							
							    <!-- Collect the nav links, forms, and other content for toggling -->
							    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							      <ul class="nav navbar-nav">
							        <li class="active"><a href="#section1">Images</a></li>
							        <li><a href="#section2">Overview</a></li>
							        <li><a href="#section3">Itinerary</a></li>
							        <li><a href="#section4">Inclusions / Exclusions</a></li>
							        <li><a href="#section5">Price & Validity</a></li>
									<?php 
							if(!empty($vehicle))
							{?><li><a href="#section6">Available Vehicles</a></li><?php }?>
							      </ul>
							    </div><!-- /.navbar-collapse -->
							  </div><!-- /.container-fluid -->
							</nav>
							
							
							
							<!-- Image slide show >> -->
							<section id="section1">
							<div class="view_main_wrapper popup-gallery">
								<!---<div class="special_offers_cus_block"><p class="special_offers_cus">SAVE up to <span class="offer-highlight-title_cus"> 50%</span> TODAY </p></div> --->
								
								
									<div id="sync1" class="owl-carousel">
										
										
										<?php foreach ($img as $slider) { ?>
										
									  <div class="item">
									  	<h1>
									  		<a href="../../<?php echo $slider->original_image; ?>">
									  			<img src="../../<?php echo $slider->original_image; ?>" />
									  		</a>
									  	</h1>
									  </div>
									  
									  <?php } ?>
									</div>
									
									
									<!-- Thumbs >> -->
									<div id="sync2" class="owl-carousel">
										
										<?php foreach ($img as $slider) { ?>
										
									  <div class="item" style="background: url(../../<?php echo $slider->thumb_image; ?>) no-repeat center center; background-size: cover;">
									  	
									  </div><?php } ?>
									  
									</div>
									<!-- Thumbs << -->
								
								
								
								
								
								
								
									

							</div>
							<!-- Image slide show << -->
							</section>
							
							<section class="each_section" id="section2">
									
									<h1 class="each_section_cus">
										  Overview
									</h1>
									
									<div class="container-fluid no_padding_l no_padding_r" >
										<div class="col-md-12 no_padding_l no_padding_r">
											<p class="day_night_block-cus"><b><?php echo $details->title; ?></b></p>
											<p class="duration_block_cus"><b>Duration :  </b><?php echo $details->nights.' Night(s), '. $details->days .' Day(s)';?></p
											<p class="package_over_view_cus"><?php echo $details->description;?></p>
										</div>
				
									</div>
									
											
							</section>



							<div class="each_section cus_itinery_cus" id="section3">
								<h1>
									Itinerary
								</h1>

								<div class="container-fluid no_padding_l no_padding_r" >
									
									<?php foreach ($itn as $itinerary) { ?>
										
									<div class="hotel_info_row row no_margin_l no_margin_r">
										<div class="col-md-3">
											<span class="name">Day <?php echo $itinerary->day; ?>: <span class="day_title_cus"> <?php echo $itinerary->title; ?></span></span>
										</div>
										<div class="col-md-9"><?php echo $itinerary->description; ?></div>
									</div>
									
									<?php } ?>
									
									<!-- <div class="hotel_info_row row no_margin_l no_margin_r">
										<div class="col-md-3">
											<span class="name">Day 2: <span class="day_title_cus">  Dubai (City Tour + Dhow Cruise)</span></span>
										</div>
										<div class="col-md-9">
											After breakfast at hotel proceed to a city tour of Dubai, Sample the historic sites and vibrant cosmopolitan life of Dubai on this comprehensive tour. The tour starts with a photo-stop at the famous landmark of Dubai, Burj Al Arab. Proceed to Jumeirah, the picturesque palace and residential area of Dubai, also home to the famous Jumeirah Mosque. The tour continues to Al Bastakiya, the old part of Dubai, to reach the museum located in Al Fahidi Fort. All aboard the Abra (water taxi) to cross the Creek to the spice souk; on your return, there is time to shop in the most famous landmark of Dubai – the Gold souk.
										</div>
									</div>
									
									<div class="hotel_info_row row no_margin_l no_margin_r">
										<div class="col-md-3">
											<span class="name">Day 3: <span class="day_title_cus">  Dubai (Desert Safari with Belly Dance & Bar Be Que)</span></span>
										</div>
										<div class="col-md-9">
											After breakfast enjoy your day at leisure, later today enjoy Desert Safari. This tour departs in the afternoon across the desert with photo-stops during an exciting dune drive to visit a camel farm. The drive continues across the desert. Watch the beautiful sunset in the desert; reach our campsite where you have the opportunity to do camel riding, sand boarding and try out a henna design on hands or feet. After working up an appetite enjoy a delicious barbecue dinner and a shisha (the famous Arabic water pipe). Before returning watch our belly dancer performing her shows around the campfire by starlight. Evening return to hotel, Stay overnight at hotel in Dubai (B, D)
										</div>
									</div>
										<div class="hotel_info_row row no_margin_l no_margin_r">
										<div class="col-md-3">
											<span class="name">Day 4:   <span class="day_title_cus">Depart Dubai (Flight: TBA)</span></span>
										</div>
										<div class="col-md-9">
											After breakfast tour finishes with check out from hotel and transfer to Dubai airport to board return flight to home with lots of sweet memories (B)
										</div>
									</div> -->
										
								</div>

								

								
							</div>
							

							
							<div class="each_section" id="section4">
								<h1>
									Inclusions / Exclusions
								</h1>
								<div class="container-fluid no_padding_l no_padding_r  packages_list_block_cus_in_ex_clusion_details_block" >
									
									<div class="packages_list_block_cus_in_ex_clusion_details">
									
											<h1 class="title_cus_package">Inclusion Details</h1>
											<ul class="list_cus_package_block1">
												
											<?php echo $details->inclusion; ?>
												
											<!-- <li> Accommodation with private facilities on single, double / twin or triple sharing room</li>
											<li> Arrival / departure transfers on SIC (seat in coach) basis</li>
											<li> Service of airport representative on arrival / departure transfers for assistance</li>
											<li> Meals as specified (B=Breakfast, D= Dinner)</li>
											<li> Half day guided city tour of Dubai on SIC (seat in coach) basis</li>
											<li> Evening Dhow Cruise followed by dinner</li>
											<li> Desert Safari on 4x4 vehicles followed by belly dance and BBQ dinner, camel ride, henna painting</li>
											<li>Tourism Dirham Fee (AED15.00 Per Room / Night)</li>
											<li> All applicable & current taxes</li> -->
											</ul>
											
											<h1 class="title_cus_package">Exclusion Details</h1>
											<ul class="list_cus_package_block1">
												
											<?php echo $details->exclusion; ?>	
											
											<!-- <li> International air tickets</li>
											<li> Visa to United Arab Emirates</li>
											<li>Meals other than specified in the inclusions</li>
											<li>Early check in or late check out, (same is subject to availability and on hotels discretion)</li>
											<li> Tips & Gratuities, Travel & Medical Insurance, Camera and video permits,</li>
											<li> Expenses incurred due to train cancellation or delay,</li>
											<li> Any expense of a personal nature, like drinks, laundry, telephone calls, mini bar, etc, any</li>
											<li> optional excursion or tour, any other expense not mentioned in prices include column.</li>
											<li> Anything, not mentioned above in the list of “What Includes”</li> -->
											</ul>
										
										</div>
										
										
									

									
									
				
						
									

									</div>
									
									
									
								</div>
								
																		<div class="each_section cus_price_validity" id="section5">
								<h1 class="each_section_cus">
									Price & Validity
								</h1>
								<div class="container-fluid no_padding_l no_padding_r" >
									<table cellspacing="0" cellpadding="0" border="0" class="pricing_table_cus col-md-12">
                                <tbody><tr>
                                    <th>Hotel Category</th>
                                    <th>Price (Per Person)</th>
                                   <!-- <th>Hotel Options</th>-->
                                </tr>
                                
                                <?php 
                                // $star3 = array_filter(json_decode($price->off_seasonal_two_star));
                                // if(count($star3) > 0) { 
								if(!empty($a)):
								?>
                                <tr>
                                	<td>2 Star</td>
                                	<td>Rs <?php echo $a;?></td>
                                	
                                </tr>
                                <?php endif;
								if(!empty($b)):
								?>
                                <tr>
                                	<td>3 Star</td>
                                	<td>Rs <?php echo $b;?></td>
                                	
                                </tr>
                                <?php endif;if(!empty($c)):
								?>
                                <tr>
                                	<td>4 Star</td>
                                	<td>Rs <?php echo $c;?></td>
                                	
                                </tr>
                                <?php endif;
								if(!empty($d)):
								?>
                                <tr>
                                	<td>5 Star</td>
                                	<td>Rs <?php echo $d;?></td>
                                	
                                </tr>
                                <?php endif;
								?>
                                
                                  </tbody></table>
                                                
                                                <?php
												if(!empty($seasonal)):
												$from_date =  strtotime($seasonal[0]->seasonal_valid_from);
												$in_month=date("M",$from_date);
											    $in_year=date("Y",$from_date);
											    $in_date=date("d",$from_date);
												
												$to_date = strtotime($seasonal[0]->seasonal_valid_to);
												$to_month=date("M",$to_date);
											    $to_year=date("Y",$to_date);
											    $to_date=date("d",$to_date);
												?>
								<p class="valid_date_cus_hotel_list_page">
								<b>Valid From: </b> <?php echo $in_date." ". $in_month. " ".  $in_year;?>   |  
								<b>Valid Until: </b> <?php echo $to_date." ". $to_month. " ".  $to_year;?>
								</p>
												<?php
												endif;
												if(!empty($off_seasonal)):
												$from_date =  strtotime($off_seasonal[0]->off_seasonal_valid_from);
												$in_month=date("M",$from_date);
											    $in_year=date("Y",$from_date);
											    $in_date=date("d",$from_date);
												
												$to_date = strtotime($off_seasonal[0]->off_seasonal_valid_to);
												$to_month=date("M",$to_date);
											    $to_year=date("Y",$to_date);
											    $to_date=date("d",$to_date);
												?>
							<p class="valid_date_cus_hotel_list_page">
							<b>Valid From: </b> <?php echo $in_date." ". $in_month. " ".  $in_year;?>    |   
							<b>Valid Until: </b> <?php echo $to_date." ". $to_month. " ".  $to_year;?>
							</p>
												<?php
												endif;
												?>

								</div>
							</div>
							
							<?php 
							if(!empty($vehicle))
							{?>
							<div class="each_section" id="section6">
								<h1 class="each_section_cus">
									Available Vehicles
								</h1>
								<div class="container-fluid no_padding_l no_padding_r" >
									<table cellspacing="0" cellpadding="0" border="0" class="pricing_table_cus col-md-12">
                                <tbody><tr>
                                    <th>Vehicle</th>
                                    <th>Capacity</th>
                                    <th>Price</th>
                                </tr>
                                <?php foreach ($vehicle as $tbl_vehicle) {?>
                                <tr>
                                	<td><?php echo $tbl_vehicle->vehicle_name; ?></td>
                                	<td><?php echo $tbl_vehicle->capacity; ?></td>
                                	<td><?php echo $tbl_vehicle->price; ?></td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                                    <td>Vehicle Name Here</td>
                                                    <td>7</td>
                                                    <td>Rs. 1000</td>
                                                </tr><tr>
                                                   <td>Vehicle Name Here</td>
                                                    <td>8</td>
                                                    <td>Rs. 1000</td>
                                                </tr>  -->                           </tbody></table>
								</div>
							</div>
							
							<?php }?>
														

								
							
							</div>
				
</div>

							
							
							

						
							
							
					
							
						
						
					</div>
					<form action="<?php echo base_url();?>packages/checkout" method="get" >
					<input type="hidden" name="package" value="<?php echo $details->id;?>"/>
					<input type="hidden" name="person" id="person" value="1"/>
					<input type="hidden" name="hotel" value="<?php if($price == $a){ echo "2"; } if($price == $b){ echo "3";  }if($price == $c){ echo "4";  } if($price == $d){ echo "5";  }?>" />
					<button type="submit" name="submit" class="packages_book_now_btn">Book Now</button>
					
 					<!--<p class="packages_book_now_btn">Book Now </p>-->
					
					</form>
					
				</div>
				

		  </div> <?php } ?>
			
			
		</div>
				


       </div>
       <!-- /#page-wrapper -->
       

<!---footer---->
<?php   $this->load->view('layout/footer');   ?>





 

 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>js/login.js"></script>
    
     <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>

<script src="<?php echo base_url();?>js/detail_search.js"></script>
	

	<script>
		$(document).ready(function(){
		    $("[data-toggle=tooltip]").tooltip();
		});
	</script>
	
	

	
	<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
		
	<!-- Image slider >> -->
	<script>
		$(document).ready(function() {
 
		  var sync1 = $("#sync1");
		  var sync2 = $("#sync2");
		 
		  sync1.owlCarousel({
		    singleItem : true,
		    slideSpeed : 500,
		    navigation: true,
		    pagination:false,
		    afterAction : syncPosition,
		    responsiveRefreshRate : 200,
		  });
		 
		  sync2.owlCarousel({
		    items : 10,
		    itemsDesktop      : [1199,10],
		    itemsDesktopSmall     : [979,10],
		    itemsTablet       : [768,8],
		    itemsMobile       : [479,4],
		    pagination:false,
		    responsiveRefreshRate : 100,
		    afterInit : function(el){
		      el.find(".owl-item").eq(0).addClass("synced");
		    }
		  });
		 
		  function syncPosition(el){
		    var current = this.currentItem;
		    $("#sync2")
		      .find(".owl-item")
		      .removeClass("synced")
		      .eq(current)
		      .addClass("synced")
		    if($("#sync2").data("owlCarousel") !== undefined){
		      center(current)
		    }
		  }
		 
		  $("#sync2").on("click", ".owl-item", function(e){
		    e.preventDefault();
		    var number = $(this).data("owlItem");
		    sync1.trigger("owl.goTo",number);
		  });
		 
		  function center(number){
		    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		    var num = number;
		    var found = false;
		    for(var i in sync2visible){
		      if(num === sync2visible[i]){
		        var found = true;
		      }
		    }
		 
		    if(found===false){
		      if(num>sync2visible[sync2visible.length-1]){
		        sync2.trigger("owl.goTo", num - sync2visible.length+2)
		      }else{
		        if(num - 1 === -1){
		          num = 0;
		        }
		        sync2.trigger("owl.goTo", num);
		      }
		    } else if(num === sync2visible[sync2visible.length-1]){
		      sync2.trigger("owl.goTo", sync2visible[1])
		    } else if(num === sync2visible[0]){
		      sync2.trigger("owl.goTo", num-1)
		    }
		    
		  }
		 
		});
	</script>
	<!-- Image slider << -->
	
	
	<!-- Magnific Popup core JS file -->
	<script src="<?php echo base_url();?>js/Magnific_Popup.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
					return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
					}
				}
			});
		});
	</script>
		
	
	<script src="<?php echo base_url();?>js/bootstrap-scoll-spy.js"></script>
	
	
	<script>
		$(window).scroll(function() {
		  if ($(document).scrollTop() > 200) {
		  	// $('#top_block').css('display','block');
		    $('#sticky_navbar').addClass('stick_me');
		    $('#sticky_navbar_inner').removeClass('container-fluid');
		    $('#sticky_navbar_inner').addClass('container');
		  } else {
		    $('#sticky_navbar').removeClass('stick_me');
		    $('#sticky_navbar_inner').addClass('container-fluid');
		    $('#sticky_navbar_inner').removeClass('container');
		    // $('#top_block').css('display','none');
		  }
		});
	</script>
	
	
	<script>
		// ------------------------------
		// http://twitter.com/mattsince87
		// ------------------------------
		
		function scrollNav() {
		  $('.nav a').click(function(){  
		    //Animate
		    $('html, body').stop().animate({
		        scrollTop: $( $(this).attr('href') ).offset().top - 60
		    }, 250);
		    return false;
		  });
		  $('.scrollTop a').scrollTop();
		}
		scrollNav();
	</script>
    
	
   
    <script>

    	$(document).ready(function() {
	    	$(".s_show_more").click(function(){
			    	
			    				    	
			    var hide_me = $(this).parent().parent().next();

			    var className = hide_me.attr('class');

			    if(className=="show_all_details")
			    {
			    	hide_me.fadeToggle();
			    }
			    	
			});
    	});
    </script>
   
   

    

</body>

</html>


