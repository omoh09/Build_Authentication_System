<?php include_once('lib/header.php'); 
include_once('functions/users.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("Location: login.php");
}
//get all users
$allpatients = scan_db("users");
$countallpatients = count($allpatients);
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>View Patients</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						<th>Patient Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>designation</th>
						<th>department</th>
						<th>Register Date</th>
					  </tr>
				  </thead>
				  
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
	</div>
</div>
<?php include_once('lib/footer.php'); ?>