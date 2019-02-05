<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. ">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
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

<body>
<?php

//$this->load->view('layout/header');

?>
<!-- Header >> -->
<?php   $this->load->view('layout/header');   ?>
<!-- Header >> -->


	<?php   $this->load->view('main/login');   ?>


    <div id="page-wrapper" class="travel_block_wrapper">
		<div class="container">	
			<div class="row wrapper-row">
					<div class="col-md-12">
						 
        					<div class="row">

								<div id="2" style="display:none;">
								          <div class="modal-content">
								      
								        <div class="col-md-6 col-md-offset-3  travel_block_cus" >
								        	
								        	<label>Travel Agent Password Recovery </label>
								       	<form method="post" action="<?php echo base_url();?>contact" name="agent_forgot_form" id="agent_forgot_form">
								        	<div class="row">
								        		<div class="col-md-12">
								        			<div id="agent_email_sent"></div>
													<div class="form-group">
														<input type="text" class="form-control" id="agent_forgot_email" name="agent_forgot_email" placeholder="Enter email Id">
														<div id="agent_email_err"></div>
													</div>
													
													<div class="form-group text_center">
														<button type="submit" class="btn btn-primary" name="agent_forgot" id="agent_forgot"> RESET PASSWORD </button>  
													</div>
													
												</div>
								
										  	</div>
								          	</form>
											
											
													          	
								     	<div class="modal-footer login_bottom">
								          
								         
								          <p id="travel_login"> <a  href="#"><i class="fa fa-backward"></i> Back</a></p>
								        </div>
								          
								        </div>
								   
								      </div>
								   
								</div> 
        	
        		
        						<div class="col-md-6 col-md-offset-3  travel_block_cus"  id="1">

									<label>Travel Agent Sign In</label>
									<form method="post" action="<?php echo base_url();?>" name="agent_login_form" id="agent_login_form">
					        		<div class="login_block_cus">
					        			<div class="form-group form_login">
					        				 <div class="input-group">
					    						 <div class="input-group-addon"><i class="fa fa-user"></i></div>
													<input type="text" class="form-control" id="agent_login_email" name="agent_login_email" placeholder="Email Id">
												</div>	
										</div>	
										<div class="form-group form_login">
											 <div class="input-group">
					     						 <div class="input-group-addon"><i class="fa fa-lock"></i></div>
												<input type="password" class="form-control" id="agent_login_password" name="agent_login_password" placeholder="Password">
												<div id="agent_login_error"></div>
											</div>	
										</div>
										
										<div class="form-group text_center">
											<button type="submit" class="btn btn-primary" name="agentlogin" id="agent_login"> SIGN IN </button> 
											
											<p  id="btnClick" ><a href="#">Forgot Password ?</a></p>
										</div>
										</div>
										
										</form>
										<br>
					
								</div>
				
							</div>
		  				
							
					</div>
				</div>
			</div>
				
				
			<div class="travel_agent_block"><div class="container">
					<div class="col-md-12 travel-agent_section_info">
							<h2 class="travel-agent_section_info_heading"> We're committed to protecting your security</h2>
							<div class="block1_travel-agent col-md-4">
								<p class="travel_agent_info_content">
	
								<p class="hight_icons"><i class="fa fa-lock"></i></p>
								<p class="hight_text">Keep your login details confidential.</p>
								Because you have access to sensitive guest information, we ask that you please keep your username and password strictly confidential.
								</p>
							</div>
							<div class="block1_travel-agent col-md-4">
								<p class="travel_agent_info_content">
	
								<p class="hight_icons"><i class="fa fa-lock"></i></p>
								<p class="hight_text">Access our site securely.</p>
								Regardless if you're using Chrome, Firefox, Internet Explorer or any other browser, your URL should always read <a href="#">BookingWings</a>.
								</p>
						</div>
						<div class="block1_travel-agent col-md-4">
							<p class="travel_agent_info_content">
							<p class="hight_icons"><i class="fa fa-lock"></i></p>
							<p class="hight_text">Take extra security precautions.</p>
							Depending on your browser, you might notice extra security notifications, like your address bar changing to green or a lock appearing.
							</p>
						</div>
					</div>
				</div>
			</div>
						
					
					
					

       </div>
       <!-- /#page-wrapper -->
	
	
		


	
			
	
	<?php

$this->load->view('layout/footer');

?>
	


  
    <script>

$('#btnClick').on('click',function(){
    if($('#1').css('display')!='none'){
    $('#2').show().siblings('div').hide();
    }else if($('#2').css('display')!='none'){
        $('#1').show().siblings('div').hide();
    }
});


$('#travel_login').on('click',function(){
    if($('#2').css('display')!='none'){
    $('#1').show().siblings('div').hide();
    }else if($('#1').css('display')!='none'){
        $('#2').show().siblings('div').hide();
    }
});


    </script> 
        
        


   
    
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
     <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    
    
    
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>
      
  
	<script src="<?php echo base_url();?>js/demo.js"></script>
	


    

</body>

</html>

