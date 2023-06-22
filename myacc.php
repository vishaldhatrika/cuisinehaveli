<?php include('user/nav-bar.php'); ?>
<div class='main'>
    <link rel="stylesheet" href="styles/myaccstyle.css">
    <div class='wrapper'>
        <?php 
        if(isset($_SESSION['user_id']))
        {
            $id=$_SESSION['user_id'];
            $sql="SELECT * FROM tbl_customer WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $first_name=$row['first_name'];
            if($res)
            {
                ?>
                <h1>User Account of <?php echo $first_name; ?></h1> 
                <section>
                    <a href="vieworders.php"><div class="myorders">
                            <img  class="cardimg" src="media/divbg2.jpg" width="300px" height="300px" alt="">
                            <div class="caption">My Orders</div>
                    </div></a>
                    <a href="viewbookings.php"><div class="myreservations">
                            <img  class="cardimg" src="media/divbg1.jpg" width="300px" height="300px" alt="">
                            <div class="caption">My Reservations</div>
                        </div></a>
                </section>
                <?php
            }
            else
            {
                $_SESSION['not-login']="<div class='error'>Please Login to Access User Page.</div>";
                header('location:'.SITEURL.'login.php');
            }
        }
        else
        {
            $_SESSION['not-login']="<div class='error'>Please Login to Access User Page.</div>";
            header('location:'.SITEURL.'login.php');
        }
        
        ?>
        
    </div>
</div>



<?php include('partials-front/footer.php'); ?>