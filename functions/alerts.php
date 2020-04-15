<?php 

/*function error(){
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        session_destroy();
    }
}

function message(){
	if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<p class='info'>" . $_SESSION['message'] . "</p>";
        session_destroy();
    }
}*/

function prin_alert(){
	$type = ["message", "error", "emailerr", "emailerrfmt", "passworderr"];
	$color = ["alert alert-success", "alert alert-danger","alert alert-danger","alert alert-danger","alert alert-danger"];
	for($i = 0; $i < count($type); $i++){
		if(isset($_SESSION[$type[$i]]) && !empty($_SESSION[$type[$i]])){
        echo "<p class='.$color[$i].'>" . $_SESSION[$type[$i]] . "</p>";
        session_destroy();
   	 	}
	}
}

function set_alert($type = "message", $content = ""){
	switch($type){
		case "message":
			$_SESSION["message"] = $content;
		break;
		case "error":
			$_SESSION["error"] = $content;
		break;
		default:
		$_SESSION["message"];
	break;
	}
	
}
?>