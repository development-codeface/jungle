<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ayurveda_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function search_keyword($keyword,$category)
	{
		$this->db->distinct();
		$this->db->select('a.place');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_sub_category as b','a.sub_category_id=b.id');
		$this->db->like('b.name',$category);
		$this->db->like('a.place',$keyword , 'after');
		$this->db->where('a.status','1');
		$query = $this->db->get();
		$count1 = count($query->result());
		if($count1<>'')
		{
			$res=$query->result();
			$result = array();
			foreach($res as $results)
			{
				$this->db->select('a.place,b.state,b.district');
				$this->db->from('tbl_hotel as a');
				$this->db->join('tbl_locations as b','a.state=b.id');
				$this->db->join('tbl_sub_category as c','a.sub_category_id=c.id');
				$this->db->like('c.name',$category);
				$this->db->where('a.place',$results->place);
				$this->db->where('a.status','1');
				$query2 = $this->db->get();
				$res2= $query2->result();
				
				$search_key[] = $results->place. "," . $res2[0]->district. ",". $res2[0]->state;
				//array_push($result, json_encode(array("seriesname" => utf8_encode($results->place. "," . $res2[0]->district. ",". $res2[0]->state))));
			}
			
			// $final=	implode(",", $result);		
			
			
			// return $final;
			//print_r(json_encode($search_key)); 
			
			return json_encode($search_key);
		}
		else
		{
			
		$this->db->select('a.title,a.place,b.state');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_locations as b','a.state=b.id');
		$this->db->join('tbl_sub_category as c','a.sub_category_id=c.id');
		$this->db->like('c.name',$category);
		$this->db->like('a.title',$keyword , 'after');
		$this->db->or_like('a.address',$keyword , 'after');
		$this->db->where('a.status','1');
		$query = $this->db->get();
		$res=$query->result();
		
		$result = array();
		foreach($res as $results)
		{
			
			
			$search_key[] = $results->title. ",". $results->place. ",". $results->state;
			//array_push($result, json_encode(array("seriesname" => utf8_encode($results->title. ",". $results->place. ",". $results->state))));
		}
		
		//$final=	implode(",", $result);	
		
		// return $final;
		return json_encode($search_key);
			
		}
		
		
	}
	
	
	
	
	function all_hotels_search_based_package($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{
		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$selescted_id='';

		if(!empty($star))
		{
			$star_cond='';
			$s=0;
			for($z=0;$z<=count($star)-1; $z++)
			{
				if($s==0)
				{
				 $star_cond.='and (a.star_rating="'.$star[$z].'"';
				 $s=1;
				}
				else
				{
					$star_cond.=' or a.star_rating="'.$star[$z].'"';
				}
			} 
			$star_cond=$star_cond.')';	
		} 
		else
		{
			$star_cond='';	
		}  
		if(!empty($hotName_range))
		{ 
			$name_range='and (a.address like "%'.$hotName_range[0].'%" OR a.title like "%'.$hotName_range[0].'%")';
		}
		else
		{
			$name_range='';
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			$t=0;
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				if($t==0)
				{
				 $loc_cond.='and (a.place="'.$loc_range[$z].'" or d.district="'.$loc_range[$z].'"';
				 $t=1;
				}
				else
				{
					$loc_cond.=' and a.place="'.$loc_range[$z].'" or  d.district="'.$loc_range[$z].'" ';
				}
			}
			$loc_cond=$loc_cond.')';	
		}
		else
		{
			$loc_cond='';
		}	
		if(!empty($fac_range))
		{
			$fac_cond="";
			$y=0;
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				if($y==0)
				{
				 $fac_cond.='and (e.'.$fac_range[$z].'="1" ';
				 $y=1;
				}
				else
				{
					$fac_cond.='and e.'.$fac_range[$z].'="1" ';
				}
			}
			$fac_cond=$fac_cond.')';	
		}
		else
		{
			$fac_cond='';	
		}
		
		
		 $keyword= $post['package'];
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';

		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((f.title like "%'.$keyword.'%")) '.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(count($query_res)); 
		
		
		///////////available rooms//////////
		
		$hotel_new_arr=array();
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{
		for($i=0; $i<=sizeof($query_res)-1;$i++)
		{
			
		$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and c.ayurveda_id='.$query_res[$i]['ayur_id'].'  and a.id='.$query_res[$i]['hotel_id'].'';
		
			
		$sql_qry1='(select '.$select_values.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like 
		"%'.$keyword.'%" )) '.$dat_query.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
		//if($i=2){ exit; }
	    $query_exe_rooms = $this->db->query($sql_qry1);
		$query_res_rooms=$query_exe_rooms->result();
		$hotel_new_arr[] =$query_res_rooms;
		}
		}
		
		
		
		
			
		///////////////////new query starts here ///////////////////
		
		$selescted_id_date ='';
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id_date.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id_date.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id_date.=' and';
		}
		else
		{
			$selescted_id_date='';
		}
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		    $hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
	
		    $day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			 $date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 
		    $sql_new_qry_in='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.hotel_id=a.id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((f.title like "%'.$keyword.'%" )) '.$date_checkin.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
		$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
		$hotel_in_arr_new=$query_in_exe_rooms->result_array();
		
		//print_r($hotel_in_arr_new);
		
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{ 
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				$select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' ';
				
				   $sql_new_qry_out='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((f.title like "%'.$keyword.'%" )) '.$date_checkout.' '.$text.' '.$select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1  )';
