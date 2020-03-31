<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}

/*$date = [
		'last_login' => date("Y-m-d, h:i:sa")
	];
file_put_contents("db/users/". $_SESSION['loggedIn'] . ".json", json_encode($date),FILE_APPEND);*/
?>
<h3>Dashboard</h3>
    LoggedIn User ID: <?php echo $_SESSION['loggedIn'] ?>
    <br />User Access Level: Menber*<?php //echo $_SESSION['first_name'] ?>
    <br />Firstname: <?php echo $_SESSION['first_name'] ?>
    <br />Lastname: <?php echo $_SESSION['last_name'] ?>
    <br />Email: <?php echo $_SESSION['email'] ?>
    <br />Department: <?php echo $_SESSION['department'] ?>
    <br />Registration Date: <?php echo $_SESSION['reg_date'] ?>
    <br />Last Login: <?php echo $_SESSION['reg_date'] ?>
	<?php

		
		
		
		
		
	?>

<?php include_once('lib/footer.php'); ?>