<?php

include('user/nav-bar.php');
if(isset($_SESSION['user_id'])){
    
    if(isset($_SESSION['update-profile']))
    {
        echo $_SESSION['update-profile'];
        unset($_SESSION['update-profile']);

    }
    // if(isset($_SESSION['change-pwd']))
    // {
    //     echo $_SESSION['change-pwd'];
    //     unset($_SESSION['change-pwd']);
    // }
    $id=$_SESSION['user_id'];
    $sql="SELECT * FROM tbl_customer WHERE id='$id'";
    $res=mysqli_query($conn,$sql);
    
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $email=$row['email'];
        $first_name=$row['first_name'];

        $contact=$row['contact'];
        
        $last_name=$row['last_name'];
        $primary_address=$row['primary_address'];
        ?>
        <link rel="stylesheet" href="styles/inputboxes.css">
        <div class='main'>
            <div class='wrapper'>
                <h1>
                    Edit Profile
                </h1>
                <br>
    
            <form action="" method="POST">
                <div class='bookingcard'>
                    <div class="field">
                        <p>First Name</p>
                        <input type="text" value="<?php echo $first_name;?>" name="first_name">
                    </div>
                    <div class="field">
                        <p>Last Name<p>
                            <input type="text" value="<?php echo $last_name;?>" name="last_name">
                            </div>
                            <div class="field">
                        <p>Primary Address</p>
                            <textarea name='primary_address'><?php echo $primary_address;?></textarea>
                            </div>
                            <div class="field">
                       <p>Contact Number</p>
                            <input type="text" value="<?php echo $contact;?>" name="contact">
                            </div>
                            <div class="field">
                            <input type="hidden" value="<?php echo $id;?>" name='id'>
                            <input type='submit' name='submit' class='btn-secondary' value='Update Profile'>
                            </div>
                        
    
    </div>
            </form>


            <form action='' method='POST'>
                <div class="bookingcard">
                    <br><br><br>
                    <h3 class='sectionsubtitle' style='text-align:left;'>Change Password</h3>
                    <br>
                    <div>
                        Current Password:
                        <br>
                        <input type='password' name='currpassword'>
                    </div>
                    
                    <div>
                        New Password:
                        <br>
                        <input type='password' name='newpassword'>
                    </div>
                    <div>
                        Confirm Password:
                        <br>
                        <input type='password' name='conpassword'>
                    </div>
                <input type="submit" class='btn-secondary' value='Change Password' name='submitpass'>

                </div>

            </form>
    
            </div>
    </div>


    <?php 
        if(isset($_POST['submitpass']))
        {
            $id=$_SESSION['user_id'];
            $currpass=md5($_POST['currpassword']);
            $newpassword=md5($_POST['newpassword']);
            $conpassword=md5($_POST['conpassword']);
            $res2=mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id=$id")or die(mysqli_error($conn));
            $count2=mysqli_num_rows($res2);
            
            if($count2==1)
            {
                $row2=mysqli_fetch_assoc($res2);
                $passintbl=$row['password'];
                
                if($currpass!='')
                {
                if($passintbl==$currpass)
                {
                    if($newpassword==$conpassword)
                    {
                        $res3=mysqli_query($conn,"UPDATE tbl_customer SET password='$newpassword' WHERE id=$id");
                        if($res3)
                        {
                            // $_SESSION['change-pwd']="<div class='sucess'>PassWord Changed Sucessfully</div>";
                            echo "<script>alert('PassWord Changed Sucessfully')</script>";
                        }
                    }
                    else
                    {
                        // $_SESSION['change-pwd']="<div class='error'>PassWord Does Not Match </div>";
                            // header('location:'.SITEURL.'edit-profile.php');
                            echo "<script>alert('PassWord Does Not Match')</script>";
                    }

                }
                else
                {
                    // $_SESSION['change-pwd']="<div class='error'>You Have Entered Wrong Password. </div>";
                            // header('location:'.SITEURL.'edit-profile.php');
                            echo "<script>alert('You Have Entered Wrong Password.')</script>";

                }
            }

            }
        }


            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $fname=$_POST['first_name'];
                $fname=mysqli_real_escape_string($conn,$fname);       
                
                
                $lname=$_POST['last_name'];
                $lname=mysqli_real_escape_string($conn,$lname);       
                
                
                $paddress=$_POST['primary_address'];
                $paddress=mysqli_real_escape_string($conn,$paddress);       
                
                
                $contact=$_POST['contact'];
                $contact=mysqli_real_escape_string($conn,$contact);       
                
                
                $sql2="UPDATE tbl_customer SET 
                first_name='$fname',
                last_name='$lname',
                primary_address='$paddress',
                contact='$contact' 
                WHERE id=$id";
    
                $res2=mysqli_query($conn,$sql2);
                if($res2)
                {
                    $_SESSION['update-profile']="<div class='success'>Profile Updated Succesfully.</div>";
                    // header('location:'.SITEURL.'edit-profile.php');
    
                }
                else
                {
                    $_SESSION['update-profile'] = "<div class='error'>Unable to Update Profile.</div>";
                    // header('location:'.SITEURL.'edit-profile.php');
    
                }
            }
    }
    
    
    
}
else
{
    
    header('location:'.'login.php');
    // exit();
}
// header('location:'.SITEURL.'edit-profile.php');
// exit();
?>