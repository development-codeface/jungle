<?php $this->load->view('report/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Hotel Report
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i>  -->Hotel Report
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				
				<div class="row">
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary panel_primary_travels_cus ">
                            <div class="panel-heading cus_panel_heading">
                               <i class="fa fa-th-list"></i> Hotel List
                            </div>
                            <div class="panel-body">
                                
                                
                                
                                
                                
                       <div class="row panel">




						<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-3">
										<label>Select Category</label>
									</div>
									<div class="col-lg-3">

										<div class="form-group">
											<div class="form-group input-group">
												<select name="category" class="form-control" id="hotel_category">
														<option value="">---Select---</option>
														<?php foreach ($sub_category as $value): ?>
														
														<option value="<?php echo $value->id;?>" <?php if($sub_cat==$value->id):?> selected="selected" <?php endif; ?>><?php echo $value->name;?></option>
														
														<?php endforeach; ?>
													</select>
											</div>
										</div>

									</div>

									<div class="col-lg-3">
										 <div class="form-group">
				                                <label class="radio-inline">
				                                    <input type="radio" name="status" id="status" value="1" class="status hotel_category" <?php if($status==1): ?> checked<?php endif;?>>Active
				                                </label>
				                            </div>
				
									</div>
									<div class="col-lg-3">
										 <div class="form-group">
				                                <label class="radio-inline">
				                                    <input type="radio" name="status" id="status" value="0" class="status hotel_category" <?php if($status==0): ?> checked<?php endif;?>>Blocked
				                                </label>
				                                
				                            </div>

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
		                                        <th>Address</th>
		                                        <th>Place</th>
		                                        <th>District</th>
		                                        <th>State</th>
		                                        <th>Delete</th>
		                                    </tr>
		                                </thead>
		                                <tbody id="search_result">
		                               <?php
									   if(!empty($list))
									   {
									   $i=1+$page;
		                               foreach($list as $value):
										   
										  $state =$this->Reportmodel->select_location($value->state); 
										//$country =$this->ReportModel->select_location($value->country);
		                               ?>
		                               
		                               <tr class="active">
										 <td><?php echo  $i++;?></td>
										 <td><?php echo  $value->title;?></td>
										 <td><?php echo  $value->address;?></td>
										 <td><?php echo  $value->place;?></td>
										 <td><?php echo  $state->district;?></td>
										 <td><?php echo  $state->state;?></td>
										 
										 <?php
										 if($value->status==0)
										 {?>
										 <td><a href="<?php echo base_url();?>report/changestatus/<?php echo $value->id;?>/1">Unblock</a></td>
										 <?php
										 }
										 else
										 {?>
										<td><a href="<?php echo base_url();?>report/changestatus/<?php echo $value->id;?>/0">Block</a></td>
										 <?php }?>
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
                    
                    <div id="page"><?php if(!empty($list)): echo $pagination; endif;?></div>
                    </div>
                    
                </div>
                <!-- /.row -->
				