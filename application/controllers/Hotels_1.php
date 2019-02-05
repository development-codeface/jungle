<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('Hotels_model');
		$this->load->model('session_search');
		$this->load->model('Hotel_detail_model');
        $this->load->library('Zebra_Pagination');
		date_default_timezone_set("Asia/Calcutta");

	 }
	 
	public function index()
	{
		$data['hotel'] = $this->Hotels_model->all_hotels();
		$this->load->view('hotel/list_old', $data);
	}
	
	
	function destination($cat,$des)
	{
		$hidden_search = $des;
		$mem_type = 1;
		$adults[] = 1;
		
		if($cat == 'hotels') {
			$sub_cat_id = 8;
			$res_sub_cat_id = 2;
			$data['meta_title'] = $des. ' Hotels | Budget Hotels in '.$des.' - Book Hotels at discount price';
			$data['meta_desc'] = 'Here is a list of budget and luxury hotels in '.$des.' at discount prices with special offers for online booking and best stay at '.$des.' hotels with great deals.';
		} else if($cat == 'homestays') {
			$sub_cat_id = 3;
			$res_sub_cat_id = '';
			$data['meta_title'] = $des. ' Homestays | Budget Homestays in '.$des.' - Price and Packages';
			$data['meta_desc'] = 'Best Homestays in '.$des.'  with modern amenities; compare homestay price and packages on our website at best deals and discounts, and special offer for homestays.';
		} else if($cat == 'apartments') {
			$sub_cat_id = 4;
			$res_sub_cat_id = '';
			$data['meta_title'] = $des. ' Apartments | Budget Apartments in '.$des.' - Book Apartments at discount price';
			$data['meta_desc'] = 'Here is a list of Apartments in '.$des.' at discount prices with special offers for online booking and best stay at '.$des.' Apartments with great deals.';
		}
		
		$destination = $des;
		$data['hidden_search'] = $hidden_search;
		$data['sub_cat_id'] = $sub_cat_id;
		$data['res_sub_cat_id'] = $res_sub_cat_id;
		$data['destination'] = $destination;
		
		if(!empty($mem_type)) {
			$query['tot_room'] = $mem_type;
		}
		
		if(!empty($adults)) {
			$query['tot_adults'] = $adults;
		}
		
		if(!empty($sub_cat_id)) {
			$query['sub_cat_id'] = $sub_cat_id;
		}
		
		if(!empty($res_sub_cat_id)) {
			$query['res_sub_cat_id'] = $res_sub_cat_id;
		}
		
		if(empty($res_sub_cat_id)) {
			$query['res_sub_cat_id'] = '';
		}
		
		if(!empty($destination)) {
			$query['destination'] = $des;
		}
		
		if(empty($destination)) {
			$query['destination'] = '';
		}
		
		if(!empty($query) && !empty($destination)) {
			$data['hotel'][0] = $this->Hotels_model->all_hotels_search_based_destination($query);
			$data['hotel'] = $data['hotel'][0];																																	
			$data['text_val'] = $des;
			$data['destination'] = $des;
			$data['date_check'] = $data['hotel'][1];
		}
		
		if(!empty($mem_type)) {
					$data['mem_type']	= $mem_type;
					$data['adults']		= $adults;

					$data['tot_room']	= $mem_type;
					$data['sub_cat_id']	= $sub_cat_id;
		}
		
				$this->session->set_userdata('datahere',$data);
				$this->session->set_userdata('query',$query);
			

			$this->load->view('hotel/list', $data);
	}
	
	public function search($category)
	{
		$data['hotel'] = $this->Hotels_model->search($category);
		$this->load->view('hotel/list_old', $data);
	}
	
	public function search_keyword($category)
	{
		$keyword = $this->input->get('term'); 
		$res = $this->Hotels_model->search_keyword($keyword,$category);		
		
		echo $res;
	}
	
	function ayurveda_keyword($category)
	{
		$keyword = $this->input->get('term'); 
		$res = $this->Hotels_model->ayurveda_search_keyword($keyword,$category);		
		
			//$search_key[] = "Panchakrma";
			//$search_key[] = "Rejuvenation (Rasayana)";
			//$res =  json_encode($search_key);
		echo $res;
	}
	
	function clean_up( $txt )
	{
		$unwanted = array("\'","'",'"',","); 
   		return str_ireplace( $unwanted, '', $txt );
	}
	
	
	function clean_up_key($txt )
	{
			$unwanted = array("\'",'"'); 
   			return str_ireplace( $unwanted, '', $txt );
	}

	public function search_det()
	{
		$meta_url = $this->uri->segment(1);
		//$query=$this->session->userdata['query'];
		//$data=$this->session->userdata['datahere'];
		$star_rating='';
		$price_range='';
		$loc_range='';
		$fac_range='';
		$hotName_range='';

		
		// if(!empty($_POST['checkedArray']))
		// {
			// $star_rating=$_POST['checkedArray'];

		// } else 
		if(!empty($_GET['checkedArray'])) {
			$star_rating=$_GET['checkedArray'];
		}

		// if(!empty($_POST['checkedArray_price']))
		// {
			// $price_range=$_POST['checkedArray_price'];

		// } else 
		if(!empty($_GET['checkedArray_price'])) {
			$price_range=$_GET['checkedArray_price'];
		}

		// if(!empty($_POST['checkedArray_loc']))
		// {
			// $loc_range=$_POST['checkedArray_loc'];

		// } else 
		if(!empty($_GET['checkedArray_loc'])) {
			$loc_range=$_GET['checkedArray_loc'];
		}

		// if(!empty($_POST['checkedArray_fac']))
		// {
			// $fac_range=$_POST['checkedArray_fac'];

		// } else 
		if(!empty($_GET['checkedArray_fac'])) {
			$fac_range=$_GET['checkedArray_fac'];
		}

		// if(!empty($_POST['checkedArray_hotelName']))
		// {
			// $hotName_range=$_POST['checkedArray_hotelName'];

		// } else 
		if(!empty($_GET['checkedArray_hotelName'])) {
			$hotName_range=$_GET['checkedArray_hotelName'];
		}
		
		if(!empty($_GET['price'])) {
			$data['price_sort']=$_GET['price'];
		}	
		
		if(!empty($_GET['sub_catid'])) {
			$data['sub_cat_id']=$_GET['sub_catid'];
			$query['sub_cat_id']=$_GET['sub_catid'];
		}	
		
		if(!empty($_GET['packag'])) {
			$data['destination']	= $_GET['packag'];
			$query['destination']	= $_GET['packag'];
			$destination = $_GET['packag'];
			
		}	
		
		if(!empty($_GET['pack_destination'])) {
			$data['pack_destination']	= $_GET['pack_destination'];
			$query['pack_destination']	= $_GET['pack_destination'];
			$destination = $_GET['pack_destination'];
		}	
		
		if(!empty($_GET['destination'])) {
			$data['destination']	= $_GET['destination'];
			$query['destination']	= $_GET['destination'];
			$destination = $_GET['destination'];
		} else {
			$data['destination']	= '';
			$query['destination']	= '';
			$destination = '';
		}
		
		if(!empty($_GET['check_out'])) {
			$data['check_out']	= $_GET['check_out'];
			$query['check_out']	= $_GET['check_out'];
		}	
		
		if(!empty($_GET['check_in'])) {
			$data['check_in']	= $_GET['check_in'];
			$query['check_in']	= $_GET['check_in'];
		}
		
		if(!empty($_GET['hidden_search'])) {
			$query['text_val']		= $this->clean_up_key($_GET['hidden_search']);
			$data['text_val']=$_GET['hidden_search'];
		}
		
		if(!empty($_GET['mem_type'])) {
			$data['mem_type']=$_GET['mem_type'];
			$data['tot_room']=$_GET['mem_type'];
		}
		
		if(!empty($_GET['adults'])) {
			$query['tot_adults']=$_GET['adults'];
		}
		
		if(!empty($_GET['adult_count'])) {
			$data['adults']=$_GET['adult_count'];
		}
		
		if(!empty($_GET['res_sub_catid'])) {
			$query['res_sub_cat_id']=$_GET['res_sub_catid'];
			$data['res_sub_cat_id']=$_GET['res_sub_catid'];
		} else {
		$query['res_sub_cat_id']='';
			$data['res_sub_cat_id']='';
		}
		
		
					if(!empty($query) && !empty($destination))	
					{
						
						$data['hotel'][0] 		= $this->Hotels_model->all_hotels_search_based_destination($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];
						//$data['meta_title']=  $destination.' '.$meta_url. ' | Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						
						$data['meta_title']=  $destination.' '.$meta_url. ' | Budget '.$meta_url.' in '.$destination.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';																																	
						//$data['text_val']		=  $this->session->userdata['datahere']['text_val'];
						//$data['destination']		=   $this->session->userdata['datahere']['destination'];
						$data['date_check']=$data['hotel'][1];
						
						
					}	
					if(!empty($query) && empty($destination))
					{ 
						$data['hotel'][0] 		= $this->Hotels_model->all_hotels_search_based($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];
						$data['meta_title']=  'Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';																																	
						//$data['text_val']		=   $this->session->userdata['datahere']['text_val'];
						//$data['destination']		=   '';
						$data['date_check']=$data['hotel'][1];
						
					}
					if(empty($query) && empty($destination))
					{
						$data['hotel'] 			= '';
						$data['text_val']		=  '';
						$data['meta_title']=  $meta_url. ' | Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';
					}
					
		/* if(!empty($query))	
		{
			$data['hotel'][0] 		= $this->Hotels_model->all_hotels_search_based($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
			$data['hotel']=$data['hotel'][0];																																	
			$data['text_val']		=   $this->session->userdata['datahere']['text_val'];
			$data['date_check']=$data['hotel'][1];
			
		}	
		else
		{
			$data['hotel'] 			= '';
			$data['text_val']		=  '';
		}	
	 */
	//print_r($data['hotel'][2]);
	//print_r($data['adults']); exit;
		$this->load->view('hotel/list_refine', $data);	

	}


	public function search_list()
	{
		        $meta_url = $this->uri->segment(1); 
				$star_rating=array();
				$hidden_search = $this->clean_up($this->input->get('hidden-search'));
				$check_in = $this->input->get('check_in');
				//$check_in = date("Y-m-d", strtotime($check_in));
				$check_out = $this->input->get('check_out');
				//$check_out = date("Y-m-d", strtotime($check_out));
				$mem_type = $this->input->get('mem_type');
				$adults = $this->input->get('adults');
				//$childrens = $this->input->get('childrens');
				//$child_age = $this->input->get('child_age');
			 	$sub_cat_id=$this->input->get('category');
				$res_sub_cat_id=$this->input->get('res_category');
				$destination = $this->input->get('destination');
				
				$data['hStar']=$this->input->get('hStar[]'); //print_r($data['hStar']);

				$data['hidden_search']=$hidden_search;
				$data['check_in']=$check_in;
				$data['check_out']=$check_out;
				$data['sub_cat_id']=$sub_cat_id;
				$data['res_sub_cat_id']=$res_sub_cat_id;
				$data['destination']=$destination;
				

				if(!empty($hidden_search))
				{
					
					//$query['text_val']	=	trim($this->input->get('hidden-search'));
					$query['text_val']	=	$this->clean_up_key($this->input->get('hidden-search'));
					//$query['text_val']		= explode(' ', $query['text_val']);
					//$query['text_val']		= explode(',', $query['text_val']);
					//$query['text_val']		= $query['text_val'][0];

				}
				

				if(!empty($check_in))
				{
					$query['check_in']	=	$check_in ; //date("Y-m-d", strtotime($this->input->get('check_in'))); 
					$data['check_in']   = $query['check_in'];
				}
				if(!empty($check_out))
				{
					$query['check_out']	=	$check_out ; //date("Y-m-d", strtotime($this->input->get('check_out')));
					$data['check_out'] = $query['check_out'];
				}
				if(!empty($mem_type))
				{
					$query['tot_room']	=	$this->input->get('mem_type');
				}
				if(!empty($adults))
				{
					$query['tot_adults']	=	$this->input->get('adults');
				}
				//if(!empty($childrens))
				//{
				//	$query['tot_childrens']	=	$this->input->get('childrens');
				//}
				//if(!empty($child_age))
				//{
				//	$query['child_age']	= $this->input->get('child_age');
				//}
				if(!empty($sub_cat_id))
				{
					$query['sub_cat_id']	= $this->input->get('category');
				}	
				if(!empty($res_sub_cat_id))
				{
					$query['res_sub_cat_id']	= $this->input->get('res_category');
				}
				if(empty($res_sub_cat_id))
				{
					$query['res_sub_cat_id']	= '';
				}
				if(!empty($destination))
				{
					$query['destination']	= $this->input->get('destination');
				}
				if(empty($destination))
				{
					$query['destination']	= '';
				}
				
				//for package search
				if(!empty($this->session->userdata['datahere']['pack_destination'])){
						$data['pack_destination']		=   $this->session->userdata['datahere']['pack_destination'];
					}
					if(!empty($this->session->userdata['datahere']['package'])){
						$data['package']		=   $this->session->userdata['datahere']['package'];
					}
					


				if(!empty($mem_type))
				{
					$data['mem_type']	= $mem_type;
					$data['adults']		= $adults;
					//$data['child_age']	= $child_age;
					//$data['childrens']	= $childrens;
					$data['tot_room']	= $mem_type;
					$data['sub_cat_id']	= $sub_cat_id;				
					
				}


				if($hidden_search=='')
				{
					$data['hotel'][0] ='';
					redirect('hotels');
				}
				else
				{
				

					if(!empty($query) && !empty($destination))	
					{
						
						$data['hotel'][0] 		= $this->Hotels_model->all_hotels_search_based_destination($query);
						$data['hotel']=$data['hotel'][0];																																	
						$data['text_val']		=   $this->input->get('hidden-search');
						$data['destination']		=   $this->input->get('destination');
						$data['date_check']=$data['hotel'][1];
						//$data['meta_title']= $data['destination'].' '.$meta_url. '| Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_title']= $data['destination'].' '.$meta_url. '| Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';
						
					}	
					if(!empty($query) && empty($destination))
					{ 
						$data['hotel'][0] 		= $this->Hotels_model->all_hotels_search_based($query);
						$data['hotel']=$data['hotel'][0];																																	
						$data['text_val']		=   $this->input->get('hidden-search');
						$data['destination']		=   '';
						$data['date_check']=$data['hotel'][1];
						$data['meta_title']= 'Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';
				
						
					}
					if(empty($query) && empty($destination))
					{
						$data['hotel'] 			= '';
						$data['text_val']		=  '';
						$data['meta_title']= 'Best '.$meta_url.' - Book '.$meta_url.' at discount price';
						$data['meta_desc']='Here is a list of budget and luxury '.$meta_url.'  at discount prices with special offers for online booking and best stay at '.$meta_url.' with great deals.';
				
					}
				
				$this->session->set_userdata('datahere',$data);
				$this->session->set_userdata('query',$query);
			
//print_r($data['hotel'][1]); exit;
	
			

			$this->load->view('hotel/list', $data);
			}
		
	}
	
	public function rooms($val,$mode,$prev_room)
	{
		if($mode=='new')
		{
			for($i=1;$i<=$val;$i++)
			{
				?>
				
				<div  id="room-<?php echo $i; ?>">
						<label for="pwd" class="topRmLabel">Room <?php echo $i; ?></label>
									<select name="adults[]" class="topdetMod">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								
						  	</div>
						  	
						  	
			<?php
		}
		}

			else
			{

			for ($i=$prev_room; $i < $val; $i++)
			{?>
		
				<div  id="room-<?php echo $i+1; ?>">
						<label for="pwd" class="topRmLabel">Room <?php echo $i+1; ?></label>
									<select name="adults[]" class="topdetMod">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								
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
						
						<div class="col-md-1 col-sm-2 col-xs-2 clone_me padding_h_5" id="child-<?php echo $count . $i; ?>">
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
		else 
		{
			for ($i=$prev_child; $i < $value; $i++)
			{
				?>
			
						<div class="col-md-1 col-sm-2 col-xs-2 clone_me padding_h_5" id="child-<?php echo $count . $i + 1; ?>">
												<select class="form_search" autocomplete="off" name="child_age[]"  >
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
</div>
			<?php
			}
		}
	}	
	
	
	
	
	
}
