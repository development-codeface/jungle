<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_detail_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function settingsAyurveda($id)
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
		$this->db->where('available_status', 1);
		$query=$this->db->get('tbl_ayurveda_rooms');
		
		return $query->result();
	}
	
	function roomsAyurveda($id)
	{
		
		$this->db->select('a.*');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_ayurveda_rooms b','a.id=b.room_id');
		$this->db->where('b.available_status', 1);
		$this->db->where('a.hotel_id', $id);
		$this->db->group_by('a.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	function roomsByHotel($id)
	{
		
		$this->db->select('a.*');
		$this->db->from('tbl_hotel_room a');
		$this->db->join('tbl_hotel_room_settings b','a.id=b.room_id');
		
		/* $date =  date('Y-m-d');
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
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) or ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
			
		}
		else
		{
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) or ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		
		} */
		
		$this->db->where('a.hotel_id', $id);
		$this->db->where('b.available_status', 1);
		//$this->db->where('("'.$date.'"  BETWEEN b.valid_from AND b.valid_upto )');	
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
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
		}
		else
		{
			$checkin =$date;
			$checkout= $next_day ;
			$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		
		}
		
		$this->db->where('available_status', 1);
		$this->db->where('room_id', $id);
		$query=$this->db->get('tbl_hotel_room_settings'); 
		
		$query_res = $query->result();
		
		//////////////new query starts here////////
		if(empty($query_res))
		{ 
			$flag=0;
			$hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			
		     $day_diff = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
			 $date_checkin = ' and ("'.$checkin .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 $sql_new_qry_in= '(select c.* from tbl_hotel_room_settings as c  where c.room_id='.$id.' and c.available_status=1  '.$date_checkin.')'; 
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
				
				$select_conditions = 'and c.available_status = 1 and c.room_id ='.$hotel_in_arr_new[$x]->room_id.' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]->normal_allowed_adults.' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]->normal_allowed_kids.' ';
				
				 $sql_new_qry_out= '(select c.* from tbl_hotel_room_settings as c  where c.room_id='.$id.'   '.$date_checkout.'  '.$select_conditions.'  )';
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
				
				$outputArray = array(); 
				$keysArray = array(); 
				foreach ($setting_price_array as $innerArray) 
				{ 
					if (!in_array($innerArray['id'], $keysArray)) 
					{ 
					$keysArray[] = $innerArray['id']; 
					$outputArray[] = $innerArray; 
					}
				} 
				
				$get_id='';
				 if(!empty($outputArray))
				 {
					for($x=0;$x<count($outputArray);$x++)
					{
						
							 $hid=  $outputArray[$x]['id'];
							 if($x==0)
							{
							$get_id.='c.id ='.$hid.'';
							}
							else{
								$get_id.=' or c.id ='.$hid.'';
							}
					}
				 } 
			 if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select c.* from tbl_hotel_room_settings as c where c.available_status=1 and '.$get_id.' )';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ 
				
					if($outputArray[$x]['id']==$hotel_date_arr_new[$t]->id)
						{
							$hotel_date_arr_new[$t]->price = $outputArray[$x]['price'];
						}
					}
				}
				foreach($hotel_date_arr_new as $new_array)
				{
					$query_res[]=($new_array);
				}
			}
			}
			return $query_res;	
		} 
		////////////// new query ends here/////////////////
		else
		{
		return $query->result();
		}
		
	}
	
	
	
	
	function rooms_count($hotel,$id)
	{

		 
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		    $checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			if($checkin == $checkout)
			{
				$checkin =  date('Y-m-d');
				$checkout = date('Y-m-d', strtotime(' +1 day')); 
			}
			
			//$this->db->where('((a.check_in BETWEEN "'. $checkin. '" and "'. $checkout.'") or (a.check_out BETWEEN "'. $checkin. '" and "'. $checkout.'")) and (a.check_out != "'.$checkin.'")');
			

		}
		else
		{
		$checkin =  date('Y-m-d');
		 $checkout = date('Y-m-d', strtotime(' +1 day'));
		}
		
		$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		$this->db->where('(("'. $date1. '" BETWEEN a.check_in and a.check_out)) and (a.check_out != "'.$checkin.'")');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$id);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		$this->db->group_by('a.room_number');
		$q1 = $this->db->get();
		$book1[$i] =  count($q1->result());
		
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
		!empty($book1) ? $booked_rooms1 =  max($book1) : $booked_rooms1 =  0;
		
		$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
		
		$this->db->select('a.id,a.room_number');
		$this->db->from('tbl_booking_rooms a');
		$this->db->join('tbl_booking b','a.booking_id=b.id');
		$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
		$this->db->join('tbl_hotel_room d','d.id=c.room_id');
		
		$this->db->where('(("'. $date1. '" BETWEEN a.check_in and a.check_out)) and (a.check_out != "'.$checkin.'")');
		$this->db->where('b.hotel_id',$hotel);
		$this->db->where('c.available_status',1);
		$this->db->where('d.id',$id);
		$this->db->where('b.cancel!=','2');
		$this->db->where('b.status!=','3');
		$this->db->group_by('a.room_number');
		$q2 = $this->db->get();
		$book2[$i] =  count($q2->result());
		
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
			!empty($book2) ? $booked_rooms2 =  max($book2) : $booked_rooms2 =  0;
		$booked_rooms =  $booked_rooms1 + $booked_rooms2;
		
		$i=0;
		$date1 = $checkin;
		while(strtotime($date1) <= strtotime($checkout)) {
				
		$this->db->select('a.room_number');
		$this->db->from('tbl_hotel_roomnumber a');
		$this->db->where('a.room_id',$id);
		//$this->db->where('a.status','1');

		$this->db->where('(("'.$date1.'"  NOT BETWEEN a.valid_from AND a.valid_to ))');
		$this->db->where('a.status !=',2);
		$query = $this->db->get();
		$total[$i] = count($query->result());
		
		$date1 = date ("Y-m-d", strtotime("+1 day", strtotime($date1)));
		$i++;
		}
		!empty($total) ? $total_rooms =  min($total) : $total_rooms =  0;
		$remaining_room = $total_rooms - $booked_rooms;
		
		//echo $remaining_room.' = '.$total_rooms.' - '.$booked_rooms;
		
		
		return $remaining_room;
		
	}
	
	
	function hotelofferById($hotel)
	{
		 //$date =  date('Y-m-d');
		 //$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		
		$this->db->select('offer');
		$this->db->where('hotel_id', $hotel);
		$this->db->where('status', 1);
		
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
		$this->db->order_by("id", "desc");
		$query_percentage = $this->db->get('tbl_offers');
		return $query_percentage->result();
		
	}

	function hotelAgencyById($hotel)
	{
		$this->db->select('room_tariff,package_tariff');
		$this->db->like('agency', "bookingwings");
		$this->db->where('status', 1);
		$this->db->where('hotel_id', $hotel);
		$query_percentage = $this->db->get('tbl_agency');
		return $query_percentage->result();
	}


	
	function hotelAgencyCommissionById($hotel)
	{
		$date=date('Y-m-d');
		
		$this->db->select('*');
        $this->db->from( 'tbl_commision');
		//$this->db->like('date(date)',$date);
		$this->db->where( 'hotel_id',$hotel);
		$this->db->order_by('date','desc');
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return $result;
	}
		
	function hotelTaxById($hotel)
	{
		$this->db->select('tax_amount');
		$this->db->where('hotel_id', $hotel);
		$query_tax = $this->db->get('tbl_tax');
		return $query_tax->result();
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
	
	
	function ayur_settingsByRoom($id,$pack)
	{
		$date =  date('Y-m-d');
		$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out'] ))
		{
			$checkin= date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
		  	$checkout =date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
			$this->db->where('(("'.$checkin.'"  BETWEEN valid_from AND valid_upto ) and ("'.$checkout.'"  BETWEEN valid_from AND valid_upto ))');	
		}
		else
		{
			 $checkin =  date('Y-m-d');
			$checkout = date('Y-m-d', strtotime(' +1 day')); 
		$this->db->where('(("'.$date.'"  BETWEEN valid_from AND valid_upto ) and ("'.$next_day.'"  BETWEEN valid_from AND valid_upto ))');	
		}
		$this->db->where('room_id', $id);
		$this->db->where('ayurveda_id', $pack);
		$this->db->where('available_status', 1);
		$query=$this->db->get('tbl_ayurveda_rooms');
		
		$query_res = $query->result();
		
			//////////////new query starts here////////
		if(empty($query_res))
		{  
			$flag=0;
			$hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			
		     $day_diff = floor((strtotime($checkout) - strtotime($checkin))/(60*60*24));
			 $date_checkin = ' and ("'.$checkin .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 $sql_new_qry_in= '(select c.* from tbl_ayurveda_rooms as c  where c.room_id='.$id.' and c.available_status=1 and c.ayurveda_id='.$pack.'  '.$date_checkin.')'; 
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
				
				 $sql_new_qry_out= '(select c.* from tbl_ayurveda_rooms as c  where c.room_id='.$id.' and c.ayurveda_id='.$pack.'   '.$date_checkout.'  '.$select_conditions.'  )';
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
				
				$outputArray = array(); 
				$keysArray = array(); 
				foreach ($setting_price_array as $innerArray) 
				{ 
					if (!in_array($innerArray['id'], $keysArray)) 
					{ 
					$keysArray[] = $innerArray['id']; 
					$outputArray[] = $innerArray; 
					}
				} 
				
				$get_id='';
				 if(!empty($outputArray))
				 {
					for($x=0;$x<count($outputArray);$x++)
					{
							 $hid=  $outputArray[$x]['id'];
							 if($x==0)
							{
							$get_id.='c.id ='.$hid.'';
							}
							else{
								$get_id.=' or c.id ='.$hid.'';
							}
					}
				 } 
			 if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select c.* from tbl_ayurveda_rooms as c where c.available_status=1 and '.$get_id.' )';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ 
					if($outputArray[$x]['id']==$hotel_date_arr_new[$t]->id)
						{
							$hotel_date_arr_new[$t]->price = $outputArray[$x]['price'];
						}
					}
				}
				foreach($hotel_date_arr_new as $new_array)
				{
					$query_res[]=($new_array);
				}
			} 
			}
			return $query_res;	
		} 
		else
		{
		return $query->result();
		}
		
		
		
	}
	
	
	function ayurveda_itineraryById($id)
	{
		$query=$this->db->where('ayurveda_id', $id)->order_by('day')->get('tbl_ayurveda_days');
		return $query->result();
	}
	
	

}

?>