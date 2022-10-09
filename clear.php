<?php  
session_start();
unset($_SESSION['cart']);
echo "<script>window.location = '".$_SESSION['link']."'</script>";

?>