

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <?php if(isset($title)) echo $title; ?>
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>report">Report</a>
                            </li>
                            
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> <?php if(isset($title)) echo $title; ?>
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> List</h3>
                            </div>
                            <div class="panel-body">
                            	
                            	                       <div class="row panel">



					<?php if($title) { ?>
						<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-4">
										<label>Month</label>
									</div>
									<div class="col-lg-8">
										<div class="form-group">
											<span id="sandbox-container2">
												<input class="col-lg-8 form-control " name="month" id="month" 
												onchange="<?php if($title == 'Monthly Bookings') echo 'get_month1();';
else echo 'get_month();'; ?>">
											</span>
										</div>
									</div>
								</div>
						</div><?php } ?>



							
							

						</div>
                            	
                            	<div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped srink_table" id="monthly">
		                            	
		                            	<?php  if(!empty($tbl_booking)){
		                            		?>
		                                <thead>
		                                    <tr>
		                                        <th>Sl No.</th>
		                                        <th>Booking No.</th>
		                                        <th>Name</th>		                                       
		                                        <th>Room type</th>
		                                        <th>No. of rooms</th>
		                                        <th>Booked on</th>
		                                        <th>Check-in</th>
		                                        <th>Check-out</th>
		                                        <th>Mode of payment</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                	
		                                	foreach ($tbl_booking as $booking) {
		                                		 
		                                	$name = $this->Report_model->name($booking->user_id);
												
		                                	$type = $this->Report_model->roomtype($booking->room_id, $booking->hotel_id); ?>
		                                    <tr>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $booking->booking_number;?></td>
		                                        <td><?php echo $name->first_name . ' ' . $name->last_name;?></td>
		                                        <td><?php echo $type->room_title;?></td>
		                                        <td><?php echo $booking->number_of_rooms;?></td>
		                                        <td><?php echo $booking->date;?></td>
		                                        <td><?php echo $booking->check_in;?></td>
		                                        <td><?php echo $booking->check_out;?></td>
		                                        <td><?php echo $booking->payment_method;?></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center hgt_td"><td colspan="9">No results found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				