<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offline extends CI_Controller
{
		
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->model('Profilemodel');
		$this->load->model('Roomnumber_model');
		$this->load->model('Offline_model');
		$this->load->library('email');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	 }
	 
	  function add()
	 {
		$username 	= $this -> session -> userdata['hotel_adminusername'];
		$id 		= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }	 	
		
		$this->load->helper('string');
		
		$data['agency']	= $this -> Offline_model -> agency($id);
		
		if(isset($_POST['offline_sub'])) {
			$this -> form_validation -> set_rules('check_in', 'check_in', 'trim|required');
			$this -> form_validation -> set_rules('check_out', 'check-out', 'trim|required');
			$this -> form_validation -> set_rules('r_num[]','room no.', 'required');
			$this -> form_validation -> set_rules('f_name', 'first name', 'trim|required');
			$this -> form_validation -> set_rules('l_name', 'last name', 'trim|required');
			$this -> form_validation -> set_rules('address', 'address', 'trim|required');
			$this -> form_validation -> set_rules('pin', 'pincode', 'trim|numeric');
			$this -> form_validation -> set_rules('email', 'e-mail', 'trim|required|valid_email');
			$this -> form_validation -> set_rules('phone', 'phone no.', 'trim|numeric');
			//$this -> form_validation -> set_rules('kids', 'count.', 'trim|numeric');
			
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']=validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('offline/add', $data);
				$this -> load -> view('layout/footer');
			}
			else {
				
				
				$offline['first_name'] 	= $this->input->post('f_name');
				$offline['last_name']	= $this->input->post('l_name');
				$offline['phone'] 		= $this->input->post('phone');
				$offline['address']		= $this->input->post('address');
				$offline['pincode'] 	= $this->input->post('pin');
				$offline['city']		= $this->input->post('city');
				$offline['state']		= $this->input->post('state');
				$offline['country']		= $this->input->post('country');
				$offline['status']		= 1;
				$offline['gender']		= $this->input->post('gender');
				$offline['email']		= $this->input->post('email');
				
				$this -> db -> insert('tbl_offline_user', $offline);
				
				$room = $this->input->post('r_num'); 
				$r_count = count(array_filter($room));
				$r_key = array_keys(array_filter($room));
				
				for($i=0;$i<$r_count;$i++)
				{
					$j = $r_key[$i];
					$r_value = explode('|',$room[$j]);
					$r_id[] = $r_value[0];
					$r_num[] = $r_value[1];
					$r_num_id[] = $r_value[2];
					$r_num_price[] = $r_value[3];
					$r_bed_price[] = $r_value[4];
					$r_child_price[] = $r_value[5];					
				}
				
				
				$num_room = array_count_values($r_id);
				$room_basic_price = array_count_values($r_num_price);
				
				
				$booking['offline_user']		= $this->db->insert_id();
				$booking['package_id']		= $this->input->post('package');
				$booking['name'] = $this->input->post('f_name'). " ". $this->input->post('l_name');
				$booking['email']		= $this->input->post('email');
				$booking['phone'] 		= $this->input->post('phone');
				$booking['request'] = '';
			    $booking['arrival'] = '';
			    $booking['pickup'] = '';
				$booking['agency']				= $this->input->post('type');
				$booking['reservation'] =  '0';
				$booking['hotel_id']			= $id;
				$booking['booking_number']		= random_string('numeric', 4);
				
				if($this->input->post('payment') == $this->input->post('total'))
				{
					$booking['payment']				= $this->input->post('payment');
					$booking['advance']	 ='';
				}
				else
				{
					$booking['advance']	= $this->input->post('payment');
					$booking['payment']	= '';
				}
				
				$booking['voucher']				= $this->input->post('voucher');
				$booking['commision']			= $this->input->post('agency');
				$booking['tax']					= $this->input->post('tax');
				$booking['discount']			= $this->input->post('discount');
				$booking['total_amount']		= $this->input->post('net_amount');
				$booking['category']			= $this->input->post('category');
				$booking['payment_method']		= 'offline';
				$booking['check_in']			= date_format(date_create_from_format('d-m-Y', $this->input->post('check_in')), 'Y-m-d');
				$booking['check_out']			= date_format(date_create_from_format('d-m-Y', $this->input->post('check_out')), 'Y-m-d');
				$booking['date']				= date('Y-m-d h:i:s');
				if(!empty($booking['advance']) || !empty($booking['voucher']) || !empty($booking['payment']))
				{
					$booking['status']		= 1;
				}
				else
				{
					$booking['status']		= 0;
				}
				$booking['cancel']				= 0;
				
			 	$num_room_count = count($num_room);
				$num_key = array_keys($num_room);
				$room_prices = array_keys($room_basic_price);
				
				$extra_bed = ( $this->input->post('extra_bed'));
				$no_of_kids =( $this->input->post('number_of_childrens'));
				
				
				

//print_r($no_of_kids); exit;
				for($x=0;$x<$num_room_count;$x++)
				{
					$y							= $num_key[$x];
					$booking['room_id']			= $y;
					$booking['number_of_rooms']	= $num_room[$y];
					$booking['extra_bed']	= $extra_bed[$x];
					$booking['number_of_childrens']	= $no_of_kids[$x];
					$booking['room_rate'] =  $room_prices[$x]; 
					$booking['bed_rate'] =  $r_bed_price[$x]; 
					$booking['child_rate'] =  $r_child_price[$x]; 
					$booking['wifi'] =  ''; 
					$booking['breakfast'] =  ''; 
					
					$this -> db -> insert('tbl_booking', $booking);
					$rooms['booking_id']	= $this->db->insert_id();
					
					$r_idcount = count(array_filter($r_id));
					$r_idkey = array_keys(array_filter($r_id));
					
					for($i=0;$i<$r_idcount;$i++)
					{
						$j = $r_idkey[$i];
						$r_set = $r_id[$j];
						if($booking['room_id'] == $r_set)
						{
							$rooms['room_number']	= $r_num_id[$j];
							$rooms['check_in']		= $booking['check_in'];
							$rooms['check_out']		= $booking['check_out'];
							if(!empty($booking['advance']))
							{
								$rooms['status']		= 1;
							}
							else
							{
								$rooms['status']		= 0;
							}
							
							$this -> db -> insert('tbl_booking_rooms', $rooms);
						}
					}
				}
				
				$food['booking_id'] = $booking['booking_number'];
				$food['no_of_days'] = $this->input->post('no_of_days');
				$food['no_of_person'] = $this->input->post('no_of_persons');
				$food['breakfast'] = $this->input->post('breakfast');
				$food['lunch'] = $this->input->post('lunch');
				$food['dinner'] = $this->input->post('dinner');
				$food['all'] = $this->input->post('all');
				$food['amount'] = $this->input->post('total_food');
				
				if(!empty($food['amount']))
				{
				$this -> db -> insert('tbl_booking_foodplan', $food);
				}
				if($booking['agency']=='0')
				{
				$datas_hotel['details']=$this->Offline_model->detailsById($id);
				$datas_image['image']	= $this->Offline_model->imagesById($id);
				
				if(!empty($food['amount'])) {
				$datas_booking['booking_detail'] = $this->Offline_model->booking_detail_food($booking['booking_number']);
				} else {
				$datas_booking['booking_detail'] = $this->Offline_model->booking_detail($booking['booking_number']);
				}
				
				if($datas_booking['booking_detail']->category=='hotel')
				{
					$datas_room_booking['booking_room_detail'] = $this->Offline_model->booking_room_detail($datas_booking['booking_detail']->booking_number);
					
				}
				else
				{
					$datas_room_booking['booking_room_detail'] = $this->Offline_model->booking_room_detail_pack($datas_booking['booking_detail']->booking_number);
					
				}
				
				//// hotelmanager_log ////
				$check = $this -> db
				-> where('hotel_id', $id)
				-> where('DATE(date)', date('Y-m-d'))
				-> get('tbl_hotelmanager_log')
				-> row();
				
				if(count($check) == 0) {
				$data2['hotel_id'] = $id;
				$data2['login_status'] = 0;
				$data2['room_set_status'] = 0;
				$data2['booking_status'] = 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db -> insert('tbl_hotelmanager_log',$data2);
				} else {
				$data2['booking_status'] = $check -> booking_status + 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db
				-> where('hotel_id', $id)
				-> where('date', $check -> date)
				-> update('tbl_hotelmanager_log',$data2);
				}
				//// hotelmanager_log ////
				
				$mydata = array(
				'user' => $offline,
				'hotel' => $datas_hotel['details'],
				'image' => $datas_image['image'],
				'booking_details' => $datas_booking['booking_detail'],
				'room_details' => $datas_room_booking['booking_room_detail']
				);
				
				//$this->load->view('offline/offline_mail', $mydata);
			
				 $message = $this->load->view('offline/offline_mail', $mydata, true);
				 $this->email->set_mailtype('html');
				 $this->email->from('booking@bookingwings.com', 'Bookingwings');
				 $this->email->to($offline['email']); 
				 $this->email->subject('New Booking - '.$datas_booking['booking_detail'] -> booking_number);
				 $this->email->message($message);
				 $this->email->send();
				}
				
				$this->session->set_flashdata('success','Booking taken successfully');
				redirect('offline/add');
			}
		}
		else {
			$this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
		{	if(in_array('50', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('offline/add', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('offline/add', $data);
		}
			//$this -> load -> view('offline/add', $data);
			$this -> load -> view('layout/footer');
		}
	 }	
	 
	  function room_available($check_in,$check_out,$cat)
	 {
		$check_in = date_format(date_create_from_format('d-m-Y', $check_in), 'Y-m-d');
	 	$check_out = date_format(date_create_from_format('d-m-Y', $check_out), 'Y-m-d');
	 
	 
	 
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$data['results'] = $this->Roomnumber_model->allListDate($id,$check_in,$check_out);

		
		 
		 //$diff = abs(strtotime($check_out) - strtotime($check_in)); 
		 $days = floor((strtotime($check_out) - strtotime($check_in))/(60*60*24));
		 
		 
		 
				
		
		?>
		      <div class="room-list-cus room_list_cus_offline col-lg-12">
                <label class="col-lg-12 cus_offline_rooms_title">Available Rooms</label>
                <?php
				
                if(!empty($data['results'])) {
					
					if($cat!=0)
					 {
					  $data['commision']	=	$this->Offline_model->getCommision($data['results'][0]->hotel_id,$cat);
					   // print_r($data['commision']);
					  
					 }

                  foreach($data['results'] as $result):
				  
				 $room_price= $result->price;
				 $extra_bed_rate = $result->room_adult_rate;
				 $extra_child_rate = $result->room_child_rate;
				 
				 
				 
				 if($result->tax_applicable=='0')
				{
					$tax = $this->Offline_model->tax_amount_off($result->hotel_id);
					$t_amount='';
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
													
				
				}
				else
				{
					$tax = $this->Offline_model->tax_amount($result->hotel_id);
					$t_amount='';
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
											
					
				}		


				if(!empty($data['commision'][0]->room_tariff))
				   {
					    $tariff =  $data['commision'][0]->room_tariff;
				   }
				   else
				   {
					    $tariff = '';
				   }
								
				   
					   $rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id);
					 
					
					  
					   foreach($rooms as $roomnumber):
					  	$available='';
						 	if($roomnumber->status == '1'):
								$avail_room_check =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
								$available += $avail_room_check;
							endif;
							
					   endforeach;
					   
					   
					  //if($available=='0'):
					  
					  if(!empty($rooms)){
					  
					  
					  ?>
					  <input type="hidden" name="hotel_tax" id="hotel_tax" value="<?php echo $t_amount;?>"/>
					   <input type="hidden" name="commision" id="commision" value="<?php echo $tariff;?>"/>
					  <input type="hidden" value="<?php echo  $days;?>" id="total_days" />
					  <input type="hidden" value="<?php echo $room_price;?>" name="room_basic_price[]" id="room_basic_price"/>
                     <ul class="delrom_cus delrom_cus_offline col-md-12">
                     	 <div class="col-md-3"><li class="block_cus_field_main_title_room"><?php echo $result->room_title .' (' . $result->allowed_persons . ' pax each)';?><br/>
						 <?php echo ' (' . $result->normal_allowed_adults . ' <i class="fa fa-male "></i>';
						 if(!empty($result->normal_allowed_kids)){
							echo " +" .$result->normal_allowed_kids . ' <i class="fa fa-child "></i>'; }
							echo ")";
							?></li> 
								<div class="notes_cus_offline notes_cus_offline_cus">	
							<?php
							 if(!empty($result->room_child_rate))
							   {
							echo "Free for upto ".$result->child_free_limit ." year old children";
							   }?>
							</div>
							</div>
                     	 <div class="col-md-4">
                     	 <?php
						  
                     	 foreach($rooms as $roomnumber):
							 $room_check='';
							 
							 	$block = $this -> Offline_model -> block_dates($roomnumber->room_number, $check_in, $check_out);
							
							 if(empty($block)):
								 
								  $avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
												
												$room_check += $avail_rooms;
												if($avail_rooms==0){
												
												?>
												
												<li class="block_cus_field_main_title_room_number_cus ">
												<input class="room_check<?php echo $result->setting_id;?> check_room_<?php echo $result->setting_id;?>_<?php echo $roomnumber->id;?> 
												check_room_number_<?php echo $result->id;?>_<?php echo $roomnumber->id;?> room_number_id_<?php echo $roomnumber->id;?> numberrooms"
												onclick="getRooms('<?php echo $result->setting_id;?>','<?php echo $result->id;?>','<?php echo $roomnumber->id;?>')"  type="checkbox" name="r_num[]" 
												value="<?php echo $result->setting_id.'|'.$roomnumber->room_number.'|'.$roomnumber->id.'|'.$room_price.'|'.$extra_bed_rate.'|'.$extra_child_rate;?>" id=""> <?php echo $roomnumber->room_number;?>
													
												</li>
                     	
												
												<?php	
													
												}
							
							 endif;
							 
						 endforeach;
						
						 
						 //if($avail_rooms=='0'):
							  ?>
							  </div>
							    <span <?php  if(empty($result->no_of_bed)){?> style="display: none;" <?php }?>>
						<li class="extra_block_cus_field col-md-2"><label>Extra Bed</label>
                        <input onkeyup="getRoomsBed(<?php echo $result->setting_id ?>)" class="form-control" value="<?php echo set_value('extra_bed'); ?>" name="extra_bed[]" id="extra_bed<?php echo $result->setting_id;?>" disabled="" 
                        onkeypress="return onlyNumbers(event)" placeholder="Numbers only"  >
						<div class="notes_cus_offline">	
                        <span id="bed_count_<?php echo $result->setting_id ?>"><?php echo $result->no_of_bed;?></span>  extra bed for <span class="room_count_<?php echo $result->setting_id ?>">1</span> room
</div>
						
						<input type="hidden" value="<?php echo $extra_bed_rate;?>" id="extra_bed_rate<?php echo $result->setting_id;?>"/>
                         <input type="hidden" id="extra_amount<?php echo $result->setting_id;?>" value="" class="extra_amount">
						  <input type="hidden" id="no_of_bed_<?php echo $result->setting_id;?>" value="<?php echo $result->no_of_bed;?>" class="">
						     
						</li></span>
                          

							   <?php
							   //if(!empty($result->room_child_rate))
							  // {
							   ?>
							   <span <?php  if(empty($result->normal_allowed_kids)){?> style="display: none;" <?php }?>>
							<li class="extra_block_cus_field col-md-2"><label>No.Of. Childrens</label>					 
							<input onkeyup="getChilds(<?php echo $result->setting_id ?>)" type="text" name="number_of_childrens[]" id="childs<?php echo $result->setting_id;?>" disabled=""
.							class="form-control"  onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>

			<input type="hidden" value="<?php echo $extra_child_rate;?>" id="extra_child_rate<?php echo $result->setting_id;?>"/>
			<input type="hidden" id="extra_child_amount<?php echo $result->setting_id;?>" value="" class="extra_child_amount">
			<input type="hidden" id="no_of_child_<?php echo $result->setting_id;?>" value="<?php echo $result->normal_allowed_kids;?>" class="">
<div class="notes_cus_offline">						     
<span id="child_count_<?php echo $result->setting_id ?>"><?php echo $result->normal_allowed_kids;?></span>  children(s) for each <span class="room_count_<?php echo $result->setting_id ?>">1</span> room</div>	
					 
									</li>	</span>			 
                        <?php 
							   //}
							   echo form_error('extra_bed'); 
												//  endif;
                        ?>
                        
                        
                     </ul>
                     
                     
                  <?php
					  }
						// endif;
                 // if($avail_rooms<>'0'): echo "No Rooms"; endif;
				  endforeach; } else { echo 'No rooms'; }
				  echo form_error('r_num[]'); ?>
             </div>
			 
			<div class="form-group col-lg-12"></div>
			 
			 
			 
			 
			 <!--- food plan start here--->
			 <?php
			 $foodplan['query'] = $this->Offline_model->food_plan($id);
			 
			  //if(count(array_filter($foodplan)) > 0)
			 //{
			  if(!empty($foodplan))
			 {
			 ?>
			  <div class="form-group col-lg-12" id="food_paln" style="<?php if(count(array_filter($foodplan)) == 0) echo 'display:none' ?>">
			  
                      <div class="room-list-cus room_list_cus_offline col-lg-12">
						<label class="col-lg-12 cus_offline_rooms_title">Food Plan</label>
						
					
							
						 <ul class="delrom_cus delrom_cus_offline col-md-12">
						 <?php
						  if(!empty($foodplan['query'][0]->breakfast))
							{
						 ?>
                     	 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="breakfast" value="<?php  echo $foodplan['query'][0]->breakfast;?>" id="" onclick="food_plan();" >  &nbsp;
						 Breakfast 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->lunch))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="lunch" value="<?php  echo $foodplan['query'][0]->lunch;?>" id="" onclick="food_plan();">  &nbsp;
						 Lunch  
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->dinner))
							{
								?>
							
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="dinner" value="<?php  echo $foodplan['query'][0]->dinner;?>" id="" onclick="food_plan();">  &nbsp;
						 Dinner 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->all_meals))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="all" value="<?php  echo $foodplan['query'][0]->all_meals;?>" id="" onclick="food_plan();">  &nbsp;
						 All Meals 
						  
						</li>  
							</div>
							<?php
							}?>
                        <div class="form-group col-lg-6">
						</div>
                     </ul>
					
					
						<div class="form-group col-lg-4">
                        <label class="col-lg-4">No.of. Days</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_days" id="no_of_days" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
						
					<div class="form-group col-lg-4">
                        <label class="col-lg-6">No.of. Persons</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_persons" id="no_of_persons" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
					  
					  <div class="form-group col-lg-6">
					 <br/>
                        <label class="col-lg-6">Total Food Plan Amount</label>
                        <input class="col-lg-4 form-control" value="" name="total_food" id="total_food" readonly="">
                      </div>
				</div>
						
             </div>
			 
			 <?php
			 
			 }?>
			  <!--- food plan end here--->
		
		<?php
		
	 }
	 
	 function roomchart()
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
			if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['results'] = $this->Roomnumber_model->allList($id);
		
	 	$this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
		{	if(in_array('49', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('offline/roomchart',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('offline/roomchart',$data);
		}
		//$this -> load -> view('offline/roomchart',$data);
		$this -> load -> view('layout/footer');
	 	
	 }
	 
	function get_rooms($check_in,$check_out,$status)
	 {
	 	$check_in = date_format(date_create_from_format('d-m-Y', $check_in), 'Y-m-d');
	 	$check_out = date_format(date_create_from_format('d-m-Y', $check_out), 'Y-m-d');
	 	
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
	 	
		$data['results'] = $this->Roomnumber_model->allList($id);
		$data1['results1'] = $this->Roomnumber_model->allListDate($id,$check_in,$check_out);
		
		   foreach($data['results'] as $result):
		  
			   if($status=='booked')
			   {
			  
				$rooms =$this->Offline_model->booked_room_numbers($check_in,$check_out,$result->hotel_id,$result->id);
				
			   }
			   else if($status=='available')
			   {
			   	
				$rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id);
				 //$avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id);
				// $rooms = array_diff($room,$avail_rooms);
				// print_r($rooms);
			   }
			   else if($status=='checkin')
			   {
			   	$rooms =$this->Offline_model->checkin_room_numbers($check_in,$check_out,$result->hotel_id,$result->id);
			
			   }
			   else if($status=='checkout')
			   {
			   	$rooms =$this->Offline_model->checkout_room_numbers($check_in,$check_out,$result->hotel_id,$result->id);
			
			   }
			   else if($status=='reserved')
			   {
			   	$rooms =$this->Offline_model->reserved_room_numbers($check_in,$check_out,$result->hotel_id,$result->id);
			
			   }
			   else
			  {
			  	
				   $rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id);
			  }
		?>
		       
								                	
					<div class="col-lg-12 room_status_cus_block">   	
						
							
						<div class="form-group row">
							<label  class="cus_label_con"><?php echo $result->room_title;?></label>
							            	    	
							   <?php
							    if(!empty($rooms))
								{
							      	foreach($rooms as $roomnumber):
												$room_check=0;
														
										if($status=='booked')
										{?>
										<div class="col-md-1 room-list-block">
								          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #FF00FA;">
								        </div> 	
											<?php
											
										}	
										else if($status=='reserved')
										{?>
										<div class="col-md-1 room-list-block">
								          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #FEFE00;">
								        </div> 	
											<?php
										}
										else if($status=='checkin')
										{?>
										<div class="col-md-1 room-list-block">
								          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #3BE6ED;">
								        </div> 	
											<?php
										}
										else if($status=='checkout')
										{?>
										<div class="col-md-1 room-list-block">
								          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #837EFC;">
								        </div> 	
											<?php
										}
										else if($status=='available')
										{
											if($roomnumber->status==1)
											{ 
												$x=0;
												if(!empty($data1['results1'])){
													
												//$avail_rooms =$this->Offline_model->room_reserve($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
												
												 $avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
												
												 $room_check += $avail_rooms;
												 $x=1;
												if($avail_rooms==0){
												
												?>
												<div class="col-md-1 room-list-block">
										          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #03C100;">
										        </div> 	
												<?php	
													
												}
											}
												
											}
											
										}
										else
										{
											$datewise = $this->Offline_model->check_rooms($check_in,$check_out,$roomnumber->id);
													
											if($roomnumber->status==1)
											{
												if($datewise==1)
												{
												?>
										     	<div class="col-md-1 room-list-block">
										           <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #87CEEB;">
										         </div> 	
										                      	    	
										        <?php
												}
												else 
												{
													?>
																		
										        <div class="col-md-1 room-list-block">
										          <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly>
										        </div> 	
												<?php
													}
											}
											else
											{?>
											<div class="col-md-1 room-list-block">
									            <input class=" form-control" name="type[]" value="<?php echo $roomnumber->room_number;?>" readonly style="background-color: #BA55D3;">
									        </div> 	
											<?php 
											}
											
										}
										endforeach; 
										if($room_check!=0 || empty($x))
												{ 
													?>
										<!--<div class="col-md-3 ">
									       No Rooms 
									    </div> 	--->
									 <?php
												}
										
									}
									else
									{
									?>
										<div class="col-md-3 ">
									       No Rooms 
									    </div> 	
									 <?php
									}		
									?>		
							                      	 	
							         </div>
							                
			                     </div> 
			                            
			                            
			  <?php
			endforeach;
			                            
		
			
	 	
	 }



	function getPackages($cin,$cout,$id)
	{
	 	$cin = date_format(date_create_from_format('d-m-Y', $cin), 'Y-m-d');
	 	$cout = date_format(date_create_from_format('d-m-Y', $cout), 'Y-m-d');
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		
		$data['packages'] = $this -> Offline_model -> packages($cin,$cout,$id); 
		if(!empty($data['packages'])) {?>
		
			<label class="col-lg-6">Packages</label>
			<select class="col-lg-6 form-control" name="package" id="pack" onchange="package_room_check();">
				<option>--Select--</option>
			
			<?php foreach($data['packages'] as $pack) { ?>
				<option value="<?php echo $pack -> id; ?>"><?php echo $pack -> title; ?></option>
			<?php } ?>
			
			</select>
		
		<?php } else echo '<label>No package available</label>';
	}
	 

	  function package_room_available($check_in,$check_out,$pack,$cat)
	 {
		 
	 	$check_in = date_format(date_create_from_format('d-m-Y', $check_in), 'Y-m-d');
	 	$check_out = date_format(date_create_from_format('d-m-Y', $check_out), 'Y-m-d');
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$data['results'] = $this->Roomnumber_model->allListDate_package($id,$pack,$check_in,$check_out); 
		//print_r($data['results']);
		  //$diff = abs(strtotime($check_out) - strtotime($check_in)); 
		 $days = floor((strtotime($check_out) - strtotime($check_in))/(60*60*24));
		
		
		
		 
		?>
		      <div class="room-list-cus room_list_cus_offline col-lg-12">
                <label class="col-lg-12 cus_offline_rooms_title">Available Rooms</label>
                <?php
                if(!empty($data['results'])) {
					if($cat!=0)
					 {
					  $data['commision']	=	$this->Offline_model->getCommision($data['results'][0]->hotel_id,$cat);
					   // print_r($data['commision']);
					  
					 }
                  foreach($data['results'] as $result):
				  
					$room_price= $result->price;
					$extra_bed_rate = $result->room_adult_rate;
					$extra_child_rate = $result->room_child_rate;		


					if(!empty($data['commision'][0]->room_tariff))
				    {
					    $tariff =  $data['commision'][0]->room_tariff;
				    }
				    else
				    {
					    $tariff = '';
				    }	
				   
				   
					   $rooms =$this->Roomnumber_model->room_numbers($result->hotel_id,$result->id);
					  
					  
					   foreach($rooms as $roomnumber):
					  	$available='';
						 	if($roomnumber->status == '1'):
								$avail_room_check =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
								$available += $avail_room_check;
							endif;
					   endforeach;
					   
					   
					  //if($available=='0'):
					  
					   if(!empty($rooms)){
					  
					  
					  ?>
					     
					   <input type="hidden" name="hotel_tax" id="hotel_tax" value="<?php //echo $t_amount;?>"/>
					   <input type="hidden" name="commision" id="commision" value="<?php echo $tariff;?>"/>
					   <input type="hidden" value="<?php echo  $days;?>" id="total_days" />
					  <input type="hidden" value="<?php echo $room_price;?>" name="room_basic_price[]" id="room_basic_price"/>
                     <ul class="delrom_cus delrom_cus_offline col-md-12">
                     	 <div class="col-md-3"><li class="block_cus_field_main_title_room"><?php echo $result->room_title .' (' . $result->allowed_persons . ' pax each)';?><br/>
						 <?php echo ' (' . $result->normal_allowed_adults . ' <i class="fa fa-male "></i>';
						 if(!empty($result->normal_allowed_kids)){
							echo " +" .$result->normal_allowed_kids . ' <i class="fa fa-child "></i>'; }
							echo ")";
							?></li> 
							<div class="notes_cus_offline notes_cus_offline_cus">
							<?php
							 if(!empty($result->room_child_rate))
							   {
							echo "Free for upto ".$result->child_free_limit ." year old children";
							   }?>
							   </div>
							   </div>
                     	 <div class="col-md-4">
                     	 <?php
                     	 foreach($rooms as $roomnumber):
							 $room_check='';
							 
							 $block = $this -> Offline_model -> block_dates($roomnumber->room_number, $check_in, $check_out);
							 
							 if(empty($block)):
								 
								  $avail_rooms =$this->Offline_model->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
												
												$room_check += $avail_rooms;
												if($avail_rooms==0){
												
												?>
												
												<li class="block_cus_field_main_title_room_number_cus ">
												<input class="numberrooms room_check<?php echo $result->setting_id;?> check_room_<?php echo $result->setting_id;?>_<?php echo $roomnumber->id;?> 
												check_room_number_<?php echo $result->id;?>_<?php echo $roomnumber->id;?> room_number_id_<?php echo $roomnumber->id;?>" 
												onclick="getRooms('<?php echo $result->setting_id;?>','<?php echo $result->id;?>','<?php echo $roomnumber->id;?>')"  
												type="checkbox" name="r_num[]" value="<?php echo $result->setting_id.'|'.$roomnumber->room_number.'|'.$roomnumber->id.'|'.$room_price.'|'.$extra_bed_rate.'|'.$extra_child_rate;?>"> <?php echo $roomnumber->room_number;?>
													
												</li>
                     	
												
												<?php	
													
												}
							
							 endif;
							 
						 endforeach;
						
						 
						// if($avail_rooms=='0'):
							  ?>
							  </div>
							  <span <?php  if(empty($result->no_of_bed)){?> style="display: none;" <?php }?>>
						<li class="extra_block_cus_field col-md-2"><label>Extra Bed</label>
                        <input onkeyup="getRoomsBed(<?php echo $result->setting_id ?>)" class="form-control" value="<?php echo set_value('extra_bed'); ?>" name="extra_bed[]" id="extra_bed<?php echo $result->setting_id;?>" disabled="" 
                        onkeypress="return onlyNumbers(event)" placeholder="Numbers only" >
                        <input type="hidden" value="<?php echo $extra_bed_rate;?>" id="extra_bed_rate<?php echo $result->setting_id;?>"/>
                        
                             <input type="hidden" id="extra_amount<?php echo $result->setting_id;?>" value="" class="extra_amount">
						  <input type="hidden" id="no_of_bed_<?php echo $result->setting_id;?>" value="<?php echo $result->no_of_bed;?>" class="">
						 <div class="notes_cus_offline "> <span id="bed_count_<?php echo $result->setting_id ?>"><?php echo $result->no_of_bed;?></span>  extra bed for <span id="room_count_<?php echo $result->setting_id ?>">1</span> room</div>
                       </li>
					   </span>
					   <?php
							   //if(!empty($result->room_child_rate))
							   //{
							   ?>
							   <span <?php  if(empty($result->normal_allowed_kids)){?> style="display: none;" <?php }?>>
							<li class="extra_block_cus_field col-md-2"><label>No.Of. Childrens</label>					 
							<input onkeyup="getChilds(<?php echo $result->setting_id ?>)" type="text" name="number_of_childrens[]" id="childs<?php echo $result->setting_id;?>" disabled=""
.							class="form-control"  onkeypress="return onlyNumbers(event)" placeholder="Numbers only"/>

			<input type="hidden" value="<?php echo $extra_child_rate;?>" id="extra_child_rate<?php echo $result->setting_id;?>"/>
			<input type="hidden" id="extra_child_amount<?php echo $result->setting_id;?>" value="" class="extra_child_amount">
			<input type="hidden" id="no_of_child_<?php echo $result->setting_id;?>" value="<?php echo $result->normal_allowed_kids;?>" class="">
	<div class="notes_cus_offline ">					     
<span id="child_count_<?php echo $result->setting_id ?>"><?php echo $result->normal_allowed_kids;?></span>  children(s) for <span class="room_count_<?php echo $result->setting_id ?>">1</span> room</div>
					 
									</li>	
								</span>
                        <?php 
							   //} 
							   echo form_error('extra_bed'); 
                      //  endif;
                        ?>
                        
                        
                        
                     </ul>
                     
                     
                  <?php
				  
					   }
						// endif;
                 // if($avail_rooms<>'0'): echo "No Rooms"; endif;
				  endforeach; } else { echo 'No rooms'; }
				  echo form_error('r_num[]'); ?>
             </div>
			 
			 
			 
			 <div class="form-group col-lg-12"></div>
			 
			 
			 
			 
			 <!--- food plan start here--->
			 <?php
			 $foodplan['query'] = $this->Offline_model->food_plan($id);
			 
			 //if(count(array_filter($foodplan)) > 0)
			// {
			
			if(!empty($foodplan))
			 {
			 ?>
			  <div class="form-group col-lg-12" id="food_paln" style="<?php if(count(array_filter($foodplan)) == 0) echo 'display:none' ?>">
			  
                      <div class="room-list-cus room_list_cus_offline col-lg-12">
						<label class="col-lg-12 cus_offline_rooms_title">Food Plan</label>
						
					
							
						 <ul class="delrom_cus delrom_cus_offline col-md-12">
						 <?php
						  if(!empty($foodplan['query'][0]->breakfast))
							{
						 ?>
                     	 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="breakfast" value="<?php  echo $foodplan['query'][0]->breakfast;?>" id="" onclick="food_plan();" >  &nbsp;
						 Breakfast 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->lunch))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="lunch" value="<?php  echo $foodplan['query'][0]->lunch;?>" id="" onclick="food_plan();">  &nbsp;
						 Lunch  
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->dinner))
							{
								?>
							
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="dinner" value="<?php  echo $foodplan['query'][0]->dinner;?>" id="" onclick="food_plan();">  &nbsp;
						 Dinner 
						</li>
							</div>
							<?php
							}
							 if(!empty($foodplan['query'][0]->all_meals))
							{
								?>
							
							 <div class="col-md-2">
						 <li class="block_cus_field_main_title_room">
						 <input class="food" type="checkbox" name="all" value="<?php  echo $foodplan['query'][0]->all_meals;?>" id="" onclick="food_plan();">  &nbsp;
						 All Meals 
						  
						</li>  
							</div>
							<?php
							}?>
                        <div class="form-group col-lg-6">
						</div>
                     </ul>
					
					
						<div class="form-group col-lg-4">
                        <label class="col-lg-4">No.of. Days</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_days" id="no_of_days" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
						
					<div class="form-group col-lg-4">
                        <label class="col-lg-6">No.of. Persons</label>
                        <input class="col-lg-4 form-control" value="" name="no_of_persons" id="no_of_persons" onchange="food_plan();" onkeypress="return onlyNumbers(event)">
                      </div>
                      
					  
					  <div class="form-group col-lg-6">
					 <br/>
                        <label class="col-lg-6">Total Food Plan Amount</label>
                        <input class="col-lg-4 form-control" value="" name="total_food" id="total_food" readonly="">
                      </div>
				</div>
						
             </div>
			 
			 
		
		<?php
			 }
		
	 }	 
}
