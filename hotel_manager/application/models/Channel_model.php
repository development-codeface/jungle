<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getBookRow($num) {
		return $this -> db
		-> where('room_id', $num)
		-> get('tbl_booking')
		-> row();
	}
	
	function getDetails($data) {
		return $this -> db
		-> where('booking_number', $data['booking_number'])
		-> get('tbl_booking')
		-> result();
	}
	
	function booking($action, $data) {
		if($action == 'insert') {
			$this -> db
			-> insert('tbl_booking', $data);
		} else {
		$this -> db
		-> where('booking_number', $data['booking_number'])
		-> where('room_id', $data['room_id'])
		-> update('tbl_booking', $data);
		}
	}
	
	function existBook($book) {
		return $this -> db
		-> where('booking_number', $book['booking_number'])
		-> where('room_id', $book['room_id'])
		-> get('tbl_booking')
		-> num_rows();
	}
	
	function getRates($id) {
		return $this -> db
		-> where('id', $id)
		-> get('tbl_hotel_room_settings')
		-> row();
	}
	
	function exist($email) {
		$rows = $this -> db
		-> where('email', $email)
		-> get('tbl_user')
		-> num_rows();
		
		return $rows > 0 ? $this -> db -> where('email', $email) -> get('tbl_user') -> row() : '';
	}
	
	
	
	function bulk_rooms_count($hotel_id,$room_id,$start,$end)
	{
						
					$this->db->where('((a.check_in BETWEEN "'. $start. '" and "'. $end.'") or (a.check_out BETWEEN "'. $start. '" and "'. $end.'"))');	
				
					$this->db->select('a.id,a.room_number');
					$this->db->from('tbl_booking_rooms a');
					$this->db->join('tbl_booking b','a.booking_id=b.id');
					$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
					$this->db->join('tbl_hotel_room d','d.id=c.room_id');
					$this->db->where('b.hotel_id',$hotel_id);
					$this->db->where('c.available_status',1);
					$this->db->where('d.id',$room_id);
					$this->db->where('b.cancel!=','2');
					$this->db->where('b.status!=','3');
					$q1 = $this->db->get();
				    $booked_rooms1 =  count($q1->result());
				   
				   
				    $this->db->select('a.id,a.room_number');
					$this->db->from('tbl_booking_rooms a');
					$this->db->join('tbl_booking b','a.booking_id=b.id');
					$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
					$this->db->join('tbl_hotel_room d','d.id=c.room_id');
						
					$this->db->where('((a.check_in BETWEEN "'. $start. '" and "'. $end.'") or (a.check_out BETWEEN "'. $start. '" and "'. $end.'"))');	
					
					$this->db->where('b.hotel_id',$hotel_id);
					$this->db->where('d.id',$room_id);
					$this->db->where('b.cancel!=','2');
					$this->db->where('b.status!=','3');
					$this->db->where('c.available_status',1);
					$q2 = $this->db->get();
					$booked_rooms2 =  count($q2->result());
					
					$booked_rooms =  $booked_rooms1+ $booked_rooms2;
					
					$this->db->select('a.room_number');
					$this->db->from('tbl_hotel_roomnumber a');
					$this->db->where('a.room_id',$room_id);

					$this->db->where('(("'.$start.'"  NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$end.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
					$query_remaining = $this->db->get();
					$total_rooms = count($query_remaining->result());
					return $remaining_room['available_rooms'] = $total_rooms - $booked_rooms;

	}
	
	function roomsByHotel($id)
	{
		$this->db->select('a.id');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
		$this->db->where('a.hotel_id', $id);
		$this->db->where('b.available_status', 1);
		$this->db->group_by('a.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	function rooms_count($hotel,$id,$date)
	{
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
			
		$this->db->where('(("'. $date. '" BETWEEN `a`.`check_in` AND `a`.`check_out`)) and (`a`.`check_out` != "'.$date.'")');

		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$id);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		#
		$this->db->group_by('a.room_number');
		$q1 = $this->db->get();
		$booked_rooms1 =  count($q1->result());
		
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		
		$this->db->where('(("'. $date. '" BETWEEN a.check_in AND a.check_out)) and (a.check_out != "'.$date.'")');
		
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$id);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		#
		$this->db->group_by('a.room_number');
		$q2 = $this->db->get();
	
		$booked_rooms2 =  count($q2->result());
				
		$booked_rooms =  $booked_rooms1 + $booked_rooms2;
				
		$this->db->select('a.room_number');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$id);
		
		$this->db->where('(("'. $date. '" NOT BETWEEN a.valid_from AND a.valid_to))');
		
		$query = $this->db->get();
		$total_rooms = count($query->result());
		$remaining_room = $total_rooms - $booked_rooms;
		
		return $remaining_room;
		
	}
	
	function rooms_reserve($hotel,$room,$checkin,$checkout) {
		$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		
		$this->db->select('a.room_number as id');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('("'. $checkin. '" BETWEEN a.check_in and a.check_out) and (a.check_out != "'.$checkin.'")');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('d.id',$room);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		$this->db->where('c.available_status',1);
		$this->db->where('d.room_status',1);
		$q1 = $this->db->get();
		
		$rooms1[$i]= $q1->result();
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
		
		$rooms['booked1']=array();
		$x=0;
		foreach($rooms1 as $a=>$b) {
			if (!in_array($b, $rooms['booked1'])){
			$rooms['booked1'][$x] = $b;
			$x++;
			}
		}
		
		$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		$this->db->select('a.room_number as id');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$room);
		$this->db->where('d.room_status',1);
		$this->db->where('("'. $checkin. '" BETWEEN a.check_in and a.check_out) and (a.check_out != "'.$checkin.'")');

		$q2 = $this->db->get();
		$rooms2[$i]= $q2->result();
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
		
		$rooms['booked2']=array();
		$x=0;
		foreach($rooms2 as $a=>$b) {
			if (!in_array($b, $rooms['booked2'])){
			$rooms['booked2'][$x] = $b;
			$x++;
			}
		}
		
			$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		$this->db->select('a.id as id');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$room);
		//$this->db->where('a.status','1');
		$this->db->where('(("'.$date1.'"  NOT BETWEEN a.valid_from AND a.valid_to ))');
		$query = $this->db->get();
		$total[$i]=($query->result());
		
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
		
		$rooms['total'] = array();
		$z=0;
		foreach($total as $a=>$b) {
			if (!in_array($b, $rooms['total'])){
			$rooms['total'][$z] = $b;
			$z++;
			}
		}
		
		$total_rooms = count($rooms['total']);
		
		return $rooms;
	}
	
	function getHotel($id){
		return $this -> db
		-> select('title, place, mail, phone')
		-> where('id', $id)
		-> get('tbl_hotel')
		-> row();
	}
	
	function ratePlans($room, $date) {
		return $this -> db
		-> where('room_id', $room)
		-> where('"'.$date.'" between valid_from and valid_upto')
		-> get('tbl_hotel_room_settings')
		-> row();
	}

}

?>