<?php $this->load->view('travels/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Travels
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Manage Travels
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
                              <i class="fa fa-th-list"></i> Travels list
                              	
				  <div class=" text-right pull-right add_cus_right_block">
				  	
				  		<a class="btn btn-success" href="<?php echo base_url('travels/add');?>" ><span><i class="fa fa-plus"></i></span> Add Travels</a>
				 	
				  </div>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped table_list_grp">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Address</th>
		                                        <th>Phone No.</th>
		                                        <th>E-mail</th>
		                                        <th>Fax</th>
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
		                                        <td><?php echo $result->address;?></td>
		                                        <td><?php echo $result->contact;?></td>
		                                        <td><?php echo $result->email;?></td>
		                                        <td><?php echo $result->fax;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('travels/edit/'.$result->id.'');?>"> <i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a class="admin_delete_btn" href="<?php echo base_url('travels/delete/'.$result->id.'');?>" onclick="return confirmationDelete();"> <i class="fa fa-fw fa-trash"></i></a></td>
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
				