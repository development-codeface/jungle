<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title><?php echo $details -> title; ?></title>
	
	   <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/custom_search.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">
	   <link href="<?php echo base_url();?>css/bootstrap-datepicker.css" rel="stylesheet">
	  
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
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

<body class="h_sear_b" onload='reset_options()'>

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
	      
	       <a class="" href="#"> <img class="logo_l1" src="<?php echo base_url().$details->logo_img;?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
	      	<div class="pull-right paddngMob">
				<?php
								if(!isset($this->session->userdata['log_username']))
								{?>
				<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
				<?php } else 
				{?><li class="dropdown">
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
				<a id="log_reserve" class="sign_in" href="#"><i class="fa fa-user" aria-hidden="true"></i> My Account <i class="fa fa-angle-down"></i></a></button>
				
				<ul class="dropdown-menu">
	          	
	            	
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $this -> input -> get('hotel'); ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
			  </li>
				<?php } ?>
				
			</div>
	      
				
		<span class="title_toll_free pull-right"><i class="fa fa-phone"></i> <?php if(!empty($details->phone)){ ?> Call Us : <?php echo $details->phone ;?> <?php }?> </span>
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>





<div class="search_img_ni">
<div class="search_img_n">

</div>
<div class="content_search_n">
<div class="container">
<div class="row top-search-nav">
<div class="search_c">
<div class="search_c_c hotel_img_sc">
<!--<img src="<?php echo base_url();?><?php echo $details->logo_img;?>">-->
<!--<div class="pull-right">
<?php
	          	if(!isset($this->session->userdata['log_username']))
				{?>
<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
<?php } else 
{?>
<a id="log_reserve" href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $this->input->get('hotel'); ?>"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
<?php } ?>
</div>-->
</div>
</div>

<?php 	$enc_id=$this->encrypt->encode($details->id);
		$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id);
		

 $name = str_replace(' ', '-', $details->title);


?>
<!--<div class="search_b_c_h">
<h3 class="s_h_t">Search Here..</h3>
<p class="s_h_t_p">Travel Easy, Fast and Safe!... </p>
</div>-->
<div id="search-banner">
<nav role="navigation" class="navbar no_padding_l no_padding_r no_border">
					    
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					        </button>
					    </div>
					    <!-- Collection of nav links and other content for toggling -->
					    <div id="navbarCollapse" class="collapse navbar-collapse navbar no_padding_l no_padding_r no_border search_pack-hotel">
					        <ul class="nav navbar-nav home_search_nav menu_search">
					            <li <?php if($source=='hotel' || $source==''){?> class="active" <?php }?>><a class="hotels" href="<?php echo base_url(); ?>reservation/<?php echo $name;?>?hotel=<?php echo $enc_id;?>&source=hotel">
									<span class="nav_menu_ico ico_hotel"></span> Rooms</a></li>
									
									<?php if(!empty($package)){ ?>
					            <li <?php if($source=='package'){?> class="active" <?php }?>><a class="resort" href="<?php echo base_url(); ?>reservation/<?php echo $name;?>?hotel=<?php echo $enc_id;?>&source=package&package=<?php echo $package[0]->id;?>"><span class="nav_menu_ico ico_resorts"></span> Packages</a></li>
									<?php }?>
								</ul>

					    </div>
					</nav>
<form name="search" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="get" >
<div class="search_b_c_h_b col-md-10  col-xs-12 col-md-offset-1 col-xs-offset-1">
<div class="col-md-12 sear_txct">
<input type="hidden" name="hotel" id="id" value="<?php echo $enc_id;?>" />
<div class="search_f_hr col-md-12 col-xs-12">

<div class="col-md-3 col-xs-5 col-sm-5   fs top-packk" id="sandbox-container"><label>Check In</label>
				                        	<input class="col-lg-8 form-control datepickr_ico" value="<?php if(!empty($check_in)){ echo $check_in; }?>" placeholder="Check-in" name="check_in" id="valid_from">
				                     </div>
