<!-- Footer >> -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/package.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/auto_complete.js"></script>
<link href="<?php echo base_url();?>css/search.css" rel="stylesheet">

 <!--group booking >> -->
<div class="modal in" id="group_room" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header login_header">
          <button type="button" class="close login_close" data-dismiss="modal">&times;</button>
          	For Group Booking
        </div>
        <div class="modal-body login_form">
        	
        	<br>
        	
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
				
				<form name="gp_booking" id="gp_booking" action="" method="post">
        			<div id="bookig_sent"></div>
					
        			<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Your name">
						<div id="email_err"></div>
					</div>
					
					<div class="input form-group">
					    	<span id="sandbox-container5">
				           <input class="form-control" placeholder="Check-in date" name="check_in" id="check_in" >
				           </span>
				       		<div id="email_err"></div>
					</div>
				  	<div class="input form-group">
					    	<span id="sandbox-container6">
				           <input class="form-control" placeholder="Check-out date" name="check_out" id="check_out" >
				           </span>
				       		<div id="email_err"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="no_room" name="no_room" placeholder="No. of rooms">
						<div id="email_err"></div>
					</div>	
					
					<div class="form-group">
						<input type="text" class="form-control" id="sing_room" name="sing_room" placeholder="Single rooms">
						<div id="email_err"></div>
					</div>	
					
					<div class="form-group">
						<input type="text" class="form-control" id="dob_room" name="dob_room" placeholder="Double rooms">
						<div id="email_err"></div>
					</div>	
					
					<div class="form-group">
						<input type="text" class="form-control" id="ext_bed" name="ext_bed" placeholder="Extrabeds">
						<div id="email_err"></div>
					</div>	
					
					<div class="form-group">
					<textarea cols="30" rows="5" name="message" id="message" placeholder="Other details" class="form-control"></textarea>
					
						<div id="email_err"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
						<div id="email_err"></div>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="group_book" id="group_book" onclick="group_booking();"> Submit </button>  
					</div>
				</form>
				</div>

		  	</div>
    
          	

          
        </div>
        <div class="modal-footer login_bottom">
          
          <p>Please contact us</a></p>
          
        </div>
      </div>
      
    </div>
</div>



