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
 		<form method="post" <?php if(!empty($room)): ?> action="<?php echo base_url() . 'roomnumber/room_block/'. $room->id . '/' . $room->status; endif; ?>">
<div class="form-group col-lg-3">
                        <label class="col-lg-2">From</label>
                        <span id="sandbox-container">
                        <input class="col-lg-12 form-control " name="from" id="valid_from" value="<?php if(!empty($room)) 
                        echo date_format(date_create_from_format('Y-m-d', $room->valid_from), 'd-m-Y');?>">
                        </span>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-2">To</label>
                        <span id="sandbox-container4">
                        <input class="col-lg-12 form-control " name="to" id="valid_to" value="<?php if(!empty($room)) 
                        echo date_format(date_create_from_format('Y-m-d', $room->valid_to), 'd-m-Y'); ?>">
                        </span>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label class="col-lg-2">Remarks</label>
                        <textarea class="col-lg-12 form-control " name="remark" id="remark"><?php if(!empty($room)) echo $room->remarks; ?></textarea>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <button type="submit" name="room_block" class="btn btn-primary">Submit</button>

</div>
  </form>	
  	
 </div>
  
  
</div>


    <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

         <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>


</body>
</html>