<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('text');
		$this -> load -> library('pagination');
		$this->load->model('Profilemodel');
		$this->load->model('Offline_model');
		$this->load->model('Report_model');		
		$this->load->model('Bookingmodel');
		if(!isset($this->session->userdata['hotel_adminusername']))
		{
				redirect('login');
		}
	}
	
	
	function index()
	 {		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('report/index');
		$this -> load -> view('layout/footer');
	 }
	 
	 
	function monthly()
	{
		$username 					= $this -> session -> userdata['hotel_adminusername'];
		$id							= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu']= $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data['title'] = 'Expected Arrivals';
		
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('41', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('report/report', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('report/report', $data);
		}
		//$this -> load -> view('report/report', $data);
		$this -> load -> view('layout/footer');
		
	}
	
	
	function monthly_bookings()
	{
		$data['title'] = 'Monthly Bookings';
		$username 					= $this -> session -> userdata['hotel_adminusername'];
		$id							= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu']= $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('42', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('report/report', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('report/report', $data);
		}
		//$this -> load -> view('report/report', $data);
		$this -> load -> view('layout/footer');
	}
	
	function checkin($m='')
	{
		$data['title'] = 'Check-in';
		
		if(empty($m)) {
		$this -> load -> view('layout/header');
		$this -> load -> view('report/checkin', $data);
		$this -> load -> view('layout/footer');
		} else {
			
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);

		$date = $m.'01';
		$end = $m . date('t', strtotime($date)); //get end date of month
		?>
		
		<tbody>
			<tr>
				<th>Room Type</th>
				
		<?php
		while(strtotime($date) <= strtotime($end)) 
		{
			$day_num = date('d', strtotime($date));
			$day_name = date('l', strtotime($date));
			$name = substr($day_name, 0, 3);
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			echo "<td>$day_num <br/> $name</td>";
		}
		
		$data['room'] = $this -> Report_model -> room($id);
		
		?>
		
		</tr>
		
		<?php foreach($data['room'] as $type) {
    	$a=0;
    	?>
    	
    	<tr>
    		
    	<?php echo "<th>$type->room_title</th>"; 
		
		$data['room_set'] = $this -> Report_model -> room_set($type -> room_id);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		
		$i = 0;
		
		while(strtotime($date) <= strtotime($end)) 
		{
			$count = 0;
			
			foreach($data['room_set'] as $set) {
			$num =  $this -> Report_model -> checkin_rooms($set->id, $date); 
			//echo $num;
			$count+= $num;
			}
			if(empty($count)) $count = '';
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			$i++;
		}
		
    	
    	?>
    	</tr>
    	<?php
		}
		?>
		
		<tr>
		<th>Total</th>
		<?php
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		while(strtotime($date) <= strtotime($end))
		{
			
			$num =  $this -> Report_model -> checkin_rooms_total($date, $id);
			//$count+= $num;
			if(empty($num)) $num = '';
			echo "<td>$num</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			
		}
		?>
		
		</tr>
		</tbody>
		
	<?php			
		}
	}
	
	function checkout($m='')
	{
		$data['title'] = 'Check-out';
		
		if(empty($m)) {
		$this -> load -> view('layout/header');
		$this -> load -> view('report/checkin', $data);
		$this -> load -> view('layout/footer');
		} else {
			
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);

		$date = $m.'01';
		$end = $m . date('t', strtotime($date)); //get end date of month
		?>
		
		<tbody>
			<tr>
				<th>Room Type</th>
				
		<?php
		while(strtotime($date) <= strtotime($end)) 
		{
			$day_num = date('d', strtotime($date));
			$day_name = date('l', strtotime($date));
			$name = substr($day_name, 0, 3);
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			echo "<td>$day_num <br/> $name</td>";
		}
		
		$data['room'] = $this -> Report_model -> room($id);
		
		?>
		
		</tr>
		
		<?php foreach($data['room'] as $type) {
    	$a=0;
    	?>
    	
    	<tr>
    		
    	<?php echo "<th>$type->room_title</th>"; 
		
		$data['room_set'] = $this -> Report_model -> room_set($type -> room_id);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		
		$i = 0;
		
		while(strtotime($date) <= strtotime($end)) 
		{
			$count = 0;
			
			foreach($data['room_set'] as $set) {
			$num =  $this -> Report_model -> checkout_rooms($set->id, $date);
			//echo $num;
			$count+= $num;
			}
			if(empty($count)) $count = '';
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			$i++;
		}
		
    	
    	?>
    	</tr>
    	<?php
		}
		?>
		
		<tr>
		<th>Total</th>
		<?php
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		while(strtotime($date) <= strtotime($end))
		{
			
			$num =  $this -> Report_model -> checkout_rooms_total($date, $id);
			//$count+= $num;
			if(empty($num)) $num = '';
			echo "<td>$num</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			
		}
		?>
		
		</tr>
		</tbody>
		
	<?php			
		}
	}
	
	function agency($from='', $to='', $agency='')
	{
		$data['title'] = 'Agency Bookings';
		
		if(!empty($from)) { $from = date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d'); }
		if(!empty($to)) { $to = date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d'); }
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		
		$data['tbl_agency'] = $this -> Report_model -> getAgency($id);
		
		if(empty($from) && empty($from) && empty($agency)) {
		$this -> load -> view('layout/header');
		$this -> load -> view('report/agency', $data);
		$this -> load -> view('layout/footer');
		}
		else {
		$config['base_url'] 	= site_url('report/agency/'.date_format(date_create_from_format('Y-m-d', $from), 'd-m-Y').'/'.date_format(date_create_from_format('Y-m-d', $to), 'd-m-Y').'/'.$agency);
		$config['total_rows'] 	= $this -> Report_model -> getBookings_count($from,$to,$agency,$id);
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 6;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);
		
		$data['page'] 			= ($this -> uri -> segment(6)) ? $this -> uri -> segment(6) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		$data['book_total']		= $this -> Report_model -> getBookings_total($from,$to,$agency, $id);
		$data['tbl_booking']	= $this -> Report_model -> getBookings($from,$to,$agency, $id, $config["per_page"], $data['page']);
		$data['rows']			= $config["total_rows"];
		
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('report/agency', $data);
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/footer'); }
		}
	}

	function direct($from='', $to='')
	{
		$data['title'] = 'Direct Bookings';
		
		if(!empty($from)) { $from = date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d'); }
		if(!empty($to)) { $to = date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d'); }
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id	= $this->Profilemodel->get_id($username);
		
		if(empty($from) && empty($to)) {
		$this -> load -> view('layout/header');
		$this -> load -> view('report/direct', $data);
		$this -> load -> view('layout/footer');
		}
		else {
			
		$config['base_url'] 	= site_url('report/direct/'.date_format(date_create_from_format('Y-m-d', $from), 'd-m-Y').'/'.date_format(date_create_from_format('Y-m-d', $to), 'd-m-Y'));


		$config['total_rows'] 	= $this -> Report_model -> getDirect_count($from,$to,$id);
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 5;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
 		
		$data['page'] 			= ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		$data['book_total']		= $this -> Report_model -> getDirect_total($from,$to,$id);
		$data['tbl_booking']	= $this -> Report_model -> getDirect($from,$to,$id,$config["per_page"],$data['page']);
		$data['rows']			= $config["total_rows"];
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('report/direct', $data);
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/footer'); }
		}
	}

	function online($from='',$to='')
	{
		$data['title'] = 'Online Bookings';
		
		if(!empty($from)) { $from = date_format(date_create_from_format('d-m-Y', $from), 'Y-m-d'); }
		if(!empty($to)) { $to = date_format(date_create_from_format('d-m-Y', $to), 'Y-m-d'); }
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id	= $this->Profilemodel->get_id($username);
		
		if(empty($from) && empty($to)) {
		$this -> load -> view('layout/header');
		$this -> load -> view('report/online', $data);
		$this -> load -> view('layout/footer');
		}
		else {
		$config['base_url'] 	= site_url('report/online/'.date_format(date_create_from_format('Y-m-d', $from), 'd-m-Y').'/'.date_format(date_create_from_format('Y-m-d', $to), 'd-m-Y'));
		$config['total_rows'] 	= $this -> Report_model -> getOnline_count($from,$to,$id);
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 5;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
 		
		$data['page'] 			= ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		$data['book_total']		= $this -> Report_model -> getOnline_total($from,$to,$id);
		$data['tbl_booking']	= $this -> Report_model -> getOnline($from,$to,$id,$config["per_page"],$data['page']);
		$data['rows']			= $config["total_rows"];		
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		$this -> load -> view('report/online', $data);
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/footer'); }
		}
	}

	
	function noshow($date='')
	{
		$data['title'] = 'No Show Bookings';
		
		$username = $this->session->userdata['hotel_adminusername'];
		$id	= $this->Profilemodel->get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu']= $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		
if(empty($date)) {
	 	$this -> load -> view('layout/header'); 
		if(!empty($data_menu['menu']))
		{	if(in_array('45', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('report/noshow', $data); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('report/noshow', $data);
		}
		//$this -> load -> view('report/noshow', $data);
	 	$this -> load -> view('layout/footer'); 
}
else {
		$start = $date.'-01';
		$end = $date.'-'. date('t', strtotime($start));
		
		$config['base_url'] 	= site_url('report/noshow/'.$date);
		$config['total_rows'] 	= $this -> Report_model -> noshow_count($id,$start,$end); 
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 4;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
 		
		$this -> pagination -> initialize($config);
 		
		$data['date']			= $date;
		$data['page'] 			= ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;
		$data['pagination'] 	= $this -> pagination -> create_links();
		$data['tbl_booking']	= $this -> Report_model -> noshow($id,$start,$end,$config["per_page"],$data['page']);

		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/header'); }
		
		$this -> load -> view('report/noshow', $data);
		if (!$this->input->is_ajax_request()) {
	 	$this -> load -> view('layout/footer'); }
}
	}

	function bookings() {
		$username	= $this -> session -> userdata['hotel_adminusername'];
		$id 		= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu']= $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data1['agency_list']	= $this -> Offline_model -> agency($id);
		

			$data1['b_no']	= $this -> input -> get('b_no');
			$data1['name']	= $this -> input -> get('name');
			$data1['source']= $this -> input -> get('source');
			$data1['agency']= $this -> input -> get('agency');
			$from			= $this -> input -> get('from');
			$to				= $this -> input -> get('to');
			$data1['status']= $this -> input -> get('status');
			if(!empty($from)) {
			$data1['from']	= date_format(date_create_from_format('d-m-Y',$from), 'Y-m-d');
			} else {
			$data1['from']	= '';
			}
			
			if(!empty($to)) {			
			$data1['to']	= date_format(date_create_from_format('d-m-Y',$to), 'Y-m-d');
			} else {
			$data1['to']	= '';
			}
			
		if (count($_GET) > 0) {
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); }
		$config['base_url'] 	= site_url('report/bookings/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);	
		
		if(!empty($data1)) {
		$config['total_rows'] 	= $this -> Report_model -> countBookings($data1, $id);
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);

		$data1['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data1['pagination'] 	= $this -> pagination -> create_links();
		$data1['results']		= $this -> Report_model -> bookings($data1,$id,$config["per_page"],$data1['page']);
		//echo '1'; exit;
		}
			
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('43', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('report/bookings',$data1);}
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{ $this -> load -> view('report/bookings',$data1);
		}
		//$this -> load -> view('report/bookings',$data1);
		
	 	$this -> load -> view('layout/footer'); 
	}

	function bookingsExcel()
	{
		$username	= $this -> session -> userdata['hotel_adminusername'];
		$id 		= $this -> Profilemodel -> get_id($username);
        //load our new PHPExcel library
        $this->load->library('Excel');
		
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
		
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Bookings list');
		
        //set coloumn width
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(14);

		$data1['b_no']	= $this -> input -> get('b_no');
		$data1['name']	= $this -> input -> get('name');
		$data1['source']= $this -> input -> get('source');
		$data1['agency']= $this -> input -> get('agency');
		$from			= $this -> input -> get('from');
		$to				= $this -> input -> get('to');
		$data1['status']= $this -> input -> get('status');
		
		if(!empty($from)) {
		$data1['from']	= $from;
		} else {
		$data1['from']	= '';
		}
		
		if(!empty($to)) {			
		$data1['to']	= $to;
		} else {
		$data1['to']	= '';
		}
			
        // get data in array format
		$results		= $this -> Report_model -> bookingsExcel($data1, $id);
		
		$a[] = array(
		'Sl no.',
		'Booking no.',
		'Check-in',
		'Check-out',
		'Name',
		'Total Rooms',
		'Source',
		'Amount',
		'Commission',
		'Status');
		
		if(!empty($results)) {
				$i=1;
			foreach ($results as $a_result) {
				if($a_result -> offline_user != 0) {
					$source = 'Direct';
				}
				else if($a_result -> user_id != 0) {
					$source = 'Online';
				}
				else if($a_result -> agency != 0) {
					$source = 'Agency';
				}
				if($a_result -> reservation = 1) {
					$source = 'Hotel';
				}
				if($a_result -> status == 0) {
					$status = 'Blocked';
				} else {
					$status = 'Reserved';
				}
				if(!empty($a_result -> commision)) {
					$comm = $a_result -> commision;
} else {
	$comm = '';
}

$rooms = $this -> Report_model -> getRooms($a_result -> booking_number);
$agency = $this -> db
-> where('id', $data1['agency'])
-> get('tbl_agency')
-> row();

$a[] = array(
	$i,
	$a_result -> booking_number,
	date_format(date_create_from_format('Y-m-d',$a_result -> check_in), 'd/m/Y'),
	date_format(date_create_from_format('Y-m-d',$a_result -> check_out), 'd/m/Y'),
	$a_result -> name,
	$rooms -> number_of_rooms,
	$source,
	$a_result -> total_amount,
	$comm,
	$status,
);
$i++;
} }

		$b[] = array(
		'Booking no.',
		'Guest Name',
		'Source',
		'Agency',
		'From',
		'To',
		'Status');
		
		!empty($from) ? $efr = date_format(date_create_from_format('Y-m-d',$from), 'd/m/Y') : $efr = '';
		!empty($to) ? $eto = date_format(date_create_from_format('Y-m-d',$to), 'd/m/Y') : $eto = '';
		
		$b[] = array(
		$data1['b_no'],
		$data1['name'],
		$data1['source'],
		!empty($agency) ? $agency -> agency : '',
		$efr,
		$eto,
		$status);
		
		$c = array(
		'font' => array('bold' => true),
		'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
		);
		
		$cnt = count($a) + 5;
		$end = $cnt - 2;
		
		//setting security
		$this->excel->getActiveSheet()->getProtection()->setSheet(true);

		// read data to active sheet
		$this->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($c);
		
		$this->excel->getActiveSheet()->fromArray($b);
		
		$this->excel->getActiveSheet()->fromArray($a,'','A4');
		
		$this->excel->getActiveSheet()->mergeCells('A'.$cnt.':G'.$cnt);
		$this->excel->getActiveSheet()->setCellValue('A'.$cnt, 'Total');
		$this->excel->getActiveSheet()->getStyle('A'.$cnt)->applyFromArray($c);
		
		$this->excel->getActiveSheet()->setCellValue('I'.$cnt, '=SUM(I5:I'.$end.')');
		$this->excel->getActiveSheet()->getCell('I'.$cnt)->getCalculatedValue();
		
		$this->excel->getActiveSheet()->setCellValue('H'.$cnt, '=SUM(H5:H'.$end.')');
		$this->excel->getActiveSheet()->getCell('H'.$cnt)->getCalculatedValue();
 
        $filename='Bookings.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
	}


	function check_in_out() {
		$username	= $this -> session -> userdata['hotel_adminusername'];
		$id 		= $this -> Profilemodel -> get_id($username);
		if($this->session->userdata['user_type']=='staff')
		{ $data_menu['menu']= $this->Profilemodel->select_menu($username,$id); }
		else{ $data_menu['menu']=''; }
		
		$data1['agency_list']	= $this -> Offline_model -> agency($id);
		

			$data1['b_no']	= $this -> input -> get('b_no');
			$data1['name']	= $this -> input -> get('name');
			$data1['source']= $this -> input -> get('source');
			$data1['agency']= $this -> input -> get('agency');
			$from			= $this -> input -> get('from');
			$to				= $this -> input -> get('to');
			$data1['status']= $this -> input -> get('status');
			if(!empty($from)) {
			$data1['from']	= date_format(date_create_from_format('d-m-Y',$from), 'Y-m-d');
			} else {
			$data1['from']	= '';				
			}
			
			if(!empty($to)) {			
			$data1['to']	= date_format(date_create_from_format('d-m-Y',$to), 'Y-m-d');
			} else {
			$data1['to']	= '';				
			}
			
		if (count($_GET) > 0) {
		$config['suffix']		= '?' . http_build_query($_GET, '', "&"); }
		$config['base_url'] 	= site_url('report/check_in_out/');
		$config['first_url']	= $config['base_url'].'?'.http_build_query($_GET);	
		
		if(!empty($data1)) {
		$config['total_rows'] 	= $this -> Report_model -> countBookings($data1, $id); 
		$config['per_page'] 	= 15;
		$config["uri_segment"] 	= 3;
		$choice 				= $config["total_rows"] / $config["per_page"];
		$config["num_links"] 	= floor($choice);
		
		$this -> pagination -> initialize($config);

		$data1['page'] 			= ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;
		$data1['pagination'] 	= $this -> pagination -> create_links();
		$data1['results']		= $this -> Report_model -> bookings($data1,$id,$config["per_page"],$data1['page']); }
			
	 	$this -> load -> view('layout/header');
		if(!empty($data_menu['menu']))
		{	if(in_array('44', json_decode($data_menu['menu']))==1)
			{ $this -> load -> view('report/check_in_out',$data1); }
			else{ $this->load->view('layout/no_permission');}
		}
		else
		{$this -> load -> view('report/check_in_out',$data1);
		}
		//$this -> load -> view('report/check_in_out',$data1);
	 	$this -> load -> view('layout/footer');
	}


	function c_in_outExcel()
	{
	
		$username	= $this -> session -> userdata['hotel_adminusername'];
		$id 		= $this -> Profilemodel -> get_id($username);
        //load our new PHPExcel library
        $this->load->library('Excel');
		
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
		
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Check-in-out list');
		
        //set coloumn width
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(14);

		$data1['b_no']	= $this -> input -> get('b_no');
		$data1['name']	= $this -> input -> get('name');
		$data1['source']= $this -> input -> get('source');
		$data1['agency']= $this -> input -> get('agency');
		$from			= $this -> input -> get('from');
		$to				= $this -> input -> get('to');
		$data1['status']= $this -> input -> get('status');
		if(!empty($from)) {
		$data1['from']	= $from; }
		
		if(!empty($to)) {			
		$data1['to']	= $to; }
			
        // get all users in array format
		$results		= $this -> Report_model -> bookingsExcel($data1,$id);
		
		$a[] = array(
		'Sl no.',
		'Booking no.',
		'Check-in',
		'Check-out',
		'Name',
		'Total Rooms',
		'Source',
		'Amount',
		'Commission',
		'Status');
		
		if(!empty($results)) {
				$i=1;
			foreach ($results as $a_result) {
				if($a_result -> offline_user != 0) {
					$source = 'Direct';
				}
				else if($a_result -> user_id != 0) {
					$source = 'Online';
				}
				else if($a_result -> agency != 0) {
					$source = 'Agency';
				}
				if($a_result -> reservation = 1) {
					$source = 'Hotel';
				}
				if($a_result -> status == 2) {
					$status = 'Checked-in';
				} else {
					$status = 'Checked-out';
				}
				if(!empty($a_result -> commision)) {
					$comm = $a_result -> commision;
} else {
	$comm = '';
}

$rooms = $this -> Report_model -> getRooms($a_result -> booking_number);
$agency = $this -> db
-> where('id', $data1['agency'])
-> get('tbl_agency')
-> row();

$a[] = array(
$i,
	$a_result -> booking_number,
	date_format(date_create_from_format('Y-m-d',$a_result -> check_in), 'd/m/Y'),
	date_format(date_create_from_format('Y-m-d',$a_result -> check_out), 'd/m/Y'),
	$a_result -> name,
	$rooms -> number_of_rooms,
	$source,
	$a_result -> total_amount,
	$comm,
	$status,
);
$i++;
} }

		$b[] = array(
		'Booking no.',
		'Guest Name',
		'Source',
		'Agency',
		'From',
		'To',
		'Status');
		
		!empty($from) ? $efr = date_format(date_create_from_format('Y-m-d',$from), 'd/m/Y') : $efr = '';
		!empty($to) ? $eto = date_format(date_create_from_format('Y-m-d',$to), 'd/m/Y') : $eto = '';
		
		$b[] = array(
		$data1['b_no'],
		$data1['name'],
		$data1['source'],
		!empty($agency) ? $agency -> agency : '',
		$efr,
		$eto,
		$status);
		
		$c = array(
		'font' => array('bold' => true),
		'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
		);
		
		$cnt = count($a) + 5;
		$end = $cnt - 2;
		
		//setting security
		$this->excel->getActiveSheet()->getProtection()->setSheet(true);

		// read data to active sheet
		$this->excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($c);
		
		$this->excel->getActiveSheet()->fromArray($b);

		// read data to active sheet
		$this->excel->getActiveSheet()->fromArray($a,'','A4');
		
		$this->excel->getActiveSheet()->mergeCells('A'.$cnt.':G'.$cnt);
		$this->excel->getActiveSheet()->setCellValue('A'.$cnt, 'Total');
		$this->excel->getActiveSheet()->getStyle('A'.$cnt)->applyFromArray($c);
		
		$this->excel->getActiveSheet()->setCellValue('I'.$cnt, '=SUM(I5:I'.$end.')');
		$this->excel->getActiveSheet()->getCell('I'.$cnt)->getCalculatedValue();
		
		$this->excel->getActiveSheet()->setCellValue('H'.$cnt, '=SUM(H5:H'.$end.')');
		$this->excel->getActiveSheet()->getCell('H'.$cnt)->getCalculatedValue();
		
        $filename='Check-in-out.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
	}

	
	function detail($booking_number,$offline_user,$category)
	 {
		
	 	$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username); 
		
		//online booking
		if($offline_user == 0)
		{
			if($category=='hotel')
			{
			$data['results']=$this->Bookingmodel->details_view($booking_number,$id);
			}
			else
			{
				$data['results']=$this->Bookingmodel->details_view_package($booking_number,$id);
			}
			
			
		}
		//offline booking
		else 
		{
			$agency = $this->Bookingmodel->agency_check($booking_number,$id);
			//echo $this -> db -> last_query(); exit;
			//agency offline booking
			if($agency[0]->agency<>'0')
			{
				if($category=='hotel')
				{
				$data['results']=$this->Bookingmodel->details_view_off_agency($booking_number,$id);
				}
				else
				{
					
				$data['results']=$this->Bookingmodel->details_view_off_agency_package($booking_number,$id);
				}
			
			}
			//direct offline booking
			else
			{
				if($category=='hotel')
				{
					$data['results']=$this->Bookingmodel->details_view_off($booking_number,$id);
				}
				else
				{
				$data['results']=$this->Bookingmodel->details_view_off_package($booking_number,$id);
				}
				
			}
		 }
		
	 	$this -> load -> view('layout/header');
		$this -> load -> view('report/detail',$data);
		$this -> load -> view('layout/footer');
		
	 }
	
	function day_names($m)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date)); //get end date of month
		?>
		
		<tbody>
			<tr>
				<th>Room Type</th>
				
		<?php
		while(strtotime($date) <= strtotime($end)) 
		{
			$day_num = date('d', strtotime($date));
			$day_name = date('l', strtotime($date));
			$name = substr($day_name, 0, 3);
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			echo "<td>$day_num <br/> $name</td>";
		}
		
		$data['room'] = $this -> Report_model -> room($id);
		
		?>
		
		</tr>
		
		<?php foreach($data['room'] as $type) {
    	$a=0;
    	?>
    	
    	<tr>
    		
    	<?php echo "<th>$type->room_title</th>"; 
		
		$data['room_set'] = $this -> Report_model -> room_set($type -> room_id);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		
		$i = 0;
		
		while(strtotime($date) <= strtotime($end)) 
		{
			$count = 0;
			foreach($data['room_set'] as $set) {
			$num =  $this -> Report_model -> num_rooms($set->id, $date);
			$count+= $num -> number_of_rooms;
			}
			//$count = $num -> number_of_rooms;
			if(empty($count)) $count = '';
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			$i++;
		}
    	
    	?>
    	</tr>
    	<?php
		}
		?>
		
		<tr>
		<th>Total</th>
		<?php
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		while(strtotime($date) <= strtotime($end))
		{
			
			$num =  $this -> Report_model -> num_total($date, $id);
			$count = $num -> number_of_rooms;
			
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			
		}
		?>
		
		</tr>
		</tbody>
		
	<?php
	}



	function day_names1($m)
	{
		$username = $this->session->userdata['hotel_adminusername'];
		$id= $this->Profilemodel->get_id($username);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date)); //get end date of month
		?>
		
		<tbody>
			<tr>
				<th>Room Type</th>
				
		<?php
		while(strtotime($date) <= strtotime($end)) 
		{
			$day_num = date('d', strtotime($date));
			$day_name = date('l', strtotime($date));
			$name = substr($day_name, 0, 3);
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			echo "<td>$day_num <br/> $name</td>";
		}
		
		$data['room'] = $this -> Report_model -> room($id);
		
		?>
		
		</tr>
		
		<?php foreach($data['room'] as $type) {
    	$a=0;
    	?>
    	
    	<tr>
    		
    	<?php echo "<th>$type->room_title</th>"; 
		
		$data['room_set'] = $this -> Report_model -> room_set($type -> room_id);
		
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		
		$i = 0;
		
		while(strtotime($date) <= strtotime($end)) 
		{
			$count = 0;
			
			foreach($data['room_set'] as $set) {
			$num =  $this -> Report_model -> num_rooms_between($set->id, $date);
			$count+= $num -> rooms;
			}
			if(empty($count)) $count = '';
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			$i++;
		}
    	
    	?>
    	</tr>
    	<?php
		}
		?>
		
		<tr>
		<th>Total</th>
		<?php
		$date = $m.'01';
		$end = $m . date('t', strtotime($date));
		while(strtotime($date) <= strtotime($end))
		{
			
			$num =  $this -> Report_model -> num_total_between($date, $id);
			$count = $num -> total;
			
			echo "<td>$count</td>";
			
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			
		}
		?>
		
		</tr>
		</tbody>
		
	<?php
	}

}
?>