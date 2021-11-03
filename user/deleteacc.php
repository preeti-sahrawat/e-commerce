<?php
if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
if(isset($_REQUEST['delete'])){
    $pass = $_POST['pass'];
    $email = $_SESSION['user_shop'];
    $updatepass = "DELETE FROM `registration` WHERE user_email='$email' AND user_password='$pass' ";
    if(mysqli_query($con,$updatepass)){
        session_destroy();
        echo "<script>alert('Your Account Has Been Deleted')</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }else{
        echo "<script>alert('Something happning Wrong ')</script>";
    }
}
?>
<center>
    <div class="box" style="margin-left: 21px;">
        <h5>Do You Really Went TO Delete Account</h5><br>
        <p class="text-muted">If u have any queries, please feel free to Contact Us, Our Customer service center in
            working for you 24/7.</p>
                <form method="post">
                    <div class="form-group">
                        <input type="email" value='<?php echo $_SESSION['user_shop'];  ?>' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" disabled>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name='pass' id="exampleInputPassword1" placeholder="confirm Password" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <a href="#">
                    <button type="submit" class="btn btn-danger">Delete My Account</button>
                    <a href="index.php"><button type="submit" name='delete' class="btn btn-primary">Cancel</button></a>
                    </a>
                </form>
            </div>
        </div>
    </div>
</center>