<div class="col-md-3 col-xs-5 col-sm-5   fs width-check top-packk" id="sandbox-container4"><label>Check Out</label>
				                        	<input class="col-lg-8 form-control datepickr_ico" value="<?php if(!empty($check_out)){ echo $check_out; }?>" placeholder="Check-out" name="check_out" id="valid_from">
				                       </div>
									   
									   
<div class="col-md-1 fs ts prh room_left top-packk" >
<label>Rooms</label><br>


<select value="" class="form_search" name="mem_type">
										<option value="1" <?php if($mem_type == 1) echo 'selected'; ?>>1</option>
							  			<option value="2" <?php if($mem_type == 2) echo 'selected'; ?>>2</option>
							  			<option value="3" <?php if($mem_type == 3) echo 'selected'; ?>>3</option>
							  			<option value="4" <?php if($mem_type == 4) echo 'selected'; ?>>4</option>
							  			<option value="5" <?php if($mem_type == 5) echo 'selected'; ?>>5</option>
																		
										</select>
						<input type="hidden" id="selected_room_type" value="<?php if(!empty($mem_type)){ echo count($adults); }else{ echo "1"; }?>" autocomplete="off" />
						<input type="hidden" id="search_rooms" value="<?php if(!empty($mem_type)){ echo "1"; } else { echo "0"; }?>" autocomplete="off" />
						
										</div>
										<div class="search_f_hr3 col-md-5 col-sm-12 outrAdu">	



<?php if(empty($mem_type)){?>
	
	<div class="col-md-1 col-xs-2  col-sm-1 fs ts prh rm_count"><label class="room_label led-left">Adults</label></div>
<div class="col-md-3  col-xs-2  col-sm-2 fs ts prh"><label>
Room1</label><br><select value="" class="form_search color-sel" name="adults[]">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>	
																					
										</select></div>
<!---<div class="col-md-4 col-xs-1 fs prh"><label>
Child</label><br><select value="" class="form_search color-sel" name="childrens[]">
										<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
																				
										</select></div>--->
										
										
										



<?php }
if(!empty($mem_type)){ ?>
<div class="col-md-2 col-xs-2  col-sm-2 fs ts prh rm_count"><label class="room_label led-left">Adults</label></div>
<?php } ?>
<div  id="new_rooms" class="changPack">

	<?php $k = 0; for($i=0;$i<$mem_type;$i++) { ?>
	
	<div class="col_r" id="room-<?php echo $i + 1; ?>" style="float:left;">
<label class="room_label">Room <?php echo $i+1; ?></label>

<select class="form_search color-sel" value="" name="adults[]" >
											<option value="1" <?php if($adults[$i] == 1) echo 'selected'; ?>>1</option>
											<option value="2" <?php if($adults[$i] == 2) echo 'selected'; ?>>2</option>
											<option value="3" <?php if($adults[$i] == 3) echo 'selected'; ?>>3</option>
											<option value="4" <?php if($adults[$i] == 4) echo 'selected'; ?>>4</option>	
																					
										</select>
<!--<div class="col-md-4  col-xs-1 fs prh"><label>
Child</label><br><select   class="color-sel" id="childrens-<?php echo $i + 1; ?>" onchange="childs_modify(<?php echo $i + 1; ?>);" name="childrens[]">
								<option value="0" <?php if($childrens[$i] == 0) echo 'selected'; ?>>0</option>
						  			<option value="1" <?php if($childrens[$i] == 1) echo 'selected'; ?>>1</option>
						  			<option value="2" <?php if($childrens[$i] == 2) echo 'selected'; ?>>2</option>
						  			<option value="3" <?php if($childrens[$i] == 3) echo 'selected'; ?>>3</option>
						  		</select></div>--->
</div>





	<input type="hidden"  id="prev-childs-<?php echo $i+1; ?>" value="<?php echo $childrens[$i]; ?>" />
						  		
						  	<?php }  ?>	
</div>


 	<div class="container-fluid clr-both">
						  		
						  		<div class="col-md-9 pull-right right-pad">
									<label for="pwd"><br></label>
									<div class="form-group">
										
								    	<button type="submit" class="btn btn-primary pull-right" id="search_hotels" > SEARCH </button>
								    	
								  	</div>
							  	</div>
						  		
						  	</div>	

