<!DOCTYPE html>
<html>
<head>
<title> Booking Wings - Best Online Hotel Booking Website</title>
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
<body>

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
 
 <div class="col-md-8">
 <h6 class="newt">New Booking </h6>
<p class="newb">Please print and keep this voucher for your records. </p>
</div>
 <div class="col-md-4">
<h2 class="inv2 pull-right">Prepaid <br>
Hotel Voucher 
</h2>
</div>
</div>


<?php
		$this->db->select('*');		
		$this->db->where('email',$this->session->userdata['log_username']);
		$query= $this->db->get('tbl_user');
		$user_det = $query->result();
		
		 $booking_detail['user']	= $query->result();

		$this->db->select('*');
		$this->db->from('tbl_package_booking a');
		$this->db->join('tbl_package b','b.id=a.package_id');
		$this->db->where('a.user_id',$booking_detail['user'][0]->id);
		$this->db->order_by('a.id','desc');
		$query_id = $this->db->get();
		
		 $id_num =  $query_id->row();
	$hotel =  $id_num->hotel;
	
	
?>


</div>
</div>
<div id="print">
<div class=" col-md-12 pr bluebbe8">
<div class=" col-md-6">
<div class="bookingid ">
<p class="bookingidc">INVOICE DETAILS  </p>
</div>
</div>
<div class=" col-md-6">
<div class="bookingid pull-right"> 
<p class="bookingidc">Booking ID : <span><?php echo $id_num->id;?></span></p>
</div>
</div>
</div>
<div class="col-md-12 ">
<div class="hotel_Ingo  ">
<div class="col-md-3 logo_h">


<p class="hotl_id"><?php echo $id_num->title; ?> </p>
<!--<p class="hotl_id">Hotel ID 734555 </p>-->
<address class="address">
<?php echo $id_num->nights;?> Night(s), <?php echo $id_num->days;?> Day(s) Package
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
   <span class="col-md-8 cus-dt2"><?php echo date('F j, Y D', strtotime($id_num->check_in));?>  </span> </li>
   <li class="col-md-6 li_c"> 
   <span class="col-md-4 cus-dt">Check-out  </span>
   <span class="col-md-8 cus-dt2">
   <?php echo date('F j, Y D', strtotime($id_num->check_out)); ?>   </span> </li>
 </ul>
 
</div>
<?php 
 /* $diff = abs(strtotime($booking_detail['bookings']->check_in) - strtotime($booking_detail['bookings']->check_out)); 
 $years   = floor($diff / (365*60*60*24)); 
 $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
 $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); */
?>

</div>
</div>
<div class=" col-md-12  bluebbcus2">
<table class="detailst">
<tr>
<th>Hotel </th>
<th>Day/Night </th>
<th>No.Of Persons </th>
<th>Price/Person </th>
<th>Total Price </th>
</tr>

<tr>	
<td><?php if(($hotel==2)){ echo "2 star"; } if(($hotel==3)){ echo "3 Star"; } if(($hotel==4)){ echo "4 Star"; } if(($hotel==5)){ echo "5 Star"; } ?></td> 
<td ><?php echo $id_num->nights;?> Night(s), <?php echo $id_num->days;?> Day(s)</td>
<td><?php echo $person = $id_num->no_of_person;?></td> 
<td><?php echo $price = $id_num->price;?></td> 
<td><?php echo $person*$price ; ?></td> 			
</tr>
</table>


<?php
$veh_price ='';
if(!empty($id_num->vehicles) && ($id_num->vehicles!='null'))
{ 
	$vehicle = json_decode($id_num->vehicles);
	
?>
<br/><br/>
<table class="detailst">
<tr>
<th>Vehicle  </th>
<th >&nbsp;&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th>Capacity </th>
<th >&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th >&nbsp;&nbsp;</th>
<th>Total Price </th>
</tr>

<?php 
foreach($vehicle as $veh_id)
{ 
 $this->db->select('*');
$this->db->where('id',$veh_id);
$veh_query = $this->db->get('tbl_package_vehicle');
$res = $veh_query->row();
 ?>
<tr>	

<td ><?php echo $res->vehicle_name;?></td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td><?php echo  $res->capacity;?></td> 
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td><?php echo $res ->price;?></td> 			
</tr>
<?php 
$veh_price+=$res->price;
}?>
</table>

<?php }?>







</div>
<div class=" col-md-12  bluebbcus3 pr">
<?php if(!empty($id_num->request)) {?>

<p class="cant"><span>Other details</span></p>
<p class="canc">
<?php if(!empty($id_num->request))  { ?>
Special request : <?php echo $id_num->request.'</br>'; } ?>
</p>

<?php } ?>
<p class="cant"><span>Cancellation Policy </span></p>
<p class="canc">
The price includes 'Room  + Breakfast' and occupancy. 
Any cancellation received within 14 days prior to arrival date will incur the first night charge. 
Any cancellation received within 7 days prior to arrival date will incur the full period charge. 
Failure to arrive at your hotel will be treated as a No-Show and no refund will be given (Hotel policy). 
</p>
</div>
<div class=" col-md-12  bluebbcus4 pr">
<div class=" col-md-6">
<p class="price">INR  <?php echo ($person*$price)+$veh_price;?></p>
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
<li>Guest <?php //echo $booking_detail['user'][0]->first_name.' '.$booking_detail['user'][0]->last_name;?> is present, he/she has already paid but collect all extras directly</li>
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