<?php session_start();
include_once('functions/token.php');
include_once('functions/email.php');
include_once('functions/alerts.php');
include_once('functions/redirect.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
	set_alert("error",$session_error);
    redirect("forgot.php");

}else{

        $currentUser = finduser($email);

        if($currentUser == $email . ".json"){
			$token = generate_token();
      		   
	        $subject = "Password Reset Link";
	        $message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise, visit: localhost/HNG_task/new_HNG/php_task2/reset.php?token=".$token;
	         
	        file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));
	        send_email($subject,$message,$email);
	        die();
        }
      
	set_alert("error","<p class='alert alert-danger'>Email not registered with us ERR: " . $email . "</p>");
    redirect("forgot.php");
}


