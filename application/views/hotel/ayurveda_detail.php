<?php
$state = $this->Hotels_model->location($details->state);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Book rooms in <?php echo $details->title; ?> in <?php echo $details->place; ?> at discount price. Great deals and offers; check hotel tariff reviews photos amenities contact details.">
    <meta name="author" content="">

 <title><?php echo $details->title; ?> | Book Hotel in <?php echo $details->place.', '. $state->district.','.$state->state;?> - Tariff Reviews Price Photos</title>
 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
    
        <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">

    <link href="<?php echo base_url();?>css/bootstrap-datepicker.css" rel="stylesheet">





    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css">
	<style>
#footer
{
	    position: relative;
		
}

h1.hotelDetailheading1
{
	position:relative;
}

	</style>
	<script>
function reset_options() {
    $(".no_of_rooms").val('0');
	 $(".each_rm_price").val('');
	  $(".no_rms").val('');
	 
}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body data-spy="scroll" data-target=".scrollspy" data-offset="75" class="filter_block-cus_3" onload='reset_options()'>
	
	
	
	
	<!----------header--------->
	<?php   $this->load->view('layout/header');   ?>
										
							  
						
	
    <div id="result-wrapper">
    	
<?php  
 $this->load->view('layout/menu'); 
$sub_cat = $this -> uri -> segment(1);
	 if($sub_cat == 'ayurveda'){ $subcat_name = "ayurveda";}
	 if($sub_cat == 'hotel-packages'){ $subcat_name = "Hotel Packages";}
	
	?>
        
    	
				
		<div class="container top-navv">
			
			

			
			

			
			
			
			
			<div class="row">
				
				<div class="col-md-8">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Package</li>
					</ol>
				</div>
				
				<div class="col-md-4 modify_btn">
					
					<!-- <a href="#" class="btn btn-default pull-right">MODIFY SEAECH</a> -->
					
				</div>
				
			</div>

			<?php
