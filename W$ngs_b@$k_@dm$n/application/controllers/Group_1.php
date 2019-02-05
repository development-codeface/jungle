<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Travelsmodel');
		$this -> load -> model('Groupmodel');
		
	}

	function index()
	{
		$this -> load -> view('layout/header');
		$this -> load -> view('travels/index');
		$this -> load -> view('layout/footer');
	}
	
	function list_group()
	{
		$config['base_url'] = site_url('group/list_group');
		$config['total_rows'] = $this -> db -> count_all('tbl_hotel_groups');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Groupmodel -> alldetails($config["per_page"], $data['page']);
		
		$this -> load -> view('layout/header');
		$this -> load -> view('group/group_list', $data);
		$this -> load -> view('layout/footer');
	}
	
	
	function add()
	{
				if(isset($_POST['submit']))
				{
				$this->form_validation->set_rules('name', 'name', 'required');
				$this->form_validation->set_rules('username', 'username', 'required|callback_exists_username');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					
					$this -> load -> view('layout/header');
					$this -> load -> view('group/add',$data);
					$this -> load -> view('layout/footer');
				}
				else 
				{		
						
			        $data1['name'] = $this->input->post('name');
					$data1['username'] = $this->input->post('username');
					$data1['password'] = md5($this->input->post('password'));
					$data1['date'] = date('Y-m-d');
					$data1['status'] = 1;
					
					
					$insert_query = $this->Groupmodel->insert($data1);
					
					if($insert_query==1)
					{
						$this->session->set_flashdata('success','New Travels created successfully');
					}
					else
					{
						$this->session->set_flashdata('error','Some Problem affected, Please try agein');
					}
					redirect('group/add');
				
				}
				}
				else
				{
					$data['validation']='';
					
					$this -> load -> view('layout/header');
					$this -> load -> view('group/add',$data);
					$this -> load -> view('layout/footer');
				}
				
	}
	
	function exists_username($username) 
	{
	   $result=$this->Groupmodel->username_exists($username);
	   if($result>0)
	   {
	  	  $this->form_validation->set_message('exists_username', 'Username already exists!');
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
			$data['result'] = $this->Groupmodel->edit($id);
			
			$this -> load -> view('layout/header');
			$this -> load -> view('group/edit',$data);
			$this -> load -> view('layout/footer');
	}
	
	function update()
	{
				$id = $this->input->post('id');
		
				$this->form_validation->set_rules('name', 'name', 'required');
				$this->form_validation->set_rules('username', 'username', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					$this->session->set_flashdata('error',$data);
					redirect('group/edit/'.$id);
				}
				else 
				{
					$data1['name'] = $this->input->post('name');
					$data1['username'] = $this->input->post('username');
				  $password= $this->input->post('u_password');
					if(!empty($password))
					{
							$data1['password'] = md5($this->input->post('u_password'));
					}
				
					$check_username = $this->Groupmodel->update_username($id,$data1['username']);
					if($check_username<>0)
					{
						$this->session->set_flashdata('error','Username already exists');
						redirect('group/edit/'.$id);
					}
					else{
							$result = $this->Groupmodel->update($id,$data1);
						if($result>0)
						{
							$this->session->set_flashdata('success','Grou detail updated successfully');
							redirect('group/edit/'.$id);
						}
						else
						{
							redirect('group/edit/'.$id);
						}
					}
					
				}	
		
	}
	
	
	function delete($id,$status)
	{
		$this->Groupmodel->delete($id,$status);
		redirect('group/list_group');
		
	}
	
	

}
?>