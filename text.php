<?php
if(isset($_POST['send'])){
  $phone = $_POST['number'];
  $msg = $_POST['msg'];

  $url="https://www.sms4india.com/api/v1/sendCampaign";
$message = urlencode($msg);// urlencode your message
// $phone = '9540830440';
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=7IT08FVLW5PR8PF71OAOXDJJCWLV2WP0&secret=FXA4W1QKMSROQ1JZ&usetype=stage&phone=$phone&senderid=aggtarun4@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $curl;
}
?>
<?php

//post
// $url="https://www.sms4india.com/api/v1/createSenderId";
// $curl = curl_init();
//  $phone = '9540830440';
// curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
// curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=S5E1MVG5ASFPUY9SPDR4N1RJXH1R3UI7&secret=L786ZQE92GW9NQUL&usetype=stage&phone=$phone");// post data
// query parameter values must be given without squarebrackets.
//  Optional Authentication:
// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// $result = curl_exec($curl);
// curl_close($curl);
// echo $result;
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text" name="number">
    <input type="text" name="msg" id="msg">
      <input type="submit" id="btn" name="send" value="tr">
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $("#btn").click(function(){
    swal({
  title: "Are you sure?",
  text: "Your will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
});
  })
</script>
</html> -->


<!--
<html>
    <head>
        <title>Sweet Alert</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/> <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    </head>
    <body>
        <script>
           swal("Does'nt it looks sweet?\nYes, it do!");
        </script>
    </body>
</html> -->

<?php
// phpinfo();

?>

<?php

$to = "arunaggarwal096@gmail.com";
$sub = "thsi is text msg";
$msg = "<p>this is msg</p>";
$header = "From :tarunh@gmail.com";
mail($to,$sub,$msg,$header);
echo "send";
?>