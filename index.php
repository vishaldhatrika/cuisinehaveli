<?php
include('partials-front/nav-bar.php');

if(isset($_SESSION['user_id'])){
    header('location:'.SITEURL.'index_loggedin.php');
}


 ?>
    <!-- main content starts -->
    <!-- clearfix  -->
    <?php
include('index_content.php');
    ?>