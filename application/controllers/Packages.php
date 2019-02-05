<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Packages extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Packages_model');
		$this->load->model('Checkout_model');
	}
	
	function index($id='')
	{
		if(!empty($_POST))
		{
		}
		else
		{
			
			  $data['hidden_search'] = str_replace("'", "", $this->input->get('hidden-search'));
			  $data['days'] = $this->input->get('days');
			  $data['nights'] = $this->input->get('nights');
			  $data['dest'] = $this->input->get('dest');
			  
			  if($data['days']<>''){
			  
			    if(!empty($data['hidden_search']))
			    {
					$query['text_val']	=	 $data['hidden_search'];
					//$query['text_val']		= explode(' ', $query['text_val']);
					$query['text_val']		= $query['text_val'];
					//$query['text_val']		= $query['text_val'][0];
			    }
				if(!empty($data['nights']))
				{
					$query['nights']	=	$this->input->get('nights');
					$data['nights'] = $query['nights'];
				}
				if(!empty($data['days']))
				{
					$query['days']	=	$this->input->get('days');
					$data['days'] = $query['days'];
				}
				
				if(!empty($query))	
				{
					
					$data['holiday'][0] 		= $this->Packages_model->search($query);
					$data['details']=$data['holiday'][0];																																	
					//$data['text_val']		=   $this->input->post('hidden-search');
					//$data['date_check']=$data['holiday'][1];
					
					//print_r($data['details']); exit;
				}	
				else
				{
					$data['details'] 		= '';
					$data['text_val']		=  '';
				}
			  }
			  else
			  {
					if(!empty($data['hidden_search']))
					{
						$query['text_val']	=	str_replace("'", "", $this->input->get('hidden-search'));
						$query['text_val']		= $query['text_val'];
						$query['text_val']		= $query['text_val'];
					}
					if(!empty($data['nights']))
					{
						$query['nights']	=	$this->input->get('nights');
						$data['nights'] = $query['nights'];
					}
					if(!empty($data['dest']))
					{
						$query['dest']	=	$this->input->get('dest');
						$data['dest'] = $query['dest'];
					}
					
									
					$data['holiday'][0] 		= $this->Packages_model->search_refine($query); 
					$data['details']=$data['holiday'][0];
			  }				  
				
				
		}
		
		//print_r($data['details']); exit;
		
		$this->session->set_userdata(array('default' => 'inr'));
		
		
		//$data['details']=$this->Packages_model->packages_list();
		$this->load->view('package/list', $data);
			
		
	}
	
	
	function search_keyword()
	{
		
		$keyword = $this->input->get('term');  
		$res = $this->Packages_model->search_keyword($keyword);		
		
		
		
		echo $res;
		
	}
	
	
	
		function detail($id)
	{
		$this->session->set_userdata(array('default' => 'inr'));
		
		
			
			$data['details']	= $this->Packages_model->packageById($id);
			$data['img']		= $this->Packages_model->imageById($id);
			$data['itn']		= $this->Packages_model->itineraryById($id);
			$data['price']		= $this->Packages_model->priceById($id);
			$data['vehicle']	= $this->Packages_model->vehicleById($id);
			
		
			
			//echo $data['price']->off_seasonal_two_star; exit;
			$this->load->view('package/detail_view',$data);
			
	}
	
	
	function refine_search()
	{
			$data['nights'] = $this->input->get('nights');
			$data['hidden_search'] = str_replace("'", "", $this->input->get('search_text'));	 
			  $data['dest'] = $this->input->get('dest');
			  
			
					if(!empty($data['hidden_search']))
					{
						$query['text_val']	=	str_replace("'", "", $this->input->get('hidden-search'));
						$query['text_val']		= $query['text_val'];
						$query['text_val']		= $query['text_val'];
					}
					if(!empty($data['nights']))
					{
						$query['nights']	=	$this->input->get('nights');
						$data['nights'] = $query['nights'];
					}
					if(!empty($data['dest']))
					{
						$query['dest']	=	$this->input->get('dest');
						$data['dest'] = $query['dest'];
					}
					
									
					$data['holiday'][0] 		= $this->Packages_model->search_refine($query); 
					$data['details']=$data['holiday'][0];
						  
			  
			  $this->load->view('package/refine_search',$data);
			  
	}
	
	function checkout()
	{
		 $data['package_id']=$this->input->get('package');
		 $data['details'] = $this->Packages_model->packageById($data['package_id']);
		 $data['img']		= $this->Packages_model->imageById($data['package_id']);
		 $data['itn']		= $this->Packages_model->itineraryById($data['package_id']);
		 $data['price']		= $this->Packages_model->priceById($data['package_id']);
		 $data['vehicle']	= $this->Packages_model->vehicleById($data['package_id']);
		 
		
		 $this->load->view('package/checkout',$data);
	}
	
	function payment()
	{
		 $data['package_id']=$this->input->get('package');
		 $data['person']=$this->input->get('person');
		 $data['veh']=$this->input->get('veh');
		 $data['hotel']=$this->input->get('hotel');
		 $data['check_out'] = $this->input->get('checkout');
		 $data['check_in'] = $this->input->get('checkin');
		 
		 $data['details'] = $this->Packages_model->packageById($data['package_id']);
		 
		 $this->load->view('package/payment',$data);
	}
	
	function success()
	{
		 $datas['user_details']=$this->Checkout_model->detailsByUser($this->session->userdata['log_username']);
		 $db_data['package_id'] = $this->input->get('package');
		 $db_data['user_id'] = $datas['user_details'][0]->id; 
		 $db_data['hotel'] = $this->input->get('hotel'); 
		 
		 
		 $data['details'] = $this->Packages_model->packageById($db_data['package_id']);
		 
		$seasonal = $this->Packages_model->get_price($db_data['package_id']);
		if(!empty($seasonal)):
			$two_star =  json_decode($seasonal[0]->seasonal_two_star);
			$three_star = json_decode($seasonal[0]->seasonal_three_star);
			$four_star =  json_decode($seasonal[0]->seasonal_four_star);
			$five_star =  json_decode($seasonal[0]->seasonal_five_star);
		endif;
							
		$off_seasonal = $this->Packages_model->get_price_off($db_data['package_id']);
		if(!empty($off_seasonal)):
			$two_star =  json_decode($off_seasonal[0]->off_seasonal_two_star);
			$three_star =  json_decode($off_seasonal[0]->off_seasonal_three_star);
			$four_star =  json_decode($off_seasonal[0]->off_seasonal_four_star);
			$five_star =  json_decode($off_seasonal[0]->off_seasonal_five_star);
		endif;
		
		if($db_data['hotel']==2){  $db_data['price']= $two_star[0]; }
		if($db_data['hotel']==3){  $db_data['price']=$three_star[0]; }
		if($db_data['hotel']==4){  $db_data['price']=$four_star[0]; }
		if($db_data['hotel']==5){  $db_data['price']= $five_star[0]; }
		 
		 $db_data['no_of_person'] = $this->input->get('person');
		 $db_data['vehicles'] = json_encode($this->input->get('veh'));
		 $db_data['check_in'] = date_format(date_create_from_format('d-m-Y',$this->input->get('checkin') ), 'Y-m-d');
		 $db_data['check_out'] = date_format(date_create_from_format('d-m-Y',$this->input->get('checkout')), 'Y-m-d');

		
		 $db_data['name'] = $this->input->post('first_name'). $this->input->post('last_name');
		 $db_data['email'] = $this->input->post('email');
		 $db_data['phone'] = $this->input->post('phone');
		 $db_data['request'] = $this->input->post('request');
		 $db_data['date'] = date('Y-m-d');
		 $db_data['status'] = 0;
		 $db_data['cancel'] = 0;

		 $this->db->insert('tbl_package_booking',$db_data);
			
		 
		 
		 $msg = "Booking Success";
		 $this->session->set_flashdata('msg', $msg);
		   
		 $this->load->view('package/success',$data);
	}

}
