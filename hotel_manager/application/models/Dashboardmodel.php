<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function booking_backup($date,$id)
	{
		$this->db->select('*')->where('hotel_id',$id)->where('status',2)->or_where('cancel',1);
		$this->db->like('check_out',$date,'after');
		$query = $this->db->get('tbl_booking');
		
		return $query->result();
	}
	
	function check_backup($data)
	{
		$this->db->select('*')->where('room_id',$data['room_id'])->where('check_in',$data['check_in'])->where('check_out',$data['check_out'])->where('user_id',$data['user_id']);
		$query = $this->db->get('tbl_booking_backup');
		
		//echo $this->db->last_query();
		return count($query->result());
	}
	
	function delete_booking($id)
	{
		$this->db->where('id',$id)->delete('tbl_booking');
	}
    
   function get_booking_number($id)
   {
   	
	$date = date('Y-m-d'); 
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('cancel!=2')->where('hotel_id',$id)->where('(status = 0 or status = 1)');
	//$this->db->where('check_in',$date);
	$this->db->limit('8');
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
	
   }
   
   
    function booking_pack_details($booking_number,$id)
   {
	   $this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
   }
   
   
   function booking_details($booking_number,$id)
   {
		
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
     function offline_booking_details($booking_number,$id)
   {
		
		
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function offline_booking_details_package($booking_number,$id)
   {
		
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
   }
   
   
   
   function checkin($booking_id)
   {
   	  $data = array('status' =>1);
	  $this->db->where('id', $booking_id);
      $this->db->update('tbl_booking', $data);
	  return $this->db->affected_rows(); 
	  
	  

   }

	
	function arrival_count($id)
    {
   	$date = date('Y-m-d'); 
   	$this->db->distinct();
   	$this->db->select('booking_number')->where('cancel!=2')->where('hotel_id',$id)->where('(status = 0 or status = 1)');
	$this->db->where('check_in',$date);
	$this->db->limit('8');
	$query =$this->db->get('tbl_booking');
	
	return count($query->result());
   }

  
   function get_arrival($id)
   {
   	$date = date('Y-m-d'); 
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user,category')->where('cancel!=2')->where('hotel_id',$id)->where('(status = 0 or status = 1)');
	$this->db->where('check_in',$date);
	$this->db->limit('8');
	$query =$this->db->get('tbl_booking');
	
	return $query->result();
   }
   
   function arrival_details($booking_number,$id)
   {
   	 	
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
    function arrival_pack_details($booking_number,$id)
   {
   	 	
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   function offline_arrival_details($booking_number,$id)
   {
   	 	
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function offline_arrival_details_package($booking_number,$id)
   {
   	 	
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_offline_user as c','c.id=a.offline_user');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function checkin_count($id)
   {
   	
   	$this->db->distinct();
   	$this->db->select('booking_number')->where('hotel_id',$id)->where('status','2');
	//$this->db->limit('8');
	$query =$this->db->get('tbl_booking');
	//echo $this->db->last_query();
	return count($query->result());
   }
   
   
   
   	function checkout_count($id)
    {
   	$date = date('Y-m-d');
   	$this->db->distinct();
   	$this->db->select('booking_number')->where('hotel_id',$id)->where('status', '2');
	$this->db->where('check_out',$date);
	$query =$this->db->get('tbl_booking');
	
	return count($query->result());
   }
   
   function user_count($id)
   {
   		$this->db->distinct();
		$this->db->select('user_id');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_booking');
        $result =$query_res->result();
        return count($result);
   }
    
   function rooms($id)
   {
   		return $this -> db
   		-> select('a.room_title, b.room_number, a.hotel_id')
		-> from('tbl_hotel_room a')
		-> join('tbl_hotel_roomnumber b', 'a.id = b.room_id')
   		-> where('b.hotel_id', $id)
		-> where('a.room_status', 1)
		-> where('b.status !=', 2)
		-> order_by('a.room_title')
		-> get()
		-> result();
   }

   function day_status($id, $rno, $date) {
		return $this -> db
		-> select('status')
		-> from('tbl_hotel_roomnumber')
		-> where('hotel_id', $id)
		-> where('room_number', $rno)
		-> where("'$date' BETWEEN valid_from AND valid_to")
		-> where('status', 0)
		-> get()
		-> row();
   }

	function room_status($id, $rno, $date)
	{
		return $this -> db
		-> select('a.status,a.check_out, b.status as roomnumber_status, c.user_id, c.offline_user')
		-> from('tbl_booking_rooms a')
		-> join('tbl_hotel_roomnumber b', 'a.room_number = b.id')
		-> join('tbl_booking c', 'a.booking_id = c.id')
		-> where('b.hotel_id', $id)
		-> where('b.room_number', $rno)
		-> where("'$date' BETWEEN  a.check_in AND a.check_out")
		-> where('c.cancel !=', 2)
		-> get()
		-> row();
	}
}

?>