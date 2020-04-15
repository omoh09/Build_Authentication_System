<?php include_once('lib/header.php'); 
include_once('functions/redirect.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
//LAST LOGIN
$UserPath = "db/login/".$_SESSION['email'].".json";
$userlogin = json_decode(file_get_contents($UserPath));
$dblogin = $userlogin->last_login;

//include_once('lib/dashboardheader.php')
?>

<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>Dashboard</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						  <th>My Details [<?php echo ucwords($_SESSION['designation'])?>]</th>
						  <th></th>
					  </tr>
				  </thead>
					  <tbody>
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
				   </tbody>
				</table>
			</div>
		</main>
    </div>
</div>


<?php include_once('lib/footer.php'); ?>