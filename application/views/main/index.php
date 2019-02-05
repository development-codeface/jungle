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

<body>
	
	

	
	
	
	
<?php

$this->load->view('layout/header');

?>
	

    <div id="page-wrapper">
    	
    	<div id="search-banner" style="background: url(img/search_bg2.jpg) no-repeat center center; background-size: cover;">
            
            <div class="container">
            	
            	
            	<h1>Book Domestic & International Hotels</h1>
				
				<!-- <p>Find best deals across 200,000+ hotels worldwide</p> -->
				
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
					        <!-- <ul class="nav navbar-nav home_search_nav">
					            <li class="active" id="hotels_active"><a class="hotels"><span class="nav_menu_ico ico_hotel"></span> Hotels</a></li>
					            <li id="resort_active"><a class="resort"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>
					            <li id="ayurveda_active"><a class="ayurveda"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li id="yoga_active"><a class="yoga"><span class="nav_menu_ico ico_yoga"></span> Yoga & meditation</a></li>
					            <li id="package_active"><a class="package"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>
					            <li id="home_active"><a class="home"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li id="apart_active"><a class="apart"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					        </ul> -->
					        
					          <ul class="nav navbar-nav home_search_nav">
					            <li class="active" id="hotels_active"><a class="hotels" href="<?php echo base_url().'hotels';?>"><span class="nav_menu_ico ico_hotel"></span> Hotels</a></li>
					            <li id="resort_active"><a class="resort" href="<?php echo base_url().'resorts';?>"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>
					            <li id="ayurveda_active"><a class="ayurveda" href="<?php echo base_url().'ayurveda';?>"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li id="yoga_active"><a class="yoga" href="<?php echo base_url().'yoga';?>"><span class="nav_menu_ico ico_yoga"></span> Yoga & meditation</a></li>
					            <li id="package_active"><a class="package" href="#"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>
					            <li id="home_active"><a class="home" href="<?php echo base_url().'home';?>"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li id="apart_active"><a class="apart" href="<?php echo base_url().'apartments';?>"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					        </ul>
					        
					    </div>
					</nav>
					
					<div class="col-xs-12 col-sm-12 col-md-12 search_options">

						
						<form role="form" method="post" name="search_form" action="Hotels/search_list">														
							<div class="container-fluid">					
								<!-- Search Input >> -->
								<div class="col-md-8">
								  <div class="form-group">
								    <!-- <input type="text" id="hidden-search"  name="hidden-search" autocomplete="off" class="form-control" id=""  placeholder="Enter City name, Area name or Hotel name..">
								    	<input id="display-search" type="text" autocomplete="off" readonly="readonly" />										
											<div id="artists"></div> -->
											 <!--mirrored input that shows the actual input value-->
											<!-- <input id="search" name="hidden-search" onkeyup="InitAutoComplete(event, 'search');" autocomplete="off"  class="form-control" />
								 -->
								<input id="hidden-search" name="hidden-search"  autocomplete="off"  class="form-control auto"  />
								
								<input type="hidden" name="category" id="category" />
								  </div>
								</div>
							  	<!-- Search Input << -->			  	
							  	
							  	
							  	<div class="col-md-2">
								  	<div class="input-group">
					                  <span id="sandbox-container">
				                        	<input class="col-lg-8 form-control " placeholder="Check-in" name="check_in" id="valid_from" >
				                        </span>
									</div>
							  	</div>
							  	
							  	<div class="col-md-2">
									<div class="input-group">
				                  		<span id="sandbox-container">
				                        	<input class="col-lg-8 form-control " placeholder="Check-out" name="check_out" id="valid_to" onchange="date_check()" >
				                        </span>
									</div>
							  	</div>
					       </div>
					       <div class="date_alert">Please Enter a valid checkout date</div>
					       
					       <div class="container-fluid" id="rooms">								
									<div class="col-md-2">
										
										<label>Rooms</label>										
										<select class="form_search" id="reg_mem_type" name="mem_type" value="" autocomplete="off">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>			
										</select>
										<input type="hidden" id="selected_room" value="1" autocomplete="off" />
									</div>																																				
									<div class="col-md-10 no_padding_l no_padding_r">
										
										<div class="demo_div" id="room-1">
											<div class="container-fluid no_padding_l no_padding_r" id="age-1">
												
												<div class="col-md-2">
													<p>Room 1</p>
												</div>
												
												<div class="col-md-2 clone_me">
													<label>Adults</label>
													<select class="form_search" name="adults[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
												</div>
												<div class="col-md-2 clone_me">
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
									<label for="pwd"><br></label>
									<div class="form-group">
										
								    	<button type="submit" class="btn btn-primary pull-right" id="search_hotels"> SEARCH </button>
								    	
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
	          
								<div class="item">
									
									<?php 
									if(!empty($offer1)):
									foreach($offer1 as $hot_deal): ?>
							  		<div class="media">
										<a href="<?php echo base_url();?>hotel_detail/hotel/<?php echo $hot_deal->id; ?>" >
											<div class="media-left">
										  		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo $hot_deal->thumb; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;">
										    </div>
										    <div class="media-body">
										    	<h4 class="media-heading"><?php echo $hot_deal->hotel; ?></h4>
										    	<p><?php echo character_limiter($hot_deal->des, 100); ?></p>
										    	<span class="location"><?php echo $hot_deal->district . ', ' . $hot_deal->state; ?></span>
										    </div>
									    </a>
									</div>
									<?php endforeach; endif; ?>
									
							  		
								</div>
								
								<?php if(!empty($offer2)): ?>
								<div class="item">
									<?php foreach($offer2 as $hot_deal): ?>
							  		<div class="media">
										<a href="<?php echo base_url();?>hotel_detail/hotel/<?php echo $hot_deal->id; ?>" >
											<div class="media-left">
										  		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo $hot_deal->thumb; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;">
										    </div>
										    <div class="media-body">
										    	<h4 class="media-heading"><?php echo $hot_deal->hotel; ?></h4>
										    	<p><?php echo character_limiter($hot_deal->des, 100); ?></p>
										    	<span class="location"><?php echo $hot_deal->district . ', ' . $hot_deal->state; ?></span>
										    </div>
									    </a>
									</div>
									<?php endforeach; ?>
									<!-- <div class="media">
										<a href="#" >
											<div class="media-left">
										  		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/hot_deals-2.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
										    </div>
										    <div class="media-body">
										    	<h4 class="media-heading">Top aligned media1</h4>
										    	<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
										    	<span class="location">Kovalam, Thiruvananthapuram</span>
										    </div>
									    </a>
									</div> --
									<div class="media">
										<a href="#" >
											<div class="media-left">
										  		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/hot_deals-1.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
										    </div>
										    <div class="media-body">
										    	<h4 class="media-heading">Top aligned media1</h4>
										    	<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
										    	<span class="location">Kovalam, Thiruvananthapuram</span>
										    </div>
									    </a>
									</div>--
									<div class="media">
										<a href="#" >
											<div class="media-left">
										  		<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="img/hot_deals-2.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
										    </div>
										    <div class="media-body">
										    	<h4 class="media-heading">Top aligned media1</h4>
										    	<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
										    	<span class="location">Kovalam, Thiruvananthapuram</span>
										    </div>
									    </a>
									</div>-->
								</div><?php endif; ?>
								
			
							</div>
							
							
						</div>
					
					
						<div class="col-md-6">
	
							<h1 class="owl_slider_title"> <span><i class="fa fa-map-signs"></i></span> Featured destinations</h1>
							<div id="latest-destinations">
								<div class="item">
										<a href="#" >
											<img src="img/destinations-1.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="img/destinations-2.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="img/destinations-2.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="img/destinations-1.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="img/destinations-1.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="img/destinations-2.jpg" />
											<span class="caption"> caption 2 goes here </span>
									    </a>
								</div>
								<div class="item">
										<a href="#" >
											<img src="img/destinations-2.jpg" />
											<span class="caption"> caption goes here </span>
									    </a>
									    <a href="#" >
											<img src="img/destinations-1.jpg" />
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
				
				if(!empty($new)) { foreach ($new as $hotel_new) { 
					
					$img = $this -> Hotels_model -> img_thumb($hotel_new -> id);
					
					$cat = $this -> db -> where('id',$hotel_new->sub_category_id) -> get('tbl_sub_category') -> row();
					
					?>
				
		    	<div class="col-sm-6 col-md-3 new_thumbnail">
		    		<a href="<?php echo base_url();?>hotel_detail/hotel/<?php echo $hotel_new->id; ?>">
				        <div class="thumbnail">
				        	<span class="category"> <p><?php echo $cat -> name; ?></p> </span>
				          	<img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo $img -> thumb; ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
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

						<div class="col-md-4">
							
							
							<h1 class="owl_slider_title"> <span><i class="fa fa-pencil"></i></span> Reviews</h1>
							<?php 
							
							if(!empty($tbl_review)):
							foreach($tbl_review as $review): ?>
	          
							<div class="home_reviews">
								<div class="media-body">
									<h4><?php echo $review->title; ?></h4>
									<span class="star-rating block"> 
										<span class="fa fa-star gold" data-rating="1"></span>
										<span class="fa fa-star gold" data-rating="2"></span>
										<span class="fa fa-star gold" data-rating="3"></span>
										<span class="fa fa-star gold" data-rating="4"></span>
										<span class="fa fa-star-o" data-rating="5"></span>
									</span>
									<a class="hotel_name" href="#"><?php echo $review->hotel; ?></a>
									<p><?php echo character_limiter($review->review, 100); ?> <a href="#">Read more.</a> </p>
									<span class="place pull-right"><?php echo $review->country; ?></span>
									<span class="name pull-right"><?php echo $review->first_name . ' ' . $review->last_name; ?></span>
								</div>
								<div class="media-right">
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo $review->photo; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;">
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

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>
    
    
	
	
    
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    
    
    <script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
    
    
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>
        
 <script type="text/javascript" src="<?php echo base_url();?>assets/js/autocomplete.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/search_bar.js"></script>
      
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
	


<!-----<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> --->   
<script type="text/javascript">
$(function() {
    //autocomplete
    $(".auto").autocomplete({
        source: baseurl+"hotels/search_keyword",
        minLength: 1
    });                

});
</script>



    
   
</body>

</html>

