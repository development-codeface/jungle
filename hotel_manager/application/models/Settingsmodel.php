<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SettingsModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function row_count($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_staff');
        $result =$query_res->result();
        return count($result); 
	}
	
	function check_old_password($username,$password)
    {
    	$this->db->where('username',$username);
		$this->db->where('password',$password);
        $query=$this->db->get('tbl_hotel_manager');
        return count($query->result());
    }
	
   
    function change_password($username,$data)
    {
    	$this->db->where('username',$username);
        $this->db->update('tbl_hotel_manager', $data);
        return $this->db->affected_rows();
    }

		
	function addusers($data)
	{
        $this->db->insert('tbl_hotel_staff', $data);
        return $this->db->affected_rows();
	}
  
  	function list_users($id,$limit, $start)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_staff', $limit, $start);
        $result =$query_res->result();
        return $result;
	}

	function changestatus($id,$status)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel_staff', $status);
	}
	
	function editusers($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_hotel_staff');
		return $query->result();
	}
	
	function updateusers($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_hotel_staff', $data);
		return $this->db->affected_rows();
	}
	
		function list_hotel_staff($id)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
        $query_res=$this->db->get('tbl_hotel_staff');
        $result =$query_res->result();
        return $result;
		
	}
	
	function menu_setting($id,$user_id,$data)
	{
		$this->db->where('id', $user_id);
		$this->db->where('hotel_id', $id);
		$this->db->update('tbl_hotel_staff', $data);
		return $this->db->affected_rows();
	}

}

?>