<!DOCTYPE html>
<html>
<head>
<title>Booking Wings - Best Online Hotel Booking Website </title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
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

<?php   $this->load->view('layout/header');   ?>
<?php   $this->load->view('layout/menu');   ?>
<div id="page-wrapper">
<div class="container  container_cus">
<div class="row bluebbcus">
	
<div class=" col-md-12 pr bluebbe">
<p class="print_icon_cus">
<a href="<?php echo base_url();?>hotels" ><i class="fa fa-home"></i></a>
</p>


<div class=" bluebb ">
 <div class="col-md-4" id="a">
<img src="<?php echo base_url();?>img/logo.png">
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
AMAN HOSPITALITY SOLUTIONS, Building No.6/349, Chekkittavilakom, Puthiyathura, Pulluvila P.O, Thiruvananthapuram, <br>Kerala 695526. E-mail : info@amanhts.com, Mob.No. : +918593948881, Tel.No. : +914712213881 <!--<br> General Questions bookingwings.com  | 
Booking Wings  instruction: Please have your UPC number and the hotel ID-->
</p>

</div></div>
</div>

</div>
<br/>
<?php   $this->load->view('layout/footer');   ?>


	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

		
</body>
</html>