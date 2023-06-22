<?php   include('nav-bar.php'); ?>
<link rel="stylesheet" href="../styles/inputboxes.css">
<div class='main'>
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php  
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
  

if(isset($_POST['submit']))
{
    // echo "Clicked";
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($conn,$title);
       
    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured'];

    }
    else
    {
        $featured="No";

    }
    if(isset($_POST['active']))
    {
        $active=$_POST['active'];

    }
    else
    {
        $active="No";

    }

    // print_r($_FILES['image']);
    // die();

    if(isset($_FILES['image']['name']))
    {
            $image_name=$_FILES['image']['name'];

            if($image_name!="")
            {
                    $st=explode('.',$image_name);
                    $image_name=$st[0].rand(000,999).'.'.$st[1];
                    // echo $image_name;
                
                $source_path=$_FILES['image']['tmp_name'];

                $destination_path="../media/category/".$image_name;

                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                    die();
                }

            }

    }
    else{
        $image_name="";

    }



    $sql="INSERT INTO tbl_category SET 
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'";

    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if($res)
    {
        $_SESSION['add']="<div class='success'>Category Added Succesfully</div>";
        header("location:".SITEURL.'admin/manage-category.php');


    }
    else
    {
        $_SESSION['add']="<div class='error'>Failed to Add Category</div>";
        header("location:".SITEURL.'admin/add-category.php');
        

    }


}

?>


        <br><br>
        <!-- Add category starts -->
       <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td><input type="text" name="title" placeholder="Category Title"></td>
            </tr>

            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured: </td>
                <td>
                <input type="radio" name="featured" value="Yes">Yes
                <input type="radio" name="featured" value="No">No
                </td>

            </tr>

            <tr>
                <td>
                    Active: 
                </td>
                <td>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No

                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
            </tr>
        </table>

       </form> 
        <!-- Add category Ends -->



        
        
    </div>
</div>


<?php include('../partials-front/footer.php') ?>