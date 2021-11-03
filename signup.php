<?php  
define('page','Register Here');
define('title','index');
include("include/header.php");
include("include/dbconf.php");
include("mail_function.php");
// $loginurl = $gClient->createAuthUrl();
if(isset($_SESSION['user_shop']) == 0){ 
if(isset($_POST['formsubmit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $password = md5(mysqli_real_escape_string($con,$_POST['password']));
    $ip = getuserip();
    $vskey = md5(time().$name);

    $subject = "This is Email Varification";
    $body = "<p>Thanks for registering with Us. Please click this link to complete your registration: <br> <br> http://157.245.251.238/active.php?token=$vskey</p>";

   $query = "INSERT INTO `registration`(`user_name`, `user_lastname`, `user_email`, `user_password`, `user_contact`,`user_ip`, `otp`) VALUES ('$name','$lname','$email','$password','$number','$ip','$vskey')";
    $res = mysqli_query($con,$query);

    if($res){
        $msg = "You’re just one step away…Please click on the verification link we just sent to your Email.";
        sendmailuser($email,$subject,$body);
    }else{
        echo "not";
    }
}}else{
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

?>
<head>
<link rel="stylesheet" href="css/active.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class='maintext'> Welcome TO Our Website You Can Register Yourself Here </h1>
            </div>
            <div class="col-md-6 col-sm-12">
                <form id="regForm" method="post" action="">
                    <div style="background-color: #ffffff;" class="alert alert-warning alert-dismissible fade show"
                        role="alert">
                        <?php if(isset($msg)) {?>
                        <strong>Thank you!</strong><?php echo $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php } ?>
                    </div>
                    <h3 class='center'>Register in seconds:</h3>

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab mt-3">
                        <p><input type="text" placeholder="First name..." id="na,e" name="name" required></p>
                        <p><input type="text" placeholder="Last name..." id="lname" name="lname" required></p>
                        <p><input type="email" placeholder="Enter Email..." id="email" onBlur="validemail()"
                                name="email" required>
                            <span id="user-status2" style="font-size:10px; "></span></p>
                        <p> <input type="number" name="number" onBlur="validphone()" id="number" placeholder="Enter Number"></p>
                        <span id="user-status1" style="font-size:10px; "></span></p>
                        <p><input type="password" name="password" placeholder="Enter password"></p>
                     <p><span style="" id="captcha"> </span><i style="cursor:pointer; " class="fa fa-refresh" onClick='makeid(5)' aria-hidden="true"></i> 
                      <input type="text" id="captachacode" onBlur="checkcode()" style="height: 38px;width: 74%;margin-left: 9px; font-size: 16px;" placeholder="captch Text" required></p>
                    </div>
                    <div style="overflow:auto;">
                        <div>
                            <button style="width:100%; background-color:blue;" type="submit"
                                class="btn btn-primary mt-3" id="nextBtn" name="formsubmit">Submit</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <hr>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="validate.js"></script>
<script>
    function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
 code = makeid(5);
 document.getElementById("captcha").innerText = code;
 
 function checkcode(){
 var usercode = document.getElementById('captachacode').value;
 if(usercode != code){
     document.getElementById("nextBtn").disabled = true;
     document.getElementById("captachacode").style.border = "4px solid red"; 
 }else{
     document.getElementById("nextBtn").disabled = false;
     document.getElementById("captachacode").style.border = "2px solid blue";
 }}
</script>
</html>