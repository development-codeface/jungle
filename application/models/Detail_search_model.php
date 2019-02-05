<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_search_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function user($email)
	{
		return $query=$this->db->where('email', $email)->get('tbl_user')->row();
	}
	
	function detailsById($id)
	{
		$this->db->select('*');
		$query=$this->db->where('id', $id)->where('status', 1)->get('tbl_hotel');
		return $query->row();
	}
	
	function settingsByRoom($id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		$this->db->select('*');
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
		
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) or ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) or ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		
		}
		$this->db->where('available_status', 1);
		$this->db->where('room_id', $id);
		$query=$this->db->get('tbl_hotel_room_settings');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	

	
}

?>