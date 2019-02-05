<div id="page-wrapper" class="add_room">

            <div class="container-fluid profile-block-cus rooms_list_block_cus">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Room Number
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li> 
                             
                             <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i> -->Room Number
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                

  <div class="text-right col-lg-12 ">
                	<p>
                		
                	</p>
                </div>
				
				 
				<div class="row">
					
					<?php if($this->session->flashdata('msg')){?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('msg'); ?></div>
				<?php } ?>	
					
                    <div class="col-lg-12 ">
                        <div class="panel panel-primary">
                           
                           
                            <div class="panel-heading cus_panel_heading">
                            <i class="fa fa-th-list"></i> Room Number
                            <div class="pull-right">
                            	<?php if($blocked) {?>
                            	<a class="btn btn-success" href="<?php echo base_url() . 'roomnumber/view_blocked/'; ?>" onclick="javascript&#58;window.open(this.href, this.target, 'width=400,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;"> Blocked Rooms</a>
                            	<?php } ?>
                            	<a class="btn btn-success" href="<?php echo base_url('roomnumber/add');?>"><span><i class="fa fa-plus"></i></span> Add Room Number</a>
                             <!-- <button  class="close2" type="button">×</button> -->
                              
                            </div>
                        </div>
                            
                            
                            
                            
                            <div class="panel-body tab_main_content_cus">
                                
                               
		                            	
		                            	
		                            
		                                	
		                            <div class="col-lg-12 room_block">
		                            	<div class="row well cus_well">
		                            			
		                            			  	
							                      	    
		                            			
		                            			 <?php
		                            			foreach($results as $result):
												$rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id,NULL,NULL);
												
												 ?>
		                            			
								                <div class="col-lg-12">
				                            	<label><?php echo $result->room_title;?></label>
								                </div> 
								                	
								                	
						                         
						                     <div class="col-lg-12">   		
												 	  <div class="form-group row">
							                      	
							                      	
							                      	
							                      	<!-- <div class="col-md-1 room-list-block">
							                      	    <input class=" form-control" name="type[]" >
							                      	    <p><a href="#"> Block</a></p>
							                      	    	</div>  -->
							                      	    	
							                      	    	
							                      	<?php
							                      	if(!empty($rooms))
													{
							                      	foreach($rooms as $roomnumber):
													?>
							                      	
							                    	<div class="col-md-1 room-list-block">
							                      	    <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly>
							                      	    
							                      	    	<?php
							                      	    	if($roomnumber->status==1){
							                      	    		?>
							                      	    		<p id="room_block_<?php echo $roomnumber->id;?>" class="clr_red_room_chart_status">
							                      	    	<a style="cursor: pointer;" title="Edit room" href="<?php echo base_url() . 'roomnumber/edit/' . $roomnumber->id; ?>" ><i class="fa fa-edit"></i></a>
							                      	    			
							                      	    	<a style="cursor: pointer;" title="Delete room" href="<?php echo base_url() . 'roomnumber/delete/' . $roomnumber->id; ?>" onclick="return cancelConfirm()"><i class="fa fa-trash"></i></a>
							                      	    			
							                      	    	<a style="cursor: pointer;" title="Block room" href="<?php echo base_url() . 'roomnumber/room_block/' . $roomnumber->id . '/0'; ?>" onclick="javascript&#58;window.open(this.href, this.target, 'width=400,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;"><i class="fa fa-ban"></i></a>
							                      	    	 </p>
							                      	    	<?php
															}
															else
															 {?>
														<?php if(date('Y-m-d') >= $roomnumber->valid_from){ ?>
															 	<p id="room_block_<?php echo $roomnumber->id;?>"   class="clr_green_room_chart_status" >
																<!--<p id="room_block_<?php //echo $roomnumber->id;?>"   class="clr_green_room_chart_status" >-->
															<a style="cursor: pointer;" id="" onclick="room_block(<?php echo $roomnumber->id;?>,<?php echo "1";?>);">Unblock</a>
															 </p>
															 <?php } 
															 else { ?>
															<p id="room_block_<?php echo $roomnumber->id;?>"  class="clr_red_room_chart_status" >			
																<a style="cursor: pointer;" title="Edit room" href="<?php echo base_url() . 'roomnumber/edit/' . $roomnumber->id; ?>" ><i class="fa fa-edit"></i></a>
							                      	    			
							                      	    	<a style="cursor: pointer;" title="Delete room" href="<?php echo base_url() . 'roomnumber/delete/' . $roomnumber->id; ?>" onclick="return cancelConfirm()"><i class="fa fa-trash"></i></a>				
															  <?php } ?>
															<?php	
															}?>
							                      	   
							                      	    	</div> 	
							                      	    	
							                      	<?php
													endforeach;
													}
													else {
														?>
														
															<div class="col-md-3 ">
							                      	    No Rooms Added
							                      	   
							                      	    	</div> 	
							                      	    	<?php
													}
													?>		
							                      	 	
							                      </div>
							                
			                          
			                            
		    								 </div> 
			                            
			                            
			                            <?php
										endforeach;?>
			                            
			                            
			                            
			                            
			                            
			                            
			                            
			                            
			                            
			                            
			                            
			                            
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            	
		                            	
		                            	
		                            	
		                            	
		                            
		                            	
		                            		</div>
		                            	</div>
		                            	
		                            	
		                            	
		                            	
		                                                           
                                
                                
                            </div>
                        </div>
                    
                  
                    </div>
                    
                </div>