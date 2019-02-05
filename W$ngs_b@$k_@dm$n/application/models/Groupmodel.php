<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroupModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function alldetails($limit, $start)
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_hotel_groups', $limit, $start);
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
		//echo $this->db->last_query();
		return $this->db->affected_rows();
				
	}
	
	function update_username($id,$username)
	{
		$this->db->where('username',$username);
		$this->db->where('id!=',$id);
		$query = $this->db->get('tbl_hotel_groups');
		return $query->num_rows();
	}
	
	

	function delete($id,$status)
	{
		/* $this->db->where('id',$id);
		$this->db->delete('tbl_hotel_groups'); */
		$data['status']=$status;
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_hotel_groups',$data);
		return $this->db->affected_rows();
	}
    
}

?>