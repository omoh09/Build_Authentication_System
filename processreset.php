<?php session_start();
require_once('functions/users.php');
require_once('functions/alerts.php');
require_once('functions/redirect.php');
require_once('functions/email.php');
require_once('functions/token.php');

$errorCount = 0;

if(!is_users_logged_in()){
//if(!$_SESSION['loggedIn']){

    $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
    $_SESSION['token'] = $token;
}

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;


$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "<p class='alert alert-danger'>You have " . $errorCount . " error";
   
   if($errorCount > 1) {        
       $session_error .= "s";
   }

   $session_error .=   " in your form submission</p>";
   set_alert("error", $session_error);
   redirect("reset.php");

}else{
	if(is_users_logged_in()){
		$checkToken = true;
	}else{
		$checkToken = find_token($email);
	}
	//$checkToken = is_users_logged_in() ? true : find_token($email);

   if($checkToken){
   		$userExist = finduser($email);
   		
		if($userExist){
			$userObject = finduser($email);

            $userObject->password = password_hash($password, PASSWORD_DEFAULT);

            unlink("db/users/".$currentUser); //file delete, user data delete
            unlink("db/token/".$currentUser); //file delete, token data delete
			//save_user($userObject);
            file_put_contents("db/users/". $email . ".json", json_encode($userObject));
			set_alert('message','Password Reset Successful, you can now login');

            $subject = "Password Reset Successful";
            $message = "Your account on snh has just been updated, your password has changed. if you did not initiate the password change, please visit snh.org and reset your password immediatly";
            
			send_email($subject,$message,$email);
            
            redirect("login.php");
            return;
		
        
        }
    }
	   
	set_alert('error',"<p class='alert alert-danger'>Password Reset Failed, token/email invalid or expired</p>");
	redirect("login.php");
}
