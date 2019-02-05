<div id="page-wrapper" >

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Manage Other Packages
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Manage Other Packages
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
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary">
                       
                            
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> List
                            <div class="pull-right">
                            		<a class="btn btn-success" href="<?php echo base_url('ayurveda/add/yoga');?>"><span><i class="fa fa-plus"></i></span>  Add Other Packages</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                            
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                           <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Title</th>
		                                        <th>Description</th>
		                                        <th>Nights</th>
		                                       <th colspan="2"></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr class="active"'>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->title;?></td>
		                                        <td><?php echo $result->description;?></td>
		                                        <td><?php echo $result->days;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('ayurveda/edit/'.$result->id.'/yoga');?>"> <i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a class="admin_delete_btn" href="<?php echo base_url('ayurveda/delete/'.$result->id);?>" onclick="return confirmationDelete(); "> <i class="fa fa-fw fa-trash"></i></a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="7">No results found.</td></tr>';
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
				