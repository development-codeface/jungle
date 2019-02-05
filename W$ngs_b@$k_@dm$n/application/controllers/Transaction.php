<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Transaction extends CI_Controller {


function __construct() {
	parent::__construct();
	$this->load->helper('string');
	$this -> load -> library('pagination');
	$this -> load -> model('Transaction_model');
	$this -> load -> model('Settingsmodel');
	if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
}


## bookingwings coupon ##

function coupon_delete($id) {

	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}

		if($this->session->userdata['user_type']=='staff') {
			if(!empty($data_menu['menu']) && (in_array('32', json_decode($data_menu['menu']))==1)) {
	$cp['status'] = 0;
	$this -> db -> where('id', $id) -> update('tbl_site_coupon', $cp);
	$this->session->set_flashdata('msg','Coupon deleted');
	}
	} else {
	$cp['status'] = 0;
	$this -> db -> where('id', $id) -> update('tbl_site_coupon', $cp);
	$this->session->set_flashdata('msg','Coupon deleted');
	}
	redirect('transaction/coupon_index/');
}

function coupon_edit($id) {
	$data['cpn'] = $this -> Transaction_model -> getCoupon($id);
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	if(isset($_POST['submit'])) {

			$this->form_validation->set_rules('c_code', 'c_code', 'trim|required');
			$this->form_validation->set_rules('offer', 'offer', 'trim|required');
			$this->form_validation->set_rules('valid_from', 'valid from', 'trim|required');
			$this->form_validation->set_rules('valid_to', 'valid to', 'trim|required');
			$this->form_validation->set_rules('type', 'type', 'trim|required');
			$this->form_validation->set_rules('min_amount', 'minimumu amount', 'trim|numeric');
			
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			if ($this->form_validation->run() == FALSE) {
				
				$this -> load -> view('layout/header');
				$this -> load -> view('transaction/coupon',$data);
				$this -> load -> view('layout/footer');
			} else {
			$cp['coupon_code']	= $this->input->post('c_code');
			$cp['offer']		= $this->input->post('offer');
			$cp['min_amount']	= $this->input->post('min_amount');
			$cp['type']		= $this->input->post('type');
			$cp['valid_from']	= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
			$cp['valid_to']		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_to')), 'Y-m-d');
			$cp['status']		= 1;
			

			$this -> db -> where('id', $id) -> update('tbl_site_coupon', $cp);
			$this->session->set_flashdata('msg','Coupon updated successfully');
			redirect('transaction/coupon_edit/'.$id);
			}
	} else {
	
	$this -> load -> view('layout/header');
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('31', json_decode($data_menu['menu']))==1)) {
	$this -> load -> view('transaction/coupon_edit', $data);
	} else {
	$this->load->view('settings/no_permission');
	}
	} else {
	$this -> load -> view('transaction/coupon_edit', $data);
	}
	$this -> load -> view('layout/footer');
	}
}

function coupon_index() {
	$config['base_url'] = site_url('transaction/coupon_index');
	$config['total_rows'] = $this->db->count_all('tbl_site_coupon'); 
	$config['per_page'] = 10;
	$config["uri_segment"] = 3;
	$choice = $config["total_rows"] / $config["per_page"];
	$config["num_links"] = floor($choice);
	$this -> pagination -> initialize($config);
	$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
	$data['pagination'] = $this -> pagination -> create_links();
	
	$data['coupons'] = $this -> Transaction_model -> allCoupons($config["per_page"], $data['page']);
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}

	$this -> load -> view('layout/header');
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('29', json_decode($data_menu['menu']))==1)) {
	$this -> load -> view('transaction/coupon_index', $data);
	} else {
	$this->load->view('settings/no_permission');
	}
	} else {
	$this -> load -> view('transaction/coupon_index', $data);
	}
	$this -> load -> view('layout/footer');
}

