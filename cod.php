<?php  

session_start();

//print_r($_SESSION['finalcart']);
if(!isset($_COOKIE['username_mini2'])) {
   //uour profile
   echo "<script>alert('login in first to continue')</script>";
   //echo"<script>alert('')</script> ";
   echo "<script>window.location = 'login1.php'</script>";
   //header("location: login11.php");
    // echo "Cookie named 'username_mini2' is not set!";
  } 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cod</title>
</head>
<body>
  <?php  
   echo "<script type='text/javascript'>alert('Thank you {$_COOKIE['username_mini2']}');</script>";
   unset($_SESSION['cart']);
   echo "<script>window.location = 'index.php'</script>";?>
</body>
</html>