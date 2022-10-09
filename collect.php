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
$_SESSION['link']="collect.php";
if (isset($_POST['add'])) {
    //print_r($_POST['product_title']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "title");
        if (in_array($_POST['tit'], $item_array_id)) {
            //$added = "item is already added in a cart";
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'collect.php'</script>";
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
    <main class="page-flex bg-lighter jc-c px-5">
      <aside class="aside-flex py-3 d-none d-md-block">
        <div class="aside__header ai-c">
          <div class="aside__block py-2">
          <div class="aside__block__title ml-3 mb-3 pb-1 bord-b f-gb co-dt">
            Type
          </div>
          <label class="container ai-c">
            <input type="checkbox" />
            <span class="ml-2 co-dt">Acoustic</span>
          </label>
          <label class="container ai-c">
            <input type="checkbox" />
            <span class="ml-2 co-dt">Electric</span>
          </label>
        </div>
        </div>
        <div class="aside__block py-2">
          <div class="aside__block__title ml-3 mb-3 pb-1 bord-b f-gb co-dt">
            Type
          </div>
          <div class="aside__block__content">
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Classical</span>
            </label>
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Folk</span>
            </label>
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Flat</span>
            </label>
          </div>
        </div>
        <div class="aside__block py-2">
          <div class="aside__block__title ml-3 mb-3 pb-1 bord-b f-gb co-dt">
            Wood
          </div>
          <div class="aside__block__content">
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Jacarandá</span>
            </label>
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Mogno</span>
            </label>
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">Rosewood</span>
            </label>
          </div>
        </div>
        <div class="aside__block py-2">
          <div class="aside__block__title ml-3 mb-3 pb-1 bord-b f-gb co-dt">
            Price Range
          </div>
          <div class="aside__block__content">
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">100$ - 500$</span>
            </label>
            <label class="container ai-c">
              <input type="checkbox" />
              <span class="ml-2 co-dt">501$ - 1000$</span>
            </label>
            <label class="container ai-c d-none d-md-block">
              <input type="checkbox" />
              <span class="ml-2 co-dt">1001$ - 1500$</span>
            </label>
            <label class="container ai-c d-none d-md-block">
              <input type="checkbox" />
              <span class="ml-2 co-dt">1501$ - 2000$</span>
            </label>
            <label class="container ai-c d-none d-md-block">
              <input type="checkbox" />
              <span class="ml-2 co-dt">2001$ - 2500$</span>
            </label>
          </div>
        </div>
      </aside>
      <div>
        <section class="results bg-lighter bord-x">
          <div class="results__header">
            <p class="results__header-p co-dt bord-b py-3 pl-3 m-0">
              1020 Results for <b>"Flat Electric"</b> search at Montreal in
              Category <b>Guitars.</b>
            </p>
            <?php
            $sql = "SELECT * FROM collect12";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        card($row['product_title'],$row['product_price'], $row['product_des'], $row['time1'],$row['by1'],$row['id'],$row['location'],$row['image'],$_SESSION['link']);
                        
                      }
                }
            }
            ?> 
          </div>
        </section>
        <div class="page-selector"></div>
      </div>
    </main>
    <div class="bgcolor">
    <?php  
    foot();
    
    ?>
         </div>
  </body>
</html>
