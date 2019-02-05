<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Great deals and offers for resorts in Kerala, hotel and resort packages in Kerala at cheap price with great service, book hotel packages in Kerala online.">
    <meta name="author" content="">


    <title>Hotel Packages in Kerala | Resorts in Kerala | Kerala Resort Packages</title>

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
    	
    	<div id="search-banner" style="background: url(<?php echo base_url();?>img/yoga.jpg) no-repeat center center; background-size: cover;">
            
            <div class="container">
            		<br><br>
            	
            	<h1>Book Domestic & International Hotels</h1>
				
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
					           <!-- <li <?php if($sub_cat == 'resorts') echo 'class="active"'; ?> id="resort_active"><a class="resort" href="<?php echo base_url().'resorts';?>"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>
					            ---><li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?> id="ayurveda_active"><a class="ayurveda" href="<?php echo base_url().'ayurveda';?>"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
					            <li <?php if($sub_cat == 'yoga') echo 'class="active"'; ?> id="yoga_active"><a class="yoga" href="<?php echo base_url().'hotel-packages';?>"><span class="nav_menu_ico ico_yoga"></span> Hotel Packages</a></li>
					          <!--    <li <?php if($sub_cat == 'holiday') echo 'class="active"'; ?> id="package_active"><a class="package" href="<?php echo base_url().'holiday';?>"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>-->
					            <li <?php if($sub_cat == 'home') echo 'class="active"'; ?> id="home_active"><a class="home" href="<?php echo base_url().'homestays';?>"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
					            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?> id="apart_active"><a class="apart" href="<?php echo base_url().'apartments';?>"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
					        </ul>

					    </div>
					</nav>
					
					<div class="col-xs-12 col-sm-12 col-md-12 search_options">

						
						<form role="form" method="get" name="search_form" class="sear_cus" action="<?php echo base_url(); ?>hotel-packages/search_list">														
							<div class="container-fluid bg-search">					
								<!-- Search Input >> -->
								<div class="col-md-8 col-sm-8 col-xs-12">
								  <div class="form-group yogac">
								    <!-- <input type="text" id="hidden-search"  name="hidden-search" autocomplete="off" class="form-control" id=""  placeholder="Enter City name, Area name or Hotel name..">
								    	<input id="display-search" type="text" autocomplete="off" readonly="readonly" />										
											<div id="artists"></div> -->
											 <!--mirrored input that shows the actual input value-->
										 <input id="hidden-search" name="hidden_search"  autocomplete="off"  class="form-control auto"  placeholder="Package name" />
								
								
								<input type="hidden" name="category" id="category" value="<?php echo $cat_id; ?>"/>
								  </div>
								</div>
							  	<!-- Search Input << -->			  	
							  	
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6">
								  	<div class="input-group">
					                  <span id="sandbox-container">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-in" name="check_in" id="valid_from"  >
				                        </span>
									</div>
							  	</div>
							  	
							  	<div class="col-md-2 col-sm-6 col-xs-6">
									<div class="input-group">
				                  		<span id="sandbox-container4">
				                        	<input class="col-lg-8 form-control datepickr_ico" placeholder="Check-out" name="check_out" id="valid_to" >
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
					       
					       													  							 						  	
						  <!--	<div class="container-fluid">
						  		
						  		
						  		
						  	</div>	-->					  							  							  						  		
						</form>
						

						
					</div>
					
				</div>
				
            	
            </div>
            		
        </div>
        
        
        
        
        
    	
        		<div class=" wrapper-row htl_ppr_blk wrapper-ch">
	<div class="container" style="width:100%;">
 	<h3 class="dest">Recommended Destinations</h3>
	<!-- <h3>Top Destinations</h3> -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
		
		 

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		 
			<div class="item active">
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Cochin">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Cochin</h4>
					<h5>Historic port with diverse architecture</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'cochin');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/1.jpg">
					</div>
				</div>
				</a>
					<a href="<?php base_url();?>hotel-packages/packages-in-Munnar">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Munnar</h4>
					<h5>Mountain town surrounded by tea estates.</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Munnar');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/4.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Thekkady">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Thekkady</h4>
					<h5>Scenic game & ecotourism reserve</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Thekkady');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/25.jpg">
					</div>
				</div>
				</a>
			<a href="<?php base_url();?>hotel-packages/packages-in-Kumarakom">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Kumarakom</h4>
					<h5>Lakes, boathouses, honeymoon, lagoons</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'kumarakom');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/6.jpg">
					</div>
				</div>
				</a>
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Alappuzha">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Alappuzha</h4>
					<h5>Backwater cruises & Alappuzha Beach</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'alappuzha');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/2.jpg">
					</div>
				</div>
				</a>
				
				<a href="<?php base_url();?>hotel-packages/packages-in-Kovalam">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Kovalam</h4>
					<h5>Beaches, surfing, seaside resorts, yoga, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'kovalam');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
				<img src="<?php echo base_url();?>img/slider/5.jpg">
					</div>
				</div>
				</a>
				
				<a href="<?php base_url();?>hotel-packages/packages-in-Varkala">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Varkala</h4>
					<h5>Beaches, cliffs, yoga, temples, surfing.</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Varkala');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/11.jpg">
					</div>
				</div>
				</a>
				
				<a href="<?php base_url();?>hotel-packages/packages-in-Wayanad">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Wayanad</h4>
					<h5>Honeymoon, gardens, romantic place</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Wayanad');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/39.jpg">
					</div>
				</div>
				</a>
					<a href="<?php base_url();?>hotel-packages/packages-in-Bekal">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Bekal</h4>
					<h5>Beaches, temples, shopping</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Bekal');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/34.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Kozhikode">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Kozhikode</h4>
					<h5>Beaches, temples, shopping, architecture, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Kozhikode');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/8.jpg">
					</div>
				</div>
				</a>
				
				
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Thrissur">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Thrissur</h4>
					<h5>Temples, elephants, zoos, churches</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Thrissur');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/9.jpg">
					</div>
				</div>
			</a>
			
			<a href="<?php base_url();?>hotel-packages/packages-in-Thalassery">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Thalassery</h4>
					<h5>Temples, beaches, circuses, history</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Thalassery');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
				<img src="<?php echo base_url();?>img/slider/31.jpg">
					</div>
				</div>
				</a>
			
			
			
				
				
			</div>
			<div class="item">
						

			<a href="<?php base_url();?>hotel-packages/packages-in-Kanyakumari">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>kanyakumari</h4>
					<h5>Beache, Temple, seaside resorts</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'kanyakumari');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/kanyakumari.jpg">
					</div>
				</div>
				</a>
				
