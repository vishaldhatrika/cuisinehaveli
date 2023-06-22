<?php 
    // echo "Delete Food Page";

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // Process to delete
        // echo "Process to delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            $path="../media/food/".$image_name;
            if(file_exists($path))
                $remove=unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Image File Doesn't Exist.</div>";
                // header('location:'.SITEURL.'admin/manage-food.php');
                // die();

            }


        }

        $sql="DELETE FROM tbl_food WHERE id=$id";
        $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($res)
        {
            // $_SESSION['delete']="<div class='success'>Food Deleted Succesfully.</div>";
            $_SESSION['delete']="<div class='success'>Food Deleted Succesfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else
        {
            // $_SESSION['delete']=$res;
            $_SESSION['delete']="<div class='error'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }





    }
    else
    {
        //REdirect to maage food
        // echo "redirect";
        $_SESSION['unauthorize']="<div class='error' >Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>