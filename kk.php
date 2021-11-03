<?php
session_start();
include("include/dbconf.php");
include("include/functions1.php");
if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
elseif (!isset($_POST['payoffline'])) {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else{
    if(isset($_POST['payoffline'])) {
            $c_id = $_POST['c_id'];
            $ip = getuserip();
            $invoice_no = mt_rand();
            $payment_method = "COD";
            $select_cart = "SELECT * FROM addcart WHERE ip_add='$ip'";
            $res = mysqli_query($con,$select_cart);
            while ($row = mysqli_fetch_array($res)){
                  $proid = $row['pid'];
                  $qty = $row['qty'];
                  $size = $row['size'];
              $getprodata = mysqli_query($con,"SELECT * FROM products WHERE productid='$proid'");
              while ($fetchpro = mysqli_fetch_array($getprodata)) {
                  $subtotal = $fetchpro['product_price'] * $qty;
                   $insert_cus = "INSERT INTO `customer_order`(`customer_id`, `due_amount`, `total_amt`, `product_id`,`invoice_no`,`size`, `order_status`, `qty`, `payment_method`)
                    VALUES ('$c_id','$subtotal','$subtotal','$proid','$invoice_no','$size','Pending','$qty','COD')";
                    $run_cus_order = mysqli_query($con,$insert_cus);
                    $inserrt_pending = "INSERT INTO `pending_or_tracking`(`cus_id`, `invoice_id`, `product_id`, `qty`, `size`, `order_status`, `remark`)
                     VALUES ('$c_id','$invoice_no','$proid','$qty','$size','Pending','This is Pending')";
                     $runpending = mysqli_query($con,$inserrt_pending);
                     $delete_cart = mysqli_query($con,"DELETE FROM `addcart` WHERE ip_add='$ip'");
                     if($insert_cus){
                       echo "<script>alert('Your Order is placed')</script>";
                      echo "<script>window.open('index.php','_self')</script>";
                     }
              }    
            }
  }
}
?>