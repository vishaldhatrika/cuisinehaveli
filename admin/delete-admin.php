<?php 

    include('../config/constants.php'); 
    //get the id of admin to be deleted
     $id= $_GET['id'];

    //create sql query
    $sql= "DELETE FROM tbl_admin where id=$id";

    $res= mysqli_query($conn,$sql);

    if($res)
    {
        // echo" Admin deleted";
        $_SESSION['delete']="<div class='success'>admin Deleted succesfully.</div>";
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        // echo "Falied to delete";
        $_SESSION['delete']="<div class='error'>Failed to delete Admin Try again Later.</div>";
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    //redirect to manage admin page

?>