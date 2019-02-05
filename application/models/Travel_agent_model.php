<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Travel_agent_model extends CI_Model
{	
	function login_check($data)
	{
		$this->db->where($data);
		$this->db->where('status','1');
		$query=$this->db->get('tbl_travels');
		$query_res=$query->result();
		if(!empty($query_res))
		{ return 1; } else { return 0; }
	}
	
	function exists_email($data)
	{
		$this->db->where($data);
		$query=$this->db->get('tbl_travels');
		$query_res=$query->result();
		if(!empty($query_res))
		{ return 1; } else { return 0; }
	}
	
	function profile($data)
	{
		$this->db->where($data);
		$query=$this->db->get('tbl_travels');
		return $query_res=$query->row();
	}
	
	function update_profile($data,$id)
	{
		$this->db->where('id',$id);
		$query=$this->db->update('tbl_travels', $data);
		$affect=$this->db->affected_rows();
		return $affect;
	}
	
	function current_password($data)
	{
		$this->db->where($data);
		$query=$this->db->get('tbl_travels');
		return $query->num_rows();
	}
	
	function new_password($email,$password)
	{
		$data['password']= $password;
		$this->db->where('email', $email);
      	$result= $this->db->update('tbl_travels', $data);
		$afftectedRows = $this->db->affected_rows();
		
    	return $afftectedRows;
	}
}
