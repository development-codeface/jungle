<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {

		$this -> load -> view('layout/index');
	}

	public function login_form() 
	{
		if (isset($this -> session -> userdata['hotel_adminusername'])) {
			redirect('dashboard');
		} else {
			
			$this -> form_validation -> set_rules('username', 'Username', 'required');
			$this -> form_validation -> set_rules('user_type', 'User Type', 'required');
			$this -> form_validation -> set_rules('password', 'Password', 'required|md5');

			
			if ($this -> form_validation -> run() == FALSE) 
			{
					$data['validation'] = validation_errors();
					$this -> load -> view('index', $data);
			} 
			else 
			{ 
			
				$data['group'] = $this -> input -> post('login_type'); 
				$data['username'] = $this -> input -> post('username');  
				$data['password'] = $this -> input -> post('password');
				$data['hotel_number'] = $this -> input -> post('hotel_number');
				$user_type = $this -> input -> post('user_type'); 

				if($data['group']=='hotel')
				{ 	
					if($user_type=='manager')
					{
					$this -> db -> select('*');
					$this -> db -> where('password', $data['password']);
					$this -> db -> where('username', $data['username']);
					$this -> db -> where('hotel_number', $data['hotel_number']);
					$this -> db -> where('status', '1');
					$query_res = $this -> db -> get('tbl_hotel_manager');
					$result = $query_res -> result();
					$admindata = array('hotel_adminusername' => $data['username'], 'user_type' =>'manager' , 'hotel_num'=>$data['hotel_number'], 'category' => '');
					}
					else
					{
					$this -> db -> select('*');
					$this -> db -> where('password', $data['password']);
					$this -> db -> where('username', $data['username']);
					$this -> db -> where('hotel_number', $data['hotel_number']);
					$this -> db -> where('status', '1');
					$query_res = $this -> db -> get('tbl_hotel_staff');
					 $result = $query_res -> result();
					$admindata = array('hotel_adminusername' => $data['username'], 'user_type' =>'staff' , 'hotel_num'=>$data['hotel_number'], 'category' => '');
					}
				}
				else
				{
					
						$this -> db -> select('*');
						$this -> db -> where('password', $data['password']);
						$this -> db -> where('username', $data['username']);
						$this -> db -> where('status', '1');
						$query_res = $this -> db -> get('tbl_hotel_groups');
						$result = $query_res -> result();
						
						$admindata = array('group_adminuser'=> $data['username'] );
					
				}
				
				
					
					
				 	
				 if (!empty($result)) {
					
					if($data['group']=='hotel')
					{
						$check = $this -> db
						-> where('hotel_id', $result[0] -> hotel_id)
						-> where('DATE(date)', date('Y-m-d'))
						-> get('tbl_hotelmanager_log')
						-> row();
						
						if(count($check) == 0) {
						$data2['hotel_id'] = $result[0] -> hotel_id;
						$data2['login_status'] = 1;
						$data2['room_set_status'] = 0;
						$data2['booking_status'] = 0;
						$data2['date'] = date("Y-m-d H:i:s");
						
						$this -> db -> insert('tbl_hotelmanager_log',$data2);
						} else {
						$data2['login_status'] = $check -> login_status + 1;
						$data2['date'] = date("Y-m-d H:i:s");
						
						$this -> db
						-> where('hotel_id', $result[0] -> hotel_id)
						-> where('date', $check -> date)
						-> update('tbl_hotelmanager_log',$data2);
						}
							
							$this -> session -> set_userdata($admindata);
							$data['hotel_admin_session'] = $this -> session -> all_userdata();
							redirect('dashboard');
						} 
						else
						{
								$this -> session -> set_userdata($admindata);
							$data['hotel_admin_session'] = $this -> session -> all_userdata();
							redirect('group/list_group');
						}	
						
				}
				else {
					redirect('login');
				} 

			} 

		}
	
		$this -> load -> view('layout/index');
	}
	
	
	public function group_login($id)
	{
				$this -> db -> select('*');
				$this -> db -> where('hotel_id', $id);
				$this -> db -> where('status', '1');
				$query_res = $this -> db -> get('tbl_hotel_manager');
				$result = $query_res -> result();
						
						if (!empty($result)) {
				$admindata = array('group_adminuser'=> $this->session->userdata['group_adminuser'] , 'hotel_adminusername' => $result[0]->username, 'user_type' =>'manager' , 'hotel_num'=>$result[0]->hotel_number, 'category' => '');
				
				$this -> session -> set_userdata($admindata);
							$data['hotel_admin_session'] = $this -> session -> all_userdata();
							redirect('dashboard');
						}
						else
						{
							redirect('group/list_group');
						}
		
	}

	public function admin_login($id, $category) {

		$this -> db -> select('*');
		$this -> db -> where('hotel_id', $id);
		$this -> db -> where('status', '1');
		$query_res = $this -> db -> get('tbl_hotel_manager');
		$result = $query_res -> result();
		if (!empty($result)) {
			$admindata = array('hotel_adminusername' => $result[0] -> username, 'user_type' =>'manager' ,'hotel_num'=>$result[0] -> hotel_number, 'category' => $category);

			$this -> session -> set_userdata($admindata);
			$data['hotel_admin_session'] = $this -> session -> all_userdata();

			redirect('dashboard');
		} else {
			redirect('login');
		}

	}

	public function logout() {

		$this -> session -> unset_userdata('group_adminuser');
		$this -> session -> unset_userdata('hotel_adminusername');
		$this -> session -> unset_userdata('category');
		redirect('login', 'refresh');

	}

	function forgot_pass() {

		if (isset($_POST['submit'])) {
			$data['email'] = $this -> input -> post('email');

			$query = $this -> db -> where('mail', $data['email']) -> get('tbl_hotel') -> num_rows();

			if ($query > 0) {
				$hotel = $this -> db -> where('mail', $data['email']) -> get('tbl_hotel') -> row();
				
				$rand = rand();
				$data1['password'] = md5($rand);

				$this -> db -> where('hotel_id', $hotel -> id) -> update('tbl_hotel_manager', $data1);
				
				
				
				$this->load->library('email');

				$mydata = array('password' => $rand);
				$message = $this->load->view('layout/forgot_email', $mydata, true);        

				$this->email->set_mailtype('html');
				$this->email->from('support@bookingwings.com', 'Bookingwings');
				$this->email->to($data['email']); 

				$this->email->subject('Forgot Password');
				$this->email->message($message);    

				$this->email->send();
			
				$this -> session -> set_flashdata('success', 'Password reset successful, email sent to '.$data['email']);
				redirect('login/');
			} else {
				$this -> session -> set_flashdata('error', 'Error : E-mail not found');
				redirect('login/');
			}
		}

	}

}
