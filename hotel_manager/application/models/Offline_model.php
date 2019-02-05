<?php

class Offline_model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function exists($num, $in, $out) {
		return $this -> db
		-> select('*')
		-> from('tbl_booking a')
		-> join('tbl_booking_rooms b', 'a.id = b.booking_id')
		-> where('b.room_number', $num)
		//-> where('b.check_in >=', $in)
		//-> where('b.check_out <=', $out)
		-> where('b.status !=', 3)
		-> where('a.cancel !=', 2)
		-> where('(("'.$in.'" BETWEEN b.check_in and b.check_out) or ("'.$out.'" BETWEEN b.check_in and b.check_out)) and (b.check_out != "'.$in.'")')
		-> get()
		-> num_rows();
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
		$this -> db-> select('a.room_title, e.title as package,c.*, b.normal_allowed_adults, b.services, b.conditions,d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 join('tbl_ayurveda e', 'e.id = c.package_id');
		$this -> db->	 where('c.booking_number', $booking_number);
		$room_query = $this -> db->	 get();
		return $room_query-> result();
	}
	
	function booking_detail($id)
	{
		
		$this -> db-> select('a.title,a.logo_img, c.state, c.district, a.star_rating, d.thumb, b.*');
		$this -> db-> from('tbl_hotel a');
		$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
		$this -> db-> join('tbl_locations c', 'a.state = c.id');
		$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
		$this -> db	-> where('b.booking_number', $id);
		$this -> db	-> group_by('b.booking_number');
		$get_query = $this -> db	-> get();
		return $get_query-> row();
		
		
	}
	
	function booking_detail_food($id)
	{
		
		$this -> db-> select('a.title,e.amount as food, a.logo_img, c.state, c.district, a.star_rating, d.thumb, b.*');
		$this -> db-> from('tbl_hotel a');
		$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
		$this -> db-> join('tbl_locations c', 'a.state = c.id');
		$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
		$this -> db	-> join('tbl_booking_foodplan e', 'e.booking_id = b.booking_number');
		$this -> db	-> where('b.booking_number', $id);
		$this -> db	-> group_by('b.booking_number');
		$get_query = $this -> db	-> get();
		return $get_query-> row();
		
		
	}
	
