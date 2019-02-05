<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
     	$this->load->helper(array('form', 'url'));
	$this->load->database();
	$this->load->library('session');
	 }
	 
	public function index()
	{
		
		$this->load->view('about/terms_conditions');
	}
	
	public function privacy()
	{
		
		$this->load->view('about/privacy_policy');
	}
	
	
	
}
