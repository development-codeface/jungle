 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">
<title> Booking Wings - Best Online Hotel Booking Website</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">
</head>

<body>
<?php $this->load->view('layout/header');?>

	
	
	
	
	<div id="page-wrapper">
	<?php $this->load->view('layout/menu');?>
		<div class="regi_prty_block">
			<div class="opac">
			<h2 class="img_title_abt">Register Your Property</h2>
			<p class="img_abt_content">If your property is not listed here, then it ain't being put up for transaction.</p>
		</div>
		</div>
	
		
		<div class="container">
			
			<div class=" col-md-12 about_us_block">
						
<h1>
<small>Travel Easy, Fast and Safe</small>
BOOKINGWINGS.COM
</h1>
			
List your property with us to make it visible globally. Get buyers, sellers and rentals on the go, making real estate services available at your fingertips. 
Property listings are free of cost and also come with perks like social media marketing and such other services which are exclusive with Booking wings.com.
 So why wait? List your property and grab the opportunity.
	
				</div>
			
			</div>
	
		
		
		
			<div class="img_block_abt_block2">
			<div class="container">
			
			
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
			
	      				
					
<form id="property_form" enctype="multipart/form-data" name="register_form" action="<?php echo base_url();?>register-your-property" method="post" novalidate="novalidate">

						
        	<div class="row">
        		<div class="col-md-12 ">
					
					<div class="col-md-12">
					<div class="form-group label_cus_f">
					<label>About Your Property</label>
					</div>
					</div>
        			<div class="col-md-6 ">
        			<div class="form-group">
					 		  
						<input type="text" placeholder="Name of the Hotel*" name="hotel_name" id="hotel_name"  class="form-control form_login">
						
					</div>
					</div>
						<div class="col-md-6 "><div class="form-group">
						<input type="text" placeholder="Address*" name="address" id="address"  class="form-control form_login">
						
					</div>
					</div>
					
					<div class="col-md-6 " style="display:none;">
        			<div class="form-group">
						<select class="form-control" name="country" id="country">
						 <?php foreach($country as $coun){?>
                           <option value="<?php echo $coun->location_id;?>"><?php echo $coun->name;?></option>
                          <?php }?>
						
					  </select>
					</div>
					</div>
						<div class="col-md-6 ">
        			<div class="form-group">
						<select class="form-control form_login states" name="state" id="state_name">
						<option value="">Select State*</option>
						 <?php foreach($state as $states){
						   	$query = $this->db->select('id')->where('state',$states->state)->get('tbl_locations');
							$res = $query->row();
							$id= $res->id;
						   	?>
                           <option value="<?php echo $id;?>"><?php echo $states->state;?></option>
                          <?php }?>
						
					  </select>
					</div>
					</div>
					
					<div class="col-md-6 ">
        			<div class="form-group">
						
				<select class="form-control form_login district" name="state_name" id="district">
						<option value="">Select District*</option>
						
					  </select>
						
					</div>
					</div>
						<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Place*" name="place" id="place"  class="form-control form_login">
						
					</div>
					</div>
					
						
						
							<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Mobile No*" name="phone" id="phone"  class="form-control form_login">
						
					</div>
					</div>
							<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Telephone No" name="telephone_hotel"  class="form-control">
						
					</div>
					</div>
							<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Email Id*" name="mailid" id="mailid"  class="form-control form_login">
						
					</div>
					</div>
					
						<div class="col-md-6 ">
        			<div class="form-group">
					<input type="hidden" placeholder="" name="category" value="1"  class="form-control form_login">
						<select class="form-control form_login" name="sub_category" id="sub_catagory">
						<option value="">Select Category</option>
						<option value="8">Hotel</option>
						<option value="2">Resort</option>
						<option value="4">Apartment</option>
						<option value="3">Home Stay</option>
						
					  </select>
						
					</div>
					</div>
							<div class="col-md-6 ">
        			<div class="form-group">
						
						<select class="form-control form_login" name="star_rating" id="star_rating">
						<option value="">Select Star Rating</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					  </select>
					</div>
					</div>
						

			<div class="col-md-6 file_up">
        			<div class="form-group">
					 <label class="h_img">Logo</label> 
						 <input type="file" name="logo_img" id="upload_logo"  class="form_login form_login">
						
					</div>
					</div>
							<div class="col-md-6 file_up">
        			<div class="form-group">
					  <label class="h_img">Hotel Images</label> 
						 <input type="file" name="hotel_image[]" id="hotel_image" multiple>
						
					</div>
					</div>						
					<div class="col-md-6 "><div class="form-group">
					</div>
					</div>
					
					
					
									<div class="col-md-12 ">
        			<div class="form-group">
					
						 <textarea class="form-control" name="desc" placeholder="Hotel Description" rows="5" id="des"></textarea>
					</div>
					</div>
					
					
					
					
					
					
					
					
					
						<div class="col-lg-12 seasonal_tax_block" style="display: none;">
					
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Seasonal Tax </label>
                    </div>
					
					<div class="form-group col-lg-6">
                      <label class="col-lg-12">Off seasonal Tax</label>
                    </div>
					
					
                    <div class="tax_block col-md-12  tax_block_cus_block">
                 	
                      <div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="seasonal[]" value="Service tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	    
                      	  <input class="col-lg-12 form-control" name="seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
								  
								   <div class="form-group col-lg-3">
                       
                      <input class="col-lg-12 form-control" name="off_seasonal[]" value="Service tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	   
                      	  <input class="col-lg-12 form-control" name="off_seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
                     
                     </div>
					 
					 
					  <div class="tax_block col-md-12  tax_block_cus_block">
                 	
                      <div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="seasonal[]" value="Luxury tax" >
                      </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	  <input class="col-lg-12 form-control" name="seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
								  
					<div class="form-group col-lg-3">
                      <input class="col-lg-12 form-control" name="off_seasonal[]" value="Luxury tax" >
                     </div>
                    
                      
                      <div class="form-group col-lg-3">
                      	  <input class="col-lg-12 form-control" name="off_seasonal_percent[]" onkeypress="return onlyNumbersDots(event)">
                      </div>
                                  
                     
                     </div>
					 
					    </div>
						
						
						
					<!---<div class="col-md-12">
					<div class="form-group label_cus_f">
					<label>Contact Information</label>
					</div>
					</div>
					<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Your Name*" name="your_name"  class="form-control">
						
					</div>
					</div>
						<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Designation*" name="designation*"  class="form-control">
						
					</div>
					</div>
							<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Telephone No." name="telephone"  class="form-control">
						
					</div>
					</div>
								<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Mobile No." name="mobile"  class="form-control">
						
					</div>
					</div>
					
									<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="Fax No." name="fax"  class="form-control">
						
					</div>
					</div>
						<div class="col-md-6 ">
        			<div class="form-group">
						<input type="text" placeholder="E-mail*" name="email"  class="form-control">
						
					</div>
					</div>
					
						<div class="col-md-12">
					<div class="form-group label_cus_f">
					<label>Upload Hotel Images <span>(size < 500KB gif/ jpeg/ png)</span></label>
					</div>
					</div>--->
							
					<div class="form-group clr_f">
					<div class="col-md-12 ">
						<button id="register" name="submit" class="btn btn-primary col-md-2" type="submit"> Submit </button>  
					</div>
					</div>
					
				</div>

		  	</div>
		  	</form>
		</div>
		</div>
		
		

	</div>
		
	<?php $this -> load -> view('layout/footer'); ?>



	
	
	

</body>

	
  <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>





<script type="text/javascript">//<![CDATA[
$(window).load(function(){
$(document).ready(function () {
    $('.btn').data("expanded",false);
    $(".btn").click(function () {
        var val = $(this).data('expanded');
        $(this).data('expanded', !val);
        $('p', this).html(val ? "Read More" : "Read Less ");
        $(".more",$(this).closest('.container')).animate({
            height: val ? '90' : "300"
        });
    });
});
});//]]> 

</script>









</html> 