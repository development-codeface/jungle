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
	 
	 function list_ayurveda()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('ayurveda/list_ayurveda');
		$config['total_rows'] = $this -> Ayurveda_model -> row_count('ayurveda',$id);
		//$config['total_rows'] = $this -> db -> count_all('tbl_ayurveda');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Ayurveda_model -> all_ayurveda($id,$config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('18', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('ayurveda/ayurveda_list', $data);}
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('ayurveda/ayurveda_list', $data);
		}
		
		//$this -> load -> view('ayurveda/ayurveda_list', $data);
		$this -> load -> view('layout/footer');
	 }
	 
	 
	 function list_yoga()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$config['base_url'] = site_url('ayurveda/list_yoga');
		$config['total_rows'] = $this -> Ayurveda_model -> row_count('yoga',$id); 
		//$config['total_rows'] = $this -> db -> count_all('tbl_ayurveda');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> Ayurveda_model -> all_yoga($id,$config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('18', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('ayurveda/yoga_list', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('ayurveda/yoga_list', $data);
		}
		//$this -> load -> view('ayurveda/yoga_list', $data);
		$this -> load -> view('layout/footer');
	 }
	 
	 
	 function add($category)
	 {
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		//$data['hotel'] = $this -> Ayurveda_model -> all_hotels();
		$data['hotel'] = $this->Roommodel->allhotels($id);
		
		//print_r();
		$data['sub_category'] = $this -> Ayurveda_model -> sub_category($category);
		
	 	if(isset($_POST['submit']))
	 	{
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
				
				$cpt = count(array_filter($_FILES['image']['name']));
				if(!empty($cpt)) {
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
			if(!empty($data_menu['menu']))
		{	if(in_array('17', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('ayurveda/add', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('ayurveda/add', $data);
		}
			//$this -> load -> view('ayurveda/add', $data);
			$this -> load -> view('layout/footer');
		}
	 }


	function edit($id,$category)
	{
		
		$username = $this->session->userdata['hotel_adminusername'];
		$hotel_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$hotel_id); }
		else{ $data_menu['menu']=''; }
		
		
		//$data['hotel'] = $this -> Ayurveda_model -> all_hotels();
		$data['hotel'] = $this->Roommodel->allhotels($hotel_id);
		
		$data['sub_category'] = $this -> Ayurveda_model -> sub_category($category);
		
		if(isset($_POST['submit']))
		{
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
			if(!empty($data_menu['menu']))
			{	if(in_array('19', json_decode($data_menu['menu']))==1)
				{ $this -> load -> view('ayurveda/edit', $data); }
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ $this -> load -> view('ayurveda/edit', $data);
			}
			//$this -> load -> view('ayurveda/edit', $data);
			$this -> load -> view('layout/footer');
		}
	}


	function delete($id)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$hotel_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$hotel_id); }
		else{ $data_menu['menu']=''; }
		
		
			if(!empty($data_menu['menu']))
			{	if(in_array('20', json_decode($data_menu['menu']))==1)
				{ 
					
					//$this->db->delete('tbl_ayurveda', array('id' => $id)); 
	 	//$this->db->delete('tbl_ayurveda_days', array('ayurveda_id' => $id));
	 	
	 	$this->db->where('id', $id)->update('tbl_ayurveda', array('status' => 0));
	 	$dir='../ayurveda/package-'.$id;
		$this->recursiveRemoveDirectory($dir);
		redirect($_SERVER['HTTP_REFERER']);
				}
				else{ 
				$this -> load -> view('layout/header');
				$this->load->view('layout/no_permission');}
				$this -> load -> view('layout/footer');
			}
			else
			{ 
			$this->db->where('id', $id)->update('tbl_ayurveda', array('status' => 0));
		//$this->db->delete('tbl_ayurveda', array('id' => $id)); 
	 	//$this->db->delete('tbl_ayurveda_days', array('ayurveda_id' => $id));
	 	$dir='../ayurveda/package-'.$id;
		$this->recursiveRemoveDirectory($dir);
		redirect($_SERVER['HTTP_REFERER']);
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
	
	

	function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../ayurveda/package-'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['encrypt_name']    = TRUE;

	    return $config;
	}
	
	function room_setting($category)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		$cat_id = $this->Ayurveda_model->sub_category($category);
		
		$config['base_url'] = site_url('ayurveda/room_setting/'.$category);
		$config['total_rows'] = $this -> Ayurveda_model -> rooms_row_count($cat_id[0]->id,$h_id); 
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->Ayurveda_model->room_setting_list($cat_id[0]->id,$h_id,$config["per_page"], $data['page']);
		
		$this->load->view('layout/header');
		if(!empty($data_menu['menu']))
			{	if(in_array('22', json_decode($data_menu['menu']))==1)
				{ 	$this->load->view('ayurveda_room_setting/list',$data);}
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ 	$this->load->view('ayurveda_room_setting/list',$data);
			}
			
	//	$this->load->view('ayurveda_room_setting/list',$data);
		$this->load->view('layout/footer');
		
	
	}
	
	function add_room($category)
	{
		
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		
		$category			= $this->uri->segment(3);
		$username			= $this->session->userdata['hotel_adminusername'];
		$data['id']			= $this->Profilemodel->get_id($username);
		$data['rooms']		= $this->Ayurveda_model->allRooms($data['id']);
		$data['packages']	= $this->Ayurveda_model->get_package_list($category, $data['id']);
		
			if(isset($_POST['room_submit']))
			{
			$this -> form_validation -> set_rules('room_attached', 'Room type', 'trim|required');
			$this -> form_validation -> set_rules('package', 'Package', 'trim|required');
			$this -> form_validation -> set_rules('room_price', 'Room price', 'trim|required');
			//$this -> form_validation -> set_rules('valid_from', 'Valid from date', 'trim|required');
			//$this -> form_validation -> set_rules('validity', 'Valid to date', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<label class="err">', '</label>');
			
			if ($this->form_validation->run() == TRUE) {	
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_attached');
				$data_room['ayurveda_id'] 		= $this->input->post('package');
				$data_room['price'] 			= $this->input->post('room_price');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['services'] 		= $this->input->post('services');
				$data_room['normal_allowed_adults'] = $this->input->post('allowed_adult');
				$data_room['normal_allowed_kids'] 	= $this->input->post('allowed_kid');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');

				$a=0;
				$from = $this->input->post('validity_from');
				foreach($from as $fm) {
				$valid_from[$a] 		= date_format(date_create_from_format('d-m-Y', $fm), 'Y-m-d');
				$a++;
				}
				
				$a=0;
				$to = $this->input->post('validity');
				foreach($to as $t) {
				$valid_upto[$a] 		= date_format(date_create_from_format('d-m-Y', $t), 'Y-m-d');
				$a++;
				}				

				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit');
				$data_room['no_of_bed'] 	= $this->input->post('no_of_bed');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['available_status'] 	= 1;
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				
				foreach (array_combine($valid_from, $valid_upto) as $from => $to) {
				if(!empty($from) && !empty($to)) {
				$data_room['valid_from'] = $from;
				$data_room['valid_upto'] = $to;
				
				$affect = $this->db->insert('tbl_ayurveda_rooms', $data_room);
				}
				}
				
				if($affect > 0)
				{
				//// hotelmanager_log ////
				$check = $this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('DATE(date)', date('Y-m-d'))
				-> get('tbl_hotelmanager_log')
				-> row();
				
				if(count($check) == 0) {
				$data2['hotel_id'] = $data_room['hotel_id'];
				$data2['login_status'] = 0;
				$data2['room_set_status'] = 1;
				$data2['booking_status'] = 0;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db -> insert('tbl_hotelmanager_log',$data2);
				} else {
				$data2['room_set_status'] = $check -> room_set_status + 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('date', $check -> date)
				-> update('tbl_hotelmanager_log',$data2);
				}
				//// hotelmanager_log ////
				
					$this->session->set_flashdata('success','Rooms Combination added successfully');
					redirect('ayurveda/add_room/'.$category);
				}
			} else {
					$this->session->set_flashdata('error','Error : Please try again');
					redirect('ayurveda/add_room/'.$category);
				}
			}
		
		$this->load->view('layout/header');
		
		if(!empty($data_menu['menu']))
			{	if(in_array('21', json_decode($data_menu['menu']))==1)
				{ 			$this->load->view('ayurveda_room_setting/add',$data);}
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ 			$this->load->view('ayurveda_room_setting/add',$data);
			}
			
//		$this->load->view('ayurveda_room_setting/add',$data);
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
		
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
		
		$category			= $this->uri->segment(4);
		$username			= $this->session->userdata['hotel_adminusername'];
		$data['id']			= $this->Profilemodel->get_id($username);
		$data['rooms']		= $this->Ayurveda_model->allRooms($data['id']);
		$data['package'] 	= $this->Ayurveda_model->get_package_list($category, $data['id']);
		
		$data['result'] = $this->Ayurveda_model->roomsettings_ById($id);
		//$data['hotel'] = $this -> Ayurveda_model -> ayurveda_hotel($category);
		
		if(isset($_POST['room_settings_submit']))
			{
				$id								= $this->input->post('pack_id');
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_id'); 
				$data_room['ayurveda_id'] 		= $this->input->post('package');
				$data_room['price'] 		= $this->input->post('room_price');
				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['services'] 		= $this->input->post('services');
				$data_room['normal_allowed_adults'] = $this->input->post('allowed_adult');
				$data_room['normal_allowed_kids'] 	= $this->input->post('allowed_kid');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['valid_from'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('valid_from')), 'Y-m-d');
				$data_room['valid_upto'] 		= date_format(date_create_from_format('d-m-Y', $this->input->post('validity')), 'Y-m-d');
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['no_of_bed'] 	= $this->input->post('no_of_bed');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				

				$res_room_update = $this->Ayurveda_model->update_room($id,$data_room);
				
				//// hotelmanager_log ////
				$check = $this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('DATE(date)', date('Y-m-d'))
				-> get('tbl_hotelmanager_log')
				-> row();
				
				if(count($check) == 0) {
				$data2['hotel_id'] = $data_room['hotel_id'];
				$data2['login_status'] = 0;
				$data2['room_set_status'] = 1;
				$data2['booking_status'] = 0;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db -> insert('tbl_hotelmanager_log',$data2);
				} else {
				$data2['room_set_status'] = $check -> room_set_status + 1;
				$data2['date'] = date("Y-m-d H:i:s");
				
				$this -> db
				-> where('hotel_id', $data_room['hotel_id'])
				-> where('date', $check -> date)
				-> update('tbl_hotelmanager_log',$data2);
				}
				//// hotelmanager_log ////
				
				$this->session->set_flashdata('success','Rooms combination updated successfully');
				redirect('ayurveda/room_edit/'.$id.'/'.$category);			
			}

		
		$this->load->view('layout/header');
			if(!empty($data_menu['menu']))
			{	if(in_array('23', json_decode($data_menu['menu']))==1)
				{ 		$this->load->view('ayurveda_room_setting/edit',$data);}
				else{ $this->load->view('layout/no_permission');}
			}
			else
			{ 			$this->load->view('ayurveda_room_setting/edit',$data);
			}
			
		//$this->load->view('ayurveda_room_setting/edit',$data);
		$this->load->view('layout/footer');
		
	} 
	
	function room_delete($id,$category)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$h_id= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$h_id); }
		else{ $data_menu['menu']=''; }
			if(!empty($data_menu['menu']))
			{	if(in_array('24', json_decode($data_menu['menu']))==1)
				{ 	//$this->db->delete('tbl_ayurveda_rooms', array('id' => $id)); 
				$this->db->where('id', $id)->update('tbl_ayurveda_rooms', array('available_status' => 0));
		redirect('ayurveda/room_setting/'.$category);}
				else{ 	$this->load->view('layout/header');
				$this->load->view('layout/no_permission');
					$this->load->view('layout/footer');}
			}
			else
			{ 		//$this->db->delete('tbl_ayurveda_rooms', array('id' => $id)); 
			$this->db->where('id', $id)->update('tbl_ayurveda_rooms', array('available_status' => 0));
		redirect('ayurveda/room_setting/'.$category);
			}
		
	}
	
	
}
?>