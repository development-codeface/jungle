<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->model('Loginmodel');
		$this->load->library('session');
		$this->load->library('user_agent');
	 }
	 
	public function index()
	{
		$this->load->view('user/profile');
	}
	
	public function login_check()
	{
		
		
		$input_data['email'] =  $this->input->post('email');
		$input_data['password'] =  md5($this->input->post('password'));
		
		 $login=$this->Loginmodel->login_check($input_data);
		 
					 if($login==1)
						{
							$newdata = array(
		                   'log_username'  => $input_data['email'],
		                   'log_usertype'  => 'user',
		                   'logged_in' => TRUE
		               		);
							
					   $this->session->set_userdata($newdata);
					   $data['session_variables']=$this->session->all_userdata($newdata);
						 		
								echo $login;	
												
						}
	}
	
	public function logout()
	{
		$refer = $this->agent->referrer();
		
		$this->session->sess_destroy();
		
		if (strpos($refer, 'reservation') !== false) {
		redirect($refer);
	} else {
		redirect('hotels');
	}
	}
	
	function group_booking()
	{
		//$email= $this->input->post('email');
		//$message = $this->input->post('message');
		
		//echo "asd";
				 //$this->load->view('main/group_mail');
				
				/* $to = 'info@amanhts.com';
				$subject = 'Welcome to Booking Chair';
				$message = 'Hi,<br/><br/>
				
				message for group booking<br/><br/>
				
				Email :'.$email.'<br/><br/>
				
				Message :'.$message.'<br/><br/>';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: Booking Chair <info@crantia.com>' . "\r\n";	
				$email_send = mail($to, $subject, $message, $headers);
				
				echo "success"; */
				
    $this->load->library('email');
    
     $mydata = array('email' => $this->input->post('email'),
    				'message' => $this->input->post('message'),
    				'name' => $this->input->post('name'),
					'check_in' => $this->input->post('check_in'),
					'check_out' => $this->input->post('check_out'),
					'num_room' => $this->input->post('no_room'),
					'sing_room' => $this->input->post('sing_room'),
					'doub_room' => $this->input->post('dob_room'),
					'extra_bed' => $this->input->post('ext_bed')
					);

   // $mydata = array('email' => $this->input->post('email'),'message' => $this->input->post('message'));
    $message = $this->load->view('main/group_email', $mydata, true);        

    $this->email->set_mailtype('html');
    $this->email->from('help@bookingwings.com', 'Bookingwings');
    $this->email->to('info@amanhts.com'); 
   
   // $this->email->to('anjusivadaspk@gmail.com'); 

    $this->email->subject('Group booking');
    $this->email->message($message);    

    $this->email->send();
    echo "succ";
	}
	
}
