

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Users
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Manage Users
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                

				
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Registered Users</h3>
                            </div>
                            <div class="panel-body">
                                
                                          
                                
                       <div class="row panel">




						<div class="col-lg-8 col-sm-offset-3">
								<div class="row">
									
								<?php //echo $status;?>

									<div class="col-lg-3">
										 <div class="form-group">
				                                <label class="radio-inline">
				                                    <input type="radio" name="status" id="status" value="online" class="status user_status"
				                                     <?php 
				                                     	if($status=='online' || $status==''){?>
				                                     	checked="checked"
				                                     	<?php }
				                                     	?>> Online 
				                                </label>   
				                           </div>

									</div>
									
									
									<div class="col-lg-3">
										 <div class="form-group">
				                                <label class="radio-inline">
				                                    <input type="radio" name="status" id="status" value="offline" class="status user_status"
				                                     <?php 
				                                     	if($status=='offline'){?>
				                                     	checked=""
				                                     	<?php }?>
				                                     	 >Offline
				                                </label>
				                           </div>
				
									</div>
									
								</div>
							</div>



							
							

						</div>
						
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Email</th>
		                                         <th>contact</th>
		                                          <th>Number of booking</th>
		                                        
		                                    </tr>
		                                </thead>
		                                <tbody id="users">
		                                <?php $i=1+$page;
		                                if(!empty($userid)){
		                                	foreach ($userid as $user) {
		                                		
													if($status=='offline')
													{
														$result = $this->Usermodel->get_oofline_users($user->offline_user);
														//$booking = $this->Usermodel->booking_count($user->offline_user);
														$booking=1;
													}
													else
													{
														$result = $this->Usermodel->get_users($user->user_id);
														$booking = $this->Usermodel->booking_count($user->user_id);
													}
												 
												 
												  
		                                		 ?>
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result[0]->first_name."&nbsp;".$result[0]->last_name;?></td>
		                                        <td><?php echo $result[0]->email;?></td>
		                                         <td><?php echo $result[0]->phone;?></td>
		                                          <td><?php echo $booking;?></td>
		                                        
		                                      
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="7">No users found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    <div id="page">
                   <?php if(!empty($userid)): echo $pagination; endif;?></div>
                    </div>
                    
                </div>
                <!-- /.row -->
				