if(empty($this->session->userdata['datahere']['check_in']) && empty($this->session->userdata['datahere']['check_out'] ))
							{
								$checkin =date('Y-m-d');
								$checkout = date('Y-m-d', strtotime(' +1 day'));
							}
							else
							{
								$checkin = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
								$checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
						
							}
							?>
			
			<div class="row">
				
				<!--<div class="col-md-3">
				
					<div class="view_filter">
						
					
						<span class="sub">CHANGE DATE </span>	
						<?php //print_r($details) ?>
					
								<form class="coontainer-fluid search_block" method="get" role="form" action="<?php echo base_url().$sub_cat; ?>/detail-search">
							<input type="hidden" name="category" id="categorys" value="<?php echo $details->category; ?>" />
							<input type="hidden" name="ayur_id" id="ayur_id" value="<?php echo $pack_id; ?>" />
							<span class="view_label   checkin_cus">Check in</span>
							<div class="input-group">
								<span style="background-color:#FFFFFF" class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<span id="sandbox-container" >
								<input class="form-control clsDatePicker hasDatepicker" name="check_in" id="valid_from"
								value="<?php echo date_format(date_create_from_format('Y-m-d',$checkin), 'd-m-Y');?>" type="text" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;">
								</span>
							</div>
							
							<span class="view_label checkout_cus">Check out</span>
							<div class="input-group">
								<span style="background-color:#FFFFFF" class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<span id="sandbox-container4" >
								<input class="form-control clsDatePicker hasDatepicker" name="check_out" id="valid_to" value="<?php echo date_format(date_create_from_format('Y-m-d',$checkout), 'd-m-Y');?>" type="text" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;">
								</span>
							</div>
							<div class="date_alert" style="display : none;">Please Enter a valid date</div>
							<!--<span class="view_label cus_room_title_2">Packages/hotels</span>
							
							<div class="input-group">
								
								
								<input id="detail_package" class="form-control clsDatePicker hasDatepicker"  name="hidden-search" type="text" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;" value="<?php if(!empty($this->session->userdata['datahere']['hidden_search'])){ echo $this->session->userdata['datahere']['hidden_search']; } ?> ">
							</div>
							<div class="package_alert" style="display : none;">Please Enter a Package/hotels</div>
							<br>
							<input type="submit"  name="search" class="btn btn-primary sidebar_sub" id="ayur_detail_search_button" <?php if(empty($this->session->userdata['datahere']['hidden_search'])){?><?php } ?> value="Search" /> 
							
							
							
							<div id="new_rooms">
										 </div>
							


							
						</form>
							
						
						
					</div>
					
				</div>-->
				<?php 
				
				if(!empty($details)) {
						
											
				$state = $this->Hotels_model->location($details->state);
				
				//$image = $this->Hotel_detail_model->imagesById($details->id);
				
				$facilities = $this->Hotel_detail_model->facilitiesById($details->id);
				
				$room_detail = $this->Hotel_detail_model->ayurveda_rooms($details->ayurveda_id);
				
				$date			= date('Y-m-d');
				$offer			= $this->Hotel_detail_model->getOffer($date,$details->id);
					?>
				<div class="col-md-12">
					<?php if($this->session->flashdata('error')): ?>
						<div class="alert alert-danger alert-dismissable">
						<?php
						 $a= $this->session->flashdata('error');
							foreach($a as $b)
							{	echo $b['error'];
							}
								?>
				                    </div><?php endif; ?>
					<div class="row">
						<div class="col-md-12">
							<div class="view_hotel_name">
								
								<div class="container-fluid">
									<div class="col-md-9  col-sm-9 col-xs-9 no_padding_l">
										<h1 class="view_hotel_name_cus  pull-left">
											<?php echo $details->ayurveda_title; ?>
										</h1>
										<?php if(!empty($details->days)){?>
										<p class="day-bold pull-left day-fon">[ <?php echo $details->days; ?> Night(s) Package]</p> <?php } ?>
										<p class="clr-both">(<?php echo $details->title; ?>)
										<span class="star-rating">
											<?php for($i=1;$i<=$details->star_rating;$i++) { ?>
											<span class="fa fa-star gold" data-rating="<?php echo $i; ?>"></span><?php } ?>
											
											<?php for($i=0;$i<(5-$details->star_rating);$i++) { ?>
											<span class="fa fa-star-o"></span><?php } ?>
										</span></p>
										<p class="top_pad_pl"><?php echo $details->place.', '. $state->district.','.$state->state;?> </p>
									</div> 
									<div class="col-md-3 col-sm-3 col-xs-3 no_padding_l no_padding_r">
									
									<?php
											if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
											{
											 $checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
											 $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
											}
											if(!empty($checkin) && !empty($checkout))
											{
											$check_in_time=strtotime($checkin); 
											 $in_month=date("M",$check_in_time);
											 $in_day=date("D",$check_in_time);
											 $in_date=date("d",$check_in_time);
											 
											 $check_out_time=strtotime($checkout);
											 $out_month=date("M",$check_out_time);
											 $out_day=date("D",$check_out_time);
											 $out_date=date("d",$check_out_time);
											 
											
											
											if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
							{?>
										<!--<span class="gen_info">--><?php //echo $in_day.",&nbsp;". $in_date."&nbsp;". $in_month;?>  - <?php //echo $out_day.",&nbsp;". $out_date."&nbsp;". $out_month;?> <!-- </span>-->
							<?php } ?>
										
										<!--<span class="gen_info">-->
										<?php // echo ($this->session->userdata['datahere']['mem_type']);?>  
											<?php //echo array_sum($this->session->userdata['datahere']['adults']);?>  
											<?php //echo array_sum($this->session->userdata['datahere']['childrens']);?> 
											<!--</span>-->
										
											<?php
									
									$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='),$this->uri->segment(3));
									 $hotelid=$this->encrypt->decode($dec_hotel);
										  //$hotelid=$this->uri->segment(3);
										
										  foreach ($room_detail as $room) {
										  $room_setting_detail	= $this->Room_detail_model->ayur_settingsByRoom($room->roomid, $pack_id	);
										  }										
										 if(!empty($this->session->userdata['roomprice'.$pack_id]['total']))
										 {		?>
											<span class="price" style="margin-top:0px;"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
													<?php
													if(!empty($room_setting_detail)) {
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo round($this->session->userdata['roomprice'.$pack_id]['total']);
										} else if(!$this->session->userdata('currency')){
										echo round($this->session->userdata['roomprice'.$pack_id]['total']);
										} else {
										echo convertCurrency(round($this->session->userdata['roomprice'.$pack_id]['total']), $this->session->userdata('default'), $this->session->userdata('currency'));
										}
										}
										?> </span>
										 <a href="#section3" class="btn btn-primary btn-sm pull-right select_padding select-but font-butt"> SELECT ROOM </a>
							<!---<button type="submit" name="search_chekout" class="btn btn-primary btn-sm pull-right select_padding" >Book Now</button> 	-->
							<?php 
											$hotel['hotelsid']= $details->id;
											$this->session->set_userdata('hotelid',$hotel);
										 }
										 else
										 {?>
									 <a href="#section3" class="btn btn-primary btn-sm pull-right select_padding select-but font-butt"> SELECT ROOM </a>
									  <?php }
									  
										?>
										
										<!-- <a href="<?php echo base_url();?>checkout" class="btn btn-primary btn-sm pull-right select_padding"> BOOK NOW</a>-->
										 
										 <?php
										 }
										else
										{
											?>
											<a href="#section3" class="btn btn-primary btn-sm pull-right select_padding select-but font-butt"> SELECT ROOM </a>
											<?php
										}
										?>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="row">

				<div class="container-fluid">	

				
				<form class="coontainer-fluid search_block" method="get" role="form" action="<?php echo base_url().$sub_cat; ?>/detail-search">
							<input type="hidden" name="category" id="categorys" value="<?php echo $details->category; ?>" />
							<input type="hidden" name="ayur_id" id="ayur_id" value="<?php echo $pack_id; ?>" />
							
					<div class="modSearchOuter">
						<div class="search_details" style="border-left: 3px solid #aaaaaa; ">
						<div class="col-sm-4 col-xs-4 col-md-5 no_padding_r" style="padding:0;">
							<div class="form-group">
										<div class="input-group  detailDate">
											<span id="sandbox-container"><input type="text" name="check_in" id="valid_from" 
											value="<?php echo date_format(date_create_from_format('Y-m-d',$checkin), 'd-m-Y');?>" class="form-control" placeholder=" Check In"></span>
							    	  		<div class="input-group-addon border_cus_right_search">
											<i class="fa fa-calendar"></i>
											</div>
										</div> 
								</div>
								<div class="date_alert" style="display : none;float: left;width: 100%;color: #F00;font-size: 14px;margin-top: -13px;margin-left: 2px;margin-bottom: 8px;">Please Enter a valid date</div>
							
							<input id="detail_package" class="form-control clsDatePicker hasDatepicker"  name="hidden_search" type="hidden" style="background-color:#FFFFFF;cursor: pointer; cursor: hand;" value="<?php if(!empty($this->session->userdata['datahere']['hidden_search'])){ echo $this->session->userdata['datahere']['hidden_search']; } ?> ">
						<?php if($details->category=='6'){?>
						
						<input type="hidden" name="packag" id="destination" value="<?php if(!empty($this->session->userdata['datahere']['package'])){ echo $this->session->userdata['datahere']['package']; } ?>"  />
						<?php } if($details->category=='7') {?>
						<input type="hidden" name="pack_destination" id="destination" value="<?php if(!empty($this->session->userdata['datahere']['pack_destination'])){ echo $this->session->userdata['datahere']['pack_destination']; } ?>"  />
						
						<?php }?>
						</div>
					
						<div class="col-sm-4 col-xs-4 col-md-5 no_padding_l no_padding_r right_border">
							<div class="form-group">
										<div class="input-group detailDate">
											<span id="sandbox-container4"><input type="text" name="check_out" 
											id="valid_to" value="<?php echo date_format(date_create_from_format('Y-m-d',$checkout), 'd-m-Y');?>" class="form-control" placeholder=" Check Out"></span>
							    	  		<div class="input-group-addon border_cus_right_search">
											<i class="fa fa-calendar"></i>
											</div>
										</div> 
								</div>
						</div>
						
					
						
						<!--<div class="col-sm-1 col-xs-1 col-md-1 no_padding_r" data-toggle="tooltip" data-placement="right" title="Number of childrens">
							<span class="icon"><i class="fa fa-child"></i></span> <span class="data"> : </span>
						</div>-->
						
						
						<div class="col-sm-2 col-xs-4 col-md-2 no_padding_r pull-right" id="modify-search11">
						<input type="submit" class="modify-btn"  name="search" class="btn btn-primary sidebar_sub" id="ayur_detail_search_button" <?php //if(empty($this->session->userdata['datahere']['hidden_search'])){?><?php //} ?> value="Search" /> 
							<!--<a class="modify-btn" id="modify-btn11">SEARCH</a>-->
						</div>
						
					</div>
					
					</div>
					</form>



				
						<div class="col-md-12 scrollspy ">
							
							
							<nav class="navbar" id="sticky_navbar">
							  <div class="container-fluid" id="sticky_navbar_inner">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
							      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
							      
							    </div>
							
							    <!-- Collect the nav links, forms, and other content for toggling -->
							    <div class="collapse navbar-collapse hotelDetailTab" id="bs-example-navbar-collapse-1">
							      <ul class="nav navbar-nav">
							        <li class="active"><a href="#section1">Package Images</a></li>
							        <li><a href="#section2">Package Details</a></li>
							        <li><a href="#section3">Itinerary </a></li>
							       <!--- <li><a href="#section4">Hotel Info</a></li>-->
							    
							        <li><a href="#section5">Select Rooms</a></li>
							      </ul>
							    </div><!-- /.navbar-collapse -->
							  </div><!-- /.container-fluid -->
							</nav>
							
							
							
							<!-- Image slide show >> -->
							<div class="view_main_wrapper popup-gallery">
								<?php if(!empty($offer)) {?>
								<div class="special_offers_cus_block"><p class="special_offers_cus">SAVE up to <span class="offer-highlight-title_cus"><?php echo $offer->offer; ?></span> TODAY </p></div><?php } ?>
								<section id="section1">
								
									<div id="sync1" class="owl-carousel">
										
										
										<?php //foreach ($image as $slider) { ?>
										
									  <div class="item">
									  	<h3>
									  		<a href="<?php echo base_url();?><?php echo $details->image; ?>">
									  			<img src="<?php echo base_url();?><?php echo $details->thumb_image; ?>" />
									  		</a>
									  	</h3>
									  </div>
									  
									  <?php //} ?>
									
									</div>
									
									
									<!-- Thumbs >> -->
									<!-- <div id="sync2" class="owl-carousel">
										
										<?php foreach ($image as $slider) { ?>
										
									  <div class="item" style="background: url(../../<?php echo $slider->thumb; ?>) no-repeat center center; background-size: cover;">
									  	
									  </div><?php } ?>
									  <!-- <div class="item" style="background: url(img/hotel_room.jpg) no-repeat center center; background-size: cover;">
									  	
									  </div> 
									  
									  
									</div> -->
									
								
								</section>
								
								
								
								
								
									

							</div>
							<!-- Image slide show << -->
							
							
							<section class="each_section" id="section2">
									
									<h3 class="each_section_cus hotelDetailheading">
										Package Details
									</h3>
									
									<div class="container-fluid no_padding_l no_padding_r" >
										<div class="col-md-8 no_padding_l no_padding_r">
											<p>
											<?php echo $details->description; ?>
											</p>
										</div>
										<div class="col-md-4 no_padding_r">
											<div class="overview_list">
												<ul>
													<!-- <li>
														<span class="icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free Internet">
															<i class="fa fa-thumbs-up"></i>
														</span>
														Rating
														<span>
															4.5/5
														</span>
													</li> -->
												<!--	<li>
														<span class="icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free Internet">
															<i class="fa fa-commenting"></i>
														</span>
														
														Reviews
														<span>
															<?php echo $all_count; ?>
														</span>
													</li>-->
													
													<?php if(!empty($facilities->free_wifi)) { ?>
													
													<li>
														<span class="icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free Internet">
															<i class="fa fa-wifi"></i>
														</span>
														Internet
														<span class="info label label-warning">Free</span>
													</li>
													
													<?php } if(!empty($facilities->free_parking)) { ?>
													
													<li>
														<span class="icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free Parking">
															<i class="fa fa-cab"></i>
														</span>
														Parking
														<span class="info label label-warning">Free</span>
													</li>
													
													<?php } ?>
													
													<?php  if(!empty($facilities->restaurant)) { ?>
													<li>
														<span class="icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant">
															<i class="fa fa-cutlery"></i>
														</span>
														Restaurant
													</li>
													<?php } ?>
													
												</ul>
											</div>
										</div>
									</div>
									
											
							</section>


		
							
							<!-- Room 2 << -->
							
							
							
							<?php
							if(empty($this->session->userdata['datahere']['check_in']) && empty($this->session->userdata['datahere']['check_out'] ))
							{
								$checkin =date('Y-m-d');
								$checkout = date('Y-m-d', strtotime(' +1 day'));
							}
							else
							{
								
								$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
								$checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
								
							}
							
						
							?>
							
							


							<div class="each_section cus_itinery_cus" id="section3">
								<h3 class=" hotelDetailheading1">
									Itinerary
								</h3>

							<div class="container-fluid no_padding_l no_padding_r">
									
											<?php foreach ($itinerary as $itiner) { ?>
												
									<div class="hotel_info_row row no_margin_l no_margin_r">
										<div class="col-md-3">
											<span class="name">Day <?php echo $itiner->day;?>: <span class="day_title_cus"> <?php echo $itiner->title;?></span></span>
										</div>
										<div class="col-md-9"><?php echo $itiner->description;?></div>
									</div>
											<?php } ?>
											
											
												
																		
								
										
								</div>
									
				

								
							</div>
							

							
							
				<section id="section5" class=" each_section">
