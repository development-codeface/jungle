<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelz extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->helper('text');
     	$this->load->helper('url');
		$this->load->database();
		$this->load->library('encrypt');
     	$this->load->library('googleplus');
		$this->load->library('session');
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);
		$this->load->model('Registermodel');
		$this->load->model('Hotelz_model');
		$this->load->model('Hotels_model');
	 }
	 
	 
	 function _remap($name) {
	 	if($name == 'resorts' || $name == 'home' || $name == 'apartments' || $name == 'hotels') {
			$this->index($name);
		}
		if($name== 'holiday')
		{
			$this->holiday($name);
		}
		else if($name == 'ayurveda' || $name == 'yoga') {
			$this->ayurveda($name);
		}
	 }
	 
	 
	public function index($parameter)
	{
		// fb login start
		// $userId = $this->facebook->getUser();
// 
		// $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
// 		
		// if($userId == 0){
			 // $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
		 // } else 
		 // {
			 // $user1 = $this->facebook->api('/me?fields=first_name,last_name,email');
// 			 
				 // if(!empty($user1['email'])) 
				 // {
				 	// $mail['email'] = $user1['email']; 
				 // }
				 // else {
					// $mail['email'] = ''; 
				 // }
// 			 
			 // if(!empty($mail['email']))
			 // {
				 // $login=$this->Registermodel->email_exist($mail); 				
				 // if($login==1)
				 // {
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					// 'logged_in' => TRUE
			          // );
				 // } 
				 // else 
				 // {
					 // $data_user = array(
					 // 'first_name' => $user1['first_name'],
					 // 'last_name' => $user1['last_name'], 
					 // 'status' => '1',
					 // 'email' => $user1['email']);
//  					
					 // $this->Registermodel->google_signup($data_user);
//  					
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
// 					  
				// $to = $user1['email'];
				// $subject = 'Welcome to BookingWings';
				// $message = 'Hi,<br/><br/>
				// Welcome to BookingWings!<br/><br/>
				// Save this e-mail for future reference. <br/><br/>
				// Thank you for using our service.';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				// mail($to, $subject, $message, $headers);
			     // }
//  			         
			     // $this->session->set_userdata($newdata);
				 // $data['session_variables']=$this->session->all_userdata($newdata);
				 // redirect('user');
			 // }
		 // }
 	
		 //fb login end
 		
		 //google login start
		 if (isset($_GET['code']))
		 {
 			
			 try
			 {
				 $this->googleplus->getAuthenticate();
				 $this->session->set_userdata('login',true);
				 $user_profile = $this->googleplus->getUserInfo();
				 if(!empty($user_profile['gender'])) 
				 {
				 	$gender=$user_profile['gender'];
				 }
				 else {
					 $gender='';
				 }
				 $mail['email'] = $user_profile['email']; 
 			
			 if(!empty($mail['email']))
			 {
				 $login=$this->Registermodel->email_exist($mail);
 				
				 if($login==1)
				 {
					 $newdata = array(
					 'log_username'  => $mail['email'],
					 'logged_in' => TRUE
			          );
				 } 
				 else 
				 {
					 $data_user = array(
				 'first_name' => $user_profile['given_name'], 
				 'last_name' => $user_profile['family_name'], 
				 'gender' => $gender, 
				 'status' => '1',
				 'email' => $user_profile['email'],
				 'photo' => $user_profile['picture']);
				 $this->Registermodel->google_signup($data_user);
 					
					 $newdata = array(
					 'log_username'  => $mail['email'],
					 'logged_in' => TRUE
			          );
					  
			$this->load->library('email');

			$mydata = array('email' => $user_profile['email'],'password' => '');
			$message = $this->load->view('main/register_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('info@bookingwings.com', 'Bookingwings');
			$this->email->to($user_profile['email']); 

			$this->email->subject('Registration Successful');
			$this->email->message($message);    

			$this->email->send();
			     }
 			         
			     $this->session->set_userdata($newdata);
				 $data['session_variables']=$this->session->all_userdata($newdata);
				 redirect($this->session->userdata('refer_url2'));
			 }
			 } catch (apiAuthException $e) {
				echo "<script>alert('ERROR :  A valid e-mail required for google login');</script>";
				//$this->session->unset_userdata($newdata);
				//redirect('hotels');
			}
 			
		 } 
		 $data['login_google'] = $this->googleplus->loginURL();
		 //google login end
		 
 		 $data['sub_cat'] = $parameter;
		 $cat = $this -> Hotelz_model -> get_id($parameter);
		 $data['cat_id'] = $cat->id;
		 $data['new']=$this->Hotelz_model->new_hotels($cat->id);
 		
		 $data['tbl_review']=$this->Hotelz_model->hotel_reviews($cat->id);
 		
		 $data['offer1']=$this->Hotelz_model->hot_deals(5,0, $cat->id);
		 $data['offer2']=$this->Hotelz_model->hot_deals(5,5, $cat->id);
		
		if($parameter=='resorts')
		{
			$this->load->view('hotelz/resort',$data);
		}
		if($parameter=='apartments')
		{
			$this->load->view('hotelz/apartment',$data);
		}
		if($parameter=='home')
		{
			$this->load->view('hotelz/homestay',$data);
		}
		if($parameter=='hotels')
		{
			$this->load->view('hotelz/index',$data);
		}
		
		
		// else
		// {
			// $this->load->view('hotelz/index',$data);
		// }
	}



	public function ayurveda($parameter)
	{
		// fb login start
		// $userId = $this->facebook->getUser();
// 
		// $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
// 		
		// if($userId == 0){
			 // $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
		 // } else 
		 // {
			 // $user1 = $this->facebook->api('/me?fields=first_name,last_name,email');
				 // if(!empty($user1['email'])) 
				 // {
				 	// $mail['email'] = $user1['email']; 
				 // }
				 // else {
					// $mail['email'] = ''; 
				 // }
			 // if(!empty($mail['email']))
			 // {
				 // $login=$this->Registermodel->email_exist($mail); 				
				 // if($login==1)
				 // {
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
				 // } 
				 // else 
				 // {
					 // $data_user = array(
					 // 'first_name' => $user1['first_name'],
					 // 'last_name' => $user1['last_name'], 
					 // 'status' => '1',
					 // 'email' => $user1['email']);
//  					
					 // $this->Registermodel->google_signup($data_user);
//  					
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
// 					  
				// $to = $user1['email'];
				// $subject = 'Welcome to BookingWings';
				// $message = 'Hi,<br/><br/>
				// Welcome to BookingWings!<br/><br/>
				// Save this e-mail for future reference. <br/><br/>
				// Thank you for using our service.';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				// mail($to, $subject, $message, $headers);
			     // }
//  			         
			     // $this->session->set_userdata($newdata);
				 // $data['session_variables']=$this->session->all_userdata($newdata);
				 // redirect('user');
			 // }
		 // }
//  	
		 // //fb login end
//  		
		 // //google login start
		 // if (isset($_GET['code']))
		 // {
//  			
			 // try
			 // {
				 // $this->googleplus->getAuthenticate();
				 // $this->session->set_userdata('login',true);
				 // $user_profile = $this->googleplus->getUserInfo();
				 // if(!empty($user_profile['gender'])) 
				 // {
				 	// $gender=$user_profile['gender'];
				 // }
				 // else {
					 // $gender='';
				 // }
//  				
				 // $mail['email'] = $user_profile['email']; 
//  			
			 // if(!empty($mail['email']))
			 // {
				 // $login=$this->Registermodel->email_exist($mail);
//  				
				 // if($login==1)
				 // {
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
				 // } 
				 // else 
				 // {
					 // $data_user = array(
				 // 'first_name' => $user_profile['given_name'], 
				 // 'last_name' => $user_profile['family_name'], 
				 // 'gender' => $gender, 
				 // 'status' => '1',
				 // 'email' => $user_profile['email']);
//  				
				 // $this->Registermodel->google_signup($data_user);
//  					
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
// 					  
				// $to = $user_profile['email'];
				// $subject = 'Welcome to BookingWings';
				// $message = 'Hi,<br/><br/>
				// Welcome to BookingWings!<br/><br/>
				// Save this e-mail for future reference. <br/><br/>
				// Thank you for using our service.';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				// mail($to, $subject, $message, $headers);
			     // }
//  			         
			     // $this->session->set_userdata($newdata);
				 // $data['session_variables']=$this->session->all_userdata($newdata);
				 // redirect('user');
			 // }
			 // } catch (apiAuthException $e) {
				// echo "<script>alert('Login error');</script>";
				// //$this->session->unset_userdata($newdata);
				// redirect('hotels');
			// }
//  			
		 // } 
		 // $data['login_google'] = $this->googleplus->loginURL();
		 //google login end
		 
 		$data['sub_cat'] = $parameter;
 		
 		$cat = $this->Hotelz_model->get_id($parameter);
		$data['cat_id'] = $cat->id;
 		$data['new']=$this->Hotelz_model->new_hotels_ayurveda($cat->id); 
 		
 		$data['tbl_review']=$this->Hotelz_model->reviews_ayurveda($cat->id);
 		
 		$data['offer1']=$this->Hotelz_model->ayurveda_hot_deals(5,0, $cat->id);
 		$data['offer2']=$this->Hotelz_model->ayurveda_hot_deals(5,5, $cat->id);
		
		if($parameter=='yoga')
		{
		$this->load->view('hotelz/yoga',$data);
		}
		if($parameter=='ayurveda')
		{
		$this->load->view('hotelz/ayurveda',$data);
		}
	}
	
public function holiday($parameter)
	{
		// fb login start
		// $userId = $this->facebook->getUser();
// 
		// $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
// 		
		// if($userId == 0){
			 // $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
		 // } else 
		 // {
			 // $user1 = $this->facebook->api('/me?fields=first_name,last_name,email');
				 // if(!empty($user1['email'])) 
				 // {
				 	// $mail['email'] = $user1['email']; 
				 // }
				 // else {
					// $mail['email'] = ''; 
				 // }
			 // if(!empty($mail['email']))
			 // {
				 // $login=$this->Registermodel->email_exist($mail); 				
				 // if($login==1)
				 // {
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					// 'logged_in' => TRUE
			          // );
				 // } 
				 // else 
				 // {
					 // $data_user = array(
					 // 'first_name' => $user1['first_name'],
					 // 'last_name' => $user1['last_name'], 
					 // 'status' => '1',
					 // 'email' => $user1['email']);
//  					
					 // $this->Registermodel->google_signup($data_user);
//  					
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
// 					  
				// $to = $user1['email'];
				// $subject = 'Welcome to BookingWings';
				// $message = 'Hi,<br/><br/>
				// Welcome to BookingWings!<br/><br/>
				// Save this e-mail for future reference. <br/><br/>
				// Thank you for using our service.';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				// mail($to, $subject, $message, $headers);
			     // }
//  			         
			     // $this->session->set_userdata($newdata);
				 // $data['session_variables']=$this->session->all_userdata($newdata);
				 // redirect('user');
			 // }
		 // }
//  	
		 // //fb login end
//  		
		 // //google login start
		 // if (isset($_GET['code']))
		 // {
//  			
			 // try
			 // {
				 // $this->googleplus->getAuthenticate();
				 // $this->session->set_userdata('login',true);
				 // $user_profile = $this->googleplus->getUserInfo();
				 // if(!empty($user_profile['gender'])) 
				 // {
				 	// $gender=$user_profile['gender'];
				 // }
				 // else {
					 // $gender='';
				 // }
//  				
				 // $mail['email'] = $user_profile['email']; 
//  			
			 // if(!empty($mail['email']))
			 // {
				 // $login=$this->Registermodel->email_exist($mail);
//  				
				 // if($login==1)
				 // {
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
				 // } 
				 // else 
				 // {
					 // $data_user = array(
				 // 'first_name' => $user_profile['given_name'], 
				 // 'last_name' => $user_profile['family_name'], 
				 // 'gender' => $gender, 
				 // 'status' => '1',
				 // 'email' => $user_profile['email']);
//  				
				 // $this->Registermodel->google_signup($data_user);
//  					
					 // $newdata = array(
					 // 'log_username'  => $mail['email'],
					 // 'logged_in' => TRUE
			          // );
// 					  
				// $to = $user_profile['email'];
				// $subject = 'Welcome to BookingWings';
				// $message = 'Hi,<br/><br/>
				// Welcome to BookingWings!<br/><br/>
				// Save this e-mail for future reference. <br/><br/>
				// Thank you for using our service.';
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// $headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				// mail($to, $subject, $message, $headers);
			     // }
//  			         
			     // $this->session->set_userdata($newdata);
				 // $data['session_variables']=$this->session->all_userdata($newdata);
				 // redirect('user');
			 // }
			 // } catch (apiAuthException $e) {
				// echo "<script>alert('Login error');</script>";
				// //$this->session->unset_userdata($newdata);
				// redirect('hotels');
			// }
//  			
		 // } 
		 // $data['login_google'] = $this->googleplus->loginURL();
		 //google login end
		 
 		$data['sub_cat'] = $parameter;
		
		$data['new'] = $this -> Hotelz_model -> new_packages();
 		
		$this->load->view('hotelz/holiday',$data);
	}

	
}

	
	