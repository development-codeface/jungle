 

    <!-- Morris Charts CSS -->
    <link href="http://ironsummitmedia.github.io/startbootstrap-sb-admin-2/bower_components/morrisjs/morris.css" rel="stylesheet">


		<div id="page-wrapper" class="cus_dashboard">

            <div class="container-fluid">

                




				<!-- Logged in Alert >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> Logged in as  <strong> Admin</strong>
                        </div>
                    </div>
                </div>
                <!-- Logged in Alert << -->




				<!-- Over view Icons >> -->
                <div class="row top_color-box">
                    <div class="col-lg-3 col-md-6 panel_cus_1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $booking_count;?></div>
                                        <div>Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>booking">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                      
                    <div class="col-lg-3 col-md-6 panel_cus_2">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $arrival_count;?></div>
                                        <div>Arrivals</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>booking/arrival">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                     
                          
                   <div class="col-lg-3 col-md-6 panel_cus_3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rupee fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">  <?php echo $checkin_count;?></div>
                                        <div>Check In</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>booking/checkin_list">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> 
                  
				  
				    <div class="col-lg-3 col-md-6 panel_cus_4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $checkout_count; ?></div>
                                        <div>Checkout </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>booking/checkout_list">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> 
                  
                  <!--- <div class="col-lg-3 col-md-6 panel_cus_4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user_count; ?></div>
                                        <div>Registered Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>users">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> --->
                  
                </div>
                <!-- Over view Icons << -->
               

               
                
       <div class="row">
                    <div class="col-lg-6 Booking_Chart_block ">
                    	        
                        <div class="panel panel-default">
                        	
                        	
                        	                         
                               <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Booking Chart <span class="subtitle-panel_dim_text"> weekly stats...</span>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" type="button" aria-expanded="false">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu pull-right">
                                        <li><a href="#">Daily Report</a>
                                        </li>
                                        <li><a href="#">Weekly Report</a>
                                        </li>
                                        <li><a href="#">Monthly Report</a>
                                        </li>
                                        <!-- <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li> -->
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                      
                     
                    </div>
                    
                            <div class="col-lg-6">
                        <div class="panel panel-default">
                          
                               
                               
                               <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Profit <span class="subtitle-panel_dim_text"> weekly stats...</span>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" type="button" aria-expanded="false">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu pull-right">
                                        <li><a href="#">Daily Report</a>
                                        </li>
                                        <li><a href="#">Weekly Report</a>
                                        </li>
                                        <li><a href="#">Monthly Report</a>
                                        </li>
                                        <!-- <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                               
                            
                                 <!-- <div class="panel-actions">
                                 	<ul>
                                 		<li>
                                <h3 class="panel-action_title">Daily</h3>
                                	</ul>
                               </div> -->
                            <div class="panel-body">
                               <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>

		
		

                <div class="row pie_diagram">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                      
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                             
                            </div>
                        </div>
                    </div>

           
                </div>


                <div class="row">
                    <div class="col-lg-6 Booking_list_cus_block">
                        <div class="panel panel-default ">
                        
                             
                              
                              <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Booking List
                            <div class="pull-right">
                            	<button  class="icon_colapse_cus"  data-toggle="collapse" data-target="#demo"><i class="fa fa-angle-down"></i></button>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                              
                              
                              
                              
                                 <div class="panel-body " >  
                                 	<div class="collapse in Arrival_block_1 booking_list_block_cus" id="demo" >    
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Booking Number</th>
                                                <th>Total Rooms</th>
                                                <th>Booking Date</th>
                                                 <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	if(!empty($booking_results))
											{
												
												//print_r($booking_results);
												
                                        	foreach($booking_results as $booking):
                                        	
											if($booking->offline_user == 0)	//check whether offline user
												{ 
												$booking_details = $this->Dashboardmodel->booking_details($booking->booking_number,$id); }
												else { 
													if($booking->category=='hotel')
													{
												$booking_details = $this->Dashboardmodel->offline_booking_details($booking->booking_number,$id);
													}
													else
													{
														$booking_details = $this->Dashboardmodel->offline_booking_details_package($booking->booking_number,$id);
														
													}
												}
												
											//$booking_details= $this->Dashboardmodel->booking_details($booking->booking_number,$id);
												
												
												//print_r($booking_details);
                                        	?>
                                            <tr>
                                                
                                                <td><?php echo $booking->booking_number;?></td>
                                                <td>
                                                	<?php
													
                                                	$room='';
                                                	foreach ($booking_details as $rooms):
                                                	$room += $rooms->number_of_rooms;
                                                	endforeach;
                                                	echo  $room;
                                                	?>
                                                 </td>
                                                 <td><?php echo $rooms->date;?></td>
                                                <td><a href="<?php echo base_url();?>booking/detail/<?php echo $booking->booking_number.'/'.$booking->offline_user.'/'.$booking->category;?>">View</a></td>
                                            </tr>
                                            <?php
											endforeach;
											}else{
												?>
												<tr>
                                                <td colspan="4" style="text-align: center;">No Bookings</td>
												<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo base_url();?>booking">View Booking <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div></div>
                        </div>
                    </div>
                    <div class="col-lg-6 arrival_list_cus_block">
                        <div class="panel panel-default ">
                        	
                        	
                        	               
                              <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Arrival List
                            <div class="pull-right">
                            	<button  class="icon_colapse_cus"  data-toggle="collapse" data-target="#demo2"><i class="fa fa-angle-down"></i></button>
                             <!-- <button  class="close3" type="button">×</button> -->
                              
                            </div>
                        </div>
                        	
                           
                            <div class="panel-body"  >
                            	
                            	
                                	<div class="collapse in Arrival_block_1 booking_list_block_cus" id="demo2" >    
                                <div class="table-responsive">
                                	
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Booking Number</th>
                                                <th>Total Rooms</th>
                                                <th>Booking Date</th>
                                                 <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        	if(!empty($arrival_results))
											{
												
												
                                        	foreach($arrival_results as $checkin):
                                        	
                                        	
											if($checkin->offline_user == 0)	//check whether offline user
												{ 
												$checkin_details = $this->Dashboardmodel->arrival_details($checkin->booking_number,$id);
												}
												else { 
													if($checkin->category=='hotel')
													{
														$checkin_details = $this->Dashboardmodel->offline_arrival_details($checkin->booking_number,$id);
													}
													else
													{
														$checkin_details = $this->Dashboardmodel->offline_arrival_details_package($checkin->booking_number,$id);
													}
												}
												
											//$checkin_details= $this->Dashboardmodel->arrival_details($checkin->booking_number,$id);
                                        	?>
                                            <tr>
                                                
                                                <td><?php echo $checkin->booking_number;?></td>
                                                <td>
                                                	<?php
                                                	$room_checkin='';
                                                	foreach ($checkin_details as $checkin_rooms):
                                                	$room_checkin += $checkin_rooms->number_of_rooms;
                                                	endforeach;
                                                	echo  $room_checkin;
                                                	?>
                                                 </td>
                                                 <td><?php echo $checkin_rooms->date;?></td>
                                                <td><a href="<?php echo base_url();?>booking/arrival_detail/<?php echo $checkin->booking_number;?>/<?php echo $checkin->offline_user.'/'.$checkin->category;?>">View</a></td>
                                            </tr>
                                            <?php
											endforeach;
											}else{
												?>
												<tr>
                                                <td colspan="4" style="text-align: center;">No Arrivals Today</td>
												<?php
											}
											?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo base_url();?>booking/arrival">View Checkin <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div> </div>
                        </div> 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
			
		</div>

	</div>
	
       

      

   
           


</div>






<script>
$(document).ready(function(){
  $("#demo3").on("hide.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-down"></span> Open');
  });
  $("#demo2").on("show.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
  });
});
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
jQuery(".close2").click(function(){
    jQuery(".Booking_list_cus_block").addClass("hide_block");
}); 

jQuery(".close3").click(function(){
    jQuery(".arrival_list_cus_block").addClass("hide_block");
}); 


</script>

<script src="<?php echo base_url();?>assets/js/plugins/morris/jquery-2.0.0b1.js"></script>


   <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/js/plugins/morris/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/morris/morris-data.js"></script>
    
    


