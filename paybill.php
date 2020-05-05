<?php include_once('lib/header.php'); 
require_once('functions/redirect.php'); 
require_once('functions/alerts.php'); 
require_once('functions/token.php'); 
include_once('processbill.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
$allbillpay = scan_db("bills");
$countallbills = count($allbillpay);
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>Pay Bill</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						<th>Enter amouth to pay bill.</th>
					  </tr>
				  </thead>
				  <tbody>
						<tr>
							<td>		
								<form action="" id="myForm" method="POST">
								<?php echo $errmsg; ?>
								<?php if(isset($_SESSION["msg"])){
									echo $_SESSION["msg"];
									//session_destroy();
								} ?>
								<?php if(isset($_SESSION["err"])){
									echo $_SESSION["err"];
								} ?>
							    <p>
							        <label>Amount</label><br />
							        <input type="number" class="form-control" name="amount" placeholder="Enter Amount" />
							    </p>
								<p>
									<input type="hidden" name="names" value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?>"/>
									<input type="hidden" name="email" value="<?php echo $_SESSION['email']?>"/>
								</p>
							    <p>
							        <button type="submit" name="submit" onClick="payWithRave()" class="btn bnt-bg btn-primary">Pay Bill</button>
							    </p>

							</form>
						</td>
					</tr>
				  </tbody>
				</table>
			</div>
			
<?php
	include_once("transaction_history.php");
?>
			
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>