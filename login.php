<?php include('partials-front/nav-bar.php');?>


    <!-- main content starts -->
    <main>
    <link rel="stylesheet" href="styles/lr-style.css">

        <div class="lform" id="lform">
            <form action="" method="POST">
                <div class="container">
                    <div class="box">
                        <h1>User Log In</h1>
                        <?php   
                            if(isset($_SESSION['user_id']))
                            {
                                unset($_SESSION['not-login']);
                                header('location:'.SITEURL.'myacc.php');

                            }
                            if(isset($_SESSION['login-failed']))
                            {
                                echo $_SESSION['login-failed'];
                                unset($_SESSION['login-failed']);

                            }
                            if(isset($_SESSION['not-login']))
                            {
                                echo $_SESSION['not-login'];

                            }

                        ?>
                        <div class="user">
                            <!-- <i class="fas fa-user"></i> -->
                            <input type="text" name="username" id="username" autocomplete="off" placeholder="Username or Email">
                            <!-- <i class="fas fa-unlock-alt"></i> -->
                            <input type="password" name="password" id="password" placeholder="Password"
                                autocomplete="off">
                        </div>
                        <div class="login-btn">
                            <input type='submit' name='submit' class='btn' value='Submit'>
                            <p class="signup">First time here?<a href="register.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    
    <?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $username=mysqli_real_escape_string($conn,$username);       
                
    $password=md5($_POST['password']);
    // $password=mysqli_real_escape_string($conn,$_POST['password']);       
                


    $sql="SELECT * FROM tbl_customer WHERE email='$username' AND password='$password'";

    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $id=$row['id'];
    // echo $username;
    // echo $password;
    $count=mysqli_num_rows($res);

    if($count==1)
    {

        // echo "login success";

        $_SESSION['login-success']="<div class='success'>Login Success</div>";

        $_SESSION['user_id']=$id;
        header('location:'.SITEURL.'myacc.php');

    }
    else
    {
        $_SESSION['login-failed']="<div class='error text-center'>Login Failed</div>";
        header('location:'.SITEURL.'login.php');

    }

}





?>



    <?php include('partials-front/footer.php');?>