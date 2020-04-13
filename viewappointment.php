<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
include_once('lib/dashboardheader.php');
//get all appointment
$allpatients = scandir("db/appointment/");
$countallpatients = count($allpatients);
?>

<main>
<h3>View Appointment</h3>
<table class="masterlist">
	<tr>
		<th>Patient Name</th>
		<th>Date of appointment Date</th>
		<th>Nature of appointment</th>
		<th>initial complaint</th>
		<th>Department</th>
		<th>Time created</th>
	</tr>
<?php
	for ($counter = 2; $counter < $countallpatients ; $counter++) {
	    $currentUser = $allpatients[$counter];
	    $patientsString = file_get_contents("db/appointment/".$currentUser);
	    $patientsObject = json_decode($patientsString);
	    $noaFromDB = $patientsObject->Nature_of_appointment;
	    $in_com_FromDB = $patientsObject->Initial_complaint;
	    $deptFromDB = $patientsObject->Department_bk_app;
	    $dateFromDB = $patientsObject->Date_of_appointment;
	    $timeFromDB = $patientsObject->Time_of_appointment;
		
		$UserPath = "db/users/".$currentUser;
		$userlogin = json_decode(file_get_contents($UserPath));
		$patientName = $userlogin->first_name." ".$userlogin->last_name;
		//if($designationFromDB == 'Patient'){
		if(strtolower($deptFromDB) == strtolower($_SESSION['department'])){
?>
	<tr>
		<td><?php echo $patientName;?></td>
		<td><?php echo $dateFromDB;?></td>
		<td><?php echo $noaFromDB;?></td>
		<td><?php echo $in_com_FromDB;?></td>
		<td><?php echo $deptFromDB;?></td>
		<td><?php echo $timeFromDB;?></td>
	</tr>
<?php
	}else{
		$structureerr = "<tr >";
		$structureerr .= "<td colspan='6'><p class='info'>you have no pending appointments!</p></td>";
		$structureerr .= "</tr>";
		echo $structureerr;
	}
}
?>
</table>

</main>
<?php include_once('lib/footer.php'); ?>