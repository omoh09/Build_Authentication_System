<?php include_once('lib/header.php'); 
include_once('functions/useRs.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
$allpatients = scan_db("appointment");
$countallpatients = count($allpatients);
?>

<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>View Appointment</h2>
		<div class="table-responsive">
	        <table class="table table-striped ">
	          <thead>
			      <tr>
					  <th>Patient Name</th>
					  <th>Date of appointment Date</th>
					  <th>Nature of appointment</th>
					  <th>initial complaint</th>
					  <th>Department</th>
					  <th>Time created</th>
				  </tr>
			  </thead>
					
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
					if(strtolower($deptFromDB) == strtolower($_SESSION['department'])){
			?>
			<tbody>
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
				
			 </tbody>
			</table>
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>