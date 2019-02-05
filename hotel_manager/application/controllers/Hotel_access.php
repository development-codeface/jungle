<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_access extends CI_Controller {

	public $key='ea919f7d1booking56wingsa1823dbffd';
	public $c_id='150';
	public $url = 'http://54.187.36.195:8080/';

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Channel_model');
		$this->load->model('Hotelmodel');
		$this->load->library('image_lib');
		$this->load->library('Curl');
		$this->load->model('Profilemodel');
		$this->load->library('upload');
	}
	
function convertCurrency($amount, $from, $to)
	{
	 if(empty($from)) $from = 'inr';
	 if($from == $to) {
	 return $amount;
	 } 
	  else {
	  $amount = urlencode($amount);
       $from= urlencode($from);
       $to= urlencode($to);
    
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
    $data = explode($to, $data[1]);
    print_r($data);
    // return round($data[0], 2);
	 }
	}
	
	function email() {
	$username = $this->session->userdata['hotel_adminusername'];
	$data['id']= $this->Profilemodel->get_id($username); 
	
	$data['mail']= $this->Hotelmodel -> get_email($data['id']);
	
	if(isset($_POST['mail_submit'])) {
	$this -> form_validation -> set_rules('host', 'email host', 'trim|required');
	$this -> form_validation -> set_rules('port', 'port no.', 'trim|required|numeric');
	$this -> form_validation -> set_rules('user', 'username', 'trim|required|valid_email');
	$this -> form_validation -> set_rules('pass', 'password', 'trim|required');
	
	$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
	
	if ($this->form_validation->run() == FALSE) {
		$this->load->view('layout/header');
		$this->load->view('access/email', $data);
		$this->load->view('layout/footer');
			} else {
			$dat['hotel_id'] = $this->input->post('id');
			$dat['mail_host'] = $this->input->post('host');
			$dat['mail_port'] = $this->input->post('port');
			$dat['mail_user'] = $this->input->post('user');
			$dat['mail_pass'] = base64_encode($this->input->post('pass'));
			$curr_pass = $this->input->post('curr_pass');
			if(!empty($curr_pass) && base64_encode($curr_pass) != $data['mail'] -> mail_pass) {
			$this->session->set_flashdata('error','Password mismatch, please try again');
			redirect('hotel_access/email');
			}
			
			$check = $this -> Hotelmodel -> email_exist($dat['hotel_id']);
			
			if($check > 0) {
		$this->db->where('hotel_id', $dat['hotel_id'])->update('tbl_hotels_email', $dat); 
		$this->session->set_flashdata('success','Email details updated successfully');
			} else {
			$this -> db -> insert('tbl_hotels_email', $dat);
			$this->session->set_flashdata('success','Email details added successfully');
			}
			redirect('hotel_access/email');
			}
	} else {
		$this->load->view('layout/header');
		$this->load->view('access/email', $data);
		$this->load->view('layout/footer');
	}
	}
	
	function index() {
	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		$data['id'] = $id;
		$data['access']= $this->Hotelmodel->access_options($id);
		$data['result']= $this->Profilemodel->details($id);
	
if(isset($_POST['opt_submit'])) {

				$actualpath			=	basename('hotel/slider/');
				$realpath			=	"hotel/".$actualpath."/".$id;

				#offer-img
				if($_FILES['offer_img']['name'])
				{
					
				$data_image['change_images'] = $this->Profilemodel->details($id);
				$old_ofrimage =  $data_image['change_images']['engine_bg']->offer_img;
				
				$this->upload->initialize($this->set_upload_options($id));
						
				if (!$this->upload->do_upload('offer_img'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
						redirect('profile');			
				}
				else
				{
				
					$upload_img_data = $this->upload->data();
					$eng['offer_img'] = $realpath."/".$upload_img_data['file_name'];
					if($old_ofrimage<>'')
					{
					unlink('../'.$old_ofrimage);
					}
				}  
				$this->Hotelmodel->update_engine($eng,$id);
				}
				
				#booking engine bg-img
				if($_FILES['engine_img']['name'])
				{
					
				$data_image['change_images'] = $this->Profilemodel->details($id);
				
				$old_engimage =  $data_image['change_images']['engine_bg']->engine_img;
				
				$this->upload->initialize($this->set_upload_options($id));
						
				if (!$this->upload->do_upload('engine_img'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
						redirect('profile');			
				}
				else
				{
				
					$upload_img_data = $this->upload->data();
					$upload_img_data['file_name'];
					$eng['engine_img'] = $realpath."/".$upload_img_data['file_name'];
					if($old_engimage<>'')
					{
					unlink('../'.$old_engimage);
					}
				}  
				$this->Hotelmodel->update_engine($eng,$id);
				}
				#booking engine bg-img end
				
				$this->session->set_flashdata('success','Updated Successfully');
				redirect('hotel_access');
	} else {
		$this->load->view('layout/header');
		$this->load->view('access/index', $data);
		$this->load->view('layout/footer');
		}
	}
	

	
	function inventory_update() {
		$username = $this->session->userdata['hotel_adminusername']; 
		$hot= $this->Profilemodel->get_id($username); 
		
		$data['accessKey'] = $this -> key;
		$data['channelId'] = $this -> c_id;
		
		if(isset($_POST['submit'])) {
			
		$this -> form_validation -> set_rules('from', 'from date', 'required');
		$this -> form_validation -> set_rules('to', 'from date', 'required');
		
			if ($this->form_validation->run() == FALSE) {
redirect('hotel_access/');
			}
		
			$from = $this -> input -> post('from');
			$to = $this -> input -> post('to');
			
			$a=0;
			//foreach($hotel as $hot):
			$details=$this->Channel_model->roomsByHotel($hot);
			$datediff = strtotime($to) - strtotime($from);
			$datediff = floor($datediff/(60*60*24));
			$data['hotels'][$a]['hotelId'] = $hot;
			
			if(!empty($details)) {
				$b=0;
				foreach ($details as $room) {
				$data['hotels'][$a]['rooms'][$b]['roomId'] = $room->id;
				for($i = 0; $i < $datediff + 1; $i++){
				$room_count=0;
$room_count+=$this->Channel_model->rooms_count($hot,$room->id,date("Y-m-d", strtotime($from . ' + ' . $i . 'day')));

				$data['hotels'][$a]['rooms'][$b]['availability'][$i]['date'] = date("Y-m-d", strtotime($from . ' + ' . $i . 'day'));
				$data['hotels'][$a]['rooms'][$b]['availability'][$i]['free'] = $room_count;
				}
				$b++;
				}
			}

			//cURL
			$api_url = $this -> url.'api/daywiseInventory';
			$jsonData = json_encode($data);
			$this->curl->create($api_url);
			$this->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));		
			$this->curl->post($jsonData);
			$result = $this->curl->execute();
			$result = json_decode($result);
			
			!empty($result -> message) ? $this->session->set_flashdata('error', $result -> message) : $this->session->set_flashdata('error', $result -> status);
			redirect('hotel_access/');
		}

	}
	
		function price_update() {
		$username = $this->session->userdata['hotel_adminusername']; 
		$hot= $this->Profilemodel->get_id($username); 
		
		$data['accessKey'] = $this -> key;
		$data['channelId'] = $this -> c_id;
		
		if(isset($_POST['submit'])) {
		$this -> form_validation -> set_rules('from', 'from date', 'required');
		$this -> form_validation -> set_rules('to', 'from date', 'required');
		
			if ($this->form_validation->run() == FALSE) {
redirect('hotel_access/');
			}
			
			$details=$this->Channel_model->roomsByHotel($hot);
			
			$a = 0;
			$data['hotels'][$a]['hotelId'] = $hot;
			
			if(!empty($details)) {
				$b=0;
				foreach ($details as $room) {
				$data['hotels'][$a]['rooms'][$b]['roomId'] = $room->id;
				
				
			$from = date_format(date_create_from_format('d-m-Y', $this -> input -> post('from')), 'Y-m-d');
			$to = date_format(date_create_from_format('d-m-Y', $this -> input -> post('to')), 'Y-m-d');
			
			$datediff = strtotime($to) - strtotime($from);
			$datediff = floor($datediff/(60*60*24));
				$c=0; $d=0;
				while(strtotime($from) <= strtotime($to)) {
				$rates = $this -> Channel_model -> ratePlans($room->id, $from);
				
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['rateplanId'] = $room->id;
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['priceDetails'][$c]['date']= $from;
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['priceDetails'][$d]['price']['Double']= $rates -> price;
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['priceDetails'][$d]['price']['Single']= $rates -> price;
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['priceDetails'][$d]['price']['Extra Bed']= $rates -> room_adult_rate;
				$data['hotels'][$a]['rooms'][$b]['rateplans'][0]['priceDetails'][$d]['price']['Extra Child']= empty($rates -> room_child_rate) ? 0 : $rates -> room_child_rate;
				
				$from = date ("Y-m-d", strtotime("+1 day", strtotime($from)));
				$c++;$d++;
				}
				
				for($i = 0; $i < $datediff + 1; $i++){
				}
				$b++;
				}
			}
			//cURL
			$api_url = $this -> url.'api/daywisePrice';
			$jsonData = json_encode($data);
			$this->curl->create($api_url);
			$this->curl->option(CURLOPT_HTTPHEADER, array('Content-type: application/json; Charset=UTF-8'));		
			$this->curl->post($jsonData);
			$result = $this->curl->execute();
			$result = json_decode($result);
			
			!empty($result -> message) ? $this->session->set_flashdata('error', $result -> message) : $this->session->set_flashdata('error', $result -> status);
			redirect('hotel_access/');
		}
		}
		
		function booking_update() {
		//$username = $this->session->userdata['hotel_adminusername']; 
		//$hot= $this->Profilemodel->get_id($username); 
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				//$jsonData = '{"accessKey":"ea919f7d1booking56wingsa1823dbffd","GuestDetails":{"title":"Mr","guestName":"Vivek Rungta","address1":"AxisRooms","address2":"Jayanagar","address3":"Bangalore","country":"India","pin":"560011","emailId":"vivek.rungta@axisrooms.com","landPhoneNo":"+919980808551","mobileNo":"+919980808551"},"CheckinDetails":{"checkInDateTime":"27/02/2014","checkOutDateTime":"01/03/2014","totalPax":"4","children":"2","amount":"20000","taxes":"2250","totalAmount":"23000","paid":"false"},"BookingDetails":{"hotelID":"15","bookingNo":"23561","bookingDate":"20/02/2014","cancelledDate":"21/02/2014","modifiedDate":"21/02/2014","bookedBy":"xyz","ota":"Booking.com","otaRefId":"2","bookingStatus":"confirmed"},"Rates":{"roomType":[{"id":"1","date":"27/02/2014","noOfRooms":"1","ratePlanId":"3840"},{"id":"1","date":"28/02/2014","noOfRooms":"1","ratePlanId":"3835"}]}}';
				//$data = json_decode($jsonData);
				$data = json_decode(file_get_contents("php://input"));
				if($data -> accessKey == 'ea919f7d1booking56wingsa1823dbffd') {
					$name = $data -> GuestDetails -> guestName;
					
					$parts = explode(" ", $name);
					$us['last_name'] = array_pop($parts);
					$us['first_name'] = implode(" ", $parts);
					$us['phone'] = $data -> GuestDetails -> mobileNo;
					$us['address'] = $data -> GuestDetails -> address1." ".$data -> GuestDetails -> address2;
					$us['pincode'] = $data -> GuestDetails -> pin;
					$us['city'] = $data -> GuestDetails -> address3;
					$us['country'] = $data -> GuestDetails -> country;
					$us['email'] = $data -> GuestDetails -> emailId;
					$us['status'] = 1;
					
					$existing = $this -> Channel_model -> exist($us['email']);
					empty($existing) ? $this -> db -> insert('tbl_user', $us) : $existing = $existing -> id;
					
					$book['user_id'] = $existing;
					$book['agency'] = $data -> BookingDetails -> ota;
					$book['email'] = $data -> GuestDetails -> emailId;
					$book['hotel_id'] = $data -> BookingDetails -> hotelID;
					$book['booking_number'] = $data -> BookingDetails -> bookingNo;
					$book['name'] = $data -> GuestDetails -> guestName;
					$book['phone'] = $data -> GuestDetails -> mobileNo;
					$book['category'] = 'hotel';
					$data -> CheckinDetails -> paid == "true" ? $book['payment_method'] = 'OTA' : $book['payment_method'] = 'pay@hotel';
					$data -> CheckinDetails -> paid == "true" ? $book['advance'] = $data -> CheckinDetails -> totalAmount : '';
					$book['total_amount'] = $data -> CheckinDetails -> totalAmount;
					$book['tax'] = $data -> CheckinDetails -> taxes;
					$book['check_in'] = date_format(date_create_from_format('d/m/Y', $data -> CheckinDetails -> checkInDateTime), 'Y-m-d');
					$book['check_out'] = date_format(date_create_from_format('d/m/Y', $data -> CheckinDetails -> checkOutDateTime), 'Y-m-d');
					$book['date'] = date_format(date_create_from_format('d/m/Y', $data -> BookingDetails -> bookingDate), 'Y-m-d');
					
					if($data -> BookingDetails -> bookingStatus == "confirmed" || $data -> CheckinDetails -> paid == "true") {
						$book['status'] = 1;
					} else if($data -> BookingDetails -> bookingStatus == "modified") {
						$book['amend'] = 1;
					} else if($data -> BookingDetails -> bookingStatus == "cancelled") {
						$book['cancel'] = 1;
					}
					
					for($i=0;$i<count($data -> Rates -> roomType);$i++) {
					$room_type = $data -> Rates -> roomType[$i] -> id;
					$book['room_id'] = $data -> Rates -> roomType[$i] -> ratePlanId;
					$rates = $this -> Channel_model -> getRates($book['room_id']);
					//$book['room_rate'] = $rates -> price;
					//$book['bed_rate'] = $rates -> room_adult_rate;
					$book['child_rate'] = $rates -> room_child_rate;
					$book['number_of_rooms'] = $data -> Rates -> roomType[$i] -> noOfRooms;
					
					$bk = $this -> Channel_model -> existBook($book);
					empty($bk) ? $this -> Channel_model -> booking('insert', $book) : $this -> Channel_model -> booking('update', $book);
			$booking_id=$this->db->insert_id();
					
					$rooms = $this->Channel_model->rooms_reserve($book['hotel_id'],$room_type,$book['check_in'],$book['check_out']);
					$remaining_room = array_merge($rooms['booked1'][0],$rooms['booked2'][0]);
			$id1=array();
			$id2=array();
			
		
			if(!empty($rooms['total']))
			{
			foreach($rooms['total'][0] as $tot_room)
			{
				$id1[] = $tot_room->id;
			}
			}
		
			if(!empty($remaining_room))
			{
				
			foreach($remaining_room as $rem_room)
			{
				$id2[] = $rem_room->id;
			}
			}
			

			$available_rooms = array_values(array_diff($id1,$id2));
			for($k=0;$k<$book['number_of_rooms'];$k++)
			{
				$data_room['room_number'] = $available_rooms[$k];
				$data_room['booking_id']= $booking_id;
				$data_room['check_in'] =  $book['check_in'];
				$data_room['check_out'] = $book['check_out'];
				$data_room['status'] =  '1';
		
				empty($bk) ? $this->db->insert('tbl_booking_rooms',$data_room) : '';
					}
					}
					
					$bk = $this -> Channel_model -> existBook($book);
					if(!empty($bk)) {
						$det = $this -> Channel_model ->getDetails($book);
						
						for($k=0;$k<count($det);$k++) {
							$r_id[$k] = $det[$k] -> room_id;
						}
						
						for($i=0;$i<count($data -> Rates -> roomType);$i++) {
							$r_type[$i] = $data -> Rates -> roomType[$i] -> ratePlanId;
						}
					}
					$diff=array_diff($r_id,$r_type);
					
					if(count($diff) > 0 && (count($det) > count($data -> Rates -> roomType))) {
					foreach($diff as $d) {
						$b_row = $this -> Channel_model -> getBookRow($d);
						$this -> db -> where('id', $b_row->id) -> delete('tbl_booking');
						$this -> db -> where('booking_id', $b_row -> id) -> delete('tbl_booking_rooms');
					}
					$book['amend'] = 1;
					$this -> Channel_model -> booking('update', $book);
					}
					
					
				}
				}
				
		}
	
	public function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../hotel/slider/'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //$config['max_size']      = '0';
	    //$config['overwrite']     = FALSE;
	     $config['encrypt_name'] = TRUE;

	    return $config;
	}
}
