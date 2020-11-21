<?php
include"../admin/config/db.php";
require_once "vendor/autoload.php";


 \Stripe\Stripe::setApiKey('sk_test_51HnlLnE5MALRVDYBe1EOFDvVlAkUnNcJCPU8UmDDNo0RrDpHFZhxekrpeBPxQZ67RGZnWcmoCqBpHjBPjh06GUd000HuHSWGot');
if (isset($_POST['stripeToken']) && !empty($_POST['stripeToken'])) {
 
    try {
        $token = $_POST['stripeToken'];
     
        $response = ([
            'amount' => $_POST['amount'],
            'currency' => 'USD',
            'token' => $token,
        ]);
     
        
       
           
           
            $amount = $_POST['amount'];
 
          
     
                $m = "INSERT INTO payments( amount, currency, payment_status) VALUES( '$amount', 'USD', 'Captured')";
	$r=mysqli_query($c,$m);
        
 
            echo "Payment is successful ";
        
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
