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
 
 <div class="row">
 	<h1 class="uploaded_img_section_title">Add Room</h1>
 	<div class="list-group">
 		<form method="post"  action="<?php echo base_url() . 'booking/add_room_update/'.$result[0]->booking_number ;?>">

                      <div class="form-group col-lg-12">
                       
                       <div id="rooms">
		 <div class="col-md-12 mrt"></div>
		      <div class="room-list-cus room_list_cus_offline col-lg-12">
                <label class="col-lg-12 cus_offline_rooms_title"><?php echo $results[0]->room_title.' ('.$room -> normal_allowed_adults.'<i class="fa fa-male"></i> + '.$room -> normal_allowed_kids.'<i class="fa fa-child"></i>)';?></label>
                <?php
				//print_r($result);
                if(!empty($results))
				{
					foreach($results as $result1)
					{
						$rooms =$this->Bookingmodel->room_numbers($id,$result1->id,$check_in,$check_out);
						//echo $this -> db -> last_query();
						foreach($rooms as $roomnumber)
						{
							$available='';
						 	//if($roomnumber->status == '1'):
								$avail_room_check =$this->Bookingmodel->available_room_numbers($check_in,$check_out,$id,$result1->id,$roomnumber->id);
								$available += $avail_room_check;
							//endif;
					    }
					  // echo $available;
					   
						if(!empty($rooms))
						{
							 ?>
					      <ul class="delrom_cus delrom_cus_offline col-md-12">
                     	
                     	 <div class="col-md-4">
                     	 <?php
						  
							 foreach($rooms as $roomnumber)
							 {
								$room_check='';
								 //if($roomnumber->status == '1')
								 //{
					$avail_rooms =$this->Bookingmodel->available_room_numbers($check_in,$check_out,$result1->hotel_id,$result1->id,$roomnumber->id);
												
												$room_check += $avail_rooms;
												if($avail_rooms==0)
												{
												?>
												<li class="block_cus_field_main_title_room_number_cus ">
												<input class=" numberrooms" type="radio" name="new_room" 
												value="<?php echo $roomnumber->id;?>" id="" required> <?php echo $roomnumber->room_number;?>
												</li>
												<?php		
												}
							
								//}
							 
							}
							  ?>
							  </div>
							 
                     </ul>
                     
						<?php
					 
						}
					}						
					
				}
				else 
				{ echo 'No rooms'; }
					
				?>
				  
				
             </div>
			<?php
                if($result[0] -> offline_user != 0 && $result[0] -> package_id == 0){
			 //print_r($results);
					if($results[0]->no_of_bed != 0 && $result[0]->bed_rate != 0) {
			?>
			 <br/>
			 <div class="room-list-cus room_list_cus_offline col-lg-12">
<label>Extra Bed</label>
<input type="number" class="form-control" name="beds" placeholder="<?php echo $room -> no_of_bed ?> max." min="0" max="<?php echo $room -> no_of_bed ?>">
             </div>
			 <?php } 
			 if($results[0]->normal_allowed_kids != 0 && $result[0]->child_rate != 0) { ?>
			 
			 <br/>
			 <div class="room-list-cus room_list_cus_offline col-lg-12">
<label>No. of chidren</label>
<input type="number" class="form-control" name="kids" placeholder="<?php echo $room -> normal_allowed_kids ?> max." min="0" max="<?php echo $room -> normal_allowed_kids ?>">
             </div>
			 <?php } 
			 } ?>
					   </div>
                      </div>
					 <input type="hidden" name="b_id" value="<?php echo $result[0] -> id;?>" /> 
					 <input type="hidden" name="c_in" value="<?php echo $result[0] -> check_in;?>" /> 
					 <input type="hidden" name="c_out" value="<?php echo $result[0] -> check_out;?>" /> 
					  
                     <div class="col-md-12 mrt"></div>
                      <div class="form-group col-lg-3">
                        <button type="submit" name="room_interchange" class="btn btn-primary">Submit</button>

</div>
  </form>	
  	
 </div>
		  
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