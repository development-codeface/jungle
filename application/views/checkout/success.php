<!DOCTYPE html>
<html>
<head>
<title>Booking Wings - Best Online Hotel Booking Website </title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/social_buttons.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
<link href="<?php echo base_url();?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>css/custominv.css">
<link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80233127-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body class="suc_p">

<?php   $this->load->view('layout/header');   ?>
<?php   $this->load->view('layout/menu');   ?>
<div id="page-wrapper">
<div class="container  container_cus">
<div class="row bluebbcus">
	
<?php
   if($this->session->flashdata('msg')) {
   	echo $this->session->flashdata('msg');
   }
?>
	
<div class=" col-md-12 pr bluebbe">
<p class="print_icon_cus">
<a href="<?php echo base_url();?>hotels" ><i class="fa fa-home"></i></a>
<a href="" onclick="return printthis('print');"><i class="fa fa-print"></i></a>
</p>

<script type="text/javascript">
function printthis(print)
{
	var html="<html>";
				   html+= document.getElementById(print).innerHTML;
				
				   html+="</html>";
 var w = window.open('', '', 'resizeable,scrollbars');
 w.document.write('<html><head>');
 w.document.write('<link rel="stylesheet" href="'+baseurl+'css/bootstrap.css">');
 w.document.write('<link rel="stylesheet" href="'+baseurl+'css/main.css">');
 w.document.write('<link rel="stylesheet" href="'+baseurl+'css/custom.css">');
 w.document.write('<link rel="stylesheet" href="'+baseurl+'css/custominv.css">');
 w.document.write('</head><body>');
 w.document.write(html);
 w.document.write('</body></html>');
 w.document.close(); 
 javascript:w.print();
 w.close();
 return false;
}
</script>

<div class=" bluebb ">
 <div class="col-md-4" id="a">
<img src="<?php echo base_url();?>img/logo.png">
</div>
 <div class="col-md-8">
  <div class="col-md-7 main_t_in">
<h2 class="inv2 ">Prepaid 
Hotel Voucher 
</h2>
</div>
 <div class="col-md-5 pb_cs">
<p class="newb">Please print and keep this voucher for your records. </p>	
</div>

</div>

<?php
		$this->db->select('*');		
		$this->db->where('email',$this->session->userdata['log_username']);
		$query= $this->db->get('tbl_user');
		$user_det = $query->result();
		
 $booking_detail['user']	= $query->result();


	$this->db->select('booking_number')->where('user_id',$booking_detail['user'][0]->id);
	$this->db->order_by('id','desc');
	$query_id = $this->db->get('tbl_booking');
	
	$id_num =  $query_id->row();
	
	
	$this -> db-> select('a.title,a.logo_img, a.address, a.hotel_number,c.state, c.district, a.star_rating, d.thumb, b.*');
	$this -> db-> from('tbl_hotel a');
	$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
	$this -> db-> join('tbl_locations c', 'a.state = c.id');
	$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
	$this -> db	-> where('b.booking_number', $id_num->booking_number);
	$this -> db	-> group_by('b.booking_number');
	$get_query = $this -> db	-> get();
	$booking_detail['bookings'] = $get_query-> row();
	$category = $booking_detail['bookings']->category;
	
	if($category=='hotel')
	{
	$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults,b.conditions,b.services , b.normal_allowed_kids,d.*');
	$this -> db->	 from('tbl_hotel_room a');
	$this -> db->	 join('tbl_hotel_room_settings b', 'a.id = b.room_id');
	$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
	$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
	$this -> db->	 where('c.booking_number', $id_num->booking_number);
	}
	else
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults,b.conditions,b.services, d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('c.booking_number', $id_num->booking_number);
	}
	$room_query = $this -> db->	 get();
	$booking_detail['rooms']= $room_query-> result();
// print_r($booking_detail); exit;
?>


</div>
</div>
<div id="print">
<div class=" col-md-12 pr bluebbe8">
<div class=" col-md-6">
<div class="bookingid ">

</div>
</div>
<div class=" col-md-6">
<div class="bookingid pull-right"> 
<p class="bookingidc">Booking ID : <span><?php echo $booking_detail['bookings']->booking_number;?></span></p>
<p class="bookingidc">Hotel ID : <span><?php echo $booking_detail['bookings']->hotel_number;?></span></p>
</div>
</div>
</div>
<div class="col-md-12 ">
<div class="hotel_Ingo  ">
<div class="col-md-3 logo_h">

