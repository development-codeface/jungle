<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala. ">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>css/social_buttons.css" rel="stylesheet">
    
    
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">







    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url(); ?>font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->





</head>

<body  class="cus_edit_profile_block">
	
	<!----------header--------->
	<?php   $this->load->view('layout/user_header');  
	
	if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>




<!--Travel Agent Account - Profile view >> -->
<nav class="account_menu">
	<ul>
		<li class="current"><a href="<?php echo base_url(); ?>travel_agent/profile">Profile</a></li>
		<li><a href="<?php echo base_url(); ?>travel_agent/edit_profile">Edit Profile</a></li>
		<li><a href="<?php echo base_url(); ?>travel_agent/change_password">Passsword</a></li>
	</ul>
</nav>
<!--Travel Agent Account - Profile view << -->

<div class="pro_padding">
	
	<h3>Account Information</h3>
	
	<div class="account_info">
		<b class="info_name">Name </b><span><?php echo $profile -> name; ?></span>
	</div>
	
	
	<div class="account_info">
		<b class="info_name">Address </b><span><?php echo $profile -> address; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">E mail </b><span><?php echo $profile -> email; ?></span>
	</div>
	
	<div class="account_info">
		<b class="info_name">Phone </b><span><?php echo $profile -> contact; ?></span>
	</div>
	
	<!-- <div class="account_info">
		<b class="info_name">Gender :</b><span></span>
	</div> -->
	
	<div class="account_info">
		<b class="info_name">Fax </b><span><?php echo $profile -> fax; ?></span>
	</div>
	
</div><?php } else { ?>








<!-- User Account - Profile view >> -->
<nav class="account_menu">
	<ul>
		<li class="current"><a href="<?php echo base_url(); ?>user">Profile</a></li>
		<li><a href="<?php echo base_url(); ?>user/editprofile">Edit Profile</a></li>
		<li><a href="<?php echo base_url(); ?>user/changepassword">Passsword</a></li>
	</ul>
</nav>
<!-- User Account - Profile view << -->

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

<?php } ?>
<!---footer---->
<?php $this -> load -> view('layout/user_footer'); ?>



 

 <!-- jQuery -->
    
     <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>js/login.js"></script>
    
     <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url(); ?>js/validation.js"></script>

    

</body>

</html>
