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
                           Booking Amendment Requests
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Bookings list</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                                    <div class="row panel">
		                            	<div class="col-lg-10">
                               			<div class="row">
		                               		<div class="col-lg-12">
		                               		
									                
<div class="col-lg-1">
		                               			<label>Booking no.</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2">
						                                <input class='form-control' name="b_num" id="b_num" value="<?php if(!empty($num)) echo $num; ?>" onkeypress="return onlyNumbers(event)" >
									                </div>
													<div class="form-group col-lg-2">
						                                <button type="submit" class="btn cus-btn btn-primary" onclick="amend_num();" >Submit</button>
									                </div>
						                    </div>
						                  </div>
					                 </div>
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
		                                          <!-- <th>Detail</th> -->
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
		                                        <td><?php echo $booking_details[0]->first_name;?></td>
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
		                                        <!-- <td><a href="<?php echo base_url();?>booking/detail/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>">Detail</a></td>
		                                     --></tr>
		                                <?php $i++;
		                                }}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="10">No results found.</td></tr>';
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
				