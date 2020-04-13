<header>
	<div class="appname"><a href="index.php">Home</a>&nbsp; |</div> 
	<div class="appname">&nbsp; <a href="dashboard.php">Dashboard</a></div>
	<div class="appname">&nbsp;| <strong><?php echo ucwords($_SESSION['designation'])?></strong></div>
	<div class="loggedin">Welcome <?php echo ucwords($_SESSION['first_name']." ".$_SESSION['last_name']); ?>! <a href="logout.php">Log Out</a></div>
</header>
