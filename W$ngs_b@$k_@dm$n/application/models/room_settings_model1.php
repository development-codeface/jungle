<?php

class Room_settings_Model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
   function get_allDetails($name)
    {
		
		$this->db->select('tbl_hotel.*');
        $this->db->from( 'tbl_hotel');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
		$query_htl = $this->db->get();
        return $query_htl->result();
    }
	
    // function allList()
    // {
        // $this->db->select('tbl_hotel_room_settings.*,tbl_hotel.title as hotel_title,tbl_hotel.id as h_id, tbl_hotel_room.room_title,tbl_hotel_room.id as r_id ');
        // $this->db->from( 'tbl_hotel_room_settings');
        // $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room_settings.hotel_id');
        // $this->db->join('tbl_hotel_room', 'tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
        // $query_res = $this->db->get();
        // $result =$query_res->result(); 
        // return $result;
    // }
    
     function row_count($name)
  	 {
   		$this->db->select('tbl_hotel_room_settings.*,tbl_hotel.title as hotel_title,tbl_hotel.id as h_id, tbl_hotel_room.room_title,tbl_hotel_room.id as r_id ');
        $this->db->from( 'tbl_hotel_room_settings');
        $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room_settings.hotel_id');
        $this->db->join('tbl_hotel_room', 'tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return count($result);
  	 }
    
      function allList($name,$limit,$start)
    {
        $this->db->select('tbl_hotel_room_settings.*,tbl_hotel.title as hotel_title,tbl_hotel.id as h_id, tbl_hotel_room.room_title,tbl_hotel_room.id as r_id ');
        $this->db->from( 'tbl_hotel_room_settings');
        $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room_settings.hotel_id');
        $this->db->join('tbl_hotel_room', 'tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
		$this->db->limit($limit,$start);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
    }
    

    function roomsettings_ById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query_room = $this->db->get('tbl_hotel_room_settings');
        return $query_room->row();
    }

    function allRooms($hotel_id)
    {
        $this->db->select('*');
		$this->db->where('hotel_id',$hotel_id);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->result();
    }

    function get_rooms_attached($id)
    {
        $this->db->select('id');
        $this->db->select('room_title');
        $this->db->where('hotel_id', $id);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->result();
    }


    function upd_room($data_room)
    {
        $update_data = array(
                'hotel_id'          		=> $data_room['hotel_id'],
                'room_id'            		=> $data_room['room_id'],
                'price'              		=> $data_room['room_price'],
                'conditions'           		=> $data_room['conditions'],
                'offer_price'       		=> $data_room['offer_price'],
                'allowed_persons'           => $data_room['allowed_persons'],
                'valid_upto'                => $data_room['valid_upto'],
                'valid_from'           		=> $data_room['valid_from'],
                'room_child_rate'       	=> $data_room['room_child_rate'],
                'room_adult_rate'           => $data_room['room_adult_rate'],
                'num_rooms'                	=> $data_room['num_rooms'],
                'tax_applicable'            => $data_room['tax_applicable'],
                
            );

        $this->db->where('id', $data_room['id']);
        $this->db->update('tbl_hotel_room_settings', $update_data); 
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 1;
        }
    }

	function delete($id)
	{
		$this->db->delete('tbl_hotel_room_settings', array('id' => $id)); 
	}
	
}

?>