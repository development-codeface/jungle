<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Reportmodel');
		$this -> load -> model('Hotelmodel');
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
	}

	function index()
	{
	
	 	$this -> load -> view('layout/header');
		$this -> load -> view('report/index');
		$this -> load -> view('layout/footer');
		
	}
	
	function hotel_log()
	{
		$data['title'] = 'Hotel Operations Log';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		if(isset($_GET['search']))
		{
		$dat['hotel_id'] = $this -> input -> get('hotel');
		$data['hotel_id'] = $this -> input -> get('hotel');
		
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('report/hotel_log/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows'] 	=  $this->Reportmodel->hotel_log_count($dat);
		$config['per_page'] 	= 1;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['report'] = $this -> Reportmodel -> hotel_log($dat);
		}
		
		$this -> load -> view('layout/header');
		$this -> load -> view('report/hotel_log', $data);
		$this -> load -> view('layout/footer');
	}
	
	function hotelreport()
	{
		if($this->input->post('category'))
		{
			
			 $category = $this->input->post('category');
			 $status = $this->input->post('status');
			 
			$config['base_url'] = site_url('report/hotelreports/'.$category."/".$status);
			$config['total_rows'] = $this->Reportmodel->row_count($category,$status); 
			$config['per_page'] = "10";
			$config["uri_segment"] = 5;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
			
			$this -> pagination -> initialize($config);
			
			$data['page'] = ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
			$data['pagination'] = $this -> pagination -> create_links();
			$data['list'] = $this->Reportmodel->hotel_list($category,$status,$config["per_page"], $data['page']);
			 
			 
			 if(!empty($data['list']))
			 {
			 	$i=1;
				$str='';
								
				$pagination=$data['pagination'];
			 	foreach($data['list'] as $value):
					
					
				    $state =$this->Reportmodel->select_location($value->state); 
					
					
					//$country =$this->Reportmodel->select_location($value->country);
					
					$str.='<tr class="active">
							 <td>'. $i++.'</td>
							 <td>'. $value->title.'</td>
							 <td>'. $value->address.'</td>
							 <td>'. $value->place.'</td>
							 <td>'. $state->district.'</td>
							 <td>'. $state->state.'</td>';
							 if($value->status==0)
							 {
							 $str.='<td><a href="'.base_url().'report/changestatus/'.$value->id.'/1'.'">Unblock</a></td>
							 </tr>';
							 }
							 else
							 {
							 $str.='<td><a href="'.base_url().'report/changestatus/'.$value->id.'/0'.'">Block</a></td>
							 </tr>'; 
							 }
						 
				endforeach;	
			   echo $result=$str."|".$pagination;
			 }
			 else
			 {
			 	$str='';
			 	$pagination='';
				$str.='<tr class="active">
		             <td colspan="8" align="center">No results Found</td>
		           </tr>';
				   
				echo $result=$str."|".$pagination;
		          
			 }
			 
		}
		else
		{
			$data['sub_category']=$this->Reportmodel->sub_category();
			
			$category = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			
			$config['base_url'] = site_url('report/hotelreports/'.$category."/".$status);
			$config['total_rows'] = $this->Reportmodel->row_count($category,$status); 
			$config['per_page'] = "10";
			$config["uri_segment"] = 5;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
			
			$this -> pagination -> initialize($config);
			
			$data['page'] = ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
			$data['pagination'] = $this -> pagination -> create_links();
			$data['list'] = $this->Reportmodel->hotel_list($category,$status,$config["per_page"], $data['page']);
			if($category<>0)
			{
			$data['sub_cat'] = $category; 
			$data['status'] = $status; 
			}
			else
			{
			  $data['sub_cat'] = ''; 
			  $data['status'] = 1; 
			}
			$this -> load -> view('layout/header');
			$this -> load -> view('report/hotel_report',$data);
			$this -> load -> view('layout/footer');
		}
		
	}
	
	
	function hotelreports($cat,$stat)
	{
			$data['sub_category']=$this->Reportmodel->sub_category();
			
			$category = $cat;
			$status = $stat;
			 
			$config['base_url'] = site_url('report/hotelreports/'.$category."/".$status);
			$config['total_rows'] = $this->Reportmodel->row_count($category,$status); 
			$config['per_page'] = "10";
			$config["uri_segment"] = 5;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
			
			$this -> pagination -> initialize($config);
			
			$data['page'] = ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
			$data['pagination'] = $this -> pagination -> create_links();
			$data['list'] = $this->Reportmodel->hotel_list($category,$status,$config["per_page"], $data['page']);
			$data['sub_cat'] = $category; 
			$data['status'] = $status; 
			
			$this -> load -> view('layout/header');
			$this -> load -> view('report/hotel_report',$data);
			$this -> load -> view('layout/footer');
		
	}
	
	function changestatus($id,$status)
	{
		$data['hotel'] = $this->Hotelmodel->hotelById($id);
		$sub_category = $data['hotel']->sub_category_id;
		
		if($status==0)
		{
		  $stat=1;	
		}
		else
		{
		  $stat=0;	
		}
		$datas['status']=$status;
		$data['results'] = $this -> Hotelmodel -> changestatus($id,$datas);
			
		redirect('report/hotelreport/'.$sub_category.'/'.$stat);
		
	}
	
	
	function bookingreport()
	{ 
	$data['title'] = 'Booking Report';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		$this -> load -> view('layout/header');
		$this->load->view('report/side_menu');
		$this -> load -> view('report/booking_report',$data);
		$this -> load -> view('layout/footer');
		
	}
	
	function booking_online()
	{
		$data['title'] = 'Booking Report';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		if(isset($_GET['search']))
		{
			
			$data['from_date']=$this->input->get('from');
			$data['hotel_id']=$this->input->get('hotel'); 
			$data['to_date']=$this->input->get('to');
			$data['b_num']=$this->input->get('b_num');


			
			
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('report/booking_online/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows'] 	=  $this->Reportmodel->online_report_count($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num']);
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
		//echo $this -> uri -> segment(6);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['report'] = $this->Reportmodel->online_report($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num'],$config["per_page"],$data['page']);
				
		$this -> load -> view('layout/header');
		$this->load->view('report/side_menu');
		$this -> load -> view('report/booking_report',$data);
		$this -> load -> view('layout/footer');
		}
		else
		{
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/booking_report',$data);
			$this -> load -> view('layout/footer');
		}
	}
	
	function cancelreport()
	{ 
	$data['title'] = 'Booking Cancel Report';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		$this -> load -> view('layout/header');
		$this->load->view('report/side_menu');
		$this -> load -> view('report/cancel_report',$data);
		$this -> load -> view('layout/footer');
		
	}
	function cancel_online()
	{
		$data['title'] = 'Booking Cancel Report';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		
		if(isset($_GET['search']))
		{
			
			$data['from_date']=$this->input->get('from');
			$data['hotel_id']=$this->input->get('hotel'); 
			$data['to_date']=$this->input->get('to');
			$data['b_num']=$this->input->get('b_num');

			
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('report/cancel_online/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);//$config['base_url'] 	= site_url('report/reservation?from='.$data['from_date'].'&to='.$data['to_date'].'&hotel='.$data['hotel_id'].'&b_num='.$data['b_num']);
		$config['total_rows'] 	=  $this->Reportmodel->online_cancel_count($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num']);
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['report'] = $this->Reportmodel->online_cancel_report($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num'],$config["per_page"],$data['page']);
				
		
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/cancel_report',$data);
			$this -> load -> view('layout/footer');	
			
		}
		else
		{
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/cancel_report',$data);
			$this -> load -> view('layout/footer');	
		}
		
		
	
	}

	public function cancel_update($bookno,$email)
	 {
		$cancel_up=$this->Reportmodel->cancel_update($bookno);
		
		$mydata = array(
			'booking_number' => $this->uri->segment(3),
	   		 'email' => $this->uri->segment(4)
		);
	   
		//echo $email;
		//echo $email,$booking_number;
		//exit;
		$this->load->library('email');
	    $message = $this->load->view('layout/cancel_booking_email', $mydata,true);     
	    $this->email->set_mailtype('html');
	    $this->email->from('info@crantia.com', 'Bookingwings');
	    $this->email->to($email); 
	
	    $this->email->subject('Cancel Booking');
	    $this->email->message($message);    
	
	    $this->email->send();
	    echo "succ";
		
		redirect('report/cancelreport');
	 }
	 
	 
	  public function amend_update($bookno,$email)
	 {
		$amend=$this->Reportmodel->amend_update($bookno);
		
		$mydata = array(
			'booking_number' => $this->uri->segment(3),
	   		 'email' => $this->uri->segment(4)
		);
	   

		$this->load->library('email');
	    $message = $this->load->view('layout/amend_booking_email', $mydata,true);     
	    $this->email->set_mailtype('html');
	    $this->email->from('info@crantia.com', 'Bookingwings');
	    $this->email->to($this->uri->segment(4)); 
	
	    $this->email->subject('Booking Amendment');
	    $this->email->message($message);    
	
	    $this->email->send();
	    echo "succ";
		
		redirect('report/amendreport');
	 }
	
	function amend_online()
	{
		$data['title'] = 'Booking Amendments';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		if(isset($_GET['search']))
		{
			
			$data['from_date']=$this->input->get('from');
			$data['hotel_id']=$this->input->get('hotel'); 
			$data['to_date']=$this->input->get('to');
			$data['b_num']=$this->input->get('b_num');

			
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('report/amend_online/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);//$config['base_url'] 	= site_url('report/reservation?from='.$data['from_date'].'&to='.$data['to_date'].'&hotel='.$data['hotel_id'].'&b_num='.$data['b_num']);
		$config['total_rows'] 	=  $this->Reportmodel->online_amend_count($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num']);
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['report'] = $this->Reportmodel->online_amend_report($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num'],$config["per_page"],$data['page']);
				
		
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/amend_report',$data);
			$this -> load -> view('layout/footer');	
			
		}
		else
		{
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/amend_report',$data);
			$this -> load -> view('layout/footer');	
		}
		
		
 				
	}
	
	function amendreport()
	{ 
		$data['title'] = 'Booking Amendments';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		$this -> load -> view('layout/header');
		$this->load->view('report/side_menu');
		$this -> load -> view('report/amend_report',$data);
		$this -> load -> view('layout/footer');
		
	}
	
	
	
	
	function reservation()
	{ 	
	
		$data['title'] = 'Resertvation Report';
		$data['hotels'] = $this->Reportmodel->all_hotels();
		
		if(isset($_GET['search']))
		{
			
			$data['from_date']=$this->input->get('from');
			$data['hotel_id']=$this->input->get('hotel'); 
			$data['to_date']=$this->input->get('to');
			$data['b_num']=$this->input->get('b_num');

			
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		$config['base_url'] 	= site_url('report/reservation/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);
		//$config['base_url'] 	= site_url('report/reservation/'.$from.'/'.$to.'/'.$hotel.'/'.$num);
		//$config['base_url'] 	= site_url('report/reservation?from='.$data['from_date'].'&to='.$data['to_date'].'&hotel='.$data['hotel_id'].'&b_num='.$data['b_num']);
		$config['total_rows'] 	=  $this->Reportmodel->reservation_report_count($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num']);
		//$config['total_rooms'] =  $this->Reportmodel->count_rooms($bookno);
		$config['per_page'] 	= 10;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
		//echo $this -> uri -> segment(6);
		$data['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		
		$data['report'] = $this->Reportmodel->reservation_report($data['from_date'],$data['to_date'],$data['hotel_id'],$data['b_num'],$config["per_page"],$data['page']);
				
		
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/reservation_report',$data);
			$this -> load -> view('layout/footer');	
			
		}
		else
		{
			$this -> load -> view('layout/header');
			$this->load->view('report/side_menu');
			$this -> load -> view('report/reservation_report',$data);
			$this -> load -> view('layout/footer');	
		}
		
		
		
	}
}
?>