<div id="footer">
	      <div class="container">
	      	
	      	<div class="row">
	      		
	      		<div class="col-sm-12">
	      			<div class="col-sm-12 footer-row1">
	      			
		      			<div class="col-sm-6 col-md-3 footer_column">
		      			
			      			<ul class="footer_list_cus_4">
			      				<label class="footer_label">Company</label>
			      				<li><a href="<?php echo base_url();?>about">About Us</a></li>
			      				<li><a href="<?php echo base_url();?>contact">Contacts Us</a></li>
			      				<li><a href="<?php echo base_url();?>faq">FAQs</a></li>
			      				<li><a href="<?php echo base_url();?>terms-conditions">Terms and Conditions</a></li>
			      				<li><a href="<?php echo base_url();?>privacy-policy">Privacy Policy</a></li>
			      				<!-- <li><a href="#">Advertise with Us</a></li> -->
			      			</ul>
			      			
			      		</div>
	      		
			      		<div class="col-sm-6 col-md-3 footer_column footr_cat">
			      			
			      			<ul class="footer_list_cus_4">
			      				<label class="footer_label">All Categories</label>
			      				<li><a href="<?php echo base_url();?>hotels">Hotels</a></li>
			      				
			      				<li><a href="<?php echo base_url();?>ayurveda">Ayurveda</a></li>
			      				<li><a href="<?php echo base_url();?>hotel-packages">Hotel Packages</a></li>
			      				<li><a href="<?php echo base_url();?>holiday">Holidays</a></li>
			      				<li><a href="<?php echo base_url();?>homestays">Home Stays</a></li>
			      				<li><a href="<?php echo base_url();?>apartments">Apartments</a></li>
			      			</ul>
			      			
			      		</div>
	      		
			      		<div class="col-sm-6 col-md-3 footer_column">
			      			
			      			<ul class="footer_list_cus_4">
			      				<label class="footer_label">PARTNER WITH US</label>
			      				<li><a href="<?php echo base_url();?>register-your-property">Register Your Property</a></li>
			      				
			      				
			      				<li><a href="<?php echo base_url();?>bookingengine/index.php">Booking Engine</a></li>
			      				<!--<li><a href="<?php echo base_url();?>blog">Blog</a></li>-->
			      				
            	
            


             
             
             <!-- <li class="travel_agent_login_cus_block cus_234">
             	<a title="Travel Agent Login"  value="Travel Agent Login"   data-placement="bottom" data-toggle="tooltip" class="travel_agent_top"href="<?php echo base_url();?>travel_agent">
             		<i class="fa fa-user"></i> Travel Agent Login</a>
             	
            </li> -->
			      			</ul>
			      			
			      		</div>
		      		
			      		<div class="col-sm-6 col-md-3 footer_column">
			      			
			      			<ul class="footer_list_cus_4">
			      				<label class="footer_label">Other Links</label>
			      				<li><a href="<?php echo base_url();?>hotel_manager">Hotel Manager</a></li>
			      				<li><a href="<?php echo base_url();?>travel_agent">Travel Agent</a></li>
			      			</ul>
			      			
			      		</div>
			      		
			      	</div>
	      			
	      		</div>
	      		
	      		
	      		
						
	      		<div class="col-sm-12 newsletter_cus">
	      			<div class="col-sm-12 footer-row1">
	      				
	      		    	<form method="post" action="" name="newsletter" id="newsletter">
	      				<div class="col-sm-6 col-md-6 well footer_column  gld">
	      					
	      					<label class="footer_label">Get latest Deals</label>
	      					
		      				<div class="">
		      					<div class="col-md-8 newsletter_cus_2">
								  <div class="form-group">
								   	<input type="text" class="form-control" name="news_email" id="news_email" placeholder="Enter you email Id">
								   	<div class="err" id="news_ltr"></div>
								  </div>
							  	</div>
							  	<div class="col-md-3 newsletter_cus_3">
								  <div class="form-group">
								   	<input type="submit" class="btn btn-primary" value="Subscribe">
								  </div>
							  	</div>
		      				</div>
		      			</div>
		      			</form>
		      			
		      			
		      			
		      			<div class="col-sm-6 col-md-3 footer_column">
		      				
		      				<label class="footer_label">We accept</label>
							<div>
							<img src="<?php echo base_url();?>img/badge.png">
							</div>
		      				
		      			</div>
		      			
		      			<div class="col-sm-6 col-md-3 footer_column">
		      				
		      				<label class="footer_label">Follow Us</label>
		      				
		      				<span class="social">
		      					<a href="https://www.facebook.com/bookingwingscom-653293868157609" target="_blank"><i class="fa fa-facebook-square" ></i></a>
		      				</span>
		      				<span class="social">
		      					<a href="https://twitter.com/BookingWings" target="_blank"><i class="fa fa-twitter-square" ></i></a>
		      				</span>
		      				<span class="social">
		      					<a href="https://plus.google.com/b/112488172877454387028/" target="_blank"><i class="fa fa-google-plus-square"></i></a>
		      				</span>
		      				<span class="social">
		      					<a href="https://www.youtube.com/channel/UCNAIKbyO3CCS7hpsjN57mug" target="_blank"><i class="fa fa-youtube-square" target="_blank"></i></a>
		      				</span>
		      				
		      			</div>
		      		
		      		</div>
		      	</div>

		      	
		      	<div class="col-sm-12 footer_column footer_column_cus">
		      		<p><!--<marquee scrolldelay="100"   direction="right" behavior="alternate">-->
					<span class="best_del_cus">Best Deals Guaranteed</span><span class="best_del_cus1"> Great experiences at lowest prices guaranteed.</span>
					
		      		<!--</marquee>-->
					
					</p>
		      	</div>
	      		
	      		
	      		
	      	</div>
	      	
	      </div>
	   </div>
	   
	   <div id="copyright">
	      <div class="container">
	        <p class="copyright_p ">Copyright © 2016  <a href="#">Bookingwings.com</a>. All rights reserved. Powered by <a href="http://crantia.com/" style="text-transform: capitalize;font-size: 12px;">Crantia Technologies</a>.</p>
	      </div>
	   </div>
<!-- Footer << -->






<!--

<div id="wd_id"></div>
<script type="text/javascript">
document.getElementById("wd_id").innerHTML='<iframe src="http://www.bookingwings.com/hotel_detail/widget/15" style="position: fixed !important; border: 0px !important; bottom: 0px !important; right: 0px !important;"></iframe>';
</script>--->







<script>
		var baseurl = '<?php echo base_url();?>';
	
	</script>
