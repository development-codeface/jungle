<?php 
 $category_name = $this->uri->segment(3); 
?>
  
  
<div id="page-wrapper" class="add_room profile-block-cus">
  <div class="container-fluid profile-block-cus rooms_list_block_cus"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Package - <?php if($category_name == 'yoga') { echo "Other Packages"; } else { echo $category_name; }?></h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>packages">Dashboard</a> </li>
          <?php if($category_name == 'yoga') {?>
          <li> <i class="fa fa-table"></i> <a href="<?php echo base_url();?>ayurveda/list_yoga">Manage</a> </li><?php } else {?>
          	<li> <i class="fa fa-table"></i> <a href="<?php echo base_url();?>ayurveda/list_ayurveda">Manage</a> </li><?php } ?>
          <li class="active"> <i class="fa fa-edit"></i> Add Package </li>
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
                
  <form id="add_pack" class="profile_tab_cus_block_1"  role="form" enctype="multipart/form-data" action="" method="post">
  	
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
                <h3 class="panel-title"><i class="fa fa-th-large"></i> Packages</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                  	
                  	  <div class="form-group col-lg-6" style="display: none">
                        <label class="col-lg-3">Category</label>
                        <select class="col-lg-6 form-control" name="category" id="category">
                        	<?php foreach ($sub_category as $tbl_sub_category) { ?>
								<option value="<?php echo $tbl_sub_category->id; ?>"><?php echo $tbl_sub_category->name; ?></option>
							<?php } ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('category');?></span>
                      </div>
                      
                      
                      <div class="form-group col-lg-6" style="display: none">
                        <label class="col-lg-3">Hotel</label>
                        <select class="col-lg-6 form-control" name="hotel" id="hotel">
                        	<?php foreach ($hotel as $tbl_hotel) { ?>
								<option value="<?php echo $tbl_hotel->id; ?>"><?php echo $tbl_hotel->title; ?></option>
							<?php } ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('hotel');?></span>
                      </div>
                      
                    
                  	
					<?php
					if($category_name=='yoga')
					{?>
						
						 <div class="form-group col-lg-6">
	                        <label class="col-lg-3">Name</label>
	                        <input type="text" name="title" class="col-lg-3 form-control" />
                           <span class="text-danger"><?php echo form_error('days');?></span>
                      </div>
                     <!--- <div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
						<select class="col-lg-6 form-control" name="title" id="title">
								<option value="">--Select--</option>
								<option value="Anusara Yoga">Anusara Yoga</option>
								<option value="Ashtanga Yoga">Ashtanga Yoga</option>
								<option value="Ayurveda Yoga">Ayurveda Yoga</option>
								<option value="Bikram / Hot Yoga">Bikram / Hot Yoga</option>
								<option value="Hatha Yoga">Hatha Yoga</option>
								<option value="Iyengar Yoga">Iyengar Yoga</option>
								<option value="Kundalini Yoga">Kundalini Yoga</option>
								<option value="Tantra Yoga">Tantra Yoga</option>
								<option value="Vinyasa Yoga">Vinyasa Yoga </option>
								<option value="Yin Yoga">Yin Yoga</option>
								<option value="Dynamic Yoga">Dynamic Yoga</option>
								<option value="General Yoga">General Yoga</option>
								<option value="Integral yoga">Integral yoga</option>
								<option value="Jivamukti Yoga">Jivamukti Yoga</option>
								<option value="Kripalu Yoga">Kripalu Yoga</option>
								<option value="Kriya Yoga">Kriya Yoga</option>
								<option value="Nidra Yoga">Nidra Yoga</option>
								<option value="Power Yoga">Power Yoga</option>
								<option value="Restorative Yoga">Restorative Yoga</option>
								<option value="Sivananda Yoga">Sivananda Yoga</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>--->
                      
					<?php }
					else
					{?>
				    <div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
						<select class="col-lg-6 form-control" name="title" id="title">
								<option value="">--Select--</option>
								<option value="Panchakarma">Panchakarma</option>
								<option value="Rejuvenation (Rasayana)">Rejuvenation (Rasayana)</option>
								<option value="Body Purification (Shodana)">Body Purification (Shodana)</option>
								<option value="Slimming (Weight Loss)">Slimming (Weight Loss)</option>
								<option value="Stress Management">Stress Management</option>
								<option value="Beauty Care">Beauty Care</option>
								<option value="Anti Aging (Kayakalpa)">Anti Aging (Kayakalpa)</option>
								<option value="Body Immunization">Body Immunization</option>
								<option value="Get to know Ayurveda">Get to know Ayurveda</option>
								<option value="Body, Mind & Soul">Body, Mind & Soul</option>
								<option value="Punarjani">Punarjani</option>
								<option value="Soukya">Soukya</option>
								<option value="Spine care and Back Pain Programme">Spine care and Back Pain Programme</option>
								<option value="Joint care and Neck Pain Programme">Joint care and Neck Pain Programme</option>
								<option value="Rheumatoid arthritis">Rheumatoid arthritis</option>
								<option value="Gynec disorders">Gynec disorders</option>
								<option value="Neuromuscular deformities">Neuromuscular deformities</option>
								<option value="Cardiovascular and Pulmonary disorders">Cardiovascular and Pulmonary disorders</option>
								<option value="Parkinson diseases">Parkinson diseases</option>
								<option value="Panchakarma & Therapeutic Yoga">Panchakarma & Therapeutic Yoga</option>
								<option value="Life style diseases programme">Life style diseases programme</option>
								<option value="European lifestyle programme">European lifestyle programme</option>
								<option value="Short ayurveda Induction programmes">Short ayurveda Induction programmes</option>
								<option value="Yoga induction programmes">Yoga induction programmes</option>
								
							
                        </select>
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>
				<?php } ?>
					
					
					
					
                      <!---<div class="form-group col-lg-6">
                        <label class="col-lg-3"> Name</label>
                        <input class="col-lg-6 form-control " name="title" id="title">
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>--->
                      
                      
               
                      
                      <div class="form-group col-lg-6">
	                        <label class="col-lg-3">Nights</label>
	                        <input type="text" name="days" class="col-lg-3 form-control" onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>
                           <span class="text-danger"><?php echo form_error('days');?></span>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label class="col-lg-3">Image</label>
                        <input class="col-lg-6  " type="file" name="image" id="image">
                        <span class="text-danger"><?php echo form_error('image');?></span>
                      </div>
                      
                             <div class="form-group col-lg-12">
                        <label  class="col-lg-3"> Description</label>
                         <div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="description" id="description"></textarea>
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
                <h3 class="panel-title"><i class="fa fa-th-large"></i> Package Details</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                       <div class="form-group col-lg-12">
                        <label class="col-lg-3 form-group ">Day</label>
                         <label class="col-lg-3">Title</label>
                          <label class="col-lg-3">Description</label>
                      
                       
                      </div>
                      
                      
                       <div class="package_days">
                         <div class="form-group col-lg-12">
                         	
						 <div class="form-group col-lg-3">
						<input class=" form-control " type="text" name="package_day[]">
						</div>
                        
                         <div class="form-group col-lg-3">
                        <input class="c form-control " type="text" name="day_title[]">
                        </div>
                          <div class="form-group col-lg-3">
                        <textarea  class=" form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"></textarea>
                       </div>
                       
                        <div class="col-lg-2 text-right">
                          <button type="button" class="btn btn-default pull-right package_day_add">Add</button>
                          <br/><br/>
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
     



    <div class="form-group form-footer">
    	
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

