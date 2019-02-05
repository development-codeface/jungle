<?php $this->load->view('ayurveda/side_menu');?>

<div id="page-wrapper">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Edit Package </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="<?php echo base_url();?>dashboard">Dashboard</a> </li>
           <li> <i class="fa fa-table"></i> <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Manage Packages</a> </li>
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
        
  <form role="form" enctype="multipart/form-data" action="" method="post">
  	
  		<input type="hidden" name="id" value="<?php echo $tbl_ayurveda->id;?>" />
  		
  		
  		
  	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tabs-1">Package Details</a></li>
        <li><a data-toggle="tab" href="#tabs-2">Itinerary Details</a></li>
	</ul>
		
	<br>
	
  
    <div  class="tab-content">

      <div id="tabs-1" class="tab-pane fade in active">
      	
      
        <div class="row">
          <div class="col-lg-8">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Packages</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                      <div class="form-group row">
                        <label class="col-lg-3">Hotel</label>
                        <select class="col-lg-6 form-control" name="hotel" id="hotel">
                        	<option value="">--Select--</option>
                        	
                        	<?php foreach ($hotel as $tbl_hotel) { ?>
                        		
								<option value="<?php echo $tbl_hotel->id; ?>"
									
									<?php if($tbl_ayurveda->hotel_id == $tbl_hotel->id) echo "selected"; ?>>
									
									<?php echo $tbl_hotel->title; ?>
									
								</option>
								
							<?php } ?>
							
                        </select>
                        <span class="text-danger"><?php echo form_error('hotel');?></span>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-lg-3">Category</label>
                        <select class="col-lg-6 form-control" name="category" id="category">
                        	<option value="">--Select--</option>
                        	
                        	<?php foreach ($sub_category as $tbl_sub_category) { ?>
                        		
								<option value="<?php echo $tbl_sub_category->id; ?>"
									
									<?php if($tbl_ayurveda->category == $tbl_sub_category->id) echo "selected"; ?>>
									
									<?php echo $tbl_sub_category->name; ?>
									
								</option>
								
							<?php } ?>
							
                        </select>
                        <span class="text-danger"><?php echo form_error('category');?></span>
                      </div>
                  	
                      <div class="form-group row">
                        <label class="col-lg-3"> Name</label>
                        <input class="col-lg-6 form-control " name="title" id="title" value="<?php echo $tbl_ayurveda->title; ?>">
                        <span class="text-danger"><?php echo form_error('title');?></span>
                      </div>
                      
                      
                      <div class="form-group row">
                        <label  class="col-lg-3"> Description</label>
                         <div class="col-lg-6" style="padding-left: 0; padding-right: 0;">
                        <textarea  class="ckeditor" rows="3" name="description" id="description"><?php echo $tbl_ayurveda->description; ?>
                        </textarea>
                         <span class="text-danger"><?php echo form_error('description');?></span>
                         </div>
                      </div>
                      
                      <div class="form-group row">
	                        <label class="col-lg-3">Days</label>
	                        <input type="text" name="days" value="<?php echo $tbl_ayurveda->days; ?>" class="col-lg-3 form-control" onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>
                           <span class="text-danger"><?php echo form_error('days');?></span>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-lg-3">Image</label>
                        <input class="col-lg-6 form-control " type="file" name="image" id="image">
                        <span class="text-danger"><?php echo form_error('image');?></span>
                      </div>
                     
					 <div class="form-group row">
                        <label class="col-lg-3">&nbsp;</label>
                        <img src="<?php echo base_url();?>../<?php echo $tbl_ayurveda->thumb_image; ?>" width="200"/>
                        
                      </div>
                    

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs-2" class="tab-pane fade in">
        <div class="row">
          <div class="col-lg-10">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Package Images and Itinerary Details</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                       <div class="form-group row">
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
                       <div class="form-group col-lg-12">
                      	<input type="hidden" name="day_id[]" value="<?php echo $package_days->id;?>" />
                        <input class="col-lg-3 form-control " type="text" name="package_day[]" value="<?php echo $package_days->day;?>">
                        <input class="col-lg-3 form-control " type="text" name="day_title[]" value="<?php echo $package_days->title;?>">
                        <textarea  class="col-lg-3 form-control " rows="3" style="height: 35px;" name="day_description[]" id="day_description"><?php echo $package_days->description;?></textarea>
                       
                      </div>
                      <?php
                      
						endforeach;
						
                      ?>
                      </div>
                      
                      
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    <div class="form-group">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
  </div>
  </form>
  </div>
</div>
<!-- /.row --> 

