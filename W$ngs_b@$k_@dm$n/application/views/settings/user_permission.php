<?php $this->load->view('settings/side_menu');?>

<div id="page-wrapper" class="w_tabs_page_wrapper">

            <div class="container-fluid container-fluid_cus_travel">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          User Permission
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>settings/users">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> --> Set permission
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                


				
				
				
				<div class="row">
					
					
					
                    <div class="col-lg-10 col-sm-offset-1"><?php echo $this->session->flashdata('msg'); ?>
                        <div class="panel panel-primary panel_primary_travels_cus">
                            <div class="panel-heading">
                                <i class="fa fa-th-list"></i> User Options
                            </div><div class="panel-body">
                     <?php
   if($this->session->flashdata('success'))
   {
   	?>

                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>

   	<?php
   }?>
							<form method="post">
                             
								<div class="row panel col-sm-offset-4">
								<div class="col-lg-4 form-group">
								
								<select class="form-control col-lg-12 " name="user" id="user" onchange="user_perm()" required>
								<option value=""> -Select User-</option>
								
								<?php foreach($users as $u) { ?>
								<option value="<?php echo $u -> id; ?>" <?php if($this->session->flashdata('user') == $u -> id) echo 'selected'; ?>> <?php echo $u -> username; ?></option>
								<?php } ?>
								</select>
								</div>
								
								</div>
                 
				 <div id="menu">
<?php if($this->session->flashdata('user')) { $data['user_menu'] = $this->Settingsmodel->select_user_menu($this->session->flashdata('user')); 

$this -> load -> view('settings/menu_options', $data); }
?>
                    	
					
					</div>
					<div class="form_group_block3_cus_commision">			
											<div class="form-group col-md-12">
												<button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
											</div>
											</form>
                 
                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
				