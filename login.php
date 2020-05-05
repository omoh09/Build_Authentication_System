<?php include_once('lib/header.php');
include_once('functions/alerts.php');
include_once('functions/users.php');
include_once('functions/redirect.php');

if(is_users_logged_in()){ 
    redirect("dashboard.php");
}
?>
<div class="container">
  <!--<div class="col - 10">
  	<img  src="img/login.jpeg"/>
  <</div>-->
  <div class="row col-md-6">
    <form method="POST" action="processlogin.php">
	<div class="form-group">
	 <h3>Log In</h3>
       <?php prin_alert(); ?>
        <p>
            <label>Email</label><br />
            <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                             
                }                
            ?>

             type="text" class="form-control"  name="email" placeholder="Email"  />
        </p>

        <p>
            <label>Password</label><br />
            <input type="password" class="form-control" name="password" placeholder="Password"  />
        </p>       
       
        <p>
			<button type="submit" class="btn btn-primary">Login</button>
        </p>
		<p>
			<a href="forgot.php">Forget password</a><br />
			<a href="register.php">dont have an account</a>
		</p>
    </div>
    </form>
	
  </div>
  
</div>

<?php include_once('lib/footer.php'); ?>