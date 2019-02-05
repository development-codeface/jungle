 <!DOCTYPE html>
<html lang="en">

<head>
	<!-- <meta http-equiv="refresh" content="5" > -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="author" content="">


    <title><?php echo $meta_title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap-datepicker.css" rel="stylesheet">
    
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">

    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">





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
    
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>
	

</head>

<body class="packegaes_list_block_cus2">
	
	 <div id="select_loader" style="disply:none;">
		<div class="inner">
			<div class="row">
				<img src="<?php echo base_url();?>img/loader.gif">
				
			</div>
			
		</div>
	</div> 
	<!----------header--------->
	<?php   $this->load->view('layout/header');   ?>



 <div id="result-wrapper">
<?php   //$this->load->view('layout/menu');  
	$sub_cat = $this -> uri -> segment(1);
	 if($sub_cat == 'hotels'){ $subcat_name = "hotels";}
	 if($sub_cat == 'resorts'){ $subcat_name = "resorts";}
	 if($sub_cat == 'homestays'){ $subcat_name = "homestays";}
	 if($sub_cat == 'apartments'){ $subcat_name = "apartments";}
	?>

        
    	
		<input type="hidden" id="subcat" value="<?php echo $subcat_name ?>" />
		<div class="container top-navv">	
			
			
			<div class="row">
				
				<div class="col-md-8">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active"><?php echo $sub_cat;?></li>
						<!--<li class="active"></li>-->
					</ol>
				</div>
				
				<div class="col-md-4 modify_btn">
					
					<!-- <a href="#" class="btn btn-default pull-right">MODIFY SEAECH</a> -->
					
				</div>
				
			</div>

			

			
			<div class="row">
				
				<?php $this->load->view('hotel/refine_category');?>
				<div class="top_c_b col-md-9">
				<div class="ty">
				<?php
			
				echo $sub_cat;
						  	//print_r($child_age); exit;
					if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
					{
						$checkin= ($this->session->userdata['datahere']['check_in'] );
						$checkout =$this->session->userdata['datahere']['check_out']; 
				
						$check_in_time=strtotime($checkin); 
						$in_month=date("M",$check_in_time);
						$in_year=date("Y",$check_in_time);
						$in_date=date("d",$check_in_time);
											 
						$check_out_time=strtotime($checkout);
						$out_month=date("M",$check_out_time);
						$out_year=date("Y",$check_out_time);
						$out_date=date("d",$check_out_time);
						
					}
					else
					{
						$date = strtotime(date('Y-m-d'));
						$in_month=date("M",$date);
						$in_year=date("Y",$date);
						$in_date=date("d",$date);
						
						$next_day =  strtotime(date('Y-m-d', strtotime(' +1 day'))); 
						$out_month=date("M",$next_day);
						$out_year=date("Y",$next_day);
						$out_date=date("d",$next_day);
						
					}
					
					$a=0; //exit;
				?>
				</div>
				</div>
				<div class="col-md-9 cl-b">
					
					<div class="search_details" style="border-left: 3px solid #aaaaaa; ">
						<div class="col-sm-2 col-xs-4 col-md-2 no_padding_r" data-toggle="tooltip" data-placement="top" title="Check In">
							<span class="icon"><i class="fa fa-calendar"></i></span> <span class="data"> :
							<?php echo $in_date."&nbsp;" . $in_month ."&nbsp;" . $in_year  ;?> 
							</span>
						</div>
						<div class="col-sm-1 col-xs-1 col-md-1  no_padding_r">
							<span class="arrow"><i class="fa fa-long-arrow-right"></i></span>
						</div>
						
						<div class="col-sm-2 col-xs-4 col-md-2 no_padding_l no_padding_r right_border"  data-toggle="tooltip" data-placement="bottom" title="Check Out">
							<span class="icon"><i class="fa fa-calendar"></i></span> <span class="data"> : 
							<?php echo $out_date."&nbsp;" . $out_month ."&nbsp;" . $out_year  ;?> 
							</span>
						</div>
						
					
						<div class="col-sm-1 col-xs-1 col-md-1 no_padding_r right_border"  data-toggle="tooltip" data-placement="left" title="Rooms">
							<span class="icon"><i class="fa fa-bed"></i></span> <span class="data"> : <?php echo $mem_type; ?></span>
						</div>
						<div class="col-sm-1 col-xs-1 col-md-1 no_padding_r right_border" data-toggle="tooltip" data-placement="top" title="Number of adults">
							<span class="icon"><i class="fa fa-male"></i></span> <span class="data"> : <?php echo array_sum($adults); ?></span>
						</div>
						<!--<div class="col-sm-1 col-xs-1 col-md-1 no_padding_r" data-toggle="tooltip" data-placement="right" title="Number of childrens">
							<span class="icon"><i class="fa fa-child"></i></span> <span class="data"> : <?php echo array_sum($childrens);?></span>
						</div>-->
						
						<div class="col-sm-2 col-xs-4 col-md-2 no_padding_r pull-right" id="modify-search">
							<a  class="modify-btn" id="modify-btn">MODIFY SEARCH</a>
						</div>
						
					</div>
					
										<div class="" id="search_panel"  class="">
						<form role="form" method="get" id="hotels_modify" class="modufy-search_form_cus col-md-12" action="<?php echo base_url().$subcat_name;?>/search_list">
							
								<div class="col-md-12 modufy-search-cus_block1">						
							<!-- Search Input >> -->
							<div class="col-md-6">
							  <div class="form-group">
							  	<div class="input-group">

							    <input type="text" name="hidden-search" value="<?php echo $text_val; ?>" class="form-control" id="hidden_search" placeholder="Enter City name, Area name or Hotel name" onchange="destination_change();">
								   <input type="hidden" name="destination" value="<?php echo $destination; ?>" class="form-control" id="destination" placeholder="Enter City name, Area name or Hotel name">
							    							  		<div class="input-group-addon border_cus_right_search">
												<i class="fa fa-map-marker"></i>
										</div>
							  </div>
							</div></div>
						  	<!-- Search Input << -->
						  		
						  <input type="hidden" name="category" id="sub_catid" value="<?php echo $sub_cat_id;?>"/>
						  	  <input type="hidden" name="res_category" id="res_sub_catid" value="<?php echo $res_sub_cat_id;?>"/>
						  	<?php if(empty($this->session->userdata['datahere']['check_in']) && empty($this->session->userdata['datahere']['check_out'])) { ?>
						  	<div class="col-md-3">
							  <div class="form-group">
							  	<div class="input-group">
							    <span id="sandbox-container"><input type="text" name="check_in" value="<?php echo date('d-m-Y'); ?>" id="valid_from" class="form-control"  placeholder="Check In"></span>
							    	  		<div class="input-group-addon border_cus_right_search">
												<i class="fa fa-calendar"></i>
										</div>
							  </div> </div>
							</div>
						  	
						  	<div class="col-md-3">
							  <div class="form-group">
							  	<div class="input-group">
							    <span id="sandbox-container4"><input type="text"  name="check_out" id="valid_to" value="<?php  $date_to =date('Y-m-d', time()+86400) ; echo date_format(date_create_from_format('Y-m-d',$date_to ), 'd-m-Y'); ?>" class="form-control" placeholder="Check Out"></span>
							    	  		<div class="input-group-addon ">
												<i class="fa fa-calendar"></i>
										</div> </div>
							  </div>
							</div>
							<?php } 
							else
							{
								?>
								<div class="col-md-3">
							  <div class="form-group">
							  	<div class="input-group">
							    <span id="sandbox-container"><input type="text" name="check_in" id="valid_from"  value="<?php echo $this->session->userdata['datahere']['check_in']; ?>" class="form-control"  placeholder="Check In"></span>
							    	  		<div class="input-group-addon border_cus_right_search">
												<i class="fa fa-calendar"></i>
										</div>
							  </div> </div>
							</div>
						  	
						  	<div class="col-md-3">
							  <div class="form-group">
							  	<div class="input-group">
							    <span id="sandbox-container4"><input type="text" name="check_out" id="valid_to" value="<?php echo $this->session->userdata['datahere']['check_out']; ?>" class="form-control"  placeholder="Check Out"></span>
							    	  		<div class="input-group-addon ">
												<i class="fa fa-calendar"></i>
										</div> </div>
							  </div>
							</div>
							<?php
							}?>
							</div>
							<div class="date_alert" style="display : none;float: left;width: 100%;margin-top: 10px;margin-bottom: 8px;margin-left: 7px; color : #f00;">Please Enter a valid checkout date</div>
							<div class="search_alert" style="display : none;float: left;width: 100%;margin-top: 10px;margin-bottom: 8px;margin-left: 7px; color : #f00;">Please Enter search content here</div>
							
						  	<div class="col-md-12 modufy-search-cus_block2 pad_out_det">
							  	<div class="col-md-3 modufy_search_block_cus res7 room_top_det">
							  		<label for="pwd" class="rooms_cus_title rmNamedet">Tents
							  		<select name="mem_type" class="mem_qty" >
							  			<option value="1" <?php if($mem_type == 1) echo 'selected'; ?>>1</option>
							  			<option value="2" <?php if($mem_type == 2) echo 'selected'; ?>>2</option>
							  			<option value="3" <?php if($mem_type == 3) echo 'selected'; ?>>3</option>
							  			<option value="4" <?php if($mem_type == 4) echo 'selected'; ?>>4</option>
							  			<option value="5" <?php if($mem_type == 5) echo 'selected'; ?>>5</option>
							  		</select>
							  	</div>
								
								<div class="col-md-9 col-sm-12 col-xs-12  modufy_search_block_cus prr">
								<label for="pwd" class="rooms_cus_title adultDet">Adult(s)</label>
									
									<div id="new_rooms">
										<?php $k = 0; for($i=0;$i<$mem_type;$i++) { ?>
										<div id="room-<?php echo $i + 1; ?>" >
										<label for="pwd" class="topRmLabel">Room <?php echo $i + 1; ?></label>
										<select name="adults[]" class="topdetMod">
						  			<option value="1" <?php if($adults[$i] == 1) echo 'selected'; ?>>1</option>
						  			<option value="2" <?php if($adults[$i] == 2) echo 'selected'; ?>>2</option>
						  			<option value="3" <?php if($adults[$i] == 3) echo 'selected'; ?>>3</option>
						  			<option value="4" <?php if($adults[$i] == 4) echo 'selected'; ?>>4</option>
						  		</select>
									
										</div>
										<?php }?>
									</div>
									
								
								</div>
								
								
						  	</div>
							
							<input type="hidden" id="selected_room" value="<?php echo $mem_type; ?>" />
							
						
						  	
						  	
						  	
						<div class="col-md-12 modufy-search-cus_block3   ">	
						  	
						  	<div class="col-md-12">
					
							  
							  <div class="form-group">
							    
							    							    
							    <button type="submit" class="btn  pull-right cancel_right_cus"> CANCEL </button>
							    
							    <button type="submit" class="btn btn-warning pull-right" id="search_hotels_modify" > SEARCH </button>
							    
							  </div>
						  	</div>
		
						  </div>		
						  		
						</form>
					</div>

			    <div id="refine">
					<div class="search_result_options">
						<div class="col-md-6 col-sm-6 col-xs-12">
							
							<h1><?php 
																					
							//$this->load->library('session');
							$tot_cnt=count($hotel[1])+count($hotel[2]);
							$this->session->set_userdata('textval',$text_val);
							 if(strpos($text_val, ","))
							{
								$search_expl=explode(",",$text_val);
								echo ucfirst($search_expl[0]); ?><span>, <?php echo ucfirst($search_expl[1]); ?></span> - <?php echo $tot_cnt; ?> Result(s)</h1>
								<?php
							}
							else
							{
								echo ucfirst($text_val) ; ?> - <?php echo $tot_cnt; ?> Result(s)</h1>
								<?php
							}
							?>
							
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 price_bar_low">
							<div class="btn-group pull-right">
	<?php if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'])) { ?>
								<!--<button type="button" class="btn btn-sm">Price</button>
								<button type="button" class="btn btn-default btn-sm">Popularity</button>---> 
								<button type="button" class="btn btn-default btn-sm p-text">
								<?php if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo 'Price : Low - High';
								} else {
								echo 'Price : High - Low';
								} } else { echo 'Price'; } ?></button>
								<!--<button type="button" class="btn btn-default btn-sm">
									<i class="price_sort fa fa-arrow-up" value="high"  onclick="catchStar(this.value)"></i>
								</button>-->
								<button type="button" class="btn btn-default btn-sm" value="<?php 
								if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo 'high';
								} else {
								echo 'low';
								} } else { echo 'low'; } ?>" id="price_sort" onclick="price(this.value)">
								<?php 
								if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo '<i class="fa fa-arrow-down p-icon"></i>';
								} else {
								echo '<i class="fa fa-arrow-up p-icon"></i>';
								} } else { echo '<i class="fa fa-arrow-down p-icon"></i>'; } ?>
								</button>
								<?php } ?>
							</div>
						</div>

						<input type="hidden" id="sort_price" name="sort_price" value="<?php if(!empty($price_sort)) echo $price_sort; ?>" />
						
						<div class="col-md-6 col-sm-6 col-xs-12 price_bar_low_mob">
							<div class="btn-group pull-right">
							<?php if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'])) { ?>
								<!--<button type="button" class="btn btn-sm">Price</button>
								<button type="button" class="btn btn-default btn-sm">Popularity</button>---> 
								<button type="button" class="btn btn-default btn-sm p-text">
								<?php if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo 'Price : Low - High';
								} else {
								echo 'Price : High - Low';
								} } else { echo 'Price'; } ?></button>
								<!--<button type="button" class="btn btn-default btn-sm">
									<i class="price_sort fa fa-arrow-up" value="high"  onclick="catchStar(this.value)"></i>
								</button>-->
								<button type="button" class="btn btn-default btn-sm" value="<?php 
								if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo 'high';
								} else {
								echo 'low';
								} } else { echo 'low'; } ?>
								</button>" id="price_sort" onclick="priceMob(this.value)">
								<?php 
								if(!empty($price_sort)) {
								if($price_sort == 'low') {
								echo '<i class="fa fa-arrow-down p-icon"></i>';
								} else {
								echo '<i class="fa fa-arrow-up p-icon"></i>';
								} } else { echo '<i class="fa fa-arrow-down p-icon"></i>'; } ?>
								</button>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<!-- Results starts here >> -->
					
					<?php 					
				
					//$r=$this->session->userdata('datahere');
					if(empty($hotel[1]) && empty($hotel[2])) { echo 'No results found.'; } else {
						if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
						{
							$room_price_status=0;
						}
						else {
							$room_price_status=1;
						}		
		
$merge_array = array_merge($hotel[1],$hotel[2]);

foreach ($merge_array as $result) {
	$a_result[]=$result;
}

$c_result = $controller -> result_sort($a_result,$text_val);
//echo count($c_result);

        // instantiate the pagination object
        $pagination = new Zebra_Pagination();

        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

        // the number of total records is the number of records in the array
        $pagination->records(count($c_result));

        // records per page
        $records_per_page = 15;
        $pagination->records_per_page($records_per_page);
		
        // here's the magick: we need to display *only* the records for the current page
        $b_result = array_slice(
            $c_result,                                             //  from the original array we extract
            (($pagination->get_page() - 1) * $records_per_page),    //  starting with these records
            $records_per_page                                       //  this many records
        );
		
//foreach ($b_result as $hotel_table):

foreach (array_unique($b_result, SORT_REGULAR) as $hotel_table):
 
$enc_id=$this->encrypt->encode($hotel_table['id']);
	 
$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id);

						
					$persons =array();
					for($i=0;$i<$mem_type;$i++)
					{ 
						//array_push($persons,($adults[$i]+$childrens[$i]));
						array_push($persons,$adults[$i]);
				
					}
					$person_low = (min($persons));
					
					if(!empty($hotel_table['settings_id']))
					{
						if(!empty($check_in) && !empty($check_out))
						{
						$in = date_format(date_create_from_format('d-m-Y',$check_in ), 'Y-m-d');
						$out =date_format(date_create_from_format('d-m-Y',$check_out ), 'Y-m-d');
						
							 $room_price_check=$this->Hotels_model->room_price_lowest($hotel_table['id'],$in,$out,$person_low);
							
							 $new_array=array();
							foreach($room_price_check as $avail_room_price => $low_price)
							{
								$new_array[$avail_room_price]= $low_price->price;
								
							}
							if(!empty($new_array))
							{
							$current_price=(min($new_array));
							}
							else
							{
								$current_price=$hotel_table['price'];
							}
							
						}
						else
						{
							$current_price='';
						}
					
					
						if($tot_room >= 1)
						{
							$tot_room = 1;
							$child_rate=0;
							$adult_rate=0;	
							
							if(!empty($check_in) && !empty($check_out))
							{ 
								$offer_percentage= $this->Hotels_model->hotelofferById($hotel_table['id'],$check_in,$check_out);
								
							}
								$agency_rate=$this->Hotels_model->hotelAgencyById($hotel_table['id']);
								$agency_commission=$this->Hotels_model->hotelAgencyCommissionById($hotel_table['id']);
									
///////////////////Offer Price Calculation///////////////////////////////////////////
							/* if(!empty($offer_percentage[0]->offer))
							{ 
								if($check_in == $offer_percentage[0]->from_date || $check_out == $offer_percentage[0]->to_date)
								{
									$offer_price=$current_price-((($current_price)*$offer_percentage[0]->offer)/100);
									$offer_price=$offer_price*$tot_room;		
								}
								else
								{
									$offer_price=($tot_room*$current_price);
								}
							}
							else
							{
									$offer_price=($tot_room*$current_price);
							} */	
							
							

								if(!empty($offer_percentage[0]->offer))
								{ 
											  $offer_percentage[0]->offer;
										 	 $offer_price = $current_price - (($current_price* $offer_percentage[0]->offer)/100);
								 }	
								else
								{
									 $offer_price = $current_price;
								}	
	///////////////Agency Tariff calculation//////////////////////////////////////////
	
								 $offer_price_inc_tax = $offer_price;
								//if(empty($offer_percentage[0]->offer))	
								//{
									if(!empty($agency_rate[0]->room_tariff))
									{
										
										 $last_string =  substr($agency_rate[0]->room_tariff,-1);
										 if($last_string=='%')
										 {
										 $agency_price=$offer_price_inc_tax-($offer_price_inc_tax*$agency_rate[0]->room_tariff/100);
										 }
										 else
										 {
											 $agency_price=$offer_price_inc_tax-$agency_rate[0]->room_tariff;
										 }
									}
									else
									{
										$agency_price=$offer_price_inc_tax;
									}
								//}
								//else
								//{
									//$agency_price=$offer_price_inc_tax;
								//}
								
									
	//////////////Adding Agency Commission///////////////////////////////////////////
	
								if(!empty($agency_commission[0]->commision))
								{
									////  comm. percentage  ////
									$last_string =  substr($agency_commission[0]->commision,-1);
									if($last_string=='%') { 
									$agency_price=$agency_price+($tot_room*($agency_price*$agency_commission[0]->commision/100));
									} else {
									$agency_price=$agency_price+($tot_room*$agency_commission[0]->commision); }
								}
								else
								{
									$agency_price=$agency_price;
								}
								
								
	///////////////Calcualting the Grand Total////////////////////////////////////////	
							
								  //$room_price=$agency_price+$child_rate+$adult_rate;
								    $room_price=$agency_price+$child_rate+$adult_rate;
						}
					}
					else 
					{
						$hotel_table['room_title']="Contact for Room Price";
						$room_price_status=0;
					}
 
					$state = $this->Hotels_model->location($hotel_table['state']);				
					$facilities = $this->Hotel_detail_model->facilitiesById($hotel_table['id']);
					$img = $this->Hotels_model->img_thumb($hotel_table['id']);
					$all_reviews	= $this -> Hotel_detail_model -> allReviews($hotel_table['id']);
					?>

