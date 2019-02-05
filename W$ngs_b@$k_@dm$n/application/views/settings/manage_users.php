<?php $this->load->view('settings/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Site Users
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>settings/users">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Manage Site Users
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				
				
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary panel_primary_travels_cus">
                            <div class="panel-heading">
                                <i class="fa fa-th-list"></i> Site  Users list
                                 <div class=" text-right pull-right add_cus_right_block">
				  	
				  	<a class="btn btn-success" href="<?php echo base_url('settings/users');?>"><span><i class="fa fa-plus"></i></span> Add</a>
				  	
				  </div>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped table_list_grp">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Username</th>
		                                        <th>Created By</th>
		                                        <th>Edit</th>
		                                        <th>Delete</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->name;?></td>
		                                        <td><?php echo $result->username;?></td>
		                                        <td><?php echo $result->created_by;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('settings/editusers/'.$result->id.'');?>"> <i class="fa fa-fw fa-edit"></i></a></td>
		                                        <td><?php if($result->status == 1) {
												?><a href="<?php echo base_url('settings/changestatus/'.$result->id.'/0');?>"> <i class="fa fa-fw fa-trash fa_trash_color icon_cus_size"></i></a>
		                                        <?php } else {?> <a class="admin_unlock_btn" href="<?php echo base_url('settings/changestatus/'.$result->id.'/1');?>"> <i class="fa fa-fw fa-unlock icon_cus_size"></i></a> <?php } ?></td>
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
				