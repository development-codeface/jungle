<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Contactmodel');
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
	}

	function index()
	 {
	 	$this -> load -> view('layout/header');
		$this -> load -> view('user/index');
		$this -> load -> view('layout/footer');
		
	 }
	 
	 
	 function contactlist()
	 {
	 	$config['base_url'] = site_url('contact/contactlist');
		$config['total_rows'] = $this -> db -> count_all('tbl_contact');
		$config['per_page'] = "20";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Contactmodel -> alldetails($config["per_page"], $data['page']);
		
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_contact', $data);
		$this -> load -> view('layout/footer');
	 }

	function delete($id)
	{
		$this->Contactmodel->delete($id);
		redirect('contact/contactlist');
	}
	
	function newsletter()
	{
	 	$config['base_url'] = site_url('contact/newsletter');
		$config['total_rows'] = $this -> db -> count_all('tbl_news_letter');
		$config['per_page'] = "20";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results'] = $this -> db -> get('tbl_news_letter', $config['per_page'], $data['page']) -> result();
	 	$this -> load -> view('layout/header');
		$this -> load -> view('user/subscribers', $data);
		$this -> load -> view('layout/footer');
	}	
	

}
?>