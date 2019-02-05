<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session_search extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	
	
	
	function all_hotels_search_based($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{
		$check_flag=0;
		$empty_flag=0;
		$condition_adults="";
		$place_qry='';
		$query_res=array();
		$total_headcount=(max($post['tot_adults'] + $post['tot_childrens']));
		$result=array();
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');

		$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

		
		
		if(!empty($post['text_val']))
		{
			$this->db->where('(tbl_hotel.address like "%'.$post['text_val'].'%" OR tbl_hotel.title like "%'.$post['text_val'].'%")');
		}
		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}

		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")"; 
			$this->db->where($pc_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}

		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}

		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->order_by('tbl_hotel_room_settings.price');		
		$query=$this->db->get(); 
		$query_res=$query->result();


	if(empty($query_res))
	{
		$empty_flag=1;
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		
		
		if(!empty($post['text_val']))
		{
			$this->db->where('(tbl_hotel.address like "%Trivandrum%" OR tbl_hotel.title like "%Trivandrum%")');
		}
		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}
		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")";
			$this->db->where($pc_cond, NULL, FALSE);
		}

		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}

		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->order_by('tbl_hotel_room_settings.price');		
		$query=$this->db->get(); 
		$query_res=$query->result();
	}

////////////////////Room number avail check/////////////////////////////////////////////////////////////////////////////	

	for($i=0; $i<=sizeof($query_res)-1;$i++)
	{

		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		
		
		if(!empty($post['text_val']) && $empty_flag==0 )
		{
			$this->db->where('(tbl_hotel.address like "%'.$post['text_val'].'%" OR tbl_hotel.title like "%'.$post['text_val'].'%")');
		}
		else
		{
			$this->db->where('(tbl_hotel.address like "%Trivandrum%" OR tbl_hotel.title like "%Trivandrum%")');
		}

		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")";
			$this->db->where($pc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

		// if(!empty($post['tot_adults']) )
		// {
		// 	$this->db->where('tbl_hotel_room_settings.allowed_persons >=',$max_adult);
						
		// }
			$this->db->where('tbl_hotel.id',$query_res[$i]->id);
			$this->db->group_by('tbl_hotel_room.id');
			$this->db->order_by('tbl_hotel_room_settings.price');		
			$query_rooms=$this->db->get(); 
			$query_res_rooms=$query_rooms->result();

		foreach($query_res_rooms as $key=>$room_types)
		{
				$tot_rooms='';
				$this->db->select('tbl_hotel_roomnumber.room_number');
				$this->db->select('tbl_hotel_room_settings.valid_from');
				$this->db->select('tbl_hotel_room_settings.valid_upto');
				$this->db->select('tbl_hotel_room_settings.available_status');
				$this->db->from('tbl_hotel_room_settings');
				$this->db->from('tbl_hotel_roomnumber');
				$this->db->join('tbl_booking_rooms','tbl_booking_rooms.room_number=tbl_hotel_roomnumber.id');
				if(!empty($post['check_out']) && !empty($post['check_out']))
				{
					$this->db->where('((tbl_booking_rooms.check_in BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_booking_rooms.check_out BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

				}

				if(!empty($query_res))
				{
					$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
					$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
				}
				$this->db->where('tbl_hotel_room_settings.available_status',1);
				$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

				$query_booked_rooms=$this->db->get(); 
				if(!empty($query_booked_rooms))
				{
					$query_res_booked_rooms=$query_booked_rooms->result();
				}
				
				else
				{
					$query_res=array_values($query_res);
					$query_res_booked_rooms='';
				}
				if(!empty($query_res_booked_rooms))
				{
					foreach($query_res_booked_rooms as $room_arrays)
					{
						$tot_rooms.=$room_arrays->room_number.",";
					}
					$tot_rooms=rtrim($tot_rooms,",");
					$arr=explode(',',$tot_rooms);
					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
					$this->db->from('tbl_hotel_roomnumber');

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
					if(!empty($arr))
					{
						$this->db->where_not_in('tbl_hotel_roomnumber.room_number',$arr);
					}
					$this->db->where('tbl_hotel_room_settings.available_status',1);
					$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

					$query_available_rooms_check=$this->db->get(); 
					if(!empty($query_available_rooms_check))
					{
						$query_res_available_rooms_check=$query_available_rooms_check->result();
					}

					else
					{
						$query_res_available_rooms_check='';
					}

					$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);					
							
				}
				else
				{

					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
					$this->db->select('tbl_hotel_room_settings.available_status');
					$this->db->from('tbl_hotel_roomnumber');
					$this->db->from('tbl_hotel_room_settings');

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
					$this->db->where('tbl_hotel_room_settings.available_status',1);
					$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

					$query_avail_rooms=$this->db->get(); 
					if(!empty($query_booked_rooms))
					{
						$query_res_available_rooms_check=$query_avail_rooms->result();
					}
				

					$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);
										
				}
					$hotel_new_arr[]=$room_types;
		}	
	}
	

	if(!empty($hotel_new_arr))
	{
		for($j=0;$j<=count($hotel_new_arr)-1; $j++)
		{
			if($hotel_new_arr[$j]->available_rooms==0)
			{
				$res_tobe_removed[]=$hotel_new_arr[$j];
				$place_qry=$hotel_new_arr[$j]->place;	
				unset($hotel_new_arr[$j]);
			}
		}
		
		$hotel_new_arr=array_values($hotel_new_arr);
	}
	else
	{
		$hotel_new_arr=array();
	}

	if($place_qry=='')
	{
		if(!empty($hotel_new_arr[0]->place))
		$place_qry=$hotel_new_arr[0]->place;
		else
		$place_qry='Trivandrum';
	}
	

