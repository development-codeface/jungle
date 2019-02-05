<div id="page-wrapper">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Rooms
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i>  -->Rooms
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


      
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                         
                            
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Rooms list
                            <div class="pull-right">
                            	<a class="btn btn-success" href="<?php echo base_url('roomtype/add');?>"><span><i class="fa fa-plus"></i></span> Add Rooms</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                            <div class="panel-body">
                                
                                
                                <div class="table-responsive rooms_list_block_table">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Room Type</th>
		                                        <!--<th>Hotel</th>-->		                                       
		                                        <th>Room Size</th>
		                                        <th>Beds</th>
		                                        <!-- <th>Price</th>
		                                        <th>Offer Price</th> -->
		                                       <th colspan="2"></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
		                                
		                                if(!empty($results)){
		                                	foreach ($results as $result) { ?>
		                                	
		                                    <tr <?php if($i%2==0){ echo 'class="active"';} else{ echo 'class="success"';}?>>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->room_title;?></td>
		                                        <!--<td><?php echo $result->title;?></td>-->
		                                        
		                                        <td><?php echo $result->room_size;?></td>
		                                        <td><?php echo $result->room_beds;?></td>
		                                        <!-- <td><?php echo $result->room_price;?></td>
		                                        <td><?php echo $result->room_offer_price;?></td> -->
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('roomtype/edit/'.$result->id.'');?>"><i class="fa fa-fw fa-edit "></i></a></td>
		                                       <td><a class="admin_delete_btn" href="<?php echo base_url('roomtype/delete/'.$result->id.'');?>" onclick="return confirmationDelete();"><i class="fa fa-fw fa-trash"></i></a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="7">No Rooms Found.</td></tr>';
		                                }?>
		                                </tbody>
		                            </table>
		                        </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                     <?php echo $pagination; ?>
                    
                    
                </div>
                <!-- /.row -->
				