<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayurveda extends CI_Controller
{
	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
     	$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('Ayurveda_model');
		$this->load->model('session_search');
		$this->load->model('Hotel_detail_model');
		$this->load->model('Hotels_model');
        $this->load->library('Zebra_Pagination');
		date_default_timezone_set("Asia/Calcutta");
	 }
	 
	public function index()
	{
		$data['hotel'] = $this->Hotels_model->all_hotels();
		$this->load->view('hotel/list_old', $data);
	}
	
	function destination($pack)
	{
	$meta_url = $this->uri->segment(1);
	
	if($meta_url == 'ayurveda') {
		$meta_url = 'ayurveda packages';
	} else {
		$meta_url = 'hotel packages';
	}
			$query['hid_text'] = $pack;
			$data['hid_text'] = $pack;
			$data['hidden_search'] = $pack;

			$query['sub_cat_id'] = 7;
			$data['sub_cat_id'] = 7;
						$star_rating='';
		$price_range='';
		$loc_range='';
		$fac_range='';
		$hotName_range='';

			$query['pack_destination']		= $pack;
			 $data['pack_destination']=$pack;
			 $data['package']='';
			 $data['pack']='dest_pack';
			 
					if(!empty($query))	
					{  
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based_destination($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];																
						//$data['hid_text']		=  $this->session->userdata['datahere']['text_val'];
						//$data['pack_destination']		=   $this->session->userdata['datahere']['pack_destination'];
						$data['date_check']=$data['hotel'][1];
						$data['meta_title'] = $pack.' '.$meta_url. ' | Best packages - Book packages at discount price';
						$data['meta_desc'] = 'Here is a list of budget and luxury '.$pack.' '.$meta_url.' at discount prices with special offers for online booking and best packages with great deals.';
						
					}	


		$this->load->view('ayurveda/list_refine', $data);	

	}
	
	public function search($category)
	{
		$data['hotel'] = $this->Hotels_model->search($category);
		$this->load->view('hotel/list_old', $data);
	}
	
	public function search_keyword($category)
	{
		//echo $category = $this -> uri -> segment(3);
		$keyword = $this->input->get('term'); 
		$res = $this->Hotels_model->search_keyword($keyword,$category);		
		
		echo $res;
	}
	
	
	public function search_det()
	{
	
	$meta_url = $this->uri->segment(1);
	if($meta_url == 'ayurveda') {
		$meta_url = 'ayurveda packages';
	} else {
		$meta_url = 'hotel packages';
	}

		if(!empty($_POST['hidden_search']))
		{
			$query['hid_text']		= $_POST['hidden_search'];
			$data['hid_text']=$_POST['hidden_search'];

		} else if(!empty($_GET['hidden_search'])) {
			$query['hid_text']		= $_GET['hidden_search'];
			$data['hid_text']=$_GET['hidden_search'];
		}

		 if(!empty($this->session->userdata['datahere']['check_in']))
		{
			$query['check_in']		= $this->session->userdata['datahere']['check_in'];
			$data['check_in']=$this->session->userdata['datahere']['check_in'];

		} 
		if(!empty($this->session->userdata['datahere']['check_out']))
		{
			$query['check_out']		= $this->session->userdata['datahere']['check_out'];
			
			$data['check_out']=$this->session->userdata['datahere']['check_out'];
		}
		
		/* if(empty($this->session->userdata['datahere']['check_in']))
		{
			$query['check_in']		= $_GET['check_in'];
			$data['check_in']=$_GET['check_in'];
		}
		
		 if(empty($this->session->userdata['datahere']['check_out']))
		 {
			$query['check_out']		= $_GET['check_out'];
			
			$data['check_out']=$_GET['check_in'];
		 }
		 */
		
		if(!empty($_POST['category']))
		{
			$query['sub_cat_id']		= $_POST['category'];
			$data['sub_cat_id']=$_POST['category'];

		} else if(!empty($_GET['check_in'])) {
			$query['sub_cat_id']		= $_GET['category'];
			$data['sub_cat_id']=$_GET['category'];
		}

		if(!empty($_POST['packag']))
		{
			$query['package']		= $_POST['packag'];
			$data['package']=$_POST['packag'];
		} else if(!empty($_GET['packag'])) {
			$query['package']		= $_GET['packag'];
			  $data['package']=$_GET['packag']; 
		}
		
		if(empty($query['package']))
		{
				$query['package']	= '';
				$data['package']	= '';
				/* if(!empty($this->session->userdata['datahere']['package'])){
					$data['package']		=   $this->session->userdata['datahere']['package'];
				} */
		}
				
		if(!empty($_POST['pack_destination']))
		{
			$query['pack_destination']		= $_POST['pack_destination'];
			$data['pack_destination']=$_POST['pack_destination'];
		} else if(!empty($_GET['pack_destination'])) {
			$query['pack_destination']		= $_GET['pack_destination'];
			 $data['pack_destination']=$_GET['pack_destination']; 
		}		
		
				if(empty($query['pack_destination']))
				{
					$query['pack_destination']	= '';
					$data['pack_destination']	= '';
					/* if(!empty($this->session->userdata['datahere']['pack_destination'])){
						$data['pack_destination']		=   $this->session->userdata['datahere']['pack_destination'];
					} */
				}				

				
				if(!empty($this->session->userdata['datahere']['destination'])){
					$data['destination']		=   $this->session->userdata['datahere']['destination'];
					}
					if(!empty($this->session->userdata['datahere']['res_sub_cat_id'])){
						$data['res_sub_cat_id']		=   $this->session->userdata['datahere']['res_sub_cat_id'];
				}
		
		$star_rating='';
		$price_range='';
		$loc_range='';
		$fac_range='';
		$hotName_range='';
		
		$package = '';
		$pack_destination ='';

		
		if(!empty($_POST['checkedArray']))
		{
			$star_rating=$_POST['checkedArray'];

		} else if(!empty($_GET['checkedArray'])) {
			$star_rating=$_GET['checkedArray'];
		}
		
		if(!empty($_POST['checkedArray_price']))
		{
			$price_range=$_POST['checkedArray_price'];

		} else if(!empty($_GET['checkedArray_price'])) {
			$price_range=$_GET['checkedArray_price'];
		}

		if(!empty($_POST['checkedArray_loc']))
		{
			$loc_range=$_POST['checkedArray_loc'];

		} else if(!empty($_GET['checkedArray_loc'])) {
			$loc_range=$_GET['checkedArray_loc'];
		}

		if(!empty($_POST['checkedArray_fac']))
		{
			$fac_range=$_POST['checkedArray_fac'];

		} else if(!empty($_GET['checkedArray_fac'])) {
			$fac_range=$_GET['checkedArray_fac'];
		}

		if(!empty($_POST['checkedArray_hotelName']))
		{
			$hotName_range=$_POST['checkedArray_hotelName'];

		} else if(!empty($_GET['checkedArray_hotelName'])) {
			$hotName_range=$_GET['checkedArray_hotelName'];
		}
		
		if(!empty($_POST['pack']))
		{
			$pack=$_POST['pack'];
			$data['pack']=$pack;

		} else if(!empty($_GET['pack'])) {
			
			$pack=$_GET['pack'];
			$data['pack']=$pack;
		}
		
		if(empty($_GET['pack']))
		{	$query['pack']	= '';
				$data['pack']	= '';
		}
		if(empty($_POST['pack']))
		{	$query['pack']	= '';
				$data['pack']	= '';
		}
		
		if(!empty($_GET['price'])) {
			$data['price_sort']=$_GET['price'];
		}

		if(!empty($_GET['sub_catid'])) {
			$data['sub_cat_id']=$_GET['sub_catid'];
		}		

		//$data['text_val']="panchakarma";
		
					if(!empty($query) && !empty($pack_destination))	
					{  
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based_destination($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];																
						//$data['hid_text']		=  $this->session->userdata['datahere']['text_val'];
						$data['pack_destination']		=   $this->session->userdata['datahere']['pack_destination'];
						$data['date_check']=$data['hotel'][1];
						$data['meta_title'] = 'Best '.$meta_url. ' - Book packages at discount price';
						$data['meta_desc'] = 'Get best prices for Kerala '.$meta_url. ' from Booking Wings and enjoy the best packages at great deals.';						
						
					}	
					if(!empty($query) && !empty($package))	
					{
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based_package($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];																
						//$data['hid_text']		=  $this->session->userdata['datahere']['text_val'];
						$data['package']		=   $this->session->userdata['datahere']['package'];
						$data['date_check']=$data['hotel'][1];						
						$data['meta_title'] = 'Best '.$meta_url. ' - Book packages at discount price';
						$data['meta_desc'] = 'Get best prices for Kerala '.$meta_url. ' from Booking Wings and enjoy the best packages at great deals.';						
					}	
					if(!empty($query) && (empty($package) && empty($pack_destination)) )
					{ 
					//print_r($query); exit;
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
						$data['hotel']=$data['hotel'][0];																																	
						//$data['text_val']		=  $this->session->userdata['datahere']['text_val'];
						$data['date_check']=$data['hotel'][1];
						//$data['hid_text']		=  '';
						//$data['pack']="";
						if(!empty($query['package'])) {
						$data['meta_title'] = 'Ayurveda '.$query['package'].' Packages Treatments and Therapy | Kerala Ayurveda';
						$data['meta_desc'] = 'Get best prices for Kerala Ayurveda '.$query['package'].' packages from Booking Wings and enjoy the best '.$query['package'].' therapy treatment or packages at great deals.';
						} else {
						$data['meta_title'] = ucfirst($query['pack_destination']).' '.$meta_url. ' | Best packages - Book packages at discount price';
						$data['meta_desc'] = 'Here is a list of budget and luxury '.ucfirst($query['pack_destination']).' '.$meta_url.' at discount prices with special offers for online booking and best packages with great deals.';
						}
					}
					if(empty($query) && empty($package) && empty($pack_destination))
					{
						$data['hotel'] 			= '';
						$data['hid_text']		=  '';
						$data['meta_title'] = 'Best '.$meta_url. ' - Book packages at discount price';
						$data['meta_desc'] = 'Get best prices for Kerala '.$meta_url. ' from Booking Wings and enjoy the best packages at great deals.';
					}
					
					
		/* if(!empty($query))	
		{
			$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based($query,$star_rating,$price_range,$loc_range,$fac_range,$hotName_range);
			$data['hotel']=$data['hotel'][0];																																	
			$data['text_val']		=   $this->input->post('hidden-search');
			$data['date_check']=$data['hotel'][1];
			$data['text_val']		=  '';
		}	
		else
		{
			$data['hotel'] 			= '';
			$data['text_val']		=  '';
		} */	
//print_r($data); exit;
		$this->load->view('ayurveda/list_refine', $data);	

	}


	public function search_list()
	{
	$meta_url = $this->uri->segment(1);
	if($meta_url == 'ayurveda') {
		$meta_url = 'ayurveda packages';
	} else {
		$meta_url = 'hotel packages';
	}
				$star_rating=array();
				$hidden_search = $this->input->get('hidden_search');
				$check_in = $this->input->get('check_in');
				//$check_in = date("Y-m-d", strtotime($check_in));
				$check_out = $this->input->get('check_out');
				//$check_out = date("Y-m-d", strtotime($check_out));
				$sub_cat_id=$this->input->get('category');
				$package = $this->input->get('packag');
				$pack_destination = $this->input->get('pack_destination');
				//$pack_cat = $this->input->get('pack_cat');

				$data['hidden_search']=$hidden_search;
				$data['check_in']=$check_in;
				$data['check_out']=$check_out;
				$data['sub_cat_id']=$sub_cat_id;
				$data['package']=$package;
				$data['pack_destination']=$pack_destination;
				//$data['pack_cat']=$pack_cat;
					
				if(!empty($hidden_search))
				{
					$query['hid_text']		= trim($this->input->get('hidden_search'));
					//$query['text_val']		= explode(' ', $query['text_val']);
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
				if(!empty($sub_cat_id))
				{
					$query['sub_cat_id']	= $this->input->get('category');
					
				}	
				if(!empty($package))
				{
					$query['package']	= $this->input->get('packag');
					$data['package']		=   $this->input->get('packag');
				}
				if(empty($package))
				{
					$query['package']	= '';
					$data['package'] ='';
					/* if(!empty($this->session->userdata['datahere']['package'])){
						$data['package']		=   $this->session->userdata['datahere']['package'];
					} */
				}
				if(!empty($pack_destination))
				{
					$query['pack_destination']	= $this->input->get('pack_destination');
					$data['pack_destination']		=   $this->input->get('pack_destination');
				}
				if(empty($pack_destination))
				{
					$query['pack_destination']	= '';
					$data['pack_destination']		=  '';
					/* if(!empty($this->session->userdata['datahere']['pack_destination'])){
						$data['pack_destination']		=   $this->session->userdata['datahere']['pack_destination'];
					} */
				}				

				if(!empty($this->session->userdata['datahere']['destination'])){
						$data['destination']		=   $this->session->userdata['datahere']['destination'];
					}
					if(!empty($this->session->userdata['datahere']['res_sub_cat_id'])){
						$data['res_sub_cat_id']		=   $this->session->userdata['datahere']['res_sub_cat_id'];
					}
				
				
				

					if(!empty($query) && !empty($pack_destination))	
					{  
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based_destination($query);			//echo $this -> db -> last_query(); exit;
						$data['hotel']=$data['hotel'][0];					
						$data['hid_text']		=   $this->input->get('hidden_search');
						$data['date_check']=$data['hotel'][1];
						//$data['destination']		=   $this->input->get('destination');
						$data['date_check']=$data['hotel'][1]; 
						$data['pack']="dest_pack";
						$data['meta_title'] = ucfirst($pack_destination).' '.$meta_url. ' | Best packages - Book packages at discount price';
						$data['meta_desc'] = 'Here is a list of budget and luxury '.ucfirst($pack_destination).' '.$meta_url.' at discount prices with special offers for online booking and best packages with great deals.';
						
					}	
				
					if(!empty($query) && !empty($package))	
					{
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based_package($query);			//echo $this -> db -> last_query(); exit;
						$data['hotel']=$data['hotel'][0];					
						$data['hid_text']		=   $this->input->get('hidden_search');
						$data['date_check']=$data['hotel'][1];
						//$data['package_name']		=   $this->input->get('package');
						$data['date_check']=$data['hotel'][1]; 
						$data['pack']="ayur_pack";
						
						$data['meta_title'] = 'Ayurveda '.$package.' Packages Treatments and Therapy | Kerala Ayurveda';
						$data['meta_desc'] = 'Get best prices for Kerala Ayurveda '.$package.' packages from Booking Wings and enjoy the best '.$package.' therapy treatment or packages at great deals.';
						
					}	
					if(!empty($query) && (empty($package)) && empty($pack_destination))
					{ 
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based($query);			//echo $this -> db -> last_query(); exit;
						$data['hotel']=$data['hotel'][0];					
						$data['hid_text']		=   $this->input->get('hidden_search');
						$data['date_check']=$data['hotel'][1];
						$data['pack']="";
						
						$data['meta_title'] = 'Best '.$meta_url. ' - Book packages at discount price';
						$data['meta_desc'] = 'Get best prices for Kerala '.$meta_url. ' from Booking Wings and enjoy the best packages at great deals.';
					}
					if(empty($query) && empty($package) && empty($pack_destination))
					{ 
						$data['hotel'] 			= '';
						$data['hid_text']		=  '';
					}
				
				

					/* if(!empty($query))	
					{
						$data['hotel'][0] 		= $this->Ayurveda_model->all_hotels_search_based($query);			//echo $this -> db -> last_query(); exit;
						$data['hotel']=$data['hotel'][0];					
						$data['text_val']		=   $this->input->get('hidden-search');
						$data['date_check']=$data['hotel'][1];
					}	
					else
					{
						$data['hotel'] 			= '';
						$data['text_val']		=  '';
					}
				 */
				
				
				$this->session->set_userdata('datahere',$data);
				$this->session->set_userdata('query',$query);
				$this->load->view('ayurveda/list', $data);
		
	}
	
	public function rooms($val,$mode,$prev_room)
	{
		if($mode=='new')
		{
			for($i=1;$i<=$val;$i++)
			{
				?>
						  	<div class="col-md-12 modufy-search-cus_block2" id="room-<?php echo $i; ?>">
						  		<div id="age-<?php echo $i; ?>">
						  	<div class="col-md-3 col-sm-4 col-xs-5   modufy_search_block_cus prr">
						  		<label for="pwd" class="rooms_cus_title">Adult(s)</label>
						  		<select name="adults[]">
						  			<option value="1" >1</option>
						  			<option value="2" >2</option>
						  			<option value="3" >3</option>
						  			<option value="4" >4</option>
						  		</select>
						  	</div>
						  	
						  	<div class="col-md-3 col-sm-4 col-xs-5  modufy_search_block_cus prr">
						  		<label for="pwd" class="rooms_cus_title">Children(s)</label>
						  		<select id="childrens-<?php echo $i; ?>" name="childrens[]" onchange="childs_modify(<?php echo $i; ?>);">
									<option value="0" >0</option>
						  			<option value="1" >1</option>
						  			<option value="2" >2</option>
						  			<option value="3" >3</option>
						  			<option value="4" >4</option>
						  		</select>
						  	</div>
						  	</div>
						  	</div>
						  	
						  	<input type="hidden"  id="prev-childs-<?php echo $i; ?>" value="0" />
			<?php
		}
		}

			else
			{

			for ($i=$prev_room; $i < $val; $i++)
			{?>
						  	<div class="col-md-12 modufy-search-cus_block2" id="room-<?php echo $i + 1; ?>">
						  		<div id="age-<?php echo $i + 1; ?>">
						  	<div class="col-md-3  col-xs-5  col-sm-4   modufy_search_block_cus prr ">
						  		<label for="pwd" class="rooms_cus_title">Adult(s)</label>
						  		<select name="adults[]">
						  			<option value="1" >1</option>
						  			<option value="2" >2</option>
						  			<option value="3" >3</option>
						  			<option value="4" >4</option>
						  		</select>
						  	</div>
						  	
						  	<div class="col-md-3  col-xs-5  col-sm-4    modufy_search_block_cus prr">
						  		<label for="pwd" class="rooms_cus_title">Children(s)</label>
						  		<select id="childrens-<?php echo $i+1; ?>" name="childrens[]" onchange="childs_modify(<?php echo $i + 1; ?>);">
						  			<option value="0" >0</option>
									<option value="1" >1</option>
						  			<option value="2" >2</option>
						  			<option value="3" >3</option>
						  			<option value="4" >4</option>
						  		</select>
						  	</div>
						  	</div>
						  	</div>
						  	
						  	<input type="hidden"  id="prev-childs-<?php echo $i + 1; ?>" value="0" />
							<div class="clone-all">	
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