<a href="<?php base_url();?>hotel-packages/packages-in-Thiruvananthapuram">
				<div class="col-md-4 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Thiruvananthapuram</h4>
					<h5>Travancore palaces, fine art & beaches</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Thiruvananthapuram');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/7.jpg">
					</div>
				</div>
				</a>
				
					<a href="<?php base_url();?>hotel-packages/packages-in-Kollam">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Kollam</h4>
					<h5>Beaches, temples, churches, shopping, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Kollam');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
				<img src="<?php echo base_url();?>img/slider/13.jpg">
					</div>
				</div>
				</a>
				
				<a href="<?php base_url();?>hotel-packages/packages-in-Kannur">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Kannur</h4>
					<h5>Beaches</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'kannur');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/3.jpg">
					</div>
				</div>
				</a>
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Marayoor">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Marayoor</h4>
					<h5>Forests, waterfalls, nature</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Marayoor');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
				<img src="<?php echo base_url();?>img/slider/40.jpg">
					</div>
				</div>
				</a>
			
				
					<a href="<?php base_url();?>hotel-packages/packages-in-Chalakudy">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Chalakudy</h4>
					<h5>Waterfalls, temples, churches, rivers, forests</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Chalakudy');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/42.jpg">
					</div>
				</div>
				</a>
			<a href="<?php base_url();?>hotel-packages/packages-in-Malampuzha">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Malampuzha</h4>
					<h5>Gardens, water reservoir, aquariums, amusement parks</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Malampuzha');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/44.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Kasaragod">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Kasaragod</h4>
					<h5>Beaches, temples, shopping</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Kasaragod');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/45.jpg">
					</div>
				</div>
			</a>
			
			
			<a href="<?php base_url();?>hotel-packages/packages-in-Palakkad">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Palakkad</h4>
					<h5>Temples, elephants, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Palakkad');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/10.jpg">
					</div>
				</div>
				</a>
				
				
				
				<!--<a href="<?php base_url();?>hotel-packages/search_list?hidden_search=Gavi&pack_destination=Gavi&category=7&check_in=&check_out=">
				
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 pull-left">
					<h4>Gavi, Kerala</h4>
					<h5>Ecotourism, forests, safaris, waterfalls, elephants.</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,$res_cat_id,'Gavi');?> Properties</h6>
					</div>
					<div class="col-md-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/14.jpg">
					</div>
				</div>
				</a>-->
				<a href="<?php base_url();?>hotel-packages/packages-in-Vagamon">
				
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Vagamon</h4>
					<h5>Paragliding, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Vagamon');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/15.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Kottayam">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Kottayam</h4>
					<h5>Churches, temples, honeymoon</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Kottayam');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/16.jpg">
					</div>
				</div>
				</a>
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Guruvayur">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Guruvayur</h4>
					<h5>Elephants, temples</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Guruvayur');?> packages</h6>
					</div>
					<div class="col-md-4  col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/18.jpg">
					</div>
				</div>
				</a>
				
					
			</div>
			
			
			
			<div class="item">
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Poovar">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Poovar</h4>
					<h5>Beaches, estuaries, honeymoon, lakes</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Poovar');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 pull-right">
				<img src="<?php echo base_url();?>img/slider/22.jpg">
					</div>
				</div>
				</a>
			
				
					<a href="<?php base_url();?>hotel-packages/packages-in-Malappuram">
				
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Malappuram</h4>
					<h5>Forests, temples,  museums</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Malappuram');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/23.jpg">
					</div>
				</div>
				</a>
					<a href="<?php base_url();?>hotel-packages/packages-in-Thodupuzha">
				
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Thodupuzha</h4>
					<h5>Temples, churches, waterfalls, fashion</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Thodupuzha');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 pull-right">
					<img src="<?php echo base_url();?>img/slider/41.jpg">
					</div>
				</div>
				</a>
				
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Aluva">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Aluva</h4>
					<h5>Temples, palaces, rivers, churches</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Aluva');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/33.jpg">
					</div>
				</div>
				</a>
			
				<a href="<?php base_url();?>hotel-packages/packages-in-Athirappilly">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Athirappilly</h4>
					<h5>Waterfalls, forests, honeymoon, rainforests, rivers</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Athirappilly');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/35.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Ernakulam">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8 pull-left">
					<h4>Ernakulam</h4>
					<h5>Temples, churches</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Ernakulam');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/28.jpg">
					</div>
				</div>
				</a>
				<a href="<?php base_url();?>hotel-packages/packages-in-Angamaly">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8  col-sm-8 col-xs-8 pull-left">
					<h4>Angamaly</h4>
					<h5>Churches, basilica, history</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Angamaly');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/29.jpg">
					</div>
				</div>
				</a>
				
				<a href="<?php base_url();?>hotel-packages/packages-in-Ponmudi">
				<div class="col-md-6 col-md-5 col-sm-6 top_des">
					<div class="col-md-8 col-sm-8 col-xs-8  pull-left">
					<h4>Ponmudi</h4>
					<h5>Waterfalls, backpacking, forests, mountains, frogs</h5>
					<h6><?php echo $this->Ayurveda_model->destination_count($cat_id,'Ponmudi');?> packages</h6>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4  pull-right">
					<img src="<?php echo base_url();?>img/slider/24.jpg">
					</div>
				</div>
				</a>
				
			</div>
			
			
	
		
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
				</div>
				</div>
        
				
		<!---<div class="container">	
		
			
			
			
						
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
		    		<a href="<?php echo base_url();?>hotel-packages/detail/<?php echo $enc_id; ?>">
				        <div class="thumbnail">
				        	<span class="category"> <p><?php echo $cat -> name; ?></p> </span>
				          	<div class="h_i"><img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo base_url();?><?php echo $hotel_new -> thumb_image; ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> </div>
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
									<a class="hotel_name" href="<?php echo base_url();?>hotel-packages/detail/<?php echo $enc_id;?>"><?php echo $review->hotel; ?></a>
									<p class="yt"><?php echo character_limiter($review->review, 100); ?> <a href="<?php echo base_url();?>reviews/<?php echo $review->hotel_id;?>">Read more.</a> </p>
								<p class="rev_n">	<span class="place pull-right"><?php echo $review->country; ?></span>
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
			
		 $('.carousel').carousel({
			interval: false
		});
 
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
	
//alert('111212');
$(function() {
	var cat_name = 'yoga';
	
    //autocomplete
    $(".auto").autocomplete({
        source: baseurl+"hotels/ayurveda_keyword/"+cat_name,
        minLength: 1
   });                

});
</script>


    
   
</body>

</html>
