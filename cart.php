<?php 
define('page','shopcart');
define('title','MyCart');
include("include/header.php");
include("include/dbconf.php");
deletecartitem();
updateitemcart();
$ip = getuserip();
$query = "SELECT * FROM addcart WHERE ip_add = '$ip'";
$run = mysqli_query($con,$query);
$totqty = 0;
$tax = 0;
$shipping = 0;
$discount =0;
while ($data = mysqli_fetch_array($run)) {
       $pid = $data['pid'];    
       $totqty += $data['qty']; 
       $totqty2 = $data['qty']; 
       $findpro = mysqli_query($con,"SELECT * FROM products WHERE productid='$pid'");
       while ($prodata = mysqli_fetch_array($findpro)) {
               $tax += $prodata['product_other_charge']* $totqty2;
               $shipping += $prodata['product_shipping_charge'] * $totqty2;
               $discount += $prodata['product_discount'] * $totqty2;
       }

}
?>

<div class="container-fluid">
    <div class="col-md-12 mt-3">
        <ul class="breadcrumb">
            <li> <a href="index.php">Home</a></li>
            <li> Shopping Cart</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-9" id="cart">
            <div class="box">
                    <h1>Shopping Cart</h1>
                    <p class="text-muted col-sm-6">Currently You Have <?php totalitemincart(); ?> Item(s) In Your Cart</p>
                                 <?php  getcartitem(); ?>

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fa fa-chevron-left"></i> Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success" type="submit" name="update">
                                <i class="fa fa-refresh"></i> Update Cart
                            </button>

                            <a href="<?php if(!isset($_SESSION['user_shop'])){ echo "login.php";}else{ echo"checkout.php";} ?>" class="btn btn-primary">
                                Proceed TO Checkout <i class="fa fa-chevron-right"></i>
                            </a>
                            
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box" id="order-summery">
                <div class="box-header">
                    <h3>Order Summery</h3>
                </div>
                <p class="text-muted">
                    Shopping and addtional cost are calculated based on the caluse you have entered
                </p>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order Subtotal</td>
                            <th scope="row">INR</th>
                        </tr>
                        <tr>
                            <td>Shipping and Other</td>
                            <th scope="row">INR <br><?php echo $shipping+$tax; ?></th>
                        </tr>
                        <tr>
                            <td>Total Discount</td>
                            <th scope="row"><?php echo $discount; ?>%</th>
                        </tr>
                        <tr>
                            <td>Total Quantity</td>
                            <th scope="row"><?php echo $totqty; ?></th>
                        </tr>
                        <tr class="total">
                            <td>Grand Total (<?php echo totalitemincart(); ?>) Items</td>
                            <th scope="row">INR<br> <?php echo getcarttotal(); ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
</div>
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="box same-height headline">
                <h3 class="text-center">You Also Like These Products</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 single">
            <!-- col-sm-4 col-sm-6 single -->
            <div class="product center responsive">
                <a href="details.php">
                    <img src="images/productimages/1/micromax3.jpeg" width="300" height="300" alt="Not Found"
                        class="img-fluid">
                </a>
                <div class="text">
                    <h3><a href="details.php">nh bytgf hu v hjbvgt hbuvy hbty hb y jnbh ytv yutv jhgfv hugvy j hbuy vu
                            bhu v uhb
                            ut in 8yg uvtyf ybty g ybty byt f ubyt </a></h3>
                    <p class="price">INR 299</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-secondary">View Details</a>
                        <a href="details.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart"></i>Add TO Cart
                        </a>
                    </p>
                </div>
            </div>
        </div> <!-- col-sm-4 col-sm-6 single end-->
        <div class="col-md-3 col-sm-6 single">
            <!-- col-sm-4 col-sm-6 single -->
            <div class="product center responsive">
                <a href="details.php">
                    <img src="images/productimages/1/micromax3.jpeg" width="300" height="300" alt="Not Found"
                        class="img-fluid">
                </a>
                <div class="text">
                    <h3><a href="details.php">nh bytgf hu v hjbvgt hbuvy hbty hb y jnbh ytv yutv jhgfv hugvy j hbuy vu
                            bhu v uhb
                            ut in 8yg uvtyf ybty g ybty byt f ubyt </a></h3>
                    <p class="price">INR 299</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-secondary">View Details</a>
                        <a href="details.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart"></i>Add TO Cart
                        </a>
                    </p>
                </div>
            </div>
        </div> <!-- col-sm-4 col-sm-6 single end-->
        <div class="col-md-3 col-sm-6 single">
            <!-- col-sm-4 col-sm-6 single -->
            <div class="product center responsive">
                <a href="details.php">
                    <img src="images/productimages/1/micromax3.jpeg" width="300" height="300" alt="Not Found"
                        class="img-fluid">
                </a>
                <div class="text">
                    <h3><a href="details.php">nh bytgf hu v hjbvgt hbuvy hbty hb y jnbh ytv yutv jhgfv hugvy j hbuy vu
                            bhu v uhb
                            ut in 8yg uvtyf ybty g ybty byt f ubyt </a></h3>
                    <p class="price">INR 299</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-secondary">View Details</a>
                        <a href="details.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart"></i>Add TO Cart
                        </a>
                    </p>
                </div>
            </div>
        </div> <!-- col-sm-4 col-sm-6 single end-->


    </div>
</div>

<?php include("include/footer.php"); ?>