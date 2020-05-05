<?php include_once('functions/alerts.php');
include_once('functions/redirect.php');
function send_email(
	$subject = "",
	$message = "",
	$email = ""
	){
     $headers = "From: no-reply@snh.org" . "\r\n" . "CC: gabrielifoga@yahoo.com";
	 
	  $try = mail($email,$subject,$message,$headers);

     if($try){
         set_alert("message","<p class='alert alert-success'>Password reset has been sent to your email: " . $email . "</p>");
         redirect("login.php");
     }else{
		 set_alert("error","<p class='alert alert-success'>Something went wrong, we could not send password reset to : " . $email . "</p>");
         redirect("forgot.php");
     }
}


?>