  
<div id="page-wrapper">
  <div class="container-fluid profile-block-cus"> 
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"> Edit Profile </h3>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i>  -->Hotel </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>
    <!-- Page Heading << -->
   
   <?php
   if($this->session->flashdata('success'))
   {
   	?>
   	 <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                    </div>
               </div>
   	<?php
   }?>
   

   

   
   
    <form role="form" enctype="multipart/form-data" action="" method="post" class="profile_tab_cus_block_1" >
		
		
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#tabs-1">Basic</a></li>
			<li><a data-toggle="tab" href="#tabs-2">Images</a></li>
			<!-- <li><a data-toggle="tab" href="#tabs-3">Rooms</a></li> -->
			<li><a data-toggle="tab" href="#tabs-4">Facilities </a></li>
		</ul>
		
	
		
		<div class="tab-content">
		
			<div id="tabs-1" class="tab-pane fade in active  tab_main_content_cus">
				<div class="row">
				  <div class="col-lg-12">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-user"></i> Profile</h3>
					  </div>
					  <div class="panel-body">
						<div class="list-group">
						  <div class="panel">
						  	<div class=" col-lg-6">
						  <div class="form-group col-lg-12">
							  <label class="col-lg-4">Title</label>
							  <input class="col-lg-8 form-control " name="title" value="<?php echo $result['hotel'][0]->title;?>" readonly>
							  <input class="col-lg-8 form-control " name="id" type="hidden" value="<?php echo $result['hotel'][0]->id;?>">
							</div>
							
							<div class="form-group col-lg-12">
							  <label class="col-lg-5 subcatagorylable">Star Rating</label>
							  <select class="col-lg-8 form-control subcatagory" id="star_rating" name="star_rating">
						<option value="0" <?php if($result['hotel'][0]->star_rating == 0){ ?> selected="selected"<?php }?>>Individual</option>
                          <option value="1" <?php if($result['hotel'][0]->star_rating == 1){ ?> selected="selected"<?php }?>>1</option>
                          <option value="2" <?php if($result['hotel'][0]->star_rating == 2){ ?> selected="selected"<?php }?>>2</option>
                          <option value="3" <?php if($result['hotel'][0]->star_rating == 3){ ?> selected="selected"<?php }?>>3</option>
                          <option value="4" <?php if($result['hotel'][0]->star_rating == 4){ ?> selected="selected"<?php }?>>4</option>
                          <option value="5" <?php if($result['hotel'][0]->star_rating == 5){ ?> selected="selected"<?php }?>>5</option>
							  </select>
							  <input class="col-lg-8 form-control " type="hidden" name="sub_catagory_hidden" id="sub_catagory_hidden" value="<?php echo $result['hotel'][0]->sub_category_id;?>">
							</div>
							
							<div class="form-group col-lg-12">
							  <label  class="col-lg-4">Address</label>
							   <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
							  <textarea  class="ckeditor " rows="3" name="address" readonly><?php echo $result['hotel'][0]->address;?></textarea>
								</div>
							</div>
							
						
							
							<div class="form-group col-lg-6">
							  <label class="col-lg-4">Place</label>
							  <input class="col-lg-8 form-control " id="place" name="place" value="<?php echo $result['hotel'][0]->place;?>">
							</div>
						  
							<div class="form-group col-lg-6">
							  <label class="col-lg-4">Country</label>
							  <select class="col-lg-8 form-control country" name="country" id="country">
							   <?php foreach($country as $coun){?>
								   <option value="<?php echo $coun->location_id;?>" <?php if($coun->location_id == $result['hotel'][0]->country){?> selected="selected"<?php }?>><?php echo $coun->name;?></option>
								  <?php }?>
							  </select>
							</div>
							
							 <div class="form-group col-lg-6">
							  <label class="col-lg-4">State</label>
							  <select class="col-lg-8 form-control states" name="states" id="state">
								  
							 <?php 
							 foreach($state as $states){
									$query = $this->db->select('id')->where('state',$states->state)->get('tbl_locations');
									$res = $query->row();
									$id= $res->id;
									
									
									$query1 = $this->db->select('state')->where('id',$result['hotel'][0]->state)->get('tbl_locations');
									$res1 = $query1->row();
									$sta_name= $res1->state;
							 
									?>
								   <option value="<?php echo $id;?>" <?php if($states->state==$sta_name){?> selected="selected"<?php }?>><?php echo $states->state;?></option>
								  <?php }?>
							  </select>
							  <!-- <input class="col-lg-8 form-control " type="hidden" name="state_hidden" id="state_hidden" value="<?php echo $result->state;?>"> -->
							</div>
							
							
							
							 <div class="form-group col-lg-6">
							  <label class="col-lg-4">District</label>
							  <select class="col-lg-8 form-control district" name="state" id="district">
								<?php 
								$querys = $this->db->select('*')->where('state',$sta_name)->get('tbl_locations');
								  foreach($querys->result() as $districts){?>
							 
								   <option value="<?php echo $districts->id;?>" <?php if($districts->id==$result['hotel'][0]->state){?> selected="selected"<?php }?>><?php echo $districts->district;?></option>
								  <?php }?>
							  </select>
							  <input class="col-lg-8 form-control " type="hidden" name="state_hidden" id="state_hidden" value="">
							</div>
							
							</div>
							
							
							
							
							
							  <!-- <div class="form-group row">
							  <label class="col-lg-4">State</label>
							  <select class="col-lg-8 form-control state" name="state">
								   <?php foreach($country as $coun){?>
								   <option value="<?php echo $coun->location_id;?>"><?php echo $coun->name;?></option>
								  <?php }?>
							  </select>
							  <input class="col-lg-8 form-control " type="hidden" name="state_hidden" id="state_hidden" value="<?php echo $result['hotel'][0]->state;?>">
							</div> -->
							<div class=" col-lg-6">
							<div class="form-group col-lg-12" style="display : none;">
							  <label class="col-lg-4">Catagory</label>
							  <select class="col-lg-8 form-control catagory" name="catagory" >
							   <option value="<?php echo $result['hotel'][0]->category_id;?>" ><?php echo $Catagory;?></option>
							  </select>
							</div>
							<div class="form-group col-lg-12" >
							  <label class="col-lg-4">Logo</label>
							  <input class="col-lg-6 form-control " type="file" name="logo"> <span style="color : red;">Logo size - 200 x 100 (Width x Height)</span>
							</div>
							<div class="form-group col-lg-12">
							  <label class="col-lg-4 subcatagorylable">Category</label>
							  <select class="col-lg-8 form-control subcatagory" name="sub_catagory">
								<option value="<?php echo $result['hotel'][0]->sub_category_id;?>"><?php echo $sub_catagory;?></option>
							  </select>
							  <input class="col-lg-8 form-control " type="hidden" name="sub_catagory_hidden" id="sub_catagory_hidden" value="<?php echo $result['hotel'][0]->sub_category_id;?>">
							</div>
							
							<div class="form-group col-lg-12">
							  <label class="col-lg-4 subcatagorylable">Group</label>
							  <select class="col-lg-8 form-control group" name="group_id">
								 <option value="">--Select--</option>
                           <?php foreach($groups as $group_name)
						   {
							   ?>
							   <option value="<?php echo $group_name->id;?>" <?php if($result['hotel'][0]->group_id==$group_name->id){?> selected="selected"<?php }?>><?php echo $group_name->name;?></option>
							   <?php
						   }
							?>
							  </select>
							  <input class="col-lg-8 form-control " type="hidden" name="sub_catagory_hidden" id="sub_catagory_hidden" value="<?php echo $result['hotel'][0]->sub_category_id;?>">
							</div>
							
							<div class="form-group col-lg-12" style="display:none;">
							  <label class="col-lg-4">Facebook Link</label>
							  <input class="col-lg-8 form-control " id="fb" name="fb" value="<?php echo $result['hotel'][0]->facebook_link;?>">
							</div>
							<div class="form-group col-lg-12">
							  <label class="col-lg-4">Mail ID</label>
							  <input class="col-lg-8 form-control " id="email" name="mailid" value="<?php echo $result['hotel'][0]->mail;?>">
							</div>
							<div class="form-group col-lg-12">
							  <label class="col-lg-4">Phone</label>
							  <input class="col-lg-8 form-control " id="phone" name="phone" value="<?php echo $result['hotel'][0]->phone;?>">
							</div>
							<div class="form-group col-lg-12">
							  <label class="col-lg-4">Destination</label>
							  <input class="col-lg-8 form-control " id="destination" name="destination" value="<?php echo $result['hotel'][0]->destination;?>">
							</div>
							</div>
								<div class="col-lg-12">
									<div class="form-group col-lg-12">
							  <label  class="col-lg-4">Description</label>
							  <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
							  <textarea  class="ckeditor" rows="3" name="desc" id="desc"><?php echo $result['hotel'][0]->des;?></textarea>
							  </div>
							</div></div>
							
							
							  <div class=" col-lg-12">
							<div class="tax_block ">
                  <div class="form-group col-lg-12">
                        <div class="col-lg-3"></div>
                      
                       <div class="col-lg-3">  </div>
                                         <div class="form-group col-lg-5 ">
                       
                       
                         
                      
                      </div>
                
                      </div>
                      
                      
                         <div class="form-group col-lg-12 ">
                      	      <div class="col-lg-3"><label class="">Tax Type</label> </div>
                      	  	  <div class="col-lg-3"> <label class="">Tax Percentage</label></div>
                      	  	
                     	 </div>
                      
					  
					   <div class="form-group col-lg-6">
                      <label class="col-lg-12">Seasonal Tax </label>
                    </div>
					
					
                      <?php
                      $tax = $this->Profilemodel->get_tax($result['hotel'][0]->id);
					  $off_tax = $this->Profilemodel->get_tax_off($result['hotel'][0]->id);
					   
					  foreach($tax as $tax_data):
                      ?>
                      <input type="hidden" name="tax_id[]" value="<?php echo $tax_data->id;?>" />
                      <div class="form-group col-lg-12  ">
	                      	<div class="col-lg-3">  
	                      		 <input class="col-lg-8 form-control" name="seasonal[]" readonly="" value="<?php echo $tax_data->tax_type;?>"> 
	                       </div>
	                       <div class="col-lg-3"> 
	                       	   <input class=" col-lg-8 form-control" name="seasonal_percent[]" value="<?php echo $tax_data->tax_amount;?>" onkeypress="return onlyNumbersDots(event)">
	                       	</div>
                       </div>
                      <?php
						endforeach;
                      ?>
                   
                      
					  
					   <div class="form-group col-lg-6">
                      <label class="col-lg-12">Off Seasonal Tax </label>
                    </div>
                
				
				
				  <?php
					  foreach($off_tax as $tax_off_data):
                      ?>
                     <input type="hidden" name="off_hotel_id[]" value="<?php echo $tax_off_data->id;?>" />
                      <div class="form-group col-lg-12  ">
	                      	<div class="col-lg-3">  
	                      		 <input class="col-lg-8 form-control"name="off_seasonal[]" readonly=""  value="<?php echo $tax_off_data->tax_type;?>">
	                       </div>
	                       <div class="col-lg-3"> 
	                       	   <input class=" col-lg-8 form-control" name="off_seasonal_percent[]" value="<?php echo $tax_off_data->tax_amount;?>" onkeypress="return onlyNumbersDots(event)">
	                       	</div>
                       </div>
                      <?php
						endforeach;
                      ?>
					  
					  
					  
                     </div>
							
							</div>
							<!-- <div class="form-group col-lg-12">
							  <label class="col-lg-4">Check In</label>
							  <input class="col-lg-8 form-control " name="checkin" value="<?php echo $result['hotel'][0]->check_in;?>">
							</div>
							<div class="form-group col-lg-12">
							  <label class="col-lg-4">Check Out</label>
							  <input class="col-lg-8 form-control " name="checkout" value="<?php echo $result['hotel'][0]->check_out;?>">
							</div> -->
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			</div>
		  
			<div id="tabs-2" class="tab-pane fade  tab_main_content_cus">
				<div class="row">
				  <div class="col-lg-12">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Images</h3>
					  </div>
					  <div class="panel-body">
						<div class="list-group">
						  <div class="panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <span style="color : red;">Image size - 800x 450(Width x Height) & 500KB</span>
							<div class="hotel_image_row col-lg-12">
							<?php
							$image_count=count($result['image']);
							if($image_count==0)
							//$i=1;
							//foreach($result['image'] as $image)
							{?>
						<div class="form-group row">
								<label class="col-lg-2">Image</label>
								<input class="col-lg-6 form-control " type="file" name="hotel_image[]">
							 <div class="col-lg-2 text-right">
								  <button type="button" class="btn cus-btn btn-default pull-right hotel_image_add">Add More Images</button>
								</div>
							  </div>
							<?php }
						   else { ?>
							<input type="hidden" name="img_count" id="img_count" value="<?php echo $image_count;?>" />
							<div class="col-md-12">
							<div class="form-group col-md-12 hotel_img_title_block ">
								
								 <label class="col-lg-6">Images</label>
								<div class="col-lg-6 ">
								  <button type="button" class="btn cus-btn btn-success  hotel_image_add  pull-right "> <i class="fa fa-plus"></i> Add More Images</button>
								</div>
								
							  </div>    
							  <div class="img_cus_block ">
							                    <?php foreach($result['image'] as $images): ?>
							  
							  <a href="<?php echo base_url() . 'profile/image_edit/' . $images->hotel_id . '/' . $images->id;?>" onclick="javascript&#58;
			window.open(this.href, this.target, 'width=600,height=450,screenX=220,screenY=160,resizable,scrollbars');return false;" class="hotel_images_cus" title="Zoom">	
			<img src="<?php echo base_url(). '../'.$images->thumb;?>" width='120' height='100' /> </a>
							
								<input type="file" id="fileLoader" name="hotel_image[]" title="Load File" style = "display:none;" />
								<!-- <input type="button" id="btnOpenFileDialog" style="background: url(<?php echo base_url(). '../'.$images->thumb_image;?>); width: 100px; height: 100px;" onclick="openfileDialog();" />
								  -->
								 
							  <?php endforeach;  }
						  ?>
						  
						  	</div>
								<br/>
							  	</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			</div>
		  
			
			
			<div id="tabs-4" class="tab-pane fade tab_main_content_cus ">
				
	<div class="row">
				  <div class="col-lg-12">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Facilities</h3>
					  </div>
					  <div class="panel-body h_facilities_block">
						<div class="list-group">
						  <div class="panel col-md-12 ">
							
							
							<div class="container-fluid  hotel_fac">
								<h4>Bathroom</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
									
								<span class=" radio-inline col-md-3">
								  <input type="checkbox"   class="css-checkbox"  id="chk1" value="1" name="free_toiletries" <?php if($result['facilities'][0]->free_toiletries == 1){ ?> checked="checked" <?php }?> >
								  <label for="chk1" class="css-label"> Free toiletries</label> </span>
								  
								  
							   <span class="radio-inline  col-md-3 ">
								  <input type="checkbox"   class="css-checkbox"  id="chk2" value="1" name="hairdryer" <?php if($result['facilities'][0]->hairdryer == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk2" class="css-label">  Hairdryer </label></span>
								  
							   <span class="radio-inline  col-md-3 ">
								  <input  type="checkbox"   class="css-checkbox"  id="chk3" value="1" name="bathroom" <?php if($result['facilities'][0]->bathroom == 1){ ?> checked="checked" <?php }?>>
								<label for="chk3" class="css-label">   Bathroom  </label></span>
							   <span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk4"  value="1" name="toilet" <?php if($result['facilities'][0]->toilet == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk4" class="css-label">  Toilet  </label></span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk5" value="1" name="bath_shower" <?php if($result['facilities'][0]->bath_shower == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk5" class="css-label">  Bath or Shower </label> </span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk6" value="1" name="slippers" <?php if($result['facilities'][0]->slippers == 1){ ?> checked="checked" <?php }?>>
								<label for="chk6" class="css-label">   Slippers </label> </span>
							   <span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk7"  value="1" name="towels" <?php if($result['facilities'][0]->towels == 1){ ?> checked="checked" <?php }?>>
								<label for="chk7" class="css-label">   Towels  </label></span>
							   <span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk8"  value="1" name="linen" <?php if($result['facilities'][0]->linen == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk8" class="css-label">  Linen </label> </span>
							  </div>
							</div>
							
							
							
								<div class="container-fluid  hotel_fac">
								<h4>Bedroom</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk9" value="1" name="wardrobe_closet" <?php if($result['facilities'][0]->wardrobe_closet == 1){ ?> checked="checked" <?php }?> >
								 <label for="chk9" class="css-label"> Wardrobe/Closet </label></span>
							  </div>
							</div>
							
						   <div class="container-fluid  hotel_fac">
								<h4>View</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk10"   value="1" name="garden_view"  <?php if($result['facilities'][0]->garden_view == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk10" class="css-label"> Garden view</label></span>
								<span class="radio-inline  col-md-3">

								  <input  type="checkbox"   class="css-checkbox"    id="chk11"   value="1" name="view"  <?php if($result['facilities'][0]->view == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk11" class="css-label">View</label></span>
							  </div>
							</div>
							
						   <div class="container-fluid  hotel_fac">
								<h4>Outdoors</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk12"     value="1" name="free_outdoor_pool" <?php if($result['facilities'][0]->free_outdoor_pool == 1){ ?> checked="checked" <?php }?> >
								  <label for="chk12" class="css-label">Free! Outdoor pool </label></span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"    id="chk13"     value="1" name="terrace"  <?php if($result['facilities'][0]->terrace == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk13" class="css-label">Terrace</label> </span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk14"    value="1" name="garden" <?php if($result['facilities'][0]->garden == 1){ ?> checked="checked" <?php }?> >
								 <label for="chk14" class="css-label"> Garden</label> </span>
							  </div>
							</div>
							
						   <div class="container-fluid  hotel_fac">
								<h4>Kitchen</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
							   <span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"  id="chk15"  value="1" name="electric_kettle"  <?php if($result['facilities'][0]->electric_kettle == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk15" class="css-label"> Electric kettle</label></span>
							  </div>
							</div>
							
						   <div class="container-fluid  hotel_fac">
								<h4>Room Amenities</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"    id="chk16"   value="1" name="clothes_rack"  <?php if($result['facilities'][0]->clothes_rack == 1){ ?> checked="checked" <?php }?>>
								<label for="chk16" class="css-label">  Clothes rack</label></span>
							  </div>
							</div>
							<div class="container-fluid  hotel_fac">
								<h4>Activities</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"     id="chk17"   value="1" name="free_fFitness_centre"  <?php if($result['facilities'][0]->free_fFitness_centre == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk17" class="css-label">  Free! Fitness centre </label></span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk18"   value="1" name="DJ" <?php if($result['facilities'][0]->DJ == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk18" class="css-label"> Nightclub/DJ </label></span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk19"   value="1" name="evening_entertainment"  <?php if($result['facilities'][0]->evening_entertainment == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk19" class="css-label"> Evening entertainment</label> </span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk20"   value="1" name="sauna"  <?php if($result['facilities'][0]->sauna == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk20" class="css-label">  Sauna</label> </span>
								<span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk21"   value="1" name="spa_wellness_centre"  <?php if($result['facilities'][0]->spa_wellness_centre == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk21" class="css-label">  Spa and wellness centre </label></span>
							   <span class="radio-inline  col-md-3">
								  <input  type="checkbox"   class="css-checkbox"   id="chk22"   value="1" name="massage"  <?php if($result['facilities'][0]->massage == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk22" class="css-label">  Massage</label></span>
							  </div>
							</div>
							
						  <div class="container-fluid  hotel_fac">
								<h4>Living Area</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk23"  value="1" name="seating_area"  <?php if($result['facilities'][0]->seating_area == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk23" class="css-label">   Seating Area </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk24"   value="1" name="desk"  <?php if($result['facilities'][0]->desk == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk24" class="css-label">  Desk </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk25"  value="1" name="sofa"  <?php if($result['facilities'][0]->sofa == 1){ ?> checked="checked" <?php }?>>
								    <label for="chk25" class="css-label"> Sofa</label> </span>
							  </div>
							</div>
							
							<div class="container-fluid  hotel_fac">
								<h4>Media & Technology</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk26" value="1" name="telephone"  <?php if($result['facilities'][0]->telephone == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk26" class="css-label">  Telephone </label></span>
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk27"  value="1" name="satellite_channels"  <?php if($result['facilities'][0]->satellite_channels == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk27" class="css-label"> Satellite Channels </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk28" value="1" name="flat_screen_TV"  <?php if($result['facilities'][0]->flat_screen_TV == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk28" class="css-label"> Flat-screen TV</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk29"  value="1" name="cable_channels"  <?php if($result['facilities'][0]->cable_channels == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk29" class="css-label">Cable Channels</label> </span>
							  </div>
							</div>
							
							<div class="container-fluid  hotel_fac">
								<h4>Food & Drink</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk30"  value="1" name="bar"  <?php if($result['facilities'][0]->bar == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk30" class="css-label">Bar</label>  </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox" id="chk31"  value="1" name="breakfast_in_the_room"  <?php if($result['facilities'][0]->breakfast_in_the_room == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk31" class="css-label"> Breakfast in the room</label>  </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox"  id="chk32"  value="1" name="restaurant"  <?php if($result['facilities'][0]->restaurant == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk32" class="css-label"> Restaurant </label> </span>
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox" id="chk33" value="1" name="snack_bar"  <?php if($result['facilities'][0]->snack_bar == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk33" class="css-label"> Snack bar </label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox" id="chk34"  value="1" name="special_diet_menus"  <?php if($result['facilities'][0]->special_diet_menus == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk34" class="css-label"> Special diet menus </label> </span>
							  </div>
							</div>
							
							<div class="container-fluid hotel_fac">
								<h4>Internet</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox"  id="chk35"  value="1" name="free_wifi"  <?php if($result['facilities'][0]->free_wifi == 1){ ?> checked="checked" <?php }?>>
								<label for="chk35" class="css-label">  Free! WiFi  </label> </span>
							  </div>
							</div>
							
						   <div class="container-fluid  hotel_fac">
								<h4>Parking</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox"   id="chk36" value="1" name="free_parking"  <?php if($result['facilities'][0]->free_parking == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk36" class="css-label"> Free Parking </label>  </span>
							  </div>
							</div>
							
							<div class="container-fluid  hotel_fac">
								<h4>Services</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"   id="chk37"  value="1" name="room_service"  <?php if($result['facilities'][0]->room_service == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk37" class="css-label"> Room service  </label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"   id="chk38"  value="1" name="packed_lunches"  <?php if($result['facilities'][0]->packed_lunches == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk38" class="css-label"> Packed lunches  </label> </span>
							  <span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk39"   value="1" name="car_hire"  <?php if($result['facilities'][0]->car_hire == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk39" class="css-label">  Car hire  </label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk40"   value="1" name="airport_sshuttle"  <?php if($result['facilities'][0]->airport_sshuttle == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk40" class="css-label"> Airport shuttle </label>  </span>
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk41"  value="1" name="hour_front_desk"  <?php if($result['facilities'][0]->hour_front_desk == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk41" class="css-label"> 24-hour front desk </label>  </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk42"  value="1" name="currency_exchange"  <?php if($result['facilities'][0]->currency_exchange == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk42" class="css-label">Currency exchange  </label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk43"  value="1" name="ticket_service"  <?php if($result['facilities'][0]->ticket_service == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk43" class="css-label"  >Ticket service  </label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"   id="chk44"  value="1" name="free_luggage_storage"  <?php if($result['facilities'][0]->free_luggage_storage == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk44" class="css-label">Free! Luggage storage </label>  </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk45"  value="1" name="shared_lounge"  <?php if($result['facilities'][0]->shared_lounge == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk45" class="css-label"> Shared lounge/TV area </label>  </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk46"  value="1" name="babysitting"  <?php if($result['facilities'][0]->babysitting == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk46" class="css-label"> Babysitting/child services  </label> </span>
							   <span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox"  id="chk47"  value="1" name="laundry" <?php if($result['facilities'][0]->laundry == 1){ ?> checked="checked" <?php }?> >
								   <label for="chk47" class="css-label">Laundry </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk48"  value="1" name="dry_cleaning"  <?php if($result['facilities'][0]->dry_cleaning == 1){ ?> checked="checked" <?php }?>>
								 <label for="chk48" class="css-label">  Dry cleaning </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk49"  value="1" name="ironing_service"  <?php if($result['facilities'][0]->ironing_service == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk49" class="css-label"> Ironing service</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk50"  value="1" name="free_shoeshine"  <?php if($result['facilities'][0]->free_shoeshine == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk50" class="css-label">Free! Shoeshine </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk51"   value="1" name="trouser_press"  <?php if($result['facilities'][0]->trouser_press == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk51" class="css-label"> Trouser press </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk52"  value="1" name="meeting"  <?php if($result['facilities'][0]->meeting == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk52" class="css-label"> Meeting/banquet facilities </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"   id="chk53"  value="1" name="free_business_centre"  <?php if($result['facilities'][0]->free_business_centre == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk53" class="css-label"> Free! Business centre </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk54"   value="1" name="fax" <?php if($result['facilities'][0]->fax == 1){ ?> checked="checked" <?php }?>>
								  <label for="chk54" class="css-label"> Fax/photocopying </label></span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox"  class="css-checkbox services"  id="chk55"   value="1" name="free_grocery_deliveries"  <?php if($result['facilities'][0]->free_grocery_deliveries == 1){ ?> checked="checked" <?php }?>>
								   <label for="chk55" class="css-label">Free! Grocery deliveries</label> </span>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			</div>
	<div class="form-group form-footer">
        <button type="submit" class="btn cus-btn btn-primary" name="submit" id="edit_hotel_submit">Submit</button>
        <button type="reset" class="btn cus-btn btn-default">Reset</button>
      </div>
    </form>
		</div>
		
		
      
</div>


    
<!-- /.row --> 