<div class="search_result  search_result_cus_block col-md-12">
						<?php	if(!empty($img)):?>
						<div class="col-md-3 rno_padding_l no_padding_r result_thumb" style="background: url(<?php echo base_url().$img->thumb; ?>) no-repeat center center; background-size: cover;">
						</div>
						<?php endif; ?>
						<div class="col-md-6 result_details pad_result" id="demo_div">
							<div class="result_details_row col-md-12">
							<?php
						
						if(!empty($this->session->userdata['roomprice'.$hotel_table['id']]['total']))
					{
							?>
							<h1><a href="<?php echo base_url().$sub_cat;?>/detail/<?php echo $enc_id;?>"><?php echo $hotel_table['title']; ?></a></h1>								
					
							
						<?php }
						else
					{
							?>
					<h1><a href="<?php echo base_url().$sub_cat;?>/detail/<?php echo $enc_id; ?>"><?php echo $hotel_table['title']; ?></a></h1>								
						

					
					<?php }?>
							<?php
							$date			= date('Y-m-d');
							$offer			= $this->Hotel_detail_model->getOffer($date,$hotel_table['id']);
							if(!empty($offer)){
							?>
							
								
							
								<div class="special_offers_cus_block"><p class="special_offers_cus"> <span class="offer-highlight-title_cus"> <?php echo $offer->offer; ?></span>  </p></div>
							
							<?php
							}?>
								
								<p><span class="fa fa-map-marker"></span> <?php echo $hotel_table['place'].', '.$state->state; ?></p>
						
								<?php
							$tot=0;
							$total_avail_rooms=0;
							for($x=0;$x<=count($hotel[0])-1;$x++)
							{
								for($y=0;$y<=count($hotel[0][$x])-1;$y++)
								{
									if($hotel[0][$x][$y]->id == $hotel_table['id'])
									{
										$tot+=1;
										$available= $this->Hotels_model->available_rooms_count($hotel_table['id'],$hotel[0][$x][$y]->rooms_id);
										if($available!=0)
										{ $total_avail_rooms+=$available;
											?>
											<!---<p style="color:green;" class="result_select_room_type"><?php echo "Available : ".$available;echo '&nbsp';echo $hotel[0][$x][$y]->room_title; echo strtolower("s");?>	</p>--->
											
											<?php
											} 
										 }
									}
							}
							if($tot==0)
							{
										?>
										<p style="color:red;" class="result_select_room_type"><?php //echo "Currently Not Available";?>	</p>
										<?php
							} 
							
							if($total_avail_rooms==0)
							{
										?>
										<p style="color:red;" class="result_select_room_type"><?php //echo "Currently Not Available";?>	</p>
										<?php
							} 
							else
							{?>
						<p style="color: #e62020;float: right;font-size: 11px;margin-top:5px" class="result_select_room_type"><?php echo "Available : ".$total_avail_rooms;?>	Room(s)</p>
											
								<?php
							}
							
							
						
						?>	
						
						
								<p>		<a class="stars">
								<div class="star-rating"> 
								
								<?php for($i=1;$i<=$hotel_table['star_rating'];$i++) { ?>
					            <span class="fa fa-star gold " data-rating="<?php echo $i; ?>"></span> <?php } ?>
					            <span class="star_<?php echo $i-1;?>"></span>
					            <?php for($i=0;$i<(5-$hotel_table['star_rating']);$i++) { ?>
					            <span class="fa fa-star-o"></span> <?php } ?>
								
								  
								</div>
							</a></p>

						
							
							</div>
							
							
							<div class="result_details_bottom col-md-12 select_room_cus_12">
								<div class="pull-right room_features">
									<?php if(!empty($facilities->restaurant)) { ?>
										
									<span data-toggle="tooltip" data-placement="top" title="Restaurant available">
									<i class="fa fa-cutlery"></i> Restaurant
									</span>
									
									<?php } if(!empty($facilities->free_wifi)) { ?>
										
									<span data-toggle="tooltip" data-placement="top" title="Free Wifi">
									<i class="fa fa-wifi"></i> Free Wifi
									</span>
									
									<?php } if(!empty($facilities->free_parking)) { ?>
										
									<span data-toggle="tooltip" data-placement="top" title="Free Parking">
									<i class="fa fa-car"></i> Free Parking
									</span>
									
									<?php } ?>
								</div>
								<?php
									if(count($all_reviews)<>'0')
									{?>
								<div class="pull-left review_left">
									<a class="reviews" href="#"><?php echo count($all_reviews);?> reviews</a>
								</div>
								<?php
								}else
								{?>
									<div class="pull-left review_left">
									<a class="reviews" href="#">0 reviews</a>
								</div>
								<?php } ?>
							</div>
				<?php 	
				if(!empty($check_in) && !empty($check_out))		
				{
					?>
							<input type="hidden" name="check_in" value="<?php echo $check_in; ?>" />
							<input type="hidden" name="check_out" value="<?php echo $check_out; ?>" />
					<?php
				}

				?>
							<input type="hidden" name="num_rooms" value="<?php echo $mem_type; ?>" />
							<input type="hidden" id="num_adult" name="adults" value="<?php echo array_sum($adults);; ?>" />
							<!--<input type="hidden" name="childs" value="<?php echo array_sum($childrens); ?>" />-->
							
							
						</div>
						<div class="col-md-3 book_now select_room_cus">
							
							<?php if(!empty($check_out) && !empty($check_in))		
								{

									 $days = floor((strtotime($check_out) - strtotime($check_in))/(60*60*24));
									 if($days==0)
									 {
									 	$days=1;
									 }
									 if(!empty($room_price)) {
									?>
									<input type="hidden" name="total_amount" value="<?php echo $room_price*$days; ?>" /> 
								<h2><?php if($room_price!=''){?><span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>" data-rating="1"></span> <?php } 
								if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
								echo (round($room_price))*$days;
								} else if(!$this->session->userdata('currency')){
								echo (round($room_price))*$days;
								} else {
								echo convertCurrency((round($room_price)*$days), $this->session->userdata('default'), $this->session->userdata('currency'));
								}
								?><br><span class="room_rate">( Price For <?php echo $days;?> Night/Room)</span></h2>

					
							
										<?php  
										$amount['total']= (round($room_price))*$days;
										$this->session->set_userdata('roomprice'.$hotel_table['id'],$amount);}else { echo '<h4>Contact For Room Price</h4>'; }
									} 
										?>
							<div >
								<br>
								</div>

						<?php
						if(!empty($this->session->userdata['roomprice'.$hotel_table['id']]['total']))
						{ // echo $hotel_table['title'];
					
							 $reserve_name=(str_replace(" ","-",$hotel_table['title']));
							?>
							
							<!--- <a href="<?php echo base_url();?>reservation/<?php echo $reserve_name;?>?hotel=<?php echo $enc_id;?>" class="btn btn-primary"> Book Now </a> -->
							<a href="<?php echo base_url().$sub_cat;?>/detail/<?php echo $enc_id;?>" class="btn btn-primary  select-but"> SELECT TENTS </a> 
						
						<?php }
						else
						{ 
							 $reserve_name=(str_replace(" ","-",$hotel_table['title']));
							?>
							<!-- <a href="<?php echo base_url().$sub_cat;?>/detail/<?php echo $enc_id;?>" class="btn btn-primary"> Book Now </a> -->
							 <a href="<?php echo base_url().$sub_cat;?>/detail/<?php echo $enc_id;?>" class="btn btn-primary select-but"> SELECT TENTS </a> 
						<?php }
						?>
						</div>
					</div>	

            <?php $room_price=0; endforeach?>



        <?php

        // render the pagination links
        $pagination->render();

        

 					} 
					?>
					
				</div>
					<!-- Results starts here << -->					
					
				</div>				

		    </div>			
			
		</div>				

       </div>
       <!-- /#page-wrapper -->       

<!---footer---->
<?php   $this->load->view('layout/footer');   ?>

 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>js/login.js"></script>
     <script src="<?php echo base_url();?>js/demo.js"></script>
    
     <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
     <script src="<?php echo base_url();?>js/validation.js"></script>

<link href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet">

 <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>  
  
      <!-- Javascript -->


	<script>
		$(document).ready(function(){

		    $("[data-toggle=tooltip]").tooltip();
		});
	</script>			
	<!-- Option for modify search >> -->
	<script>
		$(document).ready(function() {
			$(".modify-btn").click(function() {
				var $this = $(this);
			    $("#search_panel").slideToggle("slow")
			
			    $this.toggleClass("expanded");
			
			    if ($this.hasClass("expanded"))
			    	{
			            $this.html("CANCEL");
			        }
			        else
			        {
			            $this.html("MODIFY SEARCH");
			    	}
			});
		});
	</script>
	

  	

</body>
</html>


