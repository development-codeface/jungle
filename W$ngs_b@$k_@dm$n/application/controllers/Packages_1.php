<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	function __construct() {
		umask(0);
		parent::__construct();
		$this->load->helper('inflector'); //underscore()
		$this -> load -> library('pagination');
		$this -> load -> model('PackageModel');
		$this->load->helper('string');
		$this->load->library('image_lib');
		if(!isset($this->session->userdata['adminusername']))
		{
				redirect('login');
		}
		
	}

	function index()
	{
		$this -> load -> view('layout/header');
		$this -> load -> view('packages/index');
		$this -> load -> view('layout/footer');
	}
	
	function packagelist()
	{
		$config['base_url'] = site_url('travels/index');
		$config['total_rows'] = $this -> db -> count_all('tbl_package');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		$data['results'] = $this -> PackageModel -> alldetails($config["per_page"], $data['page']);
		
		$this -> load -> view('layout/header');
		$this -> load -> view('packages/package_list', $data);
		$this -> load -> view('layout/footer');
	}
	
	
	function add()
	{
				if(isset($_POST['submit']))
				{
				$this->form_validation->set_rules('title', 'title', 'required');
				$this->form_validation->set_rules('description', 'description', 'required');
				$this->form_validation->set_rules('inclusion', 'inclusion', 'required');
				$this->form_validation->set_rules('exclusion', 'inclusion', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['validation']=validation_errors();
					
					$this -> load -> view('layout/header');
					$this -> load -> view('packages/add',$data);
					$this -> load -> view('layout/footer');
				}
				else 
				{		
						
			        $data1['title'] = $this->input->post('title');
					$data1['description'] = $this->input->post('description');
					$data1['nights'] = $this->input->post('nights');
					$data1['days'] = $this->input->post('days');
					$data1['inclusion'] = $this->input->post('inclusion');
					$data1['exclusion'] = $this->input->post('exclusion');
					$data1['date'] = date('Y-m-d');
					$data1['status'] = 1;
					
					$insert_query = $this->PackageModel->insert($data1);
					if($insert_query!=0)
					{
						//hotl charges
						$hotel_data1['package_id'] =$insert_query;
						$hotel_data1['off_seasonal_valid_from'] =$this->input->post('off_seasonal_valid_from');
						$hotel_data1['off_seasonal_valid_to'] = $this->input->post('off_seasonal_valid_to');
						$hotel_data1['off_seasonal_two_star'] = json_encode($this->input->post('off_seasonal_two_star'));
						$hotel_data1['off_seasonal_three_star'] = json_encode($this->input->post('off_seasonal_three_star'));
						$hotel_data1['off_seasonal_four_star'] = json_encode($this->input->post('off_seasonal_four_star'));
						$hotel_data1['off_seasonal_five_star'] = json_encode($this->input->post('off_seasonal_five_star'));
						
						$hotel_data1['off_seasonal_two_star_meals'] = json_encode($this->input->post('off_seasonal_two_star_meals'));
						$hotel_data1['off_seasonal_three_star_meals'] = json_encode($this->input->post('off_seasonal_three_star_meals'));
						$hotel_data1['off_seasonal_four_star_meals'] = json_encode($this->input->post('off_seasonal_four_star_meals'));
						$hotel_data1['off_seasonal_five_star_meals'] = json_encode($this->input->post('off_seasonal_five_star_meals'));
						
						$hotel_data1['seasonal_valid_from'] = $this->input->post('seasonal_valid_from');
						$hotel_data1['seasonal_valid_to'] = $this->input->post('seasonal_valid_to');
						$hotel_data1['seasonal_two_star'] = json_encode($this->input->post('seasonal_two_star'));
						$hotel_data1['seasonal_three_star'] = json_encode($this->input->post('seasonal_three_star'));
						$hotel_data1['seasonal_four_star'] = json_encode($this->input->post('seasonal_four_star'));
						$hotel_data1['seasonal_five_star'] = json_encode($this->input->post('seasonal_five_star'));
						
						$hotel_data1['seasonal_two_star_meals'] = json_encode($this->input->post('seasonal_two_star_meals'));
						$hotel_data1['seasonal_three_star_meals'] = json_encode($this->input->post('seasonal_three_star_meals'));
						$hotel_data1['seasonal_four_star_meals'] = json_encode($this->input->post('seasonal_four_star_meals'));
						$hotel_data1['seasonal_five_star_meals'] = json_encode($this->input->post('seasonal_five_star_meals'));
						
						$hotel_insert=$this->PackageModel->hotel_insert($hotel_data1);
						
						//itinerary details
						$day_data1['package_id'] =$insert_query;
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
							  
							  $itinerary_insert=$this->PackageModel->days_insert($day_data1);
						}
						
						//vehicle details
						$vehicle_data1['package_id'] =$insert_query;
						$vehicle = $this->input->post('vehicle');
						$capacity = $this->input->post('capacity');
						$vehicle_charge = $this->input->post('vehicle_charge');
						
						$vehicle_count = count(array_filter($vehicle));
						$vehicle_key = array_keys(array_filter($vehicle));
						
						if($vehicle_count<>0)
						{
							for($i=0; $i<$vehicle_count; $i++)
						    {
						    	  $j=$vehicle_key[$i];
								
						    	  $vehicle_data1['vehicle_name'] = $vehicle[$j];
						    	  $vehicle_data1['capacity'] = $capacity[$j];
								  $vehicle_data1['price'] =$vehicle_charge[$j];
								  
								  $vehicle_insert=$this->PackageModel->vehicle_insert($vehicle_data1);
							}
						}
						
						
						//image details
						$files = $_FILES;
					    $cpt = count(array_filter($_FILES['package_image']['name']));
						$keys = array_keys(array_filter($_FILES['package_image']['name']));
						
						if($cpt<>0)
						{
						$actualpath			=	basename('package_upload/');
						$realpath			=	$actualpath."/".$insert_query;	
						$this->load->library('upload');
						mkdir('../package_upload/'.$insert_query, 0777, true);
				
						
						 
						
						 for($i=0; $i<$cpt; $i++)
					     {
					     	 $data2 = array();
					    	 $j= $keys[$i];
							
							
					        $_FILES['package_image']['name']		= $files['package_image']['name'][$j];
					        $_FILES['package_image']['type']		= $files['package_image']['type'][$j];
					        $_FILES['package_image']['tmp_name']	= $files['package_image']['tmp_name'][$j];
					        $_FILES['package_image']['error']		= $files['package_image']['error'][$j];
					        $_FILES['package_image']['size']		= $files['package_image']['size'][$j];

					        $data2['original_image']			=	$realpath.'/'.underscore($_FILES['package_image']['name']);
					        $data2['thumb_image']				=	$realpath.'/'.underscore($_FILES['package_image']['name']);
					        $data2['package_id']				=	$insert_query;
							
							
					        $this->upload->initialize($this->set_upload_options($insert_query));
					
							if (!$this->upload->do_upload('package_image'))
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
								
								$data2['original_image']			=	$realpath."/".$upload_img_data['file_name'];
								$data2['thumb_image']				=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
								$data2['package_id']					=	$insert_query;
								$image_insert=$this->PackageModel->image_insert($data2);
							}
							
						 }
						 }
							
							
						
						 $this->session->set_flashdata('success','New Package created successfully');
					}
					else
					{
						$this->session->set_flashdata('error','Some Problem affected, Please try agein');
					}
					redirect('packages/add');
				
				}
				}
				else
				{
					$data['validation']='';
					
					$this -> load -> view('layout/header');
					$this -> load -> view('packages/add',$data);
					$this -> load -> view('layout/footer');
				}
	}
		
	function edit($id)
	{
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('inclusion', 'inclusion', 'required');
			$this->form_validation->set_rules('exclusion', 'inclusion', 'required');
				
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
					
				$this -> load -> view('layout/header');
				$this -> load -> view('packages/add',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{		
				$id = $this->input->post('id');	
			    $data1['title'] = $this->input->post('title');
				$data1['description'] = $this->input->post('description');
				$data1['nights'] = $this->input->post('nights');
				$data1['days'] = $this->input->post('days');
				$data1['inclusion'] = $this->input->post('inclusion');
				$data1['exclusion'] = $this->input->post('exclusion');
				
				$update_query = $this->PackageModel->package_update($id,$data1);
								
				$package_id =$id;
				$hotel_data1['off_seasonal_valid_from'] =$this->input->post('off_seasonal_valid_from');
				$hotel_data1['off_seasonal_valid_to'] = $this->input->post('off_seasonal_valid_to');
				$hotel_data1['off_seasonal_two_star'] = json_encode($this->input->post('off_seasonal_two_star'));
				$hotel_data1['off_seasonal_three_star'] = json_encode($this->input->post('off_seasonal_three_star'));
				$hotel_data1['off_seasonal_four_star'] = json_encode($this->input->post('off_seasonal_four_star'));
				$hotel_data1['off_seasonal_five_star'] = json_encode($this->input->post('off_seasonal_five_star'));
						
				$hotel_data1['off_seasonal_two_star_meals'] = json_encode($this->input->post('off_seasonal_two_star_meals'));
				$hotel_data1['off_seasonal_three_star_meals'] = json_encode($this->input->post('off_seasonal_three_star_meals'));
				$hotel_data1['off_seasonal_four_star_meals'] = json_encode($this->input->post('off_seasonal_four_star_meals'));
				$hotel_data1['off_seasonal_five_star_meals'] = json_encode($this->input->post('off_seasonal_five_star_meals'));
						
				$hotel_data1['seasonal_valid_from'] = $this->input->post('seasonal_valid_from');
				$hotel_data1['seasonal_valid_to'] = $this->input->post('seasonal_valid_to');
				$hotel_data1['seasonal_two_star'] = json_encode($this->input->post('seasonal_two_star'));
				$hotel_data1['seasonal_three_star'] = json_encode($this->input->post('seasonal_three_star'));
				$hotel_data1['seasonal_four_star'] = json_encode($this->input->post('seasonal_four_star'));
				$hotel_data1['seasonal_five_star'] = json_encode($this->input->post('seasonal_five_star'));
						
				$hotel_data1['seasonal_two_star_meals'] = json_encode($this->input->post('seasonal_two_star_meals'));
				$hotel_data1['seasonal_three_star_meals'] = json_encode($this->input->post('seasonal_three_star_meals'));
				$hotel_data1['seasonal_four_star_meals'] = json_encode($this->input->post('seasonal_four_star_meals'));
				$hotel_data1['seasonal_five_star_meals'] = json_encode($this->input->post('seasonal_five_star_meals'));
						
				$hotel_update=$this->PackageModel->hotel_update($package_id,$hotel_data1);
						 
				
				//itinerary details
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
						 $itinerary_update=$this->PackageModel->days_update($day_tbl_id,$day_data1);
						 
					  }
					  else
					  {
					  	$day_data1['package_id'] = $id;
						$itinerary_insert=$this->PackageModel->days_insert($day_data1);
					  }
					  
				}	
			    //vehicle details
				$vehicle_id = $this->input->post('vehicle_id');
				$vehicle = $this->input->post('vehicle');
				$capacity = $this->input->post('capacity');
				$vehicle_charge = $this->input->post('vehicle_charge');
					
				$vehicle_count = count(array_filter($vehicle));
				$vehicle_key = array_keys(array_filter($vehicle));
						
				if($vehicle_count<>0)
				{
					for($i=0; $i<$vehicle_count; $i++)
				    {
				    	  $j=$vehicle_key[$i];
				    	  $vehicle_data1['vehicle_name'] = $vehicle[$j];
				    	  $vehicle_data1['capacity'] = $capacity[$j];
						  $vehicle_data1['price'] =$vehicle_charge[$j];
							  
						 if(!empty($vehicle_id[$j]))
						 {
							 $vehicle_tbl_id = $vehicle_id[$j];
							 $vehicle_update=$this->PackageModel->vehicle_update($vehicle_tbl_id,$vehicle_data1);
						 }
						 else
						 {
						  	$vehicle_data1['package_id'] = $id;
							$vehicle_insert=$this->PackageModel->vehicle_insert($vehicle_data1);
						 }
						  
					}
				}	
				
				//image details
				$files = $_FILES;
				$cpt = count(array_filter($_FILES['package_image']['name']));
				$keys = array_keys(array_filter($_FILES['package_image']['name']));
						
				if($cpt<>0)
				{
						$actualpath			=	basename('package_upload/');
						$realpath			=	$actualpath."/".$id;	
						$this->load->library('upload');
						
						 if(!file_exists('../'.$realpath))
						 {
							mkdir('../package_upload/'.$id, 0777, true);
						 }
						
						 for($i=0; $i<$cpt; $i++)
					     {
					     	 $data2 = array();
					    	 $j= $keys[$i];
							
					        $_FILES['package_image']['name']		= $files['package_image']['name'][$j];
					        $_FILES['package_image']['type']		= $files['package_image']['type'][$j];
					        $_FILES['package_image']['tmp_name']	= $files['package_image']['tmp_name'][$j];
					        $_FILES['package_image']['error']		= $files['package_image']['error'][$j];
					        $_FILES['package_image']['size']		= $files['package_image']['size'][$j];

					        $data2['original_image']			=	$realpath.'/'.underscore($_FILES['package_image']['name']);
					        $data2['thumb_image']				=	$realpath.'/'.underscore($_FILES['package_image']['name']);
					        $data2['package_id']				=	$id;
							
					        $this->upload->initialize($this->set_upload_options($id));
					
							if (!$this->upload->do_upload('package_image'))
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
								
								$data2['original_image']			=	$realpath."/".$upload_img_data['file_name'];
								$data2['thumb_image']				=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
								$data2['package_id']					=	$id;
								$image_insert=$this->PackageModel->image_insert($data2);
							}
							
						 }
				}
		
				
				// if($update_query==1 || $vehicle_update==1 || $itinerary_update==1)
				// {
					$this->session->set_flashdata('success','Updated successfully');
					
				// }
				// else
				// {
					// $this->session->set_flashdata('error','Some Problem affected, Please try agein');
				// }
				redirect('packages/edit/'.$id);
			}
					
		}
		else
		{
			$data['result'] = $this->PackageModel->edit($id);
			
			$this -> load -> view('layout/header');
			$this -> load -> view('packages/edit',$data);
			$this -> load -> view('layout/footer');
		}

	}

	public function image_edit($package_id,$image_id)
	{
		if(isset($_POST['delete']))
		{
			$data['change_images'] = $this->PackageModel->image($package_id,$image_id);
			$old_thumb_image1 = $data['change_images'][0]->thumb_image;
			$old_original_image1 = $data['change_images'][0]->original_image;
			
			unlink('../'.$old_original_image1);
			unlink('../'.$old_thumb_image1);
						
			$image_delete=$this->PackageModel->image_delete($image_id);
			$data['images'] = $this->PackageModel->select_images($package_id,$image_id);
			$last_id =  $data['images'][0]->id; 
			
			redirect('packages/image_edit/'.$package_id.'/'.$last_id);
		}
		if(isset($_POST['submit']))
		{
			$data['change_images'] = $this->PackageModel->image($package_id,$image_id);
			$old_thumb_image = $data['change_images'][0]->thumb_image;
			$old_original_image = $data['change_images'][0]->original_image;
			
			$actualpath			=	basename('package_upload/');
			$realpath			=	$actualpath."/".$package_id;	
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($package_id));
					
			if (!$this->upload->do_upload('package_image'))
			{
					$upload_error['data'] = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error',$upload_error);
					redirect('packages/image_edit/'.$package_id.'/'.$image_id);
								
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
								
					$data2['original_image']			=	$realpath."/".$upload_img_data['file_name'];
					$data2['thumb_image']				=	$realpath."/".$upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext'];
								
					// $data2['original_image']			=	$realpath."/".underscore($upload_img_data['file_name']);
					// $data2['thumb_image']				=	$realpath."/".underscore($upload_img_data['raw_name'].'_thumb'.$upload_img_data['file_ext']);			
// 					
			        $image_update=$this->PackageModel->image_update($image_id,$data2);
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
					redirect('packages/image_edit/'.$package_id.'/'.$image_id);
			}
		}
		
		$data['images'] = $this->PackageModel->select_images($package_id,$image_id);
		$data['change_images'] = $this->PackageModel->image($package_id,$image_id);
		$this -> load -> view('packages/image_update',$data);
	}

	public function delete($id)
	 {
		$delete=$this->PackageModel->delete($id);
	 	$dir='../package_upload/'.$id;
		$this->recursiveRemoveDirectory($dir);
		redirect('packages/packagelist');
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
	
	
	public function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = '../package_upload/'.$id;
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    //$config['max_size']      = '0';
	    //$config['overwrite']     = FALSE;
 		$config['encrypt_name'] = TRUE;
	    return $config;
	}
	
	public function view($id)
	 {
		$data['result'] = $this->PackageModel->edit($id);
		$this -> load -> view('layout/header');
		$this -> load -> view('packages/view',$data);
		$this -> load -> view('layout/footer');
	 }
	 
	function booking()
	{
		$config['base_url'] = site_url('packages/booking');
		$config['total_rows'] = $this -> db -> count_all('tbl_package_booking');
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->PackageModel->booking($config["per_page"],$data['page']);
		
		$this -> load -> view('layout/header');
		$this -> load -> view('packages/booking',$data);
		$this -> load -> view('layout/footer');
	}
	
	
	function booking_detail($id)
	{
		$data['result'] = $this->PackageModel->booking_detail($id);
		
		
		$this -> load -> view('layout/header');
		$this -> load -> view('packages/booking_detail',$data);
		$this -> load -> view('layout/footer');
	}
	
	
}
?>