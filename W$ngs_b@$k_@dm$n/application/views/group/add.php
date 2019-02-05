<?php $this->load->view('group/side_menu');?>

 <div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Group
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>transaction">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Add
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
                
     

				
				
				
				
				<div class="row">
					
                    <div class="col-lg-6 ">
                        <div class="panel panel-primary panel_primary_travels_cus ">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-plus"></i> Group </h3>
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
		                  				 ?>
					
                                   				<form method="post" action=""  name="groups" id="groups">
												
											<div class="form_group_block2_cus_commision">
											
											<div class="form-group col-md-12">
				                               <label class="col-lg-12">Group Name</label>
				                                <input class="form-control col-lg-12" name="name" id="name" type="text" value="" >
				                            </div>
				                            
				                            <div class="form-group col-md-12"><br/>	
				                                <label class="col-lg-12">Username </label>
				                                <input class="form-control col-lg-12" name="username" id="username" type="text" value="" onkeyup="check_group_username();">
				                                <label class="err" id="email_exist"><?php echo form_error('username');?></label>
				                            </div>
											
				                            <div class="form-group col-md-12">
				                                <label class="col-lg-12">Password </label>
				                                <input class="form-control col-lg-12	" name="password" id="password" type="password" value="">
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
	


