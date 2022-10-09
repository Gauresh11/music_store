<?php 
 session_start();
 //session_destroy();
 $cookie_name = "username_mini2";
 $cookie_value = "";
 setcookie($cookie_name, $cookie_value, time()-86400 , "/"); // 86400 = 1 day

 header("location: login1.php");   
    ?>