
<!-- MENU -->
    <p> 
        
        <?php if(!isset($_SESSION['loggedIn'])){ ?>
        <a href="index.php">Home</a> |&nbsp;
        <a href="login.php">Login</a> |&nbsp;
        <a href="register.php">Register</a> |&nbsp;
		<a href="forgot.php">Forgot Password</a>
	</p>
  </div>
        <?php }else{ ?>
           
        <p>
			<a href="reset.php">Change Password</a> &nbsp;|
		<?php
			if($_SESSION['designation'] == 'Patient'){ ?>
			<a href="paybill.php">Pay Bill</a> &nbsp;|
			<a href="bookappointment.php">Book Appointment</a>
        <?php
		}
			if($_SESSION['designation'] == 'Medical Team (MT)'){ ?>
			<a href="viewappointment.php">View Appointment</a> &nbsp;|
		<?php	
		}
			if(ucwords($_SESSION['designation']) == 'Medical Director (MD)'){ ?>
			<a href="viewpatients.php">View Patients</a> &nbsp;|
			<a href="viewstaff.php">View Staffs</a>
		</p>
			
		<?php	}
		 } ?>
        
</body>


</html>