</div>
										</div>
						


</form>
</div>

</div>
</div>
  </div>
  </div>
  </div>
  </div>
<div class="content_search_result_h  ">
<div class="container">
<div class="row">
<h3 class="t_search_re_t">Search Result(s)</h3>
	<?php if($this->session->flashdata('error')): ?>
						<div class="alert alert-danger alert-dismissable">
						<?php
						 $a= $this->session->flashdata('error');
							foreach($a as $b)
							{	echo $b['error'];
							}
								?>
				                    </div><?php endif; ?>
<?php
if($no_result!=''){?>
<div class="alert alert-danger text-center">
<?php 	echo $no_result; ?>
</div>
							<?php
							} ?>
<div class="remv_all_p ">


<?php
 if(!empty($check_in) && !empty($check_out))
{
	$checkin = date_format(date_create_from_format('d-m-Y',$check_in), 'Y-m-d');
	$checkout = date_format(date_create_from_format('d-m-Y',$check_out), 'Y-m-d');
	}
	
?>
							<div class="col-md-10 remv_p_div" id="">
								<h1 class="each_section_cus">
									Select Rooms
								</h1>
								<div class="container-fluid no_padding_l no_padding_r">
									
								</div>
							</div>
							
						<div class="col-md-2 col_p_remv reservationtt" id="">
								<h1 class="each_section_cus reservationt">
									Reservation
								</h1>
								
								<div class="container-fluid no_padding_l no_padding_r g_clr">
									
								</div>
							</div>

							<?php 
							/* if($no_result!=''){
								echo $no_result; 
							} */
							//else
							//{
								?>
							
							