/////////////////////End of Room number avail check//////////////////////////////////////////////////////////////////////


/////////////////////If no results or Less number of results, Show more results/////////////////////////////////////////		
	if(count($query_res)<10)
	{			
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
		$this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');
		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');		
		if(!empty($place_qry) )
		{
			$this->db->like('tbl_hotel.place',$place_qry);
		}
		if(!empty($hotName_range))
		{
			$this->db->like('tbl_hotel.place',$hotName_range[0]);
		}
		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")"; 
			$this->db->where($pc_cond, NULL, FALSE);
		}

		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}		
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);//Pass the sub-category Dynamically////

		if(!empty($query_res))
		{
			for($i=0;$i<=count($query_res)-1;$i++)
			{
				$this->db->where('tbl_hotel.id !=',$query_res[$i]->id);
			}
		}
		$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

		$query_detail_data=$this->db->get(); 
		$query_detail_data_res=$query_detail_data->result();
	if(!empty($query_detail_data_res))
	{
		for($i=0; $i<=count($query_detail_data_res)-1;$i++)
		{

			$this->db->select('tbl_hotel.title');
			$this->db->select('tbl_hotel.id');
			$this->db->select('tbl_hotel.place');
			$this->db->select('tbl_hotel.free_parking');
			$this->db->select('tbl_hotel.free_wifi');
			$this->db->select('tbl_hotel.star_rating');
			$this->db->select('tbl_hotel.pool');
			$this->db->select('tbl_hotel.smoking_rooms');
			$this->db->select('tbl_hotel_room_settings.id as settings_id');
			$this->db->select('tbl_hotel_room_settings.allowed_persons');
			$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
			$this->db->select('tbl_hotel_room_settings.child_free_limit');
			$this->db->select('tbl_hotel_room_settings.room_child_rate');
			$this->db->select('tbl_hotel_room_settings.room_adult_rate');
			$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
		    $this->db->select('tbl_hotel_room_settings.tax_applicable');
			$this->db->select('tbl_hotel.state');
			$this->db->select('tbl_hotel_room_settings.price');
			$this->db->select('tbl_hotel_room.room_title');
			$this->db->select('tbl_hotel_room_settings.valid_from');
			$this->db->select('tbl_hotel_room_settings.valid_upto');
			$this->db->select('tbl_hotel_room.id as rooms_id');

			$this->db->from('tbl_hotel');
			$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
			$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
			
			
			if(!empty($place_qry) )
			{
				$this->db->like('tbl_hotel.place',$place_qry);
			}

			if(!empty($hotName_range))
			{
				$this->db->like('tbl_hotel.place',$hotName_range[0]);
			}
			$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
			$this->db->where('tbl_hotel_room_settings.available_status',1);

			$this->db->where('tbl_hotel.id',$query_detail_data_res[$i]->id);
			if(!empty($star))
			{
				$star_cond="";
				for($z=0;$z<=count($star)-1; $z++)
				{
					$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
				}
				
				$star_cond=rtrim($star_cond,' or');
				$star_cond="(".$star_cond.")";
				 $this->db->where($star_cond, NULL, FALSE);
			}

			if(!empty($price_range))
			{
				$pc_cond="";
				for($z=0;$z<=count($price_range)-1; $z++)
				{
					$pc_exp=explode("-", $price_range[$z]);
					$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
				}
				
				$pc_cond=rtrim($pc_cond,' or');
				$pc_cond="(".$pc_cond.")"; 
				$this->db->where($pc_cond, NULL, FALSE);
			}
			if(!empty($loc_range))
			{
				$loc_cond="";
				for($z=0;$z<=count($loc_range)-1; $z++)
				{
					$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
				}
				
				$loc_cond=rtrim($loc_cond,' or');
				$loc_cond="(".$loc_cond.")";
				$this->db->where($loc_cond, NULL, FALSE);
			}
			if(!empty($fac_range))
			{
				$fac_cond="";
				for($z=0;$z<=count($fac_range)-1; $z++)
				{
					$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
				}
				
				$fac_cond=rtrim($fac_cond,' and');
				$fac_cond="(".$fac_cond.")";
				$this->db->where($fac_cond, NULL, FALSE);
			}			
			$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

			$this->db->group_by('tbl_hotel_room.id');
			$this->db->order_by('tbl_hotel_room_settings.price');		
			$query_rooms=$this->db->get();
			$query_res_rooms=$query_rooms->result();
	
			foreach($query_res_rooms as $key=>$room_types)
			{
					$tot_rooms='';
					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->from('tbl_hotel_roomnumber');
					$this->db->join('tbl_booking_rooms','tbl_booking_rooms.room_number=tbl_hotel_roomnumber.id');
					if(!empty($post['check_out']) && !empty($post['check_out']))
					{
						$this->db->where('((tbl_booking_rooms.check_in BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_booking_rooms.check_out BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

					}
					$this->db->where('tbl_hotel_room_settings.available_status',1);
					$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
				
					$query_booked_rooms=$this->db->get(); 
					if(!empty($query_booked_rooms))
					{
						$query_res_booked_rooms=$query_booked_rooms->result();
					}
					
					else
					{
						$query_detail_data_res=array_values($query_detail_data_res);
						$query_res_booked_rooms='';
					}
					if(!empty($query_res_booked_rooms))
					{
						foreach($query_res_booked_rooms as $room_arrays)
						{
							$tot_rooms.=$room_arrays->room_number.",";
						}
						$tot_rooms=rtrim($tot_rooms,",");
						$arr=explode(',',$tot_rooms);
						$this->db->select('tbl_hotel_roomnumber.room_number');
						$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
						$this->db->from('tbl_hotel_roomnumber');

						if(!empty($query_res))
						{
							$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
							$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
						}
						if(!empty($arr))
						{
							$this->db->where_not_in('tbl_hotel_roomnumber.room_number',$arr);
						}
						$this->db->where('tbl_hotel_room_settings.available_status',1);
					$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

						$query_available_rooms_check=$this->db->get(); 
						if(!empty($query_available_rooms_check))
						{
							$query_res_available_rooms_check=$query_available_rooms_check->result();
						}

						else
						{
							$query_res_available_rooms_check='';
						}

						$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);					
								
					}
					else
					{

						$this->db->select('tbl_hotel_roomnumber.room_number');
						$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
						$this->db->from('tbl_hotel_roomnumber');

						if(!empty($query_res))
						{
							$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
							$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
						}
					$this->db->where('tbl_hotel_room_settings.available_status',1);
					$this->db->where('((tbl_hotel_room_settings.valid_from BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_hotel_room_settings.valid_upto BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

						$query_avail_rooms=$this->db->get(); 
						if(!empty($query_booked_rooms))
						{
							$query_res_available_rooms_check=$query_avail_rooms->result();
						}
					

						$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);
											
					}
						$hotel_new_arr_detail[]=$room_types;
			}	
		}
		

		for($j=0;$j<=count($hotel_new_arr_detail)-1; $j++)
		{
			if($hotel_new_arr_detail[$j]->available_rooms==0)
			{
				$res_tobe_removed[]=$hotel_new_arr_detail[$j];
				unset($hotel_new_arr_detail[$j]);
			}
		}
	
		$hotel_new_arr_detail=array_values($hotel_new_arr_detail);
		$hotel_new_arr=array_merge($hotel_new_arr, $hotel_new_arr_detail);	
	}
	else
	{
		$query_detail_data_res=array();
	}

}

	$query_res=array_merge($query_res, $query_detail_data_res);
