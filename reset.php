<?php include_once('lib/header.php'); 
 include_once('functions/alerts.php'); 
 include_once('functions/users.php'); 
 include_once('functions/redirect.php'); 

if(!is_users_logged_in() && !is_token_set()){
    $_SESSION["error"] = "You are not authorized to view that page";
    redirect("login.php");
}
?>

	
<div class="container-fluid">
  <div class="row">
  <?php if(is_users_logged_in()){ ?>
<?php require_once("lib/nav_bar.php") ; ?>

<?php } ?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>Change Password</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						<th>Reset Password associated with your account : [email]</th>
					  </tr>
				   </thead>
				   <tbody>
				  	  <tr>
					  	  <td>
   
							<div class="row col-md-6">
						  		<div class="form-group">
							   		<form action="processreset.php" method="POST">
									   <p>
									        <?php prin_alert();; ?>
									    </p>
									    <?php if(!is_users_logged_in()) { ?>
									    <input
									            
									            <?php              
									                if(is_token_set_in_session()){
									                    echo "value='" . $_SESSION['token'] . "'";                                                             
									                }else{
									                    echo "value='" . $_GET['token'] . "'";
									                }             
									            ?>

									           type="hidden" name="token"  />
									    <?php } ?>

									    <p>
									        <label>Email</label><br />
									        <input
									            
									            <?php              
									                if(isset($_SESSION['email'])){
									                    echo "value=" . $_SESSION['email'];                                                     
									                }               
									                if(is_users_logged_in()){ 
													?>
									                    readonly                                                   
									             <?php  
												  }                
									            ?>

									             type="text" class="form-control" name="email" placeholder="Email" />
									    </p>
									    <p>
									        <label>Enter New Password</label><br />
									        <input type="password" class="form-control" name="password" placeholder="Password"  />
									    </p>
									    <p>
									        <button class="btn btn-primary" type="submit">Reset Password</button>
									    </p>
								   </form>
								</div>
							</div>
						  </td>
					  </tr>
				  </tbody>

				</table>
			</div>
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>