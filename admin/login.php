<?php include('../config/constants.php'); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- responsive website tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lr-style.css">
    <link rel="stylesheet" href="admin.css">


    <!-- icon  -->
    <link rel="icon" href="../media/logo.png" type="image/x-icon">

    <!-- link for font : Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- link for font : Marcellus SC -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">


    <!-- js for showing register form -->
    <!-- <script src="./JS/lrscript.js"></script> -->

    <title>Cuisine Haveli</title>
</head>

<body>
    <!-- header starts-->
    <!-- navbar starts -->
    <nav>
        <!-- LOGO -->
        <div class="logo">
            <a href="./index.php" class="logotext">
                <img src="../media/logo.png" alt="logo:Cuisine Haveli" class="imgresponsive">
                <h1>Cuisine Haveli</h1>
            </a>
        </div>
        <!-- links -->
        <div class="links text-right-align">
            <!-- <ul>
                <a href="#about-us">
                    <li>About</li>
                </a>
                <a href="#gallery">
                    <li>Gallery</li>
                </a>
                <a href="#contact">
                    <li>Contact</li>
                </a>
                <a href="">
                    <li>Order</li>
                </a>
                <a href="">
                    <li>Login / Register</li>
                </a>
            </ul> -->
        </div>
        <!-- clearfix  -->
        <div class="clearfix"></div>
    </nav>
    <!-- navbar ends -->
    <!-- header ends -->
    <!-- main content starts -->

    <main>
        <div class="lform" id="lform">
            <form action="" method="POST">
                <div class="container">
                    <div class="box">
                        <h1>Admin Log In</h1>
                        <?php





                        // if ($conn) {
                        // echo 'connected';
                        // } else {
                        // echo 'not connected';
                        // }

                        // if ($db_select) {
                        // echo 'db connected';
                        // } else {
                        // echo 'db not connected';
                        // }

                        // $tempst = "SELECT * FROM tbl_admin";
                        // $resultstemp = mysqli_query($conn, $tempst);
                        // while($rowofr = mysqli_fetch_assoc($resultstemp)) {
                        //     echo "ID: " . $rowofr["id"]. " - FName: " . $rowofr["full_name"]. " Username: " . $rowofr["username"]. "Pwd: ".$rowofr["password"] ."<br>";
                        // }




                        if (isset($_SESSION['login'])) {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                        if (isset($_SESSION['no-login-message'])) {
                            echo $_SESSION['no-login-message'];
                            unset($_SESSION['no-login-message']);
                        }

                        ?>

                        <div class="user">
                            <!-- <i class="fas fa-user"></i> -->
                            <input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
                            <!-- <i class="fas fa-unlock-alt"></i> -->
                            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                        </div>
                        <!-- <p class="reset-password">Forgot password?</p> -->
                        <div class="login-btn">
                            <input type="submit" name="submit" value="Login" class="btn">
                            <!-- <p class="signup">First time here?<a href="./register.html">Sign Up</a></p> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- main content ends -->

    <?php


    if (isset($_POST['submit'])) {


        include 'ChromePhp.php';
        // ChromePhp::log('Hello console!');
        // ChromePhp::log($_SERVER);
        // ChromePhp::warn('something went wrong!');

        $username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $username);

        $password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);


        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
        echo $username;
        echo $password;
        $count = mysqli_num_rows($res);
        echo $count;
        if ($count == 1) {

            // echo "login success";

            $_SESSION['login'] = "<div class='success'>Login Success</div>";

            $_SESSION['user'] = $username;
            header('location:' . SITEURL . 'admin/');
        } else {
            $_SESSION['login'] = "<div class='error text-center'>Login Failed</div>";
            header('location:' . SITEURL . 'admin/login.php');
        }
    }





    ?>
    <?php include('../partials-front/footer.php'); ?>