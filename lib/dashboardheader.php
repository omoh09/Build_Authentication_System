<!--<header>
	<div class="appname"><a href="index.php">Home</a>&nbsp; |</div> 
	<div class="appname">&nbsp; <a href="dashboard.php">Dashboard</a></div>
	<div class="appname">&nbsp;| <strong><?php echo ucwords($_SESSION['designation'])?></strong></div>
	<div class="loggedin">Welcome <?php echo ucwords($_SESSION['first_name']." ".$_SESSION['last_name']); ?>! <a href="logout.php">Log Out</a></div>
</header>-->

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
		<?php if($_SESSION['designation'] == 'Patient'){ ?>
			<a href="paybill.php">Pay Bill</a> &nbsp;|
			<a href="bookappointment.php">Book Appointment</a>
        <?php } if($_SESSION['designation'] == 'Medical Team (MT)'){ ?>
			<a href="viewappointment.php">View Appointment</a> &nbsp;|
		<?php }	if(ucwords($_SESSION['designation']) == 'Medical Director (MD)'){ ?>
			<a href="viewpatients.php">View Patients</a> &nbsp;|
			<a href="viewstaff.php">View Staffs</a>
		</p>
			
		<?php	}
		 } ?>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
	<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reset.php">
              <span data-feather="file"></span>
              Change Password
            </a>
          </li>
		  <?php if($_SESSION['designation'] == 'Patient'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="paybill.php">
              <span data-feather="shopping-cart"></span>
              Pay Bill
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookappointment.php">
              <span data-feather="users"></span>
              Book Appointment
            </a>
          </li>
		   <?php } if($_SESSION['designation'] == 'Medical Team (MT)'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="viewappointment.php">
              <span data-feather="bar-chart-2"></span>
              View Appointment
            </a>
          </li>
		  <?php }	if(ucwords($_SESSION['designation']) == 'Medical Director (MD)'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="viewpatients.php">
              <span data-feather="layers"></span>
              View Patients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewstaff.php">
              <span data-feather="layers"></span>
              View Staffs
            </a>
          </li>
		  <?php }  ?>
        </ul>
      </div>
    </nav>