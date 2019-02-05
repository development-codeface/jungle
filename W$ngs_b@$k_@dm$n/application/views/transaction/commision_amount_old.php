
<?php $this->load->view('transaction/side_menu');?>

<div id="page-wrap">
<div id="page-wrapper" class="w_tabs_page_wrapper ">

            <div class="container-fluid   container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Commision Amount
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            
                            <!--<li>
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>transaction">Commision</a>
                            </li>-->
                            
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i>  -->Commision Amount
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary panel_primary_travels_cus">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> List</h3>
                            </div>
                            <div class="panel-body">
                            	
                            	                       <!-- <div class="row panel">




						<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-3">
										<label>Hotel</label>
									</div>
									
										<div class="col-lg-3">
										 <div class="form-group">
				                               <select name="category" class="form-control" id="hotelid" onchange="get_commision();">
														<option value="">---Select---</option>
														<?php foreach($results as $hotels): ?>
				                                 	<option value="<?php echo $hotels->id;?>" <?php if($hotelid==$hotels->id){?> selected="selected" <?php } ?>><?php echo $hotels->title;?></option>
				                                 	<?php endforeach; ?>
													</select>
				                            </div>
				
									</div>
									
									<div class="col-lg-3">
										<label>Select Month</label>
									</div>
									<div class="col-lg-3">

										<div class="form-group">
											<div class="form-group input-group">
												<span id="sandbox-container-trans">
												<input class="col-lg-8 form-control " name="month" id="month" onchange="get_commision();">
											</span>
											</div>
										</div>

									</div>

								
								</div>
							</div>


				

							
							

						</div> -->
						<div class="row panel">
		                            	<div class="col-lg-10">
                               			<div class="row">
		                               		<div class="col-lg-12">
		                               			
		                                   		 <div class="col-lg-1">
		                               			<label>Hotel</label>
		                               		</div>
		                               		
													<div class="form-group col-lg-2">
				                               <select name="category" class="form-control" id="hotelid" onchange="get_commision();">
														<option value="">--Select--</option>
														<?php foreach($results as $hotels): ?>
				                                 	<option value="<?php echo $hotels->id;?>" <?php if(!empty($hotel)) { if($hotel==$hotels->id) { echo 'selected'; }} ?>><?php echo $hotels->title;?></option>
				                                 	<?php endforeach; ?>
													</select>
									                </div>
									                
									                <div class="col-lg-1">
		                               			<label>From</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2"><span id="sandbox-container-tr1">
						                                <input class='form-control' value="<?php if(!empty($from)) echo date_format(date_create_from_format('Y-m-d', $from), 'd-m-Y'); ?>" name='from_date' id='from_date' onchange="get_commision();"></span>
									                </div>
									                
									            <div class="col-lg-1">
		                               			<label>To</label>
		                               		</div>
		                               		
									                <div class="form-group col-lg-2"><span id="sandbox-container-tr2">
						                                <input class='form-control' value="<?php if(!empty($to)) echo date_format(date_create_from_format('Y-m-d', $to), 'd-m-Y'); ?>" name='to_date' id='to_date' onchange="get_commision();"></span>
									                </div>

						                    </div>
						                  </div>
					                 </div>
									</div>
                            	
                            	<div class="table-responsive">
		                            <table class="table table-bordered table-hover" id="commision">
		                                <thead>
		                                    <tr>
		                                        <th>Booking No.</th>
		                                        <th>Booked on</th>
		                                        <th>User</th>
		                                        <th>Booking details</th>	
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                	<?php
		                                	
		                                	if(!empty($result))
											{
		                                	$i=1+$page;
											foreach ($result as $detail) {
													if($detail->category=='hotel')
													{
													$booking_details = $this->Transaction_model->booking_details($detail->booking_number,$hotel);
													}
													else
													{
													$booking_details = $this->Transaction_model->booking_details_package($detail->booking_number,$hotel);
													}
													?>
												<tr>
		                                        <td><?php echo $booking_details[0]->booking_number;?></td>
		                                        <td><?php echo $booking_details[0]->date;?></td>
		                                        <td><?php echo $booking_details[0]->first_name;?></td>
		                                        <td colspan="6">
		                                        	<table class="table table-bordered table-hover table-striped">
		                                        	<tr>
		                                       		<th>Room Title</th>
			                                        <th>No.of Rooms</th>
			                                        <th>Commission</th>		                                       
			                                        <th>Amount</th>		                                       
			                                        <th>Tax</th>	                                       
			                                        <th>Payment</th>	                                       
			                                        <th>Total Commision</th>
		                                    </tr>
		                                        		<?php
		                                        		$x='';$y='';$z='';$tot_com='';
		                                        		foreach ($booking_details as $booking) {
		                                        			$sum_room = $this -> db
		                                        			-> select_sum('number_of_rooms')
		                                        			-> where('booking_number', $booking -> booking_number)
															-> get('tbl_booking')
															-> row();
															$comm = ($booking -> commision / $sum_room -> number_of_rooms) * $booking->number_of_rooms;
															$total = $booking -> room_rate * $booking -> number_of_rooms;
															$tot_com+=$booking -> commision;
													?>
		                                        		<tr>
		                                        			<td><?php echo $booking->room_title;?></td>
		                                        			<td><?php echo $booking->number_of_rooms;?></td>
		                                        			<td><?php echo $comm;?></td>
		                                        			<td><?php echo $total;?></td>
		                                        			<?php if(empty($x)) {?>
		                                        			<td rowspan="<?php echo count($booking_details); ?>"><?php echo $booking -> tax; $x = 1;?></td>
		                                        			<?php } ?>
		                                        			<?php if(empty($y)) {?>
		                                        			<td rowspan="<?php echo count($booking_details); ?>"><?php echo $booking -> payment; $y = 1;?></td>
		                                        			<?php } ?>
		                                        			<?php if(empty($z)) {?>
		                                        			<td rowspan="<?php echo count($booking_details); ?>"><?php echo $tot_com; $z = 1;?></td>
		                                        			<?php } ?>
		                                        		</tr>
		                                        		<?php
														}
		                                        		$i++;?>
		                                        		
		                                        	</table>
		                                        </td>
		                                        </tr>
													<?php
											}
											}
		                                else{
		                                	echo '<tr><td colspan=3 align=center>No results found.</td></tr>';
		                                }
		                                	?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				