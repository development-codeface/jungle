<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/index');
	}
	public function login_form()
	{
		
		if(isset($this->session->userdata['adminusername']))
				{
						redirect('dashboard');
				}
				else
				{
					
					
						$this->form_validation->set_rules('username', 'Username', 'required');
						$this->form_validation->set_rules('password', 'Password', 'required|md5');
						$this->form_validation->set_rules('usertype', 'User type', 'required');
						
						if ($this->form_validation->run() == FALSE)
						{
							$data['validation']=validation_errors();
							$this->load->view('index',$data);
						}
						else 
						{
							 $data['username']=$this->input->post('username');
							 $data['password']=$this->input->post('password');
							 $data['user']=$this->input->post('usertype');
							
							if($data['user'] == 'admin') {
							$this->db->where('password',$data['password']);
							$this->db->where('username',$data['username']);
							$query_res=$this->db->get('tbl_site_manager');
							$result=$query_res->result();
							} else {
							$this->db->where('password',$data['password']);
							$this->db->where('username',$data['username']);
							$query_res=$this->db->get('tbl_site_users');
							$result=$query_res->result();
							}
								
							if(!empty($result))
							{
								$admindata = array(
			                   'adminusername'  => $data['username'],
			                   'user_type'  => $data['user'],
			                   'user_id'  => $result[0] -> id
				              	);
							   $this->session->set_userdata($admindata);
							   $data['admin_session']=$this->session->all_userdata();
							   redirect('dashboard');
							}
							else {
								$this -> session -> set_flashdata('error','Incorrect Username/Password. Please try again');
								redirect('login');
							}

						}
				
				}
	
	
	
		$this->load->view('layout/index');
	}
	public function logout()
	{
		
		$this->session->unset_userdata('adminusername');
		redirect('login','refresh');
	}
}
