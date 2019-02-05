<div class="col-md-3">
					<div class="search_filter search_filter_cus_hotels">
						<div class="search_filter_cus_hotels_title">
						<span class="sub">REFINE RESULTS</span>
						</div>
						<div class="search_filter_cus_hotels_block1">
						<span class="block_head">Star Rating </span>
						<div class="block">
						
														<?php 
														
															 $text_val = $hid_text;
														 if(!empty($_GET['checkedArray'])) {
								$star_rating= $_GET['checkedArray']; 
								
								$star5		= in_array(5, $star_rating); 
								$star4		= in_array(4, $star_rating);
								$star3		= in_array(3, $star_rating); 
								$star2		= in_array(2, $star_rating); 
								$star1		= in_array(1, $star_rating);
								$star0		= in_array(0, $star_rating);								} ?>
							<div>
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="5" <?php if(!empty($star5)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star gold" data-rating="1" value="1" ></span>
									<span class="fa fa-star gold" data-rating="2" value="2" ></span>
									<span class="fa fa-star gold" data-rating="3" value="3" ></span>
									<span class="fa fa-star gold" data-rating="4" value="4" ></span>
									<span class="fa fa-star gold" data-rating="5" value="5" ></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('5',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>	
							<div>	
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="4" <?php if(!empty($star4)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star gold" data-rating="1"></span>
									<span class="fa fa-star gold" data-rating="2"></span>
									<span class="fa fa-star gold" data-rating="3"></span>
									<span class="fa fa-star gold" data-rating="4"></span>
									<span class="fa fa-star-o" data-rating="5"></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('4',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>
							<div>	
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="3" <?php if(!empty($star3)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star gold" data-rating="1"></span>
									<span class="fa fa-star gold" data-rating="2"></span>
									<span class="fa fa-star gold" data-rating="3"></span>
									<span class="fa fa-star-o" data-rating="4"></span>
									<span class="fa fa-star-o" data-rating="5"></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('3',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>
							
							<div>	
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="2" <?php if(!empty($star2)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star gold" data-rating="1"></span>
									<span class="fa fa-star gold" data-rating="2"></span>
									<span class="fa fa-star-o" data-rating="3"></span>
									<span class="fa fa-star-o" data-rating="4"></span>
									<span class="fa fa-star-o" data-rating="5"></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('2',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>
							<div>	
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="1" <?php if(!empty($star1)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star gold" data-rating="1"></span>
									<span class="fa fa-star-o" data-rating="2"></span>
									<span class="fa fa-star-o" data-rating="3"></span>
									<span class="fa fa-star-o" data-rating="4"></span>
									<span class="fa fa-star-o" data-rating="5"></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('1',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>
							
								<div>	
								<span class="inp"><input type="checkbox" name="star" onclick="ayur_catchStar(this.value)" value="0" <?php if(!empty($star0)) echo 'checked' ?> /></span>
								<span class="star-rating"> 
									<span class="fa fa-star-o" data-rating="1"></span>
									<span class="fa fa-star-o" data-rating="2"></span>
									<span class="fa fa-star-o" data-rating="3"></span>
									<span class="fa fa-star-o" data-rating="4"></span>
									<span class="fa fa-star-o" data-rating="5"></span>
								</span>
								<span class="pull-right count"><?php echo $this->Ayurveda_model->star_count('0',$sub_cat_id,$text_val,$package,$pack_destination,$pack);?></span>
							</div>
							
						</div>
						</div>
						<!---<div class="search_filter_cus_hotels_block2 price_b_c">
						<span class="block_head">Price range</span>
						<div class="block">
							<div>	
								<span class="inp"><input id="option1_cus_hotel"  type="checkbox" name="price_range" onclick="catchStar(this.value)" value="500-2000" />
									<label class="checkbox" for="option1_cus_hotel">
									<i class="fa fa-inr"></i> 500 - <i class="fa fa-inr"></i> 2000 (per room)</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel1" type="checkbox" name="price_range" onclick="catchStar(this.value)" value="2000-9999"  />
									<label class="checkbox" for="option1_cus_hotel1">
									<i class="fa fa-inr"></i> 2000 - <i class="fa fa-inr"></i> 9999 (per room)</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel2" type="checkbox" name="price_range" onclick="catchStar(this.value)"  value="9999-14999" />
									<label class="checkbox" for="option1_cus_hotel2">
									<i class="fa fa-inr"></i> 9999 - <i class="fa fa-inr"></i> 14999 (per room)</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel3" type="checkbox" name="price_range" onclick="catchStar(this.value)"  value="14999-20000" />
									<label class="checkbox" for="option1_cus_hotel3">
									<i class="fa fa-inr"></i> 14999 + (per room)</label>
								</span>
							</div>
						</div>
						</div>--->

						<div class="search_filter_cus_hotels_block2">
						<span class="block_head">Facilities</span>
														<?php if(!empty($_GET['checkedArray_fac'])) {
								$fac	= $_GET['checkedArray_fac']; 
								
								$fa1	= in_array("free_parking", $fac);
								$fa2	= in_array("free_wifi", $fac);
								$fa3	= in_array("restaurant", $fac);
								$fa4	= in_array("free_fFitness_centre ", $fac);
								}
								?>	
						<div class="block">
							<div>	
								<span class="inp"><input id="option1_cus_hotel8"   type="checkbox" name="facilities" value="free_parking" onclick="ayur_catchStar(this.value)" <?php if(!empty($fa1)) echo 'checked' ?> /><label class="checkbox checkbox_det" for="option1_cus_hotel8">
									<i ></i>Free Parking Area</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel9"  type="checkbox" name="facilities" value="free_wifi" onclick="ayur_catchStar(this.value)" <?php if(!empty($fa2)) echo 'checked' ?> /><label class="checkbox checkbox_det" for="option1_cus_hotel9">
									<i ></i>Free Internet service</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel10"  type="checkbox" name="facilities" value="restaurant" onclick="ayur_catchStar(this.value)" <?php if(!empty($fa3)) echo 'checked' ?> /><label class="checkbox checkbox_det" for="option1_cus_hotel10">
									<i ></i>Restaurant</label>
								</span>
							</div>
							<div>	
							
							<span class="inp"><input id="option1_cus_hotel11" type="checkbox" name="facilities" value="free_fFitness_centre " onclick="ayur_catchStar(this.value)" /><label class="checkbox checkbox_det" for="option1_cus_hotel11">
									<i ></i>Fitness Center</label>
								</span>
							
							
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel001" type="checkbox" name="facilities" value="bar" onclick="catchStar(this.value)" /><label class="checkbox checkbox_det" for="option1_cus_hotel001">
									<i ></i>Bar</label>
								</span>
								<!--<span class="pull-right count">23</span>-->
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel002" type="checkbox" name="facilities" value="satellite_channels " onclick="catchStar(this.value)" /><label class="checkbox checkbox_det" for="option1_cus_hotel002">
									<i ></i>Satelite Channels</label>
								</span>
								<!--<span class="pull-right count">23</span>-->
							</div>
						</div>
						</div>
						<div class="search_filter_cus_hotels_block3">
							<span class="block_head">Hotel Name</span>
							<div class="block">
								
									<input class="span2  hotel_name_cus_input_box toprTop" value="<?php if(!empty($_GET['checkedArray_hotelName'])) {echo $_GET['checkedArray_hotelName'][0]; } ?>" id="inputIcon"  type="text" onkeyup="ayur_catchStar()" placeholder="Type Here">
								
							</div>
						</div>
						<div class="search_filter_cus_hotels_block2">
						<span class="block_head">Hotel Locations</span>
												<?php
						if(!empty($_GET['checkedArray_loc'])) {
							$loc	= $_GET['checkedArray_loc'];
							
							$loc1	= in_array("Thiruvananthapuram", $loc);
							$loc2	= in_array("Kovalam", $loc);
							$loc3	= in_array("Munnar", $loc);
							$loc4	= in_array("Cochin", $loc);
						}			
						?>
						<div class="block">
							<div>	
								<span class="inp"><input id="option1_cus_hotel4" type="checkbox" name="location" onclick="ayur_catchStar(this.value)" <?php if(!empty($loc1)) echo 'checked' ?> value="Thiruvananthapuram" /><label class="checkbox checkbox_det" for="option1_cus_hotel4">
									<i ></i>Thiruvananthapuram</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel5" type="checkbox" name="location" onclick="ayur_catchStar(this.value)" <?php if(!empty($loc2)) echo 'checked' ?> value="Kovalam" /><label class="checkbox checkbox_det" for="option1_cus_hotel5">
									<i ></i>Kovalam</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel6" type="checkbox" name="location" onclick="ayur_catchStar(this.value)" <?php if(!empty($loc3)) echo 'checked' ?>  value="Munnar" /><label class="checkbox checkbox_det" for="option1_cus_hotel6">
									<i ></i>Munnar</label>
								</span>
							</div>
							<div>	
								<span class="inp"><input id="option1_cus_hotel7" type="checkbox" name="location" onclick="ayur_catchStar(this.value)" <?php if(!empty($loc4)) echo 'checked' ?> value="Cochin" /><label class="checkbox checkbox_det" for="option1_cus_hotel7">
									<i ></i>Cochin</label>
								</span>
							</div>
						</div>
						</div>
					</div>
				</div>