//echo  $sql_new_qry_out;
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else {
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]['ayur_id'], 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{ 
									$count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								}
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				
				$tot_price	=	$tot_price/$day_diff; //echo "<br/>";	
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]['ayur_id'], 'price' => $tot_price);
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
						$get_id.='f.id ='.$hid.'';
						}
						else{
							$get_id.=' or f.id ='.$hid.'';
						}
				}
			 }
			 
			if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$get_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ if($outputArray[$x]['id']==$hotel_date_arr_new[$t]['ayur_id'])
						{
							$hotel_date_arr_new[$t]['price'] = $outputArray[$x]['price'];
						}
					}
				}
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$query_res[]=($new_array);
				}	
			}
			
			if(!empty($hotel_date_arr_new))
			{
			$setting_room_array = array();
			$hotel_room_new_arr = array();
			for($i=0; $i<=sizeof($hotel_date_arr_new)-1;$i++)
			{
				$select_values_room='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
			c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
			c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
			b.id as rooms_id,d.district,c.ayurveda_id as ayur_id,f.title as ayur_title';
			
				
			$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and c.ayurveda_id='.$hotel_date_arr_new[$i]['ayur_id'].'  and a.id='.$hotel_date_arr_new[$i]['hotel_id'].'';
			
			$sql_qry1='(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
			left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id  left join 
			tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like "%'.$keyword.'%" ))
			'.$date_checkin.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
			
			$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			$hotel_in_arr_new=$query_in_exe_rooms->result_array();
			$xx=1;
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{  
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				  $select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' and  a.id='.$hotel_in_arr_new[$x]['hotel_id'].'';
				
				      $sql_new_qry_out='(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
			left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id  left join 
			tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like "%'.$keyword.'%" )) '.$date_checkout.' '.$text_room.' '. $select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{		
						if(($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id']) && ($hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id']) && ($hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults']) && ($hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids']))
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{ 
									 $setting_room_array[] = array('id'=> $hotel_in_arr_new[$x]['rooms_id'], 'hotel_id'=> $hotel_in_arr_new[$x]['hotel_id'] , 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{ 
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{  
									 $count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									 $tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				 $tot_price	=	$tot_price/$day_diff; 	
				if(!empty($hotel_out_arr_new)){
				$setting_room_array[] = array('id'=> $hotel_out_arr_new[0]['rooms_id'],'hotel_id'=> $hotel_out_arr_new[0]['hotel_id'] , 'price' => $tot_price);
				}
			}
			} 
			$outputArray = array(); 
			$keysArray = array(); 
			foreach ($setting_room_array as $innerArray) 
			{ 
				if (!in_array($innerArray['id'], $keysArray)) 
				{ 
				$keysArray[] = $innerArray['id']; 
				$outputArray[] = $innerArray; 
				}
			} 
			 $get_room_id='';
			 if(!empty($outputArray))
			 {
				for($x=0;$x<count($outputArray);$x++)
				{
						 $hid=  $outputArray[$x]['id'];
						 if($x==0)
						{
						$get_room_id.='b.id ='.$hid.'';
						}
						else{
							$get_room_id.=' or b.id ='.$hid.'';
						}
				}
			 }	
			
			if(!empty($get_room_id))
			{
				$sql_new_qry_date= '(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$get_room_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				
				//print_r($hotel_date_arr_new);
				foreach($hotel_date_arr_new as $new_array)
				{
					$hotel_room_new_arr[]=(object)$new_array;
				} 
				$hotel_new_arr[] = $hotel_room_new_arr;
			} 
			}
		}
		//////////////// new quewry ends here ////////////////////
		
		
		
		
		
		
		
		
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (f.title like "%'.$keyword.'%" ) '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		return array($hotel_new_arr,$query_res, $query_res_hotel_alone);
		
	}
	
	function all_hotels_search_based_destination($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{ 
			$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$selescted_id='';

		if(!empty($star))
		{
			$star_cond='';
			$s=0;
			for($z=0;$z<=count($star)-1; $z++)
			{
				if($s==0)
				{
				 $star_cond.='and (a.star_rating="'.$star[$z].'"';
				 $s=1;
				}
				else
				{
					$star_cond.=' or a.star_rating="'.$star[$z].'"';
				}
			} 
			$star_cond=$star_cond.')';	
		} 
		else
		{
			$star_cond='';	
		}  
		if(!empty($hotName_range))
		{ 
			$name_range='and (a.address like "%'.$hotName_range[0].'%" OR a.title like "%'.$hotName_range[0].'%")';
		}
		else
		{
			$name_range='';
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			$t=0;
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				if($t==0)
				{
				 $loc_cond.='and (a.place="'.$loc_range[$z].'" or d.district="'.$loc_range[$z].'"';
				 $t=1;
				}
				else
				{
					$loc_cond.=' and a.place="'.$loc_range[$z].'" or  d.district="'.$loc_range[$z].'" ';
				}
			}
			$loc_cond=$loc_cond.')';	
		}
		else
		{
			$loc_cond='';
		}	
		if(!empty($fac_range))
		{
			$fac_cond="";
			$y=0;
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				if($y==0)
				{
				 $fac_cond.='and (e.'.$fac_range[$z].'="1" ';
				 $y=1;
				}
				else
				{
					$fac_cond.='and e.'.$fac_range[$z].'="1" ';
				}
			}
			$fac_cond=$fac_cond.')';	
		}
		else
		{
			$fac_cond='';	
		}
		
		
		 $keyword= $post['pack_destination'];
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,c.ayurveda_id,a.destination,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';

		    $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((a.destination like "%'.$keyword.'%")) '.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(count($query_res)); exit;
		
		
		///////////available rooms//////////
		$hotel_new_arr=array();
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{
		for($i=0; $i<=sizeof($query_res)-1;$i++)
		{
			
		$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and c.ayurveda_id='.$query_res[$i]['ayur_id'].'  and a.id='.$query_res[$i]['hotel_id'].'';
		
			
		$sql_qry1='(select '.$select_values.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((a.destination like 
		"%'.$keyword.'%" )) '.$dat_query.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
		//if($i=2){ exit; }
	    $query_exe_rooms = $this->db->query($sql_qry1);
		$query_res_rooms=$query_exe_rooms->result();
		$hotel_new_arr[] =$query_res_rooms;
		}
		}
		
		
		
		
		///////////////////new query starts here ///////////////////
		
		$selescted_id_date ='';
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id_date.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id_date.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id_date.=' and';
		}
		else
		{
			$selescted_id_date='';
		}
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		    $hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
	

		  $day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			 $date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 
		    $sql_new_qry_in='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((a.destination like "%'.$keyword.'%" )) '.$date_checkin.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
		$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
		$hotel_in_arr_new=$query_in_exe_rooms->result_array();
		
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{ 
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				$select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' ';
				
				   $sql_new_qry_out='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((a.destination like "%'.$keyword.'%" )) '.$date_checkout.' '.$text.' '.$select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else {
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]['ayur_id'], 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{ 
									$count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								}
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				
				$tot_price	=	$tot_price/$day_diff; //echo "<br/>";	
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]['ayur_id'], 'price' => $tot_price);
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
						$get_id.='f.id ='.$hid.'';
						}
						else{
							$get_id.=' or f.id ='.$hid.'';
						}
				}
			 }
			 
			if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$get_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ if($outputArray[$x]['id']==$hotel_date_arr_new[$t]['ayur_id'])
						{
							$hotel_date_arr_new[$t]['price'] = $outputArray[$x]['price'];
						}
					}
				}
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$query_res[]=($new_array);
				}
			}
						
		if(!empty($hotel_date_arr_new))
		{
			$setting_room_array = array();
			$hotel_room_new_arr = array();
			for($i=0; $i<=sizeof($hotel_date_arr_new)-1;$i++)
			{
				$select_values_room='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
			c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
			c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
			b.id as rooms_id,d.district,c.ayurveda_id as ayur_id,f.title as ayur_title';
			
			$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and c.ayurveda_id='.$hotel_date_arr_new[$i]['ayur_id'].'  and a.id='.$hotel_date_arr_new[$i]['hotel_id'].'';
			
			$sql_qry1='(select '.$select_values_room.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join 
			tbl_ayurveda_rooms as c on c.ayurveda_id=f.id left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d 
			on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where '.$selescted_id_date.'  
			((a.destination like "%'.$keyword.'%" )) '.$date_checkin.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
			
			$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			$hotel_in_arr_new=$query_in_exe_rooms->result_array();
			$xx=1;
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{  
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				  $select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' and  a.id='.$hotel_in_arr_new[$x]['hotel_id'].'';
				
				      $sql_new_qry_out='(select '.$select_values_room.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join 
			tbl_ayurveda_rooms as c on c.ayurveda_id=f.id left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d 
			on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where '.$selescted_id_date.'  
			((a.destination like "%'.$keyword.'%" )) '.$date_checkout.' '.$text_room.' '. $select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{		
						if(($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id']) && ($hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id']) && ($hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults']) && ($hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids']))
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{ 
									 $setting_room_array[] = array('id'=> $hotel_in_arr_new[$x]['rooms_id'], 'hotel_id'=> $hotel_in_arr_new[$x]['hotel_id'] , 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{ 
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{  
									 $count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									 $tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				$tot_price	=	$tot_price/$day_diff; 	
				if(!empty($hotel_out_arr_new)){
				$setting_room_array[] = array('id'=> $hotel_out_arr_new[0]['rooms_id'],'hotel_id'=> $hotel_out_arr_new[0]['hotel_id'] , 'price' => $tot_price);
				}
			}
			} 

			$outputArray = array(); 
			$keysArray = array(); 
			foreach ($setting_room_array as $innerArray) 
			{ 
				if (!in_array($innerArray['id'], $keysArray)) 
				{ 
				$keysArray[] = $innerArray['id']; 
				$outputArray[] = $innerArray; 
				}
			} 
			 $get_room_id='';
			 if(!empty($outputArray))
			 {
				for($x=0;$x<count($outputArray);$x++)
				{
						 $hid=  $outputArray[$x]['id'];
						 if($x==0)
						{
						$get_room_id.='b.id ='.$hid.'';
						}
						else{
							$get_room_id.=' or b.id ='.$hid.'';
						}
				}
			 }	
			
			if(!empty($get_room_id))
			{
				$sql_new_qry_date= '(select '.$select_values_room.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join 
			tbl_ayurveda_rooms as c on c.ayurveda_id=f.id left join tbl_hotel_room as b on b.id=c.room_id left join tbl_locations as d 
			on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$get_room_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$hotel_room_new_arr[]=(object)$new_array;
				} 
				$hotel_new_arr[] = $hotel_room_new_arr;
			} 	 
		}	
		}
		//////////////// new quewry ends here ////////////////////
		
		
		
		
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (a.destination like "%'.$keyword.'%" ) '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		return array($hotel_new_arr,$query_res, $query_res_hotel_alone);
		
	}
	
	
	function all_hotels_search_based($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{ 
		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$selescted_id='';

		if(!empty($star))
		{
			$star_cond='';
			$s=0;
			for($z=0;$z<=count($star)-1; $z++)
			{
				if($s==0)
				{
				 $star_cond.='and (a.star_rating="'.$star[$z].'"';
				 $s=1;
				}
				else
				{
					$star_cond.=' or a.star_rating="'.$star[$z].'"';
				}
			} 
			$star_cond=$star_cond.')';	
		} 
		else
		{
			$star_cond='';	
		}  
		if(!empty($hotName_range))
		{ 
			$name_range='and (a.address like "%'.$hotName_range[0].'%" OR a.title like "%'.$hotName_range[0].'%")';
		}
		else
		{
			$name_range='';
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			$t=0;
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				if($t==0)
				{
				 $loc_cond.='and (a.place="'.$loc_range[$z].'" or d.district="'.$loc_range[$z].'"';
				 $t=1;
				}
				else
				{
					$loc_cond.=' and a.place="'.$loc_range[$z].'" or  d.district="'.$loc_range[$z].'" ';
				}
			}
			$loc_cond=$loc_cond.')';	
		}
		else
		{
			$loc_cond='';
		}	
		if(!empty($fac_range))
		{
			$fac_cond="";
			$y=0;
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				if($y==0)
				{
				 $fac_cond.='and (e.'.$fac_range[$z].'="1" ';
				 $y=1;
				}
				else
				{
					$fac_cond.='and e.'.$fac_range[$z].'="1" ';
				}
			}
			$fac_cond=$fac_cond.')';	
		}
		else
		{
			$fac_cond='';	
		}
		
		
		 $keyword= $post['hid_text'];
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';

		   $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like 
		"%'.$keyword.'%" OR a.place like "%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) 
		'.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		//'.$dat_query.' '.$text.')';
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(count($query_res));
		
		
		
		///////////available rooms//////////
		//$unique_package = (array_unique($query_res));
		$hotel_new_arr=array();
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{
		for($i=0; $i<=sizeof($query_res)-1;$i++)
		{
			$select_values_room='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,c.ayurveda_id as ayur_id,f.title as ayur_title';
		
			
		$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and c.ayurveda_id='.$query_res[$i]['ayur_id'].'  and a.id='.$query_res[$i]['hotel_id'].'';
		
			
		$sql_qry1='(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like 
		"%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like "%'.$keyword.'%" OR a.place like "%'.$keyword.'%" 
		OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) '.$dat_query.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
		//if($i=2){ exit; }
	    $query_exe_rooms = $this->db->query($sql_qry1);
		$query_res_rooms=$query_exe_rooms->result();
		$hotel_new_arr[] =$query_res_rooms;
		
		}
		}
		
		
		
		
		///////////////////new query starts here ///////////////////
		
		$selescted_id_date ='';
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id_date.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id_date.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id_date.=' and';
		}
		else
		{
			$selescted_id_date='';
		}
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		    $hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			
		    $day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			$date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 
		      $sql_new_qry_in='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id
 left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id left join tbl_hotel_room as b on b.hotel_id=a.id  
