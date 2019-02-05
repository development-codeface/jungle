<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="col-md-12 col-sm-12 col-xs-12 bg-img">
 <div class="col-md-12 col-sm-12 col-xs-12 ">
	<div class="col-md-4 col-sm-6 col-xs-12 img-logo">
		<img src="images/logo.png">
	</div>
 </div>
	<!-- <div class="col-md-6 content-head">
	Grow your business with our booking engine
  <div class="sub-content">free payment gateway</div>
	</div> -->
	
	<div class="col-md-6 col-sm-6 col-xs-12">
			<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
			
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
				  <div class="carousel-caption">
					<h3>Grow your business with our booking engine</h3>
					<h4> Give your guests the convenience of booking directly with your hotel website</h4>
				  </div>
				</div>
				<div class="item">
				  <div class="carousel-caption">
					<h3>Increase your revenue 20 to 30%</h3>
					<h4>  you can save on commission for every customer those books directly with your website.</h4>
				  </div>
				</div>
				<div class="item">
				  <div class="carousel-caption">
					<h3> Delight Guests with Special Packages</h3>
					<h4> booking engine allows you to sell special packages like Ayurveda and other packages from your website</h4>
				  </div>
				</div>	
				<div class="item">
				  <div class="carousel-caption">
					<h3> Secure Payment Gateway Integrated</h3>
					<h4> PCI DSS compliant payment gateway ensures safe transactions and guest security.</h4>
				  </div>
				</div>
			  </div>

			 
		</div>	
	</div>

	<div class="col-md-4  col-sm-6 col-xs-12 bg-right">
		<h3>Go live with Bookingwings starts here </h3>
		<?php
				$msg=isset($_REQUEST['msgs']);
				if($msg == "suc")
				{
					echo "<div>
						<p class='succes_message' style='color:red'>Mail sent successfully</p>
						</div>";
				}
				else if($msg == "fail")
				{
					echo "<div >
						<p class='succes_message' style='color:red'>Sorry try again</p>
						</div>";
				} 
				?>
		<form name="contact_mail" id="contact_mail" method="post" action="http://www.bookingwings.com/bookingengine/include/contact_mail.php">
		<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
		  <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-describedby="basic-addon1">
		</div>
		<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
		  <input type="text" class="form-control" placeholder="Email" name="mail" id="mail" aria-describedby="basic-addon1">
		</div>
		<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
		  <input type="text" class="form-control" placeholder="Mobile" name="phone" id="phone" aria-describedby="basic-addon1">
		</div>
		<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
		  <input type="text" class="form-control" placeholder="Business Name" name="busi_name" id="busi_name" aria-describedby="basic-addon1">
		</div>
		<!--<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
			<input type="checkbox" id="term" name="term"/><span>  I agree to Bookingwings Terms & Conditions</span>
		</div>-->
		<div class="input-group col-md-12 col-sm-12 col-xs-12 input-outer">
			<input type="submit" value="Go Live Now" class="but-go" name="submit">
		</div>
		</form>
  </div>
</div>
<section class="cl-both">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-10  col-sm-12 col-xs-12 margin_auto go-live-sec">
			<h3>Go Live in the Shortest Time</h3>
			<h4>Simple signup.Fill business details.Start collecting bookings.</h4>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center"><img src="images/underline.png"></div>
			<div class="outer-pad">
			<div class="col-md-2 col-sm-4 col-xs-12 icon-grup">
				<h3>Sign up</h3>			
				<img src="images/sign-up.png">
			</div>
			<div class="col-md-3  col-sm-2 col-xs-12 arrow-next">
			<img src="images/marker_next.png">
			</div>
			
			<div class="col-md-2 col-sm-4 col-xs-12  icon-grup1">
			<h3>Fill Business Details</h3>
			<img src="images/bus-det.png">
			</div>
			<div class="col-md-3 arrow-next">
			<img src="images/marker_next.png">
			</div>
			
			<div class="col-md-2 col-sm-4 col-xs-12  icon-grup2">
			<h3>Start collecting Bookings</h3>
			<img src="images/payment.png">
			</div>
			</div>
		</div>
	</div>