<div class="col-md-10 remv_p_div" id="">
							<!-- Room 1 >> -->
								
																
								
								<?php

				
						//if(!empty($details)) {
				$image			= $this->Reservation_model->imagesById($details->id);
				$facilities		= $this->Reservation_model->facilitiesById($details->id);
				$room_detail	= $this->Reservation_model->roomsByHotel($details->id);
				
				$date			= date('Y-m-d');
				$offer			= $this->Reservation_model->getOffer($date,$details->id);
				
																
				foreach ($room_detail as $room) 
				{
					$img_room = $this->Reservation_model->imagesById($room->id);
					$fac_room = $this->Reservation_model->facilitiesById($room->id); $i=0; $j=0; 
					$room_setting_detail	= $this->Reservation_model->settingsByRoom($room->id);
								
								?>
														
							<div class="search_result_cus_blk_sltd_books">

<div class="col-md-12  table_rooms_list">
	<div class="img_block1_selected_room_list">
		<div class="img_block_seltd_room ">
		<div class="img_cus_sr col-md-3 col-sm-6 col-xs-12">
		<h3 class="srm_title"><?php echo $room->room_title; ?></h3>
		<div class="img_cus_sr">
				
					         
						</div>
		
		
				          <div id="" class="owl-carousel hotelingslider">

                    <?php 			  	
					if(empty($img_room))
					{?>
					 <div class="item ">
					  <img src="<?php echo base_url();?>room/no_image.jpg" alt="Booking Wings">
					</div>
					<?php }			  	
					foreach ($img_room as $img) { ?>
										  	
					<div class="item ">
                    <img src="<?php echo base_url().$img->thumb; ?>" alt="Booking Wings">
                   </div>
					<?php $j++;} 
								?>	
        
              </div>
			  <div class="toper-tax">
			  <?php
								if(!empty($room_setting_detail))
										{
										////////// tax calculation ///////////
										  if($room_setting_detail[0]->tax_applicable==0)
										 {
										 	$tax = $this->Reservation_model->tax_amount_off($details->id);
											$t_amount='';
											foreach($tax as $tax_amount)
											{
												 $t_amount+=$tax_amount->tax_amount;
											}
										 }
										 else
										 {
											 $tax = $this->Reservation_model->tax_amount($details->id);
										     $t_amount='';
											 foreach($tax as $tax_amount)
											 {
												$t_amount+=$tax_amount->tax_amount;
											 }
										 } 	
										}
										else
										{
											 $t_amount='';
										}	?>	
      	<?php //echo $room->room_size; ?>
			<!--<p class="exc_tax">Exclusive <?php //echo $t_amount."%"; ?> tax</p>-->
			
			
		</div>
			</div>
			
			<div class="img_cus_sr  col-md-9 col-sm-12 col-xs-12">
			
			
			
			
					<div class="cntnt_block_seltd_room ">
					
					<?php if(empty($room_setting_detail))
			{?>
		<div class="RoomNotAvailTop">
		<span class="info label label-danger">Room Not Available For Search date</span>
		</div>
			
			<?php
			}?>
					
		<?php if(!empty($room_setting_detail))
		{?>
			<div id="page-wrap">
			
			  <div class="s_show_morecus roomDet" data-toggle="modal" data-target="#modalroom<?php echo $room->id ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Room Detail</div>
			  
			  
			  <div id="modalroom<?php echo $room->id ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog" style="margin-top: 132px;">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header bg-mod" style="border:none;">
					<button type="button" class="close bg-close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Room Detail</h4>
				  </div>
				  <div class="modal-body">
					<div class="col-md-12">
						<img src="<?php if($img_room) { echo base_url().$img_room[0] -> image_url; } else { echo base_url().'room/no_image.jpg'; }?>" style="width:100%;
    height:250px;">
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
					 </div>
					 <?php } 
					 if(!empty($room -> room_size)) { ?>
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
							 No of Bed(s)
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
						<div class="col-md-12 fontRoomDesc">
						<?php echo $room -> room_des ?>
						</div>
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
								
									<div class="col-md-4 col-xs-6">
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
			  
			  <?php if(!empty($room_setting_detail[0]->conditions)) { ?>
			  <p class="btncusscan cancel_l1" data-toggle="modal" data-target="#myModal_cancel<?php echo $room->id ?>"><i class="fa fa-ban" aria-hidden="true"></i> Cancellation Policy</p>	
			  <?php } ?>
			  	<!-- Modal -->
			<div id="myModal_cancel<?php echo $room->id ?>" class="modal fade" role="dialog">
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
				
			
						
			
<table class="sltd_rooms_details_lis" style="width:100%" >
		<thead>
		<tr>
			
			<th>Allowed</th>
			<th class="tp_tcus">
			<?php   
			
			
					
								 if(!empty($check_in) && !empty($check_out))
								{
									
									if($checkin == $checkout)
									{
										$checkin =  date('Y-m-d');
										$checkout = date('Y-m-d', strtotime(' +1 day')); 
									}
									// $diff = abs(strtotime($checkout) - strtotime($checkin)); 
									// $years   = floor($diff / (365*60*60*24)); 
									// $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
									// $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
									 
									 $days = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
									 echo "Price for " .$days. " nights";
										
								}
								else
								{
									$days='1';
									echo "Todays Price";
								} 
									
									?>
			
			</th>
			<th>Facilities </th>
			<th>Rooms Availability</th>
			<th>Nr. Rooms</th>
			
		</tr>
		</thead>
		<tbody>
		<?php  
		//print_r($room_setting_detail);
		if(!empty($room_setting_detail))
		{
			foreach($room_setting_detail as $room_setting_details)
			{
				//echo $room_setting_details->price;
				?>
		
		<tr>
			
			<td data-label="Allowed">
			<?php echo $room_setting_details->normal_allowed_adults;?> <i class="fa fa-male "></i> 
			<?php
			
			if(!empty($room_setting_details->normal_allowed_kids))
			{?>
				+ <?php echo $room_setting_details->normal_allowed_kids;?> <span data-tooltip="Free upto <?php echo $room_setting_details->child_free_limit;?> year old childrens"  ><i class="fa fa-child"></i></span>
			<?php }
			
			?>
			
			</td>
			
			
			<td data-label="Todays Price"><div class="book_now_rooms  book_now">
			<h2><!-- icon according to currency -->
										<?php
										
										if(!empty($room_setting_details))
										{
										$room_price =  $room_setting_details->price;
										  $room_amounts = $room_price;
										
										?>						
												
										<span id="room_price_<?php echo $room_setting_details->id;?>"><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
										<?php 
										if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
										echo (round($room_amounts))*$days;
										} else if(!$this->session->userdata('currency')){
										echo (round($room_amounts))*$days;
										} else {
										echo convertCurrency((round($room_amounts))*$days, $this->session->userdata('default'), $this->session->userdata('currency'));
										}?></span>
										
										<span class="room_rate">( per room )</span>
										<?php }?>		
										</h2>
										</div></td>
			<td data-label="Facilities"><ul class="facilities_f ">
				
								<?php if(!empty($fac_room->free_wifi)) {?>
				<li> <span class="room_faci"><i class="fa fa-wifi"></i> Free Wifi</span>  </li>
				 <?php } ?>
					 <?php if(!empty($fac_room->breakfast)) {?>
					<li> <span class="room_faci"><i class="fa fa-cutlery"></i> Breakfast Included</span>  </li>
					 <?php } ?>
				 					 				</ul>
			</td>
			<td data-label="Rooms Availability">
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
													
								      			$room_count=$this->Reservation_model->rooms_count($details->id,$room->id);
												
												
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
			<td data-label="Nr. Rooms"><div class="book_now_rooms  book_now">
									
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
									
									<input type="hidden" name="room_type_id[]" id="room_type_id_<?php echo $room_setting_details->id;?>" value="<?php echo $room->id;?>"  class="room_type_id<?php echo $room->id;?>"/>
									
									
									
									
									
								</div></td>
			
		</tr>
					
		
					
		</tbody>
		<?php
		}
		}
		
		?>

	</table></div>
	<?php
		}?>
			

		
			</div>
	</div>
			
			</div>
		
			
	</div>
	

