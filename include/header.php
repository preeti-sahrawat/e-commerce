<?php
session_start();
include("include/functions1.php"); 
addcart();

if(isset($_SESSION['user_shop']) != 0){ 
if((time() - $_SESSION['last_login_time']) > 900){
    header("Location:user/logout.php");
  }else{
      $_SESSION['last_login_time'] = time();
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/> <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <title><?php echo title; ?></title>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
                    <a href="#" class="btn btn-success btn-sm">
                        Welcome
                        <?php if(!empty($_SESSION['user_shop'])) {echo $_SESSION['user_shop']; }else{ echo "GUEST"; } ?>
                    </a>
                </div>
                <div class="col-md-5">
                    <?php  if(empty($_SESSION['user_shop'])){  ?>
                    <ul>
                        <div class="menu">
                            <li><a href="index.php">Home</li></a>
                            <li><a href="signup.php">Register</li></a>
                            <li><a href="login.php">Cart</li></a>
                            <li><a href="login.php">Login</li></a>
                        </div>
                    </ul>
                    <?php  }else{ 
                            $email = $_SESSION['user_shop'];
                            $res = mysqli_query($con,"SELECT * FROM registration WHERE user_email='$email'"); 
                               $data = mysqli_fetch_array($res);
                               $id = $data['id'];
                               updateuidincart();
                        ?>
                    <ul>
                        <div class="menu">
                            <li><a href="index.php">Home</li></a>
                            <li><a href="cart.php">Cart</li></a>
                            <li><a href="myacc.php?viewprofile">My Account</li></a>
                            <li><a href="user/logout.php">Logout</li></a>
                        </div>
                    </ul>
                    <?php  }  ?>

                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="font-size: 18px; padding-left: 10px;">
                <li class="nav-item <?php if(page == "home"){ echo "active2"; } ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "shop"){ echo "active2"; } ?> " href="shop.php">Shop</a>
                </li>

                <?php if(isset($_SESSION['user_shop'])){ ?>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "myacc"){ echo "active2"; } ?> " href="myacc.php?viewprofile">Myaccount</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "myacc"){ echo "active2"; } ?> "
                        href="login.php">Myaccount</a>
                </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link <?php if(page == "shopcart"){ echo "active2"; } ?> " href="cart.php">Shopping
                        Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "services"){ echo "active2"; } ?> " href="shop.php">Business With Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "contact"){ echo "active2"; } ?> " href="contactus.php">Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(page == "game"){ echo "active2"; } ?> " href="car.php">Games</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                &nbsp;<a href="cart.php" class="btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php totalitemincart(); ?> item In Cart</span>
                </a>
            </form>
        </div>
</nav>