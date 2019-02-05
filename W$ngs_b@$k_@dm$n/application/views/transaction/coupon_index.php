<?php $this->load->view('transaction/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus   container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Coupons
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Coupons
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
                        <div class="panel panel-primary panel_primary_travels_cus ">
                        
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Manage Coupons
                            <div class="pull-right">
                                	<a class="btn btn-success btn-sm" href=<?php echo base_url('transaction/coupon');?>><span><i class="fa fa-plus"></i></span> Add
                                	</a>
                                	
                                </div>
                        </div>
                            
                            
                            <div class="panel-body">
                              
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped table_list_grp">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Coupon</th>
		                                        <th>Offer</th>	
		                                        <th>Min. amount</th>
		                                        <th>Type</th>	
		                                        <th>Valid from</th>
		                                        <th>Valid to</th>                         
		                                        <th colspan="2"></th>
		                                        
		                                    </tr>
		                                </thead>
		                                <tbody id="commision_list">
		                                <?php
									   if(!empty($coupons))
									   {
									   $i=1+$page;
		                               foreach($coupons as $value):
										   
										
		                               ?>
		                               
		                               <tr class="active">
										 <td><?php echo  $i++;?></td>
										 <td><?php echo  $value->coupon_code;?></td>
										 <td><?php echo  $value->offer.'%';?></td>
										 <td><?php echo  $value->min_amount;?></td>
										 <td><?php if($value->type == 0) echo 'Check-In/Out date'; else echo 'Booking date';?></td>
										 <td><?php echo  date_format(date_create_from_format('Y-m-d', $value->valid_from), 'd/m/Y');?></td>
										 <td><?php echo  date_format(date_create_from_format('Y-m-d', $value->valid_to), 'd/m/Y');?></td>
										 <td><a class="admin_edit_btn" href="<?php echo base_url('transaction/coupon_edit/'.$value->id);?>"><i class="fa fa-fw fa-edit"></i></a></td>
										 <td><a class="admin_delete_btn" href="<?php echo base_url('transaction/coupon_delete/'.$value->id);?>" onclick="return confirmationDelete()"><i class="fa fa-fw fa-trash"></i></a></td>
										
										
									 </tr>
							 		<?php endforeach; 
							 		}
							 		else
							 		{?>
							 
		                                    <tr class="active"'>
		                                        <td colspan="8" align="center">No results Found</td>
		                                        
		                                    </tr>
		                              <?php
									  }?>
		                                </tbody>
		                            </table>
                        <div id="page">
                        	<?php if(!empty($coupons)): echo $pagination; endif;?>
                        </div>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.row -->
				