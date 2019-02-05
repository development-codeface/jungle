<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
 {
		
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->model('Dashboardmodel');
		$this->load->model('Profilemodel');
		$this->load->model('Bookingmodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
	 }
	 
	  function curl($url) {
		 $ch	= curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		 $data	= curl_exec($ch);
		 curl_close($ch);
		 return $data;
	 }
	 
	  function sms()
	 {
		$data['s_id']	= "AMNFTS";
		
		if(isset($_POST['submit_sms'])) {
			$this -> form_validation -> set_rules('contact', 'contact nos.', 'trim|required');
			$this -> form_validation -> set_rules('message', 'message', 'trim|required');
			$this -> form_validation -> set_rules('senderid', 'senderid', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']=validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('dashboard/sms',$data);
				$this -> load -> view('layout/footer');
			} else {
				$uname		= 'laluantony';
				$pwd		= 'amanhts123';
				$senderid	= $this -> input -> post('senderid');
				$route		= 'A';
				$to			= $this -> input -> post('contact');
				$purpose	= $this -> input -> post('message');
				$msg		= urlencode("$purpose");
				$url		= "http://sms.bluesoft.in/sendsms?uname=$uname&pwd=$pwd&senderid=$senderid&to=$to&msg=$msg&route=$route";
			 $response	= $this -> curl($url);
			 redirect('dashboard/sms');
			}
		} else {
		
		$this -> load -> view('layout/header');
		$this->load->view('dashboard/sms', $data);
		$this->load->view('layout/footer');
		}
	 }
	 
	 
	 
	public function index()
	{
		
		$username = $this->session->userdata['hotel_adminusername']; 
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{
		$data['menu'] = $this->Profilemodel->select_menu($username,$id); 
		}
		else
		{
			$data['menu']='';
		}
		$month = date('m');
		$year = date('Y');
		$from = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
		$current_date = date('Y-m-d');
		 
		 if($from==$current_date)
		 {
		 	//$previous_month= date('Y-m', strtotime(date('Y-m')." -1 month"));
			$previous_month= date('Y-m');
			$result = $this->Dashboardmodel->booking_backup($previous_month,$id);
			
			foreach($result as $results)
			{
				$data = array( 'id' =>'',
								'user_id' => $results->user_id,
								'hotel_id' => $results->hotel_id,
								'room_id' => $results->room_id,
								'booking_number' => $results->booking_number,
								'number_of_rooms' => $results->number_of_rooms,
								'number_of_childrens' => $results->number_of_childrens,
								'category' => $results->category,
								'payment_method' => $results->payment_method,
								'check_in' => $results->check_in,
								'check_out' => $results->check_out,
								'date' => $results->date,
								'status' => $results->status,
								'cancel' => $results->cancel
								);
				
				
				$check = $this->Dashboardmodel->check_backup($data);
				
				if($check==0)
				{
				$this->db->insert('tbl_booking_backup',$data);
				$delete = $this->Dashboardmodel->delete_booking($results->id);
				}
				
			}
			
		 }
		
		
		
		
		$data['booking_results']=$this->Dashboardmodel->get_booking_number($id);
		$data['id']=$id;
		$data['booking_count']= $this -> Bookingmodel -> row_count($id); 
		
		$data['arrival_results']=$this->Dashboardmodel->get_arrival($id);
		$data['arrival_count']= $this -> Dashboardmodel -> arrival_count($id); 
		$data['checkin_count']= $this -> Dashboardmodel -> checkin_count($id); 
		//print_r($data['checkin_count']); exit;
		$data['checkout_count']= $this -> Dashboardmodel -> checkout_count($id); 
		
		$data['user_count']= $this -> Dashboardmodel -> user_count($id); 
		
		$data['rooms'] = $this -> Dashboardmodel -> rooms($id);
		
		$this -> load -> view('layout/header');
		$this->load->view('dashboard/index',$data);
		$this->load->view('layout/footer');
	}
	
	
	function promotion()
	{
		$username 		= $this -> session -> userdata['hotel_adminusername'];
		$h_id 			= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		
		date_default_timezone_set('Asia/Kolkata');
		$this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
		{	if(in_array('57', json_decode($data_menu['menu']))==1)
			{ $this->load->view('promotion/promotion'); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('promotion/promotion');
		}
		
		//$this->load->view('promotion/promotion');
		$this->load->view('layout/footer');
	}
	
	
	
}
