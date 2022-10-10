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
$_SESSION['link'] = "about.php";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/ad0c4e912f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet" />
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
                echo "" . $row['user_name1'];
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
    //header11();
    ?>
    <header class="upper container-fluid bg-red pt-6">
        <img class="watermark" src="images/waves-icon.png" alt="wave-big">
        <div class="z-2 container max-w-80 w-90">
            <div class="container flex-col ai-c mb-5">
                <div class="brand-name--lg-w w-mc">MUSIC STORE</div>
                <h1 class="co-w f-hl">
                    Your marketplace for buying Musical Instruments
                </h1>
            </div>

    </header>
    <main>


        <br>
        <div class="about" id="abo">
            <div class="aboutus" id="abo1">
                <h1>
                    About us
                </h1>
                <p>
                    BAJAAO (www.bajaao.com) is India's largest online retailer for musical instruments and pro audio equipment.</p>
                <P>
                    The BAJAAO brand is well known for stocking a broad catalog of over 5000 products spanning 200+ brands, offering competitive prices, and providing the best customer service in the industry par none. This has enabled it to become one of the most trusted names in music gear retailing.

                <p> BAJAAO was also the first Indian eCommerce store for Musical Instruments and Pro Audio Gear, started in 2005 by founder and Chairman Ashutosh Pande, a young professional with experience in e-commerce technologies and a burning interest in servicing musicians and studio techs. Starting with zero capital, a simple business plan and a highly passionate team of fellow musicians; he succeeded in growing BAJAAO into the leading online retailer in the music industry. </p>
                BAJAAO has worked with many reputable brands including Walt Disney Studio, Sony Music, Vishesh Films, Pepsi MTV Indies, Harman Professional India, and Gibson. In 2012, Music Trades Magazine, USA, ranked BAJAAO.com among the world's top 20 music retailers.
                Our Entertainment division conceptualised and executed India’s first full-scale two-day heavy metal festival ‘BIG69’ in Mumbai (January 2015), bringing down several international and Indian bands to play across three stages.
                In January 2015, Suman Singh (Austin Bazaar founder), and Jay Srinivasan took over additional management and board responsibilities as co-CEOs of BAJAAO, bringing in valuable experience of scaling up fast growing companies. Over the past 6 years Bajaao has shown rapid growth, thanks to the support of its 150,000+ repeat customers who entrust the company with all their recurring music gear needs. We look forward to remaining the most customer-focused company in India, and staying true to the original principles that have earned us so much customer trust.
                </p>
            </div>

        </div>
        <div class="bgcolor">
            <?php
            foot();

            ?>
        </div>
</body>

</html>