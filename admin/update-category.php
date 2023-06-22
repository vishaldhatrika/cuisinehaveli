<?php include('nav-bar.php');?>

<link rel="stylesheet" href="../styles/inputboxes.css">
<div class="main">
    <div class="wrapper">

        <h1>Update Category</h1>
        <br><br>

        <?php  

            if(isset($_GET['id']))
            {
                // echo "Getting Data";
                $id=$_GET['id'];
                $sql="SELECT * FROM tbl_category WHERE id=$id";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $title=mysqli_real_escape_string($conn,$title);
       
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];

                    // echo "category found";

                }
                else
                {
                    $_SESSION['no-category-found']="<div class='error'>Category not found.</div>";
                    header("location:".SITEURL.'admin/manage-category.php');
                    echo "category not found";

                }

            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
                echo "Id not set";
            }


            if(isset($_POST['submit']))
            {
                // echo "Clicked";
                $id=$_POST['id'];
                $title=$_POST['title'];
                $title=mysqli_real_escape_string($conn,$title);
       
                $current_image=$_POST['current_image'];
                $featured=$_POST['featured'];
                $active= $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    // echo "File selected";
                    // $_SESSION['upload']="Selected File";
                    $image_name=$_FILES['image']['name'];
                    $st=explode('.',$image_name);
                    $image_name=$st[0].rand(000,999).'.'.$st[1];
                    
                    // $source_path=$_FILES['image']['tmp_name'];
                    // print_r($source_path);    
                
                    // $image_name=$_FILES['image']['name'];

                    // print_r($image_name);
                    if($image_name!="")
                    {
                        // print_r($_FILES);
                        $source_path=$_FILES['image']['tmp_name'];

                        $destination_path="../Media/category/".$image_name;

                        $upload=move_uploaded_file($source_path,$destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path="../Media/category/".$current_image;
                            if(file_exists($remove_path))
                                $remove=unlink($remove_path);

                            // if($remove==false)
                            // {
                            //     $_SESSION['failed-remove']="<div class='error'>Failed to remove current Image.</div>";
                            //     header('location:'.SITEURL.'admin/manage-category.php');
                            //     die();

                            // }


                        }
                        
                    }
                    else
                    {
                        $image_name=$current_image;
                    }


                }
                else
                {
                    $image_name=$current_image;
                }

                $sql2="UPDATE tbl_category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active' 
                    WHERE id='$id' 
                ";

                $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                if($res2)
                {
                    // echo "Success";
                    $_SESSION['update']="<div class='success'>Category Updated Succesfully.</div>";
                    header("location:".SITEURL.'admin/manage-category.php');


                }
                else
                {
                    // echo "Failure";
                    $_SESSION['update']="<div class='error'>Failed To Update Category.</div>";
                    header("location:".SITEURL.'admin/manage-category.php');

                }

            }

?>




        <form action="" method="POST" enctype="multipart/form-data">
            <table class='tbl-30'>
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image!="")
                            {
                                ?>

                                <img src="<?php echo SITEURL;?>Media/category/<?php echo $current_image;?>" width="85px">



                                <?php

                            }
                            else
                            {
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

    </div>

</div>




<?php include('../partials-front/footer.php') ?>