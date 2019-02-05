<link href="<?php echo base_url();?>css/offcanvas.min.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>js/offcanvas.js"></script>
<!-- Header >> -->
	<nav class="navbar navbar-default navbar-static-top nav-desk">
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
	    <div class="collapse navbar-collapse sidebar-offcanvas"id="bs-example-navbar-collapse-1">
	    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block ">
	      	
	      	

	      	



            <!-- <li><a href="<?php echo base_url();?>hotels">Results</a></li>
            <li><a href="<?php echo base_url();?>hotel_detail">Detail View</a></li> -->
            
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
            
            <!-- 
            <li class="travel_agent_login_cus_block">
            	  <button type="button" class="btn btn-primary navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            	<a title="Travel Agent Login"  value="Travel Agent Login"   data-placement="bottom" data-toggle="tooltip" class="travel_agent_top"href="<?php echo base_url();?>travel_agent">  
            		<i class="fa fa-user"></i> Travel Agent Login
            	<!-- <img class="img_travel_agent" src="http://localhost/booking/img/travel_agent.png" style=""> </a></button></li> -->
            <!-- <li><a href="<?php echo base_url();?>packages">Packages</a></li>
            <li><a href="#">Action</a></li> -->


	      	
<?php 
$user_session=$this->session->all_userdata();

if(!empty($this->session->userdata['log_usertype']))
{
if($this->session->userdata['log_usertype'] == 'travel_agent') { 

$username = $user_session['log_username'];
$this->db->select('name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_travels');
 $name=$query->row();
}
}
if(!empty($this->session->userdata['log_username']))
{
if($this->session->userdata['log_usertype'] != 'travel_agent') { 

 $username = $user_session['log_username'];
$this->db->select('first_name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_user');
 $name=$query->row();
}
}

?>
	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-primary navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="fa fa-user"></i>
				<?php
	          	if(isset($this->session->userdata['log_username']))
				{?>
				Hello!  &nbsp;<?php echo $name->name; 
				}
				else
				{
				?>
			My Account
				<?php } ?>			<i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	          <ul class="dropdown-menu">
	          	<?php
	          	if(isset($this->session->userdata['log_username']))
				{?>
					
	                <li class="pull-left"><a href="<?php echo base_url();?>user">My Account </a></li>
	             <li class="pull-left"><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	            
					<?php
				}
				else
				{?>
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#login_model" id="login_data" >Sign In</a></li>
	            
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#register_model">Register</a></li>
	            <?php
				}?>
	          </ul>
	        </li>
	      </ul>
	
	      	
	      	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> Call Us : +91 471 2213881</span>
			
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>
<!-- Header >> -->



<nav class="navbar navbar-default navbar-static-top nav-mob">
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
	    <div class="collapse navbar-collapse sidebar-offcanvas"id="bs-example-navbar-collapse-1">
	    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block ">
	      
	     
            
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

if(!empty($this->session->userdata['log_usertype']))
{
if($this->session->userdata['log_usertype'] == 'travel_agent') { 

$username = $user_session['log_username'];
$this->db->select('name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_travels');
 $name=$query->row();
}
}
if(!empty($this->session->userdata['log_username']))
{
if($this->session->userdata['log_usertype'] != 'travel_agent') { 

 $username = $user_session['log_username'];
$this->db->select('first_name as name');
$this->db->where('email',$username);
$query = $this->db->get('tbl_user');
 $name=$query->row();
}
}

?>
	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-primary navbar-btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="fa fa-user"></i>
				<?php
	          	if(isset($this->session->userdata['log_username']))
				{?>
				Hello!  &nbsp;<?php echo $name->name; 
				}
				else
				{
				?>
			My Account
				<?php } ?>			<i class="fa fa-angle-down"></i></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	          <ul class="dropdown-menu">
	          	<?php
	          	if(isset($this->session->userdata['log_username']))
				{?>
					
	                <li class="pull-left"><a href="<?php echo base_url();?>user">My Account </a></li>
	             <li class="pull-left"><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	            
					<?php
				}
				else
				{?>
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#login_model" id="login_data" >Sign In</a></li>
	            
	            <li class="sign_in"><a href="" data-toggle="modal" data-target="#register_model">Register</a></li>
	            <?php
				}?>
	          </ul>
	        </li>
	      </ul>
		    	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> Call Us : +91 471 2213881</span>
	      	
	     
			
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>






	<?php   $this->load->view('main/login');   ?>












