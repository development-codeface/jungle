<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomtype extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() 
	{
		parent::__construct();
		
		$this -> load -> library('pagination');
		$this->load->model('Roommodel');
		$this->load->model('Profilemodel');
		$this->load->library('image_lib');
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
			//echo (json_decode($data_menu['menu']));  exit;
		
		$config['base_url'] = site_url('roomtype/index');
		$config['total_rows'] = $this -> Roommodel -> row_count($id);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->Roommodel->alldetails($id,$config["per_page"], $data['page']);
		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('6', json_decode($data_menu['menu']))==1)
			{ $this->load->view('room/list',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('room/list',$data);	
		}
		$this->load->view('layout/footer');
		
	}
	public function add()
	{

			$msg='';
			
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
			$data['results'] = $this->Roommodel->allhotels($id);
			
		    if(isset($_POST['room_sub']))
			{

				$data_room['room_title'] = $this->input->post('room_title');
				$data_room['hotel_id'] = $this->input->post('room_hotel');
				$data_room['room_des'] = $this->input->post('room_des');
				$data_room['room_size'] = $this->input->post('room_size');
				$data_room['room_beds'] = $this->input->post('room_beds');
				$data_room['room_bed_size'] = $this->input->post('room_bed_size');
				// $data_room['room_price'] = $this->input->post('room_price');
				// $data_room['room_offer_price'] = $this->input->post('room_offer_price');
				//$data_room['room_tax'] = $this->input->post('room_tax');
				//$data_room['room_tax_des'] = $this->input->post('room_tax_des');
				$data_room['room_status'] = 1;
				
				//$exist = $this->Roommodel->exists_check($data_room);
				
				//if($exist > 0) {
		//$this->db->where('room_title', $data['room_title'])
		//->where('hotel_id', $data['hotel_id'])
		//->update('tbl_hotel_room',array('status' => 2));
		
		//$this->session->set_flashdata('success','Room '.$data['room_title'].' already exists, status enabled');
		//redirect('roomtype/add/');
		//		}

				$this->db->insert('tbl_hotel_room', $data_room); 
				$id = $this->db->insert_id();
				$actualpath			=	basename('room/slider/');
				$realpath			=	"room/".$actualpath."/Room-".$id;
				$data['folder_path']=	$realpath."/";	
				$this->load->library('upload');
				mkdir('../room/slider/Room-'.$id, 0777, true);
								
				$files = $_FILES; 
				$cpt = count(array_filter($_FILES['room_image']['name']));
				$keys = array_keys(array_filter($_FILES['room_image']['name']));
				for($i=0; $i<$cpt; $i++)
				{ 
				    $data2 = array();
					$j= $keys[$i];
					$_FILES['room_image']['name']		= $files['room_image']['name'][$j];
					$_FILES['room_image']['type']		= $files['room_image']['type'][$j];
					$_FILES['room_image']['tmp_name']	= $files['room_image']['tmp_name'][$j];
					$_FILES['room_image']['error']		= $files['room_image']['error'][$j];
					$_FILES['room_image']['size']		= $files['room_image']['size'][$j];
					$data2['image_url']					= $realpath."/".$_FILES['room_image']['name'];
					$data2['thumb']						= $realpath."/".$_FILES['room_image']['name'];
					$data2['status']					=	1;
					
					$this->upload->initialize($this->set_upload_options($id));
					
					if (!$this->upload->do_upload('room_image'))
					{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
					}
					else
					{
						$upload_img_data = $this->upload->data();
						$data2['image_url']			=	$realpath."/".$upload_img_data['file_name'];
						$data2['thumb']				=	$realpath."/".$upload_img_data['file_name'];
						$data2['room_id']			=	$id;
						$data2['status']			=	1;
						$this->db->insert('tbl_hotel_room_image', $data2); 
					}
				}


				
				$data_room_facilities['room_id'] = $id;
				$data_room_facilities['city_view'] = $this->input->post('room_city_view');
				$data_room_facilities['telephone'] = $this->input->post('room_tel');
				$data_room_facilities['satellite_channels'] = $this->input->post('room_sat_channels');
				$data_room_facilities['flat_screen_tv'] = $this->input->post('room_flat_screen_tv');
				$data_room_facilities['safety_deposit_box'] = $this->input->post('room_safety_deposit_box');
				$data_room_facilities['air_conditioning'] = $this->input->post('room_ac');
				$data_room_facilities['iron'] = $this->input->post('room_iron');
				$data_room_facilities['desk'] = $this->input->post('room_desk');
				$data_room_facilities['iron_facilities'] = $this->input->post('room_ironing_facilities');
				$data_room_facilities['heating'] = $this->input->post('room_heating');
				$data_room_facilities['carpeted'] = $this->input->post('room_carpeted');
				$data_room_facilities['interconnected_rooms'] = $this->input->post('room_interconnected_rooms');
				$data_room_facilities['private_entrance'] = $this->input->post('room_private_entrance');
				$data_room_facilities['sofa'] = $this->input->post('room_sofa');
				$data_room_facilities['soundproofing'] = $this->input->post('room_sound_proofing');
				$data_room_facilities['wardrobe_closet'] = $this->input->post('room_wardrobe_closet');
				$data_room_facilities['hypoallergenic'] = $this->input->post('room_hypoallergenic');
				$data_room_facilities['shower'] = $this->input->post('room_shower');
				$data_room_facilities['hairdryer'] = $this->input->post('room_hair_dryer');
				$data_room_facilities['free_toiletries'] = $this->input->post('room_free_toiletries');
				$data_room_facilities['toilet'] = $this->input->post('room_toilet');
				$data_room_facilities['bathroom'] = $this->input->post('room_bathroom');
				$data_room_facilities['minibar'] = $this->input->post('room_minibar');
				$data_room_facilities['electric_kettle'] = $this->input->post('room_electric_kettle');
				$data_room_facilities['wakeup_service'] = $this->input->post('room_wakeup_service');
				$data_room_facilities['towels'] = $this->input->post('room_towels');
				$data_room_facilities['free_wifi'] = $this->input->post('room_free_wifi');
				$data_room_facilities['breakfast'] = $this->input->post('breakfast'); 
				$this->db->insert('tbl_hotel_room_facilities', $data_room_facilities); 

				$this->session->set_flashdata('success','Rooms added successfully');
				redirect('roomtype/add/');
			
				
			}
		//$data['msg'] = $msg;

		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('5', json_decode($data_menu['menu']))==1)
			{ $this->load->view('room/add',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('room/add',$data);	
		}
		//$this->load->view('room/add', $data);
		$this->load->view('layout/footer');
		
	}

	public function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../room/slider/Room-'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //$config['max_size']      = '0';
	    //$config['overwrite']     = FALSE;
	     $config['encrypt_name'] = TRUE;

	    return $config;
	}

	public function edit($id)
	{
		
		 $username = $this->session->userdata['hotel_adminusername'];
			$u_id= $this->Profilemodel->get_id($username); 
			if($this->session->userdata['user_type']=='staff')
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$u_id); 
			}
			else
			{
				$data_menu['menu']='';
			}
			
		$data['result'] = $this->Roommodel->roomById($id);
		$data['result_images'] = $this->Roommodel->roomimagesById($id);
		$data['result_facilities'] = $this->Roommodel->roomfacilitiesById($id);

		
		
		$data['msg'] = '';

		if(isset($_POST['room_sub_edt']))
			{

				$data_room['room_title'] = $this->input->post('room_title');
				$data_room['room_des'] = $this->input->post('room_des');
				$data_room['room_size'] = $this->input->post('room_size');
				$data_room['room_beds'] = $this->input->post('room_beds');
				$data_room['room_bed_size'] = $this->input->post('room_bed_size');
				// $data_room['room_price'] = $this->input->post('room_price');
				// $data_room['room_offer_price'] = $this->input->post('room_offer_price');
				$data_room['room_tax'] = $this->input->post('room_tax');
				$data_room['room_tax_des'] = $this->input->post('room_tax_des');
				$data_room['room_status'] = 1;
				$data_room['id'] = $id;

				$res_room_update = $this->Roommodel->upd_room($data_room);
				if($res_room_update==1)
				{
					$actualpath			=	basename('room/slider/');
					$realpath			=	"room/".$actualpath."/Room-".$id;
					$data['folder_path']=	$realpath."/";	
					$this->load->library('upload');
					//mkdir('../room/slider/Room-'.$id, 0777, true);
					if(!empty($_FILES))
					{
						$files = $_FILES; 
						$cpt = count(array_filter($_FILES['room_image']['name']));
						$keys = array_keys(array_filter($_FILES['room_image']['name']));
						for($i=0; $i<$cpt; $i++)
						{ 
						    $data2 = array();
							$j= $keys[$i];
							$_FILES['room_image']['name']		= $files['room_image']['name'][$j];
							$_FILES['room_image']['type']		= $files['room_image']['type'][$j];
							$_FILES['room_image']['tmp_name']	= $files['room_image']['tmp_name'][$j];
							$_FILES['room_image']['error']		= $files['room_image']['error'][$j];
							$_FILES['room_image']['size']		= $files['room_image']['size'][$j];
							$data2['image_url']					= $realpath."/".$_FILES['room_image']['name'];
							$data2['thumb']						= $realpath."/".$_FILES['room_image']['name'];
							$data2['status']					=	1;
							
							$this->upload->initialize($this->set_upload_options($id));
							
							if (!$this->upload->do_upload('room_image'))
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
								$data2['thumb']				=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
								$data2['room_id']			=	$id;
								$data2['status']			=	1;
								$res_room_update = $this->db->insert('tbl_hotel_room_image', $data2); 
								//unlink($file_name);
							}
						}

					}

				
					
					
					$data_room_facilities['room_id'] = $id;
					$data_room_facilities['city_view'] = $this->input->post('room_city_view');
					$data_room_facilities['telephone'] = $this->input->post('room_tel');
					$data_room_facilities['satellite_channels'] = $this->input->post('room_sat_channels');
					$data_room_facilities['flat_screen_tv'] = $this->input->post('room_flat_screen_tv');
					$data_room_facilities['safety_deposit_box'] = $this->input->post('room_safety_deposit_box');
					$data_room_facilities['air_conditioning'] = $this->input->post('room_ac');
					$data_room_facilities['iron'] = $this->input->post('room_iron');
					$data_room_facilities['desk'] = $this->input->post('room_desk');
					$data_room_facilities['iron_facilities'] = $this->input->post('room_ironing_facilities');
					$data_room_facilities['heating'] = $this->input->post('room_heating');
					$data_room_facilities['carpeted'] = $this->input->post('room_carpeted');
					$data_room_facilities['interconnected_rooms'] = $this->input->post('room_interconnected_rooms');
					$data_room_facilities['private_entrance'] = $this->input->post('room_private_entrance');
					$data_room_facilities['sofa'] = $this->input->post('room_sofa');
					$data_room_facilities['soundproofing'] = $this->input->post('room_sound_proofing');
					$data_room_facilities['wardrobe_closet'] = $this->input->post('room_wardrobe_closet');
					$data_room_facilities['hypoallergenic'] = $this->input->post('room_hypoallergenic');
					$data_room_facilities['shower'] = $this->input->post('room_shower');
					$data_room_facilities['hairdryer'] = $this->input->post('room_hair_dryer');
					$data_room_facilities['free_toiletries'] = $this->input->post('room_free_toiletries');
					$data_room_facilities['toilet'] = $this->input->post('room_toilet');
					$data_room_facilities['bathroom'] = $this->input->post('room_bathroom');
					$data_room_facilities['minibar'] = $this->input->post('room_minibar');
					$data_room_facilities['electric_kettle'] = $this->input->post('room_electric_kettle');
					$data_room_facilities['wakeup_service'] = $this->input->post('room_wakeup_service');
					$data_room_facilities['towels'] = $this->input->post('room_towels');
					$data_room_facilities['free_wifi'] = $this->input->post('room_free_wifi');
					$data_room_facilities['breakfast'] = $this->input->post('breakfast'); 
					$data_room_facilities['room_id'] = $id;
					$res_room_facilities_update = $this->Roommodel->upd_room_facilities($data_room_facilities);

					$this->session->set_flashdata('success','Rooms updated successfully');
					redirect('roomtype/edit/'.$id);
				}
				else
				{
					$this->session->set_flashdata('error','You have made no changes');
					redirect('roomtype/edit/'.$id);

				}
				
			}
		


		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('7', json_decode($data_menu['menu']))==1)
			{ $this->load->view('room/edit',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('room/edit',$data);	
		}
	//	$this->load->view('room/edit',$data);
		$this->load->view('layout/footer');
	}





	public function image_edit($room_id,$image_id)
	{
		if(isset($_POST['delete']))
		{
			$data['change_images'] = $this->Roommodel->image($room_id,$image_id);
			$old_thumb_image1 = $data['change_images'][0]->thumb;
			$old_original_image1 = $data['change_images'][0]->image_url;
			
			unlink('../'.$old_original_image1);
			unlink('../'.$old_thumb_image1);
						
			$image_delete=$this->Roommodel->image_delete($image_id);
			$data['images'] = $this->Roommodel->select_images($room_id,$image_id);
			$last_id =  $data['images'][0]->id; 
			
			
			redirect('roomtype/image_edit/'.$room_id.'/'.$last_id);
		}
		if(isset($_POST['submit']))
		{
			$data['change_images'] = $this->Roommodel->image($room_id,$image_id);
			$old_thumb_image = $data['change_images'][0]->thumb;
			$old_original_image = $data['change_images'][0]->image_url;
			
			
			 
			$actualpath			=	basename('room/slider/');
			$realpath			=	'room/'.$actualpath."/Room-".$room_id;	
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($room_id));
					
			if (!$this->upload->do_upload('room_image'))
			{
					$upload_error['data'] = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error',$upload_error);
					redirect('roomtype/image_edit/'.$room_id.'/'.$image_id);
								
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
			        $image_update=$this->Roommodel->image_update($image_id,$data2);
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
					
					redirect('roomtype/image_edit/'.$room_id.'/'.$image_id);
			}
			
		}
		
		$data['images'] = $this->Roommodel->select_images($room_id);
		$data['change_images'] = $this->Roommodel->image($room_id,$image_id);
		$this -> load -> view('room/image_update',$data);
	}

	function delete($id)
	{
		
			$username = $this->session->userdata['hotel_adminusername'];
			$u_id= $this->Profilemodel->get_id($username); 
			if($this->session->userdata['user_type']=='staff')
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$u_id); 
			}
			else
			{
				$data_menu['menu']='';
			}
			
			
			if(!empty($data_menu['menu']))
			{	if(in_array('8', json_decode($data_menu['menu']))==1)
				{ 
				$this->Roommodel->delete($id);
				$dir='../room/slider/Room-'.$id;
				$this->recursiveRemoveDirectory($dir);
				redirect('roomtype');
				}
				else{ 
				$this->load->view('layout/header');
				$this->load->view('layout/no_permission');
				$this->load->view('layout/footer');}
			}
			else
			{ 
				$this->Roommodel->delete($id);
				$dir='../room/slider/Room-'.$id;
				$this->recursiveRemoveDirectory($dir);
				redirect('roomtype');
			}
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
	

}
