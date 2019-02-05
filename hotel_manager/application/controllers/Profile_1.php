<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
 {
		
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->model('Profilemodel');
		$this->load->library('image_lib');
		$this->load->model('Hotelmodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
		
	 }
	public function index()
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); 
			}
			else
			{
				$data_menu['menu']='';
			}
		
		
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
					
				$data_image['change_images'] = $this->Profilemodel->details($id);
				
				$old_logo_image =  $data_image['change_images']['hotel'][0]->logo_img;
				
				$this->upload->initialize($this->set_upload_options($id));
						
				if (!$this->upload->do_upload('logo'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
						redirect('profile');			
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
						$data2['thumb']			=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
						$data2['hotel_id']					=	$id;
						$this->db->insert('tbl_hotel_image', $data2); 
					}
				}
				}
					
			
				$tax_room = $this->input->post('tax_id');
				$tax_id  = $this->input->post('tax_id');
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
										
					if(!empty($tax_id[$j]))
					{
						$tax_room_id = $tax_room[$j];
						$this -> db -> where('id', $tax_room_id) -> update('tbl_tax', $tax);
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
				
				$this->session->set_flashdata('success','Updated Successfully');
				redirect('profile');
				
		}
		else
		{
			$data['result']= $this->Profilemodel->details($id);
			
			$data['Catagory'] = $this->Profilemodel->category($data['result']['hotel'][0]->category_id);
			$data['sub_catagory'] = $this->Profilemodel->sub_category($data['result']['hotel'][0]->sub_category_id);
			$data['country'] = $this->Profilemodel->country();
			$data['state'] = $this->Profilemodel->states();
			$data['groups'] = $this->Profilemodel->group_list();
			
			$this->load->view('layout/header');
			if(!empty($data_menu['menu']))
			{	if(in_array('1', json_decode($data_menu['menu']))==1)
				{ $this->load->view('profile/edit',$data); }
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ $this->load->view('profile/edit',$data);	
			}
			//$this->load->view('profile/edit',$data);
			$this->load->view('layout/footer');
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
	     $config['encrypt_name'] = TRUE;

	    return $config;
	}

	
	public function image_edit($hotel_id,$image_id)
	{
		if(isset($_POST['delete']))
		{
			$data['change_images'] = $this->Profilemodel->image($hotel_id,$image_id);
			$old_thumb_image1 = $data['change_images'][0]->thumb;
			$old_original_image1 = $data['change_images'][0]->image_url;
			
			unlink('../'.$old_original_image1);
			unlink('../'.$old_thumb_image1);
						
			$image_delete=$this->Profilemodel->image_delete($image_id);
			$data['images'] = $this->Profilemodel->select_images($hotel_id,$image_id);
			$last_id =  $data['images'][0]->id; 
			
			
			redirect('profile/image_edit/'.$hotel_id.'/'.$last_id);
		}
		if(isset($_POST['submit']))
		{
			$data['change_images'] = $this->Profilemodel->image($hotel_id,$image_id);
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
					redirect('profile/image_edit/'.$hotel_id.'/'.$image_id);
								
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
			        $image_update=$this->Profilemodel->image_update($image_id,$data2);
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
					
					redirect('profile/image_edit/'.$hotel_id.'/'.$image_id);
			}
			
		}
		
		$data['images'] = $this->Profilemodel->select_images($hotel_id,$image_id);
		$data['change_images'] = $this->Profilemodel->image($hotel_id,$image_id);
		$this -> load -> view('profile/image_update',$data);
	}


	function delete_tax($id)
	{
$this->db->where('id', $id);
$this->db->delete('tbl_tax'); 
	}	
}
