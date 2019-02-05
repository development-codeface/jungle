<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_detail_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function manager($id) {
		return $this -> db
		-> where('hotel_id', $id)
		-> get('tbl_hotel_manager')
		-> row();
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
	
	function imagesById($id)
	{
		$query=$this->db->where('hotel_id', $id)->get('tbl_hotel_image');
		return $query->result();
	}
	
	function facilitiesById($id)
	{
		$query = $this->db->where('hotel_id', $id)->get('tbl_hotel_facilities');
		return $query->row();
	}
	
	function getReviews($id,$limit)
	{
		$this -> db -> select('a.first_name, a.last_name, a.city, b.review, b.title');
		$this -> db -> from('tbl_user a');
		$this -> db -> join('tbl_review b', 'a.id = b.user_id');
		$this -> db -> where('b.hotel_id', $id);
		$this -> db -> limit($limit);
		$this -> db -> order_by('b.id','desc');
		return $this -> db -> get() -> result();
	}
	
	function allReviews($id)
	{
		$this -> db -> select('a.*, b.first_name, b.last_name, b.state, b.country, b.photo');
		$this -> db -> from('tbl_review a');
		$this -> db -> join('tbl_user b', 'a.user_id = b.id');
		$this -> db -> where('a.hotel_id', $id);
		$this -> db ->order_by('a.id', 'desc');
		$query = $this -> db -> get();
		return $query -> result(); 
	}
	
	function reviewHotel($id)
	{
		$this->db->select('a.*, b.thumb, c.*');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_hotel_image b', 'a.id=b.hotel_id');
		$this->db->join('tbl_locations c','c.id = a.state');
		$this->db->where('a.id', $id);
		$this->db->where('a.status', 1);
		$this->db->group_by('a.id');
		return $this->db->get()->row();
	}

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
		$this -> db -> select('a.*,b.title as ayurveda_title ,b.days,b.category,b.description,b.image,b.thumb_image,b.id as ayurveda_id');
		$this -> db -> from('tbl_hotel a');
		$this -> db -> join('tbl_ayurveda b', 'a.id = b.hotel_id');
		$this -> db -> where('a.status', 1);
		$this -> db -> where('b.id', $id);
		return $this -> db -> get() -> row();
	}
	
	
	
	function ayurveda_rooms($ayurveda_id)
	{
		$date = date('Y-m-d');
		
		$this -> db -> select('c.room_title,c.room_size,c.id as roomid,b.title');
		$this -> db -> from('tbl_ayurveda_rooms a');
		$this -> db -> join('tbl_ayurveda b', 'a.ayurveda_id = b.id');
		$this -> db -> join('tbl_hotel_room c', 'a.room_id = c.id');
		$this -> db -> where('a.available_status', 1);
		//$this->db->where('("'.$date.'"  BETWEEN a.valid_from AND a.valid_upto )');
		$this -> db -> where('a.ayurveda_id', $ayurveda_id);
		$this->db->group_by('a.room_id');
		
		return $this -> db -> get() -> result();
		
	}
	
	function getdistrict($id)
	{
		$this->db->select('*');
		$this->db->where('tbl_locations.id',$id);
		$query =$this->db->get('tbl_locations');
		return $query->result();
	}
}

?>