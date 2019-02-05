<div id="page-wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Agency
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Agency
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


                <div class=" text-right">
                	<p>
                		
                	</p>
                </div>
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                        
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Manage Agencies
                            <div class="pull-right">
                            	<a class="btn btn-success" href="<?php echo base_url('agency/add');?>"><span><i class="fa fa-plus"></i></span> Add new agency</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                            
                            
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Address</th>		                                       
		                                        <th>Contact</th>
		                                        <th>Email</th>
		                                        <th>Package Tariff</th>
		                                        <th>Room Tariff</th>
		                                        <th colspan="2"></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
										
										if(empty($agency_bw)){?>
										<tr>
										<td><?php echo $i;?></td>
										<td>bookingwings.com</td>
										<td colspan="5"></td>
										 <td><a class="admin_edit_btn" href="<?php echo base_url('offers/add');?>"><i class="fa fa-fw fa-gift "></i></a></td>
										<td colspan="2"><a class="admin_edit_btn" href="<?php echo base_url('agency/edit_bw/');?>"><i class="fa fa-fw fa-edit "></i></a></td>
										</tr>
		                                <?php
										}
										else {?>
		                                    <tr>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $agency_bw->agency;?></td>
		                                        <td><?php echo $agency_bw->address;?></td>
		                                        <td><?php echo $agency_bw->contact;?></td>
		                                        <td><?php echo $agency_bw->email1;?></td>
		                                         <td><?php echo $agency_bw->package_tariff;?></td>
		                                        <td><?php echo $agency_bw->room_tariff;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('offers/add');?>"><i class="fa fa-fw fa-gift "></i></a></td>
		                                        <td colspan="2"><a class="admin_edit_btn" href="<?php echo base_url('agency/edit_bw/'.$agency_bw->id);?>"><i class="fa fa-fw fa-edit "></i></a></td>
		                                    </tr>
										<?php }
										$i++;
		                                if(!empty($agency)){
		                                	foreach ($agency as $tbl_agency) { ?>
		                                	
		                                    <tr>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $tbl_agency->agency;?></td>
		                                        <td><?php echo $tbl_agency->address;?></td>
		                                        <td><?php echo $tbl_agency->contact;?></td>
		                                        <td><?php echo $tbl_agency->email1;?></td>
		                                          <td><?php echo $tbl_agency->package_tariff;?></td>
		                                        <td><?php echo $tbl_agency->room_tariff;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('agency/edit/'.$tbl_agency->id);?>"><i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a class="admin_delete_btn" onclick="return confirmationDelete();" href="<?php echo base_url('agency/delete/'.$tbl_agency->id);?>"><i class="fa fa-fw fa-trash"></i></a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                //else{
		                                //	echo '<tr class="text-center"><td colspan="8">No agencies added.</td></tr>';
		                                //}?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				