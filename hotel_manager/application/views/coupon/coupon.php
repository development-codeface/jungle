

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Coupon
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Manage Coupons
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>User Coupons</h3>
                            </div>
                            <div class="panel-body">
                            	
                         <div class="row panel">
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-2">
										<label style="line-height: 30px;">Search</label>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" value="" name="search" id="search" class="form-control" onkeyup="coupon_search();" >
										</div>
									</div>
									<div class="col-lg-1">
										<a href="<?php echo base_url(); ?>coupon/all_generate/"><input type="submit" class="btn btn-primary" name="room_sub_edt" value="Generate all"></a>
									</div>
								</div>
							</div>

									<div class="col-lg-2">
											<input type="radio" name="status" value="on" onclick="coupon_stat();"> Generated
									</div>

									<div class="col-lg-2">
											<input type="radio" name="status" value="off" onclick="coupon_stat();"> Non-generated
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
		                                          <th>Individual Coupon</th>
		                                          <th>General Coupon</th>
		                                        
		                                    </tr>
		                                </thead>
		                                <tbody id="result">
		                                <?php $i=1+$page;
		                                if(!empty($userid)){ //echo $userid; exit;
		                                	foreach ($userid as $user) {
		                                		
												$result = $this->Usermodel->get_users($user->user_id);
												 $booking = $this->Usermodel->booking_count($user->user_id);
												  //$all_coupon = $this->Coupon_model->get_coupon($user->user_id, $hotel_id);
												  $all_coupon = $this->db
												  ->select('all_coupon')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$hotel_id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
												  
												  $in_coupon = $this->db
												  ->select('coupon_code')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$hotel_id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
		                                		 ?>
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result[0]->first_name."&nbsp;".$result[0]->last_name;?></td>
		                                        <td><?php echo $result[0]->email;?></td>
		                                         <td><?php echo $result[0]->phone;?></td>
		                                          <td><?php echo $booking;?></td>
		                                           <td>
		                                           	<?php
		                                           	if(empty($in_coupon->coupon_code))
		                                           	{?><a href="<?php echo base_url(); ?>coupon/coupon_generate/<?php echo $result[0]->id;?>">Generate</a>
		                                           	<?php }
													else {echo $in_coupon->coupon_code; } 
		                                           	?></td>
		                                           	<td><?php if(!empty($all_coupon->all_coupon)) echo $all_coupon->all_coupon; ?></td>
		                                      
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
                    
                    <?php echo $pagination; ?>
                    </div>
                    
                </div>
                <!-- /.row -->
				