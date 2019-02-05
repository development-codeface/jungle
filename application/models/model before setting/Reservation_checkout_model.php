<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_checkout_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function detailsById($id)
	{
		$this->db->select('a.address,a.hotel_number, a.id as hotel_id, a.place, a.star_rating,
		c.free_parking,c.free_wifi, a.title, b.state, b.district,a.phone,a.logo_img,a.phone');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_locations b','a.state=b.id');
		$this->db->join('tbl_hotel_facilities c','a.id=c.hotel_id');
		$this->db->where('a.id', $id)->where('a.status', 1);
		$query= $this->db->get();
		
		return $query->row();
	}
	
	function imagesById($id)
	{
		$query=$this->db->where('hotel_id', $id)->get('tbl_hotel_image');
		return $query->result();
	}
	function roombyid($room_id)
	{
		
		$this->db->select('a.room_title,c.free_wifi,c.breakfast,b.normal_allowed_adults,b.normal_allowed_kids,b.price,b.tax_applicable,b.id,b.services, b.conditions,a.id as room_id');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
		$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
		$this->db->where('b.id',$room_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function detailsByUser($email)
	{
		$this->db->select('*');		
		$this->db->where('email',$email);
		$query= $this->db->get('tbl_user');
		return $query->result();
	}
	
	
	function settingsByRoom($id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= ($this->session->userdata['datahere']['check_in'] );
		    $checkout =$this->session->userdata['datahere']['check_out'];
		
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			//$this->db->or_where('("'.$checkout.'"  BETWEEN valid_from AND valid_upto )');	
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		//$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		}
		$this->db->where('room_id', $id);
		$query=$this->db->get('tbl_hotel_room_settings');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	function Package_settingsByRoom($id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= ($this->session->userdata['datahere']['check_in'] );
		    $checkout =$this->session->userdata['datahere']['check_out'];
		
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and  ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			//$this->db->or_where('("'.$checkout.'"  BETWEEN valid_from AND valid_upto )');	
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and  ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		//$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		}
		$this->db->where('room_id', $id);
		$query=$this->db->get('tbl_ayurveda_rooms');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	
	function Package_roombyId($room_id)
	{
		
		$this->db->select('a.room_title,c.free_wifi,c.breakfast,d.title,b.normal_allowed_adults,b.services, b.conditions,b.price,b.tax_applicable,b.id,a.id as room_id');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_ayurveda_rooms b','a.id=b.room_id');
		
		$this->db->join('tbl_ayurveda d','d.id=b.ayurveda_id');
		$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
		$this->db->where('b.id',$room_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function room_reserve($hotel,$id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		$this->db->select('a.room_number as id');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('d.id',$id);
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin=date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d');
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d');
		
			$this->db->where('(a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'" or a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'")');	
		}
		else
		{
			$this->db->where('(a.check_in BETWEEN "'. $date. '" and "'. $next_day.'" or a.check_out BETWEEN "'. $date. '" and "'. $next_day.'")');
			//$this->db->where('("'.$date.'"  BETWEEN a.check_in AND a.check_out )');	
		}
		$q1 = $this->db->get();
		$rooms['booked1']= $q1->result();
		
		
		
		$this->db->select('a.room_number as id');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('d.id',$id);
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin=date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d');
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d');
		
			$this->db->where('(a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'" or a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'")');	
		}
		else
		{
			$this->db->where('(a.check_in BETWEEN "'. $date. '" and "'. $next_day.'" or a.check_out BETWEEN "'. $date. '" and "'. $next_day.'")');
			//$this->db->where('("'.$date.'"  BETWEEN a.check_in AND a.check_out )');	
		}
		$q2 = $this->db->get();
		$rooms['booked2']= $q2->result();
		
		
		$booked_rooms_count =  count($q1->result()) + count($q2->result());
		
		
		
		$this->db->select('a.id as id');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$id);
		//$this->db->where('a.status','1');
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d');
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d');
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('(("'.$checkin.'"  NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$checkout.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
		}
		else
		{
			$this->db->where('(("'.$date.'" NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$next_day.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
			
		}
		$query = $this->db->get();
		$rooms['total']=($query->result());
		
		$total_rooms = count($query->result());
		
		
		//print_r($rooms['total']); exit;
		
		
		return $rooms;
		
		
	}
	
		function booking_detail($id)
	{
		$this->db->select('booking_number')->where('id',$id);
		$query_id = $this->db->get('tbl_booking');
		$id_num =  $query_id->row();
		
		$this -> db-> select('a.title,a.logo_img, c.state, c.district, a.star_rating, d.thumb, b.*');
		$this -> db-> from('tbl_hotel a');
		$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
		$this -> db-> join('tbl_locations c', 'a.state = c.id');
		$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
		$this -> db	-> where('b.booking_number', $id_num->booking_number);
		$this -> db	-> group_by('b.booking_number');
		$get_query = $this -> db	-> get();
		return $get_query-> row();
		
		
	}
	
	function booking_room_detail($booking_number)
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults, b.services, b.conditions,d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('c.booking_number', $booking_number);
		$room_query = $this -> db->	 get();
		return $room_query-> result();
	}
	function booking_room_detail_pack($booking_number)
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults, b.services, b.conditions, d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('c.booking_number', $booking_number);
		$room_query = $this -> db->	 get();
		return $room_query-> result();
	}
	
	
		
		function room_details_byid($id)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_hotel_room a');
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	
	
			function Package_check($id)
	{
		$this -> db-> select('b.name,a.days');
		$this -> db->	 from('tbl_ayurveda a');
		$this -> db->	 join('tbl_sub_category b', 'a.category = b.id');
		$this -> db->	 where('a.id', $id);
		$room_query = $this -> db->	 get();
		//echo $this->db->last_query();
		return $room_query-> result();
	}
	

}

?>