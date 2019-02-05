
<?php $this->load->view('report/side_menu');?>

<div class="online_report">
<div id="page-wrapper" class="w_tabs_page_wrapper">

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
                            
                            <!-- <li>
                                <i class="fa fa-fw fa-table"></i> <a href="<?php echo base_url();?>report">Report</a>
                            </li> -->
                            
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Hotel Log
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

<form>

						<div class="col-lg-12">
								<div class="row">
								
								
										<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-frm">
												<input class="col-lg-10 form-control" name="from" id="from" placeholder="From Date"  value="<?php if(!empty($from_date)) echo $from_date; ?>">
											</span>
										</div>
									</div>
									<!--<div class="col-lg-1">
										<label>To</label>
									</div>-->
									<div class="col-lg-2">
										<div class="form-group">
											<span id="sandbox-container-to">
												<input class="col-lg-10 form-control" name="to" id="to" placeholder="To Date"  value="<?php if(!empty($to_date)) echo $to_date; ?>">
											</span>
										</div>
									</div>
										<div class="col-lg-3">
										<div class="form-group">
											<select class="col-lg-12 form-control" name="hotel" id="hotel" >
											<option value="">--All Hotels--</option>
											<?php //}
											foreach($hotels as $hotel)
											{?>
											<option value="<?php echo $hotel->id;?>" 
											<?php if(!empty($hotel_id))
											{ 
												if($hotel_id==$hotel->id)
												{ ?> 
											selected="selected" 
												<?php } 
											} 
											?>
												><?php echo $hotel->title;?></option>
											<?php }?>
											
											
											</select>
										</div>
									</div>	
									
									
								<div class="col-lg-2">
										<div class="form-group ">
												<input class="col-lg-10 btn btn-success" name="search" id="" type="submit" value="Submit">
										</div>
									</div>	
								</div>
						</div>

</form>

							
							

						</div>
                            	
                            	<div class="table-responsive" >
                            		
		                            <table class="table table-bordered table-hover table-striped">
		                            	<thead>
		                            		<tr>
		                            			<th>Sl No.</th>
												<th>Hotel</th>
		                            			<th>Total login</th>
		                            			<th>Total room setting updations</th>
		                            			<th>Total bookings</th>
		                            			<th>Last activity</th>
		                            			</tr>
		                            		</thead>
									<tbody>
									
										<?php 
										if(!empty($report))
										{
$i=1+$page;
										foreach($report as $online_report){ 
												?>
										<tr>
											<td><?php echo  $i++;?></td>
											<td><?php echo $online_report->hotel;?></td>
											<td><?php echo $online_report->login_status;?></td>
											<td><?php echo $online_report->room_set_status;?></td>
											<td><?php echo $online_report->booking_status;?></td>
											<td><?php echo $online_report->date;?></td>
											
										</tr>
										<?php
										}
										}
										else
										{?>
										 <tr class="active text-center hgt_td"><td colspan="6" class="text-center">No results found.</td></tr> 
										<?php }?>
									</tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php if(isset($pagination)) echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
			</div>	
			
<script>
	function confirmationAmend(){
		
		return confirm("Do yo want to amend this booking");
	}
</script>