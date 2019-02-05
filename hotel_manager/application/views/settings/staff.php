

 <div id="page-wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Hotel Staff
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i>  -->Add Staff
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-6 col-sm-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                              <i class="fa fa-plus"></i> Add Staff
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
										 if($this->session->flashdata('error'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-danger ">'.$this->session->flashdata('error').'</div>';
											?>
											
											<?php
										 }
		                  				 ?>
					
                                   				<form method="post" action="" name="site_users" id="site_users">
												
												
												<div class="form-group fieldgroup col-lg-12">
				                               <label class="col-lg-4">Name</label>
				                                 <input class="form-control col-lg-6" name="name" id="name" type="text" value="<?php echo set_value('name'); ?>">
				                                  <label class="err"><?php echo form_error('name');?></label>
				                            </div>
				                            
											<div class="form-group fieldgroup col-lg-12">
				                               <label class="col-lg-4">User Name</label>
				                                 <input class="form-control col-lg-6" name="username" id="username" type="text" onchange="user_exist();" value="<?php echo set_value('username'); ?>">
				                                  <label class="err"><?php echo form_error('username');?></label>
				                                  <label class="err"><?php echo form_error('user_exist_onsubmit');?></label>
				                            </div>
				                          
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> New Password</label>
				                                <input class="form-control col-lg-6	" name="new_password" id="new_password" type="password" value="<?php echo set_value('new_password'); ?>">
				                               <label class="err"><?php echo form_error('new_password');?></label>
				                            </div>
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> Confirm Password</label>
				                                <input class="form-control col-lg-6	" name="confirm_password" id="confirm_password" type="password" value="<?php echo set_value('confirm_password'); ?>">
				                                <label class="err"><?php echo form_error('confirm_password');?></label>
				                            </div>
				                            
 																	
											<div class="form-group col-lg-12">
												<button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
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
	


