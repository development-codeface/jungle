<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Room_settings_model');
		$this -> load -> library('pagination');
		$this->load->model('Profilemodel');
		$this->load->model('Offermodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
		
	}


	function index()
	{
		$username				= $this->session->userdata['hotel_adminusername'];
		$id						= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] 	= site_url('offers/index');
		
		$config['total_rows'] 	= $this -> Offermodel -> get_offers_count($id);
		
		$config['per_page'] 	= "1";
		
		$config["uri_segment"] 	= 3;
		
		$choice 				= $config["total_rows"] / $config["per_page"];
		
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		
		$data['pagination'] 	= $this -> pagination -> create_links();

		$data['offer'] = $this -> Offermodel -> get_offers($id, $config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('30', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('offer/list', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('offer/list', $data);
		}
		
		//$this -> load -> view('offer/list', $data);
		
		$this -> load -> view('layout/footer');
		
	 }
	 
	 
	 function add()
	 {
	 	$username 					= $this->session->userdata['hotel_adminusername'];
		$id							= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['allRooms']			= $this->Room_settings_model->allRooms($id);
		
		$data['hotel_list']			= $this->Room_settings_model->get_allDetails($id);
		
		if(isset($_POST['offer_sub']))
		{
			$offer['hotel_id'] 		= $id	;
			
			$offer['offer_type'] 	= $this->input->post('offer_type');
			
			$offer['from_date'] 	= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
			$offer['to_date'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_to')), 'Y-m-d');
			
			$offer['offer'] 		= $this->input->post('offer');
			
			$offer['status'] 		= 1;
			
			$this -> db -> insert('tbl_offers', $offer);
			
			$this -> session -> set_flashdata('success','Offer created successfully');
			
			redirect('offers/add/');
		}
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('29', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('offer/add', $data);}
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('offer/add', $data);
		}
		//$this -> load -> view('offer/add', $data);
		
		$this -> load -> view('layout/footer');
	 }


	function edit($offer_id)
	{
		$username				= $this->session->userdata['hotel_adminusername'];
		$id						= $this->Profilemodel->get_id($username);
		
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['allRooms']		= $this->Room_settings_model->allRooms($id);
		
		$data['offer'] = $this -> Offermodel -> offer($offer_id);
		
		if(isset($_POST['offer_edit']))
		{
			$offer['hotel_id'] 		= $id	;
			
			$offer['offer_type'] 	= $this->input->post('offer_type');
			
			$offer['from_date'] 	= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
			$offer['to_date'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_to')), 'Y-m-d');
			
			$offer['offer'] 		= $this->input->post('offer');
			
			$offer['status'] 		= 1;
			
			$this -> db -> where('id', $offer_id) -> update ('tbl_offers', $offer);
			
			$this -> session -> set_flashdata('success','Offer updated successfully');
			
			redirect('offers/edit/'.$offer_id);
		}
		
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('31', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('offer/edit', $data);}
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('offer/edit', $data);
		}
		//$this -> load -> view('offer/edit', $data);
		
		$this -> load -> view('layout/footer');
	}
	
	
	function delete($id)
	{
		$username				= $this->session->userdata['hotel_adminusername'];
		$id						= $this->Profilemodel->get_id($username);
		
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		if(!empty($data_menu['menu']))
		{	if(in_array('31', json_decode($data_menu['menu']))==1)
			{ 
		$this -> db -> where('id', $id) -> delete('tbl_offers');
		redirect('offers');
		}
			else{ $this -> load -> view('layout/header');
			$this->load->view('layout/no_permission');
			$this -> load -> view('layout/footer');}
		}
		else
		{ $this -> db -> where('id', $id) -> delete('tbl_offers');
		redirect('offers');
		}
		
		
	}
}
?>