<?php $this->load->view('hotel/side_menu');?>
  

<div id="page-wrapper" class="wrapper_admin_cus_block">

            <div class="container-fluid  container_fuild_cus_admin_block">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	Set Access
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>hotel">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Set options
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
				
				
				<div class="row">
					
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-th-list"></i>
                                <div class="pull-right">
                                	<!--<a class="btn btn-success" href="<?php echo base_url('hotel/add/'.$cat);?>"><span><i class="fa fa-plus"></i></span> Add <?php echo $categoryname;?>
                                		
                                	</a>-->
                                	
                                </div>
                            </div>
<div class="panel-body h_facilities_block">
<?php 
                                   		 if($this->session->flashdata('success'))
										 {?>
										 	  
										 		<?php
										 	echo '<div class="alert alert-success ">'.$this->session->flashdata('success').'</div>';
											?>
											
											<?php
										 }
		                  				 ?>
						<div class="list-group">
						  <div class="panel col-md-12 "><div class="row panel col-sm-offset-2">
								<div class="col-lg-4 form-group">
								
								<select class="form-control col-lg-12 " name="access_type" id="access_type">
								<option value=""> -Select-</option>
								<option value="8" <?php if($this->session->flashdata('cat') == 8) echo 'selected'; ?>> Hotels</option>
								<option value="2" <?php if($this->session->flashdata('cat') == 2) echo 'selected'; ?>> Resorts</option>
								<option value="3" <?php if($this->session->flashdata('cat') == 3) echo 'selected'; ?>> Home stays</option>
								<option value="4" <?php if($this->session->flashdata('cat') == 4) echo 'selected'; ?>> Apartments</option>
								</select>
								</div>
								
								<div class="col-lg-4 form-group hotel_select" id="">
								<select class="form-control col-lg-12 select_hotel " name="h_keyword" id="h_keyword">
								<option value=""> -Select-</option>
								<?php if(!empty($hotels)) { 
								foreach($hotels as $hot):
								?>
								<option value="<?php echo $hot -> id ?>" <?php if($this->session->flashdata('hotel') == $hot -> id) echo 'selected'; ?>> <?php echo $hot -> title; ?></option>
								<?php endforeach; } ?>
								</select>
								</div>
								
								</div>

							<form method="post" action="<?php //echo base_url().'hotel_access/create'; ?>">
							<div class="container-fluid  hotel_fac">
							<?php if($this->session->flashdata('hotel')) {
							$dat = $this->Hotelmodel->access_options($this->session->flashdata('hotel'));
							?>
							<h4>Access Options</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								
								<input type="hidden" class="css-checkbox services" value="<?php echo $this->session->flashdata('hotel'); ?>" name="hotel_id" >
								
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="off_on_book" <?php if(!empty($dat) && $dat -> off_on_book ==1) echo 'checked'; ?>>
								  <label> Offline & Online Booking</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="channel_mgmt" <?php if(!empty($dat) && $dat -> channel_mgmt ==1) echo 'checked'; ?>>
								  <label> Channel Management</label> </span>
							  <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="promotion" <?php if(!empty($dat) && $dat -> promotion ==1) echo 'checked'; ?>>
								 <label> Promotion Activities</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="book_engine" <?php if(!empty($dat) && $dat -> book_engine ==1) echo 'checked'; ?>>
								  <label> Booking Engine</label>  </span>
							  </div>
							<?php } ?>
							</div>
								<div class="col-lg-12 form-group">
								<input class="btn btn-success form-control" name="submit" type="submit" value="Submit" <?php if(!$this->session->flashdata('hotel')) echo 'disabled'; ?>>
								</div>
								</form>
						  </div>
						</div>
					  </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
