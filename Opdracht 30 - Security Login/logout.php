<?php
   session_start();
   setcookie("login", "", time()-3600);
   unset($_SESSION["errorLog"]);
   unset($_SESSION["registerInfo"]);


   $_SESSION['notification'] = "You have logged out, untill next time!";
   header('location:login-form.php');



?>