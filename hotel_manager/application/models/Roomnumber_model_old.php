<?php

class Roomnumber_model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function checkExist($id, $num, $hotel)
	{
		$check = $this -> db
		-> where('hotel_id', $hotel)
		-> where('room_number', $num)
		-> where('room_id', $id)
		-> get('tbl_hotel_roomnumber')
		-> result();
		return count($check);
	}
	
	function getRoom($id)
	{
		return $this -> db
		-> where('id', $id)
		-> where('status', 1)
		-> get('tbl_hotel_roomnumber')
		-> row();
	}
   
    function allList($id)
    {
        $this->db->select('*');
        $this->db->from( 'tbl_hotel_room');
		$this->db->where( 'hotel_id',$id);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
    }
	
	
    function allListDate($id, $in, $out)
    {
		
		$this->db->select('a.id, a.hotel_id,a.room_title,room_title,b.allowed_persons, b.normal_allowed_adults,b.normal_allowed_kids,
		b.id as setting_id, b.price,b.no_of_bed,b.child_free_limit,b.tax_applicable,b.room_adult_rate,b.room_child_rate');
		
		$this->db->from('tbl_hotel_room_settings as b');
		$this->db->join('tbl_hotel_room as a','a.id = b.room_id');
		$this->db->where('a.hotel_id',$id)->where('a.room_status',1);
		$this->db->where('b.valid_from <=',$in)->where('b.available_status',1);
		$this->db->where('b.valid_upto >=',$out);
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();
		
		
		
    }
    
    	
	function allList_today($date,$hotel_id)
	{
		
		$this->db->select('a.id, a.hotel_id,a.room_title,room_title,b.allowed_persons, b.normal_allowed_adults,b.normal_allowed_kids,
		b.id as setting_id, b.price,b.no_of_bed,b.child_free_limit,b.tax_applicable,b.room_adult_rate,b.room_child_rate');
		
		$this->db->from('tbl_hotel_room_settings as b');
		$this->db->join('tbl_hotel_room as a','a.id = b.room_id');
		$this->db->where('a.hotel_id',$hotel_id)->where('a.room_status',1);
		$this->db->where('(b.valid_from BETWEEN "'. $date. '" and "'. $date.'" or b.valid_upto BETWEEN "'. $date. '" and "'. $date.'")');
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();
		
		
	}
	
	
    function allListDate_package($id, $pack, $in, $out)
    {
		
		
		$this->db->select('a.id, a.hotel_id,a.room_title,room_title,b.allowed_persons, b.normal_allowed_adults,b.normal_allowed_kids,
		b.id as setting_id, b.price,b.no_of_bed,b.child_free_limit,b.tax_applicable,b.room_adult_rate,b.room_child_rate');
		
		$this->db->from('tbl_ayurveda_rooms as b');
		$this->db->join('tbl_hotel_room as a','a.id = b.room_id');
		$this->db->where('a.hotel_id',$id)->where('a.room_status',1);
		$this->db->where('b.valid_from <=',$in)->where('b.available_status',1);
		$this->db->where('b.valid_upto >=',$out);
		$this->db->where('b.ayurveda_id',$pack);
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();
		
		
		
    	//$query = "SELECT a.id, a.hotel_id, room_title, allowed_persons,b.no_of_bed,b.normal_allowed_adults,b.normal_allowed_kids,
		//b.id as setting_id,b.price,b.room_adult_rate,b.child_free_limit,b.tax_applicable,b.room_child_rate FROM tbl_hotel_room a JOIN tbl_ayurveda_rooms b ON a.id = b.room_id 
    	//AND a.hotel_id = b.hotel_id AND a.room_status = b.available_status WHERE 
		//a.hotel_id = '$id' AND valid_from <= '$in' AND valid_upto >= '$out' AND b.ayurveda_id = $pack";
		
	  //return $this->db->query($query)->result();
		//return $this -> db -> last_query();
    }
	
	 function allRooms($id)
    {
        $this->db->select('*');
		$this->db->where('hotel_id', $id);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->result();
    }
	
	function room_numbers($hotel_id,$room_id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$hotel_id)->where('room_id',$room_id);
		$this->db->order_by('room_number','asc');
		$query = $this->db->get('tbl_hotel_roomnumber');
		return $query->result();
	}
	
	function room_check($data)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$data['hotel_id'])->where('room_number',$data['room_number']);
		$query = $this->db->get('tbl_hotel_roomnumber');
		return  count($query->result());
	}
	
	function room_block($data, $id)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_hotel_roomnumber',$data);
		
		return $this->db->affected_rows();
	}
	
	function getBlocked($id)
	{
		return $this -> db -> where('hotel_id', $id) -> where ('status', 0) -> get('tbl_hotel_roomnumber') -> result();
	}

    
}

?>