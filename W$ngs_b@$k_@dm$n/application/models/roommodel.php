<?php

class RoomModel extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    // function alldetails()
    // {
    	// $this->db->select('tbl_hotel_room.*,tbl_hotel.title,tbl_hotel.id as hotel_id');
        // $this->db->from( 'tbl_hotel_room');
        // $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room.hotel_id');
        // $query_res = $this->db->get();
        // $result =$query_res->result(); 
        // return $result;
    // }
    
    function row_count($name)
   {
   		$this->db->select('tbl_hotel_room.*,tbl_hotel.title,tbl_hotel.id as hotel_id');
        $this->db->from( 'tbl_hotel_room');
        $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room.hotel_id');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
        $query_res = $this->db->get();
        $result =$query_res->result(); 
        return count($result);
   }
	
	 function alldetails($name,$limit,$start)
    {
    	$this->db->select('tbl_hotel_room.*,tbl_hotel.title,tbl_hotel.id as hotel_id');
        $this->db->from( 'tbl_hotel_room');
        $this->db->join('tbl_hotel', 'tbl_hotel.id = tbl_hotel_room.hotel_id');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
		$this->db->limit($limit,$start);
        $query_res = $this->db->get();
		
        $result =$query_res->result(); 
        return $result;
    }

    function roomById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query_room = $this->db->get('tbl_hotel_room');
        return $query_room->row();
    }

    function allhotels($name)
    {
    	$this->db->select('tbl_hotel.*');
        $this->db->from( 'tbl_hotel');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.id = tbl_hotel.sub_category_id');
		$this->db->like('tbl_sub_category.name',$name);
        $query_htl = $this->db->get();
		
	
        // $this->db->distinct();
        // $this->db->select('id');
        // $this->db->select('title');
        // $query_htl = $this->db->get('tbl_hotel');
        return $query_htl->result();
    }

    function roomimagesById($id)
    {
        $this->db->select('*');
        $this->db->where('room_id', $id);
        $query_room_images = $this->db->get('tbl_hotel_room_image');
        return $query_room_images->result();
    }
    
    function roomfacilitiesById($id)
    {
        $this->db->select('*');
        $this->db->where('room_id', $id);
        $query_room_facilities = $this->db->get('tbl_hotel_room_facilities');
        return $query_room_facilities->row();
    }

    function upd_room($data_room)
    {
        $update_data = array(
                'room_title'        => $data_room['room_title'],
                'room_des'          => $data_room['room_des'],
                'room_size'         => $data_room['room_size'],
                'room_beds'         => $data_room['room_beds'],
                'room_bed_size'     => $data_room['room_bed_size'],
                'room_tax'          => $data_room['room_tax'],
                'room_tax_des'      => $data_room['room_tax_des'],
                'room_status'       => $data_room['room_status']
            );

        $this->db->where('id', $data_room['id']);
        $this->db->update('tbl_hotel_room', $update_data); 
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 1;
        }
    }

    function upd_room_images($data_images)
    {
        $update_data = array(
                'image_url'         => $data_images['image_url'],
                'thumb'             => $data_images['thumb'],
                'status'            => 1
            );

        $this->db->where('id', $data_images['room_id']);
        $this->db->update('tbl_hotel_room_image', $update_data); 
		return $this->db->last_query();
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 1;
        }
    }


    function upd_room_facilities($data_room_facilities)
    {
        $update_data = array(
                'city_view'             => $data_room_facilities['city_view'],
                'telephone'             => $data_room_facilities['telephone'],
                'satellite_channels'    => $data_room_facilities['satellite_channels'],
                'flat_screen_tv'        => $data_room_facilities['flat_screen_tv'],
                'safety_deposit_box'    => $data_room_facilities['safety_deposit_box'],
                'air_conditioning'      => $data_room_facilities['air_conditioning'],
                'iron'                  => $data_room_facilities['iron'],
                'desk'                  => $data_room_facilities['desk'],
                'iron_facilities'       => $data_room_facilities['iron_facilities'],
                'heating'               => $data_room_facilities['heating'],
                'carpeted'              => $data_room_facilities['carpeted'],
                'interconnected_rooms'  => $data_room_facilities['interconnected_rooms'],
                'private_entrance'      => $data_room_facilities['private_entrance'],
                'sofa'                  => $data_room_facilities['sofa'],
                'soundproofing'         => $data_room_facilities['soundproofing'],
                'wardrobe_closet'       => $data_room_facilities['wardrobe_closet'],
                'hypoallergenic'        => $data_room_facilities['hypoallergenic'],
                'shower'                => $data_room_facilities['shower'],
                'hairdryer'             => $data_room_facilities['hairdryer'],
                'free_toiletries'       => $data_room_facilities['free_toiletries'],
                'toilet'                => $data_room_facilities['toilet'],
                'bathroom'              => $data_room_facilities['bathroom'],
                'minibar'               => $data_room_facilities['minibar'],
                'electric_kettle'       => $data_room_facilities['electric_kettle'],
                'wakeup_service'        => $data_room_facilities['wakeup_service'],
                'towels'                => $data_room_facilities['towels'],
                'free_wifi'             => $data_room_facilities['free_wifi']

            );
        $this->db->where('room_id', $data_room_facilities['room_id']);
        $this->db->update('tbl_hotel_room_facilities', $update_data); 
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 1;
        }
    }



	function image($room_id,$image_id)
	{
		$query = $this->db->where('room_id',$room_id)->where('id',$image_id)->get('tbl_hotel_room_image');
		return $query->result();
	}

	function image_delete($image_id)
	{
		$query = $this->db->where('id',$image_id)->delete('tbl_hotel_room_image');
	}

	function select_images($room_id,$image_id)
	{
		$query = $this->db->where('room_id',$room_id)->get('tbl_hotel_room_image');
		return $query->result();
	}

	function image_update($image_id,$data)
	{
		$query = $this->db->where('id',$image_id)->update('tbl_hotel_room_image',$data);
		return $this->db->affected_rows();
	}
	
	function delete($id)
	{
		$this->db->delete('tbl_hotel_room', array('id' => $id));
		$this->db->delete('tbl_hotel_room_facilities', array('room_id' => $id)); 
		$this->db->delete('tbl_hotel_room_image', array('room_id' => $id));
		$this->db->delete('tbl_hotel_room_settings', array('room_id' => $id)); 
	}


}

?>