///////////////////// End of If no results or Less number of results, Show more results/////////////////////////////////////////


//////////////////////////// Fetch all Hotels even without Room settings////////////////////////////////////////////////////////				
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel.state');
		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$this->db->where('tbl_hotel.id !=',$query_res[$i]->id);
		}
		if(!empty($post['text_val']) )
		{
			$this->db->where('(tbl_hotel.address like "%'.$place_qry.'%" OR tbl_hotel.title like "%'.$place_qry.'%" OR tbl_hotel.place like "%'.$place_qry.'%")');
		}

		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%" OR tbl_hotel.place like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."' or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}				
		$query_hotel_alone=$this->db->get(); 
		if(!empty($query_hotel_alone))
		{
			$query_res_hotel_alone=$query_hotel_alone->result();
		}
		else
		{
			$query_res_hotel_alone='';
		}

		return array($hotel_new_arr, $query_res, $query_res_hotel_alone);
//////////////////////////// End oF Fetch all Hotels even without Room settings/////////////////////////////////////////														
										
	} 
function hotelAgencyById()
{
	$this->db->select('room_tariff');
	$this->db->like('agency', "bookingwings");
	$this->db->where('status', 1);
	$query_percentage = $this->db->get('tbl_agency');
	return $query_percentage->result();
}

