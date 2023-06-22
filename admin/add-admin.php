<?php include("nav-bar.php"); ?>

<link rel="stylesheet" href="../styles/inputboxes.css">
<div class="main">

    <div class="wrapper">
        <h1> Add Admin</h1>
        <br>
        <br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }


        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="fullname" placeholder="Enter Name" > </td>
            </tr>

            <tr>
                <td>User Name: </td>
                <td><input type="text" name="username" placeholder="Enter Username" > </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" placeholder="Enter Password" > </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>


    </div>

</div>






<?php 

    if(isset($_POST['submit']))
    {
        // get data from from

        $full_name= $_POST['fullname'];
        $full_name=mysqli_real_escape_string($conn,$full_name);
        $user_name= $_POST['username'];
        $user_name=mysqli_real_escape_string($conn,$user_name);
       
        $password= md5($_POST['password']);
        $password=mysqli_real_escape_string($conn,$password);
       
        // SQL query to insert data in database

        // $db_select = mysqli_select_db($conn,'fdr');

        $sql= "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$user_name',
        password='$password'
        ";
        // $sql2="show databases";
        // $sqls= "Insert into tbl_admin values(1,$full_name,$user_name,$password)";
        // $sql3="show tables";
        // $sql7= "Insert into tbl_admin values (1,'kaushik','gupta',123)";
        // echo $full_name;
        // echo $user_name;
        // echo $password;
        
        $res= mysqli_query($conn,$sql) ;
        // while($row=mysqli_fetch_assoc($res))
        // {
        //     print_r($row);
        // }

        if($res)
        {
            // echo "Data Inserted";
            $_SESSION['add']="<div class='success'>Admin Added Successfully.</div>";
            // header("location: http://localhost/food_order_website/rest-cpy/admin/manage-admin.php");
            // header("location: http://localhost/food_order_website/rest-cpy/admin/manage-admin.php");
            header("location:".SITEURL.'admin/manage-admin.php');
            // exit;
        }
        else
        {
            // echo "Data not Inserted";
            $_SESSION['add']="<div class='error'>Failed To Add Admin.</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
        // echo $sql;
    }

?>

<?php include('../partials-front/footer.php') ?>