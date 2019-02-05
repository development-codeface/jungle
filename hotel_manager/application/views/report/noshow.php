<?php
if ($this->input->is_ajax_request()) {
?>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<?php } ?>

<div id="page-wrap">
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
<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-4">
										<label>Month</label>
									</div>
									<div class="col-lg-8">
										<div class="form-group">
											<span id="sandbox-container2">
												<input class="col-lg-8 form-control" value="<?php if(!empty($date)) echo $date; ?>" name="month" id="month" 
												onchange="noshow_month()">
											</span>
										</div>
									</div>
								</div>
						</div>

						</div>
                            	
                            	<div class="table-responsive" id="monthly">
		                            <table class="table table-bordered table-hover table-striped">
		                            	<thead>
		                            		<tr>
		                            			<th>Sl No.</th>
		                            			<th>User</th>
		                            			<th>Booking No.</th>
		                            			<th>No. of rooms</th>
		                            			<th>Amount</th>
												<th>Detail</th>
		                            			</tr>
		                            		</thead>
		<tbody>
			<?php 
			if(!empty($tbl_booking)) {
			$i = 1 + $page;
			foreach ($tbl_booking as $booking) {
			$num = $this -> db
			-> select_sum('number_of_rooms')
			-> where('booking_number', $booking -> booking_number)
			-> get('tbl_booking')
			-> row();
			
			if($booking -> user_id == 0) {
			$name = $this -> db
			-> where('id', $booking -> offline_user)
			-> get('tbl_offline_user')
			-> row();
			} else {
			$name = $this -> db
			-> where('id', $booking -> user_id)
			-> get('tbl_user')
			-> row();
			}
			
				?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $name -> first_name.' '.$name -> last_name; ?></td>
				<td><?php echo $booking -> booking_number; ?></td>
				<td><?php echo $num -> number_of_rooms; ?></td>
				<td><?php echo $booking -> total_amount; ?></td>
				<td><a href="<?php echo base_url();?>booking/arrival_detail/<?php echo $booking -> booking_number; ?>/<?php echo $booking->offline_user;?>/<?php echo $booking -> category; ?>">Detail</a></td>
			</tr>
			<?php $i++; } } else { ?> <tr><td colspan="5" class="text-center">No results found.</td></tr> <?php } ?>
		</tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				