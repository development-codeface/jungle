
<?php
if($this->uri->segment(3) && $this->uri->segment(4))
{
$from = $this->uri->segment(3);
$to = $this->uri->segment(4);
}

if ($this->input->is_ajax_request()) {
?>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/offline.js"></script>
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



						<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-1">
										<label>From</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-cin">
												<input class="col-lg-8 form-control" name="from" id="from" onchange="get_dates_direct()" value="<?php if(!empty($from)) echo $from; ?>">
											</span>
										</div>
									</div>
									<div class="col-lg-1">
										<label>To</label>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-cout">
												<input class="col-lg-8 form-control" name="to" id="to" onchange="get_dates_direct()" value="<?php if(!empty($to)) echo $to; ?>">
											</span>
										</div>
									</div>
								</div><label style="display: none" id="date_error" class="err">From date should be greater than To date</label>
						</div>



							
							

						</div>
                            	
                            	<div class="table-responsive" id="monthly">
                            		<?php 
                            		$total = 0;
			if(!empty($book_total)) {
                            				foreach ($book_total as $b_total) {

			$total+=$b_total-> total_amount;  } }
                            		if(!empty($total)) {?><p class="text-right">Amount - <?php echo $total; ?></p><?php }
                            		if(!empty($rows)) {?><p class="text-right">Bookings - <?php echo $rows; ?></p><?php } ?>
		                            <table class="table table-bordered table-hover table-striped">
		                            	<thead>
		                            		<tr>
		                            			<th>Sl No.</th>
		                            			<th>User</th>
		                            			<th>Booking No.</th>
		                            			<th>No. of rooms</th>
		                            			<th>Amount</th>
		                            			</tr>
		                            		</thead>
		<tbody>
			<?php 
			if(empty($page)) { $page=0; }
			$i=1+$page;
			if(!empty($tbl_booking)) {
			foreach ($tbl_booking as $booking) {
			$num = $this -> db
			-> select_sum('number_of_rooms')
			-> where('booking_number', $booking -> booking_number)
			-> get('tbl_booking')
			-> row();
			
				?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $booking -> first_name.' '.$booking -> last_name; ?></td>
				<td><?php echo $booking -> booking_number; ?></td>
				<td><?php echo $num -> number_of_rooms; ?></td>
				<td><?php echo $booking -> total_amount; ?></td>
			</tr>
			<?php $i++; } } else { ?> <tr class="active text-center hgt_td"><td colspan="5" class="text-center">No results found.</td></tr> <?php } ?>
		</tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				