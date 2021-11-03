<?php 
define('page','Checkout');
define('title','Checkout');
include("include/header.php");
include("include/dbconf.php");    
if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}else{
    $ip = getuserip();
    $select_cart = "SELECT * FROM addcart WHERE (ip_add= '$ip' OR userid='$id')";
    $res = mysqli_query($con,$select_cart);
    if(mysqli_num_rows($res) == 0){
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
    $email = $_SESSION['user_shop'];
    $res = mysqli_query($con,"SELECT * FROM registration WHERE user_email='$email'");
    $data = mysqli_fetch_array($res);
    $id = $data['id'];
    $invoice_no = "ORDS" .rand(10000,99999999);

}
?>


<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo totalitemincart(); ?></span>
                </h4>
                <ul class="list-group mb-3">
<?php
$ip = getuserip();
$query = "SELECT * FROM addcart WHERE (ip_add= '$ip' OR userid='$id')";
$run = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($run)) {
       $pid = $row['pid'];
       $qty = $row['qty'];       
       $findpro = mysqli_query($con,"SELECT * FROM products WHERE productid='$pid'");
       while ($prodata = mysqli_fetch_array($findpro)) {?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $prodata['product_name']; ?></h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">RS <?php echo ($prodata['product_price'] + $prodata['product_shipping_charge']+ $prodata['product_other_charge']  )* $qty ; ?></span>
                    </li>
<?php }} ?>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (INR)</span>
                        <strong><?php echo getcarttotal(); ?></strong>
                    </li>
                </ul>

                <form class="card p-2" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing Information</h4>
                <form class="needs-validation" onsubmit="insertpro()" action="paytm\PaytmKit\pgRedirect.php"  method='post'>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="<?php echo $data['user_name']; ?>" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lname" placeholder="" value="<?php echo $data['user_lastname']; ?>" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['user_email']; ?>" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['user_address']; ?>" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <input type="hidden" name="c_id" value="<?php echo $id; ?>">

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="adddress2" name="adddress2" value="<?php echo $data['user_address']; ?>" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" name="country" value="" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" name="state" value="" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $data['user_pincode']; ?>" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my
                            billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                  <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" id="checkout" name="checkout" type="submit">Continue to checkout</button>

<input id="ORDER_ID" tabindex="1" id="ORDER_ID" maxlength="20" type="hidden" size="20"name="ORDER_ID" autocomplete="off"value="<?php echo $invoice_no; ?>">
<input id="CUST_ID" tabindex="2" id="CUST_ID" type="hidden" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $id; ?>">
<input id="INDUSTRY_TYPE_ID" tabindex="4" type="hidden" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
<input id="CHANNEL_ID" type="hidden" tabindex="4" maxlength="12"size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
<input title="TXN_AMOUNT" id="amt" tabindex="10" type="hidden" name="TXN_AMOUNT"value="<?php echo getcarttotal(); ?>">
        
                </form>
            </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2020 Shopping Web</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

</body>
<?php
include("include/footer.php")
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function insertpro(){
    fname = $('#firstName').val();
    lname = $('#lastName').val(); 
    email = $('#email').val();
    add1 = $('#address').val();
    add2 = $('#adddress2').val();
    counrty = $('#country').val();
    state = $('#state').val();
    zip = $('#zip').val();
    c_id  = $('#CUST_ID').val();
    invoiceno = $('#ORDER_ID').val();
    // console.log("huyg");
    // console.log(fname, lname, c_id, invoiceno);
    jQuery.ajax({
        url: "proceedpay.php",
        data: {fname:fname , lname:lname, email:email,add1:add1,add2:add2,counrty:counrty, state:state,zip:zip,c_id:c_id,invoiceno:invoiceno,amt: <?php echo "200"; ?>},
        type: "POST",
        success: function(data) {
            console.log(data)
        },
        error: function() {console.log("error");
        }
    });
}
</script>
</body>
</html>