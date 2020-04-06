<?php include_once('../lib/header.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['first_name'])) {
		header('Location: index.php');
	}

 ?>

	<header>
		<div class="appname">User Management System</div>
		<div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>

	<main>
		<h1>Users <span><a href="add-user.php">+ Add New</a></span></h1>

		<table class="masterlist">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Last Login</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

		</table>
		
		
	</main>
</body>
</html>
