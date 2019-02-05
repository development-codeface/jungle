<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Hotelmodel');
		$this->load->library('image_lib');
		$this -> load -> model('Reportmodel');
		$this->load->library('pagination');
		
		$this->load->library('encrypt');
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
	}
	
	public function index()
	{
		
		$this->load->view('layout/header');
		$this->load->view('hotel/index');
		$this->load->view('layout/footer');
		
		
	}
	
	function hotellist()
	{
		$data['results'] = $this->Hotelmodel->alldeatils();
		$this->load->view('layout/header');
		$this->load->view('hotel/list',$data);
		$this->load->view('layout/footer');
	}
	
	public function category($name)
	{
		$cat_id = $this->Hotelmodel->category($name); 
	
		$data['cat_id'] = $cat_id->id;
		$data['cat_name'] = $cat_id->name;
		
	// if(isset($_GET['search'])) {
	// $data['key'] = $this -> input -> get('keyword');
	
		// $config['suffix']		= '?' . http_build_query($_GET, '', "&"); 
		// $config['base_url'] 	= site_url('hotel/category/'.$name);
		// $config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);
	

		// $config['total_rows'] = count($this -> Hotelmodel -> search_num($data['key'],$data['cat_id']));
		// $config['per_page'] = 10;
		// $config["uri_segment"] = 4;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = floor($choice);
		
		// $this -> pagination -> initialize($config);
		
		// $data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		// $data['pagination'] = $this -> pagination -> create_links();
	
	// $data['results'] = $this -> Hotelmodel -> search($data['key'],$data['cat_id'],$config["per_page"], $data['page']);
		// if(count($data['results']) == 0 && $data['page'] != 0) {
		// redirect($config['first_url']);
		// exit;
		// }

		// $this->load->view('layout/header');
		// $this->load->view('hotel/list',$data);
		// $this->load->view('layout/footer');
	// }
	
		$data['hotels'] = $this->Hotelmodel->subcategory($cat_id->id);
	
		if(isset($_GET['search'])) {
		$data['key'] = $this -> input -> get('keyword');
		$data['page'] = '';
		$data['pagination'] = '';
		
		$data['results'] = $this->db->where('id', $data['key'])->get('tbl_hotel')->result();

		$this->load->view('layout/header');
		$this->load->view('hotel/list',$data);
		$this->load->view('layout/footer');
	} else {
	
		if(!empty($this->session->userdata['hotel_adminusername']))
		{
			$this->session->unset_userdata('hotel_adminusername');
			$this->session->unset_userdata('category');
		}
		
		$config['base_url'] = site_url('hotel/category/'.$name);
		$config['total_rows'] = $this -> Hotelmodel -> row_count($cat_id->id); 
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		$data['results'] = $this->Hotelmodel->details_subcategory($cat_id->id,$config["per_page"], $data['page']);

		$this->load->view('layout/header');
		$this->load->view('hotel/list',$data);
		$this->load->view('layout/footer');
		}
	}
	
	public function edit($id,$cat)
	{
		$msg='';
		if(isset($_POST['submit']))
		{
				$id = $this->input->post('id');
				
				$data1['group_id'] = $this->input->post('group_id');
				$data1['title'] = $this->input->post('title');
				$data1['star_rating'] = $this->input->post('star_rating');
				$data1['address'] = $this->input->post('address');
				$data1['des'] = $this->input->post('desc');
				$data1['place'] = $this->input->post('place');
				$data1['state'] = $this->input->post('state');
				$data1['country'] = $this->input->post('country');
				$data1['facebook_link'] = $this->input->post('fb');
				$data1['phone'] = $this->input->post('phone');
				$data1['mail'] = $this->input->post('mailid');
				
				$data1['destination'] = $this->input->post('destination');
				
				$data1['status'] = 1;
				// $data1['check_in'] = $this->input->post('checkin');
				// $data1['check_out'] = $this->input->post('checkout');
				$data1['category_id'] = $this->input->post('catagory');
				$data1['sub_category_id'] = $this->input->post('sub_catagory');
				
				
				
				$actualpath			=	basename('hotel/slider/');
				$realpath			=	"hotel/".$actualpath."/".$id;
				$data['folder_path']=	$realpath."/";	
				$this->load->library('upload');
				//mkdir('../hotel/slider/'.$id, 0777, true);
				
				
				//logo change
				if($_FILES['logo']['name'])
				{
					
				$data_image['change_images'] = $this->Hotelmodel->details($id);
				
				$old_logo_image =  $data_image['change_images']['hotel'][0]->logo_img;
				
				$this->upload->initialize($this->set_upload_options($id));
						
				if (!$this->upload->do_upload('logo'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
						redirect('hotel/edit/'.$id.'/'.$cat);			
				}
				else
				{
				
					$upload_img_data = $this->upload->data();
					$data1['logo_img'] = $realpath."/".$upload_img_data['file_name'];
					//$data1['logo_img'] = $realpath."/".$_FILES['logo']['name'];
					if($old_logo_image<>'')
					{
					unlink('../'.$old_logo_image);
					}
				}  
				
				}
				
				
				
				$this->Hotelmodel->updatehotelbasic($data1,$id);
				
				
				if(!empty($_FILES))
				{				
				$files = $_FILES;
				$cpt = count(array_filter($_FILES['hotel_image']['name']));
				$keys = array_keys(array_filter($_FILES['hotel_image']['name']));
				for($i=0; $i<$cpt; $i++)
				{ 
				    $data2 = array();
					$j= $keys[$i];
					$_FILES['hotel_image']['name']		= $files['hotel_image']['name'][$j];
					$_FILES['hotel_image']['type']		= $files['hotel_image']['type'][$j];
					$_FILES['hotel_image']['tmp_name']	= $files['hotel_image']['tmp_name'][$j];
					$_FILES['hotel_image']['error']		= $files['hotel_image']['error'][$j];
					$_FILES['hotel_image']['size']		= $files['hotel_image']['size'][$j];
					$data2['image_url']				=	$realpath."/".$_FILES['hotel_image']['name'];
					$data2['thumb']				=	$realpath."/".$_FILES['hotel_image']['name'];
					$data2['status']					=	1;
					
					$this->upload->initialize($this->set_upload_options($id));
					
					if (!$this->upload->do_upload('hotel_image'))
					{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
					}
					else
					{
						$upload_img_data = $this->upload->data();
						$data2['image_url']			=	$realpath."/".$upload_img_data['file_name'];
						$data2['thumb'] = $realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
						$data2['hotel_id']					=	$id;
						
						$config1 = array(
							'source_image' => $upload_img_data['full_path'], //get original image
							'new_image' => $upload_img_data['file_path'], //save as new image //need to create thumbs first
							'create_thumb' => true,
							'maintain_ratio' => true,
							'width' => 250,
							'height' => 200
							);
							
							$this->image_lib->initialize($config1); //load library
							$this->image_lib->resize(); //generating thumb
							
						$this->db->insert('tbl_hotel_image', $data2); 
					}
				}
				}
				$this->db->delete('tbl_hotel_room_map', array('hotel_id' => $id)); 
				
				$room_com_rooms = $this->input->post('room_com_room');
				$room_com_count = $this->input->post('room_com_count');
				for($j=0; $j<count($room_com_rooms);$j++)
				{
					$data3 = array();
					$data3['hotel_id']	=	$id;
					$data3['status']	=	1;
					$data3['room_combination_id']	=	$room_com_rooms[$j];
					$data3['room_count']	=	$room_com_count[$j];
					$this->db->insert('tbl_hotel_room_map', $data3); 
				}
				
				$tax_room = $this->input->post('hotel_id');
				$tax_type = $this->input->post('seasonal');
				$tax_percent = $this->input->post('seasonal_percent');
				$t_count = count(array_filter($tax_type));
				$t_key = array_keys(array_filter($tax_type));
				
				for($i=0; $i<$t_count; $i++)
				{
					$j=$t_key[$i];
					$tax['hotel_id'] = $id;
					$tax['tax_type'] = $tax_type[$j];
					$tax['tax_amount'] = $tax_percent[$j];
					$tax['season'] = 'season';
					
					if(!empty($tax_room[$j]))
					{
						$tax_room_id = $tax_room[$j];
						$this -> db -> where('id', $tax_room_id) -> update('tbl_tax', $tax);
					}
					else {
						$this -> db -> insert('tbl_tax', $tax);
					}
				}
				
				
				
				
				$tax_room1 = $this->input->post('off_hotel_id');
				$tax_type1 = $this->input->post('off_seasonal');
				$tax_percent1 = $this->input->post('off_seasonal_percent');
				$t_count1 = count(array_filter($tax_type1));
				$t_key1 = array_keys(array_filter($tax_type1));
				
				for($i=0; $i<$t_count1; $i++)
				{
					$j=$t_key1[$i];
					$tax1['hotel_id'] = $id;
					$tax1['tax_type'] = $tax_type1[$j];
					$tax1['tax_amount'] = $tax_percent1[$j];
					$tax1['season'] = 'off_season';
					
					if(!empty($tax_room1[$j]))
					{
						$tax_room_id1 = $tax_room1[$j];
						$this -> db -> where('id', $tax_room_id1) -> update('tbl_tax', $tax1);
					}
					else {
						$this -> db -> insert('tbl_tax', $tax1);
					}
				}
				
				
				
				
				
				$data4['free_toiletries'] = $this->input->post('free_toiletries');
				$data4['hairdryer'] = $this->input->post('hairdryer');
				$data4['bathroom'] = $this->input->post('bathroom');
				$data4['toilet'] = $this->input->post('toilet');
				$data4['bath_shower'] = $this->input->post('bath_shower');
				$data4['slippers'] = $this->input->post('slippers');
				$data4['towels'] = $this->input->post('towels');
				$data4['linen'] = $this->input->post('linen');
				$data4['wardrobe_closet'] = $this->input->post('wardrobe_closet');
				$data4['garden_view'] = $this->input->post('garden_view');
				$data4['view'] = $this->input->post('view');
				$data4['free_outdoor_pool'] = $this->input->post('free_outdoor_pool');
				$data4['terrace'] = $this->input->post('terrace');
				$data4['garden'] = $this->input->post('garden');
				$data4['electric_kettle'] = $this->input->post('electric_kettle');
				$data4['clothes_rack'] = $this->input->post('clothes_rack');
				$data4['free_fFitness_centre'] = $this->input->post('free_fFitness_centre');
				$data4['DJ'] = $this->input->post('DJ');
				$data4['evening_entertainment'] = $this->input->post('evening_entertainment');
				$data4['sauna'] = $this->input->post('sauna');
				$data4['spa_wellness_centre'] = $this->input->post('spa_wellness_centre');
				$data4['massage'] = $this->input->post('massage');
				$data4['seating_area'] = $this->input->post('seating_area');
				$data4['desk'] = $this->input->post('desk');
				$data4['sofa'] = $this->input->post('sofa');
				$data4['telephone'] = $this->input->post('telephone');
				$data4['satellite_channels'] = $this->input->post('satellite_channels');
				$data4['flat_screen_TV'] = $this->input->post('flat_screen_TV');
				$data4['cable_channels'] = $this->input->post('cable_channels');
				$data4['bar'] = $this->input->post('bar');
				$data4['breakfast_in_the_room'] = $this->input->post('breakfast_in_the_room');
				$data4['restaurant'] = $this->input->post('restaurant');
				$data4['snack_bar'] = $this->input->post('snack_bar');
				$data4['special_diet_menus'] = $this->input->post('special_diet_menus');
				$data4['free_wifi'] = $this->input->post('free_wifi');
				$data4['free_parking'] = $this->input->post('free_parking');
				$data4['room_service'] = $this->input->post('room_service');
				$data4['packed_lunches'] = $this->input->post('packed_lunches');
				$data4['car_hire'] = $this->input->post('car_hire');
				$data4['airport_sshuttle'] = $this->input->post('airport_sshuttle');
				$data4['hour_front_desk'] = $this->input->post('hour_front_desk');
				$data4['currency_exchange'] = $this->input->post('currency_exchange');
				$data4['ticket_service'] = $this->input->post('ticket_service');
				$data4['free_luggage_storage'] = $this->input->post('free_luggage_storage');
				$data4['shared_lounge'] = $this->input->post('shared_lounge');
				$data4['babysitting'] = $this->input->post('babysitting');
				$data4['laundry'] = $this->input->post('laundry');
				$data4['dry_cleaning'] = $this->input->post('dry_cleaning');
				$data4['ironing_service'] = $this->input->post('ironing_service');
				$data4['free_shoeshine'] = $this->input->post('free_shoeshine');
				$data4['trouser_press'] = $this->input->post('trouser_press');
				$data4['meeting'] = $this->input->post('meeting');
				$data4['free_business_centre'] = $this->input->post('free_business_centre');
				$data4['fax'] = $this->input->post('fax');
				$data4['free_grocery_deliveries'] = $this->input->post('free_grocery_deliveries');
				$this->Hotelmodel->updatehotelfacilities($data4,$id);
				// $msg ='<div class="alert alert-info">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <strong>Successfully Updated!</strong> This hotel page<a href="'.base_url().'../hotel/'.$id.'" class="alert-link" target="_blank">Click here.</a>.
              // </div>';
              
              $this->session->set_flashdata('success','Successfully updated');
			  redirect('hotel/edit/'.$id.'/'.$cat);
				
		}
		$data['result'] = $this->Hotelmodel->hotelById($id);
		$data['result1'] = $this->Hotelmodel->hotelimagesById($id);
		$data['result2'] = $this->Hotelmodel->hotelroomsById($id);
		$data['result3'] = $this->Hotelmodel->hotelfacilitiesById($id);
		$data['groups'] = $this->Hotelmodel->group_list();
		
		
		$this->db->where('id',$data['result']->sub_category_id);
		$query_category = $this->db->get('tbl_sub_category');
		$data['sub_category'] = $query_category->result();
		
		$data['country'] = $this->Hotelmodel->country();
		$data['state'] = $this->Hotelmodel->states();
		
		$this->load->view('layout/header');
		$this->load->view('hotel/edit',$data);
		$this->load->view('layout/footer');
	}

	public function add($category)
	{
		
		$cat_id = $this->Hotelmodel->category($category); 
		$data['results'] = $this->Hotelmodel->subcategory($cat_id->id);
		$data['groups'] = $this->Hotelmodel->group_list();
		$data['cat_id'] = $cat_id->id;
		$data['cat_name'] = $cat_id->name;
		
		
		$msg='';
		$query_category = $this->db->get('tbl_category');
		$data['Catagory'] = $query_category->result();
		$data['country'] = $this->Hotelmodel->country();
		$data['state'] = $this->Hotelmodel->states();
		
			if(isset($_POST['submit']))
			{
				$hotels_count_query= $this->db->select('*')->get('tbl_hotel')->result();
				$hotels_count = count($hotels_count_query);
				if($hotels_count<>'')
				{
					$this->db->select_max('id');
					$query_id = $this->db->get('tbl_hotel')->row();
					
					$this->db->select('hotel_number')->where('id', $query_id->id);
					$query_number = $this->db->get('tbl_hotel')->row();
					$current_number =  $query_number->hotel_number;
					$data1['hotel_number'] = $current_number+1;
				}
				else
				{
					$data1['hotel_number']=1000;
				}
				
				$data1['group_id'] = $this->input->post('group_id');
				$data1['title'] = $this->input->post('title');
				$data1['star_rating'] = $this->input->post('star_rating');
				$data1['address'] = $this->input->post('address');
				$data1['des'] = $this->input->post('desc');
				$data1['place'] = $this->input->post('place');
				$data1['state'] = $this->input->post('state');
				$data1['country'] = $this->input->post('country');
				$data1['facebook_link'] = $this->input->post('fb');
				$data1['phone'] = $this->input->post('phone');
				$data1['mail'] = $this->input->post('mailid');
				$data1['status'] = 1;
				// $data1['check_in'] = $this->input->post('checkin');
				// $data1['check_out'] = $this->input->post('checkout');
				$data1['category_id'] = $this->input->post('catagory');
				$data1['sub_category_id'] = $this->input->post('sub_catagory');
				
				$data1['destination'] = $this->input->post('destination');
				
				$this->db->insert('tbl_hotel', $data1); 
				$id = $this->db->insert_id();
				$actualpath			=	basename('hotel/slider/');
				$realpath			=	"hotel/".$actualpath."/".$id;
				$data['folder_path']=	$realpath."/";	
				$this->load->library('upload');
				mkdir('../hotel/slider/'.$id, 0777, true);
				
				//$data5['logo_img'] = $realpath."/".$_FILES['logo_img']['name'];
				//$upload_img_data['file_name'];
				
				$this->upload->initialize($this->set_upload_options($id));
				if(!$this->upload->do_upload('logo_img'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
				}
				else
				{
				$upload_img_data = $this->upload->data();
				$data5['logo_img'] = $realpath."/".$upload_img_data['file_name'];
				$this->Hotelmodel->logo($data5, $id);
				}
				
				$enc_id	= $this->encrypt->encode($id);
					$enc_id = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id);
				
				//$data2['access_url']=$_SERVER['SERVER_NAME']."reservation/".url_title($data1['title'])."?hotel=".$enc_id;
				$data2['access_url']="http://www.bookingwings.com/reservation/".url_title($data1['title'])."?hotel=".$enc_id;
				$data2['username']=strtok($data1['title'], ' ')."_admin_".$id;
				//$email_password= str_shuffle(strtok($data1['title'], ' '))."_".$data1['hotel_number'];
				$data2['password']=md5((strtok($data1['title'], ' '))."_".$data1['hotel_number']);
				$data2['status'] = 1;
				$data2['hotel_id'] = $id;
				$data2['hotel_number'] =$data1['hotel_number'];
				
				$this->load->library('email');
			$mydata = array('username' => $data2['username'],'password' => (strtok($data1['title'], ' '))."_".$data1['hotel_number'],'hotel_number' =>$data1['hotel_number']);
			$message = $this->load->view('layout/hotel_register_email', $mydata, true);        

			 $this->email->set_mailtype('html');
			$this->email->from('info@bookingwings.com', 'Bookingwings');
			$admin_mailid='info@amanhts.com';
			//$admin_mailid='anjusivadaspk@gmail.com';
			//$this->email->to($data1['mail']); 
			$this->email->to($admin_mailid); 

			$this->email->subject('Registration Successful');
			$this->email->message($message);    
			$this->email->send();
				
				$this->db->insert('tbl_hotel_manager', $data2); 
				// $actualpath			=	basename('hotel/slider/');
				// $realpath			=	"hotel/".$actualpath."/".$id;
				// $data['folder_path']=	$realpath."/";	
				// $this->load->library('upload');
				// mkdir('../hotel/slider/'.$id, 0777, true);

				if(!empty($_FILES))
				{				
				$files = $_FILES;
				$cpt = count(array_filter($_FILES['hotel_image']['name']));
				$keys = array_keys(array_filter($_FILES['hotel_image']['name']));
				for($i=0; $i<$cpt; $i++)
				{ 
				    $data2 = array();
					$j= $keys[$i];
					$_FILES['hotel_image']['name']		= $files['hotel_image']['name'][$j];
					$_FILES['hotel_image']['type']		= $files['hotel_image']['type'][$j];
					$_FILES['hotel_image']['tmp_name']	= $files['hotel_image']['tmp_name'][$j];
					$_FILES['hotel_image']['error']		= $files['hotel_image']['error'][$j];
					$_FILES['hotel_image']['size']		= $files['hotel_image']['size'][$j];
					$data2['image_url']				=	$realpath."/".$_FILES['hotel_image']['name'];
					$data2['thumb']				=	$realpath."/".$_FILES['hotel_image']['name'];
					$data2['status']					=	1;
					
					$this->upload->initialize($this->set_upload_options($id));
					
					if (!$this->upload->do_upload('hotel_image'))
					{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
					}
					else
					{
						$upload_img_data = $this->upload->data();
						$data2['image_url']			=	$realpath."/".$upload_img_data['file_name'];
						$data2['thumb'] = $realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
						$data2['hotel_id']					=	$id;
						
						$config1 = array(
							'source_image' => $upload_img_data['full_path'], //get original image
							'new_image' => $upload_img_data['file_path'], //save as new image //need to create thumbs first
							'create_thumb' => true,
							'maintain_ratio' => true,
							'width' => 250,
							'height' => 200
							);
							
							$this->image_lib->initialize($config1); //load library
							$this->image_lib->resize(); //generating thumb
							
						$this->db->insert('tbl_hotel_image', $data2); 
					}
				}
				}
				
				$tax_type = $this->input->post('seasonal');
				$tax_percent = $this->input->post('seasonal_percent');
				$t_count = count(array_filter($tax_type));
				$t_key = array_keys(array_filter($tax_type));
				
				for($i=0; $i<$t_count; $i++)
				{
					$j=$t_key[$i];
					$tax['hotel_id'] = $id;
					$tax['tax_type'] = $tax_type[$j];
					$tax['tax_amount'] = $tax_percent[$j];
					$tax['season'] = 'season';
					
					$this -> db -> insert('tbl_tax', $tax);
				}
				
				
				
				$tax_type1 = $this->input->post('off_seasonal');
				$tax_percent1 = $this->input->post('off_seasonal_percent');
				$t_count1 = count(array_filter($tax_type1));
				$t_key1 = array_keys(array_filter($tax_type1));
				
				for($i=0; $i<$t_count1; $i++)
				{
					$j=$t_key1[$i];
					$tax1['hotel_id'] = $id;
					$tax1['tax_type'] = $tax_type1[$j];
					$tax1['tax_amount'] = $tax_percent1[$j];
					$tax1['season'] = 'off_season';
					
					$this -> db -> insert('tbl_tax', $tax1);
				}
				
				
				
				$data4['hotel_id'] = $id;
				$data4['free_toiletries'] = $this->input->post('free_toiletries');
				$data4['hairdryer'] = $this->input->post('hairdryer');
				$data4['bathroom'] = $this->input->post('bathroom');
				$data4['toilet'] = $this->input->post('toilet');
				$data4['bath_shower'] = $this->input->post('bath_shower');
				$data4['slippers'] = $this->input->post('slippers');
				$data4['towels'] = $this->input->post('towels');
				$data4['linen'] = $this->input->post('linen');
				$data4['wardrobe_closet'] = $this->input->post('wardrobe_closet');
				$data4['garden_view'] = $this->input->post('garden_view');
				$data4['view'] = $this->input->post('view');
				$data4['free_outdoor_pool'] = $this->input->post('free_outdoor_pool');
				$data4['terrace'] = $this->input->post('terrace');
				$data4['garden'] = $this->input->post('garden');
				$data4['electric_kettle'] = $this->input->post('electric_kettle');
				$data4['clothes_rack'] = $this->input->post('clothes_rack');
				$data4['free_fFitness_centre'] = $this->input->post('free_fFitness_centre');
				$data4['DJ'] = $this->input->post('DJ');
				$data4['evening_entertainment'] = $this->input->post('evening_entertainment');
				$data4['sauna'] = $this->input->post('sauna');
				$data4['spa_wellness_centre'] = $this->input->post('spa_wellness_centre');
				$data4['massage'] = $this->input->post('massage');
				$data4['seating_area'] = $this->input->post('seating_area');
				$data4['desk'] = $this->input->post('desk');
				$data4['sofa'] = $this->input->post('sofa');
				$data4['telephone'] = $this->input->post('telephone');
				$data4['satellite_channels'] = $this->input->post('satellite_channels');
				$data4['flat_screen_TV'] = $this->input->post('flat_screen_TV');
				$data4['cable_channels'] = $this->input->post('cable_channels');
				$data4['bar'] = $this->input->post('bar');
				$data4['breakfast_in_the_room'] = $this->input->post('breakfast_in_the_room');
				$data4['restaurant'] = $this->input->post('restaurant');
				$data4['snack_bar'] = $this->input->post('snack_bar');
				$data4['special_diet_menus'] = $this->input->post('special_diet_menus');
				$data4['free_wifi'] = $this->input->post('free_wifi');
				$data4['free_parking'] = $this->input->post('free_parking');
				$data4['room_service'] = $this->input->post('room_service');
				$data4['packed_lunches'] = $this->input->post('packed_lunches');
				$data4['car_hire'] = $this->input->post('car_hire');
				$data4['airport_sshuttle'] = $this->input->post('airport_sshuttle');
				$data4['hour_front_desk'] = $this->input->post('hour_front_desk');
				$data4['currency_exchange'] = $this->input->post('currency_exchange');
				$data4['ticket_service'] = $this->input->post('ticket_service');
				$data4['free_luggage_storage'] = $this->input->post('free_luggage_storage');
				$data4['shared_lounge'] = $this->input->post('shared_lounge');
				$data4['babysitting'] = $this->input->post('babysitting');
				$data4['laundry'] = $this->input->post('laundry');
				$data4['dry_cleaning'] = $this->input->post('dry_cleaning');
				$data4['ironing_service'] = $this->input->post('ironing_service');
				$data4['free_shoeshine'] = $this->input->post('free_shoeshine');
				$data4['trouser_press'] = $this->input->post('trouser_press');
				$data4['meeting'] = $this->input->post('meeting');
				$data4['free_business_centre'] = $this->input->post('free_business_centre');
				$data4['fax'] = $this->input->post('fax');
				$data4['free_grocery_deliveries'] = $this->input->post('free_grocery_deliveries');
				$this->db->insert('tbl_hotel_facilities', $data4); 
				// $msg ='<div class="alert alert-info">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <strong>Successfully Inserted!</strong> This hotel page<a href="'.base_url().'../hotel/'.$id.'" class="alert-link" target="_blank">Click here.</a>.
              // </div>';
              
              $this->session->set_flashdata('success','Successfully added');
			  redirect('hotel/add/'.$category);
				
			}
			$data['msg'] = $msg;
		$data['results'] = $this->Hotelmodel->alldeatils();
		$this->load->view('layout/header');
		$this->load->view('hotel/add',$data);
		$this->load->view('layout/footer');
		
	}

	public function select_sub_cat($edit_id)
	{
		$this->db->where('category_id', $this->input->post('cat')); 
		$query_category = $this->db->get('tbl_sub_category');
		//$edit_id = $this->input->post('edit_id');
		if($edit_id=='')
		{
			foreach($query_category->result() as $subcat)
			{
				echo '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
			}
		}
		else
		{
			foreach($query_category->result() as $subcat)
			{
				echo '<option value="'.$subcat->id.'" ';
				if($subcat->id == $edit_id){ echo ' selected="selected" '; }
				echo '>'.$subcat->name.'</option>';
			}
		}
	}

	public function select_state($edit_id)
	{
		
		$this->db->select('*');
		$this->db->where('location_type', 1); 
		$this->db->where('parent_id', $this->input->post('cat'));
		$this->db->where('is_visible', 0);
		$query_country = $this->db->get('location');
		//$edit_id = $this->input->post('edit_id');
		//echo $this->db->last_query();
		if($edit_id=='')
		{
			foreach($query_country->result() as $subcat)
			{
				echo '<option value="'.$subcat->location_id.'">'.$subcat->name.'</option>';
			}
		}
		else
		{
			foreach($query_country->result() as $subcat)
			{
				echo '<option value="'.$subcat->location_id.'" ';
				if($subcat->location_id == $edit_id){ echo ' selected="selected" '; }
				echo '>'.$subcat->name.'</option>';
			}
		}
	}
	
	
	
	public function select_district($edit_id)
	{
		
		$this->db->select('state')->where('id', $edit_id); 
		$query_country = $this->db->get('tbl_locations');
		$state  =$query_country->row();
		 $s_name  = $state->state;
		
		$query1 = $this->db->select('id,district')->where('state',$s_name)->order_by('district','asc')->get('tbl_locations');
		
			foreach($query1->result() as $dist)
			{
				echo '<option value="'.$dist->id.'" ';
				if($dist->id == $edit_id){ echo ' selected="selected" '; }
				echo '>'.$dist->district.'</option>';
			}
		
	}
	
	
	
	
	public function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../hotel/slider/'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //$config['max_size']      = '0';
	    //$config['overwrite']     = FALSE;
	    $config['encrypt_name']    = TRUE;

	    return $config;
	}

	public function remove_hotel_image_ajax($id)
	{
		$this->db->delete('tbl_hotel_image', array('id' => $id)); 
	}
	
	
	public function changestatus($id,$category)
	{
		
		$datas['status']=0;
		$data['results'] = $this -> Hotelmodel -> changestatus($id,$datas);
				
		redirect('hotel/category/'.$category);
	}
	
	public function image_edit($hotel_id,$image_id)
	{
		if(isset($_POST['delete']))
		{
			$data['change_images'] = $this->Hotelmodel->image($hotel_id,$image_id);
			$old_thumb_image1 = $data['change_images'][0]->thumb;
			$old_original_image1 = $data['change_images'][0]->image_url;
			
			unlink('../'.$old_original_image1);
			unlink('../'.$old_thumb_image1);
						
			$image_delete=$this->Hotelmodel->image_delete($image_id);
			$data['images'] = $this->Hotelmodel->select_images($hotel_id,$image_id);
			$last_id =  $data['images'][0]->id; 
			
			
			redirect('hotel/image_edit/'.$hotel_id.'/'.$last_id);
		}
		if(isset($_POST['submit']))
		{
			$data['change_images'] = $this->Hotelmodel->image($hotel_id,$image_id);
			$old_thumb_image = $data['change_images'][0]->thumb;
			$old_original_image = $data['change_images'][0]->image_url;
			
			
			 
			$actualpath			=	basename('hotel');
			$realpath			=	$actualpath."/slider/".$hotel_id;	
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($hotel_id));
					
			if (!$this->upload->do_upload('hotel_image'))
			{
					$upload_error['data'] = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error',$upload_error);
					redirect('hotel/image_edit/'.$hotel_id.'/'.$image_id);
								
			}
			else
			{  
					$upload_img_data = $this->upload->data();
					$config2 = array(
					'source_image' => $upload_img_data['full_path'], //get original image
					'new_image' => $upload_img_data['file_path'], //save as new image //need to create thumbs first
					'create_thumb' => true,
					'maintain_ratio' => true,
					'width' => 250,
					'height' => 200
					);
							
					$this->image_lib->initialize($config2); //load library
					$this->image_lib->resize();//generating thumb
								
					$data2['image_url']			=	$realpath."/".$upload_img_data['file_name'];
					$data2['thumb']				=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
								
					// $data2['original_image']			=	$realpath."/".underscore($upload_img_data['file_name']);
					// $data2['thumb_image']				=	$realpath."/".underscore($upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext']);			
// 					
			        $image_update=$this->Hotelmodel->image_update($image_id,$data2);
					if($image_update==1)
					{
						
						unlink('../'.$old_original_image);
						unlink('../'.$old_thumb_image);
						
						$this->session->set_flashdata('success','Updated successfully');
					}
					else
					{
						$this->session->set_flashdata('error','Some Problem affected, Please try agein');
					}
					
					redirect('hotel/image_edit/'.$hotel_id.'/'.$image_id);
			}
			
		}
		
		$data['images'] = $this->Hotelmodel->select_images($hotel_id,$image_id);
		$data['change_images'] = $this->Hotelmodel->image($hotel_id,$image_id);
		$this -> load -> view('hotel/image_update',$data);
	}

	public function delete($id,$cat)
	 {
	 	$rooms['room']=$this->Hotelmodel->getRooms($id);
		foreach($rooms['room'] as $roomid):
			
		$delet_rooms = $this->Hotelmodel->delete_room_facility($roomid->id);
		$dir='../room/slider/Room-'.$roomid->id;
		$this->recursiveRemoveDirectory($dir);
		
		endforeach;
		
		$delete=$this->Hotelmodel->delete($id);
	 	
	 	$dir='../hotel/slider/'.$id;
		$this->recursiveRemoveDirectory($dir);
		redirect('hotel/category/'.$cat);
			
	 }

	public function recursiveRemoveDirectory($directory)
	{
	    foreach(glob("{$directory}/*") as $file)
	    {
	        if(is_dir($file)) { 
	            recursiveRemoveDirectory($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($directory);
	}
	
	function delete_tax($id)
	{
$this->db->where('id', $id);
$this->db->delete('tbl_tax'); 
	}


}
