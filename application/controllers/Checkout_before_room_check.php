<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('Hotels_model');
		$this->load->model('Hotel_detail_model');
		$this->load->model('Room_detail_model');
		$this->load->model('Checkout_model');
		
		
	 }
	 
	function checkout_submit()
	{
		
	}
	
	/* function ajax_chekout()
	{
		 $datas['each_room_amount']  = $this->input->get('room_basic_price');
		 $datas['room_id']  = array_filter($this->input->get('room_id'));
		 $datas['no_of_rooms'] = array_filter($this->input->get('no_of_rooms'));
		 $datas['hotel_id'] = $this->input->get('hotel_id');
		 $datas['total_amount'] = $this->input->get('total_amount');
		 $datas['category'] = $this->input->get('category');
		 $datas['check_out'] = $this->input->get('check_out');
		 $datas['check_in'] = $this->input->get('check_in');
		 
		 $datas['details']=$this->Checkout_model->detailsById($this->input->get('hotel_id'));
		 $datas['image']	= $this->Checkout_model->imagesById($this->input->get('hotel_id'));
		
			 $this->load->view('checkout/ajax_checkout',$datas);
    }
	 */
	public function index()
	{
		
		$datas['ck_data']=$this->input->get('ck_data');
		
		 
		 $dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->get('hotel'));
		 $datas['hotel_id']=$this->encrypt->decode($dec_hotel);
		 $datas['package_id']=$this->input->get('s_id');
		
		 $datas['category'] = $this->input->get('source');
		 $datas['check_out'] = $this->input->get('check_out');
		 $datas['check_in'] = $this->input->get('check_in');
		 
		 $datas['details']=$this->Checkout_model->detailsById($datas['hotel_id']);
		 $datas['image']	= $this->Checkout_model->imagesById( $datas['hotel_id']);
		 
		   $this->load->view('checkout/checkout',$datas);
		
	}
	
	
	public function payment()
	{
		
		if(!empty($this->session->userdata['log_username']))		
		{
////  PayU code start  ////

		$datas['MERCHANT_KEY'] = "3eRhIb";
		$datas['SALT'] = "TdQpJpk1";
		$PAYU_BASE_URL = "https://secure.payu.in";
		$datas['firstname'] = '';
		$datas['lastname'] = '';
		$datas['email'] = '';
		$datas['phone'] = '';
		$datas['txnid'] = '';
		$datas['request'] = '';
		$datas['arrival'] = '';
		$datas['pickup'] = '';
			
		if (isset($_POST)) {
			$datas['firstname'] = $this->input->post('first_name');
			$datas['lastname'] = $this->input->post('last_name');
			$datas['email'] = $this->input->post('email');
			$datas['phone'] = $this->input->post('phone');
			$datas['txnid'] = $this->input->post('txnid');
			$datas['request'] = $this->input->post('request');
			$datas['arrival'] = $this->input->post('arrival');
			$datas['pickup'] = $this->input->post('pickup');
		}
		
		$action = '';

		$posted = array();
		
		if(!empty($_POST)) {
		    
		  foreach($_POST as $key => $value) {    
		    $posted[$key] = $value; 
			
		  }
		}

		$formError = 0;

		if(empty($posted['txnid'])) {
		  // Generate random transaction id
		  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		} else {
		  $txnid = $posted['txnid'];
		}
//print_r($posted); exit;
		$hash = '';
		// Hash Sequence
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

		if(empty($posted['hash']) && sizeof($posted) > 0) {

		  if(
		          empty($posted['key'])
		          || empty($posted['txnid'])
		          || empty($posted['amount'])
		          || empty($posted['first_name'])
		          || empty($posted['email'])
		          || empty($posted['phone'])
		          || empty($posted['productinfo'])
		          || empty($posted['surl'])
		          || empty($posted['furl'])
				  //|| empty($posted['service_provider'])
		  ) {
		  	
		    $formError = 1;
		  } else {
		  	
		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			$hashVarsSeq = explode('|', $hashSequence);
		    $hash_string = '';	
			foreach($hashVarsSeq as $hash_var) {
		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		      $hash_string .= '|';
		    }

		    $hash_string .= $datas['SALT'];


		    $hash = strtolower(hash('sha512', $hash_string));
		    
		    $action = $PAYU_BASE_URL . '/_payment';
		    //$action = 'https://info.payu.in/merchant/postservice.php?form=1';

		   // var_dump($hash,$action);
		  }
		} elseif(!empty($posted['hash'])) {
			
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		  //$action = 'https://info.payu.in/merchant/postservice.php?form=1';
		}
		//var_dump($hash,$action);
		$datas['txnid'] = $txnid;
		$datas['hash'] = $hash;
		$datas['action'] = $action;

////  PayU code end  ////

			
			$datas['ck_data']=$this->input->get('ck_data');
		
		 
		 $dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->get('hotel'));
		 $datas['hotel_id']=$this->encrypt->decode($dec_hotel);
		
		 $datas['category'] = $this->input->get('source');
		 $datas['check_out'] = $this->input->get('check_out');
		 $datas['check_in'] = $this->input->get('check_in');
		 
		 $datas['details']=$this->Checkout_model->detailsById($datas['hotel_id']);
		 $datas['image']	= $this->Checkout_model->imagesById( $datas['hotel_id']);
		 
		$datas['user_details']=$this->Checkout_model->detailsByUser($this->session->userdata['log_username']);
		
		//$user['id']= $data['user_details'][0]->id;
		//$this->session->set_userdata('userid',$user);
		$this->session->set_userdata($datas);

		$this->load->view('checkout/payment',$datas);
		}
		else
		{
			redirect(base_url());
		}
	}
	
	
	function success()
	{
		$ses = $this->session->all_userdata(); 
		$query = 0;
		if($query=='0')
		{
////  PayU Success start ////

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="TdQpJpk1";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	       $msg = "Invalid Transaction. Please try again";
		   $this->session->set_flashdata('msg', $msg);
		   redirect('checkout/failure');
		   exit;
		   }
	   else {
           	   
          $msg = "<h3>Thank You. Your order status is ". $status .".</h3>";
          $msg.= "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          $msg.= "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
		  
		  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$msg.'</div>');
		   }   

