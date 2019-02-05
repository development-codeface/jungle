<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Usermodel');
		$this -> load -> model('Settingsmodel');
	}


	function index()
	 {
	 	$this -> load -> view('layout/header');
		$this -> load -> view('user/index');
		$this -> load -> view('layout/footer');
		
	 }
	  

	function userlist() {
		$config['base_url'] = site_url('user/userlist');
		$config['total_rows'] = $this -> db -> count_all('tbl_user');
		$config['per_page'] = "20";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Usermodel -> alldetails($config["per_page"], $data['page']);
		
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
		$this -> load -> view('layout/header');
		
if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('18', json_decode($data_menu['menu']))==1)) {
		$this -> load -> view('user/all_users', $data);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this -> load -> view('user/all_users', $data);
		}
		$this -> load -> view('layout/footer');
	}

	function block($id) {
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('18', json_decode($data_menu['menu']))==1)) {
		$data['results'] = $this -> Usermodel -> block($id);
		}
		} else {
		$data['results'] = $this -> Usermodel -> block($id);
		}
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_users', $data);
		$this -> load -> view('layout/footer');
		redirect('user/');
	}

	function unblock($id) {
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('18', json_decode($data_menu['menu']))==1)) {
		$data['results'] = $this -> Usermodel -> unblock($id);
		}
		} else {
		$data['results'] = $this -> Usermodel -> unblock($id);
		}
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_users', $data);
		$this -> load -> view('layout/footer');
		redirect('user/');
	}}
	
	
	

}
?>