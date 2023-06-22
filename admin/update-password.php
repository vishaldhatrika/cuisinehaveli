<?php include('nav-bar.php');?>
<link rel="stylesheet" href="../styles/inputboxes.css">
<div class="main">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php  

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-50">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo$id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>



<?php   

            if(isset($_POST['submit']))
            {
                // echo "clicked";

                $id=$_POST['id'];
                // $current_password=mysqli_real_escape_string($conn,$_POST['current_password']);       
                $current_password=md5($_POST['current_password']);

                // $new_password=mysqli_real_escape_string($conn,$_POST['new_password']);       
                $new_password=md5($_POST['new_password']);

                // $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);       
                $confirm_password=md5($_POST['confirm_password']);

                $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                $res=mysqli_query($conn,$sql);

                if($res)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        // echo "USer Found";
                        if($new_password==$confirm_password)
                        {
                            $sql2="UPDATE tbl_admin SET 
                            password='$new_password' 
                            WHERE id=$id";
                            
                            $res2=mysqli_query($conn,$sql2);
                            if($res2)
                            {
                                $_SESSION['change-pwd']="<div class='success'>Password Changed Succesfully. . </div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');

                            }
                            else
                            {
                                $_SESSION['change-pwd']="<div class='error'>Failed to Change Password. </div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');

                            }

                        }
                        else
                        {
                            $_SESSION['pwd-not-match']="<div class='error'>Password Doesn't Match. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                            
                        }

                    }
                    else
                    {
                        $_SESSION['user-not-found']="<div class='error'>User Not Found. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            }

?>

<?php include('../partials-front/footer.php') ?>