<img src="<?php echo base_url();?><?php echo $booking_detail['bookings']->logo_img; ?>" alt="Hotel Logo">
<p class="hotl_id"><?php echo $booking_detail['bookings']->title; ?> </p>
<!--<p class="hotl_id">Hotel ID 734555 </p>-->
<address class="address">
<?php //echo $booking_detail['bookings']->district.', '.$booking_detail['bookings']->state;
echo $booking_detail['bookings']->address; ?>
</address>
<!--<address class="address">
City : Kovalam
</address>-->
</div>
<div class="col-md-9 customer_details">
<?php //print_r($bookings);  ?>
 <ul>
 <li class="col-md-6 li_c"> <span class="col-md-6 cus-dt"> First Name</span><span class="col-md-6 cus-dt2"><?php echo $booking_detail['user'][0]->first_name;?> </span> </li>
 <li class="col-md-6 li_c"> <span class="col-md-6 cus-dt"> Last Name </span><span class="col-md-6 cus-dt2"><?php echo $booking_detail['user'][0]->last_name;?> </span> </li>
  <!--<li class="col-md-12 li_c"> <span class="col-md-5 cus-dt">Country of Passport </span><span class="col-md-5 cus-dt2"><?php echo $booking_detail['user'][0]->country;?> </span> </li>-->
   <li class="col-md-6 li_c"> 
   <span class="col-md-4 cus-dt">Check-in </span>
   <span class="col-md-8 cus-dt2"><?php echo date('F j, Y D', strtotime($booking_detail['bookings']->check_in));?>  </span> </li>
   <li class="col-md-6 li_c"> 
   <span class="col-md-4 cus-dt">Check-out  </span>
   <span class="col-md-8 cus-dt2">
   <?php echo date('F j, Y D', strtotime($booking_detail['bookings']->check_out)); ?>   </span> </li>
 </ul>
 
</div>
<?php 

$days = floor((strtotime($booking_detail['bookings']->check_out) - strtotime($booking_detail['bookings']->check_in))/(60*60*24));
?>

</div>
</div>
<div class=" col-md-12  bluebbcus2">
<table class="detailst">
<tr>
<th>Room Type </th>
<th>No. of Rooms </th>
<th>Max Occupancy </th>
<th>Price/Room </th>
<th>Night(s) </th>
<th>Total Price </th>
</tr>
<?php 

$total_rooms = '';
foreach($booking_detail['rooms'] as $room_detail) 
{
	 $total_rooms += $room_detail->number_of_rooms;  
}
$commision_price ='';

foreach($booking_detail['rooms'] as $room_detail) {
		
if( $room_detail->commision<>'')
{
	$commision_rate = $room_detail->commision/$room_detail->number_of_rooms;
	$commision_rate = $commision_rate/$days;
}
else
{
	$commision_rate='';
} 
?>
<tr>	
<td><?php echo $room_detail->room_title; ?></td> 
<td><?php echo $num_room = $room_detail->number_of_rooms; ?></td> 
<td >
								 <?php echo $room_detail->normal_allowed_adults;?>	<i class="fa fa-male"></i>
									<?php if(!empty($room_detail->normal_allowed_kids))
			{?>
				+ <?php echo $room_detail->normal_allowed_kids;?> <i class="fa fa-child"></i>
			<?php }?>
									</td>
<td>
<?php if($category=='hotel'){?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }else{ ?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }
									$each_room_price= $room_detail->room_rate+$commision_rate; 
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr') {
									echo $each_room_price;
									} else if(!$this->session->userdata('currency')) {
									echo $each_room_price;
									} else {
									echo convertCurrency($each_room_price, $this->session->userdata('default'), $this->session->userdata('currency'));
									}?></td> 
<td><?php echo $days ; ?></td> 
<td><?php if($category=='hotel'){?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }else{ ?>
									<span class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>">
									<?php }
									if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr') {
									 echo $each_room_price*$days*$num_room;
									 } else if(!$this->session->userdata('currency')) {
									 echo $each_room_price*$days*$num_room;
									 } else {
									 echo convertCurrency($each_room_price*$days*$num_room, $this->session->userdata('default'), $this->session->userdata('currency'));
									 }
									 ?></td> 
									 
									 

