<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		//load mPDF library
        $this->load->library('m_pdf');
		$this->load->model('Usermodel');
		
		if(!isset($this->session->userdata['log_username']))
		{
			redirect('hotels');
		}
	 }
	 
	public function index()
	{
		
	
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$this->load->view('user/profile',$data);
	}
	
	public function editprofile()
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$this->load->view('user/edit_profile',$data);
	}
	
	public function changepassword()
	{
		
		
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']=$this->Usermodel->User_detail($username);
		
		$this->load->view('user/change_password',$data);
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
         $config['encrypt_name']    = TRUE;
		//$config['max_width']		= '200';
		//$config['max_height']		= '200';
		
        $this->load->library('upload');
		
		$photo=$_FILES['img']['name'];
		
		if(!empty($photo)) {
			if(file_exists($config['upload_path'].$img -> photo)) {
			unlink($config['upload_path'].$img -> photo);
			}
			
			
			$this->upload->initialize($config);
			$this->upload->do_upload('img');
			$upload_img_data = $this->upload->data();
			$data['photo'] =$upload_img_data['file_name'];
			
			
			//$data['photo'] = $photo;
			//$this->upload->initialize($config);
			//$this->upload->do_upload('img');
		}
		
		
        $update =$this->Usermodel->update_profile($id,$data);
		
		if($update==1)
		{
		$this->session->set_flashdata('success','Your Profile Updated Successfully');
		redirect('user/editprofile');
		}
		else
		{
			redirect('user/editprofile');
		}
		

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
				redirect('user/changepassword');
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
				redirect('user/changepassword');
			}
			else 
			{				
				$data['password']=$this->input->post('new_password');
				$update =$this->Usermodel->change_password($id,$data);
				$this->session->set_flashdata('success','Your Password changed Successfully');
				redirect('user/changepassword');
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
	
	
	function review($id='')
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']	= $this->Usermodel->User_detail($username);
		$data['reviews']= $this->Usermodel->myReviews($data['user'][0]->id);
		$data['hotel']	= $this->Usermodel->booked_hotels($data['user'][0]->id);
		
		
		if(empty($id)) {
			$this->load->view('user/review',$data);
		}
		else {
			$data['review'] = $this -> db -> where('id', $id) -> get('tbl_review') -> row();
			$this->load->view('user/review',$data);
		}
	}
	
	function addReview()
	{
		
		$this -> form_validation -> set_rules('user_id', 'User', 'trim|required');
		$this -> form_validation -> set_rules('hotel_id', 'Hotel', 'trim|required');
		$this -> form_validation -> set_rules('userreview', 'Review', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) {
				redirect('user/review');
		} else {

		$review['user_id'] = $this -> input -> post('user_id');
		$review['hotel_id'] = $this -> input -> post('hotel_id');
		$review['title'] = $this -> input -> post('reviewtitle');
		$review['review'] = $this -> input -> post('userreview');
		$review['date'] = date('Y-m-d');
		
		$this->db->insert('tbl_review', $review); 
		}
 	}
	
	function editReview()
	{
		$this -> form_validation -> set_rules('review_id', 'Review Id', 'trim|required');
		$this -> form_validation -> set_rules('user_id', 'User', 'trim|required');
		$this -> form_validation -> set_rules('hotel_id', 'Hotel', 'trim|required');
		$this -> form_validation -> set_rules('userreview', 'Review', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) {
			echo 'error';
		} else {

		$id					= $this -> input -> post('review_id');
		$review['user_id']	= $this -> input -> post('user_id');
		$review['hotel_id']	= $this -> input -> post('hotel_id');
		$review['title']	= $this -> input -> post('reviewtitle');
		$review['review']	= $this -> input -> post('userreview');
		$review['date']		= date('Y-m-d');
		
		$this->db->where('id', $id)->update('tbl_review', $review); 
		}
 	}	
	
	function booking($id='')
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']	= $this->Usermodel->User_detail($username);
		
		if(empty($id)) {
		$data['bookings']= $this->Usermodel->bookingDetails($data['user'][0]->id);
			
		$this->load->view('user/booking',$data);
		} 
		else {
			
		$data['bookings']= $this->Usermodel->bookingNumber($id);
		if($data['bookings']->category=='hotel')
		{
			$data['rooms']= $this->Usermodel->bookingRooms($id);
		}
		else
		{
			$data['rooms']= $this->Usermodel->bookingRooms_pack($id);
		}
		
		
		$this->load->view('user/booking_detail', $data);
		}
	}
	
	function viewPDF($booking)
	{
		$user_session=$this->session->all_userdata();
		$username = $user_session['log_username'];
				
		$data['user']	= $this->Usermodel->User_detail($username);
		$data['bookings']= $this->Usermodel->bookingNumber($booking);
		
		//load the view and saved it into $html variable
		$html=$this->load->view('user/bookingPDF',$data, true);
		
		//generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
        
        //view it.
        $this->m_pdf->pdf->Output();
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
	
	
function cancel_booking(){
		
		$this->load->library('email');
		
		$mydata = array(
				'message' => $this->input->post('message'),
				'book_no' => $this->input->post('bookno')
		);
	$data['number'] = $this->input->post('bookno');
	$this->db->set('cancel',1);
	$this->db->where('booking_number',$data['number']);
	$this->db->update('tbl_booking');
	
	$check = $this -> Usermodel -> bookingNumber($mydata['book_no']);
	
	if($check -> reservation == 1) {
		$to_mail = $check -> mail;
	} else {
		$to_mail = 'info@amanhts.com';
	}
	
	$message = $this->load->view('main/cancel_booking', $mydata, true);        
    $this->email->set_mailtype('html');
    $this->email->from('booking@bookingwings.com', 'Bookingwings');
	$this->email->to($to_mail); 
    $this->email->subject('Cancel Booking');
    $this->email->message($message);    

    $this->email->send();
    echo "succ";
	
	}
	
	
	function amend_booking(){
		
		$this->load->library('email');
		
		$mydata = array(
				'message' => $this->input->post('amend_message'),
				'book_no' => $this->input->post('bookamend_no')
		);
	$data['number'] = $this->input->post('bookamend_no');
	
	$this -> db
	-> set('amend',1)
	-> where('booking_number',$data['number'])
	-> update('tbl_booking');
	
	$check = $this -> Usermodel -> bookingNumber($mydata['book_no']);
	
	if($check -> reservation == 1) {
		$to_mail = $check -> mail;
	} else {
		$to_mail = 'info@amanhts.com';
	}

	$message = $this->load->view('main/amend_booking', $mydata, true);        

    $this->email->set_mailtype('html');
    $this->email->from('booking@bookingwings.com', 'Bookingwings');
   $this->email->to($to_mail); 
  
    $this->email->subject('Booking Amendment : '.$data['number']);
    $this->email->message($message);    

    $this->email->send();
    echo "succ";
	
	}
	
	
}