
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
    
    <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>

</head>
<body>

				
				
 <div class="container">
 	
 	<div class="row">
 		<br/>
 	</div>
 	
 <div class="row">
 	<div class="col-sm-4">
<?php
foreach ($images as $value):
?>
	<a href="<?php echo base_url();?>packages/image_edit/<?php echo $value->package_id;?>/<?php echo $value->id;?>">
		<img src="<?php echo base_url().'../'.$value->thumb_image; ?>" width="100" height="100"/>
	
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
  <form action="<?php echo base_url();?>packages/image_edit/<?php echo $value->package_id;?>/<?php echo $image_id;?>" method="post" enctype="multipart/form-data" >
  	
  	
    <div class="col-sm-4">
      <h3>Change Image</h3>
      	<p><img src="<?php echo base_url().'../'.$change_images[0]->thumb_image; ?>" width="100" height="100"/></p>
      	<p> <input type="file" name="package_image" class="form-control"  /></p>
      	<p>

			<input type="submit" name="submit" value="update" class="btn btn-success" /> &nbsp;
      		<input type="submit" name="delete" value="Delete" class="btn btn-success" />
      	</p>
      	 
    </div>
    </form>
   
  </div>
  

  
  
</div>




</body>
</html>