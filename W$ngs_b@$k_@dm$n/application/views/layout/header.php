<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Bookingwings</title>

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

    <div id="wrapper">




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
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard">Bookingwings - Dashboard</a>
            </div>
            
            
            <!-- Top Menu Items >> -->
            <ul class="nav navbar-right top-nav">
                
             
                
                <!-- User Details >> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata['adminusername']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <!--  <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url();?>settings/changepassword"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('login/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- User Details << -->
                
                
            </ul>
            <!-- Top Menu Items >> -->
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
               
               
               <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="<?php echo base_url('user');?>">Manage Users</a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('contact');?>">Manage Contact</a>
                            </li>
                           
                        </ul>
                    </li>
                    
                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Hotel <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url('hotel');?>">List</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo base_url('roomtype');?>" ><i class="fa fa-fw fa-arrows-v"></i> Room Type <i class="fa fa-fw fa-caret-down"></i></a>
                       
                    </li>
                     <li >
                        <a href="<?php echo base_url('roomcomp');?>" ><i class="fa fa-fw fa-arrows-v"></i> Room Combination <i class="fa fa-fw fa-caret-down"></i></a>
                       
                    </li>
                    
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Travels <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                          
                               <li>
                                <a href="<?php echo base_url('travels');?>">Manage Travels</a>
                            </li>
                           
                        </ul>
                    </li>
                    
                        <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Tour Packages <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                          
                               <li>
                                <a href="<?php echo base_url('packages');?>">Manage Tour Packages</a>
                            </li>
                           
                        </ul>
                    </li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
   
