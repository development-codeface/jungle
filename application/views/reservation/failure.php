<!DOCTYPE html>
<html>
<head>
<title>Booking Failed</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link href="<?php echo base_url();?>css/custom_search.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>css/custominv.css">
<link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
<?php
		 $dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->get('hotel'));
		 $hotel_id=$this->encrypt->decode($dec_hotel);
		 
		 $details = $this -> Reservation_checkout_model -> detailsById($hotel_id);
		 //print_r($details); exit;
?>
	       <a class="" href="<?php echo base_url().'reservation/'.url_title($details -> title).'?hotel='.$this->input->get('hotel');?>"> <img class="logo_l" src="<?php echo base_url();?><?php echo $details->logo_img; ?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	
	      		      	<div class="pull-right paddngMob">
				<?php
								if(!isset($this->session->userdata['log_username']))
								{?>
				<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
				<?php } else 
				{?>
				<li class="dropdown">
				
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
				
				<a id="log_reserve" class="sign_in" href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $this->input->get('hotel'); ?>"><i class="fa fa-user" aria-hidden="true"></i> My Account <i class="fa fa-angle-down"></i></a> </button>
				
				<ul class="dropdown-menu">
	          	
	            	
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $this->input->get('hotel'); ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
				<?php } ?>
				
			</div>
	      	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> <?php if(!empty($details->phone)){ ?> Call Us : <?php echo $details->phone ;?> <?php }?> </span>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
	
<div id="page-wrapper">
<div class="container  container_cus">
<div class="row bluebbcus">
	
<div class=" col-md-12 pr bluebbe">
<p class="print_icon_cus">
<a href="<?php echo base_url().'reservation/'.url_title($details -> title).'?hotel='.$this->input->get('hotel');?>" ><i class="fa fa-home"></i></a>
</p>


<div class=" bluebb ">
 <div class="col-md-9 prepaid-heading">
  <div class="col-md-112 main_t_in">
<h2 class="inv2 ">Sorry, your order status is failure !!.
</h2>
</div>


</div>

</div>
</div>
<div id="print">



<div class=" col-md-12  bluebbcus5 pr">
<div class="alert alert-danger text-center">
<?php
   if(!empty($msg)) {
   	echo $msg;
   }
   else if($this->session->flashdata('msg')) {
   	echo $this->session->flashdata('msg');
   }
   else {
   	echo 'Invalid Transaction. Please try again';
   }
?>
</div>

</div>


<div class=" col-md-12  bluebbcus6 pr">
<p class="ht_ads">
<?php echo $details->address;?>
</p>

</div></div>
</div>

</div>
<br/>
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