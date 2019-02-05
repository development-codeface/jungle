<?php

class HotelModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function alldeatils()
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_hotel');
        $result =$query_res->result();
        return $result;
    }
	
	function country()
	{
		$this->db->select('*');
		$this->db->where('location_type', 0); 
		$this->db->where('is_visible', 0);
		$query_country = $this->db->get('location');
		return $query_country->result();
	}
	
	function hotelById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query_country = $this->db->get('tbl_hotel');
		return $query_country->row();
	}

    function hotelimagesById($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id', $id);
		$query_country = $this->db->get('tbl_hotel_image');
		return $query_country->result();
	}
	
	function hotelroomsById($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id', $id);
		$query_country = $this->db->get('tbl_hotel_room_map');
		return $query_country->result();
	}
	
	function hotelfacilitiesById($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id', $id);
		$query_country = $this->db->get('tbl_hotel_facilities');
		return $query_country->row();
	}
	
	function updatehotelbasic($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel', $data); 
	}

	function updatehotelfacilities($data,$id)
	{
		$this->db->where('hotel_id', $id);
		$this->db->update('tbl_hotel_facilities', $data); 
	}
	
	function logo($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel', $data);
	}
	
	function category($name)
	{
		$this->db->select('id, name');
		$this->db->like('name', $name, 'after');
		$query=$this->db->get('tbl_sub_category');
		return $query->row();
	}

	function details_subcategory($id)
	{
		$this->db->where('sub_category_id', $id);
		$query=$this->db->get('tbl_hotel');
		return $query->result();
	}
}

?>