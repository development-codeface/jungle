
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
	 
	 <link href="<?php echo base_url();?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
 	<h1 class="uploaded_img_section_title">View Rooms</h1>
<table class="table table-bordered">
	<tr>
		<td>Room No.</td>
		<td>From</td>
		<td>To</td>
		<td>Remarks</td>
		<td colspan="2"></td>
	</tr>
	<?php if(!empty($blocked)) { foreach($blocked as $room): ?>
		<tr>
			<td><?php echo $room->room_number; ?></td>
			<td><?php echo date_format(date_create_from_format('Y-m-d', $room->valid_from), 'd-m-Y'); ?></td>
			<td><?php echo date_format(date_create_from_format('Y-m-d', $room->valid_to), 'd-m-Y'); ?></td>
			<td><?php echo $room->remarks; ?></td>
			<td><a title="Edit" href="<?php echo base_url() . 'roomnumber/room_edit/' . $room->id;?>">Edit</a></td>
			<td><a title="Unblock" style="cursor: pointer;" onclick="room_block(<?php echo $room->id;?>,<?php echo "1";?>);"><i class="fa fa-ban"></i></a></td>
		</tr>
	<?php endforeach; } else { ?>
		<tr class="active text-center">
			<td colspan="6"><?php echo 'No rooms'; ?></td></td>
		</tr>
		<?php } ?>
</table>
  
  
</div>

   <script>
   var baseurl = '<?php echo base_url(); ?>';
   </script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

         <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
	<script src="<?php echo base_url();?>assets/js/rooms.js"></script>


</body>
</html>