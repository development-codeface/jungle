<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function row_count($id)
	{
		$this->db->distinct();
		$this->db->select('user_id');
		$this->db->where('hotel_id',$id)->where('user_id!=','');
        $query_res=$this->db->get('tbl_booking');
        $result =$query_res->result();
        return count($result);
	}
   
    
  	function get_userid($id,$limit, $start)
	{
		$this->db->distinct();
		$this->db->select('user_id');
		$this->db->where('hotel_id',$id)->where('user_id!=','');
		$this->db->order_by('booking_number','desc');
        $query_res=$this->db->get('tbl_booking', $limit, $start);
        $result =$query_res->result();
        return $result;
        //return $this->db->last_query(); 
	}


 
  	function get_users($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
        $query_res=$this->db->get('tbl_user');
        $result =$query_res->result();
        return $result;
	}
	
	function get_oofline_users($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
        $query_res=$this->db->get('tbl_offline_user');
        $result =$query_res->result();
        return $result;
	}
	
	function booking_count($user_id)
	{
		$this->db->distinct();
		$this->db->select('booking_number');
		$this->db->where('user_id',$user_id);
        $query_res=$this->db->get('tbl_booking');
        $result =$query_res->result();
        return count($result);
	}
	
	function user_row_count($id,$status)
	{
		if($status=='offline')
		{
			$field='offline_user';
		}
		else
		{
			$field='user_id';
		}
		$this->db->distinct();
		$this->db->select($field);
		$this->db->where('hotel_id',$id)->where($field.'!=','');
        $query_res=$this->db->get('tbl_booking');
        $result =$query_res->result();
        return count($result);
	}

    function user_status($id,$status,$limit, $start)
	{
		if($status=='offline')
		{
			$field='offline_user';
		}
		else
		{
			$field='user_id';
		}
		$this->db->distinct();
		$this->db->select($field);
		$this->db->where('hotel_id',$id)->where($field.'!=','');
        $query_res=$this->db->get('tbl_booking', $limit, $start);
        $result =$query_res->result();
        return $result;
	}
	
	
	
	
}

?>