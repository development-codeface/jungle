<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    
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
	

<?php

$this->load->view('layout/user_header');	

if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>

<!-- Travel Agent Account - Profile view >> -->
<nav class="account_menu">
	<ul>
		<li><a href="<?php echo base_url();?>travel_agent/profile">Profile</a></li>
		<li class="current"><a href="<?php echo base_url();?>travel_agent/edit_profile">Edit Profile</a></li>
		<li><a href="<?php echo base_url();?>travel_agent/change_password">Passsword</a></li>
	</ul>
</nav>
<!-- Travel Agent Account - Profile view << -->


<div class="pro_padding">
	
	<h3>Account Information</h3>
	
										<?php if($this->session->flashdata('success')):
											?>
											<div class="alert alert-success">
												<?php
												echo $this->session->flashdata('success');
												endif;
												 ?>
											</div>
											
							
	<form role="form" action="<?php echo base_url();?>travel_agent/update_profile" method="post">
		
		
		<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $profile -> id; ?>">
		
		<div class="pro_form">
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Name</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $profile -> name; ?>">
					 </div>
				</div>
				<!-- <div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php //echo $user[0]->last_name;?>">
					</div>
				</div> -->
			</div>
			
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Address</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $profile -> address; ?>">
					 </div>
				</div>
				<!-- <div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php //if($user[0]->pincode){ echo $user[0]->pincode; } ?>">
					</div>
				</div> -->
			</div>
			
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Contacts</label>
					 </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $profile -> email; ?>" readonly>
					 </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $profile -> contact; ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="<?php echo $profile -> fax; ?>">
					</div>
				</div>
			</div>
			
			<!-- <div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Date of Birth</label>
					 </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="date" name="date">
							<option>28</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="month" name="month">
							<option>April</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="year" name="year">
							<option>1989</option>
						</select>
					</div>
				</div>
			</div>
			 
			 <div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Gender</label>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="radio ">
							<label>
								<p>
									<input type="radio" name="gender" id="gender" value="male" <?php //if($user[0]->gender=='male'){?> checked="checked" <?php //} ?>> Male
								</p>
							</label>
						  	

						</div>
						<div class="radio ">

							<label>
								<p>
									<input type="radio" name="gender" id="gender" value="female" <?php //if($user[0]->gender=='female'){?> checked="checked" <?php //} ?>> Female
								</p>
							</label>

						</div>
					</div>
				</div>
				
			</div>
			
				<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Place</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php //echo $user[0]->city;?>">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="state" name="state" placeholder="state" value="<?php //echo $user[0]->state;?>">
					</div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label></label>
					 </div>
				</div>
				<div class="col-md-5">
				<div class="form-group">
						<input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php //echo $user[0]->country;?>">
					</div>
				</div>
			
			</div>-->
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						
					 </div>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						
					</div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-9">
					<div class="form-group">

					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" id=""  value="Update Profile">
					 </div>
				</div>
			</div>
			
			
			
			
			
			
		</div>
		
	</form>
	
</div>




<?php }  else { ?>



<!-- Account - Profile view >> -->
<nav class="account_menu">
	<ul>
		<li><a href="<?php echo base_url();?>user">Profile</a></li>
		<li class="current"><a href="<?php echo base_url();?>user/editprofile">Edit Profile</a></li>
		<li><a href="<?php echo base_url();?>user/changepassword">Passsword</a></li>
	</ul>
</nav>
<!-- Account - Profile view << -->


<div class="pro_padding">
	
	<h3>Account Information</h3>
	
										<?php if($this->session->flashdata('success')):
											?>
											<div class="alert alert-success">
												<?php
												echo $this->session->flashdata('success');
												endif;
												 ?>
											</div>
											
							
	<form role="form" action="<?php echo base_url();?>user/update_profile" method="post" enctype="multipart/form-data">
		
		
		<input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="First name" value="<?php echo $user[0]->id;?>">
		
		<div class="pro_form">
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Name</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo $user[0]->first_name;?>">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $user[0]->last_name;?>">
					</div>
				</div>
			</div>
			
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Address</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $user[0]->address;?>">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if($user[0]->pincode){ echo $user[0]->pincode; } ?>">
					</div>
				</div>
			</div>
			
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Contacts</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="E mail" value="<?php echo $user[0]->email;?>" readonly>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php if($user[0]->phone){ echo $user[0]->phone; } ?>">
					</div>
				</div>
			</div>
			
			<!-- <div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Date of Birth</label>
					 </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="date" name="date">
							<option>28</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="month" name="month">
							<option>April</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="form-control" id="year" name="year">
							<option>1989</option>
						</select>
					</div>
				</div>
			</div>
			 -->
			 
			 <div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Gender</label>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="radio ">
							<label>
								<p>
									<input type="radio" name="gender" id="gender" value="male" <?php if($user[0]->gender=='male'){?> checked="checked" <?php } ?>> Male
								</p>
							</label>
						  	

						</div>
						<div class="radio ">

							<label>
								<p>
									<input type="radio" name="gender" id="gender" value="female" <?php if($user[0]->gender=='female'){?> checked="checked" <?php } ?>> Female
								</p>
							</label>

						</div>
					</div>
				</div>
				
			</div>
			
				<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Place</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $user[0]->city;?>">
					 </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="state" name="state" placeholder="state" value="<?php echo $user[0]->state;?>">
					</div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label></label>
					 </div>
				</div>
				<div class="col-md-5">
				<div class="form-group">
						<input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $user[0]->country;?>">
					</div>
				</div>
			
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Image</label>
					 </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="file" class="" id="img" name="img">
					 </div>
				</div>
			</div>
			
			<div class="row form_row">
				<div class="col-md-3">
					<div class="form-group">
						
					 </div>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						
					</div>
				</div>
			</div>
			
			<div class="row form_row">
			
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" class="form-control btn btn-primary" id=""  value="Update Proifile">
					 </div>
				</div>
			</div>
			
			
			
			
			
			
		</div>
		
	</form>
	
</div>



<?php } ?>




<!---------footer--------->
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

