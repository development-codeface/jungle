<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContactModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function alldetails($limit, $start)
    {
    	$this->db->select('*');
        $query_res=$this->db->get('tbl_contact', $limit, $start);
        $result =$query_res->result();
        return $result;
    }
	function delete($id)
    {
    	
			$this->db->where('id', $id);
			$this->db->delete('tbl_contact'); 
        
    }
   
}

?>