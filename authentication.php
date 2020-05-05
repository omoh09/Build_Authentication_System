<?php include_once('functions/redirect.php');
include_once('functions/alerts.php');
include_once('functions/email.php');
/*$bill = $_GET['amount'];
$ref = $_GET['txref'];
$email = $_GET['email'];*/
    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        //$bill = $_GET['amount'];
        $email = $_GET['email'];
		
        $amount = $_GET['amount']; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-3dd2b079a4d5ba6aad740fb19a7844e3-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {			
			$userObject = [
		        'amount'=>$amount,
		        'email'=>$email,
		        'txref'=>$ref,
		        'status'=>$paymentStatus
		    ];
			$subject = "Transaction successful";
	        $message = "Hello, Your payment of $amount was successful";
			file_put_contents("db/bills/". $email."-".$ref . ".json", json_encode($userObject));
			send_email($subject,$message,$email);
			$_SESSION["msg"] = "Payment Successful";
			header("location: paybill.php");
          // transaction was successful...
             // please check other things like whether you already gave value for this ref
          // if the email matches the customer who owns the product etc
          //Give Value and return to Success page
        } else {
			/*set_alert('error',"<p class='alert alert-danger'>Payment Failed</p>");
			redirect("paybill.php");*/
			$userObject = [
		        'amount'=>$amount,
		        'email'=>$email,
		        'txref'=>$ref,
		        'status'=>'failed'
		    ];
			file_put_contents("db/bills/". $email . ".json", json_encode($userObject));
			header("location: paybill.php");
			$_SESSION["err"] = "Payment failed";
			header("location: paybill.php");
            //Dont Give Value and return to Failure page
        }
    }
        else {
      die('No reference supplied');
    }

?>
