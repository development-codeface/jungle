<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function packages_list()
	{
		$query=$this->db->get('tbl_package');
		return $query->result();
	}
	
	function packageById($id)
	{
		$query=$this->db->where('id',$id)->get('tbl_package');
		return $query->row();
	}
	
	function imageById($id)
	{
		$query=$this->db->where('package_id', $id)->get('tbl_package_image');
		return $query->result();
	}
	
	function itineraryById($id)
	{
		$query=$this->db->where('package_id', $id)->order_by('day')->get('tbl_package_itinerary');
		return $query->result();
	}
	
	function priceById($id)
	{
		$date = date('Y-m-d');
		$this->db->where('package_id', $id);
		$this->db->where('(("'.$date.'"  BETWEEN off_seasonal_valid_from AND off_seasonal_valid_to) or ("'.$date.'"  BETWEEN seasonal_valid_from AND seasonal_valid_to))');	
		$query = $this->db->get('tbl_package_hotel');
		
		//echo $this->db->last_query(); exit;
		return $query->row();
	}
	
	function search_keyword($keyword)
	{
		$this->db->distinct();
		$this->db->select('a.title');
		$this->db->from('tbl_package as a');
		$this->db->like('a.title',$keyword , 'after');
		$query = $this->db->get();
		$count1 = count($query->result());
		if($count1<>'')
		{
			$res=$query->result();
			$result = array();
			foreach($res as $results)
			{
				$this->db->select('a.title');
				$this->db->from('tbl_package as a');
				$this->db->where('a.title',$results->title);
				$query2 = $this->db->get();
				$res2= $query2->result();
				
				$search_key[] = $results->title;
				}
			
			
			
			return json_encode($search_key);
		}
	}
	
	function vehicleById($id)
	{
		$query=$this->db->where('package_id', $id)->get('tbl_package_vehicle');
		return $query->result();
	}
	
	
	function search($query)
	{
		 $date=date('Y-m-d');
// 		
		// $this->db->select('a.title,a.id,a.nights,a.days');
		// $this->db->from('tbl_package a');	  
		// $this->db->join('tbl_package_hotel b','a.id=b.package_id');	
// 		
		// $this->db->where('(("'.$date.'"  BETWEEN off_seasonal_valid_from AND off_seasonal_valid_to ) 
		// or ("'.$date.'"  BETWEEN seasonal_valid_from AND seasonal_valid_to))');
		// $this->db->where('(a.title like "%'.$query['text_val'].'%")');
		// $this->db->group_by('a.title');
		// $output = $this->db->get();
		// //echo sizeof($output->result());
		// return $output->result();
		
		$query = $this->db->query("(SELECT a.title, a.id, a.nights, a.days FROM tbl_package a
		JOIN tbl_package_hotel b ON a.id=b.package_id
		WHERE (('$date' BETWEEN b.off_seasonal_valid_from AND b.off_seasonal_valid_to ) or ('$date' BETWEEN b.seasonal_valid_from AND b.seasonal_valid_to))
		AND a.days = $query[days] AND a.nights = $query[nights]
		AND a.title like '%$query[text_val]%' GROUP BY a.title) union
		(SELECT a.title, a.id, a.nights, a.days FROM tbl_package a
		JOIN tbl_package_hotel b ON a.id=b.package_id
		WHERE (('$date' BETWEEN b.off_seasonal_valid_from AND b.off_seasonal_valid_to ) or ('$date' BETWEEN b.seasonal_valid_from AND b.seasonal_valid_to))
		AND a.days = $query[days] AND a.nights = $query[nights]
		AND a.title not like '%$query[text_val]%' GROUP BY a.title) union
		(SELECT a.title, a.id, a.nights, a.days FROM tbl_package a
		JOIN tbl_package_hotel b ON a.id=b.package_id
		WHERE (('$date' BETWEEN b.off_seasonal_valid_from AND b.off_seasonal_valid_to ) or ('$date' BETWEEN b.seasonal_valid_from AND b.seasonal_valid_to))
		AND (a.days != $query[days] or a.nights != $query[nights])
		AND a.title like '%$query[text_val]%' GROUP BY a.title) union
		(SELECT a.title, a.id, a.nights, a.days FROM tbl_package a
		JOIN tbl_package_hotel b ON a.id=b.package_id
		WHERE (('$date' BETWEEN b.off_seasonal_valid_from AND b.off_seasonal_valid_to ) or ('$date' BETWEEN b.seasonal_valid_from AND b.seasonal_valid_to))
		AND (a.days != $query[days] or a.nights != $query[nights])
		AND a.title not like '%$query[text_val]%' GROUP BY a.title)");
		
		//echo $this -> db -> last_query();
		return $query -> result();
		//return $this -> db -> last_query();
	
	}
	
	function get_price($id)
	{
		$date=date('Y-m-d');
		
		$this->db->select('b.seasonal_valid_from,b.seasonal_valid_to,b.seasonal_two_star,b.seasonal_three_star,b.seasonal_four_star,b.seasonal_five_star');
		$this->db->from('tbl_package a');	  
		$this->db->join('tbl_package_hotel b','a.id=b.package_id');	
		$this->db->where('("'.$date.'"  BETWEEN seasonal_valid_from AND seasonal_valid_to)');
		$this->db->where('b.package_id',$id);
		$this->db->group_by('a.title');
		$output = $this->db->get();
		
		return $output->result();
	}
	
	function get_price_off($id)
	{
		$date=date('Y-m-d');
		
		$this->db->select('b.off_seasonal_valid_from,b.off_seasonal_valid_to,b.off_seasonal_two_star,b.off_seasonal_three_star,b.off_seasonal_four_star,b.off_seasonal_five_star');
		$this->db->from('tbl_package_hotel b');	  
		$this->db->join('tbl_package a','b.package_id=a.id');	
		$this->db->where('("'.$date.'"  BETWEEN off_seasonal_valid_from AND off_seasonal_valid_to)');
		$this->db->where('b.package_id',$id);
		//$this->db->group_by('a.title');
		$output = $this->db->get();
				
		return $output->result();
	}
	
	function search_refine($query)
	{ 
		$date=date('Y-m-d');
		
		
		$this->db->select('a.title, a.id, a.nights, a.days');
		$this->db->from('tbl_package a');
		$this->db->join('tbl_package_hotel b','a.id=b.package_id');
		$this->db->join('tbl_package_itinerary c','a.id=c.package_id');
		
	
		if(!empty($query['nights']))
		{
			$night_cond="";
			for($z=0;$z<=count($query['nights'])-1; $z++)
			{
				 $night_cond.="a.nights=".$query['nights'][$z]." or ";
			}
			
			$night_cond=rtrim($night_cond,' or');
			$night_cond="(".$night_cond.")";
			 $this->db->where($night_cond, NULL, FALSE);
		}
		
		if(!empty($query['dest']))
		{
			$dest_cond="";
			for($z=0;$z<=count($query['dest'])-1; $z++)
			{
				 $dest_cond.="c.title like '%".$query['dest'][$z]."%' or ";
			}
			
			$dest_cond=rtrim($dest_cond,' or');
			$dest_cond="(".$dest_cond.")";
			 $this->db->where($dest_cond, NULL, FALSE);
		}
	
		$this->db->like('a.title', str_replace("'", "",$query['text_val']));
		$this->db->group_by('a.title');
		$query = $this->db->get();
		//echo $this -> db -> last_query();
		return $query -> result();
	}
}
?>