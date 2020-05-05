<?php include_once('lib/header.php'); 
include_once('functions/users.php'); 
include_once('functions/redirect.php'); 

if(!is_users_logged_in()){
    redirect("login.php");
}
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>Book an Appointment</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						<th>Fill here to book an appointment with a doctor </th>
					  </tr>
				  </thead>
				  <tbody>
						<tr>	
							<td>		
								<form action="" method="POST">
			        <?php 
					if(isset($_POST['submit'])){
						$errorCount = 0;
						$Nature_of_appointment = $_POST['noa'] != "" ? $_POST['noa'] :  $errorCount++;
						$ic = $_POST['ic'] != "" ? $_POST['ic'] :  $errorCount++;
						$dept = $_POST['dept'] != "" ? $_POST['dept'] :  $errorCount++;
						$date = date("Y-m-d");
						$time = date("h:i:sa");
						
						$noaerrorempty = $icerrorempty = $depterrorempty = "";
						if($Nature_of_appointment == " "){
							$error = "<p class='error'>Nature of appointment cannot be empty</p>";
							$errorCount++;
						}
						if($ic == " "){
							$error = "<p class='error'>Initial complaint cannot be empty</p>";
							$errorCount++;
						}
						if($dept == " "){
							$error = "<p class='error'>Department cannot be empty</p>";
							$errorCount++;
						}
						
						if($errorCount > 0){
							echo $error;
						}else{
							$userObject = [
						        //'id'=>$Id,
						        'Nature_of_appointment'=>$Nature_of_appointment,
						        'Initial_complaint'=>$ic,
						        'Department_bk_app'=>$dept,
						        'Date_of_appointment'=> $date,
						        'Time_of_appointment'=>$time,
						    ];

						    //save appointment in the database;
						    file_put_contents("db/appointment/". $_SESSION["email"] . ".json", json_encode($userObject));
						    echo "<p class='alert alert-success'>Appointment set successfully </p>";
						}
					}
			        ?>
				</p>
							    <p>
							        <label>Nature of appointment</label><br />
							        <input type="text" name="noa" placeholder="Nature of appointment" />
							    </p>
							    <p>
							        <label>Initial complaint</label><br />
							        <input type="text" name="ic" placeholder="Initial complaint"  />
							    </p>
							    <p>
							        <label>Department to book the appointment</label><br />
							        <input type="text" name="dept" placeholder="Department you want to book the appointment for"  />
							    </p>
							    <p>
							        <button name="submit" type="submit">Book Appointment</button>
							    </p>
							</form>
						</td>
					</tr>
				  </tbody>

				</table>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						  <th>Nature of appointment</th>
						  <th>initial complaint</th>
						  <th>Department</th>
						  <th>Date/Time</th>
						  <th>Action</th>
					  </tr>
				  </thead>
				  <?php
				  	$userappointment = find_appointment($_SESSION["email"]);
					$noaFromDB = $userappointment->Nature_of_appointment;
					$in_com_FromDB = $userappointment->Initial_complaint;
				    $deptFromDB = $userappointment->Department_bk_app;
				    $dateFromDB = $userappointment->Date_of_appointment;
				    $timeFromDB = $userappointment->Time_of_appointment;
				  ?>
				  <tbody>
						<tr>
							<td><?php echo $noaFromDB;?></td>
							<td><?php echo $in_com_FromDB;?></td>
							<td><?php echo $deptFromDB;?></td>
							<td><?php echo $dateFromDB."/".$timeFromDB;?></td>
							<td><em><a href="#">edit</a> | <a href="#">delete</a> </em></td>
						</tr>
				  </tbody>

				</table>
			</div>
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>