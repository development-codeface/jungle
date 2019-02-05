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

<body class="htl_r hlr">
	
	

	
	
	
	
<?php

$this->load->view('layout/header');

?>
	

    <div id="page-wrapper">
    	
    	<div id="search-banner" style="background: url(<?php echo base_url();?>img/holidays.jpg) no-repeat center center; background-size: cover;">
            
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
					          <!--  <li <?php if($sub_cat == 'resorts') echo 'class="active"'; ?> id="resort_active"><a class="resort" href="<?php echo base_url().'resorts';?>"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>-->
					            <li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?> id="ayurveda_active"><a class="ayurveda" href="<?php echo base_url().'ayurveda';?>"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li <?php if($sub_cat == 'yoga') echo 'class="active"'; ?> id="yoga_active"><a class="yoga" href="<?php echo base_url().'hotel-packages';?>"><span class="nav_menu_ico ico_yoga"></span> Hotel Packages</a></li>
					            <li <?php if($sub_cat == 'holiday') echo 'class="active"'; ?> id="package_active"><a class="package" href="<?php echo base_url().'holiday';?>"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>
					            <li <?php if($sub_cat == 'home') echo 'class="active"'; ?> id="home_active"><a class="home" href="<?php echo base_url().'homestays';?>"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?> id="apart_active"><a class="apart" href="<?php echo base_url().'apartments';?>"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					        </ul>
					        
					    </div>
					</nav>
					
					<div class="col-xs-12 col-sm-12 col-md-12 search_options">

						
						<form role="form" name="search_form" class="sear_cus" action="<?php echo base_url();?>holiday/search_list">														
							<div class="container-fluid ">					
								<!-- Search Input >> -->
								<div class="col-md-8">
								  <div class="form-group hloc">
								    <!-- <input type="text" id="hidden-search"  name="hidden-search" autocomplete="off" class="form-control" id=""  placeholder="Enter City name, Area name or Hotel name..">
								    	<input id="display-search" type="text" autocomplete="off" readonly="readonly" />										
											<div id="artists"></div> -->
											 <!--mirrored input that shows the actual input value-->
											<!-- <input id="search" name="hidden-search" onkeyup="InitAutoComplete(event, 'search');" autocomplete="off"  class="form-control" />
								 -->
								<input id="hidden-search" name="hidden-search"  autocomplete="off"  class="form-control auto" placeholder="Package name"  />
								
								  </div>
								</div>
							  	<!-- Search Input << -->			  	
							  	
							  
							  	
					       </div>
					       <div class="date_alert" style="display: none;">Please Enter a valid checkout date</div>
					       
					       <div class="container-fluid" id="rooms">		
						   
									<div class="col-md-10 no_padding_l no_padding_r">
										
										<div class="demo_div" id="room-1">
											<div class="container-fluid no_padding_l no_padding_r" id="age-1">
												
												<!--<div class="col-md-3  col-sm-3 col-xs-3  clone_me"></div>-->
												<div class="col-md-2  col-sm-3 col-xs-3  clone_me">
													<label>Night(s)</label>
													<select class="form_search" name="nights">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</div>	
												
												<div class="col-md-2  col-sm-3 col-xs-3  clone_me">
													<label>Day(s)</label>
													<select class="form_search" name="days">
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</div>
												
																																																											
											</div>
										</div>		

										
									</div>																	
							</div>														  							 						  	
						  	<div class="container-fluid">
						  		
						  		<div class="col-md-2 pull-right">
									<label for="pwd"></label>
									<div class="form-group sfb">
										
								    	<button type="submit" class="btn btn-primary pull-right" id="search_hotels" name="search" value="search"> SEARCH </button>
								    	
								  	</div>
							  	</div>
						  		
						  	</div>						  							  							  						  		
						</form>
						

						
					</div>
					
				</div>
				
            	
            </div>
            		
        </div>
        
        
        
        
        
    	
				
		<div class="container">	
			

				<div class="row wrapper-row">

						<div class="col-md-6">
							
							
							<h1 class="owl_slider_title"> <span><i class="fa fa-gift"></i></span> Hot deals</h1>
							
							<div id="hot-deals">
								
								<div class="col-md-12 img_block_cus_hot_deals">
								<img src="<?php echo base_url();?>img/hot_deals_img1.jpg">
								
								<!-- <div class="overlap_cus_Layer">Hot deals</div> -->
	          					</div>
								
								
			
							</div>
							
							
						</div>
					
					
						<div class="col-md-6">
	
							<h1 class="owl_slider_title"> <span><i class="fa fa-map-signs"></i></span> Featured destinations</h1>
							<div id="latest-destinations">
								<div class="item">
										<a href="#" >
											<img src="<?php echo base_url();?>img/destinations-1_img.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="<?php echo base_url();?>img/destinations-5_img.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="<?php echo base_url();?>img/destinations-8_img.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="<?php echo base_url();?>img/destinations-4_img.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="<?php echo base_url();?>img/destinations-2_img.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="<?php echo base_url();?>img/destinations-6_img.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="<?php echo base_url();?>img/destinations-7_img.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="<?php echo base_url();?>img/destinations-3_img.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
							</div>
							
						</div>
					
	
					
				</div>
	
			
			

			
			
			
						
			<div class="row wrapper-row">
				
				<div class="col-md-12">
					<h1 class="owl_slider_title"> <span><i class="fa fa-commenting-o"></i></span> New Listings</h1>
				</div>
				
				<?php
				
				if(!empty($new)) { foreach ($new as $pack_new) { 
					
					?>
				
		    	<div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="<?php echo base_url();?>packages/detail/<?php echo $pack_new->id; ?>">
				        <div class="thumbnail">
				        	<!-- <span class="category"> <p></p> </span> -->
				          <div class="h_i">	<img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo base_url().$pack_new -> thumb_image; ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"></div>
					    	<div class="caption">
					        	<h4><?php echo $pack_new->title; ?></h4>
					            <p><?php echo character_limiter($pack_new->description, 100); ?></p>
					            <!-- <span class="star-rating">
					            	
					            <?php //for($i=1;$i<=$hotel_new->star_rating;$i++) { ?>
					            <span class="fa fa-star gold" data-rating="<?php //echo $i; ?>"></span> <?php //} ?>
					            
					            <?php //for($i=0;$i<(5-$hotel_new->star_rating);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php //} ?>
					            
					            </span> -->
					            <p></p>
					        </div>
					        <div class="location">
					        	 <?php echo $pack_new->nights.' night(s), '.$pack_new->days.' day(s)'; ?>
					        </div>
				        </div>
					</a>
		      	</div>
		      	
		      	<?php } } ?>
		      	
		      	<!-- 
		      	<div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="#">
				        <div class="thumbnail">
				        	<span class="category"> <p>hotel</p> </span>
				          	<img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUwNTA0NTViYjIgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTA1MDQ1NWJiMiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
					    	<div class="caption">
					        	<h4>Hotel name</h4>
					            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
					            <p></p>
					        </div>
					        <div class="location">
					        	<i class="fa fa-location-arrow"></i> Thiruvananthapuram
					        </div>
				        </div>
					</a>
		      	</div><!-- 
			    <div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="#">
				        <div class="thumbnail">
				        	<span class="category"> <p>hotel</p> </span>
				          	<img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUwNTA0NTViYjIgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTA1MDQ1NWJiMiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
					    	<div class="caption">
					        	<h4>Hotel name</h4>
					            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
					            <p></p>
					        </div>
					        <div class="location">
					        	<i class="fa fa-location-arrow"></i> Thiruvananthapuram
					        </div>
				        </div>
					</a>
		      	</div><!-- 
			    <div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="#">
				        <div class="thumbnail">
				        	<span class="category"> <p>hotel</p> </span>
				          	<img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUwNTA0NTViYjIgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTA1MDQ1NWJiMiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
					    	<div class="caption">
					        	<h4>Hotel name</h4>
					            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
					            <p></p>
					        </div>
					        <div class="location">
					        	<i class="fa fa-location-arrow"></i> Thiruvananthapuram
					        </div>
				        </div>
					</a>
		      	</div> -->
		    </div>
		    
		    
			
			
			
			
			<div class="row wrapper-row">

						
					
					
						<div class="col-md-12">
	
							<h1 class="owl_slider_title"> <span><i class="fa fa-map-marker"></i></span> Top Booking</h1>
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/tvm_img.png" />
									<div class="label"> Thiruvananthapuram </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/cochin_img.png" />
									<div class="label"> Cochin </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/kozhikodu_img.png" />
									<div class="label"> Kozhikodu </div>
								</div>
							</div>
							
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/varkala_img.png" />
									<div class="label"> Varkala </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/Idukki_img.png" />
									<div class="label"> Idukki </div>
								</div>
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/wayanadu.png" />
									<div class="label"> Wayanadu </div>
								</div>
							</div>
									<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/alapuzha.png" />
									<div class="label"> Alapuzha </div>
								</div>
							</div>
									<div class="col-xs-6 col-sm-6 col-md-3 no_padding_r">
								<div class="container-fluid home_city">
									<img src="<?php echo base_url();?>img/kollam_img.png" />
									<div class="label"> Kollam </div>
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
    //autocomplete
    $(".auto").autocomplete({
        source: baseurl+"packages/search_keyword",
        minLength: 1
    });                

});
</script>

    
   
</body>

</html>

