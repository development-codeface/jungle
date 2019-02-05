<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SettingsModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function check_old_password($username,$old_pass)
	{
		$this->db->where('username',$username);
        $this->db->where('password', $old_pass);
		$query = $this->db->get('tbl_site_manager');
        return count($query->result());
	}
	
    function change_password($username,$data)
    {
    	$this->db->where('username',$username);
        $this->db->update('tbl_site_manager', $data);
        return $this->db->affected_rows();
    }

	function select_admin($username)
	{
		$this->db->select('name');
		$this->db->where('username',$username);
        $query = $this->db->get('tbl_site_manager');
		$row= $query->row();
        return $row->name;
	}
	
	function addusers($data)
	{
        $this->db->insert('tbl_site_users', $data);
        return $this->db->affected_rows();
	}
  
  	function list_users($limit, $start)
	{
		$this->db->select('*');
        $query_res=$this->db->get('tbl_site_users', $limit, $start);
        $result =$query_res->result();
        return $result;
	}

	function changestatus($id,$status)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_site_users', $status);
	}
	
	function editusers($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_site_users');
		return $query->result();
	}
	
	function updateusers($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_site_users', $data);
		
		return $this->db->affected_rows();
	}
	
	
	
	

}

?>