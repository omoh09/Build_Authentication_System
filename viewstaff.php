<?php include_once('lib/header.php'); 
include_once('functions/redirect.php'); 
include_once('functions/users.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
$allStaff = scan_db("users");
$countallStaff = count($allStaff);
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>View Staff</h2>
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
	</div>
</div>
<?php include_once('lib/footer.php'); ?>