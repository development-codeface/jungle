<?php $this->load->view('hotel/side_menu');?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Rooms
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>hotel">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Rooms
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
				<?php
				 $categoryname = $this->uri->segment(3);
				?>

                <div class=" text-right"><a href="<?php echo base_url('roomtype/add/'.$categoryname);?>">Add</a></div>
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms list</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Room Title</th>
		                                        <th>Hotel</th>		                                       
		                                        <th>Room Size</th>
		                                        <th>Beds</th>
		                                        <th>Edit</th>
		                                        <th>Delete</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr <?php if($i%2==0){ echo 'class="active"';} else{ echo 'class="success"';}?>>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->room_title;?></td>
		                                        <td><?php echo $result->title;?></td>
		                                        
		                                        <td><?php echo $result->room_size;?></td>
		                                        <td><?php echo $result->room_beds;?></td>
		                                        
		                                        <td><a href="<?php echo base_url('roomtype/edit/'.$result->id.'');?>">Edit</a></td>
		                                        <td><a href="<?php echo base_url('roomtype/delete/'.$result->id.'/'.$categoryname);?>" onclick="return confirmationDelete()">Delete</a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="9">No Rooms Found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php echo $pagination;?>
                    
                </div>
                <!-- /.row -->
				