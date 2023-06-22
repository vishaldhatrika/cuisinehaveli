<?php 

    include('../config/constants.php');
    // echo "Delete page";
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {

        // echo "Get value and delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            $path="../Media/category/".$image_name;
            if(file_exists($path))
                $remove=unlink($path);
            if(!$remove)
            {
                // echo "Removed Succesfully";
                $_SESSION['remove']="<div class='error'>Failed To Remove Category Image</div>";
                // header('location:'.SITEURL.'admin/manage-category.php');
                // die();
            }
        }

        $sql="DELETE FROM tbl_category WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            $_SESSION['delete']="<div class='success'>Catgeory Deleted Succesfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete']="<div class='error'>Failed to delete Category</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

        }

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');

    }




?>