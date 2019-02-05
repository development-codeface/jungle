	<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	       <a class="" href="<?php echo base_url().'reservation/'.url_title($details->title).'?hotel='.$id;?>"> <img class="logo_l" src="<?php echo base_url().$details->logo_img;?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    		    	

	      <ul class="nav navbar-nav navbar-right cus_nav_block">

	      	
	        <li class="dropdown">
	        <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
			<a id="log_reserve" class="sign_in">
			<i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a></button>
	        	
	          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
	          
	          
	          <ul class="dropdown-menu">
	          	
	            	
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $id; ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
	        </li>
	      </ul>

	      
	
	      	
	      	<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> <?php if(!empty($details->phone)){ ?> Call Us : <?php echo $details->phone ;?> <?php }?> </span>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>


<?php $select = $this->uri->segment(2); ?>
						
						    <div id="page-wrapper">
						    	
						    	
    	<div class="review_block_header_img">
    		<div class="review_block_header_img_opac">
    	<div id="account-banner" >
    		
    		<div class="container">
    			
    			<div class="pro_pic pull-left">
    				<div class="inner" style="background: url(<?php if(!empty($user[0]->photo)) { echo '../'.$user[0]->photo; } else { echo base_url().'img/pro_pic.jpg'; } ?>) no-repeat center center; background-size: cover;"> <!-- Profile pic -->
    				</div>
    			</div>
    			
    			<div class="pro_name pull-left">
    				<h1><?php echo $user[0]->first_name." ".$user[0]->last_name;?></h1>
    				<p><?php echo $user[0]->email;?></p>
    				<p><?php if($user[0]->phone){ echo $user[0]->phone; } ?></p>
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
		            <li <?php if($select == 'user' || $select == 'editprofile' || $select == 'changepassword' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>reservation/user?hotel=<?php echo $id; ?>">Account</a></li>
		            <li <?php if($select == 'booking' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>reservation/booking?hotel=<?php echo $id; ?>">Booking</a></li>
		            <li <?php if($select == 'review' ) { echo 'class="active"'; } ?>><a href="<?php echo base_url();?>reservation/review?hotel=<?php echo $id; ?>">Reviews</a></li>
		          </ul>
		        </div><!-- /.navbar-collapse -->
		        
		      </div><!-- /.container-fluid -->
		</nav>

		</div>		</div>		
		<div class="container">	
			
			
						
			<div class="col-md-12 wrapper-row">

				<div class="row pro_wrapper">
				
				<?php if($select != 'booking' && $select != 'review' ) { ?>
				<nav class="account_menu">
	<ul>
		<li <?php if($select == 'user' ) { echo 'class="current"'; } ?>><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $id; ?>">Profile</a></li>
		<li <?php if($select == 'editprofile' ) { echo 'class="current"'; } ?>><a href="<?php echo base_url(); ?>reservation/editprofile?hotel=<?php echo $id; ?>">Edit Profile</a></li>
		<li <?php if($select == 'changepassword' ) { echo 'class="current"'; } ?>><a href="<?php echo base_url(); ?>reservation/changepassword?hotel=<?php echo $id; ?>">Password</a></li>
	</ul>
</nav>
<?php } ?>