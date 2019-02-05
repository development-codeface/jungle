<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroupModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function count_hotel($id)
	{
		$this->db->select('*');
		$this->db->where('group_id',$id);
        $query_res=$this->db->get('tbl_hotel');
        $result =$query_res->result();
        return count($result);
		
	}
   
    function alldetails($limit, $start ,$id)
    {
    	$this->db->select('*');
		$this->db->where('group_id',$id);
        $query_res=$this->db->get('tbl_hotel', $limit, $start);
        $result =$query_res->result();
        return $result;
    }
	
	function insert($data)
	{
		$query = $this->db->insert('tbl_hotel_groups',$data);
		return $this->db->affected_rows();
		
	}
	
	function username_exists($email)
	{
		$this->db->where('username',$email);
		$query = $this->db->get('tbl_hotel_groups');
		return $query->num_rows();
	}
	
	function edit($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_hotel_groups');
		return $query->result();
		
	}
	
	function update($id,$data)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_hotel_groups',$data);
		return $this->db->affected_rows();
				
	}

	function delete($id)
	{
		$data['group_id']=0;
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_hotel',$data);
		return $this->db->affected_rows();
				
	}
    function get_id($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('tbl_hotel_groups');
		return $query->result();
		
	}
	
	function check_old_password($username,$password)
    {
    	$this->db->where('username',$username);
		$this->db->where('password',$password);
        $query=$this->db->get('tbl_hotel_groups');
        return count($query->result());
    }
	
	  function change_password($username,$data)
    {
    	$this->db->where('username',$username);
        $this->db->update('tbl_hotel_groups', $data);
        return $this->db->affected_rows();
    }
}

?>