<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_search extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Detail_search_model');
		
		
		
		$this->load->model('Hotel_detail_model');
		$this->load->model('Room_detail_model');
		$this->load->model('Hotels_model');
		
	 }
	 
	public function index()
	{
		
		$this->load->view('hotel/detail');
	}
	
	
	public function hotel()
	{
		$this->load->library('session');
		$data['check_in'] = $this->input->post('check_in');
		$data['check_out'] = $this->input->post('check_out');
		$data['mem_type'] = $this->input->post('mem_type');
		$data['adults'] = $this->input->post('adults');
		$data['childrens'] = $this->input->post('childrens');
		$data['child_age'] = $this->input->post('child_age');
		$data['id'] = $this->input->post('hotels');
		$data['sub_cat_id'] = $this->input->post('category');
		
		
		$_SESSION['datahere']['check_in']=$data['check_in'];
		$_SESSION['datahere']['check_out']=$data['check_out'];
		$_SESSION['datahere']['mem_type'] = $data['mem_type'];
		$_SESSION['datahere']['adults'] = $data['adults'] ;
		$_SESSION['datahere']['childrens'] = $data['childrens'];
		$_SESSION['datahere']['child_age']  = $data['child_age'];
		
		$data['details']=$this->Hotel_detail_model->detailsById($data['id']);
		$room_detail	= $this->Room_detail_model->roomsByHotel($data['details']->id);
		if(!empty($room_detail))
		{
			$room_count='';
			foreach ($room_detail as $room) 
			{
				 $room_count+=$this->Room_detail_model->rooms_count($data['details']->id,$room->id);
				
			  
			}
			if($room_count>=$data['mem_type'])
			{
			$this->load->view('hotel/detail_search_list',$data); 
				
			}
			else
			{
				echo "0";
			}
			
		}
		else
		{
			echo "0";
		}
		
	}
	
	
	
	public function hotels()
	{
		$this->load->library('session');
		$data['check_in'] = $this->input->get('check_in');
		$data['check_out'] = $this->input->get('check_out');
		$data['mem_type'] = $this->input->get('mem_type');
		$data['adults'] = $this->input->get('adults');
		$data['children'] = $this->input->get('childrens');
		$data['child_age'] = $this->input->get('child_age');
		$data['id'] = $this->input->get('hotels');
		$data['sub_cat_id'] = $this->input->get('category');
		if(!empty($this->session->userdata['datahere']['hidden_search']))
		{
		$search_text= $this->session->userdata['datahere']['hidden_search'];
		}
		else
		{
			$search_text = "kerala";
		}
		$_SESSION['datahere']['check_in']=$data['check_in'];
		$_SESSION['datahere']['check_out']=$data['check_out'];
		$_SESSION['datahere']['mem_type'] = $data['mem_type'];
		$_SESSION['datahere']['adults'] = $data['adults'] ;
		$_SESSION['datahere']['childrens'] = $data['children'];
		$_SESSION['datahere']['child_age']  = $data['child_age'];
		$_SESSION['datahere']['hidden-search']  = $data['child_age'];
		
		$adult='';
		$child='';
		$childage='';
		if(!empty($data['adults']))
		{
		for($i=0;$i<count($data['adults']);$i++)
		{
			  $adult.='&adults['.$i.']='.$data['adults'][$i];
		}
		}
		if(!empty($data['children']))
		{
		for($j=0;$j<count($data['children']);$j++)
		{
			  $child.='&childrens['.$j.']='.$data['children'][$j];
		}
		}
		if(!empty($data['child_age']))
		{
		for($j=0;$j<count($data['child_age']);$j++)
		{
			  $childage.='&child_age['.$j.']='.$data['child_age'][$j];
		}
		}
	
		
		$data['details']=$this->Hotel_detail_model->detailsById($data['id']);
		
		$data['review_limit']	= 1;
		$data['latest']			= $this -> Hotel_detail_model -> getReviews($data['id'],$data['review_limit']);
		$data['all_reviews']	= $this -> Hotel_detail_model -> allReviews($data['id']);
		$data['latest_count']	= count($data['latest']);
		$data['all_count']		= count($data['all_reviews']);
		
		
		$room_detail	= $this->Room_detail_model->roomsByHotel($data['details']->id);
		
		if(!empty($room_detail))
		{
			$room_count='';
			foreach ($room_detail as $room) 
			{
				$room_setting_detail	= $this->Room_detail_model->settingsByRoom($room->id);
				if(!empty($room_setting_detail))
				{
					
					//echo $room_count+= $this->Room_detail_model->rooms_count($data['details']->id,$room->id); echo "asdsadsadsadasdsa";
					
						$room_count+=$this->Room_detail_model->rooms_count($data['details']->id,$room->id);
					
				}
			  
			}
		
			if($room_count>=$data['mem_type'])
			{
			
			$this->load->view('hotel/detail_search',$data); 
				
			}
			else
			{  
				echo '<script>window.location="'.base_url().'hotels/search_list?hidden-search='.$search_text.'&category='.$data['sub_cat_id'].'&check_in='.$data['check_in'].'&check_out='.$data['check_out'].'&mem_type='.$data['mem_type'].''.$adult.''.$child.''.$childage.'"</script>';
			}
			
		}
		else
		{
			echo '<script>window.location="'.base_url().'hotels/search_list?hidden-search='.$search_text.'&category='.$data['sub_cat_id'].'&check_in='.$data['check_in'].'&check_out='.$data['check_out'].'&mem_type='.$data['mem_type'].''.$adult.''.$child.''.$childage.'"</script>';
		}
		
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
								<input type="hidden"  id="prev-childs-<?php echo $i; ?>" value="0" autocomplete="off" />
									<div class="demo_div" id="room-<?php echo $i; ?>" style="padding-top: 7px;" >
											<div class="container-fluid no_padding_l no_padding_r filter_room_cus_block" id="age-<?php echo $i; ?>">
												<div class="col-xs-12  cus_label_room">
												<span class="view_label cus_label_filter">
													<p>Room <?php echo $i; ?></p>
												</span>
												</div>
												<div class="col-xs-12 clone_me cus_label_room_block">
													<div class="col-xs-6">
													<span class="view_label">Adults</span>
													<select class="form_search" autocomplete="off" name="adults[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select></div>
													<div class="col-xs-6">
													<span class="view_label">Children</span>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i; ?>" onchange="childs(<?php echo $i; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div></div>
												
											</div>
											
										</div>
										
			<?php
			}
			}
			else
			{

			for ($i=$prev_room; $i < $value; $i++)
			{
			?>
									<input type="hidden"  id="prev-childs-<?php echo $i + 1; ?>" value="0" autocomplete="off" />
									<div class="demo_div" id="room-<?php echo $i + 1; ?>" style="padding-top: 7px;">
											<div class="container-fluid no_padding_l no_padding_r filter_room_cus_block" id="age-<?php echo $i + 1; ?>">
												<div class="col-xs-12  cus_label_room">
													<span class="view_label"><p>Room <?php echo $i + 1; ?></p></span>
												</div>
												<div class="col-xs-12 clone_me cus_label_room_block">
													<div class="col-xs-6">
													<span class="view_label">Adults</span>
													<select class="form_search" autocomplete="off" name="adults[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
													</select>
													</div>
														<div class="col-xs-6">
													<span class="view_label">Children</span>
													<select class="form_search" name="childrens[]" id="childrens-<?php echo $i + 1; ?>" onchange="childs(<?php echo $i + 1; ?>);" autocomplete="off" >
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div>	</div>
											</div>
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
