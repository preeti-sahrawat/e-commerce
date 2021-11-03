<?php

// if(isset($_POST['checkout'])){
//     $ip = getuserip();
//     $select_cart = "SELECT * FROM addcart WHERE ip_add='$ip'";
//     $res = mysqli_query($con,$select_cart);
//     $name = $_POST['name'];
//     $lname = $_POST['lname'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];
//     $address2 = $_POST['adddress2'];
//     $country = $_POST['country'];
//     $state = $_POST['state'];
//     $zip  = $_POST['zip'];
//             $c_id = $_POST['c_id'];
//             $payment_method = "COD";
//             while ($row = mysqli_fetch_array($res)){
//                   $proid = $row['pid'];
//                   $qty = $row['qty'];
//                   $size = $row['size'];
//                   $getprodata = mysqli_query($con,"SELECT * FROM products WHERE productid='$proid'");
//             while ($fetchpro = mysqli_fetch_array($getprodata)) {
//                   $subtotal = $fetchpro['product_price'] * $qty;
//                    echo $insert_cus = "INSERT INTO `customer_order`(`customer_id`, `due_amount`, `total_amt`, `product_id`, `user_name`, `user_email`, `address`, `adderss_optional`, `country`, `state`, `pincode`,`invoice_no`,`size`, `order_status`,`payment_status`,`qty`)
//                     VALUES ('$c_id','$subtotal','$subtotal','$proid','$name$lname','$email','$address','$address2','$country','$state','$zip','$invoice_no','$size','Pending','pending','$qty')";
//                     $run_cus_order = mysqli_query($con,$insert_cus);
//                     $inserrt_pending = "INSERT INTO `pending_or_tracking`(`cus_id`, `invoice_id`, `product_id`, `qty`, `size`, `order_status`, `remark`)
//                      VALUES ('$c_id','$invoice_no','$proid','$qty','$size','Pending','This is Pending')";
//                      $runpending = mysqli_query($con,$inserrt_pending);
//                      $delete_cart = mysqli_query($con,"DELETE FROM `addcart` WHERE ip_add='$ip'");
//               }    
//             }
//     }
?>

<?php
session_start();
include("include/dbconf.php");
include("include/functions1.php");
$email = $_SESSION['user_shop'];
$res = mysqli_query($con,"SELECT * FROM registration WHERE user_email='$email'"); 
$data = mysqli_fetch_array($res);
$id = $data['id'];

if(isset($_POST['fname'])){
    $ip = getuserip();
    $select_cart = "SELECT * FROM addcart WHERE userid='$id' ";
    $res = mysqli_query($con,$select_cart);
    $name = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['add1'];
    $address2 = $_POST['add2'];
    $country = $_POST['counrty'];
    $state = $_POST['state'];
    $zip  = $_POST['zip'];
    $invoice_no = $_POST['invoiceno'];

            $c_id = $_POST['c_id'];
            while ($row = mysqli_fetch_array($res)){
                  $proid = $row['pid'];
                  $qty = $row['qty'];
                  $size = $row['size'];
                  $getprodata = mysqli_query($con,"SELECT * FROM products WHERE productid='$proid'");
            while ($fetchpro = mysqli_fetch_array($getprodata)) {
                  $tax = $fetchpro['product_other_charge'] + $fetchpro['product_shipping_charge'];
                  $subtotal = ($fetchpro['product_price'] + $tax)* $qty;
             $insert_cus = "INSERT INTO `customer_order`(`customer_id`, `due_amount`, `total_amt`, `product_id`, `user_name`, `user_email`, `address`, `adderss_optional`, `country`, `state`, `pincode`,`invoice_no`,`size`, `order_status`,`payment_status`,`qty`)
                    VALUES ('$c_id','$subtotal','$subtotal','$proid','$name$lname','$email','$address','$address2','$country','$state','$zip','$invoice_no','$size','Pending','pending','$qty')";
                    $run_cus_order = mysqli_query($con,$insert_cus);
                    $inserrt_pending = "INSERT INTO `pending_or_tracking`(`cus_id`, `invoice_id`, `product_id`, `qty`, `size`, `order_status`, `remark`)
                     VALUES ('$c_id','$invoice_no','$proid','$qty','$size','Placed','This is Pending')";
                     $runpending = mysqli_query($con,$inserrt_pending);
                     $delete_cart = mysqli_query($con,"DELETE FROM `addcart` WHERE ip_add='$ip'");
              }    
            }
    }
?>