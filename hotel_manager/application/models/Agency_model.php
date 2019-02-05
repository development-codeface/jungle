<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	function get_count($id)
	{
		$query = $this -> db -> where('hotel_id', $id) -> get('tbl_agency');
		return count($query -> result());
	}
	
	function agency_list($id,$limit, $start)
	{
		$query = $this -> db -> where('hotel_id', $id) -> not_like('agency','bookingwings') -> get('tbl_agency',$limit, $start);
		return $query -> result();
	}
	
	function agency($id)
	{
		$query = $this -> db -> where('id', $id) -> get('tbl_agency');
		return $query -> row();
	}
	
	function agency_bw($id)
	{
		return $this -> db
		-> where('hotel_id', $id)
		-> like('agency','bookingwings')
		-> get('tbl_agency')
		-> row();
		//return $this -> db -> last_query();
	}
}