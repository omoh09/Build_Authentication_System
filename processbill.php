<?php 
include_once('functions/redirect.php');
include_once('functions/alerts.php');
$errmsg = "";
$errorCount = 0;
if(isset($_POST["submit"])){	
	$bill = $_POST['amount'] != "" ? $_POST['amount'] :  $errorCount++;

	$name = $_POST["names"];

	if($errorCount > 0){
		$errmsg = "<p class='alert alert-danger'>Enter a transaction amount</p>";
		
	}else{
							
							
			$curl = curl_init();

			$customer_email = $_POST["email"];
			$amount = $bill;  
			$currency = "NGN";
			$txref = generate_Txref(); // ensure you generate unique references per transaction.
			$PBFPubKey = "FLWPUBK_TEST-4b5b81c40f96adc46e2ad8bd9cfd81d8-X"; // get your public key from the dashboard.
			$redirect_url = "http://localhost/HNG_task/new_HNG/php_task2/authentication.php?amount=$bill&txref=$txref&email=$customer_email";
			$payment_options = "card,account";



			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => json_encode([
			    'amount'=>$amount,
			    'customer_email'=>$customer_email,
			    'currency'=>$currency,
			    'txref'=>$txref,
			    'PBFPubKey'=>$PBFPubKey,
			    'redirect_url'=>$redirect_url,
			  ]),
			  CURLOPT_HTTPHEADER => [
			    "content-type: application/json",
			    "cache-control: no-cache"
			  ],
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			if($err){
			  // there was an error contacting the rave API
			  die('Curl returned error: ' . $err);
			}

			$transaction = json_decode($response);

			if(!$transaction->data && !$transaction->data->link){
			  // there was an error from the API
			  print_r('API returned error: ' . $transaction->message);
			}

			// redirect to page so User can pay
			// uncomment this line to allow the user redirect to the payment page
			header('Location: ' . $transaction->data->link);
	}
}

									
?>