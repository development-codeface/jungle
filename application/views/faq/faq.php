 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. " name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
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
<!-- Header >> -->
	<?php $this->load->view('layout/header');?>
<!-- Header >> -->

<?php $this -> load -> view('layout/menu'); ?>





	






<!-- Login Modal >> -->
<div class="modal in" id="login_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Sign In
        </div>
        <div class="modal-body login_form">
          
          	
          	<h1>Sign In Using Hotel Booking account</h1>
          	
          	
           <form method="post" action="http://localhost/booking/user" name="login_form" id="login_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			
        			<div class="form-group form_login">
						<input type="text" class="form-control" id="login_email" name="login_email" placeholder="Email Id">
					</div>
					
					<div class="form-group form_login">
						<input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password">
						<div id="login_error"></div>
					</div>
					
					<input type="hidden" name="page" id="page"/>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="login" id="login"> SIGN IN </button> 
						
						<p><a data-dismiss="modal" href="" data-toggle="modal" data-target="#password_model" >Forgot Password ?</a></p>
					</div>
					
					<br>
					
				</div>
				
		  	</div>
		  	</form>
		  	
		  	
		  	<div class="or">
		  		<span>
		  			OR
		  		</span>
		  	</div>
			
			
			<br>
			
			<div class="row">
				
        		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-facebook" href="">
						<i class="fa fa-facebook"></i> Sign in with Facebook
					</a>
          		</div>
          		
          		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-google" href="">
						<i class="fa fa-google-plus"></i> Sign in with Google
					</a>
          		</div>
          		
          	</div>
          	
          	<br>

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Do not have an account? <a data-dismiss="modal" href="" data-toggle="modal" data-target="#register_model" >Register</a></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Login Modal << -->





<!-- Register Modal >> -->
<div class="modal in" id="register_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Sign Up
        </div>
        <div class="modal-body login_form">
          
          	
          	<h1>Create New Account</h1>
          	
          <form method="post" action="" name="register_form" id="register_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div id="sign_in_error"></div>
        			<div class="form-group">
						<input type="text" class="form-control" id="register_email" name="register_email" placeholder="Email Id" onkeyup="email_exists();">
						<div id="email_exist"></div>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="register_password" name="register_password" placeholder="Password">
					</div>
					
					
					<div class="form-group">
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="register" id="register"> SIGN UP </button>  
					</div>
					
				</div>

		  	</div>
		  	</form>
		  	
		  	<div class="or">
		  		<span>
		  			OR
		  		</span>
		  	</div>
			
			
			<br>
			
			<div class="row">
				
        		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-facebook" href="">
						<i class="fa fa-facebook"></i> Sign in with Facebook
					</a>
          		</div>
          		
          		<div class="col-md-6">
          			<a class="btn btn-block btn-social btn-google" href="">
						<i class="fa fa-google-plus"></i> Sign in with Google
					</a>
          		</div>
          		
          	</div>
          	
          	<br>

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Already have an account? <span class="sign_in"><a data-dismiss="modal" href="" data-toggle="modal" data-target="#login_model" >Sign In</a></span></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Register Modal << -->



<!-- Forget Passwod Modal >> -->
<div class="modal in" id="password_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Forgot Password
        </div>
        <div class="modal-body login_form">
        	
        	<br>
        	<form method="post" action="http://localhost/booking/user" name="forgot_form" id="forgot_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div id="email_sent"></div>
					<div class="form-group">
						<input type="text" class="form-control" id="forgot_email" name="forgot_email" placeholder="Enter email Id">
						<div id="email_err"></div>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="forgot" id="forgot"> RESET PASSWORD </button>  
					</div>
					
				</div>

		  	</div>
          	</form>
          	

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Already have an account? <a data-dismiss="modal" href="" data-toggle="modal" data-target="#login_model" >Sign In</a></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Forget Passwod Modal << -->



<!-- Agent Forget Passwod Modal >> -->
<div class="modal in" id="agent_password_model" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	Travel Agent Password Recovery
        </div>
        <div class="modal-body login_form">
        	
        	<br>
        	<form method="post" action="http://localhost/booking/" name="agent_forgot_form" id="agent_forgot_form">
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<div id="agent_email_sent"></div>
					<div class="form-group">
						<input type="text" class="form-control" id="agent_forgot_email" name="agent_forgot_email" placeholder="Enter email Id">
						<div id="agent_email_err"></div>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="agent_forgot" id="agent_forgot"> RESET PASSWORD </button>  
					</div>
					
				</div>

		  	</div>
          	</form>
          	

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Have an account? <a data-dismiss="modal" href="" data-toggle="modal" data-target="#agent_login_model" >Sign In</a></p>
          
        </div>
      </div>
      
    </div>
</div>
<!-- Forget Passwod Modal << -->







<!-- Content area start R -->





	
	
	<div id="page-wrapper">
		<div class="img_block_abt">
			<div class="opac">
			<h2 class="img_title_abt">	Frequently Asked Questions</h2>
			<p class="img_abt_content">Brings to your fingertips all that you need to travel easy, fast and safe.</p>
		</div>
		</div>
	
		
		<div class="container">
			
			<div class=" col-md-12 about_us_block">
						
