<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - BookingWings</title>

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

    <div id="wrapper" class="cus_wrapper">




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
                

            	
            	<?php
            	
            	$username = $this->session->userdata['hotel_adminusername'];
            	$id= $this->Profilemodel->get_id($username);
            	$date = date('Y-m-d');
						$booking_date = 
				
						$this->db->distinct();
						$this->db->select('booking_number')->where('hotel_id',$id);
						$this->db->where('(status = 1)');
						$this->db->where('cancel != 2');
						$this->db->like('date',$date);
						$query =$this->db->get('tbl_booking');
						
						$book_count =  count($query->result());
				
				
				$block = $this -> db -> where('valid_to', $date) -> where('hotel_id', $id) -> get('tbl_hotel_roomnumber') -> num_rows();
				
		$logo=$this->db->where('id', $id)->get('tbl_hotel')->row();
            	?>
                
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard"><?php echo $logo->title; ?> DASHBOARD</a>
            </div>
            
            
            <!-- Top Menu Items >> -->
            <ul class="nav navbar-right top-nav">
            	
            	<?php
            	$username = $this->session->userdata['hotel_adminusername'];
            	$id= $this->Profilemodel->get_id($username);
				
				$date = date('Y-m-d');
				$block = $this -> db -> where('valid_to', $date) -> where('hotel_id', $id) -> get('tbl_hotel_roomnumber') -> num_rows();
            	?>
            	
            	<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span id="alert_count"></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown" id="alert-dropdown">
                    	<?php if($block) { ?>
                        <li>
                            <a href="<?php echo base_url(); ?>roomnumber">Rooms to release <span class="label label-warning"><?php echo $block; ?></span></a>
                        </li><?php }
                        if(!empty($book_count)) {
                        ?>
                        <li>
			<a href="<?php echo base_url(); ?>booking">New Booking <span class="label label-info"><?php echo $book_count; ?></span></a>
			</li>
			<?php } ?>
                    </ul>
                </li>
				
				<li>
                        <a href="<?php echo base_url('food_plan');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_food.png" >
								
								Food Plan
								
								
								
							</div>
						</a>
                    </li>
            						
						<li>
                        <a href="<?php echo base_url('coupon');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_coupons.png" >
								
								Coupons
								
								
								
							</div>
						</a>
                    </li>
				
				                 	<!---<li>
                        <a href="<?php echo base_url('offers');?>">
							<div class="container-fluid">

								<img src="<?php echo base_url();?>assets/img/h_offers.png" >
								
								
								offers
								
								
								
							</div>
						</a>
                    </li>--->
                    
                    
				<?php
				if(!empty($this->session->userdata['adminusername']))
				{
					
				?>
				<!-- Notification dropdown >> -->
               <li>
                    <a href="<?php echo base_url();?>../W$ngs_b@$k_@dm$n/hotel/category/<?php echo $this->session->userdata['category'];?>" ><i class="fa fa-home"></i> Back to Admin </a>
                
                </li>
                <!-- Notification dropdown << -->
                
                
                	<!-- User Details >> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> System Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url(); ?>settings/manageusers"><i class="fa fa-fw fa-users"></i> Staff</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>settings/changepassword"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <!--<li>
                            <a href="<?php echo base_url();?>hotel_access"><i class="fa fa-fw fa-gear"></i>Access Options</a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url();?>hotel_access/email"><i class="fa fa-fw fa-gear"></i> Email</a>
                        </li>
                         
                       
                       
                    </ul>
                </li>
                <!-- User Details << -->

                <?php
				}
				
				
				if(!empty($this->session->userdata['group_adminuser']))
				{?>
			
			<!-- Notification dropdown >> -->
               <li>
                    <a href="<?php echo base_url();?>group/list_group" ><i class="fa fa-home"></i> Back to Group </a>
                
                </li>
                <!-- Notification dropdown << -->
                
                
                	<!-- User Details >> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> System Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url(); ?>settings/manageusers"><i class="fa fa-fw fa-users"></i> Staff</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>settings/changepassword"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                         
                       
                       
                    </ul>
                </li>
                <!-- User Details << -->
					
				<?php
				}
				if(empty($this->session->userdata['group_adminuser']) && empty($this->session->userdata['adminusername']))
				{?>
                
				
				<!-- User Details >> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> System Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url(); ?>settings/manageusers"><i class="fa fa-fw fa-users"></i> Staff</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>settings/changepassword"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                         
                       
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- User Details << -->
				
				<?php
				}?>
                
                
            </ul>
            <!-- Top Menu Items >> -->
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	
                	
                	<div style="background: rgba(255,255,255,0.9); min-height: 75px;  ">
                		
                		 <?php
						
						if($logo):?>
                		<img src="<?php echo base_url().'../'.$logo->logo_img;?>" height="75" width="205" /><?php endif; ?>
                		
                	</div>
                	
              
                	
                	
                	         
                	
                   
					<!-- <li>
                        <a href="<?php echo base_url('profile');?>">
							<div class="container-fluid">
							
								<img src="<?php echo base_url();?>assets/img/h_users.png" >
							
								Profile
							</div>
						</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('roomtype');?>">
							<div class="container-fluid">
							
								<img src="<?php echo base_url();?>assets/img/h_room.png" >
								
								Rooms
								
							</div>
						</a>
                    </li>
					
					
					<li>
                        <a href="<?php echo base_url('roomcomp');?>">
							<div class="container-fluid">
								
								<img src="<?php echo base_url();?>assets/img/h_rate.png" >
				
								Room Rates
								
								
							</div>
						</a>
                    </li>
					
					
					<li>
                        <a href="<?php echo base_url('roomnumber');?>">
							<div class="container-fluid">

								<img src="<?php echo base_url();?>assets/img/h_room_number.png" >
								
								
								Room Number
								
								
								
							</div>
						</a>
                    </li>

	
					<li>
                        <a href="<?php echo base_url('offline/roomchart');?>">
							<div class="container-fluid">

								<img src="<?php echo base_url();?>assets/img/Offline_Booking.png" >
								
								
								Reservation
								
								
								
							</div>
						</a>
                    </li>



					<li class="sidebar_menu_cus_drop">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><img src="<?php echo base_url();?>assets/img/h_yogaandayurveda.png"> Packages <i class="fa fa-fw fa-caret-down"></i></a>
                        
                        
                        
                        
                        <ul id="demo3" class="collapse">
                          
                          
                              <li>
                        <a data-target="" data-toggle="" href="javascript:;"><img src="<?php echo base_url();?>assets/img/yoga_img.png">Other Packages</a>
                        <ul class="" id="">
                           <li>
                                <a href="<?php echo base_url('ayurveda/list_yoga');?>"><i class="fa fa-fw fa-table"></i> Manage Other Package</a>
                            </li>
                               <li>
                                <a href="<?php echo base_url('ayurveda/room_setting/yoga');?>"><i class="fa fa-fw fa-table"></i> Rate &amp; Availability</a>
                            </li>
                        </ul>
                    </li>
                        
                        <li>
                        <a data-toggle="" href="javascript:;"><img src="<?php echo base_url();?>assets/img/ayurveda_img.png "> Ayurveda</a>
                        <ul class="">
                          
                               <li>
                                <a href="<?php echo base_url('ayurveda/list_ayurveda');?>"><i class="fa fa-fw fa-table"></i> Manage Ayurveda</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('ayurveda/room_setting/ayurveda');?>"><i class="fa fa-fw fa-table"></i> Rate &amp; Availability</a>
                            </li>
                        </ul>
                    </li>
                           
                        </ul>
                    </li>
					
					
					
					<li>
                        <a href="<?php echo base_url('booking');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_booking.png" >
								
								Booking
								
								
								
							</div>
						</a>
                    </li>
					


  <li>
                        <a href="<?php echo base_url('booking/amendments');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_booking.png" >
								
								Amendments
								
								
								
							</div>
						</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('booking/cancelled');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_booking.png" >
								
								Cancellations
								
								
								
							</div>
						</a>
                    </li>

					
					<li>
                        <a href="<?php echo base_url('agency');?>">
							<div class="container-fluid">

								<img src="<?php echo base_url();?>assets/img/h_agency.png" >
								
								
								Agency
								
								
								
							</div>
						</a>
                    </li>
                    
   
					  
    
                    
						<li>
                        <a href="<?php echo base_url('report');?>">
							<div class="container-fluid">
								
				
								<img src="<?php echo base_url();?>assets/img/h_reports.png" >
								
								Report
								
								
								
							</div>
						</a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url('users');?>">
							<div class="container-fluid">
							
								<img src="<?php echo base_url();?>assets/img/h_users_icon.png" >
							
								Users
							</div>
						</a>
                    </li>
                    
                    
                    	<!--<li>
                        <a href="<?php echo base_url('dashboard/sms');?>">
							<div class="container-fluid">
							
								<img src="<?php echo base_url();?>assets/img/h_users_icon.png" >
							
								Send SMS
							</div>
						</a>
                    </li>--->
                    
                    
					<?php $access= $this -> db
	-> where('hotel_id', $id)
	-> get('tbl_hotels_access')
	-> row(); 
					
					if(!empty($access) && $access -> promotion) {
					?>
                   <li>
                        <a href="<?php echo base_url('dashboard/promotion');?>">
							<div class="container-fluid">
								<i class="fa fa-paper-plane" aria-hidden="true"></i>   Promotion
							</div>
						</a>
                    </li>
					
					<?php } ?>
					<!-- <li>
                        <a href="<?php echo base_url('settings/manageusers');?>">
							<div class="container-fluid">

								<img src="<?php echo base_url();?>assets/img/h_settings.png" >
								
								
								Settings
								
								
								
							</div>
						</a>
                    </li> -->

                </ul>
            </div>
            <!-- /.navbar-collapse -->
			
        </nav>


