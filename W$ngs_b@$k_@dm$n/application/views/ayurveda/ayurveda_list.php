<?php $this->load->view('ayurveda/side_menu');?>
  

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Manage Ayurveda
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>ayurveda">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Manage Ayurveda
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				  <div class=" text-right">
				  	<p>
				  		<a class="btn btn-success" href="<?php echo base_url('ayurveda/add/ayurveda');?>"><span><i class="fa fa-plus-square"></i></span> Add Ayurveda</a>
				  		
				  	</p>
				  </div>
				<div class="row">
					
					
					
                    <div class="col-lg-12"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> List</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive ">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Hotel</th>
		                                        <th>Title</th>
		                                        <th>Description</th>
		                                        <th>Days</th>
		                                        <th>Edit</th>
		                                        <th>Delete</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr class="active"'>
		                                        <td><?php echo $i; ?></td>
		                                        <td><?php $hotel = $this -> Ayurveda_model -> hotel_name($result->hotel_id);
		                                        	echo $hotel -> title;?></td>
		                                        <td><?php echo $result->title;?></td>
		                                        <td><?php echo $result->description;?></td>
		                                        <td><?php echo $result->days;?></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('ayurveda/edit/'.$result->id.'/ayurveda');?>"> <i class="fa fa-fw fa-edit "></i> </a></td>
		                                        <td><a class="admin_delete_btn" href="<?php echo base_url('ayurveda/delete/'.$result->id.'');?>" onclick="return confirmationDelete(); "> <i class="fa fa-fw fa-trash"></i></a></td>
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
				