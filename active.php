<?php  
include("include/dbconf.php");

if(isset($_GET['token'])){
    $token = $_GET['token'];
     $res = "SELECT * FROM registration WHERE (is_active='0' AND otp='$token') LIMIT 1";
     $data = mysqli_query($con,$res);
     $num = mysqli_fetch_array($data);
     if($num){
        if(isset($_REQUEST['active'])){
            $email = $_POST['email'];
            $pass = md5($_POST['password']);
         $query = "SELECT * FROM registration WHERE (user_email='$email' AND user_password='$pass' AND is_active='0' AND otp='$token') LIMIT 1";
            $login = mysqli_query($con,$query);
            $data = mysqli_fetch_array($login);
            $name = $data['user_email'];
          if($data){
               $sql = $query = "UPDATE `registration` SET `is_active` ='1' WHERE (user_email='$name' AND is_active='0')";
              if(mysqli_query($con,$sql)){
                echo "<script>alert('Your Account IS active')</script>";
                echo "<script>window.open('index.php','_self')</script>";
              }else{
                echo "<script>alert('Unabkle to active')</script>";
              }
          }else{
              echo "<script>alert('You Enterd Wrong Password')</script>";
          }
        }
    } 
  else{
      echo "<script>alert('This Acount Invalid Or allredy Verified')</script>";
      echo "<script>window.open('index.php','_self')</script>";
  }

}else{
    echo "<script>window.open('index.php','_self')</script>";
}

?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/active.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Activate Account Here</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12">
                <form id="logForm" method="post" action="">
                    <div style="background-color: #ffffff;" class="alert alert-warning alert-dismissible fade show"
                        role="alert">
                        <?php if(isset($msg)) {?>
                        <strong>Ohh Snap!</strong><?php echo $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php } ?>
                    </div>
                    <h3 class='center'>Welcome Your Account Verification:</h3>

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab mt-3">
                        <p><input type="email" placeholder="Enter Email..." id="email" name="email" required>
                            <p><input type="password" name="password" placeholder="Enter password"></p>
                    </div>
                    <div style="overflow:auto;">
                        <div>
                            <button style="width:100%; background-color:blue;" type="submit"
                                class="btn btn-primary mt-3" id="nextBtn" name="active">Active</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <hr>
                    <a href="forgot.php">Forgot Password?</a>
                    <a style='float:right;' href="login.php">Login</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="validate.js"></script>

</html>