<?php $this->load->view('settings/side_menu');?>

 <div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">


                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change Password
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>settings">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Change Password
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary panel_primary_travels_cus ">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-key"></i>  Change Password</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   <div class="col-md-12">
                                   	<div class="panel">
                                   		
                                   		 <?php 
                                   		 if($this->session->flashdata('success'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-success ">'.$this->session->flashdata('success').'</div>';
											?>
											
											<?php
										 }
										 if($this->session->flashdata('error'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-danger ">'.$this->session->flashdata('error').'</div>';
											?>
											
											<?php
										 }
										  if($this->session->flashdata('password'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-danger ">'.$this->session->flashdata('password').'</div>';
											?>
											
											<?php
										 }
		                  				 ?>
					
                                   				<form method="post" action="" name="change_pass" id="change_pass">
												
												<div class="form_group_block2_cus_commision">
											<div class="form-group col-md-6">
				                               <label class="col-lg-12">User Name</label>
				                                 <input class="form-control col-lg-12" name="username" id="username" type="text" value="<?php echo $this->session->userdata['adminusername'];?>" readonly="">
				                                  <label class="err"><?php echo form_error('username');?></label>
				                            </div>
				                            <div class="form-group col-md-6">
				                                <label class="col-lg-12">Current Password</label>
				                                 <input class="form-control col-lg-12" name="old_password" id="old_password" type="password" value="" >
				                                 <label class="err"><?php echo form_error('old_password');?></label>
				                              
				                            </div>
				                            
				                             <div class="form-group col-md-6">
				                                <label class="col-lg-12"> New Password</label>
				                                <input class="form-control col-lg-12	" name="new_password" id="new_password" type="password" value="">
				                               <label class="err"><?php echo form_error('new_password');?></label>
				                            </div>
				                            
				                             <div class="form-group col-md-6">
				                                <label class="col-lg-12"> Confirm Password</label>
				                                <input class="form-control col-lg-12	" name="confirm_password" id="confirm_password" type="password" value="">
				                                <label class="err"><?php echo form_error('confirm_password');?></label>
				                              
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
	


