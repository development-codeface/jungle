<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
    function hotel_log_count($from,$to,$data)
	{
		
		if($data['hotel_id']== ''){			
			 $sql = "SELECT c.* , a.title as hotel from  tbl_hotel as a join tbl_hotelmanager_log as c on a.id = c.hotel_id   where  c.date >=  '".$from."' and  c.date <=  '".$to."'";
			 $query = $this->db->query($sql);
		 
		     $result=$query->num_rows();
			
			  return $result;
		}
		else if($data['hotel_id'] != ''){
			 
			  $sql = "SELECT c.* , a.title as hotel from  tbl_hotel as a join tbl_hotelmanager_log as c on a.id = c.hotel_id  where c.hotel_id = '".$data['hotel_id']."' and c.date >=  '".$from."' and  c.date <=  '".$to."' ";
			 $query = $this->db->query($sql);
		 
		     $result=$query->num_rows();
			
			  return $result;
		
		}
	}
	
    function hotel_log($from,$to,$data,$limit,$start)
	{
		
		 if($data['hotel_id']== ''){			
			 $sql = "SELECT c.* , a.title as hotel from  tbl_hotel as a join tbl_hotelmanager_log as c on a.id = c.hotel_id   where  c.date >=  '".$from."' and  c.date <=  '".$to."' limit $start,$limit";
			 $query = $this->db->query($sql);
		 
		     $result=$query->result();
			
			  return $result;
		}
		else if($data['hotel_id'] != ''){
			 
			  $sql = "SELECT c.* , a.title as hotel from  tbl_hotel as a join tbl_hotelmanager_log as c on a.id = c.hotel_id  where c.hotel_id = '".$data['hotel_id']."' and c.date >=  '".$from."' and  c.date <=  '".$to."' limit $start,$limit";
			 $query = $this->db->query($sql);
		 
		     $result=$query->result();
			
			  return $result;
		
		}
	}
    
    function sub_category()
	{
		$this->db->select('tbl_sub_category.name,tbl_sub_category.id');
		$this->db->from('tbl_sub_category');
		$this->db->join('tbl_category','tbl_category.id=tbl_sub_category.category_id');
		$this->db->like('tbl_category.name','hotel');
		$this->db->order_by('tbl_sub_category.name','asc');
        $query_res=$this->db->get();
        $result =$query_res->result();
	
        return $result;
	}
	
	function row_count($category,$status)
	{
		$this->db->select('*');
		$this->db->where('sub_category_id',$category);
		$this->db->where('status',$status);
		$query = $this->db->get('tbl_hotel');
        $result =$query->result(); 
        return count($result);
	}	

	function hotel_list($category,$status,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_hotel');
		$this->db->where('sub_category_id',$category);
		$this->db->where('status',$status);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		
		return $query->result();
		
  	 }
	
	// function select_location($location)
	// {
		 // $this->db->select('*');
		 // $this->db->where('location_id',$location);
		 // $query = $this->db->get('location');
		 // $row= $query->row();
		 // return $row->name;
