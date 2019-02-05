<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Travelsmodel');
		$this -> load -> model('Settingsmodel');
	}

	function index()
	{
		$this -> load -> view('layout/header');
		$this -> load -> view('travels/index');
		$this -> load -> view('layout/footer');
	}
	
	function travelslist()
	{
		$config['base_url'] = site_url('travels/index');
		$config['total_rows'] = $this -> db -> count_all('tbl_travels');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Travelsmodel -> alldetails($config["per_page"], $data['page']);
		
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
		
		$this -> load -> view('layout/header');
		if($this->session->userdata['user_type']=='staff') {
		
		if(!empty($data_menu['menu']) && (in_array('14', json_decode($data_menu['menu']))==1)) {
		$this -> load -> view('travels/travels_list', $data);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this -> load -> view('travels/travels_list', $data);
		}
		$this -> load -> view('layout/footer');
	}
	
	
	function add()
	{
		$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
				if(isset($_POST['submit']))
				{
				$this->form_validation->set_rules('name', 'name', 'required');
				$this->form_validation->set_rules('address', 'address', 'required');
				$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_exists_username');
				$this->form_validation->set_rules('contact', 'contact', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					
					$this -> load -> view('layout/header');
					$this -> load -> view('travels/add',$data);
					$this -> load -> view('layout/footer');
				}
				else 
				{		
						
			        $data1['name'] = $this->input->post('name');
					$data1['address'] = $this->input->post('address');
					$data1['email'] = $this->input->post('email');
					$data1['contact'] = $this->input->post('contact');
					$data1['fax'] = $this->input->post('fax');
					$data1['password'] = md5($this->input->post('password'));
					$data1['status'] = 1;
					
					$this->load->library('email');
			$mydata = array('username' => $this->input->post('email'),'password' => $this->input->post('password'));
			$message = $this->load->view('layout/travel_agent_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('info@crantia.com', 'Bookingwings');
			$this->email->to($this->input->post('email')); 

			$this->email->subject('Registration Successful');
			$this->email->message($message);    

			$this->email->send(); 
					
					$insert_query = $this->Travelsmodel->insert($data1);
					
					if($insert_query==1)
					{
						$this->session->set_flashdata('success','New Travels created successfully');
					}
					else
					{
						$this->session->set_flashdata('error','Some Problem affected, Please try agein');
					}
					redirect('travels/add');
				
				}
				}
				else
				{
					$data['validation']='';
					
					$this -> load -> view('layout/header');
					if($this->session->userdata['user_type']=='staff') {
					if(!empty($data_menu['menu']) && (in_array('15', json_decode($data_menu['menu']))==1)) {
					$this -> load -> view('travels/add',$data);
					} else {
					$this->load->view('settings/no_permission');
					}
					} else {
					$this -> load -> view('travels/add',$data);
					}
					$this -> load -> view('layout/footer');
				}
				
	}
	
	function exists_username($email) 
	{
	   $result=$this->Travelsmodel->username_exists($email);
	   if($result>0)
	   {
	  	  $this->form_validation->set_message('exists_username', 'Email already exists!');
	      return FALSE;
	   }
	}

	function check_username($email)
	{
		$result = $this -> Travelsmodel -> username_exists($email);
		if ($result > 0)
		{
			echo "Email already exists!";
		}
	}

	function edit($id)
	{
			$data['result'] = $this->Travelsmodel->edit($id);
			
		$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
			
			$this -> load -> view('layout/header');
			
if($this->session->userdata['user_type']=='staff') {

if(!empty($data_menu['menu']) && (in_array('16', json_decode($data_menu['menu']))==1)) {
			$this -> load -> view('travels/edit',$data);
			} else {
			$this->load->view('settings/no_permission');
			}
			} else {
			$this -> load -> view('travels/edit',$data);
			}
			$this -> load -> view('layout/footer');
	}
	
	function update()
	{
				$id = $this->input->post('id');
		
				$this->form_validation->set_rules('name', 'name', 'required');
				$this->form_validation->set_rules('address', 'address', 'required');
				$this->form_validation->set_rules('contact', 'contact', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					$this->session->set_flashdata('error',$data);
					redirect('travels/edit/'.$id);
				}
				else 
				{
					$data1['name'] = $this->input->post('name');
					$data1['address'] = $this->input->post('address');
					$data1['contact'] = $this->input->post('contact');
					$data1['fax'] = $this->input->post('fax');
					
					$result = $this->Travelsmodel->update($id,$data1);
					if($result>0)
					{
						$this->session->set_flashdata('success','Travels detail updated successfully');
						redirect('travels/edit/'.$id);
					}
					else
					{
						redirect('travels/edit/'.$id);
					}
					
				}	
		
	}
	
	
	function delete($id)
	{
		$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
if($this->session->userdata['user_type']=='staff') {
if(!empty($data_menu['menu']) && (in_array('17', json_decode($data_menu['menu']))==1)) {
		$this->Travelsmodel->delete($id);
		}
		} else {
		$this->Travelsmodel->delete($id);
		}
		redirect('travels/travelslist');
		
	}
	
	

}
?>