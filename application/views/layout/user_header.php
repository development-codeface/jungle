<link href="<?php echo base_url();?>css/offcanvas.min.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>js/offcanvas.js"></script>
<style>
.nav-mob
{
	display:none !important;
}
</style>
<!-- Header >> -->
	<nav class="navbar navbar-default navbar-static-top nav-desk">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	    <a class="" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>img/logo.png" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block">
	      	
<!-- 
            <li><a href="<?php echo base_url();?>hotels">Results</a></li>
            <li><a href="<?php echo base_url();?>hotel_detail">Detail View</a></li>
            <li><a href="#">Action</a></li> -->

			            <li class="currency_block_cus_li">
            	
            	
<div class="dropdown">
  <button class="dropbtn"><?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?> <i class="fa fa-angle-down"></i></button>

  <div class="dropdown-content">
  <a href="#" onclick="set_value('inr');"><i class="fa fa-rupee"></i> Rupee</a>
  <a href="#" onclick="set_value('usd');"><i class="fa fa-dollar"></i> Dollar</a>
  <a href="#" onclick="set_value('eur');"><i class="fa fa-euro"></i> Euro</a>
  <a href="#" onclick="set_value('gbp');"><i class="fa fa-gbp"></i> Pound</a>
	
		      		

  </div>
</div>
            	
         
            
            	</li>

<?php 
$user_session=$this->session->all_userdata();
if($this->session->userdata['log_usertype'] == 'travel_agent') { 

$username = $user_session['log_username'];
$this->db->select('name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_travels');
 $name=$query->row();
}
else
{
	
 $username = $user_session['log_username'];
$this->db->select('first_name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_user');
 $name=$query->row();
 
}

?>
	      	
	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-default navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
			<i class="fa fa-user"></i> Welcome   <?php echo $name->name;?><i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	          
	          <ul class="dropdown-menu">
	          	
	            
	            
	            <?php if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>
	            	
	            <li class="pull-left"><a href="<?php echo base_url();?>travel_agent/profile">My Account </a></li>
	            <?php } else {?>
	            	
	            <li class="pull-left"><a href="<?php echo base_url();?>user/">My Account </a></li>
	            <?php } ?>
	            <li class="pull-left"><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
	        </li>
	      </ul>
	      
	      	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> Call Us : +91 471 2213881</span>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
<!-- Header >> -->
<!-- Header >> -->
	<nav class="navbar navbar-default navbar-static-top nav-mobb">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	      
	    <a class="" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>img/logo.png" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse sidebar-offcanvas" id="bs-example-navbar-collapse-1">
	    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block">
	      	
<!-- 
            <li><a href="<?php echo base_url();?>hotels">Results</a></li>
            <li><a href="<?php echo base_url();?>hotel_detail">Detail View</a></li>
            <li><a href="#">Action</a></li> -->

			            <li class="currency_block_cus_li">
            	
            	
						<div class="dropdown">
						  <button class="dropbtn"><?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?> <i class="fa fa-angle-down"></i></button>

						  <div class="dropdown-content">
						  <a href="#" onclick="set_value('inr');"><i class="fa fa-rupee"></i> Rupee</a>
						  <a href="#" onclick="set_value('usd');"><i class="fa fa-dollar"></i> Dollar</a>
						  <a href="#" onclick="set_value('eur');"><i class="fa fa-euro"></i> Euro</a>
						  <a href="#" onclick="set_value('gbp');"><i class="fa fa-gbp"></i> Pound</a>
							
											

						  </div>
						</div>
            	
         
            
					</li>

<?php 
$user_session=$this->session->all_userdata();
if($this->session->userdata['log_usertype'] == 'travel_agent') { 

$username = $user_session['log_username'];
$this->db->select('name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_travels');
 $name=$query->row();
}
else
{
	
 $username = $user_session['log_username'];
$this->db->select('first_name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_user');
 $name=$query->row();
 
}

