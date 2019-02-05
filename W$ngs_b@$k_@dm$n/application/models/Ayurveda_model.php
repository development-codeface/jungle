<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ayurveda_model extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function row_count($catgeory,$id)
	{
		
		$this->db->select('a.*');
    	$this->db->from('tbl_ayurveda a');
    	$this->db->join('tbl_sub_category b', 'a.category=b.id');
    	$this->db->like('b.name', $catgeory);
		$this->db->where('hotel_id',$id);
		$query_res = $this->db->get();
        $result =$query_res->result(); 
        return count($result);
		
	}
	
	function all_hotels()
	{
		$this->db->distinct();
		 $this->db->select('tbl_hotel.id,tbl_hotel.title');
        $this->db->from( 'tbl_hotel');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name','hotel');
		$this->db->or_like('tbl_sub_category.name','resort');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
       
	}
	
	
	function hotel_name($id)
	{
		$query = $this -> db -> select('title') -> where('id', $id) -> get('tbl_hotel');
		return $query -> row();
	}
	
	
	function sub_category($category)
	{
		$this->db->select('a.name, a.id');
		$this->db->from('tbl_sub_category a');
		$this->db->join('tbl_category b', 'a.category_id = b.id');
		$this->db->like('b.name', 'ayurveda', 'before');
		$this->db->like('a.name', $category);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	// function sub_category()
	// {
		// $this->db->select('a.name, a.id');
		// $this->db->from('tbl_sub_category a');
		// $this->db->join('tbl_category b', 'a.category_id = b.id');
		// $this->db->like('b.name', 'ayurveda', 'before');
		// $query = $this->db->get();
		// return $query->result();
	// }
    
   
    function all_ayurveda($id,$limit, $start)
    {
    	$this->db->select('a.*');
    	$this->db->from('tbl_ayurveda a');
    	$this->db->join('tbl_sub_category b', 'a.category=b.id');
    	$this->db->like('b.name', 'ayurveda', 'after');
		$this->db->where('hotel_id',$id);
    	$this->db->limit($limit, $start);
    	$this->db->order_by('id', 'desc');
		$query = $this->db->get();
        return $query->result();
    }
	
    function all_yoga($id,$limit, $start)
    {
    	$this->db->select('a.*');
    	$this->db->from('tbl_ayurveda a');
    	$this->db->join('tbl_sub_category b', 'a.category=b.id');
    	$this->db->like('b.name', 'yoga', 'after');
		$this->db->where('hotel_id',$id);
    	$this->db->limit($limit, $start);
    	$this->db->order_by('id', 'desc');
		$query = $this->db->get();
        return $query->result();
    }
	
	function ins_package($data)
	{
		if($this -> db -> insert('tbl_ayurveda', $data))
		{ return $this -> db -> insert_id(); }
		else
		{ return null; }
	}
	
	function update_image($id, $data)
	{
		$query = $this -> db -> where('id', $id) -> update('tbl_ayurveda',$data);
	}

	function days_insert($data)
	{
		if($this->db->insert('tbl_ayurveda_days', $data))
         { return $this->db->insert_id(); } 
         else
         { return null; }
	}
	
	function tbl_ayurveda($id)
	{
		$query = $this -> db -> where('id', $id) -> get('tbl_ayurveda');
		return $query -> row();
	}
	
	function tbl_ayurveda_days($id)
	{
		$query = $this -> db -> where('ayurveda_id', $id) -> get('tbl_ayurveda_days');
		return $query -> result();
	}

	function ayurveda_update($id,$data)
	{
		$query = $this->db->where('id',$id)->update('tbl_ayurveda',$data);
		return $this->db->affected_rows();
	}

	function days_update($id,$data)
	{
		$query = $this->db->where('id',$id)->update('tbl_ayurveda_days',$data);
		return $this->db->affected_rows();
	}

	function get_images($id)
	{
		$query = $this -> db -> select('image, thumb_image') -> where('id', $id) -> get('tbl_ayurveda');
		return $query -> row();
	}
	
	
	
	//room settings
	
	function rooms_row_count($cat_id,$id)
	{
		$this->db->select('a.*');
    	$this->db->from('tbl_ayurveda_rooms a');
		$this->db->join('tbl_ayurveda b', 'a.ayurveda_id=b.id');
    	$this->db->join('tbl_sub_category c', 'b.category=c.id');
    	$this->db->where('c.id', $cat_id);
    	$this->db->where('b.hotel_id', $id);
		$query_res = $this->db->get();
        $result =$query_res->result(); 
        return count($result);
	}
	
	function room_setting_list($cat_id,$id,$limit,$start)
	{
		$this->db->select('a.*,d.title,e.room_title');
    	$this->db->from('tbl_ayurveda_rooms a');
		$this->db->join('tbl_ayurveda b', 'a.ayurveda_id=b.id');
    	$this->db->join('tbl_sub_category c', 'b.category=c.id');
		$this->db->join('tbl_hotel d', 'd.id=a.hotel_id');
		$this->db->join('tbl_hotel_room e', 'e.id=a.room_id');
    	$this->db->where('c.id', $cat_id);
    	$this->db->where('b.hotel_id', $id);
		$this->db->limit($limit, $start);
		$query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	
	function ayurveda_hotel($category)
	{
		$this->db->distinct();
		$this->db->select('tbl_ayurveda.hotel_id');
        $this->db->from( 'tbl_ayurveda');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_ayurveda.category');
		$this->db->like('tbl_sub_category.name',$category);
        $query_res = $this->db->get();
		
        $result =$query_res->result(); 
        return $result;
        
	}

	function get_package($hotel_id,$category)
	{
		
		$this->db->select('tbl_ayurveda.id,tbl_ayurveda.title');
		$this->db->from('tbl_ayurveda');
		$this->db->join('tbl_sub_category','tbl_sub_category.id=tbl_ayurveda.category');
		$this->db->like('tbl_sub_category.name',$category);
		$this->db->where('tbl_ayurveda.hotel_id',$hotel_id);
		$query_res = $this->db->get();
		
        $result =$query_res->result(); 
		 //return $this->db->last_query(); 
        return $result;
		
	}
	
	 function roomsettings_ById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query_room = $this->db->get('tbl_ayurveda_rooms');
        return $query_room->row();
    }
	
	function allRooms($hotel_id)
    {
        $this->db->select('*');
		$this->db->where('hotel_id',$hotel_id);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->result();
    }
	
	
	function get_package_list($category)
	{
		
		$this->db->select('tbl_ayurveda.id,tbl_ayurveda.title');
		$this->db->from('tbl_ayurveda');
		$this->db->join('tbl_sub_category','tbl_sub_category.id=tbl_ayurveda.category');
		$this->db->like('tbl_sub_category.name',$category);
		$query_res = $this->db->get();
		
        $result =$query_res->result();  
        return $result;
		
	}
	
	function update_room($id,$data)
	{
		$query = $this->db->where('id',$id)->update('tbl_ayurveda_rooms',$data);
		return $this->db->affected_rows();
	}
	
	
	
}

?>