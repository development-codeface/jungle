<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotels_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function search_keyword($keyword,$category)
	{
		
		if($category=='hotels')
		{
			$res_category = 'resorts';
		}
		else
		{
			$res_category ='';
		}
		
	
		$this->db->distinct();
		$this->db->select('a.place');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_sub_category as b','a.sub_category_id=b.id');
		
		if(!empty($res_category)){
		$this->db->where('((b.name like "%'.$category.'%"  ) or ( b.name like  "%'.$res_category.'%" ))');
		}else{		
		$this->db->like('b.name',$category);
		}
		
		$this->db->like('a.place',$keyword , 'after');
		$this->db->where('a.status','1');
		//echo $this->db->last_query();
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
				
				if(!empty($res_category)){
				$this->db->where('((c.name like "%'.$category.'%"  ) or ( c.name like  "%'.$res_category.'%" ))');
				}else{		
				$this->db->like('c.name',$category);
				}
				$this->db->where('a.place',$results->place);
				$this->db->where('a.status','1');
				$query2 = $this->db->get();
				
				$res2= $query2->result();
				
				//$search_key[] = $results->place. "," . $res2[0]->district. ",". $res2[0]->state;
				$search_key[] = $results->place;
				//array_push($result, json_encode(array("seriesname" => utf8_encode($results->place. "," . $res2[0]->district. ",". $res2[0]->state))));
			}
			
			// $final=	implode(",", $result);		
			
			
			// return $final;
			//print_r(json_encode($search_key)); 
			
			return json_encode($search_key);
		}
		else
		{
			
		$this->db->select('a.title,a.place,b.district,b.state');
		$this->db->from('tbl_hotel as a');
		$this->db->join('tbl_locations as b','a.state=b.id');
		$this->db->join('tbl_sub_category as c','a.sub_category_id=c.id');
		if(!empty($res_category)){
				$this->db->where('((c.name like "%'.$category.'%"  ) or ( c.name like  "%'.$res_category.'%" ))');
				}else{		
				$this->db->like('c.name',$category);
				}
		$this->db->like('a.title',$keyword , 'after');
		$this->db->or_like('a.address',$keyword , 'after');
		$this->db->where('a.status','1');
		
		$query = $this->db->get();
		$count2 = count($query->result());
		if($count2<>'')
		{
		$res=$query->result();
		
		$result = array();
		foreach($res as $results)
		{
			
			
			$search_key[] = $results->title. ",". $results->place. ",". $results->district;
			//$search_key[] = $results->title. ",". $results->place. ",". $results->district. ",".$results->state;
			//array_push($result, json_encode(array("seriesname" => utf8_encode($results->title. ",". $results->place. ",". $results->state))));
		}
		
		//$final=	implode(",", $result);	
		
		// return $final;
		return json_encode($search_key);
		}
		
		else
		{
			$this->db->distinct();
			$this->db->select('b.district,b.state');
			$this->db->from('tbl_hotel as a');
			$this->db->join('tbl_locations as b','a.state=b.id');
			$this->db->join('tbl_sub_category as c','a.sub_category_id=c.id');
			if(!empty($res_category)){
				$this->db->where('((c.name like "%'.$category.'%"  ) or ( c.name like  "%'.$res_category.'%" ))');
				}else{		
				$this->db->like('c.name',$category);
				}
			$this->db->like('b.district',$keyword , 'after');
			$this->db->or_like('a.state',$keyword , 'after');
			$this->db->where('a.status','1');
			
			$query = $this->db->get();
			$count3 = count($query->result());
			if($count3<>'')
			{
			$res=$query->result();
			
			$result = array();
			foreach($res as $results)
			{
				
				
				$search_key[] = $results->district;
				//$search_key[] = $results->district. ",".$results->state;
				//array_push($result, json_encode(array("seriesname" => utf8_encode($results->title. ",". $results->place. ",". $results->state))));
			}
			
			//$final=	implode(",", $result);	
			
			// return $final;
			return json_encode($search_key);
			}
			
		}
		
		}
		
		
		
		// $suggestions_hotels=$this->db->select('*')->from('tbl_hotel')->where("title LIKE '".strtoupper($keyword)."%'")->or_where("address LIKE '".strtoupper($keyword)."%'")->get();
