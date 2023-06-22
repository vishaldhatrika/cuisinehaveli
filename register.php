<?php include('partials-front/nav-bar.php'); ?>
<?php 
    if(isset($_SESSION['user_id']))
    {
        header('location:'.SITEURL.'myacc.php');
    }
    if(isset($_SESSION['register']))
    {
        echo $_SESSION['register'];
        unset($_SESSION['register']);
    }

    if(isset($_POST['submit']))
    {
        $email=$_POST['username'];
        $email=mysqli_real_escape_string($conn,$email);
        $first_name=$_POST['first_name'];
        $first_name=mysqli_real_escape_string($conn,$first_name);
        $last_name=$_POST['last_name'];
        $last_name=mysqli_real_escape_string($conn,$last_name);
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $address=mysqli_real_escape_string($conn,$address);
        $contact=$_POST['contact'];
        $contact=mysqli_real_escape_string($conn,$contact);
        $password=md5($_POST['password']);
        $confpasswword=md5($_POST['confpassword']);
        if($password==$confpasswword)
        {
            $sql="INSERT INTO tbl_customer SET 
            email='$email',
            first_name='$first_name',
            last_name='$last_name',
            gender='$gender',
            primary_address='$address',
            contact='$contact',
            password='$password'";

            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $_SESSION['register']="<div class='success'>Registration Successful. Go to Login Page to access the Page. </div>";
                $sql2="SELECT id FROM tbl_customer WHERE email='$email'";
                $res2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($res2);
                $id=$row2['id'];
                $_SESSION['user_id']=$id;
                header('location:'.SITEURL.'myacc.php');

            }
            else
            {
                $_SESSION['register']="<div class='error'>Failed to Register.Try Again. </div>";
                header('location:'.SITEURL.'register.php');

            }

        }
        else
        {
            $_SESSION['password-match']="<div class='error'>Passwords Doesn't Match.</div>";
            header('location:'.SITEURL.'register.php');
        }

        

        echo "Clicked";
    }


?>
    <!-- main content starts -->
    <main>
        <script src="JS/validateps.js"></script>
    <link rel="stylesheet" href="styles/lr-style.css">

    <div class="rform" id="rform">
            <form action="" method="POST" class="rform" id="rform">
                <div class="container">
                    <div class="box">
                        <h1>Register</h1>
                        <div class="user">
                            <!-- <i class="fas fa-user"></i> -->
                            <input type="email" name="username" id="username" autocomplete="off"
                                placeholder="E-Mail as username">
                                <input type="text" name="first_name" placeholder="First Name" >
                                <input type="text" name="last_name" placeholder="Last Name" >
                                <select name="gender" id="gender" required>
                                    <option  id="noneopt" value="none" selected disabled hidden>Select a Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>

                                <textarea rows="4" name="address" placeholder="Enter your full address here.."></textarea>
                                <input type='text' name='contact' placeholder='Enter Your Mobile Number'>
                            <!-- <i class="fas fa-unlock-alt"></i> -->
                            <input type="password" name="password" id="password" placeholder="Create Password"
                                autocomplete="off" onkeyup="validatePs()" onfocus="validatePs()">
                            <input type="password" name="confpassword" id="confpassword" onkeyup="validatePs()"
                                placeholder="Type password again" autocomplete="off" onfocus="validatePs()">
                            <div id="pwdalert"></div>

                        </div>
                        <!-- <p class="reset-password">Forgot password?</p> -->
                        <div class="login-btn">
                            <input type='submit' name='submit' value='Submit' class='btn'>

                            <!-- <p class="signup">First time here?<span>Sign Up</span></p> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
 </main>
    


    <?php include('partials-front/footer.php'); ?>