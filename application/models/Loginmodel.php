<?php

class Loginmodel extends CI_Model {

   
    function login_check($data)
    {
    	
        $this->db->select('*');
		$this->db->where('password',$data['password']);
		$this->db->where('email',$data['email']);				
		$this->db->where('status',1);
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
	
	
	
	 // function fb_login_check($data)
    // {
//     	
        // $this->db->select('*');
		// $this->db->where('email',$data['email']);
		// $query_res=$this->db->get('registration');
		// $result=$query_res->result();
		// if(!empty($result))
		// {
			// return 1;
		// }
		// else
		// {
			// return 0;
		// }
    // }
// 	
// 	
	// function check_usermail($data)
	// {
		 // $this->db->select('*');
		// $this->db->where('email',$data['email']);
		// $query_res=$this->db->get('registration');
		// $result=$query_res->result();
		// if(!empty($result))
		// {
			// return 1;
		// }
		// else
		// {
			// return 0;
		// }
// 		
	// }
    

}

?>