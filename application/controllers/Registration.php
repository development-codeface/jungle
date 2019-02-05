<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> helper('url');
		$this -> load -> library('form_validation');
		$this -> load -> model('Registermodel');
		$this -> load -> library('session');
	}




	public function index() {
		$this -> load -> view('main/index');
	}




	public function register() {
		$this -> form_validation -> set_rules('register_email', 'Your Email', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('register_password', 'Password', 'trim|required|min_length[5]');
		$this -> form_validation -> set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[register_password]');

		if ($this -> form_validation -> run() == FALSE) {
			echo 'error';
		} else {

			$input_data['email'] = $this -> input -> post('register_email');
			$input_data['password'] = md5($this -> input -> post('register_password'));
			$input_data['status'] = 1;

			$login = $this -> Registermodel -> insert_entry($input_data);

			if ($login == 1) {
				
				
				
				
				$this->load->library('email');

			$mydata = array('email' => $input_data['email'],'password' => $this -> input -> post('register_password'));
			$message = $this->load->view('main/register_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('info@bookingwings.com', 'Bookingwings');
			$this->email->to($input_data['email']); 

			$this->email->subject('Registration Successful');
			$this->email->message($message);    

			$this->email->send();
			
			

				$newdata = array(
		                   'log_username'  => $input_data['email'],
		                   'log_usertype'  => 'user',
		                   'logged_in' => TRUE
		               		);

				$this -> session -> set_userdata($newdata);
				$data['session_variables'] = $this -> session -> all_userdata($newdata);

				echo "success";

			}
		}
	}




	function exists_usernames($key) {
		$result = $this -> Registermodel -> username_exists($key);

		if ($result > 0) {
			echo "Email already exists!";

		}
	}




	function forgot_pass($email) {
		
				 $rand_password = rand();	
		
				$new_password = $this-> Registermodel -> new_password($email,md5($rand_password));
				//$to = $email;
				//$subject = 'Welcome to Booking Chair';
				//$message = 'Hi,<br/><br/>
				//Your password changed successfully. <br/><br/><br/>
				
				//New Password :'.$rand_password.'<br/><br/>
				//Thank you for using our service.';
				//$headers  = 'MIME-Version: 1.0' . "\r\n";
				//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				//$headers .= 'From: Booking Chair <info@crantia.com>' . "\r\n";	
				//$email_send = mail($to, $subject, $message, $headers);
				
				//echo "success";
				
				
				
				
				$this->load->library('email');

			$mydata = array('password' => $rand_password);
			$message = $this->load->view('main/forgot_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('support@bookingwings.com', 'Bookingwings');
			$this->email->to($email); 

			$this->email->subject('Forgot Password');
			$this->email->message($message);    

			$this->email->send();
   
				echo "success"; 
				
				
	}




	function newsletter($email) {
		$data['email'] = $email;

		$check = $this -> Registermodel -> newsmail($data);
		
		if($check != 1)
		{
			$this->load->library('email');
			
			$mydata = array('msg' => 'hi');
			$message = $this->load->view('main/subscribe_email', $mydata, true); 
			
			$this->email
			->set_mailtype('html')
			->from('info@bookingwings.com', 'BookingWings')
			->to($email)
			->subject('BookingWings Newsletter Subscription');
			
				//$message = 'Hi,<br/><br/>
				//Welcome to BookingWings!<br/><br/>
				//Thank you for subscribing to our newsletter. <br/><br/>
				//Save this e-mail for future reference';	
			
			$this->email
			->message($message)
			->send();
		}
		echo $check;
	}
	
	
	

}