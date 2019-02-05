<?php

class Roomnumber_model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function check_booking($room_id)
	{
		$date = date('Y-m-d');
		
		$this->db->from('tbl_booking_rooms as a');
		$this->db->where('a.room_number',$room_id);
		$this->db->where('(a.check_in >= "'. $date. '"  or a.check_out >= "'. $date. '" )');
		$query = $this->db->get();
		return $query->result();
		
		 
	}
	
    
    	 function allSettings($id)
    {
		$this->db->select('room_id');
		$this->db->where('hotel_id', $id);
    	$this->db->where('available_status', 1);
    	$this->db->group_by('room_id');
        $query_room = $this->db->get('tbl_hotel_room_settings');
        return $query_room->result();
    }
	
	function checkExist($id, $num, $hotel)
	{
		$check = $this -> db
		-> where('hotel_id', $hotel)
		-> where('room_number', $num)
		-> where('room_id', $id)->where('status !=',2)
		-> get('tbl_hotel_roomnumber')
		-> result();
		return count($check);
	}
	
	function getRoom($id)
	{
		return $this -> db
		-> where('id', $id)
		-> where('status !=', 2)
		-> get('tbl_hotel_roomnumber')
		-> row();
	}
   
    function allList($id)
    {
        $this->db->select('*');
        $this->db->from( 'tbl_hotel_room');
		$this->db->where( 'hotel_id',$id);
		$this->db->where( 'room_status',1);
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
    	$this->db->where('b.available_status', 1);
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
		$this->db->where('a.hotel_id',$id);
		$this->db->where('a.room_status',1);
		//$this->db->where('b.valid_from <=',$in)
		$this->db->where('b.available_status',1);
		//$this->db->where('b.valid_upto >=',$out);
		$this->db->where('("'.$in.'"  BETWEEN b.valid_from AND b.valid_upto ) AND ("'.$out.'"  BETWEEN b.valid_from AND b.valid_upto)');
		$this->db->where('b.ayurveda_id',$pack);
    	$this->db->where('a.room_status', 1);
		$query = $this->db->get();
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
    	$this->db->where('room_status', 1);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->result();
    }
	
	function room_numbers($hotel_id,$room_id,$in,$out)
	{
		$date=date('Y-m-d');
		$this->db->where('hotel_id',$hotel_id)->where('room_id',$room_id);
		if(!empty($in) && !empty($out)) {
		$this->db->where('(("'.$in.'" not between valid_from and valid_to) or ("'.$out.'" not between valid_from and valid_to))');
		} else {
		$this->db->where('"'.$date.'" not between valid_from and valid_to');
		}
		$this->db->where('status !=',2);
		$this->db->order_by('room_number','asc');
		$query = $this->db->get('tbl_hotel_roomnumber');
		return $query->result();
	}
	
	function room_check($data)
	{
		$this->db->where('hotel_id',$data['hotel_id'])->where('room_number',$data['room_number'])->where('status',$data['status']);
		$query = $this->db->get('tbl_hotel_roomnumber');
		return  count($query->result());
	}
	
	function room_exist_update($data)
	{
		$this->db->where('hotel_id',$data['hotel_id'])->where('room_number',$data['room_number'])->where('room_id',$data['room_id']);
		$this->db->update('tbl_hotel_roomnumber',array('status' => 1));
		
		return $this->db->affected_rows();
	}
	
	function room_block($data, $id)
	{
		$this->db->where('id',$id)->where('status !=',2);
		$this->db->update('tbl_hotel_roomnumber',$data);
		
		return $this->db->affected_rows();
	}
	
	function getBlocked($id)
	{
		return $this -> db -> where('hotel_id', $id) -> where ('status', 0) -> get('tbl_hotel_roomnumber') -> result();
	}

    
}

?>