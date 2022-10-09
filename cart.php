<?php  
session_start();
require('card.php');
require('create.php');
require('config.php');
require('header1.php');
require('footer.php');
require('header2.php');
if (isset($_COOKIE['username_mini2'])) {
    // true, cookie is set
    $username2 = $_COOKIE['username_mini2'];
} else {
    // false, cookie is not set
    $username2 = null;
}
if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }
  if (isset($_POST['mod_qut'])){
    if ($_GET['action'] == 'add'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                $_SESSION['cart'][$key]['quantity']=$_POST['mod_qut'];
                //echo "<script>alert('Product has been Removed...!')</script>";
               // print_r($_SESSION['cart']);
                //echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }
  if (isset($_POST['cod'])){  
    $_SESSION['finalcart']=$_SESSION['cart'];
    header("location: cod.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/ad0c4e912f.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>Music Store</title>
  </head>
  <body class="w-100">
  <?php  
    header1();
    $sql = "SELECT user_name1 FROM register_user WHERE user_email = '$username2'";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "". $row['user_name1'];
            }
        } else {
            echo  "guest";
        }
    }
    header112();
    $sql = "SELECT user_avatar FROM register_user WHERE user_email = '$username2'";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo  " src=\"" . $row['user_avatar'];
            }
        } else {
            echo  " src='avatar\usern.png'";
        }
    }
    h22();
    header11();
    ?>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                    $number=0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        //$result = $db->getData();
                       /* $sql = "SELECT * FROM test";
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    foreach ($product_id as $id) {
                                        if ($row['id'] == $id) {
                                            cartElement($row['product_title'], $row['product_price'], $row['product_img'], $row['id'],1)
                                            $total = $total + (int)$row['product_price'];
                                            $number=$number+1;
                                        }
                                    }
                                }
                            }
                        }*/
                        $keys = array_keys($_SESSION['cart']);
                        //print_r($keys);
                        foreach ($keys as $id){
                    cartElement($_SESSION['cart'][$id]['title'],$_SESSION['cart'][$id]['price'],$_SESSION['cart'][$id]['img'],$_SESSION['cart'][$id]['product_id'],$_SESSION['cart'][$id]['quantity']);
                        }
                } else {
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6  id="gg"></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6 id="ggg">
                                </h6>
                            
                                <form  method="post">
                            
                              <button class='btn btn-primary' name ='cod'>buy now</button>      
                           
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
   <div>
    <main>
        
    </main>
   </div>
   <?php  
foot();    
    ?>
  </body>
  <script>
                    var boxes = document.getElementsByClassName('iprices');
                    var quantity=document.getElementsByClassName('iquant');
                    var it = document.getElementsByClassName('itotal');
                    var g = document.getElementById('gg');
                    var gggg = document.getElementById('ggg');
                    var sum=0;
                    function subtotal()
                    {   sum=0;
                        for(var i=0; i<boxes.length; i++)
                        {
                            it[i].innerText=(boxes[i].value)*(quantity[i].value);
                            sum=sum+((boxes[i].value)*(quantity[i].value));
                        }
                        g.innerText=sum;
                        gggg.innerText=sum;
                        console.log(sum);
                    }
                
                    subtotal();               
</script>
