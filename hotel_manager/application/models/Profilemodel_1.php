<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function get_id($username)
    {
		$hotelnum=$this -> session -> userdata['hotel_num'];
		if($this -> session -> userdata['user_type']=='manager')
		{
    	$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('hotel_number',$hotelnum);
        $query_res=$this->db->get('tbl_hotel_manager');
        $result =$query_res->row();
		}
		else
		{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('hotel_number',$hotelnum);
        $query_res=$this->db->get('tbl_hotel_staff');
        $result =$query_res->row();	
		}
        return $result->hotel_id;
    }
	
	function select_menu($username,$id)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_staff');
        $result =$query_res->row();	
		return $result->menu;
	}
	
	function select_user_menu($user,$id)
	{
		$this->db->select('*');
		$this->db->where('id',$user);
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_staff');
        $result =$query_res->row();	
		return $result->menu;
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
	
	function category($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query_country = $this->db->get('tbl_category');
		$row= $query_country->row();
		return $row->name;
	}
	
	function sub_category($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id); 
		$query_country = $this->db->get('tbl_sub_category');
		$row= $query_country->row();
		return $row->name;
	}
	
	
	function select_images($hotel_id,$image_id)
	{
		$query = $this->db->where('hotel_id',$hotel_id)->get('tbl_hotel_image');
		return $query->result();
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
	
	
	function image_update($image_id,$data)
	{
		$query = $this->db->where('id',$image_id)->update('tbl_hotel_image',$data);
		return $this->db->affected_rows();
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

   
}

?>