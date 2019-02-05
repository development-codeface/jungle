<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotelz_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_id($sub_cat)
	{
		return $this -> db -> like('name', $sub_cat) -> get('tbl_sub_category') -> row();
	}
	
	function new_hotels($id)
	{
		return $this->db->where('status', 1)->where('sub_category_id', $id)->order_by('id', "desc")->get('tbl_hotel', 4)->result();
	}
	
	function new_hotels_ayurveda($id)
	{
		//select a.* from tbl_hotel a join tbl_ayurveda b on a.id = b.hotel_id where b.category=6 group by a.title order by a.id desc
		$this -> db -> select('a.title as hotel,a.id,a.sub_category_id,a.star_rating,a.place,b.title,b.thumb_image,b.id as ayurveda_id');
		$this -> db -> from('tbl_hotel a');
		$this -> db -> join('tbl_ayurveda b', 'a.id = b.hotel_id');
		$this -> db -> where('a.status', 1);
		$this -> db -> where('b.category', $id);
		$this -> db -> order_by('b.id','random');
		$this -> db -> limit(4);
		return $this -> db -> get() -> result();
	}
	
	function hot_deals($limit, $start, $id)
	{
		$date = date('Y-m-d');
		$this->db->select('a.title AS hotel,a.id,a.des,b.offer,b.offer_type,c.thumb,d.state,d.district');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_offers b', 'a.id = b.hotel_id');
		$this->db->join('tbl_hotel_image c', 'a.id = c.hotel_id');
		$this->db->join('tbl_locations d', 'a.state = d.id');
		$this->db->where('a.sub_category_id',$id);
		$this -> db -> where('a.status', 1);
		$this->db->where('("'.$date.'"  BETWEEN b.from_date AND b.to_date)');
		$this->db->limit($limit,$start);
		$this->db->group_by('a.title');
		$query = $this -> db -> get();
		
		return $query->result();
	}
	
	
	
	function ayurveda_hot_deals($limit, $start, $id)
	{ 
		$date = date('Y-m-d');
		$this->db->select('a.offer,a.offer_type,c.title AS hotel,c.id,c.des,d.thumb,e.state,e.district,b.id as ayurveda_id');
		$this->db->from('tbl_offers a');
		$this->db->join('tbl_ayurveda b', 'a.hotel_id = b.hotel_id');
		$this->db->join('tbl_hotel c', 'c.id = b.hotel_id');		
		$this->db->join('tbl_hotel_image d', 'b.id = d.hotel_id');
		$this->db->join('tbl_locations e', 'c.state = e.id');
		$this->db->where('b.category',$id);
		$this->db->where('("'.$date.'"  BETWEEN a.from_date AND a.to_date)');
		$this -> db -> where('c.status', 1);
		$this->db->limit($limit,$start);
		$this->db->group_by('c.title');
		$query = $this -> db -> get();
		
		
		return $query->result();
	}
	
	function hotel_reviews($id)
	{
		
		$this->db->select('tbl_review.title,tbl_review.review,tbl_hotel.title as hotel, tbl_user.first_name, 
		tbl_user.last_name, tbl_user.photo, tbl_user.country,tbl_hotel.id as hotel_id,tbl_hotel.star_rating');
		$this -> db -> from('tbl_review');
		$this -> db -> join('tbl_hotel','tbl_review.hotel_id = tbl_hotel.id');
		$this -> db -> join('tbl_user','tbl_review.user_id = tbl_user.id');
		$this -> db -> where('tbl_hotel.sub_category_id', $id);
		$this -> db -> where('tbl_hotel.status', 1);
		$this -> db -> order_by('tbl_review.id', 'desc');
		$this -> db -> limit(3);
		$query = $this->db->get();
		
		
		return $query -> result();
		
		
	}
	
	function reviews_ayurveda($id)
	{
		//select a.title, a.review, c.title  as hotel, d.first_name, d.last_name, d.country from tbl_review a join tbl_ayurveda b join tbl_hotel c join tbl_user d on a.hotel_id = b.hotel_id and a.hotel_id = c.id and a.user_id = d.id and b.hotel_id = c.id where b.category = 7 group by a.title order by a.id desc
		$this -> db -> select('a.title, a.review, c.title as hotel, d.first_name, d.last_name,
		d.country, d.photo,c.id as hotel_id,b.id as ayurveda_id,c.star_rating');
		$this -> db -> from('tbl_review a');
		$this -> db -> join('tbl_ayurveda b','a.hotel_id = b.hotel_id');
		$this -> db -> join('tbl_hotel c','a.hotel_id = c.id');
		$this -> db -> join('tbl_user d','a.user_id = d.id');
		$this -> db -> where('b.category', $id);
		$this -> db -> where('c.status', 1);
		$this -> db -> group_by('a.title');
		$this -> db -> order_by('a.id','desc');
		$this -> db -> limit(3);
		return $this -> db -> get() -> result();
	}
	
	function new_packages()
	{
		return $this -> db
		-> select('a.id, a.title, a.description, a.nights, a.days, b.thumb_image')
		-> from('tbl_package a')
		-> join('tbl_package_image b','a.id = b.package_id')
		-> where('a.status', 1)
		-> order_by('a.id', 'desc')
		-> group_by('b.package_id')
		-> limit(4)
		-> get()
		-> result();
	}
}

?>