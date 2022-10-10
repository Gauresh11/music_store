<?php

session_start();
require('card.php');
require('create.php');
require('header1.php');
require('footer.php');
require('header2.php');

require_once 'config.php';

if (isset($_COOKIE['username_mini2'])) {
    // true, cookie is set
    $username2 = $_COOKIE['username_mini2'];
} else {
    // false, cookie is not set
    $username2 = null;
}
$_SESSION['link']="index.php";
if (isset($_POST['add'])) {
    //print_r($_POST['product_title']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "title");
        if (in_array($_POST['tit'], $item_array_id)) {
            //$added = "item is already added in a cart";
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
           // print_r($item_array_id);
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'quantity' => 1,
                'desprction' => $_POST['desp'],
                'title' => $_POST['tit'],
                'price' => $_POST['price'],
                'img' => $_POST['img']

            );
            $_SESSION['cart'][$count] = $item_array;
           //print_r($_SESSION['cart']);
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id'],
            'quantity' => 1,
            'desprction' => $_POST['desp'],
            'title' => $_POST['tit'],
            'price' => $_POST['price'],
            'img' => $_POST['img']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
       //print_r($_SESSION['cart']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>Music Store</title>
  </head>
  <body><?php  
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
    <main>
    
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner" id="slide">
          <div class="carousel-item active">
            <img src="images/band1.jpg" alt="Los Angeles" width="500" height="300">
            <div class="carousel-caption">
              
              <!-- slide -->
              <div class="hotads__main_content-info py-3" id="slide1">
                <h3 class="co-r f-hm">MAPEX TORNADA</h3>
                <div class="fixed-p">

                <p class="fixed-p f-hl co-d" id="slide1_3">
                  Mapex, Drum Set, Tornado, 5Pcs W /Hw, 
                  Throne & Cymbals-Black, Blue, Wine Red
                </p>
                </div>
                <!-- <p class="co-d">By: <span class="co-l f-hl">John Doe</span></p>
                <p class="mb-0 co-d">
                  Location: <span class="co-l f-hl">Caraguatatuba, BR</span> -->
                </p>
                <div class="hotads__main_content-info-button w-mc ai-c mt-2"  id="slidebutton3">
                  <button type="button" class="btn-red m-0 center ai-c py-2">₹35000</button>
                  <button type="button" class="btn-red mx-0 ai-c">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span>Purchase Details</span>
                  </button>
                </div>
              </div>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="images/card-1.jpg" alt="Chicago" width="500" height="300">
            <div class="carousel-caption">
              <!-- slide -->
              <div class="hotads__main_content-info py-3" id="slide1">
                <h3 class="co-r f-hm">YAMAHA</h3>
                <div class="fixed-p">

                <p class="fixed-p f-hl co-d" id="slide1_2">
                  Yamaha F280 Acoustic Guitar With Yamaha Gig Bag
                </p>
                </div>
                <!-- <p class="co-d">By: <span class="co-l f-hl">John Doe</span></p>
                <p class="mb-0 co-d">
                  Location: <span class="co-l f-hl">Caraguatatuba, BR</span> -->
                </p>
                <div class="hotads__main_content-info-button w-mc ai-c mt-2"  id="slidebutton2">
                  <button type="button" class="btn-red m-0 center ai-c py-2">₹7650</button>
                  <button type="button" class="btn-red mx-0 ai-c">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span>Purchase Details</span>
                  </button>
                </div>
              </div>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="images/key1.jpg" alt="New York" width="500" height="300">
            <div class="carousel-caption">
              <!-- slide -->
              <div class="hotads__main_content-info py-3" id="slide1">
                <h3 class="co-r f-hm">YAMAHA</h3>
                <div class="fixed-p">

                <p class="fixed-p f-hl co-d" id="slide1_1">
                Yamaha PSR-E363 Portable Keyboard
                </div>
                <!-- <p class="co-d">By: <span class="co-l f-hl">John Doe</span></p>
                <p class="mb-0 co-d">
                  Location: <span class="co-l f-hl">Caraguatatuba, BR</span> -->
                </p>
                <div class="hotads__main_content-info-button w-mc ai-c mt-2" id="slidebutton">
                  <button type="button" class="btn-red m-0 center ai-c py-2">₹12000</button>
                  <button type="button" class="btn-red mx-0 ai-c">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span>Purchase Details</span>
                  </button>
                </div>
              </div>
            </div>   
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>

      <div class="products bg-lighter py-4">
        <div class="products__display w-90 center">
          <div class="products__display__header ai-c mb-3 co-d">
            
            <i class="fas fa-drum mr-4 co-l"></i>
            <h5>Acoustic Drum</h5>
            <p class="my-0 ml-5 co-l f-hl">
              (Classic drums, flamenco drums and folk drums.)
            </p>
          </div>
          <div class="products__display__cards ai-c jc-sb">
            <?php
             $sql = "SELECT * FROM drum2";
             if ($result = mysqli_query($conn, $sql)) {
                 if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_array($result)) {
                         in($row['image'],$row['product_title'],$_SESSION['link'],$row['product_price']);             
                       }
                 }
             }  
            
            ?>
        </div>
        <div class="products__display w-90 center mt-5">
          <div class="products__display__header ai-c mb-3 co-d">
            <i class="fas fa-guitar mr-4 co-l"></i>
            <h5>Acoustic Guitars</h5>
            <p class="my-0 ml-5 co-l f-hl">
              (Classic guitars, flamenco guitars and folk guitars.)
            </p>
          </div>
          <div class="products__display__cards ai-c jc-sb">
          <?php
             $sql = "SELECT * FROM shop2";
             if ($result = mysqli_query($conn, $sql)) {
                 if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_array($result)) {
                         in($row['image'],$row['product_title'],$_SESSION['link'],$row['product_price']);             
                       }
                 }
             }  
            ?>
          </div>
        </div>
        <div class="products__display w-90 center mt-5">
          <div class="products__display__header ai-c mb-3 co-d">
           
            <i class="far fa-keyboard mr-4 co-l"></i>
            <h5>Acoustic Pianos</h5>
            <p class="my-0 ml-5 co-l f-hl">
              (Classic Pianos, flamenco Pianos and folk Pianos.)
            </p>
          </div>
          <div class="products__display__cards ai-c jc-sb">
          <?php
             $sql = "SELECT * FROM piano2";
             if ($result = mysqli_query($conn, $sql)) {
                 if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_array($result)) {
                         in($row['image'],$row['product_title'],$_SESSION['link'],$row['product_price']);             
                       }
                 }
             }  
            ?>
            
          </div>
        </div>
    </main>
    <div class="bgcolor">
        <?php 
foot();        
        ?>
         </div>
  </body>
</html>
