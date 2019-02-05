<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_model extends CI_Model {


	function generate_coupon($data)
	{
		$this->db->insert('tbl_coupon',$data);
		return $this->db->affected_rows();
		
	}

	function get_coupon($user_id, $hotel)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->where('hotel_id',$hotel);
		$this->db->where('status',1);
        $query_res=$this->db->get('tbl_coupon');
        $result =$query_res->result();
		if(count($result) == 0)
		{ return count($result); }
		else {
			return $result;
		}
	}
	
	function coupon_exists($user_id, $hotel)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->where('hotel_id',$hotel);
        $query_res=$this->db->get('tbl_coupon');
        $result =$query_res->result();
        return count($result);
	}
	
	function update_coupon($data)
	{
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('hotel_id',$data['hotel_id']);
		$this->db->update('tbl_coupon',$data);
	}
	
  	function get_userids($id, $key)
	{
		$this->db->distinct();
		$this->db->select('b.user_id');
		$this->db->from('tbl_user a');
		$this->db->join('tbl_booking b', 'a.id = b.user_id');
		$this->db->where('b.hotel_id',$id);
		$this->db->like('a.first_name', $key);
		$this->db->or_like('a.last_name', $key);
		$this->db->or_like('a.email', $key);
		$this->db->or_like('a.country', $key);
		$this->db->order_by('b.booking_number','desc');
		$query=$this->db->get();
		return $query->result();
	}

  	function get_users($id)
	{
		$this->db->distinct();
		$this->db->select('b.user_id');
		$this->db->from('tbl_user a');
		$this->db->join('tbl_booking b', 'a.id = b.user_id');
		$this->db->where('b.hotel_id',$id);
		$this->db->order_by('b.booking_number','desc');
		$query=$this->db->get();
		return $query->result();
	}
}

?>