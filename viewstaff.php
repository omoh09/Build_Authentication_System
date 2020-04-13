<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
include_once('lib/dashboardheader.php');
//get all users
$allStaff = scandir("db/users/");
$countallStaff = count($allStaff);
?>
	
<main>
<h3>View Staff</h3>
<table class="masterlist">
	<tr>
		<th>Patient Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>designation</th>
		<th>department</th>
		<th>Register Date</th>
	</tr>
<?php
	for ($counter = 2; $counter < $countallStaff ; $counter++) {
	    $currentUser = $allStaff[$counter];
	    $staffString = file_get_contents("db/users/".$currentUser);
	    $staffObject = json_decode($staffString);
	    $fnFromDB = $staffObject->first_name;
	    $emailFromDB = $staffObject->email;
	    $lastnameFromDB = $staffObject->last_name;
	    $genderFromDB = $staffObject->gender;
	    $designationFromDB = $staffObject->designation;
	    $deptFromDB = $staffObject->department;
	    $reg_dateFromDB = $staffObject->reg_date;
		if($designationFromDB == 'Medical Team (MT)'){
?>
	<tr>
		<td><?php echo $fnFromDB." ".$lastnameFromDB;?></td>
		<td><?php echo $emailFromDB;?></td>
		<td><?php echo $genderFromDB;?></td>
		<td><?php echo $designationFromDB;?></td>
		<td><?php echo $deptFromDB;?></td>
		<td><?php echo $reg_dateFromDB;?></td>
	</tr>
<?php
	}
}
?>
</table>

</main>
<?php include_once('lib/footer.php'); ?>