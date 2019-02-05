
<div id="page-wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Hotel  Staff
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i>  -->Manage Staff
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				<div class="row">
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary">
                          
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Staff List
                             <div class="pull-right">
							<?php
							if($this -> session -> userdata['user_type']=='manager')
							{?>
						<a class="btn btn-success" href="<?php echo base_url('settings/menu_setting');?>"><span><i class="fa fa-plus"></i></span> Menu Setting</a>
                             
							<?php }?>
                            	<a class="btn btn-success" href="<?php echo base_url('settings/users');?>"><span><i class="fa fa-plus"></i></span> Add</a>
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
		                                        <th>Username</th>
		                                        <th>Edit</th>
		                                        <th>Block/Unblock</th>
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
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('settings/editusers/'.$result->id.'');?>"> <i class="fa fa-fw fa-edit"></i></a></td>
		                                        <td><?php if($result->status == 1) {
												?><a class="admin_unlock_btn" href="<?php echo base_url('settings/changestatus/'.$result->id.'/0');?>"> <i class="fa fa-fw fa-lock"></i></a>
		                                        <?php } else {?> <a class="admin_unlock_btn" href="<?php echo base_url('settings/changestatus/'.$result->id.'/1');?>"> <i class="fa fa-fw fa-unlock"></i></a> <?php } ?></td>
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
				