<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Booking Chair</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <link href="<?php echo base_url();?>/assets/css/bootstrap-datepicker3.css" rel="stylesheet">
</head>

<body>

  




        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard">Dashboard</a>
            </div>
            
            
            <!-- Top Menu Items >> -->
            <ul class="nav top-nav">
				
				
				
				
				<!-- User Details >> -->
                <li class="pull-right dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin Name <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url();?>settings"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- User Details << -->
				
		
                
                
            </ul>
            <!-- Top Menu Items >> -->
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <!-- /.navbar-collapse -->
			
        </nav>


        <div id="page-wrapper2">

            <div class="container">

                <!-- Page Heading -->
                <div class="row">
					
					
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('hotel/category/hotels');?>">
							<div class="container-fluid admin_box">
								
								<p>
									<img src="<?php echo base_url();?>assets/img/hotel.png" >
								</p>
								
								HOTELS
								
								
								
							</div>
						</a>
					</div>
					
						<div class="col-sm-3">
						<a href="<?php echo base_url('packages/packagelist');?>">
							<div class="container-fluid admin_box">
								
								<p>
									<img src="<?php echo base_url();?>assets/img/packages.png" >
								</p>
								
								packages
								
								
							</div>
						</a>
					</div>
					
					
						<!-- <div class="col-sm-3">
						<a href="<?php echo base_url('ayurveda');?>">
							<div class="container-fluid admin_box">
								
								
								<p>
									<img src="<?php echo base_url();?>assets/img/yoga.png" >
								</p>
								
								Yoga & Ayurveda
								
								
								
								
								
							</div>
						</a>
					</div> -->
					
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('travels/travelslist');?>">
							<div class="container-fluid admin_box">
								
								<p>
									<img src="<?php echo base_url();?>assets/img/travel.png" >
								</p>
								
								Travels
								
								
							</div>
						</a>
					</div>
					
				
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('contact/contactlist	');?>">
							<div class="container-fluid admin_box">
								
								
								<p>
									<img src="<?php echo base_url();?>assets/img/users.png" >
								</p>
								
								
								users
								
								
								
							</div>
						</a>
					</div>
					
					
					
					
					
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('report/hotelreport	');?>">
							<div class="container-fluid admin_box">
								
								
								<p>
									<img src="<?php echo base_url();?>assets/img/reports.png" >
								</p>
								
								reports
								
								
								
								
								
							</div>
						</a>
					</div>
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('settings/manageusers');?>">
							<div class="container-fluid admin_box">
								
								
								<p>
									<img src="<?php echo base_url();?>assets/img/settings.png" >
								</p>
								
								settings
								
								
								
							</div>
						</a>
					</div>
					
					
						<div class="col-sm-3">
						<a href="<?php echo base_url('transaction/list_commision');?>">
							<div class="container-fluid admin_box">
								
								
								<p>
									<img src="<?php echo base_url();?>assets/img/transaction_img_main.png" >
								</p>
								
								Transaction
								
								
								
							</div>
						</a>
					</div>
					
					<div class="col-sm-3">
						<a href="<?php echo base_url('group/list_group');?>">
							<div class="container-fluid admin_box">
							
							
							<p>
									<img src="<?php echo base_url();?>assets/img/users.png" >
								</p>
								
								Groups
								
								
							</div>
						</a>
					</div>
					
					
						
					
					
					
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

		