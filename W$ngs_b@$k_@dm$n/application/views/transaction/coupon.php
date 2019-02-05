<?php $this->load->view('transaction/side_menu');?>

 <div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generate Coupon
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>transaction">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="<?php echo base_url();?>transaction/coupon_index">Coupons</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Generate
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="panel panel-primary panel_primary_travels_cus ">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-plus"></i> Coupon</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <div class="col-md-12">
                                   	<div class="panel">
									<?php if($this->session->flashdata('msg')) { ?>
                                   	<div class="alert alert-success "><?php echo $this->session->flashdata('msg'); ?></div>
									<?php } ?>
									
									<?php if($this->session->flashdata('msg_err')) { ?>
                                   	<div class="alert alert-danger"><?php echo $this->session->flashdata('msg_err'); ?></div>
									<?php } ?>
					
                                   		<form method="post" action="">
												
												<div class="form_group_block2_cus_commision">
												
				                            <div class="form-group col-md-6">
				                                <label class="col-lg-12">Valid from</label>	
				                                <span id="sandbox-container-frm3">
									<input autocomplete="off" value="<?php echo set_value('valid_from'); ?>" class="form-control col-lg-12" name="valid_from" id="valid_from">
				                                  <?php echo form_error('valid_from');?>
								</span></div>
				                              <div class="form-group col-md-6">
				                                <label class="col-lg-12">Valid to</label><span id="sandbox-container-to3">
									<input autocomplete="off" value="<?php echo set_value('valid_to'); ?>" class="form-control col-lg-12" name="valid_to" id="valid_to">
				                                  <?php echo form_error('valid_to');?>
								</span></div>
												
				                            <div class="form-group col-md-6">
				                                <label class="col-lg-12">Coupon Code</label>
				                                 <input autocomplete="off" class="form-control col-lg-12" name="c_code" id="c_code" type="text" value="<?php echo $cp; ?>">
				                                  <?php echo form_error('c_code');?>
				                            </div>
				                              <div class="form-group col-md-6">
				                                <label class="col-lg-12">Offer</label>
				                                 <input autocomplete="off" onkeypress="return onlyNumbers(event)" value="<?php echo set_value('offer'); ?>" placeholder="offer in %" class="form-control col-lg-12" name="offer" id="offer" type="text">
				                                  <?php echo form_error('offer');?>
				                            </div>
				                              <div class="form-group col-md-6">
				                                <label class="col-lg-12">Validity Type</label>
				                                 <select class="form-control col-lg-12" name="type" id="type">
												 <option value="">-Select-</option>
												 <option value="0">check-in/out date</option>
												 <option value="1">booking date</option>
												 </select>
				                                  <?php echo form_error('type');?>
				                            </div>
				                              <div class="form-group col-md-6">
				                                <label class="col-lg-12">Min. amount</label>
				                                 <input autocomplete="off" onkeypress="return onlyNumbers(event)" value="<?php echo set_value('min_amount'); ?>" class="form-control col-lg-12" name="min_amount" id="min_amount" type="text">
				                                  <?php echo form_error('min_amount');?>
				                            </div>
				                             </div>
				                            		
				                            <div class="form_group_block3_cus_commision">			
											<div class="form-group col-md-12">
												<button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
											</div>
				
				                        </form>
				                       
                                   	</div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                  
                  
                  
                  
                  
                  
                  
                  <div id="room_price"></div>
                  
                  
                 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <!-- /.row -->
				


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	


