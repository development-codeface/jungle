<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Settingsmodel');		
		$this->load->model('Bookingmodel');
		$this->load->model('Profilemodel');
		$this->load->model('Roomnumber_model');
		
		$this->load->library('user_agent');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
		
	}
	
	function guest_update() {
		$data['name'] = $this -> input -> post('g_name');
		$data['phone'] = $this -> input -> post('g_phone');
		$data['email'] = $this -> input -> post('g_mail');
		$id = $this -> input -> post('g_id');
		echo $update = $this -> Bookingmodel -> guest_update($id, $data);
	}
	
	
	function edit_booking_date()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$check_in = date_format(date_create_from_format('d-m-Y',$this->input->post('check_in')), 'Y-m-d');
		$check_out = date_format(date_create_from_format('d-m-Y',$this->input->post('check_out')), 'Y-m-d');
		$booking_number = $this->input->post('booking_num');
		$offline_user = $this->input->post('offline_user');
		$category = $this->input->post('category');
		
		//online booking
		if($offline_user == 0 )
		{
			if($category=='hotel')
			{
			$data['results']=$this->Bookingmodel->details_view($booking_number,$id);
			}
			else
			{
				$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id);
			}
			
		}
		//offline booking
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			//agency offline booking
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
					
				$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			
			}
			//direct offline booking
			else
			{
				if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
				
			}
		 }
		 
		 $a=0;
		 $count='';
		 foreach($data['results'] as $result)
		 {
			 if($category=='hotel'){
			$room_avail=$this->Bookingmodel->check_room_status($result->set_id,$check_in,$check_out);
			 } else { 
			 $room_avail=$this->Bookingmodel->check_pack_room_status($result->set_id,$check_in,$check_out);
			 }
			$room_number=$this->Bookingmodel->booking_room_number($result->booking_id);
			$room_count = count($room_number);
			$count+= $room_count;
			//print_r($room_avail);
			if(!empty($room_avail))
			{ 
				foreach($room_number as $booking_rooms)
				{
					$room_num_avail = $this->Bookingmodel->check_roomnumber_status($booking_rooms->room_id,$check_in,$check_out);
					if(empty($room_num_avail))
					{
				$room_booking_avail=$this->Bookingmodel->check_booking_room($booking_rooms->room_id,$result->booking_id,$check_in,$check_out);
						if(empty($room_booking_avail))
						{
							$a+= 1;
						}
					}
				}
			}
		 }
		 if($a==$count)
		 { 
			$update_date = $this->Bookingmodel->date_change($booking_number,$check_in,$check_out);
			echo "1";
		 } else{ echo "0"; }
		 
	}
	
	function edit($booking_number,$offline_user,$category)
	 {
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$data['id']= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$data['id']); }
		else{ $data_menu['menu']=''; }
		
		//online booking
		if($offline_user == 0)
		{
			if($category=='hotel')
			{
			$data['results']=$this->Bookingmodel->details_view($booking_number,$data['id']);
			}
			else
			{
				$data['results']=$this->Bookingmodel->details_view_package($booking_number,$data['id']);
			}
			
			
		}
		//offline booking
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$data['id']);
			
			//agency offline booking
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$data['id']);
				}
				else
				{
					
				$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$data['id']);
				}
			
			}
			//direct offline booking
			else
			{
				if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$data['id']);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$data['id']);
				}
				
			}
		 }
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('48', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/edit',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/edit',$data);
		}
		//$this -> load -> view('booking/edit',$data);
		$this -> load -> view('layout/footer');
	}
	
	
	
	function amendments_num($num)
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('booking/amendments_num/'.$num);
		$config['total_rows'] = $this -> Bookingmodel -> amend_count($id,$num);
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		
		$data['results']=$this->Bookingmodel->get_amend_number($id,$config["per_page"], $data['page'],$num);
		$data['num']=$num;
		$data['id']=$id;
		
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/amend_list',$data);
				if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer'); }
		
	 }
	
	function amendments()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('booking/amendments');
		$config['total_rows'] = $this -> Bookingmodel -> amend_count($id,'');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		
		$data['results']=$this->Bookingmodel->get_amend_number($id,$config["per_page"], $data['page'],'');
		$data['id']=$id;
				if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		if(!empty($data_menu['menu']))
		{	if(in_array('46', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/amend_list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/amend_list',$data);
		}
		
		//$this -> load -> view('booking/amend_list',$data);
			if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer'); }
		
	 }
	
	function cancelled_num($num)
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('booking/cancelled_num/'.$num);
		$config['total_rows'] = $this -> Bookingmodel -> cancel_count($id,$num);
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results']=$this->Bookingmodel->get_cancel_number($id,$config["per_page"], $data['page'],$num);
		$data['id']=$id;
		$data['num']=$num;

		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/cancel_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
		
	 }
	
	function cancelled()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		
		$config['base_url'] = site_url('booking/cancelled');
		$config['total_rows'] = $this -> Bookingmodel -> cancel_count($id,'');
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results']=$this->Bookingmodel->get_cancel_number($id,$config["per_page"], $data['page'],'');
		$data['id']=$id;
		
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		if(!empty($data_menu['menu']))
		{	if(in_array('47', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/cancel_list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/cancel_list',$data);
		}
		//$this -> load -> view('booking/cancel_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }
	 
	function cancel_detail($booking_number,$offline_user,$category)
	 {
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		//online booking
		if($offline_user == 0)
		{
			if($category=='hotel')
			{
			$data['results']=$this->Bookingmodel->cancel_details_view($booking_number,$id);
			}
			else
			{
				$data['results']=$this->Bookingmodel->cancel_details_view_package($booking_number,$id);
			}
			
			
		}
		//offline booking
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			$agency = $this->Bookingmodel->agency_view($booking_number,$id);
			
			//agency offline booking
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->cancel_details_view_off_agency($booking_number,$id);
				}
				else
				{
					
				$data['results']=$this->Bookingmodel->cancel_details_view_off_agency_package($booking_number,$id);
				}
			
			}
			//direct offline booking
			else
			{
				if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->cancel_details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->cancel_details_view_off_package($booking_number,$id);
				}
				
			}
		 }
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('booking/cancel_detail',$data);
		$this -> load -> view('layout/footer');
		
	 }

	function index()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('booking/index');
		$config['total_rows'] = $this -> Bookingmodel -> row_count($id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		
		$data['results']=$this->Bookingmodel->get_booking_number($id,$config["per_page"], $data['page']);
		$data['id']=$id;
		
	 	$this -> load -> view('layout/header'); 
		if(!empty($data_menu['menu']))
		{	if(in_array('37', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/booking_list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/booking_list',$data);
		}
		//$this -> load -> view('booking/booking_list',$data);
		$this -> load -> view('layout/footer');
		
	 }
	 
	 
	function get_booking($cat='', $cin='', $cout='', $num='')
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$data['cat'] = $cat;
		$data['num'] = $num;

		if(!empty($cin)) $data['c_in'] = date_format(date_create_from_format('d-m-Y', $cin), 'Y-m-d');
		if(!empty($cout)) $data['c_out'] = date_format(date_create_from_format('d-m-Y', $cout), 'Y-m-d');
		
		if(empty($data['c_in'])) $data['c_in'] = date('Y-m-01');
		if(empty($data['c_out'])) $data['c_out'] = date('Y-m-t');
		
		$config['base_url'] = site_url('booking/get_booking/'.$data['cat'].'/'.date_format(date_create_from_format('Y-m-d', $data['c_in']), 'd-m-Y').'/'.date_format(date_create_from_format('Y-m-d', $data['c_out']), 'd-m-Y').'/'.$num);
		$config['total_rows'] = $this -> Bookingmodel -> row_count_booking($id,$data['cat'],$data['c_in'],$data['c_out'],$num);
		
		$config['per_page'] = 10;
		$config["uri_segment"] = 7;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(7)) ? $this -> uri -> segment(7) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		
		$data['results']=$this->Bookingmodel->getnumber($id,$config["per_page"], $data['page'],$data['cat'],$data['c_in'],$data['c_out'],$num); 
		
		$data['id']=$id;
		
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/booking_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }
	 
	 
	function detail($booking_number,$offline_user,$category)
	 {
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		//online booking
		if($offline_user == 0)
		{
			if($category=='hotel')
			{ 
			$data['results']=$this->Bookingmodel->details_view($booking_number,$id); 
			}
			else
			{
				$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id);
			}
			
			
		}
		//offline booking
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			//agency offline booking
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
					
				$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			
			}
			//direct offline booking
			else
			{
				if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
				
			}
		 }
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('booking/booking_detail',$data);
		$this -> load -> view('layout/footer');
		
	 }
	 
	 
	 function arrival_detail($booking_number,$offline_user,$category)
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		if($offline_user == 0) 
		{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view($booking_number,$id); 
				}
				else
				{
					$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id); 
				}
		}
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			}
			else
			 {
			 	if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
				
			 }
			
		 }
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('booking/arrival_detail',$data);
		$this -> load -> view('layout/footer');
	 }
	 
	  function checkin_detail($booking_number,$offline_user,$category)
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		
		if($offline_user == 0)
		{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view($booking_number,$id);
				}
				else
				{
					$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id);
				}
		}
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
					$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			}
			else
			 {
			 	if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
				
			 }
			
		}
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('booking/checkin_detail',$data);
		$this -> load -> view('layout/footer');
	 }
	 
	function checkin()
	 {
		 $username = $this->session->userdata['hotel_adminusername'];
		 $id= $this->Profilemodel->get_id($username);
	 	 $data_hotel['result']= $this->Profilemodel->details($id);
		 
		
		 $hotel_name = $data_hotel['result']['hotel'][0]->title;
		 $date = date('Y-m-d');
		 $time = date('h:i:s');
	 	 $booking_id = $this->input->post('booking_id');
		 
		 $book = $this ->db
		 -> where('id', $booking_id)
		 -> get('tbl_booking')
		 -> row();
		 
	  	 $data['booking_room'] = $this->input->post('book_room_id');	
	  	 $data['name'] = $this->input->post('name');
		 $data['email'] = $this->input->post('email');
		 $data['phone'] = $this->input->post('phone');
		 $data['check_in'] = date('Y-m-d');
		 $data['check_out'] = '';
		 $data['status'] = 1;
	 	
		if($book -> status == 1 || $book -> status == 0) {
				/* $to = $book -> email;
				$subject = 'Guest Check-in';
				$message = 'Hi,<br/><br/>Thank you for using our service.';
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: BookingWings<info@crantia.com>' . "\r\n";
				mail($to, $subject, $message, $headers); */
				
				$this->load->library('email');
				$mydata = array('date' => $date, 'time' => $time, 'hotel_name' =>$hotel_name);
				$message = $this->load->view('layout/room_checkin_email', $mydata, true);        
				$this->email->set_mailtype('html');
				$this->email->from('booking@bookingwings.com', 'Bookingwings');
				$this->email->to($book -> email); 

				$this->email->subject('Room Check in');
				$this->email->message($message);    

				$this->email->send();  
				
				
		}
		
		echo  $data = $this->Bookingmodel->checkin($booking_id,$data);
		
	 }
	 
	 function cancel($booking_id, $user='')
	 {
		 $username 		= $this -> session -> userdata['hotel_adminusername'];
		$h_id 			= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
	 	 $result = $this->Bookingmodel->cancel($booking_id, $user);
		
		if($result!=0)
		{
		$email = $this -> db -> where('id',$user) -> get('tbl_offline_user') -> row();
		
		if(empty($email -> email)) {
		$email = $this->Bookingmodel->cancel_email($booking_id);
		}
		
		
		if(!empty($data_menu['menu']))
		{	if(in_array('56', json_decode($data_menu['menu']))==1)
			{
		$mydata = array(
		'booking_number' => $booking_id,
	   	'email' => $email -> email
		);
		
		$this->load->library('email');
	    $message = $this->load->view('layout/cancel_booking_email', $mydata,true);     
	    $this->email->set_mailtype('html');
	    $this->email->from('booking@bookingwings.com', 'Bookingwings');
	    $this->email->to($email -> email); 
	
	    $this->email->subject('Cancel Booking');
	    $this->email->message($message);    
	
	   $this->email->send();
		redirect('booking/arrival');
		}
			else{ $this -> load -> view('layout/header');
			$this->load->view('layout/no_permission');
			$this -> load -> view('layout/footer');}
		}
		else
		{ 
		$mydata = array(
		'booking_number' => $booking_id,
	   	'email' => $email -> email
		);
		
		$this->load->library('email');
	    $message = $this->load->view('layout/cancel_booking_email', $mydata,true);     
	    $this->email->set_mailtype('html');
	    $this->email->from('booking@bookingwings.com', 'Bookingwings');
	    $this->email->to($email -> email); 
	
	    $this->email->subject('Cancel Booking');
	    $this->email->message($message);    
	
	   $this->email->send();
		redirect('booking/arrival');
		
		}
		
		
		
		}
	 	
	 	
	 }
	 
	 function checkin_list()
	 {
	 	
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('booking/checkin_list');
		$config['total_rows'] = $this -> Bookingmodel -> checkin_count($id,''); 
		
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_checkin($id,$config["per_page"], $data['page'],'');
		$data['id']=$id;
		
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/header'); }
		if(!empty($data_menu['menu']))
		{	if(in_array('38', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/checkin_list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/checkin_list',$data);
		}
		//$this -> load -> view('booking/checkin_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }
	 
	 function checkin_list_num($num='')
	 {
		if(empty($num)) {
			redirect('booking/checkin_list');
		}
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('booking/checkin_list_num/'.$num);
		$config['total_rows'] = $this -> Bookingmodel -> checkin_count($id,$num); 
		
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_checkin($id,$config["per_page"], $data['page'],$num);
		$data['id']=$id;
		$data['num']=$num;
		
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/checkin_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }

	 function checkin_list_date($date)
	 {
		if(empty($date)) {
			redirect('booking/checkin_list');
		}	 	
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		$date = date_format(date_create_from_format('d-m-Y', $date), 'Y-m-d');
		
		$config['base_url'] = site_url('booking/checkin_list_date/'.$date);
		$config['total_rows'] = $this -> Bookingmodel -> checkin_count_date($id,$date); 
		
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_checkin_date($id,$config["per_page"], $data['page'], $date);
		$data['date']=$date;
		$data['id']=$id;

		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/checkin_list',$data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }
	 
	 function arrival()
	 {
		$date = date('Y-m-d'); 
		$data['date'] = date('Y-m-d');
	 	
	 	//if(!empty($date)) { $date = date_format(date_create_from_format('d-m-Y', $date), 'Y-m-d'); }
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('booking/arrival');
		 $config['total_rows'] = $this -> Bookingmodel -> arrival_count($id,$date,''); 
		
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_arrival_date($id,$config["per_page"], $data['page'], $date,'');
		$data['id']=$id;	 	
		
		if (!$this->input->is_ajax_request()) {		
		$this -> load -> view('layout/header'); }
		if(!empty($data_menu['menu']))
		{	if(in_array('39', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/arrival', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/arrival', $data);
		}
		//$this -> load -> view('booking/arrival', $data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer'); }
	 }

	 function arrival_num($num)
	 {
		$date = date('Y-m-d'); 
		$data['date'] = date('Y-m-d');
		$data['num'] = $num;
	 	
	 	//if(!empty($date)) { $date = date_format(date_create_from_format('d-m-Y', $date), 'Y-m-d'); }
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('booking/arrival_num/'.$num);
		 $config['total_rows'] = $this -> Bookingmodel -> arrival_count($id,$date,$num); 
		
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_arrival_date($id,$config["per_page"], $data['page'], $date,$num);
		$data['id']=$id;	 	
		
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/header');
		}
		$this -> load -> view('booking/arrival', $data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer');
		}
	 }
	 
	 function advance()
	 {
	 	   $amount = $this->input->post('amount');
		   $voucher = $this->input->post('voucher');			   
		   $b_number = $this->input->post('booking_number');	
		   
		  echo  $this->Bookingmodel->advance($b_number,$amount,$voucher); 
		   
	 }
	 
	 function checkout()
	 {
	 	 $username = $this->session->userdata['hotel_adminusername'];
		 $id= $this->Profilemodel->get_id($username);
	 	 $data_hotel['result']= $this->Profilemodel->details($id);
		 
		  $hotel_name = $data_hotel['result']['hotel'][0]->title;
		 $date = date('Y-m-d');
		 $time = date('h:i:s');
		 
	 	$booking_id = $this->input->post('booking_id');
		
		 $book = $this ->db
		 -> where('id', $booking_id)
		 -> get('tbl_booking')
		 -> row();
		
		$book_room_id = $this->input->post('book_room_id');	
		
		if($book -> status == 2) {
				
				$this->load->library('email');
				$mydata = array('date' => $date, 'time' => $time, 'hotel_name' =>$hotel_name);
				$message = $this->load->view('layout/room_checkout_email', $mydata, true);        
				$this->email->set_mailtype('html');
				$this->email->from('booking@bookingwings.com', 'Bookingwings');
				$this->email->to($book -> email); 

				$this->email->subject('Room Check out');
				$this->email->message($message);    

				$this->email->send();
		}
		
		echo $this->Bookingmodel->checkout($book_room_id,$booking_id);
	 }
	 
	
	
	
	function checkout_list()
	{
		$date = date('Y-m-d'); 
		$data['date'] =date('Y-m-d');
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('booking/checkout_list');
		 $config['total_rows'] = $this -> Bookingmodel -> checkout_count($id,$date,''); 
		
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_checkout_date($id,$config["per_page"], $data['page'], $date,'');
		
		
		$data['id']=$id;	 	
		
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/header'); }
		if(!empty($data_menu['menu']))
		{	if(in_array('40', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('booking/checkout_list', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('booking/checkout_list', $data);
		}
		//$this -> load -> view('booking/checkout_list', $data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer'); }
	}

	function checkout_list_num($num='')
	{
		if(empty($num)) {
			redirect('booking/checkout_list');
		}
		
		$date = date('Y-m-d');
		$data['date'] =date('Y-m-d');
		$data['num'] = $num;
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('booking/checkout_list_num/'.$num);
		 $config['total_rows'] = $this -> Bookingmodel -> checkout_count($id,$date,$num); 
		
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results']=$this->Bookingmodel->get_checkout_date($id,$config["per_page"], $data['page'], $date, $num);
		
		
		$data['id']=$id;	 	
		
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/header'); }
		$this -> load -> view('booking/checkout_list', $data);
		if (!$this->input->is_ajax_request()) {
		$this -> load -> view('layout/footer'); }
	}
	
	 function checkout_detail($booking_number,$offline_user,$category)
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		
		if($offline_user == 0)
		{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view($booking_number,$id);
				}
				else
				{
					$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id);
				}
		}
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
					$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			}
			else
			 {
			 	if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
			 }
			
		}
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('booking/checkout_detail',$data);
		$this -> load -> view('layout/footer');
	 }
	 
	 
	 function room_interchange($booking_id)
	 {
		 $username = $this->session->userdata['hotel_adminusername'];
		 $id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
			$data['rooms'] = $this->Bookingmodel->get_hotel_rooms($id);
			$data['result'] = $this->Bookingmodel->get_booking_date($booking_id);
			$data['current_rooms'] = $this->Bookingmodel->get_booking_rooms($booking_id);
			 $data['interchange_detail'] = $this->Bookingmodel->interchange_detail($booking_id);
			 
			// print_r($data['interchange_detail']);
			 
			if(isset($_POST['room_interchange']))
			{
			$this -> form_validation -> set_rules('old_room', 'From room', 'trim|required');
			$this -> form_validation -> set_rules('new_room_type', 'To room', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == TRUE) {
			$current_room = explode('|',$this->input->post('old_room'));
			 
			$datas['date'] = date('Y-m-d H:i:s');
			$datas['status']		= '1';
			$datas['booking_id']	=  $current_room[1];
			$datas['old_room']	=  $current_room[0];
			$datas['old_room_type']	=  $this->input->post('old_room_type');
			$datas['new_room']	=  $this->input->post('new_room');
			$datas['new_room_type']	=  $this->input->post('new_room_type');
			$datas['remark']	= $this->input->post('remark');
		
			$interchange = $this->Bookingmodel->room_interchange($datas);
			$update_rooms = $this->Bookingmodel->room_booking_change($datas);
			
			echo  "<script type='text/javascript'>window.close();</script>";
			} else { $this -> load -> view('booking/room_interchange',$data); } }
			else
			{
				if(!empty($data_menu['menu']))
			{	if(in_array('55', json_decode($data_menu['menu']))==1)
				{ $this -> load -> view('booking/room_interchange',$data);}
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ $this -> load -> view('booking/room_interchange',$data);
			}
		 	//$this -> load -> view('booking/room_interchange',$data);
			}
	 }
	
	function avail_interchange_rooms()
	{
		 $check_in = $this->input->post('check_in');
	 	 $check_out = $this->input->post('check_out');
		$room_id = $this->input->post('room');
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$data['results'] = $this->Bookingmodel->room_setting_list($room_id,$check_in,$check_out);
		?>
		 <div class="col-md-12 mrt"></div>
		      <div class="room-list-cus room_list_cus_offline col-lg-12">
                <label class="col-lg-12 cus_offline_rooms_title">Available Rooms</label>
                <?php
				
                if(!empty($data['results'])) 
				{
					foreach($data['results'] as $result)
					{
						//echo $result -> room_title;
						$rooms =$this->Bookingmodel->room_numbers($id,$result->id,$check_in,$check_out);
						foreach($rooms as $roomnumber)
						{
							$available='';
						 	//if($roomnumber->status == '1'):
								$avail_room_check =$this->Bookingmodel->available_room_numbers($check_in,$check_out,$id,$result->id,$roomnumber->id);
								$available += $avail_room_check;
							//endif;
					    }
					   
						if(!empty($rooms))
						{
							 ?>
					      <ul class="delrom_cus delrom_cus_offline col-md-12">
                     	
                     	 <div class="col-md-4">
                     	 <?php
						  
							 foreach($rooms as $roomnumber)
							 {
								$room_check='';
								// if($roomnumber->status == '1')
								// {
												$avail_rooms =$this->Bookingmodel->available_room_numbers($check_in,$check_out,$result->hotel_id,$result->id,$roomnumber->id);
												
												$room_check += $avail_rooms;
												if($avail_rooms==0)
												{
												?>
												<li class="block_cus_field_main_title_room_number_cus ">
												<input class=" numberrooms" type="radio" name="new_room" 
												value="<?php echo $roomnumber->id;?>" id=""> <?php echo $roomnumber->room_number;?>
												</li>
												<?php		
												}
							
								//}
							 
							}
							  ?>
							  </div>
							 
                     </ul>
                     
						<?php
					 
						}
					}						
					
				}
				else 
				{ echo 'No rooms'; }
					
				?>
				  
				
             </div>
		
		
		<?php
	
	}
	
	
	 function add_room($booking_id, $room, $set) {
		$data['result'] = $this->Bookingmodel->get_booking_date($booking_id);

		if($data['result'][0] -> package_id == 0) {
		$data['room'] = $this->Bookingmodel->getSetting($set);
		} else {
		$data['room'] = $this->Bookingmodel->getSetting_pack($set);
		}
		
		$data['check_in'] = $data['result'][0]->check_in;
	 	$data['check_out'] = $data['result'][0]->check_out;
		
		$username = $this->session->userdata['hotel_adminusername'];
		$data['id']= $this->Profilemodel->get_id($username); 
		
		$data['results'] = $this->Bookingmodel->room_setting_list($room,$data['check_in'],$data['check_out']);
		
		if(!empty($data_menu['menu']))
		{
			if(in_array('55', json_decode($data_menu['menu']))==1){
				$this -> load -> view('booking/add_room',$data);
			} else {
				$this->load->view('layout/no_permission');
			}
		} else {
			$this -> load -> view('booking/add_room',$data);
		}
	 }
	 
	 function add_room_update($book_num) {
		$d['booking_id'] = $this -> input -> post('b_id');
		$d['room_number'] = $this -> input -> post('new_room');
		$d['check_in'] = $this -> input -> post('c_in');
		$d['check_out'] = $this -> input -> post('c_out');
		$bed = $this -> input -> post('beds');
		$kid = $this -> input -> post('kids');
		
		
		$booking = $this -> Bookingmodel -> tbl_booking($d['booking_id']);
		//if($booking -> offline_user != 0 || $booking -> reservation != 0) {
			$add1 = ($booking -> number_of_rooms + 1) * ($booking -> room_rate + $booking -> commision);
			if($booking -> package_id != 0) {
				$tax = $this -> Bookingmodel -> tax_pack($booking -> room_id);
			} else {
				$tax = $this -> Bookingmodel -> tax($booking -> room_id);
			}
			
			$dt['number_of_rooms'] = $booking -> number_of_rooms + 1;
			$dt['extra_bed'] = $booking -> extra_bed + $bed;
			$dt['number_of_childrens'] = $booking -> number_of_childrens + $kid;
			
			$this -> db -> where('id', $d['booking_id']) -> update('tbl_booking', $dt);
			$other = $this -> Bookingmodel -> details_other($booking -> booking_number, $booking -> id);

			if(!empty($other)) {
				$add2 = ($other -> number_of_rooms) * $other -> room_rate;
			} else {
				$add2 = '';
			}
			
			$food = $this -> Bookingmodel -> food_plan($booking -> booking_number);

			if(!empty($food)) {
				$f_rate = $food[0] -> amount;
			} else {
				$f_rate = '';
			}
			
			$b_rate = $booking -> bed_rate * $dt['extra_bed'];
			$c_rate = $booking -> child_rate * $dt['number_of_childrens'];
			
			$da['tax'] = ($b_rate + $c_rate + $f_rate + $add2 + $add1) * ($tax -> tax_amount / 100); 
			$da['total_amount'] = $da['tax'] + $b_rate + $c_rate + $f_rate + $add2 + $add1;
		$this -> db -> where('booking_number', $booking -> booking_number) -> update('tbl_booking', $da);
		$this -> db -> insert('tbl_booking_rooms', $d);
		//}
		echo  "<script type='text/javascript'>window.close();</script>";

	 }
	
	 function del_room($book_id, $room) {
		$d['booking_id'] = $book_id;
		$d['room_number'] = $room;
		
		$booking = $this -> Bookingmodel -> tbl_booking($book_id);
		//if($booking -> offline_user != 0 || $booking -> reservation != 0) {
			$add1 = ($booking -> number_of_rooms - 1) * ($booking -> room_rate + $booking -> commision);
			if($booking -> package_id != 0) {
				$tax = $this -> Bookingmodel -> tax_pack($booking -> room_id);
			} else {
				$tax = $this -> Bookingmodel -> tax($booking -> room_id);
			}

			if($booking -> number_of_rooms == 1) {
				$this -> db -> where('id', $d['booking_id']) -> delete('tbl_booking');
			} else {
				$dt['number_of_rooms'] = $booking -> number_of_rooms - 1;
				$this -> db -> where('id', $book_id) -> update('tbl_booking', $dt);
			}
			$other = $this -> Bookingmodel -> details_other($booking -> booking_number, $booking -> id);

			if(!empty($other)) {
				$add2 = ($other -> number_of_rooms) * $other -> room_rate;
			} else {
				$add2 = '';
			}
			
			$food = $this -> Bookingmodel -> food_plan($booking -> booking_number);

			if(!empty($food)) {
				$f_rate = $food[0] -> amount;
			} else {
				$f_rate = '';
			}
			
			$b_rate = $booking -> bed_rate * $booking -> extra_bed;
			$c_rate = $booking -> child_rate * $booking -> number_of_childrens;
			
			$da['tax'] = ($b_rate + $c_rate + $f_rate + $add2 + $add1) * ($tax -> tax_amount / 100);
			$da['total_amount'] = $da['tax'] + $b_rate + $c_rate + $f_rate + $add2 + $add1;
		$this -> db -> where('booking_number', $booking -> booking_number) -> update('tbl_booking', $da);
		$this -> db -> where($d) -> delete('tbl_booking_rooms');
		//}
		
		redirect($this->agent->referrer());
	 }
	 
	 function extra_update() {
		$d['number_of_childrens'] = $this -> input -> post('kid');
		$d['extra_bed'] = $this -> input -> post('bed');
		$b_id = $this -> input -> post('b_id');
		
		$this -> db -> where('id', $b_id) -> update('tbl_booking', $d);
		
		$booking = $this -> Bookingmodel -> tbl_booking($b_id);
		
			if($booking -> package_id != 0) {
				$tax = $this -> Bookingmodel -> tax_pack($booking -> room_id);
			} else {
				$tax = $this -> Bookingmodel -> tax($booking -> room_id);
			}

			$add1 = ($booking -> number_of_rooms) * ($booking -> room_rate + $booking -> commision);
			
			if(!empty($other)) {
				$add2 = ($other -> number_of_rooms) * $other -> room_rate;
			} else {
				$add2 = '';
			}
			
			$food = $this -> Bookingmodel -> food_plan($booking -> booking_number);

			if(!empty($food)) {
				$f_rate = $food[0] -> amount;
			} else {
				$f_rate = '';
			}
			
			$b_rate = $booking -> bed_rate * $d['extra_bed'];
			$c_rate = $booking -> child_rate * $d['number_of_childrens'];

			$da['tax'] = ($b_rate + $c_rate + $f_rate + $add2 + $add1) * ($tax -> tax_amount / 100);
			$da['total_amount'] = $da['tax'] + $b_rate + $c_rate + $f_rate + $add2 + $add1;
		$this -> db -> where('booking_number', $booking -> booking_number) -> update('tbl_booking', $da);
		
		echo '1';
	 }
}
?>