function coupon() {
	$data['cp'] = random_string('alpha', 8);
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	if(isset($_POST['submit'])) {

			$this->form_validation->set_rules('c_code', 'c_code', 'trim|required');
			$this->form_validation->set_rules('offer', 'offer', 'trim|required|numeric');
			$this->form_validation->set_rules('valid_from', 'valid from', 'trim|required');
			$this->form_validation->set_rules('valid_to', 'valid to', 'trim|required');
			$this->form_validation->set_rules('type', 'type', 'trim|required');
			$this->form_validation->set_rules('min_amount', 'minimumu amount', 'trim|numeric');
			
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			if ($this->form_validation->run() == FALSE) {
				
				$this -> load -> view('layout/header');
				$this -> load -> view('transaction/coupon',$data);
				$this -> load -> view('layout/footer');
			} else {
			$cp['coupon_code']	= $this->input->post('c_code');
			$cp['offer']		= $this->input->post('offer');
			$cp['min_amount']	= $this->input->post('min_amount');
			$cp['type']		= $this->input->post('type');
			$cp['valid_from']	= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
			$cp['valid_to']		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_to')), 'Y-m-d');
			$cp['status']		= 1;
			
			$exist = $this -> Transaction_model -> couponDate($cp['valid_from'], $cp['valid_to'], $cp['type']);
			
			if($exist > 0) {
			$this->session->set_flashdata('msg_err','ERROR : A coupon already exists in given date range');
			} else {
			$this -> db -> insert('tbl_site_coupon', $cp);
			$this->session->set_flashdata('msg','Coupon generated successfully');
			}
			redirect('transaction/coupon');
			}
	} else {
		$this -> load -> view('layout/header');
		if($this->session->userdata['user_type']=='staff') {
		if(!empty($data_menu['menu']) && (in_array('30', json_decode($data_menu['menu']))==1)) {
		$this -> load -> view('transaction/coupon', $data);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this -> load -> view('transaction/coupon', $data);
		}
		$this -> load -> view('layout/footer');
	}
}

## bookingwings coupon end ##

function index()
{
	$this -> load -> view('layout/header');
	$this -> load -> view('transaction/index');
	$this -> load -> view('layout/footer');
}
	

function commision()
{
	$data['result']=$this->Transaction_model->listhotels();
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	if(isset($_POST['submit']))
	{
		$this->form_validation->set_rules('property', 'property', 'required');
		$this->form_validation->set_rules('commision', 'commision', 'required');
				
		if ($this->form_validation->run() == FALSE)
		{
			$data['validation']=validation_errors();
					
			$this -> load -> view('layout/header');
			$this -> load -> view('transaction/commision',$data);
			$this -> load -> view('layout/footer');
		}
		else 
		{		
			$datas['hotel_id'] 		= $this->input->post('property');
			$datas['commision'] 		= $this->input->post('commision');
			$datas['package_commision'] 		= $this->input->post('package');
			$datas['date'] = date('Y-m-d H-m-s');
			$datas['status'] = 1 ;
			
			$check = $this->Transaction_model->check_commision($datas); 
			
			if($check==1)
			{
				
			}
			else 
			{
				$result = $this->Transaction_model->add_commision($datas); 
				if($result==1)
				{
					$this -> session -> set_flashdata('success','Commision added successfully');
					
				}
				else
				{
					$this -> session -> set_flashdata('error','Some problem affected');
				}
			}
			redirect('transaction/commision');
		}
		
	}
	else
	{
	$this -> load -> view('layout/header');
	
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('26', json_decode($data_menu['menu']))==1)) {
	$this -> load -> view('transaction/commision', $data);
	} else {
	$this->load->view('settings/no_permission');
	}
	} else {
	$this -> load -> view('transaction/commision', $data);
	}
	$this -> load -> view('layout/footer');
		
	}
	
}


function list_commision()
{   $data['hotelid'] = '';
	$data['results']=$this->Transaction_model->listhotels();
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	$this -> load -> view('layout/header');
	
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('27', json_decode($data_menu['menu']))==1)) {
	$this -> load -> view('transaction/list',$data);
	} else {
	$this->load->view('settings/no_permission');
	}
	} else {
	$this -> load -> view('transaction/list',$data);
	}
	$this -> load -> view('layout/footer');
}


