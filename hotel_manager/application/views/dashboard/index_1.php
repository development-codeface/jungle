 

    <!-- Morris Charts CSS -->
    <!--<link href="http://ironsummitmedia.github.io/startbootstrap-sb-admin-2/bower_components/morrisjs/morris.css" rel="stylesheet">-->


		<div id="page-wrapper" class="cus_dashboard  tg">

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
               <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> List</h3>
                            </div>
                            <div class="panel-body">
		                            	<div class="row well room_chart_block_cus_color_section">
		                            		
								                <div class="col-lg-12 ">
								                	<div class="col-lg-2 room_chart_block_cus_color_section_radio_btn  room_chart_block_cus_color_section_radio_btn_blocked">
								                		<label class="cus_clr1" for="chk1"><span><span></span></span>Booked</label>
									                	
								                	</div>

								                	
								                	<div class="col-lg-2 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available">
													<label class="cus_clr2" for="chk1"><span><span></span></span>Available</label>
 													</div>
													       	<div class="col-lg-2 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available_occupied">
								                		<label class="cus_clr3" for="chk1"><span><span></span></span>Occupied</label>
								                		
									                	
								                	</div>
								                	
								                	<div class="col-lg-2 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available_reserved">
								                	<label class="cus_clr4" for="chk1"><span><span></span></span>Reserved</label>
								                
								                	
								                	</div>
								                	
								                	<div class="col-lg-4 room_chart_block_cus_color_section_radio_btn room_chart_block_cus_color_section_radio_btn_available_blocked">
								                	<label class="cus_clr4" for="chk1"><span><span></span></span>Room no. Blocked</label>
								                
								                	
								                	</div>
													
													
		                            			</div>
		                            			
		                            			
		                            			
		                            </div>
                            	
                            	<div class="table-responsive res_report">
								
								
								
								  <div class="panel panel-default">
    <div class="">
        <table id="monthly" class="table table-fixedheader table-bordered table-striped table table-bordered table-hover srink_table">
            <thead>
                			<tr>
				<th style="width:4%;" >Rooms</th>
				<?php
		$start = date('Y-m-01');
		$end = date('Y-m-t', strtotime($start));
		$days = date('t', strtotime($start));
				
		while(strtotime($start) <= strtotime($end)) 
		{
			$day_num = date('d', strtotime($start));
			$day_name = date('l', strtotime($start));
			$name = substr($day_name, 0, 3);
			$start= date("Y-m-d", strtotime("+1 day", strtotime($start)));
			echo "<td style=width:32px;>$day_num <br/> $name</td>";
		}
		?>		
		</tr>
            </thead>
								
								
								
		                           
		 <tbody style="height:180px">

		
		<tr>
		<?php 
		$title = '';
		
		foreach ($rooms as $r_no) {
			if($title != $r_no->room_title) echo '<th class="thr" colspan='.($days+1).'>'.$r_no->room_title.'</th>';
			$title = $r_no->room_title;
			
			echo '<tr> <td width="4%">'.$r_no->room_number.'</td>'; 
		
		$start = date('Y-m-01');
		$end = date('Y-m-t', strtotime($start));
		
		while(strtotime($start) <= strtotime($end)) 
		{
			$status = $this -> Dashboardmodel -> room_status($r_no->hotel_id, $r_no->room_number, $start); 
			
			//print_r($status);
			
			
			if($status)
			{
			
				//if($status -> roomnumber_status == 1)
				//{
					//echo $status -> user_id;
				if($status -> user_id == 0)
				{
					$user = $this -> db
					-> select('first_name, last_name')
					-> where('id', $status -> offline_user)
					-> get('tbl_offline_user')
					-> row();
					//print_r($user);
				}
				else {
					$user = $this -> db
					-> select('first_name, last_name')
					-> where('id', $status -> user_id)
					-> get('tbl_user')
					-> row();	
					//print_r($user);				
				}
				if($status->status == 0 && $start != $status->check_out)
				{
				echo "<td style='background:#FF00FA;width:32px;height:23px;' class='cal_tooltip' data-tooltip='Guest name : ".$user -> first_name.' '.$user -> last_name."'></td>";
				}
				else if($status->status == 1 && $start != $status->check_out){
				echo "<td style='background:#FEFE00;width:32px;height:23px;' class='cal_tooltip' data-tooltip='Guest name : ".$user -> first_name.' '.$user -> last_name."'></td>";
				}
				else if($status->status == 2 && $start != $status->check_out){
				echo "<td style='background:#3BE6ED;width:32px;height:23px;' class='cal_tooltip' data-tooltip='Guest name : ".$user -> first_name.' '.$user -> last_name."'></td>";
				}
				else {
				echo '<td style=background:#03C100;width:32px;height:23px;></td>';
				}
				//}		
			}
			else
			{ 
			$status = $this -> Dashboardmodel -> day_status($id, $r_no->room_number, $start);
			if($status) {
			echo '<td style=background:#FF0000;width:32px;height:23px;></td>';
			} else {
			echo '<td style=background:#03C100;width:32px;height:23px;></td>';
			}
			}
			$start= date("Y-m-d", strtotime("+1 day", strtotime($start)));
		}		
			echo '</tr>';
			
		} ?>
		
		</tr>
		
		</tbody>
		
	</table>
		                        </div>
                                
                                
                                
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
												if($booking->category=='hotel')
													{
													$booking_details = $this->Dashboardmodel->booking_details($booking->booking_number,$id); 
													}
													else
													{
													$booking_details = $this->Dashboardmodel->booking_pack_details($booking->booking_number,$id); 
													} }
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
												//echo $rooms->number_of_rooms;
                                                	  $room += $rooms->number_of_rooms;
                                                	endforeach;
                                                	echo  $room;
                                                	?>
                                                 </td>
                                                 <td><?php  echo date('d/m/y',strtotime($rooms->date));?></td>
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
												if($checkin->category=='hotel')
													{
												$checkin_details = $this->Dashboardmodel->arrival_details($checkin->booking_number,$id);
													}
													else
													{
														$checkin_details = $this->Dashboardmodel->arrival_pack_details($checkin->booking_number,$id);
													}
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
                                                 <td><?php echo date('d/m/y',strtotime($checkin_rooms->date));?></td>
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
    
    


