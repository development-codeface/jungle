<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Settingsmodel');		
		$this->load->model('Profilemodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
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
		 $username 					= $this -> session -> userdata['hotel_adminusername'];
		$id							= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
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
				 $old_result=$this->Settingsmodel->check_old_password($username,$password); 
				 if($old_result==0)
				 {
				 	$this->session->set_flashdata('password',"Old Password Incorrect");
					redirect('settings/changepassword');
				 }
				 else
				 {
					
				 $data['password']=md5($this->input->post('new_password'));
				 $result=$this->Settingsmodel->change_password($username,$data);
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
			if(!empty($data_menu['menu']))
		{	if(in_array('16', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('settings/change_password'); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('settings/change_password');
		}
			//$this -> load -> view('settings/change_password');
			$this -> load -> view('layout/footer');
		}
	 }
	 
	
	function users()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username', 'User Name', 'required|callback_user_exist_onsubmit');		
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('new_password', 'password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
					
				$this -> load -> view('layout/header');
				$this -> load -> view('settings/staff',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{
				 $username = $this->session->userdata['hotel_adminusername'];
			     $id= $this->Profilemodel->get_id($username);
				 
				 $hotel_number = $this->db->select('hotel_number')->where('id',$id)->get('tbl_hotel')->result();
				 
				 $data['hotel_id']=$id;  
				 $data['hotel_number']=$hotel_number[0]->hotel_number;
				 $data['name']=($this->input->post('name'));
				 $data['username']=($this->input->post('username'));
				 $data['password']=md5($this->input->post('new_password'));				
				 $data_menu['menu']='';
				 $data['status']='1';
				 				 
				 $result=$this->Settingsmodel->addusers($data);
				 if($result==1)
				 {
				 	$this->session->set_flashdata('success',"New staff added");
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
			if(!empty($data_menu['menu']))
		{	if(in_array('33', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('settings/staff');}
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('settings/staff');
		}
			//$this -> load -> view('settings/staff');
			$this -> load -> view('layout/footer');
		}
	}
	
	
	function manageusers()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('settings/manageusers');
		$config['total_rows'] = $this -> Settingsmodel -> row_count($id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Settingsmodel -> list_users($id,$config["per_page"], $data['page']);
					
			
		    $this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
		{	if(in_array('34', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('settings/manage_staff',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('settings/manage_staff',$data);
		}
			//$this -> load -> view('settings/manage_staff',$data);
			$this -> load -> view('layout/footer');
	}
	
	function changestatus($id,$status)
	{
		$datas['status']=$status;
		$data['results'] = $this -> Settingsmodel -> changestatus($id,$datas);
				
		redirect('settings/manageusers');
	}
	
	function editusers($id)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		if(isset($_POST['submit']))
		{
			
				  
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
			 
			$data_menu['menu']='';
			
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
			
			if(!empty($data_menu['menu']))
			{	if(in_array('35', json_decode($data_menu['menu']))==1)
				{ $this -> load -> view('settings/edit_staff',$data); }
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ $this -> load -> view('settings/edit_staff',$data);
			}
			//$this -> load -> view('settings/edit_staff',$data);
			$this -> load -> view('layout/footer');
		}
		
	}
	
function user_exist($name)
{
	$username = $this->session->userdata['hotel_adminusername'];
	$id= $this->Profilemodel->get_id($username);
		
	echo $query = $this -> db
	-> where('username', $name)
	-> where('hotel_id', $id)
	-> get('tbl_hotel_staff')
	-> num_rows();
	
}
	

function user_exist_onsubmit($name)
{
	$username = $this->session->userdata['hotel_adminusername'];
	$id= $this->Profilemodel->get_id($username);
		
	$query = $this -> db
	-> where('username', $name)
	-> where('hotel_id', $id)
	-> get('tbl_hotel_staff')
	-> num_rows();
	
    if ($query == 0){
        return true;
    }
    else{
    	$this->form_validation->set_message('user_exist_onsubmit', 'This username already exists. Please try another');
        return false;
    }
}

function menu_setting()
{	
	$username = $this->session->userdata['hotel_adminusername'];
	$id= $this->Profilemodel->get_id($username);
			
if(isset($_POST['submit']))

{
	$user_id= $this->input->post('users');
	$data['menu']= json_encode($this->input->post('menu'));
	if($data['menu']=='null')
	{
		$data['menu']='["0"]';
		
	}
	
	$update_setting = $this->Settingsmodel->menu_setting($id,$user_id,$data);
	
		if($update_setting==1)
		{
			$this->session->set_flashdata('success',"User menu updated Successfully");
		}
		else
		{
			 $this->session->set_flashdata('error',"Some problem affected");
		}
		
		redirect('settings/menu_setting',$data);
}	
	$data['users'] = $this->Settingsmodel->list_hotel_staff($id);
	$this -> load -> view('layout/header');
	$this->load->view('settings/menu_setting',$data);
	$this -> load -> view('layout/footer');
}

function user_menu($users)
{
		$username = $this->session->userdata['hotel_adminusername']; 
		$id= $this->Profilemodel->get_id($username); 
		
		$data['user_menu'] = $this->Profilemodel->select_user_menu($users,$id); 
		
	
	$this->load->view('settings/user_menu_list',$data);
}
}
?>