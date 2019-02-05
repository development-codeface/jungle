<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	function plan($id) {
		$query = $this -> db -> where('hotel_id', $id) -> get('tbl_foodplan');
		return $query -> row();
	}
}