
<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Send SMS</h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i><a href="<?php echo base_url();?>dashboard"> Dashboard</a></li>
          <li class="active"><!-- <i class="fa fa-edit"></i> -->Send SMS</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-8 col-sm-offset-2">
            <div class="panel panel-primary">
              <div class="panel-heading cus_panel_heading">
               <i class="fa fa-edit"></i> Compose Message
              </div>
              <div class="panel-body  tab_main_content_cus">
                <div class="list-group">
                  
                   <?php
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
				  } else if($this->session->flashdata('error'))
				  {?>     
				    <div class="row">
				                    <div class="col-lg-12">
				                        <div class="alert alert-danger alert-dismissable">
				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                            <?php echo $this->session->flashdata('error');?>
				                        </div>
				                    </div>
				                </div><?php } ?>              


                    <form role="form" method="post">
                    	<div class="cus_border">

                      <div class="form-group col-lg-12">
                        <label class="col-lg-12">Enter contact nos.</label>
                        <input class="col-lg-12 form-control" name="contact" id="contact" value="<?php echo set_value('contact'); ?>" placeholder="comma seperated & without any space between numbers" onkeypress="return onlyNumbers(event)">
<?php echo form_error('contact');?>
                      </div>                    
                  
                        <div class="form-group col-lg-12">
                        <label  class="col-lg-12">Enter your message</label>
                        <textarea class="col-lg-12" rows="3" name="message" id="message" placeholder="max. 160 characters"></textarea>
<?php echo form_error('message');?>
					  </div>
                      
                      <input type="hidden" name="senderid" value="<?php echo $s_id; ?>">
                      
                     </div>
                     </div>

                      <div class="form-group ">
                      	 	<div class="form-group form-footer cus_border3">
                        <button type="submit" name="submit_sms" class="btn btn-primary cus-btn" >Submit</button>
                        <button type="reset" class="btn btn-p cus-btn">Reset</button>
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

