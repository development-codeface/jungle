<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
 {
		
	 function __construct()
	 {
	 	parent::__construct();
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
		
	 }
	public function index()
	{
		$this->load->view('dashboard/index');
		$this->load->view('layout/footer');
	}
	
}