</section>
<section class="cl-both1 third-sec">
<div class="bg-sec">
	<div class="col-md-12  col-sm-12 col-xs-12 tab-sec">
		<ul  class="nav nav-tabs">
			<li class="active">
				<a href="#1b" data-toggle="tab">
				
				<div class="tab-text">
				<div class="col-md-12 col-sm-12 col-xs-12 icon-nav-pil"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
				<div class="sub-text">Booking Engine</div>
				</div>
				</a>
			</li>
			
			<li>
				<a href="#5b" data-toggle="tab">
				<div class="col-md-12 col-sm-12 col-xs-12 icon-nav-pil"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
				<div class="sub-text">Channel Manager</div>
				</a>
			</li>
			<li>
				<a href="#2b" data-toggle="tab">
				<div class="col-md-12 col-sm-12 col-xs-12 icon-nav-pil"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
				<div class="sub-text">Payment gateway</div>
				</a>
			</li>
			<li>
				<a href="#3b" data-toggle="tab">
					<div class="col-md-12 col-sm-12 col-xs-12 icon-nav-pil"><i class="fa fa-server" aria-hidden="true"></i></div>
					<div class="sub-text">Dashboard</div>
				</a>
			</li>
			<li>
				<a href="#4b" data-toggle="tab">
				<div class="col-md-12 col-sm-12 col-xs-12 icon-nav-pil"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="sub-text">Pricing</div>
				</div>
				
				</a>
			</li>
			
		</ul>
		<div class="tab-content cl-both col-md-10 margin_auto outer-tab-tex">
		
			 <div class="tab-pane active col-md-12 col-sm-12 col-xs-12" id="1b">
				<h3>Easy & Lightweight Integration</h3>
				<ul class="det-info">
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Accept instant bookings from your website</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Accept packages bookings like Ayurveda, yoga, honeymoon packages from your website</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Increase profit 20% to 30%</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Generate automated confirmation voucher to guest</span></li>
				</ul>
			 </div>
			 
			 
			 
			   <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="5b">
			  <h3>Stay effortlessly and collect payments online</h3>
				<ul class="det-info">
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Get booked faster online by uploading real time rate and room inventory.</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Remove manual entry with complete real-time automation.</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Have all your rooms online at once to increase revenue.</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Make more powerful, insightful decisions. </span></li>
					
				</ul>
			  </div>
			  
			  
			  
			  <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="2b">
			  <h3>Stay effortlessly and collect payments online</h3>
				<ul class="det-info">
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Collect payments online to your bank account</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>PCI DSS compliant payment gateway ensures safe transactions </span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Receive payments through credit cards, debit cards, online wallets and net banking</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Flat 3% TDR ( Bank Charges) for every success full booking if using payment gateway service Points to Change and Add Pricing</span></li>
						
					
				</ul>
			  </div>
			   <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="3b">
			    <h3>Complete control of your bookings</h3>
				<ul class="det-info">
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Track bookings in real time</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Manage all your room rates and packages </span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Manage all your online and offline bookings</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Manage all your travel agents</span></li>
				</ul>
			  </div>
			   <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="4b">
			   <h3>Don’t let the higher transaction charge affect your cash flow</h3>
				<ul class="det-info">
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Rs. 6500/- as setup fee and no annual maintenance cost</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Enjoy flat 2% fee per successful transactions through booking engine</span></li>
					<li><i class="fa fa-check-circle" aria-hidden="true"></i><span>Enjoy flat 2% fee per successful transactions through Channel Manager</span></li>
			
				</ul>
			  </div>
		</div>
	</div>	
	</div>
