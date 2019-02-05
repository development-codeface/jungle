

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           	Checkout
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Checkout List
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
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Todays Checkout list</h3>
                            </div>
                            <div class="panel-body">
                                
                                <div class="row panel">
		                            	<div class="col-lg-4">
                               			<div class="row">
		                               		<div class="col-lg-8 left">
		                               			
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
													$booking_details = $this->Bookingmodel->checkout_details($result->booking_number,$id,$date); 
													}
													else
													{
													$booking_details = $this->Bookingmodel->checkout_details_package($result->booking_number,$id,$date); 
													}
												}
												else 
												{
													if($result->category=='hotel')
													{ 
													$booking_details = $this->Bookingmodel->checkout_details_off($result->booking_number,$id,$date);
													
													}
													else
													{
													$booking_details = $this->Bookingmodel->checkout_details_off_package($result->booking_number,$id,$date);
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
			                                        <!-- <th>Check Out</th> -->
		                                   			 </tr>
		                                        		<?php
		                                        		foreach ($booking_details as $booking) {?>
		                                        		<tr>
		                                        			<td><?php echo $booking->room_title;?></td>
		                                        			<td><?php echo $booking->check_in;?></td>
		                                        			<td><?php echo $booking->check_out;?></td>
		                                        			<td><?php echo $booking->number_of_rooms;?></td>
		                                        			<!-- <td><!-- <a href="<?php echo base_url();?>booking/checkout/<?php echo $booking->booking_id;?>">Checkout</a> --
		                                        				<button type="button" onclick="room_settings(<?php echo $booking->booking_id;?>)" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Checkout</button>
		                                        			</td> -->
		                                        		</tr>
		                                        		<?php
														}?>
		                                        		
		                                        	</table>
		                                        		</td>
		                                        <td><a href="<?php echo base_url();?>booking/checkout_detail/<?php echo $result->booking_number.'/'.$result->offline_user.'/'.$result->category;?>">Detail</a></td>
		                                        <!-- <td>
		                                        	<table class="table table-bordered table-hover table-striped">
		                                        		<tr>
		                                        			<td>asd</td>
		                                        		</tr>
		                                        		<tr>
		                                        			<td>asd</td>
		                                        		</tr>
		                                        	</table>
		                                        	
		                                        </td>
		                                        <td><?php //echo $result[0]->check_out;?></td>
		                                        <td><?php //echo $result[0]->number_of_rooms;?></td> -->
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
				