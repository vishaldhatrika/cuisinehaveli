
<?php include("config/constants.php") ;

if(!isset($_SESSION['user_id']))
{
    header('location:'.SITEURL.'login.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- responsive website tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/order-style.css">
    <link rel="stylesheet" href="admin/admin.css">
    <!-- <link rel="stylesheet" href="styles/lr-style.css"> -->


    <!-- link for font : Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- link for font : Marcellus SC -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" href="media/logo.png" type="image/x-icon">

    <!-- js-->
    
    
    <title>Cuisine Haveli</title>
</head>

<body>
    <!-- header starts-->
    <!-- navbar starts -->
    <nav>
        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo SITEURL;?>myacc.php" class="logotext">
                <img src="media/logo.png" alt="logo:Cuisine Haveli" class="imgresponsive">
                <h1>Cuisine Haveli</h1>
            </a>
        </div>
        <!-- links -->
        <div class="links text-right-align">
            <ul>
                <a href="<?php echo SITEURL;?>order-food.php">
                    <li>Order</li>
                </a>
                <a href="<?php echo SITEURL;?>reserve.php">
                    <li>Reserve Table</li>
                </a>
                <a href="<?php echo SITEURL;?>edit-profile.php">
                    <li><?php 
                    if(isset($_SESSION['user_name'])){
                        echo $_SESSION['user_name'];
                    }
                    else{
                        $uid=$_SESSION['user_id'];
                        $sql="SELECT `first_name` FROM tbl_customer WHERE `id`=$uid";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        $row=mysqli_fetch_assoc($res);
                        if($count==1){
                            $uname=$row['first_name'];
                        }
                        $_SESSION['user_name']=$uname;
                        echo $_SESSION['user_name'];
                    }
                    ?>
                    </li>
                </a>
                <a href="<?php echo SITEURL; ?>logout.php">
                    <li>Logout</li>
                </a>
            </ul>
        </div>
        <!-- clearfix  -->
        <div class="clearfix"></div>
    </nav>
    <!-- navbar ends -->