function ajax_commsion_list($hotel)
{
	$config['base_url'] = site_url('transaction/commsion_lists/'.$hotel);
	$config['total_rows'] = $this->Transaction_model->hotel_commision_count($hotel); 
	$config['per_page'] = "10";
	$config["uri_segment"] = 4;
	$choice = $config["total_rows"] / $config["per_page"];
	$config["num_links"] = floor($choice);
	$this -> pagination -> initialize($config);
	$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
	$data['pagination'] = $this -> pagination -> create_links();

	$data['result'] = $this->Transaction_model->hotel_commision($hotel,$config["per_page"], $data['page']);
	if(!empty($data['result']))
	{
		$i=1;
		$str='';			
		$pagination=$data['pagination'];
		foreach($data['result'] as $results):
		
		$str.='<tr class="active">
			   <td>'. $i++.'</td>
			   <td>'. $results->title.'</td>
			   <td>'. $results->commision.'</td>
			   <td>'. $results->package_commision.'</td>
			   <td>'. $results->date.'</td>';	
	
		endforeach;
	   echo $result=$str."|".$pagination;
	}
	else
	{
		$str='';
		$pagination='';
		$str.='<tr class="active">
		       <td colspan="4" align="center">No results Found</td>
		       </tr>';
				   
		echo $result=$str."|".$pagination;
	}
}

