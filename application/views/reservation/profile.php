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

<body>

	
	<?php   $this->load->view('layout/user_res_header'); ?>
	

<div class="pro_padding">
	
	<h3>Account Information</h3>
	
	<div class="account_info">
		<b class="info_name">Name </b><span><?php echo $user[0] -> first_name . " " . $user[0] -> last_name; ?></span>
	</div>
	
	
	<div class="account_info">
		<b class="info_name">Address </b><span><?php echo $user[0] -> address; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">E mail </b><span><?php echo $user[0] -> email; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">Phone </b><span><?php
		if ($user[0] -> phone) { echo $user[0] -> phone;
		}
 ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">Gender </b><span><?php echo $user[0] -> gender; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">Place </b><span><?php echo $user[0] -> city; ?></span>
	</div>
	
</div>
	
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