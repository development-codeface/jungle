<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_plan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this->load->model('Profilemodel');
		$this->load->model('Food_model');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	}
	
	function index(){
		$username		= $this->session->userdata['hotel_adminusername'];
		$id				= $this->Profilemodel->get_id($username); 
		
			
			if($this->session->userdata['user_type']=='staff')
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); 
			}
			else
			{
				$data_menu['menu']='';
			}
		$data['plan']	= $this -> Food_model -> plan($id);
		
		if(isset($_POST['plan_sub'])) {
			$plan['hotel_id']	= $id;
			$plan['breakfast']	= $this->input->post('breakfast');
			$plan['lunch']		= $this->input->post('lunch');
			$plan['dinner']		= $this->input->post('dinner');
			$plan['all_meals']	= $this->input->post('all_meals');
			$plan['status']		= 1;
			
			$this->db->insert('tbl_foodplan', $plan);
			
			$this -> session -> set_flashdata('success','Food plan tariffs added');
			
			redirect('food_plan');
		}
		else if(isset($_POST['plan_edit'])) {
			$plan['hotel_id']	= $id;
			$plan['breakfast']	= $this->input->post('breakfast');
			$plan['lunch']		= $this->input->post('lunch');
			$plan['dinner']		= $this->input->post('dinner');
			$plan['all_meals']	= $this->input->post('all_meals');
			$plan['status']		= 1;
			
			$this->db->where('hotel_id', $id)->update('tbl_foodplan', $plan);
			
			$this -> session -> set_flashdata('success','Food plan tariffs updated');
			
			redirect('food_plan');
		}
		
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('3', json_decode($data_menu['menu']))==1)
			{ $this->load->view('food/add',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('food/add',$data);	
		}
		//$this -> load -> view('food/add', $data);
		$this -> load -> view('layout/footer');
	}

}
?>