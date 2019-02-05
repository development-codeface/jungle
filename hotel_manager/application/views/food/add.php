

<div id="page-wrapper">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Food Plan</h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard"> Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i> Food Plan</li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

                              



        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Plan Tariffs</h3>
              </div>
              <div class="panel-body tab_main_content_cus">
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
				  }?>                   


                    <form role="form" method="post"  >
                    	<div class="cus_border">
<div class="col-lg-12 cus_border2">
                    	
                      <div class="form-group col-lg-3">
                        <label class="col-lg-6">Breakfast tariff</label>
                        <input class="col-lg-6 form-control" value="<?php if($plan) echo $plan->breakfast; ?>" name="breakfast" id="breakfast">
                      	<?php echo form_error('breakfast');?>
                      </div>
                      
                      <!-- <div class="form-group col-lg-12">
                        <label  class="col-lg-4">Address</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="room_des"></textarea>
                      	</div>
                       </div> -->
                       
                       <div class="form-group col-lg-3">
                        <label class="col-lg-6">Lunch tariff</label>
                        <input class="col-lg-6 form-control" value="<?php if($plan) echo $plan->lunch; ?>" name="lunch" id="lunch">
                      	<?php echo form_error('lunch');?>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-6">Dinner tariff</label>
                        <input class="col-lg-6 form-control" value="<?php if($plan) echo $plan->dinner; ?>" name="dinner" id="dinner">
                      	<?php echo form_error('dinner');?>
                      </div>
                       
                       <div class="form-group col-lg-3">
                        <label class="col-lg-6">All meals tariff</label>
                        <input class="col-lg-6 form-control" value="<?php if($plan) echo $plan->all_meals; ?>" name="all_meals" id="all_meals">
                      	<?php echo form_error('all_meals');?>
                      </div>

					
					</div>
					</div>
					
                      <div class="form-group ">
                      	
                      	 <div class="form-group form-footer cus_border3">
                      	<?php if(empty($plan)) { ?>
                      		
                        <button type="submit" name="plan_sub" class="btn btn-success">Submit</button>
                        
                        <?php } else {?>
                      	
                        <button type="submit" name="plan_edit" class="btn btn-success">Update</button>
                        
                        <?php } ?>
                      
                        <button type="reset" class="btn btn-default">Reset</button>
                        
                      </div>  </div>
                      
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

