

<div id="page-wrapper" class="agency_edit_page_cus_block">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit agency </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <li>
          	<i class="fa fa-table"></i>  <a href="<?php echo base_url();?>agency"> Manage</a>
          </li>
           <li class="active"> <!-- <i class="fa fa-edit"></i> --> Edit</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                 <i class="fa fa-edit"></i> Edit agency
              </div>
              <div class="panel-body">
                <div class="list-group">
                  
                   <?php
                   $from = $agency -> valid_from;
                   $to = $agency -> valid_to;
                   
				  if($this->session->flashdata('success'))
				  {?>
				    <div class="row">
				                    <div class="col-lg-12">
				                        <div class="alert alert-success alert-dismissable">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <?php echo $this->session->flashdata('success');?>
				                        </div>
				                    </div>
				                </div>
				   <?php
				  }?>                   


                    <form role="form" method="post">
                    	<div class="form_group_block2_cus_commision">
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Name</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> agency; ?>" name="agency_name" id="agency_name">
                      	<?php echo form_error('agency_name');?>
                      </div>
                      
               
                       
                       <!-- <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Address</label>
                        <textarea  class="col-lg-8 form-control" rows="4" name="agency_address" id="agency_address"><?php echo $agency -> address; ?></textarea>
                       	<?php echo form_error('agency_address');?>
                      </div> -->
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-4">Contact No.</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> contact; ?>" name="agency_contact" id="agency_contact">
                      	<?php echo form_error('agency_contact');?>
                      </div>
                      
					  <div class="form-group col-lg-12"><span style="color: red;">Please add tariff in percentage or normal amount</span><div>
					  
                      <div class="form-group col-lg-6">
                        <label class="col-lg-5">Default Package Tariff</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> default_package_tariff; ?>" name="agency_pack" id="agency_pack" placeholder="eg: 100 or 10%">
                      	<?php echo form_error('agency_pack');?>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-5">Default Room Tariff</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> default_room_tariff; ?>" name="agency_room" id="agency_room" placeholder="eg: 100 or 10%">
                      	<?php echo form_error('agency_room');?>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control" value="<?php if($from != '0000-00-00') echo date_format(date_create_from_format('Y-m-d',$agency -> valid_from), 'd-m-Y'); ?>" name="agency_from" id="agency_from">
                        </span>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-4">Valid To</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control" value="<?php if($to != '0000-00-00') echo date_format(date_create_from_format('Y-m-d',$agency -> valid_to), 'd-m-Y'); ?>" name="agency_to" id="agency_to">
                        </span>
                      </div>
                      
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-6">Package Tariff</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> package_tariff; ?>" name="agency_pack_date" id="agency_pack_date" placeholder="eg: 100 or 10%">
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-6">Room Tariff</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> room_tariff; ?>" name="agency_room_date" id="agency_room_date" placeholder="eg: 100 or 10%">
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-4">E-mail 1</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> email1; ?>" name="agency_email1" id="agency_email1">
                      	<?php echo form_error('agency_email1');?>
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-4">E-mail 2</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> email2; ?>" name="agency_email2" id="agency_email2">
                      </div>
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-4">E-mail 3</label>
                        <input class="col-lg-8 form-control" value="<?php echo $agency -> email3; ?>" name="agency_email3" id="agency_email3">
                      </div>
                             <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Address</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" name="agency_address" id="agency_address"><?php echo $agency -> address; ?></textarea>
                      	</div>
                       	<?php echo form_error('agency_address');?>
                       </div>
                        </div>
			 <div class="form_group_block3_cus_commision">
                      <div class="form-group col-lg-12">
                        <button type="submit" name="agency_edit" id="agency_sub" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                        </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
     
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row --> 