function hotelAgencyCommissionById($hotel)
{
	$date=date('Y-m-d');
	
	$this->db->select('commision');
	$this->db->where('hotel_id', $hotel);
	//$this->db->order_by("id", "desc");
	$this->db->like('date(date)',$date);
	$query_percentage = $this->db->get('tbl_commision');
	return $query_percentage->result();
}

function hotelofferById($rooms_id,$check_in,$check_out)
{
	$this->db->select('offer');
	$this->db->select('from_date');
	$this->db->select('to_date');
	$this->db->where('hotel_id', $rooms_id);
	$this->db->where('status', 1)->where('from_date',$check_in)->where('to_date',$check_out);
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


function all_hotels_search_based_session($post, $star='',$price_range='', $loc_range='' , $fac_range='', $hotName_range='')
	{
		
		$check_flag=0;
		$empty_flag=0;
		$condition_adults="";
		$place_qry='';
		$query_res=array();
		$total_headcount=(max($post['tot_adults'] + $post['tot_childrens']));
		$result=array();
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		
		
		if(!empty($post['text_val']))
		{
			$this->db->where('(tbl_hotel.address like "%'.$post['text_val'].'%" OR tbl_hotel.title like "%'.$post['text_val'].'%")');
		}
		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}

		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")"; 
			$this->db->where($pc_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}

		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}

		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->order_by('tbl_hotel_room_settings.price');		
		$query=$this->db->get(); 
		$query_res=$query->result();


	if(empty($query_res))
	{
		$empty_flag=1;
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		
		
		if(!empty($post['text_val']))
		{
			$this->db->where('(tbl_hotel.address like "%Trivandrum%" OR tbl_hotel.title like "%Trivandrum%")');
		}
		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}
		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")";
			$this->db->where($pc_cond, NULL, FALSE);
		}

		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}

		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->order_by('tbl_hotel_room_settings.price');		
		$query=$this->db->get(); 
		$query_res=$query->result();
	}

