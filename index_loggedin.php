<?php
    include('user/nav-bar.php');



    if(!(isset($_SESSION['user_id'])))
    {
            //$_SESSION['not-login']="<div class='error'>Please Login to Access User Page.</div>";
            header('location:'.SITEURL.'index.php');
    }
    else{
            include('index_content.php'); 
    }
 ?>
  