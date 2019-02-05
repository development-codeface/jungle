<html>
<title>New Booking</title>
<head></head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="hedb" style="background:#216393;display: inline-block;width: 100%;">
<div class="email_header col-md-4" style="  background:#216393; color: hsl(0, 0%, 100%); margin-bottom: 25px;  display: inline-block; padding: 15px; text-align: center; text-transform: uppercase;margin: 0;">
<!--<img src="<?php echo $_SERVER['SERVER_NAME'];?>/img/logo_mail.png">-->
</div>
<div class="email_header col-md-8 " style="background:#216393;  float: right;color: hsl(0, 0%, 100%); margin-bottom: 25px;  display: inline-block; padding: 15px; text-align: center; text-transform: uppercase;margin: 0;">
<!--<p class="tagline" style=" font-family: helvetica; font-size:17px;  text-align: right; text-transform: capitalize; margin: 5px;">Travel Easy, Fast and Safe!...</a>-->
</div>
</div>
</div>


<div class="col-md-12 ">


<div class="container  container_cus" style="width:100%;">
<div class="row bluebbcus" style="padding-top: 40px;background-color:#fbfbfb;">
<div class=" col-md-12 pr bluebbe" style=" display:inline-block; width:100%; padding: 0;background-color:#fbfbfb;border-bottom: 1px dotted hsl(0, 0%, 80%);">
<div class=" bluebb ">
 <div class="col-md-4" id="a" style="width: 33.3333%;float:left;text-align:center;position: relative;padding: 10px 20px; font-size: 20px;position: relative;color: #2E8DEF;  background: #fff;">
<img style="width: 238px; height: 52px;"src="<?php echo $_SERVER['SERVER_NAME'].'/';?><?php print_r($booking_details->logo_img); ?>">
</div>
 <div class="col-md-8" style="width: 61.667%;float:left;">
  <div class="col-md-8" style="width: 66.6667%;float:left;">
<h2 class="inv2 " style="  font-family: lato; font-size: 20px;text-transform: uppercase;font-weight: bold;">Prepaid 
Hotel Voucher 
</h2>
</div>
 <div class="col-md-4" style="width: 33.3333%;float:left;">
 <h6 class="newt" style=" color:#444;font-family: lato;font-size: 16px;margin: 16px 0 0;font-weight: 600;">New Booking </h6>
<p class="newb" style="  color:#444; font-family: lato;font-size: 13px;">Please print and keep this voucher for your records. </p>
</div>

</div>




</div>
</div>

<div class="col-md-12 ">
<div class="hotel_Ingo" style="  margin-top: 30px;">
<div class="col-md-3 logo_h" style="text-align: center; width: 25%; float: left;">
<!--<img style="width:100px;" src="<?php echo $_SERVER['SERVER_NAME'];?><?php print_r($hotel->logo_img); ?>" alt="Hotel Logo">-->
<p class="hotl_id" style="  font-family: lato;font-weight: 600;margin-bottom: 0;margin-top: 10px;">Hotel ID <?php print_r($hotel->hotel_number); ?> </p>
<address class="address" style="  font-family: lato;">
<?php print_r($hotel->title); ?><br>
<?php print_r($hotel->place); ?>, <?php print_r($hotel->district); ?>
</address>
</div>
<div class="col-md-9 customer_details"  style="width: 75%; float: left;">
<div class="bookingid pull-right"style="float: right; width: 100%; text-align: right;">
<p class="bookingidc" style="  font-family: oswald;font-size: 20px;margin: 5px 15px 0 0;">Booking ID : <span><?php echo $booking_details->booking_number ?></span></p>
</div>

<?php
 
						$check_in_time=strtotime($booking_details->check_in); 
						$in_month=date("M",$check_in_time);
						$in_year=date("Y",$check_in_time);
						$in_date=date("d",$check_in_time);
						$in_day = date("D",$check_in_time);
											 
						$check_out_time=strtotime($booking_details->check_out);
						$out_month=date("M",$check_out_time);
						$out_year=date("Y",$check_out_time);
						$out_date=date("d",$check_out_time);
						$out_day = date("D",$check_out_time);
						
						 $diff = abs(strtotime($booking_details->check_in) - strtotime($booking_details->check_out)); 
						 $years   = floor($diff / (365*60*60*24)); 
						 $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
						 $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
