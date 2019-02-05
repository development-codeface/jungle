<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomcomp extends CI_Controller {

	
	function __construct() 
	{
		parent::__construct();
		$this -> load -> library('pagination');
		$this->load->model('Room_settings_model');
		$this->load->model('Roommodel');
		$this->load->model('Profilemodel');
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
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); 
			}
			else
			{
				$data_menu['menu']='';
			}
			
		$config['base_url'] = site_url('roomcomp/index');
		$config['total_rows'] = $this -> Room_settings_model -> row_count($id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->Room_settings_model->allList($id,$config["per_page"], $data['page']);
		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('10', json_decode($data_menu['menu']))==1)
			{ $this->load->view('roomcomp/list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('roomcomp/list',$data);	
		}
		//$this->load->view('roomcomp/list',$data);
		$this->load->view('layout/footer');
		
	}
	
	public function add()
	{
		$data['msg'] = '';
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['allRooms'] 	= $this->Room_settings_model->allRooms($id);
		
		$data['hotel_list']=$this->Room_settings_model->get_allDetails($id);
		if(isset($_POST['room_submit']))
			{
			$this -> form_validation -> set_rules('room_id', 'Room type', 'trim|required');
			$this -> form_validation -> set_rules('room_price', 'Room price', 'trim|required');
			//$this -> form_validation -> set_rules('validity_from', 'Valid from date', 'trim|required');
			//$this -> form_validation -> set_rules('validity', 'Valid to date', 'trim|required');
	
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');		
			
			if ($this->form_validation->run() == TRUE) {
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_id');
				$data_room['price'] 			= $this->input->post('room_price');
				// $data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['services']			= '';
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['normal_allowed_adults'] = $this->input->post('allowed_adult');
				$data_room['normal_allowed_kids'] 	= $this->input->post('allowed_kid');
				
				$a=0;
				$from = $this->input->post('validity_from');
				foreach($from as $fm) {
				$valid_from[$a] 		= date_format(date_create_from_format('d-m-Y', $fm), 'Y-m-d');
				$a++;
				}
				
				$a=0;
				$to = $this->input->post('validity');
				foreach($to as $t) {
				$valid_upto[$a] 		= date_format(date_create_from_format('d-m-Y', $t), 'Y-m-d');
				$a++;
				}
				
				$data_room['no_of_bed'] 		= $this->input->post('no_of_bed');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['available_status'] 	= 1;
				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit');
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				
				foreach (array_combine($valid_from, $valid_upto) as $from => $to) {
				if(!empty($from) && !empty($to)) {
				$data_room['valid_from'] = $from;
				$data_room['valid_upto'] = $to;
				
				$affect = $this->db->insert('tbl_hotel_room_settings', $data_room);
				}
				}
				
				if($affect > 0)
				{
				//// hotelmanager_log ////
				$check = $this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('DATE(date)', date('Y-m-d'))
				-> get('tbl_hotelmanager_log')
				-> row();
				
				if(count($check) == 0) {
				$data2['hotel_id'] = $data_room['hotel_id'];
				$data2['login_status'] = 0;
				$data2['room_set_status'] = 1;
				$data2['booking_status'] = 0;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db -> insert('tbl_hotelmanager_log',$data2);
				} else {
				$data2['room_set_status'] = $check -> room_set_status + 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('date', $check -> date)
				-> update('tbl_hotelmanager_log',$data2);
				}
				//// hotelmanager_log ////
				
					$this->session->set_flashdata('success','Rooms Combination added successfully');
					redirect('roomcomp/add');
		
				}
				} else {
					$this->session->set_flashdata('error','Error : Please try again');
					redirect('roomcomp/add');
				}
			} else {

		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('9', json_decode($data_menu['menu']))==1)
			{ $this->load->view('roomcomp/add',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('roomcomp/add',$data);	
		}
		//$this->load->view('roomcomp/add',$data);
		$this->load->view('layout/footer');
		}
	}

	public function edit($setting_id)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['result'] = $this->Room_settings_model->roomsettings_ById($setting_id);
		$data['all_hotels'] = $this->Roommodel->allhotels($id);
		$data['allRooms'] 	= $this->Room_settings_model->allRooms($id);
		$data['msg'] = '';

		if(isset($_POST['room_settings_submit']))
			{
			$this -> form_validation -> set_rules('room_id', 'Room type', 'trim|required');
			$this -> form_validation -> set_rules('room_price', 'Room price', 'trim|required');
			$this -> form_validation -> set_rules('valid_from', 'Valid from date', 'trim|required');
			$this -> form_validation -> set_rules('validity', 'Valid to date', 'trim|required');
	
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');	

			if ($this->form_validation->run() == TRUE) {
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_id');
				$data_room['room_price'] 		= $this->input->post('room_price');
				// $data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				// $data_room['num_rooms'] 		= $this->input->post('num_rooms');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['services']			= '';
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['normal_allowed_adults'] = $this->input->post('allowed_adult');
				$data_room['normal_allowed_kids'] 	= $this->input->post('allowed_kid');
				$data_room['valid_from'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
				$data_room['valid_upto'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('validity')), 'Y-m-d');
				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit'); 
				$data_room['no_of_bed'] 		= $this->input->post('no_of_bed'); 
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['id'] = $setting_id;
				
				//print_r($data_room); exit;
				
				$res_room_update = $this->Room_settings_model->upd_room($data_room);
				
				//// hotelmanager_log ////
				if($res_room_update > 0) {
				$check = $this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('DATE(date)', date('Y-m-d'))
				-> get('tbl_hotelmanager_log')
				-> row();
				
				if(count($check) == 0) {
				$data2['hotel_id'] = $data_room['hotel_id'];
				$data2['login_status'] = 0;
				$data2['room_set_status'] = 1;
				$data2['booking_status'] = 0;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db -> insert('tbl_hotelmanager_log',$data2);
				} else {
				$data2['room_set_status'] = $check -> room_set_status + 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('date', $check -> date)
				-> update('tbl_hotelmanager_log',$data2);
				}
				}
				//// hotelmanager_log ////
				
				$this->session->set_flashdata('success','Rooms combination updated successfully');
				redirect('roomcomp/edit/'.$setting_id);			
			} else {
					$this->session->set_flashdata('error','Error : Please try again');
					redirect('roomcomp/edit/'.$setting_id);
				}
} else {

		$this->load->view('layout/header');
		//$this->load->view('roomcomp/edit',$data);
		if(!empty($data_menu['menu']))
		{	if(in_array('11', json_decode($data_menu['menu']))==1)
			{ $this->load->view('roomcomp/edit',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('roomcomp/edit',$data);	
		}
		$this->load->view('layout/footer'); }

		
	}
	public function get_rooms_hotels($ele)
	{
		$data=$this->Room_settings_model->get_rooms_attached($ele);

		if(!empty($data))
		  	{
				echo '<div class="form-group row">
						<label class="col-lg-4">Room Type</label>
						<select class="col-lg-8 form-control beds" name="room_attached" id="room_attached">
					  	<option value="">--Select--</option>';
						foreach($data as $type)
						{
							echo '<option value="'.$type->id.'">'.$type->room_title.'</option>';	  
						}
						  echo '</select>
						  		</div>';
	  		}

		
	}
	
	
	function delete($id)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		if(!empty($data_menu['menu']))
		{	if(in_array('12', json_decode($data_menu['menu']))==1)
			{  $this->Room_settings_model->delete($id);
				redirect('roomcomp'); 
			}
			else{ 
			$this->load->view('layout/header');
			$this->load->view('layout/no_permission');
			$this->load->view('layout/footer');}
		}
		else
		{ 	
			$this->Room_settings_model->delete($id);
			redirect('roomcomp');
		}
		
	}
}
