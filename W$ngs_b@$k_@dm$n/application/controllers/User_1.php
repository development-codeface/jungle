<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Usermodel');
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
		
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_users', $data);
		$this -> load -> view('layout/footer');
	}

	function block($id) {
		$data['results'] = $this -> Usermodel -> block($id);
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_users', $data);
		$this -> load -> view('layout/footer');
		redirect('user/');
	}

	function unblock($id) {
		$data['results'] = $this -> Usermodel -> unblock($id);
		$this -> load -> view('layout/header');
		$this -> load -> view('user/all_users', $data);
		$this -> load -> view('layout/footer');
		redirect('user/');
	}
	
	
	

}
?>