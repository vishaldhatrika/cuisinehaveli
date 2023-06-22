<?php include("../config/constants.php");
include("login-check.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- responsive website tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="../styles/order-style.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="admin.css">

    <!-- link for font : Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- link for font : Marcellus SC -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">
    <!-- icon-->
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <script src="../JS/script.js"></script>

    <title>Cuisine Haveli</title>



</head>

<body>
    <!-- header starts-->
    <!-- navbar starts -->
    <nav>
        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo SITEURL;?>admin/index.php" class="logotext">
                <img src="../media/logo.png" alt="logo:Cuisine Haveli" class="imgresponsive">
                <h1>Cuisine Haveli</h1>
            </a>
        </div>
        <!-- links -->
        <div class="links text-right-align">
            <ul>
                <a href="index.php">
                    <li>Admin Home</li>
                </a>
                <a href="viewreservations.php">
                    <li>View Reservations</li>
                </a>
                
                    
                        <a href="manage-admin.php">
                            <li>Manage Admin</li>
                        </a>

                        <a href="manage-agent.php">
                            <li>Manage Agent</li>
                        </a>
                    
				<a href="manage-category.php">
                    <li>Manage Category</li>
                </a>
				
				<a href="manage-food.php">
                    <li>Manage Food</li>
                </a>
				
				<a href="watch_orders.php">
                    <li>Manage Order</li>
                </a>

                <a href="logout.php">
                    <li>Logout</li>
                </a>
            </ul>
        </div>
        <!-- clearfix  -->
        <div class="clearfix"></div>
    </nav>
    <!-- navbar ends -->
    <!-- header ends -->
    <!-- main content starts -->
    <!-- clearfix  -->
