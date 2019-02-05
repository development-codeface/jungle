<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayurveda extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this -> load -> model('Ayurveda_model');
		$this->load->model('Roommodel');
		$this->load->model('Profilemodel');
		$this -> load -> library('image_lib');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	}

	 function index()
	 {
	 	
	 	$this -> load -> view('layout/header');
		$this -> load -> view('ayurveda/index');
		$this -> load -> view('layout/footer');
		
	 }
	 
	 function list_ayurveda()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$config['base_url'] = site_url('ayurveda/list_ayurveda');
		$config['total_rows'] = $this -> Ayurveda_model -> row_count('ayurveda',$id);
		//$config['total_rows'] = $this -> db -> count_all('tbl_ayurveda');
		$config['per_page'] = "2";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Ayurveda_model -> all_ayurveda($id,$config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('ayurveda/ayurveda_list', $data);
		$this -> load -> view('layout/footer');
	 }
	 
	 
	 function list_yoga()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		
		$config['base_url'] = site_url('ayurveda/list_yoga');
		$config['total_rows'] = $this -> Ayurveda_model -> row_count('yoga',$id); 
		//$config['total_rows'] = $this -> db -> count_all('tbl_ayurveda');
		$config['per_page'] = "1";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Ayurveda_model -> all_yoga($id,$config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('ayurveda/yoga_list', $data);
		$this -> load -> view('layout/footer');
	 }
	 
	 
	 function add($category)
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		//$data['hotel'] = $this -> Ayurveda_model -> all_hotels();
		$data['hotel'] = $this->Roommodel->allhotels($id);
		
		//print_r();
		$data['sub_category'] = $this -> Ayurveda_model -> sub_category($category);
		
	 	if(isset($_POST['submit']))
	 	{
	 		$this->form_validation->set_rules('hotel', 'hotel', 'required');
	 		$this->form_validation->set_rules('category', 'category', 'required');
	 		$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('days', 'days', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['hotel'] = $this->Roommodel->allhotels($id);
				
				//$data['sub_category'] = $this -> Ayurveda_model -> sub_category();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('ayurveda/add', $data);
				$this -> load -> view('layout/footer');
			}
			else {
				$data1['hotel_id'] = $this->input->post('hotel');
				$data1['category'] = $this->input->post('category');
				$data1['title'] = $this->input->post('title');
				$data1['description'] = $this->input->post('description');
				$data1['days'] = $this->input->post('days');
				$data1['status'] = 1;
				
				$id = $this -> Ayurveda_model -> ins_package($data1);
				
				$realpath			=	"ayurveda/package-".$id;
				$data['folder_path']=	$realpath."/";
				
				$this->load->library('upload');
				mkdir('../ayurveda/package-'.$id, 0777, true);
				
					$this->upload->initialize($this->set_upload_options($id));
					
					if (!$this->upload->do_upload('image'))
					{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
					}
					else
					{
						$upload_img_data = $this->upload->data();
						$data2['image']			=	$realpath."/".$upload_img_data['file_name'];
						$data2['thumb_image'] = $realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
						
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
							
							$this -> Ayurveda_model -> update_image($id, $data2);
					}
					
						$day_data1['ayurveda_id'] =$id;
						$days = $this->input->post('package_day');
						$day_title = $this->input->post('day_title');
						$day_description = $this->input->post('day_description');
						
						$day_count = count(array_filter($days));
						$day_key = array_keys(array_filter($days));
						
						for($i=0; $i<$day_count; $i++)
					    {
					    	 $j=$day_key[$i];
							
					    	  $day_data1['day'] = $days[$j];
					    	  $day_data1['title'] = $day_title[$j];
							  $day_data1['description'] =$day_description[$j];
							  
							  $this->Ayurveda_model->days_insert($day_data1);
						}
						
						$this->session->set_flashdata('success','New Package created successfully');
						
						redirect('ayurveda/add/'.$category);
			}
	 	}
	 	else
	 	{
	 		$this -> load -> view('layout/header');
			$this -> load -> view('ayurveda/add', $data);
			$this -> load -> view('layout/footer');
		}
	 }


	function edit($id,$category)
	{
		
		$username = $this->session->userdata['hotel_adminusername'];
		$hotel_id= $this->Profilemodel->get_id($username); 
		
		//$data['hotel'] = $this -> Ayurveda_model -> all_hotels();
		$data['hotel'] = $this->Roommodel->allhotels($hotel_id);
		
		$data['sub_category'] = $this -> Ayurveda_model -> sub_category($category);
		
		if(isset($_POST['submit']))
		{
	 		$this->form_validation->set_rules('hotel', 'hotel', 'required');
	 		$this->form_validation->set_rules('category', 'category', 'required');
	 		$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('days', 'days', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['hotel'] = $this->Roommodel->allhotels($hotel_id);
				
				//$data['sub_category'] = $this -> Ayurveda_model -> sub_category();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('ayurveda/add', $data);
				$this -> load -> view('layout/footer');
			}
			else {
				$data1['hotel_id'] = $this->input->post('hotel');
				$data1['category'] = $this->input->post('category');
				$data1['title'] = $this->input->post('title');
				$data1['description'] = $this->input->post('description');
				$data1['days'] = $this->input->post('days');
				$data1['status'] = 1;
				
				$this -> Ayurveda_model -> ayurveda_update($id, $data1);
				
				if(!empty($_FILES['image']['name']))
				{
					$realpath			=	"ayurveda/package-".$id;
					$this->load->library('upload');
					
						 if(!file_exists('../'.$realpath))
						 {
							mkdir('../package_upload/'.$id, 0777, true);
						 }
					
					$this->upload->initialize($this->set_upload_options($id));
					
					if (!$this->upload->do_upload('image'))
					{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
					}
					else
					{
						$upload_img_data = $this->upload->data();
						$data2['image']			=	$realpath."/".$upload_img_data['file_name'];
						$data2['thumb_image'] = $realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
						
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
							
							$img = $this -> Ayurveda_model -> get_images($id);
							
							//if(file_exists('../'.$img -> image && '../'.$img -> thumb_image ))
							//{
								unlink('../'.$img -> image);
								unlink('../'.$img -> thumb_image);
							//}
							
							$this -> Ayurveda_model -> update_image($id, $data2);
					}
				}
				
				$day_id = $this->input->post('day_id');
				$days = $this->input->post('package_day');
				$day_title = $this->input->post('day_title');
				$day_description = $this->input->post('day_description');
						
				$day_count = count(array_filter($days));
				$day_key = array_keys(array_filter($days));
						
				for($i=0; $i<$day_count; $i++)
				{
				   	  $j=$day_key[$i];
					  
					  $day_data1['day'] = $days[$j];
				   	  $day_data1['title'] = $day_title[$j];
					  $day_data1['description'] =$day_description[$j];
					  
					  if(!empty($day_id[$j]))
					  {
						 $day_tbl_id = $day_id[$j];
						 $itinerary_update=$this->Ayurveda_model->days_update($day_tbl_id,$day_data1);
						 
					  }
					  else
					  {
					  	$day_data1['ayurveda_id'] = $id;
						$itinerary_insert=$this->Ayurveda_model->days_insert($day_data1);
					  }
					  
				}

			}

						$this->session->set_flashdata('success','Details updated successfully');
						$cat = $this->uri->segment(1);
						
						redirect('ayurveda/edit/'.$id.'/'.$category);
		}
		else {
			$data['tbl_ayurveda'] = $this -> Ayurveda_model -> tbl_ayurveda($id);
			$this -> load -> view('layout/header');
			$this -> load -> view('ayurveda/edit', $data);
			$this -> load -> view('layout/footer');
		}
	}


	function delete($id)
	{
		$this->db->delete('tbl_ayurveda', array('id' => $id)); 
	 	$this->db->delete('tbl_ayurveda_days', array('ayurveda_id' => $id));
		
	 	$dir='../ayurveda/package-'.$id;
		$this->recursiveRemoveDirectory($dir);
		redirect($_SERVER['HTTP_REFERER']);
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
	
	

	function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../ayurveda/package-'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';

	    return $config;
	}
	
	function room_setting($category)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		
		$cat_id = $this->Ayurveda_model->sub_category($category);
		
		$config['base_url'] = site_url('ayurveda/room_setting/'.$category);
		$config['total_rows'] = $this -> Ayurveda_model -> rooms_row_count($cat_id[0]->id,$h_id); 
		$config['per_page'] = "1";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->Ayurveda_model->room_setting_list($cat_id[0]->id,$h_id,$config["per_page"], $data['page']);
		
		$this->load->view('layout/header');
		$this->load->view('ayurveda_room_setting/list',$data);
		$this->load->view('layout/footer');
		
	
	}
	
	function add_room($category)
	{
			if(isset($_POST['room_submit']))
			{
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_attached');
				$data_room['ayurveda_id'] 			= $this->input->post('package');
				$data_room['price'] 			= $this->input->post('room_price');
				$data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['valid_from'] 		= $this->input->post('validity_from');				
				$data_room['valid_upto'] 		= $this->input->post('validity');
				$data_room['num_rooms'] 		= $this->input->post('num_rooms');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['available_status'] 	= 1;
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				if($this->db->insert('tbl_ayurveda_rooms', $data_room))
				{
					$this->session->set_flashdata('success','Rooms Combination added successfully');
					redirect('ayurveda/add_room/'.$category);
				}
			}	
		
		$data['hotel'] = $this -> Ayurveda_model -> ayurveda_hotel($category);
		
		$this->load->view('layout/header');
		$this->load->view('ayurveda_room_setting/add',$data);
		$this->load->view('layout/footer');
	}


	function get_package($hotle_id,$category)
	{
		$data=$this->Ayurveda_model->get_package($hotle_id,$category);
		
		if(!empty($data))
		  	{
				echo '<div class="form-group row">
						<label class="col-lg-4">Package</label>
						<select class="col-lg-8 form-control beds" name="package" id="package">
					  	<option value="0">--Select--</option>';
						foreach($data as $type)
						{
							echo '<option value="'.$type->id.'">'.$type->title.'</option>';	  
						}
						  echo '</select>
						  		</div>';
	  		}

	}
	
	function room_edit($id,$category)
	{
		$data['result'] = $this->Ayurveda_model->roomsettings_ById($id);
		$data['hotel'] = $this -> Ayurveda_model -> ayurveda_hotel($category);
		$data['allRooms'] 	= $this->Ayurveda_model->allRooms($data['result']->hotel_id);
		$data['package'] 	= $this->Ayurveda_model->get_package_list($category);
		
		if(isset($_POST['room_settings_submit']))
			{

				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_id'); 
				$data_room['ayurveda_id'] 		= $this->input->post('package');
				$data_room['price'] 		= $this->input->post('room_price');
				$data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				$data_room['num_rooms'] 		= $this->input->post('num_rooms');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['valid_from'] 		= $this->input->post('valid_from');
				$data_room['valid_upto'] 		= $this->input->post('validity');
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				

				$res_room_update = $this->Ayurveda_model->update_room($id,$data_room);
				
				$this->session->set_flashdata('success','Rooms combination updated successfully');
				redirect('ayurveda/room_edit/'.$id.'/'.$category);			
			}

		
		$this->load->view('layout/header');
		$this->load->view('ayurveda_room_setting/edit',$data);
		$this->load->view('layout/footer');
		
	} 
	
	function room_delete($id,$category)
	{
		$this->db->delete('tbl_ayurveda_rooms', array('id' => $id)); 
		redirect('ayurveda/room_setting/'.$category);
	}
	
	
}
?>