	function detailsById($id)
	{
		$this->db
		->select('a.hotel_number, a.id as hotel_id, a.place, a.star_rating,
		c.free_parking,c.free_wifi, a.title, b.state, b.district,a.phone')
		->from('tbl_hotel a')
		->join('tbl_locations b','a.state=b.id')
		->join('tbl_hotel_facilities c','a.id=c.hotel_id')
		->where('a.id', $id)->where('a.status', 1);
		$query= $this->db->get();
		
		return $query->row();
	}
	
	function imagesById($id)
	{
		$query=$this->db->where('hotel_id', $id)->get('tbl_hotel_image');
		return $query->result();
	}
    
    function block($num, $date)
	{
		return $this -> db
		-> select('status')
		-> where('room_number', $num)
		-> where('"'.$date.'" BETWEEN valid_from AND valid_to')
		-> get('tbl_hotel_roomnumber')
		-> row();
	}
	
	function block_dates($num, $in, $out)
	{
		return $this -> db
		-> select('status')
		-> where('room_number', $num)
		-> where('(("'.$in.'" BETWEEN valid_from AND valid_to) OR ("'.$out.'" BETWEEN valid_from AND valid_to))')
		-> get('tbl_hotel_roomnumber')
		-> row();
	}
	
	function agency($id)
	{
		$query = $this->db->select('id, agency')->where('hotel_id', $id)->not_like('agency', 'bookingwings')->get('tbl_agency');
		return $query -> result();
	}
	
   	function room_available($check_in,$check_out,$hotel)
	{
		$this->db->select('*');
		$this->db->where( 'check_in',$check_in)->where('check_out',$check_out);
        $query_res = $this->db->get('tbl_booking_rooms');
        $result =$query_res->result(); 
        return count($result);
	}
	
    function datewise_rooms($date,$room_num_id)
    {
        $this->db->select('*');
		$this->db->where( 'check_in',$date)->where('room_number',$room_num_id);
        $query_res = $this->db->get('tbl_booking_rooms');
        $result =$query_res->result(); 
        return count($result);
    }
	
	function check_rooms($date,$room_num_id)
	{
		$this->db->select('a.status, b.cancel');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b', 'b.id = a.booking_id');
		$this->db->where('a.room_number',$room_num_id);
		$this->db->order_by('b.id','desc');
		$this->db->where('(a.check_in BETWEEN "'. $date. '" and "'. $date.'" or a.check_out BETWEEN "'. $date. '" and "'. $date.'")');		
        $query_res = $this->db->get();
		
		//echo $this->db->last_query();  
        $result =$query_res->result(); 
		
        return ($result);
	}
	
	function booked_room_numbers($check_in,$check_out,$hotel_id,$room_id)
	{
		$this->db->distinct();
		$this->db->select('tbl_hotel_roomnumber.room_number');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_booking','tbl_booking.id=tbl_booking_rooms.booking_id');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.id=tbl_booking.room_id');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_booking.hotel_id');
		
		$this->db->where('(tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'") and (tbl_booking_rooms.check_out != "'.$check_in.'")');		
        $this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status','0');
	    $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return ($result);
	}
	
	function available_room_numbers($check_in,$check_out,$hotel_id,$room_id,$roomnumber)
	{
	
		$date = $check_in;
		while (strtotime($check_in) <= strtotime($check_out)) {
		
		$this->db->distinct();
		$this->db->select('tbl_booking_rooms.room_number as id');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		##
		$this->db->join('tbl_booking', 'tbl_booking.id=tbl_booking_rooms.booking_id');
		//$this->db->where('(((tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'")) and (tbl_booking_rooms.check_out != "'.$check_in.'"))');
		//$this->db->where('((("'. $check_in. '" BETWEEN tbl_booking_rooms.check_in and tbl_booking_rooms.check_out or "'. $check_out.'" BETWEEN tbl_booking_rooms.check_in and tbl_booking_rooms.check_out)) and (tbl_booking_rooms.check_out != "'.$check_in.'"))');
		
		$this->db->where('((("'. $date. '" BETWEEN tbl_booking_rooms.check_in and tbl_booking_rooms.check_out)) and (tbl_booking_rooms.check_out != "'.$check_in.'"))');
		
		$this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status!=','3')->where('tbl_booking_rooms.room_number=',$roomnumber);
		$this->db->where('tbl_booking.cancel !=', 2);
	    $query_res = $this->db->get();
		
        $result =$query_res->result();
		$count =  count($result);
		
		if($count > 0) {
			return $count;
			break;
		} else if($check_out == $date) {
			return $count;
			break;
		}
		
		$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
		}
		
	}

	function checkin_room_numbers($check_in,$check_out,$hotel_id,$room_id)
	{
		$this->db->distinct();
		$this->db->select('tbl_hotel_roomnumber.room_number');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_booking','tbl_booking.id=tbl_booking_rooms.booking_id');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.id=tbl_booking.room_id');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_booking.hotel_id');
		
		$this->db->where('(tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'")');		
        $this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status','2');
	    $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return ($result);
	}
	
	function checkout_room_numbers($check_in,$check_out,$hotel_id,$room_id)
	{
		$this->db->distinct();
		$this->db->select('tbl_hotel_roomnumber.room_number');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_booking','tbl_booking.id=tbl_booking_rooms.booking_id');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.id=tbl_booking.room_id');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_booking.hotel_id');
		
		$this->db->where('(tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'")');		
        $this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status','3');
	   $this->db->order_by('tbl_hotel_roomnumber.room_number','asc');
	    $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return ($result);
	}
	function reserved_room_numbers($check_in,$check_out,$hotel_id,$room_id)
	{
		$this->db->distinct();
		$this->db->select('tbl_hotel_roomnumber.room_number');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_booking','tbl_booking.id=tbl_booking_rooms.booking_id');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.id=tbl_booking.room_id');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_booking.hotel_id');
		
		$this->db->where('(tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'")');		
        $this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status','1');$this->db->where('tbl_booking.cancel !=', 2);
	    $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return ($result);
	}
	function packages($cin,$cout,$id)
	{
		return $this -> db
		-> select('a.id, a.title')
		-> from('tbl_ayurveda a')
		-> join('tbl_ayurveda_rooms b','a.id = b.ayurveda_id')
		-> where('a.hotel_id',$id)-> where('(("'.$cin.'"  BETWEEN b.valid_from AND b.valid_upto ) or("'.$cout.'"  BETWEEN b.valid_from AND b.valid_upto))')
		//-> where('(b.valid_from BETWEEN "'. $cin. '" and "'. $cout.'" or b.valid_upto BETWEEN "'. $cin. '" and "'. $cout.'")')
		//-> where('(b.valid_from BETWEEN "'. $cin. '" and "'. $cout.'") or (b.valid_upto BETWEEN "'. $cin. '" and "'. $cout.'")')
		-> group_by('a.title')
		-> get()
		-> result();
		
		
		//return $this -> db -> last_query();
	}
	
	function getCommision($hotel,$id)
	{
		$this->db->select('*');
		$this->db->from('tbl_agency');
		$this->db->where('id',$id)->where('hotel_id',$hotel);
		$query = $this->db->get();
		//return $this -> db -> last_query();
		return $query->result();
		
	}
	
	function tax_amount_off($hotel)
	{
		$this->db->select('*');
        $this->db->from( 'tbl_tax');
		$this->db->where( 'hotel_id',$hotel)->where('season','off_season');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	
	function tax_amount($hotel)
	{
		$this->db->select('*');
        $this->db->from( 'tbl_tax');
		$this->db->where( 'hotel_id',$hotel)->where('season','season');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	
	
	function food_plan($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
		$query = $this->db->get('tbl_foodplan');
		return $query->result();
		
	}
	
}

?>