?>
 
 <ul>
 <li class="col-md-6 li_c" style="display: inline-block; width: 450px;background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;  list-style: outside none none;
  margin-bottom: 7px;"> <span class="col-md-6 cus-dt" style="font-family: lato;padding: 7px;"> First Name</span><span class="col-md-6 cus-dt2" style="padding: 7px; font-family: lato;font-weight: bolder;"><?php print_r($user['first_name']); ?> </span> </li>
 <li class="col-md-6 li_c" style="display: inline-block; width: 450px;  list-style: outside none none;
  margin-bottom: 7px;background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;"> <span class="col-md-6 cus-dt" style="font-family: lato;padding: 7px;"> Last Name </span><span class="col-md-6 cus-dt2" style="padding: 7px; font-family: lato;font-weight: bolder; background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;"><?php print_r($user['last_name']); ?> </span> </li>
  <li class="col-md-6 li_c"  style="  display: inline-block; width: 450px;list-style: outside none none;
  margin-bottom: 7px;background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;"> <span class="col-md-4 cus-dt" style="font-family: lato;padding: 7px;">Check-in </span><span class="col-md-8 cus-dt2" style="padding: 7px; font-family: lato;font-weight: bolder;"><?php echo $in_day.",&nbsp;".$in_date. "&nbsp;". $in_month. "&nbsp;" .$in_year;?>  </span> </li>
   <li class="col-md-6 li_c"  style=" display: inline-block; width: 450px; list-style: outside none none;
  margin-bottom: 7px;background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;"> <span class="col-md-4 cus-dt" style="font-family: lato;padding: 7px;">Check-out  </span><span class="col-md-8 cus-dt2" style="padding: 7px; font-family: lato;font-weight: bolder;"><?php echo $out_day.",&nbsp;".$out_date. "&nbsp;". $out_month. "&nbsp;" .$out_year;?>  </span> </li>
  <?php if(!empty($booking_details->package_id)) { ?>
  <li class="col-md-6 li_c"  style=" display: inline-block; width: 450px; list-style: outside none none;
  margin-bottom: 7px;background: hsl(0, 0%, 100%) none repeat scroll 0 0;border: 2px solid hsl(0, 0%, 93%);padding: 0;"> <span class="col-md-4 cus-dt" style="font-family: lato;padding: 7px;">Package  </span><span class="col-md-8 cus-dt2" style="padding: 7px; font-family: lato;font-weight: bolder;"><?php echo $room_details[0]->package;?>  </span> </li>
  <?php } ?>
 </ul>
 
</div>


</div>
</div>
<div class=" col-md-12  bluebbcus2" style="padding: 0 20px; margin-bottom: 50px;">
<table class="detailst" style="width:100%; font-family: lato;">
<tr>
<th style=" border: 1px solid #ccc;  background: #EEEEEE;font-family: lato; padding: 10px;">Room Type </th>
<th style=" border: 1px solid #ccc;background: #EEEEEE;font-family: lato; padding: 10px;">No. of Rooms </th>
<th style=" border: 1px solid #ccc;background: #EEEEEE;font-family: lato; padding: 10px;">Max Occupancy </th>
<th style=" border: 1px solid #ccc;background: #EEEEEE;font-family: lato; padding: 10px;">Price / Room / Night</th>
<th style=" border: 1px solid #ccc;background: #EEEEEE;font-family: lato; padding: 10px;">Night(s)</th>
<th style=" border: 1px solid #ccc;background: #EEEEEE;font-family: lato; padding: 10px;">Total Price</th>
</tr>

									<?php