<div class="remv_all_p hotelDetailheadingOuter">

							<div id="" class="col-md-10 remv_p_div">
								<h3 class="each_section_cus">
									Select Rooms
								</h3>
								<div class="container-fluid no_padding_l no_padding_r">
									
									
									
								</div>
							</div>
							
						<div id="" class="col-md-2 col_p_remv">
								<h3 class="each_section_cus">
									Reservation
								</h3>
								
								<div class="container-fluid no_padding_l no_padding_r g_clr">
									
									
									
								</div>
							</div>

							
							
							
							
							
							
							
<div id="" class="col-md-10 remv_p_div">
							<!-- Room 1 >> -->
								
<?php 
							
							$a=0;
							
							//print_r(count($room_detail));
							foreach ($room_detail as $room) {
									
								$img_room = $this->Room_detail_model->imagesById($room->roomid);
								
								$fac_room = $this->Room_detail_model->facilitiesById($room->roomid); $i=0; $j=0;

								$room_setting_detail	= $this->Room_detail_model->ayur_settingsByRoom($room->roomid, $pack_id	);		
								//print_r(count($room_setting_detail));
								?>
																
								
							<div class="search_result_cus_blk_sltd_books">
								


<div class="col-md-12  table_rooms_list">
	
	

	
	<div class="img_block1_selected_room_list">
		<div class="img_block_seltd_room ">
		<div class="img_cus_sr col-md-3">
		<h3 class="srm_title hotelName"><?php echo $room->room_title; ?></h3>
		          <div id="" class="owl-carousel hotelingslider">

				  
				  <?php 
								  	
					if(empty($img_room))
					{?>
				
					 <div class="item ">
					  <img src="<?php echo base_url();?>room/no_image.jpg" alt="Booking Wings">
					 
					</div>
							
					<?php }
											  	
					foreach ($img_room as $img) {
					?>
										  	
											 <div class="item ">
                  <img src="<?php echo base_url().$img->thumb; ?>" alt="Booking Wings">
                 
                </div>
				
					
					<?php $j++;} ?>
   
               
        
              </div>
			</div>
			<div class="img_cus_sr col-md-9">
				
				<!-- <ul class="slrm_availblty_li">
					<li>Breakfast Included</li>
					<li>Breakfast Included</li>
					
					</ul> -->
					
								<div class="cntnt_block_seltd_room ">
					
			<?php
if(!empty($room_setting_detail))
		{
		?>			
						
		<div id="page-wrap">
		
		
		<?php if(!empty($room_setting_detail))
			{ if(!empty($room_setting_detail[0]->conditions)) {?>
				<p class="cal_tooltip cal_tooltipcusr btncusscan roomCancelpol"  style="margin-right:25px !important;" data-toggle="modal" data-target="#myModal_cancel<?php echo $room_setting_detail[0]->id ?>"><i class="fa fa-ban" aria-hidden="true"></i> Cancellation Policy</p>	
			<?php } ?>
				<!-- Modal -->
			<div id="myModal_cancel<?php echo $room_setting_detail[0]->id ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog" style="margin-top: 132px;">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header bg-mod" style="border:none;">
					<button type="button" class="close bg-close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cancellation Policy</h4>
				  </div>
				  <div class="modal-body">
					<p><?php echo $room_setting_detail[0]->conditions; ?></p>
				  </div>
				  <div class="modal-footer" style="border:none;">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>	
      		<?php } ?>
		 
		 <?php 
			//for services
			if(!empty($room_setting_detail))
			{  if(!empty($room_setting_detail[0]->services)) { ?>
				<p class="cal_tooltip cal_tooltipcusr btncusscan" style="cursor: pointer;color: #107d2f;float: right;margin-right: 12px !important;" data-toggle="modal" data-target="#myModal<?php echo $room_setting_detail[0]->id ?>"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Services Offered</p>
			<?php }?>
		<!-- Modal -->
			<div id="myModal<?php echo $room_setting_detail[0]->id ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog" style="margin-top: 132px;">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header bg-mod" style="border:none;">
					<button type="button" class="close bg-close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Services Offered</h4>
				  </div>
				  <div class="modal-body">
					<p><?php echo $room_setting_detail[0]->services; ?></p>
				  </div>
				  <div class="modal-footer" style="border:none;">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>				
      		<?php } ?>
			
		 
		 
		 <div class="s_show_morecus roomMoredet" data-toggle="modal" data-target="#myModal_room<?php echo $room_setting_detail[0]->id ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Room Detail</div>
		 
		 
		 
		   <!-- Modal -->
			<div id="myModal_room<?php echo $room_setting_detail[0]->id ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog" style="margin-top: 132px;">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header bg-mod" style="border:none;">
					<button type="button" class="close bg-close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Room Detail</h4>
				  </div>
				  <div class="modal-body">

				   <div class="col-md-12">
				   
				   <?php if(!empty($img_room[0] -> image_url)){?>					
					<img src="<?php echo base_url().$img_room[0] -> image_url;?>" style="    width:100%;
    height:250px;"/> <?php } else { ?> 
	<img src="<?php echo base_url();?>room/no_image.jpg" style="    width:100%;
    height:250px;"/>
	<?Php } ?>
						
					</div>
					
					<div class="col-md-7 roomDetailOuter">
					<?php if(!empty($room -> room_title)) { ?>
					  <div class="col-md-12 roomTypeouter">
						  <div class="col-md-5 roomTypecolor">
							Room Type
						  </div>
						  <div class="col-md-7 roomConColor">
							<?php echo $room -> room_title ?>
						  </div>
					 </div> <?php } if(!empty($room -> room_size)) { ?>
					 <div class="col-md-12 roomTypeouter">
						  <div class="col-md-5 roomTypecolor">
							Room size
						  </div>
						  <div class="col-md-7 roomConColor">
							<?php echo $room -> room_size ?>
						  </div>
					 </div>
					 <?php } 
					 if(!empty($room -> room_beds)) { ?>
					 <div class="col-md-12 roomTypeouter">
						  <div class="col-md-5 roomTypecolor">
							 No. of Bed(s)
						  </div>
						  <div class="col-md-7 roomConColor">
							<?php echo $room -> room_beds ?>
						  </div>
					 </div>
					 <?php } 
					 if(!empty($room -> room_bed_size)) { ?>
					 <div class="col-md-12 roomTypeouter">
						  <div class="col-md-5 roomTypecolor">
							Bed Size(s)
						  </div>
						  <div class="col-md-7 roomConColor">
							<?php echo $room -> room_bed_size ?>
						  </div>
					 </div>
					 <?php } ?>
					
					</div>
					<?php if(!empty($room -> room_des)) { ?>
				  <div class="facilitiesOuter">
						<h4>Description</h4>
						<div class="col-md-12 fontRoomDesc"><?php echo $room -> room_des ?></div>
					</div>
					<?php } ?>
				  
							<div class="facilitiesOuter">	
								<h4>Available Room Facilities</h4>
							
								<?php if(!empty($fac_room->city_view)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci "><i class="fa fa-check"></i> City View</span>
									</div>
									
									<?php } if(!empty($fac_room->free_wifi)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Free WiFi</span>
									</div>
									
									<?php } if(!empty($fac_room->telephone)) {?>
								
									<div class="col-md-4 col-xs-6 ">
										<span class="room_faci"><i class="fa fa-check"></i> Telephone</span>
									</div>
									
									<?php } if(!empty($fac_room->satellite_channels)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Satellite Channels</span>
									</div>
									
									<?php } if(!empty($fac_room->flat_screen_tv)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Flat Screen TV</span>
									</div>
									
									<?php } if(!empty($fac_room->safety_deposit_box)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Safety Deposit Box</span>
									</div>
									
									<?php } if(!empty($fac_room->air_conditioning)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Air-conditioned</span>
									</div>
									
									<?php } if(!empty($fac_room->iron)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Iron</span>
									</div>
									
									<?php } if(!empty($fac_room->desk)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Desk</span>
									</div>
									
									<?php } if(!empty($fac_room->iron_facilities)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Iron facilities</span>
									</div>
									
									<?php } if(!empty($fac_room->heating)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Heating</span>
									</div>
									
									<?php } if(!empty($fac_room->carpeted)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Carpeted</span>
									</div>
									
									<?php } if(!empty($fac_room->interconnected_rooms)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Interconnected rooms</span>
									</div>
									
									<?php } if(!empty($fac_room->private_entrance)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Private Entrance</span>
									</div>
									
									<?php } if(!empty($fac_room->sofa)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Sofa</span>
									</div>
									
									<?php } if(!empty($fac_room->soundproofing)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Soundproof</span>
									</div>
									
									<?php } if(!empty($fac_room->wardrobe_closet)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Wardrobe / Closet  </span>
									</div>
									
									<?php } if(!empty($fac_room->hypoallergenic)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Hypoallergenic</span>
									</div>
									
									<?php } if(!empty($fac_room->shower)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Shower</span>
									</div>
									
									<?php } if(!empty($fac_room->hairdryer)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Hairdryer</span>
									</div>
									
									<?php } if(!empty($fac_room->free_toiletries)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Free toiletries</span>
									</div>
									
									<?php } if(!empty($fac_room->toilet)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Toilet</span>
									</div>
									
									<?php } if(!empty($fac_room->bathroom)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Bathroom</span>
									</div>
									
									<?php } if(!empty($fac_room->minibar)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Minibar</span>
									</div>
									
									<?php } if(!empty($fac_room->electric_kettle)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Electric Kettle</span>
									</div>
									
									<?php } if(!empty($fac_room->wakeup_service)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Wake-up Service</span>
									</div>
									
									<?php } if(!empty($fac_room->towels)) {?>
								
									<div class="col-md-4 col-xs-6">
										<span class="room_faci"><i class="fa fa-check"></i> Towels</span>
									</div>
									
									<?php } ?>		
							
							</div>
				  
					
				  </div>
					<div class="modal-footer" style="border:none;">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div> 
		        </div>
			 </div>
			</div>
		 
		 
		 
		 
		 
		
		
<table class="sltd_rooms_details_lis" style="width:100%">
		<thead>
		<tr>
			
			<th>Allowed</th>
			<th><?php
								if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
								{
									if($checkin == $checkout)
									{
										$checkin =  date('Y-m-d');
										$checkout = date('Y-m-d', strtotime(' +1 day')); 
									}
									 $days = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
									 
									 echo "Price for " .$days. " nights";
										
								}
								else
								{
									$days='1';
									echo "Todays Price";
								}
									
									?></th>
			<th>Package </th>
			<th>Rooms Availability</th>
			<th>Nr. Rooms </th>
			
		</tr>
		</thead>
		<tbody>
		
		<?php 
		if(!empty($room_setting_detail))
		{
			foreach($room_setting_detail as $room_setting_details)
			{
				//echo $room_setting_details->price;
				?>
		
		<tr>
			
			<td>
			<?php echo $room_setting_details->normal_allowed_adults;?> <i class="fa fa-male "></i> 
			<?php
			
			if(!empty($room_setting_details->normal_allowed_kids))
			{?>
				+ <?php echo $room_setting_details->normal_allowed_kids;?><span data-tooltip="Free upto <?php echo $room_setting_details->child_free_limit;?> year old childrens"  > <i class="fa fa-child"></i></span>
			<?php }
			?>
			
			</td>
			<td><div class="book_now_rooms  book_now">
			<h2><!-- icon according to currency -->
												

<?php 
										
										if(!empty($room_setting_details))
										{
										$room_price =  $room_setting_details->price;
										$offer_percentage= $this->Room_detail_model->hotelofferById($details->id);
										$agency_rate=$this->Room_detail_model->hotelAgencyById($details->id);
										$agency_commission=$this->Room_detail_model->hotelAgencyCommissionById($details->id);
																				
										$room_amounts = $room_price;
										//print_r($agency_rate);
										 ////////offer price calculation/////////////
										 
										 if(!empty($offer_percentage))
										 {
											 $offer_percentage[0]->offer;
										 	 $room_amounts = $room_amounts - (($room_amounts* $offer_percentage[0]->offer)/100);
										 }	
										 
										/////////agency price calculation ////////
													
										 if(!empty($agency_rate))
										 {
											
										 	$tariff =  $agency_rate[0]->package_tariff; 
											$last_string =  substr($tariff,-1);
											if($last_string=='%')
											{
												 $room_amounts = $room_amounts - ($room_amounts*$tariff)/100;
											}
											else
											{
												$room_amounts = $room_amounts -  $tariff;
											}
											
										 } 
										
										////////commision calculation///////
										if(!empty($agency_commission))
										{
										////  comm. percentage  ////
										//echo $room_amounts; exit;
										$last_string =  substr($agency_commission[0]->package_commision,-1);
										if($last_string=='%') {
										$room_amounts = $room_amounts + ($room_amounts * $agency_commission[0]->package_commision/100);
										} else {
										$room_amounts = $room_amounts+ $agency_commission[0]->package_commision; }
										}
											?>												
										<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>" data-rating="1"></span> 
										
										
										 
										<?php 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
											//echo $room->room_price;
										}
										
										else if(!$this->session->userdata('currency')){
											//echo $room->room_price;
										}
										
										else {
											//echo $this->Hotel_detail_model-> convertCurrency($room->room_price, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?>
												
											
											
											
										<span id="room_price_<?php echo $room_setting_details->id;?>"><?php 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo (round($room_amounts))*$days;
										} else if(!$this->session->userdata('currency')){
										echo (round($room_amounts))*$days;
										} else {
										echo convertCurrency((round($room_amounts))*$days, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?></span><br>
										
										<span class="room_rate">( per room )</span>
											<?php
									
									}?>									
										
										</h2>
										</div></td>
			<td><ul class="facilities_f " >
				
				<?php echo $room_detail[0]->title; ?>
				
				
				</ul>
			</td>
			<td>
			<div class="room_availability_block">
											
										<?php
											if(empty($room_setting_details))
											{
												$room_count=0;
											?>
										<span class="info label label-danger">Room Not Available</span>
											<?php
											}
											else
											{
													
								      			$room_count=$this->Room_detail_model->rooms_count($details->id,$room->roomid);
												
												//print_r($room_count);
												if(!empty($room_count))
												{
												?>
												<span class="info label label-danger">Rooms Available</span>
												
											<?php 
												}
												else
												{
													?>
													<span class="info label label-danger">Rooms Not Available</span>
													<?php
												}
											}?>		
											
											
											
											
			
			</div>
			</td>
			<td><div class="book_now_rooms  book_now">
									
									
									
									
										<select name="no_of_rooms[]" id="no_of_rooms_<?php echo $room_setting_details->id;?>" onchange="room_amount('<?php echo $room_setting_details->id;?>');" class="no_of_rooms">
											
											<?php
											for($i=0;$i<=$room_count;$i++)
											{?>
												<option><?php echo $i;?></option>
											<?php	
											}
											?>
											
											</select>
											
											<!--hidden field-->
									<input type="hidden" name="room_basic_price[]" id="" value="<?php echo (round($room_amounts));?>" class="room_basic_price"/>
									<input type="hidden" name="each_room_price" id="each_room_price_<?php echo $room_setting_details->id;?>" class="each_rm_price"/>
									<input type="hidden" name="num_rooms" id="num_rooms_<?php echo $room_setting_details->id;?>" class="no_rms"/>
									<input type="hidden" name="room_id[]" id="room_id_<?php echo $room_setting_details->id;?>" value="<?php echo $room_setting_details->id;?>"  class="room_id"/>
									<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $details->id;?>"  />
									
									
									<input type="hidden" name="room_type_id[]" id="room_type_id_<?php echo $room_setting_details->id;?>" value="<?php echo $room->roomid;?>"  class="room_type_id<?php echo $room->roomid;?>"/>
									
									
									
								</div></td>
			
		</tr>
		<?php
		}
		}
		?>

		</tbody>
	</table>

	</div>
		<?php }?>
			 

			



		
			</div>
					
					
				<p><?php //echo $room->room_size; ?></p>
				
			
			
			
      		<?php if(empty($room_setting_detail))
			{?>
		<div class="RoomNotAvailTop">
					
				<span class="info label label-danger">Room Not Available For Search date</span>
					 

			



		
			</div>
		
			<?php
			}?>
			</div>
			</div>

			
	</div>

</div>

							</div>
					
														<!-- Room 1 << -->
							<?php $a++; } ?>
							
							</div>
								<form action="<?php echo base_url();?>checkout" method="get"/>
							<?php
							
							$enc_id=$this->encrypt->encode($details->id);
						$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id);
						
						?>
							<input type="hidden" name="check_in" value="<?php echo $checkin;?>" id="check_in"/>
							<input type="hidden" name="hotel" id="" value="<?php echo $enc_id;?>"  />
							<div id="checkout_data"></div>
							<input type="hidden" name="check_out" value="<?php echo $checkout;?>" id="check_out"/>
							
							
							<div class="search_result_cus_block7_right col-md-2" id="but_scroll">
							<input type="hidden" id="" value="<?php echo $pack_id;?>" name="s_id">
								<input type="hidden" id="category" value="package" name="source">
									<div id="" class="col-md-12 room_right_right_cus btn_cus_reservation">
									<div class="sp_out">
									<span id="selected_rooms"></span><span id="room_text"></span><br/>
									<span id="total">									</span>
									</div>
										<button data-title="Continue to next step" type="submit" class="" id="room_checkout" name="booking" disabled=""  >
												<span class="b-button__text">
												BOOK NOW
												</span>
										</button>
								<p class="notes_nor">
									 
								</p>
							
							</div>
						<input type="hidden" value="" id="total_amount" name="total_amount" disabled="">
							
							
		</div>
		
		</form>
