<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomcomp extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Room_settings_model');
		$this->load->model('Roommodel');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['results'] = $this->Room_settings_model->allList();
		$this->load->view('layout/header');
		$this->load->view('roomcomp/list',$data);
		$this->load->view('layout/footer');
		
	}
	
	public function category($name)
	{
		$config['base_url'] = site_url('roomcomp/category/'.$name);
		$config['total_rows'] = $this -> Room_settings_model -> row_count($name);
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		$data['results'] = $this->Room_settings_model->allList($name,$config["per_page"], $data['page']);
		
		$this->load->view('layout/header');
		$this->load->view('roomcomp/list',$data);
		$this->load->view('layout/footer');
		
	}
	
	public function add($name)
	{
		$data['msg'] = '';
		$data['hotel_list']=$this->Room_settings_model->get_allDetails($name);
		if(isset($_POST['room_submit']))
			{
				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_attached');
				$data_room['price'] 			= $this->input->post('room_price');
				$data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['valid_from'] 		= $this->input->post('validity_from');				
				$data_room['valid_upto'] 		= $this->input->post('validity');
				$data_room['num_rooms'] 		= $this->input->post('num_rooms');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['available_status'] 	= 1;
				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit');
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				if($this->db->insert('tbl_hotel_room_settings', $data_room))
				{
					$this->session->set_flashdata('success','Rooms Combination added successfully');
					redirect('roomcomp/add/'.$name);
		         
				}
			}			

		$this->load->view('layout/header');
		$this->load->view('roomcomp/add',$data);
		$this->load->view('layout/footer');
		
	}

	public function edit($id,$name)
	{

		$data['result'] = $this->Room_settings_model->roomsettings_ById($id);
		$data['all_hotels'] = $this->Roommodel->allhotels($name);
		$data['allRooms'] 	= $this->Room_settings_model->allRooms($data['result']->hotel_id);
		$data['msg'] = '';

		if(isset($_POST['room_settings_submit']))
			{

				$data_room['hotel_id'] 			= $this->input->post('room_hotel');
				$data_room['room_id'] 			= $this->input->post('room_id'); 
				$data_room['room_price'] 		= $this->input->post('room_price');
				$data_room['offer_price'] 		= $this->input->post('room_ofr_price');
				$data_room['num_rooms'] 		= $this->input->post('num_rooms');
				$data_room['conditions'] 		= $this->input->post('conditions');
				$data_room['allowed_persons'] 	= $this->input->post('allowed_persons');
				$data_room['valid_from'] 		= $this->input->post('valid_from');
				$data_room['valid_upto'] 		= $this->input->post('validity');
				$data_room['child_free_limit'] 	= $this->input->post('child_free_limit');
				$data_room['room_child_rate'] 	= $this->input->post('room_child_rate');
				$data_room['room_adult_rate'] 	= $this->input->post('room_adult_rate');
				$data_room['tax_applicable'] 	= $this->input->post('tax_applicable');
				$data_room['id'] = $id;

				$res_room_update = $this->Room_settings_model->upd_room($data_room);
				
				$this->session->set_flashdata('success','Rooms combination updated successfully');
				redirect('roomcomp/edit/'.$id.'/'.$name);			
			}

		$this->load->view('layout/header');
		$this->load->view('roomcomp/edit',$data);
		$this->load->view('layout/footer');

		
	}
	public function get_rooms_hotels($ele)
	{
		$data=$this->Room_settings_model->get_rooms_attached($ele);

		if(!empty($data))
		  	{
				echo '<div class="form-group row">
						<label class="col-lg-4">Room Type</label>
						<select class="col-lg-8 form-control beds" name="room_attached" id="room_attached">
					  	<option value="0">--Select--</option>';
						foreach($data as $type)
						{
							echo '<option value="'.$type->id.'">'.$type->room_title.'</option>';	  
						}
						  echo '</select>
						  		</div>';
	  		}

		
	}

	function delete($id,$cat)
	{
		$this->Room_settings_model->delete($id);
		
		redirect('roomcomp/category/'.$cat);
	}
}
