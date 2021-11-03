<?php
include("dbconf.php");
if(isset($_POST['uemail'])){
    $email = $_POST['uemail'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
        echo "<span style='color:red'>error : You did not enter a valid Email. .</span>";

        echo "<script>$('#nextBtn').prop('disabled',true);</script>";
	}
  else{
    $res = mysqli_query($con,"select * from registration where user_email = '$email' ");
    if(mysqli_num_rows($res) == 1){
          echo "<span style='color:red'> error : Email already exists .</span>";
          echo "<script>$('#nextBtn').prop('disabled',true);</script>";
          } else{	
         echo "<span style='color:gray;'> Email available for Registration .</span>";
          echo "<script>$('#nextBtn').prop('disabled',false);</script>";
}
} }
?>