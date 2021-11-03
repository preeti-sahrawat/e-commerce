<?php
if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
if(isset($_REQUEST['uppass'])){
    $old = md5($_POST['oldpass']);
    $email = $_SESSION['user_shop'];
    $new = md5($_POST['newpass']);
    echo $updatepass = "UPDATE `registration` SET `user_password`='$new' WHERE user_email='$email' AND user_password='$old' ";
    if(mysqli_query($con,$updatepass)){
        echo "<script>alert('success')</script>";
    }else{
        echo "<script>alert('Something happning Wrong ')</script>";
    }
}
  if(isset($_POST['update'])){
     $email = $_SESSION['user_shop'];
     $city = $_POST['city'];
     $num = $_POST['contact'];
     $address = $_POST['address'];
     $country = $_POST['country'];
     $gender = $_POST['gender'];
     $pincode = $_POST['pincode'];
     $updationdat = $_POST['updatedate'];

     $img = $_FILES['img']['name'];
     $tempname = $_FILES['img']['tmp_name'];

     move_uploaded_file($tempname,"customerimg/".$img);
    
     $query = "UPDATE `registration` SET `user_city`='$city',`user_contact`='$num',`user_address`='$address',`user_country`='$country',`user_gender`='$gender',`user_image`='$img',`user_pincode`='$pincode',`account_last_updation`='$updationdat' WHERE user_email='$email'";
     if(mysqli_query($con,$query)){
        echo "<script>alert('success')</script>";
     }else{
        echo "<script>alert('Wrong password')</script>";
     }
  }
?>
<center>
    <div class="box" style="margin-left: 21px;">
        <h1>My Orders</h1>
        <p class="text-muted">If u have any queries, please feel free to Contact Us, Our Customer service center in
            working for you 24/7.</p>

        <div class="accordion mt-5" id="Update-profile">
            <div class="card">
                <div class="card-header" id="change">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <span>1</span>
                            MY profile
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#Update-profile">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <h5>Personal Info</h5>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name='email' value='<?php echo $data['user_email']; ?>' placeholder="Enter email" disabled>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value='<?php echo $data['user_city']; ?>' name="city" class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter City" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" value='<?php echo $data['user_contact']; ?>' name="contact" class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter Contact" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value='<?php echo $data['user_address']; ?>' name="address" class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter  address">
                                        </div>
                                        <div class="form-group">
                                            <input type="country" value='<?php echo $data['user_country']; ?>' name="country" class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter country" required">
                                        </div>
                                        <div class="form-group">
                                           <select class='form-control' value='<?php echo $data['user_gender']; ?>' name="gender" required>
                                               <option value="">Select Gender</option>
                                               <option value="male">Male</option>
                                               <option value="female">Female</option>
                                               <option value="other">other</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value='<?php echo $data['user_pincode']; ?>' name="pincode" class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter Pincode" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value='<?php echo date("d-m-y h:i:m"); ?>' name="updatedate" placeholder="Enter Pincode">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="img" id="exampleInputPassword1"
                                                placeholder="Upload Image" required>
                                                <img style="height: 84px; margin: 5px 430px -5px 0;" src="customerimg/<?php echo $data['user_image'] ?>" alt="Not Found" srcset="">
                                        </div>
                                        <button type="submit" name='update' class="btn btn-primary btn-lg btn-block">Updated Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span>2</span>
                            change password
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#Update-profile">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <form method='post'>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="oldpass" placeholder="Enter Old Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password"name="newpass"  class="form-control" id="exampleInputPassword1"
                                                placeholder="Enter New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confpass" class="form-control" id="exampleInputPassword1"
                                                placeholder="Confirm Password" required>
                                        </div>
                                        <button type="submit" name='uppass' class="btn btn-primary btn-lg btn-block">Updated Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>