$total_rooms = '';
foreach($room_details as $room_detail) 
{
	 $total_rooms += $room_detail->number_of_rooms;  
}
if(!empty($room_details[0]->commision))
{
	$commision_rate =$room_details[0]->commision/$total_rooms;
}
else
{
	$commision_rate='';
}
									
									$category = $booking_details->category;
									foreach($room_details as $room_detail)
									{
									?>

<tr>
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php echo $room_detail->room_title; ?> </td> 
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php echo $num_room = $room_detail->number_of_rooms;
if(!empty($room_detail-> extra_bed)) echo ' + '.$room_detail-> extra_bed.' extra bed(s)';
if(!empty($room_detail-> number_of_childrens)) echo ' + '.$room_detail-> number_of_childrens.' child(ren)';?> </td> 
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php echo $room_detail->normal_allowed_adults; ?> Person(s)</td> 
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php if($category=='hotel'){?>
									<span class="fa fa-inr>">
									<?php }else{ ?>
									<span class="fa fa-inr">
									<?php }
									$each_room_price= $room_detail->room_rate + $commision_rate;
									if(!empty($room_detail-> extra_bed)) {
									$bed_price = $room_detail-> extra_bed * $room_detail-> bed_rate * $days;
									} else { $bed_price = ''; }
									if(!empty($room_detail-> number_of_childrens)) {
									$child_price = $room_detail-> number_of_childrens * $room_detail-> child_rate * $days;
									} else { $child_price=''; }
									echo $each_room_price;
									?> </td> 
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php echo $days ; ?></td> 
<td style=" border: 1px solid #ccc;background-color: #fff;padding: 10px;"><?php if($category=='hotel'){?>
									<span class="fa fa-inr">
									<?php }else{ ?>
									<span class="fa fa-inr">
									<?php }
									echo number_format($each_room_price*$days*$num_room + ($bed_price+$child_price),2);
									 ?></td> 
</tr>
<?php } 

if(!empty($booking_details->food)) {?>

<tr>

<td colspan="5" align="right" style=" border: 1px solid #ccc;padding: 10px;">Food Plan Amount </td> 
<td style=" border: 1px solid #ccc;padding: 10px;"><?php echo number_format($booking_details->food,2);?></td> 

</tr>

<?php } 

if(empty($booking_details->package_id)) {?>

<tr>

<td colspan="5" align="right" style=" border: 1px solid #ccc;padding: 10px;">Taxes &amp; service fee </td> 
<td style=" border: 1px solid #ccc;padding: 10px;"><?php echo number_format($booking_details->tax,2);?></td> 

</tr>

<?php } if(!empty($booking_details->discount)) {?>

<tr>

<td colspan="5" align="right" style=" border: 1px solid #ccc;padding: 10px;">Discount</td> 
<td style=" border: 1px solid #ccc;padding: 10px;"><?php echo number_format($booking_details->discount,2);?></td> 

</tr>
<?php } ?>

<tr>

<td colspan="5" align="right" style=" border: 1px solid #ccc;padding: 10px;"><strong>Grand Total</strong></td> 
<td style=" border: 1px solid #ccc;padding: 10px;"><?php echo number_format($booking_details->total_amount,2); ?></td> 

</tr>

</table>
</div>

<div class=" col-md-12  bluebbcus3 pr" style="  padding: 0;">
<?php if(!empty($booking_details->request) || !empty($booking_details->arrival)) {?>
<p class="cant"><span style="  background:#eeeeee; color: #000; font-family: lato;font-weight: 600;padding: 10px 25px;">Other details </span></p>
<p class="canc" style="background: hsl(0, 0%, 100%) none repeat scroll 0 0;border-bottom: 1px dotted hsl(0, 0%, 80%);border-top: 1px dotted hsl(0, 0%, 80%);font-family: lato;line-height: 25px;padding: 15px 30px;">

<?php if(!empty($booking_details->request))  { ?>
<P>Special request : <?php echo $booking_details->request.'</br>'; }
if(!empty($booking_details->arrival)) { ?></p><p>
Estimated arrival time : <?php echo $booking_details->arrival; } ?></p></p>
<?php } ?>
</div>

<!-- -->
<div class=" col-md-12  bluebbcus3 pr" style="  padding: 0;">

<?php if(!empty($room_details[0]->conditions))  { ?>
<p class="cant"><span style="  background:#eeeeee; color: #000; font-family: lato;font-weight: 600;padding: 10px 25px;">Conditions </span></p>
<p class="canc" style="background: hsl(0, 0%, 100%) none repeat scroll 0 0;border-bottom: 1px dotted hsl(0, 0%, 80%);border-top: 1px dotted hsl(0, 0%, 80%);font-family: lato;line-height: 25px;padding: 15px 30px;">
<?php echo $room_details[0]->conditions; ?>
</p>
<?php } ?>
</div>

