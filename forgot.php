<?php  
session_start();
include("include/dbconf.php");
include("mail_function.php");
date_default_timezone_set('Asia/kolkata'); 
$success = " ";
if(isset($_POST['submit_mail'])){
    $email = $_POST['email'];
    $res = mysqli_query($con,"SELECT * FROM registration WHERE user_email='$email'");
    $num = mysqli_num_rows($res);
    if($num){
   $check = mysqli_query($con,"SELECT * FROM `otp_verify` WHERE email='$email' AND is_expired!=1 AND NOW() <= DATE_ADD(created_at	, INTERVAL 10 MINUTE)");
    $exist = mysqli_num_rows($check);
   $data = mysqli_fetch_array($check);
   if($exist){
         $otp = $data['otp'];
         require_once("mail_function.php");
         $sub = "Account Recovery";
         $body = "<p>Your One Time Otp Password is :- $otp <br><br> This otp Is valid Till A hours </p>";
         sendmailuser($email,$sub,$body);
            $_SESSION['forgotpass'] =  $_POST['email'];
            $success = 1;
   }else{
    $otp = rand(100000,900000);
    require_once("mail_function.php");
    $sub = "Account Recovery";
    $body = "<p>Your One Time Otp Password is :- $otp <br><br> This otp Is valid Till A hours </p>";
    sendmailuser($email,$sub,$body);
    $res = mysqli_query($con,"INSERT INTO `otp_verify`(`email`, `otp`, `created_at`) VALUES ('$email','$otp','".date("Y-m-d H:i:s")."')");
    if($res){
        $_SESSION['forgotpass'] =  $_POST['email'];
        $success = 1;
     }else{
        $msg = "Something is Wrong";
     }
}
          
    }else{
        $msg = "Email Not Found";
    }
}

if(isset($_POST['submit_otp'])){
    $email = $_SESSION['forgotpass'];
    $result = mysqli_query($con,"SELECT * FROM otp_verify WHERE otp='".$_POST["otp"]."' AND email='$email' AND is_expired!=1 AND NOW() <= DATE_ADD(created_at	, INTERVAL 10 MINUTE)");
    $count = mysqli_num_rows($result);
    if(!empty($count)){
          $res = mysqli_query($con,"UPDATE otp_verify SET is_expired=1 WHERE otp='".$_POST["otp"]."'");
          $success = 2;   
    }else{
        $msg = "Invalid OTP!";
    }
}
if(isset($_POST['submit_password'])){
    $newpass = md5($_POST['pass']);
    $email = $_SESSION["forgotpass"];
    $confpass = md5($_POST['confpass']);
   echo $res = mysqli_query($con,"UPDATE registration SET user_password='$newpass' WHERE user_email='$email'");
    if(!empty($res)){
           $msg = "Password Updated";
           session_destroy();
    }else{
           $msg = "Some Thing Went TO Wrong";
    }
}
?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/active.css">
<title>Recover Paassword</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12">
                <form id="forget" method="post" action="">
                    <div style="background-color: #ffffff;" class="alert alert-warning alert-dismissible fade show"role="alert">
                        <?php if(isset($msg)) {?>
                        <strong>Ohh Snap ! </strong> <?php echo $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php } ?>
                    </div>
  <?php if($success == 1){ ?>

                  <h3 class='center'>Enter Otp:</h3>
                    <div class="tab mt-3">
                        <p><input type="number" placeholder="Enter Otp..." id="otp" name="otp" required>
                    </div>
                    <div style="overflow:auto;">
                            <button style="width:100%; background-color:green;" type="submit"class="btn btn-primary mt-3" id="otp" name="submit_otp">Send Otp</button>
                    </div>
    
  <?php } else if ($success == 2) {?>

    <h3 class='center'>Genrate New Password:</h3>
                    <div class="tab mt-3">
                        <p><input type="password" placeholder="Enter Password..." id="email" name="pass" required>
                        <p><input type="password" placeholder="Confirm Password..." id="email" name="confpass" required>
                    </div>
                    <div style="overflow:auto;">
                            <button style="width:100%; background-color:blue;" type="submit"class="btn btn-primary mt-3" id="email" name="submit_password">Send Otp</button>
                    </div>

  <?php } else {?>
                    <h3 class='center'>Recover Password:</h3>
                    <div class="tab mt-3">
                        <p><input type="email" placeholder="Enter Email..." id="email" name="email" required>
                    </div>
                    <div style="overflow:auto;">
                            <button style="width:100%; background-color:blue;" type="submit"class="btn btn-primary mt-3" id="email" name="submit_mail">Send Otp</button>
                    </div>
  <?php } ?>                   
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="validate.js"></script>

</html>