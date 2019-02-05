<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper(array('form', 'url'));
	$this->load->library('session');
		
	 }
	 
	public function index()
	{
		
		$this->load->view('faq/faq');
	}
	
	
	
	
}
