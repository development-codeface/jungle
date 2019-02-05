<?php $this->load->view('hotel/side_menu');?>
  
<?php
$cat = $this->uri->segment(3);
if($cat=='hotels')
{
	$categoryname="Hotels";
}
if($cat=='resorts')
{
	$categoryname="Resorts";
}
if($cat=='apartments')
{
	$categoryname="Apartments";
}
if($cat=='home')
{
	$categoryname="Home Stays";
}
?>

<div id="page-wrapper" class="wrapper_admin_cus_block">

            <div class="container-fluid  container_fuild_cus_admin_block">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	<?php if(!empty($cat_name)) echo $cat_name; else echo 'Hotels'; ?>
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>hotel">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> <?php echo $categoryname;?>
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
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-th-list"></i> <?php echo $categoryname;?> list
                                <div class="pull-right">
                                	<a class="btn btn-success" href="<?php echo base_url('hotel/add/'.$cat);?>"><span><i class="fa fa-plus"></i></span> Add <?php echo $categoryname;?>
                                		
                                	</a>
                                	
                                </div>
                            </div>
                            <div class="panel-body">
                             
								<div class="row panel col-sm-offset-0">
								<form id="list-search" action="<?php echo base_url();?>hotel/category/<?php echo $cat;?>">
								<div class="col-lg-4 form-group">
								
								<select class="form-control col-lg-12 " name="select_type" id="select_type" onchange="select_search_type()">
								<option value="hotel" <?php if($select_type=='hotel'){?>  selected="selected" <?php }?>> Hotel </option>
									<option value="group" <?php if($select_type=='group'){?>  selected="selected" <?php }?>> Group </option>
								
								</select>
								</div>
								
								<?php if($select_type!='hotel' ){?>
								<div class="col-lg-4 form-group hotel_select" id="" <?php if($select_type=='hotel' || $select_type=='group') {?> style="display:none;" <?php }?>>
								<select class="form-control col-lg-12 select_hotel " name="keyword" id="keyword" >
								<option value=""> --Select-- </option>
								<?php foreach($hotels as $hot): ?>
								<option value="<?php echo $hot -> id ?>"><?php echo $hot -> title.' ('.$hot -> hotel_number.')'; ?></option>
								<?php endforeach; ?>
								</select>
								
								</div>
								<?php } if($select_type!='group'){?>
								<div class="col-lg-4 form-group group_select" id=""  style="display:none; ">
								<select class="form-control col-lg-12 select_group" name="g_keyword" id="keyword" >
							
								<option value=""> --Select-- </option>
								<?php foreach($groups as $group_name): ?>
								<option value="<?php echo $group_name -> id ?>" ><?php echo $group_name -> name; ?></option>
								<?php endforeach; ?>
								</select>
								</div>
								
								<?php } if($select_type=='hotel' ){?>
								
								<div class="col-lg-4 form-group hotel_select" id="" <?php if($select_type==''){?> style="display:none; <?php }?>">
								<select class="form-control col-lg-12 select_hotel " name="keyword" id="keyword" >
								<option value=""> --Select-- </option>
								<?php foreach($hotels as $hot): ?>
								<option value="<?php echo $hot -> id ?>" <?php if(!empty($key)) { if($key == $hot -> id) { echo 'selected'; } } ?>><?php echo $hot -> title.' ('.$hot -> hotel_number.')'; ?></option>
								<?php endforeach; ?>
								</select>
								
								</div>
								<?php } ?>
								
								<?php if($select_type=='group' ){ ?>
								<div class="col-lg-4 form-group group_select" id="" <?php if($select_type==''){?> style="display:none; <?php }?>">
								<select class="form-control col-lg-12 select_group" name="g_keyword" id="keyword" >
							
								<option value=""> --Select-- </option>
								<?php foreach($groups as $group_name): ?>
								<option value="<?php echo $group_name -> id ?>" <?php  if(!empty($key)) { if($key == $group_name -> id) { echo 'selected'; } }  ?>><?php echo $group_name -> name; ?></option>
								<?php endforeach; ?>
								</select>
								</div>
								<?php } ?>
								<div class="col-lg-1 form-group">
								<input class="btn btn-success form-control" name="search" type="submit" value="Submit">
								</div>
								</form>
								
								
								
									
								
								
								</div>
                                
                                <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                        <th>Sl No</th>
		                                        <th>Name</th>
		                                        <th>Address</th>
		                                        <th>Place</th>
		                                        <th>District</th>
		                                        <th>State</th>
		                                        <th>Login</th>
		                                        <th>Edit</th>
		                                        <th>Delete</th>
		                                        <th>Status</th>
		                                        <th></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                <?php $i=1+$page;
										//print_r($results); exit;
		                                if(!empty($results)){
		                                	foreach ($results as $result) {
		                                		
		                                		$state =$this->Reportmodel->select_location($result->state); 
												
												
												//$country =$this->Reportmodel->select_location($result->country);
		                                		 ?>
		                                	
		                                    <tr <?php if($i%2==0){ echo 'class="active"';} else{ echo 'class="success"';}?>>
		                                        <td><?php echo $i;?></td>
		                                        <td><?php echo $result->title;?></td>
		                                        <td><?php echo $result->address;?></td>
		                                        <td><?php echo $result->place;?></td>
		                                        <td><?php echo $state->district;?></td>
		                                        <td><?php echo $state->state;?></td>
		                                         <td><a href="<?php echo base_url();?>../hotel_manager/login/admin_login/<?php echo $result->id;?>/<?php echo $cat;?>">Login</a></td>
		                                        <td><a class="admin_edit_btn" href="<?php echo base_url('hotel/edit/'.$result->id.'/'.$cat);?>"><i class="fa fa-fw fa-edit "></i></a></td>
		                                        <td><a  class="admin_delete_btn" href="<?php echo base_url('hotel/delete/'.$result->id.'/'.$cat);?>" onclick="return confirmationDelete()"><i class="fa fa-fw fa-trash"></i></a></td>
		                                         <td><a href="<?php echo base_url('hotel/changestatus/'.$result->id.'/'.$cat);?>">Block</a></td>
		                                        <td><a href="#" onclick="aff(<?php echo $result->id;?>); return false;" data-toggle="modal" data-target="#myLink">Link</a></td>
		                                    </tr>
		                                <?php $i++;}}
		                                else{
		                                	echo '<tr class="active text-center"><td colspan="10">No Hotels Found.</td></tr>';
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
  <!-- Modal -->
  <div class="modal fade" id="myLink" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Affiliate link</h4>
      </div>
            <div class="modal-body">
                <p>Add this code before the <strong>&lt;/body&gt;</strong> tag in client property website.</p>
                <form class="form-horizontal col-lg-offset-1" role="form">
                  <div class="form-group">
                    <div class="col-lg-11">
                        <textarea rows="8" class="form-control col-sm-12" id="link" readonly></textarea>
                    </div>
                  </div>
                </form>
                
                
                
                
                
                
            </div>
      </div>
      
    </div>
  </div>	