// 		
	// }

	function select_location($location)
	{
		 $this->db->select('*');
		 $this->db->where('id',$location);
		 $query = $this->db->get('tbl_locations');
		 $row= $query->row();
		 return $row;
		
	}
    
	function all_hotels()
	{
		$this->db->select('id,title');
		$this->db->order_by('title asc');
		$query = $this->db->get('tbl_hotel');
		return $query ->result();
	}
	
	function online_report_count($from,$to,$hotel,$num)
	{
		
		$this -> db-> select('c.title as hotel,b.*');
		$this -> db-> from('tbl_user a');
		$this -> db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel c','c.id = b.hotel_id');
		$this -> db-> where('b.agency', 0);
		$this -> db-> where("b.agency REGEXP '[0-9]+'");
		$this -> db-> where('b.user_id !=', 0);
		$this -> db-> where('b.offline_user', 0);
		$this -> db-> where('b.reservation', 0);
		$this -> db-> where('b.date >=', $from);
		$this -> db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		$this -> db -> group_by('b.booking_number');
		$query = $this -> db -> get();
		//echo $this->db->last_query();
		return $query->num_rows();
		//return count($query->num_rows()); 
		//-> num_rows();
		
		
	}

	function online_report($from,$to,$hotel,$num,$limit,$start)
	{
		
		$this -> db-> select('c.title as hotel,b.*');
		$this -> db-> from('tbl_user a');
		$this -> db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel c','c.id = b.hotel_id');
		$this -> db-> where('b.agency', 0);
		$this -> db-> where("b.agency REGEXP '[0-9]+'");
		$this -> db-> where('b.user_id !=', 0);
		$this -> db-> where('b.offline_user', 0);
		$this -> db-> where('b.reservation', 0);
		$this -> db-> where('b.date >=', $from);
		$this -> db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		return $this -> db -> group_by('b.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		//echo $this -> db -> last_query(); exit;
	}
	
	
	function online_cancel_count($from,$to,$hotel,$num)
	{
		
		$this -> db-> select('c.id ,c.title as hotel,b.*');
		$this->db-> from('tbl_user a');
		$this->db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel as c','c.id = b.hotel_id');
		$this->db-> where('b.cancel', 1);
		$this->db-> where('b.user_id !=', 0);
		$this->db-> where('b.offline_user', 0);
		$this->db-> where('b.date >=', $from);
		$this->db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		return $this -> db -> group_by('b.user_id,b.booking_number')
		-> get()
		-> num_rows();
	}
	
	function online_cancel_report($from,$to,$hotel,$num,$limit,$start)
	{
		
		$this->db-> select('a.id ,a.title as hotel,tbl_booking.*,tbl_user.*');
		$this->db-> from('tbl_booking');
		$this->db-> join('tbl_hotel as a','a.id = tbl_booking.hotel_id');
		$this->db-> join('tbl_user','tbl_booking.user_id = tbl_user.id');
		$this->db-> where('tbl_booking.cancel',1);
		$this->db-> where('tbl_booking.offline_user', 0);
		$this->db-> where('tbl_booking.date >=', $from);
		$this->db-> where('tbl_booking.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('tbl_booking.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('tbl_booking.booking_number', $num);
		}
		return $this -> db -> group_by('tbl_booking.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		
	}
	
	function cancel_update($book_no){
		
	$this->db->set('cancel',2);
	$this->db->where('booking_number',$book_no);
	$this->db->update('tbl_booking');
	
	$id = $this -> db
	-> where('booking_number', $book_no)
	-> get('tbl_booking')
	-> row();
	
	$this->db->set('status',3);
	$this->db->where('booking_id',$id -> id);
	$this->db->update('tbl_booking_rooms');
		
	}
	
		function amend_update($book_no){
		
	$this->db->set('amend',2);
	$this->db->where('booking_number',$book_no);
	$this->db->update('tbl_booking');
		
	}
	
	function online_amend_report($from,$to,$hotel,$num,$limit,$start)
	{
		$this->db-> select('a.id ,a.title as hotel,tbl_booking.*,tbl_user.*');
		$this->db-> from('tbl_booking');
		$this->db-> join('tbl_hotel as a','a.id = tbl_booking.hotel_id');
		$this->db-> join('tbl_user','tbl_booking.user_id = tbl_user.id');
		$this->db-> where('tbl_booking.amend',1);
		$this->db-> where('tbl_booking.offline_user', 0);
		$this->db-> where('tbl_booking.date >=', $from);
		$this->db-> where('tbl_booking.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('tbl_booking.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('tbl_booking.booking_number', $num);
		}
		return $this -> db -> group_by('tbl_booking.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		
	}
	
	function online_amend_count($from,$to,$hotel,$num)
	{
		
		$this -> db-> select('c.id,c.title as hotel,b.*');
		$this->db-> from('tbl_user a');
		$this->db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel as c','c.id = b.hotel_id');
		$this->db-> where('b.amend', 1);
		$this->db-> where('b.user_id !=', 0);
		$this->db-> where('b.offline_user', 0);
		$this->db-> where('b.date >=', $from);
		$this->db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		return $this -> db -> group_by('b.user_id,b.booking_number')
		-> get()
		-> num_rows();
	}
	
	
	function reservation_report_count($from,$to,$hotel,$num)
	{
		
		$this->db->select('c.title as hotel,b.*');
		$this -> db-> from('tbl_user a');
		$this -> db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel c','c.id = b.hotel_id');
		$this -> db-> where('b.agency', 0);
		$this -> db-> where('b.user_id !=', 0);
		$this -> db-> where('b.offline_user', 0);
		$this -> db-> where('b.reservation', 1);
		$this -> db-> where('b.date >=', $from);
		$this -> db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		return $this -> db -> group_by('b.booking_number')
		-> get()
		-> num_rows();
	}
	
	function reservation_report($from,$to,$hotel,$num,$limit,$start)
	{
		
		$this->db->select('c.title as hotel,b.*');
		$this -> db-> from('tbl_user a');
		$this -> db-> join('tbl_booking b', 'b.user_id = a.id');
		$this->db-> join('tbl_hotel c','c.id = b.hotel_id');
		$this -> db-> where('b.agency', 0);
		$this -> db-> where('b.user_id !=', 0);
		$this -> db-> where('b.offline_user', 0);
		$this -> db-> where('b.reservation', 1);
		$this -> db-> where('b.date >=', $from);
		$this -> db-> where('b.date <=', $to);
		if($hotel!='')
		{
		$this -> db ->  where('b.hotel_id', $hotel);
		}
		if($num != 'undefined') {
		$this -> db -> like('b.booking_number', $num);
		}
		return $this -> db -> group_by('b.booking_number')
		-> limit($limit, $start)
		-> get()
		-> result();
		//echo $this -> db -> last_query(); exit;
	}
   
}

?>