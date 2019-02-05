<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
/** check coupon **/
	function coupon($cp,$d1,$d2) {
		$this -> db -> where('coupon_code', $cp);
		if(!empty($d1) && !empty($d2)) {
		$this -> db -> where('("'.$d1.'" between valid_from and valid_to) and ("'.$d2.'" between valid_from and valid_to)');
		} else if(!empty($d1) && empty($d2)) {
		$this -> db -> where('("'.$d1.'" between valid_from and valid_to)');
		}
		return $this -> db -> get('tbl_site_coupon') -> row();
	}
	
	function detailsById($id)
	{
		$this->db->select('a.hotel_number, a.id as hotel_id, a.place, a.star_rating,
		c.free_parking,c.free_wifi, a.title, b.state, b.district,a.phone');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_locations b','a.state=b.id');
		$this->db->join('tbl_hotel_facilities c','a.id=c.hotel_id');
		$this->db->where('a.id', $id)->where('a.status', 1);
		$query= $this->db->get();
		
		return $query->row();
	}
	
	function imagesById($id)
	{
		$query=$this->db->where('hotel_id', $id)->get('tbl_hotel_image');
		return $query->result();
	}
	function roombyid($room_id)
	{
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
		$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		$checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
		}
		else
		{
			$checkin =  date('Y-m-d');
			$checkout = date('Y-m-d', strtotime(' +1 day')); 
		}
		
		
		$this->db->select('a.room_title,c.free_wifi,c.breakfast,b.normal_allowed_adults,b.normal_allowed_kids,b.price,b.tax_applicable,b.id,b.services, b.conditions,a.id as room_id');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
		$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
		$this->db->where('a.room_status',1);
		$this->db->where('b.available_status',1);
		$this->db->where('b.id',$room_id);
			$this->db->where('("'.$checkin.'"  BETWEEN b.valid_from AND b.valid_upto ) AND ("'.$checkout.'"  BETWEEN b.valid_from AND b.valid_upto)');
		$query = $this->db->get();
		$r_query = $query->result();
		if(!empty($r_query))
		{
			return $query->result();
		}
		else
		{  
			$this->db->select('room_id');
			$this->db->where('id',$room_id);
			$this->db->where('available_status',1);
			$query1 = $this->db->get('tbl_hotel_room_settings');
			$res_query = $query1->result();
			
			$r_id =  $res_query[0]->room_id;
			$hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			$flag=0;
		     $day_diff = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
			 $date_checkin = ' and ("'.$checkin .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 $sql_new_qry_in= '(select c.* from tbl_hotel_room_settings as c  where c.room_id='.$r_id.' and c.available_status=1 '.$date_checkin.')'; 
			 $query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			 $hotel_in_arr_new = $query_in_exe_rooms->result();
			 for($x=0;$x<count($hotel_in_arr_new);$x++)
			 { 
				$date = date_create($hotel_in_arr_new[$x]->valid_upto);
				$cin_date = $hotel_in_arr_new[$x]->valid_upto;
				$cin_count = floor((strtotime($cin_date) - strtotime($checkin))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]->price;
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				$select_conditions = 'and c.available_status=1 and c.room_id ='.$hotel_in_arr_new[$x]->room_id.' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]->normal_allowed_adults.' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]->normal_allowed_kids.' ';
				
				 $sql_new_qry_out= '(select c.* from tbl_hotel_room_settings as c  where c.room_id='.$r_id.'   '.$date_checkout.'  '.$select_conditions.'  )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result(); 
				
				 if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{ 
						if($hotel_in_arr_new[$x]->room_id==$hotel_out_arr_new[$y]->room_id && $hotel_in_arr_new[$x]->normal_allowed_adults==$hotel_out_arr_new[$y]->normal_allowed_adults && $hotel_in_arr_new[$x]->normal_allowed_kids==$hotel_out_arr_new[$y]->normal_allowed_kids)
						{  
								$upto_date = date_create($hotel_in_arr_new[$x]->valid_upto);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($checkin==$hotel_in_arr_new[$x]->valid_upto && $day_diff==1 && $hotel_in_arr_new[$x]->id==$room_id)
								{ 
									$flag=1;
								}
								else
								{ 
									if($hotel_out_arr_new[$y]->valid_upto>=$checkout)
									{ 
									$count_count=  floor((strtotime($checkout) - strtotime($hotel_out_arr_new[$y]->valid_from))/(60*60*24));
									$tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]->price;
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]->valid_upto) - strtotime($hotel_out_arr_new[$y]->valid_from))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]->price;		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]->valid_upto);		
						}
					}
				} 
				}while($hotel_out_arr_new[0]->valid_upto < $checkout);
				$tot_price	=	$tot_price/$day_diff; 
				if(!empty($hotel_out_arr_new)){
					if($flag==0)
						{ 
							$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]->id, 'price' => $tot_price);
						}
						else
						{
							 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]->id, 'price' =>$hotel_in_arr_new[$x]->price);
						}
				}
				
				if(!empty($setting_price_array)){
				$this->db->select('a.room_title,c.free_wifi,c.breakfast,b.normal_allowed_adults,b.normal_allowed_kids,b.price,b.tax_applicable,b.id,b.services, b.conditions,a.id as room_id');
				$this->db->from('tbl_hotel_room a');
				$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
				$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
				$this->db->where('b.id',$setting_price_array[0]['id']);
				$this->db->where('b.available_status',1);
		$this->db->where('a.room_status',1);
				$query = $this->db->get();
				$r_query = $query->result();
				if(!empty($r_query)){
				$r_query[0]->price = $setting_price_array[0]['price'];
				}
				}
				
			}
			
			return $r_query;
		}
		
		
	}
	
	function detailsByUser($email)
	{
		$this->db->select('*');		
		$this->db->where('email',$email);
		$query= $this->db->get('tbl_user');
		return $query->result();
	}
	
	
	function settingsByRoom($id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d');
		    $checkout	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d');
		
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			//$this->db->or_where('("'.$checkout.'"  BETWEEN valid_from AND valid_upto )');	
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		//$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		}
		$this->db->where('room_id', $id);
		$this->db->where('available_status', 1);
		$query=$this->db->get('tbl_hotel_room_settings');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	function Package_settingsByRoom($id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d');
		    $checkout	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d');
		
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			//$this->db->or_where('("'.$checkout.'"  BETWEEN valid_from AND valid_upto )');	
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		//$this->db->where('("'.$date.'"  BETWEEN valid_from AND valid_upto )');	
		}
		$this->db->where('room_id', $id);
		$this->db->where('available_status', 1);
		$query=$this->db->get('tbl_ayurveda_rooms');
		
		//echo $this->db->last_query(); 
		return $query->result();
	}
	
	
	function Package_roombyId($room_id)
	{
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
		$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		$checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
		}
		else
		{
			$checkin =  date('Y-m-d');
			$checkout = date('Y-m-d', strtotime(' +1 day')); 
		}
		
		$this->db->select('a.room_title,d.title,c.free_wifi,c.breakfast,b.normal_allowed_adults,b.services, b.conditions,b.price,b.tax_applicable,b.id,a.id as room_id');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_ayurveda_rooms b','a.id=b.room_id');
		$this->db->join('tbl_ayurveda d','d.id=b.ayurveda_id');
		$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
		$this->db->where('a.room_status',1);
		$this->db->where('d.status',1);
		$this->db->where('b.available_status',1);
		$this->db->where('b.id',$room_id);
			$this->db->where('("'.$checkin.'"  BETWEEN b.valid_from AND b.valid_upto ) AND ("'.$checkout.'"  BETWEEN b.valid_from AND b.valid_upto)');
		
		$query = $this->db->get();
		$r_query = $query->result();
		
		//////////new query starts here ///////////////////
		 if(!empty($r_query))
		{  
			return $query->result();
		}
		else
		{  
			$this->db->select('room_id,ayurveda_id');
			$this->db->where('id',$room_id);
			$this->db->where('available_status',1);
			$query1 = $this->db->get('tbl_ayurveda_rooms');
			$res_query = $query1->result();
			
			$r_id =  $res_query[0]->room_id;
			$ayur_id =  $res_query[0]->ayurveda_id;
			$hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			$flag=0;
		     $day_diff = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
			 $date_checkin = ' and ("'.$checkin .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 $sql_new_qry_in= '(select c.* from tbl_ayurveda_rooms as c  where c.room_id='.$r_id.' and c.available_status=1 and c.ayurveda_id='.$ayur_id.'  '.$date_checkin.')'; 
			 $query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			 $hotel_in_arr_new = $query_in_exe_rooms->result();
			// print_r($hotel_in_arr_new);
			 for($x=0;$x<count($hotel_in_arr_new);$x++)
			 { 
				$date = date_create($hotel_in_arr_new[$x]->valid_upto);
				$cin_date = $hotel_in_arr_new[$x]->valid_upto;
				$cin_count = floor((strtotime($cin_date) - strtotime($checkin))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]->price;
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				$select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]->room_id.' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]->normal_allowed_adults.' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]->normal_allowed_kids.' ';
				
				 $sql_new_qry_out= '(select c.* from tbl_ayurveda_rooms as c  where c.room_id='.$r_id.' and c.ayurveda_id='.$ayur_id.' and c.available_status=1 '.$date_checkout.'  '.$select_conditions.'  )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result(); 
				
				 if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{ 
						if($hotel_in_arr_new[$x]->room_id==$hotel_out_arr_new[$y]->room_id && $hotel_in_arr_new[$x]->normal_allowed_adults==$hotel_out_arr_new[$y]->normal_allowed_adults && $hotel_in_arr_new[$x]->normal_allowed_kids==$hotel_out_arr_new[$y]->normal_allowed_kids)
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]->valid_upto);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($checkin==$hotel_in_arr_new[$x]->valid_upto && $day_diff==1)
								{  
									$flag=1;
								}
								else
								{  
									if($hotel_out_arr_new[$y]->valid_upto>=$checkout)
									{ 
									 $count_count=  floor((strtotime($checkout) - strtotime($hotel_out_arr_new[$y]->valid_from))/(60*60*24));
									$tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]->price;
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]->valid_upto) - strtotime($hotel_out_arr_new[$y]->valid_from))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]->price;		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]->valid_upto);		
						}
					}
				} 
				
				}while($hotel_out_arr_new[0]->valid_upto < $checkout);
				   $tot_price	=	$tot_price/$day_diff; 
				if(!empty($hotel_out_arr_new) ){
					if($flag==0)
						{ 
							$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]->id, 'price' => $tot_price);
						}
						else
						{ 
							 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]->id, 'price' =>$hotel_in_arr_new[$x]->price);
						}	
				}
				if(!empty($setting_price_array)){
				$this->db->select('a.room_title,d.title,c.free_wifi,c.breakfast,b.normal_allowed_adults,b.services, b.conditions,b.price,b.tax_applicable,b.id,a.id as room_id');
				$this->db->from('tbl_hotel_room a');
				$this->db->join('tbl_ayurveda_rooms b','a.id=b.room_id');
				$this->db->join('tbl_ayurveda d','d.id=b.ayurveda_id');
				$this->db->join('tbl_hotel_room_facilities c','a.id=c.room_id');
				$this->db->where('b.id',$setting_price_array[0]['id']);
				$this->db->where('b.available_status',1);
		$this->db->where('d.status',1);
		$this->db->where('a.room_status',1);
				$query = $this->db->get();
				$r_query = $query->result();
				if(!empty($r_query)){
				$r_query[0]->price = $setting_price_array[0]['price'];
				}
				}
		///////////// new query ends here/////////////////
		
				return $r_query;
		}
		}
	}
	
	
	function room_reserve($hotel,$id)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d');
		   	 $checkout	= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d');
		
			$this->db->where('(a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'" or a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'") and (a.check_out != "'.$checkin.'")');	
		}
		else
		{		$checkin =  date('Y-m-d');
		$checkout = date('Y-m-d', strtotime(' +1 day')); }
		
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
		$this->db->where('d.id',$id);
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
		
		#
		$this->db->distinct();
		$this->db->select('a.room_number as id');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$id);
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
		
		$booked_rooms_count =  count($q1->result()) + count($q2->result());
		
			$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		$this->db->select('a.id as id');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$id);
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
	
		function booking_detail($id)
	{
		$this->db->select('booking_number')->where('id',$id);
		$query_id = $this->db->get('tbl_booking');
		$id_num =  $query_id->row();
		
		$this -> db-> select('a.title,a.logo_img, c.state, c.district, a.star_rating, d.thumb, b.*');
		$this -> db-> from('tbl_hotel a');
		$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
		$this -> db-> join('tbl_locations c', 'a.state = c.id');
		$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
		$this -> db	-> where('b.booking_number', $id_num->booking_number);
		$this -> db	-> group_by('b.booking_number');
		$get_query = $this -> db	-> get();
		return $get_query-> row();
		
		
	}
	
	function booking_room_detail($booking_number)
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults, b.services, b.conditions,d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_hotel_room_settings b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('c.booking_number', $booking_number);
		$this -> db->	 where('b.available_status', 1);
		$room_query = $this -> db->	 get();
		return $room_query-> result();
	}
	function booking_room_detail_pack($booking_number)
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults, b.services, b.conditions, d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('b.available_status', 1);
		$this -> db->	 where('c.booking_number', $booking_number);
		$room_query = $this -> db->	 get();
		return $room_query-> result();
	}
	
	function Package_check($id)
	{
		$this -> db-> select('b.name,a.days');
		$this -> db->	 from('tbl_ayurveda a');
		$this -> db->	 join('tbl_sub_category b', 'a.category = b.id');
		$this->db->where('a.status',1);
		$this -> db->	 where('a.id', $id);
		$room_query = $this -> db->	 get();
		//echo $this->db->last_query();
		return $room_query-> result();
	}
	
	
	
		function room_details_byid($id)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_hotel_room a');
		$this->db->where('a.room_status',1);
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

}

?>