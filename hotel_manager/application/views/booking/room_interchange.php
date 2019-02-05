
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Booking Wings</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
	 <link href="<?php echo base_url();?>/assets/css/bootstrap-datepicker3.css" rel="stylesheet">

</head>
<body class="uploaded_img_section_block_body">

				
				
 <div class="container uploaded_img_section_block">
 

  <!-- <?php
  if($this->session->flashdata('success'))
  {?>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                    </div>
                </div>
   <?php
  }
  
  if($this->session->flashdata('error'))
  {
  	 $a= $this->session->flashdata('error');
	 foreach($a as $b)
	 {
	 }
	?>
  	  <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <?php  echo $b['error'];?>
                        </div>
                    </div>
                </div>
  <?php
  }
//$r_num = $this->uri->segment(3);
//$status = $this->uri->segment(4);
  
    ?>
  --> 
 <div class="row">
 	<h1 class="uploaded_img_section_title">Block Room</h1>
 	<div class="list-group">
 		<form method="post"  action="<?php echo base_url() . 'booking/room_interchange/'.$result[0]->booking_number ;?>">
					<div class="form-group col-lg-12">
                        <label class="col-lg-12">From Room</label>
						
						
						
                       <!-- <select name="old_room" id=""  class="col-lg-12 col-md-12  col-xs-12 col-sm-12 form-control" >
						<option value="" > --Select-- </option>
						<?php foreach($current_rooms as $current_room): ?>
						<option value="<?php echo $current_room->id."|".$current_room->booking_id;?>"><?php echo $current_room->room_number ." - " . $current_room->room_title; ?></option>
						<?php endforeach ;?>
						</select> -->
						<?php foreach($current_rooms as $current_room): ?>
						</br><input type="radio" name="old_room" value="<?php echo $current_room->id."|".$current_room->booking_id;?>" /> &nbsp;<?php echo $current_room->room_number ." - " . $current_room->room_title; ?>
						<?php endforeach ;?>
						<?php echo form_error('old_room');?>
                      </div>
                       <input type="hidden" name="old_room_type" id="old_room_type" value="<?php echo $current_room->room_id;?>"/>
					  <?php //print_r($result); ?>
					  <input type="hidden" name="check_in" id="check_in" value="<?php echo $result[0]->check_in;?>"/>
					   <input type="hidden" name="check_out" id="check_out" value="<?php echo $result[0]->check_out;?>"/>
					   
					   
                      <div class="form-group col-lg-12">
                        <label class="col-lg-12">To Room Type</label>
                      
						<select name="new_room_type" id="room_type"  class="col-lg-12 col-md-12  col-xs-12 col-sm-12 form-control" onchange="interchange_room();">
						<option value="" > --Select-- </option>
						<?php foreach($rooms as $room): ?>
						<option value="<?php echo $room->id;?>"><?php echo $room->room_title; ?></option>
						<?php endforeach ;?>
						</select>
						<?php echo form_error('new_room_type');?>
						
                     
                      </div>
                      
                      <div class="form-group col-lg-12">
                       
                       <div id="rooms">
					   
					   </div>
                      </div>
					  
					    <div class="form-group col-lg-12">
                        <label class="col-lg-2">Remarks</label>
                        <textarea class="col-lg-12 col-md-12  col-xs-12 col-sm-12 form-control " name="remark" id="remark"></textarea>
                      </div>
					 
					  
                     <div class="col-md-12 mrt"></div>
                      <div class="form-group col-lg-3">
                        <button type="submit" name="room_interchange" class="btn btn-primary">Submit</button>

</div>
  </form>	
  	
 </div>
  
  
  <?php
  if(!empty($interchange_detail))
  {
  ?>
  
    <div class="col-md-12 mrt"></div>
					  <div class="res_table-c col-md-12">
					  <table class="pop_table">
  <thead>
    <tr>
      <th>Sl.No</th>
      <th>From Room Type</th>
      <th>From Room No.</th>
      <th>To Room Type</th>
      <th>To Room No.</th>
	   <th>Remark</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    
	<?php
	$i=1;
	
	foreach($interchange_detail as $interchange)
	{
		$old_room_type = $this->Bookingmodel->interchange_roomtype($interchange->old_room_type);
		$new_room_type = $this->Bookingmodel->interchange_roomtype($interchange->new_room_type);
		$old_room = $this->Bookingmodel->interchange_roomnumber($interchange->new_room);
		$new_room = $this->Bookingmodel->interchange_roomnumber($interchange->old_room);
		
	?>
    <tr>
       <td data-label="Sl.No"><?php echo $i++;?> </td>
      <td data-label="From Room Type"><?php echo $old_room_type[0]->room_title;?>  </td>
      <td data-label="From Room No."><?php echo $old_room[0]->room_number;?>  </td>
      <td data-label="To Room Type"><?php echo $new_room_type[0]->room_title;?> </td>
      <td data-label="To Room No."><?php echo $new_room[0]->room_number;?> </td>
      <td data-label="Remark"><?php echo $interchange->remark;?> </td>
	   <td data-label="Date"><?php echo $interchange->date;?> </td>
    </tr>
	<?Php
	}?>
  </tbody>
</table>
					  </div>
					  
		<?php
}?>		
					  
					  <br/>
</div>






    <script>
	
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>
  <script>
      	var baseurl = '<?php echo base_url();?>';
      </script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

         <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url();?>assets/js/booking.js"></script>


</body>
</html>