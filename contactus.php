<?php 
define('page','contact');
define('title','Contact Us');
include("include/header.php");
include("include/dbconf.php");
include("mail_function.php");

if(isset($_POST['sendmsg'])){
    $ref1 = rand(1000,4000000000);
    $sname = mysqli_real_escape_string($con,$_POST['name']);
    $semail = mysqli_real_escape_string($con,$_POST['email']);
    $snumber = mysqli_real_escape_string($con,$_POST['number']);
    $ssubject = mysqli_real_escape_string($con,$_POST['subject']);
    $smessage =  mysqli_real_escape_string($con,$_POST['message']);
    
    $query = "INSERT INTO `message`(`id`,`name`, `email`, `number`, `subject`, `message`) VALUES ('$ref1','$sname','$semail','$snumber','$ssubject','$smessage')";
    $res = mysqli_query($con,$query);
    //customer mail
    $subject = "Your Referance Id Is :- $ref1";
    $userbody = "<h5>Hii $sname ,</h5></br></br>
    <p>Thanks For Reaching Us Out</p><br><p>We Have just recived Your Response, Our Agent Will Take It Up And Work It On At The Earliest It May Upto 2 Hours</p><br><br><span>Regards:- Tarun Aggarwal</span>";
    sendmailuser($semail,$subject,$userbody);
    /////admin mail
    $admin = "aggtarun4@gmail.com";
    $adminbody = "<h3><p>Referance Id Is :- $ref1</h3>
    <p>Name =  $sname</p> <br> <p> Email =  $semail</p>
    <br> <p> Number =  $snumber</p> <br><p> Number =  $smessage</p>";
    sendmailuser($admin,$ssubject,$adminbody);
    
    if($res){
        $msg = "We Will Contact You And  Check Your Mail For Referance ID";
    } 
}

?>

<div class="container mt-4">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li> <a href="index.php">Home</a></li>
            <li> Contact Us</li>
        </ul>
    </div>
    <div id="content" class="contact">
        <div class="row">
            <div class="col-md-3">
                <?php include("include/sidebar.php"); ?>
            </div>
            <div class="col-md-8 mx-auto">
                <div class="box">
                    <div class="box-header">
                    <?php if(isset($msg)){ ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Well Done!</strong> <?php echo $msg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php  } ?>
                        <center>
                            <h2>Contact Us</h2>
                            <p class="text-muted">If u have any queries, please feel free to Contact Us, Our Customer
                                service center in working for you 24/7.</p />
                        </center>
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    name="email" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Number</label>
                                <input type="number" class="form-control" id="number" aria-describedby="emailHelp"
                                    name="number" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email subject</label>
                                <input type="text" class="form-control" id="subject" aria-describedby="emailHelp"
                                    name="subject" placeholder="Enter subject" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Message</label>
                                <textarea name="message" placeholder="Write Message" class="form-control" id=""
                                    cols="10" rows="5" required></textarea>
                            </div>
                            <div class="concap"><span id="captcha"></span> <i class="fa fa-refresh" onClick='location.reload()' aria-hidden="true"></i> &nbsp;                         
                            <input type="text" id="captachacode" onBlur="checkcode()" style=" height: 27px;margin-bottom: 16px;width: 32%;margin-right: 23px;" placeholder="captch Text" required></div>
                            <button type="submit" id="submit" name="sendmsg" class="btn btn-primary">Send Message</button>
                            <!-- <div class="g-recaptcha" data-sitekey="6LfOT_EUAAAAAK7aX3dafwyKLCVA8tqHPA9Hzkmc"></div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php
include("include/footer.php")
?>

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
    document.getElementById("submit").disabled = true;
    document.getElementById("captachacode").style.border = "4px solid red";
    console.log("huyg")
    console.log(usercode)
    console.log(code)

}else{
    document.getElementById("submit").disabled = false;
    document.getElementById("captachacode").style.border = "2px solid blue";
    console.log("tarun")
}}
</script>
</body>

</html>