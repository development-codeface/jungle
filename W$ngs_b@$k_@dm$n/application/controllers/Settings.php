<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Settingsmodel');
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
	}


	function index()
	 {
	 	$this -> load -> view('layout/header');
		$this -> load -> view('settings/index');
		$this -> load -> view('layout/footer');
		
	 }
	 
	 function changepassword()
	 {
	 	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	 
	 	if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('old_password', 'old password', 'required');
			$this->form_validation->set_rules('new_password', 'password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
			
								
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
					
				$this -> load -> view('layout/header');
				$this -> load -> view('settings/change_password',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{
				 $username=($this->input->post('username'));
				 $password=md5($this->input->post('old_password'));
				 
				 		if($this->session->userdata['user_type']=='staff')
		{
		$old_result=$this->Settingsmodel->check_staff($username,$password);
		} else {
				 
				 $old_result=$this->Settingsmodel->check_old_password($username,$password); }
				 if($old_result==0)
				 {
				 	$this->session->set_flashdata('password',"Old Password Incorrect");
					redirect('settings/changepassword');
				 }
				 else
				 {
					
					 $data['password']=md5($this->input->post('new_password'));
					 		if($this->session->userdata['user_type']=='staff')
		{
		$result=$this->Settingsmodel->change_staff($username,$data);
		} else {
					 $result=$this->Settingsmodel->change_password($username,$data);
					 }
					 if($result==1)
					 {
					 	$this->session->set_flashdata('success',"password changed successfully");
					 }
					 else
					 {
						 $this->session->set_flashdata('error',"Some problem affected");
					 }
					  redirect('settings/changepassword');
					 }
				
			}
		}
		else
		{
		 	$this -> load -> view('layout/header');
			$this -> load -> view('settings/change_password');
			$this -> load -> view('layout/footer');
		}
	 }
	 
	
	function users()
	{
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username', 'User Name', 'required');		
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('new_password', 'password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
					
				$this -> load -> view('layout/header');
				$this -> load -> view('settings/site_users',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{
				 $username=$this->session->userdata['adminusername'];
				  
				 $data['name']=($this->input->post('name'));
				 $data['username']=($this->input->post('username'));
				 $data['password']=md5($this->input->post('new_password'));
				 $data['created_by']=$this->Settingsmodel->select_admin($username); 
				 $data['menu']='';
				 $data['status']='1';
				 				 
				 $result=$this->Settingsmodel->addusers($data);
				 if($result==1)
				 {
				 	$this->session->set_flashdata('success',"New user created");
				 }
				 else
				 {
					 $this->session->set_flashdata('error',"Some problem affected");
				 }
				  redirect('settings/users');
				
			}
		}
		else
		{
			$this -> load -> view('layout/header');
					if($this->session->userdata['user_type']=='staff') {
					if(!empty($data_menu['menu']) && (in_array('38', json_decode($data_menu['menu']))==1)) {
			$this -> load -> view('settings/site_users');
			} else {
			$this->load->view('settings/no_permission');
			}
			} else {
			$this -> load -> view('settings/site_users');
			}
			$this -> load -> view('layout/footer');
		}
	}
	
	
	function manageusers()
	{
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
		$config['base_url'] = site_url('settings/manageusers');
		$config['total_rows'] = $this -> db -> count_all('tbl_site_users');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Settingsmodel -> list_users($config["per_page"], $data['page']);
					
			
		    $this -> load -> view('layout/header');
		if($this->session->userdata['user_type']=='staff') {
		if(!empty($data_menu['menu']) && (in_array('37', json_decode($data_menu['menu']))==1)) {
			$this -> load -> view('settings/manage_users',$data);
			} else {
			$this->load->view('settings/no_permission');
			}
			} else {
			$this -> load -> view('settings/manage_users',$data);
			}
			$this -> load -> view('layout/footer');
	}
	
	function changestatus($id,$status)
	{
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('40', json_decode($data_menu['menu']))==1)) {
		$datas['status']=$status;
		$data['results'] = $this -> Settingsmodel -> changestatus($id,$datas);
		}
		} else {
		$datas['status']=$status;
		$data['results'] = $this -> Settingsmodel -> changestatus($id,$datas);
		}
				
		redirect('settings/manageusers');
	}
	
	function editusers($id)
	{
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		if(isset($_POST['submit']))
		{
			$username=$this->session->userdata['adminusername'];
				  
			$data['name']=($this->input->post('name'));
			if($this->input->post('new_password'))
			{
				
				
				$this->form_validation->set_rules('new_password', 'password', 'required');
				$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
				
								
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					
					$this->session->set_flashdata('validation_error',$data['validation']);
					redirect('settings/editusers/'.$id);
				}
				else 
				{
				$data['password']=md5($this->input->post('new_password'));
				}
			
			
			
			}
			
		
			$data['created_by']=$this->Settingsmodel->select_admin($username); 
			$data['menu']='';
			
			
			$result = $this -> Settingsmodel -> updateusers($id,$data);
			if($result==1)
			{
				$this->session->set_flashdata('success',"User Updated Successfully");
			}
			else
			{
				 $this->session->set_flashdata('error',"Some problem affected");
			}
			redirect('settings/editusers/'.$id);
							
		}
		else
		{
			$data['results'] = $this -> Settingsmodel -> editusers($id);
			
			$this -> load -> view('layout/header');
			if($this->session->userdata['user_type']=='staff') {
			if(!empty($data_menu['menu']) && (in_array('39', json_decode($data_menu['menu']))==1)) {
			$this -> load -> view('settings/edit_site_users',$data);
			} else {
			$this->load->view('settings/no_permission');
			}
			} else {
			$this -> load -> view('settings/edit_site_users',$data);
			}
			$this -> load -> view('layout/footer');
		}
		
	}

function user_exist($name)
{
	echo $query = $this -> db
	-> where('username', $name)
	-> get('tbl_site_users')
	-> num_rows();
	
}
	

function user_exist_onsubmit($name)
{
	$query = $this -> db
	-> where('username', $name)
	-> get('tbl_site_users')
	-> num_rows();
	
    if ($query < 0){
        return true;
    }
    else{
    	$this->form_validation->set_message('user_exist_onsubmit', 'This username already exists. Please try another');
        return false;
    }
}
}
?>