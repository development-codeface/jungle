<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function bookingsExcel($data, $id)
	{
		if(!empty($data['from'])) {
		$this -> db -> where('check_in >=', $data['from']); }
		
		if(!empty($data['to'])) {
		$this -> db -> where('check_out <=', $data['to']); }
		
		if(!empty($data['b_no'])) {
		$this -> db -> like('booking_number', $data['b_no']); }
		
		if(!empty($data['name'])) {
		$this -> db -> like('name', $data['name']); }
		
		if(!empty($data['source'])) {
			if($data['source'] == 'direct') {
				$this -> db -> where('offline_user !=', 0);
				$this -> db -> where('agency', 0);
			}
			
			if($data['source'] == 'online') {
				$this -> db -> where('user_id !=', 0);
			}
			
			if($data['source'] == 'agency') {
				$this -> db -> where('user_id', 0);
				$this -> db -> where('agency !=', 0);
				$this -> db -> where('agency', $data['agency']);
			} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
			
			if($data['source'] == 'hotel') {
				$this -> db -> where('reservation', 1);
			}
		} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
		

		$this -> db -> where('status', $data['status']);
		$this -> db -> where('hotel_id', $id);
		$this -> db -> group_by('booking_number');
		$this -> db -> where('cancel != 2');
		$this -> db -> order_by('id','desc');
		return $this -> db -> get('tbl_booking') -> result();
	}
	
	function getRooms($num)
	{
		return $this -> db
		-> select_sum('number_of_rooms')
		-> where('booking_number', $num)
		-> where('cancel != 2')
		-> get('tbl_booking')
		-> row();
	}
	
	function countBookings($data, $id)
	{
		if(!empty($data['from'])) {
		$this -> db -> where('check_in >=', $data['from']); }
		
		if(!empty($data['to'])) {
		$this -> db -> where('check_out <=', $data['to']); }
		
		if(!empty($data['b_no'])) {
		$this -> db -> like('booking_number', $data['b_no']); }
		
		if(!empty($data['name'])) {
		$this -> db -> like('name', $data['name']); }
		
		if(!empty($data['source'])) {
			if($data['source'] == 'direct') {
				$this -> db -> where('offline_user !=', 0);
				$this -> db -> where('agency', 0);
			}
			
			if($data['source'] == 'online') {
				$this -> db -> where('user_id !=', 0);
				$this -> db -> where('reservation', 0);
			}
			
			if($data['source'] == 'agency') {
				$this -> db -> where('user_id', 0);
				$this -> db -> where('agency !=', 0);
				$this -> db -> where('agency', $data['agency']);
			} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
			
			if($data['source'] == 'hotel') {
				$this -> db -> where('reservation', 1);
			}
		} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
		
		$this -> db -> where('status', $data['status']);
		$this -> db -> where('hotel_id', $id);
		$this -> db -> group_by('booking_number');
		$this -> db -> where('cancel != 2');
		return $this -> db -> get('tbl_booking') -> num_rows();

	}
	
	function bookings($data, $id, $limit, $start)
	{
		if(!empty($data['from'])) {
		$this -> db -> where('check_in >=', $data['from']); }
		
		if(!empty($data['to'])) {
		$this -> db -> where('check_out <=', $data['to']); }
		
		if(!empty($data['b_no'])) {
		$this -> db -> like('booking_number', $data['b_no']); }
		
		if(!empty($data['name'])) {
		$this -> db -> like('name', $data['name']); }
		
		if(!empty($data['source'])) {
			if($data['source'] == 'direct') {
				$this -> db -> where('offline_user !=', 0);
				$this -> db -> where('agency', 0);
			}
			
			if($data['source'] == 'online') {
				$this -> db -> where('user_id !=', 0);
				$this -> db -> where('reservation', 0);
			}
			
			if($data['source'] == 'agency') {
				$this -> db -> where('user_id', 0);
				$this -> db -> where('agency !=', 0);
				$this -> db -> where('agency', $data['agency']);
			} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
			
			if($data['source'] == 'hotel') {
				$this -> db -> where('reservation', 1);
			}
		} else {
				$this -> db -> where("agency REGEXP '[0-9]+'");
			}
		

		$this -> db -> where('status', $data['status']); 
		$this -> db -> where('hotel_id', $id);
		$this -> db -> group_by('booking_number');
		$this -> db -> where('cancel != 2');
		$this -> db -> order_by('id','desc');
		$this -> db -> limit($limit,$start);
		return $this -> db -> get('tbl_booking') -> result();
	}
	
	function noshow_count($id,$start='',$end='')
	{
		$date = date('Y-m-d');
		
		$query = $this -> db
		-> where('(status = 0 or status = 1)')
		-> where('check_in >=', $start)
		-> where('check_in <=', $end)
		-> where('check_in <=', $date)
		-> where('hotel_id', $id)
		-> group_by('booking_number')
	->where('cancel != 2')
		-> get('tbl_booking')
		-> result();
		
		return count($query);
	}
	
	
	function noshow($id,$start_date='',$end='',$limit,$start)
	{
		$date = date('Y-m-d');
		
		 return $this -> db
		-> where('(status = 0 or status = 1)')
		-> where('check_in >=', $start_date)
		-> where('check_in <=', $end)
		-> where('check_in <=', $date)
		-> where('hotel_id', $id)
		-> group_by('booking_number')
		-> limit($limit, $start)
	->where('cancel != 2')
		-> get('tbl_booking')
		-> result();
	}
	
	
	function getAgency($id)
	{
		return $this -> db
		-> where('hotel_id', $id)
		-> where("agency not like '%bookingwings%'")
		-> get('tbl_agency')
		-> result();
	}
	
	
	function getBookings_count($from, $to, $agency, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', $agency)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> group_by('b.booking_number')
	->where('b.cancel != 2')
		-> get()
		-> num_rows();
	}
	
	
	function getDirect_count($from, $to, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id', 0)
		-> where('b.offline_user !=', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
	->where('b.cancel != 2')
		-> group_by('b.booking_number')
		-> get()
		-> num_rows();
	}
	
	
	function getOnline_count($from, $to, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_user a')
		-> join('tbl_booking b', 'b.user_id = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id !=', 0)
		-> where('b.offline_user', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
	->where('b.cancel != 2')
		-> group_by('b.booking_number')
		-> get()
		-> num_rows();
	}
	
	
	function getOnline_total($from, $to, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_user a')
		-> join('tbl_booking b', 'b.user_id = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id !=', 0)
		-> where('b.offline_user', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
	->where('b.cancel != 2')
		-> group_by('b.booking_number')
		-> get()
		-> result();
		//return $this -> db -> last_query();
	}
	
	
	function getDirect_total($from, $to, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id', 0)
		-> where('b.offline_user !=', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> group_by('b.booking_number')
		-> where('b.cancel !=', 2)
		-> get()
		-> result();
	}
	
	function getOnline($from, $to, $id, $limit, $start)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_user a')
		-> join('tbl_booking b', 'b.user_id = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id !=', 0)
		-> where('b.offline_user', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> where('b.cancel !=', 2)
		-> group_by('b.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
	}
	
	function getDirect($from, $to, $id, $limit, $start)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', 0)
		-> where('b.user_id', 0)
		-> where('b.offline_user !=', 0)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> where('b.cancel !=', 2)
		-> group_by('b.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		//return $this -> db -> last_query();
	}
	
	
	function getBookings_total($from, $to, $agency, $id)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', $agency)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> where('b.cancel !=', 2)
		-> group_by('b.booking_number')
		-> get()
		-> result();
	}
	
	
	function getBookings($from, $to, $agency, $id, $limit, $start)
	{
		return $this -> db
		-> select('a.*, b.*')
		-> from('tbl_offline_user a')
		-> join('tbl_booking b', 'b.offline_user = a.id')
		-> where('b.agency', $agency)
		-> where('b.date >=', $from)
		-> where('b.date <=', $to)
		-> where('b.hotel_id', $id)
		-> where('b.cancel !=', 2)
		-> group_by('b.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		//return $this -> db -> last_query();
	}
	
	
	function booking_count($id)
	{
		$query = $this->db->where('hotel_id', $id)->where('cancel != 2')->get('tbl_booking');

		return $query->num_rows();		
	}
	
	
	function tbl_booking($id,$limit,$start)
	{
		$query = $this->db->where('hotel_id', $id)->order_by('id', 'desc')->limit($limit,$start)->where('cancel != 2')->get('tbl_booking');
		return $query->result();
	}
	
	
	function name($id)
	{
		$query = $this->db->select('first_name, last_name')->where('id', $id)->get('tbl_user');
		return $query->row();
	}
	
	
	function roomtype($id,$hotel)
	{
		$this -> db -> select('a.room_title');
		$this -> db -> from('tbl_hotel_room a');
		$this -> db -> join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		$this -> db -> join('tbl_booking c', 'c.room_id = b.id');
		$this -> db -> where('b.id', $id);
		$this -> db -> where('c.hotel_id = b.hotel_id');
		$this -> db -> where('c.hotel_id', $hotel);
		$this -> db->where('c.cancel != 2');
		$query = $this -> db -> get();
		return $query -> row();
	}
	
	
	function room($id)
	{
		$this -> db -> select('id as room_id, room_title') -> from('tbl_hotel_room') -> where('hotel_id', $id);
		$query = $this -> db-> get();
		return $query -> result();
		
		// $this -> db -> select('a.room_title, b.id');
		// $this -> db -> from('tbl_hotel_room a');
		// $this -> db -> join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		// $this -> db -> where('a.hotel_id', $id);
		// $query = $this -> db-> get();
		// return $query -> result();
	}
	
	
	function room_set($id)
	{
		$this -> db -> select('id') -> from('tbl_hotel_room_settings') -> where('room_id', $id);
		$query = $this -> db-> get();
		return $query -> result();
	}
	
	
	function num_rooms($id, $date)
	{
		$query = $this -> db -> select_sum('number_of_rooms') -> where('room_id', $id) -> where('check_in', $date)->where('cancel != 2') -> get('tbl_booking');
		return $query -> row();
	}
	
	
	function num_total($date, $id)
	{
		$query = $this -> db -> select_sum('number_of_rooms') -> where('check_in', $date) -> where('hotel_id', $id)->where('cancel != 2') -> get('tbl_booking');
		return $query -> row();
	}
	
	
	function num_rooms_between($id, $date)
	{
		$query = $this->db->query("SELECT SUM(number_of_rooms) as rooms FROM tbl_booking WHERE room_id = '$id' AND '$date' BETWEEN  check_in AND check_out and cancel != 2");
		return $query -> row();
	}
	
	
	function num_total_between($date, $id)
	{
		$query = $this->db->query("SELECT SUM(number_of_rooms) as total FROM tbl_booking WHERE hotel_id = '$id' AND '$date' BETWEEN  check_in AND check_out and cancel != 2");
		return $query -> row();
	}
	
	function checkin_rooms($id, $date)
	{
		$query = $this->db->query("SELECT a.* FROM tbl_booking_rooms a JOIN tbl_booking b ON b.id = a.booking_id WHERE b.room_id = '$id' AND (a.status = 2 or a.status = 3) and '$date' = a.check_in  and cancel != 2");
		return count($query -> result());
	}
	
	function checkout_rooms($id, $date)
	{
		$query = $this->db->query("SELECT a.* FROM tbl_booking_rooms a JOIN tbl_booking b ON b.id = a.booking_id WHERE b.room_id = '$id' AND (a.status = 2 or a.status = 3) and '$date' = a.check_out and cancel != 2");
		return count($query -> result());
	}
	
	function checkin_rooms_total($date, $id)
	{
		$query = $this->db->query("SELECT a.* FROM tbl_booking_rooms a JOIN tbl_booking b ON b.id = a.booking_id WHERE b.hotel_id = '$id' AND (a.status = 2 or a.status = 3) and '$date' = a.check_in and cancel != 2");
		return count($query -> result());
	}
	
	function checkout_rooms_total($date, $id)
	{
		$query = $this->db->query("SELECT a.* FROM tbl_booking_rooms a JOIN tbl_booking b ON b.id = a.booking_id WHERE b.hotel_id = '$id' AND (a.status = 2 or a.status = 3) and '$date' = a.check_out and cancel != 2");
		return count($query -> result());
	}
}

?>