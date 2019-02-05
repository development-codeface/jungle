<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');		
		$this->load->model('Usermodel');
		$this->load->model('Profilemodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
		
	}


	function index()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{	$data_menu['menu']='';}
		
		$config['base_url'] = site_url('users/index');
		$config['total_rows'] = $this -> Usermodel -> row_count($id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 5;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
	
		
		$data['userid']=$this->Usermodel->get_userid($id,$config["per_page"], $data['page']);
		$data['status']='';
		
	 	$this -> load -> view('layout/header'); 
		if(!empty($data_menu['menu']))
		{	if(in_array('2', json_decode($data_menu['menu']))==1)
			{ $this->load->view('users/users',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('users/users',$data);	
		}
		//$this -> load -> view('users/users',$data);
		$this -> load -> view('layout/footer');
		
	 }


function user_status($status)
{
	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('users/users_status/'.$status);
	 	$config['total_rows'] = $this -> Usermodel -> user_row_count($id,$status);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['userid']=$this->Usermodel->user_status($id,$status,$config["per_page"], $data['page']);
		
		$i=1;
		$str='';
		$pagination=$data['pagination'];
		   	 if(!empty($data['userid']))
		   	 {
		        	foreach ($data['userid'] as $user) {
		        		
						if($status=='offline')
						{
							$result = $this->Usermodel->get_oofline_users($user->offline_user);
							//$booking = $this->Usermodel->booking_count($user->offline_user);
						}
						else
						{
							$result = $this->Usermodel->get_users($user->user_id);
							$booking = $this->Usermodel->booking_count($user->user_id);
						}
								      
								
								$str.='<tr class="active">
							 <td>'. $i++.'</td>
							 <td>'. $result[0]->first_name.'&nbsp;'.$result[0]->last_name.'</td>
							 <td>'. $result[0]->email.'</td>
							 <td>'. $result[0]->phone.'</td>';
							 
							 if($status=='online')
							 {
							 	$str .='<td>'. $booking.'</td>';
							 }
							 else 
							 {
								$str .='<td>1</td>';
							}
							 
							 $str.='</tr>';
							 				  
		                 }
		                
			   echo $results=$str."|".$pagination;
		    }
			else
			{
				$pagination='';
				$str.='<tr class="active text-center"><td colspan="7">No users found.</td></tr>';
				
				 echo $results=$str."|".$pagination;
			}
		                   
	
}
	 
	 function users_status($status)
	 {
	 	
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('users/users_status/'.$status);
		$config['total_rows'] = $this -> Usermodel -> user_row_count($id,$status);
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
	
		
		$data['userid']=$this->Usermodel->user_status($id,$status,$config["per_page"], $data['page']);
		$data['status']=$status;
	 	$this -> load -> view('layout/header'); 
		$this -> load -> view('users/users',$data);
		$this -> load -> view('layout/footer');
		
		
	 }
	

	

}
?>