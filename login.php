<?php  
session_start();
define('page','Login Here');
define('title','index');
include("include/dbconf.php");
include("mail_function.php");
date_default_timezone_set('Asia/kolkata');

if(!empty($_COOKIE['memberemail']) || !empty($_COOKIE['memberpass'])){
     $query = "SELECT * FROM registration WHERE user_email='".$_COOKIE['memberemail']."' AND user_password='".$_COOKIE['memberpass']."' AND is_active='1' ";
       $res = mysqli_query($con,$query);    
       if(mysqli_num_rows($res) == 1){
           $_SESSION['user_shop'] = $_COOKIE['memberemail'];
           $_SESSION['last_login_time'] = time();
           echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
   }
} 
if(isset($_SESSION['user_shop']) == 0){ 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
     $query = "SELECT * FROM registration WHERE user_email='$email' AND is_active='1' ";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_array($res);
    if($data){
        $dbpass = $data['user_password'];
        if($pass == $dbpass){
            $_SESSION['user_shop'] = $email;
            $_SESSION['last_login_time'] = time();
            if(!empty($_POST['remember'])){
                setcookie ("memberemail",$email,time() + 365*24*60*60);
                setcookie ("memberpass",$pass,time() + 365*24*60*60);
            }else{
                if(isset($_COOKIE['memberemail'])){
                       setcookie("memberemail","");
                }
                if(isset($_COOKIE['memberpass'])){
                    setcookie("memberpass","");
                }
            }
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }else{
            $msg = "Wrong Password";
        }
    }else{
        $msg = "This Email Not Register With Us";
    }
}}else{
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/active.css">
<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="loginheader">
        <h1>Shopping</h1>
        <p>
        Don't have an account? <a href="signup.php">Sign up</a>
        </p>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12">
                <form id="logForm" method="post" action="">
                    <div style="background-color: #ffffff;" class="alert alert-warning alert-dismissible fade show"
                        role="alert">
                        <?php if(isset($msg)) {?>
                        <strong>Ohh Snap ! </strong> <?php echo $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php } ?>
                    </div>
                    <h3 class='center'>Welcome back to Here:</h3>
                    <p>Sign into your account below</p>

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab mt-3">
                        <p><input type="email" placeholder="Enter Email..." id="email" name="email" required>
                        <p><input type="password" name="password" placeholder="Enter password"></p>
                        <p> <input type="checkbox" name="remember" id=""> <label for="">Remamebr Me</label></p>
                    </div>
                    <div style="overflow:auto;">
                        <div>
                            <button style="width:100%; background-color:blue;" type="submit"
                                class="btn btn-primary mt-3" id="nextBtn" name="login">Login</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <hr>
                    <a href="forgot.php">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="validate.js"></script>

</html>