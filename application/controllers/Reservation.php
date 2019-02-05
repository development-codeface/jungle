<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->helper('text');
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Usermodel');
		$this->load->library('form_validation');
		$this->load->model('Reservation_model');
		$this->load->library('user_agent');
		$this->load->model('Reservation_checkout_model');
		
		
	 }
	public function _remap($name,$id) 
	{ 
		if(isset($this->session->userdata['log_username']))
		{
			if($name == 'user')
				$this->user();
			else if($name == 'editprofile')
				$this->editprofile();
			else if($name == 'update_profile')
				$this->update_profile();
			else if($name == 'changepassword')
				$this->changepassword();
			else if($name == 'password_change')
				$this->password_change();
			else if($name == 'booking' && !empty($id[0]))
				$this->booking($id[0]);
			else if($name == 'booking')
				$this->booking();
			else if($name == 'review' && !empty($id[0]))
				$this->review($id[0]);
			else if($name == 'review')
				$this->review();
			else if($name == 'invoice' && !empty($id[0]))
				$this->invoice($id[0]);
			else
				$this->index();
		} else {
				$this->index();
		}
		
	}
	
	function invoice($id)
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']	= $this->Usermodel->User_detail($username);
		
		$data['bookings']= $this->Usermodel->bookingNumber($id);
		if($data['bookings']->category=='hotel')
		{
		
		$data['rooms']= $this->Usermodel->bookingRooms($id);
		}
		else
		{
			$data['rooms']= $this->Usermodel->bookingRooms_pack($id);
		}
		
		
		$this->load->view('user/invoice',$data);
	}
	
	function review($rid='')
	{
			$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
	
	$data['details']=$this->Reservation_model->detailsById($id);
		$data['reviews']= $this->Usermodel->myReviews($data['user'][0]->id);
		$data['hotel']	= $this->Usermodel->booked_hotels_res($data['user'][0]->id, $id);
		
		
		if(empty($rid)) {
			$this->load->view('reservation/review',$data);
		}
		else {
			$data['review'] = $this -> db -> where('id', $rid) -> get('tbl_review') -> row();
			$this->load->view('reservation/review',$data);
		}
	}
	
	function booking($b_id='')
	{
			$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
	
	$data['details']=$this->Reservation_model->detailsById($id);
		
		if(empty($b_id)) {
		$data['bookings']= $this->Usermodel->bookingDetailsReservation($data['user'][0]->id);
			
		$this->load->view('reservation/booking',$data);
		} 
		else {
			
		$data['bookings']= $this->Usermodel->bookingNumber($b_id);
		if($data['bookings']->category=='hotel')
		{
			$data['rooms']= $this->Usermodel->bookingRooms($b_id);
		}
		else
		{
			$data['rooms']= $this->Usermodel->bookingRooms_pack($b_id);
		}
		
		
		$this->load->view('reservation/booking_detail', $data);
		}
	}
	
	public function changepassword()
	{
		
			$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
	
	$data['details']=$this->Reservation_model->detailsById($id);

	$this->load->view('reservation/change_password', $data);
	}
	
	public function password_change()
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
		
		$datas['user']=$this->Usermodel->User_detail($username);
		
	   	$check['email'] = $username;
		$check['password']=md5($this->input->post('current_password'));
		
		 $check_password=$this->Usermodel->check_password($check);
		
		
		if($check_password==0)
		{
				$this->session->set_flashdata('current_password_error','Current password incorrect');
				redirect($this->agent->referrer());
		}
		else
		{
		
		$id=$datas['user'][0]->id;
		
		$this->form_validation->set_rules('new_password', 'new_password', 'required|md5');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|md5|matches[new_password]');
			
			if ($this->form_validation->run() == FALSE)
			{				
				$data['validation']=validation_errors();
				$this->session->set_flashdata('error',$data['validation']);
				redirect($this->agent->referrer());
			}
			else 
			{				
				$data['password']=$this->input->post('new_password');
				$update =$this->Usermodel->change_password($id,$data);
				$this->session->set_flashdata('success','Your Password changed Successfully');
				redirect($this->agent->referrer());
			}
		}
	
		
	}
	
	
	public function current_password()
	{
		
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
			
		$input_data['email']=$username;
		$input_data['password'] =  md5($this->input->post('password'));
		 
		echo $check_password=$this->Usermodel->check_password($input_data);
	}
	
	public function update_profile()
	{
		
		$user_session=$this->session->all_userdata();
		 $username = $user_session['log_username'];
				
		  $id=$this->input->post('user_id');
		  
		  $img = $this -> db
		  -> select('photo')
		  -> where('id', $id)
		  -> get('tbl_user')
		  -> row();
		
		$data['first_name']=$this->input->post('first_name');
		$data['last_name']=$this->input->post('last_name');
		$data['address']=$this->input->post('address'); 
		$data['country']=$this->input->post('country');
		$data['state']=$this->input->post('state');
		$data['city']=$this->input->post('city');
		$data['pincode']=$this->input->post('pincode');
		$data['phone']=$this->input->post('phone');
		$data['email']=$this->input->post('email');
		$data['gender']=$this->input->post('gender');
		
		$config['upload_path']		= 'user/';
        $config['allowed_types']	= 'gif|jpg|jpeg|png';
		//$config['max_width']		= '200';
		//$config['max_height']		= '200';
		
        $this->load->library('upload');
		
		$photo=$_FILES['img']['name'];
		
		if(!empty($photo)) {
			if(file_exists($config['upload_path'].$img -> photo)) {
			unlink($config['upload_path'].$img -> photo);
			}
			$data['photo'] = $photo;
			$this->upload->initialize($config);
			$this->upload->do_upload('img');
		}
		
		
        $update =$this->Usermodel->update_profile($id,$data);
		
		if($update==1)
		{
		$this->session->set_flashdata('success','Your Profile Updated Successfully');
		redirect($this->agent->referrer());
		}
		else
		{
			redirect($this->agent->referrer());
		}
		

	}
	
	public function editprofile()
	{
			$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
	
	$data['details']=$this->Reservation_model->detailsById($id);

	$this->load->view('reservation/edit_profile', $data);
	}
	
	public function user()
	{
			$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
	
	$data['details']=$this->Reservation_model->detailsById($id);

	$this->load->view('reservation/profile', $data);
	}
	
	public function index()
	{
		$data['id'] =  $this->input->get('hotel');
		
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']);
		$id=$this->encrypt->decode($dec_hotel);
		
		$data['check_in']= $this->input->get('check_in');
		$data['check_out']= $this->input->get('check_out');
		$data['source'] = $this->input->get('source');
		if(!empty($data['check_in']) && !empty($data['check_out']))
		{
		$data['check_in']= $this->input->get('check_in');
		$data['check_out']= $this->input->get('check_out');
		}
		else
		{
			$data['check_in']= date('d-m-Y');
		    $data['check_out']= date('d-m-Y', strtotime(' +1 day'));
		}
		
		$_SESSION['datahere']['check_in']=$data['check_in'];
		$_SESSION['datahere']['check_out']=$data['check_out'];
		$data['no_result']='';
		$data['id'] =$id;
		
		
		
		
		$data['mem_type']	=	$this->input->get('mem_type');
		$data['adults']	=	$this->input->get('adults');
		$data['childrens']	=	$this->input->get('childrens');
		$data['package'] = $this->Reservation_model->package_list($id);
		
		if($data['source']=='package')
		{ 
			$data['mgr']=$this->Reservation_model->mgrById($id);
			$data['details']=$this->Reservation_model->detailsById($id);
			$data['package_id']=$this->input->get('package');
			$data['pack_id']=$this->input->get('package');
			
			$data['pack_details']=$this->Reservation_model->ayurveda_detailsById($data['package_id']);
			
		
					if(!empty($data['package_id']))
						{
							$room_detail	= $this->Reservation_model->ayurveda_rooms($data['package_id']);
							
							//print_r($room_detail); exit;
							if(!empty($room_detail))
							{
								$room_count='';
								foreach ($room_detail as $room) 
								{ 
									$room_setting_detail	= $this->Reservation_model->ayur_settingsByRoom($room->roomid, $data['package_id']);
									//print_r($room_setting_detail);
									if(!empty($room_setting_detail))
									{ 
										$room_count+= $this->Reservation_model->rooms_count($id,$room->roomid); 
									}
									
								}
							$this->load->view('reservation/package_index',$data);
								/* if($room_count>=$data['mem_type'])
								{
										$this->load->view('reservation/package_index',$data);
								}
								else
								{  if($room_count=='')
									{
										$data['no_result'] = "Sorry! we have no rooms available in your search date";
										$this->load->view('reservation/package_index',$data);	
									}
									else
									{
									$data['no_result'] = "We have only " .$room_count. " room(s) available in your search date";
									$this->load->view('reservation/package_index',$data);
									}
								} */
							}
							else
							{
								$data['no_result'] = "Sorry! no rooms available for this package";
								$this->load->view('reservation/package_index',$data);	
							}
						}
						
						else
						{
								$this->load->view('reservation/package_index',$data);
						}
		}
		else
		{
		$data['mgr']=$this->Reservation_model->mgrById($id);
			$data['details']=$this->Reservation_model->detailsById($id);
		
						if(!empty($data['mem_type']))
						{
							$room_detail	= $this->Reservation_model->roomsByHotel($id);
							if(!empty($room_detail))
							{
								$room_count='';
								foreach ($room_detail as $room) 
								{ 
									$room_setting_detail	= $this->Reservation_model->settingsByRoom($room->id);
									//print_r($room_setting_detail);
									if(!empty($room_setting_detail))
									{ 
										$room_count+= $this->Reservation_model->rooms_count($id,$room->id); 
									}
								}
								if($room_count>=$data['mem_type'])
								{
										$this->load->view('reservation/index',$data);
								}
								else
								{  if($room_count=='')
									{
										$data['no_result'] = "Sorry! we have no rooms available in your search date";
										$this->load->view('reservation/index',$data);
									}
									else
									{
									$data['no_result'] = "We have only " .$room_count. " Room(s) available in your search date";
											$this->load->view('reservation/index',$data);
									}
								}
							}
							else
							{
									$data['no_result'] = "Sorry!, no rooms available";
									$this->load->view('reservation/index',$data);
									
							}
						}
						
						else
						{
								$this->load->view('reservation/index',$data);
							
						}
		}
	}
	
	
	
	
	
	
	
}