////////////////////Room number avail check/////////////////////////////////////////////////////////////////////////////	

	for($i=0; $i<=sizeof($query_res)-1;$i++)
	{

		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
	    $this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');

		$this->db->from('tbl_hotel');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
		
		
		if(!empty($post['text_val']) && $empty_flag==0 )
		{
			$this->db->where('(tbl_hotel.address like "%'.$post['text_val'].'%" OR tbl_hotel.title like "%'.$post['text_val'].'%")');
		}
		else
		{
			$this->db->where('(tbl_hotel.address like "%Trivandrum%" OR tbl_hotel.title like "%Trivandrum%")');
		}

		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")";
			$this->db->where($pc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		// if(!empty($post['tot_adults']) )
		// {
		// 	$this->db->where('tbl_hotel_room_settings.allowed_persons >=',$max_adult);
						
		// }
			$this->db->where('tbl_hotel.id',$query_res[$i]->id);
			$this->db->group_by('tbl_hotel_room.id');
			$this->db->order_by('tbl_hotel_room_settings.price');		
			$query_rooms=$this->db->get(); 
			$query_res_rooms=$query_rooms->result();

		foreach($query_res_rooms as $key=>$room_types)
		{
				$tot_rooms='';
				$this->db->select('tbl_hotel_roomnumber.room_number');
				$this->db->from('tbl_hotel_roomnumber');
				$this->db->join('tbl_booking_rooms','tbl_booking_rooms.room_number=tbl_hotel_roomnumber.id');
				if(!empty($post['check_out']) && !empty($post['check_out']))
				{
					$this->db->where('((tbl_booking_rooms.check_in BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_booking_rooms.check_out BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

				}

				if(!empty($query_res))
				{
					$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
					$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
				}
			
				$query_booked_rooms=$this->db->get(); 
				if(!empty($query_booked_rooms))
				{
					$query_res_booked_rooms=$query_booked_rooms->result();
				}
				
				else
				{
					$query_res=array_values($query_res);
					$query_res_booked_rooms='';
				}
				if(!empty($query_res_booked_rooms))
				{
					foreach($query_res_booked_rooms as $room_arrays)
					{
						$tot_rooms.=$room_arrays->room_number.",";
					}
					$tot_rooms=rtrim($tot_rooms,",");
					$arr=explode(',',$tot_rooms);
					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
					$this->db->from('tbl_hotel_roomnumber');

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
					if(!empty($arr))
					{
						$this->db->where_not_in('tbl_hotel_roomnumber.room_number',$arr);
					}
					
					$query_available_rooms_check=$this->db->get(); 
					if(!empty($query_available_rooms_check))
					{
						$query_res_available_rooms_check=$query_available_rooms_check->result();
					}

					else
					{
						$query_res_available_rooms_check='';
					}

					$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);					
							
				}
				else
				{

					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
					$this->db->from('tbl_hotel_roomnumber');

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
				
					$query_avail_rooms=$this->db->get(); 
					if(!empty($query_booked_rooms))
					{
						$query_res_available_rooms_check=$query_avail_rooms->result();
					}
				

					$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);
										
				}
					$hotel_new_arr[]=$room_types;
		}	
	}
	

	if(!empty($hotel_new_arr))
	{
		for($j=0;$j<=count($hotel_new_arr)-1; $j++)
		{
			if($hotel_new_arr[$j]->available_rooms==0)
			{
				$res_tobe_removed[]=$hotel_new_arr[$j];
				$place_qry=$hotel_new_arr[$j]->place;	
				unset($hotel_new_arr[$j]);
			}
		}
		
		$hotel_new_arr=array_values($hotel_new_arr);
	}
	else
	{
		$hotel_new_arr=array();
	}

	if($place_qry=='')
	{
		if(!empty($hotel_new_arr[0]->place))
		$place_qry=$hotel_new_arr[0]->place;
		else
		$place_qry='Trivandrum';
	}
	

/////////////////////End of Room number avail check//////////////////////////////////////////////////////////////////////


