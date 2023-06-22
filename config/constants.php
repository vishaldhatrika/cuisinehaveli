<?php

    session_start();

    date_default_timezone_set('Asia/Kolkata');
    
    define('SITEURL','https://cuisinehaveli.000webhostapp.com/');
    //define('SITEURL','/cuisinehaveli/');
    //define('SITEURL','/');
    

    define('LOCALHOST','localhost');

    define('DB_USERNAME','id20420382_root');
    define('DB_PASSWORD','@bcdCuisine1234');

    define('DB_NAME','id20420382_food_order');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD); //or die(mysqli_error());
    $db_select = mysqli_select_db($conn,DB_NAME); // or die(mysqli_error());
?>