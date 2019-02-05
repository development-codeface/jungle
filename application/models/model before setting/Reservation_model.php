<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_model extends CI_Model
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
	
	
	function ayurveda_rooms($ayurveda_id)
	{
		$date = date('Y-m-d');
		
		 $this -> db -> select('c.room_des,c.room_bed_size,c.room_beds,c.room_title,c.room_size,c.id as roomid,b.title');
		$this -> db -> from('tbl_ayurveda_rooms a');
		$this -> db -> join('tbl_ayurveda b', 'a.ayurveda_id = b.id');
		$this -> db -> join('tbl_hotel_room c', 'a.room_id = c.id');
		$this -> db -> where('a.available_status', 1);
		$this -> db -> where('a.ayurveda_id', $ayurveda_id);
		$query= $this->db->group_by('a.room_id');
		//echo $this->db->last_query(); exit;
		return $this -> db -> get() -> result();
		
			
			
	}
	
	
	/* function ayurveda_rooms_detail($ayurveda_id)
	{
		echo $this->db->last_query();
		return "asdasdasdasdas";
	}
	
	 */
	

	function getOffer($date, $id)
	{
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
		{ 
		$date = date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d') ; 
		$next_day  = date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d') ; 
		}else
		{
			$dat_query ='';
			$date = (date('Y-m-d'));
			$next_day =  strtotime(date('Y-m-d', strtotime(' +1 day'))); 
		}
		//$dat_query = ' and (("'.$date.'"  BETWEEN from_date AND to_date ) AND ("'.$next_day.'"  BETWEEN from_date AND to_date))';
		$this->db->where('(("'.$date.'"  BETWEEN from_date AND to_date ) AND ("'.$next_day.'"  BETWEEN from_date AND to_date))');
		//$this->db->where('("'.$date.'"  BETWEEN from_date AND to_date )');
		$this->db->where('hotel_id', $id);
		$query=$this->db->get('tbl_offers');
		return $query->row();
	}
	
	
	
	function ayurveda_detailsById($id)
	{
		$this -> db -> select('a.*,b.title as ayurveda_title ,b.category,b.description,b.image,b.thumb_image,b.id as ayurveda_id');
		$this -> db -> from('tbl_hotel a');
		$this -> db -> join('tbl_ayurveda b', 'a.id = b.hotel_id');
		$this -> db -> where('a.status', 1);
		$this -> db -> where('b.id', $id);
		return $this -> db -> get() -> row();
	}
	
	
	
	
	
	function roomsByHotel($id)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
		$this->db->where('a.hotel_id', $id);	
		$this->db->group_by('a.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	function imagesById($id)
	{
		$query=$this->db->where('room_id', $id)->get('tbl_hotel_room_image');
		return $query->result();
	}
	
	function facilitiesById($id)
	{
		$query=$this->db->where('room_id', $id)->get('tbl_hotel_room_facilities');
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
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		
		}
		
		$this->db->where('room_id', $id);
		$query=$this->db->get('tbl_hotel_room_settings');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	function tax_amount_off($hotel)
	{
		$this->db->select('*');
        $this->db->from( 'tbl_tax');
		$this->db->where( 'hotel_id',$hotel)->where('season','off_season');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	
	function tax_amount($hotel)
	{
		$this->db->select('*');
        $this->db->from( 'tbl_tax');
		$this->db->where( 'hotel_id',$hotel)->where('season','season');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	
	
	
	function rooms_count($hotel,$id)
	{
		$date =  date('Y-m-d');
		 $next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('((a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'") or (a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'"))');	
		}
		else
		{
			$this->db->where('((a.check_in BETWEEN "'. $date. '" and "'. $next_day.'") or (a.check_out BETWEEN "'. $date. '" and "'. $next_day.'"))');
			//$this->db->where('("'.$date.'"  BETWEEN a.check_in AND a.check_out )');	
		}
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('d.id',$id);
		$q1 = $this->db->get();
		
		//echo $this->db->last_query();
		  $booked_rooms1 =  count($q1->result());
		
		
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('((a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'") or (a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'"))');	
		}
		else
		{
			$this->db->where('((a.check_in BETWEEN "'. $date. '" and "'. $next_day.'") or (a.check_out BETWEEN "'. $date. '" and "'. $next_day.'"))');
			//$this->db->where('("'.$date.'"  BETWEEN a.check_in AND a.check_out )');	
		}
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('d.id',$id);
		$q2 = $this->db->get();
		
		
		
		
		
		$booked_rooms2 =  count($q2->result());
				
		$booked_rooms =  $booked_rooms1+ $booked_rooms2;
				
		$this->db->select('a.room_number');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$id);
		//$this->db->where('a.status','1');
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('(("'.$checkin.'"  NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$checkout.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
		}
		else
		{
			$this->db->where('(("'.$date.'" NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$next_day.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
			
		}
		$query = $this->db->get();
		$total_rooms = count($query->result());
		$remaining_room = $total_rooms - $booked_rooms;
		
		
		return $remaining_room;
		
	}
	
	function package_list($id)
	{
		$this->db->distinct();
		$this->db->select('a.id');
		$this->db->from('tbl_ayurveda as a');
		$this->db->join('tbl_hotel as b','a.hotel_id=b.id');
		$this->db->where('b.id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function package_name($id)
	{
		$this->db->select('a.title');
		$this->db->from('tbl_ayurveda as a');
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	function ayur_settingsByRoom($id,$pack)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
		}
		else
		{	
		$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		
		}
		$this->db->where('room_id', $id);
		$this->db->where('ayurveda_id', $pack);
		$query=$this->db->get('tbl_ayurveda_rooms');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	

	
	
}

?>