function commsion_lists($hotel)
{
	$data['results']=$this->Transaction_model->listhotels();
	
	$config['base_url'] = site_url('transaction/commsion_lists/'.$hotel);
	$config['total_rows'] = $this->Transaction_model->hotel_commision_count($hotel);  
	$config['per_page'] = "10";
	$config["uri_segment"] = 4;
	$choice = $config["total_rows"] / $config["per_page"];
	$config["num_links"] = floor($choice);
	$this -> pagination -> initialize($config);
	$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
	$data['pagination'] = $this -> pagination -> create_links();

	$data['result'] = $this->Transaction_model->hotel_commision($hotel,$config["per_page"], $data['page']);
	$data['hotelid'] = $hotel;
	
	$this -> load -> view('layout/header');
	$this -> load -> view('transaction/list',$data);
	$this -> load -> view('layout/footer');
	
}
function get_rooms_amount($hotel)
{
	
	$check_hotel = $this->Transaction_model->hotel_avilable($hotel); 
	$check_package = $this->Transaction_model->package_avilable($hotel); 
	
	$data['results'] = $this->Transaction_model->allrooms($hotel);
	$data['package_results'] = $this->Transaction_model->package_rooms($hotel);
	
	//print_r($data); exit;
	
	if($check_hotel<>''):
	?>
	  <div class="col-lg-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Room Price</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   	<div class="panel">		
                                   		<?php
                                   		 foreach($data['results'] as $result): 
											
											 $room_basic_price = $this->Transaction_model->room_basic_price($result->id,$hotel);
											 $romm_detail = $this->Transaction_model->room_detail($result->room_id);
											
											 if(!empty($room_basic_price))
											 {
												 $basic_amount = $room_basic_price[0]->price;
												 $offer_price = $this->Transaction_model->offer_price($hotel);
												 												 
												 if(!empty($offer_price))
												 {
												 	$offer= $offer_price[0]->offer;
													$room_amount= $basic_amount -(($basic_amount*$offer)/100);
												 }
												 else
												 {
													$room_amount=$basic_amount;
												 }
												 
												 
												 $agency_tariff = $this->Transaction_model->hotel_tariff($hotel);
												 
												  if(!empty($agency_tariff))
												  {
												  
												  	$tariff =  $agency_tariff[0]->room_tariff;
													$last_string =  substr($tariff,-1);
													if($last_string=='%')
													{
													$amount = ($room_amount*$tariff)/100;
													}
													else
													{
														$amount = $tariff;
													}
													$final_amout=$room_amount  - $amount;
												  }
												  else
												  {
													  $final_amout=$room_amount;
												  }
													
											
                                   			?>							
											<div class="form-group fieldgroup row">
				                               <label class="col-lg-8"><?php echo $romm_detail[0]->room_title;?> (<?php echo $result->normal_allowed_adults;?> adult + <?php echo $result->normal_allowed_kids;?> child) </label>
				                                <label class="col-lg-1">:</label>
				                                <label class="col-lg-3"><?php echo round($final_amout);?></label>
				                            </div>
				                      		 <?php
				                       	  		
										   }
											
											  endforeach;?>
				                          
                                   	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
             <?php
			endif;
			
			if($check_package<>''){
		
             ?>       
                    
                    
                    
                    <div class="col-lg-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Hotel Package Price</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   	<div class="panel">		
                                   		<?php
                                   		
                                   		
                                   		 foreach($data['package_results'] as $result){
											 
											 $room_basic_price = $this->Transaction_model->package_room_basic_price($result->id,$hotel);
											 $romm_detail = $this->Transaction_model->room_detail($result->room_id);
											
											 if(!empty($room_basic_price))
											 {
												 $basic_amount = $room_basic_price[0]->price;
												 $offer_price = $this->Transaction_model->offer_price($result->hotel_id);
												
												 if(!empty($offer_price))
												 {
												 	$offer= $offer_price[0]->offer;
													$room_amount= $basic_amount -(($basic_amount*$offer)/100);
												 }
												 else
												 {
													$room_amount=$basic_amount;
												 }
												
												
												 $agency_tariff = $this->Transaction_model->hotel_tariff($result->hotel_id);
												  if(!empty($agency_tariff))
												  {
												  
												 	$tariff =  $agency_tariff[0]->room_tariff;
													$last_string =  substr($tariff,-1);
													if($last_string=='%')
													{
													 $amount = ($room_amount*$tariff)/100;
													}
													else
													{
														$amount = $tariff;
													}
													 $final_amout=$room_amount  - $amount;
												  }
												  else
												  {
													  $final_amout=$room_amount;
												  }
													
											
                                   			?>							
											<div class="form-group fieldgroup row">
				                               <label class="col-lg-8"><?php echo $romm_detail[0]->room_title;?> (<?php echo $result->normal_allowed_adults;?> adult + <?php echo $result->normal_allowed_kids;?> child) </label>
				                                <label class="col-lg-1">:</label>
				                                <label class="col-lg-3"><?php echo round($final_amout);?></label>
				                            </div>
				                      		 <?php
				                       	  		
												
										   }
											
										 } ?>
				                          
                                   	</div>
                                </div>
                            </div>
                        </div>
                    </div>
  <?php    
}       
}



function commision_amount()
{
	$data['results']=$this->Transaction_model->listhotels();
	$data['hotelid']='';
	if(isset($_GET['submit'])){
		
		$data['from'] =  date_format(date_create_from_format('d-m-Y', $this->input->get('from_date')), 'Y-m-d'); 
		$data['to'] = date_format(date_create_from_format('d-m-Y', $this->input->get('to_date')), 'Y-m-d');
		$hotel = $this->input->get('hotelid');
		
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('transaction/commision_amount/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows'] 	=  $this -> Transaction_model -> count_commision($hotel,$data['from'],$data['to']);
		
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['result'] = $this->Transaction_model->getnumber($hotel,$data['from'],$data['to'],$config["per_page"], $data['page']);
		$data['hotel']			= $hotel;
		$data['hotelid']		= '';
	}
	
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	$this -> load -> view('layout/header');
	if($this->session->userdata['user_type']=='staff') {
	if(!empty($data_menu['menu']) && (in_array('28', json_decode($data_menu['menu']))==1)) {
	$this -> load -> view('transaction/commision_amount',$data);
	} else {
	$this->load->view('settings/no_permission');
	}
	} else {
	$this -> load -> view('transaction/commision_amount',$data);
	}
	$this -> load -> view('layout/footer');
	
}


}
?>