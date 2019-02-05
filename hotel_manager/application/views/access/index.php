 <div id="page-wrapper" class="w_tabs_page_wrapper add_travels_cus_block">

            <div class="container-fluid  container-fluid_cus_travels">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Access Options
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-edit"></i> --> Access Options
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
 <div class="col-lg-10 col-sm-offset-1">    
				   	<?php
   if($this->session->flashdata('error'))  {
   	?>

                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('error');?>
                        </div>

   	<?php
   }
   ?>           
<div class="row access-block-cus">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#tabs-1">Code</a></li>
			<li><a data-toggle="tab" href="#tabs-2">Images</a></li>
		 <li><a data-toggle="tab" href="#tabs-3">Promotion</a></li>
			<li><a data-toggle="tab" href="#tabs-4">Channel Management</a></li>
		</ul>
		<div class="tab-content">
		
			<div id="tabs-1" class="tab-pane fade in active  tab_main_content_cus">
			
<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Affiliate Code</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
					<div class="panel col-md-12">
                     			    <p>Add this code before the <strong>&lt;/body&gt;</strong> tag in client property website.</p>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <div class="col-lg-11">
                        <textarea rows="4" class="form-control col-sm-12" id="link" readonly=""><div id="wd_id"></div><script type="text/javascript">document.getElementById("wd_id").innerHTML='<iframe src="http://www.bookingwings.com/hotel_detail/widget/<?php echo $id; ?>" style="position: fixed !important; border: 0px !important; bottom: 0px !important; right: 0px !important; top:32px !important"></iframe>';</script></textarea>
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
		<div id="tabs-2" class="tab-pane fade  tab_main_content_cus">
		<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Images</h3>
              </div>
              <div class="panel-body">
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
   }?>
                                 


                    <form role="form" method="post" enctype="multipart/form-data">
                    	<div class="cus_border">
                    		<div class="col-lg-12 cus_border2">
							
							<input type="hidden" name="id" value="<?php echo $id; ?>">
					  
					  <?php if(!empty($access) && $access -> promotion) {
$flag = true;					  ?>
                      <div class="form-group col-lg-12">
                        <label class="col-lg-5">Promotion / Offer image</label>
                        <input class="col-lg-7  " type="file" name="offer_img" id="offer_img"><?php if(!empty($result['engine_bg']->offer_img)) { ?>
							<br><br><img src="<?php echo base_url(). '../'.$result['engine_bg']->offer_img;?>" height='200' />
							
							<div class="pull-right" style="margin-top: 5px;"><button type="button" class="btn btn-xs btn-danger pull-left hotel_image_remove" value="ofr" onclick="img_del(this.value)">Delete</button></div>
							<?php } ?>
                      </div>
                      
					  <?php } if(!empty($access) && $access -> book_engine) { 
$flag = true;					  ?>
                      <div class="form-group col-lg-12">
                        <label class="col-lg-5">Booking engine image</label>
                        <input class="col-lg-7  " type="file" name="engine_img" id="engine_img"><br><br><span style="color : red;">Image size - 1600 x 450 & File size < 500KB</span><?php if(!empty($result['engine_bg']->engine_img)) { ?>
							<br><img src="<?php echo base_url(). '../'.$result['engine_bg']->engine_img;?>" height='200' />
							
						<div class="pull-right" style="margin-top: 5px;"><button type="button" class="btn btn-xs btn-danger pull-left hotel_image_remove" value="eng" onclick="img_del(this.value) ">Delete</button></div><?php } ?>
						<br><br>
						<!--<label><a href="#" onclick="aff(<?php echo $id;?>); return false;" data-toggle="modal" data-target="#myLink">Affiliate link</a></label> -->
							
                      </div>
					  <?php } ?>
					  
                     </div>
                     </div>

					 <?php if(!empty($flag)) { ?>
                      <div class="form-group ">
                      	 	<div class="form-group form-footer cus_border3">
                        <input type="submit" name="opt_submit" class="btn btn-primary cus-btn" id="opt_submit" value="Submit">
                        <button type="reset" class="btn btn-p cus-btn">Reset</button>
                      </div>
                       </div>
					   <?php } else echo '<label>Sorry, this option is disabled</label>'; ?>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

		</div>
		<div id="tabs-3" class="tab-pane fade  tab_main_content_cus">
		 <div class="col-lg-7 col-sm-offset-2" style="margin-top: 20px;    margin-bottom: 30px;padding:0">
			<?php if(!empty($access) && $access -> promotion) { ?>
            <div class="panel panel-primary" style="    border: 1px solid #347ab8;">
              <div class="panel-heading cus_panel_heading" style="color: #fff;background-color: #337ab7;border-color: #337ab7;">
               <i class="fa fa-list"></i>
			   PROMOTION
              </div>
              <div class="panel-body  tab_main_content_cus">
			  
			  </div>
			</div>
			<?php } ?>
		</div>
		</div>
		<div id="tabs-4" class="tab-pane fade  tab_main_content_cus">
		
		<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Channel Mgmt.</h3>
              </div>
			  
			  <?php if(!empty($access) && $access -> channel_mgmt) { ?>
              <div class="panel-body"><label>Daywise Inventory</label>
                <div class="list-group">
					<div class="panel col-md-12">
			  <form method="post" action="<?php echo base_url() ?>hotel_access/inventory_update">
                                   					
												<div class="col-md-12">
													
													
												<div class="form_group_block2_cus_commision">
									
									<div class="form-group col-lg-10 add_date">
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-12 form-control " name="from" id="from">
                        </span>
                      </div>   
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12">Valid Upto</label>
                         <span id="sandbox-container4">
                        <input class="col-lg-12 form-control " name="to" id="to">
                        </span>
                      </div>
					  </div>
					  
					  <div class="form-group col-lg-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
					  </div>

 											  </div>		
				  </div>
				                        </form>
					</div>
                </div>
              </div>
			  
              <div class="panel-body"><label>Daywise Price Update</label>
                <div class="list-group">
					<div class="panel col-md-12">
			  <form method="post" action="<?php echo base_url() ?>hotel_access/price_update">
                                   					
												<div class="col-md-12">
													
													
												<div class="form_group_block2_cus_commision">
									
									<div class="form-group col-lg-10 add_date">
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12"> From</label>
                        <span id="sandbox-container-cin">
                        <input class="col-lg-12 form-control " name="from" id="from">
                        </span>
                      </div>   
                      
                      <div class="form-group col-lg-4">
                        <label class="col-lg-12">To</label>
                         <span id="sandbox-container-cout">
                        <input class="col-lg-12 form-control " name="to" id="to">
                        </span>
                      </div>
					  </div>
					  
					  <div class="form-group col-lg-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit-button">Submit</button>
					  </div>

 											  </div>	
				  </div>
				                        </form>
					</div>
                </div>
              </div>
			<?php } else echo '<div class="panel-body"><label>Sorry, this option is disabled</label></div>'; ?>
            </div>
          </div>
        </div>

		</div>
</div>
</div>
                <!-- /.row -->
				
</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
