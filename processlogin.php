<?php session_start();
include_once('functions/users.php');
include_once('functions/redirect.php');
include_once('functions/alerts.php');
$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;
$lastlog = date("Y-m-d, h:i:sa");

$emailerr = $emailerrfmt = $passworderr = "";
if(empty($email)){
	$emailerr = "<p class='alert alert-danger'>Email cannot be empty</p>";
	$errorCount++;
}else{
	$_SESSION['email'] = $email;
}

if(empty($password)){
	$passworderr = "<p class='alert alert-danger'>Password cannot be empty</p>";
	$errorCount++;
}else{
	$_SESSION['password'] = $password;
}

if($errorCount > 0){
	$_SESSION["emailerr"] = $emailerr; 
	$_SESSION["emailerrfmt"] = $emailerrfmt;
	$_SESSION["passworderr"] = $passworderr;
    redirect("login.php");

}else{
	
	$currentUser = finduser($email);
	
    if($currentUser){
        $userString = file_get_contents("db/users/".$currentUser->email.".json");
		
        $userObject = json_decode($userString);
		
        $passwordFromDB = $userObject->password;

        $passwrodFromUser = password_verify($password, $passwordFromDB);
        
        if($passwordFromDB == $passwrodFromUser){
			//last login capture
			file_put_contents("db/login/". $email . ".json", json_encode(['last_login' => $lastlog]));

            $_SESSION['first_name'] = $userObject->first_name;
            $_SESSION['last_name'] = $userObject->last_name;
            $_SESSION['department'] = $userObject->department;
            $_SESSION['designation'] = $userObject->designation;
            $_SESSION['email'] = $userObject->email;
            $_SESSION['reg_date'] = $userObject->reg_date;
            $_SESSION['loggedIn'] = $userObject->id;
			redirect("dashboard.php");
            die();
        }
    }
	set_alert('error',"<p class='alert alert-danger'>Invalid Email or Password</p>");
    redirect("login.php");
    die();
}