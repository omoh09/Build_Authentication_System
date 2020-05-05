<!--<?php include_once('lib/header.php'); 
require_once('functions/redirect.php'); 
require_once('functions/alerts.php'); 
require_once('functions/token.php'); 
include_once('processbill.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
//$allbillpay = scan_db("bills");
$allbillpay = array_values(array_diff(scan_db("bills"), array('..', '.', '.DS_Store')));
$countallbills = count($allbillpay);
$transactionList = [];
for ($counter = 0; $counter < $countallbills; $counter++) {
    $singleBills = $allbillpay[$counter];
    $transactionString = file_get_contents("db/bills/".$singleBills);
    $transactionObjest = json_decode($transactionString);
    array_push($transactionList, $transactionObjest);
}
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	-->	 
			
<?php
$allbillpay = scan_db("bills");
$countallbills = count($allbillpay);
?>
		<h2>Transaction History</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
				<?php //if($transactionList != null) { ?>
		          <thead>
				      <tr>
						<th>Amount</th>
						<th>Reference No</th>
						<th>Status</th>
					  </tr>
				  </thead>
				<?php
				$structureerr = "";
				for ($counter = 2; $counter < $countallbills ; $counter++) {
				    $currentBill = $allbillpay[$counter];
				    $billString = file_get_contents("db/bills/".$currentBill);
				    $billObject = json_decode($billString);
				    $amountFromDB = $billObject->amount;
				    $emailFromDB = $billObject->email;
				    $txrefFromDB = $billObject->txref;
				    $statusFromDB = $billObject->status;
					if(strtolower($emailFromDB) == strtolower($_SESSION['email'])){
				?>
				<tbody>
					<tr>
						<td><?php echo $amountFromDB;?></td>
						<td><?php echo $txrefFromDB;?></td>
						<td><?php echo $statusFromDB;?></td>
						
					</tr>
				<?php
					}
				/*else{
					$structureerr = "<tr >";
					$structureerr .= "<td colspan='6'><p class='info'>you have no pending appointments!</p></td>";
					$structureerr .= "</tr>";
					echo $structureerr;
				}*/
			}
			?>
				
			 	</tbody>
			</table>
		</div>
		
		<!--</main>
		
		
	</div>
</div>
<?php include_once('lib/footer.php'); ?>-->