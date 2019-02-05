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
					//return min(array_filter(func_get_args()));
					//return min((func_get_args()));
				}
				
				if(empty($details)) { echo 'No results found.'; } else {
				
				foreach ($details as $package) {
							
				$img = $this->Packages_model->imageById($package->id);
					
				?>
				
					<div class="search_result col-md-12">
						
						<div class=" col-md-3  rno_padding_l no_padding_r result_thumb" style="background: url(<?php echo base_url().$img[0]->thumb_image; ?>) no-repeat center center; background-size: cover;">
							
						</div>
					
						<div class="col-md-6 result_details">
							<div class="result_details_row">
								
								<h1><a href="<?php echo base_url();?>packages/detail/<?php echo $package->id; ?>"><?php echo $package->title; ?></a></h1>
						
									<div class="col-md-8 ">
									<ul class="package_details_cus">
									<li>Duration: <?php echo $package->nights;?> Nights <?php echo $package->days;?> Days</li>
									<li>Day TripKochi (Cochin)</li>
									<li>2 NightsMunnar</li>
									<li>1 Night Alappuzha (Alleppey)</li>
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
								<h2 class="cus_hotel_name_title"><span class="fa fa-inr" data-rating="1"></span> <?php echo $price;?><span class="room_rate"> ( per room )</span></h2>
						<?php } ?>
							
						<br>
							<a href="<?php echo base_url();?>packages/detail/<?php echo $package->id; ?>" class="btn btn-primary"> VIEW PACKAGE </a>
							
						</div>
					</div>
					
					<?php } } ?>
					
					
					<!-- Results starts here << -->
					
					
				</div>