<?php
if ($this->input->is_ajax_request()) {
?>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/offline.js"></script>
<?php } ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Bookings
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Booking List
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms list</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                                    <div class="row panel">
		                            	<div class="col-lg-10">
                               			<div class="row">
		                               		<div class="col-lg-12">
		                               			
		                                   		 <div class="col-lg-1">
		                               			<label>Type</label>
		                               		</div>
		                               		
													<div class="form-group col-lg-2">
						                                <select class="form-control" name="category" id="category" >
						                                	<option value="">--Select--</option>
						                                	<option value="on" 
						                                	<?php if(!empty($cat)) 
						                                	{ if($cat == 'on') echo 'selected'; } 
						                                	else if($this -> uri -> segment(3) == 'on') echo 'selected';?>>Online</option>
						                                	<option value="off" 
						                                	<?php if(!empty($cat)) 
						                                	{ if($cat == 'off') echo 'selected'; }
															else if($this -> uri -> segment(3) == 'off') echo 'selected';?>>Offline</option>
						                                	<option value="hotel" 
						                                	<?php if(!empty($cat)) 
						                                	{ if($cat == 'hotel') echo 'selected'; }
															else if($this -> uri -> segment(3) == 'hotel') echo 'selected';?>>Hotel</option>
						                                  </select>
									                </div>
									                
									                <div class="col-lg-1">
		                               			<label>From</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2"><span id="sandbox-container-cin">
						                                <input class='form-control' value="<?php if(!empty($c_in)) echo date_format(date_create_from_format('Y-m-d', $c_in), 'd-m-Y'); ?>" name='check_in' id='check_in' ></span>
									                </div>
									                
									            <div class="col-lg-1">
		                               			<label>To</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2"><span id="sandbox-container-cout">
						                                <input class='form-control' value="<?php if(!empty($c_out)) echo date_format(date_create_from_format('Y-m-d', $c_out), 'd-m-Y'); ?>" name='check_out' id='check_out' ></span>
									                </div>
									                