/////////////////////If no results or Less number of results, Show more results/////////////////////////////////////////		
	if(count($query_res)<10)
	{			
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel_room_settings.id as settings_id');
		$this->db->select('tbl_hotel_room_settings.allowed_persons');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
		$this->db->select('tbl_hotel_room_settings.child_free_limit');
		$this->db->select('tbl_hotel_room_settings.room_child_rate');
		$this->db->select('tbl_hotel_room_settings.room_adult_rate');
		$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
		$this->db->select('tbl_hotel_room_settings.tax_applicable');
		$this->db->select('tbl_hotel.state');
		$this->db->select('tbl_hotel_room_settings.price');
		$this->db->select('tbl_hotel_room.room_title');
		$this->db->select('tbl_hotel_room_settings.valid_from');
		$this->db->select('tbl_hotel_room_settings.valid_upto');
		$this->db->select('tbl_hotel_room.id as rooms_id');
		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
		$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');		
		if(!empty($place_qry) )
		{
			$this->db->like('tbl_hotel.place',$place_qry);
		}
		if(!empty($hotName_range))
		{
			$this->db->like('tbl_hotel.place',$hotName_range[0]);
		}
		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($price_range))
		{
			$pc_cond="";
			for($z=0;$z<=count($price_range)-1; $z++)
			{
				$pc_exp=explode("-", $price_range[$z]);
				$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
			}
			
			$pc_cond=rtrim($pc_cond,' or');
			$pc_cond="(".$pc_cond.")"; 
			$this->db->where($pc_cond, NULL, FALSE);
		}

		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}		
		$this->db->where('tbl_hotel_room_settings.available_status',1);
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);//Pass the sub-category Dynamically////

		if(!empty($query_res))
		{
			for($i=0;$i<=count($query_res)-1;$i++)
			{
				$this->db->where('tbl_hotel.id !=',$query_res[$i]->id);
			}
		}

		$query_detail_data=$this->db->get(); 
		$query_detail_data_res=$query_detail_data->result();
	if(!empty($query_detail_data_res))
	{
		for($i=0; $i<=count($query_detail_data_res)-1;$i++)
		{

			$this->db->select('tbl_hotel.title');
			$this->db->select('tbl_hotel.id');
			$this->db->select('tbl_hotel.place');
			$this->db->select('tbl_hotel.free_parking');
			$this->db->select('tbl_hotel.free_wifi');
			$this->db->select('tbl_hotel.star_rating');
			$this->db->select('tbl_hotel.pool');
			$this->db->select('tbl_hotel.smoking_rooms');
			$this->db->select('tbl_hotel_room_settings.id as settings_id');
			$this->db->select('tbl_hotel_room_settings.allowed_persons');
			$this->db->select('tbl_hotel_room_settings.normal_allowed_adults');
			$this->db->select('tbl_hotel_room_settings.child_free_limit');
			$this->db->select('tbl_hotel_room_settings.room_child_rate');
			$this->db->select('tbl_hotel_room_settings.room_adult_rate');
			$this->db->select('tbl_hotel_room_settings.normal_allowed_kids');
		    $this->db->select('tbl_hotel_room_settings.tax_applicable');
			$this->db->select('tbl_hotel.state');
			$this->db->select('tbl_hotel_room_settings.price');
			$this->db->select('tbl_hotel_room.room_title');
			$this->db->select('tbl_hotel_room_settings.valid_from');
			$this->db->select('tbl_hotel_room_settings.valid_upto');
			$this->db->select('tbl_hotel_room.id as rooms_id');

			$this->db->from('tbl_hotel');
			$this->db->join('tbl_hotel_room_settings','tbl_hotel_room_settings.hotel_id=tbl_hotel.id');
			$this->db->join('tbl_hotel_room','tbl_hotel_room.id = tbl_hotel_room_settings.room_id');
			
			
			if(!empty($place_qry) )
			{
				$this->db->like('tbl_hotel.place',$place_qry);
			}

			if(!empty($hotName_range))
			{
				$this->db->like('tbl_hotel.place',$hotName_range[0]);
			}
			$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
			$this->db->where('tbl_hotel_room_settings.available_status',1);

			$this->db->where('tbl_hotel.id',$query_detail_data_res[$i]->id);
			if(!empty($star))
			{
				$star_cond="";
				for($z=0;$z<=count($star)-1; $z++)
				{
					$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
				}
				
				$star_cond=rtrim($star_cond,' or');
				$star_cond="(".$star_cond.")";
				 $this->db->where($star_cond, NULL, FALSE);
			}

			if(!empty($price_range))
			{
				$pc_cond="";
				for($z=0;$z<=count($price_range)-1; $z++)
				{
					$pc_exp=explode("-", $price_range[$z]);
					$pc_cond.="tbl_hotel_room_settings.price between ".$pc_exp[0]." and ".$pc_exp[1]." or ";
				}
				
				$pc_cond=rtrim($pc_cond,' or');
				$pc_cond="(".$pc_cond.")"; 
				$this->db->where($pc_cond, NULL, FALSE);
			}
			if(!empty($loc_range))
			{
				$loc_cond="";
				for($z=0;$z<=count($loc_range)-1; $z++)
				{
					$loc_cond.="tbl_hotel.place='".$loc_range[$z]."'or ";
				}
				
				$loc_cond=rtrim($loc_cond,' or');
				$loc_cond="(".$loc_cond.")";
				$this->db->where($loc_cond, NULL, FALSE);
			}
			if(!empty($fac_range))
			{
				$fac_cond="";
				for($z=0;$z<=count($fac_range)-1; $z++)
				{
					$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
				}
				
				$fac_cond=rtrim($fac_cond,' and');
				$fac_cond="(".$fac_cond.")";
				$this->db->where($fac_cond, NULL, FALSE);
			}			
			$this->db->group_by('tbl_hotel_room.id');
			$this->db->order_by('tbl_hotel_room_settings.price');		
			$query_rooms=$this->db->get();
			$query_res_rooms=$query_rooms->result();
	
			foreach($query_res_rooms as $key=>$room_types)
			{
					$tot_rooms='';
					$this->db->select('tbl_hotel_roomnumber.room_number');
					$this->db->from('tbl_hotel_roomnumber');
					$this->db->join('tbl_booking_rooms','tbl_booking_rooms.room_number=tbl_hotel_roomnumber.id');
					if(!empty($post['check_out']) && !empty($post['check_out']))
					{
						$this->db->where('((tbl_booking_rooms.check_in BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'") OR (tbl_booking_rooms.check_out BETWEEN "'.$post['check_in'].'" AND "'.$post['check_out'].'"))');

					}

					if(!empty($query_res))
					{
						$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
						$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
					}
				
					$query_booked_rooms=$this->db->get(); 
					if(!empty($query_booked_rooms))
					{
						$query_res_booked_rooms=$query_booked_rooms->result();
					}
					
					else
					{
						$query_detail_data_res=array_values($query_detail_data_res);
						$query_res_booked_rooms='';
					}
					if(!empty($query_res_booked_rooms))
					{
						foreach($query_res_booked_rooms as $room_arrays)
						{
							$tot_rooms.=$room_arrays->room_number.",";
						}
						$tot_rooms=rtrim($tot_rooms,",");
						$arr=explode(',',$tot_rooms);
						$this->db->select('tbl_hotel_roomnumber.room_number');
						$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
						$this->db->from('tbl_hotel_roomnumber');

						if(!empty($query_res))
						{
							$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
							$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
						}
						if(!empty($arr))
						{
							$this->db->where_not_in('tbl_hotel_roomnumber.room_number',$arr);
						}
						
						$query_available_rooms_check=$this->db->get(); 
						if(!empty($query_available_rooms_check))
						{
							$query_res_available_rooms_check=$query_available_rooms_check->result();
						}

						else
						{
							$query_res_available_rooms_check='';
						}

						$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);					
								
					}
					else
					{

						$this->db->select('tbl_hotel_roomnumber.room_number');
						$this->db->select('tbl_hotel_roomnumber.id as roomnumber_id');
						$this->db->from('tbl_hotel_roomnumber');

						if(!empty($query_res))
						{
							$this->db->where('tbl_hotel_roomnumber.hotel_id',$query_detail_data_res[$i]->id);
							$this->db->where('tbl_hotel_roomnumber.room_id',$room_types->rooms_id);
						}
					
						$query_avail_rooms=$this->db->get(); 
						if(!empty($query_booked_rooms))
						{
							$query_res_available_rooms_check=$query_avail_rooms->result();
						}
					

						$query_res_rooms[$key]->available_rooms=count($query_res_available_rooms_check);
											
					}
						$hotel_new_arr_detail[]=$room_types;
			}	
		}
		

		for($j=0;$j<=count($hotel_new_arr_detail)-1; $j++)
		{
			if($hotel_new_arr_detail[$j]->available_rooms==0)
			{
				$res_tobe_removed[]=$hotel_new_arr_detail[$j];
				unset($hotel_new_arr_detail[$j]);
			}
		}
	
		$hotel_new_arr_detail=array_values($hotel_new_arr_detail);
		$hotel_new_arr=array_merge($hotel_new_arr, $hotel_new_arr_detail);	
	}
	else
	{
		$query_detail_data_res=array();
	}

}

	$query_res=array_merge($query_res, $query_detail_data_res);
