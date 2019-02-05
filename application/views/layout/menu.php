<div class="result_main_nav nav-desk">
				 	<div class="container">	   	
	    				<nav role="navigation" class="navbar no_padding_l no_padding_r no_border">
						    
						    <!-- Brand and toggle get grouped for better mobile display -->
						   <!-- <div class="navbar-header">
						        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						            <span class="sr-only">Toggle navigation</span>
						            <span class="icon-bar"></span>
						            <span class="icon-bar"></span>
						            <span class="icon-bar"></span>
						        </button>
						    </div>-->
						    <!-- Collection of nav links and other content for toggling -->
						    <?php $sub_cat = $this -> uri -> segment(1); ?>
						    <div id="navbarCollapse" class="collapse navbar-collapse navbar no_padding_l no_padding_r no_margin no_border">
						        <ul class="nav navbar-nav home_search_nav menu_search">
						            <li <?php if($sub_cat == 'hotels') echo 'class="active"'; ?>><a href="<?php echo base_url();?>hotels"><span class="nav_menu_ico ico_hotel"></span> Hotels</a></li>
						           <!-- <li <?php if($sub_cat == 'resorts') echo 'class="active"'; ?>><a href="<?php echo base_url();?>resorts"><span class="nav_menu_ico ico_resorts"></span> Resorts</a></li>-->
						           <li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?>><a href="<?php echo base_url();?>ayurveda"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
						            <li <?php if($sub_cat == 'hotel-packages') echo 'class="active"'; ?>><a href="<?php echo base_url();?>hotel-packages"><span class="nav_menu_ico ico_yoga"></span>Hotel Packages</a></li>
						           <!--- <li <?php if(($sub_cat == 'packages') || (($sub_cat == 'holiday'))) echo 'class="active"'; ?>><a href="<?php echo base_url();?>holiday"><span class="nav_menu_ico ico_holidays"></span> Holidays</a></li>--->
						            <li <?php if($sub_cat == 'homestays') echo 'class="active"'; ?>><a href="<?php echo base_url();?>homestays"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
						            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?>><a href="<?php echo base_url();?>apartments"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
						      </ul>
						    </div>
						</nav>
					</div>
				</div>
<nav class="navbar navbar-default navbar-static-top nav-mob">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <!--<div class="navbar-header">
	     <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	      
	       <a class="" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>img/logo.png" /> </a>
	      
	    </div>-->
	
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
		    <ul class="nav navbar-nav home_search_nav menu_search">
			
						            <li <?php if($sub_cat == 'hotels') echo 'class="active"'; ?>><a href="<?php echo base_url();?>hotels"><span class="nav_menu_ico ico_hotel"></span> Hotels</a></li>
						            
						           <li <?php if($sub_cat == 'ayurveda') echo 'class="active"'; ?>><a href="<?php echo base_url();?>ayurveda"><span class="nav_menu_ico ico_ayurveda"></span> Ayurveda</a></li>
						            <li <?php if($sub_cat == 'hotel-packages') echo 'class="active"'; ?>><a href="<?php echo base_url();?>hotel-packages"><span class="nav_menu_ico ico_yoga"></span>Hotel Pakages</a></li>
						          
						            <li <?php if($sub_cat == 'homestays') echo 'class="active"'; ?>><a href="<?php echo base_url();?>homestays"><span class="nav_menu_ico ico_stays"></span> Home Stays</a></li>
						            <li <?php if($sub_cat == 'apartments') echo 'class="active"'; ?>><a href="<?php echo base_url();?>apartments"><span class="nav_menu_ico ico_apartments"></span> Apartments</a></li>
									<li><a><span class="title_toll_free pull-right"></span>Call Us : +91 471 2382099</a></li>
						      </ul>
	
	      	
	      	
			
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>