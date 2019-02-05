<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Travel_agent extends CI_Controller
{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Travel_agent_model');
		$this->load->database();
		$this->load->library('session');
	}
	
	
	function index()
	{
		$this->load->view('travel_agent/travel_agent_index');
	}
	
	
	function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		
		if($this->form_validation->run()==TRUE)
		{
            $data=array(
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'status'=>'1'
			);
			
			$login=$this->Travel_agent_model->login_check($data);
			
			if($login==1)
			{
				$newdata=array(
				'log_username'=>$data['email'],
				'log_usertype'=>'travel_agent',
				'logged_in'=>TRUE);
				
				$this->session->set_userdata($newdata);
				$data['session_variables']=$this->session->all_userdata($newdata);
				echo $login;
			}
		}
	}
	
	
	function exists_email($email)
	{
		$data['email']=$email;
		$exist = $this->Travel_agent_model->exists_email($data);
		echo $exist;
	}
	
	
	function forgot_pass($email)
	{
		 $rand_password = rand();	
		$new_password = $this-> Travel_agent_model -> new_password($email,md5($rand_password));
		
			$this->load->library('email');

			$mydata = array('password' => $rand_password);
			$message = $this->load->view('main/travel_forgot_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('support@bookingwings', 'Bookingwings');
			$this->email->to($email); 

			$this->email->subject('Forgot Password');
			$this->email->message($message);    

			$this->email->send();
			echo 1;
	}
	
	
	function profile()
	{
		$data['email']=$this->session->userdata['log_username'];
		$data['profile']=$this->Travel_agent_model->profile($data);
		$this->load->view('user/profile',$data);
	}
	
	function edit_profile()
	{
		$data['email']=$this->session->userdata['log_username'];
		$data['profile']=$this->Travel_agent_model->profile($data);
		$this->load->view('user/edit_profile',$data);
	}
	
	function update_profile()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
		
		if($this->form_validation->run()==TRUE)
		{
			$id=$this->input->post('user_id');
			
			$data=array(
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				//'email'=>$this->input->post('email'),
				'contact'=>$this->input->post('phone'),
				'fax'=>$this->input->post('fax')		
			);
			
			$update=$this->Travel_agent_model->update_profile($data,$id);
			
			if($update==1)
			{
				$this->session->set_flashdata('success','Your profile updated successfully');
				redirect('travel_agent/edit_profile');
			} else {
				redirect('travel_agent/edit_profile');
			}
		} else { $this->load->view('user/edit_profile',$data); }
	}

	function change_password()
	{
		$data['email']=$this->session->userdata['log_username'];
		$data['profile']=$this->Travel_agent_model->profile($data);
		$this->load->view('user/change_password',$data);
	}

	function current_password()
	{
		$data['email']=$this->session->userdata['log_username'];
		$data['password']=md5($this->input->post('password'));
		echo $pass=$this->Travel_agent_model->current_password($data);
	}
	
	function update_password()
	{
		$data['email']=$this->session->userdata['log_username'];
		$data['password']=md5($this->input->post('current_password'));
		
		$pass=$this->Travel_agent_model->current_password($data);

		if($pass==0)
		{
			$this->session->set_flashdata('current_password_error','Current password incorrect');
			redirect('travel_agent/change_password');
		} else 
		{
		$data['profile']=$this->Travel_agent_model->profile($data);
		$id=$data['profile']->id;
		
		$this->form_validation->set_rules('new_password', 'new_password', 'required|md5');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|md5|matches[new_password]');
		
			if ($this->form_validation->run() == FALSE)
			{				
				$data['validation']=validation_errors();
				$this->session->set_flashdata('error',$data['validation']);
				redirect('travel_agent/change_password');
			}
			else 
			{				
				$datas['password']=$this->input->post('new_password');
				$update =$this->Travel_agent_model->update_profile($datas,$id);
				$this->session->set_flashdata('success','Your password updated successfully');
				redirect('travel_agent/change_password');
			}
		}
	}
}