<div class=" col-md-12  bluebbcus3 pr" style="  padding: 0;">

<?php if(!empty($room_details[0]->services))  { ?>
<p class="cant"><span style="  background:#eeeeee; color: #000; font-family: lato;font-weight: 600;padding: 10px 25px;">Services </span></p>
<p class="canc" style="background: hsl(0, 0%, 100%) none repeat scroll 0 0;border-bottom: 1px dotted hsl(0, 0%, 80%);border-top: 1px dotted hsl(0, 0%, 80%);font-family: lato;line-height: 25px;padding: 15px 30px;">
<?php echo $room_details[0]->services; ?>
</p>
<?php } ?>
</div>
<!-- -->
<div class=" col-md-12  bluebbcus4 pr">
<div class=" col-md-6" style="width: 50%; float: left; ">
<p class="price" style="  background: #f4f4f4;font-family: lato;font-size: 27px;font-weight: bolder;padding: 58px 9px;text-align: center;margin:0px;">INR <?php echo number_format($booking_details->total_amount,2); ?> </p>
</div>
<div class=" col-md-6 btm_c" style=" background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: lato; padding: 10px 0px; float: left; width: 50%;">
<div class="com_bottom">
<div class=" col-md-3" style="float: left; width: 25%;">
<!--<img style="width: 145px; height: 86px;" src="<?php echo $_SERVER['SERVER_NAME'];?>/img/logo_cus_b.png">-->
</div>
<div class=" col-md-9" style="width: 75%; float: left; text-align: right;">
<p class="subt">Booked and Payable by </p>
<p class="subt2" style="line-height: 23px;">Aman Hospitality Solutions</p>
</div>
</div>
</div>
</div>

<div class=" col-md-12  bluebbcus5 pr" style="  background:#fbfbfb;color:#000; font-family: lato;list-style: outside none none;border-top:1px dotted #ccc;">

<ul class="botm_li" style="list-style: outside none none;margin: 20px 0;">
<p class="ens" style="  font-style: italic;font-weight: bold;">You need to ensure the following at check-in </p>
<li style="  list-style: outside none circle;margin-bottom: 5px;">Guest holds hotel voucher with the correct reservation details </li>
<li style="  list-style: outside none circle;margin-bottom: 5px;">Guest <?php print_r($user['first_name']); ?> is present, he/she has already paid but collect all extras directly</li>
<li style="  list-style: outside none circle;margin-bottom: 5px;"> Guest has valid photo ID </li>
</ul>


</div>


<div class=" col-md-12  bluebbcus6 pr" style="background: hsl(0, 0%, 97%) none repeat scroll 0 0;border-top: 1px solid hsl(0, 0%, 80%);color: hsl(0, 0%, 0%);font-family: lato;font-size: 12px;padding: 10px 0;text-align: center;">
<p class="ht_ads">
<!-- BUILDING NO.6/349 CHEKITTAVILAKOM, PUTHIYATHURA, PULLUVILA P.O, TRIVANDRUM, KERALA 695526. <br> General Questions bookingwings.com  | 
Booking Wings  instruction: Please have your UPC number and the hotel ID  -->
</p>

</div>
</div>

</div>



</div>

 <div class="col-md-12">
<div class="email_f_foot" style=" background: #216393; color: #fff;padding: 10px;">
 <!--<p class="addres_f" style="  font-family: helvetica;font-size: 13px;font-weight: 500;margin-bottom: 0; margin-top: 20px;  text-align: center;">BUILDING NO.6/349 CHEKITTAVILAKOM, PUTHIYATHURA, PULLUVILA P.O, THIRUVANTHAPURAM, KERALA 695526. </p> -->
<p class="focf" style="  font-family: helvetica;font-size: 12px;font-weight: 500;line-height: 25px;padding: 1px 80px;text-align: center; ">
*** This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. If you have received this message in error, please notify the sender immediately and delete this message from your system ***
<br>
<!-- <a style="color:#fff;" href="#">Facebook</a> | <a  style="color:#fff;"  href="#">Twitter</a> -->
</p>
</div>
</div>
</div>
</div>
</body>
</html>