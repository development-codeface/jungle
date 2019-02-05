
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Booking Chair</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
    <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>

</head>
<body class="uploaded_img_section_block_body">

				
				
 <div class="container uploaded_img_section_block">
 	
 	

 	
 <div class="row">
 	<h1 class="uploaded_img_section_title">Uploaded Images </h1>
 	<div class="col-sm-12">
<?php
$count=count($images);
foreach ($images as $value):
?>
	<a href="<?php echo base_url();?>hotel/image_edit/<?php echo $value->hotel_id;?>/<?php echo $value->id;?>">
		<img src="<?php echo base_url().'../'.$value->thumb; ?>" width="100" height="100"/>
	
	</a>&nbsp;
	
<?php
endforeach;
?>
</div>

 </div>
 
 <br/>
  <?php
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
  
  
    ?> 
    
  <div class="row">
  <?php 
  $last = $this->uri->total_segments();
 $image_id = $this->uri->segment($last);
?>
  <form action="<?php echo base_url();?>hotel/image_edit/<?php echo $value->hotel_id;?>/<?php echo $image_id;?>" method="post" enctype="multipart/form-data" >
  	 <div class="change-img_block_cus">
  	
    <div class="col-sm-12">
      <h3>Change Image</h3>
       <div class="col_all_block">
      	<p><img src="<?php echo base_url().'../'.$change_images[0]->thumb; ?>" width="100" height="100"/></p>
      	<p> <input type="file" name="hotel_image" class=""  /></p>
      	<p>

			 </div>
			 <div class="footer_btn_img_updtd"> 
			 <input type="submit" name="submit" value="update" class="btn btn-primary" /> &nbsp;
			<?php if($count != '1') { ?>
      		<input type="submit" name="delete" value="Delete" class="btn btn-default" />
      		<?php } ?>
      	 </div>
      	 
    </div>
    </div>
    </form>
   
  </div>
  

  
  
</div>




</body>
</html>