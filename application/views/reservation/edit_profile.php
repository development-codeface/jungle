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
	
										<?php if($this->session->flashdata('success')):
											?>
											<div class="alert alert-success">
												<?php
												echo $this->session->flashdata('success');
												endif;
												 ?>
											</div>
											
							
	<form role="form" action="<?php echo base_url();?>reservation/update_profile?hotel=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
		
		
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