<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TravelsModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function alldetails($limit, $start)
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_travels', $limit, $start);
        $result =$query_res->result();
        return $result;
    }
	
	function insert($data)
	{
		$query = $this->db->insert('tbl_travels',$data);
		return $this->db->affected_rows();
		
	}
	
	function username_exists($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_travels');
		return $query->num_rows();
	}
	
	function edit($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_travels');
		return $query->result();
		
	}
	
	function update($id,$data)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_travels',$data);
		return $this->db->affected_rows();
				
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_travels');
	}
    
}

?>