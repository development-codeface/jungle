<?php $this->load->view('packages/side_menu');?>
  

<div id="page-wrapper" class="add_room wrapper_admin_cus_block2">

            <div class="container-fluid  container_fuild_cus_admin_block3">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Packages
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>packages">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Manage Packages
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <i class="fa fa-th-list"></i> Package list
                                 <div class=" pull-right container_fuild_cus_admin_block3_add_new_cus">
				  	
				  	<a class="btn btn-success" href="<?php echo base_url('packages/add');?>"><span><i class="fa fa-plus"></i></span> Add Package</a>
				  
				  </div>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped container_fuild_cus_admin_block3_table_cus">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Package</th>
		                                        <th>Duration</th>
		                                        <th>View</th>
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
		                                        <td><?php echo $result->title;?></td>
		                                        <td><?php echo $result->nights. "&nbsp;Nights," .$result->days. "&nbsp;Days";?></td>
		                                        <td><a href="<?php echo base_url('packages/view/'.$result->id.'');?>"> View</a></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('packages/edit/'.$result->id.'');?>"> <i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a class="admin_delete_btn" href="<?php echo base_url('packages/delete/'.$result->id.'');?>" onclick="return confirmationDelete(); "> <i class="fa fa-fw fa-trash"></i></a></td>
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
				