<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Reservation</h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard"> Dashboard</a> </li>
          <li> <!-- <i class="fa fa-table"></i>  --><a href="<?php echo base_url();?>offline/roomchart"> Room Chart</a> </li>
          <li class="active"> <!-- <i class="fa fa-edit"></i> --> Reservation</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>                           



        <div class="row">
          <div class="col-lg-12 ">
                  
                   <?php
				  if($this->session->flashdata('success'))
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
				  
<?php
				  if($this->session->flashdata('error'))
				  {?>
				    <div class="row">
				    	<div class="col-lg-12">
				    		<div class="alert alert-danger alert-dismissable">
				    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    			<?php echo $this->session->flashdata('error');?>
				    		</div>
				    	</div>
				    </div>
				   <?php
				  }?>

            <div class="panel panel-primary">
            
              
              <div class="panel-heading  cus_panel_heading">
               <i class="fa fa-clock-o fa-fw"></i> Reservation
              </div>
              
              <div class="panel-body  rooms_list_block_table">
                <div class="list-group tab_main_content_cus tab_main_content_cus_add_block">

                    <form role="form" method="post" id="offline">
                    	<div class="cus_border2 col-md-12">
                    	
                    	<div class="form-group col-lg-4">
                        <label class="col-lg-12">Check-in</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control" value="<?php echo set_value('check_in'); ?>" name="check_in" id="check_in" onchange="offline_room_check();">
                        </span>
                        <?php echo form_error('check_in'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12">Check-out</label>
                        <span id="sandbox-container4">
                        <input class="col-lg-8 form-control" value="<?php echo set_value('check_out'); ?>" name="check_out" id="check_out" onchange="offline_room_check();">
                        </span>
                        <?php echo form_error('check_out'); ?>
                      </div>
					  
					  
					  
					      <div class="form-group col-lg-4">
                        <label class="col-lg-6">Type</label>
                        <select class="col-lg-6 form-control" name="type" id="type" onchange="set_category();">
						
                         <optgroup label="Direct booking">
                        	<option value="0" selected>Direct</option>
							  </optgroup>
							  <optgroup label="Agencies">
                        
                        	
                        	<?php
                        	foreach ($agency as $tbl_agency) {?>
							
							<option value="<?php echo $tbl_agency->id; ?>"><?php echo $tbl_agency->agency; ?></option>
								
							<?php
							}
                        	?>
                        	 </optgroup>
                        </select>
                      </div>
					  
					  
					  
					   
                    
                     <!--- <div class="form-group col-lg-4">
                        <label class="col-lg-6">Type</label>
                     <!--   <select class="col-lg-6 form-control" name="type" id="type" onchange="set_category();">-->
						<!-- <select class="col-lg-6 form-control" name="type" id="type" onchange="set_category();" >
                        	<option value="0" selected>Direct</option>
                        	
                        	<?php
                        	foreach ($agency as $tbl_agency) {?>
							
							<option value="<?php echo $tbl_agency->id; ?>"><?php echo $tbl_agency->agency; ?></option>
								
							<?php
							}
                        	?>
                        	
                        </select>
                        <?php echo form_error('gender'); ?>
                      </div>--->
                      
                      <div class="form-group col-lg-4" id="off_type">
					   <!-- <input type="hidden" name="category" value="hotel"/>--->
						<label style="display: none" id="date_error" class="err">Check-out date should be greater than Check-in</label>
						<label class="col-lg-12">Category</label>
						<ul class="delrom_cus">
						<li><input type="radio" value="hotel" onchange="category_set();" name="category" checked/> Hotel</li>
						<li><input type="radio" value="package" onchange="category_set();" name="category" /> Package</li>
						</ul>
						
                        </div>
                      
                      <div class="form-group col-lg-4" id="package">
					  <input type="hidden" name="package" value=""/>
                        </div>
                   
                       <div class="form-group col-lg-12" id="room_available">
                   
                        </div>
                      
					  
					  
					  
					
						
                      <div class="form-group col-lg-6">
                        <label class="col-lg-6">First Name</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('f_name'); ?>" name="f_name" id="f_name">
                        <?php echo form_error('f_name'); ?>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-6">Last Name</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('l_name'); ?>" name="l_name" id="l_name">
                        <?php echo form_error('l_name'); ?>
                      </div>
                      
                      <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Address</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea class="ckeditor" name="address"><?php echo set_value('address'); ?></textarea>
                      	</div>
                      	<?php echo form_error('address'); ?>
                       </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">Pincode</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('pin'); ?>" name="pin" id="pin" onkeypress="return onlyNumbers(event)" placeholder="Numbers only">
                        <?php echo form_error('pin'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">Gender</label>
                        <select class="col-lg-6 form-control" name="gender" id="gender">
                        	<option value="">--Select--</option>
                        	<option value="female">Female</option>
                        	<option value="male">Male</option>
                        </select>
                        <?php echo form_error('gender'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">E-mail</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('email'); ?>" name="email" id="email">
                        <?php echo form_error('email'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">Contact No.</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('phone'); ?>" name="phone" id="phone">
                        <?php echo form_error('phone'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">City</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('city'); ?>" name="city" id="city">
                        <?php echo form_error('city'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">State</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('state'); ?>" name="state" id="state">
                        <?php echo form_error('state'); ?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-6">Country</label>
                        <input class="col-lg-6 form-control" value="<?php echo set_value('country'); ?>" name="country" id="country">
                        <?php echo form_error('country'); ?>
                      </div>
                      
                      
                    <!---	  <div class="form-group col-lg-4">
                      <label class="col-lg-12">No. of kids</label>
                        <input class="col-lg-8 form-control" value="<?php echo set_value('kids'); ?>" name="kids" id="kids" onkeypress="return onlyNumbers(event)" placeholder="Numbers only">
                        <?php echo form_error('kids'); ?>
                      </div>-->
                      
                      
                      
                      <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Billing instructions</label>
                        <input class="col-lg-8 form-control" value="<?php echo set_value('bill_ins'); ?>" name="bill_ins" id="bill_ins">
                      </div>
					  
					  
                      <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Total</label>
                        <input class="col-lg-8 form-control" value="" name="total" id="total" readonly="">
                        <input type="hidden" id="total_hid">
                      </div>
					  
					     <div class="form-group col-lg-4" id="agency_commision">
                      	<label class="col-lg-12">Agency Commision</label>
                        <input class="col-lg-8 form-control" value="" name="agency" id="agency" readonly="">
                      </div>
					  
					  
					    <div class="form-group col-lg-4" id="offline_tax">
                      	<label class="col-lg-12">Tax</label>
                        <input class="col-lg-8 form-control" value="" name="tax" id="tax" readonly="">
                      </div>
					  
					   
				
					  
					   <div class="form-group col-lg-4" id="offline_discount">
                      	<label class="col-lg-12">Discount</label>
                        <input onchange="discount_amount();" class="col-lg-8 form-control" value="" name="discount" id="discount" disabled="" onkeypress="return onlyNumbers(event)" placeholder="Numbers only">
                        <input type="hidden" name="hid_discount" id="hid_discount" />
                      </div>
                      
					    <div class="form-group col-lg-4" id="agency_voucher">
							<label class="col-lg-12">voucher Number</label>
                        <input class="col-lg-8 form-control" value="<?php echo set_value('voucher'); ?>" name="voucher" id="voucher">
                      </div>
                        
						 <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Net Amount</label>
                        <input class="col-lg-8 form-control" value="" name="net_amount" id="net_amount" readonly="" placeholder="Numbers only">
                       
                      </div>
					  
						  <div class="form-group col-lg-4">
                      	<label class="col-lg-12">Payment</label>
                        <input class="col-lg-8 form-control" value="" name="payment" id="payment" onkeypress="return onlyNumbers(event)" placeholder="Numbers only">
                      
                      </div>
					  
                       </div>
                      
                      <div class="form-group ">
                      	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="offline_sub" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                        </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
     
              </div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row --> 