left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like 
		"%'.$keyword.'%" OR a.place like "%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) 
		'.$date_checkin.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.id)';
		$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
		$hotel_in_arr_new=$query_in_exe_rooms->result_array();
		
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{  
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				  $select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' and  a.id='.$hotel_in_arr_new[$x]['hotel_id'].'';
				
				      $sql_new_qry_out='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id 
 left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id  left join tbl_hotel_room as b on b.hotel_id=a.id  
 left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$selescted_id_date.'  ((f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like 
		"%'.$keyword.'%" OR a.place like "%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) 
		'.$date_checkout.' '.$text.' '.$select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
				
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{		
						if(($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id']) && ($hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id']) && ($hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults']) && ($hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids']))
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{ 
									 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]['ayur_id'], 'hotel_id'=> $hotel_in_arr_new[$x]['hotel_id'] , 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{ 
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{  
									 $count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									 $tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				
				 $tot_price	=	$tot_price/$day_diff; 	
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]['ayur_id'],'hotel_id'=> $hotel_out_arr_new[0]['hotel_id'] , 'price' => $tot_price);
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
						$get_id.='f.id ='.$hid.'';
						}
						else{
							$get_id.=' or f.id ='.$hid.'';
						}
				}
			 }
			 
			 if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on b.hotel_id=a.id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where '.$get_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ if($outputArray[$x]['id']==$hotel_date_arr_new[$t]['ayur_id'])
						{
							$hotel_date_arr_new[$t]['price'] = $outputArray[$x]['price'];
						}
					}
				}
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$query_res[]=($new_array);
				}	
			}	
		}
		
		if(!empty($hotel_date_arr_new))
		{
			$setting_room_array = array();
			$hotel_room_new_arr = array();
			for($i=0; $i<=sizeof($hotel_date_arr_new)-1;$i++)
			{
				$select_values_room='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
			c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
			c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
			b.id as rooms_id,d.district,c.ayurveda_id as ayur_id,f.title as ayur_title';
			
				
			$text_room ='and f.category="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and c.ayurveda_id='.$hotel_date_arr_new[$i]['ayur_id'].'  and a.id='.$hotel_date_arr_new[$i]['hotel_id'].'';
			
			$sql_qry1='(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
			left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id  left join 
			tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like 
			"%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like "%'.$keyword.'%" OR a.place like "%'.$keyword.'%" 
			OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) '.$date_checkin.' '.$text_room.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
			
			$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			$hotel_in_arr_new=$query_in_exe_rooms->result_array();
			$xx=1;
			for($x=0;$x<count($hotel_in_arr_new);$x++)
			{  
				$date = date_create($hotel_in_arr_new[$x]['valid_upto']);
				$cin_date = $hotel_in_arr_new[$x]['valid_upto'];
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]['price'];
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				  $select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]['rooms_id'].' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]['normal_allowed_adults'].' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and f.id= '.$hotel_in_arr_new[$x]['ayur_id'].' and  a.id='.$hotel_in_arr_new[$x]['hotel_id'].'';
				
				      $sql_new_qry_out='(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
			left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id  left join 
			tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where ((f.title like 
			"%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like "%'.$keyword.'%" OR a.place like "%'.$keyword.'%" 
			OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) '.$date_checkout.' '.$text_room.' '. $select_conditions.' and f.status=1 and b.room_status=1 and c.available_status=1 )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array();
				
				if(empty($hotel_out_arr_new)){  break; }else { 
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{		
						if(($hotel_in_arr_new[$x]['ayur_id']==$hotel_out_arr_new[$y]['ayur_id']) && ($hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id']) && ($hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults']) && ($hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids']))
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{ 
									 $setting_room_array[] = array('id'=> $hotel_in_arr_new[$x]['rooms_id'], 'hotel_id'=> $hotel_in_arr_new[$x]['hotel_id'] , 'price' =>$hotel_in_arr_new[$x]['price']);
								}
								else
								{ 
									if($hotel_out_arr_new[$y]['valid_upto']>=$post['check_out'])
									{  
									 $count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									 $tot_price = $tot_price + ($count_count)*$hotel_out_arr_new[$y]['price'];
									}
									else
									{
									$count_count=  floor((strtotime($hotel_out_arr_new[$y]['valid_upto']) - strtotime($hotel_out_arr_new[$y]['valid_from']))/(60*60*24));
									$tot_price = $tot_price + ($count_count+1)*$hotel_out_arr_new[$y]['price'];		
									}
								} 
							$date=date_create($hotel_out_arr_new[$y]['valid_upto']);		
						}
					}
				}
				}
				while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				 $tot_price	=	$tot_price/$day_diff; 	
				if(!empty($hotel_out_arr_new)){
				$setting_room_array[] = array('id'=> $hotel_out_arr_new[0]['rooms_id'],'hotel_id'=> $hotel_out_arr_new[0]['hotel_id'] , 'price' => $tot_price);
				}
			}
			} 

			$outputArray = array(); 
			$keysArray = array(); 
			foreach ($setting_room_array as $innerArray) 
			{ 
				if (!in_array($innerArray['id'], $keysArray)) 
				{ 
				$keysArray[] = $innerArray['id']; 
				$outputArray[] = $innerArray; 
				}
			} 
			 $get_room_id='';
			 if(!empty($outputArray))
			 {
				for($x=0;$x<count($outputArray);$x++)
				{
						 $hid=  $outputArray[$x]['id'];
						 if($x==0)
						{
						$get_room_id.='b.id ='.$hid.'';
						}
						else{
							$get_room_id.=' or b.id ='.$hid.'';
						}
				}
			 }	
			
			if(!empty($get_room_id))
			{
				$sql_new_qry_date= '(select '.$select_values_room.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$get_room_id.' and f.status=1 and b.room_status=1 and c.available_status=1 group by b.id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$hotel_room_new_arr[]=(object)$new_array;
				} 
				$hotel_new_arr[] = $hotel_room_new_arr;
			}	 
		}
		//////////////// new quewry ends here ////////////////////
		
		
		
		
		
		
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
	 	$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like "%'.$keyword.'%" OR a.place like 
		"%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%") '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		//print_r(count($query_res_hotel_alone));
		return array($hotel_new_arr,$query_res, $query_res_hotel_alone);
						
										
	} 
