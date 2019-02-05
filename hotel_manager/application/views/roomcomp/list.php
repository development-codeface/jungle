

<div id="page-wrapper">

            <div class="container-fluid profile-block-cus availability-list_block rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Room Settings
                        </h3>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->  Room Settings
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


              
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                    	
                 
                        
                        
                    	
                        <div class="panel panel-primary">
                            <div class="panel-heading cus_panel_heading">
                                <i class="fa fa-th-list"></i>  Rooms Combination list
                                <div class="pull-right"><a class="btn btn-success" href="<?php echo base_url('roomcomp/add');?>"><span><i class="fa fa-plus"></i></span> Add</a></div>
                		
                
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <!-- <th>Hotel</th> -->
		                                        <th>Room Type</th>
		                                      	<th>Price</th>		                                        
		                                        <!-- <th>Offer Price</th> -->
		                                        <th>Extra Bed rate</th>
		                                        <th>Extra Child rate</th>
		                                        <th>Allowed Persons (adult+child)</th>
		                                        <th>Valid From</th>
		                                        <th>Valid To</th>
		                                        <th>Tax Applicable</th>
		                                       <th colspan="2"></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr <?php if($i%2==0){ echo 'class="active"';} else{ echo 'class="success"';}?>>
		                                        <td><?php echo $i;?></td>
		                                        <!-- <td><?php echo $result->hotel_title;?></td> -->
		                                        <td><?php echo $result->room_title;?></td>
		                                        <td><i class="fa fa-inr"></i> <?php echo $result->price;?></td>
		                                        <!-- <td><?php echo $result->offer_price;?></td> -->
		                                        <td><i class="fa fa-inr"></i> <?php echo $result->room_adult_rate;?></td>
		                                        <td><i class="fa fa-inr"></i> <?php echo $result->room_child_rate;?></td>
		                                        <td><?php echo $result->normal_allowed_adults + $result->normal_allowed_kids;?> (<?php echo $result->normal_allowed_adults. " adult + "  .$result->normal_allowed_kids." child)" ;?></td>
		                                        <td><?php echo date_format(date_create_from_format('Y-m-d', $result->valid_from), 'd-m-Y');?></td>
		                                        <td><?php echo date_format(date_create_from_format('Y-m-d', $result->valid_upto), 'd-m-Y');?></td>
		                                        <td><?php 
			                                        if($result->tax_applicable=='1')
			                                        {
			                                        	echo "Seasonal";
													}
													else
													{
														echo "Off seasonal";
													}
													?>
												</td>
		                                        <td>
												
												<?php 
												 $valiupto = $result->valid_upto;
												 $today = date('Y-m-d');
												
												if($today<$valiupto) {?>
												<a class="admin_edit_btn"  href="<?php echo base_url('roomcomp/edit/'.$result->id.'');?>"><i class="fa fa-fw fa-edit"></i></a></td>
		                                      <?php }
												else
												{?>
													<a class="admin_edit_btn" style=" pointer-events: none;"  href="<?php echo base_url('roomcomp/edit/'.$result->id.'');?>"><i class="fa fa-fw fa-edit"></i></a></td>
		                                     
												<?php }	?>
											  <td><a class="admin_delete_btn" href="<?php echo base_url('roomcomp/delete/'.$result->id.'');?>" onclick="return confirmationDelete();"><i class="fa fa-fw fa-trash"></i></a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="15">No Hotels Found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                     <?php echo $pagination; ?>
                    
                </div>
                <!-- /.row -->
				