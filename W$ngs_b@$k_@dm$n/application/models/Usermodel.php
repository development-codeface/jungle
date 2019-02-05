<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function alldetails($limit, $start)
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_user', $limit, $start);
        $result =$query_res->result();
        return $result;
    }

    function block($id)
	{
		$data = array('status' => 0);
		
		$this->db->where('id', $id);
		$this->db->update('tbl_user', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">User status updated.</div>');
	}
	
	function unblock($id)
	{
		$data = array('status' => 1);
		
		$this->db->where('id', $id);
		$this->db->update('tbl_user', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">User status updated.</div>');
	}
}

?>