</div>
	
	
		</section>			
							
							
				
							</div>
				
</div>

							
							
			
							
							<br>
							
						
						
					</div>
					
					
					
					
					
					
				</div>
				

		  </div> <?php } ?>
			
			
		</div>
				


       </div>
       <!-- /#page-wrapper -->
	   <div class="ud-pos-div"></div>
       

<!---footer---->
<?php   $this->load->view('layout/footer');   ?>





 

 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>js/login.js"></script>
       <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
	  	<script>
	var cur = '<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>';
	</script>

<script src="<?php echo base_url();?>js/detail_search.js"></script>
	

	<script>
		$(document).ready(function(){
		    $("[data-toggle=tooltip]").tooltip();
		});
	</script>
	
	<script type="text/javascript">//<![CDATA[
$(window).load(function(){
$(document).ready(function () {
    $(".s_show_morecus").on('click', function () {
        var $ans = $(this).next(".show_all_detailscus");
        $ans.slideToggle();
        $(".show_all_detailscus").not($ans).slideUp();
    });
});
});//]]> 

</script>

	
	<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
		
	<!-- Image slider >> -->
	<script>
		$(document).ready(function() {
 
		  var sync1 = $("#sync1");
		  var sync2 = $("#sync2");
		 
		  sync1.owlCarousel({
		    singleItem : true,
		    slideSpeed : 500,
		    navigation: true,
		    pagination:false,
		    afterAction : syncPosition,
		    responsiveRefreshRate : 200,
		  });
		 
		  sync2.owlCarousel({
		    items : 10,
		    itemsDesktop      : [1199,10],
		    itemsDesktopSmall     : [979,10],
		    itemsTablet       : [768,8],
		    itemsMobile       : [479,4],
		    pagination:false,
		    responsiveRefreshRate : 100,
		    afterInit : function(el){
		      el.find(".owl-item").eq(0).addClass("synced");
		    }
		  });
		 
		  function syncPosition(el){
		    var current = this.currentItem;
		    $("#sync2")
		      .find(".owl-item")
		      .removeClass("synced")
		      .eq(current)
		      .addClass("synced")
		    if($("#sync2").data("owlCarousel") !== undefined){
		      center(current)
		    }
		  }
		 
		  $("#sync2").on("click", ".owl-item", function(e){
		    e.preventDefault();
		    var number = $(this).data("owlItem");
		    sync1.trigger("owl.goTo",number);
		  });
		 
		  function center(number){
		    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		    var num = number;
		    var found = false;
		    for(var i in sync2visible){
		      if(num === sync2visible[i]){
		        var found = true;
		      }
		    }
		 
		    if(found===false){
		      if(num>sync2visible[sync2visible.length-1]){
		        sync2.trigger("owl.goTo", num - sync2visible.length+2)
		      }else{
		        if(num - 1 === -1){
		          num = 0;
		        }
		        sync2.trigger("owl.goTo", num);
		      }
		    } else if(num === sync2visible[sync2visible.length-1]){
		      sync2.trigger("owl.goTo", sync2visible[1])
		    } else if(num === sync2visible[0]){
		      sync2.trigger("owl.goTo", num-1)
		    }
		    
		  }
		 
		});
	</script>
	<!-- Image slider << -->
	
	
	<!-- Magnific Popup core JS file -->
	<script src="<?php echo base_url();?>js/Magnific_Popup.js"></script>
