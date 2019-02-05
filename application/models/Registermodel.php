<?php

class Registermodel extends CI_Model {


	function __construct() 
	{
		// Call the Model constructor
		parent::__construct();
	}


	function insert_entry($data) 
	{

		return $this -> db -> insert('tbl_user', $data);
	}


	function username_exists($key) 
	{

		$this -> db -> where('email', $key);
		$query = $this -> db -> get('tbl_user');

		if ($query -> num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	function google_signup($data_user) 
	{
		$this -> db -> insert('tbl_user', $data_user);
	}
	
	
	function email_exist($mail)
    {
		$this->db->where('email',$mail['email']);
		$query_res=$this->db->get('tbl_user');
		$result=$query_res->result();
		if(!empty($result))
		{
			return 1;
		}
		else
		{
			return 0;
		}
    }
	
	
	function newsmail($data)
	{
		$this->db->where('email',$data['email']);
		$query_res=$this->db->get('tbl_news_letter');
		$result=$query_res->result();
		if(!empty($result))
		{
			return 1;
		}
		else {
			$this->db->insert('tbl_news_letter',$data);
			return 0;
		}
	}

	
	function new_password($email,$password)
	{
		$data['password']= $password;
		$this->db->where('email', $email);
      	$result= $this->db->update('tbl_user', $data);
		$afftectedRows = $this->db->affected_rows();
		
    	return $afftectedRows;
	}

}
?>