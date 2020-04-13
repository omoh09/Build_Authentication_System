<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
//LAST LOGIN
$UserPath = "db/login/".$_SESSION['email'].".json";
$userlogin = json_decode(file_get_contents($UserPath));
$dblogin = $userlogin->last_login;

include_once('lib/dashboardheader.php')
?>
	
<main>
<table class="masterlist">
	<tr>
		<th>My Details</th>
		<th></th>
	</tr>
	<tr>
		<td>Full Name</td>
		<td><?php echo ucwords($_SESSION['first_name']." ".$_SESSION['last_name']); ?></td>
	</tr>
	<tr>
		<td>LoggedIn User ID</td>
		<td><?php echo $_SESSION['loggedIn'] ?></td>
	</tr>
	<tr>
		<td>User Access Level: Menber</td>
		<td><?php echo $_SESSION['designation'] ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $_SESSION['email'] ?></td>
	</tr>
	<tr>
		<td>Department</td>
		<td><?php echo $_SESSION['department'] ?></td>
	</tr>
	<tr>
		<td>Registration Date</td>
		<td><?php echo $_SESSION['reg_date'] ?></td>
	</tr>
	<tr>
		<td>Last Login</td>
		<td><?php echo $dblogin; ?></td>
	</tr>
</table>

</main>
<?php include_once('lib/footer.php'); ?>