<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomnumber extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		
		$this -> load -> library('pagination');
		$this->load->model('Roomnumber_model');
		$this->load->model('Profilemodel');
		$this->load->library('image_lib');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	}
	public function index()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
			
		$data['blocked'] = $this -> Roomnumber_model -> getBlocked($id);
		
		$data['results'] = $this->Roomnumber_model->allList($id);
		
		$this->load->view('layout/header');
		//$this->load->view('roomnumber/list',$data);
		if(!empty($data_menu['menu']))
		{	if(in_array('14', json_decode($data_menu['menu']))==1)
			{ $this->load->view('roomnumber/list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('roomnumber/list',$data);	
		}
		$this->load->view('layout/footer');
		
	}
	public function add()
	{

			$username = $this->session->userdata['hotel_adminusername'];
			$id= $this->Profilemodel->get_id($username); 
			
			if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
			$data['allRooms'] 	= $this->Roomnumber_model->allRooms($id);
			
			//$data['results'] = $this->Roomnumber_model->allhotels($id);
			
			    if(isset($_POST['room_submit']))
				{	
						
					$data_room['room_number'] = $this->input->post('room_num');
					
					if(!empty($data_room['room_number']))
					{
						
						$room_no= array_unique($data_room['room_number']); 
						
			
						 $room_count = count(array_filter($room_no)); 
						 if($room_count<>'0')
						 {
							$room_key = array_keys(array_filter($room_no));
								
							for($i=0; $i<$room_count; $i++)
							{
							    $j=$room_key[$i];
									
							    $room_data1['room_id'] = $this->input->post('room_id');
							    $room_data1['hotel_id'] = $id;
								$room_data1['room_number'] =$data_room['room_number'][$j];
								$room_data1['status'] = 1;
								 $room_check=$this->Roomnumber_model->room_check($room_data1); 
								//echo $this -> db -> last_query(); exit;
								if($room_check==0)
								{
								$insert=$this->db->insert('tbl_hotel_roomnumber',$room_data1);
								$this->session->set_flashdata('success','Rooms added successfully');
								}
								else 
								{
								//$this->Roomnumber_model->room_exist_update($room_data1); 
									$this->session->set_flashdata('error','Room '.$room_data1['room_number'] .' already exists');
									//redirect('roomnumber/add/');
								}
							}
						
						
		
							
							redirect('roomnumber/add/');
						}
						else
						{
							$this->session->set_flashdata('error','Some Problem Affected');
							redirect('roomnumber/add/');
						}
						
					}
					else
					{
							$this->session->set_flashdata('error','Some Problem Affected');
							redirect('roomnumber/add/');
					}
				}
				
			
	
				$data['validation']='';
		
				$this->load->view('layout/header');
				if(!empty($data_menu['menu']))
				{	if(in_array('13', json_decode($data_menu['menu']))==1)
					{ $this->load->view('roomnumber/add',$data); }
					else{ $this->load->view('layout/no_permission');}
				}
				else
				{ $this->load->view('roomnumber/add',$data);	
				}
				//$this->load->view('roomnumber/add', $data);
				$this->load->view('layout/footer');
			
		
	}
 
 	public function edit($num)
	{

			$username = $this->session->userdata['hotel_adminusername'];
			$id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
			$data['thisRoom']	= $this -> Roomnumber_model -> getRoom($num);
			
			$data['allRooms'] 	= $this->Roomnumber_model->allRooms($id);
			
if(isset($_POST['room_submit']))
				{
					$room['room_id']		= $this->input->post('room_id');
					$room['room_number']	= $this->input->post('num_rooms');
					
					$check_exist			= $this -> Roomnumber_model -> checkExist($room['room_id'], $room['room_number'], $id);
					
				if($check_exist > 0) {
							$this->session->set_flashdata('error','This room already exists, no changes made');
							redirect('roomnumber/edit/'.$num);					
				} else {
					$this -> Roomnumber_model -> room_block($room, $num); 
							$this->session->set_flashdata('success','Room combination updated successfully');
							redirect('roomnumber');					
				}
				}
else {
		
				$this->load->view('layout/header');
				if(!empty($data_menu['menu']))
		{	if(in_array('52', json_decode($data_menu['menu']))==1)
			{ $this->load->view('roomnumber/edit', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('roomnumber/edit', $data);
		}
				//$this->load->view('roomnumber/edit', $data);
				$this->load->view('layout/footer');
				}
		
	}

	function delete($num)
	{
		$username = $this->session->userdata['hotel_adminusername'];
			$id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		
		//room booking check before delete
		$bookroom = $this->Roomnumber_model->check_booking($num); 
		if(!empty($bookroom))
		{
			$this->session->set_flashdata('msg','Room can not be delete. There is a reservation in this room id');
			redirect('roomnumber');	
		}
		else
		{
			if(!empty($data_menu['menu']))
			{	if(in_array('54', json_decode($data_menu['menu']))==1)
				{ //$this -> db -> where('id', $num) -> delete('tbl_hotel_roomnumber');
				$this->db->where('id', $num)->update('tbl_hotel_roomnumber', array('status' => 2));
			redirect('roomnumber');	 }
				else{ $this->load->view('layout/header');
				$this->load->view('layout/no_permission');
				$this->load->view('layout/footer');}
			}
			else
			{ //$this -> db -> where('id', $num) -> delete('tbl_hotel_roomnumber');
			$this->db->where('id', $num)->update('tbl_hotel_roomnumber', array('status' => 2));
			redirect('roomnumber');		
			}
		}
			
	}
 
 	public function get_rooms_number($room_id)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$hotel_id= $this->Profilemodel->get_id($username); 
		
		$rooms =$this->Roomnumber_model->room_numbers($hotel_id,$room_id,NULL,NULL);
		if(!empty($rooms)):
		?>
		
		<div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Rooms</h3>
              </div>
              <div class="panel-body">
                
                 <div class="col-lg-12">   		
							      
				                    
                      
                      
							                   <div class="room_block">
							                 	
							                     <br/>
							                      
							                      <div class="form-group row">
	 <?php
		foreach($rooms as $room_num):
			?>
			
			<div class="col-md-1 col-xs-3 col-sd-2 room-list-block">
				 <input class=" form-control" name="type[]" value="<?php echo $room_num->room_number;?>" readonly >
					
			</div> 
							                      	    	
		<?php
		endforeach;
		endif;
		?>
		      	    
		 </div>
		   </div>
		   
		       <br/> </div> 
                
                
              </div>
            </div>
          </div>
		<?php
		
	}

	public function room_block($id,$status)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username);
			
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		if(isset($_POST['room_block']))
		{
			$this -> form_validation -> set_rules('from', 'from', 'trim|required');
			$this -> form_validation -> set_rules('to', 'to', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
			
			$data['status']		= $status;
			$data['valid_from']	= date_format(date_create_from_format('d-m-Y', $this->input->post('from')), 'Y-m-d');
			$data['valid_to']	= date_format(date_create_from_format('d-m-Y', $this->input->post('to')), 'Y-m-d');
			$data['remarks']	= $this->input->post('remark');
			
			$block = $this->Roomnumber_model->room_block($data, $id); }
			
			echo  "<script type='text/javascript'>window.close();</script>";
		}
		else {
			
			if(!empty($data_menu['menu']))
				{	if(in_array('15', json_decode($data_menu['menu']))==1)
					{ $this->load->view('roomnumber/room_block'); }
					else{ $this->load->view('layout/no_permission');}
				}
				else
				{ $this->load->view('roomnumber/room_block');	
				}
				
			//$this -> load -> view('roomnumber/room_block');
		}
			
	}
	

	public function room_unblock($id,$status)
	{
		$data['status']		= $status;
		$data['valid_from']	= '';
		$data['valid_to']	= '';
		
		echo $this->Roomnumber_model->room_block($data,$id);
		
	}
	
	public function view_blocked()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['blocked'] = $this -> Roomnumber_model -> getBlocked($id);
		//print_r($data); exit;
		if(!empty($data_menu['menu']))
		{	if(in_array('53', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('roomnumber/view_blocked', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('roomnumber/view_blocked', $data);
		}
		//$this -> load -> view('roomnumber/view_blocked', $data);
	}
	
	function room_edit($id)
	{
		$data['room'] = $this -> db -> where('id', $id) -> where('status', 0) -> get('tbl_hotel_roomnumber') -> row();
		$this -> load -> view('roomnumber/room_block', $data);
	}
	
}
