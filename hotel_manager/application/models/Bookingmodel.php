<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookingmodel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function updateRoom($booking, $bk_num, $id){
	$this->db->set('number_of_rooms', $booking['number_of_rooms']);
	$this->db->set('extra_bed', $booking['extra_bed']);
	$this->db->set('number_of_childrens', $booking['number_of_childrens']);
	$this->db->where('booking_number', $bk_num);
	$this->db->where('room_id', $id);
	$this->db->update('tbl_booking');
	}
	
	function updateNewRoom($booking, $bk_num){
	$this->db->set('total_amount', $booking['total_amount']);
	$this->db->set('tax', $booking['tax']);
	$this->db->where('booking_number', $bk_num);
	$this->db->update('tbl_booking');
	}
	
	function checkExist($room,$id) {
		return $this -> db
		-> where('room_id',$room)
		-> where('booking_number', $id)
		-> get('tbl_booking')
		-> num_rows();
	}
	
	function getSetting_pack($id) {
		return $this -> db
		-> where('id', $id)
		-> get('tbl_ayurveda_rooms')
		-> row();
	}
	
	function getSetting($id) {
		return $this -> db
		-> where('id', $id)
		-> get('tbl_hotel_room_settings')
		-> row();
	}
	
	function tax($id) {
		$app = $this -> db
		-> where('id', $id)
		-> get('tbl_hotel_room_settings')
		-> row();
		//return $this -> db -> last_query();
		if($app -> tax_applicable == 1) {
			return $this -> db
			-> select_sum('tax_amount')
			-> where('hotel_id', $app -> hotel_id)
			-> where('season', 'season')
			-> get('tbl_tax')
			-> row();
		} else {
			return $this -> db
			-> select_sum('tax_amount')
			-> where('hotel_id', $app -> hotel_id)
			-> where('season', 'off_season')
			-> get('tbl_tax')
			-> row();
		}
	}
	
	function tax_pack($id) {
		$app = $this -> db
		-> where('id', $id)
		-> get('tbl_ayurveda_rooms')
		-> row;
		
		if($app -> tax_applicable == 1) {
			return $this -> db
			-> select_sum('tax_amount')
			-> where('hotel_id', $app -> hotel_id)
			-> where('season', 'season')
			-> get('tbl_tax')
			-> row();
		} else {
			return $this -> db
			-> select_sum('tax_amount')
			-> where('hotel_id', $app -> hotel_id)
			-> where('season', 'off_season')
			-> get('tbl_tax')
			-> row();
		}
	}
	
	function details_other($book,$id) {
		return $this -> db
		-> where('id !=',$id)
		-> where('booking_number',$book)
		-> get('tbl_booking')
		-> row();
	}
	
	function tbl_booking($id) {
		return $this -> db
		-> where('id', $id)
		-> get('tbl_booking')
		-> row();
	}
	
	function guest_update($id, $data) {
		$this -> db
		-> where('booking_number', $id)
		-> update('tbl_booking', $data);
		return $this -> db -> affected_rows();
	}

 function get_amend_number($id,$limit,$start,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user, category')->where('hotel_id',$id);
	$this->db->where('(status = 0 or status = 1)');
	$this->db->order_by('id','desc');
	$this->db->limit($limit,$start);
	$this->db->where('amend',2);
		if(!empty($num))
		{ $this->db->like('booking_number', $num); }
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
	
   }
	
	function amend_count($id,$num)
	{
		$this->db->distinct();
	   	$this->db->select('booking_number')->where('hotel_id',$id);
		$this->db->where('(status = 0 or status = 1)');
		$this->db->where('cancel != 2');
			if(!empty($num))
		{ $this->db->like('booking_number', $num); }
		$this->db->where('amend',2);
		$query =$this->db->get('tbl_booking');
		
		return count($query->result());
	}
    function cancel_details_view_off_package($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
    function cancel_details_view_off($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.commision,a.room_rate,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.status,a.payment,a.offline_user,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
    function cancel_details_view_off_agency_package($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.room_rate,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.commision,a.status,a.payment,a.offline_user,e.agency,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->join('tbl_agency as e','e.id=a.agency');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
    function cancel_details_view_off_agency($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.room_rate,a.commision,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.status,a.payment,a.offline_user,e.agency,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->join('tbl_agency as e','e.id=a.agency');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
   function cancel_details_view_package($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
    function cancel_details_view($booking_number,$id)
   {
		$this->db->select('a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.room_adult_rate,b.id as set_id,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel',2);
		$query1 = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
	
      function cancel_details_offline_package($booking_number, $id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.date,a.booking_number,a.commision,a.check_in,a.check_out,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.number_of_rooms,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		
		return $query1->result();
		
		//echo $this->db->last_query();
		
   }
	
   function cancel_details_offline($booking_number, $id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.date,a.commision,a.booking_number,a.check_in,a.check_out,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.number_of_rooms,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		
		return $query1->result();
		
		//echo $this->db->last_query();
		
   }
	
    function cancel_details_package($booking_number, $id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.date,a.request,a.arrival,a.pickup,a.commision,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		//echo $this->db->last_query();
		return $query1->result();
		
   }
	
   function cancel_details($booking_number, $id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.category,a.request,a.arrival,a.pickup,a.date,a.commision,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel', 2);
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
	
	function cancel_count($id,$num)
	{
		$this->db->distinct();
	   	$this->db->select('booking_number')->where('hotel_id',$id);
		$this->db->where('(status = 0 or status = 1)');
		$this->db->where('cancel', 2);
		if(!empty($num))
		{ $this->db->like('booking_number', $num); }
		$query =$this->db->get('tbl_booking');
		return count($query->result());
	}
	
   function get_cancel_number($id,$limit,$start,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user, category')->where('hotel_id',$id);
	$this->db->where('(status = 0 or status = 1)');
	$this->db->order_by('id','desc');
	$this->db->limit($limit,$start);
	$this->db->where('cancel',2);
		if(!empty($num))
		{ $this->db->like('booking_number', $num); }
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
	
   }
	
	function row_count($id)
	{
	$m = date('m');
		$this->db->distinct();
	   	$this->db->select('booking_number')->where('hotel_id',$id);
		$this->db->where('(status = 0 or status = 1)');
	$this->db->where('cancel != 2');
	$this->db->where('MONTH(date)', $m);
		$query =$this->db->get('tbl_booking');
		
		return count($query->result());
	}
	
	function row_count_booking($id, $cat='', $cin='', $cout='', $num='')
	{
		$this->db->distinct();
	   	$this->db->select('booking_number')->where('hotel_id',$id);
		$this->db->where('(status = 0 or status = 1)');
		
		if($cat == 'on')
		{
		$this->db->where('offline_user', 0);
		$this->db->where('reservation', 0);
		}
		else if($cat == 'off')
		{
		$this->db->where('offline_user !=', 0);
		$this->db->where('reservation', 0);
		}
		else if($cat == 'hotel')
		{
		$this->db->where('reservation', 1);
		}
		else if($cat == 'both')
		{$this->db->where('(offline_user = 0 or offline_user != 0 or reservation != 0 or reservation = 0)'); }
		
		if(!empty($cin))
		{ $this->db->where('date >=', $cin); }
		
		if(!empty($cout))
		{ $this->db->where('date <=', $cout); }
		
		if($num != 'undefined')
		{ $this->db->like('booking_number', $num); }
		
	$this->db->where('cancel != 2');
		$query =$this->db->get('tbl_booking');
		//return $this->db->last_query();
		return count($query->result());
	}
    
   function get_booking_number($id,$limit,$start)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user, category')->where('hotel_id',$id);
	$this->db->where('(status = 0 or status = 1)');
	$this->db->order_by('id','desc');
	$this->db->limit($limit,$start);
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
	
   }
   
   function getnumber($id,$limit,$start,$cat='',$c_in='',$c_out='',$num='')
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user, category')->where('hotel_id',$id);
	$this->db->where('(status = 0 or status = 1)');
	
		if($cat == 'on') { 
		$this->db->where('offline_user', 0); 
		$this->db->where('reservation', 0);
		}
		
		else if($cat == 'off') {
		$this->db->where('offline_user !=', 0);
		$this->db->where('reservation', 0);
		}
		
		else if($cat == 'hotel') {
		$this->db->where('reservation', 1);
		}
		
		else if($cat == 'both')
		{ $this->db->where('(offline_user = 0 or offline_user != 0 or reservation != 0 or reservation = 0)'); }
		
		if(!empty($c_in)) { $this->db->where('date >=', $c_in); }
		
		if(!empty($c_out)) { $this->db->where('date <=', $c_out); }
		
		if($num != 'undefined')
		{ $this->db->like('booking_number', $num); }
		
	$this->db->limit($limit,$start);
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	//return $this->db->last_query();
	
	return $query->result();
	
   }
   
   function booking_details($booking_number, $id)
   {
		$this->db->select('a.name,a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.date,a.commision,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function booking_details_package($booking_number, $id)
   {
		$this->db->select('a.name, a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.date,a.request,a.arrival,a.pickup,a.commision,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		//echo $this->db->last_query();
		return $query1->result();
		
   }
   
   function booking_details_offline($booking_number, $id)
   {
		$this->db->select('a.name,a.offline_user,a.id,a.extra_bed,a.package_id,a.name,a.payment_method,a.advance,a.voucher,a.agency,a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.date,a.commision,a.booking_number,a.check_in,a.check_out,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.number_of_rooms,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
		//echo $this->db->last_query();
		
   }
   
      function booking_details_offline_package($booking_number, $id)
   {
		$this->db->select('a.name,a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.date,a.booking_number,a.commision,a.check_in,a.check_out,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.number_of_rooms,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
		//echo $this->db->last_query();
		
   }
   
   
    function details_view($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation, a.package_id,a.category,a.id as booking_id,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.id as set_id,b.normal_allowed_kids,b.normal_allowed_adults,b.no_of_bed,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }

   
   function details_view_package($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,b.no_of_bed,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }

    function details_view_off_package($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.offline_user,a.commision,a.room_rate,a.extra_bed,a.date,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.advance,a.status,a.payment,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.normal_allowed_kids,b.no_of_bed,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
   
   
    function details_view_off($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.commision,a.room_rate,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.status,a.payment,a.offline_user,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.normal_allowed_kids,b.no_of_bed,b.normal_allowed_adults,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
   
    function details_view_off_agency($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.room_rate,a.commision,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.status,a.payment,a.offline_user,e.agency,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,b.no_of_bed,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->join('tbl_agency as e','e.id=a.agency');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }
   
    function details_view_off_agency_package($booking_number,$id)
   {
		$this->db->select('a.agency,a.wifi,a.reservation,a.package_id,a.category,a.id as booking_id,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.advance,a.extra_bed,a.room_rate,a.child_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.bed_rate,a.commision,a.status,a.payment,a.offline_user,e.agency,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,a.breakfast,
		b.price,b.room_child_rate,b.id as set_id,b.room_adult_rate,b.allowed_persons,b.normal_allowed_kids,b.normal_allowed_adults,b.no_of_bed,c.first_name,c.phone,c.address,c.email,c.country,d.room_title, d.id as room_id');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->join('tbl_agency as e','e.id=a.agency');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query1->result();
		
   }

   
   function checkin($booking_id,$datas)
   {
   	  $data = array('status' =>2);
	  $this->db->where('id', $booking_id);
      $this->db->update('tbl_booking', $data);
	  
	   $this->db->where('id', $datas['booking_room']);
      $this->db->update('tbl_booking_rooms', $data);
	  
	  $this->db->insert('tbl_checkin_user',$datas);
	  
	  //echo $this->db->last_query();
	  return $this->db->affected_rows(); 

   }

	function cancel($booking_id, $user='')
   {
   	  $data = array('cancel' =>2);
	  $this -> db -> where('booking_number', $booking_id);
	  if(!empty($user)){
	  $this -> db -> where('offline_user', $user); }
	  $this -> db -> update('tbl_booking', $data);
	  return $this->db->affected_rows(); 

   }
   
      function cancel_email($id)
   {
	return $this -> db
	-> select('a.email')
	-> from('tbl_booking a')
	-> join('tbl_user b', 'b.id = a.user_id')
	-> where('a.booking_number', $id)
	-> get()
	-> row();
   }
   
   function checkin_count($id,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user')->where('hotel_id',$id)->where('status','2');
	if(!empty($num)) {
   	$this->db->like('booking_number',$num);
	}
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	
	return count($query->result());
   }
   
 

   function checkin_count_date($id,$date)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('hotel_id',$id)->where('status','2')->where('check_in',$date);
	$query =$this->db->get('tbl_booking');
		
	return count($query->result());
   }
   
   function arrival_count($id,$date,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user')->where('hotel_id',$id)->where('(status = 0 or status = 1)')->where('check_in',$date);
	if(!empty($num)) {
   	$this->db->like('booking_number',$num);
	}
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	//return $this->db->last_query();
	return count($query->result());
   }
   
   function get_checkin($id,$limit,$start,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('hotel_id',$id)->where('status','2');
	$this->db->where('cancel != 2');
	$this->db->limit($limit,$start);
	if(!empty($num)) {
   	$this->db->like('booking_number',$num);
	}
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
   }
   
   function get_checkin_date($id,$limit,$start,$date)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('hotel_id',$id)->where('status','2')->where('check_in',$date);
	$this->db->limit($limit,$start);
	$query =$this->db->get('tbl_booking');
	//return $this->db->last_query();
	return $query->result();
   }
   
   function get_arrival_date($id,$limit,$start,$date,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('hotel_id',$id)->where('(status = 0 or status = 1)')->where('check_in',$date);
	$this->db->limit($limit,$start);
	if(!empty($num)) {
   	$this->db->like('booking_number',$num);
	}
	$this->db->where('cancel != 2');
	$query =$this->db->get('tbl_booking');
	//return $this->db->last_query(); 
	return $query->result();
   }
   
   function checkin_details($booking_number,$id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.commision,a.child_rate,a.bed_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function checkin_details_package($booking_number,$id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.commision,a.booking_number,a.child_rate,a.bed_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   function checkin_details_off($booking_number,$id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
      function checkin_details_off_package($booking_number,$id)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   function arrival_details($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_in',$date);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function arrival_details_package($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_in',$date);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }


   function arrival_details_off($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_in',$date);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function arrival_details_off_package($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.name as guest,a.request,a.arrival,a.pickup,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_in',$date);
		$this->db->where('(a.status = 0 or a.status = 1)');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function checkout($book_room_id,$booking_id)
   {
   	  $data = array('status' =>3);
	  $this->db->where('id', $booking_id);
      $this->db->update('tbl_booking', $data);
	  
	  $this->db->where('id', $book_room_id);
      $this->db->update('tbl_booking_rooms', $data);
	  
	  $date= date('Y-m-d');
	  $datas= array('check_out'=>$date);
	  $this->db->where('booking_room', $book_room_id);
      $this->db->update('tbl_checkin_user', $datas);
	  
	  
	  return $this->db->affected_rows(); 

   }
   
   function checkout_room_update($id)
   {
		$this -> db -> select('a.room_title, b.*');
		$this -> db -> from('tbl_hotel_room a');
		$this -> db -> join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		$this -> db -> join('tbl_booking c', 'c.room_id = b.id');
	$this->db->where('c.cancel != 2');
		$this -> db -> where('c.id', $id);
		$query = $this -> db -> get();
		return $query -> row();
   }
   
    function booking_room_number($booking_id)
	{
		$this -> db -> select('b.room_number as room_number,b.id as room_id,a.id as booking_room_id');
		$this -> db -> from('tbl_booking_rooms a');
		$this->db->join('tbl_hotel_roomnumber b', 'a.room_number = b.id');
		$this -> db -> where('booking_id', $booking_id);
		$query = $this -> db -> get();
		return $query -> result();
	}
	
	function check_user_checkin($booking_id)
	{
		$this -> db -> select('*');
		$this -> db -> from('tbl_checkin_user');
		$this -> db -> where('booking_room', $booking_id);
		$query = $this -> db -> get();
		return ($query -> result());
		
	}
	
	
	function advance($booking_number,$amount,$voucher)
	{
	 
	  $this->db->select('id,advance')->where('booking_number',$booking_number)->where('cancel != 2');
	  $query = $this->db->get('tbl_booking');
	  $result['id']= ($query->result());
	   
	   foreach($result['id'] as $results)
	   {
	   	$data = array('status' =>1);
	   	$this->db->where('booking_id', $results->id);
        $this->db->update('tbl_booking_rooms', $data);
		
	   }
	   
	    if($result['id'][0]->advance=='')
		{			
		 $data = array('status' =>1 , 'advance'=>$amount , 'voucher'=>$voucher);
		}
		else
		{
		$data = array('status' =>1 , 'payment'=>$amount, 'voucher'=>$voucher);
		}
	  $this->db->where('booking_number', $booking_number)->where('cancel != 2');
      $this->db->update('tbl_booking', $data);
	  
	  return $this->db->affected_rows(); 
	}


	function agency_check($booking_number,$id)
	{
		$this->db->select('agency');
		$this->db->where('hotel_id',$id)->where('booking_number',$booking_number);
	$this->db->where('cancel != 2');
		$query = $this->db->get('tbl_booking');
		
		return $query->result();
	}
	
	
	//checkout 
	function checkout_count($id,$date,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user')->where('hotel_id',$id)->where('status','2')->where('check_out',$date);
	if(!empty($num)) {
   	$this->db->like('booking_number', $num);
	}
	$query =$this->db->get('tbl_booking');
	return count($query->result());
	//return $this -> db -> last_query();
   }
    function get_checkout_date($id,$limit,$start,$date,$num)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('hotel_id',$id)->where('status','2')->where('check_out',$date);
	$this->db->limit($limit,$start);
	if(!empty($num)) {
   	$this->db->like('booking_number', $num);
	}
	$query =$this->db->get('tbl_booking');
	return $query->result();
   }
   
   
    function checkout_details_off($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_out',$date);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function checkout_details_off_package($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_out',$date);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
    function checkout_details($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_out',$date);
	$this->db->where('a.cancel != 2');
		$this->db->where('a.status','2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function checkout_details_package($booking_number,$id,$date)
   {
		$this->db->select('a.wifi,a.breakfast,a.reservation,a.id as booking_id,a.category,a.request,a.arrival,a.pickup,a.name as guest,a.phone as guest_phone,a.email as guest_email,a.date,a.booking_number,a.child_rate,a.bed_rate,a.check_in,
		a.discount,a.payment,a.tax,a.total_amount,a.commision,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.id as set_id,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.check_out',$date);
		$this->db->where('a.status','2');
	$this->db->where('a.cancel != 2');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   function food_plan($booking_number)
   {
	   $this->db->select('*');
	   $this->db->where('booking_id',$booking_number);
	   $query = $this->db->get('tbl_booking_foodplan');
	   return $query->result();
	   
   }
   
   function get_booking_date($booking_id)
   {
	   $this->db->select('*');
	   $this->db->where('booking_number',$booking_id);
	$this->db->where('cancel != 2');
	   $query = $this->db->get('tbl_booking');
	   return $query->result();
   }
   
   function get_hotel_rooms($id)
   {
	   $this->db->where('hotel_id',$id);
	   $this->db->where('room_status',1);
	   $this->db->order_by('room_title','asc');
	   $query = $this->db->get('tbl_hotel_room');
	   return $query->result();
   }
   
   
    function room_setting_list($id, $in, $out)
    {
		
		$this->db->select('a.id, a.hotel_id,a.room_title,room_title,b.allowed_persons, b.normal_allowed_adults,b.normal_allowed_kids,
		b.id as setting_id, b.price,b.no_of_bed,b.child_free_limit,b.tax_applicable,b.room_adult_rate,b.room_child_rate');
		
		$this->db->from('tbl_hotel_room_settings as b');
		$this->db->join('tbl_hotel_room as a','a.id = b.room_id');
		$this->db->where('a.id',$id)->where('a.room_status',1);
		$this->db->where('b.valid_from <=',$in)->where('b.available_status',1);
		$this->db->where('b.valid_upto >=',$out);
		$this->db->group_by('b.room_id');
		$query = $this->db->get();
		return $query->result();
				
    }
	
	
	
	function room_numbers($hotel_id,$room_id,$in,$out)
	{
		$this->db->where('hotel_id',$hotel_id)->where('room_id',$room_id);
		if(!empty($in) && !empty($out)) {
		$this->db->where('(("'.$in.'" not between valid_from and valid_to) or ("'.$out.'" not between valid_from and valid_to))');
		}
		$this->db->order_by('room_number','asc');
		$query = $this->db->get('tbl_hotel_roomnumber');
		return $query->result();
	}
	
	function available_room_numbers($check_in,$check_out,$hotel_id,$room_id,$roomnumber)
	{
		$this->db->distinct();
		$this->db->select('tbl_booking_rooms.room_number as id');
		$this->db->from('tbl_booking_rooms');
		$this->db->join('tbl_hotel_roomnumber','tbl_hotel_roomnumber.id=tbl_booking_rooms.room_number');
		
		$this->db->where('(tbl_booking_rooms.check_in BETWEEN "'. $check_in. '" and "'. $check_out.'" or tbl_booking_rooms.check_out BETWEEN "'. $check_in. '" and "'. $check_out.'")');		
        $this->db->where('tbl_hotel_roomnumber.hotel_id',$hotel_id)->where('tbl_hotel_roomnumber.room_id',$room_id)->where('tbl_booking_rooms.status!=','3')->where('tbl_booking_rooms.room_number=',$roomnumber);
	    $query_res = $this->db->get();
        $result =$query_res->result(); 
		return count($result); 
		
	}
	
	function get_booking_rooms($booking_id)
	{
		$this->db->select('a.room_number,a.id,e.room_title,e.id as room_id,c.id as booking_id');
		$this->db->from('tbl_hotel_roomnumber as a');
		$this->db->join('tbl_booking_rooms as b','a.id=b.room_number');
		$this->db->join('tbl_booking as c','c.id=b.booking_id');
		$this->db->join('tbl_hotel_room as e','e.id=a.room_id');
		$this->db->where('c.booking_number',$booking_id);
		$this->db->order_by('a.room_number','asc');
	$this->db->where('c.cancel != 2');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function room_interchange($datas)
	{
		$this->db->insert('tbl_room_interchange',$datas);
		return $this->db->affected_rows();
	}
	
	function room_booking_change($datas)
	{
		$data['room_number'] = $datas['new_room'];
		
		$this->db->where('booking_id',$datas['booking_id'])->where('room_number',$datas['old_room']);
		$this->db->update('tbl_booking_rooms',$data);
		return $this->db->affected_rows();
	}
	
	function interchange_detail($booking_id)
	{
		$this->db->select('a.remark,a.date,a.old_room,a.old_room_type,a.new_room,a.new_room_type');
		$this->db->from('tbl_room_interchange as a');
		$this->db->join('tbl_booking_rooms as b','a.booking_id=b.booking_id');
		$this->db->join('tbl_booking as c','c.id=b.booking_id');
		$this->db->where('c.booking_number',$booking_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function interchange_roomtype($room_type)
	{
		$this->db->select('room_title');
		$this->db->where('id',$room_type);
	   $this->db->where('room_status',1);
		$query = $this->db->get('tbl_hotel_room');
		return $query->result();
	}
	function interchange_roomnumber($room_number)
	{
		$this->db->select('room_number');
		$this->db->where('id',$room_number);
		$query = $this->db->get('tbl_hotel_roomnumber');
		return $query->result();
	}
	
	
	//for date extends
	function check_room_status($set_id,$check_in,$check_out)
	{
		$this->db->select('*');
		$this->db->where('(("'.$check_in.'" BETWEEN valid_from AND valid_upto) and ("'.$check_out.'" BETWEEN valid_from AND valid_upto))');
		$this->db->where('id',$set_id)->where('available_status',1);
		$query = $this->db->get('tbl_hotel_room_settings');
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function check_pack_room_status($set_id,$check_in,$check_out)
	{
		$this->db->select('*');
		$this->db->where('(("'.$check_in.'" BETWEEN valid_from AND valid_upto) and ("'.$check_out.'" BETWEEN valid_from AND valid_upto))');
		$this->db->where('id',$set_id)->where('available_status',1);
		$query = $this->db->get('tbl_ayurveda_rooms');
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function check_roomnumber_status($roomnum_id,$check_in,$check_out)
	{
		$this->db->select('*');
		$this->db->where('(("'.$check_in.'"  BETWEEN valid_from AND valid_to ) or ("'.$check_out.'"  BETWEEN valid_from AND valid_to))');
		$this->db->where('id',$roomnum_id)->where('status',0);
		$query = $this->db->get('tbl_hotel_roomnumber');
		//echo $this->db->last_query();
		return $query->result();
	}	
	
	function check_booking_room($roomnum_id,$booking_id,$check_in,$check_out)
	{
		$this->db->select('*');
		$this->db->where('(("'.$check_in.'"  BETWEEN check_in AND check_out ) or ("'.$check_out.'"  BETWEEN check_in AND check_out))');
		$this->db->where('room_number',$roomnum_id);
		$this->db->where('booking_id!=',$booking_id);
		$query = $this->db->get('tbl_booking_rooms');
		return $query->result();
	}
	
	function date_change($booking_num,$check_in,$check_out)
	{ 
		$data['check_in'] = $check_in ;
		$data['check_out'] = $check_out;
		
		$this->db->where('booking_number',$booking_num);
		$this->db->update('tbl_booking',$data);
		
		$this->db->select('id');
		$this->db->where('booking_number',$booking_num);
		$query = $this->db->get('tbl_booking');
		$booking_id = $query->result();
		
		foreach($booking_id as $id)
		{ 
			$this->db->where('booking_id',$id->id);
			$this->db->update('tbl_booking_rooms',$data);
		}
		return $this->db->affected_rows();
		
	}
	
	
	function agency_view($booking_number,$id)
 {

$this->db->select('agency');
$this->db->where('hotel_id',$id)->where('booking_number',$booking_number);
$this->db->where('cancel', 2);
$query = $this->db->get('tbl_booking');

return $query->result();

}
	
	
   
}


?>