<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Maya_Silk
 * @since Maya Silk 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed" >
		<nav class="navbar navbar-default navbar-static-top nav-desk" style="margin-top: 10px !important; padding:10px !important; ">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	     <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	      
	       <a class="" href="http://www.bookingwings.com/blog"> <img src="http://www.bookingwings.com/img/logo.png"> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse sidebar-offcanvas" id="bs-example-navbar-collapse-1">
	    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block ">
	      	
	      	

	      	



            <!-- <li><a href="http://www.bookingwings.com/hotels">Results</a></li>
            <li><a href="http://www.bookingwings.com/hotel_detail">Detail View</a></li> -->
            
            <li class="currency_block_cus_li">
            	
  <!----          	
<div class="dropdown">
  <button class="dropbtn">inr <i class="fa fa-angle-down"></i></button>

  <div class="dropdown-content">
  <a href="#" onclick="set_value('inr');"><i class="fa fa-rupee"></i> Rupee</a>
  <a href="#" onclick="set_value('usd');"><i class="fa fa-dollar"></i> Dollar</a>
  <a href="#" onclick="set_value('eur');"><i class="fa fa-euro"></i> Euro</a>
  <a href="#" onclick="set_value('gbp');"><i class="fa fa-gbp"></i> Pound</a>
	

  </div>
</div>--->
            	
         
            	
            	</li>
            
           


	      	
	      	
	      <!--- <li class="dropdown">
	        <button type="button" class="btn btn-primary navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i>
							My Account
							<i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	        <!---  <ul class="dropdown-menu">
	          		            <li class="sign_in"><a href="" data-toggle="modal" data-target="#login_model" id="login_data">Sign In</a></li>
	            
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#register_model">Register</a></li>
	            	          </ul>-->
	        </li>
	      </ul>
	
	      	
	      	<span class="title_toll_free pull-right" style="padding:5px;" ><i class="fa fa-phone"></i> Call Us : +91 471 2213881</span>
			
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
		<div id="main" class="wrapper site" style="margin-top:10px;">