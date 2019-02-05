<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this->load->model('Profilemodel');
		$this->load->model('Agency_model');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	}


	function index(){
		$username				= $this->session->userdata['hotel_adminusername'];
		$id						= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] 	= site_url('agency/index');
		$config['total_rows'] 	= $this -> Agency_model -> get_count($id);
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		$data['agency']			= $this -> Agency_model -> agency_list($id, $config["per_page"], $data['page']);
		$data['agency_bw']		= $this -> Agency_model -> agency_bw($id);
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('26', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('agency/list', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('agency/list', $data);
		}
		//$this -> load -> view('agency/list', $data);
		$this -> load -> view('layout/footer');
	}
	
	
	function add(){
		$username 					= $this -> session -> userdata['hotel_adminusername'];
		$id							= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		if(isset($_POST['agency_sub'])) {
			$this -> form_validation -> set_rules('agency_name', 'name', 'trim|required');
			$this -> form_validation -> set_rules('agency_address', 'address', 'trim|required');
			$this -> form_validation -> set_rules('agency_contact', 'contact', 'trim|required|numeric');
			$this -> form_validation -> set_rules('agency_email1', 'email', 'trim|required|valid_email');
			//$this -> form_validation -> set_rules('agency_pack', 'package tariff', 'trim|required');
			$this -> form_validation -> set_rules('agency_room', 'room tariff', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']=validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('agency/add',$data);
				$this -> load -> view('layout/footer');
			}
			else {
				$agency['hotel_id'] 	= $id;
				$agency['agency'] 		= $this->input->post('agency_name');
				$agency['address'] 		= $this->input->post('agency_address');
				$agency['contact'] 		= $this->input->post('agency_contact');
				$agency['email1'] 		= $this->input->post('agency_email1');
				$agency['email2'] 		= $this->input->post('agency_email2');
				$agency['email3'] 		= $this->input->post('agency_email3');
				$agency['package_tariff']	= $this->input->post('agency_pack');
				$agency['room_tariff']		= $this->input->post('agency_room');
				$agency['default_package_tariff']			= $this->input->post('agency_pack_date');
				$agency['default_room_tariff']				= $this->input->post('agency_room_date');
				$from					= $this->input->post('agency_from');
				if(!empty($from)) {
				$agency['valid_from']	= date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d');
				}
				$to						= $this->input->post('agency_to');
				if(!empty($to)) {
				$agency['valid_to']		= date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d');
				}
				$agency['status'] = 1;
				
				$this -> db -> insert('tbl_agency', $agency);
				
				$this -> session -> set_flashdata('success','Agency added successfully');
				
				redirect('agency/add');
			}

		}
		else
		{
			$this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
			{	if(in_array('25', json_decode($data_menu['menu']))==1)
				{ $this -> load -> view('agency/add'); }
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ $this -> load -> view('agency/add');
			}
			//$this -> load -> view('agency/add');
			$this -> load -> view('layout/footer');
		}
	}

	function edit($id='') {
		$data['agency'] = $this -> Agency_model -> agency($id);
		
		$username 		= $this -> session -> userdata['hotel_adminusername'];
		$h_id 			= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		$data['id']=$id;
		
		if(isset($_POST['agency_edit'])) {
			$this -> form_validation -> set_rules('agency_name', 'name', 'trim|required');
			$this -> form_validation -> set_rules('agency_address', 'address', 'trim|required');
			$this -> form_validation -> set_rules('agency_contact', 'contact', 'trim|required|numeric');
			$this -> form_validation -> set_rules('agency_email1', 'email', 'trim|required|valid_email');
			//$this -> form_validation -> set_rules('agency_pack', 'package tariff', 'trim|required');
			$this -> form_validation -> set_rules('agency_room', 'room tariff', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']		= validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('agency/edit',$data);
				$this -> load -> view('layout/footer');
			}
			else {
				$agency['agency'] 		= $this->input->post('agency_name');
				$agency['address'] 		= $this->input->post('agency_address');
				$agency['contact'] 		= $this->input->post('agency_contact');
				$agency['email1'] 		= $this->input->post('agency_email1');
				$agency['email2'] 		= $this->input->post('agency_email2');
				$agency['email3'] 		= $this->input->post('agency_email3');
				$agency['package_tariff']	= $this->input->post('agency_pack');
				$agency['room_tariff']		= $this->input->post('agency_room');
				$agency['default_package_tariff']			= $this->input->post('agency_pack_date');
				$agency['default_room_tariff']				= $this->input->post('agency_room_date');
				$from					= $this->input->post('agency_from');
				if(!empty($from)) {
				$agency['valid_from']	= date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d');
				}
				$to						= $this->input->post('agency_to');
				if(!empty($to)) {
				$agency['valid_to']		= date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d');
				}
				$agency['status'] = 1;
				
				$this -> db -> where('id', $id) -> where('hotel_id', $h_id) -> update('tbl_agency', $agency);
				
				$this -> session -> set_flashdata('success','Agency updated successfully');
				
				redirect('agency/edit/'.$id);
			}
		}
		else {
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('27', json_decode($data_menu['menu']))==1)
			{ $this->load->view('agency/edit',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('agency/edit',$data);	
		}
		//$this -> load -> view('agency/edit', $data);
		$this -> load -> view('layout/footer');
		}
	}
	
	function edit_bw($id='') {
		$username 		= $this -> session -> userdata['hotel_adminusername'];
		$h_id 			= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		$data['agency'] = $this -> Agency_model -> agency_bw($h_id);
		$data['id']=$id;
		
		if(isset($_POST['agency_edit'])) {
			$this -> form_validation -> set_rules('agency_name', 'name', 'trim|required');
			$this -> form_validation -> set_rules('agency_address', 'address', 'trim|required');
			$this -> form_validation -> set_rules('agency_contact', 'contact', 'trim|required|numeric');
			$this -> form_validation -> set_rules('agency_email1', 'email', 'trim|required|valid_email');
			//$this -> form_validation -> set_rules('agency_pack', 'package tariff', 'trim|required');
			$this -> form_validation -> set_rules('agency_room', 'room tariff', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']		= validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('agency/edit',$data);
				$this -> load -> view('layout/footer');
			}
			else {
				if(empty($id)) {
				$agency['hotel_id'] 	= $h_id; }
				$agency['agency'] 		= $this->input->post('agency_name');
				$agency['address'] 		= $this->input->post('agency_address');
				$agency['contact'] 		= $this->input->post('agency_contact');
				$agency['email1'] 		= $this->input->post('agency_email1');
				$agency['email2'] 		= $this->input->post('agency_email2');
				$agency['email3'] 		= $this->input->post('agency_email3');
				$agency['package_tariff']	= $this->input->post('agency_pack');
				$agency['room_tariff']		= $this->input->post('agency_room');
				$agency['default_package_tariff']			= $this->input->post('agency_pack_date');
				$agency['default_room_tariff']				= $this->input->post('agency_room_date');
				$from					= $this->input->post('agency_from');
				if(!empty($from)) {
				$agency['valid_from']	= date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d');
				}
				$to						= $this->input->post('agency_to');
				if(!empty($to)) {
				$agency['valid_to']		= date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d');
				}
				$agency['status'] = 1;
				
				if(empty($id)) {
				$this -> db -> insert('tbl_agency', $agency);
				}
				else {
				$this -> db -> where('hotel_id', $h_id) -> where('id', $id) -> update('tbl_agency', $agency); } 
				
				$this -> session -> set_flashdata('success','Agency updated successfully');
				
				redirect('agency/');
			}
		}
		else {
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('27', json_decode($data_menu['menu']))==1)
			{ $this->load->view('agency/edit',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('agency/edit',$data);	
		}
		//$this -> load -> view('agency/edit', $data);
		$this -> load -> view('layout/footer');
		}
	}

	function delete($id) {
		
		$username 		= $this -> session -> userdata['hotel_adminusername'];
		$h_id 			= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		if(!empty($data_menu['menu']))
		{	if(in_array('27', json_decode($data_menu['menu']))==1)
			{ $this -> db -> where('id', $id) -> delete('tbl_agency');
			redirect('agency'); }
			else{ 	$this -> load -> view('layout/header');
			$this->load->view('layout/no_permission');
				$this -> load -> view('layout/footer');}
		}
		else
		{ $this -> db -> where('id', $id) -> delete('tbl_agency');
			redirect('agency');	
		}
		
		
	}
}
?>