</tr>

<?php
$commision_price+= $room_detail->commision;
} 
?>
<tr>
	<?php
									if($category=='hotel')
									{?>
									<td data-label="" colspan="5">Taxes & service fee</td>
								<td data-label="Taxes & service fee" colspan=""><i class="fa fa-<?php if(!$this->session->userdata('currency')) echo "inr"; else echo  $this->session->userdata('currency'); ?>"></i> 
								<?php 
								if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
								echo $booking_detail['bookings']->tax;
								} else if(!$this->session->userdata('currency')){
								echo $booking_detail['bookings']->tax;
								} else {
								echo convertCurrency($booking_detail['bookings']->tax, $this->session->userdata('default'), $this->session->userdata('currency'));
								}?></td>
									<?php 
									}?>
</tr>
</table>
</div>
<div class=" col-md-12  bluebbcus3 pr">
<?php if(!empty($booking_detail['bookings']->request) || !empty($booking_detail['bookings']->arrival)) {?>

<p class="cant"><span>Other details</span></p>
<p class="canc">
<?php if(!empty($booking_detail['bookings']->request))  { ?>
Special request : <?php echo $booking_detail['bookings']->request.'</br>'; }
if(!empty($booking_detail['bookings']->arrival)) { ?>
Estimated arrival time : <?php echo $booking_detail['bookings']->arrival; } ?>
</p>

<?php } ?>



<?php if(!empty($booking_detail['rooms'][0]->services))  { ?>
<p class="cant"><span>Services  </span></p>
<div class="canc">
<!--<p class="canc">-->
<?php echo $booking_detail['rooms'][0]->services; ?>
<!--</p>-->
</div>
<?php } ?>
<br/>
<?php if(!empty($booking_detail['rooms'][0]->conditions))  { ?>
<p class="cant"><span>Cancellation Policy </span></p>
<div class="canc">
<!--<p class="canc">-->
<?php echo $booking_detail['rooms'][0]->conditions; ?>
<!--</p>-->
</div>
<?php } ?>




</div>
<div class=" col-md-12  bluebbcus4 pr">
<div class=" col-md-6">
<p class="price"><?php if(!$this->session->userdata('currency')) echo strtoupper('inr'); else echo strtoupper($this->session->userdata('currency'));
if($this->session->userdata('currency') == 'inr' && $this->session->userdata('default') == 'inr'){
echo number_format($booking_detail['bookings']->payment + $commision_price,2);
} else if(!$this->session->userdata('currency')) {
echo number_format($booking_detail['bookings']->payment + $commision_price,2);
} else {
echo convertCurrency($booking_detail['bookings']->payment + $commision_price, $this->session->userdata('default'), $this->session->userdata('currency'));
} ?></p>
</div>
<div class=" col-md-6 btm_c">
<div class="com_bottom">
<div class=" col-md-3">
<!--<img src="<?php echo base_url();?>img/logo_cus_b.png">-->
</div>
<div class=" col-md-9">
<p class="subt">Booked and Payable by </p>
<p class="subt2">Aman Hospitality Solutions</p>
</div>
</div>
</div>
</div>

<div class=" col-md-12  bluebbcus5 pr">

<ul class="botm_li">
<p class="ens">You need to ensure the following at check-in </p>
<li>Guest holds hotel voucher with the correct reservation details </li>
<li>Guest <?php echo $booking_detail['user'][0]->first_name.' '.$booking_detail['user'][0]->last_name;?> is present, he/she has already paid but collect all extras directly</li>
<li> Guest has valid photo ID </li>
</ul>


</div>


<div class=" col-md-12  bluebbcus6 pr">
<p class="ht_ads">
AMAN HOSPITALITY SOLUTIONS, Building No.6/349, Chekkittavilakom, Puthiyathura, Pulluvila P.O, Thiruvananthapuram, <br>Kerala 695526. E-mail : info@amanhts.com, Mob.No. : +918593948881, Tel.No. : +914712213881 <!--<br> General Questions bookingwings.com  | 
Booking Wings  instruction: Please have your UPC number and the hotel ID-->
</p>

</div></div>
</div>

</div>
<br/>
<?php   $this->load->view('layout/footer');   ?>


	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	

		
</body>
</html>