 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
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
<?php $this->load->view('layout/header');?>
	
	
	<div id="page-wrapper">
	<?php $this -> load -> view('layout/menu'); ?>
		<div class="img_block_abt">
			<div class="opac">
				<h2 class="img_title_abt">Get in Touch With Us</h2>
			<p class="img_abt_content">Brings to your fingertips all that you need to travel easy, fast and safe.</p>
		</div>
		</div>
	
		
		<div class="container">
			
			<div class=" col-md-12 about_us_block">
						
<h1>
<small>Travel Easy, Fast and Safe</small>
BOOKINGWINGS.COM
</h1>
			
				
			We are available 24x7 to make sure that your urge to travel does not fade out waiting to know the best deals, destinations and days. Contact us in the way you prefer and we’ll make sure that you know as much as we do about the things you want to know. And what’s more, we have a panel of internationally renowned travel buffs who can answer to your queries from their hands-on experience. 
				</div>
				
				
				
					<div class="contact_form_cus_page col-md-6">
						
						<?php if($this->session->flashdata('success')): ?>
						<div class="alert alert-success alert-dismissable">
				                            <?php echo $this->session->flashdata('success');?>
				                    </div><?php endif; ?>
				                        
						<form method="post">
						<div class="form-group ">
						<input type="text" placeholder="Name" value="<?php echo set_value('name'); ?>" name="name" id="name">
                      	<?php echo form_error('name');?>
					</div>
							<div class="form-group ">
						<input type="text" placeholder="Email ID" value="<?php echo set_value('email'); ?>" name="email" id="email">
                      	<?php echo form_error('email');?>
					</div>
								<div class="form-group ">
						<input type="text" placeholder="Phone Number" value="<?php echo set_value('phone'); ?>" name="phone" id="phone">
                      	<?php echo form_error('phone');?>
					</div>
							<div class="form-group ">
						<input type="text" placeholder="Subject" value="<?php echo set_value('subject'); ?>" name="subject" id="subject">
                      	<?php echo form_error('subject');?>
					</div>
								<div class="form-group ">
						<textarea class="contactus_comments_block" type="text" placeholder="Message" name="message" id="message"><?php echo set_value('message'); ?></textarea>
                      	<?php echo form_error('message');?>
					</div>
							<div class="form-group col-md-4 submit_btn_cus_block ">
						<input class="submit_btn_cus" type="submit" value="Send" name="submit" >
					</div>
					</form>
						
						</div>
						
						<div class="contact_address_cus_page col-md-6">
							
							<h1>
BOOKING WINGS.COM
</h1>
				
				<p class="address_p_block_cus">Book a trip from the comforts of your couch and rest assured of the comforts that will ensue. <br>  Call, message or mail to us for any queries and we’ll get back to you with the best answers in a matter of minutes, if not seconds.  </p>
					
					<div class="adres_b">
					<h6 class="ad_b">Address</h6>
					AMAN HOSPITALITY SOLUTIONS<br/>
					BUILDING NO.6/349 CHEKITTAVILAKOM, PUTHIYATHURA,<br> PULLUVILA P.O, TRIVANDRUM, KERALA 695526.
					</div>
						
					<ul class="address_details_cus">
						<li><i class="fa fa-envelope-square"></i> Email ID : <a href="mailto:info@amanhts.com">info@amanhts.com</a></li>
						<!--<li><i class="fa fa-phone-square"></i> Mobile No : +918593948881 </li>-->
						<li><i class="fa fa-phone-square"></i> Telephone No: : +91471 2213881</li>
						</ul>	
						
						
						<ul class="social_icons_block">
							
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						
							</ul>
							
							</div>
						
						
					
			
			</div>
	
	
	<div class="col-md-12 map_iframe_cus">
							<div style="width: 100%"><div class="container">
							
							<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/">proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(8.351445645560316,77.03840118783569),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(8.351445645560316,77.03840118783569)});infowindow = new google.maps.InfoWindow({content:'<strong>BOOKING WINGS.com</strong><br><br>BUILDING NO.6/349 CHEKITTAVILAKOM, PUTHIYATHURA, PULLUVILA P.O, TRIVANDRUM, KERALA 695526.<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
							
							
							
						
							</div>
								
	<?php $this->load->view('layout/footer');?>
	
	
							</div>

	
	</div>
	
	
	
  <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>






</body>

</html> 