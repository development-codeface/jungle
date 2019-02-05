<div id="page-wrapper" class="add_room profile-block-cus">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Bookingwings Offer
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->  Bookingwings Offer
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
                            <i class="fa fa-th-list"></i> Bookingwings Offer List
                            <div class="pull-right">
                            	<a class="btn btn-success" href="<?php echo base_url('offers/add');?>"><span><i class="fa fa-plus"></i></span> Add Bookingwings Offer</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                        
                        
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <!-- <th>Room</th> -->
		                                        <th>Offer Type</th>		                                       
		                                        <th>From</th>
		                                        <th>To</th>
		                                        <th>Offer</th>
		                                        <th colspan="2"></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                
		                                if(!empty($offer)){
		                                	foreach ($offer as $tbl_offers) { ?>
		                                	
		                                    <tr>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $tbl_offers->offer_type;?></td>
		                                        <td><?php echo date_format(date_create_from_format('Y-m-d', $tbl_offers->from_date), 'd-m-Y');?></td>
		                                        <td><?php echo date_format(date_create_from_format('Y-m-d', $tbl_offers->to_date), 'd-m-Y');?></td>
		                                        <td><?php echo $tbl_offers->offer;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('offers/edit/'.$tbl_offers->id);?>"><i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a class="admin_delete_btn" onclick="return confirmationDelete();" href="<?php echo base_url('offers/delete/'.$tbl_offers->id);?>"><i class="fa fa-fw fa-trash"></i></a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="7">No offers added.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                     <?php echo $pagination; ?>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				