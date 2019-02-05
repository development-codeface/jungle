<?php $this->load->view('transaction/side_menu');?>

 <div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Commision
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
                                <h3 class="panel-title"><i class="fa fa-plus"></i> Commision</h3>
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
					
                                   				<form method="post" action="">
												
												<div class="form_group_block2_cus_commision">
											<div class="form-group col-md-12">
				                               <label class="col-lg-12">Property</label>
				                                 <select class="form-control col-lg-12" name="property" id="property" type="text" >
				                                 	<option value="">--Select--</option>
				                                 	<?php foreach($result as $hotels): ?>
				                                 	<option value="<?php echo $hotels->id;?>"><?php echo $hotels->title;?></option>
				                                 	<?php endforeach; ?>
				                                 	</select>
				                                 	 <label class="err"><?php echo form_error('property');?></label>
				                            </div>
				                             <span style="color :red;">Please add hotel commision & package commision in percentage or normal amount</span>
				                            <div class="form-group col-md-12"><br/>	
				                                <label class="col-lg-12">Hotel Commision </label>
				                                 <input class="form-control col-lg-12" name="commision" id="commision" type="text" placeholder="eg: 100 or 10% ">
				                                  <label class="err"><?php echo form_error('commision');?></label>
				                            </div>
				                              <div class="form-group col-md-12">
				                                <label class="col-lg-12">Package Commision </label>
				                                 <input class="form-control col-lg-12" name="package" id="package" type="text" placeholder="eg: 100 or 10%">
				                                  
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
	