<script>
	
	$(document).ready(function() {
	if($(window).width() <991)
		{
			$(window).scroll(function() {
				 var s = $(window).scrollTop();
				 
				  if(s>780)
				  {
					
					 $(".room_right_right_cus.btn_cus_reservation").css({"position":" fixed","z-index":"100","width":"120px","border-radius":"5px","height":"auto","bottom":"10px","right":"13px","text-align":"center","background":"#d9534f","padding-top":"0px","color":"#fff"});
					 $(".room_right_right_cus.btn_cus_reservation > button").css({"margin-bottom":"6px"});
					
					
				  }
				 else
				 {
					  $(".room_right_right_cus.btn_cus_reservation").css({"position":"absolute","z-index":"0","width":"133px","border-radius":"5px","height":"auto","bottom":"auto","right":"auto","text-align":"center","background":"transparent","padding-top":"auto","color":"auto"});
					 
				 }
	
			});
			
		}
	else
		{
		
			$(window).scroll(function() {
			  
		  //var s = $(window).scrollTop();
		  var scrollTop = $(window).scrollTop(),
        divOffset = $('#but_scroll').offset().top,
        dist = (divOffset - scrollTop);
		//alert(scrollTop);
		  if(scrollTop>=divOffset)
		  {
			
			 $(".room_right_right_cus.btn_cus_reservation").css({"position":" fixed","width":"140px","height":" 50px","top":"110px","bottom":"0px","text-align":"center","background":"transparent","transition":"all .65s ease"});
			
		  }
		 else
		 {
			
			   $(".room_right_right_cus.btn_cus_reservation").css({"position":"absolute","width":"140px","height":"auto","top":"auto","bottom":"auto","text-align":"center","background":"transparent","transition":"all .65s ease"});
			 
		 }	  
		   
		});
		
		}

	});


		
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
					return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
					}
				}
			});
		});
	</script>
		
	
	<script src="<?php echo base_url();?>js/bootstrap-scoll-spy.js"></script>
	
	
	<script>
		$(window).scroll(function() {
		  if ($(document).scrollTop() > 200) {
		  	// $('#top_block').css('display','block');
		    $('#sticky_navbar').addClass('stick_me');
		    $('#sticky_navbar_inner').removeClass('container-fluid');
		    $('#sticky_navbar_inner').addClass('container');
		  } else {
		    $('#sticky_navbar').removeClass('stick_me');
		    $('#sticky_navbar_inner').addClass('container-fluid');
		    $('#sticky_navbar_inner').removeClass('container');
		    // $('#top_block').css('display','none');
		  }
		});
	</script>
	
	
	<script>
		// ------------------------------
		// http://twitter.com/mattsince87
		// ------------------------------
		
		function scrollNav() {
		  $('.nav a').click(function(){  
		    //Animate
		    $('html, body').stop().animate({
		        scrollTop: $( $(this).attr('href') ).offset().top - 60
		    }, 250);
		    return false;
		  });
		  $('.scrollTop a').scrollTop();
		}
		scrollNav();
	</script>
    
	
   
    <script>

    	$(document).ready(function() {
	    	$(".s_show_more").click(function(){
			    	
			    				    	
			    var hide_me = $(this).parent().parent().next();

			    var className = hide_me.attr('class');

			    if(className=="show_all_details")
			    {
			    	hide_me.fadeToggle();
			    }
			    	
			});
    	});
    </script>

   
       <script>

    $(document).ready(function($) {


      $(".hotelingslider").owlCarousel({
  
      		 items : 1,
         itemsDesktop : [1199, 1],
        itemsDesktopSmall : [979, 1],
        itemsTablet : [768, 1],
      
        itemsMobile : [479, 1],
      	
      });
    });

 </script>
    

</body>

</html>


