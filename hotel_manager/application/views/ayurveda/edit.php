<?php 
$category_name = $this->uri->segment(4); 
?>

<div id="page-wrapper" class="pack_ayurveda_block7">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Package - <?php if($category_name == 'yoga') { echo "Other Packages"; } else { echo $category_name; }?></h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
          <?php if($category_name == 'yoga') {?>
          <li> <i class="fa fa-table"></i> <a href="<?php echo base_url();?>ayurveda/list_yoga">Manage</a> </li><?php } else {?>
          	<li> <i class="fa fa-table"></i> <a href="<?php echo base_url();?>ayurveda/list_ayurveda">Manage</a> </li><?php } ?>
           <li class="active"> <i class="fa fa-edit"></i> Edit Package </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>
    <!-- Page Heading << -->
  
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
  }if($this->session->flashdata('error'))
  {?>
  	  <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <?php echo $this->session->flashdata('error');?>
                        </div>
                    </div>
                </div>
  <?php
  }
    ?>   
        
  <form id="edit_pack" class="profile_tab_cus_block_1" role="form" enctype="multipart/form-data" action="" method="post">
  	
  		<input type="hidden" name="id" value="<?php echo $tbl_ayurveda->id;?>" />
  		
  		
  		
  	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Package Details</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Itinerary Details</a></li>
	</ul>
		
	<br>
	
  
    <div  class="tab-content">

      <div id="tabs-1" class="tab-pane fade in active tab_main_content_cus">
      	
      
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Packages</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                      <div class="form-group col-lg-6" style="display: none">
                        <label class="col-lg-3">Hotel</label>
                        <select class="col-lg-6 form-control" name="hotel" id="hotel">
                        	<?php foreach ($hotel as $tbl_hotel) { ?>
                        		
								<option value="<?php echo $tbl_hotel->id; ?>"
									
									<?php if($tbl_ayurveda->hotel_id == $tbl_hotel->id) echo "selected"; ?>>
									
									<?php echo $tbl_hotel->title; ?>
									
								</option>
								
							<?php } ?>
							
                        </select>
                        <span class="text-danger"><?php echo form_error('hotel');?></span>
                      </div>
                      
                      <div class="form-group col-lg-6" style="display: none">
                        <label class="col-lg-3">Category</label>
                        <select class="col-lg-6 form-control" name="category" id="category">
                        	
                        	<?php foreach ($sub_category as $tbl_sub_category) { ?>
                        		
								<option value="<?php echo $tbl_sub_category->id; ?>"
									
									<?php if($tbl_ayurveda->category == $tbl_sub_category->id) echo "selected"; ?>>
									
									<?php echo $tbl_sub_category->name; ?>
									
								</option>
								
							<?php } ?>
							
                        </select>
                        <span class="text-danger"><?php echo form_error('category');?></span>
                      </div>
                  	
					
					
					<?php
					if($category_name=='yoga')
					{?>
							 <div class="form-group col-lg-6">
	                        <label class="col-lg-3">Name</label>
	                        <input type="text" name="title" id="title" class="col-lg-3 form-control" value="<?php echo $tbl_ayurveda->title;?>" />
                           <span class="text-danger"><?php echo form_error('days');?></span>
                      </div>
                      
                      <!---<div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
						<select class="col-lg-6 form-control" name="title" id="title">
								<option value="">----Select----</option>
								<option value="Anusara Yoga" <?php if($tbl_ayurveda->title=='Anusara Yoga'):?> selected="selected" <?php endif;?>>Anusara Yoga</option>
								<option value="Ashtanga Yoga" <?php if($tbl_ayurveda->title=='Ashtanga Yoga'):?> selected="selected" <?php endif;?>>Ashtanga Yoga</option>
								<option value="Ayurveda Yoga" <?php if($tbl_ayurveda->title=='Ayurveda Yoga'):?> selected="selected" <?php endif;?>>Ayurveda Yoga</option>
								<option value="Bikram / Hot Yoga" <?php if($tbl_ayurveda->title=='Bikram / Hot Yoga'):?> selected="selected" <?php endif;?>>Bikram / Hot Yoga</option>
								<option value="Hatha Yoga" <?php if($tbl_ayurveda->title=='Hatha Yoga'):?> selected="selected" <?php endif;?>>Hatha Yoga</option>
								<option value="Iyengar Yoga" <?php if($tbl_ayurveda->title=='Iyengar Yoga'):?> selected="selected" <?php endif;?>>Iyengar Yoga</option>
								<option value="Kundalini Yoga"<?php if($tbl_ayurveda->title=='Kundalini Yoga'):?> selected="selected" <?php endif;?>>Kundalini Yoga</option>
								<option value="Tantra Yoga" <?php if($tbl_ayurveda->title=='Tantra Yoga'):?> selected="selected" <?php endif;?>>Tantra Yoga</option>
								<option value="Vinyasa Yoga" <?php if($tbl_ayurveda->title=='Vinyasa Yoga'):?> selected="selected" <?php endif;?>>Vinyasa Yoga </option>
								<option value="Yin Yoga" <?php if($tbl_ayurveda->title=='Yin Yoga'):?> selected="selected" <?php endif;?>>Yin Yoga</option>
								<option value="Dynamic Yoga" <?php if($tbl_ayurveda->title=='Dynamic Yoga'):?> selected="selected" <?php endif;?>>Dynamic Yoga</option>
								<option value="General Yoga" <?php if($tbl_ayurveda->title=='General Yoga'):?> selected="selected" <?php endif;?>>General Yoga</option>
								<option value="Integral yoga" <?php if($tbl_ayurveda->title=='Integral Yoga'):?> selected="selected" <?php endif;?>>Integral yoga</option>
								<option value="Jivamukti Yoga" <?php if($tbl_ayurveda->title=='Jivamukti Yoga'):?> selected="selected" <?php endif;?>>Jivamukti Yoga</option>
								<option value="Kripalu Yoga" <?php if($tbl_ayurveda->title=='Kripalu Yoga'):?> selected="selected" <?php endif;?>>Kripalu Yoga</option>
								<option value="Kriya Yoga" <?php if($tbl_ayurveda->title=='Kriya Yoga'):?> selected="selected" <?php endif;?>>Kriya Yoga</option>
								<option value="Nidra Yoga" <?php if($tbl_ayurveda->title=='Nidra Yoga'):?> selected="selected" <?php endif;?>>Nidra Yoga</option>
								<option value="Power Yoga" <?php if($tbl_ayurveda->title=='Power Yoga'):?> selected="selected" <?php endif;?>>Power Yoga</option>
								<option value="Restorative Yoga" <?php if($tbl_ayurveda->title=='Restorative Yoga'):?> selected="selected" <?php endif;?>>Restorative Yoga</option>
								<option value="Sivananda Yoga" <?php if($tbl_ayurveda->title=='Sivananda Yoga'):?> selected="selected" <?php endif;?>>Sivananda Yoga</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>-->
                      
					<?php }
					else
					{
						?>
						
						 <div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
						<select class="col-lg-6 form-control" name="title" id="title">
								<option value="">----Select----</option>
								<option value="Panchakarma" <?php if($tbl_ayurveda->title=='Panchakarma'):?> selected="selected" <?php endif;?>>Panchakarma</option>
								<option value="Rejuvenation (Rasayana)" <?php if($tbl_ayurveda->title=='Rejuvenation (Rasayana)'):?> selected="selected" <?php endif;?>>Rejuvenation (Rasayana)</option>
								<option value="Body Purification (Shodana)" <?php if($tbl_ayurveda->title=='Body Purification (Shodana)'):?> selected="selected" <?php endif;?>>Body Purification (Shodana)</option>
								<option value="Slimming (Weight Loss)" <?php if($tbl_ayurveda->title=='Slimming (Weight Loss)'):?> selected="selected" <?php endif;?>>Slimming (Weight Loss)</option>
								<option value="Stress Management" <?php if($tbl_ayurveda->title=='Stress Management'):?> selected="selected" <?php endif;?>>Stress Management</option>
								<option value="Beauty Care" <?php if($tbl_ayurveda->title=='Beauty Care'):?> selected="selected" <?php endif;?>>Beauty Care</option>
								<option value="Anti Aging (Kayakalpa)" <?php if($tbl_ayurveda->title=='Anti Aging (Kayakalpa)'):?> selected="selected" <?php endif;?>>Anti Aging (Kayakalpa)</option>
								<option value="Body Immunization" <?php if($tbl_ayurveda->title=='Body Immunization'):?> selected="selected" <?php endif;?>>Body Immunization</option>
								<option value="Get to know Ayurveda" <?php if($tbl_ayurveda->title=='Get to know Ayurveda'):?> selected="selected" <?php endif;?>>Get to know Ayurveda</option>
								<option value="Body, Mind & Soul" <?php if($tbl_ayurveda->title=='Body, Mind & Soul'):?> selected="selected" <?php endif;?>>Body, Mind & Soul</option>
								<option value="Punarjani" <?php if($tbl_ayurveda->title=='Punarjani'):?> selected="selected" <?php endif;?>>Punarjani</option>
								<option value="Soukya" <?php if($tbl_ayurveda->title=='Soukya'):?> selected="selected" <?php endif;?>>Soukya</option>
								
								<option value="Spine care and Back Pain Programme" <?php if($tbl_ayurveda->title=='Spine care and Back Pain Programme'):?> selected="selected" <?php endif;?>>Spine care and Back Pain Programme</option>
								<option value="Joint care and Neck Pain Programme" <?php if($tbl_ayurveda->title=='Joint care and Neck Pain Programme'):?> selected="selected" <?php endif;?>>Joint care and Neck Pain Programme</option>
								<option value="Rheumatoid arthritis" <?php if($tbl_ayurveda->title=='Rheumatoid arthritis'):?> selected="selected" <?php endif;?>>Rheumatoid arthritis</option>
								<option value="Gynec disorders" <?php if($tbl_ayurveda->title=='Gynec disorders'):?> selected="selected" <?php endif;?>>Gynec disorders</option>
								<option value="Neuromuscular deformities" <?php if($tbl_ayurveda->title=='Neuromuscular deformities'):?> selected="selected" <?php endif;?>>Neuromuscular deformities</option>
								<option value="Cardiovascular and Pulmonary disorders" <?php if($tbl_ayurveda->title=='Cardiovascular and Pulmonary disorders'):?> selected="selected" <?php endif;?>>Cardiovascular and Pulmonary disorders</option>
								<option value="Parkinson diseases" <?php if($tbl_ayurveda->title=='Parkinson diseases'):?> selected="selected" <?php endif;?>>Parkinson diseases</option>
								<option value="Panchakarma & Therapeutic Yoga" <?php if($tbl_ayurveda->title=='Panchakarma & Therapeutic Yoga'):?> selected="selected" <?php endif;?>>Panchakarma & Therapeutic Yoga</option>
								<option value="Life style diseases programme" <?php if($tbl_ayurveda->title=='Life style diseases programme'):?> selected="selected" <?php endif;?>>Life style diseases programme</option>
								<option value="European lifestyle programme" <?php if($tbl_ayurveda->title=='European lifestyle programme'):?> selected="selected" <?php endif;?>>European lifestyle programme</option>
								<option value="Short ayurveda Induction programmes" <?php if($tbl_ayurveda->title=='Short ayurveda Induction programmes'):?> selected="selected" <?php endif;?>>Short ayurveda Induction programmes</option>
								<option value="Yoga induction programmes" <?php if($tbl_ayurveda->title=='Yoga induction programmes'):?> selected="selected" <?php endif;?>>Yoga induction programmes</option>
								
							
                        </select>
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>
				<?php } ?>
				
						
                     <!-- <div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
                        <input class="col-lg-6 form-control " name="title" id="title" value="<?php echo $tbl_ayurveda->title; ?>">
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div> -->
                      
            
                      
                      <div class="form-group col-lg-6">
	                        <label class="col-lg-3">Nights</label>
	                        <input type="text" name="days" value="<?php echo $tbl_ayurveda->days; ?>" class="col-lg-3 form-control" onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>
                           <span class="text-danger"><?php echo form_error('days');?></span>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-3">Image</label>
                        <input class="col-lg-6  " type="file" name="image" id="image">
                        <span class="text-danger"><?php echo form_error('image');?></span>
                      </div>
                     
					 <div class="form-group col-lg-6 img_block_cus_yoga">
                        <label class="col-lg-3">&nbsp;</label>
                        <img src="<?php echo base_url();?>../<?php echo $tbl_ayurveda->thumb_image; ?>" width="200"/>
                        
                      </div>
                                
                      <div class="form-group col-lg-12">
                        <label  class="col-lg-3"> Description</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="description" id="description"><?php echo $tbl_ayurveda->description; ?>
                        </textarea>
                         <span class="text-danger"><?php echo form_error('description');?></span>
                         </div>
                      </div>
                    

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-2" class="tab-pane fade in tab_main_content_cus">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Itinerary Details</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                       <div class="form-group col-lg-12">
                        <label class="col-lg-3">Day</label>
                         <label class="col-lg-3">Title</label>
                          <label class="col-lg-3">Description</label>
                       <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-default pull-right package_day_add">Add</button>
                        </div>
                      </div>
                      
                      
                       <div class="package_days">
                       	
                       	<?php
                       	
                       	$days = $this -> Ayurveda_model -> tbl_ayurveda_days($tbl_ayurveda->id);
                       	
                       	foreach($days as $package_days):
						
                       	?>
                       <div class="form-group col-md-12">
                      	<input type="hidden" name="day_id[]" value="<?php echo $package_days->id;?>" />
                      	
                      	<div class="form-group col-lg-3">
                        <input class=" form-control " type="text" name="package_day[]" value="<?php echo $package_days->day;?>">
                        </div>
                        <div class="form-group col-lg-3">
                        <input class="col-lg-3 form-control " type="text" name="day_title[]" value="<?php echo $package_days->title;?>">
                         </div>
                        <div class="form-group col-lg-3">
                        <textarea  class="col-lg-3 form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"><?php echo $package_days->description;?></textarea>
                        </div>
                      </div>
                      <?php
                      
						endforeach;
						
						if(empty($days)):
                      ?>
                      
                      <div class="form-group ">
                      	<div class="form-group col-lg-3">
                      		<input class=" form-control " type="text" name="package_day[]">
                      	</div>
                      	<div class="form-group col-lg-3">
                      			<input class=" form-control " type="text" name="day_title[]">
                      	</div> 
                      	<div class="form-group col-lg-3">
                      		<textarea  class=" form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"></textarea>
                      	</div>
                      		</div>
                      
                      <?php
						endif;
						?>
                      </div>
                      
                      
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    <div class="form-group form-footer">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

