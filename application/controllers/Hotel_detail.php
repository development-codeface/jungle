<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_detail extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Hotel_detail_model');
		$this->load->model('Room_detail_model');
		$this->load->model('Hotels_model');
		date_default_timezone_set("Asia/Calcutta");
		
	 }
	 
	public function index()
	{
		
		$this->load->view('hotel/detail');
	}

	function widget($id)
	{
	$data	= $this->Hotel_detail_model->manager($id);

	?>
	<!--<a target="_blank" href="<?php echo $data -> access_url?>">
	<button style="background-color:#424241;border: none;color: white;padding: 8px 18px 8px;position: fixed;right: 0;cursor: pointer;border-radius: 2px;font-weight: bold;top: 88px;">
	<img src="<?php echo base_url();?>img/checkout_book.png" style="float: left;">
	<span style="float: left;margin-top: 15px;margin-left: 7px;"> Book Now !!!</span></button></a>--->
	
	
	
	<a target="_blank" href="<?php echo $data -> access_url?>">
	<button style="background:none;border: none;color: white;padding: 8px 18px 8px;position: fixed;right: -25px;cursor: pointer;border-radius: 2px;font-weight: bold;top: 88px;">
	<img src="<?php echo base_url();?>img/book1.gif" style="float: left;width:145px">
	</button></a>
	
	
	<?php
	}
	
	public function hotel($id)
	{
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		 $id=$this->encrypt->decode($dec_hotel);
		
		
		
		
		$data['check_in'] = $this->input->post('check_in');
		$data['check_out'] = $this->input->post('check_out');
		$data['num_rooms'] = $this->input->post('num_rooms');
		$data['adults'] = $this->input->post('adults');
		$data['childs'] = $this->input->post('childs');
		$data['total_amount'] = $this->input->post('total_amount');
		
		$data['details']=$this->Hotel_detail_model->detailsById($id);
		
		
		$this->session->set_userdata(array('default' => 'inr'));
		
		$data['review_limit']	= 1;
		$data['latest']			= $this -> Hotel_detail_model -> getReviews($id,$data['review_limit']);
		$data['all_reviews']	= $this -> Hotel_detail_model -> allReviews($id);
		$data['latest_count']	= count($data['latest']);
		$data['all_count']		= count($data['all_reviews']);
		
		if(!empty($this->session->userdata['log_usertype']) == 'user')
		{ $data['user'] = $this->Hotel_detail_model->user($this->session->userdata['log_username']); }
		
		$this->load->view('hotel/detail', $data);
	}
	
	public function set_currency($val)
	{
		$this->session->set_userdata(array('currency' => $val));
		return $this->session->userdata('currency');
	}
	
	public function rooms($value,$mode,$prev_room)
	{
		if($mode=='new')
		{
		for ($i=2; $i <= $value; $i++)
		{
							
		?>
								
									<div id="room-<?php echo $i; ?>" >
											<!--<div class="container-fluid no_padding_l no_padding_r filter_room_cus_block" id="age-<?php echo $i; ?>">-->
												<!--<div class="col-xs-12 clone_me cus_label_room_block">-->
													<!--<div class="col-xs-6">-->
													<!--<span class="view_label">Adults</span>-->
													<select name="adults[]" class="mem_qty"  autocomplete="off">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
													<!--</div>-->
													<!--<div class="col-xs-6">
													<span class="view_label">Children</span>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i; ?>" onchange="childs(<?php echo $i; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
													</select>
												</div>-->
												<!--</div>-->
												
											<!--</div>-->
											
										</div>
										
			<?php
			}
			}
			else
			{

			for ($i=$prev_room; $i < $value; $i++)
			{
			?>
								
									<div id="room-<?php echo $i + 1; ?>">
											<!--<div class="container-fluid no_padding_l no_padding_r filter_room_cus_block" id="age-<?php echo $i + 1; ?>">
												<div class="col-xs-12  cus_label_room">
													<span class="view_label"><p>Room <?php echo $i + 1; ?></p></span>
												</div>
												<div class="col-xs-12 clone_me cus_label_room_block">
													<div class="col-xs-6">
													<span class="view_label">Adults</span>-->
													<select name="adults[]" class="mem_qty" autocomplete="off">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
													<!--</div>
														<div class="col-xs-6">
													<span class="view_label">Children</span>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i + 1; ?>" onchange="childs(<?php echo $i + 1; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div>	</div>
											</div>-->
										</div>
										
				<?php
				}

				}

	}



				public function age($value,$mode,$count,$prev_child)
				{
				if($mode=='new')
				{

				for ($i=1; $i <= $value; $i++)
				{
		?>
								
							<div class="col-md-4 clone_me " id="child-<?php echo $count . $i; ?>" style="padding-top: 7px;">
									<span class="view_label">
										<p class="cus_room_title">Child <?php echo $i; ?></p>
										</span>
													<select class="form_search" autocomplete="off" name="child_age[]">
														<option>Age</option>
														<option>0</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>10</option>
														<option>11</option>
														<option>12</option>
														<option>13</option>
													</select>
												</div>
											
										
				<?php
				}
				}
				else {
				for ($i=$prev_child; $i < $value; $i++)
				{
					?>
				
							<div class="col-md-4 clone_me  " id="child-<?php echo $count . $i + 1; ?>" style="padding-top: 7px;">
									<span class="view_label">
										<p class="cus_room_title">Child <?php echo $i + 1; ?></p>
										</span>
													<select class="form_search" autocomplete="off" name="child_age[]" >
														<option>Age</option>
														<option>0</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>10</option>
														<option>11</option>
														<option>12</option>
														<option>13</option>
													</select>
												</div>
	
				<?php
				}
				}
				}

	function review()
	{
		
		$this -> form_validation -> set_rules('user_id', 'User', 'trim|required');
		$this -> form_validation -> set_rules('hotel_id', 'Hotel', 'trim|required');
		$this -> form_validation -> set_rules('userreview', 'Review', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) {
			echo 'error';
		} else {

		$review['user_id'] = $this -> input -> post('user_id');
		$review['hotel_id'] = $this -> input -> post('hotel_id');
		$review['title'] = $this -> input -> post('reviewtitle');
		$review['review'] = $this -> input -> post('userreview');
		
		$this->db->insert('tbl_review', $review); 
		}
 	}
	
	
	function hotel_review($id)
	{
		$data['hotel']	= $this -> Hotel_detail_model -> reviewHotel($id);
		$data['reviews']= $this -> Hotel_detail_model -> allReviews($id);

		$this->load->view('hotel/review', $data);
	}	
	
	
	
	
	
	function ayurveda($id)
	{
		$dec_hotel=str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		 $id=$this->encrypt->decode($dec_hotel);
		
		$data['check_in'] = $this->input->post('check_in');
		$data['check_out'] = $this->input->post('check_out');
		$data['total_amount'] = $this->input->post('total_amount');
		
		
		$data['details']=$this->Hotel_detail_model->ayurveda_detailsById($id);
		$data['pack_id'] = $id;
		
		$this->session->set_userdata(array('default' => 'inr'));
		
		$data['review_limit']	= 1;
		$data['latest']			= $this -> Hotel_detail_model -> getReviews($id,$data['review_limit']);
		$data['all_reviews']	= $this -> Hotel_detail_model -> allReviews($id);
		$data['latest_count']	= count($data['latest']);
		$data['all_count']		= count($data['all_reviews']);
		$data['itinerary']	=$this -> Room_detail_model ->ayurveda_itineraryById($id);
		
		if(!empty($this->session->userdata['log_usertype']) == 'user')
		{ $data['user'] = $this->Hotel_detail_model->user($this->session->userdata['log_username']); }
		
		$this->load->view('hotel/ayurveda_detail', $data);
	}
	
	
	function room_amounts($room,$room_price)
	{
		echo "asda";
	}
	
}
