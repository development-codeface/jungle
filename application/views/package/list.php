<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala.">
    <meta name="author" content="">


    <title>Booking Wings - Best Online Hotel Booking Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/social_buttons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">







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

<body class="packegaes_list_block_cus">
	
	
	<!----------header--------->
	<?php   $this->load->view('layout/header');   ?>



 <div id="result-wrapper" >
    	<?php   $this->load->view('layout/menu');   ?>

        
    	
				
		<div class="container">	
			
			
			<div class="row">
				
				<div class="col-md-8">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="#">Hotels</a></li>
						<li class="active">Thiruvananthapuram</li>
					</ol>
				</div>
				
				<div class="col-md-4 modify_btn">
					
					<!-- <a href="#" class="btn btn-default pull-right">MODIFY SEAECH</a> -->
					
				</div>
				
			</div>

			

			
			<div class="row">
				
				<div class="col-md-3">
				
					<div class="search_filter search_filter_cus_6">
						
						<div class="search_filter_cus_5">
						<span class="sub">REFINE RESULTS</span>
						<!--<span class="pull-right"><a href="#">Reset all</a></span>	-->
						</div>
						<form action="<?php echo base_url();?>holiday/search_list" method="get" />
						
						<div class="search_filter_cus_hotels_block3">
							<!--<span class="block_head">Seach</span>-->
							
							<div class="block">
								
									<input type="text" name="hidden-search" value="<?php echo $_GET['hidden-search']; ?>" class="span2  hotel_name_cus_input_box" id="holiday_search" placeholder="Search">
							
							</div>
		<div class="search_b_c">
						<div class=" col-md-6 p7r ">
								<div class="input-group1">
								
									<span class="view_label cus_room_title_2">Night(s)</span>
							<select autocomplete="off" value="" name="nights" id="nights" class="form_search">
								<option value="1" 
								<?php if(!empty($_GET['nights'])){ if($_GET['nights']=='2'){ ?> selected="selected" <?php }}?>  >1</option>
								<option value="2" <?php if(!empty($_GET['nights'])){ if($_GET['days']=='3'){?> selected="selected" <?php } }?>>2</option>
								<option value="3" <?php if(!empty($_GET['nights'])){ if($_GET['days']=='4'){?> selected="selected" <?php } }?>>3</option>
								<option value="4" <?php if(!empty($_GET['nights'])){ if($_GET['days']=='5'){?> selected="selected" <?php } }?>>4</option>
								<option value="5" <?php if(!empty($_GET['nights'])){if($_GET['days']=='6'){?> selected="selected" <?php } }?>>5</option>
								<option value="6" <?php if(!empty($_GET['nights'])){ if($_GET['days']=='7'){?> selected="selected" <?php } }?>>6</option>
							</select>
							</div>
							</div>
							<div class=" col-md-6 p7r">
								<div class="input-group1">
								
									<span class="view_label cus_room_title_2">Day(s)</span>
							<select autocomplete="off" value="" name="days" id="days" class="form_search">
								<option value="2" <?php if(!empty($_GET['days'])){ if($_GET['days']=='2'){ ?> selected="selected" <?php } }?>>2</option>
								<option value="3" <?php if(!empty($_GET['days'])){ if($_GET['days']=='3'){ ?> selected="selected" <?php } }?>>3</option>
								<option value="4" <?php if(!empty($_GET['days'])){ if($_GET['days']=='4'){ ?> selected="selected" <?php } }?>>4</option>
								<option value="5" <?php if(!empty($_GET['days'])){ if($_GET['days']=='5'){ ?> selected="selected" <?php } }?>>5</option>
								<option value="6" <?php if(!empty($_GET['days'])){ if($_GET['days']=='6'){ ?> selected="selected" <?php } }?>>6</option>
								<option value="7" <?php if(!empty($_GET['days'])){ if($_GET['days']=='7'){ ?> selected="selected" <?php } }?>>7</option>
							</select>
							</div>
							</div>
							
							
							<div class=" col-md-12 p7r hj_l">
							<!---<p class="sidebar_sub"><a href="#">Submit</a></p>--->
							<input type="submit" name="search" class="btn btn-primary" id="holiday_button" value="Search" <?php if($_GET['hidden-search']==''){?> disabled="" <?php }?>/> 
							</div>
							</div>
					

						</div>
				</form>
					<?php
						if(!empty($_REQUEST['dest']))
						{
							$dest_array = $_REQUEST['dest'];
						
							 $dest1=in_array('alappuzha', $dest_array);
							 $dest2=in_array('munnar', $dest_array);
							 $dest3=in_array('thekkady', $dest_array);
							 $dest4=in_array('kochi', $dest_array);
							 $dest5=in_array('kumarakam', $dest_array);
							 $dest6=in_array('palakkad', $dest_array);
							 $dest7=in_array('varkkala', $dest_array);
							 $dest8=in_array('wayanad', $dest_array);
						}
						
						?>
					<div class="search_filter_cus_9">
						
						<span class="block_head">Destination</span>
						
						<div class="block">
							<div>	
								<span class="inp"><input id="option9_cus" type="checkbox" name="destination[]" value="alappuzha" 
								<?php if(!empty($dest1)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option9_cus"><i></i> Alappuzha</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input id="option10_cus" type="checkbox" name="destination[]" value="munnar" 
								<?php if(!empty($dest2)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option10_cus"><i></i> Munnar</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input  id="option11_cus"  type="checkbox" name="destination[]" value="thekkady" 
								<?php if(!empty($dest3)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
								<label class="checkbox" for="option11_cus">
									<i></i>Thekkady</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input  id="option12_cus"  type="checkbox" name="destination[]" value="kochi" 
								<?php if(!empty($dest4)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option12_cus"><i></i> Kochi</label>
								</span>
								
							</div>
							
							<div>	
								<span class="inp"><input  id="option13_cus"  type="checkbox" name="destination[]" value="kumarakam" 
								<?php if(!empty($dest5)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option13_cus"><i></i> Kumarakam</label>
								</span>
								
							</div>
							
							<div>	
								<span class="inp"><input  id="option14_cus"  type="checkbox"  name="destination[]" value="palakkad" 
								<?php if(!empty($dest6)){?> checked <?Php }?> class="holiday_destination_searchv" onclick="package_refine();"/>
									<label class="checkbox" for="option14_cus"><i></i> Palakkad</label>
								</span>
								
							</div>
							
							<div>	
								<span class="inp"><input  id="option15_cus"  type="checkbox" name="destination[]" value="varkkala" 
								<?php if(!empty($dest7)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option15_cus"><i></i> Varkkala</label>
								</span>
								
							</div>
							
							<div>	
								<span class="inp"><input  id="option16_cus"  type="checkbox" name="destination[]" value="wayanad" 
								<?php if(!empty($dest8)){?> checked <?Php }?> class="holiday_destination_search" onclick="package_refine();"/>
									<label class="checkbox" for="option16_cus"><i></i> Wayanad</label>
								</span>
								
							</div>
							
							
							
						</div>
						
						</div>
									<div class="search_filter_cus_9">
						
						<?php
						if(empty($_REQUEST['days']) && !empty($_REQUEST['nights']))
						{
							$night_array = $_REQUEST['nights'];
						
						
							 $night1=in_array('1', $night_array);
							 $night2=in_array('2', $night_array);
							 $night3=in_array('3', $night_array);
							 $night4=in_array('4', $night_array);
							 $night5=in_array('5', $night_array);
							 $night6=in_array('6', $night_array);
						}
						
						?>
						
						<span class="block_head">Title</span>
						
						<div class="block">
							<div>	
								<span class="inp"><input id="option17_cus" type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night1)){?> checked <?Php }?> value="1" class="holiday_night_search" onclick="package_refine();" />
									<label class="checkbox" for="option17_cus"><i></i> 1 Night</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input id="option18_cus" type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night2)){?> checked <?Php }?> value="2" class="holiday_night_search" onclick="package_refine();"/>
									<label class="checkbox" for="option18_cus"><i></i>  2 Nights</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input  id="option19_cus"  type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night3)){?> checked <?Php }?> value="3" class="holiday_night_search" onclick="package_refine();"/>
								<label class="checkbox" for="option19_cus">
									<i></i>3 Nights</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input  id="option20_cus"  type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night4)){?> checked <?Php }?> value="4" class="holiday_night_search" onclick="package_refine();"/>
									<label class="checkbox" for="option20_cus"><i></i> 4 Nights</label>
								</span>
								
							</div>
							
							<div>	
								<span class="inp"><input  id="option21_cus"  type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night5)){?> checked <?Php }?> value="5" class="holiday_night_search" onclick="package_refine();"/>
									<label class="checkbox" for="option21_cus"><i></i> 5 Nights</label>
								</span>
								
							</div>
							<div>	
								<span class="inp"><input  id="option22_cus"  type="checkbox" name="holiday_nights[]" 
								<?php if(!empty($night6)){?> checked <?Php }?> value="6" class="holiday_night_search" onclick="package_refine();"/>
									<label class="checkbox" for="option22_cus"><i></i> 6+ Nights</label>
								</span>
								
							</div>
							
				
							
							
						</div>
						
						</div>
						
						
							
						
					</div>
					
				</div>
				
				
				<div id="search_refine_result">
				<div class="col-md-9">
					
				


					<div class="search_result_options">
						<div class="col-md-6">
							<h1><?php echo $hidden_search . ' - ' . count($details); ?> result(s)</h1>
						</div>
						<div class="col-md-6">
							<!--<div class="btn-group pull-right">
								<button type="button" class="btn btn-sm">Price</button>
								<button type="button" class="btn btn-default btn-sm">Popularity</button>
								<button type="button" class="btn btn-default btn-sm">User rating</button>
								<button type="button" class="btn btn-default btn-sm">
									
									<i class="fa fa-arrow-down"></i>
								</button>
							</div>-->
						</div>
					</div>
					
					<!-- Results starts here >> -->
				
				<?php 
				function small_price($value)
				{
					
					$filter_array= array_filter(func_get_args());
								
								if(!empty($filter_array))
								{
								return min(array_filter(func_get_args()));
								}
								else
								{
									return 0;
								}
					//return min((func_get_args()));
					//return min((func_get_args()));
				}
				
				if(empty($details)) { echo 'No results found.'; } else {
				
				foreach ($details as $package) {
							
				$img = $this->Packages_model->imageById($package->id);
					
				?>
				
					<div class="search_result col-md-12">
						<?php if(!empty($img[0]->thumb_image)){?>
						<div class=" col-md-3  rno_padding_l no_padding_r result_thumb" style="background: url(<?php echo base_url().$img[0]->thumb_image; ?>) no-repeat center center; background-size: cover;">
						<?php } else { ?>
						<div class=" col-md-3  rno_padding_l no_padding_r result_thumb" style="background: url(<?php echo base_url(); ?>room/no_image.jpg) no-repeat center center; background-size: cover;">
						<?php }?>
						</div>
					
						<div class="col-md-6 result_details">
							<div class="result_details_row">
								
								<h1><a href="<?php echo base_url();?>packages/detail/<?php echo $package->id; ?>"><?php echo $package->title; ?></a></h1>
						
									<div class="col-md-8 ">
									<ul class="package_details_cus">
									<li>Duration: <?php echo $package->nights;?> Nights <?php echo $package->days;?> Days</li>
									<!--<li>Day TripKochi (Cochin)</li>
									<li>2 NightsMunnar</li>
									<li>1 Night Alappuzha (Alleppey)</li>-->
									</ul>
								
								</div>
										<!-- <div class="col-md-6 ">
									
								<span class="room_faci2">
								<i class="fa fa-location-arrow"></i> <?php echo $package->description; ?></span>
								
								
								</div> -->
								<div class="col-md-6 "> </div>
								</div>
							
							
							<div class="result_details_bottom">
								<div class="pull-right room_features">
									<!-- <span data-toggle="tooltip" data-placement="top" title="Restaurant available"><i class="fa fa-cutlery"></i></span>
									<span data-toggle="tooltip" data-placement="top" title="Free Internet"><i class="fa fa-wifi"></i></span>
									<span data-toggle="tooltip" data-placement="top" title="Taxi Service"><i class="fa fa-car"></i></span> -->
								</div>
							
							</div>
							
							
							<?php 
							$seasonal = $this->Packages_model->get_price($package->id);
							if(!empty($seasonal)):
							$two_star =  json_decode($seasonal[0]->seasonal_two_star);
							$three_star = json_decode($seasonal[0]->seasonal_three_star);
							$four_star =  json_decode($seasonal[0]->seasonal_four_star);
							$five_star =  json_decode($seasonal[0]->seasonal_five_star);
							endif;
							
							$off_seasonal = $this->Packages_model->get_price_off($package->id);
							if(!empty($off_seasonal)):
							$two_star =  json_decode($off_seasonal[0]->off_seasonal_two_star);
							$three_star =  json_decode($off_seasonal[0]->off_seasonal_three_star);
							$four_star =  json_decode($off_seasonal[0]->off_seasonal_four_star);
							$five_star =  json_decode($off_seasonal[0]->off_seasonal_five_star);
							endif;
							
												
							 $a= $two_star[0];
							 $b=$three_star[0];
							 $c=$four_star[0];
							 $d=$five_star[0];
							
							$price = small_price($a,$b,$c,$d);
					

							?>
							
							
						</div>
						<div class="col-md-3 book_now book_now_cus">
						<?php if(!empty($price))
						{?>
								<h2 class="cus_hotel_name_title"><span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>" data-rating="1"></span> 
								<?php 
								if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
								echo $price; 
								} else if(!$this->session->userdata('currency')) {
								echo $price; 
								} else {
								echo convertCurrency($price, $this->session->userdata('default'), $this->session->userdata('currency'));
								}?><span class="room_rate"> ( per room / person)</span></h2>
						<?php } ?>
							
						<br>
							<a href="<?php echo base_url();?>packages/detail/<?php echo $package->id; ?>" class="btn btn-primary"> VIEW PACKAGE </a>
							
						</div>
					</div>
					
					<?php } } ?>
					
					
					<!-- Results starts here << -->
					
					
				</div>
				
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
    
     <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>



	
	<link href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet">
 
      <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
      <!-- CSS -->
    
      <!-- Javascript -->


	<script>
		$(document).ready(function(){
		    $("[data-toggle=tooltip]").tooltip();
		});
	</script>


		<!-- Option for modify search >> -->
	<script>
		$(document).ready(function() {
			
			 $('input[name="qty"]').val($('#_postid').val());
			
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
	<!-- Option for modify search << -->
	
	
	
<script>
	
$( ".sign_in" ).click(function() {
	{
		var fb = '<?php if(!empty($login_fb)) echo $login_fb;?>';
		var go = '<?php if(!empty($login_google)) echo $login_google;?>';
		
		if(!fb)
		{
		$.ajax({
			type: "POST",
			url: baseurl + "home/login_fb",
			success: function(data)
			{
				$("a.btn-facebook").attr("href", data);
			}
		});
		}
		
		if(!go)
		{
		$.ajax({
			type: "POST",
			url: baseurl + "home/login_google",
			success: function(data)
			{
				$("a.btn-google").attr("href", data);
			}
		});
		}
	}
});
	
</script>	
    
	

</body>

</html>