///////////////////// End of If no results or Less number of results, Show more results/////////////////////////////////////////


//////////////////////////// Fetch all Hotels even without Room settings////////////////////////////////////////////////////////				
		$this->db->select('tbl_hotel.title');
		$this->db->select('tbl_hotel.id');
		$this->db->select('tbl_hotel.star_rating');
		$this->db->select('tbl_hotel.place');
		$this->db->select('tbl_hotel.free_parking');
		$this->db->select('tbl_hotel.free_wifi');
		$this->db->select('tbl_hotel.pool');
		$this->db->select('tbl_hotel.smoking_rooms');
		$this->db->select('tbl_hotel.state');
		$this->db->from('tbl_hotel');
		$this->db->group_by('tbl_hotel.title');
		$this->db->where('tbl_hotel.sub_category_id',$post['sub_cat_id']);
		for($i=0;$i<=count($query_res)-1;$i++)
		{
			$this->db->where('tbl_hotel.id !=',$query_res[$i]->id);
		}
		if(!empty($post['text_val']) )
		{
			$this->db->where('(tbl_hotel.address like "%'.$place_qry.'%" OR tbl_hotel.title like "%'.$place_qry.'%" OR tbl_hotel.place like "%'.$place_qry.'%")');
		}

		if(!empty($hotName_range))
		{
			$this->db->where('(tbl_hotel.address like "%'.$hotName_range[0].'%" OR tbl_hotel.title like "%'.$hotName_range[0].'%" OR tbl_hotel.place like "%'.$hotName_range[0].'%")');
		}

		if(!empty($star))
		{
			$star_cond="";
			for($z=0;$z<=count($star)-1; $z++)
			{
				$star_cond.="tbl_hotel.star_rating=".$star[$z]." or ";
			}
			
			$star_cond=rtrim($star_cond,' or');
			$star_cond="(".$star_cond.")";
			 $this->db->where($star_cond, NULL, FALSE);
		}
		if(!empty($loc_range))
		{
			$loc_cond="";
			for($z=0;$z<=count($loc_range)-1; $z++)
			{
				$loc_cond.="tbl_hotel.place='".$loc_range[$z]."' or ";
			}
			
			$loc_cond=rtrim($loc_cond,' or');
			$loc_cond="(".$loc_cond.")";
			$this->db->where($loc_cond, NULL, FALSE);
		}
		if(!empty($fac_range))
		{
			$fac_cond="";
			for($z=0;$z<=count($fac_range)-1; $z++)
			{
				$fac_cond.="tbl_hotel.".$fac_range[$z]."='1' and ";
			}
			
			$fac_cond=rtrim($fac_cond,' and');
			$fac_cond="(".$fac_cond.")";
			$this->db->where($fac_cond, NULL, FALSE);
		}				
		$query_hotel_alone=$this->db->get(); 
		if(!empty($query_hotel_alone))
		{
			$query_res_hotel_alone=$query_hotel_alone->result();
		}
		else
		{
			$query_res_hotel_alone='';
		}

		return array($hotel_new_arr, $query_res, $query_res_hotel_alone);
//////////////////////////// End oF Fetch all Hotels even without Room settings/////////////////////////////////////////				
	} 

	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
}

?>