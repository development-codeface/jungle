<?php $this->load->view('hotel/side_menu');
$cat = $this->uri->segment(4);
if($cat=='hotels')
{
	$categoryname="Hotels";
}
if($cat=='resorts')
{
	$categoryname="Resorts";
}
if($cat=='apartments')
{
	$categoryname="Apartments";
}
if($cat=='home')
{
	$categoryname="Home Stays";
}
?>
  <style type="text/css">
  .msg {
    display: none;
}
.error {
    color: red;
}
.success {
    color: green;
}
</style>
<div id="page-wrapper" class="add_room wrapper_admin_cus_block">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit <?php echo $categoryname;?> </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>hotel">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i> --> <?php echo $categoryname;?> </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>
    <!-- Page Heading << -->
     <?php if($this->session->flashdata('success'))
    {?>
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
    <form class="cus_admin_form" role="form" enctype="multipart/form-data" action="" method="post">
    	
    	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Basic</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Images</a></li>
        <li><a data-toggle="tab" href="#tabs-4">Facilities </a></li>
	</ul>
		
	<br>
	
  
    <div  class="tab-content">

      <div id="tabs-1" class="tab-pane fade in active">
  
   
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary  cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php echo $categoryname;?></h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Title</label>
                      <input class="col-lg-12 form-control " name="title" id="title" value="<?php echo $result->title;?>">
                      <input class="col-lg-12 form-control " name="id" type="hidden" value="<?php echo $result->id;?>">
                    </div>
                    
                     <div class="form-group col-lg-6">
                      <label class="col-lg-12">Star rating</label>
                      <select class="col-lg-12 form-control " name="star_rating" id="star_rating">
                          <option value="2" <?php if($result->star_rating == 2){ ?> selected="selected"<?php }?>>2</option>
                          <option value="3" <?php if($result->star_rating == 3){ ?> selected="selected"<?php }?>>3</option>
                          <option value="4" <?php if($result->star_rating == 4){ ?> selected="selected"<?php }?>>4</option>
                          <option value="5" <?php if($result->star_rating == 5){ ?> selected="selected"<?php }?>>5</option>
                    </select>
                    </div>          
                    <div class="form-group col-lg-6">
                      <label  class="col-lg-12">Address</label>
                      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                      <textarea  class="ckeditor" rows="3" name="address"  id="address"><?php echo $result->address;?></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label  class="col-lg-12">Description</label>
                       <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                      <textarea  class="ckeditor" rows="3" name="desc" id="desc"><?php echo $result->des;?></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Place</label>
                      <input class="col-lg-12 form-control " name="place"  value="<?php echo $result->place;?>" id="place">
                    </div>
                  
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Country</label>
                      <select class="col-lg-12 form-control " name="country" id="country">
                       <?php foreach($country as $coun){?>
                           <option value="<?php echo $coun->location_id;?>" <?php if($coun->location_id == $result->country){?> selected="selected"<?php }?>><?php echo $coun->name;?></option>
                          <?php }?>
                      </select>
                    </div>
                    
                    
                    
							
							
                      <div class="form-group col-lg-6">
                      <label class="col-lg-12">State</label>
                      <select class="col-lg-12 form-control states" name="states" id="state">
						  
                     <?php 
                     foreach($state as $states){
						   	$query = $this->db->select('id')->where('state',$states->state)->get('tbl_locations');
							$res = $query->row();
							$id= $res->id;
							
							
							$query1 = $this->db->select('state')->where('id',$result->state)->get('tbl_locations');
							$res1 = $query1->row();
							$sta_name= $res1->state;
					 
							?>
                           <option value="<?php echo $id;?>" <?php if($states->state==$sta_name){?> selected="selected"<?php }?>><?php echo $states->state;?></option>
                          <?php }?>
                      </select>
                      <input class="col-lg-12 form-control " type="hidden" name="state_hidden" id="state_hidden" value="<?php echo $result->state;?>">
                    </div>
                    
                    
                          
                    
                      <div class="form-group col-lg-6">
                      <label class="col-lg-12">District</label>
                      <select class="col-lg-12 form-control district" name="state" id="district">
                      	<?php 
                    	$querys = $this->db->select('*')->where('state',$sta_name)->get('tbl_locations');
                          foreach($querys->result() as $districts){?>
					 
                           <option value="<?php echo $districts->id;?>" <?php if($districts->id==$result->state){?> selected="selected"<?php }?>><?php echo $districts->district;?></option>
                          <?php }?>
                      </select>
                      <input class="col-lg-12 form-control " type="hidden" name="state_hidden" id="state_hidden" value="">
                    </div>
                    
                    
                    
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Catagory</label>
                      <select class="col-lg-12 form-control" name="catagory" id="catagory" >
                      	<option value="1">Hotels</option>
                      <?php //foreach($Catagory as $cat){?>
                       <!-- <option value="<?php echo $cat->id;?>" <?php if($cat->id == $result->category_id){?> selected="selected"<?php }?>><?php echo $cat->name;?></option> -->
                      <?php //}?>
                      </select>
                    </div>
                   
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12 subcatagorylable">Sub Catagory</label>
                      <select class="col-lg-12 form-control" name="sub_catagory" id="sub_catagory">
                        <option value="<?php echo $sub_category[0]->id;?>"><?php echo $sub_category[0]->name;?></option>
                       
                      </select>
                      <input class="col-lg-8 form-control " type="hidden" name="sub_catagory_hidden" id="sub_catagory_hidden" value="<?php echo $result->sub_category_id;?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Facebook Link</label>
                      <input class="col-lg-12 form-control " name="fb" value="<?php echo $result->facebook_link;?>" id="fb">
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Mail ID</label>
                      <input class="col-lg-12 form-control " name="mailid" value="<?php echo $result->mail;?>" id="email" onblur="ValidateEmail(this.value)">
                      <div class="text-center m-t m-b"><small><?php echo form_error('email');?></small></div>
                              <span class="msg error" id="msg">Not a valid email address</span>
                             <span class="msg success" id="msg1">A valid email address!</span>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Phone</label>
                      <input class="col-lg-12 form-control " name="phone" id="phone"  onkeypress="return isNumber(event)" value="<?php echo $result->phone;?>">
                    </div>
                     <div class="col-lg-12 seasonal_tax_block">
                                      <div class="tax_block tax_block_m_remove">
                  <div class="form-group col-md-12   grp_m_cus_m">
                  	<div class="form-group col-md-3 grp_m_cus tax_p_r">
                        <label class="col-lg-12 ">Tax Type</label>
                      </div>
                      	<div class="form-group col-md-3 grp_m_cus tax_p_r">
                         <label class="col-lg-12">Tax Percentage</label>
                         
                         </div>
                         
                                         <div class="form-group col-lg-5 grp_m_cus">
                       
                      
                      </div>
                
                      </div>
                      
                     
                      
                      
                      
               	
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Seasonal Tax </label>
                    </div>
					
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Off seasonal Tax</label>
                    </div>
					
					
					
					
                      
                      <?php
                      
                      $tax = $this->Hotelmodel->get_tax($result->id);
					  $off_tax = $this->Hotelmodel->get_tax_off($result->id);
						?>
                      <div class="form-group col-lg-12 remove_p_tax_block_cus ">
                      	
                      	    
							<?php
							 foreach($tax as $tax_data):
							 ?>
                      	  <input type="hidden" name="hotel_id[]" value="<?php echo $tax_data->id;?>" />
						     <div class="form-group col-lg-6  cus_p_r_4">
	                      	<div class="col-lg-6">  
	                      		 <input class="col-lg-12 form-control" name="seasonal[]" value="<?php echo $tax_data->tax_type;?>"> 
	                       </div>
	                       <div class="col-lg-6"> 
	                       	   <input class=" col-lg-12 form-control" name="seasonal_percent[]" value="<?php echo $tax_data->tax_amount;?>" onkeypress="return onlyNumbersDots(event)">
	                       	</div>
	                       
                       </div>
						   
							<?php
							endforeach;
							?>
							 
                      	   </div>
						   
				
                     
                  
				  
				  <div class="form-group col-lg-12 remove_p_tax_block_cus">
                      	
                      	   
							<?php
							 foreach($off_tax as $tax_off_data):
							 ?>
                      	   <input type="hidden" name="off_hotel_id[]" value="<?php echo $tax_off_data->id;?>" />
						     <div class="form-group col-lg-6  cus_p_r_4">
	                      	<div class="col-lg-6">  
	                      		 <input class="col-lg-12 form-control" name="off_seasonal[]" value="<?php echo $tax_off_data->tax_type;?>"> 
	                       </div>
	                       <div class="col-lg-6"> 
	                       	   <input class=" col-lg-12 form-control" name="off_seasonal_percent[]" value="<?php echo $tax_off_data->tax_amount;?>" onkeypress="return onlyNumbersDots(event)">
	                       	</div>
	                       
                       </div>
						   
							<?php
							endforeach;
							?>
							 
                      	   </div>
						   </div>
						   
                  
                     </div>
                     
                    <!-- <div class="form-group row">
                      <label class="col-lg-4">Check In</label>
                      <input class="col-lg-8 form-control " name="checkin" value="<?php echo $result->check_in;?>">
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4">Check Out</label>
                      <input class="col-lg-8 form-control " name="checkout" value="<?php echo $result->check_out;?>">
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-2" class="tab-pane fade in">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php echo $categoryname;?> Images</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="hotel_image_row img_listed_cus ">
                    <?php
					//$i=1;
					//foreach($result1 as $image)
					//{
				$image_count=count($result1);
                if($image_count==0){
						?>
				<div class="form-group col-lg-12">
                        <label class="col-lg-2">Image</label>
                        <input class="col-lg-6 form-control " type="file" name="hotel_image[]">
                     <div class="col-lg-2 text-right">
                          <button type="button" class="btn img_block_cus_btn  pull-right hotel_image_add">Add More Images</button>
                        </div>
                      </div>
					<?php }
				   else { ?>
				   	<input type="hidden" name="img_count" id="img_count" value="<?php echo $image_count;?>" />
				   	<div class="form-group row">
                        <label class="col-lg-6">Image</label>
                        
                        <div class="col-lg-6 text-right">
                          <button type="button" class="btn img_block_cus_btn btn-default pull-right hotel_image_add">Add More Images</button>
                        </div>
                      </div>                      <?php foreach($result1 as $images): ?>
                      
                      <a href="<?php echo base_url() . 'hotel/image_edit/' . $images->hotel_id . '/' . $images->id;?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=600,height=450,screenX=220,screenY=160,resizable,scrollbars');return false;" title="Zoom">	
	<img src="<?php echo base_url(). '../'.$images->thumb;?>" width='120' height='100' /> </a>
                      	
                      	<input type="file" id="fileLoader" name="hotel_image[]" title="Load File" style = "display:none;" />
						<!-- <input type="button" id="btnOpenFileDialog" style="background: url(<?php echo base_url(). '../'.$images->thumb_image;?>); width: 100px; height: 100px;" onclick="openfileDialog();" />
						  -->
						 
                      <?php endforeach;  }
                  ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div id="tabs-3">
        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Rooms</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="room_combination_row">
                     <?php
					$j=1;
					foreach($result2 as $room)
					{?>
                      <div class="form-group row">
                        <label class="col-lg-2">Room Combination</label>
                        <select class="col-lg-3 form-control" name="room_com_room[]">
                          <option value="1" <?php if($room->room_combination_id == 1){ ?> selected="selected"<?php }?>>Room 1</option>
                          <option value="2" <?php if($room->room_combination_id == 2){ ?> selected="selected"<?php }?>>Room 2</option>
                          <option value="3" <?php if($room->room_combination_id == 3){ ?> selected="selected"<?php }?>>Room 3</option>
                          <option value="4" <?php if($room->room_combination_id == 4){ ?> selected="selected"<?php }?>>Room 4</option>
                          <option value="5" <?php if($room->room_combination_id == 5){ ?> selected="selected"<?php }?>>Room 5</option>
                        </select>
                        <label class="col-lg-2">Count</label>
                        <select class="col-lg-3 form-control" name="room_com_count[]">
                          <option value="1" <?php if($room->room_count == 1){ ?> selected="selected"<?php }?>>1</option>
                          <option value="2" <?php if($room->room_count == 2){ ?> selected="selected"<?php }?>>2</option>
                          <option value="3" <?php if($room->room_count == 3){ ?> selected="selected"<?php }?>>3</option>
                          <option value="4" <?php if($room->room_count == 4){ ?> selected="selected"<?php }?>>4</option>
                          <option value="5" <?php if($room->room_count == 5){ ?> selected="selected"<?php }?>>5</option>
                        </select>
                        <div class="col-lg-2 text-right">
                        	  <?php if($j==1){?>
							  <button type="button" class="btn btn-success room_combination_add">Add</button>
                              <?php } else {?>
                              <button type="button" class="btn btn-success " onClick="room_combination_remove(this)">Remove</button>
                              <?php }?>
                          
                        </div>
                      </div>
                   <?php $j++;}
					?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div id="tabs-4" class="tab-pane fade in">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php echo $categoryname;?> Facilities</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                <div class="panel tab_chk_section">
                  	
                  	
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Bathroom</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input id="chk831" class="css-checkbox"  type="checkbox"  value="1" name="free_toiletries" <?php if($result3->free_toiletries == 1){ ?> checked="checked" <?php }?> >
                          <label class="css-label" for="chk831">Free toiletries </label></span>
                       <span class="radio-inline col-md-3">
                          <input id="chk832" class="css-checkbox" type="checkbox"  value="1" name="hairdryer" <?php if($result3->hairdryer == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk832">Hairdryer </label></span>
                       <span class="radio-inline col-md-3">
                          <input id="chk833" class="css-checkbox" type="checkbox"  value="1" name="bathroom" <?php if($result3->bathroom == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk833"> Bathroom </label></span>
                       <span class="radio-inline col-md-3">
                          <input id="chk834" class="css-checkbox" type="checkbox"  value="1" name="toilet" <?php if($result3->toilet == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label col-md-3" for="chk834">Toilet </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk835" class="css-checkbox" type="checkbox"  value="1" name="bath_shower" <?php if($result3->bath_shower == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk835">Bath or Shower </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk836" class="css-checkbox" type="checkbox"  value="1" name="slippers" <?php if($result3->slippers == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk836"> Slippers </label></span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk837" class="css-checkbox" type="checkbox"  value="1" name="towels" <?php if($result3->towels == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk837">Towels </label></span>
                       <span class="radio-inline col-md-3">
                          <input id="chk838" class="css-checkbox" type="checkbox"  value="1" name="linen" <?php if($result3->linen == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk838"> Linen </label></span>
                      </div>
                    </div>
                    
                    
                    
                    	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Bedroom</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline  col-md-3">
                          <input  id="chk839" class="css-checkbox"  type="checkbox"  value="1" name="wardrobe_closet"  >
                         <label class="css-label" for="chk839"> Wardrobe/Closet</label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>View</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline  col-md-3">
                          <input  id="chk840" class="css-checkbox" type="checkbox"  value="1" name="garden_view"  <?php if($result3->garden_view == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk840"> Garden view</label></span>
                        <span class="radio-inline col-md-3">

                          <input  id="chk841" class="css-checkbox" type="checkbox"  value="1" name="view"  <?php if($result3->view == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk841">View</label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Outdoors</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk842" class="css-checkbox"  type="checkbox"  value="1" name="free_outdoor_pool" <?php if($result3->free_outdoor_pool == 1){ ?> checked="checked" <?php }?> >
                         <label class="css-label" for="chk842"> Free! Outdoor pool </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk843" class="css-checkbox"  type="checkbox"  value="1" name="terrace"  <?php if($result3->terrace == 1){ ?> checked="checked" <?php }?>>
                        <label class="css-label" for="chk843">  Terrace </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk844" class="css-checkbox"  type="checkbox"  value="1" name="garden" <?php if($result3->garden == 1){ ?> checked="checked" <?php }?> >
                         <label class="css-label" for="chk844"> Garden </label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Kitchen</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input id="chk845" class="css-checkbox"   type="checkbox"  value="1" name="electric_kettle"  <?php if($result3->electric_kettle == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk845"> Electric kettle</label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Room Amenities</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk846" class="css-checkbox"  type="checkbox"  value="1" name="clothes_rack"  <?php if($result3->clothes_rack == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk846"> Clothes rack</label></span>
                      </div>
                    </div>
                   	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Activities</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input id="chk848" class="css-checkbox" type="checkbox"  value="1" name="free_fFitness_centre"  <?php if($result3->free_fFitness_centre == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk848"> Free! Fitness centre </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk849" class="css-checkbox" type="checkbox"  value="1" name="DJ" <?php if($result3->DJ == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk849"> Nightclub/DJ </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk852"  class="css-checkbox"type="checkbox"  value="1" name="evening_entertainment"  <?php if($result3->evening_entertainment == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk852">Evening entertainment </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk853" class="css-checkbox"  type="checkbox"  value="1" name="sauna"  <?php if($result3->sauna == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk853">Sauna </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk854" class="css-checkbox"  type="checkbox"  value="1" name="spa_wellness_centre"  <?php if($result3->spa_wellness_centre == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk854"> Spa and wellness centre </label></span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk855" class="css-checkbox"  type="checkbox"  value="1" name="massage"  <?php if($result3->massage == 1){ ?> checked="checked" <?php }?>>
                        <label class="css-label" for="chk855"> Massage</label></span>
                      </div>
                    </div>
                    
                  <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Living Area</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input id="chk900" class="css-checkbox" type="checkbox"  value="1" name="seating_area"  <?php if($result3->seating_area == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk900"> Seating Area </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk901" class="css-checkbox" type="checkbox"  value="1" name="desk"  <?php if($result3->desk == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk901"> Desk </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk902" class="css-checkbox" type="checkbox"  value="1" name="sofa"  <?php if($result3->sofa == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk902"> Sofa</label></span>
                      </div>
                    </div>
                    
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Media & Technology</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input id="chk903" class="css-checkbox" type="checkbox"  value="1" name="telephone"  <?php if($result3->telephone == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk903">Telephone </label></span>
                       <span class="radio-inline col-md-3">
                          <input id="chk904" class="css-checkbox" type="checkbox"  value="1" name="satellite_channels"  <?php if($result3->satellite_channels == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk904"> Satellite Channels</label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk905" class="css-checkbox" type="checkbox"  value="1" name="flat_screen_TV"  <?php if($result3->flat_screen_TV == 1){ ?> checked="checked" <?php }?>>
                        <label class="css-label" for="chk905">  Flat-screen TV </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk906" class="css-checkbox" type="checkbox"  value="1" name="cable_channels"  <?php if($result3->cable_channels == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk906"> Cable Channels </label></span>
                      </div>
                    </div>
                    
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Food & Drink</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input id="chk856" class="css-checkbox"  type="checkbox"  value="1" name="bar"  <?php if($result3->bar == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk856"> Bar </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk857" class="css-checkbox"  type="checkbox"  value="1" name="breakfast_in_the_room"  <?php if($result3->breakfast_in_the_room == 1){ ?> checked="checked" <?php }?>>
                        <label class="css-label" for="chk857">  Breakfast in the room </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk858"   type="checkbox"  type="checkbox"  value="1" name="restaurant"  <?php if($result3->restaurant == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk858"> Restaurant </label></span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk859"   type="checkbox"  type="checkbox"  value="1" name="snack_bar"  <?php if($result3->snack_bar == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk859"> Snack bar </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk860"  type="checkbox" type="checkbox"  value="1" name="special_diet_menus"  <?php if($result3->special_diet_menus == 1){ ?> checked="checked" <?php }?>>
                        <label class="css-label" for="chk860">  Special diet menus </label></span>
                      </div>
                    </div>
                    
                   	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Internet</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input id="chk861"    type="checkbox" type="checkbox"  value="1" name="free_wifi"  <?php if($result3->free_wifi == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk861"> Free! WiFi </label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Parking</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk862"   type="checkbox" type="checkbox"  value="1" name="free_parking"  <?php if($result3->free_parking == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk862">Free Parking </label></span>
                      </div>
                    </div>
                    
                   	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Services</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk863"   type="checkbox"  type="checkbox"  value="1" name="room_service"  <?php if($result3->room_service == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk863">Room service </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk864"   type="checkbox"  type="checkbox"  value="1" name="packed_lunches"  <?php if($result3->packed_lunches == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk864"> Packed lunches </label></span>
                      <span class="radio-inline col-md-3">
                          <input  id="chk865"   type="checkbox"  type="checkbox"  value="1" name="car_hire"  <?php if($result3->car_hire == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk865"> Car hire </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk866"   type="checkbox"  type="checkbox"  value="1" name="airport_sshuttle"  <?php if($result3->airport_sshuttle == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk866">Airport shuttle </label></span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk867"   type="checkbox"  type="checkbox"  value="1" name="hour_front_desk"  <?php if($result3->hour_front_desk == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk867"> 24-hour front desk </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk868"   type="checkbox"  type="checkbox"  value="1" name="currency_exchange"  <?php if($result3->currency_exchange == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk868"> Currency exchange </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk869"   type="checkbox"  type="checkbox"  value="1" name="ticket_service"  <?php if($result3->ticket_service == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk869"> Ticket service </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk870"   type="checkbox"  type="checkbox"  value="1" name="free_luggage_storage"  <?php if($result3->free_luggage_storage == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk870">Free! Luggage storage </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk871"   type="checkbox"  type="checkbox"  value="1" name="shared_lounge"  <?php if($result3->shared_lounge == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk871"> Shared lounge/TV area </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk872"   type="checkbox"  type="checkbox"  value="1" name="babysitting"  <?php if($result3->babysitting == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk872"> Babysitting/child services</label> </span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk873"   type="checkbox"  type="checkbox"  value="1" name="laundry" <?php if($result3->laundry == 1){ ?> checked="checked" <?php }?> >
                          <label class="css-label" for="chk873">Laundry </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk874"   type="checkbox"  type="checkbox"  value="1" name="dry_cleaning"  <?php if($result3->dry_cleaning == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk874">Dry cleaning </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk875"   type="checkbox"  type="checkbox"  value="1" name="ironing_service"  <?php if($result3->ironing_service == 1){ ?> checked="checked" <?php }?>>
                          <label class="css-label" for="chk875">Ironing service </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk876"   type="checkbox"  type="checkbox"  value="1" name="free_shoeshine"  <?php if($result3->free_shoeshine == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk876"> Free! Shoeshine </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk877"   type="checkbox"  type="checkbox"  value="1" name="trouser_press"  <?php if($result3->trouser_press == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk877"> Trouser press </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk878"   type="checkbox"  type="checkbox"  value="1" name="meeting"  <?php if($result3->meeting == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk878"> Meeting/banquet facilities </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk879"   type="checkbox"  type="checkbox"  value="1" name="free_business_centre"  <?php if($result3->free_business_centre == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk879"> Free! Business centre </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk880"   type="checkbox"  type="checkbox"  value="1" name="fax" <?php if($result3->fax == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk880"> Fax/photocopying</label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk881"   type="checkbox"  type="checkbox"  value="1" name="free_grocery_deliveries"  <?php if($result3->free_grocery_deliveries == 1){ ?> checked="checked" <?php }?>>
                         <label class="css-label" for="chk881"> Free! Grocery deliveries</label></span>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group admin_footer_btn_cus">
        <button type="submit" class="btn btn-success" name="submit" id="edit_hotel_submit">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </form>
  </div>
</div>
<!-- /.row --> 