function hotelAgencyById($hotel)
{
	$this->db->select('package_tariff');
	$this->db->like('agency', "bookingwings");
	$this->db->where('status', 1);
	$this->db->where('hotel_id', $hotel);
	$query_percentage = $this->db->get('tbl_agency');
	return $query_percentage->result();
}
function category_nm($name)
{
	$this->db->select('name');
	$this->db->where('status', 1);
	$this->db->where('id', $name);
	$query_category_nm = $this->db->get('tbl_sub_category');
	return $query_category_nm->row();
}
function hotelAgencyCommissionById($hotel)
{
	$date=date('Y-m-d');
	
	$this->db->select('package_commision');
	$this->db->where('hotel_id', $hotel);
	
	$this->db->order_by("date", "desc");
	//$this->db->like('date(date)',$date);
	$query_percentage = $this->db->get('tbl_commision');
	return $query_percentage->result();
}

function hotelofferById($rooms_id,$check_in,$check_out)
{
	/* $this->db->select('offer');
	$this->db->select('from_date');
	$this->db->select('to_date');
	$this->db->where('hotel_id', $rooms_id);
	$this->db->where('status', 1)->where('from_date',$check_in)->where('to_date',$check_out);
	$this->db->order_by("id", "desc");
	$query_percentage = $this->db->get('tbl_offers');
	return $query_percentage->result(); */
	
	 $date =  date('Y-m-d');
		$this->db->select('offer');
		$this->db->where('hotel_id', $rooms_id);
		$this->db->where('status', 1);
		
		$this->db->where('("'.$date.'"  BETWEEN from_date AND to_date )');
		$this->db->order_by("id", "desc");
		$query_percentage = $this->db->get('tbl_offers');
		return $query_percentage->result();
	
}