?>
	      	
	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-default navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
			<i class="fa fa-user"></i> Welcome   <?php echo $name->name;?><i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	          
	          <ul class="dropdown-menu">
	          	
	            
	            
	            <?php if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>
	            	
	            <li class="pull-left"><a href="<?php echo base_url();?>travel_agent/profile">My Account </a></li>
	            <?php } else {?>
	            	
	            <li class="pull-left"><a href="<?php echo base_url();?>user/">My Account </a></li>
	            <?php } ?>
	            <li class="pull-left"><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
	        </li>
	      </ul>
	      
	      	<span class="title_toll_free pull-right bordr-bot"><i class="fa fa-phone"></i> Call Us : +91 471 2213881</span>
			<ul class="nav navbar-nav profile_nav">
		            <li <?php if($select1 == 'user' && $select2 != 'review' && $select2 != 'booking' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user">Account</a></li>
		            <li <?php if($select2 == 'booking' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user/booking">Booking</a></li>
		            <li <?php if($select2 == 'review' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user/review">Reviews</a></li>
		          </ul>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
<!-- Header >> -->



<?php   $this->load->view('layout/menu');  
	//$sub_cat = $this -> uri -> segment(1);
	?>


















<?php 
$select1 = $this->uri->segment(1);
$select2 = $this->uri->segment(2);

if($this->session->userdata['log_usertype'] == 'travel_agent') { ?>


    <div id="page-wrapper">
    	<div class="review_block_header_img">
    		
    		<div class="review_block_header_img_opac">
    	<div id="account-banner" >
    		
    		<div class="container">
    			
    			<div class="pro_pic pull-left">
    				<div class="inner" style="background: url(<?php echo base_url();?>img/pro_pic.jpg) no-repeat center center; background-size: cover;"> <!-- Profile pic -->
    				</div>
    			</div>
    			
    			<div class="pro_name pull-left">
    				<h1><?php echo $profile->name;?></h1>
    				<p><?php echo $profile->email;?></p>
    				<p><?php echo $profile->contact;?></p>
    			</div>
    			
    		</div>
    		
    	</div>

		
		<nav class="navbar-inverse">
		      <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        
		        <div class="navbar-header">
		        	
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          
		        </div>
		
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse no_padding_l no_padding_r" id="bs-example-navbar-collapse-9">
		          <ul class="nav navbar-nav profile_nav">
		            <li <?php if($select1 == 'user' && $select2 != 'review' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user">Account</a></li>
		            <li><a href="#">Booking</a></li>
		            <li <?php if($select2 == 'review') { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>review">Reviews</a></li>
		          </ul>
		        </div><!-- /.navbar-collapse -->
		        
		      </div><!-- /.container-fluid -->
		</nav>
</div>
</div>
				
		<div class="container">	
			
			
						
			<div class="col-md-12 wrapper-row">

				<div class="row pro_wrapper">
					
					<?php } else {?>
						
						    <div id="page-wrapper">
						    	
						    	
    	<div class="review_block_header_img">
    		<div class="review_block_header_img_opac">
    	<div id="account-banner" >
    		
    		<div class="container">
    			
    			<div class="pro_pic pull-left">
    				<div class="inner" style="background: url(<?php echo $user[0]->photo;?>) no-repeat center center; background-size: cover;"> <!-- Profile pic -->
    				</div>
    			</div>
    			
    			<div class="pro_name pull-left">
    				<h1><?php echo $user[0]->first_name." ".$user[0]->last_name;?></h1>
    				<p><?php echo $user[0]->email;?></p>
    				<p><?php if($user[0]->phone){ echo $user[0]->phone; } ?></p>
    			</div>
    			
    		</div>
    		
    	</div>

		
		<nav class="navbar-inverse nav-desk">
		      <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        
		        <div class="navbar-header">
		        	
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          
		        </div>
		
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse no_padding_l no_padding_r" id="bs-example-navbar-collapse-9">
		          <ul class="nav navbar-nav profile_nav">
		            <li <?php if($select1 == 'user' && $select2 != 'review' && $select2 != 'booking' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user">Account</a></li>
		            <li <?php if($select2 == 'booking' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user/booking">Booking</a></li>
		            <li <?php if($select2 == 'review' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>user/review">Reviews</a></li>
		          </ul>
		        </div><!-- /.navbar-collapse -->
		        
		      </div><!-- /.container-fluid -->
		</nav>

		</div>		</div>		
		<div class="container">	
			
			
						
			<div class="col-md-12 wrapper-row">

				<div class="row pro_wrapper">
						
					<?php } ?>
	
					
			