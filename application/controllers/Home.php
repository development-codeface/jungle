<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->helper('text');
     	$this->load->helper('url');
		$this->load->database();
     	$this->load->library('googleplus');
		$this->load->library('session');
		$this->load->library('user_agent');
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);
		$this->load->model('Registermodel');
		$this->load->model('Home_model');
		date_default_timezone_set("Asia/Calcutta");
	 }
	 
	 
	public function index()
	{
		//fb login start
		// $userId = $this->facebook->getUser();
// 		
		// $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
// 		
		// if($userId == 0){
			// $data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
		// } else 
		// {
			// $user1 = $this->facebook->api('/me?fields=first_name,last_name,email');
			// $mail['email'] = $user1['email']; 
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
				// //redirect('user');
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
				// $this->session->unset_userdata($newdata);
				// redirect('hotels');
			// }
// 			
		// } 
		// $data['login_google'] = $this->googleplus->loginURL();
		//google login end
		
		$this->load->model('Hotels_model');
		$data['new']=$this->Home_model->new_hotels();
		
		$data['tbl_review']=$this->Home_model->reviews();
		
		$data['offer1']=$this->Home_model->hot_deals(5,0);
		$data['offer2']=$this->Home_model->hot_deals(5,5);
		
		$this->load->view('main/index',$data);
	}
	
	
	public function rooms($value,$mode,$prev_room)
	{
		if($mode=='new')
		{
		for ($i=2; $i <= $value; $i++)
		 { 
							
		?>
								<input type="hidden"  id="prev-childs-<?php echo $i; ?>" value="0" autocomplete="off" />
									<div class="demo_div col-md-2 col-sm-3 col-xs-8" id="room-<?php echo $i; ?>">
											<div class="container-fluid no_padding_l no_padding_r" id="age-<?php echo $i; ?>">
												<!--<div class="col-md-6 col-xs-6 col-sm-6">
													<p>Adults</p>
												</div>-->
												<div class="col-md-12 col-xs-12 col-sm-12 clone_me">
													<label>Rooms <?php echo $i; ?></label>
													<select class="form_search" autocomplete="off" name="adults[]" id="adults-<?php echo $i; ?>">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
												</div>
												<!--<div class="col-md-2 clone_me">
													<label>Children(0-13yrs)</label>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i; ?>" onchange="childs(<?php echo $i; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div>-->
												
											</div>
											
										</div>
										
			<?php
			}
		}

			else
			{

			for ($i=$prev_room; $i < $value; $i++)
			{
			?>
									<input type="hidden"  id="prev-childs-<?php echo $i + 1; ?>" value="0" autocomplete="off" />
									<div class="demo_div col-md-2 col-sm-3 col-xs-8" id="room-<?php echo $i + 1; ?>">
											<div class="container-fluid no_padding_l no_padding_r" id="age-<?php echo $i + 1; ?>">
												<!--<div class="col-md-6 col-xs-6 col-sm-6">
													<p>Adults</p>
												</div>-->
												<div class="col-md-12 col-xs-12 col-sm-12 clone_me">
													<label>Room <?php echo $i + 1; ?></label>
													<select class="form_search" autocomplete="off" name="adults[]" id="adults-<?php echo $i; ?>">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
												</div>
												<!--<div class="col-md-2 clone_me">
													<label>Children(0-13yrs)</label>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i + 1; ?>" onchange="childs(<?php echo $i + 1; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div>-->
											</div>
										</div>
										
				<?php
				}

				}

	}

				public function age($value,$mode,$count,$prev_child)
				{
				if($mode=='new')
				{

				for ($i=1; $i <= $value; $i++)
				{
					?>
								
							<div class="col-md-1 clone_me padding_h_5" id="child-<?php echo $count . $i; ?>">
													<label>Child <?php echo $i; ?></label>
													<select class="form_search" autocomplete="off" name="child_age[]" >
														<option>Age</option>
														<option>0</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>11</option>
														<option>12</option>
														<option>13</option>
													</select>
												</div>
											
										
				<?php
				}
				}
				else {
				for ($i=$prev_child; $i < $value; $i++)
				{
					?>
				
							<div class="col-md-1 clone_me padding_h_5" id="child-<?php echo $count . $i + 1; ?>">
													<label>Child <?php echo $i + 1; ?></label>
													<select class="form_search" autocomplete="off" name="child_age[]"  >
														<option>Age</option>
														<option>0</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>11</option>
														<option>12</option>
														<option>13</option>
													</select>
												</div>
	
				<?php
				}
				}
				}

				public function login_fb()
				{
					if ($this->input->is_ajax_request()) {
					$url=$this -> input -> post('current'); 
					$refer=$this->session->set_userdata('refer_url', $url);
					}
				//fb login start
				$userId = $this->facebook->getUser();

				$login_fb = $this->facebook->getLoginUrl(array('scope'=>'email'));

				if($userId == 0){
				$data['login_fb'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
					echo $login_fb;
				} else
				{
				$user1 = $this->facebook->api('/me?fields=first_name,last_name,email,gender,picture');
				 if(!empty($user1['email'])) 
				 {
				 	$mail['email'] = $user1['email']; 
				 }
				 else {
					$mail['email'] = ''; 
				 }
				 
				 if(!empty($user1['gender'])) 
				 {
				 	$gender = $user1['gender']; 
				 }
				 else {
					$gender = ''; 
				 }
				 
				 try {
				if(!empty($mail['email']))
				{
				$login=$this->Registermodel->email_exist($mail);

				if($login==1)
				{
				$newdata = array(
				'log_username'  => $mail['email'],
				'log_usertype'  => 'user',
				'logged_in' => TRUE
				);
				}
				else
				{
				$data_user = array(
				'first_name' => $user1['first_name'],
				'last_name' => $user1['last_name'],
				'status' => '1',
				'gender' => $gender,
				'photo' => $user1['picture']['data']['url'],
				'email' => $user1['email']);

				$this->Registermodel->google_signup($data_user);

				$newdata = array(
				'log_username'  => $mail['email'],
				'log_usertype'  => 'user',
				'logged_in' => TRUE
				);
				
				/* $to = $user1['email'];
				$subject = 'Welcome to BookingWings';
				$message = 'Hi,<br/><br/>
				Welcome to BookingWings!<br/><br/>
				Save this e-mail for future reference. <br/><br/>
				Thank you for using our service.';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				mail($to, $subject, $message, $headers); */
				
				
				$this->load->library('email');

			$mydata = array('email' => $mail['email'],'password' => '');
			$message = $this->load->view('main/register_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('info@bookingwings.com', 'Bookingwings');
			$this->email->to($mail['email']); 

			$this->email->subject('Registration Successful');
			$this->email->message($message);    

			$this->email->send();
			
				}

				$this->session->set_userdata($newdata);
				$data['session_variables']=$this->session->all_userdata($newdata);
				$refer=$this->session->userdata('refer_url'); 
				
				redirect($refer);

				}
				}
				 catch(apiAuthException $e) {
				echo "<script>alert('ERROR :  A valid e-mail required for facebook login');</script>";
				//$this->session->unset_userdata($newdata);
				redirect('hotels');
			}
				}

				// //fb login end

				 
				}

				public function login_google()
				{
					if ($this->input->is_ajax_request()) {
					$url2=$this -> input -> post('current2'); 
					$this->session->set_userdata('refer_url2', $url2);
					}
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
					 'log_usertype'  => 'user',
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
					 'log_usertype'  => 'user',
					 'logged_in' => TRUE
			          );
					  
				/* $to = $user_profile['email'];
				$subject = 'Welcome to BookingWings';
				$message = 'Hi,<br/><br/>
				Welcome to BookingWings!<br/><br/>
				Save this e-mail for future reference. <br/><br/>
				Thank you for using our service.';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: BookingWings <info@crantia.com>' . "\r\n";	
				mail($to, $subject, $message, $headers); */
				
				
				
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
				echo "<script>alert('Login error');</script>";
				//$this->session->unset_userdata($newdata);
				//redirect('hotels');
			}
 			
		 } 

				$login_google= $this->googleplus->loginURL();
				echo $login_google;
				}

				}
			