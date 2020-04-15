<?php    
    $allpatients = scandir("db/users/");
    $countallpatients = count($allpatients);

    for ($counter = 0; $counter < $countallpatients ; $counter++) {
       
        $currentUser = $allpatients[$counter];
        $userString = file_get_contents("db/users/".$currentUser);
        $userObject = json_decode($userString);
        $fnFromDB = $userObject->first_name;
        $emailFromDB = $userObject->email;
        $lastnameFromDB = $userObject->last_name;
		echo $fnFromDB." ".$lastnameFromDB.'<br>';
		echo $emailFromDB.'<br>';
    }
?>
