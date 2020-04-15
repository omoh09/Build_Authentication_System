<?php include_once('lib/header.php'); ?>
<?php include_once('functions/alerts.php'); ?>
<div class="container">
	<div class="row col-md-6">
   		<h3>Forgot Password</h3>
	</div>
	<div class="row col-md-6">
   		Provide the email address associated with your account
	</div>
	<div class="row col-md-6">
	  <div class="form-group">
   		<form action="processforgot.php" method="POST">
		   <p>
		        <?php prin_alert();?>
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
		        <button class="btn btn-primary" type="submit">Send Reset Code</button>
		    </p>
	   </form>
	 </div>
	</div>
</div>
    
<?php include_once('lib/footer.php'); ?>