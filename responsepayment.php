<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include("mail_function.php");
include("include/dbconf.php");


// following files need to be included
require_once("paytm/paytmKit/lib/config_paytm.php");
require_once("paytm/paytmKit/lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

$status = $_POST['STATUS'];
$orderid = $_POST['ORDERID'];  
$amt = $_POST['TXNAMOUNT'];
$tid = $_POST['TXNID'];
$bname = $_POST['BANKNAME'];
$txdate = $_POST['TXNDATE'];

if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
        echo $query = "SELECT * FROM `customer_order` WHERE invoice_no='$orderid' AND is_active='0'";
        $res = mysqli_query($con,$query);
        $checkprice = 0;
        $email = "";
        while ($txrow = mysqli_fetch_array($res) ) {
            $checkprice += $txrow['total_amt'];
            $email = $txrow['user_email'];
        }
        if($checkprice == $amt){
            $upsts = "UPDATE `customer_order` SET  `due_amount`=$checkprice-$amt,`txdate`='$txdate', `order_status`='success',`payment_id`='$tid',`payment_status`='$status',`is_active`='1',`payment_method`='$bname' WHERE invoice_no='$orderid'";
            if(mysqli_query($con,$upsts)){
                $title = "Your Order Is Successfully placed";
                $body = "<p> your oder is succesfully placed and order id : $orderid <br>  Your Transscation Id is : $tid </p>"; 
               sendmailuser($email,$title,$body);
               echo "Order success";
               echo "<script type='text/javascript'> document.location = 'myacc.php?myorder.php'; </script>";
            }
        }
}
	else {
             $upsts = "UPDATE `customer_order` SET `txdate`='$txdate', `order_status`='failed',`payment_id`='$tid',`payment_status`='$status',`payment_method`='$bname' WHERE invoice_no='$orderid'";
             if(mysqli_query($con,$upsts)){
                 $title = "Your Order Is Failed placed";
                 $body = "<p> your oder is succesfully placed and order id : $orderid <br>  Your Transscation Id is : $tid </p>"; 
                sendmailuser($email,$title,$body);
                echo "Order Failed";
                echo "<script type='text/javascript'> document.location = 'myacc.php?myorder.php'; </script>";
        }
}
    
	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	
}
else {
	echo "<b>Checksum mismatched.</b>";
    //Process transaction as suspicious.
     $upsts = "UPDATE `customer_order` SET `txdate`='$txdate', `order_status`='suspicious',`payment_id`='$tid',`payment_status`='$status',`is_active`='2',`payment_method`='$bname' WHERE invoice_no='$orderid'";
    if(mysqli_query($con,$upsts)){
        $title = "Your Order Is Failed placed";
        $body = "<p> your oder is succesfully placed and order id : $orderid <br>  Your Transscation Id is : $tid </p>"; 
       sendmailuser($email,$title,$body);
       echo "Order suspicious";
       echo "<script type='text/javascript'> document.location = 'myacc.php?myorder.php'; </script>";
}
    
}
?>