////  PayU Success end ////

			 $data['name'] = $ses['firstname']." ".$ses['lastname'];
			 $data['email'] = $ses['email'];
			 $data['phone'] = $ses['phone'];
			 $data['request'] = $ses['request'];
			 $data['arrival'] = $ses['arrival'];
			 $data['pickup'] = $ses['pickup'];
			 
		 $datas['ck_data']=$this->input->get('ck_data');
		
		 $dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->get('hotel'));
		 $data['hotel_id']=$this->encrypt->decode($dec_hotel);
		
		 $data['category'] = $this->input->get('source');
		 $data['check_out'] = $this->input->get('check_out');
		 $data['check_in'] = $this->input->get('check_in');
		 $data['package_id'] = $this->input->get('s_id');
		 
		 //$diff = abs(strtotime($data['check_in']) - strtotime($data['check_out'])); 
		 $days = floor((strtotime($data['check_out']) - strtotime($data['check_in']))/(60*60*24));
		
		$datas['user_details']=$this->Checkout_model->detailsByUser($this->session->userdata['log_username']);
		
		$data['offline_user'] =  '';
		$data['agency'] =  '';
		$data['reservation'] =  '0';
		$data['user_id'] =  $datas['user_details'][0]->id;
		$data['booking_number'] =  rand();
		$data['extra_bed'] =  '';
		$data['bed_rate'] =  '';
		$data['child_rate'] =  '';
		$data['number_of_childrens'] =  '';
		$data['payment_method'] =  'PayUMoney';	
			
		
		$total_amount='';
		for($j=0;$j<count($datas['ck_data']);$j++)
		{
		    $explode_data =explode('|',$datas['ck_data'][$j]);
			$rooms_id = $explode_data[1];
			$data['number_of_rooms'] = $explode_data[0];
			
			if($data['category']=='hotel')
			{
			$room_seting=$this->Checkout_model->roombyid($rooms_id);
			}
			else
			{
			$room_seting=$this->Checkout_model->Package_roombyId($rooms_id);
			}
			
			//calculate room rate
				$data['room_id'] = $rooms_id;
				$offer_percentage= $this->Room_detail_model->hotelofferById($data['hotel_id']);
				$agency_rate=$this->Room_detail_model->hotelAgencyById($data['hotel_id']);
				$agency_commission=$this->Room_detail_model->hotelAgencyCommissionById($data['hotel_id']);					
				$room_amounts = $room_seting[0]->price;
				 ////////offer price calculation/////////////
				if(!empty($offer_percentage))
				{
					$offer_percentage[0]->offer;
					$room_amounts = $room_amounts - (($room_amounts* $offer_percentage[0]->offer)/100);
				}					 		
				/////////agency price calculation ////////			
				if(!empty($agency_rate))
				{
					if($data['category']=='hotel')
					{
					$tariff =  $agency_rate[0]->room_tariff;
					}
					else
					{
					$tariff =  $agency_rate[0]->package_tariff;
					}
					$last_string =  substr($tariff,-1);
					if($last_string=='%')
					{
						$room_amounts = $room_amounts - ($room_amounts*$tariff)/100;
					}
					else
					{
						$room_amounts = $room_amounts -  $tariff;
					}						
				}	
				$room_amounts = round($room_amounts);
			 $room_rate_total=	$room_amounts*$data['number_of_rooms']*$days	;		
			$total_amount+=$room_rate_total;
			$data['room_rate'] =  $room_amounts;
		}
		  
		//total number of rooms
		$total_rooms=array_sum(array_filter($datas['ck_data'])); 
			
		////////commision calculation///////
			if(!empty($agency_commission))
			{			
				if($data['category']=='hotel')
				{
				 $commision_rate = $agency_commission[0]->commision;
				 $last_string =  substr($agency_commission[0]->commision,-1);
				 if($last_string=='%') {
				 $data['commision'] =  ($agency_commission[0]->commision/100) * $total_rooms;
				 } else {
				 $data['commision'] =  $agency_commission[0]->commision * $total_rooms;
				 }
				}
				else
				{
				$commision_rate = $agency_commission[0]->package_commision;
				$last_string =  substr($agency_commission[0]->package_commision,-1);
				if($last_string=='%') {
					$data['commision'] =  ($agency_commission[0]->package_commision/100) * $total_rooms;
					} else {
					$data['commision'] =  $agency_commission[0]->package_commision * $total_rooms;
					}
				}
				
			}
			else
			{ 
				$commision_rate ='';
				$data['commision'] ='';
			}
			
			$room_tax_amounts='';
			if($data['category']=='hotel')
			{	$t_amount='';
				if($room_seting[0]->tax_applicable==0)
				{	
					$tax = $this->Room_detail_model->tax_amount_off($data['hotel_id']);
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
					$room_tax_amounts = (($total_amount+$data['commision'])*$t_amount)/100;
				}
				else
				{
					$tax = $this->Room_detail_model->tax_amount($data['hotel_id']);
					foreach($tax as $tax_amount)
					{
						$t_amount+=$tax_amount->tax_amount;
					}
					$room_tax_amounts = (($total_amount+$data['commision'])*$t_amount)/100;
				} 
			}
			
		$data['total_amount'] = $total_amount;
		$data['discount'] =  '';
		$data['advance'] =  '';
		$data['voucher'] =  '';
		$data['tax'] =  $room_tax_amounts;
		$data['payment'] = round($total_amount+$room_tax_amounts);

		$data['date'] =  date('Y-m-d h:i:s');
		$data['status'] =  '1';
		$data['cancel'] =  '0';
		
	
		for($i=0;$i<count($datas['ck_data']);$i++)
		{
		    $explode_data =explode('|',$datas['ck_data'][$i]);
			$rooms_id = $explode_data[1];
			$data['number_of_rooms'] = $explode_data[0];
			
			if($data['category']=='hotel')
			{
			$room_seting=$this->Checkout_model->roombyid($rooms_id);
			}
			else
			{
			$room_seting=$this->Checkout_model->Package_roombyId($rooms_id);
			}
			
			$data['wifi']=$room_seting[0]->free_wifi;
			$data['breakfast']=$room_seting[0]->breakfast;
			//calculate room rate
				$data['room_id'] = $rooms_id;
				$offer_percentage= $this->Room_detail_model->hotelofferById($data['hotel_id']);
				$agency_rate=$this->Room_detail_model->hotelAgencyById($data['hotel_id']);
				$agency_commission=$this->Room_detail_model->hotelAgencyCommissionById($data['hotel_id']);					
				$room_amounts = $room_seting[0]->price;
				 ////////offer price calculation/////////////
				if(!empty($offer_percentage))
				{
					$offer_percentage[0]->offer;
					$room_amounts = $room_amounts - (($room_amounts* $offer_percentage[0]->offer)/100);
				}					 		
				/////////agency price calculation ////////			
				if(!empty($agency_rate))
				{
					if($data['category']=='hotel')
					{		
					$tariff =  $agency_rate[0]->room_tariff;
					}
					else
					{
						$tariff =  $agency_rate[0]->package_tariff;
					}
					$last_string =  substr($tariff,-1);
					if($last_string=='%')
					{
						$room_amounts = $room_amounts - ($room_amounts*$tariff)/100;
					}
					else
					{
						$room_amounts = $room_amounts -  $tariff;
					}						
				}	
				$room_amounts = round($room_amounts);
			 $room_rate_total=	$room_amounts*$data['number_of_rooms']*$days	;		
			$total_amount+=$room_rate_total;
			$data['room_rate'] =  $room_amounts;
			
			$this->db->insert('tbl_booking',$data);
			
			$rooms = $this->Checkout_model->room_reserve($data['hotel_id'],$room_seting[0]->room_id);
			
			$remaining_room = array_merge($rooms['booked1'],$rooms['booked2'] );
			
			$id1=array();
			$id2=array();
			
		
			if(!empty($rooms['total']))
			{
			foreach($rooms['total'] as $tot_room)
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
		
			$booking_id=$this->db->insert_id();
			
			for($k=0;$k<$data['number_of_rooms'];$k++)
			{
				
				$data_room['room_number'] = $available_rooms[$k];
				$data_room['booking_id']= $booking_id;
				$data_room['check_in'] =  $data['check_in'];
				$data_room['check_out'] = $data['check_out'];
				$data_room['status'] =  '1';
		
				$this->db->insert('tbl_booking_rooms',$data_room);
			} 	
			
		}
		
		}
		
		
		 
				$datas_hotel['details']=$this->Checkout_model->detailsById($data['hotel_id']);
				$datas_image['image']	= $this->Checkout_model->imagesById($data['hotel_id']);
				$datas_booking['booking_detail'] = $this->Checkout_model->booking_detail($booking_id);
				if($datas_booking['booking_detail']->category=='hotel')
				{
					$datas_room_booking['booking_room_detail'] = $this->Checkout_model->booking_room_detail($datas_booking['booking_detail']->booking_number);
					
				}
				else
				{
					$datas_room_booking['booking_room_detail'] = $this->Checkout_model->booking_room_detail_pack($datas_booking['booking_detail']->booking_number);
					
				}
				
				$this->load->library('email');
				$mydata = array('user' =>$datas['user_details'] ,'hotel' => $datas_hotel['details'], 'image' => $datas_image['image'], 'booking_details' =>$datas_booking['booking_detail'] , 'room_details' =>$datas_room_booking['booking_room_detail']);
				
				$message_to_user = $this->load->view('main/checkout_email', $mydata, true);
				$this->email->set_mailtype('html');
				$this->email->from('info@crantia.com', 'Bookingwings');
				$this->email->to($this->session->userdata['log_username']); 
				$this->email->subject('New Booking - '.$datas_booking['booking_detail'] -> booking_number);
				$this->email->message($message_to_user);
				$this->email->send();
				
				$message_to_admin = $this->load->view('main/checkout_email_admin', $mydata, true);
				$this->email->set_mailtype('html');
				$this->email->from('info@crantia.com', 'Bookingwings');
				$this->email->to('info@amanhts.com'); 
				//$this->email->to($this->session->userdata['log_username']); 
				$this->email->subject('New Booking - '.$datas_booking['booking_detail'] -> booking_number);
				$this->email->message($message_to_admin);
				$this->email->send();
				
				$message_to_hotel = $this->load->view('main/checkout_email_hotel', $mydata, true);
				$this->email->set_mailtype('html');
				$this->email->from('info@crantia.com', 'Bookingwings');
				//$this->email->to($datas_hotel['details']->mail); 
				$this->email->to('info@amanhts.com'); 
				//$this->email->to($this->session->userdata['log_username']); 
				$this->email->subject('New Booking - '.$datas_booking['booking_detail'] -> booking_number);
				$this->email->message($message_to_hotel);
				$this->email->send();
				
		
		if($this->db->affected_rows())
		{
			redirect('success');
		}
				
		
		
	}
	
	
	
	function failure()
	{
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="TdQpJpk1";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       $data['msg'] = "Invalid Transaction. Please try again";
		   }
	   else {

         $data['msg'] = "<h3>Your order status is ". $status .".</h3>";
         $data['msg'].= "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment later.</h4>";
          
		 } 
		
		$this->load->view('checkout/failure', $data);
	}
	
}

