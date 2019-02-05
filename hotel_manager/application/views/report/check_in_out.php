
<div id="page-wrap">
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Check-in / Check-out
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            
                            <li>
                                <!-- <i class="fa fa-fw fa-table"></i> --> <a href="<?php echo base_url();?>report">Report</a>
                            </li>
                            
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Check-in/Check-out
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


<form method="get">
						<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-1">
										<label>Booking No.</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
												<input class="col-lg-8 form-control" name="b_no" id="b_no" onkeypress="return onlyNumbers(event)" value="<?php if(!empty($b_no)) echo $b_no ?>">
										</div>
									</div>
									<div class="col-lg-1">
										<label>Guest Name</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
												<input class="col-lg-8 form-control" name="name" id="name" value="<?php if(!empty($name)) echo $name ?>">
										</div>
									</div>
									<div class="col-lg-1">
										<label>Source</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<select class="col-lg-8 form-control" name="source" id="source" onchange="" >
												<option value="">--Select--</option>
												<option value="direct" <?php if(!empty($source)) { if($source == 'direct') echo 'selected'; } ?>>Direct</option>
												<option value="online" <?php if(!empty($source)) { if($source == 'online') echo 'selected'; } ?>>Online</option>
												<option value="agency" <?php if(!empty($source)) { if($source == 'agency') echo 'selected'; } ?>>Agency</option>
												<option value="hotel" <?php if(!empty($source)) { if($source == 'hotel') echo 'selected'; } ?>>Hotel</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<select style="<?php if(!empty($source)) { if($source != 'agency') echo 'display : none'; } else { echo 'display : none'; } ?>" class="col-lg-8 form-control" name="agency" id="agency" onchange="" >
											<option value="">--Select--</option>
                        	<?php
                        	foreach ($agency_list as $tbl_agency) {?>
							
							<option value="<?php echo $tbl_agency->id; ?>" <?php if($agency == $tbl_agency->id) echo 'selected' ?>><?php echo $tbl_agency->agency; ?></option>
								
							<?php
							}
                        	?>
											</select>
										</div>
									</div>
								</div>
						</div>

<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-1">
										<label>From</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-cin">
												<input class="col-lg-8 form-control" name="from" id="from" value="<?php if(!empty($from)) echo date_format(date_create_from_format('Y-m-d',$from), 'd-m-Y') ?>">
											</span>
										</div>
									</div>
									<div class="col-lg-1">
										<label>To</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-cout">
												<input class="col-lg-8 form-control" name="to" id="to" value="<?php if(!empty($to)) echo date_format(date_create_from_format('Y-m-d',$to), 'd-m-Y') ?>">
											</span>
										</div>
										</div>
									<div class="col-lg-1">
										<label>Status</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<select class="col-lg-8 form-control" name="status" id="status">
												<option value="2" <?php if(!empty($status)) { if($status == 2) echo 'selected'; } ?>>Checked-in</option>
												<option value="3" <?php if(!empty($status)) { if($status == 3) echo 'selected'; } ?>>Checked-out</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<button type="submit" class="btn cus-btn btn-primary" id="submit" name="submit">Submit</button>
										</div>
										<?php if(!empty($results)) {?>
                            		<a href="<?php echo base_url() . 'report/c_in_outExcel?b_no='.$b_no.'&name='.$name.'&source='.$source.'&agency='.$agency.'&from='.$from.'&to='.$to.'&status='.$status; ?>"><img src="<?php echo base_url() . 'assets/img/excel.png'; ?>"/></a>
									<?php } ?>
									</div>
								</div><label style="display: none" id="date_error" class="err">From date should be greater than To date</label>
						</div>

								</form>
							
							

						</div>
                            	
                            	<div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                            	<thead>
		                            		<tr>
		                            			<th>Booking #</th>
		                            			<th>Check-in</th>
		                            			<th>Check-out</th>
		                            			<th>Name</th>
		                            			<th>Rooms</th>
		                            			<th>Source</th>
		                            			<th>Amount</th>
		                            			<!---<th>Commission</th>-->
		                            			<th>Status</th>
		                            			<th></th>
		                            			</tr>
		                            		</thead>
		<tbody>
<?php
if(!empty($results)) { 
foreach ($results as $a_result) { 
	if($a_result -> offline_user != 0) { $source = 'Direct'; }
	
	else if($a_result -> user_id != 0) { $source = 'Online'; }
	
	if($a_result -> agency != 0) { $source = 'Agency'; }
	
	if($a_result -> status == 2) { $status = 'Checked-in'; } else { $status = 'Checked-out'; }
	
	if(!empty($a_result -> commision)) { $comm = '<i class="fa fa-inr"></i> '. $a_result -> commision; } else { $comm = ''; }
	
	$rooms = $this -> Report_model -> getRooms($a_result -> booking_number) ?>
			<tr>
				<td><?php echo $a_result -> booking_number; ?></td>
				<td><?php echo date_format(date_create_from_format('Y-m-d',$a_result -> check_in), 'd/m/Y'); ?></td>
				<td><?php echo date_format(date_create_from_format('Y-m-d',$a_result -> check_out), 'd/m/Y'); ?></td>
				<td><?php echo $a_result -> name; ?></td>
				<td><?php echo $rooms -> number_of_rooms ?></td>
				<td><?php echo $source; ?></td>
				<td><i class="fa fa-inr"></i> <?php echo $a_result -> total_amount; ?></td>
				<!--<td><?php echo $comm; ?></td>--->
				<td><?php echo $status; ?></td>
				<td><a href="<?php echo base_url() . 'report/detail/' . $a_result -> booking_number . '/' . $a_result -> offline_user . '/' . $a_result -> category ?>"><i class="fa fa-fw fa-edit "></i></a></td>
			</tr>
			<?php } } else { ?>
			<tr class="active text-center"><td colspan="9" class="text-center">No results found.</td></tr>
			<?php } ?>
		</tbody>
		                       </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				