<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Settingsmodel');
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
		
			$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
		$this -> load -> view('layout/header');
		
		if($this->session->userdata['user_type']=='staff') {
		if(!empty($data_menu['menu']) && (in_array('19', json_decode($data_menu['menu']))==1)) {
		$this -> load -> view('user/all_contact', $data);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this -> load -> view('user/all_contact', $data);
		}
		$this -> load -> view('layout/footer');
	 }

	function delete($id)
	{
			$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('19', json_decode($data_menu['menu']))==1)) {
		$this->Contactmodel->delete($id);
		}
		} else {
		$this->Contactmodel->delete($id);
		}
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
			$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
	 	$this -> load -> view('layout/header');
		if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('19', json_decode($data_menu['menu']))==1)) {
		$this -> load -> view('user/subscribers', $data);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this -> load -> view('user/subscribers', $data);
		}
		$this -> load -> view('layout/footer');
	}	
	

}
?>