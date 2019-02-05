<?php $this->load->view('user/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

          

            <div class="container-fluid  container-fluid_cus_travel">


                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Users
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>user">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Manage Users
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary panel_primary_travels_cus ">
                            <div class="panel-heading">
                               <i class="fa fa-th-list"></i> Users list
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped table_list_grp" >
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Address</th>
		                                        <th>Phone No.</th>
		                                        <th>E-mail</th>
		                                        <th>City</th>
		                                        <th>Actions</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->first_name.' '.$result->last_name;?></td>
		                                        <td><?php echo $result->address;?></td>
		                                        <td><?php echo $result->phone;?></td>
		                                        <td><?php echo $result->email;?></td>
		                                        <td><?php echo $result->city;?></td>
		                                        <td><?php if($result->status == 1) {
												?><a href="<?php echo base_url('user/block/'.$result->id.'');?>"> Block</a>
		                                        <?php } else {?> <a href="<?php echo base_url('user/unblock/'.$result->id.'');?>"> Unblock</a> <?php } ?></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="7">No users found.</td></tr>';
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
				