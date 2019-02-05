<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function listhotels()
	{
		$this->db->select('*');
		$this->db->order_by('title','asc');
		$query_res = $this->db->get('tbl_hotel');
		return $result =$query_res->result();
	}
	
	function add_commision($datas)
	{
		$this->db->insert('tbl_commision',$datas);
		return $this->db->affected_rows();
	}
	
	
	function check_commision($datas)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
        $this->db->from( 'tbl_commision');
		$this->db->like('date(date)',$date);
		$this->db->where( 'hotel_id',$datas['hotel_id']);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return $result;
    }
	
	function hotel_commision_count($hotel)
	{
		$this->db->select('*');
        $this->db->from('tbl_commision');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_commision.hotel_id');
		$this->db->where( 'hotel_id',$hotel);
		$this->db->order_by('tbl_commision.date','desc');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return count($result);
	}
	function hotel_commision($hotel,$limit,$start)
	{
		$this->db->select('*');
        $this->db->from('tbl_commision');
		$this->db->join('tbl_hotel','tbl_hotel.id=tbl_commision.hotel_id');
		$this->db->where( 'hotel_id',$hotel);
		$this->db->order_by('tbl_commision.date','desc');
		$this->db->limit($limit,$start);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
		
        return $result;
	}
	
	function hotel_avilable($hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->where('hotel_id',$hotel);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');
		$this->db->where('available_status','1');		
		$query_res = $this->db->get('tbl_hotel_room_settings');
		return count($result =$query_res->result());
	}
	
	function package_avilable($hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->where('hotel_id',$hotel);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		$query_res = $this->db->get('tbl_ayurveda_rooms');
		return count($result =$query_res->result());
	}
	
	function allrooms($id)
    {
        /* $this->db->select('*');
        $this->db->from( 'tbl_hotel_room');
		$this->db->where( 'hotel_id',$id);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result; */
		
		
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->where('hotel_id',$id);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');
		$this->db->where('available_status','1');		
		$query_res = $this->db->get('tbl_hotel_room_settings');
		return $result =$query_res->result();
		
    }
	
	
	function package_rooms($hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->where('hotel_id',$hotel);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		$query_res = $this->db->get('tbl_ayurveda_rooms');
		return $result =$query_res->result();
	}
	
	function room_basic_price($room,$hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->or_where('id',$room);
		$this->db->where('hotel_id',$hotel);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		$query_res = $this->db->get('tbl_hotel_room_settings');
		return $result =$query_res->result();
		
	}
	
	function room_detail($id)
	{ 
		$this->db->select('*');
        $this->db->from( 'tbl_hotel_room');
		$this->db->where( 'id',$id);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result; 
		
	}
	
	function package_room_basic_price($room,$hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
		$this->db->or_where('id',$room);
		$this->db->where('hotel_id',$hotel);
		
		$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		$query_res = $this->db->get('tbl_ayurveda_rooms');
		return $result =$query_res->result();
	}
	
	function hotel_tariff($hotel)
	{
		$this->db->select('*');
        $this->db->from( 'tbl_agency');
		$this->db->where( 'hotel_id',$hotel);
		$this->db->like( 'agency','bookingwings');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
		return $result;
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
	
	
	function offer_price($id)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
        $this->db->from( 'tbl_offers');
		$this->db->where( 'hotel_id',$id);
		$this->db->where('("'.$date.'"  BETWEEN from_date AND to_date )');	
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
	
	function room($id)
	{
		$this -> db -> select('id as room_id, room_title') -> from('tbl_hotel_room') -> where('hotel_id', $id);
		$query = $this -> db-> get();
		return $query -> result();
	}

	function get_booking_room($room_id,$hotel_id,$date)
	{
		$this->db->select('tbl_booking.booking_number,tbl_booking.id,tbl_booking.category,tbl_booking.date,tbl_booking.number_of_rooms,tbl_hotel_room_settings.price');
        $this->db->from( 'tbl_booking');
		$this->db->join( 'tbl_hotel','tbl_hotel.id=tbl_booking.hotel_id');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.id=tbl_booking.room_id');
		$this->db->where('tbl_hotel_room_settings.hotel_id',$hotel_id)->where('tbl_hotel_room_settings.room_id',$room_id)->where('tbl_booking.user_id!=','');
		$this->db->where('tbl_booking.status!=','0');
		$this->db->like('tbl_booking.date',$date,'after');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
		//echo $this->db->last_query(); exit;
        return $result;
		
	}
	
	function get_commision($date,$hotel_id,$day,$month)
	{
		$this->db->select('*');
		$this->db->where('hotel_id',$hotel_id)->where('date<=',$date);
		$this->db->where('day(date)',$day) ->where('month(date)',$month);
        $query_res = $this->db->get('tbl_commision');
        $result =$query_res->row(); 
		//echo $this->db->last_query(); exit;
		//print_r($result); exit;
        return $result; 
	}


   function getnumber($id, $c_in, $c_out, $limit, $start)
   {
   	$this->db->distinct();
   	$this->db->select('booking_number, offline_user, category')->where('hotel_id',$id);
	$this->db->where('(status = 0 or status = 1)');
	$this->db->where('offline_user', 0);
	$this->db->where('date >=', $c_in);
	$this->db->where('date <=', $c_out);
	$this->db->limit($limit,$start);
	$query =$this->db->get('tbl_booking');
	return $query->result();
   }
	
   function booking_details($booking_number, $id)
   {
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title,a.commision,a.room_rate');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_hotel_room_settings as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
   
   function booking_details_package($booking_number, $id)
   {
		$this->db->select('a.id as booking_id,a.date,a.booking_number,a.check_in,a.check_out,a.number_of_rooms,
		a.discount,a.payment,a.tax,a.total_amount,a.child_rate,a.bed_rate,a.status,a.number_of_childrens,
		b.price,b.room_child_rate,b.allowed_persons,c.first_name,c.phone,c.address,c.email,d.room_title,a.commision,a.room_rate');
		$this->db->from('tbl_booking as a');
		$this->db->join('tbl_ayurveda_rooms as b','b.id=a.room_id');
		$this->db->join('tbl_user as c','c.id=a.user_id');
		$this->db->join('tbl_hotel_room as d','b.room_id=d.id');
		$this->db->where('a.booking_number',$booking_number);
		$this->db->where('a.hotel_id',$id);
		$this->db->where('(a.status = 0 or a.status = 1)');
		$query1 = $this->db->get();
		
		return $query1->result();
		
   }
   
	function count_commision($id, $cin, $cout)
	{
		$this->db->distinct();
	   	$this->db->select('booking_number')->where('hotel_id',$id);
		$this->db->where('(status = 0 or status = 1)');
		$this->db->where('offline_user', 0);
		$this->db->where('date >=', $cin);
		$this->db->where('date <=', $cout);
		$query =$this->db->get('tbl_booking');
		return count($query->result());
	}
}

?>