<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination');
		$this->load->model('Usermodel');
		$this->load->model('Profilemodel');
		$this->load->model('Coupon_model');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
		
		
	}


	function index()
	 {
	 	
		$username = $this->session->userdata['hotel_adminusername'];
		$data['hotel_id']= $this->Profilemodel->get_id($username); 
		
		if($this->session->userdata['user_type']=='staff')
			{
			$data_menu['menu'] = $this->Profilemodel->select_menu($username,$data['hotel_id']); 
			}
			else
			{
				$data_menu['menu']='';
			}
		$config['base_url'] = site_url('users/index');
		$config['total_rows'] = $this -> Usermodel -> row_count($data['hotel_id']);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data['pagination'] = $this -> pagination -> create_links();
		
		
		
		//$data['results']=$this->Bookingmodel->get_booking_number($id,$config["per_page"], $data['page']);
		
		$data['userid']=$this->Usermodel->get_userid($data['hotel_id'],$config["per_page"], $data['page']);
		
	 	$this -> load -> view('layout/header'); 
		if(!empty($data_menu['menu']))
		{	if(in_array('4', json_decode($data_menu['menu']))==1)
			{ $this->load->view('coupon/coupon',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this->load->view('coupon/coupon',$data);	
		}
		//$this -> load -> view('coupon/coupon',$data);
		$this -> load -> view('layout/footer');
		
	 }
	 
	 
	function all_generate()
	{
	 	$data['coupon']	= rand();
		
	 	$username		= $this->session->userdata['hotel_adminusername'];
		$id				= $this->Profilemodel->get_id($username); 
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu'] = $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('coupon_code', 'code', 'trim|required');
			$this->form_validation->set_rules('offer', 'offer', 'trim|required');
			$this->form_validation->set_rules('from', 'from date', 'trim|required');
			$this->form_validation->set_rules('to', 'to date', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation'] = validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('coupon/generate_all',$data);
				$this -> load -> view('layout/footer');
			}
			else {
				$data['userid']		= $this->Usermodel->get_userid($id,'', '');
				
				$cpn['hotel_id']	= $id;
				$cpn['all_coupon']	= $data['coupon'];
				$cpn['all_offer']	= $this->input->post('offer');
				$cpn['valid_from']	= date_format(date_create_from_format('d-m-Y', $this->input->post('from')), 'Y-m-d');
				$cpn['valid_to']	= date_format(date_create_from_format('d-m-Y', $this->input->post('to')), 'Y-m-d');
				$cpn['date']		= date('Y-m-d');
				$cpn['status']		= 1;
				
				foreach($data['userid'] as $user)
				{
					$check_coupon = $this->Coupon_model->get_coupon($user->user_id, $id);
					if($check_coupon == 0)
					{
						$cpn['user_id']	= $user->user_id;
						$this -> db -> insert('tbl_coupon', $cpn);
					}
					else {
						$this -> db -> where('user_id', $user->user_id) -> where('hotel_id', $id) -> update('tbl_coupon', $cpn);
					}
				}
				redirect('coupon');
				$this->session->set_flashdata('success','Coupon generated successfully');
			}
		}
		else {
		$this -> load -> view('layout/header');
			if(!empty($data_menu['menu']))
		{	if(in_array('51', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('coupon/generate_all',$data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('coupon/generate_all',$data);
		}
		
		//$this -> load -> view('coupon/generate_all',$data);
		$this -> load -> view('layout/footer');
		}
	}
	 
	 
	function coupon_generate($user_id)
	 {
	 	$data['coupon']= rand();
		
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		$data['results']=$this->Usermodel->get_users($user_id);
		
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('offer', 'offer', 'trim|required');
			$this->form_validation->set_rules('coupon_code', 'coupon code', 'trim|required');
			$this->form_validation->set_rules('from', 'from date', 'trim|required');
			$this->form_validation->set_rules('to', 'to date', 'trim|required');
				
			if ($this->form_validation->run() == FALSE)
			{
				$data['validation']=validation_errors();
				
				$this -> load -> view('layout/header');
				$this -> load -> view('users/coupon',$data);
				$this -> load -> view('layout/footer');
			}
			else 
			{
				$cpn['coupon_code']	= $data['coupon'];
				$cpn['hotel_id']	= $id;
				$cpn['user_id']		= $user_id;
				$cpn['offer']		= $this->input->post('offer');
				$cpn['valid_from']	= date_format(date_create_from_format('d-m-Y', $this->input->post('from')), 'Y-m-d');
				$cpn['valid_to']	= date_format(date_create_from_format('d-m-Y', $this->input->post('to')), 'Y-m-d');
				$cpn['date']		= date('Y-m-d');
				$cpn['status']		= 1;
					
				$check_coupon  = $this->Coupon_model->coupon_exists($user_id, $id);
				
				if($check_coupon==0)
				{
				$insert_query = $this->Coupon_model->generate_coupon($cpn);
				}
				else
				{
					$insert_query = $this->Coupon_model->update_coupon($cpn);
				}
				
				
				if($insert_query==1)
				{
					$this->session->set_flashdata('success','Coupon generated successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Some Problem affected, Please try agein');
				}
				
				redirect('coupon');
			}
		
		}
		else
		{
		
		 	$this -> load -> view('layout/header');
			$this -> load -> view('coupon/generate_coupon',$data);
			$this -> load -> view('layout/footer');
		}
		
	 }



	function search($key)
	{
		$username = $this -> session -> userdata['hotel_adminusername'];
		$id = $this -> Profilemodel -> get_id($username);

		$userid = $this -> Coupon_model -> get_userids($id, $key);

		$i = 1;
		if(!empty($userid)){
			foreach ($userid as $user) {
				$result = $this->Usermodel->get_users($user->user_id);
				$booking = $this->Usermodel->booking_count($user->user_id);
												  $all_coupon = $this->db
												  ->select('all_coupon')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
												  
												  $in_coupon = $this->db
												  ->select('coupon_code')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
				
		?>
		<tr>
			<td><?php echo $i;?></td>
		                                        <td><?php echo $result[0]->first_name."&nbsp;".$result[0]->last_name;?></td>
		                                        <td><?php echo $result[0]->email;?></td>
		                                         <td><?php echo $result[0]->phone;?></td>
		                                          <td><?php echo $booking;?></td>
		                                           <td>
		                                           	<?php
		                                           	if(empty($in_coupon->coupon_code))
		                                           	{?><a href="<?php echo base_url(); ?>coupon/coupon_generate/<?php echo $result[0]->id;?>">Generate</a>
		                                           	<?php }
													else {echo $in_coupon->coupon_code; } 
		                                           	?></td>
		                                           	<td><?php if(!empty($all_coupon->all_coupon)) echo $all_coupon->all_coupon; ?></td>
		</tr>
		<?php
		$i++;}}
		else
		{
			echo '<tr class="active text-center"><td colspan="7">No users found.</td></tr>';
		}
		//$result = $this -> Usermodel -> search($key);
	}

	function status($stat)
	{
		$username = $this -> session -> userdata['hotel_adminusername'];
		$id = $this -> Profilemodel -> get_id($username);
		
		$userid = $this -> Coupon_model -> get_users($id);

		$i = 1;
		if(!empty($userid)){
			foreach ($userid as $user) {
				$result = $this->Usermodel->get_users($user->user_id);
				$booking = $this->Usermodel->booking_count($user->user_id);
				if($stat == 'on') {
												  $all_coupon = $this->db
												  ->select('all_coupon')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
												  
												  $in_coupon = $this->db
												  ->select('coupon_code')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->where('coupon_code IS NOT', null)
												  ->get('tbl_coupon')
												  ->row();
												  if(!empty($in_coupon->coupon_code)){
?>
		<tr>
			<td><?php echo $i;?></td>
		                                        <td><?php echo $result[0]->first_name."&nbsp;".$result[0]->last_name;?></td>
		                                        <td><?php echo $result[0]->email;?></td>
		                                         <td><?php echo $result[0]->phone;?></td>
		                                          <td><?php echo $booking;?></td>
		                                           <td>
		                                           	<?php
		                                           	if(empty($in_coupon->coupon_code))
		                                           	{?><a href="<?php echo base_url(); ?>coupon/coupon_generate/<?php echo $result[0]->id;?>">Generate</a>
		                                           	<?php }
													else {echo $in_coupon->coupon_code; } 
		                                           	?></td>
		                                           	<td><?php if(!empty($all_coupon->all_coupon)) echo $all_coupon->all_coupon; ?></td>
		</tr>
<?php }
				} else {
												  $all_coupon = $this->db
												  ->select('all_coupon')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->get('tbl_coupon')
												  ->row();
												  
												  $in_coupon = $this->db
												  ->select('coupon_code')
												  ->where('user_id',$user->user_id)
												  ->where('hotel_id',$id)
												  ->where('status',1)
												  ->where('coupon_code IS', null)
												  ->get('tbl_coupon')
												  ->row();
												  if(empty($in_coupon->coupon_code)){
		?>
		<tr>
			<td><?php echo $i;?></td>
		                                        <td><?php echo $result[0]->first_name."&nbsp;".$result[0]->last_name;?></td>
		                                        <td><?php echo $result[0]->email;?></td>
		                                         <td><?php echo $result[0]->phone;?></td>
		                                          <td><?php echo $booking;?></td>
		                                           <td>
		                                           	<?php
		                                           	if(empty($in_coupon->coupon_code))
		                                           	{?><a href="<?php echo base_url(); ?>coupon/coupon_generate/<?php echo $result[0]->id;?>">Generate</a>
		                                           	<?php }
													else {echo $in_coupon->coupon_code; } 
		                                           	?></td>
		                                           	<td><?php if(!empty($all_coupon->all_coupon)) echo $all_coupon->all_coupon; ?></td>
		</tr>
		<?php }
		}
		$i++;}}
		else
		{
			echo '<tr class="active text-center"><td colspan="7">No users found.</td></tr>';
		}
	}
	
	
}
?>