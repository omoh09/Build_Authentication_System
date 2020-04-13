<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
include_once('lib/dashboardheader.php')
?>
	
<main>
<table class="masterlist">
	<tr>
		<th>Book an Appointment</th>
	</tr>
	
	<tr>	
		<td>		
			<form action="" method="POST">
				<p>
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
						    echo "<p class='info'>Appointment set successfully </p>";
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
</table>

</main>
<?php include_once('lib/footer.php'); ?>