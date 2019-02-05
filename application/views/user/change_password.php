<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
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

<body class="cus_edit_profile_block">
	
	
	<!----------header--------->
	<?php   $this->load->view('layout/user_header');
	
	
	if($this->session->userdata['log_usertype'] != 'travel_agent' ) { ?>
		
		
		
		
<!--User Account - Profile view >> -->
<nav class="account_menu">
<ul>
		<li><a href="<?php echo base_url();?>user">Profile</a></li>
		<li><a href="<?php echo base_url();?>user/editprofile">Edit Profile</a></li>
		<li class="current"><a href="<?php echo base_url();?>user/changepassword">Passsword</a></li>
	</ul>
</nav>
<!--User Account - Profile view << -->



<?php } else {?>
	
	
	
<!--Travel Agent Account - Profile view >> -->
<nav class="account_menu">
<ul>
		<li><a href="<?php echo base_url();?>travel_agent/profile">Profile</a></li>
		<li><a href="<?php echo base_url();?>travel_agent/edit_profile">Edit Profile</a></li>
		<li class="current"><a href="<?php echo base_url();?>travel_agent/change_password"">Passsword</a></li>
	</ul>
</nav>
<!--Travel Agent Account - Profile view << -->



<?php } ?>
<div class="pro_padding">
	
	<h3>Change password</h3>
	
	
										<?php
										 if($this->session->flashdata('error')):
											?>
											<div class="alert alert-danger">
												<?php
												echo $this->session->flashdata('error');
												
												 ?>
											</div>
										<?php 
										endif;
										if($this->session->flashdata('success')):
											?>
											<div class="alert alert-success">
												<?php
												echo $this->session->flashdata('success');
											
												 ?>
											</div>
										<?php
											endif;
if($this->session->userdata['log_usertype'] == 'user') {?>
		<form method="post" action="<?php echo base_url();?>user/password_change" method="post" name="change_password_form" id="change_password_form">
		
		<div class="pro_form">
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Current password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="current_password" name="current_password" onchange="check_password();" >
							<div id="error"><?php
										 if($this->session->flashdata('current_password_error')):
											?>
											<span class="err">
												<?php
												echo $this->session->flashdata('current_password_error');
												
												 ?>
											</span>
										<?php 
										endif;?>
							</div>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>New password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="new_password" name="new_password" >
					
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
			
						
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Retype new password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="confirm_password" name="confirm_password">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>


			<div class="row form_row">
			
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" id="change_password" name="change_password"  value="Update Password">
					 </div>
				</div>
			</div>
			
			
			
			
			
			
		</div>
		
	</form>
	 <?php } else {
											?>
											
		<form method="post" action="<?php echo base_url();?>travel_agent/update_password" method="post" name="change_password_form" id="change_password_form">
		
		<div class="pro_form">
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Current password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="current_password" name="current_password" onchange="check_password_agent();" >
							<div id="error"><?php
										 if($this->session->flashdata('current_password_error')):
											?>
											<span class="err">
												<?php
												echo $this->session->flashdata('current_password_error');
												
												 ?>
											</span>
										<?php 
										endif;?>
							</div>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>New password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="new_password" name="new_password" >
					
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
			
						
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Retype new password</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="password" class="form-control" id="confirm_password" name="confirm_password">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>


			<div class="row form_row">
			
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" id="change_password" name="change_password"  value="Update Password">
					 </div>
				</div>
			</div>
			
			
			
			
			
			
		</div>
		
	</form><?php } ?>
	
</div>


<!---footer---->
<?php   $this->load->view('layout/user_footer');   ?>



 

 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

  
    
     <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
      <script src="<?php echo base_url();?>js/login.js"></script>

    

</body>

</html>
