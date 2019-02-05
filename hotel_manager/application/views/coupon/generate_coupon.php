

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generate Coupon
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="<?php echo base_url();?>coupon">Manage</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Generate
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Generate coupon</h3>
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
				                                <label class="col-lg-4"> Coupon Code</label>
				                                <input class="form-control col-lg-6	" name="coupon_code" id="coupon_code" type="text" value="<?php echo $coupon;?>">
				                                <?php echo form_error('coupon_code');?>
				                            </div>
				                            
				                            
												<div class="form-group fieldgroup col-lg-12">
				                               <label class="col-lg-4">Name</label>
				                                 <input class="form-control col-lg-6" name="name" id="name" type="text" value="<?php echo $results[0]->first_name. "&nbsp;".$results[0]->last_name;?>"> 
				                                  <?php echo form_error('name');?>
				                            </div>
				                            
											<div class="form-group fieldgroup col-lg-12">
				                               <label class="col-lg-4">Email</label>
				                                 <input class="form-control col-lg-6" name="email" id="email" type="text" value="<?php echo $results[0]->email;?>">
				                                 <?php echo form_error('email');?>
				                            </div>
				                          
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> Offer</label>
				                                <input class="form-control col-lg-6	" name="offer" id="offer" type="text" value="<?php echo set_value('offer'); ?>">
				                                <?php echo form_error('offer');?>
				                            </div>
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> Valid from</label>
				                                <span id="sandbox-container">
				                                <input class="form-control col-lg-6	" name="from" id="from" type="text" value="<?php echo set_value('from'); ?>">
				                                </span>
				                                <?php echo form_error('from');?>
				                            </div>
				                            
				                             <div class="form-group fieldgroup col-lg-12">
				                                <label class="col-lg-4"> Valid to</label>
				                                <span id="sandbox-container">
				                                <input class="form-control col-lg-6	" name="to" id="to" type="text" value="<?php echo set_value('to'); ?>">
				                                </span>
				                                <?php echo form_error('to');?>
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
	


