<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper(array('form', 'url'));
			$this->load->model('Home_model');
			$this->load->library('image_lib');
			$this->load->library('session');
		
	 }
	 
	public function index()
	{
		
		$this->load->view('about/about');
	}
	
	public function property()
	{
		$data['country'] = $this->Home_model->country();
		$data['state'] = $this->Home_model->states();
		
		
		
		if(isset($_POST['submit']))
			{
			//	$data1['title'] = $this->input->post('title');
				$data1['star_rating'] = $this->input->post('star_rating');
				$data1['address'] = $this->input->post('address');
				$data1['des'] = $this->input->post('desc');
				$data1['place'] = $this->input->post('place');
				$data1['state'] = $this->input->post('state');
				$data1['country'] = $this->input->post('country');
				$data1['facebook_link'] = '';
				$data1['phone'] = $this->input->post('phone');
				$data1['mail'] = $this->input->post('mailid');
				$data1['status'] = 0;
				
				
				$data1['category_id'] = $this->input->post('category');
				$data1['sub_category_id'] = $this->input->post('sub_category');
				$this->db->insert('tbl_hotel', $data1); 
				$id = $this->db->insert_id();
				$actualpath			=	basename('hotel/slider/');
				$realpath			=	"hotel/".$actualpath."/".$id;
				$data['folder_path']=	$realpath."/";	
				$this->load->library('upload');
				mkdir('hotel/slider/'.$id, 0777, true);
				
				
				$data5['logo_img'] = $realpath."/".$_FILES['logo_img']['name'];
				$this->Home_model->logo($data5, $id);
				
				$this->upload->initialize($this->set_upload_options($id));
				if(!$this->upload->do_upload('logo_img'))
				{
						$upload_error['data'] = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error',$upload_error);
				}
				
				$data2['access_url']=base_url()."hotel/access_details/".$id;
				$data2['username']=$data1['title']."_".$id;
				$data2['password']=md5($data1['title']."_pw_".$id);
				$data2['status'] = 0;
				$data2['hotel_id'] = $id;
				
				/* $to = $data1['mail'];
				$subject = 'Welcome to Booking Chair';
				$message = 'Hi,<br/><br/>
				Welcome to Booking Chair!, Please use the login details given below<br/><br/>
				Username : '.$data2['username'].'<br/>
				Password : '.$data2['password'].'<br/><br/>
				Save this e-mail for future reference. <br/><br/>
				Thank you for using our service.';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: Booking Chair <info@crantia.com>' . "\r\n";	
				mail($to, $subject, $message, $headers); */
				
				$this->db->insert('tbl_hotel_manager', $data2); 
				
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
				
				
				 
              
              $this->session->set_flashdata('success','Your Property registered successfully');
			 $this->load->view('about/property',$data);
				
			}
			
			else
			{
				$this->load->view('about/property',$data);
			}
		
	}
	
	public function set_upload_options($id)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = 'hotel/slider/'.$id;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //$config['max_size']      = '0';
	    //$config['overwrite']     = FALSE;

	    return $config;
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
	
	
	
}