// 		
		// $query2= $suggestions_hotels->result();
		// return $query2;
	}
	
	
	
		
		function ayurveda_search_keyword($keyword,$category)
		{
			$this->db->distinct();
			$this->db->select('a.title');
			$this->db->from('tbl_ayurveda as a');
			$this->db->join('tbl_sub_category as b','a.category=b.id');
			$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
			$this->db->like('b.name',$category);
			$this->db->like('a.title',$keyword , 'after');
			$this->db->where('c.status','1');
			$this->db->where('a.status','1');
			$query = $this->db->get();
			$count = count($query->result());
			if($count<>'')
			{
				$res=$query->result();
				$result = array();
				foreach($res as $results)
				{
					$this->db->select('a.title');
					$this->db->from('tbl_ayurveda as a');
					$this->db->join('tbl_sub_category as b','a.category=b.id');
					$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
					$this->db->like('b.name',$category);
					$this->db->like('a.title',$keyword , 'after');
					$this->db->where('c.status','1');
			$this->db->where('a.status','1');
					$query2 = $this->db->get();
					$res2= $query2->result();
					
					$search_key[] = $results->title;
				}
				
				return json_encode($search_key);
				
			}
			else
			{
				$this->db->distinct();
				$this->db->select('c.place');
				$this->db->from('tbl_ayurveda as a');
				$this->db->join('tbl_sub_category as b','a.category=b.id');
				$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
				$this->db->like('b.name',$category);
				$this->db->like('c.place',$keyword , 'after');
				$this->db->where('c.status','1');
			$this->db->where('a.status','1');
				$query = $this->db->get();
				$count1 = count($query->result());
				if($count1<>'')
				{
					$res=$query->result();
					$result = array();
					foreach($res as $results)
					{
						$this->db->select('c.place,d.state,d.district');
						$this->db->from('tbl_ayurveda as a');
						$this->db->join('tbl_sub_category as b','a.category=b.id');
						$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
						$this->db->join('tbl_locations as d','c.state=d.id');
						$this->db->like('b.name',$category);
						$this->db->where('c.place',$results->place);
						$this->db->where('c.status','1');
			$this->db->where('a.status','1');
						$query2 = $this->db->get();
						$res2= $query2->result();
						
						$search_key[] = $results->place;
						//$search_key[] = $results->place. "," . $res2[0]->district. ",". $res2[0]->state;
					}
					
					return json_encode($search_key);
				}
				else
				{
					$this->db->distinct();
					$this->db->select('c.title');
					$this->db->from('tbl_ayurveda as a');
					$this->db->join('tbl_sub_category as b','a.category=b.id');
					$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
					$this->db->like('b.name',$category);
					$this->db->join('tbl_locations as d','c.state=d.id');
					$this->db->like('c.title',$keyword , 'after');
					$this->db->or_like('c.address',$keyword , 'after');
					$this->db->where('c.status','1');
			$this->db->where('a.status','1');
					$query = $this->db->get();
					$count2 = count($query->result());
					if($count2<>'')
					{
					$res=$query->result();
					$result = array();
					foreach($res as $results)
					{
						$this->db->select('c.title,c.place,d.district,d.state');
						$this->db->from('tbl_ayurveda as a');
						$this->db->join('tbl_sub_category as b','a.category=b.id');
						$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
						$this->db->like('b.name',$category);
						$this->db->join('tbl_locations as d','c.state=d.id');
						$this->db->like('c.title',$results->title , 'after');
						$this->db->or_like('c.address',$results->title , 'after');
						$this->db->where('c.status','1');
			$this->db->where('a.status','1');
						$query2 = $this->db->get();
						$res2= $query2->result();
						//$search_key[] = $results->title. ",".$res2[0]->place. ",". $res2[0]->district. ",". $res2[0]->state;
						$search_key[] = $results->title;
					}
					return json_encode($search_key);
					}
					else
					{
						$this->db->distinct();
						$this->db->select('d.district');
						$this->db->from('tbl_ayurveda as a');
						$this->db->join('tbl_sub_category as b','a.category=b.id');
						$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
						$this->db->like('b.name',$category);
						$this->db->join('tbl_locations as d','c.state=d.id');
						$this->db->like('d.district',$keyword , 'after');
						$this->db->where('c.status','1');
			$this->db->where('a.status','1');
						$query = $this->db->get();
						$count3 = count($query->result());
						if($count3<>'')
						{
						$res=$query->result();
						$result = array();
						foreach($res as $results)
						{
							$this->db->select('d.district,d.state');
							$this->db->from('tbl_ayurveda as a');
							$this->db->join('tbl_sub_category as b','a.category=b.id');
							$this->db->join('tbl_hotel as c','c.id=a.hotel_id');
							$this->db->like('b.name',$category);
							$this->db->join('tbl_locations as d','c.state=d.id');
							$this->db->like('d.district',$results->district , 'after');
			$this->db->where('a.status','1');
							$this->db->where('c.status','1');
							$query2 = $this->db->get();
							$res2= $query2->result();
							//$search_key[] = $res2[0]->district. ",". $res2[0]->state;
							$search_key[] = $res2[0]->district;
						}
						
						return json_encode($search_key);
						}
						
					}
					
				}
			}
			
		}
	
	
	
	function all_hotels_search_based_destination($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{
		
		$place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
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
		
		$keyword	= $post['destination'];
		
		$select_values='a.title,a.destination,b.room_title,a.id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,b.id as rooms_id,d.district';
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		
		if(!empty($post['res_sub_cat_id']))
		{
		 $text ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or  a.sub_category_id="'.$post['res_sub_cat_id'].'") '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';
		}
		else
		{
		$text ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';
		}
		
		 $sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ((a.destination like "%'.$keyword.'%" )) '.$dat_query.' '.$text.'and b.room_status=1 and c.available_status=1 group by a.title)';
		
		 $query_hotels = $sql_qry1;
		$query_exe = $this->db->query($query_hotels);
		$query_res=$query_exe->result_array();

		
			///////////available rooms//////////
		$hotel_new_arr=array();
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{
		
		for($i=0; $i<=sizeof($query_res)-1;$i++)
		{
			if(!empty($post['res_sub_cat_id']))
		{
		$text_room ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or a.sub_category_id="'.$post['res_sub_cat_id'].'")  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and a.id='.$query_res[$i]['id'].'';
		}
		else{
				$text_room ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and a.id='.$query_res[$i]['id'].'';
		}
		
		$sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ((a.destination like "%'.$keyword.'%")) '.$dat_query.' '.$text_room.' and b.room_status=1 and c.available_status=1 group by b.id)';
		
	    $query_hotels_room = $sql_qry1;
		$query_exe_rooms = $this->db->query($query_hotels_room);
		$query_res_rooms=$query_exe_rooms->result();
		$hotel_new_arr[] =$query_res_rooms;
	
		}
		
		}
		
		
		/////////////////// new query starts here /////////////////////
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		    $hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			$selescted_id_date='';
			
			if(!empty($query_res))
			{
			$q=0;
			for($i=0;$i<=count($query_res)-1;$i++)
			{
				$id_hotels = $query_res[$i]['id'];
				if($q==0)
				{
				$selescted_id_date.='a.id !='.$id_hotels.'';
				$q=1;
				}
				else{
					$selescted_id_date.=' and a.id !='.$id_hotels.'';
				}
			} 
			$selescted_id_date.=' and';
			}
			
			$day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			 $date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			  $sql_new_qry_in= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.' ((a.destination like "%'.$keyword.'%" )) '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1 )'; 
			    $query_in_exe_rooms = $this->db->query($sql_new_qry_in);
				$hotel_in_arr_new = $query_in_exe_rooms->result_array();
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
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and a.id= '.$hotel_in_arr_new[$x]['id'].' ';
				
				$sql_new_qry_out= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.' ((a.destination like "%'.$keyword.'%" )) '.$date_checkout.' '.$text.' '.$select_conditions.'and b.room_status=1 and c.available_status=1 )';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array(); 
				
				if(empty($hotel_out_arr_new)){  break; }else 
				{
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['id']==$hotel_out_arr_new[$y]['id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]['id'], 'price' =>$hotel_in_arr_new[$x]['price']);
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
				}while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				$tot_price	=	$tot_price/$day_diff; 	
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]['id'], 'price' => $tot_price);
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
						$get_id.='a.id ='.$hid.'';
					}
					else{
						$get_id.=' or a.id ='.$hid.'';
					}
				}
			}
			 
			if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
				on e.hotel_id=a.id where '.$get_id.' and b.room_status=1 and c.available_status=1 group by a.title)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ if($outputArray[$x]['id']==$hotel_date_arr_new[$t]['id'])
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
				if(!empty($post['res_sub_cat_id']))
				{
			 $text_room ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or a.sub_category_id="'.$post['res_sub_cat_id'].'")  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and a.id='.$hotel_date_arr_new[$i]['id'].'';
				}
				else
			{
					$text_room ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and a.id='.$hotel_date_arr_new[$i]['id'].'';
			}
			
			
			$sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
			tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
			on e.hotel_id=a.id where  ((a.destination like "%'.$keyword.'%")) '.$date_checkin.' '.$text_room.' and b.room_status=1 and c.available_status=1 )';
			
			$sql_new_qry_in = ''.$sql_qry1.'';
			$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			$hotel_in_arr_new = $query_in_exe_rooms->result_array();
			
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
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and a.id= '.$hotel_in_arr_new[$x]['id'].' ';
			
					$sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
					tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
					on e.hotel_id=a.id where ((a.destination like "%'.$keyword.'%")) '.$date_checkout.' '.$text_room.' '.$select_conditions .' and b.room_status=1 and c.available_status=1 )';
				
				$sql_new_qry_out = ''.$sql_qry1.' ';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array(); 
				
				if(empty($hotel_out_arr_new)){  break; }else {
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['id']==$hotel_out_arr_new[$y]['id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_room_array[] = array('id'=> $hotel_in_arr_new[$x]['rooms_id'], 'price' =>$hotel_in_arr_new[$x]['price']);
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
				}while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				$tot_price	=	$tot_price/$day_diff; //echo "<br/>";	
				if(!empty($hotel_out_arr_new)){
				$setting_room_array[] = array('id'=> $hotel_out_arr_new[0]['rooms_id'], 'price' => $tot_price);
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
				$sql_new_qry_date= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
				on e.hotel_id=a.id  where '.$get_room_id.' and b.room_status=1 and c.available_status=1 group by b.id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$hotel_room_new_arr[]=(object)$new_array;
				} 
				$hotel_new_arr[] = $hotel_room_new_arr;
			}
		}
		/////////////////// new query ends here ///////////////////////
		
		
		
		
		
		
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,a.smoking_rooms,a.smoking_rooms,a.state';
		
		$keyword = $post['destination'];
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$selescted_id.'  (a.destination like "%'.$keyword.'%" ) 
		'.$text.' group by a.title)';
		
		$query_extra = $sql_extra;
		$query_exe1 = $this->db->query($query_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		
		return array($hotel_new_arr,$query_res, $query_res_hotel_alone);
		
		
	}
	
	
	function all_hotels_search_based($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{
		$m='';
		$kt=explode(" ",$post['text_val']);
		while(list($key,$val)=each($kt))
		{
			if($val<>" " and strlen($val) > 0)
			{
				$m .= 'a.title like "%'.$val.'%" or a.address like "%'.$val.'%" or  a.place like "%'.$val.'%" or d.district like "%'.$val.'%" or a.state like "%'.$val.'%" or ';
			
			}
		}
		$txt = $m;
		$str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $txt);
		$keyword =  "(".$str.")";

		$check_flag=0;
		$empty_flag=0;
		$place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
		$sql_qry2='';
		$sql_qry3='';
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
		
		 
		$query['text_val']		= explode(',', $post['text_val']);
		
		$select_values='a.title,b.room_title,a.id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,b.id as rooms_id,d.district';
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $post['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $post['check_out']), 'Y-m-d') ; 
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		
		if(!empty($post['res_sub_cat_id']))
		{
		 $text ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or  a.sub_category_id="'.$post['res_sub_cat_id'].'") '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';
		}
		else
		{
		$text ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.'  and a.status="1" ';
		}
		
		if(!empty($query['text_val'][0]))
		{
		$keyword1 =  $query['text_val'][0];
		
		$s_qry= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where a.title like "%'.$keyword1.'%" '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title)';
		
		$sql_qry1='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
		"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title)';
		}
		else
		{
			$sql_qry1='';
		}
		
		
		if(!empty($query['text_val'][1]))
		{
		$keyword2 = $query['text_val'][1];
		$sql_qry2='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like 
		"%'.$keyword2.'%" OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title )';
		}
		else
		{
			$sql_qry2='';
		}
		
		if(!empty($query['text_val'][2]))
		{
		$keyword3 = $query['text_val'][2];
		$sql_qry3='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like 
		"%'.$keyword3.'%" OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title ) ';
		
		}
		else
		{
			$sql_qry3='';
		}
		
		if(!empty($query['text_val'][3]))
		{
		$keyword4 = $query['text_val'][3];
		$sql_qry4='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like 
		"%'.$keyword4.'%" OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title ) ';
		}
		else
		{
			$sql_qry4='';
		}
		
		
		
	    $query_hotels = ''.$s_qry.' '.$sql_qry1.' '.$sql_qry2.' '.$sql_qry3.' '.$sql_qry4.'';
		$query_exe = $this->db->query($query_hotels);
		$query_res=$query_exe->result_array();
		
		
		///////////available rooms//////////
		$hotel_new_arr=array();
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{
		for($i=0; $i<=sizeof($query_res)-1;$i++)
		{
			if(!empty($post['res_sub_cat_id']))
			{
		 $text_room ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or a.sub_category_id="'.$post['res_sub_cat_id'].'")  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and a.id='.$query_res[$i]['id'].'';
			}
			else
		{
				$text_room ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
		and a.status="1" and a.id='.$query_res[$i]['id'].'';
		}
		
			
		if(!empty($query['text_val'][0]))
		{
		$keyword1 =  $query['text_val'][0];
		$sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
		"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$dat_query.' '.$text_room.' and b.room_status=1 and c.available_status=1 group by b.id)';
		}
		else
		{
			$sql_qry1='';
		}
		
		
		if(!empty($query['text_val'][1]))
		{
		$keyword2 = $query['text_val'][1];
		$sql_qry2='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like 
		"%'.$keyword2.'%" OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%")) '.$dat_query.' '.$text_room.' and b.room_status=1 and c.available_status=1 group by b.id)';
		}
		else
		{
			$sql_qry2='';
		}
		
		if(!empty($query['text_val'][2]))
		{
		$keyword3 = $query['text_val'][2];
		$sql_qry3='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like 
		"%'.$keyword3.'%" OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%")) '.$dat_query.' '.$text_room.' and b.room_status=1 and c.available_status=1 group by b.id ) ';
		
		}
		else
		{
			$sql_qry3='';
		}
		
		if(!empty($query['text_val'][3]))
		{
		$keyword4 = $query['text_val'][3];
		$sql_qry4='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like 
		"%'.$keyword4.'%" OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%")) '.$dat_query.' '.$text_room.' and b.room_status=1 and c.available_status=1 group by b.id ) ';
		}
		else
		{
			$sql_qry4='';
		}
	    $query_hotels_room = ''.$sql_qry1.' '.$sql_qry2.' '.$sql_qry3.' '.$sql_qry4.'';
		$query_exe_rooms = $this->db->query($query_hotels_room);
		$query_res_rooms=$query_exe_rooms->result();
			$hotel_new_arr[] =$query_res_rooms;
		}
		
		
		}
		
			
		/////////////////new query section starts here///////////////////////////////////
		$selescted_id_date='';
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id_date.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id_date.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id_date.=' and';
		}
		else
		{ $selescted_id_date='';
		}
		
		if(!empty($post['check_in']) && !empty($post['check_out']))
		{ 
		    $hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			$q=0;
		    $day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			$date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			  
		if(!empty($query['text_val'][0]))
		{
		$keyword1 =  $query['text_val'][0];
		$s_qry= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where  '.$selescted_id_date.'  a.title like "%'.$keyword1.'%" '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1 )';
		
		$sql_qry1='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.' ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
		"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1 )';
		}
		else
		{
			$sql_qry1='';
		}
		if(!empty($query['text_val'][1]))
		{
		$keyword2 = $query['text_val'][1];
		$sql_qry2='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where  '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like 
		"%'.$keyword2.'%" OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%")) '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1 )';
		}
		else
		{
			$sql_qry2='';
		}
		if(!empty($query['text_val'][2]))
		{
		$keyword3 = $query['text_val'][2];
		$sql_qry3='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like 
		"%'.$keyword3.'%" OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%")) '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1  ) ';
		}
		else
		{
			$sql_qry3='';
		}
		if(!empty($query['text_val'][3]))
		{
		$keyword4 = $query['text_val'][3];
		$sql_qry4='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like 
		"%'.$keyword4.'%" OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%")) '.$date_checkin.' '.$text.' and b.room_status=1 and c.available_status=1 ) ';
		}
		else
		{
			$sql_qry4='';
		}
			 
			 
		$sql_new_qry_in = ''.$s_qry.' '.$sql_qry1.' '.$sql_qry2.' '.$sql_qry3.' '.$sql_qry4.'';
		$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
		$hotel_in_arr_new = $query_in_exe_rooms->result_array();
			
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
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and a.id= '.$hotel_in_arr_new[$x]['id'].' ';
			
		if(!empty($query['text_val'][0]))
		{
		$keyword1 =  $query['text_val'][0];
		
				$s_qry= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where  '.$selescted_id_date.'  a.title like "%'.$keyword1.'%" '.$date_checkout.' '.$text.' '.$select_conditions.' and b.room_status=1 and c.available_status=1  )';
	
		$sql_qry1='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.' ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
		"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$date_checkout.' '.$text.' '.$select_conditions.' and b.room_status=1 and c.available_status=1 )';
		}
		else
		{
			$sql_qry1='';
		}
		if(!empty($query['text_val'][1]))
		{
		$keyword2 = $query['text_val'][1];
		$sql_qry2='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where  '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like 
		"%'.$keyword2.'%" OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%")) '.$date_checkout.' '.$text.' '.$select_conditions.' and b.room_status=1 and c.available_status=1 )';
		}
		else
		{
			$sql_qry2='';
		}
		if(!empty($query['text_val'][2]))
		{
		$keyword3 = $query['text_val'][2];
		$sql_qry3='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like 
		"%'.$keyword3.'%" OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%")) '.$date_checkout.' '.$text.'  '.$select_conditions.' and b.room_status=1 and c.available_status=1  ) ';
		}
		else
		{
			$sql_qry3='';
		}
		if(!empty($query['text_val'][3]))
		{
		$keyword4 = $query['text_val'][3];
		$sql_qry4='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where '.$selescted_id_date.'  ('.$keyword.' or (a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like 
		"%'.$keyword4.'%" OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%")) '.$date_checkout.' '.$text.' '.$select_conditions.' and b.room_status=1 and c.available_status=1  ) ';
		}
		else
		{
			$sql_qry4='';
		}
				$sql_new_qry_out = ''.$s_qry.' '.$sql_qry1.' '.$sql_qry2.' '.$sql_qry3.' '.$sql_qry4.'';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array(); 
				
				if(empty($hotel_out_arr_new)){  break; }else {
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['id']==$hotel_out_arr_new[$y]['id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_price_array[] = array('id'=> $hotel_in_arr_new[$x]['id'], 'price' =>$hotel_in_arr_new[$x]['price']);
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
				
				}while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				$tot_price	=	$tot_price/$day_diff; 
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('id'=> $hotel_out_arr_new[0]['id'], 'price' => $tot_price);
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
						$get_id.='a.id ='.$hid.'';
						}
						else{
							$get_id.=' or a.id ='.$hid.'';
						}
				}
			 }
			 
			if(!empty($get_id))
			{
			   $sql_new_qry_date= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
				on e.hotel_id=a.id where '.$get_id.' and b.room_status=1 and c.available_status=1 group by a.title)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				for($t=0;$t<count($hotel_date_arr_new);$t++)
				{
					for($x=0;$x<count($outputArray);$x++)
					{ if($outputArray[$x]['id']==$hotel_date_arr_new[$t]['id'])
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
				if(!empty($post['res_sub_cat_id']))
				{
			 $text_room ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or a.sub_category_id="'.$post['res_sub_cat_id'].'")  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and a.id='.$hotel_date_arr_new[$i]['id'].'';
				}
				else
			{
					$text_room ='and a.sub_category_id="'.$post['sub_cat_id'].'"  '.$star_cond.' '.$loc_cond.' '.$name_range.' '.$fac_cond.' 
			and a.status="1" and a.id='.$hotel_date_arr_new[$i]['id'].'';
			}
			
				
			if(!empty($query['text_val'][ 0]))
			{
			$keyword1 =  $query['text_val'][0];
			$sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
			tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
			on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
			"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$date_checkin.' '.$text_room.' and b.room_status=1 and c.available_status=1 )';
			}
			else
			{
				$sql_qry1='';
			}
			
			$sql_new_qry_in = ''.$sql_qry1.'';
			$query_in_exe_rooms = $this->db->query($sql_new_qry_in);
			$hotel_in_arr_new = $query_in_exe_rooms->result_array();
			
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
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]['normal_allowed_kids'].' and a.id= '.$hotel_in_arr_new[$x]['id'].' ';
			
				if(!empty($query['text_val'][0]))
				{
					$keyword1 =  $query['text_val'][0];
					$s_qry= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
				on e.hotel_id=a.id where  '.$selescted_id_date.'  a.title like "%'.$keyword1.'%" '.$date_checkout.' '.$text_room.' '.$select_conditions.' and b.room_status=1  and c.available_status=1 )';
			
					$sql_qry1='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
					tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
					on e.hotel_id=a.id where ('.$keyword.' or (a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like 
					"%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$date_checkout.' '.$text_room.' '.$select_conditions .' and b.room_status=1 and c.available_status=1 )';
				}
				else
				{
					$sql_qry1='';
				}
				$sql_new_qry_out = ''.$s_qry.'  '.$sql_qry1.' ';
				$query_out_exe_rooms = $this->db->query($sql_new_qry_out);
				$hotel_out_arr_new=$query_out_exe_rooms->result_array(); 
				
				if(empty($hotel_out_arr_new)){  break; }else {
					for($y=0;$y<count($hotel_out_arr_new);$y++)
					{
						if($hotel_in_arr_new[$x]['id']==$hotel_out_arr_new[$y]['id'] && $hotel_in_arr_new[$x]['rooms_id']==$hotel_out_arr_new[$y]['rooms_id'] && $hotel_in_arr_new[$x]['normal_allowed_adults']==$hotel_out_arr_new[$y]['normal_allowed_adults'] && $hotel_in_arr_new[$x]['normal_allowed_kids']==$hotel_out_arr_new[$y]['normal_allowed_kids'])
						{ 
								$upto_date = date_create($hotel_in_arr_new[$x]['valid_upto']);
								date_add($upto_date, date_interval_create_from_date_string('1 days'));
								$date_nxt =  date_format($upto_date, 'Y-m-d'); 
								if($post['check_in']==$hotel_in_arr_new[$x]['valid_upto'] && $day_diff==1)
								{
									 $setting_room_array[] = array('id'=> $hotel_in_arr_new[$x]['rooms_id'], 'price' =>$hotel_in_arr_new[$x]['price']);
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
				}while($hotel_out_arr_new[0]['valid_upto']<$post['check_out']);
				$tot_price	=	$tot_price/$day_diff; //echo "<br/>";	
				if(!empty($hotel_out_arr_new)){
				$setting_room_array[] = array('id'=> $hotel_out_arr_new[0]['rooms_id'], 'price' => $tot_price);
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
				$sql_new_qry_date= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
				on e.hotel_id=a.id  where '.$get_room_id.' and b.room_status=1 and c.available_status=1  group by b.id)';
				$query_date_exe_rooms = $this->db->query($sql_new_qry_date);
				$hotel_date_arr_new=$query_date_exe_rooms->result_array(); 
				
				foreach($hotel_date_arr_new as $new_array)
				{
					$hotel_room_new_arr[]=(object)$new_array;
				} 
				$hotel_new_arr[] = $hotel_room_new_arr;
			}
		}
		///////////////////new query section ends here///////////////////////////
			
		
		
		
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,a.smoking_rooms,a.smoking_rooms,a.state';
		if(!empty($query['text_val'][0]))
		{$keyword1 = $query['text_val'][0];
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$selescted_id.'  (a.address like "%'.$keyword1.'%" OR a.title like 
		"%'.$keyword1.'%" OR a.place like "%'.$keyword1.'%" OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%") 
		'.$text.' group by a.title)';
		}
		else
		{
			$sql_extra = '';
		}
		if(!empty($query['text_val'][1]))
		{$keyword2 = $query['text_val'][1];
		$sql_extra2 = 'union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$selescted_id.' (a.address like "%'.$keyword2.'%" OR a.title like 
		"%'.$keyword2.'%" OR a.place like "%'.$keyword2.'%" OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%") 
		'.$text.' group by a.title)';
		}
		else
		{
			$sql_extra2='';
		}
		
		if(!empty($query['text_val'][2]))
		{
		$sql_extra3 = ' union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id  where  '.$selescted_id.' (a.address like "%'.$keyword3.'%" OR a.title like 
		"%'.$keyword3.'%" OR a.place like "%'.$keyword3.'%" OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%") 
		'.$text.' group by a.title)';
		}
		else
		{
			$sql_extra3='';
		}
		
		if(!empty($query['text_val'][3]))
		{
		$sql_extra4 = 'union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$selescted_id.' (a.address like "%'.$keyword4.'%" OR a.title like 
		"%'.$keyword4.'%" OR a.place like "%'.$keyword4.'%" OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%") 
		'.$text.' group by a.title)';
		}
		else
		{
			$sql_extra4='';
		}
		
		$query_extra = ''.$sql_extra.' '.$sql_extra2.' '.$sql_extra3.' '.$sql_extra4.' ';
		$query_exe1 = $this->db->query($query_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		
		return array($hotel_new_arr,$query_res, $query_res_hotel_alone);
										
										
	} 
	
