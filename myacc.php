<?php 
    define('page','myacc');
    define('title','Myaccount');
    include("include/header.php");
    include("include/dbconf.php");
   if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

?>

<div class="container">
    <div class="col-md-12 mt-3">
        <ul class="breadcrumb">
            <li> <a href="index.php">Home</a></li>
            <li> Myaccount</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php include("include/customer.php"); ?>
        </div>
        <div class="col-md-9">
            <?php
              if(isset($_GET['myorder'])){
                  include("user/myorder.php");
              }
              if(isset($_GET['Payoffline'])){
                include("user/Payoffline.php");
            }
            if(isset($_GET['edit_account'])){
                include("user/editacc.php");
            }
            if(isset($_GET['deleteacc'])){
                include("user/deleteacc.php");
            }
            if(isset($_GET['viewprofile'])){
                include("user/viewprofile.php");
            }
            if(isset($_GET['wishlist'])){
                include("user/mywishlist.php");
            }
            if(isset($_GET['myaddress'])){
                include("user/address.php");
            }
            ?>
        </div>
    </div>
</div>

<?php include("include/footer.php"); ?>