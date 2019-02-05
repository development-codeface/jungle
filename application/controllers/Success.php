<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
	 	
		$this->load->library('encrypt');
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Hotels_model');
		$this->load->model('Hotel_detail_model');
		$this->load->model('Room_detail_model');
		$this->load->model('Checkout_model');
		
		
	 }
	 
	 
	function index()
	{
		
		
			 $this->load->view('checkout/success');
    }
    
    function holiday()
	{
		 $this->load->view('package/success');
	}
	
	function reservation_success()
	{
		 $this->load->view('reservation/success');
	}
	

	
	
}