function hotelAgencyById($hotel)
{
	$this->db->select('room_tariff');
	$this->db->like('agency', "bookingwings");
	$this->db->where('hotel_id', $hotel);
	$this->db->where('status', 1);
	$query_percentage = $this->db->get('tbl_agency');
	return $query_percentage->result();
}

function hotelAgencyCommissionById($hotel)
{
	$date=date('Y-m-d');
	
	$this->db->select('commision');
	$this->db->where('hotel_id', $hotel);
	$this->db->order_by('date','desc');
	//$this->db->order_by("id", "desc");
	//$this->db->like('date(date)',$date);
	$query_percentage = $this->db->get('tbl_commision');
	return $query_percentage->result();
}

function hotelofferById($rooms_id,$check_in,$check_out)
{
/* 	$this->db->select('offer');
	$this->db->select('from_date');
	$this->db->select('to_date');
	$this->db->where('hotel_id', $rooms_id);
	$this->db->where('status', 1)->where('from_date',$check_in)->where('to_date',$check_out);
	$this->db->order_by("id", "desc");
	$query_percentage = $this->db->get('tbl_offers');
	return $query_percentage->result(); */
	
	//$date =  date('Y-m-d');
		 //$next_day = date('Y-m-d', strtotime(' +1 day')); 
		
		
		$this->db->select('offer,from_date,to_date');
		$this->db->where('hotel_id', $rooms_id);
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
		$query = $this->db->select('child_free_limit')->select('room_child_rate')->where('hotel_id', $id)->where('available_status', 1)->get('tbl_hotel_room_settings');
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
		$query=$this->db->select('thumb')->where('hotel_id', $id)->get('tbl_hotel_image');
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
	
	
	
	
	
	function clean_up( $txt )
		 {
			$unwanted = array("\'",'"'); 
   			return str_ireplace( $unwanted, '', $txt );
		 }
	
	
	
	
	
	
	//function star_count($value,$category,$res_category,$text_val)
	function star_count($value,$category,$res_category,$text_val,$destination)
	{
		
		$text_val = $this->clean_up($text_val);
		if(empty($destination))
		{
		//echo $category; exit;
		$m='';
		$kt=explode(" ",$text_val);
		while(list($key,$val)=each($kt))
		{
			if($val<>" " and strlen($val) > 0)
			{
				$m .= 'a.title like "%'.$val.'%" or a.address like "%'.$val.'%" or  a.place like "%'.$val.'%" or d.district like "%'.$val.'%" or a.state like "%'.$val.'%" or ';
			
			}
		}
		
		$txt = $m;
		$str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $txt);
		$keyword =  "(".$str.")";
		
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
		
		$query['text_val']		= explode(',', $text_val);
		
		$select_values='a.title,b.room_title,a.id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,b.id as rooms_id,d.district';
		
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d') ; 
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		if(!empty($res_category))
		{
			$text ='and (a.sub_category_id="'.$category.'" or a.sub_category_id="'.$res_category.'") and star_rating="'.$value.'" and a.status="1" ';
		}else{
		$text ='and a.sub_category_id="'.$category.'" and star_rating="'.$value.'" and a.status="1" ';
		}
		
		
		
		if(!empty($query['text_val'][0]))
		{ 
		$keyword1 =  $query['text_val'][0]; 
		$s_qry= '(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where a.title like "%'.$keyword1.'%" '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title)';
		
		
		 $sql_qry1='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state where ('.$keyword.' or
		(a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like "%'.$keyword1.'%" 
		OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title)';
		}
		else
		{
			 $sql_qry1='';
		}
		//return $x=$sql_qry1;
		
		
		if(!empty($query['text_val'][1]))
		{
		$keyword2 = $query['text_val'][1];
		$sql_qry2='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state where ('.$keyword.' or
		(a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like "%'.$keyword2.'%" 
		OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title )';
		}
		else
		{
			$sql_qry2='';
		}
		
		if(!empty($query['text_val'][2]))
		{
		$keyword3 = $query['text_val'][2];
		$sql_qry3='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state where ('.$keyword.' or
		(a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like "%'.$keyword3.'%" 
		OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title ) ';
		
		}
		else
		{
			$sql_qry3='';
		}
		
		if(!empty($query['text_val'][3]))
		{
		$keyword4 = $query['text_val'][3];
		$sql_qry4='union (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state where ('.$keyword.' or
		(a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like "%'.$keyword4.'%" 
		OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%")) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title ) ';
		}
		else
		{
			$sql_qry4='';
		}
		
	    $query_hotels = ''.$s_qry.' '.$sql_qry1.' '.$sql_qry2.' '.$sql_qry3.' '.$sql_qry4.'';
		$query_exe = $this->db->query($query_hotels);
		$query_res=$query_exe->result_array();
		$count_result = count($query_res);
		
		$query_res_hotel_alone=array();
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}else
		{
			$selescted_id='';
			
		}
		
		$select_extra_values='a.title,a.id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,a.smoking_rooms,a.smoking_rooms,a.state';
		if(!empty($query['text_val'][0]))
		{$keyword1 = $query['text_val'][0];	
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id  where  '.$selescted_id.'
		(a.address like "%'.$keyword1.'%" OR a.title like "%'.$keyword1.'%" OR a.place like "%'.$keyword1.'%" 
		OR d.district like "%'.$keyword1.'%" OR d.state like "%'.$keyword1.'%") '.$text.' group by a.title)';
		}
		else
		{
			$sql_extra = '';
		}
		if(!empty($query['text_val'][1]))
		{$keyword2 = $query['text_val'][1];
		 $sql_extra2 = 'union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id  where  '.$selescted_id.' 
		(a.address like "%'.$keyword2.'%" OR a.title like "%'.$keyword2.'%" OR a.place like "%'.$keyword2.'%" 
		OR d.district like "%'.$keyword2.'%" OR d.state like "%'.$keyword2.'%") '.$text.' group by a.title)';
		}
		else
		{
			$sql_extra2='';
		}
		
		if(!empty($query['text_val'][2]))
		{
		$sql_extra3 = ' union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id  where  '.$selescted_id.' 
		(a.address like "%'.$keyword3.'%" OR a.title like "%'.$keyword3.'%" OR a.place like "%'.$keyword3.'%" 
		OR d.district like "%'.$keyword3.'%" OR d.state like "%'.$keyword3.'%") '.$text.' group by a.title)';
		}
		else
		{
			$sql_extra3='';
		}
		
		if(!empty($query['text_val'][3]))
		{
		$sql_extra4 = 'union (select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id  where  '.$selescted_id.' 
		(a.address like "%'.$keyword4.'%" OR a.title like "%'.$keyword4.'%" OR a.place like "%'.$keyword4.'%" 
		OR d.district like "%'.$keyword4.'%" OR d.state like "%'.$keyword4.'%") '.$text.' group by a.title)';
		}
		else
		{
			$sql_extra4='';
		}
		
		$query_extra = ''.$sql_extra.' '.$sql_extra2.' '.$sql_extra3.' '.$sql_extra4.' ';
		$query_exe1 = $this->db->query($query_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		$hotel_new_arr =array();
		 $count_result1 = count($query_res_hotel_alone);
		 echo $count = $count_result + $count_result1;
			
	}
	else
	{ 
		 
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
		
		
		$select_values='a.title,b.room_title,a.id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,b.id as rooms_id,d.district';
		
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
		{ 
		$post['check_in']= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_in']), 'Y-m-d') ; 
		$post['check_out']= date_format(date_create_from_format('d-m-Y', $this->session->userdata['datahere']['check_out']), 'Y-m-d') ; 
		$dat_query = ' and (("'.$post['check_in'].'"  BETWEEN c.valid_from AND c.valid_upto ) AND ("'.$post['check_out'].'"  BETWEEN c.valid_from AND c.valid_upto))';
		}else
		{
			$dat_query ='';
		}
		if(!empty($res_category))
		{
			$text ='and (a.sub_category_id="'.$category.'" or a.sub_category_id="'.$res_category.'") and star_rating="'.$value.'" and a.status="1" ';
		}else{
		$text ='and a.sub_category_id="'.$category.'" and star_rating="'.$value.'" and a.status="1" ';
		}
		
		
		$keyword =$destination;
		
		 $sql_qry1=' (select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state where (
		(a.destination like "%'.$keyword.'%" )) '.$dat_query.' '.$text.' and b.room_status=1 and c.available_status=1 group by a.title)';
		
	    $query_hotels = $sql_qry1;
		$query_exe = $this->db->query($query_hotels);
		$query_res=$query_exe->result_array();
		$count_result = count($query_res);
		
		$query_res_hotel_alone=array();
		////////// Fetch all Hotels even without Room setting/////////////
		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}else
		{
			$selescted_id='';
			
		}
		
		$select_extra_values='a.title,a.id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,a.smoking_rooms,a.smoking_rooms,a.state';
		
		$keyword = $destination;	
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id  where  '.$selescted_id.'
		(a.destination like "%'.$keyword.'%") '.$text.' group by a.title)';
		
		
		$query_extra = $sql_extra;
		$query_exe1 = $this->db->query($query_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		$hotel_new_arr =array();
		 $count_result1 = count($query_res_hotel_alone);
		 echo $count = $count_result + $count_result1; 
		
	}
}
	
	
	
	
	
	
	function available_rooms_count($hotel_id,$room_id)
	{
		
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
				{
						 $post['check_in'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
						$post['check_out'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
						
						$this->db->where('((a.check_in BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'") or (a.check_out BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'")) and (a.check_out != "'.$post['check_in'].'")');	
				
					}
					else
					{	$post['check_in'] =  date('Y-m-d');
						$post['check_out'] = date('Y-m-d', strtotime(' +1 day')); 
						$this->db->where('((a.check_in BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'") or (a.check_out BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'")) and (a.check_out != "'.$post['check_in'].'")');	
				
					}
					$this->db->select('a.id,a.room_number');
					$this->db->from('tbl_booking_rooms a');
					$this->db->join('tbl_booking b','a.booking_id=b.id');
					$this->db->join('tbl_hotel_room_settings c','c.id=b.room_id');
					$this->db->join('tbl_hotel_room d','d.id=c.room_id');
					$this->db->where('b.hotel_id',$hotel_id);
					$this->db->where('d.id',$room_id);
					$this->db->where('b.cancel!=','2');
					$this->db->where('b.status!=','3');
					$this->db->where('c.available_status',1);
					$this->db->where('d.room_status',1);
					$q1 = $this->db->get();
				    $booked_rooms1 =  count($q1->result());
				   
				   
				    $this->db->select('a.id,a.room_number');
					$this->db->from('tbl_booking_rooms a');
					$this->db->join('tbl_booking b','a.booking_id=b.id');
					$this->db->join('tbl_ayurveda_rooms c','c.id=b.room_id');
					$this->db->join('tbl_hotel_room d','d.id=c.room_id');
					if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
					{
						 $post['check_in'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
						$post['check_out'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
						
						
						$this->db->where('((a.check_in BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'") or (a.check_out BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'")) and (a.check_out != "'.$post['check_in'].'")');	
					}
					else
					{	$post['check_in'] =  date('Y-m-d');
						$$post['check_out'] = date('Y-m-d', strtotime(' +1 day')); 
						$this->db->where('((a.check_in BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'") or (a.check_out BETWEEN "'. $post['check_in']. '" and "'. $post['check_out'].'")) and (a.check_out != "'.$post['check_in'].'")');	
					}
					$this->db->where('b.hotel_id',$hotel_id);
					$this->db->where('d.room_status',1);
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
					$date =  date('Y-m-d');
					$next_day = date('Y-m-d', strtotime(' +1 day')); 
					$this->db->where('(("'.$date.'" NOT BETWEEN a.valid_from AND a.valid_to ) or ("'.$next_day.'"  NOT BETWEEN a.valid_from AND a.valid_to))');
					
				}
				//echo $this->db->last_query();
					//$this->db->where('a.status','1');
					$query_remaining = $this->db->get();
					$total_rooms = count($query_remaining->result());
					return $remaining_room['available_rooms'] = $total_rooms - $booked_rooms;
				
	}
	
	
	
	
	function room_price_lowest($hotel_id,$in,$out,$person)
	{
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->from('tbl_hotel');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		if(!empty($this->session->userdata['datahere']['check_in']) && !empty($this->session->userdata['datahere']['check_out']))
		{ 
				$post['check_in'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_in']), 'Y-m-d'); 
						$post['check_out'] = date_format(date_create_from_format('d-m-Y',$this->session->userdata['datahere']['check_out']), 'Y-m-d'); 
						
		$this->db->where('("'.$post['check_in'].'"  BETWEEN tbl_hotel_room_settings.valid_from AND tbl_hotel_room_settings.valid_upto ) AND 
		("'.$post['check_out'].'"  BETWEEN tbl_hotel_room_settings.valid_from AND tbl_hotel_room_settings.valid_upto)');
		}
		$this->db->where('(tbl_hotel_room_settings.allowed_persons="'.$person.'" or tbl_hotel_room_settings.allowed_persons>"'.$person.'")');
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->where('tbl_hotel_room.room_status',1);
			$this->db->where('tbl_hotel.id',$hotel_id);
			$this->db->group_by('tbl_hotel_room_settings.price');		
			$query_rooms=$this->db->get(); 
			
			$res_query = $query_rooms->result();
			
			////////////new query starts here //////////////////
			if(empty($res_query))
			{
			$hotel_in_arr_new =array();
			$hotel_out_arr_new =array();
			$setting_price_array= array();
			
			$select_values_new ='c.price,c.valid_from,c.valid_upto,c.id,c.normal_allowed_adults,c.normal_allowed_kids,c.room_id';
		
		     $day_diff = floor((strtotime($post['check_out']) - strtotime($post['check_in']))/(60*60*24));
			 $date_checkin = ' and ("'.$post['check_in'] .'"  BETWEEN c.valid_from AND c.valid_upto )';
			 $sql_new_qry_in= '(select '.$select_values_new.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id where a.id='.$hotel_id.'   '.$date_checkin.' and (c.allowed_persons="'.$person.'" or c.allowed_persons>"'.$person.'") and b.room_status = 1 and c.available_status=1 )'; 
			    $query_in_exe_rooms = $this->db->query($sql_new_qry_in);
				 $hotel_in_arr_new=$query_in_exe_rooms->result();
				 
			
			 for($x=0;$x<count($hotel_in_arr_new);$x++)
			{  
				 $date = date_create($hotel_in_arr_new[$x]->valid_upto);
				$cin_date = $hotel_in_arr_new[$x]->valid_upto;
				$cin_count = floor((strtotime($cin_date) - strtotime($post['check_in']))/(60*60*24));
				$tot_price = ($cin_count+1)*$hotel_in_arr_new[$x]->price; 
				
				do{
				date_add($date, date_interval_create_from_date_string('1 days'));
				$date_check =  date_format($date, 'Y-m-d');
				$date_checkout = ' and ("'.$date_check .'"  BETWEEN c.valid_from AND c.valid_upto )';
				
				$select_conditions = 'and c.room_id ='.$hotel_in_arr_new[$x]->room_id.' and c.normal_allowed_adults='.$hotel_in_arr_new[$x]->normal_allowed_adults.' and 
				c.normal_allowed_kids='.$hotel_in_arr_new[$x]->normal_allowed_kids.' and (c.allowed_persons="'.$person.'" or c.allowed_persons>"'.$person.'") ';
				
				 $sql_new_qry_out= '(select '.$select_values_new.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
				tbl_hotel_room_settings as c on b.id=c.room_id where a.id='.$hotel_id.'   '.$date_checkout.'  '.$select_conditions.'  and b.room_status = 1  and c.available_status=1  )';
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
								if($post['check_in']==$hotel_in_arr_new[$x]->valid_upto && $day_diff==1)
								{ 
									$setting_price_array[] = array('price' =>$hotel_in_arr_new[$x]->price);
								}
								else
								{ 
									if($hotel_out_arr_new[$y]->valid_upto>=$post['check_out'])
									{ 
									$count_count=  floor((strtotime($post['check_out']) - strtotime($hotel_out_arr_new[$y]->valid_from))/(60*60*24));
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
				
				}while($hotel_out_arr_new[0]->valid_upto < $post['check_out']);
				$tot_price	=	$tot_price/$day_diff; 
				if(!empty($hotel_out_arr_new)){
				$setting_price_array[] = array('price' => $tot_price);
				}
			}
			
			for($i=0;$i<count($setting_price_array);$i++)
			{
				$setting_id = (object) $setting_price_array[$i];
				$setting_price_array[$i] =($setting_id);
			} 
			
			return ($setting_price_array);				
			}
				
			///////////////new query ends here ///////////////////
			else
			{

			return $query_rooms->result();
			}
			
			
	}
	
	
	function destination_count($sub_category,$res_sub_category,$destination)
	{
			$post['sub_cat_id']=$sub_category;
			$post['res_sub_cat_id']=$res_sub_category;
			 $post['destination']=$destination;
			
			 $place_qry='';
		$query_res=array();
		$result=array();
		$sql_qry1='';
		$selescted_id='';
		
		$keyword	= $post['destination'];
		
		$select_values='a.title,a.destination,b.room_title,a.id,a.place,a.free_parking,a.free_wifi,a.star_rating,a.pool,a.smoking_rooms,
		c.id as settings_id,c.allowed_persons,c.normal_allowed_adults,c.child_free_limit,c.room_child_rate,c.room_adult_rate,
		c.normal_allowed_kids,c.tax_applicable,a.state,c.price,b.room_title,c.valid_from,c.valid_from,c.valid_upto,b.id as rooms_id,d.district';
		
		
		if(!empty($post['res_sub_cat_id']))
		{
		 $text ='and (a.sub_category_id="'.$post['sub_cat_id'].'" or  a.sub_category_id="'.$post['res_sub_cat_id'].'") and a.status="1" ';
		}
		else
		{
		$text ='and a.sub_category_id="'.$post['sub_cat_id'].'"  and a.status="1" ';
		}
		
		 $sql_qry1='(select '.$select_values.' from tbl_hotel as a left join tbl_hotel_room as b on a.id=b.hotel_id left join
		tbl_hotel_room_settings as c on b.id=c.room_id left join tbl_locations as d on d.id=a.state left join tbl_hotel_facilities as e 
		on e.hotel_id=a.id where ((a.destination like "%'.$keyword.'%" )) '.$text.'  and b.room_status = 1 and c.available_status=1  group by a.title)';
		
		 $query_hotels = $sql_qry1;
		$query_exe = $this->db->query($query_hotels);
		 $query_res=($query_exe->result_array());
		 $count1 = count($query_exe->result_array());

		if(!empty($query_res))
		{
		$q=0;
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$id_hotels = $query_res[$i]['id'];
			if($q==0)
			{
			$selescted_id.='a.id !='.$id_hotels.'';
			$q=1;
			}
			else{
				$selescted_id.=' and a.id !='.$id_hotels.'';
			}
		} 
		$selescted_id.=' and';
		}
		else
		{
			
		}
		
		$query_res_hotel_alone=array();
		$select_extra_values='a.title,a.id,a.star_rating,a.place,a.free_parking,a.free_wifi,a.pool,a.smoking_rooms,a.smoking_rooms,a.state';
		
		$keyword = $post['destination'];
		$sql_extra = '(select '.$select_extra_values.' from tbl_hotel as a left join tbl_locations as d on a.state=d.id left join 
		tbl_hotel_facilities as e on e.hotel_id=a.id where  '.$selescted_id.'  (a.destination like "%'.$keyword.'%" ) 
		'.$text.' group by a.title)';
		
		$query_extra = $sql_extra;
		$query_exe1 = $this->db->query($query_extra);
		$query_res_hotel_alone= $query_exe1->result_array();
		$count2= count($query_exe1->result_array());
		echo $total_count = $count1+$count2;
		//return array($query_res, $query_res_hotel_alone);
		
		
				
		
	}
	
	
}

?>