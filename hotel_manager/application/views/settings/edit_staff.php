
 <div id="page-wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Staff
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                Edit Staff
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
                                 <i class="fa fa-edit"></i> Edit Staff
                            </div>
                            
                            
                            <div class="panel-body tab_main_content_cus">
                                <div class="list-group">
                                   
                                   	<div class="panel">
                                   		
                                   		 <?php 
                                   		 if($this->session->flashdata('validation_error'))
										 {
										 	
											?>
											   <div class="row">
							                    <div class="col-lg-12">
							                        <div class="alert alert-danger alert-dismissable">
							                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							                            <?php print_r($this->session->flashdata('validation_error'));?>
							                        </div>
							                    </div>
							                </div>
											
											<?php
										 }
                                   		  
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
				                                 <input class="form-control col-lg-6" name="name" id="name" type="text" value="<?php echo $results[0]->name;?>"  >
				                                  <label class="err"><?php echo form_error('name');?></label>
				                            </div>
				                            
											<div class="form-group fieldgroup col-lg-12">
				                               <label class="col-lg-4">User Name</label>
				                                 <input class="form-control col-lg-6" name="username" id="username" type="text" readonly="" value="<?php echo $results[0]->username;?>">
				                                  <label class="err"><?php echo form_error('username');?></label>
				                            </div>
				                          
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> New Password</label>
				                                <input class="form-control col-lg-6	" name="new_password" id="new_password" type="password" value="">
				                               <label class="err"><?php echo form_error('new_password');?></label>
				                            </div>
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> Confirm Password</label>
				                                <input class="form-control col-lg-6	" name="confirm_password" id="confirm_password" type="password" value="">
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
	


