<?php $this->load->view('transaction/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus   container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           commision
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Commision
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


                <div class=" text-right">
                	<p>
                		
                	</p>
                </div>
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary panel_primary_travels_cus ">
                        
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Manage commision
                            <div class="pull-right">
                            
                              
                            </div>
                        </div>
                            
                            
                            <div class="panel-body">
                                
                                
		                           <div class="row panel">
								
										<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-4">
														<label>Hotel</label>
													</div>
													<div class="col-lg-8">
														
													<select class="form-control col-lg-12" name="hotels" id="hotels" type="text" onchange="list_commision();">
				                                 	<option value="">--Select--</option>
				                                 	<?php foreach($results as $hotels): ?>
				                                 	<option value="<?php echo $hotels->id;?>" <?php if($hotelid==$hotels->id){?> selected="selected" <?php } ?>><?php echo $hotels->title;?></option>
				                                 	<?php endforeach; ?>
				                                 	</select>
													</div>
												</div>
										</div>
		
								 </div>
                              
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped table_list_grp">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Hotel Commision</th>	
		                                         <th>Package Commision</th>		                                       
		                                        <th>Date</th>
		                                        
		                                    </tr>
		                                </thead>
		                                <tbody id="commision_list">
		                                <?php
									   if(!empty($result))
									   {
									   $i=1+$page;
		                               foreach($result as $value):
										   
										
		                               ?>
		                               
		                               <tr class="active">
										 <td><?php echo  $i++;?></td>
										 <td><?php echo  $value->title;?></td>
										 <td><?php echo  $value->commision;?></td>
										 <td><?php echo  $value->package_commision;?></td>
										 <td><?php echo  $value->date;?></td>
										
										
									 </tr>
							 		<?php endforeach; 
							 		}
							 		else
							 		{?>
							 
		                                    <tr class="active"'>
		                                        <td colspan="8" align="center">No results Found</td>
		                                        
		                                    </tr>
		                              <?php
									  }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                        <div id="page">
                        	<?php if(!empty($result)): echo $pagination; endif;?>
                        </div>
                 
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				