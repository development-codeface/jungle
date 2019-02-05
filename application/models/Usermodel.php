<?php

class Usermodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
	function user_detail($username)
    {
    	$this->db->select('*');
        $this->db->where('email',$username);
	    $query = $this->db->get('tbl_user');
		
	    return $query->result();
	   
    }
	function update_profile($id,$data)
	{
		$this->db->where('id', $id);
      	$result= $this->db->update('tbl_user', $data);
		$afftectedRows = $this->db->affected_rows();
			 
    	return $afftectedRows;
	}
	function check_password($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
      	$query = $this->db->get('tbl_user');
		
    	return $query->num_rows();
	}
    function change_password($id,$data)
	{       
		$this->db->where('id', $id);
      	$result= $this->db->update('tbl_user', $data);
		$afftectedRows = $this->db->affected_rows();
			 
    	return $afftectedRows;
	}
	
	function myReviews($id)
	{
		//select a.title, b.title, b.review, b.date, c.state, c.district from tbl_hotel a join tbl_review b join tbl_locations c on a.id = b.hotel_id and c.id=a.state
		$this->db->select('a.title as hotel, a.id, b.id as review_id, b.title, b.review, b.date, c.district, c.state');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_review b', 'a.id=b.hotel_id');
		$this->db->join('tbl_locations c', 'c.id=a.state');
		$this->db->where('b.user_id', $id);
		$query=$this->db->get();
		return $query->result();
	}

	function booked_hotels($id)
	{
		return $this->db->distinct()->select('hotel_id')->where('user_id',$id)->where('status','2')->or_where('status','3')->get('tbl_booking')->result();
	}
	
	function booked_hotels_res($id, $hotel)
	{
		return $this->db->where('user_id',$id)->where('hotel_id',$hotel)->where('status','2')->or_where('status','3')->get('tbl_booking')->row();
	}
	
	function bookingDetailsReservation($id)
	{
		return $this -> db
		-> select('a.title, c.state, c.district, a.star_rating, d.thumb, b.*')
		-> from('tbl_hotel a')
		-> join('tbl_booking b', 'b.hotel_id = a.id')
		-> join('tbl_locations c', 'a.state = c.id')
		-> join('tbl_hotel_image d', 'a.id = d.hotel_id')
		-> where('b.reservation', 1)
		-> where('b.user_id', $id)
		-> group_by('b.booking_number')
		-> order_by('b.id', 'desc')
		-> get()
		-> result();
	}
	
	function bookingDetails($id)
	{
		return $this -> db
		-> select('a.title, c.state, c.district, a.star_rating, d.thumb, b.*')
		-> from('tbl_hotel a')
		-> join('tbl_booking b', 'b.hotel_id = a.id')
		-> join('tbl_locations c', 'a.state = c.id')
		-> join('tbl_hotel_image d', 'a.id = d.hotel_id')
		-> where('b.user_id', $id)
		-> group_by('b.booking_number')
		-> order_by('b.id', 'desc')
		-> get()
		-> result();
	}
	
	function bookingNumber($id)
	{
		return $this -> db
		-> select('a.title, a.logo_img, a.hotel_number, a.phone, a.address, a.mail, b.reservation, c.state, c.district, a.star_rating, d.thumb, b.*')
		-> from('tbl_hotel a')
		-> join('tbl_booking b', 'b.hotel_id = a.id')
		-> join('tbl_locations c', 'a.state = c.id')
		-> join('tbl_hotel_image d', 'a.id = d.hotel_id')
		-> where('b.booking_number', $id)
		-> group_by('b.booking_number')
		-> get()
		-> row();
	}
	
	function bookingRooms($id)
	{
		$this->db->select('a.room_title, c.*, b.normal_allowed_adults,b.normal_allowed_kids,b.services,b.conditions, d.*');
		$this->db-> from('tbl_hotel_room a');
		$this->db-> join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		$this->db-> join('tbl_booking c', 'b.id = c.room_id');
		$this->db-> join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this->db->where('c.booking_number', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function bookingRooms_pack($id)
	{
		$this->db->select('a.room_title, c.*, b.normal_allowed_adults,b.normal_allowed_kids,b.services,b.conditions, d.*');
		$this->db-> from('tbl_hotel_room a');
		$this->db-> join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this->db-> join('tbl_booking c', 'b.id = c.room_id');
		$this->db-> join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this->db->where('c.booking_number', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
}

?>