<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackageModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    function alldetails($limit, $start)
    {
    	$this->db->select('*');
		$this->db->order_by('id','desc');
        $query_res=$this->db->get('tbl_package', $limit, $start);
        $result =$query_res->result();
        return $result;
    }
	
	function insert($data)
	{
		// $query = $this->db->insert('tbl_package',$data);
		// return $this->db->affected_rows();
		if($this->db->insert('tbl_package',$data))
         {
            return $this->db->insert_id();
         } 
         else
         {
            return 0;
         }
		
	}
	
	function hotel_insert($data)
	{
		 if($this->db->insert('tbl_package_hotel', $data))
         {
            return $this->db->insert_id();
         } 
         else
         {
            return 0;
         }
        
	}
	
	function image_insert($data)
	{
		 if($this->db->insert('tbl_package_image', $data))
         {
            return $this->db->insert_id();
         } 
         else
         {
            return 0;
         }
        
	}
	
	function days_insert($data)
	{
		if($this->db->insert('tbl_package_itinerary', $data))
         {
            return $this->db->insert_id();
         } 
         else
         {
            return 0;
         }
	}
	
	function vehicle_insert($data)
	{
		if($this->db->insert('tbl_package_vehicle', $data))
         {
            return $this->db->insert_id();
         } 
         else
         {
            return 0;
         }
	}
	
	function edit($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_package');
		$data['package_data']=$query->result();
		
		
		$this->db->where('package_id',$id);
		$query_image = $this->db->get('tbl_package_image');
		$data['image']=$query_image->result();
		
		$this->db->where('package_id',$id);
		$query_image = $this->db->get('tbl_package_hotel');
		$data['hotel']=$query_image->result();
		
		$this->db->where('package_id',$id);
		$query_image = $this->db->get('tbl_package_itinerary');
		$data['itinerary']=$query_image->result();
		
		$this->db->where('package_id',$id);
		$query_image = $this->db->get('tbl_package_vehicle');
		$data['vehicle']=$query_image->result();
		
		return $data;
		
	}
	
	function package_update($id,$data)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_package',$data);
		return $this->db->affected_rows();
				
	}
	
	function hotel_update($id,$data)
	{
		$this->db->where('package_id',$id);
		$query = $this->db->update('tbl_package_hotel',$data);
		return $this->db->affected_rows();
	}
	
	function days_update($id,$data)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_package_itinerary',$data);
		return $this->db->affected_rows();
	}
	
	function vehicle_update($id,$data)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_package_vehicle',$data);
		return $this->db->affected_rows();
	}
    
	function select_images($package_id,$image_id)
	{
		$this->db->select('*');
		$this->db->where('package_id',$package_id);
		//$this->db->where('id',$image_id);
		$query = $this->db->get('tbl_package_image');
		return $query->result();
		
	}
	
	function image($package_id,$image_id)
	{
		$this->db->select('*');
		$this->db->where('package_id',$package_id);
		$this->db->where('id',$image_id);
		$query = $this->db->get('tbl_package_image');
		return $query->result();
	}
	
	function image_update($image_id,$data)
	{
		$this->db->where('id',$image_id);
		$query = $this->db->update('tbl_package_image',$data);
		return $this->db->affected_rows();
	}
	
	function image_delete($image_id)
	{
		$this->db->where('id',$image_id);
		$query = $this->db->delete('tbl_package_image');
	}
	
	function delete($id)
	{
		$this->db->delete('tbl_package', array('id' => $id)); 
	 	$this->db->delete('tbl_package_hotel', array('package_id' => $id));
		$this->db->delete('tbl_package_itinerary', array('package_id' => $id));
		$this->db->delete('tbl_package_image', array('package_id' => $id));
	 	$this->db->delete('tbl_package_vehicle', array('package_id' => $id)); 
	}
	
	function booking($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_package_booking a');
		$this->db->join('tbl_package b','b.id=a.package_id');
		$this->db->order_by('a.id ','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	
	function booking_detail($id)
	{
		$this->db->select('a.*,b.title,b.days,b.nights,b.description,c.first_name,c.last_name');
		$this->db->from('tbl_package_booking a');
		$this->db->join('tbl_package b','b.id=a.package_id');
		$this->db->join('tbl_user c','c.id=a.user_id');
		$this->db->where('a.id ',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
}

?>