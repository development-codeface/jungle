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
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
	
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui. css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <link href="<?php echo base_url();?>/assets/css/bootstrap-datepicker3.css" rel="stylesheet">
</head>

<body class="content_wrapper">

   



        <!-- Navigation -->
        <nav class="navbar navbar-inverse header_cus" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>group/list_group">HOTEL DASHBOARD</a>
            </div>
            
            
            <!-- Top Menu Items >> -->
            <ul class="nav navbar-right top-nav">
            	
            	<?php
             	//$username = $this->session->userdata['hotel_adminusername']; 
            	//$id= $this->Profilemodel->get_id($username);
				
				$date = date('Y-m-d');
				//$block = $this -> db -> where('valid_to', $date) -> where('hotel_id', $id) -> get('tbl_hotel_roomnumber') -> num_rows();
            	?>
            
                    
				<?php
				/* if(!empty($this->session->userdata['adminusername']))
				{ */
					
				?>
				<!-- Notification dropdown >> -->
              
                <!-- Notification dropdown << -->
                
                
                	<!-- User Details >> -->
				
				 <li class="dropdown">
				 <a href="<?php echo base_url(); ?>group/changepassword"><i class="fa fa-fw fa-edit"></i> Change Password</a>
                  
                </li>
				  <li class="dropdown">
				 <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  
                </li>
                <!-- User Details << -->

                <?php
				//}
				?>
                
                
            </ul>
            <!-- Top Menu Items >> -->
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			
            <!-- /.navbar-collapse -->
			
        </nav>