<div class="col-lg-1">
		                               			<label>Booking no.</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2">
						                                <input class='form-control' name="b_num" id="b_num" value="<?php if(!empty($num)) { if($num != 'undefined') echo $num; } ?>" onkeypress="return onlyNumbers(event)" >
									                </div>
						                    </div>
						                  </div>
					                 </div>
									 
									 <div class="col-lg-2">
														
													<button class="btn cus-btn btn-primary" onclick="get_booking_list();" >Submit</button>
									 </div><label style="display: none" id="date_error" class="err">From date should be greater than To date</label>
									</div>
                                
                                <div class="table-responsive" id="list_table">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
												 <th>Booking Number</th>
		                                        <th>User</th>
		                                       <!-- <th>Room Title</th>
			                                        <th>Checkin Date</th>		                                       
			                                        <th>Checkout Date</th>
			                                        <th>No.of Rooms</th>
			                                        <th>Check In</th>
			                                         <th>Cancel</th> -->
		                                        <th colspan="6" style="text-align: center;">Booking details</th>	
		                                          <th>Detail</th>
		                                          <th>Edit</th>
		                                           <?php if(!empty($cat)) 
						                                	{ if($cat == 'off') {?>
												   <th>Cancel</th> 
															<?php } } else if($this -> uri -> segment(3) == 'off') {?>
															<th>Cancel</th> 
															<?php }?>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
										
		                                if(!empty($results)){
		                                	foreach ($results as $result) {
		                                		if($result->offline_user == 0)	//check whether offline user
												{ 
													if($result->category=='hotel')
													{
													$booking_details = $this->Bookingmodel->booking_details($result->booking_number,$id);
													}
													else
													{
														$booking_details = $this->Bookingmodel->booking_details_package($result->booking_number,$id);
													}
												}
												else 
												{
													if($result->category=='hotel')
													{
													$booking_details = $this->Bookingmodel->booking_details_offline($result->booking_number,$id); 
													}
													else
													{
														$booking_details = $this->Bookingmodel->booking_details_offline_package($result->booking_number,$id); 
													}
												}
													
												 ?>
		                                	
		                                    <tr>
		                                        <td><?php echo $i;?></td>
												<td><?php echo $booking_details[0]->booking_number;?></td>
		                                        <td><?php echo !empty($booking_details[0]->first_name) ? $booking_details[0]->first_name:$booking_details[0]->name;?></td>
		                                        <td colspan="6">
		                                        	<table class="table table-bordered table-hover table-striped">
		                                        		<tr>
		                                       		 <th>Room Title</th>
			                                        <th>Checkin Date</th>		                                       
			                                        <th>Checkout Date</th>
			                                        <th>No.of Rooms</th>
			                                        <!-- <th>Check In</th>
			                                         <th>Cancel</th> -->
		                                    </tr>
		                                        		<?php
		                                        		foreach ($booking_details as $booking) {?>
		                                        		<tr <?php if($booking->status == 1) { ?>class="success"<?php } ?>> 
		                                        			<?php 
		                                        			
		                                        			//check status
		                                        			//if (!empty($cat) && ($cat != 'both')) {
		                                        			//if($stat == $booking->status) {?>
		                                        			<td><?php echo $booking->room_title;?></td>
		                                        			<td><?php echo date_format(date_create_from_format('Y-m-d', $booking->check_in), 'd-m-Y');?></td>
		                                        			<td><?php echo date_format(date_create_from_format('Y-m-d', $booking->check_out), 'd-m-Y');?></td>
		                                        			<td><?php echo $booking->number_of_rooms;?></td>
		                                        			<!-- <td>
		                                        				<button onclick="do_checkin(<?php echo $booking->booking_id;?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Check-in</button>
		                                        			</td> -->
		                                        			<!-- <td><a href="<?php echo base_url();?>booking/cancel/<?php echo $result->booking_number.'/'.$result->offline_user;?>">Cancel</a></td> -->
		                                        		<?php //} } else 
															
		                                        		//without status check by default
		                                        		//{ ?>
		                                        			<!-- <td><?php echo $booking->room_title;?></td>
		                                        			<td><?php echo $booking->check_in;?></td>
		                                        			<td><?php echo $booking->check_out;?></td>
		                                        			<td><?php echo $booking->number_of_rooms;?></td> -->
		                                        			<!-- <td>
		                                        				<button onclick="do_checkin(<?php echo $booking->booking_id;?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Check-in</button>
		                                        			</td> 
		                                        			<td><a href="<?php echo base_url();?>booking/cancel/<?php echo $result->booking_number.'/'.$result->offline_user;?>">Cancel</a></td>-->
		                                        			<?php //} ?>
		                                        		</tr>
		                                        		<?php
														}?>
		                                        		
		                                        	</table>
		                                        </td>
		                                        <td><a href="<?php echo base_url();?>booking/detail/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>">Detail</a></td>
		                                        
		                                          <td><a href="<?php echo base_url();?>booking/edit/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>"><i class="fa fa-fw fa-edit"></i></a></td>
		                                    
		                                    
		                                        
		                                         <?php if(!empty($cat)) 
						                                	{ if($cat == 'off') { ?> 
														<td>
									<a class="admin_delete_btn" onclick="return cancelConfirm();" title="Cancel booking" href="<?php echo base_url();?>booking/cancel/<?php echo $result->booking_number.'/'.$result->offline_user;?>"><i class="fa fa-fw fa-trash"></i></a>
									</td>
									<?php } }
										else if($this -> uri -> segment(3) == 'off') { ?>
												<td>
						<a class="admin_delete_btn" onclick="return cancelConfirm();" title="Cancel booking" href="<?php echo base_url();?>booking/detail/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>"><i class="fa fa-fw fa-trash"></i></a>
											</td>
		                                    <?php } ?>
		                                    </tr>
		                                <?php $i++;
		                                }}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="9">No results found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
                     <?php if(!empty($pagination)) echo $pagination; ?>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.row -->