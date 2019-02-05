<?php $this->load->view('travels/side_menu');?>

 <div id="page-wrapper" class="w_tabs_page_wrapper add_travels_cus_block">

            <div class="container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Add New Travels
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Travels
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary panel_primary_travels_cus">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-plus"></i>  Travels</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   
                                   	<div class="panel">
                                   		
                                   		 <?php 
                                   		 if($this->session->flashdata('success'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-success ">'.$this->session->flashdata('success').'</div>';
											?>
											
											<?php
										 }
		                  				 ?>
					
                                   				<form method="post" action="" name="travels" id="travels">
                                   					
												<div class="col-md-12">
													
													
												<div class="form_group_block2_cus_commision">
												 <div class="form-group col-md-6">
				                               <label class="col-lg-12">Travels Name</label>
				                                 <input class="form-control col-lg-12" name="name" id="name" type="text" value="" >
				                                  <label class="err"><?php echo form_error('name');?></label>
				                            </div>
				                       
				                            
				                             <div class="form-group col-md-6">
				                                <label class="col-lg-12"> Contact</label>
				                                <input class="form-control col-lg-12	" name="contact" id="contact" type="text" value="">
				                               <label class="err"><?php echo form_error('contact');?></label>
				                            </div>
				                            
				                             <div class="form-group col-md-6">
				                                <label class="col-lg-12"> Fax</label>
				                                <input class="form-control col-lg-12	" name="fax" id="fax" type="text" value="">
				                              
				                            </div>
				                            
				                               <div class="form-group col-md-6">
				                                <label class="col-lg-12">Email</label>
				                                <input class="form-control col-lg-12" name="email" id="email" type="text" value="" onkeyup="check_username();">
				                                
				                              <label class="err" id="email_exist"><?php echo form_error('email');?></label>
				                            </div>
				                            
				                            <div class="form-group col-md-6">
				                                <label class="col-lg-12"> Password</label>
				                               <input class="form-control col-lg-12	" name="password" id="password" type="password" value="">
				                               <label class="err"><?php echo form_error('password');?></label>
				                            </div>

											     <div class="form-group col-md-6">
				                                <label class="col-lg-12">Address</label>
				                                 <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
				                                <textarea  class="ckeditor " rows="3" name="address" id="address"></textarea>
				                                 <label class="err"><?php echo form_error('address');?></label>
				                                 </div>
				                              
				                            </div>
 											  </div>		
 													
 													<div class="form_group_block3_cus_commision">				
											  <div class="form-group col-md-12">
												<button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
											</div>
				  </div>
				                        </form>
				                       
                                   	</div>
                                    
                                </div>
                                <div class="text-right">
                                    <!-- <a href="administrator.php?option=manage_model">Back <i class="fa fa-arrow-circle-left"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                 
                    
                </div>
                <!-- /.row -->
				


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	


