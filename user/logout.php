<?php
session_start();
session_destroy();
session_unset();
setcookie("memberemail","",time()-1);
setcookie("memberpass","",time()-1);
echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
?>