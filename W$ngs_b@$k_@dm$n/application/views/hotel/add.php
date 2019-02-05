<?php $this->load->view('hotel/side_menu');

$cat = $this->uri->segment(3);
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

<div id="page-wrapper" class="add_room wrapper_admin_cus_block" >
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New <?php echo $categoryname;?> </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>hotel">Dashboard</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i> --> <?php echo $categoryname;?>  </li>
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
    <form role="form" enctype="multipart/form-data" action="" method="post" class="cus_admin_form">
    	
    	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Basic</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Images</a></li>
        <li><a data-toggle="tab" href="#tabs-4">Facilities </a></li>
	</ul>
		
	
  
    <div  class="tab-content">

      <div id="tabs-1" class="tab-pane fade in active">
      	
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary cus_panel panel_primary_block_form">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus"></i> <?php echo $categoryname;?> </h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Name</label>
                      <input class="col-lg-12 form-control " name="title" id="title" >
                    </div>
                      <div class="form-group col-lg-6">
                      <label class="col-lg-12">Star Rating</label>
                      <select class="col-lg-12 form-control" name="star_rating" id="star_rating">
                           <option value="">--Select--</option>
                           <option value="0">Individual</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>

                      </select>
            
                    </div>    
                    
                        <div class="form-group col-lg-6">
                      <label class="col-lg-12">Groups</label>
                      <select class="col-lg-12 form-control" name="group_id" id="group_id">
                           <option value="">--Select--</option>
                           <?php foreach($groups as $group_name)
						   {
							   ?>
							   <option value="<?php echo $group_name->id;?>"><?php echo $group_name->name;?></option>
							   <?php
						   }
							?>
						</select>
            
                    </div>   
                   
					 <div class="form-group col-lg-12">
                     <span style="color : red;">Logo size - 200 x 100 (Width x Height)</span>
                    </div>
					
  
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Logo</label>
                      <input class="col-lg-12  " name="logo_img" id="upload_logo"  type="file">
                    </div>
                        
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Country</label>
                      <select class="col-lg-12 form-control " name="country" id="country">
                       <?php foreach($country as $coun){?>
                           <option value="<?php echo $coun->location_id;?>"><?php echo $coun->name;?></option>
                          <?php }?>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                      <label  class="col-lg-12">Address</label>
                      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                      <textarea  class="ckeditor " rows="" name="address" id="address"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label  class="col-lg-12">Description</label>
                      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                      <textarea  class="ckeditor " rows="" name="desc" id="desc"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Destination</label>
                      <input class="col-lg-12 form-control " name="destination" id="destination">
                    </div>
              
                      <div class="form-group col-lg-6">
                      <label class="col-lg-12">State</label>
                      <select class="col-lg-12 form-control states" name="states" id="state">
                      	<option value="0">---Select----</option>
						   <?php foreach($state as $states){
						   	$query = $this->db->select('id')->where('state',$states->state)->get('tbl_locations');
							$res = $query->row();
							$id= $res->id;
						   	?>
                           <option value="<?php echo $id;?>"><?php echo $states->state;?></option>
                          <?php }?>
                      </select>
                      <input class="col-lg-8 form-control " type="hidden" name="state_hidden" id="state_hidden" value="">
                    </div>
                    
                      <div class="form-group col-lg-6">
                      <label class="col-lg-12">District</label>
                      <select class="col-lg-12 form-control district" name="state" id="district">
                      	<option value="0">---Select----</option>
						   
                          
                         
                      </select>
                      <input class="col-lg-8 form-control " type="hidden" name="state_hidden" id="state_hidden" value="">
                    </div>
                    
                    
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Place</label>
                      <input class="col-lg-12 form-control " name="place" id="place">
                    </div>
                    
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Category</label>
                      <select class="col-lg-12 form-control" name="catagory" id="catagory">
                      	<option value="1">Hotels</option>
                      	 
                      <?php //foreach($Catagory as $cat){?>
                       <!-- <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option> -->
                      <?php //} ?>
                      </select>
                    </div>
                    
                     <div class="form-group col-lg-6">
                      <label class="col-lg-12 subcatagorylable">Sub Category</label>
                      <select class="col-lg-12 form-control " name="sub_catagory" id="sub_catagory">
                        <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                      </select>
                       <input class="col-lg-8 form-control " type="hidden" name="sub_catagory_hidden" id="sub_catagory_hidden" value="">
                    </div>
                    
                    
                    <div class="form-group col-lg-6" style="display:none;">
                      <label class="col-lg-12">Facebook Link</label>
                      <input class="col-lg-12 form-control " name="fb" id="fb" value="www.facebook.com">
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Mail ID</label>
                      <input class="col-lg-12 form-control " name="mailid" id="email" onblur="ValidateEmail(this.value)">
                      <div class="text-center m-t m-b"><small><?php echo form_error('email');?></small></div>
                              <span class="msg error" id="msg">Not a valid email address</span>
                             <span class="msg success" id="msg1">A valid email address!</span>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="col-lg-12">Phone</label>
                      <input class="col-lg-12 form-control " name="phone" id="phone" onkeypress="return isNumber(event)">
                    </div>
                    
					
					<div class="col-lg-12 seasonal_tax_block">
					
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Seasonal Tax </label>
                    </div>
					
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Off seasonal Tax</label>
                    </div>
					
					
                    <div class="tax_block col-md-12  tax_block_cus_block">
                 	
                      <div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="seasonal[]" readonly="" value="Service tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	    
                      	  <input class="col-lg-12 form-control" name="seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
								  
								   <div class="form-group col-lg-3">
                       
                      <input class="col-lg-12 form-control" name="off_seasonal[]" readonly="" value="Service tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	   
                      	  <input class="col-lg-12 form-control" name="off_seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
                     
                     </div>
					 
					 
					  <div class="tax_block col-md-12  tax_block_cus_block">
                 	
                      <div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="seasonal[]"  readonly="" value="Luxury tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	  <input class="col-lg-12 form-control" name="seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
								  
					<div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="off_seasonal[]" readonly="" value="Luxury tax" >
                     </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	  <input class="col-lg-12 form-control" name="off_seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
                     
                     </div>
					 
					    </div>
					 

                    
                    <!-- <div class="form-group row">
                      <label class="col-lg-4">Check In</label>
                      <input class="col-lg-8 form-control " name="checkin">
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4">Check Out</label>
                      <input class="col-lg-8 form-control " name="checkout">
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
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php echo $categoryname;?>  Images</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                    <div class="hotel_image_row"><span style="color : red;">Image size - 800x 450(Width x Height) & 500KB</span>
                      <div class="form-group col-lg-12  img_block_tab_cus">
                        <label class="col-lg-3">Image</label>
                        
                        <button type="button" class="btn img_block_cus_btn pull-right hotel_image_add">Add More Images</button>
                        
                        </div>
                        <div class="form-group col-lg-12  upload_new_img_cus_block">
                        <input class="col-lg-5  " type="file" name="hotel_image[]" id="hotel_image">
                          </div>
                        
                         <div class="col-lg-1 "></div>
                         <div class="col-lg-2 text-right">
							
						
                      </div>
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
                      <div class="form-group row">
                        <label class="col-lg-2">Room Combination</label>
                        <select class="col-lg-3 form-control" name="room_com_room[]">
                          <option value="1">Room 1</option>
                          <option value="2">Room 2</option>
                          <option value="3">Room 3</option>
                          <option value="4">Room 4</option>
                          <option value="5">Room 5</option>
                        </select>
                        <label class="col-lg-2">Count</label>
                        <select class="col-lg-3 form-control" name="room_com_count[]">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-success room_combination_add">Add</button>
                        </div>
                      </div>
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
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php echo $categoryname;?>  Facilities</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel tab_chk_section">
                  	
                  	

                  	
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Bathroom</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                  			
                        <span class="radio-inline col-md-3">
                          <input  id="chk831" class="css-checkbox" type="checkbox"  value="1" name="free_toiletries" >
                         <label class="css-label" for="chk831">  Free toiletries </label></span>
                          
                        <span class="radio-inline col-md-3">
                          <input id="chk832" class="css-checkbox" type="checkbox"  value="1" name="hairdryer" >
                           <label class="css-label" for="chk832"> Hairdryer </label></span>
                        <span class="radio-inline col-md-3" >
                          <input id="chk833" class="css-checkbox" type="checkbox"  value="1" name="bathroom" >
                          <label class="css-label" for="chk833">  Bathroom </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk834" class="css-checkbox" type="checkbox"  value="1" name="toilet" >
                          <label class="css-label" for="chk834">  Toilet</label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk835" class="css-checkbox" type="checkbox"  value="1" name="bath_shower">
                          <label class="css-label" for="chk835">  Bath or Shower </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk836" class="css-checkbox" type="checkbox"  value="1" name="slippers" >
                          <label class="css-label" for="chk836">  Slippers</label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk837" class="css-checkbox" type="checkbox"  value="1" name="towels" >
                          <label class="css-label" for="chk837">  Towels </label></span>
                        <span class="radio-inline col-md-3">
                          <input id="chk838" class="css-checkbox" type="checkbox"  value="1" name="linen" >
                          <label class="css-label" for="chk838">  Linen </label></span>
                      </div>
                    </div>
                    
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Bedroom</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input  id="chk839" class="css-checkbox"  type="checkbox"  value="1" name="wardrobe_closet" >
                          <label class="css-label" for="chk839">  Wardrobe/Closet</label></span>
                      </div>
                    </div>
                    
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>View</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input  id="chk840" class="css-checkbox"  type="checkbox"  value="1" name="garden_view" >
                          <label class="css-label" for="chk840">  Garden view</label></span>
                       <span class="radio-inline">
                          <input  id="chk841" class="css-checkbox"  type="checkbox"  value="1" name="view" >
                          <label class="css-label" for="chk841">  View</label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Outdoors</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                    <span class="radio-inline col-md-3">
                          <input  id="chk842" class="css-checkbox"  type="checkbox"  value="1" name="free_outdoor_pool" >
                          <label class="css-label" for="chk842">  Free! Outdoor pool </label></span>
                        <span class="radio-inline">
                          <input  id="chk843" class="css-checkbox"  type="checkbox"  value="1" name="terrace" >
                          <label class="css-label" for="chk843">  Terrace </label></span>
                        <span class="radio-inline">
                          <input  id="chk844" class="css-checkbox"  type="checkbox"  value="1" name="garden" >
                         <label class="css-label" for="chk844">   Garden </label></span>
                      </div>
                    </div>
                    
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Kitchen</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                      <span class="radio-inline col-md-3">
                          <input  id="chk845" class="css-checkbox"  type="checkbox"  value="1" name="electric_kettle" >
                          <label class="css-label" for="chk845">  Electric kettle</label></span>
                      </div>
                    </div>
                    
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Room Amenities</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input  id="chk846" class="css-checkbox"  type="checkbox"  value="1" name="clothes_rack" >
                          <label class="css-label" for="chk846">  Clothes rack</label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Activities</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk848" class="css-checkbox"  type="checkbox"  value="1" name="free_fFitness_centre" >
                         <label class="css-label" for="chk848">  Free! Fitness centre </label></span>
                         <span class="radio-inline col-md-3">
                          <input  id="chk849" class="css-checkbox"  type="checkbox"  value="1" name="DJ" >
                           <label class="css-label" for="chk849">Nightclub/DJ </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk852" class="css-checkbox"  type="checkbox"  value="1" name="evening_entertainment" >
                          <label class="css-label" for="chk852"> Evening entertainment </label></span>
                         <span class="radio-inline col-md-3">
                          <input  id="chk853" class="css-checkbox"  type="checkbox"  value="1" name="sauna" >
                          <label class="css-label" for="chk853"> Sauna </label></span>
                         <span class="radio-inline col-md-3">
                          <input  id="chk854" class="css-checkbox"  type="checkbox"  value="1" name="spa_wellness_centre" >
                          <label class="css-label" for="chk854"> Spa and wellness centre </label></span>
                          <span class="radio-inline col-md-3">
                          <input  id="chk855" class="css-checkbox"  type="checkbox"  value="1" name="massage" >
                         <label class="css-label" for="chk855">  Massage </label></span>
                      </div>
                    </div>
                    
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Living Area</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                       <span class="radio-inline col-md-3">
                          <input  id="chk900" class="css-checkbox"   type="checkbox"  value="1" name="seating_area" >
                          <label class="css-label" for="chk900">Seating Area </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk901" class="css-checkbox"  type="checkbox"  value="1" name="desk" >
                         <label class="css-label" for="chk901"> Desk  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk902" class="css-checkbox"  type="checkbox"  value="1" name="sofa" >
                         <label class="css-label" for="chk902"> Sofa </label></span>
                      </div>
                    </div>
                   <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Media & Technology</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk903" class="css-checkbox"   type="checkbox"  value="1" name="telephone" >
                         <label class="css-label" for="chk903"> Telephone  </label></span>
                      <span class="radio-inline col-md-3">
                          <input   id="chk904" class="css-checkbox"  type="checkbox"  value="1" name="satellite_channels" >
                        <label class="css-label" for="chk904">  Satellite Channels  </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk905" class="css-checkbox"   type="checkbox"  value="1" name="flat_screen_TV" >
                             <label class="css-label" for="chk905"> Flat-screen TV  </label></span>
                       <span class="radio-inline col-md-3">
                          <input   id="chk906" class="css-checkbox"  type="checkbox"  value="1" name="cable_channels" >
                          <label class="css-label" for="chk906">Cable Channels</span>
                      </div>
                    </div>
                    	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Food & Drink</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                         <span class="radio-inline col-md-3">
                          <input  id="chk856" class="css-checkbox"   type="checkbox"  value="1" name="bar" >
                         <label class="css-label" for="chk856"> Bar  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk857" class="css-checkbox"  type="checkbox"  value="1" name="breakfast_in_the_room" >
                         <label class="css-label" for="chk857"> Breakfast in the room  </label></span>
                       <span class="radio-inline col-md-3">
                          <input   id="chk858"   type="checkbox"  value="1" name="restaurant" class="services css-checkbox">
                        <label class="css-label" for="chk858">  Restaurant  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk859"   type="checkbox"  value="1" name="snack_bar" class="services css-checkbox">
                        <label class="css-label" for="chk859">  Snack bar </label></span>
                       <span class="radio-inline col-md-3">
                          <input   id="chk860"  type="checkbox"  value="1" name="special_diet_menus" class="services css-checkbox">
                       <label class="css-label" for="chk860">   Special diet menus </label></span>
                      </div>
                    </div>
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac" >
                  		<h4>Internet</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                         <span class="radio-inline col-md-3">
                          <input  id="chk861"    type="checkbox"  value="1" name="free_wifi" class="services css-checkbox">
                          <label class="css-label" for="chk861">  Free! WiFi </label></span>
                      </div>
                    </div>
                    	<div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Parking</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                        <span class="radio-inline col-md-3">
                          <input  id="chk862"   type="checkbox"  value="1" name="free_parking" class="services css-checkbox">
                         <label class="css-label" for="chk862"> Free Parking  </label></span>
                      </div>
                    </div>
                    <div class="container-fluid no_padding_l no_padding_r hotel_fac">
                  		<h4>Services</h4>
                  		<div class="col-lg-12 no_padding_l no_padding_r">
                         <span class="radio-inline col-md-3">
                          <input   id="chk863"   type="checkbox"  value="1" name="room_service" class="services css-checkbox">
                          <label class="css-label" for="chk863">Room service  </label></span>
                     <span class="radio-inline col-md-3">
                          <input   id="chk864" css-checkbox  type="checkbox"  value="1" name="packed_lunches" class="services css-checkbox">
                         <label class="css-label" for="chk864"> Packed lunches  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk865"   type="checkbox"  value="1" name="car_hire" class="services css-checkbox">
                         <label class="css-label" for="chk865"> Car hire  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk866"   type="checkbox"  value="1" name="airport_sshuttle" class="services css-checkbox">
                        <label class="css-label" for="chk866">  Airport shuttle  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk867"   type="checkbox"  value="1" name="hour_front_desk" class="services css-checkbox">
                         <label class="css-label" for="chk867"> 24-hour front desk  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk868"   type="checkbox"  value="1" name="currency_exchange" class="services css-checkbox">
                        <label class="css-label" for="chk868">  Currency exchange  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk869"   type="checkbox"  value="1" name="ticket_service" class="services css-checkbox">
                          <label class="css-label" for="chk869">Ticket service  </label></span>
                       <span class="radio-inline col-md-3">
                          <input   id="chk870"  type="checkbox"  value="1" name="free_luggage_storage" class="services css-checkbox">
                         <label class="css-label" for="chk870"> Free! Luggage storage </label></span>
                       <span class="radio-inline col-md-3">
                          <input  id="chk871"    type="checkbox"  value="1" name="shared_lounge" class="services css-checkbox">
                         <label class="css-label" for="chk871"> Shared lounge/TV area </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk872"  type="checkbox"  value="1" name="babysitting" class="services css-checkbox">
                         <label class="css-label" for="chk872"> Babysitting/child services </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk873"   type="checkbox"  value="1" name="laundry" class="services css-checkbox">
                         <label class="css-label" for="chk873"> Laundry  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk874"   type="checkbox"  value="1" name="dry_cleaning" class="services css-checkbox">
                         <label class="css-label" for="chk874"> Dry cleaning  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk875"   type="checkbox"  value="1" name="ironing_service" class="services css-checkbox">
                         <label class="css-label" for="chk875"> Ironing service </label></span>
                      <span class="radio-inline col-md-3">
                          <input   id="chk876"   type="checkbox"  value="1" name="free_shoeshine" class="services css-checkbox">
                        <label class="css-label" for="chk876">  Free! Shoeshine </label></span>
                        <span class="radio-inline col-md-3">
                          <input  id="chk877"   type="checkbox"  value="1" name="trouser_press" class="services css-checkbox">
                          <label class="css-label" for="chk877">   Trouser press  </label></span>
                        <span class="radio-inline col-md-3">
                          <input   id="chk878"   type="checkbox"  value="1" name="meeting" class="services css-checkbox">
                         <label class="css-label" for="chk878"> Meeting/banquet facilities </label></span>
                       <span class="radio-inline col-md-3">
                          <input   id="chk879"   type="checkbox"  value="1" name="free_business_centre" class="services css-checkbox">
                          <label class="css-label" for="chk879">Free! Business centre  </label></span>
                      <span class="radio-inline col-md-3">
                          <input   id="chk880"  type="checkbox"  value="1" name="fax" class="services css-checkbox">
                          <label class="css-label" for="chk880">Fax/photocopying </label></span>
                      <span class="radio-inline col-md-3">
                          <input   id="chk881"   type="checkbox"  value="1" name="free_grocery_deliveries" class="services css-checkbox">
                          <label class="css-label" for="chk881">Free! Grocery deliveries </label></span>
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
        <button type="submit" class="btn btn-success" name="submit" id="add_hotel_submit">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </form>
  </div>
</div>
<!-- /.row --> 

