<?php
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$busi_name = $_POST['busi_name'];
	$to = "info@amanhts.com";
	$subject = "Bookingengine contact";
	$server = 'http://'.$_SERVER['SERVER_NAME'].'/bookingengine';
	$url = "$server/mail.php?name=$name&mail=$mail&phone=$phone&busi_name=$busi_name"; 
  	$message = file_get_contents($url);   
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:  Bookingengine <"' . $mail .'">' . " \r\n";  
	$mails = mail($to, $subject, $message, $headers);
	if($mails){
	echo "<script>window.location = '../index.php?msgs=success'</script>";
	}
	else{
	echo "<script>window.location = '../index.php?msgs=failed'</script>";	
	}
	
	
}
?>