<?php $this->load->view('group/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Group
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Manage Groups
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
                              <i class="fa fa-th-list"></i> Groups list
                              	
				  <div class=" text-right pull-right add_cus_right_block">
				  	
				  		<a class="btn btn-success" href="<?php echo base_url('group/add');?>" ><span><i class="fa fa-plus"></i></span> Add Groups</a>
				 	
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
		                                        <th>Edit</th>
		                                        <th>Block</th>
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
		                                       <td><a class="admin_edit_btn" href="<?php echo base_url('group/edit/'.$result->id.'');?>"> <i class="fa fa-fw fa-edit "></i></a></td>
											   <?php if($result->status==1){?>
		                                        <td><a class="admin_delete_btn" title="Block Group" href="<?php echo base_url('group/delete/'.$result->id.'/0');?>" onclick="return confirmationBlock();"> <i class="fa fa-fw fa-unlock"></i></a></td>
											   <?php } else { ?>  <td><a class="admin_delete_btn" title="Unblock Group" href="<?php echo base_url('group/delete/'.$result->id.'/1');?>" onclick="return confirmationUnblock();"> <i class="fa fa-fw fa-lock"></i></a></td>
											    <?php }?>
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
				