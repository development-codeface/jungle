

 <div id="page-wrapper" class="w_tabs_page_wrapper add_travels_cus_block">

            <div class="container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Email Settings
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Email
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                
<div class="row">
          <div class="col-lg-7 col-sm-offset-2">
            <div class="panel panel-primary">
              <div class="panel-heading cus_panel_heading">
               <i class="fa fa-list"></i>
              </div>
              <div class="panel-body  tab_main_content_cus">
                <div class="list-group">
                     <?php
   if($this->session->flashdata('success'))
   {
   	?>

                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>

   	<?php
   }
            
   if($this->session->flashdata('error'))
   {
   	?>

                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('error');?>
                        </div>

   	<?php
   }?>
                                 


                    <form role="form" method="post" enctype="">
                    	<div class="cus_border">
                    		<div class="col-lg-12 cus_border2">
							
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							
							<div class="form-group col-lg-12">
                        <label class="col-lg-4">E-mail host</label>
                        <input class="col-lg-8 form-control" name="host" id="host" value="<?php if(!empty($mail -> mail_host)) echo $mail -> mail_host ?>">
						<?php echo form_error('host');?>
                      </div>
							
							<div class="form-group col-lg-12">
                        <label class="col-lg-4">E-mail port no.</label>
                        <input class="col-lg-8 form-control" onkeypress="return onlyNumbers(event)" name="port" id="port" value="<?php if(!empty($mail -> mail_port)) echo $mail -> mail_port ?>">
						<?php echo form_error('port');?>
                      </div>
							
							<div class="form-group col-lg-12">
                        <label class="col-lg-4">E-mail username</label>
                        <input class="col-lg-8 form-control" name="user" id="user" value="<?php if(!empty($mail -> mail_user)) echo $mail -> mail_user ?>">
						<?php echo form_error('user');?>
                      </div>
					  
					  <?php if(!empty($mail -> mail_pass)) { ?>
					  
					  <div class="form-group col-lg-12">
                        <label class="col-lg-4">Current E-mail password</label>
                        <input class="col-lg-8 form-control" type="password" name="curr_pass" id="curr_pass" value="">
						<?php echo form_error('pass');?>
                      </div>
							
							<div class="form-group col-lg-12">
                        <label class="col-lg-4">New E-mail password</label>
                        <input class="col-lg-8 form-control" type="password" name="pass" id="pass" value="">
						<?php echo form_error('pass');?>
                      </div>
					  <?php } else { ?>
					  
					  <div class="form-group col-lg-12">
                        <label class="col-lg-4">E-mail password</label>
                        <input class="col-lg-8 form-control" type="password" name="pass" id="pass" value="">
						<?php echo form_error('pass');?>
                      </div>
					  
					  <?php } ?>
					  
                     </div>
                     </div>

                      <div class="form-group ">
                      	 	<div class="form-group form-footer cus_border3">
                        <input type="submit" name="mail_submit" class="btn btn-primary cus-btn" id="opt_submit" value="Submit">
                        <button type="reset" class="btn btn-p cus-btn">Reset</button>
                      </div>
                       </div>
                    </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

                <!-- /.row -->
				


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
