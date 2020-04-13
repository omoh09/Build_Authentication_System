<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
include_once('lib/dashboardheader.php');
//get all users
$allpatients = scandir("db/users/");
$countallpatients = count($allpatients);
?>
	
<main>
<h3>View Patients</h3>
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
	for ($counter = 2; $counter < $countallpatients ; $counter++) {
	    $currentUser = $allpatients[$counter];
	    $patientsString = file_get_contents("db/users/".$currentUser);
	    $patientsObject = json_decode($patientsString);
	    $fnFromDB = $patientsObject->first_name;
	    $emailFromDB = $patientsObject->email;
	    $lastnameFromDB = $patientsObject->last_name;
	    $genderFromDB = $patientsObject->gender;
	    $designationFromDB = $patientsObject->designation;
	    $deptFromDB = $patientsObject->department;
	    $reg_dateFromDB = $patientsObject->reg_date;
		if($designationFromDB == 'Patient'){
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