</section>
<!-- <section class="cl-both1 four-sec">
	<h3>OUR CLIENTS</h3>
	<div class="col-md-12 col-sm-12 col-xs-12 text-center"><img src="images/underline.png"></div>
	<div class="col-md-10 col-sm-12 col-xs-12 margin_auto">
			<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" data-pause="false">
			 
			   Wrapper for slides
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/make-my.png">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6 ico-client">
						<img src="images/booking.png">
					</div>
					
					
				</div>
				
			  </div>
 <ol class="carousel-indicators cl-det">
				<li data-target="#carousel-example-generic1" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic1" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic1" data-slide-to="2"></li>
			  </ol>
			 
		</div>
	</div>
</section> -->
 <section class="cl-both1 four-sec">
	<h3>FAQ'S</h3>
	<div class="col-md-12 col-sm-12 col-xs-12 text-center"><img src="images/underline.png"></div>
	<div class="col-md-10 col-sm-12 col-xs-12 margin_auto">
			<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" data-pause="false"  data-interval="15000">
			 
			  <div class="carousel-inner" role="listbox" style="margin-top: 33px;">
				<div class="item active">
					<div class="col-md-12 col-sm-12 col-xs-12 hy">
						<h3 class="faq">What is a booking Engine?</h3>
						<ul class="faq-ans">
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							When guest visits on your website they should be able
							to easily search for which rooms are available at what rate for the date they are interested in.
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Your booking Engine show this to them in easy to understand, view, much like calendar being used on OTA booking site.
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							The booking engine software offers a seamless flow to accept booking of customers through the hotelier’s website.
							</li>
						</ul>
					</div>
					
				</div>
				<div class="item">
					<div class="col-md-12 col-sm-12 col-xs-12 hy">
						<h3 class="faq">Why Booking Engine?</h3>
						<ul class="faq-ans">
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Easier backend management for rate changes, room allocation, serving other facilities to guest etc.
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Adding promotional offers during different season of the year
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Offering service of online payment
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Retain customer details for future business
							</li>
						</ul>
					</div>
					
				</div>
				<div class="item">
					<div class="col-md-12 col-sm-12 col-xs-12 hy">
						<h3 class="faq">Should Small or medium size hotels/resort, home stays and apartment go for Booking Engine?</h3>
						<ul class="faq-ans">
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							68% of the internet users book travel online
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							80% of  internet users research products and services online and 75% book online
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							For a impatient internet user, there should be cleare cut visibility of booking process 
							which will trigger them to complete the “call to action” which is mostly booking the room
							</li>
							
						</ul>
					</div>
					
				</div>
				<div class="item">
					<div class="col-md-12 col-sm-12 col-xs-12 hy">
						<h3 class="faq">Things to be considered while selecting booking engine for your hotel</h3>
						<ul class="faq-ans">
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Rooms should easily to find with simple procedure
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Rate should display clearly
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Addition / removal of room when required
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Maintaining documents for your customer details
							</li>
							<li>
							<i class="fa fa-check" aria-hidden="true"></i> 
							Adding more images for your hotels
							</li>
							
						</ul>
					</div>
					
				</div>
			  </div>
 <ol class="carousel-indicators cl-det">
				<li data-target="#carousel-example-generic1" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic1" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic1" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic1" data-slide-to="3"></li>
			  </ol>
			 
		</div>
	</div>
</section>
<section class="cl-both1 five-sec">
<ul class="col-md-7 col-sm-7 col-xs-11 margin_auto">
<h4 class="pull-left">Payments Powered by</h4>
	<li class="col-md-1 col-sm-1 col-xs-2"><img src="images/verfiedvisa.png"></li>
	<li class="col-md-1 col-sm-1 col-xs-2"><img src="images/master-card.png"></li>
	<li class="col-md-1 col-sm-1 col-xs-2"><img src="images/citi.jpg"></li>
	<li class="col-md-1 col-sm-1 col-xs-2"><img src="images/sbt.jpg"></li>
	
</ul>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>
<script>
 $(document).ready(function(){ 
$('.succes_message').fadeOut(8000);
});
</script>
</body>
</html>