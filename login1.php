<?php
session_start();
if (isset($_COOKIE['username_mini2'])) {
    // true, cookie is set
    header("location: index.php");
    }
?>
<?php
function register()
{
    require_once "config.php";
    include('funtion.php');
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT register_user_id FROM register_user WHERE user_name1 = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong abhove";
                echo "$username";
                echo "$password";
                echo "$email";
            }
        }

        mysqli_stmt_close($stmt);



        // Check for password
        if (empty(trim($_POST['password']))) {
            $password_err = "Password cannot be blank";
        } elseif (strlen(trim($_POST['password'])) < 5) {
            $password_err = "Password cannot be less than 5 characters";
        } else {
            $password = trim($_POST['password']);
        }

        // Check for confirm password field
        if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
            $password_err = "Passwords should match";
        }


        // If there were no errors, go ahead and insert into the database
        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            $user_avatar = make_avatar(strtoupper($username[0]));
            $query    = "INSERT into `register_user` (user_name1, user_email, user_password,user_avatar)
            VALUES ('$username','$email', '" . md5($password) . "','$user_avatar')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION["username_mini"] = $myusername;
                $cookie_name = "username_mini2";
                $cookie_value = $email;
                setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
                header("location: index.php");
            } else {
                echo "Something went wrong... cannot redirect!";

                echo "$password";
                echo "$username";
                echo "$email";
            }
        }
    }
    mysqli_close($conn);
}
if (array_key_exists('rege', $_POST)) {
    register();
}
function login11()
{
    require_once "config.php";
    // username and password sent from form 
    //session_start();
    // Set session variables

    //header("location: index22.html");
    $myusername = mysqli_real_escape_string($conn, $_POST['email11']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password11']);

    //$phpVariable = $myusername;
    //$_SESSION["name"] = $myusername;
    $sql = "SELECT register_user_id  FROM register_user WHERE user_email = '$myusername' and user_password = '" . md5($mypassword) . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION["username_mini"] = $myusername;
        $cookie_name = "username_mini2";
        $cookie_value = $myusername;
        setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
        // $_SESSION['login_user'] = $myusername;
        //setcookie("username", "John Carter", time()+30*24*60*60);
        //setcookie("age", "36", time()+3600, "/", "",  0);
        header("location: index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
if (array_key_exists('lo', $_POST)) {
    login11();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="style1.css">
    
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div  class="bb">
                <a href='login1.html'><b>The MUSIC STORE</b></a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='index.php'>HOME</a></li>
                    <li><a href='about.php'>ABOUT US</a></li>
                    <li><a href='search.php'>SHOPPING</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-           form').style.display='block'" style="width:auto;">LOGIN</button></li>
                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login' action="" method="POST">
                    <input type='text' name='email11' class='input-field' placeholder='Email Id'>
                    <input type='password' name='password11' class='input-field' placeholder='Enter Password'>
                    <input type='checkbox' class='check-box'><span>Remember Password</span>
                    <button type='submit' name='lo' class='submit-btn'>Log in</button>
                </form>
                <form id='register' class='input-group-register' action="" method="POST">
                    <input type='text' class='input-field' name='username' placeholder='First Name' required>
                    <input type='text' class='input-field' placeholder='Last Name ' required>
                    <input type='email' class='input-field' name='email' placeholder='Email Id' required>
                    <input type='password' class='input-field' name='password' placeholder='Enter Password' required>
                    <input type='password' class='input-field' name='confirm_password' placeholder='Confirm Password' required>
                    <input type='checkbox' class='check-box'><span>I agree to the terms and conditions</span>
                    <button type='submit' name='rege' class='submit-btn'>Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
               // modal.style.display = "none";
            }
        }
    </script>
</body>
</html>