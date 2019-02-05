<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Groupmodel');
		
		
		if(!isset($this->session->userdata['group_adminuser']))
		{
				redirect('login');
		}
		
	}

/* 	function index()
	{
		$this -> load -> view('layout/header');
		$this -> load -> view('travels/index');
		$this -> load -> view('layout/footer');
	} */
	
	function list_group()
	{
		$username = $this->session->userdata['group_adminuser']; 
		$group_id = $this->Groupmodel->get_id($username); 
		
		 if(!empty($this->session->userdata['hotel_adminusername']))
		{
			$this->session->unset_userdata('hotel_adminusername');
			$this->session->unset_userdata('hotel_num');
		}
		
		
		$config['base_url'] = site_url('group/list_group');
		$config['total_rows'] = $this -> Groupmodel -> count_hotel( $group_id[0]->id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Groupmodel -> alldetails($config["per_page"], $data['page'], $group_id[0]->id);
		
		$this -> load -> view('layout/group_header');
		$this -> load -> view('group/group_list', $data);
		//$this -> load -> view('layout/footer');
	}
	
	function delete($id)
	{
		$this->Groupmodel->delete($id);
		redirect('group/list_group');
	}
	
	function changepassword()
	{
		$username = $this->session->userdata['group_adminuser']; 
		$group_id = $this->Groupmodel->get_id($username); 
		
	 	if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('old_password', 'old password', 'required');
			$this->form_validation->set_rules('new_password', 'password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
			
								
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
					
				$this -> load -> view('layout/group_header');
				$this -> load -> view('group/change_password',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{
				 $username=($this->input->post('username'));
				 $password=md5($this->input->post('old_password'));
				 $old_result=$this->Groupmodel->check_old_password($username,$password); 
				 if($old_result==0)
				 {
				 	$this->session->set_flashdata('password',"Old Password Incorrect");
					redirect('group/changepassword');
				 }
				 else
				 {
					
				 $data['password']=md5($this->input->post('new_password'));
				 $result=$this->Groupmodel->change_password($username,$data);
				 if($result==1)
				 {
				 	$this->session->set_flashdata('success',"password changed successfully");
				 }
				 else
				 {
					 $this->session->set_flashdata('error',"Some problem affected");
				 }
				  redirect('group/changepassword');
				   
				 }
				
			}
		}
		else
		{
		 	$this -> load -> view('layout/group_header');
			 $this -> load -> view('group/change_password'); 		
			$this -> load -> view('layout/footer');
		}
	}
	

}
?>