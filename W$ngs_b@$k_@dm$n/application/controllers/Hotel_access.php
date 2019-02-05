<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_access extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Hotelmodel');
		$this -> load -> model('Settingsmodel');
		if(!isset($this->session->userdata['adminusername'])) {
			redirect('login');
		}
	}
	
	function user_permission() {
	 	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	$data['users'] = $this -> Settingsmodel-> list_users('','');
	
if ($this->input->is_ajax_request()) {

$id = $this -> input -> post('id');

$data['user_menu'] = $this->Settingsmodel->select_user_menu($id); 

$this -> load -> view('settings/menu_options', $data);
	} else {
	
	if(isset($_POST['submit'])) {
		$dat['menu']= json_encode($this->input->post('menu'));
	if($dat['menu']=='null')
	{
		$dat['menu']='["0"]';
		
	}
	$user_id = $this -> input -> post('user');
	$update_setting = $this->Settingsmodel->site_user_menu($user_id,$dat);
	
		if($update_setting==1)
		{
			$this->session->set_flashdata('success',"User permissions set successfully");
		}
		$this->session->set_flashdata('user',$user_id);
		
		redirect('hotel_access/user_permission');
	} else {
		$this->load->view('layout/header');
		if($this->session->userdata['user_type']=='staff') {
		$this->load->view('settings/no_permission');
		} else {
		$this -> load -> view('settings/user_permission',$data);
		}
		$this->load->view('layout/footer');
		}
	}
	}
	
	
	function access_type($id) {
		$data = $this->Hotelmodel->subcategory($id);
		echo "<option value=''> -Select-</option>";
		foreach($data as $hot):
			echo "<option value='".$hot -> id."'>".$hot -> title."</option>";
		endforeach;
	}
	
	function access_options($id) {
	$user_id = $this->session->userdata['user_id'];
	
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
		$data = $this->Hotelmodel->access_options($id);
		
		if($this->session->userdata['user_type']=='staff') {
		if(!empty($data_menu['menu']) && (in_array('8', json_decode($data_menu['menu']))==1)) {
		?>
		
								<h4>Access Options</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								
								<input type="hidden" class="css-checkbox services" value="<?php echo $id; ?>" name="hotel_id" >
								
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="off_on_book" <?php if(!empty($data) && $data -> off_on_book ==1) echo 'checked'; ?>>
								  <label> Offline & Online Booking</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="channel_mgmt" <?php if(!empty($data) && $data -> channel_mgmt ==1) echo 'checked'; ?>>
								  <label> Channel Management</label> </span>
							  <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="promotion" <?php if(!empty($data) && $data -> promotion ==1) echo 'checked'; ?>>
								 <label> Promotion Activities</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="book_engine" <?php if(!empty($data) && $data -> book_engine ==1) echo 'checked'; ?>>
								  <label> Booking Engine</label>  </span>
							  </div>
		<?php
		} else { echo 'Sorry, you have no permission to view this page.'; }
		} else { ?>
		
								<h4>Access Options</h4>
								<div class="col-lg-12 no_padding_l no_padding_r">
								
								<input type="hidden" class="css-checkbox services" value="<?php echo $id; ?>" name="hotel_id" >
								
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="off_on_book" <?php if(!empty($data) && $data -> off_on_book ==1) echo 'checked'; ?>>
								  <label> Offline & Online Booking</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="channel_mgmt" <?php if(!empty($data) && $data -> channel_mgmt ==1) echo 'checked'; ?>>
								  <label> Channel Management</label> </span>
							  <span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="promotion" <?php if(!empty($data) && $data -> promotion ==1) echo 'checked'; ?>>
								 <label> Promotion Activities</label> </span>
								<span class="radio-inline  col-md-3">
								  <input type="checkbox" class="css-checkbox services" value="1" name="book_engine" <?php if(!empty($data) && $data -> book_engine ==1) echo 'checked'; ?>>
								  <label> Booking Engine</label>  </span>
							  </div>
		
		<?php }
	}
	
	function index() {
	
	if($this->session->flashdata('cat')) {
	$dat['hotels']	= $this->Hotelmodel->subcategory($this->session->flashdata('cat'));
	} else { $dat = ''; }
	
	$user_id = $this->session->userdata['user_id'];
		if($this->session->userdata['user_type']=='staff')
		{
		$data_menu['menu'] = $this->Settingsmodel->select_user_menu($user_id); 
		}
	
	if(isset($_POST['submit'])) {
	
	$data['hotel_id']		= $this->input->post('hotel_id');
	$data['off_on_book']	= $this->input->post('off_on_book');
	$data['channel_mgmt']	= $this->input->post('channel_mgmt');
	$data['promotion']		= $this->input->post('promotion');
	$data['book_engine']	= $this->input->post('book_engine');
	
	$exist = $this->Hotelmodel->access_options($data['hotel_id']);
	if(count($exist) > 0) {
		$this->db->where('hotel_id', $data['hotel_id'])->update('tbl_hotels_access', $data);
	} else {
		$this->db->insert('tbl_hotels_access', $data); 
	}
	$cat = $this->Hotelmodel->hotelById($data['hotel_id']);
	
	$this->session->set_flashdata('cat',$cat -> sub_category_id);
	$this->session->set_flashdata('hotel',$data['hotel_id']);
    $this->session->set_flashdata('success','Access options updated successfully');
	redirect('hotel_access');
	
	} else {
		$this->load->view('layout/header');
		
		if($this->session->userdata['user_type']=='staff') {
		
		if(!empty($data_menu['menu']) && (in_array('7', json_decode($data_menu['menu']))==1)) {
		$this->load->view('access/list', $dat);
		} else {
		$this->load->view('settings/no_permission');
		}
		} else {
		$this->load->view('access/list', $dat);
		}
		$this->load->view('layout/footer');
		}
	}

}
?>