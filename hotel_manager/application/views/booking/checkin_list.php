<?php
if($this->input->is_ajax_request()) {
?>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<?php

 } ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           	Check-ins
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Check-in List
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
  <?php
  if($this->session->flashdata('success'))
  {?>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                    </div>
                </div>
   <?php
  } ?>

                <!-- <div class=" text-right"><a href="<?php echo base_url('roomtype/add');?>">Add</a></div> -->
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms list</h3>
                            </div>
                            <div class="panel-body">
                                
                                <div class="row panel">
		                            	<div class="col-lg-4">
                               			<div class="row">
		                               		<div class="col-lg-4">
		                               			<label>Check-in</label>
		                               		</div>
		                               		<div class="col-lg-6">
		                               			<span id="sandbox-container3">
						                                <input class='form-control' name='check_in' id='check_in' value="<?php echo set_value('check_in'); if(!empty($date)) { echo $date = date_format(date_create_from_format('Y-m-d', $date), 'd-m-Y'); }?>" onchange="checkin_date()"></span>
						                    </div>
						                  </div>
					                 </div>
									</div>
                                
                                <div class="table-responsive">
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
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                
		                                if(!empty($results)){
		                                	
		                                	foreach ($results as $result) {
		                                		if($result->offline_user == 0)
												{
													if($result->category=='hotel')
													{
													$booking_details = $this->Bookingmodel->checkin_details($result->booking_number,$id);
													}
													else
													{
														$booking_details = $this->Bookingmodel->checkin_details_package($result->booking_number,$id);
													}
												}
												else
												{ 
													if($result->category=='hotel')
													{
													$booking_details = $this->Bookingmodel->checkin_details_off($result->booking_number,$id);
													}
													else
													{
														$booking_details = $this->Bookingmodel->checkin_details_off_package($result->booking_number,$id);
													}
												}
												 ?>
		                                	
		                                    <tr <?php if($i%2==0){ echo 'class="active"';} else{ echo 'class="success"';}?>>
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
			                                        <!-- <th>Check Out</th> -->
		                                   			 </tr>
		                                        		<?php
		                                        		foreach ($booking_details as $booking) {?>
		                                        		<tr>
		                                        			<td><?php echo $booking->room_title;?></td>
		                                        			<td><?php echo date_format(date_create_from_format('Y-m-d', $booking->check_in), 'd-m-Y');?></td>
		                                        			<td><?php echo date_format(date_create_from_format('Y-m-d', $booking->check_out), 'd-m-Y');?></td>
		                                        			<td><?php echo $booking->number_of_rooms;?></td>
		                                        			<!-- <td>
		                                        				<button type="button" onclick="room_settings(<?php //echo $booking->booking_id;?>)" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Checkout</button>
		                                        			</td> -->
		                                        		</tr>
		                                        		<?php
														}?>
		                                        		
		                                        	</table>
		                                        		</td>
		                                        <td><a href="<?php echo base_url();?>booking/checkin_detail/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>">Detail</a></td>
		                                        
		                                    </tr>
		                                <?php $i++;
		                                }}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="9">No Check In Details Found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
                     <?php echo $pagination; ?>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
                
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	  	
	  </div>
				