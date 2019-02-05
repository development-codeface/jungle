<?php //$this->load->view('group/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Hotels 
                        </h1>
                        <!-- BreadCrumbs >> -->
                       
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


			
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary panel_primary_travels_cus">
                            <div class="panel-heading">
                              <i class="fa fa-th-list"></i> Hotel list
                              	
				  <div class=" text-right pull-right add_cus_right_block">
				  	
				  		
				 	
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
		                                        <th>Login</th> 
		                                      <!--  <th>Delete</th> -->
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->title;?></td>
		                                        <td><?php echo $result->address;?></td>
		                                    <td><a class="admin_edit_btn" href="<?php echo base_url();?>login/group_login/<?php echo $result->id;?>"> Login</a></td>
		                                        <!---<td><a class="admin_delete_btn" href="<?php echo base_url('group/delete/'.$result->id.'');?>" onclick="return confirmationDelete();"> <i class="fa fa-fw fa-trash"></i></a></td>
		                                   --> </tr>
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
				