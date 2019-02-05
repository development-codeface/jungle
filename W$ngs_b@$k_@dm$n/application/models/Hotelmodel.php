<?php

class HotelModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
## access option ##

function access_options($id) {
	return $this -> db
	-> where('hotel_id', $id)
	-> get('tbl_hotels_access')
	-> row();
}

## access options end ##
	
    function search_num($key, $id)
    {
	$this->db->where('sub_category_id', $id);
		$this -> db -> like('title', $key);
		$this -> db -> or_like('hotel_number', $key);
		$query = $this -> db -> get('tbl_hotel');
		return $query -> result();
    }
    
    function search($key, $id, $limit, $start)
    {
	$this->db->where('sub_category_id', $id);
		$this -> db -> like('title', $key);
		$this -> db -> or_like('hotel_number', $key);
		$this->db->limit($limit,$start); 
		$query = $this -> db -> get('tbl_hotel');
		return $query -> result();
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
		$this->db->where('name', 'india');
		$query_country = $this->db->get('location');
		return $query_country->result();
	}
	
	function states()
	{
		$this->db->distinct();
		$this->db->select('state');
		$this->db->order_by('state','asc');
		$query_country = $this->db->get('tbl_locations');
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
	
	function row_count($id)
	{
		$this->db->where('sub_category_id', $id);
		$this->db->where('status','1');
		$query=$this->db->get('tbl_hotel');
		$res=$query->result();
		return count($res);
	}
	
	function details($id)
    {
        $this->db->select('*');
		$this->db->where('id',$id);
        $query_res=$this->db->get('tbl_hotel');
		$result['hotel'] =  $query_res->result();
				
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_image');
		$result['image'] =  $query_res->result();
		
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_facilities');
		$result['facilities'] =  $query_res->result();
		
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_room_map');
		$result['rooms'] =  $query_res->result();
		
		return $result;
		
    }

	function details_subcategory($id,$limit,$start)
	{
		$this->db->where('sub_category_id', $id);
		$this->db->where('status','1');
		$this->db->limit($limit,$start);
		$query=$this->db->get('tbl_hotel');
		return $query->result();
	}
	
	function subcategory($id)
	{
		$this->db->where('sub_category_id', $id);
		$this->db->where('status','1');
		$this->db->order_by('title');
		$query=$this->db->get('tbl_hotel');
		return $query->result();
	}
	
	function changestatus($id,$status)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel', $status);
		
		$this->db->where('hotel_id', $id);
		$this->db->update('tbl_hotel_manager', $status);
		
		
	}
	
	function image($hotel_id,$image_id)
	{
		$query = $this->db->where('hotel_id',$hotel_id)->where('id',$image_id)->get('tbl_hotel_image');
		return $query->result();
	}
	
	function image_delete($image_id)
	{
		$query = $this->db->where('id',$image_id)->delete('tbl_hotel_image');
	}
	
	function select_images($hotel_id,$image_id)
	{
		$query = $this->db->where('hotel_id',$hotel_id)->get('tbl_hotel_image');
		return $query->result();
	}
	
	function image_update($image_id,$data)
	{
		$query = $this->db->where('id',$image_id)->update('tbl_hotel_image',$data);
		return $this->db->affected_rows();
	}
	
	function getRooms($id)
	{
		$this->db->where('hotel_id',$id);
		$query = $this->db->get('tbl_hotel_room');
		$result= $query->result();
		return $result;
	}
	
	function delete_room_facility($room_id)
	{
		$this->db->delete('tbl_hotel_room_facilities', array('room_id' => $room_id)); 
		$this->db->delete('tbl_hotel_room_image', array('room_id' => $room_id)); 
	}
	
	function delete($id)
	{
		$this->db->delete('tbl_hotel', array('id' => $id)); 
	 	$this->db->delete('tbl_hotel_room_map', array('hotel_id' => $id));
		$this->db->delete('tbl_hotel_facilities', array('hotel_id' => $id));
		$this->db->delete('tbl_hotel_image', array('hotel_id' => $id));
	 	$this->db->delete('tbl_hotel_manager', array('hotel_id' => $id));
		$this->db->delete('tbl_hotel_room', array('hotel_id' => $id)); 
		$this->db->delete('tbl_hotel_room_settings', array('hotel_id' => $id)); 
		$this->db->delete('tbl_hotel_staff', array('hotel_id' => $id)); 
		$this->db->delete('tbl_tax', array('hotel_id' => $id)); 
	}
	
	
	function get_tax($id)
	{
		$this->db->select('*');
        $this->db->where('hotel_id', $id)->where('season','season');
		$query = $this->db->get('tbl_tax');
		return $query->result();
	}
	
	function get_tax_off($id)
	{
		$this->db->select('*');
        $this->db->where('hotel_id', $id)->where('season','off_season');
		$query = $this->db->get('tbl_tax');
		return $query->result();
	}
	
	function group_list()
	{
		$this->db->select('*');
		$query = $this->db->get('tbl_hotel_groups');
		return $query->result();
	}
	
		function get_group_hotels_count($cat,$g_id)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_hotel_groups as b', 'a.group_id=b.id');
		$this->db->where('a.group_id',$g_id);
		$this->db->where('a.sub_category_id',$cat);
		$query = $this->db->get();
		return count($query->result());
		//$this->db->where('sub_category_id', $id);
	}
	
	function get_group_hotels($cat,$id,$limit,$start)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_hotel_groups as b', 'a.group_id=b.id');
		$this->db->where('a.group_id',$id);
		$this->db->where('a.sub_category_id',$cat);
		$this->db->limit($limit,$start); 
		$query = $this->db->get();
		return $query->result();
		
	}
	
		 function allgroupdetails()
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_hotel_groups');
        $result =$query_res->result();
        return $result;
    }
	
	

}

?>