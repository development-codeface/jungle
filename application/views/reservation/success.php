<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="One of the best online hotel booking website provides great deals, discounts and offers – book budget hotels, star hotels, resorts and homestay in Kerala." name="description">
<meta content="" name="author">

<?php	

	$id_num =  $this -> input -> get('book_no');
	
	
	$this -> db-> select('a.title,a.logo_img, a.address, a.hotel_number,a.phone as hotel_phone,c.state, c.district, a.star_rating, d.thumb, b.*');
	$this -> db-> from('tbl_hotel a');
	$this -> db-> join('tbl_booking b', 'b.hotel_id = a.id');
	$this -> db-> join('tbl_locations c', 'a.state = c.id');
	$this -> db	-> join('tbl_hotel_image d', 'a.id = d.hotel_id');
	$this -> db	-> where('b.booking_number', $id_num);
	$this -> db	-> group_by('b.booking_number');
	$get_query = $this -> db	-> get();
	$booking_detail['bookings'] = $get_query-> row();
	//print_r($booking_detail); 
	
	$h_id=$this->encrypt->encode($booking_detail['bookings'] -> hotel_id);
	$h_id=str_replace(array('+', '/', '='), array('-', '_', '~'), $h_id);
	
	$category = $booking_detail['bookings']->category;
		
		$this->db->where('id',$booking_detail['bookings']->user_id);
		$query= $this->db->get('tbl_user');
		$user_det = $query->result();
		$booking_detail['user']	= $query->row();
		
	if($category=='hotel')
	{
	$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults,b.conditions,b.services , b.normal_allowed_kids,d.*');
	$this -> db->	 from('tbl_hotel_room a');
	$this -> db->	 join('tbl_hotel_room_settings b', 'a.id = b.room_id');
	$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
	$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
	$this -> db->	 where('c.booking_number', $id_num);
	}
	else
	{
		$this -> db-> select('a.room_title, c.*, b.normal_allowed_adults,b.conditions,b.services, d.*');
		$this -> db->	 from('tbl_hotel_room a');
		$this -> db->	 join('tbl_ayurveda_rooms b', 'a.id = b.room_id');
		$this -> db->	 join('tbl_booking c', 'b.id = c.room_id');
		$this -> db->	 join('tbl_hotel_room_facilities d', 'd.room_id = a.id');
		$this -> db->	 where('c.booking_number', $id_num);
	}
	$room_query = $this -> db->	 get();
	$booking_detail['rooms']= $room_query-> result();

?>

<title><?php echo $booking_detail['bookings'] -> title ?></title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
	<link href="<?php echo base_url();?>css/custom_search.css" rel="stylesheet">
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
<?php  //$this->load->view('main/login'); ?>
<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
	  	
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	       <a class="" href="<?php echo base_url().'reservation/'.url_title($booking_detail['bookings'] -> title).'?hotel='.$h_id;?>"> <img class="logo_l" src="<?php echo base_url();?><?php echo $booking_detail['bookings']->logo_img; ?>" /> </a>
	      
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	
	      		      	<div class="pull-right paddngMob">
				<?php
								if(!isset($this->session->userdata['log_username']))
								{?>
				<a id="log_reserve" class="sign_in" data-toggle="modal" data-target="#login_model" href="#"><i class="fa fa-user" aria-hidden="true"></i> Sign In</a>
				<?php } else 
				{?>
				<li class="dropdown">
				
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
				
				<a id="log_reserve" class="sign_in" href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $h_id; ?>"><i class="fa fa-user" aria-hidden="true"></i> My Account <i class="fa fa-angle-down"></i></a> </button>
				
				<ul class="dropdown-menu">
	          	
	            	
	            <li><a href="<?php echo base_url(); ?>reservation/user?hotel=<?php echo $h_id; ?>">Profile </a></li>

	            <li><a href="<?php echo base_url();?>login/logout"  >Sign Out</a></li>
	          </ul>
				<?php } ?>
				
			</div>
	      	<span class="title_toll_free pull-right"> <?php if(!empty($booking_detail['bookings']->phone)){ ?><i class="fa fa-phone"></i> Call Us : <?php echo $booking_detail['bookings']->hotel_phone ;?> <?php }?> </span>
	      
	    </div><!-- /.navbar-collapse -->
	    
	  </div><!-- /.container-fluid -->
	</nav>





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
<a href="<?php echo base_url().'reservation/'.url_title($booking_detail['bookings'] -> title).'?hotel='.$h_id;?>" ><i class="fa fa-home"> Book another</i></a>
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



 <div class="col-md-9 prepaid-heading">
  <div class="col-md-7 main_t_in">
<h2 class="inv2 ">Prepaid 
Hotel Voucher 
</h2>
</div>
 <div class="col-md-5 pb_cs">
<p class="newb">Please print and keep this voucher for your records. </p>	
</div>

</div>



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
<?php echo $booking_detail['bookings']->address; ?>
</address>

</div>
<div class="col-md-9 customer_details">

 <ul>
 <li class="col-md-12 li_c"> <span class="col-md-6 cus-dt"> Name</span><span class="col-md-6 cus-dt2"><?php echo $booking_detail['bookings']->name;?> </span> </li>
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
 //$diff = abs(strtotime($booking_detail['bookings']->check_in) - strtotime($booking_detail['bookings']->check_out)); 
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
if($booking_detail['bookings']->commision<>'')
{
	$commision_rate =$booking_detail['bookings']->commision/$total_rooms;
}
else
{
	$commision_rate='';
}

foreach($booking_detail['rooms'] as $room_detail) {?>
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
									<span class="fa fa-inr">
									<?php }else{ ?>
									<span class="fa fa-inr">
									<?php }
									
									echo $each_room_price= $room_detail->room_rate+$commision_rate; 
									?></td> 
<td><?php echo $days ; ?></td> 
<td><?php if($category=='hotel'){?>
									<span class="fa fa-inr">
									<?php }else{ ?>
									<span class="fa fa-inr">
									<?php }
									 echo $each_room_price*$days*$num_room;
									 ?></td> 
									 
									 

</tr>

<?php

} 
?>
<tr>
	<?php
									if($category=='hotel')
									{?>
									<td data-label="" colspan="5">Taxes & service fee</td>
								<td data-label="Taxes & service fee" colspan=""><i class="fa fa-inr"></i> 
								<?php 
								echo $booking_detail['bookings']->tax;}?></td>
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
<p class="price">INR. 
<?php 
echo number_format($booking_detail['bookings']->payment + $booking_detail['bookings']->commision,2); ?></p>
</div>



<div class=" col-md-6 btm_c">
<div class="com_bottom">
<ul class="botm_li">
<p class="ens">You need to ensure the following at check-in </p>
<li>Guest holds hotel voucher with the correct reservation details </li>
<li> Guest has valid photo ID </li>
</ul>

</div>
</div>



</div>



<div class=" col-md-12  bluebbcus6 pr">
<p class="ht_ads">
<?php echo $booking_detail['bookings']->address;?>
</p>

</div></div>
</div>

</div>
<br/>
 <div class="content_search_copyright ">
 <p class="copyright">Copyright © <?php echo date('Y').' '.$booking_detail['bookings'] -> title ?>. Powered by <a href="<?php echo base_url(); ?>">Bookingwings.com</a>.</p>
</div> 

<script > var baseurl ="<?php echo base_url();?>"; </script>

	 <!-- jQuery -->
    
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url();?>js/validation.js"></script>
	   <script src="<?php echo base_url();?>js/detail_search.js"></script>
        <script src="<?php echo base_url();?>js/login.js"></script>
		
</body>
</html>