<h1>
<small>Travel Easy, Fast and Safe</small>
BOOKINGWINGS.COM
</h1>
			
			
													
											
											
								<div class="col-md-12 ">		
							<div class="panel-group   panel-group_privacy-policy">
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse1">Can I make a reservation without a credit card?</a> 
										</h4>
									</div>
									<div id="collapse1" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											Yes, a valid credit card or a debit card is needed to guarantee your reservation. You can also pay via other modes specifically provided in the payment options in the booking page. You can also make a booking using someone else’s card provided you have their permission. In this case please confirm the card holder’s name and that you have permission to use their card.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse4">Will my credit card be charged when I book my reservation?</a> 
										</h4>
									</div>
									<div id="collapse4" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											This varies with the type of rate and hotel you select. Normally, your credit card will be charged immediately for all reservations made through our website or over the phone. This guarantees your reservation as well as the rate.
							</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse2">What does the price include?</a> 
										</h4>
									</div>
									<div id="collapse2" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
										All the facilities and inclusions listed under the room type are included in the room price. You can see the extra charges under the Hotel Policy section of the Booking page.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse3">How do I know my reservation is confirmed? </a> 
										</h4>
									</div>
									<div id="collapse3" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											As soon as you have completed the booking process the confirmation page appears. This page shows all of your reservation details, including the booking number and your PIN code, so you can access your confirmation online. We also send you a confirmation email with all your booking information.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse6">What if I don’t get a confirmation at the time of booking?</a> 
										</h4>
									</div>
									<div id="collapse6" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											If a confirmation page doesn’t display once you complete your booking, check your email for a confirmation. If you don’t get an email confirmation within ten minutes, let us know at the earliest and we’ll send you your confirmation details.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse7">How do I modify a hotel booking?</a> 
										</h4>
									</div>
									<div id="collapse7" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											Booking wings doesn’t support modifications to hotel bookings.
											You’ll have to call the customer care and if dates are available then can be modify.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
							    </div>
							        	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse8">Can I cancel my reservation through Booking Wings.com?</a> 
										</h4>
									</div>
									<div id="collapse8" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											 Yes, it’s easy. You can cancel your booking via our self-service tool. Please, remember to check the hotel’s cancellation policy before making any changes to your booking. Non-refundable rooms and other special deals can have a different cancellation policy. Room specific cancellation information is included beside the room type under the ‘Conditions’ column. </div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
									
							    </div>
							    
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse9">What are the cancellation charges?</a> 
										</h4>
									</div>
									<div id="collapse9" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											It depends. The cancellation charges depend on the hotel, time of stay (‘season’ time, ‘off–season’ time), and time of cancellation. To know what’s applicable in your case, check the hotel’s booking policy mentioned on the booking page while making the reservation. Apart from the cancellation charges levied by the hotel, we charge a fee for every hotel cancellation. 
											<br/><b>In general, the cancellation policy is as follows:</b>
											<ul>
											<li>Cancellations made fifteen (15) or more days prior to the date of arrival will incur a 10% charge.</li>
											<li>Cancellations made five (5) to fourteen (14) days prior to the date of arrival will incur a two (2) night charge.</li>
											<li>Cancellations made less than five (5) days prior to the arrival date will incur a 100% charge.</li>
											<li>If the room or holidays you are booking is labeled as non refundable, non cancellable or similar, all cancellations will incur a 100% charge, regardless of the date in which the cancellation is requested.
Cancellation policies can vary seasonally or depending on the hotel or room type. You can review the specific policy for the hotel you selected during the reservation process.
</li>
											
											</ul>



<b>Cancellation policy for the high season and holidays ( From November to March )</b>
 <ul>
<li>Reservations cancelled thirty (30) days or more prior to the date of arrival will incur a 10% charge.</li>
<li>Reservations cancelled fifteen (15) to twenty-nine (29) days prior to the date of arrival will incur a two (2) night charge</li>
<li>Reservations cancelled less than fifteen (15) days prior to the date of arrival will incur a 100% charge</li>
</ul>

There are no refunds for early check outs and “no shows”. If the number of guests on your reservation is reduced once the reservation is paid it is up to the hotel to determine applicable refunds or penalties.
											</div>
							       

								   <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
									
							    </div>
								
										<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse10">How will I get my money back after cancelling a hotel booking?</a> 
										</h4>
									</div>
									<div id="collapse10" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
											We will credit the money back to the same account you used while making the booking. For example, if you used your credit card, we will make an appropriate charge reversal. If you used your debit card, we will credit the money back to the debit card. We usually process the refund within 4 working days from the cancellation request. However, it may take slightly longer to reflect in your account statement as this depends upon your bank. We’ve noticed that it takes about 14 working days for most refunds to hit their respective accounts.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
									
							    </div>
								
									<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse11">Can more than two adults stay in one room?</a> 
										</h4>
									</div>
									<div id="collapse11" class="panel-collapse collapse">
										<div class="panel-body faq_content_cus">
										Most hotels allow additional guests to stay in a room for an extra charge as long as the room doesn’t exceed the maximum number of guests allowed per room. If you book a room that cannot accommodate your group, the hotel may cancel your reservation or require that you book additional rooms. If you have doubts, check directly with your hotel for their extra–guest charges and the maximum number of people allowed in the room you’ve booked. When making your booking, select the number of children traveling with you from the ‘Children’ drop–down box. If you select just 1 child, our search will give you the price of a double room with child, not including an extra bed. If you want an extra bed in the room, you need to increase the number of passengers in your search.</div>
							        <!-- <div class="panel-footer">Panel Footer</div> -->
									</div>
									
							    </div>
								
								
    
  </div>
    </div>
	
						

			
	
				</div>
			
			</div>
	
		
		

	</div>
	
	
	

<!-- Content area End R   -->



<!-- Content area End R   -->

<?php $this->load->view('layout/footer');?>
	
	
	

</body>



	
  <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>







</html> 