</div>

</div>	

				<?php }?>
						</div> <?php //} ?>
							<form action="<?php echo base_url();?>reservation_checkout/checkout" method="get"/>
							
							
							
								<input type="hidden" name="check_in" value="<?php if(!empty($check_in)){ echo $checkin; }?>" id="check_in"/>
							<input type="hidden" name="hotel" id="" value="<?php echo $enc_id;?>"  />
							<div id="checkout_data"></div>
								<input type="hidden" name="check_out" value="<?php if(!empty($check_out)){  echo $checkout;}?>" id="check_out"/>
							
			<div class="search_result_cus_block7_right col-md-2" id="but_scroll">
			<input type="hidden" id="" value="" name="s_id">
			<input type="hidden" id="category" value="hotel" name="source">
								
									<div class="col-md-12 room_right_right_cus btn_cus_reservation" id="">
									<div class="sp_out">
									<span id="selected_rooms"></span><span id="room_text"></span><br>
									<span id="total">									</span>
									</div>
									<button disabled="" name="booking" id="room_checkout" class="" type="submit" data-title="Continue to next step">
										<!--<button data-title="Continue to next step" type="button" class="" id="room_checkout" name="room_checkout" disabled=""  onclick="checkout_submit();">-->
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

</div>
</div>
</div>

	<?php   $this->load->view('main/login');   ?>

 <div class="content_search_copyright ">
 <p class="copyright">Copyright © <?php echo date('Y').' '.$details -> title ?>. Powered by <a href="<?php echo base_url(); ?>">Bookingwings.com</a>.</p>
</div> 
  

</body>

<script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>

	<script>
	var cur = '<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>';
	</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/search.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  
    <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>js/login.js"></script>
	<script src="<?php echo base_url();?>js/validation.js"></script>

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
			
			 $(".room_right_right_cus.btn_cus_reservation").css({"position":" fixed","width":"140px","height":" 50px","top":"110px","bottom":"0px","text-align":"center","background":"transparent"});
			
		  }
		 else
		 {
			
			   $(".room_right_right_cus.btn_cus_reservation").css({"position":"absolute","width":"140px","height":"auto","top":"auto","bottom":"auto","text-align":"center","background":"transparent"});
			 
		 }	  
		   
		});
		}

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

       <script>
var baseurl = "<?php echo base_url();?>";
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

</html>

