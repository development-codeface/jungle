<?php $this->load->view('hotel/side_menu');?>


<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Room Settings
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i>  Room Settings
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
				<?php
				$categoryname=$this->uri->segment(3);
				?>

                <div class=" text-right"><a href="<?php echo base_url('roomcomp/add/'.$categoryname);?>">Add</a></div>
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms Combination list</h3>
                            </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Hotel</th>
		                                        <th>Room</th>
		                                      	<th>Price</th>		                                        
		                                        <th>Offer Price</th>
		                                        <th>Extra Adult rate</th>
		                                        <th>Extra Child rate</th>
		                                        <th>No: of Rooms</th>
		                                        <th>Conditions</th>
		                                        <th>Allowed Persons</th>
		                                        <th>Valid From</th>
		                                        <th>Valid To</th>
		                                        <th>Tax Applicable</th>
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
		                                        <td><?php echo $result->hotel_title;?></td>
		                                        <td><?php echo $result->room_title;?></td>
		                                        <td><?php echo $result->price;?></td>
		                                        <td><?php echo $result->offer_price;?></td>
		                                        <td><?php echo $result->room_adult_rate;?></td>
		                                        <td><?php echo $result->room_child_rate;?></td>
		                                        <td><?php echo $result->num_rooms;?></td>
		                                        <td><?php echo $result->conditions;?></td>
		                                        <td><?php echo $result->allowed_persons;?></td>
		                                        <td><?php echo $result->valid_from;?></td>
		                                        <td><?php echo $result->valid_upto;?></td>
		                                        <td><?php 
			                                        if($result->tax_applicable=='1')
			                                        {
			                                        	echo "Yes";
													}
													else
													{
														echo "No";
													}
													?>
												</td>
		                                        <td><a href="<?php echo base_url('roomcomp/edit/'.$result->id.'/'.$categoryname);?>">Edit</a></td>
		                                          <td><a href="<?php echo base_url('roomcomp/delete/'.$result->id.'/'.$categoryname);?>" onclick="return confirmationDelete()">Delete</a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="15">No Hotels Found.</td></tr>';
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
				