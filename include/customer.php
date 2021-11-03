<?php
if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
$name = $data['user_name'];
$lname = $data['user_lastname'];
$id = $data['id'];

?>
   
   
    <div class="card mt-1 sidebar-menu" style="width: 18rem;">
        <div class="card-header">
            <center>
                <a href="myacc.php?viewprofile">
                    <img src="customerimg/<?php echo $data['user_image'] ?>" height="100" class="img-thumbnail" width="200" alt="Not Found">
                </a>
            </center>
            <center>
                <br>
               <?php echo $name.$lname; ?>
            </center>
        </div>
        <div class="card-body user">
            <ul class="nav flex-column category-menu">
            <li class="nav-item <?php if(isset($_GET['viewprofile'])){echo "active1"; } ?> ">
                    <a class="nav-link" href="myacc.php?viewprofile"> <i class="fa fa-user-circle"></i> View Profile</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['myorder'])){echo "active1"; } ?> ">
                    <a class="nav-link" href="myacc.php?myorder"> <i class="fa fa-shopping-cart"></i> MyOrders</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['Payoffline'])) {echo "active1"; }; ?>">
                    <a class="nav-link" href="myacc.php?Payoffline"><i class="fa fa-money"></i> Pay Offline</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['myaddress'])) {echo "active1"; }; ?> ">
                    <a class="nav-link" href="myacc.php?myaddress"><i class="fa fa-map-marker"></i> MyAddress</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['edit_account'])) {echo "active1"; }; ?> ">
                    <a class="nav-link" href="myacc.php?edit_account"><i class="fa fa-pencil"></i>Edit Account</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['wishlist'])) {echo "active1"; }; ?> ">
                    <a class="nav-link" href="myacc.php?wishlist"><i class="fa fa-user"></i> My Wishlist</a>
                </li>
                <li class="nav-item <?php if(isset($_GET['deleteacc'])) {echo "active1"; }; ?> ">
                    <a class="nav-link" href="myacc.php?deleteacc"><i class="fa fa-trash"></i> Delete Account</a>
                </li>

            </ul>
        </div>
    </div>
