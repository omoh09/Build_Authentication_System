<?php include_once('lib/header.php'); 
include_once('functions/redirect.php'); 
include_once('functions/users.php'); 

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
		<h2>Patient payment</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
				
		          <thead>
				      <tr>
						<th>Name</th>
						<th>Amount</th>
						<th>Email</th>
						<th>Reference No</th>
						<th>status</th>
					  </tr>
				  </thead>
				<?php
					for ($counter = 2; $counter < $countallbills ; $counter++) {
					    $currentUser = $allbillpay[$counter];
					    $staffString = file_get_contents("db/bills/".$currentUser);
					    $staffObject = json_decode($staffString);
					    $amountFromDB = $staffObject->amount;
					    $emailFromDB = $staffObject->email;
					    $refFromDB = $staffObject->txref;
					    $statusFromDB = $staffObject->status;
						$finduser = finduser($emailFromDB);
						$userNames = $finduser->first_name." ".$finduser->last_name;
							
				?>
					<tr>
						<td><?php echo $userNames;?></td>
						<td><?php echo $amountFromDB;?></td>
						<td><?php echo $emailFromDB;?></td>
						<td><?php echo $refFromDB;?></td>
						<td><?php echo $statusFromDB;?></td>
					</tr>
			<?php
			}
			?>
				</table>
			</div>
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>