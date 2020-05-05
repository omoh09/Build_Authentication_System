<?php
function generate_token(){
	$token = ""; 

  $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

  for($i = 0 ; $i < 26 ; $i++){

    $index = mt_rand(0,count($alphabets)-1);
    $token .= $alphabets[$index];
  }
  return $token;
}

function find_token($email = ""){
	$allUserTokens = scandir("db/tokens/"); //return @array (2 filled)
    $countAllUserTokens = count($allUserTokens);

    for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {
        
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json"){
           //now check if the token in the currentTokenFile is the same as $token
           $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);

           $tokenObject = json_decode($tokenContent);
           return $tokenObject;
		}
	}
	return false;
}


function generate_Txref() {
    $ch = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz";
    $txref = "rave-";
    for ($i = 0; $i < 9; $i++) {
        $txrefle = rand(0, strlen($ch)-1);
        $txref .= mt_rand(0, 6)."".$ch[$txrefle];
    }
    return $txref;
}

?>