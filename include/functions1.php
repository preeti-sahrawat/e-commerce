<?php
include("dbconf.php");
// error_reporting(0);
////get user ip address
function updateuidincart(){
    global $con;
    global $id;
    $getuserip = getuserip();
    $qu = "UPDATE `addcart` SET `userid`='$id' WHERE ip_add='$getuserip'";
    $res = mysqli_query($con,"UPDATE `addcart` SET `userid`='$id' WHERE ip_add='$getuserip'");
}

function getuserip(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) :
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
             return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        case (!empty($_SERVER['HTTP_USER_AGENT'])):
        default : return $_SERVER['REMOTE_ADDR'];
    }
}
/////////////addd cart function
function addcart($qty=1,$size=1){
    global $con;
    if(isset($_GET['addcart'])){
         $ip = getuserip();
         global $id;
         $pid = $_GET['addcart'];
        $run = mysqli_query($con,"SELECT * FROM `addcart` WHERE (ip_add= '$ip' OR userid='$id') AND pid='$pid'");
        if(mysqli_num_rows($run) == 1){
              echo "<script>alert('Product Is allredy Added')</script>";
              echo "<script>window.open('details.php?pid=$pid','_self')</script>";
            }else{
            $query = "INSERT INTO `addcart`(`pid`, `qty`,`ip_add`, `size`) VALUES ('$pid','$qty','$ip','$size')";
            if(mysqli_query($con,$query)){
                echo "<script>alert('Product Added')</script>";
                echo "<script>window.open('details.php?pid=$pid','_self')</script>";
            }else{
                echo "<script>alert('Something happning Wrong ')</script>";
                echo "<script>window.open('details.php?pid=$pid','_self')</script>";
            }
        } 
    }
}
/////////////////////////// find and display all the product in cart
function getcartitem(){
    global $con;
    global $id;
    $ip = getuserip();
    $item = mysqli_query($con,"SELECT * FROM `addcart` WHERE (ip_add= '$ip' OR userid='$id')");
    if(mysqli_num_rows($item) > 0){
    $count =0;
echo '<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">Sno</th>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Update Bill</th>
            <th scope="col">Price Per unit</th>
            <th scope="col">Shipping Charge</th>
            <th scope="col">Other Charge</th>
            <th scope="col">Delete</th>
            <th scope="col">Grandtotal</th>
        </tr>
    </thead>
    <tbody>';
    while ($data = mysqli_fetch_array($item)) {
         $count++; 
        $cartitemid = $data['id'];
        $pid = $data['pid'];
        $qty = $data['qty'];
        $product = mysqli_query($con,"SELECT * FROM products WHERE productid = '$pid'");
        $prodata = mysqli_fetch_array($product);
        $productname = $prodata['product_name'];
        if(strlen($productname) > 40) 
            $productname = substr($productname,0,45).'....';
    ?>
<tr>
    <th scope="row"><?php echo $count; ?></th>
    <td> <img src="admin/productimages/<?php echo $prodata['product_img1']; ?>" alt="" width="114" height="100">
    </td>
    <td><?php echo $productname; ?></td>
    <form method="post">
        <td><input class="form-control" name="qty" min=1 max=100 value="<?php echo $qty; ?>" type="number"></td>
        <td>
            <button type="submit" class="btn btn-success">Update</button> <input value="<?php echo $cartitemid; ?>"
                name="updateitems" type="hidden">
    </form>
    </td>
    <td><?php echo $prodata['product_price'] ; ?></td>
    <td><?php echo $prodata['product_shipping_charge'] ; ?></td>
    <td><?php echo $prodata['product_other_charge'] ; ?></td>
    <td>
        <form method="post"><button type="submit" name="deleteitem" class="btn btn-danger">Delete</button> <input
                value="<?php echo $cartitemid; ?>" name="cartitemdelid" type="hidden"></form>
    </td>
    <td><?php echo ($prodata['product_price'] + $prodata['product_other_charge'] + $prodata['product_shipping_charge']) *$qty; ?>
    </td>
</tr>

<?php  }?>
</tbody>
<tfoot>
    <tr>
        <th colspan="9">Total INR </th>
        <th><?php echo getcarttotal(); ?></th>
    </tr>
</tfoot>
</table>

<?php }else{?>
<h5 class="oops-shopping">Opps Your Cart Is Empty <i class="fa fa-cart-arrow-down"></i></h5>
<?php }}

////////find all iteam count in cart
function totalitemincart(){
    global $con;
    global $id;
    $ip = getuserip();
    $item = mysqli_query($con,"SELECT * FROM `addcart` WHERE (ip_add= '$ip' OR userid='$id')");
    $totalitem = mysqli_num_rows($item);
    echo $totalitem;
}

function getcarttotal(){
    global $con;
    global $id;
    $ip = getuserip();
    $total = 0;
    $item = mysqli_query($con,"SELECT * FROM `addcart` WHERE (ip_add= '$ip' OR userid='$id')");
    while ($rec = mysqli_fetch_array($item)) {
        $proid = $rec['pid'];
        $proqty = $rec['qty'];
        $getprice = mysqli_query($con,"SELECT * FROM products WHERE productid='$proid'");
        while ($row = mysqli_fetch_array($getprice)) {
            $sub_total =$row['product_price'] * $proqty; 
            $shiping_pri = $row['product_shipping_charge']* $proqty;;
            $other = $row['product_other_charge'] * $proqty;;
            $total += $sub_total + $shiping_pri + $other;
        } 
    }
    echo $total;
}

function deletecartitem(){
    if(isset($_POST['deleteitem'])){
        global $con;
        global $id;
        $delid = $_POST['cartitemdelid'];
        $ip = getuserip();
        $res = mysqli_query($con,"DELETE FROM `addcart` WHERE id='$delid' AND (ip_add='$ip' OR userid='$id') ");
    }
}

function updateitemcart(){
    if(isset($_POST['updateitems'])){
        global $con;
        global $id;
        $updateid = $_POST['updateitems'];
        $qty = $_POST['qty'];
        $ip = getuserip();
        $res = mysqli_query($con,"UPDATE `addcart` SET `qty`='$qty' WHERE id='$updateid' AND (ip_add='$ip' OR userid='$id')");
    }
}


?>