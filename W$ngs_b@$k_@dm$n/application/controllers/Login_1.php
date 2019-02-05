<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
						
						if ($this->form_validation->run() == FALSE)
						{
							$data['validation']=validation_errors();
							$this->load->view('index',$data);
						}
						else 
						{
							 $data['username']=$this->input->post('username');
							 $data['password']=$this->input->post('password');
							
							$this->db->select('*');
							$this->db->where('password',$data['password']);
							$this->db->where('username',$data['username']);
							$query_res=$this->db->get('tbl_site_manager');
							$result=$query_res->result();
								
							if(!empty($result))
							{
								$admindata = array(
			                   'adminusername'  => $data['username']
			                  
				              	);
							   $this->session->set_userdata($admindata);
							   $data['admin_session']=$this->session->all_userdata();
							   redirect('dashboard');
							}
							else {
								
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
