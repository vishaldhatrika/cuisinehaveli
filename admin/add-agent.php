<?php include("nav-bar.php"); ?>
<link rel="stylesheet" href="../styles/inputboxes.css">

<div class="main">

    <div class="wrapper">
        <h1> Add Agent</h1>
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
                <td>Agent Name: </td>
                <td><input type="text" name="agentname" placeholder="Enter Name" > </td>
            </tr>

            <tr>
                <td>Contact: </td>
                <td><input type="text" name="contact" placeholder="Enter Contact Number" > </td>
            </tr>


            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Agent" class="btn-secondary">
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

        $agent_name= $_POST['agentname'];
        $agent_name=mysqli_real_escape_string($conn,$agent_name);
       
        $contact= $_POST['contact'];
        $contact=mysqli_real_escape_string($conn,$contact);
       
        // SQL query to insert data in database

        // $db_select = mysqli_select_db($conn,'fdr');

        $sql= "INSERT INTO tbl_agents SET
        agent_name='$agent_name',
        agent_contact='$contact'
        ";
        // $sql2="show databases";
        // $sqls= "Insert into tbl_admin values(1,$full_name,$user_name,$password)";
        // $sql3="show tables";
        // $sql7= "Insert into tbl_admin values (1,'kaushik','gupta',123)";
        // echo $full_name;
        // echo $user_name;
        // echo $password;
        
        $res= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
        // while($row=mysqli_fetch_assoc($res))
        // {
        //     print_r($row);
        // }

        if($res)
        {
            // echo "Data Inserted";
            $_SESSION['add']="<div class='success'>Agent Added Successfully.</div>";
            // header("location: http://localhost/food_order_website/rest-cpy/admin/manage-admin.php");
            // header("location: http://localhost/food_order_website/rest-cpy/admin/manage-admin.php");
            header("location:".SITEURL.'admin/manage-agent.php');
            // exit;
        }
        else
        {
            // echo "Data not Inserted";
            $_SESSION['add']="<div class='error'>Failed To Add Agent.</div>";
            header("location:".SITEURL.'admin/add-agent.php');
        }
        // echo $sql;
    }

?>

<?php include('../partials-front/footer.php') ?>