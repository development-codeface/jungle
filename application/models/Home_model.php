<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	
	function new_hotels()
	{
		$query = $this->db->where('status', 1)->order_by('id', "desc")->get('tbl_hotel', 4);
		return $query->result();
	}
	
	
		function reviews()
	{
		$this -> db -> select('a.title, a.review, b.first_name, b.last_name, b.country, c.title as hotel, b.photo');
		$this -> db -> from('tbl_review a');
		$this -> db -> join('tbl_user b', 'a.user_id = b.id');
		$this -> db -> join('tbl_hotel c', 'a.hotel_id = c.id');
		$this -> db -> where('c.status', 1);
		
		return $this -> db -> get() -> result();
	}
	
	function hot_deals($limit, $start)
	{
		
		$this -> db -> select('a.title AS hotel,a.id,a.des,b.offer,c.thumb,d.state,d.district');
		$this -> db -> from('tbl_hotel a');
		$this -> db -> join('tbl_offers b', 'a.id = b.hotel_id');
		$this -> db -> join('tbl_hotel_image c', 'a.id = c.hotel_id');
		$this -> db -> join('tbl_locations d', 'a.state = d.id');
		$this -> db -> where('a.status', 1);
		$this->db->limit($limit,$start);
		$this->db->group_by('a.title');
		
		$query = $this -> db -> get();
		
		// $this->db->last_query();
		
		return ($query->result());
		
		
		// $query = "SELECT a.title AS hotel, a.des, b.offer, c.thumb, d.state , d.district  FROM tbl_hotel a JOIN
		 // tbl_offers b ON a.id = b.hotel_id join tbl_hotel_image as c on a.id=c.hotel_id join tbl_locations as d on a.state = d.id limit $start, $limit";
// 		
		// return $this -> db->query($query -> result());
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
	
		function logo($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel', $data);
	}
	
	
}

?>