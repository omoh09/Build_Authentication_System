<?php include_once('lib/header.php');
require_once('functions/alerts.php');
if(is_users_logged_in()){
    redirect("dashboard.php");
}
?>
<div class="container">
	<div class="row col - 6">
		<h3>Register</h3>
	</div>
	<div class="row col - 6">
		All Fields are required
	</div>
	<div class="row col - 6">
	  <div class="form-group">
		<form method="POST" action="processregister.php">
	        <?php 
	            prin_alert();
				
	            if(isset($_SESSION['fnerrorempty']) && !empty($_SESSION['fnerrorempty'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['fnerrorempty'] . "</p>";
		
	                session_unset();
					//session_destroy();
	            }
	            if(isset($_SESSION['fnerrorlen']) && !empty($_SESSION['fnerrorlen'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['fnerrorlen'] . "</p>";
		
	                session_unset();
					//session_destroy();
	            }
	            if(isset($_SESSION['fnerrorstring']) && !empty($_SESSION['fnerrorstring'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['fnerrorstring'] . "</p>";
		
	                session_unset();
					//session_destroy();
	            }
	            if(isset($_SESSION['lnerrorempty']) && !empty($_SESSION['lnerrorempty'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['lnerrorempty'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	            if(isset($_SESSION['lnerrorlen']) && !empty($_SESSION['lnerrorlen'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['lnerrorlen'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	            if(isset($_SESSION['lnalert alert-dangerlenstr']) && !empty($_SESSION['lnerrorlenstr'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['lnerrorlenstr'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	            if(isset($_SESSION['passworderr']) && !empty($_SESSION['passworderr'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['passworderr'] . "</p>";
		
	                //session_unset();
					//session_destroy();
	            }
	            if(isset($_SESSION['gendererr']) && !empty($_SESSION['gendererr'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['gendererr'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	            if(isset($_SESSION['designitureerr']) && !empty($_SESSION['designitureerr'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['designitureerr'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	            if(isset($_SESSION['depterr']) && !empty($_SESSION['depterr'])){
	                echo "<p class='alert alert-danger'>" . $_SESSION['depterr'] . "</p>";
		
	                //session_unset();
					session_destroy();
	            }
	                
	        ?>
	        <p>
	            <label>First Name</label><br />
	            <input  
	            <?php              
	                if(isset($_SESSION['first_name'])){
	                    echo "value=" . $_SESSION['first_name'];                                                             
	                }                
	            ?>
	            type="text" class="form-control" name="first_name" placeholder="First Name" />
	        </p>
	        <p>
	            <label>Last Name</label><br />
	            <input
	            <?php              
	                if(isset($_SESSION['last_name'])){
	                    echo "value=" . $_SESSION['last_name'];                                                             
	                }                
	            ?>
	             type="text" class="form-control" name="last_name" placeholder="Last Name"  />
	        </p>
	        <p>
	            <label>Email</label><br />
	            <input
	            
	            <?php              
	                if(isset($_SESSION['email'])){
	                    echo "value=" . $_SESSION['email'];                                                             
	                }                
	            ?>

	             type="text" class="form-control" name="email" placeholder="Email"  />
	        </p>

	        <p>
	            <label>Password</label><br />
	            <input type="password" class="form-control" name="password" placeholder="Password"  />
	        </p>
	        <p>
	            <label>Gender</label><br />
	            <select name="gender" class="form-control" >
	                <option value="">Select One</option>
	                <option 
	                <?php              
	                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
	                        echo "selected";                                                           
	                    }                
	                ?>
	                >Female</option>
	                <option 
	                <?php              
	                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
	                        echo "selected";                                                           
	                    }                
	                ?>
	                >Male</option>
	            </select>
	        </p>
	       
	        <p>
	            <label>Designation</label><br />
	            <select name="designation" class="form-control" >
	            
	                <option value="">Select One</option>
	                <option 
	                <?php              
	                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
	                        echo "selected";                                                           
	                    }                
	                ?>
	                >Medical Team (MT)</option>
	                <option 
	                <?php              
	                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
	                        echo "selected";                                                           
	                    }                
	                ?>
	                >Patient</option>
	            </select>
	        </p>
	        <p>
	            <label>Department</label><br />
	            <input
	            <?php              
	                if(isset($_SESSION['department'])){
	                    echo "value=" . $_SESSION['department'];                                                             
	                }                
	            ?>
	             type="text" class="form-control" name="department" placeholder="Department"  />
	           
	        </p>
	        <p>
				<button type="submit" class="btn btn-success">Register</button>
	        </p>
			<p>
				<a href="forgot.php">Forget password</a><br />
				<a href="login.php">Already have an account</a>
			</p>
    	</form>
      </div>
 	</div>
 </div>
<?php include_once('lib/footer.php'); ?>