function hotelTaxById($hotel)
{
	$this->db->select('tax_amount');
	$this->db->where('hotel_id', $hotel)->where('season','season');
	$query_tax = $this->db->get('tbl_tax');
	return $query_tax->result();
}


function Off_hotelTaxById($hotel)
{
	$this->db->select('tax_amount');
	$this->db->where('hotel_id', $hotel)->where('season','off_season');
	$query_tax = $this->db->get('tbl_tax');
	return $query_tax->result();
}




	
	function child_rate($id)
	{
		$query = $this->db->select('child_free_limit')->select('room_child_rate')->where('hotel_id', $id)->get('tbl_hotel_room_settings');
		return $query->result();

	}
	
	function suggestions($latestQuery)
	{
		$query = array();

		// $suggestions_loc=$this->db->select('*')->from('location')->where("name LIKE '".strtoupper($latestQuery)."%'")->get();
		// $suggestions_hotels=$this->db->select('*')->from('tbl_hotel')->where("title LIKE '%".strtoupper($latestQuery)."%'")->or_where("address LIKE '%".strtoupper($latestQuery)."%'")->get();
		// $query1= $suggestions_loc->result();
		// $query2= $suggestions_hotels->result();
		// $merge_queries=array_merge($query1,$query2);
		// return $merge_queries;
		
		
		$suggestions_hotels=$this->db->select('*')->from('tbl_hotel')->where("title LIKE '".strtoupper($latestQuery)."%'")->or_where("address LIKE '".strtoupper($latestQuery)."%'")->get();
		
		$query2= $suggestions_hotels->result();
		$merge_queries=($query2);
		return $merge_queries;


	}
	
	function all_hotels()
	{
		$query = $this->db->where('status', 1)->get('tbl_hotel');
		return $query->result();
	}
	
	function new_hotels()
	{
		$query = $this->db->where('status', 1)->order_by('id', "desc")->get('tbl_hotel', 4);
		return $query->result();
	}
	
	
	
	function img_thumb($id)
	{
		$query=$this->db->select('thumb_image')->where('id', $id)->where('status', 1)->get('tbl_ayurveda');
		return $query->row();
	}
	
	
	
	function location($id)
	{
		$query=$this->db->where('id', $id)->get('tbl_locations');
		return $query->row();
	}
	
	function search($category)
	{
		
		$this->db->select('tbl_hotel.*');
		$this->db->from('tbl_hotel');
		$this->db->join('tbl_sub_category','tbl_sub_category.id=tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$category);
		$this->db->where('tbl_hotel.status', 1);
		$query =$this->db->get();
		//print_r($query->result()); exit;
		return $query->result();
	}
	
	/* function star_count($value,$category)
	{
		$this->db->select('*');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_sub_category as b','a.sub_category_id=b.id');
		$this->db->like('b.name',$category);
		$this->db->where('a.star_rating',$value);
		$this->db->where('a.status','1');
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		return count($query->result());
	} */
	
	
	
	
	
	
	
	
	function star_count($value,$category,$text_val,$package,$pack_destination,$pack)
	{	//echo $pack;
		
		//if(!empty($text_val) && (empty($package) && empty($pack_destination)))
		//{
		if(!empty($text_val) && empty($pack))
		{
		$keyword= $text_val;
		
		//$post['text_val'] = $text_val;
		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
		$sql_qry2='';
		$sql_qry3='';
		$selescted_id='';
	
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$category.'" and a.star_rating="'.$value.'" and a.status="1" ';
		
		
		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like 
		"%'.$keyword.'%" OR a.place like "%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%")) 
		'.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(($query_res));
		 $count_result = count($query_res);
		
		
		$query_res_hotel_alone=array();
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			$selescted_id='';
		}
		
		
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (f.title like "%'.$keyword.'%" OR a.address like "%'.$keyword.'%" OR a.title like "%'.$keyword.'%" OR a.place like 
		"%'.$keyword.'%" OR d.district like "%'.$keyword.'%" OR d.state like "%'.$keyword.'%") '.$text.' group by f.title and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		 $count_result1 = count($query_res_hotel_alone);
		 echo $count = $count_result + $count_result1;
		}
		if(!empty($text_val) && ($pack=='ayur_pack'))
		{
			 $keyword= $package;
		
		//$post['text_val'] = $text_val;
		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
		$sql_qry2='';
		$sql_qry3='';
		$selescted_id='';
	
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$category.'" and a.star_rating="'.$value.'" and a.status="1" ';
		
		
		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((f.title like "%'.$keyword.'%")) 
		'.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(($query_res));
		 $count_result = count($query_res);
		
		
		$query_res_hotel_alone=array();
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			$selescted_id='';
		}
		
		
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (f.title like "%'.$keyword.'%" ) '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		 $count_result1 = count($query_res_hotel_alone);
		 echo $count = $count_result + $count_result1; 
			
		}
		
		
		if(!empty($text_val) && ($pack=='dest_pack'))
		{
		 	$keyword= $pack_destination;
		
		//$post['text_val'] = $text_val;
		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
		$sql_qry2='';
		$sql_qry3='';
		$selescted_id='';
	
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$category.'" and a.star_rating="'.$value.'" and a.status="1" ';
		
		
		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((a.destination like "%'.$keyword.'%")) 
		'.$dat_query.' '.$text.' and f.status=1 and b.room_status=1 and c.available_status=1 group by c.ayurveda_id)';
		
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		//print_r(($query_res));
		 $count_result = count($query_res);
		
		
		$query_res_hotel_alone=array();
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			$selescted_id='';
		}
		
		
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (a.destination like "%'.$keyword.'%" ) '.$text.' and f.status=1) ';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		 $count_result1 = count($query_res_hotel_alone);
		 echo $count = $count_result + $count_result1; 
		}
		
		
			
	}
	
	
	
	
	
	
	
	function room_price_lowest($ayur_id,$in,$out)
	{
		$this->db->select('tbl_ayurveda_rooms.price');
		$this->db->from('tbl_hotel');
		$this->db->join('tbl_ayurveda_rooms','tbl_ayurveda_rooms.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_ayurveda_rooms.room_id');
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
		{ 
					$post['check_in'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
					$post['check_out'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
				
		$this->db->where('("'.$post['check_in'].'"  BETWEEN tbl_ayurveda_rooms.valid_from AND tbl_ayurveda_rooms.valid_upto ) AND 
		("'.$post['check_out'].'"  BETWEEN tbl_ayurveda_rooms.valid_from AND tbl_ayurveda_rooms.valid_upto)');
		}
		$this->db->where('tbl_ayurveda_rooms.available_status',1);
		$this->db->where('tbl_hotel_room.room_status',1);
			$this->db->where('tbl_ayurveda_rooms.ayurveda_id',$ayur_id);
			$this->db->group_by('tbl_ayurveda_rooms.price');		
			$query_rooms=$this->db->get(); 
			//echo $this->db->last_query();
			return $query_rooms->result();
	}
	
	
	function getSetting($ayur_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_ayurveda_rooms');
		$this->db->where('available_status',1);
		$this->db->where('ayurveda_id',$ayur_id);
		$query = $this->db->get();
		return $query->result();
	
	}
	
	function getRoomSetting($hotel_id,$ayur_id)
	{
		
		
		$select_values = 'b.room_title,c.id,b.id as room_id';
		$hotel_new_arr=array();
		
		$text_room ='c.ayurveda_id="'.$ayur_id.'" and a.id="'.$hotel_id.'" '; 
		
			
		$sql_qry1='(select '.$select_values.' from tbl_hotel as a  left join tbl_ayurveda as f on f.hotel_id=a.id 
		left join tbl_hotel_room as b on a.id=b.hotel_id  left join tbl_ayurveda_rooms as c on b.id=c.room_id left join 
		tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$text_room.' and f.status=1 and b.room_status = 1 and c.available_status=1 group by b.id)';
		//if($i=2){ exit; }
	     $query_exe_rooms = $this->db->query($sql_qry1);
		$query_res_rooms=$query_exe_rooms->result();
		
		return $query_res_rooms;
		
	}
	
	
	
	function package_count($sub_category,$package)
	{
			$post['sub_cat_id']=$sub_category;
		//	$post['res_sub_cat_id']=$res_sub_category;
			 $post['package']=$package;
			  $place_qry='';
			$query_res=array();
			$result=array();
			$sql_qry1='';
			$selescted_id='';
		
		$keyword	= $post['package'];
			
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$post['sub_cat_id'].'"  and a.status="1" ';

		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((f.title like "%'.$keyword.'%" ))  '.$text.' and f.status=1 and b.room_status = 1 and c.available_status=1 group by c.ayurveda_id)';
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		$count1 = count($query_exe->result_array());
		
		
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (f.title like "%'.$keyword.'%" ) '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		$count2 = count($query_exe1->result_array());
		echo $total_count= $count1 +$count2;
				
		
	}
	
	
	function destination_count($sub_category,$destination)
	{
		
		
		$post['sub_cat_id']=$sub_category;
		//	$post['res_sub_cat_id']=$res_sub_category;
			 $post['destination']=$destination;
			  $place_qry='';
			$query_res=array();
			$result=array();
			$sql_qry1='';
			$selescted_id='';
		
		$keyword	= $post['destination'];
			
		$select_values='a.title,b.room_title,a.id as hotel_id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,
		b.id as rooms_id,d.district,f.id as ayur_id,f.title as ayur_title';
		
		$text ='and f.category="'.$post['sub_cat_id'].'"  and a.status="1" ';

		 $sql_qry='(select '.$select_values.' from tbl_ayurveda as f left join tbl_hotel as a on f.hotel_id=a.id left join tbl_ayurveda_rooms as c on c.ayurveda_id=f.id
left join tbl_hotel_room as b on a.id=b.hotel_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e on e.hotel_id=a.id
where ((a.destination like "%'.$keyword.'%" ))  '.$text.' and f.status=1 and b.room_status = 1 and c.available_status=1 group by c.ayurveda_id)';
		
		$query_exe = $this->db->query($sql_qry);
		$query_res=$query_exe->result_array();
		 $count1 = count($query_exe->result_array());
		
		
		 ////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['ayur_id'];
			if($q==0)
			{
			$selescted_id.='f.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and f.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id as hotel_id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,
		a.smoking_rooms,a.smoking_rooms,a.state,f.id as ayur_id,f.title as ayur_title';
		
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_ayurveda as f on f.hotel_id=a.id
		left join tbl_locations as d on a.state=d.id left join tbl_hotel_facilities as e on e.hotel_id=a.id where  
		'.$selescted_id.'  (a.destination like "%'.$keyword.'%" ) '.$text.' and f.status=1)';
		
		$query_exe1 = $this->db->query($sql_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		$count2 = count($query_exe1->result_array());
		echo $total_count= $count1 +$count2; 
		
	}
}

?>