<?php $this->load->view('ayurveda/side_menu');
$category_name = $this->uri->segment(3); ?>

<div id="page-wrapper">
  <div class="container-fluid"> 
    
    <!-- Page Heading >> -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> New Room Combination </h1>
        <!-- BreadCrumbs >> -->
        <ol class="breadcrumb">
          <li> <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a> </li>
          <li class="active"> <i class="fa fa-edit"></i> Room Combination </li>
        </ol>
        <!-- BreadCrumbs << --> 
      </div>
    </div>

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



        <div class="row">
          <div class="col-lg-11">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <div class="panel">
                  
                    <form role="form" method="post" >
                      <div class="form-group row">
                        <label class="col-lg-4">Hotel</label>
                        <select class="col-lg-8 form-control beds" name="room_hotel" id="room_hotel" onchange="get_Room(this.value); get_package(this.value,'<?php echo $category_name;?>');">
                       <option value="">--Select--</option>
                        	<?php foreach ($hotel as $tbl_hotel) {
                        		$hotel_name = $this->Ayurveda_model->hotel_name($tbl_hotel->hotel_id);  ?>
								<option value="<?php echo $tbl_hotel->hotel_id; ?>"><?php echo $hotel_name->title; ?></option>
							<?php } ?>
                        </select>
                      </div>
                      
                        
                      
                    <!--Loading AJAX req. for Rooms -->
                       <div id="rooms_show">
                       </div>
						
						<div id="package_show">
						</div>


                      <div class="form-group row">
                        <label class="col-lg-4">Price</label>
                        <input class="col-lg-8 form-control " name="room_price" id="room_price">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Offer Price</label>
                        <input class="col-lg-8 form-control " name="room_ofr_price" id="room_ofr_price">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Exta Adult rate</label>
                        <input class="col-lg-8 form-control " name="room_adult_rate" id="room_adult_rate">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Exta Child rate</label>
                        <input class="col-lg-8 form-control " name="room_child_rate" id="room_child_rate">
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4">Valid From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="validity_from" id="validity_from">
                        </span>
                      </div> 
                      
                      <div class="form-group row">
                        <label class="col-lg-4">Valid Upto</label>
                        <span id="sandbox-container">
                        <input class="col-lg-8 form-control " name="validity" id="validity">
                        </span>
                      </div>                      
                      <div class="form-group row">
                        <label  class="col-lg-4">Conditions</label>
                        <textarea  class="col-lg-8 form-control " rows="3" name="conditions" id="conditions"></textarea>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-4"> Allowed Person</label>
                        <select class="col-lg-8 form-control" name="allowed_persons" id="allowed_persons">
                          <option>1</option>
                          <option>1 - 2</option>
                          <option>1 - 3</option>
                          <option>1 - 4</option>
                          <option>1 - 5</option>
                        </select>
                      </div>
                        <div class="form-group row">
                        <label class="col-lg-4"> No: of Rooms</label>
                        <select class="col-lg-8 form-control" name="num_rooms" id="num_rooms">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          
                        </select>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-lg-4"> Tax Applicable</label>
                        <select class="col-lg-8 form-control" name="tax_applicable" id="tax_applicable">
                          <option value="">--Select--</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <button type="submit" name="room_submit" class="btn btn-success" id="add_room_comb_submit">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
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
</div>
<!-- /.row --> 
