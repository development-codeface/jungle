<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Transaction extends CI_Controller {


function __construct() {
	parent::__construct();
	$this -> load -> library('pagination');
	$this -> load -> model('Transaction_model');
	if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
}


function index()
{
	$this -> load -> view('layout/header');
	$this -> load -> view('transaction/index');
	$this -> load -> view('layout/footer');
}
	

function commision()
{
	$data['result']=$this->Transaction_model->listhotels();
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
	$this -> load -> view('transaction/commision', $data);
	$this -> load -> view('layout/footer');
		
	}
	
}


function list_commision()
{   $data['hotelid'] = '';
	$data['results']=$this->Transaction_model->listhotels();
	$this -> load -> view('layout/header');
	$this -> load -> view('transaction/list',$data);
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
	
	$this -> load -> view('layout/header');
	$this -> load -> view('transaction/commision_amount',$data);
	$this -> load -> view('layout/footer');
	
}

function get_commision($from, $to, $hotel)
{
	$data['results']=$this->Transaction_model->listhotels();
		
	if(!empty($from)) $data['from']	= date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d');
	if(!empty($to)) 	$data['to']	= date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d');
	
	$config['base_url']		= site_url('transaction/get_commision/'.$from.'/'.$to.'/'.$hotel);
	$config['total_rows']	= $this -> Transaction_model -> count_commision($hotel,$data['from'],$data['to']);
	$config['per_page']		= 10;
	$config["uri_segment"]	= 6;
	$choice					= $config["total_rows"] / $config["per_page"];
	$config["num_links"]	= floor($choice);
	$this -> pagination -> initialize($config);
	
	$data['page']			= ($this -> uri -> segment(6)) ? $this -> uri -> segment(6) : 0;
	$data['pagination']		= $this -> pagination -> create_links();
	$data['result']			= $this->Transaction_model->getnumber($hotel,$data['from'],$data['to'],$config["per_page"], $data['page']);
	$data['hotel']			= $hotel;
	$data['hotelid']		= '';
	
	if (!$this->input->is_ajax_request()) {
	$this -> load -> view('layout/header'); }
	$this -> load -> view('transaction/commision_amount',$data);
	if (!$this->input->is_ajax_request()) {
	$this -